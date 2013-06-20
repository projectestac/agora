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
 * Strings for component 'install', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = '指定されたadminディレクトリが正しくありません。';
$string['admindirname'] = 'Adminディレクトリ';
$string['admindirsetting'] = 'まれに、コントロールパネルまたはその他の管理ツールにアクセスするためのURIとして/adminディレクトリを使用しているウェブホストがあります。残念ながら、これはMoodle管理ページの標準的なロケーションと衝突します。あなたはインストール時にadminディレクトリをリネームすることができます。ここに新しいディレクトリ名を入力してください。例: <br /> <br /><b>moodleadmin</b><br /> <br />
これによりMoodleのadminリンクを変更します。';
$string['admindirsettinghead'] = '管理ディレクトリの設定中 ...';
$string['admindirsettingsub'] = 'まれに、コントロールパネルまたはその他の管理ツールにアクセスするためのURIとして/adminディレクトリを使用しているウェブホストがあります。残念ながら、これはMoodle管理ページの標準的なロケーションと衝突します。あなたはインストール時にadminディレクトリをリネームすることができます。ここに新しいディレクトリ名を入力してください。例: <br /> <br /><b>moodleadmin</b><br /> <br />
これによりMoodleのadminリンクを変更します。';
$string['availablelangs'] = '利用可能な言語一覧';
$string['caution'] = '警告';
$string['chooselanguage'] = '言語を選択してください。';
$string['chooselanguagehead'] = '言語を選択してください。';
$string['chooselanguagesub'] = 'インストールのみに使用する言語を選択してください。この言語は、サイトのデフォルト言語としても使用されます。サイト言語は、後で変更することが可能です。';
$string['cliadminpassword'] = '新しい管理者パスワード';
$string['cliadminusername'] = '管理者アカウントユーザ名';
$string['clialreadyconfigured'] = 'ファイルconfig.phpは、すでに登録されています。このサイトをインストールしたい場合、admin/cli/install_database.phpを使用してください。';
$string['clialreadyinstalled'] = 'ファイルconfig.phpは、すでに登録されています。あなたのサイトをアップグレードしたい場合、admin/cli/upgrade.phpを使用してください。';
$string['cliinstallfinished'] = 'インストールが正常に完了しました。';
$string['cliinstallheader'] = 'Moodle {$a} コマンドライン・インストールプログラム';
$string['climustagreelicense'] = '非インタラクティブモードでは、あなたは「--agree-license」オプションを指定することで、ライセンスに同意する必要があります。';
$string['clitablesexist'] = 'データベーステーブルは、すでに作成されています。cliインストールを続けることはできません。';
$string['compatibilitysettings'] = 'PHP設定を確認しています ...';
$string['compatibilitysettingshead'] = 'PHP設定を確認しています ...';
$string['compatibilitysettingssub'] = 'Moodleを適切に動作させるためには、あなたのサーバがこれらすべてのテストに通る必要があります。';
$string['configfilenotwritten'] = 'インストールスクリプトは、自動的にあなたの選択した設定を反映したconfig.phpファイルを作成することができませんでした。恐らく、Moodleディレクトリに書き込み権が無いためだと思われます。下記のコードをconfig.phpという名称のファイルとしてMoodleのルートディレクトリにコピーすることができます。';
$string['configfilewritten'] = 'config.phpが正常に作成されました。';
$string['configurationcomplete'] = '設定が完了しました。';
$string['configurationcompletehead'] = '設定が完了しました。';
$string['configurationcompletesub'] = 'Moodleは、Moodleインストレーションルートへの設定内容の保存を試みました。';
$string['database'] = 'データベース';
$string['databasecreationsettings'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行ってください。このデータベースはインストーラーにより、下記の設定が指定された形で自動的に作成されます。<br />
<br /> <br />
<b>タイプ:</b> インストーラーにより「mysql」に固定されます。<br />
<b>ホスト:</b> インストーラーにより「localhost」に固定されます。<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> インストーラーにより「root」に固定されます。<br />
<b>パスワード:</b> あなたのデータベースパスワードです。<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用される任意の接頭辞です。';
$string['databasecreationsettingshead'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行ってください。このデータベースはインストーラーにより、下記の設定が指定された形で自動的に作成されます。';
$string['databasecreationsettingssub'] = '<b>タイプ:</b> インストーラーにより「mysql」に修正されました。<br />
<b>ホスト:</b> インストーラーにより「localhost」に修正されました。<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> インストーラーにより「root」に修正されました。<br />
<b>パスワード:</b> あなたのデータベースパスワードです。<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用される任意の接頭辞です。';
$string['databasecreationsettingssub2'] = '<b>タイプ:</b> インストーラーにより「mysqli」に修正されました。<br />
<b>ホスト:</b> インストーラーにより「localhost」に修正されました。<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> インストーラーにより「root」に修正されました。<br />
<b>パスワード:</b> あなたのデータベースパスワードです。<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用される任意の接頭辞です。';
$string['databasehead'] = 'データベース設定';
$string['databasehost'] = 'データベースホスト :';
$string['databasename'] = 'データベース名 :';
$string['databasepass'] = 'データベースパスワード :';
$string['databasesettings'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行います。このデータベースは、アクセスするためのユーザ名およびパスワードとともにすでに作成されている必要があります。<br />
<br /> <br />
<b>タイプ:</b> mysql または postgres7<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingshead'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行います。このデータベースは、アクセスするためのユーザ名およびパスワードとともにすでに作成されている必要があります。';
$string['databasesettingssub'] = '<b>タイプ:</b> mysql または postgres7<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingssub_mssql'] = '<b>タイプ:</b> SQL*Server (非UTF-8) <b><strong class="errormsg">実験用! (運用環境には使用しないでください。)</strong></b><br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須)';
$string['databasesettingssub_mssql_n'] = '<b>タイプ:</b> SQL*Server (UTF-8)<b><font color="red">実験用! (運用環境には使用しないでください。)</font></b><br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須)';
$string['databasesettingssub_mysql'] = '<b>タイプ:</b> MySQL<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingssub_mysqli'] = '<b>タイプ:</b> Improved MySQL<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingssub_oci8po'] = '<b>タイプ:</b> Oracle<br />
<b>ホスト:</b> 使用されませんので空白にしてください。<br />
<b>データベース名:</b>tnsnames.oraのコネクション名<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須、最大2cc.)';
$string['databasesettingssub_odbc_mssql'] = '<b>タイプ:</b> SQL*Server (ODBC経由) <b><strong class="errormsg">実験用! (運用環境には使用しないでください。)</strong></b><br />
<b>ホスト:</b>ODBCコントロールパネルのDSN名<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須)';
$string['databasesettingssub_postgres7'] = '<b>タイプ:</b> PostgreSQL<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須)';
$string['databasesettingswillbecreated'] = '<b>メモ:</b> データベースが存在していない場合、インストーラーはデータベースの自動作成を試みます。';
$string['databasesocket'] = 'Unixソケット';
$string['databasetypehead'] = 'データベースドライバを選択する';
$string['databasetypesub'] = 'Moodeでは、いくつかのデータベースサーバのタイプをサポートします。どのタイプを使用するか分からない場合、サーバ管理者に連絡してください。';
$string['databaseuser'] = 'データベースユーザ :';
$string['dataroot'] = 'データディレクトリ';
$string['datarooterror'] = 'あなたが指定した「データディレクトリ」が見つからないか、作成されませんでした。パスを訂正するか、ディレクトリを手動で作成してください。';
$string['datarootpermission'] = 'データディレクトリパーミッション';
$string['datarootpublicerror'] = 'あなたが指定した「データディレクトリ」は、ウェブ経由でアクセスすることができます。異なるディレクトリを使用してください。';
$string['dbconnectionerror'] = 'あなたが指定したデータベースに接続できませんでした。データベース設定を確認してください。';
$string['dbcreationerror'] = 'データベース作成エラー。設定で指定された名称のデータベースを作成できませんでした。';
$string['dbhost'] = 'ホストサーバ';
$string['dbpass'] = 'パスワード';
$string['dbport'] = 'ポート';
$string['dbprefix'] = 'テーブル接頭辞';
$string['dbtype'] = 'タイプ';
$string['dbwrongencoding'] = '選択したデータベースは、非推奨のエンコーディング ({$a}) で動作しています。代わりにユニコード (UTF-8) でエンコードされたデータベースの使用をお勧めします。下記の「DBエンコーディングテストをスキップ」をチェックすることで、このテストをバイパスできますが、将来的に問題が発生する恐れがあります。';
$string['dbwronghostserver'] = '上記説明の「ホスト」ルールに従ってください。';
$string['dbwrongnlslang'] = 'あなたのウェブサーバのNLS_LANG環境変数には、AL32UTF8文字セットを使用してください。OCI8を適切に設定するには、PHPドキュメンテーションをご覧ください。';
$string['dbwrongprefix'] = '上記説明の「テーブル接頭辞」ルールに従ってください。';
$string['directorysettings'] = '<p>このMoodleのインストール先を確認してください。</p>

