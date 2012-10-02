<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
 *
 * @package      Downloads
 * @version      2.2
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------

/**
 * is user logged in
 *
 * @author       Lindbergh
 * @version      1.0
 *
 */
function smarty_function_dl_user_in($params, &$smarty) 
{
   	extract($params);
    unset($params);
    
    $is_user = pnUserLoggedIn();
   
	if (isset($assign)) 
	{
        $smarty->assign($assign, $is_user);
    } 
	else 
	{
        return $is_user;
    }
    
}

?>