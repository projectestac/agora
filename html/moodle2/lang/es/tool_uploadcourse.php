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
 * Strings for component 'tool_uploadcourse', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permitir eliminar';
$string['allowrenames'] = 'Permitir renombrar';
$string['allowresets'] = 'Permitir reiniciar';
$string['cannotdeletecoursenotexist'] = 'No se puede eliminar un curso que no existe';
$string['cannotgenerateshortnameupdatemode'] = 'No se puede generar un nombre corto si se permiten las actualizaciones';
$string['cannotreadbackupfile'] = 'No se puede leer el archivo de copia de seguridad';
$string['cannotrenamecoursenotexist'] = 'No se puede renombrar un curso que no existe';
$string['cannotrenameidnumberconflict'] = 'No se puede renombrar el curso, hay conflicto con el número ID de un curso que ya existe';
$string['cannotrenameshortnamealreadyinuse'] = 'No se puede renombrar el curso, el nombre corto se está utilizando';
$string['cannotupdatefrontpage'] = 'Está prohibido modificar la página principal';
$string['canonlyrenameinupdatemode'] = 'Sólo puede renombrar un curso cuando la actualización está permitida';
$string['canonlyresetcourseinupdatemode'] = 'Sólo se puede reiniciar un curso en modo de actualización';
$string['couldnotresolvecatgorybyid'] = 'No se ha podido resolver la categoría por su ID';
$string['couldnotresolvecatgorybyidnumber'] = 'No se ha podido resolver la categoría por su número ID';
$string['couldnotresolvecatgorybypath'] = 'No se ha podido resolver la categoría por su path';
$string['coursecreated'] = 'Curso creado';
$string['coursedeleted'] = 'Curso eliminado';
$string['coursedeletionnotallowed'] = 'No está permitido eliminar curso';
$string['coursedoesnotexistandcreatenotallowed'] = 'El curso no existe y no está permitido crear cursos';
$string['courseexistsanduploadnotallowed'] = 'El curso existe y no está permitida la actualziación';
$string['coursefile'] = 'Archivo';
$string['coursefile_help'] = 'Debe ser un archivo CSV';
$string['courseidnumberincremented'] = 'Número ID del curso incrementado {$a->from} -> {$a->to}';
$string['courseprocess'] = 'Proceso del curso';
$string['courserenamed'] = 'Curso renombrado';
$string['courserenamingnotallowed'] = 'No está permitido renombrar cursos';
$string['coursereset'] = 'Curso reiniciado';
$string['courseresetnotallowed'] = 'No está permitido reiniciar curso';
$string['courserestored'] = 'Cursos restaurado';
$string['coursescreated'] = 'Cursos creados: {$a}';
$string['coursesdeleted'] = 'Cursos elimiados: {$a}';
$string['courseserrors'] = 'Cursos con errores: {$a}';
$string['courseshortnamegenerated'] = 'Nombre corto de cursos generado: {$a}';
$string['courseshortnameincremented'] = 'Nombre corto de cros incrementado: {$a->from} -> {$a->to}';
$string['coursestotal'] = 'Total de cursos: {$a}';
$string['coursesupdated'] = 'Cursos actualizados: {$a}';
$string['coursetemplatename'] = 'Restaurar de este curso después de subirlo';
$string['coursetemplatename_help'] = 'Introduzca un nombre corto del curso existente para usar como plantilla para la creación de todos los cursos.';
$string['coursetorestorefromdoesnotexist'] = 'El curso a restaurar no existe';
$string['courseupdated'] = 'Curso actualizado';
$string['createall'] = 'Crear todos, incrementar nombre corto si es necesario';
$string['createnew'] = 'Crear solo cursos nuevos, saltar los existentes';
$string['createorupdate'] = 'Crear cursos nuevos, o actualizar los existentes';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['csvdelimiter_help'] = 'Delimitador del archivo CSV';
$string['csvfileerror'] = 'Hay algo erróneo en el formato del archivo CSV. Por favor, compruebe la coincidencia entre el número de cabeceras y columnas  y que el delimitador y la codificación del archivo sean correctos: {$a}';
$string['csvline'] = 'Línea';
$string['defaultvalues'] = 'Valores por defecto del curso';
$string['encoding'] = 'Codificación';
$string['encoding_help'] = 'Codificación del archivo CSV';
$string['errorwhiledeletingcourse'] = 'Error al eliminar el curso';
$string['errorwhilerestoringcourse'] = 'Error al restaurar el curso';
$string['generatedshortnamealreadyinuse'] = 'El nombre corto generado ya está en uso';
$string['generatedshortnameinvalid'] = 'El nombre corto generado no es válida';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'Número ID ya utilizado en otro curso';
$string['importoptions'] = 'Opciones de importación';
$string['invalidbackupfile'] = 'Archivo de copia de seguridad no válido';
$string['invalidcourseformat'] = 'Formato de curso no válido';
$string['invalidcsvfile'] = 'Archivo de entrada CSV no válido';
$string['invalidencoding'] = 'Codificación no válida';
$string['invalideupdatemode'] = 'Modo de actualización seleccionado no válido';
$string['invalidmode'] = 'Modo seleccionado no válido';
$string['invalidroles'] = 'Nombres de rol no válidos: {$a}';
$string['invalidshortname'] = 'Nombre corto no válido';
$string['missingmandatoryfields'] = 'Falta valor para los campos obligatorios: {$a}';
$string['missingshortnamenotemplate'] = 'Falta nombre corto y la plantilla de nombre corto no se ha determinado';
$string['mode'] = 'Modo subida';
$string['nochanges'] = 'Sin cambios';
$string['pluginname'] = 'Subir curso';
$string['preview'] = 'Vista previa';
$string['reset'] = 'Reiniciar curso tras la subida';
$string['restoreafterimport'] = 'Restaurar tras la importación';
$string['result'] = 'resultado';
$string['rowpreviewnum'] = 'Columnas de la vista previa';
$string['rowpreviewnum_help'] = 'Número de filas del archivo CSV que se previsualizarán en la siguiente página. Esta opción tiene como objetivo limitar el tamaño de la próxima página.';
$string['shortnametemplate'] = 'Plantilla para generar un nombre corto';
$string['shortnametemplate_help'] = 'El nombre corto del curso se muestra en la barra de navegación. Usted puede utilizar la sintaxis de plantillas (%f = fullname, %i = idnumber) o introducir un valor inicial que se irá incrementando.';
$string['templatefile'] = 'Restaurar a partir de este archivo después de la carga';
$string['templatefile_help'] = 'Seleccionar un archivo para su uso como plantilla para la creación de todos los cursos.';
$string['unknownimportmode'] = 'Modo de importación desconocido';
$string['updatemissing'] = 'Rellene los elementos que faltan en los datos CSV y valores predeterminados';
$string['updatemode'] = 'Modo de actualización';
$string['updatemodedoessettonothing'] = 'El modo de actualización no permite que nada se actualice';
$string['updateonly'] = 'Sólo actualizar cursos existentes';
$string['updatewithdataonly'] = 'Actualizar solo los datos CSV';
$string['updatewithdataordefaults'] = 'Actualizar los datos CSV y los valores predeterminados';
$string['uploadcourses'] = 'Subir cursos';
$string['uploadcourses_help'] = 'Los cursos pueden ser cargados a través de archivos de texto. El formato del archivo debe ser el siguiente:

* Cada línea del archivo contiene un registro
* Cada registro es una serie de datos separados por comas (u otros delimitadores)
* El primer registro contiene una lista de nombres de campo que define el formato del resto del archivo
* los campos requeridos son nombre corto, nombre completo, el resumen y la categoría';
$string['uploadcoursespreview'] = 'Previsualización de los cursos cargados';
$string['uploadcoursesresult'] = 'Resultados de la carga de cursos';
