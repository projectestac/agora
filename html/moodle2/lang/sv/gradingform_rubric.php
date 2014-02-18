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
 * Strings for component 'gradingform_rubric', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Lägg till kriterium';
$string['alwaysshowdefinition'] = 'Tillåt användare att förhandsgranska rubriken som används i modulen (annars visas rubriken endast  efterbetygsättning)';
$string['backtoediting'] = 'Tillbaka till redigering';
$string['confirmdeletecriterion'] = 'Är du säker på att du vill ta bort detta kriterium?';
$string['confirmdeletelevel'] = 'Är du säker på att du vill ta bort den här nivån?';
$string['criterionaddlevel'] = 'Lägg till nivå';
$string['criteriondelete'] = 'Ta bort kriterium';
$string['criterionempty'] = 'Välj för att redigera kriterium';
$string['criterionmovedown'] = 'Flytta ner';
$string['criterionmoveup'] = 'Flytta upp';
$string['definerubric'] = 'Definiera rubrik';
$string['description'] = 'Beskrivning';
$string['enableremarks'] = 'Tillåt betygssättare att lägga till kommentarer för varje kriterium';
$string['err_mintwolevels'] = 'Varje kriterium måste innehålla minst två nivåer';
$string['err_nocriteria'] = 'Rubrik måste innehålla minst en kriterium';
$string['err_nodefinition'] = 'Definition av nivå kan inte vara tomt';
$string['err_nodescription'] = 'Definition av kriterium kan inte vara tomt';
$string['err_scoreformat'] = 'Antal poäng för varje nivå måste vara en giltig icke-negativt tal';
$string['err_totalscore'] = 'Maximalt antal möjliga pöäng när graderad med rubriken måste vara mer än noll';
$string['gradingof'] = '{$a} Betygsättning';
$string['leveldelete'] = 'Radera nivå';
$string['levelempty'] = 'Välj för att redigrera nivå';
$string['name'] = 'Namn';
$string['needregrademessage'] = 'Definitionen av rubriken ändrades efter att studenten betygsattes. Studenten kan inte se den här rubriken förrän du kontrollerar rubriken och uppdatera betyget.';
$string['pluginname'] = 'Rubrik';
$string['previewrubric'] = 'Förhandsgranska rubriken';
$string['regrademessage1'] = 'Du håller på att spara ändringarna till en rubrik som redan har använts för betygssättning. Vänligen ange om befintliga betyg behöver ses över. Om du ställer in detta kommer rubriken att döljas för studenten eleverna tills deras uppgift är åter betygsatt.';
$string['regrademessage5'] = 'Du håller på att spara betydande ändringarna till en rubrik som redan har använts för betygssättning. Betygssättningens värde kommer att vara oförändrad, men rubriken kommer att döljas för studenter tills deras uppgift är åter betygsatt.';
$string['regradeoption0'] = 'Markera inte för poängändring';
$string['regradeoption1'] = 'Markera för poängändring';
$string['restoredfromdraft'] = 'OBS: Den sista försök att betygsätta denna person har inte sparats korrekt - betyg har sparats som "förslag".  Om du vill avbryta dessa ändringarna använda "Avbryt" knappen nedan.';
$string['rubric'] = 'Rubrik';
$string['rubricmapping'] = '';
$string['rubricmappingexplained'] = 'Minsta möjliga poäng för denna rubrik är {$a->minscore} poäng och det kommer att konverteras till den minsta grad som är tillgängliga i denna modul (som är noll om inte skalan redan används). Den maximala poängen {$a->maxscore} poäng kommer att konverteras till den högsta grad. Mellanliggande poäng kommer att konverteras till närmaste betyg. Om en skala används istället för en betyg, kommer poängen omvandlas till skalans elementer som om de vore på varandra följande heltal.';
$string['rubricnotcompleted'] = 'Välj något för varje kriterium';
$string['rubricoptions'] = 'Rubrik optioner';
$string['rubricstatus'] = 'Nuvarande rubrik status';
$string['save'] = 'Spara';
$string['saverubric'] = 'Spara rubrik och gör den redo';
$string['saverubricdraft'] = 'Spara som utkast';
$string['scorepostfix'] = '{$a}poäng';
$string['showdescriptionstudent'] = 'Visa rubrikens beskrivning för de som betygsätter';
$string['showdescriptionteacher'] = 'Visa rubrikens beskrivning under värderingen';
$string['showremarksstudent'] = 'Visa anmärkningar till dem som betygssätts';
$string['showscorestudent'] = 'Visa poäng för varje nivå för dem som betygssätts';
$string['showscoreteacher'] = 'Visa poäng för varje nivå under värderingen';
$string['sortlevelsasc'] = 'Sortering av nivåer:';
$string['sortlevelsasc0'] = 'Nedstigande efter antal poäng';
$string['sortlevelsasc1'] = 'Uppstigande efter antal poäng';
