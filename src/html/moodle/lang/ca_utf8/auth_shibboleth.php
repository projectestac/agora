<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_shib_changepasswordurl'] = 'URL de canvi de contrasenya';
$string['auth_shib_convert_data'] = 'API de modificació de dades';
$string['auth_shib_convert_data_description'] = 'Podeu utilitzar aquesta API per introduir modificacions en les dades que proporcioni Shibboleth. Teniu instruccions en el fitxer <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a>.';
$string['auth_shib_convert_data_warning'] = 'El fitxer no existeix o el procés del servidor web no el pot llegir.';
$string['auth_shib_instructions'] = 'Utilitzeu l\'<a href=\"$a\">entrada Shibboleth</a> per tenir accés mitjançant Shibboleth, si funciona amb la vostra institució. Si no, utilitzeu el formulari d\'entrada normal.';
$string['auth_shib_instructions_help'] = 'Aquí podeu proporcionar instruccions per explicar Shibboleth als vostres usuaris. Es visualitzaran en la secció d\'instruccions de la pàgina d\'entrada. Les instruccions han d\'incloure un enllaç a \"<b>$a</b>\" on els usuaris faran clic quan vulguin entrar.';
$string['auth_shib_no_organizations_warning'] = 'Si voleu utilitzar el servei integrat WAYF, heu de proporcionar una llista separada per comes d\'entityIDs dels proveïdors d\'identitats, els seus noms i opcionalment un iniciador de sessió.';
$string['auth_shib_only'] = 'Només Shibboleth';
$string['auth_shib_only_description'] = 'Activeu aquesta opció si cal imposar l\'autenticació via Shibboleth';
$string['auth_shib_username_description'] = 'Nom de la variable d\'entorn del servidor Shibboleth que s\'utilitzarà com a nom d\'usuari en Moodle';
$string['auth_shibboleth_contact_administrator'] = 'Si no esteu associat amb aquestes organitzacions i necessiteu accés a un curs del servidor, podeu contactar amb';
$string['auth_shibboleth_errormsg'] = 'Seleccioneu l\'organització de la qual sou membre';
$string['auth_shibboleth_login'] = 'Entrada Shibboleth';
$string['auth_shibboleth_login_long'] = 'Entrada en Moodle a través de Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Entrada manual';
$string['auth_shibboleth_select_member'] = 'Sóc membre de:';
$string['auth_shibboleth_select_organization'] = 'Per a l\'autenticació a través de Shibboleth, seleccioneu la vostra organització en la llista desplegable:';
$string['auth_shibbolethdescription'] = 'Amb aquest mètode us podeu connectar a un servidor Shibboleth per verificar i crear nous comptes';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Sembla que us heu autenticat via Shibboleth, però Moodle no ha rebut els vostres atributs d\'usuari. Comproveu que el vostre Proveïdor d\'Identitat ha alliberat els atributs ($a) necessaris al Proveïdor de Servei en el qual s\'està executant Moodle, o informeu l\'administrador d\'aquest servidor.';
$string['shib_not_all_attributes_error'] = 'Moodle necessita certs atributs de Shibboleth que en el vostre cas no són presents. Els atributs són: $a<br />Contacteu amb l\'administrador d\'aquest servidor o amb el vostre Proveïdor d\'Identitat.';
$string['shib_not_set_up_error'] = 'Sembla que l\'autenticació via Shibboleth no ha estat correctament configurada perquè no hi ha variables d\'entorn de Shibboleth presents per a aquesta pàgina. Consulteu les instruccions de configuració en el fitxer <a href=\"README.txt\">README</a> o contacteu amb l\'administrador d\'aquest Moodle.';