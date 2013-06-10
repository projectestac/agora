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
 * API functions related to member list management.
 */
class Profile_Api_Memberslist extends Zikula_AbstractApi
{
    /**
     * Get or count users that match the given criteria.
     * 
     * @param boolean $countOnly True to only return a count, if false the matching uids are returned in an array.
     * @param mixed   $searchBy  Selection criteria for the query that retrieves the member list; one of 'uname' to select by user name, 'all' to select on all
     *                              available dynamic user data properites, a numeric value indicating the property id of the property on which to select, 
     *                              an array indexed by property id containing values for each property on which to select, or a string containing the name of
     *                              a property on which to select.
     * @param string  $letter    If searchby is 'uname' then either a letter on which to match the beginning of a user name or a non-letter indicating that
     *                              selection should include user names beginning with numbers and/or other symbols, if searchby is a numeric propery id or 
     *                              is a string containing the name of a property then the string on which to match the begining of the value for that property.
     * @param string  $letter     Letter to filter by.
     * @param string  $sortBy     A comma-separated list of fields on which the list of members should be sorted.
     * @param string  $sortOrder  One of 'ASC' or 'DESC' indicating whether sorting should be in ascending order or descending order.
     * @param numeric $startNum   Start number for recordset; ignored if $countOnly is true.
     * @param numeric $numItems   Number of items to return; ignored if $countOnly is true.
     * @param boolean $returnUids Return an array of uids if true, otherwise return an array of user records; ignored if $countOnly is true.
     * 
     * @return array|integer Matching user ids or a count of the matching integers.
     */
    protected function getOrCountAll($countOnly, $searchBy, $letter, $sortBy, $sortOrder, $startNum = -1, $numItems = -1, $returnUids = false)
    {
        if (!isset($startNum) || !is_numeric($startNum) || ($startNum != (string)((int)$startNum)) || ($startNum < -1)) {
            throw new Zikula_Exception_Fatal($this->__f('Invalid %1$s.', array('startNum')));
        } elseif ($startNum <= 0) {
            $startNum = -1;
        }
        
        if (!isset($numItems) || !is_numeric($numItems) || ($numItems != (string)((int)$numItems)) || (($numItems != -1) && ($numItems < 1))) {
            throw new Zikula_Exception_Fatal($this->__f('Invalid %1$s.', array('startNum')));
        }
        
        if (!isset($sortBy) || empty($sortBy)) {
            $sortBy = 'uname';
        }
        if (!isset($sortOrder) || empty($sortOrder)) {
            $sortOrder = 'ASC';
        }
        if (!isset($searchBy) || empty($searchBy)) {
            $searchBy = 'uname';
        }
        if (!isset($letter)) {
            $letter = null;
        }

        // define the array to hold the result items
        $items = array();

        // Security check
        if (!SecurityUtil::checkPermission('Profile:Members:', '::', ACCESS_READ)) {
            return $items;
        }

        // Sanitize the args used in queries
        $letter   = DataUtil::formatForStore($letter);
        $searchBy = DataUtil::formatForStore($searchBy);

        // load the database information for the users module
        ModUtil::dbInfoLoad('ObjectData');
        ModUtil::dbInfoLoad('Users');

        // Get database setup
        $dbtable = DBUtil::getTables();
        
        $userscolumn = $dbtable['users_column'];
        $datacolumn  = $dbtable['objectdata_attributes_column'];
        $propcolumn  = $dbtable['user_property_column'];
        
        $joinInfo = array();
        if ($searchBy != 'uname') {
            $joinInfo[] = array(
                'join_table'            => 'objectdata_attributes',
                'join_field'            => array(),
                'object_field_name'     => array(),
                'compare_field_table'   => 'uid',
                'compare_field_join'    => 'object_id',
            );
            $joinInfo[] = array(
                'join_table'            => 'user_property',
                'join_field'            => array(),
                'object_field_name'     => array(),
                'compare_field_table'   => "a.{$datacolumn['attribute_name']}",
                'compare_field_join'    => 'prop_attribute_name',
            );
        }
        
        $where = "WHERE tbl.{$userscolumn['uid']} != 1 ";
        if ($searchBy == 'uname') {
            $join  = '';
            if (!empty($letter) && preg_match('/[a-z]/i', $letter)) {
                // are we listing all or "other" ?
                $where .= "AND LOWER(tbl.{$userscolumn['uname']}) LIKE '".mb_strtolower($letter)."%' ";
                // I guess we are not..
            } else if (!empty($letter)) {
                // But other are numbers ?
                static $otherWhere;
                if (!isset($otherWhere)) {
                    $otherList = array ('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', '.', '@', '$');
                    $otherWhere = array();
                    foreach ($otherList as $other) {
                        $otherWhere[] = "tbl.{$userscolumn['uname']} LIKE '{$other}%'";
                    }
                    $otherWhere = 'AND (' . implode(' OR ', $otherWhere) . ') ';
                }
                
                $where .= $otherWhere;

                // fifers: while this is not the most eloquent solution, it is
                // cross database compatible.  We could do an if dbtype is mysql
                // then do the regexp.  consider for performance enhancement.
                //
                // if you know a better way to match only the first char
                // to be a number in uname, open a ticket with the Profile project.
            }

        } else if (is_array($searchBy)) {
            if (count($searchBy) == 1 && in_array('all', array_keys($searchBy))) {
                // args.searchby is all => search_value to loop all the user attributes

                $value = DataUtil::formatForStore($searchBy['all']);
                $where .= "AND a.{$datacolumn['object_type']} = 'users' AND a.{$datacolumn['obj_status']} = 'A' ";
                $where .= "AND b.{$propcolumn['prop_weight']} > 0 AND b.{$propcolumn['prop_dtype']} >= 0 AND a.{$datacolumn['value']} LIKE '%{$value}%' ";

            } else {
                // args.searchby is an array of the form prop_id => value
                $whereList = array();
                foreach ($searchBy as $prop_id => $value) {
                    $prop_id = DataUtil::formatForStore($prop_id);
                    $value   = DataUtil::formatForStore($value);
                    $whereList[] = "(b.{$propcolumn['prop_id']} = '{$prop_id}' AND a.{$datacolumn['value']} LIKE '%{$value}%')";
                }
                // check if there where contitionals
                if (!empty($whereList)) {
                    $where .= 'AND ' . implode(' AND ', $whereList) . ' ';
                }
            }

        } else if (is_numeric($searchBy)) {
            $where .= "AND b.{$propcolumn['prop_id']} = '{$searchBy}' AND a.{$datacolumn['value']} LIKE '{$letter}%' ";

        } elseif (isset($propcolumn[$searchBy])) {
            $where .= 'AND b.' . $propcolumn[$searchBy] . " LIKE '{$letter}%' ";
        }

        if (ModUtil::getVar('Profile', 'filterunverified')) {
            $where .= "AND tbl.{$userscolumn['activated']} = " . Users_Constant::ACTIVATED_ACTIVE . ' ';
        }
        
        if (array_key_exists($sortBy, $userscolumn)) {
            $orderBy = 'tbl.'.$userscolumn[$sortBy] .' '. $sortOrder;
        } else {
            $orderBy = DataUtil::formatForStore($sortBy) .' '. $sortOrder;
        }
        if ($orderBy && $sortBy != 'uname') {
            $orderBy .= ", {$userscolumn['uname']} ASC ";
        }
        
        if ($countOnly) {
            $result = DBUtil::selectExpandedObjectCount('users', $joinInfo, $where, true);
        } else {
            $result = DBUtil::selectExpandedFieldArray('users', $joinInfo, 'uid', $where, $orderBy, true, '', null, $startNum, $numItems);
            
            if (!$returnUids) {
                foreach ($result as $key => $uid) {
                    $result[$key] = UserUtil::getVars($uid);
                }
            }
        }

        // Return the items
        return $result;
    }

