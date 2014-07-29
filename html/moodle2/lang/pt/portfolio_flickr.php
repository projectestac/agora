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
 * Strings for component 'portfolio_flickr', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Chave de acesso à API';
$string['contenttype'] = 'Tipos de conteúdo';
$string['err_noapikey'] = 'Não foi indicada chave de acesso à API';
$string['err_noapikey_help'] = 'Não foi configurada nenhuma chave de acesso à API deste módulo. É possível obter uma a partir da página "Services" do site flickr.com.';
$string['hidefrompublicsearches'] = 'Pretende ocultar estas imagens nas pesquisas públicas?';
$string['isfamily'] = 'Visível para a família';
$string['isfriend'] = 'Visível para os amigos';
$string['ispublic'] = 'Público (qualquer possa pode vê-las)';
$string['moderate'] = 'Moderado';
$string['noauthtoken'] = 'Não foi possível obter um token de autenticação para esta sessão';
$string['other'] = 'Arte, ilustração, CGI ou outras imagens não fotográficas';
$string['photo'] = 'Fotografias';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = 'Restrito';
$string['safe'] = 'Seguro';
$string['safetylevel'] = 'Nível seguro';
$string['screenshot'] = 'Pré-visualizações';
$string['set'] = 'Configurar';
$string['setupinfo'] = 'Instruções de configuração';
$string['setupinfodetails'] = 'Para obter uma chave de acesso à API e respetiva senha, inicie sessão no site Flickr e <a href="{$a->applyurl}">requisite uma nova chave</a>. Depois de terem sido geradas a chave e a senha clique no link "Edit auth flow for this app". Defina o valor do campo "App Type" para "Web Application". No campo "Callback URL" coloque o valor: <br /><code>{$a->callbackurl}</code><br />Opcionalmente pode fornecer mais informações sobre o seu site Moodle e o respetivo logótipo. Estes valores podem ser alterados posteriormente na página que mostra a sua <a href="{$a->keysurl}">lista de aplicações Flickr</a>.';
$string['sharedsecret'] = 'Senha';
$string['title'] = 'Título';
$string['uploadfailed'] = 'Não foi possível enviar imagens para flickr.com: {$a}';
