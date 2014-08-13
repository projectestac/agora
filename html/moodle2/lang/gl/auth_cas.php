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
 * Strings for component 'auth_cas', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'Usuarios CAS';
$string['accesNOCAS'] = 'outros usuarios';
$string['auth_cas_auth_user_create'] = 'Crear usuarios externos';
$string['auth_cas_baseuri'] = 'URI do servidor (en branco se non hai baseUri)<br />Por exemplo, se o servidor CAS responde a host.domaine.fr/CAS/ entón<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URI base';
$string['auth_cas_broken_password'] = 'Vostede non pode continuar sen cambiar o seu contrasinal, porén, non se dispón unha páxina para cambiala. Póñase en contacto con seu administrador de Moodle.';
$string['auth_cas_cantconnect'] = 'A parte LDAP do módulo CAS non pode conectarse co servidor: {$a}';
$string['auth_cas_casversion'] = 'Versión do protocolo CAS';
$string['auth_cas_certificate_check'] = 'Seleccione «Si» se quere validar o certificado del servidor.';
$string['auth_cas_certificate_check_key'] = 'Validación do servidor';
$string['auth_cas_certificate_path'] = 'Ruta do ficheiro de cadea de certificación da EA (formato PEM) para validar o certificado do servidor';
$string['auth_cas_certificate_path_empty'] = 'Se activa a validación do servidor, é preciso que especifique unha ruta de certificado';
$string['auth_cas_certificate_path_key'] = 'Ruta do certificado';
$string['auth_cas_changepasswordurl'] = 'URL de cambio de contrasinal';
$string['auth_cas_create_user'] = 'Actíveo se desexa inserir os usuarios identificados con CAS na base de datos de Moodle. Caso contrario, só terán acceso os usuarios que xa existen en la base de datos de Moodle.';
$string['auth_cas_create_user_key'] = 'Crear un usuario';
$string['auth_casdescription'] = 'Este método emprega un servidor CAS (Central Authentication Service) para autenticar aos usuarios nun entorno SSO (Single Sign On). Tamén se pode empregar unha autenticación simple LDAP. Se o nome de usuario e o contrasinal son correctos conforme con CAS, Moodle crea unha entrada de novo usuario na súa base de datos, tomando de LDAP os atributos do usuario se for preciso. Nos seguintes accesos só se comproba o nome de usuario e o contrasinal.';
$string['auth_cas_enabled'] = 'Actíveo se quere empregar a identificación CAS.';
$string['auth_cas_hostname'] = 'Nome do servidor CAS <br />p.ex. host.domain.fr';
$string['auth_cas_hostname_key'] = 'Nome do servidor';
$string['auth_cas_invalidcaslogin'] = 'Non foi posíbel autorizar o seu acceso';
$string['auth_cas_language'] = 'Seleccione o idioma para as páxinas de autenticación';
$string['auth_cas_language_key'] = 'Idioma';
$string['auth_cas_logincas'] = 'Acceso de conexión segura';
$string['auth_cas_logoutcas'] = 'Seleccione «Si» se quere saír do CAS cando se desconecte de Moodle';
$string['auth_cas_logoutcas_key'] = 'Saír do CAS';
$string['auth_cas_logout_return_url'] = 'Forneza o URL a onde serán redireccionados os usarios de CAS despois de saír.<br />Se o deixa baleiro, os usuarios serán redireccionados ao lugar ao que Moodle redirecciona aos seus usuarios';
$string['auth_cas_logout_return_url_key'] = 'URL alternativo de saída da conta';
$string['auth_cas_multiauth'] = 'Seleccione «Si» se quere dispor de autenticación múltipla (CAS + outra autenticación)';
$string['auth_cas_multiauth_key'] = 'Autenticación múltipla';
$string['auth_casnotinstalled'] = 'Non é posíbel empregar a autenticación CAS. Non está instalado o módulo PHP LDAP.';
$string['auth_cas_port'] = 'Porto do servidor CAS';
$string['auth_cas_port_key'] = 'Porto';
$string['auth_cas_proxycas'] = 'Seleccione «Si» se quere empregar CAS en modo proxy';
$string['auth_cas_proxycas_key'] = 'Modo proxy';
$string['auth_cas_server_settings'] = 'Configuración do servidor CAS';
$string['auth_cas_text'] = 'Conexión segura';
$string['auth_cas_use_cas'] = 'Usar CAS';
$string['auth_cas_version'] = 'Versión do protocolo CAS queempregar';
$string['CASform'] = 'Opción de autenticación';
$string['noldapserver'] = 'Non hai ningún servidor LDAP configurado para CAS. a sincronización foi desactivada.';
$string['pluginname'] = 'Servidor CAS (SSO)';
