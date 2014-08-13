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
 * Strings for component 'question', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Azione';
$string['addanotherhint'] = 'Aggiungi un altro suggerimento';
$string['addcategory'] = 'Aggiungi categoria';
$string['addmorechoiceblanks'] = 'Spazi per altre {no} alternative';
$string['adminreport'] = 'Report su possibili problemi nel tuo database di domande.';
$string['answer'] = 'Risposta';
$string['answers'] = 'Risposte';
$string['answersaved'] = 'Risposta salvata';
$string['attemptfinished'] = 'Tentativo terminato';
$string['attemptfinishedsubmitting'] = 'Tentativo terminato inviando:';
$string['attemptoptions'] = 'Opzioni per il tentativo';
$string['availableq'] = 'Disponibile?';
$string['badbase'] = 'Base errata prima di **: {$a}**';
$string['behaviour'] = 'Comportamento';
$string['behaviourbeingused'] = 'Comportamento in uso: {$a}';
$string['broken'] = 'Questo è un "link interrotto", punta a un file inesistente.';
$string['byandon'] = 'di <em>{$a->user}</em> di <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Impossibile copiare il file di backup';
$string['cannotcreate'] = 'Impossibile creare un nuovo elemento nella tabella dei tentativi del quiz';
$string['cannotcreatepath'] = 'Impossibile creare il path: {$a}';
$string['cannotdeletebehaviourinuse'] = 'Non è possibile eliminare il comportamento \'{$a}\' poiché è utilizzato da un tentativo.';
$string['cannotdeletecate'] = 'Impossibile elimiare la categoria in quanto è quella default per questo contesto.';
$string['cannotdeleteneededbehaviour'] = 'Non è possibile eliminare il comportamento \'{$a}\' poiché esistono altri comportamenti che lo utilizzano.';
$string['cannotdeleteqtypeinuse'] = 'Il tipo di domanda \'{$a}\' non può essere eliminato poiché nel deposito delle domande sono presenti domande di questo tipo.';
$string['cannotdeleteqtypeneeded'] = 'Il tipo di domanda \'{$a}\' non può essere eliminato poiché sono presenti domande che dipendono da questo tipo.';
$string['cannotenable'] = 'Il tipo di domanda {$a} non può essere creato diretamente.';
$string['cannotenablebehaviour'] = 'Non è possibile utilizzare direttamente il comportamento \'{$a}\' poiché è solo per uso interno.';
$string['cannotfindcate'] = 'Non è stato possibile trovare nessun record di categoria';
$string['cannotfindquestionfile'] = 'Non è stato possibile trovare nessuna domanda nel file zip';
$string['cannotgetdsfordependent'] = 'Non è stato possibile ottenere il dataset specificato per una domanda che dipende dal dal dataset!  (domanda: {$a->id}, , datasetitem: {$a->item})';
$string['cannotgetdsforquestion'] = 'Non è stato possibile ottenere il dataset specificato per una domanda Calcolata!  (domanda: {$a})';
$string['cannothidequestion'] = 'Impossibile nascondere la domanda';
$string['cannotimportformat'] = 'Il software per l\'importazione di questo formato non è ancora stato realizzato!';
$string['cannotinsertquestion'] = 'Impossibile inserire una nuova domanda!';
$string['cannotinsertquestioncatecontext'] = 'Impossibile inserire la nuova categoria di domande {$a->cat}, contesto illegale {$a->ctx}';
$string['cannotloadquestion'] = 'Impossibile caricare la domanda';
$string['cannotmovequestion'] = 'Impossibile usare questo script per spostare domande che hanno file associati da aree differenti.';
$string['cannotopenforwriting'] = 'Impossibile aprire per scrittura: {$a}';
$string['cannotpreview'] = 'Impossibile vedere l\'anteprima di queste domande!';
$string['cannotread'] = 'Non è possibile leggere il file da importare (o il file è vuoto)';
$string['cannotretrieveqcat'] = 'Non è stato possibile ottenere la categoria di domande';
$string['cannotunhidequestion'] = 'Non è stato possibile rendere visibile la domanda';
$string['cannotunzip'] = 'Impossibile unzippare il file.';
$string['cannotwriteto'] = 'Impossibile scrivere le domande esportate su {$a}';
$string['category'] = 'Categoria';
$string['categorycurrent'] = 'Categoria in uso';
$string['categorycurrentuse'] = 'Usa questa categoria';
$string['categorydoesnotexist'] = 'Questa categoria non esiste';
$string['categoryinfo'] = 'Informazioni categoria';
$string['categorymove'] = 'La categoria \'{$a->name}\' contiene {$a->count} domande (alcune possono essere domande vecchie, nascoste, ancora in uso in qualche quiz esistente).<br/>Scegli un\'altra categoria per trasferirle in essa.';
$string['categorymoveto'] = 'Salva nella categoria';
$string['categorynamecantbeblank'] = 'Il nome della categoria deve essere compilato';
$string['changeoptions'] = 'Cambia opzioni';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">La categoria "{$a->name}"</a> nel corso "{$a->coursename}" avrà il suo stato di condivisione cambiato da <strong>{$a->changefrom} a {$a->changeto}</strong>.';
$string['check'] = 'Verifica risposta';
$string['chooseqtypetoadd'] = 'Scegli un tipo di domanda da aggiungere';
$string['clearwrongparts'] = 'Pulisci le risposte errate';
$string['clickflag'] = 'Contrassegna domanda';
$string['clicktoflag'] = 'Contrassegnare questa domanda per riferimento futuro';
$string['clicktounflag'] = 'Rimuovi il contrassegno';
$string['clickunflag'] = 'Rimuovi contrassegno';
$string['closepreview'] = 'Chiudi anteprima';
$string['combinedfeedback'] = 'Feedback combinato';
$string['comment'] = 'Commento';
$string['commented'] = 'Commentato: {$a}';
$string['commentormark'] = 'Commenta o inserisci punteggio a mano';
$string['comments'] = 'Commenti';
$string['commentx'] = 'Commento: {$a}';
$string['complete'] = 'Completo';
$string['contexterror'] = 'Non dovresti essere qui se non stai spostando una categoria in un altro contesto.';
$string['copy'] = 'Copia da {$a} e cambia i link.';
$string['correct'] = 'Risposta corretta';
$string['correctfeedback'] = 'per ogni risposta corretta';
$string['correctfeedbackdefault'] = 'Risposta corretta.';
$string['created'] = 'Creazione';
$string['createdby'] = 'Creata da';
$string['createdmodifiedheader'] = 'Creazione/salvataggio più recente';
$string['createnewquestion'] = 'Crea una nuova domanda...';
$string['cwrqpfs'] = 'Domande prese \'a caso\' da domande delle sotto-categorie.';
$string['cwrqpfsinfo'] = '<p>Durante l\'aggiornamento a Moodle 1.9 le categorie di domande saranno suddivise in  contesti differenti. Per alcune domande e categorie di domande e domande sarà modificato il modo con cui sono condivise. La modifica si rende necessaria nel  nel raro caso in cui in un quiz una o più domande \'random\' vengono prese da diverse categorie sia condivise che no, come avviene in questo sito. Le domande \'random\' vengono prese da sotto categorie di domande e le sotto categorie sono condivise in modi diversi rispetto alla categorie genitore da dove viene creata la domanda random.</p>
<p>La condivisione sarà cambiata per le seguenti categorie di domande. Le domande interessate dal cambiamento continueranno a funzionare come prima fino a quando non verranno rimosse dai quiz nei quali appaiono.</p>';
$string['cwrqpfsnoprob'] = 'Nessuna categoria del tuo sito è affetta dal problema \'Domande a caso che pescano domande da sotto-categorie\'.';
$string['decimalplacesingrades'] = 'Cifre decimali nelle valuatzioni';
$string['defaultfor'] = 'Default per {$a}';
$string['defaultinfofor'] = 'La categoria default per le domande condivise nel contesto \'{$a}\'.';
$string['defaultmark'] = 'Punteggio di default';
$string['defaultmarkmustbepositive'] = 'Il punteggi odi default deve essere positivo.';
$string['deletecoursecategorywithquestions'] = 'Ci sono domande nel deposito delle domande associate con questa categoria di corso. Se procedi, queste saranno eliminate. Puoi comunque spostarle prima, usando l\'interfaccia del deposito delle domande.';
$string['deletequestioncheck'] = 'Sei proprio sicuro di voler eliminare \'{$a}\'?';
$string['deletequestionscheck'] = '<p>Sei sicuro di eliminare le seguenti domande ?</p>
<p>{$a}</p>';
$string['deletingbehaviour'] = 'Eliminazione comportamento domanda \'{$a}\'';
$string['deletingqtype'] = 'Eliminazione del tipo di domanda \'{$a}\'';
$string['didnotmatchanyanswer'] = '[Non ha associato nessuna risposta]';
$string['disabled'] = 'Disabilitato';
$string['displayoptions'] = 'Opzioni di visualizzazione';
$string['disterror'] = 'La distribuzione {$a} ha causato problemi';
$string['donothing'] = 'Non copiare o spostare files o cambiare links.';
$string['editcategories'] = 'Modifica categorie';
$string['editcategories_help'] = 'Le domande possono essere utilmente raccolte in categorie.

