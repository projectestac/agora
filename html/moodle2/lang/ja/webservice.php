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
 * Strings for component 'webservice', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'アクセスコントロール例外';
$string['actwebserviceshhdr'] = 'アクティブなウェブサービスプロトコル';
$string['addaservice'] = 'サービスを追加する';
$string['addcapabilitytousers'] = 'ユーザケイパビリティをチェックする';
$string['addcapabilitytousersdescription'] = 'ウェブサービスを使用するには、ユーザは2つの異なるケイパビリティを必要とします: 「webservice:createtoken」およびウェブサービスプロトコルに合致するケイパビリ、例えば、「webservice/rest:use」、「\'webservice/soap:use」です。 このケイパビリティを設定するには、適切なケイパビリティを許可されたウェブサービスロールを作成した後、システムロールとしてウェブサービスユーザに割り当ててください。';
$string['addfunction'] = '関数を追加する';
$string['addfunctionhelp'] = 'サービスに追加する関数を選択してください。';
$string['addfunctions'] = '関数を追加する';
$string['addfunctionsdescription'] = '新しく作成されたサービスのために必要な関数を選択してください。';
$string['addrequiredcapability'] = '必須ケイパビリティを割り当てる/割り当て解除する';
$string['addservice'] = '新しいサービスを追加する: {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'サービス「 {$a} 」に関数を追加する';
$string['allusers'] = 'すべてのユーザ';
$string['amftestclient'] = 'AMFテストクライアント';
$string['apiexplorer'] = 'APIエクスプローラ';
$string['apiexplorernotavalaible'] = 'まだAPIエクスプローラを利用できません。';
$string['arguments'] = '引数';
$string['authmethod'] = '認証方法';
$string['cannotcreatetoken'] = 'サービス {$a} のウェブトークンを作成するパーミッションがありません。';
$string['cannotgetcoursecontents'] = 'コースコンテンツを取得できません。';
$string['checkusercapability'] = 'ユーザケイパビリティをチェックする';
$string['checkusercapabilitydescription'] = '使用するプロトコルに応じてユーザは適切なケイパビリティを割り当てられる必要があります。例えば、「webservice/rest:use」、「\'webservice/soap:use」です。このケイパビリティを設定するには、プロトコルのケイパビリティを許可されたウェブサービスロールを作成した後、システムロールとしてウェブサービスユーザに割り当ててください。';
$string['configwebserviceplugins'] = 'セキュリティ上の理由から、使用中のプロトコルのみ有効にしてください。';
$string['context'] = 'コンテクスト';
$string['createservicedescription'] = 'サービスは一連のウェブサービス関数です。あなたはユーザに新しいサービスへのアクセスを許可します。<strong>サービスを追加する</strong>ページにて、「有効」および「認証済みユーザのみ」オプションをチェックしてください。次に「必須ケイパビリティなし」を選択してください。';
$string['createserviceforusersdescription'] = 'サービスは一連のウェブサービス関数です。あなたはユーザに新しいサービスへのアクセスを許可します。<strong>サービスを追加する</strong>ページにて、「有効」オプションをチェック、「認証済みユーザのみ」オプションのチェックを外してください。次に「必須ケイパビリティなし」を選択してください。';
$string['createtoken'] = 'トークンを作成する';
$string['createtokenforuser'] = 'ユーザのトークンを作成する';
$string['createtokenforuserdescription'] = 'ウェブサービスユーザのトークンを作成してください。';
$string['createuser'] = 'ユーザを作成する';
$string['createuserdescription'] = 'ウェブサービスユーザはMoodleをコントロールするシステムのために必要です。';
$string['criteriaerror'] = 'クライテリアで検索するためのパーミッションがありません。';
$string['default'] = 'デフォルト:  {$a}';
$string['deleteaservice'] = 'サービスを削除する';
$string['deleteservice'] = 'サービスを削除する: {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'サービスを削除することにより、このサービスに関連するトークンも削除されてしまいます。本当に外部サービス「 {$a} 」を削除してもよろしいですか?';
$string['deletetokenconfirm'] = '本当にサービス<strong>{$a->service}</strong>の<strong>{$a->user}</strong>用ウェブサービストークンを削除してもよろしいですか?';
$string['disabledwarning'] = 'ウェブサービスプロトコルは無効にされています。拡張機能内に「ウェブサービスを有効にする」設定があります。';
$string['doc'] = 'ドキュメンテーション';
$string['docaccessrefused'] = 'あなたはこのトークンに関するドキュメンテーションの閲覧を許可されていません。';
$string['documentation'] = 'ウェブサービスドキュメンテーション';
$string['downloadfiles'] = 'ファイルをダウンロードできる';
$string['downloadfiles_help'] = '有効にした場合、すべてのユーザはセキュリティを使ってファイルをダウンロードすることができます。もちろん、サイト内でダウンロードを許可されたファイルに制限されます。';
$string['editaservice'] = 'サービスを編集する';
$string['editservice'] = 'サービスを編集する: {$a->name} (id: {$a->id})';
$string['enabled'] = '有効';
$string['enabledocumentation'] = '開発者ドキュメントを有効にする';
$string['enabledocumentationdescription'] = '有効にされたプロトコルに関する詳細ウェブサービスドキュメンテーションを閲覧することができます。';
$string['enablemobilewsoverview'] = '{$a->manageservicelink} 管理ページに移動して「 {$a->enablemobileservice} 」設定をチェックした後、保存してください。あなたのためにすべてが設定され、すべてのサイトユーザがオフィシャルMoodle appを利用できるようになります。現在のステータス: {$a->wsmobilestatus}';
$string['enableprotocols'] = 'プロトコルを有効にする';
$string['enableprotocolsdescription'] = '少なくとも1つのプロトコルを有効にする必要があります。セキュリティ上の理由から、使用されるプロトコルのみ有効にしてください。';
$string['enablews'] = 'ウェブサービスを有効にする';
$string['enablewsdescription'] = '拡張機能内でウェブサービスを有効にする必要があります。';
$string['entertoken'] = 'セキュリティキー/トークンを入力してください:';
$string['error'] = 'エラー: {$a}';
$string['errorcatcontextnotvalid'] = 'あなたはカテゴリコンテクスト (カテゴリID:{$a->catid}) 内で関数を実行できません。コンテクストエラーメッセージは次のとおりです: {$a->message}';
$string['errorcodes'] = 'エラーメッセージ';
$string['errorcoursecontextnotvalid'] = 'あなたはコースコンテクスト (コースID:{$a->courseid}) 内で関数を実行できません。コンテクストエラーメッセージは次のとおりです: {$a->message}';
$string['errorinvalidparam'] = 'パラメータ「 {$a} 」が有効ではありません。';
$string['errornotemptydefaultparamarray'] = 'ウェブサービス記述パラメータ「 {$a} 」は単一または多重構造となっています。 デフォルトでは空の配列のみ使用できます。ウェブサービス記述を確認してください。';
$string['erroroptionalparamarray'] = 'ウェブサービス記述パラメータ「 {$a} 」は単一または多重構造となっています。VALUE_OPTIONALとして設定することはできません。ウェブサービス記述を確認してください。';
$string['event_webservice_function_called'] = 'ウェブサービス関数がコールされました。';
$string['event_webservice_login_failed'] = 'ウェブサービスのログインに失敗しました。';
$string['event_webservice_service_created'] = 'ウェブサービスが作成されました。';
$string['event_webservice_service_updated'] = 'ウェブサービスが更新されました。';
$string['event_webservice_service_user_added'] = 'ウェブサービスユーザが追加されました。';
$string['event_webservice_service_user_removed'] = 'ウェブサービスユーザが削除されました。';
$string['event_webservice_token_created'] = 'ウェブサービストークンが作成されました。';
$string['event_webservice_token_sent'] = 'ウェブサービストークンが送信されました。';
$string['execute'] = '実行';
$string['executewarnign'] = '警告: 実行をクリックした場合、あなたのデータベースが変更され、自動的に戻すことができないようになります!';
$string['externalservice'] = '外部サービス';
$string['externalservicefunctions'] = '外部サービス関数';
$string['externalservices'] = '外部サービス';
$string['externalserviceusers'] = '外部サービスユーザ';
$string['failedtolog'] = 'ログ失敗';
$string['filenameexist'] = 'すでにファイル名が使用されています: {$a}';
$string['forbiddenwsuser'] = '未確認、削除済みまたはゲストユーザに対して、トークンは作成できません。';
$string['function'] = '関数';
$string['functions'] = '関数';
$string['generalstructure'] = '全体構造';
$string['information'] = '情報';
$string['installexistingserviceshortnameerror'] = '省略名「 {$a} 」のウェブサービスはすでに存在します。この省略名を使った異なるウェブサービスをインストール/アップグレードすることはできません。';
$string['installserviceshortnameerror'] = 'コーディングエラー: サービス省略名「 {$a} 」には数字、文字および「_-.. 」のみ含むことができます。';
$string['invalidextparam'] = '無効な外部APIパラメータ: {$a}';
$string['invalidextresponse'] = '無効な外部APIレスポンス: {$a}';
$string['invalidiptoken'] = '無効なトークン - あなたのIPはサポートされていません。';
$string['invalidtimedtoken'] = '無効なトークン - トークンの有効期限が切れています。';
$string['invalidtoken'] = '無効なトークン - トークンが見つかりませんでした。';
$string['iprestriction'] = 'IP制限';
$string['iprestriction_help'] = 'ユーザはリストアップされたIPアドレス (カンマ区切り) よりウェブサービスをコールする必要があります。';
$string['key'] = 'キー';
$string['keyshelp'] = 'キーは外部アプリケーションから、あなたのMoodleへのアクセス時に使用されます。';
$string['manageprotocols'] = 'プロトコル管理';
$string['managetokens'] = 'トークン管理';
$string['missingcaps'] = '不足したケイパビリティ';
$string['missingcaps_help'] = '選択されたユーザに対してサービスで割り当てられていない必須ケイパビリティの一覧です。サービスを使用するには、不足しているケイパビリティをユーザロールに追加する必要があります。';
$string['missingpassword'] = 'パスワードがありません。';
$string['missingrequiredcapability'] = 'ケイパビリティ {$a} が必要です。';
$string['missingusername'] = 'ユーザ名がありません。';
$string['missingversionfile'] = 'コーディングエラー: コンポーネント {$a} のversion.phpファイルがありません。';
$string['mobilewsdisabled'] = '無効';
$string['mobilewsenabled'] = '無効';
$string['nocapabilitytouseparameter'] = 'ユーザにはパラメータ「 {$a} 」を使用するための必須ケイパビリティがありません。';
$string['nofunctions'] = 'このサービスに関数はありません。';
$string['norequiredcapability'] = '必須ケイパビリティなし';
$string['notoken'] = 'トークンリストが空です。';
$string['onesystemcontrolling'] = '外部システムによるMoodleコントロールを許可する';
$string['onesystemcontrollingdescription'] = '次のステップは外部システムによるMoodleとの連携を許可するためのMoodleウェブサービスをあなたが設定するための補助となります。このステップにはトークン (セキュリティキー) 認証メソッドのセットアップを含みます。';
$string['operation'] = '操作';
$string['optional'] = '任意';
$string['passwordisexpired'] = 'パスワードの有効期限が切れました。';
$string['phpparam'] = 'XML-RPC (PHP構造)';
$string['phpresponse'] = 'XML-RPC (PHP構造)';
$string['postrestparam'] = ' RESTのPHPコード (POSTリクエスト)';
$string['potusers'] = '未認証ユーザ';
$string['potusersmatching'] = '合致しない認証ユーザ';
$string['print'] = 'すべてをプリントする';
$string['protocol'] = 'プロトコル';
$string['removefunction'] = '削除';
$string['removefunctionconfirm'] = '本当に「 {$a->service} 」から関数「 {$a->function} 」を削除してもよろしいですか?';
$string['requireauthentication'] = 'このメソッドには xxx パーミッションの認証を必要とします。';
$string['required'] = '必須';
$string['requiredcapability'] = '必須ケイパビリティ';
$string['requiredcapability_help'] = '有効にした場合、必要なケイパビリティが割り当てられたユーザのみサービスにアクセスすることができます。';
$string['requiredcaps'] = '必須ケイパビリティ';
$string['resettokenconfirm'] = '本当にサービス<strong>{$a->service}</strong>の<strong>{$a->user}</strong>用ウェブサービスキーをリセットしてもよろしいですか?';
$string['resettokenconfirmsimple'] = '本当のこのキーをリセットしてもよろしいですか? 古いキーを含んだ保存済みリンクすべてが今後動作しないようになります。';
$string['response'] = 'レスポンス';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'リストアされたアカウントは、トークンを取得する前にパスワードのリセットが必要です。';
$string['restparam'] = 'REST (POSTパラメータ)';
$string['restrictedusers'] = '認証済みユーザのみ';
$string['restrictedusers_help'] = 'この設定ではウェブサービストークン作成のパーミッションを持ったすべてのユーザがセキュリティキーページ経由でこのサービスのトークンを作成できるか、認証ユーザのみ作成できるか指定します。';
$string['securitykey'] = 'セキュリティキー (トークン)';
$string['securitykeys'] = 'セキュリティキー';
$string['selectauthorisedusers'] = '認証済みユーザを選択する';
$string['selectedcapability'] = '選択済み';
$string['selectedcapabilitydoesntexit'] = ' 現在設定されている必須ケイパビリティ ({$a}) はもやは存在していません。設定を変更した後、変更を保存してください。';
$string['selectservice'] = 'サービスを選択する';
$string['selectspecificuser'] = 'ユーザを選択する';
$string['selectspecificuserdescription'] = '認証ユーザとしてウェブサービスユーザを追加します。';
$string['service'] = 'サービス';
$string['servicehelpexplanation'] = 'サービスは一連の関数です。サービスにはすべてのユーザまたは指定されたユーザがアクセスすることができます。';
$string['servicename'] = 'サービス名';
$string['servicenotavailable'] = 'ウェブサービスを利用できません (存在しないか、無効にされています)';
$string['servicesbuiltin'] = 'ビルトインサービス';
$string['servicescustom'] = 'カスタムサービス';
$string['serviceusers'] = '認証ユーザ';
$string['serviceusersettings'] = 'ユーザ設定';
$string['serviceusersmatching'] = '合致する認証ユーザ';
$string['serviceuserssettings'] = '認証済みユーザの設定を変更する';
$string['simpleauthlog'] = 'シンプル認証ログイン';
$string['step'] = 'ステップ';
$string['supplyinfo'] = '詳細';
$string['testauserwithtestclientdescription'] = 'ウェブサービステストクライアントを使用してサービスへの外部アクセスをシミュレートします。シミュレートする前、「moodle/webservice:createtoken」ケイパビリティを設定したユーザでログインした後、マイプロファイル設定経由でセキュリティキー (トークン) を取得してください。あなたはこのトークンをテストクライアントで使用します。また、テストクライアントでは有効にされたトークン認証のプロトコルを選択します。<strong>警告: あなたがテストする関数はこのユーザに対して実行されます。関数の選択には十分注意してください!</strong>';
$string['testclient'] = 'ウェブサービステストクライアント';
$string['testclientdescription'] = '* ウェブサービステストクライアントは関数を<strong>実際</strong>に<strong>実行</strong> します。あなたが知らない関数をテストしないでください。<br/>
* まだ、既存のすべてのウェブサービス関数はテストクライアントに実装されていません。<br/>
* ユーザがいくつかの関数にアクセスできないかテストするには、あなたが許可されていなかった関数をテストしてください。<br/>
* 明確なエラーメッセージを表示するには、{$a->atag} のデバッグメッセージを <strong>{$a->mode}</strong> に設定してください。<br/>
* {$a->amfatag} にアクセスしてください。';
$string['testwithtestclient'] = 'サービスをテストする';
$string['testwithtestclientdescription'] = 'ウェブサービステストクライアントを使用してサービスへの外部アクセスをシミュレートします。有効にされたトークン認証のプロトコルを使用してください。<strong>警告: あなたのテストする関数が実行されます。関数の選択には十分注意してください!</strong>';
$string['token'] = 'トークン';
$string['tokenauthlog'] = 'トークン認証';
$string['tokencreatedbyadmin'] = '管理者のみリセットできる (*)';
$string['tokencreator'] = '作成者';
$string['unknownoptionkey'] = '不明なオプションキーです ({$a})';
$string['unnamedstringparam'] = 'ストリングパラメータ名がありません。';
$string['updateusersettings'] = '更新';
$string['uploadfiles'] = 'ファイルをアップロードできる';
$string['uploadfiles_help'] = 'この設定を有効にした場合、すべてのユーザは自分のプライベートファイルエリアまたは下書きファイルエリアにファイルおよびセキュリティキーをアップロードすることができます。すべてのユーザファイルに対して、ファイルクオータが適用されます。';
$string['userasclients'] = 'トークンを使用したユーザのクライアントとして';
$string['userasclientsdescription'] = '次のステップにより、あなたはユーザのクライアントとしてMoodleウェブサービスをセットアップすることができます。これらのステップは推奨トークン (セキュリティキー) 認証メソッドのセットアップにも役立ちます。この場合、ユーザはプロファイル設定を経由してセキュリティキーページにてトークンを生成することができます。';
$string['usermissingcaps'] = '不足しているケイパビリティ: {$a}';
$string['usernameorid'] = 'ユーザ名/ユーザID';
$string['usernameorid_help'] = 'ユーザ名またはユーザIDを入力してください。';
$string['usernameoridnousererror'] = 'このユーザ名/ユーザIDでユーザは見つかりませんでした。';
$string['usernameoridoccurenceerror'] = 'このユーザ名で1名以上のユーザが見つかりました。ユーザIDを入力してください。';
$string['usernotallowed'] = 'ユーザはこのサービスを許可されていません。あなたはまず最初に {$a} の許可されたユーザ管理ページにて、このユーザを許可する必要があります。';
$string['usersettingssaved'] = 'ユーザ設定が保存されました。';
$string['validuntil'] = '有効期限';
$string['validuntil_help'] = '設定した場合、この日付以降、このユーザに対するサービスが無効となります。';
$string['webservice'] = 'ウェブサービス';
$string['webservices'] = 'ウェブサービス';
$string['webservicesoverview'] = '概要';
$string['webservicetokens'] = 'ウェブサービストークン';
$string['wrongusernamepassword'] = 'ユーザ名またはパスワードが正しくありません。';
$string['wsaccessuserdeleted'] = '削除によるウェブサービスアクセス拒否のユーザ名: {$a}';
$string['wsaccessuserexpired'] = 'パスワード期限切れによるウェブサービスアクセス拒否のユーザ名: {$a}';
$string['wsaccessusernologin'] = 'ログイン認証なしによるウェブサービスアクセス拒否のユーザ名: {$a}';
$string['wsaccessusersuspended'] = 'アカウント停止によるウェブサービスアクセス拒否のユーザ名: {$a}';
$string['wsaccessuserunconfirmed'] = '確認未了によるウェブサービスアクセス拒否のユーザ名: {$a}';
$string['wsclientdoc'] = 'Moodleウェブサービスクライアントドキュメンテーション';
$string['wsdocapi'] = 'APIドキュメンテーション';
$string['wsdocumentation'] = 'ウェブサービスドキュメンテーション';
$string['wsdocumentationdisable'] = 'ウェブサービスドキュメンテーションは無効にされています。';
$string['wsdocumentationintro'] = 'クライアントを作成するには、{$a->doclink} をご覧ください。';
$string['wsdocumentationlogin'] = 'またはあなたのウェブサービスユーザ名およびパスワードを入力してください:';
$string['wspassword'] = 'ウェブサービスパスワード';
$string['wsusername'] = 'ウェブサービスユーザ名';
