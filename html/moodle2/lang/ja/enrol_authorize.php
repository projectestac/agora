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
 * Strings for component 'enrol_authorize', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'どのタイプのクレジットカードを受け付けますか?';
$string['adminaccepts'] = '許可する支払方法およびタイプを選択してください。';
$string['adminauthorizeccapture'] = 'オーダーレビュー&amp;スケジュールキャプチャ設定';
$string['adminauthorizeemail'] = 'メール送信設定';
$string['adminauthorizesettings'] = 'Authorize.Netマーチャントアカウント設定';
$string['adminauthorizewide'] = '一般設定';
$string['adminconfighttps'] = 'このプラグインを使用するには、管理 >> セキュリティ >> HTTPセキュリティで <a href="{$a->url}">「ログインにHTTPSを使用する」をチェック</a>していることを確認してください。';
$string['adminconfighttpsgo'] = 'このプラグインを設定するには、<a href="{$a->url}">セキュアページ</a>に移動してください。';
$string['admincronsetup'] = 'cron.phpメンテナンススクリプトが少なくとも24時間稼動していません。<br />あなたがスケジュールキャプチャ機能を使用したい場合、cronを有効にする必要があります。<br />Authorize.netプラグインを<b>有効</b>および適切に<b>cronを設定</b>または <b>an_review</b> のチェックを外してください。<br />スケジュールキャプチャを無効にした場合、あなたが30日以内にトランザクションを検査しないことで、トランザクションはキャンセルされます。<br />30日以内に<b>手動で</b>支払いを受領/拒否したい場合、<b>an_review</b>をチェックして、<br /><b>an_capture_day</b>フィールドにゼロを入力してください。';
$string['adminemailexpiredsort'] = '保留オーダー失効時に教師にメール通知する場合、どれが重要ですか?';
$string['adminemailexpiredsortcount'] = 'オーダー数';
$string['adminemailexpiredsortsum'] = '合計金額';
$string['adminemailexpsetting'] = '(0 = メール送信を停止する、デフォルト = 2、最大 = 5)<br />(メール送信のための手動キャプチャ設定: cron = 有効、an_review = チェック、an_capture_day = 0、an_emailexpired = 1-5)';
$string['adminhelpcapturetitle'] = 'スケジュールキャプチャ';
$string['adminhelpreviewtitle'] = 'オーダーレビュー';
$string['adminneworder'] = '新しい保留オーダーが入りました:

注文ID: {$a->orderid}
トランザクションID: {$a->transid}
ユーザ: {$a->user}
コース: {$a->course}
金額: {$a->amount}

スケジュールキャプチャ有効?: {$a->acstatus}

スケジュールキャプチャが有効にされている場合、クレジットカード情報は {$a->captureon} 日で取得され、学生がコースに受講登録されます。そうでない場合、{$a->expireon} 日で期限切れとなり、この日以降はカード情報の取得ができなくなります。

