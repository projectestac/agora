<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnpagegetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get page variable
 *
 * This function obtains a page-specific variable from the Zikula system.
 *
 * Available parameters:
 *   - name:     The name of the page variable to obtain
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
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
 * Example
 *   <!--[pnpagegetvar name='title']-->
 *
 *
 * @author       Mark West
 * @since        30/03/06
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        Name of  the page variable to get
 * @param        bool         $html        (optional) If true then result will be treated as html content
 * @param        string      $assign      (optional) If set then result will be assigned to this template variable
 * @return       string      The module variable
 */
function smarty_function_pnpagegetvar($params, &$smarty)
{
    $assign = isset($params['assign']) ? $params['assign']     : null;
    $html   = isset($params['html'])   ? (bool)$params['html'] : false;
    $name   = isset($params['name'])   ? $params['name']       : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnpagegetvar', 'name')));
        return false;
    }

    $result = PageUtil::getVar($name);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        if ($html) {
            return DataUtil::formatForDisplayHTML($result);
        } else {
            return DataUtil::formatForDisplay($result);
        }
    }
}
