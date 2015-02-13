<?php
class IWmessages_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__("IWMessages");
        $meta['description'] = $this->__("Allow to send private messages between users.");
        $meta['url'] = $this->__("IWmessages");
        $meta['version'] = '3.0.1';
        $meta['securityschema'] = array('IWmessages::' => '::');
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
            $this->name, 'subscriber.iwmessages.ui_hooks.iwmessages',
            'ui_hooks',
            $this->__('IWmessages Hooks')
        );
        
        $bundle->addEvent('form_edit', 'iwmessages.ui_hooks.iwmessages.form_edit');

        $this->registerHookSubscriberBundle($bundle);
    }

}
