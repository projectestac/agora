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
 * Strings for component 'hotpot', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = '放棄';
$string['addquizchain'] = 'クイズチェーンを追加する';
$string['allowreview'] = 'レビューを許可する';
$string['allowreview_help'] = '有効にした場合、学生はクイズ終了後、クイズ受験をレビューすることができます。';
$string['average'] = '平均';
$string['checks'] = 'チェック';
$string['clickreporting'] = 'クリックレポートを有効にする';
$string['clickreporting_help'] = '有効にした場合、「ヒント」「クルー」または「チェック」ボタンがクリックされるたびに、個別のレコードがデータベースに保存されます。このことにより、教師はクイズのクリック状況に関する詳細レポートを閲覧することができます。有効にしない場合、クイズの受験ごとに1レコードのみMoodleデータベースに保存されます。';
$string['clues'] = 'クルー';
$string['completed'] = '完了';
$string['correct'] = '正解';
$string['exit_course'] = 'コース';
$string['feedbackformmail'] = 'フィードバックフォーム';
$string['feedbackmoodleforum'] = 'Moodleフォーラム';
$string['feedbackmoodlemessaging'] = 'Moodleメッセージ';
$string['feedbacknone'] = 'なし';
$string['feedbackwebpage'] = 'ウェブページ';
$string['forceplugins'] = 'メディアプラグインを強制する';
$string['forceplugins_help'] = '有効にした場合、Moodle互換のメディアプレイヤーがavi、mpeg、mpg、mp3、movおよびwmvファイルを再生します。有効にしない場合、Moodleはクイズにおけるメディアプレイヤーの設定を変更しません。';
$string['giveup'] = 'ギブアップ';
$string['hints'] = 'ヒント';
$string['hotpot:attempt'] = 'クイズを受験する';
$string['hotpot:view'] = 'クイズを使用する';
$string['ignored'] = '無視';
$string['inprogress'] = '進行中';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'HotPot';
$string['navigation'] = 'ナビゲーション';
$string['navigation_frame'] = 'Moodleナビケーションフレーム';
$string['navigation_give_up'] = 'ギブアップボタン';
$string['navigation_help'] = 'この設定ではHot Potatoesクイズ内で使用するナビゲーションを設定します。

* Moodleナビケーションバー - 標準的なMoodleナビゲーションバーがクイズと同じウィンドウのページ上部に表示されます。

* Moodleナビゲーションフレーム - 標準的なMoodleナビゲーションバーがクイズ上部の別フレームに表示されます。

* 埋め込み IFRAME - 標準的なMoodleナビゲーションバーがクイズと同じページ内に埋め込まれた IFRAME に表示されます。

* Hot Potatoesクイズボタン - クイズ内で定義されている場合、クイズにナビゲーションボタンが表示されます。

* ギブアップボタン - ギブアップボタンをクイズのページ上部に表示します。

* なし - クイズはナビゲーションなしで表示されます。つまり、MoodleナビゲーションバーもHot Potatoesナビゲーションバーも表示されません。クイズの問題すべてが正しく答えられた場合、Moodleは「次の問題を表示」の設定にしたがって、コースページに戻るか、次のクイズを表示します。';
$string['navigation_moodle'] = '標準Moodleナビゲーションバー (トップおよびサイド)';
$string['navigation_none'] = 'なし';
$string['noactivity'] = '活動なし';
$string['noresponses'] = '問題と解答に関する情報が見つかりませんでした。';
$string['outputformat'] = '出力フォーマット';
$string['outputformat_best'] = 'best';
$string['outputformat_help'] = 'ここではクイズを表示するフォーマットを指定することができます。

* best - クイズはブラウザに最適なフォーマットで表示されます。
* v6+ - クイズはv6+ブラウザ用のドラッグ＆ドロップフォーマットで表示されます。
* v6 - クイズはv6ブラウザ用のフォーマットで表示されます。';
$string['penalties'] = 'ペナルティ';
$string['percent'] = 'パーセント';
$string['pluginname'] = 'Hot Potatoes';
$string['questionshort'] = 'Q-{$a}';
$string['removegradeitem'] = '評定項目を削除する';
$string['score'] = 'スコア';
$string['status'] = 'ステータス';
$string['studentfeedback'] = '学生のフィードバック';
$string['studentfeedback_help'] = '有効にした場合、学生が「Check」ボタンをクリックするといつでも、ポップアップフィードバックウィンドウが表示されます。学生はフィードバックウィンドウを使って、クイズに関するフィードバックを以下4つの方法で教師に送信することができます：

* ウェブページ - 例えば、次のようなウェブページのURIを入力する必要があります: http://myserver.com/feedbackform.html
* フィードバックフォーム - 例えば、次のようなフォームスクリプトのURIも入力する必要があります: http://myserver.com/cgi-bin/formmail.pl
* Moodleフォーラム - このMoodleコースのフォーラムインデックスが表示されます。
* Moodleメッセージ - Moodleインスタントメッセージウィンドウが表示されます。コースに複数の教師が登録されている場合、メッセージページが表示される前、学生に教師を選択するよう指示されます。';
$string['textsourcefilename'] = 'ソースファイル名を使用する';
$string['textsourcefilepath'] = 'ソースファイルパスを使用する';
$string['textsourcequiz'] = 'クイズより取得する';
$string['textsourcespecific'] = 'テキストを指定する';
$string['timedout'] = 'タイムアウト';
$string['timelimit'] = '時間制限';
$string['weighting'] = 'ウェイト';
$string['wrong'] = '不正解';
