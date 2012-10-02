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
 * Strings for component 'media', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   media
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['flashanimation'] = 'Animation Flash';
$string['flashanimation_desc'] = 'Fichiers avec l\'extension .swf. Pour des raisons de sécurité, ce filtre n\'est utilisé que dans des textes fiables.';
$string['flashvideo'] = 'Vidéo Flash';
$string['flashvideo_desc'] = 'Fichiers avec l\'extension .flv ou .f4v. Permet la lecture de séquences vidéos au moyen du lecteur Flowplayer, qui requiert le plugin Flash et l\'activation de JavaScript. Si plusieurs sources sont spécifiées, utilise la vidéo en HTML5.';
$string['html5audio'] = 'Audio HTML 5';
$string['html5audio_desc'] = 'Fichiers audio avec l\'extension *.ogg, *.acc et autres. Ce plugin n\'est compatible qu\'avec les navigateurs les plus récents. Aucun format n\'est malheureusement supporté par tous ces navigateurs.
Pour contourner ce problème, on indiquera des fichiers alternatifs, séparés par # (exemple : http://exemple.fr/audio.ogg#http://exemple.fr/audio.acc#http://exemple.fr/audio.mp3#). Le lecteur QuickTime est utilisé comme solution de remplacement avec d\'anciens navigateurs. Les formats alternatifs peuvent être de n\'importe quel type de fichier audio.';
$string['html5video'] = 'Vidéo HTML 5';
$string['html5video_desc'] = 'Fichiers vidéos avec l\'extension *.webm, *.m4v, *.ogv, *.mp4 et autres. Ce plugin n\'est compatible qu\'avec les navigateurs les plus récents. Aucun format n\'est malheureusement supporté par tous ces navigateurs. Pour contourner ce problème, on indiquera des fichiers alternatifs, séparés par # (exemple : http://exemple.fr/video.ogv#http://exemple.fr/video.m4v#http://exemple.fr/video.mp4#d=640x480). Le lecteur QuickTime est utilisé comme solution de remplacement avec d\'anciens navigateurs.';
$string['legacyheading'] = 'Lecteurs média obsolètes';
$string['legacyheading_desc'] = 'Les formats suivants ne sont pas recommandés pour un usage habituel. Ils sont plutôt utilisés dans des installation intranet avec des clients gérés de façon centralisée.';
$string['legacyquicktime'] = 'Lecteur QuickTime';
$string['legacyquicktime_desc'] = 'Fichiers avec l\'extension *.mov, *.mp4, *.m4a, *.mp4 ou *.mpg. Requier l\'installation du lecteur QuickTime ou de codecs.';
$string['legacyreal'] = 'Lecteur Real media';
$string['legacyreal_desc'] = 'Fichiers avec l\'extension *.rm, *.ra, *.ram, *.rp, *.rv. Requiert le lecteur RealPlayer.';
$string['legacywmp'] = 'Lecteur Windows media';
$string['legacywmp_desc'] = 'Fichiers avec l\'extension *.avi ou *.wmv. Compatible avec Internet Explorer sous Windows. Peut être problématique dans d\'autres navigateurs et systèmes d\'exploitation.';
$string['mediaformats'] = 'Lecteurs disponibles';
$string['mediaformats_desc'] = 'Lorsque des lecteurs sont activés ici, des fichiers peuvent être intégrés à l\'aide du filtre multimédia (s\'il est activé) ou à l\'aide de ressources de type fichier ou URL avec l\'option d\'intégration. Si les lecteurs ne sont pas activés, ces formats ne sont pas intégrés. Les utilisateurs peuvent alors télécharger manuellement ou suivre les liens vers ces ressources.

Si deux lecteurs supportent le même format, leur activation permet d\'augmenter la compatibilité avec des appareils différents, comme les téléphones portables ou les tablettes. Il est possible d\'augmenter encore cette compatibilité en fournissant un même son ou une même vidéo en plusieurs formats.';
$string['mediasettings'] = 'Intégration de média';
$string['mp3audio'] = 'Son MP3';
$string['mp3audio_desc'] = 'Fichiers avec l\'extension *.mp3. Permet la lecture de sons au moyen du lecteur Flowplayer. Requier l\'installation du plugin Flash.';
$string['sitevimeo'] = 'Vimeo';
$string['sitevimeo_desc'] = 'Site de partage de vidéos Vimeo';
$string['siteyoutube'] = 'YouTube';
$string['siteyoutube_desc'] = 'Site de partage de vidéos YouTube. Les listes de vidéos (playlists) sont supportées.';
