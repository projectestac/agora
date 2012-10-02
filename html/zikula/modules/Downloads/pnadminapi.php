<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI Admin Functions
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
 *
 * add category to db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $pid
 * @param        string $title
 * @param        string $description
 * @return       integer  $cid
 */
function Downloads_adminapi_addcat($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	if ((!isset($pid) ||
    !is_numeric($pid)) ||
	(!isset($title)) ||
	is_numeric($title) ||
	(!isset($description) ||
	is_numeric($description)))
	{
		return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  = &$pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT 	pn_cid
			FROM 	$dl_categories_table
			WHERE 	pn_title ='".pnVarPrepForStore($title)."'
			AND 	pn_pid ='".(int)pnVarPrepForStore($pid)."'";
			
	$result = $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
	}

	if (!$result->EOF)
	{
		return errorpage( __FILE__,__LINE__,__('Category already exsists!', $dom) );
	}

	$nextId = $dbconn->GenId($dl_categories_table);

	$sql = "INSERT
			INTO $dl_categories_table
				(pn_cid,
				 pn_pid,
				 pn_title,
				 pn_description)
			VALUES
				('".(int)pnVarPrepForStore($nextId)."',
				 '".(int)pnVarPrepForStore($pid)."',
				 '".pnVarPrepForStore($title)."',
				 '".pnVarPrepForStore($description)."')";

			
	$dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Failed to create category!', $dom) );
	}

	$cid = $dbconn->PO_Insert_ID($dl_categories_table, 'pn_cid');

	return $cid;
}

/**
 *
 * list all downloads waiting for approval
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       array $waiting
 */
function Downloads_adminapi_listwaiting()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	//create all necessary array's
    $waiting = array();
    $images = array();
    $preSelectList = array();

	$itemsperpage = pnModGetVar('downloads', 'perpage');
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
                    $dl_downloads_column[lid],
                    $dl_downloads_column[cid],
                    $dl_downloads_column[title],
                    $dl_downloads_column[url],
                    $dl_downloads_column[description],
                    $dl_downloads_column[date],
                    $dl_downloads_column[submitter],
                    $dl_downloads_column[email],
                    $dl_downloads_column[filesize],
                    $dl_downloads_column[homepage],
                    $dl_downloads_column[modid],  
                    $dl_downloads_column[objectid]
            FROM    $dl_downloads_table
            WHERE   $dl_downloads_column[status] ='0'";

	//$result = &$dbconn->Execute($sql);
	 $result = $dbconn->SelectLimit($sql, $itemsperpage, 0);
	 
	if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	for (;!$result->EOF; $result->MoveNext())
    {
		list($lid, $cid, $title, $url, $description, $date, $submitter, $email, $filesize, $homepage, $modid, $objectid ) = $result->fields;

        $images = pnModAPIFunc('Downloads','user','get_shot_by_lid',array('lid' => $lid));

		if( $modid !=0 && $objectid !=0 )
		{
		  	$modinfo = pnModGetInfo($modid);
		  	$preSelectList= "<option value='0' selected='selected'>".$modinfo['name']."</option>";
		}
		else
		{
			$preSelectList= pnModAPIFunc('Downloads', 'user', 'catSelectList', array('cid' => 0, 'sel' => $cid ));
		}
        

        //add them to array
        if(!empty($images['screenshot']) && !empty($images['thumbnail']))
        {
            $pictureflag = true;
            $waiting[] = array('lid' => $lid, 
								'cid' => $cid, 
								'title' => $title,
								'url' => $url,
								'description' => $description, 
								'date' => $date, 
								'submitter' => $submitter, 
								'email' => $email, 
								'filesize' => $filesize,
								'homepage' => $homepage ,
								'modid' => $modid ,
								'objectid' => $objectid ,
								'screenshot' => $images['screenshot'] ,
								'thumbnail' => $images['thumbnail'],
								'pictureflag' => $pictureflag, 
								'preSelectList' => $preSelectList);
        }
        else
        {
            $pictureflag = false;
            $waiting[] = array('lid' => $lid, 
							   'cid' => $cid, 
							   'title' => $title,
							   'url' => $url,
							   'description' => $description,
							   'date' => $date, 
							   'submitter' => $submitter, 
							   'email' => $email, 
							   'filesize' => $filesize,
							   'homepage' => $homepage,
							   'modid' => $modid,
							   'objectid' => $objectid,
							   'pictureflag' => $pictureflag, 
							   'preSelectList' => $preSelectList);
        }
	}

	$result->Close();

	// Return the items
	return $waiting;
}

