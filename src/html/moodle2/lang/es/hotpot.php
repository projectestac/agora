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
 * Strings for component 'hotpot', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado';
$string['activitycloses'] = 'Actividad de cierre';
$string['activitygrade'] = 'Calificación de la actividad';
$string['added'] = 'Añadida';
$string['addquizchain'] = 'Agregar listado de preguntas';
$string['addquizchain_help'] = '¿Se deberán añadir todas las preguntas del listado de preguntas?

** No **
: sólo una pregunta se añadirá al curso

** Sí **
: si el archivo de origen es un "archivo de preguntas", se tratará como el inicio de un listado de preguntas y todas las preguntas del listado se añadirán al curso con la misma configuración. Cada pregunta del listado debe tener un enlace al archivo siguiente en la cadena.

Si el archivo de origen es una "carpeta", todas las preguntas reconocibles en la carpeta se agregarán al curso para formar un listado de preguntas con las mismas configuraciones.

Si el archivo de origen es un "archivo único", como un archivo Masher de HotPot o un archivo index.html las preguntas listadas en el archivo único  se añadirán al curso como un listado de preguntas con las mismas configuraciones.';
$string['allowreview'] = 'Permitir revisión';
$string['allowreview_help'] = 'Si se activa, los estudiantes podrán revisar sus intentos después de que el cuestionario está cerrado.';
$string['analysisreport'] = 'Análisis del Elemento';
$string['attemptlimit'] = 'Límite de intentos';
$string['attemptlimit_help'] = 'Número máximo de intentos que un estudiante dispone en esta actividad HotPot';
$string['attemptnumber'] = 'Número de intentos';
$string['attempts'] = 'Intentos';
$string['attemptscore'] = 'Puntuación del intento';
$string['attemptsunlimited'] = 'Intentos ilimitados';
$string['average'] = 'Promedio';
$string['averagescore'] = 'Puntuación media';
$string['cacherecords'] = 'Registros en caché HotPot';
$string['canrestartquiz'] = 'Sus resultados hasta el momento se guardaran y usted puede volver a intantarlo "{$a}" más tarde';
$string['canrestartunit'] = 'Sus resultados hasta el momento se guardarán pero si usted quiere volver a intentar esta actividad más tarde, deberá comenzar desde el principio.';
$string['canresumequiz'] = 'Sus resultados hasta el momento se guardarán y usted podrá reanudad "{$a}" más tarde';
$string['checks'] = 'Comprobaciones';
$string['checksomeboxes'] = 'Por favor, compruebe algunas opciones';
$string['clearcache'] = 'Limpiar caché HotPot';
$string['cleardetails'] = 'Limpiar detalles HotPot';
$string['clearedcache'] = 'El caché HotPot se ha limpiado';
$string['cleareddetails'] = 'Los detalles HotPot se han limpiado';
$string['clickreporting'] = 'Habilitar informe por clic';
$string['clickreporting_help'] = 'Si se habilita, un registro independiente se guarda cada vez que un botón de opción se pulsa. Esta opción permite que al profesor vea un informe muy detallado que muestra el estado de las preguntas en cada clic. Si no se habilita, solo se guarda un registro por intento en cada pregunta.';
$string['closed'] = 'La actividad se ha cerrado';
$string['clues'] = 'Pistas';
$string['completed'] = 'Finalizada';
$string['configenablecache'] = 'Mantener el caché de HotPot puede aumentar en gran manera la velocidad de entrega de las preguntas a los estudiantes.';
$string['configenablecron'] = 'Especifique los horarios, en su zona horaria, en los que el script del cron de HotPot debe ejecutarse';
$string['configenablemymoodle'] = 'Este parámetro define si HotPot se lista en la página Mi Moodle, o no';
$string['configenableobfuscate'] = 'Ofuscar el código javascript que permite insertar reproductores de medios hace que sea más difícil determinar el nombre y adivinar lo que contiene el archivo.';
$string['configenableswf'] = 'Permite incrustar de archivos SFW en las actividades HotPot. Si se habilita, este valor sobreescribe el filtro "filter_mediaplugin_enable_swf"';
$string['configfile'] = 'Archivo de configuración';
$string['configframeheight'] = 'Cuando se muestra una pregunta dentro de un marco, este valor (en pixels) es el más alto de la parte superior del marco que contiene la barra de navegación de Moodle';
$string['configlocation'] = 'Ubicación del archivo de configuración';
$string['configlockframe'] = 'Si este parámetro está habilitado, entonces el marco de navegación, si se usa, se bloqueará y no se permitirá el "scroll" y el redimensionamiento y no tendrá borde.';
$string['configmaxeventlength'] = 'Si un HotPot tiene especificadas una hora de apertura y otra de cierre, y la diferencia entre las dos es mayor que el número de días especificado aquí, entonces se añadirán dos eventos diferentes al calendario del curso. Para periodos de tiempo inferiores, o cuando sólo se especifica una de las horas, se añadirá solo un evento al calendario. Si no se especifica ninguna hora, no se añadirá ningún evento al calendario.';
$string['configstoredetails'] = 'Si esta opción está activada, los datos XML sin procesar de los intentos de los cuestionarios HotPot se almacenan en la tabla hotpot_details. Esto permite que los intentos puedan ser recalificados posteriormente para reflejar cambios en el sistema de puntuación de los cuestionarios HotPot. Sin embargo, activar esta opción en un sitio con mucha actividad hará que la tabla hotpot_details crezca muy rápidamente.';
$string['confirmdeleteattempts'] = '¿Realmente quiere eliminar estso intentos?';
$string['confirmstop'] = '¿Esta seguro que quiere salir de esta página?';
$string['correct'] = 'Correcto';
$string['couldnotinsertsubmissionform'] = 'No se pudo insertar la entrega desde';
$string['delay1'] = 'Tiempo de espera 1';
$string['delay1_help'] = 'El tiempo mínimo de espera entre el primer y segundo intentos.';
$string['delay1summary'] = 'Tiempo de espera entre el primer y el segundo intento';
$string['delay2'] = 'Tiempo de espera 2';
$string['delay2_help'] = 'El tiempo de espera mínimo entre intentos después del segundo intento';
$string['delay2summary'] = 'Tiempo de espera entre intentos posteriores';
$string['delay3'] = 'Tiempo de espera 3';
$string['delay3afterok'] = 'Esperar hasta que el estudiante haga clic en Aceptar';
$string['delay3disable'] = 'No continuar automáticamente';
$string['delay3_help'] = 'El ajuste especifica el retardo entre la finalización de la prueba y la vuelta del control a la pantalla de Moodle.

