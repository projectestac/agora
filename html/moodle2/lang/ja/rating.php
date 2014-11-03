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
 * Strings for component 'rating', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = '評価平均';
$string['aggregatecount'] = '評価数';
$string['aggregatemax'] = '最大評価';
$string['aggregatemin'] = '最低評価';
$string['aggregatenone'] = '評価なし';
$string['aggregatesum'] = '評価合計';
$string['aggregatetype'] = '総計タイプ';
$string['aggregatetype_help'] = '総計タイプでは評点がどのように評定表内の最終評点の形に組み入れられるのか定義します。

* 平均評点 - すべての評点の平均です。
* 評定数 - 最終評点となる評定された項目数です。合計は活動の最大評点を超えることができないことに留意してください。
* 最大評点 - 最大評点が最終評点となります。
* 最小評点 - 最小評点が最終評点となります。
* 合計 - すべての評点が合計されます。合計は活動の最大評点を超えることができないことに留意してください。

「評定なし」が選択された場合、活動は評定表に表示されません。';
$string['allowratings'] = 'アイテムの評価を許可しますか?';
$string['allratingsforitem'] = 'すべての送信済み評価';
$string['capabilitychecknotavailable'] = '活動が保存されるまで、ケイパビリティのチェックは利用できません。';
$string['couldnotdeleteratings'] = '申し訳ございません、すでに評価されているため、アイテムを削除することができません。';
$string['norate'] = 'アイテムの評価は許可されていません!';
$string['noratings'] = '送信された評価はありません。';
$string['noviewanyrate'] = 'あなたは自分で作成したアイテムの結果のみ閲覧することができます。';
$string['noviewrate'] = 'あなたにはアイテム評価を閲覧するケイパビリティがありません。';
$string['rate'] = '評価';
$string['ratepermissiondenied'] = 'あなたにはこのアイテムを評価するパーミッションがありません。';
$string['rating'] = '評価';
$string['ratinginvalid'] = 'レーティングが無効です。';
$string['ratings'] = '評価';
$string['ratingtime'] = 'アイテム評価をこの日付範囲内に限定する';
$string['rolewarning'] = '評価可能なパーミッション設定済みロール';
$string['rolewarning_help'] = '評価を送信するためには、ユーザは「moodle/rating:rate」ケイパビリティおよび活動個別のケイパビリティが必要です。次のロールが割り当てられたユーザがアイテムを評価することができます。このロールのリストは管理ブロック内のパーミッションリンクにて修正することができます。';
$string['scaleselectionrequired'] = '評点総計タイプを選択する場合、あなたは尺度または最大評点のどちかを選択する必要があります。';
