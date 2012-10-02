<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
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
 * add new download to db
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        all arguments from add 
 * @return       bool	true
 */
function Downloads_userapi_adddownload($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	// Argument check
	if ((!isset($title)) ||
		(is_numeric($title)) ||
		(!isset($cid)) ||
		(!is_numeric($cid)) ||
		(!isset($file_size)) ||
		(!is_numeric($file_size)) ||
		(!isset($description)) ||
		(is_numeric($description)) ||
		(is_numeric($userfile_name)) ||
		(is_numeric($userurl)) ||
		(is_numeric($submitter)) ||
		(is_numeric($submittermail)) ||
		(is_numeric($homepage)))
		{
  	         return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	    }

    $upload_folder = pnModGetVar('downloads','upload_folder');

		// hook releated checks
	if(!isset($modid))
	{
	  $modid = 0;
	}
	
	if(!is_numeric($objectid) || empty($objectid))
	{
	  $objectid = 0;
	}
	
    //check if a download with the same title exsits in the choosen category
    if(false === pnModAPIFunc('Downloads','user','checkforitem', array(	'title' => $title,'cid' => $cid )))
    {
      return errorpage(__FILE__,__LINE__,__('A download with this URL already exsists!', $dom),true, false, false);
    }
    
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table  = &$pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

	// not supported by all DBMS
    $nextid = $dbconn->GenId($dl_downloads_table);

    // let's see if we had an url or a file and set a flag
    if(empty($userurl)&& !empty($userfile_name))
	{
	  	// get the file extension
    	$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', 
									array('filename' 	=> $userfile_name,
										  'upload' 		=> true));
							  
		$url = $nextid.$file_extension;
	}
	else
	{
		$url = $userurl;
		$fileflag = false;
	}

	

	if (pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADMIN))
	{
			$sql = "INSERT INTO $dl_downloads_table
					(
					$dl_downloads_column[lid],
	 				$dl_downloads_column[cid],
					$dl_downloads_column[status],
					$dl_downloads_column[update],
					$dl_downloads_column[title],
					$dl_downloads_column[url],
					$dl_downloads_column[filename],
					$dl_downloads_column[description],
					$dl_downloads_column[date],
					$dl_downloads_column[email],
					$dl_downloads_column[hits],
					$dl_downloads_column[submitter],
    				$dl_downloads_column[filesize],
    				$dl_downloads_column[version],
    				$dl_downloads_column[homepage],
    				$dl_downloads_column[modid],
    				$dl_downloads_column[objectid]
					)
    			VALUES
    				(
					'" .(int)pnVarPrepForStore($nextid) . "',
    				'" . (int)pnVarPrepForStore($cid) ."',
   					'1',
    				'0',
    				'" . pnVarPrepForStore($title) . "',
    				'" . pnVarPrepForStore($url) . "',
    				'" . pnVarPrepForStore($userfile_name) . "',
    				'" . pnVarPrepForStore($description) . "',
    				" . $dbconn->DBTimestamp(time()) . ",
    				'" . pnVarPrepForStore($submittermail) . "',
    				'0',
    				'" . pnVarPrepForStore($submitter) . "',
    				'" . (int)pnVarPrepForStore($file_size) . "',
    				'" . pnVarPrepForStore($version) . "',
    				'" . pnVarPrepForStore($homepage) . "',
    				'" . (int)pnVarPrepForStore($modid) . "',
    				'" . pnVarPrepForStore($objectid) . "'
                    )";
	}
    else if(pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
    {
    		$sql = "INSERT INTO $dl_downloads_table
    					(
						$dl_downloads_column[lid],
    					$dl_downloads_column[cid],
    					$dl_downloads_column[status],
    				    $dl_downloads_column[update],
    					$dl_downloads_column[title],
    					$dl_downloads_column[url],
    					$dl_downloads_column[filename],
    					$dl_downloads_column[description],
    					$dl_downloads_column[date],
    					$dl_downloads_column[email],
   						$dl_downloads_column[hits],
   						$dl_downloads_column[submitter],
    					$dl_downloads_column[filesize],
    					$dl_downloads_column[version],
    					$dl_downloads_column[homepage],
    					$dl_downloads_column[modid],
    				    $dl_downloads_column[objectid]
						)
    				VALUES
    					(
						'" .(int)pnVarPrepForStore($nextid) . "',
    					'" . (int)pnVarPrepForStore($cid) ."',
   						'0',
    				    '0',
    					'" . pnVarPrepForStore($title) . "',
    					'" . pnVarPrepForStore($url) . "',
    					'" . pnVarPrepForStore($userfile_name) . "',
    					'" . pnVarPrepForStore($description) . "',
    					" . $dbconn->DBTimestamp(time()) . ",
    					'" . pnVarPrepForStore($submittermail) . "',
   						'0',
   						'" . pnVarPrepForStore($submitter) . "',
    					'" . (int)pnVarPrepForStore($file_size) . "',
    					'" . pnVarPrepForStore($version) . "',
    					'" . pnVarPrepForStore($homepage) . "',
    					'" . (int)pnVarPrepForStore($modid) . "',
    					'" . pnVarPrepForStore($objectid) . "'
    					)";
    	}
    	
    	$dbconn->Execute($sql);
    	
    	if ($dbconn->ErrorNo() != 0)
        {
            return errorpage(__FILE__,__LINE__,__('Failed to create the new download.', $dom));
    	}
    	
    $lid = $dbconn->PO_Insert_ID($dl_downloads_table, $dl_downloads_column['lid']);
    	
    // need this stuff because $dbconn->GenId($dl_downloads_table); is not working on my testsystem
    // if you know a better solution let me know
    if(empty($userurl)&& !empty($userfile_name))
	{	
	    $url = $lid.$file_extension;	
	    
	    $sql = "UPDATE 	$dl_downloads_table
	            SET 	$dl_downloads_column[url] = '" . pnVarPrepForStore($url) . "'
	            WHERE 	$dl_downloads_column[lid] = " .(int)pnVarPrepForStore($lid);
	            
	    $dbconn->Execute($sql);
	
	    if ($dbconn->ErrorNo() != 0) 
		{
	        return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	    }
    }
    
    // let all hooks know that we have a new item
    $item = array();
	$item['objectid'] = $lid;
	$item['modname'] = 'Downloads';
	pnModCallHooks('item', 'create', $lid, $item);
	
	// send an email notification
    if (pnModAvailable('Mailer')) 
	{
	  	pnModAPIFunc('Downloads', 'notify', 'send_notification', array('lid'=> $lid,
																  	   'cid' => $cid,
    															       'title' => $title)); 
	}	
		
    // return the id of the new download
    return $lid;
}

 /**
 *
 * check if download exsists
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        title
 * @return       bool	true
 */
function Downloads_userapi_checkforitem($args)
{
   	$dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
    unset($args);
    
    // Argument check
	if ((!isset($title)) || (is_numeric($title)) || (!isset($cid)) || (!is_numeric($cid)))
    {
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }
	    
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
    $dl_downloads_table   = &$pntable['downloads_downloads'];
    $dl_downloads_column  = &$pntable['downloads_downloads_column'];
    
    $sql =  "SELECT COUNT(*)
             FROM  $dl_downloads_table
             WHERE $dl_downloads_column[title]='".pnVarPrepForStore($title)."' AND $dl_downloads_column[cid] ='".(int)pnVarPrepForStore($cid)."'";

    $result =& $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
    list($urlcount) = $result->fields;

	$result->Close();
    
    if ($urlcount > 0)
    {
        return false;
    }
    
    // return a value maybe we could use it later
    return true;
}

/**
 *
 * prepare the upload of the user file
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        all arguments from add or update
 * @return       bool	true
 */
function Downloads_userapi_prepare_upload($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
    unset($args);

    if	((!isset($file_name)) ||
	 	 (is_numeric($file_name)) ||
	     (!isset($lid)) ||
	     (!is_numeric($lid))||
	     (!isset($file_tmp)) ||
	     (!isset($nopicsend)) ||
	     (is_numeric($nopicsend))||
	     (is_numeric($file_tmp)))
	{
       return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }

	$upload_folder = pnModGetVar('downloads','upload_folder');
	
	//check for gd
    $is_gd = pnModGetVar('downloads', 'gd');
    
	// get the file extension
    $file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', 
									array('filename' 	=> $file_name,
										  'upload' 		=> true));
    
    $pos = strpos($file_extension, '.');
    
    $temp_file_extension = substr($file_extension, ($pos+1)); 
    
 	//array of not allowed extension for upload
    $allowed_extensions = pnModGetVar('downloads', 'allowed_extensions');      
    
	$allowed_extensions = explode(',',$allowed_extensions);
	           
    // check if extension is allowed for upload and limit extension is active
    if(false === in_array($temp_file_extension,$allowed_extensions)  && pnModGetVar('downloads','limit_extension') == 'yes')
    {
      	//wrong extension --> we delete the download from database
        $downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
										array('lid' => $lid));
										
    	return errorpage(__FILE__,__LINE__,__('The extension of the submitted file is not allowed!', $dom));
    }

    //here we do the file upload and we check if it succeeds
    if(false === pnModAPIFunc('Downloads','user','do_php_upload', 
							   array('upload_folder' => $upload_folder,
							   		 'file_name'     => $file_name,
                                     'file_tmp'      => $file_tmp,
                                     'file_extension'=> $file_extension,
                                     'downloadid'    => $lid)))
    {
        //upload fails --> we delete the download from database
        $downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
										array('lid' => $lid));
        //and show an appropriate message
        return errorpage(__FILE__,__LINE__,__('Upload failed!', $dom));
    }
                
    if(false == $nopicsend)
    {
		// here wo do the screenshot/thumbnail upload
	    $myimage = pnModAPIFunc('Downloads','user','imageup',array('lid' => $lid));
	                
		extract($myimage);
	    unset($myimage);
	                
	    // the screenshot upload succeeds
	    // and gd is active we do the thumbnail creation
	    if(true === $success && $is_gd == 1)
	    {
	    	$imagesupport = pnModAPIFunc('Downloads','image','gd_create_thumbnail',
										  array('filename' 				=> $filenamesc,
										 	    'thumbnailpathandname' 	=> $filenametn,
											    'mimetyp' 				=> $mimetyp));
	    }
	    else
	    {				
	    	return errorpage(__FILE__,__LINE__,__('Image upload failed. Check your image folder permissions!', $dom));
	    }
	}
	// return a value maybe we could use it later
    return true;
}

