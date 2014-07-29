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
 * Strings for component 'lesson', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   lesson
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Control de acceso';
$string['actionaftercorrectanswer'] = 'Acción posterior a la respuesta correcta';
$string['actionaftercorrectanswer_help'] = 'Después de contestar correctamente una pregunta, hay 3 opciones para la página siguiente:

* Normal - Se sigue el itinerario de la lección
* Mostrar una página no vista  - Las páginas se muestran en un orden aleatorio, sin que ninguna página se muestre dos veces
* Mostrar una página aún no respondida - Las páginas se muestran en un orden aleatorio, de manera que las páginas que contienen preguntas sin respuesta se muestra de nuevo';
$string['actions'] = 'Acciones';
$string['activitylink'] = 'Enlace a una actividad';
$string['activitylink_help'] = '<p>El menú emergente contiene todas las actividades del curso. Si se selecciona una de ellas, al final de la        lección aparecerá un enlace a dicha actividad.</p>';
$string['activitylinkname'] = 'Ir a {$a}';
$string['activityoverview'] = 'Tiene lecciones pendientes';
$string['addabranchtable'] = 'Añadir una página de contenido';
$string['addanendofbranch'] = 'Añadir un final de ramificación';
$string['addanewpage'] = 'Añadir una nueva página';
$string['addaquestionpage'] = 'Añadir una página de pregunta';
$string['addaquestionpagehere'] = 'Añadir aquí una página de pregunta';
$string['addbranchtable'] = 'Añadir una página de contenido';
$string['addcluster'] = 'Añadir un clúster';
$string['addedabranchtable'] = 'Añadida una página de contenido';
$string['addedanendofbranch'] = 'Añadido un final de ramificación';
$string['addedaquestionpage'] = 'Añadida una página de preguntas';
$string['addedcluster'] = 'Añadido un clúster';
$string['addedendofcluster'] = 'Añadido un final de clúster';
$string['addendofcluster'] = 'Añadir un final de clúster';
$string['addpage'] = 'Añadir una página';
$string['anchortitle'] = 'Comienzo del contenido principal';
$string['and'] = 'Y';
$string['answer'] = 'Respuesta';
$string['answeredcorrectly'] = 'respondidas correctamente.';
$string['answersfornumerical'] = 'Las respuestas a preguntas numéricas deberían ser pares de valores máximo y mínimo';
$string['arrangebuttonshorizontally'] = '¿Disponer horizontalmente los botones de contenido?';
$string['attempt'] = 'Intento: {$a}';
$string['attempts'] = 'Intentos';
$string['attemptsdeleted'] = 'Intentos eliminados';
$string['attemptsremaining'] = 'Tiene {$a} intento(s) pendiente(s)';
$string['available'] = 'Disponible desde';
$string['averagescore'] = 'Puntuación promedio';
$string['averagetime'] = 'Tiempo promedio';
$string['branch'] = 'Contenido';
$string['branchtable'] = 'Contenido';
$string['cancel'] = 'Cancelar';
$string['cannotfindanswer'] = 'Error: no se pudo encontrar la respuesta';
$string['cannotfindattempt'] = 'Error: no se pudo encontrar el intento';
$string['cannotfindessay'] = 'Error: no se pudo encontrar el ensayo';
$string['cannotfindfirstgrade'] = 'Error: no se pudieron encontrar las calificaciones';
$string['cannotfindfirstpage'] = 'No se pudo encontrar la primera página';
$string['cannotfindgrade'] = 'Error: no se pudieron encontrar las calificaciones';
$string['cannotfindnewestgrade'] = 'Error: no se puede encontrar la calificación más reciente';
$string['cannotfindnextpage'] = 'Retroalimentación de la lección: no se pudo encontrar la Página Siguiente';
$string['cannotfindpagerecord'] = 'Añadir un final de ramificación: registro de página no encontrado';
$string['cannotfindpages'] = 'No se han encontrado páginas en la lección';
$string['cannotfindpagetitle'] = 'Confirmar eliminación: título de página no encontrado';
$string['cannotfindpreattempt'] = 'No se ha encontrado el registro de intento previo';
$string['cannotfindrecords'] = 'Error: no se pudieron encontrar los registros de la lección';
$string['cannotfindtimer'] = 'Error: no se pudieron encontrar los registros de lesson_timer';
$string['cannotfinduser'] = 'Error: no se pudieron encontrar los usuarios';
$string['canretake'] = 'Permitir que el {$a} pueda retomar la lección';
$string['casesensitive'] = 'Usar expresiones regulares';
$string['casesensitive_help'] = '<p>Algunos tipos de pregunta tienen una opción que se activa con un clic en cuadro de verificación.  Los tipos de la pregunta y el significado de las opciones son detallados abajo.

