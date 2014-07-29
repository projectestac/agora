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
 * Strings for component 'auth_mnet', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Se escolher "SIM", será criado automaticamente um registo de utilizador local sempre que um utilizador remoto entrar pela primeira vez.';
$string['auth_mnetdescription'] = 'Os utilizadores são autenticados de acordo com a rede de confiança estabelecida na sua configuração da Rede Moodle.';
$string['auth_mnet_roamin'] = 'Os utilizadores registados nos servidores desta lista terão acesso a este site';
$string['auth_mnet_roamout'] = 'Os utilizadores deste site poderão aceder remotamente aos seguintes servidores';
$string['auth_mnet_rpc_negotiation_timeout'] = 'O tempo em segundos para autenticação sobre o transporte XMLRPC.';
$string['auto_add_remote_users'] = 'Adicionar automaticamente utilizadores remotos';
$string['pluginname'] = 'Rede Moodle';
$string['rpc_negotiation_timeout'] = 'Tempo limite para ligação RPC';
$string['sso_idp_description'] = 'Publique este serviço para permitir aos seus utilizadores acederem ao site Moodle {$a} sem terem de voltar a autenticar-se lá.<ul><li><em> Dependência </em>: Tem também de <strong> subscrever </strong> o serviço SSO (Fornecedor de Serviço) em {$a}. </li></ul><br /> Subscreva este serviço para permitir que utilizadores autenticados em {$a} acedam ao site sem ter de repetir a autenticação. <ul><li><em> Dependência </em>: Também tem de <strong> publicar </strong> o serviço SSO (Fornecedor de Serviço) em {$a}. </li></ul><br />.';
$string['sso_idp_name'] = 'SSO (Fornecedor de Identidade)';
$string['sso_mnet_login_refused'] = 'Não é permitido ao utilizador  {$a->user} autenticar-se a partir do servidor {$a->host}.';
$string['sso_sp_description'] = 'Publique este serviço para permitir aos utilizadores autenticados em {$a} aceder ao seu site sem ter de repetir a autenticação.<ul><li><em> Dependência </em>: tem também de <strong> subscrever </strong> o serviço SSO (Fornecedor de Identidade) em {$a}. </li></ul><br /> Subscreva este serviço para permitir aos seus utilizadores acederem ao site Moodle {$a}, sem terem de repetir a autenticação.<ul><li><em> Dependência </em>: Também tem de <strong> publicar </strong> o serviço SSO (Fornecedor de Identidade) em {$a}. </li></ul><br />.';
$string['sso_sp_name'] = 'SSO (Fornecedor de Serviço)';
