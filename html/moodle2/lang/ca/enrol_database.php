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
 * Strings for component 'enrol_database', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Cancel·la la inscripció dels usuaris suspesos';
$string['dbencoding'] = 'Codificació de la base de dades.';
$string['dbhost'] = 'Servidor de la base de dades';
$string['dbhost_desc'] = 'Escriu la IP del servidor de la base de dades o el nom del servidor';
$string['dbname'] = 'Nom de la base de dades';
$string['dbname_desc'] = 'Deixeu en blanc si esteu utilitzant un nom DSN en el servidor de la base de dades.';
$string['dbpass'] = 'Contrasenya de la base de dades';
$string['dbsetupsql'] = 'Ordre per configurar la base de dades';
$string['dbsetupsql_desc'] = 'Ordre SQL per configurar la base de dades, sovint utilitzada per configurar la codificació de la comunicació - exemple per MySQL i PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Utilitza cometes sybase';
$string['dbsybasequoting_desc'] = 'Les cometes d\'escapament d\'estil Sybase - s\'utilitzen a les bases de dades Oracle, MS SQL i altres bases de dades. No les utilitzeu per MySQL !';
$string['dbtype'] = 'Controlador de base de dades';
$string['dbtype_desc'] = 'Nom del connector de la base de dades ADOdb, escriviu el motor extern de la base de dades.';
$string['dbuser'] = 'Usuari de la base de dades';
$string['debugdb'] = 'Depura ADOdb';
$string['debugdb_desc'] = 'Depura la connexió ADOdb a la base de dades externa - utilitzeu-ho quan obtingueu una pàgina buida durant l\'entrada a Moodle. No utilitzable en servidors en producció!';
$string['defaultcategory'] = 'Categoria a nou curs per defecte';
$string['defaultcategory_desc'] = 'La categoria per defecte per cursos auto creats, s\'utilitza quan no s\'especifiqui l\'identificació de la nova categoria o no es trobi.';
$string['defaultrole'] = 'Rol per defecte';
$string['defaultrole_desc'] = 'El rol que s\'assignarà per defecte si n\'especifica cap rol en la taula externa.';
$string['ignorehiddencourses'] = 'Ignora cursos ocults';
$string['ignorehiddencourses_desc'] = 'Si està habilitat els usuaris sols es podran inscriure en cursos que estiguin disponibles per als estudiants.';
$string['localcategoryfield'] = 'Camp local de la categoria';
$string['localcoursefield'] = 'Camp local del curs';
$string['localrolefield'] = 'Camp local del rol';
$string['localuserfield'] = 'Camp local de l\'usuari';
$string['newcoursecategory'] = 'Camp d\'identificació de la categoria curs nou';
$string['newcoursefullname'] = 'Camp del nom complet del curs nou';
$string['newcourseidnumber'] = 'Camp del nombre d\'identificació del curs nou';
$string['newcourseshortname'] = 'Camp del nom curt del curs nou';
$string['newcoursetable'] = 'Taula remota de cursos nous';
$string['newcoursetable_desc'] = 'Especifica el nom de la taula que conté una llista de cursos que poder crear-se de forma automàtica. Si està buida no s\'ha creat cap curs.';
$string['pluginname'] = 'Base de dades externa';
$string['pluginname_desc'] = 'Podeu utilitzar una base de dades externa (o alguna cosa semblant) per controlar les vostres inscripcions. S\'assumeix que la vostra base de dades externa conté com a mínim el camp identificació del curs, i un camp que conté la identificació dels usuaris. Aquestos es comparen contra els camps que escolliu al curs local i a la taula d\'usuaris.';
$string['remotecoursefield'] = 'Camp remot del curs';
$string['remotecoursefield_desc'] = 'El nom del camp en la taula remota que s\'està utilitzant per concordar entrades a la taula del curs.';
$string['remoteenroltable'] = 'Taula remota d\'inscripció d\'usuaris';
$string['remoteenroltable_desc'] = 'Especifica el nom de la taula que conté la llista d\'usuaris inscrits. Si és buida no s\'ha sincronitzat cap inscripció d\'usuaris.';
$string['remoterolefield'] = 'Camp remot de rol';
$string['remoterolefield_desc'] = 'El nom del camp a la taula remota que s\'està utilitzant per concordar entrades a la taula de rols.';
$string['remoteuserfield'] = 'Camp remot d\'usuari';
$string['remoteuserfield_desc'] = 'El nom del camp a la taula remota que s\'està utilitzant per concordar entrades a la taula d\'usuaris.';
$string['settingsheaderdb'] = 'Connexió amb la base de dades externa';
$string['settingsheaderlocal'] = 'Mapatge de camps locals';
$string['settingsheadernewcourses'] = 'Creació de cursos nous';
$string['settingsheaderremote'] = 'Sincronització d\'inscripcions remotes';
$string['templatecourse'] = 'Plantilla de curs nou';
$string['templatecourse_desc'] = 'Opcional: Els cursos creats automàticament poden copiar els seus paràmetres des d\'una plantilla de curs. Escriviu aquí el nom curt de la plantilla del curs.';
