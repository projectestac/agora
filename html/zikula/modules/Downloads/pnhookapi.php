<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  hook api
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
 * delete_item
 * deletehook function 
 *
 */
function Downloads_hookapi_delete_item($args)
{    
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($args);
    unset($args);

	pnModLangLoad('Downloads');
	
    if(!isset($extrainfo['module']) || empty($extrainfo['module'])) 
	{
        $modname = pnModGetName();
    } 
	else 
	{
        $modname = $extrainfo['module'];
    }

    if(isset($extrainfo['itemid']) && !empty($extrainfo['itemid'])) 
	{
        $objectid = $extrainfo['itemid'];
    }

    if(!isset($objectid) || empty($objectid)) 
	{
        return showforumerror(__('Error! Could not do what you wanted. Please check your input.', $dom), __FILE__, __LINE__);
    }

    // for news
    if($modname=='AddStory') 
	{
        $modname = 'News';
    }

    $modid = pnModGetIDFromName($modname);

    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[url]
			FROM 		$dl_downloads_table
			WHERE 		$dl_downloads_column[objectid] ='".(int)pnVarPrepForStore($objectid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	
	list($url) = $result->fields;
	
	$upload_folder = pnModGetVar('downloads','upload_folder');
	
	// delete the  file
    // if it exsists
    $filepointer = is_file(pnVarPrepForOS($upload_folder.$url));
    
    if ($filepointer === true)
    {
	   	If(false === unlink(pnVarPrepForOS($upload_folder.$url)))
    	{
    		return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
    	}
	}

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "DELETE FROM  $dl_downloads_table
            WHERE   $dl_downloads_column[objectid]='" . (int)pnVarPrepForStore($objectid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;

}

/**
 * delete_module
 * deletehook function 
 *
 */
function Downloads_hookapi_delete_module($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($args);
    unset($args);

    if(!isset($extrainfo['module']) || empty($extrainfo['module'])) 
	{
        $modname = pnModGetName();
    } 
	else 
	{
        $modname = $extrainfo['module'];
    }

    if(!isset($objectid) || empty($objectid)) 
	{
        return showforumerror(__('Error! Could not do what you wanted. Please check your input.', $dom), __FILE__, __LINE__);
    }

    // for news
    if($modname=='AddStory') 
	{
        $modname = 'News';
    }

    $modid = pnModGetIDFromName($modname);
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[url]
			FROM 		$dl_downloads_table
			WHERE 		$dl_downloads_column[modid] ='".(int)pnVarPrepForStore($modid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	$upload_folder = pnModGetVar('downloads','upload_folder');
	
	// delete the files from the server
	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($url) = $result->fields;
	
		// delete the  file
	    // if it exsists
	    $filepointer = is_file(pnVarPrepForOS($upload_folder.$url));
	    
	    if ($filepointer === true)
	    {
		   	If(false === unlink(pnVarPrepForOS($upload_folder.$url)))
	    	{
	    		return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
	    	}
		}
    }

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "DELETE FROM  $dl_downloads_table
            WHERE   	 $dl_downloads_column[modid]='" . (int)pnVarPrepForStore($modid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	
	return true;

}
?>