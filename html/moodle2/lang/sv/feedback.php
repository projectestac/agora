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
 * Strings for component 'feedback', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Lägg till komponent';
$string['add_pagebreak'] = 'Lägg till en sidbrytning';
$string['adjustment'] = 'Modifiering';
$string['after_submit'] = 'Efter inskickning';
$string['allowfullanonymous'] = 'Tillåt full anonymitet';
$string['analysis'] = 'Analys';
$string['anonymous'] = 'Anonym';
$string['anonymous_edit'] = 'Anonym redigering';
$string['anonymous_entries'] = 'Anonyma inlägg';
$string['anonymous_user'] = 'Anonym användare';
$string['append_new_items'] = 'Lägg till nya komponenter';
$string['autonumbering'] = 'Automatiska tal';
$string['autonumbering_help'] = 'Aktiverar eller avaktiverar automatiska tal för varje fråga';
$string['average'] = 'Medel';
$string['bold'] = 'Fet';
$string['cancel_moving'] = 'Avbryt flytt';
$string['cannotmapfeedback'] = 'Problem med databas, det går inte att "mappa" Egen enkät till kurs';
$string['cannotsavetempl'] = 'det är inte tillåtet att spara mallar';
$string['cannotunmap'] = 'Problem med databasen, det går inte att gör om kartläggning';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Captcha är inte inställt';
$string['check'] = 'Flervalsfrågor - flera svar';
$string['checkbox'] = 'Kryssruta';
$string['check_values'] = 'Kryssruta - fyll i alternativ att välja bland';
$string['choosefile'] = 'Välj en fil';
$string['chosen_feedback_response'] = 'valt svar för Egen enkät';
$string['completed'] = 'Ifyllt';
$string['completed_feedbacks'] = 'Fullgjorda Egna enkäter';
$string['complete_the_form'] = 'Fyll i hela formuläret';
$string['completionsubmit'] = 'Visa som fullföljd om Egen enkät är inskickad/bekräftad/fullföljd';
$string['configallowfullanonymous'] = 'Om det här alternativet är inställt till \'ja\' så går det att fullfölja Egen enkät utan att först logga in. Det påverkar bara förekomster av Egen enkät på ingångssidan.';
$string['confirmdeleteentry'] = 'Är Du säker på att Du vill ta bort det här bidraget?';
$string['confirmdeleteitem'] = 'Är Du säker på att Du vill ta bort den här komponenten?';
$string['confirmdeletetemplate'] = 'Är Du säker på att Du vill ta bort den här mallen?';
$string['confirmusetemplate'] = 'Är Du säker på att Du vill använda den här mallen?';
$string['continue_the_form'] = 'Fortsätt formuläret';
$string['count_of_nums'] = 'Räkning av tal';
$string['courseid'] = 'kursID';
$string['creating_templates'] = 'skapar mallar';
$string['delete_entry'] = 'Ta bort inlägg';
$string['delete_item'] = 'Ta bort komponent';
$string['delete_old_items'] = 'Ta bort gamla komponenter';
$string['delete_template'] = 'Ta bort mall';
$string['delete_templates'] = 'Ta bort mallar...';
$string['depending'] = 'beroende komponenter';
$string['depending_help'] = 'Möjligheten att använda "beroende komponenter" tillåter Dig att visa olika komponenter eller vissa komponenter på olika sätt, detta beroende på andra, föregående, komponenters värden. <br /><strong)Här finns ett ett exempel på hur man kan använda detta:</strong><br /><ul><li>Börja med att skapa en komponent med värden som andra, efterföljande komponenter är beroende av.</li><li>Lägg sedan till en sidbrytning.</li><li>Ange sedan att den följande komponenten ska vara beroende av värdet på en föregående komponent.<br />
Välj sedan, i formuläret för att skapa komponenter, denna komponent i listan över "beroende komponenter" och mata in det aktuella, nödvändiga värdet i i textrutan "beroende-värde".</li>
</ul>
<strong>Strukturen bör se ut så här:</strong>
<ol>
<li>Komponent 1 F(råga): Har Du en bil? S(var): Ja/Nej</li>
<li>Sidbrytning</li>
<li>Komponent 2 F: Vilken färg har Din bil?<br />
(den här komponenten är beroende av att komponent 1 har värdet= Ja)</li>
<li>Komponent 3 F: Varför har Du ingen bil?<br />
(den här komponenten är beroende av att komponent 1 har värdet=Nej)</li>
<li> ... övriga komponenter</li>
</ol>
Det är det hela. Mycket nöje!
';
$string['dependitem'] = 'beroende komponent';
$string['dependvalue'] = 'beroende värde';
$string['description'] = 'Beskrivning';
$string['do_not_analyse_empty_submits'] = 'Analysera inte tomma inskickningar';
$string['dropdown'] = 'Flervals-, kortsvar är tillåtna (nedrullningsmeny)';
$string['dropdownlist'] = 'Nedrullningslista';
$string['dropdownrated'] = 'Nedrullningsmeny';
$string['dropdown_values'] = 'Nedrullning - fyll i alternativ att välja bland';
$string['drop_feedback'] = 'Ta bort från den här kursen';
$string['edit_item'] = 'Redigera komponent';
$string['edit_items'] = 'Redigera komponenter';
$string['email_notification'] = 'Meddelande via e-post';
$string['email_notification_help'] = 'Om aktiverad får administratorer e-post om att ett nytt svar har lagts in.';
$string['emailteachermail'] = '{$a->username} har fullgjort en Egen enkät enligt: \'{$a->feedback}\'

