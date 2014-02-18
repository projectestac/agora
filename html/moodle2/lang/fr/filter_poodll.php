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
 * Strings for component 'filter_poodll', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   filter_poodll
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activate'] = 'Activer PoodLL ?';
$string['audioheight'] = 'Hauteur du lecteur Audio';
$string['audiosplash'] = 'Afficher l\'accueil Audio Simple';
$string['audiosplashdetails'] = 'L\'écran d\'accueil est affiché pour Flowplayer seulement.';
$string['audiotranscode'] = 'Conversion automatique en MP3';
$string['audiotranscodedetails'] = 'Conversion automatiquement des fichiers audio enregistrés ou téléversés au format MP3 avant de les copier de nouveau dans Moodle. A utiliser seulement lorsque vous utilisez le serveur tokyo.poodll.com.';
$string['audiowidth'] = 'Largeur du lecteur Audio';
$string['autotryports'] = 'Essayez des ports différents si la connexion échoue';
$string['bandwidth'] = 'Connexion étudiant en octets par seconde. Affecte la qualité de la Webcam.';
$string['biggallheight'] = 'Galerie vidéo (grande) : Largeur';
$string['biggallwidth'] = 'Galerie vidéo (grande) : Hauteur';
$string['capturefps'] = 'Enregistrement vidéo : Images par seconde';
$string['captureheight'] = 'Enregistrement vidéo : Hauteur';
$string['capturewidth'] = 'Enregistrement vidéo : Largeur';
$string['datadir'] = 'Répertoire des données PoodLL';
$string['datadirdetails'] = 'Sous-répertoire de Moodle, pour permettre l\'accès à certains composants et l\'accès aux fichiers de ressources multimédias comme avec Moodle 1.9. Ne doit être utilisé que pour des ressources multimédias non sensibles. PoodLL ne va pas créer ou gérer les droits d\'accès de ce dossier.';
$string['defaultplayer'] = 'Lecteur Audio/vidéo par défaut';
$string['ffmpeg'] = 'Conversion des fichiers multimédia téléversés avec FFMPEG';
$string['ffmpeg_details'] = 'FFMPEG doit être installé sur votre serveur Moodle avec désignation du chemin système. Il devra prendre en charge la conversion en MP3. Essayer d\'abord en ligne de commande. Par exemple ffmpeg-i somefile.flv somefile.mp3. C\'est encore « expérimental »';
$string['filename'] = 'Nom de fichier par défaut';
$string['filtername'] = 'Filtre PoodLL';
$string['filter_poodll_audioplayer_heading'] = 'Paramètres du lecteur audio';
$string['filter_poodll_camera_heading'] = 'Paramètres de la webcam';
$string['filter_poodll_flowplayer_heading'] = 'Paramètres du lecteur Flowplayer';
$string['filter_poodll_intercept_heading'] = 'Types de fichiers PoodLL par défaut';
$string['filter_poodll_legacy_heading'] = 'Paramètres PoodLL hérités';
$string['filter_poodll_mic_heading'] = 'Paramètres du microphone';
$string['filter_poodll_network_heading'] = 'Paramètres du réseau PoodLL';
$string['filter_poodll_playertypes_heading'] = 'Types de lecteurs par défaut';
$string['filter_poodll_videogallery_heading'] = 'Paramètres de la galerie vidéo';
$string['filter_poodll_videoplayer_heading'] = 'Paramètres du lecteur vidéo';
$string['filter_poodll_whiteboard_heading'] = 'Paramètres du tableau blanc';
$string['forum_audio'] = 'Forum PoodLL : Audio ?';
$string['forum_recording'] = 'Forum PoodLL : Enregistrement audio-vidéo activé ?';
$string['forum_video'] = 'Forum PoodLL : Vidéo ?';
$string['fp_bgcolor'] = 'Couleur Flowplayer';
$string['fpembedtype'] = 'Méthode d\'intégration Flowplayer';
$string['fp_embedtypedescr'] = 'SWF Object est la méthode la plus fiable. Flowplayer JS gère mieux les images de démarrage de prévisualisation. Si vous utilisez Flowplayer JS, pensez à désactiver les autres filtres multimédia MP3/FLV/MP4 afin d\'éviter un double filtrage.';
$string['fp_enableplaylist'] = 'Activer la playlist audio Flowplayer';
$string['fp_enableplaylistdescr'] = 'Cela nécessite la librairie javascript jQuery et ajoute environ 100kb à la taille de la page de téléchargement. Si Moodle est en cache, il ne devrait y avoir aucun ralentissement notable. Vous devez également choisir Flowplayer js. Purgez le cache après ce changement pour n\'importe quelle configuration flowplayer.';
$string['handleflv'] = 'Accepter les fichiers FLV';
$string['handlemov'] = 'Accepter les fichiers MOV';
$string['handlemp3'] = 'Accepter les fichiers MP3';
$string['handlemp4'] = 'Accepter les fichiers MP4';
$string['html5controls'] = 'Contrôles HTML5';
$string['html5fancybutton'] = 'Utilisez le bouton de téléversement';
$string['html5play'] = 'Lecture en HTML5';
$string['html5rec'] = 'Enregistrement en HTML5';
$string['html5use_heading'] = 'Quand on choisit HTML5';
$string['html5widgets'] = 'Widgets PoodLL HTML5';
$string['journal_audio'] = 'Journal PoodLL : Audio ?';
$string['journal_recording'] = 'Journal PoodLL : Activer les enregistrements audio-vidéo ?';
$string['journal_video'] = 'Journal PoodLL : Vidéo ?';
$string['micecho'] = 'Echo du micro';
$string['micgain'] = 'Gain du micro';
$string['micloopback'] = 'Bouclage du micro';
$string['micrate'] = 'Volume du micro';
$string['micsilencelevel'] = 'Niveau du silence micro';
$string['miniplayerwidth'] = 'Largeur du mini-lecteur';
$string['newpairheight'] = 'Hauteur du Widget PairWork';
$string['newpairwidth'] = 'Largeur du Widget PairWork';
$string['nopoodllresource'] = '--- Sélection de la ressource PoodLL ---';
$string['overwrite'] = 'Écraser aussi ?';
$string['picqual'] = 'Cible Webcam qual. 1 - 10';
$string['screencapturedevice'] = 'Nom du périphérique de capture d\'écran';
$string['serverhttpport'] = 'Port du serveur PoodLL (HTTP)';
$string['serverid'] = 'Identifiant du serveur PoodLL';
$string['servername'] = 'Adresse de l\'hôte PoodLL';
$string['serverport'] = 'Port du serveur PoodLL (RTMP)';
$string['settings'] = 'Paramètres du fitre PoodLL';
$string['showheight'] = 'Hauteur du lecteur de copie d\'écran';
$string['showwidth'] = 'Largeur du lecteur de copie d\'écran';
$string['smallgallheight'] = 'Hauteur de la galerie vidéo (petit)';
$string['smallgallwidth'] = 'Largeur de la galerie vidéo (petit)';
$string['studentcam'] = 'Nom choisi pour l\'appareil photo';
$string['studentmic'] = 'Nom choisi pour le microphone';
$string['talkbackheight'] = 'Hauteur du lecteur de retour du son';
$string['talkbackwidth'] = 'Largeur du lecteur de retour du son';
$string['thumbnailsplash'] = 'Utiliser une image de prévisualisation comme accueil.';
$string['thumbnailsplashdetails'] = 'Utilise la première image de la vidéo comme image de démarrage. N\'utilisez ceci que lorsque vous utilisez tokyo.poodll.com comme serveur.';
$string['transcode_heading'] = 'Paramètres de conversion Audio/Vidéo';
$string['usecourseid'] = 'Utiliser un identifiant de cours ?';
$string['videoheight'] = 'Hauteur du lecteur vidéo';
$string['videosplash'] = 'Afficher l\'accueil simple vidéo';
$string['videosplashdetails'] = 'L\'écran d\'accueil est seulement affiché pour Flowplayer.';
$string['videotranscode'] = 'Conversion automatique en MP4';
$string['videotranscodedetails'] = 'Conversion automatique des fichiers vidéo enregistrés ou téléversés au format MP4 avant de copier de nouveau dans Moodle. N\'utilisez cette fonctionnalité que lorsque vous utilisez tokyo.poodll.com comme serveur.';
$string['videowidth'] = 'Largeur du lecteur vidéo';
$string['wboardheight'] = 'Hauteur du tableau blanc';
$string['wboardwidth'] = 'Largeur du tableau blanc';
$string['wordplayerfontsize'] = 'Taille du texte du lecteur';
