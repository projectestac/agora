<?php
if (strpos($_SERVER['PHP_SELF'], 'online.php')) {
	die ("You can't access directly to this block");
}

/**
 * initialise block
 *
 * @author		Fèlix Casanellas (fcasanel@xtec.cat)
 */
function iw_main_iwNoticeblock_init()
{
	//Security check
	SecurityUtil::registerPermissionSchema('iw_main:iwNoticeblock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Fèlix Casanellas (fcasanel@xtec.cat)
 * @return       array       The block information
 */
function iw_main_iwNoticeblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_main');
	//Values
	return array('text_type' => 'iwNotice',
					'module' => 'iw_main',
					'text_type_long' => __('Mostra avisos per a diferents usuaris', $dom),
					'allow_multiple' => false,
					'form_content' => false,
					'form_refresh' => false,
					'show_preview' => true);
}

/**
 * Gets user news
 *
 * @author	Fèlix Casanellas (fcasanel@xtec.cat)
 * @return	The user news block	
 */
function iw_main_iwNoticeblock_display($blockinfo)
{
	// Security check
	if (!SecurityUtil::checkPermission('iw_main:iwNoticeblock:', $blockinfo['title']."::", ACCESS_READ)) {
		return false;
	}
	
	
	$dom = ZLanguage::getModuleDomain('iw_main');
	
	// Check if the module is available.
    if (!pnUserLogIn()) {
        return false;
    }
    
    // Get variables from content block 
    $vars = pnBlockVarsFromContent($blockinfo['content']);
    $startTime = $vars['startTime'];
    $endTime = $vars['endTime'];
    $admin = false;

    if ($startTime != '0') $startTime = mktime('0', '0', '0', substr($startTime, 4, 2), substr($startTime, 6, 2), substr($startTime, 0, 4));
    if ($endTime != '0') $endTime = mktime('23', '59', '59', substr($endTime, 4, 2), substr($endTime, 6, 2), substr($endTime, 0, 4));


	if ((!empty($vars['adminNotice']) || !empty($vars['userNotice'])) && (($startTime == '0') || (time() >= $startTime)) && (($endTime == '0') || (time() <= $endTime))){
		if (!SecurityUtil::checkPermission( 'Admin::', '::', ACCESS_ADMIN)){
			//current user
			$notice = $vars['userNotice'];			
		}else{
			//admin user
			$notice = $vars['adminNotice'];
			$admin = true;
		}
	}else{
		return false;
	}
	if($notice == '') return false;
	
    // Create output object
    $pnRender = pnRender::getInstance('iw_main');

    // assign your data to to the template
    $pnRender->assign('notice', $notice);
    $pnRender->assign('bid', $blockinfo['bid']);
    $pnRender->assign('admin', $admin);

    // Populate block info and pass to theme 
    $blockinfo['content'] = $pnRender->fetch('iw_main_block_iwNotice.htm');

    return themesideblock($blockinfo); 
}
