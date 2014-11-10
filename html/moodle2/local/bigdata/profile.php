<?php

require_once('../../config.php');
require_once('lib.php');
require_once('locallib.php');
require_once('forms.php');

require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('bigdata');

if (!bigdata_is_enabled()) {
    print_error('Big data not enabled');
}

$action = required_param('action', PARAM_ACTION);
switch($action) {
    case 'add':
        $mform = new bigdata_profile_form('profile.php?action=add');
        if ($mform->is_cancelled()) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php');
        } else if ($data = $mform->get_data()) {
            $profilecreated = bigdata_profile_insert($data);
            if ($profilecreated) {
                redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_created', 'local_bigdata'));
            }
        }
        echo $OUTPUT->header();
        echo $OUTPUT->heading(get_string('pluginname', 'local_bigdata').': '.get_string('add_profile', 'local_bigdata'));
        $roles = array(3, 4, 5);
        // TODO: Add default tablefields
        $tablefields = array('modules.name', 'role.shortname', 'course.fullname', 'role_assignments.roleid', 'role_assignments.contextid', 'role_assignments.userid',
            'log.time', 'log.userid', 'log.course', 'log.module', 'log.cmid', 'log.action', 'context.contextlevel', 'context.instanceid', 'course_modules.course',
            'course_modules.module', 'course_modules.instance', 'course_modules.added', 'assignment_submissions.assignment', 'assignment_submissions.userid',
            'assignment_submissions.timecreated', 'assign_submission.assignment', 'assign_submission.userid', 'assign_submission.timecreated', 'files.filename', 'files.userid',
            'files.status', 'files.timecreated', 'files.timemodified');

        $modules = $DB->get_fieldset_select('modules', 'name', "");
        foreach ($modules as $module) {
            switch($module){
                case 'book':
                case 'glossary':
                case 'survey':
                case 'wiki':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timecreated', $module.'.timemodified');
                    break;
                case 'assignment':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timeavailable', $module.'.timemodified');
                    break;
                case 'assign':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timemodified'); // timeavailable no existeix...
                    break;
                case 'chat': // Not enabled in agora
                    $modulefields = array();
                    // $modulefields = array($module.'.course', $module.'.name', $module.'.timemodified');
                    break;
                case 'choice':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timeopen', $module.'.timeclose', $module.'.timemodified');
                    break;
                case 'lesson':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.available', $module.'.timemodified');
                    break;
                case 'quiz':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timeopen', $module.'.timecreated', $module.'.timemodified');
                    break;
                case 'scorm':
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timeopen', $module.'.timemodified');
                    break;
                case 'data':
                case 'jclic':
                case 'qv':
                case 'eoicampus':
                    $modulefields = array($module.'.course', $module.'.name');
                    break;
                case 'resource':
                case 'folder':
                case 'page':
                case 'url':
                case 'forum':
                case 'workshop':
                default:
                    $modulefields = array($module.'.course', $module.'.name', $module.'.timemodified');
                    break;
            }
            $tablefields = array_merge($tablefields, $modulefields);
        }
        $toform = array('roles' => $roles, 'tablefields' => $tablefields);
        $mform->set_data($toform);
        $mform->display();
        break;
    case 'edit':
        $id = required_param('id', PARAM_INT);
        $profile = $DB->get_record('bigdata_profiles', array('id' => $id));

        $mform = new bigdata_profile_form('profile.php?action=edit&id='.$profile->id);
        if ($mform->is_cancelled()) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php');
        } else if ($data = $mform->get_data()) {
            $profileupdated = bigdata_profile_update($profile->id, $data);
            if ($profileupdated) {
                redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_updated', 'local_bigdata'));
            }
        }
        echo $OUTPUT->header();
        echo $OUTPUT->heading(get_string('pluginname', 'local_bigdata').': '.get_string('edit_profile', 'local_bigdata', $profile->name));

        $toform = bigdata_get_formdata_from_profile($profile);
        $mform->set_data($toform);
        $mform->display();
        break;
    case 'delete':
        $id = required_param('id', PARAM_INT);
        $profiledeleted = bigdata_profile_delete($id);
        if ($profiledeleted) {
            redirect($CFG->wwwroot . '/local/bigdata/index.php', get_string('profile_deleted', 'local_bigdata'));
        } else {
            print_error('Cannot delete profile');
        }
        break;

}

echo $OUTPUT->footer();
