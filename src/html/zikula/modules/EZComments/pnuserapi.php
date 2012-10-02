<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: pnuserapi.php 694 2010-05-25 07:59:46Z mateo $
 * @license See license.txt
 */

/**
 * get comments for a specific item inside a module
 *
 * This function provides the main user interface to the comments
 * module.
 *
 * @param $args['mod']         Name of the module to get comments for
 * @param $args['objectid']    ID of the item to get comments for
 * @param $args['search']      an array with words to search for and a boolean
 * @param $args['startnum']    First comment
 * @param $args['numitems']    number of comments
 * @param $args['sortorder']   order to sort the comments
 * @param $args['sortby']      field to sort the comments by
 * @param $args['status']      get all comments of this status
 * @param $args['uid']         (optional) get all comments of this user
 * @param $args['owneruid']    (optional) get all comments of this content owner
 * @param $args['admin']       (optional) is set to 1 for admin mode (permission check)
 * @return array array of items, or false on failure
 */
function EZComments_userapi_getall($args = array())
{
    if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
        $args['numitems'] = -1;
    }
    if (!isset($args['status']) || !is_numeric($args['status'])) {
        $args['status'] = -1;
    }

    // Security check
    if (isset($args['mod']) && isset($args['objectid'])) {
        if (!SecurityUtil::checkPermission('EZComments::', "$args[mod]:$args[objectid]:", ACCESS_READ)) {
            return array();
        }
    } elseif (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
        return array();
    }

    // Get database setup
    $pntable = pnDBGetTables();
    $columns = &$pntable['EZComments_column'];

    // form where clause
    $whereclause = array();

    // object id
    if (isset($args['mod'])) {
        $whereclause[] = "$columns[modname] = '" . DataUtil::formatForStore($args['mod']) . "'";
        if (isset($args['objectid'])) {
            $whereclause[] = "$columns[objectid] = '" . DataUtil::formatForStore($args['objectid']) . "'";
        }
    }

    // comment's status
    if ($args['status'] >= 0) {
        $whereclause[] = "$columns[status] = '" . DataUtil::formatForStore($args['status']) . "'";
    }

    // do a search?
    if (isset($args['search']) && $args['search']) {
        $where_array = array();
        foreach ($args['search']['words'] as $word) {
            $word = DataUtil::formatForStore($word);
            $where_array[] = "($columns[subject] LIKE '%$word%' OR $columns[comment] LIKE '%$word%')";
        }
        $whereclause[] = implode($args['search']['bool'] == 'AND' ? ' AND ' : ' OR ', $where_array);
    }

    // include own content or own comments
    $owneruid = isset($args['owneruid']) ? (int)$args['owneruid'] : 0;
    $uid      = isset($args['uid'])      ? (int)$args['uid']      : 0;
    if (($owneruid > 1) && ($uid > 1)) {
        $whereclause[] = "($columns[owneruid] = '$owneruid' OR $columns[uid] = '$uid')";
    } else if ($uid > 1) {
        $whereclause[] = "$columns[uid] = '$uid'";
    } else if ($owneruid > 1) {
        $whereclause[] = "$columns[owneruid] = '$owneruid'";
    }

    // admin mode: only show comments for modules considering permission checks
    $admin = isset($args['admin']) ? (bool)$args['admin'] : false;
    if ($admin) {
        // get list of modules
        $modlist = pnModGetAllMods();
        $permclause = array();
        foreach ($modlist as $module) {
            // simple permission check
            $inst = "$module[name]::";
            if (SecurityUtil::checkPermission('EZComments::', $inst, ACCESS_EDIT)) {
                $permclause[] = "$columns[modname] = '$module[name]'";
            }
        }
        if (!empty($permclause)) {
            $whereclause[] = '('.implode(' OR ', $permclause).')';
        }
    }

    // create where clause
    $where = '';
    if (!empty($whereclause)) {
        $where = 'WHERE ' . implode(' AND ', $whereclause);
    }

    // form the orderby clause
    $orderby = '';
    if (isset($args['sortby']) && isset($columns[$args['sortby']])) {
        $orderby = 'ORDER BY '.$columns[$args['sortby']];
    } else {
        $orderby = "ORDER BY $columns[date]";
    }

    if (isset($args['sortorder']) && in_array(strtoupper($args['sortorder']), array('DESC', 'ASC'))) {
        $orderby .= ' '.strtoupper($args['sortorder']);
    } else {
        $orderby .= ' DESC';
    }

    $permFilter[] = array('component_left'   => 'EZComments',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'modname',
                          'instance_middle'  => 'objectid',
                          'instance_right'   => 'id',
                          'level'            => ACCESS_READ);

    $items = DBUtil::selectObjectArray('EZComments', $where, $orderby, $args['startnum']-1, $args['numitems'], '', $permFilter);

    // backwards compatibilty: modname -> mod
    foreach (array_keys($items) as $k) {
        $items[$k]['mod'] = $items[$k]['modname'];
    }

    // return the items
    return $items;
}

