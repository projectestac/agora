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
 * Strings for component 'role', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   role
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinganewrole'] = '新しいロールを追加する';
$string['addingrolebycopying'] = '{$a} をベースに新しいロールを追加する';
$string['addrole'] = '新しいロールを追加する';
$string['advancedoverride'] = '高度なロールオーバーライド';
$string['allow'] = '許可';
$string['allowassign'] = 'ロールの割り当て許可';
$string['allowed'] = '許可済み';
$string['allowoverride'] = 'ロールのオーバーライド許可';
$string['allowroletoassign'] = 'ロール {$a->fromrole} のユーザに対して、ロール {$a->targetrole} への割り当てを許可する';
$string['allowroletooverride'] = 'ロール {$a->fromrole} のユーザに対して、ロール {$a->targetrole} へのオーバーライドを許可する';
$string['allowroletoswitch'] = 'ロール {$a->fromrole} のユーザに対して、ロール {$a->targetrole} へのスイッチを許可する';
$string['allowswitch'] = 'ロールのスイッチ許可';
$string['allsiteusers'] = 'すべてのサイトユーザ';
$string['archetype'] = 'ロールアーキタイプ';
$string['archetypecoursecreator'] = 'アーキタイプ: コース作成者';
$string['archetypeeditingteacher'] = 'アーキタイプ: 教師 (編集権限あり)';
$string['archetypefrontpage'] = 'アーキタイプ: フロントページの認証ユーザ';
$string['archetypeguest'] = 'アーキタイプ: ゲスト';
$string['archetype_help'] = 'ロールアーキタイプではロールがデフォルトにリセットされる場合のパーミッションを決定します。同時に、サイトがアップグレードされる場合のロールに対する新しいパーミッションすべてを決定します。';
$string['archetypemanager'] = 'アーキタイプ: マネージャ';
$string['archetypestudent'] = 'アーキタイプ: 学生';
$string['archetypeteacher'] = 'アーキタイプ: 教師 (編集権限なし)';
$string['archetypeuser'] = 'アーキタイプ: 認証ユーザ';
$string['assignanotherrole'] = '別のロールを割り当てる';
$string['assignedroles'] = '割り当て済みロール';
$string['assignerror'] = 'ユーザ {$a->user} へのロール {$a->role} 割り当て中にエラーが発生しました。';
$string['assignglobalroles'] = 'システムロールを割り当てる';
$string['assignmentcontext'] = '割り当てコンテクスト';
$string['assignmentoptions'] = '割り当てオプション';
$string['assignrole'] = 'ロールを割り当てる';
$string['assignrolenameincontext'] = '{$a->context} のロール「 {$a->role} 」を割り当てる';
$string['assignroles'] = 'ロールを割り当てる';
$string['assignroles_help'] = 'コンテクストでユーザにロールを割り当てることにより、そのロールに含まれるパーミッションをユーザの現在のコンテクストおよびすべての低いコンテクストに与えることができます。例えば、コース内でユーザに学生ロールが割り当てられた場合、コース内すべてのブロックおよび活動に対しても学生としてのロールを持つことになります。';
$string['assignrolesin'] = '{$a} 内で ロールを割り当てる';
$string['assignrolesrelativetothisuser'] = 'このユーザに対してロールを割り当てる';
$string['backtoallroles'] = 'すべてのロール一覧に戻る';
$string['backup:anonymise'] = 'バックアップのユーザデータを匿名化する';
$string['backup:backupactivity'] = '活動をバックアップする';
$string['backup:backupcourse'] = 'コースをバックアップする';
$string['backup:backupsection'] = 'セクションをバックアップする';
$string['backup:backuptargethub'] = 'ハブにバックアップする';
$string['backup:backuptargetimport'] = 'インポートにバックアップする';
$string['backup:configure'] = 'バックアップオプションを設定する';
$string['backup:downloadfile'] = 'バックアップエリアよりファイルをダウンロードする';
$string['backup:userinfo'] = 'ユーザデータをバックアップする';
$string['block:edit'] = 'ブロック設定を編集する';
$string['block:view'] = 'ブロックを表示する';
$string['blog:associatecourse'] = 'ブログエントリとコースを関連付ける';
$string['blog:associatemodule'] = 'ブログエントリと活動モジュールを関連付ける';
$string['blog:create'] = '新しいブログエントリを作成する';
$string['blog:manageentries'] = 'ブログエントリを編集および管理する';
$string['blog:manageexternal'] = '外部ブログを編集および管理する';
$string['blog:manageofficialtags'] = 'オフィシャルタグを管理する';
$string['blog:managepersonaltags'] = 'パーソナルタグを管理する';
$string['blog:search'] = 'ブログエントリを検索する';
$string['blog:view'] = 'ブログエントリを表示する';
$string['blog:viewdrafts'] = '下書きブログエントリを表示する';
$string['calendar:manageentries'] = 'すべてのカレンダーエントリを管理する';
$string['calendar:managegroupentries'] = 'グループのカレンダーエントリを管理する';
$string['calendar:manageownentries'] = '自分のカレンダーエントリを管理する';
$string['capabilities'] = 'ケイパビリティ';
$string['capability'] = 'ケイパビリティ';
$string['category:create'] = 'カテゴリを作成する';
$string['category:delete'] = 'カテゴリを削除する';
$string['category:manage'] = 'カテゴリを管理する';
$string['category:update'] = 'カテゴリを更新する';
$string['category:viewhiddencategories'] = '非表示のカテゴリを表示する';
$string['category:visibility'] = '非表示のカテゴリを表示する';
$string['checkglobalpermissions'] = 'システムパーミッションのチェック';
$string['checkpermissions'] = 'パーミッションをチェックする';
$string['checkpermissionsin'] = '{$a} のパーミッションをチェックする';
$string['checksystempermissionsfor'] = '{$a->fullname} に関するシステムパーミッションをチェックする';
$string['checkuserspermissionshere'] = 'この {$a->contextlevel} 内で {$a->fullname} に割り当てられているパーミッションをチェックする';
$string['chooseroletoassign'] = '割り当てるロールを選択してください。';
$string['cohort:assign'] = 'コーホートメンバーを追加および削除する';
$string['cohort:manage'] = 'コーホートを作成、削除および移動する';
$string['cohort:view'] = 'サイト全体のコーホートを表示する';
$string['comment:delete'] = 'コメントを削除する';
$string['comment:post'] = 'コメントを投稿する';
$string['comment:view'] = 'コメントを読む';
$string['community:add'] = 'ハブおよびコースの検索にコミュニティブロックを使用する';
$string['community:download'] = 'コミュニティブロックよりコースをダウンロードする';
$string['confirmaddadmin'] = '本当に新しいサイト管理者としてユーザ <strong>{$a}</strong> を追加してもよろしいですか?';
$string['confirmdeladmin'] = '本当にユーザ <strong>{$a}</strong> をサイト管理者一覧より削除してもよろしいですか?';
$string['confirmroleprevent'] = '本当にコンテクスト {$a->context} 内ケイパビリティ {$a->cap} に対して許可されたロールから <strong>{$a->role}</strong> を削除してもよろしいですか?';
$string['confirmroleunprohibit'] = '本当にコンテクスト {$a->context} 内ケイパビリティ {$a->cap} に対して禁止されたロールから <strong>{$a->role}</strong> を削除してもよろしいですか?';
$string['confirmunassign'] = '本当にこのユーザからこのロールを削除してもよろしいですか?';
$string['confirmunassignno'] = 'キャンセル';
$string['confirmunassigntitle'] = 'ロール変更を承認する';
$string['confirmunassignyes'] = '削除';
$string['context'] = 'コンテクスト';
$string['course:activityvisibility'] = '活動を表示/非表示する';
$string['course:bulkmessaging'] = '多くのユーザにメッセージを送信する';
$string['course:changecategory'] = 'コースカテゴリを変更する';
$string['course:changefullname'] = '長いコース名を変更する';
$string['course:changeidnumber'] = 'コースIDナンバーを変更する';
$string['course:changeshortname'] = 'コース省略名を変更する';
$string['course:changesummary'] = 'コース概要を変更する';
$string['course:create'] = 'コースを作成する';
$string['course:delete'] = 'コースを削除する';
$string['course:enrolconfig'] = 'コースの登録インスタンスを設定する';
$string['course:enrolreview'] = 'コース登録をレビューする';
$string['course:ignorefilesizelimits'] = 'ファイル制限よりも大きなファイルを使用する';
$string['course:isincompletionreports'] = '完了レポートに表示する';
$string['course:manageactivities'] = '活動を管理する';
$string['course:managefiles'] = 'ファイルを管理する';
$string['course:managegrades'] = '評定を管理する';
$string['course:managegroups'] = 'グループを管理する';
$string['course:managescales'] = '評価尺度を管理する';
$string['course:markcomplete'] = 'コース完了において、ユーザに完了をマークする';
$string['course:movesections'] = 'セクションを移動する';
$string['course:publish'] = 'コースをハブに公開する';
$string['course:request'] = '新しいコースをリクエストする';
$string['course:reset'] = 'コースをリセットする';
$string['course:sectionvisibility'] = 'セクションの視認性をコントロールする';
$string['course:setcurrentsection'] = '現在のセクションを設定する';
$string['course:update'] = 'コース設定を更新する';
$string['course:useremail'] = 'メールアドレスを有効/無効にする';
$string['course:view'] = '参加せずにコースを表示する';
$string['course:viewcoursegrades'] = 'コース評定を表示する';
$string['course:viewhiddenactivities'] = '非表示の活動を表示する';
$string['course:viewhiddencourses'] = '非表示のコースを表示する';
$string['course:viewhiddensections'] = '非表示のセクションを表示する';
$string['course:viewhiddenuserfields'] = '非表示のユーザフィールドを表示する';
$string['course:viewparticipants'] = '参加者を表示する';
$string['course:viewscales'] = '評価尺度を表示する';
$string['course:visibility'] = 'コースを表示/非表示する';
$string['createrolebycopying'] = '{$a} をコピーして新しいロールを作成する';
$string['createthisrole'] = 'このロールを作成する';
$string['currentcontext'] = '現在のコンテクスト';
$string['currentrole'] = '現在のロール';
$string['customroledescription'] = 'カスタム説明';
$string['customroledescription_help'] = 'カスタム説明が空白の場合、自動的に標準ロールの説明が表示されます。';
$string['customrolename'] = 'カスタムフルネーム';
$string['customrolename_help'] = 'カスタムフルネームが空白の場合、自動的に標準ロールのフルネームが表示されます。あなたはすべてのカスタムロールのフルネームを提供する必要があります。';
$string['defaultrole'] = 'デフォルトロール';
$string['defaultx'] = 'デフォルト {$a}';
$string['defineroles'] = 'ロールの定義';
$string['deletecourseoverrides'] = 'コース内のすべてのオーバーライドを削除する';
$string['deletelocalroles'] = 'すべてのローカルロール割り当てを削除する';
$string['deleterolesure'] = '<p>本当にロール「 {$a->name} ({$a->shortname}) 」を削除してもよろしいですか?</p><p>現在、このロールは {$a->count} 名のユーザに割り当てられています。</p>';
$string['deletexrole'] = '{$a} ロールを削除する';
$string['duplicaterole'] = 'ロールを複製する';
$string['duplicaterolesure'] = '本当にロール「 {$a->name} ({$a->shortname}) 」を複製してもよろしいですか?</p>';
$string['editingrolex'] = 'ロール「 {$a} 」を編集する';
$string['editrole'] = 'ロールの編集';
$string['editxrole'] = '{$a} ロールを編集する';
$string['errorbadrolename'] = 'ロール名が正しくありません。';
$string['errorbadroleshortname'] = 'ロール省略名が正しくありません。';
$string['errorexistsrolename'] = 'ロール名がすでに登録されています。';
$string['errorexistsroleshortname'] = 'ロール名がすでに登録されています。';
$string['existingadmins'] = '現在のサイト管理者';
$string['existingusers'] = '割り当て済みユーザ: {$a}';
$string['explanation'] = '説明';
$string['extusers'] = '既存のユーザ';
$string['extusersmatching'] = '「 {$a} 」に合致する既存のユーザ';
$string['filter:manage'] = 'ローカルフィルタ設定を管理する';
$string['frontpageuser'] = 'フロントページの認証ユーザ';
$string['frontpageuserdescription'] = 'フロントページコース内のすべてのログインユーザです。';
$string['globalrole'] = 'システムロール';
$string['globalroleswarning'] = '警告! あなたがこのページで割り当てたロールは、フロントページおよびすべてのコースを含む、システム全体の登録ユーザに適用されます。';
$string['gotoassignroles'] = 'この {$a->contextlevel} に対するロールの割り当てに移動する';
$string['gotoassignsystemroles'] = 'システムロールの割り当てに移動する';
$string['grade:edit'] = '評定を編集する';
$string['grade:export'] = '評定をエクスポートする';
$string['grade:hide'] = '評点または評定項目を非表示/非表示解除する';
$string['grade:import'] = '評定をインポートする';
$string['grade:lock'] = '評点または評定項目をロックする';
$string['grade:manage'] = '評定項目を管理する';
$string['grade:managegradingforms'] = '高度な評定方法を管理する';
$string['grade:manageletters'] = '評定文字を管理する';
$string['grade:manageoutcomes'] = '評定アウトカムを管理する';
$string['grade:managesharedforms'] = '高度な評定フォームテンプレートを管理する';
$string['grade:override'] = '評定をオーバーライドする';
$string['grade:sharegradingforms'] = 'テンプレートとして高度な評定フォームを共有する';
$string['grade:unlock'] = '評定または評定項目をロック解除する';
$string['grade:view'] = '自分の評定を表示する';
$string['grade:viewall'] = '他のユーザの評定を表示する';
$string['grade:viewhidden'] = '自分の非表示の評定を表示する';
$string['hidden'] = '非表示';
$string['highlightedcellsshowdefault'] = '下記テーブルで選択されているパーミッションは、上記の元ロールのデフォルト値です。';
$string['highlightedcellsshowinherit'] = '下記にハイライトされたセルは継承されるパーミッションを示してしています。あなたが実際に変更したいパーミッションとは別にして、すべてを継承のままにしてください。';
$string['inactiveformorethan'] = '{$a->timeperiod} 以上活動していない';
$string['ingroup'] = 'グループ「 {$a->group} 」に属している';
$string['inherit'] = '継承';
$string['legacy:admin'] = 'レガシーロール: 管理者';
$string['legacy:coursecreator'] = 'レガシーロール: コース作成者';
$string['legacy:editingteacher'] = 'レガシーロール: 教師 (編集権限あり)';
$string['legacy:guest'] = 'レガシーロール: ゲスト';
$string['legacy:student'] = 'レガシーロール: 学生';
$string['legacy:teacher'] = 'レガシーロール: 教師 (編集権限なし)';
$string['legacytype'] = 'レガシーロールタイプ';
$string['legacy:user'] = 'レガシーロール: 認証済みユーザ';
$string['listallroles'] = 'すべてのロールを一覧表示する';
$string['localroles'] = 'ローカルに割り当てるロール';
$string['mainadmin'] = '主管理者';
$string['mainadminset'] = '主管理者を設定する';
$string['manageadmins'] = 'サイト管理者を管理する';
$string['manager'] = 'マネージャ';
$string['managerdescription'] = 'マネージャはコースにアクセスおよび編集することができます。通常、コースに参加することはありません。';
$string['manageroles'] = 'ロールの管理';
$string['maybeassignedin'] = 'このロールが割り当てられるコンテクストタイプ';
$string['morethan'] = '{$a} 以上';
$string['multipleroles'] = 'マルチロール';
$string['my:configsyspages'] = 'マイホームページのシステムテンプレートを設定する';
$string['my:manageblocks'] = 'マイホームページブロックを管理する';
$string['neededroles'] = 'ロールのパーミッション';
$string['nocapabilitiesincontext'] = 'このコンテクストで利用できるケイパビリティはありません。';
$string['noneinthisx'] = 'この {$a} にはありません。';
$string['noneinthisxmatching'] = 'この {$a->contexttype} 内には、「 {$a->search} 」に合致するユーザはありません。';
$string['noroleassignments'] = 'このユーザに関して、このサイト内でのロール割り当ては、どこにもありません。';
$string['noroles'] = 'ロールなし';
$string['notabletoassignroleshere'] = 'あなたは、ここでロールを割り当てることはできません。';
$string['notabletooverrideroleshere'] = 'あなたは、ここでロールのパーミッションをオーバーライドすることはできません。';
$string['notes:manage'] = 'ノートを管理する';
$string['notes:view'] = 'ノートを表示する';
$string['notset'] = '設定なし';
$string['overrideanotherrole'] = '別のロールをオーバーライドする';
$string['overridecontext'] = 'コンテクストのオーバーライド';
$string['overridepermissions'] = 'パーミッションのオーバーライド';
$string['overridepermissionsforrole'] = '{$a->context} のロール「 {$a->role} 」におけるパーミッションをオーバーライドする';
$string['overridepermissions_help'] = '<p>
オーバーライドは、コンテクストのロールをオーバーライドするためデザインされたパーミッションです。オーバーライドでは、必要に応じてあなたのパーミッションを「調整」することができます。
</p>

