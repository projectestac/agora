<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnmemberslistapi.php 92 2010-01-25 10:44:29Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Profile
 */

/**
 * Get all users
 * This API function returns all users ids. This function allows for
 * filtering and for paged selection
 *
 * @author Mark West
 * @param 'startnum' start number for recordset
 * @param 'numitems' number of items to return
 * @param 'letter' letter to filter by
 * @param 'sortby' attribute to sort by
 * @param 'sortorder' sort order ascending/descending
 * @return array matching user ids
 */
function Profile_memberslistapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Optional arguments.
    if (!isset($args['startnum'])) {
        $args['startnum'] = 1;
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
    if (!isset($args['sorting']) || empty($args['sorting'])) {
        $args['sorting'] = 0;
    }
    if (!isset($args['searchby']) || empty($args['searchby'])) {
        $args['searchby'] = 'uname';
    }
    if (!isset($args['letter'])) {
        $args['letter'] = null;
    }
    if (!isset($args['returnUids'])) {
        $args['returnUids'] = false;
    }

    // define the array to hold the result items
    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('Profile:Members:', '::', ACCESS_READ)) {
        return $items;
    }

    // Sanitize the args used in queries
    $args['letter']   = DataUtil::formatForStore($args['letter']);
    $args['searchby'] = DataUtil::formatForStore($args['searchby']);

    // load the database information for the users module
    pnModDBInfoLoad('ObjectData');
    pnModDBInfoLoad('Users');

    // Get database setup
    $pntable = pnDBGetTables();

    // It's good practice to name column definitions you are getting
    // $column don't cut it in more complex modules
    $userscolumn = $pntable['users_column'];
    $datacolumn  = $pntable['objectdata_attributes_column'];
    $propcolumn  = $pntable['user_property_column'];

    // Builds the sql query
    $sql  = "SELECT     $userscolumn[uid] as uid
             FROM       $pntable[users] as tbl ";
    $join = "LEFT JOIN  $pntable[objectdata_attributes] as a
             ON         a.$datacolumn[object_id] = tbl.$userscolumn[uid] AND a.$datacolumn[object_type] = 'users' AND a.$datacolumn[obj_status] = 'A'
             LEFT JOIN $pntable[user_property] as b
             ON         b.$propcolumn[prop_attribute_name] = a.$datacolumn[attribute_name] ";

    // treat a single character as from the alpha filter and everything else as from the search input
    if (strlen($args['letter']) > 1) {
        $args['letter'] = "%{$args['letter']}";
    }

    $where = '';
    if ($args['searchby'] == 'uname') {
        $join  = '';
        if (!empty($args['letter']) && preg_match('/[a-z]/i', $args['letter'])) {
            // are we listing all or "other" ?
            $where = "WHERE UPPER(tbl.$userscolumn[uname]) LIKE '".strtoupper($args['letter'])."%' AND tbl.$userscolumn[uid] != '1' ";
            // I guess we are not..
        } else if (!empty($args['letter'])) {
            // But other are numbers ?
            $where = "WHERE (tbl.$userscolumn[uname] LIKE '0%'
                          OR tbl.$userscolumn[uname] LIKE '1%'
                          OR tbl.$userscolumn[uname] LIKE '2%'
                          OR tbl.$userscolumn[uname] LIKE '3%'
                          OR tbl.$userscolumn[uname] LIKE '4%'
                          OR tbl.$userscolumn[uname] LIKE '5%'
                          OR tbl.$userscolumn[uname] LIKE '6%'
                          OR tbl.$userscolumn[uname] LIKE '7%'
                          OR tbl.$userscolumn[uname] LIKE '8%'
                          OR tbl.$userscolumn[uname] LIKE '9%'
                          OR tbl.$userscolumn[uname] LIKE '-%'
                          OR tbl.$userscolumn[uname] LIKE '.%'
                          OR tbl.$userscolumn[uname] LIKE '@%'
                          OR tbl.$userscolumn[uname] LIKE '$%') ";

            // fifers: while this is not the most eloquent solution, it is
            // cross database compatible.  We could do an if dbtype is mysql
            // then do the regexp.  consider for performance enhancement.
            //
            // "WHERE $column[uname] REGEXP \"^\[1-9]\" "
            // REGEX :D, although i think its MySQL only
            // Will have to change this later.
            // if you know a better way to match only the first char
            // to be a number in uname, please change it and email
            // sweede@gallatinriver.net the correction
            // or go to post-nuke project page and post
            // your correction there. Thanks, Bjorn.
        } else {
            // or we are unknown or all..
            $where = "WHERE tbl.$userscolumn[uid] != '1' ";
            // this is to get rid of the annonymous registry
        }

    } else if (is_array($args['searchby'])) {
        if (count($args['searchby']) == 1 && in_array('all', array_keys($args['searchby']))) {
            // args.searchby is all => search_value to loop all the user attributes
            /*
            $dudfields = pnModAPIFunc('Profile', 'user', 'getallactive');
            if (empty($dudfields)) {
                return $items;
            }
            $attrids = array();
            foreach ($dudfields as $dud) {
                $attrids[] = "'$dud[attribute_name]'";
            }
            $attrids = implode(', ', $attrids);
            // active duds can be retrieved better with weight > 0 AND dtype >= 0
            */

            $value = DataUtil::formatForStore($args['searchby']['all']);
            //$where = "WHERE a.$datacolumn[attribute_name] IN ($attrids) AND a.$datacolumn[value] LIKE '%$value%' ";
            $where = "WHERE b.$propcolumn[prop_weight] > '0' AND $propcolumn[prop_dtype] >= '0' AND a.$datacolumn[value] LIKE '%$value%' ";

        } else {
            // args.searchby is an array of the form prop_id => value
            $where = array();
            foreach ($args['searchby'] as $prop_id => $value) {
                $prop_id = DataUtil::formatForStore($prop_id);
                $value   = DataUtil::formatForStore($value);
                $where[] = "(b.$propcolumn[prop_id] = '$prop_id' AND a.$datacolumn[value] LIKE '%$value%')";
            }
            // check if there where contitionals
            if (!empty($where)) {
                $where = 'WHERE '.implode(' AND ', $where).' ';
            } else {
                $where = '';
            }
        }

    } else if (is_numeric($args['searchby'])) {
        $where = "WHERE b.$propcolumn[prop_id] = '$args[searchby]' AND a.$datacolumn[value] LIKE '$args[letter]%' ";

    } elseif (isset($propcolumn[$args['searchby']])) {
        $where = "WHERE b.".$propcolumn[$args['searchby']]." LIKE '$args[letter]%' ";
    }

    if (!$args['sorting'] && pnModGetVar('Profile', 'filterunverified')) {
        $where .= " AND tbl.$userscolumn[activated] != '0'";
    }

    $groupby = " GROUP BY tbl.$userscolumn[uname] ";

    // sort by
    if (array_key_exists($args['sortby'], $userscolumn)) {
        $sort = 'ORDER BY tbl.'.$userscolumn[$args['sortby']] .' '. $args['sortorder'];
    } else {
        $sort = 'ORDER BY '.DataUtil::formatForStore($args['sortby']) .' '. $args['sortorder'];
    }
    if ($sort && $args['sortby'] != 'uname') {
        $sort .= ", $userscolumn[uname] ASC ";
    }

    $sql .= $join . $where . $groupby . $sort;

    $result = DBUtil::executeSQL($sql, $args['startnum']-1, $args['numitems']);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        LogUtil::registerError(__('Error! Could not load data.', $dom));

        if (is_object($result)) {
            $result->Close();
        }
        return $items;
    }

    // Put items into result array
    for (; !$result->EOF; $result->MoveNext()) {
        list($uid) = $result->fields;
        if (SecurityUtil::checkPermission('Profile:Members:', '::', ACCESS_READ)) {
            if (!$args['returnUids']) {
                $items[$uid] = pnUserGetVars($uid);
            } else {
                $items[] = $uid;
            }
        }
    }

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the items
    return $items;
}

