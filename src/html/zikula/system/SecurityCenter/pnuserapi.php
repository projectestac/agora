<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 27151 2009-10-25 03:17:26Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage SecurityCenter
 * @author larsneo & neo
 * @author Cafe CounterIntelligence PHP Website Security Script 1.7
 * @author Mike Parniak www.cafecounterintelligence.com
*/

/**
 * get all hack attempts in db
 * @author Mark West
 * @param int $args['startnum'] the start number for the record set
 * @param int $args['numitems'] number of items to get
 * @return mixed array of items, or false on failure
 */
function securitycenter_userapi_getall($args)
{
    // Optional arguments.
    if (!isset($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numitems'])) {
        $args['numitems'] = -1;
    }

    if ((!is_numeric($args['startnum'])) ||
        (!is_numeric($args['numitems']))) {
        return LogUtil::registerArgsError();
    }

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('SecurityCenter::', '::', ACCESS_READ)) {
        return $items;
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'SecurityCenter',
                              'instance_left'  => 'hid',
                              'instance_right' => 'hacktime',
                              'level'          => ACCESS_READ));

    // get the items from the db
    $items = DBUtil::selectObjectArray('sc_anticracker', '', 'hid', $args['startnum']-1, $args['numitems'], '', $permFilter);

    if ($items === false) {
        return LogUtil::registerError(__('Error! Could not load data.'));
    }

    // Return the items
    return $items;
}

/**
 * get a specific hack attempt
 * @author Mark West
 * @param int $args['hid'] id of hack item to get
 * @return mixed item array, or false on failure
 */
function securitycenter_userapi_get($args)
{
    // Argument check
    if (!isset($args['hid']) || !is_numeric($args['hid'])) {
        return LogUtil::registerArgsError();
    }

    // define the permission filter to apply
    $permFilter = array(array('realm'          => 0,
                              'component_left' => 'SecurityCenter',
                              'instance_left'  => 'hid',
                              'instance_right' => 'hacktime',
                              'level'          => ACCESS_READ));

    return DBUtil::selectObjectByID('sc_anticracker', $args['hid'], 'hid');
}

/**
 * utility function to count the number of items held by this module
 * @author Mark West
 * @return int number of items held by this module
 */
function securitycenter_userapi_countitems()
{
    return DBUtil::selectObjectCount('sc_anticracker');
}

/**
 * Secure input
 * Protects against basic attempts of Cross-Site Scripting
 * see http://technicalinfo.net/papers/CSS.html
 * @author Andreas Krapohl
 * @author Brook Humphrey
 * @author Francisco Sam Castillo
 * @author Timax
 * @return bool true on success, false otherwise
 */
function securitycenter_userapi_secureinput()
{
    if (pnConfigGetVar('enableanticracker')) {

        /**
         * Lets now sanitize the GET vars
         */
        if (pnConfigGetVar('filtergetvars') == 1) {
            if (count($_GET) > 0) {
                foreach ($_GET as $key => $secvalue) {
                    if (!is_array($secvalue)) {
                        if ((preg_match("/<[^>]*script.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*object.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*applet.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*embed.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*form.*\"?[^>]*>/i", $secvalue))) {
                            SecurityCenter_userapi_loghackattempt(array('detecting_file' => 'pnAntiCracker',
                                                                     'detecting_line' => __LINE__,
                                                                     'hacktype' => 'pnSecurity Alert',
                                                                     'message' => 'GET: '.$key.'=>'.$secvalue));
                            Header('Location: ' . pnConfigGetVar('entrypoint', 'index.php'));
                        }
                    }
                }
            }
        }

        /**
         * Lets now sanitize the POST vars
         */
        if (pnConfigGetVar('filterpostvars') == 1) {
            if (count($_POST) > 0) {
                foreach ($_POST as $key => $secvalue) {
                    if (!is_array($secvalue)) {
                        if ((preg_match("/<[^>]*script.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*object.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*applet.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*embed.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*form.*\"?[^>]*>/i", $secvalue))) {
                            SecurityCenter_userapi_loghackattempt(array('detecting_file' => 'pnAntiCracker',
                                                                        'detecting_line' => __LINE__,
                                                                        'hacktype' => 'pnSecurity Alert',
                                                                        'message' => 'POST: '.$key.'=>'.$secvalue));
                            Header('Location: ' . pnConfigGetVar('entrypoint', 'index.php'));
                        }
                    }
                }
            }
        }

        /**
         * Lets now sanitize the COOKIE vars
         */
        if (pnConfigGetVar('filtercookievars') == 1) {
            if (count($_COOKIE) > 0) {
                foreach ($_COOKIE as $secvalue) {
                    if (!is_array($secvalue)) {
                        if ((preg_match("/<[^>]*script.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*object.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*applet.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*embed.*\"?[^>]*>/i", $secvalue)) ||
                            (preg_match("/<[^>]*form.*\"?[^>]*>/i", $secvalue))) {
                            SecurityCenter_userapi_loghackattempt(array('detecting_file' => 'pnAntiCracker',
                                                                        'detecting_line' => __LINE__,
                                                                        'hacktype' => 'pnSecurity Alert',
                                                                        'message' => 'COOKIE: '.$key.'=>'.$secvalue));
                            Header('Location: ' . pnConfigGetVar('entrypoint', 'index.php'));
                        }
                    }
                }
            }
        }

    }
}

