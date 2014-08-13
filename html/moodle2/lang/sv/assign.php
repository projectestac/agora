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
 * Strings for component 'assign', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Uppgifter att bevaka';
$string['addattempt'] = 'Tillåt ett nytt försök';
$string['addnewattempt'] = 'Lägg till ett nytt försök';
$string['addnewattemptfromprevious'] = 'Lägg till ett nytt försök baserat på tidigare inlämning';
$string['addnewattemptfromprevious_help'] = 'Detta kommer att kopiera innehållet i din tidigare inlämning till en ny inlämning som du kan arbeta med.';
$string['addnewattempt_help'] = 'Detta kommer att skapa en ny tom inlämning för dig att arbeta på.';
$string['addsubmission'] = 'Lägg till inskickat bidrag';
$string['allowsubmissions'] = 'Tillåt användaren att göra inlämningar till denna inlämningsuppgift.';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Detaljer om inlämningsuppgiften samt inlämningsformuläret kommer att vara tillgängligt från <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Tillåt inlämning från';
$string['allowsubmissionsfromdate_help'] = 'Om aktiverat kan elever inte lämna in före detta datum. Om avaktiverat kan elever starta inlämning omedelbart.';
$string['allowsubmissionsfromdatesummary'] = 'Denna inlämningsuppgift kommer att tillåta inlämning från <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Tillåt ändringar av inlämning';
$string['alwaysshowdescription'] = 'Visa alltid beskrivning';
$string['alwaysshowdescription_help'] = 'Om avaktiverat kommer uppgiftsbeskrivningen ovan att vara synlig för elever först vid datumet "Tillåt inlämning från och med".';
$string['applytoteam'] = 'Tillämpa betyg och återkoppling för hela gruppen';
$string['assign:addinstance'] = 'Lägg till en ny uppgift';
$string['assign:exportownsubmission'] = 'Exportera egna inskickade bidrag';
$string['assignfeedback'] = 'Insticksmodul för återkoppling';
$string['assignfeedbackpluginname'] = 'Insticksmodul för återkoppling';
$string['assign:grade'] = 'Betygssätt uppgift';
$string['assign:grantextension'] = 'Tillåt förlängning';
$string['assignmentisdue'] = 'Inlämningstiden har gått ut.';
$string['assignmentmail'] = '{$a->grader} har skickat någon återkoppling till din inlämnade uppgift för \'{$a->assignment}\'

Du kan se den bifogad till din inlämnade uppgift: {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} har skickat någon återkoppling till din inlämnade uppgift för \'<i>{$a->assignment}</i>\'<br /><br /> Du kan se den bifogad till din <a href="{$a->url}">inlämnade uppgift</a>.';
$string['assignmentmailsmall'] = '{$a->grader} har skickat någon återkoppling till din inlämnade uppgift för \'{$a->assignment}\'  Du kan se den bifogad till din inlämnade uppgift: {$a->url}';
$string['assignmentname'] = 'Uppgiftens namn';
$string['assignmentplugins'] = 'Insticksmodul för inlämningsuppgift';
$string['assignmentsperpage'] = 'Inlämningsuppgifter per sida';
$string['assign:revealidentities'] = 'Avslöja studentidentiteter';
$string['assignsubmission'] = 'Insticksmodul för inlämning';
$string['assignsubmissionpluginname'] = 'Insticksmodul för inlämning';
$string['assign:submit'] = 'Skicka in uppgift';
$string['assign:view'] = 'Visa uppgift';
$string['attemptheading'] = 'Försök{$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Tidigare försök';
$string['attemptnumber'] = 'Försök nummer';
$string['attemptreopenmethod'] = 'Försök återupptas';
$string['attemptreopenmethod_help'] = 'Bestämmer hur studentens inlämningar kan öppnas upp igen för ny inlämning .

Tillgängliga alternativen är:

Aldrig: Studentens inlämning kan inte öppnas upp på nytt.

Manuellt: Studentens inlämning kan öppnas upp av en lärare.

