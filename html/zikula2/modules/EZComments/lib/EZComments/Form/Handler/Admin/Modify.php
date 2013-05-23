<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Form_Handler_Admin_Modify extends Zikula_Form_AbstractHandler
{

    var $id;

    function initialize(Zikula_Form_View $view)
    {
        $this->id = (int) FormUtil::getPassedValue('id', -1, 'GETPOST');
        $objectid = FormUtil::getPassedValue('objectid', '', 'GETPOST');
        $redirect = base64_decode(FormUtil::getPassedValue('redirect', '', 'GETPOST'));

        $view->caching = false;

        $comment = ModUtil::apiFunc('EZComments', 'user', 'get', array('id' => $this->id));
        if ($comment == false || !is_array($comment)) {
            return LogUtil::registerError($this->__('No such comment found.'), ModUtil::url('EZComments', 'admin', 'main'));
        }

        // assign the status flags
        $statuslevels = array(array('text' => $this->__('Approved'), 'value' => 0),
            array('text' => $this->__('Pending'), 'value' => 1),
            array('text' => $this->__('Rejected'), 'value' => 2));

        $view->assign('statuslevels', $statuslevels);

        $view->assign('redirect', (isset($redirect) && !empty($redirect)) ? true : false);

        // finally asign the comment information
        $view->assign($comment);

        return true;
    }

    function handleCommand(Zikula_Form_View $view, &$args)
    {
        // Security check
        $securityCheck = ModUtil::apiFunc('EZComments', 'user', 'checkPermission',
                        array('module' => '',
                            'objectid' => '',
                            'commentid' => $this->id,
                            'level' => ACCESS_EDIT));
        if (!$securityCheck) {
            return LogUtil::registerPermissionError(ModUtil::url('EZComments', 'admin', 'main'));
        }

        $ok = $view->isValid();
        $data = $view->getValues();
        $comment = ModUtil::apiFunc('EZComments', 'user', 'get', array('id' => $this->id));

        switch ($args['commandName'])
        {
            case 'cancel':
                // nothing to do
                break;

            case 'delete':
                // delete the comment
                // The API function is called.
                // note: the api call is a little different here since we'll really calling a hook function that will
                // normally be executed when a module is deleted. The extra nesting of the modname inside an extrainfo
                // array reflects this
                if (ModUtil::apiFunc('EZComments', 'admin', 'delete', array('id' => $this->id))) {
                    // Success
                    LogUtil::registerStatus($this->__('Done! Comment deleted.'));
                }
                break;

            case 'submit':
                if (!empty($comment['anonname'])) {
                    // poster is anonymous
                    // check anon fields
                    if (empty($data['ezcomments_anonname'])) {
                        $ifield = $view->getPluginById('ezcomments_anonname');
                        $ifield->setError(DataUtil::formatForDisplay($this->__('Name for anonymous user is missing.')));
                        $ok = false;
                    }
                    // anonmail must be valid - really necessary if an admin changes this?
                    if (empty($data['ezcomments_anonmail']) || !System::varValidate($data['ezcomments_anonmail'], 'email')) {
                        $ifield = $view->getPluginById('ezcomments_anonmail');
                        $ifield->setError(DataUtil::formatForDisplay($this->__('Email address of anonymous user is missing or invalid.')));
                        $ok = false;
                    }
                    // anonwebsite must be valid
                    if (!empty($data['ezcomments_anonwebsite']) && !System::varValidate($data['ezcomments_anonmail'], 'url')) {
                        $ifield = $view->getPluginById('ezcomments_anonwebsite');
                        $ifield->setError(DataUtil::formatForDisplay($this->__('Website of anonymous user is invalid.')));
                        $ok = false;
                    }
                } else {
                    // user has not posted as anonymous, continue normally
                }

                // no check on ezcomments_subject as this may be empty

                if (empty($data['ezcomments_comment'])) {
                    $ifield = $view->getPluginById('ezcomments_comment');
                    $ifield->setError(DataUtil::formatForDisplay($this->__('Error! The comment contains no text.')));
                    $ok = false;
                }

                if (!$ok) {
                    return false;
                }

                // Call the API to update the item.
                if (ModUtil::apiFunc('EZComments', 'admin', 'update',
                                array('id' => $this->id,
                                    'subject' => $data['ezcomments_subject'],
                                    'comment' => $data['ezcomments_comment'],
                                    'status' => (int) $data['ezcomments_status'],
                                    'anonname' => $data['ezcomments_anonname'],
                                    'anonmail' => $data['ezcomments_anonmail'],
                                    'anonwebsite' => $data['ezcomments_anonwebsite']))) {
                    // Success
                    LogUtil::registerStatus($this->__('Done! Comment updated.'));
                }
                break;
        }

        if ($data['ezcomments_sendmeback'] == true) {
            return System::redirect($comment['url'] . "#comments_{$comment['modname']}_{$comment['objectid']}");
        }

        return System::redirect(ModUtil::url('EZComments', 'admin', 'main'));
    }

}
