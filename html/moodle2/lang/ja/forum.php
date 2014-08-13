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
 * Strings for component 'forum', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   forum
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = '新しいフォーラム投稿があります。';
$string['addanewdiscussion'] = 'ディスカッショントピックを追加する';
$string['addanewquestion'] = '新しい質問を追加する';
$string['addanewtopic'] = 'トピックを追加する';
$string['advancedsearch'] = '検索オプション';
$string['allforums'] = 'すべてのフォーラム';
$string['allowdiscussions'] = '{$a} はこのフォーラムに投稿できますか?';
$string['allowsallsubscribe'] = 'このフォーラムでは、すべてのユーザがメール購読するかどうか選択できます。';
$string['allowsdiscussions'] = 'このフォーラムでは、1人1件のディスカッショントピックを開始することができます。';
$string['allsubscribe'] = 'すべてのフォーラムをメール購読する';
$string['allunsubscribe'] = 'すべてのフォーラムのメール購読を解除する';
$string['alreadyfirstpost'] = 'このディスカッションには、すでに最初の投稿があります。';
$string['anyfile'] = 'すべてのファイル';
$string['areaattachment'] = '添付ファイル';
$string['areapost'] = 'メッセージ';
$string['attachment'] = '添付ファイル';
$string['attachment_help'] = 'あなたは、1つまたはそれ以上のファイルをフォーラム投稿に任意で添付することができます。あなたがイメージを添付した場合、メッセージの下に表示されます。';
$string['attachmentnopost'] = 'あなたは、投稿IDなしで添付ファイルをエクスポートできません。';
$string['attachments'] = '添付ファイル';
$string['attachmentswordcount'] = '添付および文字カウント';
$string['blockafter'] = 'ブロッキングまでの投稿閾値';
$string['blockafter_help'] = 'この設定では指定された時間内にユーザが投稿できる記事数を指定します。ケイパビリティ「mod/forum:postwithoutthrottling」が割り当てられたユーザは投稿制限から除外されます。';
$string['blockperiod'] = 'ブロッキング期間';
$string['blockperioddisabled'] = 'ブロックしない';
$string['blockperiod_help'] = '指定された時間内に指定された記事数以上を投稿した場合、学生の投稿を拒否することができます。ケイパビリティ「mod/forum:postwithoutthrottling」が割り当てられたユーザは投稿制限から除外されます。';
$string['blogforum'] = 'ブログフォーマットで表示される標準フォーラム';
$string['bynameondate'] = '{$a->date} - {$a->name} の投稿';
$string['cannotadd'] = 'このフォーラムにディスカッションを追加できませんでした。';
$string['cannotadddiscussion'] = 'このフォーラムにディスカッションを追加するには、グループのメンバーである必要があります。';
$string['cannotadddiscussionall'] = 'あなたには、すべての参加者に対する新しいディスカッショントピックを追加するパーミッションがありません。';
$string['cannotaddsubscriber'] = 'このフォーラムに、ID {$a} のメール購読ユーザを追加できませんでした!';
$string['cannotaddteacherforumto'] = 'コースのセクションゼロに対して、コンバートされた教師フォーラムインスタンスを追加できませんでした。';
$string['cannotcreatediscussion'] = '新しいディスカッションを作成できませんでした。';
$string['cannotcreateinstanceforteacher'] = '教師用フォーラムに対して、新しいコースモジュールインスタンスを作成できませんでした。';
$string['cannotdeletepost'] = 'あなたはこの投稿を削除できません!';
$string['cannoteditposts'] = 'あなたは、他のユーザの投稿を編集できません!';
$string['cannotfinddiscussion'] = 'このフォーラムのディスカッションが見つかりませんでした。';
$string['cannotfindfirstpost'] = 'このフォーラムの最初の投稿が見つかりませんでした。';
$string['cannotfindorcreateforum'] = 'サイトのメインニュースフォーラムが見つからないか、作成できません。';
$string['cannotfindparentpost'] = '記事 {$a} の先頭親記事が見つかりませんでした。';
$string['cannotmovefromsingleforum'] = '「トピック1件のシンプルなディスカッション」フォーラムからディスカッションを移動できません。';
$string['cannotmovenotvisible'] = 'フォーラムは非表示です。';
$string['cannotmovetonotexist'] = 'あなたは、このフォーラムを移動できません - フォーラムが存在しません!';
$string['cannotmovetonotfound'] = 'このコースには、対象のフォーラムが見つかりませんでした。';
$string['cannotmovetosingleforum'] = '「トピック1件のシンプルなディスカッション」フォーラムにディスカッションを移動できません。';
$string['cannotpurgecachedrss'] = 'ソースまたは対象フォーラムに関して、キャッシュされたRSSフィードを削除できませんでした - あなたのファイルパーミッションを確認してください。';
$string['cannotremovesubscriber'] = 'このフォーラムから、ID {$a} のメール購読ユーザを削除できませんでした!';
$string['cannotreply'] = 'あなたは、この投稿に返信できません。';
$string['cannotsplit'] = 'このフォーラムのディスカッションは、分割できません。';
$string['cannotsubscribe'] = '申し訳ございません、あなたがメール購読するには、グループメンバーである必要があります。';
$string['cannottrack'] = 'フォーラムの未読管理を停止できませんでした。';
$string['cannotunsubscribe'] = 'あなたをフォーラムからメール購読解除できませんでした。';
$string['cannotupdatepost'] = 'あなたは、この投稿を更新できません。';
$string['cannotviewpostyet'] = 'まだ投稿していないため、あなたは他の学生の質問を読むことはできません。';
$string['cannotviewusersposts'] = 'このユーザによる閲覧可能な投稿はありません。';
$string['cleanreadtime'] = '古い投稿を既読とする時刻';
$string['completiondiscussions'] = '学生は次の件数のディスカッションを作成する必要があります:';
$string['completiondiscussionsgroup'] = 'ディスカッションを必要とする';
$string['completiondiscussionshelp'] = '完了するには、ディスカッションを必要とする';
$string['completionposts'] = '学生は次の件数のディスカッションまたは返信を投稿する必要があります:';
$string['completionpostsgroup'] = '投稿を必要とする';
$string['completionpostshelp'] = '完了するには、ディスカッションまたは返信を必要とする';
$string['completionreplies'] = '学生は次の件数の返信を投稿する必要があります:';
$string['completionrepliesgroup'] = '返信を必要とする';
$string['completionreplieshelp'] = '完了するには、返信を必要とする';
$string['configcleanreadtime'] = '古い投稿を「既読」テーブルからクリアする時刻 (時) です。';
$string['configdigestmailtime'] = 'メール送信を選択したユーザに、投稿内容を要約したメールが毎日送信されます。ここでは1日の内で何時に要約メールを送信するか設定します (この設定後に実行される次のcronがメールを送信します)。';
$string['configdisplaymode'] = '表示モードが設定されていない場合、ディスカッションで使用されるデフォルト表示モードです。';
$string['configenablerssfeeds'] = 'すべてのフォーラムのRSS使用を有効にします。ここで設定しても、各フォーラムでRSSフィードを手動で設定する必要があります。';
$string['configenabletimedposts'] = '新しいフォーラムディスカッションの表示期間の設定を許可したい場合、「Yes」を選択してください。';
$string['configlongpost'] = 'この文字長以上の長さ (HTMLは含まない) は長いとみなされます。サイトのフロントページ、ソーシャルフォーマット、ユーザプロファイルに表示される投稿内容の長さは、forum_shortpostとforum_longpostの値の間に短くされます。';
$string['configmanydiscussions'] = 'フォーラム1ページあたりに表示されるディスカッションの最大数です。';
$string['configmaxattachments'] = '投稿ごとに許可されるデフォルトの最大添付ファイル数です。';
$string['configmaxbytes'] = 'すべてのフォーラムの添付ファイルに関するデフォルト最大サイズ (コース制限および他のローカル設定に従います)';
$string['configoldpostdays'] = '古い投稿を既読とする日数です。';
$string['configreplytouser'] = 'フォーラムの投稿がメール送信される場合、受信者がフォーラムを介さず個人的に返信できるよう、メールにユーザのメールアドレスを表示しますか?　「Yes」に設定した場合でも、ユーザはプロファイルページで、メールアドレスを隠すよう設定することができます。';
$string['configshortpost'] = 'この文字長以下の長さ (HTMLは含まない) は短いとみなされます (下記参照)。';
$string['configtrackingtype'] = '未読管理のデフォルト設定';
$string['configtrackreadposts'] = 'ユーザごとに未読管理したい場合、「Yes」を選択してください。';
$string['configusermarksread'] = '「Yes」に設定した場合、ユーザは投稿を手動で既読にする必要があります。「No」に設定した場合、投稿が閲覧された時点で既読にされます。';
$string['confirmsubscribe'] = '本当にフォーラム「 {$a} 」を購読してもよろしいですか?';
$string['confirmunsubscribe'] = '本当にフォーラム「 {$a} 」から購読解除してもよろしいですか?';
$string['couldnotadd'] = 'エラーのため投稿できませんでした。';
$string['couldnotdeletereplies'] = '申し訳ございません、返信済みのため削除できませんでした。';
$string['couldnotupdate'] = '未確認エラーのため投稿を更新できませんでした。';
$string['delete'] = '削除';
$string['deleteddiscussion'] = 'ディスカッショントピックが削除されました。';
$string['deletedpost'] = '投稿が削除されました。';
$string['deletedposts'] = '投稿が削除されました。';
$string['deletesure'] = 'この投稿を削除してもよろしいですか?';
$string['deletesureplural'] = 'この投稿およびすべての返信を削除してもよろしいですか? (投稿数 {$a})';
$string['digestmailheader'] = 'これは {$a->sitename} フォーラムの新しい投稿に関するあなたのデイリーダイジェストです。あなたのデフォルトのフォーラムメールプリファレンスを変更するには、 {$a->userprefs} に移動してください。';
$string['digestmailpost'] = 'あなたのフォーラムダイジェストプリファレンスを変更する';
$string['digestmailprefs'] = 'ユーザプロファイル';
$string['digestmailsubject'] = '{$a}: フォーラムダイジェスト';
$string['digestmailtime'] = '要約メールを送信する時刻';
$string['digestsentusers'] = 'メールダイジェストが  {$a} 名のユーザに送信されました。';
$string['disallowsubscribe'] = 'メール購読不可';
$string['disallowsubscribeteacher'] = 'メール購読不可 (教師を除く)';
$string['discussion'] = 'ディスカッション';
$string['discussionmoved'] = 'ディスカッションは 「 {$a} 」に移動されました。';
$string['discussionmovedpost'] = 'このディスカッションは、フォーラム「 <a href="{$a->forumhref}">{$a->forumname}</a> 」の<a href="{$a->discusshref}">ここ</a>に移動されました。';
$string['discussionname'] = 'ディスカッション名';
$string['discussions'] = 'ディスカッション';
$string['discussionsstartedby'] = '{$a} さんより開始されたディスカッション';
$string['discussionsstartedbyrecent'] = '{$a} さんより最近開始されたディスカッション';
$string['discussionsstartedbyuserincourse'] = 'ディスカッション 開始:{$a->fullname} - コース:{$a->coursename}';
$string['discussthistopic'] = 'このトピックを読む';
$string['displayend'] = '表示終了';
$string['displayend_help'] = '<p>あなたの投稿が特定の日付から表示開始、特定の日付に表示終了、または指定された期間のみ表示することを選択できます。</p>

