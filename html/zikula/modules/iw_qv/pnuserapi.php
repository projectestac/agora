<?php

/**
 * Get an array with the all the skins
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	-
 * @return array   The array with each skin (id, name)
*/
function iw_qv_userapi_getskins($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	$tmp = explode(",", pnModGetVar('iw_qv', 'skins'));
	for ($i=0; $i<count($tmp); $i++){
		switch($tmp[$i]){
			case "default": $items[$i]=array("id"=>$tmp[$i], "name"=>__('@default',$dom));break;
			case "formal": $items[$i]=array("id"=>$tmp[$i], "name"=>__('@formal',$dom));break;
			case "infantil": $items[$i]=array("id"=>$tmp[$i], "name"=>__('@infantil',$dom));break;
		}
	}
	return $items;
}

/**
 * Get an array with the all the languages
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	-
 * @return array   The array with each language (id, name)
*/
function iw_qv_userapi_getlangs($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	$tmp = explode(",", pnModGetVar('iw_qv', 'langs'));
	for ($i=0; $i<count($tmp); $i++){
	switch($tmp[$i]){
			case "ca": $items[$i]=array("id"=>$tmp[$i], "name"=>__('Catalan',$dom));break;
			case "en": $items[$i]=array("id"=>$tmp[$i], "name"=>__('English',$dom));break;
			case "es": $items[$i]=array("id"=>$tmp[$i], "name"=>__('Spanish',$dom));break;
		}
	}
	return $items;
}

/**
 * Get an array with the all the max deliver possibilities
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	-
 * @return array   The array with each maxdeliver possibility (id, name)
*/
function iw_qv_userapi_getmaxdelivers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	$tmp = explode(",", pnModGetVar('iw_qv', 'maxdelivers'));
	for ($i=0; $i<count($tmp); $i++){
		$name=$tmp[$i];
		if ($name==-1) $name=__('Unlimited',$dom);
		$items[$i]=array("id"=>$tmp[$i], "name"=>$name);
	}
	return $items;
}

/**
 * Get an array with the window target options
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	-
 * @return array   The array with window target options (id, name)
*/
function iw_qv_userapi_gettargets($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	return array(array("id"=>"blank", "name"=>__('In a new window',$dom)), array("id"=>"self", "name"=>__('In the same window',$dom)));
}

/**
 * Gets all the qvs to do or to correct (depending of the parameters) for the current user
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	If none of the following parameters is specified, it will be returned all the qvs
 *			- teacher teacher of the qvs (to filter)
 *			- student to filter only the qvs associated to this student
 * @return	And array with the qvs information
*/
function iw_qv_userapi_getall($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Get the parameters
   	$teacher = FormUtil::getPassedValue('teacher', isset($args['teacher']) ? $args['teacher'] : null, 'POST');
   	$student = FormUtil::getPassedValue('student', isset($args['student']) ? $args['student'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return array();
	}
	
	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_column'];

	if(isset($teacher)){
		// Security check
		if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_ADD)) {
			return array();
		}
		
		$where = "$c[teacher]=$teacher ";
		$orderby = "$c[title] asc";
		// Get the objects from the db
		$items = DBUtil::selectObjectArray('iw_qv', $where, $orderby, '-1', '-1');
	}else if(isset($student)){
	    $pntables = pnDBGetTables();
    	$c = $pntables['iw_qv_column'];
		
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$usergroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv' => $sv, 'uid' => $student));
		foreach($usergroups as $group){
			if (isset($where)) $where.=" OR ";
			$where.= " ($c[groups] like '%$$group[id]$%' AND $c[active]=1)";
		}
	    $items = DBUtil::selectObjectArray ('iw_qv', $where, $c['title']);

/*
		// Search assigned by qvgroup and also qv started (created in qv_assignments)
	    $pntables = pnDBGetTables();
    	$qcolumn   = $pntables['iw_qv_column'];
	    $acolumn   = $pntables['iw_qv_assignments_column'];
		
		$joinInfo[] = array ('join_table'         =>  'iw_qv_assignments',
                         	 'join_field'         =>  array('qvid'),
							 'object_field_name'  =>  array($acolumn['qvid']),
                         	 'compare_field_table'=>  'tbl.'.$acolumn['qvid'],
                         	 'compare_field_join' =>  'qvid');

		$where = " a.".$acolumn['userid']."=$student ";
		$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
		$usergroups = pnModFunc('iw_main', 'user', 'getAllUserGroups', array('sv' => $sv, 'uid' => $student));
		foreach($usergroups as $group){
			$where.= " OR tbl.".$qcolumn['groups']." like '%$".$group[id]."$%' ";
		}
		
	    $items = DBUtil::selectExpandedObjectArray ('iw_qv', $joinInfo, $where, $qcolumn['title'], -1, -1, 'qvid');
*/	    
	}else{
		$where = " ";
		$orderby = "$c[title] asc";
		// Get the objects from the db
		$items = DBUtil::selectObjectArray('iw_qv', $where, $orderby, '-1', '-1');
	}

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	
	// Add more information
	$newitems=array();
	foreach($items as $item){
		$item = pnModAPIFunc('iw_qv', 'user', 'completeqvinfo', array("item"=>$item));
		array_push($newitems, $item);
	}
	// Return the items
	return $newitems;
}

