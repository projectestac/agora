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
 * Strings for component 'lesson', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   lesson
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Styrning av tillgänglighet';
$string['actionaftercorrectanswer'] = 'Det som händer vid rätt svar';
$string['actionaftercorrectanswer_help'] = '<p>Det normala om svaret är rätt, är att följa hoppet så som det är angivet i svaret.
I de flesta fall kommer detta antagligen att visa Nästa sida i lektionen, alltså i situationer
när studenten/ eleven/ deltagaren/ den lärande leds genom lektionen på ett logiskt sätt
med start på sidan ett och med avslutning på den sista.</p>
<p>Lektionsmodulen kan emellertid också användas som en sorts uppgift av typ <i>Flash-kort</i>.
	Studenten/ eleven/ deltagaren/ den lärande får se en viss information (valfritt) och en fråga
	i slumpmässig ordning. Det finns egentligen ingen klar början och tydligt slut, utan
	bara en uppsättning  <i>kort</i> som visas den ena efter den andra i en slumpmässig ordning.</p>
<p>Det här alternativet möjliggör två väldigt likartade beteenden för Flash-kort.
Alternativet "Visa en ny sida" visar aldrig samma sida två gånger (inte ens om studenten/ eleven/ deltagaren/ den lärande
<b> inte</b> lämnade ett korrekt svar på den fråga som var kopplad till sidan/kortet).
Det andra, icke-standardmässiga alternativet "Visa en obesvarad sida" låter studenten/ eleven/ deltagaren/ den lärande
se sidor som kan ha förekommit tidigare men bara om den därtill hörande frågan har besvarats felaktigt.</p>
<p>I båda dessa lektioner av typ Flash-kort kan Du som t ex (distans)lärare
bestämma Dig för att använda antingen alla sidorna/korten i lektionen eller bara en (slumpmässig) deluppsättning. Detta styr Du med parametern "Antal sidor/kort att visa".</p>';
$string['actions'] = 'Åtgärder';
$string['activitylink'] = 'Länk till en aktivitet';
$string['activitylink_help'] = '<p>Nedrullningsmenyn innehåller alla aktiviteter för den här kursen. Om Du väljer en då kommer det att skapas en länk till den. Länken kommer att visas i slutet på Lektionen.</p>';
$string['activitylinkname'] = 'Gå till: {$a}';
$string['addabranchtable'] = 'Lägg till en sida med innehåll';
$string['addanendofbranch'] = 'Lägg till ett slut på förgrening';
$string['addanewpage'] = 'Lägg till en ny sida';
$string['addaquestionpage'] = 'Lägg till en sida med fråga';
$string['addaquestionpagehere'] = 'Lägg till en sida med en fråga här';
$string['addbranchtable'] = 'Lägg till en innehållssida';
$string['addcluster'] = 'Lägg till ett kluster';
$string['addedabranchtable'] = 'Lade till en innehållssida';
$string['addedanendofbranch'] = 'Lade till ett slut på en förgrening';
$string['addedaquestionpage'] = 'Lade till en frågesida';
$string['addedcluster'] = 'Lade till ett kluster';
$string['addedendofcluster'] = 'Lade till ett slut på ett kluster';
$string['addendofcluster'] = 'Lägg till slut till klustret';
$string['addpage'] = 'Lägg till en sida';
$string['anchortitle'] = 'Början av det huvudsakliga innehållet';
$string['and'] = 'OCH';
$string['answer'] = 'Svar';
$string['answeredcorrectly'] = 'besvarad korrekt';
$string['answersfornumerical'] = 'Svar på numeriska frågor bör vara matchade par av minimala och maximala värden';
$string['arrangebuttonshorizontally'] = 'Vill Du ordna knapparna till innehåll horisontellt?';
$string['attempt'] = 'Försök: {$a}';
$string['attempts'] = 'Försök';
$string['attemptsdeleted'] = 'Tog bort försök';
$string['attemptsremaining'] = 'Du har {$a} återstående försök';
$string['available'] = 'Tillgänglig fr.o.m.';
$string['averagescore'] = 'Genomsnittsligt resultat';
$string['averagetime'] = 'Genomsnittslig tid';
$string['branch'] = 'Innehåll';
$string['branchtable'] = 'Innehåll';
$string['cancel'] = 'Avbryt';
$string['cannotfindanswer'] = 'Fel: det gick inte att hitta svar';
$string['cannotfindattempt'] = 'Fel: det gick inte att hitta försök';
$string['cannotfindessay'] = 'Fel: Det gick inte att hitta en essä';
$string['cannotfindfirstgrade'] = 'Fel: det gick inte att hitta betyg/omdömen';
$string['cannotfindfirstpage'] = 'Det gick inte att hitta den första sidan';
$string['cannotfindgrade'] = 'Fel: det gick inte att hitta betyg/omdömen';
$string['cannotfindnewestgrade'] = 'Fel: det gick inte att hitta det senaste betyget/omdömet';
$string['cannotfindnextpage'] = 'Säkerhetskopiering av lektion: Det gick inte att hitta nästa sida!';
$string['cannotfindpagerecord'] = 'Lägg till slut på förgrening: det gick inte att hitta posten för sidan';
$string['cannotfindpages'] = 'Det gick inte att hitta sidor i lektionen';
$string['cannotfindpagetitle'] = 'Bekräfta borttagande: det gick inte att hitta titeln på sidan.';
$string['cannotfindpreattempt'] = 'Det gick inte att hitta posten angående det föregående försöket!';
$string['cannotfindrecords'] = 'Fel: det gick inte att hitta posterna till lektionen';
$string['cannotfindtimer'] = 'Fel: det gick inte att hitta lesson_timer records';
$string['cannotfinduser'] = 'Fel: det gick inte att hitta användare';
$string['canretake'] = '{$a} kan göra om';
$string['casesensitive'] = 'Använd standarduttryck';
$string['casesensitive_help'] = '<p>Några av frågetyperna har ett alternativ som Du aktiverar genom att markera
en kryssruta. Du hittar en detaljerad beskrivning av frågetyperna och innebörden av alternativen här nedan:</p>
<ol>
<li><b>Multichoice (flervalsfrågor)</b><br />
Det finns en variant av flervalsfrågor som kallas <b>"Flervals/Flersvarsfrågor"</b>
Om man väljer Alternativ för fråga så ombeds man att välja alla de svarsalternativ som är korrekta.
Det kan, eller inte, framgå av frågan  <i>hur många</i> korrekta svar det finns.
Ett exempel: "Vilka av de följande personerna var presidenter i USA?" talar inte om hur många det är.
"Välj de två personer som har varit presidenter i USA" gör det.
Det faktiska antalet korrekta svar kan vara allt från ett till samtliga svarsalternativ.
En fråga av typen flervalssvar med ett korrekt svar skiljer sig från
en Flervalsfråga på så sätt att den förra ger Dig möjlighet att välja mer än ett svar
vilket den andra inte gör.
</li>
<li><b>Kortsvarsfråga</b><br /> Som standard så är jämförelsen inte skiftlägeskänslig.
  Om Du har markerat Alternativ för fråga så kommer det att vara skillnad på
  stor och liten bokstav. </li>
