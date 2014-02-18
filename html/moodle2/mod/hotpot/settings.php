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
 * The hotpot module configuration variables
 *
 * The values defined here are often used as defaults for all module instances.
 *
 * @package   mod-hotpot
 * @copyright 2010 Gordon Bateson <gordon.bateson@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// we need hotpot/lib.php for the callback validation functions
require_once($CFG->dirroot.'/mod/hotpot/lib.php');
require_once($CFG->dirroot.'/mod/hotpot/locallib.php');

// admin_setting_xxx classes are defined in "lib/adminlib.php"
// new admin_setting_configcheckbox($name, $visiblename, $description, $defaultsetting);

// show Quizports on MyMoodle page (default=1)
$settings->add(
    new admin_setting_configcheckbox('hotpot_enablemymoodle', get_string('enablemymoodle', 'hotpot'), get_string('configenablemymoodle', 'hotpot'), 1)
);

// enable caching of browser content for each quiz (default=1)
$str = get_string('clearcache', 'hotpot');
$url = new moodle_url('/mod/hotpot/utilities/clear_cache.php', array('sesskey' => sesskey()));
$link = html_writer::link($url, $str, array('class' => 'small', 'style'=> 'white-space: nowrap', 'onclick' => "this.target='_blank'"))."\n";
$settings->add(
    new admin_setting_configcheckbox('hotpot_enablecache', get_string('enablecache', 'hotpot'), get_string('configenablecache', 'hotpot').' '.$link, 1)
);

// restrict cron job to certain hours of the day (default=never)
$timezone = get_user_timezone_offset();
if (abs($timezone) > 13) {
    $timezone = 0;
} else if ($timezone>0) {
    $timezone = $timezone - 24;
}
$options = array();
for ($i=0; $i<=23; $i++) {
    $options[($i - $timezone) % 24] = gmdate('H:i', $i * HOURSECS);
}
$settings->add(
    new admin_setting_configmultiselect('hotpot_enablecron', get_string('enablecron', 'hotpot'), get_string('configenablecron', 'hotpot'), array(), $options)
);

// enable embedding of swf media objects inhotpot quizzes (default=1)
$settings->add(
    new admin_setting_configcheckbox('hotpot_enableswf', get_string('enableswf', 'hotpot'), get_string('configenableswf', 'hotpot'), 1)
);

// enable obfuscation of javascript in html files (default=1)
$settings->add(
    new admin_setting_configcheckbox('hotpot_enableobfuscate', get_string('enableobfuscate', 'hotpot'), get_string('configenableobfuscate', 'hotpot'), 1)
);

$options = array(
    hotpot::BODYSTYLES_BACKGROUND => get_string('bodystylesbackground', 'hotpot'),
    hotpot::BODYSTYLES_COLOR      => get_string('bodystylescolor', 'hotpot'),
    hotpot::BODYSTYLES_FONT       => get_string('bodystylesfont', 'hotpot'),
    hotpot::BODYSTYLES_MARGIN     => get_string('bodystylesmargin', 'hotpot')
);
$settings->add(
    new admin_setting_configmultiselect('hotpot_bodystyles', get_string('bodystyles', 'hotpot'), get_string('configbodystyles', 'hotpot'), array(), $options)
);

// hotpot navigation frame height (default=85)
$settings->add(
    new admin_setting_configtext('hotpot_frameheight', get_string('frameheight', 'hotpot'), get_string('configframeheight', 'hotpot'), 85, PARAM_INT, 4)
);

// lock hotpot navigation frame so it is not scrollable (default=0)
$settings->add(
    new admin_setting_configcheckbox('hotpot_lockframe', get_string('lockframe', 'hotpot'), get_string('configlockframe', 'hotpot'), 0)
);

// store raw xml details of HotPot quiz attempts (default=1)
$str = get_string('cleardetails', 'hotpot');
$url = new moodle_url('/mod/hotpot/utilities/clear_details.php', array('sesskey' => sesskey()));
$link = html_writer::link($url, $str, array('class' => 'small', 'style'=> 'white-space: nowrap', 'onclick' => "this.target='_blank'"))."\n";
$settings->add(
    new admin_setting_configcheckbox('hotpot_storedetails', get_string('storedetails', 'hotpot'), get_string('configstoredetails', 'hotpot').' '.$link, 0)
);

// maximum duration of a single calendar event (default=5 mins)
$setting = new admin_setting_configtext('hotpot_maxeventlength', get_string('maxeventlength', 'hotpot'), get_string('configmaxeventlength', 'hotpot'), 5, PARAM_INT, 4);
$setting->set_updatedcallback('hotpot_refresh_events');
$settings->add($setting);

unset($i, $link, $options, $setting, $str, $timezone, $url);
