<?php

/**
 * Show the list of menu items created and do access to manage them
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		The list of menu items
 */
class IWvhmenu_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function main() {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct. If not return error
        $versionNeeded = '2.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }

        // Gets the groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));

        // Get the menu
        $menu = ModUtil::func('IWvhmenu', 'admin', 'getsubmenu', array('id_parent' => 0,
                    'grups_info' => $grupsInfo,
                    'level' => 0));

        // Pass the data to the template
        return $this->view->assign('menuarray', $menu)
                        ->assign('image_folder', ModUtil::getVar('IWvhmenu', 'imagedir'))
                        ->fetch('IWvhmenu_admin_main.htm');
    }

    /**
     * Build an array with the submenu
     * @author:     Toni Ginard (aginard@xtec.cat)
     * @return:		An array with the submenu
     */
    public function getsubmenu($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $MenuData = array();

        // Get the data of each item
        $SubMenuData = ModUtil::apiFunc('IWvhmenu', 'admin', 'getall', array('id_parent' => $args['id_parent']));

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
                $levelimg .= "<img src='modules/IWvhmenu/images/level.gif' />";
            }

            // If the URL is empty, put ---
            ($option['url'] != '') ? $url = $option['url'] : $url = '---';

            // Get the groups and process them
            $groups = substr($option['groups'], 0, -1);
            $groups = explode('$$', $groups);
            array_shift($groups);
            $groups_array = '';
            foreach ($groups as $group) {
                $group_subgroup = explode('|', $group);
                $name_group = ($group_subgroup[0] == '0') ? $this->__('All') : $args['grups_info'][$group_subgroup[0]];
                if ($group_subgroup[0] == '-1') {
                    $name_group = $this->__('Unregistered');
                }
                $name_subgroup = ($group_subgroup[1] == '0') ? $this->__('All') : '';
                $groups_array .= $name_group;
                if ($group_subgroup[1] != '0') {
                    $groups_array .= '/' . $name_subgroup;
                }
                $groups_array .= ' <a href="index.php?module=IWvhmenu&amp;type=admin&amp;func=del_group&amp;group=' . $group_subgroup[0] . '|' . $group_subgroup[1] . '&amp;mid=' . $option['mid'] . '"><img src="modules/IWvhmenu/images/del.gif" /></a><br />';
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
                'width' => $option['width'],
                'height' => $option['height'],
                'active' => $option['active'],
                'groups_array' => $groups_array,
                'bg_image' => $option['bg_image'],
                'imagepath' => ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $option['bg_image'],
                'id_parent' => $option['id_parent'],
                'iorder' => $option['iorder'],
                'grafic' => $option['grafic'],
                'imagepath1' => ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $option['image1'],
                'imagepath2' => ModUtil::getVar('IWvhmenu', 'imagedir') . '/' . $option['image2'],
                'padding' => $padding,
                'downarrow' => $downarrow);
            // Add the options
            $SubmenuData = ModUtil::func('IWvhmenu', 'admin', 'getsubmenu', array('id_parent' => $option['mid'],
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
     * Show a form needed to create a new menu item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The form needed to create a new item
     */
    public function newItem($args) {
        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $bg_image = FormUtil::getPassedValue('bg_image', isset($args['bg_image']) ? $args['bg_image'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $subgrup = FormUtil::getPassedValue('subgrup', isset($args['subgrup']) ? $args['subgrup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
        $canvi = FormUtil::getPassedValue('canvi', isset($args['canvi']) ? $args['canvi'] : null, 'POST');
        $grafic = FormUtil::getPassedValue('grafic', isset($args['grafic']) ? $args['grafic'] : null, 'POST');
        $image1 = FormUtil::getPassedValue('image1', isset($args['image1']) ? $args['image1'] : null, 'POST');
        $image2 = FormUtil::getPassedValue('image2', isset($args['image2']) ? $args['image2'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $images = array();

        // Init the height i width values
        $height = ($height == 0) ? ModUtil::getVar('IWvhmenu', 'height') : $height;
        $width = ($width == 0) ? ModUtil::getVar('IWvhmenu', 'width') : $width;

        // A copy is required, so the information is loaded
        if (!empty($mid) && !$canvi) {
            $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
            if (!$registre) {
                return LogUtil::registerError($this->__('Menu option not found'));
            }
            $text = $registre['text'];
            $descriu = $registre['descriu'];
            $url = $registre['url'];
            $bg_image = $registre['bg_image'];
            $height = $registre['height'];
            $width = $registre['width'];
            $active = $registre['active'];
            $target = $registre['target'];
            $id_parent = $registre['id_parent'];
            $grafic = $registre['grafic'];
            $image1 = $registre['image1'];
            $image2 = $registre['image2'];
            $grup = $registre['groups'];
        }

        // Get the images available in images directory
        $dir = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir');

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (strtolower(substr($file, -4)) == '.gif' ||
                            strtolower(substr($file, -4)) == '.jpg' ||
                            strtolower(substr($file, -4)) == '.bmp' ||
                            strtolower(substr($file, -4)) == '.png') {
                        $images[] = array('filename' => $file);
                    }
                }
                closedir($dh);
            }
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

        // get the subgroups of the intranet
        // Activate when IWgroups will be avaliable
        // $subgroups = $dades -> Subgrups($group,$this->__('All'));
        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        // get the intranet groups again without the possibility of all the groups
        $iwwebbox = (ModUtil::available('IWwebbox')) ? true : false;

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups1 = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));
        return $this->view->assign('mid', $mid)
                        ->assign('iwwebbox', $iwwebbox)
                        ->assign('text', $text)
                        ->assign('width', $width)
                        ->assign('height', $height)
                        ->assign('descriu', $descriu)
                        ->assign('bg_image', $bg_image)
                        ->assign('active', $active)
                        ->assign('m', $m)
                        ->assign('accio', $accio)
                        ->assign('acciosubmit', $acciosubmit)
                        ->assign('target', $target)
                        ->assign('url', $url)
                        ->assign('id_parent', $id_parent)
                        ->assign('images', $images)
                        ->assign('initImagePath', ModUtil::getVar('IWvhmenu', 'imagedir'))
                        ->assign('grafic', $grafic)
                        ->assign('image1', $image1)
                        ->assign('image2', $image2)
                        ->assign('grups', $grups)
                        ->assign('grup', $grup)
                        ->assign('subgrup', $subgrup)
                        ->fetch('IWvhmenu_admin_new.htm');
    }

    /**
     * Show a form needed to create a new menu item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	
     * @return:	The form needed to create a new item
     */
    public function new_sub($args) {

        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $bg_image = FormUtil::getPassedValue('bg_image', isset($args['bg_image']) ? $args['bg_image'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $subgrup = FormUtil::getPassedValue('subgrup', isset($args['subgrup']) ? $args['subgrup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : 0, 'POST');
        $canvi = FormUtil::getPassedValue('canvi', isset($args['canvi']) ? $args['canvi'] : null, 'POST');
        $grafic = FormUtil::getPassedValue('grafic', isset($args['grafic']) ? $args['grafic'] : null, 'POST');
        $image1 = FormUtil::getPassedValue('image1', isset($args['image1']) ? $args['image1'] : null, 'POST');
        $image2 = FormUtil::getPassedValue('image2', isset($args['image2']) ? $args['image2'] : null, 'POST');
        $level = FormUtil::getPassedValue('level', isset($args['level']) ? $args['level'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Get a menu item
        if (!empty($mid) && !$canvi) {
            $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
            if (!$registre) {
                return LogUtil::registerError($this->__('Menu option not found'));
            }
            $level = $level + 1;
        }

        // Get the images available in images directory
        $dir = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir');
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (strtolower(substr($file, -4)) == '.gif' ||
                            strtolower(substr($file, -4)) == '.jpg' ||
                            strtolower(substr($file, -4)) == '.bmp' ||
                            strtolower(substr($file, -4)) == '.png') {
                        $images[] = array('filename' => $file);
                    }
                }
                closedir($dh);
            }
        }

        // get the subgroups of the intranet
        // Activate when IWgroups will be avaliable
        // $subgroups = $dades -> Subgrups($group,$this->__('All'));
        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        // Init the height i width values
        $height = ($height == 0) ? ModUtil::getVar('IWvhmenu', 'height') : $height;
        $width = ($width == 0) ? ModUtil::getVar('IWvhmenu', 'width') : $width;

        // get the intranet groups again without the possibility of all the groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups1 = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));

        return $this->view->assign('mid', $mid)
                        ->assign('level', $level)
                        ->assign('text', $text)
                        ->assign('url', $url)
                        ->assign('descriu', $descriu)
                        ->assign('width', $width)
                        ->assign('height', $height)
                        ->assign('bg_image', $bg_image)
                        ->assign('images', $images)
                        ->assign('initImagePath', ModUtil::getVar('IWvhmenu', 'imagedir'))
                        ->assign('id_parent', $id_parent)
                        ->assign('grafic', $grafic)
                        ->assign('image1', $image1)
                        ->assign('image2', $image2)
                        ->assign('active', $active)
                        ->assign('grups', $grups)
                        ->assign('grup', $grup)
                        ->assign('subgrup', $subgrup)
                        ->fetch('IWvhmenu_admin_new_sub.htm');
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
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        if ($id_parent != 0) {
            $this->setVar('arbre', ModUtil::getVar('IWvhmenu', 'arbre') . $id_parent . '$');
        }
        $itemsmenu = ModUtil::apiFunc('IWvhmenu', 'admin', 'getall', array('id' => $id_parent));
        foreach ($itemsmenu as $itemmenu) {
            ModUtil::func('IWvhmenu', 'admin', 'menu_items', array('id_parent' => $itemmenu['mid']));
        }

        return $menuarray;
    }

    /**
     * Show the form that allow to choose a new group
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the id of the item, the group, the subgroup and the group_db
     * @return:	The form with all the groups ans subgroups
     */
    public function add_group($args) {

        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // A copy is required, so the information is loaded
        if (!empty($mid)) {
            $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
            if (!$registre) {
                return LogUtil::registerError($this->__('Menu option not found'));
            }
            $text = $registre['text'];
            $descriu = $registre['descriu'];
            $url = $registre['url'];
            $bg_image = $registre['bg_image'];
            $height = $registre['height'];
            $width = $registre['width'];
            $active = $registre['active'];
            $target = $registre['target'];
            $groups_db = $registre['groups'];
        } else {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        // get the intranet groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup'),
                    'sv' => $sv));
        $grups[] = array('id' => '-1',
            'name' => $this->__('Unregistered'));

        return $this->view->assign('mid', $mid)
                        ->assign('text', $text)
                        ->assign('descriu', $descriu)
                        ->assign('url', $url)
                        ->assign('groups_db', $groups_db)
                        ->assign('grups', $grups)
                        ->fetch('IWvhmenu_admin_add_group.htm');
    }

    /**
     * Check the information received from the form of creation of a item and call the api function to create it
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form information needed in case the form is reloaded
     * @return:	Redirect to the main admin page
     */
    public function create($args) {

        // Get parameters from whatever input we need.
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $bg_image = FormUtil::getPassedValue('bg_image', isset($args['bg_image']) ? $args['bg_image'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $subgrup = FormUtil::getPassedValue('subgrup', isset($args['subgrup']) ? $args['subgrup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'REQUEST');
        $grafic = FormUtil::getPassedValue('grafic', isset($args['grafic']) ? $args['grafic'] : null, 'POST');
        $image1 = FormUtil::getPassedValue('image1', isset($args['image1']) ? $args['image1'] : null, 'POST');
        $image2 = FormUtil::getPassedValue('image2', isset($args['image2']) ? $args['image2'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $this->checkCsrfToken();

        $active = ($active == 'on') ? 1 : 0;
        $grafic = ($grafic == 'on') ? 1 : 0;

        if ($m != 'c') {
            // Construct the groups string
            (!isset($subgrup)) ? $subgrup = 0 : "";
            $groups = '$$' . $grup . '|' . $subgrup . '$';
        } else {
            $groups = $grup;
        }

        // Modify a menu item
        if ($m == 'e') {
            $lid = ModUtil::apiFunc('IWvhmenu', 'admin', 'update', array('mid' => $mid,
                        'text' => $text,
                        'descriu' => $descriu,
                        'active' => $active,
                        'target' => $target,
                        'url' => $url,
                        'width' => $width,
                        'height' => $height,
                        'bg_image' => $bg_image,
                        'grafic' => $grafic,
                        'image1' => $image1,
                        'image2' => $image2));
            if ($lid != false) {
                // A item has been modified
                LogUtil::registerStatus($this->__('The option has been updated successfully'));

                //Reset the users menus for all users
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                    'name' => 'userMenu',
                    'sv' => $sv));
            }
        } else {
            $lid = ModUtil::apiFunc('IWvhmenu', 'admin', 'create', array('text' => $text,
                        'descriu' => $descriu,
                        'active' => $active,
                        'target' => $target,
                        'url' => $url,
                        'groups' => $groups,
                        'width' => $width,
                        'height' => $height,
                        'id_parent' => $id_parent,
                        'bg_image' => $bg_image,
                        'grafic' => $grafic,
                        'image1' => $image1,
                        'image2' => $image2));
            if ($lid != false) {
                // A new entry has been created
                LogUtil::registerStatus($this->__('A new option has been created'));

                //Reorder the menu items
                ModUtil::func('IWvhmenu', 'admin', 'reorder', array('id_parent' => 0));

                //Reset the users menus for all users
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                    'name' => 'userMenu',
                    'sv' => $sv));
            }
        }

        //Redirect to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
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
        $target = FormUtil::getPassedValue('target', isset($args['target']) ? $args['target'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $subgrup = FormUtil::getPassedValue('subgrup', isset($args['subgrup']) ? $args['subgrup'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
        $level = FormUtil::getPassedValue('level', isset($args['level']) ? $args['level'] : null, 'POST');
        $bg_image = FormUtil::getPassedValue('bg_image', isset($args['bg_image']) ? $args['bg_image'] : null, 'POST');
        $grafic = FormUtil::getPassedValue('grafic', isset($args['grafic']) ? $args['grafic'] : null, 'POST');
        $image1 = FormUtil::getPassedValue('image1', isset($args['image1']) ? $args['image1'] : null, 'POST');
        $image2 = FormUtil::getPassedValue('image2', isset($args['image2']) ? $args['image2'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $this->checkCsrfToken();

        $active = ($active == 'on') ? 1 : 0;
        $grafic = ($grafic == 'on') ? 1 : 0;

        // Construct the group string
        $subgrup = (!isset($subgrup)) ? 0 : "";
        $groups = '$$' . $grup . '|' . $subgrup . '$';

        // Create a submenu item
        $lid = ModUtil::apiFunc('IWvhmenu', 'admin', 'create_sub', array('mid' => $mid,
                    'text' => $text,
                    'descriu' => $descriu,
                    'active' => $active,
                    'target' => $target,
                    'url' => $url,
                    'groups' => $groups,
                    'width' => $width,
                    'height' => $height,
                    'id_parent' => $mid,
                    'level' => $level,
                    'bg_image' => $bg_image,
                    'grafic' => $grafic,
                    'image1' => $image1,
                    'image2' => $image2));
        if ($lid != false) {
            // Successfull creation
            LogUtil::registerStatus($this->__('A new option has been created'));

            // Reorder the menu items
            ModUtil::func('IWvhmenu', 'admin', 'reorder', array('id_parent' => $mid));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Check the information received from the form of creation of a new group with access to the menu
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form received from the form
     * @return:	Redirect to the main admin page
     */
    public function create_add_group($args) {

        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $subgrup = FormUtil::getPassedValue('subgrup', isset($args['subgrup']) ? $args['subgrup'] : null, 'POST');
        $groups_db = FormUtil::getPassedValue('groups_db', isset($args['groups_db']) ? $args['groups_db'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $this->checkCsrfToken();

        // Construct the group string
        $subgrup = (!isset($subgrup)) ? 0 : "";
        $groups = $groups_db . '$' . $grup . '|' . $subgrup . '$';

        // Modify the groups that have access to the menu item
        $lid = ModUtil::apiFunc('IWvhmenu', 'admin', 'modify_grup', array('mid' => $mid,
                    'groups' => $groups));
        if ($lid != false) {
            // A new entry has been created
            LogUtil::registerStatus($this->__('The access to the option has been granted to a group'));

            //Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        //Redirect to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Show a form that allow to define the properties of the menu
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	Redirect to the admin config page
     */
    public function conf() {

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $noFolder = (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWvhmenu', 'imagedir'))) ? true : false;

        $menu_vars = array('LowBgColor' => ModUtil::getVar('IWvhmenu', 'LowBgColor'),
            'LowSubBgColor' => ModUtil::getVar('IWvhmenu', 'LowSubBgColor'),
            'HighBgColor' => ModUtil::getVar('IWvhmenu', 'HighBgColor'),
            'HighSubBgColor' => ModUtil::getVar('IWvhmenu', 'HighSubBgColor'),
            'FontLowColor' => ModUtil::getVar('IWvhmenu', 'FontLowColor'),
            'FontSubLowColor' => ModUtil::getVar('IWvhmenu', 'FontSubLowColor'),
            'FontHighColor' => ModUtil::getVar('IWvhmenu', 'FontHighColor'),
            'FontSubHighColor' => ModUtil::getVar('IWvhmenu', 'FontSubHighColor'),
            'BorderColor' => ModUtil::getVar('IWvhmenu', 'BorderColor'),
            'BorderSubColor' => ModUtil::getVar('IWvhmenu', 'BorderSubColor'),
            'BorderWidth' => ModUtil::getVar('IWvhmenu', 'BorderWidth'),
            'BorderBtwnElmnts' => ModUtil::getVar('IWvhmenu', 'BorderBtwnElmnts'),
            'FontFamily' => ModUtil::getVar('IWvhmenu', 'FontFamily'),
            'FontSize' => ModUtil::getVar('IWvhmenu', 'FontSize'),
            'FontBold' => ModUtil::getVar('IWvhmenu', 'FontBold'),
            'FontItalic' => ModUtil::getVar('IWvhmenu', 'FontItalic'),
            'MenuTextCentered' => ModUtil::getVar('IWvhmenu', 'MenuTextCentered'),
            'MenuCentered' => ModUtil::getVar('IWvhmenu', 'MenuCentered'),
            'MenuVerticalCentered' => ModUtil::getVar('IWvhmenu', 'MenuVerticalCentered'),
            'ChildOverlap' => ModUtil::getVar('IWvhmenu', 'ChildOverlap'),
            'ChildVerticalOverlap' => ModUtil::getVar('IWvhmenu', 'ChildVerticalOverlap'),
            'StartTop' => ModUtil::getVar('IWvhmenu', 'StartTop'),
            'StartLeft' => ModUtil::getVar('IWvhmenu', 'StartLeft'),
            'VerCorrect' => ModUtil::getVar('IWvhmenu', 'VerCorrect'),
            'HorCorrect' => ModUtil::getVar('IWvhmenu', 'HorCorrect'),
            'LeftPaddng' => ModUtil::getVar('IWvhmenu', 'LeftPaddng'),
            'TopPaddng' => ModUtil::getVar('IWvhmenu', 'TopPaddng'),
            'FirstLineHorizontal' => ModUtil::getVar('IWvhmenu', 'FirstLineHorizontal'),
            'MenuFramesVertical' => ModUtil::getVar('IWvhmenu', 'MenuFramesVertical'),
            'DissapearDelay' => ModUtil::getVar('IWvhmenu', 'DissapearDelay'),
            'TakeOverBgColor' => ModUtil::getVar('IWvhmenu', 'TakeOverBgColor'),
            'FirstLineFrame' => ModUtil::getVar('IWvhmenu', 'FirstLineFrame'),
            'SecLineFrame' => ModUtil::getVar('IWvhmenu', 'SecLineFrame'),
            'DocTargetFrame' => ModUtil::getVar('IWvhmenu', 'DocTargetFrame'),
            'TargetLoc' => ModUtil::getVar('IWvhmenu', 'TargetLoc'),
            'HideTop' => ModUtil::getVar('IWvhmenu', 'HideTop'),
            'MenuWrap' => ModUtil::getVar('IWvhmenu', 'MenuWrap'),
            'RightToLeft' => ModUtil::getVar('IWvhmenu', 'RightToLeft'),
            'UnfoldsOnClick' => ModUtil::getVar('IWvhmenu', 'UnfoldsOnClick'),
            'WebMasterCheck' => ModUtil::getVar('IWvhmenu', 'WebMasterCheck'),
            'ShowArrow' => ModUtil::getVar('IWvhmenu', 'ShowArrow'),
            'KeepHilite' => ModUtil::getVar('IWvhmenu', 'KeepHilite'),
            'height' => ModUtil::getVar('IWvhmenu', 'height'),
            'width' => ModUtil::getVar('IWvhmenu', 'width'),
            'imagedir' => ModUtil::getVar('IWvhmenu', 'imagedir'));


        $multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('noFolder', $noFolder)
                        ->assign('multizk', $multizk)
                        ->assign('directoriroot', ModUtil::getVar('IWmain', 'documentRoot'))
                        ->assign('menu_vars', $menu_vars)
                        ->fetch('IWvhmenu_admin_conf.htm');
    }

    /**
     * Update the module vars with the properties of the menu
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the form information needed
     * @return:	True if success
     */
    public function conf_update($args) {

        // Get parameters from whatever input we need
        $LowBgColor = FormUtil::getPassedValue('LowBgColor', isset($args['LowBgColor']) ? $args['LowBgColor'] : null, 'POST');
        $LowSubBgColor = FormUtil::getPassedValue('LowSubBgColor', isset($args['LowSubBgColor']) ? $args['LowSubBgColor'] : null, 'POST');
        $HighBgColor = FormUtil::getPassedValue('HighBgColor', isset($args['HighBgColor']) ? $args['HighBgColor'] : null, 'POST');
        $HighSubBgColor = FormUtil::getPassedValue('HighSubBgColor', isset($args['HighSubBgColor']) ? $args['HighSubBgColor'] : null, 'POST');
        $FontLowColor = FormUtil::getPassedValue('FontLowColor', isset($args['FontLowColor']) ? $args['FontLowColor'] : null, 'POST');
        $FontSubLowColor = FormUtil::getPassedValue('FontSubLowColor', isset($args['FontSubLowColor']) ? $args['FontSubLowColor'] : null, 'POST');
        $FontHighColor = FormUtil::getPassedValue('FontHighColor', isset($args['FontHighColor']) ? $args['FontHighColor'] : null, 'POST');
        $FontSubHighColor = FormUtil::getPassedValue('FontSubHighColor', isset($args['FontSubHighColor']) ? $args['FontSubHighColor'] : null, 'POST');
        $BorderColor = FormUtil::getPassedValue('BorderColor', isset($args['BorderColor']) ? $args['BorderColor'] : null, 'POST');
        $BorderSubColor = FormUtil::getPassedValue('BorderSubColor', isset($args['BorderSubColor']) ? $args['BorderSubColor'] : null, 'POST');
        $BorderWidth = FormUtil::getPassedValue('BorderWidth', isset($args['BorderWidth']) ? $args['BorderWidth'] : null, 'POST');
        $BorderBtwnElmnts = FormUtil::getPassedValue('BorderBtwnElmnts', isset($args['BorderBtwnElmnts']) ? $args['BorderBtwnElmnts'] : null, 'POST');
        $FontFamily = FormUtil::getPassedValue('FontFamily', isset($args['FontFamily']) ? $args['FontFamily'] : null, 'POST');
        $FontSize = FormUtil::getPassedValue('FontSize', isset($args['FontSize']) ? $args['FontSize'] : null, 'POST');
        $FontBold = FormUtil::getPassedValue('FontBold', isset($args['FontBold']) ? $args['FontBold'] : null, 'POST');
        $FontItalic = FormUtil::getPassedValue('FontItalic', isset($args['FontItalic']) ? $args['FontItalic'] : null, 'POST');
        $MenuTextCentered = FormUtil::getPassedValue('MenuTextCentered', isset($args['MenuTextCentered']) ? $args['MenuTextCentered'] : null, 'POST');
        $MenuCentered = FormUtil::getPassedValue('MenuCentered', isset($args['MenuCentered']) ? $args['MenuCentered'] : null, 'POST');
        $MenuVerticalCentered = FormUtil::getPassedValue('MenuVerticalCentered', isset($args['MenuVerticalCentered']) ? $args['MenuVerticalCentered'] : null, 'POST');
        $ChildOverlap = FormUtil::getPassedValue('ChildOverlap', isset($args['ChildOverlap']) ? $args['ChildOverlap'] : null, 'POST');
        $ChildVerticalOverlap = FormUtil::getPassedValue('ChildVerticalOverlap', isset($args['ChildVerticalOverlap']) ? $args['ChildVerticalOverlap'] : null, 'POST');
        $StartTop = FormUtil::getPassedValue('StartTop', isset($args['StartTop']) ? $args['StartTop'] : null, 'POST');
        $StartLeft = FormUtil::getPassedValue('StartLeft', isset($args['StartLeft']) ? $args['StartLeft'] : null, 'POST');
        $VerCorrect = FormUtil::getPassedValue('VerCorrect', isset($args['VerCorrect']) ? $args['VerCorrect'] : null, 'POST');
        $HorCorrect = FormUtil::getPassedValue('HorCorrect', isset($args['HorCorrect']) ? $args['HorCorrect'] : null, 'POST');
        $LeftPaddng = FormUtil::getPassedValue('LeftPaddng', isset($args['LeftPaddng']) ? $args['LeftPaddng'] : null, 'POST');
        $TopPaddng = FormUtil::getPassedValue('TopPaddng', isset($args['TopPaddng']) ? $args['TopPaddng'] : null, 'POST');
        $FirstLineHorizontal = FormUtil::getPassedValue('FirstLineHorizontal', isset($args['FirstLineHorizontal']) ? $args['FirstLineHorizontal'] : null, 'POST');
        $MenuFramesVertical = FormUtil::getPassedValue('MenuFramesVertical', isset($args['MenuFramesVertical']) ? $args['MenuFramesVertical'] : null, 'POST');
        $DissapearDelay = FormUtil::getPassedValue('DissapearDelay', isset($args['DissapearDelay']) ? $args['DissapearDelay'] : null, 'POST');
        $TakeOverBgColor = FormUtil::getPassedValue('TakeOverBgColor', isset($args['TakeOverBgColor']) ? $args['TakeOverBgColor'] : null, 'POST');
        $FirstLineFrame = FormUtil::getPassedValue('FirstLineFrame', isset($args['FirstLineFrame']) ? $args['FirstLineFrame'] : null, 'POST');
        $SecLineFrame = FormUtil::getPassedValue('SecLineFrame', isset($args['SecLineFrame']) ? $args['SecLineFrame'] : null, 'POST');
        $DocTargetFrame = FormUtil::getPassedValue('DocTargetFrame', isset($args['DocTargetFrame']) ? $args['DocTargetFrame'] : null, 'POST');
        $TargetLoc = FormUtil::getPassedValue('TargetLoc', isset($args['TargetLoc']) ? $args['TargetLoc'] : null, 'POST');
        $HideTop = FormUtil::getPassedValue('HideTop', isset($args['HideTop']) ? $args['HideTop'] : null, 'POST');
        $MenuWrap = FormUtil::getPassedValue('MenuWrap', isset($args['MenuWrap']) ? $args['MenuWrap'] : null, 'POST');
        $RightToLeft = FormUtil::getPassedValue('RightToLeft', isset($args['RightToLeft']) ? $args['RightToLeft'] : null, 'POST');
        $UnfoldsOnClick = FormUtil::getPassedValue('UnfoldsOnClick', isset($args['UnfoldsOnClick']) ? $args['UnfoldsOnClick'] : null, 'POST');
        $WebMasterCheck = FormUtil::getPassedValue('WebMasterCheck', isset($args['WebMasterCheck']) ? $args['WebMasterCheck'] : null, 'POST');
        $ShowArrow = FormUtil::getPassedValue('ShowArrow', isset($args['ShowArrow']) ? $args['ShowArrow'] : null, 'POST');
        $KeepHilite = FormUtil::getPassedValue('KeepHilite', isset($args['KeepHilite']) ? $args['KeepHilite'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $imagedir = FormUtil::getPassedValue('imagedir', isset($args['imagedir']) ? $args['imagedir'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $BorderBtwnElmnts = ($BorderBtwnElmnts == 'on') ? 1 : 0;
        $FontBold = ($FontBold == 'on') ? 1 : 0;
        $FontItalic = ($FontItalic == 'on') ? 1 : 0;
        $HideTop = ($HideTop == 'on') ? 1 : 0;
        $MenuWrap = ($MenuWrap == 'on') ? 1 : 0;
        $RightToLeft = ($RightToLeft == 'on') ? 1 : 0;
        $UnfoldsOnClick = ($UnfoldsOnClick == 'on') ? 1 : 0;
        $WebMasterCheck = ($WebMasterCheck == 'on') ? 1 : 0;
        $ShowArrow = ($ShowArrow == 'on') ? 1 : 0;
        $KeepHilite = ($KeepHilite == 'on') ? 1 : 0;

        $this->checkCsrfToken();

        $this->setVar('LowBgColor', $LowBgColor)
                ->setVar('LowSubBgColor', $LowSubBgColor)
                ->setVar('HighBgColor', $HighBgColor)
                ->setVar('HighSubBgColor', $HighSubBgColor)
                ->setVar('FontLowColor', $FontLowColor)
                ->setVar('FontSubLowColor', $FontSubLowColor)
                ->setVar('FontHighColor', $FontHighColor)
                ->setVar('FontSubHighColor', $FontSubHighColor)
                ->setVar('BorderColor', $BorderColor)
                ->setVar('BorderSubColor', $BorderSubColor)
                ->setVar('BorderWidth', $BorderWidth)
                ->setVar('BorderBtwnElmnts', $BorderBtwnElmnts)
                ->setVar('FontFamily', $FontFamily)
                ->setVar('FontSize', $FontSize)
                ->setVar('FontBold', $FontBold)
                ->setVar('FontItalic', $FontItalic)
                ->setVar('MenuTextCentered', $MenuTextCentered)
                ->setVar('MenuCentered', $MenuCentered)
                ->setVar('MenuVerticalCentered', $MenuVerticalCentered)
                ->setVar('ChildOverlap', $ChildOverlap)
                ->setVar('ChildVerticalOverlap', $ChildVerticalOverlap)
                ->setVar('StartTop', $StartTop)
                ->setVar('StartLeft', $StartLeft)
                ->setVar('LeftPaddng', $LeftPaddng)
                ->setVar('TopPaddng', $TopPaddng)
                ->setVar('FirstLineHorizontal', $FirstLineHorizontal)
                ->setVar('DissapearDelay', $DissapearDelay)
                ->setVar('RightToLeft', $RightToLeft)
                ->setVar('UnfoldsOnClick', $UnfoldsOnClick)
                ->setVar('ShowArrow', $ShowArrow)
                ->setVar('KeepHilite', $KeepHilite)
                ->setVar('height', $height)
                ->setVar('width', $width)
                ->setVar('imagedir', $imagedir);

        LogUtil::registerStatus($this->__('Menu configuration completed successfully'));

        // Reset the users menus for all users
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
            'name' => 'userMenu',
            'sv' => $sv));

        // Redirect to admin config page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'conf'));
    }

    /**
     * Delete a menu item and all the submenus if exists
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item that have to be deleted
     * @return:	True if success
     */
    public function delete($args) {

        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $submenusId = FormUtil::getPassedValue('submenusId', isset($args['submenusId']) ? $args['submenusId'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        //Cridem la funciï¿œ de l'API de l'usuari que ens retornarï¿œ la inforamciï¿œ del registre demanat
        $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        // Ask for confirmation
        if (empty($confirmation)) {
            //get all the submenus that have to be deleted
            $submenusId_array = ModUtil::func('IWvhmenu', 'admin', 'getsubmenusIds', array('mid' => $mid));
            $submenusId = implode(",", $submenusId_array);
            return $this->view->assign('text', $registre['text'])
                            ->assign('mid', $mid)
                            ->assign('submenusId', $submenusId)
                            ->fetch('IWvhmenu_admin_del.htm');
        }

        // User has confirmed the deletion
        $this->checkCsrfToken();

        if (ModUtil::apiFunc('IWvhmenu', 'admin', 'delete', array('submenusId' => $submenusId))) {
            // The deletion has been successful
            LogUtil::registerStatus($this->__('The option and its submenus have been deleted'));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
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
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Gets the item information
        $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv,
                    'less' => ModUtil::getVar('IWmyrole', 'rolegroup')));

        // Ask for confirmation
        if (empty($confirmation)) {
            $group_subgroup = explode('|', $group);
            $name_group = ($group_subgroup[0] == '0') ? $this->__('All') : $grupsInfo[$group_subgroup[0]];
            if ($group_subgroup[0] == '-1') {
                $name_group = $this->__('Unregistered');
            }
            $name_subgroup = ($group_subgroup[1] == '0') ? $this->__('All') : ''; //$dades -> infoSubgrup($group_subgroup[1]);
            $groups = str_replace('$' . $group . '$', '', $registre['groups']);
            $group = $name_group;
            if ($group_subgroup[1] != '0') {
                $group .= '/' . $name_subgroup;
            }

            return $this->view->assign('mid', $mid)
                            ->assign('groups', $groups)
                            ->assign('text', $registre['text'])
                            ->assign('group', $group)
                            ->fetch('IWvhmenu_admin_del_group.htm');
        }

        // User has confirmed the deletion
        $this->checkCsrfToken();

        // Modify the groups information in database
        if (ModUtil::apiFunc('IWvhmenu', 'admin', 'modify_grup', array('mid' => $mid,
                    'groups' => $groups))) {
            // L'esborrament ha estat un ï¿œxit i ho notifiquem
            LogUtil::registerStatus($this->__('The access of the group to the option has been revoked'));

            //Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Change the items order
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item where the order will be changed
     * @return:	Redirect user to admin main page
     */
    public function order($args) {

        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GET');
        $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'GET');
        $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'GET');

        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // change item order
        // Get item information
        $item = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$item) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        $iorder = ($puts == '-1') ? $item['iorder'] + 3 : $item['iorder'] - 3;
        ModUtil::apiFunc('IWvhmenu', 'admin', 'put_order', array('mid' => $mid,
            'iorder' => $iorder));

        // Reorder the items
        ModUtil::func('IWvhmenu', 'admin', 'reorder', array('id_parent' => $id_parent));

        // Reset the users menus for all users
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
            'name' => 'userMenu',
            'sv' => $sv));

        // Redirect to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Reorder the menu items
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
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
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Get item information
        $items = ModUtil::apiFunc('IWvhmenu', 'admin', 'getall', array('id_parent' => $id_parent,
                    'mid' => $mid));
        if (!$items) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        // Reorder all the items with the values 0 2 4 6 8...
        foreach ($items as $item) {
            $i = $i + 2;
            ModUtil::apiFunc('IWvhmenu', 'admin', 'put_order', array('mid' => $item['mid'],
                'iorder' => $i));
        }

        //Redirect user to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Change position or id_parent of an item
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item and his parent
     * @return:	Redirect user to admin main page
     */
    public function movelevel($args) {

        // Get parameters from whatever input we need
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
        $upmid = FormUtil::getPassedValue('upmid', isset($args['upmid']) ? $args['upmid'] : null, 'POST');

        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Get item information
        $registre = ModUtil::apiFunc('IWvhmenu', 'admin', 'get', array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError($this->__('Menu option not found'));
        }

        // Ask confirmation to change the level
        if (empty($confirmation)) {
            //Agafem els nemï¿œs que tenen per id_parent el mateix que el registre que es vol pujar
            $records = ModUtil::apiFunc('IWvhmenu', 'admin', 'getall', array('id_parent' => '-1'));
            // get all the submenus from the menu
            $submenusId = ModUtil::func('IWvhmenu', 'admin', 'getsubmenusIds', array('mid' => $mid));

            // add the root in the records array
            $records_array[] = array('mid' => 0, 'text' => $this->__('Root'));
            foreach ($records as $record) {
                if (!in_array($record['mid'], $submenusId)) {
                    $records_array[] = array('mid' => $record['mid'], 'text' => $record['text']);
                }
            }

            return $this->view->assign('registres', $records_array)
                            ->assign('text', $registre['text'])
                            ->assign('mid', $mid)
                            ->fetch('IWvhmenu_admin_movelevel.htm');
        }

        // User has confirmed the action
        $this->checkCsrfToken();

        // Up the item level
        if (ModUtil::apiFunc('IWvhmenu', 'admin', 'move_level', array('mid' => $mid,
                    'id_parent' => $upmid))) {
            // Update successful
            LogUtil::registerStatus($this->__('The option has been moved to the parent level'));

            // Reset the users menus for all users
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'usersVarsDelModule', array('module' => 'IWvhmenu',
                'name' => 'userMenu',
                'sv' => $sv));
        }

        // Redirect user to admin main page
        return System::redirect(ModUtil::url('IWvhmenu', 'admin', 'main'));
    }

    /**
     * Get the submenus of a menu
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Array with the identity of the item and his parent
     * @return:	Return the submenus of a menu
     */
    public function getsubmenusIds($args) {

        // Get parameters from whatever input we need
        $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
        if (!SecurityUtil::checkPermission('IWvhmenu::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $records_array[] = $mid;

        $records = ModUtil::apiFunc('IWvhmenu', 'admin', 'getall', array('id_parent' => $mid));

        foreach ($records as $record) {
            $submenusId = ModUtil::func('IWvhmenu', 'admin', 'getsubmenusIds', array('mid' => $record['mid']));
            $records_array = array_merge($records_array, $submenusId);
        }

        return $records_array;
    }

}