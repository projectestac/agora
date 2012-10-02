<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: user GUI functions
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
include_once('modules/Downloads/pnclasses/class.captcha.php');

/**
 *
 * main user interface
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_main()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    // Create output object
    $pnr =& new pnRender('Downloads');

	$pnr->caching = false;
	

	$lastxdlsactive = pnModGetVar('downloads', 'lastxdlsactive');
	$topxdlsactive = pnModGetVar('downloads', 'topxdlsactive');
	$ratexdlsactive = pnModGetVar('downloads', 'ratexdlsactive');
	
	if($lastxdlsactive== 'yes')
	{
	  		  	
		$lastx_prep = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  	'cid' => 0,
									  	'sort_active' => true,
									  	'sortby' => 'date',
									  	'cclause' => 'DESC',
									  	'get_by_cid' => false,
									  	'get_by_lid' => false,
										'get_by_date' => false,
										'sort_date' => 0,
										'limit' => pnModGetVar('downloads', 'newdownloads'),
										'start' => 0));
		
		$lastxisactive = true;
		$pnr->assign('lastx_prep', $lastx_prep);
		$pnr->assign('lastxisactive', $lastxisactive);
	}
	
	
	if($topxdlsactive== 'yes')
	{
	  	
		$topx_prep = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  	'cid' => 0,
									  	'sort_active' => true,
									  	'sortby' => 'hits',
									  	'cclause' => 'DESC',
									  	'get_by_cid' => false,
									  	'get_by_lid' => false,
										'get_by_date' => false,
										'sort_date' => 0,
										'limit' => pnModGetVar('downloads', 'topdownloads'),
										'start' => 0));

		$topxisactive = true;
		$pnr->assign('topx_prep', $topx_prep);
		$pnr->assign('topxisactive', $topxisactive);
	}
    

    if($ratexdlsactive== 'yes' && (pnModAvailable('Ratings') || pnModIsHooked('Ratings', 'Downloads')))
	{

		$ratex_prep = pnModAPIFunc('Downloads', 'user', 'get_rating_info',array('getstring' => 'getall'));
		
		$ratexisactive = true;
		$pnr->assign('ratex_prep', $ratex_prep);
		$pnr->assign('ratexisactive', $ratexisactive);
	}
	
	$categories_prep = pnModAPIFunc('Downloads', 'user', 'categoryhandler');

    $pnr->assign('categories_prep', $categories_prep);
    // Return the output
    return $pnr->fetch('user/downloads_user_main.htm');
}

/**
 *
 * show downloads by category
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        $cid - category id
 * @return       pnRender Object
 */
function Downloads_user_view($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	extract($args);
	unset($args);
	
    //Get vars and clean them
    list($cid,
		$start,
		$sort_active,
		$sortby,
		$cclause)  = pnVarCleanFromInput('cid',
										'start',
										'sort_active',
										'sortby',
										'cclause');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    // set a default for start if empty or not numeric
	if(!isset($start) || !is_numeric($start))
	{
		$start = 0;
	}

	$sortby_allowed = array('title','hits','date');
	
	if(!in_array($sortby, $sortby_allowed))
	{
		$sortby = pnModGetVar('downloads', 'standard_sortby');
	}
	
	$cclause_allowed = array('ASC','DESC');
	
	if(!in_array($cclause, $cclause_allowed))
	{
		$cclause = pnModGetVar('downloads', 'collateral_clause');
	}
	
	 // set a default 
	if(isset($cclause) || isset($sortby))
	{
		$sort_active = true;
	}
	else
	{
	  	$sort_active = false;
	}
	
    $catinfo = pnModAPIFunc('Downloads','user','category_info',array('cid' => $cid));
    
    $nav_path = pnModAPIFunc('Downloads','user','catNavPath',array('cid' => $cid, 'start' => 1, 'links' => 1, 'linkmyself' => 1));
    
    $files = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  		'cid' => $cid,
									  		'sort_active' => $sort_active, 
									  		'sortby' => $sortby,  
									  		'cclause' => $cclause,  
									  		'get_by_cid' => true, 
									  		'get_by_lid' => false,
											'get_by_date' => false,
											'limit' => pnModGetVar('downloads', 'perpage'),
											'sort_date' => 0,
											'start' => $start));
											
    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');

	$ratingispossible = true;
	$commentspossible = true;
	
	// Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        $ratingispossible = false;
	}
	
	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
	$extrainfo = pnModURL('Downloads', 'user', 'view', array('cid'=> $cid));
	
	$numitems = pnModAPIFunc('Downloads', 'user', 'count_downloads', array('cid'=> $cid,
																			'count_by_cid' => true,
    																		'count_by_hits' => false,
																			'count_all' => false)); 
			  			  
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('catinfo', $catinfo);
    $pnr->assign('extrainfo', $extrainfo);
    $pnr->assign('numitems', $numitems);
    $pnr->assign('start', $start);
    $pnr->assign('cid', $cid);
    $pnr->assign('cclause', $cclause);
    $pnr->assign('sortby', $sortby);
    $pnr->assign('ratingispossible', $ratingispossible);
    $pnr->assign('commentspossible', $commentspossible);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('files', $files);
    $pnr->assign('nav_path', $nav_path);
    $pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
    // Return the output
    return $pnr->fetch('user/downloads_user_view.htm');
}

