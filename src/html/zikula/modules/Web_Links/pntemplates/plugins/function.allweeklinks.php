<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.allweeklinks.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

function smarty_function_allweeklinks($params, &$smarty)
{
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $column2 = &$pntable['links_categories_column'];

    $counter = 0;
    $allweeklinks = 0;
    while ($counter <= 7-1){
        $newlinkdayraw = (time()-(86400 * $counter));
        $newlinkday = date("d-M-Y", $newlinkdayraw);
        $newlinkrvview = date("F d, Y", $newlinkdayraw);
        $newlinkdb = Date("Y-m-d", $newlinkdayraw);
        $totallinks = 0;

        $sql = "SELECT $column[cat_id]
                FROM $pntable[links_links]
                WHERE $column[date] LIKE '%$newlinkdb%'
                AND $column[cat_id]=$column2[cat_id]";

        $result =& $dbconn->Execute($sql);

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
        $counter++;
        $allweeklinks = $allweeklinks + $totallinks;
    }

    $result->Close();

    return $allweeklinks;
}