<ol>
<li><p><b>Elección múltiple</b> Es una variante de las preguntas de Opción
Múltiple llamada de <b>&quot;Elección múltiple y respuestas múltiples"</b>.  Si escoge esta opción en la pregunta entonces requieren que el estudiante seleccione todas las respuestas correctas del conjunto de respuestas.  La pregunta puede o no decir al estudiante <i>cuántas</i> respuestas correctas existen. Por ejemplo "¿Cuáles han sido presidentes de
EE.UU.?", o "Seleccione a dos presidentes de EE.UU. de la siguiente lista.".  El número de respuestas correctas pueden ser de <b>una</b> hasta todas las opciones.  (Una pregunta de Elección múltiples y respuestas múltiples con una respuesta correcta <b>es</b> diferente de una pregunta de Opción Múltiple pues la primera permite al estudiante la posibilidad de elegir más de una respuesta mientras que la última no lo permite.)</p></li>

<li><p><b>Respuesta corta</b> Por defecto, en las comparaciones no se tiene en cuenta si el texto está mayúsculas o minúsculas. Si se selecciona Opción de pregunta  las comparaciones tiene en cuenta si el texto está en mayúsculas o minúsculas.</p></li>

<p>En los otros tipos de preguntas no afecta la Opción de pregunta.</p>';
$string['checkbranchtable'] = 'Comprobar página de contenidos';
$string['checkedthisone'] = 'Comprobada ésta.';
$string['checknavigation'] = 'Revisar navegación';
$string['checkquestion'] = 'Revisar pregunta';
$string['classstats'] = 'Estadísticas de clase';
$string['clicktodownload'] = 'Haga clic en el siguiente enlace para descargar el archivo.';
$string['clicktopost'] = 'Haga clic aquí para enviar su calificación a la lista de mejores puntuaciones.';
$string['cluster'] = 'Cluster';
$string['clusterjump'] = 'Pregunta no vista dentro de un cluster';
$string['clustertitle'] = 'Cluster';
$string['collapsed'] = 'Colapsado';
$string['comments'] = 'Sus comentarios';
$string['completed'] = 'Finalizado';
$string['completederror'] = 'Completar la lección';
$string['completethefollowingconditions'] = 'Para seguir, deberá completar la(s) siguiente(s) condición(es) en la lección <b>{$a}</b>.';
$string['conditionsfordependency'] = 'Condición(es) para la dependencia';
$string['configactionaftercorrectanswer'] = 'Acción predeterminada a ejecutar tras una respuesta correcta';
$string['configmaxanswers'] = 'Número máximo de respuestas por página predeterminado';
$string['configmaxhighscores'] = 'Número de puntuaciones altas a mostrar';
$string['configmediaclose'] = 'Muestra un botón de cierre en el marco de la ventana emergente generada por un archivo multimedia vinculado';
$string['configmediaheight'] = 'Establece la altura de la ventana emergente para mostrar un archivo multimedia enlazado';
$string['configmediawidth'] = 'Establece el ancho de la ventana emergente para mostrar un archivo multimedia enlazado.';
$string['configslideshowbgcolor'] = 'Color de fondo para la presentación de diapositivas si está habilitado';
$string['configslideshowheight'] = 'Establece la altura de la presentación de diapositivas si está habilitado';
$string['configslideshowwidth'] = 'Establece el ancho de la presentación de diapositivas si está habilitado';
$string['confirmdelete'] = 'Eliminar página';
$string['confirmdeletionofthispage'] = 'Confirme que desea eliminar esta página';
$string['congratulations'] = 'Enhorabuena, ha llegado al final de la lección';
$string['continue'] = 'Continuar';
$string['continuetoanswer'] = 'Continuar en cambiar respuestas.';
$string['continuetonextpage'] = 'Continuar en la página siguiente';
$string['correctanswerjump'] = 'Salto a respuesta correcta';
$string['correctanswerscore'] = 'Puntuación de respuesta correcta';
$string['correctresponse'] = 'Comentario (correcto)';
$string['createaquestionpage'] = 'Crear una página de preguntas';
$string['credit'] = 'Crédito';
$string['customscoring'] = 'Puntuación personalizada';
$string['customscoring_help'] = 'Si está habilitada, se puede dar a cada respuesta una puntuación numérica (positiva o negativa).';
$string['deadline'] = 'Fecha final';
$string['defaultessayresponse'] = 'Su ensayo será calificado por su profesor.';
$string['deleteallattempts'] = 'Eliminar todos los intentos de resolver la lección';
$string['deletedefaults'] = 'Eliminada {$a} x lección por defecto';
$string['deletedpage'] = 'Página eliminada';
$string['deleting'] = 'Eliminando';
$string['deletingpage'] = 'Eliminando página: {$a}';
$string['dependencyon'] = 'Dependiente de';
$string['dependencyon_help'] = '<p>Esta opción permite que la lección actual dependa del rendimiento de los estudiantes en otra lección del         mismo curso. Si no alcanza el rendimiento exigido, el estudiante no podrá acceder a esta lección.</p>

<p>Las condiciones de la dependencia incluyen:
    <ul>
        <li><b>Tiempo empleado:</b> el estudiante debe emplear en la lección el tiempo que aquí se señale.</li>
        <li><b>Completa:</b> el estudiante debe completar la lección.</li>
        <li><b>Calificación superior a:</b> el estudiante debe alcanzar en la lección una calificación superior     a la especificada en esta opción.</li>
    </ul>
    Puede usarse cualquier combinación de las opciones anteriores.