/**
 *
 * show downloads/subcategories by category
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        $cid - category id
 * @return       pnRender Object
 */
function Downloads_user_sublevel($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	extract($args);
	unset($args);
	
    //Get vars and clean them
    list($cid,
		$start,
		$sort_active,
		$sortby,
		$cclause)  = pnVarCleanFromInput('cid',
										'start',
										'sort_active',
										'sortby',
										'cclause');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Category', "$cid::", ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    // set a default for start if empty or not numeric
	if(!isset($start) || !is_numeric($start))
	{
		$start = 0;
	}

	$sortby_allowed = array('title','hits','date');
	
	if(!in_array($sortby, $sortby_allowed))
	{
		$sortby = pnModGetVar('downloads', 'standard_sortby');
	}
	
	$cclause_allowed = array('ASC','DESC');
	
	if(!in_array($cclause, $cclause_allowed))
	{
		$cclause = pnModGetVar('downloads', 'collateral_clause');
	}
	
	 // set a default 
	if(isset($cclause) || isset($sortby))
	{
		$sort_active = true;
	}
	else
	{
	  	$sort_active = false;
	}

    
    $nav_path = pnModAPIFunc('Downloads','user','catNavPath',array('cid' => $cid, 'start' => 1, 'links' => 1, 'linkmyself' => 1));
    
    $files = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  		'cid' => $cid,
									  		'sort_active' => $sort_active, 
									  		'sortby' => $sortby,  
									  		'cclause' => $cclause,  
									  		'get_by_cid' => true, 
									  		'get_by_lid' => false,
											'get_by_date' => false,
											'limit' => pnModGetVar('downloads', 'perpage'),
											'sort_date' => 0,
											'start' => $start));
											
    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');

	$ratingispossible = true;
	$commentspossible = true;
	
	// Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        $ratingispossible = false;
	}
	
	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
	$extrainfo = pnModURL('Downloads', 'user', 'view', array('cid'=> $cid));
	
	$numitems = pnModAPIFunc('Downloads', 'user', 'count_downloads', array('cid'=> $cid,
																			'count_by_cid' => true,
    																		'count_by_hits' => false,
																			'count_all' => false,
																			'count_all_cids'=> false)); 
	
	$subcategories = pnModAPIFunc('Downloads', 'user', 'categoryhandler1',array('catid' => $cid));	
			  			  
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching 
    $pnr->caching = false;
    $pnr->assign('extrainfo', $extrainfo);
    $pnr->assign('subcategories', $subcategories);
    $pnr->assign('numitems', $numitems);
    $pnr->assign('start', $start);
    $pnr->assign('cid', $cid);
    $pnr->assign('cclause', $cclause);
    $pnr->assign('sortby', $sortby);
    $pnr->assign('ratingispossible', $ratingispossible);
    $pnr->assign('commentspossible', $commentspossible);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('files', $files);
    $pnr->assign('nav_path', $nav_path);
    $pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
    // Return the output
    return $pnr->fetch('user/downloads_user_sublevel.htm');
}

