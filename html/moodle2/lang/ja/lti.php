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
 * Strings for component 'lti', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = '承認';
$string['accept_grades'] = 'ツールからの評点を受け付ける';
$string['accept_grades_admin'] = 'ツールからの評点を受け付ける';
$string['accept_grades_admin_help'] = 'このツールタイプのインスタンスに関わる評定をツールプロバイダが追加、更新、閲覧および削除できるかどうか指定してください。

いくつかのツールプロバイダでは、ツール内で実施された操作をベースにMoodleに対して評定報告をサポートすることにより、さらなる統合環境を提供します。';
$string['accept_grades_help'] = 'この外部ツールのインスタンスのみに関わる評定をツールプロバイダが追加、更新、閲覧および削除できるかどうか指定してください。

いくつかのツールプロバイダでは、ツール内で実施された操作をベースにMoodleに対して評定報告をサポートすることにより、さらなる統合環境を提供します。

この設定はツール設定内でオーバーライドできることに留意してください。';
$string['action'] = '操作';
$string['active'] = 'アクティブ';
$string['activity'] = '活動';
$string['addnewapp'] = '外部アプリケーションを有効にする';
$string['addserver'] = '新しい信頼されるサーバを追加する';
$string['addtype'] = '外部ツール設定を追加する';
$string['allow'] = '許可';
$string['allowinstructorcustom'] = '教師によるカスタムパラメータの追加を許可する';
$string['allowsetting'] = 'ツールによるMoodle内での8Kの設定保存を許可する';
$string['always'] = '常に';
$string['automatic'] = '自動、起動URLをベースにする';
$string['baseurl'] = 'ベースURL';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'LTI活動';
$string['basiclti_base_string'] = 'LTI OAuth基本ストリング';
$string['basiclti_endpoint'] = 'LTI起動エンドポイント';
$string['basicltifieldset'] = 'カスタムテンプレートフィールド';
$string['basiclti_in_new_window'] = 'あなたの活動は新しいウィンドウに表示されます。';
$string['basicltiintro'] = '活動説明';
$string['basicltiname'] = '活動名';
$string['basiclti_parameters'] = 'LTI起動パラメータ';
$string['basicltisettings'] = '基本学習ツール相互運用 (Learning Tool Interoperability) 設定';
$string['cannot_delete'] = 'あなたはこのツール設定を削除できません。';
$string['cannot_edit'] = 'あなたはこのツール設定を編集できません。';
$string['comment'] = 'コメント';
$string['configpassword'] = 'デフォルトのリモートツールパスワード';
$string['configpreferheight'] = 'デフォルト推奨高';
$string['configpreferwidget'] = 'デフォルト起動をウィジェットに設定する';
$string['configpreferwidth'] = 'デフォルト推奨幅';
$string['configresourceurl'] = 'デフォルトリソースURL';
$string['configtoolurl'] = 'デフォルトリモートツールURL';
$string['configtypes'] = 'LTIアプリケーションを有効にする';
$string['courseid'] = 'コースIDナンバー';
$string['coursemisconf'] = 'コースが正しく設定されていません。';
$string['course_tool_types'] = 'コースツールタイプ';
$string['createdon'] = '作成日';
$string['curllibrarymissing'] = 'LTIを使用するには、PHP Curlライブラリをインストールする必要があります。';
$string['custom'] = 'カスタムパラメータ';
$string['custom_config'] = 'カスタムツール設定を使用します。';
$string['custom_help'] = 'カスタムパラメータはツールプロバイダから使用される設定です。例えば、プロバイダから特定のリソースを表示するため、カスタムパラメータを使用することができます。

ツールプロバイダから指示されない限り、このフィールドを変更しないままで安全です。';
$string['custominstr'] = 'カスタムパラメータ';
$string['debuglaunch'] = 'デバッグオプション';
$string['debuglaunchoff'] = '通常起動';
$string['debuglaunchon'] = 'デバッグ起動';
$string['default'] = 'デフォルト';
$string['default_launch_container'] = 'デフォルト起動コンテナ';
$string['default_launch_container_help'] = '起動コンテナは、コースからツールが起動される場合の表示に影響します。いくつかの起動コンテナではツールに場所を提供して、他の起動コンテナではMoodle環境との統合を実現します。

