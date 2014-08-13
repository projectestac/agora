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
 * Strings for component 'feedback', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Voeg een vraag toe';
$string['add_pagebreak'] = 'Voeg een paginascheiding in';
$string['adjustment'] = 'Aanpassing';
$string['after_submit'] = 'Na inzenden';
$string['allowfullanonymous'] = 'Volledig anoniem toestaan';
$string['analysis'] = 'Analyse';
$string['anonymous'] = 'Anoniem';
$string['anonymous_edit'] = 'Gebruikersnamen bijhouden';
$string['anonymous_entries'] = 'Anoniem ingevuld';
$string['anonymous_user'] = 'Anonieme gebruiker';
$string['append_new_items'] = 'Nieuwe items toevoegen';
$string['autonumbering'] = 'Nummer vragen automatisch';
$string['autonumbering_help'] = 'Automatisch nummeren van vragen inschakelen of uitschakelen';
$string['average'] = 'Gemiddelde';
$string['bold'] = 'Vet';
$string['cancel_moving'] = 'Annuleer verplaatsen';
$string['cannotmapfeedback'] = 'Databankprobleem, kan feedback niet aan cursus koppelen';
$string['cannotsavetempl'] = 'bewaren van sjablonen is niet toegelaten';
$string['cannotunmap'] = 'Databankprobleem: unmap niet mogelijk';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Captcha is niet ingesteld';
$string['check'] = 'Meerkeuze - meerdere antwoorden';
$string['checkbox'] = 'Checkbox';
$string['check_values'] = 'Checkbox-waarden';
$string['choosefile'] = 'Kies een bestand';
$string['chosen_feedback_response'] = 'Gekozen feedback-antwoord';
$string['completed'] = 'voltooid';
$string['completed_feedbacks'] = 'Ingevulde antwoorden';
$string['complete_the_form'] = 'Beantwoord de vragen...';
$string['completionsubmit'] = 'Bekijk als voltooid als de feedback verstuurd is';
$string['configallowfullanonymous'] = 'Als deze optie op ja staat, dan kan de feedback ingevuld worden zonder aanmelding.';
$string['confirmdeleteentry'] = 'Ben je zeker dat je dit wil verwijderen?';
$string['confirmdeleteitem'] = 'Ben je zeker dat je dit element wil verwijderen?';
$string['confirmdeletetemplate'] = 'Ben je zeker dat je dit sjabloon wil verwijderen?';
$string['confirmusetemplate'] = 'Ben je zeker dat je dit sjabloon wil gebruiken?';
$string['continue_the_form'] = 'Ga verder met dit formulier';
$string['count_of_nums'] = 'Aantal';
$string['courseid'] = 'cursus ID';
$string['creating_templates'] = 'Bewaar deze vragen als een nieuw sjabloon';
$string['delete_entry'] = 'Invoer wissen';
$string['delete_item'] = 'Vraag wissen';
$string['delete_old_items'] = 'Verwijder oude items';
$string['delete_template'] = 'Sjabloon wissen';
$string['delete_templates'] = 'Sjablonen wissen...';
$string['depending'] = 'Afhankelijke vragen';
$string['depending_help'] = 'Met afhankelijke vragen kun je vragen tonen die afhankelijk zijn van antwoorden op andere vragen.

Een voorbeeld om te tonen hoe het werkt:
* Maak een vraag waarvan andere vragen zullen afhankelijk zijn.
* Voeg een paginascheiding toe.
* Voeg dan de vragen toe die afhankelijk zijn van het antwoord op de vorige vraag.
Kies in het formulier waarmee je de vraag maakt de vraag in de lijst "afhankelijke vraag" en zet de benodigde waarde in het tekstvak "afhankelijke waarde".

De structuur zou er dan als volgt moeten uitzien:
* Vraag 1: Heb je een auto? Ja/Nee
* Paginascheiding
* Vraag 2: Welke kleur heeft jouw auto? (deze vraag hangt af van vraag 1 met antwoord=Ja)
* Vraag 3: Waarom heb je geen auto? (deze vraag hangt af van vraag 1 met antwoord=Nee)
* ... andere vragen';
$string['dependitem'] = 'Hangt af van vraag';
$string['dependvalue'] = 'Hangt af van waarde';
$string['description'] = 'Beschrijving';
$string['do_not_analyse_empty_submits'] = 'Analyseer geen lege inzendingen';
$string['dropdown'] = 'Meerkeuzevraag - één antwoord toegelaten (rolmenu)';
$string['dropdownlist'] = 'Meerkeuzevraag - één antwoord (rolmenu)';
$string['dropdownrated'] = 'Rolmenu (beoordeling)';
$string['dropdown_values'] = 'Antwoorden';
$string['drop_feedback'] = 'Verwijder uit deze cursus';
$string['edit_item'] = 'Bewerk vraag';
$string['edit_items'] = 'Bewerk vragen...';
$string['email_notification'] = 'Stuur e-mailnotificaties voor inzendingen';
$string['email_notification_help'] = 'Indien ingeschakeld krijgen leraars een melding via wanneer er een formulier is ingestuurd.';
$string['emailteachermail'] = '{$a->username} heeft het feedbackformulier \'{$a->feedback}\' ingevuld en opgestuurd.

