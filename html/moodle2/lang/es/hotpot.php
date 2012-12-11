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
 * Strings for component 'hotpot', language 'es', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado';
$string['activitygrade'] = 'Calificación de la actividad';
$string['addquizchain'] = 'Agregar cadena de preguntas';
$string['allowreview'] = 'Permitir revisión';
$string['allowreview_help'] = 'Si se activa, los estudiantes podrán revisar sus intentos después de que el cuestionario está cerrado.';
$string['average'] = 'Promedio';
$string['checks'] = 'Comprobaciones';
$string['clickreporting'] = 'Habilitar informe por clic';
$string['clues'] = 'Pistas';
$string['completed'] = 'Finalizada';
$string['configenableobfuscate'] = 'Ofuscar el código javascript que permite insertar reproductores de medios hace que sea más difícil determinar el nombre y adivinar lo que contiene el archivo.';
$string['configmaxeventlength'] = 'Si un HotPot tiene especificadas una hora de apertura y otra de cierre, y la diferencia entre las dos es mayor que el número de días especificado aquí, entonces se añadirán dos eventos diferentes al calendario del curso. Para periodos de tiempo inferiores, o cuando sólo se especifica una de las horas, se añadirá solo un evento al calendario. Si no se especifica ninguna hora, no se añadirá ningún evento al calendario.';
$string['configstoredetails'] = 'Si esta opción está activada, los datos XML sin procesar de los intentos de los cuestionarios HotPot se almacenan en la tabla hotpot_details. Esto permite que los intentos puedan ser recalificados posteriormente para reflejar cambios en el sistema de puntuación de los cuestionarios HotPot. Sin embargo, activar esta opción en un sitio con mucha actividad hará que la tabla hotpot_details crezca muy rápidamente.';
$string['correct'] = 'Correcto';
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
$string['delay3template'] = 'Usar la configuración del archivo de origen/plantilla';
$string['entrygrade'] = 'Calificación previa de la actividad';
$string['entrypage_help'] = '¿Se mostrará a los estudiantes una página inicial antes de comenzar la actividad HotPot?
**Sí**
:los estudiantes verán una página de entrada antes de iniciar el HotPot. El contenido de la página de entrada se determina en las opciones de la página de entrada de HotPot.

**No**
:los estudiantes no verán una página de entrada, y se iniciará el HotPot  de inmediato.

Una página de entrada se mostrará siempre al profesor con el fin de facilitar el acceso a los informes y editar las páginas de preguntas.';
$string['exit_grades'] = 'Calificaciones';
$string['exit_links'] = 'Salir de la página de enlaces';
$string['exit_whatnext_1'] = 'Elija su destino...';
$string['feedbackformmail'] = 'Formulario de retroalimentación';
$string['feedbackmoodleforum'] = 'Foro de Moodle';
$string['feedbackmoodlemessaging'] = 'Mensajería de Moodle';
$string['feedbacknone'] = 'No';
$string['feedbackwebpage'] = 'Página web';
$string['forceplugins'] = 'Forzar plugins multimedia';
$string['forceplugins_help'] = 'Si se activa, los reproductores multimedia compatibles con Moodle podrán reproducir archivos tales como AVI, MPEG, MPG, MP3, MOV y WMV. De lo contrario, Moodle no modificará la configuración de ningún reproductor de medios.';
$string['frameheight'] = 'Altura del marco';
$string['giveup'] = 'Abandonar';
$string['hints'] = 'Ayudas';
$string['hotpot:attempt'] = 'Contestar un cuestionario';
$string['hotpot:view'] = 'Usar cuestionario';
$string['ignored'] = 'Ignorado';
$string['inprogress'] = 'En curso';
$string['mediafilter_hotpot'] = 'Filtro de medios para HotPot';
$string['mediafilter_moodle'] = 'Filtros de medios estándar de Moodle';
$string['migratingfiles'] = 'Migración de los ficheros de cuestionarios de Hot Potatoes';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'Hot Potatoes Quizzes';
$string['navigation'] = 'Navegación';
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
