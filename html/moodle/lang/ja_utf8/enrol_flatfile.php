<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 2.0 dev (Build: 20100129) (2010012902)


$string['description'] = 'この方法ではあなたが指定した場所に置いた特別にフォーマットされたテキストファイルを繰り返しチェックおよび処理します。ファイルはカンマ区切りのファイル、1行あたり4個または6個のフィールドを持つと想定されます:
<pre>
* 処理, ロール, IDナンバー (ユーザ), IDナンバー (コース) [, 開始日時, 終了日時]
詳細:
* 処理 = add | del
* ロール = student | teacher | teacheredit
* IDナンバー (ユーザ) = userテーブルのidnumber (idではなく) 
* IDナンバー　(コース) = courseテーブルのidnumber (idではなく)
* 開始日時 = 開始日時 (UNIXエポックからの秒数) - 任意
* 終了日時 = 終了日時 (UNIXエポックからの秒数) - 任意
</pre>
ファイルのフォーマットは下記のようになります:
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'フラットファイル';
$string['filelockedmail'] = 'ファイルベースのユーザ登録で使用しているテキストファイル ($a) はcronプロセスにより削除することができません。通常、これはファイルパーミッションが正しくないことを意味します。Moodleが削除できるよう、ファイルのパーミッションを変更してください。変更しない場合、この処理が繰り返し実行されます。';
$string['filelockedmailsubject'] = '重大なエラー: エンロールメントファイル';
$string['location'] = 'ファイルロケーション';
$string['mailadmin'] = '管理者にメール通知する';
$string['mailusers'] = 'ユーザにメール通知する';

?>
