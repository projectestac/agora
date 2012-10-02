<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Non GUI User Functions
 *
 * @package      Downloads
 * @version      2.2
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
// -----------------------------------------------------------------------------------

/**
 * shows all childs of the actual category
 * @author       Lindbergh
 * @version      1.0
 *@param $params['cid'] category id
 *
 */
function smarty_function_dl_show_childs($params, &$smarty) 
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    extract($params); 
	unset($params);

    if(empty($cid)) 
	{
		$smarty->trigger_error(pnVarPrepForDisplay(__('Error! Could not do what you wanted. Please check your input.', $dom)), e_error);
	} 


    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

	$dl_categories_table  =  $pntable['downloads_categories'];
	$dl_categories_column = &$pntable['downloads_categories_column'];

	$sql = "SELECT
					$dl_categories_column[cid],
					$dl_categories_column[title]
			FROM 	$dl_categories_table
			WHERE 	$dl_categories_column[pid] ='".(int)pnVarPrepForStore($cid)."'";
			
	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );

	}

	for (;!$result->EOF; $result->MoveNext())
    {
      	list($cid, $title)=$result->fields;
      	$info[]= "<a title=\"".pnVarPrepForDisplay($title)."\" href=\"".pnVarPrepForDisplay(pnModURL('Downloads', 'user', 'view', array('cid' => $cid,'start' => 0)))."\">".pnVarPrepForDisplay($title)."</a>";
	}

	$result->Close();

	if (isset($assign)) 
	{
        $smarty->assign($assign, $info);
    } 
	else 
	{
        return $info;
    }
}

?>