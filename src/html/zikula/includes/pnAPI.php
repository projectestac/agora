<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnAPI.php 28230 2010-02-08 04:26:34Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage pnAPI
 */

/**
 * Core version informations - should be upgraded on each release for
 * better control on config settings
 */
define('PN_VERSION_NUM', '1.2.8');
define('PN_VERSION_ID', 'Zikula');
define('PN_VERSION_SUB', 'forest');

/**
 * Yes/no integer
 */
define('PNYES', 1);
define('PNNO', 0);

/**
 * State of modules
 */
define('PNMODULE_STATE_UNINITIALISED', 1);
define('PNMODULE_STATE_INACTIVE', 2);
define('PNMODULE_STATE_ACTIVE', 3);
define('PNMODULE_STATE_MISSING', 4);
define('PNMODULE_STATE_UPGRADED', 5);
define('PNMODULE_STATE_NOTALLOWED', 6);
define('PNMODULE_STATE_INVALID', -1);

/**
 * Module dependency states
 */
define('PNMODULE_DEPENDENCY_REQUIRED', 1);
define('PNMODULE_DEPENDENCY_RECOMMENDED', 2);
define('PNMODULE_DEPENDENCY_CONFLICTS', 3);

/**
 * 'All' and 'unregistered' for user and group permissions
 */
define('PNPERMS_ALL', '-1');
define('PNPERMS_UNREGISTERED', '0');

/**
 * Fake module for config vars
 */
define('PN_CONFIG_MODULE', '/PNConfig');

/**
 * Core initialisation stages
 */
define('PN_CORE_NONE', 0);
define('PN_CORE_CONFIG', 1);
define('PN_CORE_ADODB', 2);
define('PN_CORE_DB', 4);
define('PN_CORE_OBJECTLAYER', 8);
define('PN_CORE_TABLES', 16);
define('PN_CORE_SESSIONS', 32);
define('PN_CORE_LANGS', 64);
define('PN_CORE_MODS', 128);
define('PN_CORE_TOOLS', 256);
define('PN_CORE_AJAX', 512);
define('PN_CORE_DECODEURLS', 1024);
define('PN_CORE_THEME', 2048);
define('PN_CORE_ALL', 4095);

ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('default_charset', 'UTF-8');
mb_regex_encoding('UTF-8');

/**
 * Functions
 */

/**
 * get a configuration variable
 *
 * @param name $ the name of the variable
 * @param default the default value to return if the requested param is not set
 * @return mixed value of the variable, or false on failure
 */
function pnConfigGetVar($name, $default = null)
{
    if (!isset($name)) {
        return null;
    }

    if (isset($GLOBALS['PNConfig']['System'][$name])) {
        $mod_var = $GLOBALS['PNConfig']['System'][$name];
    } else {
        $mod_var = pnModGetVar(PN_CONFIG_MODULE, $name);
        // cache
        $GLOBALS['PNConfig']['System'][$name] = $mod_var;
    }

    if (isset($mod_var)) {
        return $mod_var;
    }

    return $default;
}

/**
 * set a configuration variable
 *
 * @param name $ the name of the variable
 * @param value $ the value of the variable
 * @return bool true on success, false on failure
 */
function pnConfigSetVar($name, $value = '')
{
    $name = isset($name) ? (string) $name : '';

    // The database parameter are not allowed to change
    if (empty($name) || $name == 'dbtype' || $name == 'dbhost' || $name == 'dbuname' || $name == 'dbpass' || $name == 'dbname' || $name == 'system' || $name == 'prefix' || $name == 'encoded') {
        return false;
    }

    // set the variable
    if (pnModSetVar(PN_CONFIG_MODULE, $name, $value)) {
        // Update my vars
        $GLOBALS['PNConfig']['System'][$name] = $value;
        return true;
    }

    return false;
}

/**
 * delete a configuration variable
 *
 * @param name $ the name of the variable
 * @returns mixed value of deleted config var or false on failure
 */
function pnConfigDelVar($name)
{
    if (!isset($name)) {
        return false;
    }

    // The database parameter are not allowed to be deleted
    if (empty($name) || $name == 'dbtype' || $name == 'dbhost' || $name == 'dbuname' || $name == 'dbpass' || $name == 'dbname' || $name == 'system' || $name == 'prefix' || $name == 'encoded') {
        return false;
    }

    // set the variable
    pnModDelVar(PN_CONFIG_MODULE, $name);

    // Update my vars
    $val = false;
    if (isset($GLOBALS['PNConfig']['System'][$name])) {
        $val = $GLOBALS['PNConfig']['System'][$name];
        unset($GLOBALS['PNConfig']['System'][$name]);
    }

    // success
    return $val;
}

/**
 * Initialise Zikula
 * <br />
 * Carries out a number of initialisation tasks to get Zikula up and
 * running.
 *
 * @returns bool true initialisation successful false otherwise
 */
