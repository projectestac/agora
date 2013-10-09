<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Bulk course registration script from a comma separated file
 *
 * @package    tool
 * @subpackage uploadcoursecategory
 * @copyright  2004 onwards Martin Dougiamas (http://dougiamas.com)
 * @copyright  2012 Piers Harding
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/csvlib.class.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->libdir . '/filelib.php');
require_once('locallib.php');
require_once('coursecategory_form.php');

$iid         = optional_param('iid', '', PARAM_INT);
$previewrows = optional_param('previewrows', 10, PARAM_INT);

@set_time_limit(60*60); // 1 hour should be enough
raise_memory_limit(MEMORY_HUGE);

require_login();
admin_externalpage_setup('tooluploadcoursecategory');
$context = get_system_context();
require_capability('moodle/category:manage', $context);

$strcoursecategoryrenamed             = get_string('coursecategoryrenamed', 'tool_uploadcoursecategory');
$strcoursecategorynotrenamedexists    = get_string('coursecategorynotrenamedexists', 'tool_uploadcoursecategory');
$strcoursecategorynotrenamedmissing   = get_string('coursecategorynotrenamedmissing', 'tool_uploadcoursecategory');
$strcoursecategorynotrenamedoff       = get_string('coursecategorynotrenamedoff', 'tool_uploadcoursecategory');

$strcoursecategoryupdated             = get_string('coursecategoryupdated', 'tool_uploadcoursecategory');
$strcoursecategorynotupdated          = get_string('coursecategorynotupdatederror', 'tool_uploadcoursecategory');
$strcoursecategorynotupdatednotexists = get_string('coursecategorynotupdatednotexists', 'tool_uploadcoursecategory');

$strcoursecategoryuptodate            = get_string('coursecategoryuptodate', 'tool_uploadcoursecategory');

$strcoursecategoryadded               = get_string('newcoursecategory', 'tool_uploadcoursecategory');
$strcoursecategorynotadded            = get_string('coursecategorynotadded', 'tool_uploadcoursecategory');
$strcoursecategorynotaddederror       = get_string('coursecategorynotaddederror', 'tool_uploadcoursecategory');

$strcoursecategorydeleted             = get_string('coursecategorydeleted', 'tool_uploadcoursecategory');
$strcoursecategorynotdeletederror     = get_string('coursecategorynotdeletederror', 'tool_uploadcoursecategory');
$strcoursecategorynotdeletedmissing   = get_string('coursecategorynotdeletedmissing', 'tool_uploadcoursecategory');
$strcoursecategorynotdeletedoff       = get_string('coursecategorynotdeletedoff', 'tool_uploadcoursecategory');
$errorstr                     = get_string('error');

$returnurl = new moodle_url('/admin/tool/uploadcoursecategory/index.php');
$bulknurl  = new moodle_url('/admin/tool/uploadcoursecategory/index.php');

$today = time();
$today = make_timestamp(date('Y', $today), date('m', $today), date('d', $today), 0, 0, 0);

// array of all valid fields for validation
$STD_FIELDS = array('name', 'description', 'idnumber', 'theme', 'visible',
        'deleted',     // 1 means delete course category
        'oldname', // for renaming
    );


if (empty($iid)) {
    $mform1 = new admin_uploadcoursecategory_form1();

    if ($formdata = $mform1->get_data()) {
        $iid = csv_import_reader::get_new_iid('uploadcoursecategory');
        $cir = new csv_import_reader($iid, 'uploadcoursecategory');

        $content = $mform1->get_file_content('coursefile');

        $readcount = $cir->load_csv_content($content, $formdata->encoding, $formdata->delimiter_name);
        unset($content);

        if ($readcount === false) {
            print_error('csvloaderror', '', $returnurl);
        } else if ($readcount == 0) {
            print_error('csvemptyfile', 'error', $returnurl);
        }
        // test if columns ok
        $filecolumns = cc_validate_coursecategory_upload_columns($cir, $STD_FIELDS, $returnurl);
        // continue to form2

    } else {
        echo $OUTPUT->header();

        echo $OUTPUT->heading_with_help(get_string('uploadcoursecategories', 'tool_uploadcoursecategory'), 'uploadcoursecategories', 'tool_uploadcoursecategory');

        $mform1->display();
        echo $OUTPUT->footer();
        die;
    }
} else {
    $cir = new csv_import_reader($iid, 'uploadcoursecategory');
    $filecolumns = cc_validate_coursecategory_upload_columns($cir, $STD_FIELDS, $returnurl);
}

