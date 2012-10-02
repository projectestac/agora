<?php

// All of the language strings in this file should also exist in
// auth.php to ensure compatibility in all versions of Moodle.

$string['auth_dbcantconnect'] = 'No s\'ha pogut establir una connexió amb la base de dades d\'autenticació...';
$string['auth_dbchangepasswordurl_key'] = 'URL de canvi de contrasenya';
$string['auth_dbdebugauthdb'] = 'Depura ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Depuració de la connexió ADOdb amb una base de dades externa: utilitzeu aquesta opció si apareix una pàgina en blanc durant l\'inici de sessió. Opció no apta per a llocs en producció.';
$string['auth_dbdeleteuser'] = 'S\'ha suprimit l\'usuari $a[0] amb ID $a[1]';
$string['auth_dbdeleteusererror'] = 'S\'ha produït un error en suprimir l\'usuari $a';
$string['auth_dbdescription'] = 'Aquest mètode utilitza una taula d\'una base de dades externa per comprovar si un nom d\'usuari i una contrasenya són vàlids. Si el compte és nou, aleshores també es pot copiar en Moodle informació d\'altres camps.';
$string['auth_dbextencoding'] = 'Codificació de la base de dades externa';
$string['auth_dbextencodinghelp'] = 'Codificació utilitzada per la base de dades externa';
$string['auth_dbextrafields'] = 'Aquests camps són opcionals. Podeu triar d\'emplenar alguns camps d\'usuari del Moodle amb informació dels <b>camps de la base de dades externa</b> especificats aquí. <p>Si els deixeu en blanc s\'utilitzaran valors per defecte.<p>En tot cas, l\'usuari podrà editar tots aquests camps quan es connecti.';
$string['auth_dbfieldpass'] = 'Nom del camp que conté la contrasenya';
$string['auth_dbfieldpass_key'] = 'Camp de la contrasenya';
$string['auth_dbfielduser'] = 'Nom del camp que conté el nom d\'usuari';
$string['auth_dbfielduser_key'] = 'Camp del nom d\'usuari';
$string['auth_dbhost'] = 'L\'ordinador que allotja el servidor de la base de dades.';
$string['auth_dbhost_key'] = 'Servidor';
$string['auth_dbinsertuser'] = 'S\'ha inserit l\'usuari $a[0] amb ID $a[1]';
$string['auth_dbinsertusererror'] = 'S\'ha produït un error en inserir l\'usuari $a';
$string['auth_dbname'] = 'El nom de la base de dades';
$string['auth_dbname_key'] = 'Nom de la base de dades';
$string['auth_dbpass'] = 'Contrasenya corresponent al nom d\'usuari anterior';
$string['auth_dbpass_key'] = 'Contrasenya';
$string['auth_dbpasstype'] = 'Especifiqueu el format que utilitza el camp de la contrasenya. El xifratge MD5 és útil per connectar-se a altres aplicacions web comunes com ara PostNuke';
$string['auth_dbpasstype_key'] = 'Format de la contrasenya';
$string['auth_dbreviveduser'] = 'S\'ha restaurat l\'usuari $a[0] amb ID $a[1]';
$string['auth_dbrevivedusererror'] = 'S\'ha produït un error en restaurar l\'usuari $a';
$string['auth_dbsetupsql'] = 'Ordre de configuració de SQL';
$string['auth_dbsetupsqlhelp'] = 'Ordre SQL per a configuració especial de la base de dades, generalment utilitzada per configurar la codificació de la comunicació. Exemple per a MySQL i PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'S\'ha suspès l\'usuari $a[0] amb ID $a[1]';
$string['auth_dbsuspendusererror'] = 'S\'ha produït un error en suspendre l\'usuari $a';
$string['auth_dbsybasequoting'] = 'Utilitza cometes sybase';
$string['auth_dbsybasequotinghelp'] = 'Alteració de cometes estil Sybase: necessària per a Oracle, MS SQL i algunes altres bases de dades. No utilitzeu aquesta opció amb MySQL.';
$string['auth_dbtable'] = 'Nom de la taula en la base de dades';
$string['auth_dbtable_key'] = 'Taula';
$string['auth_dbtitle'] = 'Base de dades externa';
$string['auth_dbtype'] = 'Tipus de base de dades (vg. la <A HREF=../lib/adodb/readme.htm#drivers>documentació sobre ADOdb</A>)';
$string['auth_dbtype_key'] = 'Base de dades';
$string['auth_dbupdatinguser'] = 'S\'està actualitzant l\'usuari $a[0] amb ID $a[1]';
$string['auth_dbuser'] = 'Nom d\'usuari amb accés de lectura a la base de dades';
$string['auth_dbuser_key'] = 'Usuari de la base de dades';
$string['auth_dbusernotexist'] = 'No es pot actualitzar un usuari no existent: $a';
$string['auth_dbuserstoadd'] = 'Registres d\'usuari per afegir: $a';
$string['auth_dbuserstoremove'] = 'Registres d\'usuari per suprimir: $a';