function pnInit($stages = PN_CORE_ALL)
{
    static $globalscleansed = false;

    // force register_globals = off
    if ($globalscleansed == false && ini_get('register_globals') && !defined('_PNINSTALLVER')) {
        foreach ($GLOBALS as $s_variable_name => $m_variable_value) {
            if (!in_array($s_variable_name, array('GLOBALS', 'argv', 'argc', '_FILES', '_COOKIE', '_POST', '_GET', '_SERVER', '_ENV', '_SESSION', '_REQUEST', 's_variable_name', 'm_variable_value', '_PNSession'))) {
                unset($GLOBALS[$s_variable_name]);
            }
        }
        unset($GLOBALS['s_variable_name']);
        unset($GLOBALS['m_variable_value']);
        $globalscleansed = true;
    }

    // Neither Smarty nor Zikula itself works with magic_quotes_runtime (not to be confused with magic_quotes_gpc!)
    if (get_magic_quotes_runtime()) {
        die('Sorry, but Zikula does not support PHP magic_quotes_runtime - please disable this feature in your php.ini file.');
    }

    if (!is_numeric($stages)) {
        $stages = PN_CORE_ALL;
    }

    // initialise environment
    if ($stages & PN_CORE_CONFIG) {
        if (!defined('_PNINSTALLVER')) {
            $GLOBALS['PNConfig'] = array();
            $GLOBALS['PNRuntime'] = array();
        }
    }

    // store the load stages in a global so other API's can check whats loaded
    $GLOBALS['loadstages'] = $stages;

    // Hack for some weird PHP systems that should have the
    // LC_* constants defined, but don't
    if (!defined('LC_TIME')) {
        define('LC_TIME', 'LC_TIME');
    }

    // we need this loaded before anything else to access the
    // faster require/include_once functions
    class_exists('Loader') || require 'includes/Loader.class.php';

    // load our core files
    Loader::requireOnce('includes/DataUtil.class.php');
    Loader::requireOnce('includes/pnUser.php');
    Loader::requireOnce('includes/pnMod.php');
    Loader::loadClass('CacheUtil');
    Loader::loadClass('SessionUtil');
    Loader::requireOnce('includes/pnSecurity.php');
    Loader::requireOnce('includes/legacy/Compat.php');
    Loader::requireOnce('includes/ZLanguageAliases.php');
    Loader::requireOnce('includes/Gettext.php');
    Loader::requireOnce('includes/StreamReader.php');
    Loader::requireOnce('includes/MO.php');
    Loader::requireOnce('includes/ZLanguage.php');
    Loader::requireOnce('includes/ZLanguageBrowser.php');
    Loader::requireOnce('includes/ZI18n.php');
    Loader::requireOnce('includes/ZLocale.php');
    Loader::requireOnce('includes/LanguageUtil.class.php');
    Loader::loadClass('PageUtil');
    Loader::requireOnce('includes/pnRender.class.php');
    // the next include independent from the rest of the pnobjlib
    Loader::loadClass('StringUtil');

    if ($stages & PN_CORE_THEME) {
        Loader::requireOnce('includes/pnBlocks.php');
        Loader::loadClass('ThemeUtil');
        // include old pnTheme.php for backwards compatibility
        // To Do: Decide when to remove this
        Loader::requireOnce('includes/pnTheme.php');
        Loader::requireOnce('includes/pnTheme.class.php');
    }

    // Initialise and load configuration
    if ($stages & PN_CORE_CONFIG) {
        Loader::requireOnce('config/config.php');
        if (defined('_PNINSTALLVER')) {
            $GLOBALS['PNConfig']['System']['PN_CONFIG_USE_OBJECT_ATTRIBUTION'] = false;
            $GLOBALS['PNConfig']['System']['PN_CONFIG_USE_OBJECT_LOGGING'] = false;
            $GLOBALS['PNConfig']['System']['PN_CONFIG_USE_OBJECT_META'] = false;
        }
        if (!isset($GLOBALS['PNConfig']['Multisites'])) {
            $GLOBALS['PNConfig']['Multisites'] = array();
            $GLOBALS['PNConfig']['Multisites']['multi'] = 0;
        }
    }

    // Initialize the (ugly) additional header array
    $GLOBALS['additional_header'] = array();

    /**
     * schemas - holds all component/instance schemas
     * Should wrap this in a static one day, but the information
     * isn't critical so we'll do it later
     */
    $GLOBALS['schemas'] = array();

    // Check that Zikula is installed before continuing
    if (pnConfigGetVar('installed') == 0 && !defined('_PNINSTALLVER')) {
        header('HTTP/1.1 503 Service Unavailable');
        if (file_exists('config/templates/notinstalled.htm')) {
            Loader::requireOnce('config/templates/notinstalled.htm');
        } else {
            Loader::requireOnce('includes/templates/notinstalled.htm');
        }
        pnShutDown();
    }

    if ($stages & PN_CORE_ADODB) {
        // load ADODB
        pnADODBInit();
    }

    if ($stages & PN_CORE_OBJECTLAYER) {
        Loader::requireOnce('includes/pnobjlib_globals.inc');
        Loader::loadClass('LogUtil');
        Loader::requireOnce('includes/debug.php');
        Loader::loadClass('DBConnectionStack');
        Loader::loadClass('ObjectUtil');
        Loader::loadClass('DBUtil');
        Loader::loadClass('RandomUtil');
        Loader::loadClass('DateUtil');
        Loader::loadClass('PNObject');
        Loader::loadClass('PNObjectArray');
        Loader::loadClass('FormUtil');
        Loader::loadClass('SecurityUtil');
        Loader::loadClass('CookieUtil');
        Loader::loadClass('WorkflowUtil');
    }

    if ($stages & PN_CORE_DB) {
        // Connect to database
        if (!pnDBInit()) {
            if (!defined('_PNINSTALLVER')) {
                header('HTTP/1.1 503 Service Unavailable');
                if (file_exists('config/templates/dbconnectionerror.htm')) {
                    Loader::requireOnce('config/templates/dbconnectionerror.htm');
                } else {
                    Loader::requireOnce('includes/templates/dbconnectionerror.htm');
                }
                pnShutDown();
            } else {
                return false;
            }
        }
    }

    if ($stages & PN_CORE_TABLES) {
        // Initialise and load pntables
        pnDBSetTables();
        // ensure that the base modules info is available
        pnModDBInfoLoad('Modules', 'Modules');
        pnModDBInfoLoad('Theme', 'Theme');
        pnModDBInfoLoad('Users', 'Users');
        pnModDBInfoLoad('Groups', 'Groups');
        pnModDBInfoLoad('Permissions', 'Permissions');
        // load core module vars
        pnModInitCoreVars();
        // if we've got this far an error handler can come into play
        // (except in the installer)
        if (!defined('_PNINSTALLVER')) {
            set_error_handler('pnErrorHandler');
        }
    }

    if ($stages & PN_CORE_SESSIONS) {
        // Other includes
        // ensure that the sesssions table info is available
        pnModDBInfoLoad('Users', 'Users');
        $anonymoussessions = pnConfigGetVar('anonymoussessions');
        if ($anonymoussessions == '1' || !empty($_COOKIE[SessionUtil::getCookieName()])) {
            // we need to create a session for guests as configured or
            // a cookie exists which means we have been here before
            // Start session
            SessionUtil::requireSession();

            // Auto-login via HTTP(S) REMOTE_USER property
            if (pnConfigGetVar('session_http_login') && !pnUserLoggedIn()) {
                pnUserLogInHTTP();
            }
        }

        // If enabled and logged in, save login name of user in Apache session variable for Apache logs
        if (isset($GLOBALS['PNConfig']['Log']['log_apache_uname']) && pnUserLoggedIn() ) {
            if (function_exists('apache_setenv')) {
                apache_setenv('Zikula-Username', pnUserGetVar('uname'));
            }
        }
    }

    // Have to load in this order specifically since we cant setup the languages until we've decoded the URL if required (drak)
    // start block
    if ($stages & PN_CORE_LANGS) {
        $lang = & ZLanguage::getInstance();
    }

    if ($stages & PN_CORE_DECODEURLS) {
        pnQueryStringDecode();
    }

    if ($stages & PN_CORE_LANGS) {
        $lang->setup();
    }
    // end block

    // perform some checks that might result in a die() upon failure when we are in development mode
    _development_checks();

    if ($stages & PN_CORE_MODS) {
        // Set compression on if desired
        if (pnConfigGetVar('UseCompression') == 1) {
            ob_start("ob_gzhandler");
        }

        // New pnAnticracker code needs to be after pnMod as it's now a module - markwest
        // Cross-Site Scripting attack defense - Sent by larsneo
        // some syntax checking against injected javascript
        if (pnModAvailable('SecurityCenter') && pnConfigGetVar('enableanticracker') == 1 && pnModAPILoad('SecurityCenter', 'user')) {
            pnModAPIFunc('SecurityCenter', 'user', 'secureinput');
        }
    }

    if ($stages & PN_CORE_TOOLS) {
        Loader::requireOnce('includes/pnHTML.php');
    }

    if ($stages & PN_CORE_AJAX) {
        Loader::loadClass('AjaxUtil');
    }

    if ($stages & PN_CORE_MODS) {
        // Legacy includes
        if (pnConfigGetVar('loadlegacy') == '1') {
            Loader::requireOnce('includes/legacy/legacy.php');
            Loader::requireOnce('includes/legacy/queryutil.php');
            Loader::requireOnce('includes/legacy/xhtml.php');
            Loader::requireOnce('includes/legacy/oldfuncs.php');
        }
    }

    if ($stages & PN_CORE_THEME) {
        // register default page vars
        PageUtil::registerVar('title');
        PageUtil::registerVar('description', false, pnConfigGetVar('slogan'));
        PageUtil::registerVar('keywords', true);
        PageUtil::registerVar('stylesheet', true);
        PageUtil::registerVar('javascript', true);
        PageUtil::registerVar('body', true);
        PageUtil::registerVar('rawtext', true);
        PageUtil::registerVar('footer', true);
        // Load the theme
        ThemeUtil::load(pnUserGetTheme(true));

        // clickjack protection
        header('X-Frames-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1');
    }

    // check the users status, if not 1 then log him out
    if (pnUserLoggedIn()) {
        $userstatus = pnUserGetVar('activated');
        if ($userstatus != 1) {
            pnUserLogOut();
            LogUtil::registerStatus(_LOGOUTFORCED);
            $params = ($userstatus == 2) ? array('confirmtou' => 1) : array();
            pnRedirect(pnModURL('Users', 'user', 'loginscreen', $params));
        }
    }

    if (!defined('_PNINSTALLVER')) {
        // call system init hooks
        $systeminithooks = FormUtil::getPassedValue('systeminithooks', 'yes', 'GETPOST');
        if (SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN) && (isset($systeminithooks) && $systeminithooks == 'no')) {
            // omit system hooks if requested by an administrator
        } else {
            pnModCallHooks('zikula', 'systeminit', 0, array('module' => 'zikula'));

            // reset the render domain - system init hooks mess the translation domain for the core
            $render = &pnRender::getInstance();
            $render->renderDomain = null;
        }
    }

    // remove log files being too old
    LogUtil::_cleanLogFiles();

    return true;
}

