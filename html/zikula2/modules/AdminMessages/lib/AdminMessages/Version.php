<?php

/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_System_Modules
 * @subpackage AdminMessages
 */
class AdminMessages_Version extends Zikula_AbstractVersion {

    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__("AdminMessages");
        $meta['description'] = $this->__("Provides a means of publishing, editing and scheduling special announcements from the site administrator.");
        $meta['url'] = 'AdminMessages';
        $meta['version'] = '2.2.1';
        $meta['securityschema'] = array('AdminMessages::' => 'message title::message id');
        $meta['capabilities'] = array(HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true));
        
        return $meta;
    }

    /**
     * Define the hook bundles supported by this module.
     *
     * @return void
     */
    protected function setupHookBundles() {
        $bundle = new Zikula_HookManager_SubscriberBundle(
                $this->name, 'subscriber.adminmessages.ui_hooks.adminmessages', 'ui_hooks', $this->__('AdminMessages Hooks')
        );

        $bundle->addEvent('form_edit', 'adminmessages.ui_hooks.adminmessages.form_edit');

        $this->registerHookSubscriberBundle($bundle);
    }

}