/**
 *
 * check all downloads present in db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $chkid
 * @return       array $dl_check
 */
function Downloads_adminapi_check_all($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	extract($args);
	unset($args);
	
	if (!isset($chkid) || !is_numeric($chkid))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}
	
    $dl_check = array();

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

    if($chkid == 00)
    {
        $sql = "SELECT
                     $dl_downloads_column[lid],
                     $dl_downloads_column[title],
                     $dl_downloads_column[url],
                     $dl_downloads_column[status]
            FROM     $dl_downloads_table
            ORDER BY $dl_downloads_column[lid]";

    }
    else
    {
        $sql = "SELECT
                     $dl_downloads_column[lid],
                     $dl_downloads_column[title],
                     $dl_downloads_column[url],
                     $dl_downloads_column[status]
            FROM     $dl_downloads_table
            WHERE 	 $dl_downloads_column[cid] ='".(int)pnVarPrepForStore($chkid)."'
            ORDER BY $dl_downloads_column[lid]";
    }
	
	$result = &$dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

    for (;!$result->EOF; $result->MoveNext())
    {
        list($lid, $title, $url, $status) = $result->fields;
        
        // added check for empty urls
        if(empty($url))
        {
		  	$dl_check[] = array('ok' => '0','lid' => $lid, 'title' => $title,'status' => $status);
		}
		
        //check if the url is located outside the current webspace
    	if(true == eregi("HTTP",$url))
        {
            //check url outside the current webspace
            $myurl = parse_url($url);

            $fp = fsockopen ($myurl['host'], 80, $errno, $errstr, 30);

            if (false === $fp)
            {
                $dl_check[] = array('ok' => '0','lid' => $lid, 'title' => $title,'status' => $status);
            }
            else
            {
              	// can we read the file ?
                $handle = fopen ($url, "r");

                $buffer = fgetc ($handle);
                
                if( (stristr('OK', $buffer)) or (stristr('302 Found', $buffer)) )
                {
                    $dl_check[] = array('ok' => '1',
										'lid' => $lid, 
										'title' => $title,
										'status' => $status);
                }
                else
                {
                    $dl_check[] = array('ok' => '0',
										'lid' => $lid, 
										'title' => $title,
										'status' => $status);
                }
            }
            fclose ($fp);
        }
        else
        {
            $upload_folder = pnModGetVar('downloads','upload_folder');
            //check if the file is present at our server
            $filelocation = $upload_folder . pnVarPrepForOS($url);
            
            if (true === file_exists($filelocation))
            {
                $dl_check[] = array('ok' => '1',
									'lid' => $lid, 
									'title' => $title,
									'status' => $status);
            }
            else
            {
                $dl_check[] = array('ok' => '0',
									'lid' => $lid, 
									'title' => $title,
									'status' => $status);
            }
        }
    }
    $result->Close();
	// Return the items
	return $dl_check;
}

