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
 * Strings for component 'badges', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '操作';
$string['activate'] = 'アクセスを有効にする';
$string['activatesuccess'] = 'バッジへのアクセスが正常に有効にされました。';
$string['addbadgecriteria'] = 'バッジクライテリアを追加する';
$string['addcourse'] = 'コースを追加する';
$string['addcourse_help'] = 'このバッジの必要条件に追加するコースすべてを選択してください。複数アイテムを選択するには、CTRLキーを押したままにしてください。';
$string['addcriteria'] = 'クライテリアを追加する';
$string['addcriteriatext'] = 'クライテリアの追加を開始するには、ドロップダウンメニューよりオプションを選択してください。';
$string['addtobackpack'] = 'バックパックを追加する';
$string['adminonly'] = 'このページはサイト管理者のみに制限されています。';
$string['after'] = '- 発効日以降';
$string['aggregationmethod'] = '総計方法';
$string['all'] = 'すべて';
$string['allmethod'] = '選択したすべてのコンディションに合致する';
$string['allmethodactivity'] = '選択したすべての活動を完了する';
$string['allmethodcourseset'] = '選択したすべてのコースを完了する';
$string['allmethodmanual'] = '選択したすべてのロールがバッジを授与する';
$string['allmethodprofile'] = '選択したすべてのプロファイルフィールドを完了する';
$string['allowcoursebadges'] = 'コースバッジを有効にする';
$string['allowcoursebadges_desc'] = 'コースコンテクスト内でのバッジ作成および授与を許可します。';
$string['allowexternalbackpack'] = '外部バックパックへの接続を有効にする';
$string['allowexternalbackpack_desc'] = 'ユーザが外部バックパックプロバイダに接続およびバッジを表示できるようにします。

注意: ウェブサイトがインターネットから接続できない場合 (例 ファイアーウォールを理由として)、このオプションは空白のままにしてください。';
$string['any'] = 'いすれか';
$string['anymethod'] = '選択したコンディションのいずれかに合致する';
$string['anymethodactivity'] = '選択した活動のいずれかを完了する';
$string['anymethodcourseset'] = '選択したコースのいずれかを完了する';
$string['anymethodmanual'] = '選択したロールのいずれかがバッジを授与する';
$string['anymethodprofile'] = '選択したプロファイルフィールドのいずれかを完了する';
$string['attachment'] = 'メッセージにバッジを添付する';
$string['attachment_help'] = 'この設定を有効にした場合、ダウンロードできるよう、発行済みバッジが取得者のメールに添付されます (サイト管理 > プラグイン > メッセージアウトプット > メール」にて、添付を有効にする必要があります。';
$string['award'] = 'バッジを授与する';
$string['awardedtoyou'] = '私に発行';
$string['awardoncron'] = 'バッジへのアクセスが正常に有効にされました。多くのユーザがこのバッジを取得できます。サイトパフォーマンス確認のため、この操作には時間を要します。';
$string['awards'] = '取得者';
$string['backpackavailability'] = '外部バッジ認証';
$string['backpackavailability_help'] = 'あなたからバッジを取得したことをバッジ取得者が証明するため、あなたのサイトに外部バックパックサービスがアクセスして、バッジが発行されたこを証明できるようにする必要があります。現在、あなたのサイトにはアクセスできないようです。これはあなたがすでに発行したバッジ、または将来的に発行するバッジを証明できないことを意味します。

**なぜ私はこのメッセージを閲覧しているのですか?**

あなたのファイアーウォールが外部ユーザからネットワークへのアクセスを回避している、あなたのサイトがパスワードにより保護されている、またはインターネットから利用できないコンピュータ (ローカル開発マシン等) 上でサイトが運用されていることが考えられます。

**これは問題ですか?**

あなたがバッジ発行を計画している場合、この実運用サイト上の問題を修正する必要があります。そうでない場合、あなたからバッジを取得したことを取得者が証明できないようになります。あなたのサイトがまだ稼動していない場合、稼動前にサイトにアクセス可能である限り、あなたはテストバッジを作成および発行することができます。

**私のサイト全体を誰からでもアクセス可能にできない場合は?**

