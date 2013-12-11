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
 * Strings for component 'hotpot', language 'es', branch 'MOODLE_22_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonado';
$string['activitygrade'] = 'Calificación de la actividad';
$string['added'] = 'Añadido';
$string['addquizchain'] = 'Añadir cadena de preguntas';
$string['addquizchain_help'] = '¿Se deben añadir todas las preguntas de una cadena de preguntas?

**No**
:solo una pregunta se añadirá al curso

**Sí**
:si el archivo origen es un **archivo de pregunta**, se considerará como el principio de una cadena de preguntas y todas las preguntas de la cadena se añadirán al curso con la misma configuración. Cada pregunta de la cadena debe tener un enlace al siguiente archivo de la cadena.

Si el archivo origen es una **carpeta**, todas las preguntas identificadas dentro de la carpeta se agregarán al curso para formar una cadena de preguntas con la misma configuración.

Si el archivo origen es una **unidad**, como un archivo del tipo Masher de HotPotatoes o index.html, las preguntas que figuran en el archivo de la unidad se añadirán al curso como una cadena de preguntas con la misma configuración.';
$string['allowreview'] = 'Permitir revisión';
$string['allowreview_help'] = 'Si se activa, los estudiantes podrán revisar sus intentos después de que el cuestionario está cerrado.';
$string['analysisreport'] = 'Análisis de elementos';
$string['attemptlimit'] = 'Límite de intentos';
$string['attemptlimit_help'] = 'Número máximo de intentos que un estudiante puede tener en una actividad HotPot';
$string['attemptnumber'] = 'Número de intentos';
$string['attempts'] = 'Intentos';
$string['attemptscore'] = 'Puntuación de intentos';
$string['attemptsunlimited'] = 'Intentos ilimitados';
$string['average'] = 'Promedio';
$string['averagescore'] = 'Puntuación media';
$string['cacherecords'] = 'Registros del caché de HotPot';
$string['canrestartquiz'] = 'Sus resultados hasta este momento se guardarán y podrá retomar "{$a}", más adelante';
$string['canrestartunit'] = 'Sus resultados hasta el momento se guardará pero si quiere retomar esta actividad de nuevo más tarde deberá comenzarla dese el principio.';
$string['canresumequiz'] = 'Sus resultados hasta el momento se guardará y podrá continuar "{$a}" más adelante.';
$string['checks'] = 'Comprobaciones';
$string['checksomeboxes'] = 'Por favor, marque alguna casilla';
$string['clearcache'] = 'Limpiar el caché de HotPot';
$string['cleardetails'] = 'Limpiar detalles de HotPot';
$string['clearedcache'] = 'El caché de HotPot se ha limpiado';
$string['cleareddetails'] = 'Los detalles de HotPot se han limpiado';
$string['clickreporting'] = 'Habilitar informe por clic';
$string['clickreporting_help'] = 'Si está activado, se mantiene un registro separado cada vez se hace clic en un botón del tipo "hint", "Pista" o "Comprobar". Esto permite que el profesor pueda ver un informe muy detallado que muestra el estado de la pregunta con cada clic. De lo contrario, solo se conserva un registro por intento en cada pregunta.';
$string['clicktrailreport'] = 'Rastror de los clics';
$string['closed'] = 'Esta actividad se ha cerrado';
$string['clues'] = 'Pistas';
$string['completed'] = 'Completado';
$string['configenablecache'] = 'Mantener un caché de las preguntas de HotPot puede incrementar sustancialmente la velocidad de entrega de las preguntas a los estudiantes';
$string['configenablecron'] = 'Especificar la hora de su zona horaria en la que el script del cron de HotPot puede ejecutarse';
$string['configenablemymoodle'] = 'Este valor controla si HotPot se lista o no en la página MyMoodle i';
$string['configenableobfuscate'] = 'Ofuscar el código javascript al insertar reproductores multimedia hace que sea más difícil determinar el nombre del archivo multimedia y adivinar lo que contiene el archivo.';
$string['configenableswf'] = 'Permite incorporar archivos SWF en las actividades de HotPot. Si está habilitado, este valor sobrescribe a filter_mediaplugin_enable_swf.';
$string['configfile'] = 'Fichero de configuración';
$string['configframeheight'] = 'Cuando se muestra una pregunta dentro de un marco, este valor es la altura (en píxeles) de la parte superior del marco que contiene la barra de navegación de Moodle.';
$string['configlocation'] = 'Localización del fichero de configuración';
$string['configlockframe'] = 'Si esta opción está habilitada, entonces el marco de navegación, si se usa, se bloquea para que no se puede deslizar, cambiar de tamaño y tener bordes.';
$string['configmaxeventlength'] = 'Si un HotPorr tiene especificadas una hora de apertura y otra de cierre abierta, y la diferencia entre las dos horas es mayor que el número de días especificado aquí, entonces dos eventos diferentes del calendario se añadirán al calendario del curso. Para tiempos inferiores, o cuando sólo se especifica una de las horas, se añadirá solo sólo un evento al calendario. Si no se especifica ninguna hora, no se añadirá ningún evento al calendario.';
$string['configstoredetails'] = 'Si esta opción está activada, los datos XML sin procesar de los intentos de HotPot se almacenarán en la tabla hotpot_details. Esto permite que los intentos de las preguntas puedan ser recalificados en el futuro para reflejar los cambios en el sistema de puntuaciones de HotPot. Sin embargo, habilitar esta opción en un sitio muy utilizado hará que la tabla de hotpot_details crezca muy rápidamente.';
$string['confirmdeleteattempts'] = '¿Está seguro que quiere borrar estos intentos?';
$string['confirmstop'] = '¿Está seguro que quiere salir fuera de esta página?';
$string['correct'] = 'Correcto';
$string['couldnotinsertsubmissionform'] = 'No insertar formulario de presentación';
$string['delay1'] = 'Retraso 1';
$string['delay1_help'] = 'El retraso mínimo entre el primer y el segundo intento';
$string['delay1summary'] = 'Tiempo de retraso entre el primer y el segundo intento';
$string['delay2'] = 'Retraso 2';
$string['delay2_help'] = 'El retraso mñinimo entre intentos después del segundo intento';
$string['delay2summary'] = 'Tiempo de retraso entre los intentos posteriores';
$string['delay3'] = 'Retraso 3';
$string['delay3afterok'] = 'Esperar hasta que el alumno haga clic en OK';
$string['delay3disable'] = 'NO continuar automáticamente';
$string['delay3_help'] = 'El parámetro especifica el tiempo de espera entre que finaliza el cuestionario y se devuelve el control de visualización a Moodle.

