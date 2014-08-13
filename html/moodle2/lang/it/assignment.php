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
 * Strings for component 'assignment', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Ci sono compiti che richiedono la tua attenzione';
$string['addsubmission'] = 'Aggiungi consegna';
$string['allowdeleting'] = 'Consenti ripensamenti';
$string['allowdeleting_help'] = 'I partecipanti potranno eliminare i file caricati prima di segnalare la consegna come completata.';
$string['allowmaxfiles'] = 'Numero massimo di file da inviare';
$string['allowmaxfiles_help'] = 'Numero massimo di file che ogni studente può caricare. Questo numero non viene visualizzato  agli studenti per cui può essere utile renderlo noto nella descrizione del compito.';
$string['allownotes'] = 'Consenti annotazioni';
$string['allownotes_help'] = 'Con le annotazioni i partecipanti potranno inserire informazioni. E\' simile ai Compiti online.';
$string['allowresubmit'] = 'Consenti consegne ripetute';
$string['allowresubmit_help'] = 'Per default gli studenti non possono riconsegnare i compiti dopo la valutazione del docente.';
$string['alreadygraded'] = 'Il tuo compito è già stato valutato e non è prevista la riconsegna.';
$string['assignment:addinstance'] = 'Aggiungere compiti';
$string['assignmentdetails'] = 'Dettagli compito';
$string['assignment:exportownsubmission'] = 'Esportare la propria consegna';
$string['assignment:exportsubmission'] = 'Esportare consegna';
$string['assignment:grade'] = 'Valutare compito';
$string['assignmentmail'] = '{$a->teacher} ha commentato/valutato il tuo compito \'<i>{$a->assignment}</i>\'.

Per visualizzare il commento/voto al tuo compito:

{$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->teacher} ha commentato/valutato il tuo compito \'<i>{$a->assignment}</i>\'.</p>
<p><a href="{$a->url}">Visualizza il commento/voto al tuo compito</a>.</p>';
$string['assignmentmailsmall'] = '{$a->teacher} ha commentato il tuo compito su \'{$a->assignment}\' . Puoi vedere il commento subito sotto il compito consegnato.';
$string['assignmentname'] = 'Titolo del compito';
$string['assignmentsubmission'] = 'Consegne compito';
$string['assignment:submit'] = 'Consegnare compito';
$string['assignmenttype'] = 'Tipo di compito';
$string['assignment:view'] = 'Visualizzare compito';
$string['availabledate'] = 'Inizio consegne';
$string['cannotdeletefiles'] = 'Si è verificato un errore e i file non possono essere eliminati';
$string['cannotviewassignment'] = 'Non puoi visualizzare questo compito';
$string['changegradewarning'] = 'In questo compito ci sono consegne che sono già state valutate, la modifica della valutazione del compito non ricalcolerà le valutazioni date. Se vuoi modificare la valutazione del compito, dovrai anche rivalutare tutte le consegne già valutate.';
$string['closedassignment'] = 'Il compito è chiuso, la data di consegna è passata.';
$string['comment'] = 'Commento';
$string['commentinline'] = 'Commento in linea';
$string['commentinline_help'] = 'Attivando questa impostazione, il contenuto originale del compito sarà copiato nel campo riservato al commento del docente, rendendo più semplice commentare "in linea", ad esempio utilizzando un colore diverso dei caratteri o modificando direttamente il testo originale.';
$string['configitemstocount'] = 'Tipo di elementi da conteggiare nei compiti online.';
$string['configmaxbytes'] = 'Dimensione massima a livello di sito per i compiti (soggetta a limiti del corso e ad altre impostazioni locali)';
$string['configshowrecentsubmissions'] = 'Consente a tutti di visualizzare la notifica delle consegne nei report dell\'attività recente.';
$string['confirmdeletefile'] = 'Sei sicuro di eliminare questo file?<br/><strong>{$a}</strong>';
$string['coursemisconf'] = 'Il corso è mal configurato';
$string['currentgrade'] = 'Voto nel Registro delle valuatzioni';
$string['deleteallsubmissions'] = 'Elimina tutte le consegne';
$string['deletefilefailed'] = 'Eliminazione del file non riuscita.';
$string['description'] = 'Descrizione';
$string['downloadall'] = 'Scarca tutti i compiti in formato zip';
$string['draft'] = 'Bozza';
$string['due'] = 'Scadenza compito';
$string['duedate'] = 'Termine consegne';
$string['duedateno'] = 'Senza scadenza';
$string['early'] = '{$a} in anticipo';
$string['editmysubmission'] = 'Modifica il mio compito';
$string['editthesefiles'] = 'Modifica questi file';
$string['editthisfile'] = 'Aggiorna questi file';
$string['emailstudents'] = 'Avvisi via email agli studenti';
$string['emailteachermail'] = '{$a->username} ha modificato la propria consegna di \'{$a->assignment}\' il {$a->timeupdated}

