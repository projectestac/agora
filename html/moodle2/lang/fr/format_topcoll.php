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
 * Strings for component 'format_topcoll', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   format_topcoll
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['arrow'] = 'Flèche';
$string['center'] = 'Centre';
$string['colourrule'] = 'Veuillez entrer une couleur RVB valide au format # suivi de 6 caractères hexadécimaux.';
$string['columnhorizontal'] = 'Horizontal';
$string['columnvertical'] = 'Vertical';
$string['ctreset'] = 'Réinitialisation des options des sections réduites';
$string['ctreset_help'] = 'Rétablir les paramètres par défaut des sections réduites.';
$string['currentsection'] = 'Cette section';
$string['defaultcoursedisplay'] = 'Mise en page du cours';
$string['defaultcoursedisplay_desc'] = 'Ce réglage détermine si la totalité du cours est affiché sur une seule page ou sur plusieurs pages avec la section 0 toujours visible.';
$string['defaultlayoutcolumnorientation'] = 'Orientation par défaut de la colonne';
$string['defaultlayoutcolumnorientation_desc'] = 'Orientation de la colonne par défaut : verticale ou horizontale.';
$string['defaultlayoutcolumns'] = 'Nombre par défaut de colonnes';
$string['defaultlayoutcolumns_desc'] = 'Nombre de colonne entre un et quatre';
$string['defaultlayoutelement'] = 'Configuration des éléments par défaut';
$string['defaultlayoutelement_desc'] = 'Le réglage de la mise en page peut être :

- « Par défaut » avec tout qui s\'affiche

- Pas de « Section x » / « Semaine x » / «  Jour x à basculer »

- Pas de numéro de section

-Pas de « Section x  » / « Semaine x » / « Jour x à basculer » ni aucun numéro de section.

- Pas de mot « Basculer ».

- Pas de mot « Basculer », ni de « Sujet x » / « Semaine x » / « Jour x à basculer ».

- Pas de mot « Basculer», ni de « Sujet x » / « Semaine x » / « Jour x à basculer », ni aucun numéro de section.';
$string['defaultlayoutstructure'] = 'Configuration de la structure par défaut';
$string['defaultlayoutstructure_desc'] = 'Le réglage de la structure peut être :

Thématique

Hebdomadaire

Dernière semaine en premier

Section actuelle en premier

Jour';
$string['defaulttgbgcolour'] = 'Couleur du fond (bandeau)';
$string['defaulttgbgcolour_desc'] = 'Définit la couleur du fond de la section réduite.';
$string['defaulttgbghvrcolour'] = 'Couleur du bandeau au survol de la souris';
$string['defaulttgbghvrcolour_desc'] = 'Définit la couleur de la section réduite au passage de la souris.';
$string['defaulttgfgcolour'] = 'Couleur du premier plan (texte)';
$string['defaulttgfgcolour_desc'] = 'Définit la couleur du texte de la section réduite.';
$string['defaulttogglealignment'] = 'Alignement du texte de la section réduite';
$string['defaulttogglealignment_desc'] = '« Gauche », « Centré » ou « Droite »';
$string['defaulttoggleallhover'] = 'Position flottante des icônes';
$string['defaulttoggleallhover_desc'] = '« Non » ou « Oui »';
$string['defaulttoggleiconset'] = 'Réglage par défaut des icônes';
$string['defaulttoggleiconset_desc'] = '« Flèche » => Icône de flèche

« Point » => Icône de point

« Power » => Icône de bouton d’alimentation';
$string['defaulttogglepersistence'] = 'Persistance de la bascule';
$string['defaulttogglepersistence_desc'] = '« On » ou « Off ». Vous devriez peut être mettre sur \'Off\' pour améliorer la performance AJAX, mais la position des sections basculées par l\'utilisateur ne sera pas rappelée à l\'actualisatin de la page.