証明に必要な唯一のURLは「[your-site-url]/badges/assertion.php」です。このファイルに外部からアクセスできるよう、あなたのファイアーウォールを変更できる場合、バッジ証明を実現することができます。';
$string['backpackbadges'] = 'あなたには {$a->totalcollections} 件のコレクションから表示される {$a->totalbadges} 個のバッジがあります。<a href="mybackpack.php">バックパック設定を変更してください</a>。';
$string['backpackconnection'] = 'バックパック接続';
$string['backpackconnection_help'] = 'このページにおいて、あなたは外部バックパックプロバイダとの接続を設定することができます。バックパックに接続することで、あなたはこのサイト内に外部バッジを表示すること、そしてここで取得したバッジをバックパックに送信することができます。

現在、<a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>のみサポートされています。このページのバックパック接続を設定する前、あなたはバックパックサービスにサインアップする必要があります。';
$string['backpackdetails'] = 'バックパック設定';
$string['backpackemail'] = 'メールアドレス';
$string['backpackemail_help'] = 'あなたのバックパックに関するメールアドレスです。あなたが接続している間、このサイトで取得したすべてのバッジは、このメールアドレスに関連付けられます。';
$string['backpackimport'] = 'バッジインポート設定';
$string['backpackimport_help'] = 'バックパック接続が正常に確立された後、あなたのバックパックからのバッジを「マイバッジ」ページおよびプロファイルページに表示することができます。

このエリアでは、あなたのプロファイルに表示したいバックパックからのバッジのコレクションを選択することができます。';
$string['badgedetails'] = 'バッジ詳細';
$string['badgeimage'] = 'イメージ';
$string['badgeimage_help'] = 'このバッジが発行される時に使用されるイメージです。

新しいイメージを追加するには、イメージ (JPGまたはPNG) を参照および選択して、「変更を保存する」をクリックしてください。イメージは正方形にトリミングされ、バッジイメージ要件に合致するよう、リサイズされます。';
$string['badgeprivacysetting'] = 'バッジプライバシー設定';
$string['badgeprivacysetting_help'] = 'あなたのアカウントプロファイルページに取得したバッジを表示することができます。この設定において、あなたは新しく取得したバッジの可視性を自動的に設定することができます。

あなたは「マイバッジ」ページにて、個別のバッジのプライバシー設定をコントロールすることもできます。';
$string['badgeprivacysetting_str'] = '私が取得したバッジをプロファイルページに自動的に表示する';
$string['badgesalt'] = '取得者のメールアドレスをハッシュするためのSalt';
$string['badgesalt_desc'] = 'ハッシュを使用することで、バックパックサービスはバッジ取得者のメールアドレスをさらさずに本人を確認することができます。この設定には数字および文字のみ使用してください。

