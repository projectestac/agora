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
 * Strings for component 'tool_uploaduser', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Permitir eliminar';
$string['allowrenames'] = 'Permitir renombrar';
$string['allowsuspends'] = 'Permitir suspensión y activación de cuentas';
$string['csvdelimiter'] = 'Delimitador CSV';
$string['defaultvalues'] = 'Valores por defecto';
$string['deleteerrors'] = 'Eliminar errores';
$string['encoding'] = 'Codificación';
$string['errors'] = 'Errores';
$string['nochanges'] = 'Sin cambios';
$string['pluginname'] = 'Subida de usuario';
$string['renameerrors'] = 'Errores de renombrado';
$string['requiredtemplate'] = 'Exigido. Puede utilizar sintaxis de plantilla aquí (%l = lastname, %f = firstname, %u = username). Consulte la ayuda para ver detalles y ejemplos.';
$string['rowpreviewnum'] = 'Previsualizar filas';
$string['uploadpicture_baduserfield'] = 'El atributo de usuario especificado no es válido. Por favor, inténtelo de nuevo.';
$string['uploadpicture_cannotmovezip'] = 'No se puede mover el archivo zip a un directorio temporal.';
$string['uploadpicture_cannotprocessdir'] = 'No se pueden procesar ficheros descomprimidos.';
$string['uploadpicture_cannotsave'] = 'No se puede guardar la imagen del usuario {$a}. Compruebe el archivo de imagen original.';
$string['uploadpicture_cannotunzip'] = 'No se puede descomprimir el archivo de imágenes.';
$string['uploadpicture_invalidfilename'] = 'El nombre del archivo de imagen {$a} tiene caracteres no válidos. Se ha omitido.';
$string['uploadpicture_overwrite'] = '¿Sobreescribir las imágenes del usuario?';
$string['uploadpictures'] = 'Subir imágenes de los usuarios';
$string['uploadpictures_help'] = 'Las imágenes de los usuarios se pueden cargar masivamente mediante un archivo zip. Estos archivos debe ser nombrados en atención al "atributo del usuario" elegido (username, idnumber, id) por ejemplo user1234.jpg para un usuario con nombre de usuario (username) user1234.
Tenga en cuenta que el tamaño del archivo zip no puede superar el límite establecido en la configuración "políticas de sitio" de su sitio Moodle. En cualquier caso, siempre podrá preparar varios paquetes de imágenes comprimidas y subirlas por partes.';
$string['uploadpicture_userfield'] = 'Atributo del usuario a utilizar para emparejar imágenes:';
$string['uploadpicture_usernotfound'] = 'El usuario con \'{$a->userfield}\' valor de \'{$a->uservalue}\' no existe. Se pasa por alto.';
$string['uploadpicture_userskipped'] = 'Se ha pasado por alto el usuario {$a} (ya tiene imagen)';
$string['uploadpicture_userupdated'] = 'Imagen actualizada para el usuario {$a}.';
$string['uploadusers'] = 'Subir usuarios';
$string['uploadusers_help'] = 'Los usuarios pueden subirse (y, opcionalmente, matricularse en cursos) por medio de un archivo de texto. El formato debe ser el siguiente:

* Cada línea contiene solo un registro.
* Cada registro es una serie de datos separados por comas (o por cualquier otro delimitador)
* El primer registro contiene una lista de nombres de campo que definen el formato del resto del archivo
* Los nombres de campo necesarios son username, password, firstname, lastname, email';
$string['uploaduserspreview'] = 'Previsualizar subida de usuarios';
$string['uploadusersresult'] = 'Resultados de subida de usuarios';
$string['useraccountupdated'] = 'Usuario actualizado';
$string['useraccountuptodate'] = 'Usuario hasta hoy';
$string['userdeleted'] = 'Usuario eliminado';
$string['userrenamed'] = 'Usuario renombrado';
$string['userscreated'] = 'Usuarios creados';
$string['usersdeleted'] = 'Usuarios eliminados';
$string['usersrenamed'] = 'Usuarios renombrados';
$string['usersskipped'] = 'Usuarios pasados por alto';
$string['usersupdated'] = 'Usuarios actualizados';
$string['usersweakpassword'] = 'Usuarios con contraseña débil';
$string['uubulk'] = 'Seleccionar para operaciones masivas';
$string['uubulkall'] = 'Todos los usuarios';
$string['uubulknew'] = 'Nuevos usuarios';
$string['uubulkupdated'] = 'Usuarios actualizados';
$string['uucsvline'] = 'Línea CSV';
$string['uulegacy1role'] = '(Estudiante original) tipo N=1';
$string['uulegacy2role'] = '(Profesor original) tipo N=2';
$string['uulegacy3role'] = '(Profesor no editor original) tipo N=3';
$string['uunoemailduplicates'] = 'Prevenir duplicados de dirección email';
$string['uuoptype'] = 'Tipo de subida';
$string['uuoptype_addinc'] = 'Agregar todo, añadir contador a nombres de usuarios si fuera necesario.';
$string['uuoptype_addnew'] = 'Agregar sólo nuevos, pasar por alto usuarios existentes';
$string['uuoptype_addupdate'] = 'Agregar nuevos y actualizar usuarios existentes';
$string['uuoptype_update'] = 'Actualizar sólo usuarios existentes';
$string['uupasswordcron'] = 'Generado en cron';
$string['uupasswordnew'] = 'Contraseña de nuevo usuario';
$string['uupasswordold'] = 'Contraseña de usuario existente';
$string['uustandardusernames'] = 'Estandarizar nombres de usuario';
$string['uuupdateall'] = 'Pasar por alto con archivo y valores por defecto';
$string['uuupdatefromfile'] = 'Pasar por alto con archivo';
$string['uuupdatemissing'] = 'Rellenar datos ausentes del fichero y valores por defecto';
$string['uuupdatetype'] = 'Detalles de usuario existente';
$string['uuusernametemplate'] = 'Plantilla de nombre de usuario';
