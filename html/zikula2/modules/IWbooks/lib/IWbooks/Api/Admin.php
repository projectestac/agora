<?php

class IWbooks_Api_Admin extends Zikula_AbstractApi {

    public function create($args) {
        $item = FormUtil::getPassedValue('item');
        $item[etapa] = implode("|", $item[etapa]);

        if (!isset($item['lectura']))
            $item['lectura'] = 0;

        if (!isset($item['optativa']))
            $item['optativa'] = 0;

        if (!SecurityUtil::checkPermission('IWbooks::Item', "$autor::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $result = DBUtil::insertObject($item, 'IWbooks', 'tid');
        if (!$result) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        return $item['tid'];
    }

    // Esborrar llibre
    public function delete($args) {
        extract($args);

        if (!isset($tid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get', array('tid' => $tid));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! Book not found.'));
        }

        if (!SecurityUtil::checkPermission('IWbooks::Item', "$item[etapa]::$tid", ACCESS_DELETE)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!DBUtil::deleteObjectByID('IWbooks', $tid, 'tid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

// Actualitzar llibre
    public function update($args) {
        extract($args);

        $item = FormUtil::getPassedValue('item');
        $item[etapa] = implode("|", $item[etapa]);

        if (!isset($item['lectura'])) {
            $item['lectura'] = 0;
        }
        if (!isset($item['optativa'])) {
            $item['optativa'] = 0;
        }

        if (!SecurityUtil::checkPermission('IWbooks::Item', "$autor::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $result = DBUtil::updateObject($item, 'IWbooks', '', 'tid');

        if (!$result) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        return $item['tid'];
    }

// Crear nova matèria
    public function create_mat($args) {
        //print_r ($args);
        $item = FormUtil::getPassedValue('item');

        if (!SecurityUtil::checkPermission('IWbooks::', "$item[materia]::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //$result = DBUtil::insertObject ($item, 'materies', 'tid');
        $result = DBUtil::insertObject($item, 'IWbooks_materies', 'tid');

        if (!$result) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['tid'];
    }

    // Esborrar matèria
    public function delete_mat($args) {
        extract($args);

        if (!isset($tid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get_mat', array('tid' => $tid));

        if ($item == false) {
            return LogUtil::registerError($this->__('Error! Book not found.'));
        }

        if (!SecurityUtil::checkPermission('IWbooks::Item', "$item[name]::$tid", ACCESS_DELETE)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!DBUtil::deleteObjectByID('IWbooks_materies', $tid, 'tid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

// Actualitzar matèria
    public function update_mat($args) {
        extract($args);

        $item = FormUtil::getPassedValue('item');


        if (!SecurityUtil::checkPermission('IWbooks::', "$item[materia]::$item[tid]", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $result = DBUtil::updateObject($item, 'IWbooks_materies', '', 'tid');

        if (!$result) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return $item['tid'];
    }

}