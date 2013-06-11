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
 * Strings for component 'feedback', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = '質問を追加する';
$string['add_items'] = '質問を追加する';
$string['add_pagebreak'] = '改ページ (Page break) を追加する';
$string['adjustment'] = '表示方向';
$string['after_submit'] = '回答送信後';
$string['allowfullanonymous'] = '完全な匿名を許可する';
$string['analysis'] = '分析';
$string['anonymous'] = '匿名';
$string['anonymous_edit'] = 'ユーザ名を記録する';
$string['anonymous_entries'] = '匿名エントリ';
$string['anonymous_user'] = '匿名ユーザ';
$string['append_new_items'] = '新しいアイテムを追加する';
$string['autonumbering'] = '自動番号付け';
$string['autonumbering_help'] = 'それぞれの質問に対して自動ナンバリングを有効または無効にします。';
$string['average'] = '平均';
$string['bold'] = '太字';
$string['cancel_moving'] = '移動をキャンセルする';
$string['cannotmapfeedback'] = 'データベーストラブル、フィードバックをコースにマップできません。';
$string['cannotsavetempl'] = 'テンプレートの保存は、許可されていません。';
$string['cannotunmap'] = 'データベーストラブル、マップ解除できません。';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Captchaが設定されていません。';
$string['check'] = '多肢選択 - 複数回答';
$string['checkbox'] = '多肢選択 - 複数回答 (チェックボックス)';
$string['check_values'] = '考えられる回答';
$string['choosefile'] = 'ファイルを選択する';
$string['chosen_feedback_response'] = '選択されたフィードバックの回答';
$string['completed'] = '完了';
$string['completed_feedbacks'] = '送信済み回答';
$string['complete_the_form'] = '質問に回答する ...';
$string['completionsubmit'] = 'フィードバックが送信された場合、完了として表示する';
$string['configallowfullanonymous'] = 'このオプションを有効にした場合、ログインせずにフィードバックを完了することができます。設定はホームページのフィードバックにのみ影響します。';
$string['confirmdeleteentry'] = '本当にこのエントリを削除してもよろしいですか?';
$string['confirmdeleteitem'] = '本当にこの要素を削除してもよろしいですか?';
$string['confirmdeletetemplate'] = '本当にこのテンプレートを削除してもよろしいですか?';
$string['confirmusetemplate'] = '本当にこのテンプレートを使用しますか?';
$string['continue_the_form'] = 'フォームを続ける';
$string['count_of_nums'] = '桁数';
$string['courseid'] = 'コースID';
$string['creating_templates'] = 'これらの質問を新しいテンプレートとして保存する';
$string['delete_entry'] = 'エントリを削除する';
$string['delete_item'] = '質問を削除する';
$string['delete_old_items'] = '古いアイテムを削除する';
$string['delete_template'] = 'テンプレートを削除する';
$string['delete_templates'] = 'テンプレートを削除する ...';
$string['depending'] = '依存関係';
$string['depending_help'] = '依存アイテムを使用して他のアイテムの値に依存するアイテムを表示することができます。
<br />
<strong>以下、使用例です。</strong>
<br />
 <ul>
 <li>最初に他のアイテムが値を依存することになるアイテムを作成してください。</li>
<li>次に改ページ (Page break) を追加してください。</li>
<li>そして、最初に作成したアイテムの値に依存するアイテムを追加してください。アイテム作成フォーム内の「依存アイテム」リストから依存アイテム、そして「依存値」テキストボックスに必要な値を入力してください。</li>
</ul>
<strong>構造は次のようになります:</strong>
<ol>
<li>Item Q: あなたは自動車を所有していますか? A: yes/no</li>
<li>改ページ (Page break)</li>
<li>Item Q: あなたの自動車の色は何色ですか?
<br />
(このアイテムはアイテム1の値=yesに依存します)</li>
<li>Item Q: あなたはなぜ自動車を所有していないのですか?
<br />
 (このアイテムはアイテム1の値=noに依存します)</li>
 <li>
 ... 他のアイテム</li>
