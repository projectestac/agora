<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.countsublinks.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */ 
 
function smarty_function_countsublinks($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if (!isset($catid) || !is_numeric($catid)){
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    $column = &$pntable['links_links_column'];

    $ct=0;
    $result =& $dbconn->Execute("SELECT COUNT(*) FROM $pntable[links_links]
                    WHERE $column[cat_id]='".(int)DataUtil::formatForStore($catid)."'");
    list($ct) = $result->fields;

    // Now get all child nodes
    $column = &$pntable['links_categories_column'];
    $result =& $dbconn->Execute("SELECT $column[cat_id] FROM $pntable[links_categories]
                    WHERE $column[parent_id]='".(int)DataUtil::formatForStore($catid)."'");
    while(list($sid)=$result->fields) {

        $result->MoveNext();
        $ct+=CountSubLinks($sid);
    }
    return $ct;
}

function CountSubLinks($sid)
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    $column = &$pntable['links_links_column'];

    $ct=0;
    $result =& $dbconn->Execute("SELECT COUNT(*) FROM $pntable[links_links]
                    WHERE $column[cat_id]='".(int)DataUtil::formatForStore($sid)."'");
    list($ct) = $result->fields;

    // Now get all child nodes
    $column = &$pntable['links_categories_column'];
    $result =& $dbconn->Execute("SELECT $column[cat_id] FROM $pntable[links_categories]
                    WHERE $column[parent_id]='".(int)DataUtil::formatForStore($sid)."'");
    while(list($sid)=$result->fields) {

        $result->MoveNext();
        $ct+=CountSubLinks($sid);
    }
  return $ct;
}