<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

class News_Installer extends Zikula_AbstractInstaller
{
    /**
     * initialise the News module once
     *
     * @return       bool       true on success, false otherwise
     */
    public function install()
    {
        // Create table
        if (!DBUtil::createTable('news')) {
            return false;
        }

        // create our default category
        if (!$this->_createdefaultcategory()) {
            LogUtil::registerStatus($this->__('Warning! Could not create the default News category tree. If you want to use categorisation with News, register at least one property for the module in the Category Registry.'));
        }

        // Set up config variables
        $this->setVar('storyhome', 10);
        $this->setVar('storyorder', 1); // publication datetime
        $this->setVar('itemsperpage', 25);
        $this->setVar('itemsperadminpage', 15);
        $this->setVar('permalinkformat', '%year%/%monthnum%/%day%/%articletitle%');
        $this->setVar('enablecategorization', true);
        $this->setVar('refereronprint', 0);
        $this->setVar('enableattribution', false);
        $this->setVar('topicproperty', '');
        $this->setVar('catimagepath', 'images/categories/');
        $this->setVar('enableajaxedit', false);
        $this->setVar('enablemorearticlesincat', false);
        $this->setVar('morearticlesincat', 0);
        $this->setVar('enablecategorybasedpermissions', true);
        $this->setVar('enabledescriptionvar', false);
        $this->setVar('descriptionvarchars', 250);

        // notification on new article
        $this->setVar('notifyonpending', false);
        $this->setVar('notifyonpending_fromname', '');
        $this->setVar('notifyonpending_fromaddress', '');
        $this->setVar('notifyonpending_toname', '');
        $this->setVar('notifyonpending_toaddress', ''); // can be comma seperated list
        $this->setVar('notifyonpending_subject', $this->__('A News Publisher article has been submitted for review'));
        $this->setVar('notifyonpending_html', true);

        // pdf link for an article
        $this->setVar('pdflink', false);
        $this->setVar('pdflink_headerlogo', 'tcpdf_logo.jpg');
        $this->setVar('pdflink_headerlogo_width', '30');
        $this->setVar('pdflink_enablecache', true);

        // picture uploading
        $this->setVar('picupload_enabled', false);
        $this->setVar('picupload_allowext', 'jpg,gif,png');
        $this->setVar('picupload_index_float', 'left');
        $this->setVar('picupload_article_float', 'left');
        $this->setVar('picupload_maxfilesize', '500000');
        $this->setVar('picupload_maxpictures', '3');
        $this->setVar('picupload_sizing', '0');
        $this->setVar('picupload_picmaxwidth', '600');
        $this->setVar('picupload_picmaxheight', '600');
        $this->setVar('picupload_thumbmaxwidth', '150');
        $this->setVar('picupload_thumbmaxheight', '150');
        $this->setVar('picupload_thumb2maxwidth', '200');
        $this->setVar('picupload_thumb2maxheight', '200');
        $this->setVar('picupload_uploaddir', 'images/news_picupload');

        // create the default data for the News module
        $this->_defaultdata();

        // register handlers
        EventUtil::registerPersistentModuleHandler('News', 'get.pending_content', array('News_Handlers', 'pendingContent'));
        EventUtil::registerPersistentModuleHandler('News', 'module.content.gettypes', array('News_Handlers', 'getTypes'));
        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

        // Initialisation successful
        return true;
    }