Ciascuna categoria appartiene ad un contesto che determina dove le relative domande possono essere utilizzate:

* Contesto dell\'attività . Le domande sono utilizzabili solo all\'interno del modulo di attività
* Contesto del corso - le domande possono essere utilizzate nelle attività del corso
- Contesto della categoria di corso - le domande possono essere utilizzate nelle attività dei corsi che appartengono alla categoria
- Contesto di sistema - le domande possono essere utilizzate nelle attività dei corsi di tutto il sito

le categorie sono utili anche per le domande casuali che possono essere selezionate da specifiche categorie.';
$string['editcategory'] = 'Modifica categoria';
$string['editingcategory'] = 'Modifica una categoria';
$string['editingquestion'] = 'Modifica una domanda';
$string['editquestion'] = 'Modifica domanda';
$string['editquestions'] = 'Modifica domande';
$string['editthiscategory'] = 'Modifica questa categoria';
$string['emptyxml'] = 'Errore sconosciuto - file imsmanifest.xml vuoto';
$string['enabled'] = 'Abilitato';
$string['erroraccessingcontext'] = 'Il contesto non può essere acceduto';
$string['errordeletingquestionsfromcategory'] = 'Errore durante l\'eliminazione di domande dalla categoria {$a}.';
$string['errorduringpost'] = 'Si è verificato un errore durante la post-elaborazione!';
$string['errorduringpre'] = 'Si è verificato un errore durante la pre-elaborazione!';
$string['errorduringproc'] = 'Si è verificato un errore durante l\'elaborazione!';
$string['errorduringregrade'] = 'Impossibile rivalutare la domanda {$a->qid}, spostamento nello stato {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Errore: non è possibile copiare il file {$a}.';
$string['errorfilecannotbemoved'] = 'Errore: non è possibile spostare il file {$a}.';
$string['errorfileschanged'] = 'Errore: i file linkati dalle domande sono cambiati da quando è iniziata la visualizzazione del form.';
$string['errormanualgradeoutofrange'] = 'La valutazione {$a->grade} non è compresa tra 0 e {$a->maxgrade} per la domanda {$a->name}. Punteggio e commento non sono stati salvati.';
$string['errormovingquestions'] = 'Errore nello spostamento di domande con ids {$a}.';
$string['errorpostprocess'] = 'Si è verificato un errore durante la post-elaborazione!';
$string['errorpreprocess'] = 'Si è verificato un errore durante la pre-elaborazione!';
$string['errorprocess'] = 'Si è verificato un errore durante l\'elaborazione!';
$string['errorprocessingresponses'] = 'Si è verificato un errore durante l\'elaborazione delle tue risposte ({$a}). Per riprovare, fai click sul pulsante continua per tornare alla pagina predente.';
$string['errorsavingcomment'] = 'Errore durante il salvataggio nel database del commento per la domanda {$a->name}.';
$string['errorsavingflags'] = 'Si è verificato un errore durante il salvataggio del flag di stato';
$string['errorupdatingattempt'] = 'Errore durante l\'aggiornamento del tentativo {$a->id} nel database.';
$string['exportcategory'] = 'Esporta categoria';
$string['exportcategory_help'] = 'L\'impostazione determina la categoria dalla quale esportare le domande.

