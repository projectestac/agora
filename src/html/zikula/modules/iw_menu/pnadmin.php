<?php
/**
 * Show the list of menu items created and do access to manage them
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:		The list of menu items
*/
function iw_menu_admin_main()
{
	$dom = ZLanguage::getModuleDomain('iw_menu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Gets the groups information
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv));

	// Get the menu
	$menu = pnModFunc('iw_menu', 'admin', 'getsubmenu',
                       array('id_parent' => 0, 
						     'grups_info' => $grupsInfo, 
							 'level' => 0) );

	// Create output object
	$pnRender = pnRender::getInstance('iw_menu', false);
	$pnRender->assign('menuarray', $menu);
	$pnRender->assign('image_folder', pnModGetVar('iw_menu', 'imagedir'));

	return $pnRender->fetch('iw_menu_admin_main.htm');
}

/**
 * Build an array with the submenu
 * @author:     Toni Ginard (aginard@xtec.cat)
 * @return:		An array with the submenu
*/
function iw_menu_admin_getsubmenu ($args)
{
	$dom = ZLanguage::getModuleDomain('iw_menu');
	// Security check
	if (!SecurityUtil::checkPermission('iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Get the data of each item
	$SubMenuData = pnModAPIFunc('iw_menu', 'admin', 'getall',
                                 array( 'id_parent' => $args['id_parent'] ));

	// This provides a way to know if there is another option in the same level, so down arrow must be shown or not
	$iter_number = count($SubMenuData);
	$curr_iter = 0;

	foreach($SubMenuData as $option) {
		// Check whether to show down arrow or not
		$curr_iter++;
		if (($curr_iter < $iter_number)) { $downarrow = 1; } else { $downarrow = 0; }

		// Add the image triangles, one per sublevel
		for($i = 0, $levelimg = ''; $i < $args['level']; $i++) {
			$levelimg .= "<img src='modules/iw_menu/pnimages/level.gif' />";
		}

		// If the URL is empty, put ---
		($option['url'] != '') ? $url = $option['url'] : $url = '---';


		// Get the groups and process them
		$groups = substr($option['groups'], 1, -1);
		$groups = explode('$$',$groups);
		$groups_array = '';
		foreach($groups as $group){
		    if ($group != '') {
    			$name_group = ($group == '0') ? __('All',$dom) : $args['grups_info'][$group];
    			if($group == '-1') $name_group = __('Unregistered', $dom);
    			$groups_array .= '<div><a href="index.php?module=iw_menu&amp;type=admin&amp;func=del_group&amp;group=' . $group . '&amp;mid='.$option['mid'] . '"><img src="modules/iw_menu/pnimages/delgroup.gif" /></a> ';
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
                            'icon' 	=> $option['icon'],
                            'imagepath'	=> pnModGetVar('iw_menu', 'imagedir') . '/' . $option['icon'],
                            'id_parent'	=> $option['id_parent'],
                            'padding' => $padding,
                            'iorder' => $option['iorder'],
                            'downarrow'	=> $downarrow );
		// Add the options
		$SubmenuData = pnModFunc('iw_menu', 'admin', 'getsubmenu',
                                  array('id_parent' => $option['mid'],
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
function iw_menu_admin_add_group($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
		
	// A copy is required, so the information is loaded
	$registre = pnModAPIFunc('iw_menu', 'admin', 'get', array('mid' => $mid));
	if (!$registre) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}

	// get the intranet groups
	$sv    = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grups = pnModFunc('iw_main', 'user', 'getAllGroups', array('plus' => __('All', $dom),
																 'less' => pnModGetVar('iw_myrole', 'rolegroup'),
																 'sv' => $sv));
	$grups[] = array('id' => '-1',
				'name' => __('Unregistered', $dom));

	// Create output object
	$pnRender = pnRender::getInstance('iw_menu', false);
	$pnRender->assign('mid', $mid);
	$pnRender->assign('registre', $registre);
	$pnRender->assign('grups', $grups);

	return $pnRender->fetch('iw_menu_admin_add_group.htm');
}

/**
 * Show the information about the module
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The information about this module
*/
function iw_menu_admin_module()
{
	// Create output object
	$pnRender = pnRender::getInstance('iw_menu',false);

	$module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_menu', 'type' => 'admin'));

	$pnRender->assign('module', $module);
	return $pnRender->fetch('iw_menu_user_module.htm');
}

/**
 * Check the information received from the form of creation of a new group with access to the menu
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the form received from the form
 * @return:	Redirect to the main admin page
*/
function iw_menu_admin_create_add_group($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');
    	$grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
    	$groups_db = FormUtil::getPassedValue('groups_db', isset($args['groups_db']) ? $args['groups_db'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
	}

	// Construct the group string
	$groups = $groups_db . '$' . $grup . '$';

	// Modify the groups that have access to the menu item
	$lid = pnModAPIFunc('iw_menu', 'admin', 'modify_grup',
                         array('mid' => $mid,
                               'groups' => $groups));
	if ($lid != false) {
		// A new entry has been created
		LogUtil::registerStatus (__('The access to the option has been granted to a group', $dom));

		//Reset the users menus for all users
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                   array('module' => 'iw_menu',
					     'name' => 'userMenu',
						 'sv' => $sv));
	}

	//Redirect to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Delete a group and subgroup with access to the menu item
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item where a group is going to be deleted
 * @return:	True if success
*/
function iw_menu_admin_del_group($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
    	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
    	$group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'GET');
    	$groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');

 	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Gets the item information
	$registre = pnModAPIFunc('iw_menu', 'admin', 'get', array('mid' => $mid));
	if (!$registre) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$grupsInfo = pnModFunc('iw_main', 'user', 'getAllGroupsInfo', array('sv' => $sv,
																		'less' => pnModGetVar('iw_myrole', 'rolegroup')));
	
	// Ask for confirmation
	if (empty($confirmation)) {
		$name_group = ($group == '0') ? __('All',$dom) : $grupsInfo[$group];
		if($group == '-1'){$name_group = __('Unregistered', $dom);}
		$groups = str_replace('$' . $group . '$', '', $registre['groups']);
		$group = $name_group;
		// Create output object
        $pnRender = pnRender::getInstance('iw_menu',false);
		$pnRender->assign('mid',$mid);
		$pnRender->assign('groups', $groups);
		$pnRender->assign('text', $registre['text']);
		$pnRender->assign('group', $group);
		return $pnRender->fetch('iw_menu_admin_del_group.htm');
	}	
		
	// user has confirmed the deletion
	// confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
	}

	// Modify the groups information in database
	if (pnModAPIFunc('iw_menu', 'admin', 'modify_grup',
                      array('mid' => $mid,
                            'groups' => $groups))) {
        // L'esborrament ha estat un ï¿œxit i ho notifiquem
		LogUtil::registerStatus (__('The access of the group to the option has been revoked', $dom));

		//Reset the users menus for all users
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                   array('module' => 'iw_menu',
                         'name' => 'userMenu',
                         'sv' => $sv));
	}

    // Redirect user to admin main page
    return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Show a form needed to create a new menu item
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @return:	The form needed to create a new item
*/
function iw_menu_admin_new($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need.
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
    $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'REQUEST');
    	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
		
	// A copy is required, so the information is loaded
	if ($mid != null && $mid > 0) {
		$record = pnModAPIFunc('iw_menu', 'admin', 'get', array('mid' => $mid));
		if (!$record) {
			return LogUtil::registerError (__('Menu option not found', $dom));
		}
	}

	switch ($m) {
		case 'n':
			$accio = __('Add a new option to the menu', $dom);
			$acciosubmit = __('Create the option of the menu', $dom);
			break;
		case 'e':
			$accio = __('Option edit', $dom);
			$acciosubmit = __('Save changes', $dom);
			break;
		case 'c':
			$accio = __('Copy the option', $dom);
			$acciosubmit = __('Copy', $dom);
			break;
		case 's':
			$accio = __('Add a new option to the submenu', $dom);
			$acciosubmit = __('Create the option of the submenu', $dom);
			break;
	}

    // get the intranet groups
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $grups = pnModFunc('iw_main', 'user', 'getAllGroups',
                        array('plus' => __('All', $dom),
                              'less' => pnModGetVar('iw_myrole', 'rolegroup'),
                              'sv' => $sv));
    $grups[] = array('id' => '-1',
                     'name' => __('Unregistered', $dom));

	// checks if the module iw_webbox is available in order to include the webbox as a target possibility
	$iwwebbox = (pnModAvailable('iw_webbox')) ? true : false;

    $filesPath = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu','imagedir');
    $folderExists = (file_exists($filesPath)) ? true : false;
    $writeable = (is_writeable($filesPath)) ? true : false;
    $folder = $folderExists && $writeable;
    
    // Create output object
	$pnRender = pnRender::getInstance('iw_menu',false);
	$pnRender->assign('mid', $mid);
    $pnRender->assign('imagePath', pnModGetVar('iw_menu', 'imagedir') . '/' . $record['icon']);
	$pnRender->assign('m', $m);
	$pnRender->assign('accio', $accio);
	$pnRender->assign('folder', $folder);
	$pnRender->assign('acciosubmit', $acciosubmit);	
	$pnRender->assign('record', $record);
    $pnRender->assign('iwwebbox', $iwwebbox);
	$pnRender->assign('grups', $grups);
	return $pnRender->fetch('iw_menu_admin_new.htm');
}

/**
 * Check the information received from the form of creation of a item and call the api function to create it
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the form information needed in case the form is reloaded
 * @return:	Redirect to the main admin page
*/
function iw_menu_admin_create($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
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
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
	}

	// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
    }

    $groups = ($m != 'c') ? $groups = '$' . $grup . '$' : $grup;
    $iconsFolderPath = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu', 'imagedir');
	// Modify a menu item
	if ($m == 'e') {
		// get item from database
        $record = pnModAPIFunc('iw_menu', 'admin', 'get',
                                array('mid' => $mid));
		if ($deleteIcon == 1) {
		    $file = $iconsFolderPath . '/' . $record['icon'];
		    if (file_exists($file)) {
		        unlink($file);
		    }
			$iconEdited = '';
		}
        $lid = pnModAPIFunc('iw_menu', 'admin', 'update',
                             array('mid' => $mid,
                                   'text' => $text,
                                   'descriu' => $descriu,
                                   'active' => $active,
                                   'target' => $target,
                                   'url' => $url,
                                   'icon' => $iconEdited));
        if ($lid != false) {
        	$lid = $mid; // copied in case the icon has been edited
            // A item has been modified
            LogUtil::registerStatus (__('The option has been updated successfully', $dom));

            //Reset the users menus for all users
            $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
            pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                       array('module' => 'iw_menu',
                             'name' => 'userMenu',
                             'sv' => $sv));
		}
    } else {
        $lid = pnModAPIFunc('iw_menu', 'admin', 'create',
                             array('text' => $text,
                                   'descriu' => $descriu,
                                   'active' => $active,
                                   'target' => $target,
                                   'url' => $url,
                                   'groups' => $groups,
                                   'id_parent' => $id_parent,
                                   'icon' => ''));
        if ($lid != false) {
	        // A new entry has been created
            LogUtil::registerStatus (__('A new option has been created', $dom));
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
                    LogUtil::registerError(__("The item has been created without the icon because the upload of the file has failed.", $dom));
                    return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
                }
                $width = 16;
                $height = 16;
                // thumbnail image to $width (max.) x $height (max.)
                $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
                $msg = pnModFunc('iw_main', 'user', 'thumbnail',
                                  array('sv' => $sv,
                                        'imgSource' => $destination,
                                        'imgDest' => $destination,
                                        'widthImg' => $width,
                                        'heightImg' => $height));
                if ($msg != '') {
                    LogUtil::registerError($msg);
                    return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
                }
            } else {
                LogUtil::registerError(__("The item has been created without the icon because the file extension for the icon is not valid.", $dom));
                return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
            }
            // change the image name acording with the new name
            pnModAPIFunc('iw_menu', 'admin', 'updateIcon',
                          array('mid' => $lid,
                                'icon' => $fileNewName));
        }
    }

    //Reorder the menu items
    pnModFunc('iw_menu', 'admin', 'reorder',
               array('id_parent' => 0));
    //Reset the users menus for all users
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    pnModFunc('iw_main', 'user', 'usersVarsDelModule',
               array('module' => 'iw_menu',
                     'name' => 'userMenu',
                     'sv' => $sv));
	//Redirect to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Show a form needed to create a new menu item
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	
 * @return:	The form needed to create a new item
