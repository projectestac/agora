<?php // $Id: check_db_syntax.php,v 1.17 2011/04/20 20:12:55 stronk7 Exp $

///////////////////////////////////////////////////////////////////////////
//                                                                       //
// NOTICE OF COPYRIGHT                                                   //
//                                                                       //
// Moodle - Modular Object-Oriented Dynamic Learning Environment         //
//          http://moodle.org                                            //
//                                                                       //
// Copyright (C) 1999 onwards  Martin Dougiamas  http://moodle.com       //
//                                                                       //
// This program is free software; you can redistribute it and/or modify  //
// it under the terms of the GNU General Public License as published by  //
// the Free Software Foundation; either version 2 of the License, or     //
// (at your option) any later version.                                   //
//                                                                       //
// This program is distributed in the hope that it will be useful,       //
// but WITHOUT ANY WARRANTY; without even the implied warranty of        //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         //
// GNU General Public License for more details:                          //
//                                                                       //
//          http://www.gnu.org/copyleft/gpl.html                         //
//                                                                       //
///////////////////////////////////////////////////////////////////////////

if (isset($_SERVER['REMOTE_ADDR'])) {
    define('LINEFEED', "<br />");
} else {
    define('LINEFEED', "\n");
}

/// Getting current dir
    $dir = dirname(__FILE__);

/// Check if the dir seems to be moodle root (with some random shots)
    $is_moodle_root = false;
    if (file_exists($dir . '/lang/en') && file_exists($dir . '/lib/db') && file_exists($dir . '/install/lang/en')) {
        $is_moodle_root = true;
    }

/// List of patterns to search

    $dml = array (
        '(begin|commit|rollback)_sql',
        'count_records(_select|_sql)?',
        'delete_records(_select)?',
        'get_field(set)?(_select|sql)?',
        'get_record(s|set)?(_list|_menu|_select|_sql)?(_menu)?',
        'insert_record',
        'record_exists(_select|_sql)?',
        'records_to_menu',
        'recordset_to_(array|menu)',
        'rs_(EOF|close|fetch_next_record|fetch_record|next_record)',
        'set_field(_select)?',
        'update_record',
    );

    $helper = array (
        'db_(lowercase|uppercase)',
        'sql_(as|bitand|bitnot|bitor|bitxor|cast_char2int|ceil|compare_text|concat|concat_join|empty|fullname|ilike|isempty|isnotempty|length|max|null_from_clause|order_by_text|paging_limit|position|substr)'
    );

    $ddl = array (
        'add_(field|index|key)',
        'change_field_(default|enum|notnull|precision|type|unsigned)',
        'create_(table|temp_table)',
        'drop_(field|index|key|table)',
        'find_(check_constraint_name|index_name|key_name|sequence_name)',
        'rename_(field|index|key|table)',
        '(check_constraint|field|index|table)_exists'
    );

    $coreonly = array (
        'delete_tables_from_xmldb_file',
        'drop_plugin_tables',
        'get_db_directories',
        'get_used_table_names',
        'install_from_xmldb_file',
    );

    $enum = array (
        'ENUM(VALUES)?=".*?" ',
        '>getEnum\(',
        'new xmldb_field\((((\'[^\']*?\')|[^\',]+?|array\(.*)[,\)]\s?){9,20}',
        '>add_field\((((\'[^\']*?\')|[^\',]+?|array\(.*)[,\)]\s?){9,20}',
        '>set_attributes\((((\'[^\']*?\')|[^\',]+?|array\(.*)[,\)]\s?){8,20}',
        'change_field_enum'
    );

    $internal = array (
        'change_db_encoding',
        'configure_dbconnection',
        'db_(detect_lobs|update_lobs)',
        'execute_sql(_arr)?',
        'onespace2empty',
        'oracle_dirty_hack',
        'rcache_(get|getforfill|releaseforfill|set|unset|unset_table)',
        'where_clause'
    );

    $unsupported = array (
        'column_type',
        'table_column',
        'modify_database',
        '(Execute|Connect|PConnect|ErrorMsg)',
        '(MetaTables|MetaColumns|MetaColumnNames|MetaPrimaryKeys|MetaIndexes)'
    );

    $other = array (
        '\$db[,; -]',
        "[^\$_'\"\.-]dbfamily",
        "[^\$_'\"\.-]dblibrary",
        "[^\$_'\"\.-]dbtype[^s]",
        'sql_substr\(\)',
        '\$CFG->prefix',
        'NEWNAMEGOESHERE',
        'new\s(XMLDBTable|XMLDBField|XMLDBIndex|XMLDBKey)',
        '>(addFieldInfo|addIndexInfo|addKeyInfo|setAttributes)',
        '>(begin|commit|rollback)_sql',
        '(if|while|for|return).*>get_recordset(_list|_select|_sql)?',
        'SELECT DISTINCT.*\.\*',
        "get_in_or_equal\(.*SQL_PARAMS_NAMED\s*,\s*'.*\d'"
    );

