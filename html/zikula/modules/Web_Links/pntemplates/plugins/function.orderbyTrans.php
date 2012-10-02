<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: function.orderbyTrans.php 40 2009-01-09 14:13:23Z herr.vorragend $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
 
function smarty_function_orderbyTrans($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    extract($params);
    unset($params);

    if ($orderby == "hitsA") {
    $orderbyTrans = "".__('Popularity (from fewest hits to most hits)', $dom)."";
    }
    if ($orderby == "hitsD") {
    $orderbyTrans = "".__('Popularity (from most hits to fewest hits)', $dom)."";
    }
    if ($orderby == "titleA") {
    $orderbyTrans = "".__('Title (A to Z)', $dom)."";
    }
    if ($orderby == "titleD") {
    $orderbyTrans = "".__('Title (Z to A)', $dom)."";
    }
    if ($orderby == "dateA") {
    $orderbyTrans = "".__('Date (oldest links listed first)', $dom)."";
    }
    if ($orderby == "dateD") {
    $orderbyTrans = "".__('Date (newest links listed first)', $dom)."";
    }
    if ($orderby == "ratingA") {
    $orderbyTrans = ""._WL_RATING1."";
    }
    if ($orderby == "ratingD") {
    $orderbyTrans = ""._WL_RATING2."";
    }

    return $orderbyTrans;
}