/**
 *
 * main user interface
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_prep_hand_out($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

  	extract($args);
	unset($args);
	
	//Get clean vars
    $lid  = pnVarCleanFromInput('lid');
	
	$is_secure_set = pnModGetVar('downloads', 'securedownload');
	
	if($is_secure_set == 'yes')
	{
		$thecaptcha = pnModAPIFunc('Downloads', 'user', 'gen_captcha');
	}
	
	$session_is_limited = pnModGetVar('downloads', 'sessionlimit');	
	
	if($session_is_limited == 'yes')
	{
		$dl_is_set = pnSessionGetVar('dlcount');

	  	if(empty($dl_is_set))
	  	{
			$dlcount = 1;
			pnSessionSetVar('dlcount',$dlcount);
		}
	  	else
	  	{
		    $dlcount = pnSessionGetVar('dlcount');
		    $dlcount = ++$dlcount;
		    pnSessionSetVar('dlcount',$dlcount);
		}

	  	if($dlcount < pnModGetVar('downloads', 'sessiondownloadlimit'))
	  	{
		    $myfile = pnModAPIFunc('Downloads', 'user', 'handout_file',array('lid'=> $lid ));
		}
	  	else
	  	{
		    return pnRedirect(pnModURL('Downloads', 'user', 'main'));
		}
	}

	if($is_secure_set == 'no' && $session_is_limited == 'no')
	{
		$myfile = pnModAPIFunc('Downloads', 'user', 'handout_file',array('lid'=> $lid ));
	}
	
    // Create output object
    $pnr =& new pnRender('Downloads');

    $pnr->caching = false;
    $pnr->assign('thecaptcha', $thecaptcha);
    $pnr->assign('lid', $lid);
    return $pnr->fetch('user/downloads_user_hand_out.htm');
}

/**
 *
 * main user interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_hand_out($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
	
	// Security check
	if (!pnSecConfirmAuthKey())
    {
        return errorpage(__FILE__,__LINE__,__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom),false,true);
    }

	extract($args);
	unset($args);
	
    //Get vars from template and clean them 
    list($lid, $password)  = pnVarCleanFromInput('lid','password');
    
    $my_captcha = new captcha();
    
	$cptid = pnModGetVar('downloads', 'cptid');
    
    $captcha_temp_path = pnModGetVar('downloads', 'captcha_cache');
    
    if (true === $my_captcha->verify($password,$cptid, $captcha_temp_path ) )
	{
		$clean = pnModAPIFunc('Downloads', 'user', 'cleanup_captcha');
		$myfile = pnModAPIFunc('Downloads', 'user', 'handout_file',array('lid'=> $lid ));
	}
	
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching
    $pnr->caching = false;
	 //add the download id to the template to be able to redirect to the item
    $pnr->assign('lid',$lid);
    // Return the output
    return $pnr->fetch('user/downloads_user_hand_out_failed.htm');
}

/**
 *
 * new download interface
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_newdownload($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage( __FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
	 //Get vars from template and clean them
    $is_error = pnVarCleanFromInput('is_error');

	// Create output object
	$pnr =& new pnRender('Downloads');

	// No chaching in adminmenu
    $pnr->caching = false;
    
	If($is_error == 1)
	{
	  	 //get vars from session
	    $title = pnSessionGetVar('title');
	    $userurl = pnSessionGetVar('userurl');	   
	    $filesize = pnSessionGetVar('filesize');
	    $description = pnSessionGetVar('description');
	    $submitter = pnSessionGetVar('submitter');
	    $submittermail = pnSessionGetVar('submittermail');
	    $homepage = pnSessionGetVar('homepage');
	    $version = pnSessionGetVar('version');

		$pnr->assign('title', $title);
	    $pnr->assign('userurl', $userurl);
	    $pnr->assign('filesize', $filesize);
	    $pnr->assign('description', $description);
	    $pnr->assign('submitter', $submitter);
	    $pnr->assign('submittermail', $submittermail);
	    $pnr->assign('homepage', $homepage);
	    $pnr->assign('version', $version);
	}
	
	$catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid' => 0, 'sel' => 0));

    //get some user info and add them to the template
    $user                   = pnUserGetVar('name');
    $usermail               = pnUserGetVar('email');
    $userhomepage           = pnUserGetVar('url');
    $showfileinput          = pnModGetVar('downloads','allowupload');
    $showscreenshotinput    = pnModGetVar('downloads','allowscreenshotupload');
	$gdbythumbnail          = pnModGetVar('downloads','gd');
	
    $pnr->assign('catSelectList', $catSelectList);
    $pnr->assign('user', $user);
    $pnr->assign('usermail', $usermail);
    $pnr->assign('userhomepage', $userhomepage);
    $pnr->assign('showfileinput', $showfileinput);
    $pnr->assign('showscreenshotinput', $showscreenshotinput);
    $pnr->assign('gdbythumbnail', $gdbythumbnail);
    
	// Return the output that has been generated by this function
	return $pnr->fetch('user/downloads_user_add_download.htm');

}

/**
 *
 * add new download to db
 *
 * @author       Lindbergh
 * @version      2.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_newdownload_add($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
   
 
	// Security check
	if (!pnSecConfirmAuthKey())
    {
        return errorpage(__FILE__,__LINE__,__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
    }
    

    extract($args);
	unset($args);
    
   //Get vars from template and clean them 
    list($title,
         $selcats,
         $userfile,
         $userurl,
         $filesize,
         $sizetype,
         $screenshot,
         $description,
         $submitter,
         $submittermail,
	 	 $homepage,
	 	 $version)   = pnVarCleanFromInput( 'title',
	 	                                    'selcats',
                                            'userfile',
										    'userurl',
										    'filesize',
										    'sizetype',
										    'screenshot',
										    'description',
										    'submitter',
										    'submittermail',
										    'homepage',
										    'version');

    //get vars from global array's
    $userfile_tmp 	= $_FILES['userfile']['tmp_name'];
    $userfile_name 	= $_FILES['userfile']['name'];
    $userfile_size 	= $_FILES['userfile']['size'];
    $userurl 		= $_REQUEST['userurl'];
    $screenshot     = $_FILES['screenshot']['tmp_name'][0];
    $thumbnail      = $_FILES['screenshot']['tmp_name'][1];

	//write vars into session
	//in case of an error we are able to recreate user input from add download form  
		 
	pnSessionSetVar('title',$title);
	pnSessionSetVar('userurl',$userurl);
	pnSessionSetVar('filesize',$filesize);
	pnSessionSetVar('description',$description);
	pnSessionSetVar('submitter',$submitter);
	pnSessionSetVar('submittermail',$submittermail);
	pnSessionSetVar('homepage',$homepage);
	pnSessionSetVar('version',$version);

    //Get modvars
    $limit_size      = pnModGetVar('downloads','limitsize');
    $allowupload     = pnModGetVar('downloads', 'allowupload');
    $is_gd 			 = pnModGetVar('downloads', 'gd');
    
    $nopicsend = false;

    //check for screenshot if gd is active
 	if (empty($screenshot) && is_gd == 1)
	{
		$nopicsend = true;
    }
    
    //check for screenshot and thumbnail if gd is not active
 	if (empty($screenshot) && empty($thumbnail) && is_gd == 0)
	{
		$nopicsend = true;
    }
    
	// no html allowed for title and submitter
	list($title,$submitter)	= pnVarPrepForDisplay($title, $submitter);
													   
    //check all vars and set appropriate message

	// check  file size if it is a link
    if (!empty($filesize) && !empty($sizetype))
    {
      	// convert the file size 
		$converted = pnModAPIFunc('Downloads','user','convert_filesize',
		  				array('filesize'	=> round($filesize),
	                		  'sizetypein'	=> $sizetype,
							  'sizetypeout' => 'b'));
			
		$converted = round($converted);
						  
      	$fsize = explode('-', pnModGetVar('downloads', 'limitsize'));
      	
      	// convert the file size 
		$converted2 = pnModAPIFunc('Downloads','user','convert_filesize',
		  				array('filesize'	=> round($fsize[0]),
	                		  'sizetypein'	=> $fsize[1],
							  'sizetypeout' => 'b'));
							  
		$converted2 = round($converted2);					  
					
      	if (($converted > $converted2))
    	{
        	return errorpage(__FILE__,__LINE__,__('Your file is too large. The max. file size is limited by the web site administrator', $dom),true, false );
    	}
    }

	// check  file size if it is an upload
    if ((!empty($userfile_size)))
    {
      			  
      	$fsize = explode('-', pnModGetVar('downloads', 'limitsize'));

      	// convert the file size 
		$converted = pnModAPIFunc('Downloads','user','convert_filesize',
		  				array('filesize'	=> round($fsize[0]),
	                		  'sizetypein'	=> $fsize[1],
							  'sizetypeout' => 'b'));
							  
		$converted = round($converted);					  
					
      	if ($userfile_size > $converted)
    	{
        	return errorpage(__FILE__,__LINE__,__('Your file is too large. The max. file size is limited by the web site administrator', $dom),true, false );
    	}
    }

	// check if url and file are not empty
    if((!empty($userurl)) && (!empty($userfile_tmp)))
    {
        return errorpage(__FILE__,__LINE__,__('It is not allowed to upload a file and add a link at the same time.', $dom),true, false );
    }
    
	// check what filesize we have to use
    if (!empty($userurl) && empty($userfile_tmp))
    {	                			  
        $userfile_size = $converted;
    }
    
	// check for categories 
    if (empty($selcats))
    {
        return errorpage(__FILE__,__LINE__,__('Choose category:', $dom),true, false );
    }

    //If allowupload= "no" no upload to Server is allowed but linking to url will work
    if ($allowupload == "no" && (!empty($userfile_tmp)))
    {
        return errorpage(__FILE__,__LINE__,__('Upload is disabled!', $dom),true, false );
    }
   
    // check if title is empty
    if (empty($title))
    {
        return errorpage(__FILE__,__LINE__,__('Please enter a Title!', $dom),true, false );
    }
        
    // check if file or url is empty
    if ((empty($userfile_tmp)) && (empty($userurl)))
    {
        return errorpage(__FILE__,__LINE__,__('No URL nor file was given.', $dom),true, false );
    }
        
    // check if description exist
    if (empty($description))
    {
        return errorpage(__FILE__,__LINE__,__('Please enter a description!', $dom),true, false );
    }
    
    // check if submitter exist
    if (empty($submitter))
    {
        return errorpage(__FILE__,__LINE__,__('The field<strong>Submitted by</strong> is mandatory.', $dom),true, false );
    }
    
    // check if submittermail exist
    if (empty($submittermail))
    {
        $submittermail = "-";
    }
    
    // check if homepage exist
    if (empty($homepage))
    {
        $homepage = "-";
    }
    
    // check if version exist
    if (empty($version))
    {
        $version = '1';
    }
    
    //check folders
    $folderflag = pnModAPIFunc('Downloads','user','checkimagefolder');
    
	//add download to db
	$item = pnModAPIFunc('Downloads',
					     'user',
					     'adddownload',
		                  array(	'title' 		=> $title,
	                                'cid' 			=> $selcats,
	                                'file_size'     => $userfile_size,
	                                'userfile_name' => $userfile_name,
	                				'userurl' 		=> $userurl,
	                				'description' 	=> $description,
	                				'submitter'     => $submitter,
	                				'submittermail' => $submittermail,
	                				'homepage' 		=> $homepage,
	                				'version' 		=> $version));
	
	if(false == $nopicsend)
    {
		// here wo do the screenshot/thumbnail upload
	    $myimage = pnModAPIFunc('Downloads','user','imageup',array('lid' => $item));
	                
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
	 
	// let's see if we had an url or a file
    if(empty($userurl)&& !empty($userfile_name))
	{
	  
	  	// get the file extension
    	$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', 
										array('filename' 	=> $userfile_name,
										  	  'upload' 		=> true));
	  
		// init the file and sreenshot upload
    	$file_to_server = pnModAPIFunc('Downloads', 'user', 'prepare_upload', 
										array('file_tmp'	=> $userfile_tmp,
	                				      	  'file_name'	=> $userfile_name,
	                				      	  'nopicsend' 	=> $nopicsend,
	                                      	  'lid'      	=> $item));
	}
										  
	//create new pnRender Object
    $pnr =& new pnRender('Downloads');   

    // No chaching
    $pnr->caching = false;

    return $pnr->fetch('user/downloads_user_add_success.htm');

}

/**
 *
 * show toprated download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_popular($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);

	// Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        $ratingispossible = false;
	}
	else
	{
		$ratingispossible = true;
	}

	$commentspossible = true;

	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
    if (!pnModAPILoad('Downloads', 'user')) 
	{
        pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
        return pnRedirect(pnModURL('Downloads', 'user', 'view'));
    }

	$files = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  		'cid' => 0,
									  		'sort_active' => true, 
									  		'sortby' =>'hits',  
									  		'cclause' => 'DESC',  
									  		'get_by_cid' => false, 
									  		'get_by_lid' => false,
											'get_by_date' => false,
											'limit' => pnModGetVar('downloads', 'popular'),
											'sort_date' => 0,
											'start' => 0));
											
	$thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');
	
	$pnr =& new pnRender('Downloads');
	$pnr->assign('numitems', pnModGetVar('downloads', 'popular'));
    $pnr->assign('ratingispossible', $ratingispossible);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('files',$files);
    $pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
    $pnr->assign('commentspossible',$commentspossible);

    // Return the output that has been generated by this function
    return $pnr->fetch('user/downloads_user_popular.htm');
}

/**
 *
 * show toprated download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_toprated()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    if (!pnModAPILoad('Downloads', 'user')) 
	{
        pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
        return pnRedirect(pnModURL('Downloads', 'user', 'view'));
    }

    // Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        return errorpage(__FILE__,__LINE__,__('Ratings hook must be active for Downloads 2.x to use Ratings.', $dom));
	}
	else
	{
	  	if (!pnModAPILoad('Ratings', 'user')) 
		{
        	pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
        	return pnRedirect(pnModURL('Downloads', 'user', 'view'));
    	}

		$files = pnModAPIFunc('Downloads', 'user', 'get_rating_info',array('getstring' => 'getall'));
		$ratingispossible = true;
		
	}
    
    $commentspossible = true;

	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');

	$extrainfo = pnModURL('Downloads', 'user', 'toprated');
    
	$pnr =& new pnRender('Downloads');
	$pnr->assign('extrainfo', $extrainfo);
    $pnr->assign('ratingispossible', $ratingispossible);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('files', $files);
    $pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
	$pnr->assign('commentspossible', $commentspossible);
    // Return the output that has been generated by this function
    return $pnr->fetch('user/downloads_user_toprated.htm');
}

/**
 *
 * show all new downloads selection page
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_new($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	$filter = pnVarCleanFromInput( 'filter');
	
	if(empty($filter) || !is_numeric($filter))
	{
	  	$filter = 7;
	}
	
    // get downloads of the actual week
    $dlsweek = pnModAPIFunc('Downloads', 'user', 'submitted_week');
    
    // get downloads of the actual month
    $dlsmonth = pnModAPIFunc('Downloads', 'user', 'submitted_month');
    
    // get downloads of the actual month
    $newdllist = pnModAPIFunc('Downloads', 'user', 'get_downloads_by_date',array('filter' => $filter));
	   
    $pnr =& new pnRender('Downloads');
    $pnr->assign('dlsweek', $dlsweek);
    $pnr->assign('dlsmonth', $dlsmonth);
    $pnr->assign('newdllist', $newdllist);
    // Return the output that has been generated by this function
    return $pnr->fetch('user/downloads_user_new.htm');
    
}

/**
 *
 * show all new downloads by date
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_user_show_new($args)
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	//Get vars and clean them
    list($date,
		$start)  = pnVarCleanFromInput('date',
										'start');
	$datecount = explode("-", $date);

	// set a default for start if empty or not numeric
	if(!isset($start) || !is_numeric($start))
	{
		$start = 0;
	}
      
    // get downloads of the actual month
    $files = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => 0,
									  		'cid' => 0,
									  		'sort_active' =>true, 
									  		'sortby' => 'date',  
									  		'cclause' => 'desc',  
									  		'get_by_cid' => false, 
									  		'get_by_lid' => false,
											'get_by_date' => true,
											'limit' => pnModGetVar('downloads', 'newdownloads'),
											'sort_date' => $datecount[0],
											'start' => $start));
    
    // Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        $ratingispossible = false;
	}
	else
	{
		$ratingispossible = true;
		$extrainfo = pnModURL('Downloads', 'user', 'show_new', array('date'=> $date));
	}
	
	$commentspossible = true;

	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
	$numitems = $amountofnew;
	
    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');
    
    $pnr =& new pnRender('Downloads');
    $pnr->assign('numitems', $numitems);
    $pnr->assign('start', $start);
    $pnr->assign('date', $date);
	$pnr->assign('newdownloads', $newdownloads);
	$pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
	$pnr->assign('files', $files);
	$pnr->assign('extrainfo', $extrainfo);
	$pnr->assign('ratingispossible', $ratingispossible);
	$pnr->assign('commentspossible', $commentspossible);
	$pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
    // Return the output that has been generated by this function
    return $pnr->fetch('user/downloads_user_show_new.htm');
    
}

/**
 *
 * main user interface
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        $cid - category id
 * @return       pnRender Object
 */
