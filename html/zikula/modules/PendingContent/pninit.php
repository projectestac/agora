<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pninit.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage PendingContent
 */

/**
 * initialise the template module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function pendingcontent_init()
{
    if (!DBUtil::createTable('pendingcontent')) {
        return false;
    }

    pnModSetVar('PendingContent', 'itemsperpage', 10);

    // Initialisation successful
    return true;
}

/**
 * upgrade the pendingcontent module from an old version
 * This function can be called multiple times
 */
function pendingcontent_upgrade($oldversion)
{
    // Update successful
    return true;
}

/**
 * delete the pendingcontent module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function pendingcontent_delete()
{
    if (!DBUtil::dropTable('pendingcontent')) {
        return false;
    }

    // Delete any module variables
    pnModDelVar('PendingContent');

    // Deletion successful
    return true;
}
