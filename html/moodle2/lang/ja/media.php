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
 * Strings for component 'media', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Flashアニメーション';
$string['flashanimation_desc'] = '拡張子 *.swf のファイルです。セキュリティ上の理由から、このフィルタは信用されるテキストのみに使用されます。';
$string['flashvideo'] = 'Flashビデオ';
$string['flashvideo_desc'] = '拡張子 *.flv および *.f4v のファイルです。Flowplayerを使用してビデオクリップを再生します。FlashプラグインおよびJavaスクリプトが必要です。複数ソースが指定された場合、HTML5ビデオフォールバックが使用されます。';
$string['html5audio'] = 'HTML5オーディオ';
$string['html5audio_desc'] = '拡張子 *.ogg、*.acc等のオーディオファイルです。最新のブラウザのみに互換性があります。残念ですが、すべてのブラウザでサポートされるわけではありません。代替策として、# で区切ったフォールバックを指定することができます (例: http://example.org/audio.acc#http://example.org/audio.acc#http://example.org/audio.mp3#)。古いブラウザのフォールバックとして、QuickTimeプレイヤーが使用されます。フォールバックにはすべてのオーディオタイプを指定することができます。';
$string['html5video'] = 'HTML5ビデオ';
$string['html5video_desc'] = '拡張子 *.webm、*.m4v、*.ogv、*.mp4等のオーディオファイルです。最新のブラウザのみに互換性があります。残念ですが、すべてのブラウザでサポートされるわけではありません。代替策として、# で区切ったフォールバックを指定することができます (例: http://example.org/video.m4v#http://example.org/video.acc#http://example.org/video.ogv#d=640x480)。古いブラウザのフォールバックとして、QuickTimeプレイヤーが使用されます。';
$string['legacyheading'] = 'レガシーメディアプレイヤー';
$string['legacyheading_desc'] = '一般的な使用に対して、次のフォーマットは推奨されません。これらのフォーマットは、イントラネット内に設置された中央で管理されたクライアントに使用されます。';
$string['legacyquicktime'] = 'QuickTimeプレイヤー';
$string['legacyquicktime_desc'] = '拡張子 *.mov、*.mp4、*.m4a、*.mp4 および *.mpg のファイルです。 QuickTimeプレイヤーまたはコーデックを必要とします。';
$string['legacyreal'] = 'Realメディアプレイヤー';
$string['legacyreal_desc'] = '拡張子 *.rm, *.ra、*.ram、*.rp、*.rv のファイルです。 Realプレイヤーを必要とします。';
$string['legacywmp'] = 'Windowsメディアプレイヤー';
$string['legacywmp_desc'] = '拡張子 *.avi および *.wmv のファイルです。WindowsのInternet Explorerに完全互換します。恐らく、他のブラウザまたはオペレーティングシステムにおいて、問題が生じる可能性があります。';
$string['mediaformats'] = '利用可能なプレイヤー';
$string['mediaformats_desc'] = 'これらの設定において、プレイヤーが有効にされた場合、メディアフィルタ (有効にされた場合)、ファイルまたは埋め込みオプションを設定したＵＲＩリソースによって、ファイルを埋め込むことができます。有効にされていない場合、これらのフォーマットは埋め込まれません。同時にユーザは手動でダウンロードまたはこれらのリソースのリンクをたどることができます。

2つのプレイヤーが同じフォーマットをサポートする場合、モバイルフォン等、異なるデバイスでの互換性が増します。単一のオーディオまたはビデオクリップに対して、異なるフォーマットのファイルを複数提供することにより、互換性を増すことができます。';
$string['mediasettings'] = 'メディア埋め込み';
$string['mp3audio'] = 'MP3オーディオ';
$string['mp3audio_desc'] = '拡張子 *.mp3 のファイルです。Flowplayerを使用して再生します。Flashプラグインを必要とします。';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Vimeoビデオ共有サイトです。';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'YouTubeビデオ共有サイトです。ビデオおよびプレイリストリンクがサポートされています。';
