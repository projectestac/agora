<?php

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');

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
            $size = formatSize($repoSize * 1024);
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
    $data = getCategoryData();
    
    // Calculate quota used by course files (does not include backups)
    $coursesSize = 0;
    foreach ($data as $category) {
        $coursesSize += $category['categorysize'];
    }
    $size = formatSize($coursesSize);

    // Variable for the language strings
    $c = new stdClass;
    $c->figure = number_format($size['figure'], 1, ',', '.');
    $c->unit = $size['unit'];

    // Get quota used in backups
    $backupUsage = formatSize(getBackupUsage());

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
    $categoryContent = '<h3 style="text-align:center;">' . get_string('category_description', 'report_coursequotas') . '</h3><div style="margin:20px; margin-left:50px;">' . printCategoryData($data) . '</div>';

    // Content for third tab (courses)
    $coursesContent = '<h3 style="text-align:center;">' . get_string('courses_description', 'report_coursequotas') . '</h3>' . printCoursesData($data);

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


/**
 * Gets this information for each category: subcategories, courses and disk usage 
 *  (of that category). Iterates recursively.
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @global array $CFG
 * @global array $DB
 * 
 * @return array Tree with data (see description)
 */
function getCategoryData() {

    global $CFG, $DB;

    // Step 1: get system context ID, which is unique, but its value may vary
    $dbRecords = $DB->get_records_select('context', "contextlevel='10'", null, 'ID', 'ID');
    $dbRecords = reset($dbRecords); // Gets first element of the array
    $systemContextId = $dbRecords->id;

    // Step 2: build category tree
    $dbRecords = $DB->get_records_select('course_categories', '', null, 'ID', 'ID, NAME, PARENT, DEPTH');
    $categoryTree = buildCatTree($dbRecords, 0, 1);

    // Step 3: add courses to each category
    $dbRecords = $DB->get_records_select('course', '', null, 'ID', 'ID, CATEGORY, FULLNAME');
    $categoryTree = addCoursesToTree($dbRecords, $categoryTree, true);

    // Step 4: Get all context elements belonging to /systemid/categoryid/.../categoryid/courseid
    // Step 5: Search contextid into m2files, get disk usage and add to tree
    $categoryTree = addContextElemsToTree($categoryTree, $systemContextId);

    return $categoryTree;
}


/**
 * Creates a tree data structure wich contains, only, category information. Iterates 
 *  recursively.
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $dbRecords Contains all the categories info from the data base
 * @param int $catID ID of the category where to start
 * @param int $depth Level of the category being processed. Avoids processing subcategories.
 *
 * @return array Tree with data (see description)
 */
function buildCatTree($dbRecords, $catID, $depth) {
    $catTree = array();
    foreach ($dbRecords as $record) {
        if ($record->parent == $catID) {
            $catTree[$record->id] = array('Id' => $record->id, 'Name' => $record->name, 'Subcategories' => array(), 'categorysize' => 0);
        } else {
            if (($depth + 1) == $record->depth) {
                $catTree[$record->parent]['Subcategories'] = buildCatTree($dbRecords, $record->parent, $depth + 1);
            }
        }
    }
    return $catTree;
}


/**
 * Adds courses information to category tree
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $dbRecords Contains all the courses info from the data base
 * @param array $categoryTree
 * @param bool $addFrontPageCourse Flag to know if information of front page courses must be added or not
 * 
 * @return array Tree with data (see description)
 */
function addCoursesToTree($dbRecords, $categoryTree, $addFrontPageCourse = false) {

    foreach ($categoryTree as $key => $cat) {
        foreach ($dbRecords as $record) {
            // Front page course
            if (($record->category == 0) && $addFrontPageCourse) {
                $categoryTree['0'] = array('Id' => 0, 'Name' => get_string('front_page', 'report_coursequotas'), 'Subcategories' => array());
                $categoryTree['0']['courses'][$record->id] = array('Id' => $record->id, 'Fullname' => $record->fullname, 'coursesize' => 0);
            }

            // Other courses
            if ($cat['Id'] == $record->category) {
                $categoryTree[$key]['courses'][$record->id] = array('Id' => $record->id, 'Fullname' => $record->fullname, 'coursesize' => 0);
            } elseif (!isset($categoryTree[$key]['courses'])) {
                $categoryTree[$key]['courses'] = array();
            }

            // Recursive call for subcategories
            if (!empty($cat['Subcategories'])) {
                $categoryTree[$key]['Subcategories'] = addCoursesToTree($dbRecords, $categoryTree[$key]['Subcategories'], false);
            }
        }
    }
    return $categoryTree;
}


