<?php

class IWbookings_Controller_Admin extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * Admin main page
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return	List of the available spaces or equipements
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $espais = array();

        //Call getall i que retornar� la informaci�
        $items = ModUtil::apiFunc('IWbookings', 'user', 'getall');

        //Are defined booking locations?
        (empty($items)) ? $hi_ha_espais = false : $hi_ha_espais = true;

        foreach ($items as $item) {
            //Si la descripci� de l'espai arriba buida hi posem uns guions per tal que la taula no quedi lletja
            (empty($item['description'])) ? $item['description'] = '---' : "";

            //Recollim el nom del marc horari
            
            $marc = ModUtil::apiFunc('IWbookings', 'admin', 'nom_marc', array('mdid' => $item['mdid']));

            (!empty($marc)) ? $item['mdid'] = $marc : $item['mdid'] = "---";
            //Si les observacions arriben buides hi posem uns guions per tal que la taula no quedi lletja
            ($item['vertical'] == 1) ? $item['vertical'] = $this->__('Column') : $item['vertical'] = $this->__('Row');
            if (ModUtil::getVar('IWbookings', 'showcolors')) {
                $color = $item['color'];
            } else {
                $color = "#FFFFFF";
            }
            $espais[] = array('sid' => $item['sid'],
                'nom_espai' => $item['space_name'],
                'descriu' => $item['description'],
                'vertical' => $item['vertical'],
                'actiu' => $item['active'],
                'mdid' => $item['mdid'],
                'color' => $color,
            );
        }

        return $this->view->assign('espais', $espais)
                ->assign('hi_ha_espais', $hi_ha_espais)
                ->fetch('IWbookings_admin_main.htm');
    }

    /*
      Shows current module configuration and allows modify it
     */

    public function conf() {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $grups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        //Omplim el nombre de setmanes vista per fer les reserves
        if (empty($grups)) {
            return LogUtil::registerError($this->__('No groups found'));
        }

        return $this->view->assign('grups', $grups)
                ->assign('grup', ModUtil::getVar('IWbookings', 'group'))
                ->assign('setmanes', ModUtil::getVar('IWbookings', 'weeks'))
                ->assign('capsetmana', ModUtil::getVar('IWbookings', 'weekends'))
                ->assign('taula', ModUtil::getVar('IWbookings', 'month_panel'))
                ->assign('delantigues', ModUtil::getVar('IWbookings', 'eraseold'))
                ->assign('mostracolors', ModUtil::getVar('IWbookings', 'showcolors'))
                ->assign('NTPtime', ModUtil::getVar('IWbookings', 'NTPtime'))
                ->fetch('IWbookings_admin_conf.htm');
    }

    /*
      Apply configuration module changes
      Funció que fa efectiva la modificació de la configuraci� del m�dul
     */

    public function conf_modifica($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $setmanes = FormUtil::getPassedValue('setmanes', isset($args['setmanes']) ? $args['setmanes'] : null, 'POST');
        $taula = FormUtil::getPassedValue('taula', isset($args['taula']) ? $args['taula'] : null, 'POST');
        $capsetmana = FormUtil::getPassedValue('capsetmana', isset($args['capsetmana']) ? $args['capsetmana'] : null, 'POST');
        $delantigues = FormUtil::getPassedValue('delantigues', isset($args['delantigues']) ? $args['delantigues'] : null, 'POST');
        $mostracolors = FormUtil::getPassedValue('mostracolors', isset($args['mostracolors']) ? $args['mostracolors'] : null, 'POST');
        $NTPtime = FormUtil::getPassedValue('NTPtime', isset($args['NTPtime']) ? $args['NTPtime'] : null, 'POST');

        $this->checkCsrfToken();

        if (!isset($grup))
            $grup = 0;

        if (!is_numeric($setmanes))
            $setmanes = 1;


        $this->setVar('group', $grup) //grup
                ->setVar('weeks', $setmanes) // setmanes
                ->setVar('month_panel', $taula) // taula_mes
                ->setVar('weekends', $capsetmana)  // capssetmana
                ->setVar('eraseold', $delantigues) // delantigues
                ->setVar('showcolors', $mostracolors) // mostracolors
                ->setVar('NTPtime', $NTPtime); // mostracolors

        LogUtil::registerStatus($this->__('Configuration updated'));
        System::redirect(ModUtil::url('IWbookings', 'admin', 'main'));

        return true;
    }

    /**
     * Show the form needed to create a new space or equipement to book
     * @author	Albert Pérez Monfort (aperezm@xtec.cat)
     * @author	Josep Ferràndiz Farré (jferran6@xtec.cat)
     * @return	The creation form
     */
    public function newItem($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'GET');

        $nom_espai = '';
        $descriu = '';
        $actiu = 0;
        $vertical = 0;
        $mdid = 0;
        $color = '';
        $hasbookings = false;

        //Get space information for edition purposes
        if (!empty($sid)) {
            //Get register information
            $registre = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));
            if ($registre === false) {
                return LogUtil::registerError($this->__('Error! Could not load module.'));
            }
            $hasbookings = ModUtil::apiFunc('IWbookings', 'admin', 'hasbookings', $sid);
            //Fill in values
            $nom_espai = $registre['space_name'];
            $descriu = $registre['description'];
            $actiu = $registre['active'];
            $vertical = $registre['vertical'];
            $mdid = $registre['mdid'];
            $color = $registre['color'];
        }

        $marcs = ModUtil::apiFunc('IWbookings', 'admin', 'marcs');
        $hi_ha_marcs = count($marcs) < 2 ? false : true;

        switch ($m) {
            case 'n':
                $accio = $this->__('Add a new booking');
                $acciosubmit = $this->__('Create the room or equipment');
                break;
            case 'e':
                $accio = $this->__('Edit room or equipment');
                $acciosubmit = $this->__('Update');
                break;
        }

        return $this->view->assign('nom_espai', $nom_espai)
                ->assign('descriu', $descriu)
                ->assign('color', $color)
                ->assign('actiu', $actiu)
                ->assign('hi_ha_marcs', $hi_ha_marcs)
                ->assign('marcs', $marcs)
                ->assign('mdid', $mdid)
                ->assign('vertical', $vertical)
                ->assign('hasbookings', $hasbookings)
                ->assign('m', $m)
                ->assign('accio', $accio)
                ->assign('acciosubmit', $acciosubmit)
                ->assign('sid', $sid)
                ->fetch('IWbookings_admin_new.htm');
    }

    /*
      Funció que comprova que les dades enviades des del formulari de creaci� d'un
      nou espai s'ajusten al que ha de ser i envia l'ordre de crear el registre a la
      funció new de l'API

      Validate space form info and call the API function "new"
     */

    public function create($args) {
        $nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
        $actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');
        $vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'POST');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');

        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        (empty($mdid)) ? $vertical = 0 : "";

        ($actiu == 'on') ? $actiu = 1 : $actiu = 0;
        ($vertical == 'on') ? $vertical = 1 : $vertical = 0;
        if ($m == 'n') {
            //Es crida la funció API amb les dades extretes del formulari
            if (ModUtil::apiFunc('IWbookings', 'admin', 'create', array('nom_espai' => $nom_espai,
                        'descriu' => $descriu,
                        'actiu' => $actiu,
                        'mdid' => $mdid,
                        'vertical' => $vertical,
                        'color' => $color))) {
                //S'ha creat l'espai de reserva correctament
                //success
                LogUtil::registerStatus($this->__('A new room or equipment to book has been created'));
            }
        } else {
            if (ModUtil::apiFunc('IWbookings', 'admin', 'update', array('sid' => $sid,
                        'nom_espai' => $nom_espai,
                        'descriu' => $descriu,
                        'actiu' => $actiu,
                        'mdid' => $mdid,
                        'vertical' => $vertical,
                        'color' => $color))) {
                //La modificaci� s'ha fet amb �xit
                // Success
                LogUtil::registerStatus($this->__('Room or equipment updated'));
            }
        }
        System::redirect(ModUtil::url('IWbookings', 'admin', 'main'));

        //Retorna havent acabat el proc�s satisfact�riament
        return true;
    }

    /*
      Funció que fa l'esborrament d'un espai o equip
     */

    public function delete($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Cridem la funci� de l'API de l'usuari que ens retornar� la inforamci� del
        //registre demanat
        $registre = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        if ($registre == false) {
            LogUtil::registerError($this->__('The room or equipment was not found'));
            return true;
        }

        //Demanem confirmaci� per l'esborrament del registre, si no s'ha demanat abans
        if (empty($confirmation)) {
            //Afegim el men� de l'administrador
            return $this->view->assign('nom_espai', $registre['space_name'])
                    ->assign('sid', $sid)
                    ->fetch('IWbookings_admin_del.htm');
        }

        $this->checkCsrfToken();

        //Cridem la funci� API que far� l'esborrament del registre
        if (ModUtil::apiFunc('IWbookings', 'admin', 'delete', array('sid' => $sid))) {
            //L'esborrament ha estat un �xit i ho notifiquem
            LogUtil::registerStatus($this->__('Room or equipment deleted') . ": " . $registre['space_name']);
        }

        //Enviem a l'usuari a la taula d'espais i equipaments per reservar
        System::redirect(ModUtil::url('IWbookings', 'admin', 'main'));

        //Retornem el valor true ja que l'esborrament ha estat possible
        return true;
    }

    /*
      Funció que mostra la taula de les reserves temporals
     */

    public function mostra_taula($arg) {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');

        //Array amb els noms dels dies de la setmana
        $dies = array($this->__('Monday'), $this->__('Tuesday'), $this->__('Wednesday'), $this->__('Thursday'), $this->__('Friday'));

        // Get space info
        $espai = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        //D'entrada farem que les taules es mostrin de forma horitzontal. Despr�s, si
        //hi ha un marc horari definit canviarem al que correspongui

        $vertical = 0;

        //Comprovem si la taula est� lligada a un marc horari i si aquest marc horari
        //no ha estat esborrat

        if ($espai['mdid'] != 0) {
            //Busquem les franges hor�ries
            $franges = ModUtil::apiFunc('IWbookings', 'user', 'getall_hores', array('mdid' => $espai['mdid']));
            if (!empty($franges)) {
                $vertical = $espai['vertical'];
            }
        }

        //Es crida la funció API que retorna les reserves temporals de l'espai que volem reservar
        $temporals = ModUtil::apiFunc('IWbookings', 'user', 'getall_reserves', array('sid' => $sid,
                    'temporal' => 1));

        //Generem la taula amb el format corresponent
        if ($vertical != 1) {
            //Taula en format horitzontal
            $taula = array();
            $d = 0;
            foreach ($dies as $dia) {
                $i++;
                //Busquem l'hora i dia de la reserva i ho passem a format timestamp
                if ($i >= date("w")) {
                    $today = DateUtil::getDatetime_NextDay($i - date("w"), '%Y-%m-%d');
                } else {
                    $today = DateUtil::getDatetime_NextDay($i + 7 - date("w"), '%Y-%m-%d');
                }

                $tomorrow = DateUtil::getDatetime(DateUtil::makeTimestamp($today) + 24 * 3600, '%Y-%m-%d');

                //Es crida la funci� API que retorna les reserves puntuals de l'espai que volem reservar

                $registres = array();
                //Afegim les reserves temporals a la matriu registres fent la correcci� de la data
                foreach ($temporals as $temporal) {

                    //Mirem que coincideixi el dia de la setmana
                    if ($temporal['dayofweek'] == $i) {
                        $registres[] = array('inici' => $temporal['inici'],
                            'final' => $temporal['final'],
                            'bid' => $temporal['bid'],
                            'usuari' => $temporal['usuari'],
                            'grup' => $temporal['grup'],
                            'dow' => $dies[$i - 1],
                            'temp' => $temporal['temp']);
                    }
                }

                //Reordenem la matriu de registres
                sort($registres);

                if (!empty($registres)) {
                    $nr = 0;
                    foreach ($registres as $registre) {
                        $registre['data'] = $registre['dow'];
                        $registre['inici'] = date('H:i', strtotime($registre['inici']));
                        $registre['final'] = date('H:i', strtotime($registre['final']));
                        $registre['usuari'] = ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $registre['usuari'],
                                    'sv' => ModUtil::func('IWmain', 'user', 'genSecurityValue'),
                                    'info' => 'ncc'));
                        $taula[$d][$nr] = $registre;
                        $nr++; //Incrementem l'�ndex de reserves del dia
                    }
                    $d++;  //Incrementem el dia
                }
            } // foreach $dies
            $this->view->assign('numdies', count($taula))
                    ->assign('record', $taula);
        } else { // format vertical
            //Creem la cap�alera de la taula amb els dies de la setmana i les dates
            $dies_data = array();
            foreach ($dies as $dia) {
                $i++;
                if ($i >= date("w")) {
                    $today = DateUtil::getDatetime_NextDay($i - date("w"), '%Y-%m-%d');
                } else {
                    $today = DateUtil::getDatetime_NextDay($i + 7 - date("w"), '%Y-%m-%d');
                }
                //$dies_data[$i-1]=DateUtil::formatDatetime($today,'%d/%m/%y');
            }
            //Generem les franges horàries amb les corresponents reserves
            $i = 0;
            $f = 0;
            foreach ($franges as $franja) {
                $horari[$i]['hi'] = substr($franja['hora'], 0, 5);
                $horari[$i]['hf'] = substr($franja['hora'], -5);
                $i++;
                $j = 0;
                $d = 0;

                foreach ($dies as $dia) {
                    $registre1 = array();
                    $j++;

                    //Afegim a la matriu registre1 les dades de les reserves temporals amb hores d'inici i final coincidents

                    foreach ($temporals as $temporal) {
                        //Mirem que coincideixi el dia de la setmana
                        if ($temporal['dayofweek'] == $j
                                && (date('H:i', strtotime($temporal['inici'])) == substr($franja['hora'], 0, 5))
                                && (date('H:i', strtotime($temporal['final'])) == substr($franja['hora'], -5))) {
                            $registre1 = array('inici' => $temporal['inici'],
                                'final' => $temporal['final'],
                                'bid' => $temporal['bid'],
                                'grup' => $temporal['grup'],
                                'temp' => $temporal['temp'],
                                'usuari' => ModUtil::func('IWmain', 'user', 'getUserInfo', array('uid' => $temporal['usuari'],
                                    'sv' => ModUtil::func('IWmain', 'user', 'genSecurityValue'),
                                    'info' => 'ncc')));
                        }
                    }//die();
                    $taula[$f][$d] = $registre1;
                    if (empty($registre1)) {
                        $taula[$f][$d]['usuari'] = " - ";
                    }
                    // Incrementem el dia de la setmana
                    // Increase the day of week
                    $d++;
                }
                // Passem a la seg�ent franja hor�ria
                // Next timeframe
                $f++;
            }
            $this->view->assign('franges', $franges)
                    ->assign('horari', $horari)
                    ->assign('record', $taula);
        }

        return $this->view->assign('vertical', $vertical)
                ->assign('sid', $sid)
                ->assign('dies', $dies)
                ->fetch('IWbookings_admin_taula.htm');
    }

    /*
      Funci� que retorna el formulari per a les assignacions temporals (permanents)
     */

    public function formulari_assigna($arg) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $dow = FormUtil::getPassedValue('dow', isset($args['dow']) ? $args['dow'] : null, 'GET');
        $period = FormUtil::getPassedValue('fh', isset($args['fh']) ? $args['fh'] : null, 'GET');

        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Es crida la funci� API que retorna les dades de l'espai que volem reservar
        $espai = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        if ($espai['mdid'] != 0) {
            //Busquem les franges hor�ries i les tornem en forma de matriu per un MultiSelect
            $franges = ModUtil::apiFunc('IWbookings', 'user', 'getall_hores_MS', array('mdid' => $espai['mdid']));
        }
        ($period >= 0) ? $period = $franges[$period]['id'] : $period = null;
        //Constru�m l'array dels dies per el formulari

        $dia = array(array('id' => '1', 'name' => $this->__('Monday')),
            array('id' => '2', 'name' => $this->__('Tuesday')),
            array('id' => '3', 'name' => $this->__('Wednesday')),
            array('id' => '4', 'name' => $this->__('Thursday')),
            array('id' => '5', 'name' => $this->__('Friday')));

        $hora = array(array('id' => '0', 'name' => '08'),
            array('id' => '1', 'name' => '09'),
            array('id' => '2', 'name' => '10'),
            array('id' => '3', 'name' => '11'),
            array('id' => '4', 'name' => '12'),
            array('id' => '5', 'name' => '13'),
            array('id' => '6', 'name' => '14'),
            array('id' => '7', 'name' => '15'),
            array('id' => '8', 'name' => '16'),
            array('id' => '9', 'name' => '18'),
            array('id' => '10', 'name' => '19'),
            array('id' => '11', 'name' => '20'),
            array('id' => '12', 'name' => '21'),
            array('id' => '13', 'name' => '22'));

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

        //Busquem la llista del professorat del centre
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        //Agafem els grups de la preperats per un MultiSelect
        $professorat = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('gid' => ModUtil::getVar('IWbookings', 'group'),
                    'sv' => $sv));
        sort($professorat);
        if (empty($professorat)) {
            return LogUtil::registerError($this->__('Permanent bookings are not possible as long as the group is empty. Please check module configuration'));
        }

        return $this->view->assign('dayofweek', $dow)
                ->assign('period', $period)
                ->assign('dayofweek1', $dow + 1)
                ->assign('franges', $franges)
                ->assign('dia', $dia)
                ->assign('hora', $hora)
                ->assign('minut', $minut)
                ->assign('sid', $sid)
                ->assign('professorat', $professorat)
                ->fetch('IWbookings_admin_assigna_frm.htm');
    }

    public function reserva($arg) {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $profe = FormUtil::getPassedValue('profe', isset($args['profe']) ? $args['profe'] : null, 'POST');
        $inici_h = FormUtil::getPassedValue('inici_h', isset($args['inici_h']) ? $args['inici_h'] : null, 'POST');
        $inici_m = FormUtil::getPassedValue('inici_m', isset($args['inici_m']) ? $args['inici_m'] : null, 'POST');
        $final_h = FormUtil::getPassedValue('final_h', isset($args['final_h']) ? $args['final_h'] : null, 'POST');
        $final_m = FormUtil::getPassedValue('final_m', isset($args['final_m']) ? $args['final_m'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');
        $period = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
        $finish_date = FormUtil::getPassedValue('date', isset($args['date']) ? $args['date'] : null, 'POST');

        $this->checkCsrfToken();

        $dies = array('',
            $this->__('Monday'),
            $this->__('Tuesday'),
            $this->__('Wednesday'),
            $this->__('Thursday'),
            $this->__('Friday'));

        // Comprovem que s'han complimentat el camp grup en el formulari
        if (empty($grup)) {
            LogUtil::registerError($this->__('You must specify a group'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }

        // Comprovem que s'han complimentat el camp usuari en el formulari
        if (empty($profe)) {
            LogUtil::registerError($this->__('You must specify a user for preferential booking'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }

        // Check if finsh_date is selected and is higger than actual date
        if (empty($finish_date)) {
            LogUtil::registerError($this->__('You must specify a finish date'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        } else {
            $finish_date = strtotime($finish_date);
            if ($finish_date < strtotime('today')) {
                LogUtil::registerError($this->__('Finish date is minnor than actual date'));
                System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
                return true;
            }
        }

        //Busquem l'hora i dia de la reserva i ho passem a format timestamp
        if ($dia >= date("w")) {
            $bookingDate = DateUtil::getDatetime_NextDay($dia - date("w"), '%Y-%m-%d');
        } else {
            $bookingDate = DateUtil::getDatetime_NextDay($dia + 7 - date("w"), '%Y-%m-%d');
        }

        if (empty($period)) {
            $start_hour = $inici_h . ':' . $inici_m;
            $end_hour = $final_h . ':' . $final_m;
        } else {
            $start_hour = DataUtil::formatForStore(substr($period, 0, 5));
            $end_hour = substr($period, -5);
        }

        //Check if start time period is minor than end time, otherwise triggers an error
        if ($start_hour >= $end_hour) {
            LogUtil::registerError($start_hour . $this->__('Finish time is earlier than start time') . $end_hour);
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }

        // Booking date and time
        $start = $bookingDate . " " . $start_hour;
        $end = $bookingDate . " " . $end_hour;

        //Check for booking disponibility.
        $occupied = ModUtil::apiFunc('IWbookings', 'admin', 'reservat', array('sid' => $sid,
                    'inici' => $start,
                    'final' => $end));

        if ($occupied) {
            //The requested booking isn't available
            LogUtil::registerError($this->__('Chosen time for preferential booking is occupied'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }
        // Insert booking into DB
        $success = ModUtil::apiFunc('IWbookings', 'admin', 'fer_reserva', array('sid' => $sid,
                    'inici' => $start,
                    'final' => $end,
                    'grup' => $grup,
                    'profe' => $profe,
                    'finish_date' => $finish_date));

        if (!$success) {
            // DB booking insertion hasn't worked properly
            //Hi ha hagut algun error a l'hora d'introduir la reserva a la BD
            LogUtil::registerError($this->__('Booking failed'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }
        System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
        return true;
    }

    public function anulla($arg) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

        if (!SecurityUtil::checkPermission('IWbookings::', '::', ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('You are not allowed to administrate the bookings'));
            System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
            return true;
        }

        //Sense m�s pre�mbuls eliminem la reserva de la base de dades
        $anullat = ModUtil::apiFunc('IWbookings', 'admin', 'anulla', array('bid' => $bid));

        if (!$anullat) {
            LogUtil::registerError($this->__('An error has occurred while deleting the register'));
            return true;
        }
        LogUtil::registerStatus($this->__('Preferential booking cancelled'));
        System::redirect(ModUtil::url('IWbookings', 'admin', 'assigna', array('sid' => $sid)));
        return true;
    }

    public function buida($args) {
        //Recollim els par�metres per poder fer l'esborrament de l'espai
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'REQUEST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $authid = FormUtil::getPassedValue('authid', isset($args['authid']) ? $args['authid'] : null, 'POST');

        //Cridem la funci� de l'API de l'usuari que ens retornar� la informaci� del
        //registre demanat
        $registre = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        if ($registre == false) {
            LogUtil::registerError($this->__('The room or equipment was not found'));
            System::redirect(ModUtil::url('IWbookings', 'user', 'assigna', array('sid' => $sid)));
            return true;
        }

        //Comprovaci� de seguretat
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('You are not allowed to administrate the bookings'));
            System::redirect(ModUtil::url('IWbookings', 'user', 'assigna', array('sid' => $sid)));
            return true;
        }

        //Demanem confirmaci� per l'esborrament del registre, si no s'ha demanat abans
        if (empty($confirmation)) {
            //Afegim el men� de l'administrador
            return $this->view->assign('nom_espai', $registre['space_name'])
                    ->assign('sid', $sid)
                    ->fetch('IWbookings_admin_emptyspace.htm');
        }

        $this->checkCsrfToken();

        //Cridem la funci� API que far� l'esborrament del registre
        if (ModUtil::apiFunc('IWbookings', 'admin', 'buida', array('sid' => $sid))) {
            //L'esborrament ha estat un �xit i ho notifiquem
            LogUtil::registerStatus($this->__('Table emptied'));
        }

        //Enviem a l'usuari a la taula d'espais i equipaments per reservar
        System::redirect(ModUtil::url('IWbookings', 'user', 'assigna', array('sid' => $sid)));
        //Retornem el valor true ja que l'esborrament ha estat possible
        return true;
    }

    public function deleteAllBookings() {
        ModUtil::apiFunc('IWbookings', 'admin', 'deleteAllBookings');
        System::redirect(ModUtil::url('IWbookings', 'admin', 'main'));

        return true;
    }

}