/**
 * Gets the information of a qv activity
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	The id of the assignment
 * @return	An array with the qv activity information
*/
function iw_qv_userapi_get($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Get the parameters
   	$qvid = FormUtil::getPassedValue('qvid', isset($args['qvid']) ? $args['qvid'] : null, 'POST');

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}

	// Needed argument
	if (!isset($qvid) || !is_numeric($qvid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$item = DBUtil::selectObjectByID('iw_qv', $qvid, 'qvid');
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$item = pnModAPIFunc('iw_qv', 'user', 'completeqvinfo', array("item"=>$item));

	// Return the item
	return $item;
}


/**
 * Gets complementary information of a qv activity
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	The qv ($item) to add more information
 * @return	An array with the qv activity information
*/
function iw_qv_userapi_completeqvinfo($args){
	extract($args);
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$user = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv, 'uid' => $item['teacher'], 'info'=> 'ncc'));
	$item['teachername']=$user;
	$item['briefcrdate']=DateUtil::formatDatetime($item['cr_date'], DATETIMEBRIEF);
	return $item;
}



/**
 * Gets the information of an user qv assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param  args	
 *			- qv (*)
 *			- userid (*)
 *          - createifnotexist (default = true)
 *          - getallinformation (default = true)
 * @return	The assignment of the specified user for the specified qvid
*/
function iw_qv_userapi_getassignment($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Get the parameters
	extract($args);
	if (isset($qv)) $qvid=$qv[qvid];
   	if (!isset($viewas)) $viewas='student';
   	if (!isset($createifnotexist)) $createifnotexist=true;
   	if (!isset($getallinformation)) $getallinformation=true;

/*   	$userid = FormUtil::getPassedValue('userid', isset($args['userid']) ? $args['userid'] : null, 'POST');
   	$qvaid = FormUtil::getPassedValue('qvaid', isset($args['qvaid']) ? $args['qvaid'] : null, 'POST');
	
   	$viewas = FormUtil::getPassedValue('viewas', isset($args['viewas']) ? $args['viewas'] : 'student', 'REQUEST');
   	$createifnotexist = FormUtil::getPassedValue('createifnotexist', isset($args['createifnotexist']) ? $args['createifnotexist'] : true, 'POST');
   	$getallinformation = FormUtil::getPassedValue('getallinformation', isset($args['getallinformation']) ? $args['getallinformation'] : true, 'POST');
*/   	

	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	// Needed argument
	if ( (!isset($qvaid) && (!isset($qvid) || !is_numeric($qvid) || !isset($userid) || !is_numeric($userid))) ) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	// Get the assignment
	if (isset($qvaid)){
		$item = DBUtil::selectObjectByID('iw_qv_assignments', $qvaid, 'qvaid');
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_assignments_column'];
		$where=" $c[qvid]=$qvid AND $c[userid]=$userid ";
		$item = DBUtil::selectObject('iw_qv_assignments', $where);		
	}
	

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));			
	}else{
		 if (!isset($item) && $createifnotexist){
			$item = array('qvid' => $qvid,
						  'userid' => $userid);
			// Create the assignment
			$qvaid = pnModAPIFunc('iw_qv', 'user', 'createassignment', $item);
			$item['qvaid']=$qvaid;
		}
		
		if (isset($item) && $getallinformation){
			// Get or calculate some assignment values
			$item[fullurl] = pnModAPIFunc('iw_qv', 'user', 'getfullurl', array('qv'=>$args['qv'], 'assignment'=>$item, 'viewas'=>$viewas));
			
			$pntable = pnDBGetTables();
			$c = $pntable['iw_qv_sections_column'];
			$where=" $c[qvaid]=$item[qvaid] ";
			if ($sections = DBUtil::selectObjectArray('iw_qv_sections', $where, $orderby)){
				$totaltime="00:00:00";
				$totaldelivers=0;
				$totalscore=0;
				$states=array();
	  			foreach($sections as $section){
					$totaltime=pnModAPIFunc('iw_qv', 'user', 'addtime', array('time1'=>$totaltime, 'time2'=>$section[time]));  
					if ($section[attempts]>$totaldelivers) $totaldelivers = $section[attempts];
					// score
					$start=strpos($section[scores], $section[sectionid].'_score=');
					if ($start>=0){
						$start+=strlen($section[sectionid].'_score=');
						$length=strpos(substr($section[scores], $start+1), '#')+1;
						$totalscore+=substr($section[scores], $start, $length);
					}
					// status
					$states[$section[state]]+=1;
	  			}
			}			
			
			$item[score]=$totalscore;
			$item[states]=$states;
			$item[sections]=count($sections);
			// Section with the max number of delivers
			$item[delivers]=$totaldelivers;
			// The sum of the time of each section
			$item[totaltime]=$totaltime;
		}
	}
	// Return the item
	return $item;
}



/**
 * Gets the list of users of an assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param  args	The following parameters are mandatory:
 *			- qvgroups 
 * @return	The list of users of an assignment
*/
function iw_qv_userapi_getassignmentusers($args)
{
	// Get the parameters
   	$qvgroups = FormUtil::getPassedValue('qvgroups', isset($args['qvgroups']) ? $args['qvgroups'] : "", 'POST');
	
	$users=array();
	$groups = explode('$', $qvgroups);
	foreach($groups as $group){
		if ($group!=''){
			$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
			$membersgroup = pnModFunc('iw_main', 'user', 'getMembersGroup', array('sv' => $sv, 'gid' => $group));
			foreach($membersgroup as $member){
				if (!array_key_exists($member[id], $users)){
					$users[$member[id]]=$member;
					$users[$member[id]][fullname] = $users[$member[id]][name];
					$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
					$users[$member[id]][name] = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv, 'uid' => $member[id], 'info'=> 'l'));;
				}
			}
		}
	}
	
	// Sort the users by fullname
	foreach ($users as $key => $row) {
	    $userids[$key]  = $row['id'];
	    $usernames[$key] = $row['name'];
	    $userfullnames[$key] = $row['fullname'];
	}
	array_multisort($userfullnames, SORT_ASC, $usernames, SORT_ASC, $userids, SORT_ASC, $users);	
	
	return $users;
}	

