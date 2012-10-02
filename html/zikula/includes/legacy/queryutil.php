<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: queryutil.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Core
 * @subpackage Zikula_legacy
 */

/**
 * This method escapes strings appropriately for the 'dbtype'
 * database currently in use.  No "unescaping" is necessary when you
 * pull it out since the result strings are un-escaped anyway.
 *
 * Takes a string arg and returns a string argument escaped for the
 * appropriate database or processed through the addslashes method
 * if no database-specific method found.
 */
function dbescape ($textstring)
{
    // just in case it's been slashed
    $textstring = stripslashes ($textstring);

    return pnVarPrepForStore($textstring);
}

/**
 * getAllColumns
 *
 * returns a string containing the fully qualified column names for a
 * select, insert, or update statement.  The order is not guaranteed,
 * however.  The safest use for this is where you would use a "SELECT *"
 * query.  Separating whitespace is automatically added for safety.
 *
 * for example: if the table 'example' has columns 'id', and 'name'
 * a call of:
 *
 * $sel = getAllColumns('example');
 *
 * would resulting in $sel having the value:
 *
 * " example.id as \"id\", example.name AS \"name\" "
 *
 * see: getAllColumnsFrom for inclusion of the tablename
 *      getSelectAllColumnsFrom for inclusion of select and tablename
 *      getColumnsViaHashKeys for grabbing a specific set of columns
 *      buildSimpleQuery for building a query on one table in a single call
 *      buildQuery for building a join query in a single call
 */
function getAllColumns($tablename)
{
	// get the table information
	$pntable = pnDBGetTables();
    return getColumnsViaHashKeys($tablename, $pntable["{$tablename}_column"]);
}

/**
 * getSelectAllColumns
 *
 * prepends "SELECT" to the value returned from getAllColumns
 */
function getSelectAllColumns($tablename)
{
    // use the other method and append a FROM clause
    $query = "SELECT" . getAllColumns($tablename);

    return $query;
}

/**
 * getAllColumnsFrom
 *
 * adds "FROM $pntable[$tablename] " to the value returned from
 * getAllColumns
 *
 * also adds an optional WHERE class to be automatically added
 */
function getAllColumnsFrom($tablename, $whereclause = '')
{
	// get the table information
	$pntable = pnDBGetTables();

    // use the other method and append a FROM clause
    $query = getAllColumns($tablename) . "FROM $pntable[$tablename] ";
    if ($whereclause) {
        $query .= "WHERE $whereclause";
    }

    return $query;
}

/**
 * getSelectAllColumnsFrom
 *
 * prepends "SELECT" to the value returned from getAllColumnsFrom
 *
 * also adds an optional WHERE class to be automatically added
 */
function getSelectAllColumnsFrom($tablename, $whereclause = '')
{
    // use the other method and append a FROM clause
    $query = "SELECT" . getAllColumnsFrom($tablename, $whereclause);

    return $query;
}

/**
 * buildSimpleQuery
 *
 * This is a simplified version of buildQuery for use on one table.  The
 * arguments are specified as strings in most cases instead of arrays.
 *
 * Example:  The following db abstract code -
 *
 * $column = $pntable['authors_column'];
 * $result = $dbconn->query ("SELECT $column[aid], $column[name]
 *                               FROM $pntable['authors']
 *                               WHERE $column[radminarticle]=1
 *                               ORDER BY $column[aid]
 *                               LIMIT 1");
 *
 * Could be re-written as:
 *
 * $column = $pntable['authors_column'];
 * $myquery = buildSimpleQuery ('authors', array ('aid', 'name'), "$column[radminarticle]=1", "$column[aid]", 1);
 * $result = $dbconn->query($myquery);
 *
 * (you could, of course, skip storing the string in $myquery...but for
 *   illustration I included it)
 *
 * The nice thing about using this is that it takes care of db-specific
 * ways of handling the "LIMIT" clause because it uses buildQuery internally.
 *
 * ARGUMENTS:
 *   Strings: $tablename  = $pntable mapping name
 *            $where      = WHERE clause conditions ('WHERE' added automatically)
 *            $orderby    = ORDERBY sort order ('ORDER BY' added automatically)
 *
 *   int:     $limitmax   = The maximum number of rows to return
 *            $limitmin   = the offset in the result set to start at
 *
 *   array:   $columnames = array of $pntable mapping names to return from the query
 */