<p>
例えば、あなたのコース内で学生ロールが割り当てられたユーザは、通常フォーラムで新しいディスカッションを開始することができます。しかし、1つのフォーラムでそのケイパビリティを制限したい場合、学生に対して「新しいディスカッションを開始する」ケイパビリティを抑制する設定をオーバーライドすることができます。
</p>

<p>
オーバーライドは、あなたのサイトおよびコースの「公開された」エリアで、ユーザに意味をなす特別なパーミッションを与えるため使用することができます。例えば、いくつかの課題で学生に評定権限を与える実験を行うことができます。
</p>

<p>
時々関連性のあるケイパビリティのみ表示され、オーバーライドできないケイパビリティがハイライトされた状態で表示される以外、オーバーライドのインターフェースはロール定義に似ています ( 例 あなたのオーバーライドが継承に設定された場合 )。
</p>

<p>
関連情報
<a href="help.php?file=roles.html">ロール</a>,
<a href="help.php?file=contexts.html">コンテクスト</a>,
<a href="help.php?file=assignroles.html">ロールの割り当て</a>,
<a href="help.php?file=permissions.html">パーミッション</a>
</p>';
$string['overridepermissionsin'] = '{$a} のパーミッションをオーバーライドする';
$string['overrideroles'] = 'ロールのオーバーライド';
$string['overriderolesin'] = '{$a} ロールのオーバーライド';
$string['overrides'] = 'オーバーライド';
$string['overridesbycontext'] = 'オーバーライド (コンテクストによる)';
$string['permission'] = 'パーミッション';
$string['permission_help'] = 'パーミッションはケイパビリティ (能力) を付与するための設定です。設定には4つのオプションがあります:

* 設定なし
* 許可 - ケイパビリティにパーミッションが割り当てられます。
* 抑制 -  高いコンテクストで許可されていたとしてもケイパビリティからパーミッションが解除されます。
* 禁止 - パーミッションは完全に拒否され、どのような低いコンテクストにあったとしてもオーバーライドすることはできません。';
$string['permissions'] = 'パーミッション';
$string['permissionsforuser'] = 'ユーザ {$a} のパーミッション';
$string['permissionsincontext'] = '{$a} のパーミッション';
$string['portfolio:export'] = 'ポートフォリオにエクスポートする';
$string['potentialusers'] = '潜在的なユーザ: {$a}';
$string['potusers'] = '潜在的なユーザ';
$string['potusersmatching'] = '「 {$a} 」に合致する潜在的なユーザ';
$string['prevent'] = '抑制';
$string['prohibit'] = '禁止';
$string['prohibitedroles'] = '禁止';
$string['question:add'] = '新しい問題を追加する';
$string['question:config'] = '問題タイプを設定する';
$string['question:editall'] = 'すべての問題を編集する';
$string['question:editmine'] = '自分の問題を編集する';
$string['question:flag'] = '受験中、問題にフラグ付けする';
$string['question:managecategory'] = '問題カテゴリを管理する';
$string['question:moveall'] = 'すべての問題を移動する';
$string['question:movemine'] = '自分の問題を移動する';
$string['question:useall'] = 'すべての問題を使用する';
$string['question:usemine'] = '自分の問題を使用する';
$string['question:viewall'] = 'すべての問題を表示する';
$string['question:viewmine'] = '自分の問題を表示する';
$string['rating:rate'] = 'アイテムに評価を追加する';
$string['rating:view'] = 'あなたが受けた評価合計を表示する';
$string['rating:viewall'] = '個々のユーザから与えられた実評価すべてを表示する';
$string['rating:viewany'] = 'すべてのユーザが受けた評価合計を表示する';
$string['resetrole'] = 'デフォルトにリセットする';
$string['resetrolenolegacy'] = 'パーミッションをクリアする';
$string['resetrolesure'] = '本当にロール「 {$a->name} ({$a->shortname}) 」をデフォルトにリセットしてもよろしいですか?</p><p>選択されたアーキタイプ ({$a->legacytype}) よりデフォルトが取得されます。';
$string['resetrolesurenolegacy'] = '本当にこのロール「 {$a->name} ({$a->shortname}) 」で定義されたすべてのパーミッションをクリアしてもよろしいですか?';
$string['restore:configure'] = 'リストアオプションを設定する';
$string['restore:createuser'] = 'リストア時、ユーザを作成する';
$string['restore:restoreactivity'] = '活動をリストアする';
$string['restore:restorecourse'] = 'コースをリストアする';
$string['restore:restoresection'] = 'セクションをリストアする';
$string['restore:restoretargethub'] = 'ハブのファイルからリストアする';
$string['restore:restoretargetimport'] = 'インポートファイルからリストアする';
$string['restore:rolldates'] = 'リストア時、活動設定の日付変更を許可する';
$string['restore:uploadfile'] = 'バックアップエリアにファイルをアップロードする';
$string['restore:userinfo'] = 'ユーザデータをリストアする';
$string['restore:viewautomatedfilearea'] = '自動バックアップよりコースをリストアする';
$string['risks'] = 'リスク';
$string['roleallowheader'] = 'ロールを許可する:';
$string['roleallowinfo'] = 'コンテクスト {$a->context} およびケイパビリティ {$a->cap} において、許可されるロールのリストに追加されるロールを選択してください:';
$string['role:assign'] = 'ユーザにロールを割り当てる';
$string['roleassignments'] = 'ロールの割り当て';
$string['roledefinitions'] = 'ロール定義';
$string['rolefullname'] = 'ロール名';
$string['roleincontext'] = '{$a->role} - {$a->context}';
$string['role:manage'] = 'ロールを作成および管理する';
$string['role:override'] = '他のパーミッションをオーバーライドする';
$string['roleprohibitheader'] = 'ロールを禁止する';
$string['roleprohibitinfo'] = 'コンテクスト {$a->context} およびケイパビリティ {$a->cap} において、拒否されるロールのリストに追加されるロールを選択してください:';
$string['role:review'] = '他のユーザのパーミッションをレビューする';
$string['roles'] = 'ロール';
$string['role:safeoverride'] = '他のセーフパーミッションをオーバーライドする';
$string['roleselect'] = 'ロールを選択する';
$string['rolesforuser'] = 'ユーザ {$a} のロール';
$string['roles_help'] = '<p>
ロールはコンテクストでユーザに割り当てることのできる、システム全体に定義されたパーミッション群です。
</p>

