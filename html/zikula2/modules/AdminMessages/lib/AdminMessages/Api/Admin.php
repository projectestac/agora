<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 27363 2009-11-02 16:40:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AdminMessages
 */

/**
 * create a new AdminMessages item
 * @author Mark West
 * @param string $args['title'] title of the admin message
 * @param string $args['content'] text of the admin message
 * @param string $args['language'] the language of the message
 * @param int $args['active'] activation status of the message
 * @param int $args['expire'] expiry date of the message
 * @param int $args['view'] who can view the message
 * @return mixed AdminMessages item ID on success, false on failure
 */
class AdminMessages_Api_Admin extends Zikula_AbstractApi {

    public function create($args) {
        // Argument check
        if (!isset($args['title']) ||
                !isset($args['content']) ||
                !isset($args['language']) ||
                !isset($args['active']) ||
                !isset($args['expire']) ||
                !isset($args['view'])) {
            return LogUtil::registerArgsError();
        }
        if (empty($args['title']) && empty($args['content'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('AdminMessages::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        // create the item array
        $item = array('title' => $args['title'], 'content' => $args['content'],
            'language' => $args['language'], 'active' => $args['active'], 'view' => $args['view']);

        // add some additional modified values
        if ($args['expire'] < 0)
            $args['expire'] = 0;

        $item['expire'] = $args['expire'] * 86400; // turns days into seconds
        $item['date'] = time();

        if (!DBUtil::insertObject($item, 'message', 'mid')) {
            return LogUtil::registerError($this->__('Error! Could not create the new item.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['mid'];
    }

    /**
     * delete an AdminMessages item
     * @author Mark West
     * @param int $args['mid'] ID of the admin message to delete
     * @return bool true on success, false on failure
     */
    public function delete($args) {
        // Argument check
        if (!isset($args['mid'])) {
            return LogUtil::registerArgsError();
        }

        // Get the existing admin message
        $item = ModUtil::apiFunc('AdminMessages', 'user', 'get', array('mid' => $args['mid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Sorry! No such item found.'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('AdminMessages::', "$item[title]::$args[mid]", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::deleteObjectByID('message', $args['mid'], 'mid')) {
            return LogUtil::registerError($this->__('Error! Could not perform the deletion.'));
        }

        // The item has been modified, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('AdminMessages');
        $view->clear_cache(null, UserUtil::getVar('uid'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * update a AdminMessages item
     * @author Mark West
     * @param int $args['mid'] the ID of the item
     * @param sting $args['title'] title of the admin message
     * @param string $args['content'] text of the admin message
     * @param string $args['language'] the language of the message
     * @param int $args['active'] activation status of the message
     * @param int $args['expire'] expiry date of the message
     * @param int $args['view'] who can view the message
     * @return bool true if successful, false otherwise
     */
    public function update($args) {
        // Argument check
        if (!isset($args['mid']) ||
                !isset($args['title']) ||
                !isset($args['content']) ||
                !isset($args['language']) ||
                !isset($args['active']) ||
                !isset($args['expire']) ||
                !isset($args['oldtime']) ||
                !isset($args['changestartday']) ||
                !isset($args['view'])) {
            return LogUtil::registerArgsError();
        }

        // Get the existing admin message
        $item = ModUtil::apiFunc('AdminMessages', 'user', 'get', array('mid' => $args['mid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Sorry! No such item found.'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('AdminMessages::', "$item[title]::$args[mid]", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        // check value of change start day to today and set time
        $time = ($args['changestartday'] == 1) ? time() : $time = $args['oldtime'];

        // check for an invalid expiry
        if ($args['expire'] < 0)
            $expire = 0;

        // create the item array
        $item = array('mid' => $args['mid'], 'title' => $args['title'], 'content' => $args['content'],
            'language' => $args['language'], 'active' => $args['active'], 'view' => $args['view']);

        // add some additional modified values
        $args['expire'] = $args['expire'] * 86400; // turns days into seconds
        $args['date'] = $time;

        if (!DBUtil::updateObject($args, 'message', '', 'mid')) {
            return LogUtil::registerError($this->__('Error! Could not save your changes.'));
        }

        // The item has been modified, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('AdminMessages');
        $view->clear_cache(null, UserUtil::getVar('uid'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * get available admin panel links
     *
     * @author Mark West
     * @return array array of admin links
     */
    public function getlinks() {
        $links = array();

        if (SecurityUtil::checkPermission('AdminMessages::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('AdminMessages', 'admin', 'view'), 'text' => $this->__('Messages list'));
        }
        if (SecurityUtil::checkPermission('AdminMessages::', '::', ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('AdminMessages', 'admin', 'newItem'), 'text' => $this->__('Create new message'));
        }
        if (SecurityUtil::checkPermission('AdminMessages::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('AdminMessages', 'admin', 'modifyconfig'), 'text' => $this->__('Settings'));
        }

        return $links;
    }

}