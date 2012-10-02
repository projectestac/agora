<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  upgrade procedures for Downloads, CmodsDownload, UpDownload
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
include_once('modules/Downloads/pnclasses/ImageResizeClass.php');

//*********************************************
// Upgrade  Downloads 1.3.x
//*********************************************

/**
 * the upgrade procedure to 2.2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_start_upgrade()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
  	
  	//ensure that each step was executed successfully
  	$db_change = pnModAPIFunc('Downloads', 'upgrade', 'dl_db_change');
  	
  	if(true === $db_change)
  	{
		$dl_db_change = pnModAPIFunc('Downloads', 'upgrade', 'dl_change_download_db'); 
	}
 
  	if(true === $dl_db_change)
  	{
		$mr_db_change = pnModAPIFunc('Downloads', 'upgrade', 'dl_change_modrequest_db');
	}
	
	if(true === $mr_db_change)
  	{
		$delete_old_tables = pnModAPIFunc('Downloads', 'upgrade', 'dl_delete_deprecated_tables');
	}

	if(true === $delete_old_tables)
  	{
		$set_modvars = pnModAPIFunc('Downloads', 'upgrade', 'dl_set_mod_vars');
	}
	
	if(true === $set_modvars)
  	{
		$to_21 = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_21');
	}
	
	if(true === $to_21)
  	{
		$to_22 = pnModAPIFunc('Downloads', 'upgrade', 'dl_update_db_to_22');
	}
	
	if(true === $to_22)
  	{
		$hookup = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
	}
	
    return true;
}

/**
 * import categories
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_db_change()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    // change the category table to new db format
    // add pid to handle category relationship
    $dl_categories_table  = $pntable['downloads_categories'];
    $dl_categories_column = &$pntable['downloads_categories_column'];

    $sql = "ALTER TABLE $dl_categories_table
            ADD pn_pid INT(11) DEFAULT '0' NOT NULL  AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

  	// start converting subcategories

    $dl_subcategories_table  =  $pntable['downloads_subcategories'];
	$dl_subcategories_column = &$pntable['downloads_subcategories_column'];

	$sql = "SELECT
                    $dl_subcategories_column[cid],
                    $dl_subcategories_column[sid],
                    $dl_subcategories_column[title]
            FROM    $dl_subcategories_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );

	}
	
	// push the id in an area which is hopefully free
	$newcid = 5000;
	
    for (;!$result->EOF; $result->MoveNext())
    {
        list($cid, $sid, $title) = $result->fields;
        
        $dl_categories_table  = $pntable['downloads_categories'];
        $dl_categories_column = &$pntable['downloads_categories_column'];

		$newcid = ++$newcid;
		
		$dl_id_change = pnModAPIFunc('Downloads', 'upgrade', 'dl_change_download_id',array('sid' => $sid,'newcid' => $newcid));
		
        $sql = "INSERT
    			INTO $dl_categories_table
    			    (
    				 $dl_categories_column[cid],
    				 $dl_categories_column[pid],
    				 $dl_categories_column[description],
    				 $dl_categories_column[title]
				    )
    			VALUES
    				('".(int)pnVarPrepForStore($newcid)."',
    				 '".(int)pnVarPrepForStore($cid)."',
    				 '',
    				 '".pnVarPrepForStore($title)."')";


        $catresult =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
            return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
        }

        $catresult->Close();
            
    }

    $result->Close();

    // no db error occured
    // database actions successfully completed
    return true;
}

/**
 * change the sid of all downloads in a specific sid
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_change_download_id($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);

   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// we change the sid of all downloads to the next insertable id of categories table
	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	    
	$sql = "UPDATE  $dl_downloads_table
            SET     $dl_downloads_column[cid]='" . (int)pnVarPrepForStore($newcid) . "'
            WHERE   pn_sid ='" . (int)pnVarPrepForStore($sid)."'";
            
	$result = $dbconn->execute($sql);
	   
	$result->Close();
	
    // return
    return true;
}

/**
 * copy name to submitter
 *
 * related to #5171
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_copy_name_to_submitter($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);

   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
					$dl_downloads_column[lid],
                    $dl_downloads_column[name]
            FROM    $dl_downloads_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	}

    for (;!$result->EOF; $result->MoveNext())
    {
        list($lid,$name) = $result->fields;
		    
		$sql = "UPDATE  $dl_downloads_table
	            SET     $dl_downloads_column[submitter]='" . $name . "'
	            WHERE   pn_lid ='" . (int)pnVarPrepForStore($lid)."'";
	            
		$result2 = $dbconn->execute($sql);
		   
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
		}
		
		$result2->Close();
	}
	
	
    // return
    return true;
}

/**
 * change downloads table format for proper import
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_change_download_db()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// change the downloads table to new db format
    
    $dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];
    
    // add status to handle submitted downloads
    $sql = "ALTER TABLE $dl_downloads_table
            ADD pn_status SMALLINT DEFAULT 1 NOT NULL AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add update to handle updated downloads
/*    $sql = "ALTER TABLE $dl_downloads_table
              ADD pn_update SMALLINT DEFAULT '0' NOT NULL AFTER pn_status";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
*/
	// change default value for proper work  after import
    $sql = "ALTER TABLE $dl_downloads_table CHANGE pn_status pn_status SMALLINT NOT NULL DEFAULT '1'";
	
	$dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // change date column
    $sql = "ALTER TABLE $dl_downloads_table ADD pn_update DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00' AFTER pn_status";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	// change date column
    $sql = "ALTER TABLE $dl_downloads_table CHANGE pn_date pn_date DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00'";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

   // delete deprecated field sid
    $sql = "ALTER TABLE $dl_downloads_table DROP pn_sid";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// delete deprecated field ratingsummary
    $sql = "ALTER TABLE $dl_downloads_table DROP pn_ratingsummary";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $name_to_submitter = pnModAPIFunc('Downloads', 'upgrade', 'dl_copy_name_to_submitter');
    
    if(true === $name_to_submitter)
  	{
		// delete deprecated field name
	    $sql = "ALTER TABLE $dl_downloads_table DROP pn_name";
	
	    $dbconn->Execute($sql);
	    
	    if ($dbconn->ErrorNo() != 0)
	    {
	        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	    }
	}

    // delete deprecated field totalvotes
    $sql = "ALTER TABLE $dl_downloads_table DROP pn_totalvotes";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // delete deprecated field totalcomments
    $sql = "ALTER TABLE $dl_downloads_table DROP pn_totalcomments";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
    // return
    return true;
}

