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
 * Strings for component 'assign', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Ci sono compiti che richiedono la tua attenzione';
$string['addsubmission'] = 'Aggiungi consegna';
$string['allowsubmissions'] = 'Consenti all\'utente di continuare a consegnare il compito';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'I dettagli del compito ed il form di consegna saranno disponibili a partire dal <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Inizio consegne';
$string['allowsubmissionsfromdate_help'] = 'Impedisce agli studenti di consegnare il compito prima della data di inizio consegne';
$string['allowsubmissionsfromdatesummary'] = 'Questo compito accetta consegne a partire dal <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Consenti di modificare le consegne';
$string['alwaysshowdescription'] = 'Visualizza la descrizione';
$string['alwaysshowdescription_help'] = 'Scegliendo \'No\' la descrizione del compito sarà visibile solo dopo la data di inizio delle consegne.';
$string['applytoteam'] = 'Usa lo stesso feedback e la stessa valutazione per tutto il gruppo';
$string['assign:addinstance'] = 'Aggiungere compiti';
$string['assign:exportownsubmission'] = 'Esportare la propria consegna';
$string['assignfeedback'] = 'Plugin commento';
$string['assignfeedbackpluginname'] = 'Plugin commento';
$string['assign:grade'] = 'Valutare compito';
$string['assign:grantextension'] = 'Concedere proroghe';
$string['assignmentisdue'] = 'Consegna compito';
$string['assignmentmail'] = '{$a->grader} ha inserito un commento sulla tua consegna del compito \'{$a->assignment}\' .

Puoi visualizzare il commento di seguito alla tua consegna:

{$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} ha inserito un commento sulla tua consegna del compito  \'<i>{$a->assignment}</i>\'<br /><br />
Puoi visualizzare il commento di seguito alla tua consegna:

<a href="{$a->url}">assignment submission</a>.';
$string['assignmentmailsmall'] = '{$a->grader} ha inserito un commento sulla tua consegna del compito \'{$a->assignment}\' . Puoi visualizzare il commento di seguito alla tua consegna.';
$string['assignmentname'] = 'Titolo del compito';
$string['assignmentplugins'] = 'Plugin compito';
$string['assignmentsperpage'] = 'Compiti per pagina';
$string['assign:revealidentities'] = 'Rivelare l\'identità degli studenti';
$string['assignsubmission'] = 'Plugin consegna';
$string['assignsubmissionpluginname'] = 'Plugin consegna';
$string['assign:submit'] = 'Consegnare compito';
$string['assign:view'] = 'Visualizzare compito';
$string['availability'] = 'Disponibilità';
$string['backtoassignment'] = 'Torna al compito';
$string['batchoperationconfirmgrantextension'] = 'Vuoi concedere la proroga a tutte le consegne selezionate ?';
$string['batchoperationconfirmlock'] = 'Vuoi bloccare tutte le consegne selezionate?';
$string['batchoperationconfirmreverttodraft'] = 'Vuoi riportare le consegne selezionate a bozza?';
$string['batchoperationconfirmunlock'] = 'Vuoi sbloccare tutte le consegne selezionate ?';
$string['batchoperationlock'] = 'blocca consegne';
$string['batchoperationreverttodraft'] = 'riporta consegne a bozza';
$string['batchoperationsdescription'] = 'Per gli utenti selezionati...';
$string['batchoperationunlock'] = 'sblocca consegne';
$string['blindmarking'] = 'Valutazione cieca';
$string['blindmarking_help'] = 'La valutazione cieca nasconde l\'identità degli studenti ai valutatori. L\'impostazione Valutazione cieca sarà bloccata non appena sarà presente una consegna o una valutazione del  compito';
$string['changegradewarning'] = 'In questo compito ci sono consegne che sono già state valutate, la modifica della valutazione del compito non ricalcolerà le valutazioni date. Se vuoi modificare la valutazione del compito, dovrai anche rivalutare tutte le consegne già valutate.';
$string['choosegradingaction'] = 'Azioni per la valutazione';
$string['chooseoperation'] = 'Scegli operazione';
$string['comment'] = 'Commento';
$string['completionsubmit'] = 'Lo studente deve consegnare per completare l\'attività';
$string['configshowrecentsubmissions'] = 'Consente a tutti di visualizzare la notifica delle consegne nei report dell\'attività recente.';
$string['confirmbatchgradingoperation'] = 'Sei sicuro di eseguire {$a->operation} per {$a->count} studenti?';
$string['confirmsubmission'] = 'Sei sicuro di voler consegnare il tuo lavoro per farlo valutare? La consegna non potrà più essere modificata.';
$string['conversionexception'] = 'Non è stato possibile convertire il compito. Eccezione verificatasi:{$a}.';
$string['couldnotconvertgrade'] = 'Non è stato possibile convertire la valutazione del compito per l\'utente {$a}.';
$string['couldnotconvertsubmission'] = 'Non è stato possibile convertire la consegna del compito per l\'utente {$a}.';
$string['couldnotcreatecoursemodule'] = 'Non è stato possibile creare il modulo del corso';
$string['couldnotcreatenewassignmentinstance'] = 'Non è stato possibile creare una nuova istanza di compito';
$string['couldnotfindassignmenttoupgrade'] = 'Non è stato possibile trovare precedenti istanze di compito da aggiornare';
$string['currentgrade'] = 'Voto nel Registro delle valutazioni';
$string['cutoffdate'] = 'Data limite';
$string['cutoffdatefromdatevalidation'] = 'La data limite deve essere successiva alla data di inizio consegne';
$string['cutoffdate_help'] = 'Le consegne oltre la data limite saranno impedite, a meno che non si conceda una proroga.';
$string['cutoffdatevalidation'] = 'La data limite non può essere antecedente alla data di fine consegne.';
$string['defaultplugins'] = 'Impostazioni compito di default';
$string['defaultplugins_help'] = 'Queste impostazioni definiscono i default per tutte le nuove istanze di compito';
$string['defaultteam'] = 'Gruppo di default';
$string['deleteallsubmissions'] = 'Elimina tutte le consegne';
$string['deletepluginareyousure'] = 'Eliminazione plugin compito {$a}: sei sicuro ?';
$string['deletepluginareyousuremessage'] = 'Stai per rimuovere il plugin compito {$a}. Saranno anche eliminati tutti i dati presenti nel database relativi a questo plugin compito. Sei sicuro?';
$string['deletingplugin'] = 'Eliminazione plugin {$a}.';
$string['description'] = 'Descrizione';
$string['downloadall'] = 'Scarica tutte le consegne';
$string['duedate'] = 'Termine consegne';
$string['duedate_help'] = 'La data di consegna del compito. Eventuali consegne successive alla data di fine consegne saranno considerate in in ritardo. Per impedire consegne in ritardo devi impostare la data limite';
$string['duedateno'] = 'Senza termine consegne';
$string['duedatereached'] = 'La data di scadenza del compito è già trascorsa';
$string['duedatevalidation'] = 'La data di scadenza deve essere successiva alla data di inizio consegne';
$string['editaction'] = 'Azioni...';
$string['editingstatus'] = 'Possibilità di modifica';
$string['editsubmission'] = 'Modifica il mio compito';
$string['enabled'] = 'Abilitato';
$string['errornosubmissions'] = 'Non ci sono consegne da scaricare';
$string['errorquickgradingvsadvancedgrading'] = 'La valutazione non è stata salvata poiché il compito sta usando la valutazione avanzata.';
$string['errorrecordmodified'] = 'La valutazione non è stata salvata poiché uno o più record sono stati modificati da qualcuno più recentemente del tuo caricamento della pagina.';
$string['extensionduedate'] = 'Data scadenza proroga';
$string['extensionnotafterduedate'] = 'La data di fine proroga deve essere successiva alla data di fine consegne';
$string['extensionnotafterfromdate'] = 'La data di fine proroga deve essere successiva alla data di inizio consegne';
$string['feedback'] = 'Commento';
$string['feedbackavailablehtml'] = '{$a->username} ha inserito un commento sulla tua consegna del compito  \'<i>{$a->assignment}</i>\'<br /><br />
Puoi visualizzare il commento di seguito alla tua consegna:
<a href="{$a->url}">assignment submission</a>.';
$string['feedbackavailablesmall'] = '{$a->username} ha inserito un commento sul compito {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} ha inserito un commento sulla tua consegna del compito \'{$a->assignment}\' .

