<?PHP // $Id: debug.php,v 1.25 2010/07/20 19:44:48 mits Exp $ 
      // debug.php - created with Moodle 2.0 dev (Build: 20100118) (2010011400)


$string['authpluginnotfound'] = '認証プラグイン $a が見つかりませんでした。';
$string['blocknotexist'] = '$a ブロックがありません。';
$string['cannotbenull'] = '$a にはnullを使用できません!';
$string['cannotdowngrade'] = '$a->plugin を $a->oldversion から $a->newversion にダウングレードできません。';
$string['cannotfindadmin'] = '管理ユーザが見つかりませんでした!';
$string['cannotinitpage'] = 'ページを完全に初期化できません: 無効 $a->name ID $a->id';
$string['cannotsetuptable'] = '$a テーブルを正常に設定できませんでした!';
$string['codingerror'] = 'コーディングエラーが検出されました。プログラマによって修正される必要があります: $a';
$string['configmoodle'] = 'Moodleはまだ設定されていません。最初にconfig.phpを編集してください。';
$string['erroroccur'] = '処理中にエラーが発生しました。';
$string['fixsetting'] = 'config.php設定を修正してください: <p>あなたは次のように設定していますが:<p>\$CFG->dirroot = \'$a->current\';</p> <p>実際には次のように設定する必要があります:<p>\$CFG->dirroot = \'$a->found\';</p>';
$string['invalidarraysize'] = '$a の変数内の配列サイズが正しくありません。';
$string['invalideventdata'] = '正しくないイベントデータが送信されました: $a';
$string['invalidparameter'] = '無効なパラメータ値が検出されました。実行を続けることができません。';
$string['missingconfigversion'] = 'configテーブルにバージョンが含まれていません。申し訳ございません、続けることはできません。';
$string['modulenotexist'] = '$a モジュールがありません。';
$string['morethanonerecordinfetch'] = 'fetch() で1レコード以上のレコードが見つかりました!';
$string['mustbeoveride'] = '抽象メソッド $a はオーバーライドする必要があります。';
$string['noactivityname'] = 'page_generic_activityによりページオブジェクトが生成されましたが、\$this->activitynameが定義されていません。';
$string['noadminrole'] = 'adminロールが見つかりませんでした。';
$string['noblocks'] = 'ブロックがインストールされていません!';
$string['nocate'] = 'カテゴリがありません!';
$string['nomodules'] = 'モジュールが見つかりません!!';
$string['nopageclass'] = '$a がインポートされましたが、ページクラスがありません。';
$string['noreports'] = 'アクセスできるレポートはありません。';
$string['notables'] = 'テーブルがありません!';
$string['phpvaroff'] = 'PHPサーバ変数「 $a->name 」をOffにしてください - $a->link';
$string['phpvaron'] = 'PHPサーバ変数「 $a->name 」がOnにされていません - $a->link';
$string['sessionmissing'] = 'セッションに $a オブジェクトがありません。';
$string['sqlrelyonobsoletetable'] = 'このSQLは古いテーブル $a を参照しています! あなたのコードは開発者により修正される必要があります。';
$string['withoutversion'] = 'メインversion.phpが存在しないか、読めない、または指定されていません。';
$string['xmlizeunavailable'] = 'xmlize関数を利用できません。';
$string['siteisnotdefined'] = 'サイトが定義されていません!'; // ORPHANED
$string['cannotcreateadminuser'] = '深刻なエラー: adminユーザレコードを作成できませんでした!!!'; // ORPHANED
$string['cannotsetupsite'] = '重大なエラー! サイトをセットアップできませんでした!'; // ORPHANED
$string['cannotupdaterelease'] = 'エラー: データベース内のリリースバージョンを更新できませんでした!!'; // ORPHANED
$string['cannotupdateversion'] = 'アップグレードに失敗しました! (configテーブルのバージョンを更新できませんでした。)'; // ORPHANED
$string['cannotupgradecapabilities'] = 'ロールシステムのコアケイパビリティのアップグレードに問題が発生しました。'; // ORPHANED
$string['cannotupgradedbcustom'] = 'ローカルデータベースのアップグレードに失敗しました!  (configテーブルのバージョンを更新できませんでした。)'; // ORPHANED
$string['dbnotinsert'] = 'データベースエラー - レコードを追加できません ($a)'; // ORPHANED
$string['dbnotsetup'] = 'エラー: メインデータベースが正常にセットアップされませんでした。'; // ORPHANED
$string['dbnotsupport'] = 'エラー: あなたのデータベース ($a) がMoodleでサポートされないか、install.xmlが作成されていません。lib/dbディレクトリをご覧ください。'; // ORPHANED
$string['dbnotupdate'] = 'データベースエラー - 更新できません ($a)'; // ORPHANED
$string['doesnotworkwitholdversion'] = 'このスクリプトはこの古いバージョンのMoodleでは動作しません。'; // ORPHANED
$string['noblockbase'] = 'クラスblock_baseが定義されていないか、/blocks/moodleblock.class.phpのファイルが見つかりませんでした。'; // ORPHANED
$string['nocaps'] = 'エラー: ケイパビリティが定義されていません!'; // ORPHANED
$string['upgradefail'] = 'アップグレードに失敗しました! 詳細: $a'; // ORPHANED
$string['prefixcannotbeempty'] = 'あなたのターゲットDB ($a[1]) ではテーブル接頭辞「 $a[0] 」を空にすることはできません。'; // ORPHANED
$string['prefixlimit'] = 'Oracle DBで許可されるテーブル接頭辞「 $a 」の最大長は2ccです。'; // ORPHANED

?>
