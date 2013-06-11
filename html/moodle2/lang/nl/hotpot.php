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
 * Strings for component 'hotpot', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'verlaten';
$string['activitycloses'] = 'Activiteit sluit';
$string['activitygrade'] = 'Activiteitscijfer';
$string['activityopens'] = 'Activiteit opent';
$string['added'] = 'Toegevoegd';
$string['addquizchain'] = 'Voeg een ketting testen toe';
$string['addquizchain_help'] = 'Moeten alle activiteiten in een testenketting toegevoegd worden?

**Nee**
: slechts één test zal aan de cursus toegevoegd worden.

**Ja**
: als het bronbestand een **testbestand** is, dan wordt het behandeld als de start van een testenketting en alle testen in de ketting zullen met dezelfde instellingen toegevoegd worden aan de cursus. Elke test moet een link hebben naar het volgende bestand in de ketting.

Als het bronbestand een **map** is, dan zullen alle herkenbare testen in de map toegevoegd worden aan de cursus om een testenketting te vormen met identieke instellingen.

Als het bronbestand een **unit file** is, zoals een Hot Potatoes masher bestand of index.html, dan zullen te testen die opgelijst zijn in het unit-bestand toegevoegd worden aan de cursus als een testenketting met identieke instellingen.';
$string['allowreview'] = 'Herbekijken toestaan';
$string['allowreview_help'] = 'Indien ingeschakeld kunnen leerlingen hun testen herbekijken nadat ze gesloten zijn.';
$string['analysisreport'] = 'Itemanalyse';
$string['attemptlimit'] = 'Limiet aantal pogingen';
$string['attemptlimit_help'] = 'Het maximale aantal pogingen die een leerling mag proberen met deze HotPot-activiteit.';
$string['attemptnumber'] = 'Pogingnummer';
$string['attempts'] = 'Pogingen';
$string['attemptscore'] = 'Pogingcijfer';
$string['attemptsunlimited'] = 'Onbeperkt aantal pogingen';
$string['average'] = 'Gemiddelde';
$string['averagescore'] = 'Gemiddeld cijfer';
$string['bodystyles'] = 'Body stijl';
$string['bodystylesbackground'] = 'Achtergrondkleur en afbeelding';
$string['bodystylescolor'] = 'Tekstkleur';
$string['bodystylesfont'] = 'Lettertypegrootte en -familie';
$string['bodystylesmargin'] = 'Linker- en rechtermarge';
$string['cacherecords'] = 'HotPot cache records';
$string['checks'] = 'controles';
$string['checksomeboxes'] = 'Zet vinkjes';
$string['clearcache'] = 'HotPot cache leegmaken';
$string['cleardetails'] = 'HotPot-details verwijderen';
$string['clearedcache'] = 'De HotPot cache is leeggemaakt.';
$string['cleareddetails'] = 'De HotPot-details zijn verwijderd.';
$string['clickreporting'] = 'Schakel klikrapportering in';
$string['clickreporting_help'] = 'Indien ingeschakeld wordt er bijgehouden wanneer er op een een hint-, een aanwijzing- of een controleerknop geklikt wordt. Hierdoor kan de leraar een gedetailleerd rapport krijgen van de status van de test bij elke klik. Anders wordt er slechts één gegeven bijgehouden per testpoging.';
$string['clicktrailreport'] = 'kliksporen';
$string['closed'] = 'Deze activiteit is gesloten.';
$string['clues'] = 'Ideeën';
$string['completed'] = 'Afgewerkt';
$string['configbodystyles'] = 'Standaard zullen de Moodle themastijlen de HotPot activiteitsstijlen overschrijven. Je kunt hier opgeven welke HotPot-stijlen voorrang moeten krijgen op de Moodle themastijlen.';
$string['configenablecache'] = 'Een cache van HotPot-testen bijhouden kan de snelheid van het tonen van testen aan leerlingen gevoelig verhogen.';
$string['configenablecron'] = 'Geef de uren in jouw tijdszone wanneer het HotPot cron-script mag lopen.';
$string['configenablemymoodle'] = 'Deze instelling controleert of HotPots op de startpagina getoond mogen worden of niet.';
$string['configenableobfuscate'] = 'Het verdoezelen van de javascript-code bij het invoegen van mediaspelers, maakt het moeilijker om de mediabestandsnaam te bepalen en wat het bestand bevat raden.';
$string['configenableswf'] = 'Sta inbedding van SWF-bestanden in HotPot activiteiten toe. Als dit is ingeschakeld, overschrijft deze instelling de instelling filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Configuratiebestand';
$string['configframeheight'] = 'Als er een test wordt weergegeven in een frame, dan is deze waarde de hoogte (in pixels) van het frame dat de Moodle navigatiebalk bevat.';
$string['configlocation'] = 'Configuratiebestandslocatie';
$string['configlockframe'] = 'Als deze instelling is ingeschakeld, dan zal het navigatieframe, als het gebruikt wordt, geblokkeerd worden, zodat het niet kan scrollen, niet herschaald kan worden en geen rand heeft.';
$string['configmaxeventlength'] = 'Als een HotPot zowel een open- als een sluitdatum heeft en het verschil tussen de twee groter is dan het aantal dagen hier gespecificeerd, dan worden twee agendapunten toegevoegd aan de cursuskalender. Voor een kortere duur of wanneer er slechts één datum is opgegeven, wordt er slechts één gebeurtenis aan de agenda toegevoegd. Als er geen tijd is opgegeven, dan wordt er geen agenda-item toegevoegd.';
$string['configstoredetails'] = 'Als deze instelling is ingeschakeld, dan zullen de ruwe XML-gegevens van pogingen tot HotPot tests opgeslagen worden in de hotpot_details tabel. Hiermee kunnen testpogingen opnieuw beoordeeld worden met wijzigingen in het HotPot test beoordelingssysteem. Let op, want het inschakelen van deze optie op een drukke site zal ertoe leiden dat de hotpot_details tabel zeer snel groeit.';
$string['confirmdeleteattempts'] = 'Wil je deze pogingen echt verwijderen?';
$string['confirmstop'] = 'Weet je zeker dat je deze pagina wil verlaten?';
$string['correct'] = 'juist';
$string['couldnotinsertsubmissionform'] = 'Kon formulier niet invoegen';
$string['delay1'] = 'Vertraging 1';
$string['delay1_help'] = 'De minimale vertraging tussen de eerste en de tweede poging.';
$string['delay1summary'] = 'Tijd tussen de eerste en de tweede poging.';
$string['delay2'] = 'Vertraging 2';
$string['delay2_help'] = 'De minimale vertraging na de tweede poging.';
$string['delay2summary'] = 'Tijd tussen latere pogingen';
$string['delay3'] = 'Vertraging 3';
$string['delay3afterok'] = 'Wacht tot de leerling op OK klikt';
$string['delay3disable'] = 'Ga niet automatisch verder.';
$string['delay3_help'] = 'De instelling bepaalt de vertraging tussen het beëindigen van de test en de terugkeer van de controle over het scherm naar Moodle.

