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
 * Strings for component 'local_amos', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   local_amos
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about'] = '<p>AMOSは自動ストリング操作 (Automated Manipulation Of Strings) を意味します。 AMOSはMoodleストリングおよび履歴の中央リポジトリです。AMOSは英語ストリングの追加を監視して、翻訳を収集および一般的な翻訳タスクを処理した後、Moodleサーバに適用される言語パックを生成します。</p>

<p>詳細は<a href="http://docs.moodle.org/en/AMOS">AMOS ドキュメンテーション</a> をご覧ください。</p>';
$string['amos'] = 'AMOS - Moodle翻訳ツール';
$string['amos:commit'] = 'ステージストリングをメインリポジトリにコミットする';
$string['amos:importfile'] = 'アップロードファイルよりストリングをインポートする';
$string['amos:manage'] = 'AMOSポータルを管理する';
$string['amos:stage'] = 'AMOS翻訳ツールを使用して、ストリングをステージする';
$string['amos:stash'] = '現在のステージを永続スタッシュに保存する';
$string['commitstage'] = 'ステージストリングをコミットする';
$string['commitstage_help'] = 'すべてのステージ内翻訳をAMOSリポジトリに完全に保存します。ステージは自動的に消去され、コミットの前にリベースされます。コミット可能なストリングのみ保存されます。これは下記の緑色にハイライトされた翻訳のみが保存されることを意味します。コミット後、ステージはクリアされます。';
$string['committableall'] = 'すべての言語';
$string['committablenone'] = '許可された言語はありません - AMOS管理者にご連絡ください。';
$string['componentsall'] = 'すべて';
$string['componentsnone'] = 'なし';
$string['componentsstandard'] = 'スタンダード';
$string['confirmaction'] = 'この処理は元に戻すことができません。本当によろしいですか?';
$string['contribaccept'] = '承認';
$string['contribactions'] = '翻訳投稿操作';
$string['contribactions_help'] = 'あなたの権限および投稿ワークフローにより、以下の処理を実行することができます。:

* 適用 - 投稿された翻訳をあなたのステージにコピーします。投稿レコードは修正しません。
* 私に割り当てる - あなた自身を、投稿レビューおよび統合に責任を持つ投稿受託者に設定します。
* 放棄 - 誰も投稿受託者に割り当てません。
* レビューを開始する - 新しい投稿をあなた自身に割り当て、ステータスを「レビュー」にした後、送信された翻訳をあなたのステージにコピーします。
* 承認- 投稿を承認します。
* 拒否 - 投稿を拒否します。コメント欄に理由を記載してください。

投稿のステータスが変更された場合、投稿者にEメール通知されます。';
$string['contribapply'] = '適用';
$string['contribassignee'] = '受託者';
$string['contribassigneenone'] = '-';
$string['contribassigntome'] = '私に割り当てる';
$string['contribauthor'] = '作成者';
$string['contribclosedno'] = '承認された投稿を隠す';
$string['contribclosedyes'] = '承認された投稿を表示する';
$string['contribcomponents'] = 'コンポーネント';
$string['contribid'] = 'ID';
$string['contribincomingnone'] = '新しい投稿はありません。';
$string['contribincomingsome'] = '新しい投稿 ({$a})';
$string['contriblanguage'] = '言語';
$string['contribreject'] = '拒否';
$string['contribresign'] = '破棄';
$string['contribstartreview'] = 'レビューを開始する';
$string['contribstatus'] = 'ステータス';
$string['contribstatus0'] = '新しい投稿';
$string['contribstatus10'] = 'レビュー中';
$string['contribstatus20'] = '拒否';
$string['contribstatus30'] = '承認';
$string['contribstatus_help'] = '翻訳投稿のワークフローは以下のステータスを含みます:

* 新しい- 投稿が送信されましたが、まだレビューされていません。
* レビュー中 - 投稿が言語パック保守者に割り当てられ、レビューのためステージされました。
* 拒否 - 言語パック保守者が投稿を拒否しました。恐らく、コメント欄に拒否理由が記載されます。
* 承認 - 投稿が言語パック保守者により承認されました。';
$string['contribstrings'] = 'ストリング';
$string['contribstringseq'] = '{$a->orig} 新しい投稿';
$string['contribstringsnone'] = '{$a->orig} (これらすべては言語パック内で翻訳済み)';
$string['contribstringssome'] = '	
{$a->orig} ({$a->same} には、すでに最新の翻訳があります)';
$string['contribsubject'] = '件名';
$string['contribsubmittednone'] = '送信された投稿はありません。';
$string['contribsubmittedsome'] = 'あなたの投稿 ({$a})';
$string['contribtimemodified'] = '修正';
$string['contributions'] = '投稿';
$string['emailacceptbody'] = '言語パック保守者 {$a->assignee} があなたの翻訳投稿 #{$a->id} {$a->subject} を承認しました。

詳細は {$a->url} をご覧ください。';
$string['emailacceptsubject'] = '[AMOS投稿] 受領';
$string['emailcontributionbody'] = 'ユーザ {$a->author} が新しい翻訳を送信しました #{$a->id} {$a->subject}.

詳細は {$a->url} をご覧ください。';
$string['emailcontributionsubject'] = '[AMOS投稿] 新しい翻訳が送信されました。';
$string['emailrejectbody'] = '言語パック保守者 {$a->assignee} があなたの翻訳投稿 #{$a->id} {$a->subject} を拒否しました。

詳細は {$a->url} をご覧ください。';
$string['emailrejectsubject'] = '[AMOS投稿] 拒否';
$string['emailreviewbody'] = '言語パック保守者 {$a->assignee} があなたの翻訳投稿 #{$a->id} {$a->subject} のレビューを開始しました。';
$string['emailreviewsubject'] = '[AMOS投稿] レビュー開始';
$string['err_exception'] = 'エラー: {$a}';
$string['err_invalidlangcode'] = '無効なエラーコード';
$string['err_parser'] = '構文解析エラー: {$a}';
$string['filtercmp'] = 'コンポーネント';
$string['filtercmp_desc'] = 'これらのコンポーネントのストリングを表示する';
$string['filterlng'] = '言語';
$string['filterlng_desc'] = 'これらの言語の翻訳を表示する';
$string['filtermis'] = 'その他';
$string['filtermis_desc'] = '表示するストリングの付加条件';
$string['filtermisfglo'] = '灰色表示のストリングのみ';
$string['filtermisfhlp'] = 'ヘルプストリングのみ';
$string['filtermisfmis'] = '未翻訳および旧ストリングのみ';
$string['filtermisfstg'] = 'ステージストリングのみ';
$string['filtermisfwog'] = '灰色表示のストリングを除く';
$string['filtersid'] = 'ストリングID';
$string['filtersid_desc'] = 'ストリング配列内のキー';
$string['filtertxt'] = 'サブストリング';
$string['filtertxtcasesensitive'] = '大文字・小文字を区別する';
$string['filtertxt_desc'] = 'ストリングにはテキストを含む必要があります。';
$string['filtertxtregex'] = 'regex';
$string['filterver'] = 'バージョン';
$string['filterver_desc'] = 'これらのMoodleバージョンからストリングを表示する';
$string['found'] = '該当件数: {$a->found}     未翻訳: {$a->missing} ({$a->missingonpage})';
$string['foundinfo'] = '該当ストリング数';
$string['foundinfo_help'] = '翻訳テーブルの合計行数、未翻訳数および現在のページの未翻訳数を表示します。';
$string['gotofirst'] = '先頭ページへ移動する';
$string['gotoprevious'] = '前のページへ移動する';
$string['greylisted'] = '灰色ストリング';
$string['greylisted_help'] = '下位互換の理由から、使用されていないストリングも削除されないままMoodle言語パックに含まれています。これらのストリングは「灰色」にされています。確認された後、灰色のストリングは言語パックから削除されます。

あなたがMoodleで使用されている灰色ストリングを発見した場合、このサイトのMoodle翻訳コースにて私たちに報告してください。そうでない場合、Moodleで使用されているストリングを優先して翻訳して、灰色ストリングを無視することにより、あなたの貴重な時間を節約することができます。';
$string['greylistedwarning'] = 'ストリングは灰色にされています。';
$string['importfile'] = 'ファイルから翻訳ストリングをインポートする';
$string['importfile_help'] = 'あなたがストリングをオフラインで翻訳している場合、このフォームを経由してステージすることができます。

