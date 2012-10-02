<?php
/*file to include PHP variables in javascript*/
require_once('../../config.php');
global $CFG;
?>
WirisQuizzes = {
 constants: {
  wwwroot: '<?php echo $CFG->wwwroot; ?>'
 }
};
