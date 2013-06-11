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
 * Strings for component 'report_security', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>ウェブサーバからファイルが修正されないよう、インストール後、config.phpのファイルパーミッションを変更することをお勧めします。この方法は、サーバのセキュリティを著しく向上させるものではありませんが、一般的なセキュリティ上の弱点 (exploits) をスローダウンしたり、制限することはできます。</p>';
$string['check_configrw_name'] = '書き込み可能なconfig.php';
$string['check_configrw_ok'] = 'PHPスクリプトは、config.phpを修正することができません。';
$string['check_configrw_warning'] = 'PHPスクリプトは、config.phpを修正することができます。';
$string['check_cookiesecure_details'] = 'p>あなたが、https通信を有効にした場合、セキュアクッキーも有効にすることをお勧めします。また、httpからhttpsへのパーマネントリダイレクトも追加してください。</p>';
$string['check_cookiesecure_error'] = 'セキュアクッキーを有効にしてください。';
$string['check_cookiesecure_name'] = 'セキュアクッキー';
$string['check_cookiesecure_ok'] = 'セキュアクッキーは、有効にされています。';
$string['check_defaultuserrole_details'] = '<p>すべてのログインユーザには、デフォルトのユーザロールのケイパビリティが割り当てられます。このロールにリスクのあるケイパビリティが許可されているかどうか確認してください。</p>
<p>デフォルトのユーザロールでサポートされているレガシータイプのロールは「認証済みユーザ」のみです。コース閲覧ケイパビリティは、有効にしないでください。</p>';
$string['check_defaultuserrole_error'] = 'デフォルトユーザロール「 {$a} 」は、正しくない定義です!';
$string['check_defaultuserrole_name'] = 'すべてのユーザのデフォルトロール';
$string['check_defaultuserrole_notset'] = 'デフォルトロールが設定されていません。';
$string['check_defaultuserrole_ok'] = 'すべてのユーザのデフォルトロール定義は、OKです。';
$string['check_displayerrors_details'] = '<p>いくつかのエラーメッセージは、あなたのサーバに関する機密情報を漏洩する可能性があるため、PHP設定 <code>display_errors</code>の有効化は、実稼動サイトではお勧めできません。</p>';
$string['check_displayerrors_error'] = 'エラー表示のPHP設定が有効にされています。この設置を無効にすることをお勧めします。';
$string['check_displayerrors_name'] = 'PHPエラーを表示する';
$string['check_displayerrors_ok'] = 'PHPエラーの表示は無効にされています。';
$string['check_emailchangeconfirmation_details'] = '<p>ユーザがプロファイルでメールアドレスを変更する場合、メール確認ステップが推奨されています。無効にされている場合、スパム送信者がサーバをスパム送信に悪用する恐れがあります。</p>
<p>認証プラグインからロックされたメールアドレスフィールドに関して、この可能性を考える必要はありません。</p>';
$string['check_emailchangeconfirmation_error'] = 'ユーザは、どのようなメールアドレスでも入力することができます。';
$string['check_emailchangeconfirmation_info'] = 'ユーザは、許可されたドメインからのみメールアドレスを入力することができます。';
$string['check_emailchangeconfirmation_name'] = 'メール変更確認';
$string['check_emailchangeconfirmation_ok'] = 'ユーザプロファイル内のメールアドレス変更は確認されるべきです。';
$string['check_embed_details'] = '<p>無制限のオブジェクト埋め込みは、非常に危険です - すべての登録ユーザは、他のサーバに対してXSSアタックを開始することができます。この設定は、実稼動サーバで無効にされるべきです。</p>';
$string['check_embed_error'] = '無制限のオブジェクト埋め込みが許可されています - これは大部分のサーバで非常に危険な設定です。';
$string['check_embed_name'] = 'EMBEDおよびOBJECTを許可する';
$string['check_embed_ok'] = '無制限のオブジェクト埋め込みは許可されていません。';
$string['check_frontpagerole_details'] = '<p>すべての登録ユーザのフロントページ活動には、デフォルトのフロントページロールのケイパビリティが割り当てられます。このロールにリスクのあるケイパビリティが許可されているかどうか確認してください。</p>
<p>この目的のため、特別なロールを作成して、レガシータイプのロールは使用しないことをお勧めします。</p>';
$string['check_frontpagerole_error'] = '正しくないフロントページロール「 {$a} 」の割り当てが検出されました!';
$string['check_frontpagerole_name'] = 'フロントページロール';
$string['check_frontpagerole_notset'] = 'フロントページロールが設定されていません。';
$string['check_frontpagerole_ok'] = 'フロントページロール定義はOKです。';
$string['check_globals_details'] = '<p>Register globalsは、極めて危険なPHP設定だと考えられています。</p>
<p>PHP設定において、<code>register_globals=off</code>が設定されるべきです。この設定は、あなたの<code>php.ini</code>、Apache/IIS設定または<code>.htaccess</code>ファイルを編集することでコントロールされます。</p>';
$string['check_globals_error'] = 'Register globalsは無効すべきです。すぐにPHP設定を修正してください!';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Register globalsが無効にされています。';
$string['check_google_details'] = '<p>Googleに公開する設定では、サーチエンジンがコースにゲストとしてログインできるようにします。ゲストログインが許可されていない場合、この設定の有効化は意味を持ちません。</p>';
$string['check_google_error'] = 'サーチエンジンによるゲストアクセスは許可されていますが、ゲストアクセスは無効にされています。';
$string['check_google_info'] = 'サーチエンジンは、ゲストとして入ることができます。';
$string['check_google_name'] = 'Googleに公開する';
$string['check_google_ok'] = 'サーチエンジンによるアクセスは有効にされていません。';
$string['check_guestrole_details'] = '<p>ゲストロールはゲストに使用され、ログインユーザおよび一時的なゲストコースアクセスには使用されません。このロールにリスクのあるケイパビリティが許可されているかどうか確認してください。</p>
<p>ゲストロールでサポートされているレガシータイプのロールは「ゲスト」のみです</p>';
$string['check_guestrole_error'] = 'ゲストロール「 {$a} 」の定義は正しくありません!';
$string['check_guestrole_name'] = 'ゲストロール';
$string['check_guestrole_notset'] = 'ゲストロールが設定されていません。';
$string['check_guestrole_ok'] = 'ゲストロール定義はOKです。';
$string['check_mediafilterswf_details'] = '<p>自動swf埋め込みは、非常に危険です - すべての登録ユーザは、他のサーバに対してXSSアタックを開始することができます。この設定は、実稼動サーバで無効にされるべきです。</p>';
$string['check_mediafilterswf_error'] = 'Flashメディアフィルタが許可されています - これは大部分のサーバで非常に危険な設定です。';
$string['check_mediafilterswf_name'] = '.swfメディアフィルタを有効にする';
$string['check_mediafilterswf_ok'] = 'Flashメディアフィルタが有効にされていません。';
$string['check_noauth_details'] = '<p>「認証なし」プラグインは、実稼動サイト向けではありません。このサイトが開発テストサイトではない限り、このプラグインを無効にしてください。</p>';
$string['check_noauth_error'] = '「認証なし」プラグインは、実稼動サイトでは使用できません。';
$string['check_noauth_name'] = '認証なし';
$string['check_noauth_ok'] = '無効にされた認証プラグインはありません。';
$string['check_openprofiles_details'] = '<p>ユーザプロファイルを公開することで、スパム送信者が不正利用することができます。「プロファイル閲覧時にユーザのログインを強制する」または「ユーザのログインを強制する」を有効にすることをお勧めします。</p>';
$string['check_openprofiles_error'] = 'ログインなしで誰でもユーザプロファイルを閲覧できます。';
$string['check_openprofiles_name'] = 'ユーザプロファイルを公開する';
$string['check_openprofiles_ok'] = 'ユーザプロファイルを閲覧するにはログインが必要です。';
$string['check_passwordpolicy_details'] = '<p>非常に多くの場合、不正なアクセスを引き起こす可能性がありますので、パスワードポリシーの設定をお勧めします。ユーザがパスワードを記憶できなかったり、忘れたり、書き留めることがありますので、必要条件を厳格にしすぎないでください。</p>';
$string['check_passwordpolicy_error'] = 'パスワードポリシーが設定されていません。';
$string['check_passwordpolicy_name'] = 'パスワードポリシー';
$string['check_passwordpolicy_ok'] = 'パスワードポリシーが有効にされています。';
$string['check_passwordsaltmain_details'] = '<p>パスワードSALTを設定することにより、パスワード盗難のリスクを大幅に減らすことができます。</p>
<p>パスワードSALTを設定するには、あなたのconfig.phpファイルに次の行を追加してください: </p>
<code>$CFG->passwordsaltmain = \'ここに沢山の半角文字を使って、ランダムな文字列を記述してください\';</code>
<p>ランダム文字列は、数字および他の文字を混ぜた形で記述してください。ストリング長は、少なくとも40文字を推奨します。</p>
<p>あなたがパスワードSALTを変更したい場合、<a href="http://docs.moodle.org/en/Password_salting" target="_blank">パスワードSALTドキュメンテーション</a>をご覧ください。一旦設定した場合、あなたのパスワードSALTを削除しないでください。パスワードSALTを削除した場合、あなたのサイトにログインできないようになります! </p>';
$string['check_passwordsaltmain_name'] = 'パスワードSALT';
$string['check_passwordsaltmain_ok'] = 'パスワードSALTは、OKです。';
$string['check_passwordsaltmain_warning'] = 'パスワードSALTは、設定されていません。';
$string['check_passwordsaltmain_weak'] = 'パスワードSALTの強度が不足しています。';
$string['check_riskadmin_detailsok'] = '<p>以下の管理者リストを確認してください:</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>以下のシステム管理者リストを確認してください。:</p>{$a->admins}
<p>システムコンテクストのみへの管理者ロール割り当てをお勧めします。以下のユーザは、サポートされない管理者ロールが他のコンテクスト内で割り当てられています:</p>{$a->unsupported}';
$string['check_riskadmin_name'] = '管理者';
$string['check_riskadmin_ok'] = '{$a} 名のサーバ管理者が登録されています。';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) ロール割り当てのレビュー</a>';
$string['check_riskadmin_warning'] = '{$a->admincount} 名のサーバ管理者および {$a->unsupcount} 名のサポートされない管理者ロールの割り当てが見つかりました。';
$string['check_riskbackup_detailsok'] = 'ユーザデータのバックアップを明確に許可しているロールはありません。しかし、「doanything」ケイパビリティを持った管理者は、まだユーザデータをバックアップできることに留意してください。';
$string['check_riskbackup_details_overriddenroles'] = '<p>これらのアクティブなオーバーライドは、ユーザに対して、バックアップ内にユーザデータを含むことができる能力を与えます。このパーミッションが本当に必要かどうか確認してください。</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>現在、以下のシステムロールは、ユーザに対して、バックアップ内にユーザデータを含むことを許可しています。このパーミッションが本当に必要かどうか確認してください。</p> {$a}';
$string['check_riskbackup_details_users'] = '<p>上記のロールまたはローカルオーバーライドのため、以下のユーザアカウントは、現在コースに受講登録しているユーザの個人情報を含むバックアップを作成できるパーミッションを持っています。これらのユーザが、(a)信用されて、(b)強度の高いパスワードで守られていることを確認してください:</p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->contextname} 内の {$a->name}</a>';
$string['check_riskbackup_editrole'] = '<a href="{$a->url}">{$a->name}</a>';
$string['check_riskbackup_name'] = 'ユーザデータのバックアップ';
$string['check_riskbackup_ok'] = 'ユーザデータのバックアップを明確に許可しているロールはありません。';
$string['check_riskbackup_unassign'] = '<a href="{$a->url}">{$a->contextname} 内の {$a->fullname} ({$a->email})</a>';
$string['check_riskbackup_warning'] = 'ユーザデータをバックアップすることができる {$a->rolecount} 件のロール、{$a->overridecount} 件のオーバーライドおよび {$a->usercount} 名のユーザが見つかりました。';
$string['check_riskxss_details'] = '<p>RISK_XSSは、信頼されるユーザのみ使用できる、すべての危険なケイパビリティを意味します。</p>
<p>以下のユーザ一覧を閲覧して、このサーバにおいて、あなたがこれらのユーザを完全に信頼できることを確認してください:</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'XSS信頼ユーザ';
$string['check_riskxss_warning'] = 'RISK_XSS - {$a} 名のユーザが信頼されています。';
$string['check_unsecuredataroot_details'] = '<p>datarootディレクトリは、ウェブからアクセスできないようにしてください。ウェブからアクセスできないディレクトリを使用する最良の方法は、パブリックウェブディレクトリ外のディレクトリを使用することです。</p>
<p>あなたがディレクトリを移動した場合、それに応じて<code>config.php</code>の<code>$CFG->dataroot</code>設定を変更してください。</p>';
$string['check_unsecuredataroot_error'] = 'あなたのdatarootディレクトリ <code>{$a}</code> は、正しくない場所に配置され、ウェブにさらされた状態です!';
$string['check_unsecuredataroot_name'] = '安全ではないdataroot';
$string['check_unsecuredataroot_ok'] = 'datarootディレクトリはウェブからアクセスできないようにしてください。';
$string['check_unsecuredataroot_warning'] = 'あなたのdatarootディレクトリ <code>{$a}</code> は、正しくない場所に配置され、ウェブにさらされた状態です。';
$string['configuration'] = '設定';
$string['description'] = '説明';
$string['details'] = '詳細';
$string['issue'] = '問題';
$string['pluginname'] = 'セキュリティレビュー';
$string['security:view'] = 'セキュリティレポートを表示する';
$string['status'] = 'ステータス';
$string['statuscritical'] = 'クリティカル';
$string['statusinfo'] = '情報';
$string['statusok'] = 'OK';
$string['statusserious'] = 'シリアス';
$string['statuswarning'] = '警告';
$string['timewarning'] = 'データ処理には長時間を要します、しばらくお待ちください ...';
