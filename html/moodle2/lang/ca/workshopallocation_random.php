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
 * Strings for component 'workshopallocation_random', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Afegeix autoavaluacions';
$string['allocationaddeddetail'] = 'Nova tasca per avaluar: <strong>{$a->reviewername}</strong> revisarà la feina de <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'No s\'ha pogut desassignar un tramesa ja avaluada: revisor: <strong>{$a->reviewername}</strong>, autor del treball: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Avaluació reutilitzada: <strong>{$a->reviewername}</strong> es manté com a revisor de <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Paràmetres de la tramesa';
$string['assessmentdeleteddetail'] = 'S\'ha desassignat la tramesa: <strong>{$a->reviewername}</strong> ja no revisarà la feina de <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'Els participants poden avaluar sense haver enviat res';
$string['confignumofreviews'] = 'Nombre de trameses a assignar alatòriament per omissió';
$string['excludesamegroup'] = 'Evita les revisions dels companys del mateix grup';
$string['noallocationtoadd'] = 'No hi ha assignacions per afegir';
$string['nogroupusers'] = '<p>Atenció: Si el taller és en els modes «grups visibles» o «grups separats», aleshores CAL que els usuaris pertanyin com a mínim a un grup per tal que aquesta eina els pugui assignar avaluacions dels companys. Als usuaris que no pertanyen a cap grup se\'ls pot assignar encara auto-avaluacions o esborrar-ne les avaluacions existents.</p>
<p>Actualment els següents usuaris no pertanyen a cap grup: {$a}</p>';
$string['numofdeallocatedassessment'] = 'S\'estan desassignant {$a} avaluacions';
$string['numofrandomlyallocatedsubmissions'] = 'S\'estan assignant aleatòriament {$a} trameses';
$string['numofreviews'] = 'Nombre de revisors';
$string['numofselfallocatedsubmissions'] = 'S\'estan autoassignant {$a} trameses';
$string['numperauthor'] = 'per tramesa';
$string['numperreviewer'] = 'per revisor';
$string['pluginname'] = 'Assignació aleatòria';
$string['randomallocationdone'] = 'S\'ha finalitzat l\'assignació aleatòria';
$string['removecurrentallocations'] = 'Esborra les assignacions actuals';
$string['resultnomorepeers'] = 'No hi ha disponibles més parells';
$string['resultnomorepeersingroup'] = 'No hi ha disponibles més parells en aquest grup separat';
$string['resultnotenoughpeers'] = 'No hi ha disponibles prou parells';
$string['resultnumperauthor'] = 'S\'estan assignant {$a} revisió/ons per autor';
$string['resultnumperreviewer'] = 'S\'estan assignant {$a} revisió/ons per revisor';
$string['stats'] = 'Estadístiques de les assignacions actuals';
