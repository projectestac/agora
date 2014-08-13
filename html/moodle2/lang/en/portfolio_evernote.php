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
 * Strings for component 'portfolio_evernote', language 'en', branch 'MOODLE_25_STABLE'
 *
 * @package   portfolio_evernote
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['consumerkey'] = 'Consumer Key';
$string['customnotetitlelabel'] = 'Export Note Title';
$string['defaultnotetitle'] = 'Moodle Portfolio Export';
$string['denotedefaultnotebook'] = '{$a} (Default)';
$string['denotestack'] = '(Stack: {$a})';
$string['errorcreatingnotebook'] = 'Error while creating notebook';
$string['errorlistingnotebook'] = 'Error while listing notebooks from your account';
$string['evernoteusernamestring'] = 'Evernote Username';
$string['failedlistingnotebooks'] = 'Failed to list Evernote notebooks.';
$string['failedtocreatenote'] = 'Failed to create Evernote note.';
$string['failedtoken'] = 'Unable to get Token from the current Customer key and Secret';
$string['fileexportstatement'] = 'The export file has been attached.';
$string['improperkey'] = 'Wrong Evernote API Customer Key or Secret';
$string['nooauthcredentials'] = 'OAuth credentials (Evernote API Consumer key and Secret) required.';
$string['nooauthcredentials_help'] = 'To use the Evernote portfolio plugin you must configure OAuth credentials in the portfolio settings.';
$string['nooauthfromuser'] = 'The Evernote user did not authorize the temporary credentials';
$string['nooauthtoken'] = 'An authentication token has not been recieved from Evernote. Please ensure you are allowing the application to access your Evernote account';
$string['nopermission'] = 'Access to Evernote account declined.';
$string['nosessiontoken'] = 'A session token does not exist preventing export to Evernote.';
$string['notebooklabel'] = 'Notebook';
$string['notetagslabel'] = 'Note tags (Comma separated)';
$string['oauthinfo'] = '<p>To use this plugin, you must get an Evernote API key</p>';
$string['pluginname'] = 'Evernote';
$string['requesttokenfailed'] = 'Failed to get the Evernote token from the current settings. Please check the Evernote Key and secret.';
$string['secret'] = 'Consumer Secret';
$string['selectnotebooklabel'] = 'Select Notebook';
$string['sendfailed'] = 'The file {$a} failed to transfer to Evernote';
$string['signinanother'] = 'Not you? Reset your settings and cancel the export.';
$string['tokencredentialsfailed'] = 'Failed to obtain token credentials.';
$string['usedevapi'] = 'Use testing server';
$string['usedevapi_info'] = 'If you have just <a href="http://dev.evernote.com/">requested a key</a> from Evernote, it will require some time before it is available on their production servers. Therefore you can enable this option and create an account <a href="https://sandbox.evernote.com">here</a> to test the plugin.';