/// List of reserved words
/// 1. default (common) ones
    $reservedlist = array(
        'user', 'group', 'order', 'select', 'from', 'where',
        'role', 'null', 'start', 'end', 'date', 'match',
        'mod', 'new', 'old');
/// 2. from sql_generators if possible
    if ($is_moodle_root) {
        define('MOODLE_INTERNAL', true); // cheat, so sql_generator think we are one standard moodle script
        global $CFG;                     // cheat, again, to define some stuff needed by generators
        $CFG = new stdclass();
        $CFG->libdir = dirname(__FILE__) . '/lib';
        require_once($CFG->libdir . '/ddl/sql_generator.php');
        $reservedlist = array_keys(sql_generator::getAllReservedWords());
    }

    foreach ($reservedlist as $key => $word) {
        $reservedlist[$key] = '(?: AS\s+|:)' . trim($word);
    }

/// Define some known false positives to take them out from errors report (nested array of => file => regular expressions considered false positives)
    $fp = array (
          'install.php' => array(
                  'empty\(\$distro-\>dbtype\)',                     /// Allow $distro->dbtype stuff to work in install
                  '= trim\(\$_POST\[\'dbtype\'\]',                  /// Allow $config->dbtype stuff to work in install
                  'get_driver_instance\(\$config-|>dbtype'          /// Allow $config->dbtype stuff to work in install
              ),
          'admin/blocks.php' => array(
                  'drop_plugin_tables.*\/blocks'                    /// Tables can be dropped from blocks admin interface
              ),
          'admin/health.php' => array(
                  '\. \$CFG-\>prefix \.'                            /// health script is allowed to use $CFG->prefix when building suggested SQLs to be shown
              ),
          'admin/modules.php' => array(
                  'drop_plugin_tables.*\/mod'                       /// Tables can be dropped from modules admin interface
              ),
          'admin/qtypes.php' => array(
                  'drop_plugin_tables.*\$QTYPES\[\$delete\]-\>'     /// Tables can be dropped from qtype admin interface
              ),
          'admin/xmldb/actions/check_bigints/check_bigints.class.php' => array( /// dbfamily uses in this script
                  'this->dbfamily'
              ),
          'auth/cas/CAS/CAS/client.php' => array(                   /// cas setAttributes method
                  'this->setAttributes'
              ),
          'backup/util/dbops/backup_structure_dbops.class.php' => array( /// 2-verified expressions returning recordsets
                  'element->get_source_.*convert_params_to_values'
              ),
          'backup/util/helper/restore_decode_content.class.php' => array( /// 1-verified expression returning recordset
                  'return.*get_recordset_sql'
              ),
          'blocks/html/backup/moodle2/restore_html_block_task.class.php' => array( /// 1-verified expression returning recordset
                  'return.*get_recordset_sql'
              ),
          'lib/adminlib.php' => array(                              /// adminlib valid code
                  'drop_plugin_tables\(\$pluginname',
                  'used_tables = get_used_table_names',
                  'dbdirs = get_db_directories'
              ),
          'lib/ddl/database_manager.php' => array(                  /// dbmanager
                  'dbdirs = get_db_directories'
              ),
          'lib/ddl/simpletest/testddl.php' => array(                /// ddl tests
                  'DB2 = moodle_database::get_driver_instance'
              ),
          'lib/dml/moodle_database.php' => array(                   /// moodle_database valid code
                  'cfg-\>dbtype    = \$this-\>get_dbtype',
                  'cfg-\>dblibrary = \$this-\>get_dblibrary',
                  'return \$this-\>get_recordset_select\(\$table, \$select, \$params',
                  'return \$this-\>get_recordset_sql\(\$sql, \$params, \$limitfrom'
              ),
          'lib/dml/simpletest/testdml.php' => array(                /// dml tests
                  'DB2 = moodle_database::get_driver_instance'
              ),
          'lib/form/recaptcha.php' => array(                        /// recaptcha form has own setAttributes method
                  'this->setAttributes'
              ),
          'mod/assignment/lib.php' => array(                        /// cas setAttributes method
                  'mform->setAttributes'
              ),
          'mod/scorm/datamodels/scorm_13.js.php' => array(          /// Various scorm 13 exceptions
                  'max.*delimiter.*(unique|duplicate).*(:true|:false)',
                  'cmi\.objectives\.n\..*defaultvalue.*:null'
              ),
          /// Some (properly closer by caller) returned rs in workshop module
          'mod/workshop/form/accumulative/lib.php' => array(
                  'return \$DB-\>get_recordset_sql\('
              ),
          'mod/workshop/form/comments/lib.php' => array(
                  'return \$DB-\>get_recordset_sql\('
              ),
          'mod/workshop/form/numerrors/lib.php' => array(
                  'return \$DB-\>get_recordset_sql\('
              ),
          'mod/workshop/form/rubric/lib.php' => array(
                  'return \$DB-\>get_recordset_sql\('
              ),
          /// various correct get_db_directories uses
          'admin/xmldb/actions/generate_all_documentation/generate_all_documentation.class.php' => array(
                  'dbdirs = get_db_directories'
              ),
          'admin/xmldb/actions/get_db_directories/get_db_directories.class.php' => array(
                  'db_directories = get_db_directories'
              )
          );

