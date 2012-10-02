<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.onlineoffline.php 27057 2009-10-21 16:15:43Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to turn a boolean value into a suitable language string
 *
 * Example
 *
 *   <!--[$myvar|onlineoffline|pnvarprepfordisplay]--> returns Online if $myvar = 1 and Offline if $myvar = 0
 *
 * @author       Mark West
 * @since        26 April 2006
 * @param        string    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_onlineoffline($string)
{
    if ($string != '0' && $string != '1') return $string;

    if ((bool)$string) {
        return __('on-line');
    } else {
        return __('off-line');
    }
}
