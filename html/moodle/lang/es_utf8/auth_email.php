<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_changingemailaddress'] = 'Usted ha solicitado un cabio de dirección email, desde $a->oldemail a $a->newemail. Por razones de seguridad, le hemos enviado un mensaje de email a la nueva dirección para confirmar que usted es el titular. Su nueva dirección será actualizada una vez que abra la dirección que le enviamos en ese mensaje.';
$string['auth_emailchangecancel'] = 'Cancelar cambio de email';
$string['auth_emailchangepending'] = 'Cambio pendiente. Abra el enlace enviado en $a->preference_newemail.';
$string['auth_emaildescription'] = 'La confirmación por correo alectrónico es el método de autenticación predeterminado. Cuando el usuario se inscribe, escogiendo su propio nombre de usuario y contraseña, se envía un email de confirmación a su dirección de correo electrónico. Este email contiene un enlace seguro a una página donde el usuario puede confirmar su cuenta. Las futuras entradas comprueban el nombre de usuario y contraseña contra los valores guardados en la base de datos de Moodle.';
$string['auth_emailnoemail'] = 'Se ha intentado enviarle un email sin éxito.';
$string['auth_emailnoinsert'] = 'No se ha podido agregar su registro a la base de datos.';
$string['auth_emailnowexists'] = 'La dirección email que ha intentado asignar a su perfil ha sido asignada a otra persona. Su solicitud de cambio queda cancelada, pero puede intentarlo con otra dirección.';
$string['auth_emailrecaptcha'] = 'Agrega un formulacio de confirmación visual o auditiva a la página de acceso para los usuarios auto-registrados vía email. Esta opción protege a su sitio contra los creadores de spam y contribuye a una causa importante. Para más detalles, visite http://recaptcha.net/learnmore.html for more details. <br /><em>Se requiere la extensión de PHP cURL.</em>';
$string['auth_emailrecaptcha_key'] = 'Habilitar elemento reCAPTCHA';
$string['auth_emailsettings'] = 'Ajustes';
$string['auth_emailtitle'] = 'Autenticación basada en Email';
$string['auth_emailupdate'] = 'Actualizar dirección Email';
$string['auth_emailupdatemessage'] = 'Estimado(a) $a->fullname,

Ha solicitado un cambio de su dirección email en su cuenta de $a->site. Abra por favor la siguiente dirección en su navegador para confirmar este cambio.

$a->url';
$string['auth_emailupdatesuccess'] = 'La dirección email del usuario <em>$a->fullname</em> ha sido actualizada con éxito a <em>$a->email</em>.';
$string['auth_emailupdatetitle'] = 'Confirmación de actualización de email en $a->site';
$string['auth_invalidnewemailkey'] = 'Error: Si está intentando confirmar un cambio de dirección email. debe haber cometido un error al copiar la dirección URL que le enviamos por email. Por favor, copie la dirección y pruebe de nuevo.';
$string['auth_outofnewemailupdateattempts'] = 'Ha hecho más intentos de los permitidos para actualizar su dirección email. Su solicitud de actualización ha sido cancelada.';