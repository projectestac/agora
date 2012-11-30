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

class IWagendas_Controller_Ajax extends Zikula_Controller_AbstractAjax
{
    /**
     * Delete a note from an agenda
     *
     * @param array $args Array with the id of the note
     *
     * @return boolean true if success
     */
    public function deleteNote($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', -1, 'GET');
        if ($aid == -1) AjaxUtil::error('no note id');
        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) AjaxUtil::error('not agenda id');
        $deleted = ModUtil::func('IWagendas', 'user', 'deleteNote',
                                  array('aid' => $aid,
                                        'daid' => $daid));
        if (!is_numeric($deleted)) AjaxUtil::error($deleted);
        AjaxUtil::output(array('aid' => $deleted));
    }

    /**
     * Protect a note agains autotical deletion
     *
     * @param array $args Array with the id of the note and the id of the agenda
     *
     * @return Identity of the note and new state
     */
    public function protectNote($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', -1, 'GET');
        if ($aid == -1) AjaxUtil::error('no note id');
        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) AjaxUtil::error('not agenda id');
        //get the note
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                  array('aid' => $aid));
        if ($note == false) AjaxUtil::error($this->__('Event not found'));
        if ($note['daid'] != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                        array('daid' => $note['daid']));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $agenda['daid'],
                                             'grup' => $agenda['grup'],
                                             'resp' => $agenda['resp'],
                                             'activa' => $agenda['activa']));
        }
        if (strpos($agenda['gAccessLevel'], '$owne|' . UserUtil::getVar('uid') . '$') === false &&
                $agenda['gAccessLevel'] != '') {
            AjaxUtil::error($this->__('You are not allowed to administrate the agendas'));
        } else {
            //Check if user can access the agenda
            if ($daid != 0) {
                // If the user has no access, show an error message and stop execution
                if ($te_acces < 3 || ($te_access == 3 && $anotacio['usuari'] != UserUtil::getVar('uid'))) AjaxUtil::error($this->__('You are not allowed to administrate the agendas'));
            } else {
                //Comprovem si l'usuari estÃ  protegint realment la seva a notaciÃ³
                if ($note['usuari'] != UserUtil::getVar('uid')) AjaxUtil::error($this->__('You are not allowed to administrate the agendas'));
            }
        }
        $protegida = ($note['protegida'] == 1) ? 0 : 1;
        $items = array('protegida' => $protegida);
        // Edit note and set it as protected
        $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote',
                                 array('aid' => $aid,
                                       'daid' => $daid,
                                       'items' => $items));
        if (!$lid) AjaxUtil::error(_AGENDESACTIONERROR);
        $alt = ($protegida == 1) ? $this->__('Delete protection against automatic deletion for this event') : $this->__('Protected? ');
        AjaxUtil::output(array('aid' => $aid,
                               'protected' => $protegida,
                               'alt' => $alt));
    }

    /**
     * Change the state of a note to complete or uncomplete
     *
     * @param array $args Array with the id of the note and the id of the agenda
     *
     * @return Identity of the note and new state
     */
    public function completeNote($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $aid = FormUtil::getPassedValue('aid', -1, 'GET');
        if ($aid == -1) {
            LogUtil::registerError('no note id');
            AjaxUtil::output();
        }
        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) {
            LogUtil::registerError('not agenda id');
            AjaxUtil::output();
        }
        //get the note
        $note = ModUtil::apiFunc('IWagendas', 'user', 'get',
                                  array('aid' => $aid));
        if ($note == false) {
            LogUtil::registerError($this->__('Event not found'));
            AjaxUtil::output();
        }
        // Get the color configuration and assign them to the view object
        $colors = explode('|', ModUtil::getVar('IWagendas', 'colors'));
        //Comprovem que l'usuari pugui accedir a l'agenda
        if ($daid != 0) {
            //Estem entrant a una agenda multiusuari
            //Carreguem les dades de l'agenda
            $agenda = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                        array('daid' => $daid));
            // Check whether the user can access the agenda for this action
            $te_acces = ModUtil::func('IWagendas', 'user', 'te_acces',
                                       array('daid' => $daid,
                                             'grup' => $agenda['grup'],
                                             'resp' => $agenda['resp'],
                                             'activa' => $agenda['activa']));
            // If the user has no access, show an error message and stop execution
            if ($te_acces < 3 || ($te_access == 3 && $note['usuari'] != UserUtil::getVar('uid'))) {
                LogUtil::registerError($this->__('You are not allowed to administrate the agendas'));
                AjaxUtil::output();
            }
        }
        if ($note['daid'] == $daid) {
            $completa = ($note['completa'] == 1) ? 0 : 1;
            $items = array('completa' => $completa);
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote',
                                     array('aid' => $aid,
                                          'daid' => $daid,
                                          'items' => $items));
            if (!$lid) {
                LogUtil::registerError(_AGENDESACTIONERROR);
                AjaxUtil::output();
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
            $lid = ModUtil::apiFunc('IWagendas', 'user', 'editNote',
                                     array('aid' => $aid,
                                           'daid' => $daid,
                                           'items' => $items));
            if (!$lid) {
                //Success
                //LogUtil::registerStatus ($this->__('Protection status updated'));
                LogUtil::registerError(_AGENDESACTIONERROR);
                AjaxUtil::output();
            }
        }
        if ($completa == 1) {
            $alt = ($daid != 0) ? $this->__('Show') : $this->__('Mark as not completed');
            $bgcolor = $colors[14];
        } else {
            $alt = ($daid != 0) ? $this->__('Hide') : $this->__('Mark as completed');
            $bgcolor = $colors[13];
        }
        AjaxUtil::output(array('aid' => $aid,
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
    public function modifyAgenda($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) {
            LogUtil::registerError('no agenda id');
            AjaxUtil::output();
        }
        $char = FormUtil::getPassedValue('char', -1, 'GET');
        if ($char == -1) {
            LogUtil::registerError('no char defined');
            AjaxUtil::output();
        }
        //Get agenda information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                                  array('daid' => $daid));
        if ($item == false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('The agenda was not found')));
        }
        $value = ($item[$char]) ? 0 : 1;
        //change value in database
        $items = array($char => $value);
        if (!ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda',
                               array('daid' => $daid,
                                     'items' => $items))) {
            LogUtil::registerError('Error');
            AjaxUtil::output();
        }
        AjaxUtil::output(array('daid' => $daid));
    }

    /**
     * Change the characteristics of a agenda definition
     *
     * @param array $args Array with the id of the agenda and the value to change
     *
     * @return The field row new value in database
     */
    public function changeContent($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) {
            LogUtil::registerError('no agenda id');
            AjaxUtil::output();
        }
        $item = ModUtil::func('IWagendas', 'admin', 'getCharsContent',
                               array('daid' => $daid));

        Zikula_AbstractController::configureView();
        $this->view->assign('agenda', $item);

        AjaxUtil::output(array('content' => $this->view->fetch('IWagendas_admin_mainChars.htm'),
                               'daid' => $daid));
    }

    /**
     * Change the users in select list
     *
     * @param array $args Array with the id of the note
     *
     * @return Redirect to the user main page
     */
    public function chgUsers($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $gid = FormUtil::getPassedValue('gid', -1, 'GET');
        if ($gid == -1) {
            LogUtil::registerError('no group id');
            AjaxUtil::output();
        }
        // get group members
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup',
                                       array('sv' => $sv,
                                             'gid' => $gid));
        if ($groupMembers) {
            asort($groupMembers);
        }
        if (empty($groupMembers)) LogUtil::registerError('unable to get group members or group is empty for gid=' . DataUtil::formatForDisplay($gid));

        Zikula_AbstractController::configureView();
        $this->view->assign('groupMembers', $groupMembers);
        $this->view->assign('action', 'chgUsers');

        AjaxUtil::output(array('content' => $this->view->fetch('IWagendas_admin_ajax.htm')));
    }

    /**
     * Change the color for zn agenda definition
     *
     * @param array $args Array with the id of the agenda and the color value
     *
     * @return The new value in database
     */
    public function modifyColor($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_ADMIN));

        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) {
            LogUtil::registerError('no agenda id');
            AjaxUtil::output();
        }
        $color = FormUtil::getPassedValue('color', -1, 'GET');
        if ($color == -1) {
            LogUtil::registerError('no color defined');
            AjaxUtil::output();
        }
        //Get agenda information
        $item = ModUtil::apiFunc('IWagendas', 'user', 'getAgenda',
                        array('daid' => $daid));
        if ($item == false) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('The agenda was not found')));
        }

        //change value in database
        $items = array('color' => $color);
        if (!ModUtil::apiFunc('IWagendas', 'admin', 'editAgenda',
                        array('daid' => $daid,
                            'items' => $items))) {
            LogUtil::registerError('Error');
            AjaxUtil::output();
        }
        AjaxUtil::output();
    }

    /**
     * Change the month information in calendar
     *
     * @param array $args Month, year and agenda identity
     *
     * @return The new month information
     */
    public function changeMonth($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daid = FormUtil::getPassedValue('daid', -1, 'GET');
        if ($daid == -1) {
            LogUtil::registerError('no agenda id');
            AjaxUtil::output();
        }
        $mes = FormUtil::getPassedValue('mes', -1, 'GET');
        if ($mes == -1) {
            LogUtil::registerError('no month defined');
            AjaxUtil::output();
        }
        $any = FormUtil::getPassedValue('any', -1, 'GET');
        if ($any == -1) {
            LogUtil::registerError('no year defined');
            AjaxUtil::output();
        }
        $content = ModUtil::func('IWagendas', 'user', 'main',
                                  array('mes' => $mes,
                                        'any' => $any,
                                        'daid' => $daid));
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Subscribe an user to an agenda
     *
     * @param array $args Month, year and agenda identity
     *
     * @return The new month information
     */
    public function subs($args)
    {
        // Security check
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('IWagendas::', '::', ACCESS_READ));

        $daidSubs = FormUtil::getPassedValue('daidSubs', -1, 'GET');
        if ($daidSubs == -1) LogUtil::registerError('no agenda id');
        $mes = FormUtil::getPassedValue('mes', -1, 'GET');
        if ($mes == -1) LogUtil::registerError('no month defined');
        $any = FormUtil::getPassedValue('any', -1, 'GET');
        if ($any == -1) LogUtil::registerError('no year defined');
        $subs = ModUtil::func('IWagendas', 'user', 'subs',
                               array('agenda' => $daidSubs));
        if (!$subs) LogUtil::registerError('error subscribing agenda');
        $content = ModUtil::func('IWagendas', 'user', 'main',
                                  array('mes' => $mes,
                                        'any' => $any,
                                        'daid' => 0));
        AjaxUtil::output(array('content' => $content));
    }

    /**
     * Change the content of the calendar block
     *
     * @param array $args The month and year to show
     *
     * @return The calendar block content
     */
    public function calendarBlockMonth($args)
    {
        $month = FormUtil::getPassedValue('month', -1, 'GET');
        if ($month == -1) LogUtil::registerError('no month defined');
        $year = FormUtil::getPassedValue('year', -1, 'GET');
        if ($year == -1) LogUtil::registerError('no year defined');
        $content = ModUtil::func('IWagendas', 'user', 'getCalendarContent',
                                  array('mes' => $month,
                                        'any' => $year));
        AjaxUtil::output(array('content' => $content));
    }
}
