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
 * Strings for component 'media', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Animació Flash';
$string['flashanimation_desc'] = 'Fitxers amb extensió *.swf. Per raons de seguretat aquest filtre s\'utilitza només en textos de confiança.';
$string['flashvideo'] = 'Vídeo Flash';
$string['flashvideo_desc'] = 'Fitxers amb extensió *.flv i *.f4v. Reprodueix clips de vídeo utilitzant Flowplayer, Es requereix el connector de Flash i javascript. Fa servir HTML 5 com alternativa de video si s\'han especificat diverses fonts.';
$string['html5audio'] = 'HTML 5 audio';
$string['html5audio_desc'] = 'Fitxers d\'audio amb extensió *.ogg, *.aac i altres. És només compatible amb les últimes versions dels navegadors, malauradament no existeix un format que sigui compatible amb tots els navegadors.
Una solució és especificar alternatives separades per # (per exemple: http://example.org/audio.aac#http://example.org/audio.aac#http://example.org/audio.mp3#), el reproductor QuickTime és utilitzat com a alternativa pels navegadors més antics, una alternativa pot ser qualsevol tipus d\'audio.';
$string['html5video'] = 'HTML 5 vídeo';
$string['html5video_desc'] = 'Fitxers de vídeo amb extensió *.webm, *.m4v, *.ogv, *.mp4 i altres. És només compatible amb les últimes versions dels navegadors, malauradament no existeix un format que sigui compatible amb tots els navegadors.
Una solució és especificar alternatives separades per # (per exemple: http://example.org/video.m4v#http://example.org/video.aac#http://example.org/video.ogv#d=640x480), el reproductor QuickTime és utilitzat com a alternativa pels navegadors més antics.';
$string['legacyheading'] = 'Llegat de reproductors multimèdia';
$string['legacyheading_desc'] = 'Els següents formats no es recomanen per a ús general, se solen utilitzar en instal·lacions intranet amb gestió de clients centralitzada.';
$string['legacyquicktime'] = 'Reproductor QuickTime';
$string['legacyquicktime_desc'] = 'Fitxers amb extensió *.mov, *.mp4, *.m4a, *.mp4 and *.mpg. Es requereix el reproductor QuickTime o els codecs.';
$string['legacyreal'] = 'Reproductor Real Media';
$string['legacyreal_desc'] = 'Fitxers amb extensió *.rm, *.ra, *.ram, *.rp, *.rv. Es requereix el reproductor Real media.';
$string['legacywmp'] = 'Reproductor Windows Media';
$string['legacywmp_desc'] = 'Fitxers amb extensió *.avi and *.wmv. Totalment compatible amb Internet Explorer en Windows, pot ser problemàtic en altres navegadors o sistemes operatius.';
$string['mediaformats'] = 'Reproductors disponibles';
$string['mediaformats_desc'] = 'Quan els reproductors estan habilitats en aquests paràmetres, els fitxers es poden incrustar mitjançant el filtre multimèdia (si està activat) o utilitzar un recurs de Fitxer o URL amb l\'opció d\'Incrusta. Quan no està activat, aquests formats no s\'incrusten i els usuaris poden descarregar-se\'ls de forma manual o seguir els enllaços a aquests recursos.

Quan dos reproductors suporten el mateix format, habilitar els dos augmenta la compatibilitat amb diferents dispositius com ara telèfons mòbils. És possible augmentar la compatibilitat més encara proporcionant diversos fitxers en diferents formats per a un àudio senzill o un videoclip.';
$string['mediasettings'] = 'Incrustació de fitxers multimèdia';
$string['mp3audio'] = 'Àudio MP3';
$string['mp3audio_desc'] = 'Fitxers amb extensió *.mp3. Reprodueix àudio utilitzant Flowplayer, requereix el connector de Flash.';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Lloc Vimeo de vídeo per compartir.';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'Lloc YouTube de vídeo per compartir, amb suport a enllaços a vídeos i llistes de reproducció.';