Du kan se den här:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} har fullgjort en Egen enkät enligt: <i>\'{$a->feedback}\'</i><br /><br />
Du kan se den: <a href="{$a->url}">här</a>.';
$string['entries_saved'] = 'Inläggen har sparats';
$string['export_questions'] = 'Exportera frågor';
$string['export_to_excel'] = 'Exportera till Excel';
$string['feedback:addinstance'] = 'Lägg till ny enkät';
$string['feedbackclose'] = 'Stäng Egen enkät vid denna tid';
$string['feedback:complete'] = 'Fullfölj Egen enkät';
$string['feedback:createprivatetemplate'] = 'Skapa en privat mall';
$string['feedback:createpublictemplate'] = 'Skapa en offentlig mall';
$string['feedback:deletesubmissions'] = 'Ta bort fullföljda inskickningar';
$string['feedback:deletetemplate'] = 'Ta bort mall';
$string['feedback:edititems'] = 'Redigera komponenter';
$string['feedback_is_not_for_anonymous'] = 'Denna Egen enkät tillåter inte anonymitet';
$string['feedback_is_not_open'] = 'Denna Egen enkät är inte öppen';
$string['feedback:mapcourse'] = '"Mappa" kurser till förekomster av Egen enkät på global nivå';
$string['feedbackopen'] = 'Öppna denna Egen enkät vid den här tiden';
$string['feedback:receivemail'] = 'Ta emot meddelande via e-post';
$string['feedback:view'] = 'Visa Egen enkät';
$string['feedback:viewanalysepage'] = 'Visa sidan för analys efter det att Egen enkät har bekräftats/fullgjorts.';
$string['feedback:viewreports'] = 'Visa rapporter';
$string['file'] = 'Fil';
$string['filter_by_course'] = 'Filtrera enligt kurs';
$string['handling_error'] = 'Ett fel uppstod i modulen Egen enkäts hantering av händelser';
$string['hide_no_select_option'] = 'Dölj alternativet "Inte vald/a"';
$string['horizontal'] = 'horisontell';
$string['importfromthisfile'] = 'Importera från den här filen';
$string['import_questions'] = 'Importera frågor';
$string['import_successfully'] = 'Importen var framgångsrik';
$string['info'] = 'Information';
$string['infotype'] = 'Typ av information';
$string['insufficient_responses'] = 'otillräckliga svar';
$string['insufficient_responses_for_this_group'] = 'Det finns otillräckliga svar för den här gruppen. ';
$string['insufficient_responses_help'] = 'Svaren för den här gruppen är otillräckliga.