/**
 * Log hack attempt
 * @author Mark West
 * @param array $args args array is passed directly to other functions
 * @return none
 */
function securitycenter_userapi_loghackattempt($args)
{
    if (pnConfigGetVar('enableanticracker')) {
        if (pnConfigGetVar('loghackattempttodb')) {
            SecurityCenter_userapi_loghackattempttodb($args);
        }
        if (pnConfigGetVar('emailhackattempt')) {
            SecurityCenter_userapi_mailhackattempt($args);
        }
    }
}

/**
 * Logs hack attempt in DB
 * @author Mark West
 * @param array $args full set of http post, get etc. args
 * @param string detecting_file File the hack attempt comes from
 * @param int detecting_line Line in detecting_file
 * @param string hacktype Type of the hack
 * @param string message Info/message about the hack
 *
 * @return bool true if successful, false otherwise
 */
function securitycenter_userapi_loghackattempttodb($args)
{
    $pntable = pnDBGetTables();
    $anticrackerColumn = $pntable['sc_anticracker_column'];

    $hacktime = time();

    $hackfile = isset($args['detecting_file']) ? $args['detecting_file'] : '(no filename available)';
    $hackline = isset($args['detecting_line']) ? $args['detecting_line'] : 0;
    $hacktype = isset($args['hacktype'])       ? $args['hacktype']       : '(no type given)';
    $hackinfo = isset($args['message'])        ? $args['message']        : '(no message given)';

    if (pnUserLoggedIn()) {
        $userid = pnUserGetVar('uid');
    } else {
        $userid = 0;
    }

    $browser = (array)@get_browser();
    // browser_name_regex might break serialization and is not usefull anyway
    unset($browser['browser_name_regex']);
    // add at least some information for enviroments without browscap.ini
    $browser['HTTP_USER_AGENT']=pnServerGetVar('HTTP_USER_AGENT');
    $browser['HTTP_CLIENT_IP']=pnServerGetVar('HTTP_CLIENT_IP');
    $browser['REMOTE_ADDR']=pnServerGetVar('REMOTE_ADDR');
    $browser['GetHostByName']=GetHostByName(pnServerGetVar( 'REMOTE_ADDR' ));
    $browserinfo = serialize($browser);

    $requestarray = serialize($_REQUEST);
    $getarray = serialize($_GET);
    $postarray = serialize($_POST);
    $serverarray = serialize($_SERVER);
    $envarray = serialize($_ENV);
    $cookiearray = serialize($_COOKIE);
    $filesarray = serialize($_FILES);
    $sessionarray = serialize($_SESSION);

    // Add item to db
    $obj = array('hacktime'     => $hacktime,
                 'hackfile'     => $hackfile,
                 'hackline'     => $hackline,
                 'hacktype'     => $hacktype,
                 'hackinfo'     => $hackinfo,
                 'userid'       => $userid,
                 'browserinfo'  => $browserinfo,
                 'requestarray' => $requestarray,
                 'getarray'     => $getarray,
                 'postarray'    => $postarray,
                 'serverarray'  => $serverarray,
                 'envarray'     => $envarray,
                 'cookiearray'  => $cookiearray,
                 'filesarray'   => $filesarray,
                 'sessionarray' => $sessionarray
                 );

    $result = DBUtil::insertObject($obj, 'sc_anticracker', 'hid');

    if (!$result) {
        return LogUtil::registerError(__('Error! Could not create the new record.'));
    }

    // Let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $obj, array('module' => 'SecurityCenter'));

    // Return the id of the newly created item to the calling process
    return true;
}

