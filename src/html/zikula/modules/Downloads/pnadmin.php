<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  administrator GUI functions
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
//------------------------------------------------------------------------------------
 
include_once('modules/Downloads/common.php');

/**
 *
 * main admin interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_main()
{
   	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    //check image folder
    $imagefolderflags = pnModAPIFunc('Downloads','admin','check_screenshot_folder');

    //check upload folder
    $uploadfolderflags = pnModAPIFunc('Downloads','admin','check_upload_folder');

	//check cache folder
    $cachefolderflags = pnModAPIFunc('Downloads','admin','check_cache_folder');
    
    
    if ((pnModAvailable('CmodsDownload') && (pnModGetVar('downloads', 'importfrommod') != 1)) || (pnModAvailable('UpDownload') && (pnModGetVar('downloads', 'importfrommod') != 1)))
	{
	  
	  	if($imagefolderflags['screenshot_folderislink'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Could not find the screen shot folder on the server!', $dom), false, false, false, true);
		}
		
		if($imagefolderflags['screenshot_folderiswrite'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Wrong permission set for the screen shot folder . Please use CHMOD 777!', $dom), false, false, false, true);
		}
		
		if($uploadfolderflags['upload_folderislink'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Could not find the upload folder on the Server!', $dom),false, false, false, true);
		}
		
		if($uploadfolderflags['upload_folderiswrite'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Wrong Permission set for the upload folder. Please use CHMOD 777!', $dom),false, false, false, true);
		}
		
		if($cachefolderflags['cache_folderislink'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Could not find the cache folder on the server!', $dom),false, false, false, true);
		}
		
		if($cachefolderflags['cache_folderiswrite'] === false)
	  	{
		    return errorpage(__FILE__,__LINE__,__('Wrong permission set for the cache folder. Please use CHMOD 777!', $dom),false, false, false, true);
		}
		
		pnRedirect(pnModURL('Downloads', 'admin', 'upgrade_menu'));
	}
    
    
    
    //check for gd
    $is_gd = pnModGetVar('downloads', 'gd');
    
    $file_uploads        = ini_get('file_uploads');
    $post_max_size       = ini_get('post_max_size');
    $upload_max_filesize = ini_get('upload_max_filesize');

	$mailer_available = true; 
	
	// send an email notification
    if (!pnModAvailable('Mailer')) 
	{
		$mailer_available = false; 
	}

    // Create output object
    $pnr =& new pnRender('Downloads');
    
    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('screenislink', $screenislink);
	$pnr->assign('screeniswrite',$screeniswrite);
	$pnr->assign('upload_folderislink', $uploadfolderflags['upload_folderislink']);
	$pnr->assign('upload_folderiswrite', $uploadfolderflags['upload_folderiswrite']);
	$pnr->assign('screenshot_folderislink', $imagefolderflags['screenshot_folderislink']);
	$pnr->assign('screenshot_folderiswrite', $imagefolderflags['screenshot_folderiswrite']);
	$pnr->assign('cache_folderislink', $uploadfolderflags['cache_folderislink']);
	$pnr->assign('cache_folderiswrite', $uploadfolderflags['cache_folderiswrite']);
	$pnr->assign('is_gd', $is_gd);
	$pnr->assign('post_max_size', $post_max_size);
	$pnr->assign('upload_max_filesize',$upload_max_filesize);
	$pnr->assign('file_uploads', $file_uploads);
	$pnr->assign('mailer_available', $mailer_available);
	
    // Return the output
    return $pnr->fetch('admin/downloads_admin_main_menu_sysinfo.htm');
}

/**
 *
 * statistical config interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modifyconfig_misc()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    //Get module vars
    
    $selstr = 'selected="selected"';
    
    $sortby_allowed = array('title','hits','date');

    $sortby_standard = pnModGetVar('downloads', 'standard_sortby');
    
    foreach($sortby_allowed as $sortby)
    {
      	
      	if($sortby === 'hits')
	  	{
	    	$fieldstring = __('Hits', $dom);
		}
      	
      	if($sortby === 'title')
	  	{
	    	$fieldstring = __('Title', $dom);
		}
		
		if($sortby === 'date')
	  	{
	    	$fieldstring = __('Date', $dom);
		}
		
	  	if($sortby_standard === $sortby)
	  	{
	    	$sortby_set .= "<option value=\"$sortby\" $selstr>$fieldstring</option>";
		}
	 	else
	 	{
	    	$sortby_set .= "<option value=\"$sortby\">$fieldstring</option>";
		}
	}

    $cclause_allowed = array('ASC','DESC');
    
    $cclause_standard = pnModGetVar('downloads', 'collateral_clause');
    
    foreach($cclause_allowed as $cclause)
    {
      	if($cclause === 'ASC')
	  	{
	    	$fieldstring = __('Ascending', $dom);
		}
      	
      	if($cclause === 'DESC')
	  	{
	    	$fieldstring = __('Descending', $dom);
		}
		
	  	if($cclause == $cclause_standard)
	  	{
	    	$cclause_set .= "<option value=\"$cclause\" $selstr>$fieldstring</option>";
		}
	 	else
	 	{
	    	$cclause_set .= "<option value=\"$cclause\">$fieldstring</option>";
		}
	}

	$checked = 'checked=\'checked\' ';
	
    if (pnModGetVar('downloads', 'showscreenshot') == "yes")
	{
        	$showscreenshotonchecked = $checked;
        	$showscreenshotoffchecked = " ";
 	}
     else
    {
        	$showscreenshotonchecked = " ";
        	$showscreenshotoffchecked = $checked;
 	}
 	
 	if(pnModGetVar('downloads', 'fulltext') == '1')
	{
	   	$fulltext_set .= "<option value=\"1\" $selstr>".__('Yes', $dom)."</option>";
	   	$fulltext_set .= "<option value=\"0\">".__('No', $dom)."</option>";
	}
	else
	{
	   	$fulltext_set .= "<option value=\"1\">".__('Yes', $dom)."</option>";
	   	$fulltext_set .= "<option value=\"0\" $selstr>".__('No', $dom)."</option>";
	}
		
	$selstr = 'selected="selected"';
	
	$scsize = explode('-', pnModGetVar('downloads', 'screenshotmaxsize'));

	if($scsize[1] === 'Kb')
	{
	    $scsizetype_set .= "<option value='Kb' $selstr>Kb</option>";
	    $scsizetype_set .= "<option value='Mb'>Mb</option>";
	}
	elseif($scsize[1] === 'Mb')
	{
	    $scsizetype_set .= "<option value='Kb'>Kb</option>";
	    $scsizetype_set .= "<option value='Mb' $selstr>Mb</option>";
	}
	else
	{
		$scsizetype_set .= "<option value='Kb'>Kb</option>";
	    $scsizetype_set .= "<option value='Mb'>Mb</option>";
	}
	
	$tnsize = explode('-', pnModGetVar('downloads', 'thumbnailmaxsize'));

	if($tnsize[1] === 'Kb')
	{
	    $tnsizetype_set .= "<option value='Kb' $selstr>Kb</option>";
	    $tnsizetype_set .= "<option value='Mb'>Mb</option>";
	}
	elseif($tnsize[1] === 'Mb')
	{
	    $tnsizetype_set .= "<option value='Kb'>Kb</option>";
	    $tnsizetype_set .= "<option value='Mb' $selstr>Mb</option>";
	}
	else
	{
		$tnsizetype_set .= "<option value='Kb'>Kb</option>";
	    $tnsizetype_set .= "<option value='Mb'>Mb</option>";
	}
	
	
	// Create output object
	$pnr =& new pnRender('Downloads');
	
	// No chaching in adminmenu
    $pnr->caching = false;
	
	
	$pnr->assign('perpage', pnModGetVar('downloads', 'perpage'));
	$pnr->assign('newdownloads', pnModGetVar('downloads', 'newdownloads'));
	$pnr->assign('topdownloads', pnModGetVar('downloads', 'topdownloads'));
	$pnr->assign('popular', pnModGetVar('downloads', 'popular'));
	$pnr->assign('showscreenshotonchecked', $showscreenshotonchecked);
	$pnr->assign('showscreenshotoffchecked', $showscreenshotoffchecked);
	$pnr->assign('scsizetype_set', $scsizetype_set);
	$pnr->assign('tnsizetype_set', $tnsizetype_set);
	$pnr->assign('screenshotmaxsize', $scsize[0] );
	$pnr->assign('thumbnailmaxsize', $tnsize[0] );
	$pnr->assign('thumbnailwidth', pnModGetVar('downloads', 'thumbnailwidth'));
	$pnr->assign('thumbnailheight', pnModGetVar('downloads', 'thumbnailheight'));
	$pnr->assign('sortby_set', $sortby_set);
	$pnr->assign('cclause_set', $cclause_set);
	$pnr->assign('fulltext_set', $fulltext_set);
	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_modifyconfig_misc.htm');
}

/**
 *
 * set misc config
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $downloadvotemin
 * @param        integer $popular
 * @param        integer $newdownloads
 * @param        integer $topdownloads
 * @param        integer $downloadsresults
 * @return       pnRender Object
 */