/**
 * Adds usage information to category tree, which is obtained from files table. This
 *  function identifies all files belonging to a course, sums the file sizes and,
 *  also, sums course sizes to categories.
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @global array $DB
 * @param array $categoryTree
 * @param int $systemContextId
 * @param int $depth Level of the category being processed. Avoids processing subcategories.
 * 
 * @return array Tree with data (see description)
 */
function addContextElemsToTree($categoryTree, $systemContextId, $depth = 2) {
    global $DB;

    // One iteration per category of a given level
    foreach ($categoryTree as $key => $cat) {

        $totalSize = 0;

        // $key equal to 0 is a fake category for front page course
        if ($key == 0) {
            // Get the site course. Ensure it's front page course by forcing depth = 2
            $dbRecords = $DB->get_records_select('context', "contextlevel='50' and path like '/$systemContextId/%' and depth='2'", null, 'ID', 'ID, PATH, INSTANCEID');

            // Get context id of everything belonging to the site course
            $record = reset($dbRecords); // Get the first element of the array
            $path = $record->path;
            $courseId = $record->instanceid;

            $dbRecords = $DB->get_records_select('context', "path like '$path/%'", null, 'ID', 'ID');

            // Look for all content id's in files table
            foreach ($dbRecords as $record) {
                $contextId = $record->id;
                $dbRecords_2 = $DB->get_records_select('files', "contextid = '$contextId'", null, 'ID', 'ID, FILESIZE');
                if (!empty($dbRecords_2)) {
                    foreach ($dbRecords_2 as $record_2) {
                        $totalSize += $record_2->filesize;
                    }
                }
            }
            $categoryTree['0']['categorysize'] = $totalSize;
            $categoryTree['0']['courses'][$courseId]['coursesize'] = $totalSize;
        }
        // All other categories
        else {
            // Context id of the current category is unknown. This gets it.
            $dbRecords = $DB->get_records_select('context', "contextlevel='40' and instanceid='$cat[Id]' and depth='$depth'", null, 'ID', 'ID, PATH');

            $path = reset($dbRecords)->path;
            $courseDepth = $depth + 1;

            // Get context elements which are courses in this category
            $dbRecords = $DB->get_records_select('context', "contextlevel='50' and path like '$path/%' and depth='$courseDepth'", null, 'ID', 'ID, PATH, INSTANCEID');

            // There can be several courses in the category
            foreach ($dbRecords as $record) {
                $coursePath = $record->path;
                $courseId = $record->instanceid;

                // Get context id of everything in this course
                $dbRecords_2 = $DB->get_records_select('context', "path like '$coursePath/%'", null, 'ID', 'ID');
                $totalCourseSize = 0;

                // Look for all content id's in files table
                foreach ($dbRecords_2 as $record_2) {
                    $contextId = $record_2->id;
                    $dbRecords_3 = $DB->get_records_select('files', "contextid = '$contextId'", null, 'ID', 'ID, FILESIZE');
                    if (!empty($dbRecords_3)) {
                        foreach ($dbRecords_3 as $record_3) {
                            $totalCourseSize += $record_3->filesize;
                            $totalSize += $record_3->filesize;
                        }
                    }
                }
                $categoryTree[$key]['courses'][$courseId]['coursesize'] = $totalCourseSize;
            }
        }

        // Recursive call for subcategories
        if (!empty($cat['Subcategories'])) {
            $categoryTree[$key]['Subcategories'] = addContextElemsToTree($categoryTree[$key]['Subcategories'], $systemContextId, $depth + 1);
            foreach ($categoryTree[$key]['Subcategories'] as $subCat) {
                $totalSize += $subCat['categorysize'];
            }
        }
        
        // Put total size into tree
        $categoryTree[$key]['categorysize'] = $totalSize;
    }

    return $categoryTree;
}


/**
 * Transforms category tree in a string HTML-formatted to be sent to the browser.
 *  Builds a list with category information
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $data Category tree
 * 
 * @return string HTML code to be sent to the browser
 */
function printCategoryData($data) {

    // Open HMTL list
    $content = '<ul class="CourseQuotasCategoryList" style="margin-top:0px; margin-bottom:0px;">';

    foreach ($data as $category) {

        // Format size number adding unit information
        $size = formatSize($category['categorysize']);

        // Build list content
        $content .= '<li class="category_title" style="margin-top:3px; margin-bottom:3px;">';
        if ($category['Id'] == 0) {
            $content .= $category['Name'];
        } else {
            $content .= '<a href="../../course/category.php?id=' . $category['Id'] . '" target="_blank">' . $category['Name'] . '</a>';
        }
        $content .= ' - ' . number_format($size['figure'], 2, ',', '.') . ' ' . $size['unit'] . '</li>';

        // Recursive call for subcategories
        if (!empty($category['Subcategories'])) {
            $content .= printCategoryData($category['Subcategories']);
        }
    }

    // Close HMTL list
    $content .= '</ul>';

    return $content;
}