</ol>
<p>Övriga frågetyper använder inte Alternativ för fråga.</p>';
$string['checkbranchtable'] = 'Kontrollera innehållsida';
$string['checkedthisone'] = 'kontrollerade den här.';
$string['checknavigation'] = 'Kontrollera navigation';
$string['checkquestion'] = 'Kontrollera fråga';
$string['classstats'] = 'Statistik för klass';
$string['clicktodownload'] = 'Klicka på den följande länken för att ladda ner filen.';
$string['clicktopost'] = 'Klicka här för att lägga till Ditt betyg/omdöme till listan över Höga resultat.';
$string['cluster'] = 'Kluster';
$string['clusterjump'] = 'Ej visad fråga inom ett kluster';
$string['clustertitle'] = 'Kluster';
$string['collapsed'] = 'Komprimerad';
$string['comments'] = 'Dina kommentarer';
$string['completed'] = 'Avslutad';
$string['completederror'] = 'Fullfölj lektionen';
$string['completethefollowingconditions'] = 'Du måste uppfylla följande villkor i <b>{$a}</b> lektion innan Du kan fortsätta.';
$string['conditionsfordependency'] = 'Villkor för beroendet';
$string['configactionaftercorrectanswer'] = 'Det standardmässiga förvalet av åtgärd efter rätt svar';
$string['configmaxanswers'] = 'Det standardmässiga förvalet av maximalt antal svar per sida';
$string['configmaxhighscores'] = 'Antal höga resultat som visas';
$string['configmediaclose'] = 'Visar en stängningsknapp som en del av det popup-fönster som skapas för en länkad mediafil';
$string['configmediaheight'] = 'Avgör höjden på det popup-fönster som visas för en länkad mediafil';
$string['configmediawidth'] = 'Avgör bredden på det popup-fönster som visas för en länkad mediafil';
$string['configslideshowbgcolor'] = 'Bakgrundsfärg för bildspelet om det är aktiverat';
$string['configslideshowheight'] = 'Avgör höjden på bildspelet om det är aktiverat';
$string['configslideshowwidth'] = 'Avgör bredden på bildspelet om det är aktiverat';
$string['confirmdelete'] = 'Ta bort sida';
$string['confirmdeletionofthispage'] = 'Bekräfta att Du vill ta bort den här sidan';
$string['congratulations'] = 'Gratulerar - lektionen är slut här';
$string['continue'] = 'Fortsätt';
$string['continuetoanswer'] = 'Fortsätt att ändra svar';
$string['continuetonextpage'] = 'Fortsätt till nästa sida.';
$string['correctanswerjump'] = 'Hopp enligt korrekt svar';
$string['correctanswerscore'] = 'Resultat avseende korrekta svar';
$string['correctresponse'] = 'Korrekt svar';
$string['credit'] = 'Tillgodoräknande';
$string['customscoring'] = 'Egen utformning av resultat';
$string['customscoring_help'] = '<p>Det här ger Dig möjlighet att ange ett numeriskt värde (en siffra) för varje svar.
Svar kan antingen ha negativa eller positiva värden. Importerade frågor kommer att automatiskt
tilldelas 1 poäng för rätt svar och 0 poäng för felaktiga svar. Detta kan Du dock ändra efter det att Du har importerat frågorna.</p>';
$string['deadline'] = 'Stoppdatum/tid';
$string['defaultessayresponse'] = 'Din essä kommer att få ett betyg/omdöme av kursens distanslärare.';
$string['deleteallattempts'] = 'Ta bot alla försök att genomföra lektionen';
$string['deletedefaults'] = 'Tog bort {$a} x lektion standardinställning';
$string['deletedpage'] = 'Borttagen sida';
$string['deleting'] = 'Tar bort';
$string['deletingpage'] = 'Tar bort sidan: {$a}';
$string['dependencyon'] = 'Beror på';
$string['dependencyon_help'] = '<p>Med den här inställningen kan Du göra den aktuella lektionen beroende av hur studenten/ eleven/ deltagaren/ den lärande har presterat i en annan lektion som är del av samma kurs. Om kraven på prestation inte har uppfyllts då kommer studenten/ eleven/ deltagaren/ den lärande inte att få tillgång till den här lektionen.</p>

<p>I villkoren för beroendet kan följande ingå:
    <ul>
        <li><b>Den tid som har använts:</b> studenten/ eleven/ deltagaren/ den lärande måste använda den här angivna tiden för att genomföra lektionen.</li>
        <li><b>Genomförd:</b>  studenten/eleven/deltagaren/den lärande måste genomföra den obligatoriska lektionen.</li>
        <li><b>Betyg/omdöme högre än:</b> studenten/ eleven/ deltagaren/ den lärande måste  uppnå ett betyg/omdöme som är högre än det som är angivet här. </li>
    </ul>
    Alla kombinationer av det ovanstående kan användas om det behövs.
</p>';
$string['description'] = 'Beskrivning';
$string['detailedstats'] = 'Detaljerad statistik';
$string['didnotanswerquestion'] = 'Besvarade inte den här frågan';
$string['didnotreceivecredit'] = 'Fick inte tillgodoräkna sig resultat';
$string['displaydefaultfeedback'] = 'Visa förinställd återkoppling';
$string['displaydefaultfeedback_help'] = '<p align="center"><strong>Visa standardiserad återkoppling </strong></p>

