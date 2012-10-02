<?php

/**
 * User main page
 * @author	Albert Pérez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
 * @return	List of the available spaces or equipements
 */
// Max. user name chars to show 
define("MAXLENGTH", 22);

function iw_bookings_user_main() {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    //Security check!SecurityUtil::checkPermission(
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
        return false;
    }

    if (pnModGetVar('iw_bookings', 'NTPtime')) {
        $tOffset = SessionUtil::getVar('timeOffset');
        if (empty($tOffset)) {
            // Calculate time diference between our server and a NTP time server
            $timeOffset = pnModApiFunc('iw_bookings', 'user', 'getNTPDate') - DateUtil::makeTimestamp();
            SessionUtil::setVar('timeOffset', $timeOffset);
        }
    }

    //Esborrem les reserva antigues i les reserves d'anul�laci�
    if ((pnModGetVar('iw_bookings', 'eraseold') == 1) && (SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADMIN))) {
        pnModAPIFunc('iw_bookings', 'user', 'esborra_antigues', array('sid' => -1));
    }

    if (pnModGetVar('iw_bookings', 'month_panel')) {
        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => -1, 'mensual' => 1)));
    } else {
        pnRedirect(pnModURL('iw_bookings', 'user', 'espais', array('sid' => -1, 'mensual' => 0)));
    }

    return true;
}

/**
 * Show the module information
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The module information
 */
function iw_bookings_user_module() {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom), 403);
    }

    $module = pnModFunc('iw_main', 'user', 'module_info', array('module_name' => 'iw_bookings', 'type' => 'admin'));

    $pnRender = pnRender::getInstance('iw_bookings', false);
    $pnRender->assign('module', $module);

    return $pnRender->fetch('iw_bookings_user_module.htm');
}

/**
 * Generate module menu
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The module menu
 */
function iw_bookings_user_menu($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');
    //Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
        return false;
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'GET');
    $space = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));

    $pnRender = pnRender::getInstance('iw_bookings', false);

    (!isset($sid)) ? $sid = -1 : "";

    //Constru�m la matriu que contindr� les opcions del men� en una sola fila
    $usrMenu = array();
    $usrMenu[] = array('url' => pnModURL('iw_bookings', 'user', 'espais', array('sid' => -1, 'mensual' => $mensual)), 'text' => __('Show rooms and equipment bookings', $dom));

    if ($mensual == 1 && $sid != -1) {
        $tipus_taula = __('Show table of the week', $dom);
        $vista = 0;
    } else {
        $tipus_taula = __('Show table of month', $dom);
        $vista = 1;
    }
    $usrMenu[] = array('url' => pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'mensual' => $vista)),
        'text' => $tipus_taula);

    // Opci� esborrar antigues nom�s apareix si drets ADMIN i no seleccionat esborrat autom�tic
    if (SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADMIN)) {
        if ($sid != '-1' || is_null($sid)) {
            $text = __('Delete all bookings of ', $dom) . $space['space_name'];
            $usrMenu[] = array('url' => pnModURL('iw_bookings', 'admin', 'buida', array('sid' => $sid)),
                'text' => $text);
        }
        if (!pnModGetVar('iw_bookings', 'eraseold')) {
            $usrMenu[] = array('url' => pnModURL('iw_bookings', 'user', 'esborra_antigues', array('sid' => $sid, 'mensual' => $mensual)),
                'text' => __('Delete old bookings', $dom));
        }
        $usrMenu[] = array('url' => pnModURL('iw_bookings', 'admin'), 'text' => __('Module administration', $dom));
    }

    $pnRender->assign('user_menu', $usrMenu);

    return $pnRender->fetch('iw_bookings_user_menu.htm');
}

/**
 * Generates the main page for book, cancel and consult bookings
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	the page
 */
function iw_bookings_user_assigna($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
    $dow = FormUtil::getPassedValue('dow', isset($args['dow']) ? $args['dow'] : 0, 'GET');
    $showontop = FormUtil::getPassedValue('sot', isset($args['sot']) ? $args['sot'] : 0, 'GET');
    $date = FormUtil::getPassedValue('d', isset($args['d']) ? $args['d'] : null, 'GET'); //User selects a cell in the booking table
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'REQUEST');
    $inc = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');

    $currentDate = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'POST'); //User selects a date in the calendar
    $month = FormUtil::getPassedValue('month', isset($args['month']) ? $args['month'] : null, 'REQUEST');
    $year = FormUtil::getPassedValue('year', isset($args['year']) ? $args['year'] : null, 'REQUEST');

    // Si l'usuari selecciona una data de la taula
    if (empty($currentDate) and (!empty($date))) {
        $dateParts = explode('-', $date);
        $currentDate = DateUtil::buildDatetime($dateParts[2], $dateParts[1], $dateParts[0], 0, 0, 0, '%Y-%m-%d');
    }

    if ($sid <> -1) {
        //Es crida la funci� API que retorna les dades de l'espai que volem reservar
        $nom = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));
        $marc = $nom['mdid'];
        //Per si falla la c�rrega de les dades
        if ($nom == false) {
            LogUtil::registerError(__('The room or equipment was not found', $dom));
            return pnRedirect(pnModURL('iw_bookings', 'user', 'main'));
        }
    } else {
        $nom['space_name'] = __('All rooms and equipments', $dom);
    }

    // Get date difference in days to limit backtracking
    $diff = DateUtil::getDatetimeDiff($currentDate, DateUtil::getDatetime());

    // Weeks before actual week are not allowed
    if ($diff[d] > 0) {
        $currentDate = DateUtil::getDatetime();
    }

    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
        // Weeks beyond num. weeks limit are not allowed
        $weekslimit = pnModGetVar('iw_bookings', 'weeks');
        if (($weekslimit > 0 ) and ($diff[d] < -7 * $weekslimit)) {
            $currentDate = DateUtil::getDatetime(DateUtil::makeTimestamp() + $weekslimit * 7 * 24 * 60 * 60, '%Y-%m-%d');
            LogUtil::registerError(__('Bookings can only be made for the following ', $dom) . $weekslimit . __(' week(s). Booking date is not valid', $dom));
        }
    }
    $canbook = SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADD);

    if ($mensual) {
        $taula = pnModFunc('iw_bookings', 'user', 'monthlyview', array('sid' => $sid, 'mensual' => $mensual, 'm' => $inc, 'month' => $month, 'year' => $year));
    } else {
        $week = pnModApiFunc('iw_bookings', 'user', 'getWeek', array('date' => $currentDate, 'format' => 'dmy'));

        $jumpDates = pnModApiFunc('iw_bookings', 'user', 'getJumpDates', array('date' => $currentDate));
        if ($canbook) {
            //Creem el formulari per fer reserves temporals
            $formulari = pnModFunc('iw_bookings', 'user', 'formulari_assigna', array('sid' => $sid, 'dow' => $dow, 'cdate' => $currentDate, 'sot' => $showontop));
        } else {
            $formulari = '.';
        }
        //Creem la taula de l'estat de les reserves
        $taula = pnModFunc('iw_bookings', 'user', 'taula',
                        array(
                            'sid' => $sid,
                            'currentDate' => $currentDate,
                            'bookingDate' => $date,
                            'mensual' => $mensual,
                            'canbook' => $canbook));
        // Creem el formulari per seleccionar la data
        $calendari = pnModFunc('iw_bookings', 'user', 'selectDate', array(
                    'sid' => $sid,
                    'date' => $currentDate,
                    'start' => $week[start],
                    'end' => $week[end],
                    'prevWeek' => $jumpDates[prevweek],
                    'nextWeek' => $jumpDates[nextweek],
                    'prevMonth' => $jumpDates[prevmonth],
                    'nextMonth' => $jumpDates[nextmonth],
                    'mensual' => $mensual,
                    'showontop' => $showontop));
        if (empty($taula) || empty($formulari)) {
            LogUtil::registerError(__('An error has occurred when loading the table or the form', $dom));
            return pnRedirect(pnModURL('iw_bookings', 'admin', 'main'));
        }
    }
    $space = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));
    // Not show in tabular format
    $ntf = !(($space['mdid']) and ($space['vertical']));

    $menu = pnModFunc('iw_bookings', 'user', 'menu', array(
                'mensual' => $mensual,
                'sid' => $sid));

    $pnRender = pnRender::getInstance('iw_bookings', false);
    $pnRender->assign('nom_espai', $nom['space_name']);
    $pnRender->assign('taula', $taula);
    $pnRender->assign('sid', $sid);
    $pnRender->assign('showontop', $showontop);
    $pnRender->assign('calendari', $calendari);
    $pnRender->assign('formulari', $formulari);
    $pnRender->assign('noTable', $ntf);
    $pnRender->assign('dow', $dow);
    $pnRender->assign('menu', pnModFunc('iw_bookings', 'user', 'menu', array('mensual' => $mensual, 'sid' => $sid)));

    return $pnRender->fetch('iw_bookings_user_assigna.htm');
}

