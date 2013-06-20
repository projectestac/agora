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
 * Strings for component 'auth_mnet', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = '「Yes」にした場合、リモートユーザの初回ログイン時、ローカルユーザのレコードが自動作成されます。';
$string['auth_mnetdescription'] = 'あなたのMoodleネットワーク設定で定義されたウェブ認証方法に従って、ユーザが認証されます。';
$string['auth_mnet_roamin'] = '次のホストのユーザは、あなたのサイトを散策できます';
$string['auth_mnet_roamout'] = 'あなたのユーザは、次のホストを散策できます';
$string['auth_mnet_rpc_negotiation_timeout'] = 'XMLRPCトランスポートによる認証のタイムアウト (秒)';
$string['auto_add_remote_users'] = 'リモートユーザを自動的に追加する';
$string['pluginname'] = 'MNetネットワーク認証';
$string['rpc_negotiation_timeout'] = 'RPCネゴシエーションタイムアウト';
$string['sso_idp_description'] = 'このサービスを公開することで、あなたのユーザは再度ログインせずに {$a} サイトを散策することができます。<ul><li><em>従属関係</em>: あなたは {$a} のSSO (サービスプロバイダ) サービスに<strong>登録</strong>する必要があります。</li></ul><br />このサービスに登録することで、{$a} からの認証済みユーザは、再度ログインせずにあなたのサイトにアクセスできます。<ul><li><em>従属関係</em>: あなたは {$a} にSSO (サービスプロバイダ) サービスを<strong>公開</strong>する必要があります。</li></ul><br />';
$string['sso_idp_name'] = 'SSO (アイデンティティプロバイダ)';
$string['sso_mnet_login_refused'] = 'ユーザ名 {$a->user} は、{$a->host} からのログインを許可されていません。';
$string['sso_sp_description'] = 'このサービスを公開することで、{$a} からの認証済みユーザは、再度ログインせずにあなたのサイトにアクセスできます。<ul><li><em>従属関係</em>: あなたは {$a} のSSO (アイデンティティプロバイダ) サービスに<strong>登録</strong>する必要があります。</li></ul><br />このサービスに登録することで、あなたのユーザは再度ログインせずに {$a} サイトを散策することができます。<ul><li><em>従属関係</em>: あなたは {$a} にSSO (アイデンティティプロバイダ) サービスを<strong>公開</strong>する必要があります。</li></ul><br />';
$string['sso_sp_name'] = 'SSO (サービスプロバイダ)';
