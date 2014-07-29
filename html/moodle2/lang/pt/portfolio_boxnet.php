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
 * Strings for component 'portfolio_boxnet', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apiv1migration_message_content'] = 'Como parte da recente atualização do Moodle 2.6, o plugin portfolio Box.net foi desativado. Para reativá-lo, precisa de o configurar novamente como descrito na documentação disponível em {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Este plugin foi desativado, pois requer configuração conforme descrito na documentação de migração Box APIv1.';
$string['apiv1migration_message_subject'] = 'Informações importantes sobre o módulo Box portfolio';
$string['clientid'] = 'ID do cliente';
$string['clientsecret'] = 'Senha do cliente';
$string['existingfolder'] = 'Pasta onde devem ser colocados os ficheiros';
$string['folderclash'] = 'A pasta a criar já existe!';
$string['foldercreatefailed'] = 'Não foi possível criar a pasta de destino no site Box';
$string['folderlistfailed'] = 'Não foi possível obter a lista de pastas do site Box';
$string['missinghttps'] = 'HTTPS necessários';
$string['missinghttps_help'] = 'O Box só irá funcionar com um site HTTPS ativado.';
$string['missingoauthkeys'] = 'Falta ID e senha do cliente';
$string['missingoauthkeys_help'] = 'Não há ID nem senha de cliente configurado para este plugin. Poderá obtê-los a partir da página de desenvolvimento Box.';
$string['newfolder'] = 'Novo ficheiro onde devem ser colocados os ficheiros';
$string['noauthtoken'] = 'Não foi possível obter um token de autenticação para esta sessão';
$string['notarget'] = 'Deve indicar uma pasta que já exista ou um novo onde possam ser colocados os ficheiros';
$string['noticket'] = 'Não foi possível obter um ticket no site Box para dar início à sessão de autenticação';
$string['password'] = 'Senha Box (não será guardada)';
$string['pluginname'] = 'Box';
$string['sendfailed'] = 'Não foi possível enviar conteúdo para Box: {$a}';
$string['setupinfo'] = 'Instruções de configuração';
$string['setupinfodetails'] = 'Para obter uma chave de acesso e ID inicie sessão no site Box e consulte a página <a href="{$a->servicesurl}">Box developers page</a>. Clique em "Create new application" e crie uma nova aplicação para o seu site Moodle. A chave de acesso e ID são mostradas na secção \'OAuth2 parameters\' do formulário de edição da aplicação. Pode também fornecer outra informação sobre o seu site Moodle.';
$string['sharedfolder'] = 'Partilhado';
$string['sharefile'] = 'Partilhar este ficheiro?';
$string['sharefolder'] = 'Partilhar este nova pasta?';
$string['targetfolder'] = 'Pasta de destino';
$string['tobecreated'] = 'A ser criado';
$string['username'] = 'Username Box (não será guardado)';
$string['warninghttps'] = 'Box requer que o seu site use HTTPS para que o portfólio funcione.';
