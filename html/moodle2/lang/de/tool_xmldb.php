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
 * Strings for component 'tool_xmldb', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Aktuell';
$string['aftertable'] = 'Nach Tabelle:';
$string['back'] = 'Zurück';
$string['backtomainview'] = 'Zurück zur Hauptübersicht';
$string['cannotuseidfield'] = 'Feld \'id\' kann nicht eingefügt werden. Es handelt sich um eine Spalte, die automatisch nummeriert wird.';
$string['change'] = 'Ändern';
$string['charincorrectlength'] = 'Falsche Feldlänge (char)';
$string['checkbigints'] = 'Zahlen prüfen';
$string['check_bigints'] = 'Ungültige DB-Werte (integers) suchen';
$string['checkdefaults'] = 'Defaults prüfen';
$string['check_defaults'] = 'Inkonsistente Defaultwerte suchen';
$string['checkforeignkeys'] = 'Fremdschlüssel prüfen';
$string['check_foreign_keys'] = 'Suche nach Beschädigungen an Fremdschlüsseln';
$string['checkindexes'] = 'Indizes prüfen';
$string['check_indexes'] = 'Fehlende Datenbank-Indizes suchen';
$string['checkoraclesemantics'] = 'Semantische Prüfung';
$string['check_oracle_semantics'] = 'Suche nach fehlerhaften semantischen Längen';
$string['completelogbelow'] = '(das vollständige Suchprotokoll folgt)';
$string['confirmcheckbigints'] = 'Diese Funktion sucht nach <a href="http://tracker.moodle.org/browse/MDL-11038"> möglicherweise ungültigen Zahlenwerten</a> in Ihrem Moodle-Server und erzeugt automatisch die notwendigen SQL-Anweisungen, um die Integer Werte in der Datenbank zu korrigieren (die SQL-Anweisungen werden erzeugt, aber nicht ausgeführt!).

Nachdem die Anweisungen erzeugt wurden, können Sie diese kopieren und sie sicher in Ihrer bevorzugten SQL-Oberfläche ausführen (vergessen Sie bitte nicht, Ihre Daten vorher zu sichern!!).

Es wird dringend empfohlen, auf die jeweils neueste Variante Ihrer Moodle-Version (1.8, 1.9, 2.x ...) zu updaten, bevor Sie die Suche nach ungültigen Werten durchführen.

Die Funktion führt selber keinerlei Aktionen mit der Datenbank durch (außer lesend auf sie zuzugreifen), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmcheckdefaults'] = 'Diese Funktion sucht nach inkonsistenten Defaultwerten auf dem Moodle-Server und erstellt erforderliche SQL-Statements zur Korrektur dieser Werte, ohne jedoch automatisch die SQL Anpassungen vorzunehmen.

Wenn die Prüfung ausgeführt und das SQL Statement erstellt wurde, können Sie mit dieses mit dem Werkzeug Ihrer Wahl in der Datenbank ausführen. Vorher unbedingt ein Backup der Datenbank erstellen.

Es ist sehr wichtig zuvor die letzte (+Version) des Moodle Releases (1.8;1.9;2.x...) zu installieren.

Diese Prüfung verändert keine Einstellungen und Inhalte in Ihrer Datenbank. Es werden nur bestehende Einstellungen gelesen. Die Prüfung kann also jederzeit ausgeführt werden.';
$string['confirmcheckforeignkeys'] = 'Diese Funktion sucht nach möglicherweise zerstörten Fremdschlüsseln, die in der install.xml definiert wurden. (Moodle generiert zur Zeit keine Fremdschlüssel in der Datenbank, da ungültige Daten verfügbar sein könnten.)

Es wird dringend empfohlen, die neueste verfügbare (+Version) zu Ihrem Moodle-Release zu installieren, bevor Sie die Suche nach fehlenden Indizes starten.