</ol>';
$string['dependitem'] = 'アイテムに依存する';
$string['dependvalue'] = '値に依存する';
$string['description'] = '説明';
$string['do_not_analyse_empty_submits'] = '空の送信を分析しない';
$string['dropdown'] = '多肢選択 - 単一回答 (ドロップダウンリスト)';
$string['dropdownlist'] = '多肢選択 - 単一回答 (ドロップダウン)';
$string['dropdownrated'] = 'ドロップダウンリスト (評定)';
$string['dropdown_values'] = '回答';
$string['drop_feedback'] = 'このコースから削除する';
$string['edit_item'] = '質問を編集する';
$string['edit_items'] = '質問を編集する ...';
$string['emailnotification'] = '通知メールを送信する';
$string['email_notification'] = '送信通知を有効にする';
$string['emailnotification_help'] = '有効にした場合、フィードバックの送信に関して教師宛にメール通知されます。';
$string['emailteachermail'] = '{$a->username} がフィードバック「 {$a->feedback} 」を完了しました。

下記ページにて内容を閲覧できます:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} がフィードバック「 {$a->feedback} 」を完了しました。<br /><br />
<a href="{$a->url}">このページ</a>で詳細を閲覧できます。';
$string['entries_saved'] = 'あなたの回答が保存されました。ありがとうございます。';
$string['export_questions'] = '質問をエクスポートする';
$string['export_to_excel'] = 'Excelにエクスポートする';
$string['feedback:addinstance'] = '新しいフィードバックを追加する';
$string['feedbackclose'] = 'フィードバック終了日時';
$string['feedbackcloses'] = 'フィードバック終了日時';
$string['feedback:complete'] = 'フィードバックを終了する';
$string['feedback:createprivatetemplate'] = 'プライベートテンプレートを作成する';
$string['feedback:createpublictemplate'] = 'パブリックテンプレートを作成する';
$string['feedback:deletesubmissions'] = '完了した送信を削除する';
$string['feedback:deletetemplate'] = 'テンプレートを削除する';
$string['feedback:edititems'] = 'アイテムを編集する';
$string['feedback_is_not_for_anonymous'] = '匿名ユーザは、フィードバックを利用できません。';
$string['feedback_is_not_open'] = 'フィードバックは利用できません。';
$string['feedback:mapcourse'] = 'コースをグローバルフィードバックにマップする';
$string['feedbackopen'] = 'フィードバック開始日時';
$string['feedbackopens'] = 'フィードバック開始日時';
$string['feedback_options'] = 'フィードバックオプション';
$string['feedback:receivemail'] = 'メール通知を受信する';
$string['feedback:view'] = 'フィードバックを表示する';
$string['feedback:viewanalysepage'] = '回答送信後、分析ページを表示する';
$string['feedback:viewreports'] = 'レポートを表示する';
$string['file'] = 'ファイル';
$string['filter_by_course'] = 'コースでフィルタする';
$string['handling_error'] = 'フィードバック処理中にエラーが発生しました。';
$string['hide_no_select_option'] = '「未選択」オプションを隠す';
$string['horizontal'] = '水平';
$string['importfromthisfile'] = 'このファイルからインポートする';
$string['import_questions'] = '質問をインポートする';
$string['import_successfully'] = '正常にインポートされました。';
$string['info'] = '情報';
$string['infotype'] = '情報タイプ';
$string['insufficient_responses'] = '不十分な回答';
$string['insufficient_responses_for_this_group'] = 'このグループの回答数は、十分ではありません。';
$string['insufficient_responses_help'] = 'このグループの回答が不足しています。

フィードバックを匿名にするには、最低2つの回答が必要です。';
$string['item_label'] = 'ラベル';
$string['item_name'] = '質問';
$string['items_are_required'] = 'アスタリスクが付けられた質問は必須回答です。';
$string['label'] = 'ラベル';
$string['line_values'] = '評定';
$string['mapcourse'] = 'コースにフィードバックをマップする';
$string['mapcourse_help'] = 'デフォルトでは、あなたのMoodleメインページで作成したフィードバックフォームはサイト全体およびすべてのコースにフィードバックブロックを設置することで利用することができます。あなたはフィードバックをスティッキーブロックにすることで、強制的に表示することもできます。また、特定のコースにマッピングすることで、フィードバックフォームが表示されるコースを制限することもできます。';
$string['mapcourseinfo'] = 'このフィードバックはフィードバックブロックを使用してサイト全体で利用することができます。フィードバックをコースにマップすることにより、このフィードバックを利用できるコースを制限することができます。コースを検索して、このフィードバックをマップしてください。';
$string['mapcoursenone'] = 'マップされたコースはありません。このフィードバックは、すべてのコースで利用できます。';
$string['mapcourses'] = 'フィードバックをコースにマップする';
$string['mapcourses_help'] = 'あなたの検索結果からコースを選択した後、コースにマップすることで、選択したコースとこのフィードバックを関連付けることができます。Ctrlキーを押しながら複数のコースを選択することも、Shiftキーを押しながら一連のコースを選択することもできます。コースに関連付けたフィードバックはいつでも関連付けを解除することができます。';
$string['mappedcourses'] = 'マップ済みコース';
$string['max_args_exceeded'] = '最大6つの引数を処理することができます。引数が多すぎます:';
$string['maximal'] = '最大';
$string['messageprovider:message'] = 'フィードバックリマインダ';
$string['messageprovider:submission'] = 'フィードバック通知';
$string['mode'] = 'モード';
$string['modulename'] = 'フィードバック';
$string['modulename_help'] = 'フィードバック活動モジュールにおいて、教師は多肢選択、○/×またはテキスト入力を含む様々な質問タイプを使用して参加者からフィードバックを収集することのできる独自調査を作成することができます。