** Gebruik specifieke tijd (in seconden) **:

controle zal worden teruggegeven aan Moodle na het opgegeven aantal seconden.

** Gebruik instellingen in bron / sjabloonbestand**
: controle zal worden teruggegeven aan Moodle na het aantal seconden opgegeven in het bronbestand of de sjabloonbestanden voor dit output formaat.

** Wacht tot leerling op OK klikt **
: controle zal worden teruggegeven aan Moodle nadat de leerling op de knop OK klikt op het voltooiingsbericht van de test.

** Niet automatisch verder **
: controle zal niet worden teruggestuurd naar Moodle nadat de test gedaan is. De leerling is vrij om weg te navigeren van de testpagina.

Let op, de testresultaten worden altijd onmiddellijk naar Moodle gezonden als de test beëindigd is of wanneer de pagina wordt verlaten, ongeacht deze instelling.';
$string['delay3specific'] = 'Gebruik specifieke tijd (in seconden)';
$string['delay3summary'] = 'Wachttijd aan het eind van de test';
$string['delay3template'] = 'Gebruik instellingen in bron- / sjabloonbestand';
$string['deleteallattempts'] = 'Verwijder alle pogingen';
$string['deleteattempts'] = 'Verwijder pogingen';
$string['detailsrecords'] = 'HotPot-detailrecords';
$string['d_index'] = 'Discriminatie-index';
$string['duration'] = 'Duur';
$string['enablecache'] = 'HotPot cache inschakelen';
$string['enablecron'] = 'HotPot cron inschakelen';
$string['enablemymoodle'] = 'Toon HotPots op Mijn Startpagina';
$string['enableobfuscate'] = 'Verdoezelen van media-playercode inschakelen';
$string['enableswf'] = 'Sta emedden van SWF-bestanden in HotPot-activiteiten toe.';
$string['entry_attempts'] = 'Pogingen';
$string['entrycm'] = 'Vorige activiteit';
$string['entrycmcourse'] = 'Vorige activiteit in deze cursus';
$string['entrycm_help'] = 'Deze instelling geeft aan een Moodle activiteit een minimumcijfer dat voor die activiteit die moet worden bereikt voordat deze HotPot activiteit kan worden geprobeerd.

