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
 * Strings for component 'block_gismo', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   block_gismo
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = 'About Gismo';
$string['about_gismo'] = 'About GISMO';
$string['accesses'] = 'Accesses';
$string['accesses_tooltip'] = 'accesses';
$string['actions_on'] = 'Actions on';
$string['activities'] = 'Activities';
$string['assignments'] = 'Assignments';
$string['assignments22'] = 'Assignments 2.2';
$string['assignments22_chart_title'] = 'Activities: assignments 2.2 overview';
$string['assignments_chart_title'] = 'Activities: assignments overview';
$string['authors'] = 'Authors';
$string['cancel'] = 'Cancel';
$string['chats'] = 'Chats';
$string['chats_chart_title'] = 'Activities: chats overview';
$string['chats_over_time'] = 'Chats over time';
$string['chats_over_time_chart_title'] = 'Activities: contributions to chats over time';
$string['chats_ud_chart_title'] = 'Activities: student details on chats';
$string['close'] = 'Close';
$string['completion'] = 'Completion';
$string['completion_assignment22_chart_title'] = 'Assignments 2.2 completions';
$string['completion_assignment22_menu'] = 'Assignments 2.2';
$string['completion_assignment_chart_title'] = 'Assignments completions';
$string['completion_assignment_menu'] = 'Assignments';
$string['completion_chat_chart_title'] = 'Chats completions';
$string['completion_chat_menu'] = 'Chats';
$string['completion_completed_on_tooltip'] = 'Completed on';
$string['completion_completed_on_tooltip_months'] = '[\'Jan\',\'Feb\',\'Mar\',\'Apr\',\'May\',\'Jun\',\'Jul\',\'Aug\',\'Sep\',\'Oct\',\'Nov\',\'Dec\']';
$string['completion_forum_chart_title'] = 'Forums completions';
$string['completion_forum_menu'] = 'Forums';
$string['completion_quiz_chart_title'] = 'Quizzes completions';
$string['completion_quiz_menu'] = 'Quizzes';
$string['completion_resource_chart_title'] = 'Resources completions';
$string['completion_resource_menu'] = 'Resources';
$string['completion_wiki_chart_title'] = 'Wikis completions';
$string['completion_wiki_menu'] = 'Wikis';
$string['confirm_exiting'] = 'Do you really want to exit Gismo?';
$string['contact_us'] = 'Please feel free to contact authors for questions or for reporting bugs at the following addresses:';
$string['date'] = 'Date';
$string['debug_mode'] = 'Debug mode';
$string['debug_modedesc'] = 'If set to true, debug messages will be displayed during Gismo data export process.';
$string['debug_mode_false'] = 'Disabled';
$string['debug_mode_true'] = 'Enabled';
$string['detail_resources'] = 'Details on resources';
$string['details'] = 'Details';
$string['detail_show'] = 'Show details';
$string['err_access_denied'] = 'You are not authorized to perform this action.';
$string['err_authentication'] = 'You are not authenticated. It is possible that the moodle session has expired.<br /><br /><a href="">Login</a>';
$string['err_block_instance_id_not_set'] = 'Block instance id is not set!';
$string['err_cannot_extract_data'] = 'Cannot extract data from server!';
$string['err_course_not_set'] = 'Course id is not set!';
$string['err_missing_course_students'] = 'Cannot extract course students!';
$string['err_missing_data'] = 'Cannot proceed with the analysis beacuse there isn\'t any data to work on!';
$string['err_missing_parameters'] = 'One or more required parameters are missing!';
$string['err_no_data'] = 'No data';
$string['err_srv_data_not_set'] = 'One or more required parameters are missing!';
$string['err_unknown'] = 'Unknown error!';
$string['exit'] = 'Exit';
$string['exportalllogs'] = 'Export all logs';
$string['export_chart_as_image'] = 'Export chart as image';
$string['exportcourselogs'] = 'Export only courses with block gismo';
$string['export_data_hours_from_last_run'] = 'Delay (hours) before next data export process execution';
$string['export_data_hours_from_last_rundesc'] = 'Gismo data export process can be re-executed only after X hours, setting this time too low can create performance problems.<br /> Please don\'t change it if you don\'t know what you are doing.';
$string['export_data_limit_records'] = 'Limit Records in SQL queries';
$string['export_data_limit_recordsdesc'] = 'Limit the number of records selected for each query during data export (in GISMOdata_manager.php).
<br /> Please don\'t change it if you don\'t know what you are doing.';
$string['export_data_run_inf'] = 'Run Gismo data export from';
$string['export_data_run_infdesc'] = 'Execute Gismo data export only from this time.<br /> This setting must be lower then export_data_run_sup.';
$string['export_data_run_sup'] = 'Run Gismo data export until';
$string['export_data_run_supdesc'] = 'Don\'t execute gismo data export after this time.<br /> This setting must be higher then export_data_run_inf.';
$string['exportlogs'] = 'Export logs';
$string['exportlogsdesc'] = 'Export all logs: this option creates Gismo logs from all courses in the moodle platform, this creates a lot of records in gismo database tables, but data is immediately available when Gismo block is placed in a course.<br /> Export only courses with block gismo: Export only the courses that have a block gismo, if you select this option the Gismo data of the course will be available only after several hours you place a Gismo block in a course.';
$string['exportlogs_missing'] = 'Missing exportlogs parameter';
$string['exportlogs_missingcourselogs'] = 'Log analysis process runs on fixed hours, usually at nighttime. Your course data will be available within 24 hours';
$string['file'] = 'File';
$string['forums'] = 'Forums';
$string['forums_chart_title'] = 'Activities: forums overview';
$string['forums_over_time'] = 'Forums over time';
$string['forums_over_time_chart_title'] = 'Activities: contributions to forums over time';
$string['forums_ud_chart_title'] = 'Activities: student details on forums';
$string['from'] = 'From';
$string['gismo'] = 'Gismo';
$string['gismo:addinstance'] = 'Add new gismo block';
$string['gismo_help'] = '<p>Gismo works on those courses that meet the following requirements:</p><ul><li>there is at least one student enrolled to the course</li><li>there is at least one instance of one of the following modules:<ul><li>Resources</li><li>Assignments</li><li>Quizzes</li></ul></li></ul>';
$string['gismo_report_launch'] = 'Reporting Tool';
$string['gismo:trackteacher'] = 'Gismo Teacher';
$string['gismo:trackuser'] = 'Gismo Student';
$string['gismo_version'] = 'Version';
$string['gismo_version_value'] = '3.2';
$string['gismo:view'] = 'GISMO - Authorization failed';
$string['help'] = 'Help';
$string['help_docs'] = 'Short overview';
$string['hide_menu'] = 'Hide menu';
$string['home'] = 'Gismo home';
$string['homepage_chart_activities_assignments_overview'] = 'Activities: assignments overview';
$string['homepage_chart_resources_access_overview'] = 'Resources: accesses overview';
$string['homepage_chart_resources_students_overview'] = 'Resources: students overview';
$string['homepage_charts_preview_title'] = 'Charts preview';
$string['homepage_chart_students_accesses_by_students'] = 'Students: accesses by students';
$string['homepage_chart_students_access_overview'] = 'Students: accesses overview';
$string['homepage_chart_students_access_overview_on_resources'] = 'Students: accesses overview on resources';
$string['homepage_processing_data'] = 'Processing data';
$string['homepage_processing_data_wait'] = 'Processing data, please wait!';
$string['homepage_text'] = 'GISMO is a graphical interactive student monitoring and tracking system tool that extracts tracking data from the Moodle Course Management System. It generates also useful graphical representations that can be explored by course instructors and students to get an overview of the learning activities.<br />
Please select one of the menus on the top of this page to start using GISMO.<br />
If you would like to have a look at the tutorial please click on the menu "Help"> "Tutorial".';
$string['homepage_title'] = 'Welcome to GISMO';
$string['info_text'] = '<p>To customize the chart you can select/unselect items from enabled menus.</p>";
        message += "<p>Instructions</p>";
        message += "<ul style=\'list-style-position: inside;\'>";
        message += "<li>Main Checkbox: select/unselect all list items.</li>";
        message += "<li>Item Click: select/unselect the clicked item.</li>";
        message += "<li>Item Alt+Click: select only the clicked item</li>";
        message += "<li><img src=\'images/eye.png\'> show item details</li>";
        message += "</ul>';
