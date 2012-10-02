<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 23 2010-04-06 16:10:42Z yokav $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Initialisation process
 *
 * @return boolean true if successful or false
 */
function ratings_init()
{
    $dom = ZLanguage::getModuleDomain('Ratings');

    // Creation of the tables into the database
    if (!DBUtil::createTable('ratings') ||
        !DBUtil::createTable('ratingslog')) {
        return LogUtil::registerError(__("Error: Creation of the tables into the database attempt failed.", $dom));
    }

    // Set up module variables
    if (!pnModSetVar('Ratings', 'defaultstyle', 'outoffivestars') ||
        !pnModSetVar('Ratings', 'useajax', false)                 ||
        !pnModSetVar('Ratings', 'usefancycontrols', false)        ||
        !pnModSetVar('Ratings', 'displayScoreInfo', false)        ||
        !pnModSetVar('Ratings', 'seclevel', 'medium')             ||
        !pnModSetVar('Ratings', 'itemsperpage', 25)) {
        return LogUtil::registerError(__("Error: Set up module variables attempt failed.", $dom));
    }

    // Set up module hooks
    if (!pnModRegisterHook('item', 'display', 'GUI', 'Ratings', 'user', 'display')    ||
        !pnModRegisterHook('item', 'delete', 'API', 'Ratings', 'admin', 'deletehook') ||
        !pnModRegisterHook('module', 'remove', 'API', 'Ratings', 'admin', 'removehook')) {
        return LogUtil::registerError(__("Error: Set up module hooks attempt failed.", $dom));
    }

    // Initialisation successful
    return true;
}

/**
 * Upgrade the ratings module from an old version
 *
 * @author Jim McDonald
 * @return true if upgrade success, false otherwise
 */
function ratings_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch($oldversion) {
        case '1.0':
            // this upgrade is handled by the generic table alteration
            // Carry out other upgrades

        case '1.1':
            if (!pnModRegisterHook('module', 'remove', 'API', 'Ratings', 'admin', 'removehook')) {
                return '1.1';
            }

        case '1.2':
            // get all modules hooked to ratings
            $hookedmodules = pnModAPIFunc('Modules', 'admin', 'gethookedmodules', array('hookmodname'=> 'Ratings'));
            if (!pnModRegisterHook('item', 'delete', 'API', 'Ratings', 'admin', 'deletehook')) {
                return '1.2';
            }
            foreach ($hookedmodules as $modname => $hooktype) {
                // disable the hooks for this module
                pnModAPIFunc('Modules', 'admin', 'disablehooks', array('callermodname' => $modname, 'hookmodname' => 'Ratings'));
                // re-enable the hooks for this module
                pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => $modname, 'hookmodname' => 'Ratings'));
            }

        case '1.3':
            pnModSetVar('Ratings', 'useajax', false);
            pnModSetVar('Ratings', 'usefancycontrols', false);
            pnModSetVar('Ratings', 'itemsperpage', 25);

        case '2.0':
            if (!DBUtil::changeTable('ratings')) {
                return '2.0';
            }
            if (!DBUtil::changeTable('ratingslog')) {
                return '2.0';
            }

        case '2.1':
            pnModSetVar('Ratings', 'displayScoreInfo', false);

        case '2.2':
            // Further upgrade routines
    }

    return true;
}

/**
 * Deletion process
 *
 * @return boolean true if successful or false
 */
function ratings_delete()
{
    $dom = ZLanguage::getModuleDomain('Ratings');

    // Remove module hooks
    if (!pnModUnregisterHook('item', 'display', 'GUI', 'Ratings', 'user', 'display')    ||
        !pnModUnRegisterHook('item', 'delete', 'API', 'Ratings', 'admin', 'deletehook') ||
        !pnModUnregisterHook('module', 'remove', 'API', 'Ratings', 'admin', 'removehook')) {
        return LogUtil::registerError (__('Error: Could not deregister hook.', $dom));
    }

    // Drop tables into the database
    if (!DBUtil::dropTable('ratings')  ||
        !DBUtil::dropTable('ratingslog')) {
        return LogUtil::registerError (__('Error: Could not drop database tables.', $dom));
    }

    // Delete module variables
    pnModDelVar('Ratings');

    // Deletion successful
    return true;
}