function Downloads_user_display($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
    //Get vars from template and clean them
    $lid  = pnVarCleanFromInput('lid');
    
    $download_to_view = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => $lid,
									  		'cid' => 0,
									  		'sort_active' => false, 
									  		'sortby' => 0,  
									  		'cclause' => 0,  
									  		'get_by_cid' => false, 
									  		'get_by_lid' => true,
											'get_by_date' => false,
											'limit' => 1,
											'sort_date' => 0,
											'start'=> 0));

    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');

	$ratingispossible = true;
	$commentspossible = true;
	
	// Check for existence of the ratings module
    if (!pnModAvailable('Ratings') || !pnModIsHooked('Ratings', 'Downloads')) 
	{
        $ratingispossible = false;
	}
	
	// Check for existence of the EZComments module
    if (!pnModAvailable('EZComments') || !pnModIsHooked('EZComments', 'Downloads')) 
	{
        $commentspossible = false;
	}
	
	$extrainfo = pnModURL('Downloads', 'user', 'display', array('lid'=> $lid));
				     
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('extrainfo', $extrainfo);
    $pnr->assign('ratingispossible', $ratingispossible);
    $pnr->assign('commentspossible', $commentspossible);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('showscreenshot',pnModGetVar('downloads', 'showscreenshot'));
    $pnr->assign('files', $download_to_view);
    // Return the output
    return $pnr->fetch('user/downloads_user_display.htm');
}