/**
 * Transforms category tree in a string HTML-formatted to be sent to the browser.
 *  Builds a table with courses information
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $data Category tree
 * 
 * @return string HTML code to be sent to the browser
 */
function printCoursesData($data) {

    // Open HTML table and adds headings
    $content = '<table id="CourseQuotasCoursesTable" style="margin:auto; margin-bottom:30px;">';
    $content .= '<thead>';
    $content .= '<tr>';
    $content .= '<th><strong>' . get_string('course_name', 'report_coursequotas') . '</strong></th>';
    $content .= '<th><strong>' . get_string('category_name', 'report_coursequotas') . '</strong></th>';
    $content .= '<th><strong>' . get_string('disk_used', 'report_coursequotas') . '</strong></th>';
    $content .= '</tr>';
    $content .= '</thead>';
    $content .= '<tbody>';

    // Get a two-dimension array with the course to build the body of the table
    $courses = getCoursesDataBody($data);

    // Sort the array by course size. BTW, array_multisort is weird!!
    $courseSize = array();
    foreach ($courses as $key => $value) {
        $weight = 1;
        switch ($value['courseSizeUnit']) {
            case 'kB': $weight = 1024; break;
            case 'MB': $weight = 1024 * 1024; break;
            case 'GB': $weight = 1024 * 1024 * 1024; break;
        }
        $courseSize[$key] = $value['courseSize'] * $weight;
    }
    array_multisort($courseSize, SORT_DESC, $courses);

    // Build the body of the HTML table
    foreach ($courses as $course) {
        $content .= '<tr>';
        $content .= '<td><a href="../../course/view.php?id=' . $course['courseId'] . '" target="_blank">' . $course['courseName'] . '</td>';
        // Exclude link in front page
        if ($course['categoryId'] == 0) {
            $content .= '<td>' . $course['categoryName'] . '</td>';
        } else {
            $content .= '<td><a href="../../course/category.php?id=' . $course['categoryId'] . '" target="_blank">' . $course['categoryName'] . '</a></td>';
        }
        $content .= '<td>' . number_format($course['courseSize'], 2, ',', '.') . ' ' . $course['courseSizeUnit'] . '</td>';
        $content .= '</tr>';
    }

    // Close the table
    $content .= '</tbody>';
    $content .= '</table>';

    return $content;
}


/**
 * Transforms the n-level tree in a two-dimension array for two reasons: to be
 *  able to build an HTML table and to be able to order the courses by size
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @param array $data Category tree
 * 
 * @return string HTML code to be sent to the browser 
 */
function getCoursesDataBody($data) {

    $courseList = array();

    foreach ($data as $category) {

        if (!empty($category['courses'])) {
            foreach ($category['courses'] as $course) {

                // Format file size
                $size = formatSize($course['coursesize']);

                $courseList[] = array('courseId' => $course['Id'],
                    'courseName' => $course['Fullname'],
                    'categoryId' => $category['Id'],
                    'categoryName' => $category['Name'],
                    'courseSize' => $size['figure'],
                    'courseSizeUnit' => $size['unit']);
            }
        }

        // Recursive call for subcategories
        if (!empty($category['Subcategories'])) {
            // array_merge is used to join the courses of this level and of the subcategories
            $courseList = array_merge($courseList, getCoursesDataBody($category['Subcategories']));
        }
    }

    return $courseList;
}


/**
 * Gets the amount of bytes used in course and users backups
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @global array $DB
 * 
 * @return int Number of bytes used
 */
function getBackupUsage() {
    global $DB;

    // component equal to backup means "course level backup"
    // filearea equal to backup means "user level backup" which is not associated to any course
    $dbRecords = $DB->get_records_select('files', "component='backup' or filearea='backup'", null, 'ID', 'ID, FILESIZE');

    $backupSize = 0;
    foreach ($dbRecords as $record) {
        $backupSize += $record->filesize;
    }

    return $backupSize;
}

/**
 * Formats a size figure and adds unit information
 * 
 * @author Toni Ginard (aginard@xtec.cat)
 * @param int $figure file size to be formatted
 * 
 * @return array Figure and units
 */
function formatSize($figure) {

    $size['figure'] = $figure;
    $size['unit'] = 'Bytes';

    // Unit conversion (Bytes, kB, MB or GB)
    if ($size['figure'] > 1024) {
        $size['figure'] = $size['figure'] / 1024;
        $size['unit'] = 'kB';
    }

    if ($size['figure'] > 1024) {
        $size['figure'] = $size['figure'] / 1024;
        $size['unit'] = 'MB';
    }

    if ($size['figure'] > 1024) {
        $size['figure'] = $size['figure'] / 1024;
        $size['unit'] = 'GB';
    }

    return $size;
}