    /**
     * Get users that match the given criteria.
     * 
     * This API function returns all users ids. This function allows for filtering and for paged selection.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * mixed   searchby   Selection criteria for the query that retrieves the member list; one of 'uname' to select by user name, 'all' to select on all
     *                      available dynamic user data properites, a numeric value indicating the property id of the property on which to select, 
     *                      an array indexed by property id containing values for each property on which to select, or a string containing the name of
     *                      a property on which to select.
     * string  letter     If searchby is 'uname' then either a letter on which to match the beginning of a user name or a non-letter indicating that
     *                      selection should include user names beginning with numbers and/or other symbols, if searchby is a numeric propery id or 
     *                      is a string containing the name of a property then the string on which to match the begining of the value for that property.
     * string  sortby     A comma-separated list of fields on which the list of members should be sorted.
     * string  sortorder  One of 'ASC' or 'DESC' indicating whether sorting should be in ascending order or descending order.
     * numeric startnum   Start number for recordset.
     * numeric numitems   Number of items to return.
     * boolean returnUids If true then a simple array containing only uids is returned, if false then an array containing full user records is returned.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return array Matching user ids.
     */
    public function getall($args)
    {
        // Optional arguments.
        if (!isset($args['startnum'])) {
            $args['startnum'] = -1;
        }
        if (!isset($args['numitems'])) {
            $args['numitems'] = -1;
        }
        if (!isset($args['sortby']) || empty($args['sortby'])) {
            $args['sortby'] = 'uname';
        }
        if (!isset($args['sortorder']) || empty($args['sortorder'])) {
            $args['sortorder'] = 'ASC';
        }
        if (!isset($args['searchby']) || empty($args['searchby'])) {
            $args['searchby'] = 'uname';
        }
        if (!isset($args['letter'])) {
            $args['letter'] = null;
        }
        if (!isset($args['returnUids'])) {
            $args['returnUids'] = false;
        } else {
            $args['returnUids'] = (bool)$args['returnUids'];
        }
        
        return $this->getOrCountAll(false, $args['searchby'], $args['letter'], $args['sortby'], $args['sortorder'], $args['startnum'], $args['numitems'], $args['returnUids']);
    }

