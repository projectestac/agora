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
 * Smarty modifier to display the correct message
 * 
 * 
 * @param        array    $string     
 * @return       string   
 */
function smarty_modifier_dl_download_update ($update)
{

    if (!isset($update)) 
	{
        $update =0;
    }
    
	$update = date("d F Y", $update);

	$count = 0;
	
    while ($count <= 7) 
	{
	  	$date_now = (time()-(86400 * $count));
	  	
		$date_now = date("d F Y",$date_now);
		
        if ($date_now == $update) 
		{
	        if ($count<=1) 
			{
	        	$up_dl_graphic="<img src=\"modules/Downloads/pnimages/user/update.gif\" alt=\"Update\" height=\"20\" width=\"45\" />";
	    	}
	    	
            if ($count<=3 && $count>1) 
			{
        		$up_dl_graphic="<img src=\"modules/Downloads/pnimages/user/update.gif\" alt=\"Update\" height=\"20\" width=\"45\" />";
    		}
    		
            if ($count<=7 && $count>3) 
			{
        		$up_dl_graphic="<img src=\"modules/Downloads/pnimages/user/update.gif\" alt=\"Update\" height=\"20\" width=\"45\" />";
    		}
		}
		
        $count++;
    }

    return $up_dl_graphic;
}

?>
