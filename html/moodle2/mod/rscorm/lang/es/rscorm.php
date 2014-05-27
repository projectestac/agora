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
 * Strings for component 'scorm', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activación';
$string['activityloading'] = 'Usted será automáticamente encaminado a la actividad en';
$string['activitypleasewait'] = 'Cargando actividad, espere por favor...';
$string['adminsettings'] = 'Configuración de administración';
$string['advanced'] = 'Parámetros';
$string['aicchacpkeepsessiondata'] = 'Datos de sesión AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Periodo de tiempo en días en el que se mantendárn los datos de la sesión externa AICC HACP (un valor alto llenará la tabla con datos antiguos, pero puede ser útil a la hora de depurar)';
$string['aicchacptimeout'] = 'Tiempo de espera AICC HACP';
$string['aicchacptimeout_desc'] = 'Periodo de tiempo en minutos en el que una sesión externa AICC HACP se mantendrá abierta';
$string['allowapidebug'] = 'Activar depuración y trazado API (ajustar la máscara de captura con apidebugmask)';
$string['allowtypeaicchacp'] = 'Habilitar AICC HACP externo';
$string['allowtypeaicchacp_desc'] = 'Si se habilita permite comunicaciones externas AICC HACP sin necesidad de identidicación de usuario para peticiones de un paquete AICC externo';
$string['allowtypeexternal'] = 'Habilitar tipo de paquete externo';
$string['allowtypeexternalaicc'] = 'Habilitar url AICC directa';
$string['allowtypeexternalaicc_desc'] = 'Si se habilita permite una utl directa a un paquete simple AICC';
$string['allowtypeimsrepository'] = 'Habilitar tipo de paquete IMS';
$string['allowtypelocalsync'] = 'Habilitar tipo de paquete descargado';
$string['apidebugmask'] = 'Máscara de captura de depuración API (regex simple en &lt;username&gt;:&lt;activityname&gt;)';
$string['areacontent'] = 'Archivos de contenido';
$string['areapackage'] = 'Archivo de paquete';
$string['asset'] = 'Recurso';
$string['assetlaunched'] = 'Recurso - Visto';
$string['attempt'] = 'Intento';
$string['attempt1'] = '1 intento';
$string['attempts'] = 'Intentos';
$string['attemptsx'] = '{$a} intentos';
$string['attr_error'] = 'Valor incorrecto para el atributo ({$a->attr}) en la marca {$a->tag}.';
$string['autocontinue'] = 'Continuación automática';
$string['autocontinuedesc'] = 'Esta preferencia fija la continuación automática por defecto de la actividad';
$string['autocontinue_help'] = '<p><strong>Autocontinuar</strong></p>

<p>Si Autocontinuar está configurado en Sí, cuando un SCO llama
  al método &quot;cerrar comunicación&quot;, el siguiente SCO disponible
  se abrirá automáticamente.</p>
<p>Si está configurado en No, los usuarios deben hacer clic en el botón &quot;Continuar&quot;
  para seguir.</p>';
