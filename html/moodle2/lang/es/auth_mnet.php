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
 * Strings for component 'auth_mnet', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Cuando se deja en \'sí\', un registro local de usuario es creado automáticamente cuando un usuario remoto incia sesión por primera vez.';
$string['auth_mnetdescription'] = 'Los usuarios se identifican de acuerdo a la confianza web definida en la configuración de la Red Moodle.';
$string['auth_mnet_roamin'] = 'Estos usuarios de este host pueden divagar por su sitio.';
$string['auth_mnet_roamout'] = 'Sus usuarios pueden salir a divagar a estos hosts';
$string['auth_mnet_rpc_negotiation_timeout'] = 'El tiempo de expiración en segundos para identificarse a través de transporte XMLRPC.';
$string['auto_add_remote_users'] = 'Añadir automáticamente usuarios remotos';
$string['pluginname'] = 'Identificación de la Red Moodle (\'Moodle Network\')';
$string['rpc_negotiation_timeout'] = 'Tiempo de expiración para la negociación RPC';
$string['sso_idp_description'] = 'Publique este servicio para permitir a sus usuarios divagar al sitio Moodle {$a} sin tener que reiniciar sesión allí. <ul><li><em>Dependencia</em>: Usted debe también <strong>suscribirse</strong> al servicio SSO (Proveedor de servicios) en {$a}.</li></ul><br />Suscríbase a este servicio para permitir a los usuarios identificados de {$a} acceder a su sitio sin tener que reiniciar sesión. <ul><li><em>Dependencia</em>: Usted debe también <strong>publicar</strong> el servicio SSO (proveedor de servicios) a {$a}.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (Proveedor de Identidad)';
$string['sso_mnet_login_refused'] = 'Al nombre de usuario {$a->user} no le es permitido iniciar sesión desde {$a->host}.';
$string['sso_sp_description'] = 'Publique este servicio para permitir a usuarios identificados acceder a su sitio desde {$a} sin tener que reinciar sesión.<ul><li><em>Dependecia</em>: Usted debe también <strong>subscribirse</strong> al servicio SSO (Proveedor de identidad) en {$a}.</li></ul><br />Suscríbase a este servicio para permitir a sus usuarios divagar al sitio Moodle {$a} sin tener que reiniciar sesión allí. <ul><li><em>Dependencia</em>: Usted debe también <strong>publicar</strong> el servicio SSO (Proveedor de identidad) a {$a}.</li></ul><br />';
$string['sso_sp_name'] = 'SSO (Proveedor de Servicios)';
