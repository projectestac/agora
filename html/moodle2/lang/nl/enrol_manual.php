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
 * Strings for component 'enrol_manual', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Wijzig status';
$string['altertimeend'] = 'Wijzig eindtijd';
$string['altertimestart'] = 'Wijzig starttijd';
$string['assignrole'] = 'Rol toewijzen';
$string['confirmbulkdeleteenrolment'] = 'Wil je echt deze gebruikersaanmeldingen verwijderen?';
$string['defaultperiod'] = 'Standaard aanmeldingsduur';
$string['defaultperiod_desc'] = 'Standaard tijdsduur waarvoor de aanmelding geldig is. Indien ingesteld op 0, dan wordt de aanmeldingsduur automatisch onbeperkt.';
$string['defaultperiod_help'] = 'Standaard tijdsduur waarvoor de aanmelding geldig is, vanaf het moment waarop de gebruiker is aangemeld. Indien uitgeschakeld, dan wordt de aanmeldingsduur automatisch onbeperkt.';
$string['deleteselectedusers'] = 'Verwijder gebruikersaanmeldingen';
$string['editselectedusers'] = 'Bewerk geselecteerde gebruikersaanmelding';
$string['enrolledincourserole'] = 'Aangemeld in "{$a->course}" als "{$a->role}"';
$string['enrolusers'] = 'Gebruikers aanmelden';
$string['expiredaction'] = 'Actie bij vervallen aanmelding';
$string['expiredaction_help'] = 'Selecteer een uit te voeren actie wanneer de aanmelding van een gebruiker vervalt. Merk op dat sommige gebruikersgegevens en instellingen gewist zullen worden tijdens het afmelden van de cursus.';
$string['expirymessageenrolledbody'] = 'Beste {$a->user},

Je aanmelding in cursus \'{$a->course}\' gaat vervallen op {$a->timeend}.

Als je hier een probleem mee hebt, neem dan contact op met {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Melding voor het vervallen van de aanmelding';
$string['expirymessageenrollerbody'] = 'De aanmelding in cursus  \'{$a->course}\' zal binnen {$a->threshold} vervallen voor volgende gebruikers:

{$a->users}

Ga naar  {$a->extendurl} om hun aanmelding te verlengen.';
$string['expirymessageenrollersubject'] = 'Melding voor het vervallen van de aanmelding';
$string['manual:config'] = 'Maneel aanmelden van gebruikers configureren';
$string['manual:enrol'] = 'Gebruikers aanmelden';
$string['manual:manage'] = 'Beheer gebruikersaanmeldingen';
$string['manual:unenrol'] = 'Gebruikers van de cursus afmelden';
$string['manual:unenrolself'] = 'Zichzelf van de cursus afmelden';
$string['messageprovider:expiry_notification'] = 'Manuele meldingen voor het vervallen van de aanmelding';
$string['pluginname'] = 'Manuele aanmeldingen';
$string['pluginname_desc'] = 'Met de manuele aanmeldingsplugin kunnen gebruikers manueel aangemeld worden via een link in het cursusbeheer door een gebruiker met de juiste rechten, zoals een leraar. Deze plugin moet ingeschakeld zijn, vermits ook andere aanmeldingsplugins, zoals zelf aanmelden, dit vereisen.';
$string['status'] = 'Manuele aanmeldingen inschakelen';
$string['status_desc'] = 'Toegang tot de cursus toestaan voor intern aangemelde gebruikers. Dit moet meestal ingeschakeld blijven.';
$string['statusdisabled'] = 'Uitgeschakeld';
$string['statusenabled'] = 'Ingeschakeld';
$string['status_help'] = 'Deze instelling bepaalt of gebruikers manueel aangemeld kunnen worden via een link in de cursus instellingen door een gebruiker met voldoende rechten, zoals een leraar.';
$string['unenrol'] = 'Gebruiker afmelden';
$string['unenrolselectedusers'] = 'Geselecteerde gebruikers afmelden';
$string['unenrolselfconfirm'] = 'Wil je echt jezelf afmelden van cursus "{$a}"?';
$string['unenroluser'] = 'Wil je echt gebruiker "{$a->user}" van cursus "{$a->course}" afmelden?';
$string['unenrolusers'] = 'Gebruikers afmelden';
$string['wscannotenrol'] = 'Deze plugin kan een gebruiker niet manueel toevoegen aan de cursus id = {$a->courseid}';
$string['wsnoinstance'] = 'Manuele aanmeldingsplugin bestaat niet of werd uitgeschakeld voor de cursus (id = {$a->courseid})';
$string['wsusercannotassign'] = 'Je hebt geen toestemming om deze rol ({$a->roleid}) toe te wijzen aan deze gebruiker ({$a->userid}) in deze cursus ({$a->courseid}).';