<p>表示開始日付および/または終了日付を有効にするには、無効オプションを選択解除してください。</p>

<p>管理者としてアクセスできるユーザは、表示開始日の前、および表示終了日の後に投稿内容を閲覧することができますので注意してください。</p>';
$string['displaymode'] = '表示モード';
$string['displayperiod'] = '表示期間';
$string['displaystart'] = '表示開始';
$string['displaystart_help'] = '<p>あなたの投稿が特定の日付から表示開始、特定の日付に表示終了、または指定された期間のみ表示することを選択できます。</p>

<p>表示開始日付および/または終了日付を有効にするには、無効オプションを選択解除してください。</p>

<p>管理者としてアクセスできるユーザは、表示開始日の前、および表示終了日の後に投稿内容を閲覧することができますので注意してください。</p>';
$string['displaywordcount'] = '文字カウントを表示する';
$string['displaywordcount_help'] = 'この設定では、それぞれの投稿の文字数を表示するかどうか指定します。';
$string['eachuserforum'] = '各人が1件のディスカッションを投稿する';
$string['edit'] = '編集';
$string['editedby'] = '編集 {$a->name} - 最初の投稿日時 {$a->date}';
$string['editedpostupdated'] = '{$a} の投稿が更新されました。';
$string['editing'] = '編集';
$string['emaildigest_0'] = 'あなたはフォーラム投稿ごとに1通のメールを受信します。';
$string['emaildigest_1'] = 'あなたはそれぞれのフォーラム投稿に関する完全なコンテンツを含むメールダイジェストを1日1通受信します。';
$string['emaildigest_2'] = 'あなたはそれぞれのフォーラム投稿に関する件名を含むメールダイジェストを1日1通受信します。';
$string['emaildigestcompleteshort'] = '完全な投稿';
$string['emaildigestdefault'] = 'デフォルト ({$a})';
$string['emaildigestoffshort'] = 'ダイジェストなし';
$string['emaildigestsubjectsshort'] = '件名のみ';
$string['emaildigesttype'] = 'メールダイジェストオプション';
$string['emaildigesttype_help'] = 'あなたがそれぞれの投稿に関して受信する通知タイプです。