**Usar tiempo especificado (en segundos)**
:se devuelve el control a Moodle después del  número de segundos especificado.

**Usar parámetros del archivo de origen/plantilla**
:se devuelve el control a Moodle después del númerode segundos especificado en el archivo de origen o en el archivo de plantilla para este formato de salida.

**Esperar hasta que el estudiante haga clic en OK**
:
se devuelve el control a Moodle después de que el estudiante haga clic en el botón OK del mensaje de finalización del cuestionario.

**No continuar automáticamente**
: el control no se devuelve a Moodle después de la finalización del cuestioanrio. El estudiante tiene libertad para navegar fuera de la página del cuestionario.

Observe que los resultados del cuestioanrio siempre se envián a Moodle inmediatamente después de que se complete o abandone el custionario, independientemente de este parámetro.';
$string['delay3specific'] = 'Usar el tiempo especificado (en segundos)';
$string['delay3summary'] = 'Tiempo de retraso al final de la pregunta';
$string['delay3template'] = 'Usar parámetros del archivo de origen/plantilla';
$string['deleteattempts'] = 'Borrar intentos';
$string['detailsrecords'] = 'Registro de detalles de HotPot';
$string['d_index'] = 'Índice de discriminación';
$string['duration'] = 'Duración';
$string['enablecache'] = 'Activar el caché de HotPot';
$string['enablecron'] = 'Activar el cron de HotPot';
$string['enablemymoodle'] = 'Mostrar HotPot en MyMoodle';
$string['enableobfuscate'] = 'Activar ofuscación del código de los reproductores multimedia';
$string['enableswf'] = 'Permitir insertar archivos SWF en las actividades HotPot';
$string['entry_attempts'] = 'Intentos';
$string['entrycm'] = 'Actividad previa';
$string['entrycmcourse'] = 'Actividad previa en este curso';
$string['entrycm_help'] = 'Este parámetro especifica una actividad de Moodle y una calificación mínima que se debe alcanzar antes de que este Quizport se pueda intentar.

