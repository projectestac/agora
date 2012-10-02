<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 44 2009-12-20 07:38:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * init faq module
 */
function FAQ_init()
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    // create table
    if (!DBUtil::createTable('faqanswer')) {
        return false;
    }

    // set up config variables
    $modvars = array(
        'itemsperpage' => 25,
        'enablecategorization' => true,
        'catmapcount' => true
    );

    // create our default category
    if (!_faq_createdefaultcategory()) {
        LogUtil::registerStatus(__('Warning! Could not create the default FAQ category tree. If you want to use categorisation with FAQ, register at least one property for the module in the Category Registry.', $dom));
        $modvars['enablecategorization'] = false;
    }

    // set up module variables
    pnModSetVars('FAQ', $modvars);

    // initialisation successful
    return true;
}

/**
 * upgrade
 */
function FAQ_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    switch ($oldversion)
    {
        // version 1.11 shipped with PN .7x
        case '2.0':
        case '2.1':
            pnModSetVar('FAQ', 'enablecategorization', true);
            pnModSetVar('FAQ', 'addcategorytitletopermalink', true);
            pnModDBInfoLoad('FAQ', 'FAQ', true);
            if (!_faq_migratecategories()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.1';
            }

        case '2.2':
        case '2.3':
        case '2.3.1':
            // further upgrade routines
    }

    // upgrade successful
    return true;
}

/**
 * delete the faq module
 */
function FAQ_delete()
{
    // drop ytable
    if (!DBUtil::dropTable('faqanswer')) {
        return false;
    }

    // delete module variables
    pnModDelVar('FAQ');

    // delete entries from category registry 
    pnModDBInfoLoad('Categories');
    DBUtil::deleteWhere('categories_registry', "crg_modname = 'FAQ'");
    DBUtil::deleteWhere('categories_mapobj', "cmo_modname = 'FAQ'");

    // deletion successful
    return true;
}


/**
 * migrate old local categories to the categories module
 */
function _faq_migratecategories()
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    // load the admin language file
    // pull all data from the old table
    $prefix = pnConfigGetVar('prefix');
    $sql = "SELECT pn_categories, pn_id_cat, pn_parent_id FROM {$prefix}_faqcategories";
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

    // create root category and entry in the categories registry
    _faq_createdefaultcategory('/__SYSTEM__/Modules/FAQ');

    // get the category path for which we're going to insert our upgraded categories
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/FAQ');

    // migrate our root categories
    $categorymap = array();
    foreach ($categories as $category) {
        // we'll deal with sub categories on a second pass
        if ($category[2] != 0) continue;
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', $category[0]);
        $cat->setDataField('display_name', array($lang => $category[0]));
        $cat->setDataField('display_desc', array($lang => $category[0]));
        if (!$cat->validate('admin')) {
            return false;
        }
        $cat->insert();
        $cat->update();
        $categorymap[$category[1]] = $cat->getDataField('id');
    }

    // migrate our sub categories
    foreach ($categories as $category) {
        // root categories are already done
        if ($category[2] == 0) continue;
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $categorymap[$category[2]]);
        $cat->setDataField('name', $category[0]);
        $cat->setDataField('display_name', array($lang => $category[0]));
        $cat->setDataField('display_desc', array($lang => $category[0]));
        if (!$cat->validate('admin')) {
            return false;
        }
        $cat->insert();
        $cat->update();
        $categorymap[$category[1]] = $cat->getDataField('id');
    }

    // migrate page category assignments
    $sql = "SELECT pn_id, pn_id_cat FROM {$prefix}_faqanswer";
    $result = DBUtil::executeSQL($sql);
    $pages = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $pages[] = array('faqid' => $result->fields[0],
                         '__CATEGORIES__' => array('Main' => $categorymap[$result->fields[1]]),
                         '__META__' => array('module' => 'FAQ'));
    }

    foreach ($pages as $page) {
        if (!DBUtil::updateObject($page, 'faqanswer', '', 'faqid')) {
            return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
        }
    }

    // drop old table
    DBUtil::dropTable('faqcategories');

    // finally drop the secid column
    DBUtil::dropColumn('faqanswer', 'pn_id_cat');

    return true;
}

/**
 * create placeholder for categories
 */
function _faq_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $fCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/FAQ');

    if (!$fCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'FAQ');
        $cat->setDataField('display_name', array($lang => __('FAQ', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Frequently Asked Questions', $dom)));
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
        $registry->setDataField('modname', 'FAQ');
        $registry->setDataField('table', 'faqanswer');
        $registry->setDataField('property', 'Main');
        $registry->setDataField('category_id', $rootcat['id']);
        $registry->insert();
    } else {
        return false;
    }

    return true;
}
