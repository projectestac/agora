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
 * Strings for component 'qbehaviour_adaptive', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   qbehaviour_adaptive
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['disregardedwithoutpenalty'] = 'El lliurament del qüestionari no ha estat valid i s\'ha descartat sense penalitzacions.';
$string['gradingdetails'] = 'Puntuacions d\'aquest lliurament: {$a->raw} / {$a->max}.';
$string['gradingdetailsadjustment'] = 'Tenint en compte els intents previs, la puntuació és <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailspenalty'] = 'Aquest lliurament ha acumulat una penalització de {$a}.';
$string['gradingdetailspenaltytotal'] = 'Total de la penalització fins ara: {$a}';
$string['gradingdetailswithadjustment'] = 'Puntuacions per a aquesta tramesa:
{$a->raw} /{$a->max}. Tenint en compte els intents anteriors, això dóna <strong>{$a->cur} / {$a->max}.</strong>';
$string['gradingdetailswithadjustmentpenalty'] = 'Puntuacions per a aquesta tramesa: {$a->raw} / {$a->max}. Tenint en compte els intents anteriors, això dóna <strong>{$a->cur} / {$a->max}.</strong> Aquesta tramesa té una penalització de {$a->penalty}.';
$string['gradingdetailswithadjustmenttotalpenalty'] = 'Puntuacions per a aquesta tramesa: {$a->raw} / {$a->max}. Tenint en compte els intents anteriors, això dóna <strong>{$a->cur} / {$a->max}.</strong> Aquesta tramesa té una penalització de {$a->penalty}. Penalitzacions totals fins ara: {$a->totalpenalty}.';
$string['gradingdetailswithpenalty'] = 'Puntuacions per a aquesta tramesa: {$a->raw} / {$a->max}. Aquesta tramesa té una penalització de {$a->penalty}.';
$string['gradingdetailswithtotalpenalty'] = 'Puntuacions per a aquesta tramesa: {$a->raw} / {$a->max}. Aquesta tramesa té una penalització de {$a->penalty}. Penalització total fins ara: {$a->totalpenalty}.';
$string['notcomplete'] = 'Incomplet';
$string['pluginname'] = 'Mode adaptatiu';
