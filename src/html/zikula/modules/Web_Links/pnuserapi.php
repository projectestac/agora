<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pnuserapi.php 62 2009-01-28 17:12:37Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
*
*/
function Web_Links_userapi_categories() //fertig
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError ();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Category',
                              'instance_left'   => 'title',
                              'instance_right'  => 'cat_id',
                              'level'           => ACCESS_READ));

    // get the objects from the db
    $categories = DBUtil::selectObjectArray('links_categories', '', 'title', '-1', '-1', '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($categories === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $categories;
}

function Web_Links_userapi_category($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Argument check
    if ((!isset($args['cid']) || empty($args['cid']) || !is_numeric($args['cid']))) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError ();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Category',
                              'instance_left'   => 'title',
                              'instance_right'  => 'cat_id',
                              'level'           => ACCESS_READ));

    // get the object from the db
    $objArray = DBUtil::selectObjectById('links_categories', $args['cid'], 'cat_id', '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}

function Web_Links_userapi_subcategory($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Argument check
    if ((!isset($args['cid']) || empty($args['cid']) || !is_numeric($args['cid']))) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError ();
    }

    $objArray = array();

    $pntable = pnDBGetTables();
    $weblinkscolumn = &$pntable['links_categories_column'];

    $where = "WHERE $weblinkscolumn[parent_id] = ".(int)DataUtil::formatForStore($args['cid']);

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Category',
                              'instance_left'   => 'title',
                              'instance_right'  => 'cat_id',
                              'level'           => ACCESS_READ));

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('links_categories', $where, 'title', '-1', '-1', '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}

function Web_Links_userapi_weblinks($args)
{
    // Argument check
    if ((!isset($args['cid']) || empty($args['cid']) || !is_numeric($args['cid']))) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    if (!isset($args['startnum']) || empty($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numlinks']) || empty($args['numlinks'])) {
        $args['numlinks'] = -1;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numlinks'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $objArray = array();

    $pntable = pnDBGetTables();
    $weblinkscolumn = &$pntable['links_links_column'];

    $where = "WHERE $weblinkscolumn[cat_id] = ".(int)DataUtil::formatForStore($args['cid']);

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Link',
                              'instance_left'   => 'title',
                              'instance_right'  => 'lid',
                              'level'           => ACCESS_READ));

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('links_links', $where, $args['orderbysql'], $args['startnum']-1, $args['numlinks'], '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}

function Web_Links_userapi_orderbyin($args)
{
    extract($args);

    $pntable =& pnDBGetTables();
    $column = &$pntable['links_links_column'];

    if ($orderby == "titleA") {
        $orderbysql = "$column[title] ASC";
    } else if ($orderby == "dateA") {
        $orderbysql = "$column[date] ASC";
    } else if ($orderby == "hitsA") {
        $orderbysql = "$column[hits] ASC";
    } else if ($orderby == "titleD") {
        $orderbysql = "$column[title] DESC";
    } else if ($orderby == "dateD") {
        $orderbysql = "$column[date] DESC";
    } else if ($orderby == "hitsD") {
        $orderbysql = "$column[hits] DESC";
    } else {
        $orderbysql = "$column[title] ASC";
    }
    return $orderbysql;
}

function Web_Links_userapi_countcatlinks($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    if ((!isset($args['cid']) || !is_numeric($args['cid']))) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $sql = "SELECT $column[lid], $column[cat_id], $column[title]
            FROM $pntable[links_links]
            WHERE $column[cat_id]='".(int)DataUtil::formatForStore($args['cid'])."'";
    $result =& $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    $numlinks = 0;
    for (; !$result->EOF; $result->MoveNext()) {
        list($lid, $cid, $title) = $result->fields;
        if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cid", ACCESS_OVERVIEW) ||
            SecurityUtil::checkPermission('Web_Links::Item', "$title::$lid", ACCESS_OVERVIEW)) {
            $numlinks++;
        }
    }

    $result->Close();

    return $numlinks;
}

function Web_Links_userapi_link($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    // Argument check
    if ((!isset($lid) || !is_numeric($lid))) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $weblinkstable = $pntable['links_links'];
    $weblinkscolumn = &$pntable['links_links_column'];

    $sql = "SELECT $weblinkscolumn[lid],
                   $weblinkscolumn[cat_id],
                   $weblinkscolumn[title],
                   $weblinkscolumn[url],
                   $weblinkscolumn[description],
                   $weblinkscolumn[date],
                   $weblinkscolumn[name],
                   $weblinkscolumn[email],
                   $weblinkscolumn[hits],
                   $weblinkscolumn[submitter]
            FROM $weblinkstable
            WHERE $weblinkscolumn[lid] = '" . (int)DataUtil::formatForStore($lid) . "'";
    $result =& $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        return false;
    }

    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    }

    // Obtain the item information from the result set
    list($lid, $cat_id, $title, $url, $description, $date, $name, $email, $hits, $submitter) = $result->fields;

    $result->Close();

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', "$title::$lid", ACCESS_READ)) {
        return LogUtil::registerPermissionError ();
    }

    // Create the link array
    $link = array('lid' => $lid,
                  'cat_id' => $cat_id,
                  'title' => $title,
                  'url' => $url,
                  'description' => $description,
                  'date' => $date,
                  'name' => $name,
                  'email' => $email,
                  'hits' => $hits,
                  'submitter' => $submitter);

    // Return the link array
    return $link;
}

