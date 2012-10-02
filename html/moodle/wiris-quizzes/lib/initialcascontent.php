<?php
/**
 * This page is a popup launched when a user is editing a question and clicks
 * the button 'Initial content' of CAS field.
 * **/
  require_once('../../config.php');
  global $CFG;
  require_once($CFG->dirroot.'/wiris-quizzes/lib/functions.php');
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo wrsqz_get_string('wrsqz_initialcontent'); ?></title>
        <script type="text/javascript"  src="<?php echo $CFG->wwwroot; ?>/lib/yui/yahoo/yahoo-min.js"></script>
        <script type="text/javascript"  src="<?php echo $CFG->wwwroot; ?>/lib/yui/yahoo-dom-event/yahoo-dom-event.js"></script>
        <script type="text/javascript" src="<?php echo $CFG->wwwroot; ?>/wiris-quizzes/js/constants.js"></script>
        <script type="text/javascript" src="<?php echo $CFG->wwwroot; ?>/wiris-quizzes/js/wiris-quizzes-edit.js"></script>
    </head>
    <body>
<?php
//applet
  $wirisCASContent = '';
  $applet = wrsqz_wirisCASAppletHTML('initial', $wirisCASContent, FALSE, "100%", "92%");
  echo $applet;
?>
         <div id="buttons" style="text-align: right; margin: 4px">
         <button id="initialCASOk"><?php echo wrsqz_get_string('wrsqz_ok'); ?></button>
         <button id="initialCASCancel"><?php echo wrsqz_get_string('wrsqz_cancel'); ?></button>
      </div>
    </body>
</html>
