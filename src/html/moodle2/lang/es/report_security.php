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
 * Strings for component 'report_security', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   report_security
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_configrw_details'] = '<p>Se recomienda que los permisos para archivo de config.php se cambien después de la instalación para que este archivo no sea modificado por el servidor web. Observe por favor que esta medida no mejora la seguridad de su servidor significativamente, pero si puede alentar o limitar las explotaciones generales.</p>';
$string['check_configrw_name'] = 'Archivo config.php escribible';
$string['check_configrw_ok'] = 'El archivo config.php no puede ser modificado por scripts PHP.';
$string['check_configrw_warning'] = 'Los scripts PHP pueden modificar el archivo config.php.';
$string['check_cookiesecure_details'] = '<p>Si habilita la comunicación https, se recomienda que también habilite las \'cookies\' seguras. Debería asimismo agregar una redirección permanente desde http a https.</p>';
$string['check_cookiesecure_error'] = 'Por favor, habilite \'cookies\' seguras';
$string['check_cookiesecure_name'] = '\'Cookies\' seguras';
$string['check_cookiesecure_ok'] = 'Habilitadas \'Cookies\' seguras.';
$string['check_defaultuserrole_details'] = '<p>A todos los usuarios identificados se les asignan los permisos del rol de usuario por defecto. Por favor, asegúrese de que no se admiten permisos de riego en este rol. </p>
<p>Para el rol de usuario por defecto solo se permite heredar el tipo <em>usuario autenticado</em>. El  permiso para ver el curso no debe estar habilitado. </p>';
$string['check_defaultuserrole_error'] = 'El rol default para el usuario "{$a}" ¡está incorrectamente definido!';
$string['check_defaultuserrole_name'] = 'Rol por defecto de todos los usuarios';
$string['check_defaultuserrole_notset'] = 'El rol por defecto no está configurado.';
$string['check_defaultuserrole_ok'] = 'El rol por defecto para todas las definiciones de usuarios está correcto (OK)';
$string['check_displayerrors_details'] = '<p>Habilitar la configuración  PHP  <code>display_errors</code>no se recomienda en sitios de producción porque los mensajes de error pueden revelar información sensible sobre su servidor.</p>';
$string['check_displayerrors_error'] = 'La configuración de PHP para mostrar los errores está habilitada. Se recomienda que esta esté deshabilitada.';
$string['check_displayerrors_name'] = 'Visualización de errores de PHP';
$string['check_displayerrors_ok'] = 'Visualización de errores de PHP deshabilitados';
$string['check_emailchangeconfirmation_details'] = '<p>Se recomienda que se utilice una etapa de confirmación de email cuando los usuarios cambian su dirección de correo electrónico en su perfil. Si se deshabilita, los spammers pueden tratar de explotar el servidor para mandar correo chatarra (spam).</p> <p>También se puede bloquear el campo de correo electrónico en el plugin de autenticación, aunque aquí no se considera esta posibilidad.</p>';
$string['check_emailchangeconfirmation_error'] = 'Los usuarios pueden proporcionar cualquier dirección de correo electrónico.';
$string['check_emailchangeconfirmation_info'] = 'Los usuarios solamente pueden introducir una dirección de correo electrónico de los dominios permitidos.';
$string['check_emailchangeconfirmation_name'] = 'Confirmar cambio de correo electrónico';
$string['check_emailchangeconfirmation_ok'] = 'Cornfirmar el cambio de dirección de correo electrónico en el perfil de usuario.';
$string['check_embed_details'] = '<p>Embeber objetos ilimitadamente es muy peligroso - cualquier usuario registrado podría invocar un ataque XSS acontra otros usuarios del servidor. Esta configuración debería deshabilitarse en servidores de producción.</p>';
$string['check_embed_error'] = 'Habilitar embeber objetos ilimitadamente - esto es muy peligroso para la mayoría de los servidores.';
$string['check_embed_name'] = 'Permitir EMBED (incrustar) y OBJECT (objeto)';
$string['check_embed_ok'] = 'No se permite incrustar objetos ilimitadamente.';
$string['check_frontpagerole_details'] = 'El rol por defecto en la página principal se da a todos los usuarios registrados para las actividades en la portada. Por favor, asegúrese de que no están permitidos privilegios con riesgo para este rol.
Se recomienda crear un rol especial a tal efecto y no se use un tipo de rol preestablecido.';
$string['check_frontpagerole_error'] = '¡Detectado un rol en la página principal "{$a}" definido de forma incorrecta!';
$string['check_frontpagerole_name'] = 'Rol en la página principal';
$string['check_frontpagerole_notset'] = 'El rol en la página principal no está establecido.';
$string['check_frontpagerole_ok'] = 'La definición del rol en la página principal es correcta.';
$string['check_globals_details'] = '<p>Register globals se considera una configuración de PHP altamente insegura.</p> <p><code>register_globals=off</code> debe de establecerse en la configuración de PHP. Esta configuración se controla editando el archivo<code>php.ini</code>,la configuración de Apache/IIS o el archivo <code>.htaccess</code> .</p>';
$string['check_globals_error'] = 'Register globals DEBE estar deshabilitado. Por favor arregle la configuraciones PHP del servidor inmediatamente.';
$string['check_globals_name'] = 'Register globals (directiva PHP)';
$string['check_globals_ok'] = 'Los registros globales están deshabilitados';
$string['check_google_details'] = '<p>La configuración de Abierta a Google permite que los motores de búsqueda entren a los cursos que tengan acceso a invitados. No hay razón de configurarlo así cuando un sitio no  permite el acceso a invitados.</p>';
$string['check_google_error'] = 'Se permite el acceso al motor de búsquedas pero el acceso de invitados está desactivado.';
$string['check_google_info'] = 'Los motores de búsqueda (Google) pueden entrar como invitados.';
$string['check_google_name'] = 'Abrir a Google';
$string['check_google_ok'] = 'El acceso a los motores de búsqueda (Google) está deshabilitado.';
$string['check_guestrole_details'] = '<p>El rol de invitados se emplea para el acceso a cursos para invitados, para usuarios no-identificados y para invitados temporales. Por favor asegúrese que no se permitan permisos riesgosos en este rol.</p> <p>El único rol heredado soportado para el rol de invitado es (Invitado) <em>Guest</em>.</p>';
$string['check_guestrole_error'] = '¡El rol de invitado "{$a}" está definido incorrectamente!';
$string['check_guestrole_name'] = 'Rol de invitado';
$string['check_guestrole_notset'] = 'El ron de invitado no está configurado.';
$string['check_guestrole_ok'] = 'La definición del rol de invitado es correcta.';
$string['check_mediafilterswf_details'] = '<p>El incrustadoautomático de SWF es muy peligroso - cualquier usuario registrado puede invocar un ataque XSS contra otros usuarios del servidor. Por favor deshabilítelo en servidores de producción.</p>';
$string['check_mediafilterswf_error'] = 'El filtro para archivos multimedia de Flash está habilitado - esto es muy peligroso en la mayoría de los servidores.';
$string['check_mediafilterswf_name'] = 'Habilitado el filtro .swf';
$string['check_mediafilterswf_ok'] = 'El filtro para archivos multimedia Flash no está activado.';
$string['check_noauth_details'] = '<p>El plugin de  <em>No autenticación</em> no está diseñado para sitios en producción. Por favor dehabilítelo a menos que este sea un servidor de pruebas en desarrollo.</p>';
$string['check_noauth_error'] = 'El plugin de No-autenticación no puede emplearse en sitios de producción.';
$string['check_noauth_name'] = 'Sin identificación';
$string['check_noauth_ok'] = 'No hay plugins de autenticación deshabilitados.';
$string['check_openprofiles_details'] = '<p>Los perfiles de usuario abiertos pueden ser explotados por spammers. Se recomienda que haga una de dos acciones: Habilitar <code>Forzar a los usuarios a que se identifiquen para ver perfiles</code> o  Habilitar <code>Forzar usuarios a identificarse.</p>';
$string['check_openprofiles_error'] = 'Cualquier persona puede ver los perfiles de usuarios sin autenticarse';
$string['check_openprofiles_name'] = 'Abrir perfiles de usuario';
$string['check_openprofiles_ok'] = 'Se requiere identificación antes de ver los perfiles de usuario.';
$string['check_passwordpolicy_details'] = '<p>Se recomienda establecer una política de contraseñas, dado que el adivinar contraseñas en muchas ocasiones es la forma más sencilla de conseguir el acceso no-autorizado. Sin embargo, no debe hacer los requisitos demasiado estrictos, porque esto resultaría en que los usuarios no puedan recordar sus contraseñas y entonces las olviden o las escriban en un lugar visible. Ejemplos de contraseña segura sencilla serían: 3Cochinito$, 5Perrito$, 7Elefante$, 8Gatito$, 9Rosa$ (tienen mayúscula, minúsculas, dígitos y caracter especial, pero son fáciles de recordar).</p>';
$string['check_passwordpolicy_error'] = 'No se ha configurado la política de contraseñas.';
$string['check_passwordpolicy_name'] = 'Política de contraseñas';
$string['check_passwordpolicy_ok'] = 'Política de contraseñas habilitada.';
$string['check_passwordsaltmain_details'] = '<p>Configurar una sal de contraseña reduce grandemente el riesgo de robo de contraseña.</p> <p>Para configurar una sal de contraseña añada la siguiente linea a su archivo config.php file:</p> <code>$CFG->passwordsaltmain = \'some long random string here with lots of characters\';</code> <p>The random string of characters should be a mix of letters, numbers and other characters. A string length of at least 40 characters is recommended.</p> <p>Please refer to the <a href="{$a}" target="_blank">password salting documentation</a> Si deseara cambiar la sal de contraseña, una vez que la ponga, ¡NO DEBE BORRAR LA SAL, porque no podría volver a entrar a su sitio!</p>';
$string['check_passwordsaltmain_name'] = 'Salado de contraseña';
$string['check_passwordsaltmain_ok'] = 'El salado de la contraseña es correcto';
$string['check_passwordsaltmain_warning'] = 'No se ha configurado el salado de contraseña';
$string['check_passwordsaltmain_weak'] = 'El salado de la contraseña es débil';
$string['check_riskadmin_detailsok'] = '<p>Por favor, compruebe la siguiente lista de los administradores del sistema:</p>{$a}';
$string['check_riskadmin_detailswarning'] = '<p>Por favor verifique la lista siguiente de administradores del sistema:</p>{$a->admins} <p> Se recomienda que solamente se asigne el rol de administrador en el contexto de sistema. Los siguientes usuarios tienen asignaciones de rol de administrador (no soportadas) en otros contextos:</p>{$a->unsupported}';
$string['check_riskadmin_name'] = 'Administradores';
$string['check_riskadmin_ok'] = 'Se han encontrado {$a} administrador/es del sistema';
$string['check_riskadmin_unassign'] = '<a href="{$a->url}">{$a->fullname} ({$a->email}) rrevisar asignación de rol</a>';
$string['check_riskadmin_warning'] = 'Se encontraron asignaciones de rol para {$a->admincount} administradores del servidor y {$a->unsupcount}  admin no-soportados.';
$string['check_riskbackup_detailsok'] = 'Ningún rol permite explícitamente respaldar datos de usuario. Sin embargo, observe que los administradores con la capacidad de \'hacertodo\' (doanything) aún es probable que puedan hacer esto.';
$string['check_riskbackup_details_overriddenroles'] = '<p>Estas anulaciones de actividades les dan a los usuarios la habilidad para incluir datos de usuarios dentro de los respaldos. Por favor, asegúrese que este permiso sea estrictamente necesario.</p> {$a}';
$string['check_riskbackup_details_systemroles'] = '<p>Los siguientes roles del sistema actualmente les permiten a los usuarios incluir datos de usuarios dentro de los respaldos. Por favor, asegúrese que este permiso sea estrictamente necesario.</p> {$a}';
$string['check_riskbackup_details_users'] = '<p>Debido a los roles de arriba o a anulaciones locales, las siguientes cuentas de usuarios actualmente tienen permisos para realizar respaldos que contengan datos privados de cualquier usuario inscrito en estos cursos. Asegúrese que sean de confianza y estén protegidos por contraseñas seguras:</p> {$a}';
$string['check_riskbackup_editoverride'] = '<a href="{$a->url}">{$a->name} en {$a->contextname}</a>';
$string['check_riskbackup_name'] = 'Copia de seguridad de datos de usuario';
$string['check_riskbackup_ok'] = 'Ningún rol explicitamente permite respaldar datos de usuarios';
$string['check_riskbackup_warning'] = 'Se encontraron {$a->rolecount} roles, {$a->overridecount} anulaciones y  {$a->usercount} usuarios con la habilidad para respaldar datos de usuarios.';
$string['check_riskxss_details'] = '<p>RISK_XSS denota todas las capacidades peligrosas que solamente deberían emplear los usuarios de confianza.</p> <p>Por favor verifique la siguiente lista de usuarios y asegúrese que confúia en ellos completamente en este servidor:</p><p>{$a}</p>';
$string['check_riskxss_name'] = 'Usuarios de confianza XSS';
$string['check_riskxss_warning'] = 'RISK_XSS - encontró a {$a} usuarios en quienes se debe confiar (aunque no lo merezcan).';
$string['check_unsecuredataroot_details'] = '<p>El directorio dataroot no debe ser accesible via web. La mejor forma de asegurarse que el sirectorio no es accesible es emplear un directorio fuera del directorio público web.</p> <p>Si mueve el directorio, necesitará actualizar la <code>$CFG->dataroot</code> configuración en <code>config.php</code> apropiadamente.</p>';
$string['check_unsecuredataroot_error'] = 'Su directorio dataroot <code>{$a}</code> ¡ está en el lugar equivocado y está expuesto a la web!';
$string['check_unsecuredataroot_name'] = 'Directorio dataroot inseguro';
$string['check_unsecuredataroot_ok'] = 'El directorio de datos (normalmente /moodledata) no debe ser accesible desde la web';
$string['check_unsecuredataroot_warning'] = 'Su directorio dataroot <code>{$a}</code> ¡está en el lugar equivocado y está expuesto a la web!';
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
