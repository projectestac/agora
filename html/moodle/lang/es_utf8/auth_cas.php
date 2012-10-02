<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = 'Opción de autenticación';
$string['accesCAS'] = 'Usuarios CAS';
$string['accesNOCAS'] = 'Otros usuarios';
$string['auth_cas_auth_user_create'] = 'Crear usuarios en fuente externa';
$string['auth_cas_baseuri'] = 'URI del servidor (en blanco si no hay baseUri)<br />Por ejemplo, si el servidor CAS responde a host.domaine.fr/CAS/ entonces<br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'Base URI';
$string['auth_cas_broken_password'] = 'No puede seguir sin cambiar su contraseña; en todo caso, no hay una página disponible para cambiarla. Por favor, contacte con su administrador Moodle.';
$string['auth_cas_cantconnect'] = 'La parte LDAP del módulo CAS no puede conectarse con el servidor: $a';
$string['auth_cas_casversion'] = 'Versión';
$string['auth_cas_changepasswordurl'] = 'URL de cambio de contraseña';
$string['auth_cas_create_user'] = 'Activar si se desea insertar usuarios autentificados con CAS en la base de datos de Moodle. En caso contrario, sólo tendrán acceso los usuarios que ya existen en la base de datos de Moodle.';
$string['auth_cas_create_user_key'] = 'Crear usuario';
$string['auth_cas_enabled'] = 'Activar si se desea usar la autentificación CAS.';
$string['auth_cas_hostname'] = 'Nombre del servidor CAS <br />e.g.: host.domain.fr';
$string['auth_cas_hostname_key'] = 'Nombre del host (\'Hostname\')';
$string['auth_cas_invalidcaslogin'] = 'Lo sentimos, ha fallado su login: no se puede autorizar';
$string['auth_cas_language'] = 'Idioma seleccionado';
$string['auth_cas_language_key'] = 'Idioma';
$string['auth_cas_logincas'] = 'Acceso de conexión segura';
$string['auth_cas_logoutcas'] = 'Cambie a \'sí\' si quiere salir del CAS cuando se desconecte de Moodle';
$string['auth_cas_logoutcas_key'] = 'Salir del CAS';
$string['auth_cas_multiauth'] = 'Cambie a \'sí\' si quiere tener multi-autenticación (CAS + otra autenticación)';
$string['auth_cas_multiauth_key'] = 'Multi-autenticación';
$string['auth_cas_port'] = 'Puerto del servidor CAS';
$string['auth_cas_port_key'] = 'Puerto';
$string['auth_cas_proxycas'] = 'Cambie a \'sí\' si quiere utilizar CAS en modo proxy';
$string['auth_cas_proxycas_key'] = 'Modo proxy';
$string['auth_cas_server_settings'] = 'Configuración del servidor CAS';
$string['auth_cas_text'] = 'Conexión segura';
$string['auth_cas_use_cas'] = 'Usar CAS';
$string['auth_cas_version'] = 'Versión de CAS';
$string['auth_casdescription'] = 'Este método utiliza un servidor CAS (Central Authentication Service) para autentificar a los usuarios en un contexto SSO (Single Sign On). Usted puede también usar una autenticación simple LDAP. Si el nombre de usuario y la contraseña son válidos de acuerdo con CAS, Moodle crea una entrada de nuevo usuario en su base de datos, tomando de LDAP los atributos del usuario si fuera preciso. En los siguientes accesos sólo se comprueban el nombre de usuario y la contraseña.';
$string['auth_casnotinstalled'] = 'No se puede usar la autenticación CAS. El módulo PHP LDAP no está instalado.';
$string['auth_castitle'] = 'Usar un servidor CAS (SSO)';