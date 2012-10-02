<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  smarty plugin
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by the Cmods Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

/**
 * Smarty modifier to display the correct message
 * 
 *   <!--[$item_date|dl_download_date]-->
 * 
 * 
 * @param        array    $string     
 * @return       formated string   
 */
function smarty_modifier_dl_download_date ($item_date)
{
	if (empty($item_date))
    {
		return;
	}

	$item_date = DateUtil::getDatetime($item_date,'datebrief' );
	
    return $item_date;
}

?>