/**
 *
 * upload the userfile to the server
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        all arguments from add or update
 * @return       bool	true
 */
function Downloads_userapi_do_php_upload($args, $actfile='', $newfile = 0)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
    unset($args);

    if	((!isset($downloadid)) ||
	 	(!is_numeric($downloadid)) ||
	    (!isset($upload_folder)) ||
		(is_numeric($upload_folder))||
		(!isset($file_extension)) ||
		(is_numeric($file_extension))||
        (!isset($file_name)) ||
        (is_numeric($file_name)) ||
		(!isset($file_tmp)) ||
		(is_numeric($file_tmp)))
	{
       return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }

    // check if a new file from update procedure is supplied
    if($newfile === 1 && !empty($actfile))
    {
	     if(file_exists($upload_folder . pnVarPrepForOS($actfile)))
	     {   
    		// delete the old file
	        if(false === unlink($upload_folder . pnVarPrepForOS($actfile)))
	        {
	          return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
	        }
	     }
    }
    
    // create the name of the file to be uploaded
    // maybe we should save the name of the file in db
    // so we are able to recreate the filenmane before
    // we hand it out to the user
    $upload_name = $downloadid.$file_extension;
    if(false === move_uploaded_file($file_tmp, $upload_folder . pnVarPrepForOS($upload_name)))
    {
      return false;
    }
    else
    {
      return true;
    }
}

/**
 * Additional function for Downloads
 *
 * This function provides the image upload and replacement for downloads
 *
 * @author       Lindbergh
 * @version      1.6
 * @param        $lid - download id
 * @return       bool -  true
 */
function Downloads_userapi_imageup($args, $newpic = 0)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage( __FILE__,__LINE__,__('No authorization!', $dom));
    }
    
   //Load API
    if (!pnModAPILoad('Downloads', 'admin'))
    {
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		return pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}

 	extract($args);
    unset($args);
	
    if	((!isset($lid)) || (!is_numeric($lid)))
	{
       return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }
    
    //get some useful mod vars
    $screenshotmaxsize 	= pnModGetVar('downloads', 'screenshotmaxsize');
	$thumbnailmaxsize 	= pnModGetVar('downloads', 'thumbnailmaxsize');
	$screenshotlink 	= pnModGetVar('downloads', 'screenshotlink');
	
	$screenshotmaxsize = explode('-', pnModGetVar('downloads', 'screenshotmaxsize'));
	$thumbnailmaxsize = explode('-', pnModGetVar('downloads', 'thumbnailmaxsize'));
	
	// convert the file size 
	$converted_sc = pnModAPIFunc('Downloads','user','convert_filesize',
		  			array('filesize'	=> $screenshotmaxsize[0],
	                	'sizetypein'	=> $screenshotmaxsize[1],
						'sizetypeout' => 'b'));
							  
	$converted_sc = round($converted_sc);
	
	// convert the file size 
	$converted_tn = pnModAPIFunc('Downloads','user','convert_filesize',
		  			array('filesize'	=> $thumbnailmaxsize[0],
	                	'sizetypein'	=> $thumbnailmaxsize[1],
						'sizetypeout' => 'b'));
							  
	$converted_tn = round($converted_tn);
	
    //check for gd
    $is_gd = pnModGetVar('downloads', 'gd');
    
    //check screenshotlink
 	if (empty($screenshotlink))
	{
		$screenshotlink = 'pnTemp/downloads_screenshots/';
    }
    
    // added png support
    $screenshot_extensions = array('.gif', '.jpg', '.jpeg','.png');
    
    // new images supplied by update procedure
    if($newpic == 1)
    {
        //check ext array end delete the old pics
        foreach($screenshot_extensions as $shotext)
        {
            // if exsists delete screenshot
              if(file_exists($screenshotlink . pnVarPrepForOS($lid.$shotext)))
            {
                  unlink($screenshotlink . pnVarPrepForOS($lid.$shotext));
            }

            // if exsists delete thumbnail
            if(file_exists($screenshotlink . pnVarPrepForOS('tn_' .$lid.$shotext)))
            {
                unlink($screenshotlink . pnVarPrepForOS('tn_' .$lid.$shotext));
            }
        }
    }
    
    //screenshot
    $tempnamesc 	= $_FILES['screenshot']['tmp_name'][0];
    $filenamesc		= $_FILES['screenshot']['name'][0];
    $typesc			= $_FILES['screenshot']['type'][0];
    $sizesc			= $_FILES['screenshot']['size'][0];
	
	
    // if gd is active we don't need this
    if($is_gd === 0)
    {
        //thumbnail
        $tempnametn 	= $_FILES['screenshot']['tmp_name'][1];
        $filenametn 	= $_FILES['screenshot']['name'][1];
        $typetn 		= $_FILES['screenshot']['type'][1];
        $sizetn 		= $_FILES['screenshot']['size'][1];
    }

		//check screenshot filetype
	    if($typesc != 'image/gif' && $typesc != 'image/jpeg' && $typesc != 'image/png')
		{
		  	//wrong file type --> we delete the download from database
        	$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
											array('lid' => $lid));
	    	return errorpage(__FILE__,__LINE__,__('Invalid file type for the screenshot. Only GIF and JPG files are allowed.', $dom));
	    }

        if($is_gd === 0)
        {
    	    //check thumbnail filetype
    	    if($typesc != 'image/gif' && $typesc != 'image/jpeg' && $typesc != 'image/png')
    		{
    		  	//wrong file type --> we delete the download from database
        		$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
												array('lid' => $lid));
    	    	return errorpage(__FILE__,__LINE__,__('Invalid file type for the thumbnail. Only GIF and JPG files are allowed.', $dom));
    	    }
        }
        
        // if gd is active we don't need this
        if($is_gd === 0)
        {
        
    	    //check if thumbnail filesize is greater than screenshot filesize
    	    if($sizetn > $sizesc)
    		{
    		  	//wrong file size --> we delete the download from database
        		$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
												array('lid' => $lid));
    	    	return errorpage(__FILE__,__LINE__,__('The thumbnail file size is bigger than the screenshot file size. This is not allowed.', $dom));
    	    }
            else
            { // if check is ok check if filesize is greater than maxfilesize

    			    //check screenshot filesize
    			    if($sizesc > $converted_sc)
    				{
    				  	//wrong file size --> we delete the download from database
        				$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
														array('lid' => $lid));
                        return errorpage(__FILE__,__LINE__,__('The file size of yor screenshot is to big. Use a smaller one.', $dom));
    			    }

    				//check thumbnail filesize
    			    if($sizetn > $converted_tn)
    				{
    				  	//wrong file size --> we delete the download from database
        				$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
														array('lid' => $lid));
    			    	return errorpage(__FILE__,__LINE__,__('The file size of yor thumbnail is to big. Use a smaller one.', $dom));
    			    }
         	}
        }
        
    //check screenshot filesize
    if($sizesc > $screenshotmaxsize)
    {
      	//wrong file size --> we delete the download from database
        $downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',
										array('lid' => $lid));
        return errorpage(__FILE__,__LINE__,__('The file size of yor screenshot is to big. Use a smaller one.', $dom));
    }

    // create filename for the screenshot tempfile
	$ext = strToLower( eregi_replace( '.*\.', '', $filenamesc ) );
	$filenamesc =  $screenshotlink . pnVarPrepForOS($lid . '.' . $ext);
    
    // create filename for the thumbnail tempfile
    $ext = strToLower( eregi_replace( '.*\.', '', $filenametn ) );
    $filenametn =  $screenshotlink . pnVarPrepForOS('tn_'. $lid) ;
    
    //--> move screenshot
    move_uploaded_file($tempnamesc,$filenamesc);

    // if gd is active we don't need this
    if($is_gd === 0)
    {
        $filenametn =  $screenshotlink . 'tn_'. $lid . $ext;
        //--> move thumbnail
        move_uploaded_file($tempnametn,$filenametn);
    }
 
    $theretvals = array('filenamesc' => $filenamesc, 
						'filenametn' => $filenametn, 
						'mimetyp' => $typesc, 
						'success' => true, 
						'is_gd' => $is_gd);

	return $theretvals;

}
 
