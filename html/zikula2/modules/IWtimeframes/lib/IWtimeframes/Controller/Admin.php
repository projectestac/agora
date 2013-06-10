<?php

class IWtimeframes_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $auxframes = array();
        $frames = array();
        //Cridem la funció API anomenada getall i que retornarï¿œ la informació
        $auxframes = ModUtil::apiFunc('IWtimeframes', 'user', 'getall');
   
        foreach ($auxframes as $frame) {
            if (ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings', array('mdid' => $frame['mdid']))) {
                $frame['can_delete'] = true; //false;
            } else {
                $frame['can_delete'] = true;
            }
            $frames[]=$frame;
        }    
        
        //Per si no hi ha marcs definits
        $hihamarcs = (empty($frames)) ? false : true;
        
        return $this->view->assign('hi_ha_marcs', $hihamarcs)
                ->assign('marcs', $frames)
                ->fetch('IWtimeframes_admin_main.htm');
    }

    /*
      funció que presenta el formulari des d'on es demanen la dades del nou marc que es vol crear
     */

    public function newItem() {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');

        $nom_marc = '';
        $descriu = '';

        if (!empty($mdid)) {
            //Agafem les dades del registre a editar
            $registre = ModUtil::apiFunc('IWtimeframes', 'user', 'get',
                            array('mdid' => $mdid));
            if (empty($registre)) {
                return LogUtil::registerError($this->__('Error! Could not load module.'));
            }

            //posem els valors dels camps
            $nom_marc = $registre['nom_marc'];
            $descriu = $registre['descriu'];
        }

        switch ($m) {
            case 'n': //new
                $accio = $this->__('Add new timeFrame');
                $acciosubmit = $this->__('Creates the timeFrame');
                break;
            case 'e': //edit
                $accio = $this->__('Edit the TimeFrame');
                $acciosubmit = $this->__('Change');
                break;
        }

        return $this->view->assign('nom_marc', $nom_marc)
                ->assign('m', $m)
                ->assign('mdid', $mdid)
                ->assign('descriu', $descriu)
                ->assign('acciosubmit', $acciosubmit)
                ->assign('accio', $accio)
                ->fetch('IWtimeframes_admin_newItem.htm');
    }

    /*
      funció que comprova que les dades enviades des del formulari de creaciï¿œ d'un
      nou marc horari s'ajusten al que ha de ser i envia l'ordre de crear el registre
     */

    public function create($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
        $nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        if ($m == 'n') {
            //Es crida la funció API amb les dades extretes del formulari
            if (ModUtil::apiFunc('IWtimeframes', 'admin', 'create',
                            array('nom_marc' => $nom_marc,
                                'descriu' => $descriu))) {
                //success
                LogUtil::registerStatus($this->__('We have created a new timeFrame.'));
            }
        } else {
            if (ModUtil::apiFunc('IWtimeframes', 'admin', 'update',
                            array('nom_marc' => $nom_marc,
                                'descriu' => $descriu,
                                'mdid' => $mdid))) {
                // Success
                LogUtil::registerStatus($this->__('timeFrame was updated'));
            }
        }
        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'main'));
    }

    /*
     * Funció que gestiona l'esborrament d'un marc horari i envia les dades a la funció API 
     * corresponent per fer l'ordre efectiva
     */

    public function delete($args) {
        //$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'REQUEST');
        $mdid= FormUtil::getPassedValue('mdid', null, 'REQUEST');
        $confirmacio = FormUtil::getPassedValue('confirmacio', null, 'REQUEST');
        //$confirmacio = FormUtil::getPassedValue('confirmacio', isset($args['confirmacio']) ? $args['confirmacio'] : null, 'REQUEST');
        //$mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
        //$referenced = FormUtil::getPassedValue('r', isset($args['r']) ? $args['r'] : null, 'REQUEST');
        $mode = FormUtil::getPassedValue('m', null, 'REQUEST');
        $referenced = FormUtil::getPassedValue('r', null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Cridem la funció de l'API de l'usuari que ens retornarï¿œ la informació del registre demanat
        $registre = ModUtil::apiFunc('IWtimeframes', 'user', 'get',
                        array('mdid' => $mdid));

        if (empty($registre)) {
            return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.') . " mdid - " . $mdid);
        }

        //Comprovaciï¿œ de seguretat
        if (!SecurityUtil::checkPermission('IWtimeframes::Item', "$registre[nom_marc]::$mdid", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'));
        }
        
        //Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
        if (empty($confirmacio) and empty($referenced)) {
            return $this->view->assign('mdid', $mdid)
                    ->assign('nom_marc', $registre['nom_marc'])
                    ->fetch('IWtimeframes_admin_del.htm');
        }
       
        //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
        // Check if frame is referenced in bookings module
        if (empty($referenced)) {
            $referenced = ModUtil::apiFunc('IWtimeframes', 'admin', 'referenced',
                            array('mdid' => $mdid));

            if ($referenced) {
                return $this->view->assign('referenced', $referenced)
                        ->assign('mdid', $mdid)
                        ->assign('nom_marc', $registre['nom_marc'])
                        ->fetch('IWtimeframes_admin_del.htm');
            }
        }
        
        // Confirm authorisation code
        //$this->checkCsrfToken();

        //Cridem la funció API que farï¿œ l'esborrament del registre
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'delete',
                        array('mdid' => $mdid,
                            'm' => $mode))) {
            //L'esborrament ha estat un ï¿œxit i ho notifiquem
            SessionUtil::setVar('statusmsg', $this->__('Has been deleted the timeFrame'));
        }

        //Enviem a l'usuari a la taula de marcs horari
        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'main'));
    }

    /* ---------------------------------------------------------------------------------------------------------*\
     * 					     HORES 														*
    \* ---------------------------------------------------------------------------------------------------------*/

    /*
      Funció que mostra la informació d'un marc horari
     */

    public function timetable() {
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Cridem la funció de l'API de l'usuari que ens retornarà la informació del registre demanat
        $item = ModUtil::apiFunc('IWtimeframes', 'user', 'get',
                        array('mdid' => $mdid));

        $horari = ModUtil::apiFunc('IWtimeframes', 'user', 'getall_horari',
                        array('mdid' => $mdid));
 
        !empty($horari) ? $hi_ha_hores = true : $hi_ha_hores = false;
        $hasbookings = ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings',
                        array('mdid' => $mdid));
 
        return $this->view->assign('nom_marc', $item['nom_marc'])
                ->assign('horari', $horari)
                ->assign('hi_ha_hores', $hi_ha_hores)
                ->assign('hasbookings', $hasbookings)
                ->assign('mdid', $mdid)
                ->fetch('IWtimeframes_admin_timetables.htm');
    }

    /*
      funció que presenta el formulari des d'on es demanen la dades per introduir una nova hora en el marc horari
     */

    public function new_hour($args) {
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');
        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : 0, 'GET');

        // Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings',
                        array('mdid' => $mdid))) {
            return LogUtil::registerError($this->__('Operation unavailable. There are reservations on this time frame.'));
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Contruim les matrius d'hores i minuts
        $hora = array(array('id' => '08', 'name' => '08'),
            array('id' => '09', 'name' => '09'),
            array('id' => '10', 'name' => '10'),
            array('id' => '11', 'name' => '11'),
            array('id' => '12', 'name' => '12'),
            array('id' => '13', 'name' => '13'),
            array('id' => '14', 'name' => '14'),
            array('id' => '15', 'name' => '15'),
            array('id' => '16', 'name' => '16'),
            array('id' => '17', 'name' => '17'),
            array('id' => '18', 'name' => '18'),
            array('id' => '19', 'name' => '19'),
            array('id' => '20', 'name' => '20'),
            array('id' => '21', 'name' => '21'),
            array('id' => '22', 'name' => '22'));

        $minut = array(array('id' => '00', 'name' => '00'),
            array('id' => '05', 'name' => '05'),
            array('id' => '10', 'name' => '10'),
            array('id' => '15', 'name' => '15'),
            array('id' => '20', 'name' => '20'),
            array('id' => '25', 'name' => '25'),
            array('id' => '30', 'name' => '30'),
            array('id' => '35', 'name' => '35'),
            array('id' => '40', 'name' => '40'),
            array('id' => '45', 'name' => '45'),
            array('id' => '50', 'name' => '50'),
            array('id' => '55', 'name' => '55'));

        $nova_hora = false;
        $editmode = false;
        $descriu = '';
        $starth = '';
        $startm = '';
        $endh = '';
        $endm = '';
        switch ($mode) {
            case 'n': //new
                $accio = $this->__('New time');
                $acciosubmit = $this->__('Add time at timeFrame ');
                $nova_hora = true;
                break;
            case 'e': //edit
                $accio = $this->__('Edit the TimeFrame');
                $acciosubmit = $this->__('Change');
                $editmode = true;
                $period = ModUtil::apiFunc('IWtimeframes', 'user', 'get_hour',
                                array('hid' => $hid));
                if ($period == false) {
                    return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.'));
                }
                $starth = date('H', strtotime($period['start']));
                $startm = date('i', strtotime($period['start']));
                $endh = date('H', strtotime($period['end']));
                $endm = date('i', strtotime($period['end']));
                $descriu = $period['descriu'];

                break;
                return logUtil::registerError($this->__('Error! Could not load module.'));
        }
        $horari = ModUtil::apiFunc('IWtimeframes', 'user', 'getall_horari',
                        array('mdid' => $mdid));
        !empty($horari) ? $hi_ha_hores = true : $hi_ha_hores = false;
        $item = ModUtil::apiFunc('IWtimeframes', 'user', 'get',
                        array('mdid' => $mdid));

        return $this->view->assign('hid', $hid)
                ->assign('starth', $starth)
                ->assign('startm', $startm)
                ->assign('endh', $endh)
                ->assign('endm', $endm)
                ->assign('descriu', $descriu)
                ->assign('accio', $accio)
                ->assign('acciosubmit', $acciosubmit)
                ->assign('nom_marc', $item['nom_marc'])
                ->assign('hores', $hora)
                ->assign('minuts', $minut)
                ->assign('hi_ha_hores', $hi_ha_hores)
                ->assign('horari', $horari)
                ->assign('mdid', $mdid)
                ->assign('nova_hora', $nova_hora)
                ->assign('editmode', $editmode)
                ->fetch('IWtimeframes_admin_timetables.htm');
    }

    /*
      funció que comprova que les dades enviades des del formulari de creaciï¿œ d'una
      nova hora per un marc horari s'ajusten al que ha de ser i envia l'ordre
      de crear el registre a la funció new_hora de l'API
     */

    public function create_hour($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings',
                        array('mdid' => $mdid))) {
            return LogUtil::registerError($this->__('Operation unavailable. There are reservations on this time frame.'));
        }

        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
        $hora_i = FormUtil::getPassedValue('hora_i', isset($args['hora_i']) ? $args['hora_i'] : null, 'POST');
        $hora_f = FormUtil::getPassedValue('hora_f', isset($args['hora_f']) ? $args['hora_f'] : null, 'POST');
        $minut_i = FormUtil::getPassedValue('minut_i', isset($args['minut_i']) ? $args['minut_i'] : null, 'POST');
        $minut_f = FormUtil::getPassedValue('minut_f', isset($args['minut_f']) ? $args['minut_f'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

        $year = '0000';
        $month =  '00';
        $day =  '00'; 

        $date_i = DateUtil::buildDatetime($year, $month, $day, $hora_i, $minut_i);
        $date_f = DateUtil::buildDatetime($year, $month, $day, $hora_f, $minut_f);
        // Confirm authorisation code
        $this->checkCsrfToken();
//$dt = DateUtil::getDatetime_Date(DateUtil::getDatetime()); print_r($date_i);die();
        //Construim la franja horï¿œria i comprovem que l'hora inicial sigui mï¿œs petita que la hora final
        $hora_inicial = $hora_i . ':' . $minut_i;
        $hora_final = $hora_f . ':' . $minut_f;

        if ($hora_inicial >= $hora_final) {
            LogUtil::registerError($this->__('The time allocated is not correct.'));
            return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'new_hour',
                            array('mdid' => $mdid,
                                'm' => 'n')));
        }

        // Check for overlaping time periods
        $overlap = ModUtil::apiFunc('IWtimeframes', 'admin', 'overlap',
                        array('mdid' => $mdid,
                            'start' => $date_i,
                            'end' => $date_f));
        if ($overlap) {
            LogUtil::registerError($this->__('Warning! The new time is overlaps with some of the existing ones.'));
        }
        else 
        //Insert new time into DB
        $lid = ModUtil::apiFunc('IWtimeframes', 'admin', 'create_hour',
                        array('mdid' => $mdid,
                            'start' => $date_i,
                            'end' => $date_f,
                            'descriu' => $descriu));

        if ($lid != false) {
            //S'ha creat una nova hora dins del marc horari
            SessionUtil::setVar('statusmsg', $this->__('Have created a new time in timeFrame'));
        }
        $horari = ModUtil::apiFunc('IWtimeframes', 'user', 'getall_horari',
                        array('mdid' => $mdid));
        !empty($horari) ? $hi_ha_hores = true : $hi_ha_hores = false;
        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'timetable',
                        array('mdid' => $mdid)));
    }

    /*
      funció que presenta el formulari que ens mostra l'horari i informació de l'hora que es vol esborrar
     */

    public function delete_hour($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $confirmacio = FormUtil::getPassedValue('c', isset($args['c']) ? $args['c'] : null, 'GET');

        // Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings',
                        array('mdid' => $mdid))) {
            return LogUtil::registerError($this->__('Operation unavailable. There are reservations on this time frame.'));
        }

        //Cridem la funció de l'API de l'usuari que ens retornarï¿œ la informació del registre demanat

        $theHour = ModUtil::apiFunc('IWtimeframes', 'user', 'get_hour',
                        array('hid' => $hid));

        if ($theHour == false) {
            return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.'));
        }

        //Demanem confirmació per l'esborrament del registre, si no s'ha demanat abans
        if (empty($confirmacio)) {
            $horari = ModUtil::apiFunc('IWtimeframes', 'user', 'getall_horari',
                            array('mdid' => $mdid));
            $item = ModUtil::apiFunc('IWtimeframes', 'user', 'get',
                            array('mdid' => $mdid));

            return $this->view->assign('nom_marc', $item['nom_marc'])
                    ->assign('start', date('H:i', strtotime($theHour['start'])))
                    ->assign('end', date('H:i', strtotime($theHour['end'])))
                    ->assign('horari', $horari)
                    ->assign('mdid', $mdid)
                    ->assign('hid', $hid)
                    ->fetch('IWtimeframes_admin_deletehour.htm');
        }
        //L'usuari ha confirmat l'esborrament del registre i procedim a fer-ho efectiu
        //Cridem la funció API que farà l'esborrament del registre
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'delete_hour',
                        array('hid' => $hid))) {
            //L'esborrament ha estat un ï¿œxit i ho notifiquem
            SessionUtil::setVar('statusmsg', $this->__('Was deleted the time in timeFrame'));
        }

        //Enviem a l'usuari a la taula amb les hores del marc horari
        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'timetable',
                        array('mdid' => $mdid)));
    }

    /*
      funció que presenta el formulari que ens mostra i permet editar les dades d'una hora que es vol modificar
     */

    public function edit_hour($args) {
        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Mirar si existeixen reserves que facin referï¿œncia a aquest marc horari
        if (ModUtil::apiFunc('IWtimeframes', 'admin', 'hasbookings',
                        array('mdid' => $mdid))) {
            return LogUtil::registerError($this->__('Operation unavailable. There are reservations on this time frame.'));
        }


        $period = ModUtil::apiFunc('IWtimeframes', 'user', 'get_hour',
                        array('hid' => $hid));
        if ($period == false) {
            return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.'));
        }

        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'new_hour',
                        array('mdid' => $mdid,
                            'hid' => $hid,
                            'm' => 'e')));
    }

    /*
      funció que comprova que les dades enviades des del formulari de modificaciï¿œ d'una
      hora per un marc horari s'ajusten al que ha de ser i envia l'ordre d'actualitzar el registre
     */

    /*
      funció que comprova que les dades enviades des del formulari de modificaciï¿œ d'una
      hora per un marc horari s'ajusten al que ha de ser i envia l'ordre d'actualitzar el registre
     */

    public function update_hour($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden();
        }
        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'POST');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
        $hora_i = FormUtil::getPassedValue('hora_i', isset($args['hora_i']) ? $args['hora_i'] : null, 'POST');
        $hora_f = FormUtil::getPassedValue('hora_f', isset($args['hora_f']) ? $args['hora_f'] : null, 'POST');
        $minut_i = FormUtil::getPassedValue('minut_i', isset($args['minut_i']) ? $args['minut_i'] : null, 'POST');
        $minut_f = FormUtil::getPassedValue('minut_f', isset($args['minut_f']) ? $args['minut_f'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        $year = '0000'; //DateUtil::getDatetime_Field($now, 1);
        $month =  '00'; //DateUtil::getDatetime_Field($now, 2);
        $day =  '00'; //DateUtil::getDatetime_Field($now, 3);

        $date_i = DateUtil::buildDatetime($year, $month, $day, $hora_i, $minut_i);
        $date_f = DateUtil::buildDatetime($year, $month, $day, $hora_f, $minut_f);
        //Construim la franja horï¿œria i comprovem que l'hora inicial sigui mï¿œs petita que la hora final
        $start = $hora_i . ':' . $minut_i;
        $end = $hora_f . ':' . $minut_f;

        if ($start >= $end) {
            LogUtil::registerError($this->__('The time allocated is not correct.'));
            return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'timetable',
                            array('mdid' => $mdid)));
        }

        // Check for overlaping time periods
        $overlap = ModUtil::apiFunc('IWtimeframes', 'admin', 'overlap',
                        array('mdid' => $mdid,
                            'start' => $date_i,
                            'end' => $date_f,
                            'hid' => $hid));
        if ($overlap) {
            LogUtil::registerError($this->__('Warning! The new time is overlaps with some of the existing ones.'));
        }

        //Insert new time into DB
        $lid = ModUtil::apiFunc('IWtimeframes', 'admin', 'update_hour',
                        array('mdid' => $mdid,
                            'start' => $date_i,
                            'end' => $date_f,
                            'descriu' => $descriu,
                            'hid' => $hid));

        if (!empty($lid)) {
            //S'ha creat una nova hora dins del marc horari
            SessionUtil::setVar('statusmsg', $this->__('Has changed the time.'));
        }
        $horari = ModUtil::apiFunc('IWtimeframes', 'user', 'getall_horari',
                        array('mdid' => $mdid));

        return System::redirect(ModUtil::url('IWtimeframes', 'admin', 'timetable',
                        array('mdid' => $mdid)));
    }

}