/**
 * create a new comment
 *
 * This function creates a new comment and returns its ID.
 * Access checking is done.
 *
 * @param $args['mod']        Name of the module to create comments for
 * @param $args['objectid']   ID of the item to create comments for
 * @param $args['comment']    The comment itself
 * @param $args['subject']    The subject of the comment
 * @param $args['replyto']    The reference ID
 * @param $args['uid']        The user ID (optional)
 * @param $args['owneruid']   The user ID whoose content was commented(optional)
 * @param $args['useurl']     The url that should be used for storing in db and email to admin
 * @param $args['type']       The type of comment (optional) currently trackback, pingback are only allowed values
 * @return integer ID of new comment on success, false on failure
 */
function EZComments_userapi_create($args = array())
{
    if (!isset($args['mod']) || !isset($args['objectid']) || !isset($args['comment']) || !isset($args['owneruid'])) {
        return LogUtil::registerArgsError();
    }

    if (!isset($args['type']) || !is_string($args['type']) || !in_array($args['type'], array('trackback', 'pingback'))) {
        $args['type'] = '';
    }

    // Security check
    if (!SecurityUtil::checkPermission("EZComments::$args[type]", "$args[mod]:$args[objectid]:", ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError();
    }

    $dom = ZLanguage::getModuleDomain('EZComments');

    $owneruid = (int)$args['owneruid'];

    // Sometimes the displayurl for the redirect is another url then the url,
    // that should be sent via email.
    if (isset($args['useurl']) && !empty($args['useurl'])) {
        $url = $args['useurl'] = str_replace('&amp;', '&', $args['useurl']);
    } else {
        $baseURL = pnGetBaseURL();
        $url = isset($args['redirect']) ? $baseURL . str_replace($baseURL, '', $args['redirect']) : pnServerGetVar('HTTP_REFERER');
    }

    $loggedin = pnUserLoggedIn();

    // ContactList ignore check. If the user is ignored by the
    // content owner the user will not be able to post any comment...
    if ($loggedin && $owneruid > 0 && pnModAvailable('ContactList') && pnModAPIFunc('ContactList', 'user', 'isIgnored', array('iuid' => pnUserGetVar('uid'), 'uid' => $owneruid))) {
        return LogUtil::registerError(__('Error! The user ignores you.', $dom));
    }

    // check unregistered user included name (if required)
    $args['anonname'] = isset($args['anonname']) ? trim($args['anonname']) : '';
    if (!$loggedin) {
        $args['uid'] = 0;
        if (pnModGetVar('EZComments', 'anonusersrequirename') && empty($args['anonname'])) {
            return LogUtil::registerError(__('Error! The name field is required. Comment rejected.', $dom));
        }
    }
    if (!isset($args['replyto']) || empty($args['replyto'])) {
        $args['replyto'] = -1;
    }
    if (!isset($args['uid']) || !is_numeric($args['uid'])) {
        $args['uid'] = pnUserGetVar('uid');
    }

    if (!isset($args['date'])) {
        $args['date'] = DateUtil::getDatetime();
    } else {
        $args['date'] = DataUtil::formatForStore($args['date']);
    }

    // get the users ip
    $ipaddr = '';
    if (pnModGetVar('EZComments', 'logip')) {
        $ipaddr = pnServerGetVar('REMOTE_ADDR');
    }

    // check we should moderate the comments
    $status = array(0);

    // always moderate trackback or pingback comments
    if (in_array($args['type'], array('trackback', 'pingback'))) {
        $status[] = 1;

    } elseif (pnModGetVar('EZComments', 'moderation')) {
        // check if we should moderate all comments
        if (pnModGetVar('EZComments', 'alwaysmoderate')) {
            $status[] = 1;
        } else {
            $checkvars = array('subject', 'comment', 'anonname', 'anonmail', 'anonwebsite');
            foreach ($checkvars as $checkvar) {
                $status[] = _EZComments_userapi_checkcomment($$checkvar);
            }
        }
        $status[] = _EZComments_userapi_checksubmitter();
    }

    // akismet
    if (pnModAvailable('akismet') && pnModGetVar('EZComments', 'akismet')) {
        if (pnModAPIFunc('akismet', 'user', 'isspam',
                         array('author'      => $loggedin ? pnUserGetVar('uname') : $args['anonname'],
                               'authoremail' => $loggedin ? pnUserGetVar('email') : (isset($args['anonmail']) ? $args['anonmail'] : ''),
                               'authorurl'   => $loggedin ? pnUserGetVar('url')   : (isset($args['anonwebsite']) ? $args['anonwebsite'] : ''),
                               'content'     => $args['comment'],
                               'permalink'   => $url))) {
            $status[] = pnModGetVar('EZComments', 'akismetstatus');
        }
    }

    // check for a blacklisted return
    if (in_array(2, $status)) {
        return LogUtil::registerError(__('Error! Your comment contains unacceptable content and has been rejected.', $dom));
    }

    // check for a moderated return
    $maxstatus = in_array(1, $status) ? 1 : 0;

    // build new object
    $newcomment = array(
        'modname'     => $args['mod'],
        'objectid'    => $args['objectid'],
        'url'         => $url,
        'date'        => $args['date'],
        'uid'         => $args['uid'],
        'owneruid'    => $owneruid,
        'subject'     => $args['subject'],
        'comment'     => $args['comment'],
        'type'        => $args['type'],
        'replyto'     => $args['replyto'],
        'anonname'    => $args['anonname'],
        'anonmail'    => $args['anonmail'],
        'anonwebsite' => $args['anonwebsite'],
        'status'      => $maxstatus,
        'ipaddr'      => $ipaddr
    );

    if (!($newcomment = DBUtil::insertObject($newcomment, 'EZComments'))) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }

    // set an approriate status/errormsg
    switch ($maxstatus)
    {
        case 0:
            LogUtil::registerStatus(__('Done! Comment added.', $dom));
            break;

        case 1:
            LogUtil::registerStatus(__('Done! Your comment was held for moderation and will be reviewed shortly.', $dom));
            break;
    }

    if ($owneruid > 1) {
        $owner['email'] = pnUserGetVar('email', $owneruid);
        $owner['uname'] = pnUserGetVar('uname', $owneruid);
        if (!empty($owner['email']) && !empty($owner['uname'])) {
            $toaddress = $owner['email'];
            $toname    = $owner['uname'];
        } else {
            $toaddress = pnConfigGetVar('adminmail');
            $toname    = pnConfigGetVar('sitename');
        }
    } else {
        $toaddress = pnConfigGetVar('adminmail');
        $toname    = pnConfigGetVar('sitename');
    }

    // Inform the content owner or the admin about a new comment
    if (!$maxstatus && pnModGetVar('EZComments', 'MailToAdmin') && !in_array($args['uid'], array(2, $owneruid))) {
        $renderer = & pnRender::getInstance('EZComments', false);

        if ($args['uid'] > 0) {
            $newcomment['userline'] = pnUserGetVar('uname', $args['uid']);
        } else {
            $newcomment['userline'] = "$args[anonname] $args[anonmail]";
        }
        $renderer->assign('comment', $newcomment);

        $mailsubject = __('A new comment was entered', $dom);

        pnModAPIFunc('Mailer', 'user', 'sendmessage',
                     array('toaddress'   => $toaddress,
                           'toname'      => $toname,
                           'fromaddress' => pnConfigGetVar('adminmail'),
                           'fromname'    => pnConfigGetVar('sitename'),
                           'subject'     => $mailsubject,
                           'body'        => $renderer->fetch('ezcomments_mail_newcomment.htm')));
    }

    if ($maxstatus && pnModGetVar('EZComments', 'moderationmail') && !in_array($args['uid'], array(2, $owneruid))) {
        $renderer = & pnRender::getInstance('EZComments', false);

        if ($args['uid'] > 0) {
            $newcomment['userline'] = pnUserGetVar('uname', $args['uid']);
        } else {
            $newcomment['userline'] = "$args[anonname] $args[anonmail]";
        }
        $renderer->assign('comment', $newcomment);

        $mailsubject = __('New comment for your site', $dom);

        pnModAPIFunc('Mailer', 'user', 'sendmessage',
                     array('toaddress'   => pnConfigGetVar('adminmail'),
                           'toname'      => pnConfigGetVar('sitename'),
                           'fromaddress' => pnConfigGetVar('adminmail'),
                           'fromname'    => pnConfigGetVar('sitename'),
                           'subject'     => $mailsubject,
                           'body'        => $renderer->fetch('ezcomments_mail_modcomment.htm')));
    }

    pnModCallHooks('item', 'create', $newcomment['id'], array('module' => 'EZComments'));

    return $newcomment['id'];
}

