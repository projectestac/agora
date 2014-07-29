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
 * Strings for component 'assignment', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Du har inlämningsuppgifter som behöver bearbetas';
$string['addsubmission'] = 'Lägg till inskickat bidrag';
$string['allowdeleting'] = 'Tillåt borttagande';
$string['allowdeleting_help'] = '<p>Om du aktiverar detta så kommer deltagare att kunna ta bort uppladdade filer när som helst innan de skickar in dem för betygssättning. </p>';
$string['allowmaxfiles'] = 'Maximalt antal uppladdade filer';
$string['allowmaxfiles_help'] = '<p>Det maximala antalet filer som varje deltagare får ladda upp.
Detta antal visas inte för studenterna/eleverna/deltagarna/de lärande så
om du vill att de ska veta det så måste du ta med det i instruktionen
till uppgiften.</p>';
$string['allownotes'] = 'Tillåt anteckningar';
$string['allownotes_help'] = '<p>Om detta är aktiverat så kan deltagarna mata in anteckningar i en textyta.
Det ungefär samma sak som en textbaserad online uppgift.</p>

<p>Den här textytan kan användas för kommunikation med den betygssättande personen,
beskrivning av hur arbetet med uppgiften fortskrider eller vilken annan aktivitet
som helst.</p>';
$string['allowresubmit'] = 'Låt användarna skicka om sina bidrag';
$string['allowresubmit_help'] = '<p>Standardvalet &auml;r att de l&auml;rande INTE kan
skicka in sina uppgifter igen n&auml;r distansl&auml;raren
v&auml;l har bed&ouml;mt/v&auml;rderat/betygssatt dem.</p>
<p>Om Du aktiverar den h&auml;r valm&ouml;jligheten s&aring; kommer de l&auml;rande att kunna
skicka in sina (reviderade) uppgifter igen efter det att de har
bed&ouml;mts/v&auml;rderats/betygssatts
(s&aring; att Du kan bed&ouml;ma/v&auml;rdera/betygss&auml;tta dem igen).</p>
<p>Det h&auml;r kan vara praktiskt om Du som distansl&auml;rare vill uppmuntra de l&auml;rande
att f&ouml;rb&auml;ttra sina insatser i en iterativ process.</p>
<p>Det g&auml;ller naturligtvis inte uppgifter som ska l&ouml;sas offline.</p>';
$string['alreadygraded'] = 'Din uppgift har redan blivit betygssatt och det är inte tillåtet att skicka en ny version av uppgiften.';
$string['assignment:addinstance'] = 'Lägg till en ny inlämningsuppgiftuppgift';
$string['assignmentdetails'] = 'Detaljer om uppgifter';
$string['assignment:exportownsubmission'] = 'Exportera egna inskickade bidrag';
$string['assignment:exportsubmission'] = 'Exportera inskickade bidrag';
$string['assignment:grade'] = 'Betygssätt uppgift';
$string['assignmentmail'] = '{$a->teacher} har skrivit in viss återkoppling på den uppgift \'{$a->assignment}\' som Du har skickat in.

