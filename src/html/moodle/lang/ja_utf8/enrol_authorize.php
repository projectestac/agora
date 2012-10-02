<?PHP // $Id$ 
      // enrol_authorize.php - created with Moodle 2.0 dev (Build: 20100126) (2010012500)


$string['adminacceptccs'] = 'どのタイプのクレジットカードを受け付けますか?';
$string['adminaccepts'] = '許可する支払方法およびタイプを選択してください。';
$string['adminauthcode'] = 'ユーザのクレジットカードをインターネット経由で直接キャプチャできない場合、顧客の銀行から電話で認証コードを取得してください。';
$string['adminauthorizeccapture'] = 'オーダーレビュー&amp;スケジュールキャプチャ設定';
$string['adminauthorizeemail'] = 'メール送信設定';
$string['adminauthorizesettings'] = 'Authorize.netマーチャントアカウント設定';
$string['adminauthorizewide'] = '一般設定';
$string['adminavs'] = 'あなたのauthorize.netマーチャントアカウントの住所確認システム (AVS: Address Verification System) を有効にした場合、ここをチェックしてください。この設定により、ユーザの支払いフォーム入力時に、市区町村、都道府県、国および郵便番号の入力が求められます。';
$string['adminconfighttps'] = 'このプラグインを使用するには、管理 >> セキュリティ >> HTTPセキュリティで <a href=\"$a->url\">「ログインにHTTPSを使用する」をチェック</a>していることを確認してください。';
$string['adminconfighttpsgo'] = 'このプラグインを設定するには、<a href=\"$a->url\">セキュアページ</a>に移動してください。';
$string['admincronsetup'] = 'cron.phpメンテナンススクリプトが少なくとも24時間稼動していません。<br />スケジュールキャプチャ機能を使用したい場合、cronを有効にする必要があります。<br />Authorize.netプラグインを<b>有効</b>および適切に<b>cronを設定</b>、または <b>an_review</b> のチェックを外してください。<br />スケジュールキャプチャを無効にすると、30日以内にトランザクションを検査しない場合、トランザクションはキャンセルされます。<br />30日以内に<b>手動で</b>支払いを受領/拒否したい場合、<b>an_review</b> をチェックして、<br /><b>an_capture_day</b>フィールドにゼロを入力してください。';
$string['adminemailexpired'] = 'この設定は「マニュアルキャプチャ」に有用です。<b>$a</b> 日で何件の保留オーダーが失効したか管理者に通知します。';
$string['adminemailexpiredsort'] = '保留オーダー失効時に教師にメール通知する場合、どれが重要ですか?';
$string['adminemailexpiredsortcount'] = 'オーダー数';
$string['adminemailexpiredsortsum'] = '合計金額';
$string['adminemailexpiredteacher'] = 'マニュアルキャプチャを有効 (上記参照) にして、教師が支払いを管理できると、教師に保留オーダーの失効をメール通知することもできます。ここでは各コースの教師に、何件の保留オーダーが失効したかメール通知されます。';
$string['adminemailexpsetting'] = '(0 = メール送信を停止する、デフォルト = 2、最大 = 5)<br />(メール送信のためのマニュアルキャプチャ設定: cron = 有効、an_review = チェック、an_capture_day = 0、an_emailexpired = 1-5)';
$string['adminhelpcapturetitle'] = 'スケジュールキャプチャ';
$string['adminhelpreviewtitle'] = 'オーダーレビュー';
$string['adminneworder'] = '新しい保留オーダーが入りました:

注文ID: $a->orderid
トランザクションID: $a->transid
ユーザ: $a->user
コース: $a->course
金額: $a->amount

スケジュールキャプチャ有効?: $a->acstatus

スケジュールキャプチャが有効にされている場合、クレジットカード情報は $a->captureon 日で取得され、学生がコースに受講登録されます。そうでない場合、$a->expireon 日で期限切れとなり、この日以降はカード情報の取得ができなくなります。

