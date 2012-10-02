<?PHP // $Id: auth_email.php,v 1.4 2010/07/20 19:44:47 mits Exp $ 
      // auth_email.php - created with Moodle 2.0 dev (Build: 20091219) (2009112400)


$string['auth_changingemailaddress'] = 'あなたは $a->oldemail から $a->newemail へのメールアドレス変更をリクエストしました。セキュリティ上の理由から、新しいメールアドレスがあなたのメールアドレスか確認するため、私たちはあなたにメッセージを送信しています。このメッセージ内のURIにアクセスすることで、あなたのメールアドレスがすぐに更新されます。';
$string['auth_emailchangecancel'] = 'メール変更をキャンセルする';
$string['auth_emailchangepending'] = '変更保留中です。あなたのメールアドレス $a->preference_newemail に送信されたメッセージ内のリンクにアクセスしてください。';
$string['auth_emaildescription'] = 'メールによるアカウント登録確認はデフォルトの認証方法です。ユーザが新しいユーザ名およびパスワードを選択してサインアップした場合、アカウント確定用メールがユーザのメールアドレス宛に送信されます。このメールにはユーザがアカウントの登録を確認するためのリンクが記入されています。アカウント確定後のログインではMoodleデータベースに保存されているユーザ名およびパスワードのみ確認します。';
$string['auth_emailnoemail'] = 'あなたへのメール送信を試みましたが、失敗しました!';
$string['auth_emailnoinsert'] = 'あなたのレコードをデータベースに追加できませんでした!';
$string['auth_emailnowexists'] = 'あなたのプロファイルに割り当てようと試みたメールアドレスはあなたがリクエストした後、他のユーザに割り当てられています。このため、あなたのメールアドレス変更はキャンセルされました。しかし、あなたは他のメールアドレスを割り当てることができます。';
$string['auth_emailrecaptcha'] = 'Eメールによる自己登録ユーザのため、サインアップページにビジュアル/オーディオ確認フォームエレメントを追加します。これはあなたのサイトをスパム発信者から守り、価値ある活動に貢献します。詳細はhttp://recaptcha.net/learnmore.html をご覧ください。<br />PHP cURL拡張モジュールが必須です。';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHAエレメントを有効にする';
$string['auth_emailsettings'] = '設定';
$string['auth_emailtitle'] = 'Eメールによる自己登録';
$string['auth_emailupdate'] = 'メールアドレス更新';
$string['auth_emailupdatemessage'] = '$a->fullname さん

あなたは $a->site のアカウントに関するメールアドレス変更をリクエストしました。この変更を確認するには、あなたのブラウザで以下のURIにアクセスしてください。

$a->url';
$string['auth_emailupdatesuccess'] = 'ユーザ $a->fullname のメールアドレスは正常に $a->email に変更されました。';
$string['auth_emailupdatetitle'] = '$a->site のメール更新確認';
$string['auth_invalidnewemailkey'] = 'エラー: あなたがメールアドレスの変更確認を試みているのでしたら、あなたに送信されたメール内のURIのコピーに失敗しているようです。URIをコピーして、もう一度お試しください。';
$string['auth_outofnewemailupdateattempts'] = 'あなたはメールアドレスの変更許容回数を超えました。あなたのメール変更リクエストはキャンセルされました。';

?>
