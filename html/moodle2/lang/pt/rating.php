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
 * Strings for component 'rating', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   rating
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aggregateavg'] = 'Média de avaliações';
$string['aggregatecount'] = 'Número de avaliações';
$string['aggregatemax'] = 'Nota máxima';
$string['aggregatemin'] = 'Nota mínima';
$string['aggregatenone'] = 'Sem avaliação';
$string['aggregatesum'] = 'Soma de avaliações';
$string['aggregatetype'] = 'Tipo de avaliação';
$string['aggregatetype_help'] = 'O tipo de avaliação define a forma como as notas são apresentadas no relatório de avaliação .

* Média de avaliações - A média de todas as notas
* Número de avaliações - O número de itens avaliados torna-se a nota final. O total não pode exceder a nota máxima da atividade.
* Nota máxima - A nota mais alta atribuída torna-se a nota final
* Nota mínima - A nota atribuída com o valor menor torna-se a nota final
* Soma de avaliações - Todas as notas são somadas. O total não pode exceder a nota máxima da atividade.

Se selecionar "Sem avaliação", a atividade não aparece no relatório de avaliações.';
$string['allowratings'] = 'Permitir avaliação?';
$string['allratingsforitem'] = 'Todas as avaliações submetidas';
$string['capabilitychecknotavailable'] = 'Não pode verificar as permissões enquanto a atividade não for gravada';
$string['couldnotdeleteratings'] = 'Não é possível ser apagado pois já existem avaliações';
$string['norate'] = 'Não é permitido avaliar!';
$string['noratings'] = 'Não foram submetidas avaliações';
$string['noviewanyrate'] = 'Apenas pode consultar os resultados dos items que criou';
$string['noviewrate'] = 'Não tem permissão para ver avaliações';
$string['rate'] = 'Avaliar';
$string['ratepermissiondenied'] = 'Não tem permissão para avaliar';
$string['rating'] = 'Avaliação';
$string['ratinginvalid'] = 'A classificação não é válida';
$string['ratings'] = 'Avaliações';
$string['ratingtime'] = 'Impedir a avaliação de termos submetidos fora deste intervalo de datas:';
$string['rolewarning'] = 'Papéis com permissão para avaliar';
$string['rolewarning_help'] = 'Para avaliar atividades os utilizadores necessitam da capacidade moodle/rating:rate e eventuais capacidades especificas do módulo. Os utilizadores com os papéis apresentados devem ter permissão para avaliar itens. A lista de papéis pode ser modificada através do link Permissões no bloco de configurações.';
