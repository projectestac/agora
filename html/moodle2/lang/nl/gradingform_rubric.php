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
 * Strings for component 'gradingform_rubric', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Voeg criterium toe';
$string['alwaysshowdefinition'] = 'Sta toe dat de gebruikers een voorbeeld kunnen zien van de rubric die wordt gebruikt in de module (zoniet is de rubric enkel zichtbaar na de beoordeling)';
$string['backtoediting'] = 'Terug naar bewerken';
$string['confirmdeletecriterion'] = 'Weet je zeker dat je dit criterium wil wissen?';
$string['confirmdeletelevel'] = 'Weet je zeker dat je dit niveau wil wissen?';
$string['criterionaddlevel'] = 'Voeg niveau toe';
$string['criteriondelete'] = 'Verwijder criterium';
$string['criterionempty'] = 'Klik om het criterium te bewerken';
$string['criterionmovedown'] = 'Verplaats lager';
$string['criterionmoveup'] = 'Verplaats hoger';
$string['definerubric'] = 'Definieer rubric';
$string['description'] = 'Beschrijving';
$string['enableremarks'] = 'Laat beoordeler toe om tekstopmerkingen te maken voor elk criterium';
$string['err_mintwolevels'] = 'Elk criterium moet minstens 2 niveaus hebben';
$string['err_nocriteria'] = 'Een rubric moet minstens één criterium hebben';
$string['err_nodefinition'] = 'De niveaudefinitie kan niet leeg zijn';
$string['err_nodescription'] = 'De criteriumbeschrijving kan niet leeg zijn';
$string['err_scoreformat'] = 'Het aantal punten voor elk niveau moet een geldig positief getal zijn.';
$string['err_totalscore'] = 'Het maximale aantal mogelijke punten wanneer beoordeeld door de rubric moet meer dan nul zijn.';
$string['gradingof'] = '{$a} beoordeling';
$string['leveldelete'] = 'Verwijder niveau';
$string['levelempty'] = 'Klik om het niveau te bewerken';
$string['name'] = 'Naam';
$string['needregrademessage'] = 'De rubricdefinitie is gewijzigd nadat de leerling beoordeeld werd. De leerling kan zijn rubric niet zien tot je deze controleert en het cijfer aanpast.';
$string['pluginname'] = 'Rubric';
$string['previewrubric'] = 'Voorbeeld van rubric';
$string['regrademessage1'] = 'Je gaat wijzigingen aanbrengen aan een rubric die al gebruikt is voor het beoordelen. Geef aan of bestaande cijfers moeten nagekeken worden. Als je dit aangeeft, dan zal de rubric verborgen blijven voor leerlingen tot hun item opnieuw beoordeeld is.';
$string['regrademessage5'] = 'Je gaat belangrijke wijzigingen aan een rubric die al gebruikt is voor het beoordelen bewaren. Het cijfer in het puntenboek zal niet aangepast worden, maar de rubric zal verborgen blijven voor leerlingen tot je hun item opnieuw hebt beoordeeld.';
$string['regradeoption0'] = 'Niet markeren voor opnieuw beoordelen.';
$string['regradeoption1'] = 'Markeren voor opnieuw beoordelen';
$string['restoredfromdraft'] = 'OPMERKING: de laatste beoordelingspoging voor deze persoon is niet behoorlijk bewaard en daarom zijn de voorlopige cijfers teruggezet. Als je deze wijzigingen wil annuleren, klik dan op de \'Annuleer\'-knop onderaan.';
$string['rubric'] = 'Rubric';
$string['rubricmapping'] = 'Score naar cijfer mappingregels';
$string['rubricmappingexplained'] = 'De kleinst mogelijke score voor deze rubric is <b>{$a->minscore}</b> en zal omgezet worden naar het minimumcijfer beschikbaar in deze module (welke nul is, tenzij de schaal wordt gebruikt).
 De maximumscore <b>{$a->maxscore} punten</b> zal omgezet worden naar het maximumcijfer.<br />
 Tussenliggende scores worden omgezet en afgerond naar het dichtstbijzijnde beschikbare cijfer.<br />
 Als er een schaal gebruikt wordt in plaats van een cijfer, dan zal de score omgezet worden naar de schaalelementen alsof ze opeenvolgende gehele getallen waren.';
$string['rubricnotcompleted'] = 'Kies iets voor elk criterium';
$string['rubricoptions'] = 'Rubric opties';
$string['rubricstatus'] = 'Huidige rubric status';
$string['save'] = 'Bewaar';
$string['saverubric'] = 'Bewaar rubric en maak het klaar';
$string['saverubricdraft'] = 'Bewaar als klad';
$string['scorepostfix'] = '{$a} punten';
$string['showdescriptionstudent'] = 'Toon rubricbeschrijving aan wie beoordeeld is';
$string['showdescriptionteacher'] = 'Toon rubricbeschrijving tijdens evaluatie';
$string['showremarksstudent'] = 'Toon opmerkingen aan wie beoordeeld wordt';
$string['showscorestudent'] = 'Toon punten voor elk niveau aan wie beoordeeld wordt';
$string['showscoreteacher'] = 'Toon punten voor elk niveau tijdens evaluatie';
$string['sortlevelsasc'] = 'Sorteervolgorde voor niveaus:';
$string['sortlevelsasc0'] = 'Aflopend volgens aantal punten';
$string['sortlevelsasc1'] = 'Oplopend volgens aantal punten';
