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
 * Strings for component 'question', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Åtgärd';
$string['addanotherhint'] = 'Lägg till ett tips';
$string['addcategory'] = 'Lägg till kategori';
$string['adminreport'] = 'Rapport över  möjliga problem i Din frågedatabas.';
$string['answer'] = 'Svar';
$string['answersaved'] = 'Svar sparade';
$string['attemptfinished'] = 'Avslutat försök';
$string['attemptfinishedsubmitting'] = 'Försöket avslutades med inskicket:';
$string['attemptoptions'] = 'Försöksalternativ';
$string['availableq'] = 'Tillgänglig?';
$string['badbase'] = 'Dålig grund före **:{$a}**';
$string['behaviour'] = 'Beteende';
$string['behaviourbeingused'] = 'Beteende som används: {$a}';
$string['broken'] = 'Det här är en \'bruten\' länk, den pekar på en fil som inte finns.';
$string['byandon'] = 'av <em>{$a->user}</em> på <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Det gick inte att kopiera säkerhetskopian';
$string['cannotcreate'] = 'Kunde inte skapa ny post i tabellen question_attempts';
$string['cannotcreatepath'] = 'Det gick inte att skapa vägen: {$a}';
$string['cannotdeletebehaviourinuse'] = 'Du kan inte ta bort beteende "{$a}". Det används  i frågeförsök.';
$string['cannotdeletecate'] = 'Du kan inte ta bort den här kategorin eftersom det är standardkategorin i det här sammanhanget.';
$string['cannotdeletemissingbehaviour'] = 'Du kan inte avinstallera det saknade beteendet. Det krävs av systemet.';
$string['cannotdeletemissingqtype'] = 'Du kan inte ta bort den saknade frågetypen. Den är nödvändig för systemet.';
$string['cannotdeleteneededbehaviour'] = 'Det går inte att ta bort frågebeteendet &quot;{$a}&quot;. Det finns andra installerade beteenden som är beroende av den.';
$string['cannotdeleteqtypeinuse'] = 'Du kan inte ta bort frågetypen \'{$a}\'. Det finns frågor av den här typen i frågebanken.';
$string['cannotdeleteqtypeneeded'] = 'Du kan inte ta bort frågetypen \'{$a}\'. Det finns andra frågetyper installerade som är beroende av denna.';
$string['cannotenable'] = ' Det går inte att skapa frågetypen {$a} direkt.';
$string['cannotenablebehaviour'] = 'Frågebeteende {$a} kan inte användas direkt. Det är endast för internt bruk.';
$string['cannotfindcate'] = 'Det gick inte att hitta posten för kategori';
$string['cannotfindquestionfile'] = 'Det gick inte att hitta datafilen för frågor i zip-filen';
$string['cannotgetdsfordependent'] = 'Det gick inte att hitta det angivna datasetet för en fråga som är beroende av dataset! (fråga: {$a->id}, datasetitem: {$a->item})';
$string['cannotgetdsforquestion'] = 'Det gick inte att hitta det angivna datasetet för en kalkylerad fråga! (question: {$a})';
$string['cannothidequestion'] = 'Kunde inte dölja fråga';
$string['cannotimportformat'] = 'Import av det här formatet är tyvärr ännu inte implementerat!';
$string['cannotinsertquestion'] = 'Det gick inte att infoga ny fråga!';
$string['cannotinsertquestioncatecontext'] = 'Det gick inte att foga in den nya kategorin {$a->cat} för frågor p g a ett ogiltigt \'contextid\' {$a->ctx}';
$string['cannotloadquestion'] = 'Det gick inte att ladda fråga';
$string['cannotmovequestion'] = 'Du kan inte använda det här skriptet för att flytta frågor som är associerade till filer från olika andra områden. ';
$string['cannotopenforwriting'] = 'Det går inte att öppna för att skriva: {$a}';
$string['cannotpreview'] = 'Du kan inte förhandsgranska de här frågorna!';
$string['cannotread'] = 'Det går inte att läsa den importerade filen ({$a}) eller också är den tom';
$string['cannotretrieveqcat'] = 'Det gick att återhämta kategori för frågor';
$string['cannotunhidequestion'] = 'Det gick inte att ta fram frågan.';
$string['cannotunzip'] = 'Det gick inte att packa upp filen';
$string['cannotwriteto'] = 'Det går inte att skriva exporterade frågor till {$a}';
$string['category'] = 'Kategori';
$string['categorycurrent'] = 'Aktuell kategori';
$string['categorycurrentuse'] = 'Använd den här kategorin';
$string['categorydoesnotexist'] = 'Den här kategorin finns inte.';
$string['categoryinfo'] = 'Kategori info';
$string['categorymove'] = 'Denna kategori \'{$a->name}\' innehåller {$a->count} frågor.  Var vänlig välj en annan kategori att flytta dem till.';
$string['categorymoveto'] = 'Spara i kategori';
$string['categorynamecantbeblank'] = 'Kategorinamnet får inte vara tomt.';
$string['changeoptions'] = 'Ändra alternativ';
$string['changepublishstatuscat'] = '<a href="{$a->caturl}">Kategorin "{$a->name}"</a> i kursen "{$a->coursename}" kommer att få sin status för gemenskap ändrad från <strong>{$a->changefrom} till {$a->changeto}</strong>';
$string['check'] = 'Kontrollera';
$string['chooseqtypetoadd'] = 'Välj en frågetyp som Du vill lägga till';
$string['clearwrongparts'] = 'Radera felaktiga svar';
$string['clickflag'] = 'Flagga fråga';
$string['clicktoflag'] = 'Flagga denna fråga för framtida referens';
$string['clicktounflag'] = 'Ta bort flagga';
$string['clickunflag'] = 'Ta bort flagga';
$string['closepreview'] = 'Stäng förhandsgranskning';
$string['combinedfeedback'] = 'Kombinerad återkoppling';
$string['comment'] = 'Kommentar';
$string['commented'] = 'Kommenterade: {$a}';
$string['commentormark'] = 'Kommentera eller åsidosätt betyg';
$string['comments'] = 'Kommentarer';
$string['commentx'] = 'Kommentar: {$a}';
$string['complete'] = 'Komplett';
$string['contexterror'] = 'Du borde inte ha hamnat här om Du inte håller på att flytta en kategori från ett annat sammanhang';
$string['copy'] = 'Kopiera från {$a} och ändra länkar';
$string['correct'] = 'Rätt';
$string['correctfeedback'] = 'För varje rätt svar';
$string['created'] = 'Skapad';
$string['createdby'] = 'Skapad av';
$string['createdmodifiedheader'] = 'Skapad/Senast sparad';
$string['createnewquestion'] = 'Skapa en ny fråga';
$string['cwrqpfs'] = 'Slumpmässiga frågor som väljer frågor ur underkategorier.';
$string['cwrqpfsinfo'] = '<p>I samband med uppgraderingen till Moodle 1.9 kommer vi att fördela frågekategorier på olika sammanhang. En del frågekategorier och frågor på Din webbplats kommer att få sin status angående vad som är gemensamt ändrad. Detta är nödvändigt i det sällsynta fall där en eller fler slumpmässiga frågor i ett test har ställts in från en blandning av gemensamma och separata kategorier, så som är fallet på den här webbplatsen. Detta inträffar när en slumpmässig fråga är inställd till att välja ur underkategorier och en eller flera underkategorier har en annan status angående gemenskap än den föräldrakategori i vilken den slumpmässiga frågan har skapats.</p><p>De följande frågekategorierna, som slumpmässiga frågor i föräldrakategorier väljer frågor ur kommer i samband med uppgradering till Moodle 1.9 att få sin status ändrad till samma gemensamma status som kategorin med  den slumpmässiga frågan i. De följande kategorierna kommer att få sin status som gemensamma ändrad. De frågor som påverkas kommer att fortsätta att  fungera i alla befintliga test ända tills Du tar bort dem från dessa test.</p>';
$string['cwrqpfsnoprob'] = 'Inga frågekategorier på Din webbplats påverkas av funktionen \'Slumpmässiga frågor som väljer frågor ur underkategorier\'.';
$string['decimalplacesingrades'] = 'Decimaler i betyg';
$string['defaultfor'] = 'Förinställt standardvärde för {$a}';
$string['defaultinfofor'] = 'Det förinställda standardvärdet för frågor som är gemensamma i sammanhanget \'{$a}\'.';
$string['defaultmark'] = 'Förvalt betyg';
$string['deletebehaviourareyousure'] = 'Ta bort beteende {$a}: Är du säker?';
$string['deletebehaviourareyousuremessage'] = 'Du håller på att helt ta bort frågebeteende  {$a}. Detta kommer att ta bort allt i databasen associerat med detta frågebeteende. Är du säker på att du vill fortsätta?';
$string['deletecoursecategorywithquestions'] = 'Det finns frågor i frågebanken i associerade med denna kurs kategori. Om du fortsätter kommer de att raderas. Du kanske vill flytta dem först, med hjälp av gränssnittet i frågebanken.';
$string['deleteqtypeareyousure'] = 'Är Du säker på att Du vill ta bort frågetypen \'{$a}\' ';
$string['deleteqtypeareyousuremessage'] = 'Du håller på att ta bort frågetypen \'{$a}\' helt och hållet. Är Du säker på att Du vill avinstallera den?';
$string['deletequestioncheck'] = 'Är du helt säker på att du vill ta bort \'{$a}\'?';
$string['deletequestionscheck'] = 'Är du helt säker på att du vill ta bort följande frågor? <br /><br /> {$a}';
$string['deletingbehaviour'] = 'Radera frågebeteende "{$a}"';
$string['deletingqtype'] = 'Tar bort frågetypen\'{$a}\'';
$string['didnotmatchanyanswer'] = '[Matchade inte något svar]';
$string['disabled'] = 'Avaktiverad';
$string['displayoptions'] = 'Visa alternativ';
$string['disterror'] = 'Distributionen {$a} förorsakade problem';
$string['donothing'] = 'Kopiera inte eller flytta filer eller ändra länkar.';
$string['editcategories'] = 'Redigera kategorier';
$string['editcategories_help'] = 'Istället för att ha allt i en lång lista kan frågor arrangeras i kategorier och underkategorier.