// END assigna

/**
 * Show a form to select a date and the corresponding week period  
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The form
 */
function iw_bookings_user_selectDate($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $date = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'GET');
    $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
    $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
    $prevWeek = FormUtil::getPassedValue('prevWeek', isset($args['prevWeek']) ? $args['prevWeek'] : null, 'GET');
    $prevMonth = FormUtil::getPassedValue('prevMonth', isset($args['prevMonth']) ? $args['prevMonth'] : null, 'GET');
    $nextWeek = FormUtil::getPassedValue('nextWeek', isset($args['nextWeek']) ? $args['nextWeek'] : null, 'GET');
    $nextMonth = FormUtil::getPassedValue('nextMonth', isset($args['nextMonth']) ? $args['nextMonth'] : null, 'GET');
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'GET');
    $showontop = FormUtil::getPassedValue('showontop', isset($args['showontop']) ? $args['showontop'] : null, 'GET');

    $pnRender = pnRender::getInstance('iw_bookings', false);
    $pnRender->assign('date', $date);
    $pnRender->assign('start', $start);
    $pnRender->assign('end', $end);
    $pnRender->assign('sid', $sid);
    $pnRender->assign('prevWeek', $prevWeek);
    $pnRender->assign('nextWeek', $nextWeek);
    $pnRender->assign('prevMonth', $prevMonth);
    $pnRender->assign('nextMonth', $nextMonth);
    $pnRender->assign('mensual', $mensual);
    $pnRender->assign('showontop', $showontop);

    return $pnRender->fetch('iw_bookings_user_select_date.htm');
}

/**
 * Show the form for make new bookings
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The booking form
 */
