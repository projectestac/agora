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
 * Strings for component 'repository', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   repository
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessiblefilepicker'] = 'Selector de archivos accesibles';
$string['activaterep'] = 'Repositorios activos';
$string['activerepository'] = 'Plugins de repositorio disponibles';
$string['activitybackup'] = 'Copia de seguridad de la actividad';
$string['add'] = 'Agregar';
$string['addfile'] = 'Agregar...';
$string['addplugin'] = 'Agregar un plugin de repositorio';
$string['allowexternallinks'] = 'Permitir enlaces externos';
$string['areacategoryintro'] = 'Introducción de la categoría';
$string['areacourseintro'] = 'Introducción del curso';
$string['areamainfile'] = 'Archivo principal';
$string['arearoot'] = 'Sistema';
$string['areauserbackup'] = 'Copia de seguridad del usuario';
$string['areauserdraft'] = 'Borradores';
$string['areauserpersonal'] = 'Archivos privados';
$string['areauserprofile'] = 'Perfil';
$string['attachedfiles'] = 'Archivos adjuntos';
$string['attachment'] = 'Adjunto';
$string['author'] = 'Autor';
$string['automatedbackup'] = 'Copias de seguridad automatizadas';
$string['back'] = '&laquo; Atrás';
$string['backtodraftfiles'] = '&laquo; Volver a gestor de archivos en borrador';
$string['cachecleared'] = 'Los archivos en caché son eliminados';
$string['cacheexpire'] = 'Expiración del caché';
$string['cannotaccessparentwin'] = 'Si la ventana padre está en HTTPS, entonces no está permitido accesar el objeto ventana.abrir por lo que no podemos refrescar el repositorio automáticamente, pero como ya tenemos sus esión, simplemente regrese al manejador de archivos y vuelva a seleccionar el repositorio, lo que ahora deberá de funcionar.';
$string['cannotdelete'] = 'No se puede eliminar este archivo.';
$string['cannotdownload'] = 'No se puede descargar este archivo.';
$string['cannotdownloaddir'] = 'No se puede descargar este directorio.';
$string['cannotinitplugin'] = 'Error en la llamada a plugin_init';
$string['choosealink'] = 'Seleccione un enlace...';
$string['chooselicense'] = 'Seleccionar licencia';
$string['cleancache'] = 'Limpiar mis archivos en caché';
$string['close'] = 'Cerrar';
$string['commonrepositorysettings'] = 'Ajustes comunes del repositorio';
$string['configallowexternallinks'] = 'Esta opción les permite a todos los usuarios elegir si los medios externos se copiarán a Moodle o no. Si está apagada, entonces los medios siempre se copian a Moodle (generalmente es lo mejor para la integridad de datos y seguridad). Si está encendida entonces los usuarios pueden elegir cada vez que añadan medios a un texto.';
$string['configcacheexpire'] = 'Cantidad de tiempo (en segundos) que los listados de archivos están en caché local cuando se navega por repositorios externos.';
$string['configsaved'] = 'Configuración guardada.';
$string['confirmdelete'] = '¿Está seguro de que desea eliminar este repositorio {$a}?

Si selecciona "Continuar y descargar", los archivos refereridos a contenidos externos se descargaran a Moodle, pero este proceso llevará tiempo.';
$string['confirmdeletefile'] = '¿Está seguro de que desea eliminar este archivo?';
$string['confirmdeletefilewithhref'] = '¿Está seguro de que desea eliminar este archivo? Hay {$a} alias/atajos a archivos que usan este archivo como origen. Si continua, estos alias se transformarán en copias reales.';
$string['confirmdeletefolder'] = '¿Está seguro que quiere eliminar esta carpeta? Todoas loas archivos y las subcarpetas se eliminarán?';
$string['confirmremove'] = '¿Está seguro de que desea eliminar esta extensión de repositorio, sus opciones y <strong>todos sus ejemplos</strong> - {$a}?

