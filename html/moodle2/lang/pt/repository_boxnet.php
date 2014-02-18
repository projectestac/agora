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
 * Strings for component 'repository_boxnet', language 'pt', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'Chave da API';
$string['apiv1migration_message_small'] = 'Este plugin foi desativado, uma vez que requer configuração, tal como descrito na documentação de migração Box.net APIv1.';
$string['apiv1migration_message_subject'] = 'Informações importantes sobre o repositório do plugin Box.net';
$string['boxnet:view'] = 'Ver repositório box.net';
$string['callbackurl'] = 'URL de redirecionamento';
$string['callbackurltext'] = '1. Visite novamente <a href="http://www.box.net/developers/services">www.box.net/developers/services</a>. 2. Certifique-se de que define o URL de redirecionamento do serviço box.net para {$a}.';
$string['callbackwarning'] = '1. Obtenha uma API Box.net a partir de <a href="http://www.box.net/developers/services">www.box.net/developers/services</a> para este site Moodle. 2. Introduza aqui a chave da API Box.net, depois clique em Guardar e volte a esta página. Verificará que o Moodle gerou um URL de redirecionamento para si. 3. Edite os detalhes da sua Box.net no site da box.net e configure o URL de redirecionamento.';
$string['cannotcreatereference'] = 'Não é possível criar uma referência, não há permissões suficientes para compartilhar o ficheiro no Box.net.';
$string['clientid'] = 'ID do Cliente';
$string['clientsecret'] = 'Senha do Cliente';
$string['configplugin'] = 'Configurar repositório "box.net"';
$string['filesourceinfo'] = 'Box.net ({$a->fullname}): {$a->filename}';
$string['information'] = 'Obter uma chave para utilização da API em <a href="http://www.box.net/developers/services">página da box.net para programadores</a> para o site Moodle.';
$string['invalidpassword'] = 'Senha inválida';
$string['migrationadvised'] = 'Parece que estava a usar o Box.net com a versão da API 1. Executou a ferramenta de migração<a href="{$a}"></a> para converter as referências antigas?';
$string['migrationinfo'] = '<p> Como parte da migração para a nova API fornecida pelo Box.net, as referências do seu ficheiro têm de ser migradas. Infelizmente, o sistema de referência não é compatível com a API v2, por isso será feito o seu download e posterior conversão para ficheiros reais.</p>

<p> Lembre-se também que a migração pode <strong>demorar muito tempo muito,</strong> dependendo da quantidade de referências e do tamanho dos ficheiros.</p>

<p> Pode executar a ferramenta de migração, clicando no botão abaixo, ou, em alternativa, executando o script CLI: repository/boxnet/cli/migrationv1.php.</p>

<p> Saiba mais em<a href="{$a->docsurl}">aqui</a>.</p>';
$string['migrationtool'] = 'Ferramenta de migração Box.net APIv1';
$string['nullfilelist'] = 'Este repositório não contém ficheiros';
$string['password'] = 'Senha';
$string['pluginname'] = 'Box.net';
$string['pluginname_help'] = 'Repositório em Box.net';
$string['runthemigrationnow'] = 'Executar a ferramenta de migração agora';
$string['saved'] = 'A informação box.net foi gravada';
$string['shareurl'] = 'Partilhar URL';
$string['username'] = 'Nome de utilizador para box.net';
$string['warninghttps'] = 'O Box.net requer que o seu site use HTTPS para que o repositório funcione.';