**Usar tiempo especificado (en segundos)**
: el control será devuelto a Moodle después del número de segundos especificado.

**Usar la configuración del archivo de origen/plantilla**
: el control será devuelto a Moodle después del número de segundos especificado en el archivo de origen o en el archivo de plantilla para este formato de salida.

**Esperar hasta que el estudiante haga clic en Aceptar**:
: el control será devuelto a Moodle después que el estudiante haga  clic en el botón Aceptar en el mensaje de finalización de la prueba.

**No continuar automáticamente**
: el control no será devuelto a Moodle después de que la prueba haya terminado. El estudiante tendrá la libertad de navegar fuera de la página del cuestionario.

Tenga en cuenta que los resultados del cuestionario siempre se devuelven a Moodle inmediatamente después de que la prueba se haya completado o abandonado, independientemente de este ajuste.';
$string['delay3specific'] = 'Usar tiempo especificado (en segundos)';
$string['delay3summary'] = 'Tiempo de espera al final del cuestionario';
$string['delay3template'] = 'Usar la configuración del archivo de origen/plantilla';
$string['deleteattempts'] = 'Eliminar intentos';
$string['detailsrecords'] = 'Registros de detalle de HotPot';
$string['d_index'] = 'Índice de discriminación';
$string['duration'] = 'Duración';
$string['enablecache'] = 'Activar caché HotPot';
$string['enablecron'] = 'Activar cron HotPot';
$string['enablemymoodle'] = 'Mostrar HotPots en Mi Moodle';
$string['enableobfuscate'] = 'Habilitar ofuscación del código del repropuctor de medios';
$string['enableswf'] = 'Permitir incrustar archivos SWF en actividades HotPot';
$string['entry_attempts'] = 'Intentos';
$string['entrycm'] = 'Actividad previa';
$string['entrycmcourse'] = 'Actividad previa en este curso';
$string['entrycmsection'] = 'Actividad previa en esta sección del curso';
$string['entrycompletionwarning'] = 'Antes de iniciar esta actividad, debe mirar {$a}';
$string['entry_dates'] = 'Fechas';
$string['entrygrade'] = 'Calificación previa de la actividad';
$string['entrygradewarning'] = 'No puede iniciar esta actividad hasta que haya obtenido un puntuación de {$a->entrygrade}% en {$a->entryactivity}. En este momento su puntuación en esta actividad es {$a->usergrade}%';
$string['entry_grading'] = 'Calificando';
$string['entryhotpotcourse'] = 'HotPot previo en este curso';
$string['entryhotpotsection'] = 'HotPot previo en esta sección del curso';
$string['entryoptions'] = 'Opciones de la página de entrada';
$string['entrypage'] = 'Mostrar página de entrada';
$string['entrypagehdr'] = 'Página de entrada';
$string['entrypage_help'] = '¿Se mostrará a los estudiantes una página inicial antes de comenzar la actividad HotPot?
**Sí**
:los estudiantes verán una página de entrada antes de iniciar el HotPot. El contenido de la página de entrada se determina en las opciones de la página de entrada de HotPot.

