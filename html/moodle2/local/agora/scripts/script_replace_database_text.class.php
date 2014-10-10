<?php

require_once('agora_script_base.class.php');

class script_replace_database_text extends agora_script_base{

	public $title = 'Replace database texts';
	public $info = "Eina XTEC de cerca i substitució a la base de dades [Només Oracle]";
	public $cron = false;
	public $cli = true;
	protected $test = false;

	public function params(){
		global $CFG;
		$params = array();
		$params['origintext'] = optional_param('origintext',$CFG->wwwroot . '/', PARAM_TEXT);
		$params['targettext'] = optional_param('targettext',$CFG->wwwroot . '/historic/', PARAM_TEXT);
		return $params;
	}

	protected function _execute($params = array(), $execute = true){
		global $CFG, $OUTPUT;

		$textOrig = $params['origintext'];
		$textTarg = $params['targettext'];

		echo "Reemplaçant '<strong>$textOrig</strong>' per '<strong>$textTarg</strong>'<br />";

        $result = $this->replaceMoodle($textOrig, $textTarg);

        if ($result) {
            echo $OUTPUT->notification('S\'ha executat correctament el canvi de text al Moodle','notifysuccess');
            return true;
        } else {
			echo $OUTPUT->notification('El canvi de text no ha finalitzat correctament al Moodle');
			return false;
        }
	}

	/**
	 * Replace $textOrig string to $new string at Moodle
	 *
	 * @param type $textOrig old string to replace
	 * @param type $textTarg new string
	 * @return type Boolean
	 */
	private function replaceMoodle($textOrig, $textTarg) {
		global $CFG;

		if (!($con = oci_pconnect($CFG->dbuser, $CFG->dbpass, $CFG->dbname))) {
			echo 'No s\'ha pogut connectar a la base de dades de Moodle';
			return false;
		}

		// Get all tables
		$sql = 'SELECT table_name FROM user_tables WHERE table_name like \'' . strtoupper($CFG->prefix) . '%\' ';
		$stmt = oci_parse($con, $sql);
		$tables = array();
		if (!oci_execute($stmt, OCI_DEFAULT))
			return false;
		while (oci_fetch($stmt)) {
			$tables[] = oci_result($stmt, 'TABLE_NAME');
		}

		// Get all columns
		foreach ($tables as $table) {
			echo '<br>Reemplaçant taula ' . $table . '...';
			$sql = 'SELECT column_name, data_type FROM user_tab_columns WHERE table_name = \'' . $table . '\' ';
			$stmt = oci_parse($con, $sql);
			$columns = array();
			if (!oci_execute($stmt, OCI_DEFAULT))
				return false;
			while (oci_fetch($stmt)) {
				$columns[] = array('column_name' => oci_result($stmt, 'COLUMN_NAME'),
					'data_type' => oci_result($stmt, 'DATA_TYPE')
				);
			}

			// Replace only CLOB and VARCHAR
			foreach ($columns as $column) {
				if ($column['data_type'] == 'CLOB' || $column['data_type'] == 'VARCHAR2') {
					$sql = 'UPDATE ' . $table . ' SET ' . $column['column_name'] . ' = replace(' . $column['column_name'] . ', \'' . $textOrig . '\', \'' . $textTarg . '\') WHERE ' . $column['column_name'] . ' LIKE \'%' . $textOrig . '%\' ';
					$stmt = oci_parse($con, $sql);
					$columns = array();
					if (!oci_execute($stmt, OCI_DEFAULT)) {
						$e = oci_error($stmt);
						echo '<br />&nbsp;&nbsp;&nbsp;<strong style="color:red">ERROR</strong>: ' . $e['message'];
						continue;
					}
				}
			}
		}

		// Commit the changes
		$r = oci_commit($con);
		if (!$r) {
			$e = oci_error($conn);
			trigger_error(htmlentities($e['message']), E_USER_ERROR);
		}

		oci_close($con);
		purge_all_caches();
		return true;
	}

}