/**
 * delete all deprecated tables
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_delete_deprecated_tables()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// delete deperecated subcategories table
    $dl_subcategories_table  =  $pntable['downloads_subcategories'];
    
    $sql = "DROP TABLE IF EXISTS $dl_subcategories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// delete deperecated editorials table
    $dl_editorial_table  =  $pntable['downloads_editorials'];
    
    $sql = "DROP TABLE IF EXISTS $dl_editorial_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	// delete deprecated table newdownload
    $dl_newdownload_table  = $pntable['downloads_newdownload'];
    
    $sql = "DROP TABLE IF EXISTS $dl_newdownload_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // delete deprecated table votedata
    $dl_votedata_table  = $pntable['downloads_votedata'];
    
    $sql = "DROP TABLE IF EXISTS $dl_votedata_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    // return
    return true;
}

/**
 * change the modrequest table for new format
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_change_modrequest_db($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
  	// change the modrequest table to new db format
    // delete deprecated field sid
    $dl_modrequest_table  = $pntable['downloads_modrequest'];
    $dl_modrequest_column = &$pntable['downloads_modrequest_column'];

	$sql = "ALTER TABLE $dl_modrequest_table DROP pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_sid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_name";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_filesize";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	$sql = "ALTER TABLE $dl_modrequest_table DROP pn_homepage";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_brokendownload";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dl_modrequest_table DROP pn_version";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    // return
    return true;
}

/**
 * set the module variables
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_set_mod_vars()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
	// Set new defaults for the modvars

	pnModSetVar('downloads', 'perpage', 10);
	pnModSetVar('downloads', 'popular', 5);
	pnModSetVar('downloads', 'newdownloads', 5);
	pnModSetVar('downloads', 'downloadsresults', 5);
	pnModSetVar('downloads', 'topdownloads', 5);
	pnModSetVar('downloads', 'ratexdlsamount', 5);
	pnModSetVar('downloads', 'topxdlsamount', 5);
	pnModSetVar('downloads', 'lastxdlsamount', 5);
	pnModSetVar('downloads', 'ratexdlsactive', 'no');
	pnModSetVar('downloads', 'topxdlsactive', 'no');
	pnModSetVar('downloads', 'lastxdlsactive', 'no');
   	pnModSetVar('downloads', 'allowupload', 'no');
	pnModSetVar('downloads', 'securedownload', 'no');
	pnModSetVar('downloads', 'sizelimit', 'yes');
   	pnModSetVar('downloads', 'showscreenshot', 'yes');
	pnModSetVar('downloads', 'thumbnailwidth', 100);
	pnModSetVar('downloads', 'thumbnailheight', 100);
	pnModSetVar('downloads', 'limit_extension', 'yes');
	pnModSetVar('downloads', 'allowscreenshotupload', 'yes');
	pnModSetVar('downloads', 'importfrommod', 0);
    pnModSetVar('downloads', 'frontpagesubcats', 'no');
	pnModSetVar('downloads', 'frontpagecatlimit', 0); 
	pnModSetVar('downloads', 'sessionlimit', 'no'); 
	pnModSetVar('downloads', 'sessiondownloadlimit', 8); 
	pnModSetVar('downloads', 'captchacharacters', 5); 
	pnModSetVar('downloads', 'allowed_extensions', 'txt,zip,rar,tar.gz,tar,doc,ppt,pdf,wav,mp3,rtf');
    pnModSetVar('downloads', 'standard_sortby', 'title'); 
	pnModSetVar('downloads', 'collateral_clause', 'ASC'); 
	pnModSetVar('downloads', 'frontendstyle', 0);
	pnModSetVar('downloads', 'fulltext', 0);
	pnModSetVar('downloads', 'limitsize', '5-Mb');
	pnModSetVar('downloads', 'screenshotmaxsize', '2-Mb');
	pnModSetVar('downloads', 'thumbnailmaxsize', '1-Mb');
	pnModSetVar('downloads', 'notifymail', '  ');
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
	
	//delete  unused modvars
   	pnModDelVar('downloads', 'linkvotemin');
    pnModDelVar('downloads', 'anonwaitdays');
	pnModDelVar('downloads', 'outsidewaitdays');
	pnModDelVar('downloads', 'useoutsidevoting');
	pnModDelVar('downloads', 'anonweight');
	pnModDelVar('downloads', 'outsideweight');
	pnModDelVar('downloads', 'detailvotedecimal');
	pnModDelVar('downloads', 'mainvotedecimal');
	pnModDelVar('downloads', 'topdownloadspercentrigger');
	pnModDelVar('downloads', 'mostpopdownloadspercentrigger');
	pnModDelVar('downloads', 'mostpopdownloads');
	pnModDelVar('downloads', 'anonadddownloadlock');
    pnModDelVar('downloads', 'blockunregmodify');
    pnModDelVar('downloads', 'non_allowed_extensions');
    pnModDelVar('downloads', 'popupwidth');
	pnModDelVar('downloads', 'popupheight');
	pnModDelVar('downloads', 'downloadvotemin');
       	
    return true;

}

/**
 * update the urls
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_update_db_to_21()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    //Load API
	if (!pnModAPILoad('Downloads', 'user', true))
	{
		pnSessionSetVar('errormsg', __('Error! Could not load module.', $dom));
		pnRedirect(pnModURL('Downloads', 'user', 'main'));
	}
	
    // get the neccessary mod vars
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
    
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	   
	$sql = "SELECT
                    $dl_downloads_column[lid],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";
    
	$result = $dbconn->execute($sql);
	    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$url) = $result->fields;
      	
      	if((false == eregi(pnGetBaseURL(),$url)) && (false == eregi("HTTP",$url)))
	    {
	      	// get the file extension
    		$file_extension = pnModAPIFunc('Downloads', 'upgrade', 'get_file_extension', 
									array('filename' 	=> $url,
										  'upload' 		=> true));

			if (!rename($url, pnVarPrepForOS($dl_dl_link.$lid.$file_extension))) 
			{
	    		$fp = @fopen($dl_dl_link.'upgrade_log.txt', "a");
				fwrite($fp, "failed to rename $url...\n");
				fclose($fp);
			}
			else
			{
				$newurl = $lid.$file_extension;
				
				$sql = "UPDATE  $dl_downloads_table
		            SET     $dl_downloads_column[url]='" . pnVarPrepForStore($newurl) . "'
		            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'";
		    
				$result2 = $dbconn->execute($sql);
		    
				$result2->Close();
			}

		}
	}
	
	$result->Close();
    // return
    
    // set modvars
    pnModSetVar('downloads', 'frontpagesubcats', "no");
	pnModSetVar('downloads', 'frontpagecatlimit', 0); 
	pnModSetVar('downloads', 'sessionlimit', "no"); 
	pnModSetVar('downloads', 'sessiondownloadlimit', 8); 
	pnModSetVar('downloads', 'captchacharacters', 5); 
	
    return true;
}

/**
 * update db to v 2.2
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_update_db_to_22()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
  	
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// change the downloads table for new hook functions
    
    $dl_downloads_table  = $pntable['downloads_downloads'];
    $dl_downloads_column = &$pntable['downloads_downloads_column'];
    
    // add modid to handle hook actions
    $sql = "ALTER TABLE $dl_downloads_table
            ADD pn_modid INT DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add objectid to handle hook actions
    $sql = "ALTER TABLE $dl_downloads_table
              ADD pn_objectid VARCHAR(5)  DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // add fulltext index
    $sql = "ALTER TABLE $dl_downloads_table
              ADD FULLTEXT (pn_title, pn_description) ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
        
    // change update column
    $sql = "ALTER TABLE $dl_downloads_table CHANGE pn_filesize pn_filesize DOUBLE NOT NULL";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // add filename to retain orginal filename
    $sql = "ALTER TABLE $dl_downloads_table
            ADD pn_filename TEXT NOT NULL AFTER pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    pnModSetVar('downloads', 'allowed_extensions', 'txt,zip,rar,tar.gz,tar,doc,ppt,pdf,wav,mp3,rtf');
    pnModSetVar('downloads', 'standard_sortby', 'title'); 
	pnModSetVar('downloads', 'collateral_clause', 'ASC'); 
	pnModSetVar('downloads', 'frontendstyle', 0);
	pnModSetVar('downloads', 'fulltext', 0); 
	pnModSetVar('downloads', 'limitsize', '5-Mb');
	pnModSetVar('downloads', 'screenshotmaxsize', '2-Mb');
	pnModSetVar('downloads', 'thumbnailmaxsize', '1-Mb');
	pnModSetVar('downloads', 'notifymail', '  ');
	pnModSetVar('downloads', 'inform_user', 'yes'); 
	pnModSetVar('downloads', 'ratexdlsactive', 'no');
	pnModSetVar('downloads', 'topxdlsactive', 'no');
	pnModSetVar('downloads', 'lastxdlsactive', 'no');
    
    // delete unused modvars
    pnModDelVar('downloads', 'non_allowed_extensions');
    pnModDelVar('downloads', 'popupwidth');
	pnModDelVar('downloads', 'popupheight');
	pnModDelVar('downloads', 'downloadvotemin');
	pnModDelVar('downloads', 'downloadsresults');
    	
    // resize the thumbnails
    pnModAPIFunc('Downloads', 'upgrade', 'resize_thumbnails_22');
    
    //update the filename
    pnModAPIFunc('Downloads', 'upgrade', 'dl_update_filename_22');

	$upload_folder 		= pnModGetVar('downloads', 'upload_folder');
	$cache_folder  		= pnModGetVar('downloads', 'captcha_cache');
	$screenshot_folder 	= pnModGetVar('downloads', 'screenshotlink');
	
    // if vars are empty set defaults
	if( empty($upload_folder) || empty($cache_folder) ||empty($screenshot_folder))
	{
	    pnModAPIFunc('Downloads', 'upgrade', 'dl_get_path_22');
	}

    // return
    return true;
}

/**
 * update db to v 2.3
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_update_db_to_23()
{  
  	$dom = ZLanguage::getModuleDomain('Downloads');	  
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
  	
  	//update the filename
    pnModAPIFunc('Downloads', 'upgrade', 'dl_update_filename_22');
  	
  	//set modvar for torrent support
  	pnModSetVar('downloads', 'torrent','no');
  	
  	pnModDelVar('downloads', 'frontpagesubcats');
  	pnModDelVar('downloads', 'frontpagecatlimit');
}
/**
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_dl_update_filename_22()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT  $dl_downloads_column[lid],
                    $dl_downloads_column[title],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";

	$result = $dbconn->execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$title,$url) = $result->fields;

		// get the file extension
    	$file_extension = pnModAPIFunc('Downloads', 'upgrade', 'get_file_extension', 
								 array('filename' 	=> $url,
									   'upload' 	=> true));
		$title = trim($title);
		$title = $title.$file_extension;

		$sql = "UPDATE  $dl_downloads_table
	            SET     $dl_downloads_column[filename]='" . pnVarPrepForStore($title) . "'
	            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'
				AND     $dl_downloads_column[filename]=''";
		
		$result2 = $dbconn->execute($sql);

		if ($dbconn->ErrorNo() != 0)
    	{
       		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    	}
    
		$result2->Close();
	}

	$result->Close();
    // return
    return true;
}

/**
 *
 * get path
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 */
function Downloads_upgradeapi_dl_get_path_22()
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
	
	pnModSetVar('downloads', 'screenshotlink', $screenshot_folder);
	pnModSetVar('downloads', 'upload_folder',$upload_folder);
	pnModSetVar('downloads', 'captcha_cache', $cache_folder);
	
	return true;
}

