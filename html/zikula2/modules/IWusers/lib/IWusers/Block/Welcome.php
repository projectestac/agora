<?php

// TODO: create block options forms

class IWusers_Block_Welcome extends Zikula_Controller_AbstractBlock {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function init() {
        SecurityUtil::registerPermissionSchema("IWusers:welcomeblock:", "Block title::");
    }

    public function info() {

        return array('text_type' => 'Welcome',
            'func_edit' => 'welcome_edit',
            'func_update' => 'welcome_update',
            'module' => 'IWusers',
            'text_type_long' => $this->__('Show a welcome message wend user is in home page'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Show the month calendar into a bloc
     * @autor:	Albert Pérez Monfort
     * @autor:	Toni Ginard Lladó
     * param:	The month and the year to show
     * return:	The calendar content
     */
    public function display($blockinfo) {

        // Security check
        if (!SecurityUtil::checkPermission("IWusers:welcomeblock:", $blockinfo['title'] . "::", ACCESS_READ)) {
            return;
        }
        $baseURL = System::getBaseUrl();
        $baseURL .= 'index.php';
        if ('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] != $baseURL) {
            return;
        }
        // Check if the module is available
        if (!ModUtil::available('IWusers')) {
            return;
        }
        $user = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        // Only for loggedin users
        if ($user == '-1') {
            return;
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => $user,
                    'info' => 'n'));
        $values = explode('---', $blockinfo['url']);
        $hello = (!empty($values[0])) ? $values[0] : $this->__('Hi');
        $welcome = (!empty($values[0])) ? $values[1] : $this->__('welcome to the intranet');
        $date = (isset($values[2])) ? $values[2] : '';

        $s = $this->view->assign('userName', $userName)
                        ->assign('hello', $hello)
                        ->assign('welcome', $welcome)
                        ->assign('date', $date)
                        ->assign('dateText', date('d/m/Y', time()))
                        ->assign('timeText', date('H.i', time()))
                        ->fetch('IWusers_block_welcome.htm');
        // Populate block info and pass to theme
        $blockinfo['content'] = $s;
        return BlockUtil::themesideblock($blockinfo);
    }

    function welcome_update($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission("IWusers:welcomeblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) {
            return;
        }
        $url = $blockinfo['hello'] . '---' . $blockinfo['welcome'] . '---' . $blockinfo['date'];
        $blockinfo['url'] = "$url";
        return $blockinfo;
    }

    function welcome_edit($blockinfo) {

        // Security check
        if (!SecurityUtil::checkPermission("IWusers:welcomeblock:", $blockinfo['title'] . "::", ACCESS_ADMIN)) {
            return;
        }
        $values = explode('---', $blockinfo['url']);
        $hello = (!empty($values[0])) ? $values[0] : $this->__('Hi');
        $welcome = (!empty($values[1])) ? $values[1] : $this->__('welcome to the intranet');
        $date = $values[2];
        $checked = ($date == 1) ? 'checked' : '';
        $sortida = '<tr><td valign="top">' . $this->__('Geeting', $dom) . '</td><td>' . "<input type=\"text\" name=\"hello\" size=\"50\" maxlength=\"50\" value=\"$hello\" />" . "</td></tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Welcome text', $dom) . '</td><td>' . "<input type=\"text\" name=\"welcome\" size=\"50\" maxlength=\"50\" value=\"$welcome\" />" . "</td></tr>\n";
        $sortida .= '<tr><td valign="top">' . $this->__('Include date and time', $dom) . '</td><td>' . "<input type=\"checkbox\" name=\"date\"  value=\"1\" $checked />" . "</td></tr>\n";
        return $sortida;
    }

}