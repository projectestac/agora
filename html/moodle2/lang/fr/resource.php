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
 * Strings for component 'resource', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   resource
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clicktodownload'] = 'Cliquer le lien {$a} pour télécharger le fichier.';
$string['clicktoopen2'] = 'Cliquer le lien {$a} pour afficher le fichier.';
$string['configdisplayoptions'] = 'Sélectionner toutes les options à mettre à disposition des utilisateurs. Les réglages existants ne sont pas modifiés. Vous pouvez sélectionner plusieurs champs simultanément.';
$string['configframesize'] = 'Quand une page web ou un fichier est affiché dans un cadre (frame), cette valeur indique (en pixels) la taille du cadre contenant la navigation (en haut de la fenêtre).';
$string['configparametersettings'] = 'Détermine si par défaut la zone de configuration des paramètres est affichée ou non, lors de l\'ajout de nouvelles ressources. Après la première utilisation, ce réglage devient individuel.';
$string['configpopup'] = 'Réglage utilisé par défaut lors de l\'ajout d\'une ressource pouvant être affichée dans une fenêtre pop-up';
$string['configpopupdirectories'] = 'Les fenêtres pop-up affichent le lien du dossier par défaut';
$string['configpopupheight'] = 'Hauteur par défaut des fenêtres pop-up';
$string['configpopuplocation'] = 'La barre de l\'URL est affichée par défaut dans les fenêtres pop-up';
$string['configpopupmenubar'] = 'La barre des menus est affichée par défaut dans les fenêtres pop-up';
$string['configpopupresizable'] = 'Les fenêtres pop-up sont redimensionnables par défaut';
$string['configpopupscrollbars'] = 'Les barres de défilement sont affichées par défaut dans les fenêtres pop-up';
$string['configpopupstatus'] = 'La barre d\'état est affichée par défaut dans les fenêtres pop-up';
$string['configpopuptoolbar'] = 'La barre des outils est affichée par défaut dans les fenêtres pop-up';
$string['configpopupwidth'] = 'Largeur par défaut des fenêtres pop-up';
$string['contentheader'] = 'Contenu';
$string['displayoptions'] = 'Options d\'affichage disponibles';
$string['displayselect'] = 'Affichage';
$string['displayselectexplain'] = 'Choisir le type d\'affichage. Tous les types ne sont pas adéquats pour tous les fichiers.';
$string['displayselect_help'] = 'Ce réglage, ainsi que le type de fichier et la capacité du navigateur à intégrer des objets (<i>embedding</i>), détermine la façon dont le fichier est affiché. Les options sont :

* Automatique : la meilleure option d\'affichage pour le type de fichier concerné est automatiquement sélectionnée
* Intégrer : le fichier est affiché dans la page au-dessous de la barre de navigation, avec la description du fichier et tous les blocs
* Forcer le téléchargement : l\'utilisateur est invité à télécharger le fichier
* Ouvrir : le fichier est affiché tout seul dans la fenêtre du navigateur
* Fenêtre surgissante : le fichier est affiché dans une nouvelle fenêtre de navigateur sans menus ni barre d\'adresse
* Dans un cadre : le fichier est affiché dans un cadre en dessous de la barre de navigation et de la description du fichier
* Nouvelle fenêtre : le fichier est affiché dans une nouvelle fenêtre du navigateur, avec menus et barre d\'adresse';
$string['dnduploadresource'] = 'Créer une ressource fichier';
$string['encryptedcode'] = 'Code chiffré';
$string['filenotfound'] = 'Fichier introuvable.';
$string['filterfiles'] = 'Types de fichiers à filtrer';
$string['filterfilesexplain'] = 'Sélectionner le type des fichiers dont le contenu doit être filtré. Veuillez remarquer que ceci peut causer des problèmes pour certaines applications Flash et Java. Assurez-vous que l\'encodage de tous les fichiers textes est UTF-8.';
$string['filtername'] = 'Liens automatiques des noms des ressources';
$string['forcedownload'] = 'Forcer le téléchargement';
$string['framesize'] = 'Hauteur du cadre';
$string['legacyfiles'] = 'Migration des anciens fichiers du cours';
$string['legacyfilesactive'] = 'Activée';
$string['legacyfilesdone'] = 'Terminée';
$string['modulename'] = 'Fichier';
$string['modulename_help'] = 'Le module fichier permet à l\'enseignant de fournir un fichier comme ressource d\'apprentissage dans un cours. Lorsque c\'est possible, le fichier est affiché dans la page du cours ; sinon, les participants auront le choix de le télécharger. Le fichier peut comporter des fichiers dépendants, par exemple un fichier HTML pourra contenir des images ou des objets Flash.

Les participants doivent bien entendu disposer sur leur ordinateur du logiciel adéquat pour lire le fichier.

Un fichier peut être utilisé pour

* partager un diaporama avec une classe
* inclure un mini site web comme ressource de cours
* fournir des fichiers partiellement terminés que les participants doivent modifier et remettre terminés comme devoir';
$string['modulenameplural'] = 'Fichiers';
$string['neverseen'] = 'Jamais consulté';
$string['notmigrated'] = 'Cet ancien type de ressource ({$a}) n\'a pas été copié.';
$string['optionsheader'] = 'Afficher les options';
$string['page-mod-resource-x'] = 'Toute page du module fichier';
$string['pluginadministration'] = 'Administration des ressources';
$string['pluginname'] = 'Fichier';
$string['popupheight'] = 'Hauteur de la fenêtre (en pixels)';
$string['popupheightexplain'] = 'Indique la hauteur par défaut des fenêtres surgissantes.';
$string['popupresource'] = 'Cette ressource apparaîtra dans une fenêtre pop-up';
$string['popupresourcelink'] = 'Dans le cas contraire, cliquez ici : {$a}';
$string['popupwidth'] = 'Largeur de la fenêtre (en pixels)';
$string['popupwidthexplain'] = 'Indique la largeur par défaut des fenêtres surgissantes.';
$string['printintro'] = 'Afficher la description de la ressource';
$string['printintroexplain'] = 'Indique s\'il faut afficher la description de la ressource au-dessus du contenu. Certains types d\'affichage n\'afficheront toutefois pas cette description, même lorsque l\'option est activée.';
$string['resource:addinstance'] = 'Ajouter une ressource';
$string['resourcecontent'] = 'Fichiers et sous-dossiers';
$string['resourcedetails_sizetype'] = '{$a->size} {$a->type}';
$string['resource:exportresource'] = 'Exporter des ressources';
$string['resource:view'] = 'Voir les ressources';
$string['selectmainfile'] = 'Veuillez choisir le fichier principal en cliquant sur son icône.';
$string['showsize'] = 'Afficher la taille';
$string['showsize_desc'] = 'Afficher la taille sur la page du cours ?';
$string['showsize_help'] = 'Permet d\'afficher la taille, par exemple « 3.1 Mo », à côté du lien vers le fichier.

Si la ressource contient plusieurs fichiers, la taille totale est affichée.';
$string['showtype'] = 'Afficher le type';
$string['showtype_desc'] = 'Afficher le type du fichier, par exemple « Document Word », sur la page de cours ?';
$string['showtype_help'] = 'Permet d\'afficher le type du fichier, par exemple « Document Word », à côté du lien vers le fichier.

Si la ressource contient plusieurs fichiers, le type du premier d\'entre eux est affiché.

Si le système ne reconnaît pas le type du fichier, ce dernier ne sera pas affiché.';
