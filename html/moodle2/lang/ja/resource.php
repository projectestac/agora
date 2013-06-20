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
 * Strings for component 'resource', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   resource
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clicktodownload'] = 'ファイルをダウンロードするには、{$a} リンクをクリックしてください。';
$string['clicktoopen2'] = 'ファイルを表示するには、{$a} リンクをクリックしてください。';
$string['configdisplayoptions'] = '利用可能にしたいオプションすべてを選択してください。既存の設定は、変更されません。複数のフィールドを選択するには、CTRLキーを押したままにしてください。';
$string['configframesize'] = 'フレーム内にウェブページやアップロードしたファイルが表示される場合の (ナビゲーションを含む) トップフレームサイズ (ピクセル) です。';
$string['configparametersettings'] = '新しいリソースを登録する場合、パラメータ設定に関するデフォルト値を設定できるウィンドウ枠を表示します。最初にリソースを登録した後、この値は各ユーザのデフォルトとなります。';
$string['configpopup'] = 'ポップアップウィンドウに表示できる新しいリソースを追加する場合、このオプションをデフォルトで有効にしますか?';
$string['configpopupdirectories'] = 'ダイレクトリンクをポップデフォルトでアップウィンドウに表示しますか?';
$string['configpopupheight'] = '新しいポップアップウィンドウのデフォルトの高さは?';
$string['configpopuplocation'] = 'ポップアップウィンドウにデフォルトでアドレスバーを表示しますか?';
$string['configpopupmenubar'] = 'ポップアップウィンドウにデフォルトでメニューバーを表示しますか?';
$string['configpopupresizable'] = 'ポップアップウィンドウをデフォルトでリサイズさせますか?';
$string['configpopupscrollbars'] = 'ポップアップウィンドウをデフォルトでスクロールさせますか?';
$string['configpopupstatus'] = 'ポップアップウィンドウにデフォルトでステータスバーを表示しますか?';
$string['configpopuptoolbar'] = 'ポップアップウィンドウにデフォルトでツールバーを表示しますか?';
$string['configpopupwidth'] = '新しいポップアップウィンドウのデフォルトの幅は?';
$string['contentheader'] = 'コンテンツ';
$string['displayoptions'] = '利用可能な表示オプション';
$string['displayselect'] = '表示';
$string['displayselectexplain'] = '表示タイプを選択してください。残念ですが、すべてのタイプが、すべてのファイルに適しているということではありません。';
$string['displayselect_help'] = 'ファイルタイプおよびブラウザが埋め込みを許可するかどうかも含めて、この設定ではファイルがどのように表示されるか決定します。以下のオプションを含みます:

* 自動- 選択されたファイルタイプを自動的に検出する最良の表示オプションです。
* 埋め込み - ファイルはナビゲーションバーの下にファイル説明およびブロックとともに表示されます。
* ダウンロードを強制する - ユーザはファイルのダウンロードを促されます。
* オープン - ファイルはブラウザウィンドウ内でのみ表示されます。
* ポップアップ - ファイルはメニューまたはアドレスバーなしの新しいブラウザウィンドウに表示されます。
* フレーム - ファイルはフレーム内のナビゲーションバーの下にファイル説明およびブロックとともに表示されます。
* 新しいウィンドウ - ファイルは新しいウィンドウ内にメニューおよびアドレスバーとともに表示されます。';
$string['dnduploadresource'] = 'ファイルリソースを作成する';
$string['encryptedcode'] = '暗号化コード';
$string['filenotfound'] = '申し訳ございません、ファイルが見つかりませんでした。';
$string['filterfiles'] = 'ファイルコンテンツにフィルタを使用する';
$string['filterfilesexplain'] = 'コンテンツフィルタのタイプを選択してください。この設定により、いくつかのFlashおよびJapaアプレットに問題が生じる可能性があることに留意してください。また、すべてのテキストファイルが、UTF-8エンコーディングされていることを確認してください。';
$string['filtername'] = 'リソース名オートリンク';
$string['forcedownload'] = 'ダウンロードを強制する';
$string['framesize'] = 'フレーム高';
$string['legacyfiles'] = '古いコースファイルの移行';
$string['legacyfilesactive'] = 'アクティブ';
$string['legacyfilesdone'] = '終了';
$string['modulename'] = 'ファイル';
$string['modulename_help'] = 'ファイルモジュールにおいて、教師はコースリソースとしてファイルを提供することができます。可能な場合、ファイルはコースインターフェース内に表示されます。そうでない場合、学生にファイルのダウンロードが促されます。例えばHTMLページにイメージまたはフラッシュオブジェクトを埋め込むことができるように、ファイルモジュールではファイルの組み込みがサポートされます。