/**
 * get comments for a specific item inside a module
 *
 * This function provides the main user interface to the comments
 * module.
 *
 * @param $args['id'] ID of the comment
 * @returns array
 * @return details, or false on failure
 */
function EZComments_userapi_get($args = array())
{
    if (!isset($args['id']) || empty($args['id'])) {
        return LogUtil::registerArgsError();
    }

    // init empty comment
    $comment = array();

    $permFilter   = array();
    $permFilter[] = array('component_left'   => 'EZComments',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'modname',
                          'instance_middle'  => 'objectid',
                          'instance_right'   => 'id',
                          'level'            => ACCESS_READ);

    $comment = DBUtil::selectObjectByID('EZComments', $args['id'], 'id', null, $permFilter);

    if ($comment != false && is_array($comment)) {
        // backwards compatibility
        $comment['mod'] = $comment['modname'];
    }

    return $comment;
}

/**
 * Utility function to count the number of items held by this module
 *
 * Credits to Lee Eason from http://pnflashgames.com for giving the idea
 * to allow a module to find the number of comments that have been added
 * to the module as a whole or to an individual item.
 *
 * @param $args['mod']  name of the module to get the number of comments for
 * @param $args['objectid'] the objectid to get the number of comments for
 * @param $args['status']  Status of the comments to get (default: all)
 * @param $args['owneruid']  (optional) UID of owner
 * @param $args['uid']  (optional) UID of poster
 * @param $args['admin']  (optional) set to 1 if called from admin mode
 * @return integer number of items held by this module
 */
