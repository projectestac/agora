<?php

require_once($CFG->dirroot . '/course/moodleform_mod.php');

class bigdata_profile_form extends moodleform {

    function definition() {
        global $DB;

        $mform =& $this->_form;

        $mform->addElement('text', 'name', get_string('name'), array('size' => '30'));
        $mform->addRule('name', get_string('required'), 'required', 'client', null, false, true);
        $mform->setType('name', PARAM_TEXT);

        $categories = $DB->get_records('course_categories', null, 'id', 'id, name, parent');
        $courses = $DB->get_records('course', null, 'category, fullname, id', 'id, category, fullname');
        $courseselector = array();
        foreach ($courses as $course) {
            $catid = $course->category;
            if ($catid == 0) {
                $catname = get_string('site');
            } else {
                $catname = $categories[$catid]->name;
                $catid = $categories[$catid]->parent;

                while ($catid > 0) {
                    $catname .= '/'.$categories[$catid]->name;
                    $catid = $categories[$catid]->parent;
                }
            }

            if (!isset($courseselector[$catname])) {
                $courseselector[$catname] = array();
            }
            $courseselector[$catname][$course->id] = $course->fullname;
        }

        $coursessel = $mform->addElement('selectgroups', 'courses', get_string('courses', 'local_bigdata'), $courseselector, array('style' => 'height:180px'));
        $coursessel->setMultiple(true);
        $mform->addHelpButton('courses', 'courses', 'local_bigdata');

        $allroles = array();
        if ($roles = get_all_roles()) {
            foreach ($roles as $role) {
                $rolename = strip_tags(format_string($role->name, true));
                if (empty($rolename)) {
                    $rolename = strip_tags(format_string($role->shortname, true));
                }
                $allroles[$role->id] = $rolename;
            }
        }
        $rolessel = $mform->addElement('select', 'roles', get_string('roles', 'local_bigdata'), $allroles, array('style' => 'height:180px'));
        $rolessel->setMultiple(true);
        $mform->addHelpButton('roles', 'roles', 'local_bigdata');

        $mform->addElement('textarea', 'excludedusers', get_string('excludedusers', 'local_bigdata'));
        $mform->addHelpButton('excludedusers', 'excludedusers', 'local_bigdata');
        $mform->setType('periodicity', PARAM_TEXT);

        $tables = $DB->get_tables();
        $tablefields = array();
        ksort($tables);
        foreach ($tables as $table) {
            if ($table == 'user') {
                continue;
            }

            $columns = $DB->get_columns($table);
            $columnsclean = array();
            foreach ($columns as $key => $unused) {
                if ($key == 'id') {
                    continue;
                }
                $columnsclean[$table.'.'.$key] = $key;
            }
            $tablefields[$table] = $columnsclean;
        }

        $tablefieldssel = $mform->addElement('selectgroups', 'tablefields', get_string('tablefields', 'local_bigdata'), $tablefields, array('style' => 'height:180px'));
        $tablefieldssel->setMultiple(true);
        $mform->addHelpButton('tablefields', 'tablefields', 'local_bigdata');

        $units = array (
                '' => get_string('never'),
                'D' => get_string('days'),
                'W' => get_string('weeks'),
                'M' => get_string('months')
                );

        $durationarr = array();
        $durationarr[] =& $mform->createElement('text', 'periodicity', '');
        $durationarr[] =& $mform->createElement('select', 'periodicity_unit', '', $units);
        $mform->addGroup($durationarr, 'durationarr', get_string('periodicity', 'local_bigdata').' [not implemented]', array(' '), false);
        $mform->setDefault('periodicity', 1);
        $mform->setType('periodicity', PARAM_INT);
        $mform->setDefault('periodicity_unit', 'D');
        $mform->addHelpButton('durationarr', 'periodicity', 'local_bigdata');
        $mform->disabledIf('periodicity', 'periodicity_unit', 'eq', '');


        $this->add_action_buttons(true);
    }
}
