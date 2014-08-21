<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

// The following information is used by the Modules module
// for display and upgrade purposes
class Content_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['version']        = '4.1.1';
        $meta['oldnames']       = array('content');
        $meta['displayname']    = $this->__('Content editing');
        $meta['description']    = $this->__('Create hierachical pages with a flexible layout containing a wide variety of content, such as html text, images, videos, maps and much more.');
        // this defines the module's url and should be in lowercase without space
        $meta['url']            = $this->__('content');
        $meta['core_min'] = '1.3.0'; // Fixed to 1.3.x range
        $meta['core_max'] = '1.3.99'; // Fixed to 1.3.x range
        $meta['capabilities']   = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        $meta['securityschema'] = array('Content::' => '::',
                'Content:plugins:layout' => 'Layout name::',
                'Content:plugins:content' => 'Content type name::',
                'Content:page:' => 'Page id::');
        // Module depedencies
        $meta['dependencies'] = array(
                array('modname'    => 'Scribite',
                      'minversion' => '5.0.0',
                      'maxversion' => '',
                      'status'     => ModUtil::DEPENDENCY_RECOMMENDED),
        );
        return $meta;
    }

    protected function setupHookBundles()
    {
        // Register ui hooks for html contenttype. This enables Scribite 5 connection
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.content.ui_hooks.htmlcontenttype', 'ui_hooks', $this->__('HTML ContentType Hook'));
        $bundle->addEvent('display_view', 'content.ui_hooks.htmlcontenttype.display_view');
        $bundle->addEvent('form_edit', 'content.ui_hooks.htmlcontenttype.form_edit');
        $bundle->addEvent('form_delete', 'content.ui_hooks.htmlcontenttype.form_delete');
        $bundle->addEvent('validate_edit', 'content.ui_hooks.htmlcontenttype.validate_edit');
        $bundle->addEvent('validate_delete', 'content.ui_hooks.htmlcontenttype.validate_delete');
        $bundle->addEvent('process_edit', 'content.ui_hooks.htmlcontenttype.process_edit');
        $bundle->addEvent('process_delete', 'content.ui_hooks.htmlcontenttype.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        // Register ui hooks for pages
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.content.ui_hooks.pages', 'ui_hooks', $this->__('Content Full Page Hook'));
        $bundle->addEvent('display_view', 'content.ui_hooks.pages.display_view');
        $bundle->addEvent('form_edit', 'content.ui_hooks.pages.form_edit');
        $bundle->addEvent('form_delete', 'content.ui_hooks.pages.form_delete');
        $bundle->addEvent('validate_edit', 'content.ui_hooks.pages.validate_edit');
        $bundle->addEvent('validate_delete', 'content.ui_hooks.pages.validate_delete');
        $bundle->addEvent('process_edit', 'content.ui_hooks.pages.process_edit');
        $bundle->addEvent('process_delete', 'content.ui_hooks.pages.process_delete');
        $this->registerHookSubscriberBundle($bundle);

		// Register the filter hooks
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.content.filter_hooks.htmlcontenttype', 'filter_hooks', $this->__('HTML ContentType Filter Hook'));
        $bundle->addEvent('filter', 'content.filter_hooks.htmlcontenttype.filter');
        $this->registerHookSubscriberBundle($bundle);
    }
}
