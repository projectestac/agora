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
 * Strings for component 'badges', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Azioni';
$string['activate'] = 'Abilita accesso';
$string['activatesuccess'] = 'L\'accesso al badge è stato attivato correttamente';
$string['addbadgecriteria'] = 'Aggiungi criterio';
$string['addcourse'] = 'Aggiungi corsi';
$string['addcourse_help'] = 'Seleziona i corsi che consentono di conseguire questo badge. Tieni premuto il tasto CTRL per selezionare più corsi.';
$string['addcriteria'] = 'Aggiungi criterio';
$string['addcriteriatext'] = 'Per aggiungere criteri, selezionare una della opzioni presenti nel menu a discesa.';
$string['addtobackpack'] = 'Aggiungi al backpack';
$string['adminonly'] = 'Solo gli amministratori del sito sono autorizzati ad accedere a questa pagina';
$string['after'] = 'dopo la data di rilascio';
$string['aggregationmethod'] = 'Metodo di aggregazione';
$string['all'] = 'Tutti';
$string['allmethod'] = 'Tutte le condizioni selezionate devono essere soddisfatte';
$string['allmethodactivity'] = 'Completamento di tutte le attività selezionate';
$string['allmethodcourseset'] = 'Completamento di tutti i corsi selezionati';
$string['allmethodmanual'] = 'Rilascio da parte di tutti i ruoli selezionati';
$string['allmethodprofile'] = 'Compilazione di tutti i campi del profilo utente selezionati';
$string['allowcoursebadges'] = 'Abilita badge nei corsi';
$string['allowcoursebadges_desc'] = 'Consente di creare ed assegnare badge nei corsi';
$string['allowexternalbackpack'] = 'Abilita collegamento con backpack esterni';
$string['allowexternalbackpack_desc'] = 'Gli utenti potranno impostare connessioni per visualizzare badge tramite fornitori backpack esterni.

Nota: si raccomanda di disabilitare l\'opzione qualora il sito non sia raggiungibile da internet (ad esempio, in presenza di un firewall).';
$string['any'] = 'Almeno uno';
$string['anymethod'] = 'Almeno una delle seguenti condizioni deve essere soddisfatta';
$string['anymethodactivity'] = 'Completamento di almeno una delle attività selezionate';
$string['anymethodcourseset'] = 'Completamento di almeno uno dei corsi selezionati';
$string['anymethodmanual'] = 'Rilascio da parte di almeno uno dei ruoli selezioanti';
$string['anymethodprofile'] = 'Compilazione di almeno uno dei campi del profilo utente selezionati';
$string['attachment'] = 'Allega badge al messaggio';
$string['attachment_help'] = 'Consente di allegare il file del badge nel messaggio indirizzato al destinatario. Prerequisito è l\'abilitazione degli allegati alle email in Amministrazione del sito > Plugin > Instradamento messaggi > Email.';
$string['award'] = 'Rilascia badge';
$string['awardedtoyou'] = 'Conseguiti da me';
$string['awardoncron'] = 'L\'accesso al badge è stato abilitato correttamente. Poiché moltissimi utenti potrebbero conseguirlo istantaneamente, per evitare cadute di performance l\'operazione potrà impiegare diverso di tempo';
$string['awards'] = 'Destinatari';
$string['backpackavailability'] = 'Verifica esterna badge';
$string['backpackavailability_help'] = 'Affinché i destinatari dei badge ne possano provare il conseguimento, un servizio backpack esterno deve essere in grado di accedere al tuo sito per verificarne il rilascio.
Il tuo sito sembra che non sia raggiungibile, quindi non è possibile verificare né i badge già rilasciati né i badge che saranno rilasciati in futuro.

**Perché visualizzo questo messaggio ?**

E\' possibile che un firewall impedisca l\'accesso da un rete esterna, che lo spazio web sia protetto da password oppure che il sito giri su un computer che non può essere acceduto da internet (ad esempio una macchina locale di sviluppo).

**E\' un problema ?**

Se nel tuo sito di produzione vuoi rilasciare badge, allora devi risolvere il problema altrimenti i destinatari dei badge non ne potranno provare il conseguimento. Se il tuo sito non è ancora in produzione, puoi creare e rilasciare badge di test prima che il tuo sito passi in produzione.

**Come posso fare qualora non fosse possibile pubblicare l\'intero sito ?**