Je kunt het hier bekijken:

{$a->url}';
$string['emailteachermailhtml'] = '<p>{$a->username} heeft het feedbackformulier <i>\'{$a->feedback}\'</i> ingevuld en opgestuurd.</p><p>
Je kunt het <a href="{$a->url}">hier</a> bekijken.<p>';
$string['entries_saved'] = 'Je antwoorden zijn bewaard.';
$string['eventcoursemoduleviewed'] = 'Cursusmodule bekeken';
$string['eventinstanceslistviewed'] = 'Instantielijst bekeken';
$string['eventresponsedeleted'] = 'Antwoord verwijderd';
$string['eventresponsesubmitted'] = 'Antwoord ingestuurd';
$string['export_questions'] = 'Exporteer vragen';
$string['export_to_excel'] = 'Exporteren naar Excel';
$string['feedback:addinstance'] = 'Voeg een nieuwe feedback toe';
$string['feedbackclose'] = 'Antwoorden toestaan tot';
$string['feedback:complete'] = 'Feedback invullen';
$string['feedback:createprivatetemplate'] = 'Maak een privé sjabloon';
$string['feedback:createpublictemplate'] = 'Maak een publiek sjabloon';
$string['feedback:deletesubmissions'] = 'Verwijder ingevulde inzendingen';
$string['feedback:deletetemplate'] = 'Verwijder sjabloon';
$string['feedback:edititems'] = 'Bewerk items';
$string['feedback_is_not_for_anonymous'] = 'feedback is niet anoniem';
$string['feedback_is_not_open'] = 'De feedback is niet open';
$string['feedback:mapcourse'] = 'Koppel cursussen aan globale feedbacks';
$string['feedbackopen'] = 'Antwoorden toestaan van';
$string['feedback:receivemail'] = 'E-mailnotifivatie ontvangen';
$string['feedback:view'] = 'Feedback bekijken';
$string['feedback:viewanalysepage'] = 'Bekijk de analysepagina na insturen';
$string['feedback:viewreports'] = 'Rapporten bekijken';
$string['file'] = 'Bestand';
$string['filter_by_course'] = 'Filter op cursus';
$string['handling_error'] = 'Er is een fout opgetreden bij de verwerking door de feedback';
$string['hide_no_select_option'] = 'Verberg de "Niets gekozen"-optie';
$string['horizontal'] = 'horizontaal';
$string['importfromthisfile'] = 'Importeer van dit bestand';
$string['import_questions'] = 'Importeer vragen';
$string['import_successfully'] = 'Import gelukt';
$string['info'] = 'Informatie';
$string['infotype'] = 'Informatietype';
$string['insufficient_responses'] = 'Onvoldoende antwoorden';
$string['insufficient_responses_for_this_group'] = 'Er zijn onvoldoende antwoorden voor deze groep';
$string['insufficient_responses_help'] = 'Er zijn onvoldoende antwoorden voor deze groep.

Om feedback anoniem te houden, moeten er minimaal 2 antwoorden gegeven zijn.';
$string['item_label'] = 'Label';
$string['item_name'] = 'Vraag';
$string['label'] = 'Label';
$string['line_values'] = 'Beoordeling';
$string['mapcourse'] = 'Koppel feedback aan cursussen';
$string['mapcourse_help'] = 'Standaard zijn feedback formulieren die op je startpagina gemaakt worden beschikbaar voor heel de site en zullen verschijnen in alle cursussen wanneer je het feedbackblok gebruikt. Je kunt het feedbackformulier vastzetten door er een permanent blok van te maken of het aantal cursussen waarin het blok verschijnt limiteren door het te koppelen aan specifieke cursussen.';
$string['mapcourseinfo'] = 'Dit is een feedback die beschikbaar is voor alle cursussen van de hele site die het feedback blok gebruiken. Je kunt echter de cursussen waar de feedback zal verschijnen beperken door ze te koppelen. Zoek de cursus en koppel die aan deze feedback.';
$string['mapcoursenone'] = 'Er zijn geen cursussen gekoppeld. De feedback staat open voor alle cursussen';
$string['mapcourses'] = 'Koppel feedback aan cursussen';
$string['mapcourses_help'] = 'Als je de relevante cursus(sen) geselecteerd hebt uit je zoekopdracht, dan kun je ze associëren met dit feedbackformulier door cursus koppelen te gebruiken. Meerdere cursussen kunnen geselecteerd worden door de Apple of Ctrl toets ingedrukt te houden tijdens het klikken op de cursusnamen. Een cursus kan ook op elk moment terug losgekoppeld worden van een feedbackformulier.';
$string['mappedcourses'] = 'Gekoppelde cursussen';
$string['max_args_exceeded'] = 'Maximaal 6 argumenten kunnen verwerkt worden, te veel argumenten voor';
$string['maximal'] = 'maximaal';
$string['messageprovider:message'] = 'Feedback herinnering';
$string['messageprovider:submission'] = 'Feedback meldingen';
$string['mode'] = 'Modus';
$string['modulename'] = 'Feedbackformulier';
$string['modulename_help'] = 'Met de feedback module kan een leraar enquêtes maken om feedback van leerlingen te krijgen. Hiervoor staan verschillende vraagtypes ter beschikking, zoals meerkeuze, ja/nee of invoer van tekst.

