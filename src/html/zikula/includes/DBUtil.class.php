<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: DBUtil.class.php 28218 2010-02-06 18:44:27Z rgasch $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @package Zikula_Core
 */

/**
 * DBUtil
 *
 * @package Zikula_Core
 * @subpackage DBUtil
 */
class DBUtil
{
    /**
     * The strucuture of the parameters joinInfo and permFilter are described here globally
     * rather then repeating this definition every time these parameters are used/referenced.
     *
     * The joinInfo parameter has to be an array structured as follows:
     * $joinInfo[] = array ('join_table'         =>  'The tablekey to join to'
     *                      'join_field'         =>  'The field key of the field to join, can also be an array of fields',
     *                      'object_field_name'  =>  'The resulting field name, can also be an array if join_field is an array',
     *                      'compare_field_table'=>  'The compare field key (select table)',
     *                      'compare_field_join' =>  'The compare field key (join table)');
     *
     * Furthermore you have the possibility to change the join method used during the expanded query.
     * For that reason there exists an optional field called join_method, which must be 'LEFT JOIN', 'RIGHT JOIN' or 'INNER JOIN'.
     * The default join method is LEFT JOIN.
     *
     * The permissionFilter parameter has to be an array structured as follows:
     * $permFilter[]  = array ('realm'            =>  'The realm to test in (usually 0)',
     *                         'component_left'   =>  'The left part of the component test',
     *                         'component_middle' =>  'The middle part of the component test',
     *                         'component_right'  =>  'The right part of the component test',
     *                         'instance_left'    =>  'The left object field of the instance test',
     *                         'instance_middle'  =>  'The middle object field of the instance test',
     *                         'instance_right'   =>  'The right object field of the instance test',
     *                         'level'            =>  'The access level to check');
     */

    /**
     * Execute SQL, check for errors and return result. Uses Adodb to generate DB-portable paging code.
     *
     * @param sql          The SQL statement to execute
     * @param limitOffset  The lower limit bound (optional) (default=-1)
     * @param limitNumRows The upper limit bound (optional) (default=-1)
     * @param sql          The SQL statement to execute
     * @param exitOnError  whether to exit on error (default=true) (optional)
     * @param verbose      whether to be verbose (default=true) (optional)
     *
     * @return mixed The result set of the successfully executed query or false on error
     */
    function executeSQL($sql, $limitOffset = -1, $limitNumRows = -1, $exitOnError = true, $verbose = true)
    {
        if (!$sql) {
            return pn_exit(__f('No SQL statement to execute in %s', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        if (!$dbconn && defined('_PNINSTALLVER')) {
            return false;
        }

        global $PNConfig;
        $suid = $PNConfig['Debug']['sql_user'];
        $uid = SessionUtil::getVar('uid', 0);
        if (($PNConfig['Debug']['sql_time'] || $PNConfig['Debug']['sql_detail']) || (!$suid || ($suid && $suid === $uid))) {
            static $timer;
            if (!$timer) {
                $timer = new Timer();
            } else {
                $timer->reset();
            }
        }

        if ($limitNumRows > 0) {
            $tStr = strtoupper(substr(trim($sql), 0, 6));
            if ($tStr !== 'SELECT')
                return pn_exit(__('Paging parameters can only be used for SELECT statements'));

            $result = $dbconn->SelectLimit($sql, $limitNumRows, $limitOffset);
        } else {
            $result = $dbconn->Execute($sql);
        }

        if ($result) {
            global $PNRuntime;
            $uid = SessionUtil::getVar('uid', 0);
            $suid = $PNConfig['Debug']['sql_user'];

            if (!$suid || (is_array($suid) && in_array($uid)) || ($suid === $uid)) {
                if ($PNConfig['Debug']['sql_count']) {
                    $PNRuntime['sql_count_request'] += 1;
                }

                if ($PNConfig['Debug']['sql_time'] || $PNConfig['Debug']['sql_detail']) {
                    $diff = $timer->snap(true);
                    $PNRuntime['sql_time_request'] += $diff['diff'];
                    if ($PNConfig['Debug']['sql_detail']) {
                        $sqlstat = array();
                        $sqlstat['stmt'] = $sql;
                    }
                    if ($limitNumRows > 0) {
                        $sqlstat['limit'] = "$limitOffset, $limitNumRows";
                    }
                    if ($PNConfig['Debug']['sql_detail']) {
                        $sqlstat['rows_affected'] = $result->_numOfRows;
                        $sqlstat['time'] = $diff['diff'];
                        $PNRuntime['sql'][] = $sqlstat;
                    }
                }
            }

            return $result;
        }

        if ($verbose) {
            print '<br />' . $dbconn->ErrorMsg() . '<br />' . $sql . '<br />';
        }

        if ($exitOnError) {
            return pn_exit(__('Exiting after SQL-error'));
        }

        return false;
    }

    /**
     * Set the gobal object fetch counter to the specified value
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to set the object marhsall counter to
     *
     * @return Nothing, the global variable is assigned counter
     */
    function _setFetchedObjectCount($count = 0)
    {
        $GLOBALS['DBUtilFetchObjectCount'] = $count;
    }

    /**
     * Get the gobal object fetch counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @return The value held by the global
     */
    function _getFetchedObjectCount()
    {
        if (isset($GLOBALS['DBUtilFetchObjectCount'])) {
            return (int) $GLOBALS['DBUtilFetchObjectCount'];
        }

        return false;
    }

    /**
     * Set the gobal object marshall counter to the specified value
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to set the object marhsall counter to
     *
     * @return Nothing, the global variable is assigned
     */
    function _setMarshalledObjectCount($count = 0)
    {
        $GLOBALS['DBUtilMarshallObjectCount'] = $count;
    }

    /**
     * Add the specified value to the gobal object marshall counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to add to the object marhsall counter
     *
     * @return Nothing, the global variable is incremented
     */
    function _addMarshalledObjectCount($count)
    {
        $GLOBALS['DBUtilMarshallObjectCount'] += $count;
    }

    /**
     * Get the gobal object marshall counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @return Nothing, the global variable is incremented
     */
    function _getMarshalledObjectCount()
    {
        if (isset($GLOBALS['DBUtilMarshallObjectCount'])) {
            return (int) $GLOBALS['DBUtilMarshallObjectCount'];
        }

        return false;
    }

    /**
     * Convenience function to ensure that the where-clause starts with "WHERE"
     *
     * @param where        The original where clause
     *
     * @return The value held by the global counter
     */
    function _checkWhereClause($where)
    {
        if (!strlen(trim($where))) {
            return $where;
        }

        $where = trim($where);
        $upwhere = strtoupper($where);
        if (strstr($upwhere, 'WHERE') === false || strpos($upwhere, 'WHERE') > 1) {
            $where = 'WHERE ' . $where;
        }

        return $where;
    }

    /**
     * Convenience function to ensure that the order-by-clause starts with "ORDER BY"
     *
     * @param orderby    The original order-by clause
     * @param tablename  The tablename key for the PNTables structure, only used for oracle quote determination (optional) (default=null)
     *
     * @return The (potenitally) altered order-by-clause
     */
    function _checkOrderByClause($orderby, $tablename = null)
    {
        if (!strlen(trim($orderby))) {
            return $orderby;
        }

        $dbType = DBConnectionStack::getConnectionDBType();

        // given that we use quotes in our generated SQL, oracle requires the same quotes in the order-by
        if ($dbType == 'oci8' || $dbType == 'oracle') {
            $t = str_replace('ORDER BY ', '', $orderby); // remove "ORDER BY" for easier parsing
            $t = str_replace('order by ', '', $t); // remove "order by" for easier parsing


            $pntables = pnDBGetTables();
            $columns = $pntables["{$tablename}_column"];

            // anything which doesn't look like a basic ORDER BY clause (with possibly an ASC/DESC modifier)
            // we don't touch. To use such stuff with Oracle, you'll have to apply the quotes yourself.


            $tokens = explode(',', $t); // split on comma
            foreach ($tokens as $k => $v) {
                $v = trim($v);
                if (strpos($v, ' ') === false) { // 1 word
                    if (strpos($v, '(') === false) { // not a function call
                        if (strpos($v, '"') === false) { // not surrounded by quotes already
                            if (isset($columns[$v])) { // ensure that token is an alias
                                $tokens[$k] = '"' . $v . '"'; // surround it by quotes
                            }
                        }
                    }
                } else { // multiple words, perform a few basic hecks
                    $ttok = explode(' ', $v); // split on space
                    if (count($ttok) == 2) { // see if we have 2 tokens
                        $t1 = strtolower(trim($ttok[0]));
                        $t2 = strtolower(trim($ttok[1]));
                        $haveQuotes = strpos($t1, '"') === false;
                        $isAscDesc = (strpos($t2, 'asc') === 0 || strpos($t2, 'desc') === 0);
                        $isColumn = isset($columns[$ttok[0]]);
                        if ($haveQuotes && $isAscDesc && $isColumn) {
                            $ttok[0] = '"' . $ttok[0] . '"'; // surround it by quotes
                        }
                    }
                    $tokens[$k] = implode(' ', $ttok);
                }
            }

            $orderby = implode(', ', $tokens);
        }

        if (stristr($orderby, 'ORDER BY') === false) {
            $orderby = 'ORDER BY ' . $orderby;
        }

        return $orderby;
    }

    /**
     * Convenience function to ensure that the field to be used as ORDER BY
     * is not a CLOB/BLOB when using Oracle
     *
     * @param field     The field name to be used for order by
     *
     * @return string   the order-by-clause to be used, may be ''
     */
    function _checkOrderByField($tablename = '', $field = '')
    {
        $orderby = '';

        if (!empty($field) && !empty($tablename)) {
            $dbType = DBConnectionStack::getConnectionDBDriver();
            $pntables = pnDBGetTables();
            $columns = $pntables["{$tablename}_column"];
            $columnsdef = $pntables["{$tablename}_column_def"];

            if ($dbType == 'oci8' || $dbType == 'oracle') {
                // we are using oracle - split up the field definition and check if it is defined as a LOB
                // oracle does not like LOBs in an ORDERBY
                $definition = explode(' ', $columnsdef[$field]);
                // [0] contains the dangerous information, either XL or B
                if (strtoupper($definition[0]) != 'XL' && strtoupper($definition[0]) != 'B') {
                    // no LOB, no problem
                    $orderby = "ORDER BY $columns[$field]";
                }
            } else {
                $orderby = "ORDER BY $columns[$field]";
            }
        }

        return $orderby;
    }

    /**
     * Build a basic select clause for the specified table with the specified where and orderBy clause
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param where          The original where clause (optional) (default='')
     * @param orderBy        The original order-by clause (optional) (default='')
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return Nothing, the order-by-clause is altered in place
     */
    function _getSelectAllColumnsFrom($tablename, $where = '', $orderBy = '', $columnArray = null)
    {
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];

        $query = 'SELECT ' . DBUtil::_getAllColumns($tablename, $columnArray) . " FROM $table AS tbl ";

        if (trim($where)) {
            $query .= DBUtil::_checkWhereClause($where) . ' ';
        }

        if (trim($orderBy)) {
            $query .= DBUtil::_checkOrderByClause($orderBy, $tablename) . ' ';
        }

        return $query;
    }

    /**
     * Same as PN Api function but without AS aliasing
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The generated sql string
     */
    function _getAllColumns($tablename, $columnArray = null)
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $queries = array();

        if (!$columns) {
            return pn_exit(__f('Invalid table-key [%s] passed to _getAllColumns', $tablename));
        }

        $query = '';
        foreach ($columns as $key => $val) {
            if (!$columnArray || in_array($key, $columnArray)) {
                $queries[] = "$val AS \"$key\"";
            }
        }

        if (!$queries && $columnArray) {
            return pn_exit(__f('Empty query generated for [%s] filtered by columnArray', $tablename));
        }

        return implode(',', $queries);
    }

    /**
     * Same as PN Api function but returns fully qualified fieldnames
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param tablealias     The SQL table alias to use in the SQL statement
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The generated sql string
     */
    function _getAllColumnsQualified($tablename, $tablealias, $columnArray = null)
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $queries = array();

        if (!$columns) {
            return pn_exit(__f('Invalid table-key [%s] passed to _getAllColumns', $tablename));
        }

        $search = array('+', '-', '*', '/', '%');
        $replace = array('');

        foreach ($columns as $key => $val) {
            if (!$columnArray || in_array($key, $columnArray)) {
                $hasMath = (bool) (strcmp($val, str_replace($search, $replace, $val)));
                if (!$hasMath) {
                    $queries[] = "$tablealias.$val AS \"$key\"";
                } else {
                    $queries[] = "$val AS \"$key\"";
                }
            }
        }

        if (!$queries && $columnArray) {
            return pn_exit(__f('Empty query generated for [%s] filtered by columnArray', $tablename));
        }

        return implode(',', $queries);
    }

