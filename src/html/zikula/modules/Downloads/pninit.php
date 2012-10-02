<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  initialise the module
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

function downloads_init()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	$dbconn  = &pnDBGetConn(true);
	$pntable = &pnDBGetTables();

	$dict = &NewDataDictionary($dbconn);

    $taboptarray = &pnDBGetTableOptions();

	$dl_categories_table   = $pntable['downloads_categories'];
	$dl_categories_column  = &$pntable['downloads_categories_column'];

	$sql = 	"
			$dl_categories_column[cid] 			I 		NOTNULL AUTOINCREMENT PRIMARY,
			$dl_categories_column[pid] 			I   	NOTNULL DEFAULT 0,
			$dl_categories_column[title] 		C(100)	DEFAULT '',
			$dl_categories_column[description] 	X		NOTNULL DEFAULT ''
			";

	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dl_categories_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Categories Table', $dom));
    }
    
    
	$dl_downloads_table   =  $pntable['downloads_downloads'];
	$dl_downloads_column  = &$pntable['downloads_downloads_column'];
	
	$sql = 	"
			$dl_downloads_column[lid]           I      	NOTNULL AUTOINCREMENT PRIMARY,
			$dl_downloads_column[cid]           I      	NOTNULL DEFAULT 0,
			$dl_downloads_column[status] 	   	I2 	   	NOTNULL DEFAULT 0,
			$dl_downloads_column[update] 	    T 	   	NOTNULL DEFAULT 0,
			$dl_downloads_column[title]         C(100)	NOTNULL DEFAULT '',
			$dl_downloads_column[url]           C(254)	NOTNULL DEFAULT '',
			$dl_downloads_column[description]   X  	    NOTNULL DEFAULT '',
			$dl_downloads_column[date]          T   	NOTNULL DEFAULT 0,
			$dl_downloads_column[email]         C(100)	NOTNULL DEFAULT '',
			$dl_downloads_column[hits]         	I      	NOTNULL DEFAULT 0,
			$dl_downloads_column[submitter]     C(100)	NOTNULL DEFAULT '',
			$dl_downloads_column[filesize]      N      	NOTNULL DEFAULT 0,
			$dl_downloads_column[version]       C(20)	NOTNULL DEFAULT '',
			$dl_downloads_column[homepage]      C(200)	NOTNULL DEFAULT ''
			";
			
	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dl_downloads_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Download Table', $dom));
    }

	$dl_modrequest_table   =  $pntable['downloads_modrequest'];
	$dl_modrequest_column  = &$pntable['downloads_modrequest_column'];
	
	$sql = 	"
			$dl_modrequest_column[requestid]      	I      		NOTNULL AUTOINCREMENT PRIMARY,
			$dl_modrequest_column[lid]             	I      		NOTNULL DEFAULT 0,
			$dl_modrequest_column[title]           	C(100)		NOTNULL DEFAULT '',
			$dl_modrequest_column[description]     	X  	   		NOTNULL DEFAULT '',
			$dl_modrequest_column[modifysubmitter] 	C(60)		NOTNULL DEFAULT '',
			$dl_modrequest_column[email]           	C(100)		NOTNULL DEFAULT ''
			";
			
	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dl_modrequest_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Modrequest Table', $dom));
    }
 
    // Set Mod variables

	pnModSetVar('downloads', 'perpage', 10);
	pnModSetVar('downloads', 'newdownloads', 5);
	pnModSetVar('downloads', 'topdownloads', 5);
	pnModSetVar('downloads', 'popular', 5);
	pnModSetVar('downloads', 'ratexdlsamount', 5);
	pnModSetVar('downloads', 'topxdlsamount', 5);
	pnModSetVar('downloads', 'lastxdlsamount', 5);
	pnModSetVar('downloads', 'ratexdlsactive', 'no');
	pnModSetVar('downloads', 'topxdlsactive', 'no');
	pnModSetVar('downloads', 'lastxdlsactive', 'no');
   	pnModSetVar('downloads', 'allowupload', 'yes');
	pnModSetVar('downloads', 'securedownload', 'yes');
	pnModSetVar('downloads', 'sizelimit', 'yes');
	pnModSetVar('downloads', 'limitsize', '5-Mb');
   	pnModSetVar('downloads', 'showscreenshot', 'yes');
	pnModSetVar('downloads', 'thumbnailwidth', 100);
	pnModSetVar('downloads', 'thumbnailheight', 100);
	pnModSetVar('downloads', 'screenshotmaxsize', '2-Mb');
	pnModSetVar('downloads', 'thumbnailmaxsize', '1-Mb');
	pnModSetVar('downloads', 'limit_extension', 'yes');
	pnModSetVar('downloads', 'allowscreenshotupload', 'yes');
	pnModSetVar('downloads', 'importfrommod', 0);
	pnModSetVar('downloads', 'sessionlimit', 'no'); 
	pnModSetVar('downloads', 'sessiondownloadlimit', 8); 
	pnModSetVar('downloads', 'captchacharacters', 5); 
	pnModSetVar('downloads', 'notifymail', ' '); 
	pnModSetVar('downloads', 'inform_user', 'yes'); 
	
    // check for gd as early as possible
    if (!extension_loaded('gd'))
    {
        pnModSetVar('downloads', 'gd', 0);
        pnModSetVar('downloads', 'securedownload', "no");
    }
    else
    {
        pnModSetVar('downloads', 'gd', 1);
    }
    
    //Load API
	if (!pnModAPILoad('Downloads', 'upgrade', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}
	
    $result = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
    
    $result2 = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_22'); 
    
	return true;
}

