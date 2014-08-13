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
 * Strings for component 'auth', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = '利用可能な認証プラグイン';
$string['alternatelogin'] = 'ここにURLを入力した場合、このサイトのログインページとして使用されます。ログインページでは、action属性に<strong>「 {$a} 」</strong>をセットして、 <strong>username</strong>フィールドおよび <strong>password</strong>フィールドをMoodleに渡してください。<br />間違ったURLを設定することで、あなたのサイトから締め出されることになりますので注意してください。<br />デフォルトのログイン画面を使用する場合、空白のままにしてください。';
$string['alternateloginurl'] = '代替ログインURL';
$string['auth_changepasswordhelp'] = 'パスワード変更のヘルプ';
$string['auth_changepasswordhelp_expl'] = 'ユーザが {$a} パスワードを忘れた場合、パスワード喪失ヘルプを表示します。これは<strong>パスワード変更URL</strong>またはMoodle内部のパスワード変更画面と同時、または代わりに表示されます。';
$string['auth_changepasswordurl'] = 'パスワード変更URL';
$string['auth_changepasswordurl_expl'] = '{$a} パスワードを忘れたユーザが使用するURLを指定してください。通常のパスワード変更ページを使用する場合、「No」を選択してください。';
$string['auth_changingemailaddress'] = 'あなたは {$a->oldemail} から {$a->newemail} へのメールアドレス変更をリクエストしました。セキュリティ上の理由から、新しいメールアドレスがあなたのメールアドレスであるか確認するため、私たちはあなた宛にメッセージを送信しています。このメッセージ内のURLにアクセスすることで、あなたのメールアドレスが更新されます。';
$string['auth_common_settings'] = '共通設定';
$string['auth_data_mapping'] = 'データマッピング';
$string['authenticationoptions'] = '認証オプション';
$string['auth_fieldlock'] = '設定値のロック';
$string['auth_fieldlock_expl'] = '<p><b>設定値のロック:</b> このオプションを有効にした場合、Moodleユーザおよび管理者によるフィールドの直接編集を防ぎます。外部認証システムにデータを保持している場合、このオプションを使用してください。</p>';
$string['auth_fieldlocks'] = 'ユーザフィールドのロック';
$string['auth_fieldlocks_help'] = '<p>あなたはユーザデータフィールドをロックすることができます。ユーザレコードを管理者が手動で管理する方法、または「ユーザをアップロードする」機能を使用してユーザレコードをアップロードする方法をとっているサイトに有用です。Moodleが必要とするフィールドをロックする場合、ユーザアカウント作成時にそれらのデータを必ず提供してください。そうでない場合、アカウントを使用できなくなります。</p><p>この問題を避けるため、「空の場合はロックしない」に設定することをお勧めします。</p>';
$string['authinstructions'] = 'ログインページにデフォルトのログインインストラクションを表示したい場合、空白のままにしてください。あなたが特別なログインインストラクションを表示したい場合、ここに入力してください。';
$string['auth_invalidnewemailkey'] = 'エラー: あなたがメールアドレスの変更確認を試みているのでしたら、あなたに送信されたメール内のURLのコピーに失敗しているようです。URLをコピーして、もう一度お試しください。';
$string['auth_multiplehosts'] = '複数のホストまたはアドレスを設定できます (例 host1.com;host2.com;host3.com) または (例 xxx.xxx.xxx.xxx;xxx.xxx.xxx.xxx)';
$string['auth_outofnewemailupdateattempts'] = 'あなたはメールアドレスの変更許容回数を超えました。あなたのメール変更リクエストは、キャンセルされました。';
$string['auth_passwordisexpired'] = 'あなたのパスワード有効期限が切れました。あなたのパスワードを変更しますか?';
$string['auth_passwordwillexpire'] = 'あなたのパスワードの有効期限は、{$a} 日で切れます。あなたのパスワードを変更しますか?';
$string['auth_remove_delete'] = '内部を完全に削除する';
$string['auth_remove_keep'] = '内部に保持する';
$string['auth_remove_suspend'] = '内部を一時停止する';
$string['auth_remove_user'] = '外部ソースからユーザが削除された場合、大量同期時にどのように内部ユーザを処理するか指定してください。外部ソースのユーザが回復された場合、一時停止ユーザのみ自動的に回復されます。';
$string['auth_remove_user_key'] = '削除された外部ユーザ';
$string['auth_sync_script'] = 'Cron同期スクリプト';
$string['auth_updatelocal'] = 'ローカルデータの更新';
$string['auth_updatelocal_expl'] = '<p><b>ローカルデータの更新:</b> この設定を有効にした場合、このフィールドは (外部認証を通して) ログイン毎またはユーザの同期ごとに更新されます。更新されるローカルフィールドは、ロックする必要があります。</p>';
$string['auth_updateremote'] = '外部データの更新';
$string['auth_updateremote_expl'] = '<p><b>外部データの更新:</b> この設定を有効にした場合、ユーザレコードが更新されるときに外部認証が更新されます。編集を許可するにはフィールドのロックを解除する必要があります。</p>';
$string['auth_updateremote_ldap'] = '<p><b>注意:</b> 外部LDAPデータを更新するには、すべてのユーザレコードに書き込み権を持ったバインドユーザに対して、binddnおよびbindpwを設定する必要があります。現在、多値属性を保持することはできません。超過した値は更新時に取り除かれます。</p>';
$string['auth_user_create'] = 'ユーザ作成を有効にする';
$string['auth_user_creation'] = '新しい (匿名) ユーザは、外部認証元のユーザアカウントを作成することができます。また、メールによりアカウント登録が確認されます。このオプションを有効にした場合、モジュール特有のオプションも同時に設定する必要があります。';
$string['auth_usernameexists'] = 'このユーザ名はすでに登録されています。新しいユーザ名を選んでください。';
$string['auto_add_remote_users'] = 'リモートユーザを自動的に追加する';
$string['changepassword'] = 'パスワードURLの変更';
$string['changepasswordhelp'] = 'ここではあなたのユーザがパスワードを忘れた場合、ユーザ名/パスワードを回復または変更するためのロケーションを設定します。これはログインページおよびユーザページにボタンとして提供されます。ここを空白にした場合、ボタンは表示されません。';
$string['chooseauthmethod'] = '認証方法の選択';
$string['chooseauthmethod_help'] = '<p>ここではユーザの認証方法を変更することができます。</p>

