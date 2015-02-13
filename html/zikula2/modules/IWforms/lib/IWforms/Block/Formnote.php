<?php

class IWforms_Block_formnote extends Zikula_Controller_AbstractBlock {

    public function init() {
        SecurityUtil::registerPermissionSchema("IWforms:formnoteblock:", "Note identity::");
    }

    public function info() {
        return array('text_type' => 'FormNote',
            'module' => 'IWforms',
            'text_type_long' => $this->__('Display the content of a note in a block'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Show the list of forms for choosed categories
     * @autor:	Albert Pérez Monfort
     * return:	The list of forms
     */
    public function display($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWforms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_READ)) {
            return;
        }
        // Check if the module is available
        if (!ModUtil::available('IWforms')) {
            return;
        }

        $content = unserialize($blockinfo['content']);

        // load the template defined in the form definition
        $skincssurl = ($content['skincssurl'] != '') ? $content['skincssurl'] : '';

        if ($content['blockHideTitle'] == 1)
            $blockinfo['title'] = '';
        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'formNoteBlock' . $blockinfo['bid'],
                    'module' => 'IWforms',
                    'uid' => $uid,
                    'sv' => $sv));

        //$exists = false;

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'formNoteBlock' . $blockinfo['bid'],
                        'module' => 'IWforms',
                        'sv' => $sv,
                        'nult' => true,
                    ));
            PageUtil::addVar('stylesheet', $skincssurl);
            // Populate block info and pass to theme
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
        }

        // get note
        $note = ModUtil::apiFunc('IWforms', 'user', 'getNote', array('fmid' => $blockinfo['url']));
        if (!$note) {
            // create output object
            $view = Zikula_View::getInstance('IWforms', false);
            $view->assign('noNote', 1);
            $s = $view->fetch('IWforms_block_formNote.tpl');
            // copy the block information into user vars
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                'name' => 'formNoteBlock' . $blockinfo['bid'],
                'module' => 'IWforms',
                'sv' => $sv,
                'value' => $s,
                'lifetime' => '300'));
            // Populate block info and pass to theme
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
        }

        //check user access to this form
        $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $note['fid']));
        if ($access['level'] < 2) {
            return false;
        }
        //Get item
        $form = ModUtil::apiFunc('IWforms', 'user', 'getFormDefinition', array('fid' => $note['fid']));
        if ($form == false) {
            return false;
        }
        if ($content['content'] == '') {
            return false;
        }
        $noteContent = ModUtil::apiFunc('IWforms', 'user', 'getAllNoteContents', array('fid' => $note['fid'],
                    'fmid' => $note['fmid']));
        if ($note['annonimous'] == 0 && ($uid != '-1' || ($uid == '-1' && $form['unregisterednotusersview'] == 0))) {
            $userName = UserUtil::getVar('uname', $note['user']);
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $userName,
                        'sv' => $sv));
            $user = ($note['user'] != '') ? $note['user'] : '-1';
        } else {
            $user = '';
            $userName = '';
            $photo = '';
        }
        $contentBySkin = str_replace('[$user$]', $userName, $content['content']);
        $contentBySkin = str_replace('[$time$]', date('H.i', $note['time']), $contentBySkin);
        $contentBySkin = str_replace('[$noteId$]', $note['fmid'], $contentBySkin);
        $contentBySkin = str_replace('[$formId$]', $note['fid'], $contentBySkin);
        $contentBySkin = str_replace('[$date$]', date('d/m/Y', $note['time']), $contentBySkin);
        if ($photo != '') {
            $photo = '<img src="' . System::getBaseUrl() . 'index.php?module=IWforms&func=getFile&fileName=' . $photo . '" />';
        }
        $contentBySkin = str_replace('[$avatar$]', $photo, $contentBySkin);
        foreach ($noteContent as $key => $value) {
            $contentBySkin = str_replace('[$' . $key . '$]', nl2br($value['content']), $contentBySkin);
            $contentBySkin = str_replace('[%' . $key . '%]', $value['fieldName'], $contentBySkin);
        }
        $contentBySkin = ($note['publicResponse']) ? str_replace('[$reply$]', $note['renote'], $contentBySkin) : str_replace('[$reply$]', '', $contentBySkin);

        $isValidator = ($access['level'] == 7) ? 1 : 0;
        $isAdministrator = (SecurityUtil::checkPermission('blocks::', "::", ACCESS_ADMIN)) ? 1 : 0;
        // create output object
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('contentBySkin', DataUtil::formatForDisplayHTML(stripslashes($contentBySkin)));
        $view->assign('skincssurl', $skincssurl);
        $view->assign('isValidator', $isValidator);
        $view->assign('isAdministrator', $isAdministrator);
        $view->assign('fmid', $blockinfo['url']);
        $view->assign('bid', $blockinfo['bid']);
        $view->assign('fid', $note['fid']);
        $view->assign('noNote', 0);
        $s = $view->fetch('IWforms_block_formNote.tpl');
        // copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
            'name' => 'formNoteBlock' . $blockinfo['bid'],
            'module' => 'IWforms',
            'sv' => $sv,
            'value' => $s,
            'lifetime' => '300'));
        // Populate block info and pass to theme
        $blockinfo['content'] = $s;
        return BlockUtil::themesideblock($blockinfo);
    }

    function update($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWforms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_ADMIN)) {
            return;
        }

        $fmid = (int) FormUtil::getPassedValue('fmid', '', 'POST');
        $blockHideTitle = (int) FormUtil::getPassedValue('blockHideTitle', 0, 'POST');
        $blockContent = FormUtil::getPassedValue('blockContent', '', 'POST');
        $skincssurl = FormUtil::getPassedValue('skincssurl', '', 'POST');

        $content = serialize(array('content' => $blockContent,
            'blockHideTitle' => $blockHideTitle,
            'skincssurl' => $skincssurl,
                ));
        $blockinfo['content'] = $content;
        $blockinfo['url'] = $fmid;
        return $blockinfo;
    }

    function modify($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWforms:formnoteblock:", $blockinfo['url'] . "::", ACCESS_ADMIN)) {
            return;
        }
        $fmid = $blockinfo['url'];

        $values = unserialize($blockinfo['content']);
        $blockContent = $values['content'];
        $checked = ($values['blockHideTitle'] == 1) ? 'checked' : '';
        $skincssurl = $values['skincssurl'];

        $sortida = '<tr><td valign="top">' . $this->__('Identity of the note that must be schown') . '</td><td>' . "<input type=\"text\" name=\"fmid\" size=\"5\" maxlength=\"5\" value=\"$fmid\" />" . "</td></tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Hide block title') . '</td><td>' . "<input type=\"checkbox\" name=\"blockHideTitle\"" . $checked . " value=\"1\" />" . "</td></tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Block content') . '</td><td>' . "<textarea name=\"blockContent\" rows=\"5\" cols=\"70\">" . $blockContent . "</textarea>" . "</td></tr>\n";
        $sortida .= '<tr><td colspan=\"2\" valign="top"><div class="z-informationmsg">' . $this->__("[\$formId\$] =>Identity of the form, [\$noteId\$] =>Identity of the note, [%id%] => Title of the field, [\$id\$] => Content of the field, [\$user\$] => Username, [\$date\$] => Note creation date, [\$time\$] => Note creation time, [\$avatar\$] => User avatar, [\$reply\$] => Reply to the user if the reply is public") . "</div></td><tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Styles sheet to aply (give full URL)') . '</td><td>' . "<input type=\"text\" name=\"skincssurl\" size=\"50\" value=\"$skincssurl\" />" . "</td></tr>\n";



        return $sortida;
    }

}
