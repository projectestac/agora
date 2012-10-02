<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.htmlspecialchars.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to prepare a variable for display
 * by converting special characters to HTML entities
 *
 * Example
 *
 *   <!--[$MyVar|htmlspecialchars]-->
 *
 *
 * @author       Martin Andersen
 * @since        3/6/2005
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_htmlspecialchars($string)
{
    return htmlspecialchars($string);
}
