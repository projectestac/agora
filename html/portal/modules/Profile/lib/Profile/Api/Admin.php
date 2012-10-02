<?php

/**
 * Copyright Zikula Foundation 2009 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Administrative API functions for the Profile module.
 */
class Profile_Api_Admin extends Zikula_AbstractApi
{

    /**
     * Create a new dynamic user data item.
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * string label          The name of the item to be created.
     * string attribute_name The attribute name of the item to be created.
     * string dtype          The DUD type of the item to be created.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return boolean|integer dud item ID on success, false on failure
     */
    public function create($args)
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



        // Clean the label
        $permsep = System::getVar('shorturlsseparator', '-');
        $args['label'] = str_replace($permsep, '', DataUtil::formatPermalink($args['label']));
        $args['label'] = str_replace('-', '', DataUtil::formatPermalink($args['label']));

        // Check if the label or attribute name already exists
        $item = ModUtil::apiFunc('Profile', 'user', 'get', array('proplabel' => $args['label']));
        if ($item) {
            return LogUtil::registerError($this->__("Error! There is already an personal info item with the label '%s'.", DataUtil::formatForDisplay($args['label'])));
        }
        $item = ModUtil::apiFunc('Profile', 'user', 'get', array('propattribute' => $args['attribute_name']));
        if ($item) {
            return LogUtil::registerError($this->__("Error! There is already an personal info item with the attribute name '%s'.", DataUtil::formatForDisplay($args['attribute_name'])));
        }

        // Determine the new weight
        $weightlimits = ModUtil::apiFunc('Profile', 'user', 'getweightlimits');
        $weight = $weightlimits['max'] + 1;

        // a checkbox can't be required
        if ($args['displaytype'] == 2 && $args['required']) {
            $args['required'] = 0;
        }

        // produce the validation array
        $args['listoptions'] = str_replace(Chr(10), '', str_replace(Chr(13), '', $args['listoptions']));
        $validationinfo = array('required' => $args['required'],
            'viewby' => $args['viewby'],
            'displaytype' => $args['displaytype'],
            'listoptions' => $args['listoptions'],
            'note' => $args['note']);

        $obj = array();
        $obj['prop_label'] = $args['label'];
        $obj['prop_attribute_name'] = $args['attribute_name'];
        $obj['prop_dtype'] = $args['dtype'];
        $obj['prop_weight'] = $weight;
        $obj['prop_validation'] = serialize($validationinfo);

        $res = DBUtil::insertObject($obj, 'user_property', 'prop_id');

