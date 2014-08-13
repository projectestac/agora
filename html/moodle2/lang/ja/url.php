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
 * Strings for component 'url', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = '変数を選択する ...';
$string['clicktoopen'] = 'リソース開くには {$a}  リンクをクリックしてください:';
$string['configdisplayoptions'] = '利用可能にしたいオプションすべてを選択してください。既存の設定は、変更されません。複数のフィールドを選択するには、CTRLキーを押したままにしてください。';
$string['configframesize'] = 'フレーム内にウェブページやアップロードしたファイルが表示される場合の (ナビゲーションを含む) トップフレームサイズ (ピクセル) です。';
$string['configrolesinparams'] = 'ローカライズされたロール名を利用可能なパラメータ変数リストに含みたい場合、有効にしてください。';
$string['configsecretphrase'] = 'このシークレットワードは、サーバにパラメータとして送信するための暗号コード値生成に使用されます。暗号コードは、current_users IPアドレスとシークレットワードを結びつけてmd5により生成されます。例) code = md5(IP.secretphrase)。これにより、転送先のリソースが、高度なセキュリティ認証を行うことができます。';
$string['contentheader'] = 'コンテンツ';
$string['createurl'] = 'URLを作成する';
$string['displayoptions'] = '利用可能な表示オプション';
$string['displayselect'] = '表示';
$string['displayselectexplain'] = '表示タイプを選択してください。残念ですが、すべてのタイプが、すべてのURLに適しているということではありません。';
$string['displayselect_help'] = 'URLファイルタイプおよびブラウザが埋め込みを許可するかどうかも含めて、この設定ではURLがどのように表示されるか決定します。以下のオプションを含みます:

* 自動- 選択されたURLタイプを自動的に検出する最良の表示オプションです。
* 埋め込み - URLはナビゲーションバーの下にURL説明およびブロックとともに表示されます。
* オープン - URLはブラウザウィンドウ内でのみ表示されます。
* ポップアップ - URLはメニューまたはアドレスバーなしの新しいブラウザウィンドウに表示されます。
* フレーム - URLはフレーム内のナビゲーションバーの下にURL説明およびブロックとともに表示されます。
* 新しいウィンドウ - URLは新しいウィンドウ内にメニューおよびアドレスバーとともに表示されます。';
$string['externalurl'] = '外部URL';
$string['framesize'] = 'フレーム高';
$string['invalidstoredurl'] = 'URLが無効のため、このリソースを表示できません。';
$string['invalidurl'] = '入力されたURLが無効です。';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'URLモジュールにおいて、教師はコースリソースとしてウェブリンクを提供することができます。ドキュメントまたはイメージのようにオンライン上にある無料のコンテンツをリンクすることができます。URLはウェブサイトのホームページ (トップページ) である必要はありません。特定のウェブページのURLはコピー＆ペーストすることができます。また、教師はファイルピッカを使用して、Flickr、YouTubeまたはWikimedia (サイト内でどのリポジトリが有効にされているかに依存します) からリンクを選択することができます。

埋め込み、新しいウィンドウのオープン、必要であればURLに学生名のような情報を渡す高度なオプションのように、URLモジュールには数多くの表示オプションがあります。

テキストエディタをとおして、URLでは他のリソースまたは活動タイプを追加できることに留意してください。';
$string['modulenameplural'] = 'URL';
$string['neverseen'] = '未確認';
$string['page-mod-url-x'] = 'すべてのURLモジュールページ';
$string['parameterinfo'] = '&parameter=変数';
$string['parametersheader'] = 'URL変数';
$string['parametersheader_help'] = 'いくつかの内部Moodle変数が自動的にURLに付加されます。あなたの変数名をテキストボックスに入力した後、必要なマッチング変数を選択してください。';
$string['pluginadministration'] = 'URL管理';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'ポップアップ高 (ピクセル)';
$string['popupheightexplain'] = 'ポップアップウィンドウのデフォルト高を指定してください。';
$string['popupwidth'] = 'ポップアップ幅 (ピクセル)';
$string['popupwidthexplain'] = 'ポップアップウィンドウのデフォルト幅を指定してください。';
$string['printintro'] = 'URL説明を表示する';
$string['printintroexplain'] = 'コンテンツの下にURL説明を表示しますか? 有効にしても、いくつかの表示タイプでは、説明を表示することができません。';
$string['rolesinparams'] = 'パラメータにロール名を含む';
$string['serverurl'] = 'サーバURL';
$string['url:addinstance'] = '新しいURLリソースを追加する';
$string['url:view'] = 'URLを表示する';