<p><b>ウェブアドレス:</b>
Moodleにアクセスする完全なウェブアドレスを指定してください。あなたのウェブサイトに複数のURIよりアクセス可能な場合は、学生が利用する最も自然なURIを選択してください。末尾にスラッシュを付けないでください。</p>

<p><b>Moodleディレクトリ:</b>
インストール先の完全なディレクトリパスを指定してください。大文字/小文字が間違っていないか確認してください。</p>

<p><b>データディレクトリ:</b>
Moodleにはアップロードされたファイルを保存する場所が必要です。 このディレクトリはウェブサーバのユーザ (通常は「nobody」または「apache」) が読み込みおよび書き込みできるようにしてください。ウェブから直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。</p>';
$string['directorysettingshead'] = 'Moodleのインストール先を確認してください。';
$string['directorysettingssub'] = '<p><b>ウェブアドレス:</b>
Moodleにアクセスする完全なウェブアドレスを指定してください。あなたのウェブサイトに複数のURIよりアクセス可能な場合は、学生が利用する最も自然なURIを選択してください。末尾にスラッシュを付けないでください。</p>
<br />
<br />
<p><b>Moodleディレクトリ:</b>
インストール先の完全なディレクトリパスを指定してください。大文字/小文字が間違っていないか確認してください。</p>
<br />
<br />
<p><b>データディレクトリ:</b>
Moodleにはアップロードされたファイルを保存する場所が必要です。 このディレクトリはウェブサーバのユーザ (通常は「nobody」または「apache」) が読み込みおよび書き込みできるようにしてください。ウェブから直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。</p>';
$string['dirroot'] = 'Moodleディレクトリ';
$string['dirrooterror'] = '「Moodleディレクトリ」設定が間違っているようです - インストール済みMoodleが見つかりませんでした。下記の値がリセットされました。';
$string['download'] = 'ダウンロード';
$string['downloadlanguagebutton'] = '「 {$a} 」言語パックをダウンロードする';
$string['downloadlanguagehead'] = '言語パックのダウンロード';
$string['downloadlanguagenotneeded'] = 'デフォルトの言語パック「 {$a} 」でインストール処理を続けることができます。';
$string['downloadlanguagesub'] = 'あなたは、言語パックをダウンロードして、この言語でインストールを継続することができます。<br /><br />もし、あなたが言語パックをダウンロードできない場合、インストールは英語で継続されます。 (インストールの完了後、さらに言語パックをダウンロードして、インストールすることができます。)';
$string['doyouagree'] = '同意しますか ? (yes/no):';
$string['environmenthead'] = 'あなたの環境を確認しています ...';
$string['environmentsub'] = 'あなたのシステムに関する様々な要素が、システム要件に合致するか確認しています。';
$string['environmentsub2'] = 'それぞれのMoodleリリースには、PHPバージョンの最小必要条件および多くの必須PHP拡張モジュールがあります。完全な環境チェックは、インストールおよびアップグレードごとに実行されます。新しいPHPバージョンのインストールまたはPHP拡張モジュールの有効化に関して分からない場合、あなたのサーバ管理者に連絡してください。';
$string['errorsinenvironment'] = '環境チェックが失敗しました!';
$string['fail'] = '失敗';
$string['fileuploads'] = 'ファイルアップロード';
$string['fileuploadserror'] = 'これは有効にしてください。';
$string['fileuploadshelp'] = '<p>あなたのサーバではファイルのアップロードができないようです。</p>