El profesor puede seleccionar una actividad específica, o uno de los parámetros de propósito general siguientes:

* Actividad previa en el curso
* Actividad previa en esta sección
* HotPot previo en este curso
* HotPot previo en esta sección';
$string['entrycmsection'] = 'Actividad previa en esta sección del curso';
$string['entrycompletionwarning'] = 'Antes de empezar esta actividad, debe mirar {$a}';
$string['entry_dates'] = 'Fechas';
$string['entrygrade'] = 'Calificación de la actividad previa';
$string['entrygradewarning'] = 'No puede iniciar esta actividad hasta que haya alcanzado {$a->entrygrade}% en {$a->entryactivity}. En este momento su calificación para esta actividad es {$a->usergrade}%';
$string['entry_grading'] = 'Calificar';
$string['entryhotpotcourse'] = 'HotPot previo en este curso';
$string['entryhotpotsection'] = 'HotPot previo en esta sección del curso';
$string['entryoptions'] = 'Opciones de la página de entrada';
$string['entryoptions_help'] = 'Estas casillas de verificación activan y desactivan la visualización de los elementos en la página de entrada de HotPot.

**Nombre de unidad como título**
: si se activa, el nombre de la unidad se mostrará como el título de la página de entrada.

**Calificación**
: si se activa, la información de calificación de HotPot se mostrará en la página de entrada.

**Fechas**
: si se activa, las fechas de apertura y cierre del HotPot se mostrarán en la página de entrada.

**Intentos**
: si se activa, se mostrará una tabla con los detalles de los intentos anteriores de usuario en este HotPot en la página de entrada. Los intentos que puedan reiniciarse mostrarán un botón para reiniciar en la columna de la derecha.';
$string['entrypage'] = 'Mostrar página de entrada';
$string['entrypagehdr'] = 'Página de entrada';
$string['entrypage_help'] = '¿Se mostraráa los estudiantes una página inicial antes de comenzar la actividad HotPotr?
**Sí**
:los estudiantes verán una página de entrada antes de iniciar el HotPotr. El contenido de la página de entrada se determina en las opciones de la página de entrada de HotPot.

**No**
:los estudiantes no verán una página de entrada, y se iniciará el HotPot  de inmediato. 

Una página de entrada se mostrará siempre al profesor con el fin de facilitar el acceso a los informes y editar las páginas de preguntas.';
$string['entrytext'] = 'Texto de la página de entrada';
$string['entry_title'] = 'Nombre de la unidad como título';
$string['exit_areyouok'] = '¡Hola, aún está aquí!';
$string['exit_attemptscore'] = 'Su puntuación para este intento fue de {$a}';
$string['exitcm'] = 'Siguiente actividad';
$string['exitcmcourse'] = 'Siguiente actividad en este curso';
$string['exitcm_help'] = 'Este parámetro especifica una actividad Moodle para realizar después de finalizar este Cuestionario.

El profesor puede seleccionar una actividad específica, o una de las siguientes acciones de propósito general:

* Siguiente actividad en este cursos
* Siguiente actividad en esta sección
* Siguiente HotPot en  este curso
* Siguiente HotPot en esta sección

Si las demás opciones de la página de salida están deshabilitadas, el alumno irá directamente a la siguiente actividad. De lo contrario, el alumno verá un enlace que lo llevara a la siguiente actividad cuando esté listo.';
$string['exitcmsection'] = 'Siguiente actividad en esta sección del curso';
$string['exit_course'] = 'Curso';
$string['exit_course_text'] = 'Volver a la página principal del curso';
$string['exit_encouragement'] = 'Valoración';
$string['exit_excellent'] = '¡Excelente!';
$string['exit_feedback'] = 'Salir de la página de retroalimentación';
$string['exit_feedback_help'] = 'Esta opción habilita y deshabilita la visualización de los elementos de retroalimentación en la página de salida de HotPot.

