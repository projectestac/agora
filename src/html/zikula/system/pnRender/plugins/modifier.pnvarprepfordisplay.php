<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pnvarprepfordisplay.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to prepare a variable for display
 *
 * This modifier carries out suitable escaping of characters such that when
 * output as part of an HTML page the exact string is displayed.
 *
 * Running this modifier multiple times is cumulative and is not reversible.
 * It recommended that variables that have been returned from this modifier
 * are only used to display the results, and then discarded.
 *
 * Example
 *
 *   <!--[$MyVar|pnvarprepfordisplay]-->
 *
 *
 * @author       The pnCommerce team
 * @since        16. Sept. 2003
 * @see          modifier.pnvarprephtmldisplay.php::smarty_modifier_DataUtil::formatForDisplayHTML()
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_pnvarprepfordisplay ($string)
{
    return DataUtil::formatForDisplay($string);
}
