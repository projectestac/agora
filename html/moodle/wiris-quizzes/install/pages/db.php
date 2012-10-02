<?php
require_once($CFG->dirroot . '/lib/ddllib.php');
define('TABLE_EXISTS', 0);
define('TABLE_UPDATED', 1);
define('CREATED_TABLE',2);
define('DB_ERROR', -1);

function wrsqz_create_question_table($questionType) {
	global $CFG;
		
  /// Define table question_xxx to be created
  $questionTable = new XMLDBTable('question_' . $questionType . 'wiris');

  /// Adding fields to table question_xxx
  $questionTable->addFieldInfo('id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null, null);
  $questionTable->addFieldInfo('question', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0');
  $questionTable->addFieldInfo('idcache', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0');
  $questionTable->addFieldInfo('md5', XMLDB_TYPE_CHAR, '50', null, XMLDB_NOTNULL, null, null, null, '0');

  /// Add question-type specific fields
	if($questionType == 'multichoice' or $questionType == 'truefalse'){
		$questionTable->addFieldInfo('override', XMLDB_TYPE_CHAR, '200', null, XMLDB_NOTNULL, null, null, null, '0');
	}
	else if($questionType == 'shortanswer' || $questionType=='multianswer'){
		$questionTable->addFieldInfo('eqoption', XMLDB_TYPE_TEXT, 'medium');
	}

  /// Add options field
  /// NOTE: in future this field will replace question-type specific fields.
  $questionTable->addFieldInfo('options', XMLDB_TYPE_TEXT, 'medium');

  /// Adding keys to table question_xxx
  $questionTable->addKeyInfo('primary', XMLDB_KEY_PRIMARY, array('id'));
  /// Adding indexes to table question_xxx
  $questionTable->addIndexInfo($CFG->prefix . 'ques' . substr($questionType, 0, 4) . '_ref_ix', XMLDB_INDEX_NOTUNIQUE, array('question'));	
	/// Launch create table
	return wrsqz_create_table($questionTable);	
}

function wrsqz_create_program_table($questionTypeProm) {
	global $CFG;
		
	/// Define table question_wxxxxprom to be created
  $promTable = new XMLDBTable('question_' . $questionTypeProm);

  /// Adding fields to table question_wxxxxprom
  $promTable->addFieldInfo('id', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null, null);
  $promTable->addFieldInfo('question', XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '0');
  $promTable->addFieldInfo('program', XMLDB_TYPE_TEXT, 'big', null, null, null, null, null, null);

  /// Adding keys to table question_wxxxxprom
  $promTable->addKeyInfo('primary', XMLDB_KEY_PRIMARY, array('id'));

  /// Adding indexes to table question_wxxxxprom
  $promTable->addIndexInfo($CFG->prefix . 'ques' . substr($questionTypeProm, 0, 4) . '_que_ix', XMLDB_INDEX_NOTUNIQUE, array('question'));
		
	/// Launch create table
	return wrsqz_create_table($promTable);
}

function wrsqz_create_table($table) {
	if(table_exists($table, true, false)){
		return wrsqz_update_table($table);
	}else if(create_table($table, true, false)){
		return CREATED_TABLE;
	}else{
		return DB_ERROR;
	}
}

/**
 * Checks all fields of table and adds the missing ones. 
 **/
function wrsqz_update_table(&$table){
  $result = TABLE_EXISTS;
  foreach($table->fields as $field){
    if(!field_exists($table, $field)){
      add_field($table, $field, true, true);
      $result = TABLE_UPDATED;
    }
  }
  return $result;
}

function wrsqz_install_database(){

	$questionTypes = array('essay', 'match', 'multichoice', 'shortanswer','truefalse','multianswer');
	$questionTypeProms = array('wessaprom', 'wmatprom', 'wmultiprom', 'wshanprom', 'wtrflsprom','wmansprom');
	$ok = true;
	echo '<div align="left">';
	echo '<ul><li>Modifying database...</li><ul>';
	foreach($questionTypes as $questionType){
		if($ok){
			$result = wrsqz_create_question_table($questionType);
			if ($result == CREATED_TABLE){
				echo utf8_htmlentities(translate('Created table')) . ' <i>question_' . $questionType . 'wiris</i> ' . utf8_htmlentities(translate('successfully')) . '.<br />';
			}else if($result == TABLE_EXISTS){
				echo utf8_htmlentities(translate('Table')) . ' <i>question_' . $questionType . 'wiris</i> ' . utf8_htmlentities(translate('already exists and has not been modified')) . '.<br />';
      }else if($result == TABLE_UPDATED){
        echo utf8_htmlentities(translate('Table')) . ' <i>question_' . $questionType . 'wiris</i> ' . utf8_htmlentities(translate('has been updated')). '.<br />';
      }else if($result == DB_ERROR){
				$ok = false;
				echo utf8_htmlentities(translate('An error occurred in creating table')) . ' <i>question_' . $questionType . 'wiris</i>. '.utf8_htmlentities(translate('Installation has been aborted')) . '.<br />';
			}
		}
	}
	foreach($questionTypeProms as $questionTypeProm){
		if($ok){
			$result = wrsqz_create_program_table($questionTypeProm);
			if ($result == CREATED_TABLE){
				echo utf8_htmlentities(translate('Created table')) . ' <i>question_' . $questionTypeProm . '</i> ' . utf8_htmlentities(translate('successfully')) . '.<br />';
			}else if($result == TABLE_EXISTS){
				echo utf8_htmlentities(translate('Table')) . ' <i>question_' . $questionTypeProm . '</i> ' . utf8_htmlentities(translate('already exists and has not been modified')) . '.<br />';
			}else if($result == DB_ERROR){
				$ok = false;
				echo utf8_htmlentities(translate('An error occurred in creating table')) . ' <i>question_' . $questionTypeProm . '</i>. '.utf8_htmlentities(translate('Installation has been aborted')) . '.<br />';
			}
		}
	}
	echo '<br /><br /></div>';
	return $ok;
}

function wrsqz_print_db_message($allwell){
	
	if($allwell){
                echo '<form action="./install.php" method="POST">';
		echo '<input type="hidden" name="language" value="', utf8_htmlentities($shortLanguageName), '" />';
		echo '<input type="hidden" name="step" value="6">';
		echo '<input type="submit" value="Continue" />';
		echo '</form>';
	}else{
		echo '<div align="left">';
		echo utf8_htmlentities(translate('An error occurred while modifying the database. Please see the')),'<a href="http://www.wiris.com/quizzes/docs/install/">',utf8_htmlentities(translate('manual install documentation')),'</a> in order to modify manually the database.<br /><br />';
		echo '</div>';
		echo '<a href="..">', utf8_htmlentities(translate('Go to my moodle')), '</a>';
	}
	
}

/**
 * This function sets the data in the database to the good format. This function
 * have this properties:
 * 1 - does not depend on the previous version: it has to discover which changes to apply
 * 2 - (a corolary of 1) is idempotent, i.e, f(f(x)) = f(x)
 * **/
function wrsqz_update_database(){
  //update shortanswer wirisCASForComputations field
  $updates = 0;
  $shortanswertable = new XMLDBTable('question_shortanswerwiris');
  if(table_exists($shortanswertable)){
    $eqoptionfield = new XMLDBField('eqoption');
    if(field_exists($shortanswertable, $eqoptionfield)){
      $saq = get_records('question_shortanswerwiris');
      foreach($saq as $question){
        if(trim($question->eqoption)!=''){
          $decodedEqoption = array();
          mb_parse_str($question->eqoption , $decodedEqoption);
          if(isset($decodedEqoption['wirisCASForComputations'])){
            $wirisCASForComputations = $decodedEqoption['wirisCASForComputations'];
            unset($decodedEqoption['wirisCASForComputations']);
            $question->eqoption = http_build_query($decodedEqoption,null,'&');
            if(!empty($question->options)){
              $options = unserialize($question->options);
            }else{
              $options = array();
            }
            $options['wirisCASForComputations'] = $wirisCASForComputations;
            $question->options = serialize($options);
            update_record('question_shortanswerwiris', $question);
            $updates++;
          }
        }
      }
    }
  }
  if($updates){
    echo utf8_htmlentities(translate('Updated shortanswer wirisCASForComputations field: ')) . $updates . utf8_htmlentities(translate(' records')).'<br />';
  }
}

/*
 * connects with pluginwiris in order ot put a configuration option there.
 * **/
function wrsqz_install_settings(){
  global $CFG;
  if(@is_readable($CFG->dirroot.'/filter/wiris/lib/plugin_api.php')){
    require_once($CFG->dirroot.'/filter/wiris/lib/plugin_api.php');
    //XTEC ************ MODIFICAT - WIRIS Quizzes
    //2011.09.13 - sarjona
    wrs_registerPlugin('wiris_quizzes_enabled', 'WIRIS quizzes', 'wirisquizzes', 0);
    //************ ORIGINAL
    /*
    wrs_registerPlugin('wiris_quizzes_enabled', 'WIRIS quizzes', 'wirisquizzes', 1);
    */
    //************ FI    
    echo '<div>'.utf8_htmlentities(translate('WIRIS plugin registered.')).'</div>';
  }
}

if (defined('SECURITY_CONSTANT')) {
	echo '<span style="display:none">';
	echo '</span>';
	
	$result = wrsqz_install_database();
  wrsqz_update_database();
  wrsqz_install_settings();
	wrsqz_print_db_message($result);


} else {
		echo 'Error: you should access this script via wiris-quizzes/installdb.php'.'</br>';
}

?>