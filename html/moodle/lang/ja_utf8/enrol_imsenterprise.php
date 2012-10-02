<?PHP // $Id: enrol_imsenterprise.php,v 1.18 2010/07/20 19:44:48 mits Exp $ 
      // enrol_imsenterprise.php - created with Moodle 2.0 dev (Build: 20100129) (2010012902)


$string['aftersaving...'] = 'あなたの設定を保存した後、';
$string['allowunenrol'] = 'IMSデータに学生/教師の<strong>登録解除</strong> を許可する';
$string['basicsettings'] = '基本設定';
$string['coursesettings'] = 'コースデータオプション';
$string['createnewcategories'] = 'Moodleに登録されていない場合、新しい (非表示) コースカテゴリを作成する';
$string['createnewcourses'] = 'Moodleに登録されていない場合、新しい (非表示) コースを作成する';
$string['createnewusers'] = 'Moodleに登録されていないユーザのアカウントを作成する';
$string['cronfrequency'] = '処理の頻度';
$string['deleteusers'] = 'IMSデータに指定されている場合、ユーザアカウントを削除する';
$string['description'] = 'ここではあなたが指定した場所にある、特別にフォーマットされたテキストファイルを繰り返しチェックおよび処理します。ファイルは<a href=\'../help.php?module=enrol/imsenterprise&amp;file=formatoverview.html\'>IMSエンタープライズ仕様</a>に基づき、person、groupおよびmembershipをXML要素に含む必要があります。';
$string['doitnow'] = 'IMSエンタープライズインポート処理を実行してください。';
$string['enrolname'] = 'IMSエンタープライズファイル';
$string['filelockedmail'] = 'あなたが使用しているIMSファイルベースのユーザ登録 ($a) のテキストファイルをcronプロセスで削除することができません。通常、これはファイルパーミッションが正しくないことを意味します。Moodleが削除できるよう、ファイルのパーミッションを変更してください。変更しない場合、この処理が繰り返し実行されます。';
$string['filelockedmailsubject'] = 'インポートエラー: ユーザ登録ファイル';
$string['fixcasepersonalnames'] = '個人名をタイトル文字にする';
$string['fixcaseusernames'] = 'ユーザ名を小文字に変更する';
$string['imsrolesdescription'] = 'IMSエンタープライズには8種類の異なるロールが指定されています。ロールを無視する場合も含めて、Moodleにこれらのロールを割り当ててください。';
$string['location'] = 'ファイルロケーション';
$string['logtolocation'] = 'ログファイルの出力場所 (空白はログなし)';
$string['mailadmins'] = '管理者にメール通知する';
$string['mailusers'] = 'ユーザにメール通知する';
$string['miscsettings'] = 'その他';
$string['processphoto'] = 'ユーザフォトデータをプロファイルに追加する';
$string['processphotowarning'] = '警告: イメージ処理はサーバに深刻な負荷を与えます。多くの学生の処理が予想される場合、このオプションを有効にしないことをお勧めします。';
$string['restricttarget'] = '次のターゲットが指定されている場合のみ処理する';
$string['sourcedidfallback'] = '「userid」が見つからない場合、ユーザIDに「sourcedid」を使用する';
$string['truncatecoursecodes'] = 'この長さにコースコードを切り詰める';
$string['usecapitafix'] = '「Capita」を使用している場合、チェックしてください (XMLフォーマットが少しだけ正しくありません)';
$string['usersettings'] = 'ユーザデータオプション';
$string['zeroisnotruncation'] = '表示 0、トランケーション なし';

?>