$string['averageattempt'] = 'Intentos promedio';
$string['badmanifest'] = 'Errores de manifiesto: ver registro de errores';
$string['badpackage'] = 'Hay problemas con el paquete/manifiesto. Compruébelo e inténtelo de nuevo.';
$string['browse'] = 'Vista previa';
$string['browsed'] = 'Navegado';
$string['browsemode'] = 'Modo de presentación preliminar';
$string['browserepository'] = 'Navegar por el repositorio';
$string['cannotfindsco'] = 'No se ha encontrado SCO';
$string['chooseapacket'] = 'Elegir o actualizar un paquete SCORM/AICC';
$string['completed'] = 'Finalizado';
$string['completionscorerequired'] = 'Requiere puntuación mínima';
$string['completionscorerequired_help'] = 'Al habilitar este parámetro se requerirá que el usuario tenga al menos la puntuación mínima registrada para que se marque la actividad SCORM/AICC como finalziada, así como cualquier otro requerimiento de Finalización de Actividad.';
$string['completionstatus_completed'] = 'Finalizado';
$string['completionstatus_passed'] = 'Pasado';
$string['completionstatusrequired'] = 'Se requiere estado';
$string['completionstatusrequired_help'] = 'Al comprobar uno o más estados se requerirá que el alumno cumpla al menos con uno de esos estados para que se marque como finalizada esta  actividad SCORM/AICC, así como cualquier otro requerimiento de Finalización de Actividad';
$string['confirmloosetracks'] = 'ATENCIÓN: El paquete parece haber sido modificado.nSi la estructura del paquete se ha cambiado,nlas pistas de algunos usuarios pueden haberse perdido durante el proceso de actualización.';
$string['contents'] = 'Contenido';
$string['coursepacket'] = 'Paquete de curso';
$string['coursestruct'] = 'Estructura de curso';
$string['currentwindow'] = 'Ventana actual';
$string['datadir'] = 'Error de sistema: No se puede crear el directorio de datos del curso';
$string['defaultdisplaysettings'] = 'Configuración de pantalla predeterminada';
$string['defaultgradesettings'] = 'Configuración de calificación predeterminada';
$string['defaultothersettings'] = 'Otras configuraciones predeterminadas';
$string['deleteallattempts'] = 'Eliminar todos los intentos SCORM';
$string['deleteattemptcheck'] = '¿Está totalmente seguro que quiere eliminar completamente estos intentos?';
$string['details'] = 'Detalles del rastreo SCO';
$string['directories'] = 'Mostrar enlaces de directorio';
$string['disabled'] = 'Dehabilitado';
$string['display'] = 'Mostrar';
$string['displayattemptstatus'] = 'Mostrar estado de intentos';
$string['displayattemptstatusdesc'] = 'Esta preferencia fija el valor por defecto para mostrar el ajuste de estado de intentos';
$string['displayattemptstatus_help'] = 'Si está activado, las puntuaciones y las calificaciones de los intentos se muestran en la página de resumen SCORM.';
$string['displaycoursestructure'] = 'Mostrar estructura del curso en la página de entrada';
$string['displaycoursestructuredesc'] = 'Esta preferencia fija el valor por defecto para mostrar el ajuste de estructura del curso en la página de entrada';
$string['displaycoursestructure_help'] = 'Si está activado, la tabla de contenidos se mostrará en la página de resumen SCORM/AICC.';
$string['displaydesc'] = 'Esta preferencia fija el valor por defecto para mostrar o no el paquete de una actividad';
$string['displaysettings'] = 'Configuración de pantalla';
$string['domxml'] = 'Librería externa DOMXML';
$string['duedate'] = 'Vencimiento';
$string['element'] = 'Elemento';
$string['elementdefinition'] = 'Definición de elemento';
$string['enter'] = 'Entrar';
$string['entercourse'] = 'Introducir el curso SCORM/AICC';
$string['errorlogs'] = 'Registro de errores';
$string['everyday'] = 'Todos los días';
$string['everytime'] = 'Cada vez que se use';
$string['exceededmaxattempts'] = 'Ha alcanzado el número máximo de intentos';
$string['exit'] = 'Salir del curso';
$string['exitactivity'] = 'Salir de la actividad';
$string['expired'] = 'Lo sentimos, esta actividad se cerró en {$a} y ya no está disponible';
$string['external'] = 'Actualizar la temporalización de paquetes externos';
$string['failed'] = 'Error';
$string['finishscorm'] = 'Si ha terminado de ver este recurso, {$a}';
$string['finishscormlinkname'] = 'haga clic aquí para volver a la página del curso';
$string['firstaccess'] = 'Primer acceso';
$string['firstattempt'] = 'Primer intento';
$string['forcecompleted'] = 'Forzar finalización';
$string['forcecompleteddesc'] = 'Esta preferencia fija el valor por defecto para mostrar el ajuste de forzar completados';
$string['forcecompleted_help'] = 'Si se activa, el estado del intento actual se cambia a "Completado". Este ajuste sólo se aplica a los paquetes SCORM/AICC 1.2. Es útil si el paquete SCORM/AICC no se ocupa de revisar el intento correctamente, ya sea en la revisión o en el modo de exploración, o se produce cualquier otro funcionamiento incorrecto en el estado "Completado"';
$string['forcejavascript'] = 'Obligar a los usuarios a tener JavaScript habilitado';
$string['forcejavascript_desc'] = 'Si está activado (recomendado) impide el acceso a los objetos SCORM/AICC cuando JavaScript no está soportado/activado en el navegador del usuario. Si está desactivado, el usuario puede ver el SCORM/AICC, pero la comunicación API fallará y no se almacenará la información de la calificación.';
$string['forcejavascriptmessage'] = 'Se requiere JavaScript para visualizar este objeto, por favor, active JavaScript en su navegador y vuelva a intentarlo.';
$string['forcenewattempt'] = 'Forzar nuevo intento';
$string['forcenewattemptdesc'] = 'Esta preferencia fija el valor por defecto para mostrar el ajuste de forzar nuevo intento';
$string['forcenewattempt_help'] = 'Si se activa, cada vez que un paquete SCORM/AICC se visite se contará como un nuevo intento.';
$string['found'] = 'Encontrado manifiesto';
$string['frameheight'] = 'Esta preferencia determina la altura por defecto del marco o ventana SCO';
$string['framewidth'] = 'Esta preferencia ajusta la anchura por defecto del marco o ventana SCO';
$string['fullscreen'] = 'Llenar toda la pantalla';
$string['general'] = 'Datos generales';
$string['gradeaverage'] = 'Calificación promedio';
$string['gradeforattempt'] = 'Calificación del intento';
$string['gradehighest'] = 'Calificación más alta';
$string['grademethod'] = 'Método de calificación';
$string['grademethoddesc'] = 'Esta preferencia fija el valor por defecto del método de calificación de una actividad';
$string['grademethod_help'] = 'El método de calificación define cómo se determina la calificación de un intento único en una actividad.