function iw_bookings_user_formulari_assigna($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $dow = FormUtil::getPassedValue('dow', isset($args['dow']) ? $args['dow'] : 0, 'GET');
    $fh = FormUtil::getPassedValue('fh', isset($args['fh']) ? $args['fh'] : 0, 'GET');
    $sot = FormUtil::getPassedValue('sot', isset($args['sot']) ? $args['sot'] : 0, 'GET'); // sot = 1 shows form over books table
    $bookingDate = FormUtil::getPassedValue('d', isset($args['d']) ? $args['d'] : null, 'GET');

    $currentDate = date('Y-m-d', strtotime($args[cdate]));

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADD)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    //Es crida la funci� API que retorna les dades de l'espai que volem reservar
    $espai = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));

    if ($espai['mdid'] != 0) {
        //Busquem les franges hor�ries i les tornem en forma de matriu per un MultiSelect
        $franges = pnModAPIFunc('iw_bookings', 'user', 'getall_hores_MS', array('mdid' => $espai['mdid']));
    }

    ($period >= 0) ? $period = $franges[$fh]['id'] : $period = null;
    //Constru�m l'array dels dies per el formulari
    (pnModGetVar('iw_bookings', 'weekends')) ?
                    $dia = array(
                array('id' => '1', 'name' => __('Monday', $dom)),
                array('id' => '2', 'name' => __('Tuesday', $dom)),
                array('id' => '3', 'name' => __('Wednesday', $dom)),
                array('id' => '4', 'name' => __('Thursday', $dom)),
                array('id' => '5', 'name' => __('Friday', $dom)),
                array('id' => '6', 'name' => __('Saturday', $dom)),
                array('id' => '7', 'name' => __('Sunday', $dom))) :
                    $dia = array(array('id' => '1', 'name' => __('Monday', $dom)),
                array('id' => '2', 'name' => __('Tuesday', $dom)),
                array('id' => '3', 'name' => __('Wednesday', $dom)),
                array('id' => '4', 'name' => __('Thursday', $dom)),
                array('id' => '5', 'name' => __('Friday', $dom)));

    $week = pnModApiFunc('iw_bookings', 'user', 'getWeek', array('date' => $currentDate, 'format' => 'ymd'));
    $startDate = $week[start];
    $fields = explode('-', $startDate);
    $dies_dates = array();

    if ($currentDate == DateUtil::getDateTime('', "%Y-%m-%d")) {
        $j = date("w", DateUtil::makeTimestamp($currentDate));
        ($j == 0) ? $j = 7 : "";
    } else {
        $j = 1;
    }

    for ($i = $j; $i <= count($dia); ++$i) {
        $dies_dates[$i - $j] = DateUtil::buildDatetime($fields[0], $fields[1], $fields[2] + $i - 1, 0, 0, 0, '%d-%m-%Y');
    }

    $showDays = array();
    for ($i = $j; $i <= (count($dia)); ++$i) {
        $showDays[$i - $j] = array('id' => $dia[$i - 1]['id'], 'name' => $dia[$i - 1]['name']);
    }

    $hora = array(array('id' => '0', 'name' => '08'),
        array('id' => '1', 'name' => '09'),
        array('id' => '2', 'name' => '10'),
        array('id' => '3', 'name' => '11'),
        array('id' => '4', 'name' => '12'),
        array('id' => '5', 'name' => '13'),
        array('id' => '6', 'name' => '14'),
        array('id' => '7', 'name' => '15'),
        array('id' => '8', 'name' => '16'),
        array('id' => '9', 'name' => '17'),
        array('id' => '10', 'name' => '18'),
        array('id' => '11', 'name' => '19'),
        array('id' => '12', 'name' => '20'),
        array('id' => '13', 'name' => '21'),
        array('id' => '14', 'name' => '22'));

    $minut = array(array('id' => '0', 'name' => '00'),
        array('id' => '1', 'name' => '05'),
        array('id' => '2', 'name' => '10'),
        array('id' => '3', 'name' => '15'),
        array('id' => '4', 'name' => '20'),
        array('id' => '5', 'name' => '25'),
        array('id' => '6', 'name' => '30'),
        array('id' => '7', 'name' => '35'),
        array('id' => '8', 'name' => '40'),
        array('id' => '9', 'name' => '45'),
        array('id' => '10', 'name' => '50'),
        array('id' => '11', 'name' => '55'));

    // If the user is admin can make books in name of other users
    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $professorat = '';
    if (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN)) {
        $professorat = pnModFunc('iw_main', 'user', 'getMembersGroup', array('gid' => pnModGetVar('iw_bookings', 'group'), 'sv' => $sv));
        sort($professorat);
        if (empty($professorat)) {
            LogUtil::registerError(__('Permanent bookings are not possible as long as the group is empty. Please check module configuration', $dom), 403);
        }
    }

    $sv = pnModFunc('iw_main', 'user', 'genSecurityValue');
    $username = pnModFunc('iw_main', 'user', 'getUserInfo', array('uid' => pnUserGetVar('uid'), 'sv' => $sv));

    // Extra frames to add
    $found = false;
    $extra_frames = array();
    $i = 0;
    foreach ($franges as $franja) {
        if ($franja['name'] == $period) {
            $found = true;
        } else {
            if ($found) {
                $franja['pos'] = $i;
                $extra_frames[] = $franja;
                $i++;
            }
        }
    }

    $pnRender = pnRender::getInstance('iw_bookings', false);

    $pnRender->assign('dayofweek', $dow);
    $pnRender->assign('bookingDate', $bookingDate);
    $pnRender->assign('period', $period);
    $pnRender->assign('sot', $sot);
    $pnRender->assign('fh', $fh);
    $pnRender->assign('dayofweek1', $dow + 1);
    $pnRender->assign('franges', $franges);
    $pnRender->assign('diasetmana', $dia[$dow][name]);
    $pnRender->assign('dia', $showDays);
    $pnRender->assign('dates', $dies_dates);
    $pnRender->assign('hora', $hora);
    $pnRender->assign('minut', $minut);
    $pnRender->assign('sid', $sid);
    $pnRender->assign('weekslimit', pnModGetVar('iw_bookings', 'weeks'));
    $pnRender->assign('user', pnUserGetVar('uid'));
    $pnRender->assign('professorat', $professorat);
    $pnRender->assign('username', $username);
    $pnRender->assign('extra_frames', $extra_frames);

    return $pnRender->fetch('iw_bookings_user_assigna_frm.htm');
}

// END formulari_assigna

/**
 * Get bookings depending on date periods
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	List or table with the bookings 
 */
