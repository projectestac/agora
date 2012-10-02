<?php
function smarty_function_iwbookingsadminmenulinks($params, &$smarty)
{
    $func = FormUtil::getPassedValue('func', isset($args['func']) ? $args['func'] : null, 'GET');
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    
	$dom = ZLanguage::getModuleDomain('iw_bookings');	
	// set some defaults
	if (!isset($params['start'])) {
		$params['start'] = '[';
	}
	if (!isset($params['end'])) {
		$params['end'] = ']';
	}
	if (!isset($params['seperator'])) {
		$params['seperator'] = '|';
	}
	if (!isset($params['class'])) {
		$params['class'] = 'pn-menuitem-title';
	}

	$bookingsadminmenulinks = "<span class=\"" . $params['class'] . "\">" . $params['start'] . " ";

	if (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
		$bookingsadminmenulinks .= "<a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_bookings', 'admin', 'new', array('m'=>'n'))) . "\">" . __('Add a new booking',$dom) . "</a> " . $params['seperator'];	

		$bookingsadminmenulinks .= " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_bookings', 'admin', 'main')) . "\">" . __('Show rooms and equipment bookings',$dom) . "</a> ";

	    if ($func == 'assigna'){        
		        $bookingsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_bookings', 'admin', 'buida', array('sid'=>$sid))) . "\">" . __('Empty table',$dom) . "</a> ";
		}
		
		$bookingsadminmenulinks .= $params['seperator'] . " <a href=\"" . DataUtil::formatForDisplayHTML(pnModURL('iw_bookings', 'admin', 'conf')) . "\">" . __('Module configuration',$dom) . "</a> ";		
	}

	$bookingsadminmenulinks .= $params['end'] . "</span>\n";

	return $bookingsadminmenulinks;
}

?>
