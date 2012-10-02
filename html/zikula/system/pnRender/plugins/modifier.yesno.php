<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.yesno.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to turn a boolean value into a suitable language string
 *
 * Example
 *
 *   <!--[$myvar|yesno|pnvarprepfordisplay]--> returns Yes if $myvar = 1 and No if $myvar = 0
 *
 * @author       Mark West
 * @since        30 March 2006
 * @param        string    $string     the contents to transform
 * @param        string    $images    display the yes/no response as tick/cross
 * @return       string   the modified output
 */
function smarty_modifier_yesno($string, $images = false)
{
    if ($string != '0' && $string != '1') return $string;

    if ($images) {
        $smarty = & pnRender::getInstance();
        require_once $smarty->_get_plugin_filepath('function','pnimg');
        $params = array('modname' => 'core', 'set' => 'icons/extrasmall');
    }

    if ((bool)$string) {
        if ($images) {
            $params['src'] = 'button_ok.gif';
            $params['alt'] = $params['title'] = __('Yes');
            return smarty_function_pnimg($params, $smarty);
        } else {
            return __('Yes');
        }
    } else {
        if ($images) {
            $params['src'] = 'button_cancel.gif';
            $params['alt'] = $params['title'] = __('No');
            return smarty_function_pnimg($params, $smarty);
        } else {
            return __('No');
        }
    }
}
