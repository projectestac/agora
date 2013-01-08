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
 * Strings for component 'enrol_self', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'Nur Mitglieder der globalen Gruppe \'{$a}\' können sich selbst in den Kurs einschreiben.';
$string['cohortonly'] = 'Nur für Mitglieder der globalen Gruppe';
$string['cohortonly_help'] = 'Die Selbsteinschreibung kann beschränkt werden auf Mitglieder einer globalen Gruppe. Eine Änderung dieser Einstellung hat keine Auswirkung auf bereits erfolgte Einschreibungen.';
$string['customwelcomemessage'] = 'Begrüßungstext';
$string['customwelcomemessage_help'] = 'Ein individueller Begrüßungstext kann als einfacher Text, Moodle-Auto-Format oder im HTML-Format mit mehreren Sprachen erstellt werden.';
$string['defaultrole'] = 'Rolle im Kurs';
$string['defaultrole_desc'] = 'Wählen Sie eine Rolle aus, die Nutzer/innen bei der Selbsteinschreibung zugewiesen werden soll';
$string['editenrolment'] = 'Einschreibung bearbeiten';
$string['enrolenddate'] = 'Einschreibeende';
$string['enrolenddate_help'] = 'Wenn diese Option aktiviert ist, können Nutzer/innen sich bis zum angegebenen Zeitpunkt selbst einschreiben.';
$string['enrolenddaterror'] = 'Das Einschreibungsende muss später als der -beginn sein';
$string['enrolme'] = 'Einschreiben';
$string['enrolperiod'] = 'Teilnahmedauer';
$string['enrolperiod_desc'] = 'Die standardmäßige Teilnahmedauer ist die Zeitdauer, während der die Einschreibung gültig bleibt. Wenn diese Option deaktiviert ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['enrolperiod_help'] = 'Die Teilnahmedauer ist die Zeitdauer, während der die Einschreibung gültig bleibt, beginnend mit dem Moment der Nutzereinschreibung. Wenn diese Option deaktiviert ist, ist die Teilnahmedauer standardmäßig unbegrenzt.';
$string['enrolstartdate'] = 'Einschreibebeginn';
$string['enrolstartdate_help'] = 'Wenn diese Option aktiviert ist, können Nutzer/innen sich ab diesem Zeitpunkt selbst in den Kurs einschreiben.';
$string['expiredaction'] = 'Festlegungen zum Einschreibungszeitraum';
$string['expiredaction_help'] = 'Legen Sie fest was nach dem Ablauf der Einschreibung in einem Kurs erfolgt. Denken Sie daran, dass bei der Austragung des Nutzers aus dem Kurs einige Daten nicht mehr verfügbar sind.';
$string['expirymessageenrolledbody'] = 'Guten Tag {$a->user},

Ihre Einschreibung in den Kurs \'{$a->course}\' läuft am {$a->timeend} ab.