De leraar kan een specifieke activiteit kiezen of een van de volgende algemene instellingen:

* Vorige activiteit in deze cursus
* Vorige activiteit in deze sectie
* Vorige HotPot in deze cursus
* Vorige HotPot in deze sectie';
$string['entrycmsection'] = 'Vorige activiteit in deze cursussectie';
$string['entrycompletionwarning'] = 'Voor je aan deze activiteit begint, moet je naar {$a} kijken.';
$string['entry_dates'] = 'Data';
$string['entrygrade'] = 'Vorig activiteitscijfer';
$string['entrygradewarning'] = 'Je kunt deze activiteit niet starten voor je cijfer groter is dan {$a->entrygrade}% is voor {$a->entryactivity}. Op dit ogenblik is je cijfer voor die activiteit  {$a->usergrade}%';
$string['entry_grading'] = 'Beoordeling';
$string['entryhotpotcourse'] = 'Vorige HotPot in deze cursus';
$string['entryhotpotsection'] = 'Vorige HotPot in deze cursussectie';
$string['entryoptions'] = 'Opties startpagina';
$string['entryoptions_help'] = 'Deze selectievakjes schakelen de weergave van items op de startpagina van de HotPot-pagina in en uit.

** Unit naam als titel **
: Indien aangevinkt, zal de unitnaam worden weergegeven als de titel van de startpagina.

** Beoordeling **
: Indien aangevinkt zal de HotPot beoordelingsinformatie op de startpagina worden weergegeven.

** Data **
: Indien aangevinkt worden de HotPot open- en sluitdata weergegeven op de startpagina.

** Pogingen **
: Indien aangevinkt wordt een tabel met de gegevens van eerdere pogingen van de gebruiker voor deze HotPot weergegeven op de startpagina. Pogingen die hervat kunnen worden hebben een knop hiervoor in de rechtse kolom.';
$string['entrypage'] = 'Toon startpagina';
$string['entrypagehdr'] = 'Startpagina';
$string['entrypage_help'] = 'Moeten leerlingen een startpagina zien bij het begin van de HotPot-activiteit? ** Ja **: de studenten zal worden getoond een vermelding pagina voordat u begint de HotPot. De inhoud van de beginpagina worden bepaald door de toetreding van het HotPot pagina opties. ** Nee **: de studenten zal niet worden getoond een item pagina, en zal de HotPot direct aan de slag. Een vermelding pagina wordt altijd getoond aan de leerkracht, om toegang te verlenen tot de rapporten en bewerken quizzen pagina';
$string['entrytext'] = 'Tekst startpagina';
$string['entry_title'] = 'Unit naam als titel';
$string['exit_areyouok'] = 'Hallo, ben je daar nog?';
$string['exit_attemptscore'] = 'Je cijfer voor die poging was {$a}';
$string['exitcm'] = 'Volgende activiteit';
$string['exitcmcourse'] = 'Volgende activiteit in deze cursus';
$string['exitcm_help'] = 'Deze instelling bepaalt welke Moodle-activiteit moet gebeuren nadat deze HotPot-activiteit is voltooid. Het optionele cijfer is het minimale cijfer voor deze HotPot-activiteit, nodig voordat de volgende activiteit wordt getoond.

De leraar kan een specifieke activiteit kiezen of één van volgende instellingen:

 * Volgende activiteit in deze cursus
* Volgende activiteit in deze sectie
* Volgende HotPot-activiteit in deze cursus
* Volgende HotPot-activiteit in deze sectie

