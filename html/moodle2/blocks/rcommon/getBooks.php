<?php
//MARSUPIAL ************ FITXER AFEGIT - Added to show books from a publisher
//2011.08.30 @sarjona
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');

require_login();

require_capability('moodle/site:config', context_system::instance());

if(!$site = get_site()) {
	redirect($CFG->wwwroot.'/'.$CFG->admin.'/index.php');
}

$id = required_param('id', PARAM_INT);
if (($publisher = $DB->get_record('rcommon_publisher', array('id' => $id))) === false) {
    print_error(get_string('nopublisher','block_rcommon'));
}

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup($publisher->id);
echo $OUTPUT->header();

$pagetitle = $publisher->name;

echo '<h2 class="headingblock header ">'.$publisher->name.' - '.get_string('marsupialcontent','block_rcommon').'</h2>';
echo '<div class="generalbox box contentbox">';

$sql = 'SELECT b.*, l.name AS "level" FROM {rcommon_books} b, {rcommon_level} l WHERE b.levelid=l.id AND b.publisherid='.$id.' ORDER BY l.name, b.format, b.name';
$books = $DB->get_records_sql($sql);
//$books = $DB->get_records('rcommon_books', array('publisherid'=> $id), 'format, name');

if (!empty($books)){

    $levelid = null;
    $table = new html_table();
    $table->class = 'generaltable generalbox';
    $table->head = array(
                        get_string('name'),
                        'ISBN',
                        get_string('format'));
    $table->align = array('left', 'center', 'center');

    foreach($books as $book) {
        if ($levelid != $book->levelid) {
            if(!empty($table->data)){
                echo html_writer::table($table);

                $table->data = array();
                $table->align = array('left', 'center', 'center');
            }

            echo '<h3>'.$book->level.'</h3>';
            $levelid = $book->levelid;
        }
        $row = array();
        $row[] = $book->name;
        $row[] = $book->isbn;
        $row[] = get_string($book->format, "block_rcommon");
        $table->data[] = $row;
        $levelid = $book->levelid;
    }
    echo html_writer::table($table);
} else{
    echo "<br/><br/>".get_string("nobooks", "block_rcommon")."<br/><br/>";
}

echo '<br/><input type="submit" onclick="this.disabled=\'disabled\'; document.getElementById(\'downloadbookstructures_warning\').style.display=\'block\'; document.location.href=\'WebServices/consume.php?id='.urlencode($id).'\'" value="'.get_string('downloadbookstructures', 'block_rcommon').'" />';
echo '<div id="downloadbookstructures_warning" style="display:none; padding:10px;" >'.get_string("downloadbookstructures_warning", "block_rcommon").'</div>';

echo '<div style="padding:10px;">'.get_string("marsupial_bookswarning", "block_rcommon").'</div>';

echo '</div>';
echo $OUTPUT->footer();