<p>Moodleのインストールは可能ですが、ファイルのアップロードができない状態ではコースファイルやユーザプロファイルのイメージをアップロードすることができません。</p>

<p>ファイルアップロードを可能にするには、あなた (またはシステム管理者) があなたのシステムのメインのphp.iniファイルを編集して、<b>file_uploads</b> を「1」にする必要があります。</p>';
$string['gdversion'] = 'GDバージョン';
$string['gdversionerror'] = 'イメージの処理および作成を行うにはGDライブラリが必要です。';
$string['gdversionhelp'] = '<p>あなたのサーバにはGDがインストールされていないようです。</p>

<p>GDはMoodleがイメージ (ユーザプロファイルアイコン等) を処理したり、新しいイメージ (ロググラフ等) を作成するためにPHPが必要とするライブラリです。MoodleはGDなしでも動作します -  イメージ処理等ができないだけです。</p>

<p>Unix環境下においてGDをPHPにインストールするには、PHPを --with-gd パラメータでコンパイルしてください。</p>

<p>Windows環境下では、php.iniでphp_gd2.dllを参照している行のコメントアウトを取り除いてください。</p>';
$string['globalsquotes'] = '安全では無いGlobalsのハンドリング';
$string['globalsquoteserror'] = 'PHP設定を修正してください: register_globalsを「Off」および/またはmagic_quotes_gpcを「On」';
$string['globalsquoteshelp'] = '<p>Magic Quotes GPCの無効化およびRegister Globalsの有効化の同時設定お勧めできません。</p>

