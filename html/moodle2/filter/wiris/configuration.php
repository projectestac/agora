<?php
function write_configration() {
	global $CFG;
	$configFile = $CFG->dataroot . "/cache/wiris/configuration.ini";
	$path = $CFG->wwwroot . "/lib/editor/tinymce/plugins/tiny_mce_wiris/tinymce/integration";
	if (!file_exists($configFile)) {
		$config = "wiriscontextpath=" . $path . "\r\n";
		$config .= 'wiriscachedirectory=' . $CFG->dataroot . '/filter/wiris/cache' . "\r\n";
        $config .= 'wirisformuladirectory=' . $CFG->dataroot . '/filter/wiris/formulas' . "\r\n";
		file_put_contents($configFile,$config);
	}
}
?>