* **デフォルト** - ツール設定で指定された起動コンテナを使用します。

* **埋め込み** - 他の活動タイプと同じように、ツールが既存のMoodleウィンドウ内に表示されます。

* **埋め込み (ブロックなし)** - トップページにナビゲーションが付加された形で、ツールが既存のMoodleウィンドウ内に表示されます。

* **新しいウィンドウ** - ツールは利用可能なスペースすべてを占有して、新しいウィンドウに表示されます。ブラウザにより、新しいタブまたはポップアップウィンドウが使用されます。ブラウザでは、新しいウィンドウのオープンを抑制することができます。';
$string['delegate'] = '教師に委任する';
$string['delete'] = '削除';
$string['delete_confirmation'] = '本当に外部ツール設定を削除してもよろしいですか?';
$string['deletetype'] = '外部ツール設定を削除する';
$string['display_description'] = '起動時に活動説明を表示する';
$string['display_description_help'] = 'このオプションを有効にした場合、活動説明 (上記) がツールプロバイダのコンテンツの上に表示されます。

説明はツールの起動に関して、付加的なインストラクションを提供するために使用できますが、必須ではありません。

ツール起動コンテナが新しいウィンドウの場合、説明が表示されることがありません。';
$string['display_name'] = '起動時に活動名を表示する';
$string['display_name_help'] = 'このオプションを有効にした場合、活動名 (上記) がツールプロバイダのコンテンツの上に表示されます。

ツールプロバイダはタイトルを表示することもできます。このオプションにより、活動タイトルが2回表示されることを防ぐことができます。

ツール起動コンテナが新しいウィンドウの場合、説明が表示されることがありません。';
$string['domain_mismatch'] = '起動URLのドメインがツール設定と合致しません。';
$string['donot'] = '送信しない';
$string['donotaccept'] = '承認しない';
$string['donotallow'] = '許可しない';
$string['edittype'] = '外部ツール設定を編集する';
$string['embed'] = '埋め込み';
$string['embed_no_blocks'] = '埋め込み (ブロックなし)';
$string['enableemailnotification'] = '通知メールを送信する';
$string['enableemailnotification_help'] = '有効にした場合、ツール送信が評定された時点で学生に対して通知メールが送信されます。';
$string['errormisconfig'] = 'ツールが正しく設定されていません。ツール設定を修正するには、あなたのMoodle管理者にご連絡ください。';
$string['extensions'] = 'LTI拡張サービス';
$string['external_tool_type'] = '外部ツールタイプ';
$string['external_tool_type_help'] = 'ツール設定の主目的は、Moodleおよびツールプロバイダ間の安全な通信チャネルを構築することにあります。

デフォルト設定およびツールにより提供されるサービスの追加的な設定を提供することもできます。

* **自動、起動URLをベースにする** - この設定は、ほとんどすべてのケースで使用されます。起動URLに基づき、Moodleは最も適切なツール設定を選択します。管理者によるツール設定およびコース内でのツール設定の両者が使用されます。起動URLが指定された場合、Moodleは起動URLを認識できるか否か、フィードバックを提供します。Moodleが起動URLを認識できない場合、あなたは手動でツール設定に入力する必要があります。

* **特定のツールタイプ** - 特定のツールタイプを選択することで、あなたは外部ツールプロバイダとの通信に関して、Moodleにツール設定内容の使用を強制することができます。起動URLがツールプロバイダに属していない場合、警告が表示されます。一部のケースでは、特定ツールの提供時に起動URLを入力する必要はありません (ツールプロバイダ内で特定のリソースを起動しな場合)。