**Nombre de la unidad como título**
: si se activa, el nombre de la unidad se moistrará como el título de la página de salida.

**Valoración**
: si se activa, se mostrará una valoración en la página de salida. La valoración dependerá de la calificación del HotPot:
: **> 90%**: ¡Excelente!
: **> 60%**: ¡Muy Bien!
: **> 0%**: ¡Buen intento!
: **= 0%**: ¿Está de acuerdo?

**Calificación del intento**
: si se activa, la calificación para el intento que se acaba de completar se mostrará en la página de salida

**Calificación**
: si se activa, la calificación del HotPot se mostrará en la página de salida.

Además, si el método de calificación es \'la más alta\', se mostrará un mensaje indicando al usuario si el intento más reciente ha sido igual o mejor que el anterior.';
$string['exit_goodtry'] = '¡Buen intento';
$string['exit_grades'] = 'Calificaciones';
$string['exit_grades_text'] = 'Mire sus calificaciones en este curso hasta el momento';
$string['exithotpotcourse'] = 'Próximo HotPot en este curso';
$string['exit_hotpotgrade'] = 'Su calificación para esta actividad es {$a}';
$string['exit_hotpotgrade_average'] = 'Su califiación media hasta el momento para esta actividad es {$a}';
$string['exit_hotpotgrade_highest'] = 'Su califiación más alta hasta el momento para esta actividad es {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Igualó su mejor puntuación para esta actividad';
$string['exit_hotpotgrade_highest_previous'] = 'Su califiación anterior más alta para esta actividad fue{$a}';
$string['exit_hotpotgrade_highest_zero'] = 'No ha alcanzado puntuaciónes más altas que {$a} en esta actividad';
$string['exithotpotsection'] = 'Próximo HotPot en esta sección del curso';
$string['exit_index'] = 'Índice';
$string['exit_index_text'] = 'Ir al índice de actividades';
$string['exit_links'] = 'Salir de la página de enlaces';
$string['exit_links_help'] = 'Esta opción habilita y deshabilita que se muestren algunos enlaces en la página de salida de HotPot.

**Reintentar**
: si se permiten varios intentos en este HotPot y a los alumnos aún les quedan intentos pendientes, se mostrará un enlace permitiendo a los alumnos volver a intentar el HotPot.

**Índice**
: si se activa, se mostrará un enlace a la página de índice del HotPot

**Curso**
: si se activa, se mostrará un enlace a la página del cursos Moodle.

**Calificaciones*
: Si se activa, se mostrará un enlace a la página de calificaciones de Moodle.';
$string['exit_next'] = 'Siguiente';
$string['exit_next_text'] = 'Intentar la siguiente actividad';
$string['exit_noscore'] = '¡Ha completado con éxito esta actividad!';
$string['exitoptions'] = 'Opciones de la página de salida';
$string['exitpage'] = 'Mostrar página de salida';
$string['exitpagehdr'] = 'Página de salida';
$string['exitpage_help'] = '¿Se mostrará una página de salida después de que se haya completado el ejercicio HotPot? 

**Sí**:
se mostrará a los alumnos una página de salida cuando el Hotpot se haya completado. El contenido de la página de salida se determina mediante los ajustes de retroalimentación y enlaces de la página de salida de Hotpot.

