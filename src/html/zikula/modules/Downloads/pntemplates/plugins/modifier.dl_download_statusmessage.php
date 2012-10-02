<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  smarty plugin
 *
 * @package      Downloads
 * @version      2.0
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by the Cmods Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

/**
 * Smarty modifier to display the correct message
 * 
 *   <!--[$MyVar|dl_download_statusmessage ]-->
 * 
 * 
 * @param        array    $string     
 * @return       string   
 */
function smarty_modifier_dl_download_statusmessage ($myflag)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!is_numeric($myflag))
    {
		return;
	}
	
	switch ($myflag)
    {
		case 0: 
			return pnVarPrepHTMLDisplay(__('Download currently disabled.', $dom));
			break;
		case 1: 
			return pnVarPrepHTMLDisplay(__('Download is active!', $dom));
			break;
		default:
			return '';
	}
}

?>
