<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pnadminapi.php 62 2009-01-28 17:12:37Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * get available admin panel links
 *
 * @return array array of admin links
 */
function Web_Links_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    pnModLangLoad('Web_Links', 'admin');

    $links = array();
    $links[] = array('url' => pnModURL('Web_Links', 'admin', 'view'),        'text' => __('Overview', $dom));
    $links[] = array('url' => pnModURL('Web_Links', 'admin', 'catview'),     'text' => __('Categories administer', $dom));
    $links[] = array('url' => pnModURL('Web_Links', 'admin', 'linkview'),    'text' => __('Links administer', $dom));
    $links[] = array('url' => pnModURL('Web_Links', 'admin', 'getconfig'),   'text' => __('Modify configuration', $dom));
    $links[] = array('url' => pnModURL('Web_Links', 'admin', 'import'),      'text' => __('Import', $dom));

    return $links;
}

function Web_Links_adminapi_newweblinks()
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_newlink_column'];
    $sql = "SELECT $column[lid],
                   $column[cat_id],
                   $column[title],
                   $column[url],
                   $column[description],
                   $column[name],
                   $column[email],
                   $column[submitter]
            FROM $pntable[links_newlink]
            ORDER BY $column[lid]";
    $result =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($lid, $cid, $title, $url, $description, $name, $email, $submitter) = $result->fields;
        if ($submitter == "") {
           $submitter = __('None', $dom);
        }
        $newweblinks[] = array('lid' => $lid,
                              'cid' => $cid,
                              'title' => $title,
                              'url' => $url,
                            'description' => $description,
                            'name' => $name,
                            'email' => $email,
                            'submitter' => $submitter);
    }

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the array
    return $newweblinks;
}

function Web_Links_adminapi_getmodlink($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Argument check
    if ((!isset($args['lid']) || !is_numeric($args['lid']))) {
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'           => 0,
                              'component_left'  => 'Web_Links',
                              'component_right' => 'Link',
                              'instance_left'   => 'title',
                              'instance_right'  => 'lid',
                              'level'           => ACCESS_EDIT));

    // get the object from the db
    $objArray = DBUtil::selectObjectById('links_links', $args['lid'], 'lid', '', $permFilter);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    return $objArray;
}

function Web_Links_adminapi_brokenlinks()
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_modrequest_column'];
    $sql = "SELECT $column[requestid], $column[lid], $column[modifysubmitter]
            FROM $pntable[links_modrequest]
            WHERE $column[brokenlink]='1'
            ORDER BY $column[requestid]";
    $result =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($requestid, $lid, $modifysubmitter)=$result->fields;

        $column = &$pntable['links_links_column'];
        $sql = "SELECT $column[title], $column[url], $column[submitter]
                FROM $pntable[links_links]
                WHERE $column[lid]='".(int)DataUtil::formatForStore($lid)."'";
        $result2 =& $dbconn->Execute($sql);


        if ($modifysubmitter != pnConfigGetVar('anonymous')) {
            $column = &$pntable['users_column'];
            $sql = "SELECT $column[email]
                    FROM $pntable[users]
                    WHERE $column[uname]='".DataUtil::formatForStore($modifysubmitter)."'";
            $result3 =& $dbconn->Execute($sql);

            list($email)=$result3->fields;

        }

        list($title, $url, $owner)=$result2->fields;

        $column = &$pntable['users_column'];
        $sql = "SELECT $column[email]
                FROM $pntable[users]
                WHERE $column[uname]='".DataUtil::formatForStore($owner)."'";
        $result4 =& $dbconn->Execute($sql);

        list($owneremail)=$result4->fields;

        $brokenlinks[] = array('lid' => $lid,
                               'modifysubmitter' => $modifysubmitter,
                               'title' => $title,
                               'url' => $url,
                               'submitter' => $submitter,
                               'email' => $email,
                               'owner' => $owner,
                               'owneremail' => $owneremail);
    }

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();

    // Return the array
    return $brokenlinks;
}

