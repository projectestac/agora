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
 * Strings for component 'cachestore_mongodb', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'データベース';
$string['database_help'] = '使用するデータベース名です。';
$string['extendedmode'] = '拡張キーを使用する';
$string['extendedmode_help'] = '有効にした場合、プラグインとの連携にフルキーセットが使用されます。現在のところ、内部的には使用されませんが、あなたは簡単にMongoDBプラグインを検索および調査することができます。この設定を有効にすることで、少しだけ負荷が増大します。そのため、あなたが必要な場合のみ有効にしてください。';
$string['password'] = 'パスワード';
$string['password_help'] = '接続に使用されるユーザパスワードです。';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'レプリカセット';
$string['replicaset_help'] = '接続するレプリカセット名です。この名称が設定された場合、シードのismasterデータベースコマンドを使ってマスタが決定されます。そのため、リスト内に存在しないサーバであっても、ドライバは接続することができます。';
$string['server'] = 'サーバ';
$string['server_help'] = 'これはあなたが使用したいサーバへの接続ストリングです。カンマで分離することで、複数サーバを指定することができます。';
$string['testserver'] = 'テストサーバ';
$string['testserver_desc'] = 'これはあなたが使用したいテストサーバへの接続ストリングです。テストサーバは完全に任意です。テストサーバを指定することで、あなたはこのストアに関するPHPunitテストおよびパフォーマンステストを実行することができます。';
$string['username'] = 'ユーザ名';
$string['username_help'] = '接続に使用されるユーザ名です。';
$string['usesafe'] = 'セーフを使用する';
$string['usesafe_help'] = '有効にした場合、挿入、取得および削除処理時にusesafeオプションが使用されます。あなたがレプリカセットを指定している場合、この設定は強制されます。';
$string['usesafevalue'] = 'セーフ値を使用する';
$string['usesafevalue_help'] = 'あなたはsafeオプションの使用に関して、特定の値を指定することができます。ここでは完了したとみなされる前に、処理を完了する必要のあるサーバ数を決定します。';
