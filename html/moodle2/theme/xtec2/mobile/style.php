<?php
//define('NO_DEBUG_DISPLAY', true);
define('NO_MOODLE_COOKIES', true); // Session not used here.
define('NO_UPGRADE_CHECK', true);  // Ignore upgrade check.
if (!defined('THEME_DESIGNER_CACHE_LIFETIME')) {
    define('THEME_DESIGNER_CACHE_LIFETIME', 4); // this can be also set in config.php
}

// we need just the values from config.php and minlib.php
require('../../../config.php'); // this stops immediately at the beginning of lib/setup.php
require_once($CFG->dirroot.'/lib/csslib.php');

$theme = theme_config::load('xtec2');
$file = "$CFG->dirroot/theme/xtec2/mobile/mobileapp.css";

$contents = file_get_contents($file);
$css = $theme->post_process($contents);

css_send_uncached_css($css);