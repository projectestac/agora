<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_qtype_wq_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();
    
    //Make qtype_wq xml field bigger.
    if ($oldversion < 2012062201) {

        $table = new xmldb_table('qtype_wq');
        $field = new xmldb_field('xml', XMLDB_TYPE_TEXT, 'medium');        
        
        $dbman->change_field_type($table, $field);
        
        /// wq savepoint reached
        upgrade_plugin_savepoint(true, 2012062201, 'qtype', 'wq');
    }
    
    //Fix an encoding bug in qtype_wq xml field.
    if ($oldversion < 2013012100) {
        $xml = $DB->get_records('qtype_wq', null, '', '*');
        
        foreach ($xml as $key => $value){
            $x = $value->xml;
            $d = decode_html_entities($x);
            if ($x != $d){
                $xml[$key]->xml = $d;
                $r = $DB->update_record('qtype_wq', $xml[$key]);
            }
        }
	/// wq savepoint reached
	upgrade_plugin_savepoint(true, 2013012100, 'qtype', 'wq');
    }
    
    return true;
}

function decode_html_entities($xml) {
    $htmlentitiestable = get_entities_table(HTML_ENTITIES, ENT_QUOTES);
    $xmlentitiestable = get_entities_table(HTML_SPECIALCHARS , ENT_COMPAT);
    $entitiestable = array_diff($htmlentitiestable, $xmlentitiestable);
    $decodetable = array_flip($entitiestable);
    $xml = str_replace(array_keys($decodetable), array_values($decodetable), $xml);
    return $xml;
}
function get_entities_table($table, $flags) {
	if((version_compare(PHP_VERSION, '5.3.4') >= 0)) {
		return get_html_translation_table($table, $flags, 'UTF-8');
	} else {
		$isotable = get_html_translation_table($table, $flags);
		$utftable = array();
		foreach ($isotable as $key => $value) {
			$utftable[utf8_encode($key)] = utf8_encode($value);
		}
		return $utftable;
	}
}


?>
