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
 * Strings for component 'auth_fc', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'URL para alteração da senha';
$string['auth_fcconnfail'] = 'A ligação falhou com o código de erro {$a->no} e mensagem " {$a->str} "';
$string['auth_fccreators'] = 'Lista de grupos cujos membros estão autorizados a criar novas disciplinas. Os nomes dos grupos devem ser separados por ";". Os nomes devem ser indicados exatamente como estão definidos no servidor FirstClass. O sistema respeita maiúsculas e minúsculas.';
$string['auth_fccreators_key'] = 'Criadores';
$string['auth_fcdescription'] = 'Este método utiliza um servidor FirstClass para verificar se um nome de utilizador e senha são válidos.';
$string['auth_fcfppport'] = 'Porta do servidor (3333 é a mais comum)';
$string['auth_fcfppport_key'] = 'Porta';
$string['auth_fchost'] = 'Endereço do servidor FirstClass. Utilize o endereço IP ou o nome definido no DNS.';
$string['auth_fchost_key'] = 'Servidor';
$string['auth_fcpasswd'] = 'Senha para a conta indicada acima';
$string['auth_fcpasswd_key'] = 'Senha';
$string['auth_fcuserid'] = 'Identificador da conta FirstClass com privilégios de "Subadministrator"';
$string['auth_fcuserid_key'] = 'ID do utilizador';
$string['pluginname'] = 'Servidor FirstClass';