/**
 * Initialise DB connection
 * @return bool true if successful, false otherwise
 */
function pnDBInit()
{
    return DBConnectionStack::init();
}

/**
 * get a list of database connections
 *
 * @author Eric Barr
 * @copyright Copyright (c) 2003 Envolution; Eric Barr. All rights reserved.
 * @author Roger Raymond
 * @param bool $pass_by_reference default = false
 * @param string $fetchmode set ADODB fetchmode ADODB_FETCH_NUM, ADODB_FETCH_ASSOC, ADODB_FETCH_DEFAULT, ADODB_FETCH_BOTH
 * @return array array of database connections
 */
function pnDBGetConn($pass_by_reference = false, $fetchmode = ADODB_FETCH_NUM)
{
    $ret = DBConnectionStack::getConnection($fetchmode);

    // If $pass_by_reference is true, return a reference to the dbconn object
    if ($pass_by_reference == true) {
        return $ret;
    }

    $dbconn = array($ret);
    return $dbconn;
}

/**
 * get a list of database tables
 *
 * @author Eric Barr
 * @copyright Copyright (c) 2003 Envolution; Eric Barr. All rights reserved.
 * @author Roger Raymond
 * @return array array of database tables
 */
function pnDBGetTables()
{
    return $GLOBALS['pntables'];
}

/**
 * get a list of dbms specific table options
 *
 * For use by ADODB's data dictionary
 * Additional database specific settings can be defined here
 * See ADODB's data dictionary docs for full details
 *
 * @author Mark West
 * @since v1.93
 * @param $tablename (optional) if tablename and there is a set of options configured
 * for this table via pntable.php then this  we're returning these options, the default options are returned otherwise
 */
function pnDBGetTableOptions($tablename = '')
{
    if ($tablename != '') {
        $pntables = pnDBGetTables();
        if (isset($pntables[$tablename . '_def'])) {
            return $pntables[$tablename . '_def'];
        }
    }
    static $tableoptions;

    if (!isset($tableoptions)) {
        // for mysql we need to get the the version to act on
        // and the table type (myisam/innodb)
        $serverinfo = DBUtil::serverInfo();
        $dbtype = DBConnectionStack::getConnectionDBType();

        switch ($dbtype) {
            case 'mysql':
            case 'mysqli':
                $type = pnConfigGetVar('tabletype');
                if (!isset($type) || empty($type))
                    $type = 'MyISAM';
                if (substr($serverinfo['version'], 0, 3) == '3.2') {
                    $tableoptions = array('mysql' => 'type = ' . $type);
                } else {
                    $tableoptions = array('mysql' => 'engine = ' . $type);
                }
                break;
            default :
                $tableoptions = array();
        }
    }

    return $tableoptions;
}

/**
 * Set Database Table Listing
 *
 * @desc        Creates the database table listing if it hasn't been created yet
 *              and merges new table listings into the master list.
 * @author Eric Barr
 * @copyright Copyright (c) 2003 Envolution; Eric Barr. All rights reserved.
 * @access      public
 * @param       array $newtables
 * @return      void
 */
function pnDBSetTables()
{
    // Create a static var to hold the database table listing
    static $pntables;

    // If the table listing doesn't exist create it with the input array
    $pntable = array();
    if (!is_array($pntables)) {
        if (file_exists('pntables')) {
            Loader::requireOnce('pntables.php');
        }
    }

    // Set the pntables in the global listing for pnDBGetTables to have access to
    $GLOBALS['pntables'] = $pntable;
    return;
}

/**
 * get table prefix
 *
 * get's the database prefix for the current site
 *
 * In a non multisite scenario this will be the 'prefix' config var
 * from config/config.php. For a multisite configuration the multistes
 * module will manage the prefixes for a given table
 *
 * The table name parameter is the table name to get the prefix for
 * minus the prefix and seperating _
 * e.g. pnDBGetPrefix returns pn_modules for pnDBGetPrefix('modules');
 *
 * @param table - table name
 * @author Mark West
 * @since 1.103
 */