* デフォルト - あなたのプロファイルのダイジェスト設定に従います。あなたがプロファイルを更新した場合、ここで変更内容が反映されます。
* ダイジェストなし - あなたはフォーラム投稿ごとに1通のメールを受信します。
* ダイジェスト - 完全な投稿 - あなたはそれぞれのフォーラム投稿に関する完全なコンテンツを含むメールダイジェストを1日1通受信します。
* ダイジェスト - 件名のみ - あなたはそれぞれのフォーラム投稿に関する件名を含むメールダイジェストを1日1通受信します。';
$string['emaildigestupdated'] = 'フォーラム「 {$a->forum} 」に関して、メールダイジェストオプションが「 {$a->maildigesttitle} 」に変更されました。
{$a->maildigestdescription}';
$string['emaildigestupdated_default'] = 'あなたの「 {$a->maildigesttitle} 」のデフォルトプロファイル設定はフォーラム「 {$a->forum} 」に使用されました。
{$a->maildigestdescription}';
$string['emptymessage'] = 'あなたの投稿に問題があります。恐らく投稿が空白のままか、添付ファイルのサイズが大きすぎます。あなたの変更は保存されませんでした。';
$string['erroremptymessage'] = '投稿メッセージを空にすることはできません。';
$string['erroremptysubject'] = '件名を空にすることはできません。';
$string['errorenrolmentrequired'] = 'このコンテンツにアクセスするには、あなたはこのコースに受講登録する必要があります。';
$string['errorwhiledelete'] = 'レコードの削除中にエラーが発生しました。';
$string['event_assessable_uploaded'] = 'コンテンツが投稿されました。';
$string['everyonecanchoose'] = 'すべてのユーザはメール購読を選択できます。';
$string['everyonecannowchoose'] = 'すべてのユーザはメール購読を選択できるようになりました。';
$string['everyoneisnowsubscribed'] = 'すべてのユーザがこのフォーラムをメール購読するようになりました。';
$string['everyoneissubscribed'] = 'すべてのユーザがこのフォーラムをメール購読します。';
$string['existingsubscribers'] = 'メール購読ユーザ';
$string['exportdiscussion'] = 'すべてのディスカッションをエクスポートする';
$string['forcedreadtracking'] = '未読管理の強制を許可する';
$string['forcedreadtracking_desc'] = 'フォーラムの未読管理の強制を許可します。特に多くのフォーラムおよび投稿があるコースに関して、ユーザのパフォーマンスが下がることになります。無効にした場合、前に強制が設定されたフォーラムは任意として扱われます。';
$string['forcessubscribe'] = 'このフォーラムはメール購読が強制されています。';
$string['forum'] = 'フォーラム';
$string['forum:addinstance'] = '新しいフォーラムを追加する';
$string['forum:addnews'] = 'ニュースを追加する';
$string['forum:addquestion'] = '質問を追加する';
$string['forum:allowforcesubscribe'] = '強制購読を許可する';
$string['forumauthorhidden'] = '投稿者 (非表示)';
$string['forumblockingalmosttoomanyposts'] = 'あなたは投稿数の限度に近づきつつあります。あなたは直近の {$a->blockperiod} に {$a->numposts} 回投稿しています。投稿数の限度は {$a->blockafter} 回です。';
$string['forumbodyhidden'] = 'あなたはこの記事を閲覧できません。恐らく、あなたがまだディスカッションを投稿していない、最大編集時間を経過していない、ディスカッションが開始されていない、またはディスカッションの有効期限が切れています。';
$string['forum:createattachment'] = '添付ファイルを作成する';
$string['forum:deleteanypost'] = 'どの投稿でも削除する (いつでも)';
$string['forum:deleteownpost'] = '自分の投稿を削除する (期限内)';
$string['forum:editanypost'] = 'どの投稿でも編集する';
$string['forum:exportdiscussion'] = 'すべてのディスカッションをエクスポートする';
$string['forum:exportownpost'] = '自分の投稿をエクスポートする';
$string['forum:exportpost'] = '投稿をエクスポートする';
$string['forumintro'] = '説明';
$string['forum:managesubscriptions'] = 'メール購読を管理する';
$string['forum:movediscussions'] = 'ディスカッションを移動する';
$string['forumname'] = 'フォーラム名';
$string['forumposts'] = 'フォーラム投稿';
$string['forum:postwithoutthrottling'] = '投稿閾値を適用しない';
$string['forum:rate'] = '投稿を評価する';
$string['forum:replynews'] = 'ニュースに返信する';
$string['forum:replypost'] = '投稿に返信する';
$string['forums'] = 'フォーラム';
$string['forum:splitdiscussions'] = 'ディスカッションを分割する';
$string['forum:startdiscussion'] = '新しいディスカッションを開始する';
$string['forumsubjecthidden'] = '題名 (非表示)';
$string['forumtracked'] = '現在、投稿を未読管理しています。';
$string['forumtrackednot'] = '現在、投稿を未読管理していません。';
$string['forumtype'] = 'フォーラムタイプ';
$string['forumtype_help'] = 'フォーラムには5つのタイプあります:

* トピック1件のシンプルなディスカッション - 誰でも返信できる単一のディスカッションです (分離グループには使用できません)。
* 各人が1件のディスカッションを投稿する - それぞれの学生が誰でも返信できる厳密に1つのディスカッショントピックを投稿できます。
* Q&A フォーラム - 学生は他の学生の投稿を読む前に自分の考え方を投稿する必要があります。
* ブログフォーマットで表示される標準フォーラム - 誰でも常に新しいトピックを開始できる開かれたフォーラムです。また、ディスカッショントピックは1つのページに「このトピックを読む」リンクとして表示されます。
* 一般的利用のための標準フォーラム - 誰でも常に新しいトピックを開始できる開かれたフォーラムです。';
$string['forum:viewallratings'] = '個々のユーザから与えられた実評価すべてを表示する';
$string['forum:viewanyrating'] = 'すべてのユーザが受けた評価合計を表示する';
$string['forum:viewdiscussion'] = 'ディスカッションを表示する';
$string['forum:viewhiddentimedposts'] = '非表示の時間制限投稿を表示する';
$string['forum:viewqandawithoutposting'] = 'Q and A投稿を常に表示する';
$string['forum:viewrating'] = 'あなたが受けた評価合計を表示する';
$string['forum:viewsubscribers'] = 'メール購読ユーザを表示する';
$string['generalforum'] = '一般利用のための標準フォーラム';
$string['generalforums'] = '総合フォーラム';
$string['hiddenforumpost'] = '非表示フォーラム投稿';
$string['inforum'] = '{$a}';
$string['introblog'] = '今後ブログエントリが利用できないため、このフォーラムの投稿はコース内のユーザブログから自動的にコピーされました。';
$string['intronews'] = '一般ニュースとお知らせ';
$string['introsocial'] = '投稿制限なしフォーラム';
$string['introteacher'] = '教師専用フォーラム';
$string['invalidaccess'] = 'このページは正しくアクセスされていません。';
$string['invaliddigestsetting'] = '無効なメールダイジェストが設定されました。';
$string['invaliddiscussionid'] = 'ディスカッションIDが正しくない、または存在しません。';
$string['invalidforcesubscribe'] = '無効な強制購読モードです。';
$string['invalidforumid'] = 'フォーラムIDが正しくありません。';
$string['invalidparentpostid'] = '親記事のIDが正しくありません。';
$string['invalidpostid'] = '投稿ID ({$a}) が有効ではありません。';
$string['lastpost'] = '最新の投稿';
$string['learningforums'] = '学習フォーラム';
$string['longpost'] = '長い投稿';
$string['mailnow'] = 'すぐにメール送信する';
$string['manydiscussions'] = '1ページあたりのディスカッション数';
$string['markalldread'] = 'このディスカッションの投稿をすべて既読にする。';
$string['markallread'] = 'このフォーラムの投稿をすべて既読にする。';
$string['markread'] = '既読にする';
$string['markreadbutton'] = '既読<br />にする';
$string['markunread'] = '未読にする';
$string['markunreadbutton'] = '未読<br />にする';
$string['maxattachments'] = '最大添付ファイル数';
$string['maxattachments_help'] = '<p>この設定では、このフォーラム内のそれぞれの投稿に対して、いくつのファイル添付を許可するかコントロールします。</p>';
$string['maxattachmentsize'] = '最大添付ファイルサイズ';
$string['maxattachmentsize_help'] = '<p>フォーラムを作成した人が選択することにより、添付ファイルのファイルサイズに制限を設けることができます。</p>

