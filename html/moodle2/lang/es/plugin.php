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
 * Strings for component 'plugin', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['availability'] = 'Disponibilidad';
$string['checkforupdates'] = 'Compruebe actualizaciones disponibles';
$string['checkforupdateslast'] = 'Última comprobación realizada el {$a}';
$string['detectedmisplacedplugin'] = 'La extensión "{$a->component}" está instalado en la ubicación incorrecta "{$a->current}"; la ubicación prevista es "{$a->expected}"';
$string['displayname'] = 'Nombre de la extensión';
$string['err_response_curl'] = 'No pudo obtener actualizaciones disponibles - error cURL inesperado.';
$string['err_response_format_version'] = 'Formato de respuesta con versión inesperada. Por favor, trate de revisar nuevamente las actualizaciones disponibles.';
$string['err_response_http_code'] = 'No pudo obtener actualizaciones disponibles - código de respuesta HTTP inesperado.';
$string['filterall'] = 'Mostrar todo';
$string['filtercontribonly'] = 'Mostrar sólo los módulos externos';
$string['filtercontribonlyactive'] = 'Mostrando sólo los módulos externos';
$string['filterupdatesonly'] = 'Mostrar sólo las actualizables';
$string['filterupdatesonlyactive'] = 'Mostrando únicamente actualizables';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'No hay extensiones que requieran su atención en este momento';
$string['nonehighlightedinfo'] = 'Mostrar la lista de todas las extensiones (plugins) instalados en el sitio';
$string['noneinstalled'] = 'No se han instalado extensiones (plugins) de este tipo';
$string['notdownloadable'] = 'No puede descargarse el paquete';
$string['notdownloadable_help'] = 'El paquete ZIP con la actualización no se puede descargar de forma automática. Por favor, consulte la página de documentación para obtener más ayuda.';
$string['notes'] = 'Notas';
$string['notwritable'] = 'Los archivos de plugins (extensiones) no son escribibles';
$string['notwritable_help'] = 'Usted ha habilitado que se implementen actualizaciones automáticas y hay una actualización disponible para este plugin (extensión). Sin embargo, los archivos del plugin no son escribibles por el servidor web, por lo que no se pudo instalar la actualización por el momento.

