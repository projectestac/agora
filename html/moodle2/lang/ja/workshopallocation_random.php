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
 * Strings for component 'workshopallocation_random', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = '自己評価を追加する';
$string['allocationaddeddetail'] = '新しく実施される評価: <strong>{$a->reviewername}</strong> は <strong>{$a->authorname}</strong> の評価者です。';
$string['allocationdeallocategraded'] = 'すでに評価された提出を割り当てることはできません: 評価者 <strong>{$a->reviewername}</strong> / 提出作者: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = '評価の再利用: <strong>{$a->reviewername}</strong> は<strong>{$a->authorname}</strong> の評価者として保持されます。';
$string['allocationsettings'] = '割り当て設定';
$string['assessmentdeleteddetail'] = '提出が再割り当てされました: <strong>{$a->reviewername}</strong> は <strong>{$a->authorname}</strong> の評価者ではなくなりました。';
$string['assesswosubmission'] = '参加者は何も提出せずに評価できる';
$string['confignumofreviews'] = 'ランダムに割り当てられるデフォルトの送信数です。';
$string['excludesamegroup'] = '同一グループ内の他のユーザによるレビューを抑制する';
$string['noallocationtoadd'] = '追加できる割り当てはありません。';
$string['nogroupusers'] = '<p>警告: ワークショップに「可視グループ」または「分離グループ」が設定されていない場合、ユーザが自分に割り当てられた相互評価を実施するためには、このツールにより少なくとも1つのグループに属する必要があります。グループなしのユーザには新しい自己評価を割り当てることができます。そうでない場合、既存の評価は削除されます。</p> <p>現在、これらのユーザはグループに属していません {$a}</p>';
$string['numofdeallocatedassessment'] = '再割り当て {$a} 提出';
$string['numofrandomlyallocatedsubmissions'] = 'ランダム割り当て {$a} 提出';
$string['numofreviews'] = 'レビュー数';
$string['numofselfallocatedsubmissions'] = '自己割り当て {$a} 提出';
$string['numperauthor'] = '提出あたり';
$string['numperreviewer'] = '評価者あたり';
$string['pluginname'] = 'ランダム割り当て';
$string['randomallocationdone'] = 'ランダム割り当て完了';
$string['removecurrentallocations'] = '現在の割り当てを解除する';
$string['resultnomorepeers'] = '利用可能な他のユーザは存在しません。';
$string['resultnomorepeersingroup'] = 'この分離グループには利用可能な他のユーザは存在しません。';
$string['resultnotenoughpeers'] = '利用可能な十分な他のユーザは存在しません。';
$string['resultnumperauthor'] = '作者あたり {$a} 件のレビューを割り当て中';
$string['resultnumperreviewer'] = '評価者あたり {$a} 件のレビューを割り当て中';
$string['stats'] = '現在の割り当て統計';
