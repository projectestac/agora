<?php

class IWnoteboard_Block_Nbheadlines extends Zikula_Controller_AbstractBlock {

    /**
     * initialise block
     *
     * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
     */
    public function init() {
        //Sentï¿œncia de seguretat
        SecurityUtil::registerPermissionSchema('IWnoteboard:nbheadlinesBlock:', 'Block title::');
    }

    /**
     * get information on block
     *
     * @author       Albert PÃ©rez Monfort (aperezm@xtec.cat)
     * @return       array       The block information
     */
    public function info() {
        //Values
        return array('text_type' => 'nbheadlines',
            'module' => 'IWnoteboard',
            'text_type_long' => $this->__('Show the NoteBoard headlines'),
            'allow_multiple' => true,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    /**
     * Gets headlines information
     *
     * @author		Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     */
    public function display($row) {
        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard:nbheadlinesBlock:', $row['title'] . "::", ACCESS_READ)) {
            return false;
        }

        $uid = UserUtil::getVar('uid');

        if (!isset($uid)) {
            $uid = '-1';
        }

        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'nbheadlines',
                    'module' => 'IWnoteboard',
                    'uid' => $uid,
                    'sv' => $sv));

        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $uid,
                        'name' => 'nbheadlines',
                        'module' => 'IWnoteboard',
                        'sv' => $sv,
                        'nult' => true));
            $row['content'] = $s;
            return BlockUtil::themesideblock($row);
        }

        $view = Zikula_View::getInstance('IWnoteboard', false);

        //Cridem la funciï¿œ API que retornarï¿œ la informaciï¿œ dels tï¿œtulars de les notï¿œcies
        $registres = ModUtil::apiFunc('IWnoteboard', 'user', 'getalltitulars');

        // Get all users information needed
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersFullname = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'nc',
                    'sv' => $sv));

        $en_te = false;
        $n = 0;
        foreach ($registres as $registre) {
            $permisos = ModUtil::apiFunc('IWnoteboard', 'user', 'permisos', array('uid' => $uid));
            //separem la llista de grups que tenen accï¿œs a la notï¿œcia i ho posem en una matriu
            $grups_acces = explode('$', $registre['destinataris']);
            $esta_en_grups_acces = array_intersect($grups_acces, $permisos['grups']);
            $pos = strpos($registre['no_mostrar'], '$' . $uid . '$');
            if (($registre['verifica'] == 1 &&
                    count($esta_en_grups_acces) >= 1 &&
                    $pos == 0)) {
                if ($registre['tid'] == 0) {
                    $tema = $this->__('Not classified');
                    $registre['tid'] = -1;
                } else {
                    //Recollim el nom del tema
                    $temes = ModUtil::apiFunc('IWnoteboard', 'user', 'gettema', array('tid' => $registre['tid']));

                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    if (ModUtil::func('IWmain', 'user', 'isMember', array('uid' => UserUtil::getVar('uid'),
                                'gid' => $temes['grup'],
                                'sv' => $sv))) {
                        $tema = $temes['nomtema'];
                    } else {
                        $tema = $this->__('Not classified');
                    }
                }
                if ($tema == "") {
                    $tema = $this->__('Topic not found');
                }

                $n++;
                $bgcolor = ($n % 2 == 0) ? ModUtil::getVar('IWnoteboard', 'colorrow1') : ModUtil::getVar('IWnoteboard', 'colorrow2');
                $titulars[] = array('tid' => $registre['tid'],
                    'nid' => $registre['nid'],
                    'titular' => DataUtil::formatForDisplayHTML($registre['titular']),
                    'tema' => $tema,
                    'bgcolor' => $bgcolor,
                    'informa' => $usersFullname[$registre['informa']]);
                $en_te = true;
            }
        }

        if (!$en_te) {
            return false;
        }
        $view->assign('titulars', $titulars);
        $view->assign('notRegisteredSeeRedactors', ModUtil::getVar('IWnoteboard', 'notRegisteredSeeRedactors'));
        $view->assign('loggedIn', UserUtil::isLoggedIn());

        $s = $view->fetch('IWnoteboard_block_headlines.tpl');

        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $uid,
                    'name' => 'nbheadlines',
                    'module' => 'IWnoteboard',
                    'sv' => $sv,
                    'value' => $s,
                    'lifetime' => '500'));

        $row['content'] = $s;
        return BlockUtil::themesideblock($row);
    }

}
