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
 * Strings for component 'block_configurable_reports', language 'de', branch 'MOODLE_26_STABLE'
 *
 * @package   block_configurable_reports
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitypost'] = 'Aktivitäten-Einreichungen';
$string['activityview'] = 'Aktivitäten-Aufrufe';
$string['addreport'] = 'Bericht hinzufügen';
$string['anyone'] = 'Jeder';
$string['anyone_summary'] = 'Jeder Nutzer wird in der Lage sein diesen Bericht aufzurufen';
$string['availablemarks'] = 'Verfügbare Bewertungen';
$string['average'] = 'Durchschnitt';
$string['badconditionexpr'] = 'Ausdruck mit ungültiger Bedingung';
$string['badsize'] = 'Falscher Größenwert, die Größe muss in % oder Pixel angegeben werden';
$string['badtablewidth'] = 'Falscher Breitenwert, die Angabe muss in % oder als Betrag angegeben werden';
$string['blockname'] = 'Konfigurierbare Berichte';
$string['calcs'] = 'Berechnungen';
$string['categories'] = 'Kategorien';
$string['categoryfield'] = 'Kategorienfeld';
$string['categoryfieldorder'] = 'Kategorienfeld-Reihenfolge';
$string['ccoursefield'] = 'Kategorienfeld-Bedingung';
$string['cellalign'] = 'Zellenausrichtung';
$string['cellsize'] = 'Zellengröße';
$string['cellwrap'] = 'Zellenumbruch';
$string['column'] = 'Spalte';
$string['columnandcellproperties'] = 'Spalten- und Zelleneinstellungen';
$string['columncalculations'] = 'Spaltenberechnungen';
$string['columns'] = 'Spalten';
$string['comp_calcs'] = 'Berechnungen';
$string['comp_calcs_help'] = '<p>Hier können Berechnungen für die Spalten hinzugefügt werden, z.B.: durchschnittliche Anzahl an Nutzern die in Kursen eingeschrieben sind</p> <p>Weitere Hilfe: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_calculations'] = 'Berechnungen';
$string['comp_calculations_help'] = '<p>Hier können Berechnungen für die Spalten hinzugefügt werden, z.B.: durchschnittliche Anzahl an Nutzern die in Kursen eingeschrieben sind</p>';
$string['comp_columns'] = 'Spalten';
$string['comp_columns_help'] = '<p>Hier können die verschiedenen Spalten des Reports ausgewählt werden, abhängig vom Typ ihres Reports</p> <p>Weitere Hilfe: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_conditions'] = 'Bedingungen';
$string['comp_conditions_help'] = '<p>Hier können Bedingungen definiert werden (z.B., nur Kurse einer Kategorie, nur Nutzer aus Spanien, etc.. </p> <p>Es können logische Ausdrücke verwendet werden wenn es mehr als eine Bedingung gibt.</p> <p>Weiter Hilfe: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_customsql'] = 'Angepasstes SQL';
$string['comp_customsql_help'] = '<p>Eine SQL Anweisung hinzufügen. Das Moodle Datenbank prefix ist hier nicht zu verwenden. Stattdessen muss hier als Prefix "prefix_" angegeben werden</p> <p>Beispiel: SELECT * FROM prefix_course</p> <p>Einige Beispielanweisungen könne hier gefunden werden: <a href="http://docs.moodle.org/en/ad-hoc_contributed_reports" target="_blank">ad-hoc contributed reports</a></p> <p>Weitere Hinweise zum Erstellen von SQL Berichten finden Sie hier: <a href="http://docs.moodle.org/en/blocks/configurable_reports/#Creating_a_SQL_Report" target="_blank">Creating a SQL Report Tutorial</a></p>';
$string['comp_filters'] = 'Filter';
$string['comp_filters_help'] = '<p>Hier kann ausgewählt werden welcher Filter dargestellt werden soll.</p> <p>Ein Filter gibt dem Nutzer die Möglichkeit eine Spalte zu wählen über die das Ergebnis des Berichts gefiltert wird.</p> <p>Weiter Informationen zur Verwendung von Filtern finden Sie auf: <a href="http://docs.moodle.org/en/blocks/configurable_reports/#Creating_a_SQL_Report" target="_blank">Creating a SQL Report Tutorial</a></p> <p>Weitere Informationen: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['componenthelp'] = 'Komponenten-Hilfe';
$string['comp_ordering'] = 'Sortierung';
$string['comp_ordering_help'] = '<p>Hier kann ausgewählt werden wie die Sortierung des Berichts aussehen soll</p> <p>Weiter Informationen unter: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_permissions'] = 'Berechtigung';
$string['comp_permissions_help'] = '<p>Hier kann festgelegt werden wer den Bericht sehen darf.</p> <p>Es können logische Ausdrücke zur Berechnung der Rechte verwendet werden wenn mehr als eine Bedingung verwendet wird.</p> <p>Weitere Informationen unter: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_plot'] = 'Diagramme';
$string['comp_plot_help'] = '<p>Hier können Diagramme über die Ergebnisse des Berichts hinzugefügt werden</p> <p>Weitere Informationen unter: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['comp_template'] = 'Templates';
$string['comp_template_help'] = '<p>Hier kann die Darstellung des Plugins durch ein Template angepasst werden.</p> <p>Für die Erstellung eines Templates kann man sich die Platzhalter ansehen die in der Überschrift, der Fußnote und den einzelnen Zeilen des Berichts verwendet werden können. Die Hinweise dazu sind in den jeweiligen Hilfetexten zu finden.</p> <p>Weitere Informationen unter: <a href="http://docs.moodle.org/en/blocks/configurable_reports/" target="_blank">Plugin documentation</a></p>';
$string['conditionexpr'] = 'Bedingung';
$string['conditionexpr_conditions'] = 'Bedingung';
$string['conditionexpr_conditions_help'] = '<p>Bedingungen können unter Verwendung von logischen Ausdrücken kombiniert werden</p> <p>Geben Sie dazu einen logischen Ausdruck ein der folgende Operatoren verwendet: and, or, nor.</p>';
$string['conditionexprhelp'] = 'Geben Sie eine gültige Bedingung ein z.B. (c1 and c2) or (c4 and c3)';
$string['conditionexpr_permissions'] = 'Bedingung';
$string['conditionexpr_permissions_help'] = '<p>Bedingungen können unter Verwendung von logischen Ausdrücken kombiniert werden</p> <p>Geben Sie dazu einen logischen Ausdruck ein der folgende Operatoren verwendet: and, or, nor.</p>';
$string['conditions'] = 'Bedingungen';
$string['configurable_reports:addinstance'] = 'Einen neuen \'Konfigurierbare Berichte\'-Block hinzufügen';
$string['configurable_reports:manageownreports'] = 'Eigene Berichte verwalten';
$string['configurable_reports:managereports'] = 'Berichte verwalten';
$string['configurable_reports:managesqlreports'] = 'SQL Berichte verwalten';
$string['configurable_reports:viewreports'] = 'Berichte ansehen';
$string['confirmdeletereport'] = 'Sind Sie sicher dass Sie diesen Bericht löschen wollen?';
$string['coursecategory'] = 'Kurs in Kategorie';
$string['coursechild'] = 'Kurse sind Metakurse von Kurs';
$string['coursededicationtime'] = 'Kurs Startzeit';
$string['coursefield'] = 'Kurs Feld';
$string['coursefieldorder'] = 'Kurs Feldreihenfolge';
$string['courseparent'] = 'Metakurse die ableiten von';
$string['courses'] = 'Kurse';
$string['coursestats'] = 'Kurs-Statistiken';
$string['currentreportcourse'] = 'Kurs des momentanen Berichts';
$string['currentreportcourse_summary'] = 'Der Kurs in dem der Bericht erstellt wurde';
$string['currentuser'] = 'Derzeitiger Nutzer';
$string['currentusercourses'] = 'Kurse in denen der momentane Nutzer eingeschrieben ist';
$string['currentusercourses_summary'] = 'Eine Liste der Kurse des momentanen Nutzers (nur sichtbare Kurse)';
$string['currentuserfinalgrade'] = 'Die Endnote des momentanen Nutzers im Kurs';
$string['currentuserfinalgrade_summary'] = 'Diese Spalte zeigt die Endnoten des momentanen Nutzers in den Kursen';
$string['currentuser_summary'] = 'Der Nutzer der diesen Bericht betrachtet';
$string['cuserfield'] = 'Nutzer Feldbedingung';
$string['custom'] = 'Angepasst';
$string['customdateformat'] = 'Angepasstes Datumsformat';
$string['customsql'] = 'Angepasste SQL Anfragen';
$string['date'] = 'Datum';
$string['dateformat'] = 'Datumsformat';
$string['direction'] = 'Richtung';
$string['disabled'] = 'Deaktiviert';
$string['donotshowtime'] = 'Keine Datumsinformationen zeigen';
$string['download'] = 'Download';
$string['downloadreport'] = 'Berichtdownload';
$string['enabled'] = 'Aktivieren';
$string['enablejsordering'] = 'JavaScript Sortierung aktivieren';
$string['enablejspagination'] = 'JavaScript Seitenumbruch aktivieren';
$string['endtime'] = 'Enddatum';
$string['error_field'] = 'Feld nicht erlaubt';
$string['error_operator'] = 'Operator nicht erlaubt';
$string['error_value_expected_integer'] = 'Ganzzahliger Wert erwartet';
$string['export_ods'] = 'Export ins ODS Format';
$string['exportoptions'] = 'Export Einstellungen';
$string['exportreport'] = 'Export Bericht';
$string['export_xls'] = 'Export ins XLS Format';
$string['fcoursefield'] = 'Kurs Feldfilter';
$string['field'] = 'Feld';
$string['filter'] = 'Filter';
$string['filter_all'] = 'Alle';
$string['filter_apply'] = 'Bestätigen';
$string['filtercategories'] = 'Filter-Kategorien';
$string['filtercategories_summary'] = 'Nach Kategorie filtern';
$string['filtercourses'] = 'Kurse';
$string['filtercourses_summary'] = 'Dieser Filter zeigt eine Liste von Kursen. Es kann immer nur einer der Kurse ausgewählt sein.';
$string['filters'] = 'Filter';
$string['filterstartendtime_summary'] = 'Start/End-Datum Filter';
$string['fixeddate'] = 'Festes Datum';
$string['footer'] = 'Fußzeile';
$string['forcemidnight'] = 'Mitternacht erzwingen';
$string['fuserfield'] = 'Nutzer Feldfilter';
$string['globalstatsshouldbeenabled'] = 'Seitenstatistik muss aktiviert sein. Gehe zu Admin-> Server-> Statistiken';
$string['groupseries'] = 'Datenreihen gruppieren';
$string['groupvalues'] = 'Gleiche Werte gruppieren(summieren)';
$string['header'] = 'Kopfzeile';
$string['importreport'] = 'Bericht importieren';
$string['includesubcats'] = 'Unterkategorien einschließen';
$string['jsordering'] = 'JavaScript Sortierung';
$string['jsordering_help'] = 'JavaScript Sortierung erlaubt das Sortieren im Bericht ohne Neuladen der Seite.';
$string['line'] = 'Liniendiagramm';
$string['linesummary'] = 'Linien diagramm mit mehreren Datenreihen';
$string['listofsqlreports'] = '<a href="http://docs.moodle.org/en/ad-hoc_contributed_reports" target="_blank">Liste von SQL Anfragen für Berichte</a>';
$string['managereports'] = 'Berichte verwalten';
$string['max'] = 'Maximum';
$string['min'] = 'Minimum';
$string['missingcolumn'] = 'Eine Spalte wird benötigt';
$string['module'] = 'Module';
$string['newreport'] = 'Neuer Bericht';
$string['nocalcsyet'] = 'Keine Berechnungen bis jetzt';
$string['nocolumnsyet'] = 'Keine Spalten bis jetzt';
$string['noconditionsyet'] = 'Keine Bedingungen bis jetzt';
$string['noexplicitprefix'] = 'Kein explizites prefix';
$string['nofiltersyet'] = 'Keine Filter bis jetzt';
$string['nofilteryet'] = 'Keine Filter bis jetzt';
$string['noorderingyet'] = 'Keine Sortierung bis jetzt';
$string['nopermissionsyet'] = 'Keine Rechte bis jetzt';
$string['noplotyet'] = 'Keine Diagramme bis jetzt';
$string['norecordsfound'] = 'Keine Einträge gefunden';
$string['noreportsavailable'] = 'Keine Berichte verfügbar';
$string['norowsreturned'] = 'Keine Zeilen zurückgeliefert';
$string['nosemicolon'] = 'Kein Semikolon';
$string['notallowedwords'] = 'Nicht erlaubte Wörter';
$string['operator'] = 'Operator';
$string['ordering'] = 'Sortierung';
$string['pagination'] = 'Seitenumbruch';
$string['pagination_help'] = 'Anzahl der Datensätz je Seite. Null bedeutet keine Beschränkung.';
$string['parentcategory'] = 'Oberkategorie';
$string['permissions'] = 'Rechte';
$string['pie'] = 'Kreisdiagramm';
$string['pieareaname'] = 'Name';
$string['pieareavalue'] = 'Wert';
$string['piesummary'] = 'Ein Kreisdiagramm';
$string['plot'] = 'Diagramme erzeugen';
$string['pluginname'] = 'Konfigurierbare Berichte';
$string['previousdays'] = 'Vergangene Tage';
$string['previousend'] = 'Beendet vor';
$string['previousstart'] = 'Beginnend vor';
$string['printreport'] = 'Bericht drucken';
$string['puserfield'] = 'Nutzer Feld abhängig';
$string['puserfield_summary'] = 'Nutzer mit dem ausgewählten Wert im ausgewählten Feld';
$string['queryfailed'] = 'Anfrage gescheitert';
$string['querysql'] = 'SQL Anfrage';
$string['report'] = 'Bericht';
$string['report_categories'] = 'Kategorien-Bericht';
$string['reportcolumn'] = 'Spalte aus anderem Bericht';
$string['report_courses'] = 'Kurs Bericht';
$string['reports'] = 'Berichte';
$string['reportscapabilities'] = 'Berechtigungsbericht';
$string['reportscapabilities_summary'] = 'Nutzer mit der Möglichkeit moodle/site:viewreports aktiviert';
$string['report_sql'] = 'SQL Bericht';
$string['reporttable'] = 'Bericht Tabelle';
$string['reporttable_help'] = '<p>Dies ist die Breite der Tabelle in der die Ergebnisse angezeigt werden.</p> <p>Wenn Sie ein Template benutzen wird diese Option nicht verwendet.</p>';
$string['report_timeline'] = 'Zeireihen-Bericht';
$string['report_users'] = 'Nutzer-Bericht';
$string['roleincourse'] = 'Nutzer mit der/n gewählten Rolle/n im Kurs';
$string['roleusersn'] = 'Anzahl der Nutzer mit der Rolle...';
$string['serieid'] = 'Datenreihe';
$string['startendtime'] = 'Start/End-Datumfilter';
$string['starttime'] = 'Startdatum';
$string['stat'] = 'Statistik';
$string['statsactiveenrolments'] = 'Aktive(letzte Woche) Einschreibungen';
$string['statslogins'] = 'Logins auf der Plattform';
$string['statstotalenrolments'] = 'Alle Einschreibungen';
$string['sum'] = 'Summe';
$string['tablealign'] = 'Tabelle Ausrichtung';
$string['tablecellpadding'] = 'Tabellen Zellfüllung';
$string['tablecellspacing'] = 'Tabellen Zellzwischenraum';
$string['tableclass'] = 'Tabellen Klasse';
$string['tablewidth'] = 'Tabellen Breite';
$string['template'] = 'Template';
$string['template_marks'] = 'Template Markierungen';
$string['template_marks_help'] = '<p>Sie können folgende Platzhalter im Template benutzen:</p> <ul> <li>##reportname## - um den Templatenamen ein zufügen</li> <li>##reportsummary## - um die Template Zusammenfassung einzufügen</li> <li>##graphs## - um Diagramme einzufügen</li> <li>##exportoptions## - um die Exportfunktionen einzufügen</li> <li>##calculationstable## - um die Berechnungstabelle einzufügen</li> <li>##pagination## - um die Seiten Nummerierung einzufügen </li> </ul>';
$string['templaterecord'] = 'Vorlage speichern';
$string['timeinterval'] = 'Zeitintervall';
$string['timeline'] = 'Zeitlinie';
$string['timemode'] = 'Zeitmodus';
$string['type'] = 'Typ des Berichts';
$string['typeofreport'] = 'Typ des Berichts';
$string['typeofreport_help'] = 'Wählen Sie die Art des Reports, den Sie erstellen wollen.';
$string['userfield'] = 'Nutzerprofilfeld';
$string['userfieldorder'] = 'Nutzerfeld Sortierung';
$string['usermodactions'] = 'Nutzermodul Aktionen';
$string['usermodoutline'] = 'Nutzermodul Übersichtsstatistiken';
$string['usersincoursereport'] = 'Jeder Nutzer des Kurses';
$string['usersincoursereport_summary'] = 'Jeder Nutzer des Kurses';
$string['usersincurrentcourse'] = 'Nutzer des Kurses';
$string['usersincurrentcourse_summary'] = 'Nutzer mit der ausgewählten Rolle im Kurs';
$string['userstats'] = 'Nutzerstatistiken';
$string['value'] = 'Wert';
$string['viewreport'] = 'Bericht ansehen';
$string['xaxis'] = 'X-Achse';
$string['yaxis'] = 'Y-Achse';
$string['youmustselectarole'] = 'Mindestens eine Rolle wird benötigt';