**No**:
no se mostrara a los estudiantes página de salida. En su lugar, podrán ir a la siguiente actividad o volver a la página del curso de Moodle.';
$string['exit_retry'] = 'Reintentar';
$string['exit_retry_text'] = 'Reintentar esta actividad';
$string['exittext'] = 'Texto de la página de salida';
$string['exit_welldone'] = '¡Bien hecho!';
$string['exit_whatnext_0'] = '¿Qué quiere hacer ahora?';
$string['exit_whatnext_1'] = 'Elija su destino...';
$string['exit_whatnext_default'] = 'Por favor, elija uno de los siguientes:';
$string['feedbackdiscuss'] = 'Dicutir sobre esta pregunta en un foro';
$string['feedbackformmail'] = 'Formulario de retroalimentación';
$string['feedbackmoodleforum'] = 'Foro de Moodle';
$string['feedbackmoodlemessaging'] = 'Mensajería de Moodle';
$string['feedbacknone'] = 'No';
$string['feedbacksendmessage'] = 'Enviar un mensjae a su instructor';
$string['feedbackwebpage'] = 'Página web';
$string['firstattempt'] = 'Primer intento';
$string['forceplugins'] = 'Forzar plugins multimedia';
$string['forceplugins_help'] = 'Si se activa, los reproductores multimedia compatibles con Moodle podrán reproducir archivos tales como AVI, MPEG, MPG, MP3, MOV y WMV. De lo contrario, Moodle no modificará la configuración de ningún reproductor de medios.';
$string['frameheight'] = 'Altura del amrco';
$string['giveup'] = 'Abandonar';
$string['grademethod'] = 'Método de calificación';
$string['grademethod_help'] = 'Este parámetro define cómo se calcula la calificación del HotPot a partir de las puntuaciones de los intentos.

**Puntuación más alta**:
La calificación se determina según la calificación más alta obtenida en los diferentes intentos realizados en esta actividad HotPot.

**Puntuación media**:
La calificación se determina según la calificación media alta obtenida en los diferentes intentos realizados en esta actividad HotPot.

**Primer intento**
La calificación se determina según la calificación obtenida en el primer intento realizadosen esta actividad HotPot.

**Ültimo intento**
La calificación se determina según la calificación obtenida en el últimointento realizado en esta actividad HotPot.';
$string['gradeweighting'] = 'Ponderación de calificaciones';
$string['gradeweighting_help'] = 'Las calificaciones para esta actividad HotPot se harán proporcioanles a este número en el libro de calificaciones de Moodle.';
$string['highestscore'] = 'Puntuación más alta';
$string['hints'] = 'Ayudas';
$string['hotpot:attempt'] = 'Realizar una actividad HotPot y presentar resultados';
$string['hotpot:deleteallattempts'] = 'Eliminar cualquier intento de usuario en la actividad HotPot';
$string['hotpot:deletemyattempts'] = 'Eliminar sus propios intentos en la actividad HotPot';
$string['hotpot:ignoretimelimits'] = 'Ignorar los límites de tiempo en las activdad HotPot';
$string['hotpot:manage'] = 'Cambiar la configuración de una actividad HotPot';
$string['hotpotname'] = 'Nombre de la actividad HotPot';
$string['hotpot:preview'] = 'Previsualizar una actividad HotPot';
$string['hotpot:reviewallattempts'] = 'Ver los intentos de cualquier usuario en una actividad HotPot';
$string['hotpot:reviewmyattempts'] = 'Ver sus propios intentos en una actividad HotPot';
$string['hotpot:view'] = 'Ver la página de entrada de una actividad HotPot';
$string['ignored'] = 'Ignorado';
$string['inprogress'] = 'En curso';
$string['isgreaterthan'] = 'es mayor que';
$string['islessthan'] = 'es menor que';
$string['lastaccess'] = 'Último acceso';
$string['lastattempt'] = 'Último intentro';
$string['lockframe'] = 'Bloquear marco';
$string['maxeventlength'] = 'Número máximo de días para un único evento de caledario';
$string['mediafilter_hotpot'] = 'Filtro multimedia de HotPot';
$string['mediafilter_moodle'] = 'Filtros multimedia estándar de Moodle';
$string['migratingfiles'] = 'Migrando archivos de pregunta de Hot Potatoes';
$string['missingsourcetype'] = 'A este HotPot le falta el tipo de archivo';
$string['modulename'] = 'HotPot';
$string['modulenameplural'] = 'HotPot';
$string['nameadd'] = 'Mombre';
$string['nameadd_help'] = 'El nombre puede ser un texto específico introducido por el profesor o puede ser generado de forma automática.

**Del fichero origen**
: el nombre se extrae del fichero origen.

**Nombre del archivo origen**
: se usuará el nombre del archivo de origen

