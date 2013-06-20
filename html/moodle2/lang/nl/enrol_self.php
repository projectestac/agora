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
 * Strings for component 'enrol_self', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'Enkel de leden van site-groep \'{$a}\' kunnen zelf aanmelden';
$string['cohortonly'] = 'Enkel site-groepsleden';
$string['cohortonly_help'] = 'Zelf aanmelden kan beperkt worden tot leden van een specifieke site-groep. Merk op dat het wijizgen van deze instelling geen effect heeft op bestaande aanmeldingen.';
$string['customwelcomemessage'] = 'Aangepaste welkomstboodschap';
$string['customwelcomemessage_help'] = 'Een aangepast welkomstbericht dat toegevoegd kan worden als tekst of als Moodle-auto-opmaak, met HTML-tags en multilang-tags.

Volgende plaatshouders kunnen gebruikt worden in het bericht:

* Cursusnaam {$a->coursename}
* Link naar profielpagina van de gebruiker {$a->profileurl}';
$string['defaultrole'] = 'Standaard roltoewijzing';
$string['defaultrole_desc'] = 'Kies de rol die moet toegewezen worden tijdens zelf aanmelden';
$string['editenrolment'] = 'Bewerk aanmelding';
$string['enrolenddate'] = 'Einddatum';
$string['enrolenddate_help'] = 'Indien ingeschakeld kunnen nieuwe gebruikers zich slechts aanmelden tot deze datum';
$string['enrolenddaterror'] = 'De einddatum van de aanmelding in je cursus kan niet voor de startdatum zijn';
$string['enrolme'] = 'Laat me in de cursus';
$string['enrolperiod'] = 'Aanmeldingsduur';
$string['enrolperiod_desc'] = 'Standaard tijdsduur van de geldigheid van de aanmelding. Indien 0, dan zal de aanmelding onbeperkt gelden.';
$string['enrolperiod_help'] = 'Tijdsduur hoelang de aanmelding geldig is, beginnend van wanneer de gebruiker zich aanmeld. Indien uitgeschakeld zal de aanmelding onbeperkt zijn.';
$string['enrolstartdate'] = 'Startdatum';
$string['enrolstartdate_help'] = 'Indien ingeschakeld kunnen gebruikers zich slechts vanaf deze datum aanmelden.';
$string['expiredaction'] = 'Actie bij vervallen cursus';
$string['expiredaction_help'] = 'Selecteer een uit te voeren actie wanneer de aanmelding van een gebruiker vervalt. Merk op dat sommige gebruikersgegevens en instellingen gewist zullen worden tijdens het afmelden van de cursus.';
$string['expirymessageenrolledbody'] = 'Beste {$a->user},

We laten je weten dat je aanmelding in cursus \' {$a->course}\' zal verlopen op  {$a->timeend}.

