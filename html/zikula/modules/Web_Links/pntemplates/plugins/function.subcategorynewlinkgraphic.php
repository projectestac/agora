<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.subcategorynewlinkgraphic.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
 
function smarty_function_subcategorynewlinkgraphic($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if (!isset($scatid) || !is_numeric($scatid)){
        pnSessionSetVar('errormsg', __('Error! Could not do what you wanted. Please check your input.', $dom));
        return false;
    }

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    $column = &$pntable['links_links_column'];

    $query = "SELECT $column[date]
              FROM $pntable[links_links]
              WHERE $column[cat_id]= '".(int)DataUtil::formatForStore($scatid)."'
              ORDER BY $column[date] DESC";
    $newresult = $dbconn->SelectLimit($query, 1);
    list($time)=$newresult->fields;

    if (!$time) {
        return;
    } else {
        echo "&nbsp;";
        ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $time, $datetime);

        $datenow = $datetime[3]."-".$datetime[2]."-".$datetime[1];

        $startdate = time();
        $count = 0;

        while ($count <= 7) {
            $daysold = ml_ftime("".__('%d-%m-%Y', $dom)."", $startdate);

            if ("$daysold" == "$datenow") {
                if ($count<=1) {
            echo "<img src=\"modules/Web_Links/pnimages/newred.gif\" width=\"34\" height=\"15\" alt=\"".__('New today', $dom)."\" />";
            }
                if ($count<=3 && $count>1) {
            echo "<img src=\"modules/Web_Links/pnimages/newgreen.gif\" width=\"34\" height=\"15\" alt=\"".__('New during last 3 days', $dom)."\" />";
            }
                if ($count<=7 && $count>3) {
            echo "<img src=\"modules/Web_Links/pnimages/newblue.gif\" width=\"34\" height=\"15\" alt=\"".__('New this week', $dom)."\" />";
            }
        }
            $count++;
            $startdate = (time()-(86400 * $count));
        }
        return;
    }
}