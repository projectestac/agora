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
 * Strings for component 'qbehaviour_adaptive', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   qbehaviour_adaptive
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['disregardedwithoutpenalty'] = 'Die Einreichung ist ungültig und wurde ohne Bewertung verworfen.';
$string['gradingdetails'] = 'Zensur für diese Einreichung: {$a->raw}/{$a->max}.';
$string['gradingdetailsadjustment'] = 'Zusammen mit früheren Versuchen ergibt dies <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailspenalty'] = 'Für diese Beantwortung erhielten Sie einen Punktabzug in Höhe von {$a}.';
$string['gradingdetailspenaltytotal'] = 'Gesamtabzüge bisher: {$a}';
$string['gradingdetailswithadjustment'] = 'Bewertung für diese Einreichung: {$a->raw}/{$a->max}. Mit Berechnung für frühere Versuche ergibt dies <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailswithadjustmentpenalty'] = 'Bewertung für diese Einreichung: {$a->raw}/{$a->max}. Mit Berechnung für frühere Versuche ergibt dies <strong>{$a->cur}/{$a->max}</strong>. Diese Einreichung berücksichtigt einen Abzug von {$a->penalty}.';
$string['gradingdetailswithadjustmenttotalpenalty'] = 'Bewertung für diese Einreichung: {$a->raw}/{$a->max}. Mit Berechnung für frühere Versuche ergibt dies <strong>{$a->cur}/{$a->max}</strong>. Diese Einreichung berücksichtigt einen Abzug von {$a->penalty}. Gesamtabzug bisher: {$a->totalpenalty}.';
$string['gradingdetailswithpenalty'] = 'Bewertung für diese Einreichung: {$a->raw}/{$a->max}. Diese Einreichung berücksichtigt einen Abzug von {$a->penalty}.';
$string['gradingdetailswithtotalpenalty'] = 'Bewertung für diese Einreichung: {$a->raw}/{$a->max}. Diese Einreichung berücksichtigt einen Abzug von {$a->penalty}. Gesamtabzug bisher: {$a->totalpenalty}.';
$string['notcomplete'] = 'Unvollständig';
$string['pluginname'] = 'Mehrfachbeantwortung (mit Abzügen)';
