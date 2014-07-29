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
 * Strings for component 'quiz_statistics', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   quiz_statistics
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actualresponse'] = '実解答';
$string['allattempts'] = 'すべての受験';
$string['allattemptsavg'] = 'すべての受験評点の平均値';
$string['allattemptscount'] = '受験総数 (評定済み)';
$string['analysisofresponses'] = '解答分析';
$string['analysisofresponsesfor'] = '{$a} の解答に関する分析';
$string['attempts'] = '受験';
$string['attemptsall'] = 'すべての受験';
$string['attemptsfirst'] = '最初の受験';
$string['backtoquizreport'] = 'メイン統計レポートページに戻る';
$string['calculatefrom'] = '統計計算:';
$string['cic'] = '内部整合性係数 ({$a})';
$string['completestatsfilename'] = '完了統計';
$string['count'] = 'カウント';
$string['coursename'] = 'コース名';
$string['detailedanalysis'] = 'この問題に対する解答の詳細分析';
$string['discrimination_index'] = '識別指数';
$string['discriminative_efficiency'] = '識別率';
$string['downloadeverything'] = 'フルリポートをダウンロードする: {$a->formatsmenu} {$a->downloadbutton}';
$string['duration'] = '公開期間';
$string['effective_weight'] = '有効加重';
$string['errordeleting'] = '古い {$a} レコード削除中にエラーが発生しました。';
$string['erroritemappearsmorethanoncewithdifferentweight'] = '問題 ({$a}) では、小テストの異なる位置において、1つ以上の異なる加重が設定されています。現在、統計レポートで、このような設定はサポートされていません。また、この小テスト統計の信頼性が損なわれる恐れがあります。';
$string['errormedian'] = '中央値の取得中にエラーが発生しました。';
$string['errorpowerquestions'] = '問題評点の分散を計算するデータの取得中にエラーが発生しました。';
$string['errorpowers'] = '小テスト評点の分散を計算するデータの取得中にエラーが発生しました。';
$string['errorrandom'] = 'サブアイテムデータの取得中にエラーが発生しました。';
$string['errorratio'] = '誤差率 ({$a})';
$string['errorstatisticsquestions'] = '問題評点の統計を計算するデータの取得中にエラーが発生しました。';
$string['facility'] = 'ファシリティ指標';
$string['firstattempts'] = '最初の受験';
$string['firstattemptsavg'] = '最初の受験評点の平均値';
$string['firstattemptscount'] = '最初の受験数 (評定済み)';
$string['frequency'] = '頻度';
$string['highestattempts'] = '最高評点の受験';
$string['highestattemptsavg'] = '最高評点の受験の平均点';
$string['intended_weight'] = '意図された加重';
$string['kurtosis'] = '評点分布の尖度 ({$a})';
$string['lastattempts'] = '前回の受験';
$string['lastattemptsavg'] = '前回の受験の平均点';
$string['lastcalculated'] = '最終計算 {$a->lastcalculated} 前より {$a->count} 件の受験がありました。';
$string['median'] = '評点の中央値 ({$a})';
$string['modelresponse'] = 'モデル解答';
$string['negcovar'] = '受験評点総計における評点の負の共分散';
$string['negcovar_help'] = '小テストの一連の受験に関する、この問題の評点は全体の受験評点と反対であるという点で異なります。これはこの問題の評点が反対に平均以上であることに対して、全体の受験評点は平均以下の傾向があることを意味します。

この場合、私たちの有効問題加重の式では計算できません。負の共分散でハイライトされた問題にゼロの最大評点が与えられた場合、この小テスト内の他の問題に関する計算の有効問題加重はこれらの問題の有効問題加重となります。

あなたが問題を編集して、これらの問題に最大評点ゼロの負の共分散を与えた場合、これらの問題の有効問題加重はゼロになります。そして、他の問題の実有効問題加重は直ちに計算されます。';
$string['nostudentsingroup'] = 'このグループには、まだ学生が登録されていません。';
$string['optiongrade'] = '部分点';
$string['partofquestion'] = '問題の一部';
$string['pluginname'] = '統計';
$string['position'] = 'ポジション';
$string['positions'] = 'ポジション';
$string['questioninformation'] = '問題情報';
$string['questionname'] = '問題名';
$string['questionnumber'] = '問題#';
$string['questionstatistics'] = '問題統計';
$string['questionstatsfilename'] = '問題統計';
$string['questiontype'] = '問題タイプ';
$string['quizinformation'] = '小テスト情報';
$string['quizname'] = '小テスト名';
$string['quizoverallstatistics'] = '小テスト全体の統計';
$string['quizstructureanalysis'] = '問題構造分析';
$string['random_guess_score'] = '当てずっぽうの評点';
$string['recalculatenow'] = '再計算する';
$string['reportsettings'] = '統計計算設定';
$string['response'] = '解答';
$string['skewness'] = '評点分布の歪み ({$a})';
$string['standarddeviation'] = '標準偏差 ({$a})';
$string['standarddeviationq'] = '標準偏差';
$string['standarderror'] = '標準誤差 ({$a})';
$string['statistics'] = '統計';
$string['statistics:componentname'] = '小テスト統計レポート';
$string['statisticsreport'] = '統計レポート';
$string['statisticsreportgraph'] = '問題ポジションの統計';
$string['statistics:view'] = '統計レポートを表示する';
$string['statsfor'] = '小テスト統計 ({$a})';