**No**
:los estudiantes no verán una página de entrada, y se iniciará el HotPot  de inmediato.

Una página de entrada se mostrará siempre al profesor con el fin de facilitar el acceso a los informes y editar las páginas de preguntas.';
$string['entrytext'] = 'Texto de la página de entrada';
$string['entry_title'] = 'Nombre de la unidad como título';
$string['exit_areyouok'] = '¡Hola!, ¿aún está ahí?';
$string['exit_attemptscore'] = 'Su puntuación de este intento fue {$a}';
$string['exitcm'] = 'Actividad siguiente';
$string['exitcmcourse'] = 'Actividad siguiente en este curso';
$string['exitcmsection'] = 'Actividad siguiente en esta sección del curso';
$string['exit_course'] = 'Curso';
$string['exit_course_text'] = 'Volver a la página principal del curso';
$string['exit_feedback'] = 'Salir de la página de retroalimentación';
$string['exit_goodtry'] = '¡Buen intento!';
$string['exitgrade'] = 'Calificación de la siguiente actividad';
$string['exit_grades'] = 'Calificaciones';
$string['exit_grades_text'] = 'Mire sus calificaciones hasta el momento en este curso';
$string['exithotpotcourse'] = 'Siguiente HotPot en este curso';
$string['exit_hotpotgrade'] = 'Su calificación en esta actividad es {$a}';
$string['exit_hotpotgrade_average'] = 'Su calificación media hasta el momento en esta actividad es {$a}';
$string['exit_hotpotgrade_highest'] = 'Su calificación más alta hasta el momento en esta actividad es {$a}';
$string['exit_hotpotgrade_highest_equal'] = '¡Ha igualado su mejor puntuación anterior en esta actividad!';
$string['exit_hotpotgrade_highest_previous'] = 'Su puntuación previa más alta en esta actividad era {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'No ha puntuado aún en esta actividad por encima de {$a}';
$string['exithotpotsection'] = 'Siguiente HotPot en esta sección del curso';
$string['exit_index'] = 'Ïndice';
$string['exit_index_text'] = 'Ir al índice de actividades';
$string['exit_links'] = 'Salir de la página de enlaces';
$string['exit_next'] = 'Siguiente';
$string['exit_next_text'] = 'Inténtelo con la siguiente actividad';
$string['exit_noscore'] = '¡Ha finalizado con éxito esta actividad!';
$string['exitoptions'] = 'Opciones de la página de salida';
$string['exitpage'] = 'Mostrar página de salida';
$string['exitpagehdr'] = 'Página de salida';
$string['exit_retry'] = 'Reintentar';
$string['exit_retry_text'] = 'Reintentar esta actividad';
$string['exittext'] = 'Texto d ela página de salida';
$string['exit_welldone'] = '!Muy bien!';
$string['exit_whatnext_0'] = '¿Qué quiere hacer ahora?';
$string['exit_whatnext_1'] = 'Elija su destino...';
$string['feedbackdiscuss'] = 'Debatir sobre esta pregunta en un foro';
$string['feedbackformmail'] = 'Formulario de retroalimentación';
$string['feedbackmoodleforum'] = 'Foro de Moodle';
$string['feedbackmoodlemessaging'] = 'Mensajería de Moodle';
$string['feedbacknone'] = 'No';
$string['feedbacksendmessage'] = 'Evíe un mensaje a su instructor';
$string['feedbackwebpage'] = 'Página web';
$string['firstattempt'] = 'Primer intento';
$string['forceplugins'] = 'Forzar plugins multimedia';
$string['forceplugins_help'] = 'Si se activa, los reproductores multimedia compatibles con Moodle podrán reproducir archivos tales como AVI, MPEG, MPG, MP3, MOV y WMV. De lo contrario, Moodle no modificará la configuración de ningún reproductor de medios.';
$string['frameheight'] = 'Altura del marco';
$string['giveup'] = 'Abandonar';
$string['grademethod'] = 'Método de calificación';
$string['gradeweighting'] = 'Ponderación de la calificación';
$string['gradeweighting_help'] = 'Las calificaciones de esta actividad HotPot se escalarán a este valor en el libro Moodle de calificaciones';
$string['highestscore'] = 'Puntuación más alta';
$string['hints'] = 'Ayudas';
$string['hotpot:addinstance'] = 'Añadir una nueva actividad HotPot';
$string['hotpot:attempt'] = 'Contestar un cuestionario';
$string['hotpot:deleteallattempts'] = 'Eliminar los intentos de usuario de las actividades HotPot';
$string['hotpot:deletemyattempts'] = 'Eliminar sus propios intentos en una actividad HotPot';
$string['hotpot:ignoretimelimits'] = 'Ignorar tiempos límites en una actividad HotPot';
$string['hotpot:manage'] = 'Cambiar los parámetros de una actividad HotPot';
$string['hotpotname'] = 'Nombre de la actividad HotPot';
$string['hotpot:preview'] = 'Previsualizar una actividad HotPot';
$string['hotpot:reviewallattempts'] = 'Ver los intentos de usuario de una actividad';
$string['hotpot:reviewmyattempts'] = 'Ver sus propios intentos en una actividad HotPot';
$string['hotpot:view'] = 'Usar cuestionario';
$string['ignored'] = 'Ignorado';
$string['inprogress'] = 'En curso';
$string['isgreaterthan'] = 'is mayor que';
$string['islessthan'] = 'es menor que';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'Último intento';
$string['lockframe'] = 'Bloquear marco';
$string['mediafilter_hotpot'] = 'Filtro de medios para HotPot';
$string['mediafilter_moodle'] = 'Filtros de medios estándar de Moodle';
$string['migratingfiles'] = 'Migración de los ficheros de cuestionarios de Hot Potatoes';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'Hot Potatoes Quizzes';
$string['nameadd'] = 'Nombre';
$string['nameedit'] = 'Nombre';
$string['nameedit_help'] = 'Texto que se muestra a los estudiantes';
$string['navigation'] = 'Navegación';
$string['navigation_embed'] = 'Página web incrustada';
$string['navigation_frame'] = 'Marco de navegación de Moodle';
$string['navigation_give_up'] = 'Solamente un botón de "Abandonar"';
$string['navigation_none'] = 'Ninguna';
$string['noactivity'] = 'No hay actividad';
$string['nohotpots'] = 'No se han encontrado HotPots';
$string['nomoreattempts'] = 'Lo sentimos, no le quedan más intentos en esta actividad';
$string['noresponses'] = 'No se ha encontrado información sobre preguntas y respuestas individuales.';
$string['noreview'] = 'Lo sentimos, no tiene permiso para ver los detalles de este intento.';
$string['noreviewafterclose'] = 'Lo sentimos, este cuestionario está ya cerrado. No se le permiten ver los detalles de este intento.';
$string['noreviewbeforeclose'] = 'Lo sentimos, este cuestionario está ya cerrado. No se le permite ver los detalles de este intento hasta {$a}';
$string['outputformat'] = 'Formato de salida';
$string['outputformat_best'] = 'el mejor posible';
$string['outputformat_help'] = 'El formato de salida especifica cómo se presentará el contenido al estudiante.

