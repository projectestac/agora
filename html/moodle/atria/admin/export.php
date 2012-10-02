<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');

header ("Content-Type: application/msexcel");
header ("Content-Disposition: attachment; filename=\"claus_atria.csv\"");

$records = get_records_sql('SELECT * FROM '.$CFG->prefix.'rcommon_user_credentials');
echo 'Alumne;Isbn;Clau'."\n";
foreach($records as $record) {
        echo $record->euserid.';\''.$record->isbn.';\''.$record->credentials."\n";
}
?>