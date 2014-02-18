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
 * Strings for component 'auth_pwdexp', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_pwdexp
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_expirationdays'] = 'Number of days after which the password needs to expire.';
$string['auth_expirationdays_key'] = 'Expirationdays';
$string['auth_pwdexpdescription'] = 'This authenticator checks if the password of the user needs to exipire.<br/>If so it will set the flag to force the account to change it\'s password and redirect to the given URL.<br/><br/>Be sure to save these settings at least once and after each change.';
$string['auth_pwdexptitle'] = 'Password Expiration Check';
$string['auth_redirecturl'] = 'URL to redirect to when password has expired.';
$string['auth_redirecturl_key'] = 'Redirect URL';
$string['auth_server_settings'] = 'Password expiration check settings';
$string['pluginname'] = 'Password Expiration Check';