function EZComments_userapi_countitems($args = array())
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
        return false;
    }

    // get parameters
    $owneruid = isset($args['owneruid']) ? (int)$args['owneruid'] : 0;
    $uid      = isset($args['uid'])      ? (int)$args['uid']      : 0;

    // Get database column names
    $pntable = &pnDBGetTables();
    $columns = $pntable['EZComments_column'];

    // build the where clause
    $queryargs = array();

    if ($owneruid > 1 && $uid > 1) {
        $queryargs[] = "$columns[owneruid] = '$args[owneruid]' OR $columns[uid] = '$args[uid]'";
    } else if ($uid > 1) {
        $queryargs[] = "$columns[uid] = '$args[uid]'";
    } else if ($owneruid > 1) {
        $queryargs[] = "$columns[owneruid] = '$args[owneruid]'";
    }

    if (isset($args['mod'])) {
        // Count comments for a specific module
        $mod = DataUtil::formatForStore($args['mod']);
        $queryargs[] = "$columns[modname] = '$mod'";
        if (isset($args['objectid'])) {
            // Count comments for a specific item in a specific mod
            $objectid = DataUtil::formatForStore($args['objectid']);
            $queryargs[] = "$columns[objectid] = '$objectid'";
        }
    }

    if (isset($args['status']) && is_numeric($args['status']) && $args['status'] >= 0 && $args['status'] <= 2) {
        $args['status'] = DataUtil::formatForStore($args['status']);
        $queryargs[] = "$columns[status] = '$args[status]'";
    }

    // admin mode: only count comments for modules considering permission checks
    $admin = isset($args['admin']) ? (bool)$args['admin'] : false;
    if ($admin) {
        // get list of modules
        $modlist = pnModGetAllMods();
        $permclause = array();
        foreach ($modlist as $module)
        {
            // simple permission check
            $inst = "$module[name]:".(isset($args['objectid']) ? $args['objectid'] : '').":";
            if (SecurityUtil::checkPermission('EZComments::', $inst, ACCESS_EDIT)) {
                $permclause[] = "$columns[modname] = '$module[name]'";
            }
        }
        $queryargs[] = implode(' OR ', $permclause);
    }

    $where = '';
    if (!empty($queryargs)) {
        $where = implode(' AND ', $queryargs);
    }

    return DBUtil::selectObjectCount('EZComments', $where);
}