下記のリンクで、学生がコース登録するための支払いをすぐに受領/拒否することもできます:
$a->url';
$string['adminnewordersubject'] = '$a->course; 新しい保留オーダー: $a->orderid';
$string['adminpendingorders'] = 'あなたはスケジュールキャプチャ機能を停止しています。<br />あなたがチェックしない場合、ステータス「認証完了 / キャプチャ保留」の合計 $a->count 件のトランザクションがキャンセルされます。<br />支払いを受領/拒否するには、 <a href=\'$a->url\'>支払い管理</a>ページにアクセスしてください。';
$string['adminreview'] = 'クレジットカード処理手続きの前に注文を検査する。';
$string['adminteachermanagepay'] = '教師がコースの支払いを管理できる。';
$string['allpendingorders'] = 'すべての保留オーダー';
$string['amount'] = '金額';
$string['anlogin'] = 'Authorize.net: ログイン名';
$string['anpassword'] = 'Authorize.net: パスワード';
$string['anreferer'] = 'あなたのauthorize.netマーチャントアカウントでこれを設定した場合、URIリファラを定義してください。この定義により、ウェブリクエストに組み込まれた「Referer: URI」行を送信します。';
$string['antestmode'] = 'Authorize.net: テストトランザクション (料金は引き落とされません)';
$string['antrankey'] = 'Authorize.net: トランザクションキー';
$string['approvedreview'] = '検査承認';
$string['authcaptured'] = '認証完了 / キャプチャ完了';
$string['authcode'] = '認証コード';
$string['authorize:managepayments'] = '支払いを管理する';
$string['authorize:uploadcsv'] = 'CSVファイルをアップロードする';
$string['authorizedpendingcapture'] = '認証完了 / キャプチャ保留';
$string['authorizeerror'] = 'Authorize.netエラー: $a';
$string['avsa'] = '住所は合致しますが、郵便番号が合致しません。';
$string['avsb'] = '住所情報が入力されていません。';
$string['avse'] = '住所確認システムエラー';
$string['avsg'] = '米国以外のカード発行銀行';
$string['avsn'] = '住所および郵便番号が合致しません。';
$string['avsp'] = '住所確認システムを使用できません。';
$string['avsr'] = 'リトライ - システム利用不可またはタイムアウト';
$string['avsresult'] = 'AVS結果: $a';
$string['avss'] = '発行人よりサービスがサポートされていません。';
$string['avsu'] = '住所情報を利用できません。';
$string['avsw'] = '9桁の郵便番号は合致しますが、住所が合致しません。';
$string['avsx'] = '住所および9桁の郵便番号が合致しません。';
$string['avsy'] = '住所および5桁の郵便番号が合致しません。';
$string['avsz'] = '5桁の郵便番号は合致しますが、住所が合致しません。';
$string['canbecredit'] = '$a->upto に返金可能';
$string['cancelled'] = 'キャンセル完了';
$string['capture'] = 'キャプチャ';
$string['capturedpendingsettle'] = '認証完了 / 確定保留';
$string['capturedsettled'] = '認証完了 / 確定';
$string['captureyes'] = 'クレジットカード情報が取得され、学生がコースに受講登録されます。本当によろしいですか?';
$string['ccexpire'] = '有効期限';
$string['ccexpired'] = 'クレジットカードの期限が切れています。';
$string['ccinvalid'] = 'クレジットカードが正しくありません。';
$string['cclastfour'] = 'クレジットカード下4桁';
$string['ccno'] = 'クレジットカード番号';
$string['cctype'] = 'クレジットカードタイプ';
$string['ccvv'] = 'CV2';
$string['ccvvhelp'] = 'カードの裏面 (3桁の数字) をご覧ください。';
$string['choosemethod'] = 'あなたがコース登録キーを知っている場合、そのキーを入力してください。<br />そうでない場合、このコースに受講料を支払う必要があります。';
$string['chooseone'] = '次の2つのフィールドの1つまたは両方に入力してください。パスワードは表示されません。';
$string['costdefaultdesc'] = 'このデフォルト費用を使用するには、<strong>コース設定でコース費用フィールドに -1 を設定</strong>してください。';
$string['cutofftime'] = 'トランザクションの遮断時間です。確定するため、何時に最終トランザクションを取得しますか?';
$string['dataentered'] = 'データ入力済み';
$string['delete'] = '無効化';
$string['description'] = 'Authorize.netモジュールでは支払いプロバイダを通して、受講料支払いが必要なコースを作成することができます。コース受講料がゼロの場合、学生には受講登録費用は請求されません。コース費用を設定するには、(1) サイト全体のデフォルトとしてのサイト費用 または (2) 各コースで個々に設定できるコース費用 の2つの方法があります。コース費用はサイト費用をオーバーライドします。<br /><br /><b>メモ:</b> コース設定で登録キーを指定した場合、学生は登録キーを使用した受講登録のオプションも持つことになります。これは支払い要、支払い不要の学生が混在している場合に便利です。';
$string['echeckabacode'] = '銀行ABA番号';
$string['echeckaccnum'] = '銀行口座番号';
$string['echeckacctype'] = '銀行口座種別';
$string['echeckbankname'] = '銀行名';
$string['echeckbusinesschecking'] = '法人当座口座';
$string['echeckchecking'] = '当座口座';
$string['echeckfirslasttname'] = '銀行口座名義';
$string['echecksavings'] = '普通口座';
$string['enrolname'] = 'Authorize.netペイメントゲートウェイ';
$string['expired'] = '期限切れ';
$string['haveauthcode'] = '私はすでに認証コードを持っています';
$string['howmuch'] = 'おいくらですか?';
$string['httpsrequired'] = '申し訳ございません、あなたのリクエストは現在処理することができません。このサイトの設定は正常に行われませんでした。
<br /><br />ブラウザの下部に黄色の鍵マークが表示されない場合、あなたのクレジットカード番号を入力しないでください。これはクライアントとサーバ間で送信されるすべてのデータが暗号化されることを意味します。暗号化により、2台のコンピュータ間のトランザクション情報は保護され、あなたのクレジットカード番号がインターネット上で盗まれることはありません。';
$string['invalidaba'] = 'ABA番号が正しくありません。';
$string['invalidaccnum'] = '口座番号が正しくありません。';
$string['invalidacctype'] = '口座種別が正しくありません。';
$string['isbusinesschecking'] = '法人クレジットカードですか?';
$string['logindesc'] = 'このオプションは「ON」にする必要があります。<br /><br />管理 >> 詳細設定 >> セキュリティ で <a href=\"$a->url\">loginhttps が「Yes」になっていること</a>を確認してください。 <br /><br />この設定を「Yes」にすることで、Moodleはログインおよび支払いページでセキュアhttps接続を使用します。';
$string['logininfo'] = 'ログイン名、パスワードおよびトランザクションキーはセキュリティ対策のため表示されません。あなたが、これらのフィールドに以前入力したことがある場合、再度入力する必要はありません。入力済みの場合、フィールドの近くに緑色のテキストが表示されます。これらのフィールドへの入力が初めての場合、ログイン名 (*) は必須入力です。また、適切な入力欄にトランザクションキー (#1) <strong>または</strong> パスワード (#2)を入力してください。さらなるセキュリティ対策のため、トランザクションキーの入力をお勧めします。現在のパスワードを削除したい場合、チェックボックスをチェックしてください。';
$string['methodcc'] = 'クレジットカード';
$string['methodecheck'] = 'eCheck (ACH)';
$string['missingaba'] = 'ABA番号を入力してください。';
$string['missingaddress'] = '住所を入力してください。';
$string['missingbankname'] = '銀行名を入力してください。';
$string['missingcc'] = 'カード番号を入力してください。';
$string['missingccauthcode'] = '認証コードを入力してください。';
$string['missingccexpire'] = '有効期限を入力してください。';
$string['missingcctype'] = 'カードタイプを入力してください。';
$string['missingcvv'] = '郵便番号を入力してください。';
$string['missingzip'] = 'カード名義を入力してください。';
$string['mypaymentsonly'] = '私の支払いのみ表示する';
$string['nameoncard'] = 'クレジットカード名義';
$string['new'] = 'New';
$string['noreturns'] = '返金なし!';
$string['notsettled'] = '未確定';
$string['orderdetails'] = '注文詳細';
$string['orderid'] = '注文ID';
$string['paymentmanagement'] = '支払い管理';
$string['paymentmethod'] = '支払方法';
$string['paymentpending'] = 'このコースに関するあなたの支払いは保留中です。注文番号は $a->orderid です。詳細は<a href=\'$a->url\'>注文詳細</a>をご覧ください。';
$string['pendingecheckemail'] = '現在 $a->count の保留echeckがあります。ユーザを登録するには、CSVファイルをアップロードしてください。

