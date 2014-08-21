<?php
/**
 * Coursequotas report library
 *
 * @package    report
 * @subpackage coursequotas
 * @copyright  2012 Agora Development Team (http://agora.xtec.cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Gets this information for each category: subcategories, courses and disk usage
 *  (of that category). Iterates recursively.
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @global array $DB
 *
 * @return array Tree with data (see description)
 */
function report_coursequotas_getCategoryData() {

    global $DB;

    // Step 1: get system context ID, which is unique, but its value may vary
    $dbRecord = $DB->get_record('context', array('contextlevel'=>'10'), 'id');
    $systemContextId = $dbRecord->id;

    // Step 2: build category tree
    $dbRecords = $DB->get_records('course_categories', array(), 'depth, id', 'id, name, parent, depth');
    $categoryTree = report_coursequotas_buildCatTree($dbRecords, 0, 1);

    // Step 3: add courses to each category
    $categoryTree = report_coursequotas_addCoursesToTree($categoryTree, true);

    // Step 4: Get all context elements belonging to /systemid/categoryid/.../categoryid/courseid
    // Step 5: Search contextid into m2files, get disk usage and add to tree
    $categoryTree = report_coursequotas_addContextElemsToTree($categoryTree, $systemContextId);

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
function report_coursequotas_buildCatTree($dbRecords, $catID, $depth) {
    $catTree = array();

    // First pass to get categories whose parent is this category (aka subcategories)
    foreach ($dbRecords as $key => $record) {
        if ($record->parent == $catID) {
            $catTree[$record->id] = array('id' => $record->id, 'name' => $record->name, 'subcategories' => array(), 'categorysize' => 0);
            // Effiency improvement: Once the category is added to the tree, it won't be added again
            unset($dbRecords[$key]);
        }
    }

    // Second pass for recursive call for all the categories in this category. The process
    //  can't be done in a single pass because we only have the full list of categories
    //  of this depth once we have completed the first pass.
    foreach ($catTree as $cat) {
        foreach ($dbRecords as $record) {
            // Condition 1: next level of depth
            // Condicion 2: the category must be under the current category
            if (($record->parent == $cat['id'])) {
                $catTree[$cat['id']]['subcategories'] = report_coursequotas_buildCatTree($dbRecords, $cat['id'], $depth + 1);
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
function report_coursequotas_addCoursesToTree($categoryTree, $addFrontPageCourse = false) {

    global $DB;

    if ($addFrontPageCourse) {
        // Add front page course
        $dbRecord = $DB->get_record('course', array('category'=>0), 'id, fullname');
        $categoryTree['0'] = array('id' => 0, 'name' => get_string('front_page', 'report_coursequotas'), 'subcategories' => array());
        $categoryTree['0']['courses'][$dbRecord->id] = array('id' => $dbRecord->id, 'Fullname' => $dbRecord->fullname, 'coursesize' => 0);
    }

    // Add ordinary courses to category
    foreach ($categoryTree as $key => $cat) {
        $dbRecords = $DB->get_records('course', array('category'=>$key), 'id', 'id, category, fullname');
        foreach ($dbRecords as $record) {
            $categoryTree[$key]['courses'][$record->id] = array('id' => $record->id, 'Fullname' => $record->fullname, 'coursesize' => 0);
        }

        // Recursive call for subcategories
        if (!empty($cat['subcategories'])) {
            $categoryTree[$key]['subcategories'] = report_coursequotas_addCoursesToTree($categoryTree[$key]['subcategories'], false);
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
function report_coursequotas_addContextElemsToTree($categoryTree, $systemContextId, $depth = 2) {

    global $DB;

    // One iteration per category of a given level
    foreach ($categoryTree as $key => $cat) {

        $totalSize = 0;

        // $key equal to 0 is a fake category for front page course
        if ($key == 0) {
            // Get the site course. Ensure it's front page course by forcing depth = 2
            $dbRecord = $DB->get_record_select('context', "contextlevel = 50 and path like '/$systemContextId/%' and depth = 2", null, 'id, path, instanceid');

            // Get context id of everything belonging to the site course
            $path = $dbRecord->path . '/';
            $courseId = $dbRecord->instanceid;

            // Calculate size of all the files inside the front page avoiding duplicates
            $sql = "SELECT sum(total) as total FROM (
                           SELECT DISTINCT f.contenthash, f.filesize as total
                           FROM {context} c, {files} f
                           WHERE f.contextid=c.id AND c.path like '" . $path . "%'
                    ) t";
            $totalSize = $DB->get_record_sql($sql)->total;

            $categoryTree['0']['categorysize'] = $totalSize;
            $categoryTree['0']['courses'][$courseId]['coursesize'] = $totalSize;
        }
        // All other categories
        else {
            // Context id of the current category is unknown. This gets it.
            $dbRecord = $DB->get_record('context', array('contextlevel'=>40,'instanceid'=>$cat['id'],'depth'=>$depth), 'id, path');

            $path = $dbRecord->path;
            $courseDepth = $depth + 1;

            // Get context elements which are courses in this category
            $dbRecords = $DB->get_records_select('context', "contextlevel='50' and path like '$path/%' and depth='$courseDepth'", null, 'id', 'id, path, instanceid');

            // There can be several courses in the category
            foreach ($dbRecords as $record) {
                $coursePath = $record->path;
                $courseId = $record->instanceid;

                // Calculate size of all the files inside the course avoiding duplicates
                $sql = "SELECT sum(total) as total FROM (
                               SELECT DISTINCT f.contenthash, f.filesize as total
                               FROM {context} c, {files} f
                               WHERE f.contextid=c.id AND c.path like '" . $coursePath . "/%'
                        ) t";
                $courseSize = $DB->get_record_sql($sql);

                $totalCourseSize = $courseSize->total;
                $totalSize += $courseSize->total;

                $categoryTree[$key]['courses'][$courseId]['coursesize'] = $totalCourseSize;
            }
        }

        // Recursive call for subcategories
        if (!empty($cat['subcategories'])) {
            $categoryTree[$key]['subcategories'] = report_coursequotas_addContextElemsToTree($categoryTree[$key]['subcategories'], $systemContextId, $depth + 1);
            foreach ($categoryTree[$key]['subcategories'] as $subCat) {
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
function report_coursequotas_printCategoryData($data) {

    // Open HMTL list
    $content = '<ul class="CourseQuotasCategoryList" style="margin-top:0px; margin-bottom:0px;">';

    foreach ($data as $category) {

        // Format size number adding unit information
        $size = report_coursequotas_formatSize($category['categorysize']);

        // Build list content
        $content .= '<li class="category_title" style="margin-top:3px; margin-bottom:3px;">';
        if ($category['id'] == 0) {
            $content .= $category['name'];
        } else {
            $content .= '<a href="../../course/index.php?categoryid=' . $category['id'] . '" target="_blank">' . $category['name'] . '</a>';
        }
        $content .= ' - ' . number_format($size['figure'], 2, ',', '.') . ' ' . $size['unit'] . '</li>';

        // Recursive call for subcategories
        if (!empty($category['subcategories'])) {
            $content .= report_coursequotas_printCategoryData($category['subcategories']);
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
function report_coursequotas_printCoursesData($data) {

    // Get a two-dimension array with the course to build the body of the table
    $courses = report_coursequotas_getCoursesDataBody($data);
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

    // Open HTML table and adds headings
    $table = new html_table();
    $table->class = 'generaltable';
    $table->head = array(get_string('course_name', 'report_coursequotas'), get_string('category_name', 'report_coursequotas'), get_string('disk_used', 'report_coursequotas'));
    $table->align = array('left', 'center', 'center');
    foreach ($courses as $course) {

        $row = array();
        $row[] = '<a href="../../course/view.php?id=' . $course['courseId'] . '" target="_blank">' . $course['courseName'];
        // Exclude link in front page
        if ($course['categoryId'] == 0) {
            $row[] = $course['categoryName'];
        } else {
            $row[] = '<a href="../../course/index.php?categoryid=' . $course['categoryId'] . '" target="_blank">' . $course['categoryName'] . '</a>';
        }
        $row[] = number_format($course['courseSize'], 2, ',', '.') . ' ' . $course['courseSizeUnit'];
        $table->data[] = $row;
    }
    return html_writer::table($table);
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
function report_coursequotas_getCoursesDataBody($data) {

    $courseList = array();

    foreach ($data as $category) {

        if (!empty($category['courses'])) {
            foreach ($category['courses'] as $course) {

                // Format file size
                $size = report_coursequotas_formatSize($course['coursesize']);

                $courseList[] = array('courseId' => $course['id'],
                    'courseName' => $course['Fullname'],
                    'categoryId' => $category['id'],
                    'categoryName' => $category['name'],
                    'courseSize' => $size['figure'],
                    'courseSizeUnit' => $size['unit']);
            }
        }

        // Recursive call for subcategories
        if (!empty($category['subcategories'])) {
            // array_merge is used to join the courses of this level and of the subcategories
            $courseList = array_merge($courseList, report_coursequotas_getCoursesDataBody($category['subcategories']));
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
function report_coursequotas_getBackupUsage() {

    global $DB;

    // component equal to backup means "course level backup"
    // filearea equal to backup means "user level backup" which is not associated to any course
    $sql = "SELECT sum(filesize) AS total
            FROM {files}
            WHERE (component='backup' or filearea='backup') AND filename != '.'";
    $size = $DB->get_record_sql($sql, null)->total;
    return $size ? $size : 0;
}

function report_coursequotas_getTempUsage() {
    global $CFG;
    if (file_exists($CFG->dataroot . '/temp/')) {
        $tempSize = exec('du -sk ' . $CFG->dataroot . '/temp/');
        $tempSize = explode('/', $tempSize);
        $tempSize = $tempSize[0]; // Size in kB
        return $tempSize * 1024;
    }
    return 0;
}

function report_coursequotas_getTrashUsage() {
    global $CFG;
    if (file_exists($CFG->dataroot . '/trashdir/')) {
        $tempSize = exec('du -sk ' . $CFG->dataroot . '/trashdir/');
        $tempSize = explode('/', $tempSize);
        $tempSize = $tempSize[0]; // Size in kB
        return $tempSize * 1024;
    }
    return 0;
}

function report_coursequotas_getRepositoryUsage() {
    global $CFG;
    if (file_exists($CFG->dataroot . '/repository/files/')) {
            $repoSize = exec('du -sk ' . $CFG->dataroot . '/repository/files/');
            $repoSize = explode('/', $repoSize);
            $repoSize = $repoSize[0]; // Size in kB
            $size = $repoSize * 1024;
    }
    return 0;
}


/**
 * Formats a size figure and adds unit information
 *
 * @author Toni Ginard (aginard@xtec.cat)
 * @param int $figure file size to be formatted
 *
 * @return array Figure and units
 */
function report_coursequotas_formatSize($figure) {

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

function report_coursequotas_printChart($disaggregated, $consumed = false, $total = false){
    //return '<p style="text-align:center; margin-bottom:20px;"><img src="graph.php?diskSpace=' . $total . '&diskConsume=' . $consumed . '" /></p>';
    global $CFG;

    if($total){
        $free = $total - $consumed;
        // Protect the graph against data errors
        if ($free < 0)  $free = 0;

        $consumed_percent = (int) ($consumed/$total *100);
        $free_percent = (int) ($free/$total *100);
    } else {
        $free = 0;
        $free_percent = 0;
        $consumed = 0;
        foreach($disaggregated as $type => $value){
            $consumed += $value / (1024*1024);
        }
        $total = $consumed;
        $consumed_percent = 100;
    }
    $colors = array('course' =>'#FDB45C', 'backup' => '#46BFBD', 'temp' => '#984298','trash' => '#A4822D', 'repo' => '#BB556F');
    $highlights = array('course' =>'#FFC870', 'backup' => '#5AD3D1', 'temp' => '#D19ED1','trash' => '#C79E37', 'repo' => '#DF6A88');
    $text = '<script src="'.$CFG->wwwroot.'/report/coursequotas/chartjs/Chart.min.js"></script>';
    $text .= '<div id="canvas-holder" style="text-align:center;"><canvas id="chart-area" width="300" height="300"/></div>';
    $text .= '<script>
        window.onload = function(){
            var ctx = document.getElementById("chart-area").getContext("2d");
            var data = [';
    foreach($disaggregated as $type => $value){
        $value = $value / (1024*1024);
        $percent = (int) ($value/$total *100);
        if($percent > 0){
            $text .= '{ value: '.$value.', label: "'.get_string('disk_used_'.$type, 'report_coursequotas').' ('.$percent.'%)", color: "'.$colors[$type].'", highlight: "'.$highlights[$type].'"},';
            $consumed -= $value;
            $consumed_percent -= $percent;
        }
    }
    $text .= '  {
                    value: '.$consumed.',
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "'.get_string('disk_used_other', 'report_coursequotas').' ('.$consumed_percent.'%)"
                },
                {
                    value: '.$free.',
                    color: "#2C9C69",
                    highlight: "#4CCA91",
                    label: "'.get_string('disk_free', 'report_coursequotas').' ('.$free_percent.'%)"
                }
            ];
            var options = {
                animateRotate : true,
                animateScale : true,
                tooltipTemplate: "<%if (label){%><%=label%><%} else {%><%= value %><%}%>"
            };
            window.pieChart = new Chart(ctx).Pie(data, options);
        };
    </script>';
    return $text;
}