/**
 * utility function to return a list of template sets for
 * displaying the comments input/output
 *
 * @return array array of template set names (directories)
 */
function EZComments_userapi_gettemplates()
{
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
        return false;
    }

    $modinfo  = pnModGetInfo(pnModGetIDFromName('EZComments'));
    $osmoddir = DataUtil::formatForOS($modinfo['directory']);
    $ostheme  = DataUtil::formatForOS(pnUserGetTheme());
    $rootdirs = array("modules/$osmoddir/pntemplates/",
                      "config/templates/$osmoddir/",
                      "themes/$ostheme/templates/$osmoddir/");

    $templates = array();

    // read each directory for template sets
    foreach ($rootdirs as $rootdir)
    {
        $folders = FileUtil::getFiles($rootdir, false, true, null, 'd');
        foreach ($folders as $folder)
        {
            if (!in_array($folder, array('plugins'))) {
                $templates[] = $folder;
            }
        }
    }

    // return a list with no duplicates
    return array_unique($templates);
}

/**
 * work out the status for a comment
 *
 * this function checks a piece of text against
 * the defined moderation rules and returns the an appropriate status
 *
 * @todo turn this into a normal API
 * @param  var string to check
 * @author Mark West
 * @access prviate
 * @return mixed int 1 to require moderation, 0 for instant submission, 2 for discarding the comment, void error
 */
function _EZComments_userapi_checkcomment($var)
{
    if (!isset($var)) {
        return 0;
    }

    // check blacklisted words - exit silently if found
    $blacklistedwords = explode("\n", pnModGetVar('EZComments', 'blacklist'));
    foreach ($blacklistedwords as $blacklistedword)
    {
        $blacklistedword = trim($blacklistedword);
        if (empty($blacklistedword)) {
            continue;
        }
        if (stristr($var, $blacklistedword)) {
            return 2;
        }
    }

    // count the number of links
    $linkcount = count(explode('http:', $var));

    // check link count for blacklisting
    if ($linkcount-1 >= pnModGetVar('EZComments', 'blacklinkcount')) {
        return 2;
    }

    // check words to trigger a moderated comment
    $modlistedwords = explode("\n", pnModGetVar('EZComments', 'modlist'));
    foreach ($modlistedwords as $modlistedword)
    {
        $modlistedword = trim($modlistedword);
        if (empty($modlistedword)) {
            continue;
        }
        if (stristr($var, $modlistedword)) {
            return 1;
        }
    }

    // check link count for moderation
    if ($linkcount-1 >= pnModGetVar('EZComments', 'modlinkcount')) {
        return 1;
    }

    // comment passed
    return 0;
}

/**
 * work out the status for a comment
 *
 * this function checks for blacklisted proxies and if the user
 * has already commented
 *
 * @author Mark West
 * @access prviate
 * @return mixed int 1 to require moderation, 0 for instant submission, 2 for discarding the comment, void error
 */
function _EZComments_userapi_checksubmitter($uid = null)
{
    // check for open proxies
    // credit to wordpress for this logic function wp_proxy_check()
    $ipnum = pnServerGetVar('REMOTE_ADDR');

    // set the current uid if not present
    if (!isset($uid)) {
        $uid = pnUserGetVar('uid');
    }

    if (pnModGetVar('EZComments', 'proxyblacklist') && !empty($ipnum)) {
        $rev_ip = implode('.', array_reverse(explode('.', $ipnum)));
        // opm.blitzed.org is appended to use thier proxy lookup service
        // results of gethostbyname are cached
        $lookup = $rev_ip.'.opm.blitzed.org';
        if ($lookup != gethostbyname($lookup)) {
            return 2;
        }
    }

    // check if the comment comes from user that we trust
    // i.e. one who has an approved comment already
    if (pnUserLoggedIn() && pnModGetVar('EZComments', 'dontmoderateifcommented')) {
        $commentedlist = pnModAPIFunc('EZcomments', 'user', 'getcommentingusers');
        if (is_array($commentedlist) && in_array($uid, $commentedlist)) {
            return 0;
        }
        return 1;
    }

    return 0;
}

/**
 * get all users who have commented on the site so far
 *
 * @author Mark West
 * @return array users who've commented so far
 */