<p>制限サイズよりも大きなファイルをアップロードすることもできますが、実際にはサーバに保存されず、エラーメッセージが表示されます。</p>';
$string['maxtimehaspassed'] = '申し訳ございません、この投稿 ({$a}) に対する最大編集回数を超えました!';
$string['message'] = 'メッセージ';
$string['messageprovider:digests'] = 'メール購読フォーラムダイジェスト';
$string['messageprovider:posts'] = 'メール購読フォーラム投稿';
$string['missingsearchterms'] = '次の検索語はメッセージのHTMLマークアップのみに表示されます。';
$string['modeflatnewestfirst'] = '返信を新しいものからフラット表示する';
$string['modeflatoldestfirst'] = '返信を古いものからフラット表示する';
$string['modenested'] = '返信をネスト表示する';
$string['modethreaded'] = '返信をスレッド表示する';
$string['modulename'] = 'フォーラム';
$string['modulename_help'] = 'フォーラム活動モジュールにおいて、参加者は非同期にディスカッションすることができます。例) 長期間に及ぶディスカッション

誰でもいつでも新しいディスカッションを開始することのできる標準的なフォーラム、それぞれの学生が厳密に1つのディスカッションのみ開始することのできるフォーラム　または他の学生の投稿を閲覧するためには学生が最初に投稿する必要のあるQ＆Ａフォーラム等、選択することのできるいくつかのフォーラムタイプがあります。教師はフォーラム投稿へのファイル添付を許可することができます。添付された画像はフォーラム投稿内に表示されます。

新しい投稿に関する通知を受信するできるよう、参加者はフォーラムを購読することができます。教師は購読モードを任意、強制、自動、または停止に設定することができます。必要であれば、設定された時間内に設定された投稿数以上の記事を投稿できないよう、学生をブロックすることができます。これは個人によるディスカッションの支配を防ぐことができます。

フォーラム投稿は教師または学生 (ピア評価) によって評価することができます。評価は合計した後に最終評価として評定表に記録させることができます。

フォーラムは下記のように使用することができます:

* 学生がお互いを知り合うためのソーシャルスペースとして
* コースのお知らせ用として (強制購読のニュースフォーラムを使用)
* コースコンテンツまたは読書素材のディスカッション用として
* 以前に対面セッションで触れた問題に関する継続的なオンラインディスカッション用として
* 教師専用フォーラムとして (非表示フォーラムを使用)
* チューターおよび学生がアドバイスを与えることのできるヘルプセンターとして
* 学生教師間の1対1のプライベートサポートエリアとして (1グループあたり1人のグループを使った分離グループを使用)
* 学外活動用として (例えば、学生が熟考するための「頭の体操」および解決方法の提案)';
$string['modulenameplural'] = 'フォーラム';
$string['more'] = '詳細';
$string['movedmarker'] = '(移動済み)';
$string['movethisdiscussionto'] = 'このディスカッションを移動する ...';
$string['mustprovidediscussionorpost'] = 'あなたは、ディスカッションIDまたは投稿IDをエクスポートに提供する必要があります。';
$string['namenews'] = 'ニュースフォーラム';
$string['namenews_help'] = '<p>ニュースフォーラムは、サイトのそれぞれのコースおよびフロントページに自動的に作成される全般的なお知らせ用のフォーラムです。1コースあたり1つのニュースフォーラムのみ設置されます。</p>

