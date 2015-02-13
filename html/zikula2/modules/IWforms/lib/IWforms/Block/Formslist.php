<?php

class IWforms_Block_formslist extends Zikula_Controller_AbstractBlock {

    public function init() {
        SecurityUtil::registerPermissionSchema("IWforms:formslistblock:", "Block title::");
    }

    public function info() {
        return array('text_type' => 'FormsList',
            'module' => 'IWforms',
            'text_type_long' => $this->__('Display the list of forms where you can access the user'),
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
        if (!SecurityUtil::checkPermission("IWforms:formslistblock:", $blockinfo['title'] . "::", ACCESS_READ)) {
            return;
        }
        // Check if the module is available
        if (!ModUtil::available('IWforms')) {
            return;
        }
        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'formsListBlock' . $blockinfo['bid'],
                    'module' => 'IWforms',
                    'uid' => $uid,
                    'sv' => $sv));

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $have_flags = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                    'name' => 'have_flags',
                    'module' => 'IWmain_block_flagged',
                    'sv' => $sv));

//        $exists = false;

        if ($exists && $have_flags != 'fr') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'formsListBlock' . $blockinfo['bid'],
                        'module' => 'IWforms',
                        'sv' => $sv,
                        'nult' => true));
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
        }

        $userGroupsArray = array();
        //get all the active forms
        $forms = ModUtil::apiFunc('IWforms', 'user', 'getAllForms', array('user' => 1));
        //get all the groups of the user
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('uid' => $uid,
                    'sv' => $sv));
        foreach ($userGroups as $group) {
            $userGroupsArray[] = $group['id'];
        }
        $flagged = ModUtil::apiFunc('IWforms', 'user', 'getWhereFlagged');
        $validation = ModUtil::apiFunc('IWforms', 'user', 'getWhereNeedValidation');

        $values = unserialize($blockinfo['content']);

        //get categories
        $cats = explode('|', $values['categories']);
        $catsString = '$';
        foreach ($cats as $cat) {
            if ($cat != '') {
                $catsString .= '$' . $cat . '$';
            }
        }
        //Filter the forms where the user can access
        $forms_array = array();
        foreach ($forms as $form) {
            if ($catsString == '$' || strpos($catsString, '$' . $form['cid'] . '$') != false) {
                $access = ModUtil::func('IWforms', 'user', 'access', array('fid' => $form['fid'],
                            'userGroups' => $userGroupsArray));
                if ($access['level'] != 0) {
                    $isFlagged = (array_key_exists($form['fid'], $flagged)) ? 1 : 0;
                    $needValidation = (array_key_exists($form['fid'], $validation)) ? 1 : 0;
                    $new = ModUtil::func('IWforms', 'user', 'makeTimeForm', $form['new']);
                    $new = mktime(23, 59, 00, substr($new, 3, 2), substr($new, 0, 2), substr($new, 6, 2));
                    $newLabel = ($new > time()) ? true : false;
                    $formShortName = (strlen($form['formName']) > 17) ? $formShortName = mb_strimwidth($form['formName'], 0, 18, '...') : $formShortName = $form['formName'];
                    $formName = ($values['listBox'] == 1) ? $formShortName : $form['formName'];
                    //Whit all the information create the array to output
                    $forms_array[] = array('formName' => $formName,
                        'title' => $form['title'],
                        'accessLevel' => $access['level'],
                        'closeableInsert' => $form['closeableInsert'],
                        'isFlagged' => $isFlagged,
                        'needValidation' => $needValidation,
                        'closeInsert' => $form['closeInsert'],
                        'newLabel' => $newLabel,
                        'defaultValidation' => $access['defaultValidation'],
                        'fid' => $form['fid']);
                }
            }
        }
        // Create output object
        $view = Zikula_View::getInstance('IWforms', false);
        $view->assign('forms', $forms_array);
        $view->assign('listBox', $values['listBox']);
        $s = $view->fetch('IWforms_block_formsList.tpl');
        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
            'name' => 'formsListBlock' . $blockinfo['bid'],
            'module' => 'IWforms',
            'sv' => $sv,
            'value' => $s,
            'lifetime' => '750'));

        // Populate block info and pass to theme
        $blockinfo['content'] = $s;
        return BlockUtil::themesideblock($blockinfo);
    }

    function update($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWforms:formslistblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) {
            return;
        }

        $categories = FormUtil::getPassedValue('categories', '', 'POST');
        $listBox = (int) FormUtil::getPassedValue('listBox', 0, 'POST');

        $content = serialize(array('categories' => $categories,
            'listBox' => $listBox,
                ));
        $blockinfo['content'] = $content;
        return $blockinfo;
    }

    function modify($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWforms:formslistblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) {
            return;
        }

        $values = unserialize($blockinfo['content']);
        $categoriesValue = $values['categories'];
        $checked = ($values['listBox'] == 1) ? 'checked' : '';
        $sortida = '<tr><td valign="top">' . $this->__('Identities of the categories to show (default is all)') . '</td><td>' . "<input type=\"text\" name=\"categories\" size=\"50\" maxlength=\"50\" value=\"$categoriesValue\" />" . "</td></tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Show forms into a list') . '</td><td>' . "<input type=\"checkbox\" name=\"listBox\"  value=\"1\" $checked />" . "</td></tr>\n";
        return $sortida;
    }

    /**
     *
     * @param string $string String to "search" from
     * @param int $index Index of the letter we want.
     * @return string The letter found on $index.
     */
    function charAt($string, $index) {
        if ($index < mb_strlen($string)) {
            return mb_substr($string, $index, 1);
        } else {
            return -1;
        }
    }

}
