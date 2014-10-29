<?php
//MARSUPIAL ************ FITXER AFEGIT - Added to show books from a publisher
//2011.08.30 @sarjona
require_once('../../config.php');
require_once($CFG->dirroot.'/course/lib.php');

require_login();

require_capability('local/rcommon:managecredentials', context_system::instance());

$id = required_param('id', PARAM_INT);
$publisher = $DB->get_record('rcommon_publisher', array('id' => $id));
if (!$publisher) {
    print_error(get_string('nopublisher','local_rcommon'));
}

require_once($CFG->libdir.'/adminlib.php');
admin_externalpage_setup('marsupialcontent'.$publisher->id);
echo $OUTPUT->header();

$pagetitle = $publisher->name;

echo $OUTPUT->heading(get_string('provider_books', 'local_rcommon', $publisher->name));

$action = optional_param('action', false, PARAM_TEXT);
if ($action == 'update') {
    require_once($CFG->dirroot.'/local/rcommon/WebServices/BooksStructure.php');
    echo get_string('consumewait', 'local_rcommon');

    try {
        if (get_all_books_structure($id)) {
            echo $OUTPUT->notification(get_string('consumefinish', 'local_rcommon'), 'notifysuccess');
        } else {
            echo $OUTPUT->notification(get_string('consumeerror', 'local_rcommon'));
        }
    } catch(Exception $fault) {
        echo $OUTPUT->notification($fault->getMessage());
    }
}


$params = array('publisher'=>$id);

$sql = 'SELECT b.id, b.name, b.levelid, b.isbn, b.format, l.name AS levelname, count(uc.isbn) as total, SUM(case when uc.euserid > 0 THEN 1 ELSE 0 END) as assig
    FROM {rcommon_books} b
    INNER JOIN {rcommon_level} l
        ON b.levelid=l.id
    LEFT JOIN {rcommon_user_credentials} uc
        ON b.isbn = uc.isbn
    WHERE  b.publisherid=:publisher
    GROUP BY b.id, b.name, b.levelid, b.isbn, b.format, l.name
    ORDER BY l.name, b.format, b.name';

$books = $DB->get_records_sql($sql, $params);

if (!empty($books)){

    $levelid = null;
    $table = new html_table();
    $table->class = 'generaltable generalbox';
    $table->head = array(
                        get_string('name'),
                        'ISBN',
                        get_string('assigned', 'local_rcommon'),
                        get_string('totals', 'local_rcommon'),
                        get_string('actions', 'local_rcommon'));
    $table->align = array('left', 'center', 'center', 'center', 'center', 'center');

    $formats = array('scorm'=>get_string('scorm', "local_rcommon"), 'webcontent' => get_string('webcontent', "local_rcommon"));

    foreach($books as $book) {
        if ($levelid != $book->levelid) {
            if(!empty($table->data)){
                echo html_writer::table($table);

                $table->data = array();
                $table->align = array('left', 'center', 'center', 'center', 'center', 'center');
            }

            echo $OUTPUT->heading($book->levelname,4);
            $levelid = $book->levelid;
        }
        $row = array();
        if($book->format == 'scorm'){
            $name = '<img src="'.$OUTPUT->pix_url('icon', 'rscorm').'" class="icon" title="'.$formats[$book->format].'" alt="'.$formats[$book->format].'" />'.$book->name;
        } else {
            $name = '<img src="'.$OUTPUT->pix_url('icon', 'rcontent').'" class="icon" title="'.$formats[$book->format].'" alt="'.$formats[$book->format].'" />'.$book->name;
        }
        $row[] = $name;
        $row[] = $book->isbn;
        $row[] = $book->assig;
        $row[] = $book->total;
        $row[] =  '<a href="books.php?id=' . $book->id .'" title="' . get_string('see_details_atitle', 'local_rcommon') . '">' . get_string('see_details', 'local_rcommon') . '</a>';
        $table->data[] = $row;
        $levelid = $book->levelid;
    }
    echo html_writer::table($table);
} else{
    echo $OUTPUT->notification(get_string("nobooks", "local_rcommon"));
}

echo '<a href="contents.php?action=update&id='.$id.'" onclick="this.disabled=\'disabled\'; document.getElementById(\'downloadbookstructures_warning\').style.display=\'block\';"><button>'.get_string('downloadbookstructures', 'local_rcommon').'</button></a>';
echo '<div id="downloadbookstructures_warning" style="display:none; padding:10px;" >'.get_string("downloadbookstructures_warning", "local_rcommon").'</div>';

echo '<div style="padding:10px;">'.get_string("marsupial_bookswarning", "local_rcommon").'</div>';

echo $OUTPUT->footer();
