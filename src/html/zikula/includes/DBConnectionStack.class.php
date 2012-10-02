<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: DBConnectionStack.class.php 27396 2009-11-04 01:38:04Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @uses stacked connection handler
 * @package Zikula_Core
 */

/**
 * This class maintains a stack of database connections. Getting a connection
 * will always return the connection object which is currently on top of the
 * connections stack (ie: the latest added connection).
 *
 * @package Zikula_Core
 * @subpackage DBConnectionStack
 */
class DBConnectionStack
{
    /**
     * Initialize a DBConnection and place it on the connection stack
     *
     * @param name        The database alias name in the DBInfo configuration array (optional) (default=null which then defaults to 'default')
     *
     * @return string The file name which was loaded
     */
    function init($name = null)
    {
        if (!$name) {
            $name = 'default';
        }

        if (!isset($GLOBALS['PNConfig']['DBInfo'][$name]) || !is_array($GLOBALS['PNConfig']['DBInfo'][$name])) {
            return pn_exit(__f("Error! Invalid connection key '%s'.", $name));
        }

        $count = (isset($GLOBALS['PNRuntime']['DB']) ? count($GLOBALS['PNRuntime']['DB']) : 0);
        if (!defined('_PNINSTALLVER') && $count && $name == $GLOBALS['PNRuntime']['DB'][$count - 1]['name']) {
            return pn_exit(__f("Error! You attempted to initialise the database '%s', which is currently the active database.", $name));
        }

        // Get database parameters
        $dbtype = $GLOBALS['PNConfig']['DBInfo'][$name]['dbtype'];
        $dbhost = $GLOBALS['PNConfig']['DBInfo'][$name]['dbhost'];
        $dbname = $GLOBALS['PNConfig']['DBInfo'][$name]['dbname'];
        $dbuname = $GLOBALS['PNConfig']['DBInfo'][$name]['dbuname'];
        $dbpass = $GLOBALS['PNConfig']['DBInfo'][$name]['dbpass'];
        $pconnect = $GLOBALS['PNConfig']['DBInfo'][$name]['pconnect'];
        $dbcharset = $GLOBALS['PNConfig']['DBInfo'][$name]['dbcharset'];

        // Start connection
        // itevo: /Go; it's more safe to use NConnect instead of Connect because of the following:
        // If you create two connections, but both use the same userid and password, PHP will share the
        // same connection. This can cause problems if the connections are meant to different databases.
        // The solution is to always use different userid's for different databases, or use NConnect().
        // NConnect: Always force a new connection. In contrast, PHP sometimes reuses connections when
        // you use Connect() or PConnect(). Currently works only on mysql (PHP 4.3.0 or later), postgresql
        // and oci8-derived drivers. For other drivers, NConnect() works like Connect().
        // If installer, suppress errors because of installer issues when anon db user isnt available - drak
        $conn = ADONewConnection($dbtype);

        // debug setting for adodb sql
        if (isset($GLOBALS['PNConfig']['Debug']['sql_adodb']) && $GLOBALS['PNConfig']['Debug']['sql_adodb']) {
            $conn->debug = (int) $GLOBALS['PNConfig']['Debug']['sql_adodb'];
        }

        $func = ($pconnect ? 'PConnect' : 'NConnect');
        if (defined('_PNINSTALLVER')) {
            $dbh = @$conn->$func($dbhost, $dbuname, $dbpass, $dbname);
        } else {
            $dbh = $conn->$func($dbhost, $dbuname, $dbpass, $dbname);
        }

        if (!$dbh) {
            return false;
        }

        global $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;

        // force oracle to a consistent date format for comparison methods later on
        $dbdriver = _adodb_getdriver($conn->dataProvider, $conn->databaseType, true);
        if ($dbdriver == 'oci8' || $dbdriver == 'oracle') {
            $res = $conn->Execute("ALTER SESSION SET NLS_TIMESTAMP_FORMAT = 'YYYY-MM-DD HH24:MI:SS'");
            $res = $conn->Execute("ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD HH24:MI:SS'");
        }
        // PN .8: set db to utf8 if defined in config.php and the db is in utf8 - for future versions we need to check for inconsistent charsets (BP)
        if ($dbdriver == 'mysql' || $dbdriver == 'mysqli') {
            if (isset($dbcharset)) {
                $dbcharset = strtolower($dbcharset);
                $curdbcharset = $conn->Execute("SHOW VARIABLES LIKE 'character_set_database'");
                if ($dbcharset == 'utf8' && $curdbcharset->fields[1] == 'utf8') {
                    $conn->Execute('set names utf8');
                }
            }
        }

        $GLOBALS['PNRuntime']['DB'][$count] = $GLOBALS['PNConfig']['DBInfo'][$name];
        $GLOBALS['PNRuntime']['DB'][$count]['alias'] = $name;
        $GLOBALS['PNRuntime']['DB'][$count]['dbconn'] = $conn;
        $GLOBALS['PNRuntime']['DB'][$count]['dbdriver'] = $dbdriver;
        // add the table prefix as this makes integrating other applications easier
        $GLOBALS['PNRuntime']['DB'][$count]['prefix'] = $GLOBALS['PNConfig']['System']['prefix'] . '_';
        return $conn;
    }