    /**
     * Format value for use in SQL statement
     *
     * Special handling for integers and booleans (the last is required for MySQL 5 strict mode)
     * @param @value mixed the value to format
     * @return string string ready to add to SQL statement
     */
    function _formatForStore($value)
    {
        if (is_int($value))
            return (int) $value; // No need to DataUtil::formatForStore when casted to int
        else if ($value === false) // Avoid SQL strict problems where false would be stored as ''
            return 0;
        else if ($value === true)
            return 1;
        else
            return '\'' . DataUtil::formatForStore((string) $value) . '\'';
    }

    /**
     * return the column array for the given table
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The column array for the given table
     */
    function getColumnsArray($tablename, $columnArray = null)
    {
        $pntables = pnDBGetTables();
        $tkey = $tablename . '_column';
        $ca = array();

        if (!isset($pntables[$tkey])) {
            return $ca;
        }

        $cols = $pntables[$tkey];
        foreach ($cols as $key => $val) {
            // since the key is plain name, we take it rather
            // than the value to construct object fields from
            //$ca[] = $column[$key];
            if (!$columnArray || in_array($key, $columnArray)) {
                $ca[] = $key;
            }
        }

        if (!$ca && $columnArray) {
            return pn_exit(__f('Empty column array generated for [%s] filtered by columnArray', $tablename));
        }

        return $ca;
    }

    /**
     * Expand column array with JOIN-Fields
     *
     * This adds all joined fields to the column array by their alias defined in $joinInfo.
     * Also it adds the field's table alias to avoid ambiguous queries.
     *
     * @param array $columns    Column array
     * @param array $joinInfo   JoinInfo array
     * @return array            Expanded column array
     */
    function expandColumnsWithJoinInfo($columns, $joinInfo)
    {
        if (count($joinInfo) <= 0)
            return $columns;

        $pntable = & pnDBGetTables();

        // now add alias "tbl" to all fields
        foreach (array_keys($columns) as $k) {
            $columns[$k] = 'tbl.' . $columns[$k];
        }

        // add fields of all joins
        $alias = 'a';
        foreach (array_keys($joinInfo) as $jk) {
            $join = & $joinInfo[$jk];
            $jc = & $pntable[$join['join_table'] . '_column'];
            foreach ($join['join_field'] as $k => $f) {
                $a = $join['object_field_name'][$k];
                if (isset($columns[$a])) {
                    //Oh, that won't work! Two fields with the same alias!
                    return pn_exit(__f('Invalid join information! (alias %s already exists)', $a));
                }
                //so, let's add the field to the column array
                $columns[$a] = $alias . '.' . $jc[$f];
            }
            //now increase the alias ('a'++ = 'b')
            $alias++;
        }

        return $columns;
    }

    /**
     * Transform a SQL query result set into an object/array, optionally applying an PN permission filter
     *
     * @param result           The result set we wish to marshall
     * @param objectColumns    The column array to map onto the result set
     * @param closeResultSet   whether or not to close the supplied result set (optional) (default=true)
     * @param assocKey         The key field to use to build the associative index (optional) (default='')
     * @param clean            whether or not to clean up the fmarshalled data (optional) (default=true)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     * @param tablename        The tablename we're marshalling results for, used for mssql date conversion (optional) (default=null)
     *
     * @return The marhalled array of objects
     */
    function marshallObjects($result, $objectColumns, $closeResultSet = true, $assocKey = '', $clean = true, $permissionFilter = null, $tablename = null)
    {
        if (!$result) {
            return pn_exit(__f('Error! Invalid %s received.', 'result'));
        }

        if (!$objectColumns) {
            return pn_exit(__f('Error! Invalid %s received.', 'objectColumns'));
        }

        if ($assocKey && !in_array($assocKey, $objectColumns)) {
            return pn_exit(__f('Unable to find assocKey [%s] in objectColumns for %s', array($assocKey, $tablename)));
        }

        // since the single-object selects don't need to init
        // the paging logic, we ensure values are set here
        // in order to avoid E_ALL issues
        if (!isset($GLOBALS['DBUtilMarshallObjectCount'])) {
            DBUtil::_setFetchedObjectCount(0);
            DBUtil::_setMarshalledObjectCount(0);
        }

        $object = array();
        $objectArray = array();
        $cSize = count($objectColumns);
        $fCount = 0;
        $dbType = DBConnectionStack::getConnectionDBType();
        $haveCExt = extension_loaded('adodb');
        for (; !$result->EOF; ($haveCExt ? adodb_movenext($result) : $result->MoveNext()), $fCount++) {
            // in PHP 5 can do:
            // $object = array_combine($objectColumns,$result->fields);
            // for now we do:
            for ($j = 0; $j < $cSize; $j++) {
                $col = $objectColumns[$j];
                $object[$col] = $result->fields[$j];

                if ($clean) {
                    // clean up MySql encoding
                    if ($dbType == 'mysql' || $dbType == 'mysqli') {
                    } else // HACK/TODO/FIXME: hack for mssql which returns ' ' for ''
                    if ($dbType == 'mssql') {
                        if ($object[$col] == ' ') {
                            $object[$col] = '';
                        }
                    } else // HACK/TODO/FIXME: hack for oracle
                    if ($dbType == 'oci8' || $dbType == 'oracle') {
                        if ($object[$col] == '""') {
                            $object[$col] = ''; // oracle equates empty string with NULL
                        } else {
                            $object[$col] = str_replace("''", "'", $object[$col]); // oracle returns "''" for what should be "'"
                        }
                    }
                }
            }

            $havePerm = true;
            if ($permissionFilter) {
                if (!is_array($permissionFilter)) {
                    return pn_exit(__('Permission filter is not an array'));
                }

                // we need an array of arrays, but this will fix a single array
                if (!is_array($permissionFilter[0])) {
                    $permissionFilter = array($permissionFilter);
                }

                foreach (array_keys($permissionFilter) as $k) {
                    $pf = $permissionFilter[$k];
                    if (!is_array($pf)) {
                        return pn_exit(__('Permission filter iterator did not return an array (must be an array of arrays)'));
                    }

                    $cl = (isset($pf['component_left']) ? $pf['component_left'] : '');
                    $cm = (isset($pf['component_middle']) ? $pf['component_middle'] : '');
                    $cr = (isset($pf['component_right']) ? $pf['component_right'] : '');
                    $il = (isset($pf['instance_left']) ? $pf['instance_left'] : '');
                    $im = (isset($pf['instance_middle']) ? $pf['instance_middle'] : '');
                    $ir = (isset($pf['instance_right']) ? $pf['instance_right'] : '');
                    $oil = ($il && isset($object[$il]) ? $object[$il] : '__PN_PERM_NO_SUCH_ITEM__');
                    $oim = ($im && isset($object[$im]) ? $object[$im] : '__PN_PERM_NO_SUCH_ITEM__');
                    $oir = ($ir && isset($object[$ir]) ? $object[$ir] : '__PN_PERM_NO_SUCH_ITEM__');
                    // not really needed
                    // $realm = (isset($pf['realm']) && $pf['realm']>0 ? $pf['realm'] : 0);
                    $level = (isset($pf['level']) && $pf['level'] ? $pf['level'] : false);

                    if (!$cl && !$cm && !$cr) {
                        return pn_exit(__f("Permission filter component is empty: [%s], [%s], [%s]", array($cl, $cm, $cr)));
                    }

                    if (!$il && !$im && !$ir) {
                        return pn_exit(__f("Permission filter instance is empty: [%s], [%s], [%s]", array($il, $im, $ir)));
                    }

                    if ($oil == '__PN_PERM_NO_SUCH_ITEM__' && $oim == '__PN_PERM_NO_SUCH_ITEM__' && $oir == '__PN_PERM_NO_SUCH_ITEM__') {
                        return pn_exit(__f("Permission filter instance is invalid: [%s], [%s], [%s]", array($oil, $oim, $oir)));
                    }

                    if (!$level) {
                        return pn_exit(__f("Permission filter level is invalid: [%s]", $level));
                    }

                    if (!SecurityUtil::checkPermission("$cl:$cm:$cr", "$oil:$oim:$oir", $level)) {
                        $havePerm = false;
                        break;
                    }
                }
            }

            if ($havePerm) {
                if ($assocKey) {
                    $key = $object[$assocKey];
                    $objectArray[$key] = $object;
                } else {
                    $objectArray[] = $object;
                }
            }
        }

        global $PNConfig;
        global $PNRuntime;
        $uid = SessionUtil::getVar('uid', 0);
        $suid = $PNConfig['Debug']['sql_user'];

        if ($PNConfig['Debug']['sql_detail']) {
            if (!$suid || (is_array($suid) && in_array($uid)) || ($suid === $uid)) {
                $last = count($PNRuntime['sql']);
                $PNRuntime['sql'][$last - 1]['rows_marshalled'] = count($objectArray);
            }
        }

        if ($PNConfig['Debug']['sql_data']) {
            if (!$suid || (is_array($suid) && in_array($uid)) || ($suid === $uid)) {
                $last = count($PNRuntime['sql']);
                $PNRuntime['sql'][$last - 1]['rows'] = $objectArray;
            }
        }

        if ($closeResultSet) {
            $result->Close();
        }

        DBUtil::_addMarshalledObjectCount(count($objectArray));
        DBUtil::_setFetchedObjectCount($fCount);

        return $objectArray;
    }

    /**
     * Transform a result set into an array of field values
     *
     * @param result          The result set we wish to marshall
     * @param closeResultSet  whether or not to close the supplied result set (optional) (default=true)
     * @param assocKey        The key field to use to build the associative index (optional) (default='')
     *
     * @return The resulting field array
     */
    function marshallFieldArray($result, $closeResultSet = true, $assocKey = '', $clean = true)
    {
        if (!$result) {
            return pn_exit(__f('Error! Invalid %s received.', 'result'));
        }

        $fieldArray = array();
        $dbType = DBConnectionStack::getConnectionDBType();
        $haveCExt = extension_loaded('adodb');
        for ($i = 0; !$result->EOF; ($haveCExt ? adodb_movenext($result) : $result->MoveNext()), $i++) {
            $t = $result->fields[0];

            if ($clean) {
                // clean up MySql encoding
                if ($dbType == 'mysql' || $dbType == 'mysqli') {
                } else // HACK/TODO/FIXME: hack for mssql which returns ' ' for ''
                if ($dbType == 'mssql') {
                    if ($t == ' ') {
                        $t = '';
                    }
                } else // HACK/TODO/FIXME: hack for oracle
                if ($dbType == 'oci8' || $dbType == 'oracle') {
                    if ($t == '""') {
                        $t = ''; // oracle equates empty string with NULL
                    } else {
                        $t = str_replace("''", "'", $t); // oracle returns "''" for what should be "'"
                    }
                }
            }

            if ($assocKey) {
                $f1 = $result->fields[1];
                $fieldArray[$f1] = $t;
            } else {
                $fieldArray[$i] = $t;
            }
        }

        if ($closeResultSet) {
            $result->Close();
        }

        global $PNConfig;
        if ($PNConfig['Debug']['sql_detail']) {
            $uid = SessionUtil::getVar('uid', 0);
            $suid = $PNConfig['Debug']['sql_user'];
            if (!$suid || (is_array($suid) && in_array($uid)) || ($suid === $uid)) {
                global $PNRuntime;
                $last = count($PNRuntime['sql']);
                $PNRuntime['sql'][$last - 1]['rows_marshalled'] = count($fieldArray);
            }
        }

        return $fieldArray;
    }

