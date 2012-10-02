<?php
/**
 * Copyright Zikula Foundation 2011 - Profile module for Zikula
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Profile
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Hook-like event handlers for basic profile data.
 */
class Profile_Listener_UsersUiHandler extends Zikula_AbstractEventHandler implements Zikula_TranslatableInterface
{
    /**
     * The area name that this handler processes.
     */
    const EVENT_KEY = 'module.profile.users_ui_handler';

    /**
     * The common module name.
     *
     * @var string
     */
    protected $name = Profile_Constant::MODNAME;
    
    /**
     * The language domain for ZLanguage i18n.
     *
     * @var string|null
     */
    protected $domain = null;

    /**
     * Access to a Zikula_View instance for the Profile module.
     *
     * @var Zikula_View
     */
    protected $view;

    /**
     * Access to the request information.
     *
     * @var Zikula_Request_Http
     */
    protected $request;

    /**
     * The validation object instance used when validating information entered during an edit phase.
     *
     * @var Zikula_Hook_ValidationResponse
     */
    protected $validation;

    /**
     * Builds an instance of this class.
     *
     * @param Zikula_EventManager $eventManager An instance of a Zikula event manager appropriate for this listener.
     */
    public function __construct(Zikula_EventManager $eventManager)
    {
        parent::__construct($eventManager);
        
        $this->domain = ZLanguage::getModuleDomain($this->name);
        
        $this->serviceManager = $eventManager->getServiceManager();
        $this->request = $this->serviceManager->getService('request');
    }
    
    public function getView()
    {
        if (!$this->view) {
            $this->view = Zikula_View::getInstance($this->name);
        }
        
        return $this->view;
    }

    /**
     * Bind the various functions defined by this class to specific events.
     * 
     * @return void
     */
    public function setupHandlerDefinitions()
    {
        $this->addHandlerDefinition('module.users.ui.display_view', 'uiView');
        
        $this->addHandlerDefinition('module.users.ui.form_edit.new_user', 'uiEdit');
        $this->addHandlerDefinition('module.users.ui.form_edit.modify_user', 'uiEdit');
        $this->addHandlerDefinition('module.users.ui.form_edit.new_registration', 'uiEdit');
        $this->addHandlerDefinition('module.users.ui.form_edit.modify_registration', 'uiEdit');
        
        $this->addHandlerDefinition('module.users.ui.validate_edit.new_user', 'validateEdit');
        $this->addHandlerDefinition('module.users.ui.validate_edit.modify_user', 'validateEdit');
        $this->addHandlerDefinition('module.users.ui.validate_edit.new_registration', 'validateEdit');
        $this->addHandlerDefinition('module.users.ui.validate_edit.modify_registration', 'validateEdit');
        
        $this->addHandlerDefinition('module.users.ui.process_edit.new_user', 'processEdit');
        $this->addHandlerDefinition('module.users.ui.process_edit.modify_user', 'processEdit');
        $this->addHandlerDefinition('module.users.ui.process_edit.new_registration', 'processEdit');
        $this->addHandlerDefinition('module.users.ui.process_edit.modify_registration', 'processEdit');
    }

    /**
     * Render and return profile information for display as part of a hook-like UI event issued from the Users module.
     *
     * @param Zikula_Event $event The event that triggered this function call, including the subject of the display request.
     * 
     * @return void
     */
    public function uiView(Zikula_Event $event)
    {
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive');

        // The return value of the function is checked here
        if ($items) {
            $user = $event->getSubject();

            // Create output object
            $this->getView()->setCaching(false)
                    ->assign('duditems', $items)
                    ->assign('userinfo', $user);

            // Return the dynamic data rows
            $event->data[self::EVENT_KEY] = $this->getView()->fetch('profile_profile_ui_view.tpl');
        }
    }

