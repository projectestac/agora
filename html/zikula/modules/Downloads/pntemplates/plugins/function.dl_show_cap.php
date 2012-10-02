<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
 *
 * @package      Downloads
 * @version      2.3.1
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------

/**
 * show captcha
 *
 * @author       Lindbergh
 * @version      1.0
 *
 */
function smarty_function_dl_show_cap($params, &$smarty) 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
   	extract($params);

    unset($params);

    $alt = __('Security Code:', $dom);
    
    return '<img src="'. pnVarPrepForDisplay (pnModURL('Downloads', 'user', 'getimage', array('img' => $cap))).'" alt="'.$alt.'"/>'; 
}

?>