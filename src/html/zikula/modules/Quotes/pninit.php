<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

/**
 * Init quotes module
 * @author The Zikula Development Team
 * @return true if init successful, false otherwise
 */
function Quotes_init()
{
    $dom = ZLanguage::getModuleDomain('Quotes');

    // create table
    if (!DBUtil::createTable('quotes')) {
        return false;
    }

    // create our default category
    if (!_quotes_createdefaultcategory()) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }

    // set up module variables
    pnModSetVar('Quotes', 'itemsperpage', 25);
    pnModSetVar('Quotes', 'catmapcount', 3);
    pnModSetVar('Quotes', 'enablecategorization', true);

    // initialisation successful
    return true;
}

/**
 * Upgrade quotes module
 * @author The Zikula Development Team
 * @return true if init successful, false otherwise
 */
function Quotes_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Quotes');

    // update table
    if (!DBUtil::changeTable('quotes')) {
        return false;
    }

    // upgrade dependent on old version number
    switch($oldversion)
    {
        case '1.3':
            // version 1.3 was shipped with .72x/.75
            pnModSetVar('Quotes', 'itemsperpage', 25);
            // we don't need these variables anymore
            pnModDelVar('Quotes', 'detail');
            pnModDelVar('Quotes', 'table');
            Quotes_upgrade(1.5);
            break;

        case '1.5':
            // version 1.5 was shipped with .76x
            // migrate the quotes into the default category
            if (!_quotes_migratecategories()) {
                return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
            }
            Quotes_upgrade(2.0);
            break;

        case '2.0':
            // remove the mapcatcount variable
            pnModDelVar('Quotes', 'catmapcount');
            Quotes_upgrade(2.1);
            break;

        case '2.1':
            // add the categorization variable
            pnModSetVar('Quotes', 'enablecategorization', true);
            Quotes_upgrade(2.2);
            break;
    }

    // upgrade success
    return true;
}

/**
 * Delete quotes module
 * @author The Zikula Development Team
 * @return true if init successful, false otherwise
 */
function Quotes_delete()
{
    if (!DBUtil::dropTable('quotes')) {
        return false;
    }

    // delete module variables
    pnModDelVar('Quotes');

    // delete entries from category registry 
    pnModDBInfoLoad('Categories');
    Loader::loadArrayClassFromModule('Categories', 'CategoryRegistry');
    $registry = new PNCategoryRegistryArray();
    $registry->deleteWhere('crg_modname=\'Quotes\'');

    // deletion successful
    return true;
}

function _quotes_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language
    $lang = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('Quotes');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $qCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Quotes');

    if (!$qCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'Quotes');
        $cat->setDataField('display_name', array($lang => __('Quotes', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Random quotes', $dom)));
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
        $registry->setDataField('modname', 'Quotes');
        $registry->setDataField('table', 'quotes');
        $registry->setDataField('property', 'Main');
        $registry->setDataField('category_id', $rootcat['id']);
        $registry->insert();
    } else {
        return false;
    }

    return true;
}

/**
 * migrate old local categories to the categories module
 */
function _quotes_migratecategories()
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('Quotes');
    $catPath = '/__SYSTEM__/Modules/Quotes';

    // create root category and entry in the categories registry
    _quotes_createdefaultcategory($catPath);

    // get the category path for which we're going to insert our upgraded categories
    $rootcat = CategoryUtil::getCategoryByPath($catPath);

    // create placeholder for all our migrated quotes
    $cat = new PNCategory();
    $cat->setDataField('parent_id', $rootcat['id']);
    $cat->setDataField('name', 'Imported');
    $cat->setDataField('display_name', array($lang => __('Imported quotes', $dom)));
    $cat->setDataField('display_desc', array($lang => __('Quotes imported from .7x version', $dom)));
    if (!$cat->validate('admin')) {
        return false;
    }
    $cat->insert();
    $cat->update();
    $catid = $cat->getDataField('id');
    unset($cat);

    // migrate page category assignments
    $prefix = pnConfigGetVar('prefix');
    $sql = "SELECT pn_qid FROM {$prefix}_quotes";
    $result = DBUtil::executeSQL($sql);
    $quotes = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $quotes[] = array('qid' => $result->fields[0],
                         '__CATEGORIES__' => array('Main' => $catid),
                         '__META__' => array('module' => 'Quotes'));
    }

    foreach ($quotes as $quote) {
        if (!DBUtil::updateObject($quote, 'quotes', '', 'qid')) {
            return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
        }
    }

    return true;
}