L\'unico URL necessario per la verifica è [your-site-url]/badges/assertion.php. Per la sola verifica dei badge è sufficiente l\'accesso a quell\'URL.';
$string['backpackbadges'] = 'Hai  {$a->totalbadges} badge visualizzati provenienti da {$a->totalcollections} raccolte. <a href="mybackpack.php">Modifica impostazioni backpack</a>.';
$string['backpackconnection'] = 'Connessione backpack';
$string['backpackconnection_help'] = 'E\' possibile impostare una connessione con backpack provider esterni. La connessione ad un backpack consente di visualizzare badge conseguiti su altri siti e di inviare al backpack i badge conseguiti in questo sito.

Al momento è supportato solo <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>. Prima di impostare la connessione, devi sottoscrivere un servizio backpack.';
$string['backpackdetails'] = 'Impostazioni backpack';
$string['backpackemail'] = 'Indirizzo email';
$string['backpackemail_help'] = 'Indirizzo email associato con il tuo backpack. Se la connessione backpack è attiva, i badge ricevuti saranno associati a questo indirizzo.';
$string['backpackimport'] = 'Impostazioni importazione badge';
$string['backpackimport_help'] = 'Dopo aver stabilito la connessione backpack, i badge compariranno nella sezione Badge e nel tuo profilo.

E\' possibile selezionare le raccolte di badge nel tuo backpack per visualizzarle nel tuo profilo.';
$string['badgedetails'] = 'Dettagli badge';
$string['badgeimage'] = 'Immagine';
$string['badgeimage_help'] = 'L\'immagine da usare per il rilascio del badge.

Per aggiungere un\'immagine, seleziona un\'immagine in formato JPG o PNG e poi fai click su "Salva modifiche". L\'immagine verrà adattata alla forma quadrata richiesta per le immagini dei badge.';
$string['badgeprivacysetting'] = 'Impostazioni di privacy del badge';
$string['badgeprivacysetting_help'] = 'I badge conseguiti possono essere visualizzati automaticamente nella pagina del profilo.

E\' possibile controllare la privacy di specifici badge nella propria pagina "Badge"';
$string['badgeprivacysetting_str'] = 'Visualizza automaticamente nel mio profilo i badge conseguiti';
$string['badgesalt'] = 'Salt per l\'hashing dell\'indirizzo email del destinatario';
$string['badgesalt_desc'] = 'L\'hash consente ai servizi backpack di confermare i badge conseguiti dagli utenti senza dover rivelare il loro indirizzo email. L\'impostazione deve contenere solo numeri e lettere.