/**
 *
 * user search
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        array
 * @return       pnRender Object
 */
function Downloads_user_search($args=array())
{
    $submit = pnVarCleanFromInput('submit');
    // get PostNuke Version string
    $compare_string = pnConfigGetVar('Version_Num');
    
    if('0' <= strcmp($compare_string, '0.7.6.4'))
    {
	  return pnRedirect(pnModURL('Search', 'user', 'main'));			
	}
    
    if(!$submit) 
	{
        return pnModAPIFunc('Downloads', 'search', 'options',array('outside_flag'=> false));
    } 
	else
	{
        return pnModAPIFunc('Downloads', 'search', 'search');
    }
}

/** 	 /**
  * 	  *
  * user search 	 
  * 	 
  * @author       Lindbergh 	 
  * @version      1.0 	 
  * @param        array 	 
  * @return       pnRender Object 	 
  */ 	 
 function Downloads_user_dosearch() 	 
 { 	 
         list($active_Downloads, 	 
          $Downloads_startnum, 	 
          $dl_search_limit, 	 
          $bool, 	 
          $dl_uploader, 	 
          $q, 	 
          $outside_flag) = pnVarCleanFromInput( 'active_Downloads', 	 
                                                'Downloads_startnum', 	 
                                                'dl_search_limit', 	 
                                                'bool', 	 
                                                'dl_uploader', 	 
                                                'q', 	 
                                            	'outside_flag'); 	 
  	 
         return pnModAPIFunc('Downloads', 'search', 'search',array('active_Downloads'=> $active_Downloads,'Downloads_startnum'=> $Downloads_startnum,'dl_search_limit'=> $dl_search_limit,'bool'=> $bool,'dl_uploader'=> $dl_uploader,'q'=> $q,'outside_flag'=> $outside_flag)); 	 
 }
 
