<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       http://code.zikula.org/formicula
 * @version    $Id: pnadminapi.php 164 2009-11-10 19:15:19Z herr.vorragend $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage formicula
 */

/**
 * getContact
 * reads a single contact by id
 *
 *@param cid int contact id
 *@returns array with contact information
 */
function formicula_adminapi_getContact($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    if (!isset($args['cid']) || empty($args['cid'])) {
        return LogUtil::registerArgsError();
    }

    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!SecurityUtil::checkPermission('formicula::', ":$cid:", ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $contact = DBUtil::selectObjectByID('formcontacts', $args['cid'], 'cid');
    return $contact;
}

/**
 * readContacts
 * reads the contact list and returns it as array
 *
 *@param none
 *@returns array with contact information
 */
function formicula_adminapi_readContacts()
{
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!SecurityUtil::checkPermission("formicula::", "::", ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    $contacts = array();
    $pntable =&pnDBGetTables();
    $contactscolumn = &$pntable['formcontacts_column'];
    $orderby = "ORDER BY $contactscolumn[cid]";

    $contacts = DBUtil::selectObjectArray('formcontacts', '', $orderby);

    // Return the contacts
    return $contacts;
}

/**
 * createContact
 * creates a new contact
 *
 *@param name  string name of the contact
 *@param email string email address
 *@param public int 0/1 to indicate if address is for public use
 *@param sname string use this as senders name in confirmation mails
 *@param semail string use this as senders email address in confirmation mails
 *@param ssubject string use this as subject in confirmation mails
 *@returns boolean
 */
function formicula_adminapi_createContact($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    if (!defined('_PNINSTALLVER') && !SecurityUtil::checkPermission('formicula::', "::", ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    if ((!isset($args['name'])) || (!isset($args['email']))) {
        return LogUtil::registerArgsError();
    }
    if ((!isset($args['public'])) || empty($args['public'])) {
        $args['public'] = 0;
    }

    $obj = DBUtil::insertObject($args, 'formcontacts', 'cid');
    if($obj == false) {
        return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
    }
    pnModCallHooks('item', 'create', $obj['cid']);
    return $obj['cid'];
}

/**
 * deleteContact
 * deletes a contact.
 *
 *@param cid int contact id
 *@returns boolean
 */
function formicula_adminapi_deleteContact($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    if ((!isset($args['cid'])) || empty($args['cid'])) {
        return LogUtil::registerArgsError();
    }

    // Security check
    if (!SecurityUtil::checkPermission('formicula::', ':' . (int)$args['cid'] . ':', ACCESS_DELETE)) {
        return LogUtil::registerPermissionError();
    }

    $res = DBUtil::deleteObjectByID ('formcontacts', (int)$args['cid'], 'cid');
    if($res==false) {
        return LogUtil::registerError(__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted a contact
    pnModCallHooks('item', 'delete', $args['cid']);

    // Let the calling process know that we have finished successfully
    return true;
}


/**
 * updateContact
 * updates a contact
 *
 *@param cid int contact id
 *@param name string name of the contact
 *@param email string email address
 *@returns boolean
 */
function formicula_adminapi_updateContact($args)
{
    $dom = ZLanguage::getModuleDomain('formicula');
    if ((!isset($args['cid'])) ||
        (!isset($args['name'])) ||
        (!isset($args['email']) ||
        (empty($args['name'])) ||
        (empty($args['email'])) )) {
        return LogUtil::registerArgsError();
    }
    if ((!isset($args['public'])) || empty($args['public'])) {
        $args['public'] = 0;
    }

    // Security check
    if (!SecurityUtil::checkPermission('formicula::', ':' . $args['cid'] . ':', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    $res = DBUtil::updateObject($args, 'formcontacts', '', 'cid');
    if($res == false) {
        return LogUtil::registerError(_MH__('Error! Update attempt failed.', $dom));
    }
    pnModCallHooks('item', 'update', $args['cid']);
    return $args['cid'];
}

/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function formicula_adminapi_getlinks()
{
    $dom = ZLanguage::getModuleDomain('formicula');
    $links = array();
    if (SecurityUtil::checkPermission('formicula::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('formicula', 'admin', 'view'), 'text' => __('View contacts', $dom));
        $links[] = array('url' => pnModURL('formicula', 'admin', 'edit', array('cid' => -1)), 'text' => __('Add contact', $dom));
        $links[] = array('url' => pnModURL('formicula', 'admin', 'clearcache'), 'text' => __('Clear captcha image cache', $dom));
        $links[] = array('url' => pnModURL('formicula', 'admin', 'modifyconfig'), 'text' => __('Modify configuration', $dom));
    }
    return $links;
}
