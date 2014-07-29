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
 * Strings for component 'auth', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   auth
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actauthhdr'] = 'Plugins de identificación disponibles';
$string['alternatelogin'] = 'Si introduce aquí una URL, se usará como página de acceso al sitio. La página debería contener un formulario cuya propiedad de acción está ajustada a <strong>\'{$a}\'</strong> y devuelve los campos <strong>nombre de usuario</strong> y <strong>contraseña</strong>.<br />Procure no introducir una URL incorrecta puesto que hacerlo supondrá su expulsión del sitio.<br />Deje el ajuste en blanco para utilizar la página de acceso por defecto.';
$string['alternateloginurl'] = 'URL de acceso alternativo';
$string['auth_changepasswordhelp'] = 'Ayuda sobre cambio de contraseña';
$string['auth_changepasswordhelp_expl'] = 'Muestra ayuda a los usuarios que han perdido su contraseña {$a}. Esta opción puede mostrarse como añadidura o en lugar de la <strong>URL de cambio de contraseña</strong> o como un cambio de contraseña interno de Moodle.';
$string['auth_changepasswordurl'] = 'URL Cambio de contraseña';
$string['auth_changepasswordurl_expl'] = 'Especifique la URL a la que enviar a los usuarios que han perdido su contraseña {$a}. Seleccione <strong>No</strong> en la <strong>Página Usar página estándar de cambio de contraseña</strong>.';
$string['auth_changingemailaddress'] = 'Usted ha solicitado un cambio de dirección email, desde {$a->oldemail} a {$a->newemail}. Por razones de seguridad, le hemos enviado un mensaje de email a la nueva dirección para confirmar que usted es el titular. Su nueva dirección será actualizada una vez que abra la dirección que le enviamos en ese mensaje.';
$string['auth_common_settings'] = 'Ajustes comunes';
$string['auth_data_mapping'] = 'Mapeado de datos';
$string['authenticationoptions'] = 'Opciones de identificación';
$string['auth_fieldlock'] = 'Bloquear valor';
$string['auth_fieldlock_expl'] = '<p><b>Bloquear valor:</b> Si se activa, los usuarios y administradores de Moodle no podrán editar directamente el campo. Utilice esta opción si mantiene estos datos en el sistema de identificación externo. </p>';
$string['auth_fieldlocks'] = 'Bloquear campos de usuario';
$string['auth_fieldlocks_help'] = '<p>Usted puede bloquear los campos de datos de los usuarios, lo que resulta útil en sitios donde esos datos están mantenidos por administradores de forma manual, editando los registros de los usuarios o subiéndolos mediante la utilidad \'Subir usuarios\'. Si usted bloquea campos requeridos por Moodle, asegúrese de que proporciona esos datos al crear las cuentas de los usuarios; de otro modo las cuentas no serán utilizables.</p><p>Considere fijar esta opción de bloqueo en \'Desbloqueado si está vacío\', para evitar este problema.</p>';
$string['authinstructions'] = 'Aquí puede proporcionar instrucciones a sus usuarios, de forma que sepan qué usuario y contraseña deben usar. El texto que incluya aquí aparecerá en la página de acceso. Si deja esto en blanco no aparecerá ninguna instrucción.';
$string['auth_invalidnewemailkey'] = 'Error: Si está intentando confirmar un cambio de dirección email. debe haber cometido un error al copiar la URL que le enviamos por email. Por favor, copie la dirección y pruebe de nuevo.';
$string['auth_multiplehosts'] = 'Es posible especificar múltiples servidores (por ej. servidor1.com;servidor2.com;servidor3.com';
$string['auth_outofnewemailupdateattempts'] = 'Ha hecho más intentos de los permitidos para actualizar su dirección email. Su solicitud de actualización ha sido cancelada.';
$string['auth_passwordisexpired'] = 'Su contraseña ha caducado ¿Desea cambiar su contraseña ahora?';
$string['auth_passwordwillexpire'] = 'Su contraseña caducará en {$a} días ¿Desea cambiar su contraseña ahora?';
$string['auth_remove_delete'] = 'Borrado completo';
$string['auth_remove_keep'] = 'Mantener interna';
$string['auth_remove_suspend'] = 'Suspender interna';
$string['auth_remove_user'] = 'Especifique qué hacer con una cuenta de usuario interna durante sincronización masiva cuando el usuario fue eliminado de la fuente externa. Únicamente los usuarios suspendidos son automáticamente revividos si ellos reaparecen en una fuente externa.';
$string['auth_remove_user_key'] = 'Usuario externo eliminado';
$string['auth_sync_script'] = 'Script de sincronización del Cron';
$string['auth_updatelocal'] = 'Actualizar datos locales';
$string['auth_updatelocal_expl'] = '<p><b>Actualizar datos locales:</b> Si está activado, el campo debe ser actualizado (con identificación externa) cada vez que el usuario entra o se produce una sincronización de usuarios. Los campos a actualizar localmente deberían ser bloqueados.</p>';
$string['auth_updateremote'] = 'Actualizar datos externos';
$string['auth_updateremote_expl'] = '<p><b>Actualizar datos externos:</b> Si está activado, la identificación externa será actualizada cuando se actualice el registro del usuario. Los campos deberían estar desbloqueados para poder editarlos.</p>';
$string['auth_updateremote_ldap'] = '<p><b>Note:</b> La actualización de datos LDAP externos requiere que usted ajuste los valores \'binddn\' y \'bindpw\' a un usuario con privilegios de edición de todos los registros de usuario. Por el momento, esto no preserva los atributos multi-valor, y eliminará los valores extra durante la actualización. </p>';
$string['auth_user_create'] = 'Habilitar creación por parte del usuario';
$string['auth_user_creation'] = 'Los nuevos usuarios (anónimos) pueden crear cuentas de usuario sobre el código externo de identificación y confirmar vía correo electrónico. Si usted habilita esto, recuerde también configurar las opciones del módulo específico para la creación de usuario.';
$string['auth_usernameexists'] = 'El nombre de usuario seleccionado ya existe. Por favor, elija otro.';
$string['auto_add_remote_users'] = 'Añadir automáticamente usuarios remotos';
$string['changepassword'] = 'Cambiar contraseña URL';
$string['changepasswordhelp'] = 'Aquí puede especificar dónde pueden sus usuarios recuperar o cambiar su nombre de usuario/contraseña si lo han olvidado. Para ello, aparecerá un botón en la página de entrada. Si deja esto en blanco, este botón no se mostrará.';
$string['chooseauthmethod'] = 'Escoger un método de identificación:';
$string['chooseauthmethod_help'] = '<p>Este menú le permite modificar el método de identificación
   para este usuario en particular.</p>

