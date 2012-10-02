<?php  // $Id: settings.php,v 1.1.2.1 2008/11/26 20:58:07 skodak Exp $
//XTEC ************ AFEGIT - To hide reports
//2010.06.30
if (get_protected_agora())
//************ FI
$ADMIN->add('reports', new admin_externalpage('reportquestion', get_string('question', 'admin'), "$CFG->wwwroot/$CFG->admin/report/question/index.php", 'moodle/site:config'));
?>