</p>';
$string['description'] = 'Descripción';
$string['detailedstats'] = 'Estadísticas detalladas';
$string['didnotanswerquestion'] = 'No ha contestado a esta pregunta.';
$string['didnotreceivecredit'] = 'No ha recibido crédito';
$string['displaydefaultfeedback'] = 'Mostrar retroalimentación por defecto';
$string['displaydefaultfeedback_help'] = '<p align="center"><strong>Mostrar retroalimentación por defecto</strong></p>

<p>Si se ajusta esta opción a <strong>Sí</strong>, cuando no se encuentre una respuesta a una pregunta en particular, se usará por defecto el comentario "Esa es la respuesta correcta" y "Esa es la respuesta incorrecta".</p>
<p>Si la opción se ajusta a <strong>No</strong>, cuando no se encuentre una respuesta a una pregunta en particular, no se mostrarán comentarios de retroalimentación. El usuario que está realizando la lección pasará directamente a la siguiente página de la lección.</p>';
$string['displayhighscores'] = 'Mostrar mejores puntuaciones';
$string['displayinleftmenu'] = '¿Mostrar en menú de la izquierda?';
$string['displayleftif'] = 'Mostrar el menú izquierdo solo si la calificación es mayor que';
$string['displayleftif_help'] = 'Esta configuración determina si un estudiante debe obtener una cierta puntuación para poder ver el menú de la izquierda. Esto obliga al estudiante a pasar por toda la lección en su primer intento y así obtener la puntuación necesaria para poder utilizar el menú de la izquierda para la revisión.';
$string['displayleftmenu'] = 'Mostrar menú de la izquierda';
$string['displayleftmenu_help'] = 'Si está habilitada, se mostrará una lista de páginas.';
$string['displayofgrade'] = 'Mostrar calificación (sólo para estudiantes)';
$string['displayreview'] = 'Proporcionar una opción para tratar de nuevo la pregunta';
$string['displayreview_help'] = 'Si se activa, cuando una pregunta se responde incorrectamente, se le da al estudiante la opción de intentarlo de nuevo sin crédito de puntos, o continuar con la lección.';
$string['displayscorewithessays'] = 'Usted ha obtenido una puntuación de {$a->score} sobre {$a->tempmaxgrade} en las preguntas calificadas automáticamente.

Sus {$a->essayquestions} preguntas de tipo ensayo se calificarán posteriormente y su calificación se añadirá a su calificación final