<p>Por favor, tenga cuidado porque este ajuste depende directamente
   de los métodos de identificación que haya definido en el sitio,
   y de los ajustes que estén siendo utilizados.</p>

<p>Una modificación incorrecta aquí podría impedir el acceso de
   la persona al servidor o incluso el borrado de su cuenta
   de forma completa, así que, por favor, utilice esta opción
   si sabe qué es lo que está haciendo.</p>';
$string['createpassword'] = 'Generar contraseña y notificar al usuario';
$string['createpasswordifneeded'] = 'Crear contraseña si es necesario';
$string['emailchangecancel'] = 'Cancelar cambio de email';
$string['emailchangepending'] = 'Cambio pendiente. Abra el enlace enviado en {$a->preference_newemail}.';
$string['emailnowexists'] = 'La dirección email que ha intentado asignar a su perfil ha sido asignada a otra persona. Su solicitud de cambio queda cancelada, pero puede intentarlo con otra dirección.';
$string['emailupdate'] = 'Actualizar dirección Email';
$string['emailupdatemessage'] = 'Estimado(a) {$a->fullname},

Ha solicitado un cambio de su dirección email en su cuenta de {$a->site}. Abra por favor la siguiente dirección en su navegador para confirmar este cambio.

{$a->url}';
$string['emailupdatesuccess'] = 'La dirección email del usuario <em>{$a->fullname}</em> ha sido actualizada con éxito a <em>{$a->email}</em>.';
$string['emailupdatetitle'] = 'Confirmación de actualización de email en {$a->site}';
$string['enterthenumbersyouhear'] = 'Escriba los números que oye';
$string['enterthewordsabove'] = 'Escriba las palabras de arriba';
$string['errormaxconsecutiveidentchars'] = 'Las contraseñas deben tener como máximo {$a} caracteres consecutivos idénticos';
$string['errorminpassworddigits'] = 'Las contraseñas deben tener al menos {$a} dígito(s).';
$string['errorminpasswordlength'] = 'Las contraseñas deben tener al menos una longitud de {$a} caracteres.';
$string['errorminpasswordlower'] = 'Las contraseñas deben tener al menos {$a} minúscula(s).';
$string['errorminpasswordnonalphanum'] = 'Las contraseñas deben tener al menos {$a} caracter(es) no alfanumérico(s).';
$string['errorminpasswordupper'] = 'Las contraseñas deben tener al menos {$a} mayúscula(s).';
$string['errorpasswordupdate'] = 'Error actualizando contraseña, la contraseña no ha cambiado';
$string['event_user_loggedin'] = 'El usuario ha iniciado sesión';
$string['eventuserloggedinas'] = 'El usuario inicia sesión como otro usuario';
$string['forcechangepassword'] = 'Forzar cambio de contraseña';
$string['forcechangepasswordfirst_help'] = 'Forzar a los usuarios a cambiar la contraseña la primera vez que accedan a Moodle.';
$string['forcechangepassword_help'] = 'Forzar a los usuarios a cambiar la contraseña la próxima vez que accedan a Moodle.';
$string['forgottenpassword'] = 'Si escribe aquí una URL, se usará como página de recuperación de la contraseña perdida para este sitio. Esto está pensado para sitios en los que las contraseñas se gestionan totalmente fuera de Moodle. Déjelo en blanco para usar la recuperación por defecto de la contraseña.';
$string['forgottenpasswordurl'] = 'URL contraseña olvidada';
$string['getanaudiocaptcha'] = 'Obtener un CAPTCHA de audio';
$string['getanimagecaptcha'] = 'Obtener un CAPTCHA de imagen';
$string['getanothercaptcha'] = 'Obtener otro CAPTCHA';
$string['guestloginbutton'] = 'Botón de entrada para invitados';
$string['incorrectpleasetryagain'] = 'Incorrecto. Por favor, inténtelo de nuevo.';
$string['infilefield'] = 'Campo requerido en el archivo';
$string['informminpassworddigits'] = 'al menos {$a} dígito(s)';
$string['informminpasswordlength'] = 'al menos {$a} caracter(es)';
$string['informminpasswordlower'] = 'al menos {$a} minúscula(s)';
$string['informminpasswordnonalphanum'] = 'al menos {$a} caracter(es) no alfanuméricos';
$string['informminpasswordupper'] = 'al menos {$a} mayúscula(s)';
$string['informpasswordpolicy'] = 'La contraseña debería tener {$a}';
$string['instructions'] = 'Instrucciones';
$string['internal'] = 'Interno';
$string['locked'] = 'Bloqueado';
$string['md5'] = 'Encriptación MD5';
$string['nopasswordchange'] = 'La contraseña no puede cambiarse';
$string['nopasswordchangeforced'] = 'No puede seguir sin cambiar su contraseña, sin embargo no existe ninguna página disponible para cambiarla. Por favor contacte a su administrador de Moodle.';
$string['noprofileedit'] = 'El perfil no puede editarse';
$string['ntlmsso_attempting'] = 'Intentando Single Sign On vía NTLM...';
$string['ntlmsso_failed'] = 'Falló el acceso automático; intente con la página de acceso normal...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO está desactivado.';
$string['passwordhandling'] = 'Gestión del campo de contraseña';
$string['plaintext'] = 'Texto plano';
$string['pluginnotenabled'] = 'El conector (\'plugin\') de identificación \'{$a}\' no está activado.';
$string['pluginnotinstalled'] = 'El conector (plugin) de identificación \'{$a}\' no está instalado.';
$string['potentialidps'] = 'Identifíquese usando su cuenta en:';
$string['recaptcha'] = 'reCAPTCHA';
$string['recaptcha_help'] = 'El CAPTCHA se utiliza para impedir abusos de programas automáticos. Simplemente escriba las palabras en la caja, en orden y separadas por un espacio.