必要であれば、フィードバック回等を匿名にすることができます。そして、結果を学生すべてに表示、または教師のみに閲覧制限することができます。サイトフロントページのフィードバックは非ログインユーザにより入力させることもできます。

フィードバック活動は下記のように使用することができます:

* 今後の参加者へのコンテンツ改善のためのコース評価として
* 参加者がコースモジュール、イベント等に参加できるようにするため
* コース選択、学校方針等のゲスト調査として
* 学生が内容を匿名で報告できるイジメ対策として';
$string['modulenameplural'] = 'フィードバック';
$string['movedown_item'] = 'この質問を下げる';
$string['move_here'] = 'ここに移動する';
$string['move_item'] = 'この質問を移動する';
$string['moveup_item'] = 'この質問を上げる';
$string['multichoice'] = '多肢選択';
$string['multichoicerated'] = '多肢選択 (評定)';
$string['multichoicetype'] = '多肢選択タイプ';
$string['multichoice_values'] = '多肢選択値';
$string['multiplesubmit'] = '複数回答';
$string['multiple_submit'] = '複数回答';
$string['multiplesubmit_help'] = '匿名調査に有効にした場合、ユーザは無制限でフィードバックを送信することができます。';
$string['name'] = '名称';
$string['name_required'] = '名称を入力してください。';
$string['next_page'] = '次のページ';
$string['no_handler'] = 'アクションハンドラがありません:';
$string['no_itemlabel'] = 'ラベルなし';
$string['no_itemname'] = '無題';
$string['no_items_available_yet'] = '質問はまだ設定されていません。';
$string['non_anonymous'] = 'ユーザ名を記録し、回答とともに表示する';
$string['non_anonymous_entries'] = '非匿名エントリ';
$string['non_respondents_students'] = '未回答の学生';
$string['notavailable'] = 'このフィードバックは、利用できません。';
$string['not_completed_yet'] = 'まだ完了していません。';
$string['no_templates_available_yet'] = 'テンプレートはまだ利用できません。';
$string['not_selected'] = '未選択';
$string['not_started'] = '未開始';
$string['numeric'] = '数値回答';
$string['numeric_range_from'] = '開始数値';
$string['numeric_range_to'] = '終了数値';
$string['of'] = '/';
$string['oldvaluespreserved'] = 'すべての古い問題および割り当てられた値は保持されます';
$string['oldvalueswillbedeleted'] = '現在の問題およびすべてのユーザ回答が削除されます';
$string['only_one_captcha_allowed'] = '1フィードバックあたり、1つのCAPTCHAのみ許可されています。';
$string['overview'] = '概要';
$string['page'] = 'ページ';
$string['page_after_submit'] = '回答送信後のページ';
$string['pagebreak'] = 'ページブレーク';
$string['page-mod-feedback-x'] = 'すべてのフィードバックモジュールページ';
$string['parameters_missing'] = 'パラメータが入力されていません:';
$string['picture'] = '画像';
$string['picture_file_list'] = '画像一覧';
$string['picture_values'] = '一覧より１つまたはそれ以上の<br />画像を選択してください:';
$string['pluginadministration'] = 'フィードバック管理';
$string['pluginname'] = 'フィードバック';
$string['position'] = 'ポジション';
$string['preview'] = 'プレビュー';
$string['preview_help'] = 'このプレビューにて、あなたは質問の順番を変更することができます。';
$string['previous_page'] = '前のページ';
$string['public'] = '公開';
$string['question'] = '質問';
$string['questions'] = '質問';
$string['radio'] = '多肢選択 - 単一回答';
$string['radiobutton'] = '多肢選択 - 単一回答 (ラジオボタン)';
$string['radiobutton_rated'] = 'ラジオボタン (評定)';
$string['radiorated'] = 'ラジオボタン (評定)';
$string['radio_values'] = '回答';
$string['ready_feedbacks'] = '準備済みフィードバック';
$string['relateditemsdeleted'] = 'この問題に関する、すべてのユーザの回答も削除されます。';
$string['required'] = '必須';
$string['resetting_data'] = 'フィードバックをリセットする';
$string['resetting_feedbacks'] = 'フィードバックのリセット';
$string['response_nr'] = '回答No';
$string['responses'] = '回答';
$string['responsetime'] = '回答時間';
$string['save_as_new_item'] = '新しい質問として保存する';
$string['save_as_new_template'] = '新しいテンプレートとして保存する';
$string['save_entries'] = 'あなたの回答を送信する';
$string['save_item'] = '質問を保存する';
$string['saving_failed'] = '保存に失敗しました。';
$string['saving_failed_because_missing_or_false_values'] = '値が入力されていないか、正しくないため、保存に失敗しました。';
$string['search_course'] = 'コースを検索する';
$string['searchcourses'] = 'コースを検索する';
$string['searchcourses_help'] = 'あなたがこのフィードバックに関連付けたいコースのコードまたは名称を使用して検索してください。';
$string['selected_dump'] = '選択された$SESSION変数のインデックスは、以下にダンプされます:';
$string['send'] = '送信';
$string['send_message'] = 'メッセージを送信する';
$string['separator_decimal'] = '.';
$string['separator_thousand'] = ',';
$string['show_all'] = 'すべてを表示する';
$string['show_analysepage_after_submit'] = '回答送信後、分析ページを表示する';
$string['show_entries'] = '回答を表示する';
$string['show_entry'] = '回答を表示する';
$string['show_nonrespondents'] = '未回答者を表示する';
$string['site_after_submit'] = '回答送信後のサイト';
$string['sort_by_course'] = 'コース名で並べ替える';
$string['start'] = '開始';
$string['started'] = '開始済み';
$string['stop'] = '終了';
$string['subject'] = '件名';
$string['switch_group'] = 'グループを切り替える';
$string['switch_item_to_not_required'] = '必須回答を解除する';
$string['switch_item_to_required'] = '必須回答にする';
$string['template'] = 'テンプレート';
$string['templates'] = 'テンプレート';
$string['template_saved'] = 'テンプレートが保存されました。';
$string['textarea'] = '長文回答';
$string['textarea_height'] = '行数';
$string['textarea_width'] = '幅';
$string['textfield'] = '短文回答';
$string['textfield_maxlength'] = '最大文字数';
$string['textfield_size'] = 'テキストフィールド幅';
$string['there_are_no_settings_for_recaptcha'] = 'CAPTCHAが設定されていません。';
$string['this_feedback_is_already_submitted'] = 'あなたは、すでにこのフィードバックを完了しています。';
$string['timeclose'] = '終了日時';
$string['timeclose_help'] = 'あなたはユーザが質問回答のためフィードバックにアクセスできないようになる日時を指定することができます。チェックボックスがチェックされない場合、制限は定義されません。';
$string['timeopen'] = '開始日時';
$string['timeopen_help'] = 'あなたはユーザが質問回答のためフィードバックにアクセスできるようになる日時を指定することができます。チェックボックスがチェックされない場合、制限は定義されません。';
$string['typemissing'] = '「type」の値がありません。';
$string['update_item'] = '質問の変更を保存する';
$string['url_for_continue'] = '「続ける」ボタンのURI';
$string['url_for_continue_button'] = '「続ける」ボタンのURI';
$string['url_for_continue_help'] = 'デフォルトでは「続ける」ボタンを使用してフィードバックを送信した後、コースページに戻ります。あなたは「続ける」ボタンをクリックした後に移動する別のページのURIを指定することができます。';
$string['use_one_line_for_each_value'] = '<br />1行に1つの回答を入力してください!';
$string['use_this_template'] = 'このテンプレートを使用する';
$string['using_templates'] = 'テンプレートの使用';
$string['vertical'] = '垂直';
$string['viewcompleted'] = '完了済みフィードバック';
$string['viewcompleted_help'] = 'あなたはコースまたは質問により検索可能な完了済みフィードバックフォームを閲覧することができます。フィードバックの回答はExcelにエクスポートすることができます。';
