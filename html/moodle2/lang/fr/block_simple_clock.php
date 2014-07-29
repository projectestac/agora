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
 * Strings for component 'block_simple_clock', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   block_simple_clock
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['after_noon'] = 'pm';
$string['before_noon'] = 'am';
$string['clock_separator'] = ':';
$string['clock_title_default'] = 'Horloge';
$string['config_clock_visibility'] = 'Visibilité des horloges';
$string['config_clock_visibility_help'] = '<p>Avec ces réglages, vous pouvez contrôler ce que peut voir l\'utilisateur :</p>
<ul>
    <li>heure du serveur,</li>
    <li>heure locale, ou</li>
    <li>les deux.</li>
</ul>';
$string['config_day'] = 'Afficher le nom des jours';
$string['config_day_help'] = '<p>Afficher le nom du jour ajoute des informations supplémentaires pour les étudiants qui peuvent être dans un fuseau horaire un jour plus tôt ou plus tard.</p>';
$string['config_header'] = 'Afficher l\'en-tête';
$string['config_header_help'] = '<p>Avec ces réglages, vous contrôlez l\'en-tête du bloc, incluant le titre.</p>
<p style="background:yellow;border:3px dashed black;padding:10px;"><strong>Note</strong><br />
Quand le "Mode Edition" est activé, l\'en-tête du bloc sera montrée aux enseignants et aux administrateurs.
Quand le "Mode Edition" est désactivé, l\'en-tête sera cachée.
Quand ce paramètre est sur "Non", les étudiants ne verront pas l\'en-tête, "Mode Edition" activé ou non.';
$string['config_icons'] = 'Afficher les icônes';
$string['config_icons_help'] = '<p>Avec ce réglage, vous pouvez contrôler si les icônes sont affichées à côté de chaque étiquette de l\'horloge.</p>
<p>L\'icône du site est affichée à côté du mot "serveur". L\'image de l\'utilisateur s\'affiche à côté de son horloge.</p>';
$string['config_seconds'] = 'Afficher les secondes';
$string['config_seconds_help'] = '<p>Ce réglage permet d\'afficher les secondes aux utilisateurs sur toutes les horloges visibles.</p>
<p style="background:yellow;border:3px dashed black;padding:10px;"><strong>Attention</strong><br />
Le temps initial indiqué est le moment où la page a été créée.
Lorsque ce contenu de la page arrive sur le navigateur de l\'utilisateur, la différence de temps comportera un retard (généralement de quelques secondes).
Cela est souvent acceptable pour toute interaction avec Moodle, mais le décalage sera plus évident avec les secondes indiquées.</p>';
$string['config_show_both_clocks'] = 'Montrer les 2 horloges serveur et utilisateur';
$string['config_show_server_clock'] = 'Montrer seulement l\'horloge serveur';
$string['config_show_user_clock'] = 'Montrer seulement l\'horloge utilisateur';
$string['config_title'] = 'Autre titre';
$string['config_title_help'] = '<p>Ce paramètre permet de modifier le titre du bloc.</p>
<p>Si aucun titre alternatif n\'est fourni, le titre par défaut est utilisé.</p>
<p>Si l\'en-tête du bloc est masqué, le titre ne s\'affichera pas.</p>';
$string['day_names'] = 'Dimanche,Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi';
$string['javascript_disabled'] = 'Pour permettre aux horloges de se mettre à jour, activez JavaScript dans votre navigateur.';
$string['loading'] = 'Chargement...';
$string['pluginname'] = 'Simple Horloge';
$string['server'] = 'Serveur';
$string['simple_clock:addinstance'] = 'Ajouter un nouveau bloc Horloge simple';
$string['simple_clock:myaddinstance'] = 'Ajouter un nouveau bloc Horloge simple sur la page Mon Moodle';
$string['you'] = 'Vous';
