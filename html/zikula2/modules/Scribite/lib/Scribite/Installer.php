<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Installer extends Zikula_AbstractInstaller
{

    public function install()
    {
        // create hook
        HookUtil::registerProviderBundles($this->version->getHookProviderBundles());

        // set all modvars
        $this->setVar('DefaultEditor', 'CKEditor');

        $classes = PluginUtil::loadAllModulePlugins();
        foreach ($classes as $class) {
            if (strpos($class, 'Scribite') !== false) {
                try {
                    PluginUtil::install($class);
                } catch (Exception $e) {
                    LogUtil::registerStatus($e->getMessage());
                }
            }
        }

        // initialisation successful
        return true;
    }

    public function upgrade($oldversion)
    {
        switch ($oldversion) {
            case '4.3.0':
                // drop the old unused table
                $connection = $this->entityManager->getConnection();
                $prefix = $this->serviceManager['prefix'];
                $prefix = (empty($prefix)) ? '' : $prefix . "_";
                $sql = 'DROP TABLE ' . $prefix . 'scribite';
                $stmt = $connection->prepare($sql);
                try {
                    $stmt->execute();
                } catch (Exception $e) {
                    LogUtil::registerError($e->getMessage());
                }
                // standard 'upgrades' from earlier versions are not supported but 
                // not required either - just uninstall and install the new version
                $this->uninstall();
                // remove old peristent handlers
                EventUtil::unregisterPersistentModuleHandlers('Scribite');
                $this->install();
            case '5.0.0':
            // future upgrade
        }

        return true;
    }

    public function uninstall()
    {
        // delete editor plugins
        $classes = PluginUtil::loadAllModulePlugins();
        foreach ($classes as $class) {
            if (strpos($class, 'Scribite') !== false) {
                try {
                    PluginUtil::uninstall($class);
                } catch (Exception $e) {
                    LogUtil::registerError($e->getMessage());
                }
            }
        }

        // delete module variables
        $this->delVars();

        // remove hook
        HookUtil::unregisterProviderBundles($this->version->getHookProviderBundles());

        // deletion successful
        return true;
    }

}
