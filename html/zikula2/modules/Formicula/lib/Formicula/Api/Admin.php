<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       https://github.com/landseer/Formicula
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage Formicula
 */

class Formicula_Api_Admin extends Zikula_AbstractApi
{
    /**
     * getContact
     * reads a single contact by id
     *
     *@param cid int contact id
     *@returns array with contact information
     */
    public function getContact($args)
    {
        if (!isset($args['cid']) || empty($args['cid'])) {
            return LogUtil::registerArgsError();
        }

        // Security check - important to do this as early on as possible to
        // avoid potential security holes or just too much wasted processing
        if (!SecurityUtil::checkPermission('Formicula::', ':'.(int)$args['cid'].':', ACCESS_EDIT)) {
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
    public function readContacts()
    {
        // Security check - important to do this as early on as possible to
        // avoid potential security holes or just too much wasted processing
        if (!SecurityUtil::checkPermission("Formicula::", "::", ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $contacts = array();
        $dbtables =DBUtil::getTables();
        $contactscolumn = $dbtables['formcontacts_column'];
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
    public function createContact($args)
    {
        if (!System::isInstalling() && !SecurityUtil::checkPermission('Formicula::', "::", ACCESS_ADD)) {
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
            return LogUtil::registerError(__('Error! Creation attempt failed.'));
        }
        $this->callHooks('item', 'create', $obj['cid']);
        return $obj['cid'];
    }

    /**
     * deleteContact
     * deletes a contact.
     *
     *@param cid int contact id
     *@returns boolean
     */
    public function deleteContact($args)
    {
        if ((!isset($args['cid'])) || empty($args['cid'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('Formicula::', ':' . (int)$args['cid'] . ':', ACCESS_DELETE)) {
            return LogUtil::registerPermissionError();
        }

        $res = DBUtil::deleteObjectByID ('formcontacts', (int)$args['cid'], 'cid');
        if($res==false) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let any hooks know that we have deleted a contact
        $this->callHooks('item', 'delete', $args['cid']);

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
    public function updateContact($args)
    {
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
        if (!SecurityUtil::checkPermission('Formicula::', ':' . (int)$args['cid'] . ':', ACCESS_EDIT)) {
            return LogUtil::registerPermissionError();
        }

        $res = DBUtil::updateObject($args, 'formcontacts', '', 'cid');
        if($res == false) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        $this->callHooks('item', 'update', $args['cid']);
        return $args['cid'];
    }


    /**
     * getFormSubmits
     * reads the form submit list and returns it as array
     *
     *@param none
     *@returns array with form submits information
     */
    public function getFormSubmits()
    {
        // Security check
        if (!SecurityUtil::checkPermission("Formicula::", "::", ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $formsubmits = array();
        $dbtables = DBUtil::getTables();
        $submitscolumn = $dbtables['formsubmits_column'];
        $orderby = "ORDER BY $submitscolumn[sid] DESC";
        $formsubmits = DBUtil::selectObjectArray('formsubmits', '', $orderby);

        // Return the contacts
        return $formsubmits;
    }

    /**
     * getFormSubmits
     * reads the form submit list and returns it as array
     *
     *@param none
     *@returns array with form submits information
     */
    public function getFormSubmit($args)
    {
        if (!isset($args['sid']) || empty($args['sid'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('Formicula::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $submit = DBUtil::selectObjectByID('formsubmits', $args['sid'], 'sid');
        return $submit;
    }

    /**
     * deleteSubmit
     * deletes a form submit.
     *
     *@param sid int contact id
     *@returns boolean
     */
    public function deleteSubmit($args)
    {
        if ((!isset($args['sid'])) || empty($args['sid'])) {
            return LogUtil::registerArgsError();
        }

        // Security check
        if (SecurityUtil::checkPermission('Formicula::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $res = DBUtil::deleteObjectByID ('formsubmits', (int)$args['sid'], 'sid');
        if($res==false) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // Let the calling process know that we have finished successfully
        return true;
    }


    /**
     * get available admin panel links
     *
     * @author Mark West
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();
        if (SecurityUtil::checkPermission('Formicula::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('Formicula', 'admin', 'view'), 'text' => $this->__('View contacts'), 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('Formicula', 'admin', 'edit', array('cid' => -1)), 'text' => $this->__('Add contact'), 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('Formicula', 'admin', 'viewsubmits'), 'text' => $this->__('View form submits'), 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('Formicula', 'admin', 'modifyconfig'),
                             'text' => $this->__('Modify configuration'), 
                             'class' => 'z-icon-es-config',
                             'links' => array(
                                             array('url' => ModUtil::url('Formicula', 'admin', 'modifyconfig'),
                                                   'text' => $this->__('Modify configuration')),
                                             array('url' => ModUtil::url('Formicula', 'admin', 'clearcache'),
                                                   'text' => $this->__('Clear captcha image cache'))
                                               ));
        }
        return $links;
    }
}