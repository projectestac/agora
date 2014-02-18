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
 * Strings for component 'alternative', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   alternative
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alternative'] = 'alternative';
$string['alternativename'] = 'Activity name';
$string['alternativeoptions'] = 'Options for this alternative';
$string['alternativeoptions_help'] = 'Each alternative shows the user several options.
These options are described in this form.
If the title is not set, the option will not be created (but will be deleted if it existed).
You can add new option with the button after these field sets.';
$string['changeallowed'] = 'Change allowed';
$string['changeallowed_help'] = 'If not checked, the user will not be able to change his choice.
Teachers, and all roles that have the capability `alternatives:forceregistration`, will be able to change the choice of anyone.';
$string['chooseteammembers'] = 'Please choose your team members';
$string['chooseuser'] = 'Please choose the user to register';
$string['csv'] = 'CSV Import';
$string['csv2ndfield'] = 'The 2nd field (places) should be numeric, with 0 = no limit.';
$string['csvbadfieldnb'] = 'Bad number of fields: {$a} instead of 4.';
$string['csv_help'] = 'Each line is composed of Title ; Places ; Date ; Description';
$string['csvunableopen'] = 'Unable to open CSV file.';
$string['datecomment'] = 'Date';
$string['datecomment_help'] = 'This field can contain any text, but it is meant for a date or a date interval.';
$string['displaycompact'] = 'Compact display';
$string['displaycompact_help'] = 'If not checked, each option will be displayed on several lines, with an explicit description.
	If checked, each option will be displayed on one line, with a folded description.';
$string['fieldsetcsv'] = 'Import options from CSV file';
$string['fieldsetmultiple'] = 'Settings for multiple registrations';
$string['fieldsetteam'] = 'Settings for teams';
$string['forceregister'] = 'Force registrations';
$string['groupdependent'] = 'Group dependent';
$string['groupdependent_help'] = 'If this box is checked, the text show to each user will depend on his group.';
$string['individual'] = 'Individual';
$string['instructionsforcereg'] = 'You can not register yourself but your role allows you to register students to any choice.';
$string['instructionsgeneral'] = '';
$string['instructionsmultiple'] = 'You must choose between {$a->multiplemin} and {$a->multiplemax} options.';
$string['instructionsmultiplenomax'] = 'You must choose at least {$a->multiplemin} options.';
$string['instructionsnochange'] = 'Once a choice is saved, changing it will not be allowed.';
$string['instructionsteam'] = 'You can register as a team. A team must have between {$a->teammin} and {$a->teammax} members.
As you registered other members of your team, you will be the team leader.';
$string['messageprovider:reminder'] = 'mod/alternative student reminder';
$string['modulename'] = 'Alternative';
$string['modulename_help'] = 'The alternative module allows students to register one or several choices in a given list.';
$string['modulenameplural'] = 'alternatives';
$string['multiple'] = 'Multiple';
$string['multipleenable'] = 'Enable these settings';
$string['multipleenable_help'] = 'Each user has to register several options, between the minimum and maximum values.';
$string['multiplemax'] = 'User max registrations';
$string['multiplemin'] = 'User min registrations';
$string['noselectedoption'] = 'You have to select an option';
$string['noselectedusers'] = 'No users selected';
$string['option'] = 'Option';
$string['optionintro'] = 'Description';
$string['optionname'] = 'Title';
$string['options'] = 'Options';
$string['places'] = 'Places';
$string['placesavail'] = 'Available places';
$string['pluginadministration'] = 'Alternative administration';
$string['pluginname'] = 'alternative';
$string['potentialteammembers'] = 'Potential team members';
$string['private'] = 'Private';
$string['public'] = 'Public';
$string['publicreg'] = 'Public registrations';
$string['publicreg_help'] = 'The registrations can be:<dl>
<dt>public</dt> <dd>shown to everyone,</dd>
<dt>public in the same group</dt> <dd>users see registrations of users that share at least a groupn</dd>
<dt>private</dt> <dd>shown only to power-users (teachers, etc).</dd>
</dl>';
$string['register'] = 'Register';
$string['registrationforbidden'] = 'You cannot register here.';
$string['registrations'] = 'Registrations';
$string['registrationsaved'] = 'Your registration choice was saved.';
$string['regteams'] = 'Registered teams';
$string['remains'] = 'Remains';
$string['reminderBefore'] = 'before [[AlterUntil]]';
$string['reminderFull'] = 'You must make a choice in the activity “[[AlterName]]”';
$string['reminderFullHtml'] = 'You must make a choice in the activity “<i>[[AlterName]]</i>”';
$string['reminderSmall'] = 'You must make a choice in the activity “[[AlterName]]”';
$string['reminderSubject'] = 'Reminder : you must choose among alternative options';
$string['sendReminder'] = 'Send reminder';
$string['separator'] = 'Separator';
$string['students'] = 'Students';
$string['synthesis'] = 'Synthesis';
$string['synthfree'] = 'Free';
$string['synthlimitplaces'] = 'Limited places options (individual)';
$string['synthlimitteamplaces'] = 'Limited places options (team)';
$string['synthplaces'] = 'Places (individual)';
$string['synthpotential'] = 'Potential students';
$string['synthregistered'] = 'Registered students';
$string['synthreserved'] = 'Reserved (among limited)';
$string['synthteamplaces'] = 'Places (team)';
$string['synthunlimitplaces'] = 'Unlimited places options (individual)';
$string['synthunlimitteamplaces'] = 'Unlimited places options (team)';
$string['synthunregistered'] = 'Unregistered students';
$string['team'] = 'Team';
$string['teamenable'] = 'Enable team settings';
$string['teamenable_help'] = 'Set the minimum and maximum sizes of teams.';
$string['teamleader'] = 'Team leader';
$string['teamleadernotamember'] = 'The team leader should not be a member of its team.';
$string['teammax'] = 'Max team size';
$string['teammin'] = 'Min team size';
$string['teamplaces'] = 'Team places';
$string['teamplacesavail'] = 'Available places for teams';
$string['teams'] = 'Teams';
$string['unique'] = 'Unique';
$string['unregister'] = 'Unregister';
$string['unregisterLeader'] = 'Beware: unregistering a leader will result in unregistering the whole team.';
$string['uploadoverwrites'] = 'Beware: uploading a new file deletes all previous registrations and options.';
$string['userinfo'] = 'Has registered to {$a} options.';
$string['usersnotreg'] = 'Unregistered users';
$string['usersreg'] = 'Registered users';
$string['viewallregistrations'] = 'View registrations';
$string['viewallusersnotreg'] = 'View unregistered users';
$string['viewallusersreg'] = 'View registered users';
$string['viewsynthesis'] = 'View synthesis';
$string['viewteams'] = 'View teams';
$string['wrongteamsize'] = 'The size of your team is not between the allowed bounds.';