$frontpagecontext = context_course::instance(SITEID);
$mform2 = new admin_uploadcoursecategory_form2(null, array('contextid'=>$frontpagecontext->id, 'columns'=>$filecolumns, 'data'=>array('iid'=>$iid, 'previewrows'=>$previewrows)));

// If a file has been uploaded, then process it
if ($formdata = $mform2->is_cancelled()) {
    $cir->cleanup(true);
    redirect($returnurl);

} else if ($formdata = $mform2->get_data()) {
    // Print the header
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('uploadcoursecategoriesresult', 'tool_uploadcoursecategory'));

    $optype = $formdata->cctype;

    $updatetype        = isset($formdata->ccupdatetype) ? $formdata->ccupdatetype : 0;
    $allowrenames      = (!empty($formdata->ccallowrenames) and $optype != CC_COURSE_ADDNEW and $optype != CC_COURSE_ADDINC);
    $allowdeletes      = (!empty($formdata->ccallowdeletes) and $optype != CC_COURSE_ADDNEW and $optype != CC_COURSE_ADDINC);
    $bulk              = isset($formdata->ccbulk) ? $formdata->ccbulk : 0;
    $standardnames     = $formdata->ccstandardnames;

    // verification moved to two places: after upload and into form2
    $coursecategoriesnew      = 0;
    $coursecategoriesupdated  = 0;
    $coursecategoriesuptodate = 0; //not printed yet anywhere
    $coursecategorieserrors   = 0;
    $deletes       = 0;
    $deleteerrors  = 0;
    $renames       = 0;
    $renameerrors  = 0;
    $coursecategoriesskipped  = 0;
    $weakpasswords = 0;

    // caches
    $ccache         = array(); // course cache - do not fetch all courses here, we  will not probably use them all anyway!
    $cohorts        = array();
    $manualcache    = array(); // cache of used manual enrol plugins in each course

    // clear bulk selection
    if ($bulk) {
        $SESSION->bulk_coursecategories = array();
    }

    // init csv import helper
    $cir->init();
    $linenum = 1; //column header is first line

    // init upload progress tracker
    $upt = new cc_progress_tracker();
    $upt->start(); // start table

    while ($line = $cir->next()) {
        $upt->flush();
        $linenum++;

        $upt->track('line', $linenum);

        $coursecategory = new stdClass();

        // add fields to course object
        foreach ($line as $keynum => $value) {
            if (!isset($filecolumns[$keynum])) {
                // this should not happen
                continue;
            }
            $key = $filecolumns[$keynum];
            $coursecategory->$key = $value;

            if (in_array($key, $upt->columns)) {
                // default value in progress tracking table, can be changed later
                $upt->track($key, s($value), 'normal');
            }
        }
        
        if (!isset($coursecategory->name)) {
            // prevent warnings bellow
            $coursecategory->name = '';
        }
        
        // normalize name
        $originalname = $coursecategory->name;
        if ($standardnames) {
            $coursecategory->name = clean_param($coursecategory->name, PARAM_MULTILANG);
        }
        
        // make sure we really have name
        if (empty($coursecategory->name)) {
            $upt->track('status', get_string('missingfield', 'error', 'name'), 'error');
            $upt->track('name', $errorstr, 'error');
            $coursecategorieserrors++;
            continue;
        }
        
        // validate category parent
        $coursecategory->pathname = $coursecategory->name;
        $categories = explode('/', $coursecategory->name);
        $coursecategory->parent = 0;
        // take off this categories name
        $coursecategory->name = trim(array_pop($categories));
        // check that they haven't explicitly specified the 'Top' parent category
        if (count($categories) > 0) {
            if ($categories[0]== get_string('top')) {
                array_shift($categories);
            }
        }
        // walk the hierachy
        $error = false;
        if (count($categories) > 0) {
            foreach ($categories as $cat) {
                $cat = trim($cat);
                // does the category (for parent) exist - does the category hierachy make sense
                $category = $DB->get_record('course_categories', array('name'=>trim($cat), 'parent' => $coursecategory->parent));
                if (empty($category)) {
                    $upt->track('status', get_string('invalidvalue', 'tool_uploadcoursecategory', 'name'), 'error');
                    $upt->track('name', $errorstr, 'error');
                    $error = true;
                    break;
                }
                $coursecategory->parent = $category->id;
            }
        }
        if ($error) {
            $coursecategorieserrors++;
            continue;
        }

        if ($optype == CC_COURSE_ADDNEW or $optype == CC_COURSE_ADDINC) {
            // course creation is a special case - the name may be constructed from templates using firstname and lastname
            // better never try this in mixed update types
            $error = false;
            if (!isset($coursecategory->description) or $coursecategory->description === '') {
                $upt->track('status', get_string('missingfield', 'error', 'description'), 'error');
                $upt->track('description', $errorstr, 'error');
                $error = true;
            }
            if ($error) {
                $coursecategorieserrors++;
                continue;
            }
            // we require name too - we might use template for it though
            if (empty($coursecategory->name) and !empty($formdata->ccname)) {
                $coursecategory->name = cc_process_template($formdata->ccname, $coursecategory);
                $upt->track('name', s($coursecategory->name));
            }
        }

        // find category
        if ($existingcategory = $DB->get_record('course_categories', array('name'=>trim($coursecategory->name), 'parent' => $coursecategory->parent))) {
            $upt->track('id', $existingcategory->id, 'normal', false);
        }

        // find out in name incrementing required
        if ($existingcategory and $optype == CC_COURSE_ADDINC) {
            $coursecategory->name = cc_increment_name($coursecategory->name);
            if (!empty($coursecategory->idnumber)) {
                $oldidnumber = $coursecategory->idnumber;
                $coursecategory->idnumber = cc_increment_idnumber($coursecategory->idnumber);
                if ($coursecategory->idnumber !== $oldidnumber) {
                    $upt->track('idnumber', s($oldidnumber).'-->'.s($coursecategory->idnumber), 'info');
                }
            }
            $existingcategory = false;
        }

        // check duplicate idnumber
        if (!$existingcategory and isset($coursecategory->idnumber)) {
            if ($DB->record_exists('course_categories', array('idnumber' => $coursecategory->idnumber))) {
                $upt->track('status', get_string('idnumbernotunique', 'tool_uploadcoursecategory'), 'error');
                $upt->track('idnumber', $errorstr, 'error');
                $error = true;
            }
        }
        $categories[]= $coursecategory->name;
        $newname = implode('/', $categories);

        // notify about any name changes
        if ($originalname !== $newname) {
            $upt->track('name', '', 'normal', false); // clear previous
            $upt->track('name', s($originalname).'-->'.s($coursecategory->name), 'info');
        } else {
            $upt->track('name', s($coursecategory->name), 'normal', false);
        }

        // add default values for remaining fields
        $formdefaults = array();
        foreach ($STD_FIELDS as $field) {
            if (isset($coursecategory->$field)) {
                continue;
            }
            // all validation moved to form2
            if (isset($formdata->$field)) {
                $coursecategory->$field = $formdata->$field;
                $formdefaults[$field] = true;
                if (in_array($field, $upt->columns)) {
                    $upt->track($field, s($coursecategory->$field), 'normal');
                }
            }
            else {
                // process templates
                if (isset($formdata->{"cc".$field}) && !empty($formdata->{"cc".$field}) && empty($coursecategory->$field)) {
                    $coursecategory->$field = cc_process_template($formdata->{"cc".$field}, $coursecategory);
                }
            }
        }

        // delete course category
        if (!empty($coursecategory->deleted)) {
            if (!$allowdeletes) {
                $coursecategoriesskipped++;
                $upt->track('status', $strcoursecategorynotdeletedoff, 'warning');
                continue;
            }
            if ($existingcategory) {
                require_capability('moodle/category:manage', get_category_or_system_context((int)$existingcategory->parent));
                category_delete_full($existingcategory, false);
                $upt->track('status', $strcoursecategorydeleted);
                $deletes++;
            } else {
                $upt->track('status', $strcoursecategorynotdeletedmissing, 'error');
                $deleteerrors++;
            }
            continue;
        }
        // we do not need the deleted flag anymore
        unset($coursecategory->deleted);

        // renaming requested?
        if (!empty($coursecategory->oldname) ) {
            if (!$allowrenames) {
                $coursecategoriesskipped++;
                $upt->track('status', $strcoursecategorynotrenamedoff, 'warning');
                continue;
            }

            if ($existingcategory) {
                $upt->track('status', $strcoursecategorynotrenamedexists, 'error');
                $renameerrors++;
                continue;
            }
            
            // validate category parent
            $categories = explode('/', $coursecategory->oldname);
            $coursecategory->oldparent = 0;
            // take off this categories name
            $coursecategory->oldname = trim(array_pop($categories));
            // check that they haven't explicitly specified the 'Top' parent category
            if (count($categories) > 0) {
                if ($categories[0]== get_string('top')) {
                    array_shift($categories);
                }
            }
            // walk the hierachy
            if (count($categories) > 0) {
                foreach ($categories as $cat) {
                    $cat = trim($cat);
                    // does the category (for parent) exist - does the category hierachy make sense
                    $category = $DB->get_record('course_categories', array('name'=>trim($cat), 'parent' => $coursecategory->oldparent));
                    if (empty($category)) {
                        $upt->track('status', get_string('invalidvalue', 'tool_uploadcoursecategory', 'oldname'), 'error');
                        $upt->track('oldname', $errorstr, 'error');
                        $error = true;
                        break;
                    }
                    $coursecategory->oldparent = $category->id;
                }
            }

            if ($standardnames) {
                $oldname = clean_param($coursecategory->oldname, PARAM_MULTILANG);
            } else {
                $oldname = $coursecategory->oldname;
            }

            
            // no guessing when looking for old name, it must be exact match
            if ($oldcoursecategory = $DB->get_record('course_categories', array('name'=>trim($coursecategory->oldname), 'parent' => $coursecategory->oldparent))) {
                $upt->track('id', $oldcoursecategory->id, 'normal', false);
                require_capability('moodle/category:manage', get_category_or_system_context((int)$oldcoursecategory->parent));
                $DB->set_field('course_categories', 'name', $coursecategory->name, array('id'=>$oldcoursecategory->id));
                // update hierarchy pointer if necessary
                if ($coursecategory->parent != $coursecategory->oldparent) {
                    require_capability('moodle/category:manage', get_category_or_system_context((int)$coursecategory->parent));
                    $parent_cat = $DB->get_record('course_categories', array('id' => $coursecategory->parent));
                    $coursecategory->id = $oldcoursecategory->id;
                    move_category($coursecategory, $parent_cat);
                    $existingcategory->context = get_context_instance(CONTEXT_COURSECAT, $oldcoursecategory->id);
                    mark_context_dirty($existingcategory->context->path);
                }
                $upt->track('name', '', 'normal', false); // clear previous
                $upt->track('name', s($oldname).'-->'.s($coursecategory->name), 'info');
                $upt->track('status', $strcoursecategoryrenamed);
                $renames++;
            } else {
                $upt->track('status', $strcoursecategorynotrenamedmissing, 'error');
                $renameerrors++;
                continue;
            }
            $existingcategory = $oldcoursecategory;
            $existingcategory->name = $coursecategory->name;
        }

        // can we process with update or insert?
        $skip = false;
        switch ($optype) {
            case CC_COURSE_ADDNEW:
                if ($existingcategory) {
                    $coursecategoriesskipped++;
                    $upt->track('status', $strcoursecategorynotadded, 'warning');
                    $skip = true;
                }
                break;

            case CC_COURSE_ADDINC:
                if ($existingcategory) {
                    //this should not happen!
                    $upt->track('status', $strcoursecategorynotaddederror, 'error');
                    $coursecategorieserrors++;
                    $skip = true;
                }
                break;

            case CC_COURSE_ADD_UPDATE:
                break;

            case CC_COURSE_UPDATE:
                if (!$existingcategory) {
                    $coursecategoriesskipped++;
                    $upt->track('status', $strcoursecategorynotupdatednotexists, 'warning');
                    $skip = true;
                }
                break;

            default:
                // unknown type
                $skip = true;
        }

        if ($skip) {
            continue;
        }
        
        if ($existingcategory) {
            $coursecategory->id = $existingcategory->id;
            require_capability('moodle/category:manage', get_category_or_system_context((int)$existingcategory->parent));

            $upt->track('name', html_writer::link(new moodle_url('/course/category.php', array('id'=>$existingcategory->id)), s($existingcategory->name)), 'normal', false);

            $existingcategory->timemodified = time();
            // do NOT mess with timecreated or firstaccess here!
            $doupdate = false;

            if ($updatetype != CC_UPDATE_NOCHANGES) {
                foreach ($STD_FIELDS as $column) {
                    if ($column === 'name') {
                        // these can not be changed here
                        continue;
                    }
                    if (!property_exists($coursecategory, $column) or !property_exists($existingcategory, $column)) {
                        // this should never happen
                        continue;
                    }
                    if ($updatetype == CC_UPDATE_MISSING) {
                        if (!is_null($existingcategory->$column) and $existingcategory->$column !== '') {
                            continue;
                        }
                    } else if ($updatetype == CC_UPDATE_ALLOVERRIDE) {
                        // we override everything

                    } else if ($updatetype == CC_UPDATE_FILEOVERRIDE) {
                        if (!empty($formdefaults[$column])) {
                            // do not override with form defaults
                            continue;
                        }
                    }
                    if ($existingcategory->$column !== $coursecategory->$column) {
                        if (in_array($column, $upt->columns)) {
                            $upt->track($column, s($existingcategory->$column).'-->'.s($coursecategory->$column), 'info', false);
                        }
                        $existingcategory->$column = $coursecategory->$column;
                        $doupdate = true;
                    }
                }
            }

            if ($doupdate) {
                // we want only courses that were really updated
                $DB->update_record('course_categories', $existingcategory);
                $existingcategory->context = get_context_instance(CONTEXT_COURSECAT, $existingcategory->id);
                mark_context_dirty($existingcategory->context->path);
                fix_course_sortorder();
                $upt->track('status', $strcoursecategoryupdated);
                $coursecategoriesupdated++;

                events_trigger('coursecategory_updated', $existingcategory);

                if ($bulk == CC_BULK_UPDATED or $bulk == CC_BULK_ALL) {
                    if (!in_array($coursecategory->id, $SESSION->bulk_coursecategories)) {
                        $SESSION->bulk_coursecategories[] = $coursecategory->id;
                    }
                }

            } else {
                // no course information changed
                $upt->track('status', $strcoursecategoryuptodate);
                $coursecategoriesuptodate++;

                if ($bulk == CC_BULK_ALL) {
                    if (!in_array($coursecategory->id, $SESSION->bulk_coursecategories)) {
                        $SESSION->bulk_coursecategories[] = $coursecategory->id;
                    }
                }
            }

        } else {
            // save the new course to the database
            $coursecategory->timemodified = time();
            $coursecategory->timecreated  = time();


            // create course - insert_record ignores any extra properties
            try {
                $coursecategory->sortorder = 999;
                $coursecategory->id = $DB->insert_record('course_categories', $coursecategory);
                $coursecategory->context = get_context_instance(CONTEXT_COURSECAT, $coursecategory->id);
                mark_context_dirty($coursecategory->context->path);
                fix_course_sortorder();
            }
            catch (moodle_exception $e) {
                $upt->track('status', $e->getMessage(), 'error');
                $coursecategorieserrors++;
                $skip = true;
                continue;
            }
            $upt->track('name', html_writer::link(new moodle_url('/course/category.php', array('id'=>$coursecategory->id)), s($coursecategory->name)), 'normal', false);

            $upt->track('status', $strcoursecategoryadded);
            $upt->track('id', $coursecategory->id, 'normal', false);
            $coursecategoriesnew++;

            if ($bulk == CC_BULK_NEW or $bulk == CC_BULK_ALL) {
                if (!in_array($coursecategory->id, $SESSION->bulk_coursecategories)) {
                    $SESSION->bulk_coursecategories[] = $coursecategory->id;
                }
            }
        }
    }

    $upt->close(); // close table

    $cir->close();
    $cir->cleanup(true);

    echo $OUTPUT->box_start('boxwidthnarrow boxaligncenter generalbox', 'uploadresults');
    echo '<p>';
    if ($optype != CC_COURSE_UPDATE) {
        echo get_string('coursecategoriescreated', 'tool_uploadcoursecategory').': '.$coursecategoriesnew.'<br />';
    }
    if ($optype == CC_COURSE_UPDATE or $optype == CC_COURSE_ADD_UPDATE) {
        echo get_string('coursecategoriesupdated', 'tool_uploadcoursecategory').': '.$coursecategoriesupdated.'<br />';
    }
    if ($allowdeletes) {
        echo get_string('coursecategoriesdeleted', 'tool_uploadcoursecategory').': '.$deletes.'<br />';
        echo get_string('deleteerrors', 'tool_uploadcoursecategory').': '.$deleteerrors.'<br />';
    }
    if ($allowrenames) {
        echo get_string('coursecategoriesrenamed', 'tool_uploadcoursecategory').': '.$renames.'<br />';
        echo get_string('renameerrors', 'tool_uploadcoursecategory').': '.$renameerrors.'<br />';
    }
    if ($coursecategoriesskipped) {
        echo get_string('coursecategoriesskipped', 'tool_uploadcoursecategory').': '.$coursecategoriesskipped.'<br />';
    }
    echo get_string('errors', 'tool_uploadcoursecategory').': '.$coursecategorieserrors.'</p>';
    echo $OUTPUT->box_end();

    if ($bulk) {
        echo $OUTPUT->continue_button($bulknurl);
    } else {
        echo $OUTPUT->continue_button($returnurl);
    }
    echo $OUTPUT->footer();
    die;
}

