<?php

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    if (get_protected_agora()) {
        $ADMIN->add('development', new admin_externalpage('toolreplacextec', get_string('pluginname', 'tool_replacextec'), $CFG->wwwroot . '/' . $CFG->admin . '/tool/replacextec/index.php', 'moodle/site:config', true));
    }
}
