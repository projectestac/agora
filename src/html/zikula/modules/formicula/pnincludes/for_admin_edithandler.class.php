<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       http://code.zikula.org/formicula
 * @version    $Id: pnversion.php 131 2008-12-28 13:34:07Z Landseer $
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage formicula
 */

class Formicula_admin_edithandler
{
    var $cid;

    function initialize(&$pnRender)
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        $this->cid = (int)FormUtil::getPassedValue('cid', -1, 'GETPOST');

        $pnRender->caching = false;
        $pnRender->add_core_data();

        if(($this->cid==-1) ) {
            $mode = 'create';
            $contact = array('cid'   => -1);
        } else {
            $mode = 'edit';
            $contact = pnModAPIFunc('formicula',
                                    'admin',
                                    'getContact',
                                    array('cid' => $this->cid));
            if ($contact == false) {
                return LogUtil::registerError(__('Unknown Contact', $dom), null, pnModURL('formicula', 'admin', 'main'));
            }
        }

        $pnRender->assign('mode', $mode);
        $pnRender->assign('contact', $contact);

        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        $dom = ZLanguage::getModuleDomain('formicula');
        // Security check
        if (!SecurityUtil::checkPermission('formicula::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError(pnModURL('formicula', 'admin', 'main'));
        }
        if ($args['commandName'] == 'submit') {
            $ok = $pnRender->pnFormIsValid();

            $data = $pnRender->pnFormGetValues();
            $data['cid'] = $this->cid;
            $data['public'] = (int)$data['public'];

            // copy cname to name for updating the db
            $data['name'] = $data['cname'];

            // no deletion, further checks needed
            if(empty($data['cname'])) {
                $ifield = & $pnRender->pnFormGetPluginById('cname');
                $ifield->setError(DataUtil::formatForDisplay(__('Error! No contact name', $dom)));
                $ok = false;
            }
            if(empty($data['email']) || !pnVarValidate($data['email'], 'email')) {
                $ifield = & $pnRender->pnFormGetPluginById('email');
                $ifield->setError(DataUtil::formatForDisplay(__('Error! No or incorrect email address supplied', $dom)));
                $ok = false;
            }
            if(!empty($data['semail']) && !pnVarValidate($data['semail'], 'email')) {
                $ifield = & $pnRender->pnFormGetPluginById('semail');
                $ifield->setError(DataUtil::formatForDisplay(__('Error! Incorrect email address supplied', $dom)));
                $ok = false;
            }

            if(!$ok) {
                return false;
            }

            // The API function is called
            if($data['cid'] == -1) {
                if(pnModAPIFunc('formicula', 'admin', 'createContact', $data) <> false) {
                    // Success
                    LogUtil::registerStatus(__('Contact created', $dom));
                } else {
                    LogUtil::registerError(__('Error creating contact!', $dom));
                }
            } else {
                if(pnModAPIFunc('formicula', 'admin', 'updateContact', $data) <> false) {
                    // Success
                    LogUtil::registerStatus(__('Contact info has been updated', $dom));
                } else {
                    LogUtil::registerError(__('Error updating contact!', $dom));
                }
            }

        }
        return pnRedirect(pnModURL('formicula', 'admin', 'main'));
    }

}