/**
 * Gets the information of an qv assignment as teacher
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param  args	The following parameters are mandatory:
 *			- qvid 
 *			- teacher
 * @return	The list of assignments of the specified teacher (for specified qvid)
*/
function iw_qv_userapi_getteacherassignments($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_ADD)) {
		return LogUtil::registerPermissionError();
	}

	// Get the parameters
   	$qv = FormUtil::getPassedValue('qv', isset($args['qv']) ? $args['qv'] : array(), 'POST');
	$qvid=$qv[qvid];
   	$teacher = FormUtil::getPassedValue('teacher', isset($args['teacher']) ? $args['teacher'] : null, 'POST');
	
	// Needed argument
	if (!isset($qvid) || !is_numeric($qvid) || !isset($teacher) || !is_numeric($teacher)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	
	$assignments = array();
	$users = pnModAPIFunc('iw_qv', 'user', 'getassignmentusers', array('qvgroups' => $qv[groups]));
	foreach ($users as $user){
		$assignment = pnModAPIFunc('iw_qv', 'user', 'getassignment', array('qv' => $qv, 'userid'=>$user[id], 'createifnotexist'=>false));
		if (!isset($assignment)){
			$assignment[userid]=$user[id];
		}
		$assignment[userfullname]=$user[fullname];
		$assignments[] = $assignment;
	}
	
	return $assignments;
	
/*		
	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_assignments_column'];
	$where=" $c[qvid]=$qvid AND $c[userid]=$userid ";
	$item = DBUtil::selectObject('iw_qv_assignments', $where);

	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($item === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));			
	}else{
		 if (!isset($item) && $createifnotexist){
			$item = array('qvid' => $qvid,
						  'userid' => $userid);
			// Create the assignment
			$qvaid = pnModAPIFunc('iw_qv', 'user', 'createassignment', $item);
			$item['qvaid']=$qvaid;
		}
		
		// Get or calculate some assignment values
		$fullurl = pnModAPIFunc('iw_qv', 'user', 'getfullurl', array('qv'=>$args['qv'], 'assignment'=>$item, 'viewas'=>$viewas));
		$item['fullurl']=$fullurl;
	}
	
	// Return the item
	return $item;
*/	
}