Nota: per consentire la verifica dei destinatari evitare di modificare questa impostazione dopo aver cominciato a rilasciare badge.';
$string['badgesdisabled'] = 'In questo sito i badge non sono attivi.';
$string['badgesearned'] = 'Numero di badge conseguiti: {$a}';
$string['badgesettings'] = 'Impostazioni badge';
$string['badgestatus_0'] = 'Non disponibile agli utenti';
$string['badgestatus_1'] = 'Disponibile agli utenti';
$string['badgestatus_2'] = 'Non disponibile agli utenti';
$string['badgestatus_3'] = 'Disponibile agli utenti';
$string['badgestatus_4'] = 'Archiviato';
$string['badgestoearn'] = 'Numero di badge disponibili: {$a}';
$string['badgesview'] = 'Badge del corso';
$string['badgeurl'] = 'Link ai badge rilasciati';
$string['bawards'] = 'Rilasci ({$a})';
$string['bcriteria'] = 'Criteri';
$string['bdetails'] = 'Modifica';
$string['bmessage'] = 'Messaggio';
$string['boverview'] = 'Panoramica';
$string['bydate'] = 'Da completare entro';
$string['clearsettings'] = 'Elimina impostazioni';
$string['completioninfo'] = 'Il badge è stato rilasciato a valle del completamento di:';
$string['completionnotenabled'] = 'In questo corso il completamento non è abilitato e pertanto non è possibile utilizzare il completamento del corso come criterio di conseguimento del badge. E\' possibile abilitare il completamento nelle impostazioni del corso.';
$string['configenablebadges'] = 'Consente di creare badge e rilasciarli agli utenti del sito';
$string['configuremessage'] = 'Messaggio badge';
$string['connect'] = 'Connetti';
$string['connected'] = 'Connesso';
$string['connecting'] = 'Connessione in corso...';
$string['contact'] = 'Contatto';
$string['contact_help'] = 'Indirizzo email associato con chi rilascia il badge';
$string['copyof'] = 'Copia di {$a}';
$string['coursebadges'] = 'Badge';
$string['coursebadgesdisabled'] = 'I badge del corso non sono abilitati.';
$string['coursecompletion'] = 'Gli utenti devono completare il corso';
$string['create'] = 'Nuovo badge';
$string['createbutton'] = 'Crea badge';
$string['creatorbody'] = '<p>{$a->user} ha soddisfatto i criteri necessari ed ha conseguito il badge. Per vedere il badge rilasciato:  {$a->link} </p>';
$string['creatorsubject'] = '\'{$a}\' è stato conseguito!';
$string['criteria_0'] = 'Criteri di rilascio badge';
$string['criteria_1'] = 'Completamento attività';
$string['criteria_1_help'] = 'Abilita il rilascio del badge al comportamento di un insieme di attività del corso';
$string['criteria_2'] = 'Rilascio manuale in base al ruolo';
$string['criteria_2_help'] = 'Abilita utenti con uno specifico ruolo a livello di sito o di corso a rilasciare manualmente badge';
$string['criteria_3'] = 'Partecipazione relazionale';
$string['criteria_3_help'] = 'Relazionale';
$string['criteria_4'] = 'Completamento corso';
$string['criteria_4_help'] = 'Abilita il rilascio del badge al completamento del corso. Questo criterio può avere parametri addizionali come ad esempio il punteggio minimo richiesto o la data di completamento corso.';
$string['criteria_5'] = 'Completamento di un gruppo di corsi';
$string['criteria_5_help'] = 'Il badge sarà rilasciato a coloro che completeranno un gruppo di corsi. Per ogni corso è possibile impostare parametri come il punteggio minimo o la data di completamento.';
$string['criteria_6'] = 'Compilazione profilo utente';
$string['criteria_6_help'] = 'Il badge sarà rilasciato a coloro che compileranno determinati campi del profilo utente. E\' possibile selezionare sia campi standard sia campi personalizzati';
$string['criteriacreated'] = 'I criteri per il badge sono stati creati correttamente';
$string['criteriadeleted'] = 'I criteri per il badge sono stati eliminati correttamente';
$string['criteria_descr'] = 'Gli utenti conseguono il badge al soddisfacimento dei requisti elencati:';
$string['criteria_descr_0'] = 'Gli utenti conseguono il badge se i requisiti elencati (<strong>{$a}</strong>) sono soddisfatti';
$string['criteria_descr_1'] = 'Le seguenti attività devono essere completate (<strong>{$a}</strong>)';
$string['criteria_descr_2'] = 'Il badge viene conseguito se i ruoli elencati (<strong>{$a}</strong>) lo rilasciano:';
$string['criteria_descr_4'] = 'Gli utenti devono completare il corso';
$string['criteria_descr_5'] = 'I seguenti corsi devono essere completati (<strong>{$a}</strong>):';
$string['criteria_descr_6'] = 'I seguenti campi del profilo utente devono essere compilati (<strong>{$a}</strong>):';
$string['criteria_descr_bydate'] = 'entro il <em>{$a}</em>';
$string['criteria_descr_grade'] = 'con un punteggio minimo di <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Criteri da soddisfare (<strong>{$a}</strong>):';
$string['criteria_descr_short1'] = 'Completamento attività (<strong>{$a}</strong>):';
$string['criteria_descr_short2'] = 'Rilascio da parte di ruoli (<strong>{$a}</strong>):';
$string['criteria_descr_short4'] = 'Completare il corso';
$string['criteria_descr_short5'] = 'Completamento corsi (<strong>{$a}</strong>):';
$string['criteria_descr_short6'] = 'Compilazione campi profilo (<strong>{$a}</strong>):';
$string['criteria_descr_single_1'] = 'La seguente attività deve essere completata:';
$string['criteria_descr_single_2'] = 'Il badge viene conseguito se il ruolo seguente lo rilascia:';
$string['criteria_descr_single_4'] = 'Gli utenti devono completare il corso';
$string['criteria_descr_single_5'] = 'Corso da completare:';
$string['criteria_descr_single_6'] = 'Attività da completare:';
$string['criteria_descr_single_short1'] = 'Completare:';
$string['criteria_descr_single_short2'] = 'Rilasciato da:';
$string['criteria_descr_single_short4'] = 'Completare il corso';
$string['criteria_descr_single_short5'] = 'Completare:';
$string['criteria_descr_single_short6'] = 'Compilare:';
$string['criteriasummary'] = 'Sintesi dei criteri';
$string['criteriaupdated'] = 'I criteri per il badge sono stati aggiornati correttamente';
$string['criterror'] = 'Problematiche sui parametri';
$string['criterror_help'] = 'Di seguito vengono visualizzati  i parametri non più disponibili ma utilizzati per il rilascio del badge. Si raccomanda di deselezionare tali parametri per garantire che il badge possa essere nuovamente conseguito.';
$string['currentimage'] = 'Immagine utilizzata';
$string['currentstatus'] = 'Stato:';
$string['dateawarded'] = 'Data di rilascio';
$string['dateearned'] = 'Data: {$a}';
$string['day'] = 'Giorni';
$string['deactivate'] = 'Disabilita accesso';
$string['deactivatesuccess'] = 'L\'accesso al badge è stato disabilitato correttamente';
$string['defaultissuercontact'] = 'Contatto di default di chi rilascia il badge';
$string['defaultissuercontact_desc'] = 'Indirizzo email di default associato con chi rilascia il badge';
$string['defaultissuername'] = 'Nome di default di chi rilascia il badge';
$string['defaultissuername_desc'] = 'Nome di default dell\'agenzia o dell\'autorità che rilascia il badge';
$string['delbadge'] = 'Elimina badge';
$string['delconfirm'] = 'Sei sicuro di eliminare il badge \'{$a}\'?';
$string['delcritconfirm'] = 'Sei sicuro di eliminare questo criterio?';
$string['delparamconfirm'] = 'Sei sicuro di eliminare questo parametro?';
$string['description'] = 'Descrizione';
$string['disconnect'] = 'Disconnetti';
$string['donotaward'] = 'Il badge non è attivo e gli utenti non possono conseguirlo. Se desideri che gli utenti conseguano il badge, devi cambiare lo stato ad attivo.';
$string['editsettings'] = 'Modifica impostazioni';
$string['enablebadges'] = 'Abilita badge';
$string['error:backpackdatainvalid'] = 'I dati restituiti dal backpack non sono validi';
$string['error:backpackemailnotfound'] = 'L\'email \'{$a}\' non è associata ad un backpack. E\' necessario <a href="http://backpack.openbadges.org">creare un backpack</a> per l\'account o autenticarsi con un altro indirizzo email.';
$string['error:backpackloginfailed'] = 'Il collegamento con il backpack esterno non è stato possibile per il seguente motivo: {$a}';
$string['error:backpacknotavailable'] = 'Il tuo sito non è accessibile da internet, i badge rilasciati non potranno essere verificati da servizi backpack esterni';
$string['error:backpackproblem'] = 'Si sono verificati problemi di connessione con il service provider del backpack. Per favore riprova.';
$string['error:badjson'] = 'Il tentativo di collegamento ha restituito dati non validi.';
$string['error:cannotact'] = 'Non è possibile attivare i badge.';
$string['error:cannotawardbadge'] = 'Non è possibile rilasciare badge all\'utente.';
$string['error:clone'] = 'Non è possibile clonare il badge.';
$string['error:connectionunknownreason'] = 'Il collegamento non è riuscito ma non ne sono stati forniti i motivi.';
$string['error:duplicatename'] = 'Nel sistema esiste già un badge con lo stesso nome';
$string['error:externalbadgedoesntexist'] = 'Badge non trovato';
$string['error:guestuseraccess'] = 'Stai utilizzando un accesso ospite. Per visualizzare i badge devi autenticarti con il tuo account.';
$string['error:invalidbadgeurl'] = 'Formato non valido per l\'URL di chi rilascia il badge';
$string['error:invalidcriteriatype'] = 'Tipo di criterio non valido.';
$string['error:invalidexpiredate'] = 'La scadenza deve essere una data futura';
$string['error:invalidexpireperiod'] = 'La scadenza non può essere negativa o uguale a zero.';
$string['error:noactivities'] = 'In questo corso non ci sono attività con il completamento abilitato.';
$string['error:noassertion'] = 'Persona non ha restituito nessuna asserzione. Forse hai chiuso la finestra di login troppo presto.';
$string['error:nocourses'] = 'Il completamento del corso non è abilitato in nessun corso di questo sito. E\' possibile abilitare il completamento nelle impostazioni del corso.';
$string['error:nogroups'] = '<p>Nel tuo backpack non ci sono raccolte disponibili.</p><p>Sono visualizzate solamente le raccolte pubbliche, <a href="http://backpack.openbadges.org">visita il tuo backpack</a> per creare raccolte pubbliche.</p>';
$string['error:nopermissiontoview'] = 'Non sei autorizzato a visualizzare i destinatari del badge';
$string['error:nosuchbadge'] = 'Il badge id {$a} non esiste';
$string['error:nosuchcourse'] = 'Attenzione: il corso non è più disponible';
$string['error:nosuchfield'] = 'Attenzione: il campo del profilo utente non è più disponibile';
$string['error:nosuchmod'] = 'Attenzione: l\'attività non è più disponibile';
$string['error:nosuchrole'] = 'Attenzione: il ruolo non è più disponibile';
$string['error:nosuchuser'] = 'Nel backack provider non sono presenti utenti con l\'email indicata.';
$string['error:notifycoursedate'] = 'Attenzione: i badge i cui criteri dipendono dal completamento del corso e delle attività non saranno rilasciati fino alla data di inizio del corso.';
$string['error:parameter'] = 'Attenzione: devi scegliere almeno un parametro per consentire il corretto rilasci del badge';
$string['error:personaneedsjs'] = 'Per il collegamento è richiesto Javascript. Se possibile, abilita Javascritpt e ricarica la pagina.';
$string['error:requesterror'] = 'La richiesta di collegamento non è riuscita (codice errore {$a}).';
$string['error:requesttimeout'] = 'La richiesta di collegamento è andata in time out prima del completamento.';
$string['error:save'] = 'Non è possibile salvare il badge.';
$string['error:userdeleted'] = '{$a->user} (Questo utente non esiste più in {$a->site})';
$string['evidence'] = 'Verifica';
$string['existingrecipients'] = 'Destinatari badge esistenti';
$string['expired'] = 'Scaduto';
$string['expiredate'] = 'Il badge scade il {$a}.';
$string['expireddate'] = 'Il badge è scaduto il {$a}.';
$string['expireperiod'] = 'Il badge scade {$a} giorni dopo l\'emissione.';
$string['expireperiodh'] = 'Il badge scade {$a} ore dopo l\'emissione.';
$string['expireperiodm'] = 'Il badge scade {$a} minuti dopo l\'emissione.';
$string['expireperiods'] = 'Il badge scade {$a} secondi dopo l\'emissione.';
$string['expirydate'] = 'Data di scadenza';
$string['expirydate_help'] = 'E\' possibile impostare una data di scadenza per i badge. La data può essere fissa oppure calcolata a partire dalla data di emissione.';
$string['externalbadges'] = 'Badge conseguiti su altri siti';
$string['externalbadges_help'] = 'Quest\'area visualizza i badge provenienti dal tuo backpack esterno';
$string['externalbadgesp'] = 'Badge conseguiti in altri siti:';
$string['externalconnectto'] = 'Per visualizzare badge esterni, devi <a href="{$a}">connetterti ad un backpack</a>.';
$string['fixed'] = 'Data fissa';
$string['hidden'] = 'Nascosto';
$string['hiddenbadge'] = 'Sfortunatamente il titolare del badge non ha reso disponibile questa informazione.';
$string['issuancedetails'] = 'Scadenza badge';
$string['issuedbadge'] = 'Informazioni sul badge rilasciato';
$string['issuerdetails'] = 'Dettagli di chi rilascia il badge';
$string['issuername'] = 'Nome di chi rilascia il badge';
$string['issuername_help'] = 'Nome dell\'agenzia o dell\'autorità che rilascia il badge';
$string['issuerurl'] = 'URL di di chi rilascia il basge';
$string['localbadges'] = 'Badge conseguiti su {$a}';
$string['localbadgesh'] = 'Badge conseguiti su questo sito';
$string['localbadgesh_help'] = 'L\'elenco dei badge conseguiti su questo sito dopo aver  completato corsi, attività dei corsi e aver soddisfatto altri requisiti.