/// List of exceptions that aren't errors (function declarations, comments, adodb usage from adodb drivers and harcoded strings). Non reportable false positives
    $excludes = '/(function |^\s*\*|^\s*\/\/|\$this-\>adodb-\>(Execute|Connect|PConnect|ErrorMsg|MetaTables|MetaIndexes|MetaColumns|MetaColumnNames|MetaPrimaryKeys|)|protected \$[a-zA-Z]*db|Incorrect |check find_index_name|not available anymore|output|Replace it with the correct use of|where order of parameters is|_moodle_database|invaliddbtype|has been deprecated in Moodle 2\.0\. Will be out in Moodle 2\.1|Potential SQL injection detected|requires at least two parameters|hint_database = install_db_val|Current database \(|admin_setting_configselect|(if|while|for|return).*\>get_recordset(_list|_select|_sql)?.*\>valid\(\)|NEWNAMEGOESHERE.*XMLDB_LINEFEED|has_capability\(.*:view.*context)|die(.*result.*:null.*errstr)|CAST\(.+AS\s+(INT|FLOAT|DECIMAL|NUM|REAL)/';

/// Calculating megarules
    $dml_megarule        = calculate_megarule($dml,array('[ =@.]'), array('( )?\('), 'i');
    $helper_megarule     = calculate_megarule($helper,array('[ =@.]'), array('( )?\('), 'i');
    $ddl_megarule        = calculate_megarule($ddl,array('[ =@.]'), array('( )?\('), 'i');
    $coreonly_megarule   = calculate_megarule($coreonly,array('[ =@.]'), array('( )?\('), 'i');
    $enum_megarule       = calculate_megarule($enum);
    $internal_megarule   = calculate_megarule($internal,array('[ =@.]'), array('( )?\('), 'i');
    $unsupported_megarule= calculate_megarule($unsupported,array('[ \>=@,.]'), array('( )?\('));
    $other_megarule      = calculate_megarule($other);
    $reserved_megarule   = calculate_megarule($reservedlist, array("[ =('\"]"), array("[ ,)'\"]"), 'i');