*/
function iw_menu_admin_new_sub($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need.
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');

    // Security check
    if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // Get a menu item
    if ($mid != null && $mid > 0) {
        $registre = pnModAPIFunc('iw_menu', 'admin', 'get',
                                  array('mid' => $mid));
        if (!$registre) {
            return LogUtil::registerError (__('Menu option not found', $dom));
        }
        $level = $registre['level'] + 1;
    }

    // get the intranet groups
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $grups = pnModFunc('iw_main', 'user', 'getAllGroups',
                        array('plus' => __('All', $dom),
                              'less' => pnModGetVar('iw_myrole', 'rolegroup'),
                              'sv' => $sv));
    $grups[] = array('id' => '-1',
                     'name' => __('Unregistered', $dom));

    // checks if the module iw_webbox is available in order to include the webbox as a target possibility
    $iwwebbox = (pnModAvailable('iw_webbox')) ? true : false;

    $filesPath = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu','imagedir');
    $folderExists = (file_exists($filesPath)) ? true : false;
    $writeable = (is_writeable($filesPath)) ? true : false;
    $folder = $folderExists && $writeable;
    
    // Create output object
    $pnRender = pnRender::getInstance('iw_menu',false);
    $pnRender->assign('mid', $mid);
    $pnRender->assign('level', $level);
    $pnRender->assign('folder', $folder);
    $pnRender->assign('iwwebbox', $iwwebbox);
    $pnRender->assign('initImagePath', pnModGetVar('iw_menu', 'imagedir'));
    $pnRender->assign('grups', $grups);

    return $pnRender->fetch('iw_menu_admin_new_sub.htm');
}

