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
 * Strings for component 'auth_ldap', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_ldap_ad_create_req'] = 'Active Directoryに新しいアカウントを作成できません。アカウントを作成するためのすべての必要条件 (LDAPSコネクション、必要な権限を持ったユーザのバインド等) に合致しているか確認してください。';
$string['auth_ldap_attrcreators'] = 'メンバーが属性の作成を許可されているグループまたはコンテクストの一覧です。複数のグループは、「;」で区切ってください。通常、「cn=teachers,ou=staff,o=myorg」のように指定します。';
$string['auth_ldap_attrcreators_key'] = '属性作成者';
$string['auth_ldap_auth_user_create_key'] = '外部にユーザを作成する';
$string['auth_ldap_bind_dn'] = 'あなたがユーザ検索にバインドユーザを使用したい場合、ここで指定してください。「cn=ldapuser,ou=public,o=org」のように指定します。';
$string['auth_ldap_bind_dn_key'] = '識別名';
$string['auth_ldap_bind_pw'] = 'ユーザバインドのパスワード';
$string['auth_ldap_bind_pw_key'] = 'パスワード';
$string['auth_ldap_bind_settings'] = 'バインド設定';
$string['auth_ldap_changepasswordurl_key'] = 'パスワード変更URL';
$string['auth_ldap_contexts'] = 'ユーザが配置されているコンテクスト一覧です。異なるコンテクストは「;」で区切ってください。例 「ou=users,o=org; ou=others,o=org」';
$string['auth_ldap_contexts_key'] = 'コンテクスト';
$string['auth_ldap_create_context'] = 'メールによるアカウント登録確認でユーザを作成する場合、ユーザが作成されるコンテクストを指定してください。セキュリティの観点から、このコンテクストはユーザごとに異なるものにしてください。このコンテクストからMoodleが自動的にユーザを探しますので、このコンテクストをldap_context-vaiableに追加する必要はありません。<br /><b>注意!</b> ユーザ作成を動作させるため、auth/ldap/auth.phpファイルのuser_create() 関数を修正する必要があります。';
$string['auth_ldap_create_context_key'] = '新しいユーザのコンテクスト';
$string['auth_ldap_create_error'] = 'LDAPユーザ作成中にエラーが発生しました。';
$string['auth_ldap_creators'] = 'メンバーが新しいコースの作成を許可されているグループの一覧です。複数のグループは、「;」で区切ってください。通常、「cn=teachers,ou=staff,o=myorg」のように指定します。';
$string['auth_ldap_creators_key'] = 'コース作成者';
$string['auth_ldapdescription'] = 'この方法では外部のLDAPサーバに対して認証を提供します。ユーザ名およびパスワードが正しい場合、Moodleは新しいユーザをデータベースに作成します。このモジュールはユーザ属性をLDAPから取得して、Moodleのフィールドに入力します。認証後のログインではユーザ名およびパスワードのみ確認されます。';
$string['auth_ldap_expiration_desc'] = 'パスワードチェックの有効期限を無効にする場合、またはLDAPがLDAPサーバから直接passwordexpirationを参照する場合、「No」を選択してください。';
$string['auth_ldap_expiration_key'] = '有効期限切れ';
$string['auth_ldap_expiration_warning_desc'] = 'パスワードの有効期限切れを警告するまでの日数を入力してください。';
$string['auth_ldap_expiration_warning_key'] = '有効期限切れを警告';
$string['auth_ldap_expireattr_desc'] = '任意: パスワード有効期限を保持するldap属性をオーバーライドします。';
$string['auth_ldap_expireattr_key'] = '有効期限切れ属性';
$string['auth_ldapextrafields'] = 'これらのフィールドは、任意項目です。<b>LDAPフィールド</b>より事前に入力されたMoodleユーザフィールドを選択することも可能です。<p>空白の場合、LDAPよりデータは転送されず、代わりにMoodleのデフォルト値が使用されます。</p><p>どちらの場合でも、ユーザはログイン後、すべてのフィールドを編集することができます。</p>';
$string['auth_ldap_graceattr_desc'] = '任意: 猶予ログイン属性をオーバーライドします。';
$string['auth_ldap_gracelogin_key'] = '猶予ログイン属性';
$string['auth_ldap_gracelogins_desc'] = 'LDAPの猶予ログインサポートを有効にします。パスワードの有効期限が切れた後、猶予ログインカウントがゼロになるまでログインすることができます。この設定を「Yes」にすることで、パスワードが期限切れになった場合、猶予ログインメッセージが表示されます。';
$string['auth_ldap_gracelogins_key'] = '猶予ログイン';
$string['auth_ldap_groupecreators'] = 'メンバーがグループの作成を許可されているグループまたはコンテクストの一覧です。複数のグループは、「;」で区切ってください。通常、「cn=teachers,ou=staff,o=myorg」のように指定します。';
$string['auth_ldap_groupecreators_key'] = 'グループ作成者';
$string['auth_ldap_host_url'] = 'LDAPホストのURLを「ldap://ldap.myorg.com/」または「ldaps://ldap.myorg.com/」のように明示してください。複数サーバのフェイルオーバーをサポートするには「;」で区切ってください。';
$string['auth_ldap_host_url_key'] = 'ホストURL';
$string['auth_ldap_ldap_encoding'] = 'LDAPサーバで使用するエンコーディングを指定してください。ほとんどの場合、UTF-8ですが、MS AD v2ユーザデフォルトプラットフォームのエンコーディングでは、cp1252、cp1250等のようになります。';
$string['auth_ldap_ldap_encoding_key'] = 'LDAPエンコーディング';
$string['auth_ldap_login_settings'] = 'ログイン設定';
$string['auth_ldap_memberattribute'] = '任意: ユーザがグループに属している場合、ユーザメンバーをオーバライドします。通常、「member」です。';
$string['auth_ldap_memberattribute_isdn'] = '任意: メンバー属性値を0または1でオーバーライドします。';
$string['auth_ldap_memberattribute_isdn_key'] = 'ユーザDNのメンバー属性';
$string['auth_ldap_memberattribute_key'] = 'メンバー属性';
$string['auth_ldap_noconnect'] = 'LDAPモジュールがサーバに接続できません: {$a}';
$string['auth_ldap_noconnect_all'] = 'LDAPモジュールがすべてのサーバに接続できません: {$a}';
$string['auth_ldap_noextension'] = '<em>警告: PHP LDAPモジュールがインストールされていないようです。あなたがこの認証プラグインを使用したい場合、インストールおよび有効にされているかどうか確認してください。</em>';
$string['auth_ldap_no_mbstring'] = 'Active Directoryにアカウントを作成するには、mbstring拡張モジュールが必要です。';
$string['auth_ldapnotinstalled'] = 'LDAP認証を使用できません。PHP LDAPモジュールがインストールされていません。';
$string['auth_ldap_objectclass'] = '任意: ldap_user_typeのname/searchユーザで使用されるオブジェクトクラスをオーバーライドします。通常、この設定を変更する必要はありません。';
$string['auth_ldap_objectclass_key'] = 'オブジェクトクラス';
$string['auth_ldap_opt_deref'] = '検索時、エイリアスをどのように扱うか、次の値から選択してください: 「No」 (LDAP_DEREF_NEVER) または 「Yes」 (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'エイリアスの修飾参照';
$string['auth_ldap_passtype'] = 'LDAPサーバで使用する新規または変更パスワードのフォーマットを指定してください。';
$string['auth_ldap_passtype_key'] = 'パスワードフォーマット';
$string['auth_ldap_passwdexpire_settings'] = 'LDAPパスワード有効期限設定';
$string['auth_ldap_preventpassindb'] = 'Moodleデータベースにパスワードが保存されることを防ぐには、「Yes」を選択してください。';
$string['auth_ldap_preventpassindb_key'] = 'パスワードを秘匿する';
$string['auth_ldap_search_sub'] = 'サブコンテクストからユーザを検索します。';
$string['auth_ldap_search_sub_key'] = 'サブコンテクストを検索する';
$string['auth_ldap_server_settings'] = 'LDAPサーバ設定';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create() は選択された次のユーザタイプをサポートしていません: {$a}';
$string['auth_ldap_update_userinfo'] = 'LDAPよりMoodleのユーザ情報 (姓、名、住所等) を更新します。必要に応じて、「データマッピング」設定を指定してください。';
$string['auth_ldap_user_attribute'] = '任意: name/searchユーザに使用される属性をオーバーライドします。通常は「cn」です。';
$string['auth_ldap_user_attribute_key'] = 'ユーザ属性';
$string['auth_ldap_user_exists'] = 'LDAPユーザ名は、すでに登録されています。';
$string['auth_ldap_user_settings'] = 'ユーザルックアップ設定';
$string['auth_ldap_user_type'] = 'ユーザがどのようにLDAPに保存されるか選択してください。また、この設定では、どのようにログイン有効期限、猶予ログイン、ユーザ作成が動作するか指定します。';
$string['auth_ldap_user_type_key'] = 'ユーザタイプ';
$string['auth_ldap_usertypeundefined'] = 'config.user_typeが定義されていないか、動作していません。ldap_expirationtime2unixは、選択されたユーザタイプをサポートしません!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_typeが定義されていないか、動作していません。ldap_unixi2expirationtimeは、選択されたユーザタイプをサポートしません!';
$string['auth_ldap_version'] = 'あなたのサーバが使用しているLDAPプロトコルのバージョンです。';
$string['auth_ldap_version_key'] = 'バージョン';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = '「Yes」にした場合、NTLMドメインでシングルサインオンを試みます。<strong>注意:</strong> 動作させるには、ウェブサーバに対して追加のセットアップが必要です。詳細は、 <a href="http://docs.moodle.org/en/NTLM_authentication">http://docs.moodle.org/en/NTLM_authentication</a>をご覧ください。';
$string['auth_ntlmsso_enabled_key'] = '有効';
$string['auth_ntlmsso_ie_fastpath'] = '有効にした場合、NTLM SSO高速経路 (fast path) が有効にされます (クライアントブラウザがMS Internet Explorerの場合、特定のステップをバイパスします)。';
$string['auth_ntlmsso_ie_fastpath_attempt'] = 'すべてのブラウザにNTLMを試みます';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE fast path?';
$string['auth_ntlmsso_ie_fastpath_yesattempt'] = 'はい、他のブラウザにNTLMを試みます';
$string['auth_ntlmsso_ie_fastpath_yesform'] = 'はい、他のすべてのブラウザでは標準的なログインフォームを使用します';
$string['auth_ntlmsso_maybeinvalidformat'] = 'REMOTE_USERヘッダからユーザ名を抽出できません。フォーマットは正しく設定されていますか?';
$string['auth_ntlmsso_missing_username'] = 'あなたはリモートユーザ名フォーマットに少なくとも %username% を指定する必要があります。';
$string['auth_ntlmsso_remoteuserformat'] = '「認証タイプ」に「NTLM」を選択した場合、あなたはここでリモートユーザ名フォーマットを指定することができます。空白にした場合、デフォルトのDOMAINusernameフォーマットが使用されます。あなたはドメイン名の表示場所に関して、任意で<b>%domain%</b>プレースホルダを使用することができます。 また、必須の<b>%username%</b>プレースホルダはユーザ名が表示される場所を指定します。<br /><br />広く使われているフォーマットは次のとおりです:<tt>%domain%%username%</tt> (MS Windowsデフォルト)、<tt>%domain%/%username%</tt>、<tt>%domain%+%username%</tt>、<tt>%username%</tt> (ドメインの部分がない場合)';
$string['auth_ntlmsso_remoteuserformat_key'] = 'リモートユーザ名フォーマット';
$string['auth_ntlmsso_subnet'] = '設定した場合、このサブネットの中のクライアントのみSSOを試みます。フォーマット: xxx.xxx.xxx.xxx/ビットマスク　複数のサブネットはカンマ (,) で区切ってください。';
$string['auth_ntlmsso_subnet_key'] = 'サブネット';
$string['auth_ntlmsso_type'] = 'ユーザを認証するためサーバで設定された認証メソッドです (分からない場合、NTLMを選択してください)。';
$string['auth_ntlmsso_type_key'] = '認証タイプ';
$string['connectingldap'] = 'LDAPサーバに接続中 ...';
$string['creatingtemptable'] = '一時テーブル {$a} の作成';
$string['didntfindexpiretime'] = 'password_expire() が有効期限を見つけることができませんでした。';
$string['didntgetusersfromldap'] = 'LDAPサーバからユーザを取得できませんでした。';
$string['gotcountrecordsfromldap'] = 'LDAPから {$a} レコードを取得しました。';
$string['morethanoneuser'] = '変です! LDAPに1名以上のユーザレコードが見つかりました。最初のユーザレコードのみ使用します。';
$string['needbcmath'] = 'Active Directoryに猶予ログインするには、BCMath拡張モジュールが必要です。';
$string['needmbstring'] = 'Active Directoryのパスワードを変更するには、mbstring拡張モジュールが必要です。';
$string['nodnforusername'] = 'user_update_password() にエラーが発生しました。{$a->username} のDNがありません。';
$string['noemail'] = 'あなたへのメール送信を試みましたが、失敗しました!';
$string['notcalledfromserver'] = 'ウェブサーバからコールされるべきではありません!';
$string['noupdatestobedone'] = '更新されたデータはありません。';
$string['nouserentriestoremove'] = '削除するユーザエントリがありません。';
$string['nouserentriestorevive'] = '回復するユーザエントリがありません。';
$string['nouserstobeadded'] = '追加するユーザエントリはありません。';
$string['ntlmsso_attempting'] = 'NTLM経由でシングルサインオン実行中 ...';
$string['ntlmsso_failed'] = '自動ログインに失敗しました、通常のログインページへ移動します ...';
$string['ntlmsso_isdisabled'] = 'NTLM SSOは、無効にされています。';
$string['ntlmsso_unknowntype'] = '不明なntlmssoタイプです!';
$string['pagedresultsnotsupp'] = 'LDAP結果ページ処理はサポートされていません (あなたのPHPバージョンがサポートしていないか、MoodleがLDAPプロトコルバージョン2を使用するよう設定されています)。';
$string['pagesize'] = 'この値があなたのLDAPサーバ結果設定サイズ制限 (1回のクエリで返すことのできる最大エントリ数) より小さいことを確認してください。';
$string['pagesize_key'] = 'ページサイズ';
$string['pluginname'] = 'LDAPサーバ';
$string['pluginnotenabled'] = 'プラグインが有効にされていません!';
$string['renamingnotallowed'] = 'LDAPでのユーザ名変更が許可されていません。';
$string['rootdseerror'] = 'Active DirectoryのrootDSEクエリにエラーが発生しました。';
$string['start_tls'] = 'TLS暗号化による標準LDAPサービス (ポート389) を使用する';
$string['start_tls_key'] = 'TLSを使用する';
$string['updatepasserror'] = '	
user_update_password() にエラーが発生しました。エラーコード: {$a->errno}  エラーストリング: {$a->errstring}';
$string['updatepasserrorexpire'] = 'パスワードの有効期限読み込み中、user_update_password() にエラーが発生しました。エラーコード: {$a->errno}  エラーストリング: {$a->errstring}';
$string['updatepasserrorexpiregrace'] = 'パスワード有効期限または猶予ログインの修正中、user_update_password() にエラーが発生しました。エラーコード: {$a->errno}  エラーストリング: {$a->errstring}';
$string['updateremfail'] = 'LDAPレコードの更新中にエラーが発生しました。エラーコード: {$a->errno}; エラーストリング: {$a->errstring}<br/>キー ({$a->key}) - 古いMoodle値: {$a->ouvalue}  新しい値: {$a->nuvalue}';
$string['updateremfailamb'] = 'LDAPのあいまいなフィールド {$a->key} の更新に失敗しました。古いMoodle値: {$a->ouvalue}  新しい値: {$a->nuvalue}';
$string['updateusernotfound'] = '外部データの更新中、ユーザを見つけることができませんでした。詳細は次のとおりです: 検索ベース: {$a->userdn}  検索フィルタ: (objectClass=*)  検索属性: {$a->attribs}';
$string['useracctctrlerror'] = '{$a} のuserAccountControl取得中にエラーが発生しました。';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() は選択された次のユーザタイプをサポートしません: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() は選択された次のユーザタイプをサポートしません: {$a}';
$string['userentriestoadd'] = '追加されるユーザエントリ: {$a}';
$string['userentriestoremove'] = '削除されるユーザエントリ: {$a}';
$string['userentriestorevive'] = '回復されるユーザエントリ: {$a}';
$string['userentriestoupdate'] = '更新されるユーザエントリ: {$a}';
$string['usernotfound'] = 'LDAPにユーザが見つかりませんでした。';
