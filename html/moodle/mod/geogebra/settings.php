<?php 

require_once($CFG->dirroot.'/mod/geogebra/lib.php');

$settings->add(new admin_setting_configtext('geogebra_javacodebase', get_string('javacodebase', 'geogebra'),
                   get_string('configjavacodebase', 'geogebra'), GEOGEBRA_DEFAULT_CODEBASE, PARAM_URL, 60));

?>
