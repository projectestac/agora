<?php

/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */
class Scribite_Version extends Zikula_AbstractVersion
{

    const PROVIDER_UIAREANAME = 'provider.scribite.ui_hooks.editor';

    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__('Scribite');
        $meta['oldnames'] = array('scribite');
        $meta['url'] = $this->__('scribite');
        $meta['version'] = '5.0.0';
        $meta['core_min'] = '1.3.5';
        $meta['core_max'] = '1.4.99';
        $meta['description'] = $this->__('WYSIWYG editors for Zikula');
        $meta['securityschema'] = array('Scribite::' => 'Modulename::');
        $meta['capabilities'] = array(HookUtil::PROVIDER_CAPABLE => array('enabled' => true));
        return $meta;
    }

    protected function setupHookBundles()
    {
        $bundle = new Zikula_HookManager_ProviderBundle($this->name, self::PROVIDER_UIAREANAME, 'ui_hooks', __('WYSIWYG Editor'));
        $bundle->addServiceHandler('form_edit', 'Scribite_HookHandlers', 'uiEdit', 'scribite.editor');
        $this->registerHookProviderBundle($bundle);
    }

}
