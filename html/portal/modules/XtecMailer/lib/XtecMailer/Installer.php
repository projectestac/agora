<?php

class XtecMailer_Installer extends Zikula_AbstractInstaller {

    /**
     * initialise the module
     *
     * @author Francesc Bassas i Bullich
     * @return bool true on success, false otherwise
     */
    public function Install() {
        // @aginard: get environment info from html/config/env-config.php file, so
        // it's automatically filled with proper value
        global $agora;
        $environment = $agora['server']['enviroment'];

        // Set default module variables
        $this->setVar('enabled', 1)
                ->setVar('idApp', 'AGORA')
                ->setVar('replyAddress', System::getVar('adminmail'))
                ->setVar('sender', 'educacio')
                ->setVar('environment', $environment)
                ->setVar('contenttype', 2)
                ->setVar('log', 0)
                ->setVar('debug', 0)
                ->setVar('logpath', '');

        EventUtil::registerPersistentModuleHandler('XtecMailer', 'module.mailer.api.sendmessage', array('XtecMailer_Listeners', 'sendMail'));

        // Initialisation successful
        return true;
    }

    /**
     * delete the module
     *
     * @author  Francesc Bassas i Bullich
     * @return  bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete all module variables
        $this->delVar('XtecMailer');

        EventUtil::unregisterPersistentModuleHandler('XtecMailer');

        // Deletion successful
        return true;
    }

    public function upgrade($oldversion) {
        return true;
    }

}