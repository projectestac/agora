<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnuserapi.php 9 2008-11-05 21:42:16Z Guite $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Stats
 */

/**
 * Collect the base stats
 */
function stats_userapi_collect($args)
{
    $dom = ZLanguage::getModuleDomain('Stats');
	// security check
	// this check is slightly different from most security checks since we want
	// to exclude stats being collected for site admins
	if (SecurityUtil::checkPermission('::', '::', ACCESS_ADMIN)) {
		return;
	}

	// check if stats collection is enabled
	if (!pnModGetVar('stats', 'collect')) {
		return;
	}

	// check for the sniffer module
	if (!pnModAvailable('Sniffer')) {
		LogUtil::registerError(__('Sniffer module required to log stats', $dom));
		return;
	}

	// check for the excluded ip address
	$ip = pnModGetVar('stats', 'excludeip');
	$host = pnServerGetVar('REMOTE_ADDR');
	if (substr($host, 0, strlen($ip)) == $ip) {
		return;
	}

	// call the sniffer module to collect the browser and os info
	$browserinfo = pnModAPIFunc('Sniffer', 'user', 'get');

	// get the broswer data
	switch ($browserinfo->_browser_info['browser']) {
		// we treat mozilla firebird as firefox since these are the same product range
		case 'fx' :
		case 'fb' :
			$browser = 'Firefox';
			break;
		case 'ie' :
			$browser = 'MSIE';
			break;
		case 'ns' :
			$browser = 'Netscape';
			break;
		case 'op' :
			$browser = 'Opera';
			break;
		case 'sf' :
			$browser = 'Safari';
			break;
		case 'mz' :
			$browser = 'Mozilla';
			break;
		case 'lx' :
			$browser = 'Lynx';
			break;
		case 'ch' :
			$browser = 'Chimera';
			break;
		case 'ca' :
			$browser = 'Camino';
			break;
		case 'ep' :
			$browser = 'Epiphany';
			break;
		case 'ga' :
			$browser = 'Galeon';
			break;
		case 'km' :
			$browser = 'K-Meleon';
			break;
		case 'kq' :
			$browser = 'Konqueror';
			break;
		default :
			$browser = 'Other';
			break;
	}

	// get the platform and os data
	switch ($browserinfo->_browser_info['platform']) {
		case 'win':
			$os = 'Windows';
			break;
		case 'mac':
			switch ($browserinfo->_browser_info['os']) {
				case 'osx':
					$os = 'MacOSX';
					break;
				default:
					$os = 'Mac';
			}
			break;
		case 'os2':
			$os = 'OS/2';
			break;
		case '*nix':
			switch ($browserinfo->_browser_info['os']) {
				case 'linux':
					$os = 'Linux';
					break;
				case 'bsd':
				case 'freebsd':
					$os = 'BSD';
					break;
				case 'sun':
				case 'sun4':
				case 'sun5':
				case 'suni86':
					$os = 'SunOS';
					break;
				case 'irix5':
				case 'irix6':
					$os = 'IRIX';
					break;
				case 'aix':
				case 'aix1':
				case 'aix2':
				case 'aix3':
					$os = 'AIX';
					break;
				default:
					$os = 'Other';
					break;
			}
			break;
		default:
			$os = 'Other';
			break;
	}

	// Save on the databases the obtained values
	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();

	$column = $pntable['counter_column'];
	$sql = "UPDATE $pntable[counter]
					  SET $column[count]=$column[count]+1
					  WHERE ($column[type]='total' AND $column[var]='hits')
					  OR ($column[var]='".DataUtil::formatForStore($browser)."' AND $column[type]='browser')
					  OR ($column[var]='".DataUtil::formatForStore($os)."' AND $column[type]='os')";
	$dbconn->Execute($sql);

	// Per-Day-Counter
	$xydate=date('dmY');
	$column = $pntable['stats_date_column'];
	$xyval = $dbconn->Execute("SELECT $column[hits] as hits
								FROM $pntable[stats_date]
								WHERE $column[date]='".DataUtil::formatForStore($xydate)."'");

	if ($dbconn->ErrorNo() != 0) {
		return LogUtil::registerError('Error accessing stats information');
	}
	$ttemp=$xyval->GetRowAssoc(false);
	$xyval->MoveNext();
	$happend=$ttemp['hits'];
	if ($happend==''||$happend==false||!$happend) {
		$column = $pntable['stats_date_column'];
		$dbconn->Execute("INSERT INTO $pntable[stats_date]
						  ($column[date], $column[hits]) VALUES ('".DataUtil::formatForStore($xydate)."','1')");
	} else {
		$column = $pntable['stats_date_column'];
		$dbconn->Execute("UPDATE $pntable[stats_date]
						  SET $column[hits]=$column[hits]+1
						  WHERE $column[date]='".DataUtil::formatForStore($xydate)."'");
	}

	// Per-Hour-Counter
	$xyhour=date('G');
	$column = $pntable['stats_hour_column'];
	$dbconn->Execute("UPDATE $pntable[stats_hour]
					  SET $column[hits]=$column[hits]+1
					  WHERE $column[hour]='".DataUtil::formatForStore($xyhour)."'");

	// Weekday-Counter
	$xyweekday=date('w');
	$column = $pntable['stats_week_column'];
	$dbconn->Execute("UPDATE $pntable[stats_week]
					  SET $column[hits]=$column[hits]+1
					  WHERE $column[weekday]='".DataUtil::formatForStore($xyweekday)."'");

	// Month-Counter
	$xymonth=date('m');
	$column = $pntable['stats_month_column'];
	$dbconn->Execute("UPDATE $pntable[stats_month]
					  SET $column[hits]=$column[hits]+1
					  WHERE $column[month]='".DataUtil::formatForStore($xymonth)."'");
}

function stats_userapi_getmain()
{
    $dom = ZLanguage::getModuleDomain('Stats');
	// Security check
	if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
		return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
	}

	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();

	/************************ Begin Main stats collections *************************************/
	// Stats Hour - Day Stats
	for ($i = 1; $i <= 12; $i++) {
		$monthnames[] = gmstrftime('%B', gmmktime(0,0,0,$i,1,'1970'));
	}
	// loop counter starts as 4 since 4th Jan 1970 is a sunday; the first day of the week
	for ($i = 4; $i <= 11; $i++) {
		$weekdaynames[] = gmstrftime('%A', gmmktime(0,0,0,1,$i,'1970'));
	}

	$toddate = date("dmY");
	// 24hours ago = yesterday
	$yesdate = date("dmY",time()-(60*60*24));

	$column = $pntable['stats_date_column'];
	$toddb = $dbconn->Execute("SELECT $column[hits] as hits FROM $pntable[stats_date] WHERE $column[date]='".DataUtil::formatForStore($toddate)."'");
	if (!$toddb->EOF) {
		list($valtoday)=$toddb->fields;
	} else {
		$valtoday=0;
	}

	$column = $pntable['stats_date_column'];
	$yesdb = $dbconn->Execute("SELECT $column[hits] as hits FROM $pntable[stats_date] WHERE $column[date]='".DataUtil::formatForStore($yesdate)."'");
	if (!$yesdb->EOF) {
		list($valyesday)=$yesdb->fields;
	} else {
		$valyesday=0;
	}

	// Fetch some more infos about best and worst day ever
	$column = $pntable['stats_date_column'];
	$query = "SELECT $column[date], $column[hits]
				FROM $pntable[stats_date]
				ORDER BY $column[hits] DESC";
	$dbr = $dbconn->SelectLimit("$query,1");
	list ($best_day_date, $best_day_hits) = $dbr->fields;

	$best_day = mktime(0, 0, 0, substr($best_day_date, 2, 2), substr($best_day_date, 0, 2), substr($best_day_date, 4, 4));
	$query = "SELECT $column[date], $column[hits]
				FROM $pntable[stats_date]
				ORDER BY $column[hits] ASC";
	$dbr = $dbconn->SelectLimit("$query,1");
	list ($worst_day_date, $worst_day_hits) = $dbr->fields;
	$worst_day = mktime(0, 0, 0, substr($worst_day_date, 2, 2), substr($worst_day_date, 0, 2), substr($worst_day_date, 4, 4));

	// get all rows from the db at once and go through the result
	$column = $pntable['stats_hour_column'];
	$result = $dbconn->Execute("SELECT $column[hits] FROM $pntable[stats_hour]");
	$hour = 0; $sumhour = 0;

	while (!$result->EOF) {
		$hourhitamount[$hour] = $result->fields[0];
		if ($hour == 0) {
			$hourbesthits = $hourhitamount[$hour];
			$hourbest = 0;
			$hourbadhits = $hourhitamount[$hour];
			$hourbad = 0;
		}
		if ($hourhitamount[$hour] > $hourbesthits) {
			$hourbesthits = $hourhitamount[$hour];
			$hourbest = $hour;
		}
		if ($hourhitamount[$hour] < $hourbadhits) {
			$hourbadhits = $hourhitamount[$hour];
			$hourbad = $hour;
		}
		$sumhour += $hourhitamount[$hour];
		$hour++;
		$result->MoveNext();
	}
	$result->Close();

	// get all rows from the db at once and go through the result
	$column = $pntable['stats_week_column'];
	$result = $dbconn->Execute("SELECT $column[hits] FROM $pntable[stats_week]");
	$weekday = 0; $sumweek = 0;
	while (!$result->EOF) {
		$weekhitamount[$weekday] = $result->fields[0];
		if ($weekday == 0) {
			$weekdaybesthits = $weekhitamount[$weekday];
			$weekdaybest = 0;
			$weekdaybadhits = $weekhitamount[$weekday];
			$weekdaybad = 0;
		}
		if ($weekhitamount[$weekday] > $weekdaybesthits) {
			$weekdaybesthits = $weekhitamount[$weekday];
			$weekdaybest = $weekday;
		}
		if ($weekhitamount[$weekday] < $weekdaybadhits) {
			$weekdaybadhits = $weekhitamount[$weekday];
			$weekdaybad = $weekday;
		}
		$sumweek += $weekhitamount[$weekday];
		$weekday++;
		$result->MoveNext();
	}
	$result->Close();

	// get all rows from the db at once and go through the result
	$column = $pntable['stats_month_column'];
	$result = $dbconn->Execute("SELECT $column[hits] FROM $pntable[stats_month]");
	$month = 1; $summon = 0;
	$monthbesthits = 0;
	$monthbadhits = 0;
	while (!$result->EOF) {
		$monthhitamount[$month] = $result->fields[0];
		if ($monthhitamount[$month] > $monthbesthits) {
			$monthbesthits = $monthhitamount[$month];
			$monthbest = $month;
		}
		if ($monthhitamount[$month] < $monthbadhits) {
			$monthbadhits = $monthhitamount[$month];
			$monthbad = $month;
		}
		$summon += $monthhitamount[$month];
		$month++;
		$result->MoveNext();
	}
	$result->Close();
	/************************ End Main stats collections *************************************/

	$byhour = array();
	if (pnModGetVar('stats', 'twentyfourhour')) {
		for ($hour = 0; $hour < 24; $hour++) {
			$label = DataUtil::formatForDisplay($hour).':00 - '.DataUtil::formatForDisplay($hour).':59';
			$byhour[] = array('label' => $label, 'percent' => round((100*$hourhitamount[$hour])/$hourbesthits,0), 'hits' => $hourhitamount[$hour]);
		}
	} else {
		for ($hour = 1; $hour < 24; $hour++) {
			if ($hourbesthits == 0) $hourbesthits = 1;
			if ($hour < 13) $label = DataUtil::formatForDisplay($hour).' am';
			else $label = DataUtil::formatForDisplay($hour % 12).' pm';
			$byhour[] = array('label' => $label, 'percent' => round((100*$hourhitamount[$hour])/$hourbesthits,0), 'hits' => $hourhitamount[$hour]);
		}
		if ($sumhour == 0) $sumhour = 1;
		$percent = round((100*$hourhitamount[0])/$sumhour,2);
		$byhour[] = array('label' => '12pm:', 'percent' => round((100*$hourhitamount[0])/$hourbesthits,0), 'hits' => $hourhitamount[0]);
	}

	$byweek = array();
	if ($weekdaybesthits == 0) $weekdaybesthits = 1;
	$byweek[0] = array('percent' => round((100*$weekhitamount[0])/$weekdaybesthits,0), 'hits' => $weekhitamount[0]);
	for ($weekday=1; $weekday<=6; $weekday++) {
		if ($weekdaybesthits == 0) $weekdaybesthits = 1;
		$byweek[] = array('percent' => round((100*$weekhitamount[$weekday])/$weekdaybesthits,0), 'hits' => $weekhitamount[$weekday]);
	}

	$bymonth = array();
	for ($month=1; $month<=12; $month++){
		if ($monthbesthits == 0) $monthbesthits = 1;
		$bymonth[] = array('percent' => round((100*$monthhitamount[$month])/$monthbesthits,0), 'hits' => $monthhitamount[$month]);
	}

	//form the results set
	$mainstats = array( 'valtoday' => $valtoday, 'valyesday' => $valyesday,
						'best_day' => $best_day, 'best_day_hits' => $best_day_hits,
						'worst_day' => $worst_day, 'worst_day_hits' => $worst_day_hits,
						'weekdaynames' => $weekdaynames, 'weekdaybest' => $weekdaybest, 'weekdaybesthits' => $weekdaybesthits,
						'weekdaybad' => $weekdaybad, 'weekdaybadhits' => $weekdaybadhits,
						'hourbest' => $hourbest, 'hourbesthits' => $hourbesthits,
						'hourbad' => $hourbad, 'hourbadhits' => $hourbadhits,
						'byweek' => $byweek, 'byhour' => $byhour, 'bymonth' => $bymonth);
	return $mainstats;
}

function stats_userapi_getbrowseros()
{
    $dom = ZLanguage::getModuleDomain('Stats');
	// Security check
	if (!SecurityUtil::checkPermission('Stats::', '::', ACCESS_READ)) {
		return LogUtil::registerError (__('Sorry! No authorization to access this module.', $dom));
	}

	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();
	$column = $pntable['counter_column'];
	$sql = "SELECT $column[type], $column[var], $column[count] FROM $pntable[counter] ORDER BY $column[type] DESC";
	$result = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo()<>0) {
		return LogUtil::registerError ($dbconn->ErrorNo(). ': '.$dbconn->ErrorMsg());
	}

	$browsers = array('firefox' => array(0, 0), 'mozilla' => array(0, 0), 'safari' => array(0, 0), 'camino' => array(0, 0), 'chimera' => array(0, 0), 'netscape' => array(0, 0), 
					  'msie' => array(0, 0), 'konqueror' => array(0, 0), 'epiphany' => array(0, 0), 'galeon' => array(0, 0), 'opera' => array(0, 0), 'lynx' => array(0, 0),
					  'kmeleon' => array(0, 0), 'bot' => array(0, 0), 'b_other' => array(0, 0));
	$os = array('windows' => array(0, 0), 'macosx' => array(0, 0), 'mac' => array(0, 0), 'linux' => array(0, 0), 'freebsd' => array(0, 0), 'sunos' => array(0, 0), 'irix' => array(0, 0),
				'os2' => array(0, 0), 'aix' => array(0, 0), 'os_other' => array(0, 0));
	while(list($type, $var, $count) = $result->fields) {
		$result->MoveNext();
		/* Lets do one big switch instead of many if/then statements */
		switch ($type) {
			case 'total':
				switch ($var) {
					case 'hits':
						$total = $count;
						break;
				}
			case 'browser':
				if ($count == 0) { 
					$percent = 0;
					continue;
				}
				switch ($var) {
					case 'Firefox':
						$browsers['firefox'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['firefox'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Mozilla':
						$browsers['mozilla'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['mozilla'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Safari':
						$browsers['safari'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['safari'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Camino':
						$browsers['camino'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['camino'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Chimera':
						$browsers['chimera'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['chimera'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Netscape':
						$browsers['netscape'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['netscape'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'MSIE':
						$browsers['msie'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['msie'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Konqueror':
						$browsers['konqueror'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['konqueror'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Epiphany':
						$browsers['epiphany'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['epiphany'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Galeon':
						$browsers['galeon'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['galeon'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Opera':
						$browsers['opera'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['opera'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Lynx':
						$browsers['lynx'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['lynx'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'K-Meleon':
						$browsers['kmeleon'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['kmeleon'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Bot':
						$browsers['bot'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['bot'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Other':
						$browsers['b_other'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$browsers['b_other'][1] =  !empty($percent) ? $percent:0;
						break;
				}
			case 'os':
				if ($count == 0) { 
					$percent = 0;
					continue;
				}
				switch ($var) {
					case 'Windows':
						$os['windows'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['windows'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'MacOSX':
						$os['macosx'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['macosx'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Mac':
						$os['mac'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['mac'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Linux':
						$os['linux'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['linux'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'FreeBSD':
						$os['freebsd'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['freebsd'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'SunOS':
						$os['sunos'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['sunos'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'IRIX':
						$os['irix'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['irix'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'OS/2':
						$os['os2'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['os2'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'AIX':
						$os['aix'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['aix'][1] =  !empty($percent) ? $percent:0;
						break;
					case 'Other':
						$os['os_other'][0] = $count;
						$percent = substr(100 * $count / $total, 0, 5);
						$os['os_other'][1] =  !empty($percent) ? $percent:0;
						break;
				}
		}
	}
	return(array('browsers' => $browsers, 'os' => $os, 'total' => $total));
}
