<?php

class IWtimeframes_Api_Admin extends Zikula_AbstractApi {

    public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWtimeframes', 'admin', 'newItem', array('m' => 'n')), 'text' => $this->__('Add new timeFrame'), 'id' => 'iwtimeframes_newItem', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWtimeframes', 'admin', 'main'), 'text' => $this->__('Show the timeFrames'), 'id' => 'iwtimeframes_main', 'class' => 'z-icon-es-view');
        }
        return $links;
    }

    public function create($args) {
        $nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'GET');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');

        //Argument opcional
        if (!isset($descriu)) {
            $descriu = '';
        }

        //Comprova que el nom del marc horari hagi arribat
        if ((!isset($nom_marc))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Comprovaciï¿œ de seguretat
        if (!SecurityUtil::checkPermission('IWtimeframes::', "$nom_marc::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }
        $item = array('nom_marc' => $nom_marc,
            'descriu' => $descriu);

        if (!DBUtil::insertObject($item, 'IWtimeframes_definition', 'mdid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.') . " nom_marc: " . $nom_marc);
        }

        // Return the id of the newly created item to the calling process
        return $item['mdid'];
    }

    public function update($args) {
        $nom_marc = FormUtil::getPassedValue('nom_marc', isset($args['nom_marc']) ? $args['nom_marc'] : null, 'GET');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

        //Comprovem que els valors han arribat
        if ((!isset($mdid)) || (!isset($nom_marc))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Carregem l'API de l'usuari per poder consultar les dades de l'espai que volem modificar
        if (!ModUtil::loadApi('IWtimeframes', 'user')) {
            return LogUtil::registerError($this->__('Error! Could not load module.'));
        }

        //Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'espai
        $registre = ModUtil::apiFunc('IWtimeframes', 'user', 'get', array('mdid' => $mdid));

        //Comprovem que la consulta anterior ha tornat amb resultats
        if (empty($registre)) {
            return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.'));
        }

        //Comprovacions de seguretat
        if (!SecurityUtil::checkPermission('IWtimeframes::', "$registre[nom_marc]::$mdid", ACCESS_EDIT)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'));
        }

        $where = "mdid=" . $mdid;
        $item = array('nom_marc' => $nom_marc,
            'descriu' => $descriu);

        if (!DBUtil::updateObject($item, 'IWtimeframes_definition', $where)) {
            return LogUtil::registerError($this->__('The modify of the frame time failed.') . "-" . $item['nom_marc']);
        }
        //Informem que el procï¿œs s'ha acabat amb ï¿œxit
        return true;
    }

    public function delete($args) {
        //$mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
        //$mode = FormUtil::getPassedValue('m', isset($args['m']) ? $args['m'] : null, 'POST');
        $mdid = $args['mdid'];
        $mode = $args['m'];

        //Comprovem que el parï¿œmetre id hagi arribat
        if (!isset($mdid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Carreguem l'API de l'usuari per carregar les dades del registre
        if (!ModUtil::loadApi('IWtimeframes', 'user')) {
            return LogUtil::registerError($this->__('Error! Could not load module.'));
        }

        //Cridem la funciï¿œ get que retorna les dades
        $registre = ModUtil::apiFunc('IWtimeframes', 'user', 'get', array('mdid' => $mdid));

        //Comprovem que el registre efectivament existeix i per tant, es podrï¿œ esborrar
        if (empty($registre)) {
            return LogUtil::registerError($this->__('Can not find the timeFrame over which do the action.') . " - " . $registre['nom_marc']);
        }

        //Comprovaciï¿œ de seguretat
        if (!SecurityUtil::checkPermission('IWtimeframes::', "$registre[nom_marc]::$mdid", ACCESS_DELETE)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'));
        }

        switch ($mode) {
            case 'all': //erase timetable and all the bookings referenced in IWbookings
                // falta esborrar totes les reserves
                if (ModUtil::apifunc('IWtimeframes', 'admin', 'installed', 'IWbookings')){
                    $where = "mdid = " . $mdid; 
                    $rs = array();
                    $rs = DBUtil::selectObjectArray('IWbookings_spaces', $where);
                    foreach ($rs as $item) {
                        DBUtil::deleteWhere('IWbookings', "sid=" . $item['sid']);
                    }
                }
            case 'keep': //keep bookings and reset timeframe
                if (ModUtil::apifunc('IWtimeframes', 'admin', 'installed', 'IWbookings')){
                    // Posem a 0 la referència al marc horari esborrat dels espais afectats
                    ModUtil::apiFunc('IWbookings', 'admin', 'reset_timeframe', $mdid);
                }

            //case 'noref': //delete: timetable
            //    DBUtil::deleteWhere('IWtimeframes_definition', "mdid=" . $mdid);
            //    DBUtil::deleteWhere('IWtimeframes', "mdid=" . $mdid);
        }
        // Esborrem el mac horari
        DBUtil::deleteWhere('IWtimeframes_definition', "mdid=" . $mdid);
        DBUtil::deleteWhere('IWtimeframes', "mdid=" . $mdid);
        //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
        return true;
    }

    // Check if a module is installed
    public function installed($module_name){
        $result = false;

        // Checks if module $module_name is installed.         
        $modid = ModUtil::getIdFromName($module_name);
        $modinfo = ModUtil::getInfo($modid);
        if ($modinfo['state'] == 3) {
            $result = true;
        }
        return $result;
    }

    // Comprova si el marc horari està sent utilitzat per algun espai de reserves
    public function referenced($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }
        if (ModUtil::apifunc('IWtimeframes', 'admin', 'installed', 'IWbookings')) {
            $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
            $tablename = 'IWbookings_spaces';
            $where = 'mdid = ' . $mdid;
            return (DBUtil::selectObjectCount($tablename, $where) > 0);
            //$n = DBUtil::selectObjectCount($tablename, $where);
        } else {
            return false;
            //$n = 0;
        }
        /* $modid = ModUtil::getIdFromName('IWbookings');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] > 1) {
            $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'POST');
            $tablename = 'IWbookings_spaces';
            $where = 'mdid = ' . $mdid;
            return (DBUtil::selectObjectCount($tablename, $where) > 0);
        } else {
            return false;
        }
         * 
         */
    }

    public function hasbookings($args) {
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null); //, 'GET');

        if (empty($mdid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $modid = ModUtil::getIdFromName('IWbookings');
        $modinfo = ModUtil::getInfo($modid);

        // chek if IWbookings module is installed -> state 2 or 3
        if ($modinfo['state'] > 1) {
            $pntables = DBUtil::getTables();
            $t1 = $pntables['IWbookings'];
            $t2 = $pntables['IWbookings_spaces'];
            $c1 = $pntables['IWbookings_column'];
            $c2 = $pntables['IWbookings_spaces_column'];

            $sql = "SELECT * "
                    . " FROM $t1 INNER JOIN $t2 ON $t1.$c1[sid] = $t2.$c2[sid] "
                    . " WHERE $t2.$c2[mdid]= " . $mdid;
            //$where = ""
            $result = DBUtil::executeSQL($sql);
            for ($nitems = -1; !$result->EOF; $result->MoveNext()) $nitems ++;             
            return ($nitems);
        } else {
            return false;
        }
    }

    // Verifica si una nova hora es superposa totalment o parcial amb alguna ja existent
    public function overlap($args) {
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
        $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
        $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
        $startf = date('H:i:s', strtotime($start));
        $endf = date('H:i:s', strtotime($end));

        // Obtain frame hours list sorted by start time
        $tablename = "IWtimeframes";
        $where = "mdid =" . $mdid;
        $orderby = 'hid';
        $items = DBUtil::selectObjectArray($tablename, $where, $orderby);

        foreach ($items as $item) {
            if ($item['hid'] <> $hid) {
                $itemStart = date('H:i:s', strtotime($item['start']));
                $itemEnd   = date('H:i:s', strtotime($item['end']));
                // coincideixen inici o final
                if (($startf == $itemStart) or ($endf == $itemEnd))
                    return true;
                // Coincideix en part o totalment amb una altra existent
                if ((($startf > $itemStart) and ($startf < $itemEnd)) or (($endf > $itemStart) and ($endf < $itemEnd)))
                    return true;
                // La nova hora engloba alguna altra existent
                if (($startf <= $itemStart) and ($endf >= $itemEnd))
                    return true;
            }
        }
        return false;
    }

    /*
      Funció que crea una nova hora per un marc horari
     */

    public function create_hour($args) {
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');
        $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : false, 'GET');
        $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : false, 'GET');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : '', 'GET');

        if (!($start & $end)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        } else {
            $item = array('mdid' => DataUtil::formatForStore($mdid),
                'start' => DataUtil::formatForStore($start),
                'end' => DataUtil::formatForStore($end),
                'descriu' => DataUtil::formatForStore($descriu));
            $tablename = "IWtimeframes";
            $idcolumn = 'hid';
            DBUtil::insertObject($item, $tablename, $idcolumn);
            return DBUtil::getInsertID($tablename, $idcolumn);
        }
    }

    public function delete_hour($args) {
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');

        //Comprovem que el parï¿œmetre id hagi arribat correctament
        if (!isset($hid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Carreguem l'API de l'usuari per carregar les dades del registre
        if (!ModUtil::loadApi('IWtimeframes', 'user')) {
            return LogUtil::registerError($this->__('Error! Could not load module.'));
        }

        DBUtil::deleteObjectByID('IWtimeframes', $hid, 'hid');

        //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
        return true;
    }

    public function update_hour($args) {
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');
        $start = FormUtil::getPassedValue('start', isset($args['start']) ? $args['start'] : null, 'GET');
        $end = FormUtil::getPassedValue('end', isset($args['end']) ? $args['end'] : null, 'GET');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'GET');

        //Comprovem que els valors han arribat
        if ((!isset($hid)) or (!isset($start)) or (!isset($end))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //Carregem l'API de l'usuari per poder consultar les dades de l'hora que volem modificar
        if (!ModUtil::loadApi('IWtimeframes', 'user')) {
            return LogUtil::registerError($this->__('Error! Could not load module.'));
        }

        //Cridem la funciï¿œ get de l'API que ens retornarï¿œ les dades de l'hora
        $registre = ModUtil::apiFunc('IWtimeframes', 'user', 'get_hour', array('hid' => $hid));

        //Comprovem que la consulta anterior ha tornat amb resultats
        if ($registre == false) {
            return LogUtil::registerError($this->__('Could not find the time over to do the action'));
        }

        //Comprovacions de seguretat
        if (!SecurityUtil::checkPermission('IWtimeframes::', "$registre[hora]::$hid", ACCESS_EDIT)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'));
        }

        $where = "hid=" . $hid;
        $item = array('start' => $start, 'end' => $end, 'descriu' => $descriu);
        $tablename = 'IWtimeframes';
        if (!DBUtil::updateObject($item, $tablename, $where)) {
            return LogUtil::registerError($this->__('The modify of the frame time failed.'));
        }

        return true;
    }

}