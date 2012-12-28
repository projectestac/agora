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
 * Strings for component 'enrol_paypal', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Rolle zuordnen';
$string['businessemail'] = 'Geschäftliche E-Mail-Adresse für PayPal';
$string['businessemail_desc'] = 'E-Mail-Adresse für Ihr geschäftliches PayPal-Konto';
$string['cost'] = 'Teilnahmegebühr';
$string['costerror'] = 'Die Teilnahmegebühr muss eine Zahl sein.';
$string['costorkey'] = 'Wählen Sie eines der folgenden Kurs-Anmeldeverfahren.';
$string['currency'] = 'Währung';
$string['defaultrole'] = 'Rolle im Kurs';
$string['defaultrole_desc'] = 'Wählen Sie die Rolle aus, die bei der PayPal-Einschreibung zugewiesen werden soll';
$string['enrolenddate'] = 'Einschreibebeginn';
$string['enrolenddate_help'] = 'Wenn diese Option aktiviert ist, können Nutzer/innen nur bis zu diesem Zeitpunkt eingeschrieben werden.';
$string['enrolenddaterror'] = 'Der Endzeitpunkt für die Einschreibung kann nicht vor dem Startzeitpunkt liegen.';
$string['enrolperiod'] = 'Teilnahmedauer';
$string['enrolperiod_desc'] = 'Vorgabe zur Teilnahmedauer (in Sekunden). Falls dieser Wert auf Null gesetzt ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['enrolperiod_help'] = 'Teilnahmedauer (in Sekunden), beginnend mit dem Einschreibezeitpunkt. Falls dieser Wert auf Null gesetzt ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['enrolstartdate'] = 'Einschreibeende';
$string['enrolstartdate_help'] = 'Wenn diese Option aktiviert ist, können Nutzer/innen ab diesem Zeitpunkt eingeschrieben werden.';
$string['mailadmins'] = 'Admin benachrichtigen';
$string['mailstudents'] = 'Teilnehmer/innen benachrichtigen';
$string['mailteachers'] = 'Trainer/innen benachrichtigen';
$string['messageprovider:paypal_enrolment'] = 'Mitteilungen bei Einschreibung über Paypal';
$string['nocost'] = 'Für diesen Kurs wurde keine Einschreibegebühr  festgelegt!';
$string['paypalaccepted'] = 'PayPal-Zahlungen möglich';
$string['paypal:config'] = 'PayPal-Einschreibung konfigurieren';
$string['paypal:manage'] = 'Eingeschriebene Nutzer/innen verwalten';
$string['paypal:unenrol'] = 'Nutzer/innen aus dem Kurs abmelden';
$string['paypal:unenrolself'] = 'Selbst aus dem Kurs abmelden';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'Das Plugin \'PayPal\' erlaubt es, kostenpflichtige Kurse zu entwickeln. Wenn die Kosten für einen Kurs bei Null liegen, wird keine Zahlungsaufforderung für die Kurseinschreibung gezeigt. Es gibt die Möglichkeit, standardmäßig Kosten für alle Kurse der Website vorzugeben und dann individuell in jeder Kurseinstellung anzupassen. Die Kurseinstellung überschreibt die globale Vorgabe.';
$string['sendpaymentbutton'] = 'Zahlung über PayPal';
$string['status'] = 'PayPal-Einschreibung erlauben';
$string['status_desc'] = 'Nutzer/innen erlauben, standardmäßig PayPal zur Kurseinschreibung zu benutzen';
$string['unenrolselfconfirm'] = 'Möchten Sie sich wirklich selbst aus dem Kurs \'{$a}\' abmelden?';