注意: 取得者を証明するため、あなたがバッジを発行した後はこの設定を変更しないでください。';
$string['badgesdisabled'] = 'このサイトにおいて、バッジは有効にされていません。';
$string['badgesearned'] = '取得バッジ数: {$a}';
$string['badgesettings'] = 'バッジ設定';
$string['badgestatus_0'] = 'ユーザ利用不可';
$string['badgestatus_1'] = 'ユーザ利用可';
$string['badgestatus_2'] = 'ユーザ利用不可';
$string['badgestatus_3'] = 'ユーザ利用可';
$string['badgestatus_4'] = 'アーカイブ';
$string['badgestoearn'] = '利用可能なバッジ数: {$a}';
$string['badgesview'] = 'コースバッジ';
$string['badgeurl'] = '発行済みバッジリンク';
$string['bawards'] = '取得者 ({$a})';
$string['bcriteria'] = 'クライテリア';
$string['bdetails'] = '詳細を編集する';
$string['bmessage'] = 'メッセージ';
$string['boverview'] = '概要';
$string['bydate'] = '完了日:';
$string['clearsettings'] = '設定をクリアする';
$string['completioninfo'] = 'このバッジは完了に対して発行されました:';
$string['completionnotenabled'] = 'このコースのコース完了が有効にされていないため、バッジクライテリアに含むことはできません。コース設定にて、コース完了を有効にすることができます。';
$string['configenablebadges'] = '有効にした場合、あなたがバッジを作成して、サイトユーザに授与することができるようになります。';
$string['configuremessage'] = 'バッジメッセージ';
$string['connect'] = '接続';
$string['connected'] = '接続済み';
$string['connecting'] = '接続中 ...';
$string['contact'] = '連絡先';
$string['contact_help'] = 'バッジ発行者に関するメールアドレスです。';
$string['copyof'] = '{$a} のコピー';
$string['coursebadges'] = 'バッジ';
$string['coursebadgesdisabled'] = 'このサイトにおいて、コースバッジは有効にさていません。';
$string['coursecompletion'] = 'ユーザはこのコースを完了する必要があります。';
$string['create'] = '新しいバッジ';
$string['createbutton'] = 'バッジを作成する';
$string['creatorbody'] = '<p>{$a->user} 名のユーザがバッジ必要条件すべてを満たしたため、バッジが授与されました。発行済みバッジは {$a->link} でご覧ください。</p>';
$string['creatorsubject'] = '「 {$a} 」が授与されました!';
$string['criteria_0'] = 'このバッジは以下の場合に授与されます ...';
$string['criteria_1'] = '活動完了';
$string['criteria_1_help'] = 'コース内の一連の活動完了を基に、ユーザがバッジを授与されるようにします。';
$string['criteria_2'] = 'ロールによる手動発行';
$string['criteria_2_help'] = 'サイトまたはコース内の特定ロールのユーザが手動でバッジを授与できるようにします。';
$string['criteria_3'] = '社会参加';
$string['criteria_3_help'] = 'ソーシャル';
$string['criteria_4'] = 'コース完了';
$string['criteria_4_help'] = 'コースを完了したユーザへのバッジ授与を許可します。このクライテリアには、最小評点およびコース完了日等の付加なパラメータを追加することができます。';
$string['criteria_5'] = '一連のコース完了';
$string['criteria_5_help'] = '一連のコースを完了したユーザへのバッジ授与を許可します。それぞれのコースには、最小評点およびコース完了日等の付加なパラメータを追加することができます。';
$string['criteria_6'] = 'プロファイル完了';
$string['criteria_6_help'] = '特定のプロファイルフィールドを完了したユーザへのバッジ授与を許可します。あなたはユーザが利用できるフィールドをデフォルトおよびカスタムプロファイルフィールドから選択することができます。';
$string['criteriacreated'] = 'バッジクライテリアが正常に作成されました。';
$string['criteriadeleted'] = 'バッジクライテリアが正常に削除されました。';
$string['criteria_descr'] = '次の必要条件を完了した場合、ユーザにこのバッジが授与されます:';
$string['criteria_descr_0'] = '一覧表示された必要条件の「 {$a} 」を完了した場合、ユーザにこのバッジが授与されます。';
$string['criteria_descr_1'] = '「 {$a} 」の次の活動が完了しました:';
$string['criteria_descr_2'] = 'このバッジは下記ロールの<strong>{$a}</strong> のユーザによって授与される必要があります:';
$string['criteria_descr_4'] = 'ユーザはコースを完了する必要がある';
$string['criteria_descr_5'] = '「 {$a} 」 の次のコースを完了する必要があります:';
$string['criteria_descr_6'] = '「 {$a} 」 の次のユーザプロファイルフィールドを完了する必要があります:';
$string['criteria_descr_bydate'] = 'by {$a}';
$string['criteria_descr_grade'] = '最小評点 = {$a}';
$string['criteria_descr_short0'] = '完了対象「 {$a} 」:';
$string['criteria_descr_short1'] = '完了対象「 {$a} 」:';
$string['criteria_descr_short2'] = '授与者「 {$a} 」:';
$string['criteria_descr_short4'] = 'コースを完了する';
$string['criteria_descr_short5'] = '完了対象「 {$a} 」:';
$string['criteria_descr_short6'] = '完了対象「 {$a} 」:';
$string['criteria_descr_single_1'] = '以下の活動が完了しました:';
$string['criteria_descr_single_2'] = 'このバッジは次のロールのユーザによって授与する必要があります:';
$string['criteria_descr_single_4'] = 'ユーザはコースを完了する必要がある';
$string['criteria_descr_single_5'] = '以下のコースを完了する必要があります:';
$string['criteria_descr_single_6'] = '次のユーザプロファイルフィールドを完了する必要があります:';
$string['criteria_descr_single_short1'] = '完了:';
$string['criteria_descr_single_short2'] = '授与者:';
$string['criteria_descr_single_short4'] = 'コースを完了する';
$string['criteria_descr_single_short5'] = '完了:';
$string['criteria_descr_single_short6'] = '完了:';
$string['criteriasummary'] = 'クライテリア概要';
$string['criteriaupdated'] = 'バッジクライテリアが正常に更新されました。';
$string['criterror'] = '現在のパラメータ問題';
$string['criterror_help'] = 'このフィールドセットでは、このバッジ要件に最初に追加されたすべてのパラメーを表示していますが、現在利用できません。将来的にユーザがバッジを取得できるよう、このようなバッジのチェックを外すことをお勧めします。';
$string['currentimage'] = '現在のイメージ';
$string['currentstatus'] = '現在のステータス:';
$string['dateawarded'] = '発効日';
$string['dateearned'] = '日付: {$a}';
$string['day'] = '日';
$string['deactivate'] = 'アクセスを無効にする';
$string['deactivatesuccess'] = 'バッジへのアクセスが正常に無効にされました。';
$string['defaultissuercontact'] = 'デフォルトのバッジ発行者連絡先詳細';
$string['defaultissuercontact_desc'] = 'バッジ発行者に関連付けられるメールアドレスです。';
$string['defaultissuername'] = 'デフォルトのバッジ発行者名';
$string['defaultissuername_desc'] = '発行担当者名または機関名です。';
$string['delbadge'] = 'バッジを削除する';
$string['delconfirm'] = '本当にバッジ「 {$a} 」を削除してもよろしいですか?';
$string['delcritconfirm'] = '本当にこのクライテリアを削除してもよろしいですか?';
$string['delparamconfirm'] = '本当にこのパラメータを削除してもよろしいですか?';
$string['description'] = '説明';
$string['disconnect'] = '接続解除';
$string['donotaward'] = '現在、このバッジは有効ではないため、ユーザに授与することはできません。このバッジを授与したい場合、ステータスを有効にしてください。';
$string['editsettings'] = '設定を編集する';
$string['enablebadges'] = 'バッジを有効にする';
$string['error:backpackdatainvalid'] = 'バックパックから戻されたデータが有効ではありません。';
$string['error:backpackemailnotfound'] = 'メールアドレス「 {$a} 」はバックパックに関連付けられていません。あなたはアカウントの<a href="http://backpack.openbadges.org">バックパックを作成</a> または別のメールアドレスでログインする必要があります。';
$string['error:backpackloginfailed'] = '次の理由により、あなたは外部バックパックに接続できませんでした: {$a}';
$string['error:backpacknotavailable'] = 'あなたのサイトにインターネットからアクセスすることができません。そのため、このサイトから発行されたバッジを外部バックパックサービスにより確認することはできません。';
$string['error:backpackproblem'] = 'あなたのバックパックサービスプロバイダへの接続中にエラーが発生しました。後ほど再度お試しください。';
$string['error:badjson'] = '接続に無効なデータが戻されました。';
$string['error:cannotact'] = 'バッジを有効にできません。';
$string['error:cannotawardbadge'] = 'ユーザにバッジを授与できません。';
$string['error:clone'] = 'バッジを複製できません。';
$string['error:connectionunknownreason'] = '接続に成功しませんでしたが、理由は与えられていません。';
$string['error:duplicatename'] = '当該名称のバッジはすでにシステム内に登録されています。';
$string['error:externalbadgedoesntexist'] = 'バッジが見つかりませんでした。';
$string['error:guestuseraccess'] = '現在、あなたはユーザアクセスを使用しています。バッジを閲覧するには、あなたのユーザアカウントでログインする必要があります。';
$string['error:invalidbadgeurl'] = '無効なバッジ発行者URLフォーマットです。';
$string['error:invalidcriteriatype'] = '無効なクライテリアタイプです。';
$string['error:invalidexpiredate'] = '有効期限は将来の日付にしてください。';
$string['error:invalidexpireperiod'] = '有効期間はマイナスまたはゼロに設定することはできません。';
$string['error:noactivities'] = 'このコースには完了クライテリアが有効にされている活動はありません。';
$string['error:noassertion'] = 'ペルソナからアサーションが戻されませんでした。ログインプロセスが完了する前に、あなたがダイアログを閉じた可能性があります。';
$string['error:nocourses'] = 'このサイト内でコース完了が有効にされているコースがないため、何も表示できません。あなたはコース設定ページにて、コース完了を有効にすることができます。';
$string['error:nogroups'] = '<p>あなたのバックパックで利用できるパブリックコレクションのバッジはありません。</p>
<p>パブリックコレクションのみ表示されます。パブリックコレクションを作成するには、<a href="http://backpack.openbadges.org">あなたのバックパックにアクセスしてください</a>。</p>';
$string['error:nopermissiontoview'] = 'あなたにはバッジ取得者を閲覧するパーミッションがありません。';
$string['error:nosuchbadge'] = 'ID {$a} のバッジは存在しません。';
$string['error:nosuchcourse'] = '警告: このコースは利用できません。';
$string['error:nosuchfield'] = '警告: このユーザプロファイルは利用できません。';
$string['error:nosuchmod'] = '警告: この活動は利用できません。';
$string['error:nosuchrole'] = '警告: このロールは利用できません。';
$string['error:nosuchuser'] = 'このメールアドレスのユーザは現在のバックパックプロバイダのアカウントを所有していません。';
$string['error:notifycoursedate'] = '注意: コースおよび活動完了に関連付けられているバッジは、コース開始日まで発行されません。';
$string['error:parameter'] = '警告: 正しいバッジ発行ワークフローを確かにするため、少なくとも1つのパラメータを選択してください。';
$string['error:personaneedsjs'] = '現在、あなたのバックパックへの接続にJavaスクリプトが必要です。可能であれば、Javaスクリプトを有効にして、ページをリロードしてください。';
$string['error:requesterror'] = '接続リクエストに失敗しました (エラーコード {$a})。';
$string['error:requesttimeout'] = '完了する前に接続リクエストがタイムアウトしました。';
$string['error:save'] = 'バッジを保存できません。';
$string['error:userdeleted'] = '{$a->user} (このユーザは {$a->site} に存在しません)';
$string['evidence'] = 'エビデンス';
$string['existingrecipients'] = '既存のバッジ取得者';
$string['expired'] = '有効期限切れ';
$string['expiredate'] = 'このバッジは {$a} に有効期限が切れます。';
$string['expireddate'] = 'このバッジは {$a} に有効期限が切れました。';
$string['expireperiod'] = 'このバッジは発行後 {$a}  日で有効期限が切れます。';
$string['expireperiodh'] = 'このバッジは発行後 {$a}  時間で有効期限が切れます。';
$string['expireperiodm'] = 'このバッジは発行後 {$a}  分で有効期限が切れます。';
$string['expireperiods'] = 'このバッジは発行後 {$a}  秒で有効期限が切れます。';
$string['expirydate'] = '有効期限';
$string['expirydate_help'] = '任意で、特定の日付、またはユーザへのバッジ発行日を基に計算される日付にて、バッジを有効期限切れにすることができます。';
$string['externalbadges'] = '他のウェブサイトからのマイバッジ';
$string['externalbadges_help'] = 'このエリアでは、あなたの外部バックパックからのバッジを表示します。';
$string['externalbadgesp'] = '他のウェブサイトからのバッジ:';
$string['externalconnectto'] = '外部バッジを表示するには、あなたは<a href="{$a}">バックパックに接続する</a>必要があります。';
$string['fixed'] = '指定期日';
$string['hidden'] = '非表示';
$string['hiddenbadge'] = '残念ですが、バッジ所有者はこの情報を利用できるようにしていません。';
$string['issuancedetails'] = 'バッジ有効期限';
$string['issuedbadge'] = '発行済みバッジ情報';
$string['issuerdetails'] = '発行者詳細';
$string['issuername'] = '発行者名';
$string['issuername_help'] = '発行担当者名または機関名です。';
$string['issuerurl'] = '発行者URL';
$string['localbadges'] = '{$a} ウェブサイトからのマイバッジ';
$string['localbadgesh'] = 'このウェブサイトからのマイバッジ';
$string['localbadgesh_help'] = 'コース、コース活動および他の要件を完了することで取得したすべてのバッジです。