<p>php.iniに関する推奨設定は <b>magic_quotes_gpc = On</b> および <b>register_globals = Off</b> です。</p>

<p>あなたが php.ini にアクセスできない場合、Moodleディレクトリの中に .htaccess という名称のファイルを次のように記述することができます:</p>
<blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
<blockquote><div>php_value register_globals Off</div></blockquote>';
$string['inputdatadirectory'] = 'データディレクトリ :';
$string['inputwebadress'] = 'ウェブアドレス :';
$string['inputwebdirectory'] = 'Moodleディレクトリ :';
$string['installation'] = 'インストレーション';
$string['langdownloaderror'] = '残念ですが、言語「 {$a} 」がインストールされていません。インストール処理は英語で継続されます。';
$string['langdownloadok'] = '言語「 {$a} 」が正常にインストールされました。インストール処理は、この言語で継続されます。';
$string['magicquotesruntime'] = 'Magic Quotesランタイム';
$string['magicquotesruntimeerror'] = 'これは無効にしてください。';
$string['magicquotesruntimehelp'] = '<p>Moodleを正常に動作させるためには、Magic quotesランタイムを無効にする必要があります。</p>

<p>通常はデフォルトで無効にされています ... あなたのphp.iniファイルの <b>magic_quotes_runtime</b> 設定を確認してください。</p>

<p>php.iniファイルにアクセスできない場合、Moodleディレクトリの.htaccessファイルに次の行を追加してください:</p>
<blockquote><div>php_value magic_quotes_runtime Off</div></blockquote>';
$string['memorylimit'] = 'Memory Limit';
$string['memorylimiterror'] = 'PHPのmemory limitが低すぎます ... 後で問題が発生する可能性があります。';
$string['memorylimithelp'] = '<p>現在、サーバのPHPメモリー制限が {$a} に設定されています。</p>

<p>この設定ではMoodleのメモリーに関わるトラブルが発生する可能性があります。 特に多くのモジュールを使用したり、多くのユーザがMoodleを使用する場合にトラブルが発生します。</p>