Alcuni formati di importazione come GIFT e Moodle XML permettono che la categoria e i dati di contesto siano specificati all\'interno del file, in modo da poter scegliere se ricrearli o meno durante l\'importazione. Nel caso, spuntare le caselle opportune.';
$string['exporterror'] = 'Si è verificato un errore durante l\'esportazione!';
$string['exportfilename'] = 'domande';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Esporta le domande in un file';
$string['exportquestions_help'] = 'Abilita l\'esportazione di una intera categoria di domande (e tutte le sue sotto-categorie) in un file di testo.
Da notare in base al formato prescelto non sarà possibile esportare alcuni alcuni tipi di domande e alcune informazioni.';
$string['feedback'] = 'Feedback';
$string['filecantmovefrom'] = 'I file delle domande non possono essere spostati poiché noi hai il privilegio di rimuovere file di domande dal loro posto.';
$string['filecantmoveto'] = 'Il file di domande non può essere copiato né spostato poiché non hai il privilegio di aggiungere file nell\'area dove stai cercando di metterlo.';
$string['fileformat'] = 'Formato file';
$string['filesareacourse'] = 'area file del corso';
$string['filesareasite'] = 'area file del sito';
$string['filestomove'] = 'Sposta / copia i file a {$a}?';
$string['fillincorrect'] = 'Inserisci le risposte corrette';
$string['flagged'] = 'Contrassegnata';
$string['flagthisquestion'] = 'Contrassegna questa domanda';
$string['formquestionnotinids'] = 'Il form contiene una domanda non presente tra le id delle domande.';
$string['fractionsnomax'] = 'Una delle risposte dovrebbe avere un punteggio del 100% affinché sia possibile ottenere un voto pieno per questa domanda.';
$string['generalfeedback'] = 'Feedback generale';
$string['generalfeedback_help'] = 'Il feedback generale viene visualizzato allo studente dopo aver risposto alla domanda. A differenza del feedback specifico, che dipende dal tipo di domanda e dalla riposta data dallo studente, il feedback generale è identico per tutti gli studenti.

