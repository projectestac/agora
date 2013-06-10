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
 * Operations accessible by non-administrative users.
 */
class Profile_Api_User extends Zikula_AbstractApi
{
    /**
     * Get all Dynamic user data fields.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * int    startnum Starting record number for request; optional; default is to return items beginning with the first.
     * int    numitems Number of records to retrieve; optional; default is to return all items.
     * string index    The field to use as the array index for the returned items; one of 'prop_id', 'prop_label', or 'prop_attribute_name'; optional; default = 'prop_label'.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return array|boolean Array of items, or false on failure.
     */
    public function getall($args)
    {
        // Optional arguments.
        if (!isset($args['startnum'])) {
            $args['startnum'] = 1;
        }
        if (!isset($args['numitems'])) {
            $args['numitems'] = -1;
        }
        if (!isset($args['index']) || !in_array($args['index'], array('prop_id', 'prop_label', 'prop_attribute_name'))) {
            $args['index'] = 'prop_label';
        }

        if (!isset($args['startnum']) || !isset($args['numitems'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_READ)) {
            return array();
        }

        // We now generate a where-clause
        $where   = '';
        $orderBy = 'prop_weight';

        $permFilter = array();
        $permFilter[] = array(
            'component_left'   =>  'Profile',
            'component_middle' =>  '',
            'component_right'  =>  'item',
            'instance_left'    =>  'prop_label',
            'instance_middle'  =>  '',
            'instance_right'   =>  'prop_id',
            'level'            =>  ACCESS_READ,
        );

        $items = DBUtil::selectObjectArray('user_property', $where, $orderBy, $args['startnum']-1, $args['numitems'], $args['index'], $permFilter);

        // Put items into result array.
        foreach (array_keys($items) as $k) {
            $validationinfo = @unserialize($items[$k]['prop_validation']);
            unset($items[$k]['prop_validation']);

            // Expand the item array
            foreach ((array)$validationinfo as $infolabel => $infofield) {
                $items[$k]["prop_$infolabel"] = $infofield;
            }
        }

        // Return the items
        return $items;
    }

    /**
     * Get a specific Dynamic user data item.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * integer propid        Id of the property to get; optional if proplabel or propattribute provided.
     * string  proplabel     Label of the property to get; optional if propid or propattribute provided; ignored if propid provided.
     * string  propattribute Attribute name of the property to get; optional if propid or proplabel provided; ignored if propid or proplabel provided.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return array|boolean Item array, or false on failure.
     */
    public function get($args)
    {
        // Argument check
        if (!isset($args['propid']) && !isset($args['proplabel']) && !isset($args['propattribute'])) {
            return LogUtil::registerArgsError();
        }

        // Get item with where clause
        if (isset($args['propid'])) {
            $item = DBUtil::selectObjectByID('user_property', (int)$args['propid'], 'prop_id');
        } elseif (isset($args['proplabel'])) {
            $item = DBUtil::selectObjectByID('user_property', $args['proplabel'], 'prop_label');
        } else {
            $item = DBUtil::selectObjectByID('user_property', $args['propattribute'], 'prop_attribute_name');
        }

        // Check for no rows found, and if so return
        if (!$item) {
            return false;
        }

        // Security check
        if (!SecurityUtil::checkPermission('Profile::', "$item[prop_label]::$item[prop_id]", ACCESS_READ)) {
            return false;
        }

        // Extract the validation info array
        $validationinfo = @unserialize($item['prop_validation']);
        unset($item['prop_validation']);

        // Expand the item array
        foreach ((array)$validationinfo as $infolabel => $infofield) {
            $item["prop_$infolabel"] = $infofield;
        }

        // Return the item array
        return $item;
    }

    /**
     * Get all active Dynamic user data fields.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * integer startnum Starting record number for request; optional; default is to start with the first record.
     * integer numitems Number of records to retrieve; optional; default is to return all records.
     * string  index    The field to use as the array index for the returned items; one of 'prop_id', 'prop_label', or 'prop_attribute_name'; 
     *                      optional; default = 'prop_attribute_name'.
     * string  get      Which subset of fields to return; one of 'all', 'editable', 'viewable'; optional; default = 'all'.
     * integer uid      The user id of the user for which data fields are being retrieved, in order to filter the result based on ownership of the data; 
     *                      optional; defaults to -1, which will not match any user id (i.e., all owner-only fields are not returned unless the current user 
     *                      has ADMIN access).
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return array|boolean Array of items, or false on failure.
     */
    public function getallactive($args)
    {
        // Optional arguments.
        if (!isset($args['startnum'])) {
            $args['startnum'] = -1;
        }
        if (!isset($args['numitems']) || $args['numitems'] <= 0) {
            $args['numitems'] = 0;
        }

        if (!isset($args['index']) || !in_array($args['index'], array('prop_id', 'prop_label', 'prop_attribute_name'))) {
            $args['index'] = 'prop_attribute_name';
        }
        if (!isset($args['get']) || !in_array($args['get'], array('editable', 'viewable', 'all'))) {
            $args['get'] = 'all';
        }
        if (!isset($args['uid']) || !is_numeric($args['uid'])) {
            $args['uid'] = 0;
        }

        // Security check
        if (!SecurityUtil::checkPermission('Profile::', '::', ACCESS_READ)) {
            return array();
        }

        static $items;

        if (!isset($items)) {
            // Get datbase setup
            $dbtable = DBUtil::getTables();
            $column  = $dbtable['user_property_column'];
            $where   = "WHERE {$column['prop_weight']} > '0'
                    AND   {$column['prop_dtype']} >= '0'";
            $orderBy = $column['prop_weight'];

            $permFilter = array();
            $permFilter[] = array('component_left'   =>  'Profile',
                    'component_middle' =>  '',
                    'component_right'  =>  '',
                    'instance_left'    =>  'prop_label',
                    'instance_middle'  =>  '',
                    'instance_right'   =>  'prop_id',
                    'level'            =>  ACCESS_READ);

            $items = DBUtil::selectObjectArray('user_property', $where, $orderBy, -1, -1, 'prop_id', $permFilter);

            foreach (array_keys($items) as $k) {
                // Extract the validation info array
                $validationinfo = @unserialize($items[$k]['prop_validation']);
                unset($items[$k]['prop_validation']);

                foreach ((array)$validationinfo as $infolabel => $infofield) {
                    $items[$k]["prop_$infolabel"] = $infofield;
                }
            }
        }

        // process the startnum and numitems
        if ($args['numitems']) {
            $items = array_splice($items, $args['startnum']+1, $args['numitems']);
        } else {
            $items = array_splice($items, $args['startnum']+1);
        }

        // Put items into result array and filter if needed
        $currentuser = (int)UserUtil::getVar('uid');
        $ismember    = ($currentuser >= 2);
        $isowner     = ($currentuser == (int)$args['uid']);
        $isadmin     = SecurityUtil::checkPermission('Profile::', '::', ACCESS_ADMIN);

        $result  = array();
        foreach ($items as $item) {
            switch ($args['get']) {
                case 'editable':
                    // check the display type
                    if ($item['prop_dtype'] < 0) {
                        break;
                    }
                    // Fall through to next case on purpose, handle editable and viewable the same at this point.
                case 'viewable':
                    $isallowed = true;
                    // check the item visibility
                    switch ($item['prop_viewby']) {
                        // everyone, do nothing
                        case '0':
                            break;
                        // members only or higher
                        case '1':
                            $isallowed = ($isowner || $ismember);
                            break;
                        // account owner or admin
                        case '2':
                            $isallowed = ($isowner || $isadmin);
                            break;
                        // admins only
                        case '3':
                            $isallowed = $isadmin;
                            break;
                    }
                    // break if it's not viewable
                    if (!$isallowed) {
                        break;
                    }
                case 'all':
                    $result[$item[$args['index']]] = $item;
            }
        }

        // Return the items
        return $result;
    }

    /**
     * Utility function to count the number of items held by this module.
     *
     * @return integer Number of items held by this module.
     */
    public function countitems()
    {
        // Return the number of items
        return DBUtil::selectObjectCount('user_property');
    }

    /**
     * Utility function to get the weight limits.
     *
     * @return array|boolean Array of weight limits (min and max), or false on failure.
     */
    public function getweightlimits()
    {
        // Get datbase setup
        $dbtable = DBUtil::getTables();
        $column  = $dbtable['user_property_column'];

        $where = "WHERE {$column['prop_weight']} != 0";
        $max   = DBUtil::selectFieldMax('user_property', 'prop_weight', 'MAX', $where);

        $where = "WHERE {$column['prop_weight']} != 0";
        $min   = DBUtil::selectFieldMax('user_property', 'prop_weight', 'MIN', $where);

        // Return the number of items
        return array('min' => $min, 'max' => $max);
    }

    /**
     * Utility function to save the data of the user.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * integer uid      The user id of the user for which the data should be saved; required.
     * array   dynadata The data for the user to be saved, indexed by prop_attribute_name; required.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return boolean True on success; otherwise false.
     */
    public function savedata($args)
    {
        // Argument check
        if (!isset($args['uid'])) {
            return LogUtil::registerArgsError();
        }

        $fields = $args['dynadata'];

        $duds = ModUtil::apiFunc('Profile', 'user', 'getallactive', array('get' => 'editable', 'uid' => $args['uid']));

        foreach ($duds as $attrname => $dud) {
            // exclude avatar update when Avatar module is present
            if ($attrname == 'avatar' && ModUtil::available('Avatar')) {
                continue;
            }

            $fieldvalue = '';
            if (isset($fields[$attrname])) {
                // Process the Date DUD separately
                if ($dud['prop_displaytype'] == 5 && !empty($fields[$attrname])) {
                    $fieldvalue = $this->parseDate($fields[$attrname]);
                    $fieldvalue = DateUtil::transformInternalDate($fieldvalue);
                } elseif (is_array($fields[$attrname])) {
                    $fieldvalue = serialize(array_values($fields[$attrname]));
                } else {
                    $fieldvalue = $fields[$attrname];
                }
            }
            UserUtil::setVar($attrname, $fieldvalue, $args['uid']);
        }

        // Return the result (true = success, false = failure
        // At this point, the result is true.
        return true;
    }

    /**
     * Parses and reformats a date for user entry validation.
     *
     * @param string &$datestring The entered date string to be parsed; NOTE: passed by reference, the value will be changed to a date reformatted with
     *                              the "%d.%m.%Y" date format string; required.
     * 
     * @return string The parsed date string, as returned by {@link DateUtil::parseUIDate()}.
     */
    protected function parseDate(&$datestring) {
        $dateformats = array(null,"%d.%m.%Y", "%Y-%m-%d", "%e.%n.%Y", "%e.%n.%y", "%Y/%m/%d", "%y/%m/%d");
        $result = null;
        foreach ($dateformats as $format) {
            $result = DateUtil::parseUIDate($datestring, $format);
            if ($result != null) {
                $datestring = DateUtil::formatDatetime($result, "%d.%m.%Y", false);
                break;
            }
        }
        return $result;
    }

    /**
     * Profile_Manager function to check the required missing.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * array dynadata The array of user data, index by prop_attribute_name, to check; required, but may be passed in a GET, POST, REQUEST, or SESSION variable.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return array|boolean False on success (no errors); otherwise an array in the form array('result' => true, 'fields' => array of field names).
     */
    public function checkrequired($args)
    {
        // Argument check
        if (!isset($args['dynadata'])) {
            throw new Zikula_Exception_Fatal($this->__f('Missing dynamic data array in call to %1$s', array('checkrequired')));
        }

        // The API function is called.
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive', array('get' => 'editable'));

        // Initializing Error check
        $error = false;

        foreach ($items as $item) {
            if ($item['prop_required'] == 1) {
                // exclude the checkboxes from required check
                if (in_array($item['prop_displaytype'], array(2, 7))) {
                    continue;
                } elseif (!isset($args['dynadata'][$item['prop_attribute_name']])) {
                    $error['result'] = true;
                    $error['fields'][] = $item['prop_attribute_name'];
                    $error['translatedFields'][] = $this->__($item['prop_label']);
                } elseif (is_array($args['dynadata'][$item['prop_attribute_name']])) {
                    while (list(,$value) = each($args['dynadata'][$item['prop_attribute_name']])) {
                        if ($this->profileIsEmptyValue($value)) {
                            $error['result'] = true;
                            $error['fields'][] = $item['prop_attribute_name'];
                            $error['translatedFields'][] = $this->__($item['prop_label']);
                        }
                    }
                } elseif ($item['prop_displaytype'] == 5 && $this->parseDate($args['dynadata'][$item['prop_attribute_name']]) == null) {
                    // not empty, check if date is correct
                    $error['result'] = true;
                    $error['fields'][] = $item['prop_attribute_name'];
                    $error['translatedFields'][] = $this->__($item['prop_label']);
                } elseif ($this->profileIsEmptyValue($args['dynadata'][$item['prop_attribute_name']])) {
                    $error['result'] = true;
                    $error['fields'][] = $item['prop_attribute_name'];
                    $error['translatedFields'][] = $this->__($item['prop_label']);
                }
            }
        }

        if (!empty($error)) {
            $error['translatedFieldsStr'] = join(', ', $error['translatedFields']);
        }

        // Return the result
        return $error;
    }

    /**
     * Checks if a value is empty, however if the $value is 0, it is not considered empty.
     *
     * @param mixed $value The value to check for empty.
     *
     * @return boolean True if the value is empty (according to the PHP function) and is not 0; otherwise false.
     */
    protected function profileIsEmptyValue($value)
    {
        $empty = false;

        if (empty($value)) {
            $empty = true;
        }

        if (!$empty && (trim($value) == '')) {
            $empty = true;
        }

        if ($empty && is_numeric($value) && $value == 0) {
            $empty = false;
        }

        return $empty;
    }

    /**
     * Profile_Manager function to retrieve the dynamic data to the user object.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * numeric uid      The user id of the user for which the data is to be inserted.
     * array   dynadata The user data to insert, indexed by prop_attribute_name; required, however can be passed by a GET, POST, REQUEST, COOKIE, or SESSION variable.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return array The dynadata array as an array element in the '__ATTRIBUTES__' index of a new array, merged with existing user
     *                  attributes if the uid is supplied and is a valid user, unchanged (not merged) if the uid is not supplied or does
     *                  not refer to an existing user, or an empty array if the dynadata is not supplied or is empty.
     */
    public function insertdyndata($args)
    {
        if (!isset($args['dynadata'])) {
            throw new Zikula_Exception_Fatal($this->__f('Missing dynamic data array in call to %1$s', array('checkrequired')));
        }
        
        $dynadata = $args['dynadata'];

        // Validate if there's no dynadata
        // do not touch the __ATTRIBUTES__ field
        if (empty($dynadata)) {
            return array();
        }

        // Validate if it's an existing user
        if (!isset($args['uid'])) {
            return array('__ATTRIBUTES__' => $dynadata);
        }

        // Needs to merge the existing attributes to not delete any of them
        $user = DBUtil::selectObjectByID('users', $args['uid'], 'uid');

        if ($user === false || !isset($user['__ATTRIBUTES__'])) {
            return array('__ATTRIBUTES__' => $dynadata);
        }

        // attach the dynadata as attributes to the user object
        return array('__ATTRIBUTES__' => array_merge($user['__ATTRIBUTES__'], $dynadata));
    }

    /**
     * Search the input values through the dynadata.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * array dynadata An array of data on which to search; required, but may be passed as a GET, POST, REQUEST, COOKIE, or SESSION variable.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return array An array of uids for users who have matching attributes as specified by the dynadata array; an empty array if there are no matching users.
     */
    public function searchdynadata($args)
    {
        $uids = array();

        if (!isset($args['dynadata'])) {
            throw new Zikula_Exception_Fatal($this->__f('Missing dynamic data array in call to %1$s', array('checkrequired')));
        }
        
        $dynadata = $args['dynadata'];

        // Validate if there's any dynamic data
        if (empty($dynadata) || !is_array($dynadata)) {
            return $uids;
        }

        $params = array('returnUids' => true);
        if (count($dynadata) == 1 && in_array('all', array_keys($dynadata))) {
            $params['searchby'] = $dynadata;

        } else {
            $duditems = ModUtil::apiFunc('Profile', 'user', 'getall');

            $params['searchby'] = array();
            foreach ($duditems as $item) {
                if (isset($dynadata[$item['prop_attribute_name']]) && !empty($dynadata[$item['prop_attribute_name']])) {
                    $params['searchby'][$item['prop_id']] = $dynadata[$item['prop_attribute_name']];
                }
            }
        }

        if (!empty($params['searchby'])) {
            $uids = ModUtil::apiFunc('Profile', 'memberslist', 'getall', $params);
        }

        return $uids;
    }


    /**
     * Decode the custom url string.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * array vars The array of URL variables to decode; required.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return bool true if successful, false otherwise
     */
    public function decodeurl($args)
    {
        // check we actually have some vars to work with...
        if (!isset($args['vars'])) {
            return LogUtil::registerArgsError();
        }

        // let the core handled everything except the view function
        if (!isset($args['vars'][2]) || empty($args['vars'][2]) || $args['vars'][2] != 'view') {
            return false;
        }
        
        System::queryStringSetVar('type', 'user');
        System::queryStringSetVar('func', 'view');

        // identify the correct parameter to identify the user
        if (isset($args['vars'][3])) {
            if (is_numeric($args['vars'][3])) {
                System::queryStringSetVar('uid', $args['vars'][3]);
            } else {
                System::queryStringSetVar('uname', $args['vars'][3]);
            }
        }

        if (isset($args['vars'][4])) {
            System::queryStringSetVar('page', $args['vars'][4]);
        }

        return true;
    }

    /**
     * Create custom url string.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * string modname The module name for the URL; required.
     * string type    The function type; optional; defaults to 'user'.
     * string func    The function name for the URL; required.
     * array  args    An array of arguments for the URL's query string; required; if $args['func'] is 'view' then either $args['args']['uname'] 
     *                  or $args['args']['uid'] is required.
     * 
     * @param array $args All parameters passed to this function.
     *
     * @return string The custom url string.
     */
    public function encodeurl($args)
    {
        // check we have the required input
        if (!isset($args['modname']) || !isset($args['func']) || !isset($args['args'])) {
            return LogUtil::registerArgsError();
        }

        if (!isset($args['type'])) {
            $args['type'] = 'user';
        } elseif (!is_string($args['type']) || ($args['type'] != 'user')) {
            return LogUtil::registerArgsError();
        }
        
        if (empty($args['func'])) {
            $args['func'] = 'main';
        }

        // create an empty string ready for population
        $vars = '';

        // let the core handled everything except the view function
        if ($args['func'] == 'view' && (isset($args['args']['uname']) || isset($args['args']['uid']))) {
            isset($args['args']['uname']) ? $vars = $args['args']['uname'] : $vars = $args['args']['uid'];
        } else {
            return false;
        }

        if (isset($args['args']['page'])) {
            $vars .= "/{$args['args']['page']}";
        }

        // construct the custom url part
        return $args['modname'] . '/' . $args['func'] . '/' . $vars;
    }
}