<?PHP // $Id: auth_cas.php,v 1.6 2010/07/20 19:44:47 mits Exp $ 
      // auth_cas.php - created with Moodle 2.0 dev (Build: 20091219) (2009112400)


$string['CASform'] = '認証選択';
$string['accesCAS'] = 'CASユーザ';
$string['accesNOCAS'] = '他のユーザ';
$string['auth_cas_auth_user_create'] = '外部にユーザを作成する';
$string['auth_cas_baseuri'] = 'サーバのURI (ベースURIが無い場合は空白)<br />CASサーバが host.domaine.fr/CAS/ に応答する場合、<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'ベースURI';
$string['auth_cas_broken_password'] = 'あなたのパスワードを変更せずに進むことはできませんが、利用できるパスワード変更ページがありません。あなたのMoodle管理者にご連絡ください。';
$string['auth_cas_cantconnect'] = 'CASモジュールのLDAPがサーバに接続できません: $a';
$string['auth_cas_casversion'] = 'バージョン';
$string['auth_cas_changepasswordurl'] = 'パスワード変更URI';
$string['auth_cas_create_user'] = 'MoodleデータベースにCAS認証済みユーザを追加したい場合、「Yes」を選択してください。「No」を選択した場合、Moodleデータベースに登録されているユーザのみログインできます。';
$string['auth_cas_create_user_key'] = 'ユーザを作成する';
$string['auth_cas_enabled'] = 'CAS認証を使用したい場合、「Yes」を選択してください。';
$string['auth_cas_hostname'] = 'CASサーバのホスト名<br />例: host.domaine.fr';
$string['auth_cas_hostname_key'] = 'ホスト名';
$string['auth_cas_invalidcaslogin'] = '申し訳ございません、ログインに失敗しました - あなたは認証されませんでした。';
$string['auth_cas_language'] = '言語の選択';
$string['auth_cas_language_key'] = '言語';
$string['auth_cas_logincas'] = 'セキュアコネクション・アクセス';
$string['auth_cas_logoutcas'] = 'Moodleからのログアウト時、CASからログアウトしたい場合、「Yes」を選択してください。';
$string['auth_cas_logoutcas_key'] = 'CASからログアウトする';
$string['auth_cas_multiauth'] = 'マルチ認証 (CAS + 他の認証) を使用したい場合、「Yes」を選択してください。';
$string['auth_cas_multiauth_key'] = 'マルチ認証';
$string['auth_cas_port'] = 'CASサーバのポート';
$string['auth_cas_port_key'] = 'ポート';
$string['auth_cas_proxycas'] = 'CASをプロクシモードで使用したい場合、「Yes」を選択してください。';
$string['auth_cas_proxycas_key'] = 'プロクシモード';
$string['auth_cas_server_settings'] = 'CASサーバ設定';
$string['auth_cas_text'] = 'セキュアコネクション';
$string['auth_cas_use_cas'] = 'CASを使用する';
$string['auth_cas_version'] = 'CASのバージョン';
$string['auth_casdescription'] = 'この認証方法では単一ログイン環境 (Single Sign On environment: SSO) にて、CASサーバ (Central Authentication Service) をユーザ認証に使用します。シンプルLDAP認証を使用することもできます。ユーザ名とパスワードがCASで認証された場合、Moodleは新しいユーザエントリをデータベースに作成します。また、必要であれば、LDAPよりユーザ属性を取得します。次回からはユーザ名およびパスワードのみ確認されます。';
$string['auth_casnotinstalled'] = 'CAS認証を使用できません。PHP LDAPモジュールがインストールされていません。';
$string['auth_castitle'] = 'CASサーバ (SSO)';

?>
