<?php

class IWqv_Block_Qvsummary extends Zikula_Controller_AbstractBlock {

    /**
     * Initialise block
     *
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     */
    public function init() {
        SecurityUtil::registerPermissionSchema('IWqv:summaryBlock:', 'Block title::');
    }

    /**
     * Get information on block
     *
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @return  array       The block information
     */
    public function info() {
        $modversion['name'] = $this->__('IWqv');
        //Values
        return array('text_type' => 'qvsummary',
            'module' => 'IWqv',
            'text_type_long' => $this->__('Block with the user assignment'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Gets qv summary information
     *
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     */
    public function display($row) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv:summaryBlock:', $row['title'] . "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            return false;
        }

        $uid = UserUtil::getVar('uid');
        if (!isset($uid))
            $uid = '-1';

        // Get the qvsummary saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'qvsummary',
                    'module' => 'IWqv',
                    'uid' => $uid,
                    'sv' => $sv));
        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'qvsummary',
                        'module' => 'IWqv',
                        'sv' => $sv,
                        'nult' => true));
        } else {
            $teacherassignments = ModUtil::apiFunc('IWqv', 'user', 'getall', array("teacher" => $uid));
            $studentassignments = ModUtil::apiFunc('IWqv', 'user', 'getall', array("student" => $uid));

            if (empty($teacherassignments) && empty($studentassignments)) {
                
            }

            $view = Zikula_View::getInstance('IWqv', false);
            $view->assign('teacherassignments', $teacherassignments);
            $view->assign('studentassignments', $studentassignments);
            $view->assign('isblock', true);
            $s = $view->fetch('IWqv_block_summary.htm');

            if (empty($teacherassignments) && empty($studentassignments)) {
                $s = '';
            }

            //Copy the block information into user vars
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                'name' => 'qvsummary',
                'module' => 'IWqv',
                'sv' => $sv,
                'value' => $s,
                'lifetime' => '2000'));
        }

        if ($s == '') {
            return false;
        }

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }

}