    /**
     * upgrade the News module from an old version
     *
     * @return       bool       true on success, false otherwise
     */
    public function upgrade($oldversion)
    {
        // Upgrade dependent on old version number
        switch ($oldversion)
        {
            case '1.3':
            case '1.4':
                $this->setVar('storyhome', System::getVar('storyhome'));
                System::delVar('storyhome');
                $this->setVar('storyorder', System::getVar('storyorder'));
                System::delVar('storyorder');
                $this->setVar('itemsperpage', 25);

            case '1.5':
                $tables = DBUtil::getTables();
                $shorturlsep = System::getVar('shorturlsseparator');
                // move the data from the author uid to creator and updator uid
                $sqls = array();
                $sqls[] = "UPDATE $tables[stories] SET pn_cr_uid = pn_aid";
                $sqls[] = "UPDATE $tables[stories] SET pn_lu_uid = pn_aid";
                // move the data from the time field to the creation and update datestamp
                $sqls[] = "UPDATE $tables[stories] SET pn_cr_date = pn_time";
                $sqls[] = "UPDATE $tables[stories] SET pn_lu_date = pn_time";
                $sqls[] = "UPDATE $tables[stories] SET pn_urltitle = REPLACE(pn_title, ' ', '{$shorturlsep}')";
                foreach ($sqls as $sql) {
                    if (!DBUtil::executeSQL($sql)) {
                        LogUtil::registerError($this->__('Error! Could not update table.'));
                        return '1.5';
                    }
                }
                // drop the old columns
                DBUtil::dropColumn('stories', array('pn_aid'));
                DBUtil::dropColumn('stories', array('pn_time'));
                $this->setVar('permalinkformat', '%year%/%monthnum%/%day%/%storytitle%');

            case '2.0':
            // import autonews and queue articles
                if (!$this->_import_autonews_queue()) {
                    LogUtil::registerError($this->__('Error! Could not update articles.'));
                    return '2.0';
                }
                // migrate the comments to ezcomments
                if (ModUtil::available('Comments') || defined('_PNINSTALLVER')) {
                    // check for the ezcomments module
                    if (!ModUtil::available('EZComments')) {
                        LogUtil::registerError(__f('Error! The \'%s\' module is not installed.', 'EZComments'));
                        return '2.0';
                    }
                    //  drop the comments table if successful
                    if (ModUtil::apiFunc('EZComments', 'migrate', 'news')) {
                        // drop comments table after migration has succeeded
                        if (!DBUtil::dropTable('comments')) {
                            LogUtil::registerError($this->__('Error! Could not delete table.'));
                            return '2.0';
                        }
                        // remove the Comments module
                        ModUtil::apiFunc('Modules', 'admin', 'remove', array('id' => ModUtil::getIdFromName('Comments')));
                    }
                }
                // drop the autonews and queue tables, articles are already imported
                if (!DBUtil::dropTable('autonews')) {
                    LogUtil::registerError($this->__('Error! Could not delete table.'));
                    return '2.0';
                }
                if (!DBUtil::dropTable('queue')) {
                    LogUtil::registerError($this->__('Error! Could not delete table.'));
                    return '2.0';
                }
                // remove the AddStory and Submit_News modules
                ModUtil::apiFunc('Modules', 'admin', 'remove', array('id' => ModUtil::getIdFromName('AddStory')));
                ModUtil::apiFunc('Modules', 'admin', 'remove', array('id' => ModUtil::getIdFromName('Submit_News')));

            case '2.1':
                $this->setVar('enablecategorization', true);
                ModUtil::dbInfoLoad('News', 'News', true);

                if (!$this->_news_migratecategories()) {
                    LogUtil::registerError($this->__('Error! Could not migrate categories.'));
                    return '2.1';
                }

            case '2.2':
                $this->setVar('refereronprint', System::getVar('refereronprint', 0));

            case '2.3':
                $prefix = System::getVar('prefix');
                // when from is not set, put it to the creation date
                $sqls = array();
                $sqls[] = "UPDATE {$prefix}_stories SET pn_from = pn_cr_date WHERE pn_from IS NULL";
                // make sure we dont have an NULL hometext, since the tables permitted this before 2.4
                $sqls[] = "UPDATE {$prefix}_stories SET pn_hometext = '' WHERE pn_hometext IS NULL";
                foreach ($sqls as $sql) {
                    if (!DBUtil::executeSQL($sql)) {
                        LogUtil::registerError($this->__('Error! Could not update table.'));
                        return '2.3';
                    }
                }
                $this->setVar('enableattribution', false);
                // import the topicimagepath, variable tipath deletion is up to Topics module
                $this->setVar('catimagepath', System::getVar('tipath'));
                $this->setVar('enableajaxedit', false);
                // drop old legacy columns
                DBUtil::dropColumn('stories', 'pn_comments');
                DBUtil::dropColumn('stories', 'pn_themeoverride');
                // clear compiled templates and News cache (see #74)
                ModUtil::apiFunc('view', 'user', 'clear_compiled');
                ModUtil::apiFunc('view', 'user', 'clear_cache', array('module' => 'News'));

            case '2.4':
            case '2.4.1':
            // rename the database table from stories to news
                if (!DBUtil::renameTable('stories', 'news')) {
                    LogUtil::registerError($this->__('Error! Could not rename table.'));
                    return '2.4.1';
                }
            case '2.4.2':
            // rename several columns, tables holds the old names for backwards compatibility still
                $columns = array_keys(DBUtil::metaColumns('news', true));

                if (in_array('PN_WITHCOMM', $columns) && !DBUtil::renameColumn('news', 'pn_withcomm', 'disallowcomments')) {
                    LogUtil::registerError($this->__('Error! Could not rename column.'));
                    return '2.4.2';
                }
                if (in_array('PN_INFORMANT', $columns) && !DBUtil::renameColumn('news', 'pn_informant', 'contributor')) {
                    LogUtil::registerError($this->__('Error! Could not rename column.'));
                    return '2.4.2';
                }
                if (in_array('PN_IHOME', $columns) && !DBUtil::renameColumn('news', 'pn_ihome', 'hideonindex')) {
                    LogUtil::registerError($this->__('Error! Could not rename column.'));
                    return '2.4.2';
                }
            case '2.4.3':
            // update table for missing fields etc
                if (!DBUtil::changeTable('news')) {
                    return '2.4.3';
                }
                // update permissions with new scheme News::
                ModUtil::dbInfoLoad('Categories');
                $tables  = DBUtil::getTables();
                $grperms = $tables['group_perms_column'];

                $sqls   = array();
                $sqls[] = "UPDATE $tables[group_perms] SET $grperms[component] = 'News::' WHERE $grperms[component] = 'Stories::Story'";
                // update categories_mapobj and categories_registry with new tablename (categories tables not in $tables ?)
                $sqls[] = "UPDATE $tables[categories_mapobj] SET cmo_table='news' WHERE cmo_table='stories'";
                $sqls[] = "UPDATE $tables[categories_registry] SET crg_table='news' WHERE crg_table='stories'";
                foreach ($sqls as $sql) {
                    if (!DBUtil::executeSQL($sql)) {
                        LogUtil::registerError($this->__('Error! Could not update table.'));
                        return '2.4.3';
                    }
                }
                // Add new variable(s)
                $this->setVar('enablemorearticlesincat', false);
                $this->setVar('morearticlesincat', 0);
                $this->setVar('notifyonpending', false);
                $this->setVar('notifyonpending_fromname', '');
                $this->setVar('notifyonpending_fromaddress', '');
                $this->setVar('notifyonpending_toname', '');
                $this->setVar('notifyonpending_toaddress', '');
                $this->setVar('notifyonpending_subject', $this->__('A News Publisher article has been submitted for review'));
                $this->setVar('notifyonpending_html', true);
                $this->setVar('pdflink', false);
                $this->setVar('pdflink_tcpdfpath', 'config/classes/tcpdf/tcpdf.php');
                $this->setVar('pdflink_tcpdflang', 'config/classes/tcpdf/config/lang/eng.php');
                $this->setVar('pdflink_headerlogo', 'tcpdf_logo.jpg');
                $this->setVar('pdflink_headerlogo_width', '30');

                // clear compiled templates and News cache
                ModUtil::apiFunc('view', 'user', 'clear_compiled');
                ModUtil::apiFunc('view', 'user', 'clear_cache', array('module' => 'News'));

            case '2.5':
                // update table
                if (!DBUtil::changeTable('news')) {
                    return '2.5';
                }
            case '2.5.1':
            case '2.5.2':
                /*
                // add the new picture column and update the table
                if (!DBUtil::changeTable('news')) {
                    return '2.5.2';
                }
                */
                // add new picture uploading variables
                $this->setVar('picupload_enabled', false);
                $this->setVar('picupload_allowext', 'jpg, gif, png');
                $this->setVar('picupload_index_float', 'left');
                $this->setVar('picupload_article_float', 'left');
                $this->setVar('picupload_maxfilesize', '500000');
                $this->setVar('picupload_maxpictures', '3');
                $this->setVar('picupload_sizing', '0');
                $this->setVar('picupload_picmaxwidth', '600');
                $this->setVar('picupload_picmaxheight', '600');
                $this->setVar('picupload_thumbmaxwidth', '150');
                $this->setVar('picupload_thumbmaxheight', '150');
                $this->setVar('picupload_thumb2maxwidth', '200');
                $this->setVar('picupload_thumb2maxheight', '200');
                $this->setVar('picupload_uploaddir', 'images/news_picupload');
                // add new category parameter
                $this->setVar('enablecategorybasedpermissions', true);

                // permalink format change story to article
                $this->setVar('permalinkformat', str_replace(array('storytitle', 'storyid'), array('articletitle', 'articleid'), $this->getVar('permalinkformat')));

                // clear compiled templates and News cache
                ModUtil::apiFunc('view', 'user', 'clear_compiled');
                ModUtil::apiFunc('view', 'user', 'clear_cache', array('module' => 'News'));

            case '2.6.0':
            case '2.6.1':
                $this->setVar('enabledescriptionvar', false);
                $this->setVar('descriptionvarchars', 250);
            case '2.6.2':
                // register handlers
                EventUtil::registerPersistentModuleHandler('News', 'get.pending_content', array('News_Handlers', 'pendingContent'));
                EventUtil::registerPersistentModuleHandler('News', 'module.content.gettypes', array('News_Handlers', 'getTypes'));
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sqlStatements = array();
                // this removes the prefixes but also changes hideonindex to displayonindex and disallowcomments to allowcomments
                // because 'from' and 'to' are reserved sql words, the column names are changed to ffrom and tto respectively
                $sqlStatements[] = "ALTER TABLE `news` 
CHANGE `pn_sid` `sid` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE `pn_title` `title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_hometext` `hometext` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_bodytext` `bodytext` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_counter` `counter` INT( 11 ) NULL DEFAULT '0',
CHANGE `pn_contributor` `contributor` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_notes` `notes` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_hideonindex` `displayonindex` TINYINT( 4 ) NOT NULL DEFAULT '0',
CHANGE `pn_language` `language` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_disallowcomments` `allowcomments` TINYINT( 4 ) NOT NULL DEFAULT '0' , 
CHANGE `pn_format_type` `format_type` TINYINT( 4 ) NOT NULL DEFAULT '0',
CHANGE `pn_urltitle` `urltitle` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_published_status` `published_status` TINYINT( 4 ) NULL DEFAULT '0',
CHANGE `pn_from` `ffrom` DATETIME NULL DEFAULT NULL ,
CHANGE `pn_to` `tto` DATETIME NULL DEFAULT NULL ,
CHANGE `pn_obj_status` `obj_status` VARCHAR( 1 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A',
CHANGE `pn_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00' , 
CHANGE `pn_cr_uid` `cr_uid` INT( 11 ) NOT NULL DEFAULT '0',
CHANGE `pn_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
CHANGE `pn_lu_uid` `lu_uid` INT( 11 ) NOT NULL DEFAULT '0',
CHANGE `pn_approver` `approver` INT( 11 ) NULL DEFAULT '0',
CHANGE `pn_weight` `weight` TINYINT( 4 ) NULL DEFAULT '0'";
                foreach ($sqlStatements as $sql) {
                    $stmt = $connection->prepare($sql);
                    try {
                        $stmt->execute();
                    } catch (Exception $e) {
                    }   
                }

                if (!DBUtil::changeTable('news')) {
                    return '2.6.2';
                }
                HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
                $this->delVar('pdflink_tcpdfpath');
                $this->delVar('pdflink_tcpdflang');
                $this->setVar('itemsperadminpage', 15);
                $this->setVar('pdflink_enablecache', true);
                if (ModUtil::available('Content')) {
                    Content_Installer::updateContentType('News');
                }
                $this->_invertHideAndComments();
                $this->fixStartSettings();
            case '3.0.0':
                // future plans
        }

        // Update successful
        return true;
    }

    /**
     * delete the News module once
     *
     * @return       bool       true on success, false otherwise
     */
    public function uninstall()
    {
        // drop table
        if (!DBUtil::dropTable('news')) {
            return false;
        }

        // Delete module variables
        $this->delVars();

        // Delete entries from category registry
        ModUtil::dbInfoLoad ('Categories');
        DBUtil::deleteWhere('categories_registry', "modname='News'");
        DBUtil::deleteWhere('categories_mapobj', "modname='News'");

        // unregister handlers
        EventUtil::unregisterPersistentModuleHandlers('News');
        HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());

        // Deletion successful
        return true;
    }

