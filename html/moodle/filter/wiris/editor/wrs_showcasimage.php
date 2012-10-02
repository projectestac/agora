<?php
$nomoodlecookie = true;     // Because it interferes with caching ?

require_once('../../../config.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');

$relativepath = get_file_argument('wrs_showcasimage.php');
$args = explode('/', trim($relativepath, '/'));

if (count($args) == 1) {
    $image    = $args[0];
    $pathname = $CFG->dataroot.'/'.$CFG->wirisimagedir.'/'.$image;
} else {
    error('No valid arguments supplied');
}

if (($image=='default')||(!file_exists($pathname))) {
//If the file doesn't exist, default image is shown
    $image='CAS.gif';
    $pathname=$CFG->dirroot.'/filter/wiris/editor/icons/CAS.gif';
}

if (file_exists($pathname)) {
    send_file($pathname, $image);
} else {  
    echo "Image not found!<br />";  
}