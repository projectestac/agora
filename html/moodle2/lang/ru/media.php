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
 * Strings for component 'media', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Flash-анимация';
$string['flashanimation_desc'] = 'Файлы с расширением *.swf. Из соображений безопасности этот фильтр используется только в доверительных текстах.';
$string['flashvideo'] = 'Видео Flash';
$string['flashvideo_desc'] = 'Файлы с расширением *.flv и *.f4v. Воспроизведение видеоклипов с помощью Flowplayer требует плагина Flash и javascript. При указании разнородных источников используется альтернативное HTML 5 видео.';
$string['html5audio'] = 'Аудио HTML 5';
$string['html5audio_desc'] = 'Аудиофайлы с расширением *.ogg, *.acc и другие. Они совместимы с последними веб-браузерами, но к сожалению, нет единого формата, поддерживаемого всеми браузерами.  Решением может быть указание альтернатив, разделённых # (например: http://example.org/audio.ogg#http://example.org/audio.acc#http://example.org/audio.mp3#).
Плеер QuickTime используется как запасной для старых браузеров и любого типа аудио.';
$string['html5video'] = 'Видео HTML 5';
$string['html5video_desc'] = 'Видеофайлы с расширением *.webm, *.m4v, *.ogv, *.mp4 и другие. Они являются совместимыми с последними веб-браузерами но, к сожалению, нет единого формата, поддерживаемого всеми браузерами. Решением может быть указание альтернатив, разделённых # (например: http://example.org/video.m4v#http://example.org/video.acc#http://example.org/video.ogv#d=640x480).
Плеер QuickTime используется как запасной для старых браузеров.';
$string['legacyheading'] = 'Устаревшие медиаплееры';
$string['legacyheading_desc'] = 'Следующие форматы не рекомендуются для широкого использования, они обычно используются в интранет с централизованным управлением клиентами.';
$string['legacyquicktime'] = 'Плеер QuickTime';
$string['legacyquicktime_desc'] = 'Файлы с расширением *.mov, *.mp4, *.m4a, *.mp4 и *.mpg. Необходим плеер QuickTime или кодеки.';
$string['legacyreal'] = 'Плеер Real media';
$string['legacyreal_desc'] = 'Файлы с расширением *.rm, *.ra, *.ram, *.rp, *.rv. Необходим RealPlayer.';
$string['legacywmp'] = 'Плеер Windows Media';
$string['legacywmp_desc'] = 'Файлы с расширением *.avi и *.wmv. Полностью совместимы с Internet Explorer в Windows, но могут быть проблематичными в других браузерах или операционных системах.';
$string['mediaformats'] = 'Доступные плееры';
$string['mediasettings'] = 'Медиа-вложение';
$string['mp3audio'] = 'Аудио MP3';
$string['mp3audio_desc'] = 'Файлы с расширением *.mp3. Воспроизведение звука с помощью Flowplayer, требуется плагин Flash.';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Vimeo - сайт обмена видео.';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'YouTube - сайт обмена видео. Поддерживаются ссылки на видео и плейлисты.';
