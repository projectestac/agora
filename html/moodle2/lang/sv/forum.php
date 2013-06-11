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
 * Strings for component 'forum', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   forum
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Det finns nya inlägg i forumet';
$string['addanewdiscussion'] = 'Lägg till ett nytt diskussionsämne';
$string['addanewquestion'] = 'Lägg till en ny fråga';
$string['addanewtopic'] = 'Lägg till ett nytt ämne';
$string['advancedsearch'] = 'Avancerad sökning';
$string['allforums'] = 'Alla forum';
$string['allowdiscussions'] = 'Kan en {$a} göra inlägg i detta forum?';
$string['allowsallsubscribe'] = 'Det här forumet tillåter var och en att välja om de vill prenumerera eller inte.';
$string['allowsdiscussions'] = 'Detta forum tillåter var och en att starta ett diskussionsämne.';
$string['allsubscribe'] = 'Prenumerera på alla forum';
$string['allunsubscribe'] = 'Säg upp alla prenumerationer på forum';
$string['alreadyfirstpost'] = 'Det här är redan det första inlägget i diskussionen';
$string['anyfile'] = 'Vilken fil som helst';
$string['areaattachment'] = 'Bilagor';
$string['areapost'] = 'Meddelanden';
$string['attachment'] = 'Bilaga';
$string['attachment_help'] = 'Alternativt kan Du bifoga en eller flera filer till ett inlägg i ett forum. Om Du bifogar en bild så kommer den att visas efter meddelandet.';
$string['attachmentnopost'] = 'Du kan inte exportera bilagor utan ett ID för inlägget.';
$string['attachments'] = 'Bilagor';
$string['blockafter'] = 'Tröskel för blockering av inlägg';
$string['blockafter_help'] = 'Den här inställningen specificerar det maximala antalet inlägg som en användare kan göra inom den givna tiden.  Användare med kapaciteten mod/forum:postwithoutthrottling är undantagna från den här begränsningen. ';
$string['blockperiod'] = 'Tidsperiod för blockering';
$string['blockperioddisabled'] = 'Blockera inte';
$string['blockperiod_help'] = 'Studenter/elever/deltagare/lärande kan blockeras från att göra fler än det givna antalet inlägg inom tidsperioden. Användare med kapaciteten mod/forum:postwithoutthrottling är undantagna från den här begränsningen. ';
$string['blogforum'] = 'Standardforum som visas i ett bloggliknande format. ';
$string['bynameondate'] = 'av {$a->name} - {$a->date}';
$string['cannotadd'] = 'Det gick inte att lägga till diskussionen till det här forumet. ';
$string['cannotadddiscussion'] = 'För att lägga till diskussionsämnen till det här forumet krävs det att man är medlem av en grupp.';
$string['cannotadddiscussionall'] = 'Du har inte tillstånd att lägga till ett nytt diskussionsämne för alla deltagare. ';
$string['cannotaddsubscriber'] = 'Det gick inte att lägga till en prenumerant med id {$a} till det här forumet!';
$string['cannotaddteacherforumto'] = 'Det gick inte att lägga till en omvänd instans av ett lärarforum till sektion 0 i kursen';
$string['cannotcreatediscussion'] = 'Det gick inte att skapa en ny diskussion';
$string['cannotcreateinstanceforteacher'] = 'Det gick inte att skapa en ny instans av en kursmodul för lärarforumet.';
$string['cannotdeleteforummodule'] = 'Du kan inte ta bort forummodulen. ';
$string['cannotdeletepost'] = 'Du kan inte ta bort det här inlägget!';
$string['cannoteditposts'] = 'Du kan inte redigera andra människors inlägg!';
$string['cannotfinddiscussion'] = 'Det gick inte att hitta diskussionen i det här forumet';
$string['cannotfindfirstpost'] = 'Det gick inte att hitta det första inlägget i det här forumet.';
$string['cannotfindorcreateforum'] = 'Det gick inte att hitta eller skapa ett huvudforum för nyheter för webbplatsen. ';
$string['cannotfindparentpost'] = 'Det gick inte att hitta den översta föräldern till inlägget {$a}.';
$string['cannotmovefromsingleforum'] = 'Det går inte att flytta diskussioner från ett enkelt diskussionsforum.';
$string['cannotmovenotvisible'] = 'Forumet är inte synligt. ';
$string['cannotmovetonotexist'] = 'Du kan inte flytta till det där forumet - det finns inte!';
$string['cannotmovetonotfound'] = 'Målforumet fanns inte i den här kursen. ';
$string['cannotmovetosingleforum'] = 'Kan inte flytta diskussionen till ett enkelt endiskussionsforum';
$string['cannotpurgecachedrss'] = 'Det gick inte att hitta källan och/eller de adresserade forumen i de cachade RSS-flödena - kolla Din fil "permissionforums".';
$string['cannotremovesubscriber'] = 'Det gick inte att ta bort prenumeranten med id {$a} från det här forumet!';
$string['cannotreply'] = 'Du kan inte svara på det här inlägget.';
$string['cannotsplit'] = 'Diskussioner från det här forumet går inte att dela upp.';
$string['cannotsubscribe'] = 'Du måste tyvärr vara en gruppmedlem för att prenumerera.';
$string['cannottrack'] = 'Det gick inte att avaktivera spårning av detta forum. ';
$string['cannotunsubscribe'] = 'Det gick inte att ta bort Din prenumeration på detta forum. ';
$string['cannotupdatepost'] = 'Du kan inte uppdatera det här inlägget.';
$string['cannotviewpostyet'] = 'Du kan inte läsa de andras frågor i det här diskussionsämnet ännu eftersom du inte har gjort något eget inlägg.';
$string['cannotviewusersposts'] = 'Det finns inga inlägg gjorda av denna användare som du kan visa.';
$string['cleanreadtime'] = 'Markera gamla inlägg som lästa timme';
$string['completiondiscussions'] = 'Studenten/eleven/deltagaren/den lärande måste skapa diskussioner:';
$string['completiondiscussionsgroup'] = 'Kräv diskussioner';
$string['completiondiscussionshelp'] = 'kräver diskussionsämnen för att Du ska kunna fullfölja';
$string['completionposts'] = 'Studenten/eleven/deltagaren/den lärande måste starta diskussioner eller svara:';
$string['completionpostsgroup'] = 'Kräv inlägg';
$string['completionpostshelp'] = 'kräver diskussionsämnen eller svar för att Du ska kunna fullfölja';
$string['completionreplies'] = 'Studenten/eleven/deltagaren/den lärande måste göra inlägg som svar:';
$string['completionrepliesgroup'] = 'Kräv svar';
$string['completionreplieshelp'] = 'kräver svar för att Du ska kunna fullfölja';
$string['configcleanreadtime'] = 'Tidpunkten under dagen då gamla inlägg ska rensas från \'läs\'-tabellen.';
$string['configdigestmailtime'] = 'Användare som väljer att prenumerera på sammanfattande e-postmeddelanden kommer att få dessa sammanfattningar dagligen. Den här inställningen bestämmer vid vilken tid på dygnet som det dagliga e-postmeddelandet kommer att skickas. (det "cron" som körs efter denna timme kommer att sända det)';
$string['configdisplaymode'] = 'Det förinställda sättet att visa diskussionsämnen, om Du inte har ställt in ett annat.';
$string['configenablerssfeeds'] = 'Den här omkopplaren aktiverar RSS -inmatning för alla forum. Du måste dock fortfarande koppla på inmatningen manuellt i inställlningarna för varje enskilt forum.';
$string['configenabletimedposts'] = 'Ställ in det här till \'Ja\' om Du vill att det ska vara möjligt att ställa in att perioder då nya diskussionsämnen initieras ska visas (experimentellt - ej fullt utprovat).';
$string['configlongpost'] = 'Alla inlägg som överskrider den här längden (förutom HTML) anses vara långa.';
$string['configmanydiscussions'] = 'Maximalt antal diskussionsämnen som visas per sida i ett forum.';
$string['configmaxattachments'] = 'Förvalt standardantal tillåtna bilagor per inlägg.';
$string['configmaxbytes'] = 'Standardval (förinställt värde) för den maximala storleken på bifogade filer på den här webbsajten (det finns även lokala inställningar för t.ex. varje enskild kurs)';
$string['configoldpostdays'] = 'Antal dagar då vilket gammalt inlägg som helst ska anses vara läst.';
$string['configreplytouser'] = 'När ett inlägg i ett forum har skickats som e-post; ska det då innehålla användarens e-postadress så att mottagarna kan svara personligen snarare än via forumet? Även om Du väljer "Ja" för denna inställning så kan användaren i sin profil välja att dölja sin e-postadress.';
$string['configshortpost'] = 'Alla inlägg som överskrider den här längden (förutom HTML) anses vara långa.';
$string['configtrackreadposts'] = 'Ställ in detta till \'Ja\' om Du vill spåra läst/inte läst för varje användare.';
$string['configusermarksread'] = 'Om \'Ja\' så måste användare manuellt markera ett inlägg som läst. Om \'Nej\' så markeras inlägget som läst när det visas.';
$string['confirmsubscribe'] = 'Vill Du verkligen prenumerera på forumet \'{$a}\'?';
$string['confirmunsubscribe'] = 'Vill Du verkligen avbryta prenumerationen på forumet \'{$a}\'?';
$string['couldnotadd'] = 'Det gick inte att lägga till Ditt inlägg på grund av okänt fel.';
$string['couldnotdeletereplies'] = 'Tyvärr, det kan inte tas bort eftersom folk redan har svarat på det.';
$string['couldnotupdate'] = 'Det gick inte att uppdatera Ditt inlägg på grund av okänt fel.';
$string['delete'] = 'Ta bort';
$string['deleteddiscussion'] = 'Diskussionsämnet har tagits bort';
$string['deletedpost'] = 'Inlägget har tagits bort';
$string['deletedposts'] = 'De inläggen har tagits bort';
$string['deletesure'] = 'Är Du säker på att Du vill ta bort detta inlägg?';
$string['deletesureplural'] = 'Är Du säker på att Du vill ta bort detta inlägg och alla svar? ({$a} inlägg)';
$string['digestmailheader'] = 'Det här är Din dagliga sammanfattning av nya inlägg  i {$a->sitename} forum. För att ändra på Dina val a e-post från forum - gå till {$a->userprefs}';
$string['digestmailprefs'] = 'Din användarprofil';
$string['digestmailsubject'] = '{$a}: sammanfattning av forum';
$string['digestmailtime'] = 'Klockslag för att skicka sammanfattad e-post';
$string['digestsentusers'] = 'Sammanfattande e-postmeddelanden har skickats till {$a} användare.';
$string['disallowsubscribe'] = 'Det är inte tillåtet att prenumerera';
$string['disallowsubscribeteacher'] = 'Det är inte tillåtet att prenumerera (utom för lärare)';
$string['discussion'] = 'Diskussionsämne';
$string['discussionmoved'] = 'Den här diskussionsämnet har flyttats till \'{$a}\'.';
$string['discussionmovedpost'] = 'Det här diskussionsämnet har flyttats <a href="{$a->discusshref}">hit </a>i forumet <a href="{$a->forumhref}">{$a->forumname}</a>';
$string['discussionname'] = 'Namn på diskussion';
$string['discussions'] = 'Diskussionsämnen';
$string['discussionsstartedby'] = '{$a}  inledde det här diskussionsämnet';
$string['discussionsstartedbyrecent'] = 'Diskussioner som nyligen har inletts av \'{$a}\'.';
$string['discussionsstartedbyuserincourse'] = 'Diskussioner startade av {$a->fullname} i {$a->coursename}';
$string['discussthistopic'] = 'Diskutera detta ämne';
$string['displayend'] = 'Visa slut';
$string['displayend_help'] = '<p>Du kan v&auml;lja om Ditt inl&auml;gg i ett forum ska visas fr.o.m. ett visst datum, utg&aring; efter ett visst datum eller om det bara ska visas under en viss period.</p>