/**
 * Create a new user assignment into database
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the assignment information (userid, qvid)
 * @return	identity of the new record created or false if error
*/
function iw_qv_userapi_createassignment($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	// Get the parameters
	extract($args);

	// Needed argument
	if (!isset($qvid) || !isset($userid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$item = array('qvid' => $qvid,
				  'userid' => $userid);
				  
	if (isset($qvaid)){
		// Update the assignment
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_assignments_column'];
		$where = "$c[qvaid]=$qvaid ";

		if (!DBUTil::updateObject ($item, 'iw_qv', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
		$item['qvaid']=$qvaid;
	}else{
		if (!DBUtil::insertObject($item, 'iw_qv_assignments', 'qvaid')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}	
		// Let any hooks know that we have created a new item
		pnModCallHooks('item', 'create', $item['qvaid'], array('module' => 'iw_qv'));
	}

	// Return the id of the newly created item to the calling process
	return $item['qvaid'];
}


/**
 * Create or update a new user assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the assignment information (userid, qvid)
 * @return	identity of the new record created/updated or false if error
*/
function iw_qv_userapi_updateassignment($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_ADD)) {
		return LogUtil::registerPermissionError();
	}
	
	// Get the parameters
	extract($args);

	// Needed argument
	if (!isset($qvid) || !isset($userid)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	if ($item = pnModAPIFunc('iw_qv', 'user', 'getassignment', array('qv' => $qvid, 'userid'=>$userid, 'getallinformation'=>false))){
		// Update the assignment
		$item[teachercomments]=$teachercomments;
		$item[teacherobservations]=$teacherobservations;
		
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_assignments_column'];
		$where = "$c[qvaid]=$item[qvaid] ";
		if (!DBUTil::updateObject ($item, 'iw_qv_assignments', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
	}else{
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}

	// Return the id of the newly created item to the calling process
	return $item['qvaid'];
}


/**
 * Compose the full assessment url
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	
 * 				- qv object with the assessment information
 *  			- assignment object with the assignment information
 * 				- userid user identifier
 * 				- fullname full name of the user
 * 				- viewas teacher o student
 * @return string	full url composed with specified params
*/
function iw_qv_userapi_getfullurl($args)
{	
	// Get the parameters
	extract($args);
	
	// @TODO: If the qv file is in the intranet documents, check if it's necessary to add basedist for appl, css and scripts
	
	// Get the params of the URL
	$server = pnGetBaseURL().pnModURL('iw_qv', 'user', 'beans');
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$userfullname = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => $sv, 'uid' => $assignment[userid], 'info'=> 'ncc'));
	
	// Construct the URL
	$qvurl = $qv[url];
	if (strrpos($qvurl,"?")===false) $qvurl.="?";
	else  $qvurl.="&";
		
	$qvurl.= "server=$$$server$$&assignmentid=$assignment[qvaid]&userid=$assignment[userid]&fullname=$userfullname";
	$qvurl.="&skin=$qv[skin]&amp;la"."ng=$qv[lang]&showinteraction=$qv[showinteraction]&showcorrection=$qv[showcorrection]";
	$qvurl.="&userview=$viewas".$params;
	return $qvurl;

//@TODO (pasted from Moodle)
	$qv_file=$qv->url;
	$last=strrpos($qv_file, "/html/");
	$size=strlen($qv_file);
	$params="";
	
	if ($last<strlen($qv_file)){
		$base_file=substr($qv_file, 0, $last+1);
		//if (!(qv_exists_url($base_file."html/appl/qv_local.jar"))) $params.="&appl=$CFG->qv_qvdistplugin_appl";
		//if (!(qv_exists_url($base_file."html/css/generic.css"))) $params.="&css=$CFG->qv_qvdistplugin_css";
		//if (!(qv_exists_url($base_file."html/scripts/qv_local.js"))) $params.="&js=$CFG->qv_qvdistplugin_scripts";
	}
	
	//if (isset($assignment->id)){
		$fullurl = "$qv_url?server=".$CFG->wwwroot."/mod/qv/action/beans.php&assignmentid=$assignment->id&userid=$userid&fullname=$fullname&skin=$qv->skin&lang=$qv->assessmentlang&showinteraction=$qv->showinteraction&showcorrection=$qv->showcorrection&order_sections=$qv->ordersections&order_items=$qv->orderitems".($isteacher?"&userview=teacher":"").(($assignment->sectionorder>0 && $qv->ordersections==1)?"&section_order=$assignment->sectionorder":"").(($assignment->itemorder>0 && $qv->orderitems==1)?"&item_order=$assignment->itemorder":"").$params;
		return $fullurl;
	//}
  return "";
}


/**
 * Create a new qv into database
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the qv information
 * @return	identity of the new record created or false if error
*/
function iw_qv_userapi_createqv($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', "::", ACCESS_ADD)) {
		return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
	}

	// Get the parameters
	extract($args);

	// Needed argument
	if (!isset($title) || !isset($url)) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$item = array('teacher' => $teacher,
				  'groups' => $groups,
				  'title' => $title,
				  'description' => $description,
				  'url' => $url,
				  'skin' => $skin,
				  'lang' => $lang,
				  'maxdeliver' => $maxdeliver,
				  'showcorrection' => $showcorrection,
				  'showinteraction' => $showinteraction,
				  'ordersections' => $ordersections,
				  'orderitems' => $orderitems,
				  'target' => $target,
				  'width' => $width,
				  'height' => $height,
				  'observations' => $observations,
				  'active' => $active);
				  
	if (isset($qvid)){
		// Update the qv
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_column'];
		$where = "$c[qvid]=$qvid ";

		if (!DBUTil::updateObject ($item, 'iw_qv', $where)) {
			return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
		}
		$item['qvid']=$qvid;
	}else{
		if (!DBUtil::insertObject($item, 'iw_qv', 'qvid')) {
			return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
		}	
		// Let any hooks know that we have created a new item
		pnModCallHooks('item', 'create', $item['qvid'], array('module' => 'iw_qv'));
	}

	// Return the id of the newly created item to the calling process
	return $item['qvid'];
}



/**
 * Delete a qv (with its user assignments, sections, messages...)
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param $args['qvid'] ID of the qv assignment
 * @return bool true on success, false on failure
 */
function iw_qv_userapi_deleteqv($args)
{
    $dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', '::', ACCESS_ADD)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }
	
    // Argument check
    if (!isset($args['qvid']) || !is_numeric($args['qvid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $item = pnModAPIFunc('iw_qv', 'user', 'get', array('qvid' => $args['qvid']));
    if ($item == false) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

	// Delete the qv and its assignments
	$assignments=pnModAPIFunc('iw_qv', 'user', 'getqvassignments', array('qvid'=> $args['qvid'])); 
	foreach($assignments as $assignment){
		if (!pnModAPIFunc('iw_qv', 'user', 'deleteuserassignment', array('qvaid'=>$assignment[qvaid]))){
	        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
	}

    if (!DBUtil::deleteObjectByID('iw_qv', $args['qvid'], 'qvid')) {
        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item
    pnModCallHooks('item', 'delete', $args['qvid'], array('module' => 'iw_qv'));

    // Let the calling process know that we have finished successfully
    return true;
}


/**
 * Delete an user assignment (with its sections, messages...)
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param $args['qvaid'] ID of the user assignment
 * @return bool true on success, false on failure
 */
function iw_qv_userapi_deleteuserassignment($args)
{
    $dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', '::', ACCESS_ADD)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }
	
    // Argument check
    if (!isset($args['qvaid']) || !is_numeric($args['qvaid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $item = pnModAPIFunc('iw_qv', 'user', 'getassignment', array('qvaid' => $args['qvaid'], 'createifnotexist'=>false, 'getallinformation'=>false));
    if ($item == false) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

	// Delete the assignment with its sections and messages
	$sections=pnModAPIFunc('iw_qv', 'user', 'getsections', array('qvaid'=> $args['qvaid']));  
	foreach($sections as $section){
		$sections=pnModAPIFunc('iw_qv', 'user', 'deletesection', array('qvsid'=>$section[qvsid]));
	}

    if (!DBUtil::deleteObjectByID('iw_qv_assignments', $args['qvaid'], 'qvaid')) {
        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let any hooks know that we have deleted an item
    pnModCallHooks('item', 'delete', $args['qvaid'], array('module' => 'iw_qv'));

    // Let the calling process know that we have finished successfully
    return true;
}


/**
 * Delete the specified section of an user assignment (with its messages...)
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param $args['qvsid'] ID of the section
 * @return bool true on success, false on failure
 */
function iw_qv_userapi_deletesection($args)
{
    $dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', '::', ACCESS_ADD)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }
	
    // Argument check
    if (!isset($args['qvsid']) || !is_numeric($args['qvsid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $item = pnModAPIFunc('iw_qv', 'user', 'getsection', array('qvsid' => $args[qvsid]));
    if ($item == false) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

	// Delete the section with its messages
	$messages=pnModAPIFunc('iw_qv', 'user', 'getsectionmessages', array('qvsid'=>$args[qvsid]));  
	foreach($messages as $message){
		if (!pnModAPIFunc('iw_qv', 'user', 'deletemessage', array('qvmid'=>$message[qvmid]))){
			LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
		}
	}

    if (!DBUtil::deleteObjectByID('iw_qv_sections', $args['qvsid'], 'qvsid')) {
        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let the calling process know that we have finished successfully
    return true;
}



/**
 * Delete the specified message
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param $args['qvmid'] ID of the message
 * @return bool true on success, false on failure
 */
function iw_qv_userapi_deletemessage($args)
{
    $dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission('iw_qv::', '::', ACCESS_ADD)) {
        return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
    }
	
    // Argument check
    if (!isset($args['qvmid']) || !is_numeric($args['qvmid'])) {
        return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
    }

    $item = pnModAPIFunc('iw_qv', 'user', 'getmessage', array('qvmid' => $args[qvmid]));
    if ($item == false) {
        return LogUtil::registerError (__('No such item found.', $dom));
    }

	// Delete the message and the read messages mark
	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_messages_read_column'];
	$where=" $c[qvmid]=$args[qvmid] ";
	if (!DBUtil::deleteObject(array(), 'iw_qv_messages_read', $where)){
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
		
    if (!DBUtil::deleteObjectByID('iw_qv_messages', $args['qvmid'], 'qvmid')) {
        return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    // Let the calling process know that we have finished successfully
    return true;
}

/**
 * Gets all the assignments relationated with specified qv
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param  args	The following parameters are mandatory:
 *			- qvid 
 * @return	The list of assignments for specified qvid
*/
function iw_qv_userapi_getqvassignments($args)
{
	$dom = ZLanguage::getModuleDomain('iw_qv');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_ADD)) {
		return LogUtil::registerPermissionError();
	}

	// Get the parameters
   	$qvid = FormUtil::getPassedValue('qvid', isset($args['qvid']) ? $args['qvid'] : null, 'POST');
	
	// Needed argument
	if (!isset($qvid) || !is_numeric($qvid) ) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}

	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_assignments_column'];
	$where=" $c[qvid]=$qvid ";
	$assignments = DBUtil::selectObjectArray('iw_qv_assignments', $where);	
	return $assignments;
}

/**
 * Gets all the sections of an user assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	
 *			- qvaid user assignment identifier
 * @return	And array with the sections information
*/
function iw_qv_userapi_getsections($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	// Get the parameters
   	$qvaid = FormUtil::getPassedValue('qvaid', isset($args['qvaid']) ? $args['qvaid'] : null, 'POST');

	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_sections_column'];
	$where=" $c[qvaid]=$qvaid ";
	$sections = DBUtil::selectObjectArray('iw_qv_sections', $where);
	return $sections;
}


/**
 * Gets specified section
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	
 *			- qvsid section identifier
 * @return	And array with the section information
*/
function iw_qv_userapi_getsection($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
		
	$item = DBUtil::selectObjectByID('iw_qv_sections', $args[qvsid], 'qvsid');
	return $item;
}


/**
 * Gets specified message
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	
 *			- qvmid message identifier
 * @return	And array with the message information
*/
function iw_qv_userapi_getmessage($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}	
	$item = DBUtil::selectObjectByID('iw_qv_messages', $args[qvmid], 'qvmid');
	return $item;
}

/**
 * Gets all the messages of specified section
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	
 *			- qvsid section identifier
 * @return	And array with the messages information
*/
function iw_qv_userapi_getsectionmessages($args)
{
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	// Get the parameters
   	$qvsid = FormUtil::getPassedValue('qvsid', isset($args['qvsid']) ? $args['qvsid'] : null, 'POST');

	$pntable = pnDBGetTables();
	$c = $pntable['iw_qv_messages_column'];
	$where=" $c[qvsid]=$args[qvsid] ";
	$messages = DBUtil::selectObjectArray('iw_qv_messages', $where, $c[cr_date]);
	return $messages;
}



/**
 * Process specified bean and returns the result of this procesament
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean information
 * @return	XML with the result to the callback
*/
function iw_qv_userapi_processbean($args)
{
	// Get the parameters
	extract($args);
	
	$beanid=$bean->getAttribute("id");
	switch($beanid){
		// Section beans
		case "correct_section":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$responses = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'responses'));
			$scores = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'scores'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beancorrectsection', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'responses'=>$responses, 'scores'=>$scores));
			break;
		case "deliver_section":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$sectionorder = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionorder'));
			$itemorder = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'itemorder'));
			$sectiontime = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'time'));
			$responses = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'responses'));
			$scores = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'scores'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beandeliversection', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'sectionorder'=>$sectionorder, 'itemorder'=>$itemorder, 'sectiontime'=>$sectiontime, 'responses'=>$responses, 'scores'=>$scores));
			break;
		case "get_section":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beangetsection', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid));
			break;
		case "get_sections":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beangetsections', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid));
			break;
		case "save_section":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$sectionorder = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionorder'));
			$itemorder = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'itemorder'));
			$sectiontime = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'time'));
			$responses = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'responses'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beansavesection', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'sectionorder'=>$sectionorder, 'itemorder'=>$itemorder, 'sectiontime'=>$sectiontime, 'responses'=>$responses));
			break;
		case "save_section_teacher":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$responses = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'responses'));
			$scores = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'scores'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beansavesectionteacher', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'responses'=>$responses, 'scores'=>$scores));
			break;
		case "save_time":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$sectiontime = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'time'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beansavetime', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'sectionorder'=>$sectionorder, 'itemorder'=>$itemorder, 'sectiontime'=>$sectiontime, 'responses'=>$responses));
			break;
			
		// Message beans
		case "add_message":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$itemid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'itemid'));
			$userid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'userid'));
			$message = pnModAPIFunc('iw_qv', 'user', 'beangetcontent', array('bean'=>$bean, 'paramname'=>'message'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beanaddmessage', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'itemid'=>$itemid, 'userid'=>$userid, 'message'=>$message));
			break;
		case "get_messages":
			$assignmentid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'assignmentid'));
			$sectionid = pnModAPIFunc('iw_qv', 'user', 'beangetparam', array('bean'=>$bean, 'paramname'=>'sectionid'));
			$result = pnModAPIFunc('iw_qv', 'user', 'beangetmessages', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid));
			break;
					
		// Error 
		default:
			$result ='<bean id="'.$beanid.'">';
			$result.=' <param name="error" value="error_bean_not_defined"/>';
			$result.='</bean>';
			break;
	}
	return $result;
}


