<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

class Agoraportal_Block_AgoraMenu extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author       Albert Pérez Monfort
     */
    public function init() {
        // Security
        SecurityUtil::registerPermissionSchema('Agoraportal:agoraMenublock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert Pérez Monfort
     * @return       array       The block information
     */
    public function info() {
        $dom = ZLanguage::getModuleDomain('Agoraportal');

        return array('module' => 'Agoraportal',
            'text_type' => 'agoraMenu',
            'text_type_long' => __('Mostra el menú d\'Agora', $dom),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true,
            'admin_tableless' => true);
    }

    /**
     * display block
     *
     * @author       Albert Pérez Monfort
     * @param        array       $blockinfo     a blockinfo structure
     * @return       output      the rendered bock
     */
    public function display($blockinfo) {
        // Check if the Profile module is available.
        if (!ModUtil::available('Agoraportal')) {
            return false;
        }

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal:agoraMenublock:', "$blockinfo[title]::", ACCESS_READ)) {
            return false;
        }

        $logedIn = (UserUtil::isLoggedIn()) ? true : false;

        $accessLevel = AgoraPortal_Util::getRole();

        $allowedAccessRequest = (ModUtil::getVar('Agoraportal', 'allowedAccessRequest') == 1) ? true : false;

        // build the output
        $view = Zikula_View::getInstance('Agoraportal');

        // assign your data to to the template
        $view->assign('logedIn', $logedIn);
        $view->assign('accessLevel', $accessLevel);
        $view->assign('allowedAccessRequest', $allowedAccessRequest);
        $view->assign('uname', UserUtil::getVar('uname'));

        $blockinfo['content'] = $view->fetch('block_agoraMenu.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }

}