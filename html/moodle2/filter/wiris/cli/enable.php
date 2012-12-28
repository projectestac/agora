<?php

// ivan@wiris.com


// ////////////////////////////////////////////////////////////////////////////
// Common CLI header

define('CLI_SCRIPT', true);

require_once(dirname(__FILE__) . '/../../../config.php');
require_once($CFG->libdir.'/clilib.php');      // cli only functions

// now get cli options
list($options, $unrecognized) = cli_get_params(array('help'=>false),
                                               array('h'=>'help'));

if ($unrecognized) {
    $unrecognized = implode("\n  ", $unrecognized);
    cli_error(get_string('cliunknowoption', 'admin', $unrecognized));
}

if ($options['help']) {
    $help =
"Enables WIRIS filter.

Options:
-h, --help            Print out this help

Example:
\$sudo -u apache /usr/bin/php filter/wiris/cli/enable.php
";

    echo $help;
    die;
}


// ////////////////////////////////////////////////////////////////////////////
// Actual code

// See the definition in /lib/filterlib.php
filter_set_global_state('filter/wiris',TEXTFILTER_ON,1);
