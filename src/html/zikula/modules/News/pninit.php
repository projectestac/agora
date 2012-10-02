<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pninit.php 81 2009-02-25 17:57:20Z espaan $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Mark West <mark@zikula.org>
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage News
 */

/**
 * initialise the News module once
 *
 * @return       bool       true on success, false otherwise
 */
function News_init()
{
    $dom = ZLanguage::getModuleDomain('News');

    // Create table
    if (!DBUtil::createTable('news')) {
        return false;
    }

    // create our default category
    if (!_news_createdefaultcategory()) {
        LogUtil::registerStatus(__('Warning! Could not create the default News category tree. If you want to use categorisation with News, register at least one property for the module in the Category Registry.', $dom)); 
    }

    // Set up config variables
    pnModSetVar('News', 'storyhome', 10);
    pnModSetVar('News', 'storyorder', 1); // publication datetime
    pnModSetVar('News', 'itemsperpage', 25);
    pnModSetVar('News', 'permalinkformat', '%year%/%monthnum%/%day%/%storytitle%');
    pnModSetVar('News', 'enablecategorization', true);
    pnModSetVar('News', 'refereronprint', 0);
    pnModSetVar('News', 'enableattribution', false);
    pnModSetVar('News', 'catimagepath', 'images/categories/');
    pnModSetVar('News', 'enableajaxedit', false);
    pnModSetVar('News', 'enablemorearticlesincat', false);
    pnModSetVar('News', 'morearticlesincat', 0);

    pnModSetVar('News', 'notifyonpending', false);
    pnModSetVar('News', 'notifyonpending_fromname', '');
    pnModSetVar('News', 'notifyonpending_fromaddress', '');
    pnModSetVar('News', 'notifyonpending_toname', '');
    pnModSetVar('News', 'notifyonpending_toaddress', ''); // can be comma seperated list
    pnModSetVar('News', 'notifyonpending_subject', __('A News Publisher article has been submitted for review', $dom));
    pnModSetVar('News', 'notifyonpending_html', true);

    pnModSetVar('News', 'pdflink', false);
    pnModSetVar('News', 'pdflink_tcpdfpath', 'config/classes/tcpdf/tcpdf.php');
    pnModSetVar('News', 'pdflink_tcpdflang', 'config/classes/tcpdf/config/lang/eng.php');
    pnModSetVar('News', 'pdflink_headerlogo', 'tcpdf_logo.jpg');
    pnModSetVar('News', 'pdflink_headerlogo_width', '30');

    // create the default data for the News module
    News_defaultdata();

    // Initialisation successful
    return true;
}

/**
 * upgrade the News module from an old version
 *
 * @return       bool       true on success, false otherwise
 */