/**
 * Recursive function that returns all the menu items associated with a item of the first level
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:		Array with the id of the item of the first level
 * @return:		The items information
*/
function iw_menu_admin_menu_items($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
	$id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'POST');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');
	if (!empty($objectid)) {
		$id_parent = $objectid;
	}

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	if($id_parent != 0){
		pnModSetVar('iw_menu', 'arbre', pnModGetVar('iw_menu','arbre') . $id_parent . '$');
	}
	$itemsmenu = pnModAPIFunc('iw_menu', 'admin', 'getall',
                               array('id' => $id_parent));
	foreach ($itemsmenu as $itemmenu){
		pnModFunc('iw_menu', 'admin', 'menu_items',
                   array('id_parent' => $itemmenu['mid']));
	}

	return $menuarray;
}


/**
 * Check the information received from the form of creation of a submenu item and call the api function to create it
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	Array with the form information needed in case the form is reloaded
 * @return:	Redirect to the main admin page
*/
function iw_menu_admin_create_sub($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
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
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
	}

	// Construct the group string
	$groups = '$' . $grup . '$';

	// Create a submenu item
    $lid = pnModAPIFunc('iw_menu', 'admin', 'create_sub',
                         array('mid'=>$mid,
                               'text' => $text,
                               'descriu' => $descriu,
                               'active' => $active,
                               'target' => $target,
                               'url' => $url,
                               'groups' => $groups,
                               'id_parent' => $mid,
                               'level' => $level,
                               'icon' => $icon));
	if ($lid != false) {
        if ($icon['name'] != '') {
        	$iconsFolderPath = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu', 'imagedir');
            // get file extension
            $fileName = $icon['name'];
            $fileExtension = FileUtil::getExtension(strtolower($fileName));
            $fileNewName = $lid . '.' . $fileExtension;            
            if ($fileExtension == 'gif' || $fileExtension == 'png' || $fileExtension == 'jpg') {
                $destination = $iconsFolderPath . '/' . $fileNewName;
                if (!move_uploaded_file($icon['tmp_name'], $destination)) {
                    LogUtil::registerError(__("The item has been created without the icon because the upload of the file has failed.", $dom));
                    return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
                }
                $width = 16;
                $height = 16;
                // thumbnail image to $width (max.) x $height (max.)
                $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
                $msg = pnModFunc('iw_main', 'user', 'thumbnail',
                                  array('sv' => $sv,
                                        'imgSource' => $destination,
                                        'imgDest' => $destination,
                                        'widthImg' => $width,
                                        'heightImg' => $height));
                if ($msg != '') {
                    LogUtil::registerError($msg);
                    return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
                }
            } else {
                LogUtil::registerError(__("The item has been created without the icon because the file extension for the icon is not valid.", $dom));
                return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
            }
            // change the image name acording with the new name
            pnModAPIFunc('iw_menu', 'admin', 'updateIcon',
                          array('mid' => $lid,
                                'icon' => $fileNewName));
        }
       	// Successfull creation
		LogUtil::registerStatus (__('A new option has been created', $dom));

		// Reorder the menu items
		pnModFunc('iw_menu', 'admin', 'reorder',
                   array('id_parent' => $mid));

		// Reset the users menus for all users
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                   array('module' => 'iw_menu',
                         'name' => 'userMenu',
                         'sv' => $sv));
	}

	// Redirect to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Show a form that allow to define the properties of the menu
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return:	Redirect to the admin config page
*/
function iw_menu_admin_conf()
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
    $file = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu','imagedir');
	$noFolder = (!file_exists($file)) ? true : false;
    $writeable = (is_writeable($file)) ? true : false;
	$menu_vars = array('width' => pnModGetVar('iw_menu', 'width'),
                       'imagedir' => pnModGetVar('iw_menu', 'imagedir'));

	$multizk = (isset($GLOBALS['PNConfig']['Multisites']['multi']) && $GLOBALS['PNConfig']['Multisites']['multi'] == 1) ? 1 : 0;
	// Create output object
    $pnRender = pnRender::getInstance('iw_menu',false);
	$pnRender->assign('multizk', $multizk);
	$pnRender->assign('noFolder', $noFolder);
	$pnRender->assign('writeable', $writeable);
	$pnRender->assign('directoriroot', pnModGetVar('iw_main', 'documentRoot'));
	$pnRender->assign('menu_vars',$menu_vars);
	return $pnRender->fetch('iw_menu_admin_conf.htm');
}

