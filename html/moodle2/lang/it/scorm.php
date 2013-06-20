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
 * Strings for component 'scorm', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Attivazione';
$string['activityloading'] = 'L\'attività partirà in';
$string['activityoverview'] = 'Ci sono pacchetti SCORM che richiedono la tua attenzione';
$string['activitypleasewait'] = 'Caricamento in corso...';
$string['adminsettings'] = 'Impostazioni amministrative';
$string['advanced'] = 'Parametri';
$string['aicchacpkeepsessiondata'] = 'Dati sessione AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'La durata del mantenimento, espressa in giorni, dei dati delle sessioni esterne AICC HACP. (un valore elevato riempirà la tabella di dati ma può essere utile per eseguire attività si debug)';
$string['aicchacptimeout'] = 'Timeout AICC HACP';
$string['aicchacptimeout_desc'] = 'La durata in minuti in cui una sessione AICC HACP può rimanere aperta';
$string['allowapidebug'] = 'Attiva l\'API di debug e tracking (Imposta la capture mask con apidebugmasjk)';
$string['allowtypeaicchacp'] = 'Abilita AICC HACP esterna';
$string['allowtypeaicchacp_desc'] = 'Abilita la comunicazione   AICC HACP esterna senza necessità di autenticazioni per richieste post provenienti dal pacchetto AICC esterno';
$string['allowtypeexternal'] = 'Abilita i pacchetti di tipo esterno';
$string['allowtypeexternalaicc'] = 'Abilita URL AICC diretta';
$string['allowtypeexternalaicc_desc'] = 'Consente di usare url dirette a pacchetti AICC';
$string['allowtypeimsrepository'] = 'Abilita i pacchetti di tipo IMS';
$string['allowtypelocalsync'] = 'Abilita i pacchetti di tipo download';
$string['apidebugmask'] = 'API debug capture mask - utilizza una regex su <username>:<activityname> ad esempio admin:.* eseguirà il debug solo per gli admin.';
$string['areacontent'] = 'File del contenuto';
$string['areapackage'] = 'File del pacchetto';
$string['asset'] = 'Asset';
$string['assetlaunched'] = 'Asset - Visualizzato';
$string['attempt'] = 'Tentativo';
$string['attempt1'] = '1 tentativo';
$string['attempts'] = 'Tentativi';
$string['attemptstatusall'] = 'My home e pagina di ingresso';
$string['attemptstatusentry'] = 'Solo pagina di ingresso';
$string['attemptstatusmy'] = 'Solo My home';
$string['attemptsx'] = '{$a} tentativi';
$string['attr_error'] = 'Valore non valido per l\'attributo ({$a->attr}) nel tag {$a->tag}.';
$string['autocontinue'] = 'Continuazione automatica';
$string['autocontinuedesc'] = 'Imposta il lancio automatico di learning object successivi. Se non abilitato, dovrà essere utilizzato il pulsante Continua.';
$string['autocontinue_help'] = 'La continuazione automatica consente il lancio automatico di  learning object successivi senza usare il tasto Continua';
$string['averageattempt'] = 'Media tentativi';
$string['badmanifest'] = 'Il manifest contiene alcuni errori: controlla l\'elenco';
$string['badpackage'] = 'Il pacchetto/manifest specificato non è valido. Controlla e riprova.';
$string['browse'] = 'Anteprima';
$string['browsed'] = 'Visitato';
$string['browsemode'] = 'Modalità anteprima';
$string['browserepository'] = 'Visita repository';
$string['cannotfindsco'] = 'SCO non trovato';
$string['chooseapacket'] = 'Scegli o aggiorna un pacchetto';
$string['completed'] = 'Completato';
$string['completionscorerequired'] = 'Punteggio minimo richiesto';
$string['completionscorerequired_help'] = 'Un utente, oltre a soddisfare eventuali altri criteri di completamento, dovrà raggiungere il punteggio impostato per completare l\'attività SCORM.';
$string['completionstatus_completed'] = 'Completed';
$string['completionstatus_passed'] = 'Passed';
$string['completionstatusrequired'] = 'Stato richiesto';
$string['completionstatusrequired_help'] = 'Affinché l\'attività SCORM venga contrassegnata come completata, oltre a soddisfare gli eventuali altri criteri di completamento, lo studente dovrà ottenere almeno uno degli stati richiesti.';
$string['confirmloosetracks'] = 'ATTENZIONE: Il pacchetto sembra cambiato o modificato. Se la struttura del pacchetto è cambiata, alcuni tracciamenti degli utenti potrebbero andare persi durante il processo di aggiornamento.';
$string['contents'] = 'Contenuti';
$string['coursepacket'] = 'Pacchetto del corso';
$string['coursestruct'] = 'Struttura del corso';
$string['currentwindow'] = 'Stessa finestra';
$string['datadir'] = 'Errore filesystem: non è possibile creare la cartella dei dati del corso';
$string['defaultdisplaysettings'] = 'Impostazioni di visualizzazione di default';
$string['defaultgradesettings'] = 'Impostazioni di valutazione di default';
$string['defaultothersettings'] = 'Altre impostazioni di default';
$string['deleteallattempts'] = 'Elimina tutti i tentativi SCORM';
$string['deleteattemptcheck'] = 'Sei sicuro di voler eliminare questi tentativi?';
$string['deleteuserattemptcheck'] = 'Sei proprio sicuro di voler eliminare tutti i tuoi tentativi?';
$string['details'] = 'Dettagli tracciamento';
$string['directories'] = 'Visualizza collegamenti';
$string['disabled'] = 'Disabilitato';
$string['display'] = 'Visualizzazione pacchetto';
$string['displayattemptstatus'] = 'Visualizza  lo stato dei tentativi';
$string['displayattemptstatusdesc'] = 'Imposta la visualizzazione del riepilogo dei tentativi dell\'utente nella pagina  My home all\'interno del blocco Panoramica corsi oppure nella pagina di ingresso dell\'attività SCORM.';
$string['displayattemptstatus_help'] = 'Consente di visualizzare un riepilogo dello stato dei nel blocco Panoramica corsi della pagina My home e/o nella pagina con la struttura del pacchetto del modulo SCORM.';
$string['displaycoursestructure'] = 'Visualizza la struttura del corso nella pagina di ingresso';
$string['displaycoursestructuredesc'] = 'Imposta la visualizzazione della struttura del corso nella pagina di ingresso';
$string['displaycoursestructure_help'] = 'Visualizza la struttura del corso nella pagina di riepilogo SCORM.';
$string['displaydesc'] = 'Imposta la visualizzazione di un pacchetto SCORM in una nuova finestra';
$string['displaysettings'] = 'Impostazioni di visualizzazione';
$string['dnduploadscorm'] = 'Aggiungi un pacchetto SCORM';
$string['domxml'] = 'Libreria esterna DOMXML';
$string['duedate'] = 'Data di termine';
$string['element'] = 'Elemento';
$string['elementdefinition'] = 'Elemento definizione';
$string['enter'] = 'Entra';
$string['entercourse'] = 'Entra nel corso';
$string['errorlogs'] = 'Log degli errori';
$string['everyday'] = 'Ogni giorno';
$string['everytime'] = 'Ogni volta che è usato';
$string['exceededmaxattempts'] = 'Hai raggiunto il massimo numero di tentativi consentito.';
$string['exit'] = 'Esci dal corso';
$string['exitactivity'] = 'Esci dall\'attività';
$string['expired'] = 'Spiacente, questa attività è stata chiusa il {$a} e non è più disponibile';
$string['external'] = 'Aggiornamento pacchetti esterni';
$string['failed'] = 'Fallito';
$string['finishscorm'] = 'Se hai terminato di visualizzare questa risorsa, {$a}';
$string['finishscormlinkname'] = 'fai click qui per tornare alla pagina del corso';
$string['firstaccess'] = 'Primo accesso';
$string['firstattempt'] = 'Primo tentativo';
$string['forcecompleted'] = 'Forza completamento';
$string['forcecompleteddesc'] = 'Imposta il valore di default per l\'opzione Forza completamento';
$string['forcecompleted_help'] = 'Forzare il completamento assicura che lo stato del tentativo sia "completato". L\'impostazione ha senso solo per i pacchetti SCORM 1.2.';
$string['forcejavascript'] = 'Obbliga gli utenti ad abilitare JavaScript';
$string['forcejavascript_desc'] = 'Impedisce l\'accesso ad oggetti SCORM quando il borwser dell\'utente non supporta javascript oppure non lo ha abilitato. Se l\'impostazione è disbailitata, l\'utente può vedere l\'oggetto SCORM ma la comunicazione dei dati di fruizione sarà perduta.';
$string['forcejavascriptmessage'] = 'Per visualizzare questo oggetto è necessario JavaScript, per favore abilita JavaScript nel tuo browser e riprova';
$string['forcenewattempt'] = 'Forza un nuovo tentativo';
$string['forcenewattemptdesc'] = 'Ogni accesso ad un pacchetto SCORM sarò considerato come nuovo tentativo';
$string['forcenewattempt_help'] = 'Con Forza un nuovo tentativo ogni accesso al pacchetto SCORM sarà considerato un nuovo tentativo.';
$string['found'] = 'Manifest trovato';
$string['frameheight'] = 'L\'altezza del frame o della finestra';
$string['framewidth'] = 'La larghezza del frame o della finestra';
$string['fullscreen'] = 'Schermo intero';
$string['general'] = 'Dati generali';
$string['gradeaverage'] = 'Media dei voti';
$string['gradeforattempt'] = 'Valutazione del tentativo';
$string['gradehighest'] = 'Voto migliore';
$string['grademethod'] = 'Metodo di valutazione';
$string['grademethoddesc'] = 'Imposta la modalità di calcolo della valutazione per un singolo tentativo';
$string['grademethod_help'] = 'Il metodo di valutazione definisce come valutare uno specifico tentativo.

