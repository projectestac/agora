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
class IWagendas_Api_Admin extends Zikula_AbstractApi {

    /**
     * Update the agenda information in the database
     *
     * @param array $args Agenda identity and values
     *
     * @return True if success and false otherwise
     */
    public function editAgenda($args) {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        // Get agenda information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        if ($item == false) {
            return LogUtil::registerError($this->__('Agenda not found'));
        }
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('IWagendas::', "::", ACCESS_READ)) {
            // Security check
            $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));
        }
        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_definition_column'];
        $where = "$c[daid] = $daid";
        if (!DBUTil::updateObject($items, 'IWagendas_definition', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Create a new agenda in database
     *
     * @param array $args Agenda identity and values
     *
     * @return True if success and false otherwise
     */
    public function create($args) {
        $nom_agenda = FormUtil::getPassedValue('nom_agenda', isset($args['nom_agenda']) ? $args['nom_agenda'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
        $tc1 = FormUtil::getPassedValue('tc1', isset($args['tc1']) ? $args['tc1'] : null, 'POST');
        $tc2 = FormUtil::getPassedValue('tc2', isset($args['tc2']) ? $args['tc2'] : null, 'POST');
        $tc3 = FormUtil::getPassedValue('tc3', isset($args['tc3']) ? $args['tc3'] : null, 'POST');
        $tc4 = FormUtil::getPassedValue('tc4', isset($args['tc4']) ? $args['tc4'] : null, 'POST');
        $tc5 = FormUtil::getPassedValue('tc5', isset($args['tc5']) ? $args['tc5'] : null, 'POST');
        $tc6 = FormUtil::getPassedValue('tc6', isset($args['tc6']) ? $args['tc6'] : null, 'POST');
        $op2 = FormUtil::getPassedValue('op2', isset($args['op2']) ? $args['op2'] : null, 'POST');
        $op3 = FormUtil::getPassedValue('op3', isset($args['op3']) ? $args['op3'] : null, 'POST');
        $op4 = FormUtil::getPassedValue('op4', isset($args['op4']) ? $args['op4'] : null, 'POST');
        $op5 = FormUtil::getPassedValue('op5', isset($args['op5']) ? $args['op5'] : null, 'POST');
        $op6 = FormUtil::getPassedValue('op6', isset($args['op6']) ? $args['op6'] : null, 'POST');
        $activa = FormUtil::getPassedValue('activa', isset($args['activa']) ? $args['activa'] : null, 'POST');
        $adjunts = FormUtil::getPassedValue('adjunts', isset($args['adjunts']) ? $args['adjunts'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
        $color = FormUtil::getPassedValue('color', isset($args['color']) ? $args['color'] : null, 'POST');
        $gCalendarId = FormUtil::getPassedValue('gCalendarId', isset($args['gCalendarId']) ? $args['gCalendarId'] : '', 'POST');
        $gAccessLevel = FormUtil::getPassedValue('gAccessLevel', isset($args['gAccessLevel']) ? $args['gAccessLevel'] : '', 'POST');
        $gColor = FormUtil::getPassedValue('gColor', isset($args['gColor']) ? $args['gColor'] : '', 'POST');
        $resp = FormUtil::getPassedValue('resp', isset($args['resp']) ? $args['resp'] : '', 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('IWagendas::', "::", ACCESS_READ) || $gCalendarId == '') {
            // Security check
            $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));
        }

        // Needed argument
        if (!isset($nom_agenda)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // optional arguments
        if (!isset($descriu))
            $descriu = '';
        $item = array('nom_agenda' => $nom_agenda,
            'descriu' => $descriu,
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'c5' => $c5,
            'c6' => $c6,
            'tc1' => $tc1,
            'tc2' => $tc2,
            'tc3' => $tc3,
            'tc4' => $tc4,
            'tc5' => $tc5,
            'tc6' => $tc6,
            'op2' => $op2,
            'op3' => $op3,
            'op4' => $op4,
            'op5' => $op5,
            'op6' => $op6,
            'activa' => $activa,
            'adjunts' => $adjunts,
            'protegida' => $protegida,
            'color' => $color,
            'gCalendarId' => $gCalendarId,
            'gAccessLevel' => $gAccessLevel,
            'gColor' => $gColor,
            'resp' => $resp);
        if (!DBUtil::insertObject($item, 'IWagendas_definition', 'daid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $item['daid'];
    }

    /**
     * Delete an agenda in the data base and all the information associated with the agenda
     *
     * @param array $args Agenda identity
     *
     * @return True if success and false otherwise
     */
    public function delete($args) {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        //Get form information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        if ($item == false) {
            LogUtil::registerError($this->__('Agenda not found'));
        }
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv)) || !SecurityUtil::checkPermission('IWagendas::', "::", ACCESS_READ) || $item['resp'] != '$$' . UserUtil::getVar('uid') . '$') {
            // Security check
            $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));
        }
        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        if (!DBUtil::deleteObjectByID('IWagendas_definition', $daid, 'daid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWagendas');
        $view->clear_cache(null, $daid);
        //delete the anotations insert in this agenda
        $pntables = DBUtil::getTables();
        $c = $pntables['IWagendas_column'];
        $where = "$c[daid]=$daid";
        if (!DBUtil::deleteWhere('IWagendas', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        //delete the subscriptions to this agenda
        $c = $pntables['IWagendas_subs_column'];
        $where = "$c[daid]=$daid";
        if (!DBUtil::deleteWhere('IWagendas_subs', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        return true;
    }

    public function getlinks($args) {
        $links = array();
        if (SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWagendas', 'admin', 'newItem'), 'text' => $this->__('Add a new agenda'), 'id' => 'iwagendas_newItem', 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWagendas', 'admin', 'main'), 'text' => $this->__('Show existing agendas'), 'id' => 'iwagendas_main', 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWagendas', 'admin', 'configura'), 'text' => $this->__('Module configuration'), 'id' => 'iwagendas_conf', 'class' => 'z-icon-es-config');
        }
        return $links;
    }

}