/**
 * Update the module vars with the properties of the menu
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the form information needed
 * @return:	True if success
*/
function iw_menu_admin_conf_update($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
    $imagedir = FormUtil::getPassedValue('imagedir', isset($args['imagedir']) ? $args['imagedir'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
	}

	pnModSetVar('iw_menu', 'width', $width);
	pnModSetVar('iw_menu', 'imagedir', $imagedir);

	LogUtil::registerStatus (__('Menu configuration completed successfully', $dom));

	// Reset the users menus for all users
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'usersVarsDelModule',
               array('module' => 'iw_menu',
                     'name' => 'userMenu',
                     'sv' => $sv));

	// Redirect to admin config page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'conf'));
}

/**
 * Delete a menu item and all the submenus if exists
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item that have to be deleted
 * @return:	True if success
*/
function iw_menu_admin_delete($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GETPOST');
    $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
    $submenusId = FormUtil::getPassedValue('submenusId', isset($args['submenusId']) ? $args['submenusId'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	//Cridem la funciï¿œ de l'API de l'usuari que ens retornarï¿œ la inforamciï¿œ del registre demanat
	$registre = pnModAPIFunc('iw_menu', 'admin', 'get',
                              array('mid' => $mid));
	if (!$registre) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}

	// remove icon if exists
	$iconsFolderPath = pnModGetVar('iw_main', 'documentRoot') . '/' . pnModGetVar('iw_menu', 'imagedir');
	$file = $iconsFolderPath . '/' . $registre['icon'];
	if (file_exists($file)) {
		unlink($file);
	}

	// Ask for confirmation
	if (empty($confirmation)) {
		//get all the submenus that have to be deleted
		$submenusId_array = pnModFunc('iw_menu', 'admin', 'getsubmenusIds',
                                       array('mid' => $mid));
		$submenusId = implode(",", $submenusId_array);
        // Create output object
        $pnRender = pnRender::getInstance('iw_menu',false);
		$pnRender->assign('text',$registre['text']);
		$pnRender->assign('mid',$mid);
		$pnRender->assign('submenusId',$submenusId);
		return $pnRender->fetch('iw_menu_admin_del.htm');
    }

	// User has confirmed the deletion
	// Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
    }

    if (pnModAPIFunc('iw_menu', 'admin', 'delete', array('submenusId' => $submenusId))) {
        // The deletion has been successful
        LogUtil::registerStatus (__('The option and its submenus have been deleted', $dom));

        // Reset the users menus for all users
        $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
        pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                   array('module' => 'iw_menu',
                         'name' => 'userMenu',
                         'sv' => $sv));
	}

	// Redirect user to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}