<p>この設定は、どの認証方法をサイトに設定しているか、またどの認証方法を使うかに強く依存します。</p>

<p>間違った設定によりユーザはログインすることができず、またはアカウントが完全に削除されてしまうこともあります。あなたが何をしているか理解できる場合のみ、この設定を使用してください。</p>';
$string['createpassword'] = 'パスワードを生成して、ユーザに通知する';
$string['createpasswordifneeded'] = '必要に応じてパスワードを作成する';
$string['emailchangecancel'] = 'メール変更をキャンセルする';
$string['emailchangepending'] = '変更保留中です。あなたのメールアドレス {$a->preference_newemail} に送信されたメッセージ内のリンクにアクセスしてください。';
$string['emailnowexists'] = 'あなたのプロファイルに割り当てようと試みたメールアドレスは、あなたがリクエストした後、他のユーザに割り当てられています。このため、あなたのメールアドレス変更は、キャンセルされました。しかし、あなたは、他のメールアドレスを割り当てることができます。';
$string['emailupdate'] = 'メールアドレス更新';
$string['emailupdatemessage'] = '{$a->fullname} さん

あなたは、{$a->site} のアカウントに関するメールアドレス変更をリクエストしました。この変更を確認するには、あなたのブラウザで以下のURLにアクセスしてください。

