<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: tools.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage Admin
 */

/**
 * display the header for the admin panel of non API compliant modules
 *
 * A lot simple that the object orientated menu system used before....
 *
 * @author Mark West
 * @deprecated
 */
function GraphicAdmin()
{
    $stylesheet = pnModGetVar('admin', 'modulestylesheet');
    PageUtil::addVar('stylesheet', 'system/Admin/pnstyle/' . DataUtil::formatForOS($stylesheet));
    echo pnModFunc('Admin', 'admin', 'categorymenu');
}