Puoi visualizzare il commento di seguito alla tua consegna:

{$a->url}';
$string['feedbackplugin'] = 'Plugin commento';
$string['feedbackpluginforgradebook'] = 'Il plugin commento che invierà i commenti al registro del valutatore';
$string['feedbackpluginforgradebook_help'] = 'Solo un plugin commento può inserire commenti nel registro valutatore';
$string['feedbackplugins'] = 'Plugin commento';
$string['feedbacksettings'] = 'Impostazioni commento';
$string['filesubmissions'] = 'File consegnati';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Senza filtro';
$string['filterrequiregrading'] = 'In attesa di valutazione';
$string['filtersubmitted'] = 'Consegnato';
$string['gradeabovemaximum'] = 'La valutazione deve essere minore o uguale a {$a}.';
$string['gradebelowzero'] = 'La valutazione deve essere maggiore o uguale a zero';
$string['graded'] = 'Valutata';
$string['gradedby'] = 'Valutatore';
$string['gradedon'] = 'Data di valutazione';
$string['gradeoutof'] = 'Punteggio (su {$a})';
$string['gradeoutofhelp'] = 'Valutazione';
$string['gradeoutofhelp_help'] = 'Inserisci la valutazione da assegnare al compito dello studente. Puoi anche usare cifre decimali.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} ha modificato la propria consegna di <i>\'{$a->assignment} il {$a->timeupdated}</i>\'<br />
<br />Il compito è disponibile a <a href="{$a->url}">questo link</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} ha aggiornato la propria consegna del compito {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} ha modificato la propria consegna di \'{$a->assignment}\' il {$a->timeupdated}

Il compito è disponibile al link:

{$a->url}';
$string['gradestudent'] = 'Valutazione studente: (id={$a->id}, Nome={$a->fullname}).';
$string['gradeuser'] = 'Valutazione {$a}';
$string['grading'] = 'Valutazione';
$string['gradingmethodpreview'] = 'Criterio di valutazione';
$string['gradingoptions'] = 'Opzioni';
$string['gradingstatus'] = 'Stato valutazione';
$string['gradingstudentprogress'] = 'Valutazione studente {$a->index} di {$a->count}';
$string['gradingsummary'] = 'Riepilogo delle valutazioni';
$string['grantextension'] = 'Concedi proroga';
$string['grantextensionforusers'] = 'Concedi proroga a {$a} studenti';
$string['hiddenuser'] = 'Partecipante';
$string['hideshow'] = 'Nascondi/Visualizza';
$string['instructionfiles'] = 'File delle istruzioni';
$string['invalidfloatforgrade'] = 'Non è stato possibile capire la valutazione data: {$a}';
$string['invalidgradeforscale'] = 'La valutazione data non coincide con nessuno dei valori presenti nella scala di valutazione utilizzata.';
$string['lastmodifiedgrade'] = 'Ultima modifica (valutazione)';
$string['lastmodifiedsubmission'] = 'Ultima modifica (consegna)';
$string['latesubmissions'] = 'Consegne in ritardo';
$string['latesubmissionsaccepted'] = 'Possono consegnare solo gli studenti ai quali è stata concessa una proroga.';
$string['locksubmissionforstudent'] = 'Blocca le consegne dello studente (id={$a->id}, fullname={$a->fullname})';
$string['locksubmissions'] = 'Blocca consegne';
$string['manageassignfeedbackplugins'] = 'Gestione plugin commento compito';
$string['manageassignsubmissionplugins'] = 'Gestione plugin consegna compito';
$string['maxgrade'] = 'Valutazione massima';
$string['messageprovider:assign_notification'] = 'Notifiche compito';
$string['modulename'] = 'Compito';
$string['modulename_help'] = 'Il modulo di attività compito consente al docente di valutare l\'apprendimento degli studenti assegnandogli un lavoro che potrà poi valutare e commentare.