下記のリンクで、学生がコース登録するための支払いをすぐに受領/拒否することもできます:
{$a->url}';
$string['adminnewordersubject'] = '{$a->course}; 新しい保留オーダー: {$a->orderid}';
$string['adminpendingorders'] = 'あなたはスケジュールキャプチャ機能を停止しています。<br />あなたがチェックしない場合、ステータス「認証完了 / キャプチャ保留」の合計 {$a->count} 件のトランザクションがキャンセルされます。<br />支払いを受領/拒否するには <a href=\'{$a->url}\'>支払い管理</a>ページにアクセスしてください。';
$string['adminteachermanagepay'] = '教師がコースの支払いを管理できる。';
$string['allpendingorders'] = 'すべての保留オーダー';
$string['amount'] = '金額';
$string['anauthcode'] = '承認番号を取得する';
$string['anauthcodedesc'] = 'ユーザのクレジットカード番号を直接インターネットより取得できない場合、顧客の取引銀行より電話にて承認番号を取得します。';
$string['anavs'] = '住所照合システム';
$string['anavsdesc'] = 'あなたのauthorize.Netにて住所照合システム (Address Verification System - AVS) を有効化している場合、このオプションを有効にしてください。このシステムではユーザの支払いフォーム入力時、市町村、都道府県、国および郵便番号等の住所フィールドへの入力を要求します。';
$string['ancaptureday'] = 'キャプチャ日';
$string['ancapturedaydesc'] = '指定された日数以内に教師または管理者がオーダーを審査しない場合、自動的にクレジットカードをキャプチャします。cronを有効にする必要があります。<br />(ゼロ日はスケジュールキャプチャが無効にされることを意味します。また、教師または管理者が手動でオーダーを審査する必要があります。あなたがスケジュールキャプチャを無効にした場合、または30日以内に審査しない場合、トランザクションはキャンセルされます。)';
$string['anemailexpired'] = '有効期限切れ通知';
$string['anemailexpireddesc'] = 'これは「手動キャプチャ」の場合に有用です。管理者は未処理オーダーの有効期限が切れる前、指定された日数で通知されます。';
$string['anemailexpiredteacher'] = '有効期限満了通知 - 教師';
$string['anemailexpiredteacherdesc'] = 'あなたが手動キャプチャ (上記参照) を有効にした場合、教師が支払いを管理できるようになります。また、教師には未処理オーダーの有効期限切れに関して通知されます。この設定により、有効期限切れになる未処理オーダー数をコース教師宛にメール送信します。 ';
$string['anlogin'] = 'Authorize.net: ログイン名';
$string['anpassword'] = 'Authorize.net: パスワード';
$string['anreferer'] = 'リファラ';
$string['anrefererdesc'] = 'あなたのauthorize.Netマーチャントアカウントで有効にした場合、URIリファラを定義してください。これによりウェブリクエストに対して「Referer: URL」行を送信します。';
$string['anreview'] = '審査';
$string['anreviewdesc'] = 'クレジットカードが処理される前にオーダーを審査します。';
$string['antestmode'] = 'テストモード';
$string['antestmodedesc'] = 'テストモードのみでトランザクションを実行します (課金は発生しません)。';
$string['antrankey'] = 'Authorize.net: トランザクションキー';
$string['approvedreview'] = '検査承認';
$string['authcaptured'] = '認証完了 / キャプチャ完了';
$string['authcode'] = '認証コード';
$string['authorize:config'] = 'Authorize.Net登録インスタンスを設定する';
$string['authorizedpendingcapture'] = '認証完了 / キャプチャ保留';
$string['authorizeerror'] = 'Authorize.netエラー: {$a}';
$string['authorize:manage'] = '登録ユーザを管理する';
$string['authorize:managepayments'] = '支払いを管理する';
$string['authorize:unenrol'] = 'ユーザをコースから登録解除する';
$string['authorize:unenrolself'] = '私をコースから登録解除する';
$string['authorize:uploadcsv'] = 'CSVファイルをアップロードする';
$string['avsa'] = '住所は合致しますが、郵便番号が合致しません。';
$string['avsb'] = '住所情報が入力されていません。';
$string['avse'] = '住所確認システムエラー';
$string['avsg'] = '米国以外のカード発行銀行';
$string['avsn'] = '住所および郵便番号が合致しません。';
$string['avsp'] = '住所確認システムを使用できません。';
$string['avsr'] = 'リトライ - システム利用不可またはタイムアウト';
$string['avsresult'] = 'AVS結果: {$a}';
$string['avss'] = '発行人よりサービスがサポートされていません。';
$string['avsu'] = '住所情報を利用できません。';
$string['avsw'] = '9桁の郵便番号は合致しますが、住所が合致しません。';
$string['avsx'] = '住所および9桁の郵便番号が合致しません。';
$string['avsy'] = '住所および5桁の郵便番号が合致しません。';
$string['avsz'] = '5桁の郵便番号は合致しますが、住所が合致しません。';
$string['canbecredit'] = '{$a->upto} に返金可能';
$string['cancelled'] = 'キャンセル完了';
$string['capture'] = 'キャプチャ';
$string['capturedpendingsettle'] = '認証完了 / 確定保留';
$string['capturedsettled'] = '認証完了 / 確定';
$string['captureyes'] = 'クレジットカード情報が取得され、学生がコースに受講登録されます。本当によろしいですか?';
$string['cccity'] = '市町村';
$string['ccexpire'] = '有効期限';
$string['ccexpired'] = 'クレジットカードの期限が切れています。';
$string['ccinvalid'] = 'クレジットカードが正しくありません。';
$string['cclastfour'] = 'クレジットカード下4桁';
$string['ccno'] = 'クレジットカード番号';
$string['ccstate'] = '都道府県';
$string['cctype'] = 'クレジットカードタイプ';
$string['ccvv'] = 'カード照合';
$string['ccvvhelp'] = 'カードの裏面 (3桁の数字) をご覧ください。';
$string['choosemethod'] = 'あなたがコース登録キーを知っている場合、そのキーを入力してください。<br />そうでない場合、このコースに受講料を支払う必要があります。';
$string['chooseone'] = '次の2つのフィールドの1つまたは両方に入力してください。パスワードは表示されません。';
$string['cost'] = 'コスト';
$string['costdefaultdesc'] = 'このデフォルト費用を使用するには、<strong>コース設定でコース費用フィールドに -1 を設定</strong>してください。';
$string['currency'] = '通貨';
$string['cutofftime'] = '遮断時間';
$string['cutofftimedesc'] = '	
トランザクションの遮断時間です。確定するため、何時に最終トランザクションを取得しますか?';
$string['dataentered'] = 'データ入力済み';
$string['delete'] = '無効化';
$string['description'] = 'Authorize.netモジュールにより、あなたは支払いプロバイダを通して受講料支払いが必要なコースを作成することができます。コース費用を設定するには、(1) サイト全体のデフォルトとしてのサイト費用 または (2) あなたがそれぞれのコースで個々に設定できるコース費用 の2つの方法があります。コース費用はサイト費用をオーバーライドします。';
$string['echeckabacode'] = '銀行ABA番号';
$string['echeckaccnum'] = '銀行口座番号';
$string['echeckacctype'] = '銀行口座種別';
$string['echeckbankname'] = '銀行名';
$string['echeckbusinesschecking'] = '法人当座口座';
$string['echeckchecking'] = '当座口座';
$string['echeckfirslasttname'] = '銀行口座名義';
$string['echecksavings'] = '普通口座';
$string['enrolenddate'] = '終了日';
$string['enrolenddaterror'] = '登録終了日を開始日より早くすることはできません。';
$string['enrolname'] = 'Authorize.netペイメントゲートウェイ';
$string['enrolperiod'] = '登録期間';
$string['enrolstartdate'] = '開始日';
$string['expired'] = '期限切れ';
$string['expiremonth'] = '有効期限月';
$string['expireyear'] = '有効期限年';
$string['firstnameoncard'] = 'カードの名';
$string['haveauthcode'] = '私はすでに認証コードを持っています';
$string['howmuch'] = 'おいくらですか?';
$string['httpsrequired'] = '申し訳ございません、あなたのリクエストは現在処理することができません。このサイトの設定は正常に行われませんでした。
<br /><br />ブラウザの下部に黄色の鍵マークが表示されない場合、あなたのクレジットカード番号を入力しないでください。これはクライアントとサーバ間で送信されるすべてのデータが暗号化されることを意味します。暗号化により、2台のコンピュータ間のトランザクション情報は保護され、あなたのクレジットカード番号がインターネット上で盗まれることはありません。';
$string['invalidaba'] = 'ABA番号が正しくありません。';
$string['invalidaccnum'] = '口座番号が正しくありません。';
$string['invalidacctype'] = '口座種別が正しくありません。';
$string['isbusinesschecking'] = '法人クレジットカードですか?';
$string['lastnameoncard'] = 'カードの姓';
$string['logindesc'] = 'このオプションは「ON」にする必要があります。<br /><br />管理 >> 詳細設定 >> セキュリティ で <a href="{$a->url}">loginhttps が「Yes」になっていること</a>を確認してください。 <br /><br />この設定を「Yes」にすることで、Moodleはログインおよび支払いページでセキュアhttps接続を使用します。';
$string['logininfo'] = 'あなたのAuthorize.Netアカウントを設定する場合、ログイン名は必須入力項目となります。また、あなたは適切な入力欄にトランザクションキー<strong>または</strong> パスワードを入力する必要があります。さらなるセキュリティ対策のため、トランザクションキーの入力をお勧めします。';
$string['messageprovider:authorize_enrolment'] = 'Authorize.Net登録メッセージ';
$string['methodcc'] = 'クレジットカード';
$string['methodccdesc'] = '以下でクレジットカードおよび利用可能なタイプを選択してください。';
$string['methodecheck'] = 'eCheck (ACH)';
$string['methodecheckdesc'] = '以下でeCheckおよび利用可能なタイプを選択してください。';
$string['missingaba'] = 'ABA番号を入力してください。';
$string['missingaddress'] = '住所を入力してください。';
$string['missingbankname'] = '銀行名を入力してください。';
$string['missingcc'] = 'カード番号を入力してください。';
$string['missingccauthcode'] = '認証コードを入力してください。';
$string['missingccexpiremonth'] = '有効期限月が入力されていません。';
$string['missingccexpireyear'] = '有効期限年が入力されていません。';
$string['missingcctype'] = 'カードタイプを入力してください。';
$string['missingcvv'] = '郵便番号を入力してください。';
$string['missingzip'] = 'カード名義を入力してください。';
$string['mypaymentsonly'] = '私の支払いのみ表示する';
$string['nameoncard'] = 'クレジットカード名義';
$string['new'] = 'New';
$string['nocost'] = 'このコースへのAuthorize.Netを経由した登録にコストが関連付けられていません!';
$string['noreturns'] = '返金なし!';
$string['notsettled'] = '未確定';
$string['orderdetails'] = '注文詳細';
$string['orderid'] = 'オーダーID';
$string['paymentmanagement'] = '支払い管理';
$string['paymentmethod'] = '支払方法';
$string['paymentpending'] = 'このコースに関するあなたの支払いは保留中です。注文番号は、 {$a->orderid} です。詳細は、<a href=\'{$a->url}\'>注文詳細</a>をご覧ください。';
$string['pendingecheckemail'] = '現在 {$a->count} の保留echeckがあります。ユーザを登録するには、CSVファイルをアップロードしてください。

