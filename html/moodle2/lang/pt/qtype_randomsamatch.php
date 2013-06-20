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
 * Strings for component 'qtype_randomsamatch', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_randomsamatch
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['nosaincategory'] = 'Não existem perguntas de resposta curta na categoria que escolheu \'{$a->catname}\'. Escolha uma categoria diferente, ou crie algumas perguntas nesta categoria.';
$string['notenoughsaincategory'] = 'Existe(m) só {$a->nosaquestions} perguntas de resposta curta na categoria que escolheu \'{$a->catname}\'. Escolha uma categoria diferente, crie mais perguntas nesta categoria ou reduza o número de perguntas que selecionou.';
$string['pluginname'] = 'Correspondência de respostas curtas aleatórias';
$string['pluginnameadding'] = 'A adicionar pergunta de correspondência de respostas curtas aleatórias';
$string['pluginnameediting'] = 'A editar pergunta de correspondência de respostas curtas aleatórias';
$string['pluginname_help'] = 'Na perspetiva do aluno esta pergunta é similar à de correspondência. A diferença é que a lista de itens (perguntas) para correspondência é retirada aleatoriamente do conjunto de perguntas de resposta curta disponíveis numa categoria. Para tal, devem existir perguntas de resposta curta em número suficiente, caso contrário é exibida uma mensagem de erro.';
$string['pluginname_link'] = 'question/type/randomsamatch';
$string['pluginnamesummary'] = 'Esta pergunta é exibida como uma pergunta de correspondência, mas é criada aleatoriamente com base nas perguntas de resposta curta existentes numa categoria específica.';
