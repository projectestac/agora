<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.allowedhtml.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the list of allowed html tags
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[allowedhtml]-->
 *
 * @author       Mark West
 * @since        25 April 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_allowedhtml($params, &$smarty)
{
    $AllowableHTML = pnConfigGetVar('AllowableHTML');
    $allowedhtml = '';
    foreach ($AllowableHTML as $key => $access) {
        if ($access > 0) {
            $allowedhtml .= '&lt;' . htmlspecialchars($key) . '&gt; ';
        }
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $allowedhtml);
    } else {
        return $allowedhtml;
    }
}