Du hittar den som ett tillägg till Ditt inskickade bidrag: {$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} har skrivit viss återkoppling på den uppgift som Du har skickat in \'<i>{$a->assignment}</i>\'<br /><br />
Du hittar den som ett tillägg till Ditt <a href="{$a->url}">inskickade bidrag.</a>';
$string['assignmentmailsmall'] = '{$a->teacher} har gjort återkoppling till din inlämnade uyppgift för \'{$a->assignment}\' Du kan se det bifogat till din inlämning';
$string['assignmentname'] = 'Uppgiftens namn';
$string['assignmentsubmission'] = 'Inskickade inlämningsuppgifter';
$string['assignment:submit'] = 'Skicka in uppgift';
$string['assignmenttype'] = 'Uppgiftens typ';
$string['assignment:view'] = 'Visa uppgift';
$string['availabledate'] = 'Tillgänglig fr.o.m.';
$string['cannotdeletefiles'] = 'Det inträffade ett fel och det gick inte att ta bort filerna.';
$string['cannotviewassignment'] = 'Du kan inte visa den här uppgiften';
$string['changegradewarning'] = '';
$string['closedassignment'] = 'Inlämningsdatum för denna uppgift har gått ut.';
$string['comment'] = 'Kommentar';
$string['commentinline'] = 'Kommentar inne i dokument';
$string['commentinline_help'] = '<p>Om det h&auml;r alternativet &auml;r f&ouml;rvalt s&aring; kommer den urprungliga
inskickade uppgiften att kopieras in i textf&auml;ltet f&ouml;r den kommenterande
&aring;terkopplingen n&auml;r uppgiften ska betygss&auml;ttas. Det g&ouml;r det l&auml;ttare att
infoga kommentarer eller redigera direkt i uppgiften. Man kan t.ex. anv&auml;nda en annan
textf&auml;rg.</p>';
$string['configitemstocount'] = 'Typ av komponenter som ska räknas för studenters inskickade uppgifter online';
$string['configmaxbytes'] = 'Standardinställningen för den maximala storleken på inskickade uppgifter. Du kan också ställa in ett eget värde för varje kurs och även andra lokala begränsningar är möjliga.';
$string['configshowrecentsubmissions'] = 'Alla kan se meddelanden om inskickade uppgifter in rapporterna för senaste aktivitet.';
$string['confirmdeletefile'] = 'Är Du helt säker på att Du vill ta bort den här filen? <br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'Kursen är felaktigt konfigurerad';
$string['currentgrade'] = 'Aktuellt betyg/omdöme i betygskatalogen';
$string['deleteallsubmissions'] = 'Ta bort alla inskickade uppgifter';
$string['deletefilefailed'] = 'Det gick inte att ta bort filen.';
$string['description'] = 'Beskrivning';
$string['downloadall'] = 'Ladda ner alla uppgifter som en zip-fil';
$string['draft'] = 'Utkast';
$string['due'] = 'Tidsgräns för uppgift';
$string['duedate'] = 'Slutdatum/tid';
$string['duedateno'] = 'Inget slutdatum/tid';
$string['early'] = '{$a} tidigt';
$string['editmysubmission'] = 'Redigera min inskickade uppgiftslösning';
$string['editthesefiles'] = 'Redigera dessa filer';
$string['editthisfile'] = 'Uppdatera den här filen';
$string['emailstudents'] = 'Påminnelser via e-post till studenter';
$string['emailteachermail'] = '{$a->username} har uppdaterat sina inskickade uppgiftslösningar för
 \'{$a->assignment}\' den at {$a->timeupdated}

Den är tillgänglig här:

   {$a->url}';
$string['emailteachermailhtml'] = '{$a->username} har uppdaterat sin inskickade uppgiftslösning för <i>\'{$a->assignment}\' den {$a->timeupdated}</i><br /><br />Den är <a href="{$a->url}"> tillgänglig på webbplatsen.';
$string['emailteachers'] = 'Skicka ett e-postmeddelande med information till distanslärarna';
$string['emailteachers_help'] = '<p>Om detta &auml;r aktiverat s&aring; blir l&auml;rare informerade via ett kort e-postmeddelande varje g&aring;ng en student l&auml;gger till eller uppdaterar en inskickad uppgiftsl&ouml;sning. </p> <p>Endast de l&auml;rare som har r&auml;tt att s&auml;tta betyg p&aring;/avge omd&ouml;men om den aktuella inskickade uppgiftsl&ouml;sningen f&aring;r ett s&aring;dant meddelande. Allts&aring;. om t.ex. kursen anv&auml;nder olika grupper s&aring; kommer de l&auml;rare som bara &auml;r f&ouml;rdelade p&aring; vissa grupper inte att f&aring; meddelanden om studenter i andra grupper.</p> <p>N&auml;r det g&auml;ller aktiviteter offline s&aring; skickas f&ouml;rst&aring;s aldrig n&aring;gra meddelanden, eftersom ingen skickar in n&aring;gra uppgiftsl&ouml;sningar.</p>';
$string['emptysubmission'] = 'Du har inte skickat in någonting än';
$string['enablenotification'] = 'Skicka e-post med meddelanden';
$string['enablenotification_help'] = '<p>Om du aktiverar detta så kommer studenterna/eleverna/deltagarna/de lärande att få meddelanden via e-post angående sina betyg och återkoppling.</p>