function Downloads_admin_updateconfig_misc($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    list($fulltext,
		 $sortby,
		 $cclause,
		 $perpage,
	 	 $popular,
	 	 $newdownloads,
		 $topdownloads,
		 $showscreenshot,
	 	 $screenshotmaxsize,
		 $thumbnailmaxsize,
		 $scsizetype,
		 $tnsizetype,
         $thumbnailwidth,
	 	 $thumbnailheight,
		 $oldthumbwidht,
		 $oldthumbheight) = pnVarCleanFromInput('fulltext',
			  									'sortby',
												'cclause',
												'perpage',
											    'popular',
											    'newdownloads',
											    'topdownloads',
												'showscreenshot',
	                                            'screenshotmaxsize',
	                                            'thumbnailmaxsize',
												'scsizetype',
												'tnsizetype',
	                                            'thumbnailwidth',
	                                            'thumbnailheight',
	                                            'oldthumbwidht',
												'oldthumbheight');

	//check if var is empty --> if yes apply default value
	
	if (empty($fulltext))
	{
        $fulltext = 0;
    }
    
	if (empty($sortby))
	{
        $sortby = 'title';
    }
    
    if (empty($cclause))
	{
        $cclause = 'ASC';
    }
	
    if (empty($perpage))
	{
        $perpage = 10;
    }
      
    if (empty($popular))
	{
        $popular = 5;
    }
    
    if (empty($newdownloads))
	{
        $newdownloads = 10;
    }
    
    if (empty($topdownloads))
	{
        $topdownloads = 10;
    }

    if (empty($showscreenshot))
	{
        $showscreenshot = "yes";
    }

    if (empty($screenshotmaxsize))
	{
        $screenshotmaxsize = 300;
    }

    if (empty($thumbnailmaxsize))
	{
        $thumbnailmaxsize = 150;
    }

    if (empty($thumbnailwidth))
	{
        $thumbnailwidth = 100;
    }
    
    if (empty($thumbnailheight))
	{
        $thumbnailheight = 100;
    }
    
       
    pnModSetVar('downloads', 'fulltext',$fulltext);
    pnModSetVar('downloads', 'standard_sortby',$sortby);
	pnModSetVar('downloads', 'collateral_clause', $cclause);
    pnModSetVar('downloads', 'perpage',$perpage);
	pnModSetVar('downloads', 'popular', $popular);
    pnModSetVar('downloads', 'newdownloads', $newdownloads);
    pnModSetVar('downloads', 'topdownloads', $topdownloads);
    pnModSetVar('downloads', 'showscreenshot', $showscreenshot);
	pnModSetVar('downloads', 'screenshotmaxsize', $screenshotmaxsize.'-'.$scsizetype);
	pnModSetVar('downloads', 'thumbnailmaxsize', $thumbnailmaxsize.'-'.$tnsizetype);
	pnModSetVar('downloads', 'thumbnailwidth', $thumbnailwidth);
    pnModSetVar('downloads', 'thumbnailheight', $thumbnailheight);
    
	if($thumbnailwidth != $oldthumbwidht || $thumbnailheight != $oldthumbheight)
	{
	   pnModAPIFunc('Downloads', 'image', 'resize_thumbnails');
	}

    pnRedirect(pnModURL('Downloads', 'admin', 'modifyconfig_misc'));

    // Return
    return true;
}