/**
 *
 * check image folders
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       array of boolean variables
 */
function Downloads_userapi_checkimagefolder()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    // screenshot folder
    $screen_folder	= pnModGetVar('downloads','screenshotlink');

    // Check for screenshot folder
    if(!is_dir($screen_folder))
    {
        return errorpage(__FILE__,__LINE__,__('Could not find screen shot folder!', $dom) );
    }

    // check if upload folder is writeable
    if(!is_writable($screen_folder))
    {
        return errorpage(__FILE__,__LINE__,__('Could not write to screen shot folder!', $dom) );
    }

	return true;

}
 
 
 
/**
 * Additional function for Downloads
 *
 * gets cat name by cid (used by pnadmin)
 *
 * @author       unknown
 * @author       Sascha Jost
 * @version      1.0
 * @param        $cid       category id
 * @return       bool		true
 */
function Downloads_userapi_Cat_Name_From_CID($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);
	
    if	((!isset($cid)) || (!is_numeric($cid)))
	{
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_categories_table  = $pntable['downloads_categories'];
    $dl_categories_column = &$pntable['downloads_categories_column'];

    $sql = "SELECT $dl_categories_column[title]
            FROM   $dl_categories_table
            WHERE  $dl_categories_column[cid] = '" . (int)pnVarPrepForStore($cid)."'";
            
    $result =& $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
    list($catname) = $result->fields;
    $result->Close();

    return $catname;
}

/**
 * Additional function for Downloads
 *
 * Get the Catname from download ID
 *
 * @author       unknown
 * @author       Sascha Jost
 * @version      1.0
 * @param        $lid       download id
 * @return       integer	category id
 */
function Downloads_userapi_item_cid_from_lid($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);

    if	((!isset($lid)) ||(!is_numeric($lid)))
	{
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

    $sql = "SELECT $dl_downloads_column[cid]
            FROM   $dl_downloads_table
            WHERE  $dl_downloads_column[lid] = '" . (int)pnVarPrepForStore($lid)."'";
                 
    $result =& $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
    
    list($cid) = $result->fields;
    $result->Close();

    return $cid;
}


/**
 * Additional function for Downloads
 *
 *
 * @author
 * @author      Sascha Jost
 * @version     1.0
 * @param       $cid        category id
 * @return      string		image tags
 */
function Downloads_userapi_file_new_icon($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);
    
	$dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
	
    $dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];
    
	// get by cid
	if(true === $get_by_cid)
	{
		$wherestring = " WHERE $dl_downloads_column[cid] ='".(int)pnVarPrepForStore($cid)."' AND $dl_downloads_column[status] =1 ";
	}
	
	// get by lid
	if(true === $get_by_lid)
	{
		$wherestring = " WHERE $dl_downloads_column[lid] ='".(int)pnVarPrepForStore($lid)."' AND $dl_downloads_column[status] =1 ";
	}
	
	$sql = "SELECT   $dl_downloads_column[date]
            FROM     $dl_downloads_table".$wherestring;
            
     // get by lid
	if(true === $get_by_lid)
	{       
		//echo$sql;
		$result = $dbconn->SelectLimit($sql, 1);
		//echo$result;
	}
	
	 // get by cid
	if(true === $get_by_cid)
	{       
		$result = $dbconn->Execute($sql);
		//echo$sql;
	}
	
   	for (; !$result->EOF; $result->MoveNext())
	{
		list($date) = $result->fields;

		if (!$date) return;
	
		$date = strtotime($date);
		$date = date("d F Y", $date);
	
		$count = 0;
		
	    while ($count <= 7) 
		{
		  	$date_now = (time()-(86400 * $count));
			$date_now = date("d F Y",$date_now);
			
	        if ($date_now == $date) 
			{
		        if ($count<=1) 
				{
		        	$newlinkgraphic='1';
		    	}
		    	
	            if ($count<=3 && $count>1) 
				{
	        		$newlinkgraphic='3';
	    		}
	    		
	            if ($count<=7 && $count>3) 
				{
	        		$newlinkgraphic='7';
	    		}
			}
			
	        $count++;
	    }
	}
    return $newlinkgraphic;
}

/**
 * Additional function for Downloads
 *
 *
 * @author		?
 * @author      Sascha Jost
 * @version     1.0
 * @param       $cid
 * @return      string		list of categories
 */
function Downloads_userapi_catSelectList($args)
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
		$cid = 0;
	}
	
	if (!isset($sel) || !is_numeric($sel))
	{
		$sel = 0;
	}
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
						$dl_categories_column[cid]
			FROM 		$dl_categories_table
			WHERE 		$dl_categories_column[pid] ='".(int)pnVarPrepForStore($cid)."'";
			
	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	$categories_list = "";
	
	while( list($cid)=$result->fields )
	{
		$result->MoveNext();
		if ($sel == $cid)
		{
			$selstr = 'selected="selected"';
		}
        else
        {
			$selstr = '';
		}
		// Security check
    	if (pnSecAuthAction(0, 'Downloads::Category', "Add::$cid", ACCESS_ADD))
		{
			$categories_list .= "<option value=\"$cid\" $selstr>".Downloads_userapi_catNavPath(array('cid' => $cid, 'start' => 0, 'links' => 0, 'linkmyself' => 0))."</option>";
            $categories_list .= Downloads_userapi_catSelectList(array('cid' => $cid, 'sel' => $sel));
		}
	}
	
	$result->Close();
	
	return $categories_list;
}

/**
 * Additional function for Downloads
 *
 *
 * @author      toph
 * @author      Sascha Jost
 * @version     1.0
 * @param       $cid
 * @return      string		
 */
function Downloads_userapi_catNavPath($args)
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
	
	if( !isset($start) )
	{
		$start = 1;
	}
	if( !isset($links) )
	{
		$links = 1;
	}
	if( !isset($linkmyself) )
	{
		$linkmyself = 1;
	}

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
					$dl_categories_column[pid],
					$dl_categories_column[title]
			FROM 	$dl_categories_table
			WHERE 	$dl_categories_column[cid] ='".(int)pnVarPrepForStore($cid)."'";
			
	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	$frontendstyle = pnModGetVar('downloads', 'frontendstyle');
		
	$seperator = ' / ';

	list($pid, $title)=$result->fields;
	
	if ($linkmyself)
	{
	  	if ($frontendstyle == 1 ) 
	    {
			$cpath = "<a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid' => $cid)))."\">".pnVarPrepForDisplay($title)."</a>";
		}
		else
		{
			$cpath = "<a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'sublevel', array('cid' => $cid)))."\">".pnVarPrepForDisplay($title)."</a>";
		}
	}
    else
    {
      	// Security check
    	if (pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
        	$cpath = pnVarPrepForDisplay($title)." (ID = ".pnVarPrepForDisplay($cid).")";
    	}
    	else
    	{
		  	$cpath = pnVarPrepForDisplay($title);
		}

	}
	
	while ($pid != 0)
	{
		$sql = "SELECT
						$dl_categories_column[cid],
						$dl_categories_column[pid],
						$dl_categories_column[title]
				FROM 	$dl_categories_table
				WHERE 	$dl_categories_column[cid] = '".(int)pnVarPrepForStore($pid)."'";
		
		$result =& $dbconn->Execute($sql);
		
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
		}
		
		list($cid, $pid, $title)=$result->fields;
		
		if ($links)
		{
			if ($frontendstyle == 1 ) 
	    	{
	    		$cpath = "<a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid' => $cid)))."\">".pnVarPrepForDisplay($title)."</a>${seperator}${cpath}";
	    	}
		  	else
		  	{
			    $cpath = "<a href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'sublevel', array('cid' => $cid)))."\">".pnVarPrepForDisplay($title)."</a>${seperator}${cpath}";
			}
		}
        else
        {
          // Security check
    		if (pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
			{
        		$cpath = pnVarPrepForDisplay($title)." (ID = ".pnVarPrepForDisplay($cid).")". "${seperator}${cpath}";
    		}
    		else
    		{
			  	$cpath = pnVarPrepForDisplay($title). "${seperator}${cpath}";
			}

		}
	}
	
	if ($start)
	{
		$cpath="<a href=\"".pnModURL('Downloads', 'user', 'main')."\">".__('Main page', $dom)."</a>${seperator}${cpath}";
	}
	
	$result->Close();
	
	return $cpath;
}

/**
 * get download(s) information(s)
 *
 *
 * @author      Sascha Jost
 * @version     1.2
 * @param       $lid 		    -	download id
 * @param       $cid 		    -	category id
 * @param       $getall 	    -	get all downloads
 * @param       $sort_active 	-	use sort
 * @param       $sortby 	    -	the column which results are sort by
 * @param		$cclause 	    -	collateral clause
 * @param		$sort_date 	    -	date to sort by
 * @param		$limit 	        -	limit for returned items
 * @param		$modid 	        -	hook releated module id
 * @param		$objectid 	    -	hook releated object id
 * @param		$admin_mod 	    -	flag for admin access
 * @return      array with all information for one or more download(s)
 */