/**
 * Get the information of all the sections of the specified assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beangetsections($args)
{
	// Get the parameters
	extract($args);
	
	$response ='';
	$time='00:00:00';
	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		if ($qv = DBUtil::selectObjectByID('iw_qv', $assignment[qvid], 'qvid')){
			$pntable = pnDBGetTables();
			$c = $pntable['iw_qv_sections_column'];
			$where=" $c[qvaid]=$assignmentid ";
			if ($sections = DBUtil::selectObjectArray('iw_qv_sections', $where, $orderby)){
	  			$maxdeliver=$qv[maxdeliver];
	  			$showcorrection=$qv[showcorrection];
				$totaltime="00:00:00";
	  			foreach($sections as $section){
					$totaltime=pnModAPIFunc('iw_qv', 'user', 'addtime', array('time1'=>$totaltime, 'time2'=>$section[time]));  
	  				$response.="<section ";
	  				$response.=" id=\"$section[sectionid]\" ";
	  				$response.=" showcorrection=\"$showcorrection\"";
	  				$response.=" maxdeliver=\"$maxdeliver\"";
	  				$response.=" attempts=\"$section[attempts]\"";
	  				$response.=" scores=\"$section[scores]\"";
	  				$response.=" pending_scores=\"$section[pendingscores]\"";//A
	  				$response.=" state=\"$section[state]\"";
	  				$response.=" time=\"$section[time]\"";
	  				$response.="/>";
	  			}
			}			
		}
	}
	
	$responseBean.='<bean id="'.$beanid.'" assignmentid="'.$assignmentid.'" time="'.$totaltime.'" '.(isset($error)?'error="'.$error.'"':"").' >';
	$response=$responseBean.$response.'</bean>';
	return $response;
}


/**
 * Get the information of the specified section for the specified assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beangetsection($args)
{
	// Get the parameters
	extract($args);

	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			$responses = $section[responses];
			$scores = $section[scores];
			$pending_scores = $section[pendingscores];
			$attempts = $section[attempts];
			$state = $section[state];
			$time = $section[time];
		}else{
			$responses='';
			$scores='';
			$pending_scores = '';
			$attempts = 0;
			$state = -1;
			$time = "00:00:00";
		}
		if ($qv = DBUtil::selectObjectByID('iw_qv', $assignment[qvid], 'qvid')){
			$qvid=$qv[qvid];
			$maxdeliver=$qv[maxdeliver];
			$showcorrection=$qv[showcorrection];
		}
	}

	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
	$response.=" <section ";
	$response.="  id=\"$sectionid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	$response.="  showcorrection=\"$showcorrection\"";
	$response.="  maxdeliver=\"$maxdeliver\"";
	$response.="  attempts=\"$attempts\"";
	$response.="  state=\"$state\"";
	$response.="  time=\"$time\"";
	$response.=" >";
	$response.="  <responses><![CDATA[$responses]]></responses>";
	$response.="  <scores><![CDATA[$scores]]></scores>";
	$response.="  <pending_scores><![CDATA[$pending_scores]]></pending_scores>";//A
	$response.=" </section>";	  
	$response.='</bean>';
	return $response;
}


/**
 * Save the information of the specified section for the specified assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beansavesection($args)
{
	// Get the parameters
	extract($args);

	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$modifiedAssign = false;
		if($sectionorder>=0){ //Establishing sectionorder
			if($sectionorder!=0 && $assignment[sectionorder]==0){ //it wasn't established before
				$assignment[sectionorder]=$sectionorder;
				$modifiedAssign = true;
			}
	    }
		if($itemorder>=0){ //Establishing itemorder
			if($itemorder!=0 && $assignment[itemorder]==0){ //it wasn't established before
				$assignment[itemorder]=$itemorder;
				$modifiedAssign = true;
			}
	    }	

		if ($modifiedAssign){ //Only update the assignment if necessary
			$pntable = pnDBGetTables();
			$c = $pntable['iw_qv_assignments_column'];
			$where = "$c[qvaid]=$assignmentid ";
			if (!DBUTil::updateObject ($assignment, 'iw_qv_assigments', $where)) {
				$error="error_db_update";
			}
		}
 
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			$qv = DBUtil::selectObjectByID('iw_qv', $assignment[qvid], 'qvid');
			if (pnModAPIFunc('iw_qv', 'user', 'checkmaxdelivernotexceeded', array('qv'=>$qv, 'section'=>$section))){
				//Update section
				$section[responses] = $responses;
				$section[state]=0;
				$section[pendingscores]=$section[scores];
				$section[time]=pnModAPIFunc('iw_qv', 'user', 'addtime', array('time1'=>$section[time], 'time2'=>$sectiontime));
				if ($isdeliver){
					$section[scores] = $scores;
					$section[attempts] = $section[attempts]+1;
					$section[state] = 1;
				}
				if (!DBUTil::updateObject ($section, 'iw_qv_sections', $where)) {
					$error="error_db_update";
				}
			}else{
				$error="error_maxdeliver_exceeded";
			}
		} else{
			// Insert section
			$section = array('qvaid' => $assignmentid,
							 'sectionid' => $sectionid,
							 'responses' => $responses,
							 'state' => 0,
							 'time' => $sectiontime);
			if ($isdeliver){
				$section[scores] = $scores;
				$section[pendingscores] = $scores;
				$section[attempts] = 1;
				$section[state] = 1;
			}							 
			if (!DBUtil::insertObject($section, 'iw_qv_sections', 'qvsid')) {
				$error="error_db_insert";
			}
		}
	}
  	
	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
	$response.=" <section id=\"$sectionid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	if ($isdeliver){
		$response.=" attempts=\"$section[attempts]\" ";
		$response.=" maxdeliver=\"$qv[maxdeliver]\" ";
		$response.=" showcorrection=\"$qv[showcorrection]\" ";
		$response.=" time=\"$section[time]\" ";
	}
	$response.=" state=\"$section[state]\" />";	
	$response.='</bean>';
	return $response;
}


/**
 * Save the information of the specified section for the specified assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beansavesectionteacher($args)
{	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_qv::', '::', ACCESS_ADD)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	
	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			//Update section
			if ($responses!='') $section[responses]=$responses;
			if ($scores!='') $section[pendingscores]=$scores;			
			if ($iscorrect){
				$section[state]=2;			
				if ($scores!='') $section[scores]=$scores;
			}
			if (!DBUTil::updateObject ($section, 'iw_qv_sections', $where)) {
				$error="error_db_update";
			}
		} else{
			// Insert section
			$section = array('qvaid' => $assignmentid,
							 'sectionid' => $sectionid,
							 'responses' => $responses,
							 'pendingscores' => $scores);
			if ($iscorrect){
				$section[state]=2;
				if ($scores!='') $section[scores]=$scores;
			}
			if (!DBUtil::insertObject($section, 'iw_qv_sections', 'qvsid')) {
				$error="error_db_insert";
			}
		}
	}
	  	
	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
	$response.=" <section id=\"$sectionid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	$response.=" state=\"$section[state]\" />";	
	$response.='</bean>';
	return $response;	
}

/**
 * Save the information of the specified section for the specified assignment
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beandeliversection($args)
{
	extract($args);
	$result = pnModAPIFunc('iw_qv', 'user', 'beansavesection', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'sectionorder'=>$sectionorder, 'itemorder'=>$itemorder, 'sectiontime'=>$sectiontime, 'responses'=>$responses, 'scores'=>$scores, 'isdeliver'=>true));
	return $result;	
}



/**
 * Correct specfied section
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beancorrectsection($args)
{
	extract($args);
	$result = pnModAPIFunc('iw_qv', 'user', 'beansavesectionteacher', array('beanid'=>$beanid, 'assignmentid'=>$assignmentid, 'sectionid'=>$sectionid, 'sectionorder'=>$sectionorder, 'itemorder'=>$itemorder, 'sectiontime'=>$sectiontime, 'responses'=>$responses, 'scores'=>$scores, 'iscorrect'=>true));
	return $result;	

	extract($args);
	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			//Update section
			$section[state]=2;
			if ($responses!='') $section[responses]=$responses;
			if ($scores!='') {
				$section[pendingscores]=$scores;
				$section[scores]=$scores;
			}			
			$pntable = pnDBGetTables();
			$c = $pntable['iw_qv_sections_column'];
			$where = "$c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
			if (!DBUTil::updateObject ($section, 'iw_qv_sections', $where)) {
				$error="error_db_update";
			}
		} else{
			// Insert section
			$section = array('qvaid' => $assignmentid,
							 'sectionid' => $sectionid,
							 'responses' => $responses,
							 'scores' => $scores,
							 'pendingscores' => $scores,
							 'state' => 2,
							 'attempts' => 0);
			if (!DBUtil::insertObject($section, 'iw_qv_sections', 'qvsid')) {
				$error="error_db_insert";
			}
		}
	}
	  	
	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
	$response.=" <section id=\"$sectionid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	$response.=" state=\"$section[state]\" />";	
	$response.='</bean>';
	return $response;
}



/**
 * Update the time spended in the specified section 
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beansavetime($args)
{
	// Get the parameters
	extract($args);

	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{ 
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			//Update section
			$section[time]=pnModAPIFunc('iw_qv', 'user', 'addtime', array('time1'=>$section[time], 'time2'=>$sectiontime));
			if (!DBUTil::updateObject ($section, 'iw_qv_sections', $where)) {
				$error="error_db_update";
			}
		} else{
			// Insert section
			$section = array('qvaid' => $assignmentid,
							 'sectionid' => $sectionid,
							 'time' => $sectiontime);
			if (!DBUtil::insertObject($section, 'iw_qv_sections', 'qvsid')) {
				$error="error_db_insert";
			}
		}
	}
  	
	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\">";
	$response.=" <section id=\"$sectionid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	$response.=" time=\"$section[time]\" />";	
	$response.='</bean>';
	return $response;
}


/**
 * Get all the messages for specified section
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beangetmessages($args)
{
	extract($args);
	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if ($section = DBUtil::selectObject('iw_qv_sections', $where)){
			$uid = pnUserGetVar('uid');
			
			$pntable = pnDBGetTables();
			$c = $pntable['iw_qv_messages_column'];
			$where=" $c[qvsid]=$section[qvsid] ";
			if ($messages = DBUtil::selectObjectArray('iw_qv_messages', $where, $c[cr_date])){
	  			foreach($messages as $message){
	  				// Mark the message as read for the current user
					$pntable = pnDBGetTables();
					$c = $pntable['iw_qv_messages_read_column'];
					$where=" $c[qvmid]=$message[qvmid] AND $c[userid]=$uid ";
					if (!$message_read = DBUtil::selectObject('iw_qv_messages_read', $where)){
						$message_read = array('qvmid' => $message[qvmid],
										 	  'userid' => $uid);
						if (!($qvmrid = DBUtil::insertObject($message_read, 'iw_qv_messages_read', 'qvmrid'))) {
							$error="error_db_insert";
						}
					}
					
					// Create XML response
					$response.="\n<message id=\"$message[qvmid]\" ";
					$response.=" itemid=\"$message[itemid]\" ";
					$response.=" userid=\"$message[userid]\" ";
					if ($user = pnModFunc('iw_main', 'user', 'getUserInfo', array('sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'), 'uid' => $message[userid], 'info'=> 'ncc'))){
						$response.=" username=\"$user\" ";						
					}
					$response.=">\n";
					$response.="<![CDATA[".$message[message]."]]>\n";
					$response.="</message>\n";
	  			}
			}
		}
	}
	$responseBean.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\" sectionid=\"$sectionid\" userid=\"$userid\" ";
	if (isset($error)) $responseBean.=" error=\"$error\" ";
	$responseBean.=" >";
	$response=$responseBean.$response.'</bean>';
	return $response;
}

/**
 * Add a message to the specified section item
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	XML with the result of the callback
*/
function iw_qv_userapi_beanaddmessage($args)
{
	extract($args);
	if (!($assignment = DBUtil::selectObjectByID('iw_qv_assignments', $assignmentid, 'qvaid'))){
		$error = "error_assignmentid_does_not_exist";
	}else{
		$pntable = pnDBGetTables();
		$c = $pntable['iw_qv_sections_column'];
		$where=" $c[qvaid]=$assignmentid AND $c[sectionid]='$sectionid' ";
		if (!$section = DBUtil::selectObject('iw_qv_sections', $where)){
			// Insert section
			$section = array('qvaid' => $assignmentid,
							 'sectionid' => $sectionid);
			if (!($section = DBUtil::insertObject($section, 'iw_qv_sections', 'qvsid'))) {
				$error="error_db_insert";
			}
		}
		
		if (!isset($error)){
			// Insert message
			$message = array('qvsid' => $section[qvsid],
							 'itemid' => $itemid,
							 'userid' => $userid,
							 'message' => $message);
			if (!($qvmid = DBUtil::insertObject($message, 'iw_qv_messages', 'qvmid'))) {
				$error="error_db_insert";
			}
		}
	}
	  	
	$response.="<bean id=\"$beanid\" assignmentid=\"$assignmentid\" sectionid=\"$sectionid\" itemid=\"$itemid\" userid=\"$userid\" >";
	$response.=" <message id=\"$qvmid\" ";
	if (isset($error)) $response.=" error=\"$error\" ";
	$response.='/>';
	$response.='</bean>';
	return $response;
}


