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
 * Strings for component 'assignment', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'あなたには注意が必要な課題があります。';
$string['addsubmission'] = '課題を追加する';
$string['allowdeleting'] = '削除を許可する';
$string['allowdeleting_help'] = '有効にした場合、評定のため課題を送信する前に参加者はいつでもアップロードファイルを削除することができます。';
$string['allowmaxfiles'] = 'アップロードファイルの最大数';
$string['allowmaxfiles_help'] = 'それぞれの参加者がアップロードできるファイルの最大数です。この数はどこにも表示されないため、実際の必須提出ファイル数を課題説明での記載をお勧めします。';
$string['allownotes'] = 'メモを許可する';
$string['allownotes_help'] = '有効にした場合、学生はオンラインテキスト課題のようにテキストエリアにメモを入力することができます。';
$string['allowresubmit'] = '課題の再提出を許可する';
$string['allowresubmit_help'] = '有効にした場合、課題評定後、再評定のために学生が課題を再提出できるようになります。';
$string['alreadygraded'] = 'あなたの提出課題は、すでに評定されています。課題を再提出することはできません。';
$string['assignment:addinstance'] = '新しい課題を追加する';
$string['assignmentdetails'] = '課題の詳細';
$string['assignment:exportownsubmission'] = '自分の提出課題をエクスポートする';
$string['assignment:exportsubmission'] = '提出課題をエクスポートする';
$string['assignment:grade'] = '課題を評定する';
$string['assignmentmail'] = '{$a->teacher} があなたの提出課題「 {$a->assignment} 」に関するフィードバックを投稿しました。

あなたの提出課題に追加されたフィードバックを閲覧することができます:

{$a->url}';
$string['assignmentmailhtml'] = '{$a->teacher} があなたの提出課題「 {$a->assignment} 」 に関するフィードバックを投稿しました。<br /><br />あなたの<a href="{$a->url}">提出課題</a>に追加されたフィードバックを閲覧することができます。';
$string['assignmentmailsmall'] = 'あなたが「 {$a->assignment} 」に提出した課題に {$a->teacher} がフィードバックを投稿しました。あなたの提出課題に付加されたコメントを閲覧することができます。';
$string['assignmentname'] = '課題名';
$string['assignmentsubmission'] = '提出課題';
$string['assignment:submit'] = '課題を提出する';
$string['assignmenttype'] = '課題タイプ';
$string['assignment:view'] = '課題を表示する';
$string['availabledate'] = '開始日時';
$string['cannotdeletefiles'] = 'エラーが発生したため、ファイルを削除できませんでした。';
$string['cannotviewassignment'] = 'あなたは、この課題を閲覧できません。';
$string['changegradewarning'] = 'この課題は評定済みであり、評点を変更することにより、既存の提出が自動的に再計算されることはありません。評点を変更したい場合、あなたは既存のすべての提出を再評定する必要があります。';
$string['closedassignment'] = '提出期限を経過したため、この課題は終了しました。';
$string['comment'] = 'コメント';
$string['commentinline'] = 'インラインコメント';
$string['commentinline_help'] = '有効にした場合、評定時にオリジナルの提出課題がフィードバック用コメントフィールドにコピーされます。これによりインラインでコメントを (恐らく違う色を使って) 書き込んだり、オリジナルのテキストを編集しやすくなります。';
$string['configitemstocount'] = 'オンライン課題における学生の提出課題カウントに使用する単位です。';
$string['configmaxbytes'] = 'すべての課題に関するデフォルト最大サイズです (コース制限および他のローカル設定に従います)。';
$string['configshowrecentsubmissions'] = 'すべてのユーザが課題提出の通知を「最近の活動」レポートで閲覧できます。';
$string['confirmdeletefile'] = '本当にこのファイルを完全に削除してもよろしいですか?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'コースの設定が正しくありません。';
$string['currentgrade'] = '評定表内の現在の評定';
$string['deleteallsubmissions'] = 'すべての提出課題を削除する';
$string['deletefilefailed'] = 'ファイルの削除が失敗しました。';
$string['description'] = '課題説明';
$string['downloadall'] = 'すべての提出課題をZIPファイルとしてダウンロードする';
$string['draft'] = '下書き';
$string['due'] = '課題提出期限';
$string['duedate'] = '終了日時';
$string['duedateno'] = '提出期限なし';
$string['early'] = '{$a} 早く提出';
$string['editmysubmission'] = '私の提出を編集する';
$string['editthesefiles'] = 'これらのファイルを編集する';
$string['editthisfile'] = 'このファイルを更新する';
$string['emailstudents'] = '学生にメール通知する';
$string['emailteachermail'] = '{$a->username} が「 {$a->assignment} 」の提出課題を更新しました (更新日時: {$a->timeupdated} )。

