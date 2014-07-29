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
 * Strings for component 'feedback', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Aggiungi domanda';
$string['add_pagebreak'] = 'Interruzione di pagina';
$string['adjustment'] = 'Allineamento';
$string['after_submit'] = 'Al termine della compilazione';
$string['allowfullanonymous'] = 'Modalità completamente anonima';
$string['analysis'] = 'Analisi';
$string['anonymous'] = 'Anonimo';
$string['anonymous_edit'] = 'Privacy';
$string['anonymous_entries'] = 'Compilazioni anonime';
$string['anonymous_user'] = 'Utente anonimo';
$string['append_new_items'] = 'Aggiungi nuove domande';
$string['autonumbering'] = 'Numera le domande automaticamente';
$string['autonumbering_help'] = 'Abilita o disabilita la numerazione automatica delle domande';
$string['average'] = 'Media';
$string['bold'] = 'Grassetto';
$string['cancel_moving'] = 'Annulla lo spostamento';
$string['cannotmapfeedback'] = 'Si è verificato un problema nel database, non è stato possibile associare il feedback al corso';
$string['cannotsavetempl'] = 'il salvataggio dei modelli non è consentito';
$string['cannotunmap'] = 'Si è verificato un problema nel database, non è stato possibile eliminare l\'associazione';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Il captcha non è stato impostato.';
$string['check'] = 'Scelta multipla - più alternative';
$string['checkbox'] = 'Scelta multipla - più alternative (caselle di spunta)';
$string['check_values'] = 'Risposte possibili';
$string['choosefile'] = 'Scegli un file';
$string['chosen_feedback_response'] = 'risposte selezionate';
$string['completed'] = 'completato';
$string['completed_feedbacks'] = 'Risposte inviate';
$string['complete_the_form'] = 'Compila il questionario';
$string['completionsubmit'] = 'Completato all\'atto della consegna del feedback';
$string['configallowfullanonymous'] = 'L\'impostazione consente di completare un feedback senza  autenticarsi. E\' valida solo per feedback nella home page.';
$string['confirmdeleteentry'] = 'Confermi l\'eliminazione di questo elemento?';
$string['confirmdeleteitem'] = 'Confermi l\'eliminazione di questa domanda?';
$string['confirmdeletetemplate'] = 'Confermi l\'eliminazione di questo modello?';
$string['confirmusetemplate'] = 'Confermi di voler utilizzare questo modello?';
$string['continue_the_form'] = 'Continua a rispondere alle domande';
$string['count_of_nums'] = 'Numero di cifre';
$string['courseid'] = 'id corso';
$string['creating_templates'] = 'Salva le domande come modello';
$string['delete_entry'] = 'Elimina elemento';
$string['delete_item'] = 'Elimina domanda';
$string['delete_old_items'] = 'Elimina vecchi elementi';
$string['delete_template'] = 'Elimina modello';
$string['delete_templates'] = 'Eliminazione modello...';
$string['depending'] = 'Dipendenze';
$string['depending_help'] = 'La dipendenza consente di visualizzare domande in funzione della risposta data in una domanda precedente.<br />
<strong>Di seguito un esempio di creazione:</strong><br /><ul>
<li>Creare una domanda con più risposte.</li>
<li>Aggiungere una interruzione di pagina.</li>
<li>Aggiungere la domanda dipendente dalla risposta precedente ed impostare il valore "dipendente da" e la risposta in "con questa risposta".</li>
</ul><strong>Esempio:</strong>
<ol><li>Domanda A: possiedi un\'automobile? Possibili risposte: si/no</li>
<li>Interruzione di pagina</li>
<li>Domanda B: quale è il colore della tua automobile<br /> (domanda dipendente dalla risposta "si" alla domanda A)</li>
<li>Domanda C: Come mai non possiedi un\'automobile?<br /> (domanda dipendente dalla risposta "no" alla domanda A)</li> <li> ... altre domande</li> </ol>';
$string['dependitem'] = 'dipendente da';
$string['dependvalue'] = 'con questa risposta';
$string['description'] = 'Descrizione';
$string['do_not_analyse_empty_submits'] = 'Non analizzare risposte vuote';
$string['dropdown'] = 'Scelta multipla - una sola alternativa (menù a discesa)';
$string['dropdownlist'] = 'Scelta multipla - una sola alternativa (menù a discesa)';
$string['dropdownrated'] = 'Menù a discesa (valorizzato)';
$string['dropdown_values'] = 'Risposte';
$string['drop_feedback'] = 'Rimuovi da questo corso';
$string['edit_item'] = 'Modifica domanda';
$string['edit_items'] = 'Domande';
$string['email_notification'] = 'Notifica consegne via email';
$string['email_notification_help'] = 'Il docente riceverà notifiche email per ciascun feedback compilato.';
$string['emailteachermail'] = '{$a->username} ha compilato il feedback: \'{$a->feedback}\'

