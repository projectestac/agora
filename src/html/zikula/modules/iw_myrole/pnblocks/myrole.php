<?php
if (strpos($_SERVER['PHP_SELF'], 'online.php')) {
	die ("You can't access directly to this block");
}

/**
 * initialise block
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 */
function iw_myrole_myroleblock_init()
{
	//pnSecAddSchema('myroleBlock::', 'Block title::');

}

/**
 * get information on block
 *
 * @author       Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return       array       The block information
 */
function iw_myrole_myroleblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_myrole');
	//Values
	return array('text_type' => 'myrole',
					'module' => 'iw_myrole',
					'text_type_long' => __('Show the groups or roles available and allow users change the group', $dom),
					'allow_multiple' => true,
					'form_content' => false,
					'form_refresh' => false,
					'show_preview' => true);
}

/**
 * Gets topics information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @author 		Josep FerrÃ ndiz FarrÃ© (jferran6@xtec.cat)
 */
function iw_myrole_myroleblock_display($row)
{
	// Security check
	if (!SecurityUtil::checkPermission('iw_myrole::',"::", ACCESS_ADMIN)) {
		return false;
	}

	$uid = pnUserGetVar('uid');

	//Check if user belongs to change group. If not the block is not showed
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$isMember = pnModFunc('iw_main', 'user', 'isMember', array('sv' => $sv,
																'gid' => pnModGetVar('iw_myrole', 'rolegroup'),
																'uid' => $uid));

	if(!$isMember){
		return false;
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$uidGroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv'=> $sv,
																		'uid'=> $uid));
	foreach($uidGroups as $g){
		$originalGroups[$g['id']] = 1;
	}

	$pnRender = pnRender::getInstance('iw_myrole',false);

	// Gets the groups
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$allGroups = pnModFunc('iw_main', 'user', 'getAllGroups', array('sv' => $sv,
																	'less' => pnModGetVar('iw_myrole', 'rolegroup')));

	$groupsNotChangeable = pnModGetVar('iw_myrole','groupsNotChangeable');
	
	foreach($allGroups as $group){
		if(strpos($groupsNotChangeable,'$'.$group['id'].'$') == false){
			$groupsArray[] = $group;
		}
	}

	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$invalidChange = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																		'name' => 'invalidChange',
																		'module' => 'iw_myrole',
																		'nult' => true,
																		'sv' => $sv));

	$pnRender -> assign('groups', $groupsArray);
	$pnRender -> assign('invalidChange', $invalidChange);
	$pnRender -> assign ('roleGroups', $originalGroups);
	$s = $pnRender -> fetch('iw_myrole_block_change.htm');

	$row['content'] = $s;
	return themesideblock($row);
}