Si selecciona "Continuar y descargar", los archivos refereridos a contenidos externos se descargaran a Moodle, pero este proceso llevará tiempo.';
$string['confirmrenamefile'] = '¿Está seguro que quiere renombrar/mover este archivo? Hay {$a} alias/atajos a archivos que usan este archivo como origen. Si continua, estos alias se transformarán en copias reales.';
$string['confirmrenamefolder'] = '¿Está seguro que quiere mover/renombrar esta carpeta? Todos los alias/atajo a archivos que hagan referencia a archivos dentro de la carpeta se transformarán en copias reales.';
$string['continueuninstall'] = 'Continuar';
$string['continueuninstallanddownload'] = 'Continuar y descargar';
$string['copying'] = 'Copiando';
$string['coursebackup'] = 'Copias de seguridad del curso';
$string['create'] = 'Crear un ejemplo de repositorio';
$string['createfolderfail'] = 'Error al crear este directorio';
$string['createfoldersuccess'] = 'Directorio creado con éxito';
$string['createinstance'] = 'Crear una instancia de repositorio';
$string['createrepository'] = 'Crear una instancia de repositorio';
$string['createxxinstance'] = 'Crear una instancia del repositorio "{$a}"';
$string['date'] = 'Fecha';
$string['datecreated'] = 'Creado';
$string['deleted'] = 'Repositorio eliminado';
$string['deleterepository'] = 'Eliminar este repositorio';
$string['detailview'] = 'Ver detalles';
$string['dimensions'] = 'Dimensiones';
$string['disabled'] = 'Deshabilitado';
$string['download'] = 'Descargar';
$string['downloadfolder'] = 'Descargar todo';
$string['downloadsucc'] = 'Este archivo se ha descargado con éxito';
$string['draftareanofiles'] = 'No se puede descargar porque no hay archivos adjuntos';
$string['editrepositoryinstance'] = 'Editar instancia de repositorio';
$string['emptylist'] = 'Lista vacía';
$string['emptytype'] = 'No se puede crear el tipo de repositorio: el nombre del tipo está vacío';
$string['enablecourseinstances'] = 'Permitir a los usuarios agregar una instancia de repositorio dentro del curso';
$string['enableuserinstances'] = 'Permitir a los usuarios agregar una instancia de repositorio dentro del contexto del usuario';
$string['enter'] = 'Entrar';
$string['entername'] = 'Por favor, escriba el nombre del directorio';
$string['enternewname'] = 'Por favor, escriba el nombre del nuevo archivo';
$string['error'] = 'Ha ocurrido un error desconocido.';
$string['errornotyourfile'] = 'No puede seleccionar un archivo que no haya sido añadido por usted';
$string['errorpostmaxsize'] = 'El tamaño del archivo a subir excede la directriz max_post_size descrita en php.ini.';
$string['erroruniquename'] = 'El nombre de la instancia del repositorio debe ser único';
$string['existingrepository'] = 'El repositorio ya existe';
$string['federatedsearch'] = 'Búsqueda federada';
$string['fileexists'] = 'Nombre de archivo ya usado. Por favor, use otro nombre';
$string['fileexistsdialog_editor'] = 'Un archivo con ese nombre ha sido anexado al texto que Usted está editando';
$string['fileexistsdialog_filemanager'] = 'Ya ha sido anexado un archivo con ese nombre';
$string['fileexistsdialogheader'] = 'El archivo existe';
$string['filename'] = 'Nombre del archivo';
$string['filenotnull'] = 'Debe seleccionar un archivo para subir';
$string['filepicker'] = 'Selector de archivos';
$string['filesaved'] = 'El archivo ha sido guardado';
$string['filesizenull'] = 'No se puede determinar el tamaño del archivo';
$string['folderexists'] = 'El nombre para la carpeta ya está empleado, por favor use otro nombre';
$string['foldernotfound'] = 'Carpeta no encontrada';
$string['folderrecurse'] = 'La carpeta no puede moverse a su propia subcarpeta';
$string['getfile'] = 'Seleccionar este archivo';
$string['hidden'] = 'Oculto';
$string['iconview'] = 'Ver como iconos';
$string['imagesize'] = '{$a->width} x {$a->height} px';
$string['instance'] = 'Instancia';
$string['instancedeleted'] = 'Instancia eliminada';
$string['instances'] = 'Instancias de repositorios';
$string['instancesforcourses'] = '{$a} Instancia(s) común(es) de todo el curso';
$string['instancesforsite'] = '{$a} Instancia(s) común(es) de todo el curso';
$string['instancesforusers'] = '{$a} Instancia(s) de usuario privado';
$string['invalidfiletype'] = 'El tipo de archivo {$a} no se acepta.';
$string['invalidjson'] = 'Cadena JSON no válida';
$string['invalidparams'] = 'Parámetros no válidos';
$string['invalidplugin'] = 'Plugin {$a} de reposirtorio no válido';
$string['invalidrepositoryid'] = 'ID de repositorio no válido';
$string['isactive'] = '¿Activo?';
$string['keyword'] = 'Clave';
$string['linkexternal'] = 'Enlace externo';
$string['listview'] = 'Ver como lista';
$string['loading'] = 'Cargando...';
$string['login'] = 'Entrar';
$string['logout'] = 'Salir';
$string['makefileinternal'] = 'Hacer una copia del archivo';
$string['makefilelink'] = 'Ligar directamente al archivo';
$string['makefilereference'] = 'Crear un alias/atajo al archivo';
$string['manage'] = 'Gestionar repositorios';
$string['manageurl'] = 'Gestionar';
$string['manageuserrepository'] = 'Gestionar repositorio individual';
$string['moving'] = 'Moviendo';
$string['newfoldername'] = 'Nombre del nuevo directorio:';
$string['noenter'] = 'No se ha escrito nada';
$string['nofilesattached'] = 'No se han adjuntado archivos';
$string['nofilesavailable'] = 'No hay archivos disponibles';
$string['nomorefiles'] = 'No se permiten más adjuntos';
$string['nopathselected'] = 'Aún no se ha seleccionado una ruta de destino (haga doble clic en el nodo del árbol para seleccionar)';
$string['nopermissiontoaccess'] = 'No tiene permiso para acceder a este repositorio';
$string['norepositoriesavailable'] = 'Lo sentimos, ninguno de sus repositorios actuales puede devolver archivos en el formato solicitado.';
$string['norepositoriesexternalavailable'] = 'Lo sentimos, ninguno de sus repositorios actuales puede devolver archivos externos.';
$string['noresult'] = 'No hay resultados de la búsqueda';
$string['notyourinstances'] = 'No puede ver ni editar instancias de repositorio de otro usuario';
$string['off'] = 'Activado pero oculto';
$string['on'] = 'Activado y visible';
$string['openpicker'] = 'Seleccione un archivo...';
$string['operation'] = 'Operación';
$string['original'] = 'Original';
$string['overwrite'] = 'Sobre-escribir';
$string['personalrepositories'] = 'Instancias disponibles de repositorio';
$string['plugin'] = 'Plugins de repositorio';
$string['pluginerror'] = 'Errores en el plugin del repositorio';
$string['pluginname'] = 'Nombre de la extensión de repositorio';
$string['pluginnamehelp'] = 'Si deja esto vacío, se usará el nombre predeterminado';
$string['popup'] = 'Pulse en el botón "Entrar" para identificarse';
$string['popupblockeddownload'] = 'La ventana de descarga está bloqueada. Por favor, permita ventanas emergentes y vuelva a intentarlo.';
$string['preview'] = 'Vista previa';
$string['readonlyinstance'] = 'No puede editar ni eliminar una instancia de sólo lectura';
$string['referencesexist'] = 'Existen {$a} archivos de alias/atajos que emplean este archivo como su orígen';
$string['referenceslist'] = 'Alias/Atajos';
$string['refresh'] = 'Refrescar';
$string['refreshnonjsfilepicker'] = 'Por favor, cierre esta ventana y refresque el selector de archivos no-javascript';
$string['removed'] = 'Repositorio eliminado';
$string['renameto'] = 'Cambiar el nombre a';
$string['repositories'] = 'Repositorios';
$string['repository'] = 'Repositorio';
$string['repositorycourse'] = 'Repositorios del curso';
$string['repositoryerror'] = 'El repositorio remoto produjo un error: {$a}';
$string['save'] = 'Guardar';
$string['saveas'] = 'Guardar como';
$string['saved'] = 'Guardado';
$string['saving'] = 'Guardando';
$string['search'] = 'Buscar';
$string['searching'] = 'Buscar en';
$string['sectionbackup'] = 'Copias de seguridad de la sección';
$string['select'] = 'Seleccionar';
$string['setmainfile'] = 'Configurar el archivo principal';
$string['settings'] = 'Configuración';
$string['setupdefaultplugins'] = 'Configuración de los plugins de repositorio predeterminados';
$string['siteinstances'] = 'Instancias de repositorios del sitio';
$string['size'] = 'Tamaño';
$string['submit'] = 'Enviar';
$string['sync'] = 'Sincronizar';
$string['thumbview'] = 'Ver en forma de iconos';
$string['title'] = 'Seleccione un archivo...';
$string['type'] = 'Tipo';
$string['typenotvisible'] = 'Tipo no visible';
$string['undisclosedreference'] = '(no revelado)';
$string['unknownoriginal'] = 'Desconocido';
$string['unzipped'] = 'Descomprimido con éxito';
$string['upload'] = 'Subir este archivo';
$string['uploading'] = 'Subiendo...';
$string['uploadsucc'] = 'El archivo ha sido subido con éxito';
$string['uselatestfile'] = 'Usar archivo más nuevo';
$string['usenonjsfilemanager'] = 'Abrir gestor de archivos en una nueva ventana';
$string['usenonjsfilepicker'] = 'Abrir el archivo selector en una ventana nueva';
$string['usercontextrepositorydisabled'] = 'Usted no puede editar este repositorio en el contexto del usuario';
$string['wrongcontext'] = 'No puede acceder a este contexto';
$string['xhtmlerror'] = 'Usted probablemente está utilizando encabezado XHTML estricto, algunos componentes YUI no funciona en este modo, por favor deshabilite la opción en moodle';
$string['ziped'] = 'Comprimir carpeta con éxito';
