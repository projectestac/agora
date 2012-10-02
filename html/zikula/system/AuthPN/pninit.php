<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package      Zikula_System_Modules
 * @subpackage   AuthPN
 * @author       Mark West
 */

/**
 * initialise the AuthPN module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance.
 * This function MUST exist in the pninit file for a module
 *
 * @author       Jim McDonald
 * @return       bool       true on success, false otherwise
 */
function AuthPN_init()
{
    // Set up an initial value for a module variable.  Note that all module
    // variables should be initialised with some value in this way rather
    // than just left blank, this helps the user-side code and means that
    // there doesn't need to be a check to see if the variable is set in
    // the rest of the code as it always will be
    pnModSetVar('AuthPN', 'authmodules', 'AuthPN');

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Jim McDonald
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function AuthPN_upgrade($oldversion)
{
    // Update successful
    return true;
}

/**
 * delete the AuthPN module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * This function MUST exist in the pninit file for a module
 *
 * @author       Jim McDonald
 * @return       bool       true on success, false otherwise
 */
function AuthPN_delete()
{
    // Delete any module variables
    pnModDelVar('AuthPN');

    // Deletion successful
    return true;
}
