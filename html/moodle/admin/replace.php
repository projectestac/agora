<?php /// $Id: replace.php,v 1.8.4.5 2009/11/08 22:23:54 skodak Exp $
      /// Search and replace strings throughout all texts in the whole database

require_once('../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->libdir.'/adminlib.php');

// workaround for problems with compression
if (ini_get('zlib.output_compression')) {
    @ini_set('zlib.output_compression', 'Off');
}

admin_externalpage_setup('replace');

$search  = optional_param('search', '', PARAM_RAW);
$replace = optional_param('replace', '', PARAM_RAW);

###################################################################
admin_externalpage_print_header();

print_heading('Search and replace text throughout the whole database');


if (!data_submitted() or !$search or !$replace or !confirm_sesskey()) {   /// Print a form

    print_simple_box_start('center');
    echo '<div class="mdl-align">';
    echo '<form action="replace.php" method="post">';
    echo '<input type="hidden" name="sesskey" value="'.$USER->sesskey.'" />';
    echo 'Search whole database for: <input type="text" name="search" /><br />';
    echo 'Replace with this string: <input type="text" name="replace" /><br />';
    echo '<input type="submit" value="Yes, do it now" /><br />';
    echo '</form>';
    echo '</div>';
    print_simple_box_end();
    admin_externalpage_print_footer();
    die;
}

print_simple_box_start('center');

if (!db_replace($search, $replace)) {
    error('An error has occured during this process'); 
}

print_simple_box_end();

/// Try to replace some well-known serialised contents (html blocks)
notify('Replacing in html blocks...');
$sql = "SELECT bi.*
          FROM {$CFG->prefix}block_instance bi
          JOIN {$CFG->prefix}block b ON b.id = bi.blockid
         WHERE b.name = 'html'";
if ($instances = get_records_sql($sql)) {
    foreach ($instances as $instance) {
        $blockobject = block_instance('html', $instance);
        $blockobject->config->text = str_replace($search, $replace, $blockobject->config->text);
        $blockobject->instance_config_commit($blockobject->pinned);
    }
}

// XTEC **** AFEGIT - Replaced also content in label, forum, resources...
// 2012.07.09 @sarjona

notify('Replacing in assignment...');
$sql = "SELECT a.*
          FROM {$CFG->prefix}assignment a
         WHERE a.description like '%".$search."%'";
if ($assigments = get_records_sql($sql)) {
    foreach ($assigments as $assigment) {
        $assigment->description = str_replace($search, $replace, $assigment->description);
        update_record('assignment', $assigment);
        unset($assigment);
    }
}

notify('Replacing in choice...');
$sql = "SELECT c.*
          FROM {$CFG->prefix}choice c
         WHERE c.text like '%".$search."%'";
if ($choices = get_records_sql($sql)) {
    foreach ($choices as $choice) {
        $choice->text = str_replace($search, $replace, $choice->text);
        update_record('choice', $choice);
        unset($choice);
    }
}

notify('Replacing in course sections...');
$sql = "SELECT cs.*
          FROM {$CFG->prefix}course_sections cs
         WHERE cs.summary like '%".$search."%'";
if ($sections = get_records_sql($sql)) {
    foreach ($sections as $section) {
        $section->summary = str_replace($search, $replace, $section->summary);
        update_record('course_sections', $section);
        unset($section);
    }
}

notify('Replacing in data...');
$sql = "SELECT d.*
          FROM {$CFG->prefix}data d
         WHERE d.intro like '%".$search."%'";
if ($datas = get_records_sql($sql)) {
    foreach ($datas as $data) {
        $data->intro = str_replace($search, $replace, $data->intro);
        update_record('data', $data);
        unset($data);
    }
}

notify('Replacing in forum...');
$sql = "SELECT f.*
          FROM {$CFG->prefix}forum f
         WHERE f.intro like '%".$search."%'";
if ($forums = get_records_sql($sql)) {
    foreach ($forums as $forum) {
        $forum->intro = str_replace($search, $replace, $forum->intro);
        update_record('forum', $forum);
        unset($forum);
    }
}
$sql = "SELECT fp.*
          FROM {$CFG->prefix}forum_posts fp
         WHERE fp.message like '%".$search."%'";
if ($forum_posts = get_records_sql($sql)) {
    foreach ($forum_posts as $forum_post) {
        $forum_post->message = str_replace($search, $replace, $forum_post->message);
        update_record('forum_posts', $forum_post);
        unset($forum_post);
    }
}

notify('Replacing in glossary...');
$sql = "SELECT g.*
          FROM {$CFG->prefix}glossary g
         WHERE g.intro like '%".$search."%'";
if ($glossaries = get_records_sql($sql)) {
    foreach ($glossaries as $glossary) {
        $glossary->intro = str_replace($search, $replace, $glossary->intro);
        update_record('glossary', $glossary);
        unset($glossary);
    }
}

notify('Replacing in jclic...');
$sql = "SELECT j.*
          FROM {$CFG->prefix}jclic j
         WHERE j.description like '%".$search."%'";
if ($jclics = get_records_sql($sql)) {
    foreach ($jclics as $jclic) {
        $jclic->description = str_replace($search, $replace, $jclic->description);
        update_record('jclic', $jclic);
        unset($jclic);
    }
}

notify('Replacing in labels...');
$sql = "SELECT l.*
          FROM {$CFG->prefix}label l
         WHERE l.content like '%".$search."%'";
if ($labels = get_records_sql($sql)) {
    foreach ($labels as $label) {
        $label->content = str_replace($search, $replace, $label->content);
        update_record('label', $label);
        unset($label);
    }
}

notify('Replacing in quiz...');
$sql = "SELECT q.*
          FROM {$CFG->prefix}quiz q
         WHERE q.intro like '%".$search."%'";
if ($quizzes = get_records_sql($sql)) {
    foreach ($quizzes as $quiz) {
        $quiz->intro = str_replace($search, $replace, $quiz->intro);
        update_record('quiz', $quiz);
        unset($quiz);
    }
}
$sql = "SELECT q.*
          FROM {$CFG->prefix}question q
         WHERE q.questiontext like '%".$search."%'";
if ($questions = get_records_sql($sql)) {
    foreach ($questions as $question) {
        $question->questiontext = str_replace($search, $replace, $question->questiontext);
        update_record('question', $question);
        unset($question);
    }
}

notify('Replacing in qv...');
$sql = "SELECT q.*
          FROM {$CFG->prefix}qv q
         WHERE q.description like '%".$search."%'";
if ($qvs = get_records_sql($sql)) {
    foreach ($qvs as $qv) {
        $jclic->description = str_replace($search, $replace, $qv->description);
        update_record('qv', $qv);
        unset($qv);
    }
}

notify('Replacing in resources...');
$sql = "SELECT r.*
          FROM {$CFG->prefix}resource r
         WHERE r.summary like '%".$search."%'";
if ($resources = get_records_sql($sql)) {
    foreach ($resources as $resource) {
        $resource->summary = str_replace($search, $replace, $resource->summary);
        update_record('resource', $resource);
        unset($resource);
    }
}

notify('Replacing in wiki...');
$sql = "SELECT w.*
          FROM {$CFG->prefix}wiki w
         WHERE w.summary like '%".$search."%'";
if ($wikis = get_records_sql($sql)) {
    foreach ($wikis as $wiki) {
        $wiki->summary = str_replace($search, $replace, $wiki->summary);
        update_record('wiki', $wiki);
        unset($wiki);
    }
}


// **** FI


/// Rebuild course cache which might be incorrect now
notify('Rebuilding course cache...');
rebuild_course_cache();
notify('...finished');

print_continue('index.php');

admin_externalpage_print_footer();

?>