Hay 4 métodos de calificación:

* Objetos de aprendizaje - Número de objetos de aprendizaje completados/aprobados
* Calificación más alta: La puntuación máxima obtenida  entre todos los objetos realizados
* Calificación promedio: La media de todas las puntuaciones
* Calificaciones sumadas: La suma de todas las puntuaciones';
$string['gradereported'] = 'Calificación informada';
$string['gradescoes'] = 'Objetos de aprendizaje';
$string['gradesettings'] = 'Configuración de calificación';
$string['gradesum'] = 'Calificaciones sumadas';
$string['height'] = 'Altura';
$string['hidden'] = 'Oculto';
$string['hidebrowse'] = 'Ocultar botón de previsualización';
$string['hidebrowsedesc'] = 'Esta preferencia fija el valor por defecto sobre activar o desactivar el modo de previsualización';
$string['hidebrowse_help'] = '<p>Si esta opción está ajustada a "Sí", el botón de previsualización en la página principal de la actividad SCORM/AICC no mostrará.</p>

<p>En caso contrario, el estudiante puede elegir entre previsualizar la actividad o realizar un intento de forma normal.</p>

<p>Cuando un objeto de aprendizaje es completado en modo previsualizar, es marcado con el icono de previsualizado (<img src="<?php echo $CFG->wwwroot.\'/mod/scorm/pix/browsed.gif\' ?>" alt="<?php print_string(\'browsed\',\'scorm\') ?>" title="<?php print_string(\'browsed\',\'scorm\') ?>" />).</p>';
$string['hideexit'] = 'Ocultar enlace de salida';
$string['hidenav'] = 'Ocultar botones de navegación';
$string['hidenavdesc'] = 'Esta preferencia fija el valor por defecto sobre mostrar o no los botones de navegación';
$string['hidereview'] = 'Ocultar botón de revisión';
$string['hidetoc'] = 'Mostrar la estructura del curso en el reproductor';
$string['hidetocdesc'] = 'Esta preferencia fija el valor por defecto sobre mostrar o no la estructura del curso (TOC) en el reproductor SCORM';
$string['hidetoc_help'] = 'Esta configuración especifica cómo se muestra la tabla de contenidos en el reproductor de SCORM.';
$string['highestattempt'] = 'Intento más alto';
$string['identifier'] = 'Identificador de preguntas';
$string['incomplete'] = 'Incompleto';
$string['info'] = 'Info';
$string['interactions'] = 'Interacciones';
$string['interactionscorrectcount'] = 'Número de resultados correctos para la pregunta';
$string['interactionsid'] = 'Id del elemento';
$string['interactionslatency'] = 'Tiempo transucrrido entre el momento en que la se puso a disposición del alumno la interacción para respoder y el momento de la primera respuesta';
$string['interactionslearnerresponse'] = 'Respuesa del alumno';
$string['interactionspattern'] = 'Patrón de respuesta correcta';
$string['interactionsresponse'] = 'Respuesta del estudiante';
$string['interactionsresult'] = 'Resultado en base a la respuesta del alumno y el resultado correcto';
$string['interactionsscoremax'] = 'Valor máximo en el rango de posible de puntuaciones';
$string['interactionsscoremin'] = 'Valor mínimo en el rango de posible de puntuaciones';
$string['interactionsscoreraw'] = 'Número que refleja el resultado del alumno en relación con el rango delimitado por los valores de mínimo y máximo';
$string['interactionssuspenddata'] = 'proporciona espacio para almacenar y recuperar datos entre sesiones de aprendizaje';
$string['interactionstime'] = 'Hora en la que se inició el intento';
$string['interactionstype'] = 'Tipo de pregunta';
$string['interactionsweight'] = 'Peso asigando al elemento';
$string['invalidactivity'] = 'La actividad SCORM es incorrecta';
$string['invalidhacpsession'] = 'Sesióm HACP no válida';
$string['invalidmanifestresource'] = 'ADVERTENCIA: Los siguientes recursos son mencionados en el manifiesto, pero no se puden encontrar';
$string['invalidurl'] = 'Se ha especificado una URL no válida';
$string['last'] = 'Último acceso en';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'Último intento';
$string['lastattemptlock'] = 'Bloquear después último intento';
$string['lastattemptlockdesc'] = 'Esta preferencia fija el valor por defecto para el bloqueo después de ajustar el intento final';
$string['lastattemptlock_help'] = 'Si se activa, al estudiante se le impide el lanzamiento del reproductor SCORM después de haber utilizado todos los intentos que tenía asignados.';
$string['location'] = 'Mostrar la barra de ubicación';
$string['max'] = 'Calificación máxima';
$string['maximumattempts'] = 'Número de intentos';
$string['maximumattemptsdesc'] = 'Esta preferencia fija el valor por defecto sobre el número máximo de intentos en una actividad';
$string['maximumattempts_help'] = '<p>Este parámetro define el número de intentos permitidos a los usuarios.<br />Solo funciona con paquetes SCORM1.2 y AICC. Los paquetes SCORM2004 tienen su propia definición de máximo de intentos.</p>';
$string['maximumgradedesc'] = 'Esta preferencia fija el valor por defecto sobre la calificación máxima de una actividad';
$string['menubar'] = 'Mostrar la barra de menú';
$string['min'] = 'Calificación mínima';
$string['missing_attribute'] = 'Falta atributo ({$a->attr}) en marca {$a->tag}';
$string['missingparam'] = 'Un elemento requerido falta o es erróneo';
$string['missing_tag'] = 'Falta marca {$a->tag}';
$string['mode'] = 'Moda';
$string['modulename'] = 'SCORM/AICC Remoto';
$string['modulename_help'] = 'SCORM y AICC son un conjunto de especificaciones que permiten la interoperabilidad, la accesibilidad y la reutilización de los contenidos de aprendizaje basados en la web. El módulo SCORM/AICC permite que se incluyan en el curso paquetes SCORM/AICC.';
$string['modulenameplural'] = 'SCORMs/AICCs Remotos';
$string['navigation'] = 'Navegación';
$string['newattempt'] = 'Comenzar un nuevo intento';
$string['next'] = 'Continuar';
$string['noactivity'] = 'Nada que informar';
$string['noattemptsallowed'] = 'Número de intentos permitidos';
$string['noattemptsmade'] = 'Número de intentos realizados';
$string['no_attributes'] = 'La marca {$a->tag} debe tener atributos';
$string['no_children'] = 'La marca {$a->tag} debe tener hijos';
$string['nolimit'] = 'Intentos ilimitados';
$string['nomanifest'] = 'Manifiesto no encontrado';
$string['noprerequisites'] = 'Lo sentimos, pero no ha satisfecho los pre-requisitos suficientes para acceder a este objeto de aprendizaje';
$string['noreports'] = 'No hay informes que mostrar';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'Su navegador no admite javascript, o tiene la opción javascript deshabilitada. Este paquete SCORM no puede reproducirse o guardar los datos correctamente.';
$string['notattempted'] = 'No se ha intentado';
$string['not_corr_type'] = 'No concuerda el tipo para la marca {$a->tag}';
$string['notopenyet'] = 'Esta actividad no estará disponible hasta {$a}';
$string['objectives'] = 'Objetivos';
$string['optallstudents'] = 'todos los usuarios';
$string['optattemptsonly'] = 'Sólo usuarios con intentos';
$string['options'] = 'Opciones (no admitidas por algunos navegadores)';
$string['optionsadv'] = 'Opciones (Avanzadas)';
$string['optionsadv_desc'] = 'Si se selecciona, la ventana de opciones se establece como opciones avanzadas en el formulario';
$string['optnoattemptsonly'] = 'Sólo usuarios sin intentos';
$string['organization'] = 'Organización';
$string['organizations'] = 'Organizaciones';
$string['othersettings'] = 'Ajustes adicionales';
$string['othertracks'] = 'Otras pistas';
$string['package'] = 'Paquete';
$string['packagedir'] = 'Error de sistema: No se puede crear el directorio de paquetes';
$string['packagefile'] = 'No se ha especificado paquete';
$string['package_help'] = '<p><strong>Archivos empaquetados</strong></p>
<p>El paquete es un archivo particular con extensión <strong>zip</strong>
  (o pif) que contiene archivos válidos de definición de curso SCORM o AICC</p>
