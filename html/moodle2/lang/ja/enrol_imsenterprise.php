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
 * Strings for component 'enrol_imsenterprise', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'あなたの設定を保存した後、';
$string['allowunenrol'] = 'IMSデータに学生/教師の<strong>登録解除</strong> を許可する';
$string['allowunenrol_desc'] = '<p>エンタープライズデータではユーザの登録と同様に、コースから学生および教師のユーザ登録を抹消することができます。この設定が有効にされた場合、Moodleはデータに指定された内容で、ユーザ登録抹消を行います。</p>

<p>IMSデータで学生のユーザ登録を抹消するには、3つの方法があります:</p>

<ul>
<li>学生およびコースを指定する &lt;member&gt; 要素および &lt;role&gt; 要素の「recstatus」属性に 3 (「削除」を意味する) をセットする。まだ、MOODLEプラグインに実装されていません。</li>

<li>学生およびコースを指定する &lt;member&gt; 要素および &lt;status&gt; 要素に 0 (「インアクティブ」を意味する) をセットする。</li>
</ul>

<p>3番目の方法は若干異なります。この方法では設定を有効にする必要はなく、ユーザ登録抹消日より前に指定することができます:</p>

<ul>
<li>ユーザ登録の &lt;timeframe&gt; を指定する要素 &lt;member&gt; は特定の学生の開始日および/または終了日を指定することができます。Moodleユーザ登録データテーブルがある場合、これらの日付が挿入され、終了日以降は学生が特定のコースにアクセスできないようになります。</li>
</ul>';
$string['basicsettings'] = '基本設定';
$string['coursesettings'] = 'コースデータオプション';
$string['createnewcategories'] = 'Moodleに登録されていない場合、新しい (非表示) コースカテゴリを作成する';
$string['createnewcategories_desc'] = '<p align="center"><b>新しいカテゴリの自動作成</b></p>

<p>コースデータに <org><orgunit> 要素が存在する場合、そのコンテンツは最初から作成されるコースのカテゴリを指定するため使用されます。</p>

<p>このプラグインは既存のコースを再度カテゴリ分類することはありません。</p>

<p>指定した名称のカテゴリが無い場合、隠されたカテゴリが作成されます。</p>';
$string['createnewcourses'] = 'Moodleに登録されていない場合、新しい (非表示) コースを作成する';
$string['createnewcourses_desc'] = '<p>この設定を有効にした場合、IMSエンタープライズ・ユーザ登録プラグインではIMSデータで見つかったMoodleデータベースには登録されていないコースを新たに作成することができます。</p>

<p>コースは最初に、(例えば) 学生情報システム内のコースを特定するために使用できるコード、Moodleコーステーブルの英数字フィールド「idnumber」で検索されます。「idnumber」が見つからない場合、コーステーブルはブレッドクラム等で表示されるMoodleのコース省略名「short description」で検索されます。(いくつかのシステムではこれら2つのフィールドは恐らく同じです。) 検索が失敗した場合のみ、プラグインは任意で新しいコースを作成することができます。</p>

<p>新しく作成されたコースは作成時すべて隠された状態です。これは教師が気づかない間に、学生が完全に空のコースへ入り込む可能性を排除するためです。</p>';
$string['createnewusers'] = 'Moodleに登録されていないユーザのアカウントを作成する';
$string['createnewusers_desc'] = '<p>IMSエンタープライズユーザ登録データでは一般的に一連のユーザを記述します。この設定が有効にされた場合、Moodleデータベースに登録されていない、すべてのユーザアカウントを作成することができます。</p>

<p>ユーザは最初に「idnumber」で検索され、次にMoodleユーザ名で検索されます。</p>


<p>パスワードはIMSエンタープライズプラグインによってインポートされません。Moodle認証プラグインでユーザ認証されますことをお勧めします。</p>';
$string['cronfrequency'] = '処理の頻度';
$string['deleteusers'] = 'IMSデータに指定されている場合、ユーザアカウントを削除する';
$string['deleteusers_desc'] = '<p>この設定が有効にされた場合、IMSエンタープライズ・ユーザ登録データではユーザアカウントの削除を指定  (「recstatus」フラグに、ユーザアカウントの削除を意味する 3 を設定) することができます。</p>

