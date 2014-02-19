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
 * Strings for component 'block_case_repository', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_case_repository
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activity_age'] = 'Age range';
$string['activity_age_level'] = '(in years)';
$string['activity_difficulty'] = 'Difficulty';
$string['activity_difficulty_level1'] = 'very easy';
$string['activity_difficulty_level2'] = 'easy';
$string['activity_difficulty_level3'] = 'average';
$string['activity_difficulty_level4'] = 'more difficult';
$string['activity_difficulty_level5'] = 'hard';
$string['activity_id'] = 'ID';
$string['activity_language'] = 'Language';
$string['activity_learningstyle_input'] = 'Presentation';
$string['activity_learningstyle_input_level1'] = 'mostly visual';
$string['activity_learningstyle_input_level2'] = 'rather visual than verbal';
$string['activity_learningstyle_input_level3'] = 'mixed equally';
$string['activity_learningstyle_input_level4'] = 'rather verbal than visual';
$string['activity_learningstyle_input_level5'] = 'mostly verbal';
$string['activity_learningstyle_organization'] = 'Organization';
$string['activity_learningstyle_organization_level1'] = 'mostly deductive';
$string['activity_learningstyle_organization_level2'] = 'rather deductive than inductive';
$string['activity_learningstyle_organization_level3'] = 'mixed equally';
$string['activity_learningstyle_organization_level4'] = 'rather inductive than deductive';
$string['activity_learningstyle_organization_level5'] = 'mostly inductive';
$string['activity_learningstyle_perception'] = 'Content';
$string['activity_learningstyle_perception_level1'] = 'concrete';
$string['activity_learningstyle_perception_level2'] = 'rather concrete tha abstract';
$string['activity_learningstyle_perception_level3'] = 'both equal';
$string['activity_learningstyle_perception_level4'] = 'rather abstract than concrete';
$string['activity_learningstyle_perception_level5'] = 'abstract';
$string['activity_learningstyle_perspective'] = 'Perspective';
$string['activity_learningstyle_perspective_level1'] = 'mostly sequential';
$string['activity_learningstyle_perspective_level2'] = 'rather sequential than global';
$string['activity_learningstyle_perspective_level3'] = 'mixed equally';
$string['activity_learningstyle_perspective_level4'] = 'rather global than sequential';
$string['activity_learningstyle_perspective_level5'] = 'mostly global';
$string['activity_learningstyle_processing'] = 'Interactivity type';
$string['activity_learningstyle_processing_level1'] = 'active';
$string['activity_learningstyle_processing_level2'] = 'rather active than expositive';
$string['activity_learningstyle_processing_level3'] = 'both equal';
$string['activity_learningstyle_processing_level4'] = 'rather expositive than active';
$string['activity_learningstyle_processing_level5'] = 'expositive';
$string['activity_learning_time'] = 'Expected learning time';
$string['activity_learning_time_level'] = '(in hours)';
$string['activity_linguistic_requirement'] = 'Liguistic demands';
$string['activity_linguistic_requirement_level1'] = 'very low';
$string['activity_linguistic_requirement_level2'] = 'low';
$string['activity_linguistic_requirement_level3'] = 'average';
$string['activity_linguistic_requirement_level4'] = 'high';
$string['activity_linguistic_requirement_level5'] = 'very high';
$string['activity_logical_requirement'] = 'Mathematical-logical demands';
$string['activity_logical_requirement_level1'] = 'very low';
$string['activity_logical_requirement_level2'] = 'low';
$string['activity_logical_requirement_level3'] = 'average';
$string['activity_logical_requirement_level4'] = 'high';
$string['activity_logical_requirement_level5'] = 'very high';
$string['activity_module'] = 'Activity module';
$string['activity_social_requirement'] = 'Learning mode';
$string['activity_social_requirement_level1'] = 'independent';
$string['activity_social_requirement_level2'] = 'rather independent than collaborative';
$string['activity_social_requirement_level3'] = 'mixed';
$string['activity_social_requirement_level4'] = 'collaborative';
$string['activity_social_requirement_level5'] = 'group work';
$string['appliance'] = 'Appliance';
$string['apply_metadata_presets'] = 'Apply metadata default values';
$string['apply_presets'] = 'By filling activity metadata all current metadata values for all learning activities of this course will be reset to the default values.';
$string['apply_presets_question'] = 'Should the activity metadata be filled out?';
$string['button_dependencies'] = 'Show/hide learning activities that are dependent on this learning activity';
$string['button_dependent_on'] = 'Show/hide main learning activities that this learning activity is dependent from';
$string['button_details'] = 'Show/hide details for this learning activity';
$string['button_metadata'] = 'Show/hide metadata for this learning activity';
$string['capability_no_store'] = 'No new cases will be created for your input in learner adaptation because your user account is not in a learner role.';
$string['case_repository'] = 'iLMS Case Repository';
$string['case_repository:apply_metadata_presets'] = 'Set predefined values to metadata';
$string['case_repository:store'] = 'Store user behavior to database';
$string['case_repository:view_dependencies'] = 'Show relations between activities';
$string['colgroup_currentactivity'] = 'Current learning activity metadata';
$string['config_action_adjust'] = 'Adjust solution';
$string['config_action_reject'] = 'Reject case';
$string['config_description_adjust'] = 'With these rules you can configure the adjustment settings for learner adaptation. All rules are applied one after the other.<br/>The rules consist of a condition and an action. When a condition is true, the action of the rule is executed. Conditions are based on comparison calculations between attribute values and consist of a condition type, a limit when the condition is assumed to be true and a reference attribute that the current attribute value is compared with. Actions consist of the type of action to be executed and (in the case of an parameter adjustment) of the strength of adjustment to be made.';
$string['config_description_adjust2'] = '<p>The following condition types can be chosen:</p><dl><dt>(never):</dt> <dd>There is no rule defined for this attribute. All other values set for this attribute are ignored.</dd><dt>Value lesser than:</dt> <dd>The difference between the two attriute values is calculated. The difference mus be negative and lesser than the given limit to meet the condition. That meens the value of the reference case is smaller than the value of the current case minus the given limit.</dd><dt>Value greater than:</dt> <dd>The difference between the two attriute values is calculated. The difference is positive and greater than the given limit to meet the condition. That means the attribute value of the reference case is greater than the value of the current case plus the given limit.</dd><dt>Difference greater than:</dt> <dd>The difference between the two attriute values is calculated. The sign is ignored. The absolute value of the difference is greater than the given limit to meet the condition. In other words the attribute value of the reference case can differ from the value of the current case about the given limit.</dd></dl><p>The following comparison attribute types can be chosen:</p><dl><dt>Learner metadata</dt> <dd>The comparison is made between the preferences of the current learner and the preferences of the learner in the reference case.</dd><dt>Learning activity metadata:</dt> <dd>The comparison is made between the preferences of the current learner and a metadata attribute of the solution learning activity in the reference case.</dd></dl><p>The following actions can be chosen:</p><dl><dt>Reject case:</dt> <dd>If the condition is met the reference case is rejected because it is assumed to be unsuitable. It is ignored for the further calculations to determine the best adaptation solution.</dd><dt>Adjust solution:</dt> <dd>If the condition is met the case is assumed to be partially suitable. It might be offered to the learner by the system as an solution but the relevance is reduced by the given adjustment <cite>strength</cite> value (required!). Here, 0.3 means an reduction of 30 percent of the original value so that 70 percent of the original relevance will be remaining at the end. You can enter any numerical value between 0.0 and 1.0.</dd></dl>';
$string['config_description_adjust_checkbox'] = 'You can turn on case adjustment for the learner adaptation to improve the reasoning results by checking this box. This will slightly increase the amount of time needed to display the adaptive course structure.';
$string['config_description_casecompare'] = 'The case compare weight factors are used in the comparison between current and reference cases to specify in which degree the similarity of subordinate attributes or attriute groups is regarded to calculate the similarity of higher attribute groups or cases.<br/><br/>You can enter numeric values in the range of 0.0 and 1.0. A value of 0.05 for example means that an attribute is regarded with the importance of 5 percent along with the other attributes of an attribute group. Therefore the sum of all weights of an attribute group or of a case <em>must be equal to 1.0</em> (or 100 percent).<br/>Because a case consist of attribute groups and the attribute groups consists of attributes not only the directly entered attribute weight factor but also the indirectly entered group weight factor can be responsible for the affective weights of the attribute (here: attribute groups <cite>learner attributes</cite> and <cite>activity metadata</cite>).';
$string['config_description_case_count'] = 'This positive number specifies the maximum count of cases to be stored in the case repository (default 1000). Unimportant cases are replaced when this limit is reached to get free space for new cases to be stored.<br/>Be careful with changing this value: If too many cases are stored in the case repository calculations for learner adaptation will take a long time because a large amount cases must be retrieved to get a solution. If few cases are stored in the case repository the quality of learner adaptation may be not as good as desired because there will be not free space to store appropriate solutions.';
$string['config_description_defaults'] = 'By default all activity metadata values are empty for all courses/activities.<br/>Here you can define your own activity metadata defaults for each activity module. Activity metadata values are preset with these defaults when an activity is created and still can be changes for single learning activities later.';
$string['config_description_half_value_time'] = 'The half-value time for logical certainty specifies how strong the certainty in a given learner preference value will decrease over time or how strong the logical uncertainty will grow. The given period is a value in SI seconds. After this period the certainty is only as high as the half of its original value.<br/>If the half-value time is 31557600 SI seconds (exactly 1 year) for example and the original attribute value has had a certainty of 80 percent the certainty will have decreased to 40 percent within the first year. After another year it will has decreased another time to 20 percent.';
$string['config_description_leak_limit'] = 'This value specifies the limit when the logical certainty has decreased in an amount that an learner preference value should be removed from the database due to its high logical uncertainty.<br/>A value of 0.1 for example specifies that the value will be deleted when the remaining certainty has reached 10 percent. This means with a half-value time of 1 year a value will be removed after a period of approximately 3 years and 4 months after the original determination of the value.';
$string['config_description_replace'] = 'This value (between 0.0 and 1.0, default 0.9) specifies when two very similar cases can be merged to one case. A limit of 0.95 means for example that two cases with a similarity of 95 percent (or more) can be merged together to save storage space in the case repository.';
$string['config_description_yellow_markup'] = 'This value (between 0.0 and 1.0, default 0.6) specifies when alternate activities (with yellow rhombus-shaped markers) are offered to the learners.<br/> A value of 0.6 specifies for example that the current case should have a similarity of 60 percent with the found reference case to be offered as an alternate activity.';
$string['config_difftype_diff'] = 'Difference greater than';
$string['config_difftype_greater_than'] = 'Value greater than';
$string['config_difftype_lesser_than'] = 'Value lesser than';
$string['config_difftype_none'] = '(never)';
$string['config_header_preset'] = 'Define activity metadata presets';
$string['config_legend_action'] = 'Adjustment action';
$string['config_legend_adjust'] = 'Case parameter adjustments';
$string['config_legend_autoadjust'] = 'Automatic adjustment of learner attributes';
$string['config_legend_compareto'] = 'Compare to';
$string['config_legend_defaults'] = 'Activity metadata defaults';
$string['config_legend_difftype'] = 'Condition';
$string['config_legend_general'] = 'General limits';
$string['config_legend_limit'] = 'Limit';
$string['config_legend_similarity'] = 'Weights for case compare';
$string['config_legend_strength'] = 'Strength';
$string['config_save_preset'] = 'Save preset for this module';
$string['config_submit'] = 'Save changes';
$string['config_submit_success'] = 'New configuration settings have been saved.';
$string['configure_metadata_presets'] = 'Configure default values for metadata';
$string['config_windowheader_preset'] = 'Presets for activity metadata';
$string['count_records'] = 'records found.';
$string['description_alternate_activities'] = 'Here are some alternate activites which can be also visited.';
$string['description_editing'] = 'This page displays all learning activities in editing mode to be modified and rearranged.<br/>Later, in presentation mode they will be grouped by iLMS statistics. In this way some hint can be given to each student to visit learning activities specialized for their personal abilities and pfererences.';
$string['description_last_activity'] = 'You have visited the following activity the last time. It can be continued or repeated.';
$string['description_recommended_activities'] = 'The following learning activities can be visited next.<br/>In the past learners with preferences and abilities similar to yours were successful by choosing activities with the green star-shaped marker.';
$string['description_startup'] = 'You can pick one of the following activitites to start the course.';
$string['details_unknown'] = 'No details available for this activity.';
$string['edit_button_add'] = 'Add';
$string['edit_button_delete'] = 'Delete';
$string['edit_button_modify'] = 'Modify';
$string['edit_button_save_changes'] = 'Save changes';
$string['edit_continue'] = 'Continue ...';
$string['edit_presets'] = 'View&nbsp;/ modify metadata presets for activity modules';
$string['ENABLE_REUSE_ADJUSTMENTS'] = 'Enable case parameter adjustment';
$string['error_invalid_activity'] = 'Invalid learning activity ID.<br/>The properties of the learning activity cannot be modified because a learning activity with this ID does not exist in the current course.';
$string['error_invalid_course'] = 'Invalid course ID.<br/>The properties of this course cannot be displayed or modified because the selected course does not exists.';
$string['error_invalid_sql_add'] = 'SQL database error while adding the new attribute';
$string['error_invalid_sql_delete'] = 'SQL database error while delete the chosen attribute';
$string['error_invalid_sql_set'] = 'SQL database error while modifying the current attribute';
$string['error_invalid_user'] = 'Invalid user ID.<br/>The properties of this course cannot be modified because the modifying user does not exist.';
$string['feedback_difficulty_level1'] = 'I didn\'t understand almost anything';
$string['feedback_difficulty_level2'] = 'This activity was difficult';
$string['feedback_difficulty_level3'] = 'The difficulty was okay';
$string['feedback_difficulty_level4'] = 'This acticity was easy';
$string['feedback_difficulty_level5'] = 'I already know this &ndash; it was boring';
$string['feedback_learningstyle_input_high'] = 'Ich vermisse eine ausführliche Diskussion des Themas';
$string['feedback_learningstyle_input_low'] = 'Mir fehlen Grafiken und Diagramme zur Erläuterung';
$string['feedback_learningstyle_organization_high'] = 'Ich hätte zur Verdeutlichung der Zusammenhänge gern ein paar Beispiele';
$string['feedback_learningstyle_organization_low'] = 'Ich hätte zur Einführung zuerst gern ein paar Beispiele';
$string['feedback_learningstyle_perception_high'] = 'Auf die generellen Zusammenhänge wird zu wenig eingegangen';
$string['feedback_learningstyle_perception_low'] = 'Some conrete examples are missing';
$string['feedback_learningstyle_perspective_high'] = 'Mir fehlt die Betrachtung von Anwendungen und Alternativen';
$string['feedback_learningstyle_perspective_low'] = 'In der Darstellung vermisse ich den Überblick';
$string['feedback_learningstyle_processing_high'] = 'Die selbständig zu bearbeitenden Aufgaben fallen mir schwer';
$string['feedback_learningstyle_processing_low'] = 'I would like to have more interactive tasks';
$string['feedback_linguistic_requirement_high'] = 'Das Niveau des Texts ist mir zu einfach/trivial';
$string['feedback_linguistic_requirement_low'] = 'Der Text könnte einfacher, knapper und verständlicher sein';
$string['feedback_logical_requirement_high'] = 'Ich fand die Zusammenhänge unlogisch';
$string['feedback_logical_requirement_high2'] = 'Eine kurze Darstellung in Formeln fände ich besser';
$string['feedback_logical_requirement_low'] = 'Der logische Aufbau war mir zu komplex';
$string['feedback_logical_requirement_low2'] = 'Die mathematischen Berechnungen fielen mir schwer';
$string['feedback_none'] = 'I have no special remarks';
$string['feedback_social_requirement_high'] = 'I enjoyed the group work';
$string['feedback_social_requirement_low'] = 'I could hardly work together with other group members';
$string['footer'] = '';
$string['formatilms'] = 'Adaptive iLMS Course';
$string['HALF_VALUE_TIME'] = 'Half-value time for logic certainty (in SI seconds)';
$string['header_results'] = 'Cases found';
$string['header_searchform'] = 'Search criteria / filters';
$string['headline_alternate_activities'] = 'Alternate activities';
$string['headline_dependency_table'] = 'Semantic dependency table';
$string['headline_editing'] = 'Learning activities (Editing mode)';
$string['headline_last_activity'] = 'Last visited activity';
$string['headline_recommended_activities'] = 'Next learning activities';
$string['headline_startup'] = 'Startup activitites';
$string['headline_unavailable_activities'] = 'Unavailable activities';
$string['horizontal'] = 'horizontal';
$string['ILMS_YELLOW_MARKUP_LIMIT'] = 'Limit for yellow (rhombus-shaped) marker';
$string['label_dependency_type'] = 'Type of dependency';
$string['label_source_activity'] = 'Main activity';
$string['label_target_activity'] = 'Dependent activity';
$string['LEAK_LIMIT'] = 'Leak limit for logic certainty';
$string['legend_activity_meta'] = 'Learning activity metadata';
$string['legend_appliance'] = 'Case appliance';
$string['legend_dependency_add'] = 'Add new dependent activity';
$string['legend_dependent_on_add'] = 'Add new main activity';
$string['legend_history'] = 'Visited learning activities';
$string['legend_semantic_net'] = 'Semantic relations';
$string['legend_solution'] = 'Solution';
$string['legend_usermeta'] = 'Learner metadata';
$string['markup2_bad'] = 'This learning content should be processed in few cases only';
$string['markup2_good'] = 'This learning content should be processed next';
$string['markup2_medium'] = 'This learning content can be also processed';
$string['markup2_unknown'] = 'There is no case information about this learning activity stored at the moment therefore iLMS adaptation module cannot decide whether this activity is suitable or not suitable for you.';
$string['markup_bad'] = 'Unsuitable activity';
$string['markup_good'] = 'Recommended activity';
$string['markup_medium'] = 'Suitable activity';
$string['markup_unknown'] = 'Unknown';
$string['MAX_ILMS_CASE_COUNT'] = 'Maximum case count in case repository';
$string['menu_case_repository'] = 'Case repository';
$string['menu_dependencies'] = 'Semantic Dependencies';
$string['menu_info'] = 'iLMS Documentation';
$string['more_records'] = 'Too many records found for the given query which cannot all be displayed at the same time. Please enter more concrete parameters for your query to find other records.';
$string['nameilms'] = 'Section';
$string['no_dependencies'] = 'No dependent activities found for this learning activity.';
$string['no_dependent_on'] = 'No main activities found depending on this learning activity.';
$string['panel_dependencies'] = 'Dependent activities';
$string['panel_dependent_on'] = 'Related main activities';
$string['panel_details'] = 'Details';
$string['panel_metadata'] = 'Metadata';
$string['pluginname'] = 'Learner adaptation';
$string['relation_anwendung'] = 'is an application for';
$string['relation_bautauf'] = 'extends';
$string['relation_beispiel'] = 'is an example for';
$string['relation_erlaeutert'] = 'explains';
$string['relation_exkurs'] = 'is additional to';
$string['relation_fasstzusammen'] = 'summarizes';
$string['relation_illustriert'] = 'is an illustration for';
$string['relation_prueft'] = 'is a test for';
$string['relation_querverweis'] = 'is linked with';
$string['relation_setztvoraus'] = 'requires';
$string['relation_vertieft'] = 'goes into detail for';
$string['relation_wiederholt'] = 'repeats';
$string['REPLACE_CASE_APPLIANCE_LIMIT'] = 'Appliance limit for reusing (replacing) cases';
$string['REPLACE_CASE_SIMILARITY_LIMIT'] = 'Similarity limit for reusing (replacing) cases';
$string['search_max'] = 'and';
$string['search_min'] = 'Between';
$string['state_complete'] = 'complete';
$string['state_incomplete'] = 'incomplete';
$string['state_not_attempted'] = 'not attempted';
$string['submit'] = 'Search cases';
$string['time_visited'] = 'Last access';
$string['type_state'] = 'State';
$string['used_count'] = 'Relevance count';
$string['usermeta_empty'] = '<p>You have not entered your personal learning preferences yet.<br/>Use the <cite><em>Learner preferences</em></cite> standard block to specify your personal abilities, aims and preferences. Using these preferences the system will be able to offer you a personalized course structure.</p>';
$string['usermeta_empty_headline'] = 'Your personal preferences have not been set';
$string['usermeta_feedback'] = '<p></p>';
$string['usermeta_feedback_headline'] = 'Submit your opinion';
$string['usermeta_feedback_submit'] = 'Submit!';
$string['usermeta_update'] = '<p>Your personal preferences should be updated to optimize the structure of this course for you.</p>';
$string['usermeta_update_headline'] = 'Your personal preferences are out of date';
$string['value_unknown'] = 'No value available';
$string['vertical'] = 'vertical';
$string['WEIGHT_FACTOR_ACTIVITYMETA'] = 'Cases: Weight for activity metadata';
$string['WEIGHT_FACTOR_CURRENT_ACTIVITY'] = 'Cases: Weight for identity of the current activity';
$string['WEIGHT_FACTOR_FOLLOW_RELATIONS'] = 'Cases: Weight for semantic relations';
$string['WEIGHT_FACTOR_HISTORY'] = 'Cases: Weight for history';
$string['WEIGHT_FACTOR_LEARNERMETA'] = 'Cases: Weight for learner attributes';
$string['WEIGHT_FACTOR_STATES'] = 'Cases: Weight for activity states';
$string['WEIGHTS_ACTIVITYMETA'] = 'Activity metadata: Weight for';
$string['WEIGHTS_LEARNERMETA'] = 'Lerner attributes: Weight for';
