<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 4 2009-11-09 12:38:09Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Sniffer
 */

/**
 * This function is called directly during installation
 * and is used in the event handler function below
 *
 * @access private
 * @return array of user agent id and client
 */
function sniffer_userapi_sniff($arg)
{
    // include the class
    // Note: When restoring a class from a session variable
    // the class needs to be defined to work properly so we
    // must include the class definition
    $modinfo = pnModGetInfo('Sniffer');
    $modpath = ($modinfo['type'] == 3) ? 'system' : 'modules';
    if (file_exists($file = "$modpath/Sniffer/pnincludes/phpSniff.class.php")) {
        require_once($file);
    } else {
        return false;
    }

    // check we've already worked out the browser info
    $browserinfo = SessionUtil::getVar('browserinfo');
    if (is_string($browserinfo) && is_object(unserialize($browserinfo))) {
        return true;
    } else {
        // sniff process
        $client = new phpSniff();
        SessionUtil::setVar('browserinfo', serialize($client));
        return true;
    }
    return false;
}

/**
 * Get the full browser info object
 *
 * In general the individual API's should be called to determine the
 * browsers functionality. This API is provided for convenience only
 *
 * @return object phpsniff object
 * @access private
 */
function sniffer_userapi_get()
{
    $result = false;
    $browserinfo = SessionUtil::getVar('browserinfo');
    if (is_string($browserinfo) && is_object($info = unserialize($browserinfo))) {
        $result = $info;
    } else {
        $success = pnModAPIFunc('Sniffer', 'user', 'sniff');
        if ($success) {
            $browserinfo = SessionUtil::getVar('browserinfo');
            if (is_string($browserinfo) && is_object($info = unserialize($browserinfo))) {
                $result = $info;
            }
        }
    }
    return $result;
}

/**
 * Get the value of a defined property of the browser
 *
 * This api returns the value of a property of the phpsniff
 * object
 *
 * @access public
 * @param $args['property_name'] name of the property
 * @returns string property value
 */
function sniffer_userapi_property($args)
{
    if (!isset($args['property_name'])) {
        return;
    }

    $result = pnModAPIFunc('Sniffer', 'user', 'get');

    return $result->property($args['property_name']);
}

/**
 * decide if the browser has a particular feature
 *
 * This api returns wether a browser has a particular
 * feature or not
 *
 * @access public
 * @param $args['feature'] name of the feature
 * @returns bool true if feature is available false otherwise
 */
function sniffer_userapi_has_feature($args)
{
    if (!isset($args['feature'])) {
        return;
    }

    $result = pnModAPIFunc('Sniffer', 'user', 'get');

    return $result->has_feature($args['feature']);
}

/**
 * decide if the browser has a particular quirk
 *
 * This api returns wether a browser has a particular
 * quirk or not
 *
 * @access public
 * @param $args['quirk'] name of the quirk
 * @returns bool true if quirk is available false otherwise
 */
function sniffer_userapi_has_quirk($args)
{
    if (!isset($args['quirk'])) {
        return;
    }

    $result = pnModAPIFunc('Sniffer', 'user', 'get');

    return $result->has_quirk($args['quirk']);
}
