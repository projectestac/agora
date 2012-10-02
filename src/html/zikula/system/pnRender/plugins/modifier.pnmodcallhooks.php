<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: modifier.pnmodcallhooks.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Modifiers
 */

/**
 * Smarty modifier to apply transform hooks
 *
 * This modifier will run the transform hooks that are enabled for the
 * corresponding module (like Autolinks, bbclick and others).
 *
 * Available parameters:
 *   - modname:  The well-known name of the calling module; passed to the hook function
 *               in the extrainfo array
 * Example
 *
 *   <!--[$MyVar|pnmodcallhooks]-->
 *
 *
 * @author       Joerg Napp
 * @author       The pnCommerce team
 * @since        16. Sept. 2003
 * @param        array    $string     the contents to transform
 * @return       string   the modified output
 */
function smarty_modifier_pnmodcallhooks($string, $modname = '')
{
    $extrainfo = array($string);
    if (!empty($modname)) {
        $extrainfo['module'] = $modname;
    }

    list($string) = pnModCallHooks('item', 'transform', '', $extrainfo);
    return $string;
}