/**
 *
 * do update category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @param        string $title
 * @param        string $description
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_do_update_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	if (!isset($cid) ||
	!is_numeric($cid) ||
	!isset($title) || 
	is_numeric($title)|| 
	!isset($description) || 
	is_numeric($description))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "UPDATE  $dl_categories_table
            SET     $dl_categories_column[title]='" . pnVarPrepForStore($title) . "',
                    $dl_categories_column[description]='" . pnVarPrepForStore($description) . "'
            WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($cid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;
}

/**
 *
 * set the status of a download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_set_download_status($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	if (!isset($lid) || !is_numeric($lid) )
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "UPDATE  $dl_downloads_table
            SET     $dl_downloads_column[status]='1'
            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;
}

/**
 *
 * delete a download from db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_remove_download($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
    
	if (!isset($lid) || !is_numeric($lid))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[url]
			FROM 		$dl_downloads_table
			WHERE 		$dl_downloads_column[lid] ='".(int)pnVarPrepForStore($lid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	list($url) = $result->fields;
	
	$upload_folder = pnModGetVar('downloads','upload_folder');
	
	// delete the  file
    // if it exsists
    $filepointer = is_file($upload_folder.pnVarPrepForOS($url));
   
    if ($filepointer === true)
    {
	   	if(false === unlink($upload_folder .pnVarPrepForOS($url)))
    	{
    		return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
    	}
	}
    
    $screenshotlink = pnModGetVar('downloads', 'screenshotlink');
    
    $screenshot_extensions = array('.gif', '.jpg','.jpeg');
    
    //check ext array end delete the old pics
    foreach($screenshot_extensions as $shotext)
    {
        // if exsists delete screenshot
        if(file_exists($screenshotlink.pnVarPrepForOS($lid.$shotext)))
        {
            unlink($screenshotlink.pnVarPrepForOS($lid.$shotext));
        }

        // if exsists delete thumbnail
        if(file_exists($screenshotlink.pnVarPrepForOS('tn_'.$lid.$shotext)))
        {
            unlink($screenshotlink.pnVarPrepForOS('tn_'.$lid.$shotext));
        }
    }
    
    //now delete the file from db
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "DELETE FROM  $dl_downloads_table
            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	// Let any hooks know that we have deleted an item.  As this is a
    // delete hook we're not passing any extra info
	pnModCallHooks('item', 'delete', $lid, '');
	
	return true;
}

/**
 *
 * delete all downloads with a specific $cid from db
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        integer $cid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_remove_downloads($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
    
	if (!isset($cid) || !is_numeric($cid))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[url],
						$dl_downloads_column[lid]
			FROM 		$dl_downloads_table
			WHERE 		$dl_downloads_column[cid] ='".(int)pnVarPrepForStore($cid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	
	$screenshotlink = pnModGetVar('downloads', 'screenshotlink');
	$upload_folder = pnModGetVar('downloads','upload_folder');
	
	// delete the files from the server
	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($url,$lid) = $result->fields;
	
		// delete the  file
	    // if it exsists
	    is_file($upload_folder.pnVarPrepForOS($url));
	    
	    if ($filepointer === true)
	    {
		   	 if(false === unlink($upload_folder.pnVarPrepForOS($url)))
	    	{
	    		return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
	    	}
		}
    
	    $screenshot_extensions = array('.gif', '.jpg','.jpeg','.png');
	    
	    //check ext array end delete the old pics
	    foreach($screenshot_extensions as $shotext)
	    {
	        // if exsists delete screenshot
	         if(file_exists($screenshotlink.pnVarPrepForOS($lid.$shotext)))
	        {
	            unlink($screenshotlink.pnVarPrepForOS($lid.$shotext));
	        }
	
	        // if exsists delete thumbnail
	        if(file_exists($screenshotlink.pnVarPrepForOS('tn_'.$lid.$shotext)))
	        {
	             unlink($screenshotlink.pnVarPrepForOS('tn_'.$lid.$shotext));
	        }
	    }
	    
	    // Let any hooks know that we have deleted an item.  As this is a
	    // delete hook we're not passing any extra info
		pnModCallHooks('item', 'delete', $lid, '');
    }
    
    //now delete the file from db
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "DELETE FROM  $dl_downloads_table
            WHERE   	 $dl_downloads_column[cid]='" . (int)pnVarPrepForStore($cid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	
	return true;
}

/**
 * get download title and lid for a select list
 *
 *
 * @author
 * @author      Sascha Jost
 * @version     1.0
 * @param       none
 * @return      string		list of downloads
 */
function Downloads_adminapi_get_all_downloads($args)
{    
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	if (!isset($cid) || !is_numeric($cid))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[title],
						$dl_downloads_column[lid]
			FROM 		$dl_downloads_table
			WHERE       $dl_downloads_column[cid] ='".(int)pnVarPrepForStore($cid)."'
			ORDER BY 	$dl_downloads_column[lid]";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	$downloads_list = '';

	while( list($title, $lid)=$result->fields )
	{
		$result->MoveNext();

		if ($sel == true)
		{
			$selstr = 'selected="selected"';
		} else {
			$selstr = '';
		}

	   $downloads_list .= "<option value=\"".pnVarPrepForDisplay($lid)."\"$selstr>".pnVarPrepForDisplay($title)."</option>";

	}

	$result->Close();

	return $downloads_list;
}

