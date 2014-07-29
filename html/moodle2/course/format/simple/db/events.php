<?php

//See http://docs.moodle.org/dev/Event_2
$observers = array(
    array(
        'eventname'   => 'core\event\course_module_deleted',
        'callback'    => 'course_module_deleted_handler',
        'includefile' => '/course/format/simple/handlers.lib.php',
    )
);