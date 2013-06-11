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
 * Strings for component 'block_rss_client', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   block_rss_client
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addfeed'] = 'ニュースフィードURIを追加する:';
$string['addheadlineblock'] = 'RSSヘッドラインブロックを追加する';
$string['addnew'] = 'RSSを追加する';
$string['addnewfeed'] = '新しいフィードを追加する';
$string['cannotmakemodification'] = '現在、あなたは、このRSSフィードを修正することはできません。';
$string['choosefeedlabel'] = 'あなたがこのブロックで使用したいフィードを選択してください:';
$string['clientchannellink'] = 'ソースサイト ...';
$string['clientnumentries'] = '表示するフィードごとのデフォルトエントリ数です。';
$string['clientshowchannellinklabel'] = 'オリジナルサイト (チャンネルリンク) のリンクを表示しますか? (ニュースフィードにリンクが提供されていない場合、リンクは表示されませんので注意してください):';
$string['clientshowimagelabel'] = '利用可能な場合、チャンネルイメージを表示する:';
$string['configblock'] = 'このブロックを設定する';
$string['couldnotfindfeed'] = '指定されたIDのフィードが見つかりませんでした。';
$string['customtitlelabel'] = 'カスタムタイトル (フィードより提供されたタイトルを使用する場合は空白):';
$string['deletefeedconfirm'] = '本当にこのフィードを削除してもよろしいですか?';
$string['disabledrssfeeds'] = 'RSSフィードは、無効にされています。';
$string['displaydescriptionlabel'] = 'それぞれのリンクの説明を表示しますか?';
$string['editafeed'] = 'フィードを編集する';
$string['editfeeds'] = 'RSS/Atomニュースフィードを編集、購読または購読解除する';
$string['editnewsfeeds'] = 'ニュースフィードを編集する';
$string['editrssblock'] = 'RSSヘッドラインブロックを編集する';
$string['enableautodiscovery'] = 'オートディスカバリを有効にしますか?';
$string['enableautodiscovery_help'] = '<p>このオプションを有効にすることで、フィードのリンクが提供されていない場合、Moodleは自動的にウェブページからフィードを探します。</p>

<p>例えば、Moodle DocsのURIを入力した場合:
<pre>http://docs.moodle.org</pre>
Moodleは購読するため、自動的に最新の変更に関するフィードを探します:
<pre>http://docs.moodle.org/en/index.php?title=Special:RecentChanges&amp;feed=rss</pre>
</p>';
$string['errorloadingfeed'] = 'RSSフィード ({$a}) のローディング中にエラーが発生しました。';
$string['feed'] = 'フィード';
$string['feedadded'] = '新しいフィードが追加されました。';
$string['feeddeleted'] = 'フィードが削除されました。';
$string['feeds'] = 'ニュースフィード';
$string['feedsaddedit'] = 'フィードを追加/編集する';
$string['feedsconfigurenewinstance'] = 'このブロックがRSSフィードを表示するよう設定するには、ここをクリックしてください。';
$string['feedsconfigurenewinstance2'] = 'このブロックがRSSフィードを表示できるようにするには、上の編集アイコンをクリックしてください。';
$string['feedupdated'] = 'ニュースフィードが更新されました。';
$string['feedurl'] = 'フィードURI';
$string['findmorefeeds'] = 'さらにRSSフィードを探す';
$string['managefeeds'] = 'マイフィードすべてを管理する';
$string['nofeeds'] = 'このサイトに設定されたRSSフィードはありません。';
$string['numentries'] = 'フィードあたりのエントリ数';
$string['pickfeed'] = 'ニュースフィードを取得する';
$string['pluginname'] = 'リモートRSSフィード';
$string['remotenewsfeed'] = 'リモートニュースフィード';
$string['rss_client:addinstance'] = '新しいリモートRSSフィードブロックを追加する';
$string['rss_client:createprivatefeeds'] = 'プライベートRSSフィードを作成する';
$string['rss_client:createsharedfeeds'] = '共有RSSフィードを作成する';
$string['rss_client:manageanyfeeds'] = 'すべてのRSSフィードを管理する';
$string['rss_client:manageownfeeds'] = '自分のRSSフィードを管理する';
$string['rss_client:myaddinstance'] = '新しいリモートRSSフィードブロックをマイホームに追加する';
$string['seeallfeeds'] = 'すべてのフィードを表示する';
$string['sharedfeed'] = '共有フィード';
$string['shownumentrieslabel'] = 'ブロックに表示する最大エントリ数です。';
$string['submitters'] = '誰が新しいRSSフィードを設定できますか? 設定することで、あなたのサイトのページすべてにフィードを追加することができます。';
$string['submitters2'] = '配信者';
$string['timeout'] = 'キャッシュ内のRSSフィードの有効期限が切れる時間 (分) です。この時間には有効期限の最短時間を設定します。有効期限後の次のcron実行により、キャッシュ内のRSSフィードがリフレッシュされます。推奨設定値は、30分またはそれ以上です。';
$string['timeout2'] = 'タイムアウト';
$string['timeoutdesc'] = 'RSSフィードキャッシュの保存期間 (分) です。';
$string['updatefeed'] = 'ニュースフィードURIを更新する:';
$string['viewfeed'] = 'フィードを表示する';
