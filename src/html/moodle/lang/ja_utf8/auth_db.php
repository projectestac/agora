<?PHP // $Id: auth_db.php,v 1.4 2010/07/20 19:44:47 mits Exp $ 
      // auth_db.php - created with Moodle 2.0 dev (Build: 20091219) (2009112400)


$string['auth_dbcantconnect'] = '指定された認証データベースに接続できませんでした ...';
$string['auth_dbchangepasswordurl_key'] = 'パスワード変更URI';
$string['auth_dbdebugauthdb'] = 'ADOdbデバッグ';
$string['auth_dbdebugauthdbhelp'] = '外部データベースへのADOdbデバッグ接続 - ログイン時に空白ページが表示される場合、使用してください。実稼動サイトには適していません。';
$string['auth_dbdeleteuser'] = 'ユーザ $a[0] id $a[1] を削除しました。';
$string['auth_dbdeleteusererror'] = 'ユーザ $a の削除中にエラーが発生しました。';
$string['auth_dbdescription'] = 'ここではユーザ名およびパスワードが有効であるか確認するため、外部データベースを使用します。新しいアカウントを作成する場合、他のフィールドの情報がMoodleに複製されます。';
$string['auth_dbextencoding'] = '外部データベースエンコーディング';
$string['auth_dbextencodinghelp'] = '外部データベースで使用されるエンコーディング';
$string['auth_dbextrafields'] = 'これらのフィールドは任意項目です。あなたは<b>外部データベースフィールド</b>より、事前に入力されたMoodleユーザフィールドを選択することもできます。<p>空白の場合、デフォルト値が使用されます。</p><p>どちらの場合でも、ユーザはログイン後、すべてのフィールドを編集することができます。</p>';
$string['auth_dbfieldpass'] = 'パスワードを含んだフィールド名';
$string['auth_dbfieldpass_key'] = 'パスワードフィールド';
$string['auth_dbfielduser'] = 'ユーザ名を含んだフィールド名';
$string['auth_dbfielduser_key'] = 'ユーザ名フィールド';
$string['auth_dbhost'] = 'データベースサーバが稼動しているコンピュータ';
$string['auth_dbhost_key'] = 'ホスト';
$string['auth_dbinsertuser'] = '登録ユーザ $a[0]  ID $a[1]';
$string['auth_dbinsertusererror'] = 'ユーザ登録エラー $a';
$string['auth_dbname'] = 'データベース名';
$string['auth_dbname_key'] = 'データベース名';
$string['auth_dbpass'] = '上記ユーザ名に合致するパスワード';
$string['auth_dbpass_key'] = 'パスワード';
$string['auth_dbpasstype'] = '<p>パスワードフィールドで使用するフォーマットを指定してください。MD5暗号化はPostNukeのような他の一般的なウェブアプリケーションへの接続に有用です。</p><p>外部データベースでユーザ名およびメールアドレスを管理したい場合、「内部」を使用してください。パスワードに関して、Moodleが管理します。「内部」を使用する場合、外部データベースのメールアドレスフィールドを提供して、定期的に admin/cron.php および auth/db/auth_db_sync_users.php を実行してください。Moodleが新しいユーザに対して、仮パスワード含んだメールを送信します。</p>';
$string['auth_dbpasstype_key'] = 'パスワードフォーマット';
$string['auth_dbreviveduser'] = '回復ユーザ $a[0] id $a[1]';
$string['auth_dbrevivedusererror'] = 'ユーザ $a の回復中にエラーが発生しました。';
$string['auth_dbsetupsql'] = 'SQLセットアップコマンド';
$string['auth_dbsetupsqlhelp'] = '特別データベースセットアップ用のSQLコマンドです。多くの場合、コミュニケーションエンコーディングに使用されます - 例 MySQLおよびPostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = '一時停止ユーザ $a[0] id $a[1]';
$string['auth_dbsuspendusererror'] = 'ユーザ $a の一時停止中にエラーが発生しました。';
$string['auth_dbsybasequoting'] = 'Sybaseクオートを使用する';
$string['auth_dbsybasequotinghelp'] = 'Sybaseスタイルのシングルクオートエスケープです - Oracle、MS SQLおよび他のデータベースに必要です。MySQLには使用しないでください!';
$string['auth_dbtable'] = 'データベースのテーブル名';
$string['auth_dbtable_key'] = 'テーブル';
$string['auth_dbtitle'] = '外部データベース';
$string['auth_dbtype'] = 'データベースタイプ (詳細は<a href=../lib/adodb/readme.htm#drivers>ADOdb documentation</a>をご覧ください)';
$string['auth_dbtype_key'] = 'データベース';
$string['auth_dbupdatinguser'] = '更新ユーザ $a[0] id $a[1]';
$string['auth_dbuser'] = 'データベースへのリードアクセス用のユーザ名';
$string['auth_dbuser_key'] = 'データベースユーザ';
$string['auth_dbusernotexist'] = '登録されていないユーザを更新できません: $a';
$string['auth_dbuserstoadd'] = '追加するユーザエントリ: $a';
$string['auth_dbuserstoremove'] = '削除するユーザエントリ: $a';

?>
