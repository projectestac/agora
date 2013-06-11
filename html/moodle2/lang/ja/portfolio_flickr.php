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
 * Strings for component 'portfolio_flickr', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'APIキー';
$string['contenttype'] = 'コンテンツタイプ';
$string['err_noapikey'] = 'APIキーなし';
$string['err_noapikey_help'] = 'このプラグインに設定されたAPIキーはありません。あなたはAPIキーをFlickrサービスページから取得することができます。';
$string['hidefrompublicsearches'] = 'これらのイメージを公開検索から隠しますか?';
$string['isfamily'] = 'ファミリーに表示する';
$string['isfriend'] = 'フレンドに表示する';
$string['ispublic'] = 'パブリック (誰でも閲覧できます)';
$string['moderate'] = 'モデレート';
$string['noauthtoken'] = 'このセッションで使用する認証トークンを取得できませんでした。';
$string['other'] = 'アート、イラストレーション、CGIまたは写真以外のイメージ';
$string['photo'] = 'フォト';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = '制限';
$string['safe'] = 'セーフ';
$string['safetylevel'] = 'セーフティレベル';
$string['screenshot'] = 'スクリーンショット';
$string['set'] = 'セット';
$string['setupinfo'] = 'セットアップインストラクション';
$string['setupinfodetails'] = 'APIキーおよびsecretストリングを取得するには、Flickrにログインした後、<a href="{$a->applyurl}">新しいキーを取得してください</a>。あなたに新しいキーおよびsecretが作成された場合、ページ内の「Edit auth flow for this app」リンクをクリックしてください。「Callback URL」フィールドに次の値を入力してください: <br /><code>{$a->callbackurl}</code><br />あなたのMoodleサイトの説明およびロゴを任意で提供することもできます。これらの値は後であなたの<a href="{$a->keysurl}">Flickrアプリケーション一覧ページ</a> にて編集することができます。';
$string['sharedsecret'] = 'Secretストリング';
$string['title'] = 'タイトル';
$string['uploadfailed'] = 'flickr.comへのイメージのアップロードに失敗しました: {$a}';
