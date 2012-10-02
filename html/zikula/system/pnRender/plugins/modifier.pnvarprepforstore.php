<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pnvarprepforstore.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to prepare variable for database storage
 *
 * This modifier carries out suitable escaping of characters such that when
 * inserted into a database the exact string is stored.
 *
 * Example
 *
 *   <!--[$MyVar|pnvarprepforstore]-->
 *
 *
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_pnvarprepforstore ($string)
{
    return DataUtil::formatForStore($string);
}