function Downloads_userapi_get_download_info($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);

    unset($args);

    if (!isset($cid) ||
	   	!is_numeric($cid)||
	    !isset($sort_date) ||
		!is_numeric($sort_date)||
		!isset($start) ||
		!is_numeric($start))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}

	// hook releated checks
	if(!isset($modid))
	{
	  $modid = 0;
	}
	
	if(!is_numeric($objectid) || empty($objectid))
	{
	  $objectid = 0;
	}
	
	// how many items should we return
	if(empty($limit))
	{
		$limit = pnModGetVar('downloads', 'perpage');
	}
	
	$itemsperpage = $limit;	
	
	// create empty array
	$download_info = array();
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];

	//check sortby
	$sortby_allowed = array('title','hits','date');
	
	if(!in_array($sortby, $sortby_allowed))
	{
		$sortby = pnModGetVar('downloads', 'standard_sortby');
	}

	//check collateral clause
	$cclause_allowed = array('ASC','DESC');
	
	if(!in_array($cclause, $cclause_allowed))
	{
		$cclause = pnModGetVar('downloads', 'collateral_clause');
	}

	$wherestring = " WHERE $dl_downloads_column[status] =1 AND $dl_downloads_column[cid] > 0 ";
	
	// use sort
	if(true === $sort_active)
	{
		if (!is_numeric($sortby)) 
		{
		    $sortstring = " ORDER BY $dl_downloads_column[$sortby] $cclause ";
		}
		else
		{
		  	$sortstring = '';
		} 
	}
	
	// get all downloads from cid
	if(true === $get_by_cid)
	{
		$wherestring = " WHERE $dl_downloads_column[cid] ='".(int)pnVarPrepForStore($cid)."' AND $dl_downloads_column[status] =1 ";
	}
	
	if (!isset($admin_mod))
	{
		$admin_mod = false;
	}
	
	// get a single download by its lid
	if(true === $get_by_lid)
	{
	  	// Security check
    	if (pnSecAuthAction(0, 'Downloads::', '::', ACCESS_EDIT) && ($admin_mod === true))
		{
       		$wherestring = " WHERE $dl_downloads_column[lid] ='".(int)pnVarPrepForStore($lid)."' ";
    	}
	  	else
	  	{
		    $wherestring = " WHERE $dl_downloads_column[lid] ='".(int)pnVarPrepForStore($lid)."' AND $dl_downloads_column[status] =1 ";
		}
	}

	// get downloads by their upload date
	if(true === $get_by_date)
	{
	  	$selectdate = $sort_date;
	  	$newdownloadDB = Date("Y-m-d", $selectdate);
		$newdownloadDB_upper = date("Y-m-d", $selectdate + 86400);
		
	  	$wherestring = " WHERE    $dl_downloads_column[date] >= '" . pnVarPrepForStore($newdownloadDB) . "'
		   				 AND      $dl_downloads_column[date] < '" . pnVarPrepForStore($newdownloadDB_upper) . "' AND $dl_downloads_column[status] =1 AND $dl_downloads_column[cid] > 0";
	}
	
	// get downloads for hook action
	if(true === $get_by_hook)
	{
	  	$wherestring = " WHERE    $dl_downloads_column[modid] = '" . pnVarPrepForStore($modid) . "'
		   				 AND      $dl_downloads_column[objectid] = '" . pnVarPrepForStore($objectid) . "' AND $dl_downloads_column[status] =1 AND $dl_downloads_column[cid] = 0";
		
		$itemsperpage = pnModGetVar('downloads', 'perpage');
	}
		
	  	$sql = "SELECT
						$dl_downloads_column[lid],
						$dl_downloads_column[cid],
						$dl_downloads_column[status],
						$dl_downloads_column[update],
						$dl_downloads_column[title],
						$dl_downloads_column[url],
						$dl_downloads_column[filename],
						$dl_downloads_column[description],
						$dl_downloads_column[date],
						$dl_downloads_column[email],
						$dl_downloads_column[hits],
						$dl_downloads_column[submitter],
						$dl_downloads_column[filesize],
						$dl_downloads_column[version],
						$dl_downloads_column[homepage],
						$dl_downloads_column[modid],
    					$dl_downloads_column[objectid]
				FROM 	$dl_downloads_table".$wherestring.$sortstring;

	if(is_numeric($start) && $start >= 0) 
	{
        $result = $dbconn->SelectLimit($sql, $itemsperpage, $start);
    } 
	else
	{
        $result = $dbconn->Execute($sql);
    }

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	for (;!$result->EOF; $result->MoveNext())
    {

		list($lid, $cid, $status, $update, $title, $url, $filename, $description, $date, $email, $hits, $submitter, $filesize, $version,$homepage, $modid, $objectid )=$result->fields;
	
		// permission check for the category
        if (pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_READ))
		{
		  
			// permission check for the file 
	        if (pnSecAuthAction(0, 'Downloads::Item', "$lid::", ACCESS_READ)) 
			{
			  
				// url flag
				$outsideflag = false;
				$pictureflag = false;
				
				$date 	= strtotime($date);

				$update = strtotime($update);
				
				// check if the download is a link
				if( true == eregi("HTTP",$url))
				{
					$outsideflag = true;
				}
		
				// get the screenshot & thumbnail
				$images = pnModAPIFunc('Downloads','user','get_shot_by_lid',array('lid' => $lid));
							
				//get the images size
				$thsize 	= getimagesize($images['thumbnail']);
				
				// get the params for the img tag
				$thumbsize = "{$thsize[3]}";
				
				if(!empty($images['screenshot']) && !empty($images['thumbnail']))
				{
					$pictureflag = true;
				}
				
				$mimetype_pic_ex = 'icon_'.substr(strrchr($url,'.'),1).'.gif';
		
				if (file_exists(pnVarPrepForOS('modules/Downloads/pnimages/mime_types/'.$mimetype_pic_ex))) 
				{
				    $mimetype_pic = $mimetype_pic_ex;
				} 
				else 
				{
				    $mimetype_pic = 'icon_default.gif';
				}			
				
				if(false === $admin_mod)
				{
					$filesize = pnModAPIFunc('Downloads','user','calcsize',array('filesize' => $filesize));
				}
					
				// prepare values
				list($homepage,$submitter) = pnVarPrepForDisplay($homepage,$submitter);
				$description = pnVarPrepHTMLDisplay($description);

				$download_info[] = array('lid' 				=> $lid, 
										 'cid' 				=> $cid,
										 'status' 			=> $status, 
										 'update' 			=> $update, 
										 'title' 			=> $title, 
										 'url' 				=> $url, 
										 'filename' 		=> $filename, 
										 'description' 		=> $description, 
										 'date' 			=> $date, 
										 'email' 			=> $email, 
										 'hits' 			=> $hits, 
										 'submitter' 		=> $submitter, 
										 'filesize' 		=> $filesize, 
										 'version' 			=> $version, 
										 'homepage' 		=> $homepage, 
										 'modid' 			=> $modid, 
										 'objectid' 		=> $objectid, 
										 'outsideflag' 		=> $outsideflag, 
										 'screenshot' 		=> $images['screenshot'],
										 'thumbnail' 		=> $images['thumbnail'], 
										 'pictureflag' 		=> $pictureflag,
										 'mimetype_pic' 	=> $mimetype_pic,
									     'thumbsize' 		=> $thumbsize);
			
			}
		}
	}
	$result->Close();

	return $download_info;
}

/**
 * get screenshot by lid
 *
 *
 * @author      Sascha Jost
 * @version     1.1
 * @param       $lid     	download id
 * @return      array with links to screenshot and thumbnail
 */
function Downloads_userapi_get_shot_by_lid($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
	if(!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	extract($args);
	unset($args);

	if( (!isset($lid)) || (!is_numeric($lid)))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}

	// create empty array
	$image = array();

	 // added png support
    $screenshot_extensions = array('.gif', '.jpg', '.jpeg','.png');
	
	// Picture folder
	$screenshotlink = pnModGetVar('downloads', 'screenshotlink');

	//check if screenshot and thumbnail exsists
	foreach($screenshot_extensions as $ext)
	{
		 if((true === is_file($screenshotlink . pnVarPrepForOS($lid.$ext))))
		{
			 $screenshot = $screenshotlink . pnVarPrepForOS($lid.$ext);
		}

		 if((true === is_file($screenshotlink . pnVarPrepForOS("tn_".$lid. $ext))))
		{
			 $thumbnail  = $screenshotlink . pnVarPrepForOS("tn_".$lid.$ext);
		}
		
		$image = array('screenshot' => $screenshot, 'thumbnail' => $thumbnail);
	}
	return $image;
}

/**
 * get all categories from db
 *
 *
 * @author      Sascha Jost
 * @version     1.0
 * @param       $lid     	download id
 * @return      array with all categories from db
 */