/**
 *
 * upload/download config interface
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modifyconfig_updown()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    //Get module vars
	$checked = "checked=\"checked\" ";
	
	if (pnModGetVar('downloads', 'torrent') == "yes")
	{
        	$torrentonchecked = $checked;
        	$torrentoffchecked = '';
 	}
     else
    {
        	$torrentonchecked = '';
        	$torrentoffchecked = $checked;
 	}
 	
	if (pnModGetVar('downloads', 'sessionlimit') == "yes")
	{
        	$sessionlimitonchecked = $checked;
        	$sessionlimitoffchecked = '';
 	}
     else
    {
        	$sessionlimitonchecked = '';
        	$sessionlimitoffchecked = $checked;
 	}
	
	if (pnModGetVar('downloads', 'allowupload') == "yes")
	{
        	$allowuploadonchecked = $checked;
        	$allowuploadoffchecked = '';
 	}
     else
    {
        	$allowuploadonchecked = '';
        	$allowuploadoffchecked = $checked;
 	}
	
	if (pnModGetVar('downloads', 'allowscreenshotupload') == "yes")
	{
        	$allowscreenshotuploadonchecked = $checked;
        	$allowscreenshotuploadoffchecked = '';
 	}
     else
    {
        	$allowscreenshotuploadonchecked = '';
        	$allowscreenshotuploadoffchecked = $checked;
 	}
 	
	if (pnModGetVar('downloads', 'securedownload') == "yes")
	{
        	$securedownloadonchecked = $checked;
        	$securedownloadoffchecked = '';
 	}
     else
    {
        	$securedownloadonchecked = '';
        	$securedownloadoffchecked = $checked;
 	}
	
	if (pnModGetVar('downloads', 'sizelimit') == "yes")
	{
        	$sizelimitonchecked = $checked;
        	$sizelimitoffchecked = '';
 	}
     else
    {
        	$sizelimitonchecked = '';
        	$sizelimitoffchecked = $checked;
 	}
	
	$selstr = 'selected="selected"';
	
	$fsize = explode('-', pnModGetVar('downloads', 'limitsize'));

	if($fsize[1] === 'Kb')
	{
	    $fsizetype_set .= "<option value='Kb' $selstr>Kb</option>";
	    $fsizetype_set .= "<option value='Mb'>Mb</option>";
	    $fsizetype_set .= "<option value='Gb' >Gb</option>";
	}
	elseif($fsize[1] === 'Mb')
	{
	    $fsizetype_set .= "<option value='Kb'>Kb</option>";
	    $fsizetype_set .= "<option value='Mb' $selstr>Mb</option>";
	    $fsizetype_set .= "<option value='Gb' >Gb</option>";
	}
	elseif($fsize[1] === 'Gb')
	{
	    $fsizetype_set .= "<option value='Kb'>Kb</option>";
	    $fsizetype_set .= "<option value='Mb'>Mb</option>";
	    $fsizetype_set .= "<option value='Gb' $selstr>Gb</option>";
	}
	else
	{
		$fsizetype_set .= "<option value='Kb'>Kb</option>";
	    $fsizetype_set .= "<option value='Mb'>Mb</option>";
	    $fsizetype_set .= "<option value='Gb'>Gb</option>";
	}
	
	// Create output object
	$pnr =& new pnRender('Downloads');

	// No chaching in adminmenu
    $pnr->caching = false;

	$pnr->assign('torrentonchecked', $torrentonchecked);
	$pnr->assign('torrentoffchecked', $torrentoffchecked);
	$pnr->assign('sessionlimitonchecked', $sessionlimitonchecked);
	$pnr->assign('sessionlimitoffchecked', $sessionlimitoffchecked);
    $pnr->assign('sessiondownloadlimit', pnModGetVar('downloads', 'sessiondownloadlimit'));
    $pnr->assign('captchacharacters', pnModGetVar('downloads', 'captchacharacters'));
    $pnr->assign('allowuploadonchecked', $allowuploadonchecked);
	$pnr->assign('allowuploadoffchecked', $allowuploadoffchecked);
	$pnr->assign('allowscreenshotuploadonchecked', $allowscreenshotuploadonchecked);
	$pnr->assign('allowscreenshotuploadoffchecked', $allowscreenshotuploadoffchecked);
	$pnr->assign('securedownloadonchecked', $securedownloadonchecked);
	$pnr->assign('securedownloadoffchecked', $securedownloadoffchecked);
	$pnr->assign('sizelimitonchecked', $sizelimitonchecked);
	$pnr->assign('sizelimitoffchecked', $sizelimitoffchecked);
	$pnr->assign('limitsize', $fsize[0]);
	$pnr->assign('fsizetype_set', $fsizetype_set);
	$pnr->assign('upload_folder',  pnModGetVar('downloads','upload_folder'));
	$pnr->assign('screenshot_folder',  pnModGetVar('downloads','screenshotlink'));
	$pnr->assign('cache_folder',  pnModGetVar('downloads','captcha_cache'));
	
	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_modifyconfig_updown.htm');
    
}

/**
 *
 * set upload/download config
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_updateconfig_updown($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    list($torrent,
		 $sessionlimit,
		 $sessiondownloadlimit,
		 $captchacharacters,
		 $allowupload,
         $allowscreenshotupload,
         $securedownload,
         $sizelimit,
         $limitsize,
         $sizetype,
		 $upload_folder,
		 $screenshot_folder,
		 $cache_folder)   = pnVarCleanFromInput( 'torrent',
		 										 'sessionlimit',
		 										 'sessiondownloadlimit',
                                                 'captchacharacters',
												 'allowupload',
                                                 'allowscreenshotupload',
									             'securedownload',
										         'sizelimit',
										         'limitsize',
										         'sizetype',
										         'upload_folder',
												 'screenshot_folder',
												 'cache_folder');

	//check if var is empty --> if yes apply default value
	
	// dau protection
	if ($sessionlimit == 'yes' && $securedownload == 'yes')
	{
        $sessionlimit = 'no';
    }
	
	if (empty($torrent))
	{
        $torrent =  'no';
    }
    
	if (empty($sessionlimit))
	{
        $sessionlimit =  'yes';
    }
    
	if (empty($sessiondownloadlimit))
	{
        $sessiondownloadlimit = 10;
    }
    
    if (empty($captchacharacters))
	{
        $captchacharacters = 5;
    }	
	
    if (empty($allowupload))
	{
        $allowupload =  'yes';
    }

    if (empty($allowscreenshotupload))
	{
        $allowscreenshotupload =  'yes';
    }
    
    if (empty($securedownload))
	{
        $securedownload =  'yes';
    }

    if (empty($sizelimit))
	{
        $sizelimit =  'yes';
    }

    if (empty($limitsize))
	{
        $limitsize = 2;
    }

    if (empty($upload_folder))
	{
        $upload_folder = 'pnTemp/downloads_upload/';
    }
    
    if (empty($screenshot_folder))
	{
        $screenshot_folder = 'pnTemp/downloads_screenshots/';
    }
    
    if (empty($cache_folder))
	{
        $cache_folder = 'pnTemp/downloads_cache/';
    }
    
   // check for missing slash at the end of the string
	$pos_up = strrchr($upload_folder, '/');
	
	$rest_up = substr($pos_up,1);     

	if(!empty($rest_up))
	{
	  $is_slash = strpos($rest_up, '/');
	  
	  	If(false === $is_slash)
		{
	  		$upload_folder = $upload_folder.'/';
		}
	}

	// check for missing slash at the end of the string
	$pos_ch = strrchr($cache_folder, '/');
	
	$rest_ch = substr($pos_ch,1);     

	if(!empty($rest_ch))
	{
	  $is_slash2 = strpos($rest_ch, '/');
	  
	  	If(false === $is_slash2)
		{
	  		$cache_folder = $cache_folder.'/';
		}
	}
	
	// check for missing slash at the end of the string
	$pos_sc = strrchr($screenshot_folder, '/');
	
	$rest_sc = substr($pos_sc,1);     

	if(!empty($rest_sc))
	{
	  $is_slash3 = strpos($rest_sc, '/');
	  
	  	If(false === $is_slash3)
		{
	  		$screenshot_folder = $screenshot_folder.'/';
		}
	}

	pnModSetVar('downloads', 'torrent',$torrent);
    pnModSetVar('downloads', 'sessionlimit',$sessionlimit);
    pnModSetVar('downloads', 'sessiondownloadlimit',$sessiondownloadlimit);
    pnModSetVar('downloads', 'captchacharacters',$captchacharacters);
    pnModSetVar('downloads', 'allowupload',$allowupload);
    pnModSetVar('downloads', 'allowscreenshotupload',$allowscreenshotupload);
    pnModSetVar('downloads', 'securedownload', $securedownload);
	pnModSetVar('downloads', 'sizelimit', $sizelimit);
	pnModSetVar('downloads', 'limitsize', $limitsize.'-'.$sizetype);
//XTEC ************ ELIMINAT - Upload directories must remain without changes when upgrading configuration
/*
	pnModSetVar('downloads', 'upload_folder', $upload_folder);
	pnModSetVar('downloads', 'screenshotlink', $screenshot_folder);
	pnModSetVar('downloads', 'captcha_cache', $cache_folder);
*/
//************ FI
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('Downloads', 'admin', 'modifyconfig_updown'));

    // Return
    return true;
}