/**
 * Utility function to count the number of users
 * This function allows for filtering by letter
 *
 * @author Mark West
 * @param 'letter' letter to filter by
 * @return integer count of matching users
 */
function Profile_memberslistapi_countitems($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Optional arguments.
    if (!isset($args['searchby']) || empty($args['searchby'])) {
        $args['searchby'] = 'uname';
    }
    if (!isset($args['letter'])) {
        $args['letter'] = null;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Profile:Members:', '::', ACCESS_READ)) {
        return 0;
    }

    // Sanitize the args used in queries
    $args['letter']   = DataUtil::formatForStore($args['letter']);
    $args['searchby'] = DataUtil::formatForStore($args['searchby']);

    // load the database information for the users module
    pnModDBInfoLoad('Users');

    // Get database setup
    $pntable = pnDBGetTables();

    // It's good practice to name column definitions you are getting
    // $column don't cut it in more complex modules
    $userscolumn = $pntable['users_column'];
    $datacolumn  = $pntable['objectdata_attributes_column'];
    $propcolumn  = $pntable['user_property_column'];

    // Builds the sql query
    $sql   = "SELECT     COUNT(DISTINCT tbl.$userscolumn[uname])
              FROM       $pntable[users] as tbl ";
    $join  = "LEFT JOIN  $pntable[objectdata_attributes] as a
              ON         a.$datacolumn[object_id] = tbl.$userscolumn[uid] AND a.$datacolumn[object_type] = 'users' AND a.$datacolumn[obj_status] = 'A'
              LEFT JOIN $pntable[user_property] as b
              ON         b.$propcolumn[prop_attribute_name] = a.$datacolumn[attribute_name] ";

    // treat a single character as from the alpha filter and everything else as from the search input
    if (strlen($args['letter']) > 1) {
        $args['letter'] = "%{$args['letter']}";
    }

    $where = '';
    if ($args['searchby'] == 'uname') {
        $join = '';
        if (!empty($args['letter']) && preg_match('/[a-z]/i', $args['letter'])) {
            // are we listing all or "other" ?
            $where = "WHERE UPPER(tbl.$userscolumn[uname]) LIKE '".strtoupper($args['letter'])."%' AND tbl.$userscolumn[uid] != '1' ";
            // I guess we are not..
        } else if (!empty($args['letter'])) {
            // But other are numbers ?
            $where = "WHERE (tbl.$userscolumn[uname] LIKE '0%'
                          OR tbl.$userscolumn[uname] LIKE '1%'
                          OR tbl.$userscolumn[uname] LIKE '2%'
                          OR tbl.$userscolumn[uname] LIKE '3%'
                          OR tbl.$userscolumn[uname] LIKE '4%'
                          OR tbl.$userscolumn[uname] LIKE '5%'
                          OR tbl.$userscolumn[uname] LIKE '6%'
                          OR tbl.$userscolumn[uname] LIKE '7%'
                          OR tbl.$userscolumn[uname] LIKE '8%'
                          OR tbl.$userscolumn[uname] LIKE '9%'
                          OR tbl.$userscolumn[uname] LIKE '-%'
                          OR tbl.$userscolumn[uname] LIKE '.%'
                          OR tbl.$userscolumn[uname] LIKE '@%'
                          OR tbl.$userscolumn[uname] LIKE '$%') ";

            // fifers: while this is not the most eloquent solution, it is
            // cross database compatible.  We could do an if dbtype is mysql
            // then do the regexp.  consider for performance enhancement.
            //
            // "WHERE $column[uname] REGEXP \"^\[1-9]\" "
            // REGEX :D, although i think its MySQL only
            // Will have to change this later.
            // if you know a better way to match only the first char
            // to be a number in uname, please change it and email
            // sweede@gallatinriver.net the correction
            // or go to post-nuke project page and post
            // your correction there. Thanks, Bjorn.
        } else {
            // or we are unknown or all..
            $where = "WHERE tbl.$userscolumn[uid] != '1' ";
            // this is to get rid of the annonymous registry
        }

    } else if (is_array($args['searchby'])) {
        if (count($args['searchby']) == 1 && in_array('all', array_keys($args['searchby']))) {
            // args.searchby is all => search_value to loop all the user attributes
            /*
            $dudfields = pnModAPIFunc('Profile', 'user', 'getallactive');
            if (empty($dudfields)) {
                return $items;
            }
            $attrids = array();
            foreach ($dudfields as $dud) {
                $attrids[] = "'$dud[attribute_name]'";
            }
            $attrids = implode(', ', $attrids);
            // active duds can be retrieved better with weight > 0 AND dtype >= 0
            */

            $value = DataUtil::formatForStore($args['searchby']['all']);
            //$where = "WHERE a.$datacolumn[attribute_name] IN ($attrids) AND a.$datacolumn[value] LIKE '%$value%' ";
            $where = "WHERE b.$propcolumn[prop_weight] > '0' AND $propcolumn[prop_dtype] >= '0' AND a.$datacolumn[value] LIKE '%$value%' ";

        } else {
            // args.searchby is an array of the form prop_id => value
            $where = array();
            foreach ($args['searchby'] as $prop_id => $value) {
                $prop_id = DataUtil::formatForStore($prop_id);
                $value   = DataUtil::formatForStore($value);
                $where[] = "(b.$propcolumn[prop_id] = '$prop_id' AND a.$datacolumn[value] LIKE '%$value%')";
            }
            // check if there where contitionals
            if (!empty($where)) {
                $where = 'WHERE '.implode(' AND ', $where).' ';
            } else {
                $where = '';
            }
        }

    } else if (is_numeric($args['searchby'])) {
        $where = "WHERE b.$propcolumn[prop_id] = '$args[searchby]' AND a.$datacolumn[value] LIKE '$args[letter]%' ";

    } elseif (isset($propcolumn[$args['searchby']])) {
        $where = "WHERE b.".$propcolumn[$args['searchby']]." LIKE '$args[letter]%' ";
    }

    if (!$args['sorting'] && pnModGetVar('Profile', 'filterunverified')) {
        $where .= " AND tbl.$userscolumn[activated] != '0'";
    }

    $sql   .= $join . $where;

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    // Obtain the number of items
    list($numitems) = $result->fields;

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the number of items
    return $numitems;
}