<p>Un paquete SCORM/AICC contiene en la raíz del zip un archivo llamado<strong>
  imsmanifest.xml </strong>el cual define la estructura de un curso SCORM,la localización
  de los recursos y muchas otras cosas.</p>
<p>Un paquete <strong>AICC</strong> está definido por varios archivos (de
  4 a 7) con extensiones definidas. He aquí una descripción de lo
  que estas extensiones quieren decir:</p>
<ul>
  <li>CRS - Archivo de descripción del curso (obligatorio)</li>
  <li>AU - Archivo de asignación de unidad (obligatorio)</li>
  <li>DES - Archivo de descripción (obligatorio)</li>
  <li>CST - Archivo de estructura del curso (obligatorio)</li>
  <li>ORE - Archivo de relación de objetivos (optativo)</li>
  <li>PRE - Archivo de prerrequisitos (optativo)</li>
  <li>CMP - Archivo de requisitos de trabajo (optativo)</li>
</ul>';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Este parámetro habilita una URL para especificar el paquete SCORM/AICC en vez de seleccionar un archivo a través del selector de archivos.';
$string['page-mod-scorm-x'] = 'Cualquier página del módulo SCORM/AICC';
$string['pagesize'] = 'Tamaño de la página';
$string['passed'] = 'Pasado';
$string['php5'] = 'PHP 5 (librería nativa DOMXML)';
$string['pluginadministration'] = 'Administración SCORM/AICC';
$string['pluginname'] = 'SCORM/AICC Remoto';
$string['popup'] = 'Abrir Objetos de Aprendizaje en una ventana nueva';
$string['popupmenu'] = 'En un menú emergente';
$string['popupopen'] = 'Abrir paquete en una ventana nueva';
$string['popupsblocked'] = 'Parece que las ventanas emergentes están bloqueadas, deteniendo la ejecución de este módulo SCORM/AICC. Por favor verifique la configuración del explorador, antes de comenzar de nuevo.';
$string['position_error'] = 'La marca {$a->tag} no puede ser un hijo de la marca {$a->parent}';
$string['preferencespage'] = 'Preferencias exclusivas para esta página';
$string['preferencesuser'] = 'Preferencias para esta exportación';
$string['prev'] = 'Anterior';
$string['raw'] = 'Puntuación bruta';
$string['regular'] = 'Manifiesto Regular';
$string['report'] = 'Informe';
$string['reportcountallattempts'] = '{$a->nbattempts} intentos de {$a->nbusers} usuarios, de un total de {$a->nbresults} resultados';
$string['reportcountattempts'] = '{$a->nbresults} resultados ({$a->nbusers} users)';
$string['reports'] = 'Informes';
$string['resizable'] = 'Permitir el cambio de tamaño de la ventana';
$string['result'] = 'Resultado';
$string['results'] = 'Resultados';
$string['review'] = 'Revisión';
$string['reviewmode'] = 'Modo Revisión';
$string['scoes'] = 'Objetos de aprendizaje';
$string['score'] = 'Puntuación';
$string['scormclose'] = 'Hasta';
$string['scormcourse'] = 'Curso de Aprendizaje';
$string['scorm:deleteresponses'] = 'Eliminar intentos SCORM';
$string['rscorm:deleteresponses'] = 'Eliminar intentos SCORM';
$string['rscormloggingoff'] = 'Entrada API desactivada';
$string['rscormloggingon'] = 'Entrada API activada';
$string['rscormopen'] = 'Abierto';
$string['rscormresponsedeleted'] = 'Eliminar los intentos del usuario';
$string['rscorm:deleteownresponses'] = 'Eliminar mis intentos';
// MARSUPIAL ********** MODIFICAT - to set it operative
$string['rscorm:savetrack'] = 'Guardar pistas';
$string['rscorm:skipview'] = 'Pasar por alto revisión';
$string['rscorm:viewreport'] = 'Ver informes';
$string['rscorm:viewscores'] = 'Ver puntuaciones';
// ********** FI