* **カスタム設定** - このインスタンス内でカスタムツール設定を割り当てる場合、拡張要素を表示した後、コンシューマーキーおよび共通秘密鍵を入力してください。コンシューマーキーおよび共通秘密鍵がない場合、あなたはツールプロバイダにリクエストすることができます。すべてのツールがコンシューマーキーおよび共通秘密鍵を必要とすることではないため、その場合はフィールドを空白のままにすることができます。

### ツールタイプ編集

外部ツールタイプのドロップダウンメニューでは、3つのアイコンを選択することができます:

* **追加** - コースレベルの設定を作成します。コース内すべての外部ツールインスタンスでは、ツール設定を使用することができます。

* **編集** - コースレベルのツールタイプをドロップダウンメニューから選択して、アイコンをクリックしてください。ツール設定詳細を編集することができます。

* **削除** - 選択したコースレベルのツールタイプを削除します。';
$string['external_tool_types'] = '外部ツールタイプ';
$string['failedtoconnect'] = 'Moodleが「 $a 」システムと通信できませんでした。';
$string['filter_basiclti_configlink'] = 'あなたの推奨サイトおよびパスワードを設定します。';
$string['filter_basiclti_password'] = 'パスワードは必須です。';
$string['filterconfig'] = 'LTI管理';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = '設定の正しくないインスタンスに対して、既存の設定を使用する';
$string['fixnew'] = '新しい設定';
$string['fixnewconf'] = '設定の正しくないインスタンスに対して、新しい設定を定義する';
$string['fixold'] = '既存の設定を使用する';
$string['forced_help'] = 'この設定はコースまたはサイトレベルのツール設定で強制されています。あなたはこのインターフェースで設定内容を変更することはできません。';
$string['force_ssl'] = 'SSLを強制する';
$string['force_ssl_help'] = 'このオプションを有効にすることで、このツールプロバイダのツール起動すべてにSSLが使用されます。

加えて、ツールプロバイダからのウェブサービスリクエストすべてにSSLが使用されます。

このオプションを使用する場合、MoodleサイトおよびツールプロバイダがSSLをサポートしていることを確認してください。';
$string['generaltool'] = '一般ツール';
$string['global_tool_types'] = 'グローバルタイプ';
$string['grading'] = '評定ルーティング';
$string['icon_url'] = 'アイコンURL';
$string['icon_url_help'] = 'アイコンURLでは、この活動がコース一覧に表示されるときに表示されるアイコンを変更します。デフォルトのLTIアイコンを使用する代わりに、活動のタイプで使用されるアイコンを指定することができます。';
$string['id'] = 'ID';
$string['invalidid'] = 'LTI IDが正しくありません。';
$string['launch_in_moodle'] = 'Moodle内でツールを起動する';
$string['launchinpopup'] = '起動コンテナ';
$string['launch_in_popup'] = 'ツールをポップアップに起動する';
$string['launchinpopup_help'] = '起動コンテナは、コースからツールが起動される場合の表示に影響します。いくつかの起動コンテナではツールに場所を提供して、他の起動コンテナではMoodle環境との統合を実現します。

* **デフォルト** - ツール設定で指定された起動コンテナを使用します。

* **埋め込み** - 他の活動タイプと同じように、ツールが既存のMoodleウィンドウ内に表示されます。

* **埋め込み (ブロックなし)** - トップページにナビゲーションが付加された形で、ツールが既存のMoodleウィンドウ内に表示されます。

* **新しいウィンドウ** - ツールは利用可能なスペースすべてを占有して、新しいウィンドウに表示されます。ブラウザにより、新しいタブまたはポップアップウィンドウが使用されます。ブラウザでは、新しいウィンドウのオープンを抑制することができます。';
$string['launchoptions'] = '起動オプション';
$string['launch_url'] = '起動URL';
$string['launch_url_help'] = '起動URLでは外部ツールのウェブアドレスを指定します。また、表示するリソース等、追加的な情報を含むことができます。起動URLに何を入力するのか分からない場合、ツールプロバイダを確認してください。

