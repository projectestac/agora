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
 * Strings for component 'tool_assignmentupgrade', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = 'Tem a certeza?';
$string['areyousuremessage'] = 'Tem a certeza que deseja atualizar o trabalho"{$a->name}"?';
$string['assignmentid'] = 'ID do trabalho';
$string['assignmentnotfound'] = 'Não é possível encontrar o trabalho (id={$a})';
$string['assignmentsperpage'] = 'Trabalhos por página';
$string['assignmenttype'] = 'Tipo de trabalho';
$string['backtoindex'] = 'Voltar ao índice';
$string['batchoperations'] = 'Operações em massa';
$string['batchupgrade'] = 'Atualizar vários trabalhos';
$string['confirmbatchupgrade'] = 'Confirmar a atualização em massa de vários trabalhos';
$string['conversioncomplete'] = 'Trabalho convertido';
$string['conversionfailed'] = 'A conversão do trabalho não ocorreu com sucesso. O log da atualização foi: <br />{$a}';
$string['listnotupgraded'] = 'Listar trabalhos que ainda não tenham sido atualizados';
$string['listnotupgraded_desc'] = 'Pode atualizar trabalhos individuais a partir daqui';
$string['noassignmentsselected'] = 'Sem trabalhos selecionados';
$string['noassignmentstoupgrade'] = 'Não existem trabalhos para atualizar';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'Esta página lista os trabalhos criados numa versão mais antiga do Moodle e que não foram atualizados para o novo módulo de atividade Trabalho do Moodle 2.3. Nem todos os trabalhos podem ser atualizados - se eles foram criados com um subtipo personalizado, então esse subtipo precisa de ser atualizado para o novo formato de atribuição do plugin para completar a atualização.';
$string['notupgradedtitle'] = 'Trabalhos não atualizados';
$string['pluginname'] = 'Ajudante de atualização de trabalhos';
$string['select'] = 'Selecionar';
$string['submissions'] = 'Trabalhos';
$string['supported'] = 'Atualizar';
$string['unknown'] = 'Desconhecido';
$string['updatetable'] = 'Atualizar tabela';
$string['upgradable'] = 'Atualizável';
$string['upgradeall'] = 'Atualizar todos os trabalhos';
$string['upgradeallconfirm'] = 'Atualizar todos os trabalhos?';
$string['upgradeassignmentfailed'] = 'Resultado: A atualização falhou. O log da atualização foi: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = 'Resultado: Atualização realizada com sucesso';
$string['upgradeassignmentsummary'] = 'Trabalho atualizado: {$a->name} (Course: {$a->shortname})';
$string['upgradeprogress'] = 'Foram atualizados {$a->current} trabalhos em {$a->total}';
$string['upgradeselected'] = 'Atualizar os trabalhos selecionados';
$string['upgradeselectedcount'] = 'Atualizar os {$a} trabalhos selecionados?';
$string['upgradesingle'] = 'Atualizar apenas um trabalho';
$string['viewcourse'] = 'Ver a disciplinas com os trabalhos convertidos';
