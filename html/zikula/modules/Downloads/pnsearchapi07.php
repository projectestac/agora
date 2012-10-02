<?php
//------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: search api 
 *
 * @package      Downloads
 * @version      2.4
 * @author       Mark West
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------
include_once('modules/Downloads/common.php');
/**
 * Search plugin info
 **/
function downloads_searchapi_info()
{
	return array('title' => 'Downloads', 'functions' => array('Downloads' => 'search'));
}

/**
 * Search form component
 **/
function downloads_searchapi_options($args, $outside_flag=true )
{
    if (pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ)) 
	{
	 	  
	  	extract($args);
  		unset($args);
  	
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $pnr = new pnRender('Downloads');
		
		if($outside_flag === true)
		{
			return $pnr->fetch('downloads_search_options_outside.htm');
		}
    	else
    	{
			return $pnr->fetch('downloads_search_options.htm');
		}
			
    }
    return '';

}

/**
 * Search plugin main function
 **/
function downloads_searchapi_search($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
  	extract($args);
  	unset($args);
  	
    list($active_Downloads,
         $Downloads_startnum,
         $dl_search_limit,
         $bool,
         $dl_uploader,
         $q,
		 $outside_flag) = pnVarCleanFromInput(	'active_Downloads',
                                   				'Downloads_startnum',
                                   				'dl_search_limit',
                                   				'bool',
                                   				'dl_uploader',
                                   				'q',
								   				'outside_flag');
			   
    if(empty($active_Downloads))
	{
        return;
    }

	if(empty($q) && empty($dl_uploader))
	{
        return errorpage( __FILE__, __LINE__,__('Please enter a search string!', $dom), false, false, true);
    }

    if (!isset($Downloads_startnum) || !is_numeric($Downloads_startnum)) 
	{
        $Downloads_startnum = 1;
    }
    
    if (isset($dl_search_limit) && !is_numeric($dl_search_limit)) 
	{
        unset($dl_search_limit);
    }

	if (isset($dl_uploader) && is_numeric($dl_uploader)) 
	{
        unset($dl_uploader);
    }
    
    $q = pnVarPrepForStore(trim($q));
    
    $w = explode(' ', $q);
    
    $flag = false;
    
    pnModDBInfoLoad('Downloads');
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    
    $dl_downloads_table  = &$pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	
	// fulltext search active ?
    if('1' == pnModGetVar('downloads', 'fulltext'))
    {	    
	    $query = "SELECT $dl_downloads_column[title] as title,
	                     $dl_downloads_column[date] as date,
	                     $dl_downloads_column[cid] as cid,
	                     $dl_downloads_column[lid] as lid,
	             MATCH($dl_downloads_column[title],$dl_downloads_column[description]) AGAINST ('%$word%' IN BOOLEAN MODE) as SCORE
				 FROM   $dl_downloads_table WHERE ";
	                     
	    foreach($w as $word) 
		{
	        if(true === $flag) 
			{
	            switch($bool) 
				{
	                case 'AND' :
	                    $query .= ' AND ';
	                    break;
	                case 'OR' :
	                default :
	                    $query .= ' OR ';
	                    break;
	            }
	        }
	
	        if(!empty($word)) 
			{
	        	$query .= " MATCH($dl_downloads_column[title],$dl_downloads_column[description]) AGAINST ('%$word%' IN BOOLEAN MODE)";
	        }
	        
			if(!empty($dl_uploader)&& empty($word)) 
			{
				$query .= "$dl_downloads_column[submitter] = '" .pnVarPrepForStore($dl_uploader) . "'";
			}
			
			if(!empty($dl_uploader)&& !empty($word)) 
			{
				$query .= " AND $dl_downloads_column[submitter] = '" .pnVarPrepForStore($dl_uploader) . "'";
			}
			
	        $query .= " AND $dl_downloads_column[status] = 1";
	        
	        $flag = true;
	    }
	    
	    $query .= " ORDER BY SCORE DESC";
	}
	else
	{
	  
	  	$query = "SELECT $dl_downloads_column[title] as title,
                     $dl_downloads_column[date] as date,
                     $dl_downloads_column[cid] as cid,
                     $dl_downloads_column[lid] as lid FROM $dl_downloads_table WHERE ";
                     
	    foreach($w as $word) 
		{
	        if(true === $flag) 
			{
	            switch($bool) 
				{
	                case 'AND' :
	                    $query .= ' AND ';
	                    break;
	                case 'OR' :
	                default :
	                    $query .= ' OR ';
	                    break;
	            }
	        }
	        
	        $query .= '(';
	        
	        if(!empty($word)) 
			{
	        	$query .= "$dl_downloads_column[title] LIKE '%$word%' OR ";
	        	$query .= "$dl_downloads_column[description] LIKE '%$word%'";
	        }
	        
	        if(!empty($dl_uploader)&& empty($word)) 
			{
				$query .= "$dl_downloads_column[submitter] = '" .pnVarPrepForStore($dl_uploader) . "'";
			}
			
			if(!empty($dl_uploader)&& !empty($word)) 
			{
				$query .= " AND $dl_downloads_column[submitter] = '" .pnVarPrepForStore($dl_uploader) . "'";
			}
			
	        $query .= ')';
	        
	        $flag = true;
	    }
	    
	    $query .= " ORDER BY $dl_downloads_column[title]";
	    
	    $query .= " AND $dl_downloads_column[status] = 1";
	}
	
    if (empty($dl_search_limit)) 
	{
        $countres = $dbconn->Execute($query);
        $dl_search_limit = $countres->PO_RecordCount();
        $countres->Close();
    }

    $result = $dbconn->SelectLimit($query,pnModGetVar('downloads', 'perpage'), $Downloads_startnum-1);
	
	if ($dbconn->ErrorNo() != 0)
    {
        return errorpage( __FILE__, __LINE__,$dbconn->ErrorMsg() );
    }
    
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $pnr = new pnRender('Downloads');

    if(!$result->EOF) 
	{
        $pnr->assign('dl_search_limit', $dl_search_limit);
        
        $downloads = array();
        
        while(!$result->EOF) 
		{
            $row = $result->GetRowAssoc(false);
    
    		// permission check for the category
        	if (pnSecAuthAction(0, 'Downloads::Category', "$row[cid]::", ACCESS_READ))
			{
	            // permission check for the file 
	            if (pnSecAuthAction(0,'Downloads::Item',"$row[lid]::",ACCESS_READ)) 
				{
	                $downloads[] = $row;
	            }
            }
            $result->MoveNext();
        }
        
        // assign the search results
        $pnr->assign('downloads', $downloads);
        
        $pnr->assign('Downloads_startnum', $Downloads_startnum);
        
        if(!empty($q) && empty($dl_uploader))
        {
		  $pnr->assign('querystring', $w);
		}
		
        if(empty($q) && !empty($dl_uploader))
        {
		  $pnr->assign('querysubmitter', $dl_uploader);
		}
		
		if(!empty($q) && !empty($dl_uploader))
        {
          $pnr->assign('querystring', $w);
		  $pnr->assign('querysubmitter', $dl_uploader);
		}
		
		$pnr->assign('numitems', $dl_search_limit);
		$pnr->assign('active_Downloads', $active_Downloads);
		$pnr->assign('bool', $bool);
		$pnr->assign('dl_uploader', $dl_uploader);
		$pnr->assign('q', $q);
		$pnr->assign('outside_flag', $outside_flag);
		$pnr->assign('perpage', pnModGetVar('downloads', 'perpage'));

    }

	if($outside_flag == true)
	{
		return $pnr->fetch('downloads_search_results_outside.htm');
	}
    else
    {
		return $pnr->fetch('downloads_search_results.htm');
	}
}

?>