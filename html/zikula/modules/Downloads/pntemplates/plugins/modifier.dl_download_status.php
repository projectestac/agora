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
 *   <!--[$item_date|dl_download_status]-->
 * 
 * 
 * @param        array    $string     
 * @return       string   
 */
function smarty_modifier_dl_download_status ($item_date)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (is_numeric($item_date))
    {
		return;
	}
	
	$item_date = date("d F Y", $item_date);

	$count = 0;
	
    while ($count <= 7) 
	{
	  	$date_now = (time()-(86400 * $count));
		$date_now = date("d F Y",$date_now);
		
        if ($date_now == $item_date) 
		{
	        if ($count<=1) 
			{
	        	$new_dl_graphic="<img src=\"modules/Downloads/pnimages/new_1.gif\" alt=\"".__('New', $dom)TODAY."\" height=\"11\" width=\"28\" />";
	    	}
	    	
            if ($count<=3 && $count>1) 
			{
        		$new_dl_graphic="<img src=\"modules/Downloads/pnimages/new_3.gif\" alt=\"".__('New', $dom)LAST3DAYS."\" height=\"11\" width=\"28\" />";
    		}
    		
            if ($count<=7 && $count>3) 
			{
        		$new_dl_graphic="<img src=\"modules/Downloads/pnimages/new_7.gif\" alt=\"".__('New', $dom)THISWEEK."\" height=\"11\" width=\"28\" />";
    		}
		}
		
        $count++;
    }
    
    return $new_dl_graphic;
}

?>