Remarque : mettre la persistance sur \'Off\' supprime toutes les lignes contenant \'topcoll_toggle_x\' dans le champ \'name\' de la table \'user_preferences de la base de données (quand \'x\' dans \'topcoll_toggle_x\' correspond à l\'id du cours).';
$string['defaultuserpreference'] = 'Que faire avec les sections basculées lorsque l\'utilisateur accède pour la première fois au cours, ou lors d\'ajout de sections.';
$string['defaultuserpreference_desc'] = 'Ce réglage établit le comportement de base des sections réduites lorsque l\'utilisateur accède pour la première fois au cours, ou lorsque sont ajoutées des sections au cours.';
$string['formatsettings'] = 'Réinitialisation des réglages du format';
$string['formatsettingsinformation'] = '<br />Pour modifier les paramètres du format du cours, cliquez sur l\'icône à droite.';
$string['formattopcoll'] = 'Sections réduites';
$string['four'] = 'Quatre';
$string['hidefromothers'] = 'Cacher la section';
$string['left'] = 'Gauche';
$string['maincoursepage'] = 'Page principale du cours';
$string['markedthissection'] = 'Cette section est mise en surbrillance comme section courante';
$string['markthissection'] = 'Mettre en surbrillance cette section comme section courante';
$string['nametopcoll'] = 'Sections réduites';
$string['numbersections'] = 'Nombre de section';
$string['off'] = 'Off';
$string['on'] = 'On';
$string['one'] = 'Une';
$string['page-course-view-topcoll'] = 'Toutes les pages du cours principal au format sections réduites';
$string['page-course-view-topcoll-x'] = 'Toutes les pages du cours au format sections réduites';
$string['pluginname'] = 'Sections réduites';
$string['point'] = 'Point';
$string['power'] = 'Power';
$string['resetallcolour'] = 'Réinitialiser la couleur pour tous les cours utilisant le format sections réduites';
$string['resetallcolour_help'] = 'Réinitialise les couleurs par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites.';
$string['resetalllayout'] = 'Réinitialiser la disposition pour tous les cours utilisant le format sections réduites';
$string['resetalllayout_help'] = 'Réinitialise les réglages par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites.';
$string['resetalltogglealignment'] = 'Réinitialiser l\'alignement du texte de la section réduite pour tous les cours utilisant le format sections réduites';
$string['resetalltogglealignment_help'] = 'Réinitialise l\'alignement du texte par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites';
$string['resetalltoggleiconset'] = 'Réinitialiser l\'icône de la section réduite pour tous les cours utilisant le format sections réduites';
$string['resetalltoggleiconset_help'] = 'Réinitialise le jeu d\'icônes par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites';
$string['resetcolour'] = 'Réinitialiser la couleur';
$string['resetcolour_help'] = 'Réinitialise les couleurs par les valeurs par défaut, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites.';
$string['resetlayout'] = 'Réinitialiser la disposition';
$string['resetlayout_help'] = 'Réinitialise les réglages par les valeurs par défaut, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites.';
$string['resettogglealignment'] = 'Réinitialiser l\'alignement du texte';
$string['resettogglealignment_help'] = 'Réinitialise l\'alignement du texte par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites';
$string['resettoggleiconset'] = 'Réinitialiser l\'icône';
$string['resettoggleiconset_help'] = 'Réinitialise le jeu d\'icônes par les valeurs par défaut pour tous les cours, ce sera donc le format par défaut pour tous les cours utilisant le format sections réduites';
$string['right'] = 'Droite';
$string['section0name'] = 'Général';
$string['sectionname'] = 'Section';
$string['setcolour'] = 'Réglages de la couleur';
$string['setcolour_help'] = 'Contient les réglages pour paramétrer les couleurs du format sections réduites.';
$string['setlayout'] = 'Paramètres de base';
$string['setlayoutcolumnorientation'] = 'Réglage de l’orientation des colonnes';
$string['setlayoutcolumnorientation_help'] = 'Verticalement - Les sections s\'affichent de haut en bas

