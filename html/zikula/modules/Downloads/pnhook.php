<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  hook user gui
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
 * show form
 * displayhook function
 *
 */
function Downloads_hook_show_form($extrainfo,$objectid)
{

	pnModLangLoad('Downloads');
	
    if(!isset($extrainfo['module']) || empty($extrainfo['module'])) 
	{
        $modname = pnModGetName();
    } 
	else 
	{
        $modname = $extrainfo['module'];
    }
    
    // Security check
    if (!pnSecAuthAction(0, "$modname::", '::', ACCESS_READ))
    {
	   return;
	}
	
    if(isset($extrainfo['objectid']) && !empty($extrainfo['objectid'])) 
	{
        $objectid = $extrainfo['objectid'];
    }

	if($modname === 'pnForum') 
	{
        extract ($extrainfo['extrainfo']);
        $extrainfo['extrainfo'] = $returnurl;
    } 
    
	// get the mod id
	$modid = pnModGetIDFromName($modname);

	// we call downloads API to get the files
    $downloads_of_object = pnModAPIFunc('Downloads','user','get_download_info',
									  	array(	'lid' => 0,
												'cid' => 0,
												'modid' => $modid, //custom 
												'objectid' => $objectid, //custom 
									  			'sort_active' => false , 
									  			'sortby' => ' ',
									  			'cclause' => ' ',
									  			'get_by_cid' => false, 
									  			'get_by_lid' => false,
												'get_by_date' => false,
												'get_by_hook' => true,
												'sort_date' => 0,
												'start' => 0));
				
    $pnr =& new pnRender('Downloads');
    
	$pnr->caching = false;		

	// security check
	// user need at least right to add an item to the hooked module
    if (pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD) && pnSecAuthAction(0, "$modname::Add", '::', ACCESS_ADD))
	{
	  	$pnr->assign('allowadd', true);
	}
		
	$pnr->assign('downloads_of_object', $downloads_of_object);
	$pnr->assign('objectid', $objectid);
	$pnr->assign('modname', $modname);
	$pnr->assign('redirect', $extrainfo['extrainfo']);
	return $pnr->fetch('user/downloads_user_attachments.html');
	
}

/**
 * create_item
 * createhook function 
 *
 */
function Downloads_hook_attach_item($args)
{

    extract($args);
    unset($args);

  	 // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
		pnSessionSetVar('errormsg', 'auth error');
		return pnRedirect($downloads_redirect);
    }

	// Security check
	if (!pnSecConfirmAuthKey())
    {
		pnSessionSetVar('errormsg', 'auth error');
		return pnRedirect($downloads_redirect);
    }

    list(	$downloads_objectid,
			$downloads_modname,
			$downloads_redirect,
         	$downloads_title) = pnVarCleanFromInput(	'downloads_objectid',						
														'downloads_modname',
														'downloads_redirect',
                                                    	'downloads_title');


	$submitter = pnUserGetVar('uname');

	// get the mod id
	$modid = pnModGetIDFromName($downloads_modname);
	
    //get vars from global array's
    $userfile_tmp 	= $_FILES['userfile']['tmp_name'];
    $userfile_name 	= $_FILES['userfile']['name'];
    $userfile_size 	= $_FILES['userfile']['size'];

	// no html allowed for title and submitter
	$downloads_title = pnVarPrepForDisplay($downloads_title);
										   
    //check all vars and set appropriate message

	// check file are not empty
    if(empty($userfile_tmp))
    {
		pnSessionSetVar('errormsg', 'no file');
        return pnRedirect($downloads_redirect);
    }
	
	//we're a hook so need to make sure we get the right vars
    if((empty($downloads_objectid)) || (empty($downloads_modname)))
    {
		pnSessionSetVar('errormsg', 'bad obj');
        return pnRedirect($downloads_redirect);
    }

    // check if title is empty, assign file name if so
    if (empty($downloads_title))
    {
	  $downloads_title = $userfile_name;
	}
	
	//add download to db
	$item = pnModAPIFunc('Downloads',
					     'user',
					     'adddownload',
		                  array(	'title' 		=> $downloads_title,
	                                'cid' 			=> '0',
	                                'file_size'     => $userfile_size,
	                                'userfile_name' => $userfile_name,
	                				'description' 	=> '-',
	                				'submitter'     => $submitter,
	                				'submittermail' => '-',
	                				'homepage' 		=> '-',
	                				'version' 		=> 1,
									'modid' 		=> $modid,
									'objectid' 		=> $downloads_objectid));
  
	// init the file and sreenshot upload
    $file_to_server = pnModAPIFunc('Downloads', 'user', 'prepare_upload', 
									array('file_tmp'	=> $userfile_tmp,
	                				      'file_name'	=> $userfile_name,
	                				      'nopicsend' 	=> true,
	                                      'lid'      	=> $item));
										  
	return pnRedirect($downloads_redirect);
}
?>