あなたのプロファイルページでのバッジ公開または非公開に関して、ここで管理することができます。

あなたのバッジすべてまたは個別のバッジをダウンロードして、あなたのコンピュータに保存することができます。あなたはダウンロードしたバッジを外部バックパックサービスに追加することができます。';
$string['localbadgesp'] = '{$a} からのバッジ:';
$string['localconnectto'] = 'これらのバッジをこのウェブサイトの外で共有するには、<a href="{$a}">バックパックに接続してください</a>。';
$string['makeprivate'] = '非公開にする';
$string['makepublic'] = '公開する';
$string['managebadges'] = 'バッジを管理する';
$string['message'] = 'メッセージ本文';
$string['messagebody'] = '<p>あなたにバッジ「 %badgename% 」が授与されました!</p>
<p>このバッジに関する詳細情報は、%badgelink% をご覧ください。</p>
<p>あなたは「 {$a} 」ページにて、バッジを管理およびダウンロードすることができます。</p>';
$string['messagesubject'] = 'おめでとうございます! あなたはバッジを取得しました!';
$string['method'] = 'このクライテリアは以下の場合に完了します ...';
$string['mingrade'] = '必要最小評点:';
$string['month'] = '月';
$string['mybackpack'] = 'マイバックパック設定';
$string['mybadges'] = 'マイバッジ';
$string['never'] = 'なし';
$string['newbadge'] = '新しいバッジを追加する';
$string['newimage'] = '新しいイメージ';
$string['noawards'] = 'このバッジはまだ取得されていません。';
$string['nobackpack'] = 'このアカウントに接続しているバックパックサービスはありません。<br/>';
$string['nobackpackbadges'] = 'あなたが選択したコレクション内にバッジはありません。<a href="mybackpack.php">さらにコレクションを追加してください</a>。';
$string['nobackpackcollections'] = 'バッジコレクションは選択されていません。<a href="mybackpack.php">コレクションを追加してください</a>。';
$string['nobadges'] = '利用できるバッジはありません。';
$string['nocriteria'] = 'このバッジのクライテリアはまだ設定されていません。';
$string['noexpiry'] = 'このバッジには有効期限がありません。';
$string['noparamstoadd'] = 'このバッジ必要条件に追加できる追加パラメータはありません。';
$string['notacceptedrole'] = 'あなたの現在のロール割り当ては、このバッジを手動で授与することのできるロールではありません。<br/> すでにこのバッジを取得しているユーザを閲覧するには、 {$a} ページにアクセスしてください。';
$string['notconnected'] = '未接続';
$string['nothingtoadd'] = '追加できるクライテリアはありません。';
$string['notification'] = 'バッジ作成者に通知する';
$string['notification_help'] = 'この設定では、バッジ発行をバッジ作成者に知らせるための通知送信を管理します。

