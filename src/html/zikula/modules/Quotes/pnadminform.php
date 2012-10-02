<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadminform.php 358 2009-11-11 13:46:21Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Quotes
*/

/**
 * Create a new quote
 * @author The Zikula Development Team
 * @param 'qquote' quote text
 * @param 'qauthor' quote author
 * @return bool true if create success, false otherwise
 */
function Quotes_adminform_create($args)
{
    // confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Quotes', 'admin', 'main'));
    }

    // get parameters from whatever input we need.
    $quote = FormUtil::getPassedValue('quote', isset($args['quote']) ? $args['quote'] : null, 'POST');

    $dom = ZLanguage::getModuleDomain('Quotes');

    // notable by its absence there is no security check here.
    // create the quote
    $qid = pnModAPIFunc('Quotes', 'admin', 'create', $quote);
    if ($qid != false) {
        // success
        LogUtil::registerStatus(__('Done! Quote created.', $dom));
    }

    return pnRedirect(pnModURL('Quotes', 'admin', 'view'));
}

/**
 * Update quote
 *
 * Takes info from edit form and passes to API
 * @author The Zikula Development Team
 * @param 'qid' Quote id to delete
 * @param 'qauther' Author of quote to delete
 * @param 'confirm' Delete confirmation
 * @return mixed HTML string if confirm is null, true otherwise
 */
function Quotes_adminform_update($args)
{
    // confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Quotes', 'admin', 'view'));
    }

    // get parameters from whatever input we need.
    $quote = FormUtil::getPassedValue('quote', isset($args['quote']) ? $args['quote'] : null, 'POST');

    // check to see if we have been passed $objectid, the generic item identifier.
    if (!empty($quote['objectid'])) {
        $quote['qid'] = $quote['objectid'];
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // notable by its absence there is no security check here.
    // update the quote
    if (pnModAPIFunc('Quotes', 'admin', 'update', $quote)) {
        // success
        LogUtil::registerStatus(__('Done! Quote updated.', $dom));
    }

    // this function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Quotes', 'admin', 'view'));
}

/**
 * Update Quotes Config
 * @author The Zikula Development Team
 * @return string HTML string
 */
function Quotes_adminform_updateconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('Quotes::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // confirm authorisation code.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('Quotes', 'admin', 'view'));
    }

    $dom = ZLanguage::getModuleDomain('Quotes');

    // update module variables.
    $itemsperpage = FormUtil::getPassedValue('itemsperpage', 25, 'POST');
    pnModSetVar('Quotes', 'itemsperpage', $itemsperpage);

    $enablecategorization = (bool)FormUtil::getPassedValue('enablecategorization', false, 'POST');
    pnModSetVar('Quotes', 'enablecategorization', $enablecategorization);

    // let any other modules know that the modules configuration has been updated
    pnModCallHooks('module', 'updateconfig', 'Quotes', array('module' => 'Quotes'));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus(__('Done! Module configuration updated.', $dom));

    // this function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('Quotes', 'admin', 'view'));
}
