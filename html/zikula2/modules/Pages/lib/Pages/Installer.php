<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Provides module installation and upgrade services.
 */
class Pages_Installer extends Zikula_AbstractInstaller
{
    /**
     * initialise the template module
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance
     *
     * @return boolean
     */
    public function install()
    {
        // create table
        $entities = array(
            'Pages_Entity_Page',
            'Pages_Entity_Category'
        );
        try {
            DoctrineHelper::createSchema($this->entityManager, $entities);
        } catch (Exception $e) {
            LogUtil::registerStatus($e->getMessage());
            return false;
        }

        // insert default category
        try {
            $this->createCategoryTree();
        } catch (Exception $e) {
            LogUtil::registerError($this->__f('Did not create default categories (%s).', $e->getMessage()));
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
        $this->setVars($modvars);

        // create our default category
        /*if (!$this->_createdefaultcategory()) {
            LogUtil::registerStatus($this->__('Warning! Could not create the default Pages category tree. If you want to use categorization for the pages, register at least one property for the module in the Category Registry.'));
            $modvars['enablecategorization'] = false;
        }*/


        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
        
        $this->createIntroPage();

        // initialisation successful
        return true;
    }

    /**
     * Upgrade the errors module from an old version
     *
     * This function must consider all the released versions of the module!
     * If the upgrade fails at some point, it returns the last upgraded version.
     *
     * @param string $oldversion Version number string to upgrade from.
     *
     * @return mixed True on success, last valid version string or false if fails.
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
                // no changes
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
                // no changes
            case '2.4.1':
                // no changes
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
            case '2.5.0':
                // no changes
            case '2.5.1':
                // create categories table
                try {
                    DoctrineHelper::createSchema($this->entityManager, array('Pages_Entity_Category'));
                } catch (Exception $e) {
                    LogUtil::registerStatus($e->getMessage());
                    return false;
                }
                // move relations from categories_mapobj to Pages_calendarevent_category
                // then delete old data
                $connection = $this->entityManager->getConnection();
                $sqls = array();
                $sqls[] = "INSERT INTO pages_category (entityId, registryId, categoryId) SELECT obj_id, reg_id, category_id FROM categories_mapobj WHERE modname = 'Pages' AND tablename = 'pages'";
                $sqls[] = "DELETE FROM categories_mapobj WHERE modname = 'Pages' AND tablename = 'pages'";

                // update category registry data to change tablename to EntityName
                $sqls[] = "UPDATE categories_registry SET tablename = 'Pages' WHERE tablename = 'pages'";

                // do changes
                foreach ($sqls as $sql) {
                    $stmt = $connection->prepare($sql);
                    try {
                        $stmt->execute();
                    } catch (Exception $e) {
                        LogUtil::registerError($e->getMessage());
                    }
                }
            case '2.6.0':
                // future upgrades
        }

        // Update successful
        return true;
    }

    /**
     * delete the errors module
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance
     *
     * @return boolean
     */
    public function uninstall()
    {
        // drop table
        $entities = array(
            'Pages_Entity_Page',
            'Pages_Entity_Category'
        );
        DoctrineHelper::dropSchema($this->entityManager, $entities);

        // Delete any module variables
        $this->delVars();

        // Delete entries from category registry
        CategoryRegistryUtil::deleteEntry('Pages');

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
            $cat = new Categories_DBObject_Category();
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
            return false;
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
     * create the category tree
     *
     * @throws Zikula_Exception_Forbidden If Root category not found.
     *
     * @return boolean
     */
    private function createCategoryTree()
    {
        // create category
        CategoryUtil::createCategory(
            '/__SYSTEM__/Modules',
            'Pages',
            null,
            $this->__('Pages'),
            $this->__('Static pages')
        );
        // create subcategory
        CategoryUtil::createCategory(
            '/__SYSTEM__/Modules/Pages',
            'Category1',
            null,
            $this->__('Category 1'),
            $this->__('Initial sub-category created on install'),
            array('color' => '#99ccff')
        );
        CategoryUtil::createCategory(
            '/__SYSTEM__/Modules/Pages',
            'Category2',
            null,
            $this->__('Category 2'),
            $this->__('Initial sub-category created on install'),
            array('color' => '#cceecc')
        );
        // get the category path to insert Pages categories
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Pages');
        if ($rootcat) {
            // create an entry in the categories registry to the Main property
            if (!CategoryRegistryUtil::insertEntry('Pages', 'Pages', 'Main', $rootcat['id'])) {
                throw new Zikula_Exception("Cannot insert Category Registry entry.");
            }
        } else {
            $this->throwNotFound("Root category not found.");
        }

        return true;
    }


    private function createIntroPage()
    {
        $content = $this->__(
            'This is a sample demonstration page. You can use Pages to create simple content pages. It is excellent '.
            'if you only need basic html for your pages. You can utilize the Scribite module as well to WYSIWYG '.
            'content creation. It is well suited to informational articles, documents and other "long term" type '.
            'content items.'.
            '<br /><br />'.
            'Pages is a hookable module which allows you to Hook EZComments or other hook providers to extend the '.
            'capabilities of your content.'
        );
        $data = array(
            'title'           => $this->__('Welcome to Pages content manager'),
            'urltitle'        => $this->__('welcome-to-pages-content-manager'),
            'content'         => $content,
            'language'        => ZLanguage::getLanguageCode()
        );
        $page = new Pages_Entity_Page();
        $page->merge($data);
        $this->entityManager->persist($page);
        $this->entityManager->flush();
    }
    
    private function resetModVars()
    {
        $vars = array(
            'def_displaywrapper' => true,
            'def_displaytitle' => true,
            'def_displaycreated' => true,
            'def_displayupdated' => true,
            'def_displaytextinfo' => true,
            'def_displayprint' => true
        );
        foreach ($vars as $name => $value) {
            $currentValue = $this->getVar($name, null);
            if (!isset($currentValue)) {
                $this->setVar($name, $value);
            }
        }
    }
}