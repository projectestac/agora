<?php

class IWmenu_Api_User extends Zikula_AbstractApi {

    /**
     * Gets from the database all the items in first level menu
     * @author:     Albert Perez Monfort (aperezm@xtec.cat)
     * @return:	And array with the items information
     */
    public function getMenuStructure($args) {
        $values = array();

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $uid = is_null(UserUtil::getVar('uid')) ? '-1' : UserUtil::getVar('uid');
        $id = isset($args['id_parent']) ? $args['id_parent'] : 0;

        $pntable = DBUtil::getTables();
        $c = $pntable['IWmenu_column'];
        $where = "$c[id_parent]=$id AND $c[active]=1";
        $orderby = "$c[iorder]";

        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWmenu', $where, $orderby);

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        if (count($items) <= 0)
            return false;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');

        $iconbase = 'index.php?module=IWmenu&func=getFile&fileName=' . ModUtil::getVar('IWmenu', 'imagedir') . '/';

        $menuitems = Array();
        $numitem = 0;
        // get current lang code
        $currentLang = ZLanguage::getLanguageCode();
        foreach ($items as $item) {
            $itemTextArray = unserialize($item['text']);
            $item['text'] = (isset($itemTextArray[$currentLang])) ? $itemTextArray[$currentLang] : '';
            $itemUrlArray = unserialize($item['url']);
            $item['url'] = (isset($itemUrlArray[$currentLang])) ? $itemUrlArray[$currentLang] : '';
            $groups_vector = explode("$", $item['groups']);
            foreach ($groups_vector as $group) {
                $isMember = false;
                if ($group != '') {
                    $gids = explode("|", $group);
                    if ($uid != '-1') {
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $isMember = ModUtil::func('IWmain', 'user', 'isMember', array('uid' => $uid,
                                    'gid' => $gids[0],
                                    'sv' => $sv));
                    }
                    if ($item['text'] != '') {
                        if ($isMember || ($gids[0] == '-1' && $uid == '-1')) {
                            // Put target in detic_portal if available and selected
                            unset($menuitem);

                            $menuitem['text'] = $item['text'];

                            if (!empty($item['icon']))
                                $menuitem['icon'] = $iconbase . $item['icon'];

                            if ($item['target'] == 1) {
                                $menuitem['url'] = $item['url'];
                                $menuitem['target'] = ' target="_blank"';
                            } else if ($item['target'] == 2 && ModUtil::available('IWwebbox')) {
                                $url = str_replace('?', '**', $item['url']);
                                $url = str_replace('&', '*', $url);
                                $menuitem['url'] = 'index.php?module=IWwebbox&url=' . $url;
                                $menuitem['target'] = '';
                            } else {
                                $menuitem['url'] = $item['url'];
                                $menuitem['target'] = '';
                            }

                            $menuitem['is_parent'] = ($menuitem['children'] = ModUtil::apiFunc('IWmenu', 'user', 'getMenuStructure', array('id_parent' => $item['mid']))) ? 1 : 0;
                            $menuitems[$numitem] = $menuitem;
                            $numitem++;

                            break;
                        }
                    }
                }
            }
        }

        // Return the items
        return $menuitems;
    }

}