function iw_bookings_user_taula($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'GET');
    $currentDate = FormUtil::getPassedValue('currentDate', isset($args['currentDate']) ? $args['currentDate'] : null, 'GET');
    $canbook = FormUtil::getPassedValue('canbook', isset($args['canbook']) ? $args['canbook'] : false, 'GET');

    //Array amb els noms dels dies de la setmana
    $dies = array(__('Monday', $dom), __('Tuesday', $dom), __('Wednesday', $dom), __('Thursday', $dom), __('Friday', $dom), __('Saturday', $dom), __('Sunday', $dom));

    //D'entrada farem que les taules es mostrin de forma horitzontal. Despr�s, si
    //hi ha un marc horari definit canviarem al que correspongui
    $vertical = 0;
    //(pnModGetVar('iw_bookings', 'eraseold')==1)?
    //$actualitza=pnModAPIFunc('iw_bookings','user','esborra_antigues', array('sid'=> $sid, 'mensual'=> $mensual)):"";
    // Get space info
    $espai = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));
    //Per si falla la c�rrega de les dades
    if ($espai == false) {
        return LogUtil::registerError(__('The room or equipment was not found', $dom));
    }

    $nom_espai = $espai['name'];

    //Comprovem si la taula est� lligada a un marc horari i si aquest marc horari
    //no ha estat esborrat
    if ($espai['mdid'] != 0) {
        //Busquem les franges hor�ries
        $franges = pnModAPIFunc('iw_bookings', 'user', 'getall_hores', array('mdid' => $espai['mdid']));
        if (!empty($franges)) {
            $vertical = $espai['vertical'];
        }
    }

    // Obtenim la data inicial i final de la setmana seleccionada
    $week = pnModApiFunc('iw_bookings', 'user', 'getWeek', array('date' => $currentDate, 'format' => 'ymd'));
    $startDate = $week[start];
    $endDate = $week[end];

    $pnRender = pnRender::getInstance('iw_bookings', false);

    //Generem la taula amb el format corresponent
    if ($vertical != 1) {
        //Taula en format horitzontal
        $taula = array();
        $d = 0;
        $fields1 = explode('-', $startDate);

        foreach ($dies as $dia) {
            $i++;

            $today = DateUtil::getDatetime_NextDay(($i - 1), '%Y-%m-%d', $fields1[0], // Year
                            $fields1[1], // Month
                            $fields1[2]); // Day;
            $tomorrow = DateUtil::getDatetime_NextDay(($i), '%Y-%m-%d %H:%M:%S', $fields1[0], // Year
                            $fields1[1], // Month
                            $fields1[2], 23, 59, 59); // Day;

            $reserves = pnModAPIFunc('iw_bookings', 'user', 'getall_reserves', array('sid' => $sid, 'from' => $today,
                        'to' => $tomorrow));
            $registres = array();

            //Afegim les reserves temporals a la matriu registres fent la correcci� de la data
            foreach ($reserves as $reserva) {
                //Mirem que coincideixi el dia de la setmana
                if ($reserva['dayofweek'] == $i) {
//					if (($reserva['usuari'] == pnUserGetVar('uid')) or (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_DELETE))) {
                    if (($reserva['usuari'] == pnUserGetVar('uid'))
                            or (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN))) {
                        $candelete = true;
                    } else {
                        $candelete = false;
                    }
                    $registres[] = array('inici' => $reserva['inici'],
                        'final' => $reserva['final'],
                        'bid' => $reserva['bid'],
                        'usuari' => $reserva['usuari'],
                        'dow' => $dies[$i - 1],
                        'grup' => $reserva['grup'],
                        'motiu' => $reserva['motiu'],
                        'candelete' => $candelete,
                        'temp' => $reserva['temp']);
                }
            }
            if (!empty($registres)) {
                $nr = 0;
                foreach ($registres as $registre) {
                    $registre['data'] = $registre['dow'] . " " . date('d-m-Y', strtotime($today)); //$dia." ".date("d/m/y",$data1);
                    $registre['inici'] = date('H:i', strtotime($registre['inici'])); //date("H:i",$registre['inici']);
                    $registre['final'] = date('H:i', strtotime($registre['final'])); //date("H:i",$registre['final']);
                    $registre['usuari'] = pnModFunc('iw_main', 'user', 'getUserInfo',
                                    array('uid' => $registre['usuari'],
                                        'sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'),
                                        'info' => 'ncc'));
                    $taula[$d][$nr] = $registre;
                    $nr++; //Incrementem l'�ndex de reserves del dia
                }
                $d++;  //Incrementem el dia
            }
        } // foreach $dies
        $pnRender->assign('numdies', count($taula));
        $pnRender->assign('record', $taula);
    } else {    // show bookings in table format
        $dies_data = array();
        $fields = explode('-', $startDate);
        (pnModGetVar('iw_bookings', 'weekends')) ? $numdies = 7 : $numdies = 5;
        for ($i = 0; $i <= $numdies; $i++) {
            $dies_data[$i] = DateUtil::buildDatetime($fields[0], $fields[1], $fields[2] + $i, 0, 0, 0, '%d-%m-%y'); // Day
        }
        //Make table column headers: day of week and date
        (pnModGetVar('iw_bookings', 'weekends')) ?
                        $dies_taula = array(__('Monday', $dom) . ' ' . $dies_data[0], __('Tuesday', $dom) . ' ' . $dies_data[1], __('Wednesday', $dom) . ' ' . $dies_data[2], __('Thursday', $dom) . ' ' .
                    $dies_data[3], __('Friday', $dom) . ' ' . $dies_data[4], __('Saturday', $dom) . ' ' . $dies_data[5], __('Sunday', $dom) . ' ' . $dies_data[6]) :
                        $dies_taula = array(__('Monday', $dom) . ' ' . $dies_data[0], __('Tuesday', $dom) . ' ' . $dies_data[1], __('Wednesday', $dom) . ' ' . $dies_data[2], __('Thursday', $dom) . ' ' .
                    $dies_data[3], __('Friday', $dom) . ' ' . $dies_data[4]);

        // Get all bookings between startDate and endDate
        $reserves = pnModAPIFunc('iw_bookings', 'user', 'getall_reserves', array('sid' => $sid, 'from' => $startDate,
                    'to' => $endDate));

        $now = DateUtil::getDatetime(DateUtil::makeTimestamp() + SessionUtil::getVar('timeOffset'));

        //Generem les franges hor�ries amb les corresponents reserves
        //Generate timeframes with their bookings
        $i = 0;
        $f = 0;

        foreach ($franges as $franja) {
            $horari[$i]['hi'] = substr($franja['hora'], 0, 5);
            $horari[$i]['hf'] = substr($franja['hora'], -5);
            $temps = explode(":", substr($franja['hora'], -5));
            $j = 0;
            $d = 0;
            foreach ($dies as $dia) {
                $j++;
                $registre1 = array();
                foreach ($reserves as $reserva) {
                    // Mirem que coincideixi el dia de la setmana
                    // See day of week coincidence
                    if ($reserva['dayofweek'] == $j
                            && (date('H:i', strtotime($reserva['inici'])) == substr($franja['hora'], 0, 5))
                            && (date('H:i', strtotime($reserva['final'])) == substr($franja['hora'], -5))) {
                        $usr = pnModFunc('iw_main', 'user', 'getUserInfo',
                                        array('uid' => $reserva['usuari'],
                                            'sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'),
                                            'info' => 'ncc'));
                        //if (($reserva['usuari'] == pnUserGetVar('uid')) or (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_DELETE))) {
                        if (($reserva['usuari'] == pnUserGetVar('uid'))
                                or (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN))) {
                            $candelete = true;
                        } else {
                            $candelete = false;
                        }
                        $registre1 = array('inici' => $reserva['inici'],
                            'final' => $reserva['final'],
                            'bid' => $reserva['bid'],
                            'grup' => $reserva['grup'],
                            'motiu' => $reserva['motiu'],
                            'temp' => $reserva['temp'],
                            'candelete' => $candelete,
                            'usuari' => $usr);
                    }
                }

                $taula[$f][$d] = $registre1;
                if (empty($registre1)) {
                    $taula[$f][$d]['usuari'] = " - ";
                    // Data i hora de refer�ncia per comparar amb la actual i decidir si es mostra o no
                    // Assign a date and a time. This value is compared with real time and date and determines if it will be showed or not
                    $taula[$f][$d]['final'] = DateUtil::buildDatetime($fields[0], $fields[1], $fields[2] + ($d), $temps[0], $temps[1], 0, '%Y-%m-%d %H:%M:%S');
                }
                // Incrementem el dia de la setmana
                // Increase the day of week
                $d++;
            }
            // Passem a la seg�ent franja hor�ria
            // Next timeframe
            $f++;
            $i++;
        }
        $pnRender->assign('dies_data', $dies_data);
        $pnRender->assign('dies_taula', $dies_taula);
        $pnRender->assign('franges', $franges);
        $pnRender->assign('horari', $horari);
        $pnRender->assign('record', $taula);
        $pnRender->assign('now', $now);
    }
    $pnRender->assign('vertical', $vertical);
    $pnRender->assign('canbook', $canbook);
    $pnRender->assign('sid', $sid);
    $pnRender->assign('dies', $dies);
    $pnRender->assign('date', date('Y-m-d', strtotime($currentDate)));
    $pnRender->assign('d', date('d-m-y', strtotime($currentDate)));
    $pnRender->assign('periode', __('Period from ', $dom) . date('d-m-Y', strtotime($startDate)) . __(' to ', $dom) . date('d-m-Y', strtotime($endDate)));


    return $pnRender->fetch('iw_bookings_user_taula.htm');
}

