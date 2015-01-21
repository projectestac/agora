<?php

class IWstats_Api_User extends Zikula_AbstractApi {

    public function collect($args) {
        // prepare data
        $uid = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : 0;

        // get module identity
        $modid = ModUtil::getIdFromName(ModUtil::getName());
        $skippedModule = 0;

        // skip modules selected as skipped in settings
        $moduleIds = unserialize(ModUtil::getVar('IWstats', 'modulesSkipped'));
        if (is_array($moduleIds)) {
            if (in_array($modid, $moduleIds)) {
                $skippedModule = 1;
            }
        }

        $params = $_SERVER['QUERY_STRING'];

        $isadmin = (SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) ? 1 : 0;

        $ip = '';
        if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
            $ip = ModUtil::apiFunc('IWstats', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['REMOTE_ADDR']));
        }

        $ipForward = '';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipForward = ModUtil::apiFunc('IWstats', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $ipClient = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipClient = ModUtil::apiFunc('IWstats', 'user', 'cleanremoteaddr', array('originaladdr' => $_SERVER['HTTP_CLIENT_IP']));
        }

        $userAgent = '';
        if (isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT'])) {
            $userAgent = DataUtil::formatForStore($_SERVER['HTTP_USER_AGENT']);
        }
    
        // remove skipped ips by range
        $skippedIps = ModUtil::getVar('IWstats', 'skippedIps');
        $skippedIpsArray = explode(',', $skippedIps);
        $skipped = 0;
        foreach ($skippedIpsArray as $range) {
            if (ModUtil::apiFunc('IWstats', 'user', 'ip_in_range', array('ip' => $ip, 'range' => $range)) || $ip == $range) {
                $skipped = 1;
                break;
            }
        }

        $item = array('moduleid' => $modid,
            'params' => $params,
            'uid' => $uid,
            'ip' => $ip,
            'ipForward' => $ipForward,
            'ipClient' => $ipClient,
            'userAgent' => $userAgent,
            'datetime' => date('Y-m-d H:i:s', time()),
            'isadmin' => $isadmin,
            'skipped' => $skipped,
            'skippedModule' => $skippedModule,
        );

        if (!DBUtil::insertObject($item, 'IWstats')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        return true;
    }

    public function getAllRecords($args) {

        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        $items = array();
        $init = (isset($args['init'])) ? $args['init'] - 1 : -1;
        $rpp = (isset($args['rpp'])) ? $args['rpp'] : -1;
        $table = DBUtil::getTables();
        $where = "";
        $c = $table['IWstats_column'];

        if (isset($args['moduleId']) && $args['moduleId'] > 0) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[moduleid] = $args[moduleId]";
        }

        if (isset($args['uid']) && $args['uid'] > 0) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[uid] = $args[uid]";
        }

        if (isset($args['ip']) && $args['ip'] != null) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[ip] = '$args[ip]'";
        }

        if (isset($args['registered']) && $args['registered'] == 1) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[uid] > 0";
        }

        if (!isset($args['all']) || $args['all'] != 1) {
            $and = ($where == '') ? '' : ' AND';
            $where .= "$and $c[isadmin] = 0 AND $c[skipped] = 0 AND $c[skippedModule] = 0";
        }

        if ($args['fromDate'] != null) {
            $and = ($where == '') ? '' : ' AND';
            if (!isset($args['timeIncluded'])) {
                $from = mktime(0, 0, 0, substr($args['fromDate'], 3, 2), substr($args['fromDate'], 0, 2), substr($args['fromDate'], 6, 4));
                $to = mktime(23, 59, 59, substr($args['toDate'], 3, 2), substr($args['toDate'], 0, 2), substr($args['toDate'], 6, 4));
            } else {
                $from = mktime(substr($args['fromDate'], 11, 2), substr($args['fromDate'], 14, 2), substr($args['fromDate'], 17, 2), substr($args['fromDate'], 3, 2), substr($args['fromDate'], 0, 2), substr($args['fromDate'], 6, 4));
                $to = mktime(substr($args['toDate'], 11, 2), substr($args['toDate'], 14, 2), substr($args['toDate'], 17, 2), substr($args['toDate'], 3, 2), substr($args['toDate'], 0, 2), substr($args['toDate'], 6, 4));
            }
            $fromSQL = date('Y-m-d H:i:s', $from);
            $toSQL = date('Y-m-d H:i:s', $to);
            $where .= "$and ($c[datetime] BETWEEN '$fromSQL' AND '$toSQL')";
        }

        $orderby = "$c[statsid] desc";

        if (isset($args['onlyNumber']) && $args['onlyNumber'] == 1) {
            $items = DBUtil::selectObjectCount('IWstats', $where);
        } else {
            $items = DBUtil::selectObjectArray('IWstats', $where, $orderby, $init, $rpp, 'statsid');
        }

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Load attempt failed.'));
        }

        // Return the items
        return $items;
    }

    public function cleanremoteaddr($args) {
        
        $matches = array();
        // first get all things that look like IP addresses.
        if (!preg_match_all('/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})/', $args['originaladdr'], $matches, PREG_SET_ORDER)) {
            return '';
        }
        $goodmatches = array();
        $lanmatches = array();
        foreach ($matches as $match) {
            // check to make sure it's not an internal address.
            // the following are reserved for private lans...
            // 10.0.0.0 - 10.255.255.255
            // 172.16.0.0 - 172.31.255.255
            // 192.168.0.0 - 192.168.255.255
            // 169.254.0.0 -169.254.255.255
            $bits = explode('.', $match[0]);
            if (count($bits) != 4) {
                // weird, preg match shouldn't give us it.
                continue;
            }
            if (($bits[0] == 10)
                    || ($bits[0] == 172 && $bits[1] >= 16 && $bits[1] <= 31)
                    || ($bits[0] == 192 && $bits[1] == 168)
                    || ($bits[0] == 169 && $bits[1] == 254)) {
                $lanmatches[] = $match[0];
                continue;
            }
            // finally, it's ok
            $goodmatches[] = $match[0];
        }
        if (!count($goodmatches)) {
            // perhaps we have a lan match, it's probably better to return that.
            if (!count($lanmatches)) {
                return '';
            } else {
                return array_pop($lanmatches);
            }
        }
        if (count($goodmatches) == 1) {
            return $goodmatches[0];
        }

        // We need to return something, so return the first
        return array_pop($goodmatches);
    }

    public function ip_in_range($args) {
        $ip = $args['ip'];
        $range = $args['range'];

        // for a.b.*.* format
        if (strpos($range, '*') !== false) {
            $lower = str_replace('*', '0', $range);
            $upper = str_replace('*', '255', $range);
            $range = "$lower-$upper";
        }

        // for a-b format
        if (strpos($range, '-') !== false) {
            list($lower, $upper) = explode('-', $range, 2);
            $lower_dec = (float) sprintf("%u", ip2long($lower));
            $upper_dec = (float) sprintf("%u", ip2long($upper));
            $ip_dec = (float) sprintf("%u", ip2long($ip));
            return (($ip_dec >= $lower_dec) && ($ip_dec <= $upper_dec));
        }

        return false;
    }

    public function getAllSummary($args) {
        if (!SecurityUtil::checkPermission('IWstats::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }
        $items = array();
        $init = (isset($args['init'])) ? $args['init'] - 1 : -1;
        $rpp = (isset($args['rpp'])) ? $args['rpp'] : -1;
        $table = DBUtil::getTables();
        $where = "";
        $c = $table['IWstats_summary_column'];

        $from = mktime(0, 0, 0, substr($args['fromDate'], 3, 2), substr($args['fromDate'], 0, 2), substr($args['fromDate'], 6, 4));
        $to = mktime(23, 59, 59, substr($args['toDate'], 3, 2), substr($args['toDate'], 0, 2), substr($args['toDate'], 6, 4));
        $fromSQL = date('Y-m-d H:i:s', $from);
        $toSQL = date('Y-m-d H:i:s', $to);
        $where .= "($c[datetime] BETWEEN '$fromSQL' AND '$toSQL')";

        if (isset($args['uid']) && $args['uid'] > 0) {
            $and = ($where != '') ? ' AND ' : '';
            $where .= $and . "$c[users] like '%$$args[uid]|%'";
        }

        $orderby = "$c[summaryid] desc";

        $items = DBUtil::selectObjectArray('IWstats_summary', $where, $orderby, $init, $rpp, 'summaryid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Load attempt failed.'));
        }

        // Return the items
        return $items;
    }

}