/**
 * E-mail hack attempt
 * @author Mark West
 * @param array $args full set of http post, get etc. args
 * @param string detecting_file File the hack attempt comes from
 * @param int detecting_line Line in detecting_file
 * @param string hacktype Type of the hack
 * @param string message Info/message about the hack
 * @return bool true if successful, false otherwise
 */
function securitycenter_userapi_mailhackattempt($args)
{
    // get contents of mail message
    $summarycontent = pnConfigGetVar('summarycontent');
    $fullcontent = pnConfigGetVar('fullcontent');

    // substitute placeholders in summary content with real values
    $summarycontent = preg_replace( '/%sitename%/i', pnConfigGetVar('sitename'), $summarycontent);
    $summarycontent = preg_replace( '/%date%/i', ml_ftime( __('%b %d, %Y'), (time())), $summarycontent);
    $summarycontent = preg_replace( '/%time%/i', ml_ftime( __('%I:%M %p'), (time())), $summarycontent);
    $summarycontent = preg_replace( '/%filename%/i', $args['detecting_file'], $summarycontent);
    $summarycontent = preg_replace( '/%linenumber%/i', strval($args['detecting_line']), $summarycontent);
    $summarycontent = preg_replace( '/%type%/i', pnConfigGetVar('sitename'), $summarycontent);
    $summarycontent = preg_replace( '/%additionalinfo%/i', $args['message'], $summarycontent);

    if (pnUserLoggedIn()) {
        $summarycontent = preg_replace( '/%username%/i', pnUserGetVar('uname'), $summarycontent);
        $summarycontent = preg_replace( '/%useremail%/i', pnUserGetVar('email'), $summarycontent);
        $summarycontent = preg_replace( '/%userrealname%/i', pnUserGetVar('name'), $summarycontent);
    } else {
        $summarycontent = preg_replace( '/%username%/i', pnConfigGetVar('anonymous'), $summarycontent);
        $summarycontent = preg_replace( '/%useremail%/i', '-', $summarycontent);
        $summarycontent = preg_replace( '/%userrealname%/i', '-', $summarycontent);
    }

    $summarycontent = preg_replace( '/%httpclientip%/i', pnServerGetVar('HTTP_CLIENT_IP'), $summarycontent);
    $summarycontent = preg_replace( '/%remoteaddr%/i', pnServerGetVar('REMOTE_ADDR'), $summarycontent);
    $summarycontent = preg_replace( '/%gethostbyremoteaddr%/i', GetHostByName(pnServerGetVar( 'REMOTE_ADDR' )), $summarycontent);

    $bodytext = $summarycontent;

    // if full mail is requested then add additional info
    if (pnConfigGetVar('onlysendsummarybyemail') == 0) {
        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_REQUEST)) {
            $output .= "REQUEST * $key : $value\n";
        }

        // replace placeholder with output array
        $fullcontent = preg_replace( '/%requestarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_GET)) {
            $output .= "GET * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%getarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_POST)) {
            $output .= "POST * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%postarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        $output .= "HTTP_USER_AGENT: ".$_SERVER['HTTP_USER_AGENT']."\n";
        $browser = (array) get_browser();
        while (list($key, $value) = each($browser)) {
            $output .= "BROWSER * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%browserarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each( $_SERVER)) {
            $output .= "SERVER * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%requestarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each( $_ENV)) {
            $output .= "ENV * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%envarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_COOKIE))  {
            $output .= "COOKIE * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%cookiearray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_FILES)) {
            $output .= "FILES * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%filesarray%/i', $output, $fullcontent);

        //initalise output string
        $output = '';
        // build output
        while (list($key, $value) = each($_SESSION)) {
            $output .= "SESSION * $key : $value\n";
        }
        // replace placeholder with output array
        $fullcontent = preg_replace( '/%filesarray%/i', $output, $fullcontent);

        $bodytext = $bodytext . $fullcontent;
    }

    // construct and send email
    $sitename = pnConfigGetVar('sitename');
    $adminmail = pnConfigGetVar('adminmail');
    $headers = "From: $sitename <$adminmail>\n"
              ."X-Priority: 1 (Highest)";
    pnMail($adminmail, 'Possible attempt to crack your site (type: '.$args['hacktype'].')', $bodytext, $headers );

    return;
}