    /**
     * create the default data for the News module
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance
     *
     * @author       Erik Spaan
     * @return       bool       false
     */
    private function _defaultdata()
    {
        // Short URL seperator
        $shorturlsep = System::getVar('shorturlsseparator');
        $now = DateUtil::getDatetime();
        $uname = UserUtil::getVar('uname');
        $uid = UserUtil::getVar('uid');
        // set creation date and from to the time set in autonews
        $article = array('title'   => $this->__('News introduction article'),
                'urltitle'         => $this->__('news_introduction_article'),
                'hometext'         => $this->__('A news article is divided into an article teaser text (which is the lead-in text you are reading now) and an article body text (which you can view by clicking on the article\'s title or the \'Read more\' link). The teaser will generally be a short introduction to the article, but if you plan to publish only very short bulletins, the teaser can contain the full draft and the article body can be left empty. Click on the article title for more information about Zikula\'s News publisher module.'),
                'bodytext'         => __f('<h3>More about the News module</h3><p>You are now reading the body text of the article (starting as from the \'More about the News module\' title above). Both the article teaser and the article body can contain URL links, images, mark-up (HTML tags and, if you have the additional necessary add-ons installed, other mark-up languages such as BBCode) You can learn more about the News module by reading the <a href="http://code.zikula.org/news/wiki#Documentation">News Wiki Documentation</a>.</p><h3>Some more details</h3><p><img src="modules/News/images/admin.png" width="48" height="48" class="z-floatleft" alt="News publisher admin image" />To control what HTML tags can be included in an article to format and enhance it, the site administrator should set the desired tags to enabled status by visiting the <a href="index.php?module=SecurityCenter&type=admin&func=allowedhtml">Security center</a>. With the News module, you can take advantage of Zikula\'s permissions system to control who gets what access to which parts of the News module. A moderator group can be created, containing registered site users who can add, edit and delete articles. This is just a simple example: the Zikula permissions system is sufficiently flexible to let you implement practically any organisation you want.</p><p>You can edit or delete this introductory article by clicking on the link beside the article title, or you can visit to the <a href="index.php?module=%s&type=admin&func=view">News admin pages</a>.</p>', $this->__('News')),
                'counter'          => 0,
                'contributor'      => $uname,
                'approver'         => $uid,
                'notes'            => '',
                'displayonindex'   => 1,
                'language'         => '',
                'allowcomments'    => 0,
                'format_type'      => 0,
                'published_status' => 0,
                'from'             => $now,
                'weight'           => 0,
                'pictures'         => 0,
                'cr_date'          => $now);

        // Insert the default article and preserve the standard fields
        if (!($obj = DBUtil::insertObject($article, 'news', 'sid'))) {
            LogUtil::registerStatus($this->__('Warning! Could not create the default News introductory article.'));
        }
        $obj = array('sid'  => $obj['sid'], 'from' => $obj['cr_date']);
        if (!DBUtil::updateObject($obj, 'news', '', 'sid')) {
            LogUtil::registerStatus($this->__('Warning! Could not update the default News introductory article.'));
        }
    }

