<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control Version information
 */
class Downloads_Version extends Zikula_AbstractVersion
{

    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__('Downloads');
        $meta['url'] = $this->__(/* !used in URL - nospaces, no special chars, lcase */'downloads');
        $meta['description'] = $this->__('Zikula file download manager');
        $meta['version'] = '3.1.2';

        $meta['securityschema'] = array('Downloads::' => '::',
            'Downloads::Category' => 'CategoryID::',
            'Downloads::Item' => 'ID::');
        $meta['core_min'] = '1.3.3'; // requires minimum 1.3.3 or later
        $meta['core_max'] = '1.3.99';
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));

        return $meta;
    }
    
    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.downloads.ui_hooks.downloads', 'ui_hooks', $this->__('Downloads Hooks'));
        $bundle->addEvent('display_view', 'downloads.ui_hooks.downloads.display_view');
        $this->registerHookSubscriberBundle($bundle);
    }
}