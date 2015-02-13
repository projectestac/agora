<?php
class IWforms_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWforms");
        $meta['description'] = $this->__("Creation, managment and use of forms.");
        $meta['url'] = $this->__("IWforms");
        $meta['version'] = '3.0.2';
        $meta['securityschema'] = array('IWforms::' => '::');
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
            $this->name, 'subscriber.iwforms.ui_hooks.iwforms',
            'ui_hooks',
            $this->__('IWforms Hooks')
        );
        
        $bundle->addEvent('form_edit', 'iwforms.ui_hooks.iwforms.form_edit');

        $this->registerHookSubscriberBundle($bundle);
    }

}
