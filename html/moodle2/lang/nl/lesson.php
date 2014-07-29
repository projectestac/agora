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
 * Strings for component 'lesson', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   lesson
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Toegangscontrole';
$string['actionaftercorrectanswer'] = 'Actie na juist antwoord';
$string['actionaftercorrectanswer_help'] = 'Na een juist antwoord op een vraag zijn er 3 opties voor de volgende pagina:

* Normaal - Volgt het lesverloop
* Toon een ongeziene pagina - Toont een willekeurige pagina die nog niet eerder werd getoond, één enkele keer
* Toon een onbeantwoorde pagina - Toont een willekeurige pagina die nog niet eerder werd beantwoord, hoewel misschien eerder getoond';
$string['actions'] = 'Acties';
$string['activitylink'] = 'Link naar volgende activiteit';
$string['activitylink_help'] = '<p>In dit rolmenu zitten alle activiteiten van deze cursus. Als er één van geselecteerd wordt, dan zal er aan het eind van de les een link verschijnen naar die activiteit.</p>';
$string['activitylinkname'] = 'Ga naar {$a}';
$string['activityoverview'] = 'Je hebt lessen te voltooien';
$string['addabranchtable'] = 'Voeg een pagina toe';
$string['addanendofbranch'] = 'Voeg het einde van een tak toe';
$string['addanewpage'] = 'Voeg een nieuwe pagina toe';
$string['addaquestionpage'] = 'Voeg een vragenpagina toe';
$string['addaquestionpagehere'] = 'Voeg hier een vragenpagina toe';
$string['addbranchtable'] = 'Voeg een inhoudspagina toe';
$string['addcluster'] = 'Voeg een cluster toe';
$string['addedabranchtable'] = 'Inhoudspagina toegevoegd';
$string['addedanendofbranch'] = 'Einde van een tak toegevoegd';
$string['addedaquestionpage'] = 'Vragenpagina toegevoegd';
$string['addedcluster'] = 'Cluster toegevoegd';
$string['addedendofcluster'] = 'Einde van een cluster toegevoegd';
$string['addendofcluster'] = 'Voeg het einde van een cluster toe';
$string['addpage'] = 'Pagina toevoegen';
$string['anchortitle'] = 'Begin van de hoofdinhoud';
$string['and'] = 'EN';
$string['answer'] = 'Antwoord';
$string['answeredcorrectly'] = 'juist geantwoord.';
$string['answersfornumerical'] = 'Antwoorden voor numerieke vragen moeten koppels zijn van de minimum- en de maximumwaarde';
$string['arrangebuttonshorizontally'] = 'Inhoudsknoppen horizontaal schikken?';
$string['attempt'] = 'Poging: {$a}';
$string['attempts'] = 'Pogingen';
$string['attemptsdeleted'] = 'Verwijderde pogingen';
$string['attemptsremaining'] = 'Je kan nog {$a} poging(en) doen';
$string['available'] = 'Beschikbaar vanaf';
$string['averagescore'] = 'Gemiddelde score';
$string['averagetime'] = 'Gemiddelde tijd';
$string['branch'] = 'Inhoud';
$string['branchtable'] = 'Inhoud';
$string['cancel'] = 'Annuleer';
$string['cannotfindanswer'] = 'Fout: kon antwoord niet vinden';
$string['cannotfindattempt'] = 'Fout: kon poging niet vinden';
$string['cannotfindessay'] = 'Fout: kon open vraag niet vinden';
$string['cannotfindfirstgrade'] = 'Fout: kon cijfers niet vinden';
$string['cannotfindfirstpage'] = 'Kon eerste pagina niet vinden';
$string['cannotfindgrade'] = 'Fout: kon cijfers niet vinden';
$string['cannotfindnewestgrade'] = 'Fout: kon nieuwste cijfer niet vinden';
$string['cannotfindnextpage'] = 'Lesback-up: volgende pagina niet gevonden';
$string['cannotfindpagerecord'] = 'Pagina-record aan het einde van de vertakking niet gevonden';
$string['cannotfindpages'] = 'Kon lespagina\'s niet vinden';
$string['cannotfindpagetitle'] = 'Bevesting verwijderen: paginatitel niet gevonden';
$string['cannotfindpreattempt'] = 'Record van vorige poging niet gevondden!';
$string['cannotfindrecords'] = 'Fout: kon records van les niet vinden';
$string['cannotfindtimer'] = 'Fout: kon records van lestimer niet vinden';
$string['cannotfinduser'] = 'Fout: kon geen gebruikers vinden';
$string['canretake'] = '{$a} mag de les opnieuw doen';
$string['casesensitive'] = 'Regular expressions gebruiken';
$string['casesensitive_help'] = '<p>Enkele vraagtypes hebben een optie die ingeschakeld kan worden door deze checkbox aan te vinken. De vraagtypes en de bedoeling van de opties worden hier in detail overlopen.</p>

<ol>
<li><p><b>Meerkeuzevragen</b> Er is een variant op de meerkeuzevragen die
    <b>&quot;Meerkeuzevraag met meerdere antwoorden&quot;</b> genoemd wordt. Als de vraagoptie aangevinkt is, dan wordt de leerling verwacht alle juiste opties te selecteren uit de aangeboden set antwoorden. In de vraag kun je al dan niet aangeven <i>hoeveel</i> antwoorden uit de set juist zijn. Bijvoorbeeld: &quot;Welke van de volgende personen waren Amerikaanse presidenten?&quot; tegenover &quot;Kies de twee Amerikaanse presidenten uit de onderstaande lijst.&quot;. Het aantal juiste antwoorden kan van <b>één</b> tot een willekeurig aantal zijn. (Meerkeuzevragen met de mogelijkheid om meerdere antwoorden te kiezen en waar maar één antwoord juist is, dat kan ook: het geeft de leerling de mogelijkheid meerdere antwoorden aan te duiden, terwijl een gewone meerkeuzevraag die mogelijkheid niet geeft.)</p></li>