$string['rscormtype'] = 'Tipo';
$string['rscormtype_help'] = 'This setting determines how the package is included in the course. There are up to 4 options:';

$string['scormloggingoff'] = 'Entrada API desconectada';
$string['scormloggingon'] = 'Entrada API conectada';
$string['scormopen'] = 'Abrir';
$string['scormresponsedeleted'] = 'Eliminar los intentos del usuario';
$string['scorm:savetrack'] = 'Guardar pistas';
$string['scorm:skipview'] = 'Pasar por alto revisión';
$string['scormtype'] = 'Tipo';
$string['scormtype_help'] = 'Este ajuste determina cómo se incluye el paquete en el curso. Hay 4 opciones:

* Paquete subido - Posibilita escoger un paquete SCORM por medio del selector de archivos
* Manifiesto SCORM externo - Posibilita especificar una URL imsmanifest.xml. NOTA: Si la URL tiene un nombre de dominio distinto del de su sitio, entonces la mejor opción es "Paquete bajado", puesto que en otro caso las calificaciones no son guardadas.
* Paquete bajado - Posibilita especificar una URL del paquete. El paquete será descomprimido y guardado localmente, y actualizado cuando se actualice el paquete SCORM externo.
* Repositorio de contenido IMS local - Posibilita seleccionar un paquete de un repositorio IMS.';
$string['scorm:viewreport'] = 'Ver informes';
$string['scorm:viewscores'] = 'Ver puntuaciones';
$string['scrollbars'] = 'Permitir desplazamiento de la ventana';
$string['selectall'] = 'Seleccionar todo';
$string['selectnone'] = 'Deseleccionar todo';
$string['show'] = 'Mostrar';
$string['sided'] = 'Lateral';
$string['skipview'] = 'Pasar por alto al estudiante la página de estructura de contenidos';
$string['skipviewdesc'] = 'Esta preferencia fija el valor por defecto sobre cuándo pasar por alto la estructura de contenido de una página';
$string['skipview_help'] = '<p>Si añade un paquete con únicamente un objeto de apredizaje, puede elegir omitir automáticamente la página de estructura de contenidos cuando los usuario seleccionan una actividad SCORM en la página del curso.</p>

