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
 * Strings for component 'auth_shibboleth', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_shibboleth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_shib_auth_method'] = 'Nombre del método de identificación';
$string['auth_shib_auth_method_description'] = 'Proporcione un nombre para el método de identificación Shibboleth que sea familiar a los usuarios.Podría ser el nombre de su federación Shibboleth, por ejemplo, <tt>SWITCHaai Login</tt> o <tt>InCommon Login</tt> o similar.';
$string['auth_shibbolethdescription'] = 'Con este método puede conectarse a un servidor Shibboleth para comprobar y crear nuevas cuentas';
$string['auth_shibboleth_errormsg'] = 'Por favor, seleccione la organización a la que pertenece.';
$string['auth_shibboleth_login'] = 'Acceso Shibboleth';
$string['auth_shibboleth_login_long'] = 'Acceso a Moodle vía Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Acceso manual';
$string['auth_shibboleth_select_member'] = 'Soy un miembro de...';
$string['auth_shibboleth_select_organization'] = 'Para identificarse vía Shibboleth, seleccione por favor su organización en la lista desplegable.';
$string['auth_shib_changepasswordurl'] = 'URL para cambio de contraseña';
$string['auth_shib_contact_administrator'] = 'En caso de que no esté asociado con estas organizaciones y necesite acceso a un curso en este servidor, por favor contacte con el <a href="mailto:{$a}">Administrador</a>.';
$string['auth_shib_convert_data'] = 'API de modificación de datos';
$string['auth_shib_convert_data_description'] = 'Puede usar este API para modificar más adelante los datos proporcionados por Shibboleth. Lea <a href="../auth/shibboleth/README.txt" target="_blank">README</a> para ver instrucciones adicionales.';
$string['auth_shib_convert_data_warning'] = 'El archivo no existe o no es legible por el proceso del servidor.';
$string['auth_shib_idp_list'] = 'Proveedores de Identidad';
$string['auth_shib_idp_list_description'] = 'Proporcionar una lista de entityIDs de proveedores de identidad para permitir que el usuario elija elegir en la página de inicio de sesión. <br/> Cada línea debe ser una tupla separada por comas para las EntityID de los IdP  (véase el archivo de metadatos Shibboleth) y el Name de los IdP como deberá figurar en la lista desplegable.<br/>Como un tercer parámetro opcional puede añadir la ubicación de un iniciador de sesión de Shibboleth que se utilizará en caso de que su instalación de Moodle sea parte de una configuración de federación múltiple.';
$string['auth_shib_instructions'] = 'Utilice el <a href="{$a}">login Shibboleth</a> para acceder vía Shibboleth si su institución lo admite.<br />En caso contrario, utilice el formulario de entrada normal que aquí se muestra.';
$string['auth_shib_instructions_help'] = 'Aquí debería proporcionar a sus usuarios instrucciones personalizadas para explicar Shibboleth. Deberían aparecer en la sección de instrucciones de la página de acceso, e incluir un enlace a "<b>{$a}</b>", de modo que los usuarios de Shibboleth pudieran acceder con facilidad. Si lo deja en blanco, se utilizarán las instrucciones estándar (no las específicas de Shibboleth)';
$string['auth_shib_integrated_wayf'] = 'Servicio Moodle WAYF';
$string['auth_shib_integrated_wayf_description'] = 'Si marca esta opción, Moodle utilizará su propio servicio WAYF en lugar de la configurada para Shibboleth. Moodle mostrará una lista desplegable en la página de inicio alternativa en la que el usuario tiene que seleccionar su proveedor de identidad.';
$string['auth_shib_logout_return_url'] = 'URL alternativa de cierre de sesión';
$string['auth_shib_logout_return_url_description'] = 'Proporciona la URL a la que los usuarios Shibboleth se redireccionarán después de la salida de la sesión. <br/> Si se deja vacío, el usuario será redirigido a la ubicación a la que Moodle redirecciona a los usuarios.';
$string['auth_shib_logout_url'] = 'URL del manejador de salida del Proveedor de Servicios Shibboleth';
$string['auth_shib_logout_url_description'] = 'Proporciona la URL del gestor de salida del Proveedor de Servicio Shibboleth. Normalmente es <tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_no_organizations_warning'] = 'Si desea usar el servicio integrado WAYF, debe proporcionar una lista con valores separados por comas de las entityIDs proveedoras de identidades, sus nombres y, opcionalmente, un iniciador de sesión.';
$string['auth_shib_only'] = 'Sólo Shibboleth';
$string['auth_shib_only_description'] = 'Marque esta opción si desea forzar la identificación Shibboleth';
$string['auth_shib_username_description'] = 'Nombre de la variable contextual del servidor Shibboleth que se utilizará como nombre de usuario en Moodle';
$string['pluginname'] = 'Shibboleth';
$string['shib_invalid_account_error'] = 'Usted parece estar autenticado por Shibboleth, pero Moodle no tiene una cuenta válida para su nombre de usuario. Puede ser que no exista su cuenta o que haya sido suspendida.';
$string['shib_no_attributes_error'] = 'Usted parece haber sido Identifado por Shibboleth, pero Moodle no ha recibido ningún atributo de usuario. Por favor, compruebe que su proveedor de identidad envía los atributos necesarios ({$a}) al Proveedor de Servidios en el que Moodle se está ejecutando, o informe al webmaster de este servidor.';
$string['shib_not_all_attributes_error'] = 'Moodle necesita ciertos atributos Shibboleth que no están presentes en su caso. Los atributos son: {$a}<br />Por favor, contacte con el webmaster de este servidor o con su proveedor de identidad.';
$string['shib_not_set_up_error'] = 'La identificación Shibboleth no parece ser correcta debido a que en esta página no están presentes las variables contextuales Shibboleth. Por favor, consulte el archivo <a href="README.txt">README</a> si desea más instrucciones sobre cómo definir la identificación Shibboleth, o contacte con el webmaster de esta instalación de Moodle.';