Su calificación actual sin contar esas preguntas es de is {$a->score} sobre {$a->grade}';
$string['displayscorewithoutessays'] = 'Su puntuación es {$a->score} (sobre {$a->grade}).';
$string['edit'] = 'Edición';
$string['editingquestionpage'] = 'Editando página de preguntas {$a}';
$string['editlessonsettings'] = 'Editar los ajustes de Esta lección';
$string['editpage'] = 'Modificar el contenido de la página';
$string['editpagecontent'] = 'Editar el contenido de esta página';
$string['email'] = 'Email';
$string['emailallgradedessays'] = 'Enviar por email TODOS los<br>ensayos calificados';
$string['emailgradedessays'] = 'Enviar por email los ensayos calificados';
$string['emailsuccess'] = 'Email enviado con éxito';
$string['emptypassword'] = 'La contraseña no puede estar vacía';
$string['endofbranch'] = 'Fin de ramificación';
$string['endofcluster'] = 'Final de cluster';
$string['endofclustertitle'] = 'Fin de cluster';
$string['endoflesson'] = 'Fin de la lección';
$string['enteredthis'] = 'introducido ésta.';
$string['entername'] = 'Escriba un apodo para la lista de mejores puntuaciones';
$string['enterpassword'] = 'Por favor, escriba la contraseña:';
$string['eolstudentoutoftime'] = 'Atención: Usted ha sobrepasado el tiempo fijado para esta lección. Su última respuesta puede no haber sido contabilizada si ha sido dada con el tiempo finalizado.';
$string['eolstudentoutoftimenoanswers'] = 'No ha contestado a ninguna pregunta. En esta lección ha obtenido 0 puntos.';
$string['essay'] = 'Ensayo';
$string['essayemailmessage'] = '<p>Ensayo:<blockquote>{$a->question}</blockquote></p><p>Su respuesta:<blockquote><em>{$a->response}</em></blockquote></p><p>{$a->comment} del profesor:<blockquote><em>{$a->comment}</em></blockquote></p><p>Usted ha recibido {$a->earned} sobre un total de {$a->outof} en esta pregunta de ensayo.</p><p>Su calificación en la lección ha cambiado a {$a->newgrade}%.</p>';
$string['essayemailmessage2'] = '<p>Indicador de ensayo:<blockquote>{$a->question}</blockquote></p><p>Su respueta:<blockquote><em>{$a->response}</em></blockquote></p><p>Comentario del calificador:<blockquote><em>{$a->comment}</em></blockquote></p><p>Ha obtenido {$a->earned} sobre {$a->outof} en esta pregunta de ensayo.</p><p>Su calificación en esta lección ha cambiado a {$a->newgrade}%.</p>';
$string['essayemailsubject'] = 'Su calificación para la pregunta {$a}';
$string['essays'] = 'Ensayos';
$string['essayscore'] = 'Puntuación del ensayo';
$string['fileformat'] = 'Formato de archivo';
$string['finish'] = 'Terminado';
$string['firstanswershould'] = 'de elementos';
$string['firstwrong'] = 'Lo sentimos, usted no puede obtener este punto porque su respuesta no es correcta. ¿Desea seguir intentándolo? (únicamente para aprender, no para ganar el punto).';
$string['flowcontrol'] = 'Control de Flujo';
$string['full'] = 'Expandido';
$string['general'] = 'General';
$string['gotoendoflesson'] = 'Ir al final de la lección';
$string['grade'] = 'Calificación';
$string['gradebetterthan'] = 'Calificación superior a (%)';
$string['gradebetterthanerror'] = 'Obtener una calificación superior al {$a} por ciento';
$string['gradeessay'] = 'Calificar preguntas de ensayo ({$a->notgradedcount} no calificadas y {$a->notsentcount} no enviadas)';
$string['gradeis'] = 'La calificación es {$a}';
$string['gradeoptions'] = 'Opciones de Calificación';
$string['handlingofretakes'] = 'Calificación con varios intentos';
$string['handlingofretakes_help'] = 'Si se permite repetir la lección, este ajuste especifica si la calificación de la lección es la media o máxima de todos los intentos.';
$string['havenotgradedyet'] = 'Aún no calificado.';
$string['here'] = 'aquí';
$string['highscore'] = 'Puntuación alta';
$string['highscores'] = 'Puntuaciones altas';
$string['hightime'] = 'Tiempo alto';
$string['importcount'] = 'Importando {$a} preguntas';
$string['importquestions'] = 'Importar preguntas';
$string['importquestions_help'] = 'Esta función permite importar preguntas de diferentes formatos mediante archivos de texto,';
$string['insertedpage'] = 'Página insertada';
$string['invalidfile'] = 'Archivo no válido';
$string['invalidid'] = 'No se superó ningún ID de módulo o de lección en el curso';
$string['invalidlessonid'] = 'La ID de la lección es incorrecta';
$string['invalidpageid'] = 'ID de página no válida';
$string['jump'] = 'Saltar';
$string['jumps'] = 'Saltos';
$string['jumps_help'] = 'Cada respuesta (a una pregunta) o cada  descripción (de una página de contenido) tiene su correspondiente salto. El salto puede ser relativo, como "Esta página" o "Página siguiente", o absoluto, especificando cualquiera de las páginas de la lección.';
$string['jumpsto'] = 'Saltos a <em>{$a}</em>';
$string['leftduringtimed'] = 'Se ha interrumpido una lección con tiempo fijo.<br>Por favor, haga clic en Continuar para volver a empezar la lección.';
$string['leftduringtimednoretake'] = 'Se ha interrumpido una lección con tiempo fijo y<br>no se permite volver a empezar o continuar la lección.';
$string['leftduringtimedsession'] = 'Ha salido de una lección con tiempo programado';
$string['lesson:addinstance'] = 'Añadir una nueva lección';
$string['lessonattempted'] = 'Lección intentada';
$string['lessonclosed'] = 'Esta lección se cerró el {$a}.';
$string['lessoncloses'] = 'La lección se cierra';
$string['lessoncloseson'] = 'La lección se cierra el {$a}';
$string['lesson:edit'] = 'Editar una actividad de lección';
$string['lessonformating'] = 'Formateado de la Lección';
$string['lesson:manage'] = 'Gestionar una actividad de lección';
$string['lessonmenu'] = 'Menú Lección';
$string['lessonnotready'] = 'Esta lección no está lista para practicar. Por favor, contacte con su {$a}.';
$string['lessonnotready2'] = 'Esta lección no está preparada.';
$string['lessonopen'] = 'Esta lección se abrirá el {$a}.';
$string['lessonopens'] = 'La lección se abre';
$string['lessonpagelinkingbroken'] = 'No se encuentra la primera página. El enlace a la página de la lección debe estar roto. Por favor, contacte con el administrador.';
$string['lessonstats'] = 'Estadísticas de la lección';
$string['linkedmedia'] = 'Medios enlazados';
$string['loginfail'] = 'Acceso fallido, por favor pruebe de nuevo...';
$string['lowscore'] = 'Puntuación baja';
$string['lowtime'] = 'Tiempo bajo';
$string['manualgrading'] = 'Calificar ensayos';
$string['matchesanswer'] = 'Concuerda con la respuesta';
$string['matching'] = 'Emparejamiento';
$string['matchingpair'] = 'Pareja {$a}';
$string['maxgrade'] = 'Calificación máxima';
$string['maxgrade_help'] = 'Este ajuste especifica la calificación máxima de la lección. Si se establece en 0, la lección no aparece en las páginas de notas.';
$string['maxhighscores'] = 'Número de puntuaciones más altas para mostrar';
$string['maximumnumberofanswersbranches'] = 'Número máximo de respuestas';
$string['maximumnumberofanswersbranches_help'] = 'Este ajuste determina el número máximo de respuestas que se pueden usar en la lección. Si solo se utilizan preguntas de tipo Verdadero/Falso, podemos establecer el valor de 2.
Este valor se puede cambiar en cualquier momento ya que sólo afecta a lo que el profesor ve, no a los datos.';
$string['maximumnumberofattempts'] = 'Número máximo de intentos';
$string['maximumnumberofattempts_help'] = 'Este ajuste especifica el número máximo de intentos permitidos para cada pregunta. Si se responde incorrectamente en repetidas ocasiones, al alcanzar este valor máximo, se muestra la siguiente página de la lección.';
$string['maximumnumberofattemptsreached'] = 'Se ha alcanzado el número máximo de intentos. Traslado a la página siguiente';
$string['maxtime'] = 'Límite de tiempo (minutos)';
$string['maxtimewarning'] = 'Dispone de {$a} minuto(s) para terminar la lección.';
$string['mediaclose'] = 'Mostrar botón de cierre:';
$string['mediafile'] = 'Archivo en ventana emergente';
$string['mediafile_help'] = '<p>Esta opción crea una ventana emergente al comienzo de la lección a un archivo (e.g., mp3) o página web. Asimismo, en cada página de la lección aparecerá un enlace que abre de nuevo la ventana emergente si fuera necesario.</p>

