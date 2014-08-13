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
 * Strings for component 'debug', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'No se ha encontrado el plugin de identificación {$a}.';
$string['blocknotexist'] = 'El bloque {$a} no existe';
$string['cannotbenull'] = '{$a} no puede ser null';
$string['cannotdowngrade'] = 'No se puede pasar {$a->plugin} de {$a->oldversion} a {$a->newversion}.';
$string['cannotfindadmin'] = 'No se ha podido encontrar un administrador.';
$string['cannotinitpage'] = 'No se puede inicializar completamente la página: ID {$a->id} no válido {$a->name}';
$string['cannotsetuptable'] = 'Las tablas {$a} no han podido configurarse con éxito.';
$string['codingerror'] = 'Detectado un error de codificación, debe ser corregido por un programador: {$a}';
$string['configmoodle'] = 'Moodle aún no ha sido configurado. Necesita editar config.php.';
$string['erroroccur'] = 'Ocurrió un error durante este proceso';
$string['invalidarraysize'] = 'Tamaño incorrecto de cadenas en params: {$a}';
$string['invalideventdata'] = 'Enviado eventdata incorrecto: {$a}';
$string['invalidparameter'] = 'Detectado valor de parámetro no válido';
$string['invalidresponse'] = 'Detectado valor de respuesta no válido';
$string['missingconfigversion'] = 'Lo sentimos, config table no contiene versión, no se puede continuar.';
$string['modulenotexist'] = '{$a} module doesn\'t exist';
$string['morethanonerecordinfetch'] = 'Se ha encontrado más de un registro en lectura().';
$string['mustbeoveride'] = 'Abstract {$a} method must be overridden.';
$string['noadminrole'] = 'No se ha encontrado rol de administrador';
$string['noblocks'] = 'No hay bloques instalados.';
$string['nocate'] = 'No hay categorías.';
$string['nomodules'] = 'No se han encontrado módulos.';
$string['nopageclass'] = 'Imported {$a} but found no page classes';
$string['noreports'] = 'No hay informes accesibles';
$string['notables'] = 'No hay tablas.';
$string['phpvaroff'] = 'The PHP server variable \'{$a->name}\' should be Off - {$a->link}';
$string['phpvaron'] = 'The PHP server variable \'{$a->name}\' is not turned On - {$a->link}';
$string['sessionmissing'] = 'El objeto {$a} está ausente de la sesión';
$string['sqlrelyonobsoletetable'] = 'This SQL relies on obsolete table(s): {$a}! Your code must be fixed by a developer.';
$string['withoutversion'] = 'El archivo principal de version.php está ausente, no legible o roto.';
$string['xmlizeunavailable'] = 'Las funciones xmlize no están disponibles';
