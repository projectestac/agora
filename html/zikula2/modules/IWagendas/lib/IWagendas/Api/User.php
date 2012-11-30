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

class IWagendas_Api_User extends Zikula_AbstractApi
{
    /**
     * Get all agendas information
     *
     * @param array $args Form identity and values
     *
     * @return True if success and false otherwise
     */
    public function getAllAgendas($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $gAgendas = FormUtil::getPassedValue('gAgendas', isset($args['gAgendas']) ? $args['gAgendas'] : null, 'POST');
        $onlyShared = FormUtil::getPassedValue('onlyShared', isset($args['onlyShared']) ? $args['onlyShared'] : null, 'POST');
        $gCalendarsIdsArray = FormUtil::getPassedValue('gCalendarsIdsArray', isset($args['gCalendarsIdsArray']) ? $args['gCalendarsIdsArray'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_definition_column'];
        $where = ($onlyShared == 1) ? "$c[gCalendarId] = ''" : "";
        if ($gAgendas != null) {
            $where = "(";
            foreach ($gCalendarsIdsArray as $g) {
                $where .= "$c[gCalendarId] = '$g' OR ";
            }
            $where = substr($where, 0, -3);
            $where .= ") OR (";
            // to avoid where = '' in case $onlyShared is defined
            $where .= "$c[gCalendarId] <> '' AND $c[resp] LIKE '%$" . UserUtil::getVar('uid') . "$%')";
        }
        $orderby = "$c[nom_agenda]";
        $items = DBUtil::selectObjectArray('IWagendas_definition', $where, $orderby, '-1', '-1', 'daid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * get an agenda information
     *
     * @param array $args Agenda identity
     *
     * @return An array with the agenda information
     */
    public function getAgenda($args)
    {
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = DBUtil::selectObjectByID('IWagendas_definition', $daid, 'daid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get all the notes in the agenda for a specific period
     *
     * @param array $args Events for the month
     *
     * @return An array with the agenda notations information for the month
     */
    public function getEvents($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
        $month = FormUtil::getPassedValue('month', isset($args['month']) ? $args['month'] : null, 'POST');
        $year = FormUtil::getPassedValue('year', isset($args['year']) ? $args['year'] : null, 'POST');
        $day = FormUtil::getPassedValue('day', isset($args['day']) ? $args['day'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $final = FormUtil::getPassedValue('final', isset($args['final']) ? $args['final'] : null, 'POST');

        $notlogedin = '';
        
        if ($inici == null || $final == null || $inici == '' || $final == '') {
            $inici = mktime(0, 0, 0, $month, 1, $year);
            //Calc the number of days of the month
            $nDays = date("t", $inici);
            $final = mktime(23, 59, 59, $month, $nDays, $year);
        }
        if (isset($day) && is_numeric($day) && $day != 0) {
            $inici = mktime(0, 0, 0, $month, $day, $year);
            $final = mktime(23, 59, 59, $month, $day, $year);
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $orderby = "$c[data], $c[totdia] desc";
        if ($daid == 0) {
            // personal agenda
            $uid = (!UserUtil::isLoggedIn()) ? '-1' : UserUtil::getVar('uid');
            $where = "$c[data] BETWEEN $inici AND $final AND (($c[usuari]=$uid AND $c[daid]=0)";
            // Get the data of all the agendes
            $registres = ModUtil::apiFunc('IWagendas', 'user', 'getAllAgendas');
            //Check if the user has access to the agendas. If true insert the agenda id into an array
            $agendas = array();
            foreach ($registres as $registre) {
                // Check whether the user can access the agenda
                $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                           array('daid' => $registre['daid'],
                            'grup' => $registre['grup'],
                            'resp' => $registre['resp'],
                            'activa' => $registre['activa']));

                if ($te_acces > 0 && $registre['activa'] == 1) {
                    array_push($agendas, $registre['daid']);
                }
            }
            //get agendas where the user is enroled
            if (UserUtil::isLoggedIn()) {
                $subscriptions = ModUtil::apiFunc('IWagendas', 'user', 'getUserSubscriptions');
            } else {
                $subscriptions = $agendas;
                $notlogedin = " AND $c[deleted]=0";
            }
            $subsArray = array();
            foreach ($subscriptions as $subs) {
                $daidValue = (UserUtil::isLoggedIn()) ? $subs['daid'] : $subs;
                array_push($subsArray, $daidValue);
            }
            //Makes an array intersection of the two arrays. User has access and he/she is subscribed
            $agendasArray = array_intersect($subsArray, $agendas);
            //for each subscription include a condition in where string
            $subsString = '';
            foreach ($agendasArray as $a) {
                $subsString .= " OR ($c[daid]=$a AND $c[completa]=0 AND $c[deletedByUser] NOT LIKE '%$" . $uid . "$%'" . $notlogedin . ")";
            }
            $where .= $subsString . ")";
        } else {
            //Agenda compartida
            $where = "$c[data] BETWEEN $inici AND $final AND $c[daid]=$daid AND $c[deleted]=0";
        }
        $items = DBUtil::selectObjectArray('IWagendas', $where, $orderby, '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get all the agendas where the user is subscribed
     *
     * @return An array with agendas where the user is subscribed
     */
    public function getUserSubscriptions($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        if (!UserUtil::isLoggedIn()) {
            return $items;
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $where = "$c[uid]=$uid AND $c[daid]<>0 AND ($c[donadabaixa]=-1 OR $c[donadabaixa]=-2)";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //return the items
        return $items;
    }

    /**
     * set the last visit type to the user in the agenda
     *
     * @param array $args Agenda identity
     *
     * @return True if success and false otherwise
     */
    public function vista($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
        $vista = FormUtil::getPassedValue('vista', isset($args['vista']) ? $args['vista'] : -1, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $where = "$c[uid]=$uid AND $c[daid]=$daid";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        if (count($items) == 0) {
            $item = array('daid' => $daid,
                          'uid' => $uid,
                          'llistat' => $vista);
            if (!DBUtil::insertObject($item, 'IWagendas_subs', 'said')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
        } else {
            $item = array('llistat' => $vista);
            $where = "$c[daid]=$daid AND $c[uid]=$uid";
            if (!DBUTil::updateObject($item, 'IWagendas_subs', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /**
     * delete the notes older than a specific date
     *
     * @param array $args Agenda identity
     *
     * @return True if success and false otherwise
     */
    public function esborraantigues($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');
        $antigues = FormUtil::getPassedValue('antigues', isset($args['antigues']) ? $args['antigues'] : 0, 'POST');

        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $items['daid']));
        // If the user has no access, show an error message and stop execution
        if ($te_acces < 4) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $antiguestimestamp = mktime(0, 0, 0, substr($antigues, 3, 2), substr($antigues, 0, 2), substr($antigues, 6, 4));
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        if ($daid == 0) {
            $uid = UserUtil::getVar('uid');
            $where = "$c[data]<=$antiguestimestamp AND $c[daid]=0 AND $c[usuari]=$uid";
        } else {
            $where = "$c[data]<=$antiguestimestamp AND $c[daid]=$daid";
        }
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        foreach ($items as $item) {
            //get item values
            $note = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $item['aid']));
            if (!DBUtil::deleteObjectByID('IWagendas', $item['aid'], 'aid')) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
            if ($note['fitxer'] != "") {
                $folder = ModUtil::getVar('IWagendas', 'urladjunts');
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $delete = ModUtil::func('IWmain', 'user', 'deleteFile',
                                         array('sv' => $sv,
                                               'folder' => $folder,
                                               'fileName' => $note['fitxer']));
            }
        }

        return true;
    }

    /**
     * Delete the caducied anotations of the agendas
     *
     * @return True if success and false otherwise
     */
    public function esborra_caducades()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $caducadies = ModUtil::getVar('IWagendas', 'caducadies');
        $datacaducades = time() - $caducadies * 60 * 60 * 24;
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[protegida]=0 AND $c[data]<=$datacaducades";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        foreach ($items as $item) {
            //get item values
            $note = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $item['aid']));
            if (!DBUtil::deleteObjectByID('IWagendas', $item['aid'], 'aid')) {
                return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
            }
            if ($note['fitxer'] != "") {
                $folder = ModUtil::getVar('IWagendas', 'urladjunts');
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $delete = ModUtil::func('IWmain', 'user', 'deleteFile',
                                         array('sv' => $sv,
                                               'folder' => $folder,
                                               'fileName' => $note['fitxer']));
            }
        }

        return true;
    }

    /**
     * Set new anotations to 0
     *
     * @param array $args Mounth and year visited
     *
     * @return True if success and false otherwise
     */
    public function novesa0($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');

        // Needed argument
        if (!isset($mes) || !is_numeric($mes) || !isset($any) || !is_numeric($any)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $inici = mktime(0, 0, 0, $mes, 1, $any);
        $final = mktime(23, 59, 59, $mes, 31, $any);
        $uid = UserUtil::getVar('uid');
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[data] BETWEEN $inici AND $final AND $c[nova] LIKE '%$" . $uid . "$%'";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        foreach ($items as $item) {
            $new = str_replace('$' . $uid . '$', '', $item['nova']);
            $itemUpdated = array('nova' => $new);
            $where = "$c[aid]=" . $item['aid'];
            if (!DBUTil::updateObject($itemUpdated, 'IWagendas', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /**
     * Get user tasks
     *
     * @param array $args Mounth and year visited
     *
     * @return An array with all the tasks
     */
    public function getalltasques($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');

        // Needed argument
        if (!isset($mes) || !is_numeric($mes) || !isset($any) || !is_numeric($any)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $inici = mktime(0, 0, 0, $mes, 1, $any);
        $final = mktime(23, 59, 59, $mes, 31, $any);
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $uid = UserUtil::getVar('uid');
        $where = "($c[data] BETWEEN $inici AND $final AND $c[tasca]=1 AND $c[usuari]=$uid) OR ($c[data]<$inici AND $c[completa]=0 AND $c[tasca]=1 AND $c[usuari]=$uid)";
        $orderby = '';
        $items = DBUtil::selectObjectArray('IWagendas', $where, $orderby, '-1', '-1', 'daid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * set the avertisement about automatic subscriptions
     *
     * @return An array with all the tasks
     */
    public function treuavis()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $item = array('donadabaixa' => -1);
        $where = "$c[donadabaixa]=-2 AND $c[uid]=$uid";
        if (!DBUTil::updateObject($item, 'IWagendas_subs', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * get the number of anotacions in an agenda
     *
     * @param array $args The agenda identity
     *
     * @return The number of anotations
     */
    public function comptanotes($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $uid = UserUtil::getVar('uid');
        $where = ($daid == 0) ? "$c[usuari]=$uid AND $c[daid]=0" : "$c[daid]=$daid";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return count($items);
    }

    /**
     * Increase the number of advertisements of that there are too much anotations in the agenda
     *
     * @param array $args The agenda identity and the avertissements now
     *
     * @return True if success and false otherwise
     */
    public function pujaavis($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $value = FormUtil::getPassedValue('value', isset($args['value']) ? $args['value'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $item = array('avisos' => $value);
        $where = "$c[daid]=$daid AND $c[uid]=$uid";
        if (!DBUTil::updateObject($item, 'IWagendas_subs', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Get the number of times that the user has been advertised about that there are too much anotations in the agenda
     *
     * @param array $args The agenda identity
     *
     * @return The number of times
     */
    public function avislimits($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $where = "$c[daid]=$daid AND $c[uid]=$uid";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'daid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the value
        if (isset($items[0]['avisos'])) {
            return $items[0]['avisos'];
        } else {
            return '';
        }
    }

    /**
     * get the subscription status into an agenda
     *
     * @param array $args The agenda identity
     *
     * @return True if the user is subscribed and false otherwise
     */
    public function iosubs($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');

        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                    array('daid' => $daid));
        if ($agenda == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid,
                                         'grup' => $agenda['grup'],
                                         'resp' => $agenda['resp'],
                                         'activa' => $agenda['activa']));
        // If the user has no access, show an error message and stop execution
        if ($te_acces == 0) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $where = "$c[daid]=$daid AND $c[uid]=$uid AND ($c[donadabaixa]=-1 OR $c[donadabaixa]=-2)";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //retornem el valor adequat
        if (count($items) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the visualitation type for the user in the agenda
     *
     * @param array $args The agenda identity
     *
     * @return The visual method
     */
    public function getvista($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : 0, 'POST');

        // Needed argument
        if (!isset($daid) || !is_numeric($daid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $uid = UserUtil::getVar('uid');
        $where = "$c[daid]=$daid AND $c[uid]=$uid";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'daid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //retornem el valor adequat
        if (isset($items[$daid]['llistat'])) {
            return $items[$daid]['llistat'];
        } else {
            return false;
        }
    }

    /**
     * Edit a note information
     *
     * @param array $args Agenda identity
     *
     * @return True if success and false otherwise
     */
    public function editNote($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
        $items = FormUtil::getPassedValue('items', isset($args['items']) ? $args['items'] : null, 'POST');
        $rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');

        // Needed argument
        if (!isset($daid) || !is_numeric($daid) || !isset($aid) || !is_numeric($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $aid));
        if ($anotacio == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid));
        // If the user has no access, show an error message and stop execution
        if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = ($rid == null) ? "$c[aid]=$aid" : "$c[rid]=$rid";
        if (!DBUTil::updateObject($items, 'IWagendas', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Get the information of a note
     *
     * @param array $args Note identity
     *
     * @return Array with the note information
     */
    public function get($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');

        // Needed argument
        if (!isset($aid) || !is_numeric($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = DBUtil::selectObjectByID('IWagendas', $aid, 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //check if user can acces the note
        if ($items['daid'] != 0) {
            //get the agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                        array('daid' => $items['daid']));
            if ($agenda == false) {
                return LogUtil::registerError($this->__('Event not found'));
            }
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $items['daid'],
                                             'grup' => $agenda['grup'],
                                             'resp' => $agenda['resp'],
                                             'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces == 0) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        }
        // Return the items
        return $items;
    }

    /**
     * Set new anotations to 0
     *
     * @param array $args Month and year visited
     *
     * @return True if success and false otherwise
     */
    public function deleteRepesInUser($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');

        // Needed argument
        if (!isset($rid) || !is_numeric($rid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $uid = UserUtil::getVar('uid');
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[rid] = $rid";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        foreach ($items as $item) {
            $where = "$c[aid]=$item[aid]";
            $deletedByUser = ($item['deletedByUser'] == '') ? '$' : $item['deletedByUser'];
            $deletedByUser .= '$' . $uid . '$';
            $items = array('deletedByUser' => $deletedByUser);
            if (!DBUTil::updateObject($items, 'IWagendas', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /**
     * Delete a note
     *
     * @param array $args Identity of the note
     *
     * @return True if success and false otherwise
     */
    public function delete($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');

        // Needed argument
        if (!isset($aid) || !is_numeric($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $aid));
        if ($anotacio == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        if ($anotacio['daid'] != 0) {
            //get the agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                        array('daid' => $anotacio['daid']));
            if ($agenda == false) {
                return LogUtil::registerError($this->__('Event not found'));
            }
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $anotacio['daid'],
                                         'grup' => $agenda['grup'],
                                         'resp' => $agenda['resp'],
                                         'activa' => $agenda['activa']));
        // If the user has no access, show an error message and stop execution
        if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        if (!DBUtil::deleteObjectByID('IWagendas', $aid, 'aid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        // Let any hooks know that we have deleted an item
        ModUtil::callHooks('item', 'delete', $args['aid'],
                            array('module' => 'IWagendas'));
        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWagendas');
        $view->clear_cache(null, $nid);
        return true;
    }

    /**
     * Get users who can access the agenda
     *
     * @param array $args Identity of the agenda
     *
     * @return An array with the users identity
     */
    public function gettenenacces($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');

        // Needed argument
        if (!isset($daid) || !is_numeric($daid) || $daid == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                    array('daid' => $daid));
        if ($agenda == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid,
                                         'grup' => $agenda['grup'],
                                         'resp' => $agenda['resp'],
                                         'activa' => $agenda['activa']));
        // If the user has no access, show an error message and stop execution
        if ($te_acces < 4) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        //add the aganda's managers
        $managers = explode('$$', substr($agenda['resp'], 2, -1));
        foreach ($managers as $manager) {
            $registres[] = array('uid' => $manager);
        }
        //add the users from the groups
        $groups = explode('$$', substr($agenda['grup'], 2, -1));
        foreach ($groups as $group) {
            //get the groups members
            $groupId = explode('|', $group);
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $members = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                      array('sv' => $sv,
                                            'gid' => $groupId[0]));
            foreach ($members as $member) {
                $registres[] = array('uid' => $member['id']);
            }
        }
        return $registres;
    }

    /**
     * Create a new item into an agenda
     *
     * @param array $args Agenda information
     *
     * @return True if success and false otherwise
     */
    public function crear($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $hora = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
        $minut = FormUtil::getPassedValue('minut', isset($args['minut']) ? $args['minut'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $hora1 = FormUtil::getPassedValue('hora1', isset($args['hora1']) ? $args['hora1'] : null, 'POST');
        $minut1 = FormUtil::getPassedValue('minut1', isset($args['minut1']) ? $args['minut1'] : null, 'POST');
        $mes1 = FormUtil::getPassedValue('mes1', isset($args['mes1']) ? $args['mes1'] : null, 'POST');
        $dia1 = FormUtil::getPassedValue('dia1', isset($args['dia1']) ? $args['dia1'] : null, 'POST');
        $any1 = FormUtil::getPassedValue('any1', isset($args['any1']) ? $args['any1'] : null, 'POST');
        $totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
        $tasca = FormUtil::getPassedValue('tasca', isset($args['tasca']) ? $args['tasca'] : null, 'POST');
        $nivell = FormUtil::getPassedValue('nivell', isset($args['nivell']) ? $args['nivell'] : null, 'POST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
        $nova = FormUtil::getPassedValue('nova', isset($args['nova']) ? $args['nova'] : null, 'POST');
        $oculta = FormUtil::getPassedValue('oculta', isset($args['oculta']) ? $args['oculta'] : null, 'POST');
        $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');
        $origen = FormUtil::getPassedValue('origen', isset($args['origen']) ? $args['origen'] : null, 'POST');
        $gCalendarEventId = FormUtil::getPassedValue('gCalendarEventId', isset($args['gCalendarEventId']) ? $args['gCalendarEventId'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');

        // Needed argument
        if (!isset($c1)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $daid));
        // If the user has no access, show an error message and stop execution
        if ($te_acces < 2) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        if (!isset($tasca)) $tasca = 0;
        if (!isset($nivell)) $nivell = 0;
        if (!isset($rid)) $rid = 0;
        //generem la data a partir de les dades rebudes
        if ($totdia) {
            $hora = 23;
            $minut = 59;
        }
        $data = mktime($hora, $minut, 0, $mes, $dia, $any);
        $data1 = mktime($hora1, $minut1, 0, $mes1, $dia1, $any1);
        $items = array('data' => $data,
                       'data1' => $data1,
                       'totdia' => $totdia,
                       'usuari' => UserUtil::getVar('uid'),
                       'tasca' => $tasca,
                       'nivell' => $nivell,
                       'c1' => $c1,
                       'c2' => $c2,
                       'c3' => $c3,
                       'c4' => $c4,
                       'c5' => $c5,
                       'c6' => $c6,
                       'rid' => $rid,
                       'daid' => $daid,
                       'dataanota' => time(),
                       'nova' => $nova,
                       'completa' => $oculta,
                       'fitxer' => $fitxer,
                       'origen' => $origen,
                       'gCalendarEventId' => $gCalendarEventId,
                       'protegida' => $protegida);
        if (!DBUtil::insertObject($items, 'IWagendas', 'aid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        // Let any hooks know that we have created a new item.
        ModUtil::callHooks('item', 'create', $items['aid'],
                            array('module' => 'IWagendas'));
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $item = array('rid' => $items['rid']);
        $where = "$c[aid]=" . $items['rid'];
        if (!DBUTil::updateObject($item, 'IWagendas', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        // Return the id of the newly created item to the calling process
        return $items['aid'];
    }

    /**
     * Copy a note to another agenda
     *
     * @param array $args Agenda information
     *
     * @return True if success and false otherwise
     */
    public function meva($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
        $adaid = FormUtil::getPassedValue('adaid', isset($args['adaid']) ? $args['adaid'] : null, 'POST');

        // Needed argument
        if (!isset($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                  array('aid' => $aid));
        if ($note == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        if ($note['daid'] != 0) {
            //get the agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                        array('daid' => $note['daid']));
            if ($agenda == false) {
                return LogUtil::registerError($this->__('Event not found'));
            }
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $note['daid'],
                                             'grup' => $agenda['grup'],
                                             'resp' => $agenda['resp'],
                                             'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 1) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        }
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersInfo = ModUtil::func('IWmain', 'user', 'getAllUsersInfo',
                                    array('sv' => $sv,
                                          'info' => 'ncc'));
        //preparem el contingut de la icona amb informaciï¿œ addicional
        $j = 2;
        $c2x = '';
        $ha_passat = false;
        for ($j = 2; $j < 7; $j++) {
            $c = 'c' . $j;
            $tc = 'tc' . $j;
            if ($agenda[$c] != "" && ($note[$c] != '' || $agenda[$tc] == 3 || $agenda[$tc] == 4)) {
                $c2x .= '<fieldset><legend> ';
                $c2x .= $agenda[$c];
                $c2x .= ' </legend>';
                $c2x .= ( $agenda[$tc] != 3 && $agenda[$tc] != 4 && $note[$c] == "") ? "---" : $note[$c];
                if ($agenda[$tc] == 3) {
                    $c2x .= $usersInfo[$note['usuari']];
                }
                if ($agenda[$tc] == 4) {
                    $c2x .= $usersInfo[$note['usuari']] . $this->__(' on ') . date('d/m/Y', $note['dataanota']) . $this->__(' at ') . date('H:i', $note['dataanota']);
                }
                $c2x .= '</fieldset>';
            }
        }
        foreach ($adaid as $daid) {
            //if it is a shared agenda check if user can write in it
            if ($daid > 0) {
                // Check whether the user can access the agenda for this action
                $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                           array('daid' => $daid));
                if ($te_acces < 2) {
                    return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                }
            }
            $subscrits = ModUtil::apiFunc('IWagendas', 'user', 'getsubscrits',
                                           array('daid' => $daid));
            $subscritString = '$';
            foreach ($subscrits as $subscrit) {
                $subscritString .= '$' . $subscrit['uid'] . '$';
            }
            $items = array('data' => $note['data'],
                           'totdia' => $note['totdia'],
                           'usuari' => UserUtil::getVar('uid'),
                           'tasca' => $note['tasca'],
                           'nivell' => $note['nivell'],
                           'c1' => $note['c1'],
                           'c2' => $c2x,
                           'daid' => $daid,
                           'dataanota' => time(),
                           'nova' => $subscritString,
                           'completa' => $note['oculta'],
                           'fitxer' => $note['fitxer'],
                           'protegida' => $note['protegida'],
                           'origenId' => $note['daid']);
            if (!DBUtil::insertObject($items, 'IWagendas', 'aid')) {
                return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
            }
            // Let any hooks know that we have created a new item.
            ModUtil::callHooks('item', 'create', $items['aid'],
                                array('module' => 'IWagendas'));
        }
        // Return true if success
        return true;
    }

    /**
     * Delete the repeated notes
     *
     * @param array $args Note to delete and its repetitions
     *
     * @return True if success and false otherwise
     */
    public function deleterepes($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $rid = FormUtil::getPassedValue('rid', isset($args['rid']) ? $args['rid'] : null, 'POST');
        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');

        // Needed argument
        if (!isset($aid) || !isset($rid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $aid));
        if ($anotacio == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        if ($anotacio['daid'] > 0) {
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $daid));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        } else {
            if ($anotacio['usuari'] != UserUtil::getVar('uid')) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        }
        if (!DBUtil::deleteObjectByID('IWagendas', $rid, 'rid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        //Retornem true ja que el procï¿œs ha finalitzat amb ï¿œxit
        return true;
    }

    /**
     * Get the users subscribed to an agenda
     *
     * @param array $args Identity to the agenda
     *
     * @return An array with the users identities
     */
    public function getsubscrits($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $quins = FormUtil::getPassedValue('quins', isset($args['quins']) ? $args['quins'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $quins = (!isset($quins) || $quins == '-1') ? "$c[donadabaixa]=-1 OR $c[donadabaixa]=-2" : "$c[donadabaixa]=" . $quins;
        $where = "$c[daid]=$daid AND (" . $quins . ")";
        $items = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Update multiple notes
     *
     * @param array $args The note information
     *
     * @return True if success and false otherwise
     */
    public function modificamulti($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $hora = FormUtil::getPassedValue('hora', isset($args['hora']) ? $args['hora'] : null, 'POST');
        $minut = FormUtil::getPassedValue('minut', isset($args['minut']) ? $args['minut'] : null, 'POST');
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : null, 'POST');
        $dia = FormUtil::getPassedValue('dia', isset($args['dia']) ? $args['dia'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $totdia = FormUtil::getPassedValue('totdia', isset($args['totdia']) ? $args['totdia'] : null, 'POST');
        $c1 = FormUtil::getPassedValue('c1', isset($args['c1']) ? $args['c1'] : null, 'POST');
        $c2 = FormUtil::getPassedValue('c2', isset($args['c2']) ? $args['c2'] : null, 'POST');
        $c3 = FormUtil::getPassedValue('c3', isset($args['c3']) ? $args['c3'] : null, 'POST');
        $c4 = FormUtil::getPassedValue('c4', isset($args['c4']) ? $args['c4'] : null, 'POST');
        $c5 = FormUtil::getPassedValue('c5', isset($args['c5']) ? $args['c5'] : null, 'POST');
        $c6 = FormUtil::getPassedValue('c6', isset($args['c6']) ? $args['c6'] : null, 'POST');
        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');
        $protegida = FormUtil::getPassedValue('protegida', isset($args['protegida']) ? $args['protegida'] : null, 'POST');
        $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');

        // Needed argument
        if (!isset($aid) || !isset($c1)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($anotacio == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        if ($anotacio['daid'] > 0) {
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $daid));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        } else {
            if ($anotacio['usuari'] != UserUtil::getVar('uid')) {
                return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
            }
        }
        //generem la data a partir de les dades rebudes
        if ($totdia) {
            $hora = 0;
            $minut = 0;
        }
        $data = mktime($hora, $minut, 0, $mes, $dia, $any);
        //calculem l'increment de l'hora per incrementar-ho a tots els registres
        $minutsmes = $minut - date('i', $anotacio['data']);
        $horesmes = $hora - date('H', $anotacio['data']);
        $segonsmes = $horesmes * 60 * 60 + $minutsmes * 60;
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[rid]=" . $anotacio['rid'];
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        foreach ($items as $item) {
            $item1 = array('c1' => $c1,
                           'c2' => $c2,
                           'c3' => $c3,
                           'c4' => $c4,
                           'c5' => $c5,
                           'c6' => $c6,
                           'data' => $item['data'] + $segonsmes,
                           'usuari' => UserUtil::getVar('uid'),
                           'dataanota' => time(),
                           'totdia' => $totdia,
                           'vcalendar' => 0,
                           'protegida' => $protegida,
                           'fitxer' => $fitxer);
            $where = "$c[aid]=" . $item['aid'];
            if (!DBUTil::updateObject($item1, 'IWagendas', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /**
     * Count the number of notes multiple
     *
     * @param array $args The note identity
     *
     * @return The number of repeated notes
     */
    public function comptarepes($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', isset($args['aid']) ? $args['aid'] : null, 'POST');

        // Needed argument
        if (!isset($aid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $anotacio = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                      array('aid' => $aid));
        if ($anotacio == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[rid]=" . $anotacio['rid'] . " AND " . $anotacio['rid'] . ">0";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        //Retornem el nombre de repeticoins que hi ha
        //Restem u perquï¿œ nomï¿œs volem les repeticions i no la original
        return count($items) - 1;
    }

    /**
     * Set an user as unsubscribed to an agenda
     *
     * @param array $args The agenda  identity
     *
     * @return True if success and false otherwise
     */
    public function subsbaixa($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');

        // Needed argument
        if (!isset($daid) || $daid == 0) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                    array('daid' => $daid));
        if ($agenda == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid));
        // If the user has no access, show an error message and stop execution
        if ($te_acces <= 0) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $item = array('donadabaixa' => 1);
        $where = "$c[daid]=$daid AND $c[uid]=" . UserUtil::getVar('uid');
        if (!DBUTil::updateObject($item, 'IWagendas_subs', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        //Informem que el procï¿œs s'ha acabat amb ï¿œxit
        return true;
    }

    /**
     * Set an user as subscribed into an agenda
     *
     * @param array $args The agenda  identity
     *
     * @return True if success and false otherwise
     */
    public function subsalta($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');

        // Needed argument
        if (!isset($daid) || $daid == 0) {
            return;
            //return LogUtil::registerError ($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                    array('daid' => $daid));
        if ($agenda == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid));
        // If the user has no access, show an error message and stop execution
        if ($te_acces <= 0) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $uid = UserUtil::getVar('uid');
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        $where = "$c[uid]=$uid AND $c[daid]=$daid";
        $item = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
        if (count($item) < 1) {
            $items = array('daid' => $daid,
                'uid' => $uid,
                'donadabaixa' => '-1');
            if (!DBUtil::insertObject($items, 'IWagendas_subs', 'said')) $error = true;
        } else {
            $items = array('donadabaixa' => '-1');
            if (!DBUTil::updateObject($items, 'IWagendas_subs', $where)) $error = true;
        }
        if ($error) {
            return LogUtil::registerError($this->__('An error has occurred while updating the subscription to the agenda'));
        }
        return true;
    }

    /**
     * Subscribe multiple users into an agenda
     *
     * @param array $args The agenda identity and the users array to subscribe
     *
     * @return True if success and false otherwise
     */
    public function subsAltaMulti($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', isset($args['daid']) ? $args['daid'] : null, 'POST');
        $users = FormUtil::getPassedValue('users', isset($args['users']) ? $args['users'] : null, 'POST');

        // Needed argument
        if (!isset($daid) || $daid == 0 || !isset($users)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                    array('daid' => $daid));
        if ($agenda == false) {
            return LogUtil::registerError($this->__('Event not found'));
        }
        // Check whether the user can access the agenda for this action
        $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                   array('daid' => $daid));
        // If the user has no access, show an error message and stop execution
        if ($te_acces != 4) {
            return LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_subs_column'];
        foreach ($users as $user) {
            $where = "$c[uid]=$user AND $c[daid]=$daid";
            $item = DBUtil::selectObjectArray('IWagendas_subs', $where, '', '-1', '-1', 'said');
            if (count($item) < 1) {
                $items = array('daid' => $daid,
                    'uid' => $user,
                    'donadabaixa' => '-2');
                if (!DBUtil::insertObject($items, 'IWagendas_subs', 'said')) {
                    $error = true;
                }
            } else {
                $items = array('donadabaixa' => '-2');
                if (!DBUTil::updateObject($items, 'IWagendas_subs', $where)) {
                    $error = true;
                }
            }
            if ($error) {
                return LogUtil::registerError($this->__('An error has occurred while updating the subscription to the agenda'));
            }
        }
        return true;
    }

    /**
     * Get the number of notes that needs an attached file
     *
     * @param array $args The file name
     *
     * @return The number of notes that needs the attached file
     */
    public function n_fitxers($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $fitxer = FormUtil::getPassedValue('fitxer', isset($args['fitxer']) ? $args['fitxer'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "$c[fitxer]='$fitxer'";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        return count($items);
    }

    /**
     * Get the agendas where the user has been subscribed
     *
     * @return An array with the agendas where the user has been subscribed
     */
    public function avissubscripcio()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $uid = UserUtil::getVar('uid');
        $myJoin = array();
        $myJoin[] = array('join_table' => 'IWagendas_subs',
            'join_field' => array('uid'),
            'object_field_name' => array('uid'),
            'compare_field_table' => 'daid',
            'compare_field_join' => 'daid');
        $myJoin[] = array('join_table' => 'IWagendas_definition',
            'join_field' => array(),
            'object_field_name' => array(),
            'compare_field_table' => 'daid',
            'compare_field_join' => 'daid');
        $pntables = DBUtil::getTables();
        $ccolumn = $pntables['IWagendas_subs_column'];
        $ocolumn = $pntables['IWagendas_definition_column'];
        $where = "b.$ocolumn[daid] = a.$ccolumn[daid] AND $ccolumn[donadabaixa] = '-2' AND $ccolumn[uid] = $uid";
        $items = DBUtil::selectExpandedObjectArray('IWagendas_definition', $myJoin, $where, '');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        return $items;
    }

    /**
     * Get the number of new note for an user
     *
     * @return The number of not seen notes
     */
    public function newItem($args)
    {
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue', array('sv' => $sv))) {
            $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));
        } else {
            $requestByCron = true;
        }
        if (!UserUtil::isLoggedIn() && !$requestByCron) {
            return;
        } else {
            if ($uid != UserUtil::getVar('uid') && !$requestByCron) {
                return $nombrevistes;
            }
        }
        $pntables = DBUtil::getTables();
        $c = $pntables['IWagendas_column'];
        $where = "$c[nova] like '%$" . $uid . "$%' AND $c[deleted] = 0";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', 'aid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        return count($items);
    }

    /**
     * Get an agenda note that have google identity
     *
     * @param array $args Note Google identity
     *
     * @return An array with the note information
     */
    public function getGoogleNote($args)
    {
        $gCalendarEventId = FormUtil::getPassedValue('gCalendarEventId', isset($args['gCalendarEventId']) ? $args['gCalendarEventId'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if ($gCalendarEventId == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = DBUtil::selectObjectByID('IWagendas', $gCalendarEventId, 'gCalendarEventId');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get all Google notes
     *
     * @param array $args Future for only future notes
     *
     * @return An array with the notes information
     */
    public function getAllGCalendarNotes($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $beginDate = FormUtil::getPassedValue('beginDate', isset($args['beginDate']) ? $args['beginDate'] : null, 'POST');
        $endDate = FormUtil::getPassedValue('endDate', isset($args['endDate']) ? $args['endDate'] : null, 'POST');
        $gIds = FormUtil::getPassedValue('gIds', isset($args['gIds']) ? $args['gIds'] : null, 'POST');
        $notInGCalendar = FormUtil::getPassedValue('notInGCalendar', isset($args['notInGCalendar']) ? $args['notInGCalendar'] : null, 'POST');

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_column'];
        $where = "(";
        if (!empty($gIds)) {
            foreach ($gIds as $g) {
                $where .= "$c[daid] = " . $g[daid] . " OR ";
            }
            $where = substr($where, 0, -3);
            $where .= ") AND (";
        }
        $simbol = ($notInGCalendar == null) ? '<>' : '=';
        $key = ($notInGCalendar == null) ? 'gCalendarEventId' : 'aid';
        $time = time();
        $where .= "$c[gCalendarEventId] " . $simbol . " '' AND $c[data] BETWEEN $beginDate AND $endDate)";
        $items = DBUtil::selectObjectArray('IWagendas', $where, '', '-1', '-1', $key);
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get user Google Default Calendar
     *
     * @param array $args Future for only future notes
     *
     * @return An array with the calendar information
     */
    public function getGCalendarUserDefault()
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $pntable = DBUtil::getTables();
        $c = $pntable['IWagendas_definition_column'];
        $uid = UserUtil::getVar('uid');
        //get Google username
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $gUserName = ModUtil::func('IWmain', 'user', 'userGetVar',
                                    array('uid' => $uid,
                                          'name' => 'gUserName',
                                          'module' => 'IWagendas',
                                          'sv' => $sv));
        $gUserName = str_replace('@', '%40', $gUserName);
        $where = "$c[gCalendarId] LIKE '%/" . $gUserName . "%' AND $c[resp] LIKE '%$" . $uid . "$%'";
        $items = DBUtil::selectObjectArray('IWagendas_definition', $where, '', '-1', '-1', '');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items[0];
    }
}
