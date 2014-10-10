<?php

require_once('agora_script_base.class.php');

class script_check_database extends agora_script_base{

	public $title = 'Check database';
	public $info = "Check many parameters of the database and tries to solve the errors found";
    public $cli = true;
	protected $test = true;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $XMLDB, $DB, $OUTPUT, $SESSION;

		require_once($CFG->libdir . '/xmlize.php');
		require_once($CFG->libdir.'/ddllib.php');

	    $XMLDB = new stdClass;

	    if (!isset($XMLDB->dbdirs)) {
            $XMLDB->dbdirs = array();
        }

        // get list of all dirs and create objects with status
        $db_directories = get_db_directories();
        foreach ($db_directories as $path) {
            $dbdir = new stdClass;
            $dbdir->path = $path;
            if (!isset($XMLDB->dbdirs[$dbdir->path])) {
                $XMLDB->dbdirs[$dbdir->path] = $dbdir;
             }
            $XMLDB->dbdirs[$dbdir->path]->path_exists = file_exists($dbdir->path);  //Update status
        }
        // Sort by key
    	ksort($XMLDB->dbdirs);

		$problemsfound = array();

		$testagain = array();
		$savetestagain = array();
		if(isset($SESSION->badtables)){
			$test = unserialize($SESSION->badtables);
			foreach ($test as $tablename){
				$testagain[$tablename] = $tablename;
			}
		}

