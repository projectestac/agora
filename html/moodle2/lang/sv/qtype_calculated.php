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
 * Strings for component 'qtype_calculated', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Lägg till objekt';
$string['addmoreanswerblanks'] = 'Lägg till ytterligare ett tomt svar';
$string['addmoreunitblanks'] = 'Tomma för ytterligare {$a} enheter';
$string['addsets'] = 'Lägg till datamängd';
$string['answerhdr'] = 'Svar';
$string['answerstoleranceparam'] = 'Tolerans parametrar för svar';
$string['answerwithtolerance'] = '{$a->answer} (± {$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Valfritt värde';
$string['atleastoneanswer'] = 'Du behöver lämna åtminstone ett svar';
$string['atleastonerealdataset'] = 'Det ska finnas minst en riktitg datamängd i frågetexten';
$string['atleastonewildcard'] = 'Det ska finnas åtminståne ett wild card i svarsformeln eller i frågetexten.';
$string['calcdistribution'] = 'Distribution';
$string['calclength'] = 'Decimaler';
$string['calcmax'] = 'Maximum';
$string['calcmin'] = 'Minimum';
$string['choosedatasetproperties'] = 'Välj wildcards egenskaper för datamängd';
$string['choosedatasetproperties_help'] = 'En datamängd är en uppsättning värden insatta i stället för ett wildcard. Du kan skapa en privat datamängd för en specifik fråga, eller en delad datamängd som kan användas för andra beräknade frågor inom kategorin.';
$string['correctanswerformula'] = 'Rätt svarsformel';
$string['correctanswershows'] = 'Det korrekta svaret visar';
$string['correctanswershowsformat'] = 'Format';
$string['correctfeedback'] = 'För varje rätt svar';
$string['dataitemdefined'] = 'med {$a} numeriska värden som redan definierats är tillgängliga';
$string['datasetrole'] = 'Wild cards <strong>{x ..}</strong> kommer att ersättas av ett numeriskt värde från datamängden';
$string['decimals'] = 'med {$a}';
$string['deleteitem'] = 'Ta bort objekt';
$string['deletelastitem'] = 'Ta bort sista objektet';
$string['distributionoption'] = 'Välj alternativ för distribution';
$string['editdatasets'] = 'Redigera  datamängder för wildcard';
$string['editdatasets_help'] = 'Wildcard värden kan skapas genom att ange en siffra i varje wild card fälte och sedan klicka på knappen "Lägg till". För att automatiskt generera 10 eller fler värden kan du välja hur många värden som krävs innan du klickar på knappen "Lägg till". En likformig fördelning av varje värde mellan gränserna är lika sannolik att genereras som en loguniform fördelning vilket innebär att värden mot den undre gränsen är mer sannolika.';
$string['existingcategory1'] = 'kommer att använda ett redan befintligt gemensamt dataset.';
$string['existingcategory2'] = 'en fil från en redan existerande uppsättning filer som också används av andra frågor i denna kategori';
$string['existingcategory3'] = 'en länk från en redan existerande uppsättning länkar som också används av andra frågor i denna kategori';
$string['forceregeneration'] = 'Tvinga förnyelse';
$string['forceregenerationall'] = 'Tvinga förnyelse av alla wildcards';
$string['forceregenerationshared'] = 'Tvinga förnyelse av alla wildcards som inte delas';
$string['functiontakesatleasttwo'] = 'Funktionen {$a} måste ha minst två argument';
$string['functiontakesnoargs'] = 'Funktionen {$a} tar inga argument';
$string['functiontakesonearg'] = 'Funktionen {$a} måste ha exakt ett argument';
$string['functiontakesoneortwoargs'] = 'Funktionen {$a} måste ha antingen ett eller två argument';
$string['functiontakestwoargs'] = 'Funktionen {$a} måste ha exakt två argument';
$string['generatevalue'] = 'Generera ett nytt värde mellan';
$string['getnextnow'] = 'Få nya \'Objekt att lägga till\' nu';
$string['hexanotallowed'] = 'Värdemängd <strong>{$a->name}</strong> i hexadecimalt format {$a->value} är inte tillåtet';
$string['illegalformulasyntax'] = 'Ogiltig formelsyntax börjar med \'{$a}\'';
$string['incorrectfeedback'] = 'För varje felaktigt svar';
$string['itemno'] = 'Punkt {$a}';
$string['itemscount'] = 'Objekt <br /> Räkna';
$string['itemtoadd'] = 'Objekt att lägga till';
$string['keptcategory1'] = 'kommer att använda samma redan befintliga gemensammma dataset som tidigare';
$string['keptcategory2'] = 'en fil från samma kategori återanvändbara fileruppsättningar som tidigare';
$string['keptcategory3'] = 'en länk från samma kategori återanvändbara länkar som tidigare';
$string['keptlocal1'] = 'kommer att använda samma redan befintliga privata dataset som tidigare';
$string['keptlocal2'] = 'en fil från samma fråga med privata uppsättningar filer som tidigare';
$string['keptlocal3'] = 'en länk från samma fråga med privata uppsättningar flänkar som tidigare';
$string['lengthoption'] = 'Välj alternativ för längd';
$string['loguniform'] = 'Loguniform';
$string['loguniformbit'] = 'Siffror från en loguniform fördelning';
$string['makecopynextpage'] = 'Nästa sida (ny fråga)';
$string['mandatoryhdr'] = 'Obligatoriska \'wild cards\' finns med i svar';
$string['max'] = 'Max';
$string['min'] = 'Min';
$string['minmax'] = 'Värdeområde';
$string['missingformula'] = 'Saknad formel';
$string['missingname'] = 'Saknat frågenamn';
$string['missingquestiontext'] = 'Saknad frågetest';
$string['mustbenumeric'] = 'Du måste ange ett (an)tal här';
$string['mustenteraformulaorstar'] = 'Du måste skriva in en formel eller \'*\' (ett wildcard)';
$string['mustnotbenumeric'] = 'Det här kan inte vara ett (an)tal';
$string['newcategory1'] = 'kommer att använda ett nytt gemensamt dataset.';
$string['newcategory2'] = 'en fil från en ny uppsättning filer som också kan användas av andra frågor i denna kategori';
$string['newcategory3'] = 'en länk från en ny uppsättning länkar som också kan användas av andra frågor i denna kategori';
$string['newlocal1'] = 'kommer att använda ett nytt privat dataset.';
$string['newlocal2'] = 'en fil från en ny uppsättning filer som bara kommer att användas av denna fråga';
$string['newlocal3'] = 'en länk från en ny uppsättning länkar som endast kommer att användas i denna fråga';
$string['newsetwildcardvalues'] = 'ny uppsättning(ar) av wildcard värden';
$string['nextitemtoadd'] = 'Nästa \'komponent att lägga till\'';
$string['nextpage'] = 'Nästa sida';
$string['nocoherencequestionsdatyasetcategory'] = 'För fråge ID {$a->qid}, är kategori-ID {$a->qcat} inte identisk med det delade wildcard {$a->name} i kategori id {$a->sharedcat}. Redigera frågan.';
$string['nocommaallowed'] = 'Den kan inte användas, använd . såsom i 0,013 eller 1.3E-2';
$string['nodataset'] = 'ingenting - detta är inte ett wild card';
$string['nosharedwildcard'] = 'Det finns inget gemensamt \'wild card\' i den här kategorin';
$string['notvalidnumber'] = 'Wildcard värdet är inte ett giltigt nummer';
$string['oneanswertrueansweroutsidelimits'] = 'Åtminstone ett korrekt svar utanför värdegränsen. <br /> Ändra svarstoleransen i  inställningarna som finns  i avancerade parametrar';
$string['param'] = 'Parameter <strong>{{$a}}</strong>';
$string['partiallycorrectfeedback'] = 'För alla delvis korrekta svar';
$string['pluginname'] = 'Beräknat';
$string['pluginnameadding'] = 'Lägga till en beräknad fråga';
$string['pluginnameediting'] = 'Redigera en beräknat fråga';
$string['pluginname_help'] = 'Beräknade frågor möjliggör att enskilda numeriska frågor kan skapas med hjälp av wildcard i klammerparenteser som substituerar individuella värden när testet tas. Till exempel frågan "Vad är arean av en rektangel med längden {L} och bredd {W}?" Rätt svarsformel skulle vara "{L} * {w}" (där * betecknar multiplikation).';
$string['pluginnamesummary'] = 'Beräknade frågor är som numeriska frågor,  med skillnaden att siffror som används väljs slumpmässigt från en datamängd när testet tas.';
$string['possiblehdr'] = 'Möjliga \'wild cards\' finns endast med i frågetexten';
$string['questiondatasets'] = 'Frågans datamängd';
$string['questiondatasets_help'] = 'Frågans datamängd för wildcards som kommer att användas i varje individuell fråga';
$string['questionstoredname'] = 'Frågans lagringsnamn';
$string['replacewithrandom'] = 'Ersätt med ett slumpmässigt värde';
$string['reuseifpossible'] = 'Återanvänd tidigare värde om det är tillgängligt';
$string['setno'] = 'Datamängd {$a}';
$string['setwildcardvalues'] = 'Uppsättning(ar) av wildcard(s) värden';
$string['sharedwildcard'] = 'Delat wildcard {<strong>{$a}</strong>}';
$string['sharedwildcardname'] = 'Delat wildcard';
$string['sharedwildcards'] = 'Delade wildcards';
$string['showitems'] = 'Visa';
$string['significantfigures'] = 'Med {$a}';
$string['significantfiguresformat'] = 'signifikanta siffror';
$string['synchronize'] = 'Synkronisera data från delade datamängder med andra frågor i ett test';
$string['synchronizeno'] = 'Synkronisera inte';
$string['synchronizeyes'] = 'Synkronisera';
$string['synchronizeyesdisplay'] = 'Synkronisera och visa de delade datamängdernas namn som prefix på frågans namn';
$string['tolerance'] = 'Tolerans  &plusmn;';
$string['trueanswerinsidelimits'] = 'Rätt svar: {$a->correct} innom gränserna för verkligt värde {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">FEL Rätt svar: {$a->correct} är utanför gränserna för verkligt värde {$a->true}</span>';
$string['uniform'] = 'Uniform';
$string['uniformbit'] = 'decimaler, från en jämn fördelning';
$string['unsupportedformulafunction'] = 'Funktionen {$a} stöds inte';
$string['updatecategory'] = 'Uppdatera kategorin';
$string['updatedatasetparam'] = 'Uppdatera parametrarna för datamängden';
$string['updatetolerancesparam'] = 'Uppdatera parametrar för svarstoleransen';
$string['updatewildcardvalues'] = 'Uppdatera värdena för jokertecken';
$string['useadvance'] = 'Använd knappen avancerat för att se felen';
$string['usedinquestion'] = 'Använd i fråga';
$string['wildcard'] = 'Jokertecken {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Parametrar för jokertecken som används för att generera värdena';
$string['wildcardrole'] = 'Jokertecknen <strong>{x..}</strong> kommer ersättas med ett numeriskt värde från den genererade listan.';
$string['wildcards'] = 'Jokertecken {a}...{ö}';
$string['wildcardvalues'] = 'Värden för jokertecken';
$string['wildcardvaluesgenerated'] = 'Värden genererade för jokertecken';
$string['youmustaddatleastoneitem'] = 'Du måste lägga till minst ett objekt till datasetet innan du kan spara den här frågan.';
$string['youmustaddatleastonevalue'] = 'Du måste lägga till minst en uppsättning av jokertecken värden innan du kan spara den här frågan.';
$string['youmustenteramultiplierhere'] = 'Du måste ange en multiplikator här';
$string['zerosignificantfiguresnotallowed'] = 'Rätt svar kan inte ha noll signifikanta siffror!';
