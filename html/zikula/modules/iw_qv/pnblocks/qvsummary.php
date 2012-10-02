<?php
/**
 * Initialise block
 *
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 */
function iw_qv_qvsummaryblock_init()
{
	pnSecAddSchema('iw_qv:summaryBlock:', 'Block title::');
}

/**
 * Get information on block
 *
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @return  array       The block information
 */
function iw_qv_qvsummaryblock_info()
{	$dom = ZLanguage::getModuleDomain('iw_qv');
	$modversion['name'] = __('iw_qv', $dom);
	//Values
	return array('text_type' => 'qvsummary',
			'module' => 'iw_qv',
			'text_type_long' => __('Block with the user assignment', $dom),
			'allow_multiple' => true,
			'form_content' => false,
			'form_refresh' => false,
			'show_preview' => true);
}

/**
 * Gets qv summary information
 *
 * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
 */
function iw_qv_qvsummaryblock_display($row)
{
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv:summaryBlock:', $row['title']."::", ACCESS_READ) || !pnUserLoggedIn()) {
		return false;
	}

	$uid = pnUserGetVar('uid');
	if(!isset($uid)) $uid = '-1';
	
	// Get the qvsummary saved in the user vars. It is renovate every 10 minutes
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$exists = pnModApiFunc('iw_main', 'user', 'userVarExists', array('name' => 'qvsummary',
																		'module' => 'iw_qv',
																		'uid' => $uid,
																		'sv' => $sv));
	if($exists){
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$s = pnModFunc('iw_main', 'user', 'userGetVar', array('uid' => $uid,
																'name' => 'qvsummary',
																'module' => 'iw_qv',
																'sv' => $sv,
																'nult' => true));
	}else{
		$teacherassignments = pnModAPIFunc('iw_qv', 'user', 'getall', array("teacher"=>$uid));
		$studentassignments = pnModAPIFunc('iw_qv', 'user', 'getall', array("student"=>$uid));
		
		if(empty($teacherassignments) && empty($studentassignments)){}
		
		$pnRender = pnRender::getInstance('iw_qv',false);
		$pnRender -> assign('teacherassignments', $teacherassignments);
		$pnRender -> assign('studentassignments', $studentassignments);
		$pnRender -> assign('isblock', true);
		$s = $pnRender -> fetch('iw_qv_block_summary.htm');

		if(empty($teacherassignments) && empty($studentassignments)){$s = '';}
		
		//Copy the block information into user vars
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		pnModFunc('iw_main', 'user', 'userSetVar', array('uid' => $uid,
															'name' => 'qvsummary',
															'module' => 'iw_qv',
															'sv' => $sv,
															'value' => $s,
															'lifetime' => '2000'));
	}
	
	if($s == ''){
		return false;
	}
	
	$row['content'] = $s;
	return themesideblock($row);
}
