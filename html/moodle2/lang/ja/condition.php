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
 * Strings for component 'condition', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'フォームに  {no} 件の活動コンディションを追加する';
$string['addgrades'] = 'フォームに  {no} 件の評定コンディションを追加する';
$string['adduserfields'] = 'フォームに {no} 件のユーザフィールドコンディションを追加する';
$string['availabilityconditions'] = '利用制限';
$string['availablefrom'] = 'アクセス開始日時';
$string['availablefrom_help'] = 'アクセス開始日時およびアクセス終了日時では、コースリンク経由で学生が活動にアクセス可能な日時を設定します。

活動の「アクセス開始日時およびアクセス終了日時」設定および「利用制限」設定の違いは、「アクセス開始日時およびアクセス終了日時」設定範囲外では、活動へのアクセスが完全に遮断されるのに対して、「利用制限」設定では学生が活動の説明を閲覧することができます。';
$string['availableuntil'] = 'アクセス終了日時';
$string['badavailabledates'] = '日付が正しくありません。あなたが両方の日付を設定する場合、「利用可能開始日」は「利用可能終了日」より前に設定してください。';
$string['badgradelimits'] = 'あなたが評点の上限および下限を設定した場合、上限は下限よりも大きな値にしてください。';
$string['completion_complete'] = '完了マークされる必要あり';
$string['completioncondition'] = '活動完了コンディション';
$string['completioncondition_help'] = 'この設定では活動を利用できるようにするために合致する必要のあるすべての活動完了コンディションを設定します。活動完了コンディションを設定できるようになる前、最初に完了トラッキングを設定する必要があることに留意してください。

必要に応じて複数活動の完了コンディションを設定することができます。その場合、すべての活動完了コンディションに合致したときのみ活動は利用可能となります。';
$string['completionconditionsection'] = '活動完了コンディション';
$string['completionconditionsection_help'] = 'この設定ではセクションにアクセスできるようにするために合致する必要のあるすべての活動完了コンディションを設定します。活動完了コンディションを設定できるようになる前、最初に完了トラッキングを設定する必要があることに留意してください。

必要に応じて複数活動の完了コンディションを設定することができます。その場合、すべての活動完了コンディションに合致したときのみセクションにアクセス可能となります。';
$string['completion_fail'] = '不合格で完了する必要あり';
$string['completion_incomplete'] = '完了マークされない必要あり';
$string['completion_pass'] = '合格で完了する必要あり';
$string['configenableavailability'] = 'この設定を有効にした場合、あなたは活動またはリソースが利用可能かどうかコントロールする条件 (日付、評点、完了に基づく) を付けることができます。';
$string['contains'] = '次の文字を含む';
$string['doesnotcontain'] = '次の文字を含まない';
$string['enableavailability'] = '条件付きアクセスを有効にする';
$string['endswith'] = '次の文字で終わる';
$string['fielddeclaredmultipletimes'] = 'あなたは活動に同じフィールドを1つ以上宣言することはできません。';
$string['grade_atleast'] = '次の評点以上:';
$string['gradecondition'] = '評定コンディション';
$string['gradecondition_help'] = 'この設定では活動を利用できるようにするために合致する必要のあるすべての評定コンディションを設定します。

必要に応じて複数活動の評定コンディションを設定することができます。その場合、すべての評定コンディションに合致したときのみ活動は利用可能となります。';
$string['gradeconditionsection'] = '評定コンディション';
$string['gradeconditionsection_help'] = 'この設定ではセクションにアクセスできるようにするために合致する必要のあるすべての評定コンディションを設定します。

必要に応じて複数の評定コンディションを設定することができます。その場合、すべての評定コンディションに合致したときのみセクションにアクセス可能となります。';
$string['gradeitembutnolimits'] = 'あなたは上限、下限または両方を入力する必要があります。';
$string['gradelimitsbutnoitem'] = 'あなたは評定項目を選択する必要があります。';
$string['gradesmustbenumeric'] = '評点の下限および上限は数字 (または空白) にする必要があります。';
$string['grade_upto'] = '次の評点未満:';
$string['groupingnoaccess'] = '現在、あなたはこのセクションにアクセスできるグループに属していません。';
$string['isempty'] = '空白';
$string['isequalto'] = '次の文字と等しい';
$string['isnotempty'] = '空白ではない';
$string['none'] = '(なし)';
$string['notavailableyet'] = 'まだ利用できません。';
$string['requires_completion_0'] = '活動 <strong>{$a}</strong> が未完了でない限り利用できません。';
$string['requires_completion_1'] = '活動 <strong>{$a}</strong> が完了マークされるまで利用できません。';
$string['requires_completion_2'] = '活動 <strong>{$a}</strong> を完了および合格するまで利用できません。';
$string['requires_completion_3'] = '活動 <strong>{$a}</strong> を完了および不合格にならない限り利用できません。';
$string['requires_date'] = '{$a} から利用できます。';
$string['requires_date_before'] = '{$a} まで利用できます。';
$string['requires_date_both'] = '{$a->from} から {$a->until} まで利用できます。';
$string['requires_date_both_single_day'] = '{$a} に利用できます。';
$string['requires_grade_any'] = 'あなたが <strong>{$a}</strong> で点数を取得しない限り利用できません。';
$string['requires_grade_max'] = 'あなたが <strong>{$a}</strong> で適切な点数を取得しない限り利用できません。';
$string['requires_grade_min'] = 'あなたが <strong>{$a}</strong> で要求された点数に到達するまで利用できません。';
$string['requires_grade_range'] = 'あなたが <strong>{$a}</strong> で特定範囲の点数を取得しない限り利用できません。';
$string['requires_user_field_contains'] = 'あなたの <strong>{$a->field}</strong> が <strong>{$a->value}</strong> を含まない限り、利用できません。';
$string['requires_user_field_doesnotcontain'] = 'あなたの <strong>{$a->field}</strong> が <strong>{$a->value}</strong> を含む場合、利用できません。';
$string['requires_user_field_endswith'] = 'あなたの <strong>{$a->field}</strong> が <strong>{$a->value}</strong> で終わらない限り、利用できません。';
$string['requires_user_field_isempty'] = 'あなたの <strong>{$a->field}</strong> が空白でない限り、利用できません。';
$string['requires_user_field_isequalto'] = 'あなたの <strong>{$a->field}</strong> が <strong>{$a->value}</strong> と等しくない限り、利用できません。';
$string['requires_user_field_isnotempty'] = 'あなたの <strong>{$a->field}</strong> が空白の場合、利用できません。';
$string['requires_user_field_startswith'] = 'あなたの <strong>{$a->field}</strong> が <strong>{$a->value}</strong> で始まらない限り、利用できません。';
$string['showavailability'] = '活動が利用可能な前に';
$string['showavailability_hide'] = '活動を完全に隠す';
$string['showavailabilitysection'] = 'セクションにアクセスできるようになる前に';
$string['showavailabilitysection_hide'] = 'セクション全体を隠す';
$string['showavailabilitysection_show'] = '制限情報と共にグレイアウトしたセクションを表示する';
$string['showavailability_show'] = '制限情報とともに活動をグレイアウトした状態で表示する';
$string['startswith'] = '次の文字で始まる';
$string['userfield'] = 'ユーザフィールド';
$string['userfield_help'] = 'あなたはユーザプロファイルフィールドをベースにアクセスを制限することができます。';
$string['userrestriction_hidden'] = '制限 (完全に非表示、メッセージなし): {$a}';
$string['userrestriction_visible'] = '制限: {$a}';
