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
 * Strings for component 'group', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   group
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addedby'] = '追加 - {$a}';
$string['addgroup'] = 'グループにユーザを追加する';
$string['addgroupstogrouping'] = 'グループをグルーピングに追加する';
$string['addgroupstogroupings'] = 'グループを追加/削除する';
$string['adduserstogroup'] = 'ユーザを追加/削除する';
$string['allocateby'] = 'メンバーの割り当て';
$string['anygrouping'] = '[すべてのグルーピング]';
$string['autocreategroups'] = 'グループを自動作成する';
$string['backtogroupings'] = 'グルーピングに戻る';
$string['backtogroups'] = 'グループに戻る';
$string['badnamingscheme'] = '「@」または「#」を厳密に１つ含む必要があります。';
$string['byfirstname'] = '名、姓のアルファベット順';
$string['byidnumber'] = 'IDナンバーのアルファベット順';
$string['bylastname'] = '姓、名のアルファベット順';
$string['createautomaticgrouping'] = '自動グルーピングを作成する';
$string['creategroup'] = 'グループを作成する';
$string['creategrouping'] = 'グルーピングを作成する';
$string['creategroupinselectedgrouping'] = 'グルーピングにグループを作成する';
$string['createingrouping'] = '自動作成グループのグルーピング';
$string['createorphangroup'] = '迷子グループを作成する';
$string['databaseupgradegroups'] = '現在のグループバージョン: {$a}';
$string['defaultgrouping'] = 'デフォルトグルーピング';
$string['defaultgroupingname'] = 'グルーピング';
$string['defaultgroupname'] = 'グループ';
$string['deleteallgroupings'] = 'すべてのグルーピングを削除する';
$string['deleteallgroups'] = 'すべてのグループを削除する';
$string['deletegroupconfirm'] = '本当にグループ「 {$a} 」を削除してもよろしいですか?';
$string['deletegrouping'] = 'グルーピングを削除する';
$string['deletegroupingconfirm'] = '本当にグルーピング「 {$a} 」を削除してもよろしいですか? (グルーピング内のグループは削除されません。)';
$string['deletegroupsconfirm'] = '本当に次のグループを削除してもよろしいですか?';
$string['deleteselectedgroup'] = '選択したグループを削除する';
$string['editgroupingsettings'] = 'グルーピング設定を編集する';
$string['editgroupsettings'] = 'グループ設定を編集する';
$string['enrolmentkey'] = '登録キー';
$string['enrolmentkeyalreadyinuse'] = 'この登録キーはすでに別のグループで使用されています。';
$string['enrolmentkey_help'] = '登録キーにより、キーを知っているユーザのみに限定してコースへのアクセスを許可することができます。グループ登録キーが指定された場合、そのキーによりユーザがコースに入ることができるようになるだけではなく、自動的にこのグループのメンバーとして登録されます。