function Web_Links_userapi_hitcountinc($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    // Argument check
    if (!isset($lid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::Item', "::", ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $weblinkstable = $pntable['links_links'];
    $weblinkscolumn = &$pntable['links_links_column'];

    // Update the item
    $sql = "UPDATE $weblinkstable
            SET $weblinkscolumn[hits] = $weblinkscolumn[hits] + 1
            WHERE $weblinkscolumn[lid] = " . DataUtil::formatForStore($lid);
    $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        // We probably don't want to display a user error here
        //pnSessionSetVar('errormsg', _WEBLINKSUPDATEDCOUNTFAILED);
        return false;
    }

    return true;

}

function Web_Links_userapi_random()
{
    $totallinks = 0;

    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];

    $sql = "SELECT $column[cat_id], $column[title]
            FROM $pntable[links_links]";
    $result =& $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        return false;
    }

    while(list($cid, $title)=$result->fields) {
        $result->MoveNext();
        if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cid", ACCESS_READ)) {
            $totallinks++;
        }
    }

    $result->Close();

    $numrows = $totallinks;

    if ($numrows < 1 ) { // if no data
        return pnVarPrepHTMLDisplay(_WEBLINKS_NOLINKS);
    }
    if ($numrows == 1) {
        $lid = 1;
    } else {
        srand((double)microtime()*1000000);
        $lid = rand(1,$numrows);
    }

    return $lid;
}

function Web_Links_userapi_searchcats($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    $subcategory = array();

    // Argument check
    if (!isset($query)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Get database setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    // It's good practice to name the table and column definitions you are getting
    $weblinkstable = $pntable['links_categories'];
    $weblinkscolumn = &$pntable['links_categories_column'];

    // Get categories
    $sql = "SELECT $weblinkscolumn[title],
                   $weblinkscolumn[cat_id]
            FROM $weblinkstable
            WHERE $weblinkscolumn[title] LIKE '%".DataUtil::formatForStore($query)."%'
            ORDER BY $weblinkscolumn[title] DESC";
    $result =& $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', __('Error! Could not load items.', $dom));
        return false;
    }

    // Put items into result array.
    for (; !$result->EOF; $result->MoveNext()) {
        list($title, $cat_id) = $result->fields;
        if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cat_id", ACCESS_READ)) {
            $subcategory[] = array('title' => $title,
                                   'cat_id' => $cat_id);
        }
    }

    // All successful database queries produce a result set
    $result->Close();

    // Return the items
    return $subcategory;
}