    /**
     * Build a list of objects which are mapped to the specified categories
     *
     * @param categoryFilter   The category list to use for filtering
     * @param returnArray      Whether or not to return an array (optional) (default=false)
     *
     * @return The resulting string or array
     */
    function _generateCategoryFilter($tablename, $categoryFilter, $returnArray = false)
    {
        if (!$categoryFilter) {
            return '';
        }

        if (!pnModDBInfoLoad('Categories')) {
            return '';
        }

        // check the meta data
        if (isset($categoryFilter['__META__']['module'])) {
            $modname = $categoryFilter['__META__']['module'];
        } else {
            $modname = pnModGetName();
        }

        // check operator to use
        // when it's AND, the where contains subqueries
        if (isset($categoryFilter['__META__']['operator']) && in_array(strtolower($categoryFilter['__META__']['operator']), array('and', 'or'))) {
            $op = strtoupper($categoryFilter['__META__']['operator']);
        } else {
            $op = 'OR';
        }

        unset($categoryFilter['__META__']);

        // get the properties IDs in the category register
        Loader::loadClass('CategoryRegistryUtil');
        $propids = CategoryRegistryUtil::getRegisteredModuleCategoriesIds($modname, $tablename);

        // build the where clause
        $n = 1; // subquery counter
        $catmapobjtbl = DBUtil::getLimitedTablename('categories_mapobj');

        $where = array();
        foreach ($categoryFilter as $property => $category)
        {
            $prefix = '';
            if ($op == 'AND') {
                $prefix = "table$n.";
                $n++;
            }

            // this allows to have an array of categories IDs
            if (is_array($category)) {
                $wherecat = array();
                foreach ($category as $cat) {
                    $wherecat[] = "{$prefix}cmo_category_id='" . DataUtil::formatForStore($cat) . "'";
                }
                $wherecat = '(' . implode(' OR ', $wherecat) . ')';

            // if there's only one category ID
            } else {
                $wherecat = "{$prefix}cmo_category_id='" . DataUtil::formatForStore($category) . "'";
            }

            // process the where depending of the operator
            if ($op == 'AND') {
                $where[] = "cmo_obj_id IN (SELECT {$prefix}cmo_obj_id FROM $catmapobjtbl table$n WHERE {$prefix}cmo_reg_id = '".DataUtil::formatForStore($propids[$property])."' AND $wherecat)";
            } else {
                $where[] = "(cmo_reg_id='" . DataUtil::formatForStore($propids[$property]) . "' AND $wherecat)";
            }
        }
        $where = "cmo_table='" . DataUtil::formatForStore($tablename) . "' AND (" . implode(" $op ", $where) . ')';

        // perform the query
        $objIds = DBUtil::selectFieldArray('categories_mapobj', 'obj_id', $where);

        // this ensures that we return an empty set if no objects are mapped to the requested categories
        if (!$objIds)
            $objIds[] = -1;

        if ($returnArray)
            return $objIds;

        return implode(',', $objIds);
    }

    /**
     * Append the approriate category filter where-clause to the given where clause.
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param where            The where clause (optional) (default='')
     * @param categoryFilter   The category list to use for filtering
     * @param returnArray      Whether or not to return an array (optional) (default=false)
     * @param usesJoin         Whether a join is used (if yes, then a prefix is prepended to the column name) (optional) (default=false)
     *
     * @return The resulting string or array
     */
    function generateCategoryFilterWhere($tablename, $where, $categoryFilter, $returnArray = false, $usesJoin = false)
    {
        $idlist = DBUtil::_generateCategoryFilter($tablename, $categoryFilter);
        if ($idlist) {
            $pntables = pnDBGetTables();
            $cols = $pntables["{$tablename}_column"];
            $idcol = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';

            $and = ($where ? ' AND ' : '');
            $tblName = ($usesJoin ? 'tbl.' : '') . $cols[$idcol];
            $where .= "$and $tblName IN ($idlist)";
        }

        return $where;
    }

