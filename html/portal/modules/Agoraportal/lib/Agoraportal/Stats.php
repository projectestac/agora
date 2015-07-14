<?php

/**
 * Class Stats
 * Manage the stats
 */
class Stats {

    /**
     * Returns and array of stats types available for a ServiceType
     * @param $serviceid
     * @return array|string
     */
    function getServiceStats($serviceid) {
        $servicetype = ServiceType::get_by_id($serviceid);
        switch($servicetype->serviceName) {
            case 'intranet':
                return array('month' => 'Mensuals');
                break;
            case 'moodle':
            case 'moodle2':
                return array('day' => 'Diàries', 'week' => 'Setmanals', 'month' => 'Mensuals');
                break;
            case 'nodes':
                return array('day' => 'Diàries', 'month' => 'Mensuals');
                break;
        }
        return 'No hi ha estadístiques';
    }

    /**
     * Returns the columns to be shown in a graph
     * @param $serviceid requested ServiceType
     * @param $stat requested Stat
     * @param $column requested Column (if needed)
     * @param $show_totals if totals or dates are needed
     * @return array|bool
     */
    public static function getGraphColumns($serviceid, $stat, $column, $show_totals) {

        $servicetype = ServiceType::get_by_id($serviceid);

        $table = 'agoraportal_' . $servicetype->serviceName . '_stats_' . $stat;
        $tables = DBUtil::getTables();

        if (!$tables[$table.'_column']) {
            return false;
        }
        $available_columns = $tables[$table.'_column'];

        $columns = array();
        $columns['clientDNS'] = 'clientDNS';
        if (!$show_totals) {
            $columns['date'] = isset($available_columns['yearmonth']) ? 'yearmonth' : 'date';
        }

        if ($column) {
            if (isset($available_columns[$column])) {
                $columns[$column] = $column;
            } else {
                return false;
            }
        } else {
            if(isset($available_columns['d1'])) {
                $time = explode(',', 'd1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12,d13,d14,d15,d16,d17,d18,d19,d20,d21,d22,d23,d24,d25,d26,d27,d28,d29,d30,d31');
            } else if(isset($available_columns['h1'])) {
                $time = explode(',', 'h0,h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h15,h16,h17,h18,h19,h20,h21,h22,h23');
            } else {
                return false;
            }
            $time = array_combine($time, $time);
            $columns = array_merge($columns, $time);
        }
        return $columns;
    }

    /**
     * Retrieve the stats
     * @param $serviceid requested ServiceType
     * @param $stat requested Stat
     * @param $start start date to be shown
     * @param $stop end date to be shown
     * @param $order requested order by column
     * @param string $clients to be shown, null for all
     * @param null $columns to be shwon
     * @param bool|false $show_totals if totals or dates are needed
     * @return array|bool
     */
    public static function getStats($serviceid, $stat, $start, $stop, $order, $clients = "", $columns = null, $show_totals = false) {

        $servicetype = ServiceType::get_by_id($serviceid);

        $table = 'agoraportal_'.$servicetype->serviceName.'_stats_'.$stat;
        $tables = DBUtil::getTables();

        if (!$tables[$table]) {
            return false;
        }


        // data format conversion
        $start = str_replace('-', "", $start);
        $stop = str_replace('-', "", $stop);
        $start = date('Ymd', strtotime($start));
        $stop = date('Ymd', strtotime($stop));

        if ($stat == 'month') {
            $start = substr($start, 0, 6);
            $stop = substr($stop, 0, 6);
            $datefield = 'yearmonth';
        } else {
            $datefield = 'date';
        }

        if ($start == $stop) {
            $dates = "$datefield = $start";
        } else {
            $dates = "$datefield >= $start AND $datefield <= $stop";
        }
        $order .= ', '.$datefield;

        if (!empty($clients)) {
            $clients_ar = explode(",", $clients);
            $clients_text = implode("','", $clients_ar);
            $clients = "tbl.clientDNS IN ('$clients_text') AND ";
        }

        $where = $clients . $dates;
        $join = array();
        $join[] = array('join_table' => 'agoraportal_clients',
            'join_field' => array('educat'),
            'object_field_name' => array('educat'),
            'compare_field_table' => 'clientDNS',
            'compare_field_join' => 'clientDNS');

        if ($columns) {
            if ($show_totals) {
                foreach($columns as $key => $column) {
                    if($key != 'clientDNS' && $key != 'date') {
                        $columns[$column] = "SUM($column) AS $column";
                    }
                }
            }
            $sql = "SELECT ". implode(',',$columns). " FROM $table as tbl WHERE $where";
            if ($show_totals) {
                $sql .= ' GROUP BY clientDNS';
            }
            $sql .= ' ORDER BY clientDNS ASC';
            $res = DBUtil::executeSQL($sql);
            return DBUtil::marshallObjects($res, array_keys($columns));
        } else {
            return DBUtil::selectExpandedObjectArray($table, $join, $where, $order);
        }

    }

    /**
     * Returns the stats parsed to be shown
     * @param $serviceid requested ServiceType
     * @param $stat requested Stat
     * @param $start start date to be shown
     * @param $stop end date to be shown
     * @param $order requested order by column
     * @param string $clients to be shown, null for all
     * @return array|bool
     */
    public static function getResults($serviceid, $stat, $start, $stop, $order, $clients = "") {
        $items = self::getStats($serviceid, $stat, $start, $stop, $order, $clients);
        if ($items === false) {
            return false;
        }

        $results = array();
        $totals = array();
        $columns = array();
        $centres = array();

        if (count($items) > 0) {
            foreach ($items as $i => $item) {
                $centres[$item['clientDNS']] = true;
                $date = isset($item['yearmonth']) ? $item['yearmonth'] : $item['date'];
                if (strlen($date) < 6) {
                    $date = date("m/Y", strtotime($date.'01'));
                } else {
                    $date = date("d/m/Y", strtotime($date));
                }

                if (isset($item['yearmonth'])) {
                    $date = $item['yearmonth'].'01';
                    $date = date("m/Y", strtotime($date));
                    $item['yearmonth'] = $date;
                } else {
                    $date = $item['date'];
                    $date = date("d/m/Y", strtotime($date));
                    $item['date'] = $date;
                }

                foreach ($item as $key => $value) {
                    if ($key[0] == 'd' && strlen($key) <= 3) {
                        if (self::check_date($date, $key) == false) {
                            $item[$key] = "";
                        } else {
                            $totals[$key] += $value;
                        }
                    } else if ($key == 'lastaccess') {
                        unset($item[$key]);
                    } else if ($key == 'lastaccess_date' || $key == 'lastaccess_user') {
                        $totals[$key] = '';
                    } else {
                        $totals[$key] += $value;
                    }
                }
                $results[] = $item;
            }
            $columns = array_keys($results[0]);
            $totals['clientcode'] = "";
            $totals['yearmonth'] = "";
            $totals['date'] = "";
            $numcentres = count($centres);
            $totals['clientDNS'] = "Totals ($numcentres centres)";
        }
        return array('columns' => $columns, 'results' => $results, 'totals' => $totals);
    }

    /**
     * Check if the day is over the days of the selected month
     * @param $yearmonth
     * @param $day
     * @return bool
     */
    private static function check_date($yearmonth, $day) {
        list($month, $year) = explode("/", $yearmonth);
        $day = substr($day, 1);
        return $day <= cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }
}
