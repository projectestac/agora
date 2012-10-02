<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

/**
 * Create Quote
 * @author Greg Allan
 * @author The Zikula Development Team
 * @param 'args['qquote']' quote text
 * @param 'args['qauthor']' quote author
 * @return id of quote if success, false otherwise
 */
function Quotes_adminapi_create($quote)
{
    // the argument associative array represents an object/row
    // argument check
    if (!isset($quote['quote']) || !isset($quote['author'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // security check
    if (!SecurityUtil::checkPermission('Quotes::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // insert the object and check the return value for error
    $res = DBUtil::insertObject($quote, 'quotes', 'qid');
    if (!$res) {
        return LogUtil::registerError(__('Error! Quote creation failed.', $dom));
    }

    // let any hooks know that we have created a new item.
    pnModCallHooks('item', 'create', $quote['qid'], array('module' => 'Quotes'));

    // return the id of the newly created item to the calling process
    return $quote['qid'];
}

/**
 * Delete Quote
 * @author Greg Allan
 * @author The Zikula Development Team
 * @param 'args['qid']' quote id
 * @return true if success, false otherwise
 */
function Quotes_adminapi_delete($args)
{
    // argument check
    if (!isset($args['qid']) || !is_numeric($args['qid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // get the existing quote
    $item = pnModAPIFunc('Quotes', 'user', 'get', array('qid' => $args['qid']));
    if (!$item) {
        return LogUtil::registerError(__('No such Quote found.', $dom));
    }

    // delete the quote and check the return value for error
    $res = DBUtil::deleteObjectByID('quotes', $args['qid'], 'qid');
    if (!$res) {
        return LogUtil::registerError(__('Error! Quote deletion failed.', $dom));
    }

    // delete any object category mappings for this item 
    ObjectUtil::deleteObjectCategories($item, 'quotes', 'qid');

    // let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $args['qid'], array('module' => 'Quotes'));

    // let the calling process know that we have finished successfully
    return true;
}

/**
 * Update Quote
 * @author Greg Allan
 * @author The Zikula Development Team
 * @param 'args['qid']' quote ID
 * @param 'args['qquote']' quote text
 * @param 'args['qauthor']' quote author
 * @return true if success, false otherwise
 */
function Quotes_adminapi_update($quote)
{
    // the argument associative array represents an object/row
    // argument check
    if (!isset($quote['qid']) || !isset($quote['quote']) || !isset($quote['author'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // get the existing quote
    $item = pnModAPIFunc('Quotes', 'user', 'get', array('qid' => $quote['qid']));
    if (!$item) {
        return LogUtil::registerError(__('No such Quote found.', $dom));
    }

    // security check(s)
    // check permissions for both the original and modified quotes
    if (!SecurityUtil::checkPermission('Quotes::', "$item[author]::$quote[qid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }
    if (!SecurityUtil::checkPermission('Quotes::', "$quote[author]::$quote[qid]", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // update the quote and check return value for error
    $res = DBUtil::updateObject($quote, 'quotes', '', 'qid');
    if (!$res) {
        return LogUtil::registerError(__('Error! Quote update failed.', $dom));
    }

    // new hook functions
    pnModCallHooks('item', 'update', $quote['qid'], array('module' => 'Quotes'));

    // let the calling process know that we have finished successfully
    return true;
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function Quotes_adminapi_getlinks()
{
    $links = array();

    $dom = ZLanguage::getModuleDomain('Quotes');

    if (SecurityUtil::checkPermission('Quotes::', '::', ACCESS_EDIT)) {
        $links[] = array('url' => pnModURL('Quotes', 'admin', 'view'), 'text' => __('View Quotes List', $dom));
    }
    if (SecurityUtil::checkPermission('Quotes::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('Quotes', 'admin', 'new'), 'text' => __('Create a Quote', $dom));
    }
    if (SecurityUtil::checkPermission('Quotes::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('Quotes', 'admin', 'modifyconfig'), 'text' => __('Settings', $dom));
    }

    return $links;
}