//END mostra_taula

/**
 * Delete a booking o grouped bookings
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The form
 */
function iw_bookings_user_anulla($arg) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
    $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'REQUEST');
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'REQUEST');
    $cdate = FormUtil::getPassedValue('d', isset($args['d']) ? $args['d'] : null, 'REQUEST');

    $confirm = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
    $eraseAll = FormUtil::getPassedValue('eraseAll', isset($args['eraseAll']) ? $args['eraseAll'] : 0, 'POST');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    //Mirem les caracter�stiques de la reserva que volem anul�lar per verificar
    //si l'usuari que est� fent l'eliminaci� �s qui t� l'espai o equip reservat
    // Check if user can delete this book
    $bookingInfo = pnModAPIFunc('iw_bookings', 'user', 'get_bookingInfo', array('bid' => $bid));

    if (empty($bookingInfo)) {
        //Error a l'intentar anul�lar la reserva
        // Delete book error
        return LogUtil::registerError(__('An error has ocurred while cancelling the booking. Please, try it again. If the problem persists, please, contact webmaster. Additionally, check you are not cancelling a book on past dates', $dom));
    }

    if (($bookingInfo['user'] != pnUserGetVar('uid')) and (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN))) {
        //Un usuari est� intentant anul�lar la reserva d'un altre
        // User is triying to delete a book from another user
        LogUtil::registerError(__('You are not allowed to cancel bookings from other people', $dom));
        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna',
                        array('sid' => $sid,
                            'mensual' => $mensual,
                            'd' => $cdate)));
        return true;
    }


    if (empty($confirm)) {
        $room = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));
        $pnRender = pnRender::getInstance('iw_bookings', false);
        $pnRender->assign('menu', pnModFunc('iw_bookings', 'user', 'menu'));
        $pnRender->assign('name', $room['space_name']);
        $pnRender->assign('d', $cdate);
        $pnRender->assign('sid', $sid);
        $pnRender->assign('multiple', $bookingInfo[count]);
        if ($bookingInfo[count] > 0) {
            LogUtil::registerError(__('This booking belongs to a set of simultaneous bookings', $dom));
        }
        if ($bookingInfo['temp'] == 1) {
            LogUtil::registerError(__('Warning, this is a preferential booking.', $dom));
        }
        $pnRender->assign('bookingDate', date('d-m-Y', strtotime($bookingInfo[start])));
        $pnRender->assign('start', date('H:i', strtotime($bookingInfo[start])));
        $pnRender->assign('end', date('H:i', strtotime($bookingInfo[end])));
        $pnRender->assign('user', pnModFunc('iw_main', 'user', 'getUserInfo',
                        array('uid' => $bookingInfo[user],
                            'sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'),
                            'info' => 'ncc')));
        $pnRender->assign('group', $bookingInfo[usrgroup]);
        $pnRender->assign('bid', $bid);
        $pnRender->assign('mensual', $mensual);
        $pnRender->assign('d', $cdate);
        return $pnRender->fetch('iw_bookings_user_delete_bookings.htm');
    } else {
        if (SecurityUtil::confirmAuthKey()) {
            $anulla = pnModAPIFunc('iw_bookings', 'user', 'anulla', array('bid' => $bid, 'eraseAll' => $eraseAll, 'bookingKey' => $bookingInfo['bkey']));
            if (!$anulla) {
                LogUtil::registerError(__('An error has ocurred while cancelling the booking. Please, try it again. If the problem persists, please, contact webmaster. Additionally, check you are not cancelling a book on past dates', $dom));
            } else {
                LogUtil::registerstatus(__('Thanks for freeing the room or equipment. Possibly somebody will be grateful', $dom));
            }
        } else {
            LogUtil::registerError(__('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
        }
        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'mensual' => $mensual, 'd' => $cdate)));
        return true;
    }
}

// END Anulla

/**
 * Show bookings monthly view 
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	The renderized information
 */