Als andere verlaatpagina-opties zijn uitgeschakeld en de leerling heeft het gewenste cijfer voor deze HotPot-activiteit bereikt, dan zal de volgende activiteit onmiddellijk getoond worden. Anders krijgt de leerling een link naar de volgende activiteit.';
$string['exitcmsection'] = 'Volgende activiteit in deze cursussectie';
$string['exit_course'] = 'Cursus';
$string['exit_course_text'] = 'Keer terug naar de hoofdpagina van de cursus';
$string['exit_encouragement'] = 'Aanmoediging';
$string['exit_excellent'] = 'Schitterend!';
$string['exit_feedback'] = 'Verlaat pagina-feedback';
$string['exit_feedback_help'] = 'Deze opties schakelen feedbackberichten op de HotPot-verlaatpagina in of uit.

**Unit-naam als titel**
: indien geselecteerd wordt de unitnaam getoond als titel van de verlaatpagina.

**Aanmoediging**
: indien geselecteerd wordt er wat aanmoediging getoond op de verlaatpagina. De aanmoediging hangt af van het behaarde cijfer:
: **&gt; 90%**: Schitterend!
: **&gt; 60%**: Goed gedaan
: **&gt; 0%**: Goed geprobeerd
: **= 0%**: Gaat het?

** Unit-cijfer voor de poging**
: indien geselecteerd wordt het cijfer voor de poging van deze unit getoond op de verlaatpagina.

** Unit-cijfer**
: indien geselecteerd wordt het HotPot-cijfer getoond op de verlaatpagina.

Als de beoordelingsmethode voor een unit op hoogste cijfer staat, dan zal er een bericht getoond worden of de laatste poging beter of gelijk was dan de vorige poging.';
$string['exit_goodtry'] = 'Goede poging!';
$string['exitgrade'] = 'Volgend cijfer';
$string['exit_grades'] = 'Cijfers';
$string['exit_grades_text'] = 'Kijk naar je huidige cijfers voor deze cursus.';
$string['exithotpotcourse'] = 'Volgende HotPot in deze cursus';
$string['exit_hotpotgrade'] = 'Jouw cijfer voor deze activiteit is {$a}';
$string['exit_hotpotgrade_average'] = 'Je gemiddelde voor deze activiteit tot nu toe is {$a}';
$string['exit_hotpotgrade_highest'] = 'Je hoogste cijfer voor deze activiteit tot nu toe is {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Je hebt deze activiteit even goed gedaan als de vorige keer!';
$string['exit_hotpotgrade_highest_previous'] = 'Je vorige hoogste cijfer voor deze activiteit was {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'Je hebt voor deze activiteit nog geen hoger cijfer dan {$a}';
$string['exithotpotsection'] = 'Volgende HotPot in deze cursussectie';
$string['exit_index'] = 'Index';
$string['exit_index_text'] = 'Ga naar de activiteitenindex.';
$string['exit_links'] = 'Verlaat-links';
$string['exit_links_help'] = 'Volgende opties schakelen het tonen van bepaalde navigatielinks in en uit op een verlaatpagina van een HotPot-oefening.

**Probeer opnieuw**
: wanneer meerdere pogingen toegestaan zijn voor deze HotPot en de leerling heeft nog pogingen over, dan zal er een link getoond worden waarmee de leerling deze HotPot opnieuw kan proberen.

**Index**
: indien aangeduid zal er een link naar de HotPot indexpagina getoond worden.

**Cursus**
: indien aangeduid zal er een link naar de Moodle cursuspagina getoond worden.

**Cijfers**
: indien aangeduid zal er een link naar het Moodle puntenboek getoond worden.';
$string['exit_next'] = 'Volgende';
$string['exit_next_text'] = 'Probeer de volgende activiteit';
$string['exit_noscore'] = 'Je hebt deze activiteit met succes voltooid!';
$string['exitoptions'] = 'Opties verlaatpagina';
$string['exitpage'] = 'Toon verlaatpagina';
$string['exitpagehdr'] = 'Verlaatpagina';
$string['exitpage_help'] = 'Moet er een verlaatpagina getoond worden wanneer de HotPot-test voltooid is?

**Ja**
: de leerlingen krijgen een verlaatpagina te zien wanneer de Hotpot voltooid is. De inhoud van de verlaatpagina wordt bepaald door de instellingen voor de Hotpot verlaatpagina, feedback en links.