    /**
     * Count users that match the given criteria.
     * 
     * This API function returns all users ids. This function allows for filtering and for paged selection.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * mixed   searchby  Selection criteria for the query that retrieves the member list; one of 'uname' to select by user name, 'all' to select on all
     *                              available dynamic user data properites, a numeric value indicating the property id of the property on which to select, 
     *                              an array indexed by property id containing values for each property on which to select, or a string containing the name of
     *                              a property on which to select.
     * string  letter    If searchby is 'uname' then either a letter on which to match the beginning of a user name or a non-letter indicating that
     *                              selection should include user names beginning with numbers and/or other symbols, if searchby is a numeric propery id or 
     *                              is a string containing the name of a property then the string on which to match the begining of the value for that property.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return array Count of matching users.
     */
    public function countitems($args)
    {
        if (!isset($args['searchby']) || empty($args['searchby'])) {
            $args['searchby'] = 'uname';
        }
        if (!isset($args['letter'])) {
            $args['letter'] = null;
        }
        
        $sortBy = 'uname';
        $sortOrder = 'ASC';

        return $this->getOrCountAll(true, $args['searchby'], $args['letter'], $sortBy, $sortOrder);
    }

    /**
     * Counts the number of users online.
     *
     * @return integer Count of registered users online.
     */
    public function getregisteredonline()
    {
        // Get database setup
        $dbtable = DBUtil::getTables();

        // It's good practice to name the table and column definitions you are
        // getting - $table and $column don't cut it in more complex modules
        $sessioninfocolumn = $dbtable['session_info_column'];
        $sessioninfotable  = $dbtable['session_info'];

        $activetime = date('Y-m-d H:i:s', time() - (System::getVar('secinactivemins') * 60));

        $where = "$sessioninfocolumn[uid] <> 0 AND $sessioninfocolumn[lastused] > '$activetime'";

        $result = DBUtil::selectFieldArray('session_info', 'uid', $where, '', true);

        if ($result === false) {
            return LogUtil::registerError($this->__('Error! Could not load data.'));
        }

        $numusers = count($result);

        // Return the number of items
        return $numusers;
    }

    /**
     * Get the latest registered user.
     *
     * @return integer Latest registered user id.
     */
    public function getlatestuser()
    {
        // load the database information for the users module
        ModUtil::dbInfoLoad('Users');

        // Get database setup
        $dbtable = DBUtil::getTables();

        // It's good practice to name the table and column definitions you are
        // getting - $table and $column don't cut it in more complex modules
        $userscolumn = $dbtable['users_column'];

        // filter out unverified users
        $where = "{$userscolumn['uid']} != 1 ";
        if (ModUtil::getVar('Profile', 'filterunverified')) {
            $where .= " AND {$userscolumn['activated']} = " . Users_Constant::ACTIVATED_ACTIVE . ' ';
        }
        
        $orderby = "uid DESC ";
        
        $result = DBUtil::selectObjectArray('users', $where, $orderby, -1, 1, '', null, null, array('uid'));

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if (($result === false) || empty($result) || !isset($result[0]) || empty($result[0]) || !isset($result[0]['uid']) || empty($result[0]['uid'])) {
            return LogUtil::registerError($this->__('Error! Could not load data.'));
        }

        return $result[0]['uid'];
    }

