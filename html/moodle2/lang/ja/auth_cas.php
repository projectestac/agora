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
 * Strings for component 'auth_cas', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'CASユーザ';
$string['accesNOCAS'] = '他のユーザ';
$string['auth_cas_auth_user_create'] = '外部にユーザを作成する';
$string['auth_cas_baseuri'] = 'サーバのURL (ベースURLが無い場合は空白)<br />CASサーバが host.domaine.fr/CAS/ に応答する場合、<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'ベースURL';
$string['auth_cas_broken_password'] = 'あなたのパスワードを変更せずに進むことはできませんが、利用できるパスワード変更ページがありません。あなたのMoodle管理者にご連絡ください。';
$string['auth_cas_cantconnect'] = 'CASモジュールのLDAPがサーバに接続できません: {$a}';
$string['auth_cas_casversion'] = 'CASプロトコルバージョン';
$string['auth_cas_certificate_check'] = 'あなたがサーバ証明書を認証したい場合、「Yes」を選択してください。';
$string['auth_cas_certificate_check_key'] = 'サーバ妥当性確認';
$string['auth_cas_certificate_path'] = 'サーバ証明書を認証するためのCAチェーンファイル (PEMフォーマット) のパスです。';
$string['auth_cas_certificate_path_empty'] = 'あなたがサーバ妥当性確認を有効にした場合、証明書パスを指定する必要があります。';
$string['auth_cas_certificate_path_key'] = '証明書パス';
$string['auth_cas_changepasswordurl'] = 'パスワード変更URL';
$string['auth_cas_create_user'] = 'MoodleデータベースにCAS認証済みユーザを追加したい場合、「Yes」を選択してください。「No」を選択した場合、Moodleデータベースに登録されているユーザのみログインできます。';
$string['auth_cas_create_user_key'] = 'ユーザを作成する';
$string['auth_casdescription'] = 'この認証方法では、単一ログイン環境 (Single Sign On environment: SSO) にて、CASサーバ (Central Authentication Service) をユーザ認証に使用します。シンプルLDAP認証を使用することもできます。ユーザ名とパスワードがCASで認証された場合、Moodleは新しいユーザエントリをデータベースに作成します。また、必要であれば、LDAPよりユーザ属性を取得します。次回からは、ユーザ名およびパスワードのみ確認されます。';
$string['auth_cas_enabled'] = 'CAS認証を使用したい場合、「Yes」を選択してください。';
$string['auth_cas_hostname'] = 'CASサーバのホスト名<br />例: host.domaine.fr';
$string['auth_cas_hostname_key'] = 'ホスト名';
$string['auth_cas_invalidcaslogin'] = '申し訳ございません、ログインに失敗しました - あなたは認証されませんでした。';
$string['auth_cas_language'] = '認証ページ言語の選択';
$string['auth_cas_language_key'] = '言語';
$string['auth_cas_logincas'] = 'セキュアコネクション・アクセス';
$string['auth_cas_logoutcas'] = 'Moodleからのログアウト時、CASからログアウトしたい場合、「Yes」を選択してください。';
$string['auth_cas_logoutcas_key'] = 'CASログアウトオプション';
$string['auth_cas_logout_return_url'] = 'CASユーザのログアウト後にリダイレクトされるURLを提供してください。<br />空白の場合、Moodleがユーザをリダイレクトする場所にリダイレクトされます。';
$string['auth_cas_logout_return_url_key'] = '代替ログアウト戻りURL';
$string['auth_cas_multiauth'] = 'マルチ認証 (CAS + 他の認証) を使用したい場合、「Yes」を選択してください。';
$string['auth_cas_multiauth_key'] = 'マルチ認証';
$string['auth_casnotinstalled'] = 'CAS認証を使用できません。PHP LDAPモジュールがインストールされていません。';
$string['auth_cas_port'] = 'CASサーバのポート';
$string['auth_cas_port_key'] = 'ポート';
$string['auth_cas_proxycas'] = 'CASをプロクシモードで使用したい場合、「Yes」を選択してください。';
$string['auth_cas_proxycas_key'] = 'プロクシモード';
$string['auth_cas_server_settings'] = 'CASサーバ設定';
$string['auth_cas_text'] = 'セキュアコネクション';
$string['auth_cas_use_cas'] = 'CASを使用する';
$string['auth_cas_version'] = '使用するCASプロトコルバージョン';
$string['CASform'] = '認証選択';
$string['noldapserver'] = 'CAS用にLDAPサーバが設定されていません! 同期は無効にされました。';
$string['pluginname'] = 'CASサーバ (SSO)';