function iw_bookings_user_monthlyview($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom), 403);
    }

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $year = FormUtil::getPassedValue('year', isset($args['year']) ? $args['year'] : null, 'GET');
    $month = FormUtil::getPassedValue('month', isset($args['month']) ? $args['month'] : null, 'GET');
    $inc = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : 0, 'GET');

    $aux_month = (int) DateUtil::getDatetime('', '%m');
    $aux_year = (int) DateUtil::getDatetime('', '%Y');

    if (empty($year) or empty($month)) {
        $year = DateUtil::getDatetime('', '%Y');
        $month = $aux_month;
    } else {
        $month = $month + $inc;
    }

    if ($month == 0) {
        $month = 12;
        $year = $year - 1;
    }
    if ($month == 13) {
        $month = 1;
        $year = $year + 1;
    }

    if (($month < $aux_month) && ($year == $aux_year)) {
        $month = $aux_month;
    } //Minim month is current month
    //Memoritzem un array amb els dies de la setmana
    // Create an array with the days of the week
    $showWeekends = pnModGetVar('iw_bookings', 'weekends');
    if ($showWeekends) {
        $days = array(__('Monday', $dom), __('Tuesday', $dom), __('Wednesday', $dom), __('Thursday', $dom), __('Friday', $dom), __('Saturday', $dom), __('Sunday', $dom));
    } else {
        $days = array(__('Monday', $dom), __('Tuesday', $dom), __('Wednesday', $dom), __('Thursday', $dom), __('Friday', $dom));
    }
    //Array with the name of the months
    $monthNames = array('', __('January', $dom), __('February', $dom), __('March', $dom), __('April', $dom), __('May', $dom), __('June', $dom), __('July', $dom), __('August', $dom), __('September', $dom), __('October', $dom), __('November', $dom), __('December', $dom));

    // Get month days number
    $numDays = count(DateUtil::getMonthDates($month, $year));
    // First day of month
    $startDate = DateUtil::buildDatetime($year, $month, 1, 0, 0, 0);
    // last day of month
    $endDate = DateUtil::buildDatetime($year, $month, $numDays, 23, 59, 59);

    //determinem quin dia de la setmana �s el primer dia del mes
    // Get the fisrt day of week of the month
    $firstDay = date("w", DateUtil::makeTimestamp($startDate));

    //per si el primer dia del mes �s diumenge el posem a 7, ja que en aquest cas PHP retorna el valor 0
    ($firstDay == 0) ? $firstDay = 7 : "";

    //Situem els espais de reserva en un camp multiselect des d'on es podran filtra les dades dels espais
    //Cridem la funci� API que retornar� la informaci� de tots els espais de reserva definits
    $espais[] = array('id' => -1, 'name' => __('All rooms and equipments', $dom));
    $registres = pnModAPIFunc('iw_bookings', 'user', 'getall');

    foreach ($registres as $registre) {
        if ($registre['active'] == 1) {
            $espais[] = array('id' => $registre['sid'], 'name' => $registre['space_name']);
            $space_info[$registre['sid']]['name'] = $registre['space_name'];
            $space_info[$registre['sid']]['color'] = $registre['color'];
        }
    }

    $taula = array();
    //Blanc spaces in calendar
    for ($j = 1; $j < $firstDay; $j++) {
        if ($showWeekends || ($firstDay != 7 && $firstDay != 6)) {
            $table[] = '';
        }
    }

    for ($i = 1; $i <= $numDays; $i++) {
        ($n_col % 7 == 1) ? $table[] = array('space_name' => '') : "";
        $dia = (date("w", mktime(0, 0, 0, $month, $i, $year)) + 7) % 7;
        if ($i <= $numDays && (($dia != 6 && $dia != 0) || pnModGetVar('iw_bookings', 'weekends'))) {
            //Determinem el per�ode de les dades de les reserves
            $start = DateUtil::buildDatetime($year, $month, $i, 0, 0, 0);
            $end = DateUtil::buildDatetime($year, $month, $i, 23, 59, 59);
            $dow = date("w", DateUtil::makeTimestamp($start));
            ($dow == 0) ? $dow = 7 : "";
            //Agafem les reserves puntuals
            //Obtenim les reserves d'un dia per a un determinat espai o tots (sid = -1)
            // Take the non permanent books
            $bookings = pnModAPIFunc('iw_bookings', 'user', 'getall_reserves', array('sid' => $sid, 'from' => $start, 'to' => $end, 'dw' => $dow));
            //Afegim a la matriu reserves les dades de les reserves temporals amb hores d'inici i final coincidents
            // Add to bookings array the permenent books which has the same start and end period hours
            $reserva = array();
            if (empty($bookings)) {
                $reserva['day'] = $i;
                $table[$i + $firstDay][][] = $reserva;
            } else {
                foreach ($bookings as $booking) {
                    // $i �s el dia del mes.
                    // $i is the current day of the month
                    $reserva['date'] = date('d-m-y', strtotime($start));
                    $reserva['day'] = $i;
                    $reserva['sid'] = $booking['sid'];
                    $reserva['bid'] = $booking['bid'];
                    $reserva['grup'] = $booking['grup'];
                    $reserva['space'] = $space_info[$booking['sid']]['name'];
                    $reserva['color'] = $space_info[$booking['sid']]['color'];
                    $reserva['temp'] = $booking['temp'];
                    if ((($booking['usuari'] == pnUserGetVar('uid')))
                            or (SecurityUtil::checkPermission('iw_bookings::', "::", ACCESS_ADMIN))) {

                        $reserva['candelete'] = true;
                    } else {
                        $reserva['candelete'] = false;
                    }

                    $reserva['hour'] = date('H:i', strtotime($booking['inici'])) . "-" . date('H:i', strtotime($booking['final']));
                    $reserva['uname'] = pnModFunc('iw_main', 'user', 'getUserInfo',
                                    array('uid' => $booking[usuari],
                                        'sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'),
                                        'info' => 'u'));
                    $reserva['user'] = pnModFunc('iw_main', 'user', 'getUserInfo',
                                    array('uid' => $booking[usuari],
                                        'sv' => pnModFunc('iw_main', 'user', 'genSecurityValue'),
                                        'info' => 'ncc'));
                    $reserva['shortuname'] = mb_strimwidth($reserva['user'], 0, MAXLENGTH, '');
                    // Prepare book info output
                    $contingut = '<em><b><font color=red>' . $reserva['space'] . '</font></b></em><br>';
                    ($booking['temp'] == 1) ? $contingut.='<b><font color=green>' . __('Preferential', $dom) . '</font></b><br>' : "";
                    $contingut.= __('Teacher', $dom) . $reserva['user'];
                    $contingut.='<br>' . __('Group: ', $dom) . $booking['grup'];
                    ($booking['motiu'] == "") ? $motiu = '---' : $motiu = '<br>' . $booking['motiu'];
                    $contingut.='<br>' . __('Reason for booking', $dom) . $motiu;
                    $contingut = pnModFunc('iw_bookings', 'user', 'prepara_etiqueta', array('text' => $contingut));
                    $reserva['contingut'] = $contingut;
                    //$table[$i+$firstDay][$booking['sid']][]= $reserva; //Order by space
                    $table[$i + $firstDay][$i][] = $reserva; //Order by start time
                }
            }
        }
    }

    $pnRender = pnRender::getInstance('iw_bookings', false);

    if ($showWeekends) {
        $width = round((100 / 7));
        $tablerowlength = 7;
    } else {
        $width = round((100 / 5));
        $tablerowlength = 5;
    }

    $pnRender->assign('width', 200);
    $pnRender->assign('month', $month);
    $pnRender->assign('monthNames', $monthNames);
    $pnRender->assign('year', $year);
    $pnRender->assign('space_info', $space_info); // name and color. Array index = space sid
    $pnRender->assign('days', $days);
    $pnRender->assign('sid', $sid);
    $pnRender->assign('diesdelmes', $numDays);
    $pnRender->assign('firstDay', $firstDay - 1); // 1-> monday, 2-> tuesday, ... 7-> sunday
    $pnRender->assign('spaces', $espais); // Listbox for selection purposes
    $pnRender->assign('table', $table);
    $pnRender->assign('tablerowlength', $tablerowlength);

    return $pnRender->fetch('iw_bookings_user_monthly_view.htm');
}