function EZComments_userapi_getcommentingusers()
{
    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
        return array();
    }

    // Get database columns
    $pntable = &pnDBGetTables();
    $columns = $pntable['EZComments_column'];

    $where = "$columns[status] = 0";
    $items = DBUtil::selectFieldArray('EZComments', 'uid', $where, '', true);

    return $items;
}

/**
 * get all comments attached to a module
 *
 * @author Mark West
 * @return mixed array of items if successful, false otherwise
 */
function EZComments_userapi_getallbymodule($args = array())
{
    // Security check
    if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
        return false;
    }

    $dom = ZLanguage::getModuleDomain('EZComments');

    // check for a valid module
    if (!isset($args['mod']) || !is_string($args['mod'])) {
        return false;
    }
    $mod = DataUtil::formatForOS($args['mod']);

    // Get database setup
    $pntable = &pnDBGetTables();

    $eztable = $pntable['EZComments'];
    $columns = $pntable['EZComments_column'];

    $sql = "SELECT $columns[objectid],
                   $columns[url],
                   count(*)
            FROM $eztable
            WHERE $columns[modname] = '$mod'
            GROUP BY $columns[objectid]
            ORDER BY $columns[objectid]";

    $result = DBUtil::executeSQL($sql);

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($result == false) {
        return LogUtil::registerError(__('Error! Could not load items.', $dom));
    }

    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
    $items = DBUtil::marshallObjects($result, array('objectid', 'url', 'count'));

    // Return the items
    return $items;

}

/**
 * advanced checkPermission-function
 *
 * This function is neccessary because the regular permission system
 * of the CMS does not provide all functionallity we need. For example, if
 * EZComments is hooked to the MyProfile module a profile owner must be able
 * to delete comments other users wrote into his profile page.
 * This function first does the regular Zikula checkPermission call and if
 * this function call is "false", we'll do some more checks
 *
 * @author Florian Schie�l
 * @param $args['module'] string module's name
 * @param $args['objectid'] int object's id
 * @param $args['commentid'] int id of comment
 * @param $args['uid'] int commenting user's uid (opt)
 * @param $args['level'] string security level for SecurityUtil
 *
 * @return boolean
 */
// FIXME check where this is called and with which params
function EZComments_userapi_checkPermission($args = array())
{
    // A guest will have no permission
    if (!pnUserLoggedIn()) {
        return false;
    }

    // own comments = ok
    $uid  = pnUserGetVar('uid');
    $auid = isset($args['uid']) ? $args['uid'] : 0;
    if ($uid == $auid) {
        return true;
    }

    // parameter check
    if (!isset($args['commentid'])) {
        $args['commentid'] = '';
    }
    if (!isset($args['level'])) {
        $args['level'] = ACCESS_COMMENT;
    }
    if (!isset($args['module']) || !isset($args['objectid'])) {
        return false;
    }

    $inst = "$args[module]:$args[objectid]:$args[commentid]";
    // regular securityUtil::checkPermission check. Return true on success
    if (SecurityUtil::checkPermission('EZComments::', $inst, $args['level'])) {
        return true;
    }

    if (!empty($args['commentid'])) {
        // otherwise: get the comment, check the uid and return the result
        $comment = DBUtil::selectObjectByID('EZComments', $args['commentid']);
        if ($comment['uid'] == $uid) {
            return true;
        }
    }

    // otherwise return false because no security check had a positive result
    return false;
}

/**
 * get the templateset stylesheet from several possible sources
 *
 * @access public
 * @param string $path    the templateset/css path
 * @return string path of the stylesheet file, relative to PN root folder
 */
function EZComments_userapi_getStylesheet($args = array())
{
    // default for the style sheet
    if (!isset($args['path']) || empty($args['path'])) {
        $defaultcss  = pnModGetVar('EZComments', 'css', 'style.css');
        $args['path'] = 'Standard/'.$defaultcss;
    }

    $ospath = DataUtil::formatForOS($args['path']);

    // config directory
    $configpath = "config/templates/EZComments";

    // theme directory
    $theme = DataUtil::formatForOS(pnUserGetTheme());
    $themepath = "themes/$theme/templates/modules/EZComments";

    // module directory
    $modpath = "modules/EZComments/pntemplates";

    // search for the style sheet
    $csssrc = '';
    foreach (array($configpath, $themepath, $modpath) as $basepath) {
        if (file_exists("$basepath/$ospath") && is_readable("$basepath/$ospath")) {
            $csssrc = "$basepath/$ospath";
            break;
        }
    }
    return $csssrc;
}