function pnDBGetTablePrefix($table)
{
    if (!isset($table)) {
        return false;
    }

    return pnConfigGetVar('prefix');
}

/**
 * clean user input
 *
 * Gets a global variable, cleaning it up to try to ensure that
 * hack attacks don't work
 *
 * @deprecated
 * @see FormUtil::getPassedValues
 * @param var $ name of variable to get
 * @param  $ ...
 *
 * @return mixed prepared variable if only one variable passed
 * in, otherwise an array of prepared variables
 */
function pnVarCleanFromInput()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnVarCleanFromInput()', 'FormUtil::getPassedValue()')), 'STRICT');

    $vars = func_get_args();
    $resarray = array();
    foreach ($vars as $var) {
        $resarray[] = FormUtil::getPassedValue($var);
    }

    if (func_num_args() == 1) {
        return $resarray[0];
    }

    return $resarray;
}

/**
 * strip slashes
 *
 * stripslashes on multidimensional arrays.
 * Used in conjunction with pnVarCleanFromInput
 *
 * @access private
 * @param any $ variables or arrays to be stripslashed
 */
function pnStripslashes(&$value)
{
    if (empty($value)) {
        return;
    }

    if (!is_array($value)) {
        $value = stripslashes($value);
    } else {
        array_walk($value, 'pnStripslashes');
    }
}

/**
 * ready user output
 *
 * Gets a variable, cleaning it up such that the text is
 * shown exactly as expected
 *
 * @deprecated
 * @see DataUtil::formatForDisplay
 * @param var $ variable to prepare
 * @param  $ ...
 * @return mixed prepared variable if only one variable passed
 * in, otherwise an array of prepared variables
 */
function pnVarPrepForDisplay()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnVarPrepForDisplay()', 'DataUtil::formatForDisplay()')), 'STRICT');

    $resarray = array();
    $ourvars = func_get_args();
    foreach ($ourvars as $ourvar) {
        $resarray[] = DataUtil::formatForDisplay($ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    } else {
        return $resarray;
    }
}

/**
 * ready HTML output
 *
 * Gets a variable, cleaning it up such that the text is
 * shown exactly as expected, except for allowed HTML tags which
 * are allowed through
 * @author Xaraya development team
 *
 * @deprecated
 * @see DataUtil::formatForDisplayHTML
 * @param var variable to prepare
 * @param ...
 * @return string/array prepared variable if only one variable passed
 * in, otherwise an array of prepared variables
 */
function pnVarPrepHTMLDisplay()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnVarPrepHTMLDisplay()', 'DataUtil::formatForDisplayHTML()')), 'STRICT');

    $resarray = array();
    $ourvars = func_get_args();
    foreach ($ourvars as $ourvar) {
        $resarray[] = DataUtil::formatForDisplayHTML($ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    }

    return $resarray;
}

/**
 * ready database output
 *
 * Gets a variable, cleaning it up such that the text is
 * stored in a database exactly as expected
 *
 * @deprecated
 * @see DataUtil::formatForStore()
 * @param var $ variable to prepare
 * @param  $ ...
 * @return mixed prepared variable if only one variable passed
 * in, otherwise an array of prepared variables
 */
function pnVarPrepForStore()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnVarPrepForStore()', 'DataUtil::formatForStore()')), 'STRICT');

    $resarray = array();
    $ourvars = func_get_args();
    foreach ($ourvars as $ourvar) {
        $resarray[] = DataUtil::formatForStore($ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    }

    return $resarray;
}

/**
 * ready operating system output
 *
 * Gets a variable, cleaning it up such that any attempts
 * to access files outside of the scope of the Zikula
 * system is not allowed.
 *
 * @deprecated
 * @see DataUtil::formatForOS()
 * @param var $ variable to prepare
 * @param  $ ...
 * @return mixed prepared variable if only one variable passed
 * in, otherwise an array of prepared variables
 **/