以下のオプションを利用できます:

* **なし** – 通知を送信しません。

* **毎回** – このバッジが授与される度に通知を送信します。

* **日毎** – 通知を1日1回送信します。

* **週毎** – 通知を週に1回送信します。

* **月毎** – 通知を月に1回送信します。';
$string['notifydaily'] = '日';
$string['notifyevery'] = '毎回';
$string['notifymonthly'] = '月';
$string['notifyweekly'] = '週';
$string['numawards'] = 'このバッジは <a href="{$a->link}">{$a->count}</a> 名のユーザに発行されました。';
$string['numawardstat'] = 'このバッジは {$a} 名のユーザに発行されました。';
$string['overallcrit'] = 'の選択されたクライテリアが完了した場合';
$string['personaconnection'] = 'あなたのメールアドレスでログインする';
$string['personaconnection_help'] = 'ペルソナはあなたのメールアドレスを使用して、あなた自身をウェブにおいて特定するためのシステムです。オープンバッジバックパックはペルソナログインシステムを使用します。そのため、バックパックに接続するには、あなたはペルソナアカウントが必要です。

ペルソナに関するさらなる情報は、<a href="https://login.persona.org/about">https://login.persona.org/about</a>にアクセスしてください。';
$string['potentialrecipients'] = '潜在的なバッジ取得者';
$string['recipientdetails'] = '取得者詳細';
$string['recipientidentificationproblem'] = '既存のユーザの中から、このバッジの取得者を見つけることはできません。';
$string['recipients'] = 'バッジ取得者';
$string['recipientvalidationproblem'] = 'このバッジの取得者として、現在のユーザを確認できません。';
$string['relative'] = '相対期限';
$string['requiredcourse'] = '少なくとも1コースをコースセットクライテリアに追加する必要があります。';
$string['reviewbadge'] = 'バッジアクセスの変更';
$string['reviewconfirm'] = '<p>あなたのバッジをユーザに表示して、取得できるようにします。</p>