/**
 * Utility function to count the number of users online
 *
 * @author Mark West
 * @return integer count of registered users online
 */
function Profile_memberslistapi_getregisteredonline($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Get database setup
    $pntable = pnDBGetTables();

    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $sessioninfocolumn = $pntable['session_info_column'];
    $sessioninfotable  = $pntable['session_info'];

    $activetime = adodb_strftime('%Y-%m-%d %H:%M:%S', time() - (pnConfigGetVar('secinactivemins') * 60));

    // Get items
    $sql = "SELECT DISTINCT $sessioninfocolumn[uid] FROM $sessioninfotable
            WHERE $sessioninfocolumn[uid] != 0 AND $sessioninfocolumn[lastused] > '$activetime'
            GROUP BY $sessioninfocolumn[uid]";

    $result = DBUtil::executeSQL($sql);

     // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    // Obtain the number of items
    $numusers = $result->RecordCount();

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the number of items
    return $numusers;
}

/**
 * Utility function get the latest registered user
 *
 * @author Mark West
 * @return integer latest registered user id
 */
function Profile_memberslistapi_getlatestuser($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // load the database information for the users module
    pnModDBInfoLoad('Users');

    // Get database setup
    $pntable = pnDBGetTables();

    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $userscolumn = $pntable['users_column'];

    // filter out unverified users
    $where = '';
    if (pnModGetVar('Profile', 'filterunverified')) {
         $where = " AND $userscolumn[activated] = '1'";
    }

    // Get items
    $sql = "SELECT $userscolumn[uid]
            FROM $pntable[users]
            WHERE $userscolumn[uname] NOT LIKE 'Anonymous' $where
            ORDER BY $userscolumn[uid] DESC";

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    // Obtain the number of items
    list($lastuser) = $result->fields;

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the number of items
    return $lastuser;
}