以下にて閲覧可能です:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} が「 {$a->assignment} 」の提出課題を更新しました (更新日時: {$a->timeupdated} )。<br /><br />
<a href="{$a->url}">ウェブサイトにて閲覧可能です</a>。';
$string['emailteachers'] = '教師にメール通知する';
$string['emailteachers_help'] = '有効にした場合、学生が課題を提出または更新するといつでも短い通知メールが教師に送信されます。

通知メールは、提出課題を評定できる教師のみに送信されます。例えば、コースが分離グループを使用する場合、特定のグループに制限されている教師は、他のグループの学生に関する通知メールを受け取りません。';
$string['emptysubmission'] = 'あなたはまだ何も提出していません。';
$string['enablenotification'] = '通知メールを送信する';
$string['enablenotification_help'] = '<p>あなたがこの設定を有効にした場合、評定およびフィードバックの更新が学生にメール通知されます。</p>

<p>あなたの個人設定は保存され、あなたが評定するすべての提出課題に適用されます。</p>';
$string['errornosubmissions'] = 'ダウンロード可能な提出はありません。';
$string['existingfiledeleted'] = '登録済みファイルが削除されました: {$a}';
$string['failedupdatefeedback'] = 'ユーザ {$a} のフィードバック更新に失敗しました';
$string['feedback'] = 'フィードバック';
$string['feedbackfromteacher'] = '{$a} のフィードバック';
$string['feedbackupdated'] = '{$a} の参加者に対するフィードバックの更新';
$string['finalize'] = '提出課題の更新を防ぐ';
$string['finalizeerror'] = 'エラーが発生したため、課題の提出を終了することができませんでした。';
$string['futureaassignment'] = 'この課題はまだ利用できません。';
$string['graded'] = '評定済み';
$string['guestnosubmit'] = '申し訳ございません、ゲストは課題を提出できません。課題を提出するには、あなたはログインまたはユーザ登録する必要があります。';
$string['guestnoupload'] = '申し訳ございません、ゲストはアップロードできません。';
$string['helpoffline'] = '<p>このタイプの課題は、Moodleの外で実施される課題に関して有用です。これは、ウェブサイト上での課題または対面により課される課題を考えることができます。</p>
<p>学生は課題説明を読むことはできますが、ファイル等をアップロードすることはできません。評定は通常どおり動作し、評定に関する通知メールが学生宛に送信されます。</p>';
$string['helponline'] = '<p>このタイプの課題では、参加者に通常の編集ツールを使用したテキスト編集を求めます。教師はオンラインでこれらを評定でき、インラインコメントを追加および変更することもできます。</p>
<p>(あなたが古いバージョンのMoodleに慣れているのでしたら、このタイプの課題は古い日誌モジュールと同じように動作すると考えてください。)</p>';
$string['helpupload'] = '<p>このタイプの課題では各参加者が1つまたは複数のあらゆる種類のファイルをアップロードすることができます。ワードプロセッサ文書、イメージ、ZIP圧縮したウェブサイト、その他あなたが参加者に提出するよう求めたファイルです。</p>
<p>このタイプの課題ではあなたが複数のレスポンスファイルをアップロードすることもできます。課題提出前にレスポンスファイルをアップロードして、各参加者に異なるファイルを提供することもできます。</p>
<p>参加者は提出したファイルに関して、進捗状況または他のテキスト情報を説明するメモを記述することができます。</p>
<p>このタイプの課題は参加者により手動提出される必要があります。あなたは現在の状況をいつでもレビューでき、未完成の課題には「下書き」と表示されます。あなたは評定が終わっていない課題を「下書き」状態に戻すことができます。</p>';
$string['helpuploadsingle'] = '<p>このタイプの課題では各参加者があらゆるタイプの単一ファイルをアップロードすることができます。</p> <p>ワードプロセッサ文書、イメージ、ZIP圧縮したウェブサイト、その他あなたが参加者に提出するよう求めたファイルです。</p>';
$string['hideintro'] = '開始日時前に課題説明を隠す';
$string['hideintro_help'] = '有効にした場合、開始日時前に課題説明が隠されます。課題名のみが表示されます。';
$string['invalidassignment'] = '課題が正しくありません。';
$string['invalidfileandsubmissionid'] = 'ファイルまたは送信IDがありません。';
$string['invalidid'] = '課題IDが正しくありません。';
$string['invalidsubmissionid'] = '送信IDが正しくありません。';
$string['invalidtype'] = '課題タイプが正しくありません。';
$string['invaliduserid'] = 'ユーザIDが正しくありません。';
$string['itemstocount'] = 'カウント';
$string['lastgrade'] = '最終評定';
$string['late'] = '{$a} 遅く提出';
$string['maximumgrade'] = '最大評価';
$string['maximumsize'] = '最大サイズ';
$string['maxpublishstate'] = '終了日時前のブログエントリに関する最大可視性';
$string['messageprovider:assignment_updates'] = '課題 (2.2) 通知';
$string['modulename'] = '課題 (2.2)';
$string['modulename_help'] = '課題では教師が評定できるオンラインまたはオフラインの課題を指示することができます。';
$string['modulenameplural'] = '課題 (2.2)';
$string['newsubmissions'] = '課題が提出されました';
$string['noassignments'] = '課題はまだありません。';
$string['noattempts'] = 'この課題はまだ提出されていません。';
$string['noblogs'] = 'あなたはブログエントリを投稿していません!';
$string['nofiles'] = 'ファイルが提出されていません。';
$string['nofilesyet'] = 'ファイルはまだ提出されていません。';
$string['nomoresubmissions'] = 'これ以上の課題提出は許可されていません。';
$string['norequiregrading'] = '評定が必要な課題はありません。';
$string['nosubmisson'] = '提出された課題はありません。';
$string['notavailableyet'] = '申し訳ございません、この課題はまだ利用できません。<br />課題のインストラクションは、下記の開始日時以降、ここに表示されます。';
$string['notes'] = 'メモ';
$string['notesempty'] = 'エントリなし';
$string['notesupdateerror'] = 'メモの更新中にエラーが発生しました。';
$string['notgradedyet'] = '未評価';
$string['notsubmittedyet'] = '未提出';
$string['onceassignmentsent'] = '評定のために課題を提出した場合、あなたはファイルを削除または添付することができないようになります。本当に続けてもよろしいですか?';
$string['operation'] = '操作';
$string['optionalsettings'] = '任意設定';
$string['overwritewarning'] = '注意: 再度アップロードすることにより、現在の提出課題が置き換えられます。';
$string['page-mod-assignment-submissions'] = '課題モジュール提出ページ';
$string['page-mod-assignment-view'] = '課題モジュールメインページ';
$string['page-mod-assignment-x'] = 'すべての課題モジュールページ';
$string['pagesize'] = '1ページあたりの提出課題数';
$string['pluginadministration'] = '課題管理';
$string['pluginname'] = '課題 (2.2)';
$string['popupinnewwindow'] = 'ポップアップウィンドウに表示する';
$string['preventlate'] = '提出期限後の課題提出を禁止する';
$string['quickgrade'] = 'クイック評定を有効にする';
$string['quickgrade_help'] = 'クイック評定を有効にした場合、1ページで複数の課題を素早く評定することができます。ページ内のすべての変更を同時に保存するには、評点とコメントを変更して画面下部にある「すべてのフィードバックを保存する」ボタンをクリックしてください。';
$string['requiregrading'] = '要評定';
$string['responsefiles'] = 'レスポンスファイル';
$string['reviewed'] = 'レビュー済み';
$string['saveallfeedback'] = 'すべてのフィードバックを保存する';
$string['selectblog'] = 'あなたが提出したいブログエントリを選択する';
$string['sendformarking'] = '評定のために送信する';
$string['showrecentsubmissions'] = '最近の課題提出を表示する';
$string['submission'] = '提出課題';
$string['submissiondraft'] = '提出課題の下書き';
$string['submissionfeedback'] = '提出課題へのフィードバック';
$string['submissions'] = '提出課題';
$string['submissionsaved'] = '変更内容が保存されました。';
$string['submissionsnotgraded'] = '{$a} 件の提出課題が評定されていません。';
$string['submitassignment'] = 'このフォームを使用して、あなたの課題を提出する';
$string['submitedformarking'] = 'すでに課題は評定のために提出されています。更新することはできません。';
$string['submitformarking'] = '課題評定のために最後の提出を送信する';
$string['submitted'] = '提出';
$string['submittedfiles'] = '提出ファイル';
$string['subplugintype_assignment'] = '課題タイプ';
$string['subplugintype_assignment_plural'] = '課題タイプ';
$string['trackdrafts'] = '「評定のために送信する」ボタンを有効にする';
$string['trackdrafts_help'] = '「評定のために送信する」ボタンにより、学生は課題への取り組みを終了したことを教師に知らせることができます。また、教師は (例えば、さらにワークが必要な場合) 提出課題を下書きに戻すことができます。';
$string['typeblog'] = 'ブログ記事';
$string['typeoffline'] = 'オフライン活動';
$string['typeonline'] = 'オンラインテキスト';
$string['typeupload'] = 'ファイルの高度なアップロード';
$string['typeuploadsingle'] = '単一ファイルのアップロード';
$string['unfinalize'] = '下書きに戻す';
$string['unfinalizeerror'] = 'エラーが発生したため、提出課題を下書きに戻すことができませんでした。';
$string['unfinalize_help'] = '下書きに戻すことにより、学生は自分の提出課題をさらに更新することができます。';
$string['upgradenotification'] = 'この活動は古い課題モジュールに基づきます。';
$string['uploadafile'] = 'ファイルをアップロードする';
$string['uploadbadname'] = 'ファイル名に不正な文字が含まれているため、このファイルをアップロードできませんでした。';
$string['uploadedfiles'] = 'ファイルをアップロードしました。';
$string['uploaderror'] = 'サーバへのファイル保存中にエラーが発生しました。';
$string['uploadfailnoupdate'] = 'ファイルはアップロードされましたが、提出課題を更新できませんでした!';
$string['uploadfiles'] = 'ファイルをアップロードする';
$string['uploadfiletoobig'] = '申し訳ございません、ファイルサイズが制限を越えています (制限は {$a} バイトです)';
$string['uploadnofilefound'] = 'ファイルが見つかりませんでした - 本当にアップロードするファイルを選択しましたか?';
$string['uploadnotregistered'] = '「 {$a} 」は正常にアップロードされましたが、提出課題は登録されませんでした!';
$string['uploadsuccess'] = '「 {$a} 」のアップロードが正常に完了しました。';
$string['usermisconf'] = 'ユーザの設定が正しくありません。';
$string['usernosubmit'] = '申し訳ございません、あなたは課題の提出を許可されていません。';
$string['viewassignmentupgradetool'] = '課題アップグレードツールを表示する';
$string['viewfeedback'] = '提出課題の評価とフィードバックを確認する';
$string['viewmysubmission'] = '私の提出課題を確認する';
$string['viewsubmissions'] = '{$a} 件の提出課題を確認する';
$string['yoursubmission'] = 'あなたの提出課題';
