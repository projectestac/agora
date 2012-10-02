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
 * Strings for component 'portfolio', language 'de', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = 'Aktiven Export abbrechen';
$string['activeportfolios'] = 'Aktive Portfolios';
$string['addalltoportfolio'] = 'Alles ins Portfolio exportieren';
$string['addnewportfolio'] = 'Neues Portfolio hinzufügen';
$string['addtoportfolio'] = 'Ins Portfolio exportieren';
$string['alreadyalt'] = 'Export läuft - zum Abbrechen bitte hier klicken';
$string['alreadyexporting'] = 'Ein Portfolio-Export wird gerade ausgeführt. Bevor Sie weiterarbeiten können, muss dieser Export erst abgeschlossen oder abgebrochen werden. Soll der Export fortgesetzt werden? (Zum Abbrechen \'Nein\' anklicken)';
$string['availableformats'] = 'Mögliche Export-Formate';
$string['callbackclassinvalid'] = 'Die festgelegte Rückfrageklass war ungültig oder nicht Teil der portfolio_caller Hierarchie';
$string['callercouldnotpackage'] = 'Fehler beim Packen Ihrer Export-Daten: {$a}';
$string['cannotsetvisible'] = 'Kann nicht auf sichtbar gesetzt werden. Plugin wurde vollständig deaktiviert, da eine Fehlkonfiguration entdeckt wurde.';
$string['commonportfoliosettings'] = 'Allgemeine Portfolioeinstellungen';
$string['commonsettingsdesc'] = '<p>Wenn ein Transfer bestätigt wird mit der Feststellung, dass es moderat oder evtl. hohen Zeitumfang benötigt, weiß man nicht, ob der Teilnehmer die Zeit hat darauf zu warten, bis er vollständig ist oder nicht. </p><p> Größen bis moderat werden ausgeführt, ohne den Nutzer zu fragen. Ist der Datentransfer größer kann dem Nutzer angeboten werden, ihn zu informieren, dass es länger dauern kann. </p><p>Einige Plugintypen werden diesen Mechanismus ignorieren und den Datentransfer in die Warteliste einreihen. </p>';
$string['configexport'] = 'Exportierte Daten konfigurieren';
$string['configplugin'] = 'Portfolio-Plugin konfigurieren';
$string['configure'] = 'Konfigurieren';
$string['confirmcancel'] = 'Sind Sie sicher, dass Sie den Export abbrechen wollen?';
$string['confirmexport'] = 'Bitte bestätigen Sie diesen Export';
$string['confirmsummary'] = 'Zusammenfassung Ihres Exports';
$string['continuetoportfolio'] = 'Am Portfolio weiterarbeiten';
$string['deleteportfolio'] = 'Portfolio-Instanz löschen';
$string['destination'] = 'Ziel';
$string['disabled'] = 'Entschuldigung, aber der Portfolio-Export ist für diese Website nicht aktiviert';
$string['disabledinstance'] = 'Nicht aktiviert';
$string['displayarea'] = 'Export-Bereich';
$string['displayexpiry'] = 'Zeitbegrenzung für die Übertragung';
$string['displayinfo'] = 'Export-Information';
$string['dontwait'] = 'Nicht warten';
$string['enabled'] = 'Portfolios';
$string['enableddesc'] = 'Diese Option erlaubt die Konfiguration externer Systeme, damit Nutzer/innen ihre Inhalte dorthin exportieren können.';
$string['err_uniquename'] = 'Der Portfolio-Name muss eindeutig sein (per Plugin)';
$string['exportalreadyfinished'] = 'Portfolio-Export vollständig!';
$string['exportalreadyfinisheddesc'] = 'Portfolio-Export vollständig!';
$string['exportcomplete'] = 'Portfolio-Export beendet!';
$string['exportedpreviously'] = 'Vorherige Exporte';
$string['exportexceptionnoexporter'] = 'Eine portfolio_export_exception wurde in einer aktiven Session ohne Exportobjekt erstellt.';
$string['exportexpired'] = 'Zeitbegrenzung beim Portfolio-Export überschritten';
$string['exportexpireddesc'] = 'Sie haben versucht, den Export von Daten zu wiederholen oder einen leeren Export zu starten. Versuchen Sie bitte, die Originaldaten noch einmal zu exportieren. Dieser Fehler kann auftreten, wenn Sie nach einem beendeten Export auf den Zurück-Button klicken oder eine falsche URL gespeichert wurde.';
$string['exporting'] = 'In ein Portfolio exportieren';
$string['exportingcontentfrom'] = 'Inhalte aus {$a} exportieren';
$string['exportingcontentto'] = 'Inhalt exportieren nach {$a}';
$string['exportqueued'] = 'Der Portfolio-Export wurde erfolgreich zur Übertragung bereitgestellt';
$string['exportqueuedforced'] = 'Der Portfolio-Export wurde erfolgreich zur Übertragung bereitgestellt. (Das andere System arbeitet die Übertragungen nacheinander ab)';
$string['failedtopackage'] = 'Keine Dateien zum Packen gefunden';
$string['failedtosendpackage'] = 'Fehler beim Senden Ihrer Daten an das gewählte Portfolio-System: \'{$a}\'';
$string['filedenied'] = 'Kein Zugriff zu dieser Datei';
$string['filenotfound'] = 'Datei nicht gefunden';
$string['fileoutputnotsupported'] = 'Überarbeiten des Dateioutputs ist für dieses Format nicht vorgesehen.';
$string['format_document'] = 'Dokument';
$string['format_file'] = 'Datei';
$string['format_image'] = 'Bild';
$string['format_leap2a'] = 'Leap2A Portfolioformat';
$string['format_mbkp'] = 'Moodle-Sicherung';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Präsentation';
$string['format_richhtml'] = 'HTML mit Anhängen';
$string['format_spreadsheet'] = 'Tabelle';
$string['format_text'] = 'Unformatierter Text';
$string['format_video'] = 'Video';
$string['hidden'] = 'Verborgen';
$string['highdbsizethreshold'] = 'Oberer Wert für Datensätze';
$string['highdbsizethresholddesc'] = 'Anzahl der Datensätze, oberhalb der eine sehr lange Übertragungszeit eingeplant werden muss';
$string['highfilesizethreshold'] = 'Oberer Wert für Dateigrößen';
$string['highfilesizethresholddesc'] = 'Dateigröße, oberhalb der eine sehr lange Übertragungszeit eingeplant werden muss';
$string['insanebody'] = 'Guten Tag,<br />
Sie erhalten diese Nachricht als Administrator von {$a->sitename}.