<p>Opcionalmente aparecerá un botón de "Cerrar ventana" al final de la ventana emergente; pueden ajustarse asimismo la altura y anchura de la ventana.</p>';
$string['mediafilepopup'] = 'Haga clic aquí para ver';
$string['mediaheight'] = 'Altura de la ventana emergente:';
$string['mediawidth'] = 'Anchura de la ventana emergente:';
$string['messageprovider:graded_essay'] = 'Notificación de ensayo calificado';
$string['minimumnumberofquestions'] = 'Número mínimo de preguntas';
$string['minimumnumberofquestions_help'] = 'Este ajuste determina el número mínimo de preguntas vistas para que se calcule una calificación para la actividad. si la lección cuenta con una o más páginas de contenido, el número mínimo de preguntas debería fijarse en cero.

En el caso de fijar este parámetro, por ejemplo, a 20, se sugiere que se agregue este texto a la página inicial de la lección: "Se espera que en esta lección usted intente contestar al menos 20 preguntas. Puede contestar más si lo desea. Sin embargo, si intenta contestar menos de 20 preguntas, su calificación se calculará como si hubiera intentado contestar 20".';
$string['missingname'] = 'Por favor, escriba un \'nick\'';
$string['modattempts'] = 'Permitir revisión al estudiante';
$string['modattempts_help'] = '<p>Esta opción permite al estudiante volver atrás para cambiar sus respuestas.</p>';
$string['modattemptsnoteacher'] = 'La revisión del estudiante sólo está disponible para los estudiantes.';
$string['modulename'] = 'Lección';
$string['modulename_help'] = 'La actividad lección permite a un profesor presentar contenidos y/ o actividades prácticas de forma interesante y flexible. Un profesor puede utilizar la lección para crear un conjunto lineal de páginas de contenido o actividades educativas que ofrezcan al alumno varios itinerarios u opciones. En cualquier caso, los profesores pueden optar por incrementar la participación del alumno y asegurar la comprensión mediante la inclusión de diferentes tipos de pregunta, tales como la elección múltiple, respuesta corta y correspondencia. Dependiendo de la respuesta elegida por el estudiante y de cómo el profesor desarrolla la lección, los estudiantes pueden pasar a la página siguiente, volver a una página anterior o dirigirse a un itinerario totalmente diferente.

Una lección puede ser calificada y la calificación registrada en el libro de calificaciones.

Las lecciones pueden ser utilizados

* Para el aprendizaje autodirigido de un nuevo tema
* Para ejercicios basados en escenarios o simulaciones y de  toma de decisiones
* Para realizar ejercicios de repaso diferenciadas, con distintos conjuntos de preguntas de repaso, dependiendo de las respuestas dadas a las preguntas anteriores';
$string['modulenameplural'] = 'Lecciones';
$string['move'] = 'Mover página';
$string['movedpage'] = 'Página movida';
$string['movepagehere'] = 'Mover la página aquí';
$string['moving'] = 'Moviendo página: {$a}';
$string['multianswer'] = 'Multirrespuesta';
$string['multianswer_help'] = '<p>Algunos tipos de pregunta tienen una opción que se activa con un clic en cuadro de verificación.  Los tipos de la pregunta y el significado de las opciones son detallados abajo.

<ol>
<li><p><b>Elección múltiple</b> Es una variante de las preguntas de Opción
Múltiple llamada de <b>&quot;Elección múltiple y respuestas múltiples"</b>.  Si escoge esta opción en la pregunta entonces requieren que el estudiante seleccione todas las respuestas correctas del conjunto de respuestas.  La pregunta puede o no decir al estudiante <i>cuántas</i> respuestas correctas existen. Por ejemplo "¿Cuáles han sido presidentes de
EE.UU.?", o "Seleccione a dos presidentes de EE.UU. de la siguiente lista.".  El número de respuestas correctas pueden ser de <b>una</b> hasta todas las opciones.  (Una pregunta de Elección múltiples y respuestas múltiples con una respuesta correcta <b>es</b> diferente de una pregunta de Opción Múltiple pues la primera permite al estudiante la posibilidad de elegir más de una respuesta mientras que la última no lo permite.)</p></li>