特定のツールタイプを選択した場合、あなたは起動URLを入力する必要はありません。ツールリンクがツールプロバイダのシステムを起動するのみ、または特定のリソースに移動しない場合がこのケースにあたります。';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'コース個別ツール設定を追加する';
$string['lti:addinstance'] = '新しい外部ツール活動を追加する';
$string['lti_administration'] = 'LTI管理';
$string['lti_errormsg'] = 'ツールにより次のエラーメッセージが返されました: 「 $a 」';
$string['lti:grade'] = '外部ツールから戻された評点を表示する';
$string['lti_launch_error'] = '外部ツール起動中にエラーが発生しました:';
$string['lti_launch_error_tool_request'] = '<p>管理者にツール設定の完了をリクエストするには、<a href="{$a->admin_request_url}" target="_top">ここをクリック</a>してください。 </p>';
$string['lti_launch_error_unsigned_help'] = '<p>ツールプロバイダのコンシューマーキーおよび共通秘密鍵が不足しているため、このエラーが発生したと考えられます。</p>
<p> コンシューマーキーおよび共通秘密鍵がある場合、あなたは外部ツールインスタンスの設定時に入力することができます (拡張要素が表示されていることを確認してください)。</p>
<p> 代わりに、あなたは<a href="{$a->course_tool_editor}">ここで</a>コースレベルのツールプロバイダ設定を作成することができます。</p>';
$string['lti:manage'] = 'ツール起動時、インストラクタになる';
$string['lti:requesttooladd'] = 'ツールがサイト全体に設定されるようリクエストする';
$string['lti_tool_request_added'] = 'ツール設定のリクエストが正常に送信されました。ツール設定を完了するため、あなたは管理者に連絡する必要があります。';
$string['lti_tool_request_existing'] = 'ツールドメインに関するツール設定は、すでに送信されています。';
$string['ltiunknownserviceapicall'] = 'LTIの不明なサービスAPIがコールされました。';
$string['lti:view'] = '外部ツール活動を起動する';
$string['main_admin'] = '概要ヘルプ';
$string['main_admin_help'] = '外部ツールでは、遠隔に設置されたリソースをMoodleユーザがシームレスに利用できること実現します。特別な起動プロトコルを通して、リモートツールは起動ユーザの一般的な情報にアクセスすることができます。例えば、インスティテューション名、コースID、ユーザIDおよびユーザ名またはメールアドレス等の情報です。

このページに一覧表示されているツールタイプは、3つのカテゴリに分けられます:

* **アクティブ** - これらのツールプロバイダは、管理者により承認および設定されています。このMoodleインスタンス内すべてのコースで利用することができます。コンシューマーキーおよび共通秘密鍵が入力された場合、Moodleインスタンスおよびリモートツール間において、安全な通信チャネルを提供する信頼関係が確立されます。

* **保留** - これらのツールプロバイダはパッケージインポート経由で登録されていますが、管理者から設定されていない状態です。コンシューマーキーおよび共通秘密鍵がある場合、またはそれらを必要としない場合、教師はこれらのプロバイダのツールを利用することができます。

* **拒否** - これらのツールは、管理者がMoodleインスタンス全体において、利用できるようにする意図がない旨、フラグを立てられた状態です。コンシューマーキーおよび共通秘密鍵がある場合、またはそれらを必要としない場合、教師はこれらのプロバイダのツールを利用することができます。';
$string['miscellaneous'] = 'その他';
$string['misconfiguredtools'] = '設定の正しくないツールインスタンスが検出されました。';
$string['missingparameterserror'] = 'ページの設定が正しくありません: 「 $a 」';
$string['module_class_type'] = 'Moodleモジュールタイプ';
$string['modulename'] = '外部ツール';
$string['modulename_help'] = '外部ツール活動モジュールにおいて、学生は他のウェブサイト上の学習リソースおよび活動と相互連携することができます。例えば、外部ツールは新しい活動タイプまたは出版社の学習教材へのアクセスを提供することができます。