次のリンクをクリックして、ヘルプファイルをご覧ください:
{$a->url}';
$string['pendingechecksubject'] = '{$a->course}: 保留eCheck({$a->count})';
$string['pendingordersemail'] = '支払いを受領しない場合、トランザクション {$a->pending} は、{$a->days} 日で期限が切れます。

あなたがスケジュールキャプチャを有効にしていないため、これは警告メッセージです。手動で支払いを受けつけるか、拒否する必要があります。

保留の支払いを受領/拒否するには次のページへ:
{$a->url}

スケジュールキャプチャを有効にすると、あなたは警告メッセージを受信しなくなります。設定するには次のページへ:
{$a->enrolurl}';
$string['pendingordersemailteacher'] = 'あなたが支払いを {$a->days} 日以内に受領しない場合、コース「 {$a->course} 」の {$a->pending} トランザクション ({$a->currency} {$a->sumcost}) は失効します。

管理者がスケジュールキャプチャを有効にしていないため、あなたは支払いを手動で受領または拒否する必要があります。';
$string['pendingorderssubject'] = '警告: {$a->pending} 件のオーダーが {$a->days} 日で失効します。';
$string['pluginname'] = 'Authorize.Net';
$string['reason11'] = '重複トランザクションが送信されました。';
$string['reason13'] = 'マーチャントログインIDが無効またはアカウントがアクティブではありません。';
$string['reason16'] = 'トランザクションが見つかりませんでした。';
$string['reason17'] = 'マーチャントは、このタイプのクレジットカードを受け付けません。';
$string['reason245'] = '支払いフォーム経由のペイメントゲートウェイは、このeCheckタイプで許可されていません。';
$string['reason246'] = 'このeCheckタイプは許可されていません。';
$string['reason27'] = 'AVSのトランザクション結果が一致しません。提供された住所がカード所有者の住所と合致しません。';
$string['reason28'] = 'マーチャントは、このタイプのクレジットカードを受け付けません。';
$string['reason30'] = 'プロセッサの設定が正しくありません。マーチャントサービスプロバイダにご連絡ください。';
$string['reason39'] = '提供された通貨コードが正しくないか、サポートされていないか、マーチャントに許可されていないか、為替レートがありません。';
$string['reason43'] = 'プロセッサでマーチャントが正しく設定されていません。マーチャントサービスプロバイダにご連絡ください。';
$string['reason44'] = 'このトランザクションは拒否されました。カード番号フィルタエラー!';
$string['reason45'] = 'このトランザクションは拒否されました。カード番号 / AVSフィルタエラー!';
$string['reason47'] = '決済にリクエストされた金額が、認証された最初の金額よりも大きくないかもしれません。';
$string['reason5'] = '有効な金額を入力してください。';
$string['reason50'] = 'このトランザクションは決済処理中です。払い戻しはできません。';
$string['reason51'] = 'このトランザクションに関するすべてのクレジットの合計が、最初のトランザクションの金額よりも多くなっています。';
$string['reason54'] = '参照トランザクションはクレジット発行のクライテリアに適合しません。';
$string['reason55'] = '参照トランザクションに対するクレジット合計は、最初のクレジット金額を超えます。';
$string['reason56'] = 'このマーチャントアカウントでは、eCheck (ACH) トランザクションのみ受け入れます。クレジットカードトランザクションは、受け入れられません。';
$string['refund'] = '払い戻し';
$string['refunded'] = '払い戻し完了';
$string['returns'] = '返金';
$string['reviewfailed'] = '検査失敗';
$string['reviewnotify'] = 'あなたの支払いが確認されました。数日中に先生からメールが送信されますのでお待ちください。';
$string['sendpaymentbutton'] = '支払いの送信';
$string['settled'] = '確定済み';
$string['settlementdate'] = '確定年月日';
$string['shopper'] = '顧客';
$string['status'] = 'Autorize.net登録を許可する';
$string['subvoidyes'] = '返金済みトランザクション ({$a->transid}) はキャンセルされ、{$a->amount} があなたの口座に振り込まれます。本当によろしいですか?';
$string['tested'] = 'テスト済み';
$string['testmode'] = '[ テストモード ]';
$string['testwarning'] = '「キャプチャー/取り消し/払い戻し」はテストモードで動作しているようです。レコードは、データベースで更新または追加されませんでした。';
$string['transid'] = 'トランザクションID';
$string['underreview'] = '検査中';
$string['unenrolselfconfirm'] = '本当にあなた自身をコース「 {$a} 」から登録解除してもよろしいですか?';
$string['unenrolstudent'] = '学生を登録抹消しますか?';
$string['uploadcsv'] = 'CSVファイルをアップロードする';
$string['usingccmethod'] = '<a href="{$a->url}"><strong>クレジットカード</strong></a>を使用して登録する。';
$string['usingecheckmethod'] = '<a href="{$a->url}"><strong>eCheck</strong></a>を使用して登録する。';
$string['verifyaccount'] = 'あなたのauthorize.Netマーチャントアカウントを確認する';
$string['verifyaccountresult'] = '<b>確認結果:</b> {$a}';
$string['void'] = '取り消し';
$string['voidyes'] = 'トランザクションがキャンセルされます。本当によろしいですか?';
$string['welcometocoursesemail'] = '{$a->name} 様

お支払いありがとうございます。あなたは下記コースに受講登録されました:

{$a->courses}

下記で支払い状況の閲覧およびあなたのプロファイルを編集することができます:
{$a->paymenturl}
{$a->profileurl}';
$string['youcantdo'] = 'あなたは、次の処理を実行できません: {$a->action}';
$string['zipcode'] = '郵便番号';