**Ruta del archivo de origen**
: se usuará la ruta del archivo (path) de origen. Las barras (/) de la ruta se sustituyen por espacios.

**Texto específico**
: se usará el texto introducido por el usuario.';
$string['nameedit'] = 'Nombre';
$string['nameedit_help'] = 'El texto específico que se muestra a los estudiantes';
$string['navigation'] = 'Navegación';
$string['navigation_embed'] = 'Página web incrustada';
$string['navigation_frame'] = 'Marco de navegación de Moodle';
$string['navigation_give_up'] = 'Solamente un botón de "Abandonar"';
$string['navigation_help'] = 'Este parámetro especifica el tipo de navegación usaso en el cuestionario:

** Barra de navegación Moodle**
: la barra de navegación de Moodle se muestra en la misma ventana que el cuestionario, en la parte superior de la página.

** Marco de navegación Moodle**
: la barra de navegación Moodle se muestra en un marco diferente, en la parte superior del cuestionario.

** Página web incrustada**
: la barra de navegación de Moodle se muestra dentro del cuestionario Hot Potatoes, incrustada dentro de la ventana.

** Ayudas de navegación originales**
: el cuestionario se muestra con los botones de negación, si los hay, definidos en el cuestionario.

**Un único botón "Abandonar" **
: el cuestionario mostrará un único botón "Abandonar" en la parte superior de la página

**Nada**
: se mostrará el cuestionario sin ayudas de navegación, de manera que cuando todas las preguntas hayan sido respondidas correctamente, dependiendo del parámetro "¿Mostrar la siguiente pregunta?", Moodle volverá a la página del curso o mostrará el siguiente cuestionario.';
$string['navigation_moodle'] = 'Barras de navegación estándar de Moodle (superior y lateral)';
$string['navigation_none'] = 'Ninguna';
$string['navigation_original'] = 'Ayudas de navegación originales';
$string['navigation_topbar'] = 'Solo barra de navegación superior de Moodle (sin barras lateral)';
$string['noactivity'] = 'No hay actividad';
$string['nohotpots'] = 'No se ha encontrado HotPot';
$string['nomoreattempts'] = 'Lo sentimos, no le queda intentos en esta actividad';
$string['noresponses'] = 'No se ha encontrado información sobre preguntas y respuestas individuales.';
$string['noreview'] = 'Lo sentimos, no tiene permiso para ver los detalles sobre este intento de pregunta.';
$string['noreviewafterclose'] = 'Lo sentimos, esta pregunta se ha cerrado. No tiene permiso para ver los detalles de este intento.';
$string['noreviewbeforeclose'] = 'Lo sentimos, no tiene permsio para ver los detalles de ese intento de pregunta hasta {$a}';
$string['nosourcefilesettings'] = 'A este HotPot le falta la información de archivo';
$string['notavailable'] = 'Lo sentimos, esta actividad no está actualmente disponible para usted.';
$string['outputformat'] = 'Formato de salida';
$string['outputformat_best'] = 'El mejor posible';
$string['outputformat_help'] = 'El formato de salida especifica cómo se presentará el contenido al estudiante.

Los formatos de salida disponibles dependen del tipo de archivo de origen. Algunos tipos de archivos de origen tienen solo un formato de salida, mientras que otros tienen varios.

"El mejor posible" mostrará el contenido usando el formato de salida más óptimo según el navegado del estudiante.';
$string['overviewreport'] = 'Información general';
$string['penalties'] = 'Penalizaciones';
$string['percent'] = 'Porcentage';
$string['pluginadministration'] = 'Administración HotPot';
$string['pluginname'] = 'Módulo HotPot';
$string['pressoktocontinue'] = 'Presione OK para cotinuar, o Cancelar para permanecer en la página actual.';
$string['questionshort'] = 'Q-{$a}';
$string['quizname_help'] = 'texto de ayuda para el nombre del cuestionario';
$string['quizzes'] = 'Preguntas';
$string['removegradeitem'] = 'Eliminar ítem de calificación';
$string['removegradeitem_help'] = '¿Se puede eliminar el elemento de calificación para esta actividad? 

**No**
:el elemento de calificación para esta actividad en el libro de calificaciones de Moodle no se eliminará 