**Nee**
:de leerlingen krijgen geen verlaatpagina te zien. Zij zullen onmiddellijk naar de volgende oefening gaan of terugkeren naar de Moodle cursuspagina.';
$string['exit_retry'] = 'Probeer opnieuw';
$string['exit_retry_text'] = 'Probeer deze activiteit opnieuw.';
$string['exittext'] = 'Tekst voor de verlaatpagina';
$string['exit_welldone'] = 'Goed gedaan!';
$string['exit_whatnext_0'] = 'Wat zou je nu willen doen?';
$string['exit_whatnext_1'] = 'Kies je bestemming...';
$string['exit_whatnext_default'] = 'Kies één uit het volgende lijstje:';
$string['feedbackdiscuss'] = 'Start een discussie over deze test in een forum.';
$string['feedbackformmail'] = 'Feedbackformulier';
$string['feedbackmoodleforum'] = 'Moodleforum';
$string['feedbackmoodlemessaging'] = 'Moodleberichten';
$string['feedbacknone'] = 'Geen';
$string['feedbacksendmessage'] = 'Stuur een bericht naar je leraar.';
$string['feedbackwebpage'] = 'Web pagina';
$string['firstattempt'] = 'Eerste poging';
$string['forceplugins'] = 'Verplicht mediaplugins';
$string['forceplugins_help'] = 'Indien ingeschakeld zullen Moodle-compatibele mediaplayers bestanden zoals avi, mpeg, mp3, mov en wmv afspelen. Anders zal Moodle de instellingen van mediaspelers in de testen niet wijzigen.';
$string['frameheight'] = 'Fame-hoogte';
$string['giveup'] = 'Geef op';
$string['grademethod'] = 'Beoordelingsmethode';
$string['gradeweighting'] = 'Cijferwegin';
$string['gradeweighting_help'] = 'Cijfers voor deze HotPot-activiteit zullen geschaald worden naar dit cijfer in het Moodle puntenboek.';
$string['highestscore'] = 'Hoogste score';
$string['hints'] = 'hints';
$string['hotpot:addinstance'] = 'Voeg een nieuwe HotPot-activieteit toe.';
$string['hotpot:attempt'] = 'Probeer een HotPot-activiteit en stuur de resultaten in.';
$string['hotpot:deleteallattempts'] = 'Verwijder pogingen van gebruikers in een HotPot-activiteit.';
$string['hotpot:deletemyattempts'] = 'Verwijder je eigen pogingen in een HotPot-activiteit.';
$string['hotpot:ignoretimelimits'] = 'Negeer tijdslimieten in een HotPot-activiteit.';
$string['hotpot:manage'] = 'Wijzig de instellingen van een HotPot-activiteit.';
$string['hotpotname'] = 'HotPot activieteitsnaam';
$string['hotpot:preview'] = 'Bekijk een HotPot-activiteit';
$string['hotpot:reviewallattempts'] = 'Bekijk gebruikerspogingen van een HotPot-activiteit.';
$string['hotpot:reviewmyattempts'] = 'Bekijk je eigen pogingen van een HotPot-activiteit.';
$string['hotpot:view'] = 'Bekijk de startpagina van een HotPot-activiteit';
$string['ignored'] = 'genegeerd';
$string['inprogress'] = 'lopend';
$string['isgreaterthan'] = 'is groter dan';
$string['islessthan'] = 'is kleiner dan';
$string['lastaccess'] = 'Laatste toegang';
$string['lastattempt'] = 'Laatste poging';
$string['lockframe'] = 'Blokkeer frame';
$string['maxeventlength'] = 'Maximaal aantal dagen voor één kalendergebeurtenis';
$string['mediafilter_hotpot'] = 'HotPot mediafilter';
$string['mediafilter_moodle'] = 'Standaard Moodle mediafilters';
$string['migratingfiles'] = 'Hot Potatoes testbestanden migreren';
$string['missingsourcetype'] = 'Brontype ontbreekt voor HotPot record';
$string['modulename'] = 'HotPot';
$string['modulename_help'] = 'Met de HotPot-module kunnen leraren via Moodle interactief lesmateriaal aan hun leerlingen geven en rapporten bekijken van de antwoorden en resultaten van hun leerlingen.

Een enkele HotPot-activiteit bestaat uit een optionele startpagina, een enkele elektronische oefening een een optionele verlaatpagina. De elektronische oefening kan een statische webpagina of een interactieve webpagina zijn, waarop tekst of audio-visuele vragen staan en waarop de antwoorden bijgehouden worden. De elektronische oefening wordt op de computer van de leraar gemaakt met bepaalde software en dan naar Moodle geüpload.