E\' possibile gestire i tuoi badge rendendoli pubblici o privati.

Puoi scaricare i badge singolarmente oppure tutti assieme e scalvarli nel tuo computer. I badge scaricati possono essere aggiunti a servizi backpack esterni.';
$string['localbadgesp'] = 'Badge da {$a}:';
$string['localconnectto'] = 'Per condividere badge al di fuori dei questo sito, devi <a href="{$a}">connetterti ad un backpack</a>.';
$string['makeprivate'] = 'Rendi privato';
$string['makepublic'] = 'Rendi pubblico';
$string['managebadges'] = 'Gestione badge';
$string['message'] = 'Corpo del messaggio';
$string['messagebody'] = '<p>Hai conseguito il badge "%badgename%"!</p>
<p>Per maggiori informazioni sul badge:  %badgelink%.</p>
<p>Se il badge non è allegato alla mail, puoi scaricarlo qui: {$a}.</p>';
$string['messagesubject'] = 'Complimenti! Hai conseguito un badge!';
$string['method'] = 'Requisti da soddisfare';
$string['mingrade'] = 'Punteggio minimo richiesto';
$string['month'] = 'Mesi';
$string['mybackpack'] = 'Impostazioni mio backpack';
$string['mybadges'] = 'Badge';
$string['never'] = 'Mai';
$string['newbadge'] = 'Nuovo badge';
$string['newimage'] = 'Nuova immagine';
$string['noawards'] = 'Questo badge non è stato rilasciato.';
$string['nobackpack'] = 'Non ci sono servizi backpack collegati a questo account.<br/>';
$string['nobackpackbadges'] = 'Nella raccolta selezionata non ci sono badge. <a href="mybackpack.php">Aggiungi raccolte</a>.';
$string['nobackpackcollections'] = 'Non son state selezionate raccolte di badge. <a href="mybackpack.php">Aggiungi raccolte</a>.';
$string['nobadges'] = 'Non sono presenti badge.';
$string['nocriteria'] = 'I criteri per questo badge non sono stati impostati';
$string['noexpiry'] = 'Questo badge non ha data di scadenza';
$string['noparamstoadd'] = 'Non ci sono altri parametri disponibili da aggiungere ai criteri di rilascio del badge';
$string['notacceptedrole'] = 'Il tuo ruolo non è presente tra i ruoli che possono rilasciare manualmente il badge.<br/>
Per visualizzare l\'elenco degli utenti che hanno conseguito questo badge, visita {$a}.';
$string['notconnected'] = 'Non connesso';
$string['nothingtoadd'] = 'Non sono disponibili criteri da aggiungere';
$string['notification'] = 'Informa il creatore del badge';
$string['notification_help'] = 'Consente di impostare le notifiche dei badge rilasciati da inviare al creatore del badge.