<p>Dina personliga preferenser kommer att sparas och de kommer att tillämpas på alla inskickade uppgifter som du betygsätter.</p>';
$string['errornosubmissions'] = 'Det finns inga inskickade bidrag att ladda ner';
$string['existingfiledeleted'] = 'Befintlig fil har tagits bort: &a';
$string['failedupdatefeedback'] = 'Uppdateringen av återkopplingen för det inskickade bidraget av användaren {$a} fungerade inte';
$string['feedback'] = 'Återkoppling';
$string['feedbackfromteacher'] = 'Återkoppling på inskickade uppgiftslösningar för {$a} personer har uppdaterats';
$string['feedbackupdated'] = 'Återkopplingen för inskickade bidrag för {$a} användare har uppdaterats';
$string['finalize'] = 'Spärra så att inga fler uppgifter kan skickas in';
$string['finalizeerror'] = 'Det inträffade ett fel och det gick inte inte att avsluta inskickningen av uppgiften.';
$string['futureaassignment'] = 'Uppgiften är ännu inte tillgänglig';
$string['graded'] = 'Betygssatt';
$string['guestnosubmit'] = 'Gäster får tyvärr inte skicka in uppgifter. Du måste logga in/registrera Dig innan Du får skicka in Ditt svar.';
$string['guestnoupload'] = 'Gäster får tyvärr inte ladda upp någonting.';
$string['helpoffline'] = 'Det här är användbart när en uppgift ska lösas <br />utanför Moodle. Det kan vara något någon <br /> annanstans på webben eller f2f.<br /> <br /> Studenter kan se en <br /> beskrivning av uppgiften men de kan inte ladda <br />upp någonting. Betyg/omdömen kan Du avge som<br /> vanligt och studenterna<br />kommer att få meddelanden om sina betyg/omdömen.';
$string['helponline'] = 'Den här typen av uppgift ber användaren att <br /> skriva en text genom att använda den vanliga <br />redigeraren på webbsidan. Lärare kan sedan sätta <br />betyg/avge omdömen om detta online och t.o.m.<br /> lägga till kommentarer eller ändringar inne i texten.';
$string['helpupload'] = '<p>I den här typen av uppgifter är det tillåtet för varje deltagare att ladda upp en eller flera filer av valfri typ.</p><p>Detta kan vara Word-dokument, bilder, en komprimerad webbplats eller vad som helst som Du ber dem skicka in.</p><p>Den här typen låter Dig även att skicka in ett flertal uppgiftslösningar i olika format.</p>';
$string['helpuploadsingle'] = 'Den här typen av uppgift gör det möjligt för alla<br />användare att ladda upp en enskild fil av valfritt<br />format. Det kan vara ett Word-dokument,<br />en bild, en zippad webbplats eller vad helst <br />Du ber dem ladda upp.</p>';
$string['hideintro'] = 'Dölj beskrivning till den dag uppgiften publiceras';
$string['hideintro_help'] = '<p>Om detta är aktiverat så kommer beskrivningen av uppgiften att vara dold tills dess uppgiften blir tillgänglig.</p>';
$string['invalidassignment'] = 'felaktig uppgift';
$string['invalidfileandsubmissionid'] = 'Saknad fil eller inlämnings ID';
$string['invalidid'] = 'ID för uppgiften var felaktigt';
$string['invalidsubmissionid'] = 'Felaktigt inlämnings ID';
$string['invalidtype'] = 'Felaktig typ av uppgift';
$string['invaliduserid'] = 'Ogiltigt användar-ID';
$string['itemstocount'] = 'Räkna';
$string['lastgrade'] = 'Senaste betyg/omdöme';
$string['late'] = '{$a} sent';
$string['maximumgrade'] = 'Maximum betyg';
$string['maximumsize'] = 'Maximum storlek';
$string['maxpublishstate'] = 'Maximal synlighet för inlägg i blogg före datum för offentliggörande';
$string['messageprovider:assignment_updates'] = 'Anteckningar om uppgifter';
$string['modulename'] = 'Uppgift (2.2)';
$string['modulename_help'] = '<p><img src="<?php echo $CFG->wwwroot?>/mod/assignment/icon.gif" alt="" />&nbsp;<b>Uppgifter</b></p>
<ul>
<li>Uppgifter till&aring;ter distansl&auml;raren att formulera en uppgift som
inneb&auml;r att de l&auml;rande ska g&ouml;ra iordning digitalt inneh&aring;ll
(i valfritt format) och skicka in det till servern.</li>
</ul>
<ul>
<li>Ess&auml;er, projekt, rapporter
osv. &auml;r exempel p&aring; typiska uppgifter.</li>
</ul>
<ul>
<li>Den h&auml;r modulen till&aring;ter
bed&ouml;mning/v&auml;rdering/betygss&auml;ttning.</li>
</ul>';
$string['modulenameplural'] = 'Uppgifter';
$string['newsubmissions'] = 'Uppgifterna är inskickade';
$string['noassignments'] = 'Det finns inga uppgifter ännu.';
$string['noattempts'] = 'Det har inte gjorts några försök att lösa den här uppgiften.';
$string['noblogs'] = 'Du har inte skrivit in några inlägg i bloggen som Du kan bekräfta!';
$string['nofiles'] = 'Inga filer skickades in';
$string['nofilesyet'] = 'Inga filer har skickats in ännu';
$string['nomoresubmissions'] = 'Det är inte tillåtet att skicka in några fler uppgifter';
$string['norequiregrading'] = 'Det finns inga uppgifter som behöver betygssättas';
$string['nosubmisson'] = 'Inga uppgifter har lämnats in';
$string['notavailableyet'] = 'Den här uppgiften är tyvärr inte tillgänglig ännu.<br />Instruktioner för uppgiften kommer att visas här på det datum som visas nedan.';
$string['notes'] = 'Anteckningar';
$string['notesempty'] = 'Inget bidrag';
$string['notesupdateerror'] = 'Fel i samband med uppdatering av anteckningar';
$string['notgradedyet'] = 'Ännu ej bedömd';
$string['notsubmittedyet'] = 'Ännu inte inskickade uppgifter';
$string['onceassignmentsent'] = 'När Du väl har skickat in uppgiften för bedömning/betygssättning så kommer Du inte längre att kunna ta bort eller bifoga fil(er).';
$string['operation'] = 'Operation';
$string['optionalsettings'] = 'Valfria inställningar';
$string['overwritewarning'] = 'Varning: uppladdning igen kommer att ERSÄTTA Ditt nuvarande redan inskickade bidrag';
$string['page-mod-assignment-submissions'] = 'Uppgiftsmodulens inlämningssida';
$string['page-mod-assignment-view'] = 'Uppgiftsmodulens huvudsida';
$string['page-mod-assignment-x'] = 'Varje uppgiftsmodulsida';
$string['pagesize'] = 'Antal inskickade uppgifter som visas per sida';
$string['pluginadministration'] = 'Administration av uppgift';
$string['pluginname'] = 'Uppgift (2.2)';
$string['popupinnewwindow'] = 'Öppna i ett popup-fönster';
$string['preventlate'] = 'Förhindra att någon skickar in försenade uppgiftslösningar';
$string['quickgrade'] = 'Tillåt snabb betygssättning';
$string['quickgrade_help'] = '<p>Genom att aktivera Snabba betyg/omd&ouml;men kan Du snabbt s&auml;tta betyg p&aring;/avge omd&ouml;men om flerfaldiga uppgifter p&aring; en sida.</p>

