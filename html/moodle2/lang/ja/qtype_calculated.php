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
 * Strings for component 'qtype_calculated', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'アイテムを追加する';
$string['addmoreanswerblanks'] = 'さらに答え入力欄を追加する';
$string['addsets'] = 'セットを追加する';
$string['answerdisplay'] = '答え表示';
$string['answerformula'] = '答え {$a} の公式';
$string['answerhdr'] = '答え';
$string['answerstoleranceparam'] = '答えの許容誤差パラメータ';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'すべての値';
$string['atleastoneanswer'] = '少なくとも1つの答えを入力してください。';
$string['atleastonerealdataset'] = '問題テキストの中には少なくとも1つの実データセットを入れる必要があります。';
$string['atleastonewildcard'] = '答えの公式または問題テキストの中には少なくとも1つのワイルドカードを入れる必要があります。';
$string['calcdistribution'] = '分布';
$string['calclength'] = '小数位';
$string['calcmax'] = '最大';
$string['calcmin'] = '最小';
$string['choosedatasetproperties'] = 'ワイルドカードのデータセット属性を選択する';
$string['choosedatasetproperties_help'] = 'データセットは問題の作成に使用されるデータ群です。これは問題内の変数に挿入されます。あなたは特定の問題のために「プライベート」データセットを作成することもできます。または同一カテゴリのすべての問題で「再利用可能な」データセットを作成することもできます。';
$string['correctanswerformula'] = '正解の公式';
$string['correctanswershows'] = '正解の表示';
$string['correctanswershowsformat'] = 'フォーマット';
$string['correctfeedback'] = '正解すべて';
$string['dataitemdefined'] = ': 利用可能な定義済み数値 $a 件';
$string['datasetrole'] = 'ワイルドカード「<strong>{x..}</strong>」はデータセットの数値と置換されます。';
$string['decimals'] = '小数点以下 {$a} 桁';
$string['deleteitem'] = 'アイテムを削除する';
$string['deletelastitem'] = '最終アイテムを削除する';
$string['distributionoption'] = '分布オプションを選択する';
$string['editdatasets'] = 'ワイルドカードデータセットを編集する';
$string['editdatasets_help'] = 'ワイルドカード値はそれぞれのワイルドカードフィールドに数値を入力した後、追加ボタンをクリックして作成することができます。10またはそれ以上の値を生成するには、追加ボタンをクリックする前に必要な値の生成数を選択してください。 一様分布は値域の数値が同程度に生成されることを意味します。対数一様分布は下限の数値が生成されやすいことを意味します。';
$string['existingcategory1'] = '既存の共有データセットを使用する';
$string['existingcategory2'] = 'このカテゴリ内の他の問題ですでに使用されている既存のファイルセットのファイル';
$string['existingcategory3'] = 'このカテゴリ内の他の問題ですでに使用されている既存のリンクセットのリンク';
$string['forceregeneration'] = 'データを再生成する';
$string['forceregenerationall'] = 'すべてのワイルドカードを再生成する';
$string['forceregenerationshared'] = '非共有ワイルドカードのみ再生成する';
$string['functiontakesatleasttwo'] = '関数 {$a} には少なくとも2つの引数が必要です。';
$string['functiontakesnoargs'] = '関数 {$a} には引数は必要ありません。';
$string['functiontakesonearg'] = '関数 {$a} には正確に1つの引数が必要です。';
$string['functiontakesoneortwoargs'] = '関数 {$a} には1つまたは2つの引数が必要です。';
$string['functiontakestwoargs'] = '関数 {$a} には正確に2つの引数が必要です。';
$string['generatevalue'] = '下記の範囲で新しい値を生成する';
$string['getnextnow'] = '「追加するアイテム」を仮取得する';
$string['hexanotallowed'] = 'データセット <strong>{$a->name}</strong> では16進形式の値 $a->value は許可されていません。';
$string['illegalformulasyntax'] = '{$a} で始まる無効な計算式構文です。';
$string['incorrectfeedback'] = '不正解すべて';
$string['itemno'] = 'アイテム {$a}';
$string['itemscount'] = 'アイテム<br />カウント';
$string['itemtoadd'] = '追加するアイテム';
$string['keptcategory1'] = '前回と同じ既存の共有データセットを使用する';
$string['keptcategory2'] = '同一カテゴリ内にある前と同じ再利用可能ファイルセットのファイル';
$string['keptcategory3'] = '同一カテゴリ内にある前と同じ再利用可能リンクセットのリンク';
$string['keptlocal1'] = '前回と同じ既存のプライベートデータセットを使用する';
$string['keptlocal2'] = '同一問題内にある前と同じプライベートファイルセットのファイル';
$string['keptlocal3'] = '同一問題内にある前と同じプライベートリンクセットのリンク';
$string['lengthoption'] = '長さオプションを選択する';
$string['loguniform'] = '対数一様分布';
$string['loguniformbit'] = '対数一様分布の値';
$string['makecopynextpage'] = '次のページ (新しい問題)';
$string['mandatoryhdr'] = '答えの必須ワイルドカード';
$string['max'] = '最大';
$string['min'] = '最小';
$string['minmax'] = '値域';
$string['missingformula'] = '公式がありません。';
$string['missingname'] = '問題名がありません。';
$string['missingquestiontext'] = '問題テキストがありません。';
$string['mustenteraformulaorstar'] = 'あなたは式または「*」を入力する必要があります。';
$string['newcategory1'] = '新しい共有データセットを使用する';
$string['newcategory2'] = 'このカテゴリ内の他の問題でも使用される新しいファイルセットのファイル';
$string['newcategory3'] = 'このカテゴリ内の他の問題でも使用される新しいリンクセットのリンク';
$string['newlocal1'] = '新しいプライベートデータセット使用する';
$string['newlocal2'] = 'この問題のみで使用される新しいファイルセットのファイル';
$string['newlocal3'] = 'この問題のみで使用される新しいリンクセットのリンク';
$string['newsetwildcardvalues'] = 'ワイルドカード値の新しいセット';
$string['nextitemtoadd'] = '次のアイテムの追加方法';
$string['nextpage'] = '次のページ';
$string['nocoherencequestionsdatyasetcategory'] = '問題ID {$a->qid} に関して、カテゴリID {$a->qcat} が共有ワイルドカード {$a->name} のカテゴリID {$a->sharedcat} に一致しません。問題を編集してください。';
$string['nocommaallowed'] = '「,」は使用できません。例えば、0.013または1.3e-2のように「.」を使用してください。';
$string['nodataset'] = 'なし - これはワイルドカードではありません';
$string['nosharedwildcard'] = 'このカテゴリに共有ワイルドカードはありません。';
$string['notvalidnumber'] = 'ワイルドカード値が有効な数値ではありありません。';
$string['oneanswertrueansweroutsidelimits'] = '少なくとも1つの答えが真の値の範囲外にあります。<br />「拡張要素を表示する」ボタンをクリックして「答えの許容誤差」設定を修正してください。';
$string['param'] = '変数 {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = '部分的に正しい解答すべて';
$string['pluginname'] = '計算問題';
$string['pluginnameadding'] = '計算問題の追加';
$string['pluginnameediting'] = '計算問題の編集';
$string['pluginname_help'] = '計算問題では小テスト受験時に個々の値に置換される波括弧「{}」内のワイルドカードを使用する数値問題を作成することができます。例えば、「高さ {l} 、幅 {w} の長方形の面積は?」という問題があったとして、正解は {={l}*{w}} ( * は乗算を意味します) のようになります。';
$string['pluginnamesummary'] = '計算問題は、数値問題に似ていますが、小テスト受験時、設定された数値がランダムに使用されます。';
$string['possiblehdr'] = '問題テキスト内のみのワイルドカード';
$string['questiondatasets'] = '問題データセット';
$string['questiondatasets_help'] = '個々の問題で使用されるワイルドカードの問題データセットです。';
$string['questionstoredname'] = '問題保存名';
$string['replacewithrandom'] = 'ランダム値と置換する';
$string['reuseifpossible'] = '可能な場合、前の値を再利用する';
$string['setno'] = 'セット {$a}';
$string['setwildcardvalues'] = 'ワイルドカード値のセット';
$string['sharedwildcard'] = '共有ワイルドカード <strong>{$a}</strong>';
$string['sharedwildcardname'] = '共有ワイルドカード';
$string['sharedwildcards'] = '共有ワイルドカード';
$string['showitems'] = '表示';
$string['significantfigures'] = '有効数字 {$a} 桁';
$string['significantfiguresformat'] = '有効数字';
$string['synchronize'] = '小テスト内の他の問題の共有データセットからデータを同期する';
$string['synchronizeno'] = '同期しない';
$string['synchronizeyes'] = '同期する';
$string['synchronizeyesdisplay'] = '小テスト名を接頭辞にした共有データセット名を同期および表示する';
$string['tolerance'] = '許容誤差 &plusmn;';
$string['tolerancetype'] = 'タイプ';
$string['trueanswerinsidelimits'] = '正解 : {$a->correct} - 範囲内の真の値: {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">エラー 正解 : {$a->correct} - 範囲外の真の値: {$a->true}</span>';
$string['uniform'] = '一様分布';
$string['uniformbit'] = '一様分布の値';
$string['unsupportedformulafunction'] = '関数 {$a} はサポートされていません。';
$string['updatecategory'] = 'カテゴリを更新する';
$string['updatedatasetparam'] = 'データセットパラメータを更新する';
$string['updatetolerancesparam'] = '答えの許容誤差パラメータを更新する';
$string['updatewildcardvalues'] = 'ワイルドカード値を更新する';
$string['useadvance'] = 'エラーを表示するには「拡張要素を表示する」ボタンをクリックしてください。';
$string['usedinquestion'] = '使用されている問題';
$string['wildcard'] = 'ワイルドカード {<strong>{$a}</strong>}';
$string['wildcardparam'] = '値の生成に使用されるワイルドカードパラメータ';
$string['wildcardrole'] = 'ワイルドカード「<strong>{x..}</strong>」は生成された数値と置換されます。';
$string['wildcards'] = 'ワイルドカード {a}...{z}';
$string['wildcardvalues'] = 'ワイルドカード値';
$string['wildcardvaluesgenerated'] = 'ワイルドカード値が生成されました。
';
$string['youmustaddatleastoneitem'] = 'この問題を保存する前に、あなたは少なくとも1つのデータセットアイテムを追加する必要があります。';
$string['youmustaddatleastonevalue'] = 'この問題を保存する前に、あなたは少なくとも1つのワイルドカード値を追加する必要があります。';
$string['zerosignificantfiguresnotallowed'] = '正解の有効数字にはゼロを設定できません!';
