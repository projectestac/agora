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
 * Strings for component 'report_performance', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = '自動バックアップ';
$string['check_backup_comment_disable'] = 'バックアップ処理中、パフォーマンスは影響を受けます。有効にした場合、混雑しない時間帯にバックアップがスケジュールされます。';
$string['check_backup_comment_enable'] = 'バックアップ処理中、パフォーマンスは影響を受けます。混雑しない時間帯にバックアップがスケジュールされます。';
$string['check_backup_details'] = '自動バックアップを有効にすることで、あなたが指定した時間に自動的にサーバ内のコースすべてのアーカイブを作成します。<p>この処理の間、サーバリソースを消費するため、パフォーマンスに影響する可能性があります。</p>';
$string['check_cachejs_comment_disable'] = '有効にした場合、ページ読み込みのパフォーマンスが改善されます。';
$string['check_cachejs_comment_enable'] = '無効にした場合、ページ読み込みが遅くなる可能性があります。';
$string['check_cachejs_details'] = 'Javaスクリプトキャッシングおよび圧縮はページ読み込みのパフォーマンスを大幅に改善します。プロダクションサイトでの使用を強くお勧めします。';
$string['check_debugmsg_comment_developer'] = '「DEVELOPER」以外に設定した場合、パフォーマンスは少しだけ改善されます。';
$string['check_debugmsg_comment_nodeveloper'] = '「DEVELOPER」に設定した場合、パフォーマンスは少しだけ影響を受けます。';
$string['check_debugmsg_details'] = 'あなたが開発者である以外、開発者レベルに移行することにはほとんど利点がありません。開発者の場合は強くお勧めします。<p>あなたがエラーメッセージを取得できた場合、他の場所にコピー＆ペーストしてください。そして、デバッグメッセージを「NONE」に戻すことを強くお勧めします。あなたのサイト設定に関して、デバッグメッセージは不正侵入者にヒントを与えることになります。また、パフォーマンスにも影響を及ぼします。</p>';
$string['check_enablestats_comment_disable'] = '統計処理により、パフォーマンスが影響を受ける可能性があります。有効にした場合、慎重に統計設定してください。';
$string['check_enablestats_comment_enable'] = '統計処理により、パフォーマンスが影響を受ける可能性があります。慎重に統計設定してください。';
$string['check_enablestats_details'] = 'このオプションを有効にした場合、ログをcronジョブで処理して、統計情報を収集します。あなたのサイトのトラフィックに応じて時間を要します。<p>この処理中、さらにサーバリソースを消費して、パフォーマンスに影響を与える場合があります。</p>';
$string['check_themedesignermode_comment_disable'] = '有効にした場合、イメージおよびスタイルシートはキャッシュされません。結果として、パフォーマンスが顕著に悪化することになります。';
$string['check_themedesignermode_comment_enable'] = '無効にした場合、イメージおよびスタイルシートがキャッシュされます。結果として、パフォーマンスが顕著に改善されます。';
$string['check_themedesignermode_details'] = '多くの場合、これはMoodleサイトを遅くする原因となります。<p>テーマデザイナモードを有効にした場合、Moodleサイトの運用に関して、平均的に少なくとも2倍のCPU使用率となります。</p>';
$string['comments'] = 'コメント';
$string['disabled'] = '無効';
$string['edit'] = '編集';
$string['enabled'] = '有効';
$string['issue'] = '問題点';
$string['morehelp'] = '詳細情報';
$string['performancereportdesc'] = 'このレポートでは、サイトのパフォーマンスに影響する可能性のある問題点を一覧表示しています。 {$a}';
$string['performance:view'] = 'パフォーマンスレポートを表示する';
$string['pluginname'] = 'パフォーマンス概要';
$string['value'] = '値';
