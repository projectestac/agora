<?php

class Agoraportal_Block_AgoraQuestion extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author Albert Pérez Monfort
     */
    public function init() {
        // Security
        SecurityUtil::registerPermissionSchema('Agoraportal:agoraQuestionblock:', 'Block title::');
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
            'text_type' => 'agoraQuestion',
            'text_type_long' => __('Mostra un quadre de diàleg per verificar els gestors de centre', $dom),
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

        if (!UserUtil::isLoggedIn())
            return false;

        // Security check
        if (!SecurityUtil::checkPermission('Agoraportal:agoraQuestionblock:', "$blockinfo[title]::", ACCESS_READ)) {
            return false;
        }

        // Get variables from content block
        $vars = BlockUtil::varsFromContent($blockinfo['content']);

        $managerUName = UserUtil::getVar('uname');
        $user = ModUtil::apiFunc('Agoraportal', 'user', 'getManager', array('managerUName' => $managerUName));

        // Check if the user is in the z_Agoraportal_client_managers table and his state is 0
        if (!$user || $user['state'] != 0) {
            return false;
        }

        //Get the client Name
        $clientName = ModUtil::apiFunc('Agoraportal', 'user', 'getClientMainInfo', array('clientCode' => $user['clientCode']));

        // build the output
        $view = Zikula_View::getInstance('Agoraportal');

        // assign your data to to the template 
        $view->assign('clientCode', $user['clientCode']);
        $view->assign('clientName', $clientName);
        $blockinfo['content'] = $view->fetch('agoraportal_block_agoraQuestion.tpl');

        return BlockUtil::themeBlock($blockinfo);
    }

}