Si no está seguro de qué palabras son, puede conseguir otro CAPTCHA, o un CAPTCHA de audio.';
$string['selfregistration'] = 'Registrarse a sí mismo';
$string['selfregistration_help'] = 'Escoja qué conector (\'plugin\') de identificación manejar cuando los usuarios se registren a sí mismos.';
$string['sha1'] = 'SHA-1 hash';
$string['showguestlogin'] = 'Puede ocultar o mostrar el botón de entrada para invitados en la página de acceso.';
$string['stdchangepassword'] = 'Utilizar Página de cambio de contraseña estándar';
$string['stdchangepassword_expl'] = 'Si el sistema de identificación externa permite cambios de contraseña en Moodle, seleccione Sí. Este ajuste anula la configuración de \'Cambiar contraseña URL\'.';
$string['stdchangepassword_explldap'] = 'NOTA: Se recomienda que utilice LDAP sobre un túnel encriptado SSL (ldaps://) si el servidor LDAP es remoto.';
$string['suspended'] = 'Cuenta de usuario suspendida';
$string['suspended_help'] = 'Las cuentas de usuarios suspendidas no pueden acceder o utilizar los servicios web y los mensajes salientes se descartan.';
$string['testsettings'] = 'Configuración del test';
$string['testsettingsheading'] = 'Configuración del test de identificación de usuario - {$a}';
$string['unlocked'] = 'Desbloqueado';
$string['unlockedifempty'] = 'Desbloqueado si está vacío';
$string['update_never'] = 'Nunca';
$string['update_oncreate'] = 'Al crearse';
$string['update_onlogin'] = 'En cada acceso';
$string['update_onupdate'] = 'Al actualizar';
$string['user_activatenotsupportusertype'] = 'auth: ldap user_activate() no admite el tipo de usuario seleccionado: {$a}';
$string['user_disablenotsupportusertype'] = 'auth: ldap user_disable() no admite el tipo de usuario seleccionado (...aún)';
