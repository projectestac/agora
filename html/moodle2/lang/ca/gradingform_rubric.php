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
 * Strings for component 'gradingform_rubric', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   gradingform_rubric
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcriterion'] = 'Afegeix criteri';
$string['alwaysshowdefinition'] = 'Permet als usuaris previsualitzar rúbriques utilitzades al mòdul (en cas contrari les rúbriques sols són visibles després de qualificar)';
$string['backtoediting'] = 'Torna a l\'edició';
$string['confirmdeletecriterion'] = 'Esteu segur de voler suprimir aquest criteri?';
$string['confirmdeletelevel'] = 'Esteu segur de voler suprimir aquest nivell ?';
$string['criterionaddlevel'] = 'Afegeix nivell';
$string['criteriondelete'] = 'Suprimeix criteri';
$string['criterionempty'] = 'Prem per editar el criteri';
$string['criterionmovedown'] = 'Mou avall';
$string['criterionmoveup'] = 'Mou amunt';
$string['definerubric'] = 'Defineix rúbrica';
$string['description'] = 'Descripció';
$string['enableremarks'] = 'Permet al professor afegir notes de text per cada criteri';
$string['err_mintwolevels'] = 'Cada criteri ha de tindre al menys dos nivells';
$string['err_nocriteria'] = 'La rúbrica ha de tindre al menys un criteri';
$string['err_nodefinition'] = 'La definició del nivell no pot estar buida';
$string['err_nodescription'] = 'La descripció del criteri no pot estar buida';
$string['err_scoreformat'] = 'El nombre de punts per cada nivell ha de ser un nombre vàlid no negatiu';
$string['err_totalscore'] = 'El nombre de punts màxim possible quan es qualifica amb una rúbrica ha de ser major de cero';
$string['gradingof'] = 'S\'està qualificant {$a}';
$string['leveldelete'] = 'Suprimeix nivell';
$string['levelempty'] = 'Prem per editar el nivell';
$string['name'] = 'Nom';
$string['needregrademessage'] = 'La definició de la rúbrica ha canviat després que aquest estudiant hagi estat qualificat. L\'estudiant no pot veure aquesta rúbrica malgrat que comproveu la rúbrica i actualitzeu la qualificació.';
$string['pluginname'] = 'Rúbrica';
$string['previewrubric'] = 'Previsualitza rúbrica';
$string['regrademessage1'] = 'Esteu a punt de desar canvis en una rúbrica que ha estat utilitzada per qualificar. Si us plau indiqueu si les qualificacions que ja existeixen s\'han de revisar. Si ho configureu així llavors la rúbrica s\'ocultarà als estudiants llevat que aquests siguin requalificats.';
$string['regrademessage5'] = 'Esteu a punt de desar canvis en una rúbrica que ha estat utilitzada per qualificar. El quadern de notes no canviarà però la rúbrica s\'ocultarà als estudiants llevat que aquests siguin requalificats.';
$string['regradeoption0'] = 'No marqueu per requalificar';
$string['regradeoption1'] = 'Marqueu per requalificar';
$string['restoredfromdraft'] = 'NOTA: El darrer intent per qualificar aquesta persona no ha sigut desat correctament per això les qualificacions en brut han sigut restaurades. Si voleu cancel·lar aquests canvis utilitzeu el botó \'Cancel·la\' de sota.';
$string['rubric'] = 'Rúbrica';
$string['rubricmapping'] = 'Puntuació per qualificar el mapatge de les regles.';
$string['rubricmappingexplained'] = 'La puntuació mínima per aquesta rúbrica és de <b>{$a->minscore} punts</b> i es
convertirà en la qualificació mínima disponible per aquest mòdul (la qual és zero llevat que s\'utilitzi l\'escala). <br/>
La puntuació màxima de <b>{$a->maxscore} punts</b> es convertirà en la qualificació màxima. <br/>
Les puntuacions intermèdies es convertiran i s\'arredoniran a la qualificació més pròxima. <br/>
Si una escala s\'usa com a qualificació, la puntuació es convertirà en elements de l\'escala com si fossin nombres enters consecutius.';
$string['rubricnotcompleted'] = 'Si us plau trieu alguna cosa per cada criteri.';
$string['rubricoptions'] = 'Opcions de rúbrica';
$string['rubricstatus'] = 'Estat de la rúbrica actual';
$string['save'] = 'Desa';
$string['saverubric'] = 'Desa la rubrica i fes-la efectiva';
$string['saverubricdraft'] = 'Desa com a esborrany';
$string['scorepostfix'] = '{$a}punts';
$string['showdescriptionstudent'] = 'Mostra la descripció de la rúbrica als alumnes que s\'estan qualificant';
$string['showdescriptionteacher'] = 'Mostra la descripció de la rúbrica durant l\'avaluació';
$string['showremarksstudent'] = 'Mostra les anotacions als alumnes que s\'estan qualificant';
$string['showscorestudent'] = 'Mostra els punts de cada nivell per als alumnes que s\'estan qualificant';
$string['showscoreteacher'] = 'Mostra els punts de cada nivell durant l\'avaluació';
$string['sortlevelsasc'] = 'Criteri d\'ordenació pels nivells:';
$string['sortlevelsasc0'] = 'Per puntuacions decreixents';
$string['sortlevelsasc1'] = 'Per puntuacions creixents';
