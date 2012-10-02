<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.themetype.php 26571 2009-09-07 12:00:53Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * pnRender plugin
 *
 * This file is a plugin for pnRender, the Zikula implementation of Smarty
 *
 * @package      Zikula_System_Modules
 * @subpackage   pnRender
 */

/**
 * Smarty modifier to convert theme type into a language string
 *
 * Example
 *
 *   <!--[$mythemetype|themetype]-->
 *
 * @author       Mark West
 * @since        16. Sept. 2003
 * @see          modifier.pnvarprepfordisplay.php::smarty_modifier_DataUtil::formatForDisplay()
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_themetype($string)
{
    switch ((int)$string) {
        case 1:
            return __('Legacy');
        case 2:
            return __('Xanthia 2.0');
        case 3:
            return __('Xanthia 3.0');
        case 4:
            return __('Autotheme');
    }
}
