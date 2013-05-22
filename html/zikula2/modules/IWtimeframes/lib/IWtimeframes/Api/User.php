<?php
class IWtimeframes_Api_User extends Zikula_AbstractApi {
    public function getall($args) {
        //Comprovaciï¿œ de seguretat. Si falla retorna una matriu buida
        $registres = array();
        // Security check
        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_READ)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        $orderby = "nom_marc";
        $items = DBUtil::selectObjectArray('IWtimeframes_definition', '', $orderby, '-1', '-1', 'mdid');
        foreach ($items as $item) {
            $registres[] = array('mdid' => $item['mdid'],
                                 'nom_marc' => $item['nom_marc'],
                                 'descriu' => $item['descriu']);
        }
        //Retornem la matriu plena de registres
        return $registres;
    }

    public function get($args) {
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

        if (!SecurityUtil::checkPermission('IWtimeframes::', "::", ACCESS_READ)) {
            return LogUtil::registerError($this->__('Not authorized to manage timeFrames.'), 403);
        }

        if (!isset($mdid) || !is_numeric($mdid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = DBUtil::selectObjectByID('IWtimeframes_definition', $mdid, 'mdid');

        return $item;
    }

    public function getall_horari($args) {
        $mdid = FormUtil::getPassedValue('mdid', isset($args['mdid']) ? $args['mdid'] : null, 'GET');

        $registres = array();
        if (!SecurityUtil::checkPermission('IWtimeframes::', '::', ACCESS_READ)) {
            return $registres;
        }

        $orderby = "start";
        $items = DBUtil::selectObjectArray('IWtimeframes', 'mdid=' . $mdid, $orderby);
        foreach ($items as $item) {
            $registres[] = array('hid' => $item['hid'],
                                 'hora' => date('H:i', strtotime($item['start'])) . " - " . date('H:i', strtotime($item['end'])),
                                 'descriu' => $item['descriu']);
        }

        //Retornem la matriu plena de registres
        return $registres;
    }

    public function get_hour($args) {
        $hid = FormUtil::getPassedValue('hid', isset($args['hid']) ? $args['hid'] : null, 'GET');

        if (!isset($hid) || !is_numeric($hid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $tablename = 'IWtimeframes';
        $where = "hid =" . $hid;
        $item = DBUtil::selectObject($tablename, $where);

        if (!empty($item)) {
            return $item;
        } else {
            return false;
        }
    }
}