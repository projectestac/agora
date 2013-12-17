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
    $dbRecord = $DB->get_record_select('context', "contextlevel='10'", null, 'ID');
    $systemContextId = $dbRecord->id;

    // Step 2: build category tree
    $dbRecords = $DB->get_records_select('course_categories', '', null, 'DEPTH, ID', 'ID, NAME, PARENT, DEPTH');
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
            $catTree[$record->id] = array('Id' => $record->id, 'Name' => $record->name, 'Subcategories' => array(), 'categorysize' => 0);
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
            if (($record->parent == $cat['Id'])) {
                $catTree[$cat['Id']]['Subcategories'] = report_coursequotas_buildCatTree($dbRecords, $cat['Id'], $depth + 1);
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
        $dbRecord = $DB->get_record_select('course', 'category=0', null, 'ID, FULLNAME');
        $categoryTree['0'] = array('Id' => 0, 'Name' => get_string('front_page', 'report_coursequotas'), 'Subcategories' => array());
        $categoryTree['0']['courses'][$dbRecord->id] = array('Id' => $dbRecord->id, 'Fullname' => $dbRecord->fullname, 'coursesize' => 0);
    }

    // Add ordinary courses to category
    foreach ($categoryTree as $key => $cat) {
        $dbRecords = $DB->get_records_select('course', "category='$key'", null, 'ID', 'ID, CATEGORY, FULLNAME');
        foreach ($dbRecords as $record) {
            $categoryTree[$key]['courses'][$record->id] = array('Id' => $record->id, 'Fullname' => $record->fullname, 'coursesize' => 0);
        }

        // Recursive call for subcategories
        if (!empty($cat['Subcategories'])) {
            $categoryTree[$key]['Subcategories'] = report_coursequotas_addCoursesToTree($categoryTree[$key]['Subcategories'], false);
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
            $dbRecord = $DB->get_record_select('context', "contextlevel='50' and path like '/$systemContextId/%' and depth='2'", null, 'ID, PATH, INSTANCEID');

            // Get context id of everything belonging to the site course
            $path = $dbRecord->path . '/';
            $courseId = $dbRecord->instanceid;

            // Calculate size of all the files inside the front page avoiding duplicates
            $sql = "SELECT sum(total) as total FROM (
                           SELECT DISTINCT f.contenthash, f.filesize as total
                           FROM {context} c, {files} f 
                           WHERE f.contextid=c.id AND c.path like '" . $path . "%'
                    )";

            $totalSize = $DB->get_record_sql($sql, null)->total;

            $categoryTree['0']['categorysize'] = $totalSize;
            $categoryTree['0']['courses'][$courseId]['coursesize'] = $totalSize;
        }
        // All other categories
        else {
            // Context id of the current category is unknown. This gets it.
            $dbRecord = $DB->get_record_select('context', "contextlevel='40' and instanceid='$cat[Id]' and depth='$depth'", null, 'ID, PATH');

            $path = $dbRecord->path;
            $courseDepth = $depth + 1;

            // Get context elements which are courses in this category
            $dbRecords = $DB->get_records_select('context', "contextlevel='50' and path like '$path/%' and depth='$courseDepth'", null, 'ID', 'ID, PATH, INSTANCEID');

            // There can be several courses in the category
            foreach ($dbRecords as $record) {
                $coursePath = $record->path;
                $courseId = $record->instanceid;

                // Calculate size of all the files inside the course avoiding duplicates
                $sql = "SELECT sum(total) as total FROM (
                               SELECT DISTINCT f.contenthash, f.filesize as total
                               FROM {context} c, {files} f 
                               WHERE f.contextid=c.id AND c.path like '" . $coursePath . "/%'
                        )";
                $courseSize = $DB->get_record_sql($sql, null);

                $totalCourseSize = $courseSize->total;
                $totalSize += $courseSize->total;

                $categoryTree[$key]['courses'][$courseId]['coursesize'] = $totalCourseSize;
            }
        }

        // Recursive call for subcategories
        if (!empty($cat['Subcategories'])) {
            $categoryTree[$key]['Subcategories'] = report_coursequotas_addContextElemsToTree($categoryTree[$key]['Subcategories'], $systemContextId, $depth + 1);
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
function report_coursequotas_printCategoryData($data) {

    // Open HMTL list
    $content = '<ul class="CourseQuotasCategoryList" style="margin-top:0px; margin-bottom:0px;">';

    foreach ($data as $category) {

        // Format size number adding unit information
        $size = report_coursequotas_formatSize($category['categorysize']);

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
            $content .= report_coursequotas_printCategoryData($category['Subcategories']);
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
function report_coursequotas_getCoursesDataBody($data) {

    $courseList = array();

    foreach ($data as $category) {

        if (!empty($category['courses'])) {
            foreach ($category['courses'] as $course) {

                // Format file size
                $size = report_coursequotas_formatSize($course['coursesize']);

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
            $courseList = array_merge($courseList, report_coursequotas_getCoursesDataBody($category['Subcategories']));
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
            WHERE component='backup' or filearea='backup'";

    return $DB->get_record_sql($sql, null)->total;
}


/**
 * Gets the amount of bytes used in directories moodledata/temp/
 * and moodledata/trash/
 *
 * @author Toni Ginard (aginard@xtec.cat)
 *
 * @return int Number of bytes used
 */
function report_coursequotas_getTempTrashUsage() {

    global $CFG;
    $size = array();

    if (file_exists($CFG->dataroot . '/temp/')) {
        $tempSize = exec('du -sk ' . $CFG->dataroot . '/temp/');
        $tempSize = explode('/', $tempSize);
        $tempSize = $tempSize[0]; // Size in kB
        $size['temp'] = report_coursequotas_formatSize($tempSize * 1024);
    } else {
        $size['temp'] = 0;
    }

    if (file_exists($CFG->dataroot . '/trashdir/')) {
        $tempSize = exec('du -sk ' . $CFG->dataroot . '/trashdir/');
        $tempSize = explode('/', $tempSize);
        $tempSize = $tempSize[0]; // Size in kB
        $size['trashdir'] = report_coursequotas_formatSize($tempSize * 1024);
    } else {
        $size['trashdir'] = 0;
    }

    return $size;
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