/**
 *
 * modrequest
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        array
 * @return       pnRender Object
 */
function Downloads_user_modrequest($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    // Security check
	if (!pnSecConfirmAuthKey())
    {
        return errorpage(__FILE__,__LINE__,__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
    }
    
    extract($args);
	unset($args);
	
	//Get vars from template and clean them 
    list($lid,
         $title)   = pnVarCleanFromInput( 'lid',
	 	                                  'title');
	 	                                  
	$user      = pnUserGetVar('name');
    $usermail  = pnUserGetVar('email');
	// Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('title', $title);
    $pnr->assign('lid', $lid);
    $pnr->assign('user', $user);
    $pnr->assign('usermail', $usermail);
    // Return the output
    return $pnr->fetch('user/downloads_user_modrequest.htm');
}

/**
 *
 * modrequest
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        array
 * @return       pnRender Object
 */
function Downloads_user_modrequest_submit($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_OVERVIEW))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    // Security check
	if (!pnSecConfirmAuthKey())
    {
        return errorpage(__FILE__,__LINE__,__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
    }
    
    extract($args);
	unset($args);
	
	//Get vars from template and clean them 
    list($lid,
         $title,
         $description,
         $submitter,
         $submittermail)   = pnVarCleanFromInput( 'lid',
	 	                                          'title',
                                                  'description',
                                                  'submitter',
										          'submittermail');

	$mrq = pnModAPIFunc('Downloads', 'user', 'insert_modrequest', 
					array(	'lid'=> $lid,
							'title'=> $title,
							'description'=> $description,
							'submitter'=> $submitter,
							'submittermail'=> $submittermail));
	
	pnSessionSetVar('errormsg', __('Thanks for your support!', $dom));
	
	return pnRedirect(pnModURL('Downloads', 'user', 'main'));						          

}

