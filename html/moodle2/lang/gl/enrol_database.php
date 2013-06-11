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
 * Strings for component 'enrol_database', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Desmatricular os usuarios suspensos';
$string['dbencoding'] = 'Codificación da base de datos';
$string['dbhost'] = 'Equipo da base de datos';
$string['dbhost_desc'] = 'Escriba o IP do servidor de base de datos ou o nome do equipo';
$string['dbname'] = 'Nome da base de datos';
$string['dbpass'] = 'Contrasinal do servidor';
$string['dbsetupsql'] = 'Orde de configuración da base de datos';
$string['dbsetupsql_desc'] = 'Orde SQL para configuración especial da base de datos, que se adoita usar para configurar a codificación da comunicación - exemplo para MySQL e PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Usar comiñas sybase';
$string['dbsybasequoting_desc'] = 'O escapado do estilo de comiñas simple sybase - que necesita Oracle, MS SQL e algunhas outras bases de datos. Non o use con MySQL!';
$string['dbtype'] = 'Tipo da base de datos';
$string['dbtype_desc'] = 'Nome do controlador da base de datos ADOdb, tipo de base de datos externa.';
$string['dbuser'] = 'Usuario do servidor';
$string['debugdb'] = 'Depurar ADOdb';
$string['debugdb_desc'] = 'Depurar a conexión ADOdb cunha base de datos externa - utilícea cando obteña unha páxina en branco durante o inición de sesión. Non é apropiado para sitios en produción!';
$string['defaultcategory'] = 'Nova categoría de curso predeterminada';
$string['defaultcategory_desc'] = 'A categoría predeterminada para cursos autocreados. Utilízase cando non hai un identificador de nova categoría especificado ou non se atopa.';
$string['defaultrole'] = 'Rol predeterminado';
$string['defaultrole_desc'] = 'O rol que se lle asignará de modo predeterminado se non se especifica ningún outro na táboa externa.';
$string['ignorehiddencourses'] = 'Ignorar cursos agochados';
$string['ignorehiddencourses_desc'] = 'De estar activado, os usuarios non se poderán matricular en cursos que se confirguren para non estaren dispoñíbeis aos estudantes.';
$string['localcategoryfield'] = 'Campo de categoría local';
$string['localcoursefield'] = 'Nome do campo na táboa de cursos que se emprega para emparellar as entradas na base de datos remota (ex., número ID).';
$string['localrolefield'] = 'Nome do campo na táboa de roles que se emprega para emparellar as entradas na base de datos remota (ex., nome curto).';
$string['localuserfield'] = 'Nome do campo na táboa de usuarios que se emprega para emparellar as entradas na base de datos remota (ex., número ID).';
$string['newcoursecategory'] = 'Campo de categoría do novo curso';
$string['newcoursefullname'] = 'Nome completo do campo do novo curso';
$string['newcourseidnumber'] = 'Campo do número de ID do novo curso';
$string['newcourseshortname'] = 'Campo do nome curto do novo curso';
$string['newcoursetable'] = 'Táboa remota dos novos cursos';
$string['newcoursetable_desc'] = 'Especifique o nome da táboa que contén a lista de cursos que se deberían crear automaticamente. De estar baleiro significa que non se crearon cursos.';
$string['pluginname'] = 'Base de datos externa';
$string['pluginname_desc'] = 'Pode usar unha base de datos externa (de case que calquera clase) para controlar a matrícula. Asúmese que a súa base de datos externa contén cando menso un campo que contén un ID de curso e un curso que contén un ID de usuario. Compáranse contra campos que vostede escolla no curso local e nas táboas de usuarios.';
$string['remotecoursefield'] = 'Campo do curso remoto';
$string['remotecoursefield_desc'] = 'O nome do campo na táboa remota que estamos a usar para casar entradas na táboa do curso.';
$string['remoteenroltable'] = 'Táboa de matrícula de usuarios remota';
$string['remoteenroltable_desc'] = 'Especifique o nome da táboa que contén a lista de matrícula de usuarios. De estar baleira, significa que non se sincroniza a matrícula de usuarios.';
$string['remoterolefield'] = 'Campo de rol remoto';
$string['remoterolefield_desc'] = 'O nome do campo na táboa remota que se está a usar para casar entradas na táboa de roles.';
$string['remoteuserfield'] = 'Campo de usuario remoto';
$string['remoteuserfield_desc'] = 'O nome do campo na táboa remota que se está a usar para casar entradas na táboa de usuario.';
$string['settingsheaderdb'] = 'Conexión coa base de datos externa';
$string['settingsheaderlocal'] = 'Mapeo de campo local';
$string['settingsheadernewcourses'] = 'Creación de novos cursos';
$string['settingsheaderremote'] = 'Sincronizar a matrícula remota';
$string['templatecourse'] = 'Modelo de novo curso';
$string['templatecourse_desc'] = 'Opcional: cursos autocreados poden copiar a súa configuración do modelo de curso. Escriba aquí o nome curso do modelo de curso.';