function News_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('News');

    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '1.3':
        case '1.4':
            pnModSetVar('News', 'storyhome', pnConfigGetVar('storyhome'));
            pnConfigDelVar('storyhome');
            pnModSetVar('News', 'storyorder', pnConfigGetVar('storyorder'));
            pnConfigDelVar('storyorder');
            pnModSetVar('News', 'itemsperpage', 25);

        case '1.5':
            $tables = pnDBGetTables();
            $shorturlsep = pnConfigGetVar('shorturlsseparator');
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
                    LogUtil::registerError(__('Error! Could not update table.', $dom));
                    return '1.5';
                }
            }
            // drop the old columns
            DBUtil::dropColumn('stories', array('pn_aid'));
            DBUtil::dropColumn('stories', array('pn_time'));
            pnModSetVar('News', 'permalinkformat', '%year%/%monthnum%/%day%/%storytitle%');

        case '2.0':
            // import autonews and queue articles
            if (!_news_import_autonews_queue()) {
                LogUtil::registerError(__('Error! Could not update articles.', $dom));
                return '2.0';
            }
            // migrate the comments to ezcomments
            if (pnModAvailable('Comments') || defined('_PNINSTALLVER')) {
                // check for the ezcomments module
                if (!pnModAvailable('EZComments')) {
                    LogUtil::registerError(__f('Error! The \'%s\' module is not installed.', 'EZComments', $dom));
                    return '2.0';
                }
                //  drop the comments table if successful
                if (pnModAPIFunc('EZComments', 'migrate', 'news')) {
                    // drop comments table after migration has succeeded
                    if (!DBUtil::dropTable('comments')) {
                        LogUtil::registerError(__('Error! Could not delete table.', $dom));
                        return '2.0';
                    }
                    // remove the Comments module
                    pnModAPIFunc('Modules', 'admin', 'remove', array('id' => pnModGetIDFromName('Comments')));
                }
            }
            // drop the autonews and queue tables, articles are already imported
            if (!DBUtil::dropTable('autonews')) {
                LogUtil::registerError(__('Error! Could not delete table.', $dom));
                return '2.0';
            }
            if (!DBUtil::dropTable('queue')) {
                LogUtil::registerError(__('Error! Could not delete table.', $dom));
                return '2.0';
            }
            // remove the AddStory and Submit_News modules
            pnModAPIFunc('Modules', 'admin', 'remove', array('id' => pnModGetIDFromName('AddStory')));
            pnModAPIFunc('Modules', 'admin', 'remove', array('id' => pnModGetIDFromName('Submit_News')));

        case '2.1':
            pnModSetVar('News', 'enablecategorization', true);
            pnModDBInfoLoad('News', 'News', true);

            if (!_news_migratecategories()) {
                LogUtil::registerError(__('Error! Could not migrate categories.', $dom));
                return '2.1';
            }

        case '2.2':
            pnModSetVar('News', 'refereronprint', pnConfigGetVar('refereronprint', 0));

        case '2.3':
            $prefix = pnConfigGetVar('prefix');
            // when from is not set, put it to the creation date
            $sqls = array();
            $sqls[] = "UPDATE {$prefix}_stories SET pn_from = pn_cr_date WHERE pn_from IS NULL";
            // make sure we dont have an NULL hometext, since the tables permitted this before 2.4
            $sqls[] = "UPDATE {$prefix}_stories SET pn_hometext = '' WHERE pn_hometext IS NULL";
            foreach ($sqls as $sql) {
                if (!DBUtil::executeSQL($sql)) {
                    LogUtil::registerError(__('Error! Could not update table.', $dom));
                    return '2.3';
                }
            }
            pnModSetVar('News', 'enableattribution', false);
            // import the topicimagepath, variable tipath deletion is up to Topics module
            pnModSetVar('News', 'catimagepath', pnConfigGetVar('tipath'));
            pnModSetVar('News', 'enableajaxedit', false);
            // drop old legacy columns
            DBUtil::dropColumn('stories', 'pn_comments');
            DBUtil::dropColumn('stories', 'pn_themeoverride');
            // clear compiled templates and News cache (see #74)
            pnModAPIFunc('pnRender', 'user', 'clear_compiled');
            pnModAPIFunc('pnRender', 'user', 'clear_cache', array('module' => 'News'));

        case '2.4':
        case '2.4.1':
            // rename the database table from stories to news
            if (!DBUtil::renameTable('stories', 'news')) {
                LogUtil::registerError(__('Error! Could not rename table.', $dom));             
                return '2.4.1';
            }
        case '2.4.2':
            // rename several columns, tables holds the old names for backwards compatibility still
            $columns = array_keys(DBUtil::metaColumns('news', true));
            
            if (in_array('PN_WITHCOMM', $columns) && !DBUtil::renameColumn('news', 'pn_withcomm', 'disallowcomments')) {
                LogUtil::registerError(__('Error! Could not rename column.', $dom));             
                return '2.4.2';
            }
            if (in_array('PN_INFORMANT', $columns) && !DBUtil::renameColumn('news', 'pn_informant', 'contributor')) {
                LogUtil::registerError(__('Error! Could not rename column.', $dom));             
                return '2.4.2';
            }
            if (in_array('PN_IHOME', $columns) && !DBUtil::renameColumn('news', 'pn_ihome', 'hideonindex')) {
                LogUtil::registerError(__('Error! Could not rename column.', $dom));             
                return '2.4.2';
            }
        case '2.4.3':
            // update table for missing fields etc
            if (!DBUtil::changeTable('news')) {
                return '2.4.3';
            }
            // update permissions with new scheme News::
            pnMOdDBInfoLoad('Categories');
            $tables  = pnDBGetTables();
            $grperms = $tables['group_perms_column'];

            $sqls   = array();
            $sqls[] = "UPDATE $tables[group_perms] SET $grperms[component] = 'News::' WHERE $grperms[component] = 'Stories::Story'";
            // update categories_mapobj and categories_registry with new tablename (categories tables not in $tables ?)
            $sqls[] = "UPDATE $tables[categories_mapobj] SET cmo_table='news' WHERE cmo_table='stories'";
            $sqls[] = "UPDATE $tables[categories_registry] SET crg_table='news' WHERE crg_table='stories'";
            foreach ($sqls as $sql) {
                if (!DBUtil::executeSQL($sql)) {
                    LogUtil::registerError(__('Error! Could not update table.', $dom));
                    return '2.4.3';
                }
            }
            // Add new variable(s)
            pnModSetVar('News', 'enablemorearticlesincat', false);
            pnModSetVar('News', 'morearticlesincat', 0);
            pnModSetVar('News', 'notifyonpending', false);
            pnModSetVar('News', 'notifyonpending_fromname', '');
            pnModSetVar('News', 'notifyonpending_fromaddress', '');
            pnModSetVar('News', 'notifyonpending_toname', '');
            pnModSetVar('News', 'notifyonpending_toaddress', '');
            pnModSetVar('News', 'notifyonpending_subject', __('A News Publisher article has been submitted for review', $dom));
            pnModSetVar('News', 'notifyonpending_html', true);
            pnModSetVar('News', 'pdflink', false);
            pnModSetVar('News', 'pdflink_tcpdfpath', 'config/classes/tcpdf/tcpdf.php');
            pnModSetVar('News', 'pdflink_tcpdflang', 'config/classes/tcpdf/config/lang/eng.php');
            pnModSetVar('News', 'pdflink_headerlogo', 'tcpdf_logo.jpg');
            pnModSetVar('News', 'pdflink_headerlogo_width', '30');
            
            // clear compiled templates and News cache
            pnModAPIFunc('pnRender', 'user', 'clear_compiled');
            pnModAPIFunc('pnRender', 'user', 'clear_cache', array('module' => 'News'));

        case '2.5':
            // update table
            if (!DBUtil::changeTable('news')) {
                return '2.5';
            }
        case '2.5.1':
        case '2.5.2':
            // migration routines
    }

    // Update successful
    return true;
}