Puoi utilizzare il feedback generale per dare agli studenti alcune informazioni relative alle conoscenze necessarie per rispondere alla domanda, oppure per fornire link utili per capire meglio la domanda.';
$string['getcategoryfromfile'] = 'Categoria da file';
$string['getcontextfromfile'] = 'Contesto da file';
$string['hidden'] = 'Nascosto';
$string['hintn'] = 'Suggerimento {no}';
$string['hintnoptions'] = 'Opzioni suggerimento {no}';
$string['hinttext'] = 'Testo del suggerimento';
$string['howquestionsbehave'] = 'Comportamento della domanda';
$string['howquestionsbehave_help'] = 'Gli studenti possono interagire con le domande del quiz in vari modi. Ad esempio, puoi consentire agli studenti di dare una risposta ad ogni domanda e poi terminare il quiz prima di ricevere valutazioni o feedback: questo è la modalità "feedback differito".

In alternativa puoi consentire agli studenti di dare una risposta a ciascuna domanda e ricevere un feedback immediato: se la risposta non è giusta possono provare ancora. Questa è la modalità \'Interattiva con tentativi multipli\'.

Le due modalità sono probabilmente quelle  più comunemente utilizzate.';
$string['ignorebroken'] = 'Ignora link interrotti';
$string['importcategory'] = 'Importa categoria';
$string['importcategory_help'] = 'L\'impostazione consente la scelta della categoria dove importare le domande.

Alcuni formati di importazione come GIFT e Moodle XML permettono che la categoria e i dati di contesto siano specificati all\'interno del file. Per usare questi dati si devono selezionare le caselle di spunta opportune, senza selezionare la categoria. Qualora la categoria presente nel file non dovesse esistere, sarà creata automaticamente.';
$string['importerror'] = 'Si è verificato un errore durante il processo di importazione delle domande';
$string['importerrorquestion'] = 'Errore durante l\'importazione delle domande';
$string['importfromcoursefiles'] = '... oppure scegli un file da importare';
$string['importfromupload'] = 'Seleziona un file da caricare...';
$string['importingquestions'] = 'importazione di {$a} domande da file';
$string['importparseerror'] = 'Sono stati riscontrati errori durante la lettura del file da importare. Per importare comunque le domande senza errori prova ad impostare \'Fermati in presenza di errori\' a \'No\'';
$string['importquestions'] = 'Importa le domande da un file';
$string['importquestions_help'] = 'Consente l\'importazione delle domande usando file di testo in vari tipi di formato. I file di testo devono essere codificati UTF-8.';
$string['importwrongfiletype'] = 'Il tipo di file selezionato ({$a->actualtype}) non corrisponde al tipo di formato di importazione ({$a->expectedtype}).';
$string['impossiblechar'] = 'Carattere sconosciuto {$a} rilevato al posto della parentesi';
$string['includesubcategories'] = 'Visualizza anche le domande presenti nelle sotto categorie';
$string['incorrect'] = 'Risposta errata';
$string['incorrectfeedback'] = 'Per ciascuna risposta sbagliata';
$string['incorrectfeedbackdefault'] = 'Risposta errata.';
$string['information'] = 'Informazione';
$string['invalidanswer'] = 'Risposta incompleta';
$string['invalidarg'] = 'Argomenti non validi o configurazione server non corretta';
$string['invalidcategoryidforparent'] = 'ID non valido per categoria superiore!';
$string['invalidcategoryidtomove'] = 'ID non valido per categoria da spostare!';
$string['invalidconfirm'] = 'Stringa di conferma non corretta';
$string['invalidcontextinhasanyquestions'] = 'Contesto non valido passato a question_context_has_any_questions.';
$string['invalidgrade'] = 'Le valutazioni non corrispondono alle opzioni di valutazione - la domanda è stata saltata.';
$string['invalidpenalty'] = 'Penalità non valida';
$string['invalidwizardpage'] = 'Specificata pagina di aiuto non corretta o assente!';
$string['lastmodifiedby'] = 'Ultima modifica di';
$string['linkedfiledoesntexist'] = 'Il file linkato {$a} non esiste';
$string['makechildof'] = 'Fai figlio di \'{$a}\'';
$string['makecopy'] = 'Duplica';
$string['maketoplevelitem'] = 'Muovi al primo livello';
$string['manualgradeoutofrange'] = 'la valutazione è al di fuori dell\'intervallo.';
$string['manuallygraded'] = 'Valutato manualmente {$a->mark} con il commento: {$a->comment}';
$string['mark'] = 'Punteggio';
$string['markedoutof'] = 'Punteggio massimo';
$string['markedoutofmax'] = 'Punteggio max.: {$a}';
$string['markoutofmax'] = 'Punteggio ottenuto {$a->mark} su {$a->max}';
$string['marks'] = 'Punteggio';
$string['matchgrades'] = 'Allinea voti';
$string['matchgradeserror'] = 'Errore se la valutazione non è presente nell\'elenco';
$string['matchgrades_help'] = '<p>Le valutazioni importate <b>devono</b> corrispondere a uno dei valori della lista fissata, come segue...</p>

