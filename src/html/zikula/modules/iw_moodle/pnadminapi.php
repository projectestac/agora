<?php
/**
 * Gets all the uses pre-enroled into a course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the course
 * @return:	And array with the users
*/
function iw_moodle_adminapi_getallpreins($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	$registres = array();
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	extract($args);
	// Needed arguments.
	if (!isset($args['id']) || !is_numeric($args['id']) || !isset($args['role']) || !is_numeric($args['role'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$pntable = pnDBGetTables();
	$c = $pntable['iw_moodle_column'];
	$where = "$c[mcid]=$id AND $c[role]=$role";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('iw_moodle', $where);
	// Check for an error with the database code, and if so set an appropriate
	// error message and return
	if ($items === false) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	// Return the items
	return $items;
}

/**
 * Get all the courses avaliable in Moodle
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return:	The main information about the courses avaliable in Moodle
*/
function iw_moodle_adminapi_getall()
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix=pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$sql = "SELECT
			id, fullname, summary, shortname, format, visible
			FROM
				$prefix"."course
			WHERE
				category > 0
			ORDER BY
				id DESC";
	$rs = $connect->Execute($sql);
	if (!$rs) {
		$connect->close();
		return $registres;
	}
	while ($array = $rs->FetchRow()) {
		$registres[] = array('id' => $array[0],
								'fullname' => $array[1],
								'summary' => $array[2],
								'shortname' => $array[3],
								'format' => $array[4],
								'visible' => $array[5]);
	}
	$connect->close();
	return $registres;
}

/**
 * Delete the enrolament of a user into a course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the role into the role_assignments table
 * @return:	true if success
*/
function iw_moodle_adminapi_delete($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$sql = "DELETE FROM
			$prefix"."role_assignments
			WHERE
				$prefix"."role_assignments.id=$roleid";
	$result = $connect->Execute($sql);
	if (!$result) {
		$connect->close();
		return LogUtil::registerError (__('Error! Sorry! Deletion attempt failed.', $dom));
	}
	$connect->close();
	// Return and array with values
	return true;
}

/**
 * Change the activation of the Moodle courses
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the course to activate or to unactivate
 * @return:	true if success
*/
function iw_moodle_adminapi_activate($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	//get course
	$course = pnModAPIFunc('iw_moodle', 'user', 'getcourse', array('courseid' => $id));
	$visible = ($course['visible'] == 0) ? 1 : 0;
	$sql = "UPDATE
			$prefix"."course
			SET
				visible = $visible
			WHERE
				id=$id";
	$result = $connect->Execute($sql);
	if (!$result) {
		$connect->close();
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	$connect->close();
	return true;
}

/**
 * Gets all users enroled into a course and the roles of these users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the course
 * @return:	An array with the users and roles
*/
function iw_moodle_adminapi_getallusersbyrole($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$sql = "SELECT
			$prefix"."course.id, userid, username, auth, lastaccess, contextid, $prefix"."role_assignments.id
			FROM
				$prefix"."course, $prefix"."role_assignments, $prefix"."user, $prefix"."context
			WHERE
				$prefix"."context.instanceid=$id 
				AND $prefix"."context.contextlevel=50 
				AND $prefix"."context.id = $prefix"."role_assignments.contextid
				AND $prefix"."role_assignments.roleid = $role
				AND $prefix"."role_assignments.userid = $prefix"."user.id 
				AND $prefix"."course.id=$id";
	$rs = $connect->Execute($sql);
	if (!$rs) {
		$connect->close();
		return LogUtil::registerError (_SELECTFAILED);
	}
	while ($array = $rs->FetchRow()) {
		$registres[] = array('id' => $array[0],
								'userid' => $array[1],
								'username' => $array[2],
								'auth' => $array[3],
								'lastaccess' => $array[4],
								'contextid' => $array[5],
								'roleid' => $array[6]);
	}
	$connect->close();
	// Return and array with values
	return $registres;	
}

/**
 * Gets all the roles in a Moodle course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the course
 * @return:	An array with the name and identities of the roles
*/
function iw_moodle_adminapi_getallroles()
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$sql = "SELECT
			$prefix"."role.id, $prefix"."role.name
			FROM
				$prefix"."role";
	$rs = $connect->Execute($sql);
	if (!$rs) {
		$connect->close();
		return LogUtil::registerError (_SELECTFAILED);
	}
	while ($array = $rs->FetchRow()) {
		$registres[] = array('id' => $array[0],
							 'name' => $array[1]);
	}
	$connect->close();
	// Return and array with values
	return $registres;
}

/**
 * Get the id of a user into the website
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   the user name
 * @return:	the id of the user
*/

function iw_moodle_adminapi_getuserPNuid($args){
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	extract ($args);
	$pntable = pnDBGetTables();
	$c = $pntable['users_column'];
	$where = "$c[uname]='$pn_uname'";
	// get the objects from the db
	$items = DBUtil::selectObjectArray('users', $where);
	// Return the user id
	return $items[0]['uid'];
}

/**
 * Create the enrolements and the preinscriptions of the users into the courses
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the course, the roles and a array with the users
 * @return:	true if success
*/
function iw_moodle_adminapi_enrol_user($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission('iw_moodle::', '::', ACCESS_ADMIN) && !SecurityUtil::checkPermission('coursesblock::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$time = time();
	$sql = "SELECT
			$prefix"."context.id
			FROM
				$prefix"."context
			WHERE
				$prefix"."context.instanceid=$course
			AND
				$prefix"."context.contextlevel=50";
	$rs = $connect->Execute($sql);
	if (!$rs) {
		$connect->close();
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	$array = $rs->FetchRow();
	$contextid = $array[0];
	$sql = "INSERT INTO
			$prefix"."role_assignments (userid,roleid,contextid,timemodified,enrol,modifierid)
			VALUES
			($user,$role,$contextid,'$time','db',".pnUserGetVar("uid").")";
	$result = $connect->Execute($sql);
	if (!$result) {
		$connect->close();
		return LogUtil::registerError (__('An error occurred doing the action.', $dom));
	}
	$connect->close();
	return true;
}

/**
 * Count the number of users who satisfy a rule
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   the rule that have to be satisfied
 * @return:	The number of users who satisfy the rule
*/
function iw_moodle_adminapi_nombre($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Connect with database
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['group_membership'];
	$c = $pntable['group_membership_column'];
	$t1 = $pntable['users'];
	$c1 = $pntable['users_column'];
	if($filtre == '0'){$filtre = '';}
	$filtregrup = ($campfiltre != '0') ? " $c[gid] = ".(int)pnVarPrepForStore($campfiltre)." and " : '';
	$sql = "SELECT COUNT(DISTINCT $t.$c[uid])
			FROM
				$t, $t1
			WHERE
				".$filtregrup." $t.$c[uid] = $t1.$c1[uid]
				AND $c1[uname] LIKE '".$filtre."%'
			ORDER BY
				$c1[uname]";
	$registre = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
		$connect->close();
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	list($nombre) = $registre->fields;
	$registre->close();
	// Return and array with values
	return $nombre;
}

/**
 * Change the method used by the user to validate into Moodle. Two possibilities: from the website via db or from the Moodle using the manual method
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the users that have to change their validation method
 * @return:	true if success
*/
function iw_moodle_adminapi_change($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();	
	if($user_connect == 1){
		$sql = "UPDATE
				$prefix"."user
				SET
					auth='manual',password='$user_pass'
				WHERE
					username='".strtolower($user_name)."'";
		$result = $connect->Execute($sql);
	} elseif ($user_connect == 0){
		$sql = "UPDATE
				$prefix"."user
			SET
				auth='db',password='$user_pass'
			WHERE
				username='".strtolower($user_name)."'";
		$result = $connect->Execute($sql);
	}else{
		$result = pnModAPIFunc('iw_moodle', 'admin', 'inscriu', array('uid' => $user_id));
	}
	if (!$result) {
		$connect->close();
		return LogUtil::registerError (__('Error! Update attempt failed.', $dom));
	}
	$connect->close();
	return true;
}

/**
 * Create user into Moodle
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the users that have to change their validation method
 * @return:	true if success
*/
function iw_moodle_adminapi_inscriu($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract ($args);
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN) && pnUserGetVar('uid') != $uid) {
		//return LogUtil::registerPermissionError();
	}
	if(!isset($uid)){
		$uid = pnUserGetVar('uid');
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	// Prepare vars because we're going to change the database
	$uname = strtolower(pnUserGetVar('uname',$uid));
	$pass = pnUserGetVar('pass',$uid);
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$firstname = pnModFunc('iw_main', 'user', 'getUserInfo', array('uid' => pnUserGetVar('uid',$uid),
																	'info' => 'n',
																	'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$lastname = pnModFunc('iw_main', 'user', 'getUserInfo', array('uid' => pnUserGetVar('uid',$uid),
																	'info' => 'c1',
																	'sv' => $sv));
	$sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
	$lastname2 = pnModFunc('iw_main', 'user', 'getUserInfo', array('uid' => pnUserGetVar('uid',$uid),
																	'info' => 'c2',
																	'sv' => $sv));
	
	if($lastname2 != ''){
		$lastname .= ' '.$lastname2;
	}
	$dfl_description = (pnModGetVar('iw_moodle', 'dfl_description') != '') ? pnModGetVar('iw_moodle', 'dfl_description'): ' ';
	$dfl_language = (pnModGetVar('iw_moodle', 'dfl_language') != '') ? pnModGetVar('iw_moodle', 'dfl_language') : ' ';
	$dfl_country = (pnModGetVar('iw_moodle', 'dfl_country') != '') ? pnModGetVar('iw_moodle', 'dfl_country') : ' ';
	$dfl_city = (pnModGetVar('iw_moodle', 'dfl_city') != '') ? pnModGetVar('iw_moodle', 'dfl_city') : ' ';
	$dfl_gtm = (pnModGetVar('iw_moodle', 'dfl_gtm') != '') ? pnModGetVar('iw_moodle', 'dfl_gtm') : ' ';
	$email = pnUserGetVar('pn_email', $uid);
	if($lastname == ''){
		$lastname = ' ';
	}
	if($email == ''){$email = $uname.'@mail.domain';}
	// get admin mnethostid to user the value for the other users
	$userAdmin = pnModAPIFunc('iw_moodle', 'user', 'getuserMDuid',array('username' => 'admin'));

    // let's proceed
	$time = time();

    // Open connection to moodle. Username and database were set in connectExtDB
    DBConnectionStack::pushConnection('moodle');

    $sql = "INSERT INTO
			$prefix"."user (auth, confirmed, username, password, description, lang, timemodified, country, city, firstname, lastname, email, timezone, mnethostid)
			VALUES
				('db', 1, '" . 
				DataUtil::formatForStore($uname) . "', '" .
				DataUtil::formatForStore($pass) . "', '" .
				DataUtil::formatForStore($dfl_description) . "', '" .
				DataUtil::formatForStore($dfl_language) . "', '" .
				DataUtil::formatForStore($time) . "', '" .
				DataUtil::formatForStore($dfl_country) . "', '" .
				DataUtil::formatForStore($dfl_city) . "', '" .
				DataUtil::formatForStore($firstname) . "', '" .
				DataUtil::formatForStore($lastname) . "', '" .
				DataUtil::formatForStore($email) . "', '" .
				DataUtil::formatForStore($dfl_gtm) . "', " .
                $userAdmin['mnethostid'] . ")";

    $exec = DBUtil::executeSQL($sql);

    // Close connection to moodle
    DBConnectionStack::popConnection(true);

    if ($exec) { return true; }
    else { return false; }
}


/**
 * Gets all users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   id of the group of users to return
 * @return:	an array with the main information of the users
*/
function iw_moodle_adminapi_getusers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	$registres = array();
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	// Connect with database
	list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
	$t = $pntable['group_membership'];
	$c = $pntable['group_membership_column'];
	$t1 = $pntable['users'];
	$c1 = $pntable['users_column'];
	if($filtre == '0'){$filtre = '';}
	$filtregrup = ($campfiltre != '0') ? " $c[gid] = ".(int)pnVarPrepForStore($campfiltre)." and " : '';
	$sql = "SELECT DISTINCT
				$t1.$c1[uid], $c1[pass]
			FROM
				$t, $t1
			WHERE
				".$filtregrup." $t.$c[uid] = $t1.$c1[uid]
			AND
				$c1[uname] LIKE '".$filtre."%'
			ORDER BY
				$c1[uname]";
	$registre = $dbconn->SelectLimit($sql, (int)$numitems, (int)$inici-1);
	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	for (; !$registre->EOF; $registre->MoveNext()) {
		list($uid,$password) = $registre->fields;
		$registres[] = array('uid' => $uid, 'password' => $password);
	}
	$registre->close();
	// Return and array with values
	return $registres;
}

/**
 * Pre-enrol user in a course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course, the role and the id of the user
 * @return:	True if success
*/
function iw_moodle_adminapi_preenrol_user($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	// Check that the needed args have arrived properly
	if (!isset($args['mcid']) || !isset($args['uid'])  || !isset($args['role'])) {
		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	// Security check
	if (!pnSecAuthAction( 0 , 'iw_moodle::' , "::" ,ACCESS_ADMIN)){ 
		return false; 
	}
	if (!DBUtil::insertObject($args, 'iw_moodle', 'mid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	return $args['mid'];
}

/**
 * Pre-enrol user in a course
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   Array with the id of the course, the role and the id of the user
 * @return:	True if success
*/
function iw_moodle_adminapi_getMoodleUsers($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	extract($args);
	// Security check
	$registres = array();
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_moodle::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	$prefix = pnModGetVar('iw_moodle', 'dbprefix');
	$connect = DBConnectionStack::init('moodle');
	if ($connect == null){
		return LogUtil::registerError (__('The connection to Moodle database has failed.', $dom));
	}
	DBConnectionStack::popConnection();
	$time = time();
	$sql = "SELECT
				id,username, password, firstname, lastname, email
			FROM
				$prefix"."user
			WHERE
				confirmed = 1
			AND
				deleted = 0";
	$rs = $connect->Execute($sql);
	if (!$rs) {
		$connect->close();
		return LogUtil::registerError (__('Error! Could not load items.', $dom));
	}
	while ($array = $rs->FetchRow()) {
		$usersArray[] = array('id' => $array[0],
								'username' => $array[1],
								'password' => $array[2],
								'firstname' => $array[3],
								'lastname' => $array[4],
								'email' => $array[5]);
	}
	$connect->close();
	return $usersArray;
}

/**
 * Create a new user in table users
 * @author:     Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @param:	args   user values
 * @return:	True if success and false otherwise
*/
function iw_moodle_adminapi_createUser($args)
{
	$dom = ZLanguage::getModuleDomain('iw_moodle');
	$nom = FormUtil::getPassedValue('nom', isset($args['nom']) ? $args['nom'] : null, 'POST');
	$cognoms = FormUtil::getPassedValue('cognoms', isset($args['cognoms']) ? $args['cognoms'] : null, 'POST');
	$pass = FormUtil::getPassedValue('pass', isset($args['pass']) ? $args['pass'] : null, 'POST');
	$uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : null, 'POST');
	$email = FormUtil::getPassedValue('email', isset($args['email']) ? $args['email'] : null, 'POST');
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_users::', '::', ACCESS_ADMIN)) {
		return LogUtil::registerPermissionError();
	}
	//Needed arguments
	if ($uname == null || $pass == null || $email == null) {
 		return LogUtil::registerError (__('Error! Could not do what you wanted. Please check your input.', $dom));
	}
	$items = array('uname' => $uname,
					'pass' => $pass,
					'email' => $email,
					'activated' => 1,
					'hash_method' => 1,
					'user_regdate' => date("Y-m-d H:i:s", time()));
	if (!$result = DBUtil::insertObject($items, 'users', 'uid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	$items = array('uid' => $items['uid'],
					'nom' => $nom,
					'cognom1' => $cognoms);
	if (!DBUtil::insertObject($items, 'iw_users', 'suid')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	//add user to default group
	$defaultgroup = pnModGetVar('Groups','defaultgroup');
	$items = array('uid' => $items['uid'],
					'gid' => $defaultgroup);
	if (!DBUtil::insertObject($items, 'group_membership')) {
		return LogUtil::registerError (__('Error! Creation attempt failed.', $dom));
	}
	// Return the id of the newly created user to the calling process
	return $items['uid'];
}
