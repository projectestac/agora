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

        // Tables to be excluded of the form
        $excludedtables = array('bigdata_profiles', 'cohort', 'cohort_members', 'comments', 'enrol', 'enrol_flatfile', 'enrol_paypal', 'external_functions', 'external_services',
            'external_services_functions', 'files_reference', 'filter_active', 'filter_config', 'license', 'message', 'message_contacts', 'message_processors',
            'message_providers', 'message_read', 'message_working', 'mnet_application', 'mnet_host', 'mnet_host2service', 'mnet_log', 'mnet_remote_rpc', 'mnet_remote_service2rpc',
            'mnet_rpc', 'mnet_service', 'mnet_service2rpc', 'mnet_session', 'mnet_sso_access_control', 'mnetservice_enrol_courses', 'mnetservice_enrol_enrolments', 'my_pages',
            'oauth_access_tokens', 'oauth_authorization_codes', 'oauth_clients', 'oauth_jwt', 'oauth_public_keys', 'oauth_refresh_tokens', 'oauth_scopes', 'oauth_user_auth_scopes',
            'portfolio_instance', 'portfolio_instance_config', 'portfolio_instance_user', 'portfolio_log', 'portfolio_mahara_queue', 'portfolio_tempdata',  'profiling',
            'rcommon_publisher', 'rcommon_user_credentials', 'registration_hubs', 'repository', 'repository_instance_config', 'repository_instances', 'resource_old',
            'role_allow_assign', 'role_allow_override', 'role_allow_switch', 'role_capabilities', 'role_context_levels', 'role_names', 'role_sortorder',
            'rscorm', 'rscorm_scoes', 'rscorm_scoes_users', 'rscorm_scoes_data', 'rscorm_scoes_track', 'rscorm_seq_objective', 'rscorm_seq_mapinfo', 'rscorm_seq_ruleconds',
            'rscorm_seq_rulecond', 'rscorm_seq_rolluprule', 'rscorm_seq_rolluprulecond', 'rscorm_aicc_session', 'sessions', 'stats_daily', 'stats_monthly', 'stats_user_daily',
            'stats_user_monthly', 'stats_user_weekly', 'stats_weekly', 'timezone', 'tool_customlang', 'tool_customlang_components', 'upgrade_log', 'user', 'user_devices',
            'user_enrolments', 'user_info_category', 'user_info_data', 'user_info_field', 'user_lastaccess', 'user_password_resets', 'user_preferences', 'user_private_key',
            'webdav', 'log_queries');

        $excludedtablefields = array('log.info', 'files.author', 'files.contenthash', 'files.pathnamehash', 'files.filename', 'files.filepath');  // Tables.Fields to be excluded of the form
        foreach ($tables as $table) {
            if (in_array($table, $excludedtables)) {
                continue;
            }

            $columns = $DB->get_columns($table);
            $columnsclean = array();
            foreach ($columns as $key => $unused) {
                if ($key == 'id') {
                    continue;
                }
                $tablefield = $table.'.'.$key;

                if (in_array($tablefield, $excludedtablefields)) {
                    continue;
                }

                $columnsclean[$tablefield] = $key;
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
        $mform->addGroup($durationarr, 'durationarr', get_string('periodicity', 'local_bigdata'), array(' '), false);
        $mform->setDefault('periodicity', 1);
        $mform->setType('periodicity', PARAM_INT);
        $mform->setDefault('periodicity_unit', 'D');
        $mform->addHelpButton('durationarr', 'periodicity', 'local_bigdata');
        $mform->disabledIf('periodicity', 'periodicity_unit', 'eq', '');


        $this->add_action_buttons(true);
    }
}
