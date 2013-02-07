<?php
class IWmenu_Block_Top extends Zikula_Controller_AbstractBlock {
    public function init() {
        SecurityUtil::registerPermissionSchema('IWmenu:topblock:', 'Top menu');
    }

    public function info() {
        return array('text_type' => 'top',
            'module' => 'IWmenu',
            'text_type_long' => 'Top menu for IWmenu',
            'allow_multiple' => false,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => false,
            'admin_tableless' => false);
    }

    public function display($blockinfo) {
        // Security check (1)
        if (!SecurityUtil::checkPermission('IWmenu:topblock:', "$blockinfo[title]::", ACCESS_READ)) {
            return false;
        }

        // Check if the module is available. (2)
        if (!ModUtil::available('IWmenu')) {
            return false;
        }

        // Get variables from content block (3)
        //Get cached user menu
        $uid = is_null(UserUtil::getVar('uid')) ? '-1' : UserUtil::getVar('uid');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists',
                        array('name' => 'userMenu',
                            'module' => 'IWmenu',
                            'uid' => $uid,
                            'sv' => $sv));
        $exists = false;

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $menu = ModUtil::func('IWmain', 'user', 'userGetVar',
                            array('uid' => $uid,
                                'name' => 'userMenu',
                                'module' => 'IWmenu',
                                'sv' => $sv,
                                'nult' => true));
        } else {
            //Generate menu
            $menu_estructure = ModUtil::apiFunc('IWmenu', 'user', 'getMenuStructure');
            // Defaults (4)
            if (empty($menu_estructure)) {
                return false;
            }

            // Create output object (6)
            $view = Zikula_View::getInstance('IWmenu');

            // assign your data to to the template (7)
            $view->assign('menu', $menu_estructure);

            // Populate block info and pass to theme (8)
            $menu = $view->fetch('IWmenu_block_top.htm');

            //Cache the result
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar',
                            array('uid' => $uid,
                                'name' => 'userMenu',
                                'module' => 'IWmenu',
                                'sv' => $sv,
                                'value' => $menu,
                                'lifetime' => '600'));
        }


        //$blockinfo['content'] = $menu;
        //return BlockUtil::themesideblock($blockinfo);
        return $menu;
    }
}