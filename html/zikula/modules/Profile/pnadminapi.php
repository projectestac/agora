<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 90 2010-01-25 08:31:41Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 * @author Mark West
 */

/**
 * create a new dynamic user data item
 * @author Mark West
 * @param string $args['label'] the name of the item to be created
 * @param string $args['attribute_name'] the attribute name of the item to be created
 * @param string $args['dtype'] the DUD type of the item to be created
 * @return mixed dud item ID on success, false on failure
 */
function Profile_adminapi_create($args)
{
    // Argument check
    if ((!isset($args['label']) || empty($args['label'])) ||
        (!isset($args['attribute_name']) || empty($args['attribute_name'])) ||
        (!isset($args['dtype']) || !is_numeric($args['dtype']))) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::item', "$args[label]::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // Clean the label
    $permsep = pnConfigGetVar('shorturlsseparator', '-');
    $args['label'] = str_replace($permsep, '', DataUtil::formatPermalink($args['label']));
    $args['label'] = str_replace('-', '', DataUtil::formatPermalink($args['label']));

    // Check if the label or attribute name already exists
    $item = pnModAPIFunc('Profile', 'user', 'get', array('proplabel' => $args['label']));
    if ($item) {
        return LogUtil::registerError(__("Error! There is already an personal info item with the label '%s'.", DataUtil::formatForDisplay($args['label']), $dom));
    }
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propattribute' => $args['attribute_name']));
    if ($item) {
        return LogUtil::registerError(__("Error! There is already an personal info item with the attribute name '%s'.", DataUtil::formatForDisplay($args['attribute_name']), $dom));
    }

    // Determine the new weight
    $weightlimits = pnModAPIFunc('Profile', 'user', 'getweightlimits');
    $weight = $weightlimits['max'] + 1;

    // a checkbox can't be required
    if ($args['displaytype'] == 2 && $args['required']) {
        $args['required'] = 0;
    }

    // produce the validation array
    $args['listoptions'] = str_replace(Chr(10), '', str_replace(Chr(13), '', $args['listoptions']));
    $validationinfo = array('required'    => $args['required'],
                            'viewby'      => $args['viewby'],
                            'displaytype' => $args['displaytype'],
                            'listoptions' => $args['listoptions'],
                            'note'        => $args['note']);

    $obj = array();
    $obj['prop_label']          = $args['label'];
    $obj['prop_attribute_name'] = $args['attribute_name'];
    $obj['prop_dtype']          = $args['dtype'];
    $obj['prop_weight']         = $weight;
    $obj['prop_validation']     = serialize($validationinfo);

    $res = DBUtil::insertObject($obj, 'user_property', 'prop_id');

    // Check for an error with the database
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not create new attribute.', $dom));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $obj['prop_id'], array('module' => 'Profile'));

    // Return the id of the newly created item to the calling process
    return $obj['prop_id'];
}

/**
 * Update a dynamic user data item
 * @author Mark West
 * @param int $args['dudid'] the id of the item to be updated
 * @param string $args['label'] the name of the item to be updated
 * @return bool true on success, false on failure
 */
