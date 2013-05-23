<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */
class FAQ_Installer extends Zikula_AbstractInstaller
{

    /**
     * init faq module
     */
    public function install()
    {
        // create table
        if (!DBUtil::createTable('faqanswer')) {
            return false;
        }

        // set up config variables
        $modvars = array(
            'itemsperpage' => 25,
            'enablecategorization' => true,
            'catmapcount' => true,
            'addcategorytitletopermalink' => false,
        );

        // set up module variables
        ModUtil::setVars('FAQ', $modvars);

        // create our default category
        if (!$this->_createdefaultcategory()) {
            LogUtil::registerStatus(__('Warning! Could not create the default FAQ category tree. If you want to use categorisation with FAQ, register at least one property for the module in the Category Registry.', $dom));
            $modvars['enablecategorization'] = false;
        }
        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

        // initialisation successful
        return true;
    }

    /**
     * upgrade
     */
    public function upgrade($oldversion)
    {
        switch ($oldversion) {
            case '2.0':
            case '2.1':
                ModUtil::setVar('FAQ', 'enablecategorization', true);
                ModUtil::setVar('FAQ', 'addcategorytitletopermalink', true);
                ModUtil::dbInfoLoad('FAQ', 'FAQ', true);
                if ($this->_migratecategories()) {
                    LogUtil::registerError(__('Error! Update attempt failed.'));
                    return '2.1';
                }

            case '2.2':
            case '2.3':
            case '2.3.1':
                HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
                $prefix = $this->serviceManager['prefix'];
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sqlStatements = array();
                // N.B. statements generated with PHPMyAdmin
                $sqlStatements[] = 'RENAME TABLE ' . $prefix . '_faqanswer' . " TO `faqanswer`";
                $sqlStatements[] = "ALTER TABLE `faqanswer` 
CHANGE `pn_id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE `pn_question` `question` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_urltitle` `urltitle` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `pn_answer` `answer` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE `pn_submittedbyid` `submittedbyid` INT( 11 ) NOT NULL ,
CHANGE `pn_answeredbyid` `answeredbyid` INT( 11 ) NOT NULL ,
CHANGE `pn_obj_status` `obj_status` VARCHAR( 1 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'A',
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
            case '2.3.2':
                // further upgrade routines
        }

        // upgrade successful
        return true;
    }

    /**
     * delete the faq module
     */
    public function uninstall()
    {
        // drop ytable
        if (!DBUtil::dropTable('faqanswer')) {
            return false;
        }

        // delete module variables
        $this->delVars();

        // delete entries from category registry
        ModUtil::dbInfoLoad('Categories');
        DBUtil::deleteWhere('categories_registry', "modname = 'FAQ'");
        DBUtil::deleteWhere('categories_mapobj', "modname = 'FAQ'");

        // deletion successful
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
        $sql = "SELECT pn_categories, pn_id_cat, pn_parent_id FROM {$prefix}_faqcategories";
        $result = DBUtil::executeSQL($sql);
        $categories = array();
        for (; !$result->EOF; $result->MoveNext()) {
            $categories[] = $result->fields;
        }

        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // create root category and entry in the categories registry
        $this->_createdefaultcategory('/__SYSTEM__/Modules/FAQ');

        // get the category path for which we're going to insert our upgraded categories
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/FAQ');

        // migrate our root categories
        $categorymap = array();
        foreach ($categories as $category) {
            // we'll deal with sub categories on a second pass
            if ($category[2] != 0)
                continue;
            $cat = new Categories_DBObject_Category ();
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
            if ($category[2] == 0)
                continue;
            $cat = new Categories_DBObject_Category ();
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
    private function _createdefaultcategory($regpath = '/__SYSTEM__/Modules/Global')
    {
        // get the language file
        $lang = ZLanguage::getLanguageCode();

        // get the category path for which we're going to insert our place holder category
        $rootcat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules');
        $fCat = CategoryUtil::getCategoryByPath('/__SYSTEM__/Modules/FAQ');

        if (!$fCat) {
            // create placeholder for all our migrated categories
            $cat = new Categories_DBObject_Category ();
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
            $registry = new Categories_DBObject_Registry();
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

}