<ul>
  <li>100%</li>
  <li>90%</li>
  <li>80%</li>
  <li>75%</li>
  <li>70%</li>
  <li>66.666%</li>
  <li>60%</li>
  <li>50%</li>
  <li>40%</li>
  <li>33.333</li>
  <li>30%</li>
  <li>25%</li>
  <li>20%</li>
  <li>16.666%</li>
  <li>14.2857</li>
  <li>12.5%</li>
  <li>11.111%</li>
  <li>10%</li>
  <li>5%</li>
  <li>0%</li>
</ul>

<p>sono anche permessi valori negativi della lista precedente.</p>

<p>Ci sono due possibilità per questa impostazione. Esse definiscono come il modulo di importazione tratta i valori che non corrispondono <b>esattamente</b> a uno dei valori della lista</p>

<ul>
  <li><b>Errore se valutazione non in elenco</b><br />
Se una domanda contiene valutazioni non elencate nella lista, è visualizzato un errore e la domanda non sarà importata.</li>
  <li><b>Valutazione più vicina se non in elenco</b><br />
Se si trova una valutazione che non corrisponde ad alcun valore della lista, la stessa è sostituita dal valore più vicino trovato nella lista</li>
</ul>

<p><i>Nota: alcuni formati di importazione scrivono direttamente nel database e possono bypassare questo controllo</i></p>';
$string['matchgradesnearest'] = 'Voto più vicino se non presente nell\'elenco';
$string['missingcourseorcmid'] = 'Bisogna fornire courseid o cmid a print_questione.';
$string['missingcourseorcmidtolink'] = 'Bisogna fornire courseid o cmid a get_question_edit_link.';
$string['missingimportantcode'] = 'In questo tipo di domanda manca una parte importante: <b>{$a}</b>.';
$string['missingoption'] = 'La domanda cloze {$a} è priva delle sue opzioni';
$string['modified'] = 'Ultimo salvataggio';
$string['move'] = 'Sposta da {$a} e modifica i link.';
$string['movecategory'] = 'Sposta categoria';
$string['movedquestionsandcategories'] = 'Le domande e le categorie di domande sono state spostate da {$a->oldplace} a {$a->newplace}.';
$string['movelinksonly'] = 'Cambia solamente l\'indirizzamento dei link, non spostare o copiare i files.';
$string['moveq'] = 'Sposta domande';
$string['moveqtoanothercontext'] = 'Sposta domanda in un altro contesto';
$string['moveto'] = 'Sposta in >>';
$string['movingcategory'] = 'Spostamento categoria';
$string['movingcategoryandfiles'] = 'Sei sicuro di voler spostare la categoria {$a->name} e tutte le sotto categorie nel contesto "{$a->contextto}"?<br /> Sono stati rilevati {$a->urlcount} files linkati da domande in {$a->fromareaname}, vuoi copiare o spostare questi in {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Sei sicuro di voler spostare la categoria "{$a->name}" e tutte le sottocategorie nel contesto "{$a->contextto}"?';
$string['movingquestions'] = 'Spostamento domande e File';
$string['movingquestionsandfiles'] = 'Sei sicuro di voler spostare domande da {$a->questions} al contesto di <strong>"{$a->tocontext}"</strong>?<br /> Sono stati rilevati<strong>{$a->urlcount} files</strong> linkati da queste domande in {$a->fromareaname}, vuoi copiare o spostare questi files in {$a->toareaname}?.';
$string['movingquestionsnofiles'] = 'Sei sicuro di voler spostare domande da {$a->questions} al contesto di <strong>"{$a->tocontext}"</strong>?<br /> <strong>Non ci sono files</strong> linkati da queste domande in {$a->fromareaname}.';
$string['needtochoosecat'] = 'Devi scegliere una categoria dove spostare questa domanda oppure clicca su \'Annulla\'.';
$string['nocate'] = 'La categoria {$a} non esiste!';
$string['nopermissionadd'] = 'Non sei autorizzato ad aggiungere domande qui.';
$string['nopermissionmove'] = 'Non sei autorizzato a spostare domande da qui. Puoi salvare la domanda in questa categoria oppure salvarla come nuova domanda.';
$string['noprobs'] = 'Non trovato alcun problema nel tuo database delle domande.';
$string['noquestions'] = 'Non sono state trovate domande da esportare. Accertati di aver selezionato per l\'esportazione una categoria che contenga domande.';
$string['noquestionsinfile'] = 'Nel file da importare non ci sono domande';
$string['noresponse'] = '[Nessuna risposta]';
$string['notanswered'] = 'Risposta non data';
$string['notchanged'] = 'Non modificato dopo l\'ultimo tentativo';
$string['notenoughanswers'] = 'Questo tipo di domanda richiede almeno {$a} risposte';
$string['notenoughdatatoeditaquestion'] = 'Non è stato specificato un id di domanda, o un id di categoria e il tipo domanda.';
$string['notenoughdatatomovequestions'] = 'Devi fornire l\'ID delle domande che vuoi spostare.';
$string['notflagged'] = 'Non contrassegnata';
$string['notgraded'] = 'Non valutata';
$string['notshown'] = 'Non visualizzata';
$string['notyetanswered'] = 'Risposta non ancora data';
$string['notyourpreview'] = 'L\'anteprima non ti appartiene';
$string['novirtualquestiontype'] = 'Non ci sono tipi virtuali di domanda per il tipo di domanda {$a}';
$string['numqas'] = 'Num. tentativi per la domanda';
$string['numquestions'] = 'Num. domande';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} nascoste)';
$string['options'] = 'Opzioni';
$string['orphanedquestionscategory'] = 'Domande salvate da categorie eliminate';
$string['orphanedquestionscategoryinfo'] = 'Talvolta, a causa di software obsoleti o bug, le domande possono rimanere nel database anche quando la categoria che le conteneva è stata eliminata.Tale problema sembra si sia verificato in questo sito. E\' stata quindi creata automaticamente questa categoria dove sono state spostate le domande orfane, in modo da consentirti di gestirle nuovamente. Da notare che eventuali immagini o file multimediali utilizzati da queste domande molto probabilmente andranno perduti.';
$string['page-question-category'] = 'Pagina con categoria di domande';
$string['page-question-edit'] = 'Pagina di modifica domande';
$string['page-question-export'] = 'Pagina di importazione domande';
$string['page-question-import'] = 'Pagina di esportazione domande';
$string['page-question-x'] = 'Qualisiasi pagina con domande';
$string['parent'] = 'Genitore';
$string['parentcategory'] = 'Categoria genitore';
$string['parentcategory_help'] = 'La nuova categoria sarà inserita all\'interno della categoria genitore. "Top" significa che la nuova categoria non sarà inserita in nessun\'altra categoria.
I contesti delle categoria sono visualizzati in grassetto. Per ogni contesto dovrebbe essere presente almeno una categoria. ';
$string['parenthesisinproperclose'] = 'La parentesi prima di ** non è chiusa correttamente in {$a}**';
$string['parenthesisinproperstart'] = 'La parentesi prima di ** non è aperta correttamente in {$a}**';
$string['parsingquestions'] = 'Analisi domande presenti nel file di importazione.';
$string['partiallycorrect'] = 'Parzialmente corretta';
$string['partiallycorrectfeedback'] = 'Per ciascuna risposta parzialmente corretta';
$string['partiallycorrectfeedbackdefault'] = 'Risposta parzialmente corretta.';
$string['penaltyfactor'] = 'Fattore di penalità';
$string['penaltyfactor_help'] = '<p>Per ogni risposta errata può essere definita la frazione di punteggio raggiunto che deve essere sottratta. Questo è significativo solamente se il quiz è eseguito in modo adattativo tale per cui allo studente è permesso di rispondere più volte alla domanda. Il fattore di penalità può essere un numero tra 0 e 1. Un fattore uguale a 1 significa che lo studente deve rispondere correttamente al primo tentativo se vuole ottenere qualche punto dalla domanda in questione. Un fattore uguale a 0 significa che lo studente può provare quante volte vuole e ancora aspirare al massimo punteggio per la stessa domanda.</p>';
$string['penaltyforeachincorrecttry'] = 'Penalità per ciascuna scelta non corretta';
$string['penaltyforeachincorrecttry_help'] = 'Se le domande usano i comportamenti \'Interattivo con tentativi multipli\' oppure \'Modo adattativo" per dare allo studente più possibilità per rispondere correttamente, questa opzione consente di controllare quanto penalizzare lo studente per le scelte sbagliate.

