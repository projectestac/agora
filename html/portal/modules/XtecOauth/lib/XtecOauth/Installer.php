<?php

class XtecOauth_Installer extends Zikula_AbstractInstaller
{

    /**
     * Create the tables of the module and register login hooks
     *
     * @return bool true if successful, false otherwise
     * @author Toni Ginard
     */
    public function Install()
    {
        // Create module vars
        $this
            ->setVar('xtecoauth_clientid', '')
            ->setVar('xtecoauth_clientsecret', '')
            ->setVar('xtecoauth_authorizeurl', '')
            ->setVar('xtecoauth_tokenurl', '')
            ->setVar('xtecoauth_apiurlbase', '');

        EventUtil::registerPersistentModuleHandler('XtecOauth', 'module.users.ui.login.succeeded', ['XtecOauth_Listeners', 'loginSuccessListener']);
        EventUtil::registerPersistentModuleHandler('XtecOauth', 'module.users.ui.login.failed', ['XtecOauth_Listeners', 'tryXtecOauthListener']);

        return true;
    }

    /**
     * Remove the module and all associate information
     *
     * @return bool true if successful, false otherwise
     * @author Toni Ginard
     */
    public function Uninstall()
    {
        $this
            ->delVar('xtecoauth_clientid')
            ->delVar('xtecoauth_clientsecret')
            ->delVar('xtecoauth_authorizeurl')
            ->delVar('xtecoauth_tokenurl')
            ->delVar('xtecoauth_apiurlbase');

        EventUtil::unregisterPersistentModuleHandler('XtecOauth');

        return true;
    }

    /**
     * Actions to do when there is a new version of the module
     *
     * @return bool true if successful, false otherwise
     * @author Toni Ginard
     *
     */
    public function Upgrade($oldversion)
    {
        $tables = DBUtil::getTables();

        switch ($oldversion) {
            case '1.0.0':
        }

        return true;
    }
}
