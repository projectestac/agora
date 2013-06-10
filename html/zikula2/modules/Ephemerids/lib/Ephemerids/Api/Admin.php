<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */

/**
 * Create a new Ephemerids item
 * @author Mark West
 * @param 'did' the day of the emphererid
 * @param 'mid' the month of the emphererid
 * @param 'yid' the year of the emphererid
 * @param 'content' the ephmerid description
 * @param 'language' the language of the ephemerid
 * @return mixed Ephemerids item ID on success, false on failure
 */
class Ephemerids_Api_Admin extends Zikula_AbstractApi {

    public function create($args) {

        // Argument check
        if ((!isset($args['did'])) ||
                (!isset($args['mid'])) ||
                (!isset($args['yid'])) ||
                (!isset($args['content'])) ||
                (!isset($args['language']))) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        $item = array('did' => $args['did'],
            'mid' => $args['mid'],
            'yid' => $args['yid'],
            'content' => $args['content'],
            'language' => $args['language']);

        if (!DBUtil::insertObject($item, 'ephem', 'eid')) {
            return LogUtil::registerError($this->__('Error! Could not create the new ephemerid.'));
        }

        // Let any hooks know that we have created a new item.
        ModUtil::callHooks('item', 'create', $item['eid'], array('module' => 'Ephemerids'));

        // Return the id of the newly created item to the calling process
        return $item['eid'];
    }

    /**
     * Delete a Ephemerids item
     * @author Mark West
     * @param 'eid' the id of the ephemerid
     * @return bool true on success, false on failure
     */
    public function delete($args) {

        // Argument check
        if (!isset($args['eid']) || !is_numeric($args['eid'])) {
            return LogUtil::registerArgsError();
        }

        // The user API function is called.
        $item = ModUtil::apiFunc('Ephemerids', 'user', 'get', array('eid' => $args['eid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('No such ephemerid found'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', "$item[content]::$args[eid]", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        if (!DBUtil::deleteObjectByID('ephem', $args['eid'], 'eid')) {
            return LogUtil::registerError($this->__('Error! Could not delete the ephemerid.'));
        }

        // Let any hooks know that we have deleted an item.
        ModUtil::callHooks('item', 'delete', $args['eid'], array('module' => 'Ephemerids'));

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Update a Ephemerids item
     * @author Mark West
     * @param $args['eid'] the ID of the item
     * @param $args['did'] the day of the ephemerid
     * @param $args['mid'] the month of the ephemerid
     * @param $args['yid'] the year of the ephemerid
     * @param $args['content'] the event description
     * @param $args['language'] the language of the item
     * @return bool true on update success, false on failiure
     */
    public function update($args) {
        // Argument check
        if ((!isset($args['eid'])) ||
                (!isset($args['did'])) ||
                (!isset($args['mid'])) ||
                (!isset($args['yid'])) ||
                (!isset($args['content'])) ||
                (!isset($args['language']))) {
            return LogUtil::registerArgsError();
        }

        // The user API function is called.
        $item = ModUtil::apiFunc('Ephemerids', 'user', 'get', array('eid' => $args['eid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such ephemerid found'));
        }

        if (!SecurityUtil::checkPermission('Ephemerids::', "::$args[eid]", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }
        if (!SecurityUtil::checkPermission('Ephemerids::', "::$args[eid]", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        $item = array('eid' => $args['eid'],
            'did' => $args['did'],
            'mid' => $args['mid'],
            'yid' => $args['yid'],
            'content' => $args['content'],
            'language' => $args['language']);

        if (!DBUtil::updateObject($item, 'ephem', '', 'eid')) {
            return LogUtil::registerError($this->__('Error! Could not save your changes.'));
        }

        // Let any hooks know that we have updated an item.
        ModUtil::callHooks('item', 'update', $args['eid'], array('module' => 'Ephemerids'));

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

        if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('Ephemerids', 'admin', 'view'), 'text' => $this->__('Ephemerids list'));
        }
        if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('Ephemerids', 'admin', 'newItem'), 'text' => $this->__('Create new ephemerid'));
        }
        if (SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('Ephemerids', 'admin', 'modifyconfig'), 'text' => $this->__('Settings'));
        }

        return $links;
    }

}