function Downloads_userapi_get_all_categories($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}
	
	extract($args);
	unset($args);
	
	if (!isset($startnum)) { $startnum = 1; }
	if (!isset($numitems)) { $numitems = -1; }

	// create empty array
	$categories = array();

	$dbconn  = pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
                        $dl_categories_column[cid],
                        $dl_categories_column[pid],
                        $dl_categories_column[title],
                        $dl_categories_column[description]
	        FROM        $dl_categories_table
	        ORDER BY    $dl_categories_column[title]";

	$result = $dbconn->SelectLimit($sql, $numitems, $startnum-1);

	if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	for (; !$result->EOF; $result->MoveNext())
    {
		list($cid,$pid,$title,$description) = $result->fields;

		if (pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_READ))
        {
			$categories[] = array('cid' => $cid, 'pid' => $pid, 'title' => $title, 'description' => $description);
		}
	}

	$result->Close();

	return $categories;
}

/**
 *
 * get category information
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       array $info
 */
function Downloads_userapi_category_info($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	extract($args);
	unset($args);

	if (!isset($cid) || !is_numeric($cid))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

	// Security check
    if (!pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
					$dl_categories_column[pid],
					$dl_categories_column[title],
					$dl_categories_column[description]
			FROM 	$dl_categories_table
			WHERE 	$dl_categories_column[cid] ='".(int)pnVarPrepForStore($cid)."'";
			
	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	list($pid, $title, $description)=$result->fields;
	
	$result->Close();

	$info = array('pid' => $pid, 'title' => $title, 'description' => $description);

	
	return $info;
}

/**
 * category outputhandler
 *
 *
 * @author      Sascha Jost
 * @author      Katja Zedel
 * @version     1.2
 * @param       $cid
 * @return      $categories_prep_list formatted list of categories
 */
function Downloads_userapi_categoryhandler()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	$subcats_limit_to = pnModGetVar('downloads', 'frontpagesubcats');
    $categories_limit = pnModGetVar('downloads', 'frontpagecatlimit');
	$frontendstyle = pnModGetVar('downloads', 'frontendstyle');
	
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
						$dl_categories_column[cid],
						$dl_categories_column[title],
						$dl_categories_column[description]
			FROM 		$dl_categories_table
			WHERE 		$dl_categories_column[pid] = '0'";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($cid, $title, $description) = $result->fields;
	  	
	  	if (empty($description))
		{
			$description = __('No description available!', $dom);
		}
		
		// permission check
		if (pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_OVERVIEW))
        {
			 // create empty array
            $prep_list = array();
		
			$prep_list["cid"]        	  = $cid;
			
            $prep_list["title"]        	  = pnVarPrepForDisplay($title);
            
            $prep_list["description"]     = pnVarPrepForDisplay($description);
            
            if ($frontendstyle == 1 ) 
            {
	           $prep_list["link"]            = pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid' => $cid,'start' => 0)));
			}
			else
			{
				$prep_list["link"]            = pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'sublevel', array('cid' => $cid,'start' => 0)));
			}
            
            $prep_list["count_downloads"] = pnVarPrepForDisplay(pnModAPIFunc('Downloads', 'user', 'count_downloads', array('cid'=> $cid,
                        'count_by_cid' => true,
                        'count_by_hits' => false,
                        'count_all' => false,
						'count_all_cids'=> true)));
            
			$prep_list["count_subcategories"]   = pnVarPrepForDisplay(pnModAPIFunc('Downloads', 'user', 'count_subcategories',array('cid' => $cid)));

			if ($frontendstyle == 1 ) 
            {
	            if ($subcats_limit_to == 'no' && $categories_limit == 0) 
	            {
	                $prep_list["subcategories"] = pnModAPIFunc('Downloads', 'user', 'categoryhandler1',array('catid' => $cid));		
	            }
	        
	            if ($subcats_limit_to == 'yes' && $categories_limit > 0) 
	            {
	                $prep_list["subcategories"] = pnModAPIFunc('Downloads', 'user', 'categoryhandler1',array('catid' => $cid, 'limit' => $categories_limit));
	            }
			}
			
            // add category data to list
            $main_categories_data[] = $prep_list;
        }

    }

    $result->Close();
    
    // Create output object
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign(main_categories_data, $main_categories_data);
    $pnr->assign(frontendstyle, $frontendstyle);

    // Return the output
    $categories_prep = $pnr->fetch('user/downloads_user_categoryhandler.htm');

	return $categories_prep;
}

/**
 * category outputhandler creates recursivly a list of all
 * subcategories
 *
 *
 * @author      Sascha Jost
 * @author      Katja Zedel
 * @version     1.2
 * @param       $cid
 * @return      $categories_list formatted list of subcategories
 */
function Downloads_userapi_categoryhandler1($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);

	if (!isset($catid) || !is_numeric($catid))
	{
		$catid = 0;
	}

	if (!isset($epid) || !is_numeric($epid))
	{
		$epid = 0;
	}

	if(isset($limit) && ($limit > 0))
	{
		$limitparameter = " LIMIT $limit";
	}

	$frontendstyle = pnModGetVar('downloads', 'frontendstyle');
	
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
						$dl_categories_column[cid],
						$dl_categories_column[pid],
						$dl_categories_column[description],
						$dl_categories_column[title]
			FROM 		$dl_categories_table
			WHERE 		$dl_categories_column[pid] ='".(int)pnVarPrepForStore($catid)."'".$limitparameter;
			
	$result =& $dbconn->Execute($sql);
		
	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}

	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($cid, $pid, $description, $title) = $result->fields;
	  	
	  	if (empty($description))
		{
			$description = __('No description available!', $dom);
		}
		
	  	// permission check
	  	if (pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_OVERVIEW))
        {
		  	if ($cid != 0)
			{
				// create empty array
                $prep_list = array();
                
                $prep_list["cid"]        	  = $cid;
                
                $prep_list["title"]           = pnVarPrepForDisplay($title);
                
                $prep_list["description"]     = pnVarPrepForDisplay($description);
                
                if ($frontendstyle == 1 ) 
	            {
		           $prep_list["link"]            = pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid' => $cid,'start' => 0)));
				}
				else
				{
					$prep_list["link"]            = pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'sublevel', array('cid' => $cid,'start' => 0)));
				}
                            
                $prep_list["count_downloads"] = pnVarPrepForDisplay(pnModAPIFunc('Downloads', 'user', 'count_downloads',array( 'cid'=> $cid,
                            'count_by_cid' => true,
                            'count_by_hits' => false,
                            'count_all' => false,
							'count_all_cids'=> true)));
                
               $prep_list["count_subcategories"]   = pnVarPrepForDisplay(pnModAPIFunc('Downloads', 'user', 'count_subcategories',array('cid' => $cid)));
   
				if ($frontendstyle == 1 ) 
            	{
                	$prep_list["subcategories"]     = pnModAPIFunc('Downloads', 'user', 'categoryhandler1',array('catid' => $cid));
                }
                
            }

            // add category data to list
            $sub_categories_data[] = $prep_list;
        }
    }

    $result->Close();
    	
    // Create output object
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign(sub_categories_data, $sub_categories_data);
    $pnr->assign(frontendstyle, $frontendstyle);

    // Return the output
    $categories_list = $pnr->fetch('user/downloads_user_subcategoryhandler.htm');
	return $categories_list;
}

/**
 * count subcategories
 *
 * @author      Sascha Jost
 * @version     1.1
 * @param       $cid
 * @return      $dlcount 
 */
 function Downloads_userapi_count_subcategories($args)
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
		$cid = 0;
	}

	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT 		$dl_categories_column[cid]
			FROM 		$dl_categories_table
			WHERE 		$dl_categories_column[pid] ='".(int)pnVarPrepForStore($cid)."'";
			
	$result = &$dbconn->Execute($sql);
	
	if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	$count = $result->Po_RecordCount();
	
	for (; !$result->EOF; $result->MoveNext())
	{
		list($cid) = $result->fields;
		
		$count = $count + pnModAPIFunc('Downloads', 'user', 'count_subcategories',array('cid' => $cid));
	}
	
	$result->Close();
	
	return $count;
}

/**
 * count downloads
 *
 * @author      Sascha Jost
 * @version     1.1
 * @param       $cid
 * @return      $dlcount 
 */
 function Downloads_userapi_count_downloads($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	extract($args);
    unset($args);

	if (!isset($cid) || !is_numeric($cid))
	{
		$cid = 0;
	}
	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	
	// count downloads by their cid
	if(true === $count_by_cid)
	{
	  	$wherestring = " WHERE    $dl_downloads_column[cid] = '".(int)pnVarPrepForStore($cid)."' AND $dl_downloads_column[status] ='1'";
	}
	
	// count downloads by their hits
	if(true === $count_by_hits)
	{
	  	$wherestring = " WHERE    $dl_downloads_column[hits] >= '1'";
	}

	// count all downloads 
	if(true === $count_all)
	{
	  	$wherestring = ' ';
	}
	
	$sql = "SELECT COUNT(*)
            FROM    $dl_downloads_table".$wherestring;

	$result = &$dbconn->Execute($sql);
	
	if ($dbconn->ErrorNo() != 0)
    {
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	list($dlcount) = $result->fields;
	
	$result->Close();
	
	// count all downloads 
	if(true === $count_all_cids)
	{
	  	$dl_categories_table  =  $pntable['downloads_categories'];
		$dl_categories_column = &$pntable['downloads_categories_column'];
	
		$sql = "SELECT 		$dl_categories_column[cid]
				FROM 		$dl_categories_table
				WHERE 		$dl_categories_column[pid] ='".(int)pnVarPrepForStore($cid)."'";
				
		$result = &$dbconn->Execute($sql);
		
		if ($dbconn->ErrorNo() != 0)
	    {
			return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
		}
	
		for (; !$result->EOF; $result->MoveNext())
		{
			list($cid) = $result->fields;
			
			$dlcount = $dlcount + pnModAPIFunc('Downloads', 'user', 'count_downloads',array('cid' => $cid, 'count_by_cid'=> true, 'count_by_hits'=> false,'count_all'=> false,'count_all_cids'=> true));
		}
		
		$result->Close();
	}
	
	return $dlcount;

}

/**
 * create captcha image
 *
 * @author      Sascha Jost
 * @author      Andreas John
 * @version     1.0
 * @param       $img
 * @return      $captcaimage 
 */
 function Downloads_userapi_gen_captcha()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	$captcha_temp_path = pnModGetVar('downloads', 'captcha_cache');
	
	$clean = pnModAPIFunc('Downloads', 'user', 'cleanup_captcha');
	
	$myauthid = pnSecGenAuthKey(Downloads);
	
	$my_captcha = new captcha( $myauthid, $captcha_temp_path);
	
	$pic_url = $my_captcha->get_pic(pnModGetVar('downloads', 'captchacharacters'));
	
	pnModSetVar('downloads', 'cptid', $myauthid);
	
	$thecaptcha = pnModAPIFunc('Downloads', 'user', 'prep_captcha',array('img' => $pic_url));
	
	return $thecaptcha;
}

