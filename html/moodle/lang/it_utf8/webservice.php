<?PHP // $Id: webservice.php,v 1.11 2010/03/24 17:04:10 andreabix Exp $ 
      // webservice.php - created with Moodle 2.0 dev (Build: 20100324) (2010031900)


$string['accessexception'] = 'Eccezione nel controllo accesso';
$string['accessnotallowed'] = 'L\'accesso al web service non è consentito';
$string['activatehttps'] = '******************';
$string['actwebserviceshhdr'] = 'Protocolli Web service disponibili';
$string['addaservice'] = 'Aggiungi servizio';
$string['addcapabilitytousers'] = 'Verifica i privilegi degli utenti';
$string['addcapabilitytousersdescription'] = 'Per usare i web service, gli utenti devono avere due diversi privilegi: \'/webservice:createtoken\' ed il privilegio corrispondente al protocollo in uso (\'webservice/rest:use\', \'webservice/soap:use\', ...). <br/>Suggerimento: puoi creare un ruolo globale \'Web service\' con i privilegi \'webservice:createtoken\' e con i privilegi relativi ai protocolli in uso, poi assegnare questo ruolo all\'utente web service.';
$string['addfunction'] = 'Aggiungi funzione';
$string['addfunctionhelp'] = 'Selezionare la funzione da aggiungere al servizio';
$string['addfunctions'] = 'Aggiungi funzione';
$string['addfunctionsdescription'] = 'Nella pagina <strong>Gestione servizi</strong>, fai click sul link <strong>Funzioni</strong> corrispondente al servizio appena creato. Aggiungi al servizio le funzioni desiderate.';
$string['addrequiredcapability'] = 'Assegna/togli il privilegio necessario';
$string['addservice'] = 'Aggiungi un nuovo servizio: $a->name (id: $a->id)';
$string['allusers'] = 'Tutti gli utenti';
$string['apiexplorer'] = 'API explorer';
$string['apiexplorernotavalaible'] = 'API explorer non è ancora disponibile';
$string['arguments'] = 'Argomenti';
$string['authmethod'] = 'Metodo di autenticazione';
$string['checkusercapability'] = 'Verifica i privilegi dell\'utente';
$string['checkusercapabilitydescription'] = 'Per usare i web service, l\'utente deve avere il privilegio corrispondente al protocollo in uso (\'webservice/rest:use\', \'webservice/soap:use\', ...). <br/>Suggerimento: puoi creare un ruolo globale \'Web service\' con i privilegi \'con i privilegi relativi ai protocolli in uso, poi assegnare questo ruolo all\'utente web service.';
$string['configwebserviceplugins'] = 'Per motivi di sicurezza, abilitate solamente i protocolli realmente necessari.';
$string['context'] = 'Contesto';
$string['createservicedescription'] = 'Un servizio è un insieme di funzioni web service. Devi abilitare l\'utente ad accedere ad un nuovo servizio. Nella pagina <strong>Aggiungi servizio</strong> seleziona le opzioni \'Abilitato\' e \'Solo utenti autorizzati\'. Seleziona \'Nessun privilegio necessario\'.';
$string['createserviceforusersdescription'] = 'Un servizio è un insieme di funzioni web service. Devi abilitare gli utenti ad accedere ad un nuovo servizio. Nella pagina <strong>Aggiungi servizio</strong> seleziona l\'opzione \'Abilitato\' e disabilita l\'opzione \'Solo utenti autorizzati\'. Seleziona \'Nessun privilegio necessario\'.';
$string['createtoken'] = 'Crea token';
$string['createtokenforuser'] = 'Crea un token per l\'utente';
$string['createtokenforuserdescription'] = 'Nella pagina <strong>Gestione token</strong>, fai click su \'Aggiungi\' e seleziona l\'utente ed il servizio appena creati.';
$string['createuser'] = 'Crea un utente specifico';
$string['createuserdescription'] = 'Devi creare un utente per il sistema che controllerà Moodle.';
$string['default'] = 'Default a \"$a\"';
$string['deleteaservice'] = 'Servizio di default';
$string['deleteservice'] = 'Elimina il servizio: $a->name (id: $a->id)';
$string['deleteserviceconfirm'] = 'Sei sicuro di eliminare il servizio esterno \"$a\"?';
$string['deletetokenconfirm'] = 'Sei sicuro di eliminare il token web service di <strong>$a->user</strong> relativo al servizio <strong>$a->service</strong>?';
$string['disabledwarning'] = 'I Web service sono disabilitati. L\'impostazione \"Abilita Web service\" si trova nelle Funzionalità avanzate.';
$string['documentation'] = 'documentazione web service';
$string['editaservice'] = 'Modifica servizio';
$string['editservice'] = 'Modifica il servizio: $a->name (id: $a->id)';
$string['enabled'] = 'Abilitato';
$string['enabledocumentation'] = 'Abilita documentazione per sviluppatori';
$string['enabledocumentationdescription'] = 'Puoi consentire l\'accesso alla documentazione web service agli sviluppatori del sistema esterno. Gli sviluppatori avranno accesso solo alla documentazione dei servizi a loro disponibili.';
$string['enableprotocols'] = 'Abilita protocolli';
$string['enableprotocolsdescription'] = 'Devi abilitare almeno un protocollo. Per quanto Moodle sia molto attento alla sicurezza, più protocolli abiliti più il tuo sito è esposto ad attacchi.';
$string['enablews'] = 'Abilita web service';
$string['enablewsdescription'] = 'I Web service si abilitano nelle Funzionalità avanzate.';
$string['entertoken'] = 'Inserisci una chiave di sicurezza/token';
$string['error'] = 'Errore: $a';
$string['errorcodes'] = 'Messaggio di errore';
$string['errorinvalidparamsapi'] = 'Parametro api esterne non valido';
$string['errorinvalidparamsdesc'] = 'Descrizione api esterne non valida';
$string['errorinvalidresponseapi'] = 'Risposta api esterne non valida';
$string['errorinvalidresponsedesc'] = 'Descrizione risposta api esterne non valida';
$string['errormissingkey'] = 'Manca una chiave obbligatoria nella singola struttura: $a';
$string['erroronlyarray'] = 'E\' possibile accetare solo array.';
$string['errorscalartype'] = 'E\' stato ricevuto un array on un object, mentre era previsto un tipo Scalar.';
$string['errorunexpectedkey'] = 'Sono state trovate chiavi inattese nell\'array dei parametri.';
$string['execute'] = 'Esegui';
$string['executewarnign'] = 'ATTENZIONE: premendo il pulsante Esegui il database sarà modificato e le modiche apportate non potranno essere annullate automaticamente!';
$string['externalservice'] = 'Servizio';
$string['externalservicefunctions'] = 'Funzioni del servizio esterno';
$string['externalservices'] = 'Gestione servizi';
$string['externalserviceusers'] = 'Utenti del servizio esterno';
$string['failedtolog'] = 'Errore nella scrittura del log';
$string['function'] = 'Funzione';
$string['functions'] = 'Funzioni';
$string['generalstructure'] = 'Struttura generale';
$string['httpswarning'] = 'I token vengono visualizzati solo se la connessione è sicura (https)';
$string['information'] = 'Informazioni';
$string['invalidextparam'] = 'Parametro api esterne non valido: $a';
$string['invalidextresponse'] = 'Risposta api esterne non valida:$a';
$string['invalidiptoken'] = 'Token non valido - il tuo IP non è supportato';
$string['invalidtimedtoken'] = 'Token non valido - il token è scaduto';
$string['invalidtoken'] = 'Token non valido - il token non è stato trovato';
$string['iprestriction'] = 'Restrizione IP';
$string['key'] = 'Chiave';
$string['keyshelp'] = 'Le chiavi vengono usate per accedere il tuo account Moodle da applicazioni esterne.';
$string['manageprotocols'] = 'Gestione protocolli';
$string['managetokens'] = 'Gestione token';
$string['missingpassword'] = 'Password mancante';
$string['missingusername'] = 'Username mancante';
$string['norequiredcapability'] = 'Nessun privilegio necessario';
$string['notoken'] = 'L\'elenco dei token è vuoto';
$string['onesystemcontrolling'] = 'Un singolo sistema che controlla Moodle tramite token';
$string['onesystemcontrollingdescription'] = 'I passi che seguono chiariscono le impostazioni necessarie per consentire il controllo di Moodle da parte di un sistema esterno (ad esempio un sistema informativo studenti). I passi suggeriscono anche come impostare il metodo di autenticazione basato su token (chiavi di sicurezza).';
$string['operation'] = 'Operazione';
$string['optional'] = 'Opzionale';
$string['phpparam'] = 'XML-RPC (struttura PHP )';
$string['phpresponse'] = 'XML-RPC (struttura PHP )';
$string['postrestparam'] = 'Codice PHP per REST (POST request)';
$string['potusers'] = 'Utenti non autorizzati';
$string['potusersmatching'] = 'Utenti non autorizzati che corrispondono';
$string['print'] = 'Stampa tutto';
$string['protocol'] = 'Protocollo';
$string['removefunction'] = 'Rimuovi';
$string['removefunctionconfirm'] = 'Vuoi rimuovere la funzione \"$a->function\" dal servizio \"$a->service\"?';
$string['requireauthentication'] = 'Questo metodo richiede l\'autenticazione con xxx privilegi.';
$string['required'] = 'Necessario';
$string['requiredcapability'] = 'Privilegio necessario';
$string['resettokenconfirm'] = 'Sei sicuro di reimpostare la chiave web service di <strong>$a->user</strong> relativa al servizio <strong>$a->service</strong>?';
$string['response'] = 'Risposta';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restparam'] = 'REST (parametri POST)';
$string['restrictedusers'] = 'Solo utenti autorizzati';
$string['securitykey'] = 'Chiave di sicurezza (token)';
$string['securitykeys'] = 'Chiave di sicurezza';
$string['selectedcapability'] = 'Selezionato';
$string['selectedcapabilitydoesntexit'] = 'Il privilegio impostato come necessario ($a) non esiste più. Per favore modificatelo e salvate i cambiamenti.';
$string['selectservice'] = 'Seleziona un servizio';
$string['selectspecificuser'] = 'Seleziona un utente specifico';
$string['selectspecificuserdescription'] = 'Nella pagina <strong>Gestione servizi</strong>, fai click su \'Utenti autorizzati\' ed aggiungi l\'utente all\'elenco degli utenti autorizzati.';
$string['service'] = 'Servizio';
$string['servicehelpexplanation'] = 'Un servizio è composto da un insieme di funzioni e può essere utilizzato pubblicamente oppure solo da utenti selezionati. I <strong>Servizi personalizzati</strong> sono servizi creati da te. I <strong>Servizi di default</strong> sono  servizi già predefiniti in Moodle. Le funzioni presenti nei <strong>Servizi di default</strong> non possono essere modificate.';
$string['servicename'] = 'Nome del servizio';
$string['servicesbuiltin'] = 'Servizi predefiniti';
$string['servicescustom'] = 'Servizi personalizzati';
$string['serviceusers'] = 'Utenti autorizzati';
$string['serviceusersmatching'] = 'Utenti autorizzati che corrispondono';
$string['serviceuserssettings'] = 'Cambia le impostazioni per l\'utente autorizzato';
$string['simpleauthlog'] = 'Login con autenticazione semplice';
$string['step'] = 'Passo';
$string['testauserwithtestclientdescription'] = 'Simula l\'accesso al web service dall\'esterno  tramite il client di test. Prima di effettuare il test, autenticati con un account che ha il privilegio \"moodle/webservice:createtoken\" e ricava il token dell\'utente dal blocco \"My Moodle\". Potrai usare questo token nel client di test, dove sceglierai anche il protocolla abilitato. <strong>Attenzione: la funzione che testerai SARA\' REALMENTE ESEGUITA, fai molta attenzione su cosa scegli di provare!</strong>';
$string['testclient'] = 'Test Client web service';
$string['testclientdescription'] = '* Il client di test web service  <strong>esegue</strong> la funzione <strong>REALMENTE</strong>. Evitare di provare funzioni che non su conoscono.<br/>* Non tutte le funzioni web service sono supportate dal client di test. <br/>* Per testare se un utente non è abilitato ad accedere determinate funzioni, provate con le funzioni che non gli sono consentite.<br/>* Per un debugging più approfondito, impostare il debug a <strong>$a->mode</strong> in $a->atag';
$string['testwithtestclient'] = 'Prova il funzionamento del servizio';
$string['testwithtestclientdescription'] = 'Simula l\'accesso al web service dall\'esterno  tramite il client di test. Puoi utilizzare un protocollo abilitato con l\'autenticazione token.<strong>Attenzione: la funzione che testerai SARA\' REALMENTE ESEGUITA, fai molta attenzione su cosa scegli di provare!</strong>';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Autenticazione token';
$string['tokencreatedbyadmin'] = 'Può essere reimpostata solo da un amministratore (*)';
$string['tokencreator'] = 'Creatore';
$string['userasclients'] = 'Utenti client tramite token';
$string['userasclientsdescription'] = 'I passi che seguono chiariscono le impostazioni necessarie per l\'accesso dei web service di Moodle da parte di utenti client. I passi suggeriscono anche come impostare il metodo di autenticazione basato su token (chiavi di sicurezza). Gli utenti possono generare il proprio token nella sezione<strong>Security keys</strong> del profilo.';
$string['validuntil'] = 'Valido fino';
$string['webservices'] = 'Web service';
$string['webservicesoverview'] = 'Generalità';
$string['webservicetokens'] = 'Token Web service';
$string['wrongusernamepassword'] = 'Username o password errato';
$string['wsauthmissing'] = 'Il plugin di autenticazione Web service è mancante.';
$string['wsauthnotenabled'] = 'Il plugin di autenticazione Web service è disabilitato.';
$string['wsdocumentation'] = 'Documentazione Web service';
$string['wsdocumentationdisable'] = 'La documentazione Web service è disabiliatata';
$string['wsdocumentationintro'] = 'Di seguito viene riportato un elenco dei servizi web disponibili per <b>$a</b>.<br/>Per creare un client è opportuno leggere la <a href=\"http://docs.moodle.org/en/Development:Creating_a_web_service_and_a_web_service_function#Create_your_own_client\">dcumentazione di Moodle</a>';
$string['wsdocumentationlogin'] = 'oppure inserisci le tue credenziali web service:';
$string['wspassword'] = 'Password Web service';
$string['wsusername'] = 'Username Web service';
$string['emptyname'] = 'Il nome del servizio è obbligatorio.'; // ORPHANED
$string['saveservice'] = 'Salva servizio'; // ORPHANED
$string['test'] = 'Test'; // ORPHANED
$string['activated'] = 'Attivate'; // ORPHANED
$string['activatedfunctions'] = 'Funzioni attivate'; // ORPHANED
$string['amfdebug'] = 'Modalità debug server AMF'; // ORPHANED
$string['clicktoactivate'] = 'Click per attivare'; // ORPHANED
$string['clicktodeactivate'] = 'Click per disattivare'; // ORPHANED
$string['component'] = 'Componente'; // ORPHANED
$string['createservicelabel'] = 'Crea un servizio personalizzato'; // ORPHANED
$string['custom'] = 'Personalizzato'; // ORPHANED
$string['debugdisplayon'] = '\"Display debug messages\" è impostato ad On. Il server XMLRPC non funzionerà. Anche gli altri server web service potrebbero avere problemi.<br/>Avvertite l\'amministratore di impostare \"Display debug messages\" ad Off.'; // ORPHANED
$string['fail'] = 'FAIL'; // ORPHANED
$string['functionlist'] = 'elenco funzioni web service'; // ORPHANED
$string['functionname'] = 'Nome della funzione'; // ORPHANED
$string['moodlepath'] = 'Percorso Moodle'; // ORPHANED
$string['ok'] = 'OK'; // ORPHANED
$string['protocolenable'] = 'abilitazione protocollo $a[0]'; // ORPHANED
$string['protocols'] = 'Protocolli'; // ORPHANED
$string['save'] = 'Salva'; // ORPHANED
$string['servicelist'] = 'Servizi'; // ORPHANED
$string['soapdocumentation'] = '<H2>Manuale SOAP</H2>
<b>1.</b> Chiamate il metodo <b>tmp_get_token</b> su \"<i>http://remotemoodle/webservice/soap/server.php?wsdl</i>\"<br>
Il parametro è un array: ad esempio, in PHP array(\"username\" => \"wsuser\", \"password\" => \"wspassword\")<br>
Il valore di ritorno è un token (integer)<br>
<br>
<b>2.</b> Chiamate un metodo web service di Moodle su \"<i>http://remotemoodle/webservice/soap/server.php?token=the_received_token&classpath=the_moodle_path&wsdl</i>\"<br>
Tutti i metodi accettano come unico parametro un array.<br>
<br>
Un esempio di chiamata in PHP:<br>
Percorso Moodle: <b>user</b><br>
<b>tmp_delete_user</b>( string username , integer mnethostid )<br>
Esempio di chiamata:<br>
your_client->tmp_delete_user(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1))<br><br>'; // ORPHANED
$string['systemsettings'] = 'Impostazioni comuni'; // ORPHANED
$string['user'] = 'Utente'; // ORPHANED
$string['usersettings'] = 'Utenti con privilegi per web service'; // ORPHANED
$string['webservicesenable'] = 'Abilitazione web service'; // ORPHANED
$string['wsdeletefunction'] = 'La funzione <b>$a->functionname</b> è stata eliminata dal servizio <b>$a->servicename</b>.'; // ORPHANED
$string['wsinsertfunction'] = 'La funzione <b>$a->functionname</b> è stata aggiunta al servizio <b>$a->servicename</b>.'; // ORPHANED
$string['wspagetitle'] = 'Documentazione web service'; // ORPHANED
$string['wsuserreminder'] = 'Promemoria: l\'amministratore Moodle di questo sito dovrà darti il privilegio moodle/site:usewebservices.'; // ORPHANED
$string['xmlrpcdocumentation'] = '<H2>Manual XMLRPC</H2>
<b>1.</b> Chiamate il metodo  <b>authentication.tmp_get_token</b> su \"<i>http://remotemoodle/webservice/xmlrpc/server.php</i>\"<br>
Il parametro è un array: ad esempio, in PHP array(\"username\" => \"wsuser\", \"password\" => \"wspassword\")<br>
Il valore di ritorno è un token (integer)<br>
<br>
<b>2.</b> Chiamate un metodo web service di Moodle su \"<i>http://remotemoodle/webservice/xmlrpc/server.php?classpath=the_moodle_path&token=the_received_token</i>\"<br>
Tutti i metodi accettano come unico parametro un array.<br>
<br>
Un esempio di chiamata in PHP:<br>
Moodle path: <b>user</b><br>
<b>tmp_delete_user</b>( string username , integer mnethostid )<br>
Esempio di chiamata:<br>
your_client->call(\"user.tmp_delete_user\", array(array(\"username\" => \"username_to_delete\",\"mnethostid\" => 1)))<br>'; // ORPHANED

?>
