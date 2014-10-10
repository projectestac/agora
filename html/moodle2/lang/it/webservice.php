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
 * Strings for component 'webservice', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'Eccezione nel controllo accesso';
$string['actwebserviceshhdr'] = 'Protocolli Web service disponibili';
$string['addaservice'] = 'Aggiungi servizio';
$string['addcapabilitytousers'] = 'Verifica i privilegi degli utenti';
$string['addcapabilitytousersdescription'] = 'Per usare i web service, gli utenti devono avere i privilegi: \'/webservice:createtoken\' ed il privilegio corrispondente al protocollo in uso, ad esempio webservice/rest:use, \'webservice/soap:use\'. E\' possibile creare un ruolo \'Web service\' con gli opportuni privilegi ed assegnare questo ruolo all\'utente web service a livello di sistema.';
$string['addfunction'] = 'Aggiungi funzione';
$string['addfunctionhelp'] = 'Selezionare la funzione da aggiungere al servizio';
$string['addfunctions'] = 'Aggiungi funzione';
$string['addfunctionsdescription'] = 'Scegli le funzioni per il web service creato';
$string['addrequiredcapability'] = 'Assegna/togli il privilegio richiesto';
$string['addservice'] = 'Aggiungi un servizio: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'Funzioni del servizio "{$a}"';
$string['allusers'] = 'Tutti gli utenti';
$string['amftestclient'] = 'AMF test client';
$string['apiexplorer'] = 'API explorer';
$string['apiexplorernotavalaible'] = 'API explorer non è ancora disponibile';
$string['arguments'] = 'Argomenti';
$string['authmethod'] = 'Metodo di autenticazione';
$string['cannotcreatetoken'] = 'Manca l\'autorizzazione per creare un token per il web service {$a}.';
$string['cannotgetcoursecontents'] = 'Non può ricevere contenuti del corso';
$string['checkusercapability'] = 'Verifica i privilegi dell\'utente';
$string['checkusercapabilitydescription'] = 'Per usare i web service, l\'utente deve avere il privilegio corrispondente al protocollo in uso, per esempio \'webservice/rest:use\', \'webservice/soap:use\'. E\' possibile  creare un ruolo globale \'Web service\' con i privilegi  relativi ai protocolli in uso, poi assegnare questo ruolo all\'utente web service come ruolo globale.';
$string['configwebserviceplugins'] = 'Per motivi di sicurezza, abilitare solamente i protocolli realmente necessari.';
$string['context'] = 'Contesto';
$string['createservicedescription'] = 'Un servizio è un insieme di funzioni web service. Devi abilitare l\'utente ad accedere al servizio creato. Nella pagina <strong>Aggiungi servizio</strong> seleziona le opzioni \'Abilitato\' e \'Solo utenti autorizzati\'. Seleziona \'Nessun privilegio richiesto\'.';
$string['createserviceforusersdescription'] = 'Un servizio è un insieme di funzioni web service. Devi abilitare gli utenti ad accedere al servizio creato. Nella pagina <strong>Aggiungi servizio</strong> seleziona l\'opzione \'Abilitato\' e disabilita l\'opzione \'Solo utenti autorizzati\'. Seleziona \'Nessun privilegio richiesto\'.';
$string['createtoken'] = 'Crea token';
$string['createtokenforuser'] = 'Crea un token per l\'utente';
$string['createtokenforuserdescription'] = 'Crea un token per l\'utente web service';
$string['createuser'] = 'Crea un utente specifico';
$string['createuserdescription'] = 'E\' necessario creare un utente web service per il sistema che controllerà Moodle.';
$string['criteriaerror'] = 'Manca l\'autorizzazione per ricerche basate su criteri.';
$string['default'] = 'Default a "{$a}"';
$string['deleteaservice'] = 'Servizio di default';
$string['deleteservice'] = 'Elimina il servizio: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'Eliminando un servizio si eliminano anche i token associati al servizio stesso. Sei sicuro di voler eliminare il servizio esterno "{$a}"?';
$string['deletetokenconfirm'] = 'Sei sicuro di eliminare il token web service di <strong>{$a->user}</strong> relativo al servizio <strong>{$a->service}</strong>?';
$string['disabledwarning'] = 'Tutti i protocolli web service sono disabilitati. L\'impostazione "Abilita Web service" si trova nelle Funzionalità avanzate.';
$string['doc'] = 'Documentazione';
$string['docaccessrefused'] = 'Non sei autorizzato a visualizzare la documentazione di questo token.';
$string['documentation'] = 'documentazione web service';
$string['downloadfiles'] = 'Può scaricare file';
$string['downloadfiles_help'] = 'Qualsiasi utente potrà scaricare file tramite le chiavi di sicurezza. I file scaricabili sono limitati a quelli che gli utenti possono effettivamente scaricare';
$string['editaservice'] = 'Modifica servizio';
$string['editservice'] = 'Modifica il servizio: {$a->name} (id: {$a->id})';
$string['enabled'] = 'Abilitato';
$string['enabledocumentation'] = 'Abilita documentazione per sviluppatori';
$string['enabledocumentationdescription'] = 'E\' disponile la documentazione dettagliata dei web service relativa ai protocolli abilitati.';
$string['enablemobilewsoverview'] = 'Recati nella pagina di amministrazione {$a->manageservicelink}, controlla l\'impostazione "{$a->enablemobileservice}" e salva. Il sito sarà impostato affinché gli utenti possano usare la app ufficiale Moodle.
Impostazione attuale: {$a->wsmobilestatus}';
$string['enableprotocols'] = 'Abilita protocolli';
$string['enableprotocolsdescription'] = 'Devi abilitare almeno un protocollo. Per motivi di sicurezza, dovresti abilitare solo i protocolli realmente necessari.';
$string['enablews'] = 'Abilita web service';
$string['enablewsdescription'] = 'I Web service si abilitano nelle Funzionalità avanzate.';
$string['entertoken'] = 'Inserisci una chiave di sicurezza/token';
$string['error'] = 'Errore: {$a}';
$string['errorcatcontextnotvalid'] = 'Non puoi eseguire funzioni nel contesto di categoria (category id:{$a->catid}). Errore dal contesto: {$a->message}';
$string['errorcodes'] = 'Messaggio di errore';
$string['errorcoursecontextnotvalid'] = 'Non puoi eseguire funzioni nel contesti de corso. (id del corso: {$a->courseid}). Errore dal contesto: {$a->message}';
$string['errorinvalidparam'] = 'Il parametro "{$a}" non è valido.';
$string['errornotemptydefaultparamarray'] = 'Il parametro di descrizione web service di nome  \'{$a}\' è una struttura singola o multipla. Il default può essere solamente un array vuoto. Controlla la descrizione del web service.';
$string['erroroptionalparamarray'] = 'Il parametro di descrizione web service di nome  \'{$a}\' è una struttura singola o multipla. Non è possibile impostarlo a VALUE_OPTIONAL. Controlla la descrizione del web service.';
$string['event_webservice_function_called'] = 'Chiamata funzione web service';
$string['event_webservice_login_failed'] = 'Fallita autenticazione web service';
$string['event_webservice_service_created'] = 'Creato servizio web service';
$string['event_webservice_service_updated'] = 'Aggiornato servizio web service';
$string['event_webservice_service_user_added'] = 'Aggiornato utente servizio web service';
$string['event_webservice_service_user_removed'] = 'Eliminato utente servizio web service';
$string['event_webservice_token_created'] = 'Creato token web service';
$string['event_webservice_token_sent'] = 'Inviato token web service';
$string['execute'] = 'Esegui';
$string['executewarnign'] = 'ATTENZIONE: premendo il pulsante Esegui il database sarà modificato e le modiche apportate non potranno essere annullate automaticamente!';
$string['externalservice'] = 'Servizio';
$string['externalservicefunctions'] = 'Funzioni del servizio esterno';
$string['externalservices'] = 'Gestione servizi';
$string['externalserviceusers'] = 'Utenti del servizio esterno';
$string['failedtolog'] = 'Errore nella scrittura del log';
$string['filenameexist'] = 'Il nome del file esiste già: {$a}';
$string['forbiddenwsuser'] = 'Non è possibile creare token per utenti non confermati, eliminati, sospesi oppure per gli ospiti.';
$string['function'] = 'Funzione';
$string['functions'] = 'Funzioni';
$string['generalstructure'] = 'Struttura generale';
$string['information'] = 'Informazioni';
$string['installexistingserviceshortnameerror'] = 'Un web service di nome "{$a}" esiste già. Non è possibile creare o aggiornare un web service con lo stesso nome';
$string['installserviceshortnameerror'] = 'Errore di codifica: il nome del web service "{$a}" deve contenere solamente numeri, lettere e _-..';
$string['invalidextparam'] = 'Parametro api esterne non valido: {$a}';
$string['invalidextresponse'] = 'Risposta api esterne non valida:{$a}';
$string['invalidiptoken'] = 'Token non valido - il tuo IP non è supportato';
$string['invalidtimedtoken'] = 'Token non valido - il token è scaduto';
$string['invalidtoken'] = 'Token non valido - il token non è stato trovato';
$string['iprestriction'] = 'Restrizione IP';
$string['iprestriction_help'] = 'L\'utente deve chiamare i web service dagli IP elencati (separati da virgole).';
$string['key'] = 'Chiave';
$string['keyshelp'] = 'Le chiavi vengono usate per accedere il tuo account Moodle da applicazioni esterne.';
$string['manageprotocols'] = 'Gestione protocolli';
$string['managetokens'] = 'Gestione token';
$string['missingcaps'] = 'Privilegi mancanti.';
$string['missingcaps_help'] = 'Elenco dei privilegi richiesti per usare la funzione che non sono posseduti dall\'utente selezionato. Per usare il servizio devi assegnare all\'utente i privilegi mancanti.';
$string['missingpassword'] = 'Password mancante';
$string['missingrequiredcapability'] = 'E\' necessario il privilegio {$a}.';
$string['missingusername'] = 'Username mancante';
$string['missingversionfile'] = 'Errore di programmazione: il file version.php non è presente per il componente {$a}';
$string['mobilewsdisabled'] = 'Disabilitato';
$string['mobilewsenabled'] = 'Abilitato';
$string['nocapabilitytouseparameter'] = 'L\'utente non ha il privilegio necessario per usare il parametro {$a}';
$string['nofunctions'] = 'Il servizio non ha funzioni.';
$string['norequiredcapability'] = 'Nessun privilegio richiesto';
$string['notoken'] = 'L\'elenco dei token è vuoto';
$string['onesystemcontrolling'] = 'Consentire ad un sistema esterno di controllare Moodle';
$string['onesystemcontrollingdescription'] = 'I passi che seguono chiariscono le impostazioni necessarie per consentire il controllo di Moodle da parte di un sistema esterno. I passi suggeriscono anche come impostare il metodo di autenticazione basato su token (chiave di sicurezza).';
$string['operation'] = 'Operazione';
$string['optional'] = 'Opzionale';
$string['passwordisexpired'] = 'La password è scaduta';
$string['phpparam'] = 'XML-RPC (struttura PHP )';
$string['phpresponse'] = 'XML-RPC (struttura PHP )';
$string['postrestparam'] = 'Codice PHP per REST (POST request)';
$string['potusers'] = 'Utenti non autorizzati';
$string['potusersmatching'] = 'Utenti non autorizzati che corrispondono';
$string['print'] = 'Stampa tutto';
$string['protocol'] = 'Protocollo';
$string['removefunction'] = 'Rimuovi';
$string['removefunctionconfirm'] = 'Vuoi rimuovere la funzione "{$a->function}" dal servizio "{$a->service}"?';
$string['requireauthentication'] = 'Questo metodo richiede l\'autenticazione con xxx privilegi.';
$string['required'] = 'Necessario';
$string['requiredcapability'] = 'Privilegio richiesto';
$string['requiredcapability_help'] = 'Solo gli utenti in possesso del privilegio richiesto potranno accedere al servizio.';
$string['requiredcaps'] = 'Privilegi richiesti';
$string['resettokenconfirm'] = 'Sei sicuro di reimpostare la chiave web service di <strong>{$a->user}</strong> relativa al servizio <strong>{$a->service}</strong>?';
$string['resettokenconfirmsimple'] = 'Sei sicuro di volere reimpostare questa chiave? Tutti i link che utilizzano questa chiave cesseranno di funzionare.';
$string['response'] = 'Risposta';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'Gli account ripristinati devono cambiare password per ottenere un token';
$string['restparam'] = 'REST (parametri POST)';
$string['restrictedusers'] = 'Solo utenti autorizzati';
$string['restrictedusers_help'] = 'L\'impostazione determina  se un utente con il privilegio di creare un web service può anche generare un token per il web service creato nella pagina Chiavi di sicurezza oppure se il token può essere generato solo da solo utenti autorizzati.';
$string['securitykey'] = 'Chiave di sicurezza (token)';
$string['securitykeys'] = 'Chiave di sicurezza';
$string['selectauthorisedusers'] = 'Seleziona utenti autorizzati';
$string['selectedcapability'] = 'Selezionato';
$string['selectedcapabilitydoesntexit'] = 'Il privilegio impostato come necessario ({$a}) non esiste più. Per favore modificalo e salva i cambiamenti.';
$string['selectservice'] = 'Seleziona un servizio';
$string['selectspecificuser'] = 'Seleziona un utente specifico';
$string['selectspecificuserdescription'] = 'Aggiungi l\'utente web service tra gli utenti autorizzati.';
$string['service'] = 'Servizio';
$string['servicehelpexplanation'] = 'Un servizio è composto da un insieme di funzioni e può essere utilizzato pubblicamente oppure solo da utenti selezionati.';
$string['servicename'] = 'Nome del servizio';
$string['servicenotavailable'] = 'Il web service non è disponibile (non esiste oppure è disabilitato)';
$string['servicesbuiltin'] = 'Servizi predefiniti';
$string['servicescustom'] = 'Servizi personalizzati';
$string['serviceusers'] = 'Utenti autorizzati';
$string['serviceusersettings'] = 'Impostazioni utente';
$string['serviceusersmatching'] = 'Utenti autorizzati che corrispondono';
$string['serviceuserssettings'] = 'Cambia le impostazioni per l\'utente autorizzato';
$string['simpleauthlog'] = 'Login con autenticazione semplice';
$string['step'] = 'Passo';
$string['supplyinfo'] = 'Dettagli';
$string['testauserwithtestclientdescription'] = 'Simula l\'accesso al web service dall\'esterno  tramite il client di test. Prima di effettuare il test, autenticati con un account che ha il privilegio "moodle/webservice:createtoken" e ricava il token dell\'utente dalle impostazioni del profilo. Potrai usare questo token nel client di test, dove sceglierai anche il protocolla abilitato. <strong>Attenzione: la funzione che testerai SARA\' REALMENTE ESEGUITA, fai molta attenzione su cosa scegli di provare!</strong>';
$string['testclient'] = 'Test Client web service';
$string['testclientdescription'] = '* Il client di test web service  <strong>esegue</strong> la funzione <strong>REALMENTE</strong>. Evitare di provare funzioni che non si conoscono.<br/>* Non tutte le funzioni web service sono supportate dal client di test. <br/>* Per testare se un utente non è abilitato ad accedere a determinate funzioni, provare con le funzioni che non gli sono consentite.<br/>* Per un debugging più approfondito, impostare il debug a <strong>{$a->mode}</strong> in {$a->atag}<br/>* Accedere a {$a->amfatag}.';
$string['testwithtestclient'] = 'Prova il funzionamento del servizio';
$string['testwithtestclientdescription'] = 'Simula l\'accesso al web service dall\'esterno  tramite il client di test. Puoi utilizzare un protocollo abilitato con l\'autenticazione token.<strong>Attenzione: la funzione che testerai SARA\' REALMENTE ESEGUITA, fai molta attenzione su cosa scegli di provare!</strong>';
$string['token'] = 'Token';
$string['tokenauthlog'] = 'Autenticazione token';
$string['tokencreatedbyadmin'] = 'Può essere reimpostata solo da un amministratore (*)';
$string['tokencreator'] = 'Creatore';
$string['unknownoptionkey'] = 'L\'option key ({$a}) è sconosciuta';
$string['unnamedstringparam'] = 'Un parametro stringa è privo di nome.';
$string['updateusersettings'] = 'Aggiorna';
$string['uploadfiles'] = 'Caricamento file consentito';
$string['uploadfiles_help'] = 'Tutti gli utenti potranno caricare file nei file privati o nei file draft usando la propria chiave di sicurezza. La quota utente rimane in effetto.';
$string['userasclients'] = 'Utenti client tramite token';
$string['userasclientsdescription'] = 'I passi che seguono chiariscono le impostazioni necessarie per l\'accesso dei web service di Moodle da parte di utenti client. I passi suggeriscono anche come impostare il metodo di autenticazione basato su token (chiavi di sicurezza). Gli utenti possono generare il proprio token nella pagina Chiavi di sicurezza presente nelle impostazioni del profilo.';
$string['usermissingcaps'] = 'Privilegi mancanti: {$a}.';
$string['usernameorid'] = 'Username / User id';
$string['usernameorid_help'] = 'Inserisci un username o un user id';
$string['usernameoridnousererror'] = 'Non sono stati trovati utenti con questo username/user id.';
$string['usernameoridoccurenceerror'] = 'Sono stati trovati più di un utente con questo username. Per favore inserisci l\'user id.';
$string['usernotallowed'] = 'L\'utente non è autorizzato ad usare questo servizio. Puoi autorizzarlo nella pagina {$a} di amministrazione degli utenti autorizzati';
$string['usersettingssaved'] = 'Le impostazioni utente sono state salvate';
$string['validuntil'] = 'Valido fino';
$string['validuntil_help'] = 'Dopo la data impostata l\'utente non potrà più accedere al servizio.';
$string['webservice'] = 'Web service';
$string['webservices'] = 'Web service';
$string['webservicesoverview'] = 'Generalità';
$string['webservicetokens'] = 'Token Web service';
$string['wrongusernamepassword'] = 'Username o password errato';
$string['wsaccessuserdeleted'] = 'L\'accesso web service è stato negato, lo username è stato eliminato: {$a}';
$string['wsaccessuserexpired'] = 'L\'accesso web service è stato negato, la password è scaduta: {$a}';
$string['wsaccessusernologin'] = 'L\'accesso web service è stato negato, l\'account è disabilitato: {$a}';
$string['wsaccessusersuspended'] = 'L\'accesso web service è stato negato, lo username è sospeso: {$a}';
$string['wsaccessuserunconfirmed'] = 'L\'accesso web service è stato negato, lo username non è confermato: {$a}';
$string['wsclientdoc'] = 'Documentazione Moodle web service client';
$string['wsdocapi'] = 'Documentazione API';
$string['wsdocumentation'] = 'Documentazione Web service';
$string['wsdocumentationdisable'] = 'La documentazione Web service è disabiliatata';
$string['wsdocumentationintro'] = 'Per creare un client è opportuno documentarsi su {$a->doclink}';
$string['wsdocumentationlogin'] = 'oppure inserisci le tue credenziali web service:';
$string['wspassword'] = 'Password Web service';
$string['wsusername'] = 'Username Web service';