/// All rules
    $all_megarules = array(
        'DML'=>$dml_megarule,
        'HELPER'=>$helper_megarule,
        'DDL'=>$ddl_megarule,
        'COREONLY'=>$coreonly_megarule,
        'ENUM'=>$enum_megarule,
        'INTERNAL'=>$internal_megarule,
        'UNSUPPORTED'=>$unsupported_megarule,
        'OTHER'=>$other_megarule,
        'RESERVED_WORD'=>$reserved_megarule
    );

/// To store errors found
    $errors = array();
    $counterrors = 0;

/// To store known false positives
    $falsepositives = array();
    $countfalsepositives = 0;

/// Process starts here

    echo "Checking the $dir directory recursively" . LINEFEED;

    if ($is_moodle_root) {
        echo "(detected Moodle root directory - false positive detection enabled)" . LINEFEED;
    } else {
        echo "(executed from custom directory - false positive detection DISABLED!)" . LINEFEED;
    }

    $files = files_to_check($dir);

    foreach ($files as $file) {
        echo "  - $file: ";

    /// Read the file, line by line, applying all the megarules
        $handle = @fopen($file, 'r');
        if ($handle) {
            $line = 0;
            while (!feof($handle)) {
                $buffer = fgets($handle, 65535); /// Long lines supported on purpose
                $line++;
            /// Search for megarules
                foreach ($all_megarules as $name=>$megarule) {
                    if (!empty($megarule) && preg_match($megarule, $buffer) && !preg_match($excludes, $buffer)) {
                    /// Let's see if that's a well known false positive (only if executed from Moodle root)
                        if ($is_moodle_root && is_known_false_positive($fp, $file, $buffer, $is_moodle_root)) {
                        /// Known false positive found, annotate it
                            if (!isset($falsepositives[$file])) {
                                $falsepositives[$file] = array();
                            }
                            $falsepositives[$file][] = "- NOTICE ( $name ) - line $line : " . trim($buffer);
                            $countfalsepositives++;
                            break;
                        } else {
                        /// Error found, add to errrors
                            if (!isset($errors[$file])) {
                                $errors[$file] = array();
                                echo LINEFEED . "      * ERROR found!" . LINEFEED;
                            }
                            $errors[$file][] = "- ERROR ( $name ) - line $line : " . trim($buffer);
                            echo "          - ERROR ( $name ) - line $line : " . trim($buffer) . LINEFEED;
                            $counterrors++;
                            break;
                        }
                    }
                }
            }
            if (!isset($errors[$file])) {
                echo "... OK" . LINEFEED;
            }
        fclose($handle);
        }

    }

    echo LINEFEED . LINEFEED;
    echo "  SUMMARY: " . count($errors) . " files with errors ($counterrors ocurrences)" . LINEFEED;
    foreach ($errors as $file=>$errarr) {
        echo LINEFEED . "    * $file" . LINEFEED;
        foreach ($errarr as $err) {
            echo "        $err" . LINEFEED;
        }
    }

    echo LINEFEED . LINEFEED;
    echo "  Known false positive: " . count($falsepositives) . " files with $countfalsepositives ocurrences" . LINEFEED;
    echo "  (you should ignore these, although reviewing them from time to time isn't a bad idea either)" . LINEFEED;
    foreach ($falsepositives as $file=>$fparr) {
        echo LINEFEED . "    * $file" . LINEFEED;
        foreach ($fparr as $fp) {
            echo "        $fp" . LINEFEED;
        }
    }