Automatiskt tills godkänd: Studentens inlämning öppnas upp per automatik tills studentens betyg motsvarar godkänd i betygsrapport för den specifika uppgiften';
$string['attemptreopenmethod_manual'] = 'Manuellt';
$string['attemptreopenmethod_none'] = 'Aldrig';
$string['attemptreopenmethod_untilpass'] = 'Automatiskt tills passerat';
$string['attemptsettings'] = 'Inställningar försök';
$string['availability'] = 'Tillgänglighet';
$string['backtoassignment'] = 'Tillbaka till inlämningsuppgift';
$string['batchoperationconfirmaddattempt'] = 'Tillåt nytt försök för valda inlämningar?';
$string['batchoperationconfirmgrantextension'] = 'Tillåt en förlängning till alla valda inlämningar?';
$string['batchoperationconfirmlock'] = 'Lås alla valda inlämningar?';
$string['batchoperationconfirmreverttodraft'] = 'Återställ valda inlämningar till utkast?';
$string['batchoperationconfirmunlock'] = 'Lås upp alla valda inlämningar?';
$string['batchoperationlock'] = 'lås inlämningar';
$string['batchoperationreverttodraft'] = 'återställ inlämningar till utkast';
$string['batchoperationsdescription'] = 'Med valda...';
$string['batchoperationunlock'] = 'lås upp inlämningar';
$string['blindmarking'] = 'Anonym rättning';
$string['blindmarking_help'] = 'Anonym rättning döljer identiteten på de elever som rättas. Inställningen Anonym rättning kommer att vara låst så snart en inlämning eller en rättning gjorts i relation till denna inlämningsuppgift.';
$string['changegradewarning'] = 'Denna inlämningsuppgift har betygssatta inlämningar och ändring av betyg kommer inte automatiskt att beräkna om betyg för befintliga inlämningar. Du måste betygssätta alla inlämningar på nytt om du vill ändra betyg.';
$string['choosegradingaction'] = 'Betygssättningsåtgärd';
$string['chooseoperation'] = 'Välj funktion';
$string['comment'] = 'Kommentar';
$string['completionsubmit'] = 'Eleven måste lämna in till denna aktivitet för att fullfölja den';
$string['configshowrecentsubmissions'] = 'Alla kan se meddelanden om inskickade uppgifter in rapporterna för senaste aktivitet.';
$string['confirmbatchgradingoperation'] = 'Är du säker på att du vill {$a->operation} för {$a->count} elever?';
$string['confirmsubmission'] = 'Är du säker på att du vill lämna in ditt arbete för betygssättning? Du kommer inte längre att kunna göra några förändringar';
$string['conversionexception'] = 'Kunde inte konvertera inlämningsuppgift. Undantaget var: {$a}.';
$string['couldnotconvertgrade'] = 'Kunde inte konvertera betyg för inlämningsuppgift för användare {$a}.';
$string['couldnotconvertsubmission'] = 'Kunde inte konvertera inlämning för användare {$a}.';
$string['couldnotcreatecoursemodule'] = 'Kunde inte skapa kursmodul.';
$string['couldnotcreatenewassignmentinstance'] = 'Kunde inte skapa ny instans av inlämningsuppgift.';
$string['couldnotfindassignmenttoupgrade'] = 'Kunde inte hitta gammal instans av inlämningsuppgift att uppgradera.';
$string['currentattempt'] = 'Detta är försök {$a}.';
$string['currentattemptof'] = 'Detta är försök {$a->attemptnumber} ( {$a->maxattempts} försök tillåten).';
$string['currentgrade'] = 'Aktuellt betyg/omdöme i betygskatalogen';
$string['cutoffdate'] = 'Avstängningsdatum';
$string['cutoffdatefromdatevalidation'] = 'Avstängningsdatum måste vara senare än datum för tillåt inlämning från.';
$string['cutoffdate_help'] = 'Om satt kommer inlämningsuppgiften inte att acceptera inlämningar efter detta datum utan att det finns en förlängningsperiod.';
$string['cutoffdatevalidation'] = 'Stängningsdatum måste vara senare än slutdatum för inlämning.';
$string['defaultsettings'] = 'Förvalda inställningar för inlämningsuppgift';
$string['defaultsettings_help'] = 'Dessa inställningar anger vad som är förvalt för alla nya inlämningsuppgifter.';
$string['defaultteam'] = 'Förvald grupp';
$string['deleteallsubmissions'] = 'Ta bort alla inlämningar';
$string['description'] = 'Beskrivning';
$string['downloadall'] = 'Ladda ner alla inlämningar';
$string['duedate'] = 'Slutdatum/tid';
$string['duedate_help'] = 'Detta är sluttiden för inlämning. Inlämningar kommer fortfarande vara möjliga efter detta datum men kommer då att märkas som sena. För att förhindra inlämning efter ett visst datum sätt ett stängningsdatum.';
$string['duedateno'] = 'Inget slutdatum/tid';
$string['duedatereached'] = 'Slutdatum för denna inlämningsuppgift har nu passerat';
$string['duedatevalidation'] = 'Slutdatum måste vara efter datum för tillåt inlämning från.';
$string['editaction'] = 'Åtgärder...';
$string['editattemptfeedback'] = 'Redigera betyg och feedback för försök nr {$a}.';
$string['editingpreviousfeedbackwarning'] = 'Du redigerar feedback av ett tidigare försök. Detta är försök nr This is attempt {$a->attemptnumber} av totalt{$a->totalattempts}.';
$string['editingstatus'] = 'Redigerar status';
$string['editsubmission'] = 'Redigera min inskickade uppgiftslösning';
$string['editsubmission_help'] = 'Gör ändringar i din inlämning';
$string['enabled'] = 'Aktiverad';
$string['errornosubmissions'] = 'Det finns inga inskickade bidrag att ladda ner';
$string['errorquickgradingvsadvancedgrading'] = 'Betygen sparades inte eftersom denna inlämningsuppgift använder för närvarande avancerad betygssättning';
$string['errorrecordmodified'] = 'Betygen sparades inte eftersom någon har modifierat en eller flera poster mer nyligt än när du laddade sidan.';
$string['extensionduedate'] = 'Förlängning av slutdatum';
$string['extensionnotafterduedate'] = 'Förlängningsdatum måste vara senare än slutdatum';
$string['extensionnotafterfromdate'] = 'Förlängningsdatum måste vara efter datum för tillåt inlämning från';
$string['feedback'] = 'Återkoppling';
$string['feedbackavailablehtml'] = '{$a->username} har lämnat återkoppling för din inlämning av \'<i>{$a->assignment}</i>\'<br /><br /> Du kan se den bifogad till din <a href="{$a->url}">inlämnade uppgift</a>.';
$string['feedbackavailablesmall'] = '{$a->username} har gett återkoppling för inlämningsuppgift {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} har lämnat återkoppling till din inlämnade uppgift \'{$a->assignment}\'

