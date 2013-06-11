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
 * Strings for component 'portfolio_mahara', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_mahara
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['enableleap2a'] = 'Leap2A ポートフォリオサポートを有効にする (要Mahara 1.3以上)';
$string['err_invalidhost'] = '無効なMNetホスト';
$string['err_invalidhost_help'] = 'このプラグインは無効な (または削除された) MNetホストにアクセスするよう誤って設定されています。このプラグインはSSO IDP (アイデンティティプロバイダ) が公開されたMoodleネットワーキングピアおよび登録されたSSO SP (サービスプロバイダ) を信頼します。';
$string['err_networkingoff'] = 'Moodleネットワーキングは無効にされています。';
$string['err_networkingoff_help'] = 'MNetは完全に無効にされています。このプラグインを設定する前に有効にしてください。問題が修正されるまで、このプラグインに関するインスタンスはすべて非表示にされます - 再度、手動でインスタンスを表示する必要があります。インスタンスが表示されるまで、使用することはできません。';
$string['err_nomnetauth'] = 'MNet認証プラグインが無効にされています。';
$string['err_nomnetauth_help'] = 'MNet認証プラグインは無効にされていますが、このサービスで必要とします。';
$string['err_nomnethosts'] = 'Moodleネットワーキングに依存する';
$string['err_nomnethosts_help'] = 'このプラグインでは、MoodleネットワーキングピアのSSO IDP (アイデンティティプロバイダ) の公開、ポートフォリオおよびSSO SP (サービスプロバイダ) の登録に依存します。また、同様にMNet認証プラグインにも依存します。問題が修正されるまで、このプラグインに関するインスタンスはすべて非表示にされます - 再度、手動でインスタンスを表示する必要があります。インスタンスが表示されるまで、使用することはできません。';
$string['failedtojump'] = 'リモートサーバとの通信の開始に失敗しました。';
$string['failedtoping'] = 'リモートサーバ「 {$a} 」との通信の開始に失敗しました。';
$string['mnethost'] = 'MNetホスト';
$string['mnet_nofile'] = '転送オブジェクトにファイルを見つけることができませんでした - 不明なエラー。';
$string['mnet_nofilecontents'] = '転送オブジェクトにファイルを発見しましたが、コンテンツを取得できませんでした - 不明なエラー: {$a}';
$string['mnet_noid'] = 'このトークンに対して、合致する転送レコードを見つけることができませんでした。';
$string['mnet_notoken'] = 'この転送に対して、合致するトークンを見つけることができませんでした。';
$string['mnet_wronghost'] = 'この転送のトークンに対して、リモートホストが合致しません。';
$string['pf_description'] = 'このホストに対してユーザによるMoodleコンテンツの送信を許可します。
<br />
このサービスに公開<b>および</b>登録することで、あなたのサイトの認証済みユーザが {$a} にコンテンツを送信することを許可します。
<br />
<ul>
<li><em>依存関係</em>: あなたはまたSSO (アイデンティティプロバイダ) サービスを {$a} に<strong>公開</strong>する必要があります。</li>
<li><em>依存関係</em>: あなたはまた {$a} のSSO (サービスプロバイダ) サービスに<strong>登録</strong>する必要があります。</li>
<li><em>依存関係</em>: あなたはまたMNet認証プラグインを有効にする必要があります。</li>
</ul>
<br />';
$string['pf_name'] = 'ポートフォリオサービス';
$string['pluginname'] = 'Mahara eポートフォリオ';
$string['senddisallowed'] = '現在、あなたはMaharaにファイルを転送できません。';
$string['url'] = 'URI';
