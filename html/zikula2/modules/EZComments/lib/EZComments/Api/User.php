<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Api_User extends Zikula_AbstractApi
{
    /**
     * Get comments for a specific item inside a module
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
    public function getall($args = array())
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
        $tables = DBUtil::getTables();
        $columns = $tables['EZComments_column'];

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
            $modlist = ModUtil::getAllMods();
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
     * Create a new comment
     *
     * This function creates a new comment and returns its ID.
     * Access checking is done.
     *
     * @param $args['mod']        Name of the module to create comments for
     * @param $args['objectid']   ID of the item to create comments for
     * @param $args['areaid']     hook areaID of the item to create comments for
     * @param $args['comment']    The comment itself
     * @param $args['subject']    The subject of the comment
     * @param $args['replyto']    The reference ID
     * @param $args['uid']        The user ID (optional)
     * @param $args['owneruid']   The user ID whoose content was commented(optional)
     * @param $args['useurl']     The url that should be used for storing in db and email to admin
     * @param $args['type']       The type of comment (optional) currently trackback, pingback are only allowed values
     * @return integer ID of new comment on success, false on failure
     */
    public function create($args = array())
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

        $owneruid = (int)$args['owneruid'];

        // Sometimes the displayurl for the redirect is another url then the url,
        // that should be sent via email.
        if (isset($args['useurl']) && !empty($args['useurl'])) {
            $url = $args['useurl'] = str_replace('&amp;', '&', $args['useurl']);
        } else {
            $baseURL = System::getBaseUrl();
            $url = isset($args['redirect']) ? $baseURL . str_replace($baseURL, '', $args['redirect']) : System::serverGetVar('HTTP_REFERER');
        }

        $loggedin = UserUtil::isLoggedIn();

        // ContactList ignore check. If the user is ignored by the
        // content owner the user will not be able to post any comment...
        if ($loggedin && $owneruid > 0 && ModUtil::available('ContactList') && ModUtil::apiFunc('ContactList', 'user', 'isIgnored', array('iuid' => UserUtil::getVar('uid'), 'uid' => $owneruid))) {
            return LogUtil::registerError($this->__('Error! The user ignores you.'));
        }

        // check unregistered user included name (if required)
        $args['anonname'] = isset($args['anonname']) ? trim($args['anonname']) : '';
        if (!$loggedin) {
            $args['uid'] = 0;
            if (ModUtil::getVar('EZComments', 'anonusersrequirename') && empty($args['anonname'])) {
                return LogUtil::registerError($this->__('Error! The name field is required. Comment rejected.'));
            }
        }
        if (!isset($args['replyto']) || empty($args['replyto'])) {
            $args['replyto'] = -1;
        }
        if (!isset($args['uid']) || !is_numeric($args['uid'])) {
            $args['uid'] = UserUtil::getVar('uid');
        }

        if (!isset($args['date'])) {
            $args['date'] = DateUtil::getDatetime();
        } else {
            $args['date'] = DataUtil::formatForStore($args['date']);
        }

        // get the users ip
        $ipaddr = '';
        if (ModUtil::getVar('EZComments', 'logip')) {
            $ipaddr = System::serverGetVar('REMOTE_ADDR');
        }

        // check we should moderate the comments
        $status = array(0);

        // always moderate trackback or pingback comments
        if (in_array($args['type'], array('trackback', 'pingback'))) {
            $status[] = 1;

        } elseif (ModUtil::getVar('EZComments', 'moderation')) {
            // check if we should moderate all comments
            if (ModUtil::getVar('EZComments', 'alwaysmoderate')) {
                $status[] = 1;
            } else {
                $checkvars = array($args['subject'], $args['comment'],  $args['anonname'], $args['anonmail'], $args['anonwebsite']);
                foreach ($checkvars as $checkvar) {
                    $status[] = $this->checkcomment($checkvar);
                }
            }
            $status[] = $this->checksubmitter();
        }

        // Akismet
        if (ModUtil::available('Akismet') && ModUtil::getVar('EZComments', 'Akismet')) {
            if (ModUtil::apiFunc('Akismet', 'user', 'isspam',
                             array('author'      => $loggedin ? UserUtil::getVar('uname') : $args['anonname'],
                                   'authoremail' => $loggedin ? UserUtil::getVar('email') : (isset($args['anonmail']) ? $args['anonmail'] : ''),
                                   'authorurl'   => $loggedin ? UserUtil::getVar('url')   : (isset($args['anonwebsite']) ? $args['anonwebsite'] : ''),
                                   'content'     => $args['comment'],
                                   'permalink'   => $url))) {
                $status[] = ModUtil::getVar('EZComments', 'akismetstatus');
            }
        }

        // check for a blacklisted return
        if (in_array(2, $status)) {
            return LogUtil::registerError($this->__('Error! Your comment contains unacceptable content and has been rejected.'));
        }

        // check for a moderated return
        $maxstatus = in_array(1, $status) ? 1 : 0;

        // build new object
        $newcomment = array(
            'modname'     => $args['mod'],
            'objectid'    => $args['objectid'],
            'areaid'      => $args['areaid'],
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
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // set an approriate status/errormsg
        switch ($maxstatus)
        {
            case 0:
                LogUtil::registerStatus($this->__('Done! Your comment has been successfully added.'));
                break;

            case 1:
                LogUtil::registerStatus($this->__('Done! Your comment was held for moderation and will be reviewed shortly.'));
                break;
        }

        if ($owneruid > 1) {
            $owner['email'] = UserUtil::getVar('email', $owneruid);
            $owner['uname'] = UserUtil::getVar('uname', $owneruid);
            if (!empty($owner['email']) && !empty($owner['uname'])) {
                $toaddress = $owner['email'];
                $toname    = $owner['uname'];
            } else {
                $toaddress = System::getVar('adminmail');
                $toname    = System::getVar('sitename');
            }
        } else {
            $toaddress = System::getVar('adminmail');
            $toname    = System::getVar('sitename');
        }

        // generate output
        $renderer = Zikula_View::getInstance('EZComments');

        // Inform the content owner or the admin about a new comment
        if (!$maxstatus && ModUtil::getVar('EZComments', 'MailToAdmin')) {
            if ($args['uid'] > 0) {
                $newcomment['userline'] = UserUtil::getVar('uname', $args['uid']);
            } else {
                $newcomment['userline'] = "$args[anonname] $args[anonmail]";
            }
            $renderer->assign('comment', $newcomment);
            $renderer->assign('modifyurl', ModUtil::url('EZComments', 'user', 'modify', array('id' => $newcomment['id']), null, null, true));

            $mailsubject = $this->__('A new comment was entered');

            ModUtil::apiFunc('Mailer', 'user', 'sendmessage',
                         array('toaddress'   => $toaddress,
                               'toname'      => $toname,
                               'fromaddress' => System::getVar('adminmail'),
                               'fromname'    => System::getVar('sitename'),
                               'subject'     => $mailsubject,
                               'body'        => $renderer->fetch('ezcomments_mail_newcomment.tpl')));
        }

        if ($maxstatus && ModUtil::getVar('EZComments', 'moderationmail')) {
            if ($args['uid'] > 0) {
                $newcomment['userline'] = UserUtil::getVar('uname', $args['uid']);
            } else {
                $newcomment['userline'] = "$args[anonname] $args[anonmail]";
            }
            $renderer->assign('comment', $newcomment);

            $mailsubject = $this->__('Moderation required for a new comment');

            ModUtil::apiFunc('Mailer', 'user', 'sendmessage',
                         array('toaddress'   => System::getVar('adminmail'),
                               'toname'      => System::getVar('sitename'),
                               'fromaddress' => System::getVar('adminmail'),
                               'fromname'    => System::getVar('sitename'),
                               'subject'     => $mailsubject,
                               'body'        => $renderer->fetch('ezcomments_mail_modcomment.tpl')));
        }

        ModUtil::callHooks('item', 'create', $newcomment['id'], array('module' => 'EZComments'));

        return $newcomment['id'];
    }

    /**
     * Get comments for a specific item inside a module
     *
     * This function provides the main user interface to the comments
     * module.
     *
     * @param $args['id'] ID of the comment
     * @returns array
     * @return details, or false on failure
     */
    public function get($args = array())
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
    public function countitems($args = array())
    {
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
            return false;
        }

        // get parameters
        $owneruid = isset($args['owneruid']) ? (int)$args['owneruid'] : 0;
        $uid      = isset($args['uid'])      ? (int)$args['uid']      : 0;

        // Get database column names
        $tables  = DBUtil::getTables();
        $columns = $tables['EZComments_column'];

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
            $modlist = ModUtil::getAllMods();
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
     * Utility function to return a list of template sets for
     * displaying the comments input/output
     *
     * @return array array of template set names (directories)
     */
    public function gettemplates()
    {
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_READ)) {
            return false;
        }

        $modinfo  = ModUtil::getInfo(ModUtil::getIdFromName('EZComments'));
        $osmoddir = DataUtil::formatForOS($modinfo['directory']);
        $ostheme  = DataUtil::formatForOS(UserUtil::getTheme());
        $rootdirs = array("modules/$osmoddir/templates/",
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
     * Work out the status for a comment
     *
     * this function checks a piece of text against
     * the defined moderation rules and returns the an appropriate status
     *
     * @todo turn this into a normal API
     * @param  var string to check
     * @author Mark West
     * @access private
     * @return mixed int 1 to require moderation, 0 for instant submission, 2 for discarding the comment, void error
     */
    public function checkcomment($args = array())
    {
        if (!isset($args) || empty($args)) {
            return 0;
        }

        // check blacklisted words - exit silently if found
        $blacklistedwords = explode("\n", ModUtil::getVar('EZComments', 'blacklist'));
        foreach ($blacklistedwords as $blacklistedword)
        {
            $blacklistedword = trim($blacklistedword);
            if (empty($blacklistedword)) {
                continue;
            }
            if (stristr($args, $blacklistedword)) {
                return 2;
            }
        }

        // count the number of links
        $linkcount = count(explode('http:', $args));

        // check link count for blacklisting
        if ($linkcount-1 >= ModUtil::getVar('EZComments', 'blacklinkcount')) {
            return 2;
        }

        // check words to trigger a moderated comment
        $modlistedwords = explode("\n", ModUtil::getVar('EZComments', 'modlist'));
        foreach ($modlistedwords as $modlistedword)
        {
            $modlistedword = trim($modlistedword);
            if (empty($modlistedword)) {
                continue;
            }
            if (stristr($args, $modlistedword)) {
                return 1;
            }
        }

        // check link count for moderation
        if ($linkcount-1 >= ModUtil::getVar('EZComments', 'modlinkcount')) {
            return 1;
        }

        // comment passed
        return 0;
    }

    /**
     * Work out the status for a comment
     *
     * this function checks for blacklisted proxies and if the user
     * has already commented
     *
     * @author Mark West
     * @access prviate
     * @return mixed int 1 to require moderation, 0 for instant submission, 2 for discarding the comment, void error
     */
    private function checksubmitter($uid = null)
    {
        // check for open proxies
        // credit to wordpress for this logic function wp_proxy_check()
        $ipnum = System::serverGetVar('REMOTE_ADDR');

        // set the current uid if not present
        if (!isset($uid)) {
            $uid = UserUtil::getVar('uid');
        }

        if (ModUtil::getVar('EZComments', 'proxyblacklist') && !empty($ipnum)) {
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
        if (UserUtil::isLoggedIn() && ModUtil::getVar('EZComments', 'dontmoderateifcommented')) {
            $commentedlist = ModUtil::apiFunc('EZcomments', 'user', 'getcommentingusers');
            if (is_array($commentedlist) && in_array($uid, $commentedlist)) {
                return 0;
            }
            return 1;
        }

        return 0;
    }

    /**
     * Get all users who have commented on the site so far
     *
     * @author Mark West
     * @return array users who've commented so far
     */
    public function getcommentingusers()
    {
        // Security check
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
            return array();
        }

        // Get database columns
        $tables  = DBUtil::getTables();
        $columns = $tables['EZComments_column'];

        $where = "$columns[status] = 0";
        $items = DBUtil::selectFieldArray('EZComments', 'uid', $where, '', true);

        return $items;
    }

    /**
     * Get all comments attached to a module
     *
     * @author Mark West
     * @return mixed array of items if successful, false otherwise
     */
    public function getallbymodule($args = array())
    {
        // Security check
        if (!SecurityUtil::checkPermission('EZComments::', '::', ACCESS_OVERVIEW)) {
            return false;
        }

        // check for a valid module
        if (!isset($args['mod']) || !is_string($args['mod'])) {
            return false;
        }
        $mod = DataUtil::formatForOS($args['mod']);

        // Get database setup
        $tables  = DBUtil::getTables();
        $eztable = $tables['EZComments'];
        $columns = $tables['EZComments_column'];

        $sql = "  SELECT $columns[objectid],
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
            return LogUtil::registerError($this->__('Error! Could not load items.'));
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
     * @author Florian Schießl
     * @param $args['module'] string module's name
     * @param $args['objectid'] int object's id
     * @param $args['commentid'] int id of comment
     * @param $args['uid'] int commenting user's uid (opt)
     * @param $args['level'] string security level for SecurityUtil
     *
     * @return boolean
     */
    // FIXME check where this is called and with which params ?????
    public function checkPermission($args = array())
    {
        // A guest will have no permission
        if (!UserUtil::isLoggedIn()) {
            return false;
        }

        // own comments = ok
        $uid  = UserUtil::getVar('uid');
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

        if (($args['owneruid'] == $uid) && ($args['owneruid'] > 1)) return true;

        if (!empty($args['commentid'])) {
            // otherwise: get the comment, check the uid and return the result
            $comment = DBUtil::selectObjectByID('EZComments', $args['commentid']);
            if (($comment['owneruid'] == $uid) || ($comment['uid'] == $uid)) {
                return true;
            }
        }

        // otherwise return false because no security check had a positive result
        return false;
    }

    /**
     * Get the templateset stylesheet from several possible sources
     *
     * @access public
     * @param  string $path    the templateset/css path
     * @return string path of the stylesheet file, relative to Zikula root folder
     */
    public function getStylesheet($args = array())
    {
        // default for the style sheet
        if (!isset($args['path']) || empty($args['path'])) {
            $defaultcss  = ModUtil::getVar('EZComments', 'css', 'style.css');
            $args['path'] = 'Standard/'.$defaultcss;
        }

        $ospath = DataUtil::formatForOS($args['path']);

        // config directory
        $configpath = "config/templates/EZComments";

        // theme directory
        $theme = DataUtil::formatForOS(UserUtil::getTheme());
        $themepath = "themes/$theme/templates/modules/EZComments";

        // module directory
        $modpath = "modules/EZComments/templates";

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

    /**
     * Prepare comments to be displayed
     *
     * We loop through the "raw data" returned from the API to prepare these data
     * to be displayed.
     * We check for necessary rights, and derive additional information (e.g. user
     * data) drom other modules.
     *
     * @param  $items An array of comment items as returned from the API
     * @return array An array to display (augmented information / perm. check)
     * @since  0.2
     */
    public function prepareCommentsForDisplay($items)
    {
        foreach (array_keys($items) as $k)
        {
            if ($items[$k]['uid'] > 0) {
                // get the user vars and merge into the comment array
                $userinfo = UserUtil::getVars($items[$k]['uid']);

                // the users url will clash with the comment url so lets move it out of the way
                $userinfo['website']   = isset($userinfo['__ATTRIBUTES__']['url']) ? $userinfo['__ATTRIBUTES__']['url'] : '';

                // work out if the user is online
                $userinfo['online'] = false;
                if (ModUtil::available('Profile')) {
                    if (ModUtil::apiFunc('Profile', 'memberslist', 'isonline', array('userid' => $userinfo['uid']))) {
                        $userinfo['online'] = true;
                    }
                }
                $items[$k] = array_merge($items[$k], $userinfo);
                $items[$k]['anonname'] = '';

            } else {
                // put the generic name if anonymous, uname is empty
                $items[$k]['uname'] = '';
                $items[$k]['anonname'] = !empty($items[$k]['anonname']) ? $items[$k]['anonname'] : System::getVar('anonymous');
            }

            $items[$k]['del'] = ModUtil::apiFunc('EZComments', 'user', 'checkPermission',
                                            array('module'    => $items[$k]['modname'],
                                                  'objectid'  => $items[$k]['objectid'],
                                                  'commentid' => $items[$k]['id'],
                                                  'uid'       => $items[$k]['uid'],
                                                  'level'     => ACCESS_DELETE));
        }

        return $items;
    }
}
