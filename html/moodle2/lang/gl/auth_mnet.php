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
 * Strings for component 'auth_mnet', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Cando se estabelece a «Si», crease automaticamente un rexistro local de usuario cando un usuario remoto accede por primeira vez.';
$string['auth_mnetdescription'] = 'Os usuarios son autenticados conforme a web de confianza definida na configuración da Rede Moodle.';
$string['auth_mnet_roamin'] = 'Estes usuarios deste enderezo/máquina poden percorrer o seu sitio.';
$string['auth_mnet_roamout'] = 'Os seus usuarios poden saír a percorrer estes enderezos/máquinas';
$string['auth_mnet_rpc_negotiation_timeout'] = 'O tempo límite en segundos para autenticarse a través de transporte XMLRPC.';
$string['auto_add_remote_users'] = 'Engadir automaticamente usuarios remotos';
$string['pluginname'] = 'Autenticación MNet';
$string['rpc_negotiation_timeout'] = 'Tempo límite de negociación RPC';
$string['sso_idp_description'] = 'Publique este servizo para permitirlle aos seus usuarios percorrer o sitio Moodle {$a} sen ter que volver identificarse alí. <ul><li><em>Dependencia</em>: vostede debe <strong>subscribirse</strong> tamén ao servizo SSO (provedor de servizos) en {$a}.</li></ul><br />Subscríbase a este servizo para permitirlle aos usuarios autenticados de {$a} acceder ao seu sitio sen tener que volver identificarse. <ul><li><em>Dependencia</em>: vostede debe <strong>publicar</strong> tamén  o servizo SSO (provedor de servizos) a {$a}.</li></ul><br />';
$string['sso_idp_name'] = 'SSO  (provedor de identidade)';
$string['sso_mnet_login_refused'] = 'Ao nome de usuario {$a->user} non lle está permitido acceder desde {$a->host}.';
$string['sso_sp_description'] = 'Publique este servizo para permitirlle a usuarios autenticados acceder ao seu sitio desde {$a} sn ter que volver identificarse.<ul><li><em>Dependencia</em>: vostede debe <strong>subscribirse</strong> tamén ao servizo SSO (provedor de identidade) en {$a}.</li></ul><br />Subscríbase a este servizo para permitirlle aos seus usuarios percorrer o sitio Moodle {$a} sen tener que volver identificarse alí. <ul><li><em>Dependencia</em>: vostede debe <strong>publicar</strong> tamén  o servizo SSO (provedor de identidade) a {$a}.</li></ul><br />';
$string['sso_sp_name'] = 'SSO  (provedor de servizos)';