Il compito è disponibile al link:

{$a->url}';
$string['emailteachermailhtml'] = '<p>{$a->username} ha modificato la propria consegna di <i>\'{$a->assignment} il {$a->timeupdated}</i>\'.</p>
<p>Il compito è disponibile a <a href="{$a->url}">questo link</a>.</p>';
$string['emailteachers'] = 'Avvisi ai docenti via email';
$string['emailteachers_help'] = 'I docenti possono essere avvisati via email ogni volta che gli studenti consegnano o modificano la consegna di un compito.

Saranno avvisati solamente i docenti abilitati a valutare il compito. Ad esempio, se il corso utilizza la modalità gruppi separati, i docenti assegnati ad un gruppo non riceveranno email riguardanti compiti consegnati da studenti di altri gruppi.';
$string['emptysubmission'] = 'Non hai effettuato consegne';
$string['enablenotification'] = 'Invia email di notifica';
$string['enablenotification_help'] = 'Gli studenti riceveranno via email la notifica che il loro compito è stato valutato.';
$string['errornosubmissions'] = 'Non ci sono consegne da scaricare';
$string['existingfiledeleted'] = 'Il file esistente è stato eliminato: {$a}';
$string['failedupdatefeedback'] = 'L\'aggiornamento del commento per la consegna dell\'utente {$a} non è riuscito';
$string['feedback'] = 'Commento';
$string['feedbackfromteacher'] = 'Commento di {$a}';
$string['feedbackupdated'] = 'Commenti aggiornati per {$a} utenti';
$string['finalize'] = 'Aggiornamento consegne non consentito';
$string['finalizeerror'] = 'Si è verificato un errore e la consegna non può essere completata';
$string['futureaassignment'] = 'Il compito non è ancora disponibile.';
$string['graded'] = 'Valutato';
$string['guestnosubmit'] = 'Spiacente, gli ospiti non possono consegnare compiti.
Devi autenticarti/registrarti prima di poter effettuare consegne';
$string['guestnoupload'] = 'Spiacente, gli ospiti non possono caricare file.';
$string['helpoffline'] = '<p>Questo tipo di compito è utile quando il compito va svolto al di fuori di Moodle. Ad esempio, potrebbe essere svolto da qualche altra parte sul web oppure essere frutto di un\'attività in presenza.</p><p>Gli studenti possono vedere la descrizione del compito da svolgere ma non possono consegnare file. La valutazione funziona normalmente e gli studenti riceveranno la notifica dei voti ottenuti.</p>';
$string['helponline'] = '<p>Questo tipo di compito online prevede che gli utenti redigano un testo utilizzando i normali strumenti di editing online. I docenti possono valutare i lavori online ed  aggiungere commenti in linea o modifiche.</p>
<p>(Se hai familiarità  con le vecchie versioni di Moodle, questo tipo di compito consente di svolgere le stesse funzioni del vecchio modulo Diario).</p>';
$string['helpupload'] = '<p>Questo tipo di compito consente ai partecipanti di caricare uno o più file di qualsiasi formato. E\' possibile caricare documenti Word, immagini, siti web zippati, eccetera.</p>
<p>Con questo compito anche il docente può inviare più file come replica. Tali file possono essere caricati anche prima delle consegne degli studenti, funzione utile se si desidera dare ad ogni partecipante uno o più file su cui lavorare.</p>
<p>I partecipanti possono anche inserire annotazioni per descrivere le consegne, lo stato di avanzamento ed altre informazioni.</p>
<p>Le consegne di compiti di questo tipo devono essere esplicitamente dichiarate "completate" dai partecipanti. Il docente può controllare in ogni momento lo stato delle consegne. I compiti non completati sono indicati come Bozze. Il docente può inoltre riportare allo stato di Bozza qualsiasi compito che non sia stato ancora valutato.</p>';
$string['helpuploadsingle'] = '<p>Questo tipo di compito consente ai partecipanti di consegnare un file, in qualsiasi formato.</p><p>Il file può essere un documento di testo, un\'immagine, un sito web compresso, eccetera.</p>';
$string['hideintro'] = 'Nascondi la descrizione fino alla data di Inizio consegne';
$string['hideintro_help'] = 'Abilitando questa opzione, la descrizione del compito non risulterà visibile fino alla data di Inizio consegne.';
$string['invalidassignment'] = 'Compito non valido';
$string['invalidfileandsubmissionid'] = 'ID dell\'invio o il file non è valido';
$string['invalidid'] = 'ID compito non valido';
$string['invalidsubmissionid'] = 'ID dell file non valido';
$string['invalidtype'] = 'Tipo di compito non valido';
$string['invaliduserid'] = 'ID utente non valido';
$string['itemstocount'] = 'Conteggio';
$string['lastgrade'] = 'Voto più recente';
$string['late'] = '{$a} in ritardo';
$string['maximumgrade'] = 'Voto massimo';
$string['maximumsize'] = 'Dimensione massima';
$string['maxpublishstate'] = 'Visibilità max. del blog post prima della data di consegna';
$string['messageprovider:assignment_updates'] = 'Notifiche compito (2.2)';
$string['modulename'] = 'Compito (2.2)';
$string['modulename_help'] = 'I compiti consentono l\'assegnazione di attività da valutare che gli studenti possono svolgere sia on line che off line.';
$string['modulenameplural'] = 'Compiti (2.2)';
$string['newsubmissions'] = 'Compiti consegnati';
$string['noassignments'] = 'Non ci sono ancora compiti';
$string['noattempts'] = 'Non ci sono consegne per questo compito';
$string['noblogs'] = 'Non hai blog post da consegnare!';
$string['nofiles'] = 'Nessun file consegnato';
$string['nofilesyet'] = 'Nessun file ancora consegnato';
$string['nomoresubmissions'] = 'Non sono consentite ulteriori consegne.';
$string['norequiregrading'] = 'Non ci sono compiti da valutare';
$string['nosubmisson'] = 'Nessuno ha consegnato il compito';
$string['notavailableyet'] = 'Spiacente, questo compito non è ancora disponibile.<br/>Le istruzioni per lo svolgimento del compito saranno disponibili a partire dalla data sotto riportata.';
$string['notes'] = 'Annotazioni';
$string['notesempty'] = 'Nessun elemento';
$string['notesupdateerror'] = 'Errore nell\'aggiornamento delle annotazioni';
$string['notgradedyet'] = 'Non ancora valutato';
$string['notsubmittedyet'] = 'Non ancora inviato';
$string['onceassignmentsent'] = 'Dopo aver segnalato la consegna come completata, non sarà più possibile eliminare o consegnare altri file. Vuoi continuare?';
$string['operation'] = 'Operazione';
$string['optionalsettings'] = 'Impostazioni opzionali';
$string['overwritewarning'] = 'Attenzione: consegnando altri file, quelli già presenti saranno SOSTITUITI.';
$string['page-mod-assignment-submissions'] = 'Pagina di consegna del modulo compito';
$string['page-mod-assignment-view'] = 'Pagina principale del modulo compito';
$string['page-mod-assignment-x'] = 'Qualsiasi pagina principale del modulo compito';
$string['pagesize'] = 'Consegne visualizzate per pagina';
$string['pluginadministration'] = 'Gestione Compito';
$string['pluginname'] = 'Compito (2.2)';
$string['popupinnewwindow'] = 'Apri in una nuova finestra';
$string['preventlate'] = 'Rifiuta consegne in ritardo';
$string['quickgrade'] = 'Abilita valutazione rapida';
$string['quickgrade_help'] = 'La Valutazione rapida consente la valutazione veloce di più compiti nella stessa pagina. Dopo aver modificato valutazioni e commenti sarà possibile premere il pulsante Salva per memorizzare contemporaneamente tutte le modifiche apportate.';
$string['requiregrading'] = 'Valutazione obbligatoria';
$string['responsefiles'] = 'File di replica';
$string['reviewed'] = 'Rivisto';
$string['saveallfeedback'] = 'Salva tutte le mie risposte';
$string['selectblog'] = 'Seleziona il blog post che desideri consegnare';
$string['sendformarking'] = 'Segnala il completamento della consegna';
$string['showrecentsubmissions'] = 'Visualizza consegne recenti';
$string['submission'] = 'Consegna';
$string['submissiondraft'] = 'Consegna bozza';
$string['submissionfeedback'] = 'Commento alla consegna';
$string['submissions'] = 'Consegne';
$string['submissionsaved'] = 'Modifiche salvate';
$string['submissionsnotgraded'] = '{$a} consegne non valutate';
$string['submitassignment'] = 'Consegna il tuo compito usando questo form';
$string['submitedformarking'] = 'E\' stato segnalato il completamento della consegna. Il compito non può più essere modificato';
$string['submitformarking'] = 'Consegna finale per valutazione';
$string['submitted'] = 'Consegnato';
$string['submittedfiles'] = 'File consegnati';
$string['subplugintype_assignment'] = 'Tipo di compito';
$string['subplugintype_assignment_plural'] = 'Tipi di compito';
$string['trackdrafts'] = 'Abilita Segnalazione consegna completata';
$string['trackdrafts_help'] = 'Il pulsante "Segnala il completamento della consegna" consente agli studenti di segnalare che il proprio lavoro su un compito è terminato. I docenti che valutano possono comunque riportare il compito allo stato di bozza (qualora sia richiesta, per esempio, una ulteriore elaborazione).';
$string['typeblog'] = 'Blog post';
$string['typeoffline'] = 'Compito Offline';
$string['typeonline'] = 'Compito Online';
$string['typeupload'] = 'Consegna multipla';
$string['typeuploadsingle'] = 'Consegna singola';
$string['unfinalize'] = 'Riporta a bozza';
$string['unfinalizeerror'] = 'Si è verificato un errore e la consegna non può essere riportata a bozza';
$string['unfinalize_help'] = 'Riportando la consegna a bozza, lo studente potrà aggiornare nuovamente il proprio compito.';
$string['unsupportedsubplugin'] = 'Il tipo di compito  \'{$a}\' non è al momento supportato. E\' possibile attendere che il tipo di compito venga reso disponibile oppure eliminare il compito.';
$string['upgradenotification'] = 'Questa attività si basa su un modulo compito obsoleto.';
$string['uploadafile'] = 'Carica un file';
$string['uploadbadname'] = 'Questo file contiene caratteri non conformi e non può essere caricato';
$string['uploadedfiles'] = 'file caricati';
$string['uploaderror'] = 'Si è verificato un errore durante il salvataggio del file sul server';
$string['uploadfailnoupdate'] = 'Il file è stato trasferito con successo ma non è stato possibile aggiornare la tua consegna!';
$string['uploadfiles'] = 'Carica file';
$string['uploadfiletoobig'] = 'Attenzione, il file è troppo grande (il limite è {$a} byte)';
$string['uploadnofilefound'] = 'Non è stato trovato nessun file - sei sicuro di averne selezionato uno da caricare?';
$string['uploadnotregistered'] = '\'{$a}\' è stato caricato ma la registrazione della consegna non è avvenuta!';
$string['uploadsuccess'] = 'Il caricamento di \'{$a}\' è avvenuto correttamente';
$string['usermisconf'] = 'L\'utente è mal configurato';
$string['usernosubmit'] = 'Spiacente, non sei autorizzato a consegnare compiti.';
$string['viewassignmentupgradetool'] = 'Visualizza l\'assistente per l\'aggiornamento dei compiti';
$string['viewfeedback'] = 'Valutazioni e commento';
$string['viewmysubmission'] = 'Visualizza le mie consegne';
$string['viewsubmissions'] = 'Consegne: {$a}';
$string['yoursubmission'] = 'La tua consegna';
