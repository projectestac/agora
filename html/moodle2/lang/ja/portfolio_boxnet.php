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
 * Strings for component 'portfolio_boxnet', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apiv1migration_message_content'] = '最新のMoodle 2.6へのアップグレードの一環として、Boxポートフォリオプラグインは無効にされています。再度有効にするには、ドキュメンテーション ( {$a->docsurl} ) に記載されているとおり、あなたは再設定する必要があります。';
$string['apiv1migration_message_small'] = 'Box APIv1移行ドキュメンテーションで説明されている設定が必要なため、このプラグインは無効にされています。';
$string['apiv1migration_message_subject'] = 'Boxポートフォリオプラグインに関する重要情報';
$string['clientid'] = 'クライアントID';
$string['clientsecret'] = 'クライアント秘密鍵';
$string['existingfolder'] = 'ファイルを保存する既存のフォルダ';
$string['folderclash'] = 'あなたが作成を依頼したフォルダは、すでに登録されています!';
$string['foldercreatefailed'] = 'あなたのターゲットフォルダをboxに作成できませんでした。';
$string['folderlistfailed'] = 'Boxからフォルダ一覧を取得できませんでした。';
$string['missinghttps'] = 'HTTPS必須';
$string['missinghttps_help'] = 'BoxはHTTPSが有効にされているウェブサイトでのみ動作します。';
$string['missingoauthkeys'] = 'クライアントIDおよび秘密鍵がありません。';
$string['missingoauthkeys_help'] = 'このプラグインのクライアントIDまたは秘密鍵設定がありません。あなたはBox開発ページにて、これらを取得することができます。';
$string['newfolder'] = 'ファイルを保存する新しいフォルダ';
$string['noauthtoken'] = 'このセッションで使用する認証トークンを取得できませんでした。';
$string['notarget'] = 'あなたはファイルをアップロードする既存のフォルダ、または新しいフォルダを選択する必要があります。';
$string['noticket'] = '認証を開始するためのチケットをBoxから取得できませんでした。';
$string['password'] = 'あなたのBoxパスワード (保存されません)';
$string['pluginname'] = 'Box';
$string['sendfailed'] = 'コンテクストをBoxに送信できませんでした: {$a}';
$string['setupinfo'] = 'セットアップインストラクション';
$string['setupinfodetails'] = 'クライアントIDおよび秘密鍵を取得するには、Boxにログインした後、<a href="{$a->servicesurl}">Box.net開発者ページ</a>にアクセスしてください。「Create new application」ボタンをクリックして、あなたのMoodleサイト用の新しいアプリケーションを作成してください。クライアントIDおよび秘密鍵はアプリケーション編集フォームの「OAuth2 parameters」セクションに表示されます。あなたのMoodleサイトに関する他の情報を任意に提供することもできます。';
$string['sharedfolder'] = '共有';
$string['sharefile'] = 'このファイルを共有しますか?';
$string['sharefolder'] = 'この新しいフォルダを共有しますか?';
$string['targetfolder'] = 'ターゲットフォルダ';
$string['tobecreated'] = '作成予定';
$string['username'] = 'あなたのBoxユーザ名 (保存されません)';
$string['warninghttps'] = 'Boxのポートフォリオを動作させるには、あなたのウェブサイトがHTTPSを使用している必要があります。';