Du kan se den bifogad till din:

 {$a->url}';
$string['feedbackplugin'] = 'Insticksmodul för återkoppling';
$string['feedbackpluginforgradebook'] = 'Insticksmodul för återkoppling som kommer att skicka kommentarer till betygsboken';
$string['feedbackpluginforgradebook_help'] = 'Endast en insticksmodul för återkoppling kan skicka återkopplingar till betygsboken.';
$string['feedbackplugins'] = 'Insticksmoduler för återkoppling';
$string['feedbacksettings'] = 'Inställningar för återkoppling';
$string['feedbacktypes'] = 'Feedback typer';
$string['filesubmissions'] = 'Filinlämningar';
$string['filter'] = 'Filter';
$string['filternone'] = 'Inga filter';
$string['filterrequiregrading'] = 'Behöver betygssättas';
$string['filtersubmitted'] = 'Inskickad';
$string['gradeabovemaximum'] = 'Betyg måste bli mindre än eller lika med {$a}.';
$string['gradebelowzero'] = 'Betyg måste vara större än eller lika med noll.';
$string['graded'] = 'Betygssatt';
$string['gradedby'] = 'Betygssatt av';
$string['gradedon'] = 'Betygssatt den';
$string['gradeoutof'] = 'Betyg ur {$a}';
$string['gradeoutofhelp'] = 'Betyg';
$string['gradeoutofhelp_help'] = 'Ange betyget för elevens inlämnade uppgift här. Du kan använda decimaler.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} har uppdaterat sin inskickade uppgiftslösning för <i>\'{$a->assignment}\' den {$a->timeupdated}</i><br /><br />Den är <a href="{$a->url}"> tillgänglig på webbplatsen.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} har uppdaterat sin inlämning för inlämningsuppgift {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} har uppdaterat sina inskickade uppgiftslösningar för
 \'{$a->assignment}\' den at {$a->timeupdated}

