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
 * Strings for component 'tool_unittest', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_unittest
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addconfigprefix'] = 'Agregar prefijo al archivo config';
$string['all'] = 'TODAS';
$string['codecoverageanalysis'] = 'Realizar un análisis de cobertura de código.';
$string['codecoveragecompletereport'] = '(ver informe completo de cobertura de código)';
$string['codecoveragedisabled'] = 'No se puede habilitar la cobertura de código en este servidor (falta la extensión Xdebug).';
$string['codecoveragelatestdetails'] = 'En fecha {$a->date}, con los ficheros {$a->files}, {$a->percentage} cubierto';
$string['codecoveragelatestreport'] = 'ver el último informe completo de cobertura de código';
$string['confignonwritable'] = 'El archivo config.php no puede ser escrito por el servidor web. Puede cambiar los permisos, o editar el archivo con la cuenta de usuario apropiada, y añadir la siguiente línea antes de la etiqueta de cierre php: <br /> $CFG->unittestprefix = \'tst_\' // Cambie tst_ a un prefijo de su elección, que sea diferente de  $CFG->prefix';
$string['coveredlines'] = 'Líneas cubiertas';
$string['coveredpercentage'] = 'Cobertura de código global';
$string['dbtest'] = 'Pruebas funcionales de BD';
$string['deletingnoninsertedrecord'] = 'Intentanto eliminar un registro que no fue introducido por estas pruebas unitarias (id {$a->id} en la tabla {$a->table}).';
$string['deletingnoninsertedrecords'] = 'Tratando de borrar registros que no fueron insertados por estas pruebas de unidad (de tabla {$a->table}).';
$string['droptesttables'] = 'Pasar por alto tablas de prueba';
$string['exception'] = 'Excepción';
$string['executablelines'] = 'Líneas ejecutables';
$string['fail'] = 'Fallo';
$string['ignorefile'] = 'Pasar por alto los tests de este archivo';
$string['ignorethisfile'] = 'Volver a ejecutar los tests pasando por alto este archivo.';
$string['installtesttables'] = 'Instalar tablas de test';
$string['moodleunittests'] = 'Tests unitarios de Moodle: {$a}';
$string['notice'] = 'Aviso';
$string['onlytest'] = 'Ejecutar tests sólo en';
$string['othertestpages'] = 'Otras páginas de prueba';
$string['pass'] = 'Contraseña';
$string['pathdoesnotexist'] = 'La ruta \'{$a}\' no existe.';
$string['pluginname'] = 'Pruebas de la unidad';
$string['prefix'] = 'Prefijo de tablas de prueba unitaria';
$string['prefixnotset'] = 'La tabla de prefijos de pruebas unitarias de la base de datos no está configurada. Complete y envíe este formulario para añadirlo a config.php';
$string['reinstalltesttables'] = 'Volver a instalar tablas de prueba';
$string['retest'] = 'Volver a ejecutar los tests';
$string['retestonlythisfile'] = 'Volver a ejecutar sólo este archivo de test.';
$string['runall'] = 'Ejecutar los tests de todos los archivos.';
$string['runat'] = 'Ejecutar en {$a}.';
$string['runonlyfile'] = 'Ejecutar sólo los tests de este archivo';
$string['runonlyfolder'] = 'Ejecutar sólo los tests de esta carpeta';
$string['runtests'] = 'Ejecutar tests';
$string['rununittests'] = 'Ejecutar los tests unitarios';
$string['showpasses'] = 'Mostrar correctos y fallos.';
$string['showsearch'] = 'Mostrar búsqueda de archivos de test.';
$string['skip'] = 'Saltar';
$string['stacktrace'] = 'Rastrear pila:';
$string['summary'] = '{$a->run}/{$a->total} casos de test completados: <strong>{$a->passes}</strong> correctos, <strong>{$a->fails}</strong> fallos y <strong>{$a->exceptions}</strong> excepciones.';
$string['tablesnotsetup'] = 'Las tablas de pruebas unitarias aún no están construidas. ¿Desea construirlas?.';
$string['testdboperations'] = 'Operaciones de basedatos de prueba';
$string['testtablescsvfileunwritable'] = 'Las tablas de prueba del fichero CVS no se puede escribir {$a->filename})';
$string['testtablesneedupgrade'] = 'Las tablas de prueba de la BasedeDatos necesitan ser actualizadas. ¿Desea proceder con la actualización ahora?';
$string['testtablesok'] = 'Las tablas de prueba de la BasedeDatos fueron instaladas exitosamente.';
$string['thorough'] = 'Ejecutar un test minucioso (puede ser lento).';
$string['timetakes'] = 'Tiempo empleado: {$a}.';
$string['totallines'] = 'Líneas totales';
$string['uncaughtexception'] = 'Excepción no detectada [{$a->getMessage()}] in [{$a->getFile()}:{$a->getLine()}] TESTS ABORTADOS.';
$string['uncoveredlines'] = 'Líneas no cubiertas';
$string['unittest:execute'] = 'Ejecutar pruebas de la unidad';
$string['unittestprefixsetting'] = 'Prefijo de prueba de unidad: <strong>{$a->unittestprefix}</strong> (Editar config.php para modificar esto).';
$string['unittests'] = 'Tests unitarios';
$string['updatingnoninsertedrecord'] = 'Intentando actualizar un registro que no se insertó por estas pruebas unitarias (id {$a->id} en la tabla {$a->table}).';
$string['version'] = 'Usando <a href="http://sourceforge.net/projects/simpletest/">SimpleTest</a> versión {$a}.';