/**
 * read captcha image
 *
 * @author      Sascha Jost
 * @author      Andreas John
 * @version     1.0
 * @param       $img
 * @return      $captcaimage 
 */
 function Downloads_userapi_prep_captcha($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	extract($args);
    unset($args);

	if (!isset($img) || is_numeric($img))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}

	$captcha_temp_path = pnModGetVar('downloads', 'captcha_cache');
	
	 $mycaptcha = $captcha_temp_path . pnVarPrepForOS('cap_'.$img.'.jpg');
	
	if (!is_file($mycaptcha))
	{
		return errorpage(__FILE__,__LINE__,__('Failed to load Captcha!', $dom));
	}
	else 
	{	
	  	$captcaimage = $mycaptcha;
	}

	return $captcaimage;
}

/**
 * clean up service for captcha folder
 *
 * @author      Sascha Jost
 * @author      Andreas John
 * @version     1.1
 */
 function Downloads_userapi_cleanup_captcha()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}
	
	$captcha_temp_path = pnModGetVar('downloads', 'captcha_cache');
	
	// captcha life time is limited to 15s
	$captcha_expires_after = 15;

	$tmp_dir = dir($captcha_temp_path);
	// clean up
	while(false !==($entry = $tmp_dir->read()))
	{
		 if(mktime() - filemtime($captcha_temp_path.pnVarPrepForOS($entry) ) > $captcha_expires_after)
		{
		  	if ($entry != '.' && $entry != '..' && $entry != '.htaccess') 
			{
				unlink($captcha_temp_path.pnVarPrepForOS($entry));
			}
		}
	}
	
	return true;
}

/**
 * hand out the file to the user
 *
 * @author      Sascha Jost
 * @version     1.0
 * @param       $lid
 * @return   
 */
function Downloads_userapi_handout_file($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    //error_reporting(E__('All', $dom));
  	if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
    {
		return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	}

	extract($args);
    unset($args);
	
	if (!isset($lid) || !is_numeric($lid))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}
	
	$download_info = pnModAPIFunc('Downloads','user','get_download_info',
									array('lid' => $lid,
								    'cid' => 0,
									'sort_active' => false, 
									'sortby' => 0,  
									'cclause' => 0,  
									'get_by_cid' => false, 
									'get_by_lid' => true,
									'get_by_date' => false,
									'get_by_hook' => false,
									'limit' => 1,
									'sort_date' => 0,
									'start'=> 0));
	
	foreach($download_info as $myfile)
	{
	  	extract($myfile);
	}
	
    // local?
    if (eregi('^http:|^ftp:|^https:', $myfile['url']))
	{
	  	$download_counter = pnModAPIFunc('Downloads','user','count_hit',array('lid' => $lid));
		return pnRedirect($myfile['url']);
	} 
	else 
	{
		// Extract the file from the path
		$filename = basename($myfile['url']);		

		// get the file extension
		$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', 
									array('filename' => $filename));
		// get the upload folder
		$upload_folder = pnModGetVar('downloads','upload_folder');

		// prepare the path
		$myfile['url'] = $upload_folder . pnVarPrepForOS($myfile['url']); 	
			
		// check for exsitance						
		$filepointer = is_file($myfile['url']);
		
		// last file type check
		if ($filepointer && !eregi('.php[[:space:]]*$', $filename))
		{
		  	$download_counter = pnModAPIFunc('Downloads','user','count_hit',array('lid' => $lid));
		  	
		  	// get file size
			$fsize = filesize($myfile['url']);
			
			if ($fsize == false) 
			{
				return errorpage(__FILE__,__LINE__,__('Can\'t read file size or no file size was specified!', $dom));
			}

			// get file extension
			$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', array('filename' => $filename));
			
			// get the right content type
			$contenttype = pnModAPIFunc('Downloads', 'user', 'getcontenttype', array('extension' => $file_extension));
		 
            // Spaces are allowed if the filename parameter is properly 
            // quoted per RFC2616 section 19.5.1
             //$myfile['title'] = str_replace(" ","_",$myfile['title']);
            
            // remove bad characters from title in a cross-platform manner by replacing 
            // the union of characters not allowed by *nix, Mac and Windows (which is the most restrictive)
            // with an underscore.
            $myfile['filename'] = preg_replace('![\x00-\x1f\x7f*:\\\\/<>|"?]!', '_', $myfile['filename']);
		 	
		 	$UseCompression = pnConfigGetVar('UseCompression');
		 	
		    if ($UseCompression == 1) 
			{
		        ob_end_clean();
		    }
		    
			// write header
			header("Pragma: public");
      		header("Expires: 0");
      		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     		 header("Cache-Control: private",false); 
			header('Content-Description: File Transfer');
			header("Content-Type:$contenttype");
            // Properly quote the filename parameter per RFC2616 section 19.5.1, which allows spaces and other international characters
            header('Content-Disposition: attachment; filename="'.$myfile['filename'].'"');
			header('Content-Transfer-Encoding: binary');
			header("Content-Length:".$fsize);
						
			// perpare file and send it
			@set_time_limit(0);
			$fp = @fopen($myfile['url'], "rb");
			set_magic_quotes_runtime(0);
			$chunksize = 15*(512*1024); 
			while($fp && !feof($fp)) 
			{
				$buffer = fread($fp, $chunksize);
				print $buffer;
				flush();
				sleep(5);
			}
			set_magic_quotes_runtime(get_magic_quotes_gpc());
			fclose($fp);

			exit();
		} 
		else 
		{
			return errorpage(__FILE__,__LINE__,__('Can\'t read file from server!', $dom));
		}
	}
	
	
	
}

/**
 * extract file extension
 *
 * @author      Sascha Jost
 * @version     1.0 
 * @param       $filename
 * @param       $upload
 * @return      $extension  
 */
function Downloads_userapi_get_file_extension($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
  	extract($args);
	unset($args);
	
	if (!isset($filename) || is_numeric($filename)) 
	{
		return false;
	}
	
	// get extension 
	$extension = strrchr($filename, '.');
	
	// if we have .gz as extension it is possible
    // that we have a .tar.gz file
    if($extension == '.gz')
	{
		// let's check for that
	  	$extension = substr($filename, -7);
	  	
		$tartest = substr($extension,0,4);
		
		//if upload is set and the extension contains tar
	  	// we return the full extension
		if(true === $upload && $tartest = '.tar')
		{
			return $extension;
		}
		
	  	//if this test fails we have a .gz file
	  	// and so we set the right extension
		if($tartest != '.tar')
		{
	  		$extension = strrchr($filename,'.');
		}
		else
		{
		  	return $extension;
		}    
	}
	
	return $extension;
}



/**
 * Returns content type for the file type
 * @author Jason Judge 
 * @author Sascha Jost
 * @version     1.0 
 * @param $extension 
 * @returns string mimetype
*/
function Downloads_userapi_getcontenttype($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
	extract($args);
	unset($args);
	
	if (!isset($extension) || is_numeric($extension)) 
	{
		return false;
	}

	$mime_extension_map = pnModAPIFunc('Downloads', 'user', 'extension_map');

	// check for no extension
	if(empty($extension))
	{
		return 'application/octet-stream';
	}

	$MIME_type = $mime_extension_map[substr($extension,1)];

	if (empty($MIME_type)) 
	{
	 	return 'application/octet-stream';
	} 
	else 
	{
		return $MIME_type;
	}
}

