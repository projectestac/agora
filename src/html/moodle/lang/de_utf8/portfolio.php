<?PHP // $Id: portfolio.php,v 1.8 2009/06/30 12:57:18 ralf-bonn Exp $ 
      // portfolio.php - created with Moodle 2.0 dev (Build: 20090409) (2009040100)


$string['activeexport'] = 'Aktiven Export abbrechen';
$string['activeportfolios'] = 'Aktive Portfolios';
$string['addalltoportfolio'] = 'Alles speichern...';
$string['addnewportfolio'] = 'Neues Portfolio hinzufügen';
$string['addtoportfolio'] = 'Speichern...';
$string['alreadyalt'] = 'Export läuft - zum Abbrechen bitte hier klicken';
$string['alreadyexporting'] = 'Ein Portfolio-Export wird gerade ausgeführt. Bevor Sie weiterarbeiten können, muss dieser Export erst abgeschlossen oder abgebrochen werden. Soll der Export fortgesetzt werden? (Zum Abbrechen \'Nein\' anklicken)';
$string['availableformats'] = 'Mögliche Export-Formate';
$string['callercouldnotpackage'] = 'Fehler beim Packen Ihrer Export-Daten: $a';
$string['cannotsetvisible'] = 'Kann nicht auf sichtbar gesetzt werden. Plugin wurde vollständig deaktiviert, da eine Fehlkonfiguration entdeckt wurde.';
$string['configexport'] = 'Exportierte Daten konfigurieren';
$string['configplugin'] = 'Portfolio-Plugin konfigurieren';
$string['configure'] = 'Konfigurieren';
$string['confirmexport'] = 'Bitte bestätigen Sie diesen Export';
$string['confirmsummary'] = 'Zusammenfassung Ihres Exports';
$string['continuetoportfolio'] = 'Am Portfolio weiterarbeiten';
$string['deleteportfolio'] = 'Portfolio-Instanz löschen';
$string['destination'] = 'Ziel';
$string['disabled'] = 'Entschuldigung, aber der Portfolio-Export ist für diese Website nicht aktiviert';
$string['displayarea'] = 'Export-Bereich';
$string['displayexpiry'] = 'Zeitbegrenzung für die Übertragung';
$string['displayinfo'] = 'Export-Information';
$string['dontwait'] = 'Nicht warten';
$string['enabled'] = 'Portfolios aktivieren';
$string['enableddesc'] = 'Dies erlaubt Admins die Konfiguration von Remote-Systemen, damit Nutzer/innen ihre Inhalte dorthin exportieren können';
$string['err_uniquename'] = 'Der Portfolio-Name muss eindeutig sein (per Plugin)';
$string['exportcomplete'] = 'Portfolio-Export beendet!';
$string['exportedpreviously'] = 'Vorherige Exporte';
$string['exportexceptionnoexporter'] = 'Eine portfolio_export_exception wurde in einer aktiven Session ohne Exportobjekt erstellt.';
$string['exportexpired'] = 'Zeitbegrenzung beim Portfolio-Export überschritten';
$string['exportexpireddesc'] = 'Sie haben versucht, den Export von Daten zu wiederholen oder einen leeren Export zu starten. Versuchen Sie bitte, die Originaldaten noch einmal zu exportieren. Dieser Fehler kann auftreten, wenn Sie nach einem beendeten Export auf den Zurück-Button klicken oder eine falsche URL gespeichert wurde.';
$string['exporting'] = 'In ein Portfolio exportieren';
$string['exportingcontentfrom'] = 'Inhalte aus $a exportieren';
$string['exportqueued'] = 'Der Portfolio-Export wurde erfolgreich zur Übertragung bereitgestellt';
$string['exportqueuedforced'] = 'Der Portfolio-Export wurde erfolgreich zur Übertragung bereitgestellt. (Das andere System arbeitet die Übertragungen nacheinander ab)';
$string['failedtopackage'] = 'Keine Dateien zum Packen gefunden';
$string['failedtosendpackage'] = 'Fehler beim Senden Ihrer Daten an das gewählte Portfolio-System: \'$a\'';
$string['filedenied'] = 'Kein Zugriff zu dieser Datei';
$string['filenotfound'] = 'Datei nicht gefunden';
$string['format_file'] = 'Datei';
$string['format_image'] = 'Bild';
$string['format_mbkp'] = 'Moodle-Sicherung';
$string['format_plainhtml'] = 'HTML';
$string['format_richhtml'] = 'HTML mit Anhängen';
$string['format_text'] = 'Unformatierter Text';
$string['format_video'] = 'Video';
$string['hidden'] = 'Verborgen';
$string['highdbsizethreshold'] = 'Oberer Wert für Datensätze';
$string['highdbsizethresholddesc'] = 'Anzahl der Datensätze, oberhalb der eine sehr lange Übertragungszeit eingeplant werden muss';
$string['highfilesizethreshold'] = 'Oberer Wert für Dateigrößen';
$string['highfilesizethresholddesc'] = 'Dateigröße, oberhalb der eine sehr lange Übertragungszeit eingeplant werden muss';
$string['insanebody'] = 'Guten Tag,<br /> 
Sie erhalten diese Nachricht als Administrator von $a->sitename.<br />
Einige Portfolioplugin Instanzen wurden wegen fehlerhafter Konfiguration deaktiviert. Zur Zeit ist ein Export in diese Systeme durch Nutzer nicht möglich. <br />
Deaktiviert wurden:<br />
$a->textlist