function Profile_adminapi_update($args)
{
    // Argument check
    if (!isset($args['label']) || stristr($args['label'], '-') ||
        !isset($args['dudid']) || !is_numeric($args['dudid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // The user API function is called.
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $args['dudid']));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom));
    }

    // Clean the label
    $permsep = pnConfigGetVar('shorturlsseparator');
    $args['label'] = str_replace($permsep, '', DataUtil::formatPermalink($args['label']));

    // Security check
    if (!SecurityUtil::checkPermission('Profile::Item', "$item[prop_label]::$args[dudid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    if (!SecurityUtil::checkPermission('Profile::Item', "$args[label]::$args[dudid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // If there's a new label, check if it already exists
    if ($args['label'] <> $item['prop_label']) {
        $vitem = pnModAPIFunc('Profile', 'user', 'get', array('proplabel' => $args['label']));
        if ($vitem) {
            return LogUtil::registerError(__("Error! There is already an personal info item with the label '%s'.", DataUtil::formatForDisplay($args['label']), $dom));
        }
    }

    if (isset($args['prop_weight'])) {
        if ($args['prop_weight'] == 0) {
            unset($args['prop_weight']);
        } elseif ($args['prop_weight'] <> $item['prop_weight']) {
            $result  = DBUtil::selectObjectByID('user_property', $args['prop_weight'], 'prop_weight');
            $result['prop_weight'] = $item['prop_weight'];

            $pntable = pnDBGetTables();
            $column  = $pntable['user_property_column'];
            $where   = "$column[prop_weight] =  '$args[prop_weight]'
                        AND $column[prop_id] <> '$args[dudid]'";

            DBUtil::updateObject($result, 'user_property', $where, 'prop_id');
        }
    }

    // create the object to update
    $obj = array();
    $obj['prop_id']     = $args['dudid'];
    $obj['prop_dtype']  = (isset($args['dtype']) ? $args['dtype'] : $item['prop_dtype']);
    $obj['prop_weight'] = (isset($args['prop_weight']) ? $args['prop_weight'] : $item['prop_weight']);

    // assumes if displaytype is set, all the validation info is
    if (isset($args['displaytype'])) {
        // a checkbox can't be required
        if ($args['displaytype'] == 2 && $args['required']) {
            $args['required'] = 0;
        }

        // Produce the validation array
        $args['listoptions'] = str_replace(Chr(10), '', str_replace(Chr(13), '', $args['listoptions']));
        $validationinfo = array('required'    => $args['required'],
                                'viewby'      => $args['viewby'],
                                'displaytype' => $args['displaytype'],
                                'listoptions' => $args['listoptions'],
                                'note'        => $args['note']);

        $obj['prop_validation'] = serialize($validationinfo);
    }

    // let to modify the label for normal fields only
    if ($item['prop_dtype'] == 1) {
        $obj['prop_label'] = $args['label'];
    }

    // before update it search for option ID change
    // to update the respective user's data
    if ($obj['prop_validation'] != $item['prop_validation']) {
        pnModAPIFunc('Profile', 'dud', 'updatedata',
                     array('item'    => $item['prop_validation'],
                           'newitem' => $obj['prop_validation']));
    }

    $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

    // Check for an error with the database code
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not save your changes.', $dom));
    }

    // New hook functions
    pnModCallHooks('item', 'update', $args['dudid'], array('module' => 'Profile'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Delete a dynamic user data item
 * @author Mark West
 * @param int $args['dudid'] ID of the item
 * @return bool true on success, false on failure
 */
function Profile_adminapi_delete($args)
{
    // Argument check
    if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
        return LogUtil::registerArgsError();
    }

    $dudid = $args['dudid'];
    unset($args);

    $dom = ZLanguage::getModuleDomain('Profile');

    // The user API function is called.
    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $dudid));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom));
    }

    // normal type validation
    if ((int)$item['prop_dtype'] != 1) {
        return LogUtil::registerError(__('Error! You cannot delete this personal info item.', $dom), 404);
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile::Item', "$item[prop_label]::$dudid", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    // delete the property data aka attributes
    $pntables       = pnDBGetTables();
    $objattr_column = $pntables['objectdata_attributes_column'];

    $delwhere = "WHERE $objattr_column[attribute_name] = '" . DataUtil::formatForStore($item['prop_attribute_name']) . "'
                   AND $objattr_column[object_type] = 'users'";

    $res = DBUtil::deleteWhere('objectdata_attributes', $delwhere);
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not delete the personal info item.', $dom));
    }

    // delete the property
    $res = DBUtil::deleteObjectByID('user_property', $dudid, 'prop_id');
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not delete the personal info item.', $dom));
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $dudid, array('module' => 'Profile'));

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Activate a dynamic user data item
 * @author Mark West
 * @param int $args['dudid'] the id of the item to be updated
 * @return bool true on success, false on failure
 * @todo remove weight; can be got from get API
 */
function Profile_adminapi_activate($args)
{
    // Argument check
    if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    // The API function is called.
    $weightlimits = pnModAPIFunc('Profile', 'user', 'getweightlimits');

    // Update the item
    $obj = array('prop_id' => (int)$args['dudid'],
                 'prop_weight' => $weightlimits['max'] + 1);

    $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

    // Check for an error with the database code
    if (!$res) {
        return LogUtil::registerError(__('Error! Activation failed.', $dom));
    }

    return true;
}

/**
 * Deactivate a dynamic user data item
 * @author Mark West
 * @param int $args['dudid'] the id of the item to be updated
 * @return bool true on success, false on failure
 * @todo remove weight; can be got from get API
 */
function Profile_adminapi_deactivate($args)
{
    // Argument check
    if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Profile');

    $item = pnModAPIFunc('Profile', 'user', 'get', array('propid' => $args['dudid']));

    if ($item == false) {
        return LogUtil::registerError(__('Error! No such personal info item found.', $dom), 404);
    }

    // type validation
    if ($item['prop_dtype'] < 1) {
        return LogUtil::registerError(__('Error! You cannot deactivate this personal info item.', $dom), 404);
    }

    // Update the item
    $obj = array('prop_id' => (int)$args['dudid'],
                 'prop_weight' => 0);

    $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

    // Check for an error with the database code
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not deactivate the personal info item.', $dom));
    }

    // Get database setup
    $pntable = pnDBGetTables();

    $propertytable  = $pntable['user_property'];
    $propertycolumn = $pntable['user_property_column'];

    // Update the other items
    $sql = "UPDATE $propertytable
            SET    $propertycolumn[prop_weight] = $propertycolumn[prop_weight] - 1
            WHERE  $propertycolumn[prop_weight] > '" . (int)DataUtil::formatForStore($item['weight']) . "'";

    $res = DBUtil::executeSQL($sql);

    // Check for an error with the database code
    if (!$res) {
        return LogUtil::registerError(__('Error! Could not deactivate the personal info item.', $dom));
    }

    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Profile_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Profile');

    $links = array();

    if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
        $links[] = array('url'  => pnModURL('Profile', 'admin', 'view'),
                         'text' => __('Personal info items list', $dom));
    }
    if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADD)) {
        $links[] = array('url'  => pnModURL('Profile', 'admin', 'new'),
                         'text' => __('Create new personal info item', $dom));
    }
    if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
        $links[] = array('url'  => pnModURL('Profile', 'admin', 'modifyconfig'),
                         'text' => __('User account panel settings', $dom));
    }
    if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
        $links[] = array('url'  => pnModURL('Profile', 'admin', 'help'),
                         'text' => __('Help', $dom));
    }

    return $links;
}