La penalità è in proporzione al punteggio totale della domanda, ad esempio se la domanda ha un punteggio pari a tre e la penalità è 0.3333333, lo studente otterrà un punteggio pari a tre se indovina la risposta subito, pari a 2 se indovina la risposta al secondo tentativo e pari a 1 se indovina la risposta al al terzo tentativo.';
$string['permissionedit'] = 'Modificare questa domanda';
$string['permissionmove'] = 'Spostare questa domanda';
$string['permissionsaveasnew'] = 'Salvare questa domanda come nuova domanda';
$string['permissionto'] = 'Sei autorizzato a:';
$string['previewquestion'] = 'Anteprima domanda: {$a}';
$string['published'] = 'condivise';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">La domanda "{$a->name}" ({$a->qtype})</a> è in questa categoria ma è anche usata nel <a href="{$a->qurl}">quiz "{$a->quizname}"</a> nell\'altro corso "{$a->coursename}".';
$string['questionbank'] = 'Deposito delle domande';
$string['questionbehaviouradminsetting'] = 'Impostazioni comportamento della domanda';
$string['questionbehavioursdisabled'] = 'Comportamenti domanda da disabilitare';
$string['questionbehavioursdisabledexplained'] = 'Inserisci un elenco di comportamenti (separati da virgola) che non devono comparire nel menu a discesa.';
$string['questionbehavioursorder'] = 'Ordine dei comportamenti delle risposte';
$string['questionbehavioursorderexplained'] = 'Inserisci un elenco di comportamenti (separati da virgole( nello stesso ordine con il quale desideri farli comparire nel menù a discesa';
$string['questioncategory'] = 'Categoria di domande';
$string['questioncatsfor'] = 'Categorie di domande per \'{$a}\'';
$string['questiondoesnotexist'] = 'Questa domanda non esiste';
$string['questionidmismatch'] = 'Mancata corrispondenza delle id delle domande';
$string['questionname'] = 'Nome della domanda';
$string['questionno'] = 'Domanda {$a}';
$string['questionpreviewdefaults'] = 'Default anteprima domanda';
$string['questionpreviewdefaults_desc'] = 'I default vengono utilizzati quando un utente visualizza l\'anteprima di una domanda presente nel deposito delle domande. Dopo che la domanda è stata visualizzata in anteprima per la prima volta, le preferenze personali saranno memorizzate come preferenze dell\'utente.';
$string['questions'] = 'Domande';
$string['questionsaveerror'] = 'Si sono verificati errori durante il salvataggio della domanda - ({$a})';
$string['questionsinuse'] = '(* Le domande contrassegnate da un asterisco sono quelle giù in uso in altri quiz. Tali domande non saranno eliminate da quei quiz ma solo dall\'elenco della categoria.)';
$string['questionsmovedto'] = 'Domande ancora in uso spostate a "{$a}" nella categoria superiore di corso.';
$string['questionsrescuedfrom'] = 'Domande salvate dal contesto {$a}.';
$string['questionsrescuedfrominfo'] = 'Queste domande (alcune delle quali possono essere nascoste) sono state salvate quando il contesto {$a} è stato eliminato, in quanto sono ancora utilizzate da qualche quiz o da altre attività.';
$string['questiontext'] = 'Testo domanda';
$string['questiontype'] = 'Tipo di domanda';
$string['questionuse'] = 'Usa domanda in questa attività';
$string['questionvariant'] = 'Variante domanda';
$string['questionx'] = 'Domanda {$a}';
$string['requiresgrading'] = 'Richiede valutazione';
$string['responsehistory'] = 'Storico delle risposte';
$string['restart'] = 'Ricomincia';
$string['restartwiththeseoptions'] = 'Ricomincia con queste opzioni';
$string['reviewresponse'] = 'Rivedi le risposte date';
$string['rightanswer'] = 'Risposta corretta';
$string['rightanswer_help'] = 'Un sommario delle risposte corrette generato automaticamente. Questo  sommario è limitato,  potrebbe essere preferibile fornire la risposta corretta nel feedback generale della domanda, disabilitando questa impostazione.';
$string['save'] = 'Salva';
$string['saved'] = 'Salvato: {$a}';
$string['saveflags'] = 'Salva lo stato dei contrassegni';
$string['selectacategory'] = 'Scegli una categoria:';
$string['selectaqtypefordescription'] = 'Scegli un tipo di domanda per vederne la descrizione.';
$string['selectcategoryabove'] = 'Scegli una delle categorie sopra elencate';
$string['selectquestionsforbulk'] = 'Seleziona le domande per azioni su elenchi';
$string['settingsformultipletries'] = 'Tentativi multipli';
$string['shareincontext'] = 'Condividi in contesto per {$a}';
$string['showhidden'] = 'Visualizza anche le domande vecchie';
$string['showmarkandmax'] = 'Visualizza punteggio e max.';
$string['showmaxmarkonly'] = 'Visualizza solo punteggio massimo';
$string['shown'] = 'Visualizzato';
$string['shownumpartscorrect'] = 'Visualizza il numero delle risposte esatte';
$string['shownumpartscorrectwhenfinished'] = 'Visualizza il numero delle risposte esatte dopo che la domanda è stata completata';
$string['showquestiontext'] = 'Visualizza il corpo del testo della domanda';
$string['specificfeedback'] = 'Feedback specifico';
$string['specificfeedback_help'] = 'Feedback dipendente dalla risposta data dallo studente';
$string['started'] = 'Iniziato';
$string['state'] = 'Stato';
$string['step'] = 'Passo';
$string['stoponerror'] = 'Fermati in presenza di errori';
$string['stoponerror_help'] = 'L\'impostazione determina se il processo di importazione si deve fermare in presenza di errori senza importare nessuna domanda, oppure se deve tralasciare le domande con errori importando solo le domande corrette.';
$string['submissionoutofsequence'] = 'Accesso fuori sequenza. Per favore non usare il pulsante Indietro del browser durante la modifica di domande';
$string['submissionoutofsequencefriendlymessage'] = 'Hai inserito dati al di fuori della sequenza normale. Il problema può verificarsi se si utilizzano i pulsanti Avanti ed Indietro del browser: per favore non usare questi pulsanti durante i test. Lo stesso problema può verificarsi se fai click nella pagina mentre si sta caricando. Per riprendere, fai click su <strong>Continua</strong>';
$string['submit'] = 'Invia';
$string['submitandfinish'] = 'Invia e termina';
$string['submitted'] = 'Invia: {$a}';
$string['technicalinfo'] = 'Informazioni tecniche';
$string['technicalinfo_help'] = 'In genere queste informazioni tecniche sono utili agli sviluppatori di nuovi tipi di domande. Possono anche risultare utili per diagnosticare eventuali problemi con le domande.';
$string['technicalinfomaxfraction'] = 'Frazione massima: {$a}';
$string['technicalinfominfraction'] = 'Frazione minima: {$a}';
$string['technicalinfoquestionsummary'] = 'Sommario domanda: {$a}';
$string['technicalinforightsummary'] = 'Sommario risposta corretta: {$a}';
$string['technicalinfostate'] = 'Stato della domanda:';
$string['tofilecategory'] = 'Scrivi categoria su file';
$string['tofilecontext'] = 'Scrivi contesto su file';
$string['uninstallbehaviour'] = 'Rimuovi il comportamento della domanda';
$string['uninstallqtype'] = 'Rimuovi questo tipo domanda.';
$string['unknown'] = 'Sconosciuto';
$string['unknownbehaviour'] = 'Comportamento sconosciuto: {$a}.';
$string['unknownorunhandledtype'] = 'Tipo di domanda sconosciuto o non gestito: {$a}';
$string['unknownquestion'] = 'Domanda sconosciuta: {$a}.';
$string['unknownquestioncatregory'] = 'Categoria di domande sconosciuta: {$a}.';
$string['unknownquestiontype'] = 'Tipo domanda sconosciuto: {$a}.';
$string['unknowntolerance'] = 'Tipo tolleranza sconosciuto: {$a}.';
$string['unpublished'] = 'non condivise';
$string['updatedisplayoptions'] = 'Aggiorna opzioni di visualizzazione';
$string['upgradeproblemcategoryloop'] = 'Rilevato un problema nell\'aggiornamento delle categorie di domande. C\'è un circolo nell\'albero delle categorie. Gli id delle categorie interessate sono {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'La categoria di domande {$a->name} ({$a->id}) non può essere aggiornata.';
$string['upgradeproblemunknowncategory'] = 'Rilevato un problema nell\'aggiornamento delle categorie di domande. La categoria {$a->id} sta sotto alla categoria {$a->parent}, che non esiste. La categoria superiore è stata cambiata per risolvere il problema.';
$string['whethercorrect'] = 'Se corretto';
$string['whethercorrect_help'] = 'Include sia la descrizione testuale "Corretta", "Parzialmente corretta" o "Errata", sia eventuali evidenziamenti basati sui colori che forniscono le medesime informazioni';
$string['withselected'] = 'Con la selezione';
$string['wrongprefix'] = 'Nameprefix {$a} formattato erroneamente';
$string['xoutofmax'] = '{$a->mark} su {$a->max}';
$string['yougotnright'] = 'Hai selezionato correttamente {$a->num}.';
$string['youmustselectaqtype'] = 'Devi scegliere il tipo di domanda.';
$string['yourfileshoulddownload'] = 'Il download del file di esportazione dovrebbe cominciare tra breve. Altrimenti cliccare <a href="{$a}">qui</a>.';