De antwoorden kunnen anoniem zijn indien gewenst en de resultaten kunnen al dan niet aan de deelnemers getoond worden. Feedbackformulieren op de startpagina van de site, kunnen eventueel ingevuld worden door niet-aangemelde gebruikers.

Feedback kan gebruikt worden

* voor cursus-evaluatie, om zo de cursus te verbeteren voor latere deelnemers
* om deelnemer te laten intekenen voor cursusmodules, activiteiten enz.
* voor onderzoek naar cursuskeuze, schoolbeleid enz.
* voor anti-pest onderzoek waar leerlingen anoniem incidenten kunnen rapporteren.';
$string['modulenameplural'] = 'Feedbackformulieren';
$string['movedown_item'] = 'Verplaats deze vraag omlaag';
$string['move_here'] = 'Verplaats naar hier';
$string['move_item'] = 'Verplaats deze vraag';
$string['moveup_item'] = 'Verplaats deze vraag omhoog';
$string['multichoice'] = 'Meerkeuze';
$string['multichoicerated'] = 'Meerkeuze (beoordeling)';
$string['multichoicetype'] = 'Meerkeuze type';
$string['multichoice_values'] = 'Meerkeuzewaarden';
$string['multiplesubmit'] = 'Meerdere inzendingen toestaan';
$string['multiplesubmit_help'] = 'Indien er gekozen is voor anonieme onderzoeken, dan kunnen gebruikers een onbeperkt aantal keer het formulier insturen';
$string['name'] = 'Naam';
$string['name_required'] = 'Naam verplicht';
$string['next_page'] = 'Volgende pagina';
$string['no_handler'] = 'Er is geen actionhandler voor';
$string['no_itemlabel'] = 'Geen label';
$string['no_itemname'] = 'Geen itemnaam';
$string['no_items_available_yet'] = 'Er zijn nog geen vragen toegevoegd';
$string['non_anonymous'] = 'De gebruikersnamen zullen bewaard worden en samen met de antwoorden getoond worden';
$string['non_anonymous_entries'] = 'niet-anonieme items';
$string['non_respondents_students'] = 'leerlingen die niet insturen';
$string['notavailable'] = 'deze feedback is niet beschikbaar';
$string['not_completed_yet'] = 'Nog niet ingevuld';
$string['no_templates_available_yet'] = 'Nog geen sjablonen beschikbaar';
$string['not_selected'] = 'Niet geselecteerd';
$string['not_started'] = 'niet begonnen';
$string['numeric'] = 'Numeriek antwoord';
$string['numeric_range_from'] = 'Bereik van';
$string['numeric_range_to'] = 'Bereik tot';
$string['of'] = 'van';
$string['oldvaluespreserved'] = 'Alle oude vragen en antwoorden zullen bewaard worden';
$string['oldvalueswillbedeleted'] = 'De huidige vragen en alle antwoorden van je gebruikers zullen verwijderd worden';
$string['only_one_captcha_allowed'] = 'Slechts één captcha is toegelaten in een feedback';
$string['overview'] = 'Overzicht';
$string['page'] = 'Pagina';
$string['page_after_submit'] = 'Bericht na voltooien';
$string['pagebreak'] = 'Paginascheiding';
$string['page-mod-feedback-x'] = 'Elke feedback modulepagina';
$string['parameters_missing'] = 'Parameters ontbreken van';
$string['picture'] = 'Afbeelding';
$string['picture_file_list'] = 'Lijst met afbeeldingen';
$string['picture_values'] = 'Kies één of meer<br />afbeeldingen uit de lijst:';
$string['pluginadministration'] = 'Feedback beheer';
$string['pluginname'] = 'Feedbackformulier';
$string['position'] = 'Positie';
$string['preview'] = 'Voorbeeld';
$string['preview_help'] = 'In het voorbeeld kun je de volgorde van de vragen wijzigen';
$string['previous_page'] = 'Vorige pagina';
$string['public'] = 'Publiek';
$string['question'] = 'Vraag';
$string['questionandsubmission'] = 'Vraag- en instuuropties';
$string['questions'] = 'Vragen';
$string['radio'] = 'Meerkeuzevraag - één antwoord';
$string['radiobutton'] = 'Meerkeuze - één antwoord toegelten (radiobutton)';
$string['radiobutton_rated'] = 'Radiobutton (beoordeeld)';
$string['radiorated'] = 'Radiobutton (beoordeeld)';
$string['radio_values'] = 'Antwoorden';
$string['ready_feedbacks'] = 'Ingevulde feedbackformulieren';
$string['relateditemsdeleted'] = 'Alle antwoorden van je gebruikers voor deze vraag zullen ook verwijderd worden';
$string['required'] = 'Verplicht';
$string['resetting_data'] = 'Verwijder alle antwoorden';
$string['resetting_feedbacks'] = 'Feedback naar standaardinstellingen';
$string['response_nr'] = 'Antwoordnummer';
$string['responses'] = 'Antwoorden';
$string['responsetime'] = 'Antwoordtijd';
$string['save_as_new_item'] = 'Bewaar als nieuwe vraag';
$string['save_as_new_template'] = 'Opslaan als nieuw sjabloon';
$string['save_entries'] = 'Verzend je antwoorden';
$string['save_item'] = 'Bewaar vraag';
$string['saving_failed'] = 'Opslaan mislukt';
$string['saving_failed_because_missing_or_false_values'] = 'Bewaren mislukt omdat er ontbrekende of verkeerde waarden zijn';
$string['search_course'] = 'Zoek cursus';
$string['searchcourses'] = 'Zoek cursussen';
$string['searchcourses_help'] = 'Zoek de code of naam van de cursus(sen) die je wil associëren met dit feedbackformulier.';
$string['selected_dump'] = 'De geselecteerde indexen van $SESSION variable staan hier gedumpt:';
$string['send'] = 'stuur';
$string['send_message'] = 'stuur bericht';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '.';
$string['show_all'] = 'Toon alle';
$string['show_analysepage_after_submit'] = 'Toon analysepagina';
$string['show_entries'] = 'Toon antwoorden';
$string['show_entry'] = 'Toon antwoord';
$string['show_nonrespondents'] = 'Niet geantwoord';
$string['site_after_submit'] = 'Site na insturen';
$string['sort_by_course'] = 'Sorteer op cursus';
$string['start'] = 'Start';
$string['started'] = 'gestart';
$string['stop'] = 'Einde';
$string['subject'] = 'Onderwerp';
$string['switch_group'] = 'Verander groep';
$string['switch_item_to_not_required'] = 'verander in: antwoord niet verplicht';
$string['switch_item_to_required'] = 'verander in: antwoord verplicht';
$string['template'] = 'Sjabloon';
$string['templates'] = 'Sjablonen';
$string['template_saved'] = 'Sjabloon bewaard';
$string['textarea'] = 'Langer tekstantwoord';
$string['textarea_height'] = 'Aantal regels';
$string['textarea_width'] = 'Breedte';
$string['textfield'] = 'Kort tekstantwoord';
$string['textfield_maxlength'] = 'Maximale aantal tekens';
$string['textfield_size'] = 'Breedte tekstveld';
$string['there_are_no_settings_for_recaptcha'] = 'Er zijn geen instellingen voor captcha';
$string['this_feedback_is_already_submitted'] = 'Je hebt dit feedbackformulier is al ingestuurd.';
$string['typemissing'] = 'ontbrekende waarde "type"';
$string['update_item'] = 'Bewaar de wijzigingen';
$string['url_for_continue'] = 'Link naar volgende activiteit';
$string['url_for_continue_help'] = 'Nadat eeen feedback is ingestuurd wordt standaard de cursuspagina getoond. Je kunt hier een andere doel-URL opgeven voor deze ga verder knop';
$string['use_one_line_for_each_value'] = '<br />Gebruik één regel per antwoord';
$string['use_this_template'] = 'Gebruik dit sjabloon';
$string['using_templates'] = 'Gebruik een sjabloon';
$string['vertical'] = 'verticaal';
$string['viewcompleted'] = 'voltooide feedbacks';
$string['viewcompleted_help'] = 'Je kunt voltooide feedbackformulieren zien, je kunt er in zoeken per cursus of per vraag. De antwoorden kunnen geëxporteerd worden naar een Excel-bestand.';
