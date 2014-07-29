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
 * Strings for component 'message_email', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   message_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowattachments'] = '添付を許可する';
$string['allowusermailcharset'] = 'ユーザの文字セット選択を許可する';
$string['configallowattachments'] = 'この設定を有効にした場合、サイトから送信されるメールにバッジ等を添付することができるようになります。';
$string['configallowusermailcharset'] = 'この設定を有効にした場合、ユーザはプロファイルページで自分のメール文字コードを選択することができます。';
$string['configemailonlyfromnoreplyaddress'] = 'この設定を有効にした場合、すべてのメールは「from」アドレスとしてno-replyアドレスを使用して送信されます。これは外部システムのanti-spoofing (なりすまし防止) コントロールによるメールのブロックを停止するために使用することができます。';
$string['configmailnewline'] = 'メールメッセージに使用される改行文字です。RFC 822bisによるとCRLFは必須です。いくつかのメールサーバでは自動的にLFがCRLFに変換され、他のメールサーバではCRLFがCRCRLFに誤って変換され、また、生のLFを拒否するメールサーバ (例えば、qmail) もあります。メールが送信されなかったり、改行が2重になる問題がある場合、この設定を変更してください。';
$string['confignoreplyaddress'] = 'Moodleではユーザに代わってメールが送信される場合があります (例 フォーラムの投稿)。ここで設定するメールアドレスは「From」に使用され、受信者が直接送信者に返信できないようにします (例 ユーザが自分のメールアドレスを隠すよう設定している場合)。';
$string['configsitemailcharset'] = 'この設定ではサイトから送信されるメールすべてに対して、デフォルト文字セットを指定します。';
$string['configsmtphosts'] = 'Moodleでメールを送信するときに使用する、1つ以上のローカルSMTPサーバ名を入力してください (例 mail.a.comまたはmail.a.com;mail.b.com)。デフォルト以外のポート (例 ポート25以外) を指定するには、[サーバ]:[ポート]シンタックスを使用することができます (例 mail.a.com:587)。セキュアコネクションのためには、通常、ポート465 (SSL)、ポート587 (TLS) が使用されます。必要であれば、下記にセキュリティプロトコルを指定してください。空白にした場合、MoodleはデフォルトのPHPメール送信メソッドを使用します。';
$string['configsmtpmaxbulk'] = 'SMTPセッションごとに送信するメッセージの最大数です。メッセージのグルーピングにより、メールの送信をスピードアップすることができます。2より少ない値に設定した場合、メールごとに新しいSMTPセッションの開始が強制されます。';
$string['configsmtpsecure'] = 'SMTPサーバにセキュアコネクションが必要な場合、正しいプロトコルタイプを指定してください。';
$string['configsmtpuser'] = '上でSMTPサーバを設定し、なおかつ認証が必要な場合、ユーザ名およびパスワードを入力してください。';
$string['email'] = 'メール通知送信先';
$string['emailonlyfromnoreplyaddress'] = '常にno-replyアドレスからメールを送信する';
$string['ifemailleftempty'] = '{$a} に通知を送信するには、空白にしてください。';
$string['mailnewline'] = 'メールの改行文字';
$string['none'] = 'なし';
$string['noreplyaddress'] = 'No-replyアドレス';
$string['pluginname'] = 'メール';
$string['sitemailcharset'] = '文字セット';
$string['smtphosts'] = 'SMTPホスト';
$string['smtpmaxbulk'] = 'SMTPセッション制限';
$string['smtppass'] = 'SMTPパスワード';
$string['smtpsecure'] = 'SMTPセキュリティ';
$string['smtpuser'] = 'SMTPユーザ名';