Den är tillgänglig här:

   {$a->url}';
$string['gradestudent'] = 'Betygssätt elev: (id={$a->id}, fullt namn={$a->fullname}).';
$string['gradeuser'] = 'Betyg {$a}';
$string['grading'] = 'Betygssättning';
$string['gradingchangessaved'] = 'Ändringar i betygssättning sparades';
$string['gradingmethodpreview'] = 'Kriterium för betygssättning';
$string['gradingoptions'] = 'Alternativ';
$string['gradingstatus'] = 'Betygssättningsstatus';
$string['gradingstudent'] = 'Betygssättning student';
$string['gradingsummary'] = 'Betygssammanställning';
$string['grantextension'] = 'Tillåt förlängning';
$string['grantextensionforusers'] = 'Tillåt förlängning för {$a} elever';
$string['groupsubmissionsettings'] = 'Gruppinlämning inställningar';
$string['hiddenuser'] = 'Deltagare';
$string['hideshow'] = 'Döjl/Visa';
$string['instructionfiles'] = 'Instruktionsfiler';
$string['invalidfloatforgrade'] = 'Det givna betyget kunde inte förstås: {$a}';
$string['invalidgradeforscale'] = 'Det givna betyget var inte giltigt för den nuvarande skalan';
$string['lastmodifiedgrade'] = 'Senast modifierat (betyg)';
$string['lastmodifiedsubmission'] = 'Senast modifierat (inlämning)';
$string['latesubmissions'] = 'Sen inlämning';
$string['latesubmissionsaccepted'] = 'Endast elev(er) som har beviljats förlängd inlämningstid kan fortfarande lämna in uppgifter';
$string['locksubmissionforstudent'] = 'Förhindra fler inlämningar från elev: (id={$a->id}, hela namnet={$a->fullname}).';
$string['locksubmissions'] = 'Lås inlämningar';
$string['manageassignfeedbackplugins'] = 'Hantera insticksmodul för återkoppling till inlämningsuppgift';
$string['manageassignsubmissionplugins'] = 'Hantera insticksmodul för inlämning till inlämningsuppgift';
$string['maxattempts'] = 'Maximalt antal försök';
$string['maxattempts_help'] = 'Det maximala antalet försök av inlämningar som kan göras av en elev. Efter att studenten har laddat upp detta detta antal försök har han/hon inte möjlighet att ladda upp ett nytt försök.';
$string['maxgrade'] = 'Maximalt betyg';
$string['messageprovider:assign_notification'] = 'Meddelande för inlämningsuppgift';
$string['modulename'] = 'Inlämningsuppgift';
$string['modulename_help'] = 'Aktivitetsmodulen inlämningsuppgift medger för lärare att kommunicera uppgifter, samla arbete och sätta betyg med återkoppling.

Elever kan lämna in digitalt material (filer) såsom dokument från ordbehandlingsprogram, kalkylblad, bilder eller ljud- och videofiler. Alternativt eller som tillägg kan inlämningsuppgiften kräva att eleverna skriver test direkt i testredigeraren. En inlämningsuppgift kan även användas för att påminna elever om en uppgift utanför webbplatsen, som de ska utföra utan att vara inloggade.