    /**
     * convert old 'hideonindex' to 'displayonindex' by inverting the values
     * convert old 'disallowcomments' to 'allowcomments' by inverting the values
     * 
     * @return boolean
     */
    private function _invertHideAndComments()
    {
        $tables = DBUtil::getTables();
        $columns = $tables['news_column'];
        $sql = "SELECT $columns[sid], $columns[displayonindex], $columns[allowcomments] FROM {$tables['news']}";
        $result = DBUtil::executeSQL($sql);
        $objectArray = DBUtil::marshallObjects($result);
        foreach ($objectArray as $row) {
            $sid = $row['sid'];
            $doi = ($row['displayonindex']) == 0 ? 1 : 0;
            $ac = ($row['allowcomments']) == 0 ? 1 : 0;
            $sql = "UPDATE {$tables['news']} SET $columns[displayonindex]='$doi', $columns[allowcomments]='$ac' WHERE $columns[sid]=$sid";
            DBUtil::executeSQL($sql);
        }
        return true;
    }
    
    /**
     * fix core start page settings if set to News
     * @return boolean
     */
    private function fixStartSettings()
    {
        if ((System::getVar('startpage') == 'News') && (System::getVar('entrypoint') == 'index.php')) {
            $starttype = System::getVar('starttype', '');
            if (empty($starttype)) {
                System::setVar('starttype', 'user');
            }
            $startfunc = System::getVar('startfunc', '');
            if (empty($startfunc) || ($startfunc == 'main')) {
                System::setVar('startfunc', 'view');
            }
            $startargs = System::getVar('startargs', '');
            if (empty($startargs)) {
                System::setVar('startargs', 'displayonindex=1');
            }
        }
        return true;
    }
    