* ファイルは有効なMoodle PHPストリング定義ファイルである必要があります。例えば、あなたのMoodleインストレーション内の「/lang/en/」ディレクトリをご覧ください。
* ファイル名はコンポーネントの英語ストリング定義に  (`moodle.php`, `assignment.php` または `enrol_manual.php` のように) 合致する必要があります。
ファイル内で見つかったすべてのストリングは、選択されたバージョンの言語にステージされます。';
$string['language'] = '言語';
$string['languages'] = '言語';
$string['languagesall'] = 'すべて';
$string['languagesnone'] = 'なし';
$string['log'] = 'ログ';
$string['logfilterbranch'] = 'バージョン';
$string['logfiltercommithash'] = 'git hash';
$string['logfiltercommitmsg'] = 'コミットメッセージに次のテキストを含む';
$string['logfiltercommits'] = 'コミットフィルタ';
$string['logfiltercommittedafter'] = '次の日時以降';
$string['logfiltercommittedbefore'] = '次の日時以前';
$string['logfiltercomponent'] = 'コンポーネント';
$string['logfilterlang'] = '言語';
$string['logfiltershow'] = 'フィルタされたコメントおよびストリングを表示する';
$string['logfiltersource'] = 'ソース';
$string['logfiltersourceamos'] = 'amos (ウェブベース翻訳ツール)';
$string['logfiltersourcecommitscript'] = 'コミットスクリプト (コミットメッセージ内のAMOSスクリプト)';
$string['logfiltersourcegit'] = 'git (Moodleソースコードおよび1.xパックのgitミラー)';
$string['logfiltersourcerevclean'] = 'revclean (リバースクリーンアップ作業)';
$string['logfilterstringid'] = 'ストリングID';
$string['logfilterstrings'] = 'ストリングフィルタ';
$string['logfilterusergrp'] = 'コミッタ';
$string['logfilterusergrpor'] = 'または';
$string['maintainers'] = '保守者';
$string['markuptodate'] = '翻訳を最新版にする';
$string['markuptodate_help'] = '翻訳された後、英語バージョンが修正されたため、AMOSはストリングが最新版ではないと判断しました。翻訳内容をレビューしてください。あなたが翻訳内容を最新版であると確認した場合、チェックボックスをチェックしてください。そうでない場合、翻訳内容を編集してください。';
$string['merge'] = 'マージ';
$string['mergestrings'] = '他のブランチよりストリングをマージする';
$string['mergestrings_help'] = 'ここではターゲットブランチ内で使用され、まだ翻訳されていないストリングすべてを取得した後にステージします。翻訳済みストリングを他のすべてのバージョンの言語パックにコピーするため、あなたはこのツールを使用することができます。このツールは言語パック保守者のみ使用することができます。';
$string['newlanguage'] = '新しい言語';
$string['nofiletoimport'] = 'インポートするファイルを選択してください。';
$string['nologsfound'] = 'ストリングが見つかりませんでした。フィルタを修正してください。';
$string['nostringsfound'] = '該当するストリングが見つかりませんでした。';
$string['nostringsfoundonpage'] = 'ページ {$a} にはストリングが見つかりませんでした。';
$string['nostringtoimport'] = 'このファイルには有効なストリングが見つかりませんでした。ファイルが正しいファイル名であり、適切なフォーマットのデータが記述されているかどうか確認してください。';
$string['nothingtomerge'] = 'ソースブランチには、ターゲットブランチに存在しない新しいストリングが含まれていません。マージするものはありません。';
$string['numofcommitsabovelimit'] = '最新の {$a->limit} 件を使用した結果、 {$a->found} 件のコミットがコミットフィルタに合致しました。';
$string['numofcommitsunderlimit'] = 'コミットフィルタに合致する {$a->found} 件のコミットが見つかりました。';
$string['numofmatchingstrings'] = '同時に  {$a->commits} 件のコミットに関して、{$a->strings} 件の修正がストリングフィルタに合致します。';
$string['outdatednotcommitted'] = '旧ストリング';
$string['outdatednotcommitted_help'] = '翻訳された後、英語バージョンが修正されたため、AMOSはストリングが最新版ではないと判断しました。翻訳内容をレビューしてください。';
$string['outdatednotcommittedwarning'] = '旧';
$string['ownstashactions'] = 'スタッシュ操作';
$string['ownstashactions_help'] = '* 適用 - 翻訳ストリングをスタッシュからステージにコピーして、スタッシュのストリングを修正されないままにします。すでにストリングがステージにある場合、スタッシュのストリングから上書きされます。
* ポップ - 翻訳ストリングをスタッシュからステージに移動して、スタッシュをドロップします (適用およびドロップ)。
* ドロップ - スタッシュされたストリングを破棄します。
* 送信 - あなたの投稿を公式言語保守者が公式言語パックに組み込むことができるよう、スタッシュを送信するためのフォームを開きます。';
$string['ownstashes'] = 'あなたのスタッシュ';
$string['ownstashes_help'] = 'これはあなたのスタッシュすべての一覧です。';
$string['ownstashesnone'] = 'スタッシュが見つかりませんでした。';
$string['permalink'] = 'パーマリンク';
$string['placeholder'] = 'プレースホルダ';
$string['placeholder_help'] = 'プレースホルダは「{$a}」 または「{$a->something}」のようなストリング内の特別な命令文です。これらはストリングが実際に表示される時点で値と置換されます。

