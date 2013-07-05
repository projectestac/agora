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
 * Strings for component 'qformat_xml', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Fitxer XML invàlid - s\'esperava una cadena (useu CDATA?)';
$string['pluginname'] = 'Format XML de Moodle';
$string['pluginname_help'] = 'Aquest és un format específic de Moodle per importar i exportar preguntes.';
$string['truefalseimporterror'] = '<b>Compte</b>: La pregunta cert/fals \'{$a->questiontext}\' no es pot importar correctament. No es distingeix si la resposta és cert o fals. La pregunta s\'ha importat assumint que la resposta és \'[$a->answer}\'. Si no és un canvi correcte, haureu d\'editar la pregunta.';
$string['unsupportedexport'] = 'El tipus de pregunta {$a} no es pot exportar en XML';
$string['xmlimportnoname'] = 'Falta el nom de la pregunta al fitxer XML';
$string['xmlimportnoquestion'] = 'Falta el text de la pregunta al fitxer XML';
$string['xmltypeunsupported'] = 'El sistema d\'importació XML no suporta el tipus de pregunta {$a}';
