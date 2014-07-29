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
 * Strings for component 'portfolio_googledocs', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID de Cliente';
$string['noauthtoken'] = 'Um token de autenticação não foi recebido pelo Google. Por favor, verifique que está a dar acesso ao Moodle para aceder à sua conta Google';
$string['nooauthcredentials'] = 'Credencias OAuth necessárias.';
$string['nooauthcredentials_help'] = 'Para utilizar o módulo do portefólio do Google Drive tem de configurar as credenciais OAuth nas configurações do portefólio.';
$string['nosessiontoken'] = 'Não existe uma sessão token de prevenção de exportação para o google.';
$string['oauth2upgrade_message_content'] = 'Como parte da atualização para o Moodle 2.3, o módulo do portefólio do Google Drive foi desativado. Para o reativar, o seu site Moodle tem de ser registado com o Google, tal como indicado na documentação {$a->docsurl}, a fim de obter uma ID de cliente e senha . A identificação do cliente e senha podem ser usadas para configurar todos os módulos do Google Drive e Picasa.';
$string['oauth2upgrade_message_small'] = 'Este módulo foi desativado, sendo necessário configurá-lo tal como indicado na documentação de configuração do Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Informação importante sobre o módulo do portefólio do Google Drive';
$string['oauthinfo'] = '<p> Para utilizar este módulo, tem de registar o seu site com o Google, tal como indicado na documentação <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p> Como parte do processo de registo, terá de introduzir o seguinte URL como \'URLs Redirecionados Autorizados\':</p><p>{$a->callbackurl}</p>Uma vez registado, ser-lhe-á atribuída uma identidade de cliente e senha que podem ser usadas para configurar todos os módulos do Google Drive e do Picasa.</p>';
$string['pluginname'] = 'Google Drive';
$string['secret'] = 'Senha';
$string['sendfailed'] = 'Falhou a transferência do ficheiro {$a} para o google';
