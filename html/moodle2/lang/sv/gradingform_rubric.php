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
 * Strings for component 'gradingform_rubric', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Lägg till kriterium';
$string['alwaysshowdefinition'] = 'Tillåt studenter att se den matris som används i denna uppgift (annars visas kriterier och poängnivåer först efter genomförd bedömningen)';
$string['backtoediting'] = 'Tillbaka till redigering';
$string['confirmdeletecriterion'] = 'Är du säker på att du vill radera detta kriterium?';
$string['confirmdeletelevel'] = 'Är du säker på att du vill radera denna nivån?';
$string['criterionaddlevel'] = 'Lägg till nivå';
$string['criteriondelete'] = 'Radera kriterium';
$string['criterionempty'] = 'Klicka här för att redigera kriterium';
$string['criterionmovedown'] = 'Flytta ned';
$string['criterionmoveup'] = 'Flytta upp';
$string['definerubric'] = 'Definiera matris';
$string['description'] = 'Beskrivning';
$string['enableremarks'] = 'Tillåt betygsättare att lägga till kommentarer vid varje kriterium';
$string['err_mintwolevels'] = 'Varje kriterium måste innehålla minst två nivåer';
$string['err_nocriteria'] = 'En matris måste innehålla minst ett kriterium';
$string['err_nodefinition'] = 'Definition av nivå måste fyllas i';
$string['err_nodescription'] = 'Beskrivning av kriterium måste fyllas i';
$string['err_scoreformat'] = 'Antal poäng för varje nivå måste vara ett positivt tal';
$string['err_totalscore'] = 'Högsta möjliga poäng för betygssättning med matris  måste vara mer än noll';
$string['gradingof'] = '{$a} Betygsättning';
$string['leveldelete'] = 'Radera nivå';
$string['levelempty'] = 'Klick här för att redigrera nivå';
$string['name'] = 'Namn';
$string['needregrademessage'] = 'Definitionen av matrisen ändrades efter att studenten betygsattes. Studenten kan inte se den här matrisen förrän du kontrollerar matrisen och uppdaterar betyget';
$string['pluginname'] = 'Kunskapsmatris';
$string['previewrubric'] = 'Förhandsgranska matrisen';
$string['regrademessage1'] = 'Du är på väg att spara ändringar i en matris som redan används för bedömning. Markera om befintliga bedömningar behöver göras om. Om det görs kommer inte studenten att se matrisen innan bedömningen har uppdaterats';
$string['regrademessage5'] = 'Du är på väg att spara viktiga ändringar i en matris som redan används för bedömning. Värdet i betygsrapporten kommer inte att ändras, men studenten kommer inte att se matrisen innan bedömningen har uppdaterats.';
$string['regradeoption0'] = 'Markera inte för ombedömning';
$string['regradeoption1'] = 'Markera för ombedömning';
$string['restoredfromdraft'] = 'OBS: Den senaste försök att betygsätta denna student har inte sparats korrekt - betyg har sparats som "utkast". Om du vill ta bort dessa ändringarna välj "Avbryt" nedan.';
$string['rubric'] = 'Matris';
$string['rubricmapping'] = 'Hur poäng omvandlas till resultat för uppgiften';
$string['rubricmappingexplained'] = 'Minsta möjliga poäng för denna matris är <b>{$a->minscore} poäng</b> och detta kommer att omvandlas till det lägsta resultat i denna uppgift (vilket normalt är noll om inte en bokstavsskala har valts). Den maximala poängen <b>{$a->maxscore} poäng</b> kommer att konverteras till det maximala resultatet för uppgiften.<br /> Mellanliggande resultat kommer att räknas om och avrundas till närmaste heltalsresultat.<br />Om en bokstavsskala används istället för sifferresultat, kommer detta att omräknas och fördelas jämnt i procent mot bokstavsskalans beståndsdelar.';
$string['rubricnotcompleted'] = 'Välj något för varje kriterium';
$string['rubricoptions'] = 'Inställningar för matris';
$string['rubricstatus'] = 'Aktuell status för matris';
$string['save'] = 'Spara';
$string['saverubric'] = 'Spara matris och gör den klar för användning';
$string['saverubricdraft'] = 'Sparar som utkast';
$string['scorepostfix'] = '{$a}poäng';
$string['showdescriptionstudent'] = 'Visa matrisens beskrivning för de som blir betygsatt';
$string['showdescriptionteacher'] = 'Visa matrisens beskrivning under betygsättningen';
$string['showremarksstudent'] = 'Visa kommentarer för de som betygssätts';
$string['showscorestudent'] = 'Visa poäng för varje nivå för dem som betygssätts';
$string['showscoreteacher'] = 'Visa poäng för varje nivå för den som betygsätter';
$string['sortlevelsasc'] = 'Visningsordning för nivåer:';
$string['sortlevelsasc0'] = 'Fallande i poängordning';
$string['sortlevelsasc1'] = 'Stigande i poängordning';
