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
 * Strings for component 'tool_dbtransfer', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Drivers de base de datos disponibles para la migración';
$string['cliheading'] = 'Migración de la base de datos. ¡Asegúrese de que nadie está accediendo al servidor durante la migración!';
$string['climigrationnotice'] = 'Migración de la base de datos en progreso. Por favor, espere hasta que la migración termine y el administrador del servidor actualice la configuración y elimine el archivo $CFG->dataroot/climaintenance.html.';
$string['convertinglogdisplay'] = 'Convirtiendo acciones de mostrar registro';
$string['dbexport'] = 'Exportación de la base de datos';
$string['dbtransfer'] = 'Migración de la base de datos';
$string['enablemaintenance'] = 'Habilitar modo de mantenimiento';
$string['enablemaintenance_help'] = 'Esta opción posibilita el modo de mantenimiento durante y después de la migración de la base de datos. Impide el acceso de todos los usuarios hasta que la migración se completa. Por favor, advierta que el administrador debe eliminar manualmente el archivo $CFG->dataroot/climaintenance.html después de actualizar los ajustes de config.php para retomar la operación normal.';
$string['exportdata'] = 'Exportar datos';
$string['notargetconectexception'] = 'Lo sentimos, no se puede conectar a la base de datos de destino.';
$string['options'] = 'Opciones';
$string['pluginname'] = 'Transferencia de la base de datos';
$string['targetdatabase'] = 'Base de datos de destino';
$string['targetdatabasenotempty'] = '¡La base de datos de destino no puede contener ninguna tabla con el prefijo dado!';
$string['transferdata'] = 'Transferir datos';
$string['transferdbintro'] = 'Este script transferirá todo el contenido de esta base de datos a otro servidor de bases de datos. Con frecuencia se usa para la migración de los datos a un tipo diferente de bases de datos.';
$string['transferdbtoserver'] = 'Transferir esta base de datos Moodle a otro servidor';
$string['transferringdbto'] = 'Transfiriendo esta base de datos {$a->dbtype} base de datos {$a->dbname} en {$a->dbhost}';