/// INTERNAL FUNCIONS

    /**
     * Given an array of search patterns, create one "megarule", with the specified prefixes and suffixes
     */
    function calculate_megarule($patterns, $prefixes=array(), $suffixes=array(), $modifiers='') {

         $megarule  = '';
         $totalrule = '';

         if (empty($patterns)) {
             return false;
         }

         foreach ($patterns as $pattern) {
             $megarule .= '|(?:' . $pattern . ')';
         }
         $megarule = trim($megarule, '|');

     /// Add all the prefix/suffix combinations
         foreach ($prefixes as $prefix) {
             foreach ($suffixes as $suffix) {
                 $totalrule .= '|(?:' . $prefix . '(?:' . $megarule . ')' . $suffix . ')';
             }
         }
         $totalrule = trim($totalrule, '|');

         return '/' . (empty($totalrule) ? $megarule : $totalrule) . '/' . $modifiers;
    }

    /**
     * Given one full path, return one array with all the files to check
     */
    function files_to_check($path) {

        $results = array();
        $pending = array();

        $dir = opendir($path);
        while (false !== ($file=readdir($dir))) {

            $fullpath = $path . '/' . $file;

            if (substr($file, 0, 1)=='.' || $file=='CVS') { /// Exclude some dirs
                continue;
            }

            if (is_dir($fullpath)) { /// Process dirs later
                $pending[] = $fullpath;
                continue;
            }

            if (is_file($fullpath) && strpos($file, basename(__FILE__))!==false) { /// Exclude me
                continue;
            }

            if (is_file($fullpath) && (strpos($fullpath, 'lib/adodb')!==false ||
                                       strpos($fullpath, 'lib/pear')!==false ||
                                       strpos($fullpath, 'lib/simpletest')!==false ||
                                       strpos($fullpath, 'lib/htmlpurifier')!==false ||
                                       strpos($fullpath, 'lib/memcached.class.php')!==false ||
                                       strpos($fullpath, 'lib/eaccelerator.class.php')!==false ||
                                       strpos($fullpath, 'lib/phpmailer')!==false ||
                                       strpos($fullpath, 'lib/simplepie/simplepie.class.php')!==false ||
                                       strpos($fullpath, 'lib/soap')!==false ||
                                       strpos($fullpath, 'lib/zend/Zend/Amf/Adobe/DbInspector.php')!==false ||
                                       strpos($fullpath, 'search/Zend/Search')!==false ||
                                       strpos($fullpath, 'lang/')!==false ||
                                       strpos($fullpath, 'config.php')!==false ||
                                       strpos($fullpath, 'config-dist.php')!=false)) { /// Exclude adodb, pear, simpletest, htmlpurifier, memcached, phpmailer, soap and lucene libs, lang and config files
                continue;
            }

            if (is_file($fullpath) && strpos($file, '.php')===false && strpos($file, '.html')===false && strpos($file,'.xml')===false) { /// Exclude some files
                continue;
            }

            if (!in_array($fullpath, $results)) { /// Add file if doesn't exists
                $results[$fullpath] = $fullpath;
            }
        }
        closedir($dir);

        foreach ($pending as $pend) {
            $results = array_merge($results, files_to_check($pend));
        }

        return $results;
    }

/// Function used to discard some well known false positives ($fp) when
/// some $text in $file has been detected as error. Only processed if
/// we detect the script is being executed from moodle root directory.
/// Simply returns true/false
    function is_known_false_positive($fp, $file, $text, $is_moodle_root = false) {

        if (!$is_moodle_root) {
            return false;
        }

    /// Take out dirroot from $file
        $file = trim(str_replace(dirname(__FILE__), '', $file), '/');

    /// Look for $file in array of known false positives
        if (array_key_exists($file, $fp)) {
            foreach ($fp[$file] as $fprule) {
                if (preg_match('/' . $fprule . '/i', $text)) {
                    return true;
                }
            }
        }

   /// Arrived hed, no false positives found for that file/$text
       return false;
    }

?>
