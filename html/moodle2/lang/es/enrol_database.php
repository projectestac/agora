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
 * Strings for component 'enrol_database', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Dar de baja usuarios suspendidos';
$string['dbencoding'] = 'Codificación de base de datos';
$string['dbhost'] = 'Host de la base de datos';
$string['dbhost_desc'] = 'Escriba la dirección IP del servidor de la base de datos o el nombre del host';
$string['dbname'] = 'Nombre de la base de datos';
$string['dbpass'] = 'Contraseña de la base de datos';
$string['dbsetupsql'] = 'Comando de configuración de la base de datos';
$string['dbsetupsql_desc'] = 'Comando SQL para la instalación de bases de datos especiales, a menudo utilizado para establecer la codificación de comunicación - ejemplo para MySQL y PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Usar cuotas de Sybase';
$string['dbsybasequoting_desc'] = 'Estilo de comilla simple Sybase  - necesario para Oracle, MS SQL y otras bases de datos. !No utilizar para MySQL!';
$string['dbtype'] = 'Driver de la base de datos';
$string['dbtype_desc'] = 'Nombre del driver de la base de datos ADOdb, tipo del motor de base de datos externo.';
$string['dbuser'] = 'Usuario de la base de datos';
$string['debugdb'] = 'Depurar ADOdb';
$string['debugdb_desc'] = 'Depurar conexión ADOdb a base de datos externa - se usa cuando se obtiene una página en blanco en la identificación. !No es adecuado para sitios en producción!';
$string['defaultcategory'] = 'Categoría por defecto del nuevo curso';
$string['defaultcategory_desc'] = 'Categoría por defecto para cursos de creación automática. Usada cuando no se ha especificado o no se ha encontrado el ID de una nueva categoría.';
$string['defaultrole'] = 'Rol por defecto';
$string['defaultrole_desc'] = 'Rol que se asigna por defecto si nigún otro rol se especifica en una tabla externa.';
$string['ignorehiddencourses'] = 'Pasar por alto cursos ocultos';
$string['ignorehiddencourses_desc'] = 'Si se activa esta opción, los usuarios no serán matriculados en cursos configurados como no disponibles para los estudiantes.';
$string['localcategoryfield'] = 'Campo de categoría local';
$string['localcoursefield'] = 'Campo de curso local';
$string['localrolefield'] = 'Campo de rol local';
$string['localuserfield'] = 'Campo de usuario local';
$string['newcoursecategory'] = 'Campo de ID de categoría del nuevo curso';
$string['newcoursefullname'] = 'Campo de nombre completo del nuevo curso';
$string['newcourseidnumber'] = 'Campo de número ID del nuevo curso';
$string['newcourseshortname'] = 'Campo de nombre corto del nuevo curso';
$string['newcoursetable'] = 'Tabla de nuevos cursos remotos';
$string['newcoursetable_desc'] = 'Se especifica el nombre de la tabla que contiene la lista de cursos que deberían crearse automáticamente. Si está vacía, significa que no está creado ningún curso.';
$string['pluginname'] = 'Base de datos externa';
$string['pluginname_desc'] = 'Puede utilizar una base de datos externa (casi de cualquier tipo) para controlar sus matriculaciones. Se asume que su base de datos externa contiene al menos un campo que contiene un ID de curso, y un campo que contiene un ID de usuario. Estos se comparan con los campos que usted elija en el curso local y las tablas de usuario.';
$string['remotecoursefield'] = 'Campo curso remoto';
$string['remotecoursefield_desc'] = 'El nombre del campo en la tabla remota que usamos para casar entradas en la tabla del curso.';
$string['remoteenroltable'] = 'Tabla de matriculación remota de usuarios';
$string['remoteenroltable_desc'] = 'Indique el nombre de la tabla que contiene la lista de matrículas de usuario. Si queda vacío significa que no hay sincronización en la matriculación de usuarios.';
$string['remoterolefield'] = 'Campo rol remoto';
$string['remoterolefield_desc'] = 'El nombre del campo en la tabla remota que usamos para casar entradas en la tabla del curso.';
$string['remoteuserfield'] = 'Campo usuario remoto';
$string['remoteuserfield_desc'] = 'El nombre del campo en la tabla remota que usamos para casar entradas en la tabla del curso.';
$string['settingsheaderdb'] = 'Conexión con la base de datos externa';
$string['settingsheaderlocal'] = 'Asignación de campos locales';
$string['settingsheadernewcourses'] = 'Creación de nuevos cursos';
$string['settingsheaderremote'] = 'Sincronización de matriculación remota';
$string['templatecourse'] = 'Nueva plantilla de curso';
$string['templatecourse_desc'] = 'Opcional: Auto-crear cursos puede copiar su configuración de una plantilla de curso. Escriba aquí el nombre corto de la plantilla de curso.';