    /**
     * Select & return a field array
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param field        The name of the field we wish to marshall
     * @param where        The where clause (optional) (default='')
     * @param orderby      The orderby clause (optional) (default='')
     * @param distinct     whether or not to add a 'DISTINCT' clause (optional) (default=false)
     * @param assocKey     The key field to use to build the associative index (optional) (default='')
     *
     * @return The resulting field array
     */
    function selectFieldArray($tablename, $field, $where = '', $orderby = '', $distinct = false, $assocKey = '')
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];
        $where = DBUtil::_checkWhereClause($where);

        if ($orderby) {
            $orderby = DBUtil::_checkOrderByClause($orderby, $tablename);
        } else {
            $orderby = DBUtil::_checkOrderByField($tablename, $field); // "ORDER BY $columns[$field]";
        }

        $dSql = ($distinct ? "DISTINCT($columns[$field])" : "$columns[$field]");
        $assoc = ($assocKey ? ", $columns[$assocKey]" : '');
        $sql = "SELECT $dSql $assoc FROM $table $where $orderby";
        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        return DBUtil::marshallFieldArray($res, true, $assocKey);
    }

    /**
     * Select & return an array of field by an ID-field value
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param field        The field we wish to select
     * @param id           The ID value we wish to select with
     * @param idfield       The idfield to use (optional) (default='id');
     *
     * @return The resulting field value
     */
    function selectFieldArrayByID($tablename, $field, $id, $idfield = 'id')
    {
        $pntables = pnDBGetTables();
        $cols = $pntables["{$tablename}_column"];
        $where = $cols[$idfield] . "='" . DataUtil::formatForStore($id) . "'";

        return DBUtil::selectFieldArray($tablename, $field, $where);
    }

    /**
     * Select & return an expanded field array
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param joinInfo         The array containing the extended join information
     * @param field            The name of the field we wish to marshall
     * @param where            The where clause (optional) (default='')
     * @param orderby          The orderby clause (optional) (default='')
     * @param distinct         whether or not to add a 'DISTINCT' clause (optional) (default=false)
     * @param assocKey         The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     *
     * @return The resulting field array
     */
    function selectExpandedFieldArray($tablename, $joinInfo, $field, $where = '', $orderby = '', $distinct = false, $assocKey = '', $permissionFilter = null)
    {
        DBUtil::_setFetchedObjectCount(0);
        DBUtil::_setMarshalledObjectCount(0);

        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];

        $sqlJoinArray = DBUtil::_processJoinArray($tablename, $joinInfo);
        $sqlJoin = $sqlJoinArray[0];
        $sqlJoinFieldList = $sqlJoinArray[1];

        $where = DBUtil::_checkWhereClause($where);
        $orderby = DBUtil::_checkOrderByClause($orderby, $tablename);

        $dSql = ($distinct ? "DISTINCT($columns[$field])" : "$columns[$field]");
        $sqlStart = "SELECT $dSql ";
        $sqlFrom = "FROM $table AS tbl ";

        $sql = "$sqlStart $sqlJoinFieldList $sqlFrom $sqlJoin $where $orderby";
        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        return DBUtil::marshallFieldArray($res, true, $assocKey);
    }

    /**
     * Select & return the max/min value of a field
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param field         The name of the field we wish to marshall
     * @param option        MIN, MAX, SUM or COUNT (optional) (default='MAX')
     * @param where         The where clause (optional) (default='')
     *
     * @return The resulting min/max value
     */
    function selectFieldMax($tablename, $field, $option = 'MAX', $where = '')
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];

        $field = isset($columns[$field]) ? $columns[$field] : $field;
        $sql = "SELECT $option($field) FROM $table AS tbl";
        $where = DBUtil::_checkWhereClause($where);

        $sql = $sql . ' ' . $where;

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return false;
        }

        $max = false;
        if (!$res->EOF) {
            $max = $res->fields[0];
        }

        return $max;
    }

    /**
     * Select & return the max/min array of a field grouped by the associated key
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param field         The name of the field we wish to marshall
     * @param option        MIN, MAX, SUM or COUNT (optional) (default='MAX')
     * @param where         The where clause (optional) (default='')
     * @param assocKey      The key field to use to build the associative index (optional) (default='' which defaults to the primary key)
     *
     * @return The resulting min/max value
     */
    function selectFieldMaxArray($tablename, $field, $option = 'MAX', $where = '', $assocKey = '')
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];

        if (!$assocKey) {
            $assocKey = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';
        }

        $sql = "SELECT $assocKey AS $assocKey, $option($columns[$field]) AS $option FROM $table";
        $where = DBUtil::_checkWhereClause($where);

        $sql .= ' ' . $where;
        $sql .= ' ' . "GROUP BY $assocKey";

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return false;
        }

        $objArray = array();
        foreach ($res as $row) {
            $objArray[$row[0]] = $row[1];
        }

        return $objArray;
    }

    /**
     * Select & return a field by an ID-field value
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param field        The field we wish to select
     * @param id           The ID value we wish to select with
     * @param idfield       The idfield to use (optional) (default='id');
     *
     * @return The resulting field value
     */
    function selectFieldByID($tablename, $field, $id, $idfield = 'id')
    {
        $pntables = pnDBGetTables();
        $cols = $pntables["{$tablename}_column"];
        $where = $cols[$idfield] . "='" . DataUtil::formatForStore($id) . "'";

        return DBUtil::selectField($tablename, $field, $where);
    }

    /**
     * Select & return a field
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param field         The name of the field we wish to marshall
     * @param where         The where clause (optional) (default='');
     *
     * @return The resulting field array
     */
    function selectField($tablename, $field, $where = '')
    {
        $fieldArray = DBUtil::selectFieldArray($tablename, $field, $where);

        if (count($fieldArray) > 0) {
            return $fieldArray[0];
        }

        return false;
    }

    /**
     * SQL cache interface
     *
     * Call without parameters to fetch cache. Call with $clear=true to clear the cache.
     * @param bool $clear
     */
    function &SQLCache($clear = false)
    {
        static $SQLCache = array();

        if ($clear) {
            $SQLCache = array();
        }

        return $SQLCache;
    }

    /**
     * Select & return a specific object using the given sql statement
     *
     * @param sql              The sql statement to execute for the selection
     * @param tablename        The tablename key for the PNTables structure
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectObjectSQL($sql, $tablename, $columnArray = null, $permissionFilter = null, $cacheObject = true)
    {
        $cache = & DBUtil::SQLCache();

        $permissionFilterKey = '';
        if (is_array($permissionFilter)) {
            foreach ($permissionFilter as $permissionRule) {
                $permissionFilterKey .= implode('_', $permissionRule);
            }
        }
        $key = implode('_', array($sql, $tablename, implode('_', (array) $columnArray), $permissionFilterKey));

        if (!isset($cache[$key]) || ($cacheObject == false) || defined('_PNINSTALLVER')) {
            $res = DBUtil::executeSQL($sql, 0, 1);
            if ($res === false) {
                return $res;
            }
            $ca = DBUtil::getColumnsArray($tablename, $columnArray);
            $objArr = DBUtil::marshallObjects($res, $ca, true, '', true, $permissionFilter, $tablename);
            $cache[$key] = $objArr;
            if (count($objArr) > 0) {
                return $objArr[0];
            }
        } else {
            if (count($cache[$key]) > 0) {
                return $cache[$key][0];
            }
            return $cache[$key];
        }
    }

    /**
     * Select & return a specific object based on a PN table definition
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param where            The where clause (optional) (default='')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectObject($tablename, $where = '', $columnArray = null, $permissionFilter = null, $categoryFilter = null, $cacheObject = true)
    {
        $sql = DBUtil::_getSelectAllColumnsFrom($tablename, $where, '', $columnArray);
        $object = DBUtil::selectObjectSQL($sql, $tablename, $columnArray, $permissionFilter, $cacheObject);

        // since we're dealing with a single object, we
        // just check it's presence in the category mapping array
        $idarr = DBUtil::_generateCategoryFilter($tablename, $categoryFilter, true);
        $pntables = pnDBGetTables();
        $idcol = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';

        if ($idarr && $idcol && !in_array($object[$idcol], $idarr)) {
            return array();
        }

        $object = DBUtil::_selectPostProcess($object, $tablename, $idcol);
        return $object;
    }

    /**
     * Return the number of rows affected
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param where         The where clause (optional) (default='')
     * @param column        The column to place in the count phrase (optional) (default='*')
     * @param distinct      whether or not to count distinct entries (optional) (default='false')
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     *
     * @return The resulting object count
     */
    function selectObjectCount($tablename, $where = '', $column = '1', $distinct = false, $categoryFilter = null)
    {
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $cols = $pntables["{$tablename}_column"];

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter);
        $where = DBUtil::_checkWhereClause($where);

        $dst = ($distinct && $column != '1' ? 'DISTINCT' : '');
        $col = ($column === '1' ? '1' : $cols[$column]);
        $sql = "SELECT COUNT($dst $col) FROM $table AS tbl $where";

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        $count = false;
        if (!$res->EOF) {
            if (isset($res->fields[0])) {
                $count = $res->fields[0];
            } else {
                $count = $res->fields["COUNT($dst $col)"];
            }
        }

        return $count;
    }

    /**
     * Select an object count by ID
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param id            The id value to match
     * @param field         The field to match the ID against (optional) (default='id')
     * @param transformFunc Transformation function to apply to $id (optional) (default=null)
     *
     * @return The resulting object count
     */
    function selectObjectCountByID($tablename, $id, $field = 'id', $transformFunc = '')
    {
        if (!$id) {
            return pn_exit(__f('%s: empty %s supplied', array(__CLASS__.'::'.__FUNCTION__, 'id')));
        }

        if ($field == 'id' && !is_numeric($id)) {
            return pn_exit(__f('%s: non-numeric %s supplied', array(__CLASS__.'::'.__FUNCTION__, 'id')));
        }

        $pntables = pnDBGetTables();
        $cols = $pntables["{$tablename}_column"];
        if ($transformFunc) {
            $where = "$transformFunc($cols[$field])='" . DataUtil::formatForStore($id) . "'";
        } else {
            $where = $cols[$field] . "='" . DataUtil::formatForStore($id) . "'";
        }

        return DBUtil::selectObjectCount($tablename, $where, $field);
    }

    /**
     * Return the number of rows affected
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param joinInfo      The array containing the extended join information
     * @param where         The where clause (optional) (default='')
     * @param distinct      whether or not to count distinct entries (optional) (default='false') /* turned off as fix for http://code.zikula.org/core/ticket/49, not supported in SQL)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     *
     * @return The resulting object count
     */
    function selectExpandedObjectCount($tablename, $joinInfo, $where = '', $distinct = false, $categoryFilter = null)
    {
        DBUtil::_setFetchedObjectCount(0);
        DBUtil::_setMarshalledObjectCount(0);

        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $columns = $pntables["{$tablename}_column"];

        $sqlJoinArray = DBUtil::_processJoinArray($tablename, $joinInfo);
        $sqlJoin = $sqlJoinArray[0];
        $sqlJoinFieldList = $sqlJoinArray[1];

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter, false, true);
        $where = DBUtil::_checkWhereClause($where);
        //$dst      = ($distinct ? 'DISTINCT' : '');
        $sqlStart = "SELECT COUNT(*) ";
        $sqlFrom = "FROM $table AS tbl ";

        $sql = "$sqlStart $sqlJoinFieldList $sqlFrom $sqlJoin $where GROUP BY NULL";
        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        $count = false;
        if (!$res->EOF) {
            $count = $res->fields[0];
        }

        return $count;
    }

    /**
     * Return the sum of a column
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param column        The column to place in the sum phrase
     * @param where         The where clause (optional) (default='')
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     *
     * @return The resulting column sum
     */
    function selectObjectSum($tablename, $column, $where = '', $categoryFilter = null)
    {
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $cols = $pntables["{$tablename}_column"];

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter);
        $where = DBUtil::_checkWhereClause($where);

        $col = $cols[$column];
        $sql = "SELECT SUM($col) FROM $table $where";

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        $sum = false;
        if (!$res->EOF) {
            $sum = $res->fields[0];
        }

        return $sum;
    }

    /**
     * Object cache interface
     *
     * Call without parameters to fetch cache. Call with $clear=true to clear the cache (optionally only
     * for one specific table).
     * @param bool $clear
     * @param string $tablename
     */
    function &objectCache($clear = false, $tablename = null)
    {
        static $objectCache = array();

        if ($clear) {
            if ($tablename == null)
                $objectCache = array();
            else
                $objectCache[$tablename] = array();

            // Clear also underlying SQL cache
            DBUtil::SQLCache(true);
        }

        return $objectCache;
    }

    /**
     * Select & return a specific object by using the ID field
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param id               The object ID to query
     * @param field            The field key which holds the ID value (optional) (default='id')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     * @param cacheObject      If true returns a cached object if available (optional) (default=true)
     * @param transformFunc    Transformation function to apply to $id (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectObjectByID($tablename, $id, $field = 'id', $columnArray = null, $permissionFilter = null, $categoryFilter = null, $cacheObject = true, $transformFunc = null)
    {
        if (!$id) {
            return pn_exit(__f('%s: empty %s supplied', array(__CLASS__.'::'.__FUNCTION__, 'id')));
        }

        if ($field == 'id' && !is_numeric($id)) {
            return pn_exit(__f('%s: non-numeric %s supplied', array(__CLASS__.'::'.__FUNCTION__, 'id')));
        }

        // avoid double get for title hack, etc.
        $objectCache = & DBUtil::objectCache();
        if (isset($objectCache[$tablename][$field][$id]) && !defined('_PNINSTALLVER') && $cacheObject && !$categoryFilter && !$permissionFilter) {
            return $objectCache[$tablename][$field][$id];
        }

        $pntables = pnDBGetTables();
        $cols = $pntables["{$tablename}_column"];
        if ($transformFunc) {
            $where = "$transformFunc($cols[$field])='" . DataUtil::formatForStore($id) . "'";
        } else {
            $where = $cols[$field] . "='" . DataUtil::formatForStore($id) . "'";
        }

        $obj = DBUtil::selectObject($tablename, $where, $columnArray, $permissionFilter, $categoryFilter, $cacheObject);
        //$idcol = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';
        //$obj   = DBUtil::_selectPostProcess ($obj, $tablename, $idcol);
        // already done in selectObject()


        $objectCache[$tablename][$field][$id] = $obj;
        return $obj;
    }

    /**
     * Execute SQL select statement and return the value of the first column in the first row
     *
     * Mostly usefull for places where you want to do a "select count(*)" or similar scalar selection.
     *
     * @return mixed selected value
     */
    function selectScalar($sql, $exitOnError = true)
    {
        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return false;
        }

        $value = null;
        if ($res->EOF) {
            if ($exitOnError)
                return pn_exit(__f('%s got no rows to select from', 'DBUtil::selectScalar'));
        } else if (count($res->fields) < 1) {
            if ($exitOnError)
                return pn_exit(__f('%s got no columns to select from', 'DBUtil::selectScalar'));
        } else {
            $value = $res->fields[0];
        }

        $res->close();
        return $value;
    }

    /**
     * Select & return a object with it's left join fields filled in
     *
     * @param tablename         The tablename key for the PNTables structure
     * @param joinInfo          The array containing the extended join information
     * @param where             The where clause (optional)
     * @param columnArray       The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter  The permission structure to use for permission checking (optional) (default=null)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObject($tablename, $joinInfo, $where = '', $columnArray = null, $permissionFilter = null, $categoryFilter = null)
    {
        $objects = DBUtil::selectExpandedObjectArray($tablename, $joinInfo, $where, '', 0, 1, '', $permissionFilter, $categoryFilter, $columnArray);

        if (count($objects)) {
            return $objects[0];
        }

        return $objects;
    }

    /**
     * Select & return an object by it's ID  with it's left join fields filled in
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param joinInfo         The array containing the extended join information
     * @param id               The ID value to use for object retrieval
     * @param field            The field key which holds the ID value (optional) (default='id')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     * @param transformFunc    Transformation function to apply to $id (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObjectByID($tablename, $joinInfo, $id, $field = 'id', $columnArray = null, $permissionFilter = null, $categoryFilter = null, $transformFunc = null)
    {
        $pntables = pnDBGetTables();
        $cols = $pntables["{$tablename}_column"];

        if ($transformFunc) {
            $where = "tbl.$transformFunc($cols[$field])='" . DataUtil::formatForStore($id) . "'";
        } else {
            $where = "tbl.$cols[$field] ='" . DataUtil::formatForStore($id) . "'";
        }

        $object = DBUtil::selectExpandedObject($tablename, $joinInfo, $where, $columnArray, $permissionFilter, $categoryFilter);
        return $object;
    }

    /**
     * Select & return an object array based on a PN table definition
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param where          The where clause (optional) (default='')
     * @param orderby        The order by clause (optional) (default='')
     * @param limitOffset    The lower limit bound (optional) (default=-1)
     * @param limitNumRows   The upper limit bound (optional) (default=-1)
     * @param assocKey       The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     * @param categoryFilter   The category list to use for filtering (optional) (default=null)
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The resulting object array
     */
    function selectObjectArray($tablename, $where = '', $orderby = '', $limitOffset = -1, $limitNumRows = -1, $assocKey = '', $permissionFilter = null, $categoryFilter = null, $columnArray = null)
    {
        DBUtil::_setFetchedObjectCount(0);
        DBUtil::_setMarshalledObjectCount(0);

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter);
        $where = DBUtil::_checkWhereClause($where);
        $orderby = DBUtil::_checkOrderByClause($orderby, $tablename);

        $objects = array();
        $ca = DBUtil::getColumnsArray($tablename, $columnArray);
        $sql = DBUtil::_getSelectAllColumnsFrom($tablename, $where, $orderby, $columnArray);

        do {
            $fc = DBUtil::_getFetchedObjectCount();
            $stmt = $sql;
            $limitOffset += $fc;

            $res = DBUtil::executeSQL($stmt, $limitOffset, $limitNumRows);
            if ($res === false) {
                return $res;
            }

            $objArr = DBUtil::marshallObjects($res, $ca, true, $assocKey, true, $permissionFilter, $tablename);
            $fc     = DBUtil::_getFetchedObjectCount();
            if ($objArr) {
                $objects = $objects + (array) $objArr; // append new array
            }
        } while ($permissionFilter && ($limitNumRows != -1 && $limitNumRows > 0) && $fc > 0 && count($objects) < $limitNumRows);

        if ($limitNumRows != -1 && count($objects) > $limitNumRows) {
            $objects = array_slice($objects, 0, $limitNumRows);
        }

        if (!DBConnectionStack::isDefaultConnection()) {
            return $objects;
        }

        $pntables = pnDBGetTables();
        $idcolumn = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';
        $objects = DBUtil::_selectPostProcess($objects, $tablename, $idcolumn);

        return $objects;
    }

    /**
     * Select & return an object array based on a PN table definition
     *
     * The result is filtered by a callback object passed into the function. This object must
     * have implemented a method called "checkResult" which is passed the resulting data rows
     * one by one. The "checkResult" function returns true if the datarow is ok, otherwise
     * it returns false.
     *
     * Example:
     * <code>
     * class myFilter
     * {
     *   var $userId;
     *
     *   function checkResult($datarow)
     *   {
     *     return $datarow['ownerUserId'] == $this->userId;
     *   }
     * }
     * </code>
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param where          The where clause (optional) (default='')
     * @param orderby        The order by clause (optional) (default='')
     * @param limitOffset    The lower limit bound (optional) (default=-1)
     * @param limitNumRows   The upper limit bound (optional) (default=-1)
     * @param assocKey       The key field to use to build the associative index (optional) (default='')
     * @param filterCallback The filter callback object.
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The resulting object array
     */
    function selectObjectArrayFilter($tablename, $where = '', $orderby = '', $limitOffset = -1, $limitNumRows = -1, $assocKey = '', $filterCallback, $categoryFilter = null, $columnArray = null)
    {
        DBUtil::_setFetchedObjectCount(0);
        DBUtil::_setMarshalledObjectCount(0);

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter);
        $where = DBUtil::_checkWhereClause($where);
        $orderby = DBUtil::_checkOrderByClause($orderby, $tablename);

        $objects = array();
        $fc = 0;
        $ca = DBUtil::getColumnsArray($tablename, $columnArray);
        $sql = DBUtil::_getSelectAllColumnsFrom($tablename, $where, $orderby, $columnArray);

        do {
            $stmt = $sql;
            $limitOffset += $fc;

            $res = DBUtil::executeSQL($stmt, $limitOffset, $limitNumRows);
            if ($res === false) {
                return $res;
            }

            $objArr = DBUtil::marshallObjects($res, $ca, true, $assocKey, true, null, $tablename);
            $fc = DBUtil::_getFetchedObjectCount();

            for ($i = 0, $cou = count($objArr); $i < $cou; ++$i) {
                $obj = & $objArr[$i];
                if ($filterCallback->checkResult($obj))
                    $objects[] = $obj;
            }
        } while ($limitNumRows != -1 && $limitNumRows > 0 && $fc > 0 && count($objects) < $limitNumRows);

        if (!DBConnectionStack::isDefaultConnection()) {
            return $objects;
        }

        $pntables = pnDBGetTables();
        $idcolumn = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';
        $objects = DBUtil::_selectPostProcess($objects, $tablename, $idcolumn);

        return $objects;
    }

    /**
     * Select & return an array of objects with it's left join fields filled in
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param joinInfo      The array containing the extended join information
     * @param where         The where clause (optional) (default='')
     * @param orderby       The order by clause (optional) (default='')
     * @param limitOffset   The lower limit bound (optional) (default=-1)
     * @param limitNumRows  The upper limit bound (optional) (default=-1)
     * @param assocKey      The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter  The permission filter to use for permission checking (optional) (default=null)
     * @param columnArray   The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObjectArray($tablename, $joinInfo, $where = '', $orderby = '', $limitOffset = -1, $limitNumRows = -1, $assocKey = '', $permissionFilter = null, $categoryFilter = null, $columnArray = null)
    {
        DBUtil::_setFetchedObjectCount(0);
        DBUtil::_setMarshalledObjectCount(0);

        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];

        $sqlStart = "SELECT " . DBUtil::_getAllColumnsQualified($tablename, 'tbl', $columnArray);
        $sqlFrom = "FROM $table AS tbl ";

        $sqlJoinArray = DBUtil::_processJoinArray($tablename, $joinInfo, $columnArray);
        $sqlJoin = $sqlJoinArray[0];
        $sqlJoinFieldList = $sqlJoinArray[1];
        $ca = $sqlJoinArray[2];

        $where = DBUtil::generateCategoryFilterWhere($tablename, $where, $categoryFilter);

        $where = DBUtil::_checkWhereClause($where);
        $orderby = DBUtil::_checkOrderByClause($orderby, $tablename);

        $objects = array();
        $sql = "$sqlStart $sqlJoinFieldList $sqlFrom $sqlJoin $where $orderby";

        do {
            $fc = DBUtil::_getFetchedObjectCount();
            $stmt = $sql;
            $limitOffset += $fc;

            $res = DBUtil::executeSQL($stmt, $limitOffset, $limitNumRows);
            if ($res === false) {
                return $res;
            }

            $objArr = DBUtil::marshallObjects($res, $ca, true, $assocKey, true, $permissionFilter, $tablename);
            $fc     = DBUtil::_getFetchedObjectCount();
            if ($objArr) {
                $objects = $objects + (array) $objArr; // append new array
            }
        } while ($permissionFilter && ($limitNumRows != -1 && $limitNumRows > 0) && $fc > 0 && count($objects) < $limitNumRows);

        if (count($objects) > $limitNumRows && $limitNumRows > 0) {
            $objects = array_slice($objects, 0, $limitNumRows);
        }

        if (!DBConnectionStack::isDefaultConnection()) {
            return $objects;
        }

        $idcolumn = isset($pntables["{$tablename}_primary_key_column"]) ? $pntables["{$tablename}_primary_key_column"] : 'id';
        $objects = DBUtil::_selectPostProcess($objects, $tablename, $idcolumn);
        return $objects;
    }

    /**
     * Loop through the array and feed it to DBUtil::insertObject()
     *
     * @param objects       The objectArray we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param idcolumn      The column which stores the primary key (optional) (default='id')
     * @param preserve      whether or not to preserve existing/set standard fields (optional) (default=false)
     * @param force         whether or not to insert empty values as NULL (optional) (default=false)
     *
     * @return The result set from the last insert operation. The objects are updated with the newly generated ID.
     */
    function insertObjectArray(&$objects, $tablename, $idcolumn = 'id', $preserve = false, $force = false)
    {
        if (!is_array($objects)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'objects')));
        }

        $res = false;
        foreach (array_keys($objects) as $k) {
            $res = DBUtil::insertObject($objects[$k], $tablename, $idcolumn, $preserve, $force);
            if (!$res) {
                break;
            }
        }

        return $res;
    }

    /**
     * Generate and execute an insert SQL statement for the given object
     *
     * @param object        The object we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param idcolumn      The column which stores the primary key (optional) (default='id')
     * @param preserve      whether or not to preserve existing/set standard fields (optional) (default=false)
     * @param force         whether or not to insert empty values as NULL (optional) (default=false)
     *
     * @return The result set from the update operation. The object is updated with the newly generated ID.
     */
    function insertObject(&$object, $tablename, $idcolumn = 'id', $preserve = false, $force = false)
    {
        if (!is_array($object)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'object')));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $sql = "INSERT INTO $table ";

        // set standard architecture fields
        ObjectUtil::setStandardFieldsOnObjectCreate($object, $preserve, $idcolumn);

        // build the column list
        //$obj_id = $dbconn->GenID($pntables[$tablename]);
        $column = $pntables["{$tablename}_column"];
        if (!is_array($column)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, $tablename)));
        }

        // When explicityly inserting an autoincrement value, MSSQL server needs to be told to allow this.
        // This property can only be set once per table and can only be set on 1 table at a time.
        $dbType = DBConnectionStack::getConnectionDBType();
        static $identityInsertTbl = null;
        if ($dbType == 'mssql' && isset($object[$idcolumn]) && $object[$idcolumn]) {
            if (!$identityInsertTbl || $identityInsertTbl != $table) {
                // TODO/FIXME: for some reason the data dictionary on mssql seems to be slightly broken and
                // returns field information without the AUTO specification while also generating an
                // include file error to the mssql datadict include file (which is in the correct place).


                //$colType = DBUtil::metaColumnType($tablename, $idcolumn, true);
                //if (strpos($colType, ' AUTO') !== false) { // ensure that this is set only for autoincrement fields
                DBUtil::executeSQL("SET IDENTITY_INSERT $table ON", -1, -1, false, false);
                $identityInsertTbl = $table;
                //}
            }
        }

        // grab each key and value and append to the sql string
        $clobArray = array();
        $cArray = array();
        $vArray = array();
        $search = array('+', '-', '*', '/', '%');
        $replace = array('');
        foreach ($column as $key => $val) {
            $hasMath = (bool) (strcmp($val, str_replace($search, $replace, $val)));
            if ($hasMath) {
                continue;
            }

            if (isset($object[$key])) {
                $skip = false;
                $save = false;
                $colType = DBUtil::metaColumnType($tablename, $key);

                // oracle specific stuff
                if ($dbType == 'oci8' || $dbType == 'oracle') {
                    $save = null;
                    // oracle treats an empty string as NULL -> hack to avoid NULL for empty strings
                    if ($object[$key] === '' && ($colType == 'C' || $colType == 'X')) {
                        $save = $object[$key];
                        $object[$key] = '""';
                    } // oracle needs special treatment of CLOB columns
                    elseif ($colType == 'XL') {
                        $skip = true;
                        $clobArray[$column[$key]] = DataUtil::formatForStore((string) $object[$key]);
                    }
                } else // mssql doesn't understand DATEFORMAT_FIXED, we have to convert
                if ($dbType == 'mssql' && $colType == 'T') {
                    $save = $object[$key];
                    $object[$key] = DateUtil::formatDatetime($object[$key], '%Y%m%d %H:%M:%S');
                }

                // ensure that international float numbers are stored with '.' rather than ',' for decimal separator
                if ($colType == 'F' || $colType == 'N') {
                    if (is_float($object[$key]) || is_double($object[$key])) {
                        $object[$key] = number_format($object[$key], 8, '.', '');
                    }
                }

                // generate the actual insert values
                if (!$skip) {
                    $cArray[] = $column[$key];
                    $vArray[] = DBUtil::_formatForStore($object[$key]);
                }

                // for oracle empty strings restore original value
                if (($dbType == 'oci8' || $dbType == 'oracle') && $save === '' && ($colType == 'C' || $colType == 'X')) {
                    $object[$key] = $save;
                } else // for mssql dates restore original value
                if ($dbType == 'mssql' && $colType == 'T') {
                    $object[$key] = $save;
                }
            } else {
                if ($key == $idcolumn) {
                    if ($dbType == 'postgres') {
                        $cArray[] = $column[$key];
                        $vArray[] = 'DEFAULT';
                    }
                } else if ($force) {
                    $cArray[] = $column[$key];
                    $vArray[] = 'NULL';
                }
            }
        }

        if ($cArray && $vArray) {
            $sql .= '(';
            $sql .= implode(',', $cArray);
            $sql .= ')';
            $sql .= 'VALUES (';
            $sql .= implode(',', $vArray);
            $sql .= ')';

            $res = DBUtil::executeSQL($sql);
            if ($res === false) {
                return $res;
            }
        } else {
            return pn_exit(__f('%s: unable to find anything to insert in the supplied object', __CLASS__.'::'.__FUNCTION__));
        }

        if ((!$preserve || !isset($object[$idcolumn])) && isset($column[$idcolumn])) {
            $obj_id = DBUtil::getInsertID($tablename, $idcolumn);
            $object[$idcolumn] = $obj_id;
        }

        if ($clobArray) {
            $res = DBUtil::_handleClobFields($tablename, $object, $clobArray, $idcolumn);
        }

        if (!DBConnectionStack::isDefaultConnection()) {
            return $object;
        }

        if ($cArray && $vArray) {
            $object = DBUtil::_savePostProcess($object, $tablename, $idcolumn);
        }

        return $object;
    }

    /**
     * Generate and execute an update SQL statement for the given object
     *
     * @param object        The object we wish to update
     * @param tablename     The tablename key for the PNTables structure
     * @param where         The where clause (optional) (default='')
     * @param idcolumn      The column which stores the primary key (optional) (default='id')
     * @param force         whether or not to insert empty values as NULL (optional) (default=false)
     * @param updateid      Allow primary key to be updated (default=false)
     *
     * @return The result set from the update operation
     */
    function updateObject(&$object, $tablename, $where = '', $idcolumn = 'id', $force = false, $updateid = false)
    {
        if (!is_array($object)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'object')));
        }

        if (!isset($object[$idcolumn]) && !$where) {
            return pn_exit(__f('%s: no object ID and no where', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();
        $sql = "UPDATE $pntables[$tablename] SET ";

        // set standard architecture fields
        ObjectUtil::setStandardFieldsOnObjectUpdate($object, $force);

        // grab each key and value and append to the sql string
        $clobArray = array();
        $tArray = array();
        $search = array('+', '-', '*', '/', '%');
        $replace = array('');
        $column = $pntables["{$tablename}_column"];
        $dbType = DBConnectionStack::getConnectionDBType();
        foreach ($column as $key => $val)
        {
            $hasMath = (bool) (strcmp($val, str_replace($search, $replace, $val)));
            if ($hasMath) {
                continue;
            }

            if ($key != $idcolumn || ($key == $idcolumn && $updateid == true)) {
                if ($force || array_key_exists($key, $object)) {
                    $skip = false;
                    $colType = DBUtil::metaColumnType($tablename, $key);

                    // oracle specific stuff
                    if ($dbType == 'oci8' || $dbType == 'oracle') {
                        $save = null;
                        // oracle treats an empty string as NULL -> hack to avoid NULL for empty strings
                        if ($object[$key] === '' && ($colType == 'C' || $colType == 'X')) {
                            $save = $object[$key];
                            $object[$key] = '""';
                        } // oracle needs special treatment of CLOB columns
                        elseif ($colType == 'XL') {
                            $skip = true;
                            $clobArray[$column[$key]] = DataUtil::formatForStore((string) $object[$key]);
                        }
                    } else // mssql doesn't understand DATEFORMAT_FIXED, we have to convert
                    if ($dbType == 'mssql' && $colType == 'T') {
                        $save = $object[$key];
                        $object[$key] = DateUtil::formatDatetime($object[$key], '%Y%m%d %H:%M:%S');
                    }

                    // ensure that international float numbers are stored with '.' rather than ',' for decimal separator
                    if ($colType == 'F' || $colType == 'N') {
                        if (is_float($object[$key]) || is_double($object[$key])) {
                            $object[$key] = number_format($object[$key], 8, '.', '');
                        }
                    }

                    // generate the actual update values
                    if (!$skip) {
                        $tArray[] = "$val=" . (isset($object[$key]) ? DBUtil::_formatForStore($object[$key]) : 'NULL');
                    }

                    // for oracle empty strings restore original value
                    if (($dbType == 'oci8' || $dbType == 'oracle') && $save === '' && ($colType == 'C' || $colType == 'X')) {
                        $object[$key] = $save;
                    } else // for mssql dates restore original value
                    if ($dbType == 'mssql' && $colType == 'T') {
                        $object[$key] = $save;
                    }
                }
            }
        }

        if ($tArray) {
            if (!$where) {
                $_where = " WHERE $column[$idcolumn]='" . DataUtil::formatForStore($object[$idcolumn]) . "'";
            } else {
                $_where = DBUtil::_checkWhereClause($where);
            }

            $sql .= implode(',', $tArray) . " $_where";

            $res = DBUtil::executeSQL($sql);
            if ($res === false) {
                return $res;
            }
        }

        if ($clobArray) {
            // This section commented out - see patch [#4364] DBUtil fix for explanation
            // since a where clause may not correspond to the acutal ID, we have to fetch the ID here
            //if ($where) {
            //    $id  = DBUtil::selectField ($tablename, $idcolumn, $where);
            //    $object[$idcolumn] = $id;
            //}
            $res = DBUtil::_handleClobFields($tablename, $object, $clobArray, $idcolumn);
        }

        if (!DBConnectionStack::isDefaultConnection()) {
            return $object;
        }

        $object = DBUtil::_savePostProcess($object, $tablename, $idcolumn, true);

        return $object;
    }

    /**
     * Loop through the array and feed it to DBUtil::updateObject()
     *
     * @param objects       The objectArray we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param idcolumn      The column which stores the primary key
     * @param force         whether or not to insert empty values as NULL
     *
     * @return The result set from the last insert operation. The objects are updated with the newly generated ID.
     */
    function updateObjectArray(&$objects, $tablename, $idcolumn = 'id', $force = false)
    {
        if (!is_array($objects)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'objects')));
        }

        $res = true;

        foreach (array_keys($objects) as $k) {
            $res = DBUtil::updateObject($objects[$k], $tablename, '', $idcolumn, $force);
            if (!$res) {
                break;
            }
        }

        return $res;
    }

    /**
     * Increment a field by the given increment
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param incfield      The column which stores the field to increment
     * @param id            The ID value of the object holding the field we wish to increment
     * @param idfield       The idfield to use (optional) (default='id')
     * @param inccount      The amount by which to increment the field (optional) (default=1);
     *
     * @return The result from the increment operation
     */
    function incrementObjectFieldByID($tablename, $incfield, $id, $idfield = 'id', $inccount = 1)
    {
        $pntables = pnDBGetTables();
        $column = $pntables["{$tablename}_column"];

        $sql = "UPDATE $pntables[$tablename] SET $column[$incfield] = $column[$incfield] + $inccount";
        $sql .= " WHERE $column[$idfield] = '" . DataUtil::formatForStore($id) . "'";

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return false;
        }

        return $res;
    }

    /**
     * Loop through the array and feed it to DBUtil::insertObject()
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param decfield      The column which stores the field to increment
     * @param id            The ID value of the object holding the field we wish to increment
     * @param idfield       The idfield to use (optional) (default='id')
     * @param deccount      The amount by which to decrement the field (optional) (default=1);
     *
     * @return The result from the decrement operation
     */
    function decrementObjectFieldByID($tablename, $decfield, $id, $idfield = 'id', $deccount = 1)
    {
        return DBUtil::incrementObjectFieldByID($tablename, $decfield, $id, $idfield, 0 - $deccount);
    }

    /**
     * Delete (an) object(s) via a where clause
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param where        The where-clause to use
     *
     * @return The result from the delete operation
     */
    function deleteWhere($tablename, $where)
    {
        if (!$where) {
            return pn_exit(__f('%s: empty %s passed', array(__CLASS__.'::'.__FUNCTION__, 'where clause')));
        }

        $object = array();
        return DBUtil::deleteObject($object, $tablename, $where);
    }

    /**
     * Delete an object by its ID.
     *
     * @param tablename   The tablename key for the PNTables structure
     * @param id          The ID of the object to delete
     * @param idcolumn    The column which contains the ID field (optional) (default='id')
     *
     * @return The result from the delete operation
     */
    function deleteObjectByID($tablename, $id, $idcolumn = 'id')
    {
        $object = array();
        $object[$idcolumn] = $id;
        return DBUtil::deleteObject($object, $tablename, '', $idcolumn);
    }

    /**
     * Generate and execute a delete SQL statement for the given object
     *
     * @param object       The object we wish to update
     * @param tablename    The tablename key for the PNTables structure
     * @param where        The where clause to use (optional) (default='')
     * @param idcolumn     The column which contains the ID field (optional) (default='id')
     *
     * @return The result from the delete operation
     */
    function deleteObject($object, $tablename, $where = '', $idcolumn = 'id')
    {
        if (!is_array($object) && $object != null) {
            return pn_exit(__f('%s: %s is not an array or null', array(__CLASS__.'::'.__FUNCTION__, 'object')));
        }

        if ($object && $where) {
            return pn_exit(__f("%s: can't specify both object and where-clause", __CLASS__.'::'.__FUNCTION__));
        }

        if (!$object && !$where) {
            return pn_exit(__f("%s: missing either object or where-clause", __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();
        $column = $pntables["{$tablename}_column"];
        $tab = $pntables[$tablename];

        $sql = "DELETE FROM $tab ";
        if (!$where) {
            if (!$object[$idcolumn]) {
                return pn_exit(__f('%s: object does not have an ID', __CLASS__.'::'.__FUNCTION__));
            }

            $sql .= "WHERE $column[$idcolumn]='" . DataUtil::formatForStore($object[$idcolumn]) . "'";
        } else {
            $sql .= DBUtil::_checkWhereClause($where);
            $object['__fake_field__'] = __('Fake entry to mark deleteWhere() return as valid object');
        }

        $res = DBUtil::executeSQL($sql);
        if ($res === false) {
            return $res;
        }

        // Attribution and logging only make sense if we do object-based deletion.
        // If we come from deleteWhere, we simply don't do any of this as in that
        // case we don't know the object ID to map attributes to.
        // TODO: there should be a dangling attribute cleanup function somewhere.
        if (!DBConnectionStack::isDefaultConnection() || $where) {
            return $object;
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_categorization"]) && $pntables["{$tablename}_db_extra_enable_categorization"])) && pnConfigGetVar('PN_CONFIG_USE_OBJECT_CATEGORIZATION') && $tablename != 'categories_' && $tablename != 'objectdata_attributes' && $tablename != 'objectdata_log' && pnModAvailable('Categories')) {
            ObjectUtil::deleteObjectCategories($object, $tablename, $idcolumn);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_attribution"]) && $pntables["{$tablename}_db_extra_enable_attribution"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION')) && $tablename != 'objectdata_attributes' && $tablename != 'objectdata_log' && pnModAvailable('ObjectData')) {
            ObjectUtil::deleteObjectAttributes($object, $tablename, $idcolumn);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_meta"]) && $pntables["{$tablename}_db_extra_enable_meta"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_META')) && $tablename != 'objectdata_attributes' && $tablename != 'objectdata_meta' && $tablename != 'objectdata_log' && pnModAvailable('ObjectData')) {
            ObjectUtil::deleteObjectMetaData($object, $tablename, $idcolumn);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_logging"]) && $pntables["{$tablename}_db_extra_enable_logging"])) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_LOGGING') && $tablename != 'objectdata_log') {
            if (pnModDBInfoLoad('ObjectData')) {
                $log = array();
                $log['object_type'] = $tablename;
                $log['object_id'] = $object[$idcolumn];
                $log['op'] = 'D';
                $log['diff'] = serialize($object);

                DBUtil::insertObject($log, 'objectdata_log');
            }
        }
        return $res;
    }

    /**
     * generate and execute a delete SQL statement
     */
    function deleteObjectsFromKeyArray($keyarray, $tablename, $field = 'id')
    {
        if (!is_array($keyarray)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'keyarray')));
        }

        $pntables = pnDBGetTables();
        $column = $pntables["{$tablename}_column"];
        $tab = $pntables[$tablename];
        $sql = "DELETE FROM $tab WHERE $column[$field] IN (";
        $sqlArray = array();

        foreach ($keyarray as $key => $val) {
            $sqlArray[] = $key;
        }

        $sql .= implode(',', $sqlArray) . ')';
        return $res = DBUtil::executeSQL($sql);
    }

    /**
     * returns the last inserted ID
     */
    function getInsertID($tablename, $field = 'id', $exitOnError = true, $verbose = true)
    {
        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $column = $pntables["{$tablename}_column"];

        if (!$resultID = $dbconn->PO_Insert_ID($table, $column[$field])) {
            if ($verbose) {
                print '<br />' . $dbconn->ErrorMsg() . '<br />';
            }

            if ($exitOnError) {
                return pn_exit(__('Exiting after SQL-error'));
            }
        }

        return $resultID;
    }

    /**
     * get the table definition from the pntables array
     *
     */
    function getTableDefinition($tablename)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();

        // try to read table definitions from $pntable array if present
        $tablecol = $tablename . '_column';
        $tabledef = $tablename . '_column_def';
        $flag = false;
        $sql = '';
        if (array_key_exists($tabledef, $pntables) && is_array($pntables[$tabledef])) {
            // we have a {$tablename}_column_def array as defined in pntables.php. This is a real array, not
            // a string. The format is like "C(24) NOTNULL DEFAULT ''" which means we have to
            // prepend the field name now
            foreach ($pntables[$tablecol] as $id => $val) {
                // the (associative) column array might have different keys (id) pointing to the same
                // table field (val) (like blanguage and language in the Blocks module)
                if (array_key_exists($id, $pntables[$tabledef])) {
                    if ($flag == true) {
                        $sql .= ', ';
                    }
                    $sql .= $val . ' ' . trim($pntables[$tabledef][$id]);
                    $flag = true;
                }
            }
            return $sql;
        } else {
            return pn_exit(__f('%1$s: neither the sql parameter nor the pntable array contain the ADODB dictionary representation of table [%2$s]', array(__CLASS__.'::'.__FUNCTION__, $tablename)));
        }
    }

    /**
     * get the table constraints from the pntables array
     *
     * @author Jose Guevara, UnderMedia S.A
     */
    function getTableConstraints($tablename)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();
        $tablecol = $tablename . '_column';
        $tableopt = $tablename . '_constraints';
        $constraints = '';
        if (array_key_exists($tableopt, $pntables) && is_array($pntables[$tableopt])) {
            foreach ($pntables[$tableopt] as $fk_column => $fk_reference) {
                $reference_table = $pntables[$fk_reference['table']];
                $reference_column = $pntables[$fk_reference['table'] . '_column'][$fk_reference['column']];
                $original_column = $pntables[$tablecol][$fk_column];
                $constraints .= ", CONSTRAINT FOREIGN KEY($original_column) REFERENCES $reference_table ($reference_column) $fk_reference[accion]";
            }
            return $constraints;
        }
    }

    /**
     * create a database table using ADODB dictionary method
     *
     * @author Drak
     * @param  tablename The tablename key for the PNTables structure
     * @param  sql ADODB dictionary representation of table (optional) (default=null)
     * @param  tabopt Table options specific to this table (optional) (default=null)
     * @return bool
     */
    function createTable($tablename, $sql = null, $tabopt = null)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify the table to create', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();

        if (empty($sql)) {
            $sql = DBUtil::getTableDefinition($tablename);
            if (!$sql) {
                return pn_exit(__f('%1$s: neither the sql parameter nor the pntable array contain the ADODB dictionary representation of table [%2$s] to create', array(__CLASS__.'::'.__FUNCTION__, $tablename)));
            }
        }

        $dbconn = DBConnectionStack::getConnection();
        $dict = NewDataDictionary($dbconn);

        if (!isset($tabopt) || empty($tabopt)) {
            $tabopt = pnDBGetTableOptions($tablename);
        }
        $tabopt['constraints'] = DBUtil::getTableConstraints($tablename);
        $table = $pntables[$tablename];
        $sqlarray = $dict->ChangeTableSQL($table, $sql, $tabopt);
        $result = $dict->ExecuteSQLArray($sqlarray);

        // create additional indexes
        $tableidx = $tablename . '_column_idx';
        if (array_key_exists($tableidx, $pntables) && is_array($pntables[$tableidx])) {
            foreach ($pntables[$tableidx] as $idx_name => $idx_definition) {
                DBUtil::createIndex($idx_name, $tablename, $idx_definition);
            }
        }

        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Table creation failed. (%1$s, %2$s, %3$s)', array($tablename, $result, $dberrmsg)));
        }
        return $success;
    }

    /**
     * change database table using ADODB dictionary method
     *
     * @author Drak
     * @param  tablename The tablename key for the PNTables structure
     * @param  sql ADODB dictionary representation of table (optional) (default=null)
     * @param  tabopt Table options specific to this table (optional) (default=null)
     * @return bool
     */
    function changeTable($tablename, $sql = null, $tabopt = null)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify the table to change', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();

        if (empty($sql)) {
            $sql = DBUtil::getTableDefinition($tablename);
            if (!$sql) {
                return pn_exit(__f('%1$s: neither the sql parameter nor the pntable array contain the ADODB dictionary representation of table [%2$s] to change', array(__CLASS__.'::'.__FUNCTION__, $tablename)));
            }
        }

        $dbconn = DBConnectionStack::getConnection();
        $dict = NewDataDictionary($dbconn);

        if (!isset($tabopt) || empty($tabopt)) {
            $tabopt = pnDBGetTableOptions();
        }
        $tabopt['constraints'] = DBUtil::getTableConstraints($tablename);
        $table = $pntables[$tablename];

        // hack to override ADODB's faulty exclusion of DATETIME transforms
        $invalidResizeTypes4 = $dict->invalidResizeTypes4;
        $dict->invalidResizeTypes4 = array('CLOB', 'BLOB', 'TEXT');
        $sqlarray = $dict->ChangeTableSQL($table, $sql, $tabopt);
        $result = $dict->ExecuteSQLArray($sqlarray);

        // restore previous values
        $dict->invalidResizeTypes4 = $invalidResizeTypes4;

        // create additional indexes
        $tableidx = $tablename . '_column_idx';
        if (array_key_exists($tableidx, $pntables) && is_array($pntables[$tableidx])) {
            $indexes = DBUtil::metaIndexes($tablename);
            foreach ($pntables[$tableidx] as $idx_name => $idx_definition) {
                if (!isset($indexes[$idx_name])) {
                    DBUtil::createIndex($idx_name, $tablename, $idx_definition);
                }
            }
        }

        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Table update failed. (%1$s, %2$s, %3$s)', array($tablename, $result, $dberrmsg)));
        }
        return $success;
    }

    /**
     * truncate database table
     *
     * @param  tablename The tablename key for the PNTables structure
     * @return bool
     */
    function truncateTable($tablename)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify the table to truncate', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();
        $dbType = DBConnectionStack::getConnectionDBType();
        if ($dbType == 'sqlite') {
            $sql = "DELETE FROM $pntables[$tablename]";
        } else {
            $sql = "TRUNCATE TABLE $pntables[$tablename]";
        }
        return DBUtil::executeSQL($sql);
    }

    /**
     * rename database table
     *
     * @param  tablename The tablename key for the PNTables structure
     * @return bool
     */
    function renameTable($tablename, $newtablename)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name'. __CLASS__.'::'.__FUNCTION__));
        }
        if (empty($newtablename)) {
            return pn_exit(__f('%s: must specify the new table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $newtable = $pntables[$newtablename];
        $sqlarray = $dict->RenameTableSQL($table, $newtable);
        $result = $dict->ExecuteSQLArray($sqlarray);
        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Table rename failed. (%1$s, %2$s, %3$s)', array($tablename, $result, $dberrmsg)));
        }
        return $success;
    }

    /**
     * delete database table
     *
     * @param  tablename The tablename key for the PNTables structure
     * @return bool
     */
    function dropTable($tablename)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $sqlarray = $dict->DropTableSQL($table);
        $result = $dict->ExecuteSQLArray($sqlarray);

        $dbType = DBConnectionStack::getConnectionDBType();
        $strict = true;
        if ($dbType == 'postgres') { // postgres returns a "sequence does not exist error" but the query executes
            $strict = false;
        }

        if ($strict) {
            $success = ($result == 2);
        } else {
            $success = ($result > 0);
        }

        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Table deletion failed. (%1$s, %2$s, %3$s)', array($tablename, $result, $dberrmsg)));
        } else {
            ObjectUtil::deleteAllObjectTypeAttributes($tablename);
        }

        return $success;
    }

    /**
     * create index on table
     *
     * @author Drak
     * @param  idxname
     * @param  tablename The tablename key for the PNTables structure
     * @param  flds string field name, or non-associative array of field names
     * @param  idxoptarray
     * return  bool
     */
    function createIndex($idxname, $tablename, $flds, $idxoptarray = false)
    {
        if (empty($idxname)) {
            return pn_exit(__f('%s: must specify an index name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($flds)) {
            return pn_exit(__f('%s: must specify an index field or fields as non-associative array', __CLASS__.'::'.__FUNCTION__));
        }

        if (!empty($idxoptarray) && !is_array($idxoptarray)) {
            return pn_exit(__f('%s: %s is not an array', array(__CLASS__.'::'.__FUNCTION__, 'idxoptarray')));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $column = $pntables["{$tablename}_column"];

        if (!is_array($flds)) {
            $flds = $column[$flds];
        } else {
            $newflds = array();
            foreach ($flds as $fld) {
                if (is_array($fld)) {
                    // this adds support to specifying index lengths in your pntables. So you can say
                    // $flds[] = array('path', 100);
                    // $flds[] = array('name', 10);
                    // $idxoptarray['UNIQUE'] = true;
                    // DBUtil::createIndex($idxname, $table, $flds, $idxoptarray);
                    $newflds[] = '' . $column[$fld[0]] . "($fld[1])";
                } else {
                    $newflds[] = $column[$fld];
                }
            }
            $flds = $newflds;
        }

        $sqlarray = $dict->CreateIndexSQL($idxname, $table, $flds, $idxoptarray);
        $result = $dict->ExecuteSQLArray($sqlarray);
        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Index creation failed. (%1$s, %2$s, %3$s, %4$s)', array($idxname, $tablename, $result, $dberrmsg)));
        }
        return $success;
    }

    /**
     * drop index on table
     *
     * @author Drak
     * @param  idxname index name
     * @param  tablename The tablename key for the PNTables structure
     * return  bool
     */
    function dropIndex($idxname, $tablename)
    {
        if (empty($idxname)) {
            return pn_exit(__f('%s: must specify an index name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $sqlarray = $dict->DropIndexSQL($idxname, $table);
        $result = $dict->ExecuteSQLArray($sqlarray);
        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Index deletion failed. (%1$s, %2$s, %3$s, %4$s)', array($idxname, $tablename, $result, $dberrmsg)));
        }
        return $success;
    }

    /**
     * rename column(s) in a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  oldcolumn The existing name of the column (full database name of column)
     * @param  newcolumn The new name of the column from the pntables array
     * @param  fields    field specific options (optional) (default=null)
     * return  bool
     */
    function renameColumn($tablename, $oldcolumn, $newcolumn, $fields = null)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }
        if (empty($oldcolumn)) {
            return pn_exit(__f('%s: must specify an existing column name', __CLASS__.'::'.__FUNCTION__));
        }
        if (empty($newcolumn)) {
            return pn_exit(__f('%s: must specify the new column name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        if (!isset($fields) || empty($fields)) {
            $fields = $pntables["{$tablename}_column"][$newcolumn] . ' ' . $pntables["{$tablename}_column_def"][$newcolumn];
        }
        $oldcolumn = isset($pntables["{$tablename}_column"][$oldcolumn]) ? $pntables["{$tablename}_column"][$oldcolumn] : $oldcolumn;
        $newcolumn = $pntables["{$tablename}_column"][$newcolumn];
        $sqlarray = $dict->RenameColumnSQL($table, $oldcolumn, $newcolumn, $fields);
        $result = $dict->ExecuteSQLArray($sqlarray);
        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Column rename failed. (%1$s, %2$s, %3$s, %4$s)', array($tablename, $oldcolumn, $newcolumn, $dberrmsg)));
        }
        return $success;
    }

    /**
     * add column(s) to a table
     *
     * @author Robert Gasch
     * @param  tablename The tablename key for the PNTables structure
     * @param  fields    fields to add to the table
     * return  bool
     */
    function addColumn($tablename, $fields)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($fields)) {
            return pn_exit(__f('%s: must specify fields to add', __CLASS__.'::'.__FUNCTION__));
        }

        if (!is_array($fields)) {
            return pn_exit(__f('%s: fields must be an array (actually an array of field arrays)', __CLASS__.'::'.__FUNCTION__));
        }

        if (!is_array($fields[0])) {
            return pn_exit(__f('%s: fields must be an array of field arrays', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $sqlarray = $dict->AddColumnSQL($table, $fields);
        $result = $dict->ExecuteSQLArray($sqlarray);
        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Column deletion failed. (%1$s, %2$s, %3$s)', array($tablename, $fields, $dberrmsg)));
        }
        return $success;
    }

    /**
     * drop column(s) from a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  fields    fields to drop from the table
     * return  bool
     */
    function dropColumn($tablename, $fields)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($fields)) {
            return pn_exit(__f('%s: must specify the fields to drop', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $dict = NewDataDictionary($dbconn);
        $table = $pntables[$tablename];
        $sqlarray = $dict->DropColumnSQL($table, $fields);
        $result = $dict->ExecuteSQLArray($sqlarray);

        $success = ($result == 2);
        if (!$success) {
            $dberrmsg = $dbconn->ErrorNo() . ' - ' . $dbconn->ErrorMSg();
            LogUtil::registerError(__f('Error! Column deletion failed. (%1$s, %2$s, %3$s)', array($tablename, $fields, $dberrmsg)));
        }

        return $success;
    }

    /**
     * get a list of databases available on the server
     *
     * @author Mark West
     * return  array of databases
     */
    function metaDatabases()
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->MetaDatabases();
    }

    /**
     * get a list of tables in the currently connected database
     *
     * @author Mark West
     * @param  ttype type of 'tables' to get
     * @param  showSchema add the schema name to the table
     * @param  mask mask to apply to return result set
     * return  array of tables
     */
    function metaTables($ttype = false, $showSchema = false, $mask = false)
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->MetaTables($ttype, $showSchema, $mask);
    }

    /**
     * get a list of columns in a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  notcasesensitive normalize case of table name
     * return  array of column objects
     */
    function metaColumns($tablename, $assoc = false, $notcasesensitive = true)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        if ($assoc) {
            global $ADODB_FETCH_MODE;
            $save = $ADODB_FETCH_MODE;
            $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $metaCols = $dbconn->MetaColumns($pntables[$tablename], $notcasesensitive);

        if ($assoc) {
            $ADODB_FETCH_MODE = $save;
        }

        return $metaCols;
    }

    /**
     * get a the ADODB meta-type for a table column
     *
     * @author Robert Gasch
     * @param  tablename The tablename key for the PNTables structure
     * @param  column the column we want to fetch the type for
     * @param  showAutoIncrement whether or not to display auto-increment information (optional) (default=false)
     * @param  showDefault whether or not to display default-value information (optional) (default=false)
     * return  The meta-column type (default='N', false for a non-existing column)
     */
    function metaColumnType($tablename, $column, $showAutoIncrement = false, $showDefault = false)
    {
        if (empty($column)) {
            return pn_exit(__f('%s: must specify a column name', __CLASS__.'::'.__FUNCTION__));
        }

        $pntables = pnDBGetTables();
        $pncols = $pntables["{$tablename}_column"];

        if (!isset($pncols[$column])) {
            return false;
        }

        $pncol = strtoupper($pncols[$column]);

        static $dCache = null;
        static $mCache = array();
        if (isset($mCache[$tablename]) && $dCache) {
            $metaType = $dCache->MetaType($mCache[$tablename][$pncol]->type);
            // quick hack to append auto-increment info to column type
            if ($showAutoIncrement && isset($mCache[$tablename][$pncol]->auto_increment) && $mCache[$tablename][$pncol]->auto_increment) {
                $metaType .= ' AUTO';
            }
            // quick hack to append default value info to column type
            if ($showDefault && isset($mCache[$tablename][$pncol]->has_default) && $mCache[$tablename][$pncol]->has_default) {
                $defaultValue = $mCache[$tablename][$pncol]->default_value;
                $metaType .= " DEFAULT $defaultValue";
            }
            return $metaType;
        }

        // the following code may be expensive for frequent calls so we cache it
        $dbconn = DBConnectionStack::getConnection();
        $dict = NewDataDictionary($dbconn);

        if (!$dict) {
            return pn_exit(__('Error! Unable to instantiate data dictionary.'));
        }

        $metaCols = DBUtil::metaColumns($tablename, true);
        $metaType = $dict->MetaType($metaCols[$pncol]->type);

        // quick hack to append auto-increment info to column type
        if ($showAutoIncrement && isset($metaCols[$pncol]->auto_increment) && $metaCols[$pncol]->auto_increment) {
            $metaType .= ' AUTO';
        }
        // quick hack to append default value info to column type
        if ($showDefault && isset($metaCols[$pncol]->has_default) && $metaCols[$pncol]->has_default) {
            $defaultValue = $metaCols[$pncol]->default_value;
            $metaType .= " DEFAULT $defaultValue";
        }

        $dCache = $dict;
        $mCache[$tablename] = $metaCols;

        return $metaType;
    }

    /**
     * get a list of column names in a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  numericIndex use numeric keys
     * return  array of column names
     */
    function metaColumnNames($tablename, $numericIndex = false)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        return $dbconn->MetaColumnNames($pntables[$tablename], $numericIndex);
    }

    /**
     * get a list of primary keys for a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  owner
     * @todo   work out what owner param actually does
     * return  array of column names
     */
    function metaPrimaryKeys($tablename, $owner = false)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        return $dbconn->MetaPrimaryKeys($pntables[$tablename], $owner);
    }

    /**
     * get a list of foreign keys for a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  owner
     * @param  upper upper case key names
     * @todo   work out what owner param actually does
     * return  array of column names
     */
    function metaForeignKeys($tablename, $owner = false, $upper = false)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        return $dbconn->MetaForeignKeys($pntables[$tablename], $owner, $upper);
    }

    /**
     * get a list of indexes for a table
     *
     * @author Mark West
     * @param table table name
     * @param primary show only primary keys
     * @param owner
     * @todo work out what owner param actually does
     * return array of column names
     */
    function metaIndexes($tablename, $primary = false, $owner = false)
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        return $dbconn->MetaIndexes($pntables[$tablename], $primary, $owner);
    }

    /**
     * return server information
     *
     * @author Mark West
     * return array of server info
     */
    function serverInfo()
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->ServerInfo();
    }

    /**
     * create database
     *
     * @author Drak
     * @param  dbname the database name
     * @param  optionsarray the options array
     * @return bool
     */
    function createDatabase($dbname, $optionsarray = false)
    {
        if (empty($dbname)) {
            return pn_exit(__f('%s: must specify a database name', 'DBUtil::createDatabase'));
        }

        $dbconn = DBConnectionStack::getConnection();
        $dict = NewDataDictionary($dbconn);
        $sql = $dict->CreateDatabase($dbname, $optionsarray);
        return $dict->ExecuteSQLArray($sql);
    }

    /**
     * limit the table name if necessary and prepend the prefix
     *
     * When using Oracle the object name may not be longer than 30 chars. Now ADODB uses TRIGGERS and SEQUENCEs to emulate the AUTOINCREMENT
     * which eats up to 9 chars (TRIG_SEQ_<prefix>_<tablename>) so we have to limit the length of the table name to
     * 30 - 9 - length(prefix) - separator.
     * We use this function as a central point to shorten table name (there might be restrictions in ' other RDBMS too). If the resulting tablename is
     * empty we will show an error. In this case the prefix is too long.
     *
     * @author landseer
     * @param  $tablename the tablename as send from pntables.php
     * @param  $dbdriver  (optional) the driver used for this DB
     * @return bool
     */
    function getLimitedTablename($tablename, $dbdriver = '')
    {
        if (empty($tablename)) {
            return pn_exit(__f('%s: must specify a table name', __CLASS__.'::'.__FUNCTION__));
        }

        if (empty($dbdriver)) {
            $dbdriver = DBConnectionStack::getConnectionDBDriver();
        }

        $prefix = pnDBGetTablePrefix($tablename);
        switch ($dbdriver)
        {
            case 'oci8': // Oracle
            case 'oracle': // Oracle
                $maxlen = 30; // max length for a tablename
                $_tablename = $tablename; // save for later if we need to show an error
                $lenTable = strlen($tablename);
                $lenPrefix = strlen($prefix);
                if ($lenTable + $lenPrefix + 10 > $maxlen) { // 10 for length of TRIG_SEQ_ + _
                    $tablename = substr($tablename, 0, $maxlen - 10 - $lenPrefix); // same as 20-strlen(), but easier to understand :-)
                }
                if (empty($tablename)) {
                    return pn_exit(__f('%1$s: unable to limit tablename [%2$s] because database prefix is too long for Oracle, please shorten it (recommended length is 4 chars)', array(__CLASS__.'::'.__FUNCTION__, DataUtil::formatForDisplay($_tablename))));
                }
                break;

            default: // no action necessary, use tablename as is
                break;
        }

        // finally build the tablename
        $tablename = $prefix . '_' . $tablename;
        return $tablename;
    }

    /**
     * Handle any CLOB fields which were contained in an insert or update
     * query. This method loops through the clob fields and updates them
     * one at a time.
     *
     * @author rgasch
     * @param  clobArray the array of CLOB column entries
     * @param  tablename the tablename the object is based on
     * @param  idcolumn the idcolumn for the object/table combination
     * @return the object with it's relevant sub-objects set
     */
    function _handleClobFields($tablename, $object, $clobArray, $idcolumn)
    {
        $ret = true;
        $dbType = DBConnectionStack::getConnectionDBType();
        if (!$clobArray || ($dbType != 'oci8' && $dbType != 'oracle')) {
            return $ret;
        }

        $dbconn = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $table = $pntables[$tablename];
        $columns = $pntables["{$tablename}_column"];

        // process CLOB values
        $dbconn = DBConnectionStack::getConnection();
        $colType = DBUtil::metaColumnType($tablename, $idcolumn);
        foreach ($clobArray as $k => $v) {
            if ($colType == 'N' || strpos($colType, 'I') === 0) {
                $kval = $object[$idcolumn];
                $flt = (is_numeric($kval) && (intval($kval) != floatval($kval)));
                $id = ($flt ? (float) $kval : (int) $kval);
                $where = "$columns[$idcolumn]='" . DataUtil::formatForStore($id) . "'";
            } else {
                $where = "$columns[$idcolumn]='" . DataUtil::formatForStore($object[$idcolumn]) . "'";
            }
            $res = $dbconn->UpdateClob($table, $k, $v, $where);
            if (!$res) {
                $ret = $res;
                break;
            }
        }

        return $ret;
    }

    /**
     * This method creates the necessary sql information for retrieving
     * fields from joined tables defined by a joinInfo array described
     * at the top of this class.
     *
     * @author rgasch
     * @param  tablename    the tablename key for the PNTables structure
     * @param  joinInfo     the array containing the extended join information
     * @param  columnArray  the columns to marshall into the resulting object (optional) (default=null)
     * @return array ($sqlJoin, $sqlJoinFieldList, $ca)
     */
    function _processJoinArray($tablename, $joinInfo, $columnArray = null)
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];

        $allowedJoinMethods = array('LEFT JOIN', 'RIGHT JOIN', 'INNER JOIN');

        $ca = DBUtil::getColumnsArray($tablename, $columnArray);
        $alias = 'a';
        $sqlJoin = '';
        $sqlJoinFieldList = '';
        foreach (array_keys((array)$joinInfo) as $k)
        {
            $jt = $joinInfo[$k]['join_table'];
            $jf = $joinInfo[$k]['join_field'];
            $ofn = $joinInfo[$k]['object_field_name'];
            $cft = $joinInfo[$k]['compare_field_table'];
            $cfj = $joinInfo[$k]['compare_field_join'];

            $joinMethod = 'LEFT JOIN';
            if (isset($joinInfo[$k]['join_method']) && in_array(strtoupper($joinInfo[$k]['join_method']), $allowedJoinMethods)) {
                $joinMethod = $joinInfo[$k]['join_method'];
            }

            $jtab = $pntables[$jt];
            $jcol = $pntables["{$jt}_column"];

            if (!is_array($jf)) {
                $jf = array($jf);
            }

            if (!is_array($ofn)) {
                $ofn = array($ofn);
            }

            // loop over all fields to select from the joined table
            foreach ($jf as $k => $v) {
                $currentColumn = $jcol[$v];
                // attempt to remove encoded table name in column list used by some tables
                $t = strstr($currentColumn, '.');
                if ($t !== false) {
                    $currentColumn = substr($t, 1);
                }

                $line = ", $alias.$currentColumn AS \"$ofn[$k]\" ";
                $sqlJoinFieldList .= $line;

                $ca[] = $ofn[$k];
            }

            $compareColumn = $jcol[$cfj];
            // attempt to remove encoded table name in column list used by some tables
            $t = strstr($compareColumn, '.');
            if ($t !== false) {
                $compareColumn = substr($t, 1);
            }

            $t = isset($columns[$cft]) ? "tbl.$columns[$cft]" : $cft; // if not a column reference assume litereal column name
            $line = ' ' . $joinMethod . " $jtab $alias ON $alias.$compareColumn = $t ";

            $sqlJoin .= $line;
            ++$alias;
        }

        return array($sqlJoin, $sqlJoinFieldList, $ca);
    }

    /**
     * Post-processing after this object has been selected. This routine
     * is responsible for reading the 'extra' data (attributes, categories,
     * and meta data) from the database and inserting the relevant
     * sub-objects into the object.
     *
     * @author rgasch
     * @param  objects the object-array or the object we just selected
     * @param  tablename the tablename the object is based on
     * @param  idcolumn the idcolumn for the object/table combination
     * @return the object with it's relevant sub-objects set
     */
    function _selectPostProcess($objects, $tablename, $idcolumn)
    {
        // nothing to do if objects is empty
        if (is_array($objects) && count($objects) == 0) {
            return $objects;
        }

        $pntables = pnDBGetTables();

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_categorization"]) && $pntables["{$tablename}_db_extra_enable_categorization"])) && pnConfigGetVar('PN_CONFIG_USE_OBJECT_CATEGORIZATION') && strcmp($tablename, 'categories_') !== 0 && strcmp($tablename, 'objectdata_attributes') !== 0 && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('Categories')) {
            if (is_array($objects)) {
                $ak = array_keys($objects);
                if ($ak && is_array($objects[$ak[0]])) {
                    ObjectUtil::expandObjectArrayWithCategories($objects, $tablename, $idcolumn);
                } else {
                    ObjectUtil::expandObjectWithCategories($objects, $tablename, $idcolumn);
                }
            }
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_attribution"]) && $pntables["{$tablename}_db_extra_enable_attribution"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION')) && strcmp($tablename, 'objectdata_attributes') !== 0 && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('ObjectData')) {
            if (is_array($objects)) {
                $ak = array_keys($objects);
                if ($ak && is_array($objects[$ak[0]])) {
                    foreach ($ak as $k) {
                        ObjectUtil::expandObjectWithAttributes($objects[$k], $tablename, $idcolumn);
                    }
                } else {
                    ObjectUtil::expandObjectWithAttributes($objects, $tablename, $idcolumn);
                }
            }
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_meta"]) && $pntables["{$tablename}_db_extra_enable_meta"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_META')) && strcmp($tablename, 'objectdata_attributes') !== 0 && strcmp($tablename, 'objectdata_meta') !== 0 && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('ObjectData')) {
            if (is_array($objects)) {
                $ak = array_keys($objects);
                if ($ak && is_array($objects[$ak[0]])) {
                    foreach ($ak as $k) {
                        ObjectUtil::expandObjectWithMeta($objects[$k], $tablename, $idcolumn);
                    }
                } else {
                    ObjectUtil::expandObjectWithMeta($objects, $tablename, $idcolumn);
                }
            }
        }

        return $objects;
    }

    /**
     * Post-processing after this object has beens saved. This routine
     * is responsible for writing the 'extra' data (attributes, categories,
     * and meta data) to the database and the optionally creating an
     * entry in the object-log table
     *
     * @author rgasch
     * @param  object the object wehave just saved
     * @param  tablename the tablename the object is based on
     * @param  idcolumn the idcolumn for the object/table combination
     * @param  update whether or not this was an update (default=false, signifies operation was an insert).
     * @return the object
     */
    function _savePostProcess($object, $tablename, $idcolumn, $update = false)
    {
        $pntables = pnDBGetTables();

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_categorization"]) && $pntables["{$tablename}_db_extra_enable_categorization"])) && pnConfigGetVar('PN_CONFIG_USE_OBJECT_CATEGORIZATION') && strcmp($tablename, 'categories_') !== 0 && strcmp($tablename, 'objectdata_attributes') !== 0 && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('Categories')) {
            ObjectUtil::storeObjectCategories($object, $tablename, $idcolumn, $update);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_attribution"]) && $pntables["{$tablename}_db_extra_enable_attribution"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION')) && strcmp($tablename, 'objectdata_attributes') !== 0 && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('ObjectData')) {
            ObjectUtil::storeObjectAttributes($object, $tablename, $idcolumn, $update);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_meta"]) && $pntables["{$tablename}_db_extra_enable_meta"]) || pnConfigGetVar('PN_CONFIG_USE_OBJECT_META')) && $tablename != 'objectdata_attributes' && $tablename != 'objectdata_meta' && $tablename != 'objectdata_log' && pnModAvailable('ObjectData')) {
            ObjectUtil::updateObjectMetaData($object, $tablename, $idcolumn);
        }

        if (((isset($pntables["{$tablename}_db_extra_enable_all"]) && $pntables["{$tablename}_db_extra_enable_all"]) || (isset($pntables["{$tablename}_db_extra_enable_logging"]) && $pntables["{$tablename}_db_extra_enable_logging"])) && pnConfigGetVar('PN_CONFIG_USE_OBJECT_LOGGING') && strcmp($tablename, 'objectdata_log') !== 0 && pnModAvailable('ObjectData')) {
            if (pnModDBInfoLoad('ObjectData')) {
                $oldObj = DBUtil::selectObjectByID($tablename, $object[$idcolumn], $idcolumn);

                $log = array();
                $log['object_type'] = $tablename;
                $log['object_id'] = $object[$idcolumn];
                $log['op'] = ($update ? 'U' : 'I');

                if ($update) {
                    $log['diff'] = serialize(ObjectUtil::diffExtended($oldObj, $object, $idcolumn));
                } else {
                    $log['diff'] = serialize($object);
                }

                DBUtil::insertObject($log, 'objectdata_log');
            }
        }

        return $object;
    }

    /**
     * Select & return an object array based on a table definition using the given SQL statement
     *
     * @param sql              The sql statement to execute for the selection
     * @param tablename        The tablename key for the tables structure
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     * @param limitOffset      The lower limit bound (optional) (default=-1)
     * @param limitNumRows     The upper limit bound (optional) (default=-1)
     * @author UNDERMEDIA S.A. - Jos� Guevara
     *
     * @return The resulting object array
     */
    function selectObjectArraySQL($sql, $tablename, $columnArray = null, $permissionFilter = null, $limitOffSet = -1, $limitNumRows = -1)
    {
        $res = DBUtil::executeSQL($sql, $limitOffSet, $limitNumRows);
        if ($res === false) {
            return $res;
        }

        $ca = DBUtil::getColumnsArray($tablename, $columnArray);
        $objArr = DBUtil::marshallObjects($res, $ca, true, '', true, $permissionFilter);

        return $objArr;
    }
}
