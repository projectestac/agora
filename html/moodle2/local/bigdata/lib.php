<?php

function bigdata_export($profileid) {
    global $CFG;

    require_once($CFG->dirroot.'/local/bigdata/exportlib.php');

    $bigdata = new bigdata($profileid);
    if (function_exists('get_admin_datadir_folder')) {
        $directory = get_admin_datadir_folder('bigdata');
    } else {
        $directory = $CFG->dataroot.'/bigdata';
        make_writable_directory($directory);
    }

    return $bigdata->export($directory, 'bigdata', $CFG->siteidentifier);
}

function bigdata_is_enabled() {
    return (boolean) get_config('local_bigdata', 'enabled');
}
