<?PHP // $Id$ 
      // enrol_database.php - created with Moodle 2.0 dev (Build: 20100126) (2010012500)


$string['autocreate'] = 'まだMoodle内に存在しないコースへのユーザ登録がある場合、コースを自動的に作成することができます。';
$string['autocreation_settings'] = '自動作成設定';
$string['category'] = '自動作成されるコースのためのカテゴリです。';
$string['course_fullname'] = '長いコース名が保存されるフィールド名です。';
$string['course_id'] = 'コードIDが保存されるフィールド名です。このフィールドの値はMoodleコーステーブル内の「enrol_db_l_coursefield」フィールドと一致させるため使用されます。';
$string['course_shortname'] = 'コース省略名が保存されるフィールド名です。';
$string['course_table'] = 'コース詳細 (コース省略名、長いコース名、ID等) を探すためのテーブル名です。';
$string['dbhost'] = 'サーバ名またはIPアドレス';
$string['dbname'] = 'データベース名';
$string['dbpass'] = 'サーバパスワード';
$string['dbtable'] = 'データベーステーブル';
$string['dbtype'] = 'データベースタイプ';
$string['dbuser'] = 'サーバユーザ';
$string['defaultcourseroleid'] = '他のロールが指定されない場合、デフォルトで割り当てられるロールです。';
$string['description'] = 'ユーザ登録に (ほとんどの種類の) 外部データベースを使用することができます。外部データベースにはコースIDおよびユーザIDを含んでいる必要があります。これらはローカルなコーステーブルおよびユーザテーブルのフィールドと比較されます。';
$string['disableunenrol'] = 'この設定を「Yes」にした場合、データベースのコンテンツにかかわらず、外部データベースプラグインで以前に登録されたユーザは同じプラグインで登録解除されることはありません。';
$string['enrol_database_autocreation_settings'] = '新しいコースの自動作成';
$string['enrolname'] = '外部データベース';
$string['general_options'] = '一般オプション';
$string['host'] = 'データベースサーバホスト名です。';
$string['ignorehiddencourse'] = 'この設定を「Yes」にした場合、学生のコース登録が無効にされているコースにユーザは受講登録されません。';
$string['local_fields_mapping'] = 'Moodle (ローカル) データベースフィールド';
$string['localcoursefield'] = 'リモートデータベースのエントリ (例 idnumber) と合致させるため使用するコーステーブルのフィールド名です。';
$string['localrolefield'] = 'リモートデータベースのエントリ (例 shortname) と合致させるため使用するロールテーブルのフィールド名です。';
$string['localuserfield'] = 'リモートデータベースのエントリ (例 idnumber) と合致させるため使用するユーザテーブルのフィールド名です。';
$string['name'] = '使用するデータベースです。';
$string['pass'] = 'サーバにアクセスするためのパスワードです。';
$string['remote_fields_mapping'] = 'ユーザ登録データベースフィールドです。';
$string['remotecoursefield'] = 'コーステーブルのエントリに合致させるリモートテーブルのフィールド名です。';
$string['remoterolefield'] = 'ロールテーブルのエントリに合致させるリモートテーブルのフィールド名です。';
$string['remoteuserfield'] = 'ユーザテーブルのエントリに合致させるリモートテーブルのフィールド名です。';
$string['server_settings'] = 'サーバ設定';
$string['student_coursefield'] = 'コースIDを探すための学生登録テーブル内のフィールド名です。';
$string['student_l_userfield'] = 'ユーザを学生のリモートレコードと一致させるための、ローカルユーザテーブルのフィールド名です (例 idnumber)。';
$string['student_r_userfield'] = 'ユーザIDを探すためのリモート学生登録テーブル内のフィールド名です。';
$string['student_table'] = '学生の登録データが保存されるテーブル名です。';
$string['teacher_coursefield'] = 'コースIDを探すための教師登録テーブル内のフィールド名です。';
$string['teacher_l_userfield'] = 'ユーザを教師のリモートレコードと一致させるための、ローカルユーザテーブルのフィールド名です (例 idnumber)。';
$string['teacher_r_userfield'] = 'ユーザIDを探すためのリモート教師登録テーブル内のフィールド名です。';
$string['teacher_table'] = '教師登録データが保存されるテーブル名です。';
$string['template'] = '任意: 自動作成コースはテンプレートコースから設定をコピーすることができます。テンプレートコースの省略名を入力してください。';
$string['type'] = 'データベースサーバタイプです。';
$string['user'] = 'サーバにアクセスするためのユーザ名です。';
$string['local_coursefield'] = 'リモートデータベースのエントリとマッチングさせるための、コーステーブルのフィールド名です (例 idnumber)。'; // ORPHANED

?>
