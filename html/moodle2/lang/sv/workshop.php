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
 * Strings for component 'workshop', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Åtkomst kontrol';
$string['aggregategrades'] = 'Ny betygsberäkning';
$string['aggregation'] = 'Betygsaggregering';
$string['allocate'] = 'Tilldela inskickningar';
$string['allocatedetails'] = 'förväntat: {$a->expected}<br />inskickat: {$a->submitted}<br />att fördela: {$a->allocate}';
$string['allocation'] = 'Fördelning av inlämningar';
$string['allocationconfigured'] = 'Fördelning konfigurerad';
$string['allocationdone'] = 'Fördelning utförd';
$string['allocationerror'] = 'Fel vid fördelning';
$string['allsubmissions'] = 'Alla inskickade uppgifter ({$a})';
$string['alreadygraded'] = 'Redan bedömd/betygssatt';
$string['areaconclusion'] = 'Slutsatstext';
$string['areainstructauthors'] = 'Instruktioner för inskickning av uppgifter';
$string['areainstructreviewers'] = 'Instruktioner för bedömning/värdering';
$string['areasubmissionattachment'] = 'Bilagor till inlämningar';
$string['areasubmissioncontent'] = 'Inlämningstexter';
$string['assess'] = 'Bedöm/värdera/betygssätt';
$string['assessedexample'] = 'Inskickad exempeluppgift som är bedömd/värderad/betygssatt';
$string['assessedsubmission'] = 'Inskickad uppgift som är bedömd/värderad/betygssatt';
$string['assessingexample'] = 'Bedömer/värderar/betygssätter inskickad exempeluppgift';
$string['assessingsubmission'] = 'Bedömer/värderar/betygssätter inskickad uppgift';
$string['assessment'] = 'Bedömning';
$string['assessmentby'] = 'av <a href="{$a->url}">{$a->name}</a>';
$string['assessmentbyfullname'] = 'Bedömning av {$a}';
$string['assessmentbyyourself'] = 'Bedömning av dig själv';
$string['assessmentdeleted'] = 'Bedömning avallokerad';
$string['assessmentend'] = 'Sluttid för bedömningar/värderingar/betygssättningar';
$string['assessmentendbeforestart'] = 'Sista dag för bedömning kan inte vara innan datum för att öppna för bedömning';
$string['assessmentenddatetime'] = 'Sluttid för bedömningar/värderingar/betygssättningar:
{$a->daydatetime} ({$a->distanceday})';
$string['assessmentendevent'] = '{$a} (tidsfrist för bedömning)';
$string['assessmentform'] = 'Formulär för bedömningar/värderingar/betygssättningar';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Bedömning/värdering/betygssättning</a> of <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Referens för bedömning/värdering/betygssättning';
$string['assessmentreferenceconflict'] = 'Det är inte möjligt att bedöma en exempelinlämning som du gav en referensbedömning.';
$string['assessmentreferenceneeded'] = 'Du måste bedöma denna exempelinlämning för att ge en referensbedömning. Klicka på knappen "Fortsätt" för att bedöma inlämningen.';
$string['assessmentsettings'] = 'Inställningar för bedömning/värdering/betygssättning';
$string['assessmentstart'] = 'Öppen för bedömningar/värderingar/betygssättningar från';
$string['assessmentstartdatetime'] = 'Öppen för bedömningar/värderingar/betygssättningar från  {$a->daydatetime} ({$a->distanceday})';
$string['assessmentstartevent'] = '{$a} (öppnas för bedömning)';
$string['assessmentweight'] = 'Bedömnings viktning';
$string['assignedassessments'] = 'Tilldelade inlämningar att bedöma';
$string['assignedassessmentsnone'] = 'Du har ingen tilldelad inlämning att bedöma';
$string['backtoeditform'] = 'Tillbaka till formuläret för att redigera';
$string['byfullname'] = 'av <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Beräkna bedömningsbetyg';
$string['calculategradinggradesdetails'] = 'förväntat:  {$a->expected}<br />calculated: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Beräkna betyg för inlämningar';
$string['calculatesubmissiongradesdetails'] = 'förväntat:  {$a->expected}<br />calculated: {$a->calculated}';
$string['chooseuser'] = 'Välj användare...';
$string['clearaggregatedgrades'] = 'Ta bort alla aggregerade betyg';
$string['clearaggregatedgradesconfirm'] = 'Är du säker på att du vill ta bort de beräknade betygen för inlämningar och betygen bedömningar?';
$string['clearaggregatedgrades_help'] = 'De aggregerade betygen för inlämningar och betyg för bedömningar återställs. Du kan omberäkna dessa betyg från början i Betygsfas.';
$string['clearassessments'] = 'Töm bedömningar/värderingar/betyssättningar';
$string['clearassessmentsconfirm'] = 'Är du säker på att du vill ta bort alla betyg/bedömningar? Du kommer inte att kunna få tillbaka informationen på egen hand, alla granskare måste på nytt bedöma sina tilldelade inlämningsuppgifter.';
$string['clearassessments_help'] = 'De beräknade betygen för inlämningar samt betyg för bedömningar kommer att tas bort. Informationen om hur bedömningsformuläret ska fyllas i kommer behållas, men alla granskare måste öppna bedömningsformuläret på nytt och spara om det för att få de givna betygen att beräknas igen.';
$string['conclusion'] = 'Slutsats';
$string['conclusion_help'] = 'Slutsats visas för deltagare på slutet av aktiviteten.';
$string['configexamplesmode'] = 'Förvalt värde för exempelbedömningar i workshops';
$string['configgrade'] = 'Förvalt maximalt betyg för inlämningar i workshops';
$string['configgradedecimals'] = 'Förvalt antal siffror som ska visas efter decimalkommat vid visning av betyg.';
$string['configgradinggrade'] = 'Förvalt maximalt betyg för bedömning i workshop';
$string['configmaxbytes'] = 'Förvald maximal filstorlek för inlämningar i alla workshops på webbplatsen (med förbehåll för kursbegränsningar och andra lokala inställningar)';
$string['configstrategy'] = 'Förvald betygsstrategi för workshops';
$string['createsubmission'] = 'Börja förbereda din inlämning';
$string['daysago'] = 'för {$a} dagar sedan ';
$string['daysleft'] = '{$a} dagar kvar';
$string['daystoday'] = 'idag';
$string['daystomorrow'] = 'imorgon';
$string['daysyesterday'] = 'igår';
$string['deadlinesignored'] = 'Tidsbegränsningar gäller inte dig';
$string['editassessmentform'] = 'Redigera formulär för bedömning/värdering/betygssättning';
$string['editassessmentformstrategy'] = 'Redigera bedömningsformulär ({$a})';
$string['editingassessmentform'] = 'Redigerar formulär för bedömning/värdering/betygssättning';
$string['editingsubmission'] = 'Redigerar inskickad uppgiftslösning';
$string['editsubmission'] = 'Redigera inskickad uppgiftslösning';
$string['err_multiplesubmissions'] = 'Medan du redigerade detta formulär har en annan version av inlämningen sparats. Multipla inlämningar per användare är inte tillåtna.';
$string['err_removegrademappings'] = 'Kunde inte ta bort oanvända betygsmappningar';
$string['evaluategradeswait'] = 'Vänta tills bedömningarna är utvärderade och betygen beräknade.';
$string['evaluation'] = 'Betygsutvärdering';
$string['evaluationmethod'] = 'Betygsutvärderingsmetod';
$string['evaluationmethod_help'] = 'Betygsutvärderingsmetoden avgör hur betyg för bedömning beräknas. Du kan låta den beräkna om betygen upprepade gånger med olika inställningar om du inte är nöjd med resultatet.';
$string['evaluationsettings'] = 'Inställningar för betygsutvärdering';
$string['example'] = 'Exempelinlämning';
$string['exampleadd'] = 'Lägg till exempelinlämning';
$string['exampleassess'] = 'Bedöm exempelinlämning';
$string['exampleassessments'] = 'Exempelinlämningar att bedöma';
$string['exampleassesstask'] = 'Bedöm exempel';
$string['exampleassesstaskdetails'] = 'förväntad: {$a->expected}<br />assessed: {$a->assessed}';
$string['examplecomparing'] = 'Jämför bedömningar av exempelinlämningar';
$string['exampledelete'] = 'Ta bort exempel';
$string['exampledeleteconfirm'] = 'Är du säker på att du vill ta bort följande exempelinlämning? Klicka på knappen "Fortsätt" för att ta bort inlämningen.';
$string['exampleedit'] = 'Redigera exempel';
$string['exampleediting'] = 'Redigerar exempel';
$string['exampleneedassessed'] = 'Du måste först bedöma alla exempelinlämningar';
$string['exampleneedsubmission'] = 'Du måste först lämna in ditt arbete och bedöma alla exempelinlämningar';
$string['examplesbeforeassessment'] = 'Exempel är tillgängliga efter egen inlämning och måste bedömas innan inbördes utvärdering';
$string['examplesbeforesubmission'] = 'Exempel måste bedömas innan egen inlämning';
$string['examplesmode'] = 'Inställning för exempelbedömning';
$string['examplesubmissions'] = 'Prov på inskickade uppgiftslösningar';
$string['examplesvoluntary'] = 'Bedömning av exempelinlämning är frivillig';
$string['feedbackauthor'] = 'Återkoppling för författaren';
$string['feedbackby'] = 'Återkoppling från {$a}';
$string['feedbackreviewer'] = 'Återkoppling för recensenten/utvärderaren';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Betyg satta';
$string['gradecalculated'] = 'Beräknade betyg för inlämning';
$string['gradedecimals'] = 'Antal decimaler i betyg/omdöme';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Betyg /omdöme: {$a->received} av {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (bedömning/värdering/betygssättning)';
$string['gradeitemsubmission'] = '{$a->workshopname} (inskickad uppgiftslösning)';
$string['gradeover'] = 'Åsidosätt betyg för inlämning';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Betygsrapport för workshop';
$string['gradinggrade'] = 'Betyg/omdöme för betygssättning/omdöme';
$string['gradinggradecalculated'] = 'Beräknade betyg för bedömning';
$string['gradinggrade_help'] = 'Denna inställning anger maximalt betyg som kan uppnås för bedömning av inlämningar.';
$string['gradinggradeof'] = 'Betyg för bedömning (av {$a})';
$string['gradinggradeover'] = 'Åsidosätt betyg för bedömning';
$string['gradingsettings'] = 'Betygsinställningar';
$string['groupnoallowed'] = 'Du har inte tillåtelse att bedöma någon grupp i denna workshop';
$string['iamsure'] = 'Ja, jag är säker';
$string['info'] = 'Info';
$string['instructauthors'] = 'Instruktioner för inskickning av uppgiftslösningar';
$string['instructreviewers'] = 'Instruktioner för bedömning/värdering/betygssättning';
$string['introduction'] = 'Beskrivning';
$string['latesubmissions'] = 'Sent inskickade uppgiftslösningar';
$string['latesubmissionsallowed'] = 'Sent inskickade uppgiftslösningar accepteras';
$string['latesubmissions_desc'] = 'Tillåt inskickning av uppgiftslösningar efter sluttiden.';
$string['latesubmissions_help'] = 'Om aktiverat kan en workshopdeltagare lämna in sitt arbete efter tidsfristen för inlämning eller under bedömningsfasen. För sent inlämnade arbeten kan däremot inte redigeras.';
$string['maxbytes'] = 'Maximal filstorlek';
$string['miscellaneoussettings'] = 'Diverse inställningar';
$string['modulename'] = 'Workshop';
$string['modulename_help'] = 'Aktiviteten Workshop möjliggör insamling, granskning och medarbetarbedömning av elevernas arbeten.

Eleverna kan lämna digitalt innehåll (filer), som dokument från ordbehandlingsprogram eller kalkylark och kan även skriva text direkt i ett fält med hjälp av textredigeraren.

Inlämningarna bedöms med hjälp av ett formulär där läraren definierat ett flertal bedömningskriterier. Processen för bedömning av inlämnade uppgifter samt att förstå bedömningsformuläret kan förövas med exempelinlämningar och exempelbedömningar som läraren skapat. Eleverna ges möjlighet att bedöma en eller flera av deras tilldelade inlämningar. Inlämnade uppgifter och gjorda bedömningar av arbeten kan vara anonyma vid behov.

Eleverna får två betyg i en workshop - ett betyg för sin inlämnade uppgift och ett betyg för sina medarbetarbedömningar. Båda betygen sparas i betygsboken.';
$string['modulenameplural'] = 'Workshops';
$string['mysubmission'] = 'Min inskickade uppgiftslösning';
$string['nattachments'] = 'Maximalt antal bilagor till inlämningsuppgift';
$string['noexamples'] = 'Det finns inga exempel i denna workshop än';
$string['noexamplesformready'] = 'Du måste definiera bedömningsformuläret innan du ger exempel på inlämningsuppgift';
$string['nogradeyet'] = 'Inga betyg än';
$string['nosubmissionfound'] = 'Ingen inlämnad uppgift hittades för denna användare';
$string['nosubmissions'] = 'Inga inlämnade uppgifter finns än i denna workshop';
$string['notassessed'] = 'Ännu inte bedömd';
$string['nothingtoreview'] = 'Inget att granska';
$string['notoverridden'] = 'Ej överskriden';
$string['noworkshops'] = 'Det finns inga Workshops i den här kursen';
$string['noyoursubmission'] = 'Du har inte skickat in Ditt arbete ännu';
$string['nullgrade'] = '-';
$string['page-mod-workshop-x'] = 'Vilken sida som helst i workshopmodulen';
$string['participant'] = 'Deltagare';
$string['participantrevierof'] = 'Deltagaren är utvärderare av ';
$string['participantreviewedby'] = 'Deltagaren utvärderas av ';
$string['phaseassessment'] = 'Bedömningsfas';
$string['phaseclosed'] = 'Stängd';
$string['phaseevaluation'] = 'Betygsfas';
$string['phasesetup'] = 'Förberedelsefas';
$string['phasesoverlap'] = 'Inlämningsfasen och bedömningsfasen kan inte överlappa varandra';
$string['phasesubmission'] = 'Inlämningsfas';
$string['pluginadministration'] = 'Administration av workshop';
$string['pluginname'] = 'Workshop';
$string['prepareexamples'] = 'Förbered exempelinlämningar';
$string['previewassessmentform'] = 'Förhandsgranska';
$string['publishedsubmissions'] = 'Inskickade uppgiftslösningar som har offentliggjorts';
$string['publishsubmission'] = 'Publicera inlämning';
$string['publishsubmission_help'] = 'Publicerade inlämningar är tillgängliga för andra när workshopen är stängd.';
$string['reassess'] = 'Bedöm/värdera/betygssätt igen';
$string['receivedgrades'] = 'Betyg mottagna';
$string['recentassessments'] = 'Workshop bedömningar:';
$string['recentsubmissions'] = 'Workshop inlämningar';
$string['saveandclose'] = 'Spara och stäng';
$string['saveandcontinue'] = 'Spara och fortsätt att redigera';
$string['saveandpreview'] = 'Spara och förhandsgranska';
$string['selfassessmentdisabled'] = 'Självbedömning avaktiverad';
$string['showingperpage'] = 'Visar {$a} objekt per sida';
$string['showingperpagechange'] = 'Ändra ...';
$string['someuserswosubmission'] = 'Det finns minst en deltagare som ännu inte har lämnat in sitt arbete';
$string['sortasc'] = 'Stigande sortering';
$string['sortdesc'] = 'Fallande sortering';
$string['strategy'] = 'Betygsstrategi';
$string['strategyhaschanged'] = 'Workshopens betygsstrategi har ändrats sedan formuläret öppnades för redigering.';
$string['strategy_help'] = 'Betygsstrategin avgör vilket bedömningsformulär som ska användas och metoden för betygssättning av inlämnade uppgifter. Det finns 4 möjligheter:

* Ackumulerad betygssättning - Kommentarer och betyg ges om specificerade aspekter
* Kommentarer - Kommentarer ges om specificerade aspekter, men inget betyg kan ges
* Antal fel - Kommentarer och ja / nej bedömning ges beträffande specificerade påståenden
* Rubrik - En nivåbedömning ges beträffande angivna kriterier';
$string['submission'] = 'Inskickad  uppgiftslösning';
$string['submissionattachment'] = 'Bilaga';
$string['submissionby'] = 'Inskickad uppgiftslösning av {$a}';
$string['submissioncontent'] = 'Innehåll för inlämnad uppgift';
$string['submissionend'] = 'Sluttid för inskickning av uppgiftslösningar';
$string['submissionendbeforestart'] = 'Sluttid för inlämning kan inte anges som före tid för början av inlämning';
$string['submissionenddatetime'] = 'Sluttid för inskickning av uppgiftslösningar: {$a->daydatetime} ({$a->distanceday})';
$string['submissionendevent'] = '{$a} (sluttid för inlämning)';
$string['submissionendswitch'] = 'Växla till nästa fas efter att sluttid för inlämning inträffat';
$string['submissionendswitch_help'] = 'Om sluttid för inlämning är angiven och dess kryssruta är markerad, kommer workshopen automatiskt att växla till bedömningsfasen när sluttiden inträffar.';
$string['submissiongrade'] = 'Bedömning/värdering/betygssättning av inskickat bidrag';
$string['submissiongrade_help'] = 'Denna inställning anger maximalt betyg som kan erhållas för inlämnat arbete.';
$string['submissiongradeof'] = 'Betyg för inlämning (från {$a})';
$string['submissionsettings'] = 'Inlämningsinställningar';
$string['submissionstart'] = 'Öppen för inskickning av uppgiftslösningar';
$string['submissionstartdatetime'] = 'Öppen för inskickning av uppgiftslösningar från {$a->daydatetime} ({$a->distanceday})';
$string['submissionstartevent'] = '{$a} (öppnas för inlämningar)';
$string['submissiontitle'] = 'Titel';
$string['subplugintype_workshopallocation'] = 'Fördelningsmetod för inlämningar';
$string['subplugintype_workshopallocation_plural'] = 'Fördelningsmetoder för inlämningar';
$string['subplugintype_workshopeval'] = 'Betygssättningsmetod';
$string['subplugintype_workshopeval_plural'] = 'Betygssättningsmetoder';
$string['subplugintype_workshopform'] = 'Betygsstrategi';
$string['subplugintype_workshopform_plural'] = 'Betygsstrategier';
$string['switchingphase'] = 'Byter fas';
$string['switchphase'] = 'Byt fas';
$string['switchphase10info'] = 'Du håller på att byta fas för workshopen till <strong>Förberedelsefas</strong>. I denna fas kan användare inte ändra sina inlämningar eller deras bedömningar. Lärare kan använda denna fas för att ändra inställningar för workshopen, ändra betygsstrategi eller justera bedömningsformerna.';
$string['switchphase20info'] = 'Du håller på att byta fas för workshopen till <strong>Inlämningsfas</strong>. Eleverna kan lämna in sitt arbete under denna fas (inom givna datum, om dessa är inställda). Lärare kan fördela bidrag för kollegial granskning.';
$string['switchphase30auto'] = 'Workshopen kommer automatiskt in i bedömningsfasen efter {$a->daydatetime} ({$a->distanceday})';
$string['switchphase30info'] = 'Du håller på att byta fas för workshopen till <strong>Bedömningsfas</strong>. I denna fas kan granskare bedöma de inlämningar som de tilldelats (inom givna datum, om dessa är inställda).';
$string['switchphase40info'] = 'Du håller på att byta fas för workshopen till <strong>Betygsfas</strong>. I denna fas kan användare inte ändra sina inlämningar eller sina gjorda bedömningar. Lärare kan använda verktygen för betygsutvärdering för att beräkna slutbetyg och ge återkoppling för granskare.';
$string['switchphase50info'] = 'Du håller på att stänga workshopen. Detta innebär att de beräknade betygen kommer finnas i Betygsboken. Eleverna kan se sina inlämningar och sina gjorda bedömningar.';
$string['taskassesspeers'] = 'Bedöm kollegor';
$string['taskassesspeersdetails'] = 'summa: {$a->total}<br />pending: {$a->todo}';
$string['taskassessself'] = 'Bedöm/värdera/betygssätt dig själv';
$string['taskconclusion'] = 'Ge en slutsats för aktiviteten';
$string['taskinstructauthors'] = 'Ge anvisningar för inlämning';
$string['taskinstructreviewers'] = 'Ge anvisningar för bedömning';
$string['taskintro'] = 'Ställ in beskrivningen för workshopen';
$string['tasksubmit'] = 'Lämna in ditt arbete';
$string['toolbox'] = 'Verktygslåda för workshop';
$string['undersetup'] = 'Workshopen håller på att skapas. Vänta tills den övergår till nästa fas';
$string['useexamples'] = 'Använd exempel';
$string['useexamples_desc'] = 'Exempelinlämningar finns för att träna på bedömning';
$string['useexamples_help'] = 'Om det är aktiverat kan användare försöka bedöma en eller flera exempelinlämningar och jämföra sin bedömning med en referensbedömning. Betyget räknas inte i betyget för bedömning.';
$string['usepeerassessment'] = 'Använd kollegial bedömning';
$string['usepeerassessment_desc'] = 'Eleverna kan bedöma andras arbete';
$string['usepeerassessment_help'] = 'Om det är aktiverat kan en användare tilldelas inlämningar från andra användare att bedöma, och får betyg för sina gjorda bedömningar tillsammans med betyget för sin inlämnade uppgift.';
$string['userdatecreated'] = 'inlämnat den <span>{$a}</span>';
$string['userdatemodified'] = 'modifierat den <span>{$a}</span>';
$string['userplan'] = 'Workshop planerare';
$string['userplan_help'] = 'Workshop planeraren visar alla faser av aktiviteten och listar uppgifterna för varje fas. Den innevarande fasen är markerad och genomföra uppgifter markeras som förbockade.';
$string['useselfassessment'] = 'Använd självbedömning';
$string['useselfassessment_desc'] = 'Eleverna kan bedöma sitt eget arbete';
$string['useselfassessment_help'] = 'Om det är aktiverat kan en användare tilldelas sin egen inlämning för bedömning och kommer att få ett betyg för bedömning utöver ett betyg för inlämnande.';
$string['weightinfo'] = 'Viktning: {$a}';
$string['withoutsubmission'] = 'Granskare utan egen inlämnad uppgift';
$string['workshop:addinstance'] = 'Lägg till en ny workshop';
$string['workshop:allocate'] = 'Tilldela inlämningar för granskning';
$string['workshop:editdimensions'] = 'Redigera bedömningsformulär';
$string['workshopfeatures'] = 'Workshop funktioner';
$string['workshop:ignoredeadlines'] = 'Ignorera tidsbegränsningar';
$string['workshop:manageexamples'] = 'Hantera exempel inlämningar';
$string['workshopname'] = 'Namn för Workshop';
$string['workshop:overridegrades'] = 'Åsidosätt beräknade betyg';
$string['workshop:peerassess'] = 'Kollegiebedömning';
$string['workshop:publishsubmissions'] = 'Publicera inlämningar';
$string['workshop:submit'] = 'Skicka';
$string['workshop:switchphase'] = 'Byt fas';
$string['workshop:view'] = 'Visa Workshop';
$string['workshop:viewallassessments'] = 'Visa alla bedömningar';
$string['workshop:viewallsubmissions'] = 'Visa alla inlämningar';
$string['workshop:viewauthornames'] = 'Visa författarnamn';
$string['workshop:viewauthorpublished'] = 'Visa författare för publicerade inlämningar';
$string['workshop:viewpublishedsubmissions'] = 'Visa publicerade inlämningar';
$string['workshop:viewreviewernames'] = 'Visa granskares namn';
$string['yourassessment'] = 'Din bedömning';
$string['yourgrades'] = 'Dina betyg';
$string['yoursubmission'] = 'Din inlämning';