/**
 * Change the items order
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item where the order will be changed
 * @return:	Redirect user to admin main page
*/
function iw_menu_admin_order($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    $mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'GET');
    $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'GET');
    $puts = FormUtil::getPassedValue('puts', isset($args['puts']) ? $args['puts'] : null, 'GET');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// change item order
	// Get item information
	$item = pnModAPIFunc('iw_menu', 'admin', 'get',
                          array('mid' => $mid));
	if (!$item) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}

	$iorder = ($puts == '-1') ? $item['iorder'] + 3 : $item['iorder'] - 3;
	pnModAPIFunc('iw_menu', 'admin', 'put_order',
                  array('mid' => $mid,
                        'iorder' => $iorder));	

	// Reorder the items
	pnModFunc('iw_menu', 'admin', 'reorder',
               array('id_parent' => $id_parent));

	// Reset the users menus for all users
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'usersVarsDelModule',
               array('module' => 'iw_menu',
                     'name' => 'userMenu',
                     'sv' => $sv));
	
	// Redirect to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Reorder the menu items
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item parent of the meu tree
 * @return:	Redirect user to admin main page
*/
function iw_menu_admin_reorder($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
    $id_parent = FormUtil::getPassedValue('id_parent', isset($args['id_parent']) ? $args['id_parent'] : null, 'GET');
	$objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
	if (!empty($objectid)) {
		$id_parent = $objectid;
	}

 	// Security check
	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Get item information
	$items = pnModAPIFunc('iw_menu', 'admin', 'getall',
                           array('id_parent' => $id_parent,
                                 'mid' => $mid));
	if (!$items) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}
	
	// Reorder all the items with the values 0 2 4 6 8...
	foreach($items as $item){
		$i = $i + 2;	
		pnModAPIFunc('iw_menu', 'admin', 'put_order',
                      array('mid' => $item['mid'],
                            'iorder' => $i));
	}
	
	//Redirect user to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}


