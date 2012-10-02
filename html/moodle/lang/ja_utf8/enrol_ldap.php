<?PHP // $Id$ 
      // enrol_ldap.php - created with Moodle 2.0 dev (Build: 20100202) (2010020100)


$string['description'] = '<p>あなたのユーザ登録をコントロールするために、LDAPサーバを使用することができます。LDAPの使用はあなたのLDAPツリーがコースにマップするグループを含んでいること、それぞれのグループ/コース内に学生をマップするためのメンバーシップエントリを持つことを前提とします。</p>
<p>コースはLDAP内でグループとして定義され、ユニークなユーザ識別を含む、複数のメンバーシップフィールド (<em>member</em> または <em>memberUid</em>) を持っていることを前提とします。</p>
<p>LDAPを使用してユーザを登録するには、ユーザが有効なIDナンバーフィールドを<strong>持つ必要</strong>があります。LDAPグループはユーザがコースに登録できるよう、メンバーフィールドの中にIDナンバーを持つ必要があります。あなたがすでにLDAP認証を使用している場合、通常これらは正常に動作します。</p>
<p>ユーザ登録情報はユーザのログイン時に更新されます。登録情報の同期をとるため、スクリプトを実行させることもできます。<em>enrol/ldap/enrol_ldap_sync.php</em>をご覧ください。</p>
<p>このプラグインでは新しいグループがLDAP内に作成された場合、自動的に新しいコースを作成することも可能です。</p>';
$string['enrol_ldap_autocreate'] = 'Moodle内に存在しないコースにユーザが登録された場合、自動的にコースを作成することができます。';
$string['enrol_ldap_autocreation_settings'] = 'コース自動作成設定';
$string['enrol_ldap_bind_dn'] = 'あなたがバインドユーザをユーザ検索に使用したい場合、ここで指定してください。「cn=ldapuser,ou=public,o=org」のような設定となります。';
$string['enrol_ldap_bind_pw'] = 'ユーザバインドのパスワードです。';
$string['enrol_ldap_category'] = '自動的に作成されるコースのカテゴリです。';
$string['enrol_ldap_contexts'] = 'LDAPコンテクスト';
$string['enrol_ldap_course_fullname'] = '任意:「名称」を取得するLDAPフィールドです。';
$string['enrol_ldap_course_idnumber'] = 'LDAPのユニークなIDにマップしてください。通常、<em>cn</em>または<em>uid</em>です。コース自動作成を使用する場合、設定値のロックをお勧めします。';
$string['enrol_ldap_course_settings'] = 'コース登録設定';
$string['enrol_ldap_course_shortname'] = '任意:「省略名」を取得するLDAPフィールドです。';
$string['enrol_ldap_course_summary'] = '任意:「要約」を取得するLDAPフィールドです。';
$string['enrol_ldap_editlock'] = '設定値をロックする';
$string['enrol_ldap_general_options'] = '一般オプション';
$string['enrol_ldap_host_url'] = '「ldap://ldap.myorg.com/」または「ldaps://ldap.myorg.com/」のようにLDAPホストをURIの形式で指定してください。';
$string['enrol_ldap_memberattribute'] = 'LDAPメンバー属性';
$string['enrol_ldap_objectclass'] = 'コース検索に使用するobjectClassです。通常、「posixGroup」です。';
$string['enrol_ldap_roles'] = 'ロールマッピング';
$string['enrol_ldap_search_sub'] = 'サブコンテクストよりグループメンバーシップを検索する。';
$string['enrol_ldap_server_settings'] = 'LDAPサーバ設定';
$string['enrol_ldap_student_contexts'] = '学生登録のグループが配置されているコンテクスト一覧です。異なるコンテクストは「;」で区切ってください。例: 「ou=courses,o=org; ou=others,o=org」';
$string['enrol_ldap_student_memberattribute'] = 'ユーザがグループに属して (登録されて) いる場合のメンバー属性です。通常、「member」または「memberUid」です。';
$string['enrol_ldap_student_settings'] = '学生登録設定';
$string['enrol_ldap_teacher_contexts'] = '教師登録のグループが配置されているコンテクスト一覧です。異なるコンテクストは「;」で区切ってください。例: 「ou=courses,o=org; ou=others,o=org」';
$string['enrol_ldap_teacher_memberattribute'] = 'ユーザがグループに属している (登録されている) 場合のメンバー属性です。通常、「member」または「memberUid」です。';
$string['enrol_ldap_teacher_settings'] = '教師登録設定';
$string['enrol_ldap_template'] = '任意: 自動的に作成されるコースではテンプレートコースより設定をコピーすることができます。';
$string['enrol_ldap_updatelocal'] = 'ローカルデータを更新する';
$string['enrol_ldap_version'] = 'あなたのサーバが使用しているLDAPプロトコルのバージョンです。';
$string['enrolname'] = 'LDAP';

?>
