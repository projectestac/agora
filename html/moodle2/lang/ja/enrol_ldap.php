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
 * Strings for component 'enrol_ldap', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'コース 「{$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」にロール「 {$a->role_shortname} 」を割り当てる';
$string['assignrolefailed'] = 'コース 「{$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」へのロール「 {$a->role_shortname} 」の割り当てに失敗しました。';
$string['autocreate'] = '<p>Moodle内に存在しないコースにユーザが登録された場合、自動的にコースを作成することができます。</p><p>あなたが自動コース作成を有効にしている場合、次のケイパビリティの削除をお勧めします:
moodle/course:changeidnumber moodle/course:changeshortname moodle/course:changefullname moodle/course:changesummary
上で指定された4つのコースフィールド (ID number、shortname、fullnameおよびsummary) の修正を防ぐため、関連するロールより削除します。</p>';
$string['autocreate_key'] = '自動作成';
$string['autocreation_settings'] = 'コース自動作成設定';
$string['autoupdate_settings'] = '自動コース更新設定';
$string['autoupdate_settings_desc'] = '<p>同期スクリプト (enrol/ldap/cli/sync.php) 実行時に更新されるフィールドを選択してください。</p><p>少なくとも1つのフィールドが選択された場合、更新処理が実施されます。</p>';
$string['bind_dn'] = 'あなたがバインドユーザをユーザ検索に使用したい場合、ここで指定してください。次のように指定します: cn=ldapuser,ou=public,o=org';
$string['bind_dn_key'] = 'バインドユーザ識別名';
$string['bind_pw'] = 'ユーザバインドのパスワードです。';
$string['bind_pw_key'] = 'パスワード';
$string['bind_settings'] = 'バインド設定';
$string['cannotcreatecourse'] = 'コースを作成できません。LDAPレコードの必須データが不足しています!';
$string['cannotupdatecourse'] = 'コースを更新できません: LDAPレコードからの必要なデータがありません! コースIDナンバー: {$a->idnumber}';
$string['cannotupdatecourse_duplicateshortname'] = 'コースを更新できません: 省略名が重複しています。IDナンバー「 {$a->idnumber} 」のコースをスキップ ...';
$string['category'] = '自動的に作成されるコースのカテゴリです。';
$string['category_key'] = 'カテゴリ';
$string['contexts'] = 'LDAPコンテクスト';
$string['couldnotfinduser'] = 'ユーザ「 {$a} 」が見つかりませんでした。スキップします。';
$string['course_fullname'] = '任意:「名称」を取得するLDAPフィールドです。';
$string['course_fullname_key'] = '名称';
$string['course_fullname_updateonsync'] = '同期スクリプトでフルネームを更新する';
$string['course_fullname_updateonsync_key'] = 'フルネームを更新する';
$string['course_idnumber'] = 'LDAPのユニークなIDにマップしてください。通常、<em>cn</em>または<em>uid</em>です。コース自動作成を使用する場合、設定値のロックをお勧めします。';
$string['course_idnumber_key'] = 'IDナンバー';
$string['coursenotexistskip'] = 'コース「 {$a} 」が存在しないか、自動作成が無効にされています。スキップします。';
$string['course_search_sub'] = 'サブコンテクストよりグループメンバーシップを検索する';
$string['course_search_sub_key'] = 'サブコンテクストを検索する';
$string['course_settings'] = 'コース登録設定';
$string['course_shortname'] = '任意:「省略名」を取得するLDAPフィールドです。';
$string['course_shortname_key'] = '省略名';
$string['course_shortname_updateonsync'] = '同期スクリプトで省略名を更新する';
$string['course_shortname_updateonsync_key'] = '省略名を更新する';
$string['course_summary'] = '任意:「概要」を取得するLDAPフィールドです。';
$string['course_summary_key'] = '概要';
$string['course_summary_updateonsync'] = '同期スクリプトで概要を更新する';
$string['course_summary_updateonsync_key'] = '概要を更新する';
$string['courseupdated'] = 'IDナンバー「 {$a->idnumber} 」のコースが正常に更新されました。';
$string['courseupdateskipped'] = 'IDナンバー「 {$a->idnumber} 」のコースは更新を必要としません。スキップ ...';
$string['createcourseextid'] = '存在しないコース「 {$a->courseextid} 」に登録するユーザを作成します。';
$string['createnotcourseextid'] = '存在しないコース「 {$a->courseextid} 」にユーザが登録されました。';
$string['creatingcourse'] = 'コースの作成 {$a} ...';
$string['duplicateshortname'] = 'コース作成に失敗しました。省略名が重複しています。IDナンバー「 {$a->idnumber} 」のコースをスキップ ...';
$string['editlock'] = '設定値をロックする';
$string['emptyenrolment'] = 'コース「 {$a->course_shortname} 」内のロール「 {$a->role_shortname} 」に関する登録を削除します。';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'コース「 {$a->course_shortname} (id {$a->course_id}) 」にユーザ「 {$a->user_username} 」を登録します。';
$string['enroluserenable'] = 'コース「 {$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」の登録を有効にしました。';
$string['explodegroupusertypenotsupported'] = 'ldap_explode_group() は選択されたユーザタイプをサポートしません: {$a}';
$string['extcourseidinvalid'] = 'コース外部IDが正しくありません!';
$string['extremovedsuspend'] = 'コース「 {$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」の登録を無効にしました。';
$string['extremovedsuspendnoroles'] = 'コース「 {$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」の登録を無効にしてロールを削除しました。';
$string['extremovedunenrol'] = 'コース「 {$a->course_shortname} (id {$a->course_id}) 」からユーザ「 {$a->user_username} 」を登録解除します。';
$string['failed'] = '失敗!';
$string['general_options'] = '一般オプション';
$string['group_memberofattribute'] = 'ユーザまたはグループが属するグループの識別名です (例 memberOf、groupMembership等)。';
$string['group_memberofattribute_key'] = 'メンバー属性';
$string['host_url'] = '「ldap://ldap.myorg.com/」または「ldaps://ldap.myorg.com/」のようにLDAPホストをURLの形式で指定してください。';
$string['host_url_key'] = 'ホストURL';
$string['idnumber_attribute'] = 'グループメンバーシップに識別名が含まれている場合、LDAP認証プラグインのユーザ「IDナンバー」マッピングで指定されている属性と同じ属性を指定してください。';
$string['idnumber_attribute_key'] = 'IDナンバー属性';
$string['ldap_encoding'] = 'LDAPサーバで使用するエンコーディングを指定してください。ほとんどの場合、UTF-8ですが、MS AD v2ユーザデフォルトプラットフォームのエンコーディングではcp1252、cp1250等のようになります。';
$string['ldap_encoding_key'] = 'LDAPエンコーディング';
$string['ldap:manage'] = 'LDAP登録インスタンスを管理する';
$string['memberattribute'] = 'LDAPメンバー属性';
$string['memberattribute_isdn'] = 'グループメンバーシップに識別名が含まれている場合、あなたはここで指定する必要があります。その場合、このセクションの残りの項目も設定する必要があります。';
$string['memberattribute_isdn_key'] = 'ユーザDNのメンバー属性';
$string['nested_groups'] = '登録にネストグループ (グループ内のグループ) を使用しますか?';
$string['nested_groups_key'] = 'ネストグループ';
$string['nested_groups_settings'] = 'ネストグループ設定';
$string['nosuchrole'] = 'このようなロールはありません: {$a}';
$string['objectclass'] = 'コース検索に使用するobjectClassです。通常、「group」または「posixGroup」です。';
$string['objectclass_key'] = 'オブジェクトクラス';
$string['ok'] = 'OK!';
$string['opt_deref'] = 'グループメンバーシップに識別名が含まれている場合、検索時にどのようにエイリアスが処理されるか指定してください。次の値を選択してください:NO = LDAP_DEREF_NEVER またはYes = LDAP_DEREF_ALWAYS';
$string['opt_deref_key'] = 'エイリアスの修飾参照';
$string['phpldap_noextension'] = 'PHP LDAPモジュールが存在しないようです。あなたがこの登録プラグインを使用したい場合、当該モジュールがインストールおよび有効化されていることを確認してください。';
$string['pluginname'] = 'LDAP登録';
$string['pluginname_desc'] = '<p>あなたのユーザ登録をコントロールするために、LDAPサーバを使用することができます。LDAPの使用は、あなたのLDAPツリーがコースにマップするグループを含んでいること、それぞれのグループ/コース内に学生をマップするためのメンバーシップエントリを持つことを前提とします。</p>
<p>コースはLDAP内でグループとして定義され、ユニークなユーザ識別を含む、複数のメンバーシップフィールド (<em>member</em> または <em>memberUid</em>) を持っていることを前提とします。</p>
<p>LDAPを使用してユーザを登録するには、ユーザが有効なIDナンバーフィールドを<strong>持つ必要</strong>があります。LDAPグループは、ユーザがコースに登録できるよう、メンバーフィールドの中にIDナンバーを持つ必要があります。あなたがすでにLDAP認証を使用している場合、通常これらは正常に動作します。</p>
<p>ユーザ登録情報は、ユーザのログイン時に更新されます。登録情報の同期をとるため、スクリプトを実行させることもできます。<em>enrol/ldap/enrol_ldap_sync.php</em>をご覧ください。</p>
<p>このプラグインでは、新しいグループがLDAP内に作成された場合、自動的に新しいコースを作成することも可能です。</p>';
$string['pluginnotenabled'] = 'プラグインが有効にされていません!';
$string['role_mapping'] = '<p>LDAPからそれぞれのロールを割り当てるには、あなたはコースグループに割り当てられているロールのコンテクスト一覧を指定する必要があります。異なるコンテクストは「;」で分離してください。</p><p>また、あなたのLDAPサーバがグループメンバーを保持するために使用している属性も指定する必要があります。通常、「member」または「memberUid」です。</p>';
$string['role_mapping_attribute'] = '{$a} のLDAPメンバー属性';
$string['role_mapping_context'] = '{$a} のLDAPコンテクスト';
$string['role_mapping_key'] = 'LDAPからロールをマップする';
$string['roles'] = 'ロールマッピング';
$string['server_settings'] = 'LDAPサーバ設定';
$string['synccourserole'] = '== コース「 {$a->idnumber} 」をロール「 {$a->role_shortname} 」に同期';
$string['template'] = '任意: 自動的に作成されるコースでは、テンプレートコースより設定をコピーすることができます。';
$string['template_key'] = 'テンプレート';
$string['unassignrole'] = 'コース 「{$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」からロール「 {$a->role_shortname} 」を割り当て解除';
$string['unassignrolefailed'] = 'コース 「{$a->course_shortname} (id {$a->course_id}) 」のユーザ「 {$a->user_username} 」のロール「 {$a->role_shortname} 」の割り当て解除に失敗しました。';
$string['unassignroleid'] = 'ロールID「 {$a->role_id} 」をユーザID「 {$a->user_id} 」から割り当て解除';
$string['updatelocal'] = 'ローカルデータを更新する';
$string['user_attribute'] = 'グループメンバーシップに識別名が含まれている場合、name/searchユーザに使用される属性を指定してください。あなたがLDAP認証を使用している場合、この値はLDAP認証プラグインの「IDナンバー」マッピングで指定されている属性と合致する必要があります。';
$string['user_attribute_key'] = 'IDナンバー属性';
$string['user_contexts'] = 'グループメンバーシップに識別名が含まれている場合、ユーザが配置されているコンテクスト一覧を指定してください。異なるコンテクストは「;」で分離します。例えば次のようになります: ou=users,o=org; ou=others,o=org';
$string['user_contexts_key'] = 'コンテクスト';
$string['user_search_sub'] = 'グループメンバーシップに識別名が含まれている場合、ユーザ検索時にサブコンテクストも同時に検索するかどうか指定してください。';
$string['user_search_sub_key'] = 'サブコンテクストを検索する';
$string['user_settings'] = 'ユーザルックアップ設定';
$string['user_type'] = 'グループメンバーシップに識別名が含まれている場合、ユーザがLDAPにどのように保存されるか指定してください。';
$string['user_type_key'] = 'ユーザタイプ';
$string['version'] = 'あなたのサーバが使用しているLDAPプロトコルのバージョンです。';
$string['version_key'] = 'バージョン';