<p>
例えば、教師が特定の活動を行うことができる「教師」と呼ばれるロールを定義することができます。このロールが定義された時点で、コース内の誰かを「教師」にするために、「教師ロール」を割り当てることができます。カテゴリ配下にあるすべてのコースでユーザを「教師」にするために、コースカテゴリ内のユーザにこのロールを割り当てることもできます。また、1つのフォーラムに対してのみケイパビリティを持ったロールをユーザに割り当てることもできます。
</p>

<p>
ロールには、<strong>名称</strong>を定義してください。多言語のロールを設定したい場合、下記のような多言語シンタックスを使用することができます。</p><pre>
  &lt;span lang="en"&gt;Teacher&lt;/span&gt;
  &lt;span lang="es_es"&gt;Profesor&lt;/span&gt;
  </pre>
<p>多言語シンタックスを使用する場合、あなたのMoodleの「フィルタ設定」が有効にされていることを確認してください。</p>

<p>
<strong>省略名</strong>は、あなたのロールを他のMoodleプラグインが参照するために必要です (例 ファイルからユーザをアップロードまたはユーザ登録プラグイン経由でユーザ登録を設定する場合等)。
</p>

<p>
<strong>説明</strong>では、ロールに対して誰でも共通の理解ができるよう、あなたの言葉で端的にロールを説明してください。
</p>

