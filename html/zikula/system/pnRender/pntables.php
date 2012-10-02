<?php
/**
 * Zikula Application Framework
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pntables.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package     Zikula_System_Modules
 * @subpackage  pnRender
 */

/**
 * return the table information
 *
 * This function is called internally by the core whenever the module is
 * loaded.
 * To be API compilant, we need to provide this function; even if no
 * tables are created.
 *
 *
 * @author       Joerg Napp
 * @return       array    an array with the table infomation
 */
function pnRender_pntables()
{
    return array();
}
