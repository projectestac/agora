<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

/**
 * process user input and form a WHERE clause
 *
 * @access private
 * @return string SQL where clause
 */
function _quotes_userapi_process_args(&$args)
{
    // optional arguments.
    if (!isset($args['startnum']) || !is_numeric($args['startnum'])) {
        $args['startnum'] = -1;
    }
    if (!isset($args['numitems']) || !is_numeric($args['numitems'])) {
        $args['numitems'] = -1;
    }
    if (!isset($args['author'])) {
        $args['author'] = null;
    }
    if (!isset($args['keyword'])) {
        $args['keyword'] = null;
    }
    if (!isset($args['category'])) {
        $args['category'] = null;
    }
    if (!isset($args['catFilter']) || !is_numeric($args['catFilter'])) {
        $args['catFilter'] = array();
    }
    if (!isset($args['rootCat'])) {
        $args['rootCat'] = 0;
    }

    // build the where clause
    $wheres = array();
    if ($args['author']) {
        $wheres[] = "pn_author = '".DataUtil::formatForStore($args['author'])."'";
    }

    if ($args['category']){
        if (is_array($args['category'])) {
            $args['catFilter'] = $args['category'];
        } else {
            $args['catFilter'][] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Quotes');
    }

    if ($args['keyword']) {
        $wheres[] = "pn_quote LIKE '%".DataUtil::formatForStore($args['keyword'])."%'";
    }

    $args['where'] = implode (' AND ', $wheres);

    return $args['where'];
}

/**
 * Get all Quotes
 * @author The Zikula Development Team
 * @author Greg Allan
 * @return array array containing quote id, quote, author
 */
function Quotes_userapi_getall($args)
{
    // security check
    if (!SecurityUtil::checkPermission('Quotes::', '::', ACCESS_READ)) {
        return array();
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    $where = _quotes_userapi_process_args($args);
    $sort  = 'ORDER BY qid DESC';

    // define the permissions filter to use
    $permFilter = array();
    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'Quotes',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'author',
                          'instance_middle'  => '',
                          'instance_right'   => 'qid',
                          'level'            => ACCESS_READ);

    $args['catFilter'] = array();
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) { 
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
        $args['catFilter']['__META__'] = array('module' => 'Quotes');
    }

    // get the object array from the db
    $objArray = DBUtil::selectObjectArray('quotes', $where, $sort, $args['startnum']-1, $args['numitems'], '', $permFilter, $args['catFilter']);

    // check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($objArray === false) {
        return LogUtil::registerError(__('Error! Could not load the quotes.', $dom));
    }

    // need to do this here as the category expansion code can't know the
    // root category which we need to build the relative path component
    if ($objArray && isset($args['catregistry']) && $args['catregistry']) {
        ObjectUtil::postProcessExpandedObjectArrayCategories($objArray, $args['catregistry']);
    }

    // return the items
    return $objArray;
}

/**
 * Get Quote
 * @author The Zikula Development Team
 * @author Greg Allan
 * @param 'args['qid']' quote id
 * @return array item array
 */
function Quotes_userapi_get($args)
{
    // argument check
    if (!isset($args['qid']) || !is_numeric($args['qid'])) {
        return LogUtil::registerArgsError();
    }

    // define the permissions filter to use
    $permFilter = array();
    $permFilter[] = array('realm' => 0,
                          'component_left'   => 'Quotes',
                          'component_middle' => '',
                          'component_right'  => '',
                          'instance_left'    => 'author',
                          'instance_middle'  => '',
                          'instance_right'   => 'qid',
                          'level'            => ACCESS_READ);

    // get the quote
    $quote = DBUtil::selectObjectByID('quotes', $args['qid'], 'qid', null, $permFilter);

    // return the fetched object or false
    return ($quote ? $quote : false);
}

/**
 * Count Quotes
 * @author The Zikula Development Team
 * @author Greg Allan
 * @return int count of items
 */
function Quotes_userapi_countitems($args)
{
    // optional arguments.
    if (isset($args['category']) && !empty($args['category'])){
        if (is_array($args['category'])) { 
            $args['catFilter'] = $args['category'];
        } elseif (isset($args['property'])) {
            $property = $args['property'];
            $args['catFilter'][$property] = $args['category'];
        }
    }

    if (!isset($args['catFilter'])) {
        $args['catFilter'] = array();
    }

    $where = _quotes_userapi_process_args($args);

    return DBUtil::selectObjectCount('quotes', $where, 'qid', false, $args['catFilter']);
}
