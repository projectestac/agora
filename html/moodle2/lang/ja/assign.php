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
 * Strings for component 'assign', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'あなたには注意が必要な課題があります。';
$string['addsubmission'] = '課題を追加する';
$string['allowsubmissions'] = 'この課題をユーザが継続して提出できるようにします。';
$string['allowsubmissionsanddescriptionfromdatesummary'] = '課題詳細および提出フォームは <strong>{$a}</strong> から利用できます。';
$string['allowsubmissionsfromdate'] = '開始日時';
$string['allowsubmissionsfromdate_help'] = '有効にした場合、学生はこの日時以前に提出することはできません。無効にした場合、学生は今すぐ提出を開始することができます。';
$string['allowsubmissionsfromdatesummary'] = 'この課題は <strong>{$a}</strong> から提出を受け付けます。';
$string['allowsubmissionsshort'] = '提出の変更を許可する';
$string['alwaysshowdescription'] = '常に課題説明を表示する';
$string['alwaysshowdescription_help'] = '無効にした場合、上記の課題説明は「開始日時」以降のみ学生に表示されます。';
$string['applytoteam'] = 'グループすべてに評定およびフィードバックを提供する';
$string['assign:addinstance'] = '新しい課題を追加する';
$string['assign:exportownsubmission'] = '自分の提出課題をエクスポートする';
$string['assignfeedback'] = 'フィードバックプラグイン';
$string['assignfeedbackpluginname'] = 'フィードバックプラグイン';
$string['assign:grade'] = '課題を評定する';
$string['assign:grantextension'] = '延長を許可する';
$string['assignmentisdue'] = '課題の提出期限が到来しました。';
$string['assignmentmail'] = 'あなたの「 {$a->assignment} 」への提出課題に対して、{$a->grader} がフィードバックを投稿しました。

あなたの提出課題に追加されたフィードバックをご覧ください:

    {$a->url}';
