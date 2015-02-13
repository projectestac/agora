<?php

class IWnoteboard_Controller_Admin extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    /**
     * Show the manage module site
     * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return		The configuration information
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is required. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct. If not return error
        $versionNeeded = '0.3';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded))) {
            return false;
        }
        $temes_array = array();
        $noFolder = false;
        $noWriteable = false;

        // Get the themes from the database
        $themes = ModUtil::apiFunc('IWnoteboard', 'user', 'getalltemes');

        // Get all the groups information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groupsInfo = ModUtil::func('IWmain', 'user', 'getAllGroupsInfo', array('sv' => $sv));

        //Agefim la llista de temes on classificar les notÃ­cies
        foreach ($themes as $theme) {
            if ($theme['descriu'] == '') {
                $theme['descriu'] = '---';
            }
            $grup = ($theme['grup'] == 0) ? $this->__('All') : $groupsInfo[$theme['grup']];
            if ($grup == '') {
                $grup = '???';
            }
            $temes_array[] = array('tid' => $theme['tid'],
                'nomtema' => $theme['nomtema'],
                'descriu' => $theme['descriu'],
                'grup' => $grup);
        }

        $grupsModVar = $this->getVar('grups');
        $permisosModVar = $this->getVar('permisos');
        $marcatModVar = $this->getVar('marcat');
        $verificaModVar = $this->getVar('verifica');
        $quiverifica = $this->getVar('quiverifica');
        $caducitat = $this->getVar('caducitat');
        $colorrow1 = $this->getVar('colorrow1');
        $colorrow2 = $this->getVar('colorrow2');
        $colornewrow1 = $this->getVar('colornewrow1');
        $colornewrow2 = $this->getVar('colornewrow2');
        $attached = $this->getVar('attached');
        $directoriroot = ModUtil::getVar('IWmain', 'documentRoot');
        $notRegisteredSeeRedactors = $this->getVar('notRegisteredSeeRedactors');
        $multiLanguage = $this->getVar('multiLanguage');
        $topicsSystem = $this->getVar('topicsSystem');
        $shipHeadersLines = $this->getVar('shipHeadersLines');
        $editPrintAfter = $this->getVar('editPrintAfter');
        $repperdefecte = $this->getVar('repperdefecte');
        $notifyNewEntriesByMail = $this->getVar('notifyNewEntriesByMail');
        $notifyNewCommentsByMail = $this->getVar('notifyNewCommentsByMail');
        $commentCheckedByDefault = $this->getVar('commentCheckedByDefault');
        $smallAvatars = $this->getVar('smallAvatars');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'plus' => $this->__('Unregistered'),
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWnoteboard', 'attached')) || ModUtil::getVar('IWnoteboard', 'attached') == '') {
            $noFolder = true;
        } else {
            if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWnoteboard', 'attached'))) {
                $noWriteable = true;
            }
        }

        foreach ($groups as $group) {
            if (strpos($grupsModVar, '$' . $group['id'] . '$') != 0) {
                $select = true;
            } else {
                $select = false;
            }
            if (strpos($marcatModVar, '$' . $group['id'] . '$') != 0) {
                $select1 = true;
            } else {
                $select1 = false;
            }
            if (strpos($verificaModVar, '$' . $group['id'] . '$') != 0) {
                $select2 = true;
            } else {
                $select2 = false;
            }
            $permis = substr($permisosModVar, strpos($permisosModVar, '$' . $group['id'] . '-') + strlen($group['id']) + 2, 1);
            $grups_array[] = array('id' => $group['id'],
                'select' => $select,
                'name' => $group['name'],
                'select1' => $select1,
                'select2' => $select2,
                'permis' => $permis);
        }

        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        return $this->view->assign('multizk', $multizk)
                ->assign('temes', $temes_array)
                ->assign('grups', $grups_array)
                ->assign('quiverifica', $quiverifica)
                ->assign('caducitat', $caducitat)
                ->assign('repperdefecte', $repperdefecte)
                ->assign('colorrow1', $colorrow1)
                ->assign('colorrow2', $colorrow2)
                ->assign('colornewrow1', $colornewrow1)
                ->assign('colornewrow2', $colornewrow2)
                ->assign('attached', $attached)
                ->assign('directoriroot', $directoriroot)
                ->assign('notRegisteredSeeRedactors', $notRegisteredSeeRedactors)
                ->assign('multiLanguage', $multiLanguage)
                ->assign('topicsSystem', $topicsSystem)
                ->assign('shipHeadersLines', $shipHeadersLines)
                ->assign('editPrintAfter', $editPrintAfter)
                ->assign('noFolder', $noFolder)
                ->assign('noWriteable', $noWriteable)
                ->assign('notifyNewEntriesByMail', $notifyNewEntriesByMail)
                ->assign('notifyNewCommentsByMail', $notifyNewCommentsByMail)
                ->assign('commentCheckedByDefault', $commentCheckedByDefault)
                ->assign('smallAvatars', $smallAvatars)
                ->fetch('IWnoteboard_admin_conf.tpl');
    }

    /**
     * Update the configuration values
     * @author	Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @params	The config values from the form
     * @return	Thue if success
     */
    public function confupdate($args) {
        $g = FormUtil::getPassedValue('g', isset($args['g']) ? $args['g'] : null, 'POST');
        $p = FormUtil::getPassedValue('p', isset($args['p']) ? $args['p'] : null, 'POST');
        $m = FormUtil::getPassedValue('m', isset($args['m']) ? $args['mm'] : null, 'POST');
        $v = FormUtil::getPassedValue('v', isset($args['v']) ? $args['v'] : null, 'POST');
        $q = FormUtil::getPassedValue('q', isset($args['q']) ? $args['q'] : null, 'POST');
        $c = FormUtil::getPassedValue('c', isset($args['c']) ? $args['c'] : null, 'POST');
        $r = FormUtil::getPassedValue('r', isset($args['r']) ? $args['r'] : null, 'POST');
        $ext = FormUtil::getPassedValue('ext', isset($args['ext']) ? $args['ext'] : null, 'POST');
        $mida = FormUtil::getPassedValue('mida', isset($args['mida']) ? $args['mida'] : null, 'POST');
        $color1 = FormUtil::getPassedValue('color1', isset($args['color1']) ? $args['color1'] : null, 'POST');
        $color2 = FormUtil::getPassedValue('color2', isset($args['color2']) ? $args['color2'] : null, 'POST');
        $colornew1 = FormUtil::getPassedValue('colornew1', isset($args['colornew1']) ? $args['colornew1'] : null, 'POST');
        $colornew2 = FormUtil::getPassedValue('colornew2', isset($args['colornew2']) ? $args['colornew2'] : null, 'POST');
        $attached = FormUtil::getPassedValue('attached', isset($args['attached']) ? $args['attached'] : null, 'POST');
        $notRegisteredSeeRedactors = FormUtil::getPassedValue('notRegisteredSeeRedactors', isset($args['notRegisteredSeeRedactors']) ? $args['notRegisteredSeeRedactors'] : null, 'POST');
        $multiLanguage = FormUtil::getPassedValue('multiLanguage', isset($args['multiLanguage']) ? $args['multiLanguage'] : null, 'POST');
        $topicsSystem = FormUtil::getPassedValue('topicsSystem', isset($args['topicsSystem']) ? $args['topicsSystem'] : null, 'POST');
        $shipHeadersLines = FormUtil::getPassedValue('shipHeadersLines', isset($args['shipHeadersLines']) ? $args['shipHeadersLines'] : null, 'POST');
        $editPrintAfter = FormUtil::getPassedValue('editPrintAfter', isset($args['editPrintAfter']) ? $args['editPrintAfter'] : null, 'POST');
        $notifyNewEntriesByMail = FormUtil::getPassedValue('notifyNewEntriesByMail', isset($args['notifyNewEntriesByMail']) ? $args['notifyNewEntriesByMail'] : null, 'POST');
        $notifyNewCommentsByMail = FormUtil::getPassedValue('notifyNewCommentsByMail', isset($args['notifyNewCommentsByMail']) ? $args['notifyNewCommentsByMail'] : null, 'POST');
        $commentCheckedByDefault = FormUtil::getPassedValue('commentCheckedByDefault', isset($args['commentCheckedByDefault']) ? $args['commentCheckedByDefault'] : null, 'POST');
        $smallAvatars = FormUtil::getPassedValue('smallAvatars', isset($args['smallAvatars']) ? $args['smallAvatars'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        if (empty($mida)) {
            $mida = 0;
        }

        $select = '$$';
        foreach ($g as $g1) {
            $select .= $g1 . '$';
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'plus' => $this->__('Unregistered'),
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        $i = 0;
        $permisos = '$$';
        foreach ($groups as $group) {
            $permisos .= $group['id'] . '-' . $p[$i] . '$';
            $i++;
        }

        $marcat = '$$';
        foreach ($m as $m1) {
            $marcat .= $m1 . '$';
        }

        $verifica = '$$';
        foreach ($v as $v1) {
            $verifica .= $v1 . '$';
        }

        $this->setVar('grups', $select)
                ->setVar('permisos', $permisos)
                ->setVar('marcat', $marcat)
                ->setVar('verifica', $verifica)
                ->setVar('quiverifica', $q)
                ->setVar('caducitat', $c)
                ->setVar('repperdefecte', $r)
                ->setVar('colorrow1', $color1)
                ->setVar('colorrow2', $color2)
                ->setVar('colornewrow1', $colornew1)
                ->setVar('colornewrow2', $colornew2)
                ->setVar('attached', $attached)
                ->setVar('notRegisteredSeeRedactors', $notRegisteredSeeRedactors)
                ->setVar('multiLanguage', $multiLanguage)
                ->setVar('topicsSystem', $topicsSystem)
                ->setVar('shipHeadersLines', $shipHeadersLines)
                ->setVar('notifyNewEntriesByMail', $notifyNewEntriesByMail)
                ->setVar('editPrintAfter', $editPrintAfter)
                ->setVar('notifyNewCommentsByMail', $notifyNewCommentsByMail)
                ->setVar('commentCheckedByDefault', $commentCheckedByDefault)
                ->setVar('smallAvatars', $smallAvatars)
        ;

        LogUtil::registerStatus($this->__('The configuration has been modified'));
        return System::redirect(ModUtil::url('IWnoteboard', 'admin', 'main'));
    }

    /**
     * Show a form needed to create a new topic
     * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return	The form fields
     */
    public function noutema() {
        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Gets the groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup'),
                    'sv' => $sv));


        return $this->view->assign('grups', $groups)
                ->assign('title', $this->__('Create a new topic'))
                ->assign('submit', $this->__('Create the topic'))
                ->assign('nomtema', '')
                ->assign('descriu', '')
                ->assign('grup', 0)
                ->assign('tid', 0)
                ->fetch('IWnoteboard_admin_noutema.tpl');
    }

    /**
     * Create a new topic
     * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the topic information
     * @return	redirect the user to the main admin page
     */
    public function crear($args) {

        // get the parameters sended from the form
        $nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        // create the new topic
        $lid = ModUtil::apiFunc('IWnoteboard', 'admin', 'crear', array('nomtema' => $nomtema,
                    'descriu' => $descriu,
                    'grup' => $grup));

        if ($lid != false) {
            // Success
            LogUtil::registerStatus($this->__('A new topic has been created'));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::apiFunc('IWmain', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
                        'module' => 'IWnoteboard',
                        'sv' => $sv));
        }

        // Redirect to the main site for the admin
        return System::redirect(ModUtil::url('IWnoteboard', 'admin', 'main'));
    }

    /**
     * Give access to a form from where the topics information can be edited
     * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the topic id
     * @return	The topics edit form
     */
    public function editar($args) {

        // Get parameters from whatever input we need
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'GET');
        if (!empty($objectid)) {
            $tid = $objectid;
        }

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $registre = ModUtil::apiFunc('IWnoteboard', 'user', 'gettema', array('tid' => $tid));

        if ($registre == false) {
            LogUtil::registerError($this->__('The topic has not been found'));
            return System::redirect(ModUtil::url('IWnoteboard', 'admin', 'main'));
        }

        // Get all the groups
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('plus' => $this->__('All'),
                    'sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));

        return $this->view->assign('tid', $tid)
                ->assign('title', $this->__('Edit a topic'))
                ->assign('nomtema', $registre['nomtema'])
                ->assign('descriu', $registre['descriu'])
                ->assign('grup', $registre['grup'])
                ->assign('grups', $groups)
                ->assign('submit', $this->__('Modify the topic'))
                ->assign('m', 1)
                ->fetch('IWnoteboard_admin_noutema.tpl');
    }

    /**
     * Update a topic information
     * @author	Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @param:	args   Array with the arguments needed
     * @return	Redirect the user to the admin main page
     */
    public function modificar($args) {

        // Get parameters from whatever input we need
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
        $nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $this->checkCsrfToken();

        $lid = ModUtil::apiFunc('IWnoteboard', 'admin', 'modificar', array('tid' => $tid,
                    'nomtema' => $nomtema,
                    'descriu' => $descriu,
                    'grup' => $grup));
        if ($lid != false) {
            // Success
            LogUtil::registerStatus($this->__('The topic has been modified'));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            ModUtil::apiFunc('IWmain', 'user', 'usersVarsDelModule', array('name' => 'nbtopics',
                        'module' => 'IWnoteboard',
                        'sv' => $sv));
        }

        // Return to admin pannel
        return System::redirect(ModUtil::url('IWnoteboard', 'admin', 'main'));
    }

}
