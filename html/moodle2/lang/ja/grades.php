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
 * Strings for component 'grades', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = '活動';
$string['addcategory'] = 'カテゴリを追加する';
$string['addcategoryerror'] = 'カテゴリを追加できませんでした。';
$string['addexceptionerror'] = 'userid:gradeitemへの例外追加中にエラーが発生しました。';
$string['addfeedback'] = 'フィードバックを追加する';
$string['addgradeletter'] = '評定文字を追加する';
$string['addidnumbers'] = 'IDナンバーを追加する';
$string['additem'] = '評定項目を追加する';
$string['addoutcome'] = 'アウトカムを追加する';
$string['addoutcomeitem'] = 'アウトカム項目を追加する';
$string['addscale'] = '評価尺度を追加する';
$string['aggregateextracreditmean'] = '評点の平均値 (追加点扱い)';
$string['aggregatemax'] = '評点の最大値';
$string['aggregatemean'] = '評点の平均値';
$string['aggregatemedian'] = '評点の中央値';
$string['aggregatemin'] = '評点の最小値';
$string['aggregatemode'] = '評点の最頻値';
$string['aggregateonlygraded'] = '空白ではない評点のみ総計する';
$string['aggregateonlygraded_help'] = '空の評点は評定表に存在しない評点です。まだ評定されていない送信済みの課題、または受験されていない小テスト等が考えられます。

この設定では空白の評点が総計に含まれるか、または最小評点としてカウントされるかどうか決定します。例えば、課題のゼロは0から100の間で評定されます。';
$string['aggregateoutcomes'] = '総計にアウトカムを含む';
$string['aggregateoutcomes_help'] = '有効にした場合、アウトカムが総計に含まれます。望ましい総合評点にならない場合があります。';
$string['aggregatesonly'] = '総計のみ';
$string['aggregatesubcats'] = '総計にサブカテゴリを含む';
$string['aggregatesubcats_help'] = 'この設定では、サブカテゴリ内の評点が総計に含まれるかどうか決定します。';
$string['aggregatesum'] = '評点の合計';
$string['aggregateweightedmean'] = '評点の加重平均値';
$string['aggregateweightedmean2'] = '評点の単純加重平均値';
$string['aggregation'] = '総計';
$string['aggregationcoef'] = '総計係数';
$string['aggregationcoefextra'] = '追加点';
$string['aggregationcoefextra_help'] = '総計において、「評点の合計」または「評点の単純加重平均」および追加点チェックボックスがチェックされた場合、評定項目の最大評点はカテゴリの最大評点に追加されません。結果として、すべての評定項目の最大評点に達することなくカテゴリの最大評点 (または、サイト管理者が有効にした場合、最大評点を超えた値) に到達することができるようになります。

総計において、「評点の単純平均 (追加点扱い)」および追加点にゼロより大きな値が設定された場合、平均計算の後、合計に追加される前、追加点は評点に掛けられる因数となります。';
$string['aggregationcoefextrasum'] = '追加点';
$string['aggregationcoefextrasum_help'] = '<p>総計方法「評点の合計」が使用された場合、評定項目はカテゴリの追加点として使用することができます。これは評定項目の最大評点がカテゴリ合計にすべて追加されるわけではないことを意味します。以下、追加点の適用例です:</p>

<ul>
    <li>アイテム1の評点は、0-100です。</li>
    <li>アイテム2の評点は、0-75です。</li>
    <li>アイテム1の「追加点として使用する」チェックボックスがチェックされ、アイテム2ではチェックされていません。</li>
    <li>両方のアイテムは、総計方法「評点の合計」を持つカテゴリ1に属しています。</li>
    <li>カテゴリ1の合計は、0-75で評定されます。</li>
    <li>学生がアイテム1で20点、アイテム2で70点取得するとします。</li>
    <li>カテゴリ1の学生合計は、75/75 (20 + 70 = 90となりますが、アイテム1は追加点として使用されるため、最大評点を限度として合計に適用されます) となります。</li>
</ul>';
$string['aggregationcoefextraweight'] = '追加点加重';
$string['aggregationcoefextraweight_help'] = '<p>ゼロより大きな値の場合、この評定項目は総計において追加点として評定に使用されます。数値は、評点が評点合計に追加される前に乗算されます。しかし、この評定項目自体は除算に数えられません。例えば:</p>

<ul>
    <li>アイテム1は、0-100で評定され、「追加点」の値に「2」が設定されています。</li>
    <li>アイテム2は、0-100で評定され、「追加点」の値は「0.0000」のままにされています。</li>
    <li>アイテム3は、0-100で評定され、「追加点」の値は「0.0000」のままにされています。</li>
    <li>すべての3アイテムはカテゴリ1に属し、総計方法「評点の平均値 (追加点扱い)」が設定されています。</li>
    <li>学生がアイテム1で20点、アイテム2で40点、そしてアイテム3で70点取得したとします。</li>
    <li>カテゴリ1の学生合計は、95/100 20*2 + (40 + 70)/2 = 95 となります。</li>
</ul>';
$string['aggregationcoefweight'] = '評定項目の加重';
$string['aggregationcoefweight_help'] = '<p>他の評定項目との総計時、この評定項目のすべての評点に適用される加重です。</p>';
$string['aggregation_help'] = '<p>このメニューでは、このカテゴリにおける参加者の総合評点を計算するため使用される総計方法を選択できます。各オプションの内容は下記のとおりです。</p>

<p>最初、評定はパーセンテージ値に変換されます (0から1の間に変換され、これは正規化と呼ばれます)。そして、以下の関数の1つを使って総計され、最後に関連するカテゴリ項目の範囲 (最大評点および最小評点の間) に変換されます。</p>

<p><strong>重要</strong>: 空白の評点は、単純に評定表の不足したエントリ、および異なる意味を持ちえます。例えば、参加者が課題を提出していない、提出された課題が教師から評定されていない、または評定表の管理者から評定が手動で削除されたことが考えられます。「空白の評点」は、このように解釈できますので注意してください。</p>

