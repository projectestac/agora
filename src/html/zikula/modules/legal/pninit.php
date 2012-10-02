<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage legal
 */

/**
 * initialise the template module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 *
 * @author Mark West
 * @return bool true if successful, false otherwise
 */
function Legal_init()
{
    pnModSetVar('legal', 'termsofuse', true);
    pnModSetVar('legal', 'privacypolicy', true);
    pnModSetVar('legal', 'accessibilitystatement', true);

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Mark West
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function Legal_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '1.1':
            pnModSetVar('legal', 'termsofuse', true);
            pnModSetVar('legal', 'privacypolicy', true);
            pnModSetVar('legal', 'accessibilitystatement', true);

        case '1.2':
        case '1.3':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the Legal module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 *
 * @author Mark West
 * @return bool true if successful, false otherwise
 */
function Legal_delete()
{
    pnModDelVar('legal');

    // Deletion successful
    return true;
}
