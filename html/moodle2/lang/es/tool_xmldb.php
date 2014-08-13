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
 * Strings for component 'tool_xmldb', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = 'Real';
$string['aftertable'] = 'Después de la tabla:';
$string['back'] = 'Atrás';
$string['backtomainview'] = 'Volver al principal';
$string['cannotuseidfield'] = 'No se puede insertar el campo "id". Es una columna autonumerada';
$string['change'] = 'Cambiar';
$string['charincorrectlength'] = 'Longitud incorrecta del campo char';
$string['checkbigints'] = 'Comprobar Bigints';
$string['check_bigints'] = 'Buscar enteros DB incorrectos';
$string['checkdefaults'] = 'Comprobar valores por defecto';
$string['check_defaults'] = 'Buscar valores por defecto inconsistentes';
$string['checkforeignkeys'] = 'Comprobar las claves externas';
$string['check_foreign_keys'] = 'Buscar violaciones de la clave externa';
$string['checkindexes'] = 'Comprobar índices';
$string['check_indexes'] = 'Buscar índices BD ausentes';
$string['completelogbelow'] = '(ver abajo el registro completo de la búsqueda)';
$string['confirmcheckbigints'] = 'Esta funcionalidad buscará <a href="http://tracker.moodle.org/browse/MDL-11038">potential wrong integer fields</a> en su servidor Moodle, generando (¡pero no ejecutando!) automáticamente las acciones SQL necesarias para tener todos los enteros de su base de datos adecuadamente definidos.<br /><br />
Una vez generados, puede copiarlas y ejecutarlas con seguridad en su interfaz SQL preferida (no olvide hacer una copia de seguridad de sus datos antes de hacerlo).<br /><br />Se recomienda ejecutar la última (+) versión de Moodle disponible (1.8, 1.9, 2.x ...) antes de llevar a cabo la búsqueda de enteros erróneos.<br /><br />Esta funcionalidad no ejecuta ninguna acción contra la BD (únicamente la lee), de modo que puede ser realizada con seguridad en cualquier momento.';
$string['confirmcheckdefaults'] = 'Esta funcionalidad buscará valores por defecto inconsistentes en su servidor Moodle, y generará (pero no ejecutará) los comandos SQL necesarios para hacer que todos los valores por defecto se definan apropiadamente.<br /><br />Una vez generados, puede copiar tales comandos y ejecutarlos con seguridad en su interfaz SQL favorita (no olvide hacer una copia de sus datos antes).<br /><br />Es muy recomendable ejecutar la última versión (+version) disponible de Moodle (1.8, 1.9, 2x...) antes de ejecutar la búsqueda de valores por defecto inconsistentes.<br /><br />
Esta funcionalidad no ejecuta ninguna acción contra la base de datos (simplemente la lee), de modo que puede ejecutarse con seguridad en cualquier momento.';
$string['confirmcheckforeignkeys'] = 'Esta funcionalidad buscará posibles violaciones de las claves externas  defindas en install.xml. (Moodle no generan actualmente restricciones de clave externa en la base de datos, por lo que datos no válidos pueden estar presentes.) <br /> <br /> Es muy recomendable que se ejecuta la última (+ versión) disponible en su versión de Moodle ( 1.8, 1.9, 2.x ...) antes de ejecutar la búsqueda de índices perdidos. <br /> <br /> Esta funcionalidad no realiza ninguna acción contra la Base de Datos (sólo lee de ella), por lo que se puede ejecutar de forma segura en cualquier momento.';
$string['confirmcheckindexes'] = 'Esta funcionalidad buscará potenciales índices ausentes en su servidor Moodle, generando (no ejecutando) automáticamente los comandos SQL necesarios para mantener todo actualizado. Una vez generados, puede copiar los comandos y ejecutarlos con seguridad con su interfaz SQL favorita.<br /><br />
Es muy recomendable ejecutar la última versión disponible de Moodle (1.8, 1.9, 2.x ...) antes de llevar a cabo la búsqueda de los índices ausentes.<br /><br />
Esta funcionalidad no ejecuta ninguna acción contra la BD (simplemente lee en ella), de modo que puede ejecutarse con seguridad en cualquier momento.';
$string['confirmdeletefield'] = '¿Está totalmente seguro que quiere eliminar el campo:';
$string['confirmdeleteindex'] = '¿Está totalmente seguro que quiere eliminar el índice:';
$string['confirmdeletekey'] = '¿Está totalmente seguro que quiere eliminar la clave:';
$string['confirmdeletetable'] = '¿Está totalmente seguro que quiere eliminar la tabla:';
$string['confirmdeletexmlfile'] = '¿Está totalmente seguro que quiere eliminar el archivo:';
$string['confirmrevertchanges'] = '¿Está totalmente seguro que quiere revertir los cambios realizados sobre:';
$string['create'] = 'Crear';
$string['createtable'] = 'Crear tabla:';
$string['defaultincorrect'] = 'Valor por defecto incorrecto';
$string['delete'] = 'Eliminar';
$string['delete_field'] = 'Eliminar campo';
$string['delete_index'] = 'Eliminar índice';
$string['delete_key'] = 'Eliminar clave';
$string['delete_table'] = 'Eliminar tabla';
$string['delete_xml_file'] = 'Eliminar archivo XML';
$string['doc'] = 'Doc';
$string['docindex'] = 'Índice de la documentación:';
$string['documentationintro'] = 'Esta documentación es generada automáticamente a partir de la definición de la base de datos DMLDB. Únicamente está disponible en inglés.';
$string['down'] = 'Abajo';
$string['duplicate'] = 'Duplicar';
$string['duplicatefieldname'] = 'Ya existe otro campo con ese nombre';
$string['duplicatekeyname'] = 'Ya existe otra clave con ese nombre';
$string['edit'] = 'Edición';
$string['edit_field'] = 'Editar campo';
$string['edit_field_save'] = 'Guardar campo';
$string['edit_index'] = 'Editar índice';
$string['edit_index_save'] = 'Guardar índice';
$string['edit_key'] = 'Editar clave';
$string['edit_key_save'] = 'Guardar clave';
$string['edit_table'] = 'Editar tabla';
$string['edit_table_save'] = 'Guardar tabla';
$string['edit_xml_file'] = 'Editar archivo XML';
$string['enumvaluesincorrect'] = 'Valores incorrectos del campo enum';
$string['expected'] = 'Esperado';
$string['extensionrequired'] = 'Lo sentimos - la extensión PHP \'{$a}\' es necesaria para esta acción. Por favor, instale la extensión si desea utilizar esta función.';
$string['field'] = 'Campo';
$string['fieldnameempty'] = 'Nombre del campo vacío';
$string['fields'] = 'Campos';
$string['fieldsnotintable'] = 'El campo no existe en la tabla';
$string['fieldsusedinkey'] = 'Este campo se usa como clave.';
$string['filenotwriteable'] = 'Archivo no escribible';
$string['fkviolationdetails'] = 'La clave externa {$a->keyname} en la tabla {$a->tablename} es violada por {$a->numviolations} de un total de {$a->numrows} filas.';
$string['float2numbernote'] = 'Aviso: A pesar de que los campos "float" tienen apoyo 100% de XMLDB, se recomienda migrar a "número" de campos en su lugar.';
$string['floatincorrectdecimals'] = 'Número incorrecto de decimales del campo float';
$string['floatincorrectlength'] = 'Longitud incorrecta del campo float';
$string['generate_all_documentation'] = 'Toda la documentación';
$string['generate_documentation'] = 'Documentación';
$string['gotolastused'] = 'Ir al último archivo usado';
$string['incorrectfieldname'] = 'Nombre incorrecto';
$string['index'] = 'Índice';
$string['indexes'] = 'Índices';
$string['integerincorrectlength'] = 'Longitud incorrecta del campo integer';
$string['key'] = 'Clave';
$string['keys'] = 'Claves';
$string['listreservedwords'] = 'Lista de palabra reservadas<br/>(usada para mantener <a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a> actualizado)';
$string['load'] = 'Cargar';
$string['main_view'] = 'Vista principal';
$string['masterprimaryuniqueordernomatch'] = 'Los campos de la clave externa deben aparecer en el mismo orden en que se enumeran en la CLAVE ÚNICA de la tabla de referencia.';
$string['missing'] = 'Ausente';
$string['missingindexes'] = 'Se han encontrado índices ausentes';
$string['mustselectonefield'] = 'Debe seleccionar un campo para ver las acciones relacionadas con el campo.';
$string['mustselectoneindex'] = 'Debe seleccionar un índice para ver las acciones relacionadas con el índice.';
$string['mustselectonekey'] = 'Debe seleccionar una clave para ver las acciones relacionadas con la clave.';
$string['newfield'] = 'Nuevo campo';
$string['newindex'] = 'Nuevo índice';
$string['newkey'] = 'Nueva clave';
$string['newtable'] = 'Nueva tabla';
$string['newtablefrommysql'] = 'Nueva tabla desde MySQL';
$string['new_table_from_mysql'] = 'Nueva tabla desde MySQL';
$string['nomasterprimaryuniquefound'] = 'La(s) columna(s) de sus referencias de clave externa deben ser incluidas en una clave principal o única en la tabla de referencia. Tenga en cuenta que la columna que está en un índice único no es suficientemente buena.';
$string['nomissingindexesfound'] = 'No se han encontrado índices ausentes: su BD no requiere acciones adicionales.';
$string['noviolatedforeignkeysfound'] = 'No se han encontrado claves externas violadas';
$string['nowrongdefaultsfound'] = 'No se han encontrado valores por defecto inconsistentes. Su base de datos no necesita acciones adicionales.';
$string['nowrongintsfound'] = 'No se han encontrado enteros erróneos: su BD no necesita más acciones.';
$string['numberincorrectdecimals'] = 'Número incorrecto de decimales en el campo numérico';
$string['numberincorrectlength'] = 'Longitud incorrecta del campo numérico';
$string['pendingchanges'] = 'Nota: Ha realizado cambios en este archivo. Se pueden guardar en cualquier momento.';
$string['pendingchangescannotbesaved'] = 'Hay cambios en este archivo pero no se puede guardar. Compruebe que el directorio y el "install.xml" que hay dentro tienen permisos de escritura para el servidor web.';
$string['pendingchangescannotbesavedreload'] = 'Hay cambios en este archivo pero no se pueden guardar. Compruebe que el directorio y el archivo "install.xml" que hay en su interior tienen permisos de escritura para el servidor web. A continuación, vuelva a cargar esta página y ya podrá guardar los cambios.';
$string['pluginname'] = 'Editor XMLDB';
$string['reserved'] = 'Reservado';
$string['reservedwords'] = 'Palabras reservadas';
$string['revert'] = 'Revertir';
$string['revert_changes'] = 'Revertir cambios';
$string['save'] = 'Guardar';
$string['searchresults'] = 'Buscar resultados';
$string['selectaction'] = 'Seleccionar acción:';
$string['selectdb'] = 'Seleccionar base de datos:';
$string['selectfieldkeyindex'] = 'Seleccionar Campo/Clave/Índice:';
$string['selectonecommand'] = 'Por favor, seleccione una acción de la lista para ver el código PHP';
$string['selectonefieldkeyindex'] = 'Por favor, seleccione un Campo/Clave/Índice de la lista para ver el código PHP';
$string['selecttable'] = 'Seleccionar tabla:';
$string['table'] = 'Tabla';
$string['tables'] = 'Tablas';
$string['unload'] = 'Descargar';
$string['up'] = 'Arriba';
$string['view'] = 'Ver';
$string['viewedited'] = 'Ver editados';
$string['vieworiginal'] = 'Ver original';
$string['viewphpcode'] = 'Ver código PHP';
$string['view_reserved_words'] = 'Ver palabras reservadas';
$string['viewsqlcode'] = 'Ver código SQL';
$string['view_structure_php'] = 'Mostrar estructura PHP';
$string['view_structure_sql'] = 'Mostrar estructura SQL';
$string['view_table_php'] = 'Ver tabla PHP';
$string['view_table_sql'] = 'Ver tabla SQL';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = 'Claves externas violadas';
$string['violatedforeignkeysfound'] = 'Se han encontrado claves externas violadas';
$string['violations'] = 'Violaciones';
$string['wrong'] = 'Erróneo';
$string['wrongdefaults'] = 'Se encontraron valores por defecto erróneos';
$string['wrongints'] = 'Se han encontrado enteros erróneos';
$string['wronglengthforenum'] = 'Longitud incorrecta del campo enum';
$string['wrongreservedwords'] = 'Palabras reservadas en uso<br />(note que los nombres de la tabla no son importantes si se usa $CFG->prefix)';
$string['yesmissingindexesfound'] = 'En su BD se han encontrado algunos índices ausentes. Aquí puede ver los detalles, así como los comandos SQL a ejecutar con su interfaz SQL favorita para crearlos.<br /><br /> Una vez que lo haya hecho, es muy recomendable que ejecute de nuevo esta utilidad para comprobar que no se encuentran más índices ausentes.';
$string['yeswrongdefaultsfound'] = 'En su base de datos se han encontrado algunos valores por defecto inconsistentes. Aquí se presentan los detalles y las acciones SQL que deben ejecutarse en su interfaz SQL favorita para crearlos (no olvide hacer una copia de seguridad de sus datos).<br /><br />Una vez realizado, se recomienda ejecutar de nuevo esta utilidad para comprobar que no se encuentran más valores por defecto inconsistentes.';
$string['yeswrongintsfound'] = 'Se han encontrado algunos enteros erróneos en su BD. Aquí se presentan los detalles y las acciones SQL que deben ejecutarse en su interfaz SQL favorita para crearlos (no olvide hacer una copia de seguridad de sus datos).<br /><br />Una vez realizado, se recomienda ejecutar de nuevo esta utilidad para comprobar que no se encuentran más enteros erróneos.';