$string['info_title'] = 'GISMO - Lists';
$string['intro_information_about_gismo'] = 'Information about this release is reported below:';
$string['items'] = 'ITEMS';
$string['list'] = 'list';
$string['manualexportpassword'] = 'Manual export password';
$string['manualexportpassworddesc'] = 'This means that the export_data.php script cannot be run from a web browser without supplying the password using the following form of URL:<br /><br />http://site.example.com/blocks/gismo/lib/gismo/server_side/export_data.php?password=something<br /><br />If this is left empty, no password is required.';
$string['manualexportpassworderror'] = 'GISMO manual export password missing or wrong';
$string['menu_hide'] = 'Hide menu';
$string['menu_show'] = 'Show menu';
$string['no_chart_at_the_moment'] = 'There isn\'t any chart at the moment!';
$string['nr_submissions'] = 'Number of submissions';
$string['option_axes_label_max_length'] = 'Axes label max length (characters)';
$string['option_axes_label_max_offset'] = 'Axes label max offset (characters)';
$string['option_base_color'] = 'Base color';
$string['option_blue'] = 'Blue';
$string['option_chart_settings'] = 'Chart settings';
$string['option_general_settings'] = 'General settings';
$string['option_green'] = 'Green';
$string['option_include_hidden_items'] = 'Include hidden items';
$string['option_intro'] = 'This section let you customize specific applications options.';
$string['option_number_of_colors'] = 'Number of colors (matrix charts)';
$string['option_other_settings'] = 'Other settings';
$string['option_red'] = 'Red';
$string['options'] = 'Options';
$string['option_window_resize_delay_seconds'] = 'Window resize delay (seconds)';
$string['page_title'] = 'Gismo -';
$string['pluginname'] = 'Gismo';
$string['print'] = 'Print';
$string['processing_wait'] = 'Processing data, please wait!';
$string['quizzes'] = 'Quizzes';
$string['quizzes_chart_title'] = 'Activities: quizzes overview';
$string['release_date'] = 'Release date';
$string['release_date_value'] = '2013-10-15';
$string['resources'] = 'Resources';
$string['resources_access_detail_chart_title'] = 'Resources: resource details on students';
$string['resources_access_overview'] = 'Accesses overview';
$string['resources_access_overview_chart_title'] = 'Resources: accesses overview';
$string['resources_students_overview'] = 'Students overview';
$string['resources_students_overview_chart_title'] = 'Resources: students overview';
$string['save'] = 'Save';
$string['show'] = 'Show';
$string['show_details'] = 'Show details';
$string['show_menu'] = 'Show menu';
$string['student_accesses'] = 'Accesses by students';
$string['student_accesses_chart_title'] = 'Students: accesses by students';
$string['student_accesses_overview'] = 'Accesses overview';
$string['student_accesses_overview_chart_title'] = 'Students: accesses overview';
$string['student_reporting'] = 'Students reporting';
$string['student_reporting_desc'] = 'If enabled students will be able to see their logs';
$string['student_reporting_disabled'] = 'Disabled';
$string['student_reporting_enabled'] = 'Enabled';
$string['student_resources_details_chart_title'] = 'Students: student details on resources';
$string['student_resources_overview'] = 'Accesses overview on resources';
$string['student_resources_overview_chart_title'] = 'Students: accesses overview on resources';
$string['students'] = 'Students';
$string['teachers'] = 'teachers';
$string['timeline'] = 'Timeline';
$string['to'] = 'To';
$string['tutorial'] = 'Tutorial';
$string['users'] = 'users';
$string['welcome'] = 'Welcome to GISMO v. 3.2';
$string['wikis'] = 'Wikis';
$string['wikis_chart_title'] = 'Activities: wikis overview';
$string['wikis_over_time'] = 'Wikis over time';
$string['wikis_over_time_chart_title'] = 'Activities: contributions to wikis over time';
$string['wikis_ud_chart_title'] = 'Activities: student details on wikis';
