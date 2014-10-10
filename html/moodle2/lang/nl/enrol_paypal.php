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
 * Strings for component 'enrol_paypal', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Wijs rol toe';
$string['businessemail'] = 'PayPal e-mail van onderneming';
$string['businessemail_desc'] = 'E-mail adres van de PayPal-account van je onderneming';
$string['cost'] = 'Aanmeldingsprijs';
$string['costerror'] = 'De aanmeldingsprijs is niet numeriek';
$string['costorkey'] = 'Kies één van volgende methodes voor aanmelding.';
$string['currency'] = 'Munteenheid';
$string['defaultrole'] = 'Standaard roltoewijzing';
$string['defaultrole_desc'] = 'Kies een rol die gebruikers krijgen wanneer zij via PayPal aanmelden';
$string['enrolenddate'] = 'Einddatum';
$string['enrolenddate_help'] = 'Indien ingeschakeld, kunnen gebruikers enkel tot deze datum worden aangemeld.';
$string['enrolenddaterror'] = 'De einddatum van aanmelding kan niet voorafgaan aan de startdatum.';
$string['enrolperiod'] = 'Aanmeldingsduur';
$string['enrolperiod_desc'] = 'Standaard tijdsduur waarin de aanmelding geldig is. Indien ingesteld op nul, wordt de duur van de aanmelding standaard onbeperkt.';
$string['enrolperiod_help'] = 'Tijdsduur dat de aanmelding geldig is, beginnend van het ogenblik dat de gebruiker aangemeld is. Indien uitgeschakeld zal de aanmeldingsperiode onbeperkt zijn.';
$string['enrolstartdate'] = 'Start datum';
$string['enrolstartdate_help'] = 'Indien ingeschakeld zullen gebruikers pasvanaf deze datum kunnen aangemeld worden.';
$string['expiredaction'] = 'Actie bij verlopen van de aanmelding';
$string['expiredaction_help'] = 'Kies een actie die moet gebeuren wanneer de aanmelding van een gebruiker verloopt. Merk op dat sommige gebruikersgegevens en instellingen worden verwijderd tijdens het afmelden uit een cursus.';
$string['mailadmins'] = 'Waarschuw beheerder';
$string['mailstudents'] = 'Waarschuw leerlingen';
$string['mailteachers'] = 'Waarschuw leraren';
$string['messageprovider:paypal_enrolment'] = 'Aanmeldingsberichten PayPal';
$string['nocost'] = 'Er zijn geen kosten verbonden aan lidmaatschap in deze cursus!';
$string['paypalaccepted'] = 'Paypal-betalingen aanvaard';
$string['paypal:config'] = 'Configureer PayPal aanmelding';
$string['paypal:manage'] = 'Beheer aangemelde gebruikers';
$string['paypal:unenrol'] = 'Gebruikers van deze cursus afmelden';
$string['paypal:unenrolself'] = 'Zelf van deze cursus afmelden';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'Met de PayPalmodule kun je betaalde cursussen opzetten. Als de prijs voor een cursus nul is, dan worden leerlingen niet gevraagd om te betalen voor de cursus. Er is een site-brede prijs die je kunt instellen als standaardprijs voor de hele site en dan een aparte prijs per cursus. De cursusprijs overschrijft de site prijs.';
$string['sendpaymentbutton'] = 'Stuur betaling via Paypal';
$string['status'] = 'PayPal aanmeldigen toestaan';
$string['status_desc'] = 'Laat gebruikers toe om standaard PayPal te gebruiken om lid te worden van een cursus.';
$string['unenrolselfconfirm'] = 'Wil je echt jezelf afmelden van cursus "{$a}"?';
