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
 * Strings for component 'tool_installaddon', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = '同意';
$string['acknowledgementmust'] = 'あなたはこれに同意する必要があります。';
$string['acknowledgementtext'] = 'アドオンをインストールする前に、私の責任として、このサイトをフルバックすることを理解しています。私はアドオン (非公開の場所から取得したものに限らず) にセキュリティホールが含まれ、サイトが利用不可な状態、または個人情報が漏洩または喪失する可能性があることを容認および理解します。';
$string['featuredisabled'] = 'このサイトではアドオンインストーラが無効にされています。';
$string['installaddon'] = 'アドオンをインストールする!';
$string['installaddons'] = 'アドオンをインストールする';
$string['installexception'] = 'アドオンのインストール中にエラーが発生しました。エラーに関する詳細を表示するには、デバッグモードを有効にしてください。';
$string['installfromrepo'] = 'Moodleプラグインディレクトリからアドオンをインストールする';
$string['installfromrepo_help'] = 'アドオンの検索およびインストールのため、あなたはMoodleプラグインディレクトリにリダイレクトされます。インストール処理を簡単にするため、同時にURLおよびメジャーバージョンも送信されます。';
$string['installfromzip'] = 'ZIPファイルからアドオンをインストールする';
$string['installfromzipfile'] = 'ZIPパッケージ';
$string['installfromzipfile_help'] = 'ZIPパッケージにはプラグイン名のディレクトリ1つのみ含む必要があります。ZIPはプラグインタイプに適切な場所に解凍されます。 Moodleプラグインディレクトリからダウンロードした場合、パッケージはこの形式になっています。';
$string['installfromzip_help'] = 'Moodleプラグインディレクトリから直接アドオンをインストールする代わりに、あなたはZIPパッケージをアップロードして、手動でアドオンをインストールすることができます。ZIPパッケージはMoodleプラグインディレクトリからダウンロードされるZIPパッケージと同じ構造にしてください。';
$string['installfromziprootdir'] = 'rootディレクトリをリネームする';
$string['installfromziprootdir_help'] = 'Githubから生成されたZIPパッケージには、正しくない名称のルートディレクトリが含まれている可能性があります。その場合、ここに正しいルートディレクトリ名を入力することができます。';
$string['installfromzipsubmit'] = 'ZIPファイルからアドオンをインストールする';
$string['installfromziptype'] = 'プラグインタイプ';
$string['installfromziptype_help'] = 'あなたのインストールに関して、正しいタイプのプラグインを選択してください。注意: 正しくないプラグインタイプが提供された場合、インストール処理が失敗する可能性があります。';
$string['permcheck'] = 'プラグインタイプのルートロケーションがウェブサーバプロセスから書き込み可能かどうか確認してください。';
$string['permcheckerror'] = '書き込み権のチェック中にエラーが発生しました。';
$string['permcheckprogress'] = '書き込み権のチェック ...';
$string['permcheckresultno'] = 'プラグインタイプロケーション「<em>{$a->path}</em>」が書き込み可能ではありません。';
$string['permcheckresultyes'] = 'プラグインタイプロケーション「<em>{$a->path}</em>」は書き込み可能です。';
$string['pluginname'] = 'アドオンインストーラ';
$string['remoterequestalreadyinstalled'] = 'このサイトにMoodleプラグインディレクトリからアドオン {$a->name} ({$a->component}) バージョン {$a->version} をインストールするリクエストがあります。しかし、このプラグインは<strong>すでにこのサイトにインストールされています</strong>。';
$string['remoterequestconfirm'] = 'このサイトにMoodleプラグインディレクトリからアドオン <strong>{$a->name}</strong> ({$a->component}) バージョン {$a->version} をインストールするリクエストがあります。あなたが続ける場合、妥当性確認のため、アドオンZIPパッケージがダウンロードされます。まだ、何もインストールされません。';
$string['remoterequestinvalid'] = 'このサイトにMoodleプラグインディレクトリからのアドオンのインストールリクエストがあります。残念ですが、リクエストが有効ではないため、アドオンをインストールすることはできません。';
$string['remoterequestpermcheck'] = 'このサイトにMoodleプラグインディレクトリからアドオン <strong>{$a->name}</strong> ({$a->component}) バージョン {$a->version} をインストールするリクエストがあります。しかし、プラグインタイプロケーション <strong>{$a->typepath}</strong> に <strong>書き込むことができません</strong>。あなたはウェブサーバユーザにプラグインタイプロケーションへの書き込み権を与えて、再度チェックするため、「続ける」ボタンをクリックする必要があります。';
$string['remoterequestpluginfoexception'] = 'アドオン {$a->name} ({$a->component}) バージョン {$a->version} の情報取得中にエラーが発生しました。アドオンをインストールすることはできません。エラーに関する詳細情報を閲覧するには、デバッグモードを有効にしてください。';
$string['validation'] = 'アドオンパッケージ妥当性確認';
$string['validationmsg_componentmatch'] = 'ファイルコンポーネント名';
$string['validationmsg_componentmismatchname'] = 'アドオン名不一致';
$string['validationmsg_componentmismatchname_help'] = 'Githubから生成されたZIPパッケージには、正しくないルートディレクトリ名が含まれている可能性があります。あなたは宣言されたアドオン名に合致するよう、ルートディレクトリ名をリネームする必要があります。';
$string['validationmsg_componentmismatchname_info'] = 'アドオン宣言名は「 {$a} 」ですが、ルートディレクトリ名と合致しません。';
$string['validationmsg_componentmismatchtype'] = 'アドオンタイプ不一致';
$string['validationmsg_componentmismatchtype_info'] = 'あなたはタイプ「 {$a->expected} 」を選択しましたが、アドオンではタイプ「 {$a->found} 」が宣言されています。';
$string['validationmsg_filenotexists'] = '解凍済みファイルが見つかりません。';
$string['validationmsg_filesnumber'] = 'パッケージ内に十分なファイルがありません。';
$string['validationmsg_filestatus'] = 'すべてのファイルを解凍できません。';
$string['validationmsg_filestatus_info'] = 'ファイル「 {$a->file} 」の解凍を試みましたが、エラー「 {$a->status} 」が発生しました。';
$string['validationmsglevel_debug'] = 'デバッグ';
$string['validationmsglevel_error'] = 'エラー';
$string['validationmsglevel_info'] = 'OK';
$string['validationmsglevel_warning'] = '警告';
$string['validationmsg_maturity'] = '宣言済み成熟レベル';
$string['validationmsg_maturity_help'] = 'アドオンに成熟レベルを宣言することができます。メインテナがアドオンを安定していると考える場合、宣言済み成熟レベルでは「MATURITY_STABLE」を読み込みます。他の成熟レベル (alphaまたはbeta等) は不安定だとみなされ、警告が表示されます。';
$string['validationmsg_missingexpectedlangenfile'] = '英語言語ファイル名の不一致';
$string['validationmsg_missingexpectedlangenfile_info'] = 'アドオンタイプに英語言語ファイル「 {$a} 」を提供する必要があります。';
$string['validationmsg_missinglangenfile'] = '英語言語ファイルがありません。';
$string['validationmsg_missinglangenfolder'] = '英語言語フォルダがありません。';
$string['validationmsg_missingversion'] = 'アドオンのバージョンが宣言されていません。';
$string['validationmsg_missingversionphp'] = 'ファイル「version.php」がありません。';
$string['validationmsg_multiplelangenfiles'] = '複数の英語言語ファイルが見つかりました。';
$string['validationmsg_onedir'] = 'ZIPパッケージの構造が無効です。';
$string['validationmsg_onedir_help'] = 'ZIPパッケージにはアドオンコードを保持する1つのルートディレクトリのみ含んでください。ルートディレクトリ名はプラグイン名と合致する必要があります。';
$string['validationmsg_pathwritable'] = '書き込み権チェック';
$string['validationmsg_pluginversion'] = 'アドオンバージョン';
$string['validationmsg_release'] = 'アドオンリリース';
$string['validationmsg_requiresmoodle'] = '必須Moodleバージョン';
$string['validationmsg_rootdir'] = 'インストールするアドオン名';
$string['validationmsg_rootdir_help'] = 'ZIPパッケージのルートディレクトリ名はインストールされるアドオン名を形作ります。名称が正しくない場合、あなたはアドオンをインストールする前にZIP内のルートディレクトリ名を変更することもできます。';
$string['validationmsg_rootdirinvalid'] = '無効なアドオン名です。';
$string['validationmsg_rootdirinvalid_help'] = 'ZIPパッケージのルートディレクトリ名が形式的構文の要件に違反しています。Githubから生成されたZIPパッケージには、正しくないルートディレクトリ名が含まれている可能性があります。あなたはアドオン名に合致するよう、ルートディレクトリ名をリネームする必要があります。';
$string['validationmsg_targetexists'] = 'すでにターゲットロケーションが存在しています。';
$string['validationmsg_targetexists_help'] = 'アドオンがインストールされるディレクトリです。まだ存在しないディレクトリにしてください。';
$string['validationmsg_unknowntype'] = '不明なプラグインタイプ';
$string['validationresult0'] = '妥当性確認不合格!';
$string['validationresult0_help'] = '重大な問題が検出されました。アドオンのインストールは安全ではありません。詳細は確認ログメッセージをご覧ください。';
$string['validationresult1'] = '妥当性確認合格!';
$string['validationresult1_help'] = 'アドオンパッケージの正当性検証が完了しました。深刻な問題は見つかりませんでした。';
$string['validationresultinfo'] = '情報';
$string['validationresultmsg'] = 'メッセージ';
$string['validationresultstatus'] = 'ステータス';