function pnVarPrepForOS()
{
    LogUtil::log(__f('Warning! Function %1$s is deprecated. Please use %2$s instead.', array('pnVarPrepForOS()', 'DataUtil::formatForOS()')), 'STRICT');

    $resarray = array();

    $ourvars = func_get_args();
    foreach ($ourvars as $ourvar) {
        $resarray[] = DataUtil::formatForOS($ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    }

    return $resarray;
}

/**
 * remove censored words
 */
function pnVarCensor()
{
    LogUtil::log(__f('Error! The \'pnVarCensor\' function used in \'%s\' is deprecated. Instead, please activate the \'MultiHook\' for this module.', DataUtil::formatForDisplay(pnModGetName())));

    $resarray = array();
    $ourvars = func_get_args();
    foreach ($ourvars as $ourvar) {
        $resarray[] = DataUtil::censor($ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    }

    return $resarray;
}

/**
 * validate a zikula variable
 *
 * @access public
 * @author Damien Bonvillain
 * @author Gregor J. Rothfuss
 * @author J�rg Napp
 * @since 1.23 - 2002/02/01
 * @param $var   the variable to validate
 * @param $type  the type of the validation to perform (email, url etc.)
 * @param $args  optional array with validation-specific settings (never used...)
 * @return bool true if the validation was successful, false otherwise
 */
function pnVarValidate($var, $type, $args = 0)
{
    if (!isset($var) || !isset($type)) {
        return false;
    }

    // typecasting (might be useless in this function)
    $var = (string) $var;
    $type = (string) $type;

    static $maxlength = array('modvar' => 64, 'func' => 512, 'api' => 187, 'theme' => 200, 'uname' => 25, 'config' => 64);

    static $minlength = array('mod' => 1, 'modvar' => 1, 'uname' => 1, 'config' => 1);

    // Determine if PCRE Unicode property support is enabled. If the PCRE library used by PHP was not compiled with
    // the '--enable-unicode-properties' option, then the \p{...} pattern will fail with an error.
    static $pcreUnicodePropertiesEnabled;
    if (!isset($pcreUnicodePropertiesEnabled)) {
        $isEnabled = @preg_match('/^[\p{L}]+$/u', 'TheseAreLetters');
        $pcreUnicodePropertiesEnabled = isset($isEnabled) && (bool)$isEnabled;
    }

    // commented out some regexps until some useful and working ones are found
    static $regexp = array(// 'mod'    => '/^[^\\\/\?\*\"\'\>\<\:\|]*$/',
// 'func'   => '/[^0-9a-zA-Z_]/',
    // 'api'    => '/[^0-9a-zA-Z_]/',
    // 'theme'  => '/^[^\\\/\?\*\"\'\>\<\:\|]*$/',
    'email' => '/^(?:[^\s\000-\037\177\(\)<>@,;:\\"\[\]]\.?)+@(?:[^\s\000-\037\177\(\)<>@,;:\\\"\[\]]\.?)+\.[a-z]{2,6}$/Ui',
            'url' => '/^([!#\$\046-\073=\077-\132_\141-\172~]|(?:%[a-f0-9]{2}))+$/i');

    // special cases
    if ($type == 'mod' && $var == '/PNConfig') {
        return true;
    }

    if ($type == 'config' && ($var == 'dbtype') || ($var == 'dbhost') || ($var == 'dbuname') || ($var == 'dbpass') || ($var == 'dbname') || ($var == 'system') || ($var == 'prefix') || ($var == 'encoded')) {
        // The database parameter are not allowed to change
        return false;
    }

    if ($type == 'email' || $type == 'url') {
        // CSRF protection for email and url
        $var = str_replace(array('\r', '\n', '%0d', '%0a'), '', $var);

        if (pnConfigGetVar('idnnames') == 1) {
            // transfer between the encoded (Punycode) notation and the decoded (8bit) notation.
            Loader::requireOnce('includes/classes/SimplePie/idn/idna_convert.class.php');
            $IDN = new idna_convert();
            $var = $IDN->encode(DataUtil::convertToUTF8($var));
        }
        // all characters must be 7 bit ascii
        $length = strlen($var);
        $idx = 0;
        while ($length--) {
            $c = $var[$idx++];
            if (ord($c) > 127) {
                return false;
            }
        }
    }

    if ($type == 'url') {
        // check for url
        $url_array = @parse_url($var);
        if (!empty($url_array) && empty($url_array['scheme'])) {
            return false;
        }
    }

    if ($type == 'uname') {
        // check for invalid characters
        if ($pcreUnicodePropertiesEnabled) {
            // Use PCRE's Unicode property support for the best possible support for i18n.
            // NOTE: Ensure that this pattern and the pattern in the else case below are both equivalent!
            //          \p{L} = Letters
            //          \p{N} = Numbers
            //          _ = underscore
            //          \. = period
            //          \- = dash
            if (preg_match('/[^\p{L}\p{N}_\.\-]/u', $var)) {
                return false;
            }
        } else {
            // PCRE's Unicode property support is not enabled. Fall back to a less accurate check that is locale dependent.
            // NOTE: Ensure that this pattern and the pattern in the if case above are both equivalent!
            //          \w = "Word" character, including letters, numbers and underscore (_) -- locale dependent
            //          \. = period
            //          \- = dash
            if (preg_match('/[^\w\.\-]/u', $var)) {
                return false;
            }
        }
    }

    // variable passed special checks. We now to generic checkings.


    // check for maximal length
    if (isset($maxlength[$type]) && mb_strlen($var) > $maxlength[$type]) {
        return false;
    }

    // check for minimal length
    if (isset($minlength[$type]) && mb_strlen($var) < $minlength[$type]) {
        return false;
    }

    // check for regular expression
    if (isset($regexp[$type]) && !preg_match($regexp[$type], $var)) {
        return false;
    }

    // all tests for illegal entries failed, so we assume the var is ok ;-)
    return true;
}

/**
 * get status message from previous operation
 *
 * Obtains any status message, and also destroys
 * it from the session to prevent duplication
 *
 *
 * @deprecated
 * @see Logutil.class.php
 * @return string the status message
 */
function pnGetStatusMsg()
{
    $msgStatus = SessionUtil::getVar('_PNStatusMsg');
    SessionUtil::delVar('_PNStatusMsg');
    $msgError = SessionUtil::getVar('_PNErrorMsg');
    SessionUtil::delVar('_PNErrorMsg');
    // Error message overrides status message
    if (!empty($msgError)) {
        $msgStatus = $msgError;
    }

    return $msgStatus;
}

/**
 * get base URI for Zikula
 *
 * @author Martin Andersen
 * @return string base URI for Zikula
 */
function pnGetBaseURI()
{
    static $path;

    if (!isset($path)) {
        $path = pnServerGetVar('SCRIPT_NAME');
        $path = str_replace(strrchr($path, '/'), '', $path);
    }
    if($GLOBALS['PNConfig']['Multisites']['multi'] == 1) {
        $path = $GLOBALS['PNConfig']['Multisites']['siteDNS'];
    }
    return $path;
}

/**
 * get base URL for Zikula
 *
 * @return string base URL for Zikula
 */
function pnGetBaseURL()
{
    $server = pnServerGetVar('HTTP_HOST');

    // IIS sets HTTPS=off
    $https = pnServerGetVar('HTTPS', 'off');
    if ($https != 'off') {
        $proto = 'https://';
    } else {
        $proto = 'http://';
    }

    $path = pnGetBaseURI();

    return "$proto$server$path/";
}

/**
 * get homepage URL for Zikula
 *
 * @return string homepage URL for Zikula
 */
function pnGetHomepageURL()
{
    // check the use of friendly url setup
    $shorturls = pnConfigGetVar('shorturls', false);
    $dirBased = (pnConfigGetVar('shorturlstype') == 0 ? true : false);

    if ($shorturls && $dirBased) {
        $result = pnGetBaseURL().pnConfigGetVar('entrypoint', 'index.php');
    } else {
        $result = pnConfigGetVar('entrypoint', 'index.php');
    }
    if (ZLanguage::isRequiredLangParam()) {
        $result .= '?lang='.ZLanguage::getLanguageCode();
    }

    return $result;
}

/**
 * Carry out a redirect
 *
 * @param string $redirecturl URL to redirect to
 * @param array $addtionalheaders array of header strings to send with redirect
 * @returns bool true if redirect successful, false otherwise
 */
function pnRedirect($redirecturl, $additionalheaders = array())
{
    // very basic input validation against HTTP response splitting
    $redirecturl = str_replace(array('\r', '\n', '%0d', '%0a'), '', $redirecturl);

    // check if the headers have already been sent
    if (headers_sent()) {
        return false;
    }

    // Always close session before redirect
    session_write_close();

    // add any additional headers supplied
    if (!empty($additionalheaders)) {
        foreach ($additionalheaders as $additionalheader) {
            header($additionalheader);
        }
    }

    if (preg_match('!^(?:http|https|ftp|ftps):\/\/!', $redirecturl)) {
        // Absolute URL - simple redirect
    } elseif (substr($redirecturl, 0, 1) == '/') {
        // Root-relative links
        $redirecturl = 'http' . (pnServerGetVar('HTTPS') == 'on' ? 's' : '') . '://' . pnServerGetVar('HTTP_HOST') . $redirecturl;
    } else {
        // Relative URL
        // Removing leading slashes from redirect url
        $redirecturl = preg_replace('!^/*!', '', $redirecturl);
        // Get base URL and append it to our redirect url
        $baseurl = pnGetBaseURL();
        $redirecturl = $baseurl . $redirecturl;
    }
    header("Location: $redirecturl");
    return true;
}

/**
 * check to see if this is a local referral
 *
 * @param bool strict - strict checking ensures that a referer must be set as well as local
 * @return bool true if locally referred, false if not
 */
function pnLocalReferer($strict = false)
{
    $server = pnServerGetVar('HTTP_HOST');
    $referer = pnServerGetVar('HTTP_REFERER');

    // an empty referer returns true unless strict checking is enabled
    if (!$strict && empty($referer)) {
        return true;
    }
    // check the http referer
    if (preg_match("!^https?://$server/!", $referer)) {
        return true;
    }

    return false;
}

// Hack - we need this for themes, but will get rid of it soon
if (!function_exists('GetUserTime')) {
    /**
     * get a Time String in the right format
     *
     *
     * @param time $ - prefix string
     * @return mixed string if successfull, false if not
     */
    function GetUserTime($time)
    {
        if (empty($time)) {
            return;
        }

        if (pnUserLoggedIn()) {
            $time += (pnUserGetVar(pnUserDynamicAlias('timezone_offset')) - pnConfigGetVar('timezone_server')) * 3600;
        } else {
            $time += (pnConfigGetVar('timezone_offset') - pnConfigGetVar('timezone_server')) * 3600;
        }

        return ($time);
    }
}

/**
 * send an email
 *
 * e-mail messages should now be send with a pnModAPIFunc call to the mailer module
 *
 * @deprecated
 * @param to $ - recipient of the email
 * @param subject $ - title of the email
 * @param message $ - body of the email
 * @param headers $ - extra headers for the email
 * @param html $ - message is html formatted
 * @param debug $ - if 1, echo mail content
 * @return bool true if the email was sent, false if not
 */
function pnMail($to, $subject, $message = '', $headers = '', $html = 0, $debug = 0)
{
    if (empty($to) || !isset($subject)) {
        return false;
    }

    // set initial return value until we know we have a valid return
    $return = false;

    // check if the mailer module is availble and if so call the API
    if ((pnModAvailable('Mailer')) && (pnModAPILoad('Mailer', 'user'))) {
        $return = pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $to, 'subject' => $subject, 'headers' => $headers, 'body' => $message, 'headers' => $headers, 'html' => $html));
    }

    return $return;
}