/**
 *
 * do update download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @param        string $title
 * @param        integer $status
 * @param        integer $update
 * @param        integer $cid
 * @param        string $filesize
 * @param        integer $version
 * @param        integer $hits
 * @param        string $url
 * @param        string $description
 * @param        string $submitter
 * @param        string $submittermail
 * @param        string $homepage
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_do_update_download($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_EDIT))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }


	extract($args);
	unset($args);

	if (empty($hits)) 
	{
	 $hits = 0;
	}
	
	// Argument check
	if ((!isset($lid)) ||
		(!is_numeric($lid)) ||
        (!isset($title)) ||
        (is_numeric($title)) ||
        (!isset($status)) ||
		(!is_numeric($status)) ||
		(!isset($cid)) ||
		(!is_numeric($cid)) ||
		(!isset($filesize)) ||
		(!isset($version)) ||
		(!isset($hits)) ||
		(!is_numeric($hits)) ||
		(!isset($url)) ||
		(is_numeric($url)) ||		
		(is_numeric($description)) ||
		(is_numeric($submitter)) ||
		(is_numeric($submittermail)) ||
		(is_numeric($homepage)))
        {
  	         return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	    }

	// we set update only if a new is supplied 
	if(!isset($supply_flag))
	{
	  $supply_flag = false;
	}
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table =  $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

	if($supply_flag === true)
	{
	  $sql = "UPDATE  $dl_downloads_table
            SET     $dl_downloads_column[cid]          ='" . (int)pnVarPrepForStore($cid)."',
                    $dl_downloads_column[status]       ='" . (int)pnVarPrepForStore($status)."',
                    $dl_downloads_column[update]       = " . $dbconn->DBTimestamp(time()) . ",
                    $dl_downloads_column[title]        ='" . pnVarPrepForStore($title) . "',
                    $dl_downloads_column[url]          ='" . pnVarPrepForStore($url) . "',
                    $dl_downloads_column[filename]     ='" . pnVarPrepForStore($filename) . "',
                    $dl_downloads_column[description]  ='" . pnVarPrepForStore($description) . "',
                    $dl_downloads_column[email]        ='" . pnVarPrepForStore($submittermail) . "',
                    $dl_downloads_column[hits]         ='" . (int)pnVarPrepForStore($hits)."',
                    $dl_downloads_column[submitter]    ='" . pnVarPrepForStore($submitter) . "',
                    $dl_downloads_column[filesize]     ='" . pnVarPrepForStore($filesize) . "',
                    $dl_downloads_column[version]      ='" . pnVarPrepForStore($version)."',
                    $dl_downloads_column[homepage]     ='" . pnVarPrepForStore($homepage) . "'
            WHERE   $dl_downloads_column[lid]          ='" . (int)pnVarPrepForStore($lid)."'";
	}
	else
	{
	  $sql = "UPDATE  $dl_downloads_table
            SET     $dl_downloads_column[cid]          ='" . (int)pnVarPrepForStore($cid)."',
                    $dl_downloads_column[status]       ='" . (int)pnVarPrepForStore($status)."',
                    $dl_downloads_column[title]        ='" . pnVarPrepForStore($title) . "',
                    $dl_downloads_column[url]          ='" . pnVarPrepForStore($url) . "',
                    $dl_downloads_column[description]  ='" . pnVarPrepForStore($description) . "',
                    $dl_downloads_column[email]        ='" . pnVarPrepForStore($submittermail) . "',
                    $dl_downloads_column[hits]         ='" . (int)pnVarPrepForStore($hits)."',
                    $dl_downloads_column[submitter]    ='" . pnVarPrepForStore($submitter) . "',
                    $dl_downloads_column[filesize]     ='" . pnVarPrepForStore($filesize) . "',
                    $dl_downloads_column[version]      ='" . pnVarPrepForStore($version)."',
                    $dl_downloads_column[homepage]     ='" . pnVarPrepForStore($homepage) . "'
            WHERE   $dl_downloads_column[lid]          ='" . (int)pnVarPrepForStore($lid)."'";
	}
	
	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;
}

/**
 *
 * check for upload folder
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       array $check_info
 */
