<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 400 2010-01-01 14:27:28Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Reviews
 */

/**
 * init reviews module
 */
function Reviews_init()
{
    $dom = ZLanguage::getModuleDomain('Reviews');

    // create table
    if (!DBUtil::createTable('reviews')) {
        return false;
    }

    // set up config variables
    $modvars = array(
        'itemsperpage' => 25,
        'enablecategorization' => true,
        'addcategorytitletopermalink' => true
    );

    // create our default category
    if (!_reviews_createdefaultcategory()) {
        LogUtil::registerStatus(__('Warning! Could not create the default Reviews category tree. If you want to use categorization for the reviews, register at least one property for the module in the Category Registry.', $dom));
        $modvars['enablecategorization'] = false;
    }

    // set up module variables
    pnModSetVars('Reviews', $modvars);

    // initialisation successful
    return true;
}

/**
 * upgrade
 */
function Reviews_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('Reviews');

    // update table
    if (!DBUtil::changeTable('reviews')) {
        return false;
    }

    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '1.0':
            // check for the ezcomments module
            if (!pnModAvailable('EZComments')) {
                LogUtil::registerError(__f("Module '%s' not available.", 'EZComments', $dom));
                return '1.0';
            }

            // drop table
            if (!DBUtil::dropTable('reviews_main')) {
                return '1.0';
            }
            // drop table
            if (!DBUtil::dropTable('reviews_add')) {
                return '1.0';
            }

            // migrate the comments to ezcomments
            // and drop the comments table if successful
            if (pnModAPIFunc('EZComments', 'migrate', 'reviews')) {
                // drop table
                if (!DBUtil::dropTable('reviews_comments')) {
                    return '1.0';
                }
            }

        case '1.1':
            // populate permalinks for existing content
            $tables      = pnDBGetTables();
            $shorturlsep = pnConfigGetVar('shorturlsseparator');			
            $sql         = "UPDATE $tables[reviews] SET pn_urltitle = REPLACE(pn_title, ' ', '{$shorturlsep}')";
            if (!DBUtil::executeSQL($sql)) {
                LogUtil::registerError(__('Error! Update attempt failed.'));
                return '1.1';
            }

            // enable categorization
            pnModSetVar('Reviews', 'enablecategorization', true);
            pnModDBInfoLoad('Reviews', 'Reviews', true);

            if (!_reviews_migratecategories()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '1.1';
            }

            // Set up config variables
            pnModSetVar('Reviews', 'itemsperpage', 25);

        case '2.2':
            // Move the creation date
            $table = DBUtil::getLimitedTablename('reviews');
            $sql   = "UPDATE $table SET pn_cr_date = pn_date";
            DBUtil::dropColumn('reviews', array('pn_date'));

        // gettext conversion
        case '2.3':
            if (!_reviews_migrategtlanguage()) {
                LogUtil::registerError(__('Error! Update attempt failed.', $dom));
                return '2.3';
            }
            break;
    }

    // upgrade successful
    return true;
}

/**
 * delete the reviews module
 */
function Reviews_delete()
{
    // drop table
    if (!DBUtil::dropTable('reviews')) {
        return false;
    }

    // Delete any module variables
    pnModDelVar('Reviews');

    // Delete entries from category registry 
    pnModDBInfoLoad('Categories');
    DBUtil::deleteWhere('categories_registry', "crg_modname = 'Reviews'");
    DBUtil::deleteWhere('categories_mapobj', "cmo_modname = 'Reviews'");

    // Deletion successful
    return true;
}

/**
 * create default category for the module
 */
function _reviews_createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $dom  = ZLanguage::getModuleDomain('Reviews');

    // get the category path for which we're going to insert our place holder category
    $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
    $rCat    = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/Reviews');

    if (!$rCat) {
        // create placeholder for all our migrated categories
        $cat = new PNCategory ();
        $cat->setDataField('parent_id', $rootcat['id']);
        $cat->setDataField('name', 'Reviews');
        $cat->setDataField('display_name', array($lang => __('Reviews', $dom)));
        $cat->setDataField('display_desc', array($lang => __('Reviews system module', $dom)));
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
        $registry->setDataField('modname', 'Reviews');
        $registry->setDataField('table', 'reviews');
        $registry->setDataField('property', 'Main');
        $registry->setDataField('category_id', $rootcat['id']);
        $registry->insert();
    } else {
        return false;
    }

    return true;
}

/**
 * categorize the .7x items with the categories module
 */
function _reviews_migratecategories()
{
    // load necessary classes
    Loader::loadClass('CategoryUtil');
    Loader::loadClassFromModule('Categories', 'Category');
    Loader::loadClassFromModule('Categories', 'CategoryRegistry');

    // get the language file
    $lang = ZLanguage::getLanguageCode();
    $catPath = '/__SYSTEM__/Modules/Reviews';
    $dom = ZLanguage::getModuleDomain('Reviews');

    // create root category and entry in the categories registry
    if (!_reviews_createdefaultcategory($catPath)) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    // get the category path for which we're going to insert our upgraded categories
    $rootcat = CategoryUtil::getCategoryByPath($catPath);

    // create placeholder for all our migrated quotes
    $cat = new PNCategory ();
    $cat->setDataField('parent_id', $rootcat['id']);
    $cat->setDataField('name', 'Imported');
    $cat->setDataField('display_name', array($lang => __('Imported reviews', $dom)));
    $cat->setDataField('display_desc', array($lang => __('Reviews imported from .7x version', $dom)));
    if (!$cat->validate('admin')) {
        return false;
    }
    $cat->insert();
    $cat->update();
    $catid = $cat->getDataField('id');
    unset($cat);

    // migrate page category assignments
    $prefix = pnConfigGetVar('prefix');
    $sql = "SELECT pn_id FROM {$prefix}_reviews";
    $result = DBUtil::executeSQL($sql);
    $reviews = array();
    for (; !$result->EOF; $result->MoveNext()) {
        $reviews[] = array('id' => $result->fields[0],
                           '__CATEGORIES__' => array('Main' => $catid),
                           '__META__' => array('module' => 'Reviews'));
    }

    foreach ($reviews as $review) {
        if (!DBUtil::updateObject($review, 'reviews')) {
            return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
        }
    }

    return true;
}

/**
 * Migrate the language dbfield to a gettext code
 */
function _reviews_migrategtlanguage()
{
    $tables = pnDBGetTables();
    $pagescolumn = &$tables['reviews_column'];

    $where = "$pagescolumn[language] != ''";
    $reviews = DBUtil::selectObjectArray('reviews', $where, '', -1, -1, '', null, null, array('id', 'language'));

    if ($reviews === false) {
        // nothing to do
        return true;
    }

    foreach ($reviews as $k => $review) {
        if ($l2 = ZLanguage::translateLegacyCode($review['language'])) {
            $reviews[$k]['language'] = $l2;
        }
    }

    return DBUtil::updateObjectArray($reviews, 'reviews', 'id', true);
}