{$a->url}';
$string['emailupdatesuccess'] = 'ユーザ {$a->fullname} のメールアドレスは、正常に {$a->email} に変更されました。';
$string['emailupdatetitle'] = '{$a->site} のメール更新確認';
$string['enterthenumbersyouhear'] = 'あなたに聞こえる数字を入力してください';
$string['enterthewordsabove'] = '上記の言葉を入力してください。';
$string['errormaxconsecutiveidentchars'] = 'パスワードには最大 {$a} 文字の連続した同一文字を使用する必要があります。';
$string['errorminpassworddigits'] = 'パスワードには少なくとも半角 {$a} 文字の数字を使用する必要があります。';
$string['errorminpasswordlength'] = 'パスワードには少なくとも半角 {$a} 文字使用する必要があります。';
$string['errorminpasswordlower'] = 'パスワードには少なくとも半角 {$a} 文字の小文字を使用する必要があります。';
$string['errorminpasswordnonalphanum'] = 'パスワードには少なくとも半角 {$a} 文字の非英数字を使用する必要があります。';
$string['errorminpasswordupper'] = 'パスワードには少なくとも半角 {$a} 文字の大文字を使用する必要があります。';
$string['errorpasswordupdate'] = 'パスワード変更中にエラーが発生しました。パスワードは、変更されませんでした。';
$string['event_user_loggedin'] = 'ユーザがログインしました。';
$string['eventuserloggedinas'] = 'ユーザが別のユーザとしてログインしました。';
$string['forcechangepassword'] = 'パスワード変更を強制する';
$string['forcechangepasswordfirst_help'] = '最初にMoodleへログインするときに、ユーザのパスワード変更を強制します。';
$string['forcechangepassword_help'] = '次にMoodleへログインするときに、ユーザのパスワード変更を強制します。';
$string['forgottenpassword'] = 'あなたがここにURLを入力した場合、このサイトの喪失パスワードリカバリページに使用されます。これは完全にMoodleの外でパスワードが処理されるサイトを対象としています。デフォルトのパスワードリカバリを使用する場合、空白のままにしてください。';
$string['forgottenpasswordurl'] = 'パスワード喪失URL';
$string['getanaudiocaptcha'] = 'CAPTCHAオーディオを取得する';
$string['getanimagecaptcha'] = 'CAPTCHAイメージを取得する';
$string['getanothercaptcha'] = '別のCAPTCHAを取得する';
$string['guestloginbutton'] = 'ゲストログインボタン';
$string['incorrectpleasetryagain'] = '正しくありません、もう一度お試しください。';
$string['infilefield'] = 'ファイルのパスワードフィールドを使用する';
$string['informminpassworddigits'] = '少なくとも {$a} 個の数字';
$string['informminpasswordlength'] = '少なくとも {$a} 文字';
$string['informminpasswordlower'] = '少なくとも {$a} 文字の小文字';
$string['informminpasswordnonalphanum'] = '少なくとも {$a} 文字の非英数字';
$string['informminpasswordupper'] = '少なくとも {$a} 文字の大文字';
$string['informpasswordpolicy'] = 'パスワードには、{$a} を入力する必要があります。';
$string['instructions'] = '説明';
$string['internal'] = '内部';
$string['locked'] = 'ロックする';
$string['md5'] = 'MD5暗号化';
$string['nopasswordchange'] = 'パスワードを変更することはできません。';
$string['nopasswordchangeforced'] = 'あなたはパスワードを変更せずに次へ進むことはできません。しかし、パスワードを変更するため利用できるページがありません。あなたのMoodle管理者にご連絡ください。';
$string['noprofileedit'] = 'プロファイルを編集することはできません。';
$string['ntlmsso_attempting'] = 'NTLM経由でシングルサインオン実行中 ...';
$string['ntlmsso_failed'] = '自動ログインに失敗しました、通常のログインページへの移動を試みます ...';
$string['ntlmsso_isdisabled'] = 'NTLM SSOは無効にされています。';
$string['passwordhandling'] = 'パスワードフィールドの取り扱い';
$string['plaintext'] = 'プレインテキスト';
$string['pluginnotenabled'] = '認証プラグイン「 {$a} 」が有効にされていません。';
$string['pluginnotinstalled'] = '認証プラグイン「 {$a} 」がインストールされていません。';
$string['potentialidps'] = 'あなたのアカウントを使用してログインします:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'CAPTCHAはユーザに関して人間であるかコンピュータであるか判断することのできるプログラムです。テキストボックスにテキストを順番にスペースで区切って入力してください。

どのような文字か分からない場合、別のCAPTCHAまたはオーディオCAPTCHAをお試しください。';
$string['selfregistration'] = '自己登録';
$string['selfregistration_help'] = '「Eメールによる自己登録」のような認証プラグインが選択された場合、潜在的なユーザに対して、自分自身での登録およびユーザアカウント作成を許可します。この場合、フォーラム投稿、ブログエントリ等でスパムを発信するスパム発信者に対して、アカウントを作成させてしまうことになります。このリスクを避けるには自己登録を無効にするか、「許可されるメールアドレスのドメイン」設定にて、使用できるメールアドレスを制限してください。';
$string['sha1'] = 'SHA-1暗号化';
$string['showguestlogin'] = 'あなたはログインページのゲストログインボタンを表示または非表示にできます。';
$string['stdchangepassword'] = '標準パスワード変更ページを使用する';
$string['stdchangepassword_expl'] = '外部認証システムがMoodleにパスワードの変更を許可する場合、この設定を「Yes」にしてください。この設定は、「パスワード変更URL」をオーバーライドします。';
$string['stdchangepassword_explldap'] = '注意: LDAPサーバがリモートの場合、SSL暗号化トンネル (ldaps://) の使用をお勧めします。';
$string['suspended'] = '利用停止アカウント';
$string['suspended_help'] = '利用停止にされたユーザアカウントではログインすること、ウェブサービスを利用することができません。また、すべての出力メッセージは廃棄されます。';
$string['testsettings'] = 'テスト設定';
$string['testsettingsheading'] = 'テスト認証設定 - {$a}';
$string['unlocked'] = 'ロックしない';
$string['unlockedifempty'] = '空の場合はロックしない';
$string['update_never'] = 'しない';
$string['update_oncreate'] = '作成時';
$string['update_onlogin'] = '毎回ログイン時';
$string['update_onupdate'] = '更新時';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() は選択したユーザタイプをサポートしていません: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() は選択したユーザタイプをまだサポートしていません。';
