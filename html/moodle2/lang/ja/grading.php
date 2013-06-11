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
 * Strings for component 'grading', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '「 {$a->area} 」エリアのアクティブ評定方法として、 「 {$a->method} 」が選択されました。';
$string['activemethodinfonone'] = '「 {$a->area} 」エリアには、高度な評定方法はありません。シンプル直接評定が使用されます。';
$string['changeactivemethod'] = 'アクティブ評定方法を変更する';
$string['clicktoclose'] = '閉じるにはクリックしてください。';
$string['exc_gradingformelement'] = '評定フォームエレメントを例示できません。';
$string['formnotavailable'] = '高度な評定方法が選択されましたが、現在のところ評定フォームを利用できません。設定ブロック内のリンクを経由して、最初に評定フォームを定義してください。';
$string['gradingformunavailable'] = '注意: 現在、高度な評定フォームの準備が整っていません。フォームが有効な状態になるまで、シンプル直接評定方法が使用されます。';
$string['gradingmanagement'] = '高度な評定';
$string['gradingmanagementtitle'] = '高度な評定: {$a->component} ({$a->area})';
$string['gradingmethod'] = '評定方法';
$string['gradingmethod_help'] = 'コンテクスト内で評定計算に使用される高度な評定方法を選択してください。

高度な評定方法を無効にして、デフォルト評定方法に戻すには、「シンプル直接評定」を選択してください。';
$string['gradingmethodnone'] = 'シンプル直接評定';
$string['gradingmethods'] = '評定方法';
$string['manageactionclone'] = 'テンプレートから新しい評定フォームを作成する';
$string['manageactiondelete'] = '現在定義されているフォームを削除する';
$string['manageactiondeleteconfirm'] = 'あなたは評定フォーム「 {$a->formname} 」および関連する情報すべてを「 {$a->component} ({$a->area}) 」から削除しようとしています。下記の内容を十分理解して、操作を進めてください:

* この操作を元に戻すことはできません。
* このフォームを削除せずに、あなたは「シンプル直接評定」を含む、他の評定方法にスイッチすることができます。
* どのように評定フォームが補完されるかということも含めて、すべての情報が失われます。
* 評定表に保存された計算済みの評定結果は影響を受けません。しかし、評定がどのように計算されたかという説明は閲覧できないようになります。
* この操作により、このフォームがコピーされた他の活動内のフォームは影響を受けません。';
$string['manageactiondeletedone'] = 'フォームが正常に削除されました。';
$string['manageactionedit'] = '現在のフォーム定義を編集する';
$string['manageactionnew'] = '新しい評定フォームを最初から定義する';
$string['manageactionshare'] = '新しいテンプレートとしてフォームを公開する';
$string['manageactionshareconfirm'] = 'あなたは新しいパブリックテンプレートとして、評定フォーム「 {$a} 」を保存しようとしています。あなたのサイトの他のユーザは、このテンプレートから、活動内に新しい評定フォームを作成することができます。';
$string['manageactionsharedone'] = 'フォームがテンプレートとして正常に保存されました。';
$string['noitemid'] = '評定できません。評定項目がありません。';
$string['nosharedformfound'] = 'テンプレートはありません。';
$string['searchownforms'] = '私のフォームを含む';
$string['searchtemplate'] = '評定フォーム検索';
$string['searchtemplate_help'] = 'あなたは評定フォームを検索して、新しいフォームのテンプレートとして、ここで使用することができます。フォーム名、説明またはフォーム本文に使われている単語を入力してください。言葉を検索するには、検索後を二十引用符 (") で囲んでください。

デフォルトでは、共有テンプレートとして保存されているテンプレートは検索結果に含まれます。あなたは自分の評定フォームを検索結果に含むこともできます。このようにすることで、あなたの評定フォームを共有せずに再利用することができます。「利用可能」とマークされているフォームのみ再利用することができます。';
$string['statusdraft'] = '下書き';
$string['statusready'] = '利用可能';
$string['templatedelete'] = '削除';
$string['templatedeleteconfirm'] = 'あなたは共有テンプレート「 {$a} 」を削除しようとしています。このフォームをベースとして作成されたフォームは、テンプレートを削除することで影響を受けることはありません。';
$string['templateedit'] = '編集';
$string['templatepick'] = 'このテンプレートを使用する';
$string['templatepickconfirm'] = '「 {$a->component} ({$a->area}) 」内の新しい評定フォームのテンプレートとして、評定フォーム「 {$a->formname} 」を使用しますか?';
$string['templatepickownform'] = 'このフォームをテンプレートとして使用する';
$string['templatesource'] = 'ロケーション: {$a->component} ({$a->area})';
$string['templatetypeown'] = '私のフォーム';
$string['templatetypeshared'] = '共有テンプレート';