function Web_Links_userapi_search_weblinks($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // get arguments from argument array
    extract($args);

    // Argument check
    if (!isset($query)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Optional arguments.
    if (!isset($startnum) || !is_numeric($startnum)) {
        $startnum = 1;
    }

    if (!isset($numlinks) || !is_numeric($numlinks)) {
        $numlinks = -1;
    }

    // Get database setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $sql = "SELECT $column[lid],
                   $column[cat_id],
                   $column[title],
                   $column[url],
                   $column[description],
                   $column[date],
                   $column[hits],
                   $column[linkratingsummary],
                   $column[totalvotes],
                   $column[totalcomments]
            FROM $pntable[links_links]
            WHERE $column[title] LIKE '%".DataUtil::formatForStore($query)."%'
            OR $column[description] LIKE '%".DataUtil::formatForStore($query)."%'
            ORDER BY $orderbysql";
    $result =& $dbconn->SelectLimit($sql, $numlinks, $startnum-1);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($lid, $cat_id, $title, $url, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments) = $result->fields;
        if (SecurityUtil::checkPermission('Web_Links::Link', ":$title:$lid", ACCESS_READ)) {
            $weblinks[] = array('lid' => $lid,
                                'cat_id' => $cat_id,
                                'title' => $title,
                                'url' => $url,
                                'description' => $description,
                                'date' => $time,
                                'hits' => $hits,
                                'linkratingsummary' => number_format($linkratingsummary, pnModGetVar('Web_Links', 'mainvotedecimal')),
                                'totalvotes' => $totalvotes,
                                'totalcomments' => $totalcomments);
        }
    }

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the array
    return $weblinks;
}

