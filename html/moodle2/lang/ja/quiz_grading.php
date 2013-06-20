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
 * Strings for component 'quiz_grading', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   quiz_grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alldoneredirecting'] = '選択された問題すべてが評定されました。問題一覧に戻ります。';
$string['alreadygraded'] = '評定済み';
$string['alsoshowautomaticallygraded'] = '自動評定された問題も表示する';
$string['attemptstograde'] = '評定する受験';
$string['automaticallygraded'] = '自動評定済み';
$string['backtothelistofquestions'] = '問題リストに戻る';
$string['bydate'] = '日付順';
$string['bystudentidnumber'] = '学生ID順';
$string['bystudentname'] = '学生名順';
$string['cannotgradethisattempt'] = 'この受験を評定できません。';
$string['cannotloadquestioninfo'] = '問題情報を特定する問題タイプを読み込めませんでした。';
$string['changeoptions'] = 'オプションを変更する';
$string['essayonly'] = '以下の問題は手動評定する必要があります。';
$string['grade'] = '評定';
$string['gradeall'] = 'すべてを評定する';
$string['gradeattemptsall'] = 'すべて ({$a})';
$string['gradeattemptsautograded'] = '自動評定済み ({$a})';
$string['gradeattemptsmanuallygraded'] = '前に手動評定済み ({$a})';
$string['gradeattemptsneedsgrading'] = '要評定 ({$a})';
$string['graded'] = '(評定済み)';
$string['gradenextungraded'] = '次の {$a} 件の未評定の受験を評定する';
$string['gradeungraded'] = '{$a} 件すべての未評定の受験を評定する';
$string['grading'] = '手動評定';
$string['gradingall'] = 'この問題すべての受験件数は {$a} 件です。';
$string['gradingattempt'] = '{$a->fullname} の受験回数 {$a->attempt}';
$string['gradingattemptsxtoyofz'] = '受験評定 {$a->from} -> {$a->to} / {$a->of}';
$string['gradingattemptwithidnumber'] = '{$a->fullname} ({$a->idnumber}) の受験数: {$a->attempt}';
$string['grading:componentname'] = '手動評定レポート';
$string['gradingnextungraded'] = '次の {$a} 件の未評定の受験';
$string['gradingnotallowed'] = 'あなたには、この小テストの解答を手動評定するパーミッションがありません。';
$string['gradingquestionx'] = '問題評定 {$a->number}: {$a->questionname}';
$string['gradingreport'] = '手動評定レポート';
$string['gradingungraded'] = '未評定の受験 {$a}';
$string['gradinguser'] = '{$a} の受験';
$string['grading:viewidnumber'] = '評定中、学生IDナンバーを表示する';
$string['grading:viewstudentnames'] = '評定中、学生名を表示する';
$string['hideautomaticallygraded'] = '自動評定された問題を隠す';
$string['inprogress'] = '進行中';
$string['invalidattemptid'] = 'そのような受験IDはありません。';
$string['invalidquestionid'] = '評定できる問題 (ID {$a}) が見つかりませんでした。';
$string['noquestionsfound'] = '手動評定問題は見つかりませんでした。';
$string['nothingfound'] = '表示するものはありません。';
$string['options'] = 'オプション';
$string['orderattempts'] = '受験順';
$string['pluginname'] = '手動評定';
$string['qno'] = 'Q #';
$string['questionname'] = '問題名';
$string['questionsperpage'] = '1ページあたりの問題数';
$string['questionsthatneedgrading'] = '評定が必要な問題';
$string['questiontitle'] = '問題 {$a->number}: {$a->name} (評定済み受験結果 {$a->openspan}{$a->gradedattempts}{$a->closespan} / {$a->totalattempts} {$a->openspan}{$a->closespan})';
$string['randomly'] = 'ランダム';
$string['saveandnext'] = '保存して次のページに移動する';
$string['showstudentnames'] = '学生名を表示する';
$string['tograde'] = '要評定';
$string['total'] = '合計';
$string['unknownquestion'] = '不明な問題';
$string['updategrade'] = '評定を更新する';