/**
 * delete the module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function downloads_delete()
{
//XTEC ************ AFEGIT - Make this module unistallable because upload directories will be lost if user reinstalls the module
    return false;
//************ FI
    $dom = ZLanguage::getModuleDomain('Downloads');
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dict = &NewDataDictionary($dbconn);

    $taboptarray =& pnDBGetTableOptions();

    $dl_categories_table   =  $pntable['downloads_categories'];
    
    // removing the table
    $sqlarray = $dict->DropTableSQL($dl_categories_table);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to delete Categories Table', $dom));
    }
    
    $dl_downloads_table   =  $pntable['downloads_downloads'];
    
    // removing the table
    $sqlarray = $dict->DropTableSQL($dl_downloads_table);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to delete Download Table', $dom));
    }

    $dl_modrequest_table   =  $pntable['downloads_modrequest'];
    
    // removing the table
    $sqlarray = $dict->DropTableSQL($dl_modrequest_table);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to delete Modrequest Table', $dom));
    }

	//Delete Mod variables
   	pnModDelVar('downloads');
   	
   	$result = pnModAPIFunc('Downloads', 'upgrade', 'delete_hook'); 
   	
    // Deletion successful
   	 return true;
}

/**
 * interactive installation procedure
 * This function starts the interactive module installation procedure. We can have
 * as many steps here as necessary and go forwards or backwards as needed.
 *
 * This function may exist in the pninit file for a module
 *
 * @author       Frank Schummertz
 * @author       Sascha Jost
 * @return       pnRender output
 */
function downloads_init_interactiveinit()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // We start the interactive installation process now.
    // This function is called automatically if present.
    // In this case we simply show a welcome screen.

    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

    // prepare the output
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    return $pnr->fetch('init/downloads_init_interactive.htm');
}

/**
 * step 2 of the interactive installation procedure
 *
 * @author       Frank Schummertz
 * @author       Sascha Jost
 * @return       pnRender output
 */
