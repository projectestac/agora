<?php

class IWmenu_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the list of menu items created and do access to manage them
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:		The list of menu items
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Gets the groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));

        // Get the menu
        $menu = ModUtil::func('IWmenu', 'admin', 'getsubmenu', array('id_parent' => 0,
                    'grups_info' => $grupsInfo,
                    'level' => 0));
        $languages = ZLanguage::getInstalledLanguages();

        $i = 0;
        foreach ($menu as $item) {
            $newText = '';
            $newTextUrl = '';
            $itemArray = unserialize($item['text']);
            $itemArrayUrl = unserialize($item['url']);
            foreach ($languages as $lang) {
                $notDefinedOpen = (!isset($itemArray[$lang]) || $itemArray[$lang] == '') ? '<span style="color: red; font-weight: bold">' : '';
                $notDefinedClose = (!isset($itemArray[$lang]) || $itemArray[$lang] == '') ? '</span>' : '';
                $text = (!isset($itemArray[$lang]) || $itemArray[$lang] == '') ? '' : $itemArray[$lang];
                $newText .= $notDefinedOpen . $lang . $notDefinedClose . ' => ' . $text . '<br />';

                $notDefinedOpen = (!isset($itemArrayUrl[$lang]) || $itemArrayUrl[$lang] == '') ? '<span style="color: red; font-weight: bold">' : '';
                $notDefinedClose = (!isset($itemArrayUrl[$lang]) || $itemArrayUrl[$lang] == '') ? '</span>' : '';
                $text = (!isset($itemArrayUrl[$lang]) || $itemArrayUrl[$lang] == '') ? '' : $itemArrayUrl[$lang];
                $newTextUrl .= $notDefinedOpen . $this->__('URL ') . $lang . $notDefinedClose . ': => <a href="' . $text . '" target="_blank">' . $text . '</a><br />';
            }
            $menu[$i]['text'] = $newText;
            $menu[$i]['url'] = $newTextUrl;
            $i++;
        }

        return $this->view->assign('menuarray', $menu)
                        ->assign('image_folder', ModUtil::getVar('IWmenu', 'imagedir'))
                        ->fetch('IWmenu_admin_main.htm');
    }

    /**
     * Build an array with the submenu
     * @author:     Toni Ginard (aginard@xtec.cat)
     * @return:		An array with the submenu
     */
    public function getsubmenu($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $MenuData = array();

        // Get the data of each item
        $SubMenuData = ModUtil::apiFunc('IWmenu', 'admin', 'getall', array('id_parent' => $args['id_parent']));

        // This provides a way to know if there is another option in the same level, so down arrow must be shown or not
        $iter_number = count($SubMenuData);
        $curr_iter = 0;

        foreach ($SubMenuData as $option) {
            // Check whether to show down arrow or not
            $curr_iter++;
            if (($curr_iter < $iter_number)) {
                $downarrow = 1;
            } else {
                $downarrow = 0;
            }

            // Add the image triangles, one per sublevel
            for ($i = 0, $levelimg = ''; $i < $args['level']; $i++) {
                $levelimg .= "<img src='modules/IWmenu/images/level.gif' />";
            }

            // If the URL is empty, put ---
            ($option['url'] != '') ? $url = $option['url'] : $url = '---';

            // Get the groups and process them
            $groups = substr($option['groups'], 1, -1);
            $groups = explode('$$', $groups);
            $groups_array = '';
            foreach ($groups as $group) {
                if ($group != '') {
                    $name_group = ($group == '0' || !isset($args['grups_info'][$group])) ? $this->__('All') : $args['grups_info'][$group];
                    if ($group == '-1')
                        $name_group = $this->__('Unregistered');
                    $groups_array .= '<div><a href="index.php?module=IWmenu&amp;type=admin&amp;func=del_group&amp;group=' . $group . '&amp;mid=' . $option['mid'] . '"><img src="modules/IWmenu/images/delgroup.png" /></a> ';
                    $groups_array .= $name_group;
                    $groups_array .= '</div>';
                }
            }

            // Calculate the padding
            $padding = $args['level'] * 20;
            $padding .= 'px';

            // Build the option and put it within the menu
            $MenuData[] = array('mid' => $option['mid'],
                'text' => $option['text'],
                'descriu' => $option['descriu'],
                'level' => $levelimg,
                'url' => $url,
                'active' => $option['active'],
                'groups_array' => $groups_array,
                'icon' => $option['icon'],
                'imagepath' => ModUtil::getVar('IWmenu', 'imagedir') . '/' . $option['icon'],
                'id_parent' => $option['id_parent'],
                'padding' => $padding,
                'iorder' => $option['iorder'],
                'downarrow' => $downarrow);
            // Add the options
            $SubmenuData = ModUtil::func('IWmenu', 'admin', 'getsubmenu', array('id_parent' => $option['mid'],
                        'grups_info' => $args['grups_info'],
                        'level' => $args['level'] + 1));
            if (!empty($SubmenuData)) { // If the menu has items, save them
                foreach ($SubmenuData as $item) // This foreach converts an n-dimension array in a 1-dimension array, suitable for the template
                    $MenuData[] = $item;
            }
        }

        return $MenuData;
    }

    /**
     * Show the form that allow to choose a new group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the id of the item, the group, the subgroup and the group_db
     * @return:	The form with all the groups ans subgroups
     */
    public function add_group($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // A copy is required, so the information is loaded
        $registre = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $textArray = unserialize($registre['text']);
        $text = '';
        foreach ($textArray as $k => $v) {
            $text .= $k . ' => ' . $v . '<br />';
        }

        $registre['text'] = $text;

        $textArray = unserialize($registre['url']);
        $text = '';
        foreach ($textArray as $k => $v) {
            $text .= $k . ' => ' . $v . '<br />';
        }

        $registre['url'] = $text;

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        return $this->view->assign('mid', $mid)
                        ->assign('registre', $registre)
                        ->assign('grups', $grups)
                        ->fetch('IWmenu_admin_add_group.htm');
    }

    /**
     * Check the information received from the form of creation of a new group with access to the menu
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form received from the form
     * @return:	Redirect to the main admin page
     */
    public function create_add_group($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $groups_db = FormUtil::getPassedValue('groups_db', isset($args['groups_db']) ? $args['groups_db'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Construct the group string
        $groups = $groups_db . '$' . $grup . '$';

        // Modify the groups that have access to the menu item
        $lid = ModUtil::apiFunc('IWmenu', 'admin', 'modify_grup', array('mid' => $mid,
                    'groups' => $groups));
        if ($lid != false) {
            // A new entry has been created
            LogUtil::registerStatus($this->__('The access to the option has been granted to a group'));

            //Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        //Redirect to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Delete a group and subgroup with access to the menu item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item where a group is going to be deleted
     * @return:	True if success
     */
    public function del_group($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Gets the item information
        $registre = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $textArray = unserialize($registre['text']);
        $text = '';
        foreach ($textArray as $k => $v) {
            $text .= $k . ' => ' . $v . '<br />';
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv,
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));

        // Ask for confirmation
        if (empty($confirmation)) {
            $name_group = ($group == '0') ? $this->__('All') : $grupsInfo[$group];
            if ($group == '-1') {
                $name_group = $this->__('Unregistered');
            }
            $groups = str_replace('$' . $group . '$', '', $registre['groups']);
            $group = $name_group;

            return $this->view->assign('mid', $mid)
                            ->assign('groups', $groups)
                            ->assign('text', $text)
                            ->assign('group', $group)
                            ->fetch('IWmenu_admin_del_group.htm');
        }

        // user has confirmed the deletion
        // Confirm authorisation code
        $this->checkCsrfToken();

        // Modify the groups information in database
        if (ModUtil::apiFunc('IWmenu', 'admin', 'modify_grup', array('mid' => $mid,
                    'groups' => $groups))) {
            // L'esborrament ha estat un ï¿œxit i ho notifiquem
            LogUtil::registerStatus($this->__('The access of the group to the option has been revoked'));

            //Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Show a form needed to create a new menu item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The form needed to create a new item
     */
    public function newItem($args) {
        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // get available languages
        $languages = ZLanguage::getInstalledLanguages();

        $languagesTextArray = array();
        foreach ($languages as $lang) {
            $languagesTextArray[$lang] = '';
            $languagesUrlArray[$lang] = '';
        }

        $record = array('icon' => '',
            'text' => $languagesTextArray,
            'url' => $languagesUrlArray,
            'descriu' => '',
            'grup' => '',
            'target' => '',
            'id_parent' => '');

        // A copy is required, so the information is loaded
        if ($mid != null && $mid > 0) {
            $record = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
            if (!$record) {
                return LogUtil::registerError($this->__('Menu option not found'));
            }
            $record['text'] = unserialize($record['text']);
            $record['url'] = unserialize($record['url']);
        }
        switch ($m) {
            case 'n':
                $accio = $this->__('Add a new option to the menu');
                $acciosubmit = $this->__('Create the option of the menu');
                break;
            case 'e':
                $accio = $this->__('Option edit');
                $acciosubmit = $this->__('Save changes');
                break;
            case 'c':
                $accio = $this->__('Copy the option');
                $acciosubmit = $this->__('Copy');
                break;
            case 's':
                $accio = $this->__('Add a new option to the submenu');
                $acciosubmit = $this->__('Create the option of the submenu');
                break;
        }

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        // checks if the module IWwebbox is available in order to include the webbox as a target possibility
        $iwwebbox = (ModUtil::available('IWwebbox')) ? true : false;

        $filesPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');
        $folderExists = (file_exists($filesPath)) ? true : false;
        $writeable = (is_writeable($filesPath)) ? true : false;
        $folder = $folderExists && $writeable;

        return $this->view->assign('mid', $mid)
                        ->assign('imagePath', ModUtil::getVar('IWmenu', 'imagedir') . '/' . $record['icon'])
                        ->assign('m', $m)
                        ->assign('accio', $accio)
                        ->assign('folder', $folder)
                        ->assign('acciosubmit', $acciosubmit)
                        ->assign('record', $record)
                        ->assign('iwwebbox', $iwwebbox)
                        ->assign('grups', $grups)
                        ->assign('languages', $languages)
                        ->fetch('IWmenu_admin_new.htm');
    }

    /**
     * Check the information received from the form of creation of a item and call the api function to create it
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form information needed in case the form is reloaded
     * @return:	Redirect to the main admin page
     */
    public function create($args) {
        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'FILES');
        $iconEdited = FormUtil::getPassedValue('iconEdited', isset($args['iconEdited']) ? $args['iconEdited'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
        $deleteIcon = FormUtil::getPassedValue('deleteIcon', isset($args['deleteIcon']) ? $args['deleteIcon'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        // Confirm authorisation code
        $this->checkCsrfToken();

        $groups = ($m != 'c') ? $groups = '$' . $grup . '$' : $grup;
        $iconsFolderPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');

        $textSerialized = serialize($text);
        $urlSerialized = serialize($url);

        // Modify a menu item
        if ($m == 'e') {
            // get item from database
            $record = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
            if ($deleteIcon == 1) {
                $file = $iconsFolderPath . '/' . $record['icon'];
                if (file_exists($file)) {
                    unlink($file);
                }
                $iconEdited = '';
            }
            $lid = ModUtil::apiFunc('IWmenu', 'admin', 'update', array('mid' => $mid,
                        'text' => $textSerialized,
                        'descriu' => $descriu,
                        'active' => $active,
                        'target' => $target,
                        'url' => $urlSerialized,
                        'icon' => $iconEdited));
            if ($lid != false) {
                $lid = $mid; // copied in case the icon has been edited
                // A item has been modified
                LogUtil::registerStatus($this->__('The option has been updated successfully'));

                //Reset the users menus for all users
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                    'name' => 'userMenu',
                    'sv' => $sv));
            }
        } else {
            $lid = ModUtil::apiFunc('IWmenu', 'admin', 'create', array('text' => $textSerialized,
                        'descriu' => $descriu,
                        'active' => $active,
                        'target' => $target,
                        'url' => $urlSerialized,
                        'groups' => $groups,
                        'id_parent' => $id_parent,
                        'icon' => ''));
            if ($lid != false) {
                // A new entry has been created
                LogUtil::registerStatus($this->__('A new option has been created'));
            }
        }
        if ($lid != false) {
            if ($icon['name'] != '') {
                // get file extension
                $fileName = $icon['name'];
                $fileExtension = FileUtil::getExtension(strtolower($fileName));
                $fileNewName = $lid . '.' . $fileExtension;
                if ($fileExtension == 'gif' || $fileExtension == 'png' || $fileExtension == 'jpg') {
                    $destination = $iconsFolderPath . '/' . $fileNewName;
                    if (!move_uploaded_file($icon['tmp_name'], $destination)) {
                        LogUtil::registerError($this->__("The item has been created without the icon because the upload of the file has failed."));
                        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                    }
                    $width = 16;
                    $height = 16;
                    // thumbnail image to $width (max.) x $height (max.)
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $msg = ModUtil::func('IWmain', 'user', 'thumbnail', array('sv' => $sv,
                                'imgSource' => $destination,
                                'imgDest' => $destination,
                                'widthImg' => $width,
                                'heightImg' => $height));
                    if ($msg != '') {
                        LogUtil::registerError($msg);
                        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                    }
                } else {
                    LogUtil::registerError($this->__("The item has been created without the icon because the file extension for the icon is not valid."));
                    return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                }
                // change the image name acording with the new name
                ModUtil::apiFunc('IWmenu', 'admin', 'updateIcon', array('mid' => $lid,
                    'icon' => $fileNewName));
            }
        }

        //Reorder the menu items
        ModUtil::func('IWmenu', 'admin', 'reorder', array('id_parent' => 0));
        //Reset the users menus for all users
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
            'name' => 'userMenu',
            'sv' => $sv));
        //Redirect to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Show a form needed to create a new menu item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:
     * @return:	The form needed to create a new item
     */
    public function new_sub($args) {
        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get a menu item
        if ($mid != null && $mid > 0) {
            $registre = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
            if (!$registre) {
                return LogUtil::registerError($this->__('Menu option not found'));
            }
        }

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        // checks if the module IWwebbox is available in order to include the webbox as a target possibility
        $iwwebbox = (ModUtil::available('IWwebbox')) ? true : false;

        $filesPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');
        $folderExists = (file_exists($filesPath)) ? true : false;
        $writeable = (is_writeable($filesPath)) ? true : false;
        $folder = $folderExists && $writeable;

        // get available languages
        $languages = ZLanguage::getInstalledLanguages();

        return $this->view->assign('mid', $mid)
                        ->assign('folder', $folder)
                        ->assign('iwwebbox', $iwwebbox)
                        ->assign('initImagePath', ModUtil::getVar('IWmenu', 'imagedir'))
                        ->assign('grups', $grups)
                        ->assign('languages', $languages)
                        ->fetch('IWmenu_admin_new_sub.htm');
    }

    /**
     * Recursive function that returns all the menu items associated with a item of the first level
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		Array with the id of the item of the first level
     * @return:		The items information
     */
    public function menu_items($args) {
        // Get parameters from whatever input we need
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
        if (!empty($objectid)) {
            $id_parent = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        if ($id_parent != 0) {
            ModUtil::setVar('IWmenu', 'arbre', ModUtil::getVar('IWmenu', 'arbre') . $id_parent . '$');
        }
        $itemsmenu = ModUtil::apiFunc('IWmenu', 'admin', 'getall', array('id' => $id_parent));
        foreach ($itemsmenu as $itemmenu) {
            ModUtil::func('IWmenu', 'admin', 'menu_items', array('id_parent' => $itemmenu['mid']));
        }

        return $menuarray;
    }

    /**
     * Check the information received from the form of creation of a submenu item and call the api function to create it
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form information needed in case the form is reloaded
     * @return:	Redirect to the main admin page
     */
    public function create_sub($args) {
        // Get parameters from whatever input we need
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'FILES');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
        $level = FormUtil::getPassedValue('level', isset($args['level']) ? $args['level'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Construct the group string
        $groups = '$' . $grup . '$';

        $textSerialized = serialize($text);
        $urlSerialized = serialize($url);

        // Create a submenu item
        $lid = ModUtil::apiFunc('IWmenu', 'admin', 'create_sub', array('mid' => $mid,
                    'text' => $textSerialized,
                    'descriu' => $descriu,
                    'active' => $active,
                    'target' => $target,
                    'url' => $urlSerialized,
                    'groups' => $groups,
                    'id_parent' => $mid,
                    'level' => $level,
                    'icon' => $icon));
        if ($lid != false) {
            if ($icon['name'] != '') {
                $iconsFolderPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');
                // get file extension
                $fileName = $icon['name'];
                $fileExtension = FileUtil::getExtension(strtolower($fileName));
                $fileNewName = $lid . '.' . $fileExtension;
                if ($fileExtension == 'gif' || $fileExtension == 'png' || $fileExtension == 'jpg') {
                    $destination = $iconsFolderPath . '/' . $fileNewName;
                    if (!move_uploaded_file($icon['tmp_name'], $destination)) {
                        LogUtil::registerError($this->__("The item has been created without the icon because the upload of the file has failed."));
                        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                    }
                    $width = 16;
                    $height = 16;
                    // thumbnail image to $width (max.) x $height (max.)
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $msg = ModUtil::func('IWmain', 'user', 'thumbnail', array('sv' => $sv,
                                'imgSource' => $destination,
                                'imgDest' => $destination,
                                'widthImg' => $width,
                                'heightImg' => $height));
                    if ($msg != '') {
                        LogUtil::registerError($msg);
                        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                    }
                } else {
                    LogUtil::registerError($this->__("The item has been created without the icon because the file extension for the icon is not valid."));
                    return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
                }
                // change the image name acording with the new name
                ModUtil::apiFunc('IWmenu', 'admin', 'updateIcon', array('mid' => $lid,
                    'icon' => $fileNewName));
            }
            // Successfull creation
            LogUtil::registerStatus($this->__('A new option has been created'));

            // Reorder the menu items
            ModUtil::func('IWmenu', 'admin', 'reorder', array('id_parent' => $mid));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Show a form that allow to define the properties of the menu
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return:	Redirect to the admin config page
     */
    public function conf() {
        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $file = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');
        $noFolder = (!file_exists($file)) ? true : false;
        $writeable = (is_writeable($file)) ? true : false;
        $menu_vars = array('width' => ModUtil::getVar('IWmenu', 'width'),
            'imagedir' => ModUtil::getVar('IWmenu', 'imagedir'));

        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('multizk', $multizk)
                        ->assign('noFolder', $noFolder)
                        ->assign('writeable', $writeable)
                        ->assign('directoriroot', ModUtil::getVar('IWmain', 'documentRoot'))
                        ->assign('menu_vars', $menu_vars)
                        ->fetch('IWmenu_admin_conf.htm');
    }

    /**
     * Update the module vars with the properties of the menu
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form information needed
     * @return:	True if success
     */
    public function conf_update($args) {
        // Get parameters from whatever input we need
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $imagedir = FormUtil::getPassedValue('imagedir', isset($args['imagedir']) ? $args['imagedir'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        ModUtil::setVar('IWmenu', 'width', $width);
        ModUtil::setVar('IWmenu', 'imagedir', $imagedir);

        LogUtil::registerStatus($this->__('Menu configuration completed successfully'));

        // Reset the users menus for all users
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
            'name' => 'userMenu',
            'sv' => $sv));

        // Redirect to admin config page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'conf'));
    }

    /**
     * Delete a menu item and all the submenus if exists
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item that have to be deleted
     * @return:	True if success
     */
    public function delete($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $submenusId = FormUtil::getPassedValue('submenusId', isset($args['submenusId']) ? $args['submenusId'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Cridem la funciï¿œ de l'API de l'usuari que ens retornarï¿œ la inforamciï¿œ del registre demanat
        $registre = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $textArray = unserialize($registre['text']);

        // remove icon if exists
        $iconsFolderPath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWmenu', 'imagedir');
        if ($registre['icon'] != '') {
            $file = $iconsFolderPath . '/' . $registre['icon'];
            if (file_exists($file)) {
                unlink($file);
            }
        }

        // Ask for confirmation
        if (empty($confirmation)) {
            //get all the submenus that have to be deleted
            $submenusId_array = ModUtil::func('IWmenu', 'admin', 'getsubmenusIds', array('mid' => $mid));
            $submenusId = implode(",", $submenusId_array);
            // get current lang code
            $currentLang = ZLanguage::getLanguageCode();

            return $this->view->assign('text', $textArray[$currentLang])
                            ->assign('mid', $mid)
                            ->assign('submenusId', $submenusId)
                            ->fetch('IWmenu_admin_del.htm');
        }

        // User has confirmed the deletion
        // Confirm authorisation code
        $this->checkCsrfToken();

        if (ModUtil::apiFunc('IWmenu', 'admin', 'delete', array('submenusId' => $submenusId))) {
            // The deletion has been successful
            LogUtil::registerStatus($this->__('The option and its submenus have been deleted'));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Change the items order
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item where the order will be changed
     * @return:	Redirect user to admin main page
     */
    public function order($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GET');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'GET');
        $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // change item order
        // Get item information
        $item = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $iorder = ($puts == '-1') ? $item['iorder'] + 3 : $item['iorder'] - 3;
        ModUtil::apiFunc('IWmenu', 'admin', 'put_order', array('mid' => $mid,
            'iorder' => $iorder));

        // Reorder the items
        ModUtil::func('IWmenu', 'admin', 'reorder', array('id_parent' => $id_parent));

        // Reset the users menus for all users
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
            'name' => 'userMenu',
            'sv' => $sv));

        // Redirect to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Reorder the menu items
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item parent of the meu tree
     * @return:	Redirect user to admin main page
     */
    public function reorder($args) {
        // Get parameters from whatever input we need
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid)) {
            $id_parent = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get item information
        $items = ModUtil::apiFunc('IWmenu', 'admin', 'getall', array('id_parent' => $id_parent,
                    'mid' => $mid));
        if (!$items) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        // Reorder all the items with the values 0 2 4 6 8...
        foreach ($items as $item) {
            $i = $i + 2;
            ModUtil::apiFunc('IWmenu', 'admin', 'put_order', array('mid' => $item['mid'],
                'iorder' => $i));
        }

        //Redirect user to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Change position or id_parent of an item
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item and his parent
     * @return:	Redirect user to admin main page
     */
    public function movelevel($args) {
        // Get parameters from whatever input we need
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $upmid = FormUtil::getPassedValue('upmid', isset($args['upmid']) ? $args['upmid'] : null, 'POST');

        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Get item information
        $registre = ModUtil::apiFunc('IWmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $text = unserialize($registre['text']);

        // Ask confirmation to change the level
        if (empty($confirmation)) {
            //Agafem els nemï¿œs que tenen per id_parent el mateix que el registre que es vol pujar
            $records = ModUtil::apiFunc('IWmenu', 'admin', 'getall', array('id_parent' => '-1'));
            // get all the submenus from the menu
            $submenusId = ModUtil::func('IWmenu', 'admin', 'getsubmenusIds', array('mid' => $mid));

            // add the root in the records array
            $records_array[] = array('mid' => 0,
                'text' => $this->__('Root'));
            // get current lang code
            $currentLang = ZLanguage::getLanguageCode();
            foreach ($records as $record) {
                if (!in_array($record['mid'], $submenusId)) {
                    $textArray = unserialize($record['text']);
                    $records_array[] = array('mid' => $record['mid'],
                        'text' => $textArray[$currentLang]);
                }
            }

            return $this->view->assign('registres', $records_array)
                            ->assign('text', $text[$currentLang])
                            ->assign('mid', $mid)
                            ->fetch('IWmenu_admin_movelevel.htm');
        }

        // User has confirmed the action
        // Confirm authorisation code
        $this->checkCsrfToken();

        // Up the item level
        if (ModUtil::apiFunc('IWmenu', 'admin', 'move_level', array('mid' => $mid,
                    'id_parent' => $upmid))) {
            // Update successful
            LogUtil::registerStatus($this->__('The option has been moved to the parent level'));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWmenu', 'admin', 'main'));
    }

    /**
     * Get the submenus of a menu
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item and his parent
     * @return:	Return the submenus of a menu
     */
    public function getsubmenusIds($args) {
        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');

        if (!SecurityUtil::checkPermission('IWmenu::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $records_array[] = $mid;

        $records = ModUtil::apiFunc('IWmenu', 'admin', 'getall', array('id_parent' => $mid));

        foreach ($records as $record) {
            $submenusId = ModUtil::func('IWmenu', 'admin', 'getsubmenusIds', array('mid' => $record['mid']));
            $records_array = array_merge($records_array, $submenusId);
        }

        return $records_array;
    }

}