Wenn Sie Fragen haben, wenden Sie sich bitte an {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Mitteilung zum Ablauf der Selbsteinschreibung';
$string['expirymessageenrollerbody'] = 'Die Selbsteinschreibung im Kurs \'{$a->course}\' wird innerhalb der nächsten {$a->threshold} für folgende Nutzer/innen ablaufen:

{$a->users}

Die Einschreibung kann über folgenden Link verlängert werden: {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Mitteilung zum Ablauf der Selbsteinschreibung';
$string['groupkey'] = 'Einschreibeschlüssel für Gruppen';
$string['groupkey_desc'] = 'Standardmäßig einen Einschreibeschlüssel für Gruppen benutzen';
$string['groupkey_help'] = 'Ergänzend zur Zugriffssteuerung über einen Einschreibeschlüssel für den Kurs können zusätzliche Einschreibeschlüssel für Gruppen festgelegt werden, die bei der Kurseinschreibung automatisch alle Nutzer/innen einer bestimmten Gruppe zuweisen.

Um Einschreibeschlüssel für Gruppen verwenden zu können, muss ein Einschreibeschlüssel für den Kurs vergeben sein, den aber eigentlich niemand kennen muss. Der Einschreibeschlüssel für die jeweilige Gruppe wird in den Gruppeneinstellungen festgelegt.';
$string['longtimenosee'] = 'Inaktive abmelden
';
$string['longtimenosee_help'] = 'Wenn Personen lange Zeit nicht mehr auf einen Kurs zugegriffen haben, werden sie automatisch abgemeldet. Dieser Parameter legt die maximale Inaktivitätsdauer fest.';
$string['maxenrolled'] = 'Einschreibungen (max.)';
$string['maxenrolled_help'] = 'Diese Option legt die Maximalzahl möglicher Nutzer/innen mit Selbsteinschreibung fest. (0= unbeschränkt)';
$string['maxenrolledreached'] = 'Die maximale Anzahl der erlaubten Nutzer/innen mit Selbsteinschreibung ist bereits erreicht.
';
$string['messageprovider:expiry_notification'] = 'Mitteilungen zum Ablauf der Selbsteinschreibung';
$string['nopassword'] = 'Kein Einschreibeschlüssel notwendig';
$string['password'] = 'Einschreibeschlüssel';
$string['password_help'] = 'Ein Einschreibeschlüssel erlaubt den Kurszugriff ausschließlich für diejenigen, die den Einschreibeschlüssel kennen.

Wenn das Feld leer bleibt, können sich alle Nutzer/innen im Kurs einschreiben.

Wenn ein Einschreibeschlüssel angegeben ist, müssen alle Nutzer/innen notwendigerweise bei der Kurseinschreibung den Einschreibeschlüssel eingeben. Beachten Sie, dass Nutzer/innen den Einschreibeschlüssel nur einmal bei der Kurseinschreibung eingeben müssen und danach dauerhaft eingeschriebene Kursteilnehmer/innen sind. ';
$string['passwordinvalid'] = 'Falscher Einschreibeschlüssel';
$string['passwordinvalidhint'] = 'Falscher Einschreibeschlüssel (Hinweis: Das erste Zeichen ist \'{$a}\')';
$string['pluginname'] = 'Selbsteinschreibung';
$string['pluginname_desc'] = 'Das Plugin \'Selbsteinschreibung\' erlaubt Nutzer/innen zu wählen, in welchen Kursen sie teilnehmen möchten. Die Kurse können mit einem Einschreibeschlüssel gesichert sein. Intern wird die Selbsteinschreibung über das Plugin \'Manuelle Einschreibung\' abgewickelt, welches im Kurs notwendigerweise ebenfalls aktiviert sein muss.';
$string['requirepassword'] = 'Einschreibeschlüssel notwendig';
$string['requirepassword_desc'] = 'Die Verwendung eines Einschreibeschlüssel ist notwendig. Mit dieser Einstellung wird in neuen Kursen ein Einschreibeschlüssel gesetzt und in bestehenden Kursen das Löschen des Einschreibeschlüssels verhindert.';
$string['role'] = 'Rolle im Kurs';
$string['self:config'] = 'Selbsteinschreibung konfigurieren';
$string['self:manage'] = 'Eingeschriebene Nutzer/innen verwalten';
$string['self:unenrol'] = 'Nutzer/innen aus dem Kurs abmelden';
$string['self:unenrolself'] = 'Sich selbst aus dem Kurs abmelden';
$string['sendcoursewelcomemessage'] = 'Begrüßungstext versenden';
$string['sendcoursewelcomemessage_help'] = 'Wenn diese Option aktiviert ist, erhalten alle Nutzer/innen einen Begrüßungstext per E-Mail, sobald sie sich selbst in einen Kurs einschreiben.';
$string['showhint'] = 'Hinweis zeigen';
$string['showhint_desc'] = 'Erstes Zeichen des Zugangsschlüssels zeigen';
$string['status'] = 'Selbsteinschreibung';
$string['status_desc'] = 'Nutzer/innen erlauben, sich standardmäßig selbst in Kurse einzuschreiben';
$string['status_help'] = 'Diese Einstellung legt fest, ob Nutzer/innen sich selbst in einem Kurs einschreiben (und mit der entsprechenden Berechtigung auch wieder abmelden) dürfen.';
$string['unenrol'] = 'Nutzer/in abmelden';
$string['unenrolselfconfirm'] = 'Möchten Sie sich wirklich selbst aus dem Kurs \'{$a}\' abmelden?';
$string['unenroluser'] = 'Möchten Sie wirklich \'{$a->user}\' aus dem Kurs \'{$a->course}\' abmelden?';
$string['usepasswordpolicy'] = 'Kennwortregeln benutzen';
$string['usepasswordpolicy_desc'] = 'Die allgemeinen Kennwortregeln gelten auch für die Einschreibeschlüssel.';
$string['welcometocourse'] = 'Willkommen zu {$a}';
$string['welcometocoursetext'] = 'Willkommen im Kurs \'{$a->coursename}\'!

Falls Sie es nicht bereits erledigt haben, sollten Sie Ihr persönliches Nutzerprofil bearbeiten. Auf diese Weise können wir alle mehr über Sie erfahren und besser zusammenarbeiten:

{$a->profileurl}';