Vid granskning av inlämningsuppgifter kan lärare ge kommentarer för återkoppling samt ladda upp filer såsom rättningsmarkerade elevuppgifter, dokument med kommentarer eller talade kommentarer (ljudfiler). Inlämningsuppgifter kan betygssättas med numerisk eller anpassad skala eller med en avancerad betygsmetod såsom en rubrik. Slutgiltiga betyg lagras i betygsboken.';
$string['modulenameplural'] = 'Uppgifter';
$string['mysubmission'] = 'Min inlämning:';
$string['newsubmissions'] = 'Uppgifterna är inskickade';
$string['noattempt'] = 'Inga försök';
$string['nofiles'] = 'Inga filer.';
$string['nograde'] = 'Inget betyg.';
$string['nolatesubmissions'] = 'Sena inlämningar accepteras inte.';
$string['nomoresubmissionsaccepted'] = 'Inga fler inlämningar accepteras';
$string['noonlinesubmissions'] = 'Denna inlämningsuppgift kräver inte att du lämnar in något online.';
$string['nosavebutnext'] = 'Nästa';
$string['nosubmission'] = 'Inget har lämnats in för denna inlämningsuppgift';
$string['nosubmissionsacceptedafter'] = 'Inga inlämningar tillåts efter';
$string['notgraded'] = 'Ej betygssatt';
$string['notgradedyet'] = 'Ännu ej bedömd';
$string['notifications'] = 'Meddelande';
$string['notsubmittedyet'] = 'Ännu inte inskickade uppgifter';
$string['nousersselected'] = 'Ingen användare vald';
$string['numberofdraftsubmissions'] = 'Utkast';
$string['numberofparticipants'] = 'Deltagare';
$string['numberofsubmissionsneedgrading'] = 'Behöver betygssättas';
$string['numberofsubmittedassignments'] = 'Inlämnad';
$string['numberofteams'] = 'Grupper';
$string['offline'] = 'Ingen inlämning online krävs';
$string['open'] = 'Öppen';
$string['outlinegrade'] = 'Betyg: {$a}';
$string['outof'] = '{$a->current} av totalt {$a->total}';
$string['overdue'] = '<font color="red">Inlämningsuppgiften är försenad med: {$a}</font>';
$string['page-mod-assign-view'] = 'Huvudsidan för modulen inlämningsuppgift samt sidan för inlämning';
$string['page-mod-assign-x'] = 'Varje sida för modulen inlämningsuppgift';
$string['participant'] = 'Deltagare';
$string['pluginadministration'] = 'Administration av inlämningsuppgift';
$string['pluginname'] = 'Inlämningsuppgift';
$string['preventsubmissions'] = 'Förhindra användaren från att göra fler inlämningar till denna inlämningsuppgift.';
$string['preventsubmissionsshort'] = 'Förhindra ändringar av inlämnad uppgift';
$string['previous'] = 'Tidigare';
$string['quickgrading'] = 'Snabb betygssättning';
$string['quickgradingchangessaved'] = 'Betygsändringarna sparades';
$string['quickgrading_help'] = 'Snabb betygssättning medger att du sätter betyg (och resultat) direkt i inlämningsöversikten. Snabb betygssättning är inte kompatibelt med avancerad betygssättning och rekommenderas heller inte då det finns multipla poängskalor.';
$string['quickgradingresult'] = 'Snabb betygssättning';
$string['recordid'] = 'Identifierare';
$string['requireallteammemberssubmit'] = 'Kräv att alla gruppmedlemmar lämnar in';
$string['requireallteammemberssubmit_help'] = 'Om detta är aktiverat måste alla elever i elevgruppen ha klickat på skicka in knappen innan gruppens inlämning kommer anses vara inlämnad. Om avaktiverat kommer gruppinlämningen anses som inlämnad så snart som någon av gruppmedlemmarna klickar på knappen lämna in.';
$string['requiresubmissionstatement'] = 'Kräv att elever godkänner inlämningsförsäkran';
$string['requiresubmissionstatement_help'] = 'Kräv att eleverna accepterar inlämningsförsäkran för hela Moodle installationen. Om denna inställning inte är aktiverad kan inlämningsförsäkran aktiveras och avaktiveras i inställningarna för respektive inlämningsuppgift.';
$string['revealidentities'] = 'Avslöja elevidentiteter';
$string['revealidentitiesconfirm'] = 'Är du säker på att du vill avslöja elevidentiteter för denna inlämningsuppgift. Detta kan inte ångras. När elevidentiteterna har avslöjats kommer rättningen att släppas till betygsboken.';
$string['reverttodraft'] = 'Återställ inlämningen till status utkast.';
$string['reverttodraftforstudent'] = 'Återställ inlämningen till status utkast för elev: (id={$a->id}, fullt namn={$a->fullname}).';
$string['reverttodraftshort'] = 'Återställ inlämningen till utkast';
$string['reviewed'] = 'Recenserad';
$string['saveallquickgradingchanges'] = 'Spara alla ändringar för snabb betygssättning';
$string['savechanges'] = 'Spara ändringar.';
$string['savegradingresult'] = 'Betyg';
$string['savenext'] = 'Spara och visa nästa';
$string['scale'] = 'Skala';
$string['selectlink'] = 'Välj...';
$string['selectuser'] = 'Välj {$a}';
$string['sendlatenotifications'] = 'Meddela betygssättare om sena inlämningar';
$string['sendlatenotifications_help'] = 'Om aktiverad kommer betygssättare (oftast lärare) att motta meddelande närhelst en elev skickar in en inlämningsuppgift sent. Meddelandemetoder kan konfigureras.';
$string['sendnotifications'] = 'Meddela betygssättare om inlämningar';
$string['sendnotifications_help'] = 'Om aktiverad kommer betygssättare (oftast lärare) att motta meddelande närhelst en elev skickar in en inlämningsuppgift, tidigt, i rätt tid eller för sent. Meddelandemetoder kan konfigureras.';
$string['sendsubmissionreceipts'] = 'Skicka inlämningskvittens till elever';
$string['sendsubmissionreceipts_help'] = 'Omkopplaren aktiverar bekräftelse på inlämningen för elever. Eleven kommer att få ett meddelande varje gång denne genomfört en inlämning.';
$string['settings'] = 'Inställningar för inlämningsuppgift';
$string['showrecentsubmissions'] = 'Visa aktuella inskickade uppgifter';
$string['status'] = 'Status';
$string['submission'] = 'Inskickad uppgift';
$string['submissioncopiedhtml'] = 'Du har gjort en kopia av din tidigare uppgiftsinlämning för <i>\'{$a->assignment}</i> &quot; <br /><br /> Du kan se status för ditt <a href="{$a->url}">uppgiftsinlämning</a> .';
$string['submissioncopiedsmall'] = 'Du har kopierat ditt tidigare uppgiftsinlämning för {$a->assignment}';
$string['submissioncopiedtext'] = 'Du har gjort en kopia av din tidigare uppgiftsinlämning för \'{$a->assignment} &quot;Du kan se status för ditt uppgiftsinlämning: {$a->url}';
$string['submissiondrafts'] = 'Kräv att elever klickar på knapp för lämna in';
$string['submissiondrafts_help'] = 'Om aktiverat måste elever klicka på knappen Lämna in för att markera sin inlämning som slutgiltig. Detta medger elever att ha utkast av sin inlämning i systemet. Om denna inställning ändras från Nej till Ja efter att elever redan har lämnat in kommer dessa inlämningar att betraktas som slutgiltiga.';
$string['submissioneditable'] = 'Elev kan ändra denna inlämning';
$string['submissionempty'] = 'Inget blev inlämnat';
$string['submissionnotcopiedinvalidstatus'] = 'Inlämningen kopierades inte eftersom den har redigerats sedan den öppnades.';
$string['submissionnoteditable'] = 'Elev kan inte ändra denna inlämning';
$string['submissionnotready'] = 'Denna inlämningsuppgift är inte klar för inlämning:';
$string['submissionplugins'] = 'Insticksmoduler för inlämning';
$string['submissionreceipthtml'] = 'Du har lämnat in en inlämningsuppgift för \'<i>{$a->assignment}</i>\'<br /><br /> Se status för din <a href="{$a->url}">inlämnade uppgift</a>.';
$string['submissionreceipts'] = 'Skicka inlämningsbekräftelser';
$string['submissionreceiptsmall'] = 'Du har lämnat in din uppgift för {$a->assignment}';
$string['submissionreceipttext'] = 'Du har lämnat in en uppgift för \'{$a->assignment}\'

