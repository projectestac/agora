<?php

class IWjclic_Controller_User extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * Show the activities that a user have assigned to other users
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The list of assigned jclic activities
     */
    public function main() {
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        // The main page for users who can assign activities is the assigned activities
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            return System::redirect(ModUtil::url('IWjclic', 'user', 'assigned'));
        }
        $activitiesAssignedArray = array();

        //get the activities that the user have assigned to other users
        $activitiesAssigned = ModUtil::apiFunc('IWjclic', 'user', 'getAllActivitiesAssigned');
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $allGroups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv));
        foreach ($allGroups as $group) {
            $allGroupsArray[$group['id']] = $group['name'];
        }
        foreach ($activitiesAssigned as $activity) {
            //get assigned groups
            $groups = ModUtil::apiFunc('IWjclic', 'user', 'getGroups', array('jid' => $activity['jid']));
            $groupsString = '';
            foreach ($groups as $group) {
                $groupsString .= $allGroupsArray[$group['group_id']] . '<br />';
            }
            $limitDate = ($activity['limitDate'] != '') ? date('d/m/y', $activity['limitDate']) : '';
            $initDate = ($activity['initDate'] != '') ? date('d/m/y', $activity['initDate']) : '';
            $activitiesAssignedArray[] = array('groups' => $groupsString,
                'name' => $activity['name'],
                'description' => $activity['description'],
                'observations' => $activity['observations'],
                'jid' => $activity['jid'],
                'active' => $activity['active'],
                'width' => $activity['width'],
                'height' => $activity['height'],
                'skin' => $activity['skin'],
                'scoreToOptain' => $activity['scoreToOptain'],
                'solvedToOptain' => $activity['solvedToOptain'],
                'limitDate' => $limitDate,
                'initDate' => $initDate,
            );
        }
        $skinsArray = array('@default.xml' => 'default',
            '@blue.xml' => 'blue',
            '@orange.xml' => 'orange',
            '@green.xml' => 'green',
            '@simple.xml' => 'simple',
            '@mini.xml' => 'mini');
        // Create output object
        return $this->view->assign('skinsArray', $skinsArray)
                        ->assign('activitiesAssigned', $activitiesAssignedArray)
                        ->fetch('IWjclic_user_main.htm');
    }

    /**
     * Show the activities that a user have got assigned
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	The list of assigned jclic activities
     */
    public function assigned() {
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $activitiesArray = array();
        //get the activities that the user have assigned 
        $activities = ModUtil::apiFunc('IWjclic', 'user', 'getAllActivities');
        foreach ($activities as $activity) {
            $content = ModUtil::func('IWjclic', 'user', 'getActivityContent', array('jid' => $activity['jid']));
            $activitiesArray[] = $content;
        }
        // Create output object
        return $this->view->assign('activities', $activitiesArray)
                        ->fetch('IWjclic_user_assigned.htm');
    }

    /**
     * get activity content
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The activity identity
     * @return:	true or false depending on the activity state
     */
    public function getActivityContent($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        // Security check
        if (!ModUtil::func('IWjclic', 'user', 'canAccess', array('jid' => $jid))) {
            throw new Zikula_Exception_Forbidden();
        }
        //get jclic activity
        $activity = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($activity == false) {
            LogUtil::registerError($this->__('Could not find the allocation requested'));
            return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
        }
        $extended = (strpos($activity['extended'], '$' . UserUtil::getVar('uid') . '$') !== false) ? 1 : 0;
        $sessions = ModUtil::apiFunc('IWjclic', 'user', 'getSessions', array('jid' => $activity['jid']));
        $attempsMade = count($sessions);
        $attempsToDo = ($activity['maxattempts'] == -1) ? $this->__('Unlimited') : $activity['maxattempts'] - $attempsMade;
        //calc activity state
        //if the the attempsToDo = 0 the state is closed
        $state = (ModUtil::func('IWjclic', 'user', 'getActivityState', array('jid' => $activity['jid']))) ? 1 : 0;
        //get all users information
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $userInfo = ModUtil::func('IWmain', 'user', 'getUserInfo', array('sv' => $sv,
                    'uid' => $activity['user'],
                    'info' => 'ncc'));

        $limitDate = ($activity['limitDate'] != '') ? date('d/M/Y', $activity['limitDate']) : '';
        $initDate = ($activity['initDate'] != '') ? date('d/M/Y', $activity['initDate']) : '';

        $activityArray = array('jid' => $activity['jid'],
            'user' => $userInfo,
            'description' => $activity['description'],
            'name' => $activity['name'],
            'attempsMade' => $attempsMade,
            'attempsToDo' => $attempsToDo,
            'extended' => $extended,
            'state' => $state,
            'limitDate' => $limitDate,
            'initDate' => $initDate,
            'date' => date('d/M/Y', $activity['date']));
        return $activityArray;
    }

    /**
     * get activity state
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The activity identity
     * @return:	true or false depending on the activity state
     */
    public function canAccess($args) {
        //CONTINUAR AQUÍ
        return true;
    }

    /**
     * get activity state
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:		The activity identity
     * @return:	true or false depending on the activity state
     */
    public function getActivityState($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            LogUtil::registerError($this->__('Could not find the allocation requested'));
            return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
        }
        $sessions = ModUtil::apiFunc('IWjclic', 'user', 'getSessions', array('jid' => $jclic['jid']));
        $attempsMade = count($sessions);
        $attempsToDo = ($jclic['maxattempts'] == -1) ? '-1000' : $jclic['maxattempts'] - $attempsMade;
        $state = ($attempsToDo <= 0 && $attempsToDo != -1000) ? 0 : 1;
        $time = time();
        if ($state) {
            $state = ($jclic['initDate'] > $time && $jclic['initDate'] != '') ? 0 : 1;
        }
        if ($state) {
            $state = ($jclic['limitDate'] < $time && $jclic['limitDate'] != '') ? 0 : 1;
        }
        return $state;
    }

    /**
     * Give access to an activity to an user
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Activity identity
     * @return:	The list of assigned jclic activities
     */
    public function activity($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'GET');
        $test = FormUtil::getPassedValue('test', isset($args['test']) ? $args['test'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $file = false;
        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            LogUtil::registerError($this->__('Could not find the allocation requested'));
            return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
        }
        if ($test == null) {
            //check if user can access the activity to solve it
            /*
              //Check if user can access to the activity
              if($jclic['user'] != UserUtil::getVar('uid')){
              LogUtil::registerError ($this->__('You do not have access to edit the activity'));
              return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
              }
             */
            //CONTINUAR AQUÍ
            if (!ModUtil::func('IWjclic', 'user', 'getActivityState', array('jid' => $jid))) {
                LogUtil::registerError($this->__('You don\'t have acces to the activity'));
                return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
            }
        } else {
            //check if user has assigned the activity
            //CONTINUAR AQUÍ
        }
        $jclicJarBase = ModUtil::getVar('IWjclic', 'jclicJarBase');
        $jclicJarBase = (substr($jclicJarBase, strlen($jclicJarBase) - 1, 1) == '/') ? substr($jclicJarBase, 0, -1) : $jclicJarBase;

        if ($jclic['url'] == '') {
            $url = ModUtil::getVar('IWjclic', 'jclicUpdatedFiles') . '/' . $jclic['file'];
            $file = true;
        } else {
            $url = $jclic['url'];
        }
        return $this->view->assign('jclicJarBase', $jclicJarBase)
                        ->assign('file', $file)
                        ->assign('jclic', $jclic)
                        ->assign('url', $url)
                        ->assign('test', $test)
                        ->assign('userid', UserUtil::getVar('uid'))
                        ->assign('timeLap', ModUtil::getVar('IWjclic', 'timeLap'))
                        ->fetch('IWjclic_user_activity.htm');
    }

    /**
     * Get a file from a server folder even it is out of the public html directory
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	name of the file that have to be gotten
     * @return:	The file information
     */
    public function getFile($args) {
        // File name with the path
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'getFile', array('fileName' => $fileName,
                    'sv' => $sv));
    }

    /**
     * Show a form to create new assignations
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     *
     * @return:	The form needed to create new assignations
     */
    public function assig($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'REQUEST');

        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        $noWriteable = false;
        $noFolder = false;

        if ($jid != null) {
            //get jclic activity
            $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
            if ($jclic == false) {
                LogUtil::registerError($this->__('Could not find the allocation requested'));
                return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
            }
            //Check if user can edit the activity because he/she is the owner
            if ($jclic['user'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You do not have access to edit the activity'));
                return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
            }
            //get the groups that have this activity assigned
            $groupsAssigned = ModUtil::apiFunc('IWjclic', 'user', 'getGroups', array('jid' => $jid));
            if (count($groupsAssigned) > 0) {
                $groupsString = '$';
            }
            foreach ($groupsAssigned as $group) {
                $groupsString .= $group['group_id'] . '$';
            }
            $jclic['limitDate'] = ($jclic['limitDate'] != '') ? date("d/m/y", $jclic['limitDate']) : '';
            $jclic['initDate'] = ($jclic['initDate'] != '') ? date("d/m/y", $jclic['initDate']) : '';
            $mode = "edit";
        } else {
            $jclicUpdatedFiles = ModUtil::getVar('IWjclic', 'jclicUpdatedFiles');
            if (!file_exists(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $jclicUpdatedFiles) || $jclicUpdatedFiles == '') {
                $noFolder = true;
            } else {
                if (!is_writeable(ModUtil::getVar('IWmain', 'documentRoot') . '/' . $jclicUpdatedFiles)) {
                    $noWriteable = true;
                }
            }
            $mode = "create";
            $jclic = array('width' => "600",
                'height' => "400",
                'skin' => '',
                'maxattempts' => '',
                'jid' => 0,
                'name' => '',
                'description' => '',
                'scoreToOptain' => '',
                'active' => 0,
                'observations' => '',
                'initDate' => '',
                'limitDate' => '',
                'solvedToOptain' => '',
            );
            $groupsString = '';
        }
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $groups = ModUtil::func('IWmain', 'user', 'getAllGroups', array('sv' => $sv,
                    'less' => ModUtil::getVar('iw_myrole', 'rolegroup')));
        $groupsProAssign = ModUtil::getVar('IWjclic', 'groupsProAssign');
        foreach ($groups as $group) {
            if (strpos($groupsProAssign, '$' . $group['id'] . '$') != false) {
                $groupsArray[] = array('id' => $group['id'],
                    'name' => $group['name']);
            }
        }
        $iwJclicUrlHelp = $this->__('To add an activity of the <a href="http://clic.xtec.cat/db/listact_ca.jsp" target="_blank">library of activities </ a> of the clicZone, you must copy the address on your card. An example URL is: http://clic.xtec.cat/projects/quadres/jclic/quadres.jclic.zip. <br/> You can also add links to activities JClic published to any Web server, like : http://www.elmeuservidor.com/carpeta/activitat.jclic.zip or upload them directly to the server from files of activities available on the desktop. <br/>');
        $skinsArray = array('@default.xml' => 'default',
            '@blue.xml' => 'blue',
            '@orange.xml' => 'orange',
            '@green.xml' => 'green',
            '@simple.xml' => 'simple',
            '@mini.xml' => 'mini');
        $maxattemptsArray = array(1, 2, 3, 4, 5, 10);

        return $this->view->assign('groups', $groupsArray)
                        ->assign('groupsString', $groupsString)
                        ->assign('jclic', $jclic)
                        ->assign('mode', $mode)
                        ->assign('skinsArray', $skinsArray)
                        ->assign('maxattemptsArray', $maxattemptsArray)
                        ->assign('iwJclicUrlHelp', $iwJclicUrlHelp)
                        ->assign('noWriteable', $noWriteable)
                        ->assign('noFolder', $noFolder)
                        ->fetch('IWjclic_user_assig.htm');
    }

    /**
     * Submit an assignation to an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The activity parameters
     * @return:	Redirect user to home page
     */
    public function submitAssig($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $name = FormUtil::getPassedValue('name', isset($args['name']) ? $args['name'] : null, 'POST');
        $mode = FormUtil::getPassedValue('mode', isset($args['mode']) ? $args['mode'] : null, 'POST');
        $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
        $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
        $file = FormUtil::getPassedValue('file', isset($args['file']) ? $args['file'] : null, 'POST');
        $skin = FormUtil::getPassedValue('skin', isset($args['skin']) ? $args['skin'] : null, 'POST');
        $width = FormUtil::getPassedValue('width', isset($args['width']) ? $args['width'] : null, 'POST');
        $height = FormUtil::getPassedValue('height', isset($args['height']) ? $args['height'] : null, 'POST');
        $maxattempts = FormUtil::getPassedValue('maxattempts', isset($args['maxattempts']) ? $args['maxattempts'] : null, 'POST');
        $scoreToOptain = FormUtil::getPassedValue('scoreToOptain', isset($args['scoreToOptain']) ? $args['scoreToOptain'] : null, 'POST');
        $solvedToOptain = FormUtil::getPassedValue('solvedToOptain', isset($args['solvedToOptain']) ? $args['solvedToOptain'] : null, 'POST');
        $groups = FormUtil::getPassedValue('groups', isset($args['groups']) ? $args['groups'] : null, 'POST');
        $limitDate = FormUtil::getPassedValue('limitDate', isset($args['limitDate']) ? $args['limitDate'] : null, 'POST');
        $initDate = FormUtil::getPassedValue('initDate', isset($args['initDate']) ? $args['initDate'] : null, 'POST');
        $observations = FormUtil::getPassedValue('observations', isset($args['observations']) ? $args['observations'] : null, 'POST');
        $active = FormUtil::getPassedValue('active', isset($args['active']) ? $args['active'] : null, 'POST');
        $fileName = $_FILES['file']['name'];
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // check the date values
        if ($initDate != null) {
            $day = substr($initDate, 0, 2);
            $month = substr($initDate, 3, 2);
            $year = '20' . substr($initDate, -2);
            $initDate = mktime('00', '00', '01', $month, $day, $year);
        }
        // check the date values
        if ($limitDate != null) {
            $day = substr($limitDate, 0, 2);
            $month = substr($limitDate, 3, 2);
            $year = '20' . substr($limitDate, -2);
            $limitDate = mktime('23', '59', '00', $month, $day, $year);
        }
        $items = array('name' => $name,
            'description' => $description,
            'skin' => $skin,
            'width' => $width,
            'height' => $height,
            'maxattempts' => $maxattempts,
            'scoreToOptain' => $scoreToOptain,
            'solvedToOptain' => $solvedToOptain,
            'observations' => $observations,
            'active' => $active,
            'limitDate' => $limitDate,
            'initDate' => $initDate);
        //if mode is edit then update the activity. Otherwise create it
        if ($mode == "edit") {
            //get jclic activity
            $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
            if ($jclic == false) {
                LogUtil::registerError($this->__('Could not find the allocation requested'));
                return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
            }
            //Check if user can edit the activity because he/she is the owner
            if ($jclic['user'] != UserUtil::getVar('uid')) {
                LogUtil::registerError($this->__('You do not have access to edit the activity'));
                return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
            }
            //User can update the activity
            $edited = ModUtil::apiFunc('IWjclic', 'user', 'update', array('jid' => $jid,
                        'items' => $items));
            $result = ($edited) ? $this->__('The allocation has been edited successfully') : $this->__('There was an error in editing the property');
        } else {
            //update the file if it is necessari
            if ($fileName != '') {
                $folder = ModUtil::getVar('IWjclic', 'jclicUpdatedFiles');
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $update = ModUtil::func('IWmain', 'user', 'updateFile', array('sv' => $sv,
                            'folder' => $folder,
                            'file' => $_FILES['file']));
                //the function returns the error string if the update fails and and empty string if success
                if ($update['msg'] != '') {
                    LogUtil::registerError($update['msg'] . ' ' . $this->__('Unable to upload to the server. The mapping failed'));
                    return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
                } else {
                    $fileName = $update['fileName'];
                }
            }
            //Create a new assignament
            $items['url'] = $url;
            $items['file'] = $fileName;
            $created = ModUtil::apiFunc('IWjclic', 'user', 'create', array('items' => $items,
                        'groups' => $groups));
            $jid = $created;
            $result = ($created) ? $this->__('Has become a new allowance') : $this->__('There was an error creating the assignment');
            LogUtil::registerStatus($result);
        }
        if ($edited) {
            //edit groups
            $groupsEdited = ModUtil::apiFunc('IWjclic', 'user', 'editGroups', array('jid' => $jid,
                        'groups' => $groups));
            if ($groupsEdited) {
                LogUtil::registerStatus($result);
            } else {
                LogUtil::registerError($this->__('An error occurred while making allocations to selected groups'));
            }
        }
        return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
    }

    /**
     * Get the results for an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The activity identity
     * @return:	An array with the activity results
     */
    public function results($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $scoreToOptain = FormUtil::getPassedValue('scoreToOptain', isset($args['scoreToOptain']) ? $args['scoreToOptain'] : null, 'POST');
        $solvedToOptain = FormUtil::getPassedValue('solvedToOptain', isset($args['solvedToOptain']) ? $args['solvedToOptain'] : null, 'POST');
        $all = FormUtil::getPassedValue('all', isset($args['all']) ? $args['all'] : null, 'GET');
        if (!is_numeric($uid)) {
            $uid = UserUtil::getVar('uid');
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_READ) || !UserUtil::isLoggedIn()) {
            throw new Zikula_Exception_Forbidden();
        }

        $resultsArray = array();
        $totalTimeMsTotal = 0;
        $scoreTotal = 0;
        $activitiesOkTotal = 0;
        $activitiesNumberTotal = 0;

        //get the sessions for an activity
        $sessions = ModUtil::apiFunc('IWjclic', 'user', 'getSessions', array('jid' => $jid,
                    'uid' => $uid));
        foreach ($sessions as $session) {
            $activities = ModUtil::apiFunc('IWjclic', 'user', 'getActivities', array('session_id' => $session['session_id']));
            //count activity values
            $totalTimeMs = 0;
            $score = 0;
            $activitiesOk = 0;
            foreach ($activities as $activity) {
                $score = $score + $activity['qualification'];
                $totalTimeMs = $totalTimeMs + $activity['total_time'];
                $activitiesOk = $activitiesOk + $activity['activity_solved'];
            }
            //calc the puntuation
            $score = round($score / count($activities), 2);
            //calc the time
            $totalTime = ModUtil::func('IWjclic', 'user', 'calcTime', array('totalTime' => $totalTimeMs));
            $dateTime = round(str_replace($uid . '_', '', $session['session_id']) / 1000);
            $resultsArray[] = array('initDate' => date('d/m/y', $dateTime),
                'initTime' => date('H.i', $dateTime),
                'score' => $score,
                'totalTime' => $totalTime,
                'totalTimeMs' => $totalTimeMs,
                'activitiesOk' => $activitiesOk,
                'activitiesNumber' => count($activities));
        }
        if (count($resultsArray)) {
            foreach ($resultsArray as $result) {
                $scoreTotal = $scoreTotal + $result['score'];
                $totalTimeMsTotal = $totalTimeMsTotal + $result['totalTimeMs'];
                $activitiesOkTotal = $activitiesOkTotal + $result['activitiesOk'];
                $activitiesNumberTotal = $activitiesNumberTotal + $result['activitiesNumber'];
            }
        }
        if ($all == null) {
            $resultsArray = array();
        }
        $scoreAv = (count($sessions) > 0) ? round($scoreTotal / count($sessions), 2) : 0;
        $totalTimeAv = ModUtil::func('IWjclic', 'user', 'calcTime', array('totalTime' => (count($sessions) > 0) ? round($totalTimeMsTotal / count($sessions)) : 0));
        $totalTimeTotal = ModUtil::func('IWjclic', 'user', 'calcTime', array('totalTime' => $totalTimeMsTotal));
        $activitiesOkAv = (count($sessions) > 0) ? round($activitiesOkTotal / count($sessions), 2) : 0;
        $activitiesNumberAv = (count($sessions) > 0) ? round($activitiesNumberTotal / count($sessions), 2) : 0;
        $scoreOk = ($scoreAv >= $scoreToOptain) ? 1 : 0;
        $solvedOk = ($activitiesOkAv >= $solvedToOptain) ? 1 : 0;
        $scoreOk = ($scoreToOptain == null) ? '-1' : $scoreOk;
        $solvedOk = ($solvedToOptain == null) ? '-1' : $solvedOk;
        $resultsArray[] = array('scoreAv' => $scoreAv,
            'score' => $scoreTotal,
            'totalTimeAv' => $totalTimeAv,
            'totalTime' => $totalTimeTotal,
            'solvedOk' => $solvedOk,
            'scoreOk' => $scoreOk,
            'activitiesOkAv' => $activitiesOkAv,
            'activitiesOk' => $activitiesOkTotal,
            'activitiesNumberAv' => $activitiesNumberAv,
            'activitiesNumber' => $activitiesNumberTotal,
            'tries' => count($sessions));
        return $resultsArray;
    }

    /**
     * Calc the time in minutes and seconds
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The time in miliseconds
     * @return:	Time string in minutes and seconds
     */
    public function calcTime($args) {
        $totalTime = FormUtil::getPassedValue('totalTime', isset($args['totalTime']) ? $args['totalTime'] : null, 'POST');
        $time = round($totalTime / 1000);
        $minutes = floor($time / 60);
        $seconds = round($time % 60);
        $time = $minutes . '\'' . $seconds . '"';
        return $time;
    }

    /**
     * Get the results for an activity
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	The activity identity
     * @return:	An array with the activity results
     */
    public function correct($args) {
        $jid = FormUtil::getPassedValue('jid', isset($args['jid']) ? $args['jid'] : null, 'GET');
        $user_id = FormUtil::getPassedValue('user_id', isset($args['user_id']) ? $args['user_id'] : null, 'GET');
        $all = FormUtil::getPassedValue('all', isset($args['all']) ? $args['all'] : null, 'GET');
        // Security check
        if (!SecurityUtil::checkPermission('IWjclic::', "::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        //get jclic activity
        $jclic = ModUtil::apiFunc('IWjclic', 'user', 'get', array('jid' => $jid));
        if ($jclic == false) {
            LogUtil::registerError($this->__('Could not find the allocation requested'));
            return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
        }
        //Check if user can edit the activity because he/she is the owner
        if ($jclic['user'] != UserUtil::getVar('uid')) {
            LogUtil::registerError($this->__('You do not have access to edit the activity'));
            return System::redirect(ModUtil::url('IWjclic', 'user', 'main'));
        }
        if ($user_id == null) {
            //get all groups for the activity
            $groups = ModUtil::apiFunc('IWjclic', 'user', 'getGroups', array('jid' => $jid));
            //get users for the activity and put them into the array $members
            $members = array();
            $usersList = '$$';
            foreach ($groups as $group) {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $groupMembers = ModUtil::func('IWmain', 'user', 'getMembersGroup', array('sv' => $sv,
                            'gid' => $group['group_id']));
                foreach ($groupMembers as $member) {
                    $members[] = $member['id'];
                    $usersList .= $member['id'] . '$$';
                }
            }
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $users = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'ccn',
                        'sv' => $sv,
                        'list' => $usersList));
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $usersNames = ModUtil::func('IWmain', 'user', 'getAllUsersInfo', array('info' => 'l',
                        'sv' => $sv,
                        'list' => $usersList));
            asort($users);
            $oneUserReturn = '';
            $onlySum = true;
        } else {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $user = ModUtil::func('IWmain', 'user', 'getUserInfo', array('info' => 'ccn',
                        'sv' => $sv,
                        'uid' => $user_id));
            $users[$user_id] = $user;
            $oneUserReturn = 'correct';
            $onlySum = false;
        }
        foreach ($users as $key => $value) {
            //get the user small photo
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$key] . '_s',
                        'sv' => $sv));
            //if the small photo not exists, check if the normal size foto exists. In this case create the small one
            if ($photo_s == '') {
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $photo = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$key],
                            'sv' => $sv));
                if ($photo != '' && is_writable($folder)) {
                    //create the small photo and take it
                    $file_extension = strtolower(substr(strrchr($photo, "."), 1));
                    $e = ModUtil::func('IWmain', 'user', 'thumb', array('imgSource' => $folder . '/' . $usersNames[$key] . '.' . $file_extension,
                                'imgDest' => $folder . '/' . $usersNames[$key] . '_s.' . $file_extension,
                                'new_width' => 30));

                    $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                    $photo_s = ModUtil::func('IWmain', 'user', 'getUserPicture', array('uname' => $usersNames[$key] . '_s',
                                'sv' => $sv));
                }
            }
            //get user sessions and activities
            $results = ModUtil::func('IWjclic', 'user', 'results', array('jid' => $jid,
                        'all' => $all,
                        'uid' => $key,
                        'scoreToOptain' => $jclic['scoreToOptain'],
                        'solvedToOptain' => $jclic['solvedToOptain']));
            //get user session information
            $userSession = ModUtil::apiFunc('IWjclic', 'user', 'getUserSession', array('key' => $jid,
                        'user_id' => $key));
            //get the member session
            $sessionsArray[] = array('uname' => $value,
                'results' => $results,
                'observations' => ($userSession) ? $userSession[$key]['observations'] : 0,
                'renotes' => ($userSession) ? $userSession[$key]['renotes'] : 0,
                'uid' => $key,
                'photo' => $photo_s,
                'onlySum' => $onlySum);
        }

        $template = ($all != null) ? 'IWjclic_user_correct.htm' : 'IWjclic_user_correctExtend.htm';

        return $this->view->assign('users', $users)
                        ->assign('all', $all)
                        ->assign('jclic', $jclic)
                        ->assign('oneUserReturn', $oneUserReturn)
                        ->assign('sessionsArray', $sessionsArray)
                        ->fetch($template);
    }

}