/**
 * Function that compares the current php version on the
 * system with the target one
 *
 * Deprecate function reverting to php detecion function
 *
 * @deprecated
 */
function pnPhpVersionCheck($vercheck = '')
{
    $minver = str_replace(".", "", $vercheck);
    $curver = str_replace(".", "", phpversion());

    if ($curver >= $minver) {
        return true;
    } else {
        return false;
    }
}

/**
 * initialise ADODB
 *
 * @return void
 */
function pnADODBInit()
{
    // ADODB configuration
    global $ADODB_CACHE_DIR;
    $ADODB_CACHE_DIR = realpath($GLOBALS['PNConfig']['System']['temp'] . '/adodb');
    if (!defined('ADODB_DIR')) {
        define('ADODB_DIR', getcwd() . '/includes/classes/adodb');
    }
    Loader::requireOnce('includes/classes/adodb/adodb.inc.php');

    // ADODB Error handle
    if ($GLOBALS['PNConfig']['Debug']['sql_adodb']) {
        Loader::requireOnce('includes/classes/adodb/adodb-errorhandler.inc.php');
    }

    // decode encoded new DB parameters
    $ak = array_keys($GLOBALS['PNConfig']['DBInfo']);
    foreach ($ak as $key) {
        if ($GLOBALS['PNConfig']['DBInfo'][$key]['encoded']) {
            $GLOBALS['PNConfig']['DBInfo'][$key]['dbuname'] = base64_decode($GLOBALS['PNConfig']['DBInfo'][$key]['dbuname']);
            $GLOBALS['PNConfig']['DBInfo'][$key]['dbpass'] = base64_decode($GLOBALS['PNConfig']['DBInfo'][$key]['dbpass']);
            $GLOBALS['PNConfig']['DBInfo'][$key]['encoded'] = 0;
        }
    }

    // TODO C [do we need to remove anything from config.php?] (drak)
    // debugger if required
    if ($GLOBALS['PNConfig']['Debug']['debug']) {
        $GLOBALS['PNRuntime']['debug_sqlcalls'] = 0;
    }

    // initialise time to render
    if ($GLOBALS['PNConfig']['Debug']['pagerendertime']) {
        $mtime = explode(' ', microtime());
        $GLOBALS['PNRuntime']['dbg_starttime'] = $mtime[1] + $mtime[0];
    }
}

/**
 * Gets a server variable
 *
 * Returns the value of $name from $_SERVER array.
 * Accepted values for $name are exactly the ones described by the
 * {@link http://www.php.net/manual/en/reserved.variables.html#reserved.variables.server PHP manual}.
 * If the server variable doesn't exist void is returned.
 *
 * @author Marco Canini <marco@xaraya.com>, Michel Dalle
 * @access public
 * @param name string the name of the variable
 * @param default the default value to return if the requested param is not set
 * @return mixed value of the variable
 */
function pnServerGetVar($name, $default = null)
{
    // Check the relevant superglobals
    if (!empty($name) && isset($_SERVER[$name])) {
        return $_SERVER[$name];
    }
    return $default; // nothing found -> return default
}

/**
 * Gets the host name
 *
 * Returns the server host name fetched from HTTP headers when possible.
 * The host name is in the canonical form (host + : + port) when the port is different than 80.
 *
 * @author Marco Canini <marco@xaraya.com>
 * @access public
 * @return string HTTP host name
 */
function pnGetHost()
{
    $server = pnServerGetVar('HTTP_HOST');
    if (empty($server)) {
        // HTTP_HOST is reliable only for HTTP 1.1
        $server = pnServerGetVar('SERVER_NAME');
        $port = pnServerGetVar('SERVER_PORT');
        if ($port != '80')
            $server .= ":$port";
    }
    return $server;
}

/**
 * Get current URI (and optionally add/replace some parameters)
 *
 * @access public
 * @param args array additional parameters to be added to/replaced in the URI (e.g. theme, ...)
 * @return string current URI
 */
