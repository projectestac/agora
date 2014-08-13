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
 * Strings for component 'media', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Animación Flash';
$string['flashanimation_desc'] = 'Archivos con extensión *. swf. Por razones de seguridad este filtro sólo se utiliza en los textos de confianza.';
$string['flashvideo'] = 'Video Flash';
$string['flashvideo_desc'] = 'Archivos con extensión *. flv y *.f4v.. Reproduce clips de vídeo con Flowplayer, requiere el plugin de Flash y Javascript. Utiliza retardo de vñideo HTML 5 si se especifican varias fuentes.';
$string['html5audio'] = 'Audio HTML 5';
$string['html5audio_desc'] = 'Archivos de audio con extensión *. ogg, *.cc y otras Es compatible solo con los navegadores web más recientes; por desgracia no existe un formato compatible con todos los navegadores. La solución alternativa es especificar retrocesos separados por # (ej: http://example.org/audio.acc /audio.acc http://example.org /audio.mp3 #), El visualizador QuickTime se utiliza para navegadores antiguos con cualquier tipo de audio.';
$string['html5video'] = 'Video HTML 5';
$string['html5video_desc'] = 'Archivos de video con extensión *. webm, *. m4v, *.ogv., *. mp4 y otros. Es compatible solo con los navegadores web más recientes; por desgracia no existe un formato compatible con todos los navegadores. La solución consiste en especificar las fuentes de retrocesos separados por # (# (ex: http://example.org/video.m4v#http://example.org/video.acc#http://example.org/video.ogv#d=640x480). El reproductor de QuickTime se utiliza para navegadores antiguos.';
$string['legacyheading'] = 'Reproductores multimedia antiguos';
$string['legacyheading_desc'] = 'Estos reproductores no se utilizan chabitualmente en la Web y requieren extensiones del navegador que no están habitualmente instaladas.';
$string['legacyquicktime'] = 'Reproducor QuickTime';
$string['legacyquicktime_desc'] = 'Archivos con extensión *. mov, *. mp4, *. m4a, *. mp4 y *. mpg. Requiere el reproductor QuickTime o "codecs"';
$string['legacyreal'] = 'Reproductor Media Player';
$string['legacyreal_desc'] = 'Archivos con extensión *.rm, *.ra, *.ram, *.rp, *.rv Requiere RealPlayer';
$string['legacywmp'] = 'Windows Media Player';
$string['legacywmp_desc'] = 'Archivos con extensión *. avi y *. wmv. Totalmente compatible con Internet Explorer en Windows, puede dar problemas en otros navegadores o sistemas operativos.';
$string['mediaformats'] = 'Reproductores disponibles';
$string['mediaformats_desc'] = 'Cuando se habilitan reproductores en estas configuraciones, los archivos pueden incrustarse empleando el filtro multimedia (si está habilitado) o mediante un recurso de Archivo o URL con la opción de incrustar. Cuando no están habilitados, estos formatos no son incrustables y los usuarios pueden descargarlos manualmente o seguir las ligas hacia estos recursos.

Cuando dos reproductores soportan el mismo formato, el habilitar ambos aumenta la compatibilidad entre diferentes dispositivos como teléfonos móviles. Es posible aumentar aún más la compatibilidad al proporcionar archivos múltiples en diferentes formatos para cada clip de audio  o video.';
$string['mediasettings'] = 'Incrustación de multimedia';
$string['mp3audio'] = 'Audio MP3';
$string['mp3audio_desc'] = 'Archivos con extensión *. avi y *. wmv. Totalmente compatible con Internet Explorer en Windows, puede dar problemas en otros navegadores o sistemas operativos.';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Sitio de compartición de vídeo de Vimeo';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'Sitio de compartición de vídeo de Youtube, video y enlaces a la lista de reproducción soportados';
