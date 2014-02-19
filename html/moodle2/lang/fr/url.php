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
 * Strings for component 'url', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Sélectionner une variable...';
$string['clicktoopen'] = 'Cliquer le lien {$a} pour ouvrir la ressource.';
$string['configdisplayoptions'] = 'Sélectionner toutes les options à mettre à disposition des utilisateurs. Les réglages existants ne sont pas modifiés. Vous pouvez sélectionner plusieurs champs simultanément.';
$string['configframesize'] = 'Cette valeur est la hauteur (en pixels) du cadre contenant la navigation. Elle est utilisée quand une page web ou un fichier déposé est affiché dans un cadre.';
$string['configrolesinparams'] = 'Activer cette option si vous désirez inclure les noms des rôles (en français) dans la liste des paramètres disponibles.';
$string['configsecretphrase'] = 'Ce texte secret est utilisé pour générer une valeur cryptée pouvant être envoyée vers des serveurs en tant que paramètre. La valeur cryptée est calculée par le hachâge md5 de l\'adresse IP courante, suivie de votre texte secret. Cette valeur n\'est pas à toute épreuve, car l\'adresse IP peut changer et est souvent partagée par plusieurs ordinateurs.';
$string['contentheader'] = 'Contenu';
$string['createurl'] = 'Créer une URL';
$string['displayoptions'] = 'Options d\'affichage disponibles';
$string['displayselect'] = 'Affichage';
$string['displayselectexplain'] = 'Choisir le type d\'affichage. Tous les types ne sont pas adéquats pour toutes les URLs.';
$string['displayselect_help'] = 'Ce réglage, ainsi que le type de fichier de l\'URL et la capacité du navigateur à intégrer des objets (<i>embedding</i>), détermine la façon dont le l\'URL est affichée. Les options peuvent être :

* Automatique : la meilleure option d\'affichage pour l\'URL concernée est automatiquement sélectionnée
* Intégrer : l\'URL est affichée dans la page au-dessous de la barre de navigation, avec la description de l\'URL et tous les blocs
* Ouvrir : l\'URL est affichée toute seule dans la fenêtre du navigateur
* Fenêtre surgissante : l\'URL est affichée dans une nouvelle fenêtre de navigateur sans menu ni barre d\'adresse
* Dans un cadre : l\'URL est affichée dans un cadre en dessous de la barre de navigation et de la description de l\'URL
* Nouvelle fenêtre : l\'URL est affichée dans une nouvelle fenêtre du navigateur, avec menus et barre d\'adresse';
$string['externalurl'] = 'URL externe';
$string['framesize'] = 'Hauteur du cadre';
$string['invalidstoredurl'] = 'Impossible d\'afficher cette ressource : l\'URL n\'est pas valide.';
$string['invalidurl'] = 'L\'URL saisie n\'est pas valide';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'Le module URL permet à l\'enseignant de fournir un lien web comme ressource de cours. Tout ce qui est disponible librement en ligne, documents, images, etc., peut être lié ; il n\'est pas nécessaire que l\'URL soit celle de la page d\'accueil d\'un site web. L\'URL de n\'importe quelle page web peut être copiée et collée. L\'enseignant peut aussi utiliser le sélecteur de fichiers et choisir un lien d\'un dépôt comme Flickr, YouTube ou Wikipedia (suivant les dépôts activés dans le site).

De nombreuses possibilités d\'affichage sont offertes, par exemple l\'intégration dans une page ou l\'ouverture dans une nouvelle fenêtre. Des options avancées permettent si nécessaire de passer à l\'URL des informations telles que le nom du participant, par exemple.';
$string['modulenameplural'] = 'URLs';
$string['neverseen'] = 'Jamais consulté';
$string['optionsheader'] = 'Options';
$string['page-mod-url-x'] = 'Toute page du module URL';
$string['parameterinfo'] = '&amp;parameter=variable';
$string['parametersheader'] = 'Paramètres';
$string['parametersheader_help'] = 'Certaines variables internes de Moodle sont parfois ajoutées automatiquement à l\'URL. Saisissez le nom de votre paramètre dans chaque champ, puis sélectionnez la variable correspondante.';
$string['pluginadministration'] = 'Administration URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Hauteur de la fenêtre (en pixels)';
$string['popupheightexplain'] = 'Indique la hauteur par défaut des fenêtres surgissantes.';
$string['popupwidth'] = 'Largeur de la fenêtre (en pixels)';
$string['popupwidthexplain'] = 'Indique la largeur par défaut des fenêtres surgissantes.';
$string['printheading'] = 'Afficher le nom de l\'URL';
$string['printheadingexplain'] = 'Indique s\'il faut afficher le nom de l\'URL au-dessus du contenu. Certains types d\'affichage n\'afficheront toutefois pas ce nom, même lorsque l\'option est activée.';
$string['printintro'] = 'Afficher la description de la ressource';
$string['printintroexplain'] = 'Indique s\'il faut afficher la description de l\'URL en dessous du contenu. Certains types d\'affichage n\'afficheront toutefois pas cette description, même lorsque l\'option est activée.';
$string['rolesinparams'] = 'Inclure les noms des rôles dans les paramètres';
$string['serverurl'] = 'URL du serveur';
$string['url:addinstance'] = 'Ajouter une ressource URL';
$string['url:view'] = 'Voir les URLs';
