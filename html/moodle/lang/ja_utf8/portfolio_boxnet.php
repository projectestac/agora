<?PHP // $Id: portfolio_boxnet.php,v 1.10 2010/07/20 19:44:50 mits Exp $ 
      // portfolio_boxnet.php - created with Moodle 2.0 dev (Build: 20080916) (2008091611)


$string['apikey'] = 'APIキー';
$string['apikeyhelp'] = 'あなたはenabled.box.netでサインアップした後、アプリケーションを追加する必要があります。コールバックURIはyourwwwroot/portfolio/add.php?postcontrol=1のように設定してください。';
$string['apikeyinlinehelp'] = '<p>Box.netを設定するには、<a href=\"http://enabled.box.net/my-projects\">enabled.box.net</a>にアクセス後、ログインしてください。</p><p>それぞれのMoodleサイトのために、あなたはMy Projects以下に新しいプロジェクトを作成する必要があります。</p><p>重要な設定項目はコールバックURI ($a) のみです。他の設定はあなたの好きな値を入力することができます。内容を保存して完了です!';
$string['err_noapikey'] = 'このプラグインに設定されたAPIキーがありません。あなたはhttp://enabled.box.netからAPIキーを取得することができます。';
$string['existingfolder'] = 'ファイルを保存する既存のフォルダ';
$string['folderclash'] = 'あなたが作成を依頼したフォルダはすでに登録されています!';
$string['foldercreatefailed'] = 'あなたのターゲットフォルダをbox.netに作成できませんでした。';
$string['folderlistfailed'] = 'box.netからフォルダ一覧を取得できませんでした。';
$string['newfolder'] = 'ファイルを保存する新しいフォルダ';
$string['noauthtoken'] = 'このセッションで使用する認証トークンを取得できませんでした。';
$string['notarget'] = 'あなたはファイルをアップロードする既存のフォルダ、または新しいフォルダを選択する必要があります。';
$string['noticket'] = '認証を開始するためのチケットをbox.netから取得できませんでした。';
$string['password'] = 'あなたのbox.netパスワード (保存されません)';
$string['pluginname'] = 'Box.netインターネットストレージ';
$string['sendfailed'] = 'コンテクストをbox.netに送信できませんでした: $a';
$string['sharedfolder'] = '共有';
$string['sharefile'] = 'このファイルを共有しますか?';
$string['sharefolder'] = 'この新しいフォルダを共有しますか?';
$string['targetfolder'] = 'ターゲットフォルダ';
$string['tobecreated'] = '作成予定';
$string['username'] = 'あなたのbox.netユーザ名 (保存されません)';

?>
