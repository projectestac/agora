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
 * Strings for component 'repository_skydrive', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_skydrive
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['configplugin'] = 'Microsoft Skydrive konfigurieren';
$string['oauthinfo'] = '<p>Für dieses Plugin muss Ihre Site auf <a href="https://manage.dev.live.com/Applications/Index">bei Microsoft</a> registriert werden.<p>Als Teil der Registrierung ist die folgende URL als \'Redirect domain\' einzugeben:</p><p>{$a->callbackurl}</p>Nach der Registrierung erhalten Sie eine Client ID und einen Secret, der hier eingetragen werden muss.</p>';
$string['pluginname'] = 'Microsoft Skydrive';
$string['secret'] = 'Kennwort';
$string['skydrive:view'] = 'Skydrive anzeigen';
