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
class IWagendas_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    /**
     * Delete a note from an agenda
     *
     * @param array $args Array with the id of the note
     *
     * @return boolean true if success
     */
    public function deleteNote($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $aid = $this->request->getPost()->get('aid', '');
        if (!$aid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        $deleted = ModUtil::func('IWagendas', 'user', 'deleteNote', array('aid' => $aid,
                    'daid' => $daid));
        if (!is_numeric($deleted))
            throw new Zikula_Exception_Fatal($deleted);

        return new Zikula_Response_Ajax(array('aid' => $deleted
                ));
    }

    /**
     * Protect a note agains autotical deletion
     *
     * @param array $args Array with the id of the note and the id of the agenda
     *
     * @return Identity of the note and new state
     */
    public function protectNote($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $aid = $this->request->getPost()->get('aid', '');
        if (!$aid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        //get the note
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($note == false)
            throw new Zikula_Exception_Fatal($this->__('Event not found'));
        if ($note['daid'] != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $note['daid']));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces', array('daid' => $agenda['daid'],
                        'grup' => $agenda['grup'],
                        'resp' => $agenda['resp'],
                        'activa' => $agenda['activa']));
        }
        if (strpos($agenda['gAccessLevel'], '$owne|' . UserUtil::getVar('uid') . '$') === false &&
                $agenda['gAccessLevel'] != '') {
            throw new Zikula_Exception_Fatal($this->__('You are not allowed to administrate the agendas'));
        } else {
            //Check if user can access the agenda
            if ($daid != 0) {
                // If the user has no access, show an error message and stop execution
                if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid')))
                    throw new Zikula_Exception_Fatal($this->__('You are not allowed to administrate the agendas'));
            } else {
                //Comprovem si l'usuari estÃ  protegint realment la seva a notaciÃ³
                if ($note['usuari'] != UserUtil::getVar('uid'))
                    throw new Zikula_Exception_Fatal($this->__('You are not allowed to administrate the agendas'));
            }
        }
        $protegida = ($note['protegida'] == 1) ? 0 : 1;
        $items = array('protegida' => $protegida);
        // Edit note and set it as protected
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                    'daid' => $daid,
                    'items' => $items));
        if (!$lid)
            throw new Zikula_Exception_Fatal($this->__('Error'));
        $alt = ($protegida == 1) ? $this->__('Delete protection against automatic deletion for this event') : $this->__('Protected? ');
        return new Zikula_Response_Ajax(array('aid' => $aid,
                    'protecteda' => $protegida,
                    'alt' => $alt));
    }

    /**
     * Change the state of a note to complete or uncomplete
     *
     * @param array $args Array with the id of the note and the id of the agenda
     *
     * @return Identity of the note and new state
     */
    public function completeNote($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $aid = $this->request->getPost()->get('aid', '');
        if (!$aid) {
            throw new Zikula_Exception_Fatal($this->__('no note id'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        //get the note
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get', array('aid' => $aid));
        if ($note == false) {
            throw new Zikula_Exception_Fatal($this->__('Event not found'));
        }
        
        // Get the color configuration and assign them to the view object
        $colors = explode('|', ModUtil::getVar('IWagendas', 'colors'));
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
            if ($te_acces < 3 || ($te_access == 3 && $note['usuari'] != UserUtil::getVar('uid'))) {
                throw new Zikula_Exception_Fatal($this->__('You are not allowed to administrate the agendas'));
            }
        }
        if ($note['daid'] == $daid) {
            $completa = ($note['completa'] == 1) ? 0 : 1;
            $items = array('completa' => $completa);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if (!$lid) {
                throw new Zikula_Exception_Fatal($this->__('Error'));
            }
        } else {
            $uid = UserUtil::getVar('uid');
            $completedByUser = ($note['completedByUser'] == '') ? '$' : $note['completedByUser'];
            if (strpos($completedByUser, '$' . $uid . '$') !== false) {
                $completedByUser = str_replace('$' . $uid . '$', '', $completedByUser);
                $completa = 0;
            } else {
                $completedByUser .= '$' . $uid . '$';
                $completa = 1;
            }
            $items = array('completedByUser' => $completedByUser);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote', array('aid' => $aid,
                        'daid' => $daid,
                        'items' => $items));
            if (!$lid) {
                //Success
                //LogUtil::registerStatus ($this->__('Protection status updated'));
                throw new Zikula_Exception_Fatal($this->__('Error'));
            }
        }
        if ($completa == 1) {
            $alt = ($daid != 0) ? $this->__('Show') : $this->__('Mark as not completed');
            $bgcolor = $colors[14];
        } else {
            $alt = ($daid != 0) ? $this->__('Hide') : $this->__('Mark as completed');
            $bgcolor = $colors[13];
        }
        
        return new Zikula_Response_Ajax(array('aid' => $aid,
                    'completed' => $completa,
                    'daid' => $daid,
                    'alt' => $alt,
                    'bgcolor' => '#' . $bgcolor));
    }

    /**
     * Change the characteristics of a agenda definition
     *
     * @param array $args Array with the id of the agenda and the value to change
     *
     * @return The new value in database
     */
    public function modifyAgenda($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        $char = $this->request->getPost()->get('charx', '');
        if (!$char) {
            throw new Zikula_Exception_Fatal($this->__('no char defined'));
        }

        //Get agenda information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        if ($item == false) {
            throw new Zikula_Exception_Fatal($this->__('The agenda was not found'));
        }
        $value = ($item[$char]) ? 0 : 1;
        //change value in database
        $items = array($char => $value);
        if (!ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            throw new Zikula_Exception_Fatal($this->__('Error'));
        }
        return new Zikula_Response_Ajax(array('daid' => $daid));
    }

    /**
     * Change the characteristics of a agenda definition
     *
     * @param array $args Array with the id of the agenda and the value to change
     *
     * @return The field row new value in database
     */
    public function changeContent($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        $item = ModUtil::func('IWagendas', 'admin', 'getCharsContent', array('daid' => $daid));

        Zikula_AbstractController::configureView();
        $this->view->assign('agenda', $item);
        $content = $this->view->fetch('IWagendas_admin_mainChars.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                    'daid' => $daid));
    }

    /**
     * Change the users in select list
     *
     * @param array $args Array with the id of the note
     *
     * @return Redirect to the user main page
     */
    public function chgUsers($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $gid = $this->request->getPost()->get('gid', '');
        if (!$gid) {
            throw new Zikula_Exception_Fatal($this->__('no group id'));
        }

        // get group members
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                    'gid' => $gid));
        if ($groupMembers)
            asort($groupMembers);

        if (empty($groupMembers))
            throw new Zikula_Exception_Fatal($this->__('unable to get group members or group is empty for gid=') . DataUtil::formatForDisplay($gid));

        Zikula_AbstractController::configureView();
        $this->view->assign('groupMembers', $groupMembers);
        $this->view->assign('action', 'chgUsers');
        $content = $this->view->fetch('IWagendas_admin_ajax.htm');
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * Change the color for zn agenda definition
     *
     * @param array $args Array with the id of the agenda and the color value
     *
     * @return The new value in database
     */
    public function modifyColor($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        $color = $this->request->getPost()->get('color', '');
        if (!$color) {
            throw new Zikula_Exception_Fatal($this->__('no color defined'));
        }

        //Get agenda information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda', array('daid' => $daid));
        if ($item == false) {
            throw new Zikula_Exception_Fatal($this->__('The agenda was not found'));
        }

        //change value in database
        $items = array('color' => $color);
        if (!ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda', array('daid' => $daid,
                    'items' => $items))) {
            throw new Zikula_Exception_Fatal($this->__('Error'));
        }
        return new Zikula_Response_Ajax();
    }

    /**
     * Change the month information in calendar
     *
     * @param array $args Month, year and agenda identity
     *
     * @return The new month information
     */
    public function changeMonth($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $daid = $this->request->getPost()->get('daid', '');

        $mes = $this->request->getPost()->get('mes', '');
        if (!$mes) {
            throw new Zikula_Exception_Fatal($this->__('no month defined'));
        }

        $any = $this->request->getPost()->get('any', '');
        if (!$any) {
            throw new Zikula_Exception_Fatal($this->__('no year defined'));
        }

        $content = ModUtil::func('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'daid' => $daid));
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * Subscribe an user to an agenda
     *
     * @param array $args Month, year and agenda identity
     *
     * @return The new month information
     */
    public function subs($args) {
        if (!SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Fatal($this->__('Sorry! No authorization to access this module.'));
        }

        $daidSubs = $this->request->getPost()->get('daidSubs', '');

        $mes = $this->request->getPost()->get('mes', '');
        if (!$mes) {
            throw new Zikula_Exception_Fatal($this->__('no month defined'));
        }

        $any = $this->request->getPost()->get('any', '');
        if (!$any) {
            throw new Zikula_Exception_Fatal($this->__('no year defined'));
        }

        $subs = ModUtil::func('IWagendas', 'user', 'subs', array('agenda' => $daidSubs));
        if (!$subs)
            LogUtil::registerError('error subscribing agenda');
        $content = ModUtil::func('IWagendas', 'user', 'main', array('mes' => $mes,
                    'any' => $any,
                    'daid' => 0));
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

    /**
     * Change the content of the calendar block
     *
     * @param array $args The month and year to show
     *
     * @return The calendar block content
     */
    public function calendarBlockMonth($args) {
        $month = $this->request->getPost()->get('month', '');
        if (!$month) {
            throw new Zikula_Exception_Fatal($this->__('no month defined'));
        }

        $year = $this->request->getPost()->get('year', '');
        if (!$year) {
            throw new Zikula_Exception_Fatal($this->__('no year defined'));
        }

        $content = ModUtil::func('IWagendas', 'user', 'getCalendarContent', array('mes' => $month,
                    'any' => $year));
        return new Zikula_Response_Ajax(array('content' => $content,
                ));
    }

}