<p>Puede elegir:
   <ul>
       <li>Omitir la página de estructura de contenidos <strong>nunca</strong>.</li>
       <li>Omitir la página de estructura de contenidos en el <strong>primer acceso</strong>.</li>
       <li>Omitir la página de estructura de contenidos <strong>siempre</strong>.</li>
   </ul>
</p>';
$string['slashargs'] = 'ATENCIÓN: los argumentos \'slash\' están deshabilitados en este sitio y los objetos pueden no funcionar como se espera.';
$string['stagesize'] = 'Tamaño de marco/ventana';
$string['stagesize_help'] = '<p>Estos dos parámetros definen la altura y la anchura del marco o ventana en el que se visualizará el objeto de aprendizaje.</p>';
$string['started'] = 'Comenzado en';
$string['status'] = 'Estatus';
$string['statusbar'] = 'Mostrar la barra de estado';
$string['student_response'] = 'Respuesta';
$string['subplugintype_scormreport'] = 'Informe';
$string['subplugintype_scormreport_plural'] = 'Informe';
$string['suspended'] = 'Suspendido';
$string['syntax'] = 'Error de sintaxis';
$string['tag_error'] = 'Marca desconocida ({$a->tag}) con este contenido: {$a->value}';
$string['time'] = 'Hora';
$string['timerestrict'] = 'Restringir la respuesta a este periodo de tiempo';
$string['title'] = 'Título';
$string['toc'] = 'TOC (Tabla de Contenidos)';
$string['toolbar'] = 'Mostrar la barra de herramientas';
$string['too_many_attributes'] = 'La marca {$a->tag} tiene demasiados atributos';
$string['too_many_children'] = 'La marca {$a->tag} tiene demasiados hijos';
$string['totaltime'] = 'Hora';
$string['trackingloose'] = 'ATENCIÓN: ¡Los datos de rastreo de este paquete se perderán!';
$string['type'] = 'Tipo';
$string['typeaiccurl'] = 'URL AICC externa';
$string['typeexternal'] = 'Manifiesto SCORM externo';
$string['typeimsrepository'] = 'Repositorio de contenido IMS local';
$string['typelocal'] = 'Paquete subido';
$string['typelocalsync'] = 'Paquete bajado';
$string['unziperror'] = 'Ha ocurrido un error durante la descompresión del paquete';
$string['updatefreq'] = 'Actualizar frecuencia automáticamente';
$string['updatefreqdesc'] = 'Esta preferencia fija el valor por defecto sobre la frecuencia de actualización automática de una actividad';
$string['validateascorm'] = 'Validar un paquete SCORM';
$string['validation'] = 'Resultado de la validación';
$string['validationtype'] = 'Esta preferencia ajusta la librería DOMXML usada para validar un Manifiesto SCORM. Si tiene dudas, deje la opción activada.';
$string['value'] = 'Valor';
$string['versionwarning'] = 'La versión del manifiesto es anterior a la 1.3, atención a la marca {$a->tag}';
$string['viewallreports'] = 'Ver los informes de {$a} intentos';
$string['viewalluserreports'] = 'Ver los informes de {$a} usuarios';
$string['whatgrade'] = 'Calificación de intentos';
$string['whatgradedesc'] = 'Esta preferencia fija el valor por defecto sobre la calificación de intentos';
$string['whatgrade_help'] = 'Si se permiten múltiples intentos, este parámetro especifica si se almacenará en el libro de calificaciones el valor más alto, el promedio (la media), el primer intento o el último.

