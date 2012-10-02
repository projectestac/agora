<?php
function iw_menu_topblock_init()
{
    SecurityUtil::registerPermissionSchema('iw_menu:topblock:', 'Top menu');
}

function iw_menu_topblock_info()
{
    return array('text_type'        => 'top',
                 'module'           => 'iw_menu',
                 'text_type_long'   => 'Top menu for iw_menu',
                 'allow_multiple'   => false,
                 'form_content'     => false,
                 'form_refresh'     => false,
                 'show_preview'     => false,
                 'admin_tableless'  => false);
}

function iw_menu_topblock_display($blockinfo){
    // Security check (1)
    if (!SecurityUtil::checkPermission('iw_menu:topblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return false;
    }

    // Check if the module is available. (2)
    if (!pnModAvailable('iw_menu')) {
        return false;
    }
    
    // Get variables from content block (3)
    //Get cached user menu
	$uid = is_null(pnUserGetVar('uid'))? '-1' : pnUserGetVar('uid');
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists',
									array('name' => 'userMenu',
										'module' => 'iw_menu',
										'uid' => $uid,
										'sv' => $sv));

	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$menu = pnModFunc('iw_main', 'user', 'userGetVar',
								array('uid' => $uid,
									'name' => 'userMenu',
									'module' => 'iw_menu',
									'sv' => $sv,
									'nult' => true));
	} else{
		//Generate menu
		$menu_estructure = pnModApiFunc('iw_menu','user','getMenuStructure');
		// Defaults (4)
	    if (empty($menu_estructure)) {
	        return false;
	    }
	
	    // Create output object (6)
	    $pnRender = pnRender::getInstance('iw_menu');
	
	    // assign your data to to the template (7)
	    $pnRender->assign('menu',$menu_estructure);
	
	    // Populate block info and pass to theme (8)
	    $menu = $pnRender->fetch('iw_menu_block_top.htm');
	    
		//Cache the result
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar',
									array('uid' => $uid,
									'name' => 'userMenu',
									'module' => 'iw_menu',
									'sv' => $sv,
									'value' => $menu,
									'lifetime' => '600'));
	}

    
    //$blockinfo['content'] = $menu;
    //return themesideblock($blockinfo);
    return $menu;
}