function Downloads_adminapi_check_upload_folder()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    // screenshot folder
    $upload_folder	= pnModGetVar('downloads','upload_folder');

    // Check for screenshot folder
    if(!is_dir($upload_folder))
    {
        // if is missing --> set flag
        $upload_folderislink = false;
    }else{
        $upload_folderislink = true;
	}

    // check if upload folder is writeable
    if(!is_writable($upload_folder))
    {
        // if is not writeable --> set flag
        $upload_folderiswrite = false;
    }else{
        $upload_folderiswrite = true;
	}

    $check_info   = array('upload_folderislink'    => $upload_folderislink,
                          'upload_folderiswrite'   => $upload_folderiswrite);

	return $check_info;
}

/**
 *
 * check for screenshot folder
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       array $check_info
 */
function Downloads_adminapi_check_screenshot_folder()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    // screenshot folder
    $screenshot_folder	= pnModGetVar('downloads','screenshotlink');

    // Check for screenshot folder
    if(!is_dir($screenshot_folder))
    {
        // if is missing --> set flag
        $screenshot_folderislink = false;
    }
	else
	{
        $screenshot_folderislink = true;
	}

    // check if upload folder is writeable
    if(!is_writable($screenshot_folder))
    {
        // if is not writeable --> set flag
        $screenshot_folderiswrite = false;
    }
	else
	{
        $screenshot_folderiswrite = true;
	}

    $check_info   = array('screenshot_folderislink'    => $screenshot_folderislink,
                          'screenshot_folderiswrite'   => $screenshot_folderiswrite);

	return $check_info;
}

/**
 *
 * check for cache folder
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       array $check_info
 */
function Downloads_adminapi_check_cache_folder()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    // screenshot folder
    $cache_folder	= pnModGetVar('downloads','captcha_cache');

    // Check for screenshot folder
    if(!is_dir($cache_folder))
    {
        // if is missing --> set flag
        $cache_folderislink = false;
    }
	else
	{
        $cache_folderislink = true;
	}

    // check if upload folder is writeable
    if(!is_writable($cache_folder))
    {
        // if is not writeable --> set flag
        $cache_folderiswrite = false;
    }
	else
	{
        $cache_folderiswrite = true;
	}

    $check_info   = array('cache_folderislink'    => $cache_folderislink,
                          'cache_folderiswrite'   => $cache_folderiswrite);

	return $check_info;
}

/**
 *
 * move category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $oldcid
 * @param        integer $newcid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_move_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    extract($args);
	unset($args);

	if ((!isset($oldcid)) ||
        (!is_numeric($oldcid)) ||
        (!isset($newcid)) ||
        (!is_numeric($newcid)))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	//check the order of the categories
	
	$sql = "SELECT  
                    $dl_categories_column[pid]
            FROM    $dl_categories_table
            WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($newcid)."'";

	$result =& $dbconn->Execute($sql);
	
	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	list($oldpid) = $result->fields;
    $result->Close();

	if($oldpid == $oldcid)
	{
		$sql = "SELECT  
                    	$dl_categories_column[pid]
            	FROM    $dl_categories_table
            	WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($oldcid)."'";

		$result =& $dbconn->Execute($sql);
		
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
		}
		
		list($changepid) = $result->fields;
    	$result->Close();
    	
    	$change = true;
    }
    
	$sql = "SELECT  
                    $dl_categories_column[cid]
            FROM    $dl_categories_table
            WHERE   $dl_categories_column[pid]='" . (int)pnVarPrepForStore($oldcid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	// is it a main category ?
    if(empty($cid))
    {
        $sql = "UPDATE  $dl_categories_table
                SET     $dl_categories_column[pid]='" . pnVarPrepForStore($newcid) . "'
                WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($oldcid)."'";

        $result =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
            return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
        }
    }
    else
    {
        while( list($cid)=$result->fields )
        {
            $sql = "UPDATE  $dl_categories_table
                    SET     $dl_categories_column[pid]='" . pnVarPrepForStore($newcid) . "'
                    WHERE   $dl_categories_column[pid]='" . (int)pnVarPrepForStore($cid)."'";

        	$result =& $dbconn->Execute($sql);

        	if ($dbconn->ErrorNo() != 0)
        	{
        		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
        	}
        }
    }
    $result->Close();
    
    if(true === $change)
    {	
		$sql = "UPDATE  $dl_categories_table
                SET     $dl_categories_column[pid]='" . pnVarPrepForStore($changepid) . "'
                WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($newcid)."'";

        $result =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
        	return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
        }
	}
	
	return true;
}

/**
 *
 * delete a category from db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_remove_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	if (!isset($cid) || !is_numeric($cid) )
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "DELETE FROM  $dl_categories_table
            	   WHERE $dl_categories_column[cid]='" . (int)pnVarPrepForStore($cid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;
}

/**
 *
 * move category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $oldcid
 * @param        integer $newcid
 * @return       bool true if the action succeeds
 */