//*********************************************
// Upgrade Code CmodsDownload
//*********************************************

/**
 * the upgrade procedure to 2.x
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_start_upgrade()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
  	
  	//ensure that each step was executed successfully
  	
  	$create_dumy = pnModAPIFunc('Downloads', 'upgrade', 'cdl_create_dummy');
  	
  	if(true === $create_dumy)
  	{
		$db_change = pnModAPIFunc('Downloads', 'upgrade', 'cdl_db_change');
	}
  	
  	if(true === $db_change)
  	{
		$dl_db_change = pnModAPIFunc('Downloads', 'upgrade', 'cdl_change_download_db'); 
	}
 
  	if(true === $dl_db_change)
  	{
		$mr_db_change = pnModAPIFunc('Downloads', 'upgrade', 'cdl_change_modrequest_db');
	}
	
	if(true === $mr_db_change)
  	{
		$copy_tables = pnModAPIFunc('Downloads', 'upgrade', 'cdl_copy_tables');
	}
	
	if(true === $copy_tables)
  	{
		$move_files = pnModAPIFunc('Downloads', 'upgrade', 'cdl_move_files');
	}
	
	if(true === $move_files)
  	{
		$update_urls = pnModAPIFunc('Downloads', 'upgrade', 'cdl_update_urls');
	}
	
	if(true === $update_urls)
  	{
		$add_filename = pnModAPIFunc('Downloads', 'upgrade', 'cdl_update_filename');
	}
	
	if(true === $add_filename)
  	{
		$move_pictures = pnModAPIFunc('Downloads', 'upgrade', 'cdl_move_pictures');
	}
	
	if(true === $move_pictures)
  	{
		$hookup = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
	}
	
	if(true === $hookup)
  	{
		$mod_vars = pnModAPIFunc('Downloads', 'upgrade', 'dl_set_mod_vars'); 
	}
    
    return true;
}

/**
 * create dummy
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_create_dummy()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	$drop = pnModAPIFunc('Downloads', 'upgrade', 'drop_dummies'); 
  	
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dict = &NewDataDictionary($dbconn);

    $taboptarray =& pnDBGetTableOptions();

	$dm_categories_table   = $pntable['dummy_categories'];
	$dm_categories_column  = &$pntable['dummy_categories_column'];

	$sql = 	"
			$dm_categories_column[cid] 			I 		NOTNULL AUTOINCREMENT PRIMARY,
			$dm_categories_column[title] 		C(100)	DEFAULT '',
			$dm_categories_column[description] 	C(254)	NOTNULL DEFAULT ''
			";

	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_categories_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Categories Table', $dom));
    }
    
    
	$dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
	
	$sql = 	"
			$dm_downloads_column[lid]           I      	NOTNULL AUTOINCREMENT PRIMARY,
			$dm_downloads_column[cid]           I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[sid]           I       NOT NULL default 0,
			$dm_downloads_column[title]         C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[url]           C(254)	NOTNULL DEFAULT '',
			$dm_downloads_column[description]   X  	    NOTNULL DEFAULT '',
			$dm_downloads_column[date]          T   	NOTNULL DEFAULT 0,
			$dm_downloads_column[name]          C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[email]         C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[hits]         	I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[submitter]     C(60)	NOTNULL DEFAULT '',
			$dm_downloads_column[downloadratingsummary] F(6.4)  NOTNULL DEFAULT 0,
			$dm_downloads_column[totalvotes]    I       NOT NULL default 0,
			$dm_downloads_column[totalcomments] I       NOT NULL default 0,
			$dm_downloads_column[filesize]      I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[version]       C(10)	NOTNULL DEFAULT '',
			$dm_downloads_column[homepage]      C(200)	NOTNULL DEFAULT ''
			";
			
	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_downloads_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Download Table', $dom));
    }

	$dm_subcategories_table   =  $pntable['dummy_subcategories'];
	$dm_subcategories_column  = &$pntable['dummy_subcategories_column'];
	$sql = "
			$dm_subcategories_column[sid]   I      	NOTNULL AUTOINCREMENT PRIMARY,
			$dm_subcategories_column[cid]   I      	NOTNULL DEFAULT 0,
			$dm_subcategories_column[title] C(50)	NOTNULL DEFAULT ''
		";


	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_subcategories_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Download Table', $dom));
    }


	$dm_modrequest_table   =  $pntable['dummy_modrequest'];
	$dm_modrequest_column  = &$pntable['dummy_modrequest_column'];
	
	$sql = 	"
			$dm_modrequest_column[requestid]      	I      		NOTNULL AUTOINCREMENT PRIMARY,
			$dm_modrequest_column[lid]             	I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[cid]              I       	NOTNULL DEFAULT 0,
			$dm_modrequest_column[sid]              I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[title]           	C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[url]             	C(254) 		NOTNULL DEFAULT '',
			$dm_modrequest_column[description]     	X  	   		NOTNULL DEFAULT '',
			$dm_modrequest_column[modifysubmitter] C(60)		NOTNULL DEFAULT '',
			$dm_modrequest_column[brokendownload]  I2           NOTNULL DEFAULT 0,
			$dm_modrequest_column[name]            C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[email]           C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[filesize]        I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[version]         C(10)		NOTNULL DEFAULT '',
			$dm_modrequest_column[homepage]        C(200)		NOTNULL DEFAULT ''
			";
	
	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_modrequest_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Modrequest Table', $dom));
    }
    
	pnModDBInfoLoad('CmodsDownload');

	// copy tables
    $cdl_tables = array('cmodsdownload_categories',
                    	'cmodsdownload_downloads',
                    	'cmodsdownload_subcategories',
                        'cmodsdownload_modrequest');
                        
    $dm_tables = array('dummy_categories',
                        'dummy_downloads',
                        'dummy_subcategories',
                        'dummy_modrequest');

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
    for($cnt=0; $cnt < count($dm_tables); $cnt++) 
	{
		$sql = "INSERT INTO ".$pntable[$dm_tables[$cnt]]." SELECT * FROM ".$pntable[$cdl_tables[$cnt]]."";
		
        $dbconn->Execute($sql);
        
        	if ($dbconn->ErrorNo() != 0) 
			{
            	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
            } 
    }
    
    // no db error occured
    // database actions successfully completed
    return true;
    
}

/**
 * import categories
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_db_change()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    // change the category table to new db format
    // add pid to handle category relationship
    $dm_categories_table   = $pntable['dummy_categories'];
	$dm_categories_column  = &$pntable['dummy_categories_column'];

    $sql = "ALTER TABLE $dm_categories_table
            ADD pn_pid INT(11) DEFAULT '0' NOT NULL  AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

  	// start converting subcategories

    $dm_subcategories_table   =  $pntable['dummy_subcategories'];
	$dm_subcategories_column  = &$pntable['dummy_subcategories_column'];

	$sql = "SELECT
                    $dm_subcategories_column[cid],
                    $dm_subcategories_column[sid],
                    $dm_subcategories_column[title]
            FROM    $dm_subcategories_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );

	}
	
	// push the id in an area which is hopefully free
	//$newcid = 5000;
	
	// get max cid 
	$sql = "SELECT max($dm_categories_column[cid]) FROM $dm_categories_table";
    $cidresult =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
    	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

 	list($newcid) = $cidresult->fields;

   	$cidresult->Close();
   	
    for (;!$result->EOF; $result->MoveNext())
    {
        list($cid, $sid, $title) = $result->fields;
        
        $dm_categories_table   = $pntable['dummy_categories'];
		$dm_categories_column  = &$pntable['dummy_categories_column'];

		$newcid = ++$newcid;
		
		$dl_id_change = pnModAPIFunc('Downloads', 'upgrade', 'cdl_change_download_id',array('sid' => $sid,'newcid' => $newcid));
		
        $sql = "INSERT INTO $dm_categories_table
    				(	
    				 $dm_categories_column[cid],
    				 $dm_categories_column[pid],
    				 $dm_categories_column[title]
					)
    			VALUES
    				('".(int)pnVarPrepForStore($newcid)."',
    				 '".(int)pnVarPrepForStore($cid)."',
    				 '".pnVarPrepForStore($title)."')";

        $catresult =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
            return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
        }

        $catresult->Close();
            
    }

    $result->Close();

    // no db error occured
    // database actions successfully completed
    return true;
}

/**
 * change the sid of all downloads in a specific sid
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_change_download_id($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// we change the sid of all downloads to the next insertable id of categories table
	$dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
	    
	$sql = "UPDATE  $dm_downloads_table
            SET     $dm_downloads_column[cid]='" . (int)pnVarPrepForStore($newcid) . "'
            WHERE   pn_sid ='" . (int)pnVarPrepForStore($sid)."'";
	    
	$result = $dbconn->execute($sql);
	    
	$result->Close();
	
    // return
    return true;
}

/**
 * copy name to submitter
 *
 * related to #5171
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_copy_name_to_submitter($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);

   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dm_downloads_table  = $pntable['dummy_downloads'];
	$dm_downloads_column = &$pntable['dummy_downloads_column'];

	$sql = "SELECT
					$dm_downloads_column[lid],
                    $dm_downloads_column[name]
            FROM    $dm_downloads_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	}

    for (;!$result->EOF; $result->MoveNext())
    {
        list($lid,$name) = $result->fields;
  
		$sql = "UPDATE  $dm_downloads_table
	            SET     $dm_downloads_column[submitter]='" . pnVarPrepForStore($name) . "'
	            WHERE   pn_lid ='" . (int)pnVarPrepForStore($lid)."'";
	            
		$result2 = $dbconn->execute($sql);
		   
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
		}
		
		$result2->Close();
	}

    // return
    return true;
}

/**
 * change downloads table format for proper import
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_change_download_db()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// change the downloads table to new db format
    
    $dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
    
    // add status to handle submitted downloads
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_status SMALLINT DEFAULT 1 NOT NULL AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add update to handle updated downloads
    $sql = "ALTER TABLE $dm_downloads_table
              ADD pn_update SMALLINT DEFAULT '0' NOT NULL AFTER pn_status";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add modid to handle hook actions
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_modid INT DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add objectid to handle hook actions
    $sql = "ALTER TABLE $dm_downloads_table
              ADD pn_objectid VARCHAR(5)  DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	// change default value for proper work  after import
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_status pn_status SMALLINT NOT NULL DEFAULT '1'";
	
	$dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // change update column
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_update pn_update DATETIME NOT NULL DEFAULT 0";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	// change date column
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_date pn_date DATETIME NOT NULL DEFAULT 0";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

   // delete deprecated field sid
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_sid";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// delete deprecated field ratingsummary
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_ratingsummary";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $name_to_submitter = pnModAPIFunc('Downloads', 'upgrade', 'cdl_copy_name_to_submitter');
    
    if(true === $name_to_submitter)
  	{
		// delete deprecated field name
	    $sql = "ALTER TABLE $dm_downloads_table DROP pn_name";
	
	    $dbconn->Execute($sql);
	    
	    if ($dbconn->ErrorNo() != 0)
	    {
	        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	    }
	}
    
    // delete deprecated field totalvotes
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_totalvotes";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // delete deprecated field totalcomments
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_totalcomments";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	// add filenmae to retain orginal filename
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_filename TEXT DEFAULT '' NOT NULL AFTER pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // return
    return true;
}

/**
 * change the modrequest table for new format
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_change_modrequest_db($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
  	// change the modrequest table to new db format
    // delete deprecated field sid
    $dm_modrequest_table   =  $pntable['dummy_modrequest'];
	$dm_modrequest_column  = &$pntable['dummy_modrequest_column'];

	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_sid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_name";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_filesize";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_homepage";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_brokendownload";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_version";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    // return
    return true;
}

/**
 * copy the tables
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_copy_tables()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	// copy tables
    $dm_tables = array('dummy_categories',
                    	'dummy_downloads',
                        'dummy_modrequest');
                        
    $dl_tables = array('downloads_categories',
                        'downloads_downloads',
                        'downloads_modrequest');

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
    for($cnt=0; $cnt < count($dl_tables); $cnt++) 
	{
		$sql = "INSERT INTO ".$pntable[$dl_tables[$cnt]]." SELECT * FROM ".$pntable[$dm_tables[$cnt]]."";
		
        $dbconn->Execute($sql);
        
        	if ($dbconn->ErrorNo() != 0) 
			{
            	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
            } 
    }
	
	// delete the dummies
	$dm_categories_table  =  $pntable['dummy_categories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_categories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	$dm_subcategories_table  =  $pntable['dummy_subcategories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_subcategories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $dm_downloads_table  =  $pntable['dummy_downloads'];
    
    $sql = "DROP TABLE IF EXISTS $dm_downloads_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
    $dm_modrequest_table  = $pntable['dummy_modrequest'];
    
    $sql = "DROP TABLE IF EXISTS $dm_modrequest_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    // return
    return true;
}

/**
 * move exsisting files
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_move_files()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $cdl_dl_link = pnModGetVar('cmodsdownload', 'upload_folder');
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
  	
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
	// move all downloads to the new destination
	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	   
	$sql = "SELECT
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";
    
	$result = $dbconn->execute($sql);
	    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list($url) = $result->fields;
	
		$is_baseurl = strpos($url,pnGetBaseURL());
      	
      	$is_uploadfolder = strpos($url,$cdl_dl_link);

      	// if we can't 'find the baseurl and the upload folder in the link
      	// than it is a uploaded file and we copy it over to the new upload folder
      	// otherwise it is a link to another webspace and we leave it untouched
      	if((false === $is_baseurl) || (false === $is_uploadfolder))
      	{
		    //nothing to do      	
		}
		else
	    {
	    
			$new_url = str_replace(pnGetBaseURL(),'',$url);
	      	$new_url = str_replace($cdl_dl_link,'',$new_url);
	      	$new_url = strrchr($new_url, '/');
			$new_url = str_replace('/','',$new_url);
	      	$new_url = pnVarPrepForOS($dl_dl_link.$new_url);
	      	
	      	if (!copy($url,$new_url)) 
			{
	    		
	    		$fp = @fopen($dl_dl_link.'upgrade_log.txt', "a");
				fwrite($fp, "failed to copy $url...\n");
				fclose($fp);
			}
		}			
	}
	$result->Close();
	
    // return
    return true;
}

/**
 * update the urls
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_update_urls()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $cdl_dl_link = pnModGetVar('cmodsdownload', 'upload_folder');
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
    
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// we change the sid of all downloads to the next insertable id of categories table
	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	   
	$sql = "SELECT
                    $dl_downloads_column[lid],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";
    
	$result = $dbconn->execute($sql);
	    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$url) = $result->fields;
      	
      	$is_baseurl = strpos($url,pnGetBaseURL());
      	
      	$is_uploadfolder = strpos($url,$cdl_dl_link);

      	// if we find the baseurl and the upload folder in the link
      	// than it is a local file and we rename it and update the db
      	// otherwise it is a link to another webspace and we leave it untouched
      	if((false === $is_baseurl) || (false === $is_uploadfolder))
      	{
		    //nothing to 
		}
		else
	    {
	      	$url = str_replace(pnGetBaseURL(),'',$url);
	      	$url = str_replace($cdl_dl_link,'',$url);
	      	$url = strrchr($url, '/');
			$url = str_replace('/','',$url);
			
			// get the file extension
    		$file_extension = pnModAPIFunc('Downloads', 'upgrade', 'get_file_extension', 
									array('filename' 	=> $url,
										  'upload' 		=> true));
			
	      	$url = pnVarPrepForOS($dl_dl_link.$url);
	      	
	      	
			if (!rename($url, pnVarPrepForOS($dl_dl_link.$lid.$file_extension))) 
			{
	    		$fp = @fopen($dl_dl_link.'upgrade_log.txt', "a");
				fwrite($fp, "failed to rename $url...\n");
				fclose($fp);
			}
			else
			{
				$newurl = $lid.$file_extension;
				
				$sql = "UPDATE  $dl_downloads_table
		            SET     $dl_downloads_column[url]='" . pnVarPrepForStore($newurl) . "'
		            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'";
		    
				$result2 = $dbconn->execute($sql);
		    
				$result2->Close();
			}

		}
	}
	
	$result->Close();
    // return
    return true;
}

/**
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_update_filename()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}

  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT  $dl_downloads_column[lid],
					$dl_downloads_column[title],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";

	$result = $dbconn->execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$title,$url) = $result->fields;

		// get the file extension
    	$file_extension = pnModAPIFunc('Downloads', 'upgrade', 'get_file_extension', 
								 array('filename' 	=> $url,
									   'upload' 	=> true));
		$title = trim($title);
		$title = $title.$file_extension;
		
		$sql = "UPDATE  $dl_downloads_table
	            SET     $dl_downloads_column[filename]='" . pnVarPrepForStore($title) . "'
	            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'
				AND     $dl_downloads_column[filename]=''";
		
		$result2 = $dbconn->execute($sql);

		if ($dbconn->ErrorNo() != 0)
    	{
       		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    	}
    
		$result2->Close();
	}

	$result->Close();
    // return
    return true;
}

/**
 * move exsisting screenshots and thumbnails
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_cdl_move_pictures()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $cdl_sc_link = pnModGetVar('cmodsdownload', 'screenshotlink');
    $cdl_tn_link = pnModGetVar('cmodsdownload', 'thumbmaillink');
    $dl_sc_link  = pnModGetVar('downloads', 'screenshotlink');

	// move screenshots
	//check if folder exsists
	if(is_dir($cdl_sc_link))
	{
	        //move files to new folder
			$import_folder = dir($cdl_sc_link);
			while(false !==($filetomove = $import_folder->read()))
			{
				//If files to move found --> move them
				if($filetomove != '.' && $filetomove != '..' && $filetomove != '.htaccess' && $filetomove != 'thumbs.db')
				{
					copy(pnVarPrepForOS($cdl_sc_link.'/'.$filetomove), pnVarPrepForOS($dl_sc_link.'/'.$filetomove));
				}
			}
	} 
	
	// move thumbnails
	//check if folder exsists
	if(is_dir($cdl_tn_link))
	{
	        //move files to new folder
			$import_folder = dir($cdl_tn_link);
			while(false !==($filetomove = $import_folder->read()))
			{
				//If files to move found --> move them
				if($filetomove != '.' && $filetomove != '..' && $filetomove != '.htaccess' && $filetomove != 'thumbs.db')
				{
					copy(pnVarPrepForOS($cdl_tn_link.'/'.$filetomove), pnVarPrepForOS($dl_sc_link.'/tn_'.$filetomove));
				}
			}
	} 
    // return
    return true;
}


//*********************************************
// Upgrade Code UpDownload
//*********************************************

/**
 * the upgrade procedure to 2.x
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_start_upgrade()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
  	
  	//ensure that each step was executed successfully
  	$create_dumy = pnModAPIFunc('Downloads', 'upgrade', 'udl_create_dummy');
  	
  	if(true === $create_dumy)
  	{
		$db_change = pnModAPIFunc('Downloads', 'upgrade', 'udl_db_change');
	}
  	
  	if(true === $db_change)
  	{
		$dl_db_change = pnModAPIFunc('Downloads', 'upgrade', 'udl_change_download_db'); 
	}
 
  	if(true === $dl_db_change)
  	{
		$mr_db_change = pnModAPIFunc('Downloads', 'upgrade', 'udl_change_modrequest_db');
	}
	
	if(true === $mr_db_change)
  	{
		$copy_tables = pnModAPIFunc('Downloads', 'upgrade', 'udl_copy_tables');
	}
	
	if(true === $copy_tables)
  	{
		$move_files = pnModAPIFunc('Downloads', 'upgrade', 'udl_move_files');
	}
	
	if(true === $move_files)
  	{
		$add_filename = pnModAPIFunc('Downloads', 'upgrade', 'udl_update_filename');
	}
	
	if(true === $add_filename)
  	{
		$update_urls = pnModAPIFunc('Downloads', 'upgrade', 'udl_update_urls');
	}
	
	if(true === $update_urls)
  	{
		$move_pictures = pnModAPIFunc('Downloads', 'upgrade', 'udl_move_pictures');
	}
		
	if(true === $move_pictures)
  	{
		$hookup = pnModAPIFunc('Downloads', 'upgrade', 'create_hook'); 
	}
	
	if(true === $hookup)
  	{
		$mod_vars = pnModAPIFunc('Downloads', 'upgrade', 'dl_set_mod_vars'); 
	}
    
    return true;
}

/**
 * create dummy
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_create_dummy()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	$drop = pnModAPIFunc('Downloads', 'upgrade', 'drop_dummies');
  	
	$dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dict = &NewDataDictionary($dbconn);

    $taboptarray =& pnDBGetTableOptions();

	$dm_categories_table   = $pntable['dummy_categories'];
	$dm_categories_column  = &$pntable['dummy_categories_column'];

	$sql = 	"
			$dm_categories_column[cid] 			I 		NOTNULL AUTOINCREMENT PRIMARY,
			$dm_categories_column[title] 		C(100)	DEFAULT '',
			$dm_categories_column[description] 	X		NOTNULL DEFAULT ''
			";

	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_categories_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Categories Table', $dom));
    }
    
	$dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
	
	$sql = 	"
			$dm_downloads_column[lid]           I      	NOTNULL AUTOINCREMENT PRIMARY,
			$dm_downloads_column[cid]           I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[sid]           I       NOTNULL DEFAULT 0,
			$dm_downloads_column[title]         C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[url]           C(254)	NOTNULL DEFAULT '',
			$dm_downloads_column[description]   X  	    NOTNULL DEFAULT '',
			$dm_downloads_column[date]          T   	NOTNULL DEFAULT 0,
			$dm_downloads_column[name]          C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[email]         C(100)	NOTNULL DEFAULT '',
			$dm_downloads_column[hits]         	I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[submitter]     C(60)	NOTNULL DEFAULT '',
			$dm_downloads_column[downloadratingsummary] F(6.4)  NOTNULL DEFAULT 0,
			$dm_downloads_column[totalvotes]    I       NOTNULL DEFAULT 0,
			$dm_downloads_column[totalcomments] I       NOTNULL DEFAULT 0,
			$dm_downloads_column[filesize]      I      	NOTNULL DEFAULT 0,
			$dm_downloads_column[version]       C(10)	NOTNULL DEFAULT '',
			$dm_downloads_column[homepage]      C(200)	NOTNULL DEFAULT ''
			";
			
	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_downloads_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Download Table', $dom));
    }

	$dm_subcategories_table   =  $pntable['dummy_subcategories'];
	$dm_subcategories_column  = &$pntable['dummy_subcategories_column'];
	$sql = "
			$dm_subcategories_column[sid]   I      	NOTNULL AUTOINCREMENT PRIMARY,
			$dm_subcategories_column[cid]   I      	NOTNULL DEFAULT 0,
			$dm_subcategories_column[title] C(50)	NOTNULL DEFAULT ''
		";


	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_subcategories_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Download Table', $dom));
    }


	$dm_modrequest_table   =  $pntable['dummy_modrequest'];
	$dm_modrequest_column  = &$pntable['dummy_modrequest_column'];
	
	$sql = 	"
			$dm_modrequest_column[requestid]      	I      		NOTNULL AUTOINCREMENT PRIMARY,
			$dm_modrequest_column[lid]             	I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[cid]              I       	NOTNULL DEFAULT 0,
			$dm_modrequest_column[sid]              I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[title]           	C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[url]             	C(254) 		NOTNULL DEFAULT '',
			$dm_modrequest_column[description]     	X  	   		NOTNULL DEFAULT '',
			$dm_modrequest_column[modifysubmitter] C(60)		NOTNULL DEFAULT '',
			$dm_modrequest_column[brokendownload]  I2           NOTNULL DEFAULT 0,
			$dm_modrequest_column[name]            C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[email]           C(100)		NOTNULL DEFAULT '',
			$dm_modrequest_column[filesize]        I      		NOTNULL DEFAULT 0,
			$dm_modrequest_column[version]         C(10)		NOTNULL DEFAULT '',
			$dm_modrequest_column[homepage]        C(200)		NOTNULL DEFAULT ''
			";

	// Creating the table
    $sqlarray = $dict->CreateTableSQL($dm_modrequest_table, $sql, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) 
	{
        return errorpage( __FILE__, __LINE__,__('Failed to create Modrequest Table', $dom));
    }
    
	pnModDBInfoLoad('UpDownload');
	
	// copy tables
    $udl_tables = array('updownload_categories',
                    	'updownload_downloads',
                    	'updownload_subcategories',
                        'updownload_modrequest');
                        
    $dm_tables = array('dummy_categories',
                        'dummy_downloads',
                        'dummy_subcategories',
                        'dummy_modrequest');

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
    for($cnt=0; $cnt < count($dm_tables); $cnt++) 
	{
		$sql = "INSERT INTO ".$pntable[$dm_tables[$cnt]]." SELECT * FROM ".$pntable[$udl_tables[$cnt]]."";
		
        $dbconn->Execute($sql);
        
        	if ($dbconn->ErrorNo() != 0) 
			{
            	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
            } 
    }
    
    // no db error occured
    // database actions successfully completed
    return true;
    
}
/**
 * import categories
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_db_change()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    // change the category table to new db format
    // add pid to handle category relationship
    $dm_categories_table   = $pntable['dummy_categories'];
	$dm_categories_column  = &$pntable['dummy_categories_column'];

    $sql = "ALTER TABLE $dm_categories_table
            ADD pn_pid INT(11) DEFAULT '0' NOT NULL  AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

  	// start converting subcategories

    $dm_subcategories_table   =  $pntable['dummy_subcategories'];
	$dm_subcategories_column  = &$pntable['dummy_subcategories_column'];

	$sql = "SELECT
                    $dm_subcategories_column[cid],
                    $dm_subcategories_column[sid],
                    $dm_subcategories_column[title]
            FROM    $dm_subcategories_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );

	}
	
	// push the id in an area which is hopefully free
	//$newcid = 5000;
	
	// get max cid 
	$sql = "SELECT max($dm_categories_column[cid]) FROM $dm_categories_table";
    $cidresult =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
    	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

 	list($newcid) = $cidresult->fields;

   	$cidresult->Close();
	
    for (;!$result->EOF; $result->MoveNext())
    {
        list($cid, $sid, $title) = $result->fields;
        
        $dm_categories_table   = $pntable['dummy_categories'];
		$dm_categories_column  = &$pntable['dummy_categories_column'];

		$newcid = ++$newcid;
		
		$dl_id_change = pnModAPIFunc('Downloads', 'upgrade', 'udl_change_download_id',array('sid' => $sid,'newcid' => $newcid));
		
        $sql = "INSERT
    			INTO $dm_categories_table
    				(
					 $dm_categories_column[cid],
    				 $dm_categories_column[pid],
    				 $dm_categories_column[title]
					)
    			VALUES
    				('".(int)pnVarPrepForStore($newcid)."',
    				 '".(int)pnVarPrepForStore($cid)."',
    				 '".pnVarPrepForStore($title)."')";


        $catresult =& $dbconn->Execute($sql);

        if ($dbconn->ErrorNo() != 0)
        {
            return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
        }

        $catresult->Close();
            
    }

    $result->Close();

    // no db error occured
    // database actions successfully completed
    return true;
}

/**
 * change the sid of all downloads in a specific sid
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_change_download_id($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// we change the sid of all downloads to the next insertable id of categories table
	$dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
	    
	$sql = "UPDATE  $dm_downloads_table
            SET     $dm_downloads_column[cid]='" . (int)pnVarPrepForStore($newcid) . "'
            WHERE   pn_sid ='" . (int)pnVarPrepForStore($sid)."'";
	    
	$result = $dbconn->execute($sql);
	    
	$result->Close();
	
    // return
    return true;
}

/**
 * copy name to submitter
 *
 * related to #5171
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_copy_name_to_submitter($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
  	extract($args);
  	unset($args);

   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dm_downloads_table  = $pntable['dummy_downloads'];
	$dm_downloads_column = &$pntable['dummy_downloads_column'];

	$sql = "SELECT
					$dm_downloads_column[lid],
                    $dm_downloads_column[name]
            FROM    $dm_downloads_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	}

    for (;!$result->EOF; $result->MoveNext())
    {
        list($lid,$name) = $result->fields;

		$sql = "UPDATE  $dm_downloads_table
	            SET     $dm_downloads_column[submitter]='" . pnVarPrepForStore($name) . "'
	            WHERE   pn_lid ='" . (int)pnVarPrepForStore($lid)."'";
	            
		$result2 = $dbconn->execute($sql);
		   
		if ($dbconn->ErrorNo() != 0)
		{
			return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
		}
		
		$result2->Close();
	}

    // return
    return true;
}

/**
 * change downloads table format for proper import
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_change_download_db()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
   	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// change the downloads table to new db format
    
    $dm_downloads_table   =  $pntable['dummy_downloads'];
	$dm_downloads_column  = &$pntable['dummy_downloads_column'];
    
    // add status to handle submitted downloads
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_status SMALLINT DEFAULT 1 NOT NULL AFTER pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add update to handle updated downloads
    $sql = "ALTER TABLE $dm_downloads_table
              ADD pn_update SMALLINT DEFAULT '0' NOT NULL AFTER pn_status";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add modid to handle hook actions
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_modid INT DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// add objectid to handle hook actions
    $sql = "ALTER TABLE $dm_downloads_table
              ADD pn_objectid VARCHAR(5)  DEFAULT '0' NOT NULL ";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	// change default value for proper work  after import
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_status pn_status SMALLINT NOT NULL DEFAULT '1'";
	
	$dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // change update column
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_update pn_update DATETIME NOT NULL DEFAULT 0";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	// change date column
    $sql = "ALTER TABLE $dm_downloads_table CHANGE pn_date pn_date DATETIME NOT NULL DEFAULT 0";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

   // delete deprecated field sid
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_sid";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

	// delete deprecated field ratingsummary
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_ratingsummary";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $name_to_submitter = pnModAPIFunc('Downloads', 'upgrade', 'udl_copy_name_to_submitter');
    
    if(true === $name_to_submitter)
  	{
		// delete deprecated field name
	    $sql = "ALTER TABLE $dm_downloads_table DROP pn_name";
	
	    $dbconn->Execute($sql);
	    
	    if ($dbconn->ErrorNo() != 0)
	    {
	        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	    }
	}
    
    // delete deprecated field totalvotes
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_totalvotes";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // delete deprecated field totalcomments
    $sql = "ALTER TABLE $dm_downloads_table DROP pn_totalcomments";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	// add filenmae to retain orginal filename
    $sql = "ALTER TABLE $dm_downloads_table
            ADD pn_filename TEXT DEFAULT '' NOT NULL AFTER pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // return
    return true;
}

/**
 * change the modrequest table for new format
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_change_modrequest_db($args)
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
  	// change the modrequest table to new db format
    // delete deprecated field sid
    $dm_modrequest_table   =  $pntable['dummy_modrequest'];
	$dm_modrequest_column  = &$pntable['dummy_modrequest_column'];

	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_cid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_sid";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_url";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_name";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_filesize";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_homepage";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    $sql = "ALTER TABLE $dm_modrequest_table DROP pn_brokendownload";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
	$sql = "ALTER TABLE $dm_modrequest_table DROP pn_version";

    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    // return
    return true;
}

/**
 * copy the tables
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_copy_tables()
{  
  	// copy tables
    $dm_tables = array('dummy_categories',
                    	'dummy_downloads',
                        'dummy_modrequest');
                        
    $dl_tables = array('downloads_categories',
                        'downloads_downloads',
                        'downloads_modrequest');

	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
    for($cnt=0; $cnt < count($dl_tables); $cnt++) 
	{
		$sql = "INSERT INTO ".$pntable[$dl_tables[$cnt]]." SELECT * FROM ".$pntable[$dm_tables[$cnt]]."";
		
        $dbconn->Execute($sql);
        
        	if ($dbconn->ErrorNo() != 0) 
			{
            	return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
            } 
    }
	
	// delete the dummies
	$dm_categories_table  =  $pntable['dummy_categories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_categories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	$dm_subcategories_table  =  $pntable['dummy_subcategories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_subcategories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $dm_downloads_table  =  $pntable['dummy_downloads'];
    
    $sql = "DROP TABLE IF EXISTS $dm_downloads_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
    $dm_modrequest_table  = $pntable['dummy_modrequest'];
    
    $sql = "DROP TABLE IF EXISTS $dm_modrequest_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    // return
    return true;
}

/**
 * move exsisting files
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_move_files()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $udl_dl_link = pnModGetVar('updownload', 'upload_folder');
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
  	
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
	// move all downloads to the new destination
	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	   
	$sql = "SELECT
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";
    
	$result = $dbconn->execute($sql);
	    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list($url) = $result->fields;
      	
      	if(false == eregi(pnGetBaseURL(),$url)&& true == eregi($udl_dl_link,$url))
	    {
			$new_url = str_replace(pnGetBaseURL(),"",$url);
	      	$new_url = str_replace($udl_dl_link,"",$new_url);
	      	$new_url = strrchr($new_url, "/");
			$new_url = str_replace("/","",$new_url);
	      	$new_url = pnVarPrepForOS($dl_dl_link.$new_url);
	      	
	      	if (!copy($url,$new_url)) 
			{
	    		$fp = @fopen($dl_dl_link.'upgrade_log.txt', "a");
				fwrite($fp, "failed to copy $url...\n");
				fclose($fp);
			}
		}
	}
	$result->Close();
    // return
    return true;
}

/**
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_update_filename()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}

  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT  $dl_downloads_column[lid],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";

	$result = $dbconn->execute($sql);

	if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
     // get the neccessary mod vars
    $udl_dl_link = pnModGetVar('updownload', 'upload_folder');
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$url) = $result->fields;

		if(false == eregi(pnGetBaseURL(),$url) && true == eregi($udl_dl_link,$url))
	    {
	      	$url = str_replace(pnGetBaseURL(),"",$url);
	      	$url = str_replace($udl_dl_link,"",$url);
	      	$url = strrchr($url, "/");
			$url = str_replace("/","",$url);
						
			$sql = "UPDATE  $dl_downloads_table
		            SET     $dl_downloads_column[filename]='" . pnVarPrepForStore($url) . "'
		            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'
		            AND     $dl_downloads_column[filename]=''";
			
			$result2 = $dbconn->execute($sql);
	
			if ($dbconn->ErrorNo() != 0)
	    	{
	       		return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
	    	}
	    
			$result2->Close();
		}
			
	}

	$result->Close();
    // return
    return true;
}

/**
 * update the urls
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_update_urls()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $udl_dl_link = pnModGetVar('updownload', 'upload_folder');
    $dl_dl_link  = pnModGetVar('downloads', 'upload_folder');
    
  	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	// we change the sid of all downloads to the next insertable id of categories table
	$dl_downloads_table  = $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	   
	$sql = "SELECT
                    $dl_downloads_column[lid],
                    $dl_downloads_column[url]
            FROM    $dl_downloads_table";
    
	$result = $dbconn->execute($sql);
	    
	for (;!$result->EOF; $result->MoveNext())
    {
      	list( $lid,$url) = $result->fields;
      	
      	if(false == eregi(pnGetBaseURL(),$url) && true == eregi($udl_dl_link,$url))
	    {
	      	$url = str_replace(pnGetBaseURL(),"",$url);
	      	$url = str_replace($udl_dl_link,"",$url);
	      	$url = strrchr($url, "/");
			$url = str_replace("/","",$url);
	      	$url = pnVarPrepForOS($dl_dl_link.$url);
	      	
	      	// get the file extension
    		$file_extension = pnModAPIFunc('Downloads', 'upgrade', 'get_file_extension', 
									array('filename' 	=> $url,
										  'upload' 		=> true));

			if (!rename($url, pnVarPrepForOS($dl_dl_link.$lid.$file_extension))) 
			{
	    		$fp = @fopen($dl_dl_link.'upgrade_log.txt', "a");
				fwrite($fp, "failed to rename $url...\n");
				fclose($fp);
			}
			else
			{
				$newurl = $lid.$file_extension;
				
				$sql = "UPDATE  $dl_downloads_table
		            SET     $dl_downloads_column[url]='" . pnVarPrepForStore($newurl) . "'
		            WHERE   $dl_downloads_column[lid]='" . (int)pnVarPrepForStore($lid)."'";
		    
				$result2 = $dbconn->execute($sql);
		    
				$result2->Close();
			}

		}
	}
	
	$result->Close();
    // return
    return true;
}

/**
 * move exsisting screenshots and thumbnails
 *
 * @author       Sascha Jost
 * @return       bool true if action suceeds
 */