<li><p><b>Kort antwoord</b> Standaard is hoofdlettergevoeligheid uitgeschakeld. Als de vraagoptie is aangevinkt, dan wordt er bij de verbetering met hoofdletters rekening gehouden.</p></li>
<p>De andere vraagtypes gebruiken de vraagopties niet.</p>';
$string['checkbranchtable'] = 'Controleer inhoudspagina';
$string['checkedthisone'] = 'Deze is gecontroleerd';
$string['checknavigation'] = 'Controleer de navigatie';
$string['checkquestion'] = 'Controleer de vraag';
$string['classstats'] = 'Statistieken van de klas';
$string['clicktodownload'] = 'Klik op de link om het bestand te downloaden';
$string['clicktopost'] = 'Klik hier om je cijfer op de scorelijst te zetten';
$string['cluster'] = 'Cluster';
$string['clusterjump'] = 'Ongeziene vraag binnen een cluster';
$string['clustertitle'] = 'Cluster';
$string['collapsed'] = 'Samengeplooid';
$string['comments'] = 'Jouw commentaar';
$string['completed'] = 'Voltooid';
$string['completederror'] = 'Voltooi de les';
$string['completethefollowingconditions'] = 'Je moet volgende voorwaarde(n) voltooien in les <b>{$a}</b> voor je verder kan gaan.';
$string['conditionsfordependency'] = 'Voorwaarde(n) voor deeltaak';
$string['configactionaftercorrectanswer'] = 'De standaardactie na een juist antwoord';
$string['configmaxanswers'] = 'Standaard maximaal aantal antwoorden per pagina';
$string['configmaxhighscores'] = 'Te tonen aantal hoogste scores';
$string['configmediaclose'] = 'Toont een sluit-knop als deel van de pop-up waarin het gelinkte mediabestand getoond wordt';
$string['configmediaheight'] = 'Instelling voor de hoogte van de pop-up voor het gelinkte mediabestand';
$string['configmediawidth'] = 'Instelling voor de breedte van de pop-up voor het gelinkte mediabestand';
$string['configslideshowbgcolor'] = 'Achtergrondkleur voor de diashow als die is ingeschakeld';
$string['configslideshowheight'] = 'Instelling voor de hoogte van de diashow als die is ingeschakeld';
$string['configslideshowwidth'] = 'Instelling voor de breedte van de diashow als die is ingeschakeld';
$string['confirmdelete'] = 'Verwijder pagina';
$string['confirmdeletionofthispage'] = 'Bevestig het verwijderen van deze pagina';
$string['congratulations'] = 'Proficiat - je hebt het einde van de les bereikt';
$string['continue'] = 'Ga verder';
$string['continuetoanswer'] = 'Ga verder met het wijzigen van de antwoorden';
$string['continuetonextpage'] = 'Ga naar volgende pagina';
$string['correctanswerjump'] = 'Sprong bij juist antwoord';
$string['correctanswerscore'] = 'Cijfer bij juist antwoord';
$string['correctresponse'] = 'Juist antwoord';
$string['createaquestionpage'] = 'Maak een vragenpagina';
$string['credit'] = 'Krediet';
$string['customscoring'] = 'Aangepaste cijfers';
$string['customscoring_help'] = '<p>Hiermee kun je een numerieke puntenwaarde geven voor elk antwoord. Antwoorden kunnen een negatief of een positief cijfer krijgen. Geïmporteerde vragen zullen automatisch 1 punt voor een juist en 0 punten voor een fout antwoord krijgen. Je kunt dit wijzigen na het importeren.</p>';
$string['deadline'] = 'Deadline';
$string['defaultessayresponse'] = 'Je antwoord op deze open vraag zal door de leraar beoordeeld worden.';
$string['deleteallattempts'] = 'Verwijder alle pogingen';
$string['deletedefaults'] = 'Standaard les {$a} verwijderd';
$string['deletedpage'] = 'Pagina verwijderd';
$string['deleting'] = 'Verwijderen';
$string['deletingpage'] = 'Bezig met pagina {$a} verwijderen';
$string['dependencyon'] = 'Deeltaak van';
$string['dependencyon_help'] = 'Met deze instelling kun je de toegang tot deze les afhankelijk maken van de score van een student voor een andere les in dezelfde cursus. Elke combinatie van gespendeerde tijd, voltooid, of "cijfer hoger dan" kunnen worden gebruikt.';
$string['description'] = 'Beschrijving';
$string['detailedstats'] = 'Gedetailleerde statistieken';
$string['didnotanswerquestion'] = 'Deze vraag niet beantwoord';
$string['didnotreceivecredit'] = 'Geen cijfers gekregen';
$string['displaydefaultfeedback'] = 'Gebruik standaard feedback';
$string['displaydefaultfeedback_help'] = '<p align="center"><strong>Toon standaardfeedback</strong></p>