function Downloads_adminapi_check_category_pid($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);

	if ((!isset($cid)) || (!is_numeric($cid)))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	//check if this category has childs
	
	$sql = "SELECT  
                    $dl_categories_column[pid],
                    $dl_categories_column[cid]
            FROM    $dl_categories_table
            WHERE   $dl_categories_column[pid]='" . (int)pnVarPrepForStore($cid)."'";

	$result =& $dbconn->Execute($sql);
	
	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	list($check_pid,$change_cid) = $result->fields;
    $result->Close();

	// if there are childs, change the order
	if($check_pid != 0)
	{
		$sql = "SELECT  
                    	$dl_categories_column[pid]
            	FROM    $dl_categories_table
            	WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($cid)."'";

		$result =& $dbconn->Execute($sql);
		
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
		}
		
		list($change_pid) = $result->fields;
	    $result->Close();
	    
	    $sql = "UPDATE  $dl_categories_table
                SET     $dl_categories_column[pid]='" . pnVarPrepForStore($change_pid) . "'
                WHERE   $dl_categories_column[cid]='" . (int)pnVarPrepForStore($change_cid)."'";

        $result =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
        	return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
        }
	}

	return true;
}

/**
 *
 * get modrequests
 *
 * @author       Lindbergh
 * @version      1.0
 * @return       array
 */
function Downloads_adminapi_get_modrequest()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_modrequest_table   =  $pntable['downloads_modrequest'];
	$dl_modrequest_column  = &$pntable['downloads_modrequest_column'];

	$sql = "SELECT  $dl_modrequest_column[requestid],
					$dl_modrequest_column[lid],
					$dl_modrequest_column[title],
					$dl_modrequest_column[description],
					$dl_modrequest_column[modifysubmitter],
					$dl_modrequest_column[email]  
			FROM 	$dl_modrequest_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	for (;!$result->EOF; $result->MoveNext())
    {

		list($requestid, $lid, $title, $description, $modifysubmitter, $email)=$result->fields;
		
		$request_info[] = array('requestid' => $requestid, 
								 'lid' => $lid,	
								 'title' => $title, 
								 'description' => $description, 
								 'modifysubmitter' => $modifysubmitter, 
								 'email' => $email);
		
	}
	return $request_info;
}

/**
 *
 * remove modrequests
 *
 * @author       Lindbergh
 * @version      1.0
 * @return       array
 */
function Downloads_adminapi_remove_modrequest($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }


	extract($args);
    unset($args);
    
    if (!isset($requestid) || !is_numeric($requestid))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_modrequest_table   =  $pntable['downloads_modrequest'];
	$dl_modrequest_column  = &$pntable['downloads_modrequest_column'];

	$sql = "DELETE FROM  $dl_modrequest_table
            WHERE   	 $dl_modrequest_column[requestid]='" . (int)pnVarPrepForStore($requestid)."'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	return true;
}

/**
 *
 * get hook files
 *
 * @author       Lindbergh
 * @version      1.1
 * @return       array
 */
function Downloads_adminapi_get_hook_files()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT   $dl_downloads_column[modid],
					 $dl_downloads_column[lid],
					 $dl_downloads_column[title],
					 $dl_downloads_column[objectid]
			FROM 	 $dl_downloads_table
			WHERE    $dl_downloads_column[cid]='0'
			ORDER BY $dl_downloads_column[modid]";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}
	for (;!$result->EOF; $result->MoveNext())
    {

		list($modid, $lid, $title, $objectid)=$result->fields;
		
		$files_info[] = array('modid' => $modid, 
							  'lid' => $lid,	
							  'title' => $title,
							  'objectid' => $objectid
							  );
		
	}
	return $files_info;
}
?>