Einige Portfolio Plugin Instanzen wurden wegen fehlerhafter Konfiguration deaktiviert. Zur Zeit ist ein Export in diese Systeme durch Nutzer nicht möglich.

Folgende Portfolio Plugin Instanzen wurden deaktiviert:<br />
{$a->textlist}

Prüfen und korrigieren Sie die Einstellungen alsbald. Zugriff unter
{$a->fixurl}.';
$string['insanebodyhtml'] = '<p>Guten Tag,</p>
<p>Sie erhalten diese Nachricht als Administrator von {$a->sitename}.</p>
<p>Einige Portfolio Plugin Instanzen wurden wegen fehlerhafter Konfiguration deaktiviert. Zur Zeit ist ein Export in diese Systeme durch Nutzer nicht möglich. </p>
<p>Folgende Portfolio Plugin Instanzen wurden deaktiviert:<br />
{$a->htmllist}
</p>
<p>Prüfen und korrigieren Sie die Einstellungen möglichst bald über die
<a href="{$a->fixurl}">Portfoliokonfiguration</a></p>.';
$string['insanebodysmall'] = 'Guten Tag,

Sie erhalten diese Nachricht als Administrator von {$a->sitename}.<br />
Einige Portfolioplugin Instanzen wurden wegen fehlerhafter Konfiguration deaktiviert. Zur Zeit ist ein Export in diese Systeme durch Nutzer nicht möglich. <br />

