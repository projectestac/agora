<?php

class IWnoteboard_Block_Nbentries extends Zikula_Controller_AbstractBlock {

    public function init() {
        //Sentï¿œncia de seguretat
        SecurityUtil::registerPermissionSchema('IWnoteboard:nbentriesBlock:', 'Block title::');
    }

    public function info() {

        //Values
        return array('text_type' => 'nbentries',
            'module' => 'IWnoteboard',
            'text_type_long' => $this->__('Show the NoteBoard last entries'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    public function display($row) {

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard:nbentriesBlock:', $row['title'] . "::", ACCESS_READ)) {
            return false;
        }

        $uid = UserUtil::getVar('uid');

        if (!isset($uid))
            $uid = '-1';

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'nbentries',
                    'module' => 'IWnoteboard',
                    'uid' => $uid,
                    'sv' => $sv));

        //$exists = false;

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'nbentries',
                        'module' => 'IWnoteboard',
                        'sv' => $sv,
                        'nult' => true));
            $row['content'] = $s;
            return BlockUtil::themesideblock($row);
        }

        $notesArray = array();

        $view = Zikula_View::getInstance('IWnoteboard', false);

        $notes = ModUtil::apiFunc('IWnoteboard', 'user', 'getall',
                        array('numitems' => 7));

        foreach ($notes as $note) {
            $notesArray[] = array('content' => $note['noticia'],
                'mes_info' => $note['mes_info'],
                'text' => $note['text']);
        }

        if (count($notesArray) == 0)
            return false;

        $view->assign('notesArray', $notesArray);

        $s = $view->fetch('IWnoteboard_block_entries.tpl');

        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                    'name' => 'nbentries',
                    'module' => 'IWnoteboard',
                    'sv' => $sv,
                    'value' => $s,
                    'lifetime' => '500'));

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }

}