För att bibehålla denna Egen enkät som anonym så måste minst 2 svar ha avlämnats.  ';
$string['item_label'] = 'Etikett';
$string['item_name'] = 'Namn på komponent';
$string['label'] = 'Etikett';
$string['line_values'] = 'Bedömning/värdering';
$string['mapcourse'] = '"Mappa" Egen enkät till kurser';
$string['mapcourse_help'] = 'Som standard, enkätformulär som skapats på din hemsida finns tillgängliga  på hela webbplatsen och kommer att visas i alla kurser med feedback blocket. Du kan tvinga feedback-formuläret att visas genom att göra det till en "klibbig" block eller begränsa de kurser i vilka ett enkät-formulär kommer att visas genom att mappa den till specifika kurser.';
$string['mapcourseinfo'] = 'Det här är en en typ av universell återkoppling som finns tillgänglig för alla kurser som använder blocket för återkoppling. Du kan emellertid begränsa dess användning till vissa kurser genom att markera och välja ut just dem. Leta rätt på kursen och koppla den till den här återkopplingen.';
$string['mapcoursenone'] = 'Inga kurser har "mappats". Egen enkät är tillgänglig för alla kurser. ';
$string['mapcourses'] = '"Mappa" Egen enkät till kurser';
$string['mapcourses_help'] = 'När du har valt relevanta kursen(er) i din sökning kan du associera den med denna enkät med hjälp av "mappa" kurs (er). Flera kurser kan väljas genom att hålla ner Apple eller Ctrl-tangenten medan du klickar på kursens namn. En kurs kan kopplas från en enkät när som helst.';
$string['mappedcourses'] = '"Mappade" kurser';
$string['max_args_exceeded'] = 'Det går att hantera högst 6 argument, för många argument';
$string['maximal'] = 'maximal';
$string['messageprovider:message'] = 'Enkät påminnelse';
$string['messageprovider:submission'] = 'Meddelanden om Egen enkät';
$string['mode'] = 'Läge';
$string['modulename'] = 'Egen enkät';
$string['modulename_help'] = 'Modulerna för Egen enkät gör det möjligt att utforma enkäter så som man själv vill ha dem.';
$string['modulenameplural'] = 'Egen enkät';
$string['movedown_item'] = 'Flytta komponenten neråt';
$string['move_here'] = 'Flytta hit';
$string['move_item'] = 'Flytta den här frågan';
$string['moveup_item'] = 'Flytta komponenten uppåt';
$string['multichoice'] = 'Flervals';
$string['multichoicerated'] = 'Flervals (betygssatt/bedömd)';
$string['multichoicetype'] = 'Flerval - typ';
$string['multichoice_values'] = 'Flerval - värden';
$string['multiplesubmit'] = 'Ett flertal inskickningar';
$string['multiplesubmit_help'] = 'Om det är aktiverat för anonyma enkäter kan användarna skicka svar ett obegränsat antal gånger.';
$string['name'] = 'Namn';
$string['name_required'] = 'Namn är obligatoriskt';
$string['next_page'] = 'Nästa sida';
$string['no_handler'] = 'Det finns ingen hanterare av handlingar för';
$string['no_itemlabel'] = 'Ingen etikett';
$string['no_itemname'] = 'Inget namn för komponent';
$string['no_items_available_yet'] = 'Det finns inga tillgängliga enheter ännu';
$string['non_anonymous'] = 'Inte-anonym';
$string['non_anonymous_entries'] = 'Inga anonyma bidrag';
$string['non_respondents_students'] = 'Studenter/elever/deltagare/lärande som inte har lämnat några svar';
$string['notavailable'] = 'den här aktiviteten av typ Egen enkät är inte tillgänglig';
$string['not_completed_yet'] = 'Inte ifylld ännu';
$string['no_templates_available_yet'] = 'Det finns inga tillgängliga mallar ännu';
$string['not_selected'] = 'Inte vald';
$string['not_started'] = 'inte påbörjad';
$string['numeric'] = 'Numeriskt svar';
$string['numeric_range_from'] = 'Omfattning från';
$string['numeric_range_to'] = 'Omfattning till';
$string['of'] = 'av';
$string['oldvaluespreserved'] = 'Alla gamla frågor och de tilldelade svar kommer att bevaras';
$string['oldvalueswillbedeleted'] = 'De aktuella frågorna och alla användarnas svar kommer att tas bort';
$string['only_one_captcha_allowed'] = 'Det är bara tillåtet med en captcha i en Egen enkät';
$string['overview'] = 'Översikt';
$string['page'] = 'Sida';
$string['page_after_submit'] = 'Sida efter inskickning';
$string['pagebreak'] = 'Sidbrytning';
$string['parameters_missing'] = 'Det saknas parametrar från';
$string['picture'] = 'Bild';
$string['picture_file_list'] = 'Lista över bilder';
$string['picture_values'] = 'Välj en eller flera av<br />bildfiler från listan:';
$string['pluginadministration'] = 'Administration av Egen enkät';
$string['pluginname'] = 'Egen enkät';
$string['position'] = 'Position';
$string['preview'] = 'Förhandsgranska';
$string['preview_help'] = 'I förgranskningsläget kan du ändra ordningen på frågorna.';
$string['previous_page'] = 'Föregående sida';
$string['public'] = 'Offentlig';
$string['question'] = 'Fråga';
$string['questionandsubmission'] = 'Inställningar för fråga och inlämning';
$string['questions'] = 'Frågor';
$string['radio'] = 'Flerval - ett enskilt svar';
$string['radiobutton'] = 'Radioknapp';
$string['radiobutton_rated'] = 'Radioknapp (bedömd/värderad)';
$string['radiorated'] = 'Radioknapp (bedömd/värderad)';
$string['radio_values'] = 'Radioknappar - fyll i  alternativ att välja bland';
$string['ready_feedbacks'] = 'Färdiga aktiviteter av typ Egen enkät';
$string['relateditemsdeleted'] = 'Alla svar på denna frågan blir också borttagna';
$string['required'] = 'Obligatorisk';
$string['resetting_data'] = 'Återställ svar på Egen enkät';
$string['resetting_feedbacks'] = 'Återställer aktiviteter av typ Egen enkät';
$string['response_nr'] = 'Antal svar';
$string['responses'] = 'Svar';
$string['responsetime'] = 'Svarstid';
$string['save_as_new_item'] = 'Spara som en ny fråga';
$string['save_as_new_template'] = 'Spara som en ny mall';
$string['save_entries'] = 'Spara inlägg';
$string['save_item'] = 'Spara komponent';
$string['saving_failed'] = 'Det gick inte att spara';
$string['saving_failed_because_missing_or_false_values'] = 'Spara misslyckades eftersom värden saknades eller var felaktiga';
$string['search_course'] = 'Sök kurs';
$string['searchcourses'] = 'Sök kurser';
$string['searchcourses_help'] = 'Sök efter koden eller namnet på kursen (er) som du vill associera med denna enkät.';
$string['selected_dump'] = 'Valda index av en variabel av typ $SESSION har dumpats här nedan:';
$string['send'] = 'skicka';
$string['send_message'] = 'skicka meddelande';
$string['separator_decimal'] = '.';
$string['separator_thousand'] = ',';
$string['show_all'] = 'Visa allt';
$string['show_analysepage_after_submit'] = 'Visa sidan för analys efter det att Egen enkät är fullföljd';
$string['show_entries'] = 'Visa inlägg';
$string['show_entry'] = 'Visa inlägg';
$string['show_nonrespondents'] = 'Visa dem som inte har lämnat några svar';
$string['site_after_submit'] = 'Webbplats efter inskickning';
$string['sort_by_course'] = 'Sortera enligt kurs';
$string['start'] = 'Starta';
$string['started'] = 'startad';
$string['stop'] = 'Slut';
$string['subject'] = 'Ämne';
$string['switch_group'] = 'Byt grupp';
$string['switch_item_to_not_required'] = 'skifta till: enhet inte obligatorisk';
$string['switch_item_to_required'] = 'skifta till: enhet obligatorisk';
$string['template'] = 'Mall';
$string['templates'] = 'Mallar';
$string['template_saved'] = 'Mallen har sparats';
$string['textarea'] = 'Område för text';
$string['textarea_height'] = 'Räkning av rader';
$string['textarea_width'] = 'Storlek på yta';
$string['textfield'] = 'Textfält';
$string['textfield_maxlength'] = 'Max. räkning av tecken';
$string['textfield_size'] = 'Bredd på textfält';
$string['there_are_no_settings_for_recaptcha'] = 'Det finns inga inställningar för captcha';
$string['this_feedback_is_already_submitted'] = 'Du har redan fullföljt den här Egen enkät';
$string['typemissing'] = 'det saknas ett värde "type"';
$string['update_item'] = 'uppdatera komponent';
$string['url_for_continue'] = 'URL för knappen "Fortsätt"';
$string['url_for_continue_help'] = 'När enkäten är besvarat visas knappen "fortsätt" som leder till din institutions Moodle-hemsida. Du kan definiera här ett annat mål/länk för  knappen "Fortsätt".';
$string['use_one_line_for_each_value'] = '<br />Använd en rad för varje alternativ!';
$string['use_this_template'] = 'Använd den här mallen';
$string['using_templates'] = 'Använder mallar';
$string['vertical'] = 'vertikal';
$string['viewcompleted'] = 'fullföljda återkopplingar';
$string['viewcompleted_help'] = 'Du kan gå igenom formulär för återkoppling som är fullföljda. De är sökbara via kurs och/eller genom sökning på en viss fråga. Det  går att exportera svar på återkopplingar till Excel.';