<p>Als deze instelling op <strong>ja</strong> gezet wordt, dan zal bij het ontbreken van feedback, de standaardfeedback "Juist antwoord" en "Fout antwoord" gebruikt worden.</p>
<p>Als deze instelling op <strong>Nee</strong> gezet wordt, dan zal er bij het ontbreken van feedback niets getoond worden. De gebruiker wordt dan automatisch naar de volgende pagina van de les gebracht worden.</p>';
$string['displayhighscores'] = 'Toon hoogste cijfers';
$string['displayinleftmenu'] = 'Toon in linkermenu?';
$string['displayleftif'] = 'Minimum cijfer om het linkermenu te tonen';
$string['displayleftif_help'] = 'Deze instelling bepaalt of een leerling een bepaald cijfer moet halen voor die het linker menu kan zien. Dit verplicht een leerling om door de hele les te gaan tijdens de eerste poging, dan kan die na het behalen van het vereiste cijfer, het linker menu gebruiken om na te kijken.';
$string['displayleftmenu'] = 'Toon linkermenu';
$string['displayleftmenu_help'] = 'Indien ingeschakeld, wordt een lijst van pagina\'s getoond.';
$string['displayofgrade'] = 'Tonen van het cijfer (voor de leerling)';
$string['displayreview'] = 'Geef de optie om een vraag opnieuw te proberen';
$string['displayreview_help'] = 'Indien ingeschakeld, zal bij een fout antwoord de student de optie krijgen om ofwel de vraag vrijblijvend opnieuw te proberen (zonder cijfer), ofwel verder te gaan met de les.';
$string['displayscorewithessays'] = '<p>Je hebt {$a->score} punten op {$a->tempmaxgrade} behaald voor de automatisch beoordeelde vragen.</p><p>Je {$a->essayquestions} open vragen zullen beoordeeld worden op een later moment  toegevoegd worden bij je totaalcijfer.</p><p>Je resultaat op dit ogenblik, zonder de open vragen is {$a->score} op {$a->grade}.</p>';
$string['displayscorewithoutessays'] = 'Je cijfer is {$a->score} (op {$a->grade}).';
$string['edit'] = 'Bewerk';
$string['editingquestionpage'] = 'Bewerken {$a} vragenpagina';
$string['editlessonsettings'] = 'Bewerk de instellingen van deze les';
$string['editpage'] = 'Bewerk pagina inhoud';
$string['editpagecontent'] = 'Bewerk de inhoud van deze pagina';
$string['email'] = 'E-mail';
$string['emailallgradedessays'] = 'E-mail ALLE beoordeelde werken';
$string['emailgradedessays'] = 'E-mail de werken met een cijfer';
$string['emailsuccess'] = 'E-mails goed verzonden';
$string['emptypassword'] = 'Wachtwoord kan niet leeg zijn';
$string['endofbranch'] = 'Einde vertakking';
$string['endofcluster'] = 'Einde cluster';
$string['endofclustertitle'] = 'Einde van de cluster';
$string['endoflesson'] = 'Einde van de les';
$string['enteredthis'] = 'dit ingegeven.';
$string['entername'] = 'Geef een schuilnaam voor de lijst met hoogste scores';
$string['enterpassword'] = 'Geef het wachtwoord:';
$string['eolstudentoutoftime'] = 'Opgelet: je tijd voor deze les is helemaal op. Wanneer je laatste antwoord verstuurd is nadat de tijd op was, dan telt dat niet meer mee.';
$string['eolstudentoutoftimenoanswers'] = 'Je hebt geen enkele vraag beantwoord. Je hebt een 0 voor deze les';
$string['essay'] = 'Open vraag';
$string['essayemailmessage'] = '<p>Open vraag: <blockquote>{$a->question}</blockquote></p><p>Je antwoord: <blockquote><em>{$a->response}</em></blockquote></p><p>{$a->teacher}\'s comments:<blockquote><em>{$a->comment}</em></blockquote></p><p>Je hebt {$a->earned} punten gekregen op {$a->outof} voor deze open vraag.</p><p>Je cijfer voor deze les is gewijzigd naar {$a->newgrade}%.</p>';
$string['essayemailmessage2'] = '<p>Open vraag prompt:
<blockquote>{$a->question}</blockquote></p><p>Jouw antwoord:<blockquote><em>{$a->response}</em></blockquote></p><p>Commentaar van de beoordeler:<blockquote><em>{$a->comment}</em></blockquote></p><p>Je hebt {$a->earned} op {$a->outof} gekregen voor deze open vraag.</p><p>Je cijfer voor deze les is gewijzigd naar {$a->newgrade}&#37;.</p>';
$string['essayemailsubject'] = 'Jouw cijfer voor {$a} vraag';
$string['essays'] = 'Open vragen';
$string['essayscore'] = 'Cijfer voor de open vragen';
$string['fileformat'] = 'Bestandsformaat';
$string['finish'] = 'Einde';
$string['firstanswershould'] = 'Het eerste antwoord moet naar de "juist"-pagina verwijzen';
$string['firstwrong'] = 'Jammer genoeg verdien je dit punt niet, omdat je antwoord fout was. Wil je alleen maar voor de pret van het leren nog eens gokken (maar zonder er punten mee te verdienen)?';
$string['flowcontrol'] = 'Controle van het verloop';
$string['full'] = 'Volledig';
$string['general'] = 'Algemeen';
$string['gotoendoflesson'] = 'Ga naar het einde van de les';
$string['grade'] = 'Cijfer';
$string['gradebetterthan'] = 'Cijfer beter dan (%)';
$string['gradebetterthanerror'] = 'Verdien een cijfer beter dan {$a} procent';
$string['gradeessay'] = 'Beoordeel open vragen';
$string['gradeis'] = 'Cijfer is {$a}';
$string['gradeoptions'] = 'Beoordelingsopties';
$string['handlingofretakes'] = 'Behandeling van nieuwe pogingen';
$string['handlingofretakes_help'] = 'Als opnieuw mag geprobeerd worden, dan bepaalt deze instellingen of het eindcijfer voor de les het gemiddelde of het maximum van alle pogingen wordt.';
$string['havenotgradedyet'] = 'Nog geen cijfer gegeven';
$string['here'] = 'hier';
$string['highscore'] = 'Hoogste score';
$string['highscores'] = 'Hoogste scores';
$string['hightime'] = 'Langste duur';
$string['importcount'] = '{$a} vragen importeren';
$string['importquestions'] = 'Importeer vragen';
$string['importquestions_help'] = '<p>
Met deze functie kun je vragen importeren uit tekstbestanden op je eigen computer door ze te uploaden via een
formulier.</p>
<p>Een aantal bestandsformaten worden ondersteund:</p>

<p><b>GIFT</b></p>
<blockquote>
<p>GIFT is het meest uitgebreide importformaat beschikbaar voor het importeren van Moodle-vragen vanuit een
tekstbestand. Het is ontworpen als gemakkelijke importeermethode voor Moodle-vragen vanuit tekstbestanden. Het ondersteunt
meerkeuzevragen, waar/onwaar, kort antwoord, koppelvragen en numerieke vragen, evenals het invoeren van een __________ voor
het gatentekstformaat. Verschillende vragentypes kunnen gemixt worden in één tekstbestand en de opmaak ondersteunt ook
commentaar, vraagnamen, feedback en procentuele weging van cijfers. Hieronder enkele voorbeelden:</p>
<pre>
Wie is er begraven in de tombe van Grant?{~Grant ~Jefferson =niemand}

