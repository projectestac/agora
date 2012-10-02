<?PHP // $Id: portfolio.php,v 1.31 2010/07/20 19:44:50 mits Exp $ 
      // portfolio.php - created with Moodle 2.0 dev (Build: 20090807) (2009080700)


$string['activeexport'] = 'アクティブエクスポートを解決する';
$string['activeportfolios'] = 'アクティブポートフォリオ';
$string['addalltoportfolio'] = 'すべてをポートフォリオに追加する';
$string['addnewportfolio'] = '新しいポートフォリオを追加する';
$string['addtoportfolio'] = 'ポートフォリオに追加する';
$string['alreadyalt'] = 'すでにエクスポートしています - この転送を解決するには、ここをクリックしてください。';
$string['alreadyexporting'] = 'このセッションにはすでにアクティブなポートフォリオエクスポートがあります。続ける前に、あなたはこのエクスポートを完了するか、キャンセルする必要があります。続けてもよろしいですか? (Noを選択するとキャンセルされます)';
$string['availableformats'] = '利用可能なエクスポートフォーマット';
$string['callercouldnotpackage'] = 'あなたのエクスポートするデータをパッケージできませんでした: オリジナルエラーは次のとおりです - $a';
$string['cannotsetvisible'] = 'このインスタンスを表示できません - 設定が正しくないため、プラグインが完全に無効にされています。';
$string['commonsettingsdesc'] = '<p>「中程度」または「高程度」の転送時間を必要だと見なされる状態に対して、ユーザが転送完了を待つことができるかどうか設定します。</p><p>「中程度」の閾値に達するまで、ユーザへの問いかけなしに処理が実行されます。また、「中程度」および「高程度」の転送ではユーザに対してオプションが提示されますが、時間を要することが警告されます。</p><p>さらに、いくつかのポートフォリオプラグインではこのオプションを完全に無視して、すべての転送を強制的にキューに入れる場合があります。</p>';
$string['configexport'] = 'エクスポートデータの設定';
$string['configplugin'] = 'ポートフォリオプラグインの設定';
$string['configure'] = '設定';
$string['confirmexport'] = 'このエクスポートを確認してください。';
$string['confirmsummary'] = 'あなたのエクスポートの要約';
$string['continuetoportfolio'] = 'あなたのポートフォリオを続ける';
$string['deleteportfolio'] = 'ポートフォリオインスタンスを削除する';
$string['destination'] = 'エクスポート先';
$string['disabled'] = '申し訳ございません、このサイトではポートフォリオエクスポートは有効にされていません。';
$string['displayarea'] = 'エクスポートエリア';
$string['displayexpiry'] = '転送有効時間';
$string['displayinfo'] = 'エクスポート情報';
$string['dontwait'] = '待たない';
$string['enabled'] = 'ポートフォリオを有効にする';
$string['enableddesc'] = 'ポートフォリオを有効にすることで、ユーザがコンテンツをエクスポートできるよう、管理者がリモートシステムを設定することができます。';
$string['err_uniquename'] = 'ポートフォリオ名は(プラグインごとに) ユニークにしてください。';
$string['exportcomplete'] = 'ポートフォリオのエクスポートが完了しました!';
$string['exportedpreviously'] = '前のエクスポート';
$string['exportexceptionnoexporter'] = '活動セッションでportfolio_export_exceptionがスローされましたが、エクスポーターオブジェクトがありません。';
$string['exportexpired'] = 'ポートフォリオエクスポート期限切れ';
$string['exportexpireddesc'] = 'あなたはいくつかの情報を繰り返しエクスポートしようとしているか、空のエクスポートを開始しようとしています。適切にエクスポートするには、オリジナルのロケーションに戻って、再度エクスポートを開始する必要があります。エクスポートの後、あなたがブラウザの戻るボタンを使用したか、無効なURIをブックマークした場合、この現象が時々発生します。';
$string['exporting'] = 'ポートフォリオへのエクスポート';
$string['exportingcontentfrom'] = '$a からコンテンツをエクスポートする';
$string['exportqueued'] = '転送のため、ポートフォリオエクスポートが正常にキューに入れられました。';
$string['exportqueuedforced'] = '転送のため、ポートフォリオエクスポートが正常にキューに入れられました (リモートシステムがキュー型の転送を強制しました)。';
$string['failedtopackage'] = 'パッケージするファイルが見つかりませんでした。';
$string['failedtosendpackage'] = 'あなたのデータを選択されたポートフォリオシステムに送信できませんでした: オリジナルエラーは次のとおりです - $a';
$string['filedenied'] = 'このファイルへのアクセスが拒否されました。';
$string['filenotfound'] = 'ファイルが見つかりませんでした。';
$string['format_file'] = 'ファイル';
$string['format_image'] = 'イメージ';
$string['format_mbkp'] = 'Moodleバックアップフォーマット';
$string['format_plainhtml'] = 'HTML';
$string['format_richhtml'] = 'HTML+添付';
$string['format_text'] = 'プレインテキスト';
$string['format_video'] = 'ビデオ';
$string['hidden'] = '非表示';
$string['highdbsizethreshold'] = '高程度のデータベース転送サイズ';
$string['highdbsizethresholddesc'] = 'この数を超えると高程度の転送時間が必要だと見なされるデータベースレコード数です。';
$string['highfilesizethreshold'] = '高程度のファイル転送サイズ';
$string['highfilesizethresholddesc'] = 'この閾値を超えると高程度の転送時間が必要だと見なされるファイルサイズです。';
$string['insanebody'] = 'こんにちは! あなたはこのメッセージを $a->sitename の管理者として受信しています。

