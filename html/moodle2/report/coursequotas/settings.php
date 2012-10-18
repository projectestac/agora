<?php

$ADMIN->add('reports', new admin_externalpage('coursequotas', get_string('coursequotas', 'report_coursequotas'), "$CFG->wwwroot/report/coursequotas/index.php",'report/coursequotas:view'));
