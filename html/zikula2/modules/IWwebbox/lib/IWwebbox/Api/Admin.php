<?php

class IWwebbox_Api_Admin extends Zikula_AbstractApi {

    /**
     * Insert a new URL reference into the database
     *
     * @param    $args['ref']			Reference of the item
     * @param    $args['url']			URL website
     * @param    $args['description']	Reference description
     * @param    $args['scrolls']		The iframe show the scrolls
      1	- Yes (auto)
      0	- No
     * @param    $args['width']			Width of the iframe
     * @param    $args['height']		Height of the iframe
     * @param    $args['widthunit']		Unit used in the width specified
      %	- percentual
      px	- pixels
     * @return   mixed                  Reference ID on success, false on failure
     */
    public function create($args) {
        // Optiona argument
        if (!isset($args['description']))
            $args['description'] = '';

        // Check if args have arrived properly
        if (!isset($args['url']) || !isset($args['ref'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $args['scrolls'] = ($args['scrolls'] == 'on') ? '1' : '0';

        // Security check
        if (!SecurityUtil::checkPermission('IWwebbox::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::insertObject($args, 'IWwebbox', 'pid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Let any hooks know that we have created a new item
        ModUtil::callHooks('item', 'create', $args['pid'], array('module' => 'IWwebbox'));

        return $args['pid'];
    }

    /**
     * delete a reference
     *
     * @param    $args['pid']   ID of the item
     * @return   bool           true on success, false on failure
     */
    public function delete($args) {
        // Argument check
        if (!isset($args['pid']) || !is_numeric($args['pid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Get the current faq
        $item = ModUtil::apiFunc('IWwebbox', 'user', 'get', array('pid' => $args['pid']));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWwebbox::', "$args[pid]::", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::deleteObjectByID('IWwebbox', $args['pid'], 'pid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let any hooks know that we have deleted an item
        ModUtil::callHooks('item', 'delete', $args['pid'], array('module' => 'IWwebbox'));

        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWwebbox');
        $view->clear_cache(null, $args['pid']);

        return true;
    }

    /**
     * Modify a reference from database
     *
     * @param    $args['pid']			Id of the reference that has to be modified
     * @param    $args['ref']			Reference of the item
     * @param    $args['url']			URL website
     * @param    $args['description']	Reference description
     * @param    $args['scrolls']		The iframe show the scrolls
      1	- Yes (auto)
      0	- No
     * @param    $args['width']			Width of the iframe
     * @param    $args['height']		Height of the iframe
     * @param    $args['widthunit']		Unit used in the width specified
      %	- percentual
      px	- pixels
     * @return   mixed                  FAQ ID on success, false on failure
     */
    public function update($args) {
        // Argument check
        if (!isset($args['ref']) || !isset($args['url'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $args['scrolls'] = ($args['scrolls'] == 'on') ? '1' : '0';

        // Get the current faq
        $item = ModUtil::apiFunc('IWwebbox', 'user', 'get', array('pid' => $args['pid']));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        // Security check.
        if (!SecurityUtil::checkPermission('IWwebbox::', "$args[pid]::", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::updateObject($args, 'IWwebbox', '', 'pid')) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        // The item has been modified, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWwebbox');
        $view->clear_cache(null, $args['pid']);

        // Let any hooks know that we have updated an item
        ModUtil::callHooks('item', 'update', $args['pid'], array('module' => 'IWwebbox'));
        return true;
    }

    public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWwebbox::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWwebbox', 'admin', 'main'), 'text' => $this->__('Show existing URL'), 'id' => 'iwwebbox_view', 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWwebbox', 'admin', 'newitem'), 'text' => $this->__('Add new URL'), 'id' => 'iwwebbox_create', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWwebbox', 'admin', 'conf'), 'text' => $this->__('Module configuration'), 'id' => 'iwwebbox_conf', 'class' => 'z-icon-es-config');
        }
        return $links;
    }

}