function Web_Links_userapi_countsearchlinks($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($args);

    if (!isset($query)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $sql = "SELECT count(*)
            FROM $pntable[links_links]
            WHERE $column[title] LIKE '%".DataUtil::formatForStore($query)."%'
            OR $column[description] LIKE '%".DataUtil::formatForStore($query)."%'";
    $result =& $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    list($numlinks) = $result->fields;

    $result->Close();

    return $numlinks;
}

function Web_Links_userapi_totallinks($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($args);

    if (!isset($selectdate) || !is_numeric($selectdate)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dateDB = (date("d-M-Y", $selectdate));

    $newlinkdb = date("Y-m-d", $selectdate);
    $column = &$pntable['links_links_column'];
    $column2 = &$pntable['links_categories_column'];
    //$result =& $dbconn->Execute("SELECT COUNT(*) FROM $pntable[links_links] WHERE $column[date] LIKE '%".DataUtil::formatForStore($newlinkDB)."%'");
       $totallinks=0;
    $result =& $dbconn->Execute("SELECT $column[cat_id], $column2[title]
                            FROM $pntable[links_links], $pntable[links_categories]
                            WHERE $column[date] LIKE '%$newlinkdb%'
                            AND $column[cat_id]=$column2[cat_id]");

    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    while(list($cid, $title)=$result->fields) {
           $result->MoveNext();
           if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cid", ACCESS_READ)) {
               $totallinks++;
           }
    }

    $result->Close();

    return $totallinks;
}

function Web_Links_userapi_weblinksbydate($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($args);

    if (!isset($selectdate) || !is_numeric($selectdate)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $newlinkdb = date("Y-m-d", $selectdate);

    $column = &$pntable['links_links_column'];
    $sql = "SELECT $column[lid],
                   $column[cat_id],
                   $column[title],
                   $column[description],
                   $column[date],
                   $column[hits],
                   $column[linkratingsummary],
                   $column[totalvotes],
                   $column[totalcomments]
            FROM $pntable[links_links]
            WHERE $column[date] LIKE '%".DataUtil::formatForStore($newlinkdb)."%'
            ORDER BY $column[title] ASC";
    $result =& $dbconn->SelectLimit($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($lid, $cid, $title, $description, $date, $hits, $linkratingsummary, $totalvotes, $totalcomments) = $result->fields;
        if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cid", ACCESS_READ) ||
            SecurityUtil::checkPermission('Web_Links::Item', "$title::$lid", ACCESS_READ)) {
            $weblinks[] = array('lid' => $lid,
                                'cid' => $cid,
                                'title' => $title,
                                'description' => $description,
                                'date' => $date,
                                'hits' => $hits,
                                'linkratingsummary' => $linkratingsummary,
                                'totalvotes' => $totalvotes,
                                'totalcomments' => $totalcomments);
        }
    }

    $result->Close();

    return $weblinks;
}

function Web_Links_userapi_weblinksmostpop($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($args);

    if (!isset($mostpoplinks) || !is_numeric($mostpoplinks)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $sql = "SELECT $column[lid],
                   $column[cat_id],
                   $column[title],
                   $column[description],
                   $column[date],
                   $column[hits],
                   $column[linkratingsummary],
                   $column[totalvotes],
                   $column[totalcomments]
            FROM $pntable[links_links]
                ORDER BY $column[hits] DESC
                LIMIT $mostpoplinks";
    $result =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($lid, $cid, $title, $description, $time, $hits, $linkratingsummary, $totalvotes, $totalcomments) = $result->fields;
        if (SecurityUtil::checkPermission('Web_Links::Category', "$title::$cid", ACCESS_READ) ||
            SecurityUtil::checkPermission('Web_Links::Item', "$title::$lid", ACCESS_READ)) {
            $weblinks[] = array('lid' => $lid,
                                'cid' => $cid,
                                'title' => $title,
                                'description' => $description,
                                'date' => $time,
                                'hits' => $hits,
                                'linkratingsummary' => number_format($linkratingsummary, pnModGetVar('Web_Links', 'mainvotedecimal')),
                                'totalvotes' => $totalvotes,
                                'totalcomments' => $totalcomments);
        }
    }

    $result->Close();

    return $weblinks;
}

function Web_Links_userapi_brockenlink($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    // Argument check
    if (!isset($lid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', "::", ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $nextid = $dbconn->GenId($pntable['links_modrequest']);
    $column = &$pntable['links_modrequest_column'];
    $sql ="INSERT INTO $pntable[links_modrequest]
                        ($column[requestid],
                         $column[lid],
                         $column[modifysubmitter],
                         $column[brokenlink])
           VALUES ($nextid,
                     ".(int)DataUtil::formatForStore($lid).",
                     '".DataUtil::formatForStore($modifysubmitter)."',
                     1)";
    $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        // We probably don't want to display a user error here
        //pnSessionSetVar('errormsg', _WEBLINKSUPDATEDCOUNTFAILED);
        return false;
    }

    return true;
}

function Web_Links_userapi_modifylinkrequest($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    // Argument check
    if (!isset($lid)) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', "::", ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $nextid = $dbconn->GenId($pntable['links_modrequest']);
    $column = &$pntable['links_modrequest_column'];
    $sql ="INSERT INTO $pntable[links_modrequest]
                        ($column[requestid],
                         $column[lid],
                         $column[cat_id],
                         $column[title],
                         $column[url],
                         $column[description],
                         $column[modifysubmitter],
                         $column[brokenlink])
           VALUES ($nextid,
                     '".(int)DataUtil::formatForStore($lid)."',
                     '".DataUtil::formatForStore($cat)."',
                     '".DataUtil::formatForStore($title)."',
                     '".DataUtil::formatForStore($url)."',
                     '".DataUtil::formatForStore($description)."',
                     '".DataUtil::formatForStore($modifysubmitter)."',
                     0)";
    $dbconn->Execute($sql);

    // Check for an error
    if ($dbconn->ErrorNo() != 0) {
        // We probably don't want to display a user error here
        //pnSessionSetVar('errormsg', _WEBLINKSUPDATEDCOUNTFAILED);
        return false;
    }

    return true;
}

function Web_Links_userapi_existingurl($args)
{
    // Get datbase setup
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $sql = "SELECT $column[title]
            FROM $pntable[links_links]
            WHERE $column[url]='" . DataUtil::formatForStore($args['url']) . "'";
    $existingurl =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    if (!$existingurl->EOF) {
        $existingurl = 1;
    } else {
        $existingurl = 0;
    }

    return $existingurl;
}

function Web_Links_userapi_add($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', "::", ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError();
    }

    $link = array();

    $existingurl = pnModAPIFunc('Web_Links', 'user', 'existingurl', array('url' => $args['url']));
    $valid = pnVarValidate($args['url'], 'url');

    if ($existingurl == 1) {
        $link['text'] = __('Sorry! This URL is already listed in the database!', $dom);
        $link['submit'] = 0;
        return $link;
    } else if ($valid == false) {
        $link['text'] = __('Sorry! Error! You must type a URL for the web link!', $dom);
        $link['submit'] = 0;
        return $link;
    } else if (empty($args['title'])) {
        $link['text'] = __('Sorry! Error! You must type a title for the URL!', $dom);
        $link['submit'] = 0;
        return $link;
    } else if (empty($args['cat']) || !is_numeric($args['cat'])) {
        $link['text'] =__('Sorry! Error! No category', $dom);
        $link['submit'] = 0;
        return $link;
    } else if (empty($args['description'])) {
        $link['text'] =__('Sorry! Error! You must type a description for the URL!', $dom);
        $link['submit'] = 0;
        return $link;
    } else {
        if (pnUserLoggedIn()) {
            $submitter = pnUserGetVar('uname');
        }

        // Get datbase setup
        $dbconn =& pnDBGetConn(true);
        $pntable =& pnDBGetTables();

        $column = &$pntable['links_newlink_column'];
        $nextid = $dbconn->GenId($pntable['links_newlink']);
        $dbconn->Execute("INSERT INTO $pntable[links_newlink] ($column[lid], $column[cat_id], $column[title], $column[url], $column[description], $column[name], $column[email], $column[submitter]) VALUES ($nextid, ".(int)pnVarPrepForStore($args['cat']).", '".pnVarPrepForStore($args['title'])."', '".pnVarPrepForStore($args['url'])."', '".pnVarPrepForStore($args['description'])."', '".pnVarPrepForStore($args['nname'])."', '".pnVarPrepForStore($args['email'])."', '".pnVarPrepForStore($submitter)."')");

        if (empty($args['email'])) {
            $link['text'] = __('You didn\'t enter an e-mail address. However, your link will still be checked.', $dom);
        } else {
            $link['text'] = __('Thank you! You\'ll receive an e-mail message when it\'s approved.', $dom);
        }
        $link['submit'] = 1;
        return $link;
    }
}

function Web_Links_userapi_numrows() //fertig
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // get the objects from the db
    $numrows = DBUtil::selectObjectCount('links_links');

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($numrows === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $numrows;
}

function Web_Links_userapi_catnum() //fertig
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // get the objects from the db
    $catnum = DBUtil::selectObjectCount('links_categories');

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($catnum === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $catnum;
}

function Web_Links_userapi_countsublinks()
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // get the objects from the db
    $sublinks = DBUtil::selectObjectCount('links_categories');

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($sublinks === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $sublinks;
}

function Web_Links_userapi_lastweblinks()
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $args['numlinks'] = pnModGetVar('Web_Links', 'linksinblock');

    if (!isset($args['startnum']) || empty($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numlinks']) || empty($args['numlinks'])) {
        $args['numlinks'] = 10;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numlinks'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $objArray = array();

    $pntable = pnDBGetTables();
    $weblinkscolumn = &$pntable['links_links_column'];

    $orderby = "ORDER BY $weblinkscolumn[date] DESC";

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Link',
                              'instance_left'   => 'title',
                              'instance_right'  => 'lid',
                              'level'           => ACCESS_READ));

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('links_links', '', $orderby, $args['startnum']-1, $args['numlinks'], '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}

function Web_Links_userapi_mostpopularweblinks()
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $args['numlinks'] = pnModGetVar('Web_Links', 'linksinblock');

    if (!isset($args['startnum']) || empty($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numlinks']) || empty($args['numlinks'])) {
        $args['numlinks'] = 10;
    }

    if (!is_numeric($args['startnum']) ||
        !is_numeric($args['numlinks'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $objArray = array();

    $pntable = pnDBGetTables();
    $weblinkscolumn = &$pntable['links_links_column'];

    $orderby = "ORDER BY $weblinkscolumn[hits] DESC";

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Link',
                              'instance_left'   => 'title',
                              'instance_right'  => 'lid',
                              'level'           => ACCESS_READ));

    // get the objects from the db
    $objArray = DBUtil::selectObjectArray('links_links', '', $orderby, $args['startnum']-1, $args['numlinks'], '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}