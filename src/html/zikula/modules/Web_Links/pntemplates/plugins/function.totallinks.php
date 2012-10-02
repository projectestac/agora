<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.totallinks.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

function smarty_function_totallinks($params, &$smarty)
{
    extract($params);
    unset($params);

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $dateDB = (date("d-M-Y", $selectdate));

    $newlinkdb = date("Y-m-d", $selectdate);
    $column = &$pntable['links_links_column'];
    $column2 = &$pntable['links_categories_column'];
    //$result =& $dbconn->Execute("SELECT COUNT(*) FROM $pntable[links_links] WHERE $column[date] LIKE '%".DataUtil::formatForStore($newlinkDB)."%'");
       $totallinks=0;
    $result =& $dbconn->Execute("SELECT $column[cat_id], $column2[title]
                            FROM $pntable[links_links], $pntable[links_categories]
                            WHERE $column[date] LIKE '%$newlinkdb%'
                            AND $column[cat_id]=$column2[cat_id]");

    if ($dbconn->ErrorNo() != 0) {
        error_log("DB Error: " . $dbconn->ErrorMsg());
        return false;
    }

    while(list($cid, $title)=$result->fields) {
           $result->MoveNext();
           if (pnSecAuthAction(0, "Web Links::Category", "$title::$cid", ACCESS_READ)) {
               $totallinks++;
           }
    }

    $result->Close();

    return $totallinks;
}