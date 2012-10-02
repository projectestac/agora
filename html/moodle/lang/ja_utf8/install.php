<?PHP // $Id$ 
      // install.php - created with Moodle 2.0 dev (Build: 20091207) (2009112400)


$string['admindirerror'] = '指定されたadminディレクトリが正しくありません。';
$string['admindirname'] = 'Adminディレクトリ';
$string['admindirsetting'] = 'まれに、コントロールパネルまたはその他の管理ツールにアクセスするためのURIとして/adminディレクトリを使用しているウェブホストがあります。残念ながら、これはMoodle管理ページの標準的なロケーションと衝突します。インストールするときにadminディレクトリをリネームすることが可能です。ここに新しいディレクトリ名を入力してください。例: <br /> <br /><b>moodleadmin</b><br /> <br />
これはMoodleのadminリンクを変更します。';
$string['admindirsettinghead'] = '管理ディレクトリの設定中 ...';
$string['admindirsettingsub'] = 'まれなケースですが /admin をコントロールパネルまたはその他のページにアクセスするための特別なURIとして使用しているウェブホストがあります。残念ですが、これは標準的なMoodle管理ページのロケーションと衝突します。あなたのインストールに関するadminディレクトリをリネームすることで、この衝突を回避できます。例えば: <br /> <br /><b>moodleadmin</b><br /> <br />
これによりMoodleの管理ページへのリンクは修正されます。';
$string['caution'] = '警告';
$string['chooselanguage'] = '言語を選択してください。';
$string['chooselanguagehead'] = '言語を選択してください。';
$string['chooselanguagesub'] = 'インストールのみに使用する言語を選択してください。この言語はサイトのデフォルト言語としても使用されます。サイト言語は後で変更することが可能です。';
$string['compatibilitysettings'] = 'PHP設定を確認しています ...';
$string['compatibilitysettingshead'] = 'PHP設定を確認しています ...';
$string['compatibilitysettingssub'] = 'Moodleを適切に動作させるためにはあなたのサーバがこれらすべてのテストに通る必要があります。';
$string['configfilenotwritten'] = 'インストールスクリプトは自動的にあなたの選択した設定を反映したconfig.phpファイルを作成することができませんでした。おそらく、Moodleディレクトリに書き込み権が無いためだと思われます。下記のコードをconfig.phpという名称のファイルとしてMoodleのルートディレクトリにコピーすることができます。';
$string['configfilewritten'] = 'config.phpが正常に作成されました。';
$string['configurationcomplete'] = '設定が完了しました。';
$string['configurationcompletehead'] = '設定が完了しました。';
$string['configurationcompletesub'] = 'MoodleはMoodleインストレーションルートへの設定内容の保存を試みました。';
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
$string['databasesettings'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行います。このデータベースはアクセスするためのユーザ名およびパスワードとともにすでに作成されている必要があります。<br />
<br /> <br />
<b>タイプ:</b> mysql または postgres7<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingshead'] = 'ほとんどのMoodleデータが保存されるデータベース設定を行います。このデータベースはアクセスするためのユーザ名およびパスワードとともにすでに作成されている必要があります。';
$string['databasesettingssub'] = '<b>タイプ:</b> mysql または postgres7<br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)';
$string['databasesettingssub_mssql'] = '<b>タイプ:</b> SQL*Server (非UTF-8) <b><strong class=\"errormsg\">実験用! (運用環境には使用しないでください。)</strong></b><br />
<b>ホスト:</b> 例 localhost または db.isp.com<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> データベースのユーザ名<br />
<b>パスワード:</b> データベースのパスワード<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (必須)';
$string['databasesettingssub_mssql_n'] = '<b>タイプ:</b> SQL*Server (UTF-8)<b><font color=\"red\">実験用! (運用環境には使用しないでください。)</font></b><br />
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
$string['databasesettingssub_odbc_mssql'] = '<b>タイプ:</b> SQL*Server (ODBC経由) <b><strong class=\"errormsg\">実験用! (運用環境には使用しないでください。)</strong></b><br />
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
$string['dataroot'] = 'データディレクトリ';
$string['datarooterror'] = 'あなたが指定した「データディレクトリ」が見つからないか、作成されませんでした。パスを訂正するか、ディレクトリを手動で作成してください。';
$string['datarootpublicerror'] = 'あなたが指定した「データディレクトリ」はウェブ経由でアクセスすることができます。異なるディレクトリを使用してください。';
$string['dbconnectionerror'] = 'あなたが指定したデータベースに接続できませんでした。データベース設定を確認してください。';
$string['dbcreationerror'] = 'データベース作成エラー。設定で指定された名称のデータベースを作成できませんでした。';
$string['dbhost'] = 'ホストサーバ';
$string['dbpass'] = 'パスワード';
$string['dbprefix'] = 'テーブル接頭辞';
$string['dbtype'] = 'タイプ';
$string['dbwrongencoding'] = '選択したデータベースは非推奨のエンコーディング ($a) で動作しています。代わりにユニコード (UTF-8) でエンコードされたデータベースの使用をお勧めします。下記の「DBエンコーディングテストをスキップ」をチェックすることで、このテストをバイパスできますが、将来的に問題が発生する恐れがあります。';
$string['dbwronghostserver'] = '上記説明の「ホスト」ルールに従ってください。';
$string['dbwrongnlslang'] = 'あなたのウェブサーバのNLS_LANG環境変数にはAL32UTF8文字セットを使用してください。OCI8を適切に設定するには、PHPドキュメンテーションをご覧ください。';
$string['dbwrongprefix'] = '上記説明の「テーブル接頭辞」ルールに従ってください。';
$string['directorysettings'] = '<p>このMoodleのインストール先を確認してください。</p>

<p><b>ウェブアドレス:</b>
Moodleにアクセスする完全なウェブアドレスを指定してください。複数のURIよりアクセス可能な場合は学生が利用する最も自然なURIを選択してください。末尾にスラッシュを付けないでください。</p>

<p><b>Moodleディレクトリ:</b>
インストール先の完全なディレクトリパスを指定してください。大文字/小文字が間違っていないか確認してください。</p>

<p><b>データディレクトリ:</b>
Moodleが、アップロードされたファイルを保存する場所が必要です。 このディレクトリはウェブサーバのユーザ (通常は「nobody」または「apache」) が読み込みおよび書き込みできるようにしてください。しかし、ウェブから直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。</p>';
$string['directorysettingshead'] = 'Moodleのインストール先を確認してください。';
$string['directorysettingssub'] = '<p><b>ウェブアドレス:</b>
Moodleにアクセスする完全なウェブアドレスを指定してください。複数のURIよりアクセス可能な場合は学生が利用する最も自然なURIを選択してください。末尾にスラッシュを付けないでください。</p>
<br />
<br />
<p><b>Moodleディレクトリ:</b>
インストール先の完全なディレクトリパスを指定してください。大文字/小文字が間違っていないか確認してください。</p>
<br />
<br />
<p><b>データディレクトリ:</b>
アップロードされたファイルをMoodleが保存する場所が必要です。 このディレクトリはウェブサーバのユーザ (通常は「nobody」または「apache」) が読み込みおよび書き込みできるようにしてください。しかし、ウェブから直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。</p>';
$string['dirroot'] = 'Moodleディレクトリ';
$string['dirrooterror'] = '「Moodleディレクトリ」設定が間違っているようです - インストール済みMoodleが見つかりませんでした。下記の値がリセットされました。';
$string['download'] = 'ダウンロード';
$string['downloadlanguagebutton'] = '「 $a 」言語パックをダウンロードする';
$string['downloadlanguagehead'] = '言語パックのダウンロード';
$string['downloadlanguagenotneeded'] = 'デフォルトの言語パック「 $a 」でインストール処理を続けることができます。';
$string['downloadlanguagesub'] = 'あなたは言語パックをダウンロードして、この言語でインストールを継続することができます。<br /><br />もし、あなたが言語パックをダウンロードできない場合、インストールは英語で継続されます。 (インストールの完了後、さらに言語パックをダウンロードして、インストールすることができます。)';
$string['environmenthead'] = 'あなたの環境を確認しています ...';
$string['environmentsub'] = 'あなたのシステムに関する様々な要素が、システム要件に合致するか確認しています。';
$string['fail'] = '失敗';
$string['fileuploads'] = 'ファイルアップロード';
$string['fileuploadserror'] = 'これは有効にしてください。';
$string['fileuploadshelp'] = '<p>あなたのサーバではファイルのアップロードができないようです。</p>
<p>Moodleのインストールは可能ですが、ファイルのアップロードができない場合はコースファイルやユーザプロファイルのイメージをアップロードすることができません。</p>
<p>ファイルアップロードを可能にするには、あなた (またはシステム管理者) があなたのシステムのメインphp.iniファイルを編集して、<b>file_uploads</b> を「1」にする必要があります。</p>';
$string['gdversion'] = 'GDバージョン';
$string['gdversionerror'] = 'イメージの処理および作成を行うにはGDライブラリが必要です。';
$string['gdversionhelp'] = '<p>あなたのサーバにはGDがインストールされていないようです。</p>

<p>GDはMoodleがイメージ (ユーザプロファイルアイコン等) を処理したり、新しいイメージ (ロググラフ等) を作成するためにPHPが必要とするライブラリです。MoodleはGDなしでも動作します -  イメージ処理等が使用できないだけです。</p>

<p>Unix環境下で、GDをPHPにインストールするには、PHPを --with-gd パラメータでコンパイルしてください。</p>

<p>Windows環境下ではphp.iniでphp_gd2.dllを参照している行のコメントアウトを取り除いてください。</p>';
$string['globalsquotes'] = '安全では無いGlobalsのハンドリング';
$string['globalsquoteserror'] = 'PHP設定を修正してください: register_globalsを「Off」および/またはmagic_quotes_gpcを「On」';
$string['globalsquoteshelp'] = '<p>Magic Quotes GPCの無効化およびRegister Globalsの有効化の同時設定お勧めできません。</p>

<p>php.iniに関する推奨設定は <b>magic_quotes_gpc = On</b> および <b>register_globals = Off</b> です。</p>

<p>あなたが php.ini にアクセスできない場合、Moodleディレクトリの中に .htaccess という名称のファイルを次のように記述することができます:</p>
<blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
<blockquote><div>php_value register_globals Off</div></blockquote>';
$string['installation'] = 'インストレーション';
$string['langdownloaderror'] = '残念ですが、言語「 $a 」がインストールされていません。インストール処理は英語で継続されます。';
$string['langdownloadok'] = '言語「 $a 」が正常にインストールされました。インストール処理はこの言語で継続されます。';
$string['magicquotesruntime'] = 'Magic Quotesランタイム';
$string['magicquotesruntimeerror'] = 'これは無効にしてください。';
$string['magicquotesruntimehelp'] = '<p>Moodleを正常に動作させるためにはMagic quotesランタイムを無効にする必要があります。</p>

<p>通常はデフォルトで無効にされています ... php.iniの <b>magic_quotes_runtime</b> 設定を確認してください。</p>

<p>php.iniファイルにアクセスできない場合はMoodleディレクトリの.htaccessファイルに次の行を追加してください:</p>
<blockquote><div>php_value magic_quotes_runtime Off</div></blockquote>';
$string['memorylimit'] = 'Memory Limit';
$string['memorylimiterror'] = 'PHPのmemory limitが低すぎます ... 後で問題が発生する可能性があります。';
$string['memorylimithelp'] = '<p>現在、サーバのPHPメモリー制限が $a に設定されています。</p>
<p>この設定ではMoodleのメモリーに関わるトラブルが発生します。 特に多くのモジュールを使用したり、多くのユーザがMoodleを使用する場合に、トラブルが発生します。</p>
<p>可能でしたら、PHPのメモリー制限上限を40M以上に設定されることをお勧めします。この設定を実現するために、いくつかの方法があります:
<ol>
<li>コンパイル可能な場合はPHPを<i>--enable-memory-limit</i>オプションでコンパイルしてください。
これにより、Moodle自身がメモリー制限を設定することが可能になります。</li>
<li>php.iniファイルにアクセスできる場合は<b>memory_limit</b>設定を40Mのように変更することができます。php.iniファイルにアクセスできない場合は管理者に変更を依頼してください。</li>
<li>いくつかのPHPサーバでは下記の行を含む.htaccessファイルをMoodleディレクトリに作成することができます:
<blockquote><div>php_value memory_limit 40M</div></blockquote>
<p>しかし、この設定が<b>すべての</b>PHPページの動作を妨げる場合もあります。ページ閲覧中にエラーが表示される場合は.htaccessファイルを削除してください。</p></li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server UTF-8サポート (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'PHPのMSSQL拡張モジュールが適切に設定されていないため、SQL*Serverと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHPのMySQL拡張モジュールが適切に設定されていないため、MySQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['mysqli'] = 'Improved MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHPのMySQLi拡張モジュールが適切に設定されていないため、MySQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。MySQLi拡張モジュールはPHP4では使用できません。';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHPのOCI8拡張モジュールが適切に設定されていないため、Oracleと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['odbc_mssql'] = 'SQL*Server over ODBC (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'PHPのODBC拡張モジュールが適切に設定されていないため、SQL*Serverと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['pass'] = 'パス';
$string['pgsqlextensionisnotpresentinphp'] = 'PHPのPGSQL拡張モジュールが適切に設定されていないため、PostgreSQLと通信できません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。';
$string['phpversion'] = 'PHPバージョン';
$string['phpversionerror'] = 'PHPバージョンは少なくとも 4.3.0 または 5.1.0 をお使いください (5.0.x には既知の多数の問題があります)。';
$string['phpversionhelp'] = '<p>Moodleには少なくとも 4.3.0 または 5.1.0 のPHPバージョンが必要です (5.0.x には既知の多数の問題があります)。</p>
<p>現在、バージョン $a が動作しています。</p>
<p>PHPをアップグレードするか、新しいバージョンがインストールされているホストに移動してください!<br />
(5.0.x の場合、バージョン 4.4.x にダウングレードすることもできます。)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['postgresqlwarning'] = '<strong>メモ:</strong> あなたが接続問題を経験している場合、「Host Server」フィールドに「
host=\'postgresql_host\' port=\'5432\' dbname=\'postgresql_database_name\' user=\'postgresql_user\' password=\'postgresql_user_password\'」と入力して、「Database」「User」「Password」フィールドを空白にしてください。詳細は<a href=\"http://docs.moodle.org/en/Installing_Postgres_for_PHP\">Moodle Docs</a>をご覧ください。';
$string['safemode'] = 'セーフモード';
$string['safemodeerror'] = 'セーフモードが有効の場合、Moodleに問題が発生する場合があります。';
$string['safemodehelp'] = '<p>セーフモードが有効にされている場合、Moodleには様々な問題が発生する場合があります。 特に新しいファイルを作成することができません。</p>
<p>通常セーフモードは被害妄想を持ったウェブホストで有効にされています。Moodleサイト用に別の新しいウェブホスティング会社を探してください。</p>
<p>セーフモード環境下で、インストール作業を続けることも可能ですが、後でいくつかの問題が発生することが予想されます。</p>';
$string['sessionautostart'] = 'セッション自動スタート';
$string['sessionautostarterror'] = 'これは無効にしてください。';
$string['sessionautostarthelp'] = '<p>Moodleはセッションサポートを必要とします。また、セッションサポートなしでは動作しません。</p>
<p>セッションはphp.iniファイルで有効にすることができます ... session.auto_startパラメータを探してください。</p>';
$string['skipdbencodingtest'] = 'DBエンコーディングテストをスキップ';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'インストールが正常に完了したため、このページをご覧いただいています。あなたのコンピュータで <strong>$a->packname $a->packversion</strong> パッケージを起動してください。おめでとうございます!';
$string['welcomep30'] = 'このリリース <strong>$a->installername</strong> には<strong>Moodle</strong> で環境を作成するアプリケーションが含まれています。すなわち:';
$string['welcomep40'] = 'パッケージには <strong>Moodle $a->moodlerelease ($a->moodleversion)</strong> も含まれています。';
$string['welcomep50'] = 'このパッケージ内のすべてのアプリケーションの使用は個々のライセンスによって規定されています。全体の <strong>$a->installername</strong> パッケージは <a href=\"http://www.opensource.org/docs/definition_plain.html\">オープンソース</a> であり、<a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>ライセンスの下で配布されています。';
$string['welcomep60'] = '次からのページはあなたのコンピュータに <strong>Moodle</strong> を簡単に設定およびセットアップする手順にしたがって進みます。デフォルトの設定を使用することも、必要に応じて任意で設定を変更することもできます。';
$string['welcomep70'] = '<strong>Moodle</strong>のセットアップを続けるには「次へ」ボタンをクリックしてください。';
$string['wwwroot'] = 'ウェブアドレス';
$string['wwwrooterror'] = '「ウェブアドレス」が正しくありません - インストール済みMoodleはそこに表示されません。下記の値はリセットされました。';
$string['availablelangs'] = '利用可能な言語一覧'; // ORPHANED
$string['cliadminpassword'] = '新しい管理者パスワード'; // ORPHANED
$string['clialreadyinstalled'] = 'ファイルconfig.phpはすでに登録されています。あなたのサイトをアップグレードしたい場合、admin/cli/upgrade.phpを使用してください。'; // ORPHANED
$string['cliinstallfinished'] = 'インストールが正常に完了しました。'; // ORPHANED
$string['cliinstallheader'] = 'Moodle $a コマンドライン・インストールプログラム'; // ORPHANED
$string['climustagreelicense'] = '非インタラクティブモードではあなたは「--agree-license」オプションを指定することで、ライセンスに同意する必要があります。'; // ORPHANED
$string['clitablesexist'] = 'データベーステーブルはすでに作成されています。cliインストールを続けることはできません。'; // ORPHANED
$string['databasecreationsettingssub2'] = '<b>タイプ:</b> インストーラーにより「mysqli」に修正されました。<br />
<b>ホスト:</b> インストーラーにより「localhost」に修正されました。<br />
<b>データベース名:</b> 例 moodle<br />
<b>ユーザ名:</b> インストーラーにより「root」に修正されました。<br />
<b>パスワード:</b> あなたのデータベースパスワードです。<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用される任意の接頭辞です。'; // ORPHANED
$string['databasehead'] = 'データベース設定'; // ORPHANED
$string['databasehost'] = 'データベースホスト :'; // ORPHANED
$string['databasename'] = 'データベース名 :'; // ORPHANED
$string['databasepass'] = 'データベースパスワード :'; // ORPHANED
$string['databasesocket'] = 'Unixソケット'; // ORPHANED
$string['databasetypehead'] = 'データベースドライバを選択する'; // ORPHANED
$string['databasetypesub'] = 'Moodeではいくつかのデータベースサーバのタイプをサポートします。どのタイプを使用するか分からない場合、サーバ管理者に連絡してください。'; // ORPHANED
$string['databaseuser'] = 'データベースユーザ :'; // ORPHANED
$string['doyouagree'] = '同意しますか ? (yes/no):'; // ORPHANED
$string['environmentsub2'] = 'それぞれのMoodleリリースにはPHPバージョンの最小必要条件および多くの必須PHP拡張モジュールがあります。完全な環境チェックはインストールおよびアップグレードごとに実行されます。新しいPHPバージョンのインストールまたはPHP拡張モジュールの有効化に関して分からない場合、あなたのサーバ管理者に連絡してください。'; // ORPHANED
$string['errorsinenvironment'] = '環境エラー!'; // ORPHANED
$string['inputdatadirectory'] = 'データディレクトリ :'; // ORPHANED
$string['inputwebadress'] = 'ウェブアドレス :'; // ORPHANED
$string['inputwebdirectory'] = 'Moodleディレクトリ :'; // ORPHANED
$string['nativemysqli'] = 'Improved MySQL (ネイティブ/mysqli)'; // ORPHANED
$string['nativemysqlihelp'] = 'あなたはほとんどのMoodleデータが保存されるデータベースを設定する必要があります。すでにデータベースユーザに必要なパーミッション、ユーザ名およびパスワードがある場合、データベースが作成されます。テーブル接頭辞は任意です。'; // ORPHANED
$string['nativeoci'] = 'Oracle (ネイティブ/oci)'; // ORPHANED
$string['nativepgsql'] = 'PostgreSQL (ネイティブ/pgsql)'; // ORPHANED
$string['nativepgsqlhelp'] = 'あなたはほとんどのMoodleデータが保存されるデータベースを設定する必要があります。このデータベースはすでに作成されている必要があります。また、データベースにアクセスするため、ユーザ名およびパスワードも作成されている必要があります。テーブル接頭辞は任意です。'; // ORPHANED
$string['paths'] = 'パス'; // ORPHANED
$string['pathserrcreatedataroot'] = 'データディレクトリ ($a->dataroot) はインストーラーで作成できません。'; // ORPHANED
$string['pathshead'] = 'パスを確認する'; // ORPHANED
$string['pathsrodataroot'] = 'datarootディレクトリに書き込み権がありません。'; // ORPHANED
$string['pathsroparentdataroot'] = '親ディレクトリ ($a->parent) に書き込み権がありません。データディレクトリ ($a->dataroot) はインストーラーで作成できません。'; // ORPHANED
$string['pathssubadmindir'] = '極わずかですが、あなたがコントロールパネル等にアクセスするため、特別なURIとして/adminを使用するウェブホストがあります。残念なことに、これはMoodle管理ページの標準的なローケーションと競合してしまいます。ここに新しいディレクトリ名を入力することで、あなたのMoodleのadminディレクトリを修正することができます。例えば、<em>moodleadmin</em>です。これにより、Moodleのadminリンクが修正されます。'; // ORPHANED
$string['pathssubdataroot'] = 'あなたにはMoodleがファイルをアップロードすることのできる場所が必要です。このディレクトリはウェブサーバユーザ (通常「nobody」または「apache」) から読み込みおよび「書き込み」できる必要があります。しかし、ウェブからは直接アクセスできないようにしてください。データディレクトリがない場合、インストーラーは作成を試みます。'; // ORPHANED
$string['pathssubdirroot'] = 'Moodleインストールに関するフルディレクトリパスです。あなたがシンボリックリンクを使用する必要がある場合のみ変更してください。'; // ORPHANED
$string['pathssubwwwroot'] = 'Moodleにアクセスすることのできるフルウェブアドレスです。複数アドレスを使用して、Moodleにアクセスすることはできません。あなたのサイトに複数のパブリックアドレスがある場合、このアドレスを除く、すべてのアドレスにパーマネントリダイレクトを設定してください。あなたのサイトにイントラネットおよびインターネットからアクセスできる場合、ここにはパブリックアドレスを入力してください。また、イントラネットユーザもパブリックアドレスを利用できるよう、DNSを設定してください。'; // ORPHANED
$string['pathsunsecuredataroot'] = 'dirrootロケーションが安全ではありません。'; // ORPHANED
$string['pathswrongadmindir'] = 'adminディレクトリがありません。'; // ORPHANED
$string['pathswrongdirroot'] = 'dirrootロケーションが正しくありません。'; // ORPHANED
$string['phpextension'] = '$a PHP拡張モジュール'; // ORPHANED
$string['releasenoteslink'] = 'このバージョンのMoodleに関する情報は$a のリリースノートをご覧ください。'; // ORPHANED
$string['sqliteextensionisnotpresentinphp'] = 'PHPのSQLite拡張モジュールが適切に設定されていません。あなたのphp.iniファイルをチェックするか、PHPを再コンパイルしてください。'; // ORPHANED
$string['upgradingqtypeplugin'] = '問題/タイププラグインのアップグレード'; // ORPHANED
$string['aborting'] = 'インストール異常終了'; // ORPHANED
$string['adminemail'] = 'メールアドレス :'; // ORPHANED
$string['adminfirstname'] = '名 :'; // ORPHANED
$string['admininfo'] = '管理者詳細'; // ORPHANED
$string['adminlastname'] = '姓 :'; // ORPHANED
$string['adminpassword'] = 'パスワード :'; // ORPHANED
$string['adminusername'] = 'ユーザ名 :'; // ORPHANED
$string['askcontinue'] = '続ける (yes/no) :'; // ORPHANED
$string['availabledbtypes'] = '利用可能なデータベースタイプ'; // ORPHANED
$string['cannotconnecttodb'] = 'データベースに接続できません。'; // ORPHANED
$string['checkingphpsettings'] = 'PHP設定の確認'; // ORPHANED
$string['configfilecreated'] = 'config.phpファイルが正常に作成されました。'; // ORPHANED
$string['configfiledoesnotexist'] = 'config.phpファイルがありません!!!'; // ORPHANED
$string['configurationfileexist'] = 'config.phpファイルはすでに作成されています!'; // ORPHANED
$string['creatingconfigfile'] = 'config.phpファイルを作成しています ...'; // ORPHANED
$string['databasesettingsformoodle'] = 'Moodleのデータベース設定'; // ORPHANED
$string['databasetype'] = 'データベースタイプ :'; // ORPHANED
$string['disagreelicense'] = 'GPLに不同意のため、アップグレードを開始できません!'; // ORPHANED
$string['downloadlanguagepack'] = '言語パックをダウンロードしますか? (yes/no) :'; // ORPHANED
$string['downloadsuccess'] = '言語パックが正常にダウンロードされました。'; // ORPHANED
$string['installationiscomplete'] = 'インストールが完了しました!'; // ORPHANED
$string['invalidargumenthelp'] = 'エラー: 無効な引数
使用方法: \$ php cliupgrade.php オプション
--help オプションを使用することで、さらにヘルプが表示されます。'; // ORPHANED
$string['invalidemail'] = '無効なメールアドレス'; // ORPHANED
$string['invalidhost'] = '無効なホスト'; // ORPHANED
$string['invalidint'] = 'エラー: 値が整数ではありません。'; // ORPHANED
$string['invalidintrange'] = 'エラー: 値が有効範囲を超えています。'; // ORPHANED
$string['invalidpath'] = '無効なパス'; // ORPHANED
$string['invalidsetelement'] = 'エラー: 与えられた値は既定のオプションにありません。'; // ORPHANED
$string['invalidtextvalue'] = '無効なテキスト値'; // ORPHANED
$string['invalidurl'] = '無効なURI'; // ORPHANED
$string['invalidvalueforlanguage'] = '--lang オプションに対して無効な値です。詳細は--helpをご覧ください。'; // ORPHANED
$string['invalidyesno'] = 'エラー: 値は有効な yes/no 引数ではありません。'; // ORPHANED
$string['locationanddirectories'] = 'ロケーションおよびディレクトリ'; // ORPHANED
$string['pdosqlite3'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">実験用です! (実稼動サイト用ではありません)</strong></b>'; // ORPHANED
$string['php52versionerror'] = '少なくとも5.2.4以上のPHPバージョンを使用してください。'; // ORPHANED
$string['php52versionhelp'] = '<p>Moodleでは少なくとも5.2.4以上のPHPバージョンを必要とします。</p>
<p>現在、あなたはPHPバージョン $a を使用しています。</p>
<p>あなたはPHPをアップグレードするか、新しいバージョンのPHPを使用しているホストに移動する必要があります!</p>'; // ORPHANED
$string['selectlanguage'] = 'インストールで使用する言語の選択'; // ORPHANED
$string['sitefullname'] = '長いサイト名 :'; // ORPHANED
$string['siteinfo'] = 'サイト詳細'; // ORPHANED
$string['sitenewsitems'] = 'ニュースアイテムの表示件数 :'; // ORPHANED
$string['siteshortname'] = 'サイト省略名 :'; // ORPHANED
$string['sitesummary'] = 'フロントページの説明 :'; // ORPHANED
$string['tableprefix'] = 'テーブル接頭辞 :'; // ORPHANED
$string['upgradingactivitymodule'] = '活動モジュールのアップグレード'; // ORPHANED
$string['upgradingbackupdb'] = 'バックアップデータのアップブレード'; // ORPHANED
$string['upgradingblocksdb'] = 'ブロックデータベースのアップグレード'; // ORPHANED
$string['upgradingblocksplugin'] = 'ブロックプラグインのアップグレード'; // ORPHANED
$string['upgradingcompleted'] = 'アップグレードが完了しました ...'; // ORPHANED
$string['upgradingcourseformatplugin'] = 'コースフォーマットプラグインのアップグレード'; // ORPHANED
$string['upgradingenrolplugin'] = 'ユーザ登録プラグインのアップグレード'; // ORPHANED
$string['upgradinggradeexportplugin'] = '評定エクスポートプラグインのアップグレード'; // ORPHANED
$string['upgradinggradeimportplugin'] = '評定インポートプラグインのアップグレード'; // ORPHANED
$string['upgradinggradereportplugin'] = '評定レポートプラグインのアップグレード'; // ORPHANED
$string['upgradinglocaldb'] = 'ローカルデータベースのアップグレード'; // ORPHANED
$string['upgradingmessageoutputpluggin'] = 'メッセージ出力プラグインのアップグレード'; // ORPHANED
$string['upgradingrpcfunctions'] = 'RPC機能のアップグレード'; // ORPHANED
$string['usagehelp'] = '概要:
\$php cliupgrade.php オプション
オプション
--lang インストールに使用する有効なインストール済み言語パックです。デフォルトは英語 (en) です。
--webaddr Moodleサイトのウェブアドレスです。
--moodledir Moodleウェブフォルダのロケーションです。
--datadir Moodleデータフォルダのロケーションです (ウェブから閲覧できないようにしてください)。
--dbtype データベースタイプです。デフォルトは「mysql」です。
--dbhost データベースホストです。デフォルトは「localhost」です。
--dbname データベース名です。デフォルトは「moodle」です。
--dbuser データベースユーザです。デフォルトは空白です。
--dbpass データベースパスワードです。デフォルトは空白です。
--prefix 上記データベーステーブルのテーブル接頭辞です。デフォルトは「mdl」です。
--verbose 0 出力なし、1 要約の出力 (デフォルト)、2 詳細出力
--interactivelevel 0 インタラクティブなし、1 セミ・インタラクティブ (デフォルト)、2 インタラクティブ
--agreelicense Yes(デフォルト) または No
--confirmrelease Yes(デフォルト) または No
--sitefullname 長いサイト名です。デフォルトは : Moodle Site (サイト名を変更してください!!)
--siteshortname サイト省略名です。デフォルトは: moodle
--sitesummary フロントページの説明です。デフォルトは空白です。
--adminfirstname 管理者の名です。デフォルトは「Admin」です。
--adminlastname 管理者の姓です。デフォルトは「User」です。
--adminusername 管理者のユーザ名です。デフォルトは「admin」です。
--adminpassword 管理者のパスワードです。デフォルトは「admin」です。
--adminemail 管理者のメールアドレスです。デフォルトは「root@localhost」です。
--help このヘルプを出力します。
使用方法:
\$php cliupgrade.php --lang=ja --webaddr=http://www.example.com --moodledir=/var/www/html/moodle --datadir=/var/moodledata --dbtype=mysql --dbhost=localhost --dbname=moodle --dbuser=root --prefix=mdl --agreelicense=yes --confirmrelease=yes --sitefullname=\"Example Moodle Site\" --siteshortname=moodle --sitesummary=siteforme --adminfirstname=Admin --adminlastname=User --adminusername=admin --adminpassword=admin --adminemail=admin@example.com --verbose=1 --interactivelevel=2'; // ORPHANED
$string['versionerror'] = 'バージョンエラーのため中断しました。'; // ORPHANED
$string['welcometext'] = '---Moodleコマンドラインインストーラーへようこそ---'; // ORPHANED
$string['writetoconfigfilefaild'] = 'エラー: config.phpファイルの書き込みに失敗しました。'; // ORPHANED
$string['yourchoice'] = 'あなたの選択 :'; // ORPHANED
$string['databasesettingssub_sqlite3_pdo'] = '<b>タイプ:</b> SQLite 3 (PDO) <b><strong class=\"errormsg\">実験用! (実稼動サイトには使用しないでください。)</strong></b><br />
<b>ホスト:</b> データベースファイルが保存されるディレクトリのパス (フルパス) 例 localhost または 空白 (Moodleデータディレクトリを使用する場合)<br />
<b>データベース名:</b> 例 moodle (任意)<br />
<b>ユーザ名:</b> データベースのユーザ名 (任意)<br />
<b>パスワード:</b> データベースのパスワード (任意)<br />
<b>テーブル接頭辞:</b> すべてのテーブル名に使用する接頭辞 (任意)<br />データベースファイル名は上記ユーザ名、データベース名、パスワードにより決定されます。'; // ORPHANED
$string['sqlite3_pdo'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">実験用! (実稼動サイトには使用しないでください。)</strong></b>'; // ORPHANED
$string['unsafedirname'] = 'エラー: ディレクトリ名に安全でない文字が含まれています。有効な文字は「a-zA-Z0-9_」です。'; // ORPHANED

?>