Varje kategori har ett sammanhang som avgör var frågan i kategorin kan användas:

* Aktivitetssammanhang - Frågan är endast tillgänglig i aktivitetsmodulen
* Kurssammanhang - Frågan är tillgänglig i alla aktivitetsmoduler i kursen
* Kurskategorisammanhang - Frågan är tillgänglig i alla aktivitetsmoduler och kurser i kurskategorin
* System sammanhang - Frågan är tillgänglig i alla kurser och aktiviteter på webbplatsen

Kategorier används även för slumpvisa frågor då frågor väljs från en speciell kategori.';
$string['editcategory'] = 'Redigera kategori';
$string['editingcategory'] = 'Redigerar en kategori';
$string['editingquestion'] = 'Redigerar en fråga';
$string['editquestion'] = 'Redigera fråga';
$string['editquestions'] = 'Redigera frågor';
$string['editthiscategory'] = 'Redigera den här kategorin';
$string['emptyxml'] = 'Okänt fel - tomt imsmanifest.xml';
$string['enabled'] = 'Aktiverad';
$string['erroraccessingcontext'] = 'Det går inte att få tillgång till sammanhanget';
$string['errordeletingquestionsfromcategory'] = 'Fel i sb m borttagande av frågor från kategori {$a}';
$string['errorduringpost'] = 'Fel inträffade under efterbearbetning!';
$string['errorduringpre'] = 'Fel inträffade under förbehandling!';
$string['errorduringproc'] = 'Ett fel uppstod under bearbetning!';
$string['errorduringregrade'] = 'Det gick inte att regradera fråga {$a->qid} på väg till läget {$a->stateid}';
$string['errorfilecannotbecopied'] = 'Fel: Det går inte att kopiera filen {$a}.';
$string['errorfilecannotbemoved'] = 'Fel: Det går inte att flytta filen {$a}.';
$string['errorfileschanged'] = 'De fel-filer som har länkats till från frågor har ändrats sedan formuläret visades.';
$string['errormanualgradeoutofrange'] = 'Betyget/omdömet {$a->grade} ligger inte mellan 0 och {$a->maxgrade} för fråga {$a->name}. Resultatet och kommentaren har inte sparats.';
$string['errormovingquestions'] = 'Fel när du flyttade frågor med följande id {$a}.';
$string['errorpostprocess'] = 'Fel inträffade under efterbearbetning!';
$string['errorpreprocess'] = 'Fel inträffade under förbehandling!';
$string['errorprocess'] = 'Ett fel uppstod under bearbetning!';
$string['errorprocessingresponses'] = 'Ett fel uppstod när dina svar bearbetades ({$a}). Klicka fortsätt för att återvända till den sida du var på och försök igen.';
$string['errorsavingcomment'] = 'Fel när kommentar till frågan {$a->name} skulle sparas i databasen.';
$string['errorsavingflags'] = 'Fel vid sparande av status.';
$string['errorupdatingattempt'] = 'Fel vid uppdatering av försök {$a->id} i databasen.';
$string['exportcategory'] = 'Kategori för export';
$string['exportcategory_help'] = '<p align="center"><b>Exportera kategori</b></p>