/**
 *
 * userpages config interface
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modifyconfig_frontend()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    //Get module vars
	$checked = "checked=\"checked\" ";
    
    if (pnModGetVar('downloads', 'frontendstyle') == 1)
	{
        	$treeviewonchecked = $checked;
        	$treeviewoffchecked = ' ';
 	}
     else
    {
        	$treeviewonchecked = ' ';
        	$treeviewoffchecked = $checked;
 	}
 	
	if (pnModGetVar('downloads', 'lastxdlsactive') == 'yes')
	{
        	$lastxdlsactiveonchecked = $checked;
        	$lastxdlsactiveoffchecked = ' ';
 	}
     else
    {
        	$lastxdlsactiveonchecked = ' ';
        	$lastxdlsactiveoffchecked = $checked;
 	}

	if (pnModGetVar('downloads', 'topxdlsactive') == 'yes')
	{
        	$topxdlsactiveonchecked = $checked;
        	$topxdlsactiveoffchecked = ' ';
 	}
     else
    {
        	$topxdlsactiveonchecked = ' ';
        	$topxdlsactiveoffchecked = $checked;
 	}
 	
 	if (pnModGetVar('downloads', 'ratexdlsactive') == 'yes')
	{
        	$ratexdlsactiveonchecked = $checked;
        	$ratexdlsactiveoffchecked = ' ';
 	}
     else
    {
        	$ratexdlsactiveonchecked = ' ';
        	$ratexdlsactiveoffchecked = $checked;
 	}

	// Create output object
	$pnr =& new pnRender('Downloads');

	// No chaching in adminmenu
    $pnr->caching = false;

	$pnr->assign('treeviewonchecked', $treeviewonchecked);
	$pnr->assign('treeviewoffchecked', $treeviewoffchecked);
	$pnr->assign('lastxdlsactiveonchecked', $lastxdlsactiveonchecked);
	$pnr->assign('lastxdlsactiveoffchecked', $lastxdlsactiveoffchecked);
	$pnr->assign('lastxdlsamount', pnModGetVar('downloads', 'lastxdlsamount'));
    $pnr->assign('topxdlsactiveonchecked', $topxdlsactiveonchecked);
	$pnr->assign('topxdlsactiveoffchecked', $topxdlsactiveoffchecked);
	$pnr->assign('topxdlsamount', pnModGetVar('downloads', 'topxdlsamount'));
	$pnr->assign('ratexdlsactiveonchecked', $ratexdlsactiveonchecked);
	$pnr->assign('ratexdlsactiveoffchecked', $ratexdlsactiveoffchecked);
	$pnr->assign('ratexdlsamount', pnModGetVar('downloads', 'ratexdlsamount'));
	
	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_modifyconfig_frontend.htm');

}

/**
 *
 * set userpages config 
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_updateconfig_frontend($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
	list($treeview,
		$lastxdlsactive,
		$lastxdlsamount,
		$topxdlsactive,
		$topxdlsamount,
		$ratexdlsactive,
		$ratexdlsamount)   = pnVarCleanFromInput('treeview',
													'lastxdlsactive',
													'lastxdlsamount',
													'topxdlsactive',
													'topxdlsamount',
													'ratexdlsactive',
													'ratexdlsamount');

    //check if var is empty --> if yes apply default value

	if (empty($treeview))
	{
        $treeview = 0;
    }
    
    if (empty($lastxdlsactive))
	{
        $lastxdlsactive = 'yes';
    }

    if (empty($lastxdlsamount))
	{
        $lastxdlsamount = 10;
    }

    if (empty($topxdlsactive))
	{
        $topxdlsactive = 'yes';
    }

    if (empty($topxdlsamount))
	{
        $topxdlsamount = 10;
    }

    if (empty($ratexdlsactive))
	{
        $ratexdlsactive = 'yes';
    }

    if (empty($ratexdlsamount))
	{
        $ratexdlsamount = 10;
    }

	pnModSetVar('downloads', 'frontendstyle', $treeview);
    pnModSetVar('downloads', 'lastxdlsactive', $lastxdlsactive);
	pnModSetVar('downloads', 'lastxdlsamount', $lastxdlsamount);
	pnModSetVar('downloads', 'topxdlsactive', $topxdlsactive);
	pnModSetVar('downloads', 'topxdlsamount', $topxdlsamount);
	pnModSetVar('downloads', 'ratexdlsactive', $ratexdlsactive);
	pnModSetVar('downloads', 'ratexdlsamount', $ratexdlsamount);

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('Downloads', 'admin', 'modifyconfig_frontend'));

    // Return
    return true;
}

/**
 *
 * notify config interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modifyconfig_notification()
{
	$dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	$checked = "checked=\"checked\" ";
	
	if (pnModGetVar('downloads', 'inform_user') == 'yes')
	{
        	$informonchecked = $checked;
        	$informoffchecked = ' ';
 	}
     else
    {
        	$informonchecked = ' ';
        	$informoffchecked = $checked;
 	}
 	
	// Create output object
	$pnr =& new pnRender('Downloads');

	// No chaching in adminmenu
    $pnr->caching = false;



	$pnr->assign('informonchecked', $informonchecked);
	$pnr->assign('informoffchecked', $informoffchecked);
	$pnr->assign('mastermail', pnModGetVar('downloads', 'notifymail'));

	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_modifyconfig_notification.htm');

}

/**
 *
 * set userpages config 
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_updateconfig_notification($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
	list($mastermail,$inform_user)   = pnVarCleanFromInput('mastermail','inform_user');

    //check if var is empty --> if yes apply default value

	if (empty($mastermail))
	{
        $mastermail = pnConfigGetVar('adminmail');
    }
    
    if (empty($inform_user))
	{
        $inform_user = 'yes';
    }

	pnModSetVar('downloads', 'notifymail', $mastermail);
    pnModSetVar('downloads', 'inform_user', $inform_user);
	
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('Downloads', 'admin', 'modifyconfig_notification'));

    // Return
    return true;
}

/**
 *
 * new download interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_newdownload($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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

	$catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList', array('cid' => 0, 'sel' => 0));

    //get some user info and add it to the template
    $user = pnUserGetVar('name');
    $usermail = pnUserGetVar('email');
    $userhomepage = pnUserGetVar('url');
    //get some module info and add it to the template
    $showfileinput = pnModGetVar('downloads','allowupload');
    $showscreenshotinput = pnModGetVar('downloads','allowscreenshotupload');
	$gdbythumbnail = pnModGetVar('downloads','gd');
	
    $pnr->assign('catSelectList', $catSelectList);
    $pnr->assign('user', $user);
    $pnr->assign('usermail', $usermail);
    $pnr->assign('userhomepage', $userhomepage);
    $pnr->assign('showfileinput', $showfileinput);
    $pnr->assign('showscreenshotinput', $showscreenshotinput);
    $pnr->assign('gdbythumbnail', $gdbythumbnail);
    
	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_add_download.htm');
	
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
function Downloads_admin_newdownload_add($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    $userfile_type 	= $_FILES['userfile']['type'];
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
	$is_gd = pnModGetVar('downloads', 'gd');
    
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

	// check  file size 
    if ((!empty($userfile_size)) or (!empty($filesize)))
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
					
      	if (($userfile_size > $converted2) or ($converted > $converted2))
    	{
        	return errorpage(__FILE__,__LINE__,__('Your file is too large. The max. file size is limited by the web site administrator', $dom),true, false );
    	}
    }

	// check if url nad file are empty
    if((!empty($userurl)) && (!empty($userfile_tmp)))
    {
        return errorpage(__FILE__,__LINE__,__('It is not allowed to upload a file and add a link at the same time.', $dom),true, false );
    }

	// check what filesize we have to use
    if (!empty($userurl) && empty($userfile_tmp))
    {         			  
        $userfile_size = $converted;
    }
    
	// check for  categories 
    if (empty($selcats))
    {
        return errorpage(__FILE__,__LINE__,__('Choose category:', $dom),true, false );
    }

    //If allowupload= "no" no upload to Server is allowed but linking to url will work
    if ($allowupload == "no" && (!empty($userfile_tmp)))
    {
        return errorpage(__FILE__,__LINE__,__('Upload is disabled!', $dom),true, false);
    }
   
    // check if title is empty
    if (empty($title))
    {
        return errorpage(__FILE__,__LINE__,__('Please enter a Title!', $dom),true, false);
    }
        
    // check if file and url is empty
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

    return $pnr->fetch('admin/downloads_admin_add_success.htm');
}

/**
 *
 * list waiting downloads
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_waiting_downloads()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	//get an array of downloads waitng for approval
	$downloadswaiting = pnModAPIFunc('Downloads','admin','listwaiting');

	if(empty($downloadswaiting))
	{
        $nolistdls = true;
    }

    $thumbnailwidth 	= pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	= pnModGetVar('downloads', 'thumbnailheight');
    $showscreenshotinput = pnModGetVar('downloads','allowscreenshotupload');
    $gdbythumbnail       = pnModGetVar('downloads','gd');

    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    //add the array to the template
    $pnr->assign('downloadswaiting',$downloadswaiting);
    $pnr->assign('nolistdls',$nolistdls);
    $pnr->assign('download_to_modify', $download_to_modify);
    $pnr->assign('showscreenshotinput',$showscreenshotinput);
    $pnr->assign('gdbythumbnail',$gdbythumbnail);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_list_waiting_downloads.htm');
}


/**
 *
 * modify download interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modify_download()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__,__LINE__,__('No authorization!', $dom));
    }

	//Get vars 
    $cid   = pnVarCleanFromInput('cid');

  	$catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));
  	
	// Create output object
	$pnr =& new pnRender('Downloads');
	// No chaching in adminmenu
    $pnr->caching = false;
	
	if(empty($cid))
	{
		$download_show_list = false;
	}
	else
	{
	  	$download_show_list = true;
	  	//get a list of downloads by their cid
		$cid_downloads_list = pnModAPIFunc('Downloads', 'admin', 'get_all_downloads',array('cid' => $cid));
		$pnr->assign('cid_downloads_list', $cid_downloads_list);
		
		if(empty($cid_downloads_list))
		{
		  	$download_show_list = false;
		  	$pnr->assign('nothing_found', __('There are no downloads to modify in this category!', $dom));
		}
	}

	$pnr->assign('download_show_list', $download_show_list);
    $pnr->assign('catSelectList', $catSelectList);
    
	// Return the output that has been generated by this function
	return $pnr->fetch('admin/downloads_admin_modify_download.htm');

}

/**
 *
 * modify a download
 *
 * @author       Lindbergh
 * @version      1.2
 * @param        array with all necessary info
 * @return       pnRender Object
 */
