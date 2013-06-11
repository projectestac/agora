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
 * Strings for component 'enrol_authorize', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Quali tipi di carte di credito saranno accettate?';
$string['adminaccepts'] = 'Selezionare i metodi di pagamento permessi e i loro tipi';
$string['adminauthorizeccapture'] = 'Impostazioni ordina rivedi & auto-cattura';
$string['adminauthorizeemail'] = 'Impostazioni invio email';
$string['adminauthorizesettings'] = 'Impostazioni Merchant Account Authorize.net';
$string['adminauthorizewide'] = 'Impostazioni generali';
$string['adminconfighttps'] = 'Assicurarsi che sia marcata impostazione "<a href="{$a->url}">Usa HTTPS per i login</a>" per usare questo plugin<br/> in Amministrazione del Sito >> Sicurezza >> Sicurezza HTTP.';
$string['adminconfighttpsgo'] = 'Per configurare questo plugin recatevi sulla <a href="{$a->url}">pagina sicura</a>';
$string['admincronsetup'] = 'Lo script cron.php non è stato eseguito da almeno 24 ore.<br/>Il cron deve essere abilitato se si vuole utilizzare la funzionalità di Cattura-Programmata.<br/><b>Abilita</b> \'plugin Authorize.net\' e <b>impostazione cron</b> correttamente; o <b>deseleziona an_review</b>nuovamente.<br/>Se si disabilita la Cattura-Programmata, le transazioni non revisionate dopo 30 giorni saranno annullate.<br/>Seleziona <b>an_review</b> e inserisci <b>\'0\' nel campo an_capture_day</b><br/> se si vuole accettare/annullare <b>manualmente</b> entro 30 giorni.';
$string['adminemailexpiredsort'] = 'Qual\'è importante, quando il numero degli ordini in attesa vengono inviati via mail ai docenti?';
$string['adminemailexpiredsortcount'] = 'Conteggio ordini';
$string['adminemailexpiredsortsum'] = 'Totale importo';
$string['adminemailexpsetting'] = '(0=disabilta invio email, standard=2, max=5)<br/>(Impostazione per l\'invio email con cattura manuale: cron=abilitato, an_review=controllato, an_capture_day=0, an_emailexpired=1-5)';
$string['adminhelpcapturetitle'] = 'Giorno della Cattura Programmata';
$string['adminhelpreviewtitle'] = 'Revisione ordine';
$string['adminneworder'] = 'Caro Amministratore,

un nuovo ordine è in attesa:

Codice Ordine: {$a->orderid}
Codice Transazione: {$a->transid}
Utente: {$a->user}
Corso: {$a->course}
Importo: {$a->amount}

ABILITAZIONE CATTURA-PROGRAMMATA?: {$a->acstatus}

Se la cattura-programmata è attiva, la carta di credito sarà catturata il {$a->captureon}
e poi l\'utente sarà iscritto al corso; altrimenti scadrà il {$a->expireon} e non potrà essere catturata dopo quel giorno.

