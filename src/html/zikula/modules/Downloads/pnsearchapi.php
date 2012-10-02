<?php
//------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: .8 search api 
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------
function downloads_searchapi_info()
{
    return array('title' => 'Downloads', 
                 'functions' => array('Downloads' => 'search'));
}

/**
 * Search form component
 **/
function downloads_searchapi_options($args)
{
    if (SecurityUtil::checkPermission( 'Downloads::', '::', ACCESS_READ)) 
	{
        // Create output object - this object will store all of our output so that
        // we can return it easily when required
        $pnRender = pnRender::getInstance('Downloads');
        $pnRender->assign('active',(isset($args['active'])&&isset($args['active']['Downloads']))||(!isset($args['active'])));
        return $pnRender->fetch('downloads_search_options08.htm');
    }

    return '';
}

/**
 * Search plugin main function
 **/
function downloads_searchapi_search($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    if (!SecurityUtil::checkPermission( 'Downloads::', '::', ACCESS_READ)) {
        return true;
    }

    pnModDBInfoLoad('Search');
    $pntable = pnDBGetTables();
    
    $dl_downloads_table  = &$pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];
	
    $searchTable = $pntable['search_result'];
    $searchColumn = $pntable['search_result_column'];

    $where = search_construct_where($args, 
                                    array($dl_downloads_column['title'], 
                                          $dl_downloads_column['description'], 
                                          $dl_downloads_column['submitter']), 
                                    	  $storiescolumn['filename']);

    $sessionId = session_id();

    $sql = "
SELECT 
   $dl_downloads_column[title] as title,
   $dl_downloads_column[description] as text,
   $dl_downloads_column[submitter] as submitter,
   $dl_downloads_column[filename] as filename,
   $dl_downloads_column[lid] as lid
FROM $dl_downloads_table
WHERE $where";

    $result = DBUtil::executeSQL($sql);
    if (!$result) 
	{
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    $insertSql = 
"INSERT INTO $searchTable
  ($searchColumn[title],
   $searchColumn[text],
   $searchColumn[extra],
   $searchColumn[module],
   $searchColumn[created],
   $searchColumn[session])
VALUES ";


    // Process the result set and insert into search result table
    for (; !$result->EOF; $result->MoveNext()) 
	{
        $file = $result->GetRowAssoc(2);
        if (SecurityUtil::checkPermission('Downloads::Item', "$file[lid]::", ACCESS_OVERVIEW)) 
		{
            $sql = $insertSql . '(' 
                   . '\'' . DataUtil::formatForStore($file['title']) . '\', '
                   . '\'' . DataUtil::formatForStore($file['text']) . '\', '
                   . '\'' . DataUtil::formatForStore($file['lid']) . '\', '
                   . '\'' . 'Downloads' . '\', '
                   . '\'' . DataUtil::formatForStore($file['date']) . '\', '
                   . '\'' . DataUtil::formatForStore($sessionId) . '\')';
            $insertResult = DBUtil::executeSQL($sql);
            
            if (!$insertResult) 
			{
                return LogUtil::registerError (__('Error! Could not load items.', $dom));
            }
        }
    }

    return true;
}


/**
 * Do last minute access checking and assign URL to items
 *
 * Access checking is ignored since access check has
 * already been done. But we do add a URL to the found user
 */
function downloads_searchapi_search_check(&$args)
{
    $datarow = &$args['datarow'];
    $lid = $datarow['extra'];
    
    $datarow['url'] = pnModUrl('Downloads', 'user', 'display', array('lid' => $lid));

    return true;
}

