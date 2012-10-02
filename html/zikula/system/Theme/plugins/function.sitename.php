<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.sitename.php 27863 2009-12-12 20:13:20Z jusuff $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the sitename
 *
 * available parameters:
 *  - assign     if set, the title will be assigned to this variable
 *
 * Example
 * <!--[sitename]-->
 *
 * @author       Mark West
 * @since        21/10/03
 * @see          function.sitename.php::smarty_function_sitename()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the sitename
 */
function smarty_function_sitename($params, &$smarty)
{
    $sitename = pnConfigGetVar('sitename');
    $sitename = (strpos($sitename,'::') === false && defined($sitename)) ? constant($sitename): $sitename;

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $sitename);
    } else {
        return $sitename;
    }
}