<p>あなたがバッジを有効にした直後、このバッジのクライテリアをすでに満たしているユーザに対して、このバッジを発行することができます。</p>

<p>バッジが発行された場合、<strong>ロックされます</strong> - クライテリアおよび有効期限設定を含む特定の設定は変更できないようになります。</p>

<p>本当にバッジ「 {$a} 」へのアクセスを有効にしてもよろしいですか?</p>';
$string['save'] = '保存';
$string['searchname'] = '名称で検索する';
$string['selectaward'] = 'あなたがこのバッジの授与に使用したいロールを選択してください:';
$string['selectgroup_end'] = 'パブリックコレクションのみ表示されます。さらにパブリックコレクションを作成するには、<a href="http://backpack.openbadges.org">あなたのバックパックにアクセスしてください</a>。';
$string['selectgroup_start'] = 'このサイトに表示するため、あなたのバックパックからコレクションを選択してください:';
$string['selecting'] = '選択したバッジに対して ...';
$string['setup'] = '接続をセットアップする';
$string['signinwithyouremail'] = 'あなたのメールアドレスでログインする';
$string['sitebadges'] = 'サイトバッジ';
$string['sitebadges_help'] = 'サイトバッジはサイト関連活動のみに関して、ユーザに授与することができます。これには一連のコースまたはユーザプロファイルの一部の完了も含みます。サイトバッジはユーザから別のユーザに発行することもできます。

