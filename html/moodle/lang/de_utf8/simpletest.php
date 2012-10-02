<?PHP // $Id: simpletest.php,v 1.14 2010/02/15 18:51:05 krause Exp $ 
      // simpletest.php - created with Moodle 2.0 dev (Build: 20100215) (2010021400)


$string['addconfigprefix'] = 'Prefix zur Konfigurationsdatei hinzufügen';
$string['all'] = 'Alle';
$string['codecoverageanalysis'] = 'Code-Coverage-Analyse durchführen';
$string['codecoveragecompletereport'] = '(Vollständigen Code-Coverage-Bericht ansehen)';
$string['codecoveragedisabled'] = 'Auf diesem Server kann Code-Coverage nicht aktiviert werden (fehlende PHP-Extension xdebug)';
$string['codecoveragelatestdetails'] = '(am $a->date mit $a->files Dateien - $a->percentage covered)';
$string['codecoveragelatestreport'] = 'Letzten vollständigen Code-Coverage-Bericht ansehen';
$string['confignonwritable'] = 'Die Datei config.php kann nicht geändert werden. Ändern Sie entweder die Schreibberechtigung für die Datei oder ändern Sie den Dateiinhalt durch manuelles Einfügen des folgenden Inhalts vor dem abschließenden  php Tag.
<br />
&#36;CFG->unittestprefix = \'tst_\' // Change tst_ to a prefix of your choice, different from \$CFG->prefix';
$string['coveredlines'] = 'Gecoverte Zeilen';
$string['coveredpercentage'] = 'Code-Coverage insgesamt';
$string['deletingnoninsertedrecord'] = 'Versuch einen Datensatz zu löschen, der nicht beim Unittest eingefügt wurde (id $a->id in Tabelle $a->table)';
$string['deletingnoninsertedrecords'] = 'Versuch Datensätze zu löschen, die nicht beim Unittest eingefügt wurden (in Tabelle $a->table)';
$string['droptesttables'] = 'Testtabellen löschen';
$string['exception'] = 'Ausnahme';
$string['executablelines'] = 'Ausführbare Zeilen';
$string['fail'] = 'Gescheitert';
$string['ignorefile'] = 'Tests in der Datei ignorieren';
$string['ignorethisfile'] = 'Tests wiederholen und dabei diese Testdatei ignorieren';
$string['installtesttables'] = 'Testtabellen installieren';
$string['moodleunittests'] = 'Moodle-Systemtests: $a';
$string['notice'] = 'Hinweis';
$string['onlytest'] = 'Tests nur durchführen in';
$string['pass'] = 'Bestanden';
$string['pathdoesnotexist'] = 'Der Pfad $a existiert nicht.';
$string['prefix'] = 'Prefix für die Testtabellen';
$string['prefixnotset'] = 'Der Prefix der Unittest-Datenbanktabelle ist nicht konfiguriert. Tragen Sie einen Wert in das Feld ein, damit es in die Datei config.php aufgenommen wird.';
$string['reinstalltesttables'] = 'Testtabellen neu installieren';
$string['retest'] = 'Tests wiederholen';
$string['retestonlythisfile'] = 'Nur diese Testdatei wiederholen';
$string['runall'] = 'Tests aus allen Testdateien wiederholen';
$string['runat'] = 'Durchlauf $a';
$string['runonlyfile'] = 'Nur Tests aus dieser Datei durchführen';
$string['runonlyfolder'] = 'Nur Tests aus diesem Ordner durchführen';
$string['runtests'] = 'Tests durchführen';
$string['rununittests'] = 'Systemtests durchführen';
$string['showpasses'] = 'Alle Testergebnisse anzeigen';
$string['showsearch'] = 'Suchfunktion für die Testdateien anzeigen';
$string['skip'] = 'Auslassen';
$string['stacktrace'] = 'Verarbeitung beobachten:';
$string['summary'] = '{$a->run}/{$a->total} der Testfälle durchgeführt: <strong>{$a->passes}</strong> bestanden, <strong>{$a->fails}</strong> gescheitert und <strong>{$a->exceptions}</strong> herausgenommen.';
$string['tablesnotsetup'] = 'Die Unittesttabellen sind noch nicht angelegt. Wollen Sie sie jetzt erstellen lassen?';
$string['testdboperations'] = 'Test der Datenbankoperationen';
$string['testtablescsvfileunwritable'] = 'Die CSV Datei mit Testtabellen ist nicht erstellbar ($a->filename)';
$string['testtablesneedupgrade'] = 'Die Test Datenbanktabellen müssen aktualisiert werden. Wollen Sie mit der Aktualisierung nun fortfahren?';
$string['testtablesok'] = 'Die Test Datenbanktabellen wurden erfolgreich angelegt.';
$string['thorough'] = 'Vollständigen Testlauf durchführen (dies könnte lange dauern!)';
$string['timetakes'] = 'Verbrauchte Zeit: $a';
$string['totallines'] = 'Zeilen insgesamt';
$string['uncaughtexception'] = 'Ein unerwartetes Problem ist aufgetreten [{$a->getMessage()}] in [{$a->getFile()}:{$a->getLine()}]. Der Testlauf wurde abgebrochen.';
$string['uncoveredlines'] = 'Entpackte Zeilen';
$string['unittestprefixsetting'] = 'Unit test prefix: <strong>$a->unittestprefix</strong> (Ändern Sie die Datei config.php).';
$string['unittests'] = 'Systemtests';
$string['updatingnoninsertedrecord'] = 'Updateversuch eines Datensatzes, der nicht durch Unittest eingefügt wurde  (id $a->id in Tabelle $a->table).';
$string['version'] = 'In Gebrauch: <a href=\"http://sourceforge.net/projects/simpletest/\">SimpleTest</a> - Version $a.';

?>
