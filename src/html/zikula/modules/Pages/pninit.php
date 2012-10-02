<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 411 2010-04-23 16:02:49Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Pages
 */

/**
 * init pages module
 */
function Pages_init()
{
    $dom = ZLanguage::getModuleDomain('Pages');

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
    if (!_pages_createdefaultcategory()) {
        LogUtil::registerStatus(__('Warning! Could not create the default Pages category tree. If you want to use categorization for the pages, register at least one property for the module in the Category Registry.', $dom));
        $modvars['enablecategorization'] = false;
    }

    // set up module variables
    pnModSetVars('Pages', $modvars);

    // initialisation successful
    return true;
}

/**
 * upgrade the pages module
 */
function Pages_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Pages');

    // rename table if upgrading from an earlier version
    if (in_array(DBUtil::getLimitedTablename('seccont'), DBUtil::MetaTables())) {
        DBUtil::renameTable('seccont', 'pages');
        DBUtil::renameColumn('pages', 'pn_artid', 'pageid');
    }

    // update table
    if (!DBUtil::changeTable('pages')) {
        return false;
    }

    switch ($oldversion)
    {
        // 1.0 shipped with .7x
        case '1.0':
            // populate permalinks for existing content
            $tables = pnDBGetTables();
            $shorturlsep = pnConfigGetVar('shorturlsseparator');
            $sqls   = array();
            $sqls[] = "UPDATE $tables[pages] SET pn_urltitle = REPLACE(pn_title, ' ', '{$shorturlsep}')";
            $sqls[] = "UPDATE $tables[pages] SET pn_cr_date = '".DateUtil::getDatetime()."'";
            $sqls[] = "UPDATE $tables[pages] SET pn_displaywrapper = 0";
            foreach ($sqls as $sql) {
                if (!DBUtil::executeSQL($sql)) {
                    return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                }
            }
            pnModSetVar('Pages', 'itemsperpage', 25);

        case '2.0':
        case '2.1':
            pnModSetVar('Pages', 'enablecategorization', true);
            pnModSetVar('Pages', 'addcategorytitletopermalink', true);
            pnModDBInfoLoad('Pages', 'Pages', true);
            if (!_pages_migratecategories()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.1';
            }

        case '2.2':
            if (!_pages_migratedisplayvars()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.2';
            }

        // gettext conversion
        case '2.3':
            pnModSetVar('Pages', 'showpermalinkinput', true);
            if (!_pages_migrategtlanguage()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.3';
            }

        case '2.4':
        case '2.4.1':
            // further upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the pages module
 */
function Pages_delete()
{
    // drop table
    if (!DBUtil::dropTable('pages')) {
        return false;
    }

    // Delete any module variables
    pnModDelVar('Pages');

    // Delete entries from category registry
    pnModDBInfoLoad('Categories');
    DBUtil::deleteWhere('categories_registry', "crg_modname = 'Pages'");
    DBUtil::deleteWhere('categories_mapobj', "cmo_modname = 'Pages'");

    // Deletion successful
    return true;
}

/**
 * migrate old local categories to the categories module
 */
function _pages_migratecategories()
{
    // load the admin language file
    // pull all data from the old table
    $prefix = pnConfigGetVar('prefix');
    $sql    = "SELECT pn_secname, pn_image, pn_secid FROM {$prefix}_sections";
    $result = DBUtil::executeSQL($sql);
    $categories = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $categories[] = $result->fields;
    }

    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('Pages');

    // create root category and entry in the categories registry
    _pages_createdefaultcategory('/__SYSTEM__/Modules/Pages');

    // get the category path for which we're going to insert our upgraded categories
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Pages');

    // migrate our categories
    $categorymap = array();
    foreach ($categories as $category) {
        $cat = new PNCategory ();
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
            return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
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
function _pages_migrategtlanguage()
{

    $obj = DBUtil::selectObjectArray('pages');

    if (count($obj) == 0) {
        // nothing to do
        //return;
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
function _pages_migratedisplayvars()
{
    $pntable = pnDBGetTables();

    $pagestable = $pntable['pages'];
    $pagescolumn = &$pntable['pages_column'];

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
function _pages_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom  = ZLanguage::getModuleDomain('Pages');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $pCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Pages');

    if (!$pCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'Pages');
        $cat->setDataField('display_name', array($lang => __('Pages', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Static pages', $dom)));
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
        $registry = new PNCategoryRegistry();
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
