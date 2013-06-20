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
 * Strings for component 'checklist', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   checklist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomments'] = 'Lägg till kommentarer';
$string['additem'] = 'Lägg till';
$string['additemalt'] = 'Lägg till ett nytt objekt i listan';
$string['additemhere'] = 'Lägg till ett nytt objekt efter detta objekt';
$string['addownitems'] = 'Lägg till dina egna objekt';
$string['addownitems-stop'] = 'Avsluta lägga till egna objekt';
$string['allowmodulelinks'] = 'Tillåt länkar till kurselement';
$string['anygrade'] = 'Alla';
$string['autopopulate'] = 'Visa kurselement i checklista';
$string['autopopulate_help'] = 'Detta kommer automatiskt att lägga till en lista över alla befintliga resurser och aktiviteter av den aktuella kursen i checklistan. Listan kommer att uppdateras med ändringar i kursen, när du väljer "editera" för checklistan. Elementer kan döljas från listan, genom att klicka på "Dolt"-ikonen bredvid dem. För att ta bort de automatiska objekt från listan, ändra det här alternativet till "Nej" och klicka sedan på "Ta bort kurselement"på" Redigera "-sidan.';
$string['autoupdate'] = '"Bocka I" när kurselement är avslutad';
$string['autoupdate_help'] = 'Funktionen kommer automatiskt att markera elementer i din checklista när den relaterade aktivitet i kursen är genomförd. När en aktivitet är "genomförd" kan variera mellan olika aktiviteter. Om "spårning av fullföljande" är aktiverad i en  i Moodle 2.x kurs, kommer detta att användas för att markera relaterade element i checklistan. För information om exakt vad som orsakar att ett element markeras som "komplett", be administratören att titta i filen "mod / checklista / autoupdate.php". OBS: det kan ta upp till 60 sekunder för att en students genomförda markering syns i deras checklista.';
$string['autoupdatenote'] = 'Det är endast "student" markeringar som blir uppdaterade per automatik. Checklistor som endast lärare kan markera uppdateras inte per automatik.';
$string['autoupdatewarning_both'] = 'Det finns objekter i denna lista som kommer att uppdateras automatiskt (när student har genomförd relaterad kurselement) Men eftersom detta är en  Checklista som både lärare och studenter kan markera , kommer förloppsindikatorer inte att uppdateras förrän en lärare genomför de givna markeringarna.';
$string['autoupdatewarning_student'] = 'Det finns objekter i denna lista som kommer att uppdateras automatiskt (när student har genomförd relaterad kurselement).';
$string['autoupdatewarning_teacher'] = 'Automatisk uppdatering är aktiverad för denna checklista. Dessa markeringar kommer inte att visas eftersom endast lärarens markeringar visas';
$string['calendardescription'] = 'Denna händelse har lagts till av checklistan: {$a}';
$string['canceledititem'] = 'Avbryt';
$string['changetextcolour'] = 'Nästa textfärg';
$string['checkeditemsdeleted'] = 'Markerade element är borttagna';
$string['checklist'] = 'Checklista';
$string['checklist:addinstance'] = 'Lägg till ny checklista';
$string['checklistautoupdate'] = 'Tillåt att checklistor uppdateras per automatik';
$string['checklist:edit'] = 'Skapa och redigera Checklista';
$string['checklist:emailoncomplete'] = 'Ta emot email när slutförd';
$string['checklistfor'] = 'Checklista för';
$string['checklistintro'] = 'Inledning';
$string['checklist:preview'] = 'Förhandsgranska en checklista';
$string['checklistsettings'] = 'Inställningar';
$string['checklist:updatelocked'] = 'Uppdatera låsta checklist markeringar';
$string['checklist:updateother'] = 'Uppdatera studentens checklist markeringar';
$string['checklist:updateown'] = 'Uppdatera checklist markeringar';
$string['checklist:viewmenteereports'] = 'Se adeptens framsteg (endast)';
$string['checklist:viewreports'] = 'Se studentens framsteg';
$string['checks'] = 'Kontrollera markeringar';
$string['comments'] = 'Kommentarer';
$string['completionpercent'] = 'Procentuell andel av objekt som bör avmarkeras';
$string['completionpercentgroup'] = 'Kräv avmarkering';
$string['configchecklistautoupdate'] = 'Innan du tillåter detta måste du göra några ändringar i Moodle koden: se mod/checklista/README.txt för detaljer';
$string['configshowcompletemymoodle'] = 'Om denna box avmarkeras så visas avslutade Checklistor inte på "Min Moodle" sida';
$string['configshowmymoodle'] = 'Om denna box avmarkeras så visas Checklistor (inklusive progress) inte på "Min Moodle" sida';
$string['confirmdeleteitem'] = 'Är du säker att du vill ta bort detta element i checklistan';
$string['deleteitem'] = 'Ta bort element';
$string['duedatesoncalendar'] = 'Lägg till förfallodatum i kalender';
$string['edit'] = 'Redigera innehåll checklista';
$string['editchecks'] = 'Redigera markeringar';
$string['editdatesstart'] = 'Redigera datum';
$string['editdatesstop'] = 'Avsluta redigering datum';
$string['edititem'] = 'Redigera detta element';
$string['emailoncomplete'] = 'Skicka epost till lärare när checklist är komplett/slutfört';
$string['emailoncompletebody'] = 'Användare {$a->user} har slutfört checklista &quot;{$a->checklist}&quot; i kursen &quot;{$a->coursename}&quot; Se checklistan här:';
$string['emailoncompletebodyown'] = 'Du har slutfört checklista &quot;{$a->checklist}&quot; i kursen &quot;{$a->coursename}&quot; Se checklistan här:';
$string['emailoncomplete_help'] = 'När en checklista är slutfört skickas ett meddelande till alla lärare i kursen. En administratör kan kontrollera vem som får detta e-post med möjligheten "mod:checklista/emailoncomplete\' -. Även "lärare" och icke-redigerinlärarna har möjlighet till detta.';
$string['emailoncompletesubject'] = 'Användaren har slutfört checklista';
$string['emailoncompletesubjectown'] = 'Du har slutfört checklista &quot;{$a->checklist}';
$string['export'] = 'Exportera element';
$string['forceupdate'] = 'Uppdatera markeringar för all automatiska element';
$string['gradetocomplete'] = 'Betyg för slutförandet';
$string['guestsno'] = 'Du har inte rättigheter för att kunna se checklistan';
$string['headingitem'] = 'Detta element är en överskrift. Elementet innehåller ingen checkbox som kan markeras';
$string['import'] = 'Importera element';
$string['importfile'] = 'Välj fil för import';
$string['importfromcourse'] = 'Hela kursen';
$string['importfromsection'] = 'Aktuell avsnitt';
$string['indentitem'] = 'Indrag objekt';
$string['itemcomplete'] = 'Avslutat';
$string['items'] = 'Checklist element';
$string['linktomodule'] = 'Länk till detta modul';
$string['lockteachermarks'] = 'Lås lärarens markeringar';
$string['lockteachermarks_help'] = 'När den här inställningen är aktiverad och en lärare har sparat ett \'Ja\' märke, kommer den inte att kunna ändras igen. Användare med möjlighet \'mod/checklista:updatelocked" kommer fortfarande att kunna ändra märket.';
$string['lockteachermarkswarning'] = 'OBS: När du har sparat dessa markeringar så kommer du inte att kunna ändra \'Ja\' markeringar';
$string['modulename'] = 'Checklista';
$string['modulename_help'] = 'Checklist ger läraren möjlighet att skapa en lista av element som studenter ska genomföra. Beroende på inställningar kan element i checklistan kryssas I av student, läraren eller både och. Progress av genomförda element visas för enskild student samt för läraren.';
$string['modulenameplural'] = 'Checklistor';
$string['moveitemdown'] = 'Flytta element nedåt';
$string['moveitemup'] = 'Flytta element uppåt';
$string['noitems'] = 'Inga element i checklistan';
$string['optionalhide'] = 'Dölj frivilliga element';
$string['optionalitem'] = 'Element är frivillig';
$string['optionalshow'] = 'Visa frivilliga element';
$string['percentcomplete'] = 'Obligatoriska element';
$string['percentcompleteall'] = 'All items';
$string['pluginadministration'] = 'Checklista administration';
$string['pluginname'] = 'Checklista';
$string['preview'] = 'Förhandsgranska checklista';
$string['progress'] = 'Framsteg/progress';
$string['removeauto'] = 'Ta bort kurs element';
$string['report'] = 'Visa/ Editera progress';
$string['reporttablesummary'] = 'Tabell över punkterna på checklistan som enskilt elev har slutfört/genomfört';
$string['requireditem'] = 'Detta element är obligatorisk - det måste genomföras';
$string['resetchecklistprogress'] = 'Nollställ framsteg i checklistan och användarens markeringar';
$string['savechecks'] = 'Spara';
$string['showcompletemymoodle'] = 'Visa slutförda Checklistor på Min Moodle-sida';
$string['showfulldetails'] = 'Visa alla detaljer';
$string['showmymoodle'] = 'Visa Checklista på \'Min Moodle\' sida';
$string['showprogressbars'] = 'Översiktsvy för progress';
$string['teacheralongsidecheck'] = 'Student och Lärare';
$string['teachercomments'] = 'Lärare kan lägga till kommentar';
$string['teacherdate'] = 'Datum när lärare senast uppdaterade objekt';
$string['teacheredit'] = 'Uppdaterat av';
$string['teacherid'] = 'Läraren som senast uppdaterade denna markering';
$string['teachermarkno'] = 'Lärare påstår att du INTE har slutfört detta element';
$string['teachermarkundecided'] = 'Lärare har ännu inte markerat detta element';
$string['teachermarkyes'] = 'Lärare påstår att du har slutfört detta';
$string['teachernoteditcheck'] = 'Endast student';
$string['teacheroverwritecheck'] = 'Endast lärare';
$string['theme'] = 'Checklist visningstema';
$string['toggledates'] = 'Växla namn och datum';
$string['unindentitem'] = 'Unindent item';
$string['updatecompletescore'] = 'Spara betyg när slutfört';
$string['updateitem'] = 'Uppdatera/Redigera';
$string['userdate'] = 'Datum när användaren senast uppdaterade detta objekt';
$string['useritemsallowed'] = 'Användaren kan själv lägga till element';
$string['useritemsdeleted'] = 'Användarelement borttagen';
$string['view'] = 'Visa checklista';
$string['viewall'] = 'Visa alla studenter';
$string['viewallcancel'] = 'Avbryt';
$string['viewallsave'] = 'Spara';
$string['viewsinglereport'] = 'Visa/redigera progress för den här användaren';
$string['viewsingleupdate'] = 'Visa/redigera progress för den här användaren';
$string['yesnooverride'] = 'Ja, kan inte överskrida';
$string['yesoverride'] = 'Ja, kan överskrida';