function Downloads_upgradeapi_udl_move_pictures()
{  
    $dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    // get the neccessary mod vars
    $udl_sc_link = pnModGetVar('UpDownload', 'screenshotlink');
    $udl_tn_link = pnModGetVar('UpDownload', 'screenshotthumblink');
    $dl_sc_link  = pnModGetVar('downloads', 'screenshotlink');

	// move screenshots
	//check if folder exsists
	if(is_dir($udl_sc_link))
	{
	        //move files to new folder
			$import_folder = dir($udl_sc_link);
			while(false !==($filetomove = $import_folder->read()))
			{
				//If files to move found --> move them
				if($filetomove != '.' && $filetomove != '..' && $filetomove != '.htaccess*' && $filetomove != 'thumbs.db')
				{
					copy(pnVarPrepForOS($udl_sc_link.'/'.$filetomove), pnVarPrepForOS($dl_sc_link.'/'.$filetomove));
				}
			}
	} 
	
	// move thumbnails
	//check if folder exsists
	if(is_dir($udl_tn_link))
	{
	        //move files to new folder
			$import_folder = dir($udl_tn_link);
			while(false !==($filetomove = $import_folder->read()))
			{
				//If files to move found --> move them
				if($filetomove != '.' && $filetomove != '..' && $filetomove != '.htaccess' && $filetomove != 'thumbs.db')
				{
					copy(pnVarPrepForOS($udl_tn_link.'/'.$filetomove), pnVarPrepForOS($dl_sc_link.'/tn_'.$filetomove));
				}
			}
	} 
    // return
    return true;
}