/**
 * delete the News module once
 *
 * @return       bool       true on success, false otherwise
 */
function News_delete()
{
    // drop table
    if (!DBUtil::dropTable('news')) {
        return false;
    }

    // Delete module variables
    pnModDelVar('News');

    // Delete entries from category registry
    pnModDBInfoLoad ('Categories');
    DBUtil::deleteWhere('categories_registry', "crg_modname='News'");
    DBUtil::deleteWhere('categories_mapobj', "cmo_modname='News'");

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
function News_defaultdata() 
{
    $dom = ZLanguage::getModuleDomain('News');

    // Short URL seperator
    $shorturlsep = pnConfigGetVar('shorturlsseparator');
    $now = DateUtil::getDatetime();
    $uname = pnUserGetVar('uname');
    // set creation date and from to the time set in autonews
    $article = array('title'            => __('News introduction article', $dom),
                     'urltitle'         => __('news_introduction_article', $dom),
                     'hometext'         => __('A news article is divided into an article teaser text (which is the lead-in text you are reading now) and an article body text (which you can view by clicking on the article\'s title or the \'Read more\' link). The teaser will generally be a short introduction to the article, but if you plan to publish only very short bulletins, the teaser can contain the full draft and the article body can be left empty. Click on the article title for more information about Zikula\'s News publisher module.', $dom),
                     'bodytext'         => __f('<h3>More about the News module</h3><p>You are now reading the body text of the article (starting as from the \'More about the News module\' title above). Both the article teaser and the article body can contain URL links, images, mark-up (HTML tags and, if you have the additional necessary add-ons installed, other mark-up languages such as BBCode) You can learn more about the News module by reading the <a href="http://code.zikula.org/news/wiki#Documentation">News Wiki Documentation</a>.</p><h3>Some more details</h3><p><img src="modules/News/pnimages/admin.gif" width="48" height="48" class="z-floatleft" alt="News publisher admin image"/>To control what HTML tags can be included in an article to format and enhance it, the site administrator should set the desired tags to enabled status by visiting the <a href="index.php?module=SecurityCenter&type=admin&func=allowedhtml">Security centre</a>. With the News module, you can take advantage of Zikula\'s permissions system to control who gets what access to which parts of the News module. A moderator group can be created, containing registered site users who can add, edit and delete articles. This is just a simple example: the Zikula permissions system is sufficiently flexible to let you implement practically any organisation you want.</p><p>You can edit or delete this introductory article by clicking on the link beside the article title, or you can visit to the <a href="index.php?module=%s&type=admin&func=view">News admin pages</a>.</p>', __('News', $dom), $dom),
                     'counter'          => 0,
                     'contributor'      => $uname,
                     'approver'         => $uname,
                     'notes'            => '',
                     'hideonindex'      => 0,
                     'language'         => '',
                     'disallowcomments' => 1,
                     'format_type'      => 0,
                     'published_status' => 0,
                     'from'             => $now,
                     'weight'           => 0,
                     'cr_date'          => $now);

    // Insert the default article and preserve the standard fields
    if (!($obj = DBUtil::insertObject($article, 'news', 'sid'))) {
        LogUtil::registerStatus(__('Warning! Could not create the default News introductory article.', $dom)); 
    }
    $obj = array('sid'  => $obj['sid'], 'from' => $obj['cr_date']);
    if (!DBUtil::updateObject($obj, 'news', '', 'sid')) {
        LogUtil::registerStatus(__('Warning! Could not update the default News introductory article.', $dom)); 
    }
}

/**
 * migrate old local categories to the categories module
 */
function _news_migratecategories()
{
    $dom = ZLanguage::getModuleDomain('News');

    // load the admin language file
    // pull all data from the old tables
    $tables = pnDBGetTables();
    $sql = "SELECT pn_catid, pn_title FROM {$tables[stories_cat]}";
    $result = DBUtil::executeSQL($sql);
    $categories = array(array(0, 'Articles'));
    for (; !$result->EOF; $result->MoveNext()) {
        $categories[] = $result->fields;
    }
    $sql = "SELECT pn_topicid, pn_topicname, pn_topicimage, pn_topictext FROM {$tables[topics]}";
    $result = DBUtil::executeSQL($sql);
    $topics = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $topics[] = $result->fields;
    }

    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();

    // create the Main category and entry in the categories registry
    _news_createdefaultcategory('/__SYSTEM__/Modules/News');

    // create the Topics category and entry in the categories registry
    _news_createtopicscategory('/__SYSTEM__/Modules/Topics');

    // get the category path for which we're going to insert our upgraded News categories
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/News');

    // migrate our main categories
    $categorymap = array();
    foreach ($categories as $category) {
        $cat = new PNCategory ();
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
        $cat = new PNCategory ();
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
    pnModSetVar('News', 'topicproperty', 'Topic');

    // migrate page category assignments
    $sql = "SELECT pn_sid, pn_catid, pn_topic FROM {$tables[stories]}";
    $result = DBUtil::executeSQL($sql);
    $pages = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $pages[] = array('sid' => $result->fields[0],
                         '__CATEGORIES__' => array('Main' => $categorymap[$result->fields[1]],
                                                   'Topic' => $topicsmap[$result->fields[2]]),
                         '__META__' => array('module' => 'News'));
    }
    foreach ($pages as $page) {
        if (!DBUtil::updateObject($page, 'stories', '', 'sid')) {
            return LogUtil::registerError(__('Error! Could not update the article categories.', $dom));
        }
    }

    // drop old table
    DBUtil::dropTable('stories_cat');
    // we don't drop the topics table - this is the job of the topics module

    // finally drop the secid column
    DBUtil::dropColumn('stories', 'pn_catid');
    DBUtil::dropColumn('stories', 'pn_topic');

    return true;
}

