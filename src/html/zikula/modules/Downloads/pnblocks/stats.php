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

function Downloads_statsblock_info()
{
	return array( 
	'module' 			=> 'Downloads',
    'text_type' 		=> 'Statistics_Block',
    'text_type_long' 	=> 'Statistics_Block',
    'allow_multiple' 	=> false,
    'form_content' 		=> false,
    'form_refresh' 		=> false,
    'show_preview' 		=> true
	);

}

function Downloads_statsblock_init()
{
    // Security
   	pnSecAddSchema('Downloads::', 'Block title::');
}

function Downloads_statsblock_display($row) 
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
    	$row['title'] = "Downloads Statistics";
    }

	$mod_stats = pnModAPIFunc('Downloads', 'user', 'getstatistics');	

    $pnr = new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('count_categories', $mod_stats['count_categories']);
    $pnr->assign('total_hits', $mod_stats['total_hits']);
    $pnr->assign('total_traffic', $mod_stats['total_traffic']);
    $pnr->assign('count_downloads', $mod_stats['count_downloads']);
    $row['content'] = $pnr->fetch('blocks/downloads_stats_block.htm');
    
    return themesideblock($row);
    
}

?>
