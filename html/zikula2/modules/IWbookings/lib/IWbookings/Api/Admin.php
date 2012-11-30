<?php

class IWbookings_Api_Admin extends Zikula_AbstractApi {

    public function create($args) {
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
        $nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'GET');
        $actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'GET');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'GET');
        $vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');

        // Argument optional
        if (!isset($descriu)) {
            $descriu = '';
        }

        //Check space o equipment name is set
        if ((!isset($args['nom_espai']))) {
            throw new Zikula_Exception_Forbidden($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $item = array('space_name' => $nom_espai,
            'active' => $actiu,
            'mdid' => $mdid,
            'description' => $descriu,
            'color' => $color,
            'vertical' => $vertical);


        if (!DBUtil::insertObject($item, 'IWbookings_spaces', 'sid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['sid'];
    }

    /*
      Update or modify space or equipment info
     */

    public function update($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $nom_espai = FormUtil::getPassedValue('nom_espai', isset($args['nom_espai']) ? $args['nom_espai'] : null, 'GET');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
        $actiu = FormUtil::getPassedValue('actiu', isset($args['actiu']) ? $args['actiu'] : null, 'GET');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'GET');
        $vertical = FormUtil::getPassedValue('vertical', isset($args['vertical']) ? $args['vertical'] : null, 'GET');

        //Check params
        if ((!isset($sid)) ||
                (!isset($nom_espai))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Check valid space
        $exist = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        //Comprovem que la consulta anterior ha tornat amb resultats
        if ($exist == false) {
            return LogUtil::registerError($this->__('The room or equipment was not found'));
        }

        //Comprovacions de seguretat
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        $where = "sid = " . $sid;
        $item = array('space_name' => $nom_espai,
            'description' => $descriu,
            'active' => $actiu,
            'mdid' => $mdid,
            'vertical' => $vertical,
            'color' => $color);

        if (!DBUTil::updateObject($item, 'IWbookings_spaces', $where)) {
            return LogUtil::registerError($this->__('An error has occurred while modifying the room or equipment'));
        }

        //Informem que el proc�s s'ha acabat amb �xit
        return true;
    }

    public function delete($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        //Comprovem que el par�metre identitat hagi arribat
        if (!isset($sid) || !is_numeric($sid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Check if space exist
        $exist = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));
        if ($exist == false) {
            LogUtil::registerError($this->__('The room or equipment was not found'));
        }

        // Delete record
        if (!DBUtil::deleteObjectByID('IWbookings_spaces', $sid, 'sid')) {
            return LogUtil::registerError($this->__('An error has occurred while deleting the register'));
        }

        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWbookings');
        $view->clear_cache(null, $sid);

        //delete the anotations insert in this agenda
        $pntables = DBUtil::getTables();

        $c = $pntables['IWbookings_column'];
        $where = "$c[sid]=$sid";
        if (!DBUtil::deleteWhere('IWbookings', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    // Check if a module is installed
    public function check_module($module_name){
        $result = false;

        // Checks if module $module_name is installed.         
        $modid = ModUtil::getIdFromName($module_name);
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3) {
            $result = true;
        }
        return $result;
    }
    
    // Retorna un array amb els noms de marc
    public function marcs() {
        //Comprovaci� de seguretat. Si falla retorna una matriu buida
        $regs = array();

        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        if (ModUtil::apiFunc('IWbookings', 'admin','check_module','IWtimeframes')) {
            $items = DBUtil::selectObjectArray('IWtimeframes_definition', '', 'nom_marc');
            $regs[] = array('id' => '0', 'name' => '');
            foreach ($items as $item) {
                $regs[] = array('id' => $item['mdid'], 'name' => $item['nom_marc']);
            }
        }
        return $regs;
    }

    /*
     * Retorna cert si un espai é reserves
     */
    public function hasbookings($sid) {

        if (empty($sid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntables = DBUtil::getTables();
        $c = $pntables['IWbookings_column'];
        $where = "WHERE $c[sid]=".DataUtil::formatForStore($sid);

        return ((DBUtil::selectObjectCount('IWbookings', $where))>0);
    }

    // Retorna el nom d'un marc per un determinat $id
    public function nom_marc($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        
        // Checks if module IWtimeframes is installed. 
        if (ModUtil::apiFunc('IWbookings', 'admin','check_module','IWtimeframes')) {
            $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
            $name = DBUtil::selectField('IWtimeframes_definition', 'nom_marc', 'mdid =' . $mdid);
     
            if (empty($name)) { // EL marc horari referenciat no existeix              
                // Actualitzar la informació relativa dels espais 
                ModUtil::apiFunc('IWbookings', 'admin','reset_timeframe',$mdid); 
            }
            return $name;
        }         
    }

    /*
     * Funció per restablir a 0 la referència al marc horari d'un espai
     * Això és necessari quan el marc associat a l'espai s'ha esborrat
     * @id: identificador del marc horari
     */
    public function reset_timeframe($id){
        // Seleccionar tots els espais que facin referència al marc $id i canviar el valor a 0
        $pntables = pnDBGetTables();
        $c = $pntables['IWbookings_spaces_column'];
        $obj = array('mdid' => 0);
        $where    = "WHERE $c[mdid]=".DataUtil::formatForStore($id);
        DBUTil::updateObject ($obj, 'IWbookings_spaces', $where);
    }
    
    /*
      Funci� per comprovar si un espai est� ocupat en el moment que es fa una reserva temporal.
      Si l'espai est� acupat retorna dades i sin� retorna una variable buida
     */

    public function reservat($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $start = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
        $end = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'GET');

        $startTime = date('H:i:s', strtotime($start));
        $endTime = date('H:i:s', strtotime($end));

        //Comprovaci� de seguretat. Si falla retorna una matriu buida
        if (!SecurityUtil::checkPermission('IWbookings::', '::', ACCESS_READ)) {
            return $registres;
        }

        // Get day of week
        $dow = date("w", DateUtil::makeTimeStamp($start));

        $pntable = DBUtil::getTables();
        $c = $pntable['IWbookings_column'];

        $where = " WHERE $c[sid]= '" . DataUtil::formatForStore($sid) . "' AND $c[dayofweek]= '" . DataUtil::formatForStore($dow) . "'
			AND ((DATE_FORMAT($c[start], '%H:%i:%s') >= '" . DataUtil::formatForStore($startTime) . "' 
			AND DATE_FORMAT($c[start], '%H:%i:%s')<'" . DataUtil::formatForStore($endTime) . "')
			OR (DATE_FORMAT($c[end],   '%H:%i:%s') > '" . DataUtil::formatForStore($startTime) . "' 
			AND DATE_FORMAT($c[end],   '%H:%i:%s') <='" . DataUtil::formatForStore($endTime) . "')
			OR (DATE_FORMAT($c[start], '%H:%i:%s')<'" . DataUtil::formatForStore($startTime) . "' 
			AND DATE_FORMAT($c[end],   '%H:%i:%s')>'" . DataUtil::formatForStore($endTime) . "'))
			AND $c[cancel]=0";

        $items = DBUtil::selectObjectCount('IWbookings', $where);

        return $items;
    }

    /*
      Funci� que fa una reserva temporal a la base da dades
     */

    public function fer_reserva($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'GET');
        $final = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'GET');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'GET');
        $profe = FormUtil::getPassedValue('profe', isset($args['profe']) ? $args['profe'] : null, 'GET');
        $finish_date = FormUtil::getPassedValue('finish_date', isset($args['finish_date']) ? $args['finish_date'] : null, 'GET');

        //Comprova que la identitat de l'espai de reserva efectivament hagi arribat
        if ((!isset($sid))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Get day of week
        $dow = date("w", DateUtil::makeTimeStamp($inici));
        // Do a booking for every week until finish date
        $i = 0;
        while ((strtotime($inici . ' + ' . $i . ' weeks')) <= (strtotime(date('d-m-Y', $finish_date) . ' + 24 hours'))) {
            $item = array('sid' => $sid,
                'user' => $profe,
                'usrgroup' => $grup,
                'start' => date('Y-m-d H:i:s', strtotime($inici . ' + ' . $i . ' weeks')),
                'end' => date('Y-m-d H:i:s', strtotime($final . ' + ' . $i . ' weeks')),
                'dayofweek' => $dow,
                'temp' => 0);
            if (!DBUtil::insertObject($item, 'IWbookings', 'bid')) {
                LogUtil::registerError($this->__('Error! Creation attempt failed.'));
                return false;
            }
            $i++;
        }

        // Return the id of the last created item to the calling process
        return $item['bid'];
    }

    /*
      Funci� que anul�la una reserva temporal de la base de dades
     */

    public function anulla($args) {
        $bid = FormUtil::getPassedValue('bid', isset($args['bid']) ? $args['bid'] : null, 'GET');

        //Comprovem que el par�metre id efectivament hagi arribat
        if (!isset($bid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return false;
        }

        //Comprovaci� de seguretat
        if (!SecurityUtil::checkPermission('IWbookings::', '::', ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('You are not allowed to administrate the bookings'));
            return false;
        }

        if (!DBUtil::deleteObjectByID('IWbookings', DataUtil::formatForStore($bid), 'bid')) {
            return false;
        } else {
            //Retornem true ja que el proc�s ha finalitzat amb �xit
            return true;
        }
    }

    /*
      Funci� que esborra un espai o equipament de reserva de la base de dades
     */

    public function buida($args) {
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'POST');

        //Comprovem que el par�metre id efectivament hagi arribat
        if (!isset($sid)) {
            LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
            return false;
        }

        //Cridem la funci� get que retorna les dades
        $link = ModUtil::apiFunc('IWbookings', 'user', 'get', array('sid' => $sid));

        //Comprovem que el registre efectivament existeix i, per tant, es podr� esborrar
        if ($link == false) {
            LogUtil::registerError($this->__('The room or equipment was not found'));
            return false;
        }

        //Comprovaci� de seguretat
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('You are not allowed to administrate the bookings'));
            return false;
        }

        $pntables = DBUtil::getTables();
        $c = $pntables['IWbookings_column'];
        $where = "WHERE $c[sid]=" . $sid;
        if (!DBUtil::deleteWhere('IWbookings', $where)) {
            return false;
        } else {
            //Retornem true ja que el proc�s ha finalitzat amb �xit
            return true;
        }
    }

    //Funci� que esborra totes les reserves i deixa buides les taules
    public function deleteAllBookings() {
        //Comprovaci� de seguretat
        if (!SecurityUtil::checkPermission('IWbookings::', "::", ACCESS_ADMIN)) {
            LogUtil::registerError($this->__('You are not allowed to administrate the bookings'));
            return false;
        }
        DbUtil::deleteWhere('IWbookings', 'true');

        // Success
        return true;
    }

    public function getlinks($args) {
        $func = FormUtil::getPassedValue('func', isset($args['func']) ? $args['func'] : null, 'GET');
        $sid = FormUtil::getPassedValue('sid', isset($args['sid']) ? $args['sid'] : null, 'GET');
        $links = array();
        if (SecurityUtil::checkPermission('IWbookings::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWbookings', 'admin', 'newItem', array('m' => 'n')), 'text' => $this->__('Add a new booking'), 'id' => 'iwbookings_newItem', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWbookings', 'admin', 'main'), 'text' => $this->__('Show rooms and equipment bookings'), 'id' => 'iwbookings_main', 'class' => 'z-icon-es-view');
            if ($func == 'assigna') {
                $links[] = array('url' => ModUtil::url('IWbookings', 'admin', 'buida', array('sid' => $sid)), 'text' => $this->__('Empty table'), 'id' => 'iwbookings_buida', 'class' => 'z-icon-es-config');
            }
            $links[] = array('url' => ModUtil::url('IWbookings', 'admin', 'conf'), 'text' => $this->__('Module configuration'), 'id' => 'iwbookings_conf', 'class' => 'z-icon-es-config');
        }
        return $links;
    }

}