/**
 *
 * modrequest
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        array
 * @return       pnRender Object
 */
function Downloads_user_torrent($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	//Get vars from template and clean them 
    $lid= pnVarCleanFromInput('lid');
	
	   	pnModAPIFunc('Downloads', 'torrent', 'stream', array('lid'=> $lid));
	   	
	   	return true;			
		
}


/**
 *
 * get image if in or out of webroot
 *
 * @author       Lindbergh
 * @author       Landseer
 * @author       Axel
 * @version      1.0
 * @param        array
 * @return       image data
 */
function Downloads_user_getimage($args)
{		
	//Get vars from template and clean them 
    $img = pnVarCleanFromInput('img');
    
    $filename = basename($img);

    // get file extension
	$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', array('filename' => $filename));
			
	// get the right content type
	$contenttype = pnModAPIFunc('Downloads', 'user', 'getcontenttype', array('extension' => $file_extension));

    $data = file_get_contents($img);
	
   // following code is based on Axels MediaAttach/pnuser/download.php
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public");
    header("Content-Description: image");
    header("Content-Disposition: inline; filename=" . pnVarPrepForDisplay($filename) . ";");
    header("Content-type: $contenttype");
    header("Content-Transfer-Encoding: binary");
    
    echo $data;
    exit;
}
?>