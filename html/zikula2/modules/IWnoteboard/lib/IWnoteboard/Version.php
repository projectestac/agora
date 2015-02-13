<?php
class IWnoteboard_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWnoteboard");
        $meta['description'] = $this->__("Provides a system to send small pieces of information to selected users. It has file support.");
        $meta['url'] = $this->__("IWnoteboard");
        $meta['version'] = '3.0.1';
        $meta['securityschema'] = array('IWnoteboard::' => '::');
        /*
        $meta['dependencies'] = array(array('modname' => 'IWmain',
                                            'minversion' => '3.0.0',
                                            'maxversion' => '',
                                            'status' => ModUtil::DEPENDENCY_REQUIRED));
         *
         */
		$meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));

        return $meta;
    }
    /**
     * Define the hook bundles supported by this module.
     *
     * @return void
     */
    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle(
            $this->name, 'subscriber.iwnoteboard.ui_hooks.iwnoteboard',
            'ui_hooks',
            $this->__('IWnoteboard Hooks')
        );
        
        $bundle->addEvent('form_edit', 'iwnoteboard.ui_hooks.iwnoteboard.form_edit');

        $this->registerHookSubscriberBundle($bundle);
    }

}