    /**
     * Render form elements for display that allow a user to enter profile information for a user account as part of a Users module hook-like UI event.
     * 
     * Parameters passed in via POST:
     * ------------------------------
     * array dynadata If reentering the editing phase after validation errors, an array containing the profile items to store for the user; otherwise not
     *                  provided.
     *
     * @param Zikula_Event $event The event that triggered this function call, including the id of the user for which profile items should be entered.
     * 
     * @return void
     */
    public function uiEdit(Zikula_Event $event)
    {
        $items = ModUtil::apiFunc('Profile', 'user', 'getallactive', array('get' => 'editable'));

        // The return value of the function is checked here
        if ($items) {
            // check if there's a user to edit
            // or uses uid=1 to pull the default values from the annonymous user
            $userid   = $event->hasArg('id') ? $event->getArg('id') : null;

            if (!isset($userid)) {
                $userid = 1;
            }

            // Get the dynamic data that might have been posted
            if ($this->request->isPost() && $this->request->getPost()->has('dynadata')) {
                $dynadata = $this->request->getPost()->get('dynadata');
            } else {
                $dynadata = array();
            }

            // merge this temporary dynadata and the errors into the items array
            foreach ($items as $prop_label => $item) {
                foreach ($dynadata as $propname => $propdata) {
                    if ($item['prop_attribute_name'] == $propname) {
                        $items[$prop_label]['temp_propdata'] = $propdata;
                    }
                }
            }

            if ($this->validation) {
                $errorFields = $this->validation->getErrors();
            } else {
                $errorFields = array();
            }

            $this->getView()->setCaching(false)
                    ->assign('duderrors', $errorFields)
                    ->assign('duditems', $items)
                    ->assign('userid', $userid);

            $event->data[self::EVENT_KEY] = $this->getView()->fetch('profile_profile_ui_edit.tpl');
        }
    }

    /**
     * Validate profile information entered for a user as part of the hook-like user UI events.
     * 
     * Parameters passed in via POST:
     * ------------------------------
     * array dynadata An array containing the profile items to store for the user.
     *
     * @param Zikula_Event $event The event that triggered this function call, including the id of the user for which profile data was entered, and a
     *                              collection in which to store the validation object created by this function.
     * 
     * @return void
     */
    public function validateEdit(Zikula_Event $event)
    {
        if ($this->request->isPost()) {
            $dynadata = $this->request->getPost()->has('dynadata') ? $this->request->getPost()->get('dynadata') : array();

            $this->validation = new Zikula_Hook_ValidationResponse('dynadata', $dynadata);
            $requiredFailures = ModUtil::apiFunc('Profile', 'user', 'checkrequired', array('dynadata' => $dynadata));

            $errorCount = 0;
            if ($requiredFailures && $requiredFailures['result']) {
                foreach ($requiredFailures['fields'] as $key => $fieldName) {
                    $this->validation->addError($fieldName, $this->__f('The \'%1$s\' field is required.', array($requiredFailures['translatedFields'][$key])));
                    $errorCount++;
                }
            }

            if ($errorCount > 0) {
                LogUtil::registerError(_fn('There was a problem with one of the personal information fields.', 'There were problems with %1$d personal information fields.', $errorCount, array($errorCount), $this->domain));
            }

            $event->data->set(self::EVENT_KEY, $this->validation);
        }
    }

    /**
     * Respond to a `module.users.ui.process_edit` event to store profile data gathered when editing or creating a user account.
     * 
     * Parameters passed in via POST:
     * ------------------------------
     * array dynadata An array containing the profile items to store for the user.
     *
     * @param Zikula_Event $event The event that triggered this function call, containing the id of the user for which profile information should be stored.
     * 
     * @return void
     */
    public function processEdit(Zikula_Event $event)
    {
        if ($this->request->isPost()) {
            if ($this->validation && !$this->validation->hasErrors()) {
                $user = $event->getSubject();
                $dynadata = $this->request->getPost()->has('dynadata') ? $this->request->getPost()->get('dynadata') : array();

                foreach ($dynadata as $dudName => $dudItem) {
                    UserUtil::setVar($dudName, $dudItem, $user['uid']);
                }
            }
        }
    }
    
    /**
     * Translate.
     *
     * @param string $msgid String to be translated.
     *
     * @return string
     */
    public function __($msgid)
    {
        return __($msgid, $this->domain);
    }

    /**
     * Translate with sprintf().
     *
     * @param string       $msgid  String to be translated.
     * @param string|array $params Args for sprintf().
     *
     * @return string
     */
    public function __f($msgid, $params)
    {
        return __f($msgid, $params, $this->domain);
    }

    /**
     * Translate plural string.
     *
     * @param string $singular Singular instance.
     * @param string $plural   Plural instance.
     * @param string $count    Object count.
     *
     * @return string Translated string.
     */
    public function _n($singular, $plural, $count)
    {
        return _n($singular, $plural, $count, $this->domain);
    }

    /**
     * Translate plural string with sprintf().
     *
     * @param string       $sin    Singular instance.
     * @param string       $plu    Plural instance.
     * @param string       $n      Object count.
     * @param string|array $params Sprintf() arguments.
     *
     * @return string
     */
    public function _fn($sin, $plu, $n, $params)
    {
        return _fn($sin, $plu, $n, $params, $this->domain);
    }
}
