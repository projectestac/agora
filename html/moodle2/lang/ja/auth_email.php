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
 * Strings for component 'auth_email', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>Eメールによる自己登録では、ログインページの「アカウントを作成する」ボタンをクリックすることでユーザが自分のアカウントを作成することができます。アカウント作成後、ユーザはアカウントを確認するための安全なリンクが含まれたメールを受信します。その後のログインでは、Moodleデータベース内に保存された値とユーザ名およびパスワードが比較されます。</p><p>注意: 「Eメールによる自己登録」プラグインを有効にするのと同時に、「認証管理」ページ内の「自己登録」ドロップダウンメニューの「Eメールによる自己登録」を選択する必要があります。</p>';
$string['auth_emailnoemail'] = 'あなたへのメール送信を試みましたが、失敗しました!';
$string['auth_emailrecaptcha'] = 'Eメールによる自己登録ユーザのため、サインアップページにビジュアル/オーディオ確認フォームエレメントを追加します。これはあなたのサイトをスパム発信者から守り、価値ある活動に貢献します。詳細は、http://www.google.com/recaptcha/learnmore をご覧ください。<br />PHP cURL拡張モジュールが必須です。';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHAエレメントを有効にする';
$string['auth_emailsettings'] = '設定';
$string['pluginname'] = 'Eメールによる自己登録';