/**
 * Change position or id_parent of an item
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item and his parent
 * @return:	Redirect user to admin main page
*/
function iw_menu_admin_movelevel($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
	$confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'REQUEST');
	$upmid = FormUtil::getPassedValue('upmid', isset($args['upmid']) ? $args['upmid'] : null, 'POST');

	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	// Get item information
	$registre = pnModAPIFunc('iw_menu', 'admin', 'get',
                              array('mid' => $mid));
	if (!$registre) {
		return LogUtil::registerError (__('Menu option not found', $dom));
	}

	// Ask confirmation to change the level
	if (empty($confirmation)) {
		//Agafem els nemï¿œs que tenen per id_parent el mateix que el registre que es vol pujar
		$records = pnModAPIFunc('iw_menu', 'admin', 'getall',
                                 array('id_parent' => '-1'));
		// get all the submenus from the menu
		$submenusId = pnModFunc('iw_menu', 'admin', 'getsubmenusIds',
                                 array('mid' => $mid));

		// add the root in the records array
		$records_array[] = array('mid' => 0,
                                 'text' => __('Root', $dom));
		foreach ($records as $record){
			if(!in_array($record['mid'],$submenusId)){
				$records_array[] = array('mid' => $record['mid'],
                                         'text' => $record['text']);
			}
		}
    	// Create output object
    	$pnRender = pnRender::getInstance('iw_menu',false);
		$pnRender->assign('registres', $records_array);
		$pnRender->assign('text', $registre['text']);
		$pnRender->assign('mid', $mid);
		return $pnRender->fetch('iw_menu_admin_movelevel.htm');
	}	
		
	// User has confirmed the action
	// Confirm authorisation code
	if (!SecurityUtil::confirmAuthKey()) {
		return LogUtil::registerAuthidError (pnModURL('iw_menu', 'admin', 'main'));
	}
	
	// Up the item level
	if (pnModAPIFunc('iw_menu', 'admin', 'move_level',
                      array('mid' => $mid,
						    'id_parent' => $upmid))) {
		// Update successful
		LogUtil::registerStatus (__('The option has been moved to the parent level', $dom));

		// Reset the users menus for all users
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'usersVarsDelModule',
                   array('module' => 'iw_menu',
                         'name' => 'userMenu',
                         'sv' => $sv));
	}

	// Redirect user to admin main page
	return pnRedirect(pnModURL('iw_menu', 'admin', 'main'));
}

/**
 * Get the submenus of a menu
 * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @param:	Array with the identity of the item and his parent
 * @return:	Return the submenus of a menu
*/
function iw_menu_admin_getsubmenusIds($args)
{
	$dom=ZLanguage::getModuleDomain('iw_menu');
	// Get parameters from whatever input we need
	$mid = FormUtil::getPassedValue('mid', isset($args['mid']) ? $args['mid'] : null, 'POST');

	if (!SecurityUtil::checkPermission( 'iw_menu::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}

	$records_array[] = $mid;

	$records = pnModAPIFunc('iw_menu', 'admin', 'getall', array('id_parent' => $mid));

	foreach($records as $record){
		$submenusId = pnModFunc('iw_menu', 'admin', 'getsubmenusIds',
                                 array('mid' => $record['mid']));
		$records_array = array_merge($records_array, $submenusId);
	}

	return $records_array;
}
