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
 * Strings for component 'media', language 'de', branch 'MOODLE_24_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Flash-Animation';
$string['flashanimation_desc'] = 'Dateien mit der Endung *.swf. Aus Sicherheitsgründen wird dieser Filter ausschließlich in vertrauensvollen Texten benutzt.';
$string['flashvideo'] = 'Flash-Video';
$string['flashvideo_desc'] = 'Dateien mit den Endungen *.flv und *.f4v. Dieser Filter spielt Videoclips mit dem FlowPlayer ab und benötigt Flash und JavaScript. Ein Fallback auf HTML5-Video ist möglich, falls mehrere Quellen angegeben sind.';
$string['html5audio'] = 'HTML5-Audio';
$string['html5audio_desc'] = 'Audio-Dateien mit den Endungen *.ogg, *.aac, *.m4a und anderen. Der Filter arbeitet nur mit aktuellen Webbrowsern, wobei es kein von allen Browsern unterstütztes Format gibt. Ein Fallback ist möglich, wenn mehrere Quellen mit # getrennt angeben sind: (z.B.  http://example.org/audio.ogg#http://example.org/audio.aac#http://example.org/audio.mp3#). Der QuickTime-Player wird als Fallback für ältere Browser verwendet.';
$string['html5video'] = 'HTML5-Video';
$string['html5video_desc'] = 'Video-Dateien mit den Endungen *.webm, *.m4v, *.ogv und *.mp4 und anderen. Der Filter arbeitet nur mit aktuellen Webbrowsern, wobei es kein von allen Browsern unterstütztes Format gibt. Ein Fallback ist möglich, wenn mehrere Quellen mit # getrennt angeben sind: (z.B. http://example.org/video.m4v#http://example.org/video.webm#http://example.org/video.ogv#d=640x480). Der QuickTime-Player wird als Fallback für ältere Browser verwendet.';
$string['legacyheading'] = 'Ältere Medienformate';
$string['legacyheading_desc'] = 'Folgende Formate werden nicht zum Gebrauch empfohlen, sie werden aber in Installationen mit zentral verwalteten Clients aber oft noch verwendet.';
$string['legacyquicktime'] = 'QuickTime Player';
$string['legacyquicktime_desc'] = 'Dateien mit den Endungen *.mov, *.mp4, *.m4a, *.mp4 und *.mpg. Dieser Filter benötigt QuickTime oder QuickTime Codecs.';
$string['legacyreal'] = 'RealPlayer';
$string['legacyreal_desc'] = 'Dateien mit der Endung *.rm, *.ra, *.ram, *.rp, *.rv. Der Filter benötigt den RealPlayer.';
$string['legacywmp'] = 'Windows Media Player';
$string['legacywmp_desc'] = 'Dateien mit den Endungen *.avi und *.wmv. Dieser Formate sind kompatibel mit dem Windows Internet Explorer, könnten aber mit anderen Browsern oder Betriebssystemen Probleme bereiten.';
$string['mediaformats'] = 'Verfügbare Medienformate';
$string['mediaformats_desc'] = 'Die Aktivierung dieser Einstellungen ermöglicht das Einbinden von Dateien über den Mediafilter (wenn aktiviert) oder die Datei bzw. URL Ressource mit Einbetten-Option. Wenn die Funktion nicht aktiviert wird, können die Dateien manuell heruntergeladen werden oder an dem angegebenen Ort aufgerufen werden.

Wenn zwei Player das gleiche Format unterstützen, können beide aktiviert werden, um den Einsatz auf unterschiedlichen Endgeräten zu unterstützen oder verschiedene Dateiformate alternativ zur Verfügung zu stellen.';
$string['mediasettings'] = 'Medienformate';
$string['mp3audio'] = 'MP3-Audio';
$string['mp3audio_desc'] = 'Dateien mit der Endung *.mp3. Der Filter spielt Audiodateien mit dem Flowplayer ab und benötigt Flash.';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Vimeo ist eine Video-Sharing-Website.';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'YouTube ist eine Video-Sharing-Website und stellt Videos und Playlists bereit.';