$string['assignmentmailhtml'] = 'あなたの「 {$a->assignment} 」への提出課題に対して、{$a->grader} がフィードバックを投稿しました。
<br />
<br />
あなたの<a href="{$a->url}">提出課題</a>に追加されたフィードバックをご覧ください。';
$string['assignmentmailsmall'] = 'あなたの「 {$a->assignment} 」への提出課題に対して、{$a->grader} がフィードバックを投稿しました。あなたの提出課題に追加されたフィードバックをご覧ください。';
$string['assignmentname'] = '課題名';
$string['assignmentplugins'] = '課題プラグイン';
$string['assignmentsperpage'] = '1ページあたりの課題数';
$string['assign:revealidentities'] = '学生の個人情報を公開する';
$string['assignsubmission'] = '提出プラグイン';
$string['assignsubmissionpluginname'] = '提出プラグイン';
$string['assign:submit'] = '課題を提出する';
$string['assign:view'] = '課題を表示する';
$string['availability'] = '利用';
$string['backtoassignment'] = '課題に戻る';
$string['batchoperationconfirmgrantextension'] = '選択されたすべての提出に対して延長を許可しますか?';
$string['batchoperationconfirmlock'] = '選択された提出すべてをロックしますか?';
$string['batchoperationconfirmreverttodraft'] = '選択された提出を下書きに戻しますか?';
$string['batchoperationconfirmunlock'] = '選択された提出すべてをロック解除しますか?';
$string['batchoperationlock'] = '提出をロックする';
$string['batchoperationreverttodraft'] = '提出を下書きに戻す';
$string['batchoperationsdescription'] = '選択した行に対して ...';
$string['batchoperationunlock'] = '提出をロック解除する';
$string['blindmarking'] = 'ブラインド評定';
$string['blindmarking_help'] = 'ブラインド評定は評定者に対して学生の個人情報を隠します。この課題に関して提出または評定された場合、ブラインド評定設定がロックされます。';
$string['changegradewarning'] = 'この課題は評定済みであり、評点を変更することにより、既存の提出が自動的に再計算されることはありません。評点を変更したい場合、あなたは既存のすべての提出を再評定する必要があります。';
$string['choosegradingaction'] = '評定操作';
$string['chooseoperation'] = '処理を選択する';
$string['comment'] = 'コメント';
$string['completionsubmit'] = '完了するため、学生はこの活動を送信する必要があります。';
$string['configshowrecentsubmissions'] = 'すべてのユーザが課題提出の通知を「最近の活動」レポートで閲覧できます。';
$string['confirmbatchgradingoperation'] = '本当に {$a->count} 名の学生に {$a->operation} してもよろしいですか?';
$string['confirmsubmission'] = '本当にあなたの作業を評定のために提出してもよろしいですか? これ以上、あなたは変更できないようになります。';
$string['conversionexception'] = '課題をコンバートできませんでした。除外: {$a}.';
$string['couldnotconvertgrade'] = 'ユーザ {$a} の課題評点をコンバートできませんでした。';
$string['couldnotconvertsubmission'] = 'ユーザ {$a} の提出課題をコンバートできませんでした。';
$string['couldnotcreatecoursemodule'] = 'コースモジュールを作成できませんでした。';
$string['couldnotcreatenewassignmentinstance'] = '新しい課題インスタンスを作成できませんでした。';
$string['couldnotfindassignmenttoupgrade'] = 'アップグレードする古い課題インスタンスを見つけることができませんでした。';
$string['currentgrade'] = '評定表内の現在の評定';
$string['cutoffdate'] = '遮断日時';
$string['cutoffdatefromdatevalidation'] = '遮断日時は開始日時の後に設定する必要があります。';
$string['cutoffdate_help'] = '設定した場合、この日時以降、延長なしでは提出を受け付けません。';
$string['cutoffdatevalidation'] = '遮断日時は終了日時の前に設定することはできません。';
$string['defaultplugins'] = 'デフォルト課題設定';
$string['defaultplugins_help'] = 'これらの設定は新しい課題すべてのデフォルトを設定します。';
$string['defaultteam'] = 'デフォルトグループ';
$string['deleteallsubmissions'] = 'すべての提出を削除する';
$string['deletepluginareyousure'] = '本当にプラグイン {$a} を削除してもよろしいですか?';
$string['deletepluginareyousuremessage'] = 'あなたは課題プラグイン「 {$a} 」を完全に削除しようとしています。これにより、この課題プラグインに関連するデータベース内すべてのデータが完全削除されます。本当に続けてもよろしいですか?';
$string['deletingplugin'] = 'プラグイン {$a}.の削除';
$string['description'] = '課題説明';
$string['downloadall'] = 'すべての提出をダウンロードする';
$string['duedate'] = '終了日時';
$string['duedate_help'] = 'これは課題の提出期限です。提出遅延が許可された場合、この日時以降に提出された課題は提出遅延とマークされます。特定日時以降の提出を避けるには、課題遮断日時を設定してください。';
$string['duedateno'] = '提出期限なし';
$string['duedatereached'] = 'この課題の提出期限を過ぎました。';
$string['duedatevalidation'] = '終了日は開始日以降に設定する必要があります。';
$string['editaction'] = '操作 ...';
$string['editingstatus'] = '編集ステータス';
$string['editsubmission'] = '私の提出を編集する';
$string['enabled'] = '有効';
$string['errornosubmissions'] = 'ダウンロード可能な提出はありません。';
$string['errorquickgradingvsadvancedgrading'] = '現在、この課題は高度な評定を使用しているため、評点は保存されませんでした。';
$string['errorrecordmodified'] = 'あなたによるページの表示以降、他のユーザが1つまたはそれ以上のレコードを修正したため、評点は保存されませんでした。';
$string['extensionduedate'] = '延長提出期限';
$string['extensionnotafterduedate'] = '延長日時は終了日時の後に設定する必要があります。';
$string['extensionnotafterfromdate'] = '延長日時は開始日時の後に設定する必要があります。';
$string['feedback'] = 'フィードバック';
$string['feedbackavailablehtml'] = 'あなたの「 {$a->assignment} 」への提出課題に対して、{$a->username} がフィードバックを投稿しました。
<br />
<br />
あなたの<a href="{$a->url}">提出課題</a>に追加されたフィードバックをご覧ください。';
$string['feedbackavailablesmall'] = '{$a->username} に課題「 {$a->assignment} 」のフィードバックが投稿されました。';
$string['feedbackavailabletext'] = 'あなたの「 {$a->assignment} 」への提出課題に対して、{$a->username} がフィードバックを投稿しました。