    /**
     * migrate old local categories to the categories module
     */
    private function _news_migratecategories()
    {
        // load the admin language file
        // pull all data from the old tables
        $tables = DBUtil::getTables();
        $columns = $tables['news_column'];
        $sql = "SELECT $columns[catid], $columns[title] FROM {$tables[stories_cat]}";
        $result = DBUtil::executeSQL($sql);
        $categories = array(array(0, 'Articles'));
        for (; !$result->EOF; $result->MoveNext()) {
            $categories[] = $result->fields;
        }
        $sql = "SELECT $columns[topicid], $columns[topicname], $columns[topicimage], $columns[topictext] FROM {$tables[topics]}";
        $result = DBUtil::executeSQL($sql);
        $topics = array();
        for (; !$result->EOF; $result->MoveNext()) {
            $topics[] = $result->fields;
        }

        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // create the Main category and entry in the categories registry
        $this->_createdefaultcategory('/__SYSTEM__/Modules/News');

        // create the Topics category and entry in the categories registry
        $this->_createtopicscategory('/__SYSTEM__/Modules/Topics');

        // get the category path for which we're going to insert our upgraded News categories
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/News');

        // migrate our main categories
        $categorymap = array();
        foreach ($categories as $category) {
            $cat = new Categories_DBObject_Category();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', $category[1]);
            $cat->setDataField('display_name', array($lang => $category[1]));
            $cat->setDataField('display_desc', array($lang => $category[1]));
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
            $categorymap[$category[0]] = $cat->getDataField('id');
        }

        // get the category path for which we're going to insert our upgraded Topics categories
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Topics');

        // migrate our topic categories
        $topicsmap = array();
        foreach ($topics as $topic) {
            $cat = new Categories_DBObject_Category();
            $data = $cat->getData();
            $data['parent_id']                     = $rootcat['id'];
            $data['name']                          = $topic[1];
            $data['value']                         = -1;
            $data['display_name']                  = array($lang => $topic[3]);
            $data['display_desc']                  = array($lang => $topic[3]);
            $data['__ATTRIBUTES__']['topic_image'] = $topic[2];
            $cat->setData ($data);
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
            $topicsmap[$topic[0]] = $cat->getDataField('id');
        }

        // After an upgrade we want the legacy topic template variables to point to the Topic property
        $this->setVar('topicproperty', 'Topic');

        // migrate page category assignments
        $sql = "SELECT $columns[sid], $columns[catid], $columns[topic] FROM {$tables[stories]}";
        $result = DBUtil::executeSQL($sql);
        $pages = array();
        for (; !$result->EOF; $result->MoveNext()) {
            $pages[] = array('sid' => $result->fields[0],
                    '__CATEGORIES__' => array(
                        'Main' => $categorymap[$result->fields[1]],
                        'Topic' => $topicsmap[$result->fields[2]]),
                    '__META__' => array('module' => 'News'));
        }
        foreach ($pages as $page) {
            if (!DBUtil::updateObject($page, 'stories', '', 'sid')) {
                return LogUtil::registerError($this->__('Error! Could not update the article categories.'));
            }
        }

        // drop old table
        DBUtil::dropTable('stories_cat');
        // we don't drop the topics table - this is the job of the topics module

        // finally drop the secid column
        DBUtil::dropColumn('stories', $columns['catid']);
        DBUtil::dropColumn('stories', $columns['topic']);

        return true;
    }

