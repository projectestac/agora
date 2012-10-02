<?php

$ADMIN->add('reports', new admin_externalpage('coursequotes', get_string('coursequotes', 'admin'), "$CFG->wwwroot/$CFG->admin/report/coursequotes/index.php",'report/coursequotes:view'));

?>
