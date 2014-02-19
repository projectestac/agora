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
 * Strings for component 'qbehaviour_adaptive', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   qbehaviour_adaptive
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['disregardedwithoutpenalty'] = '送信が有効ではないため、ペナルティなしとして無視されました。';
$string['gradingdetails'] = 'この送信の評点: {$a->raw}/{$a->max}';
$string['gradingdetailsadjustment'] = '前の受験により <strong>{$a->cur}/{$a->max}</strong> に調整されます。';
$string['gradingdetailspenalty'] = 'この解答のペナルティ: {$a}';
$string['gradingdetailspenaltytotal'] = '現在のペナルティ: {$a}';
$string['gradingdetailswithadjustment'] = 'この送信の評点は {$a->raw}/{$a->max} です。前の受験に基づき、<strong>{$a->cur}/{$a->max}</strong> に補正されます。';
$string['gradingdetailswithadjustmentpenalty'] = 'この送信の評点は {$a->raw}/{$a->max} です。前の受験に基づき、<strong>{$a->cur}/{$a->max}</strong> に補正されます。この送信からペナルティ {$a->penalty} 点が引かれます。';
$string['gradingdetailswithadjustmenttotalpenalty'] = 'この送信の評点は {$a->raw}/{$a->max} です。 前の受験に基づき、<strong>{$a->cur}/{$a->max}</strong> に補正されます。この送信からペナルティ {$a->penalty} 点が引かれます。現在のペナルティ合計は {$a->totalpenalty} です。';
$string['gradingdetailswithpenalty'] = 'この送信の評点は {$a->raw}/{$a->max} です。この送信からペナルティ {$a->penalty} 点が引かれます。';
$string['gradingdetailswithtotalpenalty'] = 'この送信の評点は {$a->raw}/{$a->max} です。この送信からペナルティ {$a->penalty} 点が引かれます。現在のペナルティ合計は {$a->totalpenalty} です。';
$string['notcomplete'] = '未完了';
$string['pluginname'] = 'アダプティブモード';