Een HotPot-activiteit kan oefeningen verwerken die gemaakt zijn met volgende software:

* Hot Potatoes (versie 6)
* Qedoc
* Xerte
* iSpring
* elke HTML-editor';
$string['modulenameplural'] = 'HotPots';
$string['nameadd'] = 'Naam';
$string['nameedit'] = 'Naam';
$string['nameedit_help'] = 'De specifieke tekst die aan de leerlingen getoond wordt.';
$string['navigation'] = 'navigatie';
$string['navigation_embed'] = 'ingebedde webpagina';
$string['navigation_frame'] = 'Moodle-navigatieframe';
$string['navigation_give_up'] = 'Een enkele &quot;Geef op&quot; knop';
$string['navigation_moodle'] = 'Standaard Moodle navigatiebalken (bovenkant en zijkant)';
$string['navigation_none'] = 'Geen';
$string['navigation_original'] = 'Oorspronkelijke navigatiehulp';
$string['navigation_topbar'] = 'Moodle navigatie enkel bovenaan (geen zijbalken)';
$string['noactivity'] = 'Geen activiteit';
$string['nohotpots'] = 'Geen HotPots gevonden';
$string['nomoreattempts'] = 'Sorry, maar je mag deze activiteit niet meer proberen.';
$string['noresponses'] = 'Er is geen informatie gevonden over individuele vragen en antwoorden.';
$string['noreview'] = 'Sorry, maar je mag de details van deze testpoging niet zien.';
$string['noreviewafterclose'] = 'Sorry, deze test is gesloten. Je mag de details van deze testpoging niet meer zien.';
$string['noreviewbeforeclose'] = 'Sorry, je mag de details van deze poging niet zien  voor {$a}.';
$string['nosourcefilesettings'] = 'HotPot record ontbreekt in bronbestandsinformatie.';
$string['notavailable'] = 'Sorry, deze activiteit is nu niet beschikbaar voor jou.';
$string['outputformat'] = 'Output-opmaak';
$string['outputformat_best'] = 'Beste';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze (v6) van html';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'ANCT-Scan van HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'DropDown van HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'Findit (a) van HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'Findit (b) van HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JGloss van HP6 JCloze xml';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze (v6) van HP6 xml';
$string['outputformat_hp_6_jcloze_xml_v6_autoadvance'] = 'JCloze (v6) van HP6 xml (automatisch verder gaan)';
$string['outputformat_hp_6_jcross_html'] = 'JCross (v6) van html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross (v6) van xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch (v6) van html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch (flashcard) van xml';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMemori van xml';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch (v6) van xml';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch (v6+) van xml';
$string['outputformat_hp_6_jmix_html'] = 'JMix (v6) van html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix (v6) van xml';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix (v6+) van xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_deluxe'] = 'JMix (v6+ met voorvoegsel, achtervoegsel met afleiders) van xml';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix (v6+ met toets klikken) van xml';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz (v6) van html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz (v6) van xml';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz (v6) van xml (automatisch verder gaan)';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz (v6) van xml (Exam)';
$string['outputformat_hp_6_rhubarb_html'] = 'Rhubarb (v6) van html';
$string['outputformat_hp_6_rhubarb_xml'] = 'Rhubarb (v6) van xml';
$string['outputformat_hp_6_sequitur_html'] = 'Sequitur (v6) van html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'Sequitur (v6) van html, incrementele score';
$string['outputformat_hp_6_sequitur_xml'] = 'Sequitur (v6) van xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'Sequitur (v6) van xml, incrementele score';
$string['outputformat_html_ispring'] = 'iSpring html-bestand';
$string['outputformat_html_xerte'] = 'Xerte html-bestand';
$string['outputformat_html_xhtml'] = 'Standaard html-bestand';
$string['outputformat_qedoc'] = 'Qedoc-bestand';
$string['overviewreport'] = 'Overzicht';
$string['penalties'] = 'straffen';
$string['percent'] = 'Procent';
$string['pluginadministration'] = 'HotPot beheer';
$string['pluginname'] = 'HotPot-module';
$string['pressoktocontinue'] = 'Klik OK om verder te gaan of Annuleer om op de huidig pagina te blijven.';
$string['questionshort'] = 'Vr-{$a}';
$string['quizname_help'] = 'helptekst voor Test naam';
$string['quizzes'] = 'Testen';
$string['removegradeitem'] = 'Verwijder cijfer';
$string['responsesreport'] = 'Antwoorden';
$string['score'] = 'cijfer';
$string['scoresreport'] = 'Cijfers';
$string['selectattempts'] = 'Selecteer pogingen';
$string['showerrormessage'] = 'HotPot-fout: {$a}';
$string['sourcefile'] = 'Bestandsnaam bron';
$string['sourcefilenotfound'] = 'Bronbestand niet gevonden (of leeg): {$a}';
$string['status'] = 'Status';
$string['stopbutton'] = 'Toon stopknop';
$string['stopbutton_langpack'] = 'Van taalpakket';
$string['stopbutton_specific'] = 'Gebruik specifieke tekst';
$string['stoptext'] = 'Stopknoptekst';
$string['storedetails'] = 'Bewaar de ruwe XML-details van de HotPot testpogingen';
$string['studentfeedback'] = 'Feedback van leerling';
$string['submits'] = 'Inzendingen';
$string['subplugintype_hotpotattempt'] = 'Output-opmaak';
$string['subplugintype_hotpotattempt_plural'] = 'Output-opmaak';
$string['subplugintype_hotpotreport'] = 'Rapport';
$string['subplugintype_hotpotreport_plural'] = 'Rapporten';
$string['subplugintype_hotpotsource'] = 'Bronbestand';
$string['subplugintype_hotpotsource_plural'] = 'Bronbestanden';
$string['textsourcefile'] = 'Haal uit bronbestand';
$string['textsourcefilename'] = 'Gebruik bestandsnaam';
$string['textsourcefilepath'] = 'Gebruik bestandspad';
$string['textsourcequiz'] = 'Haal uit test';
$string['textsourcespecific'] = 'Specifieke test';
$string['timeclose'] = 'Beschikbaar tot';
$string['timedout'] = 'Gepauzeerd';
$string['timelimit'] = 'Tijdslimiet';
$string['timelimitexpired'] = 'De tijdslimiet voor deze poging is verlopen.';
$string['timelimitspecific'] = 'Gebruik specifieke tijd';
$string['timelimitsummary'] = 'Tijdslimiet voor één poging';
$string['timelimittemplate'] = 'Gebruik instellingen uit bron- /sjabloonbestand';
$string['timeopen'] = 'Beschikbaar van';
$string['timeopenclose'] = 'Open- en sluittijden';
$string['timeopenclose_help'] = 'Je kunt tijden specificeren wanneer de test kan gedaan worden. Voor de openingstijd en na de sluitingstijd zal te test niet beschikbaar zijn.';
$string['title'] = 'Titel';
$string['title_help'] = 'Deze instelling bepaalt de titel die getoond wordt op de webpagina.