<p>Om detta är inställt till <strong>Ja</strong>, då kommer, när det inte går att hitta något förslag till återkoppling för en viss fråga, den standardiserade återkopplingen \'Det är ett korrekt svar\' eller \'Det är ett felaktigt svar\' att användas. </p>
<p>Om detta är inställt till <strong>Nej</strong>, då kommer, när det inte går att hitta något förslag till återkoppling för en viss fråga, ingen återkoppling alls att visas.  Användaren skickas istället automatiskt vidare till nästa sida i lektionen. </p>';
$string['displayhighscores'] = 'Visa höga resultat';
$string['displayinleftmenu'] = 'Visa i den vänstra menyn?';
$string['displayleftif'] = 'Visa den vänstra menyn bara om betyg/omdöme är högre än:';
$string['displayleftif_help'] = 'Den här inställningen avgör huruvida en student/elev/deltagare/lärande måste uppnå ett visst betyg innan han/hon får se menyn till vänster. Detta tvingar dem att gå igenom hela lektionen under sitt första försök. Efter det att de har uppnått det nödvändiga betyget kan de använda den vänstra menyn för utvärdering.';
$string['displayleftmenu'] = 'Visa vänster meny';
$string['displayleftmenu_help'] = 'Om det här är aktiverat så kommer en lista över sidor att visas';
$string['displayofgrade'] = 'Visning av betyg/omdöme';
$string['displayreview'] = 'Tillhandahåll ett alternativ att försöka svara på en fråga igen';
$string['displayreview_help'] = '<p>Det här kommer om det är aktiverat att visa en knapp efter en fråga som har besvarats felaktigt. Då kan studenten/ eleven/ deltagaren/ den lärande antingen göra ett nytt försök att besvara frågan men utan att få poäng för det eller att fortsätta. Det fungerar inte
med essäfrågor så aktivera inte detta om Du använder sådana frågor.</p>';
$string['displayscorewithessays'] = 'Du har uppnått {$a->score} av {$a->tempmaxgrade} för de frågor som betygssätts automatiskt.<br>Din/a {$a->essayquestions} essäfråga/or kommer att betygsättas och läggas till<br>Ditt slutresultat vid ett senare tillfälle.<br><br>Ditt aktuella betyg utan essäfråga/or är {$a->score} av {$a->grade}';
$string['displayscorewithoutessays'] = 'Ditt resultat är {$a->score} (av {$a->grade}).';
$string['edit'] = 'Redigera';
$string['editingquestionpage'] = 'Redigerar frågesidan {$a} ';
$string['editlessonsettings'] = 'Redigera inställningarna för den här lektionen.';
$string['editpage'] = 'Redigera innehåll i sida';
$string['editpagecontent'] = 'Redigera innehållet på den här sidan';
$string['email'] = 'E-post';
$string['emailallgradedessays'] = 'Skicka  ALLA <br> betygssatta essäer med e-post';
$string['emailgradedessays'] = 'Skicka betygssatta essäer med e-post';
$string['emailsuccess'] = 'E-post har skickats framgånsgsrikt';
$string['emptypassword'] = 'Textfältet för lösenord får inte vara tomt.';
$string['endofbranch'] = 'Slut på förgrening';
$string['endofcluster'] = 'Slut på kluster';
$string['endofclustertitle'] = 'Slut på kluster';
$string['endoflesson'] = 'Slut på lektion';
$string['enteredthis'] = 'matade in det här.';
$string['entername'] = 'Skriv in ett kortnamn för listan över höga betyg';
$string['enterpassword'] = 'Var snäll och skriv in lösenordet:';
$string['eolstudentoutoftime'] = 'OBS! Tiden har gått ut för den här lektionen. Ditt sista svar kanske inte kommer att räknas om Du lämnade det efter det att tiden hade gått ut.';
$string['eolstudentoutoftimenoanswers'] = 'Du svarade inte på några frågor. Ditt resultat för den här lektionen är 0.';
$string['essay'] = 'Essä';
$string['essayemailmessage'] = '<p>Essä notering; <blockquote>{$a->question}</blockquote></p><p>
Din respons:<blockquote><em>{$a->response}</em></blockquote></p><p>{$a->teacher} s kommentarer:<blockquote><em>{$a->comment}</em></blockquote></p><p>
Du har fått {$a->earned} av {$a->outof} för den här essäfrågan.</p><p>Ditt betyg/omdöme för the lektionen har ändrats till {$a->newgrade}&#37;.</p>';
$string['essayemailmessage2'] = '<p>Essä:<blockquote>{$a->question}</blockquote></p><p>Ditt svar:<blockquote><em>{$a->response}</em></blockquote></p><p>Betygssättarens kommentarer:<blockquote><em>{$a->comment}</em></blockquote></p><p>Du har uppnått {$a->earned} av {$a->outof} för den här essäfrågan.</p><p>Ditt betyg för lektionen har ändrats till {$a->newgrade}%.</p>';
$string['essayemailsubject'] = 'Ditt betyg/omdöme för {$a} fråga';
$string['essays'] = 'Essäer';
$string['essayscore'] = 'Resultat på essäer';
$string['fileformat'] = 'Filformat';
$string['finish'] = 'Avsluta';
$string['firstanswershould'] = 'Det första svaret bör hoppa till sidan \'Rätt\'';
$string['firstwrong'] = 'Tyvärr har Du inte uppnått den här poängen eftersom Du inte svarade rätt. Vill Du fortsätta att gissa, för lärandets skull (men inte för någon poäng)?';
$string['flowcontrol'] = 'Styrning av flöde';
$string['full'] = 'Utvidgad';
$string['general'] = 'Allmänt';
$string['gotoendoflesson'] = 'Gå till slutet av lektionen';
$string['grade'] = 'Betyg/omdöme';
$string['gradebetterthan'] = 'Betyg bättre än (%)';
$string['gradebetterthanerror'] = 'Prestera för ett betyg som är bättre än {$a} procent';
$string['gradeessay'] = 'Betygssätt essäfrågor';
$string['gradeis'] = 'Betyget/omdömet är {$a}';
$string['gradeoptions'] = 'Alternativ för betyg/omdömen';
$string['handlingofretakes'] = 'Hantering av omtagningar';
$string['handlingofretakes_help'] = '<p>När studenterna/ eleverna/ deltagarna/ de lärande får tillåtelse att
göra om lektionen så gör det här alternativet det möjligt för (distans)läraren att visa betygen/omdömena
för lektionen t ex på betygs/ omdömessidan antingen som \'medelbetyget\' av det första och efterföljande försök
eller som det \'högsta\' betyget som uppnåtts under försöken.
</p>
<p>Du kan ändra det här alternativet när som helst.</p>';
$string['havenotgradedyet'] = 'har inte satt betyg/avgett omdöme än.';
$string['here'] = 'här';
$string['highscore'] = 'Högt resultat';
$string['highscores'] = 'Höga resultat';
$string['hightime'] = 'Hög tid';
$string['importcount'] = 'Importerar frågor';
$string['importquestions'] = 'Importera frågor';
$string['importquestions_help'] = '<p>Den här funktionen låter Dig importera frågor från externa textfiler som
är uppladdade via ett formulär.</p>

<p>Det finns ett antal filtyper som stöds:</p>
<p><b>GIFT formatet</b></p>
<ul>
<li>GIFT är det mest heltäckande formatet som är tillgängligt för att
importera testfrågor av Moodletyp från en textfil. Det är utformat för att
vara en enkel metod för (distans)lärare som skriver frågor som en textfil.
Formatet stödjer Multiple-Choice (flervalsfrågor), Sant-Falskt, kortsvar, para-ihop och
numeriska frågor liksom infogande av lucktexter. Du kan blanda olika frågetyper i en enskild textfil
och formatet stödjer också kommentarer till en rad, namn på frågor, återkoppling och procentviktade
betyg/omdömen. Här nedan är några exempel:</li>
<li><pre>
Vem är begravd i Grants grav? {~Grant ~Jefferson =ingen}

Grant är {~begravd  ~lever} i Grants grav.

Grant är begravd i Grants grav.{FALSE}

Vem är begravd i Grants grav?{=ingen =inte någon alls}