Puoi vedere le risposte al seguente indirizzo:

{$a->url}';
$string['emailteachermailhtml'] = '<p>{$a->username} ha compilato il feedback: <i>\'{$a->feedback}\'</i>.</p>
<p>Puoi vedere le risposte su <a href="{$a->url}">questa pagina</a>.</p>';
$string['entries_saved'] = 'Le tue risposte sono state salvate. Grazie.';
$string['eventcoursemoduleviewed'] = 'Visualizzato modulo corso';
$string['eventinstanceslistviewed'] = 'Visualizzato elenco istanze';
$string['eventresponsedeleted'] = 'Eliminate risposte';
$string['eventresponsesubmitted'] = 'Inviate risposte';
$string['export_questions'] = 'Esporta domande';
$string['export_to_excel'] = 'Esporta in formato Excel';
$string['feedback:addinstance'] = 'Aggiungere feedback';
$string['feedbackclose'] = 'Chiusura';
$string['feedback:complete'] = 'Compilare un feedback';
$string['feedback:createprivatetemplate'] = 'Creare un modello privato';
$string['feedback:createpublictemplate'] = 'Creare un modello pubblico';
$string['feedback:deletesubmissions'] = 'Eliminare feedback compilati';
$string['feedback:deletetemplate'] = 'Eliminare un modello';
$string['feedback:edititems'] = 'Modificare le domande';
$string['feedback_is_not_for_anonymous'] = 'feedback non disponibile agli utenti anonimi';
$string['feedback_is_not_open'] = 'Il feedback non è aperto';
$string['feedback:mapcourse'] = 'Associare corsi con feedback globali';
$string['feedbackopen'] = 'Apertura';
$string['feedback:receivemail'] = 'Ricevere notifiche via email';
$string['feedback:view'] = 'Visualizzare un feedback';
$string['feedback:viewanalysepage'] = 'Visualizzare la pagina di analisi dopo l\'invio';
$string['feedback:viewreports'] = 'Visualizzare i report';
$string['file'] = 'File';
$string['filter_by_course'] = 'Filtra per corso';
$string['handling_error'] = 'Si è verificato un errore nella gestione del modulo Feedback';
$string['hide_no_select_option'] = 'Nascondi l\'opzione "Non selezionato"';
$string['horizontal'] = 'orizzontale';
$string['importfromthisfile'] = 'Importa da questo file';
$string['import_questions'] = 'Importa domande';
$string['import_successfully'] = 'Importazione completata';
$string['info'] = 'Informazione';
$string['infotype'] = 'Tipo informazione';
$string['insufficient_responses'] = 'risposte insufficienti';
$string['insufficient_responses_for_this_group'] = 'Questo gruppo ha fornito un numero di risposte insufficienti';
$string['insufficient_responses_help'] = 'Questo gruppo ha fornito un numero di risposte insufficienti.

Per mantenere il questionario anonimo, devono pervenire almeno due risposte.';
$string['item_label'] = 'Etichetta';
$string['item_name'] = 'Testo della domanda';
$string['label'] = 'Etichetta';
$string['line_values'] = 'Valutazione';
$string['mapcourse'] = 'Associa feedback ai corsi';
$string['mapcourse_help'] = 'Per default i feedback creati nella home page del sito sono disponibili in tutti i corsi tramite il blocco feedback. Se desideri evitarlo, puoi rendere il blocco feedback permanente oppure puoi associare il feedback solo a determinati corsi.';
$string['mapcourseinfo'] = 'Questo è un feedback globale,  usando il blocco feedback sarà disponibile in tutti i corsi . E\'  comunque possibile limitare i corsi in cui apparirà il feedback associandoli. Cerca i corsi e associali a questo feedback.';
$string['mapcoursenone'] = 'Nessun corso associato. Il feedback è disponibile per tutti i corsi.';
$string['mapcourses'] = 'Associa feedback ai corsi';
$string['mapcourses_help'] = 'Dopo aver individuato e selezionato i corsi puoi associarli al feedback. Puoi associare più corsi contemporaneamente tenendo premuto il tasto Mela o Ctrl mentre fai click sui nomi dei corsi. E\' anche possibile rimuovere l\'associazione in qualsiasi momento.';
$string['mappedcourses'] = 'Corsi associati';
$string['max_args_exceeded'] = 'Possono essere gestiti al massimo 6 argomenti. Ci sono troppi argomenti per';
$string['maximal'] = 'massimo';
$string['messageprovider:message'] = 'Promemoria feedback';
$string['messageprovider:submission'] = 'Notifiche feedback';
$string['mode'] = 'Modalità';
$string['modulename'] = 'Feedback';
$string['modulename_help'] = 'Il modulo di attività feedback consente al docente di creare sondaggi personalizzati utili per raccogliere i feedback dai partecipanti. E\' possibile usare vari tipi di domande, come ad esempio domande a scelta multipla, sì/no, a risposta libera, eccetera.