function buildSimpleQuery($tablename, $columnnames, $where = '', $orderby = '', $limitmax = '', $limitmin = '')
{
	// get the database connection
	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();

    if ($orderby) {
        $orderby = array($orderby);
    }
    // pull out fully qualified columnnames
    $column = $pntable["{$tablename}_column"];
    foreach ($columnnames as $idx => $name) {
        $columnnames[$idx] = "$column[$name] AS \"$name\"";
    }
    return buildQuery (array($tablename), $columnnames, $where, $orderby, $limitmax, $limitmin);
}

/**
 * buildSimpleQuery
 *
 * This can build a fairly complex query in a cross-database fashion.
 * It takes arrays for most of the fields and converts it into a
 * fully-qualified SQL query for the database held in $pnconfig['dbtype']
 *
 * Example:  The following db abstract code -
 *
 * $authorscolumn = $pntable['authors_column'];
 * $storiescolumn = $pntable['stories_column'];
 * $result = $dbconn->query ("SELECT $authorscolumn[aid],
 *                                    $authorscolumn[name],
 *                                    $storiescolumn[title]
 *                               FROM $pntable['authors'], $pntable['stories']
 *                               WHERE $authorscolumn[aid]=$storiescolumn[aid]
 *                                 AND $authorscolumn[aid]='$aid'
 *                               ORDER BY $storiescolumn[time] DESC
 *                               LIMIT 2, 4");
 *
 * Could be re-written as:
 *
 * $authorscolumn = $pntable['authors_column'];
 * $storiescolumn = $pntable['stories_column'];
 * $myquery = buildQuery (array ('authors', 'stories',
 *                         array ($authorscolumn[aid], $authorscolumn[name], $storiescolumn[title]),
 *                         "$authorscolumn[aid]=$storiescolumn[aid] AND $authorscolumn[aid]='$aid'",
 *                         "$storiescolumn[time] DESC",
 *                         4, 2);
 * $result = $dbconn->query($myquery);
 *
 * (you could, of course, skip storing the string in $myquery...but for
 *   illustration I included it)
 *
 * The nice thing about using this is that it takes care of db-specific
 * ways of handling the "LIMIT" clause because it uses buildQuery internally.
 *
 * ARGUMENTS:
 *   array:   $tablenames = array of $pntable mapping names
 *            $columnames = array of fully qualified column names (table.column)
 *            $orderby    = ORDERBY sort order ('ORDER BY' added automatically)
 *                          sort order is based on indeces:
 *                            ORDER BY $orderby[0], $orderby[1]...
 *
 *   string:  $where      = WHERE clause conditions ('WHERE' added automatically)
 *
 *   int:     $limitmax   = The maximum number of rows to return
 *            $limitmin   = the offset in the result set to start at
 */
