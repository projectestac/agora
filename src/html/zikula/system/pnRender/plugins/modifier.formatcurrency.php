<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.formatcurrency.php 27237 2009-10-28 06:14:36Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Example
 *
 *   <!--[$MyVar|formatcurrency]-->
 *
 * @author       Drak
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_formatCurrency ($string)
{
    return DataUtil::formatCurrency($string);
}
