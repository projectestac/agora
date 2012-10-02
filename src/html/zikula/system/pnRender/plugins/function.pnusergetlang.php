<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnusergetlang.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the users language
 *
 * This function determines the recent users language
 *
 * Available parameters:
 *   - assign:  If set, the result is assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pnusergetlang name="foobar" ]-->
 *
 *
 * @author       Frank Schummertz
 * @since        20/07/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $assign      (optional) The name of the variable to assign the result to
 * @return       string      The recent users language
 */
function smarty_function_pnusergetlang($params,&$smarty)
{
    $assign = isset($params['assign'])  ? $params['assign']  : null;

    $result = ZLanguage::getLanguageCodeLegacy();

    if ($assign) {
        $smarty->assign($assign, $result);
        return;
    }
    return $result;
}