    /**
     * create the default category tree
     */
    private function _createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
    {
        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // get the category path for which we're going to insert our place holder category
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
        $nCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/News');

        if (!$nCat) {
            // create placeholder for all our migrated categories
            $cat = new Categories_DBObject_Category();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', 'News');
            $cat->setDataField('display_name', array($lang => $this->__('News publisher')));
            $cat->setDataField('display_desc', array($lang => $this->__('Provides the ability to publish and manage news articles contributed by site users, with support for news categories and various associated blocks.')));
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
        }

        // get the category path for which we're going to insert our upgraded News categories
        $rootcat = CategoryUtil::getCategoryByPath($regpath);
        if ($rootcat) {
            // create an entry in the categories registry to the Main property
            $registry = new Categories_DBObject_Registry();
            $registry->setDataField('modname', 'News');
            $registry->setDataField('table', 'news');
            $registry->setDataField('property', 'Main');
            $registry->setDataField('category_id', $rootcat['id']);
            $registry->insert();
        } else {
            return false;
        }

        return true;
    }

    /**
     * create the Topics category tree
     */
    private function _createtopicscategory($regpath = '/__SYSTEM__/Modules/Topics')
    {
        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // get the category path for which we're going to insert our place holder category
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');

        // create placeholder for all the migrated topics
        $tCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Topics');

        if (!$tCat) {
            // create placeholder for all our migrated categories
            $cat = new Categories_DBObject_Category();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', 'Topics');
            // pnModLangLoad doesn't handle type 1 modules
            //pnModLangLoad('Topics', 'version');
            $cat->setDataField('display_name', array($lang => $this->__('Topics')));
            $cat->setDataField('display_desc', array($lang => $this->__('Display and manage topics')));
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
        }

        // get the category path for which we're going to insert our upgraded News categories
        $rootcat = CategoryUtil::getCategoryByPath($regpath);
        if ($rootcat) {
            // create an entry in the categories registry to the Topic property
            $registry = new Categories_DBObject_Registry();
            $registry->setDataField('modname', 'News');
            $registry->setDataField('table', 'stories');
            $registry->setDataField('property', 'Topic');
            $registry->setDataField('category_id', $rootcat['id']);
            $registry->insert();
        } else {
            return false;
        }

        return true;
    }

