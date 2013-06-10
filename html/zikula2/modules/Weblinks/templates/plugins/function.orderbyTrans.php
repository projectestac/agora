<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_orderbyTrans($params, Zikula_View $view)
{
    if (!isset($params['orderby'])) {
        return;
    }
    $dom = ZLanguage::getModuleDomain('Weblinks');
    $orderby = implode('', $params['orderby']);

    if ($orderby == "hitsASC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Popularity (from fewest hits to most hits)', $dom));
    }
    if ($orderby == "hitsDESC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Popularity (from most hits to fewest hits)', $dom));
    }
    if ($orderby == "titleASC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Title (A to Z)', $dom));
    }
    if ($orderby == "titleDESC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Title (Z to A)', $dom));
    }
    if ($orderby == "dateASC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Date (oldest links listed first)', $dom));
    }
    if ($orderby == "dateDESC") {
        $orderbyTrans = DataUtil::formatForDisplay(__('Date (newest links listed first)', $dom));
    }

    return $orderbyTrans;
}