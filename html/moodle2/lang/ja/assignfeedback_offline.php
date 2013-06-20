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
 * Strings for component 'assignfeedback_offline', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   assignfeedback_offline
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmimport'] = '評定インポートを確認する';
$string['default'] = 'デフォルトで有効にする';
$string['default_help'] = '設定した場合、すべての新しい課題に関して、ワークシートによるオフライン評定がデフォルトで有効にされます。';
$string['downloadgrades'] = '評定ワークシートをダウンロードする';
$string['enabled'] = 'オフライン評定ワークシート';
$string['enabled_help'] = '有効にした場合、教師の課題評定時に学生評点のワークシートをダウンロードおよびアップロードできるようになります。';
$string['feedbackupdate'] = '「 {$a->student} 」のフィールド「 {$a->field} 」に「 {$a->text} 」を設定する';
$string['gradelockedingradebook'] = '{$a} の評定表の評点がロックされました。';
$string['graderecentlymodified'] = '{$a} の評定ワークシートより最近にMoodle内の評点が修正されています。';
$string['gradesfile'] = '評定ワークシート (csvフォーマット)';
$string['gradesfile_help'] = '評点が修正された評定ワークシートです。このファイルはこの課題よりダウンロードされたCSVファイルである必要があります。また、学生評点およびIDのカラムを含む必要があります。ファイルのエンコーディングは「UTF-8」にしてください。';
$string['gradeupdate'] = '{$a->student} の評点を {$a->grade} に設定する';
$string['ignoremodified'] = 'スプレッドシートより最近にMoodle内のレコードが修正されている場合、更新を許可します。';
$string['ignoremodified_help'] = '評定ワークシートがMoodleからダウンロードされた場合、それぞれの評点に関する最終更新日時を含みます。このワークシートがダウンロードされた後にMoodle内の評点が更新された場合、Moodleは評定アップロード時に更新情報の上書きを拒否します。このオプションを選択した場合、Moodleは安全チェックを無効にして、複数評定者による他の評定者の評定上書きを可能とします。';
$string['importgrades'] = '評定ワークシートの変更を確認する';
$string['invalidgradeimport'] = 'Moodleはアップロードされたワークシートを読むことができませんでした。ワークシートがカンマ区切りフォーマット (.csv) で保存されていることを確認して、再度お試しください。';
$string['nochanges'] = 'アップロードされたワークシートに修正された評定は見つかりませんでした。';
$string['offlinegradingworksheet'] = '評定';
$string['pluginname'] = 'オフライン評定ワークシート';
$string['processgrades'] = '評定をインポートする';
$string['skiprecord'] = 'レコードをスキップする';
$string['updatedgrades'] = '{$a} 件の評定およびフィードバックを更新しました。';
$string['updaterecord'] = 'レコードを更新する';
$string['uploadgrades'] = '評定ワークシートをアップロードする';
