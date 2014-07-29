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
 * Strings for component 'block', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   block
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtodock'] = 'ドックに移動する';
$string['anypagematchingtheabove'] = '上記に合致するページすべて';
$string['appearsinsubcontexts'] = 'サブコンテクストに表示する';
$string['assignrolesinblock'] = '{$a} ブロックにロールを割り当てる';
$string['blocksettings'] = 'ブロック設定';
$string['bracketfirst'] = '{$a} (最初)';
$string['bracketlast'] = '{$a} (最後)';
$string['configureblock'] = '{$a} ブロックを設定する';
$string['contexts'] = 'ページコンテクスト';
$string['contexts_help'] = 'コンテクストはオリジナルブロックのロケーション内でこのブロックを表示することのできる、さらに特定のページタイプです。オリジナルブロックのロケーションおよび現在のロケーションに応じて、あなたには異なるオプションがあります。例えば、コースにブロックを追加して (すべてのサブページに表示されるようにした後) フォーラム内に移動します。再度ブロック設定を編集してフォーラムページ内でのみ表示されるよう制限することで、あなたはコース内のフォーラムページのみでブロックを表示するよう制限することができます。';
$string['createdat'] = 'オリジナルブロックロケーション';
$string['createdat_help'] = 'ブロックが作成されるオリジナルの場所です。ブロック設定によりオリジナルロケーション内の他のロケーション (コンテクスト) にブロックを表示することができます。例えば、コースページに作成されたブロックはそのコースの活動内に表示させることもできます。フロントページに作成されたブロックはサイト全体を通して表示させることができます。';
$string['defaultregion'] = 'デフォルトの場所';
$string['defaultregion_help'] = 'テーマではブロックを表示するために、1つまたはそれ以上の名称付きブロック領域を定義することができます。この設定では、あなたがこのブロックをデフォルトで表示させたい場所を定義します。必要であれば、特定のページ上で場所をオーバーライド (優先) させることができます。';
$string['defaultweight'] = 'デフォルトの加重';
$string['defaultweight_help'] = 'デフォルトの加重では最上部または最下部等、あなたがブロックを表示したい場所を大まかに選択することができます。最終的なロケーションはその場所のブロックすべてから計算されます (例えば、ブロック1つのみの場合、実質的にはトップに表示できます)。必要であれば、特定のページ上でこの値をオーバーライド (優先) させることができます。';
$string['deleteblock'] = '{$a} ブロックを削除する';
$string['deleteblockcheck'] = '本当にタイトル「 {$a} 」のブロックを削除してもよろしいですか?';
$string['deleteblockwarning'] = '<p>あなたは他の場所に表示されているブロックを削除しようとしています。</p><p>オリジナルブロックのロケーション: {$a->location}<br />表示されているページタイプ: {$a->pagetype}</p><p>本当に続けてもよろしいですか?</p>';
$string['deletecheck'] = '{$a} ブロックを削除しますか?';
$string['dockblock'] = '{$a} ブロックをドックする';
$string['hideblock'] = '{$a} ブロックを隠す';
$string['hidedockpanel'] = 'ドックパネルを隠す';
$string['hidepanel'] = 'パネルを隠す';
$string['moveblock'] = '{$a} ブロックを移動する';
$string['moveblockafter'] = '{$a} ブロックの後にブロックを移動する';
$string['moveblockbefore'] = '{$a} ブロックの前にブロックを移動する';
$string['moveblockhere'] = 'ここにブロックを移動する';
$string['movingthisblockcancel'] = 'このブロック ({$a}) を移動する';
$string['onthispage'] = 'このページでの設定';
$string['pagetypes'] = 'ページタイプ';
$string['pagetypewarning'] = '前回選択したページタイプを選択できないようになりました。下記より最も適切なページタイプを選択してください。';
$string['region'] = '場所';
$string['restrictpagetypes'] = 'ページタイプに表示する';
$string['showblock'] = '{$a} ブロックを表示する';
$string['showoncontextandsubs'] = '「 {$a} 」およびそのページ内すべてに表示する';
$string['showoncontextonly'] = '「 {$a} 」のみに表示する';
$string['showonentiresite'] = 'サイト全体に表示する';
$string['showonfrontpageandsubs'] = 'フロントページおよびフロントページに追加されたページすべてに表示する';
$string['showonfrontpageonly'] = 'フロントページのみに表示する';
$string['subpages'] = 'ページを選択する';
$string['thisspecificpage'] = 'このページ';
$string['undockall'] = 'すべてをアンドックする';
$string['undockblock'] = '{$a} ブロックをアンドックする';
$string['undockitem'] = 'このアイテムをアンドックする';
$string['visible'] = '可視性';
$string['weight'] = '加重';
$string['wherethisblockappears'] = 'このブロックが表示される場所';