/**
 * provide extension map
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param $lid 
 * @returns bool 
*/
function Downloads_userapi_extension_map()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $mime_extension_map = array(
	'ai'        => 'application/postscript',
	'aif'       => 'audio/x-aiff',
	'aifc'      => 'audio/x-aiff',
	'aiff'      => 'audio/x-aiff',
	'asc'       => 'text/plain',
	'au'        => 'audio/basic',
	'avi'       => 'video/x-msvideo',
	'bcpio'     => 'application/x-bcpio',
	'bin'       => 'application/octet-stream',
	'bmp'       => 'image/bmp',
	'cdf'       => 'application/x-netcdf',
	'class'     => 'application/octet-stream',
	'cpio'      => 'application/x-cpio',
	'cpt'       => 'application/mac-compactpro',
	'csh'       => 'application/x-csh',
	'css'       => 'text/css',
	'dcr'       => 'application/x-director',
	'dir'       => 'application/x-director',
	'dms'       => 'application/octet-stream',
	'doc'       => 'application/msword',
	'dvi'       => 'application/x-dvi',
	'dxr'       => 'application/x-director',
	'eps'       => 'application/postscript',
	'etx'       => 'text/x-setext',
	'exe'       => 'application/octet-stream',
	'ez'        => 'application/andrew-inset',
	'gif'       => 'image/gif',
	'gtar'      => 'application/x-gtar',
	'gz'        => 'application/x-gzip',
	'hdf'       => 'application/x-hdf',
	'hqx'       => 'application/mac-binhex40',
	'htm'       => 'text/html',
	'html'      => 'text/html',
	'ice'       => 'x-conference/x-cooltalk',
	'ief'       => 'image/ief',
	'iges'      => 'model/iges',
	'igs'       => 'model/iges',
	'jpe'       => 'image/jpeg',
	'jpeg'      => 'image/jpeg',
	'jpg'       => 'image/jpeg',
	'js'        => 'application/x-javascript',
	'kar'       => 'audio/midi',
	'latex'     => 'application/x-latex',
	'lha'       => 'application/octet-stream',
	'lzh'       => 'application/octet-stream',
	'man'       => 'application/x-troff-man',
	'me'        => 'application/x-troff-me',
	'mesh'      => 'model/mesh',
	'mid'       => 'audio/midi',
	'midi'      => 'audio/midi',
	'mif'       => 'application/vnd.mif',
	'mov'       => 'video/quicktime',
	'movie'     => 'video/x-sgi-movie',
	'mp2'       => 'audio/mpeg',
	'mp3'       => 'audio/mpeg',
	'mpe'       => 'video/mpeg',
	'mpeg'      => 'video/mpeg',
	'mpg'       => 'video/mpeg',
	'mpga'      => 'audio/mpeg',
	'ms'        => 'application/x-troff-ms',
	'msh'       => 'model/mesh',
	'nc'        => 'application/x-netcdf',
	'oda'       => 'application/oda',
	'pbm'       => 'image/x-portable-bitmap',
	'pdb'       => 'chemical/x-pdb',
	'pdf'       => 'application/pdf',
	'pgm'       => 'image/x-portable-graymap',
	'pgn'       => 'application/x-chess-pgn',
	'png'       => 'image/png',
	'pnm'       => 'image/x-portable-anymap',
	'ppm'       => 'image/x-portable-pixmap',
	'pps'       => 'application/vnd.ms-powerpoint',
	'ppt'       => 'application/vnd.ms-powerpoint',
	'ps'        => 'application/postscript',
	'qt'        => 'video/quicktime',
	'rar'       => 'application/x-rar-compressed',
	'ra'        => 'audio/x-realaudio',
	'ram'       => 'audio/x-pn-realaudio',
	'ras'       => 'image/x-cmu-raster',
	'rgb'       => 'image/x-rgb',
	'rm'        => 'audio/x-pn-realaudio',
	'roff'      => 'application/x-troff',
	'rpm'       => 'audio/x-pn-realaudio-plugin',
	'rtf'       => 'text/rtf',
	'rtx'       => 'text/richtext',
	'sgm'       => 'text/sgml',
	'sgml'      => 'text/sgml',
	'sh'        => 'application/x-sh',
	'shar'      => 'application/x-shar',
	'silo'      => 'model/mesh',
	'sit'       => 'application/x-stuffit',
	'skd'       => 'application/x-koan',
	'skm'       => 'application/x-koan',
	'skp'       => 'application/x-koan',
	'skt'       => 'application/x-koan',
	'smi'       => 'application/smil',
	'smil'      => 'application/smil',
	'snd'       => 'audio/basic',
	'spl'       => 'application/x-futuresplash',
	'src'       => 'application/x-wais-source',
	'sv4cpio'   => 'application/x-sv4cpio',
	'sv4crc'    => 'application/x-sv4crc',
	'swf'       => 'application/x-shockwave-flash',
	't'         => 'application/x-troff',
	'tar'       => 'application/x-tar',
	'tar.gz'    => 'application/x-tar-gz',
	'tcl'       => 'application/x-tcl',
	'tex'       => 'application/x-tex',
	'texi'      => 'application/x-texinfo',
	'texinfo'   => 'application/x-texinfo',
	'tif'       => 'image/tiff',
	'tiff'      => 'image/tiff',
	'tr'        => 'application/x-troff',
	'tsv'       => 'text/tab-separated-values',
	'txt'       => 'text/plain',
	'ustar'     => 'application/x-ustar',
	'vcd'       => 'application/x-cdlink',
	'vrml'      => 'model/vrml',
	'vsd'       => 'application/vnd.visio',
	'wav'       => 'audio/x-wav',
	'wbmp'      => 'image/vnd.wap.wbmp',
	'wbxml'     => 'application/vnd.wap.wbxml',
	'wml'       => 'text/vnd.wap.wml',
	'wmlc'      => 'application/vnd.wap.wmlc',
	'wmls'      => 'text/vnd.wap.wmlscript',
	'wmlsc'     => 'application/vnd.wap.wmlscriptc',
	'wrl'       => 'model/vrml',
	'xbm'       => 'image/x-xbitmap',
	'xls'       => 'application/vnd.ms-excel',
	'xml'       => 'text/xml',
	'xpm'       => 'image/x-xpixmap',
	'xwd'       => 'image/x-xwindowdump',
	'xyz'       => 'chemical/x-xyz',
	'z'         => 'application/x-compress',
	'zip'       => 'application/zip'
	);

    return $mime_extension_map;

}

/**
 * count download hits
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param $lid 
 * @returns bool 
*/
function Downloads_userapi_count_hit($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
    if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);
    
	if (!isset($lid) || !is_numeric($lid))
	{
		return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	}

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

    $sql = "UPDATE 	$dl_downloads_table
            SET 	$dl_downloads_column[hits] = $dl_downloads_column[hits] + 1
            WHERE 	$dl_downloads_column[lid] = " .(int)pnVarPrepForStore($lid);
            
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) 
	{
        return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
    }

    return true;

}

/**
 * how much downloads are submitted this week
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param none
 * @returns integer - amount of new downloads for a week 
*/
function Downloads_userapi_submitted_week()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	for ($counter = 0; $counter < 7; $counter++)
	{

		$newdownloaddayRaw = (time()-(86400 * $counter));
    	$newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
    	$newdownloadDB_upper = date("Y-m-d", $newdownloaddayRaw + 86400);
    
	    $sql = "SELECT count(*) 
				FROM 	$dl_downloads_table
				WHERE 	$dl_downloads_column[date]   >= '" . pnVarPrepForStore($newdownloadDB) . "'
				AND 	$dl_downloads_column[date]   < '" . pnVarPrepForStore($newdownloadDB_upper) . "'";
	            
	    $result =& $dbconn->Execute($sql);
	
	    if ($dbconn->ErrorNo() != 0) 
		{
	        return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	    }
	
		list($totaldownloads) = $result->fields;
		
		$allweekdownloads = $allweekdownloads + $totaldownloads;
		
	}
	
    return $allweekdownloads;

}

/**
 * how much downloads are submitted this month
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param none
 * @returns integer - amount of new downloads for a month 
*/
function Downloads_userapi_submitted_month()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	for ($counter = 0; $counter < 30; $counter++)
	{

		$newdownloaddayRaw = (time()-(86400 * $counter));
    	$newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
		$newdownloadDB_upper = date("Y-m-d", $newdownloaddayRaw + 86400);
		
	    $sql = "SELECT count(*) 
				FROM 	$dl_downloads_table
				WHERE 	$dl_downloads_column[date]   >= '" . pnVarPrepForStore($newdownloadDB) . "'
				AND 	$dl_downloads_column[date]   < '" . pnVarPrepForStore($newdownloadDB_upper) . "'";
	            
	    $result =& $dbconn->Execute($sql);
	
	    if ($dbconn->ErrorNo() != 0) 
		{
	        return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	    }
	
		list($totaldownloads) = $result->fields;
		
		$allmonthdownloads = $allmonthdownloads + $totaldownloads;
		
	}
	
    return $allmonthdownloads;

}

