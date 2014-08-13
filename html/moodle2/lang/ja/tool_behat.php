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
 * Strings for component 'tool_behat', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'この管理ツールは開発者およびテスト作成者の.featureファイル作成に役立ちします。.featureファイルには、Moodleの機能およびそれらの機能の自動実行を記述します。';
$string['allavailablesteps'] = 'すべての利用可能なステップ定義';
$string['giveninfo'] = 'Given - 環境セットアップ作業';
$string['infoheading'] = '情報';
$string['installinfo'] = 'インストールおよびテスト実行情報に関して、{$a} をご覧ください。';
$string['moreinfoin'] = '詳細は {$a} をご覧ください。';
$string['newstepsinfo'] = '新しいステップ定義の追加に関して、{$a} をご覧ください。';
$string['newtestsinfo'] = '新しいテストの記述に関して、{$a} をご覧ください。';
$string['nostepsdefinitions'] = 'このフィルタに合致するステップ定義はありません。';
$string['pluginname'] = '受け入れテスト';
$string['runclitool'] = 'ステップ定義を一覧表示するには、あなたは「$CFG->behat_dataroot」ディレクトリを作成するためにCLIツールを実行する必要があります。あなたのmoodleディレクトリに移動して、「 {$a} 」を実行してください。';
$string['stepsdefinitionscomponent'] = 'エリア';
$string['stepsdefinitionscontains'] = '含む';
$string['stepsdefinitionsfilters'] = 'ステップ定義';
$string['stepsdefinitionstype'] = 'タイプ';
$string['theninfo'] = 'Then - アウトカムが期待された結果であることを確認する';
$string['unknownexceptioninfo'] = 'Seleniumまたはブラウザに問題が発生しました。あなたが最新バージョンのSeleniumを使用していることを確認してください。エラー:';
$string['viewsteps'] = 'フィルタ';
$string['wheninfo'] = 'When - イベントを発生させるアクション';
$string['wrongbehatsetup'] = 'behatセットアップに問題が発生しました。次の点を確認してください:<ul>
<li>あなたのmoodleルートディレクトリより「php admin/tool/behat/cli/init.php」を実行した。</li>
<li>「vendor/bin/behat」ファイルに実行権が与えられている。</li></ul>';