<p><b>Kategori:</b> nedrullningsmenyn kan Du använda för att
välja den kategori som innehåller de frågor som Du vill exportera.</p>

<p>Vissa format för import (GIFT and XML Format) tillåter att
kategorin tas med i den skrivna filen vilket (som alternativ)
gör det möjligt att återskapa kategorierna vid import.
För att dessa data ska tas med så måste Du markera kryssrutan
<b>Till fil</b>.</p>';
$string['exporterror'] = 'Fel uppstod under exporten!';
$string['exportfilename'] = 'quiz';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Exportera frågor till fil';
$string['exportquestions_help'] = '<p>Den h&auml;r funktionen g&ouml;r det m&ouml;jligt f&ouml;r Dig att exportera en komplett kategori av fr&aring;gor till en textfil.  </p>
<p>L&auml;gg dock m&auml;rke till att i m&aring;nga filformat &auml;r det s&aring; att viss information
f&ouml;rsvinner n&auml;r man exporterar fr&aring;gorna. Det beror p&aring; att det finns m&aring;nga format som inte
st&ouml;djer alla de finesser som man kan anv&auml;nda i Moodle-fr&aring;gor.
Du b&ouml;r inte f&ouml;rv&auml;nta Dig att kunna exportera och importera fr&aring;gor
samtidigt som Du bevarar dem i exakt samma format.
Vissa typer av fr&aring;gor kanske inte g&aring;r att exportera alls.
Du b&ouml;r allts&aring; testa exporterade fr&aring;gor innan Du anv&auml;nder dem
i en skarp produktionsmilj&ouml;. </p>

<p>De format som f n st&ouml;djs &auml;r:</p>

<p><b>GIFT-formatet</b></p>
<ul>
<li>GIFT &auml;r det mest helt&auml;ckande import- och exportformatet som finns n&auml;r det g&auml;ller att
exportera testfr&aring;gor av Moodle-typ till en textfil.
Man har utformat det s&aring; att det ska vara en enkel metod f&ouml;r l&auml;rare att skriva fr&aring;gor som en textfil.
Det st&ouml;djer flervalsfr&aring;gor, fr&aring;gor av typen Sant-Falskt, kortsvar, para-ihop och numeriska fr&aring;gor.
Det st&ouml;djer &auml;ven test av typen: Vilket &auml;r det ord som saknas? L&auml;gg dock m&auml;rke till att test med inb&auml;ddade svar f n
inte st&ouml;djs. Olika fr&aring;getyper kan blandas i en enda textfil. Formatet st&ouml;djer &auml;ven kommentarer till rader,
namn p&aring; fr&aring;gor och procentviktade betyg/omd&ouml;men.
<br /><br />
Nedan kommer n&aring;gra exempel:
<pre>
Vem &auml;r begravd i "Grant\'s tomb"?{~Grant ~Jefferson =ingen}