<p>Avmarkera alternativet/en Avaktivera f&ouml;r att aktivera ett start- och/eller ett slutdatum. </p>

<p>L&auml;gg m&auml;rke tilll att anv&auml;ndare med r&auml;ttigheter som administrat&ouml;rer kommer att kunna se meddelandena innan de publiceras och efter det att de har \'tagits bort\'. </p>';
$string['displaymode'] = 'Läge för visning';
$string['displayperiod'] = 'Visa period';
$string['displaystart'] = 'Visa start';
$string['displaystart_help'] = '<p>Du kan v&auml;lja om Ditt inl&auml;gg i ett forum ska visas fr.o.m. ett visst datum, utg&aring; efter ett visst datum eller om det bara ska visas under en viss period.</p>

<p>Avmarkera alternativet/en Avaktivera f&ouml;r att aktivera ett start- och/eller ett slutdatum. </p>

<p>L&auml;gg m&auml;rke tilll att anv&auml;ndare med r&auml;ttigheter som administrat&ouml;rer kommer att kunna se meddelandena innan de publiceras och efter det att de har \'tagits bort\'. </p>';
$string['eachuserforum'] = 'Var och en  bidrar med ett  diskussionsämne';
$string['edit'] = 'Redigera';
$string['editedby'] = 'Redigerad av  {$a->name} - {$a->date}';
$string['editedpostupdated'] = '{$a}\'s inlägg uppdaterades';
$string['editing'] = 'Redigering';
$string['emptymessage'] = 'Något var fel med Ditt inlägg.  Kanske skrev Du inte in någon text, eller så var bilagan för stor. Dina ändringar har INTE sparats.';
$string['erroremptymessage'] = 'Meddelandet i inlägget kan inte vara tomt';
$string['erroremptysubject'] = 'Ämnesrubriken för inlägget kan inte vara tom.';
$string['errorenrolmentrequired'] = 'Du måste vara registrerad på den här kursen för att ta del av innehållet';
$string['errorwhiledelete'] = 'Det uppstod ett fel när inlägget skulle tas bort.';
$string['everyonecanchoose'] = 'Alla kan välja att prenumerera';
$string['everyonecannowchoose'] = 'Var och en kan nu välja att prenumerera';
$string['everyoneisnowsubscribed'] = 'Alla prenumererar nu på detta forum.';
$string['everyoneissubscribed'] = 'Alla prenumererar på detta forum';
$string['existingsubscribers'] = 'Befintliga prenumeranter';
$string['exportdiscussion'] = 'Exportera hela diskussionen';
$string['forcessubscribe'] = 'Det är obligatoriskt för alla att prenumerera på här forumet.';
$string['forum'] = 'Forum';
$string['forum:addinstance'] = 'Lägg till nytt forum';
$string['forum:addnews'] = 'Lägg till nyheter';
$string['forum:addquestion'] = 'Lägg till fråga';
$string['forum:allowforcesubscribe'] = 'Tillåt obligatorisk prenumeration';
$string['forumauthorhidden'] = 'Författare (dold)';
$string['forumblockingalmosttoomanyposts'] = 'Du närmar Dig tröskeln för hur många inlägg man får göra. Du har gjort inlägg {$a->numposts} gånger under den senaste  {$a->blockperiod} och begränsningen är {$a->blockafter} inlägg.';
$string['forumbodyhidden'] = 'Eftersom du inte har gjort något eget inlägg ännu så får Du inte se det här inlägget. Det kan också vara så att den tid som man har rätt att redigera inte har gått ut ännu.';
$string['forum:createattachment'] = 'Skapa bfiogade filer';
$string['forum:deleteanypost'] = 'Ta bort vilka inlägg som helst (när som helst)';
$string['forum:deleteownpost'] = 'Ta bort egna inlägg (inom en tidsram)';
$string['forum:editanypost'] = 'Redigera valfritt inlägg';
$string['forum:exportdiscussion'] = 'Exportera hela diskussionen';
$string['forum:exportownpost'] = 'Exportera Ditt eget inlägg';
$string['forum:exportpost'] = 'Exportera inlägg';
$string['forumintro'] = 'Introduktion till forum';
$string['forum:managesubscriptions'] = 'Administrera prenumerationer';
$string['forum:movediscussions'] = 'Flytta diskussionsämnen';
$string['forumname'] = 'Forumets namn';
$string['forumposts'] = 'Inlägg i forum';
$string['forum:postwithoutthrottling'] = 'Undantag från tröskeln för inlägg';
$string['forum:rate'] = 'Bedöm/värdera inlägg';
$string['forum:replynews'] = 'Svara på nyheter';
$string['forum:replypost'] = 'Svara på inlägg';
$string['forums'] = 'Forum';
$string['forum:splitdiscussions'] = 'Dela upp diskussionsämnen';
$string['forum:startdiscussion'] = 'Inled nya diskussionsämnen';
$string['forumsubjecthidden'] = 'Ämne (dolt)';
$string['forumtracked'] = 'Olästa inlägg spåras';
$string['forumtrackednot'] = 'Olästa inlägg spåras inte';
$string['forumtype'] = 'Typ av forum';
$string['forumtype_help'] = '<p>Det flera olika typer av forum som Du kan välja mellan:</p>
<p><b>Ett enda enskilt diskussionsämne</b> -
det är bara ett tema, allt på en sida.
Detta passar bra för korta fokuserade diskussioner.</p>
<p><b>Standardforum för allmänt bruk</b> -
det är ett öppet forum där var och en kan
initiera ett nytt diskussionsämne när som helst.
Detta är det bästa forumet för allmänna ändamål.</p>
<p><b>Varje person initierar ett diskussionsämne</b> - Varje person kan
initiera exakt ett nytt diskussionsämne (alla kan dock svara).
Detta passar bra när Du vill att varje enskild student/elev/deltagare/lärande
ska initiera en diskussion t ex om deras reflektioner angående veckans ämne, och alla
andra ska kunna ge respons på dessa.</p><p>Fråga/Svar-forum  Varje enskild student/elev/deltagare/lärande måste först göra inlägg om sina egna perspektiv innan de kan visa de andras. </p>
<p>(Detta kommer att utvecklas mer i kommande versioner av Moodle)</p>';
$string['forum:viewallratings'] = 'Visa alla betyg/bedömningar som har avgivits av individer.';
$string['forum:viewanyrating'] = 'Visa vilka bedömningar/värderingar som helst';
$string['forum:viewdiscussion'] = 'Visa diskussionsämnen';
$string['forum:viewhiddentimedposts'] = 'Visa dolda och tidsbestämda inlägg';
$string['forum:viewqandawithoutposting'] = 'Visa alltid inlägg av typen F(rågor) och S(var)';
$string['forum:viewrating'] = 'Visa den sammanlagda bedömning/värdering som Du har fått';
$string['forum:viewsubscribers'] = 'Visa prenumeranter';
$string['generalforum'] = 'Standardforum för allmänt bruk';
$string['generalforums'] = 'Allmänna forum';
$string['inforum'] = 'i {$a}';
$string['introblog'] = 'Inläggen i det här forumet kopierades hit automatiskt från bloggar som tillhör användare i den här kursen. Detta eftersom de blogginläggen inte längre var tillgängliga.';
$string['intronews'] = 'Allmänna nyheter och meddelanden';
$string['introsocial'] = 'Ett öppet forum där Du kan diskutera vad Du vill';
$string['introteacher'] = 'Ett forum endast för distanslärares anteckningar och diskussionsämnen';
$string['invalidaccess'] = 'Åtkomsten av den här sidan var ogiltig. ';
$string['invaliddiscussionid'] = 'ID för diskussionen var felaktigt alternativt existerar inte längre. ';
$string['invalidforcesubscribe'] = 'Ogiltig läge för obligatorisk prenumeration';
$string['invalidforumid'] = 'ID för forum var felaktigt. ';
$string['invalidparentpostid'] = ' ID för föräldra-inlägget var felaktigt. ';
$string['invalidpostid'] = 'Ogiltigt ID för inlägg {$a}';
$string['lastpost'] = 'Senaste inlägg';
$string['learningforums'] = 'Forum för lärande';
$string['longpost'] = 'Långt inlägg';
$string['mailnow'] = 'Skicka e-post nu';
$string['manydiscussions'] = 'Diskussionsämnen per sida';
$string['markalldread'] = 'Markera alla inlägg i detta diskussionsämne som lästa';
$string['markallread'] = 'Markera alla inlägg i detta forum som lästa';
$string['markread'] = 'Markera som läst';
$string['markreadbutton'] = 'Markera som <br  /> läst';
$string['markunread'] = 'Markera som oläst';
$string['markunreadbutton'] = 'Markera <br  />som oläst';
$string['maxattachments'] = 'Maximalt antal bilagor';
$string['maxattachments_help'] = 'Den här inställningen anger maximalt antal filer som man får bifoga till ett inlägg i ett forum. ';
$string['maxattachmentsize'] = 'Maximal storlek på bifogad fil';
$string['maxattachmentsize_help'] = '<p>Den person som har satt upp ett forum kan s&auml;tta begr&auml;nsningar
f&ouml;r hur stora de bifogade filerna f&aring;r vara. </p>
<p>Ibland &auml;r det m&ouml;jligt att ladda upp en fil som &ouml;verskrider denna
storlek men filen kommer inte att lagras p&aring; servern och Du kan f&aring; ett
felmeddelande.</p>';
$string['maxtimehaspassed'] = 'Tyvärr, men maximitiden för att redigera detta inlägg ({$a}) har passerat!';
$string['message'] = 'Meddelande';
$string['messageprovider:digests'] = 'Sammanfattningar av forum som man har prenumererat på';
$string['messageprovider:posts'] = 'Inlägg i forum som man har prenumererat på';
$string['missingsearchterms'] = 'De följande söktermerna förekommer bara i HTML-koden för det här meddelandet:';
$string['modeflatnewestfirst'] = 'Visa svarslista, med det senaste först';
$string['modeflatoldestfirst'] = 'Visa svarslista, med det äldsta först';
$string['modenested'] = 'Visa svar i nästlad form';
$string['modethreaded'] = 'Visa svar i trådad form';
$string['modulename'] = 'Forum';
$string['modulename_help'] = '<p><img src="<?php echo $CFG->wwwroot?>/mod/forum/icon.gif" alt="" />&nbsp;
<b>Forum</b></p>
<p>Det h&auml;r kan vara den viktigaste aktiviteten - det &auml;r h&auml;r som de flesta
diskussionerna &auml;ger rum. Forum kan vara strukturerade p&aring; olika s&auml;tt
och det kan ing&aring; bed&ouml;mning/v&auml;rdering  p&aring; \'peer\'-niv&aring;
av varje inl&auml;gg. Inl&auml;ggen kan visas i ett antal olika format och de kan inneh&aring;lla
bifogade filer. Genom att prenumerera p&aring; ett forum s&aring; kan deltagarna
f&aring; kopior p&aring; varje inl&auml;gg via e-post. En distansl&auml;rare kan st&auml;lla
in ett visst givet forum s&aring; att alla automatiskt prenumererar p&aring; det.
</p>';
$string['modulenameplural'] = 'Forum';
$string['more'] = 'mer';
$string['movedmarker'] = '(Flyttad)';
$string['movethisdiscussionto'] = 'Flytta det här diskussionsämnet  till...';
$string['mustprovidediscussionorpost'] = 'Du måste ange antingen ett ID för diskussion eller ID för inlägg för att kunna exportera. ';
$string['namenews'] = 'Nyhetsforum';
$string['namenews_help'] = '<p>Nyhetsforumet är ett speciellt forum som skapas automatiskt för varje kurs och för
ingångssidan på webbplatsen. Det är en plats där man kan publicera allmänna meddelanden.
Du kan bara ha ett nyhetsforum per kurs.</p>