Sono disponibili le seguenti opzioni:

* **MAI** - Non saranno inviate notifcihe

 * **SEMPRE** - Invia una notifica tutte le volte che un badge viene conseguito

 * **GIORNALMENTE** - Invia una notifica una sola volta al giorno

 * **SETTIMANALMENTE** - Invia una notifica una sola volta alla settimana

 * **MENSILMENTE** - Invia una notifica una sola volta al mese';
$string['notifydaily'] = 'Giornalmente';
$string['notifyevery'] = 'Sempre';
$string['notifymonthly'] = 'Mensilmente';
$string['notifyweekly'] = 'Settimanalemnte';
$string['numawards'] = 'Badge rilasciato a <a href="{$a->link}">{$a->count}</a> utenti.';
$string['numawardstat'] = 'Badge rilasciato a {$a} utenti.';
$string['overallcrit'] = 'Metodo di aggregazione dei requisiti';
$string['personaconnection'] = 'Autenticati con la tua email';
$string['personaconnection_help'] = 'Persona è un sistema per identificarti nel web tramite un tuo indirizzo di email. Il backpack Open Badge utilizza Persona per l\'autenticazione, pertanto per connetterti ad un backpack devi avere un account Persona.

Per maggiori informazioni su Persona: <a href="https://login.persona.org/about">https://login.persona.org/about</a>.';
$string['potentialrecipients'] = 'Destinatari potenziali badge';
$string['recipientdetails'] = 'Dettagli destinatario';
$string['recipientidentificationproblem'] = 'Non è possibile trovare un destinatario del badge tra gli utenti esistenti.';
$string['recipients'] = 'Destinatari badge';
$string['recipientvalidationproblem'] = 'L\'utente attuale non può essere verificato come destinatario del badge';
$string['relative'] = 'Data relativa';
$string['requiredcourse'] = 'E\' necessario aggiungere al criterio almeno un corso.';
$string['reviewbadge'] = 'Modifica accesso al badge';
$string['reviewconfirm'] = '<p>Il badge diverrà visibile agli utenti i quali potranno cominciare a conseguirlo.</p>

