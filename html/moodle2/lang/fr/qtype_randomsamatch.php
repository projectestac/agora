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
 * Strings for component 'qtype_randomsamatch', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_randomsamatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['nosaincategory'] = 'Il n\'y a pas de questions à réponse courte dans la catégorie choisie « {$a->catname} ». Veuillez choisir une autre catégorie ou créer plus de questions dans cette catégorie.';
$string['notenoughsaincategory'] = 'Il n\'y a que {$a->nosaquestions} question(s) à réponse courte dans la catégorie choisie « {$a->catname} ». Veuillez choisir une autre catégorie, créer plus de questions dans cette catégorie ou réduire le nombre choisi de questions.';
$string['pluginname'] = 'Question de correspondance à réponse courte';
$string['pluginnameadding'] = 'Ajout d\'une question d\'appariement aléatoire à réponse courte';
$string['pluginnameediting'] = 'Modification d\'une question d\'appariement aléatoire à réponse courte';
$string['pluginname_help'] = 'Du point de vue du participant, une telle question est identique à une question d\'appariement. La différence est que la liste des termes à apparier est tirée aléatoirement dans les questions à réponse courte de la catégorie de questions actuelle. La catégorie doit comporter suffisamment de questions à réponse courte non utilisées, sans quoi un message d\'erreur sera affiché.';
$string['pluginnamesummary'] = 'Une question d\'appariement créée à partir des questions à réponse courte d\'une catégorie';