設定が正しくないため、いくつかのポートフォリオプラグインが自動的に無効にされました。これは現在のところ、ユーザがこれらのポートフォリオにコンテンツをエクスポートできないことを意味します。

無効にされたポートフォリオインスタンスのリストは下記のとおりです:

$a->textlist

この問題は$a->fixurl にアクセスして、可能な限り早く訂正されるべきです。';
$string['insanebodyhtml'] = 'p>こんにちは! あなたはこのメッセージを $a->sitename の管理者として受信しています。</p>
$a->htmllist
<p>この問題は<a href=\"$a->fixurl\">ポートフォリオ設定ページ</a>にアクセスして、可能な限り早く訂正されるべきです。</p>';
$string['insanebodysmall'] = 'こんにちは! あなたはこのメッセージを $a->sitename の管理者として受信しています。設定が正しくないため、いくつかのポートフォリオプラグインが自動的に無効にされました。これは現在のところ、ユーザがこれらのポートフォリオにコンテンツをエクスポートできないことを意味します。この問題は$a->fixurl にアクセスして、可能な限り早く訂正されるべきです。';
$string['insanesubject'] = 'いくつかのポートフォリオインスタンスが自動的に無効にされました。';
$string['instancedeleted'] = 'ポートフォリオが正常に削除されました。';
$string['instanceismisconfigured'] = 'ポートフォリオインスタンスの設定が正しくありません、スキップ中。エラー内容は: $a';
$string['instancenotdelete'] = 'ポートフォリオの削除に失敗しました。';
$string['instancenotsaved'] = 'ポートフォリオの保存に失敗しました。';
$string['instancesaved'] = 'ポートフォリオが正常に保存されました。';
$string['invalidaddformat'] = '無効な追加フォーマットが「portfolio_add_button」を通過しました。($a) には「PORTFOLIO_ADD_XXX」の形式を使用してください。';
$string['invalidbuttonproperty'] = 'portfolio_buttonのプロパティ ($a) が見つかりませんでした。';
$string['invalidconfigproperty'] = '設定プロパティ ($a->property - $a->class) が見つかりませんでした。';
$string['invalidexportproperty'] = 'エクスポート設定プロパティ ($a->property - $a->class) が見つかりませんでした。';
$string['invalidfileareaargs'] = '無効なファイルエリア引数が「set_file_and_format_data」を通過しました - 「contextid」「filearea」「itemid」を含む必要があります。';
$string['invalidfileargument'] = '無効なファイル引数が「portfolio_format_from_file」を通過しました - 「stored_file」オブジェクトを使用してください。';
$string['invalidformat'] = '無効なフォーマットでエクスポートされています: $a';
$string['invalidinstance'] = 'ポートフォリオインスタンスが見つかりませんでした。';
$string['invalidpreparepackagefile'] = 'prepare_package_fileに対する無効なコールです - 単一または複数ファイルをセットする必要があります。';
$string['invalidproperty'] = 'プロパティ ($a->property - $a->class) が見つかりませんでした。';
$string['invalidsha1file'] = 'get_sha1_fileに対する無効なコールです - 単一または複数ファイルをセットする必要があります。';
$string['invalidtempid'] = '無効なエクスポートIDです。おそらく有効期限が切れています。';
$string['invaliduserproperty'] = 'ユーザ設定プロパティ ($a->property - $a->class) が見つかりませんでした。';
$string['logs'] = '転送ログ';
$string['logsummary'] = '前回の転送成功';
$string['manageportfolios'] = 'ポートフォリオの管理';
$string['manageyourportfolios'] = 'あなたのポートフォリオの管理';
$string['missingcallbackarg'] = 'クラス $a->class のコールバック変数 $a->arg がありません。';
$string['moderatedbsizethreshold'] = '中程度のデータベース転送サイズ';
$string['moderatedbsizethresholddesc'] = 'この数を超えると中程度の転送時間が必要だと見なされるデータベースレコード数です。';
$string['moderatefilesizethreshold'] = '中程度のファイル転送サイズ';
$string['moderatefilesizethresholddesc'] = 'この閾値を超えると中程度の転送時間が必要だと見なされるファイルサイズです。';
$string['multipledisallowed'] = '複数インスタンス ($a) が許可されないプラグインのインスタンスを作成しようと試みています。';
$string['mustsetcallbackoptions'] = 'あなたはportfolio_add_buttonコンストラクタまたはset_callback_optionsメソッドの使用に関するコールバックオプションを設定する必要があります。';
$string['noavailableplugins'] = '申し訳ございません、あなたがエクスポートできるポートフォリオはありません。';
$string['nocallbackclass'] = '使用するコールバッククラス ($a) を見つけることができませんでした。';
$string['nocallbackfile'] = 'あなたがエクスポートを試みているモジュールが壊れているようです - 必要なファイル ($a) を見つけることができませんでした。';
$string['noclassbeforeformats'] = 'portfolio_buttonでset_formatsをコールする前、あなたはコールバッククラスを設定する必要があります。';
$string['nocommonformats'] = 'ポートフォリオプラグインおよびロケーション $a 間のフォーマットが共通ではありません。';
$string['nonprimative'] = 'portfolio_add_buttonのコールバック変数として、初期値なしの状態で通過しました。処理を停止しました。キーは $a->key 、値は $a->value です。';
$string['nopermissions'] = '申し訳ございません、このエリアからファイルをエクスポートするため必要なパーミッションが、あなたにはありません。';
$string['notexportable'] = '申し訳ございません、あなたがエクスポートを試みているコンテンツタイプはエクスポートできません。';
$string['notimplemented'] = '申し訳ございません、あなたはまだ実装されていないフォーマット ($a) でコンテンツのエクスポートを試みています。';
$string['notyetselected'] = '未選択';
$string['notyours'] = 'あなたは自分に属していないポートフォリオエクスポートの再開を試みています!';
$string['nouploaddirectory'] = 'あなたのデータをパッケージするための一時ディレクトリを作成できませんでした。';
$string['plugin'] = 'ポートフォリオプラグイン';
$string['plugincouldnotpackage'] = 'あなたのエクスポートするデータをパッケージできませんでした: オリジナルエラーは次のとおりです - $a';
$string['pluginismisconfigured'] = 'ポートフォリオプラグインの設定がが正しくありません。エラーは次のとおりです - $a';
$string['portfolio'] = 'ポートフォリオ';
$string['portfolios'] = 'ポートフォリオ';
$string['queuesummary'] = '現在キューに入れられている転送';
$string['returntowhereyouwere'] = '戻る';
$string['save'] = '保存';
$string['selectedformat'] = '選択されたエクスポートフォーマット';
$string['selectedwait'] = '待機の選択?';
$string['selectplugin'] = 'エクスポートするポートフォリオプラグインを選択してください。';
$string['someinstancesdisabled'] = '設定が正しくない、または他の要因により、いくつかの設定済みプラグインインスタンスは無効にされました。';
$string['somepluginsdisabled'] = '設定が正しくない、または他の要因により、すべてのプラグインインスタンスは無効にされました。';
$string['sure'] = '本当に「 $a 」を削除してもよろしいですか? 元に戻すことはできません。';
$string['thirdpartyexception'] = 'ポートフォリオのエクスポート中 ($a)、サードパーティ例外がスローされました。取得および再スローされましたが、これは修正すべきです。';
$string['transfertime'] = '転送時間';
$string['unknownplugin'] = '不明 (管理者が削除した可能性があります)';
$string['wait'] = '待つ';
$string['wanttowait_high'] = 'この転送が完了するまで、待つことはお勧めできません。あなたが何をしているか理解している場合、待つこともできます。';
$string['wanttowait_moderate'] = 'この転送を待ちますか? 転送完了まで数分かかります。';
$string['format_html'] = 'HTML'; // ORPHANED

?>
