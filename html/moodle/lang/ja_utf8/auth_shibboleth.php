<?PHP // $Id: auth_shibboleth.php,v 1.5 2010/08/09 19:35:27 mits Exp $ 
      // auth_shibboleth.php - created with Moodle 2.0 dev (Build: 20091227) (2009122500)


$string['auth_shib_auth_method'] = '認証メソッド名';
$string['auth_shib_auth_method_description'] = 'Shibboleth認証メソッドに関して、あなたのユーザに知られている名称を入力してください。あなたのシボレス連盟の名称を使用することもできます 例) <tt>SWITCHaai Login</tt>または<tt>InCommon Login</tt>または同様の名称。';
$string['auth_shib_changepasswordurl'] = 'パスワード変更URI';
$string['auth_shib_convert_data'] = 'データ修正API';
$string['auth_shib_convert_data_description'] = 'あなたがShibbolethから提供されるデータを修正したい場合、このAPIを使用することができます。詳細は<a href=\"../auth/shibboleth/README.txt\">README</a>をご覧ください。';
$string['auth_shib_convert_data_warning'] = 'ファイルが存在しないか、ウェブサーバプロセスで読み取れません!';
$string['auth_shib_idp_list'] = 'アイデンティティプロバイダ';
$string['auth_shib_idp_list_description'] = 'ログインページでユーザが選択できるよう、アイデンティティプロバイダのエンティティIDリストを入力してください。<br />それぞれの行ではアイデンティティプロバイダのエンティティIDにカンマ区切りのタプル (tuple) を追加してください (詳細はShibbolethメタデータファイルをご覧ください)。アイデンティティプロバイダ名がドロップダウンリストに表示されます。<br />あなたのMoodleが複数連盟設定の一部にある場合、任意の第3パラメータとして、Shibbolethセッションイニシエータのロケーションを追加することができます。';
$string['auth_shib_instructions'] = 'あなたの機関がShibbolethをサポートしている場合、Shibboleth経由のアクセスには<a href=\"$a\">Shibbolethログイン</a>を使用してください。 <br />Shibbolethをサポートしていない場合、ここに表示される通常ログインを使用してください。';
$string['auth_shib_instructions_help'] = 'Shibbolethに関して、あなたのユーザに提示する説明文です。 これはログインページの説明セクションに表示されます。Shibbolethユーザが簡単にログインできるよう、「<b>$a</b>」 のようなリンクを入れてください。';
$string['auth_shib_integrated_wayf'] = 'Moodle WAYFサービス';
$string['auth_shib_integrated_wayf_description'] = 'チェックした場合、Shibbolethで設定されたWAYFサービスを使用するのではなく、Moodleは独自のWAYFサービスを使用します。この代替ログインページのため、Moodleはユーザがアイデンティティプロバイダを選択できるドロップダウンリストを表示します。';
$string['auth_shib_logout_return_url'] = '代替ログアウト戻りURI';
$string['auth_shib_logout_return_url_description'] = 'ログアウト後、ShibbolethユーザがリダイレクトされるURIを入力してください。<br />空にした場合、ユーザはMoodleがリダイレクトする場所にリダイレクトされます。';
$string['auth_shib_logout_url'] = 'ShibbolethサービスプロバイダのログアウトハンドラURI';
$string['auth_shib_logout_url_description'] = 'ShibbolethサービスプロバイダのログアウトハンドラのURIを入力してください。一般的に、<tt>/Shibboleth.sso/Logout</tt>のようになります。';
$string['auth_shib_no_organizations_warning'] = 'あなたが統合WAYFサービスを利用したい場合、カンマで区切ったアイデンティティプロバイダのエンティティID、名称およびセッションイニシエータのリストを入力してください。';
$string['auth_shib_only'] = 'Shibbolethのみ';
$string['auth_shib_only_description'] = 'Shibboleth認証を強制する場合、このオプションをチェックしてください。';
$string['auth_shib_username_description'] = 'Moodleユーザ名として使用されるShibbolethウェブサーバ環境のユーザ名';
$string['auth_shibboleth_contact_administrator'] = 'あなたが特定の組織と関係せず、このサーバのコースにアクセスする必要がある場合、Moodle管理者にご連絡ください:';
$string['auth_shibboleth_errormsg'] = 'あなたがメンバーになっている組織を選択してください!';
$string['auth_shibboleth_login'] = 'Shibbolethログイン';
$string['auth_shibboleth_login_long'] = 'Shibboleth経由でMoodleにログインする';
$string['auth_shibboleth_manual_login'] = '手動ログイン';
$string['auth_shibboleth_select_member'] = '私は ...';
$string['auth_shibboleth_select_organization'] = 'Shibboleth経由の認証のため、あなたの組織をドロップダウンリストから選択してください。';
$string['auth_shibbolethdescription'] = 'この方法を使用することで、<a href=\"http://shibboleth.internet2.edu/\">Shibboleth</a>を使用して、ユーザが作成および認証されます。<br />あなたが使用しているMoodleにShibbolethを設定するには、<a href=\"../auth/shibboleth/README.txt\">README</a> をご覧ください。';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'あなたはShibbolethによりユーザ認証したようですが、Moodleはユーザ属性を受信していません。Moodleが稼動しているサービスプロバイダに対して必要な属性 ($a) をアイデンティティプロバイダが発行しているか確認、またはこのサーバの管理者に連絡してください。';
$string['shib_not_all_attributes_error'] = 'あなたの場合、存在していないShibboleth属性をMoodleが必要としているようです。属性は次のとおりです: $a<br />このサーバの管理者またはアイデンティティプロバイダにご連絡ください。';
$string['shib_not_set_up_error'] = 'Shibboleth環境変数がこのページに存在していないため、Shibboleth認証が正しく設定されていないようです。Shibboleth認証の設定に関するさらなる情報は<a href=\"README.txt\">README</a>を参照、またはこのMoodleをインストールした管理者に連絡してください。';

?>