<dl id="grade-aggregation-help">
    <dt>評点の平均値</dt>
    <dd>すべての評点の合計が評点の合計数で除算されます。</dd>
    <dd class="example">A1 70/100, A2 20/80, A3 10/10, カテゴリ最大 100:<br />
                     <code>(0.7 + 0.25 + 1.0)/3 = 0.65 --> 65/100</code></dd>

    <dt>評点の加重平均値</dt>
        <dd>それぞれの評定項目は加重することができ、全体平均における各評定項目の重要性に影響を与えるため、算術平均の総計に使用されます。</dd>
        <dd class="example">A1 70/100 加重 10, A2 20/80 加重 5, A3
                         10/10 加重 3, カテゴリ最大 100:<br /><code>(0.7*10 + 0.25*5 + 1.0*3)/18 = 0.625 --> 62.5/100</code></dd>

    <dt>評点の単純加重平均値</dt>
        <dd>「評点の加重平均値」との違いは、加重が各評定項目の「最大評点 - 最小評点」として計算される点です。100点の割り当てでは加重100、10点の割り当てでは加重10とされます。</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, カテゴリ最大 100:<br />
                         <code>(0.7*100 + 0.25*80 + 1.0*10)/190 = 0.526 --> 52.6/100</code></dd>

    <dt>評点の平均値 (追加点扱い)</dt>
        <dd>修正を加えた算術平均です。古く、現在はサポートされていない活動に下位互換を目的としてのみ提供される総計方法です。</dd>

    <dt>評点の中央値</dt>
        <dd>中央値 (または中央にある2つの評点の平均) は、大きさの順に評点を並べ替える時点で使用されます。平均値に対して有利な点は、異常値 (平均から極めて懸け離れている評点) に影響されないことです。</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, カテゴリ最大 100:<br />
                         <code>median(0.7 ; 0.25 ; 1.0) = 0.7 --> 70/100</code></dd>

    <dt>評点の最小値</dt>
        <dd>計算結果は、正規化の後の最小評点です。通常、「空白ではない評点のみ総計する」との組み合わせて使用されます。</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, カテゴリ最大 100:<br />
                         <code>min(0.7 ; 0.25 ; 1.0) = 0.25 --> 25/100</code></dd>

    <dt>評点の最大値</dt>
        <dd>計算結果は、正規化の後の最大評点です。</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10, カテゴリ最大 100:<br />
                         <code>max(0.7 ; 0.25 ; 1.0) = 1.0 --> 100/100</code></dd>

    <dt>評点の最頻値</dt>
        <dd>最頻値は、最も頻繁に発生する評点です。多くの場合、数値以外の評点に使用されます。平均値に対して有利な点は、異常値 (平均から極めて懸け離れている評点) に影響されないことです。しかし、1つ以上の最頻値がある場合 (1つのみ保持されます)、評点がそれぞれに異なる場合、その意味を失います。</dd>
        <dd class="example">A1 70/100, A2 35/50, A3 20/80, A4 10/10, A5 7/10 カテゴリ最大 100:<br />
                         <code>mode(0.7 ; 0.7 ; 0.25 ; 1.0 ; 0.7) = 0.7 --> 70/100</code></dd>

    <dt>評点の合計</dt>
        <dd>すべての評点の合計値です。評点の尺度は無視されます。評点を内部的にパーセンテージに変換 (正規化) しない唯一のタイプです。カテゴリ項目に関連する最大評点は、すべての総計項目の最大合計として自動的に計算されます。</dd>
        <dd class="example">A1 70/100, A2 20/80, A3 10/10:<br />
                         <code>70 + 20 + 10 = 100/190</code></dd>
