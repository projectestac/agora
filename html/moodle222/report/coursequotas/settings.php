<?php

$ADMIN->add('reports', new admin_externalpage('coursequotas', get_string('coursequotas', 'local_moodle'), "$CFG->wwwroot/report/coursequotas/index.php",'report/coursequotas:view'));
