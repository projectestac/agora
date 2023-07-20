<?php

/**
 * Performs a custom redirect after a user has logged in.
 */
class CustomLoginRedirect extends Zikula_AbstractEventHandler
{
    /**
     * Setup handler definitions.
     *
     * @return void
     */
    protected function setupHandlerDefinitions()
    {
        $this->addHandlerDefinition('module.users.ui.login.succeeded', 'loginSucceeded');
    }

    /**
     * Listener for the `module.users.ui.login.succeeded` event.
     *
     * Occurs right after a successful attempt to log in, and just prior to redirecting the user to the desired page.
     * All handlers are notified.
     *
     * The event subject contains the user's user record (from `UserUtil::getVars($event['uid'])`).
     * The arguments of the event are as follows:
     *     `'authentication_module'` an array containing the authenticating module name (`'modname'`) and method (`'method'`)
     *       used to log the user in.
     *     `'redirecturl'` will contain the value of the 'returnurl' parameter, if one was supplied, or an empty
     *       string. This can be modified to change where the user is redirected following the login.
     *
     * __The `'redirecturl'` argument__ controls where the user will be directed at the end of the log-in process.
     * Initially, it will be the value of the returnurl parameter provided to the log-in process, or blank if none was provided.
     *
     * The action following login depends on whether WCAG compliant log-in is enabled in the Users module or not. If it is enabled,
     * then the user is redirected to the returnurl immediately. If not, then the user is first displayed a log-in landing page,
     * and then meta refresh is used to redirect the user to the returnurl.
     *
     * If a `'redirecturl'` is specified by any entity intercepting and processing the `module.users.ui.login.succeeded` event, then
     * the URL provided replaces the one provided by the returnurl parameter to the login process. If it is set to an empty
     * string, then the user is redirected to the site's home page. An event handler should carefully consider whether
     * changing the `'redirecturl'` argument is appropriate. First, the user may be expecting to return to the page where
     * he was when he initiated the log-in process. Being redirected to a different page might be disorienting to the user.
     * Second, all event handlers are being notified of this event. This is not a `notify()` event. An event handler
     * that was notified prior to the current handler may already have changed the `'redirecturl'`.
     *
     * Finally, this event only fires in the event of a "normal" UI-oriented log-in attempt. A module attempting to log in
     * programmatically by directly calling the core functions will not see this event fired.
     *
     * @param Zikula_Event $event Event handler.
     *
     * @return void
     */
    public function loginSucceeded(Zikula_Event $event) {
    }
}