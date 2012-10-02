<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnbannerdisplay.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display .
 *
 * This function takes a identifier and returns a banner from the banners module
 *
 * Available parameters:
 *   - id:       id of the banner group as defined in the banners module
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 * <!--[pnbannerdisplay id=0]-->
 *
 *
 * @author       Mark West
 * @since        20/10/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        sting
 * @return       string      the banner
 */
function smarty_function_pnbannerdisplay ($params, &$smarty)
{
    $id     = isset($params['id'])     ? (int)$params['id'] : 0;
    $assign = isset($params['assign']) ? $params['assign']  : null;

    if (pnModAvailable('Banners'))  {
        $result = pnModFunc('Banners', 'user', 'display', array('type' => $id));
        if ($assign) {
            $smarty->assign($assign, $result);
        } else {
            return $result;
        }
    } else {
        return '&nbsp;';
    }
}