/**
 * select list for new download by date
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param integer - $filter
 * @returns select list
*/
function Downloads_userapi_get_downloads_by_date($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	// create all necessary array's'
	$newdownloads_list = array();
	
	for ($counter = 0; $counter < $filter; $counter++)
	{

		$newdownloaddayRaw = (time()-(86400 * $counter));
    	$newdownloadDB = Date("Y-m-d", $newdownloaddayRaw);
    	$newdownloadView = ml_ftime(__('%b %d, %Y', $dom), $newdownloaddayRaw);
		$newdownloadDB_upper = date("Y-m-d", $newdownloaddayRaw + 86400);
		
	    $sql = "SELECT count(*) 
				FROM 	$dl_downloads_table
				WHERE 	$dl_downloads_column[date]   >= '" . pnVarPrepForStore($newdownloadDB) . "'
				AND 	$dl_downloads_column[date]   < '" . pnVarPrepForStore($newdownloadDB_upper) . "'";
	            
	    $result =& $dbconn->Execute($sql);
	
	    if ($dbconn->ErrorNo() != 0) 
		{
	        return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	    }
	
		list($nbr_dl_pd) = $result->fields;
	
	    $newdownloads_list[] = "<option value=\"$newdownloaddayRaw-$nbr_dl_pd\">".pnVarPrepForDisplay($newdownloadView)."&nbsp;(".pnVarPrepForDisplay($nbr_dl_pd).")</option>";
	    
		$result->Close();
	
	}

    return $newdownloads_list;

}

/**
 * get rating info for one or all files if the module is hooked
 *
 * @author 		Sascha Jost
 * @version     1.1 
 * @param 		$getstring - string (getall or get)
 * @returns 	array with rating information
*/
function Downloads_userapi_get_rating_info($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_READ)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
   // get the items from ratings hook
    $items = pnModAPIFunc('Ratings',
                          'user',
                          $getstring,
						  array('modname' => 'Downloads',
						        'numitems' => pnModGetVar('downloads', 'topdownloads'),
								'sortby' => 'rating',
						  		'cclause' => 'DESC'));	

	//rsort($items);
			
	$toprateddownloads = array();

    foreach ($items as $item) 
	{

		// modification for proper work with new Zikula Ratings module
		$compare_string = pnConfigGetVar('Version_Num');
		if('0' <= strcmp($compare_string, '0.7.6.4'))
		{
			$item['objectid'] = $item['itemid'];
		}
	
        $download_info = pnModAPIFunc('Downloads','user','get_download_info',
									  array(
									  		'lid' => $item['objectid'],
									  		'cid' => 0,
									  		'sort_active' => false, 
									  		'sortby' => 0,  
									  		'cclause' => 0,  
									  		'get_by_cid' => false, 
									  		'get_by_lid' => true,
											'get_by_date' => false,
											'limit' => pnModGetVar('downloads', 'topdownloads'),
											'sort_date' => 0,
											'start' => 0));
									  		
		// extract the vals 							  		
		foreach($download_info as $myfile)
		{
	  		extract($myfile);
		}

		// modification for proper work with new Zikula Ratings module
		$compare_string = pnConfigGetVar('Version_Num');
		if('0' <= strcmp($compare_string, '0.7.6.4'))
		{
			$item['rating'] = $item['score'];
		}
		
		$myfile['rating'] 		= $item['rating'];
		$myfile['numratings'] 	= $item['numratings'];
		$toprateddownloads[] 	= $myfile;

    }
	
    return $toprateddownloads;

}

/**
 * inser the modrequest into db
 *
 * @author Sascha Jost
 * @version     1.0 
 * @param $
 * @return $rid
*/
function Downloads_userapi_insert_modrequest($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!pnSecAuthAction(0, 'Downloads::', "::", ACCESS_COMMENT)) 
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	// Argument check
	if ((!isset($lid)) ||
		(!is_numeric($lid)) ||
		(!isset($title)) ||
		(is_numeric($title)) ||
		(!isset($description)) ||
		(is_numeric($description)) ||
		(!isset($submitter)) ||
		(is_numeric($submitter)) ||
		(!isset($submittermail)) ||
		(is_numeric($submittermail)))
		{
  	         return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
	    }
	    
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_modrequest_table   =  $pntable['downloads_modrequest'];
	$dl_modrequest_column  = &$pntable['downloads_modrequest_column'];
    
	$nextId = $dbconn->GenId($dl_modrequest_table);

	$sql = "INSERT
			INTO $dl_modrequest_table
				(pn_requestid,
				 pn_lid,
				 pn_title,
				 pn_description,
				 pn_modifysubmitter,
				 pn_email)
			VALUES
				('".(int)pnVarPrepForStore($nextId)."',
				 '".(int)pnVarPrepForStore($lid)."',
				 '".pnVarPrepForStore($title)."',
				 '".pnVarPrepForStore($description)."',
				 '".pnVarPrepForStore($submitter)."',
				 '".pnVarPrepForStore($submittermail)."')";

	$dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Failed to create category!', $dom) );
	}

	$rid = $dbconn->PO_Insert_ID($dl_modrequest_table, 'pn_requestid');

	return $rid;
}

function Downloads_userapi_getstatistics() 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

    $sql = "SELECT COUNT(*) AS count_categories
          	FROM $dl_categories_table";
          
  	$result = $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
	}   
	    
    list ($count_categories) = $result->fields;
    
    $result->Close();
    
    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
    
    $sql = "SELECT SUM(pn_hits) AS total_hits, 
			SUM(pn_filesize) AS total_traffic, 
          	COUNT(*) AS count_downloads
          	FROM $dl_downloads_table";
    
    $result = $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage(__FILE__,__LINE__,__('Wrong or missing argument passed to the function!', $dom) );
	}       
	
    list ($total_hits,$total_traffic,$count_downloads) = $result->fields;
    
    $result->Close();
    
    if(empty ($total_traffic))
    {
	  $mod_stats['total_traffic'] = '0';
	}
	else
	{
	  	$mod_stats['total_traffic'] = pnModAPIFunc('Downloads', 'user', 'calcsize',array('filesize' => $total_traffic));
	}

	$mod_stats['count_categories'] = $count_categories;
	$mod_stats['total_hits'] = $total_hits;
	$mod_stats['count_downloads'] = $count_downloads;
	
    return $mod_stats;
}

/**
 * Additional function for Downloads
 *
 *
 * @author
 * @author      Sascha Jost
 * @version     1.0
 * @param       $size
 * @return      float		
 */
function Downloads_userapi_calcsize($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);

    if( (!isset($filesize)) || (!is_numeric($filesize)))
    {
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }
    
    $mb = 1024*1024;
	$gb = $mb *1024;
	
	if ( $filesize > $gb ) 
	{
        $mysize = sprintf("%01.2f",$filesize/$gb).'-Gb';
    } 
    elseif ( $filesize > $mb ) 
	{
        $mysize = sprintf("%01.2f",$filesize/$mb).'-Mb';
    } 
	elseif ( $filesize >= 1024 ) 
	{
        $mysize = sprintf("%01.2f",$filesize/1024).'-Kb';
    } 
	else 
	{
        $mysize = $filesize .'-b';
    }
    
    return $mysize;
}


/**
 * convert file size 
 *
 * @author      Sascha Jost
 * @version     1.0
 * @param       $filesize
 * @param       $sizetypein
 * @param       $sizetypeout
 * @return      float		
 */
function Downloads_userapi_convert_filesize($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    extract($args);
    unset($args);

    if ( (!isset($filesize)) || (!is_numeric($filesize)) || (!isset($sizetypein)) || (is_numeric($sizetypein)) || (!isset($sizetypeout)) || (is_numeric($sizetypeout)) )
    {
        return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }
    
    // bytes
    if ($sizetypein === 'b') 
	{
    	$mysize['bytes'] 		= $filesize;
		$mysize['kilobytes'] 	= ($filesize/1024*100000)/100000;
    	$mysize['megabytes'] 	= ($filesize/1048576*100000)/100000;
    	$mysize['gigabytes'] 	= ($filesize/1073741824*100000)/100000;
	}
	
	//kilo bytes
	if ($sizetypein === 'Kb') 
	{
    	$mysize['bytes'] 		= ($filesize*1024*100000)/100000;
    	$mysize['kilobytes'] 	= $filesize;
    	$mysize['megabytes'] 	= ($filesize/1024*100000)/100000;
    	$mysize['gigabytes'] 	= ($filesize/1048576*100000)/100000;
	}
      
	// mega bytes
	if ($sizetypein === 'Mb') 
	{
    	$mysize['bytes'] 		= ($filesize*1048576*100000)/100000;
    	$mysize['kilobytes'] 	= ($filesize*1024*100000)/100000;
    	$mysize['megabytes'] 	= $filesize;
    	$mysize['gigabytes'] 	= ($filesize/1024*100000)/100000;
	}
	
	// giga bytes
	if ($sizetypein === 'Gb') 
	{
    	$mysize['bytes'] 		= ($filesize*1073741824*100000)/100000;
    	$mysize['kilobytes'] 	= ($filesize*1048576*100000)/100000;
    	$mysize['megabytes'] 	= ($filesize*1024*100000)/100000;
    	$mysize['gigabytes'] 	= $filesize;
	}
 
 	if ($sizetypeout === 'b') 
	{
    	return sprintf("%01.2f",$mysize['bytes']);
	}
	
	if ($sizetypeout === 'Kb') 
	{
    	return sprintf("%01.2f",$mysize['kilobytes']);
	}
	
	if ($sizetypeout === 'Mb') 
	{
    	return sprintf("%01.2f",$mysize['megabytes']);
	}
	
	if ($sizetypeout === 'Gb') 
	{
    	return sprintf("%01.2f",$mysize['gigabytes']);
	}

}

?>
