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
 * Strings for component 'dbtransfer', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Comprobando la estructura de la base de datos de procedencia';
$string['copyingtable'] = 'Copying table {$a}';
$string['copyingtables'] = 'Copiando los contenidos de las tablas';
$string['creatingtargettables'] = 'Creando las tablas en la base de datos de destino';
$string['dbexport'] = 'Exportar base de datos';
$string['dbtransfer'] = 'Transferir base de datos';
$string['differenttableexception'] = 'La estructura de la tabla {$a} no coincide';
$string['done'] = 'Hecho';
$string['exportschemaexception'] = 'La estructura de la base de datos actual no coincide con todos los archivos install.xml. <br /> {$a}';
$string['importschemaexception'] = 'La estructura de la base de datos actual no coincide con todos los archivos install.xml. <br /> {$a}';
$string['importversionmismatchexception'] = 'La versión actual {$a->currentver} no coincide con la versión exportada {$a->schemaver}.';
$string['malformedxmlexception'] = 'Se ha encontrado XML corrupto, no se puede continuar.';
$string['unknowntableexception'] = 'Se ha encontrado una tabla desconocida {$a} en el archivo de exportación.';