Gli studenti possono consegnare qualsiasi tipo di contenuto digitale, come ad esempio documenti di testo, immagini, clip audio e clip video. Il compito può anche prevedere la compilazione online di un testo sia in alternativa sia in aggiunta al caricamento di file. E\' altresì possibile usare il compito per attività da svolgere al di fuori di Moodle, dove non sono richiesti contenuti digitali. Gli studenti possono consegnare i lavori individualmente oppure come membri di un gruppo

I docenti possono commentare le consegne degli studenti e caricare file a loro volta, ad esempio i compiti corretti e valutati o file audio di commento. I compiti possono essere valutati utilizzando sia voti numerici, sia metodi di valutazione avanzata tipo rubric. Le valutazioni vengono memorizzate nel registro del valutatore';
$string['modulenameplural'] = 'Compiti';
$string['mysubmission'] = 'le mie consegne:';
$string['newsubmissions'] = 'Compiti consegnati';
$string['nofiles'] = 'Nessun file.';
$string['nograde'] = 'Nessuna valutazione.';
$string['nolatesubmissions'] = 'Non sono consentite consegne in ritardo';
$string['nomoresubmissionsaccepted'] = 'Non sono consentite ulteriori consegne';
$string['noonlinesubmissions'] = 'Questo compito non richiede consegne online';
$string['nosavebutnext'] = 'Successivo';
$string['nosubmission'] = 'Non sono presenti consegne da valutare';
$string['nosubmissionsacceptedafter'] = 'Non sono consentite consegne successive a';
$string['notgraded'] = 'Non valutata';
$string['notgradedyet'] = 'Non ancora valutata';
$string['notifications'] = 'Notifiche';
$string['notsubmittedyet'] = 'Non ancora consegnato';
$string['nousersselected'] = 'Non sono stati selezionati utenti';
$string['numberofdraftsubmissions'] = 'Bozze';
$string['numberofparticipants'] = 'Partecipanti';
$string['numberofsubmissionsneedgrading'] = 'In attesa di valutazione';
$string['numberofsubmittedassignments'] = 'Consegne';
$string['numberofteams'] = 'Gruppi';
$string['offline'] = 'Questo compito non richiede consegne online';
$string['open'] = 'Aperto';
$string['outlinegrade'] = 'Valutazione: {$a}';
$string['overdue'] = '<font color="red">Consegna in ritardo da: {$a}</font>';
$string['page-mod-assign-view'] = 'Pagina principale del modulo compito';
$string['page-mod-assign-x'] = 'Qualsiasi pagina principale del modulo compito';
$string['participant'] = 'Partecipante';
$string['pluginadministration'] = 'Gestione compito';
$string['pluginname'] = 'Compito';
$string['preventsubmissions'] = 'Impedisce qualsiasi ulteriore modifica da parte dell\'utente della consegna effettuata';
$string['preventsubmissionsshort'] = 'Blocca modifiche della consegna';
$string['previous'] = 'Precedente';
$string['quickgrading'] = 'Valutazione rapida';
$string['quickgradingchangessaved'] = 'Le modiche alle valutazioni sono state salvate';
$string['quickgrading_help'] = 'La valutazione rapida consente di valutare i compiti direttamente nella tabella delle consegne. La valutazione rapida non è compatibile con la valutazione avanzata ed è sconsigliata in presenza di più valutatori.';
$string['quickgradingresult'] = 'Valutazione rapida';
$string['recordid'] = 'Identificativo';
$string['requireallteammemberssubmit'] = 'Tutti i gli appartenenti al gruppo devono premere il pulsante consegna';
$string['requireallteammemberssubmit_help'] = 'Tutti gli studenti appartenenti al gruppo dovranno premere il pulsante consegna affinché la consegna venga presa in considerazione. Se l\'impostazione è disabilitata. sarà considerata la consegna di qualsiasi membro del gruppo.';
$string['requiresubmissionstatement'] = 'Obbliga gli studenti ad accettare la dichiarazione sulla consegna';
$string['requiresubmissionstatementassignment'] = 'Obbliga gli studenti ad accettare la dichiarazione sulla consegna';
$string['requiresubmissionstatementassignment_help'] = 'Obbliga gli studenti ad accettare la dichiarazione sulla consegna per tutte le consegne previste in questo compito';
$string['requiresubmissionstatement_help'] = 'Gli studenti saranno obbligati ad accettare la dichiarazione sulla consegna in tutti i compiti del sito. Se l\'impostazione è disabilitata, la dichiarazione sulla consegna potrà essere abilitata secondo necessità nelle impostazioni di ciascun compito.';
$string['revealidentities'] = 'Rivela l\'identità degli studenti';
$string['revealidentitiesconfirm'] = 'Sei sicuro di rivelare l\'identità degli studenti? L\'operazione non può essere annullata. Dopo aver rivelato l\'identità degli studenti, le valutazioni saranno trasferiti nel registro del valutatore.';
$string['reverttodraft'] = 'Riporta le consegne allo stato di bozza.';
$string['reverttodraftforstudent'] = 'Riporta le consegne allo stato di bozza per lo studente: (id={$a->id}, fullname={$a->fullname}).';
$string['reverttodraftshort'] = 'Riporta a bozze le consegne';
$string['reviewed'] = 'Rivisto';
$string['saveallquickgradingchanges'] = 'Salva tutte le valutazioni rapide effettuate';
$string['savechanges'] = 'Salva modifiche';
$string['savenext'] = 'Salva e visualizza il successivo';
$string['scale'] = 'Scala';
$string['selectlink'] = 'Seleziona...';
$string['selectuser'] = 'Seleziona {$a}';
$string['sendlatenotifications'] = 'Notifica le consegne in ritardo ai valutatori';
$string['sendlatenotifications_help'] = 'I valutatori (di norma i docenti) riceveranno una notifica tutte le volte che uno studente avrà consegnato un compito in ritardo. I metodi di notifica sono configurabili.';
$string['sendnotifications'] = 'Notifica le consegne ai valutatori';
$string['sendnotifications_help'] = 'I valutatori (di solito i docenti) riceveranno una notifica tutte le volte che uno studente avrà consegnato un compito, sia che la consegna avvenga in anticipo, sia nelle date previste, sia  in ritardo. I metodi di notifica sono configurabili.';
$string['sendsubmissionreceipts'] = 'Invia ricevuta di consegna agli studenti';
$string['sendsubmissionreceipts_help'] = 'Consente di inviare agli studenti una ricevuta di consegna. La ricevuta sarà invita ad ogni consegna avvenuta correttamente.';
$string['settings'] = 'Impostazioni compito';
$string['showrecentsubmissions'] = 'Visualizza consegne recenti';
$string['submission'] = 'Consegna';
$string['submissiondrafts'] = 'Gli studenti devono premere il pulsante consegna';
$string['submissiondrafts_help'] = 'L\'impostazione obbliga gli studenti a premere il pulsante consegna per confermare che la consegna del  proprio compito è definitiva. In questo modo gli studenti possono mantenere il compito in bozza prima di consegnarlo definitivamente. Cambiando l\'impostazione da "No" a "Si" dopo la consegna degli studenti, tali consegne saranno considerate definitive.';
$string['submissioneditable'] = 'Lo studente può modificare la consegna';
$string['submissionempty'] = 'Non sono presenti consegne';
$string['submissionnoteditable'] = 'Gli studenti non possono modificare questa consegna';
$string['submissionnotready'] = 'Questo compito non è pronto per la consegna:';
$string['submissionplugins'] = 'Plugin consegna';
$string['submissionreceipthtml'] = 'Hai effettuato una consegna per il compito \'<i>{$a->assignment}</i>\'<br /><br />
Per vedere lo stato della consegna:
<a>{$a->url}</a>';
$string['submissionreceipts'] = 'Invia ricevuta di consegna';
$string['submissionreceiptsmall'] = 'Hai consegnato il compito  {$a->assignment}';
$string['submissionreceipttext'] = 'Hai consegnato il compito \' {$a->assignment}\'