// Print the header
echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('uploadcoursecategoriespreview', 'tool_uploadcoursecategory'));

// NOTE: this is JUST csv processing preview, we must not prevent import from here if there is something in the file!!
//       this was intended for validation of csv formatting and encoding, not filtering the data!!!!
//       we definitely must not process the whole file!

// preview table data
$data = array();
$cir->init();
$linenum = 1; //column header is first line
while ($linenum <= $previewrows and $fields = $cir->next()) {
    $linenum++;
    $rowcols = array();
    $rowcols['line'] = $linenum;
    foreach($fields as $key => $field) {
        $rowcols[$filecolumns[$key]] = s($field);
    }
    $rowcols['status'] = array();

    if (isset($rowcols['name'])) {
        $stdname = clean_param($rowcols['name'], PARAM_MULTILANG);
        if ($rowcols['name'] !== $stdname) {
            $rowcols['status'][] = get_string('invalidnameupload');
        }
        if ($coursecategoryid = $DB->get_field('course_categories', 'id', array('name'=>$stdname))) {
            $rowcols['name'] = html_writer::link(new moodle_url('/course/view.php', array('id'=>$coursecategoryid)), $rowcols['name']);
        }
    } else {
        $rowcols['status'][] = get_string('missingname');
    }

    $rowcols['status'] = implode('<br />', $rowcols['status']);
    $data[] = $rowcols;
}
if ($fields = $cir->next()) {
    $data[] = array_fill(0, count($fields) + 2, '...');
}
$cir->close();

$table = new html_table();
$table->id = "ccpreview";
$table->attributes['class'] = 'generaltable';
$table->tablealign = 'center';
$table->description = get_string('uploadcoursecategoriespreview', 'tool_uploadcoursecategory');
$table->head = array();
$table->data = $data;

$table->head[] = get_string('cccsvline', 'tool_uploadcoursecategory');
foreach ($filecolumns as $column) {
    $table->head[] = $column;
}
$table->head[] = get_string('status');

echo html_writer::tag('div', html_writer::table($table), array('class'=>'flexible-wrap'));

/// Print the form

$mform2->display();
echo $OUTPUT->footer();
die;