外部ツール活動を作成するには、ツールプロバイダによるLTI (Learning Tool Interoperability 学習ツール相互運用) のサポートが必要です。教師は外部ツール活動を作成またはサイト管理者によって設定されたツールを利用可能な状態にすることができます。

いくつかの点において、外部ツール活動はURLリソースと異なります:

* 外部ツールはコンテクスト志向 (context aware) です。例えば、インスティテューション、コースおよび氏名等、ツールを起動したユーザの情報にアクセスすることができます。
* 外部ツールは活動インスタンスに関する評点の閲覧、更新および削除をサポートします。
* 外部ツール設定では、両者間の安全な通信を許可することにより、あなたのサイトおよびツールプロバイダ間の信頼関係を確立します。';
$string['modulenameplural'] = '外部ツール';
$string['modulenamepluralformatted'] = 'LTIインスタンス';
$string['never'] = 'なし';
$string['new_window'] = '新しいウィンドウ';
$string['noattempts'] = 'このツールインスタンスでは、受験されたものはありません。';
$string['no_lti_configured'] = 'アクティブな外部ツール設定はありません。';
$string['no_lti_pending'] = '保留された外部ツール設定はありません。';
$string['no_lti_rejected'] = '拒否された外部ツール設定はありません。';
$string['noltis'] = 'LTIインスタンスはありません。';
$string['noservers'] = 'サーバが見つかりませんでした。';
$string['notypes'] = '現在、Moodle内で設定されているLTIツールはありません。追加するには、上記のインストールリンクをクリックしてください。';
$string['noviewusers'] = 'このツールを使用するパーミッションが割り当てられたユーザは見つかりませんでした。';
$string['optionalsettings'] = 'オプション設定';
$string['organization'] = '組織詳細';
$string['organizationdescr'] = '組織説明';
$string['organizationid'] = '組織ID';
$string['organizationid_help'] = 'このMoodleインスタンスの固有IDです。一般的に、組織で使用されているDNS名です。

このフィールドを空白にした場合、サイト設定内のデフォルト値が使用されます。';
$string['organizationurl'] = '組織URL';
$string['organizationurl_help'] = 'MoodleインスタンスのベースURLです。

このフィールドを空白にした場合、サイト設定内のデフォルト値が使用されます。';
$string['pagesize'] = '1ページあたりの表示送信数';
$string['password'] = '共有秘密鍵';
$string['password_admin'] = '共有秘密鍵';
$string['password_admin_help'] = '共有秘密鍵は、ツールへの認証アクセスに使用されるパスワードだと考えることができます。ツールプロバイダから、コンシューマーキーと共に提供される必要があります。

Moodleからの安全な通信を必要とせず、評定レポートのような追加的なサービスを提供しない場合、共通秘密鍵は必要ではありません。';
$string['password_help'] = '設定処理の一環として提供されるため、事前に設定されたツールでは、ここで共通秘密鍵を入力する必要はありません。

未設定のツールプロバイダへのリンクを作成する場合、このフィールドには設定値を入力する必要があります。このコース内でツールプロバイダが1回以上使用される場合、コースツール設定を追加することは良い考え方です。

共有秘密鍵は、ツールへの認証アクセスに使用されるパスワードだと考えることができます。ツールプロバイダから、コンシューマーキーと共に提供される必要があります。

Moodleからの安全な通信を必要とせず、評定レポートのような追加的なサービスを提供しない場合、共通秘密鍵は必要ではありません。';
$string['pending'] = '保留';
$string['pluginadministration'] = 'LTI管理';
$string['pluginname'] = 'LTI';
$string['preferheight'] = '推奨高';
$string['preferwidget'] = 'ウィジェットの起動を選択する';
$string['preferwidth'] = '推奨幅';
$string['press_to_submit'] = 'この活動を起動する';
$string['privacy'] = 'プライバシー';
$string['quickgrade'] = 'クイック評定を有効にする';
$string['quickgrade_help'] = 'クイック評定を有効にした場合、1ページで複数のツールを評定することができます。ページ内のすべての変更を同時に保存するには、評点とコメントを変更して画面下部にある「すべてのフィードバックを保存する」ボタンをクリックしてください。';
$string['redirect'] = 'あなたは数秒以内にリダイレクトされます。リダイレクトされない場合、ボタンをクリックしてください。';
$string['reject'] = '拒否';
$string['rejected'] = '拒否';
$string['resource'] = 'リソース';
$string['resourcekey'] = 'コンシュマーキー';
$string['resourcekey_admin'] = 'コンシュマーキー';
$string['resourcekey_admin_help'] = 'コンシューマーキーは、ツールへの認証アクセスに使用されるユーザ名だと考えることができます。ユーザによるMoodleサイトからのツール起動を一意的に識別するため、ツールプロバイダが使用することができます。

