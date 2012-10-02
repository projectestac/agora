<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 391 2009-12-20 09:54:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Feeds
 */

/**
 * initialise the Feeds module
 */
function Feeds_init()
{
    $dom = ZLanguage::getModuleDomain('Feeds');

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
    if (!_feeds_createdefaultcategory()) {
        LogUtil::registerStatus(__('Warning! Could not create the default Feeds category tree. If you want to use categorisation with Feeds, register at least one property for the module in the Category Registry.', $dom));
        $modvars['enablecategorization'] = false;
    }

    // set up module variables
    pnModSetVars('Feeds', $modvars);

    // initialisation successful
    return true;
}

/**
 * upgrade the Feeds module from an old version
 * This function can be called multiple times
 */
function Feeds_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Feeds');

    // when upgrading let's clear the cache directory
    CacheUtil::clearLocalDir('feeds');

    switch ($oldversion)
    {
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
            $tables = pnDBGetTables();
            $sql    = "UPDATE $tables[module_vars] SET pn_modname = 'Feeds' WHERE pn_modname = 'RSS'";
            if (!DBUtil::executeSQL($sql)) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '1.0';
            }

            // create our default category
            pnModSetVar('Feeds', 'enablecategorization', true);
            if (!_feeds_createdefaultcategory()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '1.0';
            }

            // update table
            if (!DBUtil::changeTable('feeds')) {
                return '1.0';
            }

            // update the permalinks
            $shorturlsep = pnConfigGetVar('shorturlsseparator');            
            $sql  = "UPDATE $tables[feeds] SET pn_urltitle = REPLACE(pn_name, ' ', '{$shorturlsep}')";
            if (!DBUtil::executeSQL($sql)) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '1.0';
            }

        case '2.1':
            $modvars = array('multifeedlimit' => 0,
                             'feedsperpage' => 10,
                             'usingcronjob' => 0,
                             'key' => md5(time()));

            if (!pnModSetVars('Feeds', $modvars)) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.1';
            }

            // 2.2 -> 2.3 is the Gettext change
        case '2.2':
        case '2.3':
        case '2.4':
            // further upgrade routine
    }

    // update successful
    return true;
}

/**
 * delete the Feeds module
 */
function Feeds_delete()
{
    if (!DBUtil::dropTable('feeds')) {
        return false;
    }

    // remove cache directory incl. content
    CacheUtil::removeLocalDir('feeds');

    // delete any module variables
    pnModDelVar('Feeds');

    // delete entries from category registry
    pnModDBInfoLoad('Categories');
    DBUtil::deleteWhere('categories_registry', "crg_modname = 'Feeds'");
    DBUtil::deleteWhere('categories_mapobj', "cmo_modname = 'Feeds'");

    // deletion successful
    return true;
}

/**
 * create placeholder for categories
 */
function _feeds_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language code
    $lang = ZLanguage::getLanguageCode();
    $dom  = ZLanguage::getModuleDomain('Feeds');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $fCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Feeds');

    if (!$fCat) {
        // create placeholder for all the module categories
        $cat = new PNCategory();
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
        $registry = new PNCategoryRegistry();
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