ファイルを開くために、学生は自分のコンピュータに適切なソフトウェアをインストールする必要があります。

ファイルモジュールは下記のように使用することができます:

* クラスで実施するプレゼンテーションの共有のため
* コースリソースとしてミニウェブサイトを含むため
* 特定のソフトウェアプログラムの下書きファイル (例 Photoshop .psd) を提供して、学生が編集および評価のために提出できるようにするため';
$string['modulenameplural'] = 'ファイル';
$string['neverseen'] = '未確認';
$string['notmigrated'] = '申し訳ございません、このレガシーリソースタイプ ({$a}) は、まだ移行されていません。';
$string['optionsheader'] = 'オプション';
$string['page-mod-resource-x'] = 'すべてのファイルモジュールページ';
$string['pluginadministration'] = 'リソース管理';
$string['pluginname'] = 'リソース';
$string['popupheight'] = 'ポップアップ高 (ピクセル)';
$string['popupheightexplain'] = 'ポップアップウィンドウのデフォルト高を指定してください。';
$string['popupresource'] = 'このリソースは、ポップアップウィンドウに表示されます。';
$string['popupresourcelink'] = 'ウィンドウが表示されない場合はここをクリック： {$a}';
$string['popupwidth'] = 'ポップアップ幅 (ピクセル)';
$string['popupwidthexplain'] = 'ポップアップウィンドウのデフォルト幅を指定してください。';
$string['printheading'] = 'ページ名を表示する';
$string['printheadingexplain'] = 'コンテンツの上にページ名を表示しますか? 有効にしても、いくつかの表示タイプでは、リソース名を表示することができません。';
$string['printintro'] = 'ページ説明を表示する';
$string['printintroexplain'] = 'コンテンツの下にページ説明を表示しますか? 有効にしても、いくつかの表示タイプでは、説明を表示することができません。';
$string['resource:addinstance'] = '新しいリソースを追加する';
$string['resourcecontent'] = 'ファイルおよびサブフォルダ';
$string['resourcedetails_sizetype'] = '{$a->size} {$a->type}';
$string['resource:exportresource'] = 'リソースをエクスポートする';
$string['resource:view'] = 'リソースを表示する';
$string['selectmainfile'] = 'ファイル名の横にあるアイコンをクリックすることでメインファイルを選択してください。';
$string['showsize'] = 'サイズを表示する';
$string['showsize_desc'] = 'コースページにファイルサイズを表示しますか?';
$string['showsize_help'] = 'ファイルへのリンクの横に「3.1 MB」のようにファイルサイズが表示されます。このリソースに複数ファイルが含まれている場合、ファイルの合計サイズが表示されます。';
$string['showtype'] = 'タイプを表示する';
$string['showtype_desc'] = 'コースページにファイルタイプ (例 「Wordドキュメント」) を表示しますか?';
$string['showtype_help'] = '「Wordドキュメント」のようなファイルタイプをファイルへのリンクの横に表示します。このリソースに複数ファイルが含まれている場合、最初のファイルタイプが表示されます。ファイルタイプがシステムに未知の場合、表示されません。';
