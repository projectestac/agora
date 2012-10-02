<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnpageaddvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to add a value to a multicontent page variable
 *
 * This function obtains a page-specific variable from the Zikula system.
 *
 * Available parameters:
 *   - name:     The name of the page variable to set
 *   - value:    The value of the page variable to set, comma separated list is possible
 *
 * Zikula doesn't impose any restriction on the page variabl's name except for duplicate
 * and reserved names. As of this writing, the list of reserved names consists of
 * <ul>
 * <li>title</li>
 * <li>description</li>
 * <li>keywords</li>
 * <li>stylesheet</li>
 * <li>javascript</li>
 * <li>body</li>
 * <li>rawtext</li>
 * <li>footer</li>
 * </ul>
 *
 * Examples
 *   <!--[pnpageaddvar name='javascript' value='path/to/myscript.js']-->
 *   <!--[pnpageaddvar name='javascript' value='path/to/myscript.js,path/to/another/script.js']-->
 *
 *
 * @author       Mark West
 * @author       Frank Schummertz
 * @since        20/08/06
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        Name of the page variable to set
 * @param        string      $value        Value of  he page variable to set
 */
function smarty_function_pnpageaddvar($params, &$smarty)
{
    $name  = isset($params['name'])  ? $params['name']  : null;
    $value = isset($params['value']) ? $params['value'] : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnpageaddvar', 'name')));
        return false;
    }

    if (!$value) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnpageaddvar', 'value')));
        return false;
    }
    
    $value = explode(',', $value);
    PageUtil::addVar($name, $value);
    return;
}