Sono disponibili quattro metodi di valutazione:

* Learning object - Il numero di Learning object completati/superati.
* Voto migliore - Il voto più alto ottenuto nei Learning object superati
* Media dei voti - La media di tutti i voti
* Somma dei voti - La somma di tutti i voti';
$string['gradereported'] = 'Voto riportato';
$string['gradescoes'] = 'Learning object';
$string['gradesettings'] = 'Impostazioni di valutazione';
$string['gradesum'] = 'Somma dei voti';
$string['height'] = 'Altezza';
$string['hidden'] = 'Nascosta';
$string['hidebrowse'] = 'Nascondi l\'opzione Anteprima';
$string['hidebrowsedesc'] = 'La modalità anteprima consente allo studente la visione dell\'attività prima di effettuare un tentativo';
$string['hidebrowse_help'] = 'La modalità anteprima consente la visualizzazione dell\'attività prima di effettuare il tentativo vero e proprio. Se la modalità anteprima è disabilitata il pulsante Anteprima non sarà visibile.';
$string['hideexit'] = 'Nascondere il link (Esci dal corso)';
$string['hidenav'] = 'Nascondi i pulsanti di navigazione';
$string['hidenavdesc'] = 'Abilitazione o disabilitazione dei pulsanti di navigazione';
$string['hidereview'] = 'Nascondere il pulsante Rivedi';
$string['hidetoc'] = 'Visualizza nel player la struttura del corso';
$string['hidetocdesc'] = 'La modalità di visualizzazione della struttura del corso (TOC) nel player SCORM.';
$string['hidetoc_help'] = 'La modalità di visualizzazione della struttura del corso (TOC) nel player SCORM.';
$string['highestattempt'] = 'Tentativo migliore';
$string['identifier'] = 'Identificativo domanda';
$string['incomplete'] = 'Incompleto';
$string['info'] = 'Info';
$string['interactions'] = 'Interazioni';
$string['interactionscorrectcount'] = 'Numero di risultati corretti per la domanda';
$string['interactionsid'] = 'id dell\'elemento';
$string['interactionslatency'] = 'Il tempo intercorso tra il momento in cui l\'interazione è stata resa disponibile allo studente ed il momento in cui lo studente ha dato la prima risposta';
$string['interactionslearnerresponse'] = 'Risposta dello studente';
$string['interactionspattern'] = 'Modello di risposta corretta';
$string['interactionsresponse'] = 'Risposta dello studente';
$string['interactionsresult'] = 'Risultati basati sulle risposte date dallo studente e e risposte corrette';
$string['interactionsscoremax'] = 'Valore massimo nell\'intervallo per il punteggio grezzo';
$string['interactionsscoremin'] = 'Valore minimo nell\'intervallo per il punteggio grezzo';
$string['interactionsscoreraw'] = 'Numero che aiuta a valutare la prestazione dello studente relativo all\'intervallo determinato dai valori minimo e massimo.';
$string['interactionssuspenddata'] = 'Fornisce uno spazio per memorizzare e recuperare dati tra le diverse sessioni dello studente';
$string['interactionstime'] = 'Orario di inizio del tentativo';
$string['interactionstype'] = 'Tipo di domanda';
$string['interactionsweight'] = 'Peso assegnato all\'elemento';
$string['invalidactivity'] = 'L\'attività SCORM è errata';
$string['invalidhacpsession'] = 'La sessione HACP non è valida';
$string['invalidmanifestresource'] = 'ATTENZIONE: le seguenti risorse sono presenti nel manifest ma non è stato possibile trovarle:';
$string['invalidurl'] = 'La URL specificata non è valida';
$string['invalidurlhttpcheck'] = 'E\' stato specificato un URL non valido: Messaggio di debug: <pre> {$a->cmsg} </pre>';
$string['last'] = 'Accesso più recente il';
$string['lastaccess'] = 'Accesso più recente';
$string['lastattempt'] = 'Ultimo tentativo completato';
$string['lastattemptlock'] = 'Blocca dopo l\'ultimo tentativo';
$string['lastattemptlockdesc'] = 'Impedisce i lancio del player SCORM dopo l\'esaurimento di tutti i tentativi disponibili.';
$string['lastattemptlock_help'] = 'Gli studenti non potranno più lanciare il player SCORM se avranno esaurito tutti i tentativi a loro disposizione.';
$string['location'] = 'Visualizza la barra dell\'indirizzo';
$string['max'] = 'Punteggio massimo';
$string['maximumattempts'] = 'Numero massimo di tentativi';
$string['maximumattemptsdesc'] = 'Imposta il valore di default per il numero massimo di tentativi';
$string['maximumattempts_help'] = 'Imposta il numero massimo di tentativi consentitoi. Funziona solamente per pacchetti SCORM.2 e AICC.';
$string['maximumgradedesc'] = 'Imposta il valore di default per il punteggio massimo dell\'attività';
$string['menubar'] = 'Visualizza la barra dei menu';
$string['min'] = 'Punteggio minimo';
$string['missing_attribute'] = 'Attributo mancante {$a->attr} nel tag {$a->tag}';
$string['missingparam'] = 'Un parametro obbligatorio è mancante o errato';
$string['missing_tag'] = 'Tag mancante {$a->tag}';
$string['mode'] = 'Modalità';
$string['modulename'] = 'Pacchetto SCORM';
$string['modulename_help'] = 'Un oggetto SCORM è un insieme di file impacchettati secondo uno standard riconosciuto per la realizzazione di learning object. Il modulo di attività SCORM consente l\'utilizzo di pacchetti in formato .zip basati sugli standard SCORM e AICC.

