<?PHP // $Id: xmldb.php,v 1.12 2010/04/06 12:45:37 andreabix Exp $ 
      // xmldb.php - created with Moodle 1.9.8 (Build: 20100325) (2007101580)


$string['aftertable'] = 'Dopo la tabella:';
$string['back'] = 'Indietro';
$string['backtomainview'] = 'Torna alla vista principale';
$string['binaryincorrectlength'] = 'Lunghezza errata per un campo binario';
$string['butis'] = 'ma è';
$string['cannotuseidfield'] = 'Non è possibile inserire il campo \"id\". E è una colonna autonumeric';
$string['change'] = 'Modifica';
$string['charincorrectlength'] = 'Lunghezza errata per un campo carattere';
$string['check_bigints'] = 'Cerca DB Integer errati';
$string['check_defaults'] = 'Cerca valori di default inconsistenti';
$string['check_indexes'] = 'Cerca indici mancanti nel DB';
$string['checkbigints'] = 'Controlla Bigint';
$string['checkdefaults'] = 'Controlla default';
$string['checkindexes'] = 'Controlla indici';
$string['completelogbelow'] = '(visualizza il log della ricerca)';
$string['confirmcheckbigints'] = 'Questa funzione individua la presenza di  <a href=\"http://tracker.moodle.org/browse/MDL-11038\">Integer potenzialmente errati </a> nel vostro server Moodle, generando automaticamente il codice SQL necessario per sistemare gli Integer errati individuati. Il codice SQL viene generato ma non eseguito.<br /><br />
Una volta completata l\'individuazione, potete copiare il codice SQL generato ed eseguirlo tramite l\'interfaccia SQL che preferite (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL).<br /><br />
Si raccomanda di utilizzare la versione di Moodle più recente (versione +) disponibile per la vostra release.(1.8, 1.9, 2.x ...) prima di cercare Integer errati..<br /><br />
Questa funzione non effettua nessuna operazione sul database, legge solamente i dati e pertanto può essere eseguita con sicurezza in qualsiasi momento.';
$string['confirmcheckdefaults'] = 'Questa funzione individua la presenza di valori di default inconsistenti nel vostro server Moodle, generando automaticamente il codice SQL necessario per sistemare tutti i valori dei default inconsistenti eventualmente presenti. Il codice SQL viene generato ma non eseguito.<br /><br />
Una volta completata l\'individuazione, potete copiare il codice SQL generato ed eseguirlo tramite l\'interfaccia SQL che preferite (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL).<br /><br />
Si raccomanda di utilizzare la versione di Moodle più recente (versione +) disponibile per la vostra release.(1.8, 1.9, 2.x ...) prima di cercare Integer errati..<br /><br />
Questa funzione non effettua nessuna operazione sul database, legge solamente i dati e pertanto può essere eseguita con sicurezza in qualsiasi momento.';
$string['confirmcheckindexes'] = 'Questa funzione individua indici mancanti nel vostro server Moodle, generando automaticamente il codice SQL necessario per sistemare tutti i valori dei default inconsistenti eventualmente presenti. Il codice SQL viene generato ma non eseguito.<br /><br />
Una volta completata l\'individuazione, potete copiare il codice SQL generato ed eseguirlo tramite l\'interfaccia SQL che preferite (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL).<br /><br />
Si raccomanda di utilizzare la versione di Moodle più recente (versione +) disponibile per la vostra release.(1.8, 1.9, 2.x ...) prima di cercare Integer errati..<br /><br />
Questa funzione non effettua nessuna operazione sul database, legge solamente i dati e pertanto può essere eseguita con sicurezza in qualsiasi momento.';
$string['confirmdeletefield'] = 'Sei sicuro di voler rimuovere il campo:';
$string['confirmdeleteindex'] = 'Sei sicuro di voler rimuovere l\'indice:';
$string['confirmdeletekey'] = 'Sei sicuro di voler rimuovere la chiave:';
$string['confirmdeletesentence'] = 'Sei sicuro di voler rimuovere la clausola:';
$string['confirmdeletestatement'] = 'Sei sicuro di voler rimuovere la dichiarazione e le sue clausole:';
$string['confirmdeletetable'] = 'Sei sicuro di voler rimuovere la tabella:';
$string['confirmdeletexmlfile'] = 'Sei sicuro di voler rimuovere il file:';
$string['confirmrevertchanges'] = 'Sei sicuro di voler ripristinare le modifiche effettuate:';
$string['create'] = 'Crea';
$string['createtable'] = 'Crea Tabella:';
$string['defaultincorrect'] = 'Default errato';
$string['delete'] = 'Rimuovi';
$string['delete_field'] = 'Rimuovi Campo';
$string['delete_index'] = 'Rimuovi Indice';
$string['delete_key'] = 'Rimuovi Chiave';
$string['delete_sentence'] = 'Rimuovi Clausola';
$string['delete_statement'] = 'Rimuovi Dichiarazione';
$string['delete_table'] = 'Rimuovi Tabella';
$string['delete_xml_file'] = 'Rimuovi File XML';
$string['down'] = 'Sotto';
$string['duplicate'] = 'Duplica';
$string['duplicatefieldname'] = 'Un altro campo con quel nome esiste';
$string['edit'] = 'Modifica';
$string['edit_field'] = 'Modifica Campo';
$string['edit_index'] = 'Modifica Indice';
$string['edit_key'] = 'Modifica Chiave';
$string['edit_sentence'] = 'Modifica Clausola';
$string['edit_statement'] = 'Modifica Dichiarazione';
$string['edit_table'] = 'Modifica Tabella';
$string['edit_xml_file'] = 'Modifica File XML';
$string['enumvaluesincorrect'] = 'Valori incorretti per un campo enumerato';
$string['field'] = 'Campo';
$string['fieldnameempty'] = 'Nome campo vuoto';
$string['fields'] = 'Campi';
$string['filenotwriteable'] = 'File non scrivibile';
$string['floatincorrectdecimals'] = 'Numero incorretto di decimali per un campo reale';
$string['floatincorrectlength'] = 'Lunghezza incorretta per un campo reale';
$string['gotolastused'] = 'Vai all\'ultimo file utilizzato';
$string['incorrectfieldname'] = 'Nome errato';
$string['index'] = 'Indice';
$string['indexes'] = 'Indici';
$string['integerincorrectlength'] = 'Lunghezza errata per un campo Integer';
$string['key'] = 'Chiave';
$string['keys'] = 'Chiavi';
$string['listreservedwords'] = 'Lista delle Parole Riservate<br/>(utilizzato per mantenere aggiornato <a href=\"http://docs.moodle.org/en/XMLDB_reserved_words\" target=\"_blank\">XMLDB_reserved_words</a>)';
$string['load'] = 'Carica';
$string['main_view'] = 'Vista Principale';
$string['missing'] = 'Mancanti';
$string['missingfieldsinsentence'] = 'Mancano campi nella clausola';
$string['missingindexes'] = 'Sono stati individuati indici mancanti';
$string['missingvaluesinsentence'] = 'Mancano valori nella clausola';
$string['mustselectonefield'] = 'Si deve selezionare un campo per vedere le azioni correlate!';
$string['mustselectoneindex'] = 'Si deve selezionare un indice per vedere le azioni correlate!';
$string['mustselectonekey'] = 'Si deve selezionare una chiave per vedere le azioni correlate!';
$string['mysqlextracheckbigints'] = 'Se utilizzate MySQL, verranno cercati anche Signed bigint errati e verrà generato il codice SQL per risolvere eventuali problemi individuati su questi tipi di campi.';
$string['new_statement'] = 'Nuova dichiarazione';
$string['new_table_from_mysql'] = 'Nuova tabella da MySQL';
$string['newfield'] = 'Nuovo campo';
$string['newindex'] = 'Nuovo indice';
$string['newkey'] = 'Nuova chiave';
$string['newsentence'] = 'Nuova clausola';
$string['newstatement'] = 'Nuova dichiarazione';
$string['newtable'] = 'Nuova tabella';
$string['newtablefrommysql'] = 'Nuova tabella da MySQL';
$string['nomissingindexesfound'] = 'Non sono stati individuati indici mancanti. Il vostro DB non ha bisogno di altre azioni.';
$string['nowrongdefaultsfound'] = 'Non sono stati individuati valori di default inconsistenti. Il vostro DB non ha bisogno di altre azioni.';
$string['nowrongintsfound'] = 'Non sono stati individuati Integer errati. Il vostro DB non ha bisogno di altre azioni.';
$string['numberincorrectdecimals'] = 'Numero errato di decimali per un campo numerico';
$string['numberincorrectlength'] = 'Lunghezza errata per un campo numerico';
$string['reserved'] = 'Riservata';
$string['reservedwords'] = 'Parole Riservate';
$string['revert'] = 'Ripristina';
$string['revert_changes'] = 'Ripristina modifiche';
$string['save'] = 'Salva';
$string['searchresults'] = 'Risultati della ricerca';
$string['selectaction'] = 'Selezionare Azione:';
$string['selectdb'] = 'Seleziona database:';
$string['selectfieldkeyindex'] = 'Seleziona Campo/Chiave/Indice:';
$string['selectonecommand'] = 'Si prega di selezionare una Azione dalla lista per visualizzare il codice PHP';
$string['selectonefieldkeyindex'] = 'Si prega di selezionare un Campo/Chiave/Indice dalla lista per visualizzare il codice PHP';
$string['selecttable'] = 'Selezionare Tabella:';
$string['sentences'] = 'Clausole';
$string['shouldbe'] = 'dovrebbe essere';
$string['statements'] = 'Dichiarazioni';
$string['statementtable'] = 'Dichiarazione Tabella:';
$string['statementtype'] = 'Tipo di dichiarazione:';
$string['table'] = 'Tabella';
$string['tables'] = 'Tabelle';
$string['test'] = 'Test';
$string['textincorrectlength'] = 'Lunghezza errata per un campo testo';
$string['unload'] = 'Scarica';
$string['up'] = 'Sopra';
$string['view'] = 'Visualizza';
$string['view_reserved_words'] = 'Visualizza Parole Riservate';
$string['view_structure_php'] = 'Visualizza Struttura PHP';
$string['view_structure_sql'] = 'Visualizza Struttura SQL';
$string['view_table_php'] = 'Visualizza Tabella PHP';
$string['view_table_sql'] = 'Visualizza Tabella SQL';
$string['viewedited'] = 'Visualizza Modificato';
$string['vieworiginal'] = 'Visualizza Originale';
$string['viewphpcode'] = 'Visualizza codice PHP';
$string['viewsqlcode'] = 'Visualizza codice SQL';
$string['wrong'] = 'Errati';
$string['wrongdefaults'] = 'Sono stati individuati valori di default errati';
$string['wrongints'] = 'Sono stati individuati Integer errati';
$string['wronglengthforenum'] = 'Lunghezza errata per un campo enum';
$string['wrongnumberoffieldsorvalues'] = 'Numero errato di campi o valori nella clausola';
$string['wrongreservedwords'] = 'Parole Riservate Utilizzate Attualmente<br/>(notare che il nomi delle tabelle non sono importanti se si utilizza \$CFG->prefix)';
$string['yesmissingindexesfound'] = 'Nel vostro DB sono stati individuati alcuni indici mancanti. Di seguito vengono riportati i dettagli e il codice SQL necessario per crearli (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL.<br /><br />Dopo aver eseguito il codice SQL utilizzate di nuovo questa funzione per verificare che non manchino altri indici.';
$string['yeswrongdefaultsfound'] = 'Nel vostro DB sono stati individuati valori di default inconsistenti. Di seguito vengono riportati i dettagli e il codice SQL necessario per sistemarli (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL.<br /><br />Dopo aver eseguito il codice SQL utilizzate di nuovo questa funzione per verificare che non siano presenti altri valori di default inconsistenti.';
$string['yeswrongintsfound'] = 'Nel vostro DB sono stati individuati Integer errati. Di seguito vengono riportati i dettagli e il codice SQL necessario per sistemarli (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL.<br /><br />Dopo aver eseguito il codice SQL utilizzate di nuovo questa funzione per verificare che non siano presenti altri Integer errati.';
$string['actual'] = 'Attuale'; // ORPHANED
$string['check_foreign_keys'] = 'Cerca violazioni di Foreign key'; // ORPHANED
$string['checkforeignkeys'] = 'Controlla Foreign key'; // ORPHANED
$string['confirmcheckforeignkeys'] = 'Questa funzione individua la presenza di violazioni delle Foreign key definite nel file install.xml. (Al momento Moodle non impone vincoli per le Foreign key, ed è questo il motivo per cui potrebbero essere presenti violazioni.<br /><br />
Una volta completata l\'individuazione, potete copiare il codice SQL generato ed eseguirlo tramite l\'interfaccia SQL che preferite (non dimenticate di effettuare un backup del database prima di eseguire il codice SQL).<br /><br />
Si raccomanda di utilizzare la versione di Moodle più recente (versione +) disponibile per la vostra release.(1.8, 1.9, 2.x ...) prima di cercare Integer errati..<br /><br />
Questa funzione non effettua nessuna operazione sul database, legge solamente i dati e pertanto può essere eseguita con sicurezza in qualsiasi momento.'; // ORPHANED
$string['doc'] = 'Doc'; // ORPHANED
$string['docindex'] = 'Indice Documentazione'; // ORPHANED
$string['documentationintro'] = 'La documentazione viene generata automaticamente dalle definizioni XMLDB del database. E\' disponibile solamente in Inglese.'; // ORPHANED
$string['duplicatekeyname'] = 'Esiste già una chiave con quel nome'; // ORPHANED
$string['edit_field_save'] = 'Salva Campo'; // ORPHANED
$string['edit_index_save'] = 'Salva Indice'; // ORPHANED
$string['edit_key_save'] = 'Salva Chiave'; // ORPHANED
$string['edit_sentence_save'] = 'Salva Clausola'; // ORPHANED
$string['edit_table_save'] = 'Salva Tabella'; // ORPHANED
$string['expected'] = 'Attesi'; // ORPHANED
$string['extensionrequired'] = 'Spiacente - per svolgere questa azione è necessaria l\'estensione PHP \'$a\'. Se volete usare questa funzionalità per favore installate l\'estensione.'; // ORPHANED
$string['fieldsnotintable'] = 'Il campo non è presente nella tabella'; // ORPHANED
$string['fieldsusedinkey'] = 'Questo campo è una chiave'; // ORPHANED
$string['fkviolationdetails'] = 'La Foreign key $a->keyname nella tabella  $a->tablename è stata violata  $a->numviolations su un totale di $a->numrows righe.'; // ORPHANED
$string['float2numbernote'] = 'Nota: sebbene i campi \"float\" siano supportati al 100%%%% da XMLDB, si consiglia comunque di migrare verso campi \"number\".'; // ORPHANED
$string['generate_all_documentation'] = 'Tutta la Documentazione'; // ORPHANED
$string['generate_documentation'] = 'Documentazione'; // ORPHANED
$string['masterprimaryuniqueordernomatch'] = 'I campi nella tua foreign key devono essere elencati nello stesso ordine in cui sono elencati nella UNIQUE KEY della tabella referenziata.'; // ORPHANED
$string['nomasterprimaryuniquefound'] = 'La(e) colonna(e) referenziata dalla tua foreign key deve essere inclusa in una primary o unique KEY della tabella referenziata. Da notare che la colonna in UNIQUE INDEX non è sufficiente.'; // ORPHANED
$string['noviolatedforeignkeysfound'] = 'Non sono state individuate violazioni di Foreign key'; // ORPHANED
$string['pendingchanges'] = 'Nota: avete effettuato modiche al file. Potete salvarle in qualsiasi momento.'; // ORPHANED
$string['pendingchangescannotbesaved'] = 'Il file è stato modificato ma non è possibile salvare le modifiche. Per favore verificate che il processo del web server abbia i permessi di scrittura per la cartella e per il file \"install.xml\".'; // ORPHANED
$string['pendingchangescannotbesavedreload'] = 'Il file è stato modificato ma non è possibile salvare le modifiche. Per favore verificate che il processo del web server abbia i permessi di scrittura per la cartella e per il file \"install.xml\". Dopo la verifica ricaricate la pagina per controllare se è possibile salvare le modifiche.'; // ORPHANED
$string['viewxml'] = 'XML'; // ORPHANED
$string['violatedforeignkeys'] = 'Violazioni di foreign key'; // ORPHANED
$string['violatedforeignkeysfound'] = 'Sono stati individuate violazioni di Foreign key'; // ORPHANED
$string['violations'] = 'Violazioni'; // ORPHANED

?>