function downloads_init_step2()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // This is part two of the interactive installation procedure. We will ask the user
    // for some basic data now. After collecting the data, we store them session vars.

    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }
    
    // submit is set if the users sends his data. We can use the same function here for
    // presenting our form and handle the users input.
    $submit = pnVarCleanFromInput('submit');
    
    if(!isset($submit))
    {
      	// get PostNuke Version string
      	$compare_string = pnConfigGetVar('Version_Num');
      	global $GLOBALS;
      	global $PNConfig;
      	
      	if(('0' == strcmp($compare_string, '0.7.6.2')) || ('0' == strcmp($compare_string, '0.7.6.3')) || ('0' == strcmp($compare_string, '0.7.6.4')))
      	{
      	  	
      	  	if(empty($GLOBALS['pnconfig']['temp']))
      	  	{
				$upload_folder 		= 'pnTemp/downloads_upload/';
	      		$cache_folder  		= 'pnTemp/downloads_cache/';
	      		$screenshot_folder 	= 'pnTemp/downloads_screenshots/';
			}
			else
			{
				$upload_folder 		= $GLOBALS['pnconfig']['temp'].'/downloads_upload/';
	      		$cache_folder  		= $GLOBALS['pnconfig']['temp'].'/downloads_cache/';
	      		$screenshot_folder 	= $GLOBALS['pnconfig']['temp'].'/downloads_screenshots/';
			}
		    
		}

      	if('0' <= strcmp($compare_string, '0.7.6.4'))
      	{
      	  	
      	  	if(empty($PNConfig['System']['temp']))
      	  	{
				$upload_folder 		= 'pnTemp/downloads_upload/';
	      		$cache_folder  		= 'pnTemp/downloads_cache/';
	      		$screenshot_folder 	= 'pnTemp/downloads_screenshots/';
			}
			else
			{
				$upload_folder 		= $PNConfig['System']['temp'].'/downloads_upload/';
	      		$cache_folder  		= $PNConfig['System']['temp'].'/downloads_cache/';
	      		$screenshot_folder 	= $PNConfig['System']['temp'].'/downloads_screenshots/';
			}
		    
		}
      	
		// if vars are empty set defaults
		if(empty($upload_folder))
		{
		  	$upload_folder 	= 'pnTemp/downloads_upload/';
		}
	
		if(empty($cache_folder))
		{
		  	$cache_folder 	= 'pnTemp/downloads_cache/';
		}
	
		if(empty($screenshot_folder))
		{
		  	$screenshot_folder 	= 'pnTemp/downloads_screenshots/';
		}

        // submit is not set, show the form now
        $pnr =& new pnRender('Downloads');
        $pnr->caching = false;
        $pnr->assign('upload_folder', $upload_folder);
        $pnr->assign('cache_folder', $cache_folder);
        $pnr->assign('screenshot_folder', $screenshot_folder);
        return $pnr->fetch('init/downloads_init_step2.htm');
    }
    else
    {
        // submit is set, read the data and store them.
        if (!pnSecConfirmAuthKey())
        {
            pnSessionSetVar('errormsg', pnVarPrepHTMLDisplay(__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom)));
            return pnRedirect(pnModURL('Modules', 'admin', 'view'));
        }
        
       $activate = (bool)pnVarCleanFromInput('activate');
		
        // We do not store the values directly in the mod vars but put them in to a session
        // var first. This will be read in the _init function. So we keep backwards compatible
        // with .750 or earlier
        $activate = (!empty($activate)) ? true : false;
    }
    // we are ready now and redirect to the function that is responsible for installing a module
    return pnRedirect(pnModURL('Downloads', 'init', 'step3', array('activate' => $activate)));
}

/**
 * step3 - the last step
 * We just say "Thank you" and continue
 *
 * @author       Frank Schummertz
 * @author       Sascha Jost
 * @return       pnRender output
 */
function downloads_init_step3()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }
    
     // submit is set, read the data now
    list($activate,$upload_folder,$cache_folder,$screenshot_folder)= pnVarCleanFromInput('activate','upload_folder','cache_folder','screenshot_folder');

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
    pnModSetVar('downloads', 'screenshotlink', $screenshot_folder);
	pnModSetVar('downloads', 'upload_folder',$upload_folder);
	pnModSetVar('downloads', 'captcha_cache', $cache_folder);

    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('activate', $activate);
    return $pnr->fetch('init/downloads_init_step3.htm');
}

/**
 * interactive delete
 * We just say "Thank you" and continue
 *
 * @author       Frank Schummertz
 * @author       Sascha Jost
 * @return       pnRender output
 */
function downloads_init_interactivedelete()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    return $pnr->fetch('init/downloads_init_delete.htm');
}

/**
 * interactive upgrade
 * We inform the user that we are going to upgrade now
 *
 * @author       Frank Schummertz
 * @author       Sascha Jost
 * @params       $args[oldversion] the old version of the module before upgrading
 * @return       pnRender output
 */
function downloads_init_interactiveupgrade($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($args);
    unset($args);

    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

    global $modversion;
    
    include_once('modules/Downloads/pnversion.php');
    
	$authid = pnSecGenAuthKey('Modules');
	
    switch($oldversion)
    {
        case'1.31':
        $templatefile = 'init/downloads_init_upgrade_all.htm';
        break;
        
        case'2.0':
        $templatefile = 'init/downloads_init_upgrade_20_to_23.htm';
        break;
        
        case'2.1':
        $templatefile = 'init/downloads_init_upgrade_21_to_23.htm';
        break;
        
        case'2.2':
        $templatefile = 'init/downloads_init_upgrade_22_to_23.htm';
        break;
        
        case'2.3':
	case'2.3.1':
        $templatefile = 'init/downloads_init_upgrade_23_to_24.htm';
        break;
        
        default:
        pnRedirect(pnModURL('Modules', 'admin', 'upgrade', array('authid' => $authid )));
        return true;
    }
    
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->add_core_data();
    $pnr->assign('authid', $authid);
    $pnr->assign('newversion', $modversion['version'] );
    $pnr->assign('oldversion', $oldversion);
    
    return $pnr->fetch($templatefile);
}

/**
 * the upgrade procedure to 2.0
 * 
 * @author       Sascha Jost
 * @params       $args[oldversion] the old version of the module before upgrading
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_2_0($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');   
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }
    
    extract($args);
    unset($args);
    
    list($submit,$oldversion) = pnVarCleanFromInput('submit','oldversion');
    
    if(!empty($submit))
    {
      	//Load API
	    if (!pnModAPILoad('Downloads', 'upgrade', true))
	    {
			pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
			pnRedirect(pnModURL('Downloads', 'user', 'main'));
		}
		
        // do upgrade
        $result = pnModAPIFunc('Downloads', 'upgrade', 'dl_start_upgrade');

        if(false === $result)
        {
            return errorpage( __FILE__, __LINE__,__('The Database upgrade failed for an unknown reason. Please restore your database backup now, because the tables for the Downloads module are probably damaged.', $dom) );
        }

        return pnRedirect(pnModURL('downloads', 'init', 'interactiveupgrade_step2',array('oldversion' => '1.31' )));
    }

	pnRedirect(pnModURL('Modules', 'admin', 'view'));
	
    return true;
}

/**
 * the upgrade procedure to 2.0 step 2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_step2()
{
    $dom = ZLanguage::getModuleDomain('Downloads');   
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('oldversion', $oldversion);

    return $pnr->fetch('init/downloads_init_upgrade_step2.htm');

    return true;
}

/**
 * the upgrade procedure 2.0 to 2.3 step 2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_to_2_3()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

	//Load API
	if (!pnModAPILoad('Downloads', 'upgrade', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}
		
	// do upgrade
    $result = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_21'); 
    
    // do upgrade
    $result = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_22'); 
    
    // hook up
    $result = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
    
    if(false === $result)
    {
        return errorpage( __FILE__, __LINE__,__('The Database upgrade failed for an unknown reason. Please restore your database backup now, because the tables for the Downloads module are probably damaged.', $dom) );
    }
	
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('oldversion', $oldversion);

    return $pnr->fetch('init/downloads_init_upgrade_step2.htm');

    return true;
}

/**
 * the upgrade procedure 2.1 to 2.2 step 2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_2_2()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

	//Load API
	if (!pnModAPILoad('Downloads', 'upgrade', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}

	// do upgrade
    $result = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_22'); 
   
    if(false === $result)
    {
        return errorpage( __FILE__, __LINE__,__('The Database upgrade failed for an unknown reason. Please restore your database backup now, because the tables for the Downloads module are probably damaged.', $dom) );
    }
    
    $result = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
    
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('oldversion', $oldversion);

    return $pnr->fetch('init/downloads_init_upgrade_step2.htm');

    return true;
}

/**
 * the upgrade procedure 2.2 to 2.3 step 2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_2_3()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

	//Load API
	if (!pnModAPILoad('Downloads', 'upgrade', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}

	// do upgrade
    $result = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_23'); 
   
    if(false === $result)
    {
        return errorpage( __FILE__, __LINE__,__('The Database upgrade failed for an unknown reason. Please restore your database backup now, because the tables for the Downloads module are probably damaged.', $dom) );
    }
    
    $result = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
    
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('oldversion', $oldversion);

    return $pnr->fetch('init/downloads_init_upgrade_step2.htm');

    return true;
}

/**
 * the upgrade procedure 2.3 to 2.4 step 2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function downloads_init_interactiveupgrade_2_4()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Check permissions
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
    {
        return pnVarPrepHTMLDisplay(__('Sorry! No authorization to access this module.', $dom));
    }

	//Load API
	if (!pnModAPILoad('Downloads', 'upgrade', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}
  
    $pnr =& new pnRender('Downloads');
    $pnr->caching = false;
    $pnr->assign('authid', pnSecGenAuthKey('Modules'));
    $pnr->assign('oldversion', $oldversion);

    return $pnr->fetch('init/downloads_init_upgrade_step2.htm');

    return true;
}
?>
