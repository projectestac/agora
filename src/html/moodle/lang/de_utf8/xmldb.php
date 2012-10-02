<?PHP // $Id: xmldb.php,v 1.21 2010/02/15 18:51:05 krause Exp $ 
      // xmldb.php - created with Moodle 2.0 dev (Build: 20100215) (2010021400)


$string['actual'] = 'Aktuell';
$string['aftertable'] = 'Nach Tabelle:';
$string['back'] = 'Zurück';
$string['backtomainview'] = 'Zurück zur Hauptübersicht';
$string['binaryincorrectlength'] = 'Falsche Feldlänge (binary)';
$string['cannotuseidfield'] = 'Feld \'id\' kann nicht eingefügt werden. Es handelt sich um eine Spalte, die automatisch nummeriert wird.';
$string['change'] = 'Ändern';
$string['charincorrectlength'] = 'Falsche Feldlänge (char)';
$string['check_bigints'] = 'Ungültige DB-Werten suchen';
$string['check_defaults'] = 'Inkonsistente Defaultwerte suchen';
$string['check_foreign_keys'] = 'Suche nach Zerstörungen an Fremdschlüsseln';
$string['check_indexes'] = 'Fehlende Datenbank-Indizes suchen';
$string['checkbigints'] = 'Zahlen prüfen';
$string['checkdefaults'] = 'Defaults prüfen';
$string['checkforeignkeys'] = 'Fremdschlüssel prüfen';
$string['checkindexes'] = 'Indizes prüfen';
$string['completelogbelow'] = '(das vollständige Suchprotokoll folgt)';
$string['confirmcheckbigints'] = 'Diese Funktion sucht nach <a href=\"http://tracker.moodle.org/browse/MDL-11038\"> möglicherweise ungültigen Zahlenwerten</a> in Ihrem Moodle-Server und erzeugt automatisch die notwendigen SQL-Anweisungen, um die Werte in der Datenbank zu korrigieren (die SQL-Anweisungen werden erzeugt, aber nicht ausgeführt!). <br /><br />
Nachdem die Anweisungen erzeugt wurden, können Sie diese kopieren und sie sicher in Ihrer bevorzugten SQL-Oberfläche ausführen (vergessen Sie bitte nicht, Ihre Daten vorher zu sichern!!). <br /><br />
Es wird dringend empfohlen, auf die jeweils neueste Variante Ihrer Moodle-Version (1.8, 1.9, 2.x ...) zu updaten, bevor Sie die Suche nach ungültigen Werten durchführen.<br /><br />
Die Funktion führt selber keinerlei Aktionen mit der Datenbank durch (außer  lesend auf sie zuzugreifen), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmcheckdefaults'] = 'Diese Funktion sucht nach inkonsistenten Defaultwerten in der Datenbank und erstellt ein SQL-Statement zur Korrektur dieser Werte, ohne jedoch automatisch die SQL Anpassungen vorzunehmen. <br/><br/>
Wenn die Prüfung ausgeführt und das SQL Statement erstellt wurde können Sie mit dieses mit dem Werkzeug Ihrer Wahl in der Datenbank ausführen. Vorher unbedingt ein Backup der Datenbank erstellen. <br/><br/>
Es ist sehr wichtig zuvor die letzte (+Version) des Moodle Releases (1.8;1.9;2.x...) zu installieren, um nicht falsch integer-Werte zu verwenden. <br/><br/>
Diese Prüfung verändert keine Einstellungen und Inhalte in Ihrer Datenbank. Es werden nur bestehende Einstellungen gelesen. Die Prüfung kann also jederzeit ausgeführt werden.';
$string['confirmcheckforeignkeys'] = 'Diese Funktion sucht nach möglicherweise zerstörten Fremdschlüsseln, die in der install.xml definiert wurden. (Moodle generiert zur Zeit keine Fremdschlüssel in der Datenbank, da ungültige Daten verfügbar sein könnten.)<br /><br />
Es wird dringend empfohlen, die neueste verfügbare (+Version) zu Ihrem Moodle-Release (1.8, 1.9, 2.x ...) zu installieren, bevor Sie die Suche nach fehlenden Indizes starten.<br /><br />
Die Funktion führt keine SQL-Anweisungen auf Ihrer Datenbank aus (außer dass sie lesend zugreift), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmcheckindexes'] = 'Diese Funktion sucht nach möglicherweise fehlenden Indizes in Ihrem Moodle-Server, wobei die nötigen SQL-Anweisungen für ein Update automatisch erzeugt (aber nicht ausgeführt) werden. Nachdem die Anweisungen erzeugt sind, können Sie sie kopieren und in Ihrem bevorzugten SQL-Zugang ausführen.<br /><br />
Es wird dringend empfohlen, die neueste verfügbare +Version zu Ihrem Moodle-Release (1.8, 1.9, 2.x ...) zu installieren, bevor Sie die Suche nach fehlenden Indizes starten.<br /><br />
Die Funktion führt keine SQL-Anweisungen auf Ihrer Datenbank aus (außer dass sie lesend zugreift), so dass die Funktion zu jedem Zeitpunkt sicher ausgeführt werden kann.';
$string['confirmdeletefield'] = 'Sind Sie wirklich sicher, dass Sie dieses Feld löschen wollen:';
$string['confirmdeleteindex'] = 'Sind Sie wirklich sicher, dass Sie diesen Index löschen wollen:';
$string['confirmdeletekey'] = 'Sind Sie wirklich sicher, dass Sie diesen Schlüssel löschen wollen:';
$string['confirmdeletesentence'] = 'Sind Sie wirklich sicher, dass Sie diesen Satz löschen wollen:';
$string['confirmdeletestatement'] = 'Sind Sie wirklich sicher, dass Sie diese Anweisung und alle seine Sätze löschen wollen:';
$string['confirmdeletetable'] = 'Sind Sie wirklich sicher, dass Sie diese Tabelle löschen wollen:';
$string['confirmdeletexmlfile'] = 'Sind Sie wirklich sicher, dass Sie diese Datei löschen wollen:';
$string['confirmrevertchanges'] = 'Wollen sie wirklich die Änderungen rückgängig machen, die Sie vorgenommen haben an:';
$string['create'] = 'Erstellen';
$string['createtable'] = 'Tabelle erstellen:';
$string['defaultincorrect'] = 'Fehlerhafte Voreinstellung';
$string['delete'] = 'Löschen';
$string['delete_field'] = 'Feld löschen';
$string['delete_index'] = 'Index löschen';
$string['delete_key'] = 'Schlüssel löschen';
$string['delete_sentence'] = 'Satz löschen';
$string['delete_statement'] = 'Anweisung löschen';
$string['delete_table'] = 'Tabelle löschen';
$string['delete_xml_file'] = 'XML-Datei löschen';
$string['doc'] = 'Dokumentation';
$string['docindex'] = 'Dokumentationsindex';
$string['documentationintro'] = 'Diese Dokumentation wurde automatisch aus der Definition der XMLDB-Datenbank generiert. Sie ist ausschließlich in Englisch verfügbar.';
$string['down'] = 'Nach unten';
$string['duplicate'] = 'Kopieren';
$string['duplicatefieldname'] = 'Es existiert bereits ein anderes Feld mit diesem Namen';
$string['duplicatekeyname'] = 'Es existiert bereits ein anderer Schlüssel mit diesem Namen';
$string['edit'] = 'Bearbeiten';
$string['edit_field'] = 'Feld bearbeiten';
$string['edit_field_save'] = 'Feld sichern';
$string['edit_index'] = 'Index bearbeiten';
$string['edit_index_save'] = 'Index sichern';
$string['edit_key'] = 'Schlüssel bearbeiten';
$string['edit_key_save'] = 'Schlüssel sichern';
$string['edit_sentence'] = 'Satz bearbeiten';
$string['edit_sentence_save'] = 'Satz sichern';
$string['edit_statement'] = 'Anweisung bearbeiten';
$string['edit_table'] = 'Tabelle bearbeiten';
$string['edit_table_save'] = 'Tabelle sichern';
$string['edit_xml_file'] = 'XML-Datei bearbeiten';
$string['enumvaluesincorrect'] = 'Ungültige Feldwerte (enum)';
$string['expected'] = 'Erwartet';
$string['extensionrequired'] = 'Entschuldigung, aber für diese Aktion wird die PHP-Erweiterung \'$a\' benötigt. Bitte installieren Sie die Erweiterung, falls Sie dieses Feature benutzen möchten.';
$string['field'] = 'Feld';
$string['fieldnameempty'] = 'Feldname ist leer';
$string['fields'] = 'Felder';
$string['fieldsnotintable'] = 'Feld existiert nicht in der Tabelle';
$string['fieldsusedinkey'] = 'Das Feld wird als Schlüssel genutzt';
$string['filenotwriteable'] = 'Datei ist schreibgeschützt';
$string['fkviolationdetails'] = 'Fremdschlüssel $a->keyname in der Tabelle $a->tablename ist zerstört in $a->numviolations von $a->numrows Zeilen.';
$string['float2numbernote'] = 'Hinweis: Auch wenn Felder im Format \"float\" 100%%-ig durch XMLDB unterstützt werden, wird trotzdem die Migration ins Format \"number\" empfohlen.';
$string['floatincorrectdecimals'] = 'Falsche Anzahl von Nachkommazahlen (float)';
$string['floatincorrectlength'] = 'Falsche Feldlänge (float)';
$string['generate_all_documentation'] = 'Gesamte Dokumentation';
$string['generate_documentation'] = 'Dokumentation';
$string['gotolastused'] = 'Zur zuletzt genutzten Datei';
$string['incorrectfieldname'] = 'Falscher Name';
$string['index'] = 'Index';
$string['indexes'] = 'Indizes';
$string['integerincorrectlength'] = 'Falsche Feldlänge (integer)';
$string['key'] = 'Schlüssel';
$string['keys'] = 'Schlüssel';
$string['listreservedwords'] = 'Liste von reservierten Wörtern<br/>auf dem aktuellsten Stand: <a href=\"http://docs.moodle.org/en/XMLDB_reserved_words\" target=\"_blank\">XMLDB_reserved_words</a>';
$string['load'] = 'Laden';
$string['main_view'] = 'Hauptübersicht';
$string['masterprimaryuniqueordernomatch'] = 'Die Felder des externen (foreign) Schlüssels müssen in der gleichen Reihenfolge wie sie als UNIQUE KEY or in der Referenztabelle eingetragen sind.';
$string['missing'] = 'Fehlend';
$string['missingfieldsinsentence'] = 'Fehlende Felder in Satz';
$string['missingindexes'] = 'Fehlende Indizes gefunden';
$string['missingvaluesinsentence'] = 'Fehlende Werte in Satz';
$string['mustselectonefield'] = 'Sie müssen ein Feld auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['mustselectoneindex'] = 'Sie müssen einen Index auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['mustselectonekey'] = 'Sie müssen einen Schlüssel auswählen, um die damit verbundenen Aktionen zu sehen!';
$string['mysqlextracheckbigints'] = 'Unter MySQL werden zudem falsch gesetzte große Zahlwerte (bigints) geprüft. Der erforderliche SQL Code wird erstellt und ausgeführt, um alle zu fixen.';
$string['new_statement'] = 'Neue Anweisung';
$string['new_table_from_mysql'] = 'Neue Tabelle aus MySQL';
$string['newfield'] = 'Neues Feld';
$string['newindex'] = 'Neuer Index';
$string['newkey'] = 'Neuer Schlüssel';
$string['newsentence'] = 'Neuer Satz';
$string['newstatement'] = 'Neue Anweisung';
$string['newtable'] = 'Neue Tabelle';
$string['newtablefrommysql'] = 'Neue Tabelle aus MySQL';
$string['nomasterprimaryuniquefound'] = 'Die Spalte(n) mit Ihren externen Schlüsselverweisen müssen in einem primary oder unique KEY in der verknüpften Tabelle enthalten sein. Beachten Sie, dass eine Spalte in einem UNIQUE INDEX nicht ausreicht.';
$string['nomissingindexesfound'] = 'Es wurden keine fehlenden Indizes gefunden. Die Datenbank benötigt keine weitere Bearbeitung.';
$string['noviolatedforeignkeysfound'] = 'Keine zerstörten Fremdschlüssel gefunden.';
$string['nowrongdefaultsfound'] = 'Es wurden keine inkonsistenten Defaultwerte gefunden. die Datenbank benötigt keine weiter Bearbeitung.';
$string['nowrongintsfound'] = 'Es wurden keine ungültigen Zahlenwerte (integer) gefunden. Die Datenbank benötigt keine weitere Bearbeitung.';
$string['numberincorrectdecimals'] = 'Falsche Anzahl von Stellen (number)';
$string['numberincorrectlength'] = 'Falsche Feldlänge (number)';
$string['pendingchanges'] = 'Hinweis: Sie haben Veränderungen in dieser Datei vorgenommen. Sie können jederzeit gespeichert werden.';
$string['pendingchangescannotbesaved'] = 'Die Änderungen in dieser Datei können nicht gespeichert werden! Bitte prüfen Sie, dass das Verzeichnis und die darin enthaltene Datei \"install.xml\" eine Schreibbereichtigung für den Webserver besitzen.';
$string['pendingchangescannotbesavedreload'] = 'Die Änderungen in dieser Datei können nicht gespeichert werden! Bitte prüfen Sie, dass das Verzeichnis und die darin enthaltene Datei \"install.xml\" eine Schreibbereichtigung für den Webserver besitzen. Wenn Sie danach diese Seite neu laden, sollten Sie diese Änderungen speichern können.';
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
$string['sentences'] = 'Sätze';
$string['statements'] = 'Anweisungen';
$string['statementtable'] = 'Anweisungstabelle:';
$string['statementtype'] = 'Anweisungstyp:';
$string['table'] = 'Tabelle';
$string['tables'] = 'Tabellen';
$string['test'] = 'Test';
$string['textincorrectlength'] = 'Falsche Feldlänge (text)';
$string['unload'] = 'Löschen';
$string['up'] = 'Aufwärts';
$string['view'] = 'Ansicht';
$string['view_reserved_words'] = 'Reservierte Wörter anzeigen';
$string['view_structure_php'] = 'PHP-Struktur anzeigen';
$string['view_structure_sql'] = 'SQL-Struktur anzeigen';
$string['view_table_php'] = 'PHP-Tabelle anzeigen';
$string['view_table_sql'] = 'SQL-Tabelle anzeigen';
$string['viewedited'] = 'Bearbeitete anzeigen';
$string['vieworiginal'] = 'Original anzeigen';
$string['viewphpcode'] = 'PHP-Code anzeigen';
$string['viewsqlcode'] = 'SQL-Code anzeigen';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Zerstörte Fremdschlüssel';
$string['violatedforeignkeysfound'] = 'Zerstörte Fremdschlüssel gefunden';
$string['violations'] = 'Zerstörungen';
$string['wrong'] = 'Falsch';
$string['wrongdefaults'] = 'Falsche Defaults gefunden';
$string['wrongints'] = 'Falsche Zahlen gefunden';
$string['wronglengthforenum'] = 'Falsche Feldlänge (enum)';
$string['wrongnumberoffieldsorvalues'] = 'Falsche Anzahl von Feldern oder Werten in Satz';
$string['wrongreservedwords'] = 'Derzeit verwendete reservierte Wörter <br />(die Tabellennamen sind nicht wichtig, wenn \$CFG->prefix genutzt wird)';
$string['yesmissingindexesfound'] = 'Einige fehlende Indizes wurden in Ihrer Datenbank gefunden. Es folgen genauere Einzelheiten und die nötigen SQL-Anweisungen, die Sie mit Ihrem bevorzugten SQL-Werkzeug ausführen müssen, um alle Indizes zu erzeugen.<br /><br />
Es wird dringend empfohlen, die Suche nach fehlenden Indizes danach noch einmal auszuführen.';
$string['yeswrongdefaultsfound'] = 'Es wurden einige inkonsistente Defaultwerte in der Datenbank gefunden. Im folgenden stehen die Details und das erforderliche SQL Statement für den von Ihnen genutzt Datenbanktyp. Vergessen Sie nicht ein Backup zu erstellen, bevor Sie diese Änderungen ausführen.<br/> <br/>
Nachdem Sie das Statement ausgeführt haben, sollten sie diese Prüfung nochmals durchführen, um sicher zu gehen, ob nicht noch weitere Inkonsistenzen auftreten.';
$string['yeswrongintsfound'] = 'In Ihrer Datenbank wurden mehrere ungültige Zahlenwerte gefunden. Es folgen die Details und die benötigten SQL-Befehle, die Sie in Ihrer bevorzugten SQL-Oberfläche ausführen müssen, um die Fehler zu beheben (vergessen Sie bitte nicht, vor der Korrektur eine Sicherungskopie Ihrer Daten anzulegen!!)<br /><br />Nach der Ausführung wird dringend empfohlen, dieses Werkzeug erneut aufzurufen, um sicher zu stellen, dass keine ungültige Zahlenwerte mehr gefunden werden.';
$string['butis'] = 'ist aber'; // ORPHANED
$string['shouldbe'] = 'sollte sein'; // ORPHANED

?>
