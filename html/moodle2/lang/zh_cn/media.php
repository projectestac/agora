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
 * Strings for component 'media', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Flash动画';
$string['flashanimation_desc'] = '扩展名为*.swf的文件。出于安全原因，此过滤器只对可信文本有效。';
$string['flashvideo'] = 'Flash视频';
$string['flashvideo_desc'] = '扩展名为*.flv和*.f4v的文件。使用Flowplayer播放视频，需要Flash插件和javascript。如果指定了多个源，会使用HTML 5视频候补方案。';
$string['html5audio'] = 'HTML 5音频';
$string['html5audio_desc'] = '扩展名为*.ogg和*.aac等的文件。只和最新的web浏览器兼容，但不幸的是没有任何一种格式被所有浏览器支持。
解决方法是用#分隔多个候补（例如：http://example.org/audio.aac#http://example.org/audio.aac#http://example.org/audio.mp3#）。在旧浏览器会使用QuickTime播放器做为候补。候补可以是任意音频类型。';
$string['html5video'] = 'HTML 5视频';
$string['html5video_desc'] = '扩展名为*.webm、*.m4v、*.ogv和*.mp4等的文件。只和最新的web浏览器兼容，但不幸的是没有任何一种格式被所有浏览器支持。
解决方法是用#分隔多个候补（例如：http://example.org/video.m4v#http://example.org/video.acc#http://example.org/video.ogv#d=640x480）。在旧浏览器会使用QuickTime播放器做为候补。';
$string['legacyheading'] = '旧的媒体播放器';
$string['legacyheading_desc'] = '下列格式不建议在日常使用。它们通常都用在安装了由中心管理的客户端的内部网络。';
$string['legacyquicktime'] = 'QuickTime播放器';
$string['legacyquicktime_desc'] = '扩展名是*.mov、*.mp4、*.m4a、*.mp4和*.mpg的文件。需要QuickTime播放器或解码器。';
$string['legacyreal'] = 'Real媒体播放器';
$string['legacyreal_desc'] = '扩展名是*.rm、*.ra、*.ram、*.ra和*.rv的文件。需要RealPlayer。';
$string['legacywmp'] = 'Windows媒体播放器';
$string['legacywmp_desc'] = '扩展名是*.avi和*.wmv的文件。和Windows下的Internet Explorer完全兼容，在其它浏览器或操作系统上可能有问题。';
$string['mp3audio'] = 'MP3音频';
$string['mp3audio_desc'] = '扩展名是*.mp3的文件。使用Flowplayer播放音频，需要Flash插件。';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Vimeo视频分享网站。';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'YouTube视频分享网站，支持视频和播放列表';
