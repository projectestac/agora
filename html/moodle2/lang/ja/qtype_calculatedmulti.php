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
 * Strings for component 'qtype_calculatedmulti', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_calculatedmulti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answeroptions'] = '選択肢オプション';
$string['answeroptions_help'] = '選択肢の推奨公式は次のとおりです ...<strong>{={x}+..}</strong>...';
$string['pluginname'] = '多肢選択計算問題';
$string['pluginnameadding'] = '多肢選択計算問題の追加';
$string['pluginnameediting'] = '多肢選択計算問題の編集';
$string['pluginname_help'] = '多肢選択計算問題は小テスト受験時に個々の値に置換される波括弧「{}」内のワイルドカードを使用する数値式を選択肢に含むことのできる多肢選択問題のような問題です。例えば、「高さ {l} 、幅 {w} の長方形の面積は?」という問題があったとして、1つの選択肢は {={l}*{w}} ( * は乗算を意味します) のようにすることができます。';
$string['pluginnamesummary'] = '多肢選択計算問題は小テスト受験時に個々の値に置換される波括弧内「{}」のワイルドカードを使用する数値式を選択肢に含むことのできる多肢選択問題のような問題です。';
