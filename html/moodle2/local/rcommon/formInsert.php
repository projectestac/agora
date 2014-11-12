<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/local/rcommon/locallib.php');

require_login();
$pagetitle = get_string('keymanager', 'local_rcommon');
$url = new moodle_url('/local/rcommon/formInsert.php', $_REQUEST); // Base URL

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_heading($pagetitle);

$PAGE->set_url($url);
$PAGE->set_title($pagetitle);
$PAGE->navbar->add($pagetitle, null, null, navigation_node::TYPE_CUSTOM, null);

echo $OUTPUT->header();

$isbn = required_param('isbn', PARAM_TEXT);
$url = base64_decode(optional_param('url', '', PARAM_TEXT));
$key = optional_param('key', false, PARAM_TEXT);

if(!empty($key)) {
    credentials::add($isbn, $key, $USER->id);
    echo '<script>document.location.href="'.$url.'";</script>';
} else {
    echo $OUTPUT->heading(get_string('insertkeymsg','local_rcommon'));
?>
    <form id="keyform" method="POST">
        <input type="text" name="key">
        <input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
        <input type="hidden" name="url" value="<?php echo base64_encode($url); ?>">
        <input type="submit" value="<?php echo get_string('keyadd', 'local_rcommon'); ?>">
        <input type="button" value="<?php echo get_string('nokeybtn', 'local_rcommon'); ?>" onclick="document.location.href='<?php echo $url; ?>';">
    </form>

<?php
}
echo $OUTPUT->footer();
