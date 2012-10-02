<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage pnForm
 */

/**
 * initialize pnForm
 */
function pnForm_init()
{
    return true;
}

/**
 * upgrade the pnForm module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function pnForm_upgrade($oldversion)
{
    return true;
}

/**
 * delete pnForm
 */
function pnForm_delete()
{
    return true;
}
