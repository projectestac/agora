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
 * Strings for component 'report_performance', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Cópia de segurança automática';
$string['check_backup_comment_disable'] = 'O desempenho pode ser afetado durante a execução das cópias de segurança. Se ativar esta opção, note que as cópias de segurança devem ser agendadas para os períodos de menor atividade do servidor.';
$string['check_backup_comment_enable'] = 'O desempenho pode ser afetado durante a execução das cópias de segurança. As cópias de segurança devem ser agendadas para os períodos de menor atividade do servidor.';
$string['check_backup_details'] = 'Ativar a realização de cópias de segurança automáticas irá criar automaticamente no servidor, e à hora que especificou, arquivos de todas as disciplinas. <p<Durante este processo, serão consumidos mais recursos e isto poderá afetar o desempenho.<p/>';
$string['check_cachejs_comment_disable'] = 'Se ativar esta opção, o desempenho do carregamento das páginas será melhorado.';
$string['check_cachejs_comment_enable'] = 'Se desativar esta opção, o carregamento das páginas poderá ser mais lento.';
$string['check_cachejs_details'] = 'A caching e compressão de Javascript melhora muito o desempenho do carregamento da página. É altamente recomendável para sites de produção.';
$string['check_debugmsg_comment_developer'] = 'Se for definido para outro, que não Programador, o desempenho pode ser melhorado ligeiramente.';
$string['check_debugmsg_comment_nodeveloper'] = 'Se for definido para PROGRAMADOR, o desempenho pode ser ligeiramente afetad';
$string['check_debugmsg_details'] = 'Raramente existem vantagens em ativar o nível de \'PROGRAMADOR\', a menos que seja um programador. Depois de ter verificado a mensagem de erro é ALTAMENTE RECOMENDADO alterar novamente as mensagens de erro para \'Nada\'. As mensagens de erro podem dar pistas da configuração do seu site a um pirata informático e podem afetar o desempenho.';
$string['check_enablestats_comment_disable'] = 'O desempenho pode ser afetado pelo processamento das estatísticas. Se ativar esta opção, as configurações das estatísticas devem ser definidas cuidadosamente.';
$string['check_enablestats_comment_enable'] = 'O desempenho pode ser afetado pelo processamento das estatísticas. As configurações das estatísticas devem ser definidas cuidadosamente.';
$string['check_enablestats_details'] = 'Ativar esta opção irá processar os registos em cronjob e reunir algumas estatísticas. Dependendo da quantidade de tráfego do seu site, isto pode levar algum tempo. <p> Durante este processo, serão consumidos mais recursos do servidor, o que pode afetar o desempenho. </p>';
$string['check_themedesignermode_comment_disable'] = 'Se ativar esta opção, as imagens e as folhas de estilo não serão armazenadas em cache, o que resultará numa degradação significativa do desempenho.';
$string['check_themedesignermode_comment_enable'] = 'Se desativar esta opção, as imagens e as folhas de estilo serão armazenadas em cache, o que resultará numa melhoria significativa do desempenho.';
$string['check_themedesignermode_details'] = 'Este é muitas vezes o motivo pelo qual os sites Moodle ficam lentos. <p> Em média, pode exigir, pelo menos, o dobro de recursos do CPU para executar um site Moodle com o Modo de desenho do tema ativo. </p>';
$string['comments'] = 'Comentários';
$string['disabled'] = 'Desativado';
$string['edit'] = 'Editar';
$string['enabled'] = 'Ativado';
$string['issue'] = 'Problema';
$string['morehelp'] = 'mais ajuda';
$string['performancereportdesc'] = 'Este relatório exibe uma listagem de problemas que podem afetar o desempenho do site {$a}';
$string['performance:view'] = 'Ver relatório de desempenho';
$string['pluginname'] = 'Visão geral do desempenho';
$string['value'] = 'Valor';