Prüfen und korrigieren Sie die Einstellungen alsbald. Zugriff unter
$a->fixurl.';
$string['insanebodyhtml'] = '<p>Guten Tag,</p>
<p>Sie erhalten diese Nachricht als Administrator von $a->sitename.</p>
$a->htmllist
<p>Prüfen und korrigieren Sie die Einstellungen alsbald. Zugriff in der 
<a href=\"$a->fixurl\"> Portfoliokonfiguration</a></p>.';
$string['insanebodysmall'] = 'Guten Tag,

Sie erhalten diese Nachricht als Administrator von $a->sitename.<br />
Einige Portfolioplugin Instanzen wurden wegen fehlerhafter Konfiguration deaktiviert. Zur Zeit ist ein Export in diese Systeme durch Nutzer nicht möglich. <br />

Prüfen und korrigieren Sie die Einstellungen alsbald. Zugriff unter
$a->fixurl.';
$string['insanesubject'] = 'Einige Portfolio-Instanzen wurden automatisch deaktiviert';
$string['instancedeleted'] = 'Portfolio erfolgreich gelöscht';
$string['instanceismisconfigured'] = 'Fehler in der Konfiguration der Portfolio-Instanz: $a';
$string['instancenotdelete'] = 'Löschen des Portfolios fehlgeschlagen';
$string['instancenotsaved'] = 'Speichern des Portfolios fehlgeschlagen';
$string['instancesaved'] = 'Portfolio erfolgreich gespeichert';
$string['invalidbuttonproperty'] = 'Dieses Merkmal ($a) für portfolio_button konnte nicht gefunden werden';
$string['invalidconfigproperty'] = 'Dieses Konfigurationsmerkmal konnte nicht gefunden werden ($a->property in $a->class)';
$string['invalidexportproperty'] = 'Dieses Konfigurationsmerkmal für den Export konnte nicht gefunden werden ($a->property in $a->class)';
$string['invalidformat'] = 'Ein ungültiges Format wird exportiert: $a';
$string['invalidinstance'] = 'Diese Portfolio-Instanz konnte nicht gefunden werden';
$string['invalidproperty'] = 'Dieses Merkmal konnte nicht gefunden werden ($a->property in $a->class)';
$string['invalidtempid'] = 'Ungültige Export-ID. Sie könnte auch zu alt sein.';
$string['invaliduserproperty'] = 'Dieses Konfigurationsmerkmal für Nutzer konnte nicht gefunden werden ($a->property in $a->class)';
$string['logs'] = 'Transfer Logs';
$string['logsummary'] = 'Frühere erfolgreiche Transfers';
$string['manageportfolios'] = 'Portfolios verwalten';
$string['manageyourportfolios'] = 'Ihre Portfolios verwalten';
$string['missingcallbackarg'] = 'Fehlendes Rücksprung-Argument $a->arg in $a->class';
$string['moderatedbsizethreshold'] = 'Mittlerer Wert für Datensätze';
$string['moderatedbsizethresholddesc'] = 'Anzahl der Datensätze, oberhalb der eine mittlere Übertragungszeit in Betracht gezogen werden muss';
$string['moderatefilesizethreshold'] = 'Oberer Wert für Dateigrößen';
$string['moderatefilesizethresholddesc'] = 'Dateigröße, oberhalb der eine mittlere Übertragungszeit eingeplant werden muss';
$string['noavailableplugins'] = 'Entschuldigung, aber es gibt keine verfügbaren Portfolios, in die Sie exportieren könnten';
$string['nopermissions'] = 'Entschuldigung, aber Sie besitzen nicht die nötigen Rechte, um Dateien aus diesem Bereich zu exportieren';
$string['notexportable'] = 'Entschuldigung, aber der Datentyp, den Sie gerade versuchen zu exportieren, lässt dies nicht zu';
$string['notimplemented'] = 'Entschuldigung, aber Sie versuchen Daten in einem Format zu exportieren, das bisher noch nicht implementiert ist ($a)';
$string['notyetselected'] = 'Nichts ausgewählt';
$string['notyours'] = 'Sie versuchen einen Portfolio-Export fortzusetzen, der Ihnen aber nicht gehört!';
$string['nouploaddirectory'] = 'Das temporäre Verzeichnis zum Sammeln Ihrer Daten konnte nicht angelegt werden';
$string['plugin'] = 'Portfolio-Plugin';
$string['plugincouldnotpackage'] = 'Fehler beim Packen Ihrer Exportdaten: $a';
$string['pluginismisconfigured'] = 'Fehler in der Konfiguration des Portfolio-Plugins: $a';
$string['portfolio'] = 'Portfolio';
$string['portfolios'] = 'Portfolios';
$string['queuesummary'] = 'Aktuell wartende Transfers';
$string['returntowhereyouwere'] = 'Zur vorherigen Seite zurück';
$string['save'] = 'Speichern';
$string['selectedformat'] = 'Gewähltes Exportformat';
$string['selectedwait'] = 'Gewählt für Warteschlange?';
$string['selectplugin'] = 'Ziel auswählen';
$string['sure'] = 'Sind Sie sicher, dass Sie \'$a\' löschen möchten? Dies kann nicht rückgängig gemacht werden!';
$string['transfertime'] = 'Übertragungszeit';
$string['unknownplugin'] = 'Unbekannt (u.U. von Admin inzwischen entfernt)';
$string['wait'] = 'Warten';
$string['wanttowait_high'] = 'Es ist nicht empfehlenswert abzuwarten, bis der Transfer angeschlossen ist. Sie können es jedoch tun, wenn Sie wissen was Sie tun.';
$string['wanttowait_moderate'] = 'Möchten Sie auf das Ende dieser Übertragung warten? Dies könnte noch ein paar Minuten dauern...';
$string['format_html'] = 'HTML'; // ORPHANED

?>