Die Funktion führt keine SQL-Anweisungen auf Ihrer Datenbank aus (ausser dass sie lesend zugreift), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmcheckindexes'] = 'Diese Funktion sucht nach möglicherweise fehlenden Indizes in Ihrem Moodle-Server, wobei die nötigen SQL-Anweisungen für ein Update automatisch erzeugt (aber nicht ausgeführt) werden. Nachdem die Anweisungen erzeugt sind, können Sie sie kopieren und in Ihrem bevorzugten SQL-Zugang ausführen.<br /><br /> Es wird dringend empfohlen, die neueste verfügbare +-Version zu Ihrem Moodle-Release (1.8, 1.9, 2.x ...) zu installieren, bevor Sie die Suche nach fehlenden Indizes starten.<br /><br /> Die Funktion führt keine SQL-Anweisungen auf Ihrer Datenbank aus (außer dass sie lesend zugreift), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmcheckoraclesemantics'] = 'Diese Funktion sucht nach <a href="http://tracker.moodle.org/browse/MDL-29322">Oracle varchar2 Spalten, die BYTE Semantics</a> verwenden auf Ihrem Moodle-Server, wobei die nötigen SQL-Anweisungen zur Konvertierung in CHAR Semantics für ein Update automatisch erzeugt (aber nicht ausgeführt) werden. Diese sind besser für datenbankübergreifende Kompatibilität umfangreichere Contents. Nachdem die Anweisungen erzeugt sind, können Sie sie kopieren und in Ihrem bevorzugten SQL-Zugang ausführen.<br /><br /> Es wird dringend empfohlen, die neueste verfügbare +Version zu Ihrem Moodle-Release (1.8, 1.9, 2.x ...) zu installieren, bevor Sie die Suche nach BYTE Semantics starten.<br /><br /> Die Funktion führt keine Anweisungen auf Ihrer Datenbank aus (außer dass sie lesend zugreift), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmdeletefield'] = 'Sind Sie wirklich sicher, dass Sie dieses Feld löschen wollen:';
$string['confirmdeleteindex'] = 'Sind Sie wirklich sicher, dass Sie diesen Index löschen wollen:';
$string['confirmdeletekey'] = 'Sind Sie wirklich sicher, dass Sie diesen Schlüssel löschen wollen:';
$string['confirmdeletetable'] = 'Sind Sie wirklich sicher, dass Sie diese Tabelle löschen wollen:';
$string['confirmdeletexmlfile'] = 'Sind Sie wirklich sicher, dass Sie diese Datei löschen wollen:';
$string['confirmrevertchanges'] = 'Wollen Sie wirklich die Änderungen rückgängig machen, die Sie vorgenommen haben an:';
$string['create'] = 'Erstellen';
$string['createtable'] = 'Tabelle erstellen:';
$string['defaultincorrect'] = 'Fehlerhafte Voreinstellung';
$string['delete'] = 'Löschen';
$string['delete_field'] = 'Feld löschen';
$string['delete_index'] = 'Index löschen';
$string['delete_key'] = 'Schlüssel löschen';
$string['delete_table'] = 'Tabelle löschen';
$string['delete_xml_file'] = 'XML-Datei löschen';
$string['doc'] = 'Dokumentation';
$string['docindex'] = 'Dokumentationsindex:';
$string['documentationintro'] = 'Diese Dokumentation wurde automatisch aus der Definition der XMLDB-Datenbank generiert. Sie ist ausschließlich in Englisch verfügbar.';
$string['down'] = 'Nach unten';
$string['duplicate'] = 'Kopieren';
$string['duplicatefieldname'] = 'Es existiert bereits ein anderes Feld mit diesem Namen';
$string['duplicatefieldsused'] = 'Verwendete Felder duplizieren';
$string['duplicateindexname'] = 'Doppelter Indexname';
$string['duplicatekeyname'] = 'Es existiert bereits ein anderer Schlüssel mit diesem Namen';
$string['duplicatetablename'] = 'Es existiert bereits eine andere Tabelle mit diesem Namen';
$string['edit'] = 'Bearbeiten';
$string['edit_field'] = 'Feld bearbeiten';
$string['edit_field_save'] = 'Feld speichern';
$string['edit_index'] = 'Index bearbeiten';
$string['edit_index_save'] = 'Index sichern';
$string['edit_key'] = 'Schlüssel bearbeiten';
$string['edit_key_save'] = 'Schlüssel sichern';
$string['edit_table'] = 'Tabelle bearbeiten';
$string['edit_table_save'] = 'Tabelle speichern';
$string['edit_xml_file'] = 'XML-Datei bearbeiten';
$string['enumvaluesincorrect'] = 'Ungültige Feldwerte (enum)';
$string['expected'] = 'Erwartet';
$string['extensionrequired'] = 'Entschuldigung, aber für diese Aktion wird die PHP-Erweiterung \'{$a}\' benötigt. Bitte installieren Sie die Erweiterung, falls Sie dieses Feature benutzen möchten.';
$string['field'] = 'Feld';
$string['fieldnameempty'] = 'Feld \'Name\' ist leer';
$string['fields'] = 'Felder';
$string['fieldsnotintable'] = 'Feld existiert nicht in der Tabelle';
$string['fieldsusedinindex'] = 'Dieses Feld wird als Index verwandt';
$string['fieldsusedinkey'] = 'Das Feld wird als Schlüssel genutzt';
$string['filemodifiedoutfromeditor'] = 'Warnung: Die Datei wurde lokal mit dem XMLDB Editor verändert. Speichern überschreibt lokale Änderungen.';
$string['filenotwriteable'] = 'Datei ist schreibgeschützt';
$string['fkunknownfield'] = 'Fremder Schlüssel  {$a->keyname} in Tabelle {$a->tablename} verweist auf nicht bestehendes Feld {$a->reffield} in der Verweistabelle {$a->reftable}.';
$string['fkunknowntable'] = 'Fremder Schlüssel  {$a->keyname} in Tabelle {$a->tablename} verweist auf nicht bestehende Tabelle {$a->reftable}.';
$string['fkviolationdetails'] = 'Fremdschlüssel {$a->keyname} in der Tabelle {$a->tablename} ist zerstört in {$a->numviolations} von {$a->numrows} Zeilen.';
$string['float2numbernote'] = 'Hinweis: Auch wenn Felder im Format "float" 100%-ig durch XMLDB unterstützt werden, wird trotzdem die Migration ins Format "number" empfohlen.';
$string['floatincorrectdecimals'] = 'Falsche Anzahl von Nachkommazahlen (float)';
$string['floatincorrectlength'] = 'Falsche Feldlänge (float)';
$string['generate_all_documentation'] = 'Gesamte Dokumentation';
$string['generate_documentation'] = 'Dokumentation';
$string['gotolastused'] = 'Zur zuletzt genutzten Datei';
$string['incorrectfieldname'] = 'Falscher Name';
$string['incorrectindexname'] = 'Falscher Indexname';
$string['incorrectkeyname'] = 'Falsche Key Bezeichnung';
$string['incorrecttablename'] = 'Falscher Tabellenname';
$string['index'] = 'Index';
$string['indexes'] = 'Indizes';
$string['indexnameempty'] = 'Indexname ist leer';
$string['integerincorrectlength'] = 'Falsche Feldlänge (integer)';
$string['key'] = 'Schlüssel';
$string['keynameempty'] = 'Die Key Bezeichnung darf nicht leer bleiben';
$string['keys'] = 'Schlüssel';
$string['listreservedwords'] = 'Liste von reservierten Wörtern<br/>auf dem aktuellsten Stand: <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a>';
$string['load'] = 'Laden';
$string['main_view'] = 'Hauptübersicht';
$string['masterprimaryuniqueordernomatch'] = 'Die Felder des externen (foreign) Schlüssels müssen in der gleichen Reihenfolge wie sie als UNIQUE KEY or in der Referenztabelle eingetragen sind.';
$string['missing'] = 'Fehlend';
$string['missingindexes'] = 'Fehlende Indizes gefunden';
$string['mustselectonefield'] = 'Sie müssen ein Feld auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['mustselectoneindex'] = 'Sie müssen einen Index auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['mustselectonekey'] = 'Sie müssen einen Schlüssel auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['newfield'] = 'Neues Feld';
$string['newindex'] = 'Neuer Index';
$string['newkey'] = 'Neuer Schlüssel';
$string['newtable'] = 'Neue Tabelle';
$string['newtablefrommysql'] = 'Neue Tabelle aus MySQL';
$string['new_table_from_mysql'] = 'Neue Tabelle aus MySQL';
$string['nofieldsspecified'] = 'Keine Felder festgelegt';
$string['nomasterprimaryuniquefound'] = 'Die Spalte(n) mit Ihren externen Schlüsselverweisen müssen in einem primary oder unique KEY in der verknüpften Tabelle enthalten sein. Beachten Sie, dass eine Spalte in einem UNIQUE INDEX nicht ausreicht.';
$string['nomissingindexesfound'] = 'Es wurden keine fehlenden Indizes gefunden. Die Datenbank benötigt keine weitere Bearbeitung.';
$string['noreffieldsspecified'] = 'Keine Referenzfelder festgelegt';
$string['noreftablespecified'] = 'Angegebene Referentztabelle nicht gefunden';
$string['noviolatedforeignkeysfound'] = 'Keine zerstörten Fremdschlüssel gefunden.';
$string['nowrongdefaultsfound'] = 'Es wurden keine inkonsistenten Defaultwerte gefunden. die Datenbank benötigt keine weiter Bearbeitung.';
$string['nowrongintsfound'] = 'Es wurden keine ungültigen Zahlenwerte (integer) gefunden. Die Datenbank benötigt keine weitere Bearbeitung.';
$string['nowrongoraclesemanticsfound'] = 'Es wurden keine Orcale Tabellen mit BYTE semantics gefunden. die Datenbank benötigt keine weitere Bearbeitung.';
$string['numberincorrectdecimals'] = 'Falsche Anzahl von Stellen (number)';
$string['numberincorrectlength'] = 'Falsche Feldlänge (number)';
$string['pendingchanges'] = 'Hinweis: Sie haben Veränderungen in dieser Datei vorgenommen. Sie können jederzeit gespeichert werden.';
$string['pendingchangescannotbesaved'] = 'Die Änderungen in dieser Datei können nicht gespeichert werden! Bitte prüfen Sie, dass das Verzeichnis und die darin enthaltene Datei "install.xml" eine Schreibberechtigung für den Webserver besitzen.';
$string['pendingchangescannotbesavedreload'] = 'Die Änderungen in dieser Datei können nicht gespeichert werden! Bitte prüfen Sie, dass das Verzeichnis und die darin enthaltene Datei "install.xml" eine Schreibbereichtigung für den Webserver besitzen. Wenn Sie danach diese Seite neu laden, sollten Sie diese Änderungen speichern können.';
$string['pluginname'] = 'XMLDB-Editor';
$string['primarykeyonlyallownotnullfields'] = 'Primäre Keys können nicht null sein';
$string['reserved'] = 'Reserviert';
$string['reservedwords'] = 'Reservierte Wörter';
$string['revert'] = 'Rückgängig';
$string['revert_changes'] = 'Änderungen rückgängig machen';
$string['save'] = 'Speichern';
$string['searchresults'] = 'Suchergebnisse';
$string['selectaction'] = 'Aktion auswählen:';
$string['selectdb'] = 'Datenbank auswählen:';
$string['selectfieldkeyindex'] = 'Feld/Schlüssel/Index auswählen:';
$string['selectonecommand'] = 'Wählen Sie bitte eine Aktion aus, um den PHP-Code anzusehen.';
$string['selectonefieldkeyindex'] = 'Wählen Sie bitte ein Feld/Schlüssel/Index aus, um den PHP-Code anzusehen.';
$string['selecttable'] = 'Tabelle auswählen:';
$string['table'] = 'Tabelle';
$string['tablenameempty'] = 'Der Tabellenname darf nicht leer bleiben.';
$string['tables'] = 'Tabellen';
$string['unknownfield'] = 'Verweis auf nicht bekanntes Feld';
$string['unknowntable'] = 'Verweis auf nicht bekannte Tabelle';
$string['unload'] = 'Löschen';
$string['up'] = 'Aufwärts';
$string['view'] = 'Ansicht';
$string['viewedited'] = 'Bearbeitete anzeigen';
$string['vieworiginal'] = 'Original anzeigen';
$string['viewphpcode'] = 'PHP-Code anzeigen';
$string['view_reserved_words'] = 'Reservierte Wörter anzeigen';
$string['viewsqlcode'] = 'SQL-Code anzeigen';
$string['view_structure_php'] = 'PHP-Struktur anzeigen';
$string['view_structure_sql'] = 'SQL-Struktur anzeigen';
$string['view_table_php'] = 'PHP-Tabelle anzeigen';
$string['view_table_sql'] = 'SQL-Tabelle anzeigen';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Zerstörte Fremdschlüssel';
$string['violatedforeignkeysfound'] = 'Zerstörte Fremdschlüssel gefunden';
$string['violations'] = 'Beschädigungen';
$string['wrong'] = 'Falsch';
$string['wrongdefaults'] = 'Falsche Standardwerte gefunden';
$string['wrongints'] = 'Falsche Zahlen gefunden';
$string['wronglengthforenum'] = 'Falsche Feldlänge (enum)';
$string['wrongnumberofreffields'] = 'Falsche Anzahl von Referenzfeldern';
$string['wrongoraclesemantics'] = 'Falsche Orcale BYTE Semantic sgefunden';
$string['wrongreservedwords'] = 'Derzeit verwendete reservierte Wörter <br />(die Tabellennamen sind nicht wichtig, wenn $CFG->prefix genutzt wird)';
$string['yesmissingindexesfound'] = 'Einige fehlende Indizes wurden in Ihrer Datenbank gefunden. Es folgen genauere Einzelheiten und die nötigen SQL-Anweisungen, die Sie mit Ihrem bevorzugten SQL-Werkzeug ausführen müssen, um alle Indizes zu erzeugen.<br /><br />
Es wird dringend empfohlen, die Suche nach fehlenden Indizes danach noch einmal auszuführen.';
$string['yeswrongdefaultsfound'] = 'In der Datenbank wurden inkonsistente Standardwerte gefunden. Die nachfolgenden Details und die auszuführenden SQL Statements sollen Ihnen helfen, die Fehler in Ihrer Datenbank zu beheben. Vergessen Sie nicht eine Datenbanksicherung zu erstellen, bevor Sie diese Anweisungen ausführen.<br/> <br/>
Nachdem Sie das jeweilige Statement ausgeführt haben, sollten Sie die Prüfung erneut durchführen, um wirklich alle Inkonsistenzen aufzudecken.';
$string['yeswrongintsfound'] = 'In Ihrer Datenbank wurden mehrere ungültige Zahlenwerte gefunden. Es folgen die Details und die benötigten SQL-Befehle, die Sie in Ihrer bevorzugten SQL-Oberfläche ausführen müssen, um die Fehler zu beheben (vergessen Sie bitte nicht, vor der Korrektur eine Sicherungskopie Ihrer Daten anzulegen!!)<br /><br />Nach der Ausführung wird dringend empfohlen, dieses Werkzeug erneut aufzurufen, um sicher zu stellen, dass keine ungültige Zahlenwerte mehr gefunden werden.';
$string['yeswrongoraclesemanticsfound'] = 'Es wurden einige Oracle Tabellenspalten gefunden, die BYTE Semantics verwenden. Sie finden hier weitere Details und die erforderlichen SQL statements, um alle weiteren zu erzeugen. Sie können dafür Ihre SQL Arbeitsumgebung verwenden. Bitte unbedingt zuvor alle Daten sichern.<br /<br />Nach der Umsetzung sollte dieser Suchprozess hier nochmals durchgeführt werden, um weitere Fehler zu finden.';
