<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: show appropriate title
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------
include_once('modules/Downloads/common.php');

/**
 * get the title
 */
function Downloads_title() 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    list($cid,$lid, $func) = pnVarCleanFromInput('cid','lid','func');
   
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
	if(!empty($cid) && empty($lid))
	{
		$dl_categories_table  = &$pntable['downloads_categories'];
		$dl_categories_column = &$pntable['downloads_categories_column'];
	
	    $sql = "SELECT 	pn_title
				FROM 	$dl_categories_table
				WHERE 	pn_cid ='".pnVarPrepForStore($cid)."'";
				
		$result = $dbconn->Execute($sql);
	
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
		}
		
		list($title) = $result->fields;
	}
	
	if(empty($cid) && !empty($lid))
	{
		$dl_downloads_table  = &$pntable['downloads_downloads'];
		$dl_downloads_column = &$pntable['downloads_downloads_column'];
	
	    $sql = "SELECT 	pn_title
				FROM 	$dl_downloads_table
				WHERE 	pn_lid ='".pnVarPrepForStore($lid)."'";
				
		$result = $dbconn->Execute($sql);
	
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
		}
		
		list($title) = $result->fields;
	}
	
	if(empty($cid) && empty($lid) && !empty($func))
	{		
		if ($func == 'new')
		{
			$title = __('New', $dom);
		}
		
		if ($func == 'popular')
		{
			$title = __('Popular', $dom);
		}
		
		if ($func == 'toprated')
		{
			$title = __('Top Rated', $dom);
		}
		
		if ($func == 'search')
		{
			$title = __('Search', $dom);
		}
		
		if ($func == 'newdownload')
		{
			$title = __('Add', $dom);
		}
	}
	
	
	if(empty($title))
	{
	  $title = __('Overview', $dom);
	}
	
    return  pnConfigGetVar('sitename').' - Downloads - '.$title;
}
?>
