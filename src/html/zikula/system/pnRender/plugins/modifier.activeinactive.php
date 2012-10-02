<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.activeinactive.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to turn a boolean value into a suitable language string
 *
 * Example
 *
 *   <!--[$myvar|activeinactive|pnvarprepfordisplay]--> returns Active if $myvar = 1 and Inactive if $myvar = 0
 *
 * @author       Mark West
 * @since        26 April 2006
 * @param        string    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_activeinactive($string)
{
    if ($string != '0' && $string != '1') return $string;

    if ((bool)$string) {
        return __('Active');
    } else {
        return __('Inactive');
    }
}
