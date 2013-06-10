<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Feeds_Installer extends Zikula_AbstractInstaller {

    /**
     * initialise the Feeds module
     */
    public function install() {
        // create table
        if (!DBUtil::createTable('feeds')) {
            return false;
        }

        // create cache directory
        CacheUtil::createLocalDir('feeds');

        // set up config variables
        $modvars = array(
            'enablecategorization' => true,
            'bold' => false,
            'openinnewwindow' => false,
            'itemsperpage' => 10,
            'cachedirectory' => 'feeds',
            'cacheinterval' => 180,
            'multifeedlimit' => 0,
            'feedsperpage' => 10,
            'usingcronjob' => 0,
            'key' => md5(time())
        );

        // create our default category
        if (!$this->_feeds_createdefaultcategory()) {
            LogUtil::registerStatus(__('Warning! Could not create the default Feeds category tree. If you want to use categorisation with Feeds, register at least one property for the module in the Category Registry.'));
            $modvars['enablecategorization'] = false;
        }

        // set up module variables
        ModUtil::setVars('Feeds', $modvars);

        // initialisation successful
        return true;
    }

    /**
     * upgrade the Feeds module from an old version
     * This function can be called multiple times
     */
    public function upgrade($oldversion) {
        $dom = ZLanguage::getModuleDomain('Feeds');

        // when upgrading let's clear the cache directory
        CacheUtil::clearLocalDir('feeds');

        switch ($oldversion) {
            // version 1.0 shipped with PN .7x
            case '1.0':
                // rename table if upgrading from an earlier version
                if (in_array(DBUtil::getLimitedTablename('RSS'), DBUtil::MetaTables())) {
                    DBUtil::renameTable('RSS', 'feeds');
                }
                if (in_array(DBUtil::getLimitedTablename('rss'), DBUtil::MetaTables())) {
                    DBUtil::renameTable('rss', 'feeds');
                }

                // create cache directory
                CacheUtil::createLocalDir('feeds');

                // migrate module vars
                $tables = DBUtil::getTables();
                $sql = "UPDATE $tables[module_vars] SET pn_modname = 'Feeds' WHERE pn_modname = 'RSS'";
                if (!DBUtil::executeSQL($sql)) {
                    LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                    return '1.0';
                }

                // create our default category
                $this->setVar('enablecategorization', true);
                if (!$this->_feeds_createdefaultcategory()) {
                    LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                    return '1.0';
                }

                // update table
                if (!DBUtil::changeTable('feeds')) {
                    return '1.0';
                }

                // update the permalinks
                $shorturlsep = System::getVar('shorturlsseparator');
                $sql = "UPDATE $tables[feeds] SET pn_urltitle = REPLACE(pn_name, ' ', '{$shorturlsep}')";
                if (!DBUtil::executeSQL($sql)) {
                    LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                    return '1.0';
                }

            case '2.1':
                $modvars = array('multifeedlimit' => 0,
                    'feedsperpage' => 10,
                    'usingcronjob' => 0,
                    'key' => md5(time()));

                if (!ModUtil::setVars('Feeds', $modvars)) {
                    LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                    return '2.1';
                }

            // 2.2 -> 2.3 is the Gettext change
            case '2.2':
            case '2.3':
            case '2.4':
            case '2.5':
                $prefix = $this->serviceManager['prefix'];
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sqlStatements = array();
                // N.B. statements generated with PHPMyAdmin
                $sqlStatements[] = "ALTER TABLE `feeds` 
CHANGE `pn_fid` `fid` INT( 10 ) NOT NULL AUTO_INCREMENT ,
CHANGE `pn_name` `name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_urltitle` `urltitle` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_url` `url` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
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
            // further upgrade routine
        }

        // update successful
        return true;
    }

    /**
     * delete the Feeds module
     */
    public function uninstall() {
        if (!DBUtil::dropTable('feeds')) {
            return false;
        }

        // remove cache directory incl. content
        CacheUtil::removeLocalDir('feeds');

        // delete any module variables
        $this->delVars();

        // delete entries from category registry
        ModUtil::dbInfoLoad('Categories');
        DBUtil::deleteWhere('categories_registry', "modname = 'Feeds'");
        DBUtil::deleteWhere('categories_mapobj', "modname = 'Feeds'");

        // deletion successful
        return true;
    }

    /**
     * create placeholder for categories
     */
    private function _feeds_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global') {
        // load necessary classes
        Loader::loadClass('CategoryUtil');
        Loader::loadClassFromModule('Categories', 'Category');
        Loader::loadClassFromModule('Categories', 'CategoryRegistry');

        // get the language code
        $lang = ZLanguage::getLanguageCode();
        $dom = ZLanguage::getModuleDomain('Feeds');

        // get the category path for which we're going to insert our place holder category
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
        $fCat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Feeds');

        if (!$fCat) {
            // create placeholder for all the module categories
            $cat = new Categories_DBObject_Category();
            $cat->setDataField('parent_id', $rootcat['id']);
            $cat->setDataField('name', 'Feeds');
            $cat->setDataField('display_name', array($lang => __('Feeds', $dom)));
            $cat->setDataField('display_desc', array($lang => __('Feed Reader.', $dom)));
            if (!$cat->validate('admin')) {
                return false;
            }
            $cat->insert();
            $cat->update();
        }

        // get the category path for which the feeds will be classified
        $rootcat = CategoryUtil::getCategoryByPath($regpath);
        if ($rootcat) {
            // create an entry in the categories registry
            $registry = new Categories_DBObject_Registry();
            $registry->setDataField('modname', 'Feeds');
            $registry->setDataField('table', 'feeds');
            $registry->setDataField('property', 'Main');
            $registry->setDataField('category_id', $rootcat['id']);
            $registry->insert();
        } else {
            return false;
        }

        return true;
    }

}