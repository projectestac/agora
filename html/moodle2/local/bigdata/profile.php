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

        $tablefields = array('modules.name', 'role.shortname', 'course.fullname', 'role_assignments.roleid', 'role_assignments.contextid', 'role_assignments.userid',
            'log.time', 'log.userid', 'log.course', 'log.module', 'log.cmid', 'log.action', 'context.contextlevel', 'context.instanceid', 'course_modules.course',
            'course_modules.module', 'course_modules.instance', 'course_modules.added', 'assignment_submissions.assignment', 'assignment_submissions.userid',
            'assignment_submissions.timecreated', 'assign_submission.assignment', 'assign_submission.userid', 'assign_submission.timecreated', 'files.userid',
            'files.status', 'files.timecreated', 'files.timemodified');

        $modules = $DB->get_fieldset_select('modules', 'name', "");
        foreach ($modules as $module) {
            $modulefields = array();
            switch($module){
                case 'book':
                case 'survey':
                case 'wiki':
                case 'lti':
                case 'rcontent':
                    $modulefields = array($module.'.timecreated', $module.'.timemodified');
                    break;
                case 'assignment':
                    $modulefields = array($module.'.timeavailable', $module.'.timemodified');
                    break;
                case 'assign':
                    $modulefields = array($module.'.timemodified'); // timeavailable no existeix...
                    break;
                case 'chat': // Not enabled in agora
                    // $modulefields = array($module.'.timemodified');
                    continue;
                    break;
                case 'choice':
                case 'feedback':
                    $modulefields = array($module.'.timeopen', $module.'.timeclose', $module.'.timemodified');
                    break;
                case 'lesson':
                    $modulefields = array($module.'.available', $module.'.timemodified');
                    break;
                case 'scorm':
                    $modulefields = array($module.'.timeopen', $module.'.timemodified');
                    break;
                case 'geogebra':
                    $modulefields = array($module.'.timeavailable', $module.'.timedue', $module.'.timecreated', $module.'.timemodified');
                    break;
                case 'quiz':
                case 'hotpot':
                    $modulefields = array($module.'.timeopen', $module.'.timeclose', $module.'.timecreated', $module.'.timemodified');
                    break;
                case 'jclic':
                case 'qv':
                    $modulefields = array($module.'.timeavailable', $module.'.timedue');
                    break;
                case 'questionnaire':
                    $modulefields = array($module.'.opendate', $module.'.closedate', $module.'.timemodified');
                    break;
                case 'data':
                    $modulefields = array($module.'.timeavailablefrom', $module.'.timeavailableto', $module.'.timeviewfrom', $module.'.timeviewto', $module.'.assesstimestart',
                                        $module.'.assesstimefinish');
                    break;
                case 'glossary':
                    $modulefields = array($module.'.timecreated', $module.'.timemodified', $module.'.assesstimestart', $module.'.assesstimefinish');
                    break;
                case 'eoicampus':
                    // Nothing to add
                    break;
                case 'resource':
                case 'folder':
                case 'page':
                case 'url':
                case 'forum':
                case 'workshop':
                case 'imscp':
                case 'journal':
                default:
                    $modulefields = array($module.'.timemodified');
                    break;
            }
            // Always add course and name
            $tablefields = array_merge($tablefields, array($module.'.course', $module.'.name'));
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