<p>「最新ニュース」ブロックでは、(フォーラムの名称を変更しても)  この特別なフォーラムの最新ディスカッションが表示されます。この理由から、あなたが「最新ニュース」ブロックを使用している場合、フォーラムは自動的に再作成されます。</p>';
$string['namesocial'] = 'ソーシャルフォーラム';
$string['nameteacher'] = '教師用フォーラム';
$string['newforumposts'] = '新しいフォーラム投稿';
$string['noattachments'] = 'このフォーラムには、添付ファイルがありません。';
$string['nodiscussions'] = 'このフォーラムには、まだディスカッショントピックがありません。';
$string['nodiscussionsstartedby'] = '{$a} から開始されたディスカッションはありません。';
$string['nodiscussionsstartedbyyou'] = 'あなたが開始したディスカッションはありません。';
$string['noguestpost'] = '申し訳ございません、ゲストは投稿できません。';
$string['noguesttracking'] = '申し訳ございません、ゲストは未読管理オプションを設定できません。';
$string['nomorepostscontaining'] = 'これ以上「 {$a} 」 を含んだ投稿はありません。';
$string['nonews'] = '新しいニュースはありません';
$string['noonecansubscribenow'] = '現在、購読は無効にされています。';
$string['nopermissiontosubscribe'] = 'あなたには、メール購読ユーザを閲覧するパーミッションがありません。';
$string['nopermissiontoview'] = 'あなたには、この投稿を閲覧するパーミッションがありません。';
$string['nopostforum'] = '申し訳ございません、あなたはこのフォーラムに投稿できません。';
$string['noposts'] = '投稿していません。';
$string['nopostsmadebyuser'] = '{$a} の投稿はありません。';
$string['nopostsmadebyyou'] = 'あなたの投稿はありません。';
$string['noquestions'] = 'このフォーラムにはまだ質問がありません。';
$string['nosubscribers'] = 'このフォーラムにはまだメール購読ユーザはいません。';
$string['notexists'] = 'ディスカッションは、すでに存在しません。';
$string['nothingnew'] = '{$a} に新しい投稿はありません。';
$string['notingroup'] = '申し訳ございません、グループ以外の方はこのフォーラムを閲覧できません。';
$string['notinstalled'] = 'フォーラムモジュールがインストールされていません。';
$string['notpartofdiscussion'] = 'この投稿は、ディスカッションの一部ではありません。';
$string['notrackforum'] = '投稿を未読管理しない';
$string['noviewdiscussionspermission'] = 'あなたには、このフォーラムを閲覧するパーミッションがありません。';
$string['nowallsubscribed'] = '{$a} のすべてのフォーラムのメール購読を登録しました。';
$string['nowallunsubscribed'] = '{$a} のすべてのフォーラムのメール購読を解除しました。';
$string['nownotsubscribed'] = '{$a->name} には「 {$a->forum} 」の新しい投稿が通知されません。';
$string['nownottracking'] = '{$a->name} は 「 {$a->forum} 」を未読管理していません。';
$string['nowsubscribed'] = '{$a->name} には「 {$a->forum} 」の新しい投稿が通知されます。';
$string['nowtracking'] = '{$a->name} は、現在「 {$a->forum} 」を未読管理しています。';
$string['numposts'] = '{$a} 投稿';
$string['olderdiscussions'] = '過去のディスカッション';
$string['oldertopics'] = '過去のトピック';
$string['oldpostdays'] = '投稿を既読とする日数';
$string['openmode0'] = 'ディスカッション不可、返信不可';
$string['openmode1'] = 'ディスカッション不可、返信可';
$string['openmode2'] = 'ディスカッション可、返信可';
$string['overviewnumpostssince'] = '最終ログイン以降の投稿: {$a}';
$string['overviewnumunread'] = '合計未読記事: {$a}';
$string['page-mod-forum-discuss'] = 'フォーラムモジュール ディスカッションスレッドページ';
$string['page-mod-forum-view'] = 'フォーラムモジュールメインページ';
$string['page-mod-forum-x'] = 'すべてのフォーラムモジュールページ';
$string['parent'] = '親記事を表示する';
$string['parentofthispost'] = 'この投稿の親記事';
$string['pluginadministration'] = 'フォーラム管理';
$string['pluginname'] = 'フォーラム';
$string['postadded'] = '<p>あなたの投稿が追加されました。</p>
<p>あなたが内容を変更したい場合、 {$a} 編集できます。</p>';
$string['postaddedsuccess'] = 'あなたの投稿が追加されました。';
$string['postaddedtimeleft'] = '<p>あなたが内容を変更したい場合、 {$a} 編集できます。</p>';
$string['postbyuser'] = '{$a->post} by {$a->user}';
$string['postincontext'] = 'この投稿をコンテクスト内に表示する';
$string['postmailinfo'] = 'これは ウェブサイト {$a} に投稿された記事のコピーです。

