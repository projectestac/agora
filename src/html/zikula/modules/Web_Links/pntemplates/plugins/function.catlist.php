<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.catlist.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

function smarty_function_catlist($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if (!isset($scat) || !is_numeric($scat)){
        return __('Error! Could not do what you wanted. Please check your input.', $dom);
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $s="";
    $column = &$pntable['links_categories_column'];
    $result =& $dbconn->Execute("SELECT $column[cat_id] FROM $pntable[links_categories]
                        WHERE $column[parent_id]='".(int)DataUtil::formatForStore($scat)."'
                        ORDER BY $column[title]");
    while(list($cid)=$result->fields) {

        $result->MoveNext();
    if ($sel==$cid) {
        $selstr=' selected="selected"';
    } else {
        $selstr='';
    }
    $s.="<option value=\"$cid\" $selstr>".catpath($cid,0,0,0)."</option>";
    $s.=catlist($cid, $sel);
    }
    return $s;
}
function catpath($cid, $start, $links, $linkmyself) {
    $dom = ZLanguage::getModuleDomain('Web_Links');
    if (!isset($cid) || !is_numeric($cid)){
        return __('Error! Could not do what you wanted. Please check your input.', $dom);
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_categories_column'];
    $result =& $dbconn->Execute("SELECT $column[parent_id], $column[title] FROM $pntable[links_categories]
                        WHERE $column[cat_id]='".(int)DataUtil::formatForStore($cid)."'");
    list($pid, $title)=$result->fields;
    if ($linkmyself) {
        $cpath = "<a href=\"".$GLOBALS['modurl']."&amp;req=viewlink&amp;cid=$cid\"> ".DataUtil::formatForDisplay($title)." </a>";
    } else {
        $cpath = DataUtil::formatForDisplay($title);
    }
    while ($pid!=0) {
        $column = &$pntable['links_categories_column'];
        $result =& $dbconn->Execute("SELECT $column[cat_id], $column[parent_id], $column[title]
                        FROM $pntable[links_categories]
                        WHERE $column[cat_id]='".(int)DataUtil::formatForStore($pid)."'");
        list($cid, $pid, $title)=$result->fields;
        if ($links) {
            $cpath = "<a href=\"".$GLOBALS['modurl']."&amp;req=viewlink&amp;cid=$cid\"> ".DataUtil::formatForDisplay($title)."</a> / $cpath";
        } else {
            $cpath = DataUtil::formatForDisplay($title)." / $cpath";
        }
    }
    if ($start) {
      $cpath="<a href=\"".$GLOBALS['modurl']."\">"._START."</a> / $cpath";
    }
    return $cpath;
}
function catlist($scat, $sel)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    if (!isset($scat) || !is_numeric($scat)){
        return __('Error! Could not do what you wanted. Please check your input.', $dom);
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $s="";
    $column = &$pntable['links_categories_column'];
    $result =& $dbconn->Execute("SELECT $column[cat_id] FROM $pntable[links_categories]
                        WHERE $column[parent_id]='".(int)DataUtil::formatForStore($scat)."'
                        ORDER BY $column[title]");
    while(list($cid)=$result->fields) {

        $result->MoveNext();
    if ($sel==$cid) {
        $selstr=' selected="selected"';
    } else {
        $selstr='';
    }
    $s.="<option value=\"$cid\" $selstr>".catpath($cid,0,0,0)."</option>";
    $s.=catlist($cid, $sel);
    }
    return $s;
}