次のリンクをクリックして、ヘルプファイルをご覧ください:
$a->url';
$string['pendingechecksubject'] = '$a->course: 保留eCheck($a->count)';
$string['pendingordersemail'] = '支払いを受領しない場合、トランザクション $a->pending は$a->days 日で期限が切れます。

あなたがスケジュールキャプチャを有効にしていないため、これは警告メッセージです。手動で支払いを受けつけるか、拒否する必要があります。

保留の支払いを受領/拒否するには、次のページへ:
$a->url

スケジュールキャプチャを有効にすると、あなたは警告メッセージを受信しなくなります。設定するには、次のページへ:
$a->enrolurl';
$string['pendingordersemailteacher'] = 'あなたが支払いを $a->days 日以内に受領しない場合、コース「 $a->course 」の $a->pending トランザクション ($a->currency $a->sumcost) は失効します。

管理者がスケジュールキャプチャを有効にしていないため、あなたは支払いを手動で受領または拒否する必要があります。';
$string['pendingorderssubject'] = '警告: $a->pending 件のオーダーが $a->days 日で失効します。';
$string['reason11'] = '重複トランザクションが送信されました。';
$string['reason13'] = 'マーチャントログインIDが無効またはアカウントがアクティブではありません。';
$string['reason16'] = 'トランザクションが見つかりませんでした。';
$string['reason17'] = 'マーチャントはこのタイプのクレジットカードを受け付けません。';
$string['reason245'] = '支払いフォーム経由のペイメントゲートウェイはこのeCheckタイプで許可されていません。';
$string['reason246'] = 'このeCheckタイプは許可されていません。';
$string['reason27'] = 'AVSのトランザクション結果が一致しません。提供された住所がカード所有者の住所と合致しません。';
$string['reason28'] = 'マーチャントはこのタイプのクレジットカードを受け付けません。';
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
$string['reason55'] = '参照トランザクションに対するクレジット合計は最初のクレジット金額を超えます。';
$string['reason56'] = 'このマーチャントアカウントではeCheck (ACH) トランザクションのみ受け入れます。クレジットカードトランザクションは受け入れられません。';
$string['refund'] = '払い戻し';
$string['refunded'] = '払い戻し完了';
$string['returns'] = '返金';
$string['reviewday'] = '教師または管理者が、<b>$a</b> 日以内に注文を検査しない場合を除いて、自動的にクレジットカード情報を取得します。CRONを有効にする必要があります。(0日 = スケジュールキャプチャを無効にする = 教師、管理者が手動で検査を行う。スケジュールキャプチャを無効にすると、30日以内にトランザクションを検査しない場合、トランザクションはキャンセルされます。)';
$string['reviewfailed'] = '検査失敗';
$string['reviewnotify'] = 'あなたの支払いが確認されました。数日中に先生からメールが送信されますのでお待ちください。';
$string['sendpaymentbutton'] = '支払いの送信';
$string['settled'] = '確定済み';
$string['settlementdate'] = '確定年月日';
$string['shopper'] = '顧客';
$string['subvoidyes'] = '返金済みトランザクション ($a->transid) はキャンセルされ、$a->amount があなたの口座に振り込まれます。本当によろしいですか?';
$string['tested'] = 'テスト済み';
$string['testmode'] = '[ テストモード ]';
$string['testwarning'] = '「キャプチャー/取り消し/払い戻し」はテストモードで動作しているようです。レコードはデータベースで更新または追加されませんでした。';
$string['transid'] = 'トランザクションID';
$string['underreview'] = '検査中';
$string['unenrolstudent'] = '学生を登録抹消しますか?';
$string['uploadcsv'] = 'CSVファイルをアップロードする';
$string['usingccmethod'] = '<a href=\"$a->url\"><strong>クレジットカード</strong></a>を使用して登録する。';
$string['usingecheckmethod'] = '<a href=\"$a->url\"><strong>eCheck</strong></a>を使用して登録する。';
$string['verifyaccount'] = 'あなたのauthorize.netマーチャントアカウントを確認する';
$string['verifyaccountresult'] = '確認結果: $a';
$string['void'] = '取り消し';
$string['voidyes'] = 'トランザクションがキャンセルされます。本当によろしいですか?';
$string['welcometocoursesemail'] = '$a->name さん

お支払いありがとうございます。あなたは下記コースに受講登録されました:

$a->courses

下記で支払い状況の閲覧およびあなたのプロファイルを編集することができます:
$a->paymenturl
$a->profileurl';
$string['youcantdo'] = 'あなたは次の処理を実行できません: $a->action';
$string['zipcode'] = '郵便番号';

?>
