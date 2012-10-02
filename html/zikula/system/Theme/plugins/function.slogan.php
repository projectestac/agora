<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.slogan.php 27904 2009-12-16 04:37:02Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the slogan
 *
 * Example
 * <!--[slogan]-->
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.slogan.php::smarty_function_slogan()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the slogan
 */
function smarty_function_slogan($params, &$smarty)
{
    $slogan = pnConfigGetVar('slogan');
    $slogan = (strpos($slogan,'::') === false && defined($slogan)) ? constant($slogan): $slogan;

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $slogan);
    } else {
        return $slogan;
    }
}