Si può anche accettare/annullare il pagamento per iscrivere lo studente immediatamente seguendo questo collegamento:
{$a->url}';
$string['adminnewordersubject'] = '{$a->course}; Nuovo ordine in attesa ({$a->orderid})';
$string['adminpendingorders'] = 'Funzionalità cattura-programmata disabilitata.<br/>Un totale di {$a->count} transazioni con lo stato di \'Autorizzato/Cattura in attesa\' stanno per essere annullate senza essere state controllate.<br/>Per accettare/annullare i pagamenti, andare alla pagina <a href=\'{$a->url}\'>Gestione Pagamenti</a>.';
$string['adminteachermanagepay'] = 'I docenti possono gestire il pagamento del corso.';
$string['allpendingorders'] = 'Tutti gli ordini inevasi';
$string['amount'] = 'Spesa';
$string['anauthcode'] = 'Ottieni authcode';
$string['anauthcodedesc'] = 'Se la carta di credito non può essere catturata direttamente da Internet, è necessario ricevere l\'autorizzazione telefonicamente dalla banca del cliente.';
$string['anavs'] = 'Address Verification System';
$string['anavsdesc'] = 'Da selezionare se per il tuo account Authorize.net è attivo l\'Address Verification System (AVS). Durante la compilazione dell\'ordine al cliente verrà richiesto di inserire date come la via, la provincia, la nazione ed il CAP.';
$string['ancaptureday'] = 'Giorno della cattura';
$string['ancapturedaydesc'] = 'Cattura automaticamente la carta di credito, a meno che gli amministratori o i docenti debbano rivedere l\'ordine entro i giorni specificati. Il CRON DEVE ESSERE ABILITATO. <br />(0 giorni significa disabilitare la cattura programmata, quindi gli amministratori o i docenti dovranno rivedere gli ordini manualmente. Se disabiliti la cattura programmata la transazione sarà annullata a meno che l\'ordine non venga rivisto entro 30 giorni.';
$string['anemailexpired'] = 'Notifica scadenza';
$string['anemailexpireddesc'] = 'Impostazione utile per la \'cattura manuale\'. Gli amministratori saranno avvertiti della scadenza dell\'ordine con l\'anticipo di giorni impostato.';
$string['anemailexpiredteacher'] = 'Notifica scadenza - Docente';
$string['anemailexpiredteacherdesc'] = 'Se hai abilitato la cattura manuale e i docenti possono gestire i pagamenti, è anche possibile avvertirli quando un ordine è in scadenza. A ciascun docente sarà inviata una email contenente il promemoria degli ordini in scadenza.';
$string['anlogin'] = 'Authorize.net: Login name';
$string['anpassword'] = 'Authorize.net: Password';
$string['anreferer'] = 'Referer';
$string['anrefererdesc'] = 'Pui definire l\'URL referer se ltale URL è stat aimpostata nel tuo account Authorize.net. In questo modo nella request web sarà inclusa una linea "Referer: URL"';
$string['anreview'] = 'Rivedi';
$string['anreviewdesc'] = 'Rivedi l\'ordine prima di eseguire il pagamento con carta di credito';
$string['antestmode'] = 'Modalità test';
$string['antestmodedesc'] = 'Esegui transazione in modalità test (non avverrà nessun trasferimento di danaro)';
$string['antrankey'] = 'Authorize.Net: Transaction Key';
$string['approvedreview'] = 'Revisione approvata';
$string['authcaptured'] = 'Autorizzato/Catturato';
$string['authcode'] = 'Codice autorizzazione';
$string['authorize:config'] = 'Configurare istanze plugin Authorize.Net';
$string['authorizedpendingcapture'] = 'Autorizzato/Cattura in attesa';
$string['authorizeerror'] = 'Errore Authorize.net: {$a}';
$string['authorize:manage'] = 'Gestire utenti iscritti';
$string['authorize:managepayments'] = 'Gestire pagamenti';
$string['authorize:unenrol'] = 'Disiscrivere utenti dal corso';
$string['authorize:unenrolself'] = 'Disiscriversi dal corso';
$string['authorize:uploadcsv'] = 'Caricare un file CSV';
$string['avsa'] = 'L\'indirizzo (via) corrisponde, il codice postale no';
$string['avsb'] = 'Informazioni dell\'indirizzo non fornite';
$string['avse'] = 'Errore dell\'Address Verification System';
$string['avsg'] = 'Banca fornitrice di Carta non-U.S.';
$string['avsn'] = 'L\'indirizzo (via) non corrisponde e il codice postale nemmeno';
$string['avsp'] = 'Non applicabile al Sistema di Verifica degli Indirizzi';
$string['avsr'] = 'Riprovare - Sistema non disponibile o tempo scaduto';
$string['avsresult'] = 'Risultato AVS: {$a}';
$string['avss'] = 'Servizio non supportato dal fornitore';
$string['avsu'] = 'Informazioni dell\'indirizzo non disponibile';
$string['avsw'] = 'Il codice postale di 9 cifre corrisponde, l\'indirizzo (via) no';
$string['avsx'] = 'L\'indirizzo (via) e il codice postale di 9 cifre corrispondono';
$string['avsy'] = 'L\'indirizzo (via) e il codice postale di 5 cifre corrispondono';
$string['avsz'] = 'Il codice postale di 5 cifre corrisponde, l\'indirizzo (via) no';
$string['canbecredit'] = 'Possono essere restituite il {$a->upto}';
$string['cancelled'] = 'Annullato';
$string['capture'] = 'Cattura';
$string['capturedpendingsettle'] = 'Catturato/ Pagamento in attesa';
$string['capturedsettled'] = 'Catturato/ Pagato';
$string['captureyes'] = 'La carta di credito sarà catturata e lo studente sarà iscritto al corso. Siete sicuri?';
$string['cccity'] = 'Città';
$string['ccexpire'] = 'Scadenza';
$string['ccexpired'] = 'La carta di credito è scaduta';
$string['ccinvalid'] = 'Numero di carta non valido';
$string['cclastfour'] = 'Ultime quattro cifre della Carta';
$string['ccno'] = 'Numero carta di credito';
$string['ccstate'] = 'Stato';
$string['cctype'] = 'Tipo carta di credito';
$string['ccvv'] = 'Verifica carta';
$string['ccvvhelp'] = 'Guardare sul retro della carta (le ultime 3 cifre)';
$string['choosemethod'] = 'Se conosci la chiave d\'accesso del corso, puoi accedere; altrimenti devi acquistare il corso.';
$string['chooseone'] = 'Compilare uno o entrambi i campi seguenti. La password non viene visualizzata.';
$string['cost'] = 'Costo';
$string['costdefaultdesc'] = '<strong>Nelle impostazioni del corso, imposta -1</strong> per utilizzare questo costo standard per il campo costo del corso.';
$string['currency'] = 'Valuta';
$string['cutofftime'] = 'Tempo di cut-off';
$string['cutofftimedesc'] = 'Cut off time della transazione. La transazione quando è stata raccolta l\'ultima volta per il pagamento ?';
$string['dataentered'] = 'Data di inserimento';
$string['delete'] = 'Distruggi';
$string['description'] = 'Il modulo Authorize.net consente le iscrizioni a pagamento. E\' possibile impostare il costo in due modi (1) a livello di sito oppure (2) a livello di corso. Il costo a livello di corso ha precedenza sul costo a livello di sito.';
$string['echeckabacode'] = 'Numero ABI';
$string['echeckaccnum'] = 'Numero conto corrente';
$string['echeckacctype'] = 'Tipo conto corrente';
$string['echeckbankname'] = 'Nome banca';
$string['echeckbusinesschecking'] = 'Conto corrente';
$string['echeckchecking'] = 'Checking';
$string['echeckfirslasttname'] = 'Intestatario conto corrente';
$string['echecksavings'] = 'Risparmi';
$string['enrolenddate'] = 'Data di fine';
$string['enrolenddaterror'] = 'La data di fine iscrizione non può essere successiva alla dati di inizio';
$string['enrolname'] = 'Gateway di pagamento Authorize.Net';
$string['enrolperiod'] = 'Durata dell\'iscrizione';
$string['enrolstartdate'] = 'Inizio';
$string['expired'] = 'Scaduta';
$string['expiremonth'] = 'Mese di scadenza';
$string['expireyear'] = 'Anno di scadenza';
$string['firstnameoncard'] = 'Nome riportato sulla carta';
$string['haveauthcode'] = 'Sono già in possesso di un codice di autorizzazione';
$string['howmuch'] = 'Quanto?';
$string['httpsrequired'] = 'Siamo spiacenti di informarti che la tua richiesta non può essere evasa. Le impostazioni di questo sito potrebbero non essere corrette.<br /><br />Sei pregato di non inserire il tuo numero di carta di credito a mano che tu non veda un lucchetto giallo nella parta bassa della finestra del browser. La presenza del lucchetto indica che i tutti dati inviati tra client e server sono criptati, in questo modo le informazioni durante la transazione sono protette e il numero della carta di credito non può essere letto attraverso internet.';
$string['invalidaba'] = 'Numero ABI non valido';
$string['invalidaccnum'] = 'Numero conto corrente non valido';
$string['invalidacctype'] = 'Tipo conto corrente non valido';
$string['isbusinesschecking'] = 'E\' un conto corrente bancario?';
$string['lastnameoncard'] = 'Cognome riportato sulla carta';
$string['logindesc'] = 'Questa opzione deve essere ON.<br /><br /> È possibile impostare l\'opzione <a href="{$a->url}">loginhttps</a> nella sezione Variabili.<br /><br /> Mettedola a on si farà  utilizzare a Moodle una connessione sicura (https) per l\'accesso e per le pagine di pagamento.';
$string['logininfo'] = 'Per configurare l\'account Authorize.net, è necessario inserire il nome usato per il login e la transaction key <strong>oppure</strong> la password nei relativi campi. Per motivi di sicurezza si raccomanda di utilizzare la transaction key.';
$string['messageprovider:authorize_enrolment'] = 'Messaggi di iscrizione Authorize.Net';
$string['methodcc'] = 'Carta di credito';
$string['methodccdesc'] = 'Seleziona carta di credito e i tipi accettati';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = 'Seleziona eCheck e i tipi accettati';
$string['missingaba'] = 'Numero ABI mancante';
$string['missingaddress'] = 'Indirizzo mancante';
$string['missingbankname'] = 'Nome banca mancante';
$string['missingcc'] = 'Numero carta mancante';
$string['missingccauthcode'] = 'Il codice di autorizzazione è mancante';
$string['missingccexpiremonth'] = 'Manca il mese di scadenza';
$string['missingccexpireyear'] = 'Manca l\'anno di scadenza';
$string['missingcctype'] = 'Tipo di carta mancante';
$string['missingcvv'] = 'Numero di controllo mancante';
$string['missingzip'] = 'Codice postale mancante';
$string['mypaymentsonly'] = 'Visualizza solo i miei pagamenti';
$string['nameoncard'] = 'Titolare carta';
$string['new'] = 'Nuovo';
$string['nocost'] = 'Questo corso può essere acquistato tramite Authorize.net ma non ha un costo!';
$string['noreturns'] = 'Nessuna restituzione!';
$string['notsettled'] = 'Non pagato';
$string['orderdetails'] = 'Dettagli dell\'ordine';
$string['orderid'] = 'ID Ordine';
$string['paymentmanagement'] = 'Gestione pagamento';
$string['paymentmethod'] = 'Metodo di pagamento';
$string['paymentpending'] = 'Il vostro pagamento per questo corso è pendente con questo numero d\'ordine {$a->orderid}.';
$string['pendingecheckemail'] = 'Caro docente,
Ci sono ora {$a->count} echecks in attesa e devi caricare un file csv per iscrivere gli utenti.
Clicca sul link e leggi il file di help sulla pagina che appare:
{$a->url}';
$string['pendingechecksubject'] = '{$a->course}: eChecks in attesa ({$a->count})';
$string['pendingordersemail'] = 'Caro Amministratore,