あなたの提出課題に追加されたフィードバックをご覧ください:

    {$a->url}';
$string['feedbackplugin'] = 'フィードバックプラグイン';
$string['feedbackpluginforgradebook'] = '評定表にコメントを送信するフィードバックプラグイン';
$string['feedbackpluginforgradebook_help'] = '1つの課題フィードバックプラグインのみ、評定表にフィードバックをプッシュすることができます。';
$string['feedbackplugins'] = 'フィードバックプラグイン';
$string['feedbacksettings'] = 'フィードバック設定';
$string['filesubmissions'] = 'ファイル提出';
$string['filter'] = 'フィルタ';
$string['filternone'] = 'フィルタなし';
$string['filterrequiregrading'] = '要評定';
$string['filtersubmitted'] = '提出';
$string['gradeabovemaximum'] = '評点は {$a} 以下になる必要があります。';
$string['gradebelowzero'] = '評点はゼロまたはゼロより大きな値である必要があります。';
$string['graded'] = '評定済み';
$string['gradedby'] = '評定者';
$string['gradedon'] = '評定日時';
$string['gradelocked'] = 'この評点はロックされているか、評定表内で上書きされています。';
$string['gradeoutof'] = '{$a} 点中の評点';
$string['gradeoutofhelp'] = '評定';
$string['gradeoutofhelp_help'] = 'ここで学生の提出に関する評点を入力してください。あなたは小数点を含むことができます。';
$string['gradersubmissionupdatedhtml'] = '{$a->username} が「 {$a->assignment} 」の提出課題を更新しました (更新日時: {$a->timeupdated} )。<br /><br />
<a href="{$a->url}">ウェブサイトにて閲覧可能です</a>。';
$string['gradersubmissionupdatedsmall'] = '{$a->username} が課題「 {$a->assignment} 」への提出を更新しました。';
$string['gradersubmissionupdatedtext'] = '{$a->username} が「 {$a->assignment} 」の提出課題を更新しました (更新日時: {$a->timeupdated} )。

以下にて閲覧可能です:

{$a->url}';
$string['gradestudent'] = '学生を評定する: (id={$a->id}, フルネーム={$a->fullname})';
$string['gradeuser'] = '{$a} を評定する';
$string['grading'] = '評定';
$string['gradingmethodpreview'] = '評定クライテリア';
$string['gradingoptions'] = 'オプション';
$string['gradingstatus'] = '評定ステータス';
$string['gradingstudentprogress'] = '学生の評定 {$a->index} / {$a->count}';
$string['gradingsummary'] = '評定概要';
$string['grantextension'] = '延長を許可する';
$string['grantextensionforusers'] = '{$a} 名の学生に対して延長を許可する';
$string['hiddenuser'] = '参加者';
$string['hideshow'] = '非表示/表示';
$string['instructionfiles'] = 'インストラクションファイル';
$string['invalidfloatforgrade'] = '提供された評点を理解できませんでした: {$a}';
$string['invalidgradeforscale'] = '提供された評点は現在の評価尺度に有効ではありません。';
$string['lastmodifiedgrade'] = '最終更新日時 (評定)';
$string['lastmodifiedsubmission'] = '最終更新日時 (提出)';
$string['latesubmissions'] = '提出期限後の提出';
$string['latesubmissionsaccepted'] = '延長を許可された学生のみ課題を提出することができます。';
$string['locksubmissionforstudent'] = '学生によるこれ以上の提出を禁止する: (id={$a->id}, フルネーム={$a->fullname})';
$string['locksubmissions'] = '提出をロックする';
$string['manageassignfeedbackplugins'] = '課題フィードバックプラグイン管理';
$string['manageassignsubmissionplugins'] = '課題提出プラグイン管理';
$string['maxgrade'] = '最大評点';
$string['messageprovider:assign_notification'] = '課題通知';
$string['modulename'] = '課題';
$string['modulename_help'] = '課題活動モジュールにおいて、教師はタスクの伝達、作業の収集、評点およびフィードバックを提供することができます。

