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
 * Strings for component 'portfolio_boxnet', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Chave da API';
$string['err_noapikey'] = 'Não foi encontrada chave da API';
$string['err_noapikey_help'] = 'Não foi indicada nenhuma chave para a API deste módulo. Esta pode ser obtida na página de desenvolvimento do site OpenBox.';
$string['existingfolder'] = 'Pasta onde devem ser colocados os ficheiros';
$string['folderclash'] = 'A pasta a criar já existe!';
$string['foldercreatefailed'] = 'Não foi possível criar a pasta de destino no site box.net';
$string['folderlistfailed'] = 'Não foi possível obter a lista de pastas do site box.net';
$string['newfolder'] = 'Novo ficheiro onde devem ser colocados os ficheiros';
$string['noauthtoken'] = 'Não foi possível obter um token de autenticação para esta sessão';
$string['notarget'] = 'Deve indicar uma pasta que já exista ou um novo onde possam ser colocados os ficheiros';
$string['noticket'] = 'Não foi possível obter um ticket no site box.net para dar início à sessão de autenticação';
$string['password'] = 'Senha box.net (não será guardada)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Não foi possível enviar conteúdo para box.net: {$a}';
$string['setupinfo'] = 'Instruções de configuração';
$string['setupinfodetails'] = 'Para obter uma chave de acesso à API inicie sessão no site Box.net e consulte a página <a href="{$a->servicesurl}">OpenBox development page</a>. Em "Developer Tools" clique em "Create new application" e crie uma nova aplicação para o seu site Moodle. A chave de acesso à API é mostrada na secção "Backend parameters" do formulário de edição da aplicação. Nesse formulário preencha o campo "Redirect URL" para:<br /><code>{$a->callbackurl}</code><br />Opcionalmente pode indicar mais informações sobre o seu site Moodle. Estes valores podem depois ser alterados na página "View my applications".';
$string['sharedfolder'] = 'Partilhado';
$string['sharefile'] = 'Partilhar este ficheiro?';
$string['sharefolder'] = 'Partilhar este nova pasta?';
$string['targetfolder'] = 'Pasta de destino';
$string['tobecreated'] = 'A ser criado';
$string['username'] = 'Username box.net (não será guardado)';