Als je hulp nodig hebt, neem dan contact op met  {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Melding van vervallen zelfaanmelding';
$string['expirymessageenrollerbody'] = 'Zelf aanmelden in cursus \'{$a->course}\' zal vervallen volgende {$a->threshold} voor volgende gebruikers:

{$a->users}

Ga naar {$a->extendurl} om hun aanmelding te verlengen';
$string['expirymessageenrollersubject'] = 'Melding van vervallen zelfaanmelding';
$string['groupkey'] = 'Gebruik sleutels voor groepsaanmelding';
$string['groupkey_desc'] = 'Gebruik sleutels voor groepsaanmelding als standaardinstelling';
$string['groupkey_help'] = 'Het gebruik van een groepsaanmeldingssleutel zal de toegang tot de cursus niet alleen beperken tot diegenen die de sleutel kennen, maar de leerlingen zullen ook ingedeeld worden in hun juiste groep.

Om een groepsaanmeldingssleutel te kunnen gebruiken, moet er een aanmeldingssleutel opgegeven worden, zowel in  \'Aanmeldingsbeheer\', \'Zelf aanmelden\' als in de instellingen van de groep.';
$string['longtimenosee'] = 'Afmelden indien langer inactief dan';
$string['longtimenosee_help'] = 'Als gebruikers een cursus een lange tijd niet meer bezocht hebben, dan worden ze automatisch afgemeld. Deze parameter bepaalt deze limiet';
$string['maxenrolled'] = 'Maxi aangemelde gebruikers';
$string['maxenrolled_help'] = 'Bepaalt het maximale aantal gebruikers dat zich kunnen aanmelden in de cursus. 0 betekent geen limiet.';
$string['maxenrolledreached'] = 'Maximale aantal gebruikers die zich mogen aanmelden was al bereikt.';
$string['messageprovider:expiry_notification'] = 'Meldingen van vervallen zelfaanmelding';
$string['nopassword'] = 'Geen aanmeldingssleutel nodig';
$string['password'] = 'Aanmeldingssleutel';
$string['password_help'] = 'Een aanmeldingssleutel beperkt de toegang tot een cursus tot diegenen die de sleutel kennen.

Indien de sleutel leeg gelaten wordt, kan elke gebruiker zich aanmelden in de cursus.

Indien een sleutel opgegeven wordt, dan zal elke gebruiker die de cursus wil binnen gaan de sleutel moeten geven. Merk op dat een gebruiker de sleutel slechts één keer moet opgeven, namelijk wanneer de gebruiker zich aanmeld bij de cursus.';
$string['passwordinvalid'] = 'Je sleutel is fout - probeer nog eens';
$string['passwordinvalidhint'] = 'Die \'Cursussleutel\' was niet correct. Probeer het nog eens.<br />
(Hier een hint: Hij begint met \'{$a}\')';
$string['pluginname'] = 'Zelf aanmelden';
$string['pluginname_desc'] = 'De zelf aanmelden-plugin maakt het voor gebruikers mogelijk te kiezen in welke cursussen ze gaan deelnemen. De cursussen kunnen beschermd zijn door een cursussleutel. Intern wordt de aanmelding gedaan via de manuele aanmeldingsplugin die moet ingeschakeld zijn in dezelfde cursus.';
$string['requirepassword'] = 'Aanmeldingssleutel vereist';
$string['requirepassword_desc'] = 'Vereis aanmeldingssleutel voor nieuwe cursussen en verhinder het verwijderen van de sleutel bij bestaande cursussen';
$string['role'] = 'Standaard toegewezen rol';
$string['self:config'] = 'Beheer zelf aanmeldinginstanties';
$string['self:manage'] = 'Beheer aangemelde gebruikers';
$string['self:unenrol'] = 'Gebruikers afmelden van de cursus';
$string['self:unenrolself'] = 'Jezelf afmelden van de cursus';
$string['sendcoursewelcomemessage'] = 'Stuur welkomstboodschap voor cursus';
$string['sendcoursewelcomemessage_help'] = 'Indien ingeschakeld zullen gebruikers een welkomstboodschap via e-mail krijgen wanneer zij zichzelf aanmelden bij een cursus.';
$string['showhint'] = 'Toon hint';
$string['showhint_desc'] = 'Toon de eerste letter van de gast toegangssleutel';
$string['status'] = 'Zelf aanmelden toestaan';
$string['status_desc'] = 'Gebruikers standaard toestaan zichzelf aan te melden in een cursus';
$string['status_help'] = 'Deze instelling bepaalt of een gebruiker zich kan aanmelden (en afmelden als ze de juiste rechten hebben) bij een cursus.';
$string['unenrol'] = 'Gebruiker afmelden';
$string['unenrolselfconfirm'] = 'Wil je jezelf echt afmelden van cursus "{$a}"?';
$string['unenroluser'] = 'Wil je echt gebruiker "{$a->user}" van cursus "{$a->course}"?';
$string['usepasswordpolicy'] = 'Gebruik wachtwoordbeleid';
$string['usepasswordpolicy_desc'] = 'Gebruik standaard wachtwoordbeleid voor aanmeldingssleutels';
$string['welcometocourse'] = 'Welkom bij {$a}';
$string['welcometocoursetext'] = 'Welkom bij {$a->coursename}!

Eén van de eerste dingen die je zou moeten doen is het invullen van je gebruikersprofiel, zodat we wat meer over jou te weten kunnen komen:

{$a->profileurl}';
