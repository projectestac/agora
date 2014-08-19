<?php

/**
 * Coursequotas report
 *
 * @package    report
 * @subpackage coursequotas
 * @copyright  2012 Agora Development Team (http://agora.xtec.cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot.'/report/coursequotas/locallib.php');

admin_externalpage_setup('coursequotas', '', null, '', array('pagelayout' => 'report'));
$PAGE->requires->jquery();
$PAGE->requires->jquery_plugin('ui');
echo $OUTPUT->header();

$showDiskInfo = is_agora() && function_exists('getDiskInfo');

if (!get_protected_agora() && is_rush_hour()) {
    print_error('rush_hour', 'local_agora', $CFG->wwwroot);
} else {
    if ($showDiskInfo) {
        // Get diskSpace and diskConsume from Agoraportal (might be out-of-date)
        $diskInfo = getDiskInfo($CFG->dnscentre, 'moodle2');
        $diskSpace = round($diskInfo['diskSpace']); // In MB
        $diskConsume = round($diskInfo['diskConsume'] / 1024); // Originally in kB
    }

    $disaggregated = array();

    // Get category tree with information about its courses and disk usage
    $data = report_coursequotas_getCategoryData();

    /* Debug code - Must be removed when issues will be fixed */
    if (isset($_GET['debugtree'])) {
        echo '<pre>Category tree:';
        print_r($data);
        echo '</pre>';
    }

    // Get quota used in backups
    $repoSize = report_coursequotas_getRepositoryUsage();
    $disaggregated['repo'] = $repoSize;
    $repoUsage = report_coursequotas_formatSize($repoSize);
    $b = new stdClass();
    $b->figure = number_format($repoUsage['figure'], 1, ',', '.');
    $b->unit = $repoUsage['unit'];

    // Calculate quota used by course files (does not include backups)
    $coursesSize = 0;
    foreach ($data as $category) {
        $coursesSize += $category['categorysize'];
    }
    $disaggregated['course'] = $coursesSize;
    $size = report_coursequotas_formatSize($coursesSize);

    /* Debug code - Must be removed when issues will be fixed */
    if (isset($_GET['debugtree'])) {
        echo '<pre>Size of the courses:';
        print_r($size);
        echo '</pre>';
    }

    // Variable for the language strings
    $c = new stdClass();
    $c->figure = number_format($size['figure'], 1, ',', '.');
    $c->unit = $size['unit'];

    // Get quota used in backups
    $backupSize = report_coursequotas_getBackupUsage();
    $disaggregated['backup'] = $backupSize;
    $backupUsage = report_coursequotas_formatSize($backupSize);
    $d = new stdClass();
    $d->figure = number_format($backupUsage['figure'], 1, ',', '.');
    $d->unit = $backupUsage['unit'];

    // Get quota used in files in moodledata/temp/ and in moodledata/trashdir/
    $tempSize = report_coursequotas_getTempUsage();
    $disaggregated['temp'] = $tempSize;
    $tempUsage = report_coursequotas_formatSize($tempSize);
    $e = new stdClass();
    $e->figure = number_format($tempUsage['figure'], 1, ',', '.');
    $e->unit = $tempUsage['unit'];

    $trashSize = report_coursequotas_getTrashUsage();
    $disaggregated['trash'] = $trashSize;
    $trashUsage = report_coursequotas_formatSize($trashSize);
    $f = new stdClass();
    $f->figure = number_format($trashUsage['figure'], 1, ',', '.');
    $f->unit = $trashUsage['unit'];

    // Content for first tab (general)
    if ($showDiskInfo) {
        // If disk info is not avalaible...
        if($diskConsume == 0){
            foreach($disaggregated as $value){
                $diskConsume += $value/(1024*1024);
            }
            $diskConsume = round($diskConsume);
        }

        // Variables for the language strings
        $a = new stdClass();
        $a->diskSpace = $diskSpace;
        $a->diskConsume = $diskConsume;

        $generalContent = $OUTPUT->heading(get_string('total_description', 'report_coursequotas'),3);
        $generalContent .= report_coursequotas_printChart($disaggregated, $diskConsume, $diskSpace);
        $generalContent .= $OUTPUT->notification(get_string('disk_consume_explain', 'report_coursequotas', $a), 'notifysuccess');

    } else {
        $generalContent = $OUTPUT->heading(get_string('total_noquota_description', 'report_coursequotas'),3);
        $generalContent .= report_coursequotas_printChart($disaggregated);
    }
    $generalContent .='<ul style="margin:auto; width:400px; margin-bottom:20px;">' .
                '<li>' . get_string('disk_consume_courses', 'report_coursequotas', $c) . '</li>' .
                '<li>' . get_string('disk_consume_backups', 'report_coursequotas', $d) . '</li>' .
                '<li>' . get_string('disk_consume_repofiles', 'report_coursequotas', $b) . '</li>' .
                '<li>' . get_string('disk_consume_temp', 'report_coursequotas', $e) . '</li>' .
                '<li>' . get_string('disk_consume_trash', 'report_coursequotas', $f) . '</li>' .
                '</ul>';

    // Content for second tab (categories)
    $categoryContent = $OUTPUT->heading(get_string('category_description', 'report_coursequotas'),3) .report_coursequotas_printCategoryData($data);

    // Content for third tab (courses)
    $coursesContent = $OUTPUT->heading(get_string('courses_description', 'report_coursequotas'),3) . report_coursequotas_printCoursesData($data);
    echo '<div id="coursequotas">
            <ul  class="nav nav-tabs">
                <li class="ui-state-active"><a href="#general" data-toggle="tab">' . get_string('total_data', 'report_coursequotas') . '</a></li>
                <li><a href="#category" data-toggle="tab">' . get_string('category_data', 'report_coursequotas') . '</a></li>
                <li><a href="#course" data-toggle="tab">' . get_string('larger_courses', 'report_coursequotas') . '</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="general">' . $generalContent . '</div>
              <div class="tab-pane" id="category">' . $categoryContent . '</div>
              <div class="tab-pane" id="course">' . $coursesContent . '</div>
            </div>
        </div>

			<script type="text/javascript">
                $(function() {
                    $( "#coursequotas" ).tabs();
                });
            </script>
			';
}

echo $OUTPUT->footer();
