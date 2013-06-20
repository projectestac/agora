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
 * Strings for component 'blog', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   blog
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addnewentry'] = '新しいエントリを追加する';
$string['addnewexternalblog'] = '外部ブログを登録する';
$string['assocdescription'] = 'あなたがコースまたは活動モジュールに関して執筆している場合、ここで選択してください。';
$string['associated'] = '関連付け {$a}';
$string['associatewithcourse'] = 'コース {$a->coursename} に関するブログ';
$string['associatewithmodule'] = '{$a->modtype}: {$a->modname} に関するブログ';
$string['association'] = '関連付け';
$string['associations'] = '関連付け';
$string['associationunviewable'] = 'コースに関連付けられるか、「公開先」フィールドが変更されるまで、他のユーザはこのエントリを閲覧できません。';
$string['autotags'] = 'これらのタグを追加する';
$string['autotags_help'] = 'あなたのローカルブログに外部ブログからエントリをコピーする場合、自動的に追加したい1つまたはそれ以上のローカルタグ (カンマ区切り) を入力してください。';
$string['backupblogshelp'] = '有効にした場合、サイト自動バックアップにブログが含まれます。';
$string['blockexternalstitle'] = '外部ブログ';
$string['blocktitle'] = 'ブログタグブロックのタイトル';
$string['blog'] = 'ブログ';
$string['blogaboutthis'] = 'この {$a->type} に関するブログ';
$string['blogaboutthiscourse'] = 'このコースのエントリを追加する';
$string['blogaboutthismodule'] = 'この {$a} に関するエントリを追加する';
$string['blogadministration'] = 'ブログ管理';
$string['blogdeleteconfirm'] = 'このブログをエントリ削除してもよろしいですか?';
$string['blogdisable'] = 'ブログは無効にされています!';
$string['blogentries'] = 'ブログエントリ';
$string['blogentriesabout'] = '{$a} に関するブログエントリ';
$string['blogentriesbygroupaboutcourse'] = '{$a->course} に関するブログエントリ by {$a->group}';
$string['blogentriesbygroupaboutmodule'] = '{$a->mod} に関するブログエントリ by {$a->group}';
$string['blogentriesbyuseraboutcourse'] = '{$a->course} に関するブログエントリ by {$a->user}';
$string['blogentriesbyuseraboutmodule'] = '{$a->mod} に関するブログエントリ by {$a->user}';
$string['blogentrybyuser'] = 'ブログエントリ by {$a}';
$string['blogpreferences'] = 'ブログ設定';
$string['blogs'] = 'ブログ';
$string['blogscourse'] = 'コースブログ';
$string['blogssite'] = 'サイトブログ';
$string['blogtags'] = 'ブログタグ';
$string['cannotviewcourseblog'] = 'あなたにはこのコースのブログを閲覧するパーミッションがありません。';
$string['cannotviewcourseorgroupblog'] = 'あなたにはこのコース/グループのブログを閲覧するパーミッションがありません。';
$string['cannotviewsiteblog'] = 'あなたにはすべてのサイトブログを閲覧するパーミッションがありません。';
$string['cannotviewuserblog'] = 'あなたにはユーザブログを閲覧するパーミッションがありません。';
$string['configexternalblogcrontime'] = '外部ブログの新しいエントリに関して、どのくらいの頻度でMoodleがチェックするか設定します。';
$string['configmaxexternalblogsperuser'] = 'それぞれのユーザがMoodleブログへのリンクを許可される外部ブログ数です。';
$string['configuseblogassociations'] = 'ブログエントリに関して、コースおよびコースモジュールへの関連付けを有効にします。';
$string['configuseexternalblogs'] = 'ユーザが外部ブログのリンクを指定できるようにします。これらのブログを定期的にMoodleが確認して、新しいエントリをMoodleユーザのブログにコピーします。';
$string['courseblog'] = 'コースブログ: {$a}';
$string['courseblogdisable'] = 'コースブログは有効にされていません。';
$string['courseblogs'] = 'ユーザはコースを共有しているユーザのブログのみ読むことができる';
$string['deleteblogassociations'] = 'ブログ関連付けを削除する';
$string['deleteblogassociations_help'] = '有効にした場合、今後ブログエントリはこのコース、コース活動またはリソースに関連付けられません。ブログエントリ自体は削除されません。';
$string['deleteexternalblog'] = 'この外部ブログの登録を解除する';
$string['deleteotagswarn'] = '本当にこれらのタグをすべてのブログ記事およびシステムから削除してもよろしいですか?';
$string['description'] = '説明';
$string['description_help'] = 'あなたの外部ブログの全般的なコンテンツに関する説明を入力してください (空白にした場合、あなたの外部ブログの説明が使用されます)。';
$string['donothaveblog'] = '申し訳ございません、あなたのブログはありません。';
$string['editentry'] = 'ブログエントリを編集する';
$string['editexternalblog'] = '外部ブログを編集する';
$string['emptybody'] = 'ブログエントリ本文を入力してください。';
$string['emptyrssfeed'] = 'あなたが入力したURIは有効なRSSフィードを指定していません。';
$string['emptytitle'] = 'ブログエントリのタイトルを入力してください。';
$string['emptyurl'] = 'あなたは有効なRSSフィードのURIを指定する必要があります。';
$string['entrybody'] = 'ブログエントリ本文';
$string['entrybodyonlydesc'] = 'エントリ説明';
$string['entryerrornotyours'] = 'これはあなたのエントリではありません。';
$string['entrysaved'] = 'あなたのエントリが保存されました。';
$string['entrytitle'] = 'エントリタイトル';
$string['entryupdated'] = 'ブログエントリが更新されました。';
$string['externalblogcrontime'] = '外部ブログのcronスケジュール';
$string['externalblogdeleteconfirm'] = 'この外部ブログの登録を解除しますか?';
$string['externalblogdeleted'] = '外部ブログの登録が解除されました。';
$string['externalblogs'] = '外部ブログ';
$string['feedisinvalid'] = 'このフィードは無効です。';
$string['feedisvalid'] = 'このフィードは有効です。';
$string['filterblogsby'] = 'エントリをフィルタする ...';
$string['filtertags'] = 'タグをフィルタする';
$string['filtertags_help'] = 'この機能により、あなたが使用したいエントリをフィルタすることができます。ここでタグ (カンマ区切り) を指定した場合、タグに関連するエントリのみ外部ブログよりコピーされます。';
$string['groupblog'] = 'グループブログ: {$a}';
$string['groupblogdisable'] = 'グループブログは有効にされていません。';
$string['groupblogentries'] = '{$a->coursename} のグループ {$a->groupname} に関連付けられているブログエントリ';
$string['groupblogs'] = 'ユーザはグループを共有しているユーザのブログのみ閲覧することができる';
$string['incorrectblogfilter'] = '正しくないブログフィルタタイプが指定されました。';
$string['intro'] = 'このRSSフィードは、1つまたはそれ以上のブログから自動生成されました。';
$string['invalidgroupid'] = '無効なグループID';
$string['invalidurl'] = 'このURIにはアクセスできません。';
$string['linktooriginalentry'] = 'オリジナルのブログエントリにリンクする';
$string['maxexternalblogsperuser'] = 'ユーザあたりの外部ブログ最大数';
$string['mustassociatecourse'] = 'コースまたはグループメンバーに公開する場合、あなたはこのエントリをコースに関連付ける必要があります。';
$string['name'] = '名称';
$string['name_help'] = 'あなたの外部ブログの説明的な名称を入力してください (空白の場合、あなたの外部ブログのタイトルが使用されます)。';
$string['noentriesyet'] = '表示できるエントリはありません。';
$string['noguestpost'] = 'ゲストはブログを投稿できません!';
$string['nopermissionstodeleteentry'] = 'あなたにはこのブログエントリを削除するための必要なパーミッションが不足しています。';
$string['norighttodeletetag'] = 'あなたはこのタグ ({$a}) を削除できません。';
$string['nosuchentry'] = 'そのようなブログエントリはありません。';
$string['notallowedtoedit'] = 'あなたはこのエントリを編集できません。';
$string['numberofentries'] = 'エントリ: {$a}';
$string['numberoftags'] = '表示するタグ数';
$string['page-blog-edit'] = 'ブログ編集ページ';
$string['page-blog-index'] = 'ブログリストページ';
$string['page-blog-x'] = 'すべてのブログページ';
$string['pagesize'] = '1ページあたりのブログエントリ数';
$string['permalink'] = 'パーマリンク';
$string['personalblogs'] = 'ユーザは自分のブログのみ閲覧できる';
$string['preferences'] = 'プリファレンス';
$string['publishto'] = '公開先:';
$string['publishtocourse'] = 'あなたとコースを共有しているユーザ';
$string['publishtocourseassoc'] = '関連コースのメンバー';
$string['publishtocourseassocparam'] = '{$a} のメンバー';
$string['publishtogroup'] = 'あなたとグループを共有しているユーザ';
$string['publishtogroupassoc'] = '関連コース内のあなたのグループメンバー';
$string['publishtogroupassocparam'] = '{$a} のあなたのグループメンバー';
$string['publishto_help'] = 'ここには以下3種類オプションがあります:

* あなたのみ閲覧可 (下書き) - あなたおよび管理者のみ、このエントリを閲覧することができます。
* このサイトの誰でも閲覧可- このサイトに登録している人は誰でも、このエントリを閲覧することができます。
* 世界中の誰でも閲覧可 - ゲストを含む誰でも、このエントリを閲覧することができます。';
$string['publishtonoone'] = 'あなたのみ閲覧可 (下書き)';
$string['publishtosite'] = 'このサイトの誰でも閲覧可';
$string['publishtoworld'] = '世界中の誰でも閲覧可';
$string['readfirst'] = '最初にお読みください。';
$string['relatedblogentries'] = '関連するブログエントリ';
$string['retrievedfrom'] = '取得先: ';
$string['rssfeed'] = 'ブログRSSフィード';
$string['searchterm'] = '検索: {$a}';
$string['settingsupdatederror'] = 'エラーが発生したため、ブログ設定は更新されませんでした。';
$string['siteblog'] = 'サイトブログ: {$a}';
$string['siteblogdisable'] = 'サイトブログは有効にされていません。';
$string['siteblogs'] = 'すべてのサイトユーザはすべてのブログを読むことができる';
$string['tagdatelastused'] = '最後に使用された日付タグ';
$string['tagparam'] = 'タグ: {$a}';
$string['tags'] = 'タグ';
$string['tagsort'] = 'タグの並べ替え方法';
$string['tagtext'] = 'タグテキスト';
$string['timefetched'] = '最終同期日時';
$string['timewithin'] = '指定した期間に使用されたタグを表示する';
$string['updateentrywithid'] = 'エントリの更新';
$string['url'] = 'RSSフィードURI';
$string['url_help'] = 'あなたの外部ブログのRSSフィードURIを入力してください。';
$string['useblogassociations'] = 'ブログ関連付けを有効にする';
$string['useexternalblogs'] = '外部ブログを有効にする';
$string['userblog'] = 'ユーザブログ: {$a}';
$string['userblogentries'] = 'ブログエントリ by {$a}';
$string['valid'] = '有効';
$string['viewallblogentries'] = 'この {$a} に関するすべてのエントリ';
$string['viewallmodentries'] = 'この {$a->type} のすべてのエントリを表示する';
$string['viewallmyentries'] = '私のエントリすべてを表示する';
$string['viewblogentries'] = 'この {$a->type} に関するエントリ';
$string['viewblogsfor'] = 'すべてのエントリを表示する ...';
$string['viewcourseblogs'] = 'このコースのエントリすべてを表示する';
$string['viewentriesbyuseraboutcourse'] = 'このコースに関する {$a} のエントリを表示する';
$string['viewgroupblogs'] = 'グループのエントリを表示する ...';
$string['viewgroupentries'] = 'グループエントリ';
$string['viewmodblogs'] = 'モジュールのエントリを表示する ...';
$string['viewmodentries'] = 'モジュールエントリ';
$string['viewmyentries'] = '私のエントリを表示する';
$string['viewmyentriesaboutcourse'] = 'このコースに関する私のエントリを表示する';
$string['viewmyentriesaboutmodule'] = 'この {$a} に関する私のエントリを表示する';
$string['viewsiteentries'] = 'すべてのエントリを表示する';
$string['viewuserentries'] = '{$a} によるエントリすべてを閲覧する';
$string['worldblogs'] = '世界中の誰でもエントリを読むことができる';
$string['wrongpostid'] = 'ブログ記事IDが正しくありません。';