function pnGetCurrentURI($args = array())
{
    // get current URI
    $request = pnServerGetVar('REQUEST_URI');

    if (empty($request)) {
        // adapted patch from Chris van de Steeg for IIS
        // TODO: please test this :)
        $scriptname = pnServerGetVar('SCRIPT_NAME');
        $pathinfo = pnServerGetVar('PATH_INFO');
        if ($pathinfo == $scriptname) {
            $pathinfo = '';
        }
        if (!empty($scriptname)) {
            $request = $scriptname . $pathinfo;
            $querystring = pnServerGetVar('QUERY_STRING');
            if (!empty($querystring))
                $request .= '?' . $querystring;
        } else {
            $request = '/';
        }
    }

    // add optional parameters
    if (count($args) > 0) {
        if (strpos($request, '?') === false)
            $request .= '?';
        else
            $request .= '&';

        foreach ($args as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $l => $w) {
                    // TODO: replace in-line here too ?
                    if (!empty($w))
                        $request .= $k . "[$l]=$w&";
                }
            } else {
                // if this parameter is already in the query string...
                if (preg_match("/(&|\?)($k=[^&]*)/", $request, $matches)) {
                    $find = $matches[2];
                    // ... replace it in-line if it's not empty
                    if (!empty($v)) {
                        $request = preg_replace("/(&|\?)$find/", "$1$k=$v", $request);

                    // ... or remove it otherwise
                    } elseif ($matches[1] == '?') {
                        $request = preg_replace("/\?$find(&|)/", '?', $request);
                    } else {
                        $request = preg_replace("/&$find/", '', $request);
                    }
                } elseif (!empty($v)) {
                    $request .= "$k=$v&";
                }
            }
        }

        $request = substr($request, 0, -1);
    }

    return $request;
}

/**
 * Gets the current protocol
 *
 * Returns the HTTP protocol used by current connection, it could be 'http' or 'https'.
 *
 * @author Marco Canini <marco@xaraya.com>
 * @access public
 * @return string current HTTP protocol
 */
function pnServerGetProtocol()
{
    if (preg_match('/^http:/', pnGetCurrentURI())) {
        return 'http';
    }
    $HTTPS = pnServerGetVar('HTTPS');
    // IIS seems to set HTTPS = off for some reason
    return (!empty($HTTPS) && $HTTPS != 'off') ? 'https' : 'http';
}

/**
 * Get current URL
 *
 * @access public
 * @param args array additional parameters to be added to/replaced in the URL (e.g. theme, ...)
 * @return string current URL
 * @todo cfr. BaseURI() for other possible ways, or try PHP_SELF
 */
function pnGetCurrentURL($args = array())
{
    $server = pnGetHost();
    $protocol = pnServerGetProtocol();
    $baseurl = "$protocol://$server";
    $request = pnGetCurrentURI($args);

    if (empty($request)) {
        // adapted patch from Chris van de Steeg for IIS
        // TODO: please test this :)
        $scriptname = pnServerGetVar('SCRIPT_NAME');
        $pathinfo = pnServerGetVar('PATH_INFO');
        if ($pathinfo == $scriptname) {
            $pathinfo = '';
        }
        if (!empty($scriptname)) {
            $request = $scriptname . $pathinfo;
            $querystring = pnServerGetVar('QUERY_STRING');
            if (!empty($querystring))
                $request .= '?' . $querystring;
        } else {
            $request = '/';
        }
    }

    return $baseurl . $request;
}

/**
 * Decode the path string into a set of variable/value pairs
 * available via pnVarCleanFromInput or the object libary
 *
 * This API works in conjunction with the new short urls
 * system to extract a path based variable set into the Get, Post
 * and request superglobals.
 * A sample path is /modname/function/var1:value1
 *
 * @author Martin Andersen
 * @author Mark West
 * @access private
 */
function pnQueryStringDecode()
{
    if (defined('_PNINSTALLVER')) {
        return;
    }

    // get our base parameters to work out if we need to decode the url
    $module = FormUtil::getPassedValue('module', null, 'GETPOST');
    $func = FormUtil::getPassedValue('func', null, 'GETPOST');
    $type = FormUtil::getPassedValue('type', null, 'GETPOST');

    // check if we need to decode the url
    if ((pnConfigGetVar('shorturls') && pnConfigGetVar('shorturlstype') == 0 && (empty($module) && empty($type) && empty($func)))) {
        // define our site entry points
        $customentrypoint = pnConfigGetVar('entrypoint');
        $root = empty($customentrypoint) ? 'index.php' : $customentrypoint;
        $tobestripped = array("/$root", '/admin.php', '/user.php', '/modules.php', '/backend.php', '/print.php', '/error.php', pnGetBaseURI());

        // get base path to work out our current url
        $parsedURL = parse_url(pnGetCurrentURI());

        // strip any unwanted content from the provided URL
        $path = str_replace($tobestripped, '', $parsedURL['path']);

        // split the path into a set of argument strings
        $args = explode('/', rtrim($path, '/'));

        // ensure that each argument is properly decoded
        foreach ($args as $k => $v) {
            $args[$k] = urldecode($v);
        }
        // the module is the first argument string
        if (isset($args[1]) && !empty($args[1])) {
            if (ZLanguage::isLangParam($args[1]) && in_array($args[1], ZLanguage::getInstalledLanguages())) {
                pnQueryStringSetVar('lang', $args[1]);
                array_shift($args);
            }

            // first try the first argument as a module
            $modinfo = pnModGetInfo(pnModGetIDFromName($args[1]));
            // if that fails it's a theme
            if (!$modinfo) {
                $themeinfo = ThemeUtil::getInfo(ThemeUtil::getIDFromName($args[1]));
                if ($themeinfo) {
                    pnQueryStringSetVar('theme', $themeinfo['name']);
                    // now shift the vars and continue as before
                    array_shift($args);
                    $modinfo = pnModGetInfo(pnModGetIDFromName($args[1]));
                } else {
                    // add the default module handler into the code
                    $modinfo = pnModGetInfo(pnModGetIDFromName(pnConfigGetVar('shorturlsdefaultmodule')));
                    array_unshift($args, $modinfo['url']);
                }
            }
            if ($modinfo['type'] == 1) {
                pnQueryStringSetVar('name', $modinfo['name']);
                isset($args[2]) ? pnQueryStringSetVar('req', $args[2]) : null;
                $modname = FormUtil::getPassedValue('name', null, 'GETPOST');
            } else {
                pnQueryStringSetVar('module', $modinfo['name']);
                // the function name is the second argument string
                isset($args[2]) ? pnQueryStringSetVar('func', $args[2]) : null;
                $modname = FormUtil::getPassedValue('module', null, 'GETPOST');
            }
        }

        // check if there is a custom url handler for this module
        // if not decode the url using the default handler
        if (isset($modinfo) && $modinfo['type'] != 0 && !pnModAPIFunc($modname, 'user', 'decodeurl', array('vars' => $args))) {
            // any remaining arguments are specific to the module
            $argscount = count($args);
            for($i = 3; $i < $argscount; $i = $i + 2) {
                if (isset($args[$i]))
                    pnQueryStringSetVar($args[$i], urldecode($args[$i + 1]));
            }
        }
    }
}

/**
 * add a variable/value pair into the query string
 * (really the _GET superglobal
 * This API also adds the variable to the _REQUEST superglobal for consistentcy
 *
 * @author Mark West
 * @return bool true if successful, false otherwise
 */
