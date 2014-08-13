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
 * Strings for component 'cache', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Aktivitäten';
$string['addinstance'] = 'Instanz hinzufügen';
$string['addlocksuccess'] = 'Neue Sperre wurde erfolgreich hinzugefügt';
$string['addnewlockinstance'] = 'Neue Sperre hinzufügen';
$string['addstore'] = 'Speicher {$a} hinzufügen';
$string['addstoresuccess'] = 'Speicher {$a} erfolgreich hinzugefügt';
$string['area'] = 'Bereich';
$string['cacheadmin'] = 'Cache Verwaltung';
$string['cacheconfig'] = 'Konfiguration';
$string['cachedef_calendar_subscriptions'] = 'Kalender Abonnements';
$string['cachedef_config'] = 'Konfigurationseinstellungen';
$string['cachedef_coursecat'] = 'Kurskategorien für ausgewählte Nutzer/innen';
$string['cachedef_coursecatrecords'] = 'Datensätze der Kurskategorien';
$string['cachedef_coursecattree'] = 'Struktur der Kurskategorien';
$string['cachedef_coursecontacts'] = 'Liste von Kurskontakten';
$string['cachedef_coursemodinfo'] = 'Angesammelte Informationen über Module und Kursabschnitte';
$string['cachedef_databasemeta'] = 'Metainformationen zur Datenbank';
$string['cachedef_eventinvalidation'] = 'Termin löschen';
$string['cachedef_externalbadges'] = 'Externe Auszeichnungen einzelner Nutzer/innen';
$string['cachedef_gradecondition'] = 'Gecachte Bewertungen einzelner Nutzer zur Evaluaton bedingter Verfügbarkeit';
$string['cachedef_groupdata'] = 'Information für Kursgruppe';
$string['cachedef_htmlpurifier'] = 'HTML Purifier - Inhalt entfernt';
$string['cachedef_langmenu'] = 'Liste verfügbarer Sprachen';
$string['cachedef_locking'] = 'Sperrung';
$string['cachedef_navigation_expandcourse'] = 'Navigation erweiterbare Kurse';
$string['cachedef_observers'] = 'Event-Beobachtung';
$string['cachedef_plugin_manager'] = 'Plugin-Informatonsmanager';
$string['cachedef_questiondata'] = 'Fragedefinition';
$string['cachedef_repositories'] = 'Daten der Repositories';
$string['cachedef_string'] = 'Sprachstring-Cache';
$string['cachedef_suspended_userids'] = 'Liste der gesperrten Nutzer/innen pro Kurs';
$string['cachedef_userselections'] = 'Daten, die verwendet werden, um eine Nutzerauswahl an mehreren Stellen zu verwenden';
$string['cachedef_yuimodules'] = 'YUI Modul-Definitionen';
$string['cachelock_file_default'] = 'Standard-Dateisperre';
$string['cachestores'] = 'Cache-Speicher';
$string['caching'] = 'Caching';
$string['component'] = 'Komponente';
$string['confirmlockdeletion'] = 'Löschen der Sperre bestätigen';
$string['confirmstoredeletion'] = 'Speicherlöschung bestätigen';
$string['default_application'] = 'Standard Anwendungsspeicher';
$string['defaultmappings'] = 'Speicherort wenn keine Definition erstellt wurde';
$string['defaultmappings_help'] = 'Dies sind die Standardspeicherorte falls keine Orte für die verschiedenen Cache-Definitionen angelegt wurden.';
$string['default_request'] = 'Standard-Abfrage-Speicherort';
$string['default_session'] = 'Standard Sessionspeicher';
$string['defaultstoreactions'] = 'Standardspeicher können nicht verändert werden';
$string['definition'] = 'Definition';
$string['definitionsummaries'] = 'Bekannte Cachedefinitionen';
$string['delete'] = 'Löschen';
$string['deletelock'] = 'Sperre löschen';
$string['deletelockconfirmation'] = 'Möchten Sie die Sperre \'{$a}\' wirklich löschen?';
$string['deletelockhasuses'] = 'Sie können die Sperre nicht löschen, während sie von einem oder mehreren Speichern benutzt wird.';
$string['deletelocksuccess'] = 'Sperre erfolgreich gelöscht';
$string['deletestore'] = 'Speicher löschen';
$string['deletestoreconfirmation'] = 'Möchten Sie den Speicher \'{$a}\' wirklich löschen?';
$string['deletestorehasmappings'] = 'Sie können diesen Speicherplatz nicht löschen, da es Zuordnungen für ihn gibt. Löschen Sie zuerst die Zuordnungen.';
$string['deletestoresuccess'] = 'Der Cache-Speicher wurde erfolgreich gelöscht.';
$string['editdefinitionmappings'] = '{$a} Speicherzuordnungs-Definitionen';
$string['editdefinitionsharing'] = 'Sharing bearbeiten für {$a}';
$string['editmappings'] = 'Bearbeiten';
$string['editsharing'] = 'Sharing bearbeiten';
$string['editstore'] = 'Speicher bearbeiten';
$string['editstoresuccess'] = 'Der Cache-Speicher wurde erfolgreich bearbeitet.';
$string['ex_configcannotsave'] = 'Die Cache-Konfiguration konnte nicht in einer Datei gespeichert werden.';
$string['ex_nodefaultlock'] = 'Die Default-Instanz zum Sperren wurde nicht gefunden';
$string['ex_unabletolock'] = 'Der Aufruf einer Speichersperre zum Caching war nicht möglich.';
$string['ex_unmetstorerequirements'] = 'Sie können diesen Speicher zur Zeit nicht verwenden. Bitte prüfen Sie anhand der Dokumentation die Voraussetzungen.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['inadequatestoreformapping'] = 'Dieser Speicher erfüllt ncht alle Voraussetzungen für alle bekannten Definitionen. Definitionen,die in diesen Speicher nicht eingetragen werden können, werden statt dessen in den Standard-Speicher angelegt werden.';
$string['invalidlock'] = 'Ungültige Sperre';
$string['invalidplugin'] = 'Ungültiges Plugin';
$string['invalidstore'] = 'Speicherplatz für Cache ist ungültig';
$string['lockdefault'] = 'Standard';
$string['lockingmeans'] = 'Sperrmechanismus';
$string['lockmethod'] = 'Sperrmethode';
$string['lockmethod_help'] = 'Sperrmethode falls für diesen Speicher erforderlich';
$string['lockname'] = 'Name';
$string['locknamedesc'] = 'Der Name muss eindeutig sein und darf nur die Zeichen a-zA-Z_ enthalten.';
$string['locknamenotunique'] = 'Der gewählte Name wird bereits verwendet. Bitte wählen Sie einen eindeutigen Namen.';
$string['locksummary'] = 'Zusammenstellung der Speicher-Sperr-Instanzen';
$string['locktype'] = 'Typ';
$string['lockuses'] = 'Nutzung';
$string['mappingdefault'] = '(standard)';
$string['mappingfinal'] = 'Endgültiger Speicher';
$string['mappingprimary'] = 'Primärer Speicher';
$string['mappings'] = 'Speicher-Zuordnungen';
$string['mode'] = 'Modus';
$string['mode_1'] = 'Anwendung';
$string['mode_2'] = 'Session';
$string['mode_4'] = 'Anfrage';
$string['modes'] = 'Modi';
$string['nativelocking'] = 'Dieses Plugin verwendet eigene Sperrungen.';
$string['none'] = 'Kein';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Installierte Cache-Speicher';
$string['purge'] = 'Verwerfen';
$string['purgedefinitionsuccess'] = 'Die abgefragte Definition wurde erfolgreich ersetzte.';
$string['purgestoresuccess'] = 'Gewählten Speicher erfolgreich gelöscht';
$string['requestcount'] = 'Test mit {$a} Zugriffen';
$string['rescandefinitions'] = 'Definitionen erneut auswerten';
$string['result'] = 'Ergebnis';
$string['set'] = 'Einstellung';
$string['sharing'] = 'Sharing';
$string['sharing_all'] = 'Jeder';
$string['sharing_help'] = 'Sie können festlegen wie Cache-Daten verteilt werden (Cluster Setup). Z.B. wenn mehrere Sites auf dem gleichen Datenspeicher oder getrennt verwaltet werden. Dies ist eine anspruchsvolle Einstellung. Nuitzen Sie sie nur wenn Sie die Wirkungen gut einschätzen können.';
$string['sharing_input'] = 'Eigener Schlüssel';
$string['sharingrequired'] = 'Sie müssen mindestens eine Sharing-Option wählen.';
$string['sharingselected_all'] = 'Jeder';
$string['sharingselected_input'] = 'Eigener Schlüssel';
$string['sharingselected_siteid'] = 'Website-ID';
$string['sharingselected_version'] = 'Version';
$string['sharing_siteid'] = 'Websites mit der gleichen Website-ID';
$string['sharing_version'] = 'Websites mit der gleichen Version';
$string['storeconfiguration'] = 'Speicherkonfiguration';
$string['store_default_application'] = 'Standard Dateispeicher für Anwendungen';
$string['store_default_request'] = 'Standard Static-Speicher für Abfrage-Caches';
$string['store_default_session'] = 'Standard Session-Speicher für Session-Caches';
$string['storename'] = 'Speichername';
$string['storenamealreadyused'] = 'Definieren Sie einen eindeutigen Namen für diesen Speicher';
$string['storename_help'] = 'Legen Sie den Speichernamen fest. Er wird zur Identifikation des Speichers verwandt. Der Name kann aus Groß-/Kleinbuchstaben Zahlen, \'-\',  \'_\' und Leerzeichen bestehen. Ungültige Eingaben erzeugen eine Fehlernachricht.';
$string['storenameinvalid'] = 'Ungültiger Speichername. Verwenden Sie nur Groß-, Kleinbuchstaben, Ziffern und \'-\', \'_\' oder Leerzeichen';
$string['storenotready'] = 'Speicher nicht bereitgestellt.';
$string['storeperformance'] = 'Cache-Speicher Leistungsbericht - {$a} einzelne Anfragen je Operation.';
$string['storeready'] = 'Fertig';
$string['storerequiresattention'] = 'Erfordert Ihre Aufmerksamkeit';
$string['storerequiresattention_help'] = 'Diese Speicherinstanz ist noch nicht fertiggestellt. Es gibt jedoch Zuordnungen. Die Performance verbessert sich, wenn Sie dies korrigieren. Prüfen Sie, ob das Backend für den Speicher zur Nutzung bereitsteht und die PHP-Anforderungen erfüllt sind.';
$string['storeresults_application'] = 'Abfragen speichern als Applikationscache';
$string['storeresults_request'] = 'Abfragen speichern als Abfragecache';
$string['storeresults_session'] = 'Abfragen speichern als Sessioncache';
$string['stores'] = 'Speicher';
$string['storesummaries'] = 'Speicher-Instanzen konfigurieren';
$string['supports'] = 'Unterstützungen';
$string['supports_dataguarantee'] = 'Datengarantie';
$string['supports_keyawareness'] = 'Sensibilisierung';
$string['supports_multipleidentifiers'] = 'Mehrere Identifizierungen';
$string['supports_nativelocking'] = 'sperren';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = 'Nach Schlüssel suchen';
$string['tested'] = 'Geprüft';
$string['testperformance'] = 'Performance testen';
$string['unsupportedmode'] = 'Nichtunterstützter Modus';
$string['untestable'] = 'Nicht prüfbar';
$string['userinputsharingkey'] = 'Eigener Schlüssel für Sharing';
$string['userinputsharingkey_help'] = 'Geben Sie hier Ihren privaten Schlüssel an. Wenn Sie weitere Speicher bei anderen Websites anlegen und Daten gemeinsam nutzen möchten, verwenden Sie immer den gleichen Schlüssel.';
