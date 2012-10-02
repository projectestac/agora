<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnpageregistervar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to register a page variable
 *
 * This function registers a page-specific variable with the Zikula system.
 *
 * Available parameters:
 *   - name:     The name of the page variable to obtain
 *
 * Zikula doesn't impose any restriction on the page variables name except for duplicate
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
 * Example
 *   <!--[pnpageregistervar name='title']-->
 *
 *
 * @author       Mark West
 * @since        30/03/06
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        Name of  the page variable to get
 * @return       string      The module variable
 */
function smarty_function_pnpageregistervar($params, &$smarty)
{
    $name = isset($params['name']) ? $params['name'] : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnpageregistervar', 'name')));
        return false;
    }

    PageUtil::registerVar($name);
    return;
}