    /**
     * Import autonews and queue into stories
     */
    private function _import_autonews_queue()
    {
        $tables = DBUtil::getTables();
        $columns = $tables['news_column'];
        $shorturlsep = System::getVar('shorturlsseparator');

        // pull all data from the autonews table and import into stories
        $sql = "SELECT * FROM {$tables[autonews]}";
        $result = DBUtil::executeSQL($sql);
        $i = 0;
        for(; !$result->EOF; $result->MoveNext()) {
            list ( $obj['anid'],
                    $obj['catid'],
                    $obj['aid'],
                    $obj['title'],
                    $obj['time'],
                    $obj['hometext'],
                    $obj['bodytext'],
                    $obj['topic'],
                    $obj['informant'],
                    $obj['notes'],
                    $obj['ihome'],
                    $obj['alanguage'],
                    $obj['language'],
                    $obj['withcomm']) = $result->fields;

            // set creation date and from to the time set in autonews
            $objj = array('title'         => $obj['title'],
                    'urltitle'      => str_replace(' ', $shorturlsep, $obj['title']),
                    'hometext'      => $obj['hometext'],
                    'bodytext'      => $obj['bodytext'],
                    'counter'       => 0,
                    'informant'     => $obj['informant'],
                    'notes'         => $obj['notes'],
                    'ihome'         => $obj['ihome'],
                    'themeoverride' => '',
                    'language'      => $obj['language'],
                    'withcomm'      => $obj['withcomm'],
                    'from'          => $obj['time'],
                    'cr_date'       => $obj['time'],
                    'cr_uid'        => $obj['aid'],
                    'lu_date'       => DateUtil::getDatetime(),
                    'lu_uid'        => UserUtil::getVar('uid'));

            // Insert the imoprted object in stories and preserve the creation/lastupdated values set above.
            $res = DBUtil::insertObject($objj, 'stories', 'sid', true);

            // Manually update the topic and catid, since those are not in pntables and still needed for category migration
            $sql = "UPDATE $tables[stories] SET $columns[catid] = '".$obj['catid']."', $columns[topic] = '".$obj['topic']."' WHERE $columns[sid] = ".$objj['sid'];
            if (!DBUtil::executeSQL($sql)) {
                return LogUtil::registerError($this->__('Error! Could not update table.'));
            }
            $i++;
        }
        $result->Close();

        // pull all data from the queue table and import into stories
        $sql = "SELECT * FROM {$tables[queue]}";
        $result = DBUtil::executeSQL($sql);
        $i = 0;
        for(; !$result->EOF; $result->MoveNext())
        {
            list ( $obj['qid'],
                    $obj['uid'],
                    $obj['arcd'],
                    $obj['uname'],
                    $obj['subject'],
                    $obj['story'],
                    $obj['timestamp'],
                    $obj['topic'],
                    $obj['language'],
                    $obj['bodytext']) = $result->fields;

            // Make the article and set published status to pending
            $objj = array('title'         => $obj['subject'],
                    'urltitle'      => str_replace(' ', $shorturlsep, $obj['subject']),
                    'hometext'      => $obj['story'],
                    'bodytext'      => $obj['bodytext'],
                    'counter'       => 0,
                    'topic'         => $obj['topic'],
                    'informant'     => $obj['uname'],
                    'notes'         => '',
                    'ihome'         => 0,
                    'themeoverride' => '',
                    'language'      => $obj['language'],
                    'withcomm'      => 0,
                    'format_type'   => 0,
                    'published_status' => 2,
                    'cr_date'       => $obj['timestamp'],
                    'cr_uid'        => $obj['uid'],
                    'lu_date'       => DateUtil::getDatetime(),
                    'lu_uid'        => UserUtil::getVar('uid'));

            // Insert the imported object in stories and preserve the creation/lastupdated values set above.
            $res = DBUtil::insertObject($objj, 'stories', 'sid', true);

            // Manually update the topic and catid, since those are not in pntables and still needed for category migration
            $sql = "UPDATE $tables[stories] SET $columns[catid] = '0', $columns[topic] = '".$obj['topic']."' WHERE $columns[sid] = ".$objj['sid'];
            if (!DBUtil::executeSQL($sql)) {
                return LogUtil::registerError($this->__('Error! Could not update table.'));
            }
            $i++;
        }
        $result->Close();

        return true;
    }

    public static function LegacyContentTypeMap()
    {
        $oldToNew = array(
            'newsarticles' => 'NewsArticles'
        );
        return $oldToNew;
    }
}