<p>可能でしたら、PHPのメモリー制限上限を40M以上に設定されることをお勧めします。この設定を実現するために、いくつかの方法があります:
<ol>
<li>あなたがリコンパイル可能な場合、PHPを<i>--enable-memory-limit</i>オプションでコンパイルしてください。これにより、Moodle自身がメモリー制限を設定することが可能になります。</li>
<li>あなたがphp.iniファイルにアクセスできる場合、<b>memory_limit</b>設定を40Mのように変更することができます。php.iniファイルにアクセスできない場合、管理者に変更を依頼してください。</li>
<li>いくつかのPHPサーバでは、下記の行を含む.htaccessファイルをMoodleディレクトリに作成することができます:
<blockquote><div>php_value memory_limit 40M</div></blockquote>
<p>しかし、この設定が<b>すべての</b>PHPページの動作を妨げる場合もあります。ページ閲覧中にエラーが表示される場合、.htaccessファイルを削除してください。</p></li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'PHPのMSSQL拡張モジュールが適切に設定されていないため、SQL*Serverと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['mssql_n'] = 'SQL*Server UTF-8サポート (mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHPのMySQL拡張モジュールが適切に設定されていないため、MySQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['mysqli'] = 'Improved MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHPのMySQLi拡張モジュールが適切に設定されていないため、MySQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。MySQLi拡張モジュールは、PHP4では使用できません。';
$string['nativemssql'] = 'SQL*Server FreeTDS (ネイティブ/mssql)';
$string['nativemssqlhelp'] = 'あなたはほとんどのMoodleデータが保存されるデータベースを設定する必要があります。このデータベースはすでに作成され、アクセスするためのユーザ名およびパスワードが作成されている必要があります。テーブル接頭辞は必須項目です。';
$string['nativemysqli'] = 'Improved MySQL (ネイティブ/mysqli)';
$string['nativemysqlihelp'] = 'あなたは、ほとんどのMoodleデータが保存されるデータベースを設定する必要があります。すでにデータベースユーザに必要なパーミッション、ユーザ名およびパスワードがある場合、データベースが作成されます。テーブル接頭辞は、任意です。';
$string['nativeoci'] = 'Oracle (ネイティブ/oci)';
$string['nativeocihelp'] = 'あなたはほとんどのMoodleデータが保存されるデータベースを設定する必要があります。このデータベースはすでに作成され、アクセスするためのユーザ名およびパスワードが作成されている必要があります。テーブル接頭辞は必須項目です。';
$string['nativepgsql'] = 'PostgreSQL (ネイティブ/pgsql)';
$string['nativepgsqlhelp'] = 'あなたは、ほとんどのMoodleデータが保存されるデータベースを設定する必要があります。このデータベースは、すでに作成されている必要があります。また、データベースにアクセスするため、ユーザ名およびパスワードも作成されている必要があります。テーブル接頭辞は、任意です。';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (ネイティブ/sqlsrv)';
$string['nativesqlsrvhelp'] = 'あなたはほとんどのMoodleデータが保存されるデータベースを設定する必要があります。このデータベースはすでに作成され、アクセスするためのユーザ名およびパスワードが作成されている必要があります。テーブル接頭辞は必須項目です。';
$string['nativesqlsrvnodriver'] = 'Microsoft SQL Server Driver for PHP がインストールされていない、または適切に設定されませんでした。';
$string['nativesqlsrvnonwindows'] = 'Microsoft SQL Server Driver for PHP はWindows OSでのみ利用することができます。';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHPのOCI8拡張モジュールが適切に設定されていないため、Oracleと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['odbcextensionisnotpresentinphp'] = 'PHPのODBC拡張モジュールが適切に設定されていないため、SQL*Serverと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['odbc_mssql'] = 'SQL*Server over ODBC (odbc_mssql)';
$string['pass'] = 'パス';
$string['paths'] = 'パス';
$string['pathserrcreatedataroot'] = 'データディレクトリ ({$a->dataroot}) は、インストーラーで作成できません。';
$string['pathshead'] = 'パスを確認する';
$string['pathsrodataroot'] = 'datarootディレクトリに書き込み権がありません。';
$string['pathsroparentdataroot'] = '親ディレクトリ ({$a->parent}) に書き込み権がありません。データディレクトリ ({$a->dataroot}) は、インストーラーで作成できません。';
$string['pathssubadmindir'] = '極わずかですが、あなたがコントロールパネル等にアクセスするため、特別なURIとして/adminを使用するウェブホストがあります。残念なことに、これはMoodle管理ページの標準的なローケーションと競合してしまいます。ここに新しいディレクトリ名を入力することで、あなたのMoodleのadminディレクトリを修正することができます。例えば、<em>moodleadmin</em>です。これにより、Moodleのadminリンクが修正されます。';
$string['pathssubdataroot'] = 'あなたには、Moodleがファイルをアップロードすることのできる場所が必要です。このディレクトリは、ウェブサーバユーザ (通常「nobody」または「apache」) から読み込みおよび「書き込み」できる必要があります。しかし、ウェブからは直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。';
$string['pathssubdirroot'] = 'Moodleインストールに関するフルディレクトリパスです。';
$string['pathssubwwwroot'] = 'Moodleにアクセスすることのできるフルウェブアドレスです。複数アドレスを使用して、Moodleにアクセスすることはできません。あなたのサイトに複数のパブリックアドレスがある場合、このアドレスを除く、すべてのアドレスにパーマネントリダイレクトを設定してください。あなたのサイトにイントラネットおよびインターネットからアクセスできる場合、ここにはパブリックアドレスを入力してください。また、イントラネットユーザもパブリックアドレスを利用できるよう、DNSを設定してください。アドレスが正しくない場合、あなたのブラウザのURIを変更して、異なる値でインストールを再開してください。';
$string['pathsunsecuredataroot'] = 'dirrootロケーションが安全ではありません。';
$string['pathswrongadmindir'] = 'adminディレクトリがありません。';
$string['pgsqlextensionisnotpresentinphp'] = 'PHPのPGSQL拡張モジュールが適切に設定されていないため、PostgreSQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['phpextension'] = '{$a} PHP拡張モジュール';
$string['phpversion'] = 'PHPバージョン';
$string['phpversionhelp'] = '<p>Moodleには、少なくとも 4.3.0 または 5.1.0 のPHPバージョンが必要です (5.0.x には既知の多数の問題があります)。</p>
<p>現在、バージョン {$a} が動作しています。</p>
<p>PHPをアップグレードするか、新しいバージョンがインストールされているホストに移動してください!<br />
(5.0.x の場合、バージョン 4.4.x にダウングレードすることもできます。)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = 'このバージョンのMoodleに関する情報は、{$a} のリリースノートをご覧ください。';
$string['safemode'] = 'セーフモード';
$string['safemodeerror'] = 'セーフモードが有効の場合、Moodleに問題が発生する場合があります。';
$string['safemodehelp'] = '<p>セーフモードが有効にされている場合、Moodleには様々な問題が発生する場合があります。 特に新しいファイルを作成することができません。</p>

<p>通常セーフモードは、被害妄想を持ったウェブホストで有効にされています。Moodleサイト用に別の新しいウェブホスティング会社を探してください。</p>

<p>あなたはインストール作業を続けることも可能ですが、後でいくつかの問題が発生することが予想されます。</p>';
$string['sessionautostart'] = 'セッション自動スタート';
$string['sessionautostarterror'] = 'これは無効にしてください。';
$string['sessionautostarthelp'] = '<p>Moodleはセッションサポートを必要とします。また、セッションサポートなしでは動作しません。</p>
<p>セッションは、php.iniファイルで有効にすることができます ... session.auto_startパラメータを探してください。</p>';
$string['skipdbencodingtest'] = 'DBエンコーディングテストをスキップ';
$string['sqliteextensionisnotpresentinphp'] = 'PHPのSQLite拡張モジュールが適切に設定されていません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['upgradingqtypeplugin'] = '問題/タイププラグインのアップグレード';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'インストールが正常に完了して、あなたのコンピュータで <strong>{$a->packname} {$a->packversion}</strong> パッケージが起動されたため、このページが表示されています。おめでとうございます!';
$string['welcomep30'] = 'このリリース <strong>{$a->installername}</strong> には<strong>Moodle</strong>で環境を作成するアプリケーションが含まれています。すなわち:';
$string['welcomep40'] = 'パッケージには <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong> も含まれています。';
$string['welcomep50'] = 'このパッケージ内のすべてのアプリケーションの使用は個々のライセンスによって規定されています。全体の <strong>{$a->installername}</strong> パッケージは <a href="http://www.opensource.org/docs/definition_plain.html">オープンソース</a> であり、<a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>ライセンスの下で配布されています。';
$string['welcomep60'] = '次からのページは、あなたのコンピュータに<strong>Moodle</strong>を簡単に設定およびセットアップする手順にしたがって進みます。あなたはデフォルトの設定を使用することも、必要に応じて任意で設定を変更することもできます。';
$string['welcomep70'] = '<strong>Moodle</strong>のセットアップを続けるには「次へ」ボタンをクリックしてください。';
$string['wwwroot'] = 'ウェブアドレス';
$string['wwwrooterror'] = '「ウェブアドレス」が正しくありません - インストール済みMoodleはそこに表示されません。下記の値はリセットされました。';