Haga que la carpeta del plugin y todos sus contenidos sean escribibles para poder instalar automáticamente la actualización disponible.';
$string['numdisabled'] = 'Deshabilitado: {$a}';
$string['numextension'] = 'Módulos externos: {$a}';
$string['numtotal'] = 'Instalado: {$a}';
$string['numupdatable'] = 'Actualizaciones disponibles: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'Esta página muestra las extensiones (plugins) que pueden requerir su atención durante la actualización. Los elementos resaltados incluyen nuevas extensiones (plugins) que están a punto de ser instalados, los que van a ser actualizados y las extensiones  anteriores que ahora faltan. Los módulos externos (add-ons) también se destacan. Se recomienda que compruebe si hay versiones más recientes de los módulos externos disponibles y actualice  su código fuente antes de continuar con esta actualización de Moodle.';
$string['plugindisable'] = 'Deshabilitar';
$string['plugindisabled'] = 'Deshabilitado';
$string['pluginenable'] = 'Habilitar';
$string['pluginenabled'] = 'Habilitado';
$string['requiredby'] = 'Requerido por: {$a}';
$string['requires'] = 'Requiere';
$string['rootdir'] = 'Directorio';
$string['settings'] = 'Configuración';
$string['showall'] = 'Recargar y mostrar todas las extensiones (plugins)';
$string['somehighlighted'] = 'Número de extensiones (plugins) que requieren atención durante esta actualización: {$a}';
$string['somehighlightedinfo'] = 'Mostrar la lista completa de extensiones (plugins) instalados';
$string['somehighlightedonly'] = 'Mostrar solamente extensiones (plugins) que requieren su atención';
$string['source'] = 'Origen';
$string['sourceext'] = 'Módulo externo';
$string['sourcestd'] = 'Estándar';
$string['status'] = 'Estado';
$string['status_delete'] = 'Para borrar';
$string['status_downgrade'] = 'Una versión mayor ya está instalada';
$string['status_missing'] = 'Ausente del disco';
$string['status_new'] = 'Para instalarse';
$string['status_nodb'] = 'Ninguna base de datos';
$string['status_upgrade'] = 'Para actualizar';
$string['status_uptodate'] = 'Instalado';
$string['systemname'] = 'Identificador';
$string['type_auth'] = 'Método de identificación';
$string['type_auth_plural'] = 'Extensiones de identificación';
$string['type_block'] = 'Bloque';
$string['type_block_plural'] = 'Bloques';
$string['type_cachelock'] = 'Manejador de bloqueo de caché';
$string['type_cachelock_plural'] = 'Manejadores de bloqueo de caché';
$string['type_cachestore'] = 'Almacén de caché';
$string['type_cachestore_plural'] = 'Almacenes de caché';
$string['type_calendartype'] = 'Tipo de calendario';
$string['type_calendartype_plural'] = 'Tipos de calendario';
$string['type_coursereport'] = 'Informe de curso';
$string['type_coursereport_plural'] = 'Informes del curso';
$string['type_editor'] = 'Editor';
$string['type_editor_plural'] = 'Editores';
$string['type_enrol'] = 'Método de matriculación';
$string['type_enrol_plural'] = 'Métodos de matriculación';
$string['type_filter'] = 'Filtro';
$string['type_filter_plural'] = 'Filtros de texto';
$string['type_format'] = 'Formato de curso';
$string['type_format_plural'] = 'Formatos de curso';
$string['type_gradeexport'] = 'Método de exportación de calificaciones';
$string['type_gradeexport_plural'] = 'Método de exportación de calificaciones';
$string['type_gradeimport'] = 'Método de importación de calificaciones';
$string['type_gradeimport_plural'] = 'Método de importación de calificaciones';
$string['type_gradereport'] = 'Informe de calificación';
$string['type_gradereport_plural'] = 'Informes del libro de calificaciones';
$string['type_gradingform'] = 'Método de calificación avanzado';
$string['type_gradingform_plural'] = 'Métodos de calificación avanzados';
$string['type_local'] = 'Extensión (plugin) local';
$string['type_local_plural'] = 'Extensiones (plugins) locales';
$string['type_message'] = 'Salida de mensajes';
$string['type_message_plural'] = 'Salidas de mensajería';
$string['type_mnetservice'] = 'Servicio MNet';
$string['type_mnetservice_plural'] = 'Servicios MNet';
$string['type_mod'] = 'Módulo';
$string['type_mod_plural'] = 'Módulos de actividad';
$string['type_plagiarism'] = 'Prevención del plagio';
$string['type_plagiarism_plural'] = 'Extensiones (plugins) para la prevención de plagio';
$string['type_portfolio'] = 'Portafolio';
$string['type_portfolio_plural'] = 'Portafolios';
$string['type_profilefield'] = 'Tipo de campo de perfil';
$string['type_profilefield_plural'] = 'Tipos de campos de perfiles';
$string['type_qbehaviour'] = 'Comportamiento de pregunta';
$string['type_qbehaviour_plural'] = 'Comportamientos de pregunta';
$string['type_qformat'] = 'Formato de importación/exportación de preguntas';
$string['type_qformat_plural'] = 'Formatos de importación/exportación de preguntas';
$string['type_qtype'] = 'Tipo de pregunta';
$string['type_qtype_plural'] = 'Tipos de preguntas';
$string['type_report'] = 'Informe del sitio';
$string['type_report_plural'] = 'Informes';
$string['type_repository'] = 'Repositorio';
$string['type_repository_plural'] = 'Repositorios';
$string['type_theme'] = 'Tema';
$string['type_theme_plural'] = 'Temas';
$string['type_tool'] = 'Herramienta de Administración';
$string['type_tool_plural'] = 'Herramientas de administración';
$string['type_webservice'] = 'Protocolo Webservice';
$string['type_webservice_plural'] = 'Protocolos de servicios Web';
$string['uninstall'] = 'Desinstalar';
$string['uninstallconfirm'] = 'Está apunto de desinstalar la extensión <em>{$a->name}</em>.  Esto eliminará por completo de la base de datos asociada todo lo relacionado con esta extensión, incluyendo su configuración, los registros, los archivos de usuario gestionados por la extensión, etc No hay vuelta atrás y Moodle no crea por si mismo ninguna copia de seguridad de recuperación. ¿Está seguro de que desea continuar?';
$string['uninstalldelete'] = 'Todos los datos relacionados con la extensión  <em>{$a->name}</em> han sido borrados de la base de datos. Para evitar que la extensión se vuelva a instalar automáticamente, ahora debe eliminar manualmente del servidor su carpeta <em>{$a->rootdir}</em>. Moodle no puede eliminarla automáticamente debido a los permisos de escritura.';
$string['uninstalldeleteconfirm'] = 'Todos los datos relacionados con la extensión <em>{$a->name}</em> han sido borrados de la base de datos. Para evitar que la extensión se vuelva a instalar automáticamente, ahora debe eliminar del servidor su carpeta <em>{$a->rootdir}</em>. ¿Quieres eliminar la carpeta de la extensión ahora?';
$string['uninstalldeleteconfirmexternal'] = 'Parece ser que la versión actual de la extensión ha sido obtenida a través de la comprobación del sistema de gestión del código fuente ({$a}t. Si elimina la carpeta de la extensión, puede perder importantes modificaciones locales del código. Por favor asegúrese de que efectivamente quiere eliminar la carpeta de la extensión antes de continuar.';
$string['uninstallextraconfirmblock'] = 'Hay {$a->instances} instancias de este bloque.';
$string['uninstallextraconfirmenrol'] = 'Hay {$a->instances} instancias de este bloque.';
$string['uninstallextraconfirmmod'] = 'Hay {$a->instances} instancias de este bloque.';
$string['uninstalling'] = 'Desinstalando  {$a->name}';
$string['updateavailable'] = '¡Existe una nueva versión {$a} disponible!';
$string['updateavailable_moreinfo'] = 'Más info...';
$string['updateavailable_release'] = 'Liberado {$a}';
$string['updatepluginconfirm'] = 'Confirmación de la actualización de la extensión';
$string['updatepluginconfirmexternal'] = 'Parece que la versión actual de la extensión se ha obtenido a través del chequeo del sistema de gestión de código fuente ({$a}). Si instala esta actualización, ya no podrá obtener las actualizaciones de extensiones a partir del sistema de gestión de código fuente. Por favor, asegúrese antes de continuar  de que realmente quiere actualizar esta extensión.';
$string['updatepluginconfirminfo'] = 'Usted está a punto de instalar una nueva versión del plugin (extensión) <strong>{$a->name}</strong>. Un paquete ZIP con la versión {$a->version} del plugin será descargado desde <a href="{$a->url}">{$a->url}</a> y será extraído a su instalación de Moodle, para que pueda actualizar su instalación.';
$string['updatepluginconfirmwarning'] = 'Por favor, tenga en cuenta que Moodle no hará automáticamente una copia de seguridad de su base de datos antes de la actualización. Nosotros le recomendamos encarecidamente que haga una copia de seguridad completa (instantánea) ahora, para lidiar con el raro caso en que el nuevo código tuviese defectos que hicieran a su sitio inoperante o inclusive que corrompiera su base de datos. Proceda bajo su propio riesgo.';
$string['version'] = 'Versión';
$string['versiondb'] = 'Versión actual';
$string['versiondisk'] = 'Nueva versión';
