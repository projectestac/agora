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
 * Strings for component 'tool_customlang', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_customlang
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkin'] = 'Guardar strings no pacote linguístico';
$string['checkout'] = 'Abrir pacote linguístico para edição';
$string['checkoutdone'] = 'A carregar pacote linguístico';
$string['checkoutinprogress'] = 'A inserir strings no tradutor';
$string['confirmcheckin'] = 'Está prestes a inserir as strings modificadas no seu pacote linguistico local. Isto irá exportar as strings alteradas do tradutor para a diretoria data e o Moodle irá começar a usar essas strings. Prima o botão \'Continuar\' para proceder à alteração.';
$string['customlang:edit'] = 'Editar tradução local';
$string['customlang:view'] = 'Ver tradução local';
$string['filter'] = 'Filtrar strings';
$string['filtercomponent'] = 'Mostrar as strings desses componentes';
$string['filtercustomized'] = 'Apenas customizado';
$string['filtermodified'] = 'Apenas modificado';
$string['filteronlyhelps'] = 'Apenas ajuda';
$string['filtershowstrings'] = 'Mostrar strings';
$string['filterstringid'] = 'Identificador de strings';
$string['filtersubstring'] = 'Apenas strings contendo';
$string['headingcomponent'] = 'Componente';
$string['headinglocal'] = 'Personalização local';
$string['headingstandard'] = 'Texto padrão';
$string['headingstringid'] = 'String';
$string['markinguptodate'] = 'A marcar a personalização como atualizada';
$string['markinguptodate_help'] = 'A tradução personalizada pode ficar desatualizada, se tanto a original em Inglês ou a tradução local forem alteradas desde a costumização de uma dada string apenas no site. Reveja a tradução personalizada. Se encontrar desatualizações, clique na caixa de verificação e edite-a de outra forma.';
$string['markuptodate'] = 'marcar como desatualizada';
$string['modifiedno'] = 'Não existem strings alteradas para inserir';
$string['modifiednum'] = 'Existem {$a} strings alteradas. Deve inseri-las no disco para as guardar permanentemente.';
$string['nostringsfound'] = 'Não foram encontradas strings, altere os seus critérios de pesquisa.';
$string['placeholder'] = 'Expressões especiais';
$string['placeholder_help'] = 'Expressões especiais são códigos especiais como `{$a}` ou `{$a->something}` dentro de uma string. Estas são substituidas por um valor quando a string é exibida.

Como tal é importante copiá-las exatamente como estão na string original. Não os traduza, nem altere a sua orientação da direita para a esquerda.';
$string['placeholderwarning'] = 'strings com expressões especiais';
$string['pluginname'] = 'Personalização da língua';
$string['savecheckin'] = 'Guardar e adicionar as strings nos ficheiros';
$string['savecontinue'] = 'Guardar e continuar a editar';