/**
 * Get booking info from the booking form, verify validity and call a function who records the book 
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	
 */
function iw_bookings_user_reserva($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADD)) {
        LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid)));
        return false;
    }

    // Confirmaci� del codi d'autoritzaci�.
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid)));
    }

    $bookingDate = FormUtil::getPassedValue('bookingDate', isset($args['bookingDate']) ? $args['bookingDate'] : null, 'POST');
    $date = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'POST');
    $dow = FormUtil::getPassedValue('dow', isset($args['dow']) ? $args['dow'] : 0, 'POST');
    $fh = FormUtil::getPassedValue('fh', isset($args['fh']) ? $args['fh'] : 0, 'POST');
    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
    $nsessions = FormUtil::getPassedValue('nsessions', isset($args['nsessions']) ? $args['nsessions'] : null, 'POST');
    $group = FormUtil::getPassedValue('group', isset($args['group']) ? $args['group'] : null, 'POST');
    $reason = FormUtil::getPassedValue('reason', isset($args['reason']) ? $args['reason'] : null, 'POST');
    $inici_h = FormUtil::getPassedValue('inici_h', isset($args['inici_h']) ? $args['inici_h'] : null, 'POST');
    $inici_m = FormUtil::getPassedValue('inici_m', isset($args['inici_m']) ? $args['inici_m'] : null, 'POST');
    $final_h = FormUtil::getPassedValue('final_h', isset($args['final_h']) ? $args['final_h'] : null, 'POST');
    $final_m = FormUtil::getPassedValue('final_m', isset($args['final_m']) ? $args['final_m'] : null, 'POST');
    $user = FormUtil::getPassedValue('user', isset($args['user']) ? $args['user'] : null, 'POST');
    $book_end = FormUtil::getPassedValue('book_end', isset($args['book_end']) ? $args['book_end'] : null, 'POST');
    $finish_date = FormUtil::getPassedValue('date_input', isset($args['date_input']) ? $args['date_input'] : null, 'POST');
    $hora = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
    $notPreferent = FormUtil::getPassedValue('notPreferent', isset($args['notPreferent']) ? $args['notPreferent'] : 0, 'POST');

    if (is_null($user) || $user == 0)
        $user = pnUserGetVar('uid');

    // Arrange dates and times
    $horaris = array();
    $d = explode('-', $bookingDate);
    $cdate = DateUtil::buildDatetime($d[2], $d[1], $d[0], 0, 0, 0, '%Y-%m-%d');

    if ($hora) { // Space has got timeFrame
        $mdid = pnModAPIFunc('iw_bookings', 'user', 'get', array('sid' => $sid));
        $mdid = $mdid['mdid'];
        $frames = pnModAPIFunc('iw_timeFrames', 'user', 'getall_horari', array('mdid' => $mdid));
        $t = explode(' - ', $hora);
        $t_inici = explode(':', $t[0]);
        $t_final = explode(':', $t[1]);

        foreach ($frames as $frame) {
            $f = explode(' - ', $frame['hora']);
            $f_inici = explode(':', $f[0]);
            $f_final = explode(':', $f[1]);

            if (($t_inici[0] . $t_inici[1] <= $f_inici[0] . $f_inici[1]) && ($t_final[0] . $t_final[1] >= $f_final[0] . $f_final[1])) {
                $horaris[] = array('t_inici' => $f_inici, 't_final' => $f_final);
            }
        }
        $horari = $hora;
    } else { // Space has no timeframe
        $t_inici[0] = $inici_h;
        $t_inici[1] = $inici_m;
        $t_final[0] = $final_h;
        $t_final[1] = $final_m;
        $horaris[] = array('t_inici' => $t_inici, 't_final' => $t_final);
        $horari = $t_inici[0] . ":" . $t_inici[1] . " - " . $t_final[0] . ":" . $t_final[1];
    }


    $startBooking = DateUtil::buildDatetime($d[2], $d[1], $d[0], $t_inici[0], $t_inici[1], 0, '%Y-%m-%d %H:%M:%S');
    $endBooking = DateUtil::buildDatetime($d[2], $d[1], $d[0], $t_final[0], $t_final[1], 0, '%Y-%m-%d %H:%M:%S');

    if (empty($group)) {
        LogUtil::registerError(__('You must specify a group', $dom));
        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'fh' => $fh, 'dow' => $dow, 'd' => $bookingDate)));
        return true;
    }

    if ($book_end == 'date') {
        if (empty($finish_date)) {
            LogUtil::registerError(__('You must specify a finish date', $dom));
            pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid)));
            return true;
        } else {
            $finish_date = strtotime($finish_date);
            if ($finish_date < strtotime('today')) {
                LogUtil::registerError(__('Finish date is minnor than actual date', $dom));
                pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid)));
                return true;
            }
        }
    }

    $sb = DateUtil::makeTimeStamp($startBooking);
    $eb = DateUtil::makeTimeStamp($endBooking);

    // get nsessions from finish_date
    if ($book_end == 'date') {
        $nsessions = 0;
        $tmp_date = strtotime(date('Y-m-d', $eb));
        while ($tmp_date <= $finish_date) {
            $nsessions++;
            $tmp_date = strtotime(date('Y-m-d', $tmp_date) . ' + 1 week');
        }
    }

    $admin = true;
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADMIN)) {
        $admin = false;
        // Check if num sessions exceeds num weeks limit from actual date
        $maxWeeks = pnModGetVar('iw_bookings', 'weeks');
        if ($maxWeeks != 0) {
            $factor = $nsessions - 1;
            $last = strtotime(date('Y-m-d', $eb) . ' + ' . $factor . ' weeks');
            $limit = strtotime('today + ' . $maxWeeks . ' weeks');
            $alert = false;

            while ($last > $limit) {
                $last = strtotime(date('Y-m-d', $last) . ' -1 week');
                $nsessions--;
                $alert = true;
            }
            if ($alert)
                $msg = __('Bookings can only be made for the following ', $dom) . $maxWeeks . __(' week(s). Haven\'t made all the requested bookings.', $dom);
        }
    }

    $bookingDates = array();
    // Generate all booking dates
    for ($i = 0; $i < $nsessions; ++$i) {
        foreach ($horaris as $h) {
            // Calculate next week
            $next = DateUtil::getDatetime_NextWeek($i, "%Y-%m-%d", $d[2], $d[1], $d[0], 12, 0, 0);
            // Per evitar canvis d'hora produits per l'horari d'estiu
            $bookingDates[] = array('s' => $next . " " . $h[t_inici][0] . ":" . $h[t_inici][1] . ":00", 'e' => $next . " " . $h[t_final][0] . ":" . $h[t_final][1] . ":00");
        }
    }

    // Check if the requested bookings is possible
    $reserved = array();
    foreach ($bookingDates as $bd) {
        $bookings = pnModAPIFunc('iw_bookings', 'user', 'reservat', array('sid' => $sid, 'start' => $bd[s], 'end' => $bd[e]));
        if (count($bookings) != 0)
            $reserved[] = $bookings;
    }

    if (!count($reserved)) {
        // If all bookings are possible do it
        foreach ($bookingDates as $bd) {
            $success = pnModAPIFunc('iw_bookings', 'user', 'reserva',
                            array('sid' => $sid,
                                'start' => $bd[s],
                                'end' => $bd[e],
                                'user' => $user,
                                'usrgroup' => $group,
                                'reason' => $reason,
                                'nsessions' => $nsessions,
                                'nbooking' => $success,
                                'admin' => $admin,
                                'notPreferent' => $notPreferent,
                                ));
            if (!$success) {
                LogUtil::registerError(__('An error has occurred when loading the table or the form', $dom));
                return pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'date' => $cdate)));
            }
        }
        // Book receipt
        LogUtil::registerStatus("<b>[ " . __('Booking receipt', $dom) . " ]</b><br />" . __('Booking day: ', $dom) . ": <b> " . $bookingDate . "</b><br/>" . __('Time: ', $dom) . ": <b>" . $horari
                        . "</b><br />" . __('Group: ', $dom) . ": <b>" . $group . "</b><br />" . __('Reason for booking', $dom) . ": <b>" . $reason . "</b><br />"
                        . __('Repeat next weeks', $dom) . ": <b>" . $nsessions . "<br /><br /><b>" . $msg);
    } else {
        //print_r($reserved);die();
        // Launch error message with reserved frames
        $message = __('Booking failed! The following times are reserved:', $dom) . '<ul>';
        foreach ($reserved as $r) {
            $message .= '<li><b>' . date('d-m-Y', strtotime($r['0']['start'])) . __('</b> from ', $dom) . date('H:i', strtotime($r['0']['start'])) . __(' to ', $dom) . date('H:i', strtotime($r['0']['end'])) . '</li>';
        }
        $message .= '</ul>';
        LogUtil::registerError($message);
    }

    return pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'date' => $cdate)));
}

