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
 * Strings for component 'qbehaviour_deferredcbm', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   qbehaviour_deferredcbm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accuracy'] = '正確性';
$string['accuracyandbonus'] = '正確性 + ボーナス';
$string['assumingcertainty'] = 'あなたは確信度を選択していません。仮定: {$a}';
$string['averagecbmmark'] = '平均CBM評点';
$string['basemark'] = '基本評点 {$a}';
$string['breakdownbycertainty'] = '確信度による分類';
$string['cbmbonus'] = 'CBMボーナス';
$string['cbmgradeexplanation'] = 'CBMのため、C=1の時にすべて正解の場合の最大評点に対して上記評点が表示されます。';
$string['cbmgrades'] = 'CBM評点';
$string['cbmgrades_help'] = '確信度ベースの評定 (Certainty Based Marking - CBM) において、C=1 (低い確信度) ですべての問題が正解の場合、評点100%が与えられます。C=3 (高い確信度) で問題すべてが正解の場合、評点は300%となります。  誤認 (確信を持った誤回答) は一般的に不明確であると認められる誤回答よりもさらに評点を低くします。さらにこれは全体の評点がマイナスになる原因ともなり得ます。

**正確性**は確信度を無視して何パーセント正しいかということですが、それぞれの問題の最大評点に加重されます。成功裏に識別できたとして、程度の差はありますが、信頼できる回答はそれぞれの問題に同じ確信度を選択するよりも良い評点を与えることになります。これは**CBMボーナス**に反映されます。**正確性** + **CBMボーナス**は**正確性**より良いも知識尺度です。 誤認は何が知られていて、何が知られていないか注意深く確認する警告であるマイナスボーナスの原因となり得ます。';
$string['cbmmark'] = 'CBM評点 {$a}';
$string['certainty'] = '確信度';
$string['certainty1'] = 'C=1 (不確か: <67%)';
$string['certainty-1'] = '分かりません';
$string['certainty2'] = 'C=2 (中間: >67%)';
$string['certainty3'] = 'C=3 (かなり確か: >80%)';
$string['certainty_help'] = '確信度ベースの評定の場合、あなたの答えがどのくらい信頼できるか指定する必要があります。利用可能なレベルは下記のとおりです:

確信度レベル | C=1 (不確か) | C=2 (中間) | C=3 (かなり確か)
------------------- | ------------ | --------- | ----------------
正解の場合の評点 | 1 | 2 | 3
不正解の場合の評点 | 0 | -2 | -6
正解率 | <67% | 67-80% | >80%

確信のないことを認めることで、最高評点を取得することができます。例えば、あなたが3つのうち1つ以上正しくないと思う場合、C=1と入力することでマイナス点のリスクを避けることができます。';
$string['certaintyshort1'] = 'C=1';
$string['certaintyshort-1'] = '分かりません';
$string['certaintyshort2'] = 'C=2';
$string['certaintyshort3'] = 'C=3';
$string['dontknow'] = '分かりません';
$string['foransweredquestions'] = '{$a} 問の解答済み問題の結果';
$string['forentirequiz'] = '小テスト全体 ({$a} 問) の結果';
$string['howcertainareyou'] = '確信度 {$a->help}: {$a->choices}';
$string['judgementok'] = 'OK';
$string['judgementsummary'] = '解答数: {$a->responses} / 正確性: {$a->fraction} (最適レンジ {$a->idealrangelow} - {$a->idealrangehigh}) / この確信度レベルを使用した場合: {$a->judgement}';
$string['noquestions'] = 'レスポンスなし';
$string['overconfident'] = '自信過剰';
$string['pluginname'] = '遅延フィードバック (CBM)';
$string['slightlyoverconfident'] = '若干自信過剰';
$string['slightlyunderconfident'] = '若干自信不足';
$string['underconfident'] = '自信不足';
