<?php
class IWforums_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("IWforums");
        $meta['description'] = $this->__("Creation, managment and use of forums.");
        $meta['url'] = $this->__("IWforums");
        $meta['version'] = '3.0.1';
        $meta['securityschema'] = array('IWforums::' => '::');
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));

        $meta['dependencies'] = array(array('modname' => 'IWmain',
                                            'minversion' => '3.0.0',
                                            'maxversion' => '',
                                            'status' => ModUtil::DEPENDENCY_REQUIRED));
         
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
            $this->name, 'subscriber.IWforums.ui_hooks.IWforums',
            'ui_hooks',
            $this->__('IWforums Hooks')
        );
        
        $bundle->addEvent('form_edit', 'IWforums.ui_hooks.IWforums.form_edit');

        $this->registerHookSubscriberBundle($bundle);
    }
}