    /**
     * Determine if a user is online.
     *
     * Parameters passed in the $args array:
     * -------------------------------------
     * numeric userid The uid of the user for whom a determination should be made; required.
     * 
     * @param array $args All parameters passed to this function.
     * 
     * @return bool True if the specified user is online; false otherwise.
     */
    public function isonline($args)
    {
        // check arguments
        if (!isset($args['userid']) || empty($args['userid']) || !is_numeric($args['userid'])) {
            return false;
        }

        // Get database setup
        $dbtable = DBUtil::getTables();

        // get active time based on security settings
        $activetime = date('Y-m-d H:i:s', time() - (System::getVar('secinactivemins') * 60));

        // It's good practice to name the table and column definitions you are
        // getting - $table and $column don't cut it in more complex modules
        $sessioninfocolumn = $dbtable['session_info_column'];
        $sessioninfotable  = $dbtable['session_info'];
        
        $where = "WHERE {$sessioninfocolumn['uid']} = " . DataUtil::formatForStore($args['userid']) . " AND {$sessioninfocolumn['lastused']} > '{$activetime}'";
        
        $result = DBUtil::selectObjectArray('session_info', $where, '', -1, -1, '', null, null, array('uid'), true);

        if ($result === false) {
            return LogUtil::registerError($this->__('Error! Could not load data.'));
        }

        // Return if the user is online
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Return registered users online.
     *
     * @return array Registered users who are online.
     */
    public function whosonline()
    {
        // Get database setup
        $dbtable = DBUtil::getTables();

        // define the array to hold the resultant items
        $items = array();
        // It's good practice to name the table and column definitions you are
        // getting - $table and $column don't cut it in more complex modules
        $sessioninfocolumn = $dbtable['session_info_column'];
        $sessioninfotable  = $dbtable['session_info'];

        // get active time based on security settings
        $activetime = date('Y-m-d H:i:s', time() - (System::getVar('secinactivemins') * 60));

        $where = "WHERE {$sessioninfocolumn['uid']} != 1 AND {$sessioninfocolumn['lastused']} > '{$activetime}' ";
        
        $result = DBUtil::selectObjectArray('session_info', $where, '', -1, -1, '', null, null, array('uid'), true);

        if ($result === false) {
            return LogUtil::registerError($this->__('Error! Could not load data.'));
        }

        foreach ($result as $key => $user) {
            $result[$key] = UserUtil::getVars($user['uid']);
        }

        // Return the items
        return $result;
    }

    /**
     * Returns all users online.
     *
     * @return array All online visitors (including anonymous).
     */
    public function getallonline()
    {
        // Get database setup
        $dbtable = DBUtil::getTables();

        // define the array to hold the resultant items
        $items = array();

        $sessioninfotable  = $dbtable['session_info'];
        $sessioninfocolumn = &$dbtable['session_info_column'];
        $usertbl           = $dbtable['users'];
        $usercol           = &$dbtable['users_column'];

        // get active time based on security
        $activetime = date('Y-m-d H:i:s', time() - (System::getVar('secinactivemins') * 60));

        
        $where = "WHERE {$sessioninfocolumn['lastused']} > '{$activetime}' ";
        // Check if anonymous session are on
        if (System::getVar('anonymoussessions')) {
            $where .= "AND {$sessioninfocolumn['uid']} >= 1 ";
        } else {
            $where .= "AND {$sessioninfocolumn['uid']} > 1 ";
        }
        
        $result = DBUtil::selectObjectArray('session_info', $where, '', -1, -1, '', null, null, array('uid'), false);

        if ($result === false) {
            return LogUtil::registerError($this->__('Error! Could not load data.'));
        }

        $numguests = 0;
        $unames = array();
        foreach ($result as $key => $user) {
            if ($user['uid'] != 1) {
                $user['uname'] = UserUtil::getVar('uname', $user['uid']);
                $unames[$user['uname']] = $user;
            } else {
                $numguests++;
            }
        }
        ksort($unames);
        $unames = array_values($unames);
        $numusers = count($unames);

        $items = array(
            'unames'    => $unames,
            'numusers'  => $numusers,
            'numguests' => $numguests,
            'total'     => $numguests + $numusers,
        );

        return $items;
    }

    /**
     * Find out which messages module is installed.
     *
     * @return string Name of the messaging module found, empty if none.
     */
    public function getmessagingmodule()
    {
        $msgmodule = System::getVar('messagemodule', '');
        if (!ModUtil::available($msgmodule)) {
            $msgmodule = '';
        }

        return $msgmodule;
    }
}