function Downloads_admin_do_download_modify($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_EDIT))
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
    list($dlid, $fsize )  = pnVarCleanFromInput('dlid','fsize');

	// get the item cid by its lid
	$mycid = pnModAPIFunc('Downloads', 'user', 'item_cid_from_lid',array('lid' => $dlid));

    // get all necessary information about the download to be modified
    $download_to_modify = pnModAPIFunc('Downloads','user','get_download_info',array('lid' => $dlid,
																			  		'cid' => 0,
																			  		'sort_active' => false, 
																			  		'sortby' => 0,  
																			  		'cclause' => 0,  
																			  		'get_by_cid' => false, 
																			  		'get_by_lid' => true,
																					'get_by_date' => false,
																					'sort_date' => 0,
																					'limit' => 1,
																					'start'=> 0,
																					'admin_mod' => true));	
	
	$download_to_modify[0]["modid"] 	= (int) $download_to_modify[0]["modid"];
	$download_to_modify[0]["objectid"] 	= (int) $download_to_modify[0]["objectid"];
																																	
	if($download_to_modify[0]["modid"] !=0 && $download_to_modify[0]["objectid"] !=0 )
	{
		$modinfo = pnModGetInfo($download_to_modify[0]["modid"]);
		$catSelectList= "<option value='0' selected='selected'>".$modinfo['name']."</option>";
	}
	else
	{
		// get cat list with preselected item cid
		$catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid' => 0, 'sel' => $mycid));
	}
	
	
	
	if($download_to_modify[0]["outsideflag"] === true)
	{																					

		if(!$fsize)
		{
	  		$fsize = pnModAPIFunc('Downloads','user','calcsize',array('filesize' => $download_to_modify[0]["filesize"]));
	  		$fsize = explode('-', $fsize);		
		}
		else
		{
			$fsize = explode('-', $fsize);
		}

		// convert the file size 
		$converted = pnModAPIFunc('Downloads','user','convert_filesize',
			  				array('filesize'	=> $download_to_modify[0]["filesize"],
		                		   'sizetypein'	=> 'b',
							  	   'sizetypeout' => $fsize[1]));
		 
		  
		$download_to_modify[0]["filesize"] = $converted;  	
	
		$selstr = 'selected="selected"';
		
		if($fsize[1] === 'Kb')
		{
		    $fsizetype_set .= "<option value='b'>b</option>";
			$fsizetype_set .= "<option value='Kb' $selstr>Kb</option>";
		    $fsizetype_set .= "<option value='Mb'>Mb</option>";
		    $fsizetype_set .= "<option value='Gb' >Gb</option>";
		}
		elseif($fsize[1] === 'Mb')
		{
		    $fsizetype_set .= "<option value='b'>b</option>";
			$fsizetype_set .= "<option value='Kb'>Kb</option>";
		    $fsizetype_set .= "<option value='Mb' $selstr>Mb</option>";
		    $fsizetype_set .= "<option value='Gb' >Gb</option>";
		}
		elseif($fsize[1] === 'Gb')
		{
		    $fsizetype_set .= "<option value='b'>b</option>";
			$fsizetype_set .= "<option value='Kb'>Kb</option>";
		    $fsizetype_set .= "<option value='Mb'>Mb</option>";
		    $fsizetype_set .= "<option value='Gb' $selstr>Gb</option>";
		}
		else
		{
		  	$fsizetype_set .= "<option value='b' $selstr>b</option>";
			$fsizetype_set .= "<option value='Kb'>Kb</option>";
		    $fsizetype_set .= "<option value='Mb'>Mb</option>";
		    $fsizetype_set .= "<option value='Gb'>Gb</option>";
		}
	}
	

	$selected = 'selected=\'selected\'';
	
	if ($download_to_modify[0]["status"] == 1)
	{
        	$selected_status_on  = $selected;
        	$selected_status_off = ' ';
 	}
    else
    {
        	$selected_status_on = ' ';
        	$selected_status_off = $selected;
 	}
 	
 	//Get module vars
    $thumbnailwidth 	 = pnModGetVar('downloads', 'thumbnailwidth');
    $thumbnailheight 	 = pnModGetVar('downloads', 'thumbnailheight');
    $showscreenshotinput = pnModGetVar('downloads','allowscreenshotupload');
    $gdbythumbnail       = pnModGetVar('downloads','gd');
    
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('catSelectList', $catSelectList);
    $pnr->assign('download_to_modify', $download_to_modify);
    $pnr->assign('showscreenshotinput',$showscreenshotinput);
    $pnr->assign('thumbnailwidth',$thumbnailwidth);
    $pnr->assign('thumbnailheight',$thumbnailheight);
    $pnr->assign('gdbythumbnail', $gdbythumbnail);
    $pnr->assign('selected_status_on',$selected_status_on);
    $pnr->assign('selected_status_off', $selected_status_off);
    $pnr->assign('fsizetype_set', $fsizetype_set);
    
	return $pnr->fetch('admin/downloads_admin_do_modify_download.htm');
}