返信を投稿するには、このリンクをクリックしてください:';
$string['postmailnow'] = '<p>この投稿はすべてのメール購読ユーザにすぐに送信されます。</p>';
$string['postrating1'] = '主に分離認識の傾向がある';
$string['postrating2'] = '分離認識と関連認識を同等に持っている';
$string['postrating3'] = '主に関連認識の傾向がある';
$string['posts'] = '投稿';
$string['postsmadebyuser'] = '{$a} による投稿';
$string['postsmadebyuserincourse'] = '{$a->coursename} における {$a->fullname} による投稿';
$string['posttoforum'] = 'フォーラムに投稿する';
$string['postupdated'] = '投稿が更新されました。';
$string['potentialsubscribers'] = '潜在的メール購読ユーザ';
$string['processingdigest'] = '{$a} のメールダイジェストを処理中';
$string['processingpost'] = '投稿 {$a} を処理中';
$string['prune'] = '分割';
$string['prunedpost'] = '新しいディスカッションが投稿より作成されました。';
$string['pruneheading'] = '投稿を分割して、新しいディスカッションへ移動する。';
$string['qandaforum'] = 'Q&Aフォーラム';
$string['qandanotify'] = 'これはQ&Aフォーラムです。これらの質問に対する他の人の回答を読むには、最初にあなたの回答を投稿する必要があります。';
$string['re'] = 'Re:';
$string['readtherest'] = '残りのトピックを読む';
$string['replies'] = '返信';
$string['repliesmany'] = '返信数: {$a} 件';
$string['repliesone'] = '返信数: {$a} 件';
$string['reply'] = '返信';
$string['replyforum'] = 'フォーラムに返信';
$string['replytouser'] = '返信にメールアドレスを使用する';
$string['resetdigests'] = 'すべてのユーザのフォーラムダイジェストプリファレンスを削除する';
$string['resetforums'] = '次のフォーラムから投稿を削除する';
$string['resetforumsall'] = 'すべての投稿を削除する';
$string['resetsubscriptions'] = 'すべてのフォーラムのメール購読を解除する';
$string['resettrackprefs'] = 'すべてのフォーラムの未読管理設定を削除する';
$string['rssarticles'] = '最近の記事のRSS数';
$string['rssarticles_help'] = '<p>ここではRSSフィードに含まれる記事数を設定します。</p>

<p>ほとんどのフォーラムでは、5から20の間が適当であると思われます。フォーラムが活発な場合は、この値を増やしてください。</p>';
$string['rsssubscriberssdiscussions'] = 'ディスカッションのRSSフィード';
$string['rsssubscriberssposts'] = '投稿のRSSフィード';
$string['rsstype'] = 'この活動のRSSフィード';
$string['rsstype_help'] = '<p>ここではフォーラムのRSSフィードを利用可にすることができます。</p>

<p>RSSフィードは、2種類の中から選択することができます:</p>

<ul>
<li><b>ディスカッション:</b> フォーラム内の新しいディスカッションおよび最初の投稿に関してRSSフィードが生成されます。</li>

<li><b>投稿:</b> フォーラム内のすべての投稿に関して関してRSSフィードが生成されます。</li>
</ul>';
$string['search'] = '検索';
$string['searchdatefrom'] = 'この日付よりも新しい';
$string['searchdateto'] = 'この日付よりも古い';
$string['searchforumintro'] = '下記のフィールドの少なくとも1つに検索語句を入力してください:';
$string['searchforums'] = 'フォーラムを検索する';
$string['searchfullwords'] = 'これらの語を完全な単語として含む';
$string['searchnotwords'] = 'これらの語を含まない';
$string['searcholderposts'] = '過去の投稿を検索 ...';
$string['searchphrase'] = 'このフレーズが正確に投稿中に含まれる';
$string['searchresults'] = '検索結果';
$string['searchsubject'] = 'これらの語が題名に含まれる';
$string['searchuser'] = 'この名前が投稿者名に合致する';
$string['searchuserid'] = '投稿者のMoodle ID';
$string['searchwhichforums'] = '検索するフォーラム';
$string['searchwords'] = 'これらの語が投稿のどこかに含まれる';
$string['seeallposts'] = 'このユーザによるすべての投稿を表示';
$string['shortpost'] = '短い投稿';
$string['showsubscribers'] = 'メール購読ユーザを表示/編集する';
$string['singleforum'] = 'トピック1件のシンプルなディスカッション';
$string['smallmessage'] = '{$a->user} による {$a->forumname} の投稿';
$string['startedby'] = 'ディスカッションの開始';
$string['subject'] = '題名';
$string['subscribe'] = 'このフォーラムをメール購読する';
$string['subscribeall'] = '全員のメール購読を登録';
$string['subscribed'] = 'メール購読';
$string['subscribeenrolledonly'] = '申し訳ございません、受講登録しているユーザのみ、フォーラム投稿通知を購読することができます。';
$string['subscribenone'] = '全員のメール購読を解除';
$string['subscribers'] = 'メール購読ユーザ';
$string['subscribersto'] = '{$a} のメール購読ユーザ';
$string['subscribestart'] = 'このフォーラムの投稿をメール購読する';
$string['subscribestop'] = 'このフォーラムの投稿をメール購読しない';
$string['subscription'] = 'メール購読';
$string['subscriptionandtracking'] = '購読およびトラッキング';
$string['subscriptionauto'] = '自動購読';
$string['subscriptiondisabled'] = '購読停止';
$string['subscriptionforced'] = '強制購読';
$string['subscription_help'] = '<p>メール購読を行うことにより、登録者にはすべての投稿内容がメール配信されます。(メールは記事の投稿 <?php echo $CFG->maxeditingtime/60 ?> 分後に配信されます。)</p>

