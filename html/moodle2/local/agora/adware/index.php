<?php
define('NO_OUTPUT_BUFFERING', true);

require_once('../../../config.php');
require_once('lib.php');

require_once($CFG->libdir.'/adminlib.php');

set_time_limit(0);

admin_externalpage_setup('agora_adware');

echo $OUTPUT->header();
echo $OUTPUT->heading('Neteja Adware');

echo $OUTPUT->box('Aquesta eina no detecta tot l\'Adware de la plataforma ni l\'esborra automàticament<br>Podeu trobar més informació en aquesta <a href="http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=461&mode=entry&hook=2001">Pregunta Freqüent</a>');

\core\session\manager::write_close();
$data = get_adware();
if (!empty($data)) {
	echo $OUTPUT->notification('S\'han trobat '.count($data). ' cadenes');
	$table = new html_table();
	$table->align = array('left','left');
	$table->head = array('Tipus', 'URL', 'Curs');
	$table->data = $data;
	echo html_writer::table($table);
} else {
	echo $OUTPUT->notification('No s\'ha trobat adware! :-)', 'notifysuccess');
}

echo $OUTPUT->footer();