Gestión de Múltiples intentos

* La posibilidad de iniciar un nuevo intento se marca en una casilla situada encima del botón Enter en la página de estructura del contenido, así que asegúrese que permite el acceso a esa página si desea permitir que más de un intento.
* Algunos paquetes SCORM son inteligentes sobre los nuevos intentos, pero muchos no lo son. Lo que significa que si el estudiante vuelve a ha hacer un intento y contenido SCORM no tiene lógica interna para evitar sobrescribir los intentos anteriores, estos se pueden sobrescribir, incluso si el  intento estaba en estado "completado" o "pasado".
* La configuración de "Forzar completar", "Forzar nuevo intento" y "Bloqueo después del intento final" también mejoran la gestión de múltiples intentos.';
$string['width'] = 'Anchura';
$string['window'] = 'Ventana';

//MARSUPIAL ********** AFEGIT - text strings
$string['level']='Nivel';
$string['isbn']='Libro (ISBN)';
$string['unit']='Unidad';
$string['activity']='Actividad';

$string['isbnerror']='Debe seleccionar una opción válida aquí.';

$string['parametererror']='Par√°metro ID no encontrado en la cadena de solicitud';
$string['jsonerror']='La cadena ajax de respuesta no es válida';
$string['ajaxresponseerror']='Respuesta ajax no vñalida';
$string['errorloadinstancebd']='No se puede cargar de la base de datos la instancia solicitada';
$string['errorloadcoursebd']='No se puede cargar de la base de datos el id del curso';
$string['wsautenticationerror']='El web services de autenticación respondio con un error';
//********** FI

