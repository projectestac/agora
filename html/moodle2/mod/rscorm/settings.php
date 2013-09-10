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

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot . '/mod/rscorm/locallib.php');
    $yesno = array(0 => get_string('no'),
                   1 => get_string('yes'));

    //default display settings
    $settings->add(new admin_setting_heading('rscorm/displaysettings', get_string('defaultdisplaysettings', 'rscorm'), ''));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/displaycoursestructure',
        get_string('displaycoursestructure', 'rscorm'), get_string('displaycoursestructuredesc', 'rscorm'),
        array('value' => 0, 'adv' => false), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/popup',
        get_string('display', 'rscorm'), get_string('displaydesc', 'rscorm'),
        array('value' => 0, 'adv' => false), rscorm_get_popup_display_array()));

    $settings->add(new admin_setting_configtext_with_advanced('rscorm/framewidth',
        get_string('width', 'rscorm'), get_string('framewidth', 'rscorm'),
        array('value' => '100', 'adv' => true)));

    $settings->add(new admin_setting_configtext_with_advanced('rscorm/frameheight',
        get_string('height', 'rscorm'), get_string('frameheight', 'rscorm'),
        array('value' => '500', 'adv' => true)));

    $settings->add(new admin_setting_configcheckbox('rscorm/winoptgrp_adv',
         get_string('optionsadv', 'rscorm'), get_string('optionsadv_desc', 'rscorm'), 1));

    foreach (rscorm_get_popup_options_array() as $key => $value) {
        $settings->add(new admin_setting_configcheckbox('rscorm/'.$key,
            get_string($key, 'rscorm'), '', $value));
    }

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/skipview',
        get_string('skipview', 'rscorm'), get_string('skipviewdesc', 'rscorm'),
        array('value' => 0, 'adv' => true), rscorm_get_skip_view_array()));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/hidebrowse',
        get_string('hidebrowse', 'rscorm'), get_string('hidebrowsedesc', 'rscorm'),
        array('value' => 0, 'adv' => true), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/hidetoc',
        get_string('hidetoc', 'rscorm'), get_string('hidetocdesc', 'rscorm'),
        array('value' => 0, 'adv' => true), rscorm_get_hidetoc_array()));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/hidenav',
        get_string('hidenav', 'rscorm'), get_string('hidenavdesc', 'rscorm'),
        array('value' => 0, 'adv' => false), $yesno));


    //default grade settings
    $settings->add(new admin_setting_heading('rscorm/gradesettings', get_string('defaultgradesettings', 'rscorm'), ''));
    $settings->add(new admin_setting_configselect_with_advanced('rscorm/grademethod',
        get_string('grademethod', 'rscorm'), get_string('grademethoddesc', 'rscorm'),
        array('value' => RGRADEHIGHEST, 'adv' => false), rscorm_get_grade_method_array()));

    for ($i=0; $i<=100; $i++) {
        $grades[$i] = "$i";
    }

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/maxgrade',
        get_string('maximumgrade'), get_string('maximumgradedesc', 'rscorm'),
        array('value' => 100, 'adv' => false), $grades));

    $settings->add(new admin_setting_heading('rscorm/othersettings', get_string('defaultothersettings', 'rscorm'), ''));

    //default attempts settings.
    $settings->add(new admin_setting_configselect_with_advanced('rscorm/maxattempt',
        get_string('maximumattempts', 'rscorm'), '',
        array('value' => '0', 'adv' => false), rscorm_get_attempts_array()));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/whatgrade',
        get_string('whatgrade', 'rscorm'), get_string('whatgradedesc', 'rscorm'),
        array('value' => RHIGHESTATTEMPT, 'adv' => false), rscorm_get_what_grade_array()));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/displayattemptstatus',
        get_string('displayattemptstatus', 'rscorm'), get_string('displayattemptstatusdesc', 'rscorm'),
        array('value' => 1, 'adv' => false), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/forcecompleted',
        get_string('forcecompleted', 'rscorm'), get_string('forcecompleteddesc', 'rscorm'),
        array('value' => 0, 'adv' => true), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/forcenewattempt',
        get_string('forcenewattempt', 'rscorm'), get_string('forcenewattemptdesc', 'rscorm'),
        array('value' => 0, 'adv' => true), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/lastattemptlock',
        get_string('lastattemptlock', 'rscorm'), get_string('lastattemptlockdesc', 'rscorm'),
        array('value' => 0, 'adv' => true), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/auto',
        get_string('autocontinue', 'rscorm'), get_string('autocontinuedesc', 'rscorm'),
        array('value' => 0, 'adv' => true), $yesno));

    $settings->add(new admin_setting_configselect_with_advanced('rscorm/updatefreq',
        get_string('updatefreq', 'rscorm'), get_string('updatefreqdesc', 'rscorm'),
        array('value' => 0, 'adv' => true), rscorm_get_updatefreq_array()));

    //admin level settings.
    $settings->add(new admin_setting_heading('rscorm/adminsettings', get_string('adminsettings', 'rscorm'), ''));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowtypeexternal', get_string('allowtypeexternal', 'rscorm'), '', 0));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowtypelocalsync', get_string('allowtypelocalsync', 'rscorm'), '', 0));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowtypeimsrepository', get_string('allowtypeimsrepository', 'rscorm'), '', 0));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowtypeexternalaicc', get_string('allowtypeexternalaicc', 'rscorm'), get_string('allowtypeexternalaicc_desc', 'rscorm'), 0));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowaicchacp', get_string('allowtypeaicchacp', 'rscorm'), get_string('allowtypeaicchacp_desc', 'rscorm'), 0));

    $settings->add(new admin_setting_configtext('rscorm/aicchacptimeout',
        get_string('aicchacptimeout', 'rscorm'), get_string('aicchacptimeout_desc', 'rscorm'),
        30, PARAM_INT));

    $settings->add(new admin_setting_configtext('rscorm/aicchacpkeepsessiondata',
        get_string('aicchacpkeepsessiondata', 'rscorm'), get_string('aicchacpkeepsessiondata_desc', 'rscorm'),
        1, PARAM_INT));

    $settings->add(new admin_setting_configcheckbox('rscorm/forcejavascript', get_string('forcejavascript', 'rscorm'), get_string('forcejavascript_desc', 'rscorm'), 1));

    $settings->add(new admin_setting_configcheckbox('rscorm/allowapidebug', get_string('allowapidebug', 'rscorm'), '', 0));

    $settings->add(new admin_setting_configtext('rscorm/apidebugmask', get_string('apidebugmask', 'rscorm'), '', '.*'));
    //MARSUPIAL ********** AFEGIT - Avoid cross domain scripting scorm problem
    $settings->add(new admin_setting_configtext('rscorm_documentdomain', get_string('documentdomain', 'rscorm'), get_string('documentdomain', 'rscorm'), 'educat1x1.cat'));
    //********** FI
}
