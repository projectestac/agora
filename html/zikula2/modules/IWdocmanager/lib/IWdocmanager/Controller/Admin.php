<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnadmin.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */
class IWdocmanager_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Give access to the administrator main page
     * @author:    Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:    The form for general configuration values of the Intraweb modules
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        return System::redirect(ModUtil::url('IWdocmanager', 'admin', 'config'));
    }

    public function config() {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $directoriroot = ModUtil::getVar('IWmain', 'documentRoot');
        $documentsFolder = $this->getVar('documentsFolder');
        $notifyMail = $this->getVar('notifyMail');
        $editTime = $this->getVar('editTime');
        $deleteTime = $this->getVar('deleteTime');

        $noFolder = false;
        $noWriteable = false;
        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $documentsFolder) ||
                ModUtil::getVar('IWforms', 'attached') == '') {
            $noFolder = true;
        } else {
            $noWriteable = (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $documentsFolder)) ? true : false;
        }

        $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('documentsFolder', $documentsFolder)
                        ->assign('notifyMail', $notifyMail)
                        ->assign('editTime', $editTime)
                        ->assign('deleteTime', $deleteTime)
                        ->assign('noFolder', $noFolder)
                        ->assign('noWriteable', $noWriteable)
                        ->assign('multizk', $multizk)
                        ->assign('directoriroot', $directoriroot)
                        ->fetch('IWdocmanager_admin_config.tpl');
    }

    /**
     * Update the module configuration
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return: True if success or false in other case
     */
    public function updateconfig($args) {
        // Get parameters from whatever input we need.
        $documentsFolder = FormUtil::getPassedValue('documentsFolder', isset($args['documentsFolder']) ? $args['documentsFolder'] : null, 'POST');
        $notifyMail = FormUtil::getPassedValue('notifyMail', isset($args['notifyMail']) ? $args['notifyMail'] : null, 'POST');
        $editTime = FormUtil::getPassedValue('editTime', isset($args['editTime']) ? $args['editTime'] : 0, 'POST');
        $deleteTime = FormUtil::getPassedValue('deleteTime', isset($args['deleteTime']) ? $args['deleteTime'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        if (!is_numeric($editTime))
            $editTime = 0;
        if (!is_numeric($deleteTime))
            $deleteTime = 0;

        $this->setVar('documentsFolder', $documentsFolder)
                ->setVar('notifyMail', $notifyMail)
                ->setVar('editTime', $editTime)
                ->setVar('deleteTime', $deleteTime);

        LogUtil::registerStatus($this->__('The configuration has been updated'));

        return System::redirect(ModUtil::url('IWdocmanager', 'admin', 'config'));
    }

    public function viewCategories() {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $categories = ModUtil::Func($this->name, 'admin', 'viewCategoriesContent');


        return $this->view->assign('categories', $categories)
                        ->fetch('IWdocmanager_admin_viewCategories.tpl');
    }

    public function viewCategoriesContent() {
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $categories = ModUtil::Func($this->name, 'admin', 'getCategoriesTree', array('parentId' => 0));

        $groupsArray = array();

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));

        $groups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        foreach ($groups as $group) {
            $groupsArray[$group['id']] = $group['name'];
        }

        return $this->view->assign('categories', $categories)
                        ->assign('groups', $groupsArray)
                        ->fetch('IWdocmanager_admin_viewCategoriesContent.tpl');
    }

    public function getCategoriesTree($args) {
        $parentId = FormUtil::getPassedValue('parentId', isset($args['parentId']) ? $args['parentId'] : 0, 'POST');
        $level = FormUtil::getPassedValue('level', isset($args['level']) ? $args['level'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $categoryData = array();

        // Get the data of each item
        $categoryInitData = ModUtil::apiFunc($this->name, 'user', 'getAllCategories', array('parentId' => $parentId));

        foreach ($categoryInitData as $category) {
            // Add the image triangles, one per sublevel
            for ($i = 0, $levelimg = ''; $i < $level; $i++) {
                $levelimg .= "<img src='modules/IWdocmanager/images/level.gif' />";
            }

            // Calculate the padding
            $padding = $level * 20 . 'px';

            // Build the option and put it within the menu
            $categoryData[$category['categoryId']] = array('categoryId' => $category['categoryId'],
                'categoryName' => $category['categoryName'],
                'description' => $category['description'],
                'level' => $levelimg,
                'active' => $category['active'],
                'parentId' => $category['parentId'],
                'padding' => $padding,
                'groups' => $category['groups'],
                'groupsAdd' => $category['groupsAdd'],
                'groupsArray' => unserialize($category['groups']),
                'groupsAddArray' => unserialize($category['groupsAdd']),
            );
            // Add the options
            $categoryinitData = ModUtil::func($this->name, 'admin', 'getCategoriesTree', array('parentId' => $category['categoryId'],
                        'level' => $level + 1,
                    ));

            if (!empty($categoryinitData)) { // If the menu has items, save them
                foreach ($categoryinitData as $item) // This foreach converts an n-dimension array in a 1-dimension array, suitable for the template
                    $categoryData[$item['categoryId']] = $item;
            }
        }

        return $categoryData;
    }

    public function addCategory($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : 0, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }


        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $groups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        $template = ($categoryId > 0) ? 'IWdocmanager_admin_addSubcategory.tpl' : 'IWdocmanager_admin_addCategory.tpl';

        return $this->view->assign('categoryId', $categoryId)
                        ->assign('groups', $groups)
                        ->fetch($template);
    }

    public function createCategory($args) {
        $categoryName = FormUtil::getPassedValue('categoryName', isset($args['categoryName']) ? $args['categoryName'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : array(), 'POST');
        $groupsAdd = FormUtil::getPassedValue('groupsAdd', isset($args['groupsAdd']) ? $args['groupsAdd'] : array(), 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : 0, 'POST');

        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $groupsString = serialize($groups);
        $groupsAddString = serialize($groupsAdd);

        $created = ModUtil::apiFunc($this->name, 'admin', 'createCategory', array('categoryName' => $categoryName,
                    'description' => $description,
                    'groups' => $groupsString,
                    'groupsAdd' => $groupsAddString,
                    'active' => $active,
                ));

        if (!$created) {
            LogUtil::registerError($this->__('Error creating a category'));
            return System::redirect(ModUtil::url('IWdocmanager', 'admin', 'viewCategories'));
        }

        LogUtil::registerStatus($this->__('The new category has been added'));
        return System::redirect(ModUtil::url('IWdocmanager', 'admin', 'viewCategories'));
    }

    public function editCategory($args) {
        $categoryId = FormUtil::getPassedValue('categoryId', isset($args['categoryId']) ? $args['categoryId'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // get category
        $category = ModUtil::apiFunc($this->name, 'user', 'getCategory', array('categoryId' => $categoryId));

        if (!$category) {
            LogUtil::registerError($this->__('The category has not been found'));
            return System::redirect(ModUtil::url('IWdocmanager', 'admin', 'viewCategories'));
        }

        $category['groupsArray'] = unserialize($category['groups']);
        $category['groupsAddArray'] = unserialize($category['groupsAdd']);

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $groups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        return $this->view->assign('function', 'updateCategory')
                        ->assign('category', $category)
                        ->assign('groups', $groups)
                        ->fetch('IWdocmanager_admin_editCategory.tpl');
    }

}