Se lo si desidera è possibile rendere anonime le risposte, così come è possibile visualizzare o meno agli studenti i risultati del sondaggio. Le attività feedback presenti sulla home page del sito possono essere configurate per essere compilate anche da utenti non autenticati.

E\' possibile usare il feedback per:

* valutare i corsi, aiutando ad individuare aree di miglioramento per edizioni future
* consentire ai partecipanti di prenotare moduli del corso ed eventi
* ricevere sondaggi su preferenze di corsi e politiche da adottare da parte di utenti non autenticati
* ricavare informazioni in forma anonima su casi di bullismo';
$string['modulenameplural'] = 'Feedback';
$string['movedown_item'] = 'Sposta domanda in basso';
$string['move_here'] = 'Sposta qui';
$string['move_item'] = 'Sposta domanda';
$string['moveup_item'] = 'Sposta domanda in alto';
$string['multichoice'] = 'Scelta multipla';
$string['multichoicerated'] = 'Scelta multipla (valorizzata)';
$string['multichoicetype'] = 'Tipo di scelta';
$string['multichoice_values'] = 'Valori da scegliere';
$string['multiplesubmit'] = 'Compilazioni multiple';
$string['multiplesubmit_help'] = 'Nei feedback anonimi gli utenti potranno compilare il feedback quante volte vorranno.';
$string['name'] = 'Titolo';
$string['name_required'] = 'Il titolo è obbligatorio';
$string['next_page'] = 'Pagina successiva';
$string['no_handler'] = 'Non esiste un "action handler" per';
$string['no_itemlabel'] = 'Senza etichetta';
$string['no_itemname'] = 'Domanda priva di testo';
$string['no_items_available_yet'] = 'Non è stata Nessuna domanda è stata ancora impostata';
$string['non_anonymous'] = 'Il nome del partecipante verrà registrato e visualizzato nelle risposte';
$string['non_anonymous_entries'] = 'non anonime';
$string['non_respondents_students'] = 'studenti che non hanno risposto';
$string['notavailable'] = 'questo feedback non è disponibile';
$string['not_completed_yet'] = 'Non ancora completato';
$string['no_templates_available_yet'] = 'Nessun modello disponibile';
$string['not_selected'] = 'Nessuna scelta';
$string['not_started'] = 'non iniziato';
$string['numeric'] = 'Numerica';
$string['numeric_range_from'] = 'Valori ammessi da';
$string['numeric_range_to'] = 'a';
$string['of'] = 'di';
$string['oldvaluespreserved'] = 'Tutte le vecchie domande e i valori assegnati saranno conservati';
$string['oldvalueswillbedeleted'] = 'Le domande presenti e tutte le risposte degli utenti saranno eliminate';
$string['only_one_captcha_allowed'] = 'E\' possibile inserire un solo captcha per ciascun feedback.';
$string['overview'] = 'Panoramica';
$string['page'] = 'Pagina';
$string['page_after_submit'] = 'Messaggio da visualizzare dopo la compilazione';
$string['pagebreak'] = 'Interruzione di pagina';
$string['page-mod-feedback-x'] = 'Qualsiasi pagina con modulo feedback';
$string['parameters_missing'] = 'Mancano dei parametri da';
$string['picture'] = 'Immagine';
$string['picture_file_list'] = 'Elenco immagini';
$string['picture_values'] = 'Scegli uno o più<br />file immagine dall\'elenco:';
$string['pluginadministration'] = 'Gestione Feedback';
$string['pluginname'] = 'Feedback';
$string['position'] = 'Posizione';
$string['preview'] = 'Anteprima';
$string['preview_help'] = 'Nell\'anteprima è possibile modificare la sequenza delle domande.';
$string['previous_page'] = 'Pagina precedente';
$string['public'] = 'Pubblico';
$string['question'] = 'Domanda';
$string['questionandsubmission'] = 'Impostazioni compilazione';
$string['questions'] = 'Domande';
$string['radio'] = 'Scelta multipla - una sola alternativa';
$string['radiobutton'] = 'Pulsanti radio';
$string['radiobutton_rated'] = 'Pulsante radio (valorizzato)';
$string['radiorated'] = 'Pulsante radio (valorizzato)';
$string['radio_values'] = 'Risposte';
$string['ready_feedbacks'] = 'Feedback disponibili';
$string['relateditemsdeleted'] = 'Saranno eliminate anche tutte le risposte degli utenti a questa domanda';
$string['required'] = 'La risposta è obbligatoria';
$string['resetting_data'] = 'Reset delle risposte del feedback';
$string['resetting_feedbacks'] = 'Reset dei feedback';
$string['response_nr'] = 'Risposta numero';
$string['responses'] = 'Risposte';
$string['responsetime'] = 'Ora delle risposte';
$string['save_as_new_item'] = 'Salva come nuova domanda';
$string['save_as_new_template'] = 'Salva come modello';
$string['save_entries'] = 'Invia le risposte';
$string['save_item'] = 'Salva';
$string['saving_failed'] = 'Il salvataggio non è riuscito';
$string['saving_failed_because_missing_or_false_values'] = 'Il salvataggio non è riuscito a causa di valori mancanti o errati';
$string['search_course'] = 'Cerca corso';
$string['searchcourses'] = 'Cerca corsi';
$string['searchcourses_help'] = 'E\' possibile cercare l\'ID o il nome del corso o dei corsi che intendi associare al feedback.';
$string['selected_dump'] = 'Gli indici selezionati della variabile $SESSION sono visualizzati di seguito:';
$string['send'] = 'invia';
$string['send_message'] = 'invia messaggio';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '.';
$string['show_all'] = 'Visualizza tutto';
$string['show_analysepage_after_submit'] = 'Visualizza la pagina di analisi';
$string['show_entries'] = 'Risposte';
$string['show_entry'] = 'Visualizza risposta';
$string['show_nonrespondents'] = 'Risposte mancanti';
$string['site_after_submit'] = 'Sito da collegare a compilazione terminata';
$string['sort_by_course'] = 'Ordina per corso';
$string['start'] = 'Apertura';
$string['started'] = 'aperto';
$string['stop'] = 'Chiusura';
$string['subject'] = 'Argomento';
$string['switch_group'] = 'Cambia gruppo';
$string['switch_item_to_not_required'] = 'cambia in: risposta facoltativa';
$string['switch_item_to_required'] = 'cambia in: risposta obbligatoria';
$string['template'] = 'Modello';
$string['templates'] = 'Modelli';
$string['template_saved'] = 'Il modello è stato salvato';
$string['textarea'] = 'Risposta lunga';
$string['textarea_height'] = 'Numero righe';
$string['textarea_width'] = 'Caratteri per riga';
$string['textfield'] = 'Risposta breve';
$string['textfield_maxlength'] = 'Numero max. caratteri accettati';
$string['textfield_size'] = 'Larghezza del campo della risposta';
$string['there_are_no_settings_for_recaptcha'] = 'Non ci sono impostazioni per il captcha';
$string['this_feedback_is_already_submitted'] = 'Hai già completato questa attività.';
$string['typemissing'] = 'il "tipo" è mancante';
$string['update_item'] = 'Salva modifiche';
$string['url_for_continue'] = 'Link ad attività successiva';
$string['url_for_continue_help'] = 'Per default al termine della compilazione del feedback il pulsante Continua rimanda alla home page del corso. E\' possibile impostare link ad una attività successiva.';
$string['use_one_line_for_each_value'] = '<br/>E\' necessario utilizzare una riga per ciascun valore';
$string['use_this_template'] = 'Usa questo modello';
$string['using_templates'] = 'Usa un modello';
$string['vertical'] = 'verticale';
$string['viewcompleted'] = 'feedback compilati';
$string['viewcompleted_help'] = 'E\' possibile cercare per corso e/o per domanda e visualizzare i feedback compilati. Le risposte possono essere esportate in Excel.';
