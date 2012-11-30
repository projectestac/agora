<?php

/**
 * Intraweb
 *
 * @copyright  (c) 2011, Intraweb Development Team
 * @link       http://code.zikula.org/intraweb/
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package    Intraweb_Modules
 * @subpackage IWAgendas
 */
class IWagendas_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Scapes special chars: ', " and \n
     *
     * @param array $args string to scape
     *
     * @return The new string scaped
     */
    public function prepara_etiqueta($args) {
        $text = FormUtil::getPassedValue('text', isset($args['text']) ? $args['text'] : date("m"), 'POST');
        // Replace apostrofe with &acute;
        $text = str_replace("\r", '', str_replace('\'', '&acute;', $text));
        // Replace double aprostrofe with &quot;
        $text = str_replace('"', '&quot;', $text);
        // Replace returns with <br />
        $text = preg_replace('/(?<!>)\n/', "<br />", $text);

        return $text;
    }

    /**
     * User main entrance
     *
     * @param array $args The main values of position in the agendas: month, year, agenda identity...
     *
     * @return Redirect to main page
     */
    public function main($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
        $llistat = FormUtil::getPassedValue('llistat', isset($args['llistat']) ? $args['llistat'] : null, 'REQUEST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
        $agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');

        $eventsArray = array();
        $odaid = $daid;
        $gdaid = 0;
        if ($daid == 0) {
            $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
            if ($usability === true) {
                //if user use gCalendar integration and daid is zero get the gCalendar default
                $defaultCalendar = ModUtil::apiFunc('IWagendas', 'user', 'getGCalendarUserDefault');
                $gdaid = $defaultCalendar['daid'];
            }
        }
        if ($gdaid == 0)
            $gdaid = $daid;
        // get user uid
        $user = (UserUtil::getVar('uid') == '') ? '-1' : UserUtil::getVar('uid');
        if ($user == '-1') {
            $daid = 0;
            $llistat = 0;
        }
        if ($user > 0) {
            //get if the sincronization has been made recently
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'sincroGCalendar',
                        'module' => 'IWagendas',
                        'uid' => $user,
                        'sv' => $sv));
            $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
            //check if user wants gCalendar
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $gCalendarUse = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'gCalendarUse',
                        'module' => 'IWagendas',
                        'uid' => UserUtil::getVar('uid'),
                        'sv' => $sv));
            if (!$exists && $gCalendarUse) {
                if ($usability === true) {
                    ModUtil::func('IWagendas', 'user', 'gCalendar');
                } else {
                    LogUtil::registerError($usability);
                }
            }
        }

        // If there is a selected agenda, use it
        if (isset($agenda))
            $daid = $agenda;
        // Array with the names of the months
        $nom_mes = array($this->__('January'),
            $this->__('February'),
            $this->__('March'),
            $this->__('April'),
            $this->__('May'),
            $this->__('June'),
            $this->__('July'),
            $this->__('August'),
            $this->__('September'),
            $this->__('October'),
            $this->__('November'),
            $this->__('December'));
        // Array with the names of the months plus the corresponding article
        $nom_mes_article = array($this->__('January of'),
            $this->__('February of'),
            $this->__('March of'),
            $this->__('April of'),
            $this->__('May of'),
            $this->__('June of'),
            $this->__('July of'),
            $this->__('August of'),
            $this->__('September of'),
            $this->__('October of'),
            $this->__('November of'),
            $this->__('December of'));
        // Array with the days of the week
        $nom_dia = array($this->__('Sunday'),
            $this->__('Monday'),
            $this->__('Tuesday'),
            $this->__('Wednesday'),
            $this->__('Thursday'),
            $this->__('Friday'),
            $this->__('Saturday'),
            $this->__('Sunday'));
        // Get the color configuration and assign them to the view object
        $colors = explode('|', ModUtil::getVar('IWagendas', 'colors'));
        //Passem a format timestamp la data seleccionada i calculem els nombre de dies que té el mes en la data seleccionada
        $primerdiames = mktime(0, 0, 0, $mes, 1, $any);
        $diesmes = date("t", $primerdiames);
        if ($dia != '') { //Actualitzem els canvis de mes i d'any
            if ($dia == 0) {
                $mes--;
                $dia = 31;
            }
            if ($dia > $diesmes) {
                $mes++;
                $dia = 1;
            }
        }
        if ($mes == 0) {
            $mes = 12;
            $any = $any - 1;
        }
        if ($mes == 13) {
            $mes = 1;
            $any = $any + 1;
        }
        //Recalculem el nombre de dies del mes per si s'han produï¿œt canvis en la fase anterior
        $primerdiames = mktime(0, 0, 0, $mes, 1, $any);
        $diesmes = date("t", $primerdiames);
        if (isset($dia) && $dia > $diesmes)
            $dia = $diesmes;
        // Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
        $first_day = date("w", mktime(0, 0, 0, $mes, 1, $any));
        // The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
        if ($first_day == 0)
            $first_day = 7;
        //Check the access of the user in the agenda
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid));
        if ($te_acces == 0) {
            LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ncc'));
        //Quan un usuari entra a qualsevol agenda abans de les 10 del matï¿œ s'esborren totes les anotacions caducades
        if (date('H', time()) < 10 &&
                is_numeric(ModUtil::getVar('IWagendas', 'caducadies')) &&
                $caducadies = ModUtil::getVar('IWagendas', 'caducadies') > 0) {
            ModUtil::apiFunc('IWagendas', 'user', 'esborra_caducades');
        }
        //Mirem el darrer mode de vista que ha fer servit l'usuari i ho posem a la variable llistat
        ((!isset($llistat) || $llistat == '') && UserUtil::isLoggedIn()) ? $llistat = ModUtil::apiFunc('IWagendas', 'user', 'getvista', array('daid' => $daid)) : "";
        //Si el parï¿œmetre mode no val res, agafa el mode de visualitzaciï¿œ de l'agenda escollit des de la configuraciï¿œ del mï¿œdul
        (!isset($llistat)) ? $llistat = ModUtil::getVar('IWagendas', 'vista') : "";
        // Add the options, the calendar and the agenda selector
        $menu = ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                    'any' => $any,
                    'llistat' => $llistat,
                    'dia' => $dia,
                    'daid' => $daid));

        //get all the events for the month
        if ($dia == 0) {
            //Personal agenda
            //get the content from personal agenda and shared agendas where user is subscribed
            $events = ModUtil::apiFunc('IWagendas', 'user', 'getEvents', array('month' => $mes,
                        'year' => $any,
                        'daid' => $daid));
            foreach ($events as $event) {
                $eventsArray[] = $event;
            }
        } else {
            $events = ModUtil::apiFunc('IWagendas', 'user', 'getEvents', array('month' => $mes,
                        'year' => $any,
                        'daid' => $daid,
                        'day' => $dia));
        }
        //print_r($eventsArray);
        //get all the agendas where the user can access
        $agendas = ModUtil::func('IWagendas', 'user', 'getUserAgendas');
        $pos = 1;
        $rows = array();
        $canAdd = false;
        $imatge = '';
        $marcar = '';

        // Showing the calendar in calendar format
        if (($llistat == -1 || $llistat == 0) && !$dia != 0) {
            for ($i = 1; $i < 33; $i++) {
                // Get the number of the day, from 0 (sunday) to 6 (saturday)
                $day = (date("w", mktime(0, 0, 0, $mes, $i, $any)) + 7) % 7;
                // Check if it's a working day or not
                $festiu = ModUtil::func('IWagendas', 'user', 'festiu', array('dia' => $i,
                            'mes' => $mes,
                            'any' => $any));
                // If it's Saturday, Sunday or non-working day set diferent colors
                $days[$i]['linkcolor'] = ($day == 6 || $day == 0 || $festiu['festiu']) ? $colors[6] : $colors[5];
                $days[$i]['bgcolor'] = ($day == 6 || $day == 0 || $festiu['festiu']) ? $colors[8] : $colors[9];
                // Check whether the day is today - Set a diferent background color
                if (date('d') == $i && date('m') == $mes && date('Y') == $any)
                    $days[$i]['bgcolor'] = $colors[10];
                // This loops makes always 32 iterations. This control whether is necessary to iterate or no, for months of 28, 29 and 30 days
                if ($i <= $diesmes) {
                    // If it's a non-working day
                    if ($festiu['etiqueta'] != "") {
                        $festiu['etiqueta'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $festiu['etiqueta']));
                        $days[$i]['popup'] = " onmouseout=\"nd();\" onmouseover=\"overlib(<div style=\'padding:5px;\'>'" . $festiu['etiqueta'] . "</div>',CAPTION,'<div style=\'padding:5px;\'>" . $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))] . " " . $i . "/" . $mes . "/" . $any . "</div>',BGCOLOR,'#316ac5',TIMEOUT,100000,DELAY,200,WIDTH,200)\")";
                    }else
                        $days[$i]['popup'] = "";
                    //get the notes for the current day from eventsArray
                    $anot_dia = array();
                    $final = mktime(23, 59, 59, $mes, $i, $any);
                    if (count($eventsArray) > 0 && $final && $pos) {
                        while (isset($eventsArray[$pos - 1]) && $eventsArray[$pos - 1]['data'] < $final && $pos - 1 < count($eventsArray)) {
                            array_push($anot_dia, $eventsArray[$pos - 1]);
                            $pos++;
                        }
                    }
                    // Process the events
                    $k = 0;
                    foreach ($anot_dia as $anot_dia1) {
                        if ($te_acces == 4 || ($te_acces == 3 && $anot_dia1['usuari'] == $user) || $anot_dia1['completa'] == 0) {
                            // If the event is finished/completed
                            $days[$i][$k]['bgcolortext'] = ($anot_dia1['completa'] == 1 || (strpos($anot_dia1['completedByUser'], '$' . $user . '$') !== false && $daid == 0)) ? $colors[14] : $colors[13];
                            // Get the agenda from where the note comes from
                            if ($agendas[$anot_dia1['daid']]['color'] == '') {
                                // Set a default color
                                $userColor = '#FFFFFF';
                                // Get gCalendar user color
                                $posit = strpos($agendas[$anot_dia1['daid']]['gColor'], '|' . $user . '$');
                                $userColor = ($posit > 0) ? substr($agendas[$anot_dia1['daid']]['gColor'], $posit - 7, 7) : '';
                                $agendas[$anot_dia1['daid']]['color'] = $userColor;
                            }
                            $days[$i][$k]['agenda'] = $agendas[$anot_dia1['daid']];
                            // Check whether the event has been modified (shared agendas)
                            $days[$i][$k]['modified'] = $anot_dia1['modified'];
                            if ($anot_dia1['gCalendarEventId'] != '')
                                $days[$i][$k]['gCalendar'] = true;
                            // Check whether the event has been deleted (shared agendas)
                            $days[$i][$k]['deleted'] = $anot_dia1['deleted'];
                            // get the agenda identity
                            $days[$i][$k]['aid'] = $anot_dia1['aid'];
                            // Check whether the event is new (not already seen)
                            $days[$i][$k]['hourcolor'] = (strpos($anot_dia1['nova'], '$' . $user . '$') !== false && $daid == 0) ? $colors[11] : $colors[12];
                            // If the event is not for whole day, show the hour
                            $days[$i][$k]['hour'] = (!$anot_dia1['totdia']) ? ($anot_dia1['tasca'] == 1) ? $this->__('Task') . ' - ' . $anot_dia1['nivell'] : date('H:i', $anot_dia1['data'])  : $days[$i][$k]['hour'] = (!$anot_dia1['tasca']) ? $this->__('All day') : $this->__('Task');
                            // Preparing the popup window
                            $contingut = '';
                            for ($j = 2; $j < 7; $j++) {
                                $c = 'c' . $j;
                                $tc = 'tc' . $j;
                                if (isset($days[$i][$k]['agenda'][$tc])) {
                                    if ($days[$i][$k]['agenda'][$c] != '' ||
                                            $days[$i][$k]['agenda'][$tc] == 3 ||
                                            $days[$i][$k]['agenda'][$tc] == 4) {
                                        if ($days[$i][$k]['agenda']['daid'] > 0)
                                            $contingut .= '<fieldset><legend>' . $days[$i][$k]['agenda'][$c] . '</legend>';
                                        if ($days[$i][$k]['agenda'][$tc] != 3 &&
                                                $days[$i][$k]['agenda'][$tc] != 4)
                                            $contingut .= ( $anot_dia1[$c] != "") ? $anot_dia1[$c] : "---";
                                        if ($days[$i][$k]['agenda'][$tc] == 3)
                                            $contingut .= $usersInfo[$anot_dia1['usuari']];
                                        if ($days[$i][$k]['agenda'][$tc] == 4)
                                            $contingut .= $usersInfo[$anot_dia1['usuari']] . $this->__(' on ') . date('d/m/Y', $anot_dia1['dataanota']) . $this->__(' at ') . date('H:i', $anot_dia1['dataanota']);
                                        if ($days[$i][$k]['agenda']['daid'] > 0)
                                            $contingut .= '</fieldset>';
                                    }
                                }
                            }
                            if ($days[$i][$k]['agenda']['daid'] > 0 && $user != '-1')
                                $contingut .= '<div style="text-align: right;">' . $days[$i][$k]['agenda']['nom_agenda'] . '</div>';
                            // Prepare the popup removing invalid characters
                            if (isset($anot_dia1['c1']) || isset($anot_dia1['c2']) || isset($anot_dia1['c3'])) {
                                $days[$i][$k]['popuptitle'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $anot_dia1['c1']));
                                $days[$i][$k]['popupcontent'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $contingut));

                                $days[$i][$k]['popupimage'] = "modules/" . ModUtil::getName() . "/images/mesinfo.gif";
                            }
                            // Show the file is there is anyone
                            if ($anot_dia1['fitxer'] != '') {
                                $days[$i][$k]['filename'] = $anot_dia1['fitxer'];
                                $days[$i][$k]['filetitle'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))] . " " . $i . "/" . $mes . "/" . $any;
                                $days[$i][$k]['filecontent'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))];
                                // Get file extension
                                $fileExtension = strtolower(substr(strrchr($anot_dia1['fitxer'], "."), 1));
                                // get file icon
                                $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
                                $days[$i][$k]['fileIcon'] = $ctypeArray['icon'];
                            }
                            $days[$i][$k]['images'] = ModUtil::func('IWagendas', 'user', 'icons', array('agenda' => $agendas[$anot_dia1['daid']],
                                        'accessLevel' => $te_acces,
                                        'note' => $anot_dia1,
                                        'daid' => $daid,
                                        'mes' => $mes,
                                        'any' => $any));
                            // Pass the text
                            $days[$i][$k]['text'] = nl2br($anot_dia1['c1']);
                            $k++;
                        }
                    }
                }
            }
            if ($te_acces >= 2) {
                if ($daid > 0) {
                    if ((strpos($agendas[$daid]['gAccessLevel'], '$owne|' . $user . '$') !== false) || $agendas[$daid]['gCalendarId'] == '') {
                        $canAdd = true;
                    }
                } else {
                    $canAdd = true;
                }
            }

            $this->view->assign('canAdd', $canAdd)
                    ->assign('gdaid', $gdaid)
                    ->assign('odaid', $odaid)
                    ->assign('mes', $mes)
                    ->assign('mesAnt', $mes - 1)
                    ->assign('any', $any)
                    ->assign('nom_mes', $nom_mes[$mes - 1])
                    ->assign('nom_dia', $nom_dia)
                    ->assign('month', $mes)
                    ->assign('year', $any)
                    ->assign('daysofthemonth', $diesmes)
                    ->assign('first_day', $first_day)
                    ->assign('days', $days)
                    ->assign('calendar', true); // The presence of this variable is used in the template to set the view mode
        } else {
            $nomcamp = (isset($agendas[$daid])) ? $agendas[$daid] : '';
            // Showing the calendar in a list format
            // Build the table headers
            $i = 1;
            if (empty($dia))
                $headers[] = $this->__('Date'); // Only show the day column when there's no day selected
            $headers[] = $this->__('Time'); // Hour column
            if ($nomcamp != '') {
                while ($nomcamp['c' . $i] != '') {
                    $headers[] = $nomcamp['c' . $i];
                    $i++;
                }
            }
            if ($user != '-1')
                $headers[] = $this->__('Options'); // Options column

            if (isset($dia) && $dia >= 1) {
                $this->view->assign('dia', $dia)
                        ->assign('dayName', $nom_dia[date('w', mktime(0, 0, 0, $mes, $dia, $any))])
                        ->assign('monthName', $nom_mes_article[$mes - 1]);
            }
            $registres = $events;
            $message = '';
            // No events
            if (empty($registres)) {
                $message = ($dia != 0) ? $this->view->assign('message', $this->__('There are no events on this date')) : $this->view->assign('message', $this->__('There are no events in the agenda'));
            }
            $this->view->assign('message', $message);
            // Process the events
            $i = 0;
            foreach ($registres as $registre) {
                if ($te_acces == 4 || ($te_acces == 3 && $registre['usuari'] == $user) || $registre['completa'] == 0) {
                    $rows[$i]['aid'] = $registre['aid'];
                    $rows[$i]['daid'] = $registre['daid'];
                    // Day of the week
                    $diasetmana = date('w', $registre['data']);
                    // Check whether it's non-working day
                    $festiu = ModUtil::func('IWagendas', 'user', 'festiu', array('dia' => date('d', $registre['data']),
                                'mes' => date('m', $registre['data']),
                                'any' => date('Y', $registre['data'])));
                    // Set the colors according to the type of day
                    if ($diasetmana == 6 || $diasetmana == 0 || $festiu['festiu']) {
                        $rows[$i]['linkcolor'] = $colors[6];
                        $rows[$i]['bgcolor'] = $colors[8];
                    } else {
                        $rows[$i]['linkcolor'] = $colors[5];
                        $rows[$i]['bgcolor'] = $colors[9];
                    }
                    // Special background color for the current day
                    if (date('d/m/Y') == date('d/m/Y', $registre['data'])) {
                        $rows[$i]['bgcolor'] = $colors[10];
                    }
                    if ($registre['completa'] == 0 || $te_acces == 4) {
                        // Check wether it's finished/completed
                        $rows[$i]['textbgcolor'] = ($registre['completa'] == 1 || (strpos($registre['completedByUser'], '$' . $user . '$') !== false && $daid == 0)) ? $colors[14] : $colors[13];
                        // Check whether the event is new (not already seen)
                        $rows[$i]['hourcolor'] = (strpos($registre['nova'], '$' . $user . '$') !== false && $daid == 0) ? $colors[11] : $colors[12];
                        // First column: the date (only shown when there's no day selected
                        if (empty($dia) || $dia == 0) {
                            $rows[$i]['date'] = date('d/m/Y', $registre['data']);
                            $rows[$i]['dia'] = date('d', $registre['data']);
                        }
                        // Second column: the hour or a message
                        if (!$registre['totdia']) {
                            $rows[$i]['hour'] = ($registre['tasca'] == 1) ? $this->__('Task') . ' - ' . $registre['nivell'] : date('H:i', $registre['data']);
                        } else {
                            $rows[$i]['hour'] = (!$registre['tasca']) ? $this->__('All day') : $this->__('Task expiration');
                        }
                        if ($registre['gCalendarEventId'] != '')
                            $rows[$i]['gCalendar'] = true;
                        // Get the agenda from where the note comes from
                        if ($agendas[$registre['daid']]['color'] == '') {
                            // Set a default color
                            $userColor = '#FFFFFF';
                            // Get gCalendar user color
                            $posit = strpos($agendas[$registre['daid']]['gColor'], '|' . $user . '$');
                            $userColor = ($posit > 0) ? substr($agendas[$registre['daid']]['gColor'], $posit - 7, 7) : '';
                            $agendas[$registre['daid']]['color'] = $userColor;
                        }
                        // Check whether the event has been modified (shared agendas)
                        $rows[$i]['modified'] = $registre['modified'];
                        // Check whether the event has been deleted (shared agendas)
                        $rows[$i]['deleted'] = $registre['deleted'];
                        // Get the fields
                        $j = 1;
                        while ($nomcamp['c' . $j] != '') {
                            if ($registre['c' . $j] == '' && isset($nomcamp['tc' . $j]) && $nomcamp['tc' . $j] != 3 && $nomcamp['tc' . $j] != 4)
                                $registre['c' . $j] = '---';
                            if (isset($nomcamp['tc' . $j])) {
                                switch ($nomcamp['tc' . $j]) {
                                    case 3:
                                        $registre['c' . $j] = $usersInfo[$registre['usuari']];
                                        break;
                                    case 4:
                                        $registre['c' . $j] = $usersInfo[$registre['usuari']] . '<br>' . date('d/m/y', $registre['dataanota']) . '<br>' . date('H:i', $registre['dataanota']);
                                        break;
                                }
                            }
                            $rows[$i][$j] = nl2br($registre['c' . $j]);
                            $j++;
                        }
                        if ($daid == 0) {
                            $contingut = '';
                            for ($j = 2; $j < 7; $j++) {
                                $c = 'c' . $j;
                                $tc = 'tc' . $j;
                                if ($agendas[$registre['daid']][$c] != '') {
                                    if ($agendas[$registre['daid']]['daid'] > 0)
                                        $contingut .= '<fieldset><legend> ' . $agendas[$registre['daid']][$c] . '</legend>';
                                    if (isset($agendas[$registre['daid']][$tc]) && $agendas[$registre['daid']][$tc] != 3 &&
                                            $agendas[$registre['daid']][$tc] != 4)
                                        $contingut .= ( $registre[$c] != "") ? $registre[$c] : "---";
                                    if (isset($agendas[$registre['daid']][$tc]) && $agendas[$registre['daid']][$tc] == 3)
                                        $contingut .= $usersInfo[$registre['usuari']];
                                    if (isset($agendas[$registre['daid']][$tc]) && $agendas[$registre['daid']][$tc] == 4)
                                        $contingut .= $usersInfo[$registre['usuari']] . $this->__(' on ') . date('d/m/Y', $registre['dataanota']) . $this->__(' at ') . date('H:i', $registre['dataanota']);
                                    $contingut .= '</fieldset>';
                                }
                            }
                            if ($agendas[$registre['daid']]['daid'] > 0 && $user != '-1')
                                $contingut .= '<div style="text-align: right;"><span style="border: 2px solid ' . $agendas[$registre['daid']]['color'] . '; padding: 0px 5px 0px 5px;">' . $agendas[$registre['daid']]['nom_agenda'] . '</span></div>';
                            $rows[$i][2] = nl2br($contingut);
                        }
                        if ($registre['fitxer'] != '') {
                            $rows[$i]['filename'] = $registre['fitxer'];
                            $rows[$i]['filetitle'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))] . " " . $i . "/" . $mes . "/" . $any;
                            $rows[$i]['filecontent'] = $nom_dia[date("w", mktime(0, 0, 0, $mes, $i, $any))];
                            // Get file extension
                            $fileExtension = strtolower(substr(strrchr($registre['fitxer'], "."), 1));
                            // get file icon
                            $ctypeArray = ModUtil::func('IWmain', 'user', 'getMimetype', array('extension' => $fileExtension));
                            $rows[$i]['fileIcon'] = $ctypeArray['icon'];
                        } else {
                            $rows[$i]['filename'] = "";
                        }
                        $rows[$i]['images'] = ModUtil::func('IWagendas', 'user', 'icons', array('agenda' => $agendas[$registre['daid']],
                                    'accessLevel' => $te_acces,
                                    'note' => $registre,
                                    'daid' => $daid,
                                    'mes' => $mes,
                                    'any' => $any,
                                    'imatge' => $imatge,
                                    'marcar' => $marcar));
                    }
                    $i++;
                }
            }
            $this->view->assign('headers', $headers)
                    ->assign('rows', $rows);
        }
        // Process the tasks
        if (UserUtil::isLoggedIn()) {
            $tasques = ModUtil::apiFunc('IWagendas', 'user', 'getalltasques', array('mes' => $mes,
                        'any' => $any));
        }
        //Inform that the user has seen the notes in the current period
        if ($daid == 0 && UserUtil::isLoggedIn()) {
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'novesa0', array('mes' => $mes,
                        'any' => $any));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::func('IWmain', 'user', 'userSetVar', array('module' => 'IWmain_block_news',
                'name' => 'have_news',
                'value' => 'ag',
                'sv' => $sv));
        }
        //Posa la vista de l'agenda que l'usuari hagi triat
        if (!$dia != 0 && UserUtil::isLoggedIn()) {
            ModUtil::apiFunc('IWagendas', 'user', 'vista', array('vista' => $llistat,
                'daid' => $daid));
        }
        return $this->view->assign('menu', $menu)
                ->assign('colors', $colors)
                ->fetch('IWagendas_user_main.htm');
    }

    /**
     * Get note icons for managment
     *
     * @param array $args The values that define a specific note
     *
     * @return A string with the icons images and links
     */
    public function icons($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : null, 'POST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $accessLevel = FormUtil::getPassedValue('accessLevel', isset($args['accessLevel']) ? $args['accessLevel'] : null, 'POST');
        $note = FormUtil::getPassedValue('note', isset($args['note']) ? $args['note'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');

        $user = UserUtil::getVar('uid');
        $icons = '';
        // Check wether it's protected
        $imatgeprotegida = ($note['protegida'] == 1) ? 'nocandau.gif' : 'candau.gif';
        $protegida = ($note['protegida'] == 1) ? $this->__('Delete protection against automatic deletion for this event') : $this->__('Protected? ');
        if ($note['completa'] == 1 || (strpos($note['completedByUser'], '$' . $user . '$') !== false && $daid == 0)) {
            $imatge = ($daid != 0) ? 'mostra.gif' : 'ncompleta.gif';
            $marcar = ($daid != 0) ? $this->__('Show') : $this->__('Mark as not completed');
        } else {
            $imatge = ($daid != 0) ? 'amaga.gif' : 'completa.gif';
            $marcar = ($daid != 0) ? $this->__('Hide') : $this->__('Mark as completed');
        }
        if (isset($agenda['gAccessLevel']) && strpos($agenda['gAccessLevel'], '$owne|' . $user . '$' !== false ||
                        $agenda['gAccessLevel'] == '') && ($accessLevel == 4 ||
                ($accessLevel == 3 && $note['usuari'] == $user)) && ($note['daid'] == 0 || $daid > 0)) {
            $icons = "<a href=index.php?module=IWagendas&amp;func=editar&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $note['daid'] . " title='" . $this->__('Edit') . "'><img src=\"modules/IWagendas/images/editar.gif\" alt='" . $this->__('Edit') . "'></a>";
        }
        if ((isset($agenda['gAccessLevel']) && strpos($agenda['gAccessLevel'], '$owne|' . $user . '$') !== false || isset($agenda['gAccessLevel']) && $agenda['gAccessLevel'] == '' || $daid == 0) && ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) || ($daid == 0 && $user != '-1'))) {
            $icons .= ( $note['rid'] > 0) ? "<a href=index.php?module=IWagendas&amp;func=esborra&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $daid . " title='" . $this->__('Delete') . "'><img src=\"modules/IWagendas/images/del.gif\" alt='" . $this->__('Delete') . "'></a>" : "<a href=\"javascript:deleteNote(" . $note['aid'] . "," . $daid . ")\" title='" . $this->__('Delete') . "' ><img src=\"modules/" . ModUtil::getName() . "/images/del.gif\" alt='" . $this->__('Delete') . "'></a>";
        }
        if ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) || ($daid == 0 && $user != '-1')) {
            if ($note['gCalendarEventId'] == '' || $daid == 0)
                $icons .= "<a href=\"javascript:completeNote(" . $note['aid'] . "," . $daid . ")\" title='" . $marcar . "' id=\"acompletedIcon_" . $note['aid'] . "\" ><img id=\"completedIcon_" . $note['aid'] . "\" src=\"modules/IWagendas/images/" . $imatge . "\" alt='" . $marcar . "'></a>";
        }
        if ((isset($agenda['gAccessLevel']) && strpos($agenda['gAccessLevel'], '$owne|' . $user . '$') !== false || isset($agenda['gAccessLevel']) && $agenda['gAccessLevel'] == '') && ($accessLevel == 4 || ($accessLevel == 3 && $note['usuari'] == $user) && ($note['daid'] == 0 || $daid > 0)))
            $icons .= "<a href=\"javascript:protectNote(" . $note['aid'] . "," . $daid . ")\" title=\"" . $protegida . "\" id=\"aprotectedIcon_" . $note['aid'] . "\" ><img id=\"protectedIcon_" . $note['aid'] . "\" src=\"modules/IWagendas/images/" . $imatgeprotegida . "\" alt='" . $protegida . "'></a>";
        // If it's a shared agenda, show the icon to copy to personal agenda
        if ($note['daid'] > 0 && $user != '-1')
            $icons .= "<a href=index.php?module=IWagendas&amp;func=meva&amp;mes=" . $mes . "&amp;any=" . $any . "&amp;aid=" . $note['aid'] . "&amp;daid=" . $daid . " title='" . $this->__('Send register to my personal agenda') . "'><img src=\"modules/IWagendas/images/meva.gif\" alt='" . $this->__('Send register to my personal agenda') . "'></a>";
        return $icons;
    }

    /**
     * Check the type of access of the user into the agenda
     *
     * @param array $args Array with the agenda identity, the groups string access, the managers stringf acces and the agenda state
     *
     * @return Access type  0 - No access
     *                      1 - Read only
     *                      2 - Write
     *                      3 - Manage own
     *                      4 - Manage all
     */
    public function te_acces($args) {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $resp = FormUtil::getPassedValue('resp', isset($args['resp']) ? $args['resp'] : null, 'POST');
        $activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');
        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        if ($daid != 0 && ($grup == null || $resp == null || $activa == null)) {
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            if ($agenda == false) {
                LogUtil::registerError($this->__('The agenda was not found'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
            $grup = $agenda['grup'];
            $resp = $agenda['resp'];
            $activa = $agenda['activa'];
        }
        // if agenda is not active deny access
        if ($activa == 0 && $daid != 0)
            return 0;
        //if user is an agenda manager or is a personal agenda return 4
        if (strpos($resp, '$' . UserUtil::getVar('uid') . '$') !== false || $daid == 0) {
            if (UserUtil::isLoggedIn())
                return 4;
        }
        //if user is not registered and the group 0 can access the agenda items are only readtable
        if ((!UserUtil::isLoggedIn() && strpos($grup, '$-1|') !== false) || $daid == 0)
            return 1;
        // get user groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv));
        $accessType = 0;
        if ($groups) {
            foreach ($groups as $group) {
                $pos = strpos($grup, '$' . $group['id'] . '|');
                if ($pos !== false) {
                    $access = substr($grup, $pos + 1, strlen($group['id']) + 2);
                    $accessArray = explode('|', $access);
                    if ($accessType < $accessArray[1])
                        $accessType = $accessArray[1];
                }
            }
        }
        return $accessType;
    }

    /**
     * Show the module information
     *
     * @return The module information
     */
    public function module() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $module = ModUtil::func('IWmain', 'user', 'module_info', array('module_name' => 'IWagendas',
                    'type' => 'user'));

        return $this->view->assign('module', $module)
                ->fetch('IWagendas_user_module.htm');
    }

    /**
     * Compose the user menu depending on which agendas can access
     *
     * @param array $args Agenda identity and mounht and year position
     *
     * @return The user menu
     */
    public function menu($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
        $llistat = FormUtil::getPassedValue('llistat', isset($args['llistat']) ? $args['llistat'] : null, 'REQUEST');
        $purga = FormUtil::getPassedValue('purga', isset($args['purga']) ? $args['purga'] : null, 'REQUEST');
        $reduced = FormUtil::getPassedValue('reduced', isset($args['reduced']) ? $args['reduced'] : 0, 'POST');

        $odaid = $daid;
        $gdaid = 0;
        if ($daid == 0) {
            $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
            if ($usability === true) {
                //if user use gCalendar integration and daid is zero get the gCalendar default
                $defaultCalendar = ModUtil::apiFunc('IWagendas', 'user', 'getGCalendarUserDefault');
                $gdaid = $defaultCalendar['daid'];
            }
        }
        $user = UserUtil::getVar('uid');
        if ($gdaid == 0)
            $gdaid = $daid;
        // If it's a shared agenda, get the data and check the perms
        if ($daid != 0) {
            // Get the agenda data
            $registre = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            //Comprovem que la consulta anterior ha tornat amb resultats
            if ($registre == false) {
                return SessionUtil::setVar('errormsg', $this->__('Event not found'));
            }
        } else {
            $registre['grup'] = '0';
            $registre['resp'] = '';
            $registre['activa'] = '';
        }
        // Check whether the user can access the agenda
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                    'grup' => $registre['grup'],
                    'resp' => $registre['resp'],
                    'activa' => $registre['activa']));
        // If the user has no access, show an error message and stop execution
        if ($te_acces == 0) {
            LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        // Pass the name of the agenda to the template
        if ($daid == 0) {
            $this->view->assign('agendaname', $this->__('Personal'));
        } else {
            $this->view->assign('agendaname', $registre['nom_agenda']);
        }
        $this->view->assign('daid', $daid);
        $subsArray = array();
        if (UserUtil::isLoggedIn()) {
            //get the agendas where the user is subscribed
            $subs = ModUtil::apiFunc('IWagendas', 'user', 'getUserSubscriptions');
            foreach ($subs as $sub) {
                array_push($subsArray, $sub['daid']);
            }
        }
        //get all the agendas where the user can access
        $agendas = ModUtil::func('IWagendas', 'user', 'getUserAgendas');
        $color = (isset($agendas[$daid]['color'])) ? $agendas[$daid]['color'] : '';
        $this->view->assign('color', $color);
        $i = 0;
        $ipr = 3;
        $agendasArray = array();
        foreach ($agendas as $agenda) {
            if ($agenda['color'] == '') {
                // Set a default color
                $userColor = '#FFFFFF';
                // Get gCalendar user color
                $pos = strpos($agenda['gColor'], '|' . $user . '$');
                $userColor = ($pos > 0) ? substr($agenda['gColor'], $pos - 7, 7) : '';
                $agenda['color'] = $userColor;
            }
            $newdiv = ($i % $ipr == 0) ? 1 : 0;
            $enddiv = ($i % $ipr == $ipr - 1 || $i == count($agendas) - 1) ? 1 : 0;
            $i++;
            $subs = (!in_array($agenda['daid'], $subsArray)) ? 0 : 1;
            $gCalendar = (isset($agenda['gCalendarId']) && $agenda['gCalendarId'] != '') ? 1 : 0;
            $name = (strlen($agenda['nom_agenda']) > 13) ? mb_strimwidth($agenda['nom_agenda'], 0, 13, '...') : $agenda['nom_agenda'];
            $agendasArray[] = array('nom_agenda' => $name,
                'fullName' => $agenda['nom_agenda'],
                'daid' => $agenda['daid'],
                'color' => $agenda['color'],
                'subs' => $subs,
                'newdiv' => $newdiv,
                'enddiv' => $enddiv,
                'gCalendar' => $gCalendar);
        }
        // Pass the array of agendas to the template
        $this->view->assign('agendas', $agendasArray);
        // Build an array with the months and pass it to the template
        $months = array(array('id' => 1,
                'name' => $this->__('January')),
            array('id' => 2,
                'name' => $this->__('February')),
            array('id' => 3,
                'name' => $this->__('March')),
            array('id' => 4,
                'name' => $this->__('April')),
            array('id' => 5,
                'name' => $this->__('May')),
            array('id' => 6,
                'name' => $this->__('June')),
            array('id' => 7,
                'name' => $this->__('July')),
            array('id' => 8,
                'name' => $this->__('August')),
            array('id' => 9,
                'name' => $this->__('September')),
            array('id' => 10,
                'name' => $this->__('October')),
            array('id' => 11,
                'name' => $this->__('November')),
            array('id' => 12,
                'name' => $this->__('December')));
        $this->view->assign('months', $months);
        // Build an array with the years and pass it to the template
        for ($i = 2000; $i < 2040; $i++) {
            $years[] = array('id' => $i,
                'name' => $i);
        }
        $this->view->assign('years', $years);
        // Set default values: current month and year
        if (!isset($mes))
            $mes = date("m");
        if (!isset($any))
            $any = date("Y");
        $this->view->assign('mes', $mes)
                ->assign('any', $any)
                ->assign('list', $llistat); // This must be a hidden param in the form
        $nombrenotes = 0;
        // Get the info of the agenda select and the month and year selects
        if (UserUtil::isLoggedIn()) {
            // Check whether the user has been subscribed to any agendas
            $this->view->assign('subscriptions', ModUtil::apiFunc('IWagendas', 'user', 'avissubscripcio'));
            // The user has been notified. Remove the notification indicator
            ModUtil::apiFunc('IWagendas', 'user', 'treuavis');
            // The agenda admin must see usage info
            if ($te_acces == 4) {
                $nombrenotes = ModUtil::apiFunc('IWagendas', 'user', 'comptanotes', array('daid' => $daid));
                $maxnotes = ModUtil::getVar('IWagendas', 'maxnotes');
                $avislimits = ModUtil::apiFunc('IWagendas', 'user', 'avislimits', array('daid' => $daid));
                // If the user has achieved the maximum number of notes, increase the counter
                if (($nombrenotes >= $maxnotes) && ($maxnotes != 0)) {
                    ModUtil::apiFunc('IWagendas', 'user', 'pujaavis', array('daid' => $daid,
                        'value' => $avislimits + 1));
                }
                // If the user has accessed main agenda page more than 10 times, show a form inviting to delete notes and reset the variable
                if ($avislimits >= 10 || $purga == 1) {
                    $this->view->assign('dia', $dia)
                            ->assign('purga', true)
                            ->assign('delete_previous', date('d/m/Y', time() - 60 * 24 * 60 * 60), 10, 10);
                    ModUtil::apiFunc('IWagendas', 'user', 'pujaavis', array('daid' => $daid,
                        'value' => 0));
                }
            }
        }
        // Get the options (the user menu)
        if ($te_acces >= 2) {
            if ($daid == 0) {
                // User logged in and is personal agenda or is admin => New annotation
                $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'nova', array('mes' => $mes,
                                'any' => $any,
                                'dia' => $dia,
                                'tasca' => 0,
                                'daid' => $gdaid,
                                'odaid' => $odaid))),
                    'text' => $this->__('Insert a new event'));
                // Is personal agenda => Add new task link
                $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'nova', array('mes' => $mes,
                                'any' => $any,
                                'dia' => $dia,
                                'tasca' => 1,
                                'daid' => 0))),
                    'text' => $this->__('Add a new task'));
            } else {
                if ((strpos($registre['gAccessLevel'], '$owne|' . $user . '$') !== false || $registre['gCalendarId']) == '') {
                    // User logged in and is personal agenda or is admin => New annotation
                    $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'nova', array('mes' => $mes,
                                    'any' => $any,
                                    'dia' => $dia,
                                    'tasca' => 0,
                                    'daid' => $gdaid,
                                    'odaid' => $odaid))),
                        'text' => $this->__('Insert a new event'));
                }
            }
        }
        if ($llistat == '1' ||
                !isset($llistat)) { // Show calendar or list
            $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'llistat' => -1,
                            'daid' => $daid))),
                'text' => $this->__('Calendar view'));
        } else {
            $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'llistat' => 1,
                            'daid' => $daid))),
                'text' => $this->__('List view'));
        }
        if ($daid > 0) {
            // Shared agenda
            if ($te_acces == 4 && $registre['gCalendarId'] == '') {
                // User is admin => Link to subscribe everybody who can access
                $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'substots', array('mes' => $mes,
                                'any' => $any,
                                'daid' => $daid))),
                    'text' => $this->__('Subscribe automaticaly everybody with access to this agenda'));
            }
        }
        if (ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability') === true && ($daid == 0 || $registre['gCalendarId'] != '')) {
            $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'removeGCalendarUseVar', array('mes' => $mes,
                            'any' => $any,
                            'daid' => $daid))),
                'text' => $this->__('Refresh'));
        }
        if (ModUtil::getVar('IWagendas', 'calendariescolar') == 1) {
            // Schoolar calendar available => Show link
            $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'cescolar', array('mes' => $mes,
                            'any' => $any,
                            'daid' => $daid))),
                'text' => $this->__('School calendar'));
        }
        $width_usage = '';
        $percentage = '';
        if ($te_acces == 4 && ($daid == 0 || (isset($registre['gAccessLevel']) && strpos($registre['gAccessLevel'], '$owne|' . $user . '$') !== false) || (isset($registre['gCalendarId']) && $registre['gCalendarId'] == ''))) {
            // User logged in and is personal agenda or is admin
            $maxnotes = ModUtil::getVar('IWagendas', 'maxnotes');
            if ($maxnotes != 0) { // There's a limit on the amount of annotations
                $percentage = round($nombrenotes * 100 / $maxnotes);
                $width_usage = ($percentage > 100) ? 100 : $percentage;
            }
            $user_menu[] = array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'daid' => $daid,
                            'purga' => 1))),
                'text' => $this->__('Delete events previous to given date'));
        }
        $today = array('month' => date('m'),
            'year' => date('Y'));
        return $this->view->assign('number_of_notes', $nombrenotes)
                ->assign('width_usage', $width_usage)
                ->assign('percentage', $percentage)
                ->assign('user_menu', $user_menu)
                ->assign('reduced', $reduced)
                ->assign('today', $today)
                ->fetch('IWagendas_user_menu.htm');
    }

    /**
     * Get all the agendas where the user can access
     *
     * @return An array with the agendas identities and names where the user can access
     */
    public function getUserAgendas() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $agendas = array();
        // Get the data of all the agendes
        $registres = ModUtil::apiFunc('IWagendas', 'user', 'getAllAgendas');
        //return empty if user is not login or there not agendas defined
        if (empty($registres))
            return $agendas;
        // Build an array with all the agendas that the user can access
        $agendas = array(array('daid' => 0,
                'nom_agenda' => $this->__('Personal'),
                'color' => '#FFFFFF',
                'c1' => $this->__('Event'),
                'c2' => $this->__('More information'),
                'c3' => '',
                'c4' => '',
                'c5' => '',
                'c6' => ''));
        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        // get user groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv));
        foreach ($registres as $agenda) {
            if ($agenda['activa'] == 1) {
                //check if the user can access the agenda as manager
                if (strpos($agenda['resp'], '$' . $uid . '$') !== false) {
                    //can access the agenda
                    $agendas[$agenda['daid']] = $agenda;
                } else {
                    if ($uid > 0) {
                        //check if the user in the groups access
                        foreach ($groups as $group) {
                            if (strpos($agenda['grup'], '$' . $group['id'] . '|') !== false)
                                $agendas[$agenda['daid']] = $agenda;
                        }
                    } else {
                        if (strpos($agenda['grup'], '$-1|') !== false)
                            $agendas[$agenda['daid']] = $agenda;
                    }
                }
            }
        }
        if (count($agendas) <= 1)
            $agendas = array();
        return $agendas;
    }

    /**
     * return the information associated to a holiday
     *
     * @param array $args Information about the day requested
     *
     * @return An array with the holiday information
     */
    public function festiu($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'POST');

        if (strlen($dia) == 1)
            $dia = '0' . $dia;
        if (strlen($mes) == 1)
            $mes = '0' . $mes;
        $festiussempre = ModUtil::getVar('IWagendas', 'festiussempre');
        $altresfestius = ModUtil::getVar('IWagendas', 'altresfestius');
        $retorn = false;
        $etiqueta = '';
        //Mirem si el dia estï¿œ dins dels sempre festius
        $pos = strpos($festiussempre, '$' . $dia . $mes . '|');
        if ($pos != 0) {
            $retorn = true;
            $etiqueta = strstr(str_replace('\'', '&acute;', $festiussempre), '$' . $dia . $mes . '|');
            $pos1 = strpos($etiqueta, '$$');
            $etiqueta = ($pos1 != 0) ? substr($etiqueta, 6, $pos1 - 6) : substr($etiqueta, 6, -1);
        }
        //Mirem si el dia estï¿œ dins dels altres festius
        $pos1 = strpos($altresfestius, '$' . $dia . $mes . $any . '|');
        if ($pos1 != 0) {
            $retorn = true;
            $etiqueta = strstr(str_replace('\'', '&acute;', $altresfestius), '$' . $dia . $mes . $any . '|');
            $pos1 = strpos($etiqueta, '$$');
            $etiqueta = ($pos1 != 0) ? substr($etiqueta, 10, $pos1 - 10) : substr($etiqueta, 10, -1);
        }
        $valors = array('festiu' => $retorn,
            'etiqueta' => $etiqueta);
        return $valors;
    }

    /**
     * Creates the form for new annotations
     *
     * @param array $args Information about the day where to add the note and the agenda
     *
     * @return The form fields
     */
    public function nova($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ) || !UserUtil::isLoggedIn());

        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : date("d"), 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'REQUEST');
        $dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : date("d"), 'REQUEST');
        $mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : date("m"), 'REQUEST');
        $any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : date("Y"), 'REQUEST');
        $tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : 0, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');
        $odaid = FormUtil::getPassedValue('odaid', isset($args['odaid']) ? $args['odaid'] : 0, 'REQUEST');

        // Get the agenda definition only for shared agendas. This refers to table "agenda_def"
        if ($daid == 0) {
            // Personal agenda and agenda of non-registered. First 2 fields are special.
            if ($tasca == 0) {
                $fields[] = array('order' => 1,
                    'desc' => $this->__('Event'),
                    'value' => "<textarea type=\"text\" name=\"c1\" id=\"c1\" rows=\"6\" cols=\"40\" /></textarea>");
            } else {
                $fields[] = array('order' => 1,
                    'desc' => $this->__('Task'),
                    'value' => "<textarea type=\"text\" name=\"c1\" id=\"c1\" rows=\"6\" cols=\"40\" /></textarea>");
            }

            $fields[] = array('order' => 2,
                'desc' => $this->__('More information'),
                'value' => "<textarea type=\"text\" name=\"c2\" id=\"c2\" rows=\"6\" cols=\"40\" /></textarea>");

            // In case attaches ies permitted in personal agendas
            $this->view->assign('attachpermitted', ModUtil::getVar('IWagendas', 'adjuntspersonals'));
        } else {
            // Shared agenda
            // Get the shared agenda definition
            $agendadef = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));

            // Check whether the user can access to the agenda
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $agendadef['daid'],
                        'grup' => $agendadef['grup'],
                        'resp' => $agendadef['resp'],
                        'activa' => $agendadef['activa']));
            if ($te_acces < 2) {
                LogUtil::registerError($this->__('You are not allowed to do that'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }

            if ($agendadef['gCalendarId'] != '')
                $this->view->assign('gCalendar', true);
            $this->view->assign('attachpermitted', $agendadef['adjunts']);
            // Put fields c1 to c6 in an array
            for ($i = 1; $i < 7; $i++) {
                if (!empty($agendadef['c' . $i])) {
                    $c = 'c' . $i; // Field name
                    $tc = 'tc' . $i; // Field type
                    $op = 'op' . $i; // Field options
                    switch ($agendadef[$tc]) {
                        // The field type defines the input type of the form
                        case '1': // Type = text
                            $value = "<input type=\"text\" name=\"" . $c . "\" id=\"" . $c . "\" size=\"50\"/>";
                            break;
                        case '2': // Type = textarea
                            $value = "<textarea name=\"" . $c . "\" id=\"" . $c . "\" rows=\"6\" cols=\"30\" /></textarea>";
                            break;
                        case '3': // Type = not an input field
                            //get user info
                            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                            $value = "<span>" . ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                                        'uid' => UserUtil::getVar('uid'),
                                        'info' => 'nc')) . "</span>";
                            break;
                        case '4': // Type = not an input field
                            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                            $value = "<span>" . ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                                        'uid' => UserUtil::getVar('uid'),
                                        'info' => 'nc')) . $this->__('on') . date('d/m/Y') . $this->__('at') . date('H:i') . "</span>";
                            break;
                        case '5': // Type = select
                            $options = explode('-', $agendadef[$op]);
                            $value = "<select name=\"" . $c . "\" id=\"" . $c . "\">";
                            foreach ($options as $option) {
                                $value .= "<option value=\"$option\">$option</option>";
                            }
                            $value .= "</select>";
                            break;
                    }
                    $fields[] = array('order' => $i,
                        'desc' => $agendadef[$c],
                        'value' => $value);
                }
            }
        }
        $nivells_MS = array();
        $this->view->assign('fields', $fields);

        // The form is shared for annotations and tasks. This particularizes depending on the $tasca param
        if ($tasca == 0) {
            // Not a task
            $acciosubmit = $this->__('Create event');
            $msg_no_nota = $this->__("You haven't written the event");
            $title = ($daid == 0) ? $this->__('Insert a new event') . " &raquo; " . $this->__('Personal') . "</em>" : $this->__('Insert a new event') . " => <em>" . $agendadef['nom_agenda'];
            $date = $this->__('Date');
        } else {
            // It's a task
            $acciosubmit = $this->__('Create task');
            $msg_no_nota = $this->__("You haven't written the task");
            $title = $this->__('Add a new task');
            $date = $this->__('Expiry date ');
            //Creem un array preparat per un MultiSelect amb els nivells de prioritat d'una tasca
            $nivells_MS = array(array('id' => 0,
                    'name' => '0'),
                array('id' => 1,
                    'name' => '1'),
                array('id' => 2,
                    'name' => '2'),
                array('id' => 3,
                    'name' => '3'),
                array('id' => 4,
                    'name' => '4'),
                array('id' => 5,
                    'name' => '5'));
        }
        $this->view->assign('task', $tasca)
                ->assign('acciosubmit', $acciosubmit)
                ->assign('msg_no_nota', $msg_no_nota)
                ->assign('title', $title)
                ->assign('date', $date)
                ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                ->assign('maxattachsize', ModUtil::getVar('IWmain', 'maxsize'))
                ->assign('selectedday', $dia)
                ->assign('selectedmonth', $mes)
                ->assign('selectedyear', $any)
                ->assign('daid', $daid)
                ->assign('odaid', $odaid)
                ->assign('menu', ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid,
                            'reduced' => 1)));         // Build the menu and pass it to the template
        //Passem a format timestamp la data seleccionada i calculem els nombre de dies que tï¿œ el mes en la data seleccionada
        $primerdiames = mktime(0, 0, 0, $mes, 1, $any);
        $diesmes = date("t", $primerdiames);
        if ($dia > $diesmes)
            $dia = 1;
        if ($daid > 0)
            $dia = 0;
        //Omplim un multiselect amb els dies del mes
        $dies_MS[] = array('id' => 0,
            'name' => '');
        for ($i = 1; $i < 32; $i++) {
            $h = $i;
            if ($i == 0)
                $h = '00';
            if (strlen($i) == 1)
                $h = '0' . $i;
            $dies_MS[] = array('id' => $h,
                'name' => $h);
        }
        //Creem un array preparat per un MultiSelect amb els noms dels mesos
        $mesos_MS = array(array('id' => 1,
                'name' => $this->__('January')),
            array('id' => 2,
                'name' => $this->__('February')),
            array('id' => 3,
                'name' => $this->__('March')),
            array('id' => 4,
                'name' => $this->__('April')),
            array('id' => 5,
                'name' => $this->__('May')),
            array('id' => 6,
                'name' => $this->__('June')),
            array('id' => 7,
                'name' => $this->__('July')),
            array('id' => 8,
                'name' => $this->__('August')),
            array('id' => 9,
                'name' => $this->__('September')),
            array('id' => 10,
                'name' => $this->__('October')),
            array('id' => 11,
                'name' => $this->__('November')),
            array('id' => 12,
                'name' => $this->__('December')));
        //Omplim un multiselect amb els anys disponibles
        for ($i = date('Y'); $i < date('Y') + 50; $i++) {
            $anys_MS[] = array('id' => $i,
                'name' => $i);
        }
        //Omplim un multiselect amb les hores del dia
        for ($i = 0; $i < 24; $i++) {
            $h = $i;
            if ($i == 0)
                $h = '00';
            if (strlen($i) == 1)
                $h = '0' . $i;
            $hores_MS[] = array('id' => $h,
                'name' => $h);
        }
        //Omplim un multiselect amb els minuts
        for ($i = 0; $i < 12; $i++) {
            $m = $i * 5;
            if ($i == 0)
                $m = '00';
            if (strlen($m) == 1)
                $m = '0' . $m;
            $minuts_MS[] = array('id' => $m,
                'name' => $m);
        }
        //Creem un array preparat per un MultiSelect amb les possibilitats de repeticiï¿œ
        $repes_MS = array(array('id' => 0,
                'name' => ''),
            array('id' => 1,
                'name' => $this->__('Daily')),
            array('id' => 2,
                'name' => $this->__('Weekly')),
            array('id' => 3,
                'name' => $this->__('Monthly')),
            array('id' => 4,
                'name' => $this->__('Every year')),
            array('id' => 5,
                'name' => $this->__('Every (days)')));
        // Pass the values to the template
        return $this->view->assign('dies_MS', $dies_MS)
                ->assign('mesos_MS', $mesos_MS)
                ->assign('anys_MS', $anys_MS)
                ->assign('hores_MS', $hores_MS)
                ->assign('minuts_MS', $minuts_MS)
                ->assign('nivells_MS', $nivells_MS)
                ->assign('repes_MS', $repes_MS)
                ->fetch('IWagendas_user_new.htm');
    }

    /**
     * Get the values recevied from the form to create a new agenda
     *
     * @param array $args Information about the agenda
     *
     * @return True if success and false otherwise
     */
    public function crear($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $this->checkCsrfToken();

        $diatriat = FormUtil::getPassedValue('diatriat', isset($args['diatriat']) ? $args['diatriat'] : null, 'REQUEST');
        $mestriat = FormUtil::getPassedValue('mestriat', isset($args['mestriat']) ? $args['mestriat'] : null, 'REQUEST');
        $anytriat = FormUtil::getPassedValue('anytriat', isset($args['anytriat']) ? $args['anytriat'] : null, 'REQUEST');
        $horatriada = FormUtil::getPassedValue('horatriada', isset($args['horatriada']) ? $args['horatriada'] : null, 'REQUEST');
        $minuttriat = FormUtil::getPassedValue('minuttriat', isset($args['minuttriat']) ? $args['minuttriat'] : null, 'REQUEST');
        $diatriat1 = FormUtil::getPassedValue('diatriat1', isset($args['diatriat1']) ? $args['diatriat1'] : null, 'REQUEST');
        $mestriat1 = FormUtil::getPassedValue('mestriat1', isset($args['mestriat1']) ? $args['mestriat1'] : null, 'REQUEST');
        $anytriat1 = FormUtil::getPassedValue('anytriat1', isset($args['anytriat1']) ? $args['anytriat1'] : null, 'REQUEST');
        $horatriada1 = FormUtil::getPassedValue('horatriada1', isset($args['horatriada1']) ? $args['horatriada1'] : null, 'REQUEST');
        $minuttriat1 = FormUtil::getPassedValue('minuttriat1', isset($args['minuttriat1']) ? $args['minuttriat1'] : null, 'REQUEST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'REQUEST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'REQUEST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'REQUEST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'REQUEST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'REQUEST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'REQUEST');
        $totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'REQUEST');
        $repes = FormUtil::getPassedValue('repes', isset($args['repes']) ? $args['repes'] : null, 'REQUEST');
        $repesdies = FormUtil::getPassedValue('repesdies', isset($args['repesdies']) ? $args['repesdies'] : null, 'REQUEST');
        $diatriatrep = FormUtil::getPassedValue('diatriatrep', isset($args['diatriatrep']) ? $args['diatriatrep'] : null, 'REQUEST');
        $mestriatrep = FormUtil::getPassedValue('mestriatrep', isset($args['mestriatrep']) ? $args['mestriatrep'] : null, 'REQUEST');
        $anytriatrep = FormUtil::getPassedValue('anytriatrep', isset($args['anytriatrep']) ? $args['anytriatrep'] : null, 'REQUEST');
        $tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'REQUEST');
        $nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $odaid = FormUtil::getPassedValue('odaid', isset($args['odaid']) ? $args['odaid'] : 0, 'REQUEST');
        $oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'REQUEST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'REQUEST');
        $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'REQUEST');

        // Comprovem que l'usuari pugui accedir a l'agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            if ($daid == '-1')
                $agenda['daid'] = '-1';

            // Check whether the user can access the agenda
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $agenda['daid'],
                        'grup' => $agenda['grup'],
                        'resp' => $agenda['resp'],
                        'activa' => $agenda['activa']));
            if ($te_acces < 2) {
                LogUtil::registerError($this->__('You are not allowed to do that'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
        }
        // comprovem que la data sigui correcta
        if (!checkdate($mestriat, $diatriat, $anytriat))
            $dataerror = true;
        $error = false;
        if ($dataerror) {
            $this->view->assign('title', $this->__('Agenda administration'))
                    ->assign('error', $this->__('Incorrect date'));
            $error = true;
        }
        //Comprovem que s'han complimentat les dades requerides del formulari
        //En aquests cas nomï¿œs ï¿œs obligat posar l'anotaciï¿œ a l'agenda
        if (empty($c1) && !$error) {
            $errorMsg = (!isset($tasca)) ? $this->__('You haven\'t written the event') : $this->__('You haven\'t written the task');
            $this->view->assign('title', $this->__('Agenda administration'))
                    ->assign('error', $errorMsg);
            $error = true;
        }
        //Si hi ha anotacions amb repeticiï¿œ comprovem que les dades siguin correctes
        if ($repes > 0 && !$error) {
            //verifiquem que la data fins a la repeticiï¿œ sigui correcta
            if (!checkdate($mestriatrep, $diatriatrep, $anytriatrep))
                $dataerror = true;
            $data = mktime(0, 0, 0, $mestriat, $diatriat, $anytriat);
            $datarep = mktime(0, 0, 0, $mestriatrep, $diatriatrep, $anytriatrep);
            if ($datarep <= $data)
                $dataerror = true;
            if ($dataerror) {
                $this->view->assign('title', $this->__('Agenda administration'))
                        ->assign('error', $this->__('Ending date of repetitions is incorrect. Please verify it'));
                $error = true;
            }
            if ($repes == 5 && (!isset($repesdies) || !is_numeric($repesdies)) && !$error) {
                $this->view->assign('title', $this->__('Agenda administration'))
                        ->assign('error', $this->__('Number of days for repetition is incorrect'));
                $error = true;
            }
        }
        $data = mktime($horatriada, $minuttriat, 0, $mestriat, $diatriat, $anytriat);
        $data1 = mktime($horatriada1, $minuttriat1, 0, $mestriat1, $diatriat1, $anytriat1);
        $datarepe = mktime($horatriada, $minuttriat, 0, $mestriatrep, $diatriatrep, $anytriatrep);
        if ($repes == 0)
            $datarepe = $data;
        if ($_FILES['fitxer']['name'] != "" && ($agenda['adjunts'] == 1 || ($daid == 0 && ModUtil::getVar('IWagendas', 'adjuntspersonals') == 1)) && !$error) {
            $folder = ModUtil::getVar('IWagendas', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $_FILES['fitxer']));
            //the function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                $nom_fitxer = '';
                $this->view->assign('error', $update['msg']);
                $error = true;
            } else
                $nom_fitxer = $update['fileName'];
        }
        if ($error) {
            return $this->view->assign('url', array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'nova', array('horatriada' => $horatriada,
                                    'minuttriat' => $minuttriat,
                                    'mes' => $mestriat,
                                    'dia' => $diatriat,
                                    'any' => $anytriat,
                                    'horatriada1' => $horatriada1,
                                    'minuttriat1' => $minuttriat1,
                                    'mes1' => $mestriat1,
                                    'dia1' => $diatriat1,
                                    'any1' => $anytriat1,
                                    'c1' => $c1,
                                    'c2' => $c2,
                                    'c3' => $c3,
                                    'c4' => $c4,
                                    'c5' => $c5,
                                    'c6' => $c6,
                                    'totdia' => $totdia,
                                    'tasca' => $tasca,
                                    'nivell' => $nivell,
                                    'repes' => $repes,
                                    'repesdies' => $repesdies,
                                    'diarep' => $diatriatrep,
                                    'mesrep' => $mestriatrep,
                                    'anyrep' => $anytriatrep,
                                    'daid' => $daid,
                                    'odaid' => $odaid,
                                    'oculta' => $oculta,
                                    'protegida' => $protegida))),
                        'desc' => $this->__('Back to previous form')))
                    ->fetch('IWagendas_user_error.htm');
        }
        while ($data <= $datarepe) {
            switch ($repes) {
                case 0:
                    $data = $datarepe + 1;
                    break;
                case 1:
                    //repeteix a diari fins a la data seleccionada
                    $data = $data + (60 * 60 * 24) * $passat;
                    $passat = 1;
                    break;
                case 2:
                    //repeteix setmanalment fins a la data seleccionada
                    $data = $data + (60 * 60 * 24 * 7) * $passat;
                    $passat = 1;
                    break;
                case 3:
                    //repeteix el mateix dia de cada mes fins a la data seleccionada
                    if ($passat == 0) {
                        $mestriat1 = $mestriat;
                        $anytriat1 = $anytriat;
                    }
                    $diatriat1 = $diatriat;
                    $mestriat1 = $mestriat1 + $passat;
                    if ($mestriat1 == 13) {
                        $mestriat1 = 1;
                        $anytriat1 = $anytriat1 + 1;
                    }
                    //Comprovem que la data que estem a punt d'escriure realment existeix per mesos amb diferent nombre de dies
                    //De no ser aixï¿œ anem a buscar l'ï¿œltim dia del mes
                    while (!checkdate($mestriat1, $diatriat1, $anytriat1)) {
                        $diatriat1 = $diatriat1 - 1;
                    }
                    $data = mktime(1, 1, 1, $mestriat1, $diatriat1, $anytriat1);
                    $passat = 1;
                    break;
                case 4:
                    //Repeteix el mateix dia de cada any fins a la data seleccionada
                    if ($passat == 0) {
                        $anytriat1 = $mestriat;
                        $anytriat1 = $anytriat;
                    }
                    $diatriat1 = $diatriat;
                    $mestriat1 = $mestriat;
                    $anytriat1 = $anytriat1 + $passat;
                    //comprovem que la data que estem a punt d'escriure realment existeix per si estem a
                    //darrer dia de febrer en un any biciest
                    while (!checkdate($mestriat1, $diatriat1, $anytriat1)) {
                        $diatriat1 = $diatriat1 - 1;
                    }
                    $data = mktime(1, 1, 1, $mestriat1, $diatriat1, $anytriat1);
                    $passat = 1;
                    break;
                case 5:
                    //repeteix cada el nombre de dies especificat
                    $data = $data + (60 * 60 * 24 * $repesdies) * $passat;
                    $passat = 1;
                    break;
            }
            if ($daid > 0 && $agenda['gCalendarId'] == '') {
                $subscrits = ModUtil::apiFunc('IWagendas', 'user', 'getsubscrits', array('daid' => $daid));
                $subscritString = '$';
                foreach ($subscrits as $subscrit) {
                    $subscritString .= '$' . $subscrit['uid'] . '$';
                }
            }
            //If it is necessary create the nota into google
            if ($daid > 0 && $agenda['gCalendarId'] != '') {
                $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
                //check if user wants gCalendar
                $userSettings = ModUtil::func('IWagendas', 'user', 'getUserGCalendarSettings');
                if ($userSettings['gCalendarUse']) {
                    if ($usability === true) {
                        //Load required classes
                        require_once 'Zend/Loader.php';
                        Zend_Loader::loadClass('Zend_Gdata');
                        Zend_Loader::loadClass('Zend_Gdata_AuthSub');
                        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
                        Zend_Loader::loadClass('Zend_Gdata_HttpClient');
                        Zend_Loader::loadClass('Zend_Gdata_Calendar');
                        //@var string Location of AuthSub key file.  include_path is used to find this
                        $_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
                        //@var string Passphrase for AuthSub key file.
                        $_authSubKeyFilePassphrase = null;
                        $service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
                        if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
                            try {
                                $client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
                            } catch (exception $e) {
                                $authSubUrl = ModUtil::func('IWagendas', 'user', 'getAuthSubUrl');
                                return System::redirect(ModUtil::url('IWwebbox', 'user', 'main', array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
                            }
                        } else {
                            $client = ModUtil::func('IWagendas', 'user', 'getAuthSubHttpClient');
                        }
                        $service = new Zend_Gdata_Calendar($client);
                        //Protect correct format for dateStart and dataEnd
                        if ($data1 < $data)
                            $data1 = $data;
                        // Create a new entry using the calendar service's magic factory method
                        $event = $service->newEventEntry();
                        // Populate the event with the desired information
                        // Note that each attribute is crated as an instance of a matching class
                        $event->title = $service->newTitle($c1);
                        $event->where = array($service->newWhere($c3));
                        $event->content = $service->newContent($c4);
                        // Set the date using RFC 3339 format.
                        $startDate = date('Y-m-d', $data);
                        $endDate = date('Y-m-d', $data1);
                        $when = $service->newWhen();
                        if ($totdia == 0) {
                            $tzOffset = ($userSettings['tzOffset'] == '') ? '+02' : $userSettings['tzOffset'];
                            //protect correct time format
                            if ($data1 == $data) {
                                $time = mktime($horatriada, $minuttriat, 0, $mestriat, $diatriat, $anytriat);
                                $time1 = mktime($horatriada1, $minuttriat1, 0, $mestriat, $diatriat, $anytriat);
                                $startTime = $horatriada . ':' . $minuttriat;
                                $endTime = $horatriada1 . ':' . $minuttriat1;
                                if ($time > $time1 || $horatriada1 == '' || $minuttriat1 == '')
                                    $endTime = date('H:i', $time + 1.5 * 60 * 60);
                            } else {
                                $startTime = $horatriada . ':' . $minuttriat;
                                $endTime = $horatriada1 . ':' . $minuttriat1;
                            }
                            $when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
                            $when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
                        } else {
                            $when->startTime = "$startDate";
                            $when->endTime = "$endDate";
                        }
                        $event->when = array($when);
                        $calendarURL = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI . '/default/', "", $agenda['gCalendarId']);
                        $calendarURL = 'http://www.google.com/calendar/feeds/' . $calendarURL . '/private/full';
                        // Upload the event to the calendar server
                        // A copy of the event as it is recorded on the server is returned
                        try {
                            $newEvent = $service->insertEvent($event, $calendarURL);
                        } catch (Zend_Gdata_App_Exception $e) {
                            LogUtil::registerError($this->__('Error produced during gCalendar\'s event creation'));
                            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                                        'any' => $anytriat,
                                        'daid' => $odaid)));
                        }
                        $gCalendarEventId = $newEvent->id;
                    } else {
                        LogUtil::registerError($usability);
                    }
                }
                // Prepare hidden values
                $_POST['c2'] = ($totdia == 1) ? $this->__('All day') : $this->__('Foreseen time to finish') . ': ' . $horatriada1 . ':' . $minuttriat1;
                $_POST['c5'] = $userSettings['gUserName'];
            }
            //Es crida la funció API amb les dades extretes del formulari
            if ($data <= $datarepe || $repes == 0) {
                if (!isset($lid) || $lid == 0)
                    $init = true;
                $lid = ModUtil::apiFunc('IWagendas', 'user', 'crear', array('dia' => date('d', $data),
                            'mes' => date('m', $data),
                            'any' => date('Y', $data),
                            'minut' => $minuttriat,
                            'hora' => $horatriada,
                            'horatriada1' => $horatriada1,
                            'minuttriat1' => $minuttriat1,
                            'mes1' => $mestriat1,
                            'dia1' => $diatriat1,
                            'any1' => $anytriat1,
                            'c1' => $c1,
                            'c2' => $c2,
                            'c3' => $c3,
                            'c4' => $c4,
                            'c5' => $c5,
                            'c6' => $c6,
                            'totdia' => $totdia,
                            'tasca' => $tasca,
                            'nivell' => $nivell,
                            'rid' => $rid,
                            'daid' => $daid,
                            'nova' => $subscritString,
                            'oculta' => $oculta,
                            'fitxer' => $nom_fitxer,
                            'gCalendarEventId' => $gCalendarEventId,
                            'protegida' => $protegida));
                if ($init) {
                    $rid = $lid;
                    $init = false;
                }
            }
        }
        if ($lid != false) {
            if ($missatge_estat == "")
                $missatge_estat = $this->__('New event created');
            //Success
            LogUtil::registerStatus($missatge_estat);
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                    'any' => $anytriat,
                    'daid' => $odaid)));
    }

    /**
     * set a note as complete or incomplete
     *
     * @param array $args Information about the anotation
     *
     * @return True if success and false otherwise
     */
    public function completa($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');

        // Needed argument
        if (!isset($aid) || !is_numeric($aid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        //Agafem les dades de l'agenda
        //Cridem la funció de l'API de l'usuari que ens retornarÃ  la informació del registre demanat
        if ($anotacio == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Comprovem que l'usuari pugui accedir a l'agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $agenda['grup'],
                        'resp' => $agenda['resp'],
                        'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
            $oculta = $anotacio['completa'];
        } else {
            // check if the user is modifying his/her note
            if ($anotacio['usuari'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
        }
        if ($anotacio['daid'] == $daid) {
            //Es crida la funció API amb les dades extretes del formulari
            //$lid = ModUtil::apiFunc('IWagendas', 'user', 'completa', array('aid' => $aid));
            $completa = ($anotacio['completa'] == 1) ? 0 : 1;
            $items = array('completa' => $completa);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if ($lid != false) {
                //Success
                LogUtil::registerStatus($this->__('Event status (completed/not completed) updated'));
            }
        } else {
            $uid = UserUtil::getVar('uid');
            $completedByUser = ($anotacio['completedByUser'] == '') ? '$' : $anotacio['completedByUser'];

            if (strpos($completedByUser, '$' . $uid . '$') !== false) {
                $completedByUser = str_replace('$' . $uid . '$', '', $completedByUser);
            } else
                $completedByUser .= '$' . $uid . '$';
            $items = array('completedByUser' => $completedByUser);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if ($lid != false) {
                //Success
                LogUtil::registerStatus($this->__('Event status (completed/not completed) updated'));
            }
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * Delete a note
     *
     * @param array $args Information about the anotation
     *
     * @return True if success and false otherwise
     */
    public function esborra($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
        $repes = FormUtil::getPassedValue('repes', isset($args['repes']) ? $args['repes'] : null, 'POST');

        // Needed argument
        if (!isset($aid) || !is_numeric($aid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Cridem la funció de l'API de l'usuari que ens retornaró la informació del registre demanat
        $registre = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($registre == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Comprovem que l'usuari pugui accedir a l'agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $agenda['grup'],
                        'resp' => $agenda['resp'],
                        'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $registre['usuari'] != UserUtil::getVar('uid'))) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        }
        //Si ha arribat fins aquÃ­ podrÃ  esborrar el registre de l'agenda
        //Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
        if (empty($confirmation)) {
            // Check for repetitions
            $repes = ModUtil::apiFunc('IWagendas', 'user', 'comptarepes', array('aid' => $aid,
                        'rid' => $registre['rid']));
            $title = ($registre['tasca'] == 0) ? $this->__('Delete the agenda') : $this->__('Delete task');
            $notetitlec1 = ($registre['tasca'] == 0) ? $this->__('Event') : $this->__('Task');
            $datetitle = ($registre['tasca'] == 0) ? $this->__('Date') . ': ' : $this->__('Expiry date ') . ': ';

            return $this->view->assign('menu', ModUtil::func('IWagendas', 'user', 'menu', array('reduced' => 1)))
                    ->assign('title', $title)
                    ->assign('notetitlec1', $notetitlec1)
                    ->assign('notecontentc1', nl2br($registre['c1']))
                    ->assign('notecontentc2', nl2br($registre['c2']))
                    ->assign('datetitle', $datetitle)
                    ->assign('date', date('d/m/Y', $registre['data']))
                    ->assign('repes', $repes)
                    ->assign('registre', $registre)
                    ->assign('dia', $dia)
                    ->assign('mes', $mes)
                    ->assign('any', $any)
                    ->assign('daid', $daid)
                    ->fetch('IWagendas_user_delete.htm');
        }

        $this->checkCsrfToken();

        if ($registre['daid'] == $daid) {
            if ($daid == 0) {
                // check that user is really deleting his/her note
                if ($registre['usuari'] != UserUtil::getVar('uid')) {
                    LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                    return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                                'any' => $any,
                                'dia' => $dia,
                                'daid' => $daid)));
                }
                //Only in personal agendas the notes are deleted from database
                if (ModUtil::apiFunc('IWagendas', 'user', 'delete', array('aid' => $aid))) {
                    ModUtil::apiFunc('IWagendas', 'user', 'change', array('aid' => $aid,
                        'type' => 2));
                    //Success
                    LogUtil::registerStatus($this->__('The agenda has been deleted'));
                }
                if ($repes != 0) {
                    //Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits
                    if (ModUtil::apiFunc('IWagendas', 'user', 'deleterepes', array('rid' => $rid,
                                'aid' => $aid))) {
                        //Success
                        LogUtil::registerStatus($this->__('Repeated events deleted'));
                    }
                }
                //comprova si tï¿œ fitxer adjunt i si encara ï¿œs requerit per alguna anotaciï¿œ
                if ($registre['fitxer'] != '') {
                    $n_fitxers = ModUtil::apiFunc('IWagendas', 'user', 'n_fitxers', array('fitxer' => $registre['fitxer']));
                    if ($n_fitxers == 0 && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWagendas', 'urladjunts') . '/' . $registre['fitxer'])) {
                        $folder = ModUtil::getVar('IWagendas', 'urladjunts');
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $delete = ModUtil::func('IWmain', 'user', 'deleteFile', array('sv' => $sv,
                                    'folder' => $folder,
                                    'fileName' => $registre['fitxer']));
                    }
                }
            } else {
                //in this case the note is deleted wend it expires
                //with the value deleted = 1 users can see the label deleted in personal agendas but the note is not
                //visible in shared agenda
                $items = array('deleted' => 1,
                    'protegida' => 0);
                $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                            'daid' => $daid,
                            'items' => $items));
                if ($lid != false) {
                    //Success
                    LogUtil::registerStatus($this->__('The agenda has been deleted'));
                }
                if ($repes != 0) {
                    //Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits per aquest usuari
                    if (ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                                'daid' => $daid,
                                'items' => $items,
                                'rid' => $rid))) {
                        //Success
                        LogUtil::registerStatus($this->__('Repeated events deleted'));
                    }
                }
            }
        } else {
            $uid = UserUtil::getVar('uid');
            $deletedByUser = ($anotacio['deletedByUser'] == '') ? '$' : $anotacio['deletedByUser'];
            $deletedByUser .= '$' . $uid . '$';
            $items = array('deletedByUser' => $deletedByUser);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if ($lid != false) {
                //Success
                LogUtil::registerStatus($this->__('The agenda has been deleted'));
            }
            if ($repes != 0) {
                //Cridem la funciï¿œ API que farï¿œ l'esborrament dels registres repetits per aquest usuari
                if (ModUtil::apiFunc('IWagendas', 'user', 'deleteRepesInUser', array('rid' => $rid))) {
                    //Success
                    LogUtil::registerStatus($this->__('Repeated events deleted'));
                }
            }
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * Delete a note
     *
     * @param array $args Information about the anotation
     *
     * @return True if success and false otherwise
     */
    public function deleteNote($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');

        $uid = UserUtil::getVar('uid');
        // Get the note
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($note == false) {
            return $this->__('Event not found');
        }
        // Check if user can access the note
        if ($daid != 0) {
            // Shared agenda
            // Get agenda information
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));

            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $agenda['grup'],
                        'resp' => $agenda['resp'],
                        'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $note['usuari'] != $uid)) {
                return $this->__('You are not allowed to administrate the agendas');
            }
        } else {
            if ($note['daid'] > 0) {
                // Get agenda information
                $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $note['daid']));
            }
        }
        $deleted = '';
        if ($note['daid'] == $daid) {
            if ($daid == 0) {
                // Check if user is trying to delete an ouw note
                if ($note['usuari'] != UserUtil::getVar('uid')) {
                    return $this->__('You are not allowed to administrate the agendas');
                }
                // Only in personal agendas the notes are deleted from database
                if (ModUtil::apiFunc('IWagendas', 'user', 'delete', array('aid' => $aid))) {
                    // Success
                    $deleted = $aid;
                }
                // Check if it has got attached file and if it is needed in other notes
                if ($note['fitxer'] != '') {
                    $n_fitxers = ModUtil::apiFunc('IWagendas', 'user', 'n_fitxers', array('fitxer' => $note['fitxer']));
                    if ($n_fitxers == 0 && file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWagendas', 'urladjunts') . '/' . $note['fitxer'])) {
                        $folder = ModUtil::getVar('IWagendas', 'urladjunts');
                        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                        $delete = ModUtil::func('IWmain', 'user', 'deleteFile', array('sv' => $sv,
                                    'folder' => $folder,
                                    'fileName' => $note['fitxer']));
                    }
                }
            } else {
                // in this case the note is deleted wend it expires
                // with the value deleted = 1 users can see the label deleted in personal agendas but the note is not
                // visible in shared agenda
                if (strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false || $agenda['gAccessLevel'] == '') {
                    $deletedByUser = ($note['deletedByUser'] == '') ? '$' : $note['deletedByUser'];
                    $deletedByUser .= ( strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false) ? '$' . $uid . '$' : $deletedByUser;
                    $items = array('deleted' => 1,
                        'deletedByUser' => $deletedByUser,
                        'protegida' => 0);
                    $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                                'daid' => $daid,
                                'items' => $items));
                    if ($lid != false)
                        $deleted = $aid; //success
                } else {
                    return $this->__('You are not allowed to administrate the agendas');
                }
            }
        } else {
            $deletedShared = ($note['gCalendarEventId'] != '' && strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false) ? 1 : 0;
            $deletedByUser = ($note['deletedByUser'] == '') ? '$' : $note['deletedByUser'];
            $deletedByUser .= '$' . $uid . '$';
            $items = array('deletedByUser' => $deletedByUser,
                'deleted' => $deletedShared,
                'protegida' => 0);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if ($lid != false)
                $deleted = $aid; // success
        }
        //delete the gCalendar notes
        $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
        if ($usability === true && $note['gCalendarEventId'] != '' && strpos($agenda['gAccessLevel'], '$owne|' . $uid . '$') !== false) {
            $userSettings = ModUtil::func('IWagendas', 'user', 'getUserGCalendarSettings');
            // Load required classes
            require_once 'Zend/Loader.php';
            Zend_Loader::loadClass('Zend_Gdata');
            Zend_Loader::loadClass('Zend_Gdata_AuthSub');
            Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
            Zend_Loader::loadClass('Zend_Gdata_HttpClient');
            Zend_Loader::loadClass('Zend_Gdata_Calendar');
            // @var string Location of AuthSub key file.  include_path is used to find this
            $_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
            // @var string Passphrase for AuthSub key file.
            $_authSubKeyFilePassphrase = null;
            $service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
            if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
                try {
                    $client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
                } catch (exception $e) {
                    $authSubUrl = ModUtil::func('IWagendas', 'user', 'getAuthSubUrl');
                    return System::redirect(ModUtil::url('IWwebbox', 'user', 'main', array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
                }
            } else
                $client = ModUtil::func('IWagendas', 'user', 'getAuthSubHttpClient');
            $gdataCal = new Zend_Gdata_Calendar($client);
            try {
                $event = $gdataCal->getCalendarEventEntry($note['gCalendarEventId']);
            } catch (Zend_Gdata_App_Exception $e) {
                $error = true;
            }
            if (!$error) {
                try {
                    $event->delete();
                } catch (Zend_Gdata_App_Exception $e) {
                    return $this->__('You are not allowed to administrate the agendas');
                }
            } else {
                //LogUtil::registerError(_AGENDESERRORDELETINGGCALENDARNOTE);
            }
        }
        return $aid;
    }

    /**
     * Builds and shows the schoolar calendar
     *
     * @param array $args Information about the current date
     *
     * @return The schoolar calendar
     */
    public function cescolar($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');

        // Check whether the administrator has deactivated the schoolar calendar
        if (ModUtil::getVar('IWagendas', 'calendariescolar') == 0) {
            LogUtil::registerError($this->__('The scholar calendar is not actived'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        // Get an array with the names of the months
        $month_names = array($this->__('September'),
            $this->__('October'),
            $this->__('November'),
            $this->__('December'),
            $this->__('January'),
            $this->__('February'),
            $this->__('March'),
            $this->__('April'),
            $this->__('May'),
            $this->__('June'),
            $this->__('July'),
            $this->__('August'));
        // Get an array with the order of the months. If you change this, you MUST modify the previous array accordingly.
        // Anyway there futher issues to resolv.
        $month_order = array(9, 10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8);
        // Get an array with the names of the week abbreviated
        $day_names_abbr = array($this->__('Mo'),
            $this->__('Tu'),
            $this->__('We'),
            $this->__('Th'),
            $this->__('Fr'),
            $this->__('Sa'),
            $this->__('Su'));
        // Get an array with the names of the week
        $day_names = array($this->__('Monday'),
            $this->__('Tuesday'),
            $this->__('Wednesday'),
            $this->__('Thursday'),
            $this->__('Friday'),
            $this->__('Saturday'),
            $this->__('Sunday'));
        // Get the color configuration
        $colors = explode('|', ModUtil::getVar('IWagendas', 'colors'));
        // Get the menu and pass it to the template
        $this->view->assign('menu', ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
        // Get the years of the schoolar year (Example: 2008-2009)
        $year = ModUtil::getVar('IWagendas', 'inicicurs');
        if ($year == '')
            $year = (date('m') > 7) ? date('Y') : date('Y') - 1;
        $next_year = $year + 1;
        // Title for the calendar
        $this->view->assign('title', $this->__('School calendar of course ') . ' ' . $year . '-' . $next_year);
        // Build an array with the data of every day of the year, the day of the week of the first day of the month and the number of days of the week
        for ($t = 0; $t < 12; $t++) {
            // One iteration per month
            // Get the month
            $month = $month_order[$t];
            // On January (month 1), increase the year
            if ($month == 1)
                $year = $next_year;
            // Calculate the number of days of the month (28 to 31)
            $days_month = date("t", mktime(0, 0, 0, $month, 1, $year));
            // Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
            $first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
            // The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
            if ($first_day == 0)
                $first_day = 7;
            // Offset correction for smarty loop
            $first_day -= 1;
            // Get the info of the days (one iteration per day)
            for ($i = 1; $i <= $days_month; $i++) {
                // Check whether this day belongs to any defined period, so it will be shown in a predetermined color
                $periode = ModUtil::func('IWagendas', 'user', 'periode', array('dia' => $i,
                            'mes' => $month,
                            'any' => $year));
                // Include the periode color in the array (all the days look the same)
                $days[$month][$i]['bgcolor'] = ($periode['dins']) ? $periode['color'] : $colors[9];
                $days[$month][$i]['label'] = ($periode['dins']) ? $periode['etiqueta'] : '';
                // Check whether it's a non-working day
                $festiu = ModUtil::func('IWagendas', 'user', 'festiu', array('dia' => $i,
                            'mes' => $month,
                            'any' => $year));
                // Change the color and the label if necessary
                if ($festiu['festiu']) {
                    $days[$month][$i]['bgcolor'] = $colors[8];
                    $days[$month][$i]['label'] = $festiu['etiqueta'];
                }
                // Check whether it's weekend
                $day_of_the_week = date("w", mktime(0, 0, 0, $month, $i, $year));
                if ($day_of_the_week == 0)
                    $day_of_the_week = 7;
                // Change the color if necessary
                if ($day_of_the_week == 6 || $day_of_the_week == 7)
                    $days[$month][$i]['bgcolor'] = $colors[8];
                // Check whether the day is today
                if (date('d') == $i &&
                        date('m') == $month &&
                        date('Y') == $year) {
                    $days[$month][$i]['bgcolor'] = $colors[10];
                }
                // Check whether there's any info associated to this day
                $information = ModUtil::func('IWagendas', 'user', 'info', array('dia' => $i,
                            'mes' => $month,
                            'any' => $year));
                if ($information != '')
                    $days[$month][$i]['info'] = $information;
                // Build the date to be shown in the caption of the popup window
                $days[$month][$i]['caption'] = $day_names[$day_of_the_week - 1] . "&nbsp;&nbsp;&nbsp;$i/$month/$year";
            }
            // Build the data array for the template. This operation must be done here.
            $days[$month]['days_month'] = $days_month;
            $days[$month]['first_day'] = $first_day;
            $days[$month]['year'] = $year;
            $days[$month]['day_name_abbr_color'] = $colors[3];
            $days[$month]['day_name_abbr_bgcolor'] = $colors[2];
        }
        // Pass the calendar data to the template
        $this->view->assign('days', $days)
                ->assign('month_names', $month_names)
                ->assign('day_names_abbr', $day_names_abbr)
                ->assign('month_names_color', $colors[1])
                ->assign('month_names_bgcolor', $colors[0]);
        // Get the legends of the periods of the schoolar calendar
        $legends = array();
        if (ModUtil::getVar('IWagendas', 'llegenda') == 1) {
            $periodes = explode('$$', substr(ModUtil::getVar('IWagendas', 'periodes'), 0, strlen(ModUtil::getVar('IWagendas', 'periodes')) - 1));
            array_shift($periodes);
            if (count($periodes) > 0) {
                foreach ($periodes as $periode) {
                    $legends[] = array('color' => substr($periode, -7),
                        'desc' => substr($periode, 17, -7));
                }
            }
        }
        $this->view->assign('legends', $legends);
        // Show the legends of the informative icons
        $infos = array();
        if (ModUtil::getVar('IWagendas', 'infos') == 1) {
            // Check if there are any
            // Remove the trailing $ and get the data in an array
            $informations = explode('$$', substr(ModUtil::getVar('IWagendas', 'informacions'), 0, strlen(ModUtil::getVar('IWagendas', 'informacions')) - 1));
            // First element is empty
            array_shift($informations);
            // Build an array with the informations
            foreach ($informations as $information) {
                $infos[] = array('day' => substr($information, 0, 2),
                    'month' => substr($information, 2, 2),
                    'year' => substr($information, 4, 4),
                    'info' => substr($information, 9));
            }
        }
        return $this->view->assign('infos', $infos)
                ->assign('comments', nl2br(ModUtil::getVar('IWagendas', 'comentaris')))
                ->fetch('IWagendas_user_cescolar.htm');
    }

    /**
     * Edit an agenda event
     *
     * @param array $args Information about the current event
     *
     * @return Return user to the agenda
     */
    public function editar($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');

        // Default value
        if (!isset($aid) || !is_numeric($aid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        // Get the info of the annotation
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($anotacio == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Check if the user connected has made the note
        $a = ($anotacio['usuari'] == UserUtil::getVar('uid')) ? true : false;
        // Get the agenda ID
        $daid = $anotacio['daid'];
        // Get menÃº
        $menu = ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid));
        $this->view->assign('menu', $menu);
        // Personal agenda or non-registered agenda
        if ($daid == 0) {
            if ($anotacio['tasca'] == 0) {
                $nomcamp['c1'] = $this->__('Event');
                $nomcamp['tc1'] = 2;
            } else {
                $nomcamp['c1'] = $this->__('Task');
                $nomcamp['tc1'] = 2;
            }
            $nomcamp['c2'] = $this->__('More information');
            $nomcamp['tc2'] = 2;
            // Check if the user can modify the note
            if (!$a) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
            $this->view->assign('attachpermitted', ModUtil::setVar('IWagendas', 'adjuntspersonals'));
        } else { // Shared agenda
            // Get the definition of the agenda
            $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            //Check the access of the user in the agenda
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $nomcamp['grup'],
                        'resp' => $nomcamp['resp'],
                        'activa' => $nomcamp['activa']));
            if (!($te_acces == 4 || ($te_acces == 3 && $a))) {
                LogUtil::registerError($this->__('You are not allowed to do that'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
            }
            $this->view->assign('attachpermitted', $nomcamp['adjunts']);
        }
        // Create a month days array
        for ($i = 1; $i < 32; $i++) {
            $dies_MS[] = array('id' => $i,
                'name' => $i);
        }
        // Create an array with the month's names
        $mesos_MS = array(array('id' => 1,
                'name' => $this->__('January')),
            array('id' => 2,
                'name' => $this->__('February')),
            array('id' => 3,
                'name' => $this->__('March')),
            array('id' => 4,
                'name' => $this->__('April')),
            array('id' => 5,
                'name' => $this->__('May')),
            array('id' => 6,
                'name' => $this->__('June')),
            array('id' => 7,
                'name' => $this->__('July')),
            array('id' => 8,
                'name' => $this->__('August')),
            array('id' => 9,
                'name' => $this->__('September')),
            array('id' => 10,
                'name' => $this->__('October')),
            array('id' => 11,
                'name' => $this->__('November')),
            array('id' => 12,
                'name' => $this->__('December')));
        //Creem un array preparat per un MultiSelect amb els nivells de prioritat d'una tasca
        $nivells_MS = array(array('id' => 0,
                'name' => '0'),
            array('id' => 1,
                'name' => '1'),
            array('id' => 2,
                'name' => '2'),
            array('id' => 3,
                'name' => '3'),
            array('id' => 4,
                'name' => '4'),
            array('id' => 5,
                'name' => '5'));
        //Omplim un multiselect amb els anys disponibles
        for ($i = date('Y', $anotacio['data']); $i < date('Y', $anotacio['data']) + 50; $i++) {
            $anys_MS[] = array('id' => $i,
                'name' => $i);
        }
        //Omplim un multiselect amb les hores del dia
        for ($i = 0; $i < 24; $i++) {
            $h = $i;
            if ($i == 0)
                $h = '00';
            if (strlen($i) == 1)
                $h = '0' . $i;
            $hores_MS[] = array('id' => $h,
                'name' => $h);
        }
        //Omplim un multiselect amb els minuts
        for ($i = 0; $i < 12; $i++) {
            $m = $i * 5;
            if ($i == 0)
                $m = '00';
            if (strlen($m) == 1)
                $m = '0' . $m;
            $minuts_MS[] = array('id' => $m,
                'name' => $m);
        }
        // Pass the data to the template
        $this->view->assign('dies_MS', $dies_MS)
                ->assign('mesos_MS', $mesos_MS)
                ->assign('anys_MS', $anys_MS)
                ->assign('nivells_MS', $nivells_MS)
                ->assign('hores_MS', $hores_MS)
                ->assign('minuts_MS', $minuts_MS)
                ->assign('aid', $aid)
                ->assign('daid', $daid)
                ->assign('oculta', $oculta);
        // The form is shared for annotations and tasks. This particularizes depending on the $tasca param
        if ($anotacio['tasca'] == 0) { // Not a task
            $acciosubmit = $this->__('Create event');
            $msg_no_nota = $this->__("You haven't written the event");
            $title = $this->__('Edit event');
            $date = $this->__('Date');
        } else { // It's a task
            $acciosubmit = $this->__('Create task');
            $msg_no_nota = $this->__("You haven't written the task");
            $title = $this->__('Edit task');
            $date = $this->__('Expiry date ');
            // Create priority array
            $nivells_MS = array(array('id' => 0,
                    'name' => '0'),
                array('id' => 1,
                    'name' => '1'),
                array('id' => 2,
                    'name' => '2'),
                array('id' => 3,
                    'name' => '3'),
                array('id' => 4,
                    'name' => '4'),
                array('id' => 5,
                    'name' => '5'));
        }
        $this->view->assign('date', $date)
                ->assign('title', $title)
                ->assign('extensions', ModUtil::getVar('IWmain', 'extensions'))
                ->assign('maxattachsize', ModUtil::getVar('IWmain', 'maxsize'))
                ->assign('selectedday', date("d", $anotacio['data']))
                ->assign('selectedmonth', date("m", $anotacio['data']))
                ->assign('selectedyear', date("Y", $anotacio['data']))
                ->assign('selectedhour', date("H", $anotacio['data']))
                ->assign('selectedminute', date("i", $anotacio['data']))
                ->assign('file', $anotacio['fitxer'])
                ->assign('task', $anotacio['tasca'])
                ->assign('protegida', $anotacio['protegida'])
                ->assign('nivell', $anotacio['nivell'])
                ->assign('totdia', $anotacio['totdia']);
        // get user info
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userfullname = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => UserUtil::getVar('uid'),
                    'info' => 'nc'));
        for ($i = 1; $i < 6; $i++) {
            if (!empty($nomcamp['c' . $i])) {
                $opts_array = array();
                if (isset($nomcamp['op' . $i])) {
                    $opts = explode('-', $nomcamp['op' . $i]);
                    foreach ($opts as $opt)
                        $opts_array[] = array('id' => $opt,
                            'value' => $opt);
                }
                if ($nomcamp['tc' . $i] == 3) {
                    $value = $userfullname;
                } else if ($nomcamp['tc' . $i] == 4) {
                    $value = $userfullname . $this->__(' on ') . date("d/m/Y", $anotacio['dataanota']) . $this->__(' at ') . date("H:i", $anotacio['dataanota']);
                } else {
                    $value = $anotacio['c' . $i];
                }
                $fields[] = array('desc' => $nomcamp['c' . $i],
                    'value' => $value,
                    'type' => $nomcamp['tc' . $i],
                    'opts' => $opts_array);
            }
        }
        $this->view->assign('fields', $fields);
        // Check if the agenda have repeats
        $repes = ModUtil::apiFunc('IWagendas', 'user', 'comptarepes', array('aid' => $aid,
                    'rid' => $anotacio['rid']));
        if ($repes > 0) {
            $quines_MS = array(array('id' => 1,
                    'name' => $this->__('Only this event')),
                array('id' => 2,
                    'name' => $this->__('This event and its repetitions')));
            $this->view->assign('quines_MS', $quines_MS);
        }
        if ($anotacio['tasca'] == 0) {
            $this->view->assign('acciosubmit', $this->__('Modify event'));
        } else {
            $this->view->assign('acciosubmit', $this->__('Modify task'));
        }
        return $this->view->fetch('IWagendas_user_edit.htm');
    }

    /**
     * get the values of the information icon
     *
     * @param array $args Information about needed day
     *
     * @return Return the icon information values
     */
    public function info($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');

        if (strlen($dia) == 1)
            $dia = '0' . $dia;
        if (strlen($mes) == 1)
            $mes = '0' . $mes;
        $informacions = ModUtil::getVar('IWagendas', 'informacions');
        $informacio = '';
        // Check if the dia have notes
        $pos = strpos($informacions, '$' . $dia . $mes . $any . '|');
        if ($pos != 0) {
            $retorn = true;
            $informacio = strstr($informacions, '$' . $dia . $mes . $any . '|');
            $pos1 = strpos($informacio, '$$');
            $informacio = ($pos1 != 0) ? substr($informacio, 10, $pos1 - 10) : substr($informacio, 10, -1);
        }
        return $informacio;
    }

    /**
     * update values
     *
     * @param array $args Information about the note
     *
     * @return Return true if success and false otherwise
     */
    public function modifica($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $this->checkCsrfToken();

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
        $diatriat = FormUtil::getPassedValue('diatriat', isset($args['diatriat']) ? $args['diatriat'] : null, 'POST');
        $mestriat = FormUtil::getPassedValue('mestriat', isset($args['mestriat']) ? $args['mestriat'] : null, 'POST');
        $anytriat = FormUtil::getPassedValue('anytriat', isset($args['anytriat']) ? $args['anytriat'] : null, 'POST');
        $horatriada = FormUtil::getPassedValue('horatriada', isset($args['horatriada']) ? $args['horatriada'] : null, 'POST');
        $minuttriat = FormUtil::getPassedValue('minuttriat', isset($args['minuttriat']) ? $args['minuttriat'] : null, 'POST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
        $nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'POST');
        $tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'POST');
        $quines = FormUtil::getPassedValue('quines', isset($args['quines']) ? $args['quines'] : null, 'POST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
        $copia = FormUtil::getPassedValue('copia', isset($args['copia']) ? $args['copia'] : null, 'POST');
        $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
        $sure = FormUtil::getPassedValue('sure', isset($args['sure']) ? $args['sure'] : null, 'POST');
        $new_file = FormUtil::getPassedValue('new_file', isset($args['new_file']) ? $args['new_file'] : null, 'POST');

        //check the date
        if (!checkdate($mestriat, $diatriat, $anytriat)) {
            LogUtil::registerError($this->__('Incorrect date') . ': ' . $diatriat . '/' . $mestriat . '/' . $anytriat);
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                        'any' => $any,
                        'dia' => $dia,
                        'daid' => $daid)));
        }
        //Agafem les dades que ens falten de l'anotaciï¿œ
        $registre = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($registre == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Check if user can access the agenda
        if ($daid != 0) {
            // Shared agenda or gCalendar agenda
            // Get agenda information
            $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $nomcamp['grup'],
                        'resp' => $nomcamp['resp'],
                        'activa' => $nomcamp['activa']));

            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $registre['usuari'] != UserUtil::getVar('uid'))) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                            'any' => $anytriat,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        } else {
            // Check if user can delete the note
            if ($registre['usuari'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                            'any' => $anytriat,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        }
        // Verify values. Only the main information is required
        if (empty($c1)) {
            LogUtil::registerError($this->__("You haven't written the event"));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        if ($sure == 1) {
            $folder = ModUtil::getVar('IWagendas', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $delete = ModUtil::func('IWmain', 'user', 'deleteFile', array('sv' => $sv,
                        'folder' => $folder,
                        'fileName' => $registre['fitxer']));
            if ($delete) {
                $fitxer = '';
            }
        }
        if ($_FILES['fitxer']['name'] != "" && $new_file == 1) {
            $folder = ModUtil::getVar('IWagendas', 'urladjunts');
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                        'folder' => $folder,
                        'file' => $_FILES['fitxer']));
            // The function returns the error string if the update fails and and empty string if success
            if ($update['msg'] != '') {
                $fitxer = '';
                return $this->view->assign('error', $this->__('File size incorrect. Maximum size is ') . ModUtil::getVar('IWmain', 'maxsize') . ' ' . $this->__('bits.'))
                        ->assign('url', array('url' => DataUtil::formatForDisplay(ModUtil::url('IWagendas', 'user', 'editar', array('horatriada' => $horatriada,
                                        'minuttriat' => $minuttriat,
                                        'mes' => $mestriat,
                                        'dia' => $diatriat,
                                        'any' => $anytriat,
                                        'c1' => $c1,
                                        'c2' => $c2,
                                        'c3' => $c3,
                                        'c4' => $c4,
                                        'c5' => $c5,
                                        'c6' => $c6,
                                        'totdia' => $totdia,
                                        'repes' => $repes,
                                        'repesdies' => $repesdies,
                                        'diarep' => $diatriatrep,
                                        'mesrep' => $mestriatrep,
                                        'anyrep' => $anytriatrep,
                                        'daid' => $daid,
                                        'aid' => $aid,
                                        'oculta' => $oculta,
                                        'protegida' => $protegida))),
                            'desc' => $this->__('Back to previous form')))
                        ->fetch('IWagendas_user_error.htm');
            } else
                $fitxer = $update['fileName'];
        }
        if ($totdia) {
            $horatriada = 23;
            $minuttriat = 59;
        }
        $data = mktime($horatriada, $minuttriat, 0, $mestriat, $diatriat, $anytriat);
        //Comprovem si es tracta de la cï¿œpia d'una nota. En aquest cas enviem la nota a la funciï¿œ meva amb la variable adaid a l'agenda actual
        if ($copia == 1) {
            $subscrits = ModUtil::apiFunc('IWagendas', 'user', 'getsubscrits', array('daid' => $daid));
            $subscritString = '$';
            foreach ($subscrits as $subscrit) {
                $subscritString .= '$' . $subscrit['uid'] . '$';
            }
            //Es crida la funciï¿œ API amb les dades extretes del formulari
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'crear', array('dia' => date('d', $data),
                        'mes' => date('m', $data),
                        'any' => date('Y', $data),
                        'c1' => $c1,
                        'c2' => $c2,
                        'c3' => $c3,
                        'c4' => $c4,
                        'c5' => $c5,
                        'c6' => $c6,
                        'minut' => $minuttriat,
                        'hora' => $horatriada,
                        'totdia' => $totdia,
                        'tasca' => $tasca,
                        'nivell' => $nivell,
                        'rid' => $rid,
                        'daid' => $daid,
                        'nova' => $subscritString,
                        'oculta' => $oculta,
                        'fitxer' => $nom_fitxer,
                        'protegida' => $protegida));
            if ($lid != false) {
                //Success
                LogUtil::registerStatus($this->__('New event created'));
            }
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                        'any' => $anytriat,
                        'dia' => $dia,
                        'daid' => $daid)));
        }
        //A modify means to show the modify label in users personal agendas
        if (!isset($quines) || $quines <= 1) {
            $items = array('c1' => $c1,
                'c2' => $c2,
                'c3' => $c3,
                'c4' => $c4,
                'c5' => $c5,
                'c6' => $c6,
                'data' => $data,
                'nivell' => $nivell,
                'totdia' => $totdia,
                'dataanota' => time(),
                'rid' => '-1',
                'vcalendar' => 0,
                'protegida' => $protegida,
                'fitxer' => $fitxer,
                'modified' => 1);
            //modify of a simple entry
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'items' => $items,
                        'daid' => $daid));
        } else {
            //modify of a multiple entry
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'modificamulti', array('aid' => $aid,
                        'dia' => $diatriat,
                        'mes' => $mestriat,
                        'any' => $anytriat,
                        'c1' => $c1,
                        'c2' => $c2,
                        'c3' => $c3,
                        'c4' => $c4,
                        'c5' => $c5,
                        'c6' => $c6,
                        'minut' => $minuttriat,
                        'hora' => $horatriada,
                        'totdia' => $totdia,
                        'daid' => $daid,
                        'fitxer' => $fitxer,
                        'protegida' => $protegida));
        }
        if ($lid != false) {
            //Success
            LogUtil::registerStatus($this->__('Event updated'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mestriat,
                    'any' => $anytriat,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * set a note as protected by auto deletion or set off the protection
     *
     * @param array $args Information about the note to change
     *
     * @return Return true if success and false otherwise
     */
    public function protegida($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'GET');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');

        //Get note information
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($anotacio == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        //Check if user can access the agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $anotacio['daid']));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $nomcamp['daid'],
                        'grup' => $nomcamp['grup'],
                        'resp' => $nomcamp['resp'],
                        'activa' => $nomcamp['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        } else {
            //Check if it is a authorized user
            if ($anotacio['usuari'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        }
        $protegida = ($anotacio['protegida'] == 1) ? 0 : 1;
        $items = array('protegida' => $protegida);
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                    'daid' => $daid,
                    'items' => $items));
        if ($lid != false) {
            //Success
            LogUtil::registerStatus($this->__('Protection status updated'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * Send a copy to the user personal agenda
     *
     * @param array $args Information about the note to copy
     *
     * @return Return true if success and false otherwise
     */
    public function meva($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'REQUEST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'REQUEST');
        $adaid = FormUtil::getPassedValue('adaid', isset($args['adaid']) ? $args['adaid'] : null, 'REQUEST');
        $nova = FormUtil::getPassedValue('nova', isset($args['nova']) ? $args['nova'] : null, 'REQUEST');

        // Needed argument
        if (!isset($aid) || !is_numeric($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $registre = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($registre == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                        'any' => $any,
                        'dia' => $dia,
                        'daid' => $daid)));
        }
        //Estem entrant a una agenda multiusuari
        //Carreguem les dades de l'agenda
        $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $registre['daid']));
        //Check if user can access the agenda
        if ($daid != 0) {
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $nomcamp['daid'],
                        'grup' => $nomcamp['grup'],
                        'resp' => $nomcamp['resp'],
                        'activa' => $nomcamp['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces == 0) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        } else {
            if ($registre['usuari'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)));
            }
        }
        $data = $registre['data'];
        $totdia = $registre['totdia'];
        //get all the agendas where the user can acces
        $registresagendes = ModUtil::func('IWagendas', 'user', 'getUserAgendas');
        //Creem un array preparat per un MultiSelect amb les agendes a les quals tï¿œ accï¿œs l'usuari i, a mï¿œs, n'ï¿œs responsable
        $agendas = array(array('id' => 0,
                'name' => $this->__('Personal'),
                'desc' => $this->__('Personal')));
        foreach ($registresagendes as $registreagenda) {
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $registreagenda['daid'],
                        'grup' => $registreagenda['grup'],
                        'resp' => $registreagenda['resp'],
                        'activa' => $registreagenda['activa']));
            if ($te_acces > 1 && $registreagenda['daid'] != $daid && $registreagenda['daid'] != 0) {
                $agendas[] = array('id' => $registreagenda['daid'],
                    'name' => $registreagenda['nom_agenda'],
                    'desc' => $registreagenda['descriu']);
            }
            if ($adaid == $registreagenda['daid'])
                $nom_agenda = $registreagenda['nom_agenda'];
        }
        if (count($agendas) > 1 && !isset($adaid) && $nova == 0 && $daid != 0) {
            $hourvalue = ($registre['totdia']) ? $this->__('All day') : date('H:i', $registre['data']);

            // Create and pass the menu
            return $this->view->assign('menu', ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                                'any' => $any,
                                'dia' => $dia,
                                'daid' => $daid)))
                    ->assign('hourvalue', $hourvalue)
                    ->assign('aid', $aid)
                    ->assign('mes', $mes)
                    ->assign('any', $any)
                    ->assign('dia', $dia)
                    ->assign('daid', $daid)
                    ->assign('datevalue', date('d/m/Y', $registre['data']))
                    ->assign('notevaluec1', $registre['c1'])
                    ->assign('notevaluec2', $registre['c2'])
                    ->assign('selectvalues', $agendas)
                    ->fetch('IWagendas_user_selectagenda.htm');
        }
        if ($daid == 0)
            $adaid = array(0);
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'meva', array('adaid' => $adaid,
                    'aid' => $aid));
        if ($lid != false) {
            //Success
            LogUtil::registerStatus($this->__('Event moved to other agendas'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * get the period for a specific day
     *
     * @param array $args Information about the day
     *
     * @return Return the period information
     */
    public function periode($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');

        //separem els perï¿œodes
        $dins = false;
        $dataenviada = mktime(12, 12, 0, $mes, $dia, $any);
        $periode0 = ModUtil::getVar('IWagendas', 'periodes');
        $periodes = explode('$$', substr($periode0, 0, strlen($periode0) - 1));
        array_shift($periodes);
        $color = '';
        $etiqueta = '';
        foreach ($periodes as $periode1) {
            $inici = mktime(1, 1, 0, substr($periode1, 2, 2), substr($periode1, 0, 2), substr($periode1, 4, 4));
            $final = mktime(23, 50, 0, substr($periode1, 10, 2), substr($periode1, 8, 2), substr($periode1, 12, 4));
            if ($dataenviada > $inici && $dataenviada < $final) {
                $dins = true;
                $color = substr($periode1, -6);
                $etiqueta = substr($periode1, 17, -7);
            }
        }
        $period = array('dins' => $dins,
            'color' => $color,
            'etiqueta' => $etiqueta);
        return $period;
    }

    /**
     * change user subscription into a aganda
     *
     * @param array $args Information about the agenda
     *
     * @return Return true if success and false otherwise
     */
    public function subs($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $agenda = FormUtil::getPassedValue('agenda', isset($args['agenda']) ? $args['agenda'] : 0, 'POST');

        //Comprovem que l'usuari pugui accedir a l'agenda
        if ($agenda != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agendaInfo = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $agenda));
            //Check if user can really access the agenda
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $agenda,
                        'grup' => $agendaInfo['grup'],
                        'resp' => $agendaInfo['resp'],
                        'activa' => $agendaInfo['activa']));
            if ($te_acces == 0)
                return false;
        }
        //get the agendas where the user is subscribed
        $subs = ModUtil::apiFunc('IWagendas', 'user', 'getUserSubscriptions');
        $subsArray = array();
        foreach ($subs as $sub) {
            array_push($subsArray, $sub['daid']);
        }
        $lid = (!in_array($agenda, $subsArray)) ? ModUtil::apiFunc('IWagendas', 'user', 'subsalta', array('daid' => $agenda)) : ModUtil::apiFunc('IWagendas', 'user', 'subsbaixa', array('daid' => $agenda));
        if (!$lid)
            return false;
        return true;
    }

    /**
     * Download a file
     *
     * @param array $args Name of the file that have to be downloaded
     *
     * @return The file required
     */
    public function download($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        // Get the parameters
        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'GET');
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');

        // Needed argument
        if (!isset($fileName) || !isset($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //get record
        $registre = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));

        if ($registre == false) {
            LogUtil::registerError($this->__('Event not found'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main'));
        }
        if ($registre['daid'] != 0) {
            //Check if user can really access the agenda as a manager
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $registre['daid']));
            if ($te_acces < 1) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('dia' => $dia,
                            'mes' => $mes,
                            'daid' => $daid)));
            }
        } else {
            if ($registre['usuari'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('dia' => $dia,
                            'mes' => $mes,
                            'daid' => $daid)));
            }
        }
        $fileNameInServer = ModUtil::getVar('IWagendas', 'urladjunts') . '/' . $fileName;
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'downloadFile', array('fileName' => $fileName,
            'fileNameInServer' => $fileNameInServer,
            'sv' => $sv));
    }

    /**
     * Subscribe automatically to agenda to all users who can access the agenda
     *
     * @param array $args Information about the agenda
     *
     * @return Return the form needed to subscribe users
     */
    public function substots($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'REQUEST');

        //Check if user can really access the agenda as a manager
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid));
        if ($te_acces != 4) {
            LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('dia' => $dia,
                        'mes' => $mes,
                        'daid' => $daid)));
        }
        // Subscribed users
        $subscrits = ModUtil::apiFunc('IWagendas', 'user', 'getsubscrits', array('daid' => $daid,
                    'quins' => "-1"));
        // Unsubscribed users (people who has unsubscribed theirselves)
        $donatsdebaixa = ModUtil::apiFunc('IWagendas', 'user', 'getsubscrits', array('daid' => $daid,
                    'quins' => "1"));
        // Users who can acces to the shared agenda
        $tenenacces = ModUtil::apiFunc('IWagendas', 'user', 'gettenenacces', array('daid' => $daid));
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('sv' => $sv,
                    'info' => 'ccn'));
        $subscribedusersvalue = array();
        foreach ($subscrits as $subscrit) {
            $subscribedusersvalue[] = $usersInfo[$subscrit['uid']];
        }
        //Mostrem els usuaris que s'han donat de baixa expressament de l'agenda
        $force_subscription = array();
        if (count($donatsdebaixa) > 0) {
            foreach ($donatsdebaixa as $essubscrit) {
                $force_subscription[] = array('name' => $usersInfo[$essubscrit['uid']],
                    'uid' => $essubscrit['uid']);
            }
        }
        // Get the users to subscribe
        $to_subscribe = array();
        foreach ($tenenacces as $essubscrit) {
            if (!in_array(array('name' => $usersInfo[$essubscrit['uid']], 'uid' => $essubscrit['uid']), $to_subscribe) &&
                    !in_array(array('name' => $usersInfo[$essubscrit['uid']], 'uid' => $essubscrit['uid']), $force_subscription) &&
                    !in_array($usersInfo[$essubscrit['uid']], $subscribedusersvalue)) {
                $to_subscribe[] = array('name' => $usersInfo[$essubscrit['uid']],
                    'uid' => $essubscrit['uid']);
            }
        }

        // Get the menu
        return $this->view->assign('menu', ModUtil::func('IWagendas', 'user', 'menu', array('mes' => $mes,
                            'any' => $any,
                            'dia' => $dia,
                            'daid' => $daid)))
                ->assign('subscribedusersvalue', $subscribedusersvalue)
                ->assign('to_subscribe', $to_subscribe)
                ->assign('force_subscription', $force_subscription)
                ->assign('submitvalue', $this->__('Subscribe them'))
                ->assign('daid', $daid)
                ->assign('mes', $mes)
                ->assign('any', $any)
                ->assign('dia', $dia)
                ->fetch('IWagendas_user_subscribeall.htm');
    }

    /**
     * Delete the notes older than a given date
     *
     * @param array $args Date needed
     *
     * @return True if success and false otherwise
     */
    public function esborraantigues($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
        $esborraanterior = FormUtil::getPassedValue('esborraanterior', isset($args['esborraanterior']) ? $args['esborraanterior'] : null, 'POST');

        $this->checkCsrfToken();

        $dia1 = substr($esborraanterior, 0, 2);
        $mes1 = substr($esborraanterior, 3, 2);
        $any1 = substr($esborraanterior, 6, 4);
        if (!checkdate($mes1, $dia1, $any1)) {
            LogUtil::registerError($this->__('Incorrect date'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                        'any' => $any,
                        'daid' => $daid)));
        }
        if (mktime(0, 0, 0, $mes1, $dia1, $any1) > time()) {
            LogUtil::registerError($this->__('Future events cannot be deleted'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                        'any' => $any,
                        'daid' => $daid)));
        }
        //Comprovem que l'usuari pugui accedir a l'agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
            //Comprovem que l'usuari realment tingui accï¿œs a l'agenda
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                        'grup' => $nomcamp['grup'],
                        'resp' => $nomcamp['resp'],
                        'activa' => $nomcamp['activa']));
            if ($te_acces < 4) {
                LogUtil::registerError($this->__('You are not allowed to do that'));
                return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                            'any' => $any,
                            'daid' => $daid)));
            }
        }
        //esborrem les anotacions anteriors a la data enviada
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'esborraantigues', array('daid' => $daid,
                    'antigues' => $esborraanterior));
        if ($lid != false) {
            //Success
            LogUtil::registerStatus($this->__('Previous events to selected date deleted'));
        }
        //Retorna havent acabat el procï¿œs satisfactï¿œriament
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'daid' => $daid)));
    }

    /**
     * Create the subscription to a group of users into the agenda
     *
     * @param array $args Agenda identity and user to subscribe
     *
     * @return True if success and false otherwise
     */
    public function subscriuauto($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
        $tenenacces = FormUtil::getPassedValue('tenenacces', isset($args['tenenacces']) ? $args['tenenacces'] : array(), 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : array(), 'POST');

        $this->checkCsrfToken();

        // Needed argument
        if (!isset($daid) || !is_numeric($daid) || $daid == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Get agenda information
        $nomcamp = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        //Check if user can access the agenda
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid,
                    'grup' => $nomcamp['grup'],
                    'resp' => $nomcamp['resp'],
                    'activa' => $nomcamp['activa']));
        if ($te_acces < 4) {
            LogUtil::registerError($this->__('You are not allowed to do that'));
            return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                        'any' => $any,
                        'daid' => $daid)));
        }
        $users = array_merge($tenenacces, $uid);
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'subsAltaMulti', array('daid' => $daid,
                    'users' => $users));
        if ($lid != false) {
            //Success
            LogUtil::registerStatus($this->__('Automatic subscription completed succesfully'));
        }
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'dia' => $dia,
                    'daid' => $daid)));
    }

    /**
     * Get the user notes from Google calendar (Gdata Zend functions are necessary)
     */
    public function gCalendar() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        // get user uid
        $user = (UserUtil::getVar('uid') == '') ? '-1' : UserUtil::getVar('uid');
        $usability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsUsability');
        if ($usability !== true) {
            throw new Zikula_Exception_Forbidden();
        }
        //Load required classes
        require_once 'Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata');
        Zend_Loader::loadClass('Zend_Gdata_AuthSub');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
        Zend_Loader::loadClass('Zend_Gdata_HttpClient');
        Zend_Loader::loadClass('Zend_Gdata_Calendar');
        //@var string Location of AuthSub key file.  include_path is used to find this
        $_authSubKeyFile = null; // Example value for secure use: 'mykey.pem'
        //@var string Passphrase for AuthSub key file.
        $_authSubKeyFilePassphrase = null;
        $service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME;
        $userSettings = ModUtil::func('IWagendas', 'user', 'getUserGCalendarSettings');
        if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) {
            try {
                $client = Zend_Gdata_ClientLogin::getHttpClient($userSettings['gUserName'], base64_decode($userSettings['gUserPass']), $service);
            } catch (exception $e) {
                $authSubUrl = ModUtil::func('IWagendas', 'user', 'getAuthSubUrl');
                return System::redirect(ModUtil::url('IWwebbox', 'user', 'main', array('url' => str_replace('&', '*', str_replace('?', '**', $authSubUrl)))));
            }
        } else
            $client = ModUtil::func('IWagendas', 'user', 'getAuthSubHttpClient');
        try {
            $gdataCal = new Zend_Gdata_Calendar($client);
        } catch (exception $e) {
            LogUtil::registerError($this->__('Connection with Google failed. Imposible to synchronize the agenda'));
            return false;
        }
        //get user calendars
        try {
            $calFeed = $gdataCal->getCalendarListFeed();
        } catch (exception $e) {
            LogUtil::registerError($this->__('Connection with Google failed. Imposible to synchronize the agenda'));
            return false;
        }
        $gCalendarsIdsArray = array();
        foreach ($calFeed as $calendar) {
            $gCalendarsIdsArray[] = $calendar->id;
        }
        // Get all existing google calendars stored in database. We need them to know if the received google calendars exists or not
        $gAgendas = ModUtil::apiFunc('IWagendas', 'user', 'getAllAgendas', array('gAgendas' => 1,
                    'gCalendarsIdsArray' => $gCalendarsIdsArray));
        $gCalendarsIdsArray = array();
        foreach ($gAgendas as $g) {
            $gIds[$g['gCalendarId']] = $g;
        }
        $existingCalendar = array();
        // Create or edit the calendars if it were necessary
        foreach ($calFeed as $calendar) {
            //sincronize calendars
            $id = $calendar->id;
            $resp = '$' . $user . '$';
            $accessLevel = '$' . substr($calendar->accessLevel->value, 0, 4) . '|' . $user . '$';
            $color = '$' . $calendar->color->value . '|' . $user . '$';
            // Create a calendar array based on the calendar id
            $existingCalendar["$id"] = 1;
            if (!array_key_exists("$id", $gIds)) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $agenda = ModUtil::apiFunc('IWagendas', 'admin', 'create', array('nom_agenda' => $calendar->title,
                            'descriu' => $calendar->summary->text,
                            'c1' => $this->__('What'),
                            'c2' => $this->__('End'),
                            'c3' => $this->__('Where'),
                            'c4' => $this->__('Content'),
                            'c5' => $this->__('Author'),
                            'tc1' => 1,
                            'tc2' => 1,
                            'tc3' => 1,
                            'tc4' => 2,
                            'tc5' => 1,
                            'activa' => 1,
                            'adjunts' => 0,
                            'protegida' => 1,
                            'gColor' => '$' . $color,
                            'color' => '',
                            'gCalendarId' => $id,
                            'gAccessLevel' => '$' . $accessLevel,
                            'resp' => '$' . $resp,
                            'sv' => $sv));
                // add new agenda into the array in case the agenda is created recently
                $gIds["$id"] = $agenda;
            } else {
                if ($gIds["$id"]['nom_agenda'] != $calendar->title ||
                        $gIds["$id"]['descriu'] != $calendar->summary->text ||
                        strpos($gIds["$id"]['gColor'], $color) === false ||
                        strpos($gIds["$id"]['resp'], $resp) === false ||
                        strpos($gIds["$id"]['gAccessLevel'], $accessLevel) === false) {
                    if (strpos($gIds["$id"]['gAccessLeve l'], $accessLevel) === false) {
                        // Change the gCalendar access level
                        $pos = strpos($gIds["$id"]['gAccessLevel'], '|' . $user . '$');
                        $userAccessLevel = ($pos > 0) ? substr($gIds["$id"]['gAccessLevel'], $pos - 5, (int) strlen($user) + 7) : '';
                        $newAccessLevelString = ($pos > 0) ? str_replace($userAccessLevel, $accessLevel, $gIds["$id"]['gAccessLevel']) : $gIds["$id"]['gAccessLevel'] . $accessLevel;
                    }
                    if (strpos($gIds["$id"]['gColor'], $color) === false) {
                        // Change the gCalendar access level
                        $pos = strpos($gIds["$id"]['gColor'], '|' . $user . '$');
                        $userColor = ($pos > 0) ? substr($gIds["$id"]['gColor'], $pos - 8, (int) strlen($user) + 10) : '';
                        $newColorString = ($pos > 0) ? str_replace($userColor, $color, $gIds["$id"]['gColor']) : $gIds["$id"]['gColor'] . $color;
                    }
                    $resp = (strpos($gIds["$id"]['resp'], $resp) === false) ? $resp : '';
                    $items = array('nom_agenda' => $calendar->title,
                        'descriu' => $calendar->summary->text,
                        'gColor' => $newColorString,
                        'resp' => $gIds["$id"]['resp'] . $resp,
                        'gAccessLevel' => $newAccessLevelString);
                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $gIds["$id"]['daid'],
                        'items' => $items,
                        'sv' => $sv));
                }
            }
        }
        // Get data from google for 2 months ago and 4 future months more or less
        $time = time();
        $beginDate = $time - 2 * 30 * 24 * 60 * 60;
        $endDate = $time + 4 * 30 * 24 * 60 * 60;
        $beginOndate = date('Y-m-d', $beginDate);
        $endOnDate = date('Y-m-d', $endDate);
        //get all the google notes
        $gCalendarNotes = ModUtil::apiFunc('IWagendas', 'user', 'getAllGCalendarNotes', array('beginDate' => $beginDate,
                    'endDate' => $endDate,
                    'gIds' => $gIds));
        foreach ($calFeed as $calendar) {
            $id = $calendar->id;
            $query = $gdataCal->newEventQuery();
            $calFeed = $gdataCal->getCalendarListFeed();
            $gUser = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI . '/default/', "", $id); // kind of dirty way to get the info, nut it lokks working :)
            $query->setUser($gUser);
            $query->setVisibility('private');
            $query->setProjection('full');
            $query->setOrderby('starttime');
            $query->setStartMin($beginOndate);
            $query->setStartMax($endOnDate);
            $eventFeed = array();
            if ($calendar->accessLevel->value == 'owner' ||
                    $calendar->accessLevel->value == 'editor' ||
                    $calendar->accessLevel->value == 'read') {
                $eventFeed = $gdataCal->getCalendarEventFeed($query);
            }
            foreach ($eventFeed as $event) {
                foreach ($event->when as $when) {
                    $startTime = $when->startTime;
                    $day = substr($startTime, 8, 2);
                    $month = substr($startTime, 5, 2);
                    $year = substr($startTime, 0, 4);
                    $hour = substr($startTime, 11, 2);
                    $minute = substr($startTime, 14, 2);
                    $startTime = gmmktime($hour, $minute, 0, $month, $day, $year);
                    $day = date('d', $startTime);
                    $month = date('m', $startTime);
                    $year = date('Y', $startTime);
                    $hour = date('H', $startTime);
                    $minute = date('i', $startTime);
                    $endTime = $when->endTime;
                    $dayEnd = substr($endTime, 8, 2);
                    $monthEnd = substr($endTime, 5, 2);
                    $yearEnd = substr($endTime, 0, 4);
                    $hourEnd = substr($endTime, 11, 2);
                    $minuteEnd = substr($endTime, 14, 2);
                    $endTime = gmmktime($hourEnd, $minuteEnd, 0, $monthEnd, $dayEnd, $yearEnd);
                    $dayEnd = date('d', $endTime);
                    $monthEnd = date('m', $endTime);
                    $yearEnd = date('Y', $endTime);
                    $hourEnd = date('H', $endTime);
                    $minuteEnd = date('i', $endTime);
                    $allDay = (($minute == '' || $minute == '00') && ($hour == '' || $hour == '23') && ($minuteEnd == '' || $minuteEnd == '00') && ($hourEnd == '' || $hourEnd == '00')) ? 1 : 0;
                    $end = ($allDay == 0) ? $this->__('Foreseen time to finish') . ': ' . $hourEnd . ':' . $minuteEnd : $this->__('All day');
                    if (!array_key_exists("$event->id", $gCalendarNotes)) {
                        //create item
                        $lid = ModUtil::apiFunc('IWagendas', 'user', 'crear', array('dia' => $day,
                                    'mes' => $month,
                                    'any' => $year,
                                    'c1' => $event->title,
                                    'c2' => $end,
                                    'c3' => $event->where[0]->valueString,
                                    'c4' => $event->content,
                                    'c5' => $event->author[0]->email->text,
                                    'c6' => '',
                                    'minut' => $minute,
                                    'hora' => $hour,
                                    'totdia' => $allDay,
                                    'tasca' => 0,
                                    'nivell' => 0,
                                    'rid' => '-1',
                                    'daid' => $gIds["$id"]['daid'],
                                    'nova' => '$$' . $user . '$',
                                    'oculta' => 0,
                                    'fitxer' => '',
                                    'origen' => '',
                                    'gCalendarEventId' => $event->id,
                                    'protegida' => 0));
                    } else {
                        $existing["$event->id"] = 1;
                        $item = $gCalendarNotes["$event->id"];
                        if ($allDay) {
                            $hour = 23;
                            $minute = 59;
                        }
                        $data = mktime($hour, $minute, 0, $month, $day, $year);
                        //check if item has changed. If it has changed it is updated
                        if ($item['c1'] != $event->title ||
                                $item['data'] != $data ||
                                $item['c2'] != $end ||
                                $item['c3'] != $event->where[0]->valueString ||
                                $item['c4'] != $event->content) {
                            $items = array('c1' => $event->title,
                                'c2' => $end,
                                'c3' => $event->where[0]->valueString,
                                'c4' => $event->content,
                                'data' => $data,
                                'totdia' => $allDay,
                                'origen' => $calendar->title,
                                'totdia' => $allDay);
                            //modify of a simple entry
                            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $item['aid'],
                                        'items' => $items,
                                        'daid' => $item['daid']));
                        }
                        //delete event from gCalendar if it were necessary
                        if ($item['deleted'] == 1) {
                            //delete of a simple entry
                            try {
                                $event->delete();
                            } catch (Zend_Gdata_App_Exception $e) {
                                return $this->__('You are not allowed to administrate the agendas');
                            }
                        }
                    }
                }
            }
        }
        // Delete the calendars where user can't access any more
        $diff = array_diff_key($gIds, $existingCalendar);
        foreach ($diff as $d) {
            if ($resp == '$') {
                // Nobody else needs the calendar and it is deleted
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::apiFunc('IWagendas', 'admin', 'delete', array('daid' => $d['daid'],
                    'sv' => $sv));
            } else {
                // The user access to the calendar is deleted
                $items = array('gColor' => $newColorString,
                    'resp' => $resp,
                    'gAccessLevel' => $newAccessLevelString);
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $d['daid'],
                    'items' => $items,
                    'sv' => $sv));
            }
        }
        // set as deleted the not existing gCalendar notes
        $diff = array_diff_key($gCalendarNotes, $existing);
        foreach ($diff as $d) {
            if (strpos($gAgendas[$d['daid']]['gAccessLevel'], '$free|' . $user . '$') === false) {
                $items = array('deleted' => 1,
                    'protegida' => 0);
                $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $d['aid'],
                            'daid' => $d['daid'],
                            'items' => $items));
            }
        }
        //save that the sincronization has been made
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $user,
            'name' => 'sincroGCalendar',
            'module' => 'IWagendas',
            'sv' => $sv,
            'value' => '1',
            'lifetime' => $userSettings['gRefreshTime'] * 60));
        //get all notes from gCalendar that has been created without connexion and create them
        $notesNotInGCalendar = ModUtil::apiFunc('IWagendas', 'user', 'getAllGCalendarNotes', array('beginDate' => $beginDate,
                    'endDate' => $endDate,
                    'gIds' => $gIds,
                    'notInGCalendar' => 1));
        foreach ($notesNotInGCalendar as $note) {
            $data = $note['data'];
            $data1 = $note['data1'];
            //Protect correct format for dateStart and dataEnd
            if ($data1 < $data)
                $data1 = $data;
            // Create a new entry using the calendar service's magic factory method
            $event = $gdataCal->newEventEntry();
            // Populate the event with the desired information
            // Note that each attribute is crated as an instance of a matching class
            $event->title = $gdataCal->newTitle($note['c1']);
            $event->where = array($gdataCal->newWhere($note['c3']));
            $event->content = $gdataCal->newContent($note['c4']);
            // Set the date using RFC 3339 format.
            $startDate = date('Y-m-d', $data);
            $endDate = date('Y-m-d', $data1);
            $when = $gdataCal->newWhen();
            if ($note['totdia'] == 0) {
                $tzOffset = ($userSettings['tzOffset'] == '') ? '+02' : $userSettings['tzOffset'];
                //protect correct time format
                $startTime = date('H:i', $data);
                $endTime = date('H:i', $data1);
                $when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
                $when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
            } else {
                $when->startTime = "$startDate";
                $when->endTime = "$endDate";
            }
            $event->when = array($when);
            $calendarURL = str_replace(Zend_Gdata_Calendar::CALENDAR_FEED_URI . '/default/', "", $gAgendas[$note['daid']]['gCalendarId']);
            $calendarURL = 'http://www.google.com/calendar/feeds/' . $calendarURL . '/private/full';
            // Upload the event to the calendar server
            // A copy of the event as it is recorded on the server is returned
            try {
                $newEvent = $gdataCal->insertEvent($event, $calendarURL);
            } catch (Zend_Gdata_App_Exception $e) {
                return $this->__('Error produced during gCalendar\'s event creation');
            }
            $gCalendarEventId = $newEvent->id;
            // Edit note gCalendarEventId
            $items = array('gCalendarEventId' => $gCalendarEventId);
            //modify of a simple entry
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $note['aid'],
                        'items' => $items,
                        'daid' => $note['daid']));
        }
        return true;
    }

    public function getAuthSubUrl($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $next = ModUtil::func('IWagendas', 'user', 'getCurrentUrl');
        //$next = 'http://localhost:7777/zikula/index.php?module=Agendes';
        $scope = 'http://www.google.com/calendar/feeds/';
        $session = true;
        $secure = false;
        return Zend_Gdata_AuthSub::getAuthSubTokenUri($next, $scope, $secure, $session);
    }

    /**
     * Returns the full URL of the current page, based upon env variables
     *
     * Env variables used:
     * $_SERVER['HTTPS'] = (on|off|)
     * $_SERVER['HTTP_HOST'] = value of the Host: header
     * $_SERVER['SERVER_PORT'] = port number (only used if not http/80,https/443)
     * $_SERVER['REQUEST_URI'] = the URI after the method of the HTTP request
     *
     * @return string Current URL
     */
    public function getCurrentUrl() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        //Filter php_self to avoid a security vulnerability.
        $php_request_uri = htmlentities(substr($_SERVER['REQUEST_URI'], 0, strcspn($_SERVER['REQUEST_URI'], "\n\r")), ENT_QUOTES);
        $protocol = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $port = ($_SERVER['SERVER_PORT'] != '' && (($protocol == 'http://' && $_SERVER['SERVER_PORT'] != '80') || ($protocol == 'https://' && $_SERVER['SERVER_PORT'] != '443'))) ? ':' . $_SERVER['SERVER_PORT'] : '';
        return $protocol . $host . $port . $php_request_uri;
    }

    public function getAuthSubHttpClient() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        //global $_SESSION, $_GET, $_authSubKeyFile, $_authSubKeyFilePassphrase;
        $client = new Zend_Gdata_HttpClient();
        if ($_authSubKeyFile != null) {
            // set the AuthSub key
            $client->setAuthSubPrivateKeyFile($_authSubKeyFile, $_authSubKeyFilePassphrase, true);
        }
        if (!isset($_SESSION['sessionToken']) && isset($_GET['token'])) {
            $_SESSION['sessionToken'] = Zend_Gdata_AuthSub::getAuthSubSessionToken($_GET['token'], $client);
        }
        $client->setAuthSubToken($_SESSION['sessionToken']);
        return $client;
    }

    public function getUserGCalendarSettings() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $gUserName = '';
        $gUserPass = '';
        $gRefreshTime = '';
        $uid = UserUtil::getVar('uid');
        // get if user is using gCalendar sincronization
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $gCalendarUse = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'gCalendarUse',
                    'module' => 'IWagendas',
                    'uid' => UserUtil::getVar('uid'),
                    'sv' => $sv));
        if ($gCalendarUse) {
            //get Google username
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $gUserName = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'gUserName',
                        'module' => 'IWagendas',
                        'sv' => $sv));
            $gUserName = (strpos($gUserName, '@gmail.com') === false) ? $gUserName . '@gmail.com' : $gUserName;
            //get Google user password
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $gUserPass = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'gUserPass',
                        'module' => 'IWagendas',
                        'sv' => $sv));
            //get Google user password
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $gRefreshTime = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'gRefreshTime',
                        'module' => 'IWagendas',
                        'sv' => $sv,
                        'nult' => true));
            $gRefreshTime = ($gRefreshTime < 15) ? 15 : $gRefreshTime;
        }
        $userGCalendarSettings = array('gCalendarUse' => $gCalendarUse,
            'gUserName' => $gUserName,
            'gUserPass' => $gUserPass,
            'gRefreshTime' => $gRefreshTime);
        return $userGCalendarSettings;
    }

    public function getGdataFunctionsAvailability() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $zendGdataFuncAvailable = false;
        if (file_exists('lib/vendor/Zend/Gdata/App.php')) {
            $zendGdataFuncAvailable = true;
        }
        return $zendGdataFuncAvailable;
    }

    public function getGdataFunctionsUsability() {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        if (!UserUtil::isLoggedIn())
            return $this->__('The synchronization with gCalendar is only posible with validated users');
        $usability = false;
        $gdataFunctionsAvailability = ModUtil::func('IWagendas', 'user', 'getGdataFunctionsAvailability');
        $settings = ModUtil::func('IWagendas', 'user', 'getUserGCalendarSettings');
        if ($settings['gCalendarUse']) {
            $gCalendarUse = true;
        } else
            return false;
        //check if google user name is set
        if ($settings['gUserName'] == '')
            return $this->__('Synchronization with gCalendar failed. You must indicate your Google username');
        $usability = $gdataFunctionsAvailability * $gCalendarUse * ModUtil::getVar('IWagendas', 'allowGCalendar');
        return (boolean) $usability;
    }

    public function removeGCalendarUseVar($args) {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : date("m"), 'GET');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : date("Y"), 'GET');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'GET');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $result = ModUtil::func('IWmain', 'user', 'userDelVar', array('uid' => UserUtil::getVar('uid'),
                    'name' => 'sincroGCalendar',
                    'module' => 'IWagendas',
                    'sv' => $sv));
        return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'daid' => $daid)));
    }

    public function getCalendarContent($args) {
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'REQUEST');
        $user = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        // Get the month and the year
        if ($mes != null) {
            $month = $mes;
            $year = $any;
            if ($month == 0) {
                $month = 12;
                $year = $year - 1;
            }
            if ($month == 13) {
                $month = 1;
                $year = $year + 1;
            }
        } else {
            $month = date('m');
            $year = date('Y');
        }
        // Get an array with the names of the months
        $month_names = array($this->__('January'),
            $this->__('February'),
            $this->__('March'),
            $this->__('April'),
            $this->__('May'),
            $this->__('June'),
            $this->__('July'),
            $this->__('August'),
            $this->__('September'),
            $this->__('October'),
            $this->__('November'),
            $this->__('December'));
        // Get an array with the names of the week
        $day_names = array($this->__('Sunday'),
            $this->__('Monday'),
            $this->__('Tuesday'),
            $this->__('Wednesday'),
            $this->__('Thursday'),
            $this->__('Friday'),
            $this->__('Saturday'));
        // Get an array with the names of the week abbreviated
        $day_names_abbr = array($this->__('Mo'),
            $this->__('Tu'),
            $this->__('We'),
            $this->__('Th'),
            $this->__('Fr'),
            $this->__('Sa'),
            $this->__('Su'));
        // Get the color configuration
        $colors = explode('|', ModUtil::getVar('IWagendas', 'colors'));
        // Calculate the number of days of the month (28 to 31)
        $days_month = date("t", mktime(0, 0, 0, $month, 1, $year));
        // Numeric representation of the first day of the month in the week: 0 (for Sunday) through 6 (for Saturday)
        $first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
        // The Sunday must be number 7 (for us, Sunday is the last day of the week, not the first)
        if ($first_day == 0)
            $first_day = 7;
        //get the content from personal agenda and shared agendas where user is subscribed
        $events = ModUtil::apiFunc('IWagendas', 'user', 'getEvents', array('month' => $month,
                    'year' => $year,
                    'daid' => 0));
        $eventsArray = array();
        foreach ($events as $event) {
            $eventsArray[] = $event;
        }
        //get all the agendas where the user can access
        $agendas = ModUtil::func('IWagendas', 'user', 'getUserAgendas');
        $pos = 0;
        // Get the info of the days (one iteration per day)
        for ($i = 1; $i <= $days_month; $i++) {
            //get the notes for the current day from eventsArray
            $days[$i]['content'] = '';
            $final = mktime(23, 59, 59, $month, $i, $year);
            if (count($eventsArray) > 0) {
                while ($eventsArray[$pos]['data'] < $final && $pos < count($eventsArray)) {
                    $data = ($eventsArray[$pos]['totdia'] == 1) ? $this->__('All day') : date('H.i', $eventsArray[$pos]['data']);
                    $tasca = ($eventsArray[$pos]['tasca']) ? $this->__('Task') . ' - ' . $eventsArray[$pos]['nivell'] : '';
                    $tipus = ($tasca) ? $tasca : $data;
                    // Get the agenda from where the note comes from
                    $agenda = ($eventsArray[$pos]['daid'] > 0) ? $agendas[$eventsArray[$pos]['daid']] : '';
                    $agendaText = (isset($agenda['nom_agenda']) && $agenda['nom_agenda'] != '') ? " <span style=\'background-color:" . $agenda['color'] . "; border: 1px solid #000\'>" : '';
                    $days[$i]['content'] .= "<div style=\'float: left;\'><strong>" . $tipus . '</strong> &nbsp;</div><div>' . $eventsArray[$pos]['c1'] . $agendaText;
                    if (UserUtil::isLoggedIn() && $agenda['nom_agenda'] != '')
                        $days[$i]['content'] .= ' <font size="-2">(<strong>' . $agenda['nom_agenda'] . '</strong>)</font>';
                    $days[$i]['content'] .= '</span><div>';
                    $pos++;
                }

                while ($eventsArray[$pos]['data'] < $final && $pos < count($eventsArray)) {
                    $data = ($eventsArray[$pos]['totdia'] == 1) ? $this->__('All day') : date('H.i', $eventsArray[$pos]['data']);
                    // Get the agenda from where the note comes from
                    $agenda = ($eventsArray[$pos]['daid'] > 0) ? $agendas[$eventsArray[$pos]['daid']] : '';
                    $agendaText = (isset($agenda['nom_agenda']) && $agenda['nom_agenda'] != '') ? " <span style=\'background-color:" . $agenda['color'] . "; border: 1px solid #000\'>" : '';
                    $days[$i]['content'] .= "<div style=\'float: left;\'><strong>" . $data . '</strong> &nbsp;</div><div>' . $eventsArray[$pos]['c1'] . $agendaText;
                    if (UserUtil::isLoggedIn() && $agenda['nom_agenda'] != '')
                        $days[$i]['content'] .= ' <font size="-2">(<strong>' . $agenda['nom_agenda'] . '</strong>)</font>';
                    $days[$i]['content'] .= '</span><div>';
                    $pos++;
                }
            }
            if ($days[$i]['content'] == '') {
                $days[$i]['content'] = $this->__('There are no events on this date') . '<br />';
                $days[$i]['haveContent'] = false;
            } else
                $days[$i]['haveContent'] = true;
            $days[$i]['content'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $days[$i]['content']));
            // Check whether this day belongs to any defined period, so it will be shown in a predetermined color
            $periode = ModUtil::func('IWagendas', 'user', 'periode', array('dia' => $i,
                        'mes' => $month,
                        'any' => $year));
            // Include the periode color in the array (all the days look the same)
            if ($periode['dins']) {
                $days[$i]['bgcolor'] = $periode['color'];
                $days[$i]['color'] = $colors[5];
                $days[$i]['label'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $periode['etiqueta'])) . '<br /><br />';
            } else {
                $days[$i]['bgcolor'] = $colors[9]; // Default color (background color of the table)
                $days[$i]['color'] = '';
                $days[$i]['label'] = '';
            }
            // Check whether it's a non-working day
            $festiu = ModUtil::func('IWagendas', 'user', 'festiu', array('dia' => $i,
                        'mes' => $month,
                        'any' => $year));
            // Change the color and the label if necessary
            if ($festiu['festiu']) {
                $days[$i]['bgcolor'] = $colors[8];
                $days[$i]['color'] = $colors[6];
                $days[$i]['label'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $festiu['etiqueta'])) . '<br /><br />';
            }
            // Check whether it's weekend
            $day_of_the_week = date("w", mktime(0, 0, 0, $month, $i, $year));
            // Change the color if necessary
            if ($day_of_the_week == 6 || $day_of_the_week == 0) {
                $days[$i]['color'] = $colors[6];
                $days[$i]['bgcolor'] = $colors[8];
            }
            // Check whether the day is today
            if (date('d') == $i && date('m') == $month && date('Y') == $year)
                $days[$i]['bgcolor'] = $colors[10];
            // Check whether there's any info associated to this day
            $information = ModUtil::func('IWagendas', 'user', 'info', array('dia' => $i,
                        'mes' => $month,
                        'any' => $year));
            if ($information != '') {
                $days[$i]['info'] = ModUtil::func('IWagendas', 'user', 'prepara_etiqueta', array('text' => $information));
            }
            // Build the date to be shown in the caption of the popup window
            $days[$i]['caption'] = $day_names[$day_of_the_week] . "&nbsp;&nbsp;$i/$month/$year";
        }

        // Pass the data to the template
        return $this->view->assign('colors', $colors)
                ->assign('month', (int) $month)
                ->assign('previous_month', (int) $month - 1)
                ->assign('next_month', (int) $month + 1)
                ->assign('year', $year)
                ->assign('first_day', $first_day)
                ->assign('days_month', $days_month)
                ->assign('month_name', $month_names[(int) $month - 1])
                ->assign('day_names_abbr', $day_names_abbr)
                ->assign('days', $days)
                ->fetch('IWagendas_block_Calendar.htm');
    }

    /**
     * Get the notes of a user for a vcalendar format
     *
     * @param array $argsTotes for all the notes or only future notes
     * @return A file for vcalendar format
     * /
      public function vcalendar($args)
      {
      // Security check
      $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

      $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'GET');
      $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'GET');
      $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'GET');
      $totes = FormUtil::getPassedValue('totes', isset($args['totes']) ? $args['totes'] : null, 'GET');

      // Get all the notes for a user
      $registres = ModUtil::apiFunc('IWagendas', 'user', 'getEvents', array('inici' => 1,
      'final' => 999999999999999999999999999999));
      if (empty($registres)) {
      if ($totes!=0) {
      //Success
      LogUtil::registerError ($this->__('There are no events in the agenda'));
      } else {
      //Success
      LogUtil::registerError ($this->__('All existing events have been exported to vcalendar'));
      }
      return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
      'any' => $any,
      'dia' => $dia,
      'daid' => 0)));
      }

      //tenim dades a l'agenda i construim el fitxer vcs
      //generem el fitxer on escriurem les dades a exportar
      $fitxer = ModUtil::getVar('IWmain', 'documentRoot').'/'.ModUtil::getVar('IWagendas', 'urladjunts').'/'.UserUtil::getVar('uname').date('dmY').'.vcs';

      $f = fopen($fitxer,'w');

      foreach ($registres as $registre) {
      //preparem l'hora de l'anotaciï¿œ
      if ($registre['totdia'] == 1) {
      $inici = date(Ymd,$registre['data'])."T000000\r\n";
      $final = date(Ymd,$registre['data'])."T240000\r\n";
      } else {
      $inici = date(Ymd,$registre['data'])."T".date(Hi,$registre['data'])."00\r\n";
      $final = date(Ymd,$registre['data'])."T".date(Hi,$registre['data'] + (60 * 60))."00\r\n";
      }
      fwrite($f,"BEGIN:VCALENDAR\r\n");
      fwrite($f,"PRODID:Intraweb\r\n");
      fwrite($f,"BEGIN:VEVENT\r\n");

      //Si ï¿œs la data lï¿œmit d'una tasca ho indiquem
      $tasca = ($registre['tasca'] == 1) ? 'Lï¿œMIT TASCA ->' : '';

      fwrite($f,"SUMMARY;ENCODING=QUOTED-PRINTABLE:".$tasca.str_replace("\r\n",'=0D=0A',$registre['c1'])."\r\n");
      if ($registre['c2']!='') {fwrite($f,"DESCRIPTION;ENCODING=QUOTED-PRINTABLE:".str_replace("\r\n",'=0D=0A',$registre['c2'])."\r\n");}
      fwrite($f,"DTSTART:".$inici);
      fwrite($f,"DTEND:".$final);
      fwrite($f,"END:VEVENT\r\n");
      fwrite($f,"END:VCALENDAR\r\n\r\n");
      }
      fclose($f);

      //Comprovem que el fitxer s'hagi creat amb ï¿œxit
      if (!is_file($fitxer)) {
      //Success
      LogUtil::registerError ($this->__('An error has ocurred while creating VCS file. If the problem persists, please contact the administrator'));
      return System::redirect(ModUtil::url('IWagendas', 'user', 'main', array('mes' => $mes,
      'any' => $any,
      'dia' => $dia,
      'daid' => 0)));
      }

      //Marquem les anotacions com a passades a vcalendar
      ModUtil::apiFunc('IWagendas','user','vcalendar');

      //Gather relevent info about file
      $len = filesize($fitxer);
      $filename = basename($fitxer);
      $file_extension = strtolower(substr(strrchr($filename,"."),1));
      $ctype = "VCALENDAR/vcs";
      //Begin writing headers
      header("Pragma: public");
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: public");
      header("Content-Description: File Transfer");

      //Use the switch-generated Content-Type
      header("Content-Type: $ctype");

      //Force the download
      $header = "Content-Disposition: attachment; filename=".$filename.";";
      header($header);
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: ".$len);
      @readfile($fitxer);

      //Esborra el fitxer del servidor
      unlink($fitxer);
      exit;
      }
     */
}
