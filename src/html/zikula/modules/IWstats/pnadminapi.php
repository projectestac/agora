<?php

function IWstats_adminapi_reset($args) {

    $dom = ZLanguage::getModuleDomain('IWstats');

    // Security check
    if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_DELETE)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom));
    }

    // delete records from database
    $delete = DateUtil::getDatetime(time() - $args['deleteFromDays'] * 24 * 60 * 60);

    // get the last record in summary table
    $table = pnDBGetTables();
    $c = $table['IWstats_column'];
    $where = "$c[datetime] < '$delete'";

    DBUtil::deleteWhere('IWstats', $where);

    // Return the id of the newly created item to the calling process
    return true;
}

// skipped value to 1 for IP
function IWstats_adminapi_deleteIp($args) {

    $dom = ZLanguage::getModuleDomain('IWstats');

    // Security check
    if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_DELETE)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom));
    }
    $table = pnDBGetTables();
    $where = "";
    $c = $table['IWstats_column'];
    $where = "$c[ip] = '$args[ip]'";
    $items = array('skipped' => 1);

    if (!DBUtil::updateObject($items, 'IWstats', $where)) {
        return LogUtil::registerError(__('Error! Sorry! Deletion attempt failed.', $dom));
    }

    return true;
}

function IWstats_adminapi_skipModules($args) {
    $dom = ZLanguage::getModuleDomain('IWstats');

    // Security check
    if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_EDIT)) {
        return LogUtil::registerError(__('Sorry! No authorization to access this module.', $dom));
    }

    $table = pnDBGetTables();
    $c = $table['IWstats_column'];
    $where = "1=1";
    $items = array('skippedModule' => 0);
    if (!DBUTil::updateObject($items, 'IWstats', $where)) {
        return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
    }

    $items = array('skippedModule' => 1);
    foreach ($args['moduleId'] as $module) {
        $where = "$c[moduleid] = $module";
        if (!DBUTil::updateObject($items, 'IWstats', $where)) {
            return LogUtil::registerError(__('Error! Update attempt failed.', $dom));
        }
    }

    return true;
}