Se status för din inlämnade uppgift:

 {$a->url}';
$string['submissions'] = 'Inskickade uppgifter';
$string['submissionsclosed'] = 'Inlämning stängd';
$string['submissionsettings'] = 'Inställningar för inlämning';
$string['submissionslocked'] = 'Denna inlämningsuppgift accepterar inte inlämningar';
$string['submissionslockedshort'] = 'Ändringar av inlämning tillåts inte';
$string['submissionsnotgraded'] = 'Ej betygssatta inlämningar: {$a}';
$string['submissionstatement'] = 'Inlämningsförsäkran';
$string['submissionstatementacceptedlog'] = 'Inlämningsförsäkran godkänt av användare {$a}';
$string['submissionstatementdefault'] = 'Denna inlämningsuppgift består av mitt eget arbete, förutom där jag bekräftat användning av andras arbete.';
$string['submissionstatement_help'] = 'Inlämningsförsäkran';
$string['submissionstatus'] = 'Status för inlämning';
$string['submissionstatus_'] = 'Ingen inlämning';
$string['submissionstatus_draft'] = 'Utkast (ej inlämnad)';
$string['submissionstatusheading'] = 'Status för inlämning';
$string['submissionstatus_marked'] = 'Betygssatt';
$string['submissionstatus_new'] = 'Ny inlämning';
$string['submissionstatus_reopened'] = 'Återöppnad';
$string['submissionstatus_submitted'] = 'Inlämnad för betygssättning';
$string['submissionsummary'] = '{$a->status}. Senast ändrad {$a->timemodified}';
$string['submissionteam'] = 'Grupp';
$string['submissiontypes'] = 'Inlämningstyper';
$string['submitaction'] = 'Lämna in';
$string['submitassignment'] = 'Skicka in uppgift';
$string['submitassignment_help'] = 'När du har lämnat in din uppgift kommer du inte längre att kunna göra ändringar i den.';
$string['submitted'] = 'Inskickad';
$string['submittedearly'] = 'Inlämningsuppgift lämnades in {$a} tidigt';
$string['submittedlate'] = 'Inlämningsuppgift lämnades in {$a} sent';
$string['submittedlateshort'] = '{$a} sent';
$string['teamsubmission'] = 'Elever lämnar in i grupp';
$string['teamsubmissiongroupingid'] = 'Gruppering för elevgrupper';
$string['teamsubmissiongroupingid_help'] = 'Detta är grupperingen som inlämningsuppgiften kommer att använda för att hitta grupper för elevgrupper. Om ej satt kommer den förvalda uppsättningen av grupper att användas.';
$string['teamsubmission_help'] = 'Om aktiverat kommer elever att delas in i grupper baserat på den förvalda uppsättningen grupper eller en anpassad gruppindelning. En gruppinlämning kommer att delas mellan gruppmedlemmar och alla medlemmar i en grupp kommer att se varandras ändringar i inlämningen.';
$string['teamsubmissionstatus'] = 'Inlämningsstatus för grupp';
$string['textinstructions'] = 'Instruktion för inlämningsuppgift';
$string['timemodified'] = 'Senast ändrad';
$string['timeremaining'] = 'Återstående tid';
$string['unlimitedattempts'] = 'Obegränsad';
$string['unlimitedattemptsallowed'] = 'Obegränsad försök tillåtet.';
$string['unlocksubmissionforstudent'] = 'Tillåt inlämning för elev: (id={$a->id}, fulltnamn={$a->fullname}).';
$string['unlocksubmissions'] = 'Lås upp inlämningar';
$string['updategrade'] = 'Uppdatera betyg';
$string['updatetable'] = 'Spara och uppdatera tabell';
$string['upgradenotimplemented'] = 'Uppgradering inte implementerad i insticksmodul ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Förlängning beviljad till: {$a}';
$string['usergrade'] = 'Användarbetyg';
$string['userswhoneedtosubmit'] = 'Användare som behöver lämna in: {$a}';
$string['viewfeedback'] = 'Visa återkoppling';
$string['viewfeedbackforuser'] = 'Visa återkoppling för användare: {$a}';
$string['viewfull'] = 'Visa hela';
$string['viewfullgradingpage'] = 'Öppna hela betygssidan för att ge återkoppling';
$string['viewgradebook'] = 'Visa betygsbok';
$string['viewgrading'] = 'Visa/betygssätt alla inlämningar';
$string['viewgradingformforstudent'] = 'Visa betygssättningssida för elev: (id={$a->id}, fullt namn={$a->fullname}).';
$string['viewownsubmissionform'] = 'Visa egen inlämningssida.';
$string['viewownsubmissionstatus'] = 'Visa egen sida för inlämningsstatus.';
$string['viewrevealidentitiesconfirm'] = 'Visa bekräftelsesida för avslöja elevidentiteter.';
$string['viewsubmission'] = 'Visa inlämning';
$string['viewsubmissionforuser'] = 'Visa inlämning för användare: {$a}';
$string['viewsubmissiongradingtable'] = 'Visa tabell över betyg för inlämningar';
$string['viewsummary'] = 'Visa sammanfattning';