Los formatos de salida disponibles dependen del tipo de archivo de origen. Algunos tipos de archivos de origen tienen solo un formato de salida, mientras que otros tienen varios.

"El mejor posible" mostrará el contenido usando el formato de salida más óptimo según el navegador del estudiante.';
$string['penalties'] = 'Penalizaciones';
$string['percent'] = 'Porcentaje';
$string['pluginadministration'] = 'Administración de HotPot';
$string['pluginname'] = 'Hot Potatoes Quiz';
$string['questionshort'] = 'Q-{$a}';
$string['removegradeitem'] = 'Eliminar ítem de calificación';
$string['score'] = 'Puntuación';
$string['sourcefile'] = 'Nombre del archivo origen';
$string['status'] = 'Estado';
$string['stopbutton'] = 'Mostrar botón de parada';
$string['stopbutton_langpack'] = 'Desde el pack de idioma';
$string['stopbutton_specific'] = 'Usar texto específico';
$string['stoptext'] = 'Texto del botón de parada';
$string['studentfeedback'] = 'Retroalimentación estudiante';
$string['subplugintype_hotpotattempt'] = 'Formato de salida';
$string['subplugintype_hotpotattempt_plural'] = 'Formatos de salida';
$string['subplugintype_hotpotreport'] = 'Informe';
$string['subplugintype_hotpotreport_plural'] = 'Informes';
$string['subplugintype_hotpotsource'] = 'Archivo de origen';
$string['subplugintype_hotpotsource_plural'] = 'Archivos de origen';
$string['textsourcefile'] = 'Obtener del archivo de origen';
$string['textsourcefilename'] = 'Usar nombre de archivo';
$string['textsourcefilepath'] = 'Usar ruta de archivo';
$string['textsourcequiz'] = 'Obtener de cuestionario';
$string['textsourcespecific'] = 'Texto específico';
$string['timeclose'] = 'Disponible hasta';
$string['timedout'] = 'Se acabó el tiempo';
$string['timelimit'] = 'Tiempo límite';
$string['timelimitexpired'] = 'El tiempo límite para este intento ha finalizado';
$string['timelimit_help'] = 'Esta configuración especifica la duración máxima de un intento.

