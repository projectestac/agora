<?php

function bigdata_export($profileid) {
	global $CFG;

	require_once($CFG->dirroot.'/local/bigdata/exportlib.php');

	$bigdata = new bigdata($profileid);
	return $bigdata->export($CFG->dataroot, 'bigdata', $CFG->siteidentifier);
}

function bigdata_is_enabled() {
	return (boolean) get_config('local_bigdata', 'enabled');
}