学生はワードプロセッサで処理したドキュメント、スプレッドシート、イメージ、オーディオまたはビデオクリップのようなデジタルコンテンツ (ファイル) を提出することができます。代わりに、または加えて、テキストエディタへのテキストの直接入力を学生に求めることがきます。アートワークのように学生に対して「実社会」を思い出させる課題をオフラインで完了させるために使用することもできます。この場合、デジタルコンテンツを必要としません。学生は個人またはグループのメンバーとして、課題を提出することができます。

課題をレビューする場合、評定した学生の提出物、コメントを付けたドキュメント、口語のオーディオフィードバックのようにフィードバックコメントを残したり、ファイルをアップロードすることができます。課題は数字またはカスタム評価尺度、ルーブリックのような高度な評定方法を使って評定することができます。最終評点は評定表に記録されます。';
$string['modulenameplural'] = '課題';
$string['mysubmission'] = '私の提出:';
$string['newsubmissions'] = '課題が提出されました';
$string['nofiles'] = 'ファイルなし';
$string['nograde'] = '評点なし';
$string['nolatesubmissions'] = '提出遅延は受け付けられません。';
$string['nomoresubmissionsaccepted'] = 'これ以上、提出は受け付けられません。';
$string['noonlinesubmissions'] = 'この課題では、あなたがオンラインで提出するものはありません。';
$string['nosavebutnext'] = '次へ';
$string['nosubmission'] = 'この課題に関して、提出されているものはありません。';
$string['nosubmissionsacceptedafter'] = '次の日時以降、提出は許可されません';
$string['notgraded'] = '未評定';
$string['notgradedyet'] = '未評価';
$string['notifications'] = '通知';
$string['notsubmittedyet'] = '未提出';
$string['nousersselected'] = 'ユーザ未選択';
$string['numberofdraftsubmissions'] = '下書き';
$string['numberofparticipants'] = '参加者';
$string['numberofsubmissionsneedgrading'] = '要評定';
$string['numberofsubmittedassignments'] = '提出';
$string['numberofteams'] = 'グループ';
$string['offline'] = 'オンライン提出不要';
$string['open'] = 'オープン';
$string['outlinegrade'] = '評点: {$a}';
$string['overdue'] = '<font color="red">課題は次の時間を超過しています: {$a}</font>';
$string['page-mod-assign-view'] = '課題モジュールメインページ';
$string['page-mod-assign-x'] = 'すべての課題モジュールページ';
$string['participant'] = '参加者';
$string['pluginadministration'] = '課題管理';
$string['pluginname'] = '課題';
$string['preventsubmissions'] = 'この課題に関して、ユーザがさらに提出することを防ぎます。';
$string['preventsubmissionsshort'] = '提出の変更を禁止する';
$string['previous'] = '前へ';
$string['quickgrading'] = 'クイック評定';
$string['quickgradingchangessaved'] = '評点の変更が保存されました。';
$string['quickgrading_help'] = 'クイック評定において、あなたは提出テーブル内に直接評点 (およびアウトカム) を入力することができます。クイック評定には高度な評定との互換性がありません。また、複数の評定者がいる場合、お勧めできません。';
$string['quickgradingresult'] = 'クイック評定';
$string['recordid'] = 'ID';
$string['requireallteammemberssubmit'] = 'グループメンバーすべての提出を必要とする';
$string['requireallteammemberssubmit_help'] = '有効にした場合、グループ提出が提出されたとみなされるには、学生グループメンバーすべてが提出ボタンをクリックする必要があります。無効にした場合、学生グループのメンバーの誰かが提出ボタンをクリックした時点でグループ提出は提出したとみなされます。';
$string['requiresubmissionstatement'] = '学生に提出同意書の承諾を求める';
$string['requiresubmissionstatementassignment'] = '学生に提出同意書の承諾を求める';
$string['requiresubmissionstatementassignment_help'] = 'この課題の提出すべてにおいて、学生は提出声明を承認する必要があります。';
$string['requiresubmissionstatement_help'] = 'このMoodleの課題提出すべてにおいて、学生に提出同意書の承諾を求めます。この設定が有効にされない場合、それぞれの課題において提出同意書を有効または無効にすることができます。';
$string['revealidentities'] = '学生の個人情報を公開する';
$string['revealidentitiesconfirm'] = 'この課題に関して、本当に学生の個人情報を公開してもよろしいですか。この処理を元に戻すことはできません。学生の個人情報が公開された場合、評点が評定表にリリースされます。';
$string['reverttodraft'] = '提出を下書き状態に戻す';
$string['reverttodraftforstudent'] = '学生の提出を下書きに戻す: (id={$a->id}, フルネーム={$a->fullname})';
$string['reverttodraftshort'] = '提出を下書きに戻す';
$string['reviewed'] = 'レビュー済み';
$string['saveallquickgradingchanges'] = 'すべてのクイック評定の変更を保存する';
$string['savechanges'] = '変更を保存する';
$string['savenext'] = '保存して次を表示する';
$string['scale'] = '評価尺度';
$string['selectlink'] = '選択 ...';
$string['selectuser'] = '{$a} を選択する';
$string['sendlatenotifications'] = '提出遅延に関して、評定者に通知する';
$string['sendlatenotifications_help'] = '有効にした場合、学生が課題提出に遅れた時点で、評定者 (通常は教師)  にメッセージが送信されます。メッセージ送信方法は設定することができます。';
$string['sendnotifications'] = '評定者に提出を通知する';
$string['sendnotifications_help'] = '有効にした場合、学生が課題を早く、時間どおりまたは遅く提出した時点で評定者 (通常教師) にメッセージが送信されます。メッセージ送信方法は設定することができます。';
$string['sendsubmissionreceipts'] = '学生に提出受領書を送信する';
$string['sendsubmissionreceipts_help'] = 'この設定では、学生への提出受領書を有効にします。正常に課題が提出された場合、学生は毎回通知を受信します。';
$string['settings'] = '課題設定';
$string['showrecentsubmissions'] = '最近の課題提出を表示する';
$string['submission'] = '提出課題';
$string['submissiondrafts'] = '学生に提出ボタンのクリックを求める';
$string['submissiondrafts_help'] = '有効にした場合、学生は最終提出であると宣言するため、「提出」ボタンをクリックする必要があります。この設定により、学生はシステム上に下書きバージョンの課題を保持することができるようになります。学生の課題提出後、この設定が「No」から「Yes」に変更された場合、提出は最終提出として再評定されます。';
$string['submissioneditable'] = '学生はこの提出を編集できます。';
$string['submissionempty'] = '提出された課題はありません。';
$string['submissionnoteditable'] = '学生はこの提出を編集できません。';
$string['submissionnotready'] = 'この課題はまだ提出することができません:';
$string['submissionplugins'] = '課題プラグイン';
$string['submissionreceipthtml'] = 'あなたは課題「 {$a->assignment} 」への提出を送信しました。
<br />
<br />
あなたの<a href="{$a->url}">提出課題</a>のステータスをご覧ください。';
$string['submissionreceipts'] = '提出受領書を送信する';
$string['submissionreceiptsmall'] = 'あなたは課題「 {$a->assignment} 」への提出を送信しました。';
$string['submissionreceipttext'] = 'あなたは課題「 {$a->assignment} 」への提出を送信しました。

