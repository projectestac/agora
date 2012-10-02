<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pnml.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to convert lanugage define into textual string
 *
 * This modifier converts a lanugage define (currently a defined contant e.g.
 * _MYCONST) into the language string represented by that define
 *
 *
 * Example
 *
 *   <!--[$MyVar|pnml]-->
 *
 * @author       Mark West
 * @since        16. Sept. 2003
 * @see          modifier.pnvarprepfordisplay.php::smarty_modifier_DataUtil::formatForDisplay()
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_pnml($string)
{
    return pnML($string);
}
