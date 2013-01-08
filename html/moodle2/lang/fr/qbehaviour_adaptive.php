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
 * Strings for component 'qbehaviour_adaptive', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   qbehaviour_adaptive
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['disregardedwithoutpenalty'] = 'Cet envoi n\'est pas valide. Il a été ignoré, sans pénalité';
$string['gradingdetails'] = 'Note pour cet envoi : {$a->raw}/{$a->max}.';
$string['gradingdetailsadjustment'] = 'Tenant compte des tentatives précédentes, cela donne <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailspenalty'] = 'Cet envoi a subi une pénalité de {$a}.';
$string['gradingdetailspenaltytotal'] = 'Pénalités jusqu\'ici : {$a}';
$string['gradingdetailswithadjustment'] = 'Points pour cet envoi : {$a->raw}/{$a->max}. En tenant compte des tentatives précédentes, cela donne <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailswithadjustmentpenalty'] = 'Points pour cette tentative : {$a->raw}/{$a->max}. En tenant compte des tentatives précédentes, cela donne <strong>{$a->cur}/{$a->max}</strong>. Cette tentative a reçu une pénalité de {$a->penalty}.';
$string['gradingdetailswithadjustmenttotalpenalty'] = 'Points pour cette tentative : {$a->raw}/{$a->max}. En tenant compte des tentatives précédentes, cela donne <strong>{$a->cur}/{$a->max}</strong>. Cette tentative a reçu une pénalité de {$a->penalty}. Total des pénalités jusqu\'à maintenant : {$a->totalpenalty}.';
$string['gradingdetailswithpenalty'] = 'Points pour cette tentative : {$a->raw}/{$a->max}. Cette tentative a reçu une pénalité de {$a->penalty}.';
$string['gradingdetailswithtotalpenalty'] = 'Points pour cette tentative : {$a->raw}/{$a->max}. Cette tentative a reçu une pénalité de {$a->penalty}. Total des pénalités jusqu\'à maintenant : {$a->totalpenalty}.';
$string['notcomplete'] = 'Incomplet';
$string['pluginname'] = 'Mode adaptatif';
