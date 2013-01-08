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
 * Strings for component 'rating', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Moyenne des évaluations';
$string['aggregatecount'] = 'Nombre d\'évaluations';
$string['aggregatemax'] = 'Évaluation maximale';
$string['aggregatemin'] = 'Évaluation minimale';
$string['aggregatenone'] = 'Pas d\'évaluation';
$string['aggregatesum'] = 'Somme des évaluations';
$string['aggregatetype'] = 'Type de combinaison';
$string['aggregatetype_help'] = 'Le type de combinaison définit comment les évaluations sont combinées pour former la note finale dans le carnet de note.

* Moyenne des évaluations : la moyenne de toutes les évaluations
* Nombre d\'évaluations : le nombre des éléments évalués est la note finale. Ce total ne peut pas dépasser la note maximale fixée pour l\'activité
* Maximum : la note finale est l\'évaluation la plus haute
* Minimum : la note finale est l\'évaluation la plus basse
* Somme : Toutes les évaluations sont additionnées. Ce total ne peut pas dépasser la note maximale fixée pour l\'activité

Si l\'option « Aucune évaluation » est sélectionnée, l\'activité n\'apparaîtra pas dans le carnet de notes.';
$string['allowratings'] = 'Permettre aux éléments d\'être évalués ?';
$string['allratingsforitem'] = 'Toutes les évaluations données';
$string['capabilitychecknotavailable'] = 'La vérification des capacités n\'est pas disponible tant que l\'activité n\'est pas enregistrée';
$string['couldnotdeleteratings'] = 'Cet élément ne peut pas être supprimé, car des utilisateurs l\'ont déjà évalué';
$string['norate'] = 'L\'évaluation d\'éléments n\'est pas permise !';
$string['noratings'] = 'Aucune évaluation remise';
$string['noviewanyrate'] = 'Vous ne pouvez voir que les résultats des éléments que vous avez produits';
$string['noviewrate'] = 'Vous n\'avez pas l\'autorisation de voir les évaluations des éléments';
$string['rate'] = 'Évaluer';
$string['ratepermissiondenied'] = 'Vous n\'avez pas les autorisations pour évaluer cet élément';
$string['rating'] = 'Évaluation';
$string['ratinginvalid'] = 'L\'évaluation n\'est pas valide';
$string['ratings'] = 'Évaluations';
$string['ratingtime'] = 'Restreindre l\'évaluation aux éléments dont les dates sont dans cet intervalle :';
$string['rolewarning'] = 'Rôles avec autorisation d\'évaluer';
$string['rolewarning_help'] = 'Pour donner des évaluations, les utilisateurs ont besoin de la capacité moodle/rating:rate, ainsi que de capacités spécifiques des modules. Les utilisateurs avec les rôles suivants peuvent évaluer des éléments. Cette liste peut être modifiée via le lien permissions dans les réglages du bloc.';
