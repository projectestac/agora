<?php
/**
 * initialise block
 *
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 */
function iw_noteboard_nbtopicsblock_init()
{
	//Sentï¿œncia de seguretat
	pnSecAddSchema('iw_noteboard:nbtopicsBlock:', 'Block title::');
}

/**
 * get information on block
 *
 * @author       Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return       array       The block information
 */
function iw_noteboard_nbtopicsblock_info()
{
	$dom = ZLanguage::getModuleDomain('iw_noteboard');
	//Values
	return array('text_type' => 'nbtopics',
			'module' => 'iw_noteboard',
			'text_type_long' => __('NoteBoard topics', $dom),
			'allow_multiple' => true,
			'form_content' => false,
			'form_refresh' => false,
			'show_preview' => true);
}


/**
 * Gets topics information
 *
 * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 */
function iw_noteboard_nbtopicsblock_display($row)
{

	// Security check
	if (!SecurityUtil::checkPermission('iw_noteboard:nbtopicsBlock:', $row['title']."::", ACCESS_READ)) {
		return false;
	}

	if(!pnUserLoggedIn()){
		return false;
	}

	$uid = pnUserGetVar('uid');

	//get the headlines saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'nbtopics',
																		'module' => 'iw_noteboard',
																		'uid' => $uid,
																		'sv' => $sv));

	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																'name' => 'nbtopics',
																'module' => 'iw_noteboard',
																'sv' => $sv,
																'nult' => true));
		$row['content'] = $s;
		return themesideblock($row);
	}

	$pnRender = pnRender::getInstance('iw_noteboard',false);

	$temes = pnModAPIFunc('iw_noteboard','user','getalltemes');
	foreach($temes as $untema){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		if(pnModFunc('iw_main', 'user', 'isMember', array('uid' => pnUserGetVar('uid'),
															'gid' => $untema['grup'],
															'sv' => $sv))){
			$temes0[] = array('tid' => $untema['tid'],
								'nomtema' => $untema['nomtema']);
			$en_te = true;
		}
	}

	if(!$en_te){return false;}

	$pnRender -> assign('temes', $temes0);
	$s = $pnRender -> fetch('iw_noteboard_block_topics.htm');

	//Copy the block information into user vars
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
														'name' => 'nbtopics',
														'module' => 'iw_noteboard',
														'sv' => $sv,
														'value' => $s,
														'lifetime' => '2000'));

	$row['content'] = $s;
	return themesideblock($row);
}
