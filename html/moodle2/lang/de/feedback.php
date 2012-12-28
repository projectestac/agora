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
 * Strings for component 'feedback', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Element hinzufügen';
$string['add_items'] = 'Elemente hinzufügen';
$string['add_pagebreak'] = 'Seitenumbruch hinzufügen';
$string['adjustment'] = 'Ausrichtung';
$string['after_submit'] = 'Nach der Abgabe';
$string['allowfullanonymous'] = 'Völlige Anonymität erlauben';
$string['analysis'] = 'Auswertung';
$string['anonymous'] = 'Anonym';
$string['anonymous_edit'] = 'Anonym ausfüllen';
$string['anonymous_entries'] = 'Anonyme Einträge';
$string['anonymous_user'] = 'Anonymer Benutzer';
$string['append_new_items'] = 'Neue Elemente anfügen';
$string['autonumbering'] = 'Automatische Nummerierung';
$string['autonumbering_help'] = 'Diese Option aktiviert die automatische Nummerierung aller Fragen.';
$string['average'] = 'Mittelwert';
$string['bold'] = 'Fett';
$string['cancel_moving'] = 'Bewegen abbrechen';
$string['cannotmapfeedback'] = 'Datenbank-Problem, eine Zuordnung des Feedbacks zum Kurs ist nicht möglich';
$string['cannotsavetempl'] = 'Vorlagen speichern ist nicht gestattet';
$string['cannotunmap'] = 'Datenbank-Problem - Aufhebung der Zuordnung ist nicht möglich';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Captcha wurde nicht gewählt';
$string['check'] = 'Mehrere Antworten';
$string['checkbox'] = 'Mehrere Antworten erlaubt (Checkboxen)';
$string['check_values'] = 'Antworten';
$string['choosefile'] = 'Datei auswählen';
$string['chosen_feedback_response'] = 'Gewählte Feedback-Antwort';
$string['completed'] = 'Ausgefüllt';
$string['completed_feedbacks'] = 'Ausgefüllte Feedbacks';
$string['complete_the_form'] = 'Formular ausfüllen...';
$string['completionsubmit'] = 'Als abgeschlossen ansehen, wenn das Feedback abgegeben wurde';
$string['configallowfullanonymous'] = 'Wenn diese Option aktiviert ist, kann das Feedback ohne eine vorhergehende Anmeldung abgegeben werden. Dies betrifft ausschließlich Feedbacks auf der Startseite.';
$string['confirmdeleteentry'] = 'Möchten Sie wirklich diesen Eintrag löschen?';
$string['confirmdeleteitem'] = 'Möchten Sie dieses Element wirklich löschen?';
$string['confirmdeletetemplate'] = 'Möchten Sie diese Vorlage wirklich löschen?';
$string['confirmusetemplate'] = 'Möchten Sie diese Vorlage wirklich nutzen?';
$string['continue_the_form'] = 'Ausfüllen fortsetzen';
$string['count_of_nums'] = 'Anzahl von Werten';
$string['courseid'] = 'Kurs-ID';
$string['creating_templates'] = 'Vorlagen erstellen';
$string['delete_entry'] = 'Eintrag löschen';
$string['delete_item'] = 'Element löschen';
$string['delete_old_items'] = 'Alte Elemente löschen';
$string['delete_template'] = 'Vorlage löschen';
$string['delete_templates'] = 'Vorlagen löschen...';
$string['depending'] = 'Abhängige Elemente';
$string['depending_help'] = 'Abhängige Elemente erlauben es Ihnen zu zeigen, wie Elemente mit den Werten anderer Elemente zusammenhängen<br /><br />
<strong>Beispiel für abhängige Elemente:</strong>
<ul>
<li>Zuerst legen Sie das Element an, von dem andere Elemente abhängen sollen.</li>
<li>Jetzt fügen Sie einen Seitenumbruch hinzu.</li>
<li>Danach fügen Sie die Elemente hinzu, die von dem vorherigen Elementewert abhängen sollen.<br />
Wählen Sie bei der Erstellung das Format "Abhängiges Element" und setzen Sie den notwendigen Wert auf "Abhängiger Wert"</li>
</ul>
<strong>Die Struktur sollte folgendermaßen aussehen:</strong>
<ol>
<li>Element - Frage: Haben Sie ein Auto? Antwort: ja/nein</li>
<li>Seitenumbruch</li>
<li>Element - Frage: Welche Farbe hat Ihr Auto?<br />
(Dieses Element bezieht sich auf den Wert \'ja\' des Elements 1)</li>
<li>Element - Frage: Warum haben Sie kein Auto?<br />
(Dieses Element bezieht sich auf den Wert \'nein\' des Elements 1)</li>
<li> ... weitere Elemente</li>
</ol>
Das war schon alles. Viel Erfolg!';
$string['dependitem'] = 'Abhängiges Element';
$string['dependvalue'] = 'Abhängiger Wert';
$string['description'] = 'Beschreibung';
$string['do_not_analyse_empty_submits'] = 'Leere Abgaben nicht berücksichtigen';
$string['dropdown'] = 'Einzelne Antwort - Dropdown';
$string['dropdownlist'] = 'Einzelne Antwort - Dropdown';
$string['dropdownrated'] = 'Dropdown (skaliert)';
$string['dropdown_values'] = 'Antworten';
$string['drop_feedback'] = 'Aus diesem Kurs entfernen';
$string['edit_item'] = 'Element bearbeiten';
$string['edit_items'] = 'Elemente bearbeiten';
$string['emailnotification'] = 'E-Mail-Mitteilungen';
$string['email_notification'] = 'E-Mail-Mitteilungen senden';
$string['emailnotification_help'] = 'Wenn diese Option aktiviert ist, bekommen die Admins eine E-Mail-Mitteilung der Feedback-Abgaben.';
$string['emailteachermail'] = '{$a->username} hat das Feedback \'{$a->feedback}\' abgeschlossen.

Sie können es hier anschauen:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} hat das Feedback \'{$a->feedback}\' abgeschlossen<br /><br />
Sie können es <a href="{$a->url}">auf der Webseite</a> anschauen.';
$string['entries_saved'] = 'Einträge wurden gespeichert';
$string['export_questions'] = 'Fragen exportieren';
$string['export_to_excel'] = 'Nach Excel exportieren';
$string['feedback:addinstance'] = 'Neues Feedback hinzufügen';
$string['feedbackclose'] = 'Feedback beenden ab';
$string['feedbackcloses'] = 'Feedback beenden ab';
$string['feedback:complete'] = 'Ausfüllen eines Feedbacks';
$string['feedback:createprivatetemplate'] = 'Erstellen eines kursinternen Templates';
$string['feedback:createpublictemplate'] = 'Erstellen eines öffentlichten Templates';
$string['feedback:deletesubmissions'] = 'Vollständige Einträge löschen';
$string['feedback:deletetemplate'] = 'Templates löschen';
$string['feedback:edititems'] = 'Fragen bearbeiten';
$string['feedback_is_not_for_anonymous'] = 'Feedback ist für anonyme Teilnehmer nicht möglich';
$string['feedback_is_not_open'] = 'Feedback ist zu diesem Zeitpunkt nicht möglich';
$string['feedback:mapcourse'] = 'Kurse globalen Feedbacks zuordnen';
$string['feedbackopen'] = 'Feedback erlauben ab';
$string['feedbackopens'] = 'Feedback erlauben ab';
$string['feedback_options'] = 'Feedback-Einstellungen';
$string['feedback:receivemail'] = 'E-Mail-Mitteilung empfangen';
$string['feedback:view'] = 'Feedback anzeigen';
$string['feedback:viewanalysepage'] = 'Analyseseite nach der Abgabe anzeigen';
$string['feedback:viewreports'] = 'Auswertungen anzeigen';
$string['file'] = 'Datei';
$string['filter_by_course'] = 'Kursfilter';
$string['handling_error'] = 'Fehler beim Module-Action-Handling';
$string['hide_no_select_option'] = 'Option \'Nicht ausgewählt\' verbergen';
$string['horizontal'] = 'nebeneinander';
$string['importfromthisfile'] = 'Von ausgewählter Datei importieren';
$string['import_questions'] = 'Fragen importieren';
$string['import_successfully'] = 'Erfolgreich importiert';
$string['info'] = 'Information';
$string['infotype'] = 'Informationstyp';
$string['insufficient_responses'] = 'Unzulängliche Antworten';
$string['insufficient_responses_for_this_group'] = 'Es gibt unzulängliche Antworten für diese Gruppe';
$string['insufficient_responses_help'] = 'Es gibt unzulängliche Antworten für diese Gruppe.

Um das Feedback anonym zu halten, müssen mindestens zwei Antworten abgegeben werden.';
$string['item_label'] = 'Beschriftung';
$string['item_name'] = 'Name des Elementes';
$string['items_are_required'] = 'Elemente sind erforderlich';
$string['label'] = 'Textfeld';
$string['line_values'] = 'Werte';
$string['mapcourse'] = 'Kurs zuordnen';
$string['mapcourse_help'] = 'Standardmäßig sind Feedbacks, die Sie auf Ihrer Startseite erstellt haben, auf der gesamten Website verfügbar und werden über den Block Feedback in allen Kursen auftauchen.

Sie können das Erscheinen in jedem Kurs erzwingen, indem Sie einen festen Block erzeugen. Andererseits können Sie das Feedback auf ausgewählte Kurse einschränken, indem Sie das Feedback mit bestimmten Kursen verknüpfen.';
$string['mapcourseinfo'] = 'Dies ist ein globales Feedback. Es ist in allen Kursen verfügbar, die den Feedback-Block nutzen. Die Kurse in denen das Feedback erscheinen sollen, können begrenzt werden durch explizites Zuordnen. Dazu muss der Kurs gesucht und diesem Feedback zugeordnet werden.';
$string['mapcoursenone'] = 'Keinem Kurs zugeordnet. Dieses Feedback ist in allen Kursen verfügbar';
$string['mapcourses'] = 'Diesem Feedback Kurse zuordnen';
$string['mapcourses_help'] = 'Sobald Sie relevante Kurse ausgewählt haben, können Sie diese einem Feedback zuordnen. Mehrere Kurse können ausgewählt werden, indem Sie die Taste Crtl bzw. Cmd während der Mausauswahl drücken. Ein Kurs kann jederzeit wieder von einem Feedback gelöst werden.';
$string['mappedcourses'] = 'Zugeordnete Kurse';
$string['max_args_exceeded'] = 'Zu viele Argumente! Max. 6 Argumente dürfen verwendet werden.';
$string['maximal'] = 'Maximal';
$string['messageprovider:message'] = 'Feedback-Erinnerung';
$string['messageprovider:submission'] = 'Feedback-Mitteilung';
$string['mode'] = 'Modus';
$string['modulename'] = 'Feedback';
$string['modulename_help'] = 'Mit dem Feedback-Modul können Sie eigene Umfragen oder Evaluationsformulare anlegen, wofür Ihnen eine Reihe von Fragetypen zur Verfügung stehen.

Die Antworten können Personen zugeordnet oder anonym erfolgen. Zeigen Sie den Teilnehmer/innen die Ergebnisse und/oder exportieren Sie die Daten später.

Legen Sie Feedback-Fragebögen zentral an und setzen Sie sie in ausgewählten Kursen ein.';
$string['modulenameplural'] = 'Feedbacks';
$string['movedown_item'] = 'Element nach unten verschieben';
$string['move_here'] = 'Hierhin verschieben';
$string['move_item'] = 'Element verschieben';
$string['moveup_item'] = 'Element nach oben verschieben';
$string['multichoice'] = 'Multiple-Choice';
$string['multichoicerated'] = 'Multiple-Choice (skaliert)';
$string['multichoicetype'] = 'Typ';
$string['multichoice_values'] = 'Antworten';
$string['multiplesubmit'] = 'Mehrfache Abgabe';
$string['multiple_submit'] = 'Mehrfache Abgabe';
$string['multiplesubmit_help'] = 'Wenn diese Option für anonyme Auswertungen aktiviert ist, dürfen Teilnehmer/innen das Feedback beliebig oft abgeben.';
$string['name'] = 'Name';
$string['name_required'] = 'Name benötigt';
$string['next_page'] = 'Nächste Seite';
$string['no_handler'] = 'Keine Aktion gefunden!';
$string['no_itemlabel'] = 'Keine Beschriftung';
$string['no_itemname'] = 'Keine Bezeichnung des Eintrags';
$string['no_items_available_yet'] = 'Noch keine Elemente definiert';
$string['non_anonymous'] = 'Nicht anonym';
$string['non_anonymous_entries'] = 'Nicht-anonyme Einträge';
$string['non_respondents_students'] = 'Teilnehmer/innen ohne Antwort';
$string['notavailable'] = 'dieses Feedback ist nicht verfügbar.';
$string['not_completed_yet'] = 'Noch nicht ausgefüllt';
$string['no_templates_available_yet'] = 'Noch keine Vorlagen definiert';
$string['not_selected'] = 'Nicht ausgewählt';
$string['not_started'] = 'Nicht begonnen';
$string['numeric'] = 'Numerische Antwort';
$string['numeric_range_from'] = 'Bereich von';
$string['numeric_range_to'] = 'Bereich bis';
$string['of'] = 'von';
$string['oldvaluespreserved'] = 'Alle alten Fragen und eingegebenen Werte werden aufbewahrt';
$string['oldvalueswillbedeleted'] = 'Die aktuelle Frage und alle Nutzerantworten werden gelöscht';
$string['only_one_captcha_allowed'] = 'Im Feedback ist nur ein Captcha erlaubt';
$string['overview'] = 'Überblick';
$string['page'] = 'Seite';
$string['page_after_submit'] = 'Seite nach dem Absenden';
$string['pagebreak'] = 'Seitenumbruch';
$string['page-mod-feedback-x'] = 'Jede Feedback-Seite';
$string['parameters_missing'] = 'Fehlende Parameter';
$string['picture'] = 'Bildauswahl';
$string['picture_file_list'] = 'Liste der Bilder';
$string['picture_values'] = 'Wählen Sie ein oder mehrere<br />Bilddateien aus der Liste:';
$string['pluginadministration'] = 'Feedback-Administration';
$string['pluginname'] = 'Feedback';
$string['position'] = 'Position';
$string['preview'] = 'Vorschau';
$string['preview_help'] = 'In der Vorschau können Sie die Reihenfolge der Fragen ändern.';
$string['previous_page'] = 'Vorherige Seite';
$string['public'] = 'öffentlich';
$string['question'] = 'Frage';
$string['questions'] = 'Fragen';
$string['radio'] = 'Einzelne Antwort - Radiobutton';
$string['radiobutton'] = 'Einzelne Antwort - Radiobutton';
$string['radiobutton_rated'] = 'Radiobutton (skaliert)';
$string['radiorated'] = 'Radiobutton (skaliert)';
$string['radio_values'] = 'Antworten';
$string['ready_feedbacks'] = 'Fertige Feedbacks';
$string['relateditemsdeleted'] = 'Alle Nutzerantworten für diese Frage werden gelöscht';
$string['required'] = 'Erforderlich';
$string['resetting_data'] = 'Feedback-Antworten zurücksetzen';
$string['resetting_feedbacks'] = 'Feedbacks werden zurückgesetzt';
$string['response_nr'] = 'Antwort Nr.';
$string['responses'] = 'Antworten';
$string['responsetime'] = 'Antwortzeit';
$string['save_as_new_item'] = 'Als neue Frage speichern';
$string['save_as_new_template'] = 'Als neue Vorlage speichern';
$string['save_entries'] = 'Einträge speichern';
$string['save_item'] = 'Element speichern';
$string['saving_failed'] = 'Fehler beim Speichern';
$string['saving_failed_because_missing_or_false_values'] = 'Fehler beim Speichern, da notwendige Felder nicht oder falsch ausgefüllt wurden';
$string['search_course'] = 'Kurs suchen';
$string['searchcourses'] = 'Kurse suchen';
$string['searchcourses_help'] = 'Nach Codes oder Namen von Kursen suchen, die Sie diesem Feedback zuordnen möchten';
$string['selected_dump'] = 'Dump der ausgewählten Indexe der Variable $SESSION:';
$string['send'] = 'Senden';
$string['send_message'] = 'Nachricht senden';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '.';
$string['show_all'] = 'Alle anzeigen';
$string['show_analysepage_after_submit'] = 'Analyseseite nach der Abgabe anzeigen';
$string['show_entries'] = 'Einträge anzeigen';
$string['show_entry'] = 'Eintrag anzeigen';
$string['show_nonrespondents'] = 'Ohne Antwort';
$string['site_after_submit'] = 'Seite nach Eingabe';
$string['sort_by_course'] = 'Sortiert nach Kursen';
$string['start'] = 'Start';
$string['started'] = 'gestartet';
$string['stop'] = 'Ende';
$string['subject'] = 'Thema';
$string['switch_group'] = 'Gruppe wechseln';
$string['switch_item_to_not_required'] = 'Wechseln zu: Eintrag nicht erforderlich';
$string['switch_item_to_required'] = 'Wechseln zu: Eintrag erforderlich';
$string['template'] = 'Vorlage';
$string['templates'] = 'Vorlagen';
$string['template_saved'] = 'Vorlage gespeichert';
$string['textarea'] = 'Eingabebereich';
$string['textarea_height'] = 'Anzahl der Zeilen';
$string['textarea_width'] = 'Breite des Textbereiches';
$string['textfield'] = 'Eingabezeile';
$string['textfield_maxlength'] = 'Maximale Zeichenzahl';
$string['textfield_size'] = 'Breite des Textfeldes';
$string['there_are_no_settings_for_recaptcha'] = 'Keine Einstellungen für das Captcha';
$string['this_feedback_is_already_submitted'] = 'Sie haben diese Aktivität bereits beendet.';
$string['timeclose'] = 'Verfügbar bis';
$string['timeclose_help'] = 'Sie können einen Zeitraum festlegen, in dem das Feedback zur Beantwortung der Fragen verfügbar sein soll. Wenn die Option nicht aktiviert ist, dann gibt es keine zeitlichen Beschränkungen.';
$string['timeopen'] = 'Verfügbar von';
$string['timeopen_help'] = 'Sie können einen Zeitraum festlegen, in dem das Feedback zur Beantwortung der Fragen verfügbar sein soll. Wenn die Option nicht aktiviert ist, dann gibt es keine zeitlichen Beschränkungen.';
$string['typemissing'] = 'Fehlender Wert "type"';
$string['update_item'] = 'Element aktualisieren';
$string['url_for_continue'] = 'URL für den Knopf "Weiter"';
$string['url_for_continue_button'] = 'URL für den Knopf "Weiter"';
$string['url_for_continue_help'] = 'Nach der Abgabe des Feedbacks wird ein Knopf "Weiter" gezeigt. Standardmäßig ist die Kursseite als Ziel eingestellt. Falls Sie auf eine andere URL verlinken möchten, so können Sie hier das Ziel dafür angeben.';
$string['use_one_line_for_each_value'] = '<br />Benutzen Sie für jeden Wert eine neue Zeile!';
$string['use_this_template'] = 'Diese Vorlage verwenden';
$string['using_templates'] = 'Vorlagen verwenden';
$string['vertical'] = 'untereinander';
$string['viewcompleted'] = 'Abgeschlossene Feedbacks';
$string['viewcompleted_help'] = 'Sie können sich abgeschlossene Feedbacks anschauen, durchsuchbar nach Kurs und/oder nach Frage. Die Feedback-Antworten können als Tabelle exportiert werden.';
