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
 * Strings for component 'mnet', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'Informazioni sul tuo server';
$string['accesslevel'] = 'Livello di accesso';
$string['addhost'] = 'Aggiungi host';
$string['addnewhost'] = 'Aggiungi un host';
$string['addtoacl'] = 'Aggiungi al Controllo accessi';
$string['allhosts'] = 'Tutti gli host';
$string['allhosts_no_options'] = 'Non ci sono opzioni disponibili quando si visualizzano host multipli';
$string['allow'] = 'Consenti';
$string['applicationtype'] = 'Tipo applicazione';
$string['authfail_nosessionexists'] = 'Autorizzazione fallita: la sessione mnet non esiste.';
$string['authfail_sessiontimedout'] = 'Autorizzazione fallita: la sessione mnet è scaduta.';
$string['authfail_usermismatch'] = 'Autorizzazione fallita: l\'utente non corrisponde.';
$string['authmnetdisabled'] = 'Il plugin di autenticazione MNet è <strong>disabilitato</strong>.';
$string['badcert'] = 'Questo non è un certificato valido.';
$string['certdetails'] = 'Dettagli certificato';
$string['configmnet'] = 'MNet consente a questo server di comunicare con altri server o altri servizi.';
$string['couldnotgetcert'] = 'Non è stato trovato nessun certificato su <br />{$a}. <br />. L\'host potrebbe essere spento o non configurato correttamente.';
$string['couldnotmatchcert'] = 'Questo non corrisponde al certificato attualmente pubblicato dal webserver.';
$string['courses'] = 'corsi';
$string['courseson'] = 'corsi su';
$string['currentkey'] = 'Chiave pubblica attiva';
$string['current_transport'] = 'Trasporto attuale';
$string['databaseerror'] = 'Non è stato possibile scrivere dettagli nel database';
$string['deleteaserver'] = 'Eliminazione server';
$string['deletedhostinfo'] = 'L\'host è stato eliminato. Se vuoi ripristinarlo, cambia lo stato di eliminazione a "No"';
$string['deletedhosts'] = 'Host eliminati: {$a}';
$string['deletehost'] = 'Elimina Host';
$string['deletekeycheck'] = 'Sei sicuro di eliminare questa chiave?';
$string['deleteoutoftime'] = 'L\'intervallo di tempo di 60 secondi per eliminare questa chiave è scaduto. Per favore ricomincia.';
$string['deleteuserrecord'] = 'SSO ACL: eliminazione record dell\'utente \'{$a->user}\' da {$a->host}.';
$string['deletewrongkeyvalue'] = 'Si è verificato un errore. Se non stavi cercando di eliminare la chiave SSL del tuo server, è possibile che sei stato oggetto di un attacco. Non è stata eseguita nessuna azione.';
$string['deny'] = 'Impedisci';
$string['description'] = 'Descrizione';
$string['duplicate_usernames'] = 'E\' fallita la creazione di un indice sulle colonne "mnethostid" e "username" nella tua tabella utente.<br/>Questo può succedere quando vi sono <a href="{$a}" target="_blank"> username duplicati nella stessa tabella</a>.<br/>Il tuo aggiornamento può comunque essere correttamente completato. Clicca sul link precedente, e compariranno in una nuova finestra istruzioni per risolvere questo problema. Puoi seguire tali istruzioni alla fine dell\'aggiornamento.<br/>';
$string['enabled_for_all'] = '(Questo servizio è stato abilitato per qualsiasi host).';
$string['enterausername'] = 'Inserisci uno username, o una lista di username separati da virgola.';
$string['error7020'] = 'Questo errore di norma si verifica se il sito remoto ha creato un record per il tuo sito  usando una wwwroot errata, ad esempio, http://iltuosito.com invece di http://www.iltuosito.com. Dovresti contattare l\'amministratore del sito remoto e comunicargli la wwwroot corretta (è definita nella config.php) in modo che possa correggere il record del tuo host.';
$string['error7022'] = 'Il messaggio che hai inviato all\'host remoto è stato crittato ma non è stato firmato. Ciò è davvero insolito:  se il problema si dovesse verificare nuovamente, forse dovresti inserire un bug nel Tracker fornendo il maggior numero di informazioni possibile sulla  versione di Moodle in uso.';
$string['error7023'] = 'Il sito remoto ha provato a decrittare il tuo messaggio usando tutte le chiavi a sua disposizione per il tuo sito. Nessuna chiave ha funzionato. Potresti provare a risolvere il problema scambiando manualmente le chiavi con il sito remoto. Questo problema è molto improbabile che si verifichi a meno che i due siti non abbiano potuto comunicare per alcuni mesi.';
$string['error7024'] = 'Hai inviato un messaggio non crittato al sito remoto, ma il sito remoto non accetta comunicazioni non criptate dal tuo sito.  Ciò è davvero insolito: se il problema si dovesse verificare nuovamente, forse dovresti inserire un bug nel Tracker fornendo il maggior numero di informazioni possibile sulla  versione di Moodle in uso.';
$string['error7026'] = 'La chiave con la quale è stato firmato il tuo messaggio è diversa dalla chiave a disposizione del sito remoto. Inoltre, l\'host remoto ha tentato di ottenere la chiave ma non ci è riuscito. Per favore  a scambia le chiavi manualmente e riprova.';
$string['error709'] = 'Il sito remoto non è riuscito ad ottenere una chiave SSL.';
$string['expired'] = 'Questa chiave è scaduta il';
$string['expires'] = 'Valido fino al';
$string['expireyourkey'] = 'Elimina questa chiave';
$string['expireyourkeyexplain'] = 'Moodle per default ruota automaticamente le chiavi ogni 28 giorni, tuttavia puoi far scadere la chiave attuale <em>manualmente</em> in qualunque momento. Può essere utile se si ritiene che la chiave sia stata compromessa. Una nuova chiave sarà immediatamente creata.<br/>Eliminare la chiave attuale impedirà a tutti gli altri Moodle di comunicare con te, finché non contatterai ogni amministratore e gli fornirai la nuova chiave.';
$string['exportfields'] = 'Campi da esporatre';
$string['failedaclwrite'] = 'Scrittura della access control list MNet per l\'utente \'{$a} non riuscita.';
$string['findlogin'] = 'Individua login';
$string['forbidden-function'] = 'Tale funzione non è stata abilitata per RPC.';
$string['forbidden-transport'] = 'Il metodo di trasporto che stai cercando di usare non è consentito.';
$string['forcesavechanges'] = 'Forza salvataggio modifiche';
$string['helpnetworksettings'] = 'Configura comunicazione MNet';
$string['hidelocal'] = 'Nascondi utenti locali';
$string['hideremote'] = 'Nascondi utenti remoti';
$string['host'] = 'host';
$string['hostcoursenotfound'] = 'Host o corso non trovato';
$string['hostdeleted'] = 'Host eliminato';
$string['hostexists'] = 'Esiste già un record per un host con quel nome (è possibile eliminarlo). <a href="{$a}">fai click qui </a> per modificare il record.';
$string['hostlist'] = 'Elenco host collegati';
$string['hostname'] = 'Nome host';
$string['hostnamehelp'] = 'Il nome a dominio qualificato dell\'host remoto, per esempio: www.example.com';
$string['hostnotconfiguredforsso'] = 'Questo server non è configurato per il login remoto.';
$string['hostsettings'] = 'Impostazioni host';
$string['http_self_signed_help'] = 'Consenti connessioni sull\'host remoto con l\'uso di Certificato DIY SSL sel-signed.';
$string['https_self_signed_help'] = 'Consenti connessioni sull\'host remoto via http con l\'uso di Certificato DIY SSL sel-signed in PHP.';
$string['https_verified_help'] = 'Consenti connessioni sull\'host remoto con l\'uso di Certificato verified SSL.';
$string['http_verified_help'] = 'Consenti connessioni sull\'host remoto con l\'uso di Certificato verified SSL in PHP, ma solo su http (non https).';
$string['id'] = 'ID';
$string['idhelp'] = 'Questo valore è assegnato automaticamente e non può essere modificato.';
$string['importfields'] = 'Campi da importare';
$string['inspect'] = 'Ispeziona';
$string['installnosuchfunction'] = 'Errore nel codice! Qualcosa sta tentando di installare una funzione mnet xmlrpc ({$a->method}) da un file ({$a->file}) che non è possibile trovare!';
$string['installnosuchmethod'] = 'Errore nel codice! Qualcosa sta tentando di installare un metodo mnet xmlrpc ({$a->method}) da un file ({$a->file}) che non è possibile trovare!';
$string['installreflectionclasserror'] = 'Errore nel codice! E\' fallita l\'intropsezione MNet per il metodo \'{$a->method}\' nella classe \'{$a->class}\'. Per comodità ecco il messaggio di errore originale:  \'{$a->error}\'';
$string['installreflectionfunctionerror'] = 'Errore nel codice! E\' fallita l\'intropsezione MNet per la funazione \'{$a->method}\' nel file \'{$a->class}\'. Per comodità ecco il messaggio di errore originale:  \'{$a->error}\'';
$string['invalidaccessparam'] = 'Parametro d\'accesso non valido.';
$string['invalidactionparam'] = 'Parametro d\'azione non valido.';
$string['invalidhost'] = 'Devi inserire un host identifier valido';
$string['invalidpubkey'] = 'La chiave non è una chiave SSL valida. ({$a})';
$string['invalidurl'] = 'Parametro URL non valido.';
$string['ipaddress'] = 'Indirizzo IP';
$string['is_in_range'] = 'L\'indirizzo IP <code>{$a}</code>  appartiene ad un host valido ed affidabile.';
$string['ispublished'] = '{$a} ha abilitato questo servizio per te.';
$string['issubscribed'] = '{$a} ha sottoscritto questo servizio sul tuo host.';
$string['keydeleted'] = 'La chiave è stata eliminata e sostituita con una nuova.';
$string['keymismatch'] = 'La chiave pubblica che hai per questo host è diversa dalla chiave pubblicata. La chiave pubblica attuale è:';
$string['last_connect_time'] = 'Ora ultima connessione';
$string['last_connect_time_help'] = 'L\'ora della tua ultima connessione a questo host.';
$string['last_transport_help'] = 'Il trasporto usato nella tua ultima connessione a tale host.';
$string['leavedefault'] = 'Utilizza le impostazioni di default';
$string['listservices'] = 'Elenca servizi';
$string['loginlinkmnetuser'] = '<br/>Se sei un utente remoto MNet e puoi <a href="{$a}">confermare qui il tuo indirizzo email</a>, potrai essere reindirizzato alla tua pagina di login.<br/>';
$string['logs'] = 'log';
$string['managemnetpeers'] = 'Gestione nodi';
$string['method'] = 'Metodo';
$string['methodhelp'] = 'Help sul metodo {$a}';
$string['methodsavailableonhost'] = 'Metodi disponibili su {$a}';
$string['methodsavailableonhostinservice'] = 'Metodi disponibili per {$a->service} su {$a->host}';
$string['methodsignature'] = 'Firma metodo per {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Concatena (fino a) 3 stringhe e riporta il risultato';
$string['mnetdisabled'] = 'MNet è <strong>disabilitato</strong>.';
$string['mnetidprovider'] = 'Provider MNet ID';
$string['mnetidproviderdesc'] = 'Puoi utilizzare questo servizio per individuare l\'URL corretto dove potersi autenticare. Devi inserire l\'email corrispondente allo username con il quale hai tentato l\'autenticazione.';
$string['mnetidprovidermsg'] = 'Dovresti autenticarti presso il tuo provider {$a}';
$string['mnetidprovidernotfound'] = 'Spiacente, non è stato possibile trovare ulteriori informazioni.';
$string['mnetlog'] = 'Log';
$string['mnetpeers'] = 'Nodi';
$string['mnetservices'] = 'Servizi';
$string['mnet_session_prohibited'] = 'Agli utenti del tuo server non è al momento consentito l\'accesso ad {$a}.';
$string['mnetsettings'] = 'Impostazioni MNet';
$string['moodle_home_help'] = 'Il percorso alla homepage dell\'applicazione MNet sul host remoto, per es. /moodle/';
$string['name'] = 'Nome';
$string['net'] = 'Networking';
$string['networksettings'] = 'Importazioni networking';
$string['never'] = 'Mai';
$string['noaclentries'] = 'Nessun elemento nella lista di controllo degli accessi SSO';
$string['noaddressforhost'] = 'Spiacente, non è possibile risolvere il nome host {$a}';
$string['nocurl'] = 'La libreria PHP cURL non è installata';
$string['nolocaluser'] = 'Non esiste un record locale per l\'utente remoto né è stato possibile creare l\'utente poiché questo host non consente la creazione automatica di utenti. Per favore contatta il tuo amministratore!';
$string['nomodifyacl'] = 'Non ti è consentito di modificare MNet access control list';
$string['nonmatchingcert'] = 'Il soggetto del certificato:<br /><em>{$a->subject}</em><br />non corrisponde al host da cui proviene:<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Si è verificato un problema nella ricerca della chiave pubblica.</br>Forse l\'host non consente MNet oppure la chiave non è valida.';
$string['nosite'] = 'Non è stato possibile trovare il corso a livello di sito';
$string['nosuchfile'] = 'Il file/la funzione {$a} non esiste.';
$string['nosuchfunction'] = 'Impossibile trovare la funzione, o funzione non permessa per RPC.';
$string['nosuchmodule'] = 'La funzione è stata indirizzata in modo non corretto e non è stata trovata. Per favore usare il formato mod/modulename/lib/functionname.';
$string['nosuchpublickey'] = 'Impossibile ottenere la chiave pubblica per la verifica della firma.';
$string['nosuchservice'] = 'Il servizio RPC non è attivo su questo host.';
$string['nosuchtransport'] = 'Non esiste trasporto con questa ID.';
$string['notBASE64'] = 'La stringa non è nel formato base64 encoded. Non può essere una chiave valida.';
$string['notenoughidpinfo'] = 'Ci dispiace, ma il tuo identity provider non ci sta fornendo le informazioni necessarie per creare o aggiornare il tuo account locale.';
$string['not_in_range'] = 'L\'indirizzo IP <code>{$a}</code>  non appartiene ad un host valido ed affidabile.';
$string['notinxmlrpcserver'] = 'Tentativo di accesso al client MNet remoto al di fuori dell\'elaborazione XMRPC del server';
$string['notmoodleapplication'] = 'ATTENZIONE: non si tratta di una applicazione Moodle, alcuni metodi introspettivi potrebbero non funzionare correttamente';
$string['notPEM'] = 'La chiave non è nel formato PEM. Non può funzionare.';
$string['notpermittedtojump'] = 'Non hai il permesso di iniziare una sessione remota da questo server Moodle.';
$string['notpermittedtojumpas'] = 'Non puoi iniziare una sessione remota mentre sei autenticato come un altro utente.';
$string['notpermittedtoland'] = 'Non hai il permesso di iniziare una sessione remota.';
$string['off'] = 'Off';
$string['on'] = 'On';
$string['options'] = 'Opzioni';
$string['peerprofilefielddesc'] = 'E\' possibile alterare le impostazioni globali che regolano i campi del profilo utente da inviare e ricevere durante la creazione di nuovi utenti';
$string['permittedtransports'] = 'Trasporti permessi';
$string['phperror'] = 'Un errore PHP interno ha impedito di soddisfare la tua richiesta.';
$string['position'] = 'Posizione';
$string['postrequired'] = 'La funzione di eliminazione richiede una richiesta POST.';
$string['profileexportfields'] = 'Campi da inviare';
$string['profilefielddesc'] = 'E\' possibile configurare l\'elenco dei campi del profilo utente da inviare e ricevere via MNet durante la creazione o l\'aggiornamento di utenti. E\' anche possibile alterare questa impostazione per ciascun nodo MNet. I seguenti campi saranno sempre inviati indipendentemente dalla configurazione: {$a}';
$string['profilefields'] = 'Campi profilo utente';
$string['profileimportfields'] = 'Campi da ricevere';
$string['promiscuous'] = 'Promiscuo';
$string['publickey'] = 'Chiave pubblica';
$string['publickey_help'] = 'La chiave pubblica viene ottenuta automaticamente dal server remoto.';
$string['publickeyrequired'] = 'Devi fornire una chiave pubblica.';
$string['publish'] = 'Offri il servizio';
$string['reallydeleteserver'] = 'Sei sicuro di voler eliminare il server';
$string['receivedwarnings'] = 'Sono stati ricevuti i seguenti messaggi di attenzione';
$string['recordnoexists'] = 'Il record non esiste.';
$string['reenableserver'] = 'No - seleziona questa opzione per ri-abilitare il server.';
$string['registerallhosts'] = 'Registra qualsiasi host (modalità promiscua)';
$string['registerallhostsexplain'] = 'E\' possibile registrare automaticamente gli host che tentano di collegarsi a questo sito. Come conseguenza, in questa pagina comparirà un elenco degli host che si sono collegati richiedendo la chiave pubblica.<br/>Con il pulsante sottostante è possibile consentire qualsiasi sito Moodle di collegarsi e fruire dei servizi abilitati.';
$string['registerhostsoff'] = 'La registrazione di qualsiasi host è <b>disattivata</b>';
$string['registerhostson'] = 'La registrazione di qualsiasi host è <b>attiva</b>';
$string['remotecourses'] = 'Corsi remoti';
$string['remotehost'] = 'Host remoto';
$string['remotehosts'] = 'Host remoti';
$string['remoteuserinfo'] = 'Il profilo utente remoto {$a->remotetype} è stato ottenuto da <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'Il networking richiede l\'estensione OpenSSL';
$string['restore'] = 'Ripristina';
$string['returnvalue'] = 'Valore di ritorno';
$string['reviewhostdetails'] = 'Dettagli host';
$string['reviewhostservices'] = 'Rivedi Servizi Host';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP non crittato';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (self-signed)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (self-signed)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (signed)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (signed)';
$string['selectaccesslevel'] = 'Seleziona un livello d\'accesso dalla lista.';
$string['selectahost'] = 'Scegli un host remoto.';
$string['service'] = 'Nome servizio';
$string['serviceid'] = 'ID Servizio';
$string['servicesavailableonhost'] = 'Servizi disponibili su {$a}';
$string['serviceswepublish'] = 'Servizi che rendiamo pubblici a {$a}.';
$string['serviceswesubscribeto'] = 'Servizi su {$a} cui siamo iscritti.';
$string['settings'] = 'Impostazioni';
$string['showlocal'] = 'Visualizza utenti locali';
$string['showremote'] = 'Visualizza utenti remoti';
$string['ssl_acl_allow'] = 'SSO ACL: Autorizza l\'utente \'{$a->user}\' proveniente da \'{$a->host}\'';
$string['ssl_acl_deny'] = 'SSO ACL: Rifiuta l\'utente \'{$a->user}\' proveniente da \'{$a->host}\'';
$string['ssoaccesscontrol'] = 'Controllo accessi SSO';
$string['ssoacldescr'] = 'Utilizza queste impostazioni per conferire/negare il privilegio di accesso a specifici utenti provenienti da host remoti MNet. E\' utile quando si offrono servizi SSO a utenti remoti. Se vuoi gestire il privilegio degli utenti <em>locali</em> ad accedere ad altri host remoti MNet, devi modificare i ruoli di sistema dando privilegio <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'Per questa funzionalità è necessario che siano attivi il Networking e il plugn di autenticazione MNet.';
$string['strict'] = 'Strict';
$string['subscribe'] = 'Sottoscrivi il servizio';
$string['system'] = 'Sistema';
$string['testclient'] = 'Test client MNet';
$string['testtrustedhosts'] = 'Prova un indirizzo';
$string['testtrustedhostsexplain'] = 'Inserisci un indirizzo IP per vedere se è un host affidabile.';
$string['theypublish'] = 'Offrono';
$string['theysubscribe'] = 'Sottoscrivono';
$string['transport_help'] = 'Queste opzioni sono reciproche, per cui puoi obbligare un host remoto a usare un certificato SSL firmato solo se il tuo server ha anche un certificato SSL firmato.';
$string['trustedhosts'] = 'Host XML-RPC';
$string['trustedhostsexplain'] = '<p>Il meccanismo degli host affidabili consente a determinate macchine di effettuare chiamate via XML-RPC a qualunque API di Moodle. Grazie a questa opzione script esterni possono controllare il comportamento di Moodle, pertanto può essere una impostazione molto pericolosa. Se hai qualche dubbio, tienila disattivata.</p>
<p><strong>Non è</strong> necessaria per il funzionamento di MNet/p>
<p>Per abilitarla, inserisci una lista di indirizzi IP o reti, uno per ogni riga. Alcuni esempi:</p>Il tuo host locale:<br/>127.0.0.1<br/>Il tuo host locale (con un blocco di rete):<br/>127.0.0.1/32<br/>Solo l\'host con l\'indirizzo IP 192.168.0.7:<br/>192.168.0.7/32<br/>Ogni host con indirizzo IP compreso tra 192.168.0.1 e 192.168.0.255:<br/>192.168.0.0/24<br/>Qualunque host:<br/>192.168.0.0/0<br/>Ovviamente l\'ultimo esempio <b>non é</b> una configurazione raccomandata.';
$string['turnitoff'] = 'Disattiva';
$string['turniton'] = 'Attiva';
$string['type'] = 'Tipo';
$string['unknown'] = 'Sconosciuto';
$string['unknownerror'] = 'Si è verificato un errore sconosciuto durante la negoziazione.';
$string['usercannotchangepassword'] = 'Non puoi cambiare la tua password qui poiché sei un utente remoto.';
$string['userchangepasswordlink'] = '</br>Puoi cambiare la tua password presso il tuo provider <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>.';
$string['usernotfullysetup'] = 'Il tuo profilo utente non è completo. Dovresti <a href="{$a}">ritornare dal tuo provider</a> ed assicurati che il tuo profilo sia completo. Per completare l\'operazione potrà essere necessario autenticarsi nuovamente.';
$string['usersareonline'] = 'Attenzione: {$a} utenti da quel server sono attualmente collegati nel tuo sito.';
$string['validated_by'] = 'E\' convalidato dal network:  <code>{$a}</code>';
$string['verifysignature-error'] = 'La verifica della firma non ha funzionato. Si è verificato un errore.';
$string['verifysignature-invalid'] = 'La verifica della firma non ha funzionato. Sembra che questo oggetto non non sia stato firmato da te.';
$string['version'] = 'Versione';
$string['warning'] = 'Attenzione';
$string['wrong-ip'] = 'Il tuo indirizzo IP non corrisponde all\'indirizzo che abbiamo registrato.';
$string['xmlrpc-missing'] = 'Devi avere XML-RPC installato nel tuo PHP per usare questa funzione.';
$string['yourhost'] = 'Il tuo host';
$string['yourpeers'] = 'I tuoi nodi';
