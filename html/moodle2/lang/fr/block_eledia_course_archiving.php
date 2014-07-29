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
 * Strings for component 'block_eledia_course_archiving', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   block_eledia_course_archiving
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['archive'] = 'Commencer l\'archivage';
$string['configure_description'] = 'Ici vous pouvez configurer le processus d\'archivage. Tous les cours qui sont situés directement dans les catégories sources seront vérifiés par rapport à leur date de début.
Si la date se situe dans l\'intervalle de temps entre aujourd\'hui et les jours choisis dans le passé, le cours sera archivé.
Cela signifie que le cours sera rendu invisible,  déplacé dans la catégorie d\'archives configurée et tous les utilisateurs étudiants seront désinscrits.
Dans une deuxième étape, tous les cours dans les  catégories archives sont comparés à leur date de début du cours. Si c\'est supérieur au nombre choisi de jours dans le passé, le cours sera supprimé. <br /><br /> Le processus peut être initié par un
 formulaire qui est lié dans le bloc. Le bloc peut être ajouté à la page principale uniquement.';
$string['confirm_archiving'] = 'Les cours suivants seront archivés :<br />
<br />
{$a->archived}<br />
<br />
Les cours suivants seront supprimés :<br />
<br />
{$a->deleted}';
$string['confirm_header'] = 'Confirmer l\'archivage';
$string['days'] = 'Nombre de jours d\'archivage';
$string['eledia_course_archiving:addinstance'] = 'Ajouter un bloc Archivage de cours';
$string['eledia_course_archiving:use'] = 'Utiliser le bloc Archivage de cours';
$string['notice'] = 'Les cours suivants ont été archivés :<br />
<br />
{$a->archived}<br />
<br />
Les cours suivants ont été supprimés :<br />
<br />
{$a->deleted}';
$string['pluginname'] = 'Archivage de cours';
$string['remove_error'] = '- Erreur durant la suppression';
$string['remove_success'] = '- Supprimé avec succès';
$string['sourcecat'] = 'Catégories à archiver';
$string['targetcat'] = 'Catégories d\'archives';
$string['title'] = 'Archivage de cours';
