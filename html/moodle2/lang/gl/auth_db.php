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
 * Strings for component 'auth_db', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = 'Non foi posíbel conectar coa base de datos de autenticación especificada...';
$string['auth_dbchangepasswordurl_key'] = 'URL de cambio de contrasinal';
$string['auth_dbdebugauthdb'] = 'Depurar ADOdb';
$string['auth_dbdebugauthdbhelp'] = 'Depurar a conexión ADOdb a unha base de datos externa. Empregalo cando se estea a obter unha páxina en branco durante o acceso. Non é axeitado para sitios de produción.';
$string['auth_dbdeleteuser'] = 'Eliminado o usuario {$a->name} ID {$a->id}';
$string['auth_dbdeleteusererror'] = 'Produciuse un erro ao eliminar o usuario {$a}';
$string['auth_dbdescription'] = 'Este método emprega unha táboa dunha base de datos externa para comprobar se un determinado usuario e o seu contrasinal son correctos. Se a conta é nova, a información doutros campos tamén pode ser copiada en Moodle.';
$string['auth_dbextencoding'] = 'Codificación da base de datos externa';
$string['auth_dbextencodinghelp'] = 'Codificación empregada na base de datos externa';
$string['auth_dbextrafields'] = 'Estes campos son opcionais. Pode escoller encher algúns campos do usuario de Moodle con información desde os <b>campos da base de datos externa</b> que especifique aquí. <p>Se deixa isto en branco, tomaranse os valores predeterminados</p>.<p>En ambos casos, o usuario poderá editar todos estes campos despois de acceder</p>.';
$string['auth_dbfieldpass'] = 'Nome do campo que contén os contrasinais';
$string['auth_dbfieldpass_key'] = 'Campo de contrasinal';
$string['auth_dbfielduser'] = 'Nome do campo que contén os nomes de usuario';
$string['auth_dbfielduser_key'] = 'Campo do nome de usuario';
$string['auth_dbhost'] = 'O computador que aloxa o servidor da base de datos';
$string['auth_dbhost_key'] = 'Anfitrión';
$string['auth_dbinsertuser'] = 'Inserido o usuario {$a->name} ID {$a->id}';
$string['auth_dbinsertuserduplicate'] = 'Produciuse un erro ao inserir o usuario {$a->username} - O usuario con ese nome xa foi creado mediante  o engadido «{$a->auth}».';
$string['auth_dbinsertusererror'] = 'Produciuse un erro ao inserir o usuario {$a}';
$string['auth_dbname'] = 'Nome da propia base de datos';
$string['auth_dbname_key'] = 'Nome da BD';
$string['auth_dbpass'] = 'Contrasinal correspondente ao nome de usuario anterior';
$string['auth_dbpass_key'] = 'Contrasinal';
$string['auth_dbpasstype'] = '<p>Especifique o formato que emprega o campo de contrasinais. O cifrado MD5 é útil para conectar con outros aplicativos web como PostNuke.</p> <p>Empregue «interno» se quere que a base de datos externa cxestione os nomes de usuario e os enderezos de correo, mais que sexa Moodle quen xestione os contrasinais. Se emprega «interno», <i>debe</i> fornecer un campo cun enderezo de correo empregado na base de datos externa, e debe executar regularmente tanto admin/cron.php como auth/db/cli/sync_users.php. Moodle enviará un correo aos novos usuarios cun contrasinal temporal.</p>';
$string['auth_dbpasstype_key'] = 'Formato do contrasinal';
$string['auth_dbreviveduser'] = 'Recuperado o usuario {$a->name} ID {$a->id}';
$string['auth_dbrevivedusererror'] = 'Produciuse un erro ao recupera o usuario {$a}';
$string['auth_dbsetupsql'] = 'Orde de configuración de SQL';
$string['auth_dbsetupsqlhelp'] = 'Orde SQL para configuracións especiais da base de datos, empregase frecuentemente para configurar a codificación da comunicación. Exemplo para MySQL e PostgreSQL: <em>SETNAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = 'Suspendido o usuario {$a->name} ID {$a->id}';
$string['auth_dbsuspendusererror'] = 'Produciuse un erro ao suspender o usuario {$a}';
$string['auth_dbsybasequoting'] = 'Empregar delimitadores de sybase';
$string['auth_dbsybasequotinghelp'] = 'Escapado de comiña simple ao estilo sybase. É necesario para Oracle, MS SQL e algunhas outras bases de datos. Non empregalo para MySQL!';
$string['auth_dbtable'] = 'Nome da táboa na base de datos';
$string['auth_dbtable_key'] = 'Táboa';
$string['auth_dbtype'] = 'O tipo de base de datos (Vexa a  <a href="http://phplens.com/adodb/supported.databases.html" target="_blank">documentación de ADOdb</a> para obter máis detalles)';
$string['auth_dbtype_key'] = 'Base de datos';
$string['auth_dbupdatinguser'] = 'Actualizando o usuario {$a->name} ID {$a->id}';
$string['auth_dbuser'] = 'Nome de usuario con acceso de lectura a base de datos';
$string['auth_dbuser_key'] = 'Usuario da BD';
$string['auth_dbusernotexist'] = 'Non é posíbel actualizar un usuario que non existe: {$a}';
$string['auth_dbuserstoadd'] = 'Entradas do usuario que engadir:{$a}';
$string['auth_dbuserstoremove'] = 'Entradas do usuario que retirar:{$a}';
$string['pluginname'] = 'Base de datos externa';