<p>
関連情報
<a href="help.php?file=contexts.html">コンテクスト</a>,
<a href="help.php?file=permissions.html">パーミッション</a>,
<a href="help.php?file=assignroles.html">ロールの割り当て</a>,
<a href="help.php?file=overrides.html">オーバーライド</a>
</p>';
$string['roleshortname'] = '省略名';
$string['roleshortname_help'] = 'ロール省略名は半角英数字のみ許可される低いレベルのロールIDです。標準ロールの省略名を変更しないでください。';
$string['role:switchroles'] = '他のロールに切り替える';
$string['roletoassign'] = '割り当てるロール';
$string['roletooverride'] = 'オーバーライドするロール';
$string['safeoverridenotice'] = '注意: あなたはセーフケイパビリティのオーバーライドのみ許可されているため、高いリスクのケイパビリティはロックされています。';
$string['selectanotheruser'] = '別のユーザを選択する';
$string['selectauser'] = 'ユーザを選択する';
$string['selectrole'] = 'ロールの選択';
$string['showallroles'] = 'すべてのロールを表示する';
$string['showthisuserspermissions'] = 'このユーザのパーミッションを表示する';
$string['site:accessallgroups'] = 'すべてのグループにアクセスする';
$string['siteadministrators'] = 'サイト管理者';
$string['site:approvecourse'] = 'コース作成を承認する';
$string['site:backup'] = 'コースをバックアップする';
$string['site:config'] = 'サイト設定を変更する';
$string['site:doanything'] = 'すべての動作を許可する';
$string['site:doclinks'] = 'サイト外ドキュメントのリンクを表示する';
$string['site:import'] = '他のコースをコースにインポートする';
$string['site:manageblocks'] = 'ページのブロックを管理する';
$string['site:mnetloginfromremote'] = 'リモートMoodleからログインする';
$string['site:mnetlogintoremote'] = 'MNet経由でリモートアプリケーションを散策する';
$string['site:readallmessages'] = 'サイトのすべてのメッセージを読む';
$string['site:restore'] = 'コースをリストアする';
$string['site:sendmessage'] = 'すべてのユーザにメッセージを送信する';
$string['site:trustcontent'] = '送信されたコンテンツを信頼する';
$string['site:uploadusers'] = 'ファイルからユーザをアップロードする';
$string['site:viewfullnames'] = 'ユーザのフルネームを常に表示する';
$string['site:viewparticipants'] = '参加者を表示する';
$string['site:viewreports'] = 'レポートを表示する';
$string['site:viewuseridentity'] = '一覧にユーザ固有情報すべてを表示する';
$string['tag:create'] = '新しいタグを作成する';
$string['tag:edit'] = '既存のタグを編集する';
$string['tag:editblocks'] = 'タグページのブロックを編集する';
$string['tag:flag'] = '不適切な内容としてタグ付けする';
$string['tag:manage'] = 'すべてのタグを管理する';
$string['thisusersroles'] = 'このユーザのロール割り当て';
$string['unassignarole'] = 'ロール {$a} の割り当てを解除する';
$string['unassignconfirm'] = '本当にユーザ「 {$a->user} 」のロール「 {$a->role} 」を割り当て解除してもよろしいですか?';
$string['unassignerror'] = 'ユーザ {$a->user} からのロール {$a->role} 割り当て解除中にエラーが発生しました。';
$string['user:changeownpassword'] = '自分のパスワードを変更する';
$string['user:create'] = 'ユーザを作成する';
$string['user:delete'] = 'ユーザを削除する';
$string['user:editmessageprofile'] = 'ユーザのメッセージングプロファイルを編集する';
$string['user:editownmessageprofile'] = '自分のメッセージングプロファイルを編集する';
$string['user:editownprofile'] = '自分のユーザプロファイルを編集する';
$string['user:editprofile'] = 'ユーザプロファイルを編集する';
$string['user:ignoreuserquota'] = 'ユーザクオータ制限を無視する';
$string['user:loginas'] = '別のユーザとしてログインする';
$string['user:manageblocks'] = '他のユーザのユーザプロファイルのブロックを管理する';
$string['user:manageownblocks'] = '自分のパブリックユーザプロファイルのブロックを管理する';
$string['user:manageownfiles'] = 'プライベートファイルエリアのファイルを管理する';
$string['user:managesyspages'] = 'パブリックユーザプロファイルのデフォルトページレイアウトを設定する';
$string['user:readuserblogs'] = 'すべてのユーザブログを表示する';
$string['user:readuserposts'] = 'すべてのユーザ投稿を表示する';
$string['usersfrom'] = '{$a} からのユーザ';
$string['usersfrommatching'] = '「 {$a->search} 」に合致する {$a->contextname} からのユーザ';
$string['usersinthisx'] = 'この {$a} 内のユーザ';
$string['usersinthisxmatching'] = '「 {$a->search} 」に合致する {$a->contexttype} 内のユーザ';
$string['userswithrole'] = 'ロールのすべてのユーザ';
$string['userswiththisrole'] = 'ロールのユーザ';
$string['user:update'] = 'ユーザプロファイルを更新する';
$string['user:viewalldetails'] = 'ユーザ情報すべてを表示する';
$string['user:viewdetails'] = 'ユーザプロファイルを表示する';
$string['user:viewhiddendetails'] = '非表示のユーザ詳細を表示する';
$string['user:viewuseractivitiesreport'] = 'ユーザの活動レポートを表示する';
$string['user:viewusergrades'] = 'ユーザの評定を表示する';
$string['useshowadvancedtochange'] = '変更するには「拡張要素を表示する」を使用してください。';
$string['viewingdefinitionofrolex'] = 'ロール「 {$a} 」の定義を表示する';
$string['viewrole'] = 'ロール詳細の表示';
$string['webservice:createmobiletoken'] = 'モバイルアクセス用のウェブサービストークンを作成する';
$string['webservice:createtoken'] = 'ウェブサービストークンを作成する';
$string['whydoesuserhavecap'] = 'なぜ {$a->fullname} は、コンテクスト {$a->context} でケイパビリティ {$a->capability} を持っているのですか?';
$string['whydoesusernothavecap'] = 'なぜ {$a->fullname} は、コンテクスト {$a->context} でケイパビリティ {$a->capability} を持っていないのですか?';
$string['xroleassignments'] = '{$a} のロール割り当て';
$string['xuserswiththerole'] = 'ロール「 {$a->role} 」のユーザ';