<p>通常、それぞれがフォーラムでメール購読するかどうか選択することができます。</p>

<p>教師が特定のフォーラムへ強制的に全員を登録したときは、クラスの全員に投稿内容がメール配信されます。</p>

<p>この機能は、ニュースフォーラムや新たにコースを開講するときに特に便利です。(事前にメールアドレスを学生自身で登録する必要があります。)</p>';
$string['subscriptionmode'] = '購読モード';
$string['subscriptionmode_help'] = '参加者がフォーラムを購読する場合、フォーラム投稿内容のコピーをメール受信することを意味します。

購読モードには以下4つのオプションがあります:

* 任意購読 - 参加者は購読するかどうか選択することができます。
* 強制購読 - すべての参加者が購読登録され、購読解除することはできません。
* 自動購読 - 最初にすべての参加者が購読登録されますが、いつでも購読解除することができます。
* 購読停止 - 購読は許可されません。

注意: すべての購読モード変更は将来的にコースに登録するユーザのみに影響して、既存のユーザには影響しません。';
$string['subscriptionoptional'] = '任意購読';
$string['subscriptions'] = 'メール購読';
$string['thisforumisthrottled'] = 'このフォーラムでは、期限内にあなたが投稿できる投稿数を制限しています - 現在 {$a->blockperiod} で {$a->blockafter} 回に設定されています。';
$string['timedposts'] = '時間制限投稿';
$string['timestartenderror'] = '表示終了日を表示開始日より先にすることはできません。';
$string['trackforum'] = '投稿を未読管理する';
$string['tracking'] = '未読管理';
$string['trackingoff'] = 'Off';
$string['trackingon'] = '強制';
$string['trackingoptional'] = '任意';
$string['trackingtype'] = '未読管理';
$string['trackingtype_help'] = 'この設定を有効にした場合、参加者はフォーラムおよびディスカッションの投稿の既読および未読を管理することができます。設定には以下3つのオプションがあります:

任意: 参加者は管理ブロック内のリンクで未読管理を有効または無効にすることができます。
強制: ユーザ設定にかかわらず、常に未読管理します。管理設定により、利用できます。
Off: 未読管理しません。';
$string['unread'] = '未読';
$string['unreadposts'] = '未読の投稿';
$string['unreadpostsnumber'] = '未読件数 {$a}';
$string['unreadpostsone'] = '未読件数 1';
$string['unsubscribe'] = 'このフォーラムのメール購読を解除する';
$string['unsubscribeall'] = 'すべてのフォーラムのメール購読を解除する';
$string['unsubscribeallconfirm'] = '現在、あなたは {$a} 件のフォーラムをメール購読しています。本当にすべてのフォーラムのメール購読を解除およびフォーラム自動メール購読を無効にしてもよろしいですか?';
$string['unsubscribealldone'] = 'すべてのフォーラムのメール購読が解除されました。まだ、あなたにはメール購読が強制されているフォーラムから通知が送信されます。フォーラム通知を管理するには、マイプロファイル設定のメッセージングにアクセスしてください。';
$string['unsubscribeallempty'] = '申し訳ございません、あなたがメール購読しているフォーラムはありません。すべてのフォーラム通知を無効するには、マイプロファイル設定のメッセージングにアクセスしてください。';
$string['unsubscribed'] = 'メール購読を解除しました。';
$string['unsubscribeshort'] = 'メール購読解除';
$string['usermarksread'] = '投稿を手動で既読にする';
$string['viewalldiscussions'] = 'すべてのディスカッションを表示する';
$string['warnafter'] = '警告までの投稿閾値';
$string['warnafter_help'] = '指定された時間内に指定された記事数以上を投稿した場合、学生に警告が表示されます。この設定では何件の投稿後に警告が表示されるか指定します。ケイパビリティ「mod/forum:postwithoutthrottling」が割り当てられたユーザは投稿制限から除外されます。';
$string['warnformorepost'] = '警告! このフォーラムには1件以上のディスカッションがあります - 直近のディスカッションを使用します。';
$string['yournewquestion'] = 'あなたの新しい質問';
$string['yournewtopic'] = 'あなたの新しいディスカッショントピック';
$string['yourreply'] = 'あなたの返信';
