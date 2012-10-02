<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_mnet_auto_add_remote_users'] = 'Cuando se deja en \'sí\', un registro local de usuario es creado automáticamente cuando un usuario remoto incia sesión por primera vez.';
$string['auth_mnet_roamin'] = 'Estos usuarios de este host pueden divagar por su sitio.';
$string['auth_mnet_roamout'] = 'Sus usuarios pueden salir a divagar a estos hosts';
$string['auth_mnet_rpc_negotiation_timeout'] = 'El tiempo de expiración en segundos para autenticarse a través de transporte XMLRPC.';
$string['auth_mnetdescription'] = 'Usuarios son autenticados de acuerdo a la confianza web definida en la configuración de la Red Moodle.';
$string['auth_mnettitle'] = 'Autenticación de la Red Moodle (\'Moodle Network\')';
$string['auto_add_remote_users'] = 'Añadir automáticamente usuarios remotos';
$string['rpc_negotiation_timeout'] = 'Tiempo de expiración para la negociación RPC';
$string['sso_idp_description'] = 'Publique este servicio para permitir a sus usuarios divagar al sitio Moodle $a sin tener que reiniciar sesión allí. <ul><li><em>Dependencia</em>: Usted debe también <strong>suscribirse</strong> al servicio SSO (Proveedor de servicios) en $a.</li></ul><br />Suscríbase a este servicio para permitir a los usuarios autenticados de $a acceder a su sitio sin tener que reiniciar sesión. <ul><li><em>Dependencia</em>: Usted debe también <strong>publicar</strong> el servicio SSO (proveedor de servicios) a $a.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (Proveedor de Identidad)';
$string['sso_mnet_login_refused'] = 'Al nombre de usuario $a[0] no le es permitido iniciar sesión desde $a[1].';
$string['sso_sp_description'] = 'Publique este servicio para permitir a usuarios autenticados acceder a su sitio desde $a sin tener que reinciar sesión.<ul><li><em>Dependecia</em>: Usted debe también <strong>subscribirse</strong> al servicio SSO (Proveedor de identidad) en $a.</li></ul><br />Suscríbase a este servicio para permitir a sus usuarios divagar al sitio Moodle $a sin tener que reiniciar sesión allí. <ul><li><em>Dependencia</em>: Usted debe también <strong>publicar</strong> el servicio SSO (Proveedor de identidad) a $a.</li></ul><br />';
$string['sso_sp_name'] = 'SSO (Proveedor de Servicios)';