/**
 * Check if the number of delivers is exceeded
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	True if number of delivers isn't exceeded; false otherwise
*/
function iw_qv_userapi_checkmaxdelivernotexceeded($args){
	extract($args);
	//Check max deliver < current attempts
	return ($qv[maxdeliver]<0 || $section[attempts] < $qv[maxdeliver]);
}



/**
 * Get the the value of the specified param
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	Value of the specified param
*/
function iw_qv_userapi_beangetparam($args)
{
	extract($args);
	
	if (!isset($elementname)) $elementname="param";
	$params = $bean->getElementsByTagName($elementname);
	foreach($params as $param){
		if ($paramname == $param->getAttribute("name")){
			$paramvalue= $param->getAttribute("value");
			if ($paramvalue==''){
				$paramvalue=$param->nodeValue;
			}
			break;
		}
	}
	return $paramvalue;
}

/**
 * Get the the value of the specified param
 * @author Sara Arjona TÃ©llez (sarjona@xtec.cat)
 * @param	args	array with the bean parameters
 * @return	Value of the specified param
*/
function iw_qv_userapi_beangetcontent($args)
{
	extract($args);
	return $bean->getElementsByTagName($paramname)->item(0)->nodeValue;
}


/**
 * Sum $time2 to $time1
 * @author Albert Llastarri (albert.llastarri@gmail.com)
 * @param	args	
 * 				- time1
 * 				- time2
 * @return	The sum of both times
*/
function iw_qv_userapi_addtime($args){
	extract($args);
	
	$h1 = (int)substr($time1,0,2);
	$m1 = (int)substr($time1,3,5);
	$s1 = (int)substr($time1,6,8);
	$h2 = (int)substr($time2,0,2);
	$m2 = (int)substr($time2,3,5);
	$s2 = (int)substr($time2,6,8);
	
	$s3 = $s1+$s2;
	$m3 = $m1+$m2;
	$h3 = $h1+$h2;
	
	if ($s3>59){
		$s3=$s3-60;
		$m3=$m3+1;
	}
	if ($m3>59){
		$m3=$m3-60;
		$h3=$h3+1;
	}
	
	$s4 = "";
	if ($s3<10){
		$s4 = "0".$s3;
	} else {
		$s4 = $s3."";
	}
	$m4 = "";
	if ($m3<10){
		$m4 = "0".$m3;
	} else {
		$m4 = $m3."";
	}
	$h4 = "";
	if ($h3<10){
		$h4 = "0".$h3;
	} else {
		$h4 = $h3."";
	}

	return $h4.":".$m4.":".$s4;
}
