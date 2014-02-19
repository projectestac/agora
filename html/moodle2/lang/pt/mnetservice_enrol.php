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
 * Strings for component 'mnetservice_enrol', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   mnetservice_enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['availablecourseson'] = 'Disciplinas disponíveis em {$a}';
$string['availablecoursesonnone'] = 'Servidor remoto <a href="{$a->hosturl}">{$a->hostname}</a> não tem nenhumas disciplinas para os utilizadores.';
$string['clientname'] = 'Cliente de inscrição remota';
$string['clientname_help'] = 'Inscreve e anule a inscrição de utilizadores na sua instalação Moodle nos servidores Moodle que permitam que o faça através do módulo de inscrição na rede Moodle.';
$string['editenrolments'] = 'Editar inscrições';
$string['hostappname'] = 'Aplicação';
$string['hostname'] = 'Nome do servidor';
$string['hosturl'] = 'URL do servidor remoto';
$string['nopublishers'] = 'No existem pares remotos disponíveis.';
$string['noroamingusers'] = 'Os utilizadores necessitam da permissão \'{$a}\' no contexto do sistema para serem inscritos em disciplinas remotas, porém atualmente não existem utilizadores com essa capacidade. Clique no botão de continuar para atribuir a capacidade necessária a um ou mais papéis no seu site.';
$string['otherenrolledusers'] = 'Outros utilizadores inscritos';
$string['pluginname'] = 'Serviço de inscrição remota';
$string['refetch'] = 'Re-fetch up to date state from remote hosts';
