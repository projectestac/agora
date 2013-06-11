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
 * Strings for component 'grading', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   grading
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activemethodinfo'] = '\'{$a->method}\'é selecionado como o método de avaliação ativo para a área \'{$a->area}';
$string['activemethodinfonone'] = 'Não existe um método de avaliação avançado selecionado para a area \'{$a->area}\' . Será usada a avaliação direta simples.';
$string['changeactivemethod'] = 'Alterar o método de avaliação ativo para';
$string['clicktoclose'] = 'clique para fechar';
$string['exc_gradingformelement'] = 'Não é possível instanciar o elemento da grelha de avaliação';
$string['formnotavailable'] = 'O método de avaliação avançado foi selecionado mas a grelha de avaliação não se encontra ainda definida. Pode precisar de defini-la primeiro através de um link no bloco Configurações.';
$string['gradingformunavailable'] = 'Atenção: a grelha de avaliação ainda não se encontra configurada. Será usado o método de avaliação simples direta até que a grelha esteja configurada.';
$string['gradingmanagement'] = 'Método de avaliação avançado';
$string['gradingmanagementtitle'] = 'Método de avaliação avançado: {$a->component} ({$a->area})';
$string['gradingmethod'] = 'Método de avaliação';
$string['gradingmethod_help'] = 'Escolha o método de avaliação avançado que deve ser usado para calcular as notas no contexto dado.

Para desativar as avaliações avançadas e voltar ao método de avaliação predefinido,escolha \'Avaliação simples direta\'.';
$string['gradingmethodnone'] = 'Avaliação simples direta';
$string['gradingmethods'] = 'Métodos de avaliação';
$string['manageactionclone'] = 'Criar nova grelha de avaliação a partir de um modelo';
$string['manageactiondelete'] = 'Apagar a grelha definida';
$string['manageactiondeleteconfirm'] = 'Está prestes a apagar a grelha \'{$a->formname}\' e toda a informação associada de \'{$a->component} ({$a->area})\'. Por favor certifique-se de que tem conhecimento do seguinte:

* Não existe forma de voltar atrás após esta operação.
* Pode alterar para outro método de avaliação incluindo o \'Avaliação simples direta\' sem apagar esta grelha.
* Todas as informações sobre como as grelhas de avaliação estão preenchidos serão perdidas.
* Os resultados guardados na pauta não serão afetados. No entanto, a explicação de como foram calculados não estará disponível.
* Esta operação não afetará eventuais  cópias desta grelha noutras atividades.';
$string['manageactiondeletedone'] = 'A grelha foi apagado com sucesso';
$string['manageactionedit'] = 'Editar as definições da grelha';
$string['manageactionnew'] = 'Criar nova grelha de avaliação';
$string['manageactionshare'] = 'Publicar a grelha como um novo modelo.';
$string['manageactionshareconfirm'] = 'Está prestes a guardar uma cópia da grelha de avaliação \'{$a}\' como um novo modelo público. Outros utilizadores no seu site poderão criar novas grelhas de avaliação nas suas atividades a partir deste modelo.';
$string['manageactionsharedone'] = 'A grelha de avaliação foi guardada com sucesso como modelo.';
$string['noitemid'] = 'A avaliação não é possivel, o item de avaliação não existe.';
$string['nosharedformfound'] = 'Não foram encontrados modelos';
$string['searchownforms'] = 'incluindo as minhas grelhas';
$string['searchtemplate'] = 'Pesquisar grelhas de avaliação';
$string['searchtemplate_help'] = 'Pode pesquisar por uma grelha de avaliação e usá-lo como modelo a partir da nova grelha de avaliação aqui. Basta inserir as palavras que devem aparecer em algum lugar no nome da grelha, na sua descrição ou no próprio corpo da grelha. Para pesquisar uma frase, insira a expressão inteira entre aspas.

Por predefinição, apenas as grelhas de avaliação que foram guardados como modelos partilhados são incluídos nos resultados da pesquisa. Também pode incluir todas as suas grelhas nos resultados da pesquisa. Desta forma, pode simplesmente re-utilizar as suas grelhas de avaliação sem partilhá-los. Apenas as grelhas marcados como \'Pronto a usar\' podem ser usados desta forma.';
$string['statusdraft'] = 'Rascunho';
$string['statusready'] = 'Pronto a usar';
$string['templatedelete'] = 'Apagar';
$string['templatedeleteconfirm'] = 'Está prestes a apagar a grelha partilhada \'{$a}\'. Apagar um modelo não afeta as grelhas existentes que foram criados a partir dele.';
$string['templateedit'] = 'Editar';
$string['templatepick'] = 'Usar este modelo';
$string['templatepickconfirm'] = 'Deseja usar a grelha de avaliação \'{$a->formname}\' como modelo para a nova grelha em \'{$a->component} ({$a->area})\'?';
$string['templatepickownform'] = 'Usar esta grelha como modelo';
$string['templatesource'] = 'Localização: {$a->component} ({$a->area})';
$string['templatetypeown'] = 'Grelha próprio';
$string['templatetypeshared'] = 'Modelo partilhado';
