<?php
//XTEC ************ AFEGIT - To hide reports
//2010.06.30
if (get_protected_agora())
//************ FI
// spam cleaner
$ADMIN->add('reports', new admin_externalpage('reportspamcleaner', get_string('spamcleaner','report_spamcleaner'), "$CFG->wwwroot/$CFG->admin/report/spamcleaner/index.php", 'moodle/site:config'));