/**
 *
 * update a download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        
 * @return       pnRender Object
 */
function Downloads_admin_update_download($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_EDIT))
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
         $status,
         $oldurl,
         $filesize,
         $actfile,
         $title,
         $hits,
         $selcats,
         $userfile,
         $userurl,
         $screenshot,
         $description,
         $submitter,
         $submittermail,
	 	 $homepage,
	 	 $version,
		 $sizetype)   = pnVarCleanFromInput( 'lid',
                                            'status',
                            	 	        'oldurl',
                            	 	        'filesize',
                            	 	        'actfile',
                                            'title',
                                            'hits',
	 	                                    'selcats',
                                            'userfile',
										    'userurl',
										    'screenshot',
										    'description',
										    'submitter',
										    'submittermail',
										    'homepage',
										    'version',
											'sizetype');
										    
    //get vars from global array's
    $userfile_tmp 	= $_FILES['userfile']['tmp_name'];
    $userfile_name 	= $_FILES['userfile']['name'];
    $userfile_type 	= $_FILES['userfile']['type'];
    $userfile_size 	= $_FILES['userfile']['size'];
    $userurl 		= $_REQUEST['userurl'];
    $screenshot     = $_FILES['screenshot']['tmp_name'][0];
    $thumbnail      = $_FILES['screenshot']['tmp_name'][1];

    $upload_folder = pnModGetVar('downloads','upload_folder');

    if(empty($version))
    {
        $version = 1;
    }
        
	$is_gd = pnModGetVar('downloads', 'gd');
	
	// a new screenshoot is supplied --> we upload it and replace the old one
    if ( ((!empty($screenshot)) && (!empty($thumbnail))) || (!empty($screenshot)) && $is_gd == 1)
	{
        $myimage = pnModAPIFunc('Downloads','user','imageup',
								 array('lid' 	=> $lid,
								 	   'newpic' => 1));
        
        extract($myimage);
        unset($myimage);

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
	
	// check if a new file is supplied
    if ((!empty($userfile_tmp)))
    {
       
       	// get the file extension
    	$file_extension = pnModAPIFunc('Downloads', 'user', 'get_file_extension', 
									array('filename' 	=> $userfile_name,
										  'upload' 		=> true));
	     
		$url = $lid.$file_extension;	
		                           
        //a new file is supplied --> we upload it and replace the old one
        if(false === pnModAPIFunc('Downloads','user','do_php_upload', 
								   array('upload_folder' => $upload_folder,
								    	 'file_tmp'   	 => $userfile_tmp,
									 	 'downloadid'    => $lid,
									 	 'file_name'     => $userfile_name,
									 	 'file_extension'=> $file_extension,
									  	 'actfile'       => $oldurl,
									   	 'newfile'       => 1 )))
        {
            return errorpage(__FILE__,__LINE__, __('Failed to replace the old file.', $dom));
        }
		
		// call the update procedure
        $update = pnModAPIFunc('Downloads','admin','do_update_download',
								array('lid' 			=> $lid,
								 	  'status' 			=> $status,
								  	  'title' 			=> $title,
								      'cid' 			=> $selcats,
								      'filesize' 		=> $userfile_size,
								      'hits' 			=> $hits,
									  'description' 	=> $description,
									  'submitter' 		=> $submitter,
									  'submittermail' 	=> $submittermail,
									  'homepage'	 	=> $homepage,
									  'version' 		=> $version,
									  'url' 			=> $url,
									  'filename' 		=> $userfile_name,
									  'supply_flag' 	=> true));
    }
    else
    {
        if(empty($userurl))
        {
            $url = $oldurl;
            $supply_flag = false;
        }
  		else
  		{
		    $url = $userurl;
		    if($url === $oldurl)
		    {
			  $supply_flag = false;
			}
		    else
		    {
			  $supply_flag = true;
			}
		}																

		if($sizetype)
        {
			// convert the file size 
			$converted = pnModAPIFunc('Downloads','user','convert_filesize',
				  				array('filesize'	=> (float)$filesize,
			                		   'sizetypein'	=> $sizetype,
								  	   'sizetypeout' => 'b'));
			$filesize = $converted; 
		}	  
	 	
	
        // call the update procedure
        $update = pnModAPIFunc('Downloads','admin','do_update_download',
								array('lid' 			=> $lid,
								 	  'status' 			=> $status,
								  	  'title' 			=> $title, 
								  	  'cid' 			=> $selcats,
								  	  'filesize' 		=> $filesize,
								      'hits' 			=> $hits,
								      'description' 	=> $description,
									  'submitter' 		=> $submitter,
									  'submittermail' 	=> $submittermail,
									  'homepage' 		=> $homepage,
									  'version' 		=> $version,
									  'url' 			=> $url,
									  'supply_flag' 	=> $supply_flag));
    }
    
    if (false === $update)
    {
      return errorpage(__FILE__,__LINE__,__('An unknown error occured!', $dom));
    }

	// redirect to the detail page
   return pnRedirect(pnModURL('Downloads', 'user', 'display', array('lid' => $lid)));
}