function Web_Links_adminapi_totalmodrequests()
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_modrequest_column'];
    $sql = "SELECT $column[requestid], $column[lid], $column[cat_id], $column[title], $column[url], $column[description], $column[modifysubmitter]
            FROM $pntable[links_modrequest]
            WHERE $column[brokenlink]='0'
            ORDER BY $column[requestid]";
    $result =& $dbconn->Execute($sql);
    $totalmodrequests = $result->PO_RecordCount();

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    $result->Close();

    return $totalmodrequests;
}

function Web_Links_adminapi_modrequests()
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_modrequest_column'];
    $sql = "SELECT $column[requestid], $column[lid], $column[cat_id], $column[title], $column[url], $column[description], $column[modifysubmitter]
            FROM $pntable[links_modrequest]
            WHERE $column[brokenlink]='0'
            ORDER BY $column[requestid]";
    $result =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    for (; !$result->EOF; $result->MoveNext()) {
        list($requestid, $lid, $cid, $title, $url, $description, $modifysubmitter)=$result->fields;

        $column = &$pntable['links_links_column'];
        $sql = "SELECT $column[cat_id], $column[title], $column[url], $column[description], $column[submitter]
                FROM $pntable[links_links]
                WHERE $column[lid]='".(int)DataUtil::formatForStore($lid)."'";
        $result2 =& $dbconn->Execute($sql);
        list($origcid, $origtitle, $origurl, $origdescription, $owner)=$result2->fields;

        $column = &$pntable['users_column'];
        $sql = "SELECT $column[email]
                FROM $pntable[users]
                WHERE $column[uname]='".DataUtil::formatForStore($modifysubmitter)."'";
        $result3 =& $dbconn->Execute($sql);
        list($modifysubmitteremail)=$result3->fields;

        $column = &$pntable['links_categories_column'];
        $sql = "SELECT $column[title] FROM $pntable[links_categories]
                WHERE $column[cat_id]='".(int)DataUtil::formatForStore($cid)."'";
        $result4 =& $dbconn->Execute($sql);
        list($cidtitle) = $result4->fields;

        $column = &$pntable['links_categories_column'];
        $sql = "SELECT $column[title] FROM $pntable[links_categories]
                WHERE $column[cat_id]='".(int)DataUtil::formatForStore($origcid)."'";
        $result5 =& $dbconn->Execute($sql);
        list($origcidtitle) = $result5->fields;

        $sql = "SELECT $column[email]
                FROM $pntable[users]
                WHERE $column[uname]='".DataUtil::formatForStore($owner)."'";
        $result6 =& $dbconn->Execute($sql);
        list($owneremail)=$result6->fields;

        if ($owner=="") {
            $owner="administration";
        }
        $modrequests[] = array('requestid' => $requestid,
                              'lid' => $lid,
                              'cid' => $cid,
                              'title' => $title,
                              'url' => $url,
                              'description' => $description,
                              'cidtitle' => $cidtitle,
                              'modifysubmitter' => $modifysubmitter,
                              'origcid' => $origcid,
                              'origtitle' => $origtitle,
                              'origurl' => $origurl,
                              'origdescription' => $origdescription,
                              'origcidtitle' => $origcidtitle,
                              'owner' => $owner,
                              'modifysubmitteremail' => $modifysubmitteremail,
                              'owneremail' => $owneremail);
    }

    $result->Close();

    return $modrequests;
}

function Web_Links_adminapi_linksmodcat($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get arguments from argument array
    extract($args);

    if (!isset($cid) || !is_numeric($cid)){
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_categories_column'];
    $sql = "SELECT $column[title], $column[cdescription]
            FROM $pntable[links_categories]
            WHERE $column[cat_id]='".(int)DataUtil::formatForStore($cid)."'";
    $result =& $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    list($title,$cdescription) = $result->fields;

    $result->Close();

    if (pnSecAuthAction(0, 'Web_Links::Category', "$title::$cid", ACCESS_EDIT)) {
        $category = array('title' => $title,
                          'cdescription' => $cdescription,
                          'cid' => $cid);
    }

    return $category;
}