    /**
     * Get the DB connection info structure for a connection as defined in config.php.
     * If $field is supplied, the value of the specified field is retuerned, otherwise
     * the entire connection info array is returned.
     *
     * @param  name   the name of the connection info to get. Passing null returns the current (ie: top) connection (optional) (default=null)
     * @param  field  the field of the connection info record to return
     *
     * @return string The connection info array or the specified field value
     */
    function getConnectionInfo($name = null, $field = null)
    {
        $count = (isset($GLOBALS['PNRuntime']['DB']) ? count($GLOBALS['PNRuntime']['DB']) : 0);
        if (!$count) {
            return pn_exit(__('Error! Attempted to get information from an empty connection stack.'));
        }

        if (!$name) {
            $name = $GLOBALS['PNRuntime']['DB'][$count - 1]['alias'];
        }

        if (!isset($GLOBALS['PNConfig']['DBInfo'][$name]) || !is_array($GLOBALS['PNConfig']['DBInfo'][$name])) {
            return pn_exit("Invalid connection key [$name]");
        }

        if ($field) {
            if (isset($GLOBALS['PNRuntime']['DB'][$count - 1][$field])) {
                return $GLOBALS['PNRuntime']['DB'][$count - 1][$field];
            } else {
                return pn_exit(__f("Error! In '%s': an unknown field '%s' was requested.", array('DBConnectionClass::getConnectionInfo', $field)));
            }
        }

        return $GLOBALS['PNRuntime']['DB'][$count - 1];
    }

    /**
     * Get the alias name name of the currently active connection
     *
     * @return string the name of the currently active connection
     */
    function getConnectionName()
    {
        return DBConnectionStack::getConnectionInfo(null, 'alias');
    }

    /**
     * Get the DB Alias name of the currently active connection
     *
     * @return string the dbname of the currently active connection
     */
    function getConnectionDBName()
    {
        return DBConnectionStack::getConnectionInfo(null, 'dbname');
    }

    /**
     * Get the DB Host of the currently active connection
     *
     * @return string the host of the currently active connection
     */
    function getConnectionDBHost()
    {
        return DBConnectionStack::getConnectionInfo(null, 'dbhost');
    }

    /**
     * Get the DB Type of the currently active connection
     *
     * @return string the type of the currently active connection
     */
    function getConnectionDBType()
    {
        return DBConnectionStack::getConnectionInfo(null, 'dbtype');
    }

    /**
     * Get the DB driver of the currently active connection. This is not necessarily the same as the DB Type and
     * should be used to distinguish between different database types in ADODB
     * e.g. both oracle and oci8 use the oci8 driver to load the correct data dictionary include file
     *
     * @return string the driver of the currently active connection
     */
    function getConnectionDBDriver()
    {
        $dbdriver = 'undefined';
        if (defined('_PNINSTALLVER')) {
            // we are installing PN right now so we might not have valid db connection yet
            $conn = pnDBGetConn(true);
            // hello database?
            if ($conn !== false && is_object($conn)) {
                $dbdriver = _adodb_getdriver($conn->dataProvider, $conn->databaseType, true);
            }
        } else {
            $dbdriver = DBConnectionStack::getConnectionInfo(null, 'dbdriver');
        }
        return $dbdriver;
    }

    /**
     * Check whether the current connection is the default one
     *
     * @return boolean whether or not the current connection is the default one
     */
    function isDefaultConnection()
    {
        $name = DBConnectionStack::getConnectionName();
        return (strcmp($name, 'default') == 0);
    }

    /**
     * Get the currently active connection (the connection on top of the connection stack)
     *
     * @param fetchmod        The fetchmode to set for the connection
     *
     * @return the connection object
     */
    function getConnection($fetchmode = ADODB_FETCH_NUM)
    {
        if (!isset($GLOBALS['PNRuntime']['DB']) && defined('_PNINSTALLVER')) {
            return;
        }

        $count = count($GLOBALS['PNRuntime']['DB']);
        if (!$count) {
            if (defined('_PNINSTALLVER')) {
                return;
            } else {
                return pn_exit(__('Error! Attempted to get a connection from an empty stack.'));
            }
        }
        $conn = $GLOBALS['PNRuntime']['DB'][$count - 1]['dbconn'];

        switch ($fetchmode) {
            case ADODB_FETCH_NUM:
                $dbdriver = _adodb_getdriver($conn->dataProvider, $conn->databaseType, true);
                if ($dbdriver == 'postgres') {
                    // RNG: workwound for installer errors / adodb V4.94 pgsql driver bug: see http://phplens.com/lens/lensforum/msgs.php?id=15248&x=1
                    $conn->SetFetchMode(ADODB_FETCH_BOTH);
                } else {
                    $conn->SetFetchMode(ADODB_FETCH_NUM);
                }
                break;
            case ADODB_FETCH_ASSOC:
                $conn->SetFetchMode(ADODB_FETCH_ASSOC);
                break;
            case ADODB_FETCH_DEFAULT:
                $conn->SetFetchMode(ADODB_FETCH_DEFAULT);
                break;
            case ADODB_FETCH_BOTH:
                $conn->SetFetchMode(ADODB_FETCH_BOTH);
                break;
        }

        return $conn;
    }

    /**
     * Push a new database connection onto the connection stack
     *
     * @param name        The database alias name in the DBInfo configuration array
     *
     * @return The database connection
     */
    function pushConnection($name)
    {
        if (DBConnectionStack::init($name)) {
            return DBConnectionStack::getConnection();
        }

        return false;
    }

    /**
     * Pop the currently active connection off the stack.
     *
     * @param close       Whether or not to close the connection (optional) (default=false)
     *
     * @return boolean The newly active connection
     */
    function popConnection($close = false)
    {
        $count = count($GLOBALS['PNRuntime']['DB']);
        if (!$count) {
            return pn_exit(__('Error! Attempted to pop a connection from an empty connection stack.'));
        }

        if ($close) {
            $conn = DBConnectionStack::getConnection();
            $conn->Close();
        }

        unset($GLOBALS['PNRuntime']['DB'][$count - 1]);
        return DBConnectionStack::getConnection();
    }
}