function IWstats_adminapi_summary($args) {

    $dom = ZLanguage::getModuleDomain('IWstats');

    // get the last record in summary table
    $table = pnDBGetTables();
    $c = $table['IWstats_summary_column'];
    $orderby = "$c[datetime] desc";

    $last = array();

    if (!isset($args['last'])) {
        $last = DBUtil::selectObjectArray('IWstats_summary', '', $orderby, -1, 1);

        if ($last === false) {
            return LogUtil::registerError(__('Error! Could not load data.', $dom));
        }
    } else {
        $last[0]['datetime'] = $args['last'];
    }

    if (count($last) == 0 && !isset($args['last'])) {
        $last[0]['datetime'] = "2011-05-10 00:00:00";
    }

    $time = DateUtil::makeTimestamp($last[0]['datetime']);
    $toDateTimeStamp = $time + $args['days'] * 24 * 60 * 60;
    // calc the period
    $fromDate = date('d-m-Y', $time + 24 * 60 * 60);
    $toDate = date('d-m-Y', $toDateTimeStamp);


    if ($toDateTimeStamp > time() - 24 * 60 * 60)
        $toDate = date('d-m-Y', time() - 24 * 60 * 60);

    $records = pnModAPIFunc('IWstats', 'user', 'getAllRecords', array('fromDate' => $fromDate,
        'toDate' => $toDate,
        'all' => 1,
            ));

    // to aviod stop due to periods with zero visits
    if (!$records && DateUtil::makeTimestamp($last[0]['datetime']) < time()) {
        $last = date('Y-m-d 00:00:00', DateUtil::makeTimestamp($last[0]['datetime']) + $args['days'] * 24 * 60 * 60);
        pnModAPIFunc('IWstats', 'admin', 'summary', array('last' => $last,
            'days' => $args['days'],
            'deleteFromDays' => $args['deleteFromDays'],
        ));
    }

    $recordsArray = array();

    foreach ($records as $record) {
        if (key_exists(substr($record['datetime'], 0, 10), $recordsArray)) {
            // add new information in array element
            $recordsArray[substr($record['datetime'], 0, 10)]['nRecords']++;
            if (($record['uid'] > 0))
                $recordsArray[substr($record['datetime'], 0, 10)]['registered']++;
            if (key_exists($record['moduleid'], $recordsArray[substr($record['datetime'], 0, 10)]['users'][$record['uid']]['modules'])) {
                $recordsArray[substr($record['datetime'], 0, 10)]['users'][$record['uid']]['modules'][$record['moduleid']]++;
            } else {
                // add a new user in users array field
                $recordsArray[substr($record['datetime'], 0, 10)]['users'][$record['uid']]['modules'][$record['moduleid']] = 1;
            }
            if (key_exists($record['moduleid'], $recordsArray[substr($record['datetime'], 0, 10)]['modules'])) {
                $recordsArray[substr($record['datetime'], 0, 10)]['modules'][$record['moduleid']]++;
            } else {
                $recordsArray[substr($record['datetime'], 0, 10)]['modules'][$record['moduleid']] = 1;
            }
            if (($record['skipped'] == 1))
                $recordsArray[substr($record['datetime'], 0, 10)]['skipped']++;
            if (($record['skippedModule'] == 1))
                $recordsArray[substr($record['datetime'], 0, 10)]['skippedModule']++;
            if (($record['isadmin'] == 1))
                $recordsArray[substr($record['datetime'], 0, 10)]['isadmin']++;
            if (!in_array($record['ip'], $recordsArray[substr($record['datetime'], 0, 10)]['ips'])) {
                $recordsArray[substr($record['datetime'], 0, 10)]['ips'][] = $record['ip'];
            }
        } else {
            // add a new element into array
            $recordsArray[substr($record['datetime'], 0, 10)]['nRecords'] = 1;
            $recordsArray[substr($record['datetime'], 0, 10)]['registered'] = ($record['uid'] > 0) ? 1 : 0;
            $recordsArray[substr($record['datetime'], 0, 10)]['users'][$record['uid']]['modules'][$record['moduleid']] = 1;
            $recordsArray[substr($record['datetime'], 0, 10)]['ips'][] = $record['ip'];
            $recordsArray[substr($record['datetime'], 0, 10)]['datetime'] = substr($record['datetime'], 0, 10) . ' 00:00:00';
            $recordsArray[substr($record['datetime'], 0, 10)]['modules'][$record['moduleid']] = 1;
            $recordsArray[substr($record['datetime'], 0, 10)]['skipped'] = ($record['skipped'] == 1) ? 1 : 0;
            $recordsArray[substr($record['datetime'], 0, 10)]['skippedModule'] = ($record['skippedModule'] == 1) ? 1 : 0;
            $recordsArray[substr($record['datetime'], 0, 10)]['isadmin'] = ($record['isadmin'] == 1) ? 1 : 0;
        }
    }

    ksort($recordsArray);

    // save records in ddbb
    foreach ($recordsArray as $record) {
        $usersArray = array();
        foreach ($record['users'] as $key => $value) {
            $usersString = $key . '|';
            $usersModulesArray = array();
            foreach ($value['modules'] as $k => $v) {
                $usersModulesArray[] = $k . '=' . $v;
            }
            $usersModulesString = implode('#', $usersModulesArray);
            $usersArray[] = $usersString . $usersModulesString;
        }

        $users = '$' . implode('$$', $usersArray) . '$';

        $modulesArray = array();
        foreach ($record['modules'] as $key => $value) {
            $modulesArray[] = $key . '|' . $value;
        }

        $modules = '$' . implode('$$', $modulesArray) . '$';

        $item = array(
            'datetime' => $record['datetime'],
            'nrecords' => $record['nRecords'],
            'registered' => $record['registered'],
            'modules' => $modules,
            'skipped' => $record['skipped'],
            'skippedModule' => $record['skippedModule'],
            'isadmin' => $record['isadmin'],
            'users' => $users,
            'nips' => count($record['ips']),
        );

        if (!DBUtil::insertObject($item, 'IWstats_summary')) {
            return LogUtil::registerError(__('Error! Creation attempt failed.', $dom));
        }
    }

    // delete records from database
    $delete = DateUtil::getDatetime(time() - $args['deleteFromDays'] * 24 * 60 * 60);

    $c = $table['IWstats_column'];
    $where = "$c[datetime] < '$delete'";

    DBUtil::deleteWhere('IWstats', $where);

    return true;
}