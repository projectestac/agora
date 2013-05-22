<?php
class Pages_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__('Static pages');
        $meta['description'] = $this->__('Manager of the static pages of the site.');
        $meta['version'] = '2.5.0';
        //! this defines the module's url
        $meta['url'] = $this->__('pages');
        $meta['core_min'] = '1.3.0'; // requires minimum 1.3.0 or later
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        $meta['securityschema'] = array('Pages::' => 'Page name::Page ID',
                'Pages:category:' => 'Category ID::');
        // Module depedencies
        $meta['dependencies'] = array(
                array('modname'    => 'Scribite',
                      'minversion' => '4.2.1',
                      'maxversion' => '',
                      'status'     => ModUtil::DEPENDENCY_RECOMMENDED));
        return $meta;
    }

    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.pages.ui_hooks.pages', 'ui_hooks', $this->__('Pages Hooks'));
        $bundle->addEvent('display_view', 'pages.ui_hooks.pages.display_view');
        $bundle->addEvent('form_edit', 'pages.ui_hooks.pages.form_edit');
        $bundle->addEvent('form_delete', 'pages.ui_hooks.pages.form_delete');
        $bundle->addEvent('validate_edit', 'pages.ui_hooks.pages.validate_edit');
        $bundle->addEvent('validate_delete', 'pages.ui_hooks.pages.validate_delete');
        $bundle->addEvent('process_edit', 'pages.ui_hooks.pages.process_edit');
        $bundle->addEvent('process_delete', 'pages.ui_hooks.pages.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.pages.filter_hooks.pagesfilter', 'filter_hooks', $this->__('Pages Filter Hooks'));
        $bundle->addEvent('filter', 'pages.filter_hooks.pages.filter');
        $this->registerHookSubscriberBundle($bundle);
    }
}