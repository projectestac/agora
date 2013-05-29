<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
class Weblinks_Version extends Zikula_AbstractVersion
{

    /**
     * Get module metaData
     * @return array 
     */
    public function getMetaData()
    {
        $meta = array();
        $meta['name'] = 'Weblinks';
        $meta['oldnames'] = array('Web_Links');
        $meta['displayname'] = $this->__('Weblinks');
        $meta['description'] = $this->__('Weblinks Module');
        //! this defines the module's url
        $meta['url'] = $this->__('weblinks');
        $meta['version'] = '3.0.0';
        $meta['securityschema'] = array('Weblinks::Category' => 'Category name::Category ID',
            'Weblinks::Link' => '::');
        $meta['core_min'] = '1.3.0'; // requires minimum 1.3.0 or later
        $meta['core_max'] = '1.3.99'; // doesn't work with 1.4.0 (yet)
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        return $meta;
    }
    
    /**
     * Set up hook subscriber and provider bundles 
     */
    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.weblinks.ui_hooks.link', 'ui_hooks', $this->__('Weblinks'));
        $bundle->addEvent('display_view', 'weblinks.ui_hooks.link.ui_view');
        $bundle->addEvent('form_edit', 'weblinks.ui_hooks.link.ui_edit');
        $bundle->addEvent('form_delete', 'weblinks.ui_hooks.link.ui_delete');
        $bundle->addEvent('validate_edit', 'weblinks.ui_hooks.link.validate_edit');
        $bundle->addEvent('validate_delete', 'weblinks.ui_hooks.link.validate_delete');
        $bundle->addEvent('process_edit', 'weblinks.ui_hooks.link.process_edit');
        $bundle->addEvent('process_delete', 'weblinks.ui_hooks.link.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.weblinks.filter_hooks.linkdescription', 'filter_hooks', $this->__('Weblinks Filters'));
        $bundle->addEvent('filter', 'weblinks.filter_hooks.linkfilter.filter');
        $this->registerHookSubscriberBundle($bundle);
    }

}