**Usar la configuración en el archivo fuente/ plantilla**
: el límite de tiempo se tomará a partir del archivo fuente o de los archivos de plantilla para el formato de salida

**Usar tiempo específicado**
: se utilizará el tiempo límite especificado en la página de configuración de la pregunta HotPot. Este ajuste anula los límites de tiempo del archivo fuente, archivo de configuración o archivos de plantilla para este formato de salida.

**Desactivar**
: no se establece sin límite de tiempo en esta pregunta

Tenga en cuenta que si el intento se reinicia, el temporizador continuará desde donde se detuvo previamente el intento.';
$string['timelimitspecific'] = 'Usar tiempo específicado';
$string['timelimitsummary'] = 'Tiempo límite para un intento';
$string['timelimittemplate'] = 'Usar la configuración en el archivo fuente/ plantilla';
$string['timeopen'] = 'Disponible desde';
$string['timeopenclose'] = 'Tiempos de apertura y cierre';
$string['timeopenclose_help'] = 'Puede especificar las horas en las que el cuestionario es accesible para que se pueda responder. Antes de la hora de apertura, y después de la hora de cierre, el cuestionario no estará disponible.';
$string['title'] = 'Título';
$string['viewreports'] = 'Ver informes de {$a} usuarios';
$string['views'] = 'Vistas';
$string['weighting'] = 'Ponderación';
$string['wrong'] = 'Incorrecto';
$string['zeroduration'] = 'Sin duración';
$string['zeroscore'] = 'Puntuación cero';
