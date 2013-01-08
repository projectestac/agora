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
 * Strings for component 'report_security', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_name'] = 'Archivo config.php escribible';
$string['check_configrw_ok'] = 'El archivo config.php no puede ser modificado por scripts PHP.';
$string['check_configrw_warning'] = 'Los scripts PHP pueden modificar el archivo config.php.';
$string['check_cookiesecure_details'] = '<p>Si habilita la comunicación https, se recomienda que también habilite las \'cookies\' seguras. Debería asimismo agregar una redirección permanente desde http a https.</p>';
$string['check_cookiesecure_error'] = 'Por favor, habilite \'cookies\' seguras';
$string['check_cookiesecure_name'] = '\'Cookies\' seguras';
$string['check_cookiesecure_ok'] = 'Habilitadas \'Cookies\' seguras.';
$string['check_defaultuserrole_details'] = '<p>A todos los usuarios identificados se les asignan los permisos del rol de usuario por defecto. Por favor, asegúrese de que no se admiten permisos de riego en este rol. </p>
<p>Para el rol de usuario por defecto solo se permite heredar el tipo <em>usuario autenticado</em>. El  permiso para ver el curso no debe estar habilitado. </p>';
$string['check_defaultuserrole_name'] = 'Rol por defecto de todos los usuarios';
$string['check_displayerrors_error'] = 'La configuración de PHP para mostrar los errores está habilitada. Se recomienda que esta esté deshabilitada.';
$string['check_displayerrors_name'] = 'Visualización de errores de PHP';
$string['check_displayerrors_ok'] = 'Visualización de errores de PHP deshabilitados';
$string['check_emailchangeconfirmation_details'] = '<p>Se recomienda utilizar un paso de confirmación por email cuando los usuarios cambian la dirección de correo electrónico de su perfil. Si se deshabilita, los spammers pueden tratar de explotar el servidor para mandar correo basura (spam).</p> <p>También se puede bloquear el campo de correo electrónico en la extensión de identificación, aunque aquí no se considera esta posibilidad.</p>';
$string['check_emailchangeconfirmation_name'] = 'Confirmar cambio de correo electrónico';
$string['check_embed_name'] = 'Permitir EMBED y OBJET';
$string['check_frontpagerole_details'] = 'El rol por defecto en la página principal se da a todos los usuarios registrados para las actividades en la portada. Por favor, asegúrese de que no están permitidos privilegios con riesgo para este rol.
Se recomienda crear un rol especial a tal efecto y no se use un tipo de rol preestablecido.';
$string['check_frontpagerole_error'] = '¡Detectado un rol en la página principal "{$a}" definido de forma incorrecta!';
$string['check_frontpagerole_name'] = 'Rol en la página principal';
$string['check_frontpagerole_notset'] = 'El rol en la página principal no está establecido.';
$string['check_frontpagerole_ok'] = 'La definición del rol en la página principal es correcta.';
$string['check_globals_ok'] = 'Los registros globales están deshabilitados';
$string['check_google_error'] = 'Se permite el acceso al motor de búsquedas pero el acceso de invitados está desactivado.';
$string['check_google_name'] = 'Abrir a Google';
$string['check_guestrole_error'] = '¡El rol de invitado "{$a}" está definido incorrectamente!';
$string['check_guestrole_name'] = 'Rol de invitado';
$string['check_guestrole_notset'] = 'El ron de invitado no está configurado.';
$string['check_guestrole_ok'] = 'La definición del rol de invitado es correcta.';
$string['check_mediafilterswf_error'] = '';
$string['check_mediafilterswf_name'] = 'Habilitado el filtro .swf';
$string['check_mediafilterswf_ok'] = 'El filtro Flash no está activado.';
$string['check_noauth_details'] = '<p>La extensión <em>Sin identificación</em> no está diseñado para sitios en producción. Por favor deshabilítelo a menos que este sea un servidor de pruebas de desarrollo.</p>';
$string['check_noauth_error'] = 'La extensión "Sin identificación" no puede usarse en sitios en producción.';
$string['check_noauth_name'] = 'Sin identificación';
$string['check_noauth_ok'] = 'La extensión "Sin identificación" está deshabilitada';
$string['check_openprofiles_name'] = 'Abrir perfiles de usuario';
$string['check_openprofiles_ok'] = 'Se requiere identificación antes de ver los perfiles de usuario.';
$string['check_passwordpolicy_error'] = 'No se ha configurado la política de contraseñas.';
$string['check_passwordpolicy_name'] = 'Política de contraseñas';
$string['check_passwordpolicy_ok'] = 'Política de contraseñas habilitada.';
$string['check_passwordsaltmain_name'] = 'Salado de contraseña';
$string['check_passwordsaltmain_ok'] = 'El salado de la contraseña es correcto';
$string['check_passwordsaltmain_weak'] = 'El salado de la contraseña es débil';
$string['check_riskadmin_detailsok'] = '<p>Por favor, compruebe la siguiente lista de los administradores del sistema:</p>{$a}';
$string['check_riskadmin_name'] = 'Administradores';
$string['check_riskadmin_ok'] = 'Se han encontrado {$a} administrador/es del sistema';
$string['check_riskbackup_name'] = 'Copia de seguridad de datos de usuario';
$string['check_riskxss_name'] = 'Usuarios de confianza XSS';
$string['check_unsecuredataroot_name'] = 'Directorio dataroot inseguro';
$string['check_unsecuredataroot_ok'] = 'El directorio de datos (normalmente /moodledata) no debe ser accesible desde la web';
$string['configuration'] = 'Configuración';
$string['description'] = 'Descripción';
$string['details'] = 'Detalles';
$string['issue'] = 'Tema';
$string['pluginname'] = 'Información general sobre seguridad';
$string['security:view'] = 'Ver informe de seguridad';
$string['status'] = 'Estatus';
$string['statuscritical'] = 'Crítico';
$string['statusinfo'] = 'Información';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Grave';
$string['statuswarning'] = 'Advertencia';
$string['timewarning'] = 'El procesamiento de datos puede tardar mucho tiempo, por favor esperar...';