<p>E\' possibile che alcuni utenti abbiano già soddisfatto i criteri, nel qual caso riceveranno il badge.</p>

<p>Una volta che un badge sarà stato rilasciato, sarà <strong>bloccato</strong> - alcune impostazioni, inclusi i criteri e la scadenza, non potranno più essere modificate.</p>

<p>Sei certo di abilitare l\'accesso al badge \'{$a}\'?</p>';
$string['save'] = 'Salva';
$string['searchname'] = 'Cerca per nome';
$string['selectaward'] = 'Scegliere il ruolo da utilizzare per rilasciare il badge';
$string['selectgroup_end'] = 'Sono visualizzate solamente le raccolte pubbliche, <a href="http://backpack.openbadges.org">visita il tuo backpack</a> per creare ulteriori raccolte pubbliche.';
$string['selectgroup_start'] = 'Seleziona nel tuo backpack le raccolte da visualizzare in questo sito:';
$string['selecting'] = 'Con i badge selezionati...';
$string['setup'] = 'Imposta connesione';
$string['signinwithyouremail'] = 'Autenticati con la tua email';
$string['sitebadges'] = 'Badge del sito';
$string['sitebadges_help'] = 'I badge del sito possono essere rilasciati agli utenti solo per attività svolte a livello di sito, come ad esempio completare un gruppo di corsi o compilare campi del profilo utente. I badge del sito possono essere rilasciati manualmente da un utente abilitato.

