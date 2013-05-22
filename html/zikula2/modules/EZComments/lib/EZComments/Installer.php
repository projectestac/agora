<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @license See license.txt
 */

class EZComments_Installer extends Zikula_AbstractInstaller
{
    /**
     * initialise the EZComments module
     *
     * This function initializes the module to be used. it creates tables,
     * registers hooks,...
     *
     * @return boolean true on success, false otherwise.
     */
    public function install()
    {
        // create main table
        if (!DBUtil::createTable('EZComments')) {
            return false;
        }

        // register hooks
        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
        HookUtil::registerProviderBundles($this->version->getHookProviderBundles());

        // register the module delete hook
        EventUtil::registerPersistentModuleHandler('EZComments', 'installer.module.uninstalled', array('EZComments_EventHandlers', 'moduleDelete'));
        EventUtil::registerPersistentModuleHandler('EZComments', 'installer.subscriberarea.uninstalled', array('EZComments_EventHandlers', 'hookAreaDelete'));

        // Misc
        $this->setVar('template', 'Standard');
        $this->setVar('css', 'style.css');
        $this->setVar('anonusersinfo', false);
        $this->setVar('anonusersrequirename', false);
        $this->setVar('logip', false);
        $this->setVar('itemsperpage', 25);
        $this->setVar('enablepager', false);
        $this->setVar('commentsperpage', 25);
        $this->setVar('migrated', array('dummy' => true));
        $this->setVar('useaccountpage', '1');
        // Notification
        $this->setVar('MailToAdmin', false);
        $this->setVar('moderationmail', false);
        // Moderation
        $this->setVar('moderation', 0);
        $this->setVar('alwaysmoderate', false);
        $this->setVar('dontmoderateifcommented', false);
        $this->setVar('modlinkcount', 2);
        $this->setVar('modlist', '');
        // Blacklisting
        $this->setVar('blacklinkcount', 5);
        $this->setVar('blacklist', '');
        $this->setVar('proxyblacklist', false);
        $this->setVar('modifyowntime', 6);
        // Akismet
        $this->setVar('akismet', false);
        $this->setVar('akismetstatus', 1);
        // Feeds
        $this->setVar('feedtype', 'rss');
        $this->setVar('feedcount', 10);

        // Initialisation successful
        return true;
    }

    /**
     * upgrade the EZComments module from an old version
     *
     * This function upgrades the module to be used. It updates tables,
     * registers hooks,...
     *
     * @return boolean true on success, false otherwise.
     */
    public function upgrade($oldversion)
    {
        if (!DBUtil::changeTable('EZComments')) {
            return LogUtil::registerError($this->__('Error updating the table.'));
        }

        switch ($oldversion)
        {
            case '1.2':
                $this->setVar('enablepager', false);
                $this->setVar('commentsperpage', '25');

            case '1.3':
                $this->setVar('blacklinkcount', 5);
                $this->setVar('akismet', false);

            case '1.4':
                $this->setVar('anonusersrequirename', false);
                $this->setVar('akismetstatus', 1);

            case '1.5':
                if (!DBUtil::changeTable('EZComments')) {
                    return '1.5';
                }
                $this->setVar('template', 'Standard');
                $this->setVar('modifyowntime', 6);
                $this->setVar('useaccountpage', '1');

            case '1.6':
            case '1.61':
            case '1.62':
                $this->setVar('migrated', array('dummy' => true));
                $this->setVar('css', 'style.css');

            case '2.0.0':
            case '2.0.1':
                // register hooks
                HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());
                HookUtil::registerProviderBundles($this->version->getHookProviderBundles());

                // register the module delete hook
                EventUtil::registerPersistentModuleHandler('EZComments', 'installer.module.uninstalled', array('EZComments_EventHandlers', 'moduleDelete'));
                EventUtil::registerPersistentModuleHandler('EZComments', 'installer.subscriberarea.uninstalled', array('EZComments_EventHandlers', 'hookAreaDelete'));

                // drop table prefix
                $connection = Doctrine_Manager::getInstance()->getConnection('default');
                $sql = 'RENAME TABLE ' . $prefix . '_ezcomments' . " TO ezcomments";
                $stmt = $connection->prepare($sql);
                try {
                    $stmt->execute();
                } catch (Exception $e) {
                }
                
                DBUtil::changeTable('EZComments');
            case '3.0.0':
                // future upgrade routines
                break;
        }

        return true;
    }

    /**
     * delete the EZComments module from an old version
     *
     * This function deletes the module to be used. It deletes tables,
     * registers hooks,...
     *
     * @return boolean true on success, false otherwise.
     */
    public function uninstall()
    {
        if (!ModUtil::unregisterHook('item', 'display', 'GUI', 'EZComments', 'user', 'view')) {
            return LogUtil::registerError($this->__('Error deleting hook.'));
        }

        if (!ModUtil::unregisterHook('item', 'delete', 'API', 'EZComments', 'admin', 'deletebyitem')) {
            return LogUtil::registerError($this->__('Error deleting hook.'));
        }

        if (!ModUtil::unregisterHook('module', 'remove', 'API', 'EZComments', 'admin', 'deletemodule')) {
            return LogUtil::registerError($this->__('Error deleting hook.'));
        }

        // drop main table
        if (!DBUtil::dropTable('EZComments')) {
            return false;
        }

        // delete all module vars for the ezcomments module
        $this->delVars();

        HookUtil::unregisterProviderBundles($this->version->getHookProviderBundles());
        HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());
        EventUtil::unregisterPersistentModuleHandler('EZComments', 'installer.module.uninstalled', array('EZComments_EventHandlers', 'moduleDelete'));
        EventUtil::unregisterPersistentModuleHandler('EZComments', 'installer.subscriberarea.uninstalled', array('EZComments_EventHandlers', 'hookAreaDelete'));

        // Deletion successful
        return true;
    }
}