Per vedere lo stato della tua consegna:

{$a->url}';
$string['submissions'] = 'Consegne';
$string['submissionsclosed'] = 'Consegne chiuse';
$string['submissionsettings'] = 'Impostazioni consegna';
$string['submissionslocked'] = 'Il compito non accetta consegne';
$string['submissionslockedshort'] = 'Non sono consentite modifiche della consegna';
$string['submissionsnotgraded'] = 'Consegne non valutate: {$a}';
$string['submissionstatement'] = 'Dichiarazione sulla consegna';
$string['submissionstatementacceptedlog'] = 'Dichiarazione sulla consegna accettata dall\'utente {$a}';
$string['submissionstatementdefault'] = 'Il compito è stato realizzato da me, ad eccezione delle parti dove ho riconosciuto l\'utilizzo di lavori altrui';
$string['submissionstatement_help'] = 'Il testo della dichiarazione sulla consegna';
$string['submissionstatus'] = 'Stato consegna';
$string['submissionstatus_'] = 'Consegna mancante';
$string['submissionstatus_draft'] = 'Bozza (non consegnato)';
$string['submissionstatusheading'] = 'Stato consegna';
$string['submissionstatus_marked'] = 'Valutato';
$string['submissionstatus_new'] = 'Nuova consegna';
$string['submissionstatus_submitted'] = 'Consegnato per la valutazione';
$string['submissionteam'] = 'Gruppo';
$string['submitaction'] = 'Consegna';
$string['submitassignment'] = 'Consegna compito';
$string['submitassignment_help'] = 'Una volta consegnato il compito non potrai più modificarlo';
$string['submitted'] = 'Consegnato';
$string['submittedearly'] = 'Il compito è stato consegnato {$a} in anticipo';
$string['submittedlate'] = 'Il compito è stato consegnato {$a} in ritardo';
$string['submittedlateshort'] = '{$a} in ritardo';
$string['teamsubmission'] = 'Consegna di gruppo';
$string['teamsubmissiongroupingid'] = 'Raggruppamento';
$string['teamsubmissiongroupingid_help'] = 'Il raggruppamento da utilizzare per circoscrivere i gruppi di studenti. Se non impostato, verranno utilizzati i gruppi disponibili.';
$string['teamsubmission_help'] = 'Consente la suddivisone degli studenti in gruppi secondo i gruppi disponibili oppure in base ad un raggruppamento definito. Una consegna di gruppo sarà condivisa tra tutti gli appartenenti al gruppo e ciascuno membro potrà visualizzare le modifiche apportate alla consegna dagli altri membri del gruppo.';
$string['teamsubmissionstatus'] = 'Stato consegna di gruppo';
$string['textinstructions'] = 'Istruzioni del compito';
$string['timemodified'] = 'Ultima modifica';
$string['timeremaining'] = 'Tempo rimasto';
$string['unlocksubmissionforstudent'] = 'Sblocca consegna per lo studente (id={$a->id}, fullname={$a->fullname}).';
$string['unlocksubmissions'] = 'Sblocca consegne';
$string['updategrade'] = 'Aggiorna valutazione';
$string['updatetable'] = 'Salva ed aggiorna tabella';
$string['upgradenotimplemented'] = 'L\'aggiornamento non è implementato per il plugin ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Proroga concessa fino a: {$a}';
$string['usergrade'] = 'Valutazione utente';
$string['userswhoneedtosubmit'] = 'Utenti che non hanno consegnato: {$a}';
$string['viewfeedback'] = 'Visualizza feedback';
$string['viewfeedbackforuser'] = 'Visualizza feedback per l\'utente: {$a}';
$string['viewfull'] = 'Visualizza tutto';
$string['viewfullgradingpage'] = 'Apri la pagina della valutazione per rilasciare commenti';
$string['viewgradebook'] = 'Visualizza registro del valutatore';
$string['viewgrading'] = 'Visualizza/valuta tutte le consegne';
$string['viewgradingformforstudent'] = 'Visualizza pagina di valutazione per lo studente (id={$a->id}, fullname={$a->fullname}).';
$string['viewownsubmissionform'] = 'Visualizza la propria pagina di consegna';
$string['viewownsubmissionstatus'] = 'Visualizza la propria pagina di stato della consegna';
$string['viewrevealidentitiesconfirm'] = 'Visualizza pagina di conferma per rivelare l\'identità degli studenti';
$string['viewsubmission'] = 'Visualizza consegne';
$string['viewsubmissionforuser'] = 'Visualizza consegne dell\'utente {$a}';
$string['viewsubmissiongradingtable'] = 'Visualizza la tabella delle valutazioni delle consegne';
$string['viewsummary'] = 'Visualizza riepilogo';