{$a->pending} transazioni per il corso"{$a->course}" scadranno se non viene accettato il pagamento entro {$a->days} giorni.

Questo è un messaggio di avvertimento, perché non è stato abilitata la cattura-programmata.
Questo significa che è necessario accettare o annullare i pagamenti manualmente.

Per accettare/annullare i pagamenti in attesa andare a:
{$a->url}

Per abilitare la cattura-programmata, questo significa che non riceverete più email di avvertimento, andare a:

{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'Caro docente,
{$a->pending} transazioni costate {$a->currency} {$a->sumcost} per il corso "{$a->course}" scadranno se non accetti il pagamento entro {$a->days} giorni.';
$string['pendingorderssubject'] = 'ATTENZIONE: {$a->course}, {$a->pending} ordini scadranno tra {$a->days} giorni.';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = 'Una transazione duplicata è stata inviata.';
$string['reason13'] = 'Il Login ID del commerciante non è valido o l\'utente non è attivo.';
$string['reason16'] = 'Non è stata trovata la transazione.';
$string['reason17'] = 'Il commerciante non accetta questo tipo di carta di credito.';
$string['reason245'] = 'Questo tipo di eCheck non è permesso usando il modulo di pagamento presente sul gateway di pagamento';
$string['reason246'] = 'Questo tipo di eCheck non è permesso.';
$string['reason27'] = 'La transazione un mismach nel AVS. L\'indirizzo fornito non corrisponde all\'indirizzo del possessore della carta.';
$string['reason28'] = 'Il fornitore del servizio non accetta questo tipo di carta di credito.';
$string['reason30'] = 'La configurazione non è corretta. Rivolgiti al fornitore del servizio (Merchant Service Provider)';
$string['reason39'] = 'Il codice valuta fornito o non è corretto, o non è supportato, o non è ammesso dl fornitore del servizio, o no ha un tasso di cambio.';
$string['reason43'] = 'Il fornitore del servizio non è stato impostato correttamente. Rivolgersi al Merchant Service Provider.';
$string['reason44'] = 'La transazione è stata rifiutata. Errore nel filtro del codice della carta!';
$string['reason45'] = 'La transazione è stata rifiutata. Errore nel filtro del codice della carta / AVS!';
$string['reason47'] = 'L\'importo richiesto per il pagamento non può essere superiore all\'importo originale autorizzato.';
$string['reason5'] = 'È richiesta un importo valido.';
$string['reason50'] = 'Questa transazione è in attesa del pagamento e non può essere restituita.';
$string['reason51'] = 'La somma di tutti i crediti a fronte di questa transazione è maggiore dell\'importo iniziale della transazione.';
$string['reason54'] = 'La transazione in oggetto non rispetta i criteri per la concessione del credito.';
$string['reason55'] = 'La somma di tutti i crediti a fronte della transazione in oggetto sarebbe superiore all\'importo iniziale del debito.';
$string['reason56'] = 'Il fornitore del servizio accetta solamente transazioni di tipo eCheck (ACH): le transazioni con carta di credito non sono accettate.';
$string['refund'] = 'Restituire';
$string['refunded'] = 'Restituito';
$string['returns'] = 'Ritorni';
$string['reviewfailed'] = 'Revisione fallita';
$string['reviewnotify'] = 'Il pagamento verrà  controllato. Aspettatevi una mail in pochi giorni dal vostro docente.';
$string['sendpaymentbutton'] = 'Invia pagamento';
$string['settled'] = 'Pagato';
$string['settlementdate'] = 'Data pagamento';
$string['shopper'] = 'Cliente';
$string['status'] = 'Consenti iscrizioni Autorize.Net';
$string['subvoidyes'] = 'La transazione restituita ({$a->transid}) sta per essere cancellata e e questo produrrà un credito di {$a->amount} sul tuo conto. Sei sicuro?';
$string['tested'] = 'Provato';
$string['testmode'] = '[MODO TEST]';
$string['testwarning'] = 'Catture/Annullamenti/Restituzioni sembrano funzionare in modalità test, ma nessun record è stato modificato o aggiunto nel databese.';
$string['transid'] = 'ID Transazione';
$string['underreview'] = 'Revisione in corso';
$string['unenrolselfconfirm'] = 'Sei sicuro di volerti disiscrivere dal corso "{$a}"?';
$string['unenrolstudent'] = 'Disiscrivi studente?';
$string['uploadcsv'] = 'Invia un file CVS';
$string['usingccmethod'] = 'Iscrivi utilizzando <a href="{$a->url}"><strong>Carta di credito</strong></a>';
$string['usingecheckmethod'] = 'Iscrivi utilizzando <a href="{$a->url}"><strong>eCheck</strong></a>';
$string['verifyaccount'] = 'Verifica il tuo conto authorize.net';
$string['verifyaccountresult'] = '<b>Risultato della verifica:</b> {$a}';
$string['void'] = 'Nulla';
$string['voidyes'] = 'La transazione sarà annullata. Siete sicuri?';
$string['welcometocoursesemail'] = 'Gentile {$a->name},

grazie per il  pagamento.

Ora sei iscritto nei seguenti corsi:

{$a->courses}

Se lo desideri puoi rivedere i dettagli del pagamento oppure modificare il tuo profilo:

{$a->paymenturl}
{$a->profileurl}';
$string['youcantdo'] = 'Non potete effettuare questa azione: {$a->action}';
$string['zipcode'] = 'Codice postale';