function pnQueryStringSetVar($name, $value)
{
    if (!isset($name)) {
        return;
    }
    // add the variable into the get superglobal
    $res = preg_match('/(.*)\[(.*)\]/i', $name, $match);
    if ($res != 0) {
        // possibly an array entry in the form a[0] or b[c]
        // $match[0] = a[0]
        // $match[1] = a
        // $match[2] = 0
        // this is everything we need to continue to build an array
        if (!isset($_REQUEST[$match[1]])) {
            $_REQUEST[$match[1]] = $_GET[$match[1]] = array();
        }
        $_REQUEST[$match[1]][$match[2]] = $_GET[$match[1]][$match[2]] = $value;
    } else {
        $_REQUEST[$name] = $_GET[$name] = $value;
    }
    return true;
}

/**
 *
 */
function pnErrorHandler($errno, $errstr, $errfile, $errline, $errcontext)
{
    // check for an @ suppression or E_STRICT errors (we're not php 5 only yet!)
    if ($errno == 2048 || error_reporting() == 0 || (defined('E_DEPRECATED') && $errno == E_DEPRECATED)) {
        return;
    }

    static $errorlog, $errorlogtype, $errordisplay, $pntemp;
    if (!isset($errorlogtype)) {
        $errorlog = pnConfigGetVar('errorlog');
        $errorlogtype = pnConfigGetVar('errorlogtype');
        $errordisplay = pnConfigGetVar('errordisplay');
        $pntemp = DataUtil::formatForOS(pnConfigGetVar('temp'), true);
    }

    // What do we want to log?
    // 1 - Log real errors only.  2 - Log everything
    if ($errorlog == 2 || ($errorlog == 1 && ($errno != E_WARNING || $errno != E_NOTICE || $errno != E_USER_WARNING || $errno != E_USER_NOTICE))) {
        // log the error
        $msg = "Zikula Error: $errstr";
        if (SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN)) {
            $request = pnGetCurrentURI();
            $msg .= " in $errfile on line $errline for page $request";
        }
        switch ($errorlogtype) {
            // log to the system log (default php handling....)
            case 0 :
                error_log($msg);
                break;
            // e-mail the error
            case 1 :
                $toaddress = pnConfigGetVar('errormailto');
                $body = pnModFunc('Errors', 'user', 'system', array('type' => $errno, 'message' => $errstr, 'file' => $errfile, 'line' => $errline));
                pnModAPIFunc('Mailer', 'user', 'sendmessage', array('toaddress' => $toaddress, 'toname' => $toaddress, 'subject' => __('Error! Oh! Wow! An \'unidentified system error\' has occurred.'), 'body' => $body));
                break;
            // log a module specific log (based on top level module)
            case 2 :
                $modname = DataUtil::formatForOS(pnModGetName());
                error_log($msg . "\r\n", 3, $pntemp . '/error_logs/' . $modname . '.log');
                break;
            // log to global error log
            case 3 :
                error_log($msg . "\r\n", 3, $pntemp . '/error_logs/error.log');
                break;
        }
    }

    // should we display the error to the user
    if ($errordisplay == 0) {
        return;
    }

    // check if we want to flag up warnings and notices
    if ($errordisplay == 1 && ($errno == E_WARNING || $errno == E_NOTICE || $errno == E_USER_WARNING || $errno == E_USER_NOTICE)) {
        return;
    }

    // clear the output buffer
    while (ob_get_level()) {
        ob_end_clean();
    }

    // display the new output and halt the script
    Loader::includeOnce('header.php');
    header('HTTP/1.0 500 System Error');
    echo pnModFunc('Errors', 'user', 'system', array('type' => $errno, 'message' => $errstr, 'file' => $errfile, 'line' => $errline));
    Loader::includeOnce('footer.php');
    pnShutDown();
}

/**
 * Gracefully shut down the framework (traps all exit and die calls)
 *
 * @author drak
 * @param $exit_param params to pass to the exit function
 * @return none - function halts execution
 *
 */
function pnShutDown($exit_param = '')
{
    // we must deliberately cause the session to close down because if we
    // rely on PHP to do so after an exit is called, the framework gets shutdown
    // by PHP and no longer functions correctly.
    session_write_close();

    // do the exit
    if (empty($exit_param)) {
        exit();
    } else {
        exit($exit_param);
    }
}

/**
 * When in development mode, perform some checks that might result in a die() upon failure
 *
 * TODO D: extend this when needed
 *
 * @private
 * @author landseer
 * @param none
 * @return none - function halts execution if needed
 *
 */
function _development_checks()
{
    if ($GLOBALS['PNConfig']['System']['development'] == 1 && !defined('_PNINSTALLVER')) {
        $die = false;

        // check PHP version, shouldn't be necessary, but....
        if (version_compare(PHP_VERSION, '4.3.0', '>=') == false) {
            echo __f('Error! Stop, please! PHP version 4.3.0 or a newer version is needed. The latest version of PHP 5.x is what is actually recommended. Your server seems to be using version %s.', PHP_VERSION);
            $die = true;
        }

        // token_get_all needed for Smarty
        if (!function_exists('token_get_all')) {
            echo __('Error! Stop, please! The PHP function \'token_get_all()\' is needed, but is not available.');
            $die = true;
        }

        // mb_string is needed too
        if (!function_exists('mb_get_info')) {
            echo __('Error! Stop, please! The \'mbstring\' extension for PHP is needed, but is not available.');
            $die = true;
        }

        // Mailer needs fsockopen()
        if (pnModAvailable('Mailer') && !function_exists('fsockopen')) {
            echo __('Error! The PHP function \'fsockopen()\' is needed within the Zikula mailer module, but is not available.');
            $die = true;
        }

        $temp = DataUtil::formatForOS(pnConfigGetVar('temp'), true) . '/';
        $folders = array($temp,
                         $temp . 'adodb',
                         $temp . 'error_logs',
                         $temp . 'pnRender_compiled',
                         $temp . 'pnRender_cache',
                         $temp . 'Xanthia_compiled',
                         $temp . 'Xanthia_cache');
        if (pnModAvailable('Feeds')) {
            $folders[] = $temp . 'feeds';
        }

        foreach ($folders as $folder) {
            if (!file_exists($folder) || !is_writable($folder)) {
                echo __f('Error! Stop, please! \'%s\' was not found, or else the server does not have write permission for it.', $folder). '<br />';
                $die = true;
            }
        }

        if ($die==true) {
            die('<br /><br />' . __("This message is shown to you, the Administrator, because the system is in development mode (\$PNConfig['System']['development'] = 1; in config/config.php). This helps you to avoid common problems with Zikula."));
        }
    }
}