プレースホルダはオリジナルストリング内で記述されているとおりにコピーしてください。プレースホルダを翻訳したり、左右の配置を変えないでください。';
$string['placeholderwarning'] = 'プレースホルダを含むストリング';
$string['pluginclasscore'] = 'コアサブシステム';
$string['pluginclassnonstandard'] = '非標準プラグイン';
$string['pluginclassstandard'] = '標準プラグイン';
$string['pluginname'] = 'AMOS';
$string['presetcommitmessage'] = '翻訳投稿 #{$a->id} by {$a->author}';
$string['presetcommitmessage2'] = '欠けているストリングを {$a->source} から {$a->target} ブランチにマージしました。';
$string['privileges'] = 'あなたの権限';
$string['privilegesnone'] = 'あなたは公開情報に対して、リードオンリーのアクセス権があります。';
$string['requestactions'] = '操作';
$string['requestactions_help'] = '* 適用 - 翻訳済みストリングをプルリクエストから、あなたのステージにコピーします。すでにストリングがステージ内にある場合、スタッシュのストリングにより上書きされます。
* 非表示 - あなたに表示されないよう、プルリクエストをブロックします。';
$string['sourceversion'] = 'ソースバージョン';
$string['stage'] = 'ステージ';
$string['stageactions'] = 'ステージ操作';
$string['stageactions_help'] = '* ステージストリングを編集する - ステージ翻訳のみ表示されるよう、トランスレータフィルタ設定を変更します。
* コミット不可のストリングを削除する - あなたがコミットを許可されない翻訳すべてをアンステージします。コミットされる前、自動的にステージが削除されます。
* リベース- リポジトリ内の現在の翻訳または最新の翻訳よりも古い翻訳を修正せずに、すべての翻訳をアンステージします。コミットされる前、ステージはリベースされます。
* すべてをアンステージする - ステージをクリアします。ステージされた翻訳すべては失われます。';
$string['stageedit'] = 'ステージストリングを編集する';
$string['stagelang'] = 'Lang';
$string['stageoriginal'] = 'オリジナル';
$string['stageprune'] = 'コミットできないストリングを取り除く';
$string['stagerebase'] = 'リベース';
$string['stagestring'] = 'ストリング';
$string['stagestringsnocommit'] = '{$a->staged} 件のステージストリングがあります。';
$string['stagestringsnone'] = 'ステージストリングはありません。';
$string['stagestringssome'] = '{$a->staged} 件のステージストリングがあります。{$a->committable} 件をコミットすることができます。';
$string['stagesubmit'] = '保守者に送信する';
$string['stagetranslation'] = '翻訳';
$string['stagetranslation_help'] = 'コミットするためにステージされた翻訳を表示します。セルの背景色の意味は下記のとおりです:

* 緑 - あなたはストリングを修正したか、未翻訳の翻訳を追加しました。あなたは翻訳をコミットすることができます。
* 青 - あなたはストリングを修正したか、未翻訳の翻訳を追加しました。しかし、あなたは現在の言語へのコミットを許可されていません。
* 無色 - ステージされた翻訳が現在の翻訳と同一のため、コミットされません。';
$string['stageunstageall'] = 'すべてをアンステージする';
$string['stashactions'] = 'スタッシュ操作';
$string['stashactions_help'] = 'スタッシュは現在のステージのスナップショットです。言語パックに含むため、スタッシュを公式言語パック保守者に送信することができます。';
$string['stashapply'] = '適用';
$string['stashautosave'] = '自動的に保存されたバックアップスタッシュ';
$string['stashautosave_help'] = 'このスタッシュには、あなたのステージの最新のスナップショットを含みます。例えば、すべてのストリングがアクシデントによりアンステージされた場合、あなたはこれを使用することができます。すべてのスタッシュされたストリングをステージに戻すには、「適用」操作を使用してください (すでにステージにストリングが存在する場合、上書きされます)。';
$string['stashcomponents'] = '<span>コンポーネント:</span> {$a}';
$string['stashdrop'] = 'ドロップ';
$string['stashes'] = 'スタッシュ';
$string['stashlanguages'] = '<span>言語:</span> {$a}';
$string['stashpop'] = 'ポップ';
$string['stashpush'] = 'すべてのステージストリングを新しいスタッシュにプッシュする';
$string['stashstrings'] = '<span>ストリング数:</span> {$a}';
$string['stashsubmit'] = '保守者に送信する';
$string['stashsubmitdetails'] = '送信詳細';
$string['stashsubmitmessage'] = 'メッセージ';
$string['stashsubmitsubject'] = '件名';
$string['stashtitle'] = 'スタッシュタイトル';
$string['stashtitledefault'] = 'WIP - {$a->time}';
$string['stringhistory'] = '履歴';
$string['strings'] = 'ストリング';
$string['submitting'] = '投稿の送信';
$string['submitting_help'] = 'ここでは、翻訳ストリングを公式言語保守者に送信します。公式言語保守者はあなたの作業をステージに適用、レビュー、そして最終的にコミットすることができます。あなたの作業内容および投稿理由を記述したメッセージを提供してください。';
$string['targetversion'] = 'ターゲットバージョン';
$string['translatorlang'] = 'Lang';
$string['translatorlang_help'] = 'ストリングを翻訳するための言語コードを表示します。ストリングのタイムライン履歴を表示するには、<strong>+-</strong> リンクをクリックしてください。';
$string['translatororiginal'] = 'オリジナル';
$string['translatororiginal_help'] = 'ストリングの英語オリジナルを表示します。この下には (言語がサポートされて、あなたのブラウザのJavaスクリプトが有効にされている場合)、ストリングを自動的に翻訳することのできるGoogle Translatorが表示されます。ストリングにプレースホルダが含まれている等の補足情報も表示されます。';
$string['translatorstring'] = 'ストリング';
$string['translatorstring_help'] = 'Moodleブランチ (バージョン)、ストリングIDおよびストリングが属しているコンポーネントを表示します。 ';
$string['translatortool'] = 'トランスレータ';
$string['translatortranslation'] = '翻訳';
$string['translatortranslation_help'] = 'インプットエディタに入るには、セルをクリックしてください。翻訳内容を入力して、セルの外をクリックすることにより、翻訳をステージしてください。セルの背景色の意味は次のとおりです:

* 緑 - ストリングはすでに翻訳されています。あなたは翻訳を修正して、コミットすることができます。
* 黄色 - ストリングはコミットすることができますが、最新版ではありません。ストリングが翻訳された後、英語バージョンが修正された可能性があります。
* 赤 - ストリングは翻訳されていません。あなたはストリングを翻訳して、コミットすることができます。
* 青 - あなたは翻訳を修正して現在ステージされています。あなたがログアウトする前に忘れずにステージされた翻訳をコミットしてください!
* 無色 - 翻訳をステージすることができますが、あなたはこの言語へのコミットを許可されていません。あなたができることは、ステージをファイルにエクスポートするのみです。';
$string['typecontrib'] = '非標準プラグイン';
$string['typecore'] = 'コアサブシステム';
$string['typestandard'] = '標準プラグイン';
$string['version'] = 'バージョン';
