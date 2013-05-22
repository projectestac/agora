<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */

/**
 * the main administration function
 * This function is the default function, and is called whenever the
 * module is initiated without defining arguments.  As such it can
 * be used for a number of things, but most commonly it either just
 * shows the module menu and returns or calls whatever the module
 * designer feels should be the default function (often this is the
 * view() function)
 * @author Mark West
 * @return string HTML string
 */
class Ephemerids_Controller_Admin extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        // Create output object
        return $this->view->fetch('ephemerids_admin_main.tpl');
    }

    /**
     * Add a new ephemerid
     * This is a standard function that is called whenever an administrator
     * wishes to create a new module item
     * @author Mark West
     * @return string HTML string
     */
    public function newItem() {
        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADD)) {
            return LogUtil::registerPermissionError();
        }

        // Assign the default language
        return $this->view->assign('language', ZLanguage::getLanguageCode())
                        ->assign('multilingual', ModUtil::setVar('Ephemerids', 'multilingual'))
                        ->fetch('ephemerids_admin_new.tpl');
    }

    /**
     * This is a standard function that is called with the results of the
     * form supplied by Ephemerids_admin_new() to create a new item
     * @author Mark West
     * @param 'Date_Day' the day of the emphererid
     * @param 'Date_Month' the month of the emphererid
     * @param 'Date_Year' the year of the emphererid
     * @param 'content' the ephmerid description
     * @param 'language' the language of the ephemerid
     * @return mixed ephemerid id on success, false on failiure
     */
    public function create($args) {
        // Get parameters from whatever input we need
        $ephemerid = FormUtil::getPassedValue('ephemerid', isset($args['ephemerid']) ? $args['ephemerid'] : null, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Notable by its absence there is no security check here.  This is because
        // the security check is carried out within the API function
        // Create the ephemerid via the API
        $eid = ModUtil::apiFunc('Ephemerids', 'admin', 'create', array('did' => $ephemerid['Date_Day'],
                    'mid' => $ephemerid['Date_Month'],
                    'yid' => $ephemerid['Date_Year'],
                    'content' => $ephemerid['content'],
                    'language' => isset($ephemerid['language']) ? $ephemerid['language'] : ''));

        if ($eid != false) {
            // Success
            LogUtil::registerStatus($this->__('Done! Ephemerid created.'));
        }

        return System::redirect(ModUtil::url('Ephemerids', 'admin', 'view'));
    }

    /**
     * Modify an ephemerid
     * This is a standard function that is called whenever an administrator
     * wishes to modify a current module item
     * @author Mark West
     * @param 'eid' the id of the item to be modified
     * @param 'objectid' generic object id maps to eid if presents
     * @return string HTML string
     */
    public function modify($args) {
        $eid = FormUtil::getPassedValue('eid', isset($args['eid']) ? $args['eid'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');

        if (!empty($objectid)) {
            $eid = $objectid;
        }

        $item = ModUtil::apiFunc('Ephemerids', 'user', 'get', array('eid' => $eid));
        if ($item == false) {
            return LogUtil::registerError($this->__('No such ephemerid found.'), 404);
        }

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', "::$eid", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        // calulate date for use in template
        $item['date'] = $item['yid'] . '-' . $item['mid'] . '-' . $item['did'];

        // Create output object
        return $this->view->assign('item', $item)
                        ->assign('multilingual', ModUtil::setVar('Ephemerids', 'multilingual'))
                        ->fetch('ephemerids_admin_modify.tpl');
    }

    /**
     * This is a standard function that is called with the results of the
     * form supplied by Ephemerids_admin_modify() to update a current item
     * @author Mark West
     * @param 'eid' the id of the ephemerid
     * @param 'objectid' generic object id maps to eid if present
     * @param 'Date_Day' the day of the emphererid
     * @param 'Date_Month' the month of the emphererid
     * @param 'Date_Year' the year of the emphererid
     * @param 'content' the ephmerid description
     * @param 'language' the language of the ephemerid
     * @return bool true on update success, false on failiure
     */
    public function update($args) {

        // Get parameters from whatever input we need
        $ephemerid = FormUtil::getPassedValue('ephemerid', isset($args['ephemerid']) ? $args['ephemerid'] : null, 'POST');
        if (!empty($ephemerid['objectid'])) {
            $ephemerid['eid'] = $ephemerid['objectid'];
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Notable by its absence there is no security check here.  This is because
        // the security check is carried out within the API function
        // Update the ephemerid
        if (ModUtil::apiFunc('Ephemerids', 'admin', 'update', array('eid' => $ephemerid['eid'],
                    'did' => $ephemerid['Date_Day'],
                    'mid' => $ephemerid['Date_Month'],
                    'yid' => $ephemerid['Date_Year'],
                    'content' => $ephemerid['content'],
                    'language' => isset($ephemerid['language']) ? $ephemerid['language'] : ''))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Ephemerid updated.'));
        }

        return System::redirect(ModUtil::url('Ephemerids', 'admin', 'view'));
    }

    /**
     * Delete an ephemerid
     * This is a standard function that is called whenever an administrator
     * wishes to delete a current module item.  Note that this function is
     * the equivalent of both of the modify() and update() functions above as
     * it both creates a form and processes its output.  This is fine for
     * simpler functions, but for more complex operations such as creation and
     * modification it is generally easier to separate them into separate
     * functions.  There is no requirement in the Zikula MDG to do one or the
     * other, so either or both can be used as seen appropriate by the module
     * developer
     * @author Mark West
     * @param 'eid' the id of the ephemerid to be deleted
     * @param 'objectid' generic object id maps to eid if present
     * @param 'confirmation' confirmation that this item can be deleted
     * @return mixed HTML string if no confirmation, true if delete successful, false otherwise
     */
    public function delete($args) {

        $eid = FormUtil::getPassedValue('eid', isset($args['eid']) ? $args['eid'] : null, 'REQUEST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', null, 'POST');
        if (!empty($objectid)) {
            $eid = $objectid;
        }

        $item = ModUtil::apiFunc('Ephemerids', 'user', 'get', array('eid' => $eid));

        if ($item == false) {
            return LogUtil::registerError($this->__('No such ephemerid found.'), 404);
        }

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', "::$eid", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        // Check for confirmation.
        if (empty($confirmation)) {
            // No confirmation yet - display a suitable form to obtain confirmation
            // of this action from the user
            // Ephemerid ID
            return $this->view->assign('eid', $eid)
                            ->fetch('ephemerids_admin_delete.tpl');
        }

        // If we get here it means that the user has confirmed the action
        // Confirm authorisation code
        $this->checkCsrfToken();

        // Delete the ephemerid
        if (ModUtil::apiFunc('Ephemerids', 'admin', 'delete', array('eid' => $eid))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Ephemerid deleted.'));
        }

        return System::redirect(ModUtil::url('Ephemerids', 'admin', 'view'));
    }

    /**
     * View ephemerids
     * This is a standard function called to present the administrator with a list
     * of all items held by the module.
     * @author Mark West
     * @return string HTML string
     */
    public function view() {

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        $startnum = FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : null, 'GET');

        // The user API function is called.  This takes the number of items
        // required and the first number in the list of all items, which we
        // obtained from the input and gets us the information on the appropriate
        // items.
        $items = ModUtil::apiFunc('Ephemerids', 'user', 'getall', array('startnum' => $startnum,
                    'numitems' => ModUtil::getVar('Ephemerids', 'itemsperpage')));

        if (isset($items) && is_array($items)) {
            foreach ($items as $k => $item) {
                $row = array();
                if (SecurityUtil::checkPermission('Ephemerids::', "::$item[eid]", ACCESS_READ)) {
                    $options = array();
                    if (SecurityUtil::checkPermission('Ephemerids::', "::$item[eid]", ACCESS_EDIT)) {
                        $options[] = array('url' => ModUtil::url('Ephemerids', 'admin', 'modify', array('eid' => $item['eid'])),
                            'image' => 'xedit.png',
                            'title' => $this->__('Edit'));
                        if (SecurityUtil::checkPermission('Ephemerids::', "::$item[eid]", ACCESS_DELETE)) {
                            $options[] = array('url' => ModUtil::url('Ephemerids', 'admin', 'delete', array('eid' => $item['eid'])),
                                'image' => '14_layer_deletelayer.png',
                                'title' => $this->__('Delete'));
                        }
                    }
                    $items[$k]['options'] = $options;

                    if ($item['yid'] < 1970) {
                        $item['yid'] = 1970;
                    }
                    $items[$k]['datetime'] = DateUtil::formatDatetime(mktime(1, 1, 1, $item['mid'], $item['did'], $item['yid']), 'datelong');
                }
            }
        }
        return $this->view->assign('ephemerids', $items)
                        // Assign the values for the smarty plugin to produce a pager
                        ->assign('pager', array('numitems' => ModUtil::apiFunc('Ephemerids', 'user', 'countitems'),
                            'itemsperpage' => ModUtil::getVar('Ephemerids', 'itemsperpage')))
                        ->fetch('ephemerids_admin_view.tpl');
    }

    /**
     * This is a standard function to modify the configuration parameters of the
     * module
     * @author Mark West
     * @return stringHTML string
     */
    public function modifyconfig() {
        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Number of items to display per page
        return $this->view->assign(ModUtil::getVar('Ephemerids'))
                        ->fetch('ephemerids_admin_modifyconfig.tpl');
    }

    /**
     * This is a standard function to update the configuration parameters of the
     * module given the information passed back by the modification form
     * @author Mark West
     * @return bool true if update successful, false otherwise
     */
    public function updateconfig() {

        // Security check
        if (!SecurityUtil::checkPermission('Ephemerids::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $itemsperpage = FormUtil::getPassedValue('itemsperpage', 25, 'POST');
        ModUtil::setVar('Ephemerids', 'itemsperpage', $itemsperpage);

        // Let any other modules know that the modules configuration has been updated
        ModUtil::callHooks('module', 'updateconfig', 'Ephemerids', array('module' => 'Ephemerids'));

        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Saved module configuration.'));

        return System::redirect(ModUtil::url('Ephemerids', 'admin', 'view'));
    }

}