<li><p><b>Respuesta corta</b> Por defecto, en las comparaciones no se tiene en cuenta si el texto está mayúsculas o minúsculas. Si se selecciona Opción de pregunta  las comparaciones tiene en cuenta si el texto está en mayúsculas o minúsculas.</p></li>

<p>En los otros tipos de preguntas no afecta la Opción de pregunta.</p>';
$string['multichoice'] = 'Opción múltiple';
$string['multipleanswer'] = 'Respuesta múltiple';
$string['nameapproved'] = 'Nombre aprobado';
$string['namereject'] = 'Lo sentimos, su nombre ha sido rechazado por el filtro.<br>Por favor, pruebe con otro nombre.';
$string['new'] = 'nueva';
$string['nextpage'] = 'Página siguiente';
$string['noanswer'] = 'No se ha dado respuesta';
$string['noattemptrecordsfound'] = 'No se encontraron registros de intentos. Sin calificación';
$string['nobranchtablefound'] = 'No se ha encontrado página de contenido';
$string['nocommentyet'] = 'Aún no comentado.';
$string['nocoursemods'] = 'No se encuentran actividades';
$string['nocredit'] = 'No crédito';
$string['nodeadline'] = 'No fecha límite';
$string['noessayquestionsfound'] = 'No se encuentran preguntas de ensayo en esta lección.';
$string['nohighscores'] = 'No puntuaciones más altas';
$string['nolessonattempts'] = 'No se han hecho intentos de practicar esta lección.';
$string['nooneansweredcorrectly'] = 'Nadie ha contestado correctamente.';
$string['nooneansweredthisquestion'] = 'Nadie ha contestado esta pregunta.';
$string['noonecheckedthis'] = 'Nadie ha comprobado esto.';
$string['nooneenteredthis'] = 'Nadie ha introducido esto.';
$string['noonehasanswered'] = 'Nadie ha contestado aún a una pregunta de ensayo.';
$string['noretake'] = 'No se le permite retomar esta lección.';
$string['normal'] = 'Normal - seguir el flujo de la lección';
$string['notcompleted'] = 'Sin finalizar';
$string['notdefined'] = 'Sin definir';
$string['nothighscore'] = 'No ha fijado la lista {$a} de puntuaciones más altas.';
$string['notitle'] = 'Sin título';
$string['numberofcorrectanswers'] = 'Número de respuestas correctas: {$a}';
$string['numberofcorrectmatches'] = 'Número de emparejamientos correctos: {$a}';
$string['numberofpagestoshow'] = 'Número de páginas a mostrar';
$string['numberofpagestoshow_help'] = 'Esta ajuste especifica el número de páginas mostradas en la lección. Sólo es aplicable para las lecciones con páginas que se muestran en orden aleatorio (cuando "Acción después de la respuesta correcta" está ajustado a"Mostrar una página no vista"  o "Mostrar unan página no contestada"). Si se establece en cero, se muestran todas las páginas.';
$string['numberofpagesviewed'] = 'Número de páginas vistas: {$a}';
$string['numberofpagesviewednotice'] = 'Número de preguntas contestadas: {$a->nquestions}; (Debería contestar al menos: {$a->minquestions})';
$string['numerical'] = 'Numérica';
$string['ongoing'] = 'Mostrar puntuación acumulada';
$string['ongoingcustom'] = 'Esta es una lección de {$a->score} puntos. Usted ha obtenido {$a->score} punto(s) sobre {$a->currenthigh} hasta ahora.';
$string['ongoing_help'] = '<p>Cuando se activa esta opción, cada página mostrará los puntos que el estudiante ha obtenido del total de          puntos posible. Por ejemplo, si un estudiante ha contestado correctamente cuatro preguntas de 5 puntos y ha      fallado una pregunta, la puntuación provisional será de 15/20 puntos.</p>';
$string['ongoingnormal'] = 'Usted ha respondido correctamente {$a->correct} pregunta(s) de un total de {$a->viewed} pregunta(s).';
$string['onpostperpage'] = 'Solo un mensaje por calificación';
$string['options'] = 'Opciones';
$string['or'] = 'O';
$string['ordered'] = 'Ordenado';
$string['other'] = 'Otro';
$string['outof'] = 'Fuera de {$a}';
$string['overview'] = 'Revisión';
$string['overview_help'] = 'Una lección se compone de un conjunto de páginas y, ocasionalmente, de páginas de contenido. Una página contiene información y normalmente termina con una pregunta. Con cada respuesta a la pregunta está asociado un salto. Este puede ser relativo (e.g., a la página actual o a la siguiente) o absoluto (e.g., a cualquiera de las páginas de la lección). Una página de contenido es aquella que contiene un conjunto de enlaces a otras páginas de la lección, e.g., una Tabla de Contenidos.';
$string['page'] = 'Página: {$a}';
$string['pagecontents'] = 'Contenido de la página';
$string['page-mod-lesson-edit'] = 'Editar página de la lección';
$string['page-mod-lesson-view'] = 'Ver página de la lección o una vista previa';
$string['page-mod-lesson-x'] = 'Cualquier página de lección';
$string['pages'] = 'Páginas';
$string['pagetitle'] = 'Título de la página';
$string['password'] = 'Contraseña';
$string['passwordprotectedlesson'] = '{$a} es una lección protegida con contraseña.';
$string['pleasecheckoneanswer'] = 'Seleccione una respuesta';
$string['pleasecheckoneormoreanswers'] = 'Seleccione una o más respuestas';
$string['pleaseenteryouranswerinthebox'] = 'Por favor, escriba su respuesta en la caja';
$string['pleasematchtheabovepairs'] = 'Empareje los siguentes elementos';
$string['pluginadministration'] = 'Administración de la lección';
$string['pluginname'] = 'Lección';
$string['pointsearned'] = 'Puntos ganados';
$string['postprocesserror'] = 'Ha ocurrido un error durante el post-procesamiento';
$string['postsuccess'] = 'Mensaje exitoso';
$string['practice'] = 'Lección de práctica';
$string['practice_help'] = '<p>Las lecciones de práctica no se mostrarán en el libro de calificaciones.</p>';
$string['preprocesserror'] = 'Ha ocurrido un error durante el pre-procesamiento';
$string['prerequisitelesson'] = 'Lección previa requerida';
$string['preview'] = 'Previsualizar';
$string['previewlesson'] = 'Previsualizar {$a}';
$string['previouspage'] = 'Página anterior';
$string['processerror'] = 'Ha ocurrido un error durante el procesamiento';
$string['progressbar'] = 'Barra de progreso';
$string['progressbar_help'] = '<p>Muestra una barra de progreso al final de la lección.
Por el momento, la barra de progreso tiene más precisión cuando las lecciones son lineales.</p>
<p>Al calcular el porcentaje completado, las Tablas de ramificación y las páginas de preguntas contestadas correctamente contribuyen al progreso de la lección. Al calcular el número total de páginas de la lección, los conglomerados y las páginas incluídas en los conglomerados sólo cuentan como una página única, excluyéndose las páginas de final de conglomerado y final de tabla de ramificación. El resto de las páginas cuentan para calcular el total de páginas de la lección.</p>
<p>Nota: los estilos por defecto de la barra de progreso no impresionan ;)  Todos los estilos (e.g.: colores, imágenes de fondo, etc.)
de la barra de progreso pueden modificarse en mod/lesson/styles.php.';
$string['progressbarteacherwarning'] = 'La barra de progreso no muestra {$a}';
$string['progressbarteacherwarning2'] = 'Usted no verá la barra de progreso porque puede editar esta lección';
$string['progresscompleted'] = 'Ha alcanzado el {$a}% de esta lección';
$string['qtype'] = 'Tipo de página';
$string['question'] = 'Pregunta';
$string['questionoption'] = 'Opción de pregunta';
$string['questiontype'] = 'Tipo de pregunta';
$string['randombranch'] = 'Página de contenido aleatorio';
$string['randompageinbranch'] = 'Pregunta aleatoria dentro de una página de contenido';
$string['rank'] = 'Rango';
$string['rawgrade'] = 'Calificación en bruto';
$string['receivedcredit'] = 'Crédito recibido';
$string['redisplaypage'] = 'Volver a mostrar página';
$string['report'] = 'Informe';
$string['reports'] = 'Informes';
$string['response'] = 'Comentario';
$string['retakesallowed'] = 'Se permite volver a tomar la lección';
$string['retakesallowed_help'] = '<p>Esta opción determina si los alumnos pueden tomar una lección más de una vez.
   El profesor puede decidir que la lección contiene material que los alumnos
     deben conocer en profundidad, en cuyo caso se debería permitir que el alumno repita
     la lección. Por otro lado, si el material se utiliza como examen esto no debería
     permitirse.