<p>Moodleの標準どおり、実際にはユーザレコードはMoodleデータベースから削除されず、アカウントに削除フラグがセットされます。</p>';
$string['doitnow'] = 'IMSエンタープライズインポート処理を実行してください。';
$string['emptyattribute'] = '空白のままにする';
$string['filelockedmail'] = 'あなたが使用しているIMSファイルベースのユーザ登録 ({$a}) のテキストファイルをcronプロセスで削除することができません。通常、これはファイルパーミッションが正しくないことを意味します。Moodleが削除できるよう、ファイルのパーミッションを変更してください。変更しない場合、この処理が繰り返し実行されます。';
$string['filelockedmailsubject'] = 'インポートエラー: ユーザ登録ファイル';
$string['fixcasepersonalnames'] = '個人名をタイトル文字にする';
$string['fixcaseusernames'] = 'ユーザ名を小文字に変更する';
$string['ignore'] = '無視';
$string['importimsfile'] = 'IMS Enterpriseファイルをインポートする';
$string['imsrolesdescription'] = 'IMSエンタープライズには、8種類の異なるロールが指定されています。ロールを無視する場合も含めて、Moodleにこれらのロールを割り当ててください。';
$string['location'] = 'ファイルロケーション';
$string['logtolocation'] = 'ログファイルの出力場所 (空白はログなし)';
$string['mailadmins'] = '管理者にメール通知する';
$string['mailusers'] = 'ユーザにメール通知する';
$string['messageprovider:imsenterprise_enrolment'] = 'IMSエンタープライズ登録メッセージ';
$string['miscsettings'] = 'その他';
$string['pluginname'] = 'IMS Enterpriseファイル';
$string['pluginname_desc'] = 'このメソッドでは、あなたが指定した場所にある特別にフォーマットされたテキストファイルを繰り返しチェックおよび処理します。IMSエンタープライズ仕様に基づき、ファイルにはperson、groupおよびmembershipをXML要素に含む必要があります。';
$string['processphoto'] = 'ユーザフォトデータをプロファイルに追加する';
$string['processphotowarning'] = '警告: イメージ処理は、サーバに深刻な負荷を与えます。多くの学生の処理が予想される場合、このオプションを有効にしないことをお勧めします。';
$string['restricttarget'] = '次のターゲットが指定されている場合のみ処理する';
$string['restricttarget_desc'] = '<p>IMSエンタープライズデータファイルは複数の「ターゲット」を対象とすることができます - 異なるLMSes または学校/大学の異なるシステム。&lt;properties&gt; タグの中に入れた &lt;target&gt; にネーミングすることで、データが1つまたはそれ以上のターゲットシステムを対象としているエンタープライズファイルを指定することができます。</p>

<p>ほとんどの場合、このことを心配する必要はありません。設定欄を空白にすると、Moodleは常にデータを処理し、ターゲットが指定されているかどうか問わず、&lt;target&gt; タグの中に出力される的確な名称を書き込みます。</p>';
$string['roles'] = 'ロール';
$string['settingfullname'] = 'コースフルネームのIMS説明タグ';
$string['settingfullnamedescription'] = 'コースフィールドにフルネームが必要であるため、あなたは選択された説明タグをIMSエンタープライズファイル内に定義する必要があります。';
$string['settingshortname'] = 'コース省略名のIMS説明タグ';
$string['settingshortnamedescription'] = 'コースフィールドに省略名が必要であるため、あなたは選択された説明タグをIMSエンタープライズファイル内に定義する必要があります。';
$string['settingsummary'] = 'コース概要のIMS説明タグ';
$string['settingsummarydescription'] = '任意フィールドです。あなたがコース概要を指定したくない場合、「空白のままにする」を選択してください。';
$string['sourcedidfallback'] = '「userid」が見つからない場合、ユーザIDに「sourcedid」を使用する';
$string['sourcedidfallback_desc'] = 'IMSデータでは <sourcedid> フィールドはソースシステムで使用される不変のユーザIDコードをあらわします。<userid> フィールドはユーザがログインするときに使用されるIDコードを含む別のフィールドです。多くの場合、これら2つのコードは同じです - しかし、必ずとは限りません。

いくつかの学生情報が <userid> フィールドに出力されない場合、この設定を有効にして <sourcedid> を、MoodleユーザIDに使用してください。そうでない場合、この設定を無効のままにしてください。';
$string['truncatecoursecodes'] = 'この長さにコースコードを切り詰める';
$string['truncatecoursecodes_desc'] = '<p>ここでは処理する前に、コースコードを指定した長さに切り詰めることができます。コースコードを切り詰めたい場合、このボックスに文字長を入力してください。そうでない場合、このボックスを<strong>空白</strong>のままにすると、コースコードは切り詰められません。</p>';
$string['usecapitafix'] = '「Capita」を使用している場合、チェックしてください (XMLフォーマットが少しだけ正しくありません)';
$string['usecapitafix_desc'] = '<p>Capitaによって作成された学生データにはXML出力において若干のエラーがあることが見つかっています。あなたがCapitaを使用している場合、このオプションを有効にしてください - そうでなければ、チェックをしないままにしてください。</p>';
$string['usersettings'] = 'ユーザデータオプション';
$string['zeroisnotruncation'] = '表示 0、トランケーション なし';