コース関連活動のバッジはコースレベルで作成する必要があります。コースバッジは「コース管理 > バッジ」にて、確認することができます。';
$string['status'] = 'バッジステータス';
$string['status_help'] = 'バッジステータスはシステム内での動作を決定します:

* **利用可** – このバッジをユーザが取得できることを意味します。ユーザがバッジを利用できるのに対して、そのクライテリアを修正することはできません。

* **利用不可** – このバッジをユーザが取得できないこと、また手動で発行できないことを意味します。以前に発行されたことのないバッジの場合、そのクライテリアを修正することができます。

少なくとも1名のユーザにバッジが発行された場合、自動的に「ロック」されます。ロックされたバッジはユーザによって取得されることができますが、クライテリアを修正することはできません。ロックされたバッジの詳細またはクライテリアを修正したい場合、あなたはこのバッジを複製して、必要な修正すべてを適用することができます。

*なぜ私たちはバッジをロックするのですか?*

私たちはすべてのユーザが同じ要件でバッジを取得できることを確実にしたいと考えています。現在、バッジを取り消すことはできません。私たちがいつでもバッジ要件を修正できるようにした場合、ユーザが完全に異なる要件で同じバッジを取得することになってしまいます。';
$string['statusmessage_0'] = '現在、ユーザはこのバッジを利用できません。あなたがユーザにこのバッジを取得できるようにしたい場合、アクセスを有効にしてください。';
$string['statusmessage_1'] = '現在、ユーザはこのバッジを利用できます。変更する場合、アクセスを無効にしてください。';
$string['statusmessage_2'] = '現在、ユーザはこのバッジを利用できません。クライテリアはロックされています。あなたがユーザにこのバッジを取得できるようにしたい場合、アクセスを有効にしてください。';
$string['statusmessage_3'] = '現在、ユーザはこのバッジを利用できます。クライテリアはロックされています。';
$string['statusmessage_4'] = '現在、このバッジはアーカイブされています。';
$string['subject'] = 'メッセージ件名';
$string['variablesubstitution'] = 'メッセージ内の変数置換です。';
$string['variablesubstitution_help'] = 'バッジメッセージにおいて、メッセージ送信時に実際の文字と置換するよう、メッセージの件名および本文に変数を入れることができます。変数は下記に表示されているものと厳密に同じようにテキストに入れてください。以下の変数を使用することができます:

%badgename%
: これはバッジフルネームと置換されます。

%username%
: これは取得者のフルネームと置換されます。

%badgelink%
: これは発行済みバッジ情報の公開されたURLと置換されます。';
$string['viewbadge'] = '発行済みバッジを表示する';
$string['visible'] = '表示';
$string['warnexpired'] = '(このバッジの有効期限は切れています!)';
$string['year'] = '年';
