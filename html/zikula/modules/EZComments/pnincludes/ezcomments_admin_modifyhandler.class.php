<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: ezcomments_admin_modifyhandler.class.php 693 2010-05-25 07:11:17Z mateo $
 * @license See license.txt
 */

class EZComments_admin_modifyhandler
{
    var $id;

    function initialize(&$renderer)
    {
        $dom = ZLanguage::getModuleDomain('EZComments');

        $this->id = (int)FormUtil::getPassedValue('id', -1, 'GETPOST');
        $objectid =      FormUtil::getPassedValue('objectid', '', 'GETPOST');
        $redirect =      base64_decode(FormUtil::getPassedValue('redirect', '', 'GETPOST'));

        $renderer->caching = false;
        $renderer->add_core_data();

        $comment = pnModAPIFunc('EZComments', 'user', 'get', array('id' => $this->id));
        if ($comment == false || !is_array($comment)) {
            return LogUtil::registerError(__('No such comment found.', $dom), pnModURL('EZComments', 'admin', 'main'));
        }

        // assign the status flags
        $statuslevels = array( array('text' => __('Approved', $dom), 'value' => 0),
                               array('text' => __('Pending', $dom),  'value' => 1),
                               array('text' => __('Rejected', $dom), 'value' => 2));

        $renderer->assign('statuslevels', $statuslevels);

        $renderer->assign('redirect', (isset($redirect) && !empty($redirect)) ? true : false);

        // finally asign the comment information
        $renderer->assign($comment);

        return true;
    }


    function handleCommand(&$renderer, $args)
    {
        $dom = ZLanguage::getModuleDomain('EZComments');

        // Security check
        $securityCheck = pnModAPIFunc('EZComments', 'user', 'checkPermission',
                                      array('module'    => '',
                                            'objectid'  => '',
                                            'commentid' => $this->id,
                                            'level'     => ACCESS_EDIT));
        if (!$securityCheck) {
            return LogUtil::registerPermissionError(pnModURL('EZComments', 'admin', 'main'));
        }

        $ok      = $renderer->pnFormIsValid();
        $data    = $renderer->pnFormGetValues();
        $comment = pnModAPIFunc('EZComments', 'user', 'get', array('id' => $this->id));

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
                if (pnModAPIFunc('EZComments', 'admin', 'delete', array('id' => $this->id))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Comment deleted.', $dom));
                }
                break;

            case 'submit':
                if (!empty($comment['anonname'])) {
                    // poster is anonymous
                    // check anon fields
                    if (empty($data['ezcomments_anonname'])) {
                        $ifield = & $renderer->pnFormGetPluginById('ezcomments_anonname');
                        $ifield->setError(DataUtil::formatForDisplay(__('Name for anonymous user is missing.', $dom)));
                        $ok = false;
                    }
                    // anonmail must be valid - really necessary if an admin changes this?
                    if (empty($data['ezcomments_anonmail']) || !pnVarValidate($data['ezcomments_anonmail'], 'email') ) {
                        $ifield = & $renderer->pnFormGetPluginById('ezcomments_anonmail');
                        $ifield->setError(DataUtil::formatForDisplay(__('Email address of anonymous user is missing or invalid.', $dom)));
                        $ok = false;
                    }
                    // anonwebsite must be valid
                    if (!empty($data['ezcomments_anonwebsite'])  && !pnVarValidate($data['ezcomments_anonmail'], 'url')) {
                        $ifield = & $renderer->pnFormGetPluginById('ezcomments_anonwebsite');
                        $ifield->setError(DataUtil::formatForDisplay(__('Website of anonymous user is invalid.', $dom)));
                        $ok = false;
                    }
                } else {
                    // user has not posted as anonymous, continue normally
                }

                // no check on ezcomments_subject as this may be empty

                if (empty($data['ezcomments_comment'])) {
                    $ifield = & $renderer->pnFormGetPluginById('ezcomments_comment');
                    $ifield->setError(DataUtil::formatForDisplay(__('Error! The comment contains no text.', $dom)));
                    $ok = false;
                }

                if (!$ok) {
                    return false;
                }

                // Call the API to update the item.
                if (pnModAPIFunc('EZComments', 'admin', 'update',
                                array('id'          => $this->id,
                                      'subject'     => $data['ezcomments_subject'],
                                      'comment'     => $data['ezcomments_comment'],
                                      'status'      => (int)$data['ezcomments_status'],
                                      'anonname'    => $data['ezcomments_anonname'],
                                      'anonmail'    => $data['ezcomments_anonmail'],
                                      'anonwebsite' => $data['ezcomments_anonwebsite']))) {
                    // Success
                    LogUtil::registerStatus(__('Done! Comment updated.', $dom));
                }
                break;
        }

        if ($data['ezcomments_sendmeback'] == true) {
            return pnRedirect($comment['url'] . "#comments_{$comment['modname']}_{$comment['objectid']}");
        }

        return pnRedirect(pnModURL('EZComments', 'admin', 'main'));
    }
}