/**
 * create the default category tree
 */
function _news_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('News');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $nCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/News');

    if (!$nCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'News');
        $cat->setDataField('display_name', array($lang => __('News publisher', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Provides the ability to publish and manage news articles contributed by site users, with support for news categories and various associated blocks.', $dom)));
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
        $registry = new PNCategoryRegistry();
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
function _news_createtopicscategory($regpath = '/__SYSTEM__/Modules/Topics')
{
    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('News');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');

    // create placeholder for all the migrated topics
    $tCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Topics');

    if (!$tCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'Topics');
        // pnModLangLoad doesn't handle type 1 modules
        //pnModLangLoad('Topics', 'version');
        $cat->setDataField('display_name', array($lang => __('Topics', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Display and manage topics', $dom)));
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
        $registry = new PNCategoryRegistry();
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
function _news_import_autonews_queue()
{
    $dom = ZLanguage::getModuleDomain('News');

    $tables = pnDBGetTables();
    $shorturlsep = pnConfigGetVar('shorturlsseparator');

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
                      'lu_uid'        => pnUserGetVar('uid'));

        // Insert the imoprted object in stories and preserve the creation/lastupdated values set above.
        $res = DBUtil::insertObject($objj, 'stories', 'sid', true);

        // Manually update the topic and catid, since those are not in pntables and still needed for category migration
        $sql = "UPDATE $tables[stories] SET pn_catid = '".$obj['catid']."', pn_topic = '".$obj['topic']."' WHERE pn_sid = ".$objj['sid'];
        if (!DBUtil::executeSQL($sql)) {
            return LogUtil::registerError(__('Error! Could not update table.', $dom));
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
                      'lu_uid'        => pnUserGetVar('uid'));

        // Insert the imported object in stories and preserve the creation/lastupdated values set above.
        $res = DBUtil::insertObject($objj, 'stories', 'sid', true);

        // Manually update the topic and catid, since those are not in pntables and still needed for category migration
        $sql = "UPDATE $tables[stories] SET pn_catid = '0', pn_topic = '".$obj['topic']."' WHERE pn_sid = ".$objj['sid'];
        if (!DBUtil::executeSQL($sql)) {
            return LogUtil::registerError(__('Error! Could not update table.', $dom));
        }
        $i++;
    }
    $result->Close();

    return true;
}