/**
 * create hooks
 *
 * @author       Sascha Jost
 */
function downloads_upgradeapi_create_hook()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	// register the item display hook
    if (!pnModRegisterHook('item',
                           'display',
                           'GUI',
                           'Downloads',
                           'hook',
                           'show_form')) 
	{
        pnSessionSetVar('errormsg', __('Failed to create the hook.', $dom) . ' (display)');
        return false;
    }

	// register the item create hook
	if (!pnModRegisterHook('item',
                           'create',
                           'GUI',
                           'Downloads',
                           'hook',
                           'attach_item')) 
	{
        pnSessionSetVar('errormsg', __('Failed to create the hook.', $dom) . ' (create)');
        return false;
    }
    
    if (!pnModRegisterHook('item',
                           'delete',
                           'API',
                           'Downloads',
                           'hook',
                           'delete_item')) {
        pnSessionSetVar('errormsg', __('Failed to create the hook.', $dom) . ' (delete)');
        return false;
    }
    
    // register the module delete hook
    if (!pnModRegisterHook('module',
                           'remove',
                           'API',
                           'Downloads',
                           'hook',
                           'delete_module')) {
        pnSessionSetVar('errormsg', __('Failed to create the hook.', $dom) . ' (remove)');
    }    
    
	return true;
}

