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
 * Strings for component 'qformat_xml', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   qformat_xml
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['invalidxml'] = 'Ficheiro XML inválido - string esperada (usar CDATA?)';
$string['pluginname'] = 'Formato XML Moodle';
$string['pluginname_help'] = 'Este é um formato Moodle específico para importar e exportar perguntas dos testes.';
$string['pluginname_link'] = 'qformat/xml';
$string['truefalseimporterror'] = '<b>Aviso</b>: A pergunta verdadeiro/falso \'{$a->questiontext}\' não foi importada corretamente. Não está claro se a opção certa é verdadeiro ou falso. A pergunta foi importada assumindo que a opção correta é \'{$a->answer}\'. Se não estiver certo, terá de editá-la.';
$string['unsupportedexport'] = 'O tipo de pergunta {$a} não é compatível com a exportação XML';
$string['xmlimportnoname'] = 'Falta o nome da pergunta no ficheiro XML';
$string['xmlimportnoquestion'] = 'Falta o texto da pergunta no ficheiro XML';
$string['xmltypeunsupported'] = 'O tipo de pergunta {$a} não é suportada para importações em XML';
