<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminapi.php 44 2009-12-20 07:38:08Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */

/**
 * create a new FAQ
 *
 * @param    $args['question']      name of the item
 * @param    $args['answer']        number of the item
 * @param    $args['submittedby']   name of the submitter (if anonymous) (optional)
 * @param    $args['submittedbyid'] id of the submitter (if logged in) (optional)
 * @param    $args['answeredbyid']  id of the answerer (optional)
 * @return   mixed                  FAQ ID on success, false on failure
 */
function FAQ_adminapi_create($faq)
{
    // Security check
    if (!SecurityUtil::checkPermission('FAQ::', '::', ACCESS_COMMENT)) {
        return LogUtil::registerPermissionError();
    }

    // Argument check
    if (!isset($faq['question']) ||
        !isset($faq['answer'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('FAQ');

    // optional arguments
    if (!isset($faq['submittedby'])) {
        $faq['submittedby'] = '';
    }
    if (!isset($faq['submittedbyid'])) {
        $faq['submittedbyid'] = pnUserGetVar('uid');
    }
    if (!isset($faq['answeredbyid'])) {
        if (strlen($faq['answer']) > 0) {
            $faq['answeredbyid'] = $faq['submittedbyid'];
        } else {
            $faq['answeredbyid'] = '';
        }
    }

    // define the permalink title if not present
    if (!isset($faq['urltitle']) || empty($faq['urltitle'])) {
        $faq['urltitle'] = DataUtil::formatPermalink($faq['question']);
    }

    if (!DBUtil::insertObject($faq, 'faqanswer', 'faqid')) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }

    // Let any hooks know that we have created a new item
    pnModCallHooks('item', 'create', $faq['faqid'], array('module' => 'FAQ'));

    // Return the id of the newly created item to the calling process
    return $faq['faqid'];
}

/**
 * delete an faq
 *
 * @param    $args['faqid']   ID of the item
 * @return   bool           true on success, false on failure
 */
function FAQ_adminapi_delete($args)
{
    // Argument check
    if (!isset($args['faqid']) || !is_numeric($args['faqid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('FAQ');

    // Get the current faq
    $item = pnModAPIFunc('FAQ', 'user', 'get', array('faqid' => $args['faqid']));

    if (!$item) {
        return LogUtil::registerError(__('No such item found.', $dom));
    }

    // Security check
    if (!SecurityUtil::checkPermission( 'FAQ::', "$args[faqid]::", ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::deleteObjectByID('faqanswer', $args['faqid'], 'faqid')) {
        return LogUtil::registerError(__('Error! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item
    pnModCallHooks('item', 'delete', $args['faqid'], array('module' => 'FAQ'));

    // The item has been deleted, so we clear all cached pages of this item.
    $render = & pnRender::getInstance('FAQ');
    $render->clear_cache(null, $args['faqid']);

    return true;
}

/**
 * update an item
 *
 * @param    $args['faqid']         the ID of the item
 * @param    $args['question']      the new name of the item
 * @param    $args['answer']        the new number of the item
 * @param    $args['submittedby']   name of the submitter (if anonymous)
 * @param    $args['submittedbyid'] id of the submitter (if logged in)
 * @param    $args['answeredbyid']  id of the answerer (optional)
 * @return   bool             true on success, false on failure
 */
function FAQ_adminapi_update($faq)
{
    // Argument check
    if (!isset($faq['question']) ||
        !isset($faq['answer']) ||
        !isset($faq['faqid']) || !is_numeric($faq['faqid'])) {
        return LogUtil::registerArgsError();
    }

    $dom = ZLanguage::getModuleDomain('FAQ');

    // optional arguments
    if (!isset($faq['answeredbyid'])) {
        if (strlen($faq['answer']) > 0) {
            $faq['answeredbyid'] = pnUserGetVar('uid');
        } else {
            $faq['answeredbyid'] = '';
        }
    }

    // define the permalink title if not present
    if (!isset($faq['urltitle']) || empty($faq['urltitle'])) {
        $faq['urltitle'] = DataUtil::formatPermalink($faq['question']);
    }

    // Get the current faq
    $item = pnModAPIFunc('FAQ', 'user', 'get', array('faqid' => $faq['faqid']));

    if (!$item) {
        return LogUtil::registerError(__('No such item found.', $dom));
    }

    // Security check.
    if (!SecurityUtil::checkPermission( 'FAQ::', "$faq[faqid]::", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    if (!DBUtil::updateObject($faq, 'faqanswer', '', 'faqid')) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    // The item has been modified, so we clear all cached pages of this item.
    $render = & pnRender::getInstance('FAQ');
    $render->clear_cache(null, $faq['faqid']);

    // Let any hooks know that we have updated an item
    pnModCallHooks('item', 'update', $faq['faqid'], array('module' => 'FAQ'));

    return true;
}

/**
 * Purge the permalink fields in the FAQ table
 * @author Mateo Tibaquira
 * @return bool true on success, false on failure
 */
function FAQ_adminapi_purgepermalinks($args)
{
    // Security check
    if (!SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // disable categorization to do this (if enabled)
    $catenabled = pnModGetVar('FAQ', 'enablecategorization');
    if ($catenabled) {
        pnModSetVar('FAQ', 'enablecategorization', false);
        pnModDBInfoLoad('FAQ', 'FAQ', true);
    }

    // get all the ID and permalink of the table
    $data = DBUtil::selectObjectArray('faqanswer', '', '', -1, -1, 'faqid', null, null, array('faqid', 'urltitle'));

    // loop the data searching for non equal permalinks
    $perma = '';
    foreach (array_keys($data) as $faqid) {
        $perma = strtolower(DataUtil::formatPermalink($data[$faqid]['urltitle']));
        if ($data[$faqid]['urltitle'] != $perma) {
            $data[$faqid]['urltitle'] = $perma;
        } else {
            unset($data[$faqid]);
        }
    }

    // restore the categorization if was enabled
    if ($catenabled) {
        pnModSetVar('FAQ', 'enablecategorization', true);
    }

    if (empty($data)) {
        return true;
    // store the modified permalinks
    } elseif (DBUtil::updateObjectArray($data, 'faqanswer', 'faqid')) {
        // Let the calling process know that we have finished successfully
        return true;
    } else {
        return false;
    }
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function FAQ_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('FAQ');

    $links = array();

    if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_READ)) {
        $links[] = array('url' => pnModURL('FAQ', 'admin', 'view'),
                         'text' => __('View FAQ list', $dom));
    }
    if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADD)) {
        $links[] = array('url' => pnModURL('FAQ', 'admin', 'new'),
                         'text' => __('Create a FAQ', $dom));
    }
    if (SecurityUtil::checkPermission('FAQ::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('FAQ', 'admin', 'view', array('purge' => 1)),
                         'text' => __('Purge PermaLinks', $dom));

        $links[] = array('url' => pnModURL('FAQ', 'admin', 'modifyconfig'),
                         'text' => __('Settings', $dom));
    }

    return $links;
}