I badge relatavi ad attività dei corsi devono essere creati a livello di corso. I badge del corso sono gestibili tramite la voce di menu Amministrazione > Badge';
$string['status'] = 'Stato badge';
$string['status_help'] = 'Lo stato del badge determina il suo comportamento nel sistema:

* **DISPONIBILE** - Il badge può essere conseguito dagli utenti. Se un badge è disponibile agli utenti, i criteri di conseguimento non possono essere modificati

* **NON DISPONIBILE** - Il badge non può essere conseguito dagli utenti né essere rilasciato manualmente. Se il badge non è mai stato rilasciato, i criteri di conseguimento possono essere modificati.

Dopo il rilascio di un badge ad almeno un utente, il badge diventa **BLOCCATO**. I badge bloccati possono essere conseguiti dagli utenti ma non possono essere modificati i criteri di rialscio. Se devi modificare un badge bloccato, puoi duplicarlo e applicare le modifiche.

*Perché i badge vengono bloccati?*

E\' indispensabile garantire che gli utenti conseguano il badge in base agli stessi criteri. Al momento non è possibile revocare badge. Se fosse possibile modificare i criteri di rilascio liberamente, si rischierebbe di rilasciare lo stesso badge sulla base di criteri completamente diversi.';
$string['statusmessage_0'] = 'Il badge non è disponibile agli utenti. Se desideri che gli utenti possano conseguire il badge, devi abilitarne l\'accesso.';
$string['statusmessage_1'] = 'Il badge è disponibile agli utenti. Per modificarlo, devi disabilitarne l\'accesso.';
$string['statusmessage_2'] = 'Il badge non è disponibile agli utenti e i criteri per conseguirlo sono bloccati. Se desideri che gli utenti possano conseguire il badge, devi abilitarne l\'accesso.';
$string['statusmessage_3'] = 'Il badge è disponibile agli utenti e i criteri per conseguirlo sono bloccati.';
$string['statusmessage_4'] = 'Questo badge al momento è archiviato';
$string['subject'] = 'Oggetto del messaggio';
$string['variablesubstitution'] = 'Sostituzione delle variabili nel messaggio';
$string['variablesubstitution_help'] = 'In un messaggio badge è possibile inserire variabili nell\'oggetto o nel corpo del messaggio affinché vengano sostituite da valori reali all\'atto dell\'invio del messaggio. Le variabili devono essere inserite esattamente come riportate sotto.

%badgename% : sarà sostituita dal nome del badge

%username% : sarà sostituita dal nome di chi ha conseguito il badge

%badgelink% : sarà sostituita dall\'URL pubblico contenente le informazioni del badge rilasciato.';
$string['viewbadge'] = 'Visualizza badge rilasciati';
$string['visible'] = 'Visibile';
$string['warnexpired'] = '(Questo badge è scaduto!)';
$string['year'] = 'Anni';