/**
 * Utility function to decide if a user is online
 *
 * @author Mark West
 * @return bool true if online, false otherwise
 */
function Profile_memberslistapi_isonline($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // check arguments
    if (!isset($args['userid']) || empty($args['userid']) || !is_numeric($args['userid'])) {
        return false;
    }

    // Get database setup
    $pntable = pnDBGetTables();

    // get active time based on security settings
    $activetime = adodb_strftime('%Y-%m-%d %H:%M:%S', time() - (pnConfigGetVar('secinactivemins') * 60));

    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $sessioninfocolumn = $pntable['session_info_column'];
    $sessioninfotable  = $pntable['session_info'];

    // Get items
    $sql = "SELECT DISTINCT $sessioninfocolumn[uid]
            FROM $sessioninfotable
            WHERE $sessioninfocolumn[uid] = $args[userid] and $sessioninfocolumn[lastused] > '$activetime'";

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    // Obtain the item
    list($online) = $result->fields;

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return if the user is online
    if ($online > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Utility function return registered users online
 *
 * @author Mark West
 * @return array registered users
 */
function Profile_memberslistapi_whosonline($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Get database setup
    $pntable = pnDBGetTables();

    // define the array to hold the resultant items
    $items = array();
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $sessioninfocolumn = $pntable['session_info_column'];
    $sessioninfotable  = $pntable['session_info'];

    // get active time based on security settings
    $activetime = adodb_strftime('%Y-%m-%d %H:%M:%S', time() - (pnConfigGetVar('secinactivemins') * 60));

    // Get items
    $sql = "SELECT DISTINCT $sessioninfocolumn[uid]
            FROM $sessioninfotable
            WHERE $sessioninfocolumn[uid] != 0
            AND $sessioninfocolumn[lastused] > '$activetime'
            GROUP BY $sessioninfocolumn[uid]";

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    // Obtain the number of items
    list($numitems) = $result->fields;

    // Put items into result array.
    for (; !$result->EOF; $result->MoveNext()) {
        list($uid) = $result->fields;
        $items[$uid] = pnUserGetVars($uid);
    }

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the items
    return $items;
}

/**
 * Utility function returns all users online
 *
 * @author Frank Chestnut
 * @return array All online visitors (including anonymous)
 */
function Profile_memberslistapi_getallonline($args)
{
    $dom = ZLanguage::getModuleDomain('Profile');

    // Get database setup
    $pntable = pnDBGetTables();

    // define the array to hold the resultant items
    $items = array();

    $sessioninfotable  = $pntable['session_info'];
    $sessioninfocolumn = &$pntable['session_info_column'];
    $usertbl           = $pntable['users'];
    $usercol           = &$pntable['users_column'];

    // get active time based on security settings
    $activetime = adodb_strftime('%Y-%m-%d %H:%M:%S', time() - (pnConfigGetVar('secinactivemins') * 60));

    // Check if anonymous session are on
    if (pnConfigGetVar('anonymoussessions')) {
        $anonwhere = "AND $sessioninfotable.$sessioninfocolumn[uid] >= '0' ";
    } else {
        $anonwhere = "AND $sessioninfotable.$sessioninfocolumn[uid] > '0'";
    }

    // Get items
    $sql = "SELECT   $sessioninfotable.$sessioninfocolumn[uid],
                     $usertbl.$usercol[uname]
            FROM     $sessioninfotable, $usertbl
            WHERE    $sessioninfocolumn[lastused] > '$activetime'
                     $anonwhere
            AND      IF($sessioninfotable.$sessioninfocolumn[uid]='0','1',
                        $sessioninfotable.$sessioninfocolumn[uid]) = $usertbl.$usercol[uid]
            GROUP BY $sessioninfocolumn[ipaddr], $sessioninfotable.$sessioninfocolumn[uid]
            ORDER BY $usercol[uname]";

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result === false) {
        return LogUtil::registerError(__('Error! Could not load data.', $dom));
    }

    $numusers  = 0;
    $numguests = 0;
    $unames = array();
    for (; !$result->EOF; $result->MoveNext()) {
        list($uid, $uname) = $result->fields;

        if ($uid != 0) {
            $unames[] = array('uid'   => $uid,
                              'uname' => $uname);
            $numusers++;
        } else {
            $numguests++;
        }
    }

    $items = array('unames'    => $unames,
                   'numusers'  => $numusers,
                   'numguests' => $numguests,
                   'total'     => $numguests + $numusers);

    $result->Close();

    // Return the items
    return $items;
}

/**
 * Utility function to find out which messages module is installed
 * @author Frank Schmmertz
 * @return string name of the messaging module found, empty if none
 */
function Profile_memberslistapi_getmessagingmodule()
{
    $msgmodule = pnConfigGetVar('messagemodule', '');
    if (!pnModAvailable($msgmodule)) {
        $msgmodule = '';
    }

    return $msgmodule;
}