<p>Ändra bara p&aring; betygen/omd&ouml;mena och kommentarerna och anv&auml;nd knappen \'Spara\' f&ouml;r att spara alla Dina &auml;ndringar f&ouml;r den sidan omedelbart.</p>

<p>De normala knapparna f&ouml;r betyg/omd&ouml;men till h&ouml;ger kommer fortfarande att fungera ifall Du beh&ouml;ver mer utrymme. Dina inst&auml;llningar f&ouml;r Snabba betyg/omd&ouml;men har sparats och kommer att till&auml;mpas p&aring; alla uppgifter i alla kurser.</p>';
$string['requiregrading'] = 'Gör betyg/omdöme obligatoriskt';
$string['responsefiles'] = 'Responsfiler';
$string['reviewed'] = 'Recenserad';
$string['saveallfeedback'] = 'Spara alla mina återkopplingar';
$string['selectblog'] = 'Välj vilket inlägg i bloggen som Du vill bekräfta';
$string['sendformarking'] = 'Skicka för bedömning';
$string['showrecentsubmissions'] = 'Visa aktuella inskickade uppgifter';
$string['submission'] = 'Inskickad uppgift';
$string['submissiondraft'] = 'Utkast till inskickad uppgift';
$string['submissionfeedback'] = 'Återkoppling för inskickad uppgift';
$string['submissions'] = 'Inskickade uppgifter';
$string['submissionsaved'] = 'Dina ändringar har sparats';
$string['submissionsnotgraded'] = '{$a} inskickad uppgiftslösningar som inte har bedömts/betygssatts';
$string['submitassignment'] = 'Skicka in Din uppgift med detta formulär';
$string['submitedformarking'] = 'Uppgiften har skickats för bedömning och går därför inte att uppdatera.';
$string['submitformarking'] = 'Skicka för bedömning';
$string['submitted'] = 'Inskickad';
$string['submittedfiles'] = 'Inskickade filer';
$string['subplugintype_assignment'] = 'Uppgiftens typ';
$string['subplugintype_assignment_plural'] = 'Uppgiftstyper';
$string['trackdrafts'] = 'Aktivera knappen \'Skicka för bedömning';
$string['trackdrafts_help'] = 'Knappen "Skicka in för bedömning" gör det möjligt för användare att signalera till lärare att de har avslutat arbetet med en uppgift. Lärarna kan ändå välja att omvandla uppgiften till ett utkast (t.ex. om den kräver ytterligare arbete).';
$string['typeblog'] = 'Inlägg i blogg';
$string['typeoffline'] = 'Aktivitet offline';
$string['typeonline'] = 'Aktivitet online';
$string['typeupload'] = 'Avancerad uppladdning av filer';
$string['typeuploadsingle'] = 'Ladda upp en enskild fil';
$string['unfinalize'] = 'Återställ till utkast - tillåt ny uppladdning';
$string['unfinalizeerror'] = 'Det inträffade ett fel och det gick inte att omdefiniera den inskickade uppgiften till ett utkast.';
$string['unfinalize_help'] = 'Att återställa uppgiften till ett utkast gör det möjligt för studenten/eleven/deltagaren/den lärande att ytterligare uppdatera sin uppgift.';
$string['upgradenotification'] = 'Denna aktivitet är baserad på en äldre uppgiftsmodul.';
$string['uploadafile'] = 'Ladda upp en fil';
$string['uploadbadname'] = 'Detta filnamn innehåller ej standardiserade tecken och filen kunde inte laddas upp';
$string['uploadedfiles'] = 'Uppladdade filer';
$string['uploaderror'] = 'Ett fel inträffade när filen sparades på servern';
$string['uploadfailnoupdate'] = 'Filen laddades upp korrekt, men Ditt inskickade bidrag blev inte uppdaterat.';
$string['uploadfiles'] = 'Ladda upp filer';
$string['uploadfiletoobig'] = 'Tyvärr, men den filen är för stor (begränsningen är {$a} byte)';
$string['uploadnofilefound'] = 'Ingen fil hittades - är Du säker på att Du valde en för att ladda upp?';
$string['uploadnotregistered'] = '\'{$a}\' blev uppladdad, men det inskickade bidraget registrerades inte!';
$string['uploadsuccess'] = 'Uppladdningen av \'{$a}\' lyckades';
$string['usermisconf'] = 'Användaren är felaktigt konfigurerad';
$string['usernosubmit'] = 'Du har tyvärr inte tillstånd att skicka in någon uppgift';
$string['viewassignmentupgradetool'] = 'Se uppgiftuppgraderingsverktyget';
$string['viewfeedback'] = 'Visa betyg/omdömen och återkoppling på uppgifterna';
$string['viewmysubmission'] = 'Visa mitt inskickade bidrag';
$string['viewsubmissions'] = 'Visa {$a} inskickade bidrag';
$string['yoursubmission'] = 'Din inskickade uppgift';