/**
 *
 * add a waiting download
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_download_approved($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
     //Get vars from template and clean them
    list($lid,
         $status,
         $filesize,
         $title,
         $selcats,
         $url,
         $screenshot,
         $description,
         $submitter,
         $submittermail,
	 	 $homepage,
	 	 $version)   = pnVarCleanFromInput( 'lid',
                                            'status',
                            	 	        'filesize',
                                            'title',
	 	                                    'selcats',
										    'url',
										    'screenshot',
										    'description',
										    'submitter',
										    'submittermail',
										    'homepage',
										    'version');
										    
	$screenshot     = $_FILES['screenshot']['tmp_name'][0];
    $thumbnail      = $_FILES['screenshot']['tmp_name'][1];
    
	if(empty($version))
    {
        $version = 1;
    }
        
	$is_gd = pnModGetVar('downloads', 'gd');
	
	// a new screenshoot is supplied --> we upload it and replace the old one
    if ( ((!empty($screenshot)) && (!empty($thumbnail))) || (!empty($screenshot)) && $is_gd == 1)
	{
        $myimage = pnModAPIFunc('Downloads','user','imageup',
								 array('lid' 	=> $lid,
								 	   'newpic' => 1));
        
        extract($myimage);
        unset($myimage);

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
    
    // call the update procedure
        $update = pnModAPIFunc('Downloads','admin','do_update_download',
								array('lid' 			=> $lid,
								 	  'status' 			=> 1,
								  	  'title' 			=> $title, 
								  	  'cid' 			=> $selcats,
								  	  'filesize' 		=> $filesize,
								      'hits' 			=> 0,
								      'description' 	=> $description,
									  'submitter' 		=> $submitter,
									  'submittermail' 	=> $submittermail,
									  'homepage' 		=> $homepage,
									  'version' 		=> $version,
									  'url' 			=> $url,
									  'supply_flag' 	=> false));
									  
    return pnRedirect(pnModURL('Downloads', 'admin', 'waiting_downloads'));
}

/**
 *
 * delete a submitted download from db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @return       pnRender Object
 */
function Downloads_admin_ask_delete_download($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
    //Get vars from template and clean them 
	$lid   = pnVarCleanFromInput( 'lid');

	// Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    //add the array to the template
    $pnr->assign('lid',$lid);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_ask_delete_download.htm');
}

/**
 *
 * delete a submitted download from db
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $lid
 * @return       pnRender Object
 */
function Downloads_admin_delete_download($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
   //Get vars from template and clean them 
    $lid = pnVarCleanFromInput('lid');

	//delete a download identified by it's id
	$downloaddeleted = pnModAPIFunc('Downloads','admin','remove_download',array('lid' => $lid));

    return pnRedirect(pnModURL('Downloads', 'admin', 'main'));
}

/**
 *
 * main interface for check downloads
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_check_downloads()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));
    
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('catSelectList', $catSelectList);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_check_downloads.htm');
}

/**
 *
 * main interface for check downloads
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_check_downloads_all($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    $chkid   = pnVarCleanFromInput( 'chkid');

	if (!isset($chkid) || !is_numeric($chkid))
	{
		return errorpage( __FILE__, __LINE__, __('Wrong or missing argument passed to the function!', $dom) );
	}

    $checked_downloads = array();

    //call api function to check all downloads
    $checked_downloads = pnModAPIFunc('Downloads','admin','check_all', array('chkid' => $chkid));
    
    if(empty($checked_downloads))
    {
      $nodls = true;
    }
    
    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('nodls',$nodls);
    $pnr->assign('checked_downloads',$checked_downloads);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_check_downloads_all.htm');
}

/**
 *
 * category menu interface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_category_menu()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList', array('cid' => 0, 'sel' => 0));

    // Create output object
	$pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    // add category list to template
    $pnr->assign('catSelectList', $catSelectList);

    return $pnr->fetch('admin/downloads_admin_category_menu.htm');

}

/**
 *
 * add new category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_newcat($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
         $pid,
	 	 $description)   = pnVarCleanFromInput( 'title',
	 	                                        'pid',
                                                'description');
    
    // check if title is empty
    if (empty($title))
    {
        return errorpage(__FILE__,__LINE__,__('Please enter a title for the category!', $dom),false, false );
    }

	//add cat
    $cid = pnModAPIFunc('Downloads','admin','addcat',array(	'title' => $title,'pid' => $pid,'description' => $description));

	$categoryname = pnModAPIFunc('Downloads','user','Cat_Name_From_CID',array('cid' => $cid));
	
	If(!empty($cid) && !empty($categoryname))
	{
		$addsuccess = true;
	}
	
	$catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList', array('cid' => 0, 'sel' => 0));
	
	$pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
	$pnr->assign('addsuccess',$addsuccess);
	$pnr->assign('categoryname',$categoryname);
	$pnr->assign('catSelectList',$catSelectList);

	return $pnr->fetch('admin/downloads_admin_category_menu.htm');
}

/**
 *
 * main interface for modify a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_modify_category_menu()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));

    // Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('catSelectList', $catSelectList);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_modify_category_menu.htm');
}

/**
 *
 * modify a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $cid -- the id of the category to be modified
 * @return       pnRender Object
 */
function Downloads_admin_modify_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    $cid   = pnVarCleanFromInput( 'cid');

    // get all necessary information about the cat to be modified
    // working with arrays is funny. isn't it?!
    $catinfo = pnModAPIFunc('Downloads','user','category_info',array('cid' => $cid));

	if(empty($catinfo)) $catinfo="Leer";

    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('cid',$cid);
	$pnr->assign('catinfo',$catinfo);

	return $pnr->fetch('admin/downloads_admin_do_modifiy_category.htm');
}

/**
 *
 * update a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid -- the id of the category to be modified
 * @param        string $title -- the title of the category to be modified
 * @param        string $description -- the description of the category to be modified
 * @return       pnRender Object
 */
function Downloads_admin_update_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    list($cid, $title, $description)   = pnVarCleanFromInput( 'cid','title','description');

    $update = pnModAPIFunc('Downloads','admin','do_update_category',array('cid' => $cid, 'title' => $title, 'description' => $description));

    if (false === $update)
    {
      return errorpage(__FILE__,__LINE__,__('An unknown error occured!', $dom));
    }
   
   return pnRedirect(pnModURL('Downloads', 'admin', 'category_menu'));
}

/**
 *
 * move a category menu
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_move_category_menu()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));

    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    $pnr->assign('catSelectList', $catSelectList);

	return $pnr->fetch('admin/downloads_admin_move_category_menu.htm');
}

/**
 *
 * move a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $oldcid -- the id of the category to be modified
 * @param        $newcid -- the id of the category where we want to move it
 * @return       pnRender Object
 */
function Downloads_admin_do_move_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    list($oldcid, $newcid)   = pnVarCleanFromInput( 'oldcid','newcid');
    
    $move_result = pnModAPIFunc('Downloads', 'admin', 'move_category',array('newcid'=> $newcid,'oldcid'=> $oldcid));

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));
    
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('catSelectList', $catSelectList);
	return $pnr->fetch('admin/downloads_admin_move_category_menu.htm');
}

/**
 *
 * delete a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @return       pnRender Object
 */
function Downloads_admin_delete_category_menu()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

    $catSelectList = pnModAPIFunc('Downloads', 'user', 'catSelectList',array('cid '=> 0,'sel '=> 0));
    
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('catSelectList', $catSelectList);
	return $pnr->fetch('admin/downloads_admin_delete_category_menu.htm');
}