あなたの提出課題のステータスをご覧ください:

     {$a->url}';
$string['submissions'] = '提出課題';
$string['submissionsclosed'] = '提出は終了しています。';
$string['submissionsettings'] = '提出設定';
$string['submissionslocked'] = 'この課題は提出を受け付けていません。';
$string['submissionslockedshort'] = '提出の変更は許可されていません。';
$string['submissionsnotgraded'] = '未評定の提出: {$a}';
$string['submissionstatement'] = '提出同意書';
$string['submissionstatementacceptedlog'] = 'ユーザ {$a} によって承諾された提出同意書';
$string['submissionstatementdefault'] = '他の人の作品であると私が認めたものを除き、この課題は私自身の作業の結果です。';
$string['submissionstatement_help'] = '課題提出同意書';
$string['submissionstatus'] = '提出ステータス';
$string['submissionstatus_'] = '提出なし';
$string['submissionstatus_draft'] = '下書き (未提出)';
$string['submissionstatusheading'] = '提出ステータス';
$string['submissionstatus_marked'] = '評定済み';
$string['submissionstatus_new'] = '新しい提出';
$string['submissionstatus_submitted'] = '評定のため提出';
$string['submissionteam'] = 'グループ';
$string['submitaction'] = '提出';
$string['submitassignment'] = '課題を提出する';
$string['submitassignment_help'] = 'この課題を提出した場合、あなたはこれ以上変更できないようになります。';
$string['submitted'] = '提出';
$string['submittedearly'] = '課題は {$a} 日早く提出されました。';
$string['submittedlate'] = '課題は {$a} 遅く提出されました。';
$string['submittedlateshort'] = '{$a} 遅く提出';
$string['teamsubmission'] = '学生がグループで提出する';
$string['teamsubmissiongroupingid'] = '学生グループのグルーピング';
$string['teamsubmissiongroupingid_help'] = 'これは課題が学生グループのグループを探すために使用されるグルーピングです。設定されない場合、一連のデフォルトのグループが使用されます。';
$string['teamsubmission_help'] = '有効にした場合、学生はグループのデフォルト設定またはカスタムグルーピングに基づきチームに分けられます。グループ提出はグループメンバーに共有され、グループメンバーすべてはそれぞれ提出の変更を閲覧することができます。';
$string['teamsubmissionstatus'] = 'グループ提出ステータス';
$string['textinstructions'] = '課題インストラクション';
$string['timemodified'] = '最終更新日時';
$string['timeremaining'] = '残り時間';
$string['unlocksubmissionforstudent'] = '学生の提出を許可する: (id={$a->id}, フルネーム={$a->fullname})';
$string['unlocksubmissions'] = '提出をロック解除する';
$string['updategrade'] = '評点を更新する';
$string['updatetable'] = '保存してテーブルを更新する';
$string['upgradenotimplemented'] = 'プラグイン ({$a->type} {$a->subtype}) にはアップグレードは実装されていません。';
$string['userextensiondate'] = '次の日時まで延長が許可されました: {$a}';
$string['usergrade'] = 'ユーザガイド';
$string['userswhoneedtosubmit'] = '提出が必要なユーザ: {$a}';
$string['viewfeedback'] = 'フィードバックを表示する';
$string['viewfeedbackforuser'] = 'ユーザのフィードバックを表示する: {$a}';
$string['viewfull'] = '詳細表示';
$string['viewfullgradingpage'] = 'フィードバックを提供するため、フル評定ページを開きました。';
$string['viewgradebook'] = '評定表を表示する';
$string['viewgrading'] = 'すべての提出を表示/評定する';
$string['viewgradingformforstudent'] = '学生の評定ページを閲覧しました: (id={$a->id}, fullname={$a->fullname})。';
$string['viewownsubmissionform'] = '自分の提出課題ページを閲覧しました。';
$string['viewownsubmissionstatus'] = '自分の提出ステータスページを閲覧しました。';
$string['viewrevealidentitiesconfirm'] = '学生の個人情報公開確認ページを表示します。';
$string['viewsubmission'] = '提出を表示する';
$string['viewsubmissionforuser'] = 'ユーザの提出を表示する: {$a}';
$string['viewsubmissiongradingtable'] = '提出に関する評定表を閲覧しました。';
$string['viewsummary'] = '概要表示';
