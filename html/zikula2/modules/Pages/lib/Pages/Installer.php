<?php
class Pages_Installer extends Zikula_AbstractInstaller
{
    /**
     * init pages module
     */
    public function install()
    {
        // create table
        if (!DBUtil::createTable('pages')) {
            return false;
        }

        // set up config variables
        $modvars = array(
                'itemsperpage' => 25,
                'enablecategorization' => true,
                'addcategorytitletopermalink' => true,
                'showpermalinkinput' => true,
                'def_displaywrapper' => true,
                'def_displaytitle' => true,
                'def_displaycreated' => true,
                'def_displayupdated' => true,
                'def_displaytextinfo' => true,
                'def_displayprint' => true
        );

        // create our default category
        if (!$this->_createdefaultcategory()) {
            LogUtil::registerStatus($this->__('Warning! Could not create the default Pages category tree. If you want to use categorization for the pages, register at least one property for the module in the Category Registry.'));
            $modvars['enablecategorization'] = false;
        }

        // set up module variables
        $this->setVars($modvars);

        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
        
        $this->createIntroPage();

        // initialisation successful
        return true;
    }

    /**
     * upgrade the pages module
     */
    public function upgrade($oldversion)
    {
        // rename table if upgrading from an earlier version
        if (in_array(DBUtil::getLimitedTablename('seccont'), DBUtil::MetaTables())) {
            DBUtil::renameTable('seccont', 'pages');
            DBUtil::renameColumn('pages', 'pn_artid', 'pageid');
        }

        switch ($oldversion)
        {
            // 1.0 shipped with .7x
            case '1.0':
            // populate permalinks for existing content
                $tables = DBUtil::getTables();
                $shorturlsep = System::getVar('shorturlsseparator');
                $sqls   = array();
                $sqls[] = "UPDATE $tables[pages] SET pn_urltitle = REPLACE(pn_title, ' ', '{$shorturlsep}')";
                $sqls[] = "UPDATE $tables[pages] SET pn_cr_date = '".DateUtil::getDatetime()."'";
                $sqls[] = "UPDATE $tables[pages] SET pn_displaywrapper = 0";
                foreach ($sqls as $sql) {
                    if (!DBUtil::executeSQL($sql)) {
                        return LogUtil::registerError($this->__('Error! Update attempt failed.'));
                    }
                }
                $this->setVar('itemsperpage', 25);

            case '2.0':
            case '2.1':
                $this->setVar('enablecategorization', true);
                $this->setVar('addcategorytitletopermalink', true);
                ModUtil::dbInfoLoad('Pages', 'Pages', true);
                if (!$this->_migratecategories()) {
                    LogUtil::registerError($this->__('Error! Update attempt failed.'));
                    return '2.1';
                }

            case '2.2':
                if (!$this->_migratedisplayvars()) {
                    LogUtil::registerError($this->__('Error! Update attempt failed.'));
                    return '2.2';
                }

            // gettext conversion
            case '2.3':
                $this->setVar('showpermalinkinput', true);
                if (!$this->_migrategtlanguage()) {
                    LogUtil::registerError($this->__('Error! Update attempt failed.'));
                    return '2.3';
                }

            case '2.4':
            case '2.4.1':
            case '2.4.2':
                $prefix = $this->serviceManager['prefix'];
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sqlStatements = array();
                // N.B. statements generated with PHPMyAdmin
                $sqlStatements[] = 'RENAME TABLE ' . $prefix . '_pages' . " TO `pages`";
                $sqlStatements[] = "ALTER TABLE `pages` 
CHANGE `pn_pageid` `pageid` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE `pn_title` `title` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_content` `content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_counter` `counter` INT( 11 ) NOT NULL DEFAULT '0',
CHANGE `pn_language` `language` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_urltitle` `urltitle` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_displaywrapper` `displaywrapper` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_displaytitle` `displaytitle` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_displaycreated` `displaycreated` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_displayupdated` `displayupdated` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_displaytextinfo` `displaytextinfo` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_displayprint` `displayprint` TINYINT( 4 ) NOT NULL DEFAULT '1',
CHANGE `pn_obj_status` `obj_status` CHAR( 1 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A',
CHANGE `pn_cr_date` `cr_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
CHANGE `pn_cr_uid` `cr_uid` INT( 11 ) NOT NULL DEFAULT '0',
CHANGE `pn_lu_date` `lu_date` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
CHANGE `pn_lu_uid` `lu_uid` INT( 11 ) NOT NULL DEFAULT '0'";
                foreach ($sqlStatements as $sql) {
                    $stmt = $connection->prepare($sql);
                    try {
                        $stmt->execute();
                    } catch (Exception $e) {
                    }   
                }
                HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
                // set defaults for modvars that should have been set in 2.2 upgrade
                $this->resetModVars();
                // update table
                if (!DBUtil::changeTable('pages')) {
                    return '2.4.2';
                }
            // further upgrade routines
        }

        // Update successful
        return true;
    }

    /**
     * delete the pages module
     */
    public function uninstall()
    {
        // drop table
        if (!DBUtil::dropTable('pages')) {
            return false;
        }

        // Delete any module variables
        $this->delVars();

        // Delete entries from category registry
        ModUtil::dbInfoLoad('Categories');
        DBUtil::deleteWhere('categories_registry', "modname = 'Pages'");
        DBUtil::deleteWhere('categories_mapobj', "modname = 'Pages'");

        HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());

        // Deletion successful
        return true;
    }

    /**
     * migrate old local categories to the categories module
     */
    private function _migratecategories()
    {
        // load the admin language file
        // pull all data from the old table
        $prefix = System::getVar('prefix');
        $sql    = "SELECT pn_secname, pn_image, pn_secid FROM {$prefix}_sections";
        $result = DBUtil::executeSQL($sql);
        $categories = array();
        for (; !$result->EOF; $result->MoveNext()) {
            $categories[] = $result->fields;
        }

        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // create root category and entry in the categories registry
        $this->_createdefaultcategory('/__SYSTEM__/Modules/Pages');

        // get the category path for which we're going to insert our upgraded categories
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Pages');

        // migrate our categories
        $categorymap = array();
        foreach ($categories as $category) {
            $cat = new Categories_DBObject_Category ();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', $category[0]);
            $cat->setDataField('display_name', array($lang => $category[0]));
            $cat->setDataField('display_desc', array($lang => $category[0]));
            $cat->setDataField('data1', $category[1]);
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
            $categorymap[$category[2]] = $cat->getDataField('id');
        }

        // migrate page category assignments
        $sql = "SELECT pn_pageid, pn_secid FROM {$prefix}_pages";
        $result = DBUtil::executeSQL($sql);
        $pages = array();
        for (; !$result->EOF; $result->MoveNext()) {
            $pages[] = array('pageid' => $result->fields[0],
                    '__CATEGORIES__' => array('Main' => $categorymap[$result->fields[1]]),
                    '__META__' => array('module' => 'Pages'));
        }

        foreach ($pages as $page) {
            if (!DBUtil::updateObject($page, 'pages', '', 'pageid')) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }

        // drop old table
        DBUtil::dropTable('sections');

        // finally drop the secid column
        DBUtil::dropColumn('pages', 'pn_secid');

        return true;
    }

    /**
     * Migrate the language dbfield to a gettext code
     */
    private function _migrategtlanguage()
    {

        $obj = DBUtil::selectObjectArray('pages');

        if (count($obj) == 0) {
            // nothing to do
            return;
        }

        foreach ($obj as $pageid) {
            // translate l3 -> l2
            if ($l2 = ZLanguage::translateLegacyCode($pageid['language'])) {
                $pageid['language'] = $l2;
            }
            DBUtil::updateObject($pageid, 'pages', '', 'pageid', true);
        }

        return true;
    }

    /**
     * Update the additional page settings value
     */
    private function _migratedisplayvars()
    {
        $dbtable = DBUtil::getTables();

        $pagestable = $dbtable['pages'];
        $pagescolumn = &$dbtable['pages_column'];

        $sql = "UPDATE $pagestable
            SET $pagescolumn[displaytitle] = 0,
                $pagescolumn[displaycreated] = 0,
                $pagescolumn[displayupdated] = 0,
                $pagescolumn[displaytextinfo] = 0,
                $pagescolumn[displayprint] = 0
            WHERE $pagescolumn[displaywrapper] = 0";

        $updateResult = DBUtil::executeSQL($sql);

        if ($updateResult === false) {
            return false;
        }

        return true;
    }

    /**
     * Create and register the Pages module category
     */
    private function _createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
    {
        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // get the category path for which we're going to insert our place holder category
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
        $pCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Pages');

        if (!$pCat) {
            // create placeholder for all our migrated categories
            $cat = new Categories_DBObject_Category ();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', 'Pages');
            $cat->setDataField('display_name', array($lang => $this->__('Pages')));
            $cat->setDataField('display_desc', array($lang => $this->__('Static pages')));
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
        }

        // get the category path for which we're going to insert our upgraded categories
        $rootcat = CategoryUtil::getCategoryByPath($regpath);
        if ($rootcat) {
            // create an entry in the categories registry
            $registry = new Categories_DBObject_Registry();
            $registry->setDataField('modname', 'Pages');
            $registry->setDataField('table', 'pages');
            $registry->setDataField('property', 'Main');
            $registry->setDataField('category_id', $rootcat['id']);
            $registry->insert();
        } else {
            return false;
        }

        return true;
    }
    
    private function createIntroPage()
    {
        $page = array(
            'title'          => 'Welcome to Pages content manager',
            'urltitle'       => 'welcome-to-pages-content-manager',
            'content'        => "This is a sample demonstration page. You can use Pages to create simple content pages. It is excellent if you only need basic html for your pages. You can utilize the Scribite module as well to WYSIWYG content creation. It is well suited to informational articles, documents and other 'long term' type content items.<br /><br />Pages is a hookable module which allows you to Hook EZComments or other hook providers to extend the capabilities of your content.",
            'counter'        => 0,
            'displaywrapper' => 1,
            'displaytitle'   => 1,
            'displaycreated' => 1,
            'displayupdated' => 1,
            'displaytextinfo' => 1,
            'displayprint'   => 1,
            'language'       => 'en');

        // Insert the default article and preserve the standard fields
        if (!($obj = DBUtil::insertObject($page, 'pages', 'pageid'))) {
            LogUtil::registerStatus($this->__('Warning! Could not create the introductory page.'));
        }
    }
    
    private function resetModVars()
    {
        $vars = array('def_displaywrapper' => true,
            'def_displaytitle' => true,
            'def_displaycreated' => true,
            'def_displayupdated' => true,
            'def_displaytextinfo' => true,
            'def_displayprint' => true);
        foreach ($vars as $name => $value) {
            $currentValue = $this->getVar($name, null);
            if (!isset($currentValue)) {
                $this->setVar($name, $value);
            }
        }
    }
}