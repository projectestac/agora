<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage FAQ
 */
class FAQ_Version extends Zikula_AbstractVersion
{

    public function getMetaData()
    {

        $meta = array();
        $meta['displayname'] = $this->__('FAQ');
        $meta['description'] = $this->__('Frequently Asked Questions');
        $meta['version'] = '2.3.3';
        $meta['url'] = $this->__('faq');
        $meta['core_min'] = '1.3.0'; // Fixed to 1.3.x range
        $meta['core_max'] = '1.3.99'; // Fixed to 1.3.x range
        $meta['securityschema'] = array('FAQ::' => 'FAQ ID::');
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        return $meta;
    }

    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.faq.ui_hooks.questions', 'ui_hooks', $this->__('FAQ Hooks'));
        $bundle->addEvent('display_view', 'faq.ui_hooks.questions.display_view');
        $bundle->addEvent('form_edit', 'faq.ui_hooks.questions.form_edit');
        $bundle->addEvent('validate_edit', 'faq.ui_hooks.questions.validate_edit');
        $bundle->addEvent('process_edit', 'faq.ui_hooks.questions.process_edit');
        $bundle->addEvent('process_delete', 'faq.ui_hooks.questions.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.faq.filter_hooks.questions', 'filter_hooks', $this->__('FAQ filter Hooks'));
        $bundle->addEvent('filter', 'faq.filter_hooks.questions.filter');
        $this->registerHookSubscriberBundle($bundle);
    }
}