<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id: pnuserapi.php 202 2009-12-09 20:28:11Z aperezm $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Albert Pérez Monfort <aperezm@xtec.cat>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage Files
 */
class IWdocmanager_Api_Admin extends Zikula_AbstractApi {

    // get available admin panel links
    public function getlinks() {
        $links = array();
        if (SecurityUtil::checkPermission('IWdocmanager::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url($this->name, 'admin', 'config'), 'text' => $this->__('Module configuration'), 'class' => 'z-icon-es-config');
            $links[] = array('url' => ModUtil::url($this->name, 'admin', 'viewCategories'), 'text' => $this->__('View categories'), 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url($this->name, 'admin', 'addCategory'), 'text' => $this->__('New main category'), 'class' => 'z-icon-es-new');
        }
        // return output
        return $links;
    }

    public function createCategory($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $item = array('categoryName' => $args['categoryName'],
            'description' => $args['description'],
            'groups' => $args['groups'],
            'groupsAdd' => $args['groupsAdd'],
            'active' => $args['active'],
            'parentId' => $args['parent'],
        );

        if (!DBUtil::insertObject($item, 'IWdocmanager_categories', 'categoryId')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['categoryId'];
    }

    public function deleteCategory($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!DBUtil::deleteObjectByID('IWdocmanager_categories', $args['categoryId'], 'categoryId')) {
            return LogUtil::registerError($this->__('Error! Delete attempt failed.'));
        }
        return true;
    }

    public function updateCategory($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWdocmanager::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $table = DBUtil::getTables();
        $c = $table['IWdocmanager_categories_column'];

        $where = "$c[categoryId]=$args[categoryId]";

        if (!DBUtil::updateObject($args['items'], 'IWdocmanager_categories', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }

}