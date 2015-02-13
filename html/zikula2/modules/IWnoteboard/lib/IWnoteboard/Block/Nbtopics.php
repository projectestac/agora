<?php

class IWnoteboard_Block_Nbtopics extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     */
    public function init() {
        //Sentï¿œncia de seguretat
        SecurityUtil::registerPermissionSchema('IWnoteboard:nbtopicsBlock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return       array       The block information
     */
    public function info() {

        //Values
        return array('text_type' => 'nbtopics',
            'module' => 'IWnoteboard',
            'text_type_long' => $this->__('NoteBoard topics'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Gets topics information
     *
     * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     */
    public function display($row) {

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard:nbtopicsBlock:', $row['title'] . "::", ACCESS_READ)) {
            return false;
        }

        if (!UserUtil::isLoggedIn()) {
            return false;
        }

        $uid = UserUtil::getVar('uid');

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'nbtopics',
                    'module' => 'IWnoteboard',
                    'uid' => $uid,
                    'sv' => $sv));

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'nbtopics',
                        'module' => 'IWnoteboard',
                        'sv' => $sv,
                        'nult' => true));
            $row['content'] = $s;
            return BlockUtil::themesideblock($row);
        }

        $view = Zikula_View::getInstance('IWnoteboard', false);

        $temes = ModUtil::apiFunc('IWnoteboard', 'user', 'getalltemes');
        $en_te = false;
        foreach ($temes as $untema) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            if (ModUtil::func('IWmain', 'user', 'isMember', array('uid' => UserUtil::getVar('uid'),
                        'gid' => $untema['grup'],
                        'sv' => $sv))) {
                $temes0[] = array('tid' => $untema['tid'],
                    'nomtema' => $untema['nomtema']);
                $en_te = true;
            }
        }

        if (!$en_te) {
            return false;
        }

        $view->assign('temes', $temes0);
        $s = $view->fetch('IWnoteboard_block_topics.tpl');

        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                    'name' => 'nbtopics',
                    'module' => 'IWnoteboard',
                    'sv' => $sv,
                    'value' => $s,
                    'lifetime' => '2000'));

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }

}