Grant &auml;r{~begravd =gravsatt ~lever} i "Grant\'s tomb".
Grant &auml;r begravd i "Grant\'s tomb".{FALSE}

Vem &auml;r begravd i "Grant\'s tomb"?{=ingen =ingen alls}

N&auml;r f&ouml;ddes Ulysses S. Grant?{#1822}
</pre></li>
</ul>
<p align="right"><a href="help.php?file=formatgift.html&amp;module=quiz">Mer info om "GIFT"-formatet</a></p>

<p><b>XML-format för Moodle</b></p>

<p>Detta för Moodle specifika formatet exporterar testfrågor i ett enkelt XML-format. De kan sedan  importeras till en annan kategori av frågor eller användas i någon annan process så som XSLT transformation. XML-formatet kommer att exportera bilder som är kopplade till frågor.</p>

<p><b>IMS QTI 2.0</b></p>

<p>Exporterar i standardformatet IMS QTI (version 2.0). Lägg märke till att detta skapar en grupp filer inne i en enskild \'zip\'-fil.</p>
<p class="moreinfo"><a href="http://www.imsglobal.org/question/" target="_qti">Mer information om IMS QTI </a>
 (extern webbplats i nytt fönster)</p>

<p><b>XHTML</b></p>

<p>Exporterar kategorin som en enskild sida med \'strict\' XHTML. Varje fråga får en klar position inom sina egna &lt;div&gt; taggar. Om du vill använda den här sidan som-den-är så behöver du åtminstone redigera &lt;form&gt;-taggen vid början av &lt;body&gt;-sektionen för att tillhandahålla en lämplig åtgärd (t.ex. ett \'mailto\').</p>

<p>Import och export format är pluggbara resurser. Det kan finnas andra alternativa format i databasen för moduler och plugin-program.</p>

<p>Fler format kommer att tillkomma, vad helst annat som Moodle-anv&auml;ndare kan komma att bidra med! </p>';
$string['feedback'] = 'Återkoppling';
$string['filecantmovefrom'] = 'Frågefilerna kan inte flyttas eftersom du inte har behörighet att ta bort filer från den plats du försöker flytta dem från.';
$string['filecantmoveto'] = 'Frågefilerna kan inte flyttas eller kopieras eftersom du inte har behörighet att lägga till filer på den plats du försöker flytta till.';
$string['fileformat'] = 'Filformat';
$string['filesareacourse'] = 'arkiv för kursfiler';
$string['filesareasite'] = 'arkiv för filer på webbplatsnivå';
$string['filestomove'] = 'Flytta/kopiera filer till {$a}?';
$string['fillincorrect'] = 'Fyll i rätt svar';
$string['flagged'] = 'Flaggad';
$string['flagthisquestion'] = 'Flagga denna fråga';
$string['formquestionnotinids'] = 'Formuläret innehåll en fråga som saknar frågeID';
$string['fractionsnomax'] = 'Ett av svaren bör ha ett resultat på 100% så att det blir möjligt att få komplett betyg för den här frågan.';
$string['generalfeedback'] = 'Allmän återkoppling';
$string['generalfeedback_help'] = 'Generell återkoppling visas för eleven efter att denne har svarat på frågan. Till skillnad från specifik återkoppling, som beror på frågetyp och vilket svar eleven gav, visas samma generella återkoppling för alla elever.

Du kan använda generell återkoppling för att ge elever ett bearbetat svar och eventuellt en länk till mer information som de kan använda om de inte förstod frågorna.';
$string['getcategoryfromfile'] = 'Hämta kategori från fil';
$string['getcontextfromfile'] = 'Hämta sammanhang från fil';
$string['hidden'] = 'Dolt';
$string['hintn'] = 'Ledtråd {no}';
$string['hinttext'] = 'Ledtrådstext';
$string['howquestionsbehave'] = 'Hur frågor beter sig';
$string['howquestionsbehave_help'] = 'Elever kan interagera med frågorna i ett test på flera olika sätt. Till exempel vill du kanske att eleverna ska svara på alla frågor och sedan lämna in hela testet innan de får några poäng eller någon återkoppling. Detta motsvarar inställningen \'Uppskjuten återkoppling\'.

Alternativt vill du att eleverna skickar in varje fråga för sig medan de genomför testet för att de ska få omedelbar återkoppling samt, om de inte svarar rätt, kunna prova att svara igen med sänkt poäng. Detta motsvarar inställningen \'Interaktivt med multipla försök\'.

Dessa två lägen är troligen de mest vanligen använda för frågebeteenden.';
$string['ignorebroken'] = 'Ta inte hänsyn till brutna länkar';
$string['importcategory'] = 'Importera kategori';
$string['importcategory_help'] = 'Denna inställning avgör vilken kategori den importerade frågan kommer att tillhöra.

Vissa imporformat, såsom GIFT och Moodle XML, kan innehålla kategori och sammanhangsdata i den importerade filen. För att kunna använda denna data, istället för den valda kategorin, bör lämpliga inställningar väljas med kryssrutorna. Om de kategorier som anges i den importerade filen inte finns på webbplatsen kommer de att skapas.';
$string['importerror'] = 'Ett fel uppstod under importprocessen';
$string['importerrorquestion'] = 'Fel vid frågeimport';
$string['importfromcoursefiles'] = '...eller välj en kursfil att importera.';
$string['importfromupload'] = 'Välj fil att ladda upp ...';
$string['importingquestions'] = 'Importera {$a} frågor från fil';
$string['importparseerror'] = 'Fel uppstod vid analys av importfilen. Inga frågor har importerats. Om du vill prova importera dina bra frågor igen så ställ "Stoppa på fel" till "Nej"';
$string['importquestions'] = 'Importera frågor från fil';
$string['importquestions_help'] = 'Denna funktion möjliggör att frågor i en mängd olika format kan importeras från textfil. Notera att filen måste använda teckenkodning UTF-8.';
$string['importwrongfiletype'] = 'Den typ av fil som du valde ({$a->actualtype}) motsvarar inte den typ som förväntas av detta import format ({$a->expectedtype}).';
$string['impossiblechar'] = 'Ogiltligt tecken {$a} detekteras som parentes tecken';
$string['includesubcategories'] = 'Visa även frågor från underkategorier.';
$string['incorrect'] = 'Felaktig';
$string['incorrectfeedback'] = 'För varje felaktigt svar';
$string['information'] = 'Information';
$string['invalidanswer'] = 'Ofullständigt svar';
$string['invalidarg'] = 'Inga giltiga argument tillhandahållna eller felaktig serverkonfiguration';
$string['invalidcategoryidforparent'] = 'Ogiltigt kategori id för överliggande kategori.';
$string['invalidcategoryidtomove'] = 'Ogiltigt kategori-ID för flytt!';
$string['invalidconfirm'] = 'Bekräftelsesträngen var felaktig';
$string['invalidcontextinhasanyquestions'] = 'Ogiltig sammanhang skickas till question_context_has_any_questions.';
$string['invalidgrade'] = 'Betyg ({$a}) matchar inte betygsalternativen - frågan hoppas över.';
$string['invalidpenalty'] = 'Ogiltig straff';
$string['invalidwizardpage'] = 'Felaktig eller ingen guidesida angiven!';
$string['lastmodifiedby'] = 'Senast ändrad av';
$string['linkedfiledoesntexist'] = 'Den länkade filen {$a} finns inte.';
$string['makechildof'] = 'Gör om \'{$a}\'  till ett barn';
$string['makecopy'] = 'Skapa kopia';
$string['maketoplevelitem'] = 'Flytta till översta positionen';
$string['manualgradeoutofrange'] = 'Detta betyg är utanför det giltiga området.';
$string['manuallygraded'] = 'Manuellt betygsatta {$a->mark} med kommentar: {$a->comment}';
$string['mark'] = 'Rätta';
$string['markedoutof'] = 'Rättade av';
$string['markedoutofmax'] = 'Rättat av {$a}';
$string['markoutofmax'] = 'Antal rätt: {$a->mark} av {$a->max}';
$string['marks'] = 'Rätt';
$string['matchgrades'] = 'Matcha betyg';
$string['matchgradeserror'] = 'Fel om betyg inte listas';
$string['matchgrades_help'] = 'Importerade betyg måste överensstämma med någon av de fasta listorna över giltiga betyg - 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0 (även negativa värden). Om inte så finns det två möjligheter:

* Fel om betyg inte finns i listan - Om en fråga innehåller betyg som inte finns i listan visas ett felmeddelande och frågan importeras inte
* Närmaste betyg om inte i lista - Om ett betyg som inte finns i listan hittas ändras betyget till det närmsta värdet i listan.';
$string['matchgradesnearest'] = 'Närmaste betyg om det inte listats';
$string['missingcourseorcmid'] = 'Måste ange courseid eller cmid till print_question.';
$string['missingcourseorcmidtolink'] = 'Måste ange courseid eller cmid till get_question_edit_link.';
$string['missingimportantcode'] = 'Den här frågan saknar viktig kod: {$a}';
$string['missingoption'] = 'Den stängda frågan {$a} saknar svarsalternativ.';
$string['modified'] = 'Senast sparad';
$string['move'] = 'Flytta från {$a} och byt länkar';
$string['movecategory'] = 'Flytta kategori';
$string['movedquestionsandcategories'] = 'Flyttade frågor och kategorier fråga från {$a->oldplace} till {$a->newplace}.';
$string['movelinksonly'] = 'Ändra bara länkadresserna, flytta inte och kopiera inte filerna.';
$string['moveq'] = 'Flytta fråga/or';
$string['moveqtoanothercontext'] = 'Flytta fråga till ett annat sammanhang';
$string['moveto'] = 'Flytta till &gt;&gt;';
$string['movingcategory'] = 'Flyttar kategori';
$string['movingcategoryandfiles'] = 'Är Du säker på att Du vill flytta kategorin {$a->name} och alla barn-kategorier till sammanhanget för "{$a->contextto}"?<br />Vi har upptäckt {$a->urlcount} filer som är länkade från frågor i {$a->fromareaname}, skulle Du vilja kopiera eller flytta dessa till {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Är Du säker på att Du vill flytta kategorin "{$a->name}" och alla barn-kategorier till sammanhanget för "{$a->contextto}"?';
$string['movingquestions'] = 'Flyttar frågor och alla typer av filer';
$string['movingquestionsandfiles'] = 'Är Du säker på att Du vill flytta frågorna  {$a->questions}till sammanhanget <strong>"{$a->tocontext}"</strong>?Vi har upptäckt <strong>{$a->urlcount} filer</strong> som är länkade från dessa frågor i {$a->fromareaname}, skulle Du vilja kopiera eller flytta dessa till {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Är Du säker på att Du vill flytta frågorna  {$a->questions}till sammanhanget <strong>"{$a->tocontext}"</strong>?<br /> Det finns  <strong>inga filer</strong> som är länkade från dessa frågor i {$a->fromareaname}.';
$string['needtochoosecat'] = 'Du måste välja en kategori för att flytta den här frågan eller klicka på \'Avbryt\'.';
$string['nocate'] = 'Ingen sådan kategori {$a}!';
$string['nopermissionadd'] = 'Du har inte tillstånd att lägga till frågor här.';
$string['nopermissionmove'] = 'Du har inte behörighet att flytta frågor härifrån. Du måste spara frågan i denna kategori eller spara den som en ny fråga.';
$string['noprobs'] = 'Det fanns inga problem i Din databas för frågor.';
$string['noquestions'] = 'Inga frågor hittades som kunde exporteras. Se till att du har valt en kategori att exportera som innehåller frågor.';
$string['noquestionsinfile'] = 'Det finns inga frågor i den importerade filen';
$string['noresponse'] = '[Inget svar]';
$string['notanswered'] = 'Ej besvarad';
$string['notenoughanswers'] = 'Denna typ av fråga kräver minst {$a} svar';
$string['notenoughdatatoeditaquestion'] = 'Varken ett fråge-id, en kategori-id eller frågetyp har angivits.';
$string['notenoughdatatomovequestions'] = 'Du måste ange fråge-id för de frågor som Du vill flytta.';
$string['notflagged'] = 'Inte flaggad';
$string['notgraded'] = 'Inte rättad';
$string['notshown'] = 'Visas inte';
$string['notyetanswered'] = 'Inte besvarad än';
$string['notyourpreview'] = 'Den här förhandsvisningen tillhör inte dig.';
$string['novirtualquestiontype'] = 'Ingen virtuell frågetyp för frågetyp {$a}';
$string['numqas'] = 'Inga frågeförsök';
$string['numquestions'] = 'Inga frågor';
$string['numquestionsandhidden'] = '{$a->numquestions} (+{$a->numhidden} hidden)';
$string['options'] = 'Alternativ';
$string['orphanedquestionscategory'] = 'Frågor sparade från borttagna kategorier';
$string['orphanedquestionscategoryinfo'] = 'Ibland, oftast på grund av gamla programvarufel kan frågor finnas kvar i databasen trots att motsvarande frågekategori har tagits bort. Naturligtvis bör detta inte ske, men det har hänt tidigare på denna webbplats. Denna kategori har skapats automatiskt och frågor som saknar kategori flyttades hit så att du kan hantera dem. Observera att alla bilder eller mediafiler som används av dessa frågor har förmodligen har gått förlorade.';
$string['page-question-category'] = 'Frågekategori sida.';
$string['page-question-edit'] = 'Fråge redigeringssida';
$string['page-question-export'] = 'Fråge exportsida';
$string['page-question-import'] = 'Frågeimportsida';
$string['page-question-x'] = 'Vilken frågesida som helst';
$string['parent'] = 'Överliggande';
$string['parentcategory'] = 'Huvudkategori';
$string['parentcategory_help'] = 'Föräldrakategorin är den i vilken den nya kategorin placeras. "Överst" betyder att denna kategori inte ingår i/ under någon annan kategori. Sammanhang för kategori visas med fet text. Det måste finnas minst en kategori i varje sammanhang.';
$string['parenthesisinproperclose'] = 'Parentes innan ** är inte ordentligt stängd {$a} **';
$string['parenthesisinproperstart'] = 'Parentes innan ** är inte korrekt startade {$a} **';
$string['parsingquestions'] = 'Analysera frågor från importfilen';
$string['partiallycorrect'] = 'Delvis korrekt';
$string['partiallycorrectfeedback'] = 'För alla delvis korrekta svar';
$string['penaltyfactor'] = 'Avdragsfaktor';
$string['penaltyfactor_help'] = '<p>Du kan ange vilken del (fraktion) av det uppn&aring;dda resultatet som b&ouml;r dras av f&ouml;r varje felaktigt svar. Det h&auml;r &auml;r bara relevant om testet k&ouml;rs i adaptiv form s&aring; att studenten/eleven/deltagaren/den l&auml;rande har r&auml;tt att svara upprepade g&aring;nger p&aring; fr&aring;gan. Faktorn f&ouml;r avdrag b&ouml;r vara ett tal mellan 0 och 1. En faktor f&ouml;r avdrag p&aring; 1 betyder att studenten/eleven/deltagaren/den l&auml;rande m&aring;ste svara r&auml;tt p&aring; fr&aring;gan i sitt f&ouml;rsta svar f&ouml;r att &ouml;verhuvudtaget f&aring; tilgodor&auml;kna sig n&aring;gra po&auml;ng f&ouml;r fr&aring;gan. En faktor f&ouml;r avdrag p&aring; 0 betyder att studenten/eleven/deltagaren/den l&auml;rande kan f&ouml;rs&ouml;ka hur m&aring;nga g&aring;nger som helst och &auml;nd&aring; f&aring; h&ouml;gsta po&auml;ng.</p>';
$string['penaltyforeachincorrecttry'] = 'Straff för varje inkorrekt försök';
$string['penaltyforeachincorrecttry_help'] = 'När du använder din fråga med beteendet \'Interaktiv med multipla försök\' eller \'Anpassningsbar\', så att eleven får flera försök att svara rätt på frågan, då kontrollerar denna inställning hur mycket poängavdrag de får för varje felaktigt försök.

Poängavdraget är proportionerligt mot den totala poängen för frågan. Om frågan är värd 3 poäng och poängavdraget sätts till 0.3333333 får eleven 3 poäng vid rätt svar på första försöket, 2 poäng vid rätt svar i andra försöket och 1 poäng vid rätt svar i tredje försöket.';
$string['permissionedit'] = 'Redigera den här frågan';
$string['permissionmove'] = 'Flytta den här frågan';
$string['permissionsaveasnew'] = 'Spara det här som en ny fråga';
$string['permissionto'] = 'Du har tillstånd att:';
$string['previewquestion'] = 'Förhandsgranska fråga: {$a}';
$string['published'] = 'gemensam';
$string['qbehaviourdeletefiles'] = 'All data associerad med frågebeteendet "{$a->behaviour}" har tagits bort från databasen. För att slutföra borttagningen (och för att förhindra beteendet från att åter installera sig), bör du ta bort nu den här katalogen från servern: {$a->directory}';
$string['qtypedeletefiles'] = 'All data assocuerad med frågetyp "{$a->qtype}" har tagits bort från databasen. För att slutföra borttagningen (och för att förhindra frågetypen från att åter installera sig), bör du ta bort nu den här katalogen från servern: {$a->directory}';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">Frågan "{$a->name}" ({$a->qtype})</a> finns i den här frågekategorin men den används även i <a href="{$a->qurl}">test "{$a->quizname}"</a> i en annan kurs "{$a->coursename}".';
$string['questionbank'] = 'Frågebank';
$string['questionbehaviouradminsetting'] = 'Inställning för frågebeteenden';
$string['questionbehavioursdisabled'] = 'Frågebeteenden att inaktivera';
$string['questionbehavioursdisabledexplained'] = 'Mata in en kommaseparerad lista av frågebeteenden som du inte vill ska visas i rullgardinsmenyn';
$string['questionbehavioursorder'] = 'Ordning för frågebeteenden';
$string['questionbehavioursorderexplained'] = 'Ange en kommaseparerad lista med beteenden i den ordning du vill att de ska visas i rullgardinsmenyn';
$string['questioncategory'] = 'Frågekategori';
$string['questioncatsfor'] = 'Frågekategorier för \'{$a}\'';
$string['questiondoesnotexist'] = 'Den här frågan finns inte.';
$string['questionidmismatch'] = 'Identiteten för frågan stämmer inte överrens';
$string['questionname'] = 'Frågenamn';
$string['questionno'] = 'Fråga {$a}';
$string['questions'] = 'Frågor';
$string['questionsaveerror'] = 'Ett fel uppstod när frågan - ({$a}) sparades';
$string['questionsinuse'] = '(* Frågor markerade med en asterisk används redan i några tester. Dessa frågor kommer inte att tas bort från dessa tester utan bara i kategorilistan.)';
$string['questionsmovedto'] = 'Frågor som fortfarande används flyttades till "{$a}" i den överordnade kurskategorin.';
$string['questionsrescuedfrom'] = 'Frågor sparade från kontexten {$a}.';
$string['questionsrescuedfrominfo'] = 'Dessa frågor (av vilka några kan vara dolda) räddades när kontext {$a} ströks eftersom de fortfarande används av vissa tester eller andra aktiviteter.';
$string['questiontext'] = 'Frågetext';
$string['questiontype'] = 'Frågetyp';
$string['questionuse'] = 'Använd frågan i den här aktiviteten';
$string['questionvariant'] = 'Frågevariant';
$string['questionx'] = 'Fråga {$a}';
$string['requiresgrading'] = 'Kräver rättning';
$string['responsehistory'] = 'Svarshistorik';
$string['restart'] = 'Börja om';
$string['restartwiththeseoptions'] = 'Börja om med de här alternativen';
$string['reviewresponse'] = 'Granska svar';
$string['rightanswer'] = 'Rätt svar';
$string['rightanswer_help'] = 'en automatiskt genererad sammanfattning av det korrekta svaret. Denna kan vara begränsad så du kanske bör överväga att förklara det korrekta svaret i den generella återkopplingen för frågan och stänga av detta val.';
$string['save'] = 'Spara';
$string['saved'] = 'Sparad: {$a}';
$string['saveflags'] = 'Spara nuvarande tillstånd';
$string['selectacategory'] = 'Välj en kategori:';
$string['selectaqtypefordescription'] = 'Välj en frågetyp för att se dess beskrivning.';
$string['selectcategoryabove'] = 'Välj en kategori ovan';
$string['selectquestionsforbulk'] = 'Välj frågor för bulk åtgärder.';
$string['settingsformultipletries'] = 'Inställningar för flera försök';
$string['shareincontext'] = 'Dela i sammanhanget för {$a}';
$string['showhidden'] = 'Visa även gamla frågor.';
$string['showmarkandmax'] = 'Visa betyg och max';
$string['showmaxmarkonly'] = 'Visa endast toppbetyg';
$string['shown'] = 'Visas';
$string['shownumpartscorrect'] = 'Visa antalet korrekta svar';
$string['shownumpartscorrectwhenfinished'] = 'Visa antalet korrekta svar när frågan har slutförts';
$string['showquestiontext'] = 'Visa frågetext i frågelistan';
$string['specificfeedback'] = 'Specifik återkoppling';
$string['specificfeedback_help'] = 'Återkoppling som beror på vilket svar eleven gav.';
$string['started'] = 'Startad';
$string['state'] = 'Status';
$string['step'] = 'Steg';
$string['stoponerror'] = 'Stanna vid fel';
$string['stoponerror_help'] = 'Denna inställning avgör om importprocessen ska stoppas när ett fel upptäcks, vilket resulterar i att inga frågor importeras, eller om frågor som innehåller fel ska ignoreras och övriga frågor importeras.';
$string['submissionoutofsequence'] = 'Sekvensfel. Vänligen klicka inte på bakåt/framåt knapparna i din webbläsare när du arbetar med testets frågor.';
$string['submissionoutofsequencefriendlymessage'] = 'Du har skickat uppgifter utanför den normala sekvensen. Detta kan inträffa om du använder tillbaka eller framåt-knapparna i webbläsaren, använd inte dessa under testet. Det kan också hända om du klickar på något medan en sida laddas. Klicka på <strong>Fortsätt</strong> för att återuppta.';
$string['submit'] = 'Skicka';
$string['submitandfinish'] = 'Skicka och avsluta';
$string['submitted'] = 'Skicka:{$a}';
$string['technicalinfo'] = 'Teknisk information';
$string['technicalinfo_help'] = 'Denna tekniska information är troligen endast användbar för utvecklare av nya frågetyper. Det kan även vara till hjälp vid försök att hitta felaktigheter med frågor.';
$string['technicalinfominfraction'] = 'Minsta fraktion: {$a}';
$string['technicalinfoquestionsummary'] = 'Fråge sammanfattning {$a}';
$string['technicalinforightsummary'] = 'Rätt svar sammanfattning: {$a}';
$string['technicalinfostate'] = 'Tillstånd för fråga: {$a}';
$string['tofilecategory'] = 'Skriv kategori till fil';
$string['tofilecontext'] = 'Skriv sammanhang till fil';
$string['uninstallbehaviour'] = 'Avinstallera det här frågebeteendet.';
$string['uninstallqtype'] = 'Avinstallera den här frågetypen';
$string['unknown'] = 'Okänd';
$string['unknownbehaviour'] = 'Okänd frågebeteende: {$a}.';
$string['unknownorunhandledtype'] = 'Okänd eller ohanterbar frågetyp: {$a}';
$string['unknownquestion'] = 'Okänd fråga: {$a}.';
$string['unknownquestioncatregory'] = 'Okänd frågekategori: {$a}.';
$string['unknownquestiontype'] = 'Okänd frågetyp: {$a}';
$string['unknowntolerance'] = 'Okänd toleranstyp {$a}';
$string['unpublished'] = 'Inte gemensam';
$string['updatedisplayoptions'] = 'Uppdatera visningsalternativ';
$string['upgradeproblemcategoryloop'] = 'Problem upptäcktes vid uppgradering av frågekategorier. Det finns en loop i kategoriträdet. Den berörda kategorins ID är {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Det gick inte att uppdatera {$a->name} frågekategori ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'Problem upptäcktes vid uppgradering av frågekategorier. Kategori {$a->id} avser överkategorin {$a->parent}, som inte existerar. Överkatekorin ändrats att åtgärda problemet.';
$string['whethercorrect'] = 'Huruvida korrekt';
$string['whethercorrect_help'] = 'Detta täcker både textbeskrivningen \'Korrekt\', \'Delvis korrekt\' eller \'Felaktig\' och alla färgade markeringar som förmedlar samma information.';
$string['withselected'] = 'Med vald';
$string['wrongprefix'] = 'Felaktigt formaterad namnprefix {$a}';
$string['xoutofmax'] = '{$a->mark} av {$a->max}';
$string['yougotnright'] = 'Du har valt {$a->num}.';
$string['youmustselectaqtype'] = 'Du måste välja frågetyp.';
$string['yourfileshoulddownload'] = 'Din exportfil kommer att laddas ner inom kort. Om inte, <a href="{$a}">klicka här</a> .';
