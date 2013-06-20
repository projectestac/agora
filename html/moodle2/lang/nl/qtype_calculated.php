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
 * Strings for component 'qtype_calculated', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Item toevoegen';
$string['addmoreanswerblanks'] = 'Nog een lijn toevoegen';
$string['addmoreunitblanks'] = 'Extra lijnen voor {$a} units';
$string['addsets'] = 'Voeg sets toe';
$string['answerhdr'] = 'Antwoord';
$string['answerstoleranceparam'] = 'Tolerantieparameters voor antwoorden';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'Gelijk welke waarde';
$string['atleastoneanswer'] = 'Je moet minstens één antwoord voorzien';
$string['atleastonerealdataset'] = 'Er moet minstens één echte dataset in de vraagtekst zitten';
$string['atleastonewildcard'] = 'Er moet minstens één joker in de antwoordformule  of in de vraagtekst zitten';
$string['calcdistribution'] = 'Distributie';
$string['calclength'] = 'Aantal decimalen';
$string['calcmax'] = 'Maximum';
$string['calcmin'] = 'Minimum';
$string['choosedatasetproperties'] = 'Kies eigenschappen voor de dataset met jokers';
$string['choosedatasetproperties_help'] = 'Een dataset is een set met waarden in ingevoerd worden in de plaats van een joker. Je kunt een privé -dataset maken voor een specifieke vraag of je kunt een gedeelde dataset maken die gebruikt kan worden voor andere berekende vragen binnen een categorie.';
$string['correctanswerformula'] = 'Juiste antwoordformule';
$string['correctanswershows'] = 'Juist antwoord toont';
$string['correctanswershowsformat'] = 'Opmaak';
$string['correctfeedback'] = 'Voor elk juist antwoord';
$string['dataitemdefined'] = 'met {$a} numerieke waarden al gedefinieerd is beschikbaar';
$string['datasetrole'] = 'De jokers <strong>{x...}</strong> zullen vervangen worden door een numerieke waarde van hun dataset';
$string['decimals'] = 'met {$a}';
$string['deleteitem'] = 'Verwijder item';
$string['deletelastitem'] = 'Verwijder laatste item';
$string['distributionoption'] = 'Kies een distributieoptie';
$string['editdatasets'] = 'Bewerk de datasets voor de jokers';
$string['editdatasets_help'] = 'Joker waarden kunnen aangemaakt worden door een getal in elk joker veld in te typen en op de voeg toe knop te klikken. Om automatisch 10 of meer waarden te genereren kies je het vereiste aantal voor je op de voeg toe knop klikt. Een uniforme distributie betekent dat elke waarde tussen de twee limieten een gelijke kans heeft om gegenereerd te worden; een loguniforme distributie betekent dat waarden dichter bij de lage grens eerder berekend zullen worden.';
$string['existingcategory1'] = 'zal een bestaande gedeelde dataset gebruiken';
$string['existingcategory2'] = 'een bestand uit een bestaande reeks bestanden die ook gebruikt worden door vragen in een andere categorie';
$string['existingcategory3'] = 'een link uit een bestaande reeks links die ook gebruikt worden door vragen in een andere categorie';
$string['forceregeneration'] = 'regeneratie forceren';
$string['forceregenerationall'] = 'regeneratie van alle jokers forceren';
$string['forceregenerationshared'] = 'regeneratie  van alle niet-gedeelde jokers forceren';
$string['functiontakesatleasttwo'] = 'De functie {$a} moet minstens twee argumenten hebben';
$string['functiontakesnoargs'] = 'De functie {$a} gebruikt geen argumenten';
$string['functiontakesonearg'] = 'De functie {$a} heeft juist één argument nodig';
$string['functiontakesoneortwoargs'] = 'De functie {$a} moet één of twee argumenten hebben';
$string['functiontakestwoargs'] = 'De functie {$a} moet twee argumenten hebben';
$string['generatevalue'] = 'Genereer een nieuwe waarde tussen';
$string['getnextnow'] = 'Haal nu een \'Item om toe te voegen\'';
$string['hexanotallowed'] = 'Dataset <strong> {$a->name}</strong> hexadecimale waarde opmaak {$a->value} is niet toegestaan';
$string['illegalformulasyntax'] = 'Foute formulesyntax startend met \'{$a}\'';
$string['incorrectfeedback'] = 'Voor elk fout antwoord';
$string['itemno'] = 'Item {$a}';
$string['itemscount'] = 'Items<br /> Tel';
$string['itemtoadd'] = 'Toe te voegen item';
$string['keptcategory1'] = 'zal dezelfde bestaande gedeelde dataset als hiervoor gebruiken';
$string['keptcategory2'] = 'Een bestand uit dezelfde categorie met herbruikbare bestanden zoals hiervoor';
$string['keptcategory3'] = 'Een link uit dezelfde categorie met herbruikbare links zoals hiervoor';
$string['keptlocal1'] = 'zal dezelfde bestaande private dataset als hiervoor gebruiken';
$string['keptlocal2'] = 'een bestand van dezelfde private set bestanden als voorheen';
$string['keptlocal3'] = 'een link van dezelfde private vraagset met links als voorheen';
$string['lengthoption'] = 'Kies lengte';
$string['loguniform'] = 'Loguniform';
$string['loguniformbit'] = 'Aantal cijfers, van een loguniforme distributie';
$string['makecopynextpage'] = 'Volgende pagina (nieuwe vraag)';
$string['mandatoryhdr'] = 'Verplichte jokertekens in antwoorden';
$string['max'] = 'Max';
$string['min'] = 'Min';
$string['minmax'] = 'Reeks met waarden';
$string['missingformula'] = 'Ontbrekende formule';
$string['missingname'] = 'Ontbrekende vraagnaam';
$string['missingquestiontext'] = 'Ontbrekende vraagtekst';
$string['mustbenumeric'] = 'Je moet hier een getal invoeren.';
$string['mustenteraformulaorstar'] = 'Je moet een formule of \'*\' invoeren';
$string['mustnotbenumeric'] = 'Dit kan geen getal zijn.';
$string['newcategory1'] = 'zal een nieuwe gedeelde dataset gebruiken';
$string['newcategory2'] = 'een bestand van een nieuwe set bestanden die ook gebruikt kunnen worden door andere vragen in deze categorie';
$string['newcategory3'] = 'een link van een nieuwe set links die ook gebruikt kunnen worden door andere vragen in deze categorie';
$string['newlocal1'] = 'zal een nieuwe private dataset gebruiken';
$string['newlocal2'] = 'een bestand uit een nieuwe set bestanden dat enkel gebruikt zal worden voor deze vraag';
$string['newlocal3'] = 'een link uit een nieuwe set links die enkel gebruikt zal worden voor deze vraag';
$string['newsetwildcardvalues'] = 'nieuwe set joker waarden';
$string['nextitemtoadd'] = 'Volgend Item om toe te voegen';
$string['nextpage'] = 'Volgende pagina';
$string['nocoherencequestionsdatyasetcategory'] = 'Voor vraag id  {$a->qid}, is de categorie id  {$a->qcat} niet gelijk aan de gedeelde joker  {$a->name} categorie id  {$a->sharedcat}. Bewerk de vraag.';
$string['nocommaallowed'] = 'De , kan niet gebruikt worden, gebruik . zoals in 0.013 of 1.3r-2';
$string['nodataset'] = 'niets - is geen jokerteken';
$string['nosharedwildcard'] = 'Geen gedeeld jokerteken in deze categorie';
$string['notvalidnumber'] = 'Jokerwaarde is geen geldig getal';
$string['oneanswertrueansweroutsidelimits'] = 'Minstens één juist antwoord buiten de limieten.<br />Wijzig de antwoordtolerantieinstellingen, te vinden bij geavanceerde parameters';
$string['param'] = 'Param {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Voor elk gedeeltelijk juist antwoord';
$string['pluginname'] = 'Berekend';
$string['pluginnameadding'] = 'Berekende vraag toevoegen';
$string['pluginnameediting'] = 'Berekende vraag bewerken';
$string['pluginname_help'] = 'Met berekende vragen kun je unieke numerieke vragen maken door jokers tussen accolades te vervangen door getallen wanneer de test wordt afgenomen. Bijvoorbeeld de vraag: "Wat is de oppervlakte van een rechthoek met lengten {l} en breedte {b}?" heeft als juist antwoord de formule "{l}*{b}" (met * als vermenigvuldigingsteken).';
$string['pluginnamesummary'] = 'Berekende vragen zijn als numerieke vragen, maar met de getallen tijdens de test willekeurig gekozen uit een vooraf opgestelde set.';
$string['possiblehdr'] = 'Mogelijke jokertekens enkel in de vraagtekst aanwezig.';
$string['questiondatasets'] = 'Vraag datasets';
$string['questiondatasets_help'] = 'Vraag datasets met jokertekens die gebruikt zullen worden in elke individuele vraag';
$string['questionstoredname'] = 'Opgeslagen vraagnaam';
$string['replacewithrandom'] = 'Verwissel met een willekeurige waarde';
$string['reuseifpossible'] = 'hergebruik vorige waarde indien beschikbaar';
$string['setno'] = 'Set {$a}';
$string['setwildcardvalues'] = 'set(s) met jokerwaarden';
$string['sharedwildcard'] = 'Gedeelde joker <strong>{$a}</strong>';
$string['sharedwildcardname'] = 'Gedeelde joker';
$string['sharedwildcards'] = 'Gedeelde jokers';
$string['showitems'] = 'Toon';
$string['significantfigures'] = 'met {$a}';
$string['significantfiguresformat'] = 'beduidende cijfers';
$string['synchronize'] = 'Synchroniseer de gegevens van gedeelde datasets met andere vragen in de test';
$string['synchronizeno'] = 'Niet synchroniseren';
$string['synchronizeyes'] = 'Synchroniseer';
$string['synchronizeyesdisplay'] = 'Synchroniseer en toon de gedeelde datasetsnaam als voorvoegsel van de vraagnaam';
$string['tolerance'] = 'Tolerantie';
$string['trueanswerinsidelimits'] = 'Juist antwoord: {$a->correct} binnen de limieten van waar-waarde {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">FOUT - Juist antwoord:{$a->correct} buiten limieten van waar-waarde {$a->true}</span';
$string['uniform'] = 'Uniform';
$string['uniformbit'] = 'decimalen, van een uniforme distributie';
$string['unsupportedformulafunction'] = 'De functie {$a} wordt niet ondersteund';
$string['updatecategory'] = 'Update de categorie';
$string['updatedatasetparam'] = 'Pas de dataset parameters aan';
$string['updatetolerancesparam'] = 'Pas de antwoord tollerantieparameters aan';
$string['updatewildcardvalues'] = 'Pas de jokerwaarden aan';
$string['useadvance'] = 'Gebruik de geavanceerd knop om de fouten te kunnen zien';
$string['usedinquestion'] = 'Gebruikt in vraag';
$string['wildcard'] = 'Joker  {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Joker parameters, gebruikt om de waarden te genereren';
$string['wildcardrole'] = 'De jokers <strong>{x..}</strong> zullen vervangen worden door een numerieke waarde uit de gegenereerde waarden';
$string['wildcards'] = 'Jokers {a} ... {z}';
$string['wildcardvalues'] = 'Jokerwaarden';
$string['wildcardvaluesgenerated'] = 'Jokerwaarden gegenereerd';
$string['youmustaddatleastoneitem'] = 'Je moet minstens één dataset item toevoegen voor je deze vraag kan bewaren.';
$string['youmustaddatleastonevalue'] = 'Je moet minstens één set jokerwaarden toevoegen voor je deze vraag kan bewaren.';
$string['youmustenteramultiplierhere'] = 'Je moet hier een vermenigvuldigtal opgeven.';
$string['zerosignificantfiguresnotallowed'] = 'Het juiste antwoord kan geen 0 beduidende cijfers hebben!';
