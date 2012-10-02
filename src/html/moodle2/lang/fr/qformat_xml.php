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
 * Strings for component 'qformat_xml', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Fichier xml non valide - une chaîne de caractères est attendue (utiliser CDATA ?)';
$string['pluginname'] = 'Format XML Moodle';
$string['pluginname_help'] = 'Ce format spécifique à Moodle permet l\'importation et l\'exportation de questions.';
$string['truefalseimporterror'] = '<b>Attention</b> ! La question vrai/faux « {$a->questiontext} » n\'a pas pu être importée. Il n\'est pas clair si la réponse correcte est Vrai ou Faux. La question a été importée en supposant que la réponse  est « {$a->answer} ». Si ce n\'est pas le cas, veuillez modifier la question.';
$string['unsupportedexport'] = 'Le type de question {$a} n\'est pas supporté par l\'exportation XML';
$string['xmlimportnoname'] = 'Nom de la question manquant dans le fichier XML';
$string['xmlimportnoquestion'] = 'Texte de la question manquant dans le fichier XML';
$string['xmltypeunsupported'] = 'Le type de question {$a} n\'est pas supporté par l\'importation XML';
