<?php

class XtecOauth_Installer extends Zikula_AbstractInstaller
{

    /**
     * Create the tables of the module and register login hooks
     *
     * @return bool true if successful, false otherwise
     * @author Toni Ginard
     */
    public function install()
    {
        // Create module vars
        $this
            ->setVar('xtecoauth_clientid', '')
            ->setVar('xtecoauth_clientsecret', '')
            ->setVar('xtecoauth_apiurlbase', '')
            ->setVar('xtecoauth_authorizedomain', '');

        return true;
    }

    /**
     * Remove the module and all associate information
     *
     * @return bool true if successful, false otherwise
     * @author Toni Ginard
     */
    public function uninstall()
    {
        $this->delVars();

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
    public function upgrade($oldversion)
    {
        $tables = DBUtil::getTables();

        switch ($oldversion) {
            case '1.0.0':
        }

        return true;
    }
}