注意: 自己登録設定において、グループ登録キーを有効にする必要があります。同時にコース登録キーも指定する必要があります。';
$string['erroraddremoveuser'] = 'ユーザ {$a} のグループ登録/削除中にエラーが発生しました。';
$string['erroreditgroup'] = 'グループ {$a} の作成/更新中にエラーが発生しました。';
$string['erroreditgrouping'] = 'グルーピング {$a} の作成/更新中にエラーが発生しました。';
$string['errorinvalidgroup'] = 'エラー、無効なグループです: {$a}';
$string['errorremovenotpermitted'] = 'あなたには自動的に追加されたメンバー {$a} を削除するパーミッションがありません。';
$string['errorselectone'] = 'このオプションを選択する前に単一グループを選択してください。';
$string['errorselectsome'] = 'このオプションを選択する前に1つまたはそれ以上のグループを選択してください。';
$string['evenallocation'] = '注意: 割り当てを均等にするため、グループごとの実際のメンバー数は、あなたが指定した数と異なります。';
$string['event_group_created'] = 'グループが作成されました。';
$string['event_group_deleted'] = 'グループが削除されました。';
$string['event_grouping_created'] = 'グルーピングが作成されました。';
$string['event_grouping_deleted'] = 'グルーピングが削除されました。';
$string['event_grouping_updated'] = 'グルーピングが更新されました。';
$string['event_group_member_added'] = 'グループメンバーが追加されました。';
$string['event_group_member_removed'] = 'グループメンバーが削除されました。';
$string['event_group_updated'] = 'グループが更新されました。';
$string['existingmembers'] = '登録済みメンバー: {$a}';
$string['filtergroups'] = 'グループをフィルタする:';
$string['group'] = 'グループ';
$string['groupaddedsuccesfully'] = 'グループ「 {$a} 」が正常に追加されました。';
$string['groupaddedtogroupingsuccesfully'] = 'グループ「 {$a->groupname} 」がグルーピング「 {$a->groupingname} 」に正常に追加されました。';
$string['groupby'] = '次の数に基づいて自動作成する';
$string['groupdescription'] = 'グループ説明';
$string['groupinfo'] = '選択したグループの情報';
$string['groupinfomembers'] = '選択したメンバーの情報';
$string['groupinfopeople'] = '選択した人の情報';
$string['grouping'] = 'グルーピング';
$string['groupingaddedsuccesfully'] = 'グルーピング「 {$a} 」が正常に追加されました。';
$string['groupingdescription'] = 'グルーピング説明';
$string['grouping_help'] = 'グルーピングはコース内のグループ群です。グルーピングが選択された場合、グルーピング内のグループに割り当てられた学生は共同で作業することができます。';
$string['groupingname'] = 'グルーピング名';
$string['groupingnameexists'] = 'グルーピング名「 {$a} 」はすでにこのコースで使用されています。他のグルーピング名を使用してください。';
$string['groupings'] = 'グルーピング';
$string['groupingsection'] = 'グルーピングアクセス';
$string['groupingsection_help'] = 'グルーピングはコース内のグループの集まりです。ここでグルーピングが選択された場合、グルーピング内のグループに属している学生のみ、セクションにアクセスすることができます。';
$string['groupingsonly'] = 'グルーピングのみ';
$string['groupmember'] = 'グループメンバー';
$string['groupmemberdesc'] = 'グループメンバーの標準ロール';
$string['groupmembers'] = 'グループメンバー';
$string['groupmembersonly'] = 'グループメンバーのみ利用可';
$string['groupmembersonlyerror'] = '申し訳ございません、あなたがこの活動を使用するには、少なくとも1つのグループメンバーである必要があります。';
$string['groupmembersonly_help'] = 'このチェックボックスがチェックされた場合、活動 (またはリソース)  は、選択されたグルーピング内のグループに属するユーザのみ利用できます。';
$string['groupmemberssee'] = 'グループメンバーを表示する';
$string['groupmembersselected'] = '選択されたグループのメンバー';
$string['groupmode'] = 'グループモード';
$string['groupmodeforce'] = 'グループモードを強制する';
$string['groupmodeforce_help'] = 'グループモードが強制された場合、コース内のすべての活動にコースグループモードが適用されます。そのため、それぞれの活動のグループモード設定は無視されます。';
$string['groupmode_help'] = 'この設定には下記3つのオプションがあります:

* グループなし - サブグループはありません。全員が1つの大きなコミュニティの一員です。
* 分離グループ - それぞれのグループメンバーはそのグループ内のみ閲覧できます。他のグループを閲覧することはできません。
* 可視グループ - それぞれのグループメンバーはそのグループ内で作業しますが、他のグループを閲覧することもできます。

コースレベルで設定されたグループモードはコース内活動すべてのデフォルトモードとなります。グループに対応している活動では、それぞれ独自のグループモードを設定することもできます。しかし、コースレベルで強制グループモードが設定された場合、活動ごとに設定したグループモードは無視されます。';
$string['groupmy'] = 'マイグループ';
$string['groupname'] = 'グループ名';
$string['groupnameexists'] = 'グループ名「 {$a} 」はすでにこのコースで使用されています。他のグループ名を使用してください。';
$string['groupnotamember'] = '申し訳ございません、あなたはそのグループのメンバーではありません。';
$string['groups'] = 'グループ';
$string['groupscount'] = 'グループ ({$a})';
$string['groupsettingsheader'] = 'グループ';
$string['groupsgroupings'] = 'グループ &amp; グルーピング';
$string['groupsinselectedgrouping'] = 'グループ:';
$string['groupsnone'] = 'グループなし';
$string['groupsonly'] = 'グループのみ';
$string['groupspreview'] = 'グループプレビュー';
$string['groupsseparate'] = '分離グループ';
$string['groupsvisible'] = '可視グループ';
$string['grouptemplate'] = 'グループ @';
$string['hidepicture'] = '画像を隠す';
$string['importgroups'] = 'グループをインポートする';
$string['importgroups_help'] = 'テキストファイル経由でグループをインポートすることができます。ファイルのフォーマットは下記のとおりです:

* それぞれの行に1レコードを記述してください。
* それぞれのレコードはカンマ区切りのデータです。
* 先頭レコードには、残りのデータのフォーマットを定義したフィールド名を記述してください。
* 必須フィールド名は「groupname」です。
* 任意フィールド名は「description」「enrolmentkey」「picture」「hidepicture」です。';
$string['javascriptrequired'] = 'このページではJavaスクリプトを有効にする必要があります。';
$string['members'] = 'グループあたりのメンバー数';
$string['membersofselectedgroup'] = 'メンバー:';
$string['namingscheme'] = 'ネーミングスキーム';
$string['namingscheme_help'] = 'アットマーク (@) を使用することにより、グループ名に文字を含むグループを作成することができます。例えば「グループ @」は「グループ A」「グループ B」「グループ C」のようなグループ名のグループを生成します。

ハッシュマーク (#) を使用することにより、グループ名に数字を含むグループを作成することができます。例えば「グループ #」は「グループ 1」「グループ 2」「グループ 3」のようなグループ名のグループを生成します。';
$string['newgrouping'] = '新しいグルーピング';
$string['newpicture'] = '新しい画像';
$string['newpicture_help'] = '<p>あなたのコンピュータから、このサーバにイメージをアップロードすることができます。アップロードしたイメージは様々な場所であなたを表すために使用されます。</p>
<p>この理由から、顔のクローズアップイメージが一番良いのですが、あなたが好きなイメージを使用することもできます。</p>
<p>画像は、JPGまたはPNG形式を使用してください (ファイル名は通常.jpgまたは.pngで終わります)。</p>
<p>あなたは、多くの方法で画像ファイルを取得することができます。次に例をあげます。</p>
<ol>
<li>デジタルカメラを使用する。ほとんどの場合、写真は正しい形式であなたのコンピュータの中に保存されます。 </li>
<li>プリント写真をスキャナでイメージファイルに取り込むこともできます。</li>
<li>あなたが絵を描けるのでしたら、ペイントプログラムで絵を描くこともできます。</li>
</ol>
<p>あなたが選択するどのような方法でも、使用したいイメージがJPGまたはPNGフォーマットであることを確認してください。</p>
<p>イメージをアップロードするには、このページの「参照」ボタンをクリックして、ハードディスクよりイメージを選択してください。</p>
<p>注意: アップロードできませんので、ファイルサイズが最大サイズを超えないようにしてください。</p>
<p>そして「プロファイルを更新する」ボタンをクリックしてください。 イメージが取り込まれて、100×100ピクセルにリサイズされます。</p>
<p>プロファイルページに戻ってもイメージが表示されなかったり、変更されない場合、あなたのブラウザの「更新」ボタンをクリックしてください。</p>';
$string['noallocation'] = '割り当てなし';
$string['nogrouping'] = 'グルーピングなし';
$string['nogroups'] = 'このコースにはまだグループが割り当てられていません。';
$string['nogroupsassigned'] = 'グループが割り当てられていません。';
$string['nopermissionforcreation'] = 'あなたには必要なパーミッションがないため、グループ「 {$a} 」を作成することはできません。';
$string['nosmallgroups'] = '最後の小グループを抑制する';
$string['notingrouping'] = '[グルーピング未登録]';
$string['nousersinrole'] = '選択したロールに適合するユーザがいません。';
$string['number'] = 'グループ/メンバー数';
$string['numgroups'] = 'グループ数';
$string['nummembers'] = 'グループあたりのメンバー数';
$string['overview'] = '概要';
$string['potentialmembers'] = '潜在的メンバー: {$a}';
$string['potentialmembs'] = '潜在的メンバー';
$string['printerfriendly'] = 'プリンタフレンドリ表示';
$string['random'] = 'ランダム';
$string['removefromgroup'] = 'グループ {$a} からユーザを削除する';
$string['removefromgroupconfirm'] = '本当にユーザ「 {$a->user} 」をグループ「 {$a->group} 」から削除してもよろしいですか?';
$string['removegroupfromselectedgrouping'] = 'グルーピングからグループを削除する';
$string['removegroupingsmembers'] = 'グルーピングからすべてのグループを削除する';
$string['removegroupsmembers'] = 'すべてのグループメンバーを削除する';
$string['removeselectedusers'] = '選択したユーザを削除する';
$string['selectfromrole'] = 'ロールからメンバーを選択する';
$string['showgroupsingrouping'] = 'グルーピングのグループを表示する';
$string['showmembersforgroup'] = 'グループのメンバーを表示する';
$string['toomanygroups'] = 'このグループ数に割り当てるユーザが不足しています - 選択したロールには {$a} 名のユーザしか存在しません。';
$string['usercount'] = 'ユーザ数';
$string['usercounttotal'] = 'ユーザ数 ({$a})';
$string['usergroupmembership'] = '選択したユーザのメンバーシップ';
