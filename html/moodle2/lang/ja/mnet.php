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
 * Strings for component 'mnet', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'あなたのサーバ情報';
$string['accesslevel'] = 'アクセスレベル';
$string['addhost'] = 'ホストを追加する';
$string['addnewhost'] = '新しいホストを追加する';
$string['addtoacl'] = 'アクセスコントロールに追加する';
$string['allhosts'] = 'すべてのホスト';
$string['allhosts_no_options'] = '複数のホストを閲覧する場合、利用可能なオプションはありません。';
$string['allow'] = '許可';
$string['applicationtype'] = 'アプリケーションタイプ';
$string['authfail_nosessionexists'] = '認証失敗: mnetセッションがありません。';
$string['authfail_sessiontimedout'] = '認証失敗: mnetセッションがタイムアウトしました。';
$string['authfail_usermismatch'] = '認証失敗: ユーザが合致しません。';
$string['authmnetdisabled'] = 'MNet認証プラグインが<strong>無効</strong>にされています。';
$string['badcert'] = 'これは有効な証明書ではありません。';
$string['certdetails'] = '証明書の詳細';
$string['configmnet'] = 'Moodleネットワーキングでは、このサーバと他のサーバまたはサービスとの通信を許可します。';
$string['couldnotgetcert'] = '{$a} で証明書が見つかりませんでした。<br />ホストが停止しているか、正しく設定されていません。';
$string['couldnotmatchcert'] = '現在ウェブサーバより公開されている証明書と合致しません。';
$string['courses'] = 'コース';
$string['courseson'] = 'コースが次のホストにあります:';
$string['currentkey'] = '現在の公開鍵';
$string['current_transport'] = '現在のトランスポート';
$string['databaseerror'] = '詳細をデータベースに書き込めませんでした。';
$string['deleteaserver'] = 'サーバの削除';
$string['deletedhostinfo'] = 'このホストは削除されました。削除を取り消したい場合、削除ステータスを「No」に戻してください。';
$string['deletedhosts'] = '削除されたホスト: {$a}';
$string['deletehost'] = 'ホストを削除する';
$string['deletekeycheck'] = '本当にこのキーを削除してもよろしいですか?';
$string['deleteoutoftime'] = 'あなたがこのキーを削除できる60秒間の期限が切れました。もう一度お試しください。';
$string['deleteuserrecord'] = 'SSO ACL: {$a->host} からのユーザレコード {$a->user} を削除します。';
$string['deletewrongkeyvalue'] = 'エラーが発生しました。あなたがサーバのSSLキーを削除しようと試みているのでなければ、悪意のある攻撃を受けている可能性があります。SSLキーの処理は実行されませんでした。';
$string['deny'] = '拒否';
$string['description'] = '説明';
$string['duplicate_usernames'] = 'ユーザテーブルのカラム「mnethostid」および「username」の作成に失敗しました。<br />これは、<a href="{$a}" target="_blank">ユーザテーブルのユーザ名が重複している</a>場合に発生します。<br />それでも、あなたのアップグレードは正常に完了しました。上記リンクをクリックすると、新しいウィンドウにこの問題の解決に関するインストラクションが表示されます。アップグレード終了後、問題を解決することができます。<br />';
$string['enabled_for_all'] = '(このサービスは、すべてのホストで有効にされています。)';
$string['enterausername'] = 'ユーザ名またはカンマで区切ったユーザ名のリストを入力してください。';
$string['error7020'] = '通常、このエラーはリモートサイトが正しくないwwwrootレコードを作成した場合に発生します。例えば、http://www.yoursite.comの代わりに http://yoursite.comを使用した場合です。あなたのwwwroot (config.phpで設定) をリモートサイトの管理者に伝えて、あなたのサイトに関するレコードの変更を依頼してください。';
$string['error7022'] = 'あなたがリモートサイトに送信したメッセージは適切に暗号化されましたが署名されていません。これは非常に稀なケースです。このエラーが発生した場合、バグを記録 (問題になっているMoodleのバージョンに関する可能な限り詳細な情報等) することをお勧めします。';
$string['error7023'] = 'リモートサイトがあなたのサイトに関するレコードのすべてのキーを使用して、あなたのメッセージの複合化を試みました。複合化は失敗しました。リモートサイトのキーを手動で再作成することにより、この問題を修正することができます。この問題は、あなたがリモートサイトと数ヶ月間コミュニケーションを取っていない場合以外、発生することはありません。';
$string['error7024'] = 'あなたは暗号化されていないメッセージをリモートサイトに送信しましたが、リモートサイトはあなたのサイトからの暗号化されていないコミュニケーションを受け入れません。これは非常に稀なケースです。このエラーが発生した場合、バグを記録 (問題になっているMoodleのバージョンに関する可能な限り詳細な情報等) することをお勧めします。';
$string['error7026'] = 'あなたのメッセージが署名されたキーは、リモートホストがあなたのサーバのために保持しているキーとは異なります。さらにリモートホストがあなたの現在のキーの取得を試みましたが失敗しました。リモートホストのキーを手動で再作成して、もう一度お試しください。';
$string['error709'] = 'リモートサイトが、あなたのSSLキー取得に失敗しました。';
$string['expired'] = 'この公開鍵の有効期限:';
$string['expires'] = '有効期限';
$string['expireyourkey'] = 'この公開鍵を削除する';
$string['expireyourkeyexplain'] = 'Moodleは (デフォルトで) 28日ごとに自動的に公開鍵をローテートしますが、あなたはこの公開鍵をいつでも「手動で」失効させることができます。これは、あなたがこのキーを信用できなくなった場合のみ有用です。公開鍵の交換は即座に自動実行されます。<br />この公開鍵を削除することで、あなたが手動でそれぞれのMoodle管理者に連絡して新しいキーを提供するまで、他のシステムと通信できなくなります。';
$string['exportfields'] = 'エクスポートするフィールド';
$string['failedaclwrite'] = 'ユーザ「 {$a} 」に関するMnetアクセスコントロールリストの書き込みに失敗しました。';
$string['findlogin'] = 'ログインを探す';
$string['forbidden-function'] = 'この機能はRPCに対して有効にされていません。';
$string['forbidden-transport'] = 'あなたが使用を試みているトランスポートメソッドは、許可されていません。';
$string['forcesavechanges'] = '変更を強制保存する';
$string['helpnetworksettings'] = 'Mnetコミュニケーションを設定します。';
$string['hidelocal'] = 'ローカルユーザを隠す';
$string['hideremote'] = 'リモートユーザを隠す';
$string['host'] = 'ホスト';
$string['hostcoursenotfound'] = 'ホストまたはコースが見つかりませんでした。';
$string['hostdeleted'] = 'ホストが削除されました。';
$string['hostexists'] = 'このホスト名のレコードはすでに登録されています (恐らく削除済み)。レコードを編集するには、<a href="{$a}">ここをクリック</a>してください。';
$string['hostlist'] = 'ネットワークホスト一覧';
$string['hostname'] = 'ホスト名';
$string['hostnamehelp'] = 'リモートホストの省略されていないドメイン名、例 www.example.com';
$string['hostnotconfiguredforsso'] = 'このサーバにはリモートログインが設定されていません。';
$string['hostsettings'] = 'ホスト設定';
$string['http_self_signed_help'] = 'リモートホストにある自己署名DIY SSL証明書を使用したコネクションを許可します。';
$string['https_self_signed_help'] = 'リモートホストにあるPHPの自己署名DIY SSL証明書を使用したhttp経由のコネクションを許可する。';
$string['https_verified_help'] = 'リモートホストにある認証済みSSL証明書を使用したコネクションを許可します。';
$string['http_verified_help'] = 'リモートホストにあるPHPの認証済みSSL証明書を使用した  (https経由ではなく) http経由のコネクションを許可します。';
$string['id'] = 'ID';
$string['idhelp'] = 'この値は自動的に割り当てられました。変更することはできません。';
$string['importfields'] = 'インポートするフィールド';
$string['inspect'] = '調査';
$string['installnosuchfunction'] = 'コーディングエラー! ファイル ({$a->file}) からmnet xmlrpc関数 ({$a->method}) のインストールを試みましたが、見つけることができませんでした!';
$string['installnosuchmethod'] = 'コーディングエラー! クラス ({$a->class}) 内mnet xmlrpcメソッド ({$a->method}) のインストールを試みましたが、見つけることができませんでした!';
$string['installreflectionclasserror'] = 'コーディングエラー! クラス「 {$a->class} 」内メソッド「 {$a->method} 」 のMNet内部調査に失敗しました。オリジナルエラーメッセージは次のとおりです: {$a->error}';
$string['installreflectionfunctionerror'] = 'コーディングエラー! クラス「 {$a->class} 」内関数「 {$a->method} 」 のMNet内部調査に失敗しました。オリジナルエラーメッセージは次のとおりです: {$a->error}';
$string['invalidaccessparam'] = '無効なアクセスパラメータです。';
$string['invalidactionparam'] = '無効なアクションパラメータです。';
$string['invalidhost'] = '有効なホスト識別子を提供してください。';
$string['invalidpubkey'] = '有効なSSLキーではありません ({$a})。';
$string['invalidurl'] = '無効なURIパラメータです。';
$string['ipaddress'] = 'IPアドレス';
$string['is_in_range'] = 'IPアドレス <code>{$a}</code> は信頼できる有効なホストのIPアドレスです。';
$string['ispublished'] = 'あなたのために {$a} Moodleがサービスを有効にしました。';
$string['issubscribed'] = 'あなたのホストのサービスに {$a} Moodleが登録しました。';
$string['keydeleted'] = 'あなたの公開鍵が正常に削除および置換されました。';
$string['keymismatch'] = 'このホストのために保有されている公開鍵は、現在公開されている公開鍵と異なります。';
$string['last_connect_time'] = '最終接続日時';
$string['last_connect_time_help'] = 'あなたが最後にこのホストに接続した日時です。';
$string['last_transport_help'] = 'あたなが最後にこのホストの接続に使用したトランスポートです。';
$string['leavedefault'] = '代わりにデフォルト設定を使用する';
$string['listservices'] = 'サービスリスト';
$string['loginlinkmnetuser'] = '<br />あなたがMNetリモートネットワークユーザであり、<a href="{$a}">ここであなたのメールアドレスを確認できる場合</a>、ログインページへリダイレクトされます。<br />';
$string['logs'] = 'ログ';
$string['managemnetpeers'] = 'ピアを管理する';
$string['method'] = 'メソッド';
$string['methodhelp'] = '{$a} のメソッドヘルプ';
$string['methodsavailableonhost'] = '{$a} で利用可能なメソッド';
$string['methodsavailableonhostinservice'] = ' {$a->host} の {$a->service} で利用可能なメソッド';
$string['methodsignature'] = '{$a} のメソッド署名';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = '最大3個のストリングを連結して結果を戻す';
$string['mnetdisabled'] = 'MNetが<strong>無効</strong>にされています。';
$string['mnetidprovider'] = 'MNet IDプロバイダ';
$string['mnetidproviderdesc'] = '前回のログインに使用したユーザ名に合致する正しいメールアドレスを提供することで、あなたは、この機能を使用して、ログインリンクを検索することができます。';
$string['mnetidprovidermsg'] = 'あなたは、 {$a} プロバイダにログインすることができます。';
$string['mnetidprovidernotfound'] = '申し訳ございません、詳細情報は見つかりませんでした。';
$string['mnetlog'] = 'ログ';
$string['mnetpeers'] = 'ピア';
$string['mnetservices'] = 'サービス';
$string['mnet_session_prohibited'] = 'あなたのホームサーバのユーザは、現在 {$a} の散策を許可されていません。';
$string['mnetsettings'] = 'MNet設定';
$string['moodle_home_help'] = 'リモートホストのMNetアプリケーションホームページのパスです。 例 /moodle/';
$string['name'] = '名称';
$string['net'] = 'ネットワーキング';
$string['networksettings'] = 'ネットワーク設定';
$string['never'] = 'なし';
$string['noaclentries'] = 'SSOアクセスコントロールリストにエントリがありません。';
$string['noaddressforhost'] = '申し訳ございません、ホスト名 ({$a}) を解決できませんでした!';
$string['nocurl'] = 'PHP cURLライブラリがインストールされていません。';
$string['nolocaluser'] = 'リモートユーザのローカルレコードが存在しません。また、このホストは自動的にユーザを作成しないため、ローカルレコードを作成することができません。あなたの管理者にご連絡ください!';
$string['nomodifyacl'] = 'あなたはMNETアクセスコントロールリストの変更を許可されていません。';
$string['nonmatchingcert'] = '証明書のサブジェクト:<br /><em>{$a->subject}</em><br />が次のホスト証明書と合致しません:<br /><em>{$a->host}</em>';
$string['nopubkey'] = '公開鍵の検索時に問題が発生しました。<br />ホストがMnetを許可していないか、公開鍵が有効ではありません。';
$string['nosite'] = 'サイトレベルコースが見つかりませんでした。';
$string['nosuchfile'] = 'ファイル/関数 {$a} が存在していません。';
$string['nosuchfunction'] = 'RPCの機能が存在しないか、禁止されています。';
$string['nosuchmodule'] = '誤って実行されたため、関数を探すことができません。mod/modulename/lib/functionname の形式で実行してください。';
$string['nosuchpublickey'] = '署名認証のための公開鍵を取得できません。';
$string['nosuchservice'] = 'このホストではRPCサービスが動作していません。';
$string['nosuchtransport'] = 'このIDのトランスポートはありません。';
$string['notBASE64'] = 'このストリングはBase64エンコードフォーマットのストリングではありません。有効な公開鍵ではありません。';
$string['notenoughidpinfo'] = 'あなたのアカウントをローカルに作成または更新するための十分な情報を、あなたのアイデンティティプロバイダが提供していません。申し訳ございません!';
$string['not_in_range'] = 'IPアドレス「 <code>{$a}</code>」は信頼できる有効なホストではありません。';
$string['notinxmlrpcserver'] = 'XMLRPCサーバ実行中以外にMNetリモートクライアントへのアクセスを試みる';
$string['notmoodleapplication'] = '警告: これはMoodleアプリケーションではないため、いくつかの調査メソッドは正常に動作しません。';
$string['notPEM'] = 'この公開鍵はPEMフォーマットではありません。正常に動作しません。';
$string['notpermittedtojump'] = 'あなたには、このMoodleサーバからリモートセッションを開始する権限がありません。';
$string['notpermittedtojumpas'] = '別のユーザでログインしている限り、あなたはリモートセッションを開始できません。';
$string['notpermittedtoland'] = 'あなたには、リモートセッションを開始する権限がありません。';
$string['off'] = 'Off';
$string['on'] = 'On';
$string['options'] = 'オプション';
$string['peerprofilefielddesc'] = 'ここであなたは新しいユーザの作成時に送信およびインポートされるプロファイルフィールドのグローバル設定をオーバーライドすることができます。';
$string['permittedtransports'] = '許可されたトランスポート';
$string['phperror'] = '内部PHPエラーが発生したため、処理を実行できませんでした。';
$string['position'] = 'ポジション';
$string['postrequired'] = '削除処理には、POSTリクエストが必要です。';
$string['profileexportfields'] = '送信するフィールド';
$string['profilefielddesc'] = 'ここであなたはユーザアカウント作成または更新時にMNet経由で送信または受信される、プロファイルフィールドのリストを設定することができます。あなたはそれぞれのMNetピアの設定を個別にオーバーライドすることもできます。次のフィールドは常に送信さるため、任意ではないことに留意してください: {$a}';
$string['profilefields'] = 'プロファイルフィールド';
$string['profileimportfields'] = 'インポートするフィールド';
$string['promiscuous'] = '無制限';
$string['publickey'] = '公開鍵';
$string['publickey_help'] = '公開鍵は、リモートサーバより自動的に取得されます。';
$string['publickeyrequired'] = 'あなたは公開鍵を提供する必要があります。';
$string['publish'] = '公開';
$string['reallydeleteserver'] = '本当にサーバを削除してもよろしいですか?';
$string['receivedwarnings'] = '次のエラーが発生しました';
$string['recordnoexists'] = 'レコードが存在しません。';
$string['reenableserver'] = 'No - このサーバを再度有効にするため、このオプションを選択します。';
$string['registerallhosts'] = 'すべてのホストを登録する (ハブモード)';
$string['registerallhostsexplain'] = 'あなたのホストに自動接続を試みるすべてのホストを登録することができます。これはあなたのホストに接続して公開鍵を要求するMoodleサイトすべてが、あなたのホスト一覧に表示されることを意味します。<br />あなたにはサービスを設定するため、下記で「すべてのホストを登録する」を選択するオプションがあります。そこでいくつかのサービスを有効にすることにより、あなたはMoodleサーバすべてに対して無差別にサービスを提供することができます。';
$string['registerhostsoff'] = '現在、「すべてのホストを登録する」は<b>off</b>にされています。';
$string['registerhostson'] = '現在、「すべてのホストを登録する」は<b>on</b>にされています。';
$string['remotecourses'] = 'リモートコース';
$string['remotehost'] = 'リモートホスト';
$string['remotehosts'] = 'リモートホスト';
$string['remoteuserinfo'] = 'リモート {$a->remotetype} ユーザ - プロファイル取得先 <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'ネットワーキングには、OpenSSL拡張モジュールが必要です。';
$string['restore'] = 'リストア';
$string['returnvalue'] = '戻り値';
$string['reviewhostdetails'] = 'ホスト詳細をレビューする';
$string['reviewhostservices'] = 'ホストサービスをレビューする';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP 暗号化なし';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (自己署名)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (自己署名)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (署名)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (署名)';
$string['selectaccesslevel'] = 'リストからアクセスレベルを選択してください。';
$string['selectahost'] = 'リモートMoodleホストを選択してください。';
$string['service'] = 'サービス名';
$string['serviceid'] = 'サービスID';
$string['servicesavailableonhost'] = '{$a} で利用可能なサービス';
$string['serviceswepublish'] = 'サービスが {$a} に公開されました。';
$string['serviceswesubscribeto'] = '私たちが登録する {$a} のサービスです。';
$string['settings'] = '設定';
$string['showlocal'] = 'ローカルユーザを表示する';
$string['showremote'] = 'リモートユーザを表示する';
$string['ssl_acl_allow'] = 'SSO ACL: {$a->host} からのユーザ {$a->user} を許可します。';
$string['ssl_acl_deny'] = 'SSO ACL: {$a->host} からのユーザ {$a->user} を拒否します。';
$string['ssoaccesscontrol'] = 'SSOアクセスコントロール';
$string['ssoacldescr'] = 'このページはリモートMoodleネットワークホストのユーザによるアクセスを許可/拒否するため使用してください。この機能はあなたがリモートユーザにSSOサービスを提供するときに動作します。あなたの「ローカル」ユーザが他のMoodleネットワークホストを散策できるような権限をコントロールするには、ロールシステムにてユーザに「mnetlogintoremote」ケイパビリティを付与してください。';
$string['ssoaclneeds'] = 'この機能を動作させるためには、ネットーワキングを有効にしてください。さらにユーザを自動的に追加するにはMNet認証プラグインを有効にしてください。';
$string['strict'] = '厳格';
$string['subscribe'] = '登録';
$string['system'] = 'システム';
$string['testclient'] = 'MNetテストクライアント';
$string['testtrustedhosts'] = 'IPアドレスをテストする';
$string['testtrustedhostsexplain'] = '信頼できるホストかどうか確認するため、IPアドレスを入力してください。';
$string['theypublish'] = 'こちらに公開する';
$string['theysubscribe'] = 'こちらに登録する';
$string['transport_help'] = 'これらのオプションでは、相互認証が必要です。リモートホストに署名SSL証明書を強制するには、あなたのサーバも同様に署名SSL証明書を持つ必要があります。';
$string['trustedhosts'] = 'XML-RPCホスト';
$string['trustedhostsexplain'] = '<p>信頼できるホストメカニズムでは、特定のマシンにXML-RPC経由であらゆるMoodle APIの一部を実行することを許可します。Moodleの挙動をコントロールするスクリプトの実行が可能になり、このオプションを有効にすることで非常に危険になります。分からない場合、無効のままにしてください。</p><p>この設定はMoodleネットワーキングに必要<strong>ではありません!</strong> あなたが何をしているか分かっている場合のみ有効にしてください。</p><p>有効にするには1行に１つのIPアドレスのリストまたはネットワークを入力してください。例:</p>あなたのローカルホスト:<br />127.0.0.1<br />あなたのローカルホスト (CIDR表記、ネットワークブロック):<br />127.0.0.1/32<br />指定したIPアドレスのホストのみ 192.168.0.7:<br />192.168.0.7/32<br />IPアドレス 192.168.0.1 から 192.168.0.255 の間のホストはどれでも:<br />192.168.0.0/24<br />どのようなホストでも:<br />192.168.0.0/0<br />明らかに最後の例はお勧めできる設定<strong>ではありません</strong>。';
$string['turnitoff'] = 'offにする';
$string['turniton'] = 'onにする';
$string['type'] = 'タイプ';
$string['unknown'] = '不明';
$string['unknownerror'] = 'ネゴシエーション中に不明なエラーが発生しました。';
$string['usercannotchangepassword'] = 'あなたはリモートユーザのため、ここでパスワードを変更できません。';
$string['userchangepasswordlink'] = '<br /><a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a> で、あなたのパスワードを変更することができます。';
$string['usernotfullysetup'] = 'あなたのアカウントは完全ではありません。<a href="{$a}">あなたのプロバイダに戻って</a>、そこであなたのプロファイルが完全かどうか確認してください。設定を反映させるためには、あなたは一旦ログアウトして再度ログインする必要があります。';
$string['usersareonline'] = '警告: 現在、このサーバから {$a} 名のユーザがあなたのサイトにログインしています。';
$string['validated_by'] = '次のネットワークで認証されました: <code>{$a}</code>';
$string['verifysignature-error'] = '署名認証に失敗しました。エラーが発生しました。';
$string['verifysignature-invalid'] = '署名認証に失敗しました。このペイロード (データ本体) は、あなたが署名したものではないと思われます。';
$string['version'] = 'バージョン';
$string['warning'] = '警告';
$string['wrong-ip'] = 'あなたのIPアドレスが、記録されているレコードと合致しません。';
$string['xmlrpc-missing'] = 'この機能を使用するには、あなたのPHPビルドにXML-RPCをインストールしてください。';
$string['yourhost'] = 'あなたのホスト';
$string['yourpeers'] = 'あなたのピア';
