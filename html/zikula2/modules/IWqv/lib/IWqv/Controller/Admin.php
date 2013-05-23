<?php

class IWqv_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the manage module site
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @return	The configuration information
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get module vars	
        $skins = ModUtil::getVar('IWqv', 'skins');
        $langs = ModUtil::getVar('IWqv', 'langs');
        $maxdelivers = ModUtil::getVar('IWqv', 'maxdelivers');
        $basedisturl = ModUtil::getVar('IWqv', 'basedisturl');

        return $this->view->assign('security', SecurityUtil::generateCsrfToken())
                        ->assign('skins', $skins)
                        ->assign('langs', $langs)
                        ->assign('maxdelivers', $maxdelivers)
                        ->assign('basedisturl', $basedisturl)
                        ->fetch('IWqv_admin_conf.htm');
    }

    /**
     * Update the configuration values
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @params	The config values from the form
     * @return	Thue if success
     */
    public function confupdate($args) {
        $skins = FormUtil::getPassedValue('skins', isset($args['skins']) ? $args['skins'] : null, 'POST');
        $langs = FormUtil::getPassedValue('langs', isset($args['langs']) ? $args['langs'] : null, 'POST');
        $maxdelivers = FormUtil::getPassedValue('maxdelivers', isset($args['maxdelivers']) ? $args['maxdelivers'] : null, 'POST');
        $basedisturl = FormUtil::getPassedValue('basedisturl', isset($args['basedisturl']) ? $args['basedisturl'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        if (isset($skins))
            ModUtil::setVar('IWqv', 'skins', $skins);
        if (isset($langs))
            ModUtil::setVar('IWqv', 'langs', $langs);
        if (isset($maxdelivers))
            ModUtil::setVar('IWqv', 'maxdelivers', $maxdelivers);
        if (isset($basedisturl))
            ModUtil::setVar('IWqv', 'basedisturl', $basedisturl);

        LogUtil::registerStatus($this->__f('Done! %1$s updated.', $this->__('settings')));
        return System::redirect(ModUtil::url('IWqv', 'admin', 'main'));
    }

}