        // Check for an error with the database
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not create new attribute.'));
        }

        // Return the id of the newly created item to the calling process
        return $obj['prop_id'];
    }

    /**
     * Update a dynamic user data item.
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * int    dudid The id of the item to be updated.
     * string label The name of the item to be updated.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return bool True on success, false on failure.
     */
    public function update($args)
    {
        // Argument check
        if (!isset($args['label']) || stristr($args['label'], '-') ||
                !isset($args['dudid']) || !is_numeric($args['dudid'])) {
            return LogUtil::registerArgsError();
        }

        // The user API function is called.
        $item = ModUtil::apiFunc('Profile', 'user', 'get', array('propid' => $args['dudid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such personal info item found.'));
        }

        // Clean the label
        $permsep = System::getVar('shorturlsseparator');
        // TODO - Original line: $args['label'] = str_replace($permsep, '', DataUtil::formatPermalink($args['label']));
        // The above was converting the label to lower case, preventing update
        $args['label'] = str_replace($permsep, '', $args['label']);

        // Security check
        if (!SecurityUtil::checkPermission('Profile::Item', "$item[prop_label]::$args[dudid]", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        if (!SecurityUtil::checkPermission('Profile::Item', "$args[label]::$args[dudid]", ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        // If there's a new label, check if it already exists
        if ($args['label'] <> $item['prop_label']) {
            $vitem = ModUtil::apiFunc('Profile', 'user', 'get', array('proplabel' => $args['label']));
            if ($vitem) {
                return LogUtil::registerError($this->__("Error! There is already an personal info item with the label '%s'.", DataUtil::formatForDisplay($args['label'])));
            }
        }

        if (isset($args['prop_weight'])) {
            if ($args['prop_weight'] == 0) {
                unset($args['prop_weight']);
            } elseif ($args['prop_weight'] <> $item['prop_weight']) {
                $result = DBUtil::selectObjectByID('user_property', $args['prop_weight'], 'prop_weight');
                $result['prop_weight'] = $item['prop_weight'];

                $dbtable = DBUtil::getTables();
                $column = $dbtable['user_property_column'];
                $where = "$column[prop_weight] =  '$args[prop_weight]'
                        AND $column[prop_id] <> '$args[dudid]'";

                DBUtil::updateObject($result, 'user_property', $where, 'prop_id');
            }
        }

        // create the object to update
        $obj = array();
        $obj['prop_id'] = $args['dudid'];
        $obj['prop_dtype'] = (isset($args['dtype']) ? $args['dtype'] : $item['prop_dtype']);
        $obj['prop_weight'] = (isset($args['prop_weight']) ? $args['prop_weight'] : $item['prop_weight']);

        // assumes if displaytype is set, all the validation info is
        if (isset($args['displaytype'])) {
            // a checkbox can't be required
            if ($args['displaytype'] == 2 && $args['required']) {
                $args['required'] = 0;
            }

            // Produce the validation array
            $args['listoptions'] = str_replace(Chr(10), '', str_replace(Chr(13), '', $args['listoptions']));
            $validationinfo = array('required' => $args['required'],
                'viewby' => $args['viewby'],
                'displaytype' => $args['displaytype'],
                'listoptions' => $args['listoptions'],
                'note' => $args['note']);

            $obj['prop_validation'] = serialize($validationinfo);
        }

        // let to modify the label for normal fields only
        if ($item['prop_dtype'] == 1) {
            $obj['prop_label'] = $args['label'];
        }

        // before update it search for option ID change
        // to update the respective user's data
        if ($obj['prop_validation'] != $item['prop_validation']) {
            ModUtil::apiFunc('Profile', 'dud', 'updatedata', array('item' => $item['prop_validation'],
                'newitem' => $obj['prop_validation']));
        }

        $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

        // Check for an error with the database code
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not save your changes.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Delete a dynamic user data item.
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * int dudid ID of the item to delete.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return bool true on success, false on failure
     */
    public function delete($args)
    {
        // Argument check
        if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
            return LogUtil::registerArgsError();
        }

        $dudid = $args['dudid'];
        unset($args);

        // The user API function is called.
        $item = ModUtil::apiFunc('Profile', 'user', 'get', array('propid' => $dudid));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such personal info item found.'));
        }

        // normal type validation
        if ((int)$item['prop_dtype'] != 1) {
            return LogUtil::registerError($this->__('Error! You cannot delete this personal info item.'), 404);
        }

        // Security check
        if (!SecurityUtil::checkPermission('Profile::Item', "$item[prop_label]::$dudid", ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        // delete the property data aka attributes
        $dbtables = DBUtil::getTables();
        $objattr_column = $dbtables['objectdata_attributes_column'];

        $delwhere = "WHERE $objattr_column[attribute_name] = '" . DataUtil::formatForStore($item['prop_attribute_name']) . "'
                   AND $objattr_column[object_type] = 'users'";

        $res = DBUtil::deleteWhere('objectdata_attributes', $delwhere);
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not delete the personal info item.'));
        }

        // delete the property
        $res = DBUtil::deleteObjectByID('user_property', $dudid, 'prop_id');
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not delete the personal info item.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }

    /**
     * Activate a dynamic user data item.
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * int dudid The id of the item to be activated.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return bool true on success, false on failure
     * 
     * @todo remove weight; can be got from get API
     */
    public function activate($args)
    {
        // Argument check
        if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
            return LogUtil::registerArgsError();
        }

        // The API function is called.
        $weightlimits = ModUtil::apiFunc('Profile', 'user', 'getweightlimits');

        // Update the item
        $obj = array('prop_id' => (int)$args['dudid'],
            'prop_weight' => $weightlimits['max'] + 1);

        $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

        // Check for an error with the database code
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Activation failed.'));
        }

        return true;
    }

    /**
     * Deactivate a dynamic user data item.
     * 
     * Parameters passed in the $args array:
     * -------------------------------------
     * int dudid The id of the item to be deactivated.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return bool true on success, false on failure.
     * 
     * @todo remove weight; can be got from get API.
     */
    public function deactivate($args)
    {
        // Argument check
        if (!isset($args['dudid']) || !is_numeric($args['dudid'])) {
            return LogUtil::registerArgsError();
        }

        $item = ModUtil::apiFunc('Profile', 'user', 'get', array('propid' => $args['dudid']));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! No such personal info item found.'), 404);
        }

        // type validation
        if ($item['prop_dtype'] < 1) {
            return LogUtil::registerError($this->__('Error! You cannot deactivate this personal info item.'), 404);
        }

        // Update the item
        $obj = array('prop_id' => (int)$args['dudid'],
            'prop_weight' => 0);

        $res = DBUtil::updateObject($obj, 'user_property', '', 'prop_id');

        // Check for an error with the database code
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not deactivate the personal info item.'));
        }

        // Get database setup
        $dbtable = DBUtil::getTables();

        $propertytable = $dbtable['user_property'];
        $propertycolumn = $dbtable['user_property_column'];

        // Update the other items
        $sql = "UPDATE $propertytable
            SET    $propertycolumn[prop_weight] = $propertycolumn[prop_weight] - 1
            WHERE  $propertycolumn[prop_weight] > '" . (int)DataUtil::formatForStore($item['weight']) . "'";

        $res = DBUtil::executeSQL($sql);

        // Check for an error with the database code
        if (!$res) {
            return LogUtil::registerError($this->__('Error! Could not deactivate the personal info item.'));
        }

        return true;
    }

    /**
     * Get available admin panel links.
     * 
     * @return array An array of admin links.
     */
    public function getlinks()
    {
        $links = array();

        // Add User module links
        $links[] = array('url' => ModUtil::url('Profile', 'admin', 'view'),
            'text' => $this->__('Users Module'),
            'class' => 'z-icon-es-user',
            'links' => ModUtil::apiFunc('Users', 'admin', 'getlinks'));

        if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
            $links[] = array('url' => ModUtil::url('Profile', 'admin', 'view'),
                'text' => $this->__('Personal info items list'),
                'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('Profile', 'admin', 'newdud'),
                'text' => $this->__('Create new personal info item'),
                'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('Profile', 'admin', 'modifyconfig'),
                'text' => $this->__('User account panel settings'),
                'class' => 'z-icon-es-config');
        }
        if (SecurityUtil::checkPermission('Profile::', '::', ACCESS_EDIT)) {
            $links[] = array('url' => ModUtil::url('Profile', 'admin', 'help'),
                'text' => $this->__('Help'),
                'class' => 'z-icon-es-help');
        }

        return $links;
    }

}