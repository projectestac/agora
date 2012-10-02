<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  prepare sideblock content
 *
 * @package      Downloads
 * @version      2.2
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by the Cmods Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

include_once "modules/Downloads/common.php";

function Downloads_lastblock_info()
{
	return array( 
	'module' 			=> 'Downloads',
    'text_type' 		=> 'Last_X_Block',
    'text_type_long' 	=> 'Last_X_Block',
    'allow_multiple' 	=> false,
    'form_content' 		=> false,
    'form_refresh' 		=> false,
    'show_preview' 		=> true
	);

}

function Downloads_lastblock_init()
{
    // Security
   	pnSecAddSchema('Downloads::', 'Block title::');
}

function Downloads_lastblock_display($row) 
{

	if(!pnModAvailable('Downloads')) 
	{
        return;
    }

	if (!pnSecAuthAction(0, 'Downloads::', "$row[title]::", ACCESS_READ)) 
	{
        return;
    }

    if (empty($row['title'])) 
	{
    	$row['title'] = "Last x Downloads";
    }

	$lastx_limit = pnModGetVar('downloads', 'newdownloads');
	  	
	$lastx_prep = pnModAPIFunc('Downloads','user','get_download_info',
								  array('lid' => 0,
									  	'cid' => 0,
									  	'sort_active' => true,
									  	'sortby' => "date",
									  	'cclause' => "DESC",
									  	'get_by_cid' => false,
									  	'get_by_lid' => false,
										'get_by_date' => false,
										'sort_date' => 0,
										'limit' => $lastx_limit,
										'start' => 0));

    $pnr = new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('lastx_prep', $lastx_prep);
    $row['content'] = $pnr->fetch('blocks/downloads_lastx_block.htm');
    
    return themesideblock($row);
    
}

?>