function buildQuery($tablenames, $columnnames, $where = '', $orderby = '', $limitmax = '', $limitmin = '')
{
	// get the database connection
	$dbconn = pnDBGetConn(true);
	$pntable = pnDBGetTables();

    $tables = "";
    for ($i = 0; $i < sizeof($tablenames); $i ++) {
        if ($i > 0) {
            $tables .= ",";
        }
        $tables .= " {$pntable[$tablenames[$i]]}";
    }

    $columns = "";
    for ($i = 0; $i < sizeof($columnnames); $i ++) {
        if ($i > 0) {
            $columns .= ",";
        }
        $columns .= " {$columnnames[$i]}";
    }

    $orders = "";
    if ($orderby) {
        for ($i = 0; $i < sizeof($orderby); $i ++) {
            if ($i > 0) {
                $orders .= ",";
            }
            $orders .= " {$orderby[$i]}";
        }
    }
    if (strcmp(pnConfigGetVar('dbtype'), 'oci8') == 0) {
        $query = "SELECT $columns FROM $tables ";
        if (($where) and ($limitmax)) {
            if ($limitmin) {
                $query .= " WHERE $where AND (rownum >= $limitmin AND rownum <= $limitmax)";
            } else {
                $query .= " WHERE $where AND rownum <= $limitmax";
            }
        } elseif ($where) {
            $query .= " WHERE $where ";
        } elseif ($limitmax) {
            if ($limitmin) {
                $query .= " WHERE rownum >= $limitmin AND rownum <= $limitmax";
            } else {
                $query .= " WHERE rownum <= $limitmax";
            }
        }
        if ($orders) {
            $query .= " ORDER BY $orders ";
        }
    } else { // Assume MySQL standard
        $query = "SELECT $columns FROM $tables ";
        if ($where) {
            $query .= " WHERE $where ";
        }
        if ($orders) {
            $query .= " ORDER BY $orders ";
        }
        if ($limitmax) {
            if ($limitmin) {
                $query .= " LIMIT $limitmin,$limitmax";
            } else {
                $query .= " LIMIT $limitmax";
            }
        }
    }

    return $query;
}

/**
 * Gets a list of column names, properly quoted for associative array use
 * later on based on the keys in the column_key_hash variable.  For
 * example, if:
 *
 * $tablename = 'downloads_newdownload'
 * $column_key_hash = array ('lid' => '');
 *
 * then
 *
 * this will return (assuming the orig, default column name mappings):
 *
 *
 * "{$prefix}_downloads_newdownload.lid as \"lid\""
 *
 * This ensures that associative array mappings will be correct since even
 * case-insensitive databases such as oracle respect your "AS" naming if
 * it is enclosed in literal quotes.
 *
 * fifers: should probably base this on an indexed array instead...
 */
function getColumnsViaHashKeys($tablename, $column_key_hash)
{
	// get the table information
	$pntable = pnDBGetTables();

    // init our vars
    $query = '';
    // grab each key and value and append the values
    $column = $pntable["{$tablename}_column"];
    foreach ($column_key_hash as $key => $val) {
        $query .= " $column[$key] AS \"$key\",";
    }
    // remove the last ',' from our built result...if there is any
    // length - 1 is the last pos in our string, the ','
    if (($length = strlen($query)) > 0) {
        $query = substr($query, 0, $length - 1);
        // add our trailing space
        $query = "$query ";
    }

    return $query;
}

/**
 * Returns a statement of the form:
 *
 * tablename.hashval1 as \"hashkey1\", ...
 *
 * based on the KEYS in the $column_key_hash variable.  useful to build a
 * query that only needs a couple of columns returned.
 *
 * fifers: should probably base this on an indexed array instead...
 */
function getColumnsViaHashKeysFrom($tablename, $column_key_hash, $whereclause = '')
{
	// get the table information
	$pntable = pnDBGetTables();

    $query = getColumnsViaHashKeys ($tablename, $column_key_hash) . "FROM $pntable[$tablename] ";
    if (!empty($whereclause)) {
        $query .= "WHERE $whereclause";
    }

    return $query;
}

/**
 * This adds the SELECT to the front of the getColumnsViaHashKeysFrom
 * method's returned value.
 */
function getSelectViaHashKeysFrom($tablename, $column_key_hash, $whereclause = '')
{
	// get the table information
	$pntable = pnDBGetTables();

    $query = "SELECT " . getColumnsViaHashKeysFrom($tablename, $column_key_hash, $whereclause);

    return $query;
}

/**
 * This method is simply for naming convenience.  It could be eliminated
 * since it merely calls getSelectViaHashKeysFrom and returns what it
 * returns.  If you follow the naming conventions I used in this file,
 * however, it must exist for consistency!
 */
function getSelectColumnsViaHashKeysFrom($tablename, $column_key_hash, $whereclause = '')
{
    return (getSelectViaHashKeysFrom($tablename, $column_key_hash, $whereclause));
}
