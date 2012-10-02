<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pncountnewmessages.php 25048 2008-12-14 10:17:26Z Landseer $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get the number of new messages for the user currently logged in
 *
 *
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 *   <!--[pncountnewmessages assign=newmessages]-->!
 *
 *
 * @author       Frank Schummertz
 * @since        03/19/2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 */
function smarty_function_pncountnewmessages ($params, &$smarty)
{
    $unread = 0;
    if (pnUserLoggedIn()) {
        $msgmodule = pnConfigGetVar('messagemodule', '');
        if (pnModAvailable($msgmodule)) {
            $messages = pnModAPIFunc($msgmodule, 'user', 'getmessagecount');
            $unread = $messages['unread'];
        }
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $unread);
    } else {
        return $unread;
    }
}