Grant is {~begraven =bijgezet ~levend} in Grants tombe.

Grant is begraven in Grants tombe.{FALSE}

Wie is begraven in Grants tombe?{=niemand =helemaal niemand}

Wanneer werd Ulysses S. Grant geboren?{#1822:1}
</pre>

<p align="right"><a href="help.php?file=formatgift.html&amp;module=quiz">Meer info over "GIFT"</a></p>
</blockquote>

<p><b>Aiken</b></p>
<blockquote>
<p>De Aiken bestandsopmaak is een heel eenvoudige manier om meerkeuzevragen te creëren door gebruik te maken van een
duidelijk, voor mensen leesbare opmaak. Hieronder een voorbeeld van de opmaak:</p>
<pre>
Wat is het doel van eerste hulp?
A. Levens redden, verdere kwetsuren voorkomen, goede gezondheid bewaren
B. Medicijnen toedienen aan een gekwetste of gewonde persoon
C. Verdere kwetsuren voorkomen
D. Slachtoffers die hulp zoeken helpen
ANSWER: A
</pre>

<p align="right"><a href="help.php?file=formataiken.html&amp;module=quiz">Meer info over "Aiken"</a></p>
</blockquote>
<p><b>Gatentekst</b></p>
<blockquote>
<p>
Elk antwoord wordt gescheiden door een tilde (~). Het juiste antwoord wordt voorafgegaan door een gelijkheidsteken (=).
Tussen de vragen moet je één vrije regel laten.
Enkele voorbeelden:<br /><br />
<u>Meerkeuzevragen</u>
<blockquote>
Zodra we als kind onze lichaamsdelen beginnen te verkennen, bestuderen we
{=anatomie ~wetenschappen ~reflexen ~experimenten} en in feite blijven we studenten voor de rest van ons
leven.
</blockquote>

<p align="right"><a href="help.php?file=formatmissingword.html&amp;module=quiz">Meer info over "Gatentekst"</a></p>
</blockquote>


<p><b>AON</b></p>
<blockquote>
<p>Dit is hetzelfde als het \'Gatentekst\'-formaat, behalve dat alle \'korte antwoord\' vragen per vier geconverteerd worden in koppelvragen</p>
<p>Het formaat is genoemd naar een organisatie die de ontwikkeling van testen gesponsord heeft.</p>
<blockquote>
1 m is gelijk aan ...<br />
{<br />
=100 cm;<br />
~1 cm;<br />
~10 cm;<br />
~1000 cm;<br />
}<br />
</blockquote>

</blockquote>


<p><b>Blackboard</b></p>
<blockquote>
<p>Met deze module kun je vragen importeren die in het exportformaat van Blackboard gemaakt zijn. Het steunt
op XML-functies die door PHP gecompileerd worden.</p>

<p align="right"><a href="help.php?file=formatblackboard.html&amp;module=quiz">Meer info over "Blackboard"-formaat</a></p>
</blockquote>


<p><b>WebCT</b></p>
<blockquote>
<p>Deze module kan vragen importeren vanuit het tekstgebaseerde vragenformaat van WebCT.</p>

<p align="right"><a href="help.php?file=formatwebct.html&amp;module=quiz">Meer informatie over het "WebCT"-formaat</a></p>
</blockquote>

<p><b>Course Test Manager</b></p>
<blockquote>
<p>Deze module kan vragen importeren die bewaard zijn in een Course Test Manager toetsenbank.
Het steunt op verschillende manieren om de testbank, die in een Microsoft Access databank zit, te koppelen.
De manier hangt ervan af of je Moodle-installatie op een Microsoft of op een Linux webserver loopt.</p>
<p>Op Windows laat het je gewoon je access databank uploaden zoals je gelijk welk ander gegevensbestand zou importeren.</p>
<p>Op Linux moet je eerst een windowsmachine installeren op hetzelfde netwerk als de  Course Test
Manager databank en een stukje software installeren, nl de ODBC Socket Server, die XML gebruikt om data door te zenden
naar Moodle op de Linux server.</p>  <p>Lees best eerst de volledige documentatie voor je deze importfilter
gebruikt.</p>


<p align="right"><a href="help.php?file=formatctm.html&amp;module=quiz">Meer info over het "CTM"-formaat</a></p>
</blockquote>

<p><b>Ingebedde antwoorden (Cloze)</b></p>
<blockquote>
<p>Met dit importformaat kun je slechts één soort vragen importeren: de ingebedde antwoorden (ook bekend als "cloze")</p>
<p align="right"><a href="help.php?file=multianswer.html&amp;module=quiz">Meer informatie over het "Cloze"-formaat</a></p>
</blockquote>


<p><b>Aangepast</b></p>
<blockquote>
<p>Als je je eigen opmaak hebt die geïmporteerd moet worden, dan kan je dit bouwen door mod/quiz/format/custom.php te bewerken.
</p>

<p>
De hoeveelheid nieuwe code die je moet maken is klein - juist genoeg om een stukje tekst om te zetten in een vraag.
</p>

<p align="right"><a href="help.php?file=formatcustom.html&amp;module=quiz">Meer info over het aangepast formaat</a></p>
</blockquote>


<p>
Er zijn nog meer formaten in ontwikkeling, zoals WebCT, IMS, QTI en gelijk welk formaat dat uitgewerkt wordt door Moodle-gebruikers!</p>';
$string['insertedpage'] = 'Pagina ingevoegd';
$string['invalidfile'] = 'Ingeldig bestand';
$string['invalidid'] = 'Geen cursusmodule ID of le ID is doorgegeven';
$string['invalidlessonid'] = 'Foute les ID';
$string['invalidpageid'] = 'Ongeldige pagina ID';
$string['jump'] = 'Spring';
$string['jumps'] = 'Verspringen';
$string['jumps_help'] = 'Elk antwoord (voor vragen) of beschrijving (voor inhoudelijke pagina\'s) heeft een bijhorende "ga naar"-link. De link kan relatief zijn, zoals \'deze pagina\', \'volgende pagina\' of absoluut, waarbij wordt verwezen naar een bepaalde, specifieke pagina in de les.';
$string['jumpsto'] = 'Verspringen naar  <em>{$a}</em>';
$string['leftduringtimed'] = 'Je bent weggegaan tijdens een getimede les. <br />Klik op ga verder om de les te hervatten.';
$string['leftduringtimednoretake'] = 'Je bent weggegaan tijdens een getimede les.  <br />Je mag niet verder werken.';
$string['leftduringtimedsession'] = 'Je bent weggegaan tijdens een getimede les';
$string['lesson:addinstance'] = 'Voeg een nieuwe les toe';
$string['lessonattempted'] = 'Poging';
$string['lessonclosed'] = 'Deze les sluit op {$a}.';
$string['lessoncloses'] = 'Les sluit';
$string['lessoncloseson'] = 'Les sluit op {$a}';
$string['lesson:edit'] = 'Bewerk een les';
$string['lessonformating'] = 'Opmaken van de les';
$string['lesson:manage'] = 'Beheer een les';
$string['lessonmenu'] = 'Lesmenu';
$string['lessonnotready'] = 'Deze les is nog niet klaar. Contacteer aub je {$a}';
$string['lessonnotready2'] = 'Deze les is niet klaar om te starten';
$string['lessonopen'] = 'Deze les zal openen op {$a}.';
$string['lessonopens'] = 'Les opent';
$string['lessonpagelinkingbroken'] = 'Eerste pagina niet gevonden. Waarschijnlijk is de link naar de lespagina gebroken. Contacteer een beheerder';
$string['lessonstats'] = 'Statistieken van de les';
$string['linkedmedia'] = 'Gelinkte media';
$string['loginfail'] = 'Login mislukt. Probeer nog eens...';
$string['lowscore'] = 'Laagste score';
$string['lowtime'] = 'kortste duur';
$string['manualgrading'] = 'Beoordeel open vragen';
$string['matchesanswer'] = 'Komt overeen met antwoord';
$string['matching'] = 'Koppelen';
$string['matchingpair'] = 'Gekoppeld paar {$a}';
$string['maxgrade'] = 'Maximumcijfer';
$string['maxgrade_help'] = 'Deze waarde bepaalt het maximumcijfer dat gegeven kan worden voor deze les. Als dit op 0 gezet wordt, dan verschijnt het cijfer niet op de cijferlijsten.';
$string['maxhighscores'] = 'Aantal getoonde hoogste cijfers';
$string['maximumnumberofanswersbranches'] = 'Maximale aantal antwoorden';
$string['maximumnumberofanswersbranches_help'] = 'Deze waarde bepaalt het maximale aantal antwoorden dat kan worden gebruikt in de les. Als de les enkel waar/onwaar-vragen gebruikt, dan kun je deze optie beter op 2 zetten.
De waarde kan op ieder moment worden gewijzigd; een nieuwe instelling heeft immers enkel effect op wat de leraar ziet, en niet op de data.';
$string['maximumnumberofattempts'] = 'Maximale aantal pogingen';
$string['maximumnumberofattempts_help'] = 'Deze waarde bepaalt het maximale aantal pogingen die een leerling krijgt om een vraag te beantwoorden. Indien het maximum wordt bereikt na telkens opnieuw een foutief antwoord, dan wordt de volgende pagina van de les getoond.';
$string['maximumnumberofattemptsreached'] = 'Maximum aantal pogingen bereikt - we gaan verder naar de volgende pagina.';
$string['maxtime'] = 'Tijdslimiet (minuten)';
$string['maxtimewarning'] = 'Je hebt {$a} minuten om de les af te werken.';
$string['mediaclose'] = 'Toon knop om te sluiten';
$string['mediafile'] = 'Bestands-pop up';
$string['mediafile_help'] = 'Kies het te tonen bestand om een pop-up-venster aan het begin van een les te tonen. Elke lespagina zal een link bevatten om indien nodig het pop-upvenster opnieuw te tonen.';
$string['mediafilepopup'] = 'Klik hier om te bekijken';
$string['mediaheight'] = 'Hoogte pop-upvenster:';
$string['mediawidth'] = 'Breedte pop-upvenster:';
$string['messageprovider:graded_essay'] = 'Melding beoordeling open vraag';
$string['minimumnumberofquestions'] = 'Minimaal aantal vragen';
$string['minimumnumberofquestions_help'] = 'Deze instelling specifieert het minimaal aantal vragen dat het mogelijk maakt om het cijfer voor de activiteit te berekenen. Indien de les een of meer inhoudspagina\'s bevat, dan moet de waarde worden ingesteld op nul.

Indien ingesteld op 20, bijvoorbeeld, dan voeg je best de volgende tekst toe in de openingspagina: "In deze les wordt van je verwacht dat je minstens 20 vragen beantwoordt. Je mag er meer beantwoorden als je wil, maar als je er minder maakt dan 20, dan zal je cijfer berekend worden alsof je er 20 gemaakt hebt."';
$string['missingname'] = 'Geef een schuilnaam';
$string['modattempts'] = 'Laat leerling nalezen';
$string['modattempts_help'] = '<p>Deze instelling zal leerlingen toelaten opnieuw door de les te navigeren en antwoorden te wijzigen.</p>';
$string['modattemptsnoteacher'] = 'Nalezen werkt alleen voor leerlingen';
$string['modulename'] = 'Les';
$string['modulename_help'] = 'Een lesactiviteit geeft de leraar de mogelijkheid om inhoud of oefeningen op een interessante en flexibele manier aan te bieden. Een leraar kan de les gebruiken om een lineaire set van inhoudspagina\'s of instructie-activiteiten te maken. In elk geval kunnen leraren kiezen om he engagement van de leerling te verhogen en om het begrijpen van de inhoud te verzekeren door een variatie aan vragen toe te voegen, zoals meerkeuzevragen, koppelvragen en korte antwoorden. Afhankelijk van het antwoord van de leerling en van hoe de leraar de les opbouwt, kunnen leerlingen dan naar de volgende pagina verder gaan of terug genomen worden naar een eerdere pagina of op een compleet ander pad gezet worden.

Een les kan beoordeeld worden met een cijfer in het puntenboek.

Les kan gebruikt worden

* voor zelfgestuurd leren van een nieuw onderwerp
* voor scenario\'s of simulaties van oefeningen rond beslissingen nemen
* voor gedifferentieerde herhaling met verschillende herhalingsvragen, afhankelijk van gegeven antwoorden op initiële vragen.';
$string['modulenameplural'] = 'Lessen';
$string['move'] = 'Verplaats pagina';
$string['movedpage'] = 'Pagina verplaatst';
$string['movepagehere'] = 'Verplaats de pagina naar hier';
$string['moving'] = 'Bezig met pagina {$a} verplaatsen';
$string['multianswer'] = 'Meer antwoorden';
$string['multianswer_help'] = '<p>Enkele vraagtypes hebben een optie die ingeschakeld kan worden door deze checkbox aan te vinken. De vraagtypes en de bedoeling van de opties worden hier in detail overlopen.</p>

<ol>
<li><p><b>Meerkeuzevragen</b> Er is een variant op de meerkeuzevragen die
    <b>&quot;Meerkeuzevraag met meerdere antwoorden&quot;</b> genoemd wordt. Als de vraagoptie aangevinkt is, dan wordt de leerling verwacht alle juiste opties te selecteren uit de aangeboden set antwoorden. In de vraag kun je al dan niet aangeven <i>hoeveel</i> antwoorden uit de set juist zijn. Bijvoorbeeld: &quot;Welke van de volgende personen waren Amerikaanse presidenten?&quot; tegenover &quot;Kies de twee Amerikaanse presidenten uit de onderstaande lijst.&quot;. Het aantal juiste antwoorden kan van <b>één</b> tot een willekeurig aantal zijn. (Meerkeuzevragen met de mogelijkheid om meerdere antwoorden te kiezen en waar maar één antwoord juist is, dat kan ook: het geeft de leerling de mogelijkheid meerdere antwoorden aan te duiden, terwijl een gewone meerkeuzevraag die mogelijkheid niet geeft.)</p></li>
<li><p><b>Kort antwoord</b> Standaard is hoofdlettergevoeligheid uitgeschakeld. Als de vraagoptie is aangevinkt, dan wordt er bij de verbetering met hoofdletters rekening gehouden.</p></li>
<p>De andere vraagtypes gebruiken de vraagopties niet.</p>';
$string['multichoice'] = 'Meerkeuze';
$string['multipleanswer'] = 'Meer antwoorden';
$string['nameapproved'] = 'Naam goedgekeurd';
$string['namereject'] = 'Je naam werd geweigerd. Probeer een andere naam.';
$string['new'] = 'nieuw';
$string['nextpage'] = 'Volgende pagina';
$string['noanswer'] = 'Eén of meerdere vragen zijn niet beantwoord. Ga terug en geef een antwoord.';
$string['noattemptrecordsfound'] = 'Geen pogingen gevonden: geen cijfer gegeven.';
$string['nobranchtablefound'] = 'Geen inhoudspagina gevonden';
$string['nocommentyet'] = 'Nog geen commentaar';
$string['nocoursemods'] = 'Geen activiteiten gevonden';
$string['nocredit'] = 'Geen krediet';
$string['nodeadline'] = 'Geen deadline';
$string['noessayquestionsfound'] = 'Er zijn geen open vragen gevonden in deze les';
$string['nohighscores'] = 'Geen hoogste cijfer';
$string['nolessonattempts'] = 'Niemand heeft deze les gemaakt.';
$string['nooneansweredcorrectly'] = 'Niemand heeft juist geantwoord';
$string['nooneansweredthisquestion'] = 'Niemand heeft deze vraag beantwoord';
$string['noonecheckedthis'] = 'Niemand heeft dit gecontroleerd';
$string['nooneenteredthis'] = 'Niemand heeft dit ingegeven';
$string['noonehasanswered'] = 'Niemand heeft een open vraag beantwoord';
$string['noretake'] = 'Je mag deze les niet opnieuw maken';
$string['normal'] = 'Normaal - volg het lespad';
$string['notcompleted'] = 'Nog niet voltooid';
$string['notdefined'] = 'Niet gedefinieerd';
$string['nothighscore'] = 'Je hebt de top {$a} cijferlijst niet gehaald.';
$string['notitle'] = 'Geen titel';
$string['numberofcorrectanswers'] = 'Aantal juiste antwoorden: {$a}';
$string['numberofcorrectmatches'] = 'Aantal juiste koppelingen: {$a}';
$string['numberofpagestoshow'] = 'Aantal te tonen pagina\'s';
$string['numberofpagestoshow_help'] = '<p>Deze pagina wordt alleen maar gebruikt in lessen met Flash Cards. De standaardwaarde is nul, wat betekent dat alle pagina\'s/Flash Cards in de les getoond worden. Door deze parameter op een andere waarde dan nul te zetten, worden slechts dat aantal pagina\'s getoond. Als dat aantal pagina\'s/Flash Cards getoond is, krijgt de leerling te zien dat het einde van de les bereikt is en wordt zijn cijfer getoond.</p>

<p>Als deze parameter op een getal groter dan het aantal pagina\'s in de les is ingesteld, dan wordt het einde van de les bereikt als alle pagina\'s getoond zijn.</p>';
$string['numberofpagesviewed'] = 'Aantal beantwoorde vragen: {$a}';
$string['numberofpagesviewednotice'] = 'Aantal beantwoorde vragen: {$a->nquestions}; (minimaal aantal antwoorden: {$a->minquestions})';
$string['numerical'] = 'Numeriek';
$string['ongoing'] = 'Toon het huidige cijfer';
$string['ongoingcustom'] = 'Dit is een les op {$a->score} punten. Je hebt nu al {$a->score} punten verdiend van de {$a->currenthigh} punten die er tot nu toe te verdienen waren.';
$string['ongoing_help'] = 'Indien ingeschakeld, zal elke pagina het huidig aantal verdiende punten uit het mogelijk totaal tonen.';
$string['ongoingnormal'] = 'Je hebt {$a->correct} vragen van de {$a->viewed} juist beantwoord.';
$string['onpostperpage'] = 'Slechts één bericht per cijfer';
$string['options'] = 'Opties';
$string['or'] = 'OF';
$string['ordered'] = 'Gesorteerd';
$string['other'] = 'Andere';
$string['outof'] = 'Van {$a}';
$string['overview'] = 'Overzicht';
$string['overview_help'] = 'Een les is opgebouwd uit een aantal pagina\'s en optioneel een aantal inhoudspagina\'s. Een pagina bevat een zekere inhoud en eindigt gewoonlijk met een vraag.
Aan elk antwoord op de vraag is een sprong verbonden. De sprong kan relatief zijn, zoals deze pagina of volgende pagina, of absoluut verwijzen naar om het even welke pagina in de les. Een inhoudspagina is een pagina die een reeks links naar andere pagina\'s in de les bevat, zoals bijvoorbeeld een inhoudstafel.';
$string['page'] = 'Pagina: {$a}';
$string['pagecontents'] = 'Inhoud van de pagina';
$string['page-mod-lesson-edit'] = 'Bewerk lespagina';
$string['page-mod-lesson-view'] = 'Bekijk of bekijk voorbeeld van lespagina';
$string['page-mod-lesson-x'] = 'Elke lespagina';
$string['pages'] = 'Pagina\'s';
$string['pagetitle'] = 'Titel van de pagina';
$string['password'] = 'Wachtwoord';
$string['passwordprotectedlesson'] = '{$a} is met een wachtwoord beveiligd.';
$string['pleasecheckoneanswer'] = 'Kies één antwoord';
$string['pleasecheckoneormoreanswers'] = 'Duid één of meer antwoorden aan';
$string['pleaseenteryouranswerinthebox'] = 'Geef je antwoord in het vakje';
$string['pleasematchtheabovepairs'] = 'Koppel bovenstaande paren';
$string['pluginadministration'] = 'Beheer les';
$string['pluginname'] = 'Les';
$string['pointsearned'] = 'Verdiende punten';
$string['postprocesserror'] = 'Fout opgetreden tijdens de verwerking!';
$string['postsuccess'] = 'Posten gelukt';
$string['practice'] = 'Oefenles';
$string['practice_help'] = '<p>Een oefenles zal niet in het puntenboek verschijnen.</p>';
$string['preprocesserror'] = 'Fout opgetreden tijdens de voorbereiding!';
$string['prerequisitelesson'] = 'Voorwaarde les';
$string['preview'] = 'Voorbeeld';
$string['previewlesson'] = 'Voorbeeld van {$a}';
$string['previouspage'] = 'Vorige pagina';
$string['processerror'] = 'Fout opgetreden tijdens de verwerking!';
$string['progressbar'] = 'Vorderingsbalk';
$string['progressbar_help'] = 'Indien ingeschakeld, krijg je een vorderingsbalk te zien onderaan de les pagina\'s. Deze vorderingsbalk toont bij nadering het percentage dat is voltooid.';
$string['progressbarteacherwarning'] = 'Vorderingsbalk niet tonen voor {$a}';
$string['progressbarteacherwarning2'] = 'Je zult de progressiebalk niet zien omdat je deze les kunt bewerken';
$string['progresscompleted'] = 'Je hebt {$a}% van de les beëindigd';
$string['qtype'] = 'Paginatype';
$string['question'] = 'Vraag';
$string['questionoption'] = 'Vraagoptie';
$string['questiontype'] = 'Vraagtype';
$string['randombranch'] = 'Willekeurige inhoudspagina';
$string['randompageinbranch'] = 'Willekeurige vraag binnen een inhoudspagina';
$string['rank'] = 'Rangschikking';
$string['rawgrade'] = 'Ruwe score';
$string['receivedcredit'] = 'Behaalde score';
$string['redisplaypage'] = 'Toon pagina opnieuw';
$string['report'] = 'Rapport';
$string['reports'] = 'Rapporten';
$string['response'] = 'Respons';
$string['retakesallowed'] = 'Opnieuw doen toegelaten';
$string['retakesallowed_help'] = '<p>Deze instelling bepaalt of de leerlingen de les meer dan eens kunnen doormaken of slechts één keer. De leraar kan beslissen of deze les materiaal bevat dat de leerlingen erg grondig moeten kennen. In dat geval moet het herhaald bekijken van de les toegelaten worden. Als het materaal eerder gebruikt wordt om te testen, dan kun je er beter voor kiezen de les maar één keer te laten doornemen.</p>

<p>Als de leerlingen de les mogen overdoen, dan wordt voor de <b>cijfers</b> in de cijfertabel hun <b>beste</b> poging gekozen. Nochtans worden voor de <b>vragen analyse</b> altijd de antwoorden van de eerste pogingen genomen. De volgende antwoorden worden genegeerd.</p>

<p>Merk op: de <b>Vraaganalyse</b> gebruikt altijd de antwoorden van de eerste poging van de les. De volgende pogingen worden genegeerd.</p>

<p>De standaardinstelling van deze optie is <b>Ja</b>, wat wil zeggen dat leerlingen de les opnieuw mogen doornemen. Waarschijnlijk moet deze optie slechts in uitzonderlijke gevallen op <b>Nee</b> gezet worden.</p>';
$string['returnto'] = 'Keer terug naar {$a}';
$string['returntocourse'] = 'Keer terug naar de cursuspagina';
$string['review'] = 'Nalezen';
$string['reviewlesson'] = 'Les nalezen';
$string['reviewquestionback'] = 'Ja, ik wil nog eens proberen';
$string['reviewquestioncontinue'] = 'Nee, ik wil naar de volgende vraag gaan';
$string['sanitycheckfailed'] = 'Fouten gevonden: deze poging wordt verwijderd';
$string['savechanges'] = 'Bewaar wijzigingen';
$string['savechangesandeol'] = 'Bewaar alle wijzigingen en ga naar het einde van de les';
$string['savepage'] = 'Bewaar pagina';
$string['score'] = 'Cijfer';
$string['score_help'] = 'Score wordt alleen gebruikt als aangepaste score is ingeschakeld. Elk antwoord kan vervolgens worden voorzien van een numerieke puntwaarde (positief of negatief).';
$string['scores'] = 'Cijfers';
$string['secondpluswrong'] = 'Niet echt. Wil je nog eens proberen?';
$string['selectaqtype'] = 'Kies een vraagtype';
$string['shortanswer'] = 'Kort antwoord';
$string['showanunansweredpage'] = 'Toon een onbeantwoorde pagina';
$string['showanunseenpage'] = 'Toon een ongeziene pagina';
$string['singleanswer'] = 'Eén enkel antwoord';
$string['skip'] = 'Sla navigatie over';
$string['slideshow'] = 'Diavoorstelling';
$string['slideshowbgcolor'] = 'Achtergrondkleur van de diavoorstelling';
$string['slideshowheight'] = 'Hoogte van de diavoorstelling';
$string['slideshow_help'] = '<p>Hiermee kun je de les als een diavoorstelling tonen, met een vaste breedte, hoogte en een aangepaste achtergrondkleur. Een op CSS gebaseerde rolbalk wordt getoond als de breedte of hoogte van de dia overschreden wordt door de inhoud van de pagina.
Standaard worden vragen niet getoond in een diavoorstelling, alleen vertakkingstabellen verschijnen. Knoppen met labels voor "Terug" en "Verder" worden links en rechts van de dia getoond als die optie gekozen is. Andere knoppen worden in het midden van de dia geplaatst.</p>';
$string['slideshowwidth'] = 'Breedte van de diavoorstelling';
$string['startlesson'] = 'Start de les';
$string['studentattemptlesson'] = 'Pogingnummer {$a->attempt} van {$a->lastname}, {$a->firstname}';
$string['studentname'] = '{$a} naam';
$string['studentoneminwarning'] = 'Waarschuwing: je hebt nog één minuut of minder om deze les af te werken.';
$string['studentresponse'] = 'Het antwoord van {$a}';
$string['submit'] = 'Insturen';
$string['submitname'] = 'Geef een naam';
$string['teacherjumpwarning'] = 'Er wordt een {$a->cluster} sprong of een {$a->unseen} sprong gebruikt in deze les. De sprong naar de volgende pagina zal in de plaats gebruikt worden. Meld je aan als leerling om deze sprongen te testen.';
$string['teacherongoingwarning'] = 'De score tijdens de les wordt alleen aan leerlingen getoond. Meld je aan als leerling om deze optie te testen';
$string['teachertimerwarning'] = 'De timer werkt enkel voor leerlingen. Test de timer door je als leerling aan te melden.';
$string['thatsthecorrectanswer'] = 'Dat is het juiste antwoord';
$string['thatsthewronganswer'] = 'Dat is het verkeerde antwoord';
$string['thefollowingpagesjumptothispage'] = 'Volgende pagina verwijst naar deze pagina';
$string['thispage'] = 'Deze pagina';
$string['timeremaining'] = 'Resterende tijd';
$string['timespenterror'] = 'Neem minstens {$a} minuten de tijd om de les te maken';
$string['timespentminutes'] = 'Gebruikte tijd (minuten)';
$string['timetaken'] = 'Gebruikte tijd';
$string['topscorestitle'] = 'Top {$a} hoogste cijfers';
$string['truefalse'] = 'Waar/niet waar';
$string['unabledtosavefile'] = 'Het bestand dat je uploadde kon niet bewaard worden';
$string['unknownqtypesnotimported'] = '{$a} vragen met niet ondersteunde vraagtypes werden niet geïmporteerd';
$string['unseenpageinbranch'] = 'Ongeziene vraag binnen een inhoudspagina';
$string['unsupportedqtype'] = 'Vraagtype ({$a}) niet ondersteund';
$string['updatedpage'] = 'Pagina geüpdatet';
$string['updatefailed'] = 'Update mislukt';
$string['usemaximum'] = 'Gebruik maximum';
$string['usemean'] = 'Gemiddelde';
$string['usepassword'] = 'Les beschermd met wachtwoord';
$string['usepassword_help'] = '<p>Hiermee zullen leerlingen die het wachtwoord niet kunnen intypen de les niet kunnen beginnen.</p>';
$string['viewgrades'] = 'Bekijk de cijfers';
$string['viewhighscores'] = 'Bekijk de lijst met de hoogste cijfers';
$string['viewreports'] = 'Bekijk {$a->attempts} voltooide pogingen van {$a->student}';
$string['viewreports2'] = 'Bekijk {$a} volledige pogingen';
$string['welldone'] = 'Goed gedaan!';
$string['whatdofirst'] = 'Wat wil je eerst doen?';
$string['wronganswerjump'] = 'Verkeerde antwoordsprong';
$string['wronganswerscore'] = 'Verkeerd antwoordcijfer';
$string['wrongresponse'] = 'Verkeerd antwoord';
$string['xattempts'] = '{$a} pogingen';
$string['youhaveseen'] = 'Je hebt al meer dan één pagina van deze les bekeken.<br />Wil je beginnen bij de laatste pagina die je vorige keer bekeken hebt?';
$string['youmadehighscore'] = 'Je hebt de top {$a} cijferlijst gehaald';
$string['youranswer'] = 'Jouw antwoord';
$string['yourcurrentgradeis'] = 'Je cijfer is nu {$a}';
$string['yourcurrentgradeisoutof'] = 'Je huidige cijfer is {$a->grade} op {$a->total}';
$string['youshouldview'] = 'Je moet een antwoord geven op minstens: {$a}';
