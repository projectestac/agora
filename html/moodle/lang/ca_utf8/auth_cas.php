<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['CASform'] = 'Opció d\'autenticació';
$string['accesCAS'] = 'usuaris CAS';
$string['accesNOCAS'] = 'altres usuaris';
$string['auth_cas_auth_user_create'] = 'Crea usuaris externament';
$string['auth_cas_baseuri'] = 'URI del servidor (en blanc si no té baseUri)<br />Per exemple, si el servidor CAS respon a l\'adreça ordinador.domini.cat/CAS/ llavors <br />auth_cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'URI base';
$string['auth_cas_broken_password'] = 'No podeu continuar sense canviar la contrasenya, però no està disponible cap pàgina on pugueu canviar la contrasenya. Si us plau contacteu amb l\'administració del vostre Moodle.';
$string['auth_cas_cantconnect'] = 'La part LDAP del mòdul CAS no es pot connectar amb el servidor: $a';
$string['auth_cas_casversion'] = 'Versió';
$string['auth_cas_changepasswordurl'] = 'URL de canvi de contrasenya';
$string['auth_cas_create_user'] = 'Activeu aquesta opció si voleu inserir usuaris autenticats per CAS en la base de dades del Moodle. Si no, només podran entrar els usuaris que ja existeixin a la base de dades del Moodle.';
$string['auth_cas_create_user_key'] = 'Crea usuari';
$string['auth_cas_enabled'] = 'Activeu aquesta opció si voleu utilitzar autenticació CAS.';
$string['auth_cas_hostname'] = 'Nom del servidor CAS <br />P. ex. ordinador.domini.cat';
$string['auth_cas_hostname_key'] = 'Nom del servidor';
$string['auth_cas_invalidcaslogin'] = 'Entrada errònia. Potser no esteu autoritzat.';
$string['auth_cas_language'] = 'Idioma seleccionat';
$string['auth_cas_language_key'] = 'Idioma';
$string['auth_cas_logincas'] = 'Accés a la connexió segura';
$string['auth_cas_logoutcas'] = 'Activeu aquesta opció si voleu sortir de CAS quan sortiu de Moodle';
$string['auth_cas_logoutcas_key'] = 'Surt de CAS';
$string['auth_cas_multiauth'] = 'Activeu aquesta opció si voleu tenir diversos mètodes d\'autenticació (CAS + altres)';
$string['auth_cas_multiauth_key'] = 'Autenticació múltiple';
$string['auth_cas_port'] = 'Port del servidor CAS';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Activeu aquesta opció per utilitzar CAS en mode servidor intermediari';
$string['auth_cas_proxycas_key'] = 'Mode proxy';
$string['auth_cas_server_settings'] = 'Configuració del servidor CAS';
$string['auth_cas_text'] = 'Connexió segura';
$string['auth_cas_use_cas'] = 'Utilitza CAS';
$string['auth_cas_version'] = 'Versió de CAS';
$string['auth_casdescription'] = 'Aquest mètode utilitza un servidor CAS (Central Authentication Service, Servei Central d\'Autenticació) per autenticar els usuaris en un entorn Single Sign On (SSO, inscripció única). També podeu fer servir autenticació LDAP. Si el nom d\'usuari i la contrasenya són vàlids d\'acord amb el CAS, Moodle crea un nou usuari en la seva base de dades i si escau agafa els atributs del LDAP. En les entrades següents només es verifiquen el nom d\'usuari i la contrasenya.';
$string['auth_casnotinstalled'] = 'No es pot utilitzar l\'autenticació CAS. El mòdul PHP LDAP no està instal·lat.';
$string['auth_castitle'] = 'Servidor CAS (SSO)';