**HotPot acitviteitsnaam**
: de naam van deze HotPot-activiteit zal getoond worden als de titel van de webpagina.

**Haal uit bronbestand**
: de titel, als die er is, in het bronbestand zal gebruikt worden als titel van de webpagina.

**Gebruik bronbestandsnaam**
: de bronbestandsnaam, uitgezonderd mapnamen, zal gebruikt worden als titel van de webpagina.

**Gebruik bronbestandspad**
: het bronbestandspad, mapnamen inbegrepen, zal gebruikt worden als titel van de webpagina.';
$string['unitname_help'] = 'helptekst voor unitnaam';
$string['updated'] = 'geüpdatet';
$string['usefilters'] = 'Gebruik filters';
$string['usefilters_help'] = 'Als deze instelling ingeschakeld is, dan zal de inhoud doorgegeven worden aan de Moodle-filters voor die naar de browser gestuurd wordt.';
$string['useglossary'] = 'Gebruik woordenlijst';
$string['usemediafilter'] = 'Gebruik mediafilter';
$string['utilitiesindex'] = 'HotPot index';
$string['viewreports'] = 'Bekijk rapporten van {$a} gebruiker(s)';
$string['views'] = 'Bekeken';
$string['weighting'] = 'weging';
$string['wrong'] = 'foutief';
$string['zeroduration'] = 'Geen tijdsduur';
$string['zeroscore'] = 'Geen cijfer';