Horizontalement - Les sections s\'affichent de gauche à droite';
$string['setlayoutcolumns'] = 'Réglage des colonnes';
$string['setlayoutcolumns_help'] = 'Définit le nombre de colonnes à utiliser.';
$string['setlayout_default'] = 'Par défaut';
$string['setlayoutelements'] = 'Éléments';
$string['setlayoutelements_help'] = 'Quelles informations souhaitez-vous afficher sur le bandeau ?';
$string['setlayout_help'] = 'Contient les réglages pour paramétrer le format sections réduites.';
$string['setlayout_no_section_no'] = 'Pas de numéro de section';
$string['setlayout_no_toggle_section_x'] = 'Pas de « section x à basculer »';
$string['setlayout_no_toggle_section_x_section_no'] = 'Pas de « section x à basculer » ni de numéro de section';
$string['setlayout_no_toggle_word'] = 'Pas de mot « Basculer »';
$string['setlayout_no_toggle_word_toggle_section_x'] = 'Pas de mot « Basculer » ni de « section x à basculer »';
$string['setlayout_no_toggle_word_toggle_section_x_section_no'] = 'Pas de mot, pas de section x ni de numéro de section à basculer';
$string['setlayoutstructure'] = 'Structure';
$string['setlayoutstructurecurrenttopicfirst'] = 'Section actuelle en premier';
$string['setlayoutstructureday'] = 'Jour';
$string['setlayoutstructure_help'] = 'Structure et disposition de la page.  Vous pouvez choisir entre :

« Format thématique » - ce format est organisé en sections thématiques numérotées.

« Format hebdomadaire » - le cours est organisé par semaine avec des dates de début et de fin.

« Dernière semaine en premier » - basé sur le « format hebdomadaire », la semaine en cours est affichée en haut et les semaines précédentes dans un ordre descendant, sauf en mode édition où la structure revient au format initial hebdomadaire.

« Section actuelle en premier » - basé sur le « format thématique », la section actuelle est affichée en haut si elle a été fixée.

« Jour » - chaque section est présentée par un jour, à partir de la date du début du cours.';
$string['setlayoutstructurelatweekfirst'] = 'Dernière semaine en premier';
$string['setlayoutstructuretopic'] = 'Section';
$string['setlayoutstructureweek'] = 'Semaine';
$string['settogglealignment'] = 'Réglages de l\'alignement du texte';
$string['settogglealignment_help'] = 'Définit l\'alignement du texte dans le bandeau de la section réduite';
$string['settoggleallhover'] = 'Réglages de la position des icônes';
$string['settoggleallhover_help'] = 'Définit la positon des icônes dans le bandeau de la section réduite';
$string['settogglebackgroundcolour'] = 'Couleur du fond (bandeau)';
$string['settogglebackgroundcolour_help'] = 'Définit la couleur du fond de la section réduite.';
$string['settogglebackgroundhovercolour'] = 'Couleur du bandeau au survol de la souris';
$string['settogglebackgroundhovercolour_help'] = 'Définit la couleur de la section réduite au passage de la souris.';
$string['settoggleforegroundcolour'] = 'Couleur du premier plan (texte)';
$string['settoggleforegroundcolour_help'] = 'Définit la couleur du texte de la section réduite.';
$string['settoggleiconset'] = 'Réglages des icônes';
$string['settoggleiconset_help'] = 'Définit le type d\'icônes dans le bandeau de la section réduite';
$string['showfromothers'] = 'Afficher la section';
$string['three'] = 'Trois';
$string['topcollall'] = 'toutes les sections.';
$string['topcoll:changecolour'] = 'Modifier ou réinitialiser les couleurs';
$string['topcoll:changelayout'] = 'Modifier ou réinitialiser la configuration';
$string['topcoll:changetogglealignment'] = 'Modifier ou réinitialiser l\'alignement du texte';
$string['topcoll:changetoggleiconset'] = 'Modifier ou réinitialiser les icônes';
$string['topcollclosed'] = 'Fermer';
$string['topcollopened'] = 'Ouvrir';
$string['topcollsidewidth'] = '28px';
$string['topcolltoggle'] = 'Basculer';
$string['two'] = 'Deux';