// END reserva

/**
 * Show the set of available spaces and equipments to book
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	
 */
function iw_bookings_user_espais($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    // Security check
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_READ)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
    }

    $pnRender = pnRender::getInstance('iw_bookings', false);

    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'GET');

    //Afegim el men� de l'usuari
    $menu = pnModFunc('iw_bookings', 'user', 'menu', array('mensual' => $mensual));

    //Cridem la funci� API que retornar� la informaci� de tots els espais de reserva definits
    $registres = pnModAPIFunc('iw_bookings', 'user', 'getall');

    //Call getall i que retornar� la informaci�
    $items = pnModAPIFunc('iw_bookings', 'user', 'getall');
    //Are defined booking locations?
    (empty($items)) ? $hi_ha_espais = false : $hi_ha_espais = true;

    foreach ($items as $item) {
        if ($item['active']) {
            //Si la descripci� de l'espai arriba buida hi posem uns guions per tal que la taula no quedi lletja
            (empty($item['description'])) ? $item['description'] = '---' : "";

            //Get the time frame
            $marc = pnModAPIFunc('iw_bookings', 'user', 'nom_marc', array('mdid' => $item['mdid']));

            (!empty($marc)) ? $item['mdid'] = $marc : $item['mdid'] = "---";
            ($item['vertical'] == 1) ? $item['vertical'] = __('Column', $dom) : $item['vertical'] = __('Row', $dom);
            if (pnModGetVar('iw_bookings', 'showcolors')) {
                $color = $item['color'];
            } else {
                $color = "";
            }
            $espais[] = array('sid' => $item['sid'],
                'nom_espai' => $item['space_name'],
                'descriu' => $item['description'],
                'mdid' => $item['mdid'],
                'color' => $color);
        }
    }
    (SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADD)) ? $fes = __('Make a booking', $dom) : $fes = __('See the bookings', $dom);
    $pnRender->assign('action', $fes);
    $pnRender->assign('menu', $menu);
    $pnRender->assign('espais', $espais);
    $pnRender->assign('hi_ha_espais', $hi_ha_espais);
    $pnRender->assign('mensual', $mensual);

    return $pnRender->fetch('iw_bookings_user_main.htm');
}

/**
 * Delete bookings older than current date
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	
 */
function iw_bookings_user_esborra_antigues($args) {
    $dom = ZLanguage::getModuleDomain('iw_bookings');

    $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
    $mensual = FormUtil::getPassedValue('mensual', isset($args['mensual']) ? $args['mensual'] : null, 'GET');

    //Comprovaci� de seguretat
    if (!SecurityUtil::checkPermission('iw_bookings::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerError(__('You are not allowed to administrate the bookings', $dom));
    }

    pnModAPIFunc('iw_bookings', 'user', 'esborra_antigues', array('sid' => $sid));

    if ($sid < 0) {
        pnRedirect(pnModURL('iw_bookings', 'user', 'espais', array('sid' => $sid, 'mensual' => $mensual)));
    } else {
        ($mensual == 1) ? pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'mensual' => 1))) :
                        pnRedirect(pnModURL('iw_bookings', 'user', 'assigna', array('sid' => $sid, 'mensual' => 0)));
    }
    return true;
}

/**
 * Prepares text output for display in HTML page
 * @author	Albert P�rez Monfort (aperezm@xtec.cat)
 * @author	Josep Ferr�ndiz Farr� (jferran6@xtec.cat)
 * @return	Reformated text for output
 */
function iw_bookings_user_prepara_etiqueta($args) {
    $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : null, 'GET');

    // Substitutes quote by '
    $text = str_replace("\r", '', str_replace('\'', '&acute;', $text));
    // Substitutes quote by "
    $text = str_replace('"', '&quot;', $text);
    // Substitutes new line by <br />
    $text = preg_replace('/(?<!>)\n/', "<br />", $text);
    return $text;
}

