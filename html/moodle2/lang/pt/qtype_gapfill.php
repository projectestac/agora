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
 * Strings for component 'qtype_gapfill', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_gapfill
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answerdisplay'] = 'Mostrar Respostas';
$string['answerdisplay_help'] = 'Arrastar e Largar mostra uma lista de palavras que podem ser arrastadas para os espaços em branco; o preenchimento de espaço em branco mostra espaços sem opções de resposta, o menu suspenso mostra a mesma lista de respostas corretas (e incorretas) para cada campo';
$string['casesensitive'] = 'Distingue maiúsculas e minúsculas';
$string['casesensitive_help'] = 'Se ativar esta opção, se a resposta correta for CAT, cat será considerado uma resposta incorrecta';
$string['delimitchars'] = 'Delimitar caracteres';
$string['delimitchars_help'] = 'Altera os caracteres que delimitam um campo dos pre-definidos [], útil para perguntas sobre linguagens de programação';
$string['displaydragdrop'] = 'arrastar e largar';
$string['displaydropdown'] = 'escolha multipla';
$string['displaygapfill'] = 'Preenchimento de espaços em branco';
$string['gapfill'] = 'Preenchimento de espaço em branco Cloze';
$string['moreoptions'] = 'Mais opções.';
$string['noduplicates'] = 'Sem Duplicados';
$string['noduplicates_help'] = 'Quando esta opção está activada, cada resposta deve ser única. Isto poderá ser útil quando um campo tem um operador |, por exemplo: "Quais são as cores da medalhas Olímpicas" e cada campo tem [ouro | prata | bronze], se o aluno inserir ouro em todos os campos apenas o primeiro será avaliado (os outros ainda terão um visto no entanto). Na realidade trata-se de descartar respostas duplicadas para fins de avaliação.';
$string['pleaseenterananswer'] = 'Por favor introduza uma resposta';
$string['pluginname'] = 'Tipo de pergunta de preenchimento de espaço em branco';
$string['pluginnameadding'] = 'Adicionar uma pergunta com espaço em branco';
$string['pluginnameediting'] = 'Editar preenchimento de espaço em branco';
$string['pluginname_help'] = 'Coloque as palavras para serem finalizadas dentro de parentises retos, por exemplo O [gato] sentou-se no [tapete]. Modos de escolha multipla e arrastar e largar permite uma lista de respostas embaralhadas a ser exibido o que pode incluir opcionais respostas erradas / de distracção.';
$string['pluginname_link'] = '/question/type/gapfill';
$string['pluginnamesummary'] = 'Um tipo de pergunta de preenchimento de espaço em branco. Menos capacidades que o tipo Cloze normal, mas com um sintaxe mais simples.';
$string['questionsmissing'] = 'Você não incluiu todos os campos em seu texto da pergunta';
$string['wronganswers'] = 'Respostas erradas.';
$string['wronganswers_help'] = 'Lista de palavras incorretas separadas por virgulas, é aplicado apenas no modo de arrastar e largar';
$string['yougotnrightcount'] = 'O seu número de respostas corretas é {$a->num}.';