Prüfen und korrigieren Sie die Einstellungen möglichst bald über den Zugriff auf
{$a->fixurl}.';
$string['insanesubject'] = 'Einige Portfolio-Instanzen wurden automatisch deaktiviert';
$string['instancedeleted'] = 'Portfolio erfolgreich gelöscht';
$string['instanceismisconfigured'] = 'Fehler in der Konfiguration der Portfolio-Instanz: {$a}';
$string['instancenotdelete'] = 'Löschen des Portfolios fehlgeschlagen';
$string['instancenotsaved'] = 'Speichern des Portfolios fehlgeschlagen';
$string['instancesaved'] = 'Portfolio erfolgreich gespeichert';
$string['invalidaddformat'] = 'Ungültiges Format für portfolio_add_button hinzugefügt.  ({$a}) Muss einer von  PORTFOLIO_ADD_XXX sein.';
$string['invalidbuttonproperty'] = 'Dieses Merkmal ({$a}) für portfolio_button konnte nicht gefunden werden';
$string['invalidconfigproperty'] = 'Dieses Konfigurationsmerkmal konnte nicht gefunden werden ({$a->property} in {$a->class})';
$string['invalidexportproperty'] = 'Dieses Konfigurationsmerkmal für den Export konnte nicht gefunden werden ({$a->property} in {$a->class})';
$string['invalidfileareaargs'] = 'Ungültige Werte für Dateibereich bei set_file_and_format_data - muss contextid, component, filearea und itemid enthalten';
$string['invalidformat'] = 'Ein ungültiges Format wird exportiert: {$a}';
$string['invalidinstance'] = 'Diese Portfolio-Instanz konnte nicht gefunden werden';
$string['invalidpreparepackagefile'] = 'Ungültiger Aufruf von prepare_package_file - eine oder mehrere Dateien müssen gewählt werden';
$string['invalidproperty'] = 'Dieses Merkmal konnte nicht gefunden werden ({$a->property} in {$a->class})';
$string['invalidsha1file'] = 'Ungültiger Aufruf von get_sha1_file - eine oder mehrere Dateien müssen gewählt werden';
$string['invalidtempid'] = 'Ungültige Export-ID. Sie könnte auch zu alt sein.';
$string['invaliduserproperty'] = 'Dieses Konfigurationsmerkmal für Nutzer konnte nicht gefunden werden ({$a->property} in {$a->class})';
$string['leap2a_emptyselection'] = 'Erforderliche Option nichtausgewählt';
$string['leap2a_entryalreadyexists'] = 'Sie versuchten einen Leap2A Eintrag mit der id ({$a}) hinzuzufügen, die bereite im Feed existiert.';
$string['leap2a_feedtitle'] = 'Leap2A-Export von Moodle für {$a}';
$string['leap2a_filecontent'] = 'Versuch den Inhalt eines leap2a Eintrags auf Datei zu setzen, statt der Subclass file.';
$string['leap2a_invalidentryfield'] = 'Sie versuchten ein Eintragsfeld festzulegen, das nicht existiert ({$a}) oder nicht direkt gesetzt werden kann.';
$string['leap2a_invalidentryid'] = 'Sie versuchten auf einen Eintrag mit einer nicht existierenden id zuzugreifen {$a}';
$string['leap2a_missingfield'] = 'Erforderlicher Leap2A Feldeintrag {$a} fehlt';
$string['leap2a_nonexistantlink'] = 'Ein Leap2A Eintrag ({$a->from}) versucht auf einen nicht bestehenden Eintrag ({$a->to}) mit rel {$a->rel} zu verknüpfen.';
$string['leap2a_overwritingselection'] = 'Der bestehende Eintrag \'{$a}\' für Auswahl in make_selection wird überschrieben';
$string['leap2a_selflink'] = 'Ein Leap2A Eintrag ({$a->id}) versucht auf sich selber zu verlinken mit rel {$a->rel}';
$string['logs'] = 'Transfer Logs';
$string['logsummary'] = 'Frühere erfolgreiche Transfers';
$string['manageportfolios'] = 'Portfolios verwalten';
$string['manageyourportfolios'] = 'Ihre Portfolios verwalten';
$string['mimecheckfail'] = 'Das Portfolioplugin {$a->plugin} unterstützt den Mimetyp {$a->mimetype} nicht';
$string['missingcallbackarg'] = 'Fehlendes Rücksprung-Argument {$a->arg} in {$a->class}';
$string['moderatedbsizethreshold'] = 'Mittlerer Wert für Datensätze';
$string['moderatedbsizethresholddesc'] = 'Anzahl der Datensätze, oberhalb der eine mittlere Übertragungszeit in Betracht gezogen werden muss';
$string['moderatefilesizethreshold'] = 'Oberer Wert für Dateigrößen';
$string['moderatefilesizethresholddesc'] = 'Dateigröße, oberhalb der eine mittlere Übertragungszeit eingeplant werden muss';
$string['multipleinstancesdisallowed'] = 'Versuch eine weitere Instanz von einem Plugin zu erstellen, welches mehrere Instanzen nicht zulässt ({$a})';
$string['mustsetcallbackoptions'] = 'Sie müssen die Rückfrageoption entweder im portfolio_add_button Ersteller oder mit der  set_callback_options Methode nutzen';
$string['noavailableplugins'] = 'Entschuldigung, aber es gibt keine verfügbaren Portfolios, in die Sie exportieren könnten';
$string['nocallbackclass'] = 'Callbackklasse für ({$a}) nicht gefunden';
$string['nocallbackfile'] = 'Im Modul von dem Sie etwas exportieren müssen stimmtetwas nicht. Eine benötigte Datei wurde nicht gefunden ({$a}).';
$string['noclassbeforeformats'] = 'Die Callbackklasse muss gesetzt werden bevor set_formats im portfolio_button aufgerufen wird. ';
$string['nocommonformats'] = 'Kein gemeinsames Format zwischen den verfügbaren Portfolioplugins und der abfragenden Stelle {$a->location} (Abfrager unterstützt {$a->formats})';
$string['noinstanceyet'] = 'Sie haben noch nichts ausgewählt';
$string['nologs'] = 'Es gibt keine Logs zum Anzeigen!';
$string['nomultipleexports'] = 'Das Portfolio ({$a->plugin}) unterstützt keinen gleichzeitigen mehrfachen Export. Bitte beenden Sie den <a href="{$a->link}">laufenden Export</a> und probieren Sie es nochmal.';
$string['nonprimative'] = 'Ein Nicht-Grundwert wurde als Callback-Argument für portfolio_add_button eingefügt. Die Ausführung wurde abgebrochen. Der Schlüssel ist {$a->key} und der Wert ist {$a->value}';
$string['nopermissions'] = 'Entschuldigung, aber Sie besitzen nicht die nötigen Rechte, um Dateien aus diesem Bereich zu exportieren';
$string['notexportable'] = 'Entschuldigung, aber der Datentyp, den Sie gerade versuchen zu exportieren, lässt dies nicht zu';
$string['notimplemented'] = 'Entschuldigung, aber Sie versuchen Daten in einem Format zu exportieren, das bisher noch nicht implementiert ist ({$a})';
$string['notyetselected'] = 'Nichts ausgewählt';
$string['notyours'] = 'Sie versuchen einen Portfolio-Export fortzusetzen, der Ihnen aber nicht gehört!';
$string['nouploaddirectory'] = 'Das temporäre Verzeichnis zum Sammeln Ihrer Daten konnte nicht angelegt werden';
$string['off'] = 'Verfügbar, aber verborgen';
$string['on'] = 'Verfügbar und sichtbar';
$string['plugin'] = 'Portfolio-Plugin';
$string['plugincouldnotpackage'] = 'Fehler beim Packen Ihrer Exportdaten: {$a}';
$string['pluginismisconfigured'] = 'Fehler in der Konfiguration des Portfolio-Plugins: {$a}';
$string['portfolio'] = 'Portfolio';
$string['portfolios'] = 'Portfolios';
$string['queuesummary'] = 'Aktuell wartende Transfers';
$string['returntowhereyouwere'] = 'Zur vorherigen Seite zurück';
$string['save'] = 'Speichern';
$string['selectedformat'] = 'Gewähltes Exportformat';
$string['selectedwait'] = 'Gewählt für Warteschlange?';
$string['selectplugin'] = 'Ziel auswählen';
$string['singleinstancenomultiallowed'] = 'Es ist nur eine Portfolioplugininstanz verfügbar. Sie unterstützt mehrere Exports zur gleichen Zeit nicht, Ein aktiver Export verwendet das Plugin derzeit!';
$string['somepluginsdisabled'] = 'Einige Portfolioplugins wurden vollständig deaktiviert. Sie können falsch konfiguriert sein. Es kann aber auch eine andere Ursache vorliegen.';
$string['sure'] = 'Sind Sie sicher, dass Sie \'{$a}\' löschen möchten? Dies kann nicht rückgängig gemacht werden!';
$string['thirdpartyexception'] = 'Beim Portfolioexport kam es zu einer Fehlermeldung vom empfangenen Tool [{$a}]. Dieser Fehler sollte korrigiert werden.';
$string['transfertime'] = 'Übertragungszeit';
$string['unknownplugin'] = 'Unbekannt (u.U. von Admin inzwischen entfernt)';
$string['wait'] = 'Warten';
$string['wanttowait_high'] = 'Es ist nicht empfehlenswert abzuwarten, bis der Transfer angeschlossen ist. Sie können es jedoch tun, wenn Sie wissen was Sie tun.';
$string['wanttowait_moderate'] = 'Möchten Sie auf das Ende dieser Übertragung warten? Dies könnte noch ein paar Minuten dauern...';
