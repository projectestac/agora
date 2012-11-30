<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @license See license.txt
 */

// The following information is used by the Modules module
// for display and upgrade purposes
class Content_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['version']        = '4.0.0';
        $meta['oldnames']       = array('content');
        $meta['displayname']    = $this->__('Content editing');
        $meta['description']    = $this->__('Content is a page editing module. With it you can insert and edit various content items, such as HTML texts, videos, Google maps and much more.');
        // this defines the module's url and should be in lowercase without space
        $meta['url']            = $this->__('content');
        $meta['core_min']       = '1.3.0'; // requires minimum 1.3.0 or later
        $meta['capabilities']   = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        $meta['securityschema'] = array('Content::' => '::',
                'Content:plugins:layout' => 'Layout name::',
                'Content:plugins:content' => 'Content type name::',
                'Content:page:' => 'Page id::');
        // Module depedencies
        $meta['dependencies'] = array(
                array('modname'    => 'Scribite',
                      'minversion' => '4.2.1',
                      'maxversion' => '',
                      'status'     => ModUtil::DEPENDENCY_RECOMMENDED),
        );
        return $meta;
    }

    protected function setupHookBundles()
    {
        // Register hooks for pages
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.content.ui_hooks.pages', 'ui_hooks', $this->__('Content Display Hooks'));
        $bundle->addEvent('display_view', 'content.ui_hooks.pages.display_view');
        $bundle->addEvent('form_edit', 'content.ui_hooks.pages.form_edit');
        $bundle->addEvent('form_delete', 'content.ui_hooks.pages.form_delete');
        $bundle->addEvent('validate_edit', 'content.ui_hooks.pages.validate_edit');
        $bundle->addEvent('validate_delete', 'content.ui_hooks.pages.validate_delete');
        $bundle->addEvent('process_edit', 'content.ui_hooks.pages.process_edit');
        $bundle->addEvent('process_delete', 'content.ui_hooks.pages.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.content.filter_hooks.pages', 'filter_hooks', $this->__('Content Filter Hooks'));
        $bundle->addEvent('filter', 'content.filter_hooks.pages.filter');
        $this->registerHookSubscriberBundle($bundle);
    }
}
