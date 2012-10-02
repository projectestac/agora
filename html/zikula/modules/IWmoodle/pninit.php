<?php

/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 22139 2007-06-01 10:57:16Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package PostNuke_Value_Addons
 * @subpackage Webbox
 */

/**
 * initialise the IWmoodle module creating module tables and module vars
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function IWmoodle_init() {
    $dom = ZLanguage::getModuleDomain('IWmoodle');
    // Checks if module iw_main is installed. If not returns error
    $modid = pnModGetIDFromName('iw_main');
    $modinfo = pnModGetInfo($modid);

    if ($modinfo['state'] != 3) {
        return LogUtil::registerError(__('Module iw_main is needed. You have to install the iw_main module before to install it.', $dom));
    }

    // Check if the version needed is correct
    $versionNeeded = '2.0';
    if (!pnModFunc('iw_main', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
        return false;
    }


    // Create module table
    if (!DBUtil::createTable('IWmoodle'))
        return false;

    //Create module vars
    pnModSetVar('IWmoodle', 'moodleurl', '../moodle');
    pnModSetVar('IWmoodle', 'newwindow', 1);
    pnModSetVar('IWmoodle', 'guestuser', 'guest');
    pnModSetVar('IWmoodle', 'dbprefix', 'm2');

    pnModSetVar('IWmoodle', 'dfl_description', 'Descripció');
    pnModSetVar('IWmoodle', 'dfl_language', 'ca');
    pnModSetVar('IWmoodle', 'dfl_country', 'ES');
    pnModSetVar('IWmoodle', 'dfl_city', 'Localitat');
    pnModSetVar('IWmoodle', 'dfl_gtm', '99');
    return true;
}

/**
 * Delete the IWmoodle module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function IWmoodle_delete() {

    // Delete module table
    DBUtil::dropTable('IWmoodle');

    //Delete module vars
    pnModDelVar('IWmoodle', 'moodleurl');
    pnModDelVar('IWmoodle', 'newwindow');
    pnModDelVar('IWmoodle', 'guestuser');
    pnModDelVar('IWmoodle', 'dbprefix');
    pnModDelVar('IWmoodle', 'dfl_description');
    pnModDelVar('IWmoodle', 'dfl_language');
    pnModDelVar('IWmoodle', 'dfl_country');
    pnModDelVar('IWmoodle', 'dfl_city');
    pnModDelVar('IWmoodle', 'dfl_gtm');
    return true;
}

/**
 * Update the IWmoodle module
 * @author Albert Pérez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
function IWmoodle_upgrade($oldversion) {
    return true;
}

?>