/**
 *
 * delete a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_ask_delete_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
	
	extract($args);
	unset($args);
	
   //Get vars from template and clean them
    $cid   = pnVarCleanFromInput( 'cid');

	// Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;

    //add the cid to the template
    $pnr->assign('cid',$cid);

    // Return the output
    return $pnr->fetch('admin/downloads_admin_ask_delete_category.htm');
}

/**
 *
 * delete a category
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_delete_category($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	extract($args);
	unset($args);
	
   //Get vars from template and clean them 
    $cid   = pnVarCleanFromInput( 'cid');

	//chekc if this category has childs
	// and change order if necessary
	$category_save_order = pnModAPIFunc('Downloads','admin','check_category_pid',array('cid' => $cid));

	//delete alll downloads from this category
	$category_delete_downloads = pnModAPIFunc('Downloads','admin','remove_downloads',array('cid' => $cid));

	//delete a category identified by it's id
	$category_deleted = pnModAPIFunc('Downloads','admin','remove_category',array('cid' => $cid));

    return pnRedirect(pnModURL('Downloads', 'admin', 'category_menu'));
}



/**
 *
 * file typeinterface
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_filetype_menu()
{
    $dom = ZLanguage::getModuleDomain('Downloads'); 	
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	$allowed_extensions = pnModGetVar('downloads', 'allowed_extensions');
	
	$allowed_extensions = explode(',',$allowed_extensions);
	
    // Create output object
    $pnr =& new pnRender('Downloads');
    
    // No chaching in adminmenu
    $pnr->caching = false;
	$pnr->assign('allowed_extensions', $allowed_extensions);
	
    // Return the output
    return $pnr->fetch('admin/downloads_admin_file_type_menu.htm');
}

/**
 *
 * add an extension
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_add_extension($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads'); 	
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	$extension_add = pnVarCleanFromInput('extension_add');
	
	$pos = strpos($extension_add, '.');

	if($pos === 0)
	{
		$extension_add = substr($extension_add, ($pos+1)); 
		
		$parapos = strpos($extension_add, '.');

		if($parapos === 0)
		{
			$extension_add = substr($extension_add, ($pos+1)); 
		}
	}
	
	$allowed_extensions = pnModGetVar('downloads', 'allowed_extensions');
	
	$allowed_extensions_eq = explode(',',$allowed_extensions);

	$is_element = in_array($extension_add, $allowed_extensions_eq);
	
	if(false === $is_element)
	{
	  	$allowed_extensions = $allowed_extensions.','.$extension_add;
		pnModSetVar('downloads', 'allowed_extensions', $allowed_extensions);
	}
	
	return pnRedirect(pnModURL('Downloads', 'admin', 'filetype_menu'));
}

/**
 *
 * add an extension
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       pnRender Object
 */
function Downloads_admin_delete_extension($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');   	
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
	$extension_del = pnVarCleanFromInput('extension_del');

	$allowed_extensions = pnModGetVar('downloads', 'allowed_extensions');
	
	$allowed_extensions_eq = explode(',',$allowed_extensions);

	$is_element = in_array($extension_del, $allowed_extensions_eq);
	
	if(true === $is_element)
	{
	  	$allowed_extensions_eq = implode(' ', $allowed_extensions_eq);

		$replace ='/'.$extension_del.'/';

	  	$allowed_extensions = preg_replace($replace,'', $allowed_extensions_eq,1);
	  	
	  	$allowed_extensions = rtrim($allowed_extensions);

	  	$allowed_extensions = preg_replace('/ /',',', $allowed_extensions);
	  	
	  	$allowed_extensions = preg_replace('/,,/',',', $allowed_extensions);
	  	
		pnModSetVar('downloads', 'allowed_extensions', $allowed_extensions);
	}
	
	return pnRedirect(pnModURL('Downloads', 'admin', 'filetype_menu'));
}

/**
 *
 *  upgrade menu
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_upgrade_menu($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }

	$cdl_is_active = pnModAvailable('CmodsDownload') ;
	$udl_is_active = pnModAvailable('UpDownload') ;
	
	// Create output object
    $pnr =& new pnRender('Downloads');
    
    // No chaching in adminmenu
    $pnr->caching = false;
    
	$pnr->assign('cdl_is_active', $cdl_is_active);
	$pnr->assign('udl_is_active', $udl_is_active);
	
    // Return the output
    return $pnr->fetch('admin/downloads_admin_upgrade_menu.htm');
}

/**
 *
 * cancel upgrade 
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_no_upgrade($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    $submit   = pnVarCleanFromInput( 'submit');

	if(true == $submit)
	{
  		pnModSetVar('downloads', 'importfrommod', 1);
  		return pnRedirect(pnModURL('Downloads', 'admin', 'main'));
	}

	return pnRedirect(pnModURL('Downloads', 'admin', 'main'));
	
}

/**
 *
 * start upgrade 
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_upgrade_start($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
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
    list($cdlimport, $udlimport)   = pnVarCleanFromInput( 'cdlimport','udlimport');

 	if ($cdlimport == 1) 
	{
  		$cdl_upgrade = pnModAPIFunc('Downloads', 'upgrade', 'cdl_start_upgrade');
 	}

 	if ($udlimport == 1)
	{
  		$udl_upgrade = pnModAPIFunc('Downloads', 'upgrade', 'udl_start_upgrade');
 	}

 	pnModSetVar('downloads', 'importfrommod', 1);

    return pnRedirect(pnModURL('Downloads', 'admin', 'main'));
}

/**
 *
 * get modrequests
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_modrequest()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    $requests = pnModAPIFunc('Downloads', 'admin', 'get_modrequest');
	
	// Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('requests', $requests);
    // Return the output
    
    return $pnr->fetch('admin/downloads_admin_viewmodrequests.htm');
}

/**
 *
 * delete modrequest
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_delete_modrequest($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    extract($args);
	unset($args);
	
   //Get vars from template and clean them 
    $requestid  = pnVarCleanFromInput( 'requestid');
    
    $remove_request = pnModAPIFunc('Downloads', 'admin', 'remove_modrequest',array('requestid' => $requestid));
	
	return pnRedirect(pnModURL('Downloads', 'admin', 'modrequest'));				
}

/**
 *
 * get modrequests
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        integer $cid
 * @return       pnRender Object
 */
function Downloads_admin_hook()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	// Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
    
    $hook = pnModAPIFunc('Downloads', 'admin', 'get_hook_files');
	
	// extract the files 							  		
	foreach($hook as $myfile)
	{
	  	extract($myfile);
	  	$modinfo = pnModGetInfo($myfile['modid']);
		$hookfile['modname'] = $modinfo['name'];	
		$hookfile['title'] = $myfile['title'];
		$hookfile['id'] = $myfile['lid'];
		$hookfile['objectid'] = $myfile['objectid'];
		$hook_files[] = $hookfile;
	}
		
	// Create output object
    $pnr =& new pnRender('Downloads');

    // No chaching in adminmenu
    $pnr->caching = false;
    $pnr->assign('hook_files', $hook_files);
    // Return the output
    
    return $pnr->fetch('admin/downloads_admin_hookfiles.htm');
}



 ?>
