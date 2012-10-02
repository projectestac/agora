<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.newlinksbyday.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

function smarty_function_newlinksbyday($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if ( ($newlinkshowdays != "7" && $newlinkshowdays != "14" && $newlinkshowdays != "30") ||
        (!is_numeric($newlinkshowdays)) || (!isset($newlinkshowdays)) ) {
        $newlinkshowdays = "7";
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $column = &$pntable['links_links_column'];
    $column2 = &$pntable['links_categories_column'];

    $counter = 0;
    $allweeklinks = 0;
    while ($counter <= $newlinkshowdays-1) {
        $newlinkdayRaw = (time()-(86400 * $counter));
        $newlinkView = date(__('%M %d, %Y', $dom), $newlinkdayRaw);
        $newlinkDB = Date("Y-m-d", $newlinkdayRaw);
        $totallinks = 0;

        $result =& $dbconn->Execute("SELECT $column[cat_id]
                                    FROM $pntable[links_links]
                                    WHERE $column[date] LIKE '%$newlinkDB%'
                                    AND $column[cat_id]=$column2[cat_id]");
        while(list($cid, $title)=$result->fields) {
            $result->MoveNext();
            if (pnSecAuthAction(0, "Web Links::Category", "$title::$cid", ACCESS_READ)) {
                   $totallinks++;
            }
          }
        $counter++;
        $allweeklinks = $allweeklinks + $totallinks;
        echo "<a href=\"".pnVarPrepForDisplay(pnModURL('Web_Links', 'user', 'newlinksdate', array('selectdate' => $newlinkdayRaw)))."\">".pnVarPrepForDisplay($newlinkView)."</a>&nbsp;(".pnVarPrepForDisplay($totallinks).")<br />";
    }
    $counter = 0;
    $allmonthlinks = 0;
}