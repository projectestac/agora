<?php
/*
Different default site settings can be stored in file /local/defaults.php.
These new defaults are used during installation, upgrade and later are displayed as default values in admin settings.
This means that the content of the defaults files is usually updated BEFORE installation or upgrade.
These customised defaults are useful especially when using CLI tools for installation and upgrade.
Sample /local/defaults.php file content:
<?php
$defaults['moodle']['forcelogin'] = 1;  // new default for $CFG->forcelogin
$defaults['scorm']['maxgrade'] = 20;    // default for get_config('scorm', 'maxgrade')
$defaults['moodlecourse']['numsections'] = 11;
$defaults['moodle']['hiddenuserfields'] = array('city', 'country');
First bracket contains string from column plugin of config_plugins table. Second bracket is the name of setting.
In the admin settings UI the plugin and name of setting is separated by "|".
The values usually correspond to the raw string in config table, with the exception of comma separated lists that are
usually entered as real arrays.
Please note that not all settings are converted to admin_tree, they are mostly intended to be set directly in config.php.
*/

$defaults['moodle']['calendar_startwday'] = 1;