コンシューマーキーはツールプロバイダから提供される必要があります。コンシューマーキーの取得方法は、ツールプロバイダ間で異なります。自動処理である場合も、またツールプロバイダに連絡が必要な場合もあります。

Moodleからの安全な通信を必要とせず、評定レポートのような追加的なサービスを提供しない場合、コンシューマーキーは必要ではありません。';
$string['resourcekey_help'] = '設定処理の一環として提供されるため、事前に設定されたツールでは、ここでコンシューマーキーを入力する必要はありません。

未設定のツールプロバイダへのリンクを作成する場合、このフィールドには設定値を入力する必要があります。このコース内でツールプロバイダが1回以上使用される場合、コースツール設定を追加することは良い考え方です。

コンシューマーキーは、ツールへの認証アクセスに使用されるユーザ名だと考えることができます。ユーザによるMoodleサイトからのツール起動を一意的に識別するため、ツールプロバイダが使用することができます。

コンシューマーキーはツールプロバイダから提供される必要があります。コンシューマーキーの取得方法は、ツールプロバイダ間で異なります。自動処理である場合も、またツールプロバイダに連絡が必要な場合もあります。

Moodleからの安全な通信を必要とせず、評定レポートのような追加的なサービスを提供しない場合、コンシューマーキーは必要ではありません。';
$string['resourceurl'] = 'リソースURL';
$string['return_to_course'] = 'コースに戻るには、<a href="{$a->link}" target="_top">ここをクリックしてください</a> 。';
$string['saveallfeedback'] = '私のフィードバックすべてを保存する';
$string['secure_icon_url'] = 'セキュアアイコンURL';
$string['secure_icon_url_help'] = 'アイコンURLに似ていますが、ユーザがSSLを通してMoodleに安全にアクセスする場合に使用されます。このフィールドの主目的はユーザによるページアクセス時の警告表示を防ぐことにあります。しかし、安全ではないイメージの表示をリクエストすることになります。';
$string['secure_launch_url'] = 'セキュア起動URL';
$string['secure_launch_url_help'] = '起動URLに似ていますが、起動URLの代わりに高度なセキュリティが要求されます。MoodleサイトがSSL経由でアクセスされた場合、またはツール設定にて常にSSLから起動するよう指定されている場合、起動URLの代わりにセキュア起動URLが使用されます。

SSL経由での起動を強制するため、起動URLにhttpsアドレスを設定することもできます。また、このフィールドは空白のままにすることもできます。';
$string['send'] = '送信';
$string['setupoptions'] = 'セットアップオプション';
$string['share_email'] = 'ランチャーEメールをツールと共有する';
$string['share_email_admin'] = 'ランチャーEメールをツールと共有する';
$string['share_email_admin_help'] = 'ツールを起動したユーザのメールアドレスをツールプロバイダと共有するかどうか指定してください。ツールプロバイダはユーザがUI内のユーザと同一であることを確認するため、またはツール内の操作に基づいてメール送信するため、起動者のメールアドレスを必要とします。';
$string['share_email_help'] = 'ツールを起動したユーザのメールアドレスをツールプロバイダと共有するかどうか指定してください。ツールプロバイダはユーザがUI内のユーザと同一であることを確認するため、またはツール内の操作に基づいてメール送信するため、起動者のメールアドレスを必要とします。

