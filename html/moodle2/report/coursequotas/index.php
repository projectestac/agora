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
echo $OUTPUT->header();

$isAgora = is_agora();

if (!get_protected_agora() && is_rush_hour()) {
    error(get_string('rush_hour', 'report_coursequotas'), $CFG->wwwroot);
} else {
    if ($isAgora) {
        // Get diskSpace and diskConsume from Agoraportal (might be out-of-date)
        $diskInfo = getDiskInfo($CFG->dnscentre, 'moodle2');        
        $diskSpace = round($diskInfo['diskSpace']); // In MB
        $diskConsume = round($diskInfo['diskConsume'] / 1024); // Originally in kB

        // Get the size of repository 'files'
        $repoMessage = '';
        $size = array('unit' => 0);
        if (file_exists($CFG->dataroot . '/repository/files/')) {
            $repoSize = exec('du -sk ' . $CFG->dataroot . '/repository/files/');
            $repoSize = explode('/', $repoSize);
            $repoSize = $repoSize[0]; // Size in kB
            $size = report_coursequotas_formatSize($repoSize * 1024);
        }

        // Variables for the language strings
        $a = new stdClass;
        $b = new stdClass;
        $a->diskSpace = $diskSpace;
        $a->diskConsume = $diskConsume;
        $b->figure = number_format($size['figure'], 1, ',', '.');
        $b->unit = $size['unit'];
    }

    // Get category tree with information about its courses and disk usage
    $data = report_coursequotas_getCategoryData();
    
    // Calculate quota used by course files (does not include backups)
    $coursesSize = 0;
    foreach ($data as $category) {
        $coursesSize += $category['categorysize'];
    }
    $size = report_coursequotas_formatSize($coursesSize);

    // Variable for the language strings
    $c = new stdClass;
    $c->figure = number_format($size['figure'], 1, ',', '.');
    $c->unit = $size['unit'];

    // Get quota used in backups
    $backupUsage = report_coursequotas_formatSize(report_coursequotas_getBackupUsage());

    $d = new stdClass;
    $d->figure = number_format($backupUsage['figure'], 1, ',', '.');
    $d->unit = $backupUsage['unit'];

    // Content for first tab (general)
    if ($isAgora){
        $generalContent = '<h3 style="text-align:center;">' . get_string('total_description', 'report_coursequotas') . '</h3>
                            <p style="text-align:center; margin-bottom:20px;"><img src="graph.php?diskSpace=' . $diskSpace . '&diskConsume=' . $diskConsume . '" /></p>
                            <p style="text-align:center;">' . get_string('disk_consume_explain', 'report_coursequotas', $a) .
                '<ul style="margin:auto; width:400px; margin-bottom:20px;">' .
                '<li>' . get_string('disk_consume_repofiles', 'report_coursequotas', $b) . '</li>' .
                '<li>' . get_string('disk_consume_courses', 'report_coursequotas', $c) . '</li>' .
                '<li>' . get_string('disk_consume_backups', 'report_coursequotas', $d) . '</li>' .
                '</ul>' .
                '</p>';        
    } else {
        $generalContent = '<h3 style="text-align:center;">' . get_string('total_noquota_description', 'report_coursequotas') . '</h3> '.
                '<ul style="margin:auto; width:400px; margin-bottom:20px;">' .
                '<li>' . get_string('disk_consume_courses', 'report_coursequotas', $c) . '</li>' .
                '<li>' . get_string('disk_consume_backups', 'report_coursequotas', $d) . '</li>' .
                '</ul>' .
                '</p>';
    }
    
    // Content for second tab (categories)
    $categoryContent = '<h3 style="text-align:center;">' . get_string('category_description', 'report_coursequotas') . '</h3><div style="margin:20px; margin-left:50px;">' . report_coursequotas_printCategoryData($data) . '</div>';

    // Content for third tab (courses)
    $coursesContent = '<h3 style="text-align:center;">' . get_string('courses_description', 'report_coursequotas') . '</h3>' . report_coursequotas_printCoursesData($data);

    $yui_code = '
            <div class="yui3-widget yui3-tabview">
                <div id="demo" class="yui3-tabview-content">
                    <ul class="yui3-tabview-list">
                        <li class="yui3-tab yui3-widget yui3-tab-selected">
                            <a href="#foo" class="yui3-tab-label yui3-tab-content"><em>' . get_string('total_data', 'report_coursequotas') . '</em></a>
                        </li>
                        <li class="yui3-tab yui3-widget">
                            <a href="#bar" class="yui3-tab-label yui3-tab-content"><em>' . get_string('category_data', 'report_coursequotas') . '</em></a>
                        </li>
                        <li class="yui3-tab yui3-widget">
                            <a href="#baz" class="yui3-tab-label yui3-tab-content"><em>' . get_string('larger_courses', 'report_coursequotas') . '</em></a>
                        </li>
                    </ul>
                    <div class="yui3-tabview-panel">
                        <div id="foo" class="yui3-tab-panel">' . $generalContent . '</div>
                        <div id="bar" class="yui3-tab-panel">' . $categoryContent . '</div>
                        <div id="baz" class="yui3-tab-panel">' . $coursesContent . '</div>
                    </div>
                </div>
            </div>
            
			<script type="text/javascript">
                YUI().use(\'tabview\', function(Y) {
                    var tabview = new Y.TabView({
                        srcNode: \'#demo\'
                    });

                    tabview.render();
                });
            </script>
			';

    echo $yui_code;
}

echo $OUTPUT->footer();
