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
 * Strings for component 'portfolio_boxnet', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'APIキー';
$string['err_noapikey'] = 'APIキーがありません。';
$string['err_noapikey_help'] = 'このプラグインに設定されているAPIキーはありません。あなたはOpenBox開発ページよりAPIキーを取得することができます。';
$string['existingfolder'] = 'ファイルを保存する既存のフォルダ';
$string['folderclash'] = 'あなたが作成を依頼したフォルダは、すでに登録されています!';
$string['foldercreatefailed'] = 'あなたのターゲットフォルダをbox.netに作成できませんでした。';
$string['folderlistfailed'] = 'box.netからフォルダ一覧を取得できませんでした。';
$string['newfolder'] = 'ファイルを保存する新しいフォルダ';
$string['noauthtoken'] = 'このセッションで使用する認証トークンを取得できませんでした。';
$string['notarget'] = 'あなたは、ファイルをアップロードする既存のフォルダ、または新しいフォルダを選択する必要があります。';
$string['noticket'] = '認証を開始するためのチケットをbox.netから取得できませんでした。';
$string['password'] = 'あなたのbox.netパスワード (保存されません)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'コンテクストをbox.netに送信できませんでした: {$a}';
$string['setupinfo'] = 'セットアップインストラクション';
$string['setupinfodetails'] = 'APIキーを取得するには、Box.netにログインした後、<a href="{$a->servicesurl}">OpenBox開発ページ</a>にアクセスしてください。「Developer Tools 」ページにて「Create new application」ボタンをクリックして、あなたのMoodleサイト用の新しいアプリケーションを作成してください。APIキーはアプリケーション編集フォームの「Backend parameters」セクションに表示されます。Box.net編集フォームの「Redirect url」フィールドに次のURIを入力してください:<br /><code>{$a->callbackurl}</code><br />あなたのMoodleサイトに関する他の情報を任意に提供することもできます。これらの値は後で「View my applications」ページにて編集することができます。';
$string['sharedfolder'] = '共有';
$string['sharefile'] = 'このファイルを共有しますか?';
$string['sharefolder'] = 'この新しいフォルダを共有しますか?';
$string['targetfolder'] = 'ターゲットフォルダ';
$string['tobecreated'] = '作成予定';
$string['username'] = 'あなたのbox.netユーザ名 (保存されません)';
