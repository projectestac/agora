<?PHP // $Id: simpletest.php,v 1.7 2010/02/19 18:42:18 andreabix Exp $ 
      // simpletest.php - created with Moodle 2.0 dev (Build: 20100212) (2010020701)


$string['addconfigprefix'] = 'Aggiungi prefisso al file config';
$string['all'] = 'TUTTI';
$string['codecoverageanalysis'] = 'Esegui analisi di code coverage';
$string['codecoveragecompletereport'] = '(visualizza il report dell\'analisi)';
$string['codecoveragedisabled'] = 'In questo server non è possibile abilitare il code coverage (manca l\'estensione xdebug)';
$string['codecoveragelatestdetails'] = '(al $a->date su $a->files l\'analisi è al $a->percentage)';
$string['codecoveragelatestreport'] = 'visualizza il report di code coverage più recente';
$string['confignonwritable'] = 'Il file config.php non è scrivibile dal web server. Cambia i suoi attributi, o modificalo con un account abilitato. e aggiungi la seguente riga prima del tag di chiusura del php: <br />
\$CFG->unittestprefix = \'tst_\' // Modificare tst_  in un prefisso diverso da \$CFG->prefix';
$string['coveredlines'] = 'Linee analizzate';
$string['coveredpercentage'] = 'Code Coverage complessivo';
$string['deletingnoninsertedrecord'] = 'Tentativo di eliminazione di un record che non è stato inserito da queste unità di test (id $a->id in tabella $a->table).';
$string['deletingnoninsertedrecords'] = 'Tentativo di eliminazione di record che non sono stati inseriti da queste unità di test (da tabella $a->table).';
$string['droptesttables'] = 'Elimina tabelle di test';
$string['exception'] = 'Eccezione';
$string['executablelines'] = 'Linee eseguibili';
$string['fail'] = 'Errore';
$string['ignorefile'] = 'Ignora i test nel file';
$string['ignorethisfile'] = 'Riesegui i test ignorando questo file di test.';
$string['installtesttables'] = 'Installa tabelle di test';
$string['moodleunittests'] = 'Test di Moodle: $a';
$string['notice'] = 'Nota';
$string['onlytest'] = 'Esegui i test solamente in';
$string['pass'] = 'Eseguito con successo';
$string['pathdoesnotexist'] = 'Il percorso \'$a\' non esiste';
$string['prefix'] = 'Prefisso tabelle di test';
$string['prefixnotset'] = 'Il prefisso della tabella di test non è configurato. Riempi e invia questo form  per aggiungerlo al file config.php.';
$string['reinstalltesttables'] = 'Reinstalla tabelle di test';
$string['retest'] = 'Riesegui i test';
$string['retestonlythisfile'] = 'Riesegui solo questo file di test.';
$string['runall'] = 'Esegui i test da tutti i file di test';
$string['runat'] = 'Eseguito il $a.';
$string['runonlyfile'] = 'Esegui solo i test in qusto file';
$string['runonlyfolder'] = 'Esegui solo i test in questa cartella';
$string['runtests'] = 'Esegui';
$string['rununittests'] = 'Esegui i test';
$string['showpasses'] = 'Mostra sia successi che errori';
$string['showsearch'] = 'Mostra la ricerca dei file di test';
$string['skip'] = 'Salta';
$string['stacktrace'] = 'Traccia dello stack:';
$string['summary'] = '{$a->run}/{$a->total} casi di test completi: <strong>{$a->passes}</strong> successi, <strong>{$a->fails}</strong> errori e <strong>{$a->exceptions}</strong> eccezioni.';
$string['tablesnotsetup'] = 'Le tabelle per l\'unità di test non sono ancora state create. Le vuoi creare adesso?';
$string['testdboperations'] = 'Operazioni di test del Database';
$string['testtablescsvfileunwritable'] = 'Il file CSV per le tabelle di test non è scrivibile ($a->filename)';
$string['testtablesneedupgrade'] = 'Le tabelle di DB per il test devono essere aggiornate. Vuoi procedere con l\'aggiornamento adesso?';
$string['testtablesok'] = 'Le tabelle di DB per il test sono state correttamente installate.';
$string['thorough'] = 'Esegui un test completo (può durare a lungo)';
$string['timetakes'] = 'Tempo impiegato: $a.';
$string['totallines'] = 'Linee totali';
$string['uncaughtexception'] = 'Eccezione non prevista [{$a->getMessage()}] in [{$a->getFile()}:{$a->getLine()}] TEST INTERROTTO.';
$string['uncoveredlines'] = 'Linee non analizzate';
$string['unittestprefixsetting'] = 'Prefisso test: <strong>$a->unittestprefix</strong> (Aggiorna config.php per modificarlo).';
$string['unittests'] = 'Test';
$string['updatingnoninsertedrecord'] = 'Tentativo di modifica di un record non ancora inserito da questi test (id $a->id in tabella $a->table).';
$string['version'] = 'Utilizzato <a href=\"http://sourceforge.net/projects/simpletest/\">SimpleTest</a> versione $a.';

?>
