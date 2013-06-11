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
 * Strings for component 'qtype_multianswer', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_multianswer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmquestionsaveasedited'] = '問題を編集済みとして保存することを承認します。';
$string['confirmsave'] = '{$a} を確認して保存する';
$string['correctanswer'] = '正解';
$string['correctanswerandfeedback'] = '正解およびフィードバック';
$string['decodeverifyquestiontext'] = '問題テキストをデコードおよび確認する';
$string['layout'] = 'レイアウト';
$string['layouthorizontal'] = 'ラジオボタンの水平行';
$string['layoutselectinline'] = 'テキスト内のインラインのドロップダウンメニュー';
$string['layoutundefined'] = 'レイアウト未定義';
$string['layoutvertical'] = 'ラジオボタンの垂直カラム';
$string['nooptionsforsubquestion'] = '問題部分 # {$a->sub} のオプションを取得できません (question->id={$a->id})。';
$string['noquestions'] = 'Cloze (穴埋め問題) 「<strong>{$a}</strong>」に問題が含まれていません。';
$string['pluginname'] = 'Cloze (穴埋め問題)';
$string['pluginnameadding'] = '穴埋め問題 (Cloze) の追加';
$string['pluginnameediting'] = 'Cloze (穴埋め問題) の編集';
$string['pluginname_help'] = '穴埋め問題 (Cloze) では多肢選択問題および記述問題のような問題を一連のテキストの中に埋め込むことができます。';
$string['pluginnamesummary'] = 'このタイプの問題は非常に柔軟性がありますが、埋め込み式の多肢選択問題、記述問題および数値時問題を作成することのできる、特別なコードを含んだテキストを入力する必要があります。';
$string['qtypenotrecognized'] = '不明な問題タイプ {$a} です。';
$string['questiondefinition'] = '問題定義';
$string['questiondeleted'] = '問題削除';
$string['questioninquiz'] = '<ul>
<li>問題を追加または削除する</li>
<li>テキスト内の問題順を変更する</li>
<li>問題タイプを変更する (数値問題、記述問題、多肢選択問題)</li>
</ul>';
$string['questionnotfound'] = '問題部分 #{$a} の問題が見つかりません。';
$string['questionsadded'] = '「問題追加」';
$string['questionsaveasedited'] = '問題を編集済みとして保存する';
$string['questionsless'] = 'データベースに保存されている穴埋め問題より {$a} 問少ない ';
$string['questionsmissing'] = '問題テキストには少なくとも1つの埋め込まれた答えが必要です。';
$string['questionsmore'] = 'データベースに保存されている穴埋め問題より {$a} 問多い';
$string['questiontypechanged'] = '問題タイプが変更されました。';
$string['questiontypechangedcomment'] = '少なくとも1つの問題タイプが変更されました。<br /> 問題を追加、削除または移動しましたか?<br />確認してください。';
$string['questionusedinquiz'] = 'この問題は {$a->nb_of_quiz} の小テストで使用されています。合計受験数: {$a->nb_of_attempts}';
$string['storedqtype'] = '保存された問題タイプ {$a}';
$string['subqresponse'] = 'パート {$a->i}: {$a->response}';
$string['unknownquestiontypeofsubquestion'] = '不明な問題タイプ: 問題部分 # {$a->sub} の {$a->type}';
$string['warningquestionmodified'] = '<b>警告</b>';
$string['youshouldnot'] = '<b>やるべきではありません</b>';
