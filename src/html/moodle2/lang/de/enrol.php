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
 * Strings for component 'enrol', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = 'Verfügbare Einschreibeplugins';
$string['addinstance'] = 'Methode hinzufügen';
$string['ajaxnext25'] = 'Weitere 25...';
$string['ajaxoneuserfound'] = '1 Nutzer/in gefunden';
$string['ajaxxusersfound'] = '{$a} Nutzer/innen gefunden';
$string['assignnotpermitted'] = 'Sie haben keine Berechtigung oder Sie dürfen keine Rollen in diesem Kurs zuweisen.';
$string['bulkuseroperation'] = 'Nutzerverarbeitung (Bulk)';
$string['configenrolplugins'] = 'Aktivieren Sie bitte alle notwendigen Plugins und ordnen Sie sie in der bevorzugten Reihenfolge an.';
$string['custominstancename'] = 'Angepasster Instanzenname';
$string['defaultenrol'] = 'Plugin zu neuen Kursen hinzufügen';
$string['defaultenrol_desc'] = 'Es ist möglich, dieses Plugin standardmäßig zu allen neuen Kursen hinzuzufügen.';
$string['deleteinstanceconfirm'] = 'Möchten Sie wirklich das Einschreibeplugin \'{$a->name}\' mit {$a->users} Teilnehmereinschreibungen löschen?';
$string['durationdays'] = '{$a} Tage';
$string['enrol'] = 'Einschreiben';
$string['enrolcandidates'] = 'Nichteingeschriebene Nutzer/innen';
$string['enrolcandidatesmatching'] = 'Passende nichteingeschriebene Nutzer/innen';
$string['enrolcohort'] = 'Globale Gruppe einschreiben';
$string['enrolcohortusers'] = 'Nutzer/innen einschreiben';
$string['enrollednewusers'] = 'Erfolgreich {$a} neue Nutzer/innen eingeschrieben';
$string['enrolledusers'] = 'Eingeschriebene Nutzer/innen';
$string['enrolledusersmatching'] = 'Passende eingeschriebene Nutzer/innen';
$string['enrolme'] = 'Mich in diesem Kurs einschreiben';
$string['enrolmentinstances'] = 'Einschreibemethoden';
$string['enrolmentnew'] = 'Neue Anmeldung in {$a}';
$string['enrolmentnewuser'] = '{$a->user} hat sich im Kurs "{$a->course}" eingeschrieben';
$string['enrolmentoptions'] = 'Einschreibeoptionen';
$string['enrolments'] = 'Einschreibung';
$string['enrolnotpermitted'] = 'Sie haben keine Berechtigung oder Sie dürfen niemanden in diesem Kurs einschreiben.';
$string['enrolperiod'] = 'Teilnahmedauer';
$string['enroltimeend'] = 'Einschreibeende';
$string['enroltimestart'] = 'Einschreibebeginn';
$string['enrolusage'] = 'Einschreibungen';
$string['enrolusers'] = 'Nutzer/innen einschreiben';
$string['errajaxfailedenrol'] = 'Fehler bei der Nutzereinschreibung';
$string['errajaxsearch'] = 'Fehler bei der Nutzersuche';
$string['erroreditenrolment'] = 'Bei der Bearbeitung der Nutzereinschreibung ist ein Fehler aufgetreten';
$string['errorenrolcohort'] = 'Fehler bei der Einschreibesynchronisation von globalen Gruppen in diesem Kurs';
$string['errorenrolcohortusers'] = 'Fehler bei der Einschreibung von globalen Gruppen in diesem Kurs';
$string['errorwithbulkoperation'] = 'Fehler bei der Nutzerverarbeitung (Bulk)';
$string['extremovedaction'] = 'Externer Abmeldevorgang';
$string['extremovedaction_help'] = 'Wählen Sie eine auszuführende Aktion, wenn eine Nutzereinschreibung von einer externen Einschreibequelle erlischt. Bitte beachten Sie, dass einige Nutzerdaten und -einstellungen bei der Kursabmeldung aus dem Kurs gelöscht werden.';
$string['extremovedkeep'] = 'Nutzer/in eingeschrieben lassen';
$string['extremovedsuspend'] = 'Kurseinschreibung deaktivieren';
$string['extremovedsuspendnoroles'] = 'Kurseinschreibung deaktivieren und Rollen entfernen';
$string['extremovedunenrol'] = 'Nutzer/in aus dem Kurs abmelden';
$string['finishenrollingusers'] = 'Nutzereinschreibung beenden';
$string['invalidenrolinstance'] = 'Falsche Einschreibung';
$string['invalidrole'] = 'Falsche Rolle';
$string['manageenrols'] = 'Übersicht';
$string['manageinstance'] = 'Verwalten';
$string['nochange'] = 'Ohne Änderung';
$string['noexistingparticipants'] = 'Keine existierenden Teilnehmer/innen';
$string['noguestaccess'] = 'Gäste dürfen nicht auf diesen Kurs zugreifen. Bitte versuchen Sie sich anzumelden.';
$string['none'] = 'Keine';
$string['notenrollable'] = 'Sie können sich nicht selbst in diesen Kurs einschreiben.';
$string['notenrolledusers'] = 'Weitere Nutzer/innen';
$string['otheruserdesc'] = 'Folgende Nutzer/innen sind nicht in diesem Kurs eingeschrieben, aber sie besitzen hier zugewiesene oder vererbte Rollen. ';
$string['participationactive'] = 'Aktiv';
$string['participationstatus'] = 'Status';
$string['participationsuspended'] = 'beurlaubt';
$string['periodend'] = 'bis {$a}';
$string['periodstart'] = 'von {$a}';
$string['periodstartend'] = 'von {$a->start} bis {$a->end}';
$string['recovergrades'] = 'Alte Nutzerbewertungen falls möglich wiederherstellen';
$string['rolefromcategory'] = '{$a->role} (vererbt vom Kursbereich)';
$string['rolefrommetacourse'] = '{$a->role} (vererbt aus Kurszuordnung)';
$string['rolefromsystem'] = '{$a->role} (zugewiesen für die Website)';
$string['rolefromthiscourse'] = '{$a->role} (zugewiesen in diesem Kurs)';
$string['startdatetoday'] = 'Heute';
$string['synced'] = 'synchronisiert';
$string['totalenrolledusers'] = '{$a} eingeschriebene Nutzer/innen';
$string['totalotherusers'] = '{$a} weitere Nutzer/innen';
$string['unassignnotpermitted'] = 'Sie haben keine Berechtigung, um Rollenzuweisungen in diesem Kurs zu ändern';
$string['unenrol'] = 'Abmelden';
$string['unenrolconfirm'] = 'Möchten Sie wirklich "{$a->user}" aus dem Kurs "{$a->course}" abmelden?';
$string['unenrolme'] = 'Abmelden aus {$a}';
$string['unenrolnotpermitted'] = 'Sie haben keine Berechtigung oder Sie dürfen diese/n Nutzer/in nicht aus diesem Kurs abmelden';
$string['unenrolroleusers'] = 'Nutzer/innen abmelden';
$string['uninstallconfirm'] = 'Sie sind dabei, das Einschreibeplugin \'{$a}\' vollständig zu löschen. Möchten Sie wirklich alle mit diesem Einschreibetypen verbundenen Daten aus der Datenbank löschen?';
$string['uninstalldeletefiles'] = 'Alle dem Einschreibeplugin \'{$a->plugin}\' zugeordneten Daten wurden vollständig aus der Datenbank gelöscht. Um das Löschen zu beenden (und die automatische Neuinstallation des Plugins zu unterbinden) müssen Sie noch das Verzeichnis \'{$a->directory}\' von Ihrem Server löschen.';
$string['unknowajaxaction'] = 'Unbekannter Funktionsaufruf';
$string['unlimitedduration'] = 'Unbegrenzt';
$string['usersearch'] = 'Suchen';
$string['withselectedusers'] = 'Mit ausgewählten Nutzer/innen';
