<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Header_Footer
 * @author Mark West
 */

/**
 * initialise the Header module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function Header_Footer_init()
{
    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function Header_Footer_upgrade($oldversion)
{
    // Update successful
    return true;
}

/**
 * delete the Header module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function Header_Footer_delete()
{
    // Deletion successful
    return true;
}
