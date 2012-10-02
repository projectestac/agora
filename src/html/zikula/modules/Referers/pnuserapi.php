<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Referers
 */

/**
 * get all refering urls
 *
 * @author The Zikula development team
 * @param    int     $args['startnum']   (optional) first item to return
 * @param    int     $args['numitems']   (optional) number if items to return
 * @return   array   array of items, or false on failure
 */
function referers_userapi_getall($args)
{
    $dom = ZLanguage::getModuleDomain('Referers');
    // Optional arguments.
    if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
        $args['startnum'] = 1;
    }
    if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
        $args['numitems'] = -1;
    }

    $items = array();

    // Security check
    if (!SecurityUtil::checkPermission('Referers::', '::', ACCESS_OVERVIEW)) {
        return $items;
    }

    // Get database setup
    $pntable = pnDBGetTables();
    $column = $pntable['referer_column'];

    // work out the sort order for the query
    if ($args['sortby'] != 'pn_url') {
        $args['sortby'] = 'pn_frequency';
    }
    if ($args['sortby'] == 'pn_url'){
        $sort = "ORDER BY $column[url] ";
    } else {
        $sort = "ORDER BY $column[frequency] DESC ";
    }

    // get the total number of referring urls
    $totalfreq = pnModAPIFunc('Referers', 'user', 'sumitems');

    // Get items
    $data = DBUtil::selectObjectArray ('referer', '', $sort, $args['startnum']-1, $args['numitems']);
    if ($data === false) {
        return LogUtil::registerError (__('Error! Could not load items.', $dom));
    }

    // process items
    $items = array();
    foreach ($data as $k=>$v) {
        $urls = str_replace('&', ' &', $v['url']);
        $urls = str_replace('/', '/ ', $urls);
        $items[] = array('url' => $v['url'], 'urls' => $urls, 'freq' => $v['frequency'], 'percent' => round(($v['frequency'] / $totalfreq * 100), 2));
    }

    return $items;
}

/**
 * log the frequency of a referring url
 *
 * This is a new referer function for Zikula Instead of logging each URL
 * as its coming in, it logs the frequency of that URL. This function was written
 * first by Michael Yarbrough [gte649i@prism.gatech.edu]. Bjorn Sodergren re-wrote
 * it to what it is now and added more complete/descriptive comments.
 *
 * @todo rewrite using DBUtil
 * @author Timothy Litwiller
 * @author Bjorn Sodergren
 * @author Michael Yarbrough
 */
function referers_userapi_collect()
{
    $dom = ZLanguage::getModuleDomain('Referers');
    $modvars = pnModGetVar('Referers');

    // check if collection is activated
    if (!$modvars['httpref']) {
        return;
    }

    // Here we set up some variables for the rest of the script.
    $httpreferer = pnServerGetVar('HTTP_REFERER');
    $httphost = pnServerGetVar('HTTP_HOST');

    /***
     * This is the first thing we need to check. what this does is see if
     * HTTP_HOST is anywhere in HTTP_REFERER. This is so we dont log hits coming
     * from our own domain.
     */
    if (!ereg("$httphost", $httpreferer)) {
        /***
         * If $httpreferer is not set, set $httpreferer to value "bookmark"
         * This is to show how many people have this bookmarked or type in the
         * URL into the browser. also so we dont have empty referers.
         */
        if ($httpreferer == '') {
            $httpreferer = 'bookmark';
        }
        $httpreferer = trim($httpreferer);
        $writeref = true;
        $refex = $modvars['httprefexcluded'];
        if (!empty($refex)) {
            $refexclusion = explode(' ', $refex);
            $count = count($refexclusion);
            $eregicondition = "((";
            for ($i = 0; $i < $count; $i++) {
                if ($i != $count-1) {
                    $eregicondition .= $refexclusion[$i] . ")|(";
                } else {
                    $eregicondition .= $refexclusion[$i] . "))";
                }
            }

            if (eregi($eregicondition, $httpreferer)) {
                $writeref = false;
            }
        }

        if ($writeref == true) {
            $pntable = pnDBGetTables();
            // grab a reference to our table column defs for easier reading below
            $column = $pntable['referer_column'];

            /***
             * Lets select from the table where we have $httpreferer (whether it be
             * a valid referer or 'bookmark'. if we return 1 row, that means someones
             * used this referer before and update the set appropriatly.
             *
             * If we dont have any rows (it returns 0), we have a new entry in the
             * table, update accordingly.
             *
             * After we figure out what SQL statement we are using, lets perform the
             * query and we're done !
	     */
            $where = "$column[url] = '" . DataUtil::formatForStore($httpreferer) . "'";
	    $count = DBUtil::selectObjectCount ('referer', $where, 'rid');

            if ($count == 1 ) {
                $res = DBUtil::incrementObjectFieldByID ('referer', 'frequency', $httpreferer, 'url');
		if ($res === false) {
                    return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
            } else {
                /***
                 * "auto-increment" isn't portable so we have to use the standard
                 * interface for grabbing sequence numbers.  The underlying
                 * implementation handles the correct method for the RDBMS we are
                 * using.
                 */
                $obj = array();
                $obj['url']       = $httpreferer;
                $obj['frequency'] = 1;
                $res = DBUtil::insertObject ($obj, 'referer', 'rid');
		if ($res === false) {
                    return LogUtil::registerError (_INSERTFAILED);
		}
            }
        }
    }
}

/**
 * Count the number of unique referers in the database
 *
 * @returns integer number of links in the database
 */
function referers_userapi_countitems()
{
    return DBUtil::selectObjectCount('referer');
}

/**
 * Count the number of referers in the database
 *
 * @returns integer number of links in the database
 */
function referers_userapi_sumitems()
{
    return DBUtil::selectObjectSum('referer', 'frequency');
}
