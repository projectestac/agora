<?php
class IWmyrole_Block_Myrole extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     */
    public function init() {
        //SecurityUtil::registerPermissionSchema('myroleBlock::', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert Pérez Monfort (aperezm@xtec.cat)
     * @return       array       The block information
     */
    function info() {
        //Values
        return array('text_type' => 'IWmyrole',
                     'module' => 'IWmyrole',
                     'text_type_long' => $this->__('Show the groups or roles available and allow users change the group'),
                     'allow_multiple' => true,
                     'form_content' => false,
                     'form_refresh' => false,
                     'show_preview' => true);
    }

    /**
     * Gets topics information
     *
     * @author		Albert Pérez Monfort (aperezm@xtec.cat)
     * @author 		Josep Ferràndiz Farré (jferran6@xtec.cat)
     */
    public function display($row) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmyrole::', "::", ACCESS_ADMIN)) {
            return false;
        }

        $uid = UserUtil::getVar('uid');

        //Check if user belongs to change group. If not the block is not showed
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $isMember = ModUtil::func('IWmain', 'user', 'isMember',
                                   array('sv' => $sv,
                                         'gid' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                                         'uid' => $uid));

        if (!$isMember) {
            return false;
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $uidGroups = ModUtil::func('IWmain', 'user', 'getAllUserGroups',
                                    array('sv' => $sv,
                                          'uid' => $uid));
        foreach ($uidGroups as $g) {
            $originalGroups[$g['id']] = 1;
        }

        $view = Zikula_View::getInstance('IWmyrole', false);

        // Gets the groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $allGroups = ModUtil::func('IWmain', 'user', 'getAllGroups',
                                    array('sv' => $sv,
                                          'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));

        $groupsNotChangeable = ModUtil::getVar('IWmyrole', 'groupsNotChangeable');

        foreach ($allGroups as $group) {
            if (strpos($groupsNotChangeable, '$' . $group['id'] . '$') == false) $groupsArray[] = $group;
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $invalidChange = ModUtil::func('IWmain', 'user', 'userGetVar',
                                        array('uid' => $uid,
                                              'name' => 'invalidChange',
                                              'module' => 'IWmyrole',
                                              'nult' => true,
                                              'sv' => $sv));

        $view->assign('groups', $groupsArray);
        $view->assign('invalidChange', $invalidChange);
        $view->assign('roleGroups', $originalGroups);
        $s = $view->fetch('IWmyrole_block_change.htm');

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }
}