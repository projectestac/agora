<?PHP // $Id: simpletest.php,v 1.6 2009/12/14 09:18:47 mudrd8mz Exp $ 
      // simpletest.php - created with Moodle 2.0 dev (Build: 20090210) (2009012901)


$string['addconfigprefix'] = 'Voeg een prefix toe aan het configuratiebestand';
$string['all'] = 'ALLE';
$string['confignonwritable'] = 'Het bestand config.php is niet beschrijfbaar door de webserver. Ofwel moet je de rechten  veranderen, ofwel moet je het bewerken met de juiste gebruikersaccount en volgende lijn toevoegen voor de afsluitende php-tag:<br />
$CFG->unittestprefix = \'tst_\' // Wijzig tst_ naar een prefix die je verkiest, anders dan \$CFG->prefix';
$string['deletingnoninsertedrecord'] = 'Een record geprobeerd te verwijderen die niet toegevoegd was door deze unit test (id $a->id in tabel $a->table).';
$string['deletingnoninsertedrecords'] = 'Records proberen te verwijderen die niet toegevoegd waren door deze unit test (uit tabel $a->table).';
$string['droptesttables'] = 'Verwijder testtabellen';
$string['exception'] = 'Uitzondering';
$string['fail'] = 'Mislukt';
$string['ignorefile'] = 'Negeer testen in het bestand';
$string['ignorethisfile'] = 'Test opnieuw en negeer dit testbestand';
$string['installtesttables'] = 'Installeer testtabellen';
$string['moodleunittests'] = 'Moodle unit testen: $a';
$string['notice'] = 'Opmerking';
$string['onlytest'] = 'Laat testen allen lopen in';
$string['pass'] = 'Gelukt';
$string['pathdoesnotexist'] = 'Het pad \'$a\' bestaat niet.';
$string['prefix'] = 'Voorvoegsel voor unit testtabellen';
$string['prefixnotset'] = 'Het unit testtabellenprefix is niet geconfigureerd. Vul dit formulier in om het toe te voegen aan config.php';
$string['reinstalltesttables'] = 'Herinstalleer testtabellen';
$string['retest'] = 'Doe de testen opnieuw';
$string['retestonlythisfile'] = 'Doe de testen opnieuw met dit testbestand';
$string['runall'] = 'Doe de testen opnieuw met alle testbestanden';
$string['runat'] = 'Doe de test op $a';
$string['runonlyfile'] = 'Doe enkel de testen in dit bestand';
$string['runonlyfolder'] = 'Doe enkel de testen in deze map';
$string['runtests'] = 'Doe de testen';
$string['rununittests'] = 'Doe de unit testen';
$string['showpasses'] = 'Toon zowel gelukt als mislukt';
$string['showsearch'] = 'Toon het zoeken naar testbestanden';
$string['stacktrace'] = 'Stack trace:';
$string['summary'] = '{$a->run}/{$a->total} testen volledig: <strong>{$a->passes}</strong> gelukt, <strong>{$a->fails}</strong> mislukt en <strong>{$a->exceptions}</strong> uitzonderingen';
$string['tablesnotsetup'] = 'Unit testtabellen zijn nog niet opgebouwd. Wil je dat nu doen?';
$string['testdboperations'] = 'Test databankoperaties';
$string['testtablescsvfileunwritable'] = 'Het CSV-bestand van de testtabellen is niet beschrijfbaar ($a->filename)';
$string['testtablesneedupgrade'] = 'De testtabellen moeten geüpgraded worden. Wil je nu verder gaan met die upgrade?';
$string['testtablesok'] = 'De testtabellen zijn met succes geïnstalleerd.';
$string['thorough'] = 'Doorloop een grondige test (kan traag zijn).';
$string['uncaughtexception'] = 'Onverwachte uitzondering [{$a->getMessage()}] in [{$a->getFile()}:{$a->getLine()}] TEST ONDERBROKEN.';
$string['unittestprefixsetting'] = 'Unit test prefix: <strong>$a->unittestprefix</strong> (Bewerk config.php om dit te wijzigen).';
$string['unittests'] = 'Unit testen';
$string['updatingnoninsertedrecord'] = 'Een record geprobeerd te updaten die niet toegevoegd was door deze unit test (id $a->id in tabel $a->table).';
$string['version'] = 'We gebruiken <a href=\"http://sourceforge.net/projects/simpletest/\">SimpleTest</a> version $a.';

?>