När föddes Ulysses S. Grant?{#1822}
</pre></li>
</ul>
<p align="right"><a href="help.php?file=formatgift.html&module=quiz">Mer info om "GIFT"-formatet</a></p>

<p><b>Aiken-formatet</b></p>
<ul>
<li>Aiken-formatet är ett mycket enkelt sätt att skapa flervalsfrågor
genom att använda ett format som är mycket tydligt och läsbart för människor.
Här är ett exempel på formatet:

<pre>
Vad är avsikten med första hjälpen?

A. Att rädda liv, att förebygga ytterligare skador, att bevara en god hälsa
B. Att tillhandahålla medicinsk behandling till vilken skadad person som helst
C. Att förebygga ytterligare skador
D. Att hjälpa offer som ber om hjälp
SVAR: A
</pre>
</li>
</ul>
<p align="right"><a href="help.php?file=formataiken.html&module=quiz">Mer info om  "Aiken"-formatet</a></p>
<p><b>Lucktexter</b></p>
<ul>
<li>Det här formatet stödjer bara flervalsfrågor. Varje svar åtskiljs med ett tilde-tecken
 (~), och det korrekta svaret har likhetstecknet (=) som prefix.  Här är ett exempel:

<blockquote>
Så snart vi börjar undersöka våra kroppar som barn så blir vi
studenter av {=anatomi och fysik ~reflexologi
~vetenskap ~experiment}, och på ett sätt förblir vi studenter för resten av livet.
</blockquote>
</li>
</ul>
<p align="right"><a href="help.php?file=formatmissingword.html&module=quiz">Mer info om "Lucktext"-formatet</a></p>

<p><b>AON</b></p>
<ul>
<li>Det här är samma format som lucktexten förutom det att efter det att
Du har importerat frågorna så omvandlas alla kortsvarsfrågor fyra åt gången till
para-ihop-frågor.
Dessutom så blandas svaren till flervalsfrågor slumpmässigt under importen.
Formatet har fått sitt namn av en organisation som sponsrade många av
egenskaperna hos testet/övningen.
</li>
</ul>

<p><b>Blackboard</b></p>
<ul>
<li>Den här modulen kan importera frågor som är sparade i Blackboards exportformat.
Det använder sig av XML-funktioner som kompileras över till Din PHP-kod.</li>
</ul>
<p align="right"><a href="help.php?file=formatblackboard.html&module=quiz">Mer info om "Blackboard"-formatet</a></p>
<p><b>"Course Test Manager"</b></p>
<ul>
<li>Den här modulen kan importera frågor som är sparade i en testbank av "Course Test Manager"-typ.
Det använder sig av olika sätt att få tillgång till testbanken (som ligger i en Microsoft Access
databas) beroende på om Moodle körs på en Windows- eller Linuxserver.
På Windows kan Du ladda upp Accessdatabasen precis som Du gör med vilken annan importerad datafil som helst.</li>
<li>På Linux, måste Du ställa in en windowsmaskin på samma nätverk som med databasen av typ "Course Test
Manager"  och ett program som kallas ODBC Socket Server, som använder XML för att överföra data till Moodle på Linuxservern.</li>
 <li>Var snäll och läs hela hjälpfilen nedan innan Du använder denna klass av import.</li>
</ul>
<p align="right"><a href="help.php?file=formatctm.html&module=quiz">Mer info om "CTM"-formatet</a></p>

<p><b>Egen standard</b></p>
<ul>
<li>Om Du har skapat ett eget format som Du behöver importera så kan Du implementera det själv genom att redigera mod/quiz/format/custom.php
Det är rätt lite kod som behövs, bara så att det går att (parse) tolka
en enskild fråga från en given text.</li>
</ul>
<p align="right"><a href="help.php?file=formatcustom.html&module=quiz">Mer info om formatet
 "Egen standard"</a></p>

<p>Det kommer att tillkomma fler format, inklusive WebCT, IMS QTI och vad helst någon Moodlare kan komma att bidra med.
   </p>';
$string['insertedpage'] = 'Infogad sida';
$string['invalidfile'] = 'Ogiltig fil';
$string['invalidid'] = 'Det avgavs ingen ID för modul eller lektion';
$string['invalidlessonid'] = 'ID för lektion var inte korrekt';
$string['invalidpageid'] = 'Ogiltigt ID för sida';
$string['jump'] = 'Hoppa till';
$string['jumps'] = 'Hopp';
$string['jumps_help'] = '<p>Varje svar har en hoppa-till-länk. När någon har valt ett svar så visas återkopplingen på
svaret för studenten/ eleven/ deltagaren/ den lärande. Efter det visas den sida om hoppa-till-länken refererar till.
Denna länk kan vara relativ eller absolut. Relativa länkar är <b>Den här sidan</b> och <b>Nästa sida</b>.
<b>Den här sidan</b> betyder att samma sida visas igen. <b>Nästa sida</b>
visar den sida som följer efter denna i en logisk följd av sidor. En
absolut länk till en sida anger Du genom att välja sidans <b>titel</b>.</p>
<p>Lägg märke till att en (relativ) <b>Nästa sida</b> hoppa-till-länk kan visa en
annan sida efter det att sidor har flyttats. En hoppa-till-länk som använder sig av
sido<b>titlar</b> visar däremot alltid samma sida även efter det att sidor har flyttats.
</p>
<b><p>Specialhopp</p>
<p>Ej visad fråga inom en förgrening</p></b>
<p>Det här blir en länk till en slumpmässigt vald (av studenten/ eleven/ deltagaren/ den lärande) ej visad fråga mellan den här förgreningstabellen och slutet på lektionen eller nästa slut på en förgrening. </p>

<p><b>Slumpmässig fråga inom en förgrening</b></p>
<p>Det här blir en länk till en slumpmässigt vald fråga mellan den aktuella förgreningstabellen och  slutet på lektionen eller nästa slut på en förgrening. Om studenten/ eleven/ deltagaren/ den lärande redan har sett frågan och antalet försök är fler än 1 då kommer de att få ytterligare en möjlighet att skaffa sig poängen för frågan. Om antalet försök är inställt till 1 då kommer frågan att hoppas över och istället visas en annan slumpmässig fråga.</p>

<p><b>Slumpmässig förgreningstabell</b></p>
<p>Det här blir ett hopp till en slumpmässig förgreningstabell mellan den aktuella och  slutet på lektionen eller nästa slut på en förgrening.</p>';
$string['jumpsto'] = 'Hopp till <em>{$a}</em>';
$string['leftduringtimed'] = 'Du har avbrutit under en tidsstyrd lektion.<br>Var snäll och välj "Fortsätt" för att starta om lektionen.';
$string['leftduringtimednoretake'] = 'Du har avbrutit under en tidsstyrd lektion<br> och Du får inte göra om, eller gå vidare med, lektionen.';
$string['lessonattempted'] = 'Det har gjorts försök att genomföra lektionen';
$string['lessonclosed'] = 'Den här lektionen stängdes  {$a}';
$string['lessoncloses'] = 'Lektionen avslutas';
$string['lessoncloseson'] = 'Lektionen stängs på {$a}';
$string['lesson:edit'] = 'Redigera en aktivitet av typen lektion';
$string['lessonformating'] = 'Att formatera lektioner';
$string['lesson:manage'] = 'Administrera en aktivitet av typen lektion';
$string['lessonmenu'] = 'Meny för lektion';
$string['lessonnotready'] = 'Den här lektionen är klar för användning. Var snäll och kontakta Din {$a}.';
$string['lessonnotready2'] = 'Den här lektionen är ännu inte färdig för användning';
$string['lessonopen'] = 'Den här lektionen kommer att öppnas {$a}';
$string['lessonopens'] = 'Lektionen öppnas';
$string['lessonpagelinkingbroken'] = 'Det gick inte att hitta den första sidan. Länkningen mellan sidorna i lektionen tycks inte fungera. Var snäll och kontakta systemadministratören.';
$string['lessonstats'] = 'Statistik för lektion';
$string['linkedmedia'] = 'Länkade media';
$string['loginfail'] = 'Det gick inte att logga in, vara snäll och försök igen...';
$string['lowscore'] = 'Lågt resultat';
$string['lowtime'] = 'Låg tid';
$string['manualgrading'] = 'Bedöm/betygssätt essäer';
$string['matchesanswer'] = 'Passar ihop med svar';
$string['matching'] = 'Matchning';
$string['matchingpair'] = 'Matchande par {$a}';
$string['maxgrade'] = 'Maximalt betyg/omdöme';
$string['maxgrade_help'] = '<p>Det här värdet bestämmer maxbetyget/omdömet som man kan få på lektionen.
Dess omfång är 0 till 100. Du kan ändra detta värde när som helst under lektionen.
Varje ändring återspeglas omedelbart på sidan för betyg/omdömen och på de betyg/omdömen som visas för
studenterna/eleverna/deltagarna/de lärande på olika listor.Om Du väljer betyget 0 så
kommer lektionen inte att visas på betygs/omdömessidan.</p>';
$string['maxhighscores'] = 'Antal visade höga resultat';
$string['maximumnumberofanswersbranches'] = 'Maximalt antal svar';
$string['maximumnumberofanswersbranches_help'] = '<p>Det här värdet avgör det maximala antalet svar som (distans)läraren kan använda.
Det förinställda standardvärdet är 4.
Om lektionen bara använder, säg, SANT och FALSKT-frågor genomgående,
då är det rimligt att ställa in detta värde till 2.
</p>
<p>Den här parametern ställer även in det maximala antalet förgreningar som kan användas i tabellen för förgreningar.</p>
<p>Du kan lugnt  ändra värdet på den här parametern i en lektion som redan har ett innehåll.
Faktum är att om Du vill lägga till en fråga med många svarsalternativ eller en lång förgreningstabell
så måste Du ändra det här värdet. Efter det att Du har lagt till den (ovanliga) frågan eller förgreningstabellen
så kan Du återställa det här värdet till ett mer "standardmässigt" värde.</p>';
$string['maximumnumberofattempts'] = 'Maximalt antal försök';
$string['maximumnumberofattempts_help'] = '<p>Det här värdet anger det maximala antalet gånger som en student/elev/deltagare/lärande får
försöka besvara <b>någon</b> fråga vilken som helst i lektionen.
I de fall där det inte ingår svarsalternativ i frågorna som t ex kortsvarsfrågor och numeriska frågor
så tilhandahåller det här värdet en nödvändig <i>"escape"-rutin</i> till nästa fråga i lektionen. </p>
<p>Standardvärdet är 5. Mindre värden kan minska studenternas/elevernas/deltagarnas/de lärandes
intresse för att tänka på frågorna. Större värden kan leda till mer frustration.</p>
<p>Om Du ställer in det här värdet till bara 1 så kan frågan bara besvaras en gång.
Då blir det en uppgift av samma typ som med modulen Test förutom det att frågorna
presenteras på individuella sidor.</p>
<p>Lägg märke till att det här värdet är en global parameter
vilket innebär att den gäller för alla frågor i lektionen oavsett typ.</p>
<p>Lägg även märke till att den här parametern <b>inte</b> går att tillämpa på (distans)lärare
som kollar frågorna eller navigerar genom lektionen. Att kontrollera antalet försök beror
på värden som är lagrade i databasen och (distans)lärares försök att besvara frågorna
registreras inte. Som(distans)lärare förväntas Du förstås veta svaren!</p>';
$string['maximumnumberofattemptsreached'] = 'Du har uppnått maximalt antal tillåtna försök - Du flyttas nu vidare till nästa sida.';
$string['maxtime'] = 'Tidsbegränsning (minuter)';
$string['maxtimewarning'] = 'Du har ??? minut/er på Dig att avsluta lektionen.';
$string['mediaclose'] = 'Visa en knapp för att stänga:';
$string['mediafile'] = 'Popup-fönster för fil eller webbsida';
$string['mediafile_help'] = '<p>Det här kommer att skapa ett popup-fönster innehållande en fil (t.ex. en mp3-fil) eller en webbsida i början av en lektion. Det kommer också att skapas en länk på varje sida i lektionen. Med den länken kan man öppna popup-fönstret igen om det skulle behövas.</p>

<p>Alternativt kommer det att skapas en knapp "Stäng fönster" längst ner på popup-fönstret. Du kan även ställa in höjd och bredd på fönstret. </p>';
$string['mediafilepopup'] = 'Klicka här för att visa ';
$string['mediaheight'] = 'Höjd på popup-fönster:';
$string['mediawidth'] = 'Bredd på popup-fönster::';
$string['messageprovider:graded_essay'] = 'Meddelande om betygsatt essä';
$string['minimumnumberofquestions'] = 'Minimalt antal frågor';
$string['minimumnumberofquestions_help'] = '<p>När en lektion innehåller en eller flera förgreningstabeller så bör Du som (distans)lärare
normalt sett ställa in den här parametern. Dess värde sätter en lägre gräns för det antal frågor
som ingår i beräkningen av betyg/omdömen.
Det tvingar<b> inte</b> studenter/ elever/ deltagare/ lärande att besvara så många frågor i lektionen.</p>
<p>Om parametern är inställd till t ex 20, så innebär det att betygen/ omdömena sätts som om
studenterna/ eleverna/ deltagarna/ de lärande <b>åtminstone</b> har sett det här antalet frågor.
Låt oss säga att en student/ elev/ deltagare/ lärande ser bara en enskild förgrening i en lektion med, säg, 5 sidor
och svarar korrekt på alla de aktuella frågorna. Denne skulle kunna välja att avsluta lektionen
(under förutsättning att det alternativet finns med på den övergripande förgreningstabellen,
vilket man kan anta att det gör). Om denna parameter inte var aktiverad så skulle
deras betyg/omdöme bli 5 av 5 vilket blir 100%. Om parametern däremot är inställd till 20 så skulle betyget/omdömet reduceras till 5 av 20,
dvs 25%. Ifall en annan person går igenom alla förgreningar och ser, säg, 25 sidor och besvarar alla utom två av frågorna korrekt
så kommer betyget att bli 23 av 25, dvs 92%.</p>
<p>Om den här parametern används så kommer den första sidan i lektionen att innehålla någonting i stil med:</p>
<blockquote>På den här lektionen förväntas Du försöka besvara åtminstone n frågor. Du kan försöka besvara fler
om Du vill. Dock är det så att om Du besvarar färre än n frågor så kommer Ditt betyg/omdöme att beräknas utifrån förutsättningen
att Du försökt besvara n frågor.</blockquote>
<p>"n" ersätts förstås av det faktiska talet (värdet) som den här parametern är inställd till.</p>
<p>När den här parametern är inställd så får studenten/ eleven/ deltagaren/ den lärande veta hur många frågor han/hon har
försökt besvara och hur många han/hon förväntas besvara.
</p>';
$string['missingname'] = 'Var snäll och mata in ett smeknamn';
$string['modattempts'] = 'Tillåt studenter/elever/deltagare/lärande att se igen';
$string['modattempts_help'] = '<p>Det här kommer att låta studenterna/ eleverna/ deltagarna/ de lärande
att navigera bakåt genom lektionen för att ändra sina svar.</p>';
$string['modattemptsnoteacher'] = 'Upprepad visning för studenter/elever/deltagare/lärande fungerar bara för dem.';
$string['modulename'] = 'Lektion';
$string['modulename_help'] = '<img src="<?php echo $CFG->wwwroot?>/mod/lesson/icon.gif" alt="" /> <b>Lektion</b>
<p>En lektion kan presentera innehåll på ett intressant och flexibelt sätt.
Den består av ett antal sidor. Varje sida avslutas normalt sett med en fråga
och ett antal möjliga svar. Beroende på vilket svar studenten/eleven/deltagaren/den lärande
väljer så kan han/hon antingen fortsätta till nästa sida eller tvingas gå tillbaka till föregående sida.
Navigationen genom lektionen kan vara enkel eller komplex, till stor del beroende på hur innehållets struktur presenteras.</p>';
$string['modulenameplural'] = 'Lektioner';
$string['move'] = 'Flytta sida';
$string['movedpage'] = 'Flyttad sida';
$string['movepagehere'] = 'Flytta sidan hit';
$string['moving'] = 'Flyttar sidan: {$a}';
$string['multianswer'] = 'Flerfaldiga svar';
$string['multianswer_help'] = '<p>Några av frågetyperna har ett alternativ som Du aktiverar genom att markera
en kryssruta. Du hittar en detaljerad beskrivning av frågetyperna och innebörden av alternativen här nedan:</p>
<ol>
<li><b>Multichoice (flervalsfrågor)</b><br />
Det finns en variant av flervalsfrågor som kallas <b>"Flervals/Flersvarsfrågor"</b>
Om man väljer Alternativ för fråga så ombeds man att välja alla de svarsalternativ som är korrekta.
Det kan, eller inte, framgå av frågan  <i>hur många</i> korrekta svar det finns.
Ett exempel: "Vilka av de följande personerna var presidenter i USA?" talar inte om hur många det är.
"Välj de två personer som har varit presidenter i USA" gör det.
Det faktiska antalet korrekta svar kan vara allt från ett till samtliga svarsalternativ.
En fråga av typen flervalssvar med ett korrekt svar skiljer sig från
en Flervalsfråga på så sätt att den förra ger Dig möjlighet att välja mer än ett svar
vilket den andra inte gör.
</li>
<li><b>Kortsvarsfråga</b><br /> Som standard så är jämförelsen inte skiftlägeskänslig.
  Om Du har markerat Alternativ för fråga så kommer det att vara skillnad på
  stor och liten bokstav. </li>
</ol>
<p>Övriga frågetyper använder inte Alternativ för fråga.</p>';
$string['multichoice'] = 'Flerval';
$string['multipleanswer'] = 'Flera svar';
$string['nameapproved'] = 'Namnet är godkänt';
$string['namereject'] = 'Ditt namn har tyvärr inte accepterats av filtret.<br> Var snäll och försök igen.';
$string['new'] = 'ny';
$string['nextpage'] = 'Nästa sida';
$string['noanswer'] = 'Det finns inget angivet svar';
$string['noattemptrecordsfound'] = 'Inga försök har registrerats, inga betyg/omdömen är avgivna';
$string['nobranchtablefound'] = 'Det gick inte att hitta någon innehållssida';
$string['nocommentyet'] = 'Ingen kommentar ännu.';
$string['nocoursemods'] = 'Det gick inte att hitta några aktiviteter';
$string['nocredit'] = 'Inget tillgodoräknande';
$string['nodeadline'] = 'Ingen tidsbegränsning';
$string['noessayquestionsfound'] = 'Det gick inte att hitta några essäfrågor i den här lektionen.';
$string['nohighscores'] = 'Inga höga resultat';
$string['nolessonattempts'] = 'Det har inte gjorts några försök att genomföra den här lektionen.';
$string['nooneansweredcorrectly'] = 'Ingen lämnade ett korrekt svar.';
$string['nooneansweredthisquestion'] = 'Ingen besvarade den här frågan.';
$string['noonecheckedthis'] = 'Ingen kontrollerade det här.';
$string['nooneenteredthis'] = 'Ingen matade in det här.';
$string['noonehasanswered'] = 'Ingen har besvarat någon essäfråga ännu.';
$string['noretake'] = 'Du får inte göra om den här lektionen.';
$string['normal'] = 'Normal - följ lektionens progression';
$string['notcompleted'] = 'Inte avslutad';
$string['notdefined'] = 'Inte definierad';
$string['nothighscore'] = 'Du lyckades ínte komma med på listan över höga betyg.';
$string['notitle'] = 'Ingen titel';
$string['numberofcorrectanswers'] = 'Antal rätta svar: {$a}';
$string['numberofcorrectmatches'] = 'Antal rätta matchningar:  {$a}';
$string['numberofpagestoshow'] = 'Antal sidor (kort) att visa';
$string['numberofpagestoshow_help'] = '<p>Den här parametern används bara i samband med lektioner av typen "Flash"-kort. Standardvärdet
är noll vilket betyder att alla sidorna/korten visas i en lektion.
Om Du ställer in den här parametern till ett värde som inte är noll så visas det antalet sidor.
När det antalet sidor/kort har visats är man framme vid lektionens slut och studenten/ eleven/ deltagaren/ den lärande
får se sitt betyg/omdöme.</p>
<p>Om den här parametern  är inställt på ett högre tal än det faktiska antalet sidor
då kommer man att nå slutet på lektionen när alla sidor har visats.
</p>';
$string['numberofpagesviewed'] = 'Antal sidor som har visats:  {$a}';
$string['numberofpagesviewednotice'] = 'Antal besvarade frågor: {$a->nquestions}; (Du bör besvara åtminstone: {$a->minquestions})';
$string['numerical'] = 'Numerisk';
$string['ongoing'] = 'Visa pågående resultat';
$string['ongoingcustom'] = 'Du har uppnått {$a->score} poäng av {$a->currenthigh} poäng så hä långt.';
$string['ongoing_help'] = '<p>Om Du har aktiverat det här så kommer varje sida att visa det aktuella resultatet (så här långt) som andel av det möjliga sammanlagda resultatet.  Exempel:  Någon har besvarat 4 frågor värda 5 poäng vardera och besvarat en felaktigt. Det hittills ackumulerade resultatet skulle visa att vederbörande   att f.n. har uppnått 15/20 poäng.</p>';
$string['ongoingnormal'] = 'Du har lämnat korrekt/a svar på {$a->correct} fråga/or av {$a->viewed} fråga/or.';
$string['onpostperpage'] = 'Endast ett bidrag per betyg/omdöme';
$string['options'] = 'Alternativ';
$string['or'] = 'ELLER';
$string['ordered'] = 'Ordnad';
$string['other'] = 'Övrigt';
$string['outof'] = 'Av  {$a}';
$string['overview'] = 'Överblick';
$string['overview_help'] = '<ol>
<li>En lektion är uppbyggd av ett antal
 <b>sidor</b> och som valfri möjlighet av <b>förgreningstabeller</b>.</li>
 <li>En sida har ett visst <b>innehåll</b> och den avslutas normalt sett med en
    <b>fråga</b>. Därav begreppet <b>Frågesidan</b>.</li>
<li>Varje sida har normalt sett en uppsättning <b>svar</b>. </li>
<li>Varje svar kan visa ett kort stycke text efter det att användaren har valt ett svar.
 Detta stycke kallas för <b>återkoppling</b>.</li>
 <li>Något som också är kopplat till varje sida är ett <b>hopp</b>. Hoppet kan vara relativt -
den här sidan, nästa sida eller absolut. Om det är absolut så refererar det till vilken som helst
av sidorna i lektionen eller lektionens slut.</li>
<li>Som standard så hoppar det första "rätta" svaret till <b>nästa sida</b> i lektionen.
De därpå följande svaren hoppar till samma sida. Dvs att studenten/eleven/deltagaren/den lärande
visas samma sida i lektionen igen om de inte väljer det första "rätta"  svaret.</li>
<li>Vad som är nästa sida avgörs av lektionens <b>logiska följd</b>. Det är den följd som (distans)läraren
har arrangerat sidorna i. Du kan ändra på den följden genom att flytta sidor inom lektionen.</li>
<li>Lektionen har också en <b>navigationsföljd</b>. Det är den följd som studenterna/ eleverna/ deltagarna/ de lärande
ser sidorna i. Detta avgörs av de hopp som är angivna för varje individuellt svar
och denna följd kan skilja sig mycket från den logiska följden.
(Även om standardvärdena för hoppen <i>inte</i> har ändrats så är de två starkt relaterade till varandra.)
Som (distans)lärare har Du alternativet att markera navigationsföljden.</li>
<li>När svaren visas för studenterna/ eleverna/ deltagarna/ de lärande så är de vanligtvis
blandade. Dvs, det första svaret som Du anger behöver inte nödvändigtvis vara det första svar som visas
för studenterna/ eleverna/ deltagarna/ de lärande. (Vidare så är det så att svaren kommer att visas i en ny följd
varje gång.) Undantaget från detta är uppsättningar av svar på frågor av typen para-ihop.
Här visas nämligen svaren i samma följd som Du som (distans)lärare har angivit.</li>
<li>Antalet svar kan variera från sida till sida. Det går t ex att låta några sidor sluta med
en SANT/FALSKT-fråga medan andra har frågor med ett korrekt svar och, säg tre, felaktiga. </li>
<li>Det är möjligt att skapa en sida utan svar. Studenterna/eleverna/deltagarna/de lärande får då se en
<b>Fortsätt</b>-länk istället för en uppsättning blandade svar.</li>
<li>I syfte att sätta betyg/omdömen på lektioner så är <b>korrekta</b> svar sådana som är hoppar till en
sida som är längre <i>ner</i> i den logiska följden än den aktuella sidan.
    <b>Felaktiga</b> svar är sådana som antingen hoppar till samma sida eller till en sida
	som är längre <i>upp</i> i den logiska följden än den aktuella sidan. Sålunda är det så att om hoppen
    <i>inte</i> ändras så är det första svaret det som är korrekt och de andra svaren är felaktiga.</li>

<li>Frågor kan ha mer än ett korrekt svar. Om t ex två av svaren hoppar till nästa sida då är båda godkända som korrekta svar.
 (Även om samma målsida visas för studenterna/ eleverna/ deltagarna/ de lärande så kan den återkoppling som visas
 på vägen till denna sida mycket väl vara olika för de två olika svaren.)</li>
<li>På den (lektions)sida som visas för (distans)läraren så har de korrekta svaren
svarsetiketter som är understrukna.</li>
<li><b>Förgreningstabeller</b> är helt enkelt sidor som har en uppsättning länkar till andra sidor i lektionen.
Det  vanliga är att en lektion inleds med en förgreningstabell som fungerar som en <b>Tabell över innehåll</b>.</li>

<li>Varje länk i en förgreningstabell har två komponenter, en beskrivning och
och titeln på sidan länken ska hoppa till. </li>

<li>En förgreningstabell delar effektivt in lektionen i ett antal
    <b>förgreningar</b> (eller sektioner). Varje förgrening kan innehålla ett antal sidor (som antagligen relaterar
	till samma ämne). Slutet på förgreningen är vanligtvis markerad med en <b>Slut på förgrening</b>-sida.
	Det här är en speciell sida som, som standard, tar studenten/ eleven/ deltagaren/ den lärande tillbaka till den föregående
	förgreningstabellen.
    "tillbaka"-hoppet på en Slut-på-förgreningen-sida kan Du, om det behövs, ändra genom att redigera sidan.
	 </li>

<li>Det kan finnas mer än en förgreningstabell i en lektion. En lektion kan t ex
vara användbart strukturerad så att fördjupningar och specialfall läggs in i under-förgreningar
inom huvudämnets förgreningar.</li>

<li>Det är viktigt att studententerna/ eleverna/ deltagarna/ de lärande har
möjligheter att avsluta lektionen. Detta kan t ex ske genom att Du tar med
en länk för att "Avsluta lektionen" i den övergripande förgreningen.
Detta gör att användaren hoppar till en (tänkt) sida för  <b>Slut på lektionen</b>.
En annan möjlighet är att den sista förgreningen i lektionen (här används "sista" i meningen
   logisk ordning) helt enkelt fortsätter till slutet på lektionen,
    dvs, den avslutas <i>inte</i> med en Slut-på-förgreningen-sida.</li>

<li>När en lektion innehåller mer än en förgreningstabell så bör Du ställa in
parametern "Minimalt antal frågor" till ett rimligt värde. Detta
anger en lägre gräns för det antal sidor som räknas in när betyget/omdömet beräknas.
Utan denna parameter skulle studenten/ eleven/ deltagaren/ den lärande kunna gå igenom en
enskild förgrening i lektionen, besvara alla frågorna där korrekt och sedan
lämna lektionen och få ut ett maximalt betyg/omdöme för hela lektionen.</li>
<li>
Vidare, när en förgreningstabell finns tillgänglig så har en student/elev/deltagare/lärande
möjlighet att gå igenom samma förgrening flera gånger. Det är dock så att betyget/omdömet
beräknas genom att man använder antalet <i>unika</i> frågor som är besvarade. Att man
svarar flera gånger på samma uppsättning frågor höjer alltså inte betyget/omdömet.
I själva verket är det tvärtom så att det sänker betyget/omdömet eftersom räknaren
av visade sidor används i nämnaren när beräkningen av betyg/omdömen inkluderar
flerfaldig visning av sidor. I syfte att ge studenterna/ eleverna/ deltagarna/ de lärande en rimlig uppfattning om
hur de presterar under lektionens gång så får de, på varje förgreningstabell, se detaljer angående hur många frågor
de har besvarat korrekt, antal sidor som är visade och deras aktuella betyg/omdöme.</li>

<li><b>Slutet på lektionen</b> når de antingen genom att uttryckligen hoppa till den platsen
eller genom att hoppa till nästa sida från den sista (logiska) sidan av lektionen.
När de har nått slutet på lektionen så får de se ett gratulationsmeddelande och sitt betyg/omdöme.
Betyget/omdömet är lika med (antal frågor som har besvarats korrekt/antal sidor som har visats) * betyget/omdömet för lektionen.
</li>
<li>Om slutet på lektionen <i>inte</i> är uppnått och studenten/ eleven/ deltagaren/ den lärande avbryter den någonstans inne i den,
så får han/hon nästa gång då han/hon återupptar lektionen, möjlighet att välja om han/hon vill börja om från början
eller om han/hon vill fortsätta där han/hon lämnade sitt senaste korrekta svar.
</li>
<li>När det gäller lektioner som man får göra om så kan (distans)läraren välja om han/hon
ska använda det bästa betyget eller medelbetyget för alla försök som det  "slutliga" betyget/omdömet på lektionen.
Det betyget/omdömet visas t ex på sidan för Betyg/omdömen.</li>
<li>Klustersidor: ett kluster representerar en uppsättning frågor och det går att välja en eller eller flera frågor ur på den på ett slumpmässigt sätt. Kluster bör kompletteras med en sida för Slut på kluster för att det ska bli bästa möjliga resultat annars kommer de att hantera Slut på lektion som Slut på kluster. Frågor inom ett kluster väljs ut slumpmässigt genom att du ställer in "Slumpmässig fråga inom kluster" som ett hopp. Frågor inom ett kluster kan antingen länka till Slut på kluster eller hoppa till en inte-visad fråga inom klustret eller hoppa till vilken annan sida som helst i  lektionen. Det här aktiverar även skapandet av scenarior med en slumpmässig komponent som använder modulen Lektion.</li>
</ol>';
$string['page'] = 'Sida:  {$a}';
$string['pagecontents'] = 'Innehåll på sidor';
$string['pages'] = 'Sidor';
$string['pagetitle'] = 'Titel på sida';
$string['password'] = 'Lösenord';
$string['passwordprotectedlesson'] = '{$a} är en lektion som kräver lösenord.';
$string['pleasecheckoneanswer'] = 'Var god och markera ett svar';
$string['pleasecheckoneormoreanswers'] = 'Var god och markera ett eller flera svar';
$string['pleaseenteryouranswerinthebox'] = 'Var god och skriv in Dina svar i textrutan';
$string['pleasematchtheabovepairs'] = 'Var god och matcha de ovanstående paren';
$string['pluginadministration'] = 'Administration av lektion';
$string['pluginname'] = 'Lektion';
$string['pointsearned'] = 'Intjänade poäng';
$string['postprocesserror'] = 'Ett fel uppstod i sb m bearbetning av bidrag';
$string['postsuccess'] = 'Inlägget har registrerats framgångsrikt';
$string['practice'] = 'Övningslektion';
$string['practice_help'] = '<p>En &ouml;vningslektion kommer inte att visas i betygskatalogen.</p>';
$string['preprocesserror'] = 'Ett fel uppstod i sb m förbearbetning ';
$string['preview'] = 'Förhandsgranska';
$string['previewlesson'] = 'Förhandsgranska {$a}';
$string['previouspage'] = 'Föregående sida';
$string['processerror'] = 'Ett fel uppstod i sb m bearbetning ';
$string['progressbar'] = 'Rad som visar hur något fortskrider';
$string['progressbar_help'] = '<p>Detta visar längst ner på sidan en rad som visar hur processen fortgår.
F.n. så är denna rad den som passar bäst ihop med en linjär Lektion.</p>
<p>I samband med beräkning av procentandelen fullgjord del av Lektionen så beräknas
förgreningstabeller och frågesidor i förhållande till hur Lektionsprocessen fortgår.
I samband med beräkning av det sammanlagda antalet sidor i Lektionen så bedöms kluster och sidor inom kluster att vara bara en enskild sida och Slut på kluster och Slut på sidor för förgreningstabell ingår inte. Alla andra sidor beräknas i förhållande till det sammanlagda antalet sidor i Lektionen.</p>
<p>OBS: den aktuella stilen på raden är inte så imponerande ;-)  Alla stilreglerna (eg: colors, background images, etc) kan redigeras i in mod/lesson/styles.php.';
$string['progressbarteacherwarning'] = 'Fortskridning av processen visas inte för {$a}';
$string['progressbarteacherwarning2'] = 'Du kan inte se raden för fortskridande eftersom Du kan redigera den här lektionen';
$string['qtype'] = 'Typ av sida';
$string['question'] = 'Fråga';
$string['questionoption'] = 'Alternativ till fråga';
$string['questiontype'] = 'Typ av fråga';
$string['randombranch'] = 'Slumpmässig innehållssida';
$string['randompageinbranch'] = 'Slumpad fråga inom en innehållssida';
$string['rank'] = 'Rangordna';
$string['rawgrade'] = 'Grovt antaget betyg/omdöme';
$string['receivedcredit'] = 'Tillgodoräknat resultat';
$string['redisplaypage'] = 'Sida för visning igen';
$string['report'] = 'Redovisning';
$string['reports'] = 'Rapporter';
$string['response'] = 'Återkoppling på svar';
$string['retakesallowed'] = 'Det är tillåtet att göra flera försök';
$string['retakesallowed_help'] = '<p>Den här inställningen avgör om studenter/ elever/ deltagare/ lärande ska kunna gå igenom
en lektion mer än en gång.
Distansläraren kan bestämma om lektionen innehåller material som studenten/ eleven/ deltagaren/ den lärande
ska behärska ordentligt. Isåfall bör det vara tillåtet att göra om lektionen.
Om lektionen däremot ingår i examinationen så bör det inte vara tillåtet att göra om den.</p>
<p>När studenter/ elever/ deltagare/ lärande tillåts göra om en lektion
så kommer de <b>betyg/omdömen</b> som visas på sidan för betyg/omdömen att vara antingen
deras <b>medel-</b>betyg/omdöme eller det <b>bästa</b> som de har uppnått.
Den följande parametern avgör vilken av dessa två metoder som används.</p>
<p>Lägg märke till att alternativet <b>Analys av fråga</b> alltid använder svaren från
de första försöken på lektionen. Hänsyn tas inte till efterföljande försök.</p>
<p>Som standard så är detta alternativ inställt till  <b>Nej</b>, vilket betyder att det inte är tillåtet att
göra om lektionen. Bara under speciella omständigheter finns det anledning att
välja alternativet <b>Ja</b>.</p>';
$string['returnto'] = 'Tillbaka till {$a}';
$string['returntocourse'] = 'Tillbaka till kursen';
$string['review'] = 'Granska';
$string['reviewlesson'] = 'Visa lektion igen';
$string['reviewquestionback'] = 'Ja, jag vill försöka igen';
$string['reviewquestioncontinue'] = 'Nej, jag vill gå vidare till nästa fråga';
$string['sanitycheckfailed'] = 'Kontrollen misslyckades. Det här försöket har tagits bort';
$string['savechanges'] = 'Spara ändringar';
$string['savechangesandeol'] = 'Spara alla ändringar och gå till slutet av lektionen.';
$string['savepage'] = 'Spara sida';
$string['score'] = 'Resultat';
$string['scores'] = 'Resultat';
$string['secondpluswrong'] = 'Inte helt. Vill Du försöka igen?';
$string['selectaqtype'] = 'Välj en frågetyp';
$string['shortanswer'] = 'Kortsvar';
$string['showanunansweredpage'] = 'Visa en obesvarad sida';
$string['showanunseenpage'] = 'Visa en tidigare inte visad sida';
$string['singleanswer'] = 'Enskilt svar';
$string['skip'] = 'Hoppa över navigationen';
$string['slideshow'] = 'Bildspel';
$string['slideshowbgcolor'] = 'Bakgrundsfärg på bildspel';
$string['slideshowheight'] = 'Bildspelets höjd';
$string['slideshow_help'] = '<p>Med det här kan Du aktivera att lektionen visas som ett bildspel, med en fixerad bredd och höjd och med en standardmässig bakgrundsfärg. En CSS-baserad skrollningslist kommer att visas om bredden eller höjden på sidan är större än den aktuella skärmen. Frågorna kommer att "brytas ut ur" bildspelsformatet. Endast sidor (förgreningstabeller) kommer att visas i en delbild i bildspelet som standardmässigt förval. Knappar med texten \'Nästa\' och \'Föregående\' kommer att visas längst ute till vänster och höger om det alternativet är valt för den aktuella bilden.  Övriga knappar kommer att vara centrerade under bilden.</p>';
$string['slideshowwidth'] = 'Bildspelets bredd';
$string['startlesson'] = 'Påbörja lektion';
$string['studentattemptlesson'] = '{$a->lastname}, {$a->firstname}\'s försök nummer {$a->attempt}';
$string['studentname'] = '{$a} Namn';
$string['studentoneminwarning'] = 'Varning! Du har 1 minut eller mindre på Dig att avsluta lektionen.';
$string['studentresponse'] = '{$a}s svar';
$string['submit'] = 'Skicka in';
$string['submitname'] = 'Skicka in namn';
$string['teacherjumpwarning'] = 'Det finns ett {$a->cluster} hopp eller ett {$a->unseen} hopp med i den här lektionen. Hoppet "Nästa sida" kommer att användas istället. Logga in som en student/elev/deltagare/lärande för att testa dessa hopp.';
$string['teacherongoingwarning'] = 'Ett pågående resultat visas bara för studenter/elever/deltagare/lärande. Logga in som en sådan för att se pågående resultat.';
$string['teachertimerwarning'] = 'Tidtagaren fungerar bara för studenter/elever/deltagare/lärande. Logga in som en sådan för att testa tidtagaren.';
$string['thatsthecorrectanswer'] = 'Det är rätt svar';
$string['thatsthewronganswer'] = 'Det är ett felaktigt svar';
$string['thefollowingpagesjumptothispage'] = 'De följande sidorna hoppar till den här sidan';
$string['thispage'] = 'Den här sidan';
$string['timeremaining'] = 'Återstående tid';
$string['timespenterror'] = 'Lägg ner åtminstone {$a} minuter på den här lektionen';
$string['timespentminutes'] = 'Använd tid (minuter)';
$string['timetaken'] = 'Använd tid';
$string['topscorestitle'] = 'De högsta {$a} resultaten';
$string['truefalse'] = 'Sant/Falskt';
$string['unabledtosavefile'] = 'Det gick inte att spara den fil som Du laddade upp';
$string['unknownqtypesnotimported'] = '{$a} frågor av frågetyper som inte stödjs importerades inte';
$string['unseenpageinbranch'] = 'Ej visad fråga inom en innehållssida';
$string['unsupportedqtype'] = 'Frågetyp ({$a} som inte stödjs!';
$string['updatedpage'] = 'Uppdaterad sida';
$string['updatefailed'] = 'Uppdateringen misslyckades';
$string['usemaximum'] = 'Använd maximum';
$string['usemean'] = 'Använd medel';
$string['usepassword'] = 'Lektion som kräver lösenord';
$string['usepassword_help'] = '<p>Det här innebär att studenterna/eleverna/deltagarna/de lärande inte kommer att kunna göra lektionen om de inte skriver in lösenordet.</p>';
$string['viewgrades'] = 'Visa betyg/omdömen';
$string['viewhighscores'] = 'Visa listan över höga resultat';
$string['viewreports'] = 'Visa {$a->attempts} fullföljda {$a->student} försök';
$string['viewreports2'] = 'Visa {$a} fullföljda försök';
$string['welldone'] = 'Bra gjort!';
$string['whatdofirst'] = 'Vad vill Du börja med?';
$string['wronganswerjump'] = 'Hopp enligt fel svar';
$string['wronganswerscore'] = 'Resultat för fel svar';
$string['wrongresponse'] = 'Fel svarsreaktion';
$string['xattempts'] = '{$a} försök';
$string['youhaveseen'] = 'Du har redan sett mer än en sida av den här lektionen.<br />Vill Du börja med den senaste sidan som Du såg?';
$string['youmadehighscore'] = 'Du lyckades komma med på listan över höga resultat.';
$string['youranswer'] = 'Ditt svar';
$string['yourcurrentgradeis'] = 'Ditt nuvarande betyg/omdöme är {$a}';
$string['yourcurrentgradeisoutof'] = 'Ditt aktuella betyg/omdöme är {$a->grade} av {$a->total}';
$string['youshouldview'] = 'Du bör åtminstone titta på: {$a}';