</dl>';
$string['aggregationposition'] = '総計の位置';
$string['aggregationposition_help'] = '<p>評点の総計に関連するレポートの総計カラムの位置を定義します。</p>';
$string['aggregationsvisible'] = '利用可能な総計タイプ';
$string['aggregationsvisiblehelp'] = 'すべての利用可能な総計タイプを選択してください。複数アイテムを選択するには、CTRLキーを押したままにしてください。';
$string['allgrades'] = 'カテゴリごとの評点';
$string['allstudents'] = 'すべての学生';
$string['allusers'] = 'すべてのユーザ';
$string['autosort'] = '自動並べ替え';
$string['availableidnumbers'] = '利用可能なIDナンバー';
$string['average'] = '平均';
$string['averagesdecimalpoints'] = 'カラム平均の小数点以下桁数';
$string['averagesdecimalpoints_help'] = '<p>それぞれのカラム平均に表示する小数点以下桁数を指定してください。継承が選択された場合、それぞれのカラムの表示タイプが選択されます。</p>';
$string['averagesdisplaytype'] = 'カラム平均の表示タイプ';
$string['averagesdisplaytype_help'] = '<p>それぞれのカラムにどのように平均を表示するか指定してください。継承が選択された場合、それぞれのカラムの表示タイプが選択されます。</p>';
$string['backupwithoutgradebook'] = 'バックアップには評定表の設定を含みません。';
$string['badgrade'] = '提供された評定は有効ではありません。';
$string['badlyformattedscale'] = 'カンマ区切りの設定値を入力してください (少なくと2つの設定値が必要です)。';
$string['baduser'] = '提供されたユーザは有効ではありません。';
$string['bonuspoints'] = 'ボーナスポイント';
$string['bulkcheckboxes'] = 'バルクチェックボックス';
$string['calculatedgrade'] = '計算済み評定';
$string['calculation'] = '計算';
$string['calculationadd'] = '計算を追加する';
$string['calculationedit'] = '計算の編集';
$string['calculation_help'] = '評定計算は評定の決定に使用される公式です。公式は等号 (=) で始まり、max、minおよびsumのような一般的な数学演算子が使用されます。必要であれば、2重角括弧に入れたIDナンバーを使用することで他の評定項目を計算に含むことができます。';
$string['calculationsaved'] = '計算が保存されました。';
$string['calculationview'] = '計算の表示';
$string['cannotaccessgroup'] = '申し訳ございません、選択したグループの評定にはアクセスできません。';
$string['categories'] = 'カテゴリ';
$string['categoriesanditems'] = 'カテゴリおよび評定項目';
$string['categoriesedit'] = 'カテゴリおよび評定項目の編集';
$string['category'] = 'カテゴリ';
$string['categoryedit'] = 'カテゴリを編集する';
$string['categoryname'] = 'カテゴリ名';
$string['categorytotal'] = 'カテゴリ合計';
$string['categorytotalfull'] = '{$a->category} 合計';
$string['categorytotalname'] = 'カテゴリ合計名';
$string['changedefaults'] = 'デフォルトを変更する';
$string['changereportdefaults'] = 'レポートデフォルトを変更する';
$string['chooseaction'] = '処理を選択する ...';
$string['choosecategory'] = 'カテゴリを選択する';
$string['combo'] = 'タブおよびドロップダウンメニュー';
$string['compact'] = 'コンパクト';
$string['componentcontrolsvisibility'] = 'この評定アイテムが表示されるかどうか、活動設定によりコントロールされます。';
$string['contract'] = 'カテゴリを縮小する';
$string['controls'] = 'コントロール';
$string['courseavg'] = 'コース平均';
$string['coursegradecategory'] = 'コース評定カテゴリ';
$string['coursegradedisplaytype'] = 'コース評定の表示タイプ';
$string['coursegradedisplayupdated'] = 'コース評定の表示タイプが更新されました。';
$string['coursegradesettings'] = 'コース評定設定';
$string['coursename'] = 'コース名';
$string['coursescales'] = 'コース評価尺度';
$string['coursesettings'] = 'コース設定';
$string['coursesettingsexplanation'] = 'コース設定では、すべてのユーザに対して、評定表がどのように表示されるか決定します。';
$string['coursetotal'] = 'コース合計';
$string['createcategory'] = 'カテゴリを作成する';
$string['createcategoryerror'] = '新しいカテゴリを作成できませんでした。';
$string['creatinggradebooksettings'] = '評定表設定の作成';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = '現在の親の総計';
$string['curveto'] = 'みなし満点';
$string['decimalpoints'] = '全体の小数点';
$string['decimalpoints_help'] = '<p>それぞれの評定に表示する小数点以下桁数を指定してください。この設定は、小数位5桁の精度の評定計算に影響はありません。</p>';
$string['default'] = 'デフォルト';
$string['defaultprev'] = 'デフォルト ({$a})';
$string['deletecategory'] = 'カテゴリを削除する';
$string['disablegradehistory'] = '評定履歴を無効にする';
$string['disablegradehistory_help'] = '評定関連テーブルの変更履歴のトラッキングを無効にします。この設定により、サーバの速度を少しだけ向上させ、データベースの使用量を節約します。';
$string['displaylettergrade'] = '評定文字を表示する';
$string['displaypercent'] = 'パーセントを表示する';
$string['displaypoints'] = '評点を表示する';
$string['displayweighted'] = '加重評点を表示する';
$string['dropdown'] = 'ドロップダウンメニュー';
$string['droplow'] = '最低評点の除外件数';
$string['droplowestvalue'] = '最低評点の除外件数を設定する';
$string['droplow_help'] = '<p>このオプションを設定した場合、X件の最低評点が除外されます。Xは、このオプションで選択された値です。</p>';
$string['dropped'] = '件除外';
$string['dropxlowest'] = '下位X件の除外';
$string['dropxlowestwarning'] = '注意: 「下位X件の除外」を使用する場合、カテゴリ内のすべての評定項目は同じ最大評点を持つとみなされます。カテゴリ内のそれぞれの評定項目の最大評点が異なる場合、結果は保証されません。';
$string['duplicatescale'] = '尺度の複製';
$string['edit'] = '編集';
$string['editcalculation'] = '計算の編集';
$string['editcalculationverbose'] = '{$a->category}$a->itemmodule {$a->itemname} の計算の編集';
$string['editfeedback'] = 'フィードバックの編集';
$string['editgrade'] = '評定の編集';
$string['editgradeletters'] = '評定文字を編集する';
$string['editoutcome'] = 'アウトカムの編集';
$string['editoutcomes'] = 'アウトカムの編集';
$string['editscale'] = '評価尺度の編集';
$string['edittree'] = 'カテゴリおよび評定項目';
$string['editverbose'] = '{$a->category}$a->itemmodule {$a->itemname} の編集';
$string['enableajax'] = 'AJAXを有効にする';
$string['enableajax_help'] = '一般的な操作を単純化および高速化するAJAX機能のレイヤーを評定者レポートに追加します。ユーザのブラウザレベルでJavaスクリプトが有効にされているかどうかに依存します。';
$string['enableoutcomes'] = 'アウトカムを有効にする';
$string['enableoutcomes_help'] = 'アウトカム (別名 コンピテンシー、ゴール、スタンダード、クライテリア) のサポートでは、アウトカム記述に関する１つまたはそれ以上の評価尺度を使用して評定項目を評定することができます。アウトカムを有効にすることで、サイト全体を通して特別な評定を可能にします。';
$string['encoding'] = 'エンコーディング';
$string['errorcalculationbroken'] = '恐らく、循環参照または計算式が壊れています。';
$string['errorcalculationnoequal'] = '式は等号 (=1+2) で開始してください。';
$string['errorcalculationunknown'] = '式が正しくありません。';
$string['errorgradevaluenonnumeric'] = '上限または下限の評点が数値ではありません:';
$string['errornocalculationallowed'] = 'この項目の計算は、許可されていません。';
$string['errornocategorisedid'] = 'カテゴリなしIDを取得できませんでした!';
$string['errornocourse'] = 'コース情報を取得できませんでした。';
$string['errorreprintheadersnonnumeric'] = 'ヘッダの再表示の値が数値ではありません:';
$string['errorsavegrade'] = '申し訳ございません、評定を保存できませんでした。';
$string['errorupdatinggradecategoryaggregateonlygraded'] = '評定カテゴリID {$a->id} の「空白ではない評点のみ総計する」設定更新中にエラーが発生しました。';
$string['errorupdatinggradecategoryaggregateoutcomes'] = '評定カテゴリID {$a->id} の「総計にアウトカムを含む」設定更新中にエラーが発生しました。';
$string['errorupdatinggradecategoryaggregatesubcats'] = '評定カテゴリID {$a->id} の「総計にサブカテゴリを含む」設定更新中にエラーが発生しました。';
$string['errorupdatinggradecategoryaggregation'] = '評定カテゴリID {$a->id} の総計タイプ更新中にエラーが発生しました。';
$string['errorupdatinggradeitemaggregationcoef'] = '評定カテゴリID {$a->id} の総計係数 (加重または追加点) 更新中にエラーが発生しました。';
$string['excluded'] = '除外';
$string['excluded_help'] = '<p>除外が有効にされた場合、この評点は、すべての親評定項目またはカテゴリで実行されるすべての総計から除外されます。</p>';
$string['expand'] = 'カテゴリを展開する';
$string['export'] = 'エクスポート';
$string['exportalloutcomes'] = 'すべてのアウトカムをエクスポートする';
$string['exportfeedback'] = 'エクスポートにフィードバックを含む';
$string['exportonlyactive'] = '要受講登録';
$string['exportonlyactive_help'] = '受講登録が停止されていない学生のみエクスポートに含みます。';
$string['exportplugins'] = 'プラグインのエクスポート';
$string['exportsettings'] = 'エクスポート設定';
$string['exportto'] = 'エクスポート先';
$string['extracreditvalue'] = '{$a} の追加点';
$string['extracreditwarning'] = '注意: カテゴリ内のすべての評定項目を追加点扱いにすることにより、評定の計算から評定項目を効果的に除外することができます。これにより合計評点は計算されません。';
$string['feedback'] = 'フィードバック';
$string['feedbackadd'] = 'フィードバックを追加する';
$string['feedbackedit'] = 'フィードバックの編集';
$string['feedbackforgradeitems'] = '{$a} のフィードバック';
$string['feedback_help'] = '<p>教師から評定に追加されるメモです。広範囲、個別のフィードバックまたはフィードバックの内部システムを参照するシンプルなコードを使用することができます。</p>';
$string['feedbacks'] = 'フィードバック';
$string['feedbacksaved'] = 'フィードバックが保存されました。';
$string['feedbackview'] = 'フィードバックの表示';
$string['finalgrade'] = '最終評点';
$string['finalgrade_help'] = '<p>すべての計算が実行された後の (キャッシュされた) 最終的な 評点です。</p>';
$string['fixedstudents'] = '固定学生カラム';
$string['fixedstudents_help'] = '学生カラムを見失わないよう、カラムを固定して、評定の水平スクロールを許可します。';
$string['forceoff'] = '強制: Off';
$string['forceon'] = '強制: On';
$string['forelementtypes'] = '作成対象: {$a}';
$string['forstudents'] = '学生に対して';
$string['full'] = 'フル';
$string['fullmode'] = 'フルビュー';
$string['fullview'] = 'フルビュー';
$string['generalsettings'] = '一般設定';
$string['grade'] = '評定';
$string['gradeadministration'] = '評定管理';
$string['gradeanalysis'] = '評定分析';
$string['gradebook'] = '評定表';
$string['gradebookhiddenerror'] = '現在、評定表は学生から隠されています。';
$string['gradebookhistories'] = '評定履歴';
$string['gradeboundary'] = '評定文字の境界';
$string['gradeboundary_help'] = '<p>評定文字表示タイプが使用される場合、評定文字を評定に割り当てる境界のパーセンテージです。</p>';
$string['gradecategories'] = '評定カテゴリ';
$string['gradecategory'] = '評定カテゴリ';
$string['gradecategoryonmodform'] = '評定カテゴリ';
$string['gradecategoryonmodform_help'] = 'この設定では、この活動の評定が入る評定表内のカテゴリを管理します。';
$string['gradecategorysettings'] = '評定カテゴリ設定';
$string['gradedisplay'] = '評定表示';
$string['gradedisplaytype'] = '評定表示タイプ';
$string['gradedisplaytype_help'] = '<p>評定者およびユーザレポートでどのように評定を表示するか指定してください。評定を実データ、(最小および最大評点に関する) パーセンテージまたは文字 (A、B、C等..) で表示することができます。</p>';
$string['gradedon'] = '評定日時: {$a}';
$string['gradeexport'] = '評定エクスポート';
$string['gradeexportcustomprofilefields'] = '評定エクスポート - カスタムプロファイルフィールド';
$string['gradeexportcustomprofilefields_desc'] = 'これらのカスタムプロファイルフィールド (カンマ区切り) を評定エクスポートに含みます。';
$string['gradeexportdecimalpoints'] = '評定エクスポート - 小数点';
$string['gradeexportdecimalpoints_desc'] = 'エクスポートに表示する小数点以下桁数です。この値は、エクスポート時にオーバーライドすることができます。';
$string['gradeexportdisplaytype'] = '評定エクスポート - 表示タイプ';
$string['gradeexportdisplaytype_desc'] = '評定を実データ、パーセンテージ (最小および最大評点に関して)、文字 (A、B、C等..) で表示することができます。この値は、エクスポート時にオーバーライドすることができます。';
$string['gradeexportuserprofilefields'] = '評定エクスポート - ユーザプロファイルフィールド';
$string['gradeexportuserprofilefields_desc'] = 'これらのユーザプロファイルフィールド (カンマ区切り) を評定エクスポートに含みます。';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}$a->feedback';
$string['gradehelp'] = '評定ヘルプ';
$string['gradehistorylifetime'] = '評定履歴の保存期間';
$string['gradehistorylifetime_help'] = 'ここでは評定に関連するテーブル履歴の保存期間を指定します。可能な限り長い期間の保存をお勧めします。あなたがパフォーマンスに関する問題を経験した場合、またはデータベース領域が制限されている場合、この値を小さくしてください。';
$string['gradeimport'] = '評定インポート';
$string['gradeitem'] = '評定項目';
$string['gradeitemaddusers'] = '評定から除外する';
$string['gradeitemadvanced'] = '高度な評定項目オプション';
$string['gradeitemadvanced_help'] = '評定項目の編集時に詳細項目として表示されるすべての構成要素を選択してください。';
$string['gradeitemislocked'] = 'この活動は、評定表でロックされています。評定表のロックが解除されるまで、この活動に関する評定の変更は評定表にコピーされません。';
$string['gradeitemlocked'] = '評定ロック中';
$string['gradeitemmembersselected'] = '評定から除外する';
$string['gradeitemnonmembers'] = '評定対象とする';
$string['gradeitemremovemembers'] = '評定対象とする';
$string['gradeitems'] = '評定項目';
$string['gradeitemsettings'] = '評定項目設定';
$string['gradeitemsinc'] = 'エクスポートに含める評定項目';
$string['gradeletter'] = '評定文字';
$string['gradeletter_help'] = '<p>評点の範囲を示すために使用される文字または他の記号です。</p>';
$string['gradeletternote'] = '評定文字を削除するには、テキストエリアの文字を<br />空白にして「変更を保存する」をクリックしてください。';
$string['gradeletters'] = '評定文字';
$string['gradelocked'] = '評定はロックされています。';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = '最大評点';
$string['grademax_help'] = '<p>「値」の評定タイプを使用する場合、最大評点を設定することができます。活動ベースの評定項目の最大評点は、活動の更新ページで設定します。</p>';
$string['grademin'] = '最小評点';
$string['grademin_help'] = '<p>「値」の評定タイプを使用する場合、最小評点を設定することができます。</p>';
$string['gradeoutcomeitem'] = '評定アウトカム項目';
$string['gradeoutcomes'] = 'アウトカム';
$string['gradeoutcomescourses'] = 'コースアウトカム';
$string['gradepass'] = '合格点';
$string['gradepass_help'] = '<p>合格するために、同等またはそれ以上の評点に達する必要のある項目がある場合、ここで設定することができます。</p>';
$string['gradepreferences'] = '評定プリファレンス';
$string['gradepreferenceshelp'] = '評定プリファレンスヘルプ';
$string['gradepublishing'] = '公開を有効にする';
$string['gradepublishing_help'] = 'エクスポートおよびインポートの公開を有効にします。Moodleサイトにログインせず、指定されたURIよりエクスポートされた評定にアクセスできます。また、そのようなURIにアクセスすることで、評定をインポートすることもできます (他のサイトで公開された評定をMoodleサイトがインポートできることを意味します)。デフォルトでは、この機能を管理者のみ使用することができます。必要なケイパビリティを他のロールに追加する前にユーザを教育してください (ブックマーク共有およびダウンロードアクセラレータの危険性、IP制限等)。';
$string['gradereport'] = '評定レポート';
$string['graderreport'] = '評定者レポート';
$string['grades'] = '評定';
$string['gradesforuser'] = '{$a->user} の評点';
$string['gradesonly'] = '評点のみ';
$string['gradessettings'] = '評定設定';
$string['gradetype'] = '評定タイプ';
$string['gradetype_help'] = '<p>使用する評定タイプを指定してください: なし (評定不可)、値 (最大および最小評点の設定を有効にします)、尺度 (評価尺度設定を有効にします)、テキスト (フィードバックのみ)。値および尺度評定タイプのみ合計することができます。活動ベースの評定項目は、活動の更新ページで設定します。</p>';
$string['gradeview'] = '評定を表示する';
$string['gradeweighthelp'] = '評定加重ヘルプ';
$string['groupavg'] = 'グループ平均';
$string['hidden'] = '隠す';
$string['hiddenasdate'] = '隠し評定項目の登録日付を表示する';
$string['hiddenasdate_help'] = '隠し評定項目をユーザが閲覧できない場合、「-」の代わりに評定登録日時を表示します。';
$string['hidden_help'] = 'この設定を有効にした場合、評定は学生から隠されます。評定完了後に評定を開放するには、「次の日時まで隠す」を設定することができます。';
$string['hiddenuntil'] = '次の日時まで隠す';
$string['hiddenuntildate'] = '次の日時まで隠す: {$a}';
$string['hideadvanced'] = '拡張機能を隠す';
$string['hideaverages'] = '平均を隠す';
$string['hidecalculations'] = '計算を隠す';
$string['hidecategory'] = '隠す';
$string['hideeyecons'] = '表示/非表示アイコンを隠す';
$string['hidefeedback'] = 'フィードバックを隠す';
$string['hideforcedsettings'] = '強制設定を隠す';
$string['hideforcedsettings_help'] = '強制設定を評定UIに表示しません。';
$string['hidegroups'] = 'グループを隠す';
$string['hidelocks'] = 'ロックを隠す';
$string['hidenooutcomes'] = 'アウトカムを表示する';
$string['hidequickfeedback'] = 'クイックフィードバックを隠す';
$string['hideranges'] = '範囲を隠す';
$string['hidetotalifhiddenitems'] = '非表示項目が含まれている場合、合計を隠しますか?';
$string['hidetotalifhiddenitems_help'] = '<p>この設定では、非表示項目を含んでいる場合、学生に合計を表示するか、ハイフン (-) を表示するか指定します。表示する場合、合計に非表示項目を含むことも、含まないこともできます。</p>
<p>隠す場合、非表示項目は除外されます。表示または非表示に係わらず、教師は常に項目すべての計算された合計を閲覧することができるため、この場合、教師に表示される合計は異なります。</p>
<p>非表示項目を含む場合、学生は、非表示項目も計算することができます。</p>';
$string['hidetotalshowexhiddenitems'] = '非表示項目を除いて合計を表示する';
$string['hidetotalshowinchiddenitems'] = '非表示項目を含んで合計を表示する';
$string['hideverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} を隠す';
$string['highgradeascending'] = '高評点の昇順で並べ替え';
$string['highgradedescending'] = '高評点の降順で並べ替え';
$string['highgradeletter'] = '上限';
$string['identifier'] = 'ユーザ識別方法:';
$string['idnumbers'] = 'IDナンバー';
$string['ignore'] = '無視';
$string['import'] = 'インポート';
$string['importcsv'] = 'CSVをインポートする';
$string['importcustom'] = 'カスタムアウトカムとしてインポートする (このコースのみ)';
$string['importerror'] = 'エラーが発生しました。このスクリプトは適正なパラメータでコールされていません。';
$string['importfailed'] = 'インポートが失敗しました。';
$string['importfeedback'] = 'フィードバックをインポートする';
$string['importfile'] = 'ファイルをインポートする';
$string['importfilemissing'] = 'ファイルが受け取られていません。フォームに戻って、有効なファイルをアップロードしてください。';
$string['importfrom'] = 'インポート元';
$string['importoutcomenofile'] = 'アップロードされたファイルは、空または破損しています。このファイルが有効かどうか確認してください。問題は {$a} 行目で検出されました。これは最初の行 (ヘッダ行) のカラムと同数のカラムがデータ行に含まれていないか、インポートファイルに必要なヘッダ行が含まれていなことが原因です。有効なヘッダ行の例として、エクスポートされたファイルをご覧ください。';
$string['importoutcomes'] = 'アウトカムのインポート';
$string['importoutcomes_help'] = 'エクスポートされたアウトカムCSVファイルと同じフォーマットのCSVファイルを使用して、アウトカムをインポートすることができます。';
$string['importoutcomesuccess'] = 'インポートされたアウトカム「 {$a->name} 」 ID #{$a->id}';
$string['importplugins'] = 'プラグインのインポート';
$string['importpreview'] = 'インポートプレビュー';
$string['importsettings'] = 'インポート設定';
$string['importskippednomanagescale'] = 'あなたには、新しい評価尺度を追加するパーミッションがありません。アウトカム「 {$a} 」は、新しい尺度の作成をスキップしました。';
$string['importskippedoutcome'] = 'このコンテクスト内で省略名「 {$a} 」のアウトカムは、すでに登録されています。インポートファイルのアウトカムがスキップされました。';
$string['importstandard'] = '標準アウトカムとしてインポートする';
$string['importsuccess'] = '評定のインポートが正常に完了しました。';
$string['importxml'] = 'XMLをインポートする';
$string['includescalesinaggregation'] = '総計に評価尺度を含む';
$string['includescalesinaggregation_help'] = 'あなたは、すべてのコースのすべての評定表を通して、評価尺度がすべての総合評点に数として含まれるかどうか変更することができます。注意: この設定を変更することで、すべての総合評点は強制的に再計算されます。';
$string['incorrectcourseid'] = 'コースIDが正しくありません。';
$string['incorrectcustomscale'] = '(カスタム評価尺度が正しくありません、修正してください。.)';
$string['incorrectminmax'] = '最小評点は、最大評点より低く設定してください。';
$string['inherit'] = '継承';
$string['intersectioninfo'] = '学生/評定情報';
$string['item'] = '項目';
$string['iteminfo'] = '項目情報';
$string['iteminfo_help'] = '<p>評定項目に関する情報を入力するスペースです。入力されたテキストは、どこにも表示されることはありません。</p>';
$string['itemname'] = '項目名';
$string['itemnamehelp'] = 'モジュールから提供される項目の名称です。';
$string['items'] = '項目';
$string['itemsedit'] = '評定項目の編集';
$string['keephigh'] = '最大評点の保持件数';
$string['keephigh_help'] = 'このオプションを設定した場合、X件の最大評点のみ保持されます。Xは、このオプションで選択された値です。';
$string['keymanager'] = 'キーマネージャ';
$string['lessthanmin'] = '{$a->itemname} に入力された {$a->username} の評点は許可された最小評点に達していません。';
$string['letter'] = '文字';
$string['lettergrade'] = '評定文字';
$string['lettergradenonnumber'] = '上限または下限の評点が数値ではありません:';
$string['letterpercentage'] = '文字 (パーセンテージ)';
$string['letterreal'] = '文字 (実データ)';
$string['letters'] = '文字';
$string['linkedactivity'] = 'リンクされる活動';
$string['linkedactivity_help'] = '<p>このアウトカム項目がリンクされる任意の活動を指定してください。これは活動評定により評定されないクライテリアにおける、学生のパフォーマンスを測定するため使用されます。</p>';
$string['linktoactivity'] = '{$a->name} 活動にリンクする';
$string['lock'] = 'ロック';
$string['locked'] = 'ロック';
$string['locked_help'] = 'この設定を有効にした場合、関連する活動の評定が自動更新されないようになります。';
$string['locktime'] = '次の日時以降ロックする';
$string['locktimedate'] = '次の日時以降ロックする: {$a}';
$string['lockverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} をロックする';
$string['lowest'] = '下位';
$string['lowgradeletter'] = '下限';
$string['manualitem'] = '手動項目';
$string['mapfrom'] = 'マップ元';
$string['mappings'] = '評定項目マッピング';
$string['mapto'] = 'マップ先';
$string['max'] = '最大';
$string['maxgrade'] = '満点';
$string['meanall'] = 'すべての評点';
$string['meangraded'] = '空白ではない評点';
$string['meanselection'] = 'カラム平均に使用する評点';
$string['meanselection_help'] = 'それぞれのカラム平均を計算するときに、評点のないセルを含むかどうか指定してください。';
$string['median'] = '中央値';
$string['min'] = '最低';
$string['missingscale'] = '評価尺度を選択してください。';
$string['mode'] = '最頻値';
$string['morethanmax'] = '{$a->itemname} に入力された {$a->username} の評点は許可された最大評点を超えています。';
$string['moveselectedto'] = '選択したアイテムを移動する';
$string['movingelement'] = '{$a} に移動';
$string['multfactor'] = '乗数';
$string['multfactor_help'] = '<p>最大評点の最大値を上限として、この評定項目のすべての評点に掛けられる要素です。</p>';
$string['multfactorvalue'] = '{$a} の乗数';
$string['mypreferences'] = 'マイプリファレンス';
$string['myreportpreferences'] = 'マイレポートプリファレンス';
$string['navmethod'] = 'ナビゲーションメソッド';
$string['neverdeletehistory'] = '履歴を削除しない';
$string['newcategory'] = '新しいカテゴリ';
$string['newitem'] = '新しい評定項目';
$string['newoutcomeitem'] = '新しいアウトカム項目';
$string['no'] = 'No';
$string['nocategories'] = 'このコースに評定カテゴリは追加されなかったか、見つかりませんでした。';
$string['nocategoryname'] = 'カテゴリ名を入力してください。';
$string['nocategoryview'] = 'カテゴリがありません。';
$string['nocourses'] = 'まだコースがありません。';
$string['noforce'] = '強制しない';
$string['nogradeletters'] = '評定文字が設定されていません。';
$string['nogradesreturned'] = '評定がありません。';
$string['noidnumber'] = 'IDナンバーなし';
$string['nolettergrade'] = '評定文字がありません:';
$string['nomode'] = 'NA';
$string['nonnumericweight'] = '数値ではありません:';
$string['nonunlockableverbose'] = '{$a->itemname} がロック解除されるまで、この評定をロック解除することはできません。';
$string['nonweightedpct'] = '加重なし%';
$string['nooutcome'] = 'アウトカムなし';
$string['nooutcomes'] = 'アウトカム項目は、コースアウトカムにリンクされる必要がありますが、このコースにアウトカムがありません。アウトカムを追加しますか?';
$string['nopublish'] = '公開しない';
$string['norolesdefined'] = '「管理 -> 評定 -> 一般設定 -> 評定表のロール (gradebookroles)」にロールが定義されていません。';
$string['noscales'] = 'アウトカムは、コース評価尺度または標準評価尺度にリンクされる必要がありますが、評価尺度が登録されていないようです。評価尺度を追加しますか?';
$string['noselectedcategories'] = 'カテゴリを選択してください。';
$string['noselecteditems'] = '項目を選択してください。';
$string['notteachererror'] = 'この機能は教師のみ使用できます。';
$string['nousersloaded'] = 'ユーザが読み込まれていません。';
$string['numberofgrades'] = '評定数';
$string['onascaleof'] = '尺度の適用範囲: {$a->grademin} - {$a->grademax}';
$string['operations'] = '操作';
$string['options'] = 'オプション';
$string['others'] = 'その他';
$string['outcome'] = 'アウトカム';
$string['outcomeassigntocourse'] = 'このコースに別のアウトカムを割り当てる';
$string['outcomecategory'] = 'カテゴリ内にアウトカムを作成する';
$string['outcomecategorynew'] = '新しいカテゴリ';
$string['outcomeconfirmdelete'] = '本当にアウトカム「 {$a} 」を削除してもよろしいですか?';
$string['outcomecreate'] = '新しいアウトカムを追加する';
$string['outcomedelete'] = 'アウトカムを削除する';
$string['outcomefullname'] = '名称';
$string['outcome_help'] = 'この評定項目が表示される評定表のアウトカムを指定してください。このコースおよびサイト全体に関係するアウトカムのみ利用できます。';
$string['outcomeitem'] = 'アウトカム項目';
$string['outcomeitemsedit'] = 'アウトカム項目の編集';
$string['outcomereport'] = 'アウトカムレポート';
$string['outcomes'] = 'アウトカム';
$string['outcomescourse'] = 'コースで使用されるアウトカム';
$string['outcomescoursecustom'] = '使用されているカスタムアウトカム (削除不可)';
$string['outcomescoursenotused'] = '使用されていない標準アウトカム';
$string['outcomescourseused'] = '使用されている標準アウトカム (削除不可)';
$string['outcomescustom'] = 'カスタムアウトカム';
$string['outcomeshortname'] = '省略名';
$string['outcomesstandard'] = '標準アウトカム';
$string['outcomesstandardavailable'] = '利用可能な標準アウトカム';
$string['outcomestandard'] = '標準アウトカム';
$string['outcomestandard_help'] = '<p>標準アウトカムはサイト全体およびすべてのコースで利用可能です。</p>';
$string['overallaverage'] = '全平均';
$string['overridden'] = '優先';
$string['overridden_help'] = '<p>「優先」が有効にされた場合、将来的な受験の評点が自動的に調整されることを優先フラグが防ぎます。多くの場合、このフラグは評定表で内部的に設定されますが、このフォーム要素を使用して、手動で有効および無効に変更することができます。</p>';
$string['overriddennotice'] = 'この活動に関するあなたの評点は、手動で調整されました。';
$string['overridesitedefaultgradedisplaytype'] = 'サイトデフォルトをオーバーライドする';
$string['overridesitedefaultgradedisplaytype_help'] = '<p>評定表の評定表示サイトデフォルトをオーバーライドしたい場合、このチェックボックスをチェックしてください。チェックボックスをチェックすることで、あなたが「評定文字」および「評定文字の境界」を選択できるフォーム要素がアクティブにされます。</p>';
$string['parentcategory'] = '親カテゴリ';
$string['pctoftotalgrade'] = '評点合計の%';
$string['percent'] = 'パーセント';
$string['percentage'] = 'パーセンテージ';
$string['percentageletter'] = 'パーセンテージ (文字)';
$string['percentagereal'] = 'パーセンテージ (実データ)';
$string['percentascending'] = 'パーセントの昇順で並べ替え';
$string['percentdescending'] = 'パーセントの降順で並べ替え';
$string['percentshort'] = '%';
$string['plusfactor'] = '補正値';
$string['plusfactor_help'] = '補正値は乗数が適用された後、この評定項目すべての評点に追加される数値です。';
$string['plusfactorvalue'] = '{$a} の補正値';
$string['points'] = '評点';
$string['pointsascending'] = '評点の昇順で並べ替え';
$string['pointsdescending'] = '評点の降順で並べ替え';
$string['positionfirst'] = '最初';
$string['positionlast'] = '最後';
$string['preferences'] = 'オプション';
$string['prefgeneral'] = '一般設定';
$string['prefletters'] = '評定文字および境界';
$string['prefrows'] = '特別行';
$string['prefshow'] = 'トグルの表示/非表示';
$string['previewrows'] = 'プレビュー行';
$string['profilereport'] = 'ユーザプロファイルレポート';
$string['profilereport_help'] = 'ユーザプロファイルページで使用される評定レポートです。';
$string['publishing'] = '公開';
$string['quickfeedback'] = 'クイックフィードバック';
$string['quickgrading'] = 'クイック評定';
$string['quickgrading_help'] = '<p>多くの評定を1度に編集できるようにするため、クイック評定は評定者レポートのそれぞれの評定セルにテキスト入力欄を追加します。フィードバックを1つずつ変更する代わりに、更新ボタンをクリックすることで、すべての変更を1度に実行することができます。</p>';
$string['range'] = '範囲';
$string['rangedecimals'] = '小数点範囲';
$string['rangedecimals_help'] = '表示する小数点の範囲です。';
$string['rangesdecimalpoints'] = '範囲で表示する小数点以下桁数';
$string['rangesdecimalpoints_help'] = '<p>それぞれの範囲に表示する小数点以下桁数を指定してください。この設定は、評定項目ごとにオーバーライドすることができます。</p>';
$string['rangesdisplaytype'] = '範囲表示タイプ';
$string['rangesdisplaytype_help'] = '<p>範囲をどのように表示するか指定してください。継承が選択された場合、それぞれのカラムの表示タイプが選択されます。</p>';
$string['rank'] = 'ランク';
$string['rawpct'] = '実%';
$string['real'] = '実データ';
$string['realletter'] = '実データ (文字)';
$string['realpercentage'] = '実データ (パーセンテージ)';
$string['recovergradesdefault'] = '評定デフォルトに戻す';
$string['recovergradesdefault_help'] = 'デフォルトでは、ユーザがコースに再度受講登録される時点で古い評定が戻されます。';
$string['regradeanyway'] = 'とにかく再評定する';
$string['removeallcoursegrades'] = 'すべての評定を削除する';
$string['removeallcourseitems'] = 'すべての評定項目およびカテゴリを削除する';
$string['report'] = 'レポート';
$string['reportdefault'] = 'レポートデフォルト ({$a})';
$string['reportplugins'] = 'レポートプラグイン';
$string['reportsettings'] = 'レポート設定';
$string['reprintheaders'] = 'ヘッダの再表示';
$string['respectingcurrentdata'] = '現在の設定は変更されません。';
$string['rowpreviewnum'] = 'プレビュー行数';
$string['savechanges'] = '変更を保存する';
$string['savepreferences'] = '設定を保存する';
$string['scaleconfirmdelete'] = '本当に尺度「 {$a} 」を削除してもよろしいですか?';
$string['scaledpct'] = '伸縮%';
$string['seeallcoursegrades'] = 'すべてのコース評定を表示する';
$string['select'] = '{$a} を選択する';
$string['selectalloroneuser'] = 'すべてまたは1ユーザを選択する';
$string['selectauser'] = 'ユーザを選択する';
$string['selectdestination'] = '{$a} の移動先を選択する';
$string['separator'] = 'セパレータ';
$string['sepcomma'] = 'カンマ';
$string['septab'] = 'タブ';
$string['setcategories'] = 'カテゴリを設定する';
$string['setcategorieserror'] = '加重を与える前にコースにカテゴリを設定してください。';
$string['setgradeletters'] = '評定文字を設定する';
$string['setpreferences'] = 'プリファレンスを設定する';
$string['setting'] = '設定';
$string['settings'] = '設定';
$string['setweights'] = '加重を設定する';
$string['showactivityicons'] = '活動アイコンを表示する';
$string['showactivityicons_help'] = '<p>活動名の横に活動アイコンを表示するかどうか指定してください。</p>';
$string['showallhidden'] = '隠し評定項目を表示する';
$string['showallstudents'] = 'すべての学生を表示する';
$string['showanalysisicon'] = '評定分析アイコンを表示する';
$string['showanalysisicon_desc'] = 'デフォルトで評定分析アイコンを表示するかどうか指定します。活動モジュールがサポートしている場合、評定および評定の取得に関する詳細説明ページへ評定分析アイコンがリンクされます。';
$string['showanalysisicon_help'] = '活動モジュールがサポートしている場合、評定および評定の取得に関する詳細説明ページへ評定分析アイコンがリンクされます。';
$string['showaverage'] = '平均を表示する';
$string['showaverage_help'] = '平均カラムを表示しますか? 少数の評点から平均が計算された場合、学生は他の学生の評点を試算することができます。非表示項目が存在する場合、パフォーマンスの理由から平均は概算となります。';
$string['showaverages'] = '平均を表示する';
$string['showaverages_help'] = 'それぞれのカラム平均を表示するかどうか指定してください。';
$string['showcalculations'] = '計算を表示する';
$string['showcalculations_help'] = '計算アイコンをそれぞれの評定項目、カテゴリ、計算済み項目上のツールヒントおよび計算済みカラムのビジュアルインディケータに表示するかどうか指定してください。';
$string['showeyecons'] = '表示/非表示アイコンを表示する';
$string['showeyecons_help'] = '表示/非表示アイコンをそれぞれの評定の近くに表示するかどうか指定してください (ユーザに対する可視性をコントロール)。';
$string['showfeedback'] = 'フィードバックを表示する';
$string['showfeedback_help'] = 'フィードバックカラムを表示しますか?';
$string['showgrade'] = '評定を表示する';
$string['showgrade_help'] = '評定カラムを表示しますか?';
$string['showgroups'] = 'グループを表示する';
$string['showhiddenitems'] = '隠し評定項目を表示する';
$string['showhiddenitems_help'] = '隠し評定項目を完全に隠すか、隠し評定項目名を学生に表示するか設定してください。

* 隠し評定項目を表示する - 隠し評定項目名は表示されますが、学生には評定が隠されます。
* 設定された日時まで評定項目を隠す - 「次の日時まで隠す」日時が設定された評定項目は完全に隠されますが、設定日時以降、すべての評定項目が表示されます。
* 隠し評定項目を表示しない - すべての評定項目を完全に隠します。
';
$string['showhiddenuntilonly'] = '設定された日時まで評定項目を隠す';
$string['showlettergrade'] = '評定文字を表示する';
$string['showlettergrade_help'] = '評定文字カラムを表示しますか?';
$string['showlocks'] = 'ロックを表示する';
$string['showlocks_help'] = 'ロック/ロック解除アイコンをそれぞれの評定の近くに表示するかどうか指定してください。';
$string['shownohidden'] = '隠し評定項目を表示しない';
$string['shownooutcomes'] = 'アウトカムを隠す';
$string['shownumberofgrades'] = '平均に評定数を表示する';
$string['shownumberofgrades_help'] = 'それぞれの平均に使用された評定数を隣の大括弧内に表示するかどうか指定してください。例: 45 (34)';
$string['showpercentage'] = 'パーセンテージを表示する';
$string['showpercentage_help'] = 'それぞれの評定項目に対して、パーセンテージを表示するかどうか指定してください。';
$string['showquickfeedback'] = 'クイックフィードバックを表示する';
$string['showquickfeedback_help'] = '多くの評定のフィードバックを1度に編集できるようにするため、クイックフィードバックは評定者レポートのそれぞれの評定セルにテキスト入力欄を追加します。フィードバックを1つずつ変更する代わりに、更新ボタンをクリックすることで、すべての変更を1度に実行することができます。';
$string['showrange'] = 'レーティング';
$string['showrange_help'] = 'レーティングカラムを表示しますか?';
$string['showranges'] = '範囲を表示する';
$string['showranges_help'] = 'それぞれのカラムの評定範囲を追加行に表示するかどうか指定してください。';
$string['showrank'] = 'ランクを表示する';
$string['showrank_help'] = 'それぞれの評定項目に対して、クラス内のユーザのポジションを表示するかどうか指定してください。';
$string['showuserimage'] = 'ユーザプロファイルイメージを表示する';
$string['showuserimage_help'] = '評定者レポートで名前の隣にプロファイルイメージを表示するかどうか指定してください。';
$string['showverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} を表示する';
$string['showweight'] = '加重を表示する';
$string['showweight_help'] = '加重カラムを表示しますか?';
$string['simpleview'] = 'シンプルビュー';
$string['sitewide'] = 'サイト全体';
$string['sort'] = '並べ替え';
$string['sortasc'] = '昇順で並べ替え';
$string['sortbyfirstname'] = '名で並べ替える';
$string['sortbylastname'] = '姓で並べ替える';
$string['sortdesc'] = '降順で並べ替え';
$string['standarddeviation'] = '標準偏差';
$string['stats'] = '統計';
$string['statslink'] = '統計';
$string['student'] = '学生';
$string['studentsperpage'] = '1ページあたりの学生数';
$string['studentsperpage_help'] = '評定者レポートの1ページあたりに表示される学生数です。';
$string['studentsperpagereduced'] = '1ページあたりの学生数を {$a->originalstudentsperpage} から {$a->studentsperpage} に減らしました。PHP設定「max_input_vars」を {$a->maxinputvars} から増やすことをお考えください。';
$string['subcategory'] = 'ノーマルカテゴリ';
$string['submissions'] = '提出';
$string['submittedon'] = '評定登録日時: {$a}';
$string['switchtofullview'] = 'フルビューに切り替える';
$string['switchtosimpleview'] = 'シンプルビューに切り替える';
$string['tabs'] = 'タブ';
$string['topcategory'] = 'スーパーカテゴリ';
$string['total'] = '合計';
$string['totalweight100'] = '加重の合計は100です。';
$string['totalweightnot100'] = '加重の合計は100ではありません。';
$string['turnfeedbackoff'] = 'フィードバックモードを終了する';
$string['turnfeedbackon'] = 'フィードバックモードを開始する';
$string['typenone'] = 'なし';
$string['typescale'] = '尺度';
$string['typescale_help'] = '<p>「尺度」評定タイプを使用する場合、評価尺度を選択することができます。活動ベースの評価尺度は、活動の更新ページで選択します。</p>';
$string['typetext'] = 'テキスト';
$string['typevalue'] = '値';
$string['uncategorised'] = 'カテゴリなし';
$string['unchangedgrade'] = '評点変更なし';
$string['unenrolledusersinimport'] = 'このインポートには、現在コースに受講登録されていない次のユーザの評点が含まれています: {$a}';
$string['unlimitedgrades'] = '無制限の評点';
$string['unlimitedgrades_help'] = 'デフォルトでは、評定項目の最大値および最小値により、評点は制限されています。この設定を有効にすることで、この制限を取り除き、100%以上の評点を評定表に直接入力できるようにします。すべての評点が再計算され、サーバに高負荷がかかる場合がありますので、この設定は混雑していない時間帯に有効にしてください。';
$string['unlock'] = 'ロック解除';
$string['unlockverbose'] = '{$a->category} {$a->itemmodule} {$a->itemname} をロック解除する';
$string['unused'] = '未使用';
$string['updatedgradesonly'] = '新しいまたは更新された評点のみエクスポートする';
$string['uploadgrades'] = '評定をアップロードする';
$string['useadvanced'] = '拡張機能を表示する';
$string['usedcourses'] = '使用済みコース';
$string['usedgradeitem'] = '使用済み評定項目';
$string['usenooutcome'] = '結果を使用しない';
$string['usenoscale'] = '評価尺度を使用しない';
$string['usepercent'] = 'パーセントを使用する';
$string['user'] = 'ユーザ';
$string['userenrolmentsuspended'] = 'ユーザ登録停止中';
$string['usergrade'] = '評定項目 {$a->gradeidnumber} のユーザ {$a->fullname} ({$a->useridnumber})';
$string['userid'] = 'ユーザID';
$string['userpreferences'] = 'ユーザ属性';
$string['useweighted'] = '加重を使用する';
$string['verbosescales'] = '詳細尺度';
$string['viewbygroup'] = 'グループ';
$string['viewgrades'] = '評定を表示する';
$string['warningexcludedsum'] = '警告: 評点を除外することで、総計と互換性を持たなくなります。';
$string['weight'] = '加重';
$string['weightcourse'] = '評定項目の加重をコースに使用する';
$string['weightedascending'] = '加重パーセントの昇順で並べ替え';
$string['weighteddescending'] = '加重パーセントの降順で並べ替え';
$string['weightedpct'] = '加重%';
$string['weightedpctcontribution'] = '加重%内訳';
$string['weightorextracredit'] = '加重または追加点';
$string['weights'] = '加重';
$string['weightsedit'] = '加重および追加点を編集する';
$string['weightuc'] = '加重';
$string['writinggradebookinfo'] = '評定表設定の書き込み';
$string['xml'] = 'XML';
$string['yes'] = 'Yes';
$string['yourgrade'] = 'あなたの評定';