</p>

<p>Cuando a los alumnos se les permite repetir la lección, la <b>calificación</b> que aparece
    en la página Calificaciones corresponde bien al <B>promedio</B> de calificaciones, bien al <b>mejor</b> resultado obtenido en las repeticiones.
    El siguiente parámetro determina cuál de esas dos alternativas de calificación se utilizará.
</p>
<p>Advierta que el <b>Análisis de Pregunta</b> siempre utiliza las respuestas de los primeros intentos, y que las repeticiones subsiguientes no son tenidas en cuenta.</p>
<p>La opción por defecto es <b>Sí</b>, lo que significa que los alumnos pueden retomar la lección. Se
espera que sólo bajo condiciones excepcionales se seleccione la opción <b>No</b>.
</p>';
$string['returnto'] = '{$a}';
$string['returntocourse'] = 'Volver al curso';
$string['review'] = 'Revisión';
$string['reviewlesson'] = 'Revisar lección';
$string['reviewquestionback'] = 'Sí, me gustaría probar de nuevo';
$string['reviewquestioncontinue'] = 'No, deseo pasar a la siguiente';
$string['sanitycheckfailed'] = 'Ha fallado el \'Sanity Check\': Este intento se ha eliminado';
$string['savechanges'] = 'Guardar cambios';
$string['savechangesandeol'] = 'Guardar todos los cambios e ir al final de la lección.';
$string['savepage'] = 'Guardar página';
$string['score'] = 'Puntuación';
$string['scores'] = 'Puntuaciones';
$string['secondpluswrong'] = 'No. ¿Desea probar de nuevo?';
$string['selectaqtype'] = 'Seleccione un tipo de pregunta';
$string['shortanswer'] = 'Respuesta corta';
$string['showanunansweredpage'] = 'Mostrar una página no respondida';
$string['showanunseenpage'] = 'Mostrar una página no vista';
$string['singleanswer'] = 'Una sola respuesta';
$string['skip'] = 'Pasar por alto la navegación';
$string['slideshow'] = 'Pase de diapositivas';
$string['slideshowbgcolor'] = 'Color de fondo del pase de diapositivas';
$string['slideshowheight'] = 'Altura del pase de diapositivas';
$string['slideshow_help'] = '<p>Esta opción permite mostrar la lección como una sesión de diapositivas, con una
anchura, altura y color de fondo personalizado fijos. Se mostrará una barra de
desplazamiento basada en CSS si el contenido de la página excede la anchura o la altura
seleccionadas. Por defecto, las preguntas se "desgajarán" del modo de pase de
diapositivas, y sólo las páginas (i.e., tablas de ramas) se mostrarán en una
diapositiva. Los botones etiquetados por el idioma por defecto como "Siguiente" y
"Anterior" aparecerán en los extremos derecho e izquierdo de la diapositiva si
tal opción es seleccionada en la página. El resto de los botones aparecerán centrados
debajo de la diapositiva.</p>';
$string['slideshowwidth'] = 'Anchura del pase de diapositivas';
$string['startlesson'] = 'Comenzar lección';
$string['studentattemptlesson'] = 'Intento número {$a->attempt} de {$a->lastname}, {$a->firstname}';
$string['studentname'] = '{$a} Nombre';
$string['studentoneminwarning'] = 'Atención: Le queda 1 minuto o menos para terminar la lección.';
$string['studentresponse'] = 'comentario de {$a}';
$string['submit'] = 'Enviar';
$string['submitname'] = 'Enviar nombre';
$string['teacherjumpwarning'] = 'En esta lección se usa un salto {$a->cluster} o {$a->unseen}. En su lugar se usará el salto a la página siguiente. Entre como estudiante para probar estos saltos.';
$string['teacherongoingwarning'] = 'La puntuación acumulada sólo se muestra al estudiante. Entre como estudiante para probar la puntuación acumulada.';
$string['teachertimerwarning'] = 'El temporizador sólo funciona con estudiantes. Entre como estudiante para probar el temporizador.';
$string['thatsthecorrectanswer'] = 'Esta es la respuesta correcta';
$string['thatsthewronganswer'] = 'Esta es la respuesta equivocada';
$string['thefollowingpagesjumptothispage'] = 'Las páginas siguientes saltan a esta página';
$string['thispage'] = 'Esta página';
$string['timeremaining'] = 'Tiempo restante';
$string['timespenterror'] = 'Dedicar al menos {$a} minutos a la lección';
$string['timespentminutes'] = 'Tiempo empleado (minutos)';
$string['timetaken'] = 'Tiempo empleado';
$string['topscorestitle'] = '{$a} puntuaciones más altas.';
$string['truefalse'] = 'Verdadero/Falso';
$string['unabledtosavefile'] = 'El archivo que ha subido no se ha podido guardar';
$string['unknownqtypesnotimported'] = 'No se importaron {$a} preguntas con tipos de pregunta no admitidos';
$string['unseenpageinbranch'] = 'Pregunta no vista dentro de una página de conenidos';
$string['unsupportedqtype'] = '¡Tipo de pregunta no admitido ({$a})!';
$string['updatedpage'] = 'Página actualizada';
$string['updatefailed'] = 'Actualización fallida';
$string['usemaximum'] = 'Utilizar el máximo';
$string['usemean'] = 'Utilizar la media';
$string['usepassword'] = 'Lección protegida con contraseña';
$string['usepassword_help'] = '<p>Si se selecciona esta opción, el estudiante no podrá acceder a la lección a menos que escriba la contraseña.</p>';
$string['viewgrades'] = 'Ver calificaciones';
$string['viewhighscores'] = 'Ver lista de puntuaciones más altas.';
$string['viewreports'] = 'Ver {$a->attempts} intentos {$a->student} completados';
$string['viewreports2'] = 'View {$a} intentos completados';
$string['welldone'] = '¡Bien hecho!';
$string['whatdofirst'] = '¿Qué desea hacer primero?';
$string['wronganswerjump'] = 'Salto a respuesta errónea';
$string['wronganswerscore'] = 'Puntuación de respuesta errónea';
$string['wrongresponse'] = 'Comentario (erróneo)';
$string['xattempts'] = '{$a} intentos';
$string['youhaveseen'] = 'Usted ya ha visto más de una página de esta lección.<br />¿Desea comenzar desde la última página vista?';
$string['youmadehighscore'] = 'Lo ha hecho en la lista {$a} de puntuaciones más altas.';
$string['youranswer'] = 'Su respuesta';
$string['yourcurrentgradeis'] = 'Su calificación actual es {$a}';
$string['yourcurrentgradeisoutof'] = 'Su calificación actual es {$a->grade} sobre {$a->total}';
$string['youshouldview'] = 'Usted debería ver como mínimo: {$a}';
