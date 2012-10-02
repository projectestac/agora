<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.catpath.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
 
function smarty_function_catpath($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

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
        $cpath = "<a href=\"".DataUtil::formatForDisplay(pnModURL('Web_Links', 'user', 'category', array('cid' => $cid)))."\"> ".DataUtil::formatForDisplay($title)." </a>";
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
            $cpath = "<a href=\"".DataUtil::formatForDisplay(pnModURL('Web_Links', 'user', 'category', array('cid' => $cid)))."\"> ".DataUtil::formatForDisplay($title)."</a> / $cpath";
        } else {
            $cpath = DataUtil::formatForDisplay($title)." / $cpath";
        }
    }
    if ($start) {
      $cpath="<a href=\"".DataUtil::formatForDisplay(pnModURL('Web_Links', 'user', 'main'))."\">".__('Start', $dom)."</a> / $cpath";
    }
    return $cpath;
}