/**
 * delete hooks
 *
 * @author       Sascha Jost
 */
function downloads_upgradeapi_delete_hook()
{
   $dom = ZLanguage::getModuleDomain('Downloads');
    if (!pnModUnRegisterHook('item',
                             'display',
                             'GUI',
                             'Downloads',
                             'hook',
                             'show_form')) 
	{
        pnSessionSetVar('errormsg', __('Failed to delete the hook.', $dom) . ' (display)');
        return false;
    }
    
    if (!pnModUnRegisterHook('item',
                             'create',
                             'GUI',
                             'Downloads',
                             'hook',
                             'attach_item')) 
	{
        pnSessionSetVar('errormsg', __('Failed to delete the hook.', $dom) . ' (create)');
        return false;
    }
    
    if (!pnModUnRegisterHook('item',
                            'delete',
                            'API',
                            'Downloads',
                            'hook',
                            'delete_item')) {
        pnSessionSetVar('errormsg', __('Failed to delete the hook.', $dom) . ' (delete)');
        return false;
    }
    
    if (!pnModUnRegisterHook('module',
                            'remove',
                            'API',
                            'Downloads',
                            'hook',
                            'deletem_odule')) {
        pnSessionSetVar('errormsg', __('Failed to delete the hook.', $dom) . ' (remove)');
    }    
	return true;
}

function downloads_upgradeapi_drop_dummies()
{
  	$dom = ZLanguage::getModuleDomain('Downloads');
  	if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}
    
    $dbconn  =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();
	
	// delete the dummies
	$dm_categories_table  =  $pntable['dummy_categories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_categories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
	$dm_subcategories_table  =  $pntable['dummy_subcategories'];
    
    $sql = "DROP TABLE IF EXISTS $dm_subcategories_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }

    $dm_downloads_table  =  $pntable['dummy_downloads'];
    
    $sql = "DROP TABLE IF EXISTS $dm_downloads_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
	
    $dm_modrequest_table  = $pntable['dummy_modrequest'];
    
    $sql = "DROP TABLE IF EXISTS $dm_modrequest_table";

    $dbconn->Execute($sql);
    
    if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    return true;
}

/**
 *
 * resize thumbnails
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       boolean 
 */
function Downloads_upgradeapi_resize_thumbnails_22()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    if (!defined('_PNINSTALLVER')) 
	{
		  // Security check
	    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
		{
	        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
	    }
  	}

    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[lid]
			FROM 		$dl_downloads_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	$screenshotlink = pnModGetVar('downloads', 'screenshotlink');
	
	// delete the files from the server
	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($lid) = $result->fields;
	
	    $screenshot_extensions = array('.gif', '.jpg','.jpeg','.png');
	    
	    //check ext array end delete the old pics
	    foreach($screenshot_extensions as $shotext)
	    {	
	      	if($shotext == '.jpg' || $shotext == '.jpeg')
	        {
		        // resize jpg
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizeJpeg($screenshotlink.'tn_'.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	        if($shotext == '.gif')
	        {
		        // resize gif
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizeGif($screenshotlink.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	        if($shotext == '.png')
	        {
		        // resize png
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizePng($screenshotlink.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	    }

    }
	
	return true;
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
function Downloads_upgradeapi_get_file_extension($args)
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
?>