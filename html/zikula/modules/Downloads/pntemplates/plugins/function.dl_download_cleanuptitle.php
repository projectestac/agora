<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  smarty plugin
 *
 * @package      Downloads
 * @version      2.2
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by the Cmods Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

/**
 * Smarty modifier to cleanup whitespace
 * 
 *   <!--[dl_download_cleanuptitle title=$you_title]-->
 * 
 * 
 * @param        array    $string     
 * @return       string   
 */
function smarty_function_dl_download_cleanuptitle ($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Downloads'); 
	extract($params);
    unset($params);
    
	if(empty($title)) 
	{
		$smarty->trigger_error(pnVarPrepForDisplay(__('Error! Could not do what you wanted. Please check your input.', $dom)), e_error);
	} 
	
	if (isset($assign)) 
	{
        $smarty->assign($assign, preg_replace('/\s/', '%20', $title));
    } 
	else 
	{
    	return preg_replace('/\s/', '%20', $title);
    }
}

?>
