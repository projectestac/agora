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
 * Strings for component 'repository_boxnet', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Chave da API';
$string['apiv1migration_message_content'] = 'Como parte da recente atualização do Moodle (2.6, 2.5.3, 2.4.7), o repositório do plugin Box foi desativado. Para o reativar, tem de o reconfigurar tal como descrito na documentação: {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Este plugin foi desativado, uma vez que requer configuração, tal como descrito na documentação de migração Box APIv1.';
$string['apiv1migration_message_subject'] = 'Informações importantes sobre o repositório do plugin Box';
$string['boxnet:view'] = 'Ver repositório Box';
$string['cannotcreatereference'] = 'Não é possível criar uma referência, não há permissões suficientes para compartilhar o ficheiro no Box.';
$string['clientid'] = 'ID do Cliente';
$string['clientsecret'] = 'Senha do Cliente';
$string['configplugin'] = 'Configurar Box';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'Obter um ID de Cliente e senha chave em <a href="http://www.box.net/developers/services">página da box.net para programadores</a> para o seu site Moodle.';
$string['invalidpassword'] = 'Senha inválida';
$string['migrationadvised'] = 'Parece que estava a usar o Box com a versão da API 1. Executou a ferramenta de migração<a href="{$a}"></a> para converter as referências antigas?';
$string['migrationinfo'] = '<p> Como parte da migração para a nova API fornecida pelo Box, as referências do seu ficheiro têm de ser migradas. Infelizmente, o sistema de referência não é compatível com a API v2, por isso será feito o seu download e posterior conversão para ficheiros reais.</p>

<p> Lembre-se também que a migração pode <strong>demorar muito tempo muito,</strong> dependendo da quantidade de referências e do tamanho dos ficheiros.</p>

<p> Pode executar a ferramenta de migração, clicando no botão abaixo, ou, em alternativa, executando o script CLI: repository/boxnet/cli/migrationv1.php.</p>

<p> Saiba mais em<a href="{$a->docsurl}">aqui</a>.</p>';
$string['migrationtool'] = 'Ferramenta de migração Box APIv1';
$string['nullfilelist'] = 'Este repositório não contém ficheiros';
$string['password'] = 'Senha';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Repositório em Box';
$string['runthemigrationnow'] = 'Executar a ferramenta de migração agora';
$string['saved'] = 'A informação box foi gravada';
$string['shareurl'] = 'Partilhar URL';
$string['username'] = 'Nome de utilizador para box';
$string['warninghttps'] = 'O Box requer que o seu site use HTTPS para que o repositório funcione.';
