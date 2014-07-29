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
 * Strings for component 'block_livemood', language 'en', branch 'MOODLE_22_STABLE'
 *
 * @package   block_livemood
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['description'] = '<p style="text-align:left; width:80%">
	In order to use Live-Mood plugin you need to open an Organization account (<b>only one account with only one Moodle user with Manager role</b>).
	Once registered, fill the field below with the Manager secret key you received by email. Click save changes so you are ready to use Live-Mood plugin block.<br/>
	Every Moodle user with Teacher role is free to subscribe or not to Live-Mood plugin block.<br/>
	Every Moodle user with Student or guest role is free to signup directly from the Live-Mood block<br/>
	(Live-Mood plugin detects user roles only with default role id)<br/><br/>
	<b>You have to create first a class at Live-Mood website as Teacher and insert desired students.</b>
	Your organization is automatically registrered on <a href="http://www.live-moodle.net" target="_blank">Live-Mood</a> dedicated education search engine.<br/>
	(refer to instructions on your Live-Mood account)
	</p>';
$string['pluginname'] = 'Live-Mood';
$string['settingheader'] = 'Live-Mood settings';
$string['skey'] = 'Manager Secret Key';
