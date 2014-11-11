<?php

class IWstats_Api_Admin extends Zikula_AbstractApi {

    public function reset($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_DELETE)) {
            throw new Zikula_Exception_Forbidden();
        }

        // delete records from database
        $delete = DateUtil::getDatetime(time() - $args['deleteFromDays'] * 24 * 60 * 60);

        // get the last record in summary table
        $table = DBUtil::getTables();
        $c = $table['IWstats_column'];
        $where = "$c[datetime] < '$delete'";

        DBUtil::deleteWhere('IWstats', $where);

        // Return the id of the newly created item to the calling process
        return true;
    }

    // skipped value to 1 for IP
    public function deleteIp($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_DELETE)) {
            throw new Zikula_Exception_Forbidden();
        }
        $table = DBUtil::getTables();
        $where = "";
        $c = $table['IWstats_column'];
        $where = "$c[ip] = '$args[ip]'";
        $items = array('skipped' => 1);

        if (!DBUtil::updateObject($items, 'IWstats', $where)) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        return true;
    }

    public function skipModules($args) {

        // Security check
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $table = DBUtil::getTables();
        $c = $table['IWstats_column'];
        $where = "1=1";
        $items = array('skippedModule' => 0);
        if (!DBUTil::updateObject($items, 'IWstats', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        $items = array('skippedModule' => 1);
        foreach ($args['moduleId'] as $module) {
            $where = "$c[moduleid] = $module";
            if (!DBUTil::updateObject($items, 'IWstats', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }

        return true;
    }

    public function summary($args) {
        // get the last record in summary table
        $table = DBUtil::getTables();
        $c = $table['IWstats_summary_column'];
        $d = $table['IWstats_column'];

        // get first record datetime
        $orderby = "$d[summarised] asc";
        $last = DBUtil::selectObjectArray('IWstats', '', $orderby, -1, 1);

        $time = DateUtil::makeTimestamp($last[0]['datetime']);
        $toDateTimeStamp = $time + $args['days'] * 24 * 60 * 60;
        // calc the period
        $fromDate = date('d-m-Y', $time);
        $toDate = date('d-m-Y', $toDateTimeStamp);

        $records = ModUtil::apiFunc('IWstats', 'user', 'getAllRecords', array('fromDate' => $fromDate,
                    'toDate' => $toDate,
                    'all' => 1,
                ));

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
                // add a new element into the array
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

        // print_r($recordsArray);die();
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

            // checks if value exists in database. If exists update it. If not create it
            $summaryValue = DBUtil::selectObject('IWstats_summary', "$c[datetime]='$record[datetime]'");

            if ($summaryValue) {
                if (!DBUtil::updateObject($item, 'IWstats_summary', "$c[datetime]='$record[datetime]'")) {
                    return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
                }
            } else {
                if (!DBUtil::insertObject($item, 'IWstats_summary')) {
                    return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
                }
            }

            $keepDays = $this->getVar('keepDays');

            if (!is_numeric($keepDays) || $keepDays <= 0)
                $keepDays = 90;

            $time = time() - $keepDays * 24 * 60 * 60;
            $keepTime = date('Y-m-d 23:59:59', $time);
            $delDate = str_replace('00:00:00', '23:59:59', $record['datetime']);

            // set records as summarised
            $item = array('summarised' => 1);
            $where = "$d[datetime] <= '$delDate'";
            DBUtil::updateObject($item, 'IWstats', $where);

            // delete old records
            $where = "$d[datetime] <= '$delDate' and $d[datetime] <= '$keepTime'";
            DBUtil::deleteWhere('IWstats', $where);
        }

        return true;
    }

    public function purgeOldRecords($args) {

        $table = DBUtil::getTables();
        $d = $table['IWstats_column'];

        $keepDays = $this->getVar('keepDays');

        if (!is_numeric($keepDays) || $keepDays <= 0) {
            $keepDays = 90;
        }

        $time = time() - $keepDays * 24 * 60 * 60;
        $keepTime = date('Y-m-d 23:59:59', $time);

        // delete old records
        $where = "$d[datetime] <= '$keepTime'";
        DBUtil::deleteWhere('IWstats', $where);

        return true;
    }
    
    
    /**
     * get available admin panel links
     *
     * @author Mark West
     * @return array array of admin links
     */
    public function getlinks() {
        $links = array();

        if (SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWstats', 'admin', 'view'), 'text' => $this->__('View visited pages'));
            $links[] = array('url' => ModUtil::url('IWstats', 'admin', 'viewStats'), 'text' => $this->__('View stats'));
            $links[] = array('url' => ModUtil::url('IWstats', 'admin', 'reset'), 'text' => $this->__('Reset'));
            $links[] = array('url' => ModUtil::url('IWstats', 'admin', 'modifyconfig'), 'text' => $this->__('Settings'));
            $links[] = array('url' => ModUtil::url('IWstats', 'admin', 'summary'), 'text' => $this->__('Summary'));
        }

        return $links;
    }

}