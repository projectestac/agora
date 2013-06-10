<?php

class AuthLDAP_Installer extends Zikula_AbstractInstaller {

    /**
     * Create the tables of the module and import data from the ancient adminTools
     * application
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     * 
     * @return bool true if successful, false otherwise
     */
    public function Install() {
        // create module vars
        $this->setVar('authldap_serveradr', '127.0.0.1')
                ->setVar('authldap_basedn', 'dc=foo,dc=bar')
                ->setVar('authldap_bindas', '')
                ->setVar('authldap_bindpass', '')
                ->setVar('authldap_searchdn', 'ou=users,dc=foo,dc=bar')
                ->setVar('authldap_searchattr', 'uid')
                ->setVar('authldap_protocol', '3');

        EventUtil::registerPersistentModuleHandler('AuthLDAP', 'module.users.ui.login.succeeded', array('AuthLDAP_Listeners', 'loginSuccessListener'));
        EventUtil::registerPersistentModuleHandler('AuthLDAP', 'module.users.ui.login.failed', array('AuthLDAP_Listeners', 'tryAuthLDAPListener'));

        // successful
        return true;
    }

    /**
     * Remove the module and all associate information
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @return bool true if successful, false otherwise
     */
    public function Uninstall() {
        $this->delVar('authldap_serveradr')
                ->delVar('authldap_basedn')
                ->delVar('authldap_bindas')
                ->delVar('authldap_bindpass')
                ->delVar('authldap_searchdn')
                ->delVar('authldap_searchattr')
                ->delVar('authldap_protocol');
        EventUtil::unregisterPersistentModuleHandler('AuthLDAP');
        return true;
    }

    /**
     * Get data from old adminTools Oracle tables and populate accordingly the
     * tables of the module.
     *
     * @author Albert Pérez Monfort (aperezm@xtec.cat)
     * @author Toni Ginard
     *
     * @return bool true if successful, false otherwise
     */
    public function Upgrade($oldversion) {
        $table = DBUtil::getTables();
        switch ($oldversion) {
            case '1.0':
                EventUtil::registerPersistentModuleHandler('AuthLDAP', 'module.users.ui.login.succeeded', array('AuthLDAP_Listeners', 'loginSuccessListener'));
                EventUtil::registerPersistentModuleHandler('AuthLDAP', 'module.users.ui.login.failed', array('AuthLDAP_Listeners', 'tryAuthLDAPListener'));
            case '1.0.1':
        }
        return true;
    }

}