In genere il contenuto di un pacchetto viene visualizzato su diverse pagine, con la possibilità di navigarle. E\' possibile impostare il pacchetto per visualizzare il contenuto in finestre pop up, con l\'indice dei contenuti, con i pulsanti di navigazione, eccetera. Gli oggetti SCORM possono anche presentare delle domande i cui risultati saranno memorizzati nel registro del valutatore.

E\' possibile usare attività SCORM per:

* Presentare contenuti multimediali ed animazioni
* Valutare le attività degli studenti';
$string['modulenameplural'] = 'Pacchetti SCORM';
$string['navigation'] = 'Navigation';
$string['newattempt'] = 'Avvia un nuovo tentativo';
$string['next'] = 'Continua';
$string['noactivity'] = 'Nessun report';
$string['noattemptsallowed'] = 'Numero di tentativi consentito';
$string['noattemptsmade'] = 'Numero di tentativi che hai effettuato';
$string['no_attributes'] = 'Il tag {$a->tag} deve avere degli attributi';
$string['no_children'] = 'Il tag {$a->tag} deve avere dei figli';
$string['nolimit'] = 'Senza limite';
$string['nomanifest'] = 'Manifest non trovato';
$string['noprerequisites'] = 'Spiacente, non hai soddisfatto i  prerequisiti necessari per accedere all\'attività.';
$string['noreports'] = 'Non ci sono report da visualizzare';
$string['normal'] = 'Normale';
$string['noscriptnoscorm'] = 'Il browser utilizzato non supporta javascript o ha il supporto javascript disabilitato. Questo pacchetto SCORM potrebbe non funzionare o non salvare correttamente i dati.';
$string['notattempted'] = 'Non tentato';
$string['not_corr_type'] = 'Tipo sbagliato per il tag {$a->tag}';
$string['notopenyet'] = 'Spiacente, questa attività non è disponibile fino al {$a}';
$string['objectives'] = 'Obiettivi';
$string['optallstudents'] = 'tutti gli utenti';
$string['optattemptsonly'] = 'solo utenti con tentativi';
$string['options'] = 'Opzioni (in alcuni browser non consentite)';
$string['optionsadv'] = 'Opzioni (Avanzate)';
$string['optionsadv_desc'] = 'Imposta la larghezza e l\'altezza come opzioni avanzate.';
$string['optnoattemptsonly'] = 'solo utenti senza tentativi';
$string['organization'] = 'Organizzazione';
$string['organizations'] = 'Organizzazioni';
$string['othersettings'] = 'Impostazioni addizionali';
$string['othertracks'] = 'Altri tracciamenti';
$string['package'] = 'File del pacchetto';
$string['packagedir'] = 'Errore filesystem: non è possibile creare la cartella del pacchetto';
$string['packagefile'] = 'Non è stato specificato nessun pacchetto/manifest';
$string['package_help'] = 'Il pacchetto è un file con estensione zip (o pif) che contiene la definizione di un corso in formato SCORM/AICC.';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Consente l\'inserimento di un URL per lo SCORM anziché  scegliere un pacchetto con il file picker.';
$string['page-mod-scorm-x'] = 'Qualsiasi pagina con modulo SCORM';
$string['pagesize'] = 'Dimensione pagina';
$string['passed'] = 'Superato';
$string['php5'] = 'PHP5 (libreria DOMXML nativa)';
$string['pluginadministration'] = 'Amministrazione pacchetto SCORM';
$string['pluginname'] = 'Pacchetto SCORM';
$string['popup'] = 'Nuova finestra';
$string['popupmenu'] = 'In un menu a discesa';
$string['popupopen'] = 'Apri il pacchetto in una nuova finestra';
$string['popupsblocked'] = 'Le finestre popup sembrano bloccate, impedendo di eseguire il modulo SCORM. Per favore prima di riprovare verifica le impostazioni del browser.';
$string['position_error'] = 'Il tag {$a->tag} non può essere figlio del tag {$a->parent}';
$string['preferencespage'] = 'Preferenze per questa pagina';
$string['preferencesuser'] = 'Preferenze per questo report';
$string['prev'] = 'Precedente';
$string['raw'] = 'Punteggio grezzo';
$string['regular'] = 'Manifest corretto';
$string['report'] = 'Report';
$string['reportcountallattempts'] = '{$a->nbattempts} tentativi per {$a->nbusers} utenti su {$a->nbresults} risultati';
$string['reportcountattempts'] = '{$a->nbresults} risultati ({$a->nbusers} utenti)';
$string['reports'] = 'Report';
$string['resizable'] = 'Consenti il ridimensionamento della finestra';
$string['result'] = 'Risultato';
$string['results'] = 'Risultati';
$string['review'] = 'Rivedi';
$string['reviewmode'] = 'Modalità revisione';
$string['scoes'] = 'Learning Object';
$string['score'] = 'Punteggio';
$string['scorm:addinstance'] = 'Aggiungere pacchetto SCORM';
$string['scormclose'] = 'Al';
$string['scormcourse'] = 'Corso';
$string['scorm:deleteownresponses'] = 'Eliminare propri tentativi';
$string['scorm:deleteresponses'] = 'Eliminare tentativi SCORM';
$string['scormloggingoff'] = 'API Logging: Off';
$string['scormloggingon'] = 'API Logging: On';
$string['scormopen'] = 'Dal';
$string['scormresponsedeleted'] = 'I tentativi degli utenti sono stati eliminati';
$string['scorm:savetrack'] = 'Essere tracciato';
$string['scorm:skipview'] = 'Saltare pagina introduttiva';
$string['scormtype'] = 'Tipo';
$string['scormtype_help'] = 'L\'impostazione stabilisce come sarà incluso il pacchetto nel corso. Sono disponibili 5 opzioni:

* Pacchetto caricato - Consente la scelta di un pacchetto SCORM tramite file picker
* Manifest SCORM esterno - Consente l\'inserimento di un URL per il file imsmanifest.xml. Nota: se l\'URL appartiene ad un dominio diverso rispetto a questo sito, è preferibile usare "Pacchetto da scaricare", altrimenti le valutazioni voti non saranno salvate.
* Pacchetto da scaricare - Consente l\'inserimento dell\'URL  del pacchetto che sarà scaricato,  decompresso localmente ed anche aggiornato in presenza di aggiornamenti del paccehtto
* Repository locale IMS - Consente la scelta di un pacchetto da un repository IMS.
* URL AICC esterna - l\'URL di lancio per una attività AICC. Attorno all\'URL verrà costruito uno pseudo package';
$string['scorm:viewreport'] = 'Visualizzare report';
$string['scorm:viewscores'] = 'Visualizzare punteggi';
$string['scrollbars'] = 'Consenti lo scorrimento della finestra';
$string['selectall'] = 'Seleziona tutto';
$string['selectnone'] = 'Deseleziona tutto';
$string['show'] = 'Visualizza';
$string['sided'] = 'Lateralmente';
$string['skipview'] = 'Gli studenti saltano la pagina con la struttura del pacchetto';
$string['skipviewdesc'] = 'Imposta il valore di default per saltare o meno la pagina con la struttura del pacchetto';
$string['skipview_help'] = 'L\'impostazione determina se saltare la pagina con la struttura del pacchetto SCORM. Se il pacchetto contiene un solo learning object, la pagina con la struttura può essere saltata sempre.';
$string['slashargs'] = 'ATTENZIONE: l\'opzione slash argument non è abilitata, alcune funzioni potrebbero non comportarsi correttamente.';
$string['stagesize'] = 'Dimensione Frame/Finestra';
$string['stagesize_help'] = 'Queste due impostazioni determinano la dimensione della finestra di visualizzazione del Learning Object.';
$string['started'] = 'Iniziato il';
$string['status'] = 'Stato';
$string['statusbar'] = 'Visualizza la barra di stato';
$string['student_response'] = 'Risposta';
$string['subplugintype_scormreport'] = 'Report';
$string['subplugintype_scormreport_plural'] = 'Report';
$string['suspended'] = 'Sospeso';
$string['syntax'] = 'Errore di sintassi';
$string['tag_error'] = 'Tag sconosciuto ({$a->tag}) con questo valore: {$a->value}';
$string['time'] = 'Tempo';
$string['timerestrict'] = 'Limita il periodo dei tentativi';
$string['title'] = 'Titolo';
$string['toc'] = 'TOC';
$string['toolbar'] = 'Visualizza la barra degli strumenti';
$string['too_many_attributes'] = 'Il tag {$a->tag} ha troppi attributi';
$string['too_many_children'] = 'Il tag {$a->tag} ha troppi figli';
$string['totaltime'] = 'Tempo';
$string['trackingloose'] = 'ATTENZIONE: I dati di tracciamento esistenti saranno eliminati!';
$string['type'] = 'Tipo';
$string['typeaiccurl'] = 'URL AICC esterna';
$string['typeexternal'] = 'Manifest SCORM esterno';
$string['typeimsrepository'] = 'Content repository IMS locale';
$string['typelocal'] = 'Pacchetto caricato';
$string['typelocalsync'] = 'Pacchetto da scaricare';
$string['unziperror'] = 'Errore durante la decompressione del pacchetto';
$string['updatefreq'] = 'Frequenza auto-aggiornamento';
$string['updatefreqdesc'] = 'Imposta il valore di default per la frequenza di auto-aggiornamento';
$string['updatefreq_help'] = 'Consente di scaricare ed aggiornare automaticamente il pacchetto esterno.';
$string['validateascorm'] = 'Valida un pacchetto';
$string['validation'] = 'Risultati della validazione';
$string['validationtype'] = 'L\'impostazione determina la libreria DOMXML usata per validare il manifest SCORM. Se non lo sai lascia l\'impostazione al suo default.';
$string['value'] = 'Valore';
$string['versionwarning'] = 'La versione del manifest è precedente alla 1.3, avviso rilevato al tag {$a->tag}';
$string['viewallreports'] = 'Visualizza lo stato dei {$a} tentativi';
$string['viewalluserreports'] = 'Visualizza il report per {$a} utenti';
$string['whatgrade'] = 'Valutazione tentativi';
$string['whatgradedesc'] = 'Imposta la valutazione da memorizzare nel registro del valutatore in presenza di più tentativi completati: tentativo migliore, primo o ultimo tentativo, media dei tentativi.';
$string['whatgrade_help'] = 'Se sono consentiti più tentativi, con questa impostazione è possibile stabilire cosa memorizzare nel registro valutatore: il voto più alto, la media, il primo o l\'ultimo tentativo. L\'opzione Ultimo tentativo non comprende i tentativi con lo stato "failed"

Gestione di tentativi multipli

* Per avviare un nuovo tentativo è necessario spuntare la relativa casella sopra il pulsante Entra nella pagina con la struttura del corso. Accertarsi di consentire l\'accesso a questa pagina se si desidera consentire più tentativi.
* Alcuni pacchetti SCORM gestiscono bene i nuovi tentativi mentre altri no. Nel secondo caso se il pacchetto SCORM non ha la logica interna per evitare la sovra scrittura dei tentativi precedenti, si può verificare una perdita dei dati del tentativo quando lo studente entra nuovamente nello stesso tentativo, anche se il tentativo risulta "completato" o "superato".
* Le impostazioni "Forza completamento", "Forza un nuovo tentativo" e "Blocca dopo l\'ultimo tentativo" permettono di gestire al meglio i tentativi multipli.';
$string['width'] = 'Larghezza';
$string['window'] = 'Finestra';