        // And we nedd some ddl suff
        $dbman = $DB->get_manager();
        if ($XMLDB->dbdirs) {
                $dbdirs = $XMLDB->dbdirs;
            echo '<ul>';
            foreach ($dbdirs as $dbdir) {
                // Only if the directory exists
                if (!$dbdir->path_exists) {
                    continue;
                }
                // Load the XML file
                $xmldb_file = new xmldb_file($dbdir->path . '/install.xml');

                // Only if the file exists
                if (!$xmldb_file->fileExists()) {
                    continue;
                }
                // Load the XML contents to structure
                $loaded = $xmldb_file->loadXMLStructure();
                if (!$loaded || !$xmldb_file->isLoaded()) {
                    echo $OUTPUT->notification('Errors found in XMLDB file: '. $dbdir->path . '/install.xml');
                    continue;
                }
                // Arriving here, everything is ok, get the XMLDB structure
                $structure = $xmldb_file->getStructure();

                echo '<li>' . str_replace($CFG->dirroot . '/', '', $dbdir->path . '/install.xml');
                // Getting tables
                if ($xmldb_tables = $structure->getTables()) {
                    echo '<ul>';
                    // Foreach table, process its fields
                    foreach ($xmldb_tables as $xmldb_table) {
                    	if(empty($testagain) || isset($testagain[$xmldb_table->getName()])) {
	                        // Skip table if not exists
	                        if (!$dbman->table_exists($xmldb_table)) {
	                            continue;
	                        }
	                        // Fetch metadata from physical DB. All the columns info.
	                        if (!$metacolumns = $DB->get_columns($xmldb_table->getName())) {
	                            // / Skip table if no metacolumns is available for it
	                            continue;
	                        }
	                        // Table processing starts here
	                        echo '<li>' . $xmldb_table->getName();
	                        // Do the specific check.
	                        list($output, $newproblems) = $this->check_table($xmldb_table, $metacolumns);
	                        if (empty($newproblems)) {
	                        	echo ' <font color="green">Ok</font>';
	                        } else {
	                        	$savetestagain[] = $xmldb_table->getName();
	                        	echo $output;
	                        	$problemsfound = array_merge($problemsfound, $newproblems);
	                        }
	                        echo '</li>';
	                        // Give the script some more time (resetting to current if exists)
	                        if ($currenttl = @ini_get('max_execution_time')) {
	                            @ini_set('max_execution_time', $currenttl);
	                        }
	                    }
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            echo '</ul>';
        }

        $SESSION->badtables = serialize($savetestagain);

        $sqls = array();
        foreach ($problemsfound as $i => $problem) {
        	if(!empty($problem)) {
        		$sqls[] = $problem;
        	}
        }

        if (!empty($sqls)) {
	        if ($execute) {
	        	foreach ($sqls as $sql) {
	        		try {
	        			print_object($sql);
	        			$sql = $dbman->generator->getEndedStatements($sql);
	        			$DB->execute($sql);
	        		} catch(Exception $e) {
	        			print_object($e->getMessage());
	        			print_object($e->debuginfo);
	        		}
	        	}
	        } else {
	        	echo $OUTPUT->notification('SQLS de reparació:');
	        	print_object($sqls);
	        }
	    }

		return empty($problemsfound);
	}

	protected function check_table(xmldb_table $xmldb_table, array $metacolumns) {
		global $CFG;
		$actions = array('check_indexes', 'check_defaults', 'check_bigints', 'check_foreign_keys');

		if ($CFG->dbtype == 'oci') {
			$actions[] = 'check_oracle_semantics';
		}

		$o = "<ul>";
		$wrong_fields = array();
		foreach ($actions as $action) {
			// Get the action path and invoke it
		    list($output, $newproblems) = $this->$action($xmldb_table, $metacolumns);
		    if (empty($newproblems)) {
		    	$o .= '<li>'.$action. ' <font color="green">Ok</font></li>';
		    } else {
		    	$o .= '<li>'.$action. $output.'</li>';
            	$wrong_fields = array_merge($wrong_fields, $newproblems);
		    }

		}
		$o .= "</ul>";
		return array($o, $wrong_fields);
	}

	protected function check_indexes(xmldb_table $xmldb_table, array $metacolumns) {
        global $DB;
        $dbman = $DB->get_manager();

        $o = '';
        $missing_indexes = array();

        // Keys
        if ($xmldb_keys = $xmldb_table->getKeys()) {
            $o.='<ul>';
            foreach ($xmldb_keys as $xmldb_key) {
                // Primaries are skipped
                if ($xmldb_key->getType() == XMLDB_KEY_PRIMARY) {
                    continue;
                }
                // If we aren't creating the keys or the key is a XMLDB_KEY_FOREIGN (not underlying index generated
                // automatically by the RDBMS) create the underlying (created by us) index (if doesn't exists)
                if (!$dbman->generator->getKeySQL($xmldb_table, $xmldb_key) || $xmldb_key->getType() == XMLDB_KEY_FOREIGN) {
                    // Create the interim index
                    $xmldb_index = new xmldb_index('anyname');
                    $xmldb_index->setFields($xmldb_key->getFields());
                    switch ($xmldb_key->getType()) {
                        case XMLDB_KEY_UNIQUE:
                        case XMLDB_KEY_FOREIGN_UNIQUE:
                            $xmldb_index->setUnique(true);
                            break;
                        case XMLDB_KEY_FOREIGN:
                            $xmldb_index->setUnique(false);
                            break;
                    }
                    // Check if the index exists in DB
                    if (!$dbman->index_exists($xmldb_table, $xmldb_index)) {
                    	$o.='<li>Key: ' . $xmldb_key->readableInfo() . ' ';
                        $o.='<font color="red">Missing</font>';
                        // Add the missing index to the list
                        $obj = new stdClass();
                        $obj->table = $xmldb_table;
                        $obj->index = $xmldb_index;
                        $missing_indexes[] = $obj;
                        $o.='</li>';
                    }
                }
            }
            $o.='</ul>';
        }
        // Indexes
        if ($xmldb_indexes = $xmldb_table->getIndexes()) {
            $o.='<ul>';
            foreach ($xmldb_indexes as $xmldb_index) {
                // Check if the index exists in DB
                if (!$dbman->index_exists($xmldb_table, $xmldb_index)) {
                	$o.='            <li>Index: ' . $xmldb_index->readableInfo() . ' ';
                    $o.='<font color="red">Missing</font>';
                    // Add the missing index to the list
                    $obj = new stdClass();
                    $obj->table = $xmldb_table;
                    $obj->index = $xmldb_index;
                    $missing_indexes[] = $obj;
                    $o.='</li>';
                }
            }
            $o.='</ul>';
        }

        $sqls = array();
		foreach ($missing_indexes as $obj) {
            $sqlarr = $dbman->generator->getAddIndexSQL($obj->table, $obj->index);
            if ($sqlarr) {
                $sqls = array_merge($sqls, $sqlarr);
            }
        }

        return array($o, $sqls);
    }

    protected function check_defaults(xmldb_table $xmldb_table, array $metacolumns) {
    	global $CFG, $DB;
        $dbman = $DB->get_manager();

        $o = '';

        $wrong_fields = array();

        // Get and process XMLDB fields
        if ($xmldb_fields = $xmldb_table->getFields()) {
            $o.='        <ul>';
            foreach ($xmldb_fields as $xmldb_field) {

                // Get the default value for the field
                $xmldbdefault = $xmldb_field->getDefault();

                // If the metadata for that column doesn't exist or 'id' field found, skip
                if (!isset($metacolumns[$xmldb_field->getName()]) or $xmldb_field->getName() == 'id') {
                    continue;
                }

                // To variable for better handling
                $metacolumn = $metacolumns[$xmldb_field->getName()];

                // get the value of the physical default (or blank if there isn't one)
                if ($metacolumn->has_default==1) {
                    $physicaldefault = $metacolumn->default_value;
                } else {
                    $physicaldefault = '';
                }

                // there *is* a default and it's wrong
                if ($physicaldefault != $xmldbdefault) {
                	$o.='            <li>Field ' . $xmldb_field->getName() . ' ';
                    $info = '(Expected '.$xmldbdefault.', Actual '.$physicaldefault.')';
                    $o.='<font color="red">Wrong '.$info.'</font>';
                    $o .= $xmldb_field->getNotNull() ? ' not null' : ' null';
                    // Add the wrong field to the list
                    $obj = new stdClass();
                    $obj->table = $xmldb_table;
                    $obj->field = $xmldb_field;
                    $obj->xmldbdefault = $xmldbdefault;
                    $wrong_fields[] = $obj;
                    $o.='</li>';
                }
            }
            $o.='        </ul>';
        }

        $sqls = array();
        foreach ($wrong_fields as $obj) {
        	$xmldbdefault = $obj->xmldbdefault;
        	$xmldb_field = $obj->field;
        	$xmldb_table = $obj->table;
        	echo $xmldbdefault;
        	if ($xmldbdefault !== '' && $xmldb_field->getNotNull()) {
        		// Li podem posar el default
        		//$DB->set_field_select($xmldb_table->getName(), $xmldb_field->getName(), $xmldbdefault, $xmldb_field->getName() .' IS NULL');
        		$sqls[] = 'UPDATE '.$CFG->prefix.$xmldb_table->getName().' SET '.$xmldb_field->getName().' = '.$xmldbdefault.' WHERE '.$xmldb_field->getName().' IS NULL';
        	}
            // get the alter table command
            $sqlarr = $dbman->generator->getAlterFieldSQL($obj->table, $obj->field);

            if ($sqlarr) {
                $sqls = array_merge($sqls, $sqlarr);
            }
        }

    	return array($o, $sqls);
    }

    protected function check_bigints(xmldb_table $xmldb_table, array $metacolumns) {
    	global $DB;
        $dbman = $DB->get_manager();

        $o = '';
        $wrong_fields = array();

        // Get and process XMLDB fields
        if ($xmldb_fields = $xmldb_table->getFields()) {
            $o.='        <ul>';
            foreach ($xmldb_fields as $xmldb_field) {
                // If the field isn't integer(10), skip
                if ($xmldb_field->getType() != XMLDB_TYPE_INTEGER) {
                    continue;
                }
                // If the metadata for that column doesn't exist, skip
                if (!isset($metacolumns[$xmldb_field->getName()])) {
                    continue;
                }
                $minlength = $xmldb_field->getLength();
                if ($minlength > 18) {
                    // Anything above 18 is borked, just ignore it here.
                    $minlength = 18;
                }
                // To variable for better handling
                $metacolumn = $metacolumns[$xmldb_field->getName()];
                // Detect if the physical field is wrong
                if (($metacolumn->meta_type != 'I' and $metacolumn->meta_type != 'R') or $metacolumn->max_length < $minlength) {
                	$o.='            <li>Field: ' . $xmldb_field->getName() . ' ';
                    $o.='<font color="red">Wrong</font>';
                    // Add the wrong field to the list
                    $obj = new stdClass();
                    $obj->table = $xmldb_table;
                    $obj->field = $xmldb_field;
                    $wrong_fields[] = $obj;
                    $o.='</li>';
                }
            }
            $o.='        </ul>';
        }

        $sqls = array();

        foreach ($wrong_fields as $obj) {
            $sqlarr = $dbman->generator->getAlterFieldSQL($obj->table, $obj->field);
            if ($sqlarr) {
                $sqls = array_merge($sqls, $sqlarr);
            }
        }
    	return array($o, $sqls);
    }

    protected function check_foreign_keys(xmldb_table $xmldb_table, array $metacolumns) {
		global $DB;
        $dbman = $DB->get_manager();

        $strictchecks = optional_param('strict', false, PARAM_BOOL);

        $o = '';
        $violatedkeys = array();

        // Keys
        if ($xmldb_keys = $xmldb_table->getKeys()) {
            $o.='        <ul>';
            foreach ($xmldb_keys as $xmldb_key) {
                // We are only interested in foreign keys.
                if (!in_array($xmldb_key->getType(), array(XMLDB_KEY_FOREIGN, XMLDB_KEY_FOREIGN_UNIQUE))) {
                    continue;
                }

                $reftable = $xmldb_key->getRefTable();
                if (!$dbman->table_exists($reftable)) {
                	$o.='            <li>Key: ' . $xmldb_key->readableInfo() . ' ';
                    $o.='<font color="red">unknowntable</font>';
                    // Add the missing index to the list
                    $violation = new stdClass();
                    $violation->string = 'fkunknowntable';
                    $violation->table = $xmldb_table;
                    $violation->key = $xmldb_key;
                    $violation->reftable = $reftable;
                    $violatedkeys[] = $violation;
                    $o.='</li>';
                    continue;
                }

                // Work out the SQL to find key violations.
                $keyfields = $xmldb_key->getFields();
                $reffields = $xmldb_key->getRefFields();
                $joinconditions = array();
                $nullnessconditions = array();
                $params = array();
                foreach ($keyfields as $i => $field) {
                    if (!$dbman->field_exists($reftable, $reffields[$i])) {
                    	$o.='            <li>Key: ' . $xmldb_key->readableInfo() . ' ';
                        $o.='<font color="red">unknownfield</font>';
                        // Add the missing index to the list
                        $violation = new stdClass();
                        $violation->string = 'fkunknownfield';
                        $violation->table = $xmldb_table;
                        $violation->key = $xmldb_key;
                        $violation->reftable = $reftable;
                        $violation->reffield = $reffields[$i];
                        $violatedkeys[] = $violation;
                        $o.='</li>';
                        continue 2;
                    }

                    $joinconditions[] = 't1.' . $field . ' = t2.' . $reffields[$i];
                    $xmldb_field = $xmldb_table->getField($field);
                    $default = $xmldb_field->getDefault();
                    if (!$xmldb_field->getNotNull()) {
                        $nullnessconditions[] = 't1.' . $field . ' IS NOT NULL';
                    } else if (!$strictchecks && ($default == '0' || !$default)) {
                        // We have a default of 0 or '' or something like that.
                        // These generate a lot of false-positives, so ignore them
                        // for now.
                        $nullnessconditions[] = 't1.' . $field . ' <> ?';
                        $params[] = $xmldb_field->getDefault();
                    }
                }
                $nullnessconditions[] = 't2.id IS NULL';
                $sql = 'SELECT count(1) FROM {' . $xmldb_table->getName() .
                        '} t1 LEFT JOIN {' . $reftable . '} t2 ON ' .
                        implode(' AND ', $joinconditions) . ' WHERE ' .
                        implode(' AND ', $nullnessconditions);

                // Check there are any problems in the database.
                $violations = $DB->count_records_sql($sql, $params);
                if ($violations != 0) {
                	$o.='            <li>Key: ' . $xmldb_key->readableInfo() . ' ';
                    $o.='<font color="red">violations</font>';
                    // Add the missing index to the list
                    $violation = new stdClass;
                    $violation->string = 'fkviolationdetails';
                    $violation->table = $xmldb_table;
                    $violation->key = $xmldb_key;
                    $violation->numviolations = $violations;
                    $violation->numrows = $DB->count_records($xmldb_table->getName());
                    $violation->sql = str_replace('count(1)', '*', $sql);
                    if (!empty($params)) {
                        $violation->sqlparams = '(' . implode(', ', $params) . ')';
                    } else {
                        $violation->sqlparams = '';
                    }
                    $violatedkeys[] = $violation;
                    $o.='</li>';
                }
            }
            $o.='        </ul>';
        }

		$sqls = array();
        foreach ($violatedkeys as $violation) {
            $violation->tablename = $violation->table->getName();
            $violation->keyname = $violation->key->getName();

            $o .= get_string($violation->string, 'tool_xmldb', $violation);
            if (!empty($violation->sql)) {
                $o .= '<pre>'.s($violation->sql) . '; ' . s($violation->sqlparams).'</pre>';
                $sqls[] = '';
            }
        }

    	return array($o, $sqls);
    }

    protected function check_oracle_semantics(xmldb_table $xmldb_table, array $metacolumns) {
    	global $DB;
        $dbman = $DB->get_manager();

        $o = '';
        $wrong_fields = array();

        // Get and process XMLDB fields
        if ($xmldb_fields = $xmldb_table->getFields()) {
            $o .= '<ul>';
            foreach ($xmldb_fields as $xmldb_field) {

                // Get the type of the column, we only will process CHAR (VARCHAR2) ones
                if ($xmldb_field->getType() != XMLDB_TYPE_CHAR) {
                    continue;
                }

                // Get current semantic from dictionary, we only will process B (BYTE) ones
                // suplying the SQL code to change them to C (CHAR) semantic
                $params = array(
                    'table_name' => core_text::strtoupper($DB->get_prefix() . $xmldb_table->getName()),
                    'column_name' => core_text::strtoupper($xmldb_field->getName()),
                    'data_type' => 'VARCHAR2');
                $currentsemantic = $DB->get_field_sql('
                    SELECT char_used
                      FROM user_tab_columns
                     WHERE table_name = :table_name
                       AND column_name = :column_name
                       AND data_type = :data_type', $params);

                // If using byte semantics, we'll need to change them to char semantics
                if ($currentsemantic == 'B') {
                	$o.='<li>Field: ' . $xmldb_field->getName() . ' ';
                    $info = '(Expected CHAR, Actual BYTE)';
                    $o .= '<font color="red">Wrong '. $info.'</font>';
                    // Add the wrong field to the list
                    $obj = new stdClass();
                    $obj->table = $xmldb_table;
                    $obj->field = $xmldb_field;
                    $wrong_fields[] = $obj;
                    $o .= '</li>';
                }

            }
            $o .= '</ul>';
        }

		$sqls = array();
        foreach ($wrong_fields as $obj) {
	        $xmldb_table = $obj->table;
	        $xmldb_field = $obj->field;

	        $sql = 'ALTER TABLE ' . $DB->get_prefix() . $xmldb_table->getName() . ' MODIFY ' .
	               $xmldb_field->getName() . ' VARCHAR2(' . $xmldb_field->getLength() . ' CHAR)';
	        $sqls[] = $sql;
        }

    	return array($o, $sqls);
    }

}
