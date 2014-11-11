<?php

class IWstats_Controller_Admin extends Zikula_AbstractController {

    protected function postInitialize() {
        // Set caching to false by default.
        $this->view->setCaching(false);
    }

    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        return System::redirect(ModUtil::url('IWstats', 'admin', 'view'));
    }

    public function view($args) {
        $statsSaved = unserialize(SessionUtil::getVar('statsSaved'));

        $registered = (isset($statsSaved['registered'])) ? $statsSaved['registered'] : 0;
        $moduleId = (isset($statsSaved['moduleId'])) ? $statsSaved['moduleId'] : 0;
        $ip = (isset($statsSaved['ip'])) ? $statsSaved['ip'] : 0;

        $startnum = FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GETPOST');
        $moduleId = FormUtil::getPassedValue('moduleId', isset($args['moduleId']) ? $args['moduleId'] : $moduleId, 'GETPOST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : $statsSaved['uname'], 'GETPOST');
        $ip = FormUtil::getPassedValue('ip', isset($args['ip']) ? $args['ip'] : $ip, 'GETPOST');
        $registered = FormUtil::getPassedValue('registered', isset($args['registered']) ? $args['registered'] : $registered, 'GETPOST');
        $reset = FormUtil::getPassedValue('reset', isset($args['reset']) ? $args['reset'] : 0, 'GET');
        $fromDate = FormUtil::getPassedValue('fromDate', isset($args['fromDate']) ? $args['fromDate'] : null, 'GETPOST');
        $toDate = FormUtil::getPassedValue('toDate', isset($args['toDate']) ? $args['toDate'] : null, 'GETPOST');

        SessionUtil::setVar('statsSaved', serialize(array('moduleId' => $moduleId,
                    'uname' => $uname,
                    'ip' => $ip,
                    'registered' => $registered,
                )));

        if ($reset == 1) {
            $ip = null;
            $uname = null;
            $registered = 0;
            $moduleId = 0;
            SessionUtil::delVar('statsSaved');
        }

        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $uid = 0;
        $rpp = 50;
        $lastDays = 10;

        if ($uname != null && $uname != '') {
            // get user id from uname
            $uid = UserUtil::getIdFromName($uname);
            if (!$uid) {
                LogUtil::registerError(__f('User \'%s\' not found', array($uname)));
                $uname = '';
            }
        }

        $time = time();

        if ($fromDate != null) {
            $fromDate = mktime(0, 0, 0, substr($fromDate, 3, 2), substr($fromDate, 0, 2), substr($fromDate, 6, 4));
            $fromDate = date('Y-m-d 00:00:00', $fromDate);
            $fromDate = DateUtil::makeTimestamp($fromDate);
            $fromDate = date('d-m-Y', $fromDate);
        } else {
            $fromDate = date('d-m-Y', $time - $lastDays * 24 * 60 * 60);
        }

        if ($toDate != null) {
            $toDate = mktime(0, 0, 0, substr($toDate, 3, 2), substr($toDate, 0, 2), substr($toDate, 6, 4));
            $toDate = date('Y-m-d 00:00:00', $toDate);
            $toDate = DateUtil::makeTimestamp($toDate);
            $toDate = date('d-m-Y', $toDate);
        } else {
            $toDate = date('d-m-Y', $time);
        }

        // get last records
        $records = ModUtil::apiFunc('IWstats', 'user', 'getAllRecords', array('rpp' => $rpp,
                    'init' => $startnum,
                    'moduleId' => $moduleId,
                    'uid' => $uid,
                    'ip' => $ip,
                    'registered' => $registered,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                ));

        // get last records
        $nRecords = ModUtil::apiFunc('IWstats', 'user', 'getAllRecords', array('onlyNumber' => 1,
                    'moduleId' => $moduleId,
                    'uid' => $uid,
                    'ip' => $ip,
                    'registered' => $registered,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                ));

        $usersList = '';
        foreach ($records as $record) {
            if ($record['params'] != '') {
                $valueArray = array();
                $paramsArray = explode('&', $record['params']);
                foreach ($paramsArray as $param) {
                    $value = explode('=', $param);
                    $valueArray[$value[0]] = $value[1];
                }
                if ($record['moduleid'] > 0) {
                    $records[$record['statsid']]['func'] = (isset($valueArray['func'])) ? $valueArray['func'] : 'main';
                    $records[$record['statsid']]['type'] = (isset($valueArray['type'])) ? $valueArray['type'] : 'user';
                } else {
                    $records[$record['statsid']]['func'] = '';
                    $records[$record['statsid']]['type'] = '';
                }

                $params = '';
                foreach ($valueArray as $key => $v) {
                    if ($key != 'module' && $key != 'func' && $key != 'type') {
                        $params .= $key . '=' . $v . '&';
                    }
                }
            } else {
                $params = '';
                if ($record['moduleid'] > 0) {
                    $records[$record['statsid']]['func'] = 'main';
                    $records[$record['statsid']]['type'] = 'user';
                } else {
                    $records[$record['statsid']]['func'] = '';
                    $records[$record['statsid']]['type'] = '';
                }
            }

            $params = str_replace('%3F', '?', $params);
            $params = str_replace('%3D', '=', $params);
            $params = str_replace('%2F', '/', $params);
            $params = str_replace('%26', '&', $params);
            $params = str_replace('%7E', '~', $params);

            $records[$record['statsid']]['params'] = substr($params, 0, -1);

            $usersList .= $record['uid'] . '$$';
        }

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ncc',
                    'sv' => $sv,
                    'list' => $usersList));

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $usersMails = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                    'sv' => $sv,
                    'list' => $usersList));

        $users[0] = $this->__('Unregistered');

        // get all modules
        $modules = ModUtil::apiFunc('Extensions', 'admin', 'listmodules', array('state' => 0));

        $skippedModulesArray = unserialize(ModUtil::getVar('IWstats', 'modulesSkipped'));
        $modulesNames = array();
        $modulesArray = array();
        if (!is_array($skippedModulesArray))
            $skippedModulesArray = array();
        foreach ($modules as $module) {
            if (!in_array($module['id'], $skippedModulesArray)) {
                $modulesNames[$module['id']] = $module['name'];
                $modulesArray[] = array('id' => $module['id'],
                    'name' => $module['name']);
            }
        }

        // Create output object
        return $this->view->assign('records', $records)
                        ->assign('users', $users)
                        ->assign('usersMails', $usersMails)
                        ->assign('pager', array('numitems' => $nRecords, 'itemsperpage' => $rpp))
                        ->assign('modulesNames', $modulesNames)
                        ->assign('modulesArray', $modulesArray)
                        ->assign('moduleId', $moduleId)
                        ->assign('url', System::getBaseUrl())
                        ->assign('uname', $uname)
                        ->assign('registered', $registered)
                        ->assign('fromDate', $fromDate)
                        ->assign('toDate', $toDate)
                        ->assign('maxDate', date('Ymd', time()))
                        ->fetch('IWstats_admin_view.htm');
    }

    public function reset($args) {
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');
        $deleteFromDays = FormUtil::getPassedValue('deleteFromDays', isset($args['deleteFromDays']) ? $args['deleteFromDays'] : $this->getVar('deleteFromDays'), 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Check for confirmation.
        if (empty($confirmation)) {
            return $this->view->assign('deleteFromDays', $deleteFromDays)
                            ->fetch('IWstats_admin_reset.htm');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // reset the site statistics
        if (!ModUtil::apiFunc('IWstats', 'admin', 'reset', array('deleteFromDays' => $deleteFromDays))) {
            LogUtil::registerError($this->__('IWstats reset error.'));
            return System::redirect(ModUtil::url('IWstats', 'admin', 'main'));
        }
        // Success
        LogUtil::registerStatus($this->__('IWstats reset'));
        return System::redirect(ModUtil::url('IWstats', 'admin', 'main'));
    }

    /**
     * Modify configuration
     *
     * @author       The Zikula Development Team
     * @return       output       The configuration page
     */
    public function modifyconfig() {
        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // get all modules
        $modules = ModUtil::apiFunc('Extensions', 'admin', 'listmodules', array('state' => 0));

        $moduleIds = unserialize(ModUtil::getVar('IWstats', 'modulesSkipped'));
        if (!is_array($moduleIds))
            $moduleIds = array();
        $i = 0;
        foreach ($modules as $module) {
            $modules[$i]['active'] = (in_array($module['id'], $moduleIds)) ? 1 : 0;
            $i++;
        }
        $deleteFromDays = $this->getVar('deleteFromDays');
        $keepDays = $this->getVar('keepDays');

        // Assign all the module variables to the template
        return $this->view->assign('skippedIps', ModUtil::getVar('IWstats', 'skippedIps'))
                        ->assign('modules', $modules)
                        ->assign('deleteFromDays', $deleteFromDays)
                        ->assign('keepDays', $keepDays)
                        ->fetch('IWstats_admin_modifyconfig.htm');
    }

    /**
     * Update the configuration
     *
     * @author       Mark West
     * @param        bold           print items in bold
     * @param        itemsperpage   number of items per page
     */
    public function updateconfig($args) {
        $skippedIps = FormUtil::getPassedValue('skippedIps', isset($args['skippedIps']) ? $args['skippedIps'] : 1, 'POST');
        $moduleId = FormUtil::getPassedValue('moduleId', isset($args['moduleId']) ? $args['moduleId'] : array(), 'POST');
        $deleteFromDays = FormUtil::getPassedValue('deleteFromDays', isset($args['deleteFromDays']) ? $args['deleteFromDays'] : 90, 'POST');
        $keepDays = FormUtil::getPassedValue('keepDays', isset($args['keepDays']) ? $args['keepDays'] : 90, 'POST');


        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        $modulesIdArray = array();
        foreach ($moduleId as $m) {
            $modulesIdArray[] = $m;
        }

        $this->setVar('skippedIps', $skippedIps)
                ->setVar('modulesSkipped', serialize($modulesIdArray))
                ->setvar('deleteFromDays', $deleteFromDays)
                ->setvar('keepDays', $keepDays);

        ModUtil::apiFunc('IWstats', 'admin', 'skipModules', array('moduleId' => $moduleId));

        $view = Zikula_View::getInstance('IWstats', false);

        // The configuration has been changed, so we clear all caches for this module.
        $view->clear_all_cache();

        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        return System::redirect(ModUtil::url('IWstats', 'admin', 'modifyconfig'));
    }

    public function deleteIp($args) {
        $ip = FormUtil::getPassedValue('ip', isset($args['ip']) ? $args['ip'] : 1, 'GETPOST');
        $confirm = FormUtil::getPassedValue('confirm', isset($args['confirm']) ? $args['confirm'] : 0, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        if (!$confirm) {
            return $this->view->assign('ip', $ip)
                            ->fetch('IWstats_admin_deleteip.htm');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        if (!ModUtil::apiFunc('IWstats', 'admin', 'deleteIp', array('ip' => $ip))) {
            LogUtil::registerError(__f('Error deleting the ip \'%s\'', array($ip)));
            return System::redirect(ModUtil::url('IWstats', 'admin', 'view'));
        }

        // Success
        LogUtil::registerStatus(__f('Ip \'%s\' deleted', array($ip)));
        return System::redirect(ModUtil::url('IWstats', 'admin', 'view'));
    }

    public function viewStats($args) {
        $statsSaved = unserialize(SessionUtil::getVar('statsSaved'));

        $moduleName = (isset($statsSaved['moduleName'])) ? $statsSaved['moduleName'] : '';
        $fromDate = (isset($statsSaved['fromDate'])) ? $statsSaved['fromDate'] : null;
        $toDate = (isset($statsSaved['toDate'])) ? $statsSaved['toDate'] : '';

        $moduleName = FormUtil::getPassedValue('moduleName', isset($args['moduleName']) ? $args['moduleName'] : $moduleName, 'GETPOST');
        $uname = FormUtil::getPassedValue('uname', isset($args['uname']) ? $args['uname'] : $statsSaved['uname'], 'GETPOST');
        $fromDate = FormUtil::getPassedValue('fromDate', isset($args['fromDate']) ? $args['fromDate'] : $fromDate, 'GETPOST');
        $toDate = FormUtil::getPassedValue('toDate', isset($args['toDate']) ? $args['toDate'] : $toDate, 'GETPOST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : 0, 'GETPOST');

        if ($uid > 0) {
            $uname = UserUtil::getVar('uname', $uid);
        }

        SessionUtil::setVar('statsSaved', serialize(array('uname' => $uname,
                    'moduleName' => $moduleName,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                )));


        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        $uid = 0;
        $rpp = 50;
        $lastDays = 10;
        $nusers = 0;

        if ($uname != null && $uname != '') {
            // get user id from uname
            $uid = UserUtil::getIdFromName($uname);
            if (!$uid) {
                LogUtil::registerError(__f('User \'%s\' not found', array($uname)));
                $uname = '';
            }
        }

        $time = time();

        if ($fromDate != null) {
            $fromDate = mktime(0, 0, 0, substr($fromDate, 3, 2), substr($fromDate, 0, 2), substr($fromDate, 6, 4));
            $fromDate = date('Y-m-d 00:00:00', $fromDate);
            $fromDate = DateUtil::makeTimestamp($fromDate);
            $fromDate = date('d-m-Y', $fromDate);
        } else {
            $fromDate = date('d-m-Y', $time - $lastDays * 24 * 60 * 60);
        }

        if ($toDate != null) {
            $toDate = mktime(0, 0, 0, substr($toDate, 3, 2), substr($toDate, 0, 2), substr($toDate, 6, 4));
            $toDate = date('Y-m-d 00:00:00', $toDate);
            $toDate = DateUtil::makeTimestamp($toDate);
            $toDate = date('d-m-Y', $toDate);
        } else {
            $toDate = date('d-m-Y', $time);
        }

        // get last records
        $records = ModUtil::apiFunc('IWstats', 'user', 'getAllSummary', array('rpp' => -1,
                    'init' => -1,
                    'fromDate' => $fromDate,
                    'toDate' => $toDate,
                ));

        // get all modules
        $modules = ModUtil::apiFunc('Extensions', 'admin', 'listmodules', array('state' => 0));

        foreach ($modules as $module) {
            $modulesNames[$module['id']] = $module['name'];
            $modulesArray[] = array('id' => $module['id'],
                'name' => $module['name']);
        }

        $modulesNames[0] = $this->__('unknown');

        $usersListArray = array();
        $moduleStatsArray = array();
        $userModulesArray = array();
        $userArray = array();
        $moduleArray = array();
        $usersForModule = array();
        $users = array();
        $usersIpCounter = 0;
        $nRecords = 0;
        $userNRecords = 0;
        $usersList = '';
        $userName = '';
        foreach ($records as $record) {
            $nRecords = $nRecords + $record['nrecords'];
            $usersIpCounter = $usersIpCounter + $record['nips'];
            $users = explode('$$', substr($record['users'], 1, -1)); // substr to remove $ in the begining and the end of the string
            foreach ($users as $user) {
                $oneUser = explode('|', $user);

                if (!in_array($oneUser[0], $usersListArray)) {
                    $nusers++;
                    $usersListArray[] = $oneUser[0];
                }
                if ($oneUser[0] == $uid && $uid > 0) {
                    $userInit = '$' . $uid . '|';
                    $userDataPos = strpos($record['users'], $userInit);
                    $subDataPre = substr($record['users'], $userDataPos + strlen($userInit));
                    $userDataPos = strpos($subDataPre, '$');
                    $subDataPre = substr($subDataPre, 0, $userDataPos);
                    $userModules = explode('#', $subDataPre);
                    foreach ($userModules as $module) {
                        $oneModule = explode('=', $module);
                        if (array_key_exists($modulesNames[$oneModule[0]], $userModulesArray)) {
                            $userModulesArray[$modulesNames[$oneModule[0]]] = $oneModule[1];
                        } else {
                            $userModulesArray[$modulesNames[$oneModule[0]]] = $userModulesArray[$modulesNames[$oneModule[0]]] + $oneModule[1];
                        }

                        $userNRecords = $userNRecords + $oneModule[1];
                    }
                }
                if ($moduleName != '') {
                    $moduleId = ModUtil::getIdFromName($moduleName);
                    if ((strpos($oneUser[1], $moduleId . '=') !== false && strpos($oneUser[1], $moduleId . '=') == 0) || strpos($oneUser[1], '#' . $moduleId . '=') !== false) {
                        // get the number of views
                        $pos = strpos($oneUser[1], $moduleId . '=');
                        if ($pos != 0) {
                            $pos = strpos($oneUser[1], '#' . $moduleId . '=');
                        }
                        $preString = substr($oneUser[1], $pos);
                        //print $preString . '<br />';
                        if ($pos != 0) {
                            $preString = substr($preString, 1);
                        }
                        $pos = strpos($preString, '#');
                        $preString = ($pos == 0) ? $preString : substr($preString, 0, $pos);
                        $num = explode('=', $preString);
                        if (!array_key_exists($oneUser[0], $usersForModule)) {
                            $usersForModule[$oneUser[0]] = $num[1];
                            $usersList .= $oneUser[0] . '$$';
                        } else {
                            $usersForModule[$oneUser[0]] = $usersForModule[$oneUser[0]] + $num[1];
                        }
                    }
                }
            }

            $modules = explode('$$', substr($record['modules'], 1, -1)); // substr to remove $ in the begining and the end of the string
            foreach ($modules as $module) {
                $oneModule = explode('|', $module);
                if (isset($modulesNames[$oneModule[0]])) {
                    if (!array_key_exists($modulesNames[$oneModule[0]], $moduleStatsArray)) {
                        $moduleStatsArray[$modulesNames[$oneModule[0]]] = $oneModule[1];
                    } else {
                        $moduleStatsArray[$modulesNames[$oneModule[0]]] = $moduleStatsArray[$modulesNames[$oneModule[0]]] + $oneModule[1];
                    }
                }
            }
        }

        ksort($userModulesArray);

        if ($uid > 0) {
            $userArray = array('nRecords' => $userNRecords,
                'userModulesArray' => $userModulesArray,
            );
        }

        ksort($moduleStatsArray);

        if ($uid > 0) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $userName = ModUtil::func('IWmain', 'user', 'getUserInfo', array('info' => 'ncc',
                        'sv' => $sv,
                        'uid' => $uid));
        }

        if ($moduleName != '') {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ncc',
                        'sv' => $sv,
                        'list' => $usersList,
                    ));
            $users[0] = $this->__('Unregistered');
        }

        return $this->view->assign('users', $users)
                        ->assign('nRecords', $nRecords)
                        ->assign('nusers', $nusers)
                        ->assign('userName', $userName)
                        ->assign('usersIpCounter', $usersIpCounter)
                        ->assign('modulesNames', $modulesNames)
                        ->assign('modulesArray', $modulesArray)
                        ->assign('moduleName', $moduleName)
                        ->assign('uname', $uname)
                        ->assign('fromDate', $fromDate)
                        ->assign('toDate', $toDate)
                        ->assign('userArray', $userArray)
                        ->assign('maxDate', date('Ymd', time()))
                        ->assign('usersForModule', $usersForModule)
                        ->assign('moduleStatsArray', $moduleStatsArray)
                        ->fetch('IWstats_admin_stats.htm');
    }

    public function summary() {
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            //throw new Zikula_Exception_Forbidden();
        }

        $days = 2;

        ModUtil::apiFunc('IWstats', 'admin', 'summary', array('days' => $days,
        ));

        // Success
        LogUtil::registerStatus($this->__('Summary reported'));
        return System::redirect(ModUtil::url('IWstats', 'admin', 'view'));
    }

    public function purgeOldRecords() {

        ModUtil::apiFunc('IWstats', 'admin', 'purgeOldRecords', array());
        
        return true;
    }

}