<p>Blocket "Senaste nytt" kommer att visa de senaste och mest aktuella diskussionena från det här speciella forumet (även om du döper om det). Av den här orsaken kommer forumet automatiskt att återskapas av Moodle om du använder blocket "Senaste nytt".</p>';
$string['namesocial'] = 'Gemenskapsforum';
$string['nameteacher'] = 'Lärarforum';
$string['newforumposts'] = 'Nya inlägg i forum';
$string['noattachments'] = 'Det finns inga bilagor till det här inlägget';
$string['nodiscussions'] = 'Det finns ännu inga diskussionsämnen i detta forum';
$string['nodiscussionsstartedby'] = 'Den här användaren har inte inlett några diskussionsämnen.';
$string['nodiscussionsstartedbyyou'] = 'Du har inte startat några diskussioner ännu';
$string['noguestpost'] = 'Tyvärr, gäster har ingen behörighet att göra inlägg här';
$string['noguesttracking'] = 'Tyvärr, gäster får inte ställa in alternativ för spårning.';
$string['nomorepostscontaining'] = 'Det gick inte att hitta några inlägg som innehåller \'{$a}\'';
$string['nonews'] = 'Inga nya inlägg ännu';
$string['noonecansubscribenow'] = 'Det är nu inte tillåtet att prenumerera';
$string['nopermissiontosubscribe'] = 'Du har inte tillstånd att visa prenumeranterna av forumet.';
$string['nopermissiontoview'] = 'Du har inte tillstånd att visa det här inlägget.';
$string['nopostforum'] = 'Du har tyvärr inte tillstånd att göra inlägg i detta forum.';
$string['noposts'] = 'Inga inlägg';
$string['nopostscontaining'] = 'Det gick inte att hitta  några inlägg som innehåller \'{$a}\'';
$string['nopostsmadebyuser'] = '{$a} har inte gjort några inlägg';
$string['nopostsmadebyyou'] = 'Du har inte gjort några inlägg';
$string['noquestions'] = 'Det finns ännu inga frågor i det här forumet';
$string['nosubscribers'] = 'Det finns ännu inga prenumeranter på detta forum';
$string['notexists'] = 'Diskussionen existerar inte längre.';
$string['nothingnew'] = 'Ingenting nytt för {$a}';
$string['notingroup'] = 'Du måste tyvärr vara med i en grupp för att se detta forum.';
$string['notinstalled'] = 'Modulen forum är inte installerad';
$string['notpartofdiscussion'] = 'Det här inlägget är inte del av någon diskussion!';
$string['notrackforum'] = 'Spåra inte olästa meddelanden';
$string['noviewdiscussionspermission'] = 'Du har inte tillstånd att visa diskussionsämnen i det här forumet.';
$string['nowallsubscribed'] = 'Alla forum i {$a} är prenumererade';
$string['nowallunsubscribed'] = 'Alla forum i {$a} är inte prenumererade';
$string['nownotsubscribed'] = '{$a->name} kommmer INTE få kopior av \'{$a->forum}\' med e-post.';
$string['nownottracking'] = '{$a->name} spårar inte längre \'{$a->forum}\'.';
$string['nowsubscribed'] = '{$a->name} kommer få kopior av \'{$a->forum}\' med e-post.';
$string['nowtracking'] = '{$a->name} spårar nu \'{$a->forum}\'.';
$string['numposts'] = '{$a} inlägg';
$string['olderdiscussions'] = 'Äldre diskussionsämnen';
$string['oldertopics'] = 'Äldre ämnen';
$string['oldpostdays'] = 'Lästa efter dagar';
$string['openmode0'] = 'Inga diskussionsämnen, inga svar';
$string['openmode1'] = 'Inga diskussionsämnen, men svar är tillåtna';
$string['openmode2'] = 'Diskussionsämnen och svar är tillåtna';
$string['overviewnumpostssince'] = '{$a} inlägg sedan senaste inloggning';
$string['overviewnumunread'] = 'totalt {$a} olästa';
$string['parent'] = 'Visa \'föräldern\' till detta inlägg';
$string['parentofthispost'] = 'Föräldern till detta inlägg';
$string['pluginadministration'] = 'Administration av forum';
$string['pluginname'] = 'Forum';
$string['postadded'] = 'Ditt inlägg har lagts till.<p>Du har {$a} för att redigera det om Du vill göra ändringar.';
$string['postaddedsuccess'] = 'Ditt bidrag har lagts till framgångsrikt';
$string['postaddedtimeleft'] = 'Du har {$a} att redigera om du vill göra ändringar.';
$string['postincontext'] = 'Se detta inlägg i sitt sammanhang';
$string['postmailinfo'] = 'Detta är en kopia på ett meddelande inlagt på {$a} webbplats.
För att lägga till Ditt svar via webbplatsen, klicka på denna länk:';
$string['postmailnow'] = '<p>Det här inlägget kommer omedelbart att skicka med e-post till alla som prenumererar på forumet.</p>';
$string['postrating1'] = 'Visar mest enskilt,(rationellt) inriktat  vetande (kunskap)';
$string['postrating2'] = 'Enskilt,(rationellt) inriktat  vetande (kunskap) och socialt, (empatiskt) inriktat vetande (kunskap)';
$string['postrating3'] = 'Visar mest socialt, (empatiskt) inriktat vetande (kunskap)';
$string['posts'] = 'Inlägg';
$string['postsmadebyuser'] = 'Inlägg av {$a}';
$string['postsmadebyuserincourse'] = 'Inlägg av {$a->fullname} i {$a->coursename}';
$string['posttoforum'] = 'Publicera inlägget i forumet';
$string['postupdated'] = 'Ditt inlägg har blivit uppdaterat';
$string['potentialsubscribers'] = 'Möjliga prenumeranter';
$string['processingdigest'] = 'Bearbetar sammanfattande e-postmeddelande för användare {$a}';
$string['processingpost'] = 'Bearbetar inlägg {$a}';
$string['prune'] = 'Avbryt';
$string['prunedpost'] = 'Ett nytt diskussionsämne har skapats av posten';
$string['pruneheading'] = 'Avbryt inlägg och flytta till ett nytt diskussionsämne';
$string['qandaforum'] = 'Forum för frågor och svar';
$string['qandanotify'] = 'Det här är ett forum för frågor och svar. För att Du ska få se andras svar på de här frågorna så måste Du först skicka in Ditt eget svar.';
$string['re'] = 'Svar:';
$string['readtherest'] = 'Läs fortsättningen på detta ämne';
$string['replies'] = 'Svar:';
$string['repliesmany'] = '{$a} svar så långt';
$string['repliesone'] = '{$a} svar så långt';
$string['reply'] = 'Svar';
$string['replyforum'] = 'Svar till forum';
$string['replytouser'] = 'Använd e-postadressen i svaret';
$string['resetforums'] = 'Ta bort alla inlägg från';
$string['resetforumsall'] = 'Ta bort alla poster';
$string['resetsubscriptions'] = 'Ta bort alla prenumerationer på forum';
$string['resettrackprefs'] = 'Ta bort allt förval angående spårning av forum';
$string['rssarticles'] = 'Antal aktuella RSS-artiklar';
$string['rssarticles_help'] = '<p>Det h&auml;r alternativet l&aring;ter Dig v&auml;lja vilket antal RSS-artiklar
Du vill ta med i RSS-matningen.</p>
<p>Ett antal mellan 5 och 20 b&ouml;r vara l&auml;mpligt f&ouml;r de flesta forum.
&Ouml;ka antalet om det &auml;r ett forum som anv&auml;nds mycket.</p>';
$string['rsssubscriberssdiscussions'] = 'RSS-flöde med diskussionsämnen';
$string['rsssubscriberssposts'] = 'RSS-flöde med inlägg';
$string['rsstype'] = 'RSS-flöde för den här aktiviteten';
$string['rsstype_help'] = '<p>Det h&auml;r alternativet l&aring;ter Dig aktivera RSS-matningar fr&aring;n det h&auml;r forumet.</p>
<p>Du kan v&auml;lja mellan tv&aring; typer av forum:</p>
<ul>
<li><b>Diskussions&auml;mnen:</b> Om Du anv&auml;nder det h&auml;r s&aring; kommer de nya
diskussions&auml;mnen i forumet, inklusive de inledande bidragen till dessa, att ing&aring; i de genererade utmatningarna.</li>
<li><b>Bidrag:</b> Om Du anv&auml;nder det h&auml;r s&aring; kommer varje nytt bidrag i forumet att ing&aring;
i de genererade utmatningarna.</li>
</ul>';
$string['search'] = 'Sök';
$string['searchdatefrom'] = 'Inlägget måste vara nyare än så här';
$string['searchdateto'] = 'Inlägget måste vara äldre än så här';
$string['searchforumintro'] = 'Var snäll och mata in sökord i ett eller flera av de följande textfälten:';
$string['searchforums'] = 'Sök forum';
$string['searchfullwords'] = 'De här orden bör stå som hela ord';
$string['searchnotwords'] = 'De här orden bör INTE tas med';
$string['searcholderposts'] = 'Sök äldre inlägg...';
$string['searchphrase'] = 'Exakt den här frasen måste vara med i inlägget';
$string['searchresults'] = 'Sökresultat';
$string['searchsubject'] = 'De här orden bör vara med i ämnet';
$string['searchuser'] = 'Det här namnet bör matcha författarens namn';
$string['searchuserid'] = 'Författarens Moodle-ID';
$string['searchwhichforums'] = 'Välj vilket/vilka forum Du vill söka i';
$string['searchwords'] = 'De här orden kan förekomma var som helst i inlägget';
$string['seeallposts'] = 'Visa alla inlägg som den här användaren har gjort';
$string['shortpost'] = 'Kort inlägg';
$string['showsubscribers'] = 'Visa prenumeranter';
$string['singleforum'] = 'Ett enkelt enskilt diskussionsämne';
$string['smallmessage'] = '{$a->user} gjorde inlägg i {$a->forumname}';
$string['startedby'] = 'Påbörjad av:';
$string['subject'] = 'Ämne';
$string['subscribe'] = 'Prenumerera på detta forum';
$string['subscribeall'] = 'Registrera alla som prenumeranter på detta forum';
$string['subscribed'] = 'Prenumererar';
$string['subscribeenrolledonly'] = 'Det är tyvärr bara registrerade användare som har rätt att prenumerera på foruminlägg med hjälp av e-post.';
$string['subscribenone'] = 'Avregistrera alla som prenumeranter på detta forum';
$string['subscribers'] = 'Prenumeranter';
$string['subscribersto'] = 'Prenumerera till \'{$a}\'';
$string['subscribestart'] = 'Skicka e-postkopior av inlägg i detta forum till mig';
$string['subscribestop'] = 'Skicka INTE e-postkopior av inlägg i detta forum  till mig';
$string['subscription'] = 'Prenumeration';
$string['subscriptionauto'] = 'Automatisk prenumeration';
$string['subscriptiondisabled'] = 'Prenumeration är avaktiverat';
$string['subscriptionforced'] = 'Obligatorisk prenumeration';
$string['subscription_help'] = '<p>N&auml;r n&aring;gon har prenumererat p&aring; ett forum s&aring; betyder det att de f&aring;r
kopior p&aring; varje inl&auml;gg i det forumet via e-post.
(Inl&auml;ggen skickas ungef&auml;r <?php echo $cfg->maxeditingtime/60 ?> minuter
efter det att de har gjorts).</p>
<p>M&auml;nniskor kan i regel v&auml;lja om de vill prenumerera p&aring; ett forum eller ej.</p>
<p>Distansl&auml;raren kan emellertid st&auml;lla in ett forum s&aring; att
alla deltagare blir prenumeranter.</p>
<p>Det l&auml;mpar sig s&auml;rskilt i Nyhetsforumet och i forum
som anv&auml;nds i b&ouml;rjan p&aring; kurser (innan alla har uppt&auml;ckt att
de kan prenumerera sj&auml;lva).</p>';
$string['subscriptionmode'] = 'Läge för prenumeration';
$string['subscriptionmode_help'] = '<p>N&auml;r en person prenumererar p&aring; ett forum s&aring; inneb&auml;r det att denne kommer att f&aring;
e-postkopior p&aring; varje inl&auml;gg i det forumet (inl&auml;gget skickas ut ungef&auml;r
 <?php echo $cfg->maxeditingtime/60 ?> minuter efter det att inl&auml;gget har skrivits in.
</p>
<p>Var och en kan normalt sett v&auml;lja om de vill prenumerera p&aring; ett visst forum eller inte.</p>
<p>Om Du emellertid v&auml;ljer att tvinga fram prenumeration p&aring; ett visst forum
d&aring; kommer alla anv&auml;ndare av kursen att registreras som prenumeranter - &auml;ven de som tillkommer till kursen senare.</p>
<p>Det h&auml;r &auml;r s&auml;rskilt anv&auml;ndbart i nyhetsforum och i forum som finns med i b&ouml;rjan av en kurs,
innan anv&auml;ndarna har kommit p&aring; att de sj&auml;lva kan prenumerera (eller inte) p&aring; dessa e-postmeddelanden.</p>
<p>Om Du v&auml;ljer alternativet "Ja, till att b&ouml;rja med" s&aring; kommer alla aktuella och senare tillkommande
anv&auml;ndare av kursen att bli initialt registrerade som prenumeranter, men de kan sj&auml;lva
avaktivera prenumerationen n&auml;r som helst. Om Du v&auml;ljer "Ja, permanent" s&aring; kan de inte sj&auml;lva
avaktivera prenumerationen.</p>
<p>L&auml;gg m&auml;rke till hur alternativet "Ja, till att b&ouml;rja med"
beter sig n&auml;r Du uppdaterar ett befintligt forum.
Om Du &auml;ndrar "Ja, till att b&ouml;rja med" till "Nej" s&aring; kommer det inte att
avregistrera befintliga prenumeranter utan de p&aring;verkar bara framtida anv&auml;ndare.
P&aring; samma s&auml;tt &auml;r det s&aring; att om Du senare &auml;ndrar till "Ja, till att b&ouml;rja med" s&aring; p&aring;verkar detta inte
befintliga anv&auml;ndare utan bara de som tillkommer senare. </p>';
$string['subscriptionoptional'] = 'Alternativ prenumeration';
$string['subscriptions'] = 'Prenumerationer';
$string['thisforumisthrottled'] = 'Det här forumet tillåter bara ett visst antal inlägg som Du kan göra inom en viss tidsperiod. Detta är f n inställt till {$a->blockafter} inlägg under {$a->blockperiod}';
$string['timedposts'] = 'Tidsbegränsade inlägg';
$string['timestartenderror'] = 'Slutdatumet kan inte vara tidigare än startdatumet';
$string['trackforum'] = 'Spåra olästa meddelanden';
$string['tracking'] = 'Spåra';
$string['trackingoff'] = 'Av';
$string['trackingon'] = 'På';
$string['trackingoptional'] = 'Valfri';
$string['trackingtype'] = 'Spåra läsningen av detta forum?';
$string['trackingtype_help'] = '<p>Om \'spårning av lästa\' för forum är aktiverat kan användare
spåra lästa och olästa meddelanden i forum och diskussionsämnen.
(Distans)läraren kan välja att tvinga fram en typ av spårning för
ett forum som använder denna inställning.
</p>

<p>Det finns tre alternativ för den här inställningen:</p>
<ul>
<li> Valfritt [standardmässigt förval]: studenter/elever/deltagare/lärande kan
koppla på eller av spårning frö forumet som de vill.</li>
<li>På: Spårning är alltid på.</li>
<li>Av: Spårning är alltid av.</li>
</ul>';
$string['unread'] = 'Oläst';
$string['unreadposts'] = 'Olästa inlägg';
$string['unreadpostsnumber'] = '{$a} olästa inlägg';
$string['unreadpostsone'] = '1 oläst inlägg';
$string['unsubscribe'] = 'Avbeställ prenumeration från detta forum';
$string['unsubscribeall'] = 'Avbryt alla prenumerationer på forum';
$string['unsubscribeallconfirm'] = 'Du prenumererar f n på {$a} forum. Vill Du verkligen avbryta alla prenumerationer och avaktivera automatisk prenumeration av forum?';
$string['unsubscribealldone'] = 'Alla Dina prenumerationer på forum har tagits bort. Du kan fortfarande få meddelanden från forum med obligatorisk prenumeration. Om Du inte vill ha några fler e-postmeddelanden från den här server, var då snäll och gå till Din profil och avaktivera e-postadressen där.';
$string['unsubscribeallempty'] = 'Du är tyvärr inte registrerad som prenumerant på några forum. Om Du inte vill ha några fler e-postmeddelanden från den här server, var då snäll och gå till Din profil och avaktivera e-postadressen där.';
$string['unsubscribed'] = 'Avbeställd';
$string['unsubscribeshort'] = 'Avregistrera prenumeration';
$string['usermarksread'] = 'Uppmärkning  för läsning av manuellt meddelande';
$string['viewalldiscussions'] = 'Visa alla diskussioner';
$string['warnafter'] = 'Gör ett inlägg som varnar för en tröskel';
$string['warnafter_help'] = 'Studenter/elever/deltagare/lärande kan varnas om de närmar sig det maximala antalet inlägg som är tillåtna under en given tidsperiod. Den här inställningen anger när de ska varnas. Användare med kapaciteten mod/forum:postwithoutthrottling är undantagna från den här begränsningen. ';
$string['warnformorepost'] = 'Varning!  Det finns mer än ett diskussionämne i det forumet - som använder det senaste.';
$string['yournewquestion'] = 'Din nya fråga';
$string['yournewtopic'] = 'Ditt nya diskussionsämne';
$string['yourreply'] = 'Ditt svar';