/**
 * secureoutput
 * loads all necessary files for a selected outputfilter and calls it
 *
 * @param string $args['var'] the string that should be filtered
 * @param int $args['filter'] the filter to use, if not set, we use the configured outputfilter)
 * @returns string the sanitized string if filter is used
 */
function securitycenter_userapi_secureoutput($args)
{
    if (!isset($args['filter']) || empty($args['filter']) || !is_numeric($args['filter'])) {
        $args['filter'] = pnConfigGetVar('outputfilter');
    }

    // recursive call for arrays and hashs of vars ;)
    if (is_array($args['var'])) {
        $deep = isset($args['deep']) && is_numeric($args['deep']) ? $args['deep'] : 3;
        if ($deep >= 0) {
            $deep--;
            foreach ($args['var'] as $key => $value) {
                $args['var'][$key] = SecurityCenter_userapi_secureoutput(
                array(  'var' => $args['var'][$key],
                'filter' => $args['filter'],
                'deep'=>$deep));
            }
        } else {
            return $args['var'];
        }
        return $args['var'];
    } else {
        $returnValue  = $args['var'];
        if ($args['filter'] > 0) {
            // >0 means not the internal filter
            switch($args['filter']) {
                case 1:
                    // prepare safehtml class
                    static $safehtml, $safecache, $dummy;

                    if (!isset($safehtml)) {
                        define('XML_HTMLSAX3', 'system/SecurityCenter/pnincludes/');
                        include_once XML_HTMLSAX3 . 'safehtml.php';
                        $safehtml = new SafeHTML();
                    }

                    if (!isset($dummy)) {
                        // quick fix for http://noc.postnuke.com/tracker/index.php?func=detail&aid=5662&group_id=5&atid=101
                        // this needs some review as far as the pnRender singleton is concerned
                        $dummy = & pnRender::getInstance();
                        // original code:
                        //$dummy = & pnRender::getInstance('SecurityCenter');
                    }

                    // calc the key for the value
                    $sha = sha1($returnValue);

                    // check if the value is in the safecache
                    if (isset($safecache[$sha])) {
                        $returnValue = $safecache[$sha];
                    } else {
                        // save pnRender delimiters
                        $returnValue = str_replace($dummy->left_delimiter,  'PNRENDER_LEFT_DELIMITER',  $returnValue);
                        $returnValue = str_replace($dummy->right_delimiter, 'PNRENDER_RIGHT_DELIMITER', $returnValue);
                        $returnValue = $safehtml->parse($returnValue);
                        $safehtml->clear();

                        // restore pnRender delimiters
                        $returnValue = str_replace('PNRENDER_LEFT_DELIMITER',  $dummy->left_delimiter,  $returnValue);
                        $returnValue = str_replace('PNRENDER_RIGHT_DELIMITER', $dummy->right_delimiter, $returnValue);

                        // cache the value
                        $safecache[$sha] = $returnValue;
                    }
                case 2:
                    // more outputfilters...
                default:
            }
        }
        return $returnValue;
    }
}
