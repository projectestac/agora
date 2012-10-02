<?php  // $Id: settings.php,v 1.1.2.2 2008/11/26 20:58:04 skodak Exp $
//XTEC ************ AFEGIT - To hide reports
//2010.06.30
if (get_protected_agora())
//************ FI
$ADMIN->add('reports', new admin_externalpage('reportbackups', get_string('backups', 'admin'), "$CFG->wwwroot/$CFG->admin/report/backups/index.php",'moodle/site:backup'));
?>