この設定はツール設定内でオーバーライドできることに留意してください。';
$string['share_name'] = 'ランチャー名をツールと共有する';
$string['share_name_admin'] = 'ランチャー名をツールと共有する';
$string['share_name_admin_help'] = 'ツールを起動したユーザのフルネームをツールプロバイダと共有するかどうか指定してください。ツール内に有益な情報を表示するため、ツールプロバイダは起動者の名前を必要とします。';
$string['share_name_help'] = 'ツールを起動したユーザのフルネームをツールプロバイダと共有するかどうか指定してください。ツール内に有益な情報を表示するため、ツールプロバイダは起動者の名前を必要とします。

この設定はツール設定内でオーバーライドできることに留意してください。';
$string['share_roster'] = 'ツールに対して、このコースの参加者一覧へのアクセスを許可する';
$string['share_roster_admin'] = 'ツールがコース一覧にアクセスできる';
$string['share_roster_admin_help'] = 'このツールタイプが起動された場合、コース内の受講ユーザ一覧にツールがアクセスできるかどうか指定してください。';
$string['share_roster_help'] = 'コース内の受講ユーザ一覧にツールがアクセスできるかどうか指定してください。

この設定はツール設定内でオーバーライドできることに留意してください。';
$string['show_in_course'] = 'ツールインスタンスの作成時にツールタイプを表示する';
$string['show_in_course_help'] = 'このオプションを有効にした場合、教師によるコース内での外部ツール設定時に、「外部ツールタイプ」ドロップダウンメニューが表示されます。

多くの場合、このオプションを選択する必要はありません。教師は起動URLをベースにツールベースURLを合致させるため、このツールを使用することができます。これは推奨される方法です。

このオプションが選択されるべき唯一のケースは、ツール設定がシングルサインオンを意図している場合のみです。

例えば、ツールプロバイダへの起動すべてがユーザを特定のリソースにアクセスさせるのではなく、ランディングページに移動させる場合です。';
$string['size'] = 'サイズパラメータ';
$string['submission'] = '送信';
$string['submissions'] = '提出';
$string['submissionsfor'] = '{$a} の提出';
$string['subplugintype_ltisource'] = 'LTIソース';
$string['subplugintype_ltisource_plural'] = 'LTIソース';
$string['toggle_debug_data'] = 'デバッグデータに切り替える';
$string['tool_config_not_found'] = 'このURLではツール設定が見つかりませんでした。';
$string['tool_settings'] = 'ツール設定';
$string['toolsetup'] = '外部ツール設定';
$string['toolurl'] = 'ツールベースURL';
$string['toolurl_help'] = 'ツールベースURLは正しいツール設定をツール起動URLと合致させるために使用されます。URLの接頭辞「http(s)」は任意です。

加えて、外部ツールインスタンスの起動URLが指定されていない場合、ベースURLが使用されます。

例えば、ベースURL *tool.com* は以下と合致します:

* tool.com
* tool.com/quizzes
* tool.com/quizzes/quiz.php?id=10
* www.tool.com/quizzes

ベースURL  *www.tool.com/quizzes* は以下と合致します:

* www.tool.com/quizzes
* tool.com/quizzes
* tool.com/quizzes/take.php?id=10

ベースURL  *quiz.tool.com* は以下と合致します:
* quiz.tool.com
* quiz.tool.com/take.php?id=10

2つの異なるツール設定が同じドメインに対して割り当てられている場合、最も適切に合致した設定が使用されます。';
$string['typename'] = 'ツール名';
$string['typename_help'] = 'ツール名はMoodle内のツールプロバイダを識別するために使用されます。ここで入力された名称は、コース内で外部ツールを追加するときに教師に表示されます。';
$string['types'] = 'タイプ';
$string['update'] = '更新';
$string['using_tool_configuration'] = 'ツール設定を使用する:';
$string['validurl'] = '有効なURLは http(s):// で開始してください。';
$string['viewsubmissions'] = '提出および評定画面を表示する';