**Sí**
: si la calificación máxima o la ponderación de calificaciones para este HotPot se ajusta a cero, entonces el elemento de calificación para esta actividad será eliminado del libro de calificaciones de Moodle.';
$string['responsesreport'] = 'Respuestas';
$string['score'] = 'Puntuación';
$string['scoresreport'] = 'Puntuaciones';
$string['selectattempts'] = 'Seleccione intentos';
$string['showerrormessage'] = 'Error HotPot: {$a}';
$string['sourcefile'] = 'Nombre del fichero origen';
$string['sourcefile_help'] = 'Este parámetro especifica el archivo que contiene el contenido que se mostrará a los estudiantes.

Por lo general, el archivo de origen se ha creado fuera de Moodle, y luego se  ha subido a la zona de archivos de un curso de Moodle. 
Puede tratarse de un archivo html o de otro tipo de archivo que ha sido creado con software de autoría, como Hot Potatoes o Qedoc. 

El archivo de origen puede ser especificado como una ruta de archivo en una carpeta en la zona de archivos del curso Moodle, o puede serlo con una URL que comienza con http:// o https:// 

Para materiales Qedoc, el archivo de origen debe ser la url de un módulo Qedoc que se ha cargado en el servidor Qedoc.

* ejemplo: http://www.qedoc.net/library/ABCDE_123.zip
* Para información sobre cómo subir módulos Qedoc, ver la documentación Qedoc: Uploading_modules {http://www.qedoc.org/en/index.php?title=Uploading_modules}';
$string['sourcefilenotfound'] = 'Fichero de origen no encontrado (o vacío): {$a}';
$string['status'] = 'Estado';
$string['stopbutton'] = 'Mostrar botón de parada';
$string['stopbutton_help'] = 'Si este parámetro está activado, un botón de parada se insertará dentro del la pregunta.

Si el estudiante hace clic en el botón de parada, el resultado obtenido hasta el momento se enviará a Moodle y el estado del intento de pregunta se establecerá en Abandonada.';
$string['stopbutton_langpack'] = 'Del paquete de idioma';
$string['stopbutton_specific'] = 'Usar texto específico';
$string['stoptext'] = 'Texto del botón de parada';
$string['storedetails'] = 'Almacenar los datos XML con los detalles de los intentos de la pregunta HotPot';
$string['studentfeedback'] = 'Retroalimentación estudiante';
$string['studentfeedback_help'] = 'Si está activado, un enlace a una ventana de información emergente se mostrará cada vez que el estudiante hace clic en el botón "Comprobar". La ventana de retroalimentación permite a los estudiantes discutir sobre este cuestionario con su profesor y suscompañeros de clase, según una de las siguientes maneras:

**Página web**
: requiere la URL de la página web, por ejemplo, http://myserver.com/feedbackform.html

**Formulario de retroalimentación**
: requiere la URL del formulario, por ejemplo, http://myserver.comcgi-bin/formmail.pl

**Foro de Moodle**
: se mostrará el índice de foros del curso

**Mensaje Moodle**
: se mostrará la ventana de mensajería instantánea de Moodle. Si el cursos tiene varios profesores, el estudiante podrá elegir un profesor antes de que se visualize la ventana de mensajes.';
$string['submits'] = 'Envíos';
$string['textsourcefile'] = 'Obtener del archivo de origen';
$string['textsourcefilename'] = 'Usar el nombre del archivo origen';
$string['textsourcefilepath'] = 'Usar la ruta del archivo origen';
$string['textsourcequiz'] = 'Obtener de cuestionario';
$string['textsourcespecific'] = 'Texto específico';
$string['timeclose'] = 'Disponible hasta';
$string['timedout'] = 'Tiempo límite';
$string['timelimit'] = 'Tiempo límite';
$string['timelimitexpired'] = 'El tiempo límite para este intento ha expirado';
$string['timelimit_help'] = 'Este parámetro especifica la duración máxima de un solo intento.

**Usar parámetros del archivo de origen/plantilla**
: el tiempo límite se tomará del archivo origen o del archivo de plantilla para este formato de salida.

**Usar tiempo específico**
: se usará como tiempo límite para un intento el especificado en la página de configuración de los parámetros del cuestionario HotPot. Este parámetro sobreescribe el tiempo límite de la configuración del archivo origen o del archivo de plantilla para este formato de salida.

**Deshabilitado**
: no se establece tiempo límite para los intentos en este cuestionario.

Observe que si un intento se reanuda,  el temporizador continúa desde donde previamente se detuvo el intento.';
$string['timelimitspecific'] = 'Usar tiempo específico';
$string['timelimitsummary'] = 'Tiempo límite para un intento';
$string['timelimittemplate'] = 'Usar parámetros del archivo de origen/plantilla';
$string['timeopen'] = 'Disponible de';
$string['timeopenclose'] = 'Tiempos de apertura y cierre';
$string['timeopenclose_help'] = 'Puede especificar en qué horario el cuestionario está disponible para aquellas personas que quieran hace un intento. Antes de la apertura, y después de la hora de cierre, el cuestionario no estará disponible.';
$string['title'] = 'Título';
$string['title_help'] = 'Este ajuste especifica el título que se mostrará en la página web. 

** Nombre de la actividad HotPot** 
: se muestra como título de la página web el nombre de esta actividad HotPot. 

** Obtener del fichero origen **
: se muestra como título de la página web el definido en el archivo origen. 

**Nombre del archivo origen**
: se muestra como título de la página web el nombre del archivo origen

**Usar ruta de archivo origen**
: se muestra como título de la página web la ruta del archivo origen, incluyendo los nombres de carpeta.';
$string['unitname_help'] = 'texto de ayuda para el nombre';
$string['updated'] = 'Actualizado';
$string['usefilters'] = 'Usar filtros';
$string['usefilters_help'] = 'Si este parámetro está activado, el contenido pasará a través de los filtros de Moodle antes de ser enviado al navegador.';
$string['useglossary'] = 'Usar glosario';
$string['useglossary_help'] = 'Si este parámetro está activado, el contenido pasará a través del filtro de Moodle Autoenlace del Glosario, antes de ser enviado al navegador.';
$string['usemediafilter'] = 'Usar filtro multimedia';
$string['usemediafilter_help'] = 'Este parámetro especifica el filtro multimedia que se usará.

**Ninguno**
: el contenido no pasa por ningún filtro multimedia.

**Filtros multimedia estándar de Moodle**
: el contenido pasa a través de los filtros estándar de Moodle. Estos filtros buscan enlaces a los tipos más habituales de archvivos de vídeo y sonido, y convierten esos enlaces a los
reproductores adecuados.

**Filtros multimedia HotPot**
: el contenido pasa por filtros que detectan enlaces, imágenes, sonidos y videos que se especifican usando una notación entre corchetes. La notación con corchetes tiene la siguiente sintaxis: <code>[url player width height options]</code>

**URL**
: la url absoluta o relativa del archivo
Reproductor** (opcional)
: el nombre del reproductor a insertar. El valor por defecto de este parámetro es "moodle". La versión estándar del módulo HotPot también ofrece los sigueintes reproductores:
: **dew**: reproductor mp3
: **dyer**: reproductor mp3 de Bernard Dyer
: **hbs**: reproductor mp3 de Half-Baked Software 
: **imagen**: insertar una imagen en la página web 
: **enlace**: insertar un enlace en otra página web

**anchura** (opcional)
: la anchura requerida por el reproductor

**altura** (opcional)
: la altura requerida por el reproductor. Si se omite este valor, se establece el mismo valor que la anchura

**opciones** (opcional)
: se pasa al reproductor una lista de opciones, separada por comas. Cada opción debe ser un conector "on/off", o u par de valores
: **nombre=valor
: **nombre="algun valor con espacios"';
$string['utilitiesindex'] = 'Índice de utilidades HotPot';
$string['viewreports'] = 'Ver informes para los usuarios {$a}';
$string['views'] = 'Vistas';
$string['weighting'] = 'Ponderación';
$string['wrong'] = 'Incorrecto';
$string['zeroduration'] = 'Sin duración';
$string['zeroscore'] = 'Puntuación cero';
