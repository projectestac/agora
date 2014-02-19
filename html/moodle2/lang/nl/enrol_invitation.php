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
 * Strings for component 'enrol_invitation', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_invitation
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Voeg rol toe.';
$string['cannotsendmoreinvitationfortoday'] = 'U hebt vandaag geen uitnodigingen meer over. Probeer het later nog eens';
$string['defaultrole'] = 'Standaard rol';
$string['defaultrole_desc'] = 'Selecteer de rol waarin gebruikers moeten worden toegevoegd met uitnodigingen';
$string['editenrolment'] = 'Wijzig aanmelding';
$string['emailaddressnumber'] = 'E-mail adres {$a}';
$string['emailmessageinvitation'] = '{$a->managername} heeft u uitgenodigd om de cursus {$a->fullname} te volgen.


Om deze cursus te volgen klik je op de link  {$a->enrolurl}.


Als je nog geen account hebt dien je deze nog aan aan te maken op de site {$a->sitename}


Succes

-----------------------------


{$a->siteurl}';
$string['emailmessageuserenrolled'] = '{$a->userfullname} is aangemeld in {$a->coursefullname}.


Klik op de link  {$a->courseenrolledusersurl} om de aanmeldingen te controleren.


{$a->sitename}

-------------

{$a->siteurl}';
$string['emailssent'] = 'E-mail(-s) zijn verzonden.';
$string['emailtitleinvitation'] = 'U bent uitgenodigd voor de cursus : {$a->fullname}';
$string['emailtitleuserenrolled'] = '{$a->userfullname} is aangemeld in {$a->coursefullname}.';
$string['enrolenddate'] = 'Eind datum';
$string['enrolenddate_help'] = 'Als aangevinkt kunnen gebruikers alleen tot en met deze datum aanmelden.';
$string['enrolenddaterror'] = 'De aanmelddatum kan niet eerder zijn dan de startdatum';
$string['enrolperiod'] = 'Aanmeld tijd.';
$string['enrolperiod_desc'] = 'Standaard aanmeld tijd in seconden. Als dit nul is zal de geldigheidheid standaard oneindig zijn.';
$string['enrolperiod_help'] = 'Tijdsduur dat de aanmelding geldig is, startend vanaf het moment dat de gebruiker is aangemeld. Als uitgezet is deze tijd oneindig.';
$string['enrolstartdate'] = 'Startdatum';
$string['enrolstartdate_help'] = 'Als aangevinkt kunnen gebruikers alleen vanaf deze datum aanmelden.';
$string['expiredtoken'] = 'Ongeldig token - u bent niet aangemeld.';
$string['invitationpagehelp'] = '<ul><li>U hebt nog {$a} uitnodiging(-(en) over voor vandaag. </li><li>Elke uitnodiging is uniek en verloopt wanneer deze is gebruikt.</li></ul>';
$string['inviteusers'] = 'Nodig gebruikers uit.';
$string['maxinviteerror'] = 'Dit moet een nummer zijn.';
$string['maxinviteperday'] = 'Maximum uitnodigingen per dag.';
$string['maxinviteperday_help'] = 'Maximum aantal uitnodigingen dat per dag verzonden kan worden voor deze cursus.';
$string['noinvitationinstanceset'] = 'Er is geen uitnodigings aanmelding gevonden. Voeg een uitnodigings aanmelding toe aan je cursus.';
$string['nopermissiontosendinvitation'] = 'Geen rechten om uitnodigingen te sturen.';
$string['pluginname'] = 'Uitnodiging';
$string['pluginname_desc'] = 'De uitnodigings module verstuurt per e-mail uitnodigingen. Deze uitnodigingen kunnen slechts éénmaal worden gebruikt. Gebruikers die de link gebruiken worden automatisch aangemeld.';
$string['status'] = 'Sta uitnodigingen toe.';
$string['status_desc'] = 'Sta  gebruikers toe om uitnodigingen te sturen.';
$string['unenrol'] = 'Schrijf gebruiker uit.';
$string['unenrolselfconfirm'] = 'Wil je je echt uitschrijven uit cursus "{$a}"';
$string['unenroluser'] = 'Wil je echt gebruiker "{$a->user}" uitschrijven uit cursus "{$a->course}"?';
