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
 * Strings for component 'assign', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hay tareas que requieren atención';
$string['addattempt'] = 'Permitir otro intento';
$string['addnewattempt'] = 'Añadir una nueva entrega';
$string['addnewattemptfromprevious'] = 'Añadir un nuevo intento basado en el envío anterior';
$string['addnewattemptfromprevious_help'] = 'Se copiará el contenido de la entrega anterior a una nueva para poder trabajar a partir de ella.';
$string['addnewattempt_help'] = 'Se creará una nueva entrega en blanco para poder trabajar.';
$string['addsubmission'] = 'Agregar entrega';
$string['allocatedmarker'] = 'Evaluador asignado';
$string['allocatedmarker_help'] = 'Evaluador asignado a esta entrega';
$string['allowsubmissions'] = 'Permitir al usurio continuar haciendo entregas a esta tarea';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Los detalles de la tarea y el formulario de entregas estarán disponibles en <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Permitir entregas desde';
$string['allowsubmissionsfromdate_help'] = 'Si está habilitado, los estudiantes no podrán hacer entregas antes de esta fecha. Si está deshabilitado, los estudiantes podrán comenzar las entregas de inmediato.';
$string['allowsubmissionsfromdatesummary'] = 'Esta tarea aceptará entregas desde el <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Permitir cambios en la entrega';
$string['alwaysshowdescription'] = 'Mostrar siempre la descripción';
$string['alwaysshowdescription_help'] = 'Si está deshabilitado, la Descripción de la Tarea superior solo será visible para los estudiantes en la fecha "Permitir entregas desde",';
$string['applytoteam'] = 'Aplicar las mismas calificaciones y comentarios al grupo completo';
$string['assign:addinstance'] = 'Añadir una nueva tarea';
$string['assign:exportownsubmission'] = 'Exportar entrega propia';
$string['assignfeedback'] = 'Extensión de retroalimentación';
$string['assignfeedbackpluginname'] = 'Extensión de retroalimentación';
$string['assign:grade'] = 'Calificar tarea';
$string['assign:grantextension'] = 'Ampliar plazo';
$string['assign:manageallocations'] = 'Gestionar evaluadores asignados a entregas';
$string['assign:managegrades'] = 'Revisión y publicación de calificaciones';
$string['assignmentisdue'] = 'La tarea ha vencido';
$string['assignmentmail'] = '{$a->grader} ha hecho un comentario de  retroalimentación en su entrega de la tarea {$a->assignment}.

Puede verla adjunta a su entrega en

   {$a->url}';
$string['assignmentmailhtml'] = '{$a->grader} ha hecho un comentario de  retroalimentación en su entrega de la tarea
\'<i>{$a->assignment}</i>\'<br /><br />

Puede verla adjunta a su entrega en  <a href="{$a->url}">entrega de tarea</a>"';
$string['assignmentmailsmall'] = '{$a->grader} ha hecho un comentario de  retroalimentación en su entrega de la tarea {$a->assignment}.

Puede verla adjunta a su entrega';
$string['assignmentname'] = 'Nombre de la tarea';
$string['assignmentplugins'] = 'Extensiones de tarea';
$string['assignmentsperpage'] = 'Tareas por página';
$string['assign:releasegrades'] = 'Publicación de calificaciones';
$string['assign:revealidentities'] = 'Mostrar las identidades de los estudiantes';
$string['assign:reviewgrades'] = 'Revisión de calificaciones';
$string['assignsubmission'] = 'Extensión de entregas';
$string['assignsubmissionpluginname'] = 'Extensión de entregas';
$string['assign:submit'] = 'Enviar tarea';
$string['assign:view'] = 'Ver tarea';
$string['attemptheading'] = 'Intento {$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Intentos previos';
$string['attemptnumber'] = 'Número del intento';
$string['attemptreopenmethod'] = 'Permitir reapertura';
$string['attemptreopenmethod_help'] = 'Determina cómo se configura la reapertura de intentos de entrega de la tarea a los estudiantes. Las opciones disponibles son las siguientes: <ul> <li> Nunca - No se permite el reenvío </li> <li> Manual - El profesor puede permitir manualmente el reenvío </li> <li> Automática hasta aprobar - el envío del estudiante se vuelve a abrir automáticamente hasta que alcance la calificación para aprobar. Este valor se establece en el libro de calificaciones accediendo a la pestaña "Categorías e ítems" dentro de la opción  "Calificación para aprobar" de esta tarea. </li> </ul></br>Asimismo, puede establecerse un máximo de intentos para esta tarea.';
$string['attemptreopenmethod_manual'] = 'Manual';
$string['attemptreopenmethod_none'] = 'Nunca';
$string['attemptreopenmethod_untilpass'] = 'Automática hasta aprobar';
$string['attemptsettings'] = 'Configuración de intentos';
$string['availability'] = 'Disponibilidad';
$string['backtoassignment'] = 'Volver a la tarea';
$string['batchoperationconfirmaddattempt'] = '¿Permitir otro intento para las entregas seleccionadas?';
$string['batchoperationconfirmgrantextension'] = '¿Ampliar el plazo a todas las seleccionadas?';
$string['batchoperationconfirmlock'] = '¿Bloquear todas las entregas seleccionadas?';
$string['batchoperationconfirmreverttodraft'] = 'Revertir las entregas seleccionadas a borrador?';
$string['batchoperationconfirmsetmarkingallocation'] = '¿Establecer asignación de evaluador para todos los envíos seleccionados?';
$string['batchoperationconfirmsetmarkingworkflowstate'] = '¿Establecer estado de workflow de evaluación para todas los envíos seleccionados?';
$string['batchoperationconfirmunlock'] = '¿Desbloquear todas las entregas seleccionadas?';
$string['batchoperationlock'] = 'bloquear entregas';
$string['batchoperationreverttodraft'] = 'revertir entregas a borrador';
$string['batchoperationsdescription'] = 'Con las seleccionadas...';
$string['batchoperationunlock'] = 'desbloquear entregas';
$string['batchsetallocatedmarker'] = 'Establecer evaluador asignado para {$a} usuario(s) seleccionado(s)';
$string['batchsetmarkingworkflowstateforusers'] = 'Establecer estado del workflow de evaluación para {$a} usuario(s) seleccionado(s)';
$string['blindmarking'] = 'Ocultar identidad';
$string['blindmarking_help'] = 'Ocultar la identidad de los estudiantes a los evaluadores. Una vez configurado e iniciada la calificación, esta opción se bloqueará y no podrá ser cambiada.';
$string['changegradewarning'] = 'Esta tarea tiene envíos calificados y si se cambia la calificación no se recalcularán automáticamente las calificaciones de los envíos existentes. Debe volver a calificar todos los envíos previos, si quiere cambiar la calificación';
$string['choosegradingaction'] = 'Acción sobre las calificaciones';
$string['choosemarker'] = 'Seleccione...';
$string['chooseoperation'] = 'Elija operación';
$string['comment'] = 'Comentario';
$string['completionsubmit'] = 'El estudiante debe entregar esta actividad para completarla';
$string['configshowrecentsubmissions'] = 'Todos pueden ver las notificaciones de las entregas en los informes de actividad reciente.';
$string['confirmbatchgradingoperation'] = '¿Está seguro que quiere {$a->operation} a  {$a->count} estudiantes?';
$string['confirmsubmission'] = '¿Está seguro que quiere enviar su trabajo para que sea evaluado? Si es así, ya no podrá realizar modificaciones';
$string['conversionexception'] = 'No se pudo convertir tarea. La excepción fue: {$a}';
$string['couldnotconvertgrade'] = 'No se pudo convertir calificación de tarea del usuario {$a}.';
$string['couldnotconvertsubmission'] = 'No se pudo convertir la calificación de la entrega a la tarea del usuario {$a}.';
$string['couldnotcreatecoursemodule'] = 'No se puede crear módulo de curso';
$string['couldnotcreatenewassignmentinstance'] = 'No se pudo crear nueva instancia tarea.';
$string['couldnotfindassignmenttoupgrade'] = 'No se pudo encontrar instancias de tarea anteriores para actualizar.';
$string['currentattempt'] = 'Este es el intento {$a}.';
$string['currentattemptof'] = 'Este es el intento {$a->attemptnumber} ( {$a->maxattempts} intentos permitidos ).';
$string['currentgrade'] = 'Calificación actual en el libro de calificaciones';
$string['cutoffdate'] = 'Fecha límite';
$string['cutoffdatefromdatevalidation'] = 'La fecha límite debe ser posterior de la de inicio.';
$string['cutoffdate_help'] = 'Si se activa la opción, no se aceptarán entregas de tareas después de esta fecha sin una ampliación.';
$string['cutoffdatevalidation'] = 'La fecha límite debe ser posterior a la de entrega.';
$string['defaultsettings'] = 'Parámetros por defecto de la tareas';
$string['defaultsettings_help'] = 'Estos parámetros definen los valores por defecto para todas las nuevas tareas.';
$string['defaultteam'] = 'Grupo predeterminado';
$string['deleteallsubmissions'] = 'Borrar todas las entregas';
$string['description'] = 'Descripción';
$string['downloadall'] = 'Descargar todas las entregas';
$string['duedate'] = 'Fecha de entrega';
$string['duedate_help'] = 'Esto es cuando la Tarea ya se ha entregado. Todavía se permiten envíos después de esta fecha pero las tareas entregadas después de esta fecha se marcan como "retrasada". Para impedir envíos después de cierta fecha - ajustar la fecha de entrega de la tarea.';
$string['duedateno'] = 'No hay fecha de entrega';
$string['duedatereached'] = 'La fecha de vencimiento de esta tarea ya ha pasado';
$string['duedatevalidation'] = 'La fecha de vencimiento debe ser posterior a la fecha de inicio de las entregas.';
$string['editaction'] = 'Acciones...';
$string['editattemptfeedback'] = 'Edite la calificación y la retroalimentación para el intento número {$a}.';
$string['editingpreviousfeedbackwarning'] = 'Está editando la realimentación para un intento anterior. Este es el intento {$a->attemptnumber} de {$a->totalattempts}.';
$string['editingstatus'] = 'Edición de estado';
$string['editsubmission'] = 'Editar entrega';
$string['editsubmission_help'] = 'Realizar cambios en la entrega';
$string['enabled'] = 'Habilitado';
$string['errornosubmissions'] = 'No hay entregas que descargar';
$string['errorquickgradingvsadvancedgrading'] = 'No se guardaron las calificaciones porque esta tarea usa actualmente la calificación avanzada';
$string['errorrecordmodified'] = 'Las calificaciones no se guardaron porque alguien acaba de modificar uno o más registros, antes de que usted terminara de cargar la página';
$string['event_all_submissions_downloaded'] = 'Todos los envíos se están descargando.';
$string['event_assessable_submitted'] = 'Se ha enviado una entrega';
$string['event_extension_granted'] = 'Se ha entregado una extensión.';
$string['event_identities_revealed'] = 'Se han revelado las identidades.';
$string['event_marker_updated'] = 'El evaluador asignado ha sido actualizado';
$string['event_statement_accepted'] = 'El usuario ha aceptado la declaración del envío.';
$string['event_submission_duplicated'] = 'El usuario ha duplicado su envío.';
$string['event_submission_graded'] = 'Se ha calificado el envío.';
$string['event_submission_locked'] = 'Los envíos han sido bloqueados para un usuario.';
$string['event_submission_status_updated'] = 'El estado del envío ha sido actualizado.';
$string['event_submission_unlocked'] = 'Los envíos han sido desbloqueados para un usuario.';
$string['event_submission_updated'] = 'El usuario ha guardado el envío';
$string['event_workflow_state_updated'] = 'El estado del workflow ha sido actualizado.';
$string['extensionduedate'] = 'Ampliar plazo';
$string['extensionnotafterduedate'] = 'La fecha de ampliación de plazo debe ser posterior a la de entrega de la tarea';
$string['extensionnotafterfromdate'] = 'El plazo extra debe ser posterior a la fecha permitida para el envío';
$string['feedback'] = 'Comentario';
$string['feedbackavailablehtml'] = '{$a->username} ha aportado alguna retroalimentación en su entrega de la tarea \'<i>{$a->assignment}</i>\'<br /><br /> Puede verla añadida <a href="{$a->url}">a su entrega</a>.';
$string['feedbackavailablesmall'] = '{$a->username} ha hecho un comentario en la tarea {$a->assignment}';
$string['feedbackavailabletext'] = '{$a->username} ha hecho un comentario de  retroalimentación en su entrega de la tarea {$a->assignment}.

Puede verla adjunta a su entrega en

   {$a->url}';
$string['feedbackplugin'] = 'Extensión de retroalimentacion';
$string['feedbackpluginforgradebook'] = 'Extensión de retroalimentación que sube los comentarios al libro de calificaciones';
$string['feedbackpluginforgradebook_help'] = 'Solo una extensión de retroalimentación de la tarea puede introducir los comentarios en el libro de calificaciones.';
$string['feedbackplugins'] = 'Extensiones de retroalimentacion';
$string['feedbacksettings'] = 'Ajustes de la retroalimentación';
$string['feedbacktypes'] = 'Tipos de retroalimentación';
$string['filesubmissions'] = 'Ficheros de entrega';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Sin filtro';
$string['filterrequiregrading'] = 'Requiere calificación';
$string['filtersubmitted'] = 'Enviada';
$string['gradeabovemaximum'] = 'La calificación debe ser menor o igual que {$a}';
$string['gradebelowzero'] = 'La calificación deve ser igual o menos que {$a}';
$string['gradecanbechanged'] = 'La calificación puede ser cambiada';
$string['graded'] = 'Calificado';
$string['gradedby'] = 'Calificado por';
$string['gradedon'] = 'Calificado sobre';
$string['gradelocked'] = 'Esta calificación está bloqueada o ha sido modificada en el libro de calificaciones';
$string['gradeoutof'] = 'Calificación sobre {$a}';
$string['gradeoutofhelp'] = 'Calificación';
$string['gradeoutofhelp_help'] = 'Introduzca aquí la calificación para las entregas del estudiante. Puede utilizar decimales.';
$string['gradersubmissionupdatedhtml'] = '{$a->username} ha actualizado la entrega de su tarea a
<i>\'{$a->assignment}\'</i><br /><br />
Está <a href="{$a->url}">disponible en el sitio web</a>.';
$string['gradersubmissionupdatedsmall'] = '{$a->username} ha actualizado su entrega a la tarea  {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = '{$a->username} ha actualizado la entrega de su tarea
a \'{$a->assignment}\' en {$a->timeupdated}

Está disponible aquí:

{$a->url}';
$string['gradestudent'] = 'Calificación del estudiante: (id={$a->id}, fnombre completo={$a->fullname}).';
$string['gradeuser'] = 'Calificar {$a}';
$string['grading'] = 'Calificando';
$string['gradingchangessaved'] = 'Los cambios en la calificación se han guardado';
$string['gradingmethodpreview'] = 'Criterio de calificación';
$string['gradingoptions'] = 'Opciones';
$string['gradingstatus'] = 'Estado de la calificación';
$string['gradingstudent'] = 'Calificando estudiante';
$string['gradingsummary'] = 'Sumario de calificaciones';
$string['grantextension'] = 'Ampliar plazo';
$string['grantextensionforusers'] = 'Ampliar plazo para {$a} estudiantes';
$string['groupsubmissionsettings'] = 'Configuración de entrega por grupo';
$string['hiddenuser'] = 'Participante';
$string['hideshow'] = 'Ocultar/Mostrar';
$string['instructionfiles'] = 'Archivos de instrucciones';
$string['invalidfloatforgrade'] = 'La calificación proporcionada podría no entenderse: {$a}';
$string['invalidgradeforscale'] = 'La calificación proporcionada no era válida para la escala definida';
$string['lastmodifiedgrade'] = 'Última modificación (calificación)';
$string['lastmodifiedsubmission'] = 'Última modificación (entrega)';
$string['latesubmissions'] = 'Entrega fuera de plazo';
$string['latesubmissionsaccepted'] = 'Solo los estudiantes a los que se les haya concedido una prórroga pueden aún presentar la tarea';
$string['locksubmissionforstudent'] = 'Evita nuevas entregas del estudiante: (id={$a->id}, nombre={$a->fullname}).';
$string['locksubmissions'] = 'Bloquear entregas';
$string['manageassignfeedbackplugins'] = 'Gestionar extensiones de retroalimentación de tareas';
$string['manageassignsubmissionplugins'] = 'Gestionar extensiones de entrega en tareas';
$string['marker'] = 'Evaluador';
$string['markerfilter'] = 'Filtor de evaluadores';
$string['markingallocation'] = 'Usar asignación de evaluadores';
$string['markingallocation_help'] = 'Si está habilitado, permite que los evaluadores sean asignados a alumnos individuales - requiere que el worflow de evaluadores esté habilitado';
$string['markingworkflow'] = 'Usar workflow de evaluadores';
$string['markingworkflow_help'] = 'Si se habilita, las evaluaciones pasan por una serie de etapas en un workflow (flujo de trabajo) antes de ser entregadas a los estudiantes. Esto permite que en las sucesivas rondas de evaluación, todas las evaluaciones se muestren a todos los alumnos al mismo tiempo.';
$string['markingworkflowstate'] = 'Estado del workflow de evaluación';
$string['markingworkflowstate_help'] = 'La lista de estados del workflow (flujo de trabajo) que puede elegir se controla según sus permisos en esta tarea. La lista completa de estados válidos es: <br><ul><li>No evaluado - El evaluador aún no ha empezado</li><li>En evaluación - El envío se está evaluando en este momento</li>
<li>Evaluación finalizada - El evaluador ha finalizado pero puede ser necesaria una revisión o corrección</li>
<li>En revisión - El profesor está revisando la evaluación realizada</li>
<li>Lista para entregar - El profesor está de acuerdo con la evaluación, pero está esperando para mostrar la calificación a los estudiantes</li>
<li>Entregada - El estudiante puede acceder a su calificación y al feedback</li>
</ul>';
$string['markingworkflowstateinmarking'] = 'En evaluación';
$string['markingworkflowstateinreview'] = 'En revisión';
$string['markingworkflowstatenotmarked'] = 'No evaluado';
$string['markingworkflowstatereadyforrelease'] = 'Lista para entregar';
$string['markingworkflowstatereadyforreview'] = 'Evaluación finalizada';
$string['markingworkflowstatereleased'] = 'Entregada';
$string['maxattempts'] = 'Número máximo de intentos';
$string['maxattempts_help'] = 'El número máximo de intentos de envío que puede hacer por un estudiante. Una vez realizado este número de intentos de envío del estudiante no podrá ser reabierto.';
$string['maxgrade'] = 'Calificación máxima';
$string['messageprovider:assign_notification'] = 'Notificaciones de tareas';
$string['modulename'] = 'Tarea';
$string['modulename_help'] = 'El módulo de Tareas permite a un profesor evaluar el aprendizaje de los alumnos mediante la creación de una tarea a realizar que luego revisará, valorará y calificará.

Los alumnos pueden presentar cualquier contenido digital (archivos), como documentos de texto, hojas de cálculo, imágenes, audio y vídeos entre otros.
Alternativamente, o como complemento, la tarea puede requerir que los estudiantes escriban texto directamente en un campo utilizando el editor de texto. Una tarea también puede ser utilizada para recordar a los estudiantes tareas del "mundo real" que necesitan realizar y que no requieren la entrega de ningún tipo de contenido digital.

Al revisar las tareas, los profesores pueden dejar comentarios de retroalimentación y subir archivos, tales como anotaciones a los envíos de los estudiantes,  documentos con observaciones o comentarios en audio. Las tareas  pueden ser clasificadas según una escala numérica o según una escala personalizada, o bien, mediante un método de calificación avanzada, como una rúbrica. Las calificaciones finales se registran en el libro de calificaciones.';
$string['modulenameplural'] = 'Tareas';
$string['moreusers'] = '{$a} más...';
$string['mysubmission'] = 'Mi entrega:';
$string['newsubmissions'] = 'Tareas enviadas';
$string['noattempt'] = 'No entregado';
$string['nofiles'] = 'Sin archivos';
$string['nograde'] = 'Sin calificación';
$string['nolatesubmissions'] = 'No se aceptan entregas fuera de plazo.';
$string['nomoresubmissionsaccepted'] = 'No se aceptan más entregas';
$string['noonlinesubmissions'] = 'Esta tarea no requiere que usted envíe nada de forma online';
$string['nosavebutnext'] = 'Siguiente';
$string['nosubmission'] = 'No se ha enviado nada en esta tarea';
$string['nosubmissionsacceptedafter'] = 'No se aceptan entregas después de';
$string['notgraded'] = 'Sin calificar';
$string['notgradedyet'] = 'No calificado aún';
$string['notifications'] = 'Avisos';
$string['notsubmittedyet'] = 'Aún no ha enviado esta tarea';
$string['nousersselected'] = 'Sin usuarios seleccionados';
$string['numberofdraftsubmissions'] = 'Borradores';
$string['numberofparticipants'] = 'Participantes';
$string['numberofsubmissionsneedgrading'] = 'Pendientes por calificar';
$string['numberofsubmittedassignments'] = 'Enviados';
$string['numberofteams'] = 'Grupos';
$string['offline'] = 'No se requieren entregas online';
$string['open'] = 'Abrir';
$string['outlinegrade'] = 'Calificar: {$a}';
$string['outof'] = '{$a->current} de {$a->total}';
$string['overdue'] = '<font color="red">La Tarea está retrasada por: {$a}</font>';
$string['page-mod-assign-view'] = 'Página principal del módulo tareas y entregas';
$string['page-mod-assign-x'] = 'Cualquier página del módulo tarea';
$string['participant'] = 'Participante';
$string['pluginadministration'] = 'Administración de tareas';
$string['pluginname'] = 'Tarea';
$string['preventsubmissions'] = 'Evita que los usuarios realicen más entregas en esta tarea.';
$string['preventsubmissionsshort'] = 'Evitar cambios en la entrega';
$string['previous'] = 'Anterior';
$string['quickgrading'] = 'Calificación rápida';
$string['quickgradingchangessaved'] = 'Se guardaron los cambios de las calificaciones';
$string['quickgrading_help'] = 'Calificación rápida le permite asignar calificaciones (y resultados) directamente en la tabla de entregas. Calificación rápida no es compatible con la calificación avanzada y no se recomienda cuando hay múltiples marcadores.';
$string['quickgradingresult'] = 'Calificación rápida';
$string['recordid'] = 'Identificador';
$string['requireallteammemberssubmit'] = 'Se requiere que todos los miembros del grupo entreguen';
$string['requireallteammemberssubmit_help'] = 'Si está activado, todos los miembros del equipo de estudiantes deben entregar la tarea para que la presentación de la misma se considere como realizada. Si está desactivado, la presentación de la tarea se considerará como entregada para todos los miembros del equipo desde el momento en que cualquiera de sus integrantes lo haga.';
$string['requiresubmissionstatement'] = 'Es necesario que los estudiantes acepten las condiciones de entrega';
$string['requiresubmissionstatement_help'] = 'Es necesario que los estudiantes acepten las condiciones de entrega para todas las entregas de tarea de este sitio Moodle.';
$string['revealidentities'] = 'Mostrar la identidad de los estudiantes';
$string['revealidentitiesconfirm'] = '¿Está seguro que quiere revelar las identidades de los estudiantes en esta tarea. Esta operación no se puede deshacer. Una vez que las identidades de los estudiantes han sido reveladas, las puntuaciones se publicarán en el libro de calificaciones.';
$string['reverttodraft'] = 'Revertir la entrega al estatus de borrador.';
$string['reverttodraftforstudent'] = 'Revertir la entrega a borrador para el estudiante: (id={$a->id}, nombre={$a->fullname}).';
$string['reverttodraftshort'] = 'Revertir la entrega a borrador';
$string['reviewed'] = 'Revisado';
$string['saveallquickgradingchanges'] = 'Guardar los cambios realizados en la calificación rápida';
$string['savechanges'] = 'Guardar cambios';
$string['savegradingresult'] = 'Calificación';
$string['savenext'] = 'Guardar y mostrar el siguiente';
$string['scale'] = 'Escala';
$string['selectedusers'] = 'Usuarios seleccionados';
$string['selectlink'] = 'Seleccione...';
$string['selectuser'] = 'Seleccione {$a}';
$string['sendlatenotifications'] = 'Notificar a los evaluadores las entregas fuera de plazo';
$string['sendlatenotifications_help'] = 'Si está habilitado, los evaluadores (normalmente profesores) reciben un mensaje cuando un estudiante realiza una entrega a la tarea fuera de plazo . Se pueden configurar los métodos de mensajería.';
$string['sendnotifications'] = 'Enviar aviso de entregas a los que califican';
$string['sendnotifications_help'] = 'Si está habilitado, los evaluadores (normalmente profesores) reciben un mensaje cuando un estudiante realiza una entrega antes de la fecha requerida, dentro de las fechas establecidas o fuera de plazo. Se pueden configurar los métodos de mensajería.';
$string['sendstudentnotifications'] = 'Notificar a los estudiantes';
$string['sendstudentnotifications_help'] = 'Si se activa, los estudiantes reciben un mensaje cuando se actualiza su calificación o su retroalimentación.';
$string['sendsubmissionreceipts'] = 'Enviar recibo de entrega a los estudiantes';
$string['sendsubmissionreceipts_help'] = 'Esta opción habilita los recibos de entrega de los estudiantes. Los estudiantes recibirán una notificación cada vez que realicen correctamente una entrega';
$string['setmarkerallocationforlog'] = '';
$string['setmarkingallocation'] = 'Establecer evaluador asignado';
$string['setmarkingworkflowstate'] = 'Establecer el estado del proceso de evaluación';
$string['setmarkingworkflowstateforlog'] = '';
$string['settings'] = 'Parámetros de la tarea';
$string['showrecentsubmissions'] = 'Mostrar entregas recientes';
$string['status'] = 'Estado';
$string['submission'] = 'Entrega';
$string['submissioncopiedhtml'] = 'Se ha realizado una copia de sus envíos previos de la tarea \'<i>{$a->assignment}</i>\'<br /><br /> Puede ver el estado de sus <a href="{$a->url}">tareas enviadas</a>.';
$string['submissioncopiedsmall'] = 'Se han copiado sus envíos previos de la tarea {$a->assignment}';
$string['submissioncopiedtext'] = 'Se ha realizado una copia de sus envíos previos de la tarea
\'{$a->assignment}\'

Puede ver el estado de sus tareas enviadas en:

{$a->url}';
$string['submissiondrafts'] = 'Requiera aceptación del usuario pulsando sobre el botón';
$string['submissiondrafts_help'] = 'Si está habilitado, los estudiantes tendrán que pulsar un botón de Entrega para declarar que es su entrega definitiva. Esto permite que los estudiantes puedan tener una versión borrador de su entrega en el sistema. Si esta opción es cambiada de "No" a "Si" después de que los estudiantes hayan realizado algunas entregas, estas se considerarán como definitivas.';
$string['submissioneditable'] = 'El estudiante puede editar esta entrega';
$string['submissionempty'] = 'No se ha presentado nada.';
$string['submissionnotcopiedinvalidstatus'] = 'El envío no se ha copiado porque ha sido editado desde que se volvió a abrir.';
$string['submissionnoteditable'] = 'El estudiante no puede editar esta entrega';
$string['submissionnotready'] = 'Esta tarea no está lista para enviar.';
$string['submissionplugins'] = 'Extensiones de entrega';
$string['submissionreceipthtml'] = 'Usted ha realizado una entrega en la tarea \'<i>{$a->assignment}</i>\'<br /><br />
Puede ver el estado de su <a href="{$a->url}">entrega</a>.';
$string['submissionreceipts'] = 'Enviar recibo de entrega';
$string['submissionreceiptsmall'] = 'Usted ha realizado su entrega en la tarea {$a->assignment}';
$string['submissionreceipttext'] = 'Usted ha realizado una entrega en la tarea {$a->assignment}

Puede ver el estado de su entrega en

{$a->url}';
$string['submissions'] = 'Entregas';
$string['submissionsclosed'] = 'Entrega cerrada';
$string['submissionsettings'] = 'Configuración de entrega';
$string['submissionslocked'] = 'Esta tarea no acepta entregas';
$string['submissionslockedshort'] = 'No se permiten cambios en las entregas';
$string['submissionsnotgraded'] = 'Entregas no calificadas: {$a}';
$string['submissionstatement'] = 'Declaración de entrega';
$string['submissionstatementacceptedlog'] = 'Declaración de entrega aceptado por el usuario {$a}';
$string['submissionstatementdefault'] = 'Confirmo que este trabajo es de elaboración propia, excepto aquellas partes en las que haya reconocido la autoría de la obra o parte de ella a otras personas.';
$string['submissionstatement_help'] = 'Envío de tarea en estado \'confirmado\'.';
$string['submissionstatus'] = 'Estado de la entrega';
$string['submissionstatus_'] = 'Sin entrega';
$string['submissionstatus_draft'] = 'Borrador (no enviado)';
$string['submissionstatusheading'] = 'Estado de la entrega';
$string['submissionstatus_marked'] = 'Calificado';
$string['submissionstatus_new'] = 'Nueva entrega';
$string['submissionstatus_reopened'] = 'Reabierto';
$string['submissionstatus_submitted'] = 'Enviado para calificar';
$string['submissionsummary'] = '{$a->status}. Última modificación  {$a->timemodified}';
$string['submissionteam'] = 'Grupo';
$string['submissiontypes'] = 'Tipos de entrega';
$string['submitaction'] = 'Enviar';
$string['submitassignment'] = 'Enviar tarea';
$string['submitassignment_help'] = 'Una vez que esta tarea se haya enviado usted no podrá hacer más cambios';
$string['submitted'] = 'Enviada';
$string['submittedearly'] = 'La tarea fue enviada {$a} antes';
$string['submittedlate'] = 'La tarea fue enviada {$a} después';
$string['submittedlateshort'] = '{$a} después';
$string['teamsubmission'] = 'Entrega por grupos';
$string['teamsubmissiongroupingid'] = 'Agrupamiento para los grupos';
$string['teamsubmissiongroupingid_help'] = 'Este es el agrupamiento que la tarea utilizará para formar los grupos de estudiantes. Si no se establece, se utilizará la configuración por defecto de grupos.';
$string['teamsubmission_help'] = 'Si está habilitado los estudiantes se dividirán en grupos en función de la configuración por defecto de los grupos o de una agrupación personalizada. La entrega del grupo será compartida entre los miembros del grupo y todos los miembros del grupo verán los demás cambios de la entrega.';
$string['teamsubmissionstatus'] = 'Estado de la entrega de grupo';
$string['textinstructions'] = 'Instrucciones de la tarea';
$string['timemodified'] = 'Última modificación';
$string['timeremaining'] = 'Tiempo restante';
$string['unlimitedattempts'] = 'Ilimitado';
$string['unlimitedattemptsallowed'] = 'Se permiten intentos ilimitados';
$string['unlocksubmissionforstudent'] = 'Permitir entregas al usuario: (id={$a->id}, nombre={$a->fullname}).';
$string['unlocksubmissions'] = 'Desbloquear entregas';
$string['updategrade'] = 'Actualizar calificación';
$string['updatetable'] = 'Guardar y actualizar tabla';
$string['upgradenotimplemented'] = 'Actualización no implementada en la extensión ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Plazo ampliado hasta: {$a}';
$string['usergrade'] = 'Calificación de usuario';
$string['userswhoneedtosubmit'] = 'Componentes del equipo pendientes de entrega: {$a}';
$string['validmarkingworkflowstates'] = 'Estados válidos del proceso de evaluación';
$string['viewbatchmarkingallocation'] = 'Ver página de asignación de evaluadores.';
$string['viewbatchsetmarkingworkflowstate'] = 'Ver página de estado de workflow de evaluación.';
$string['viewfeedback'] = 'Ver retroalimentación';
$string['viewfeedbackforuser'] = 'Ver retroalimentación del usuarioi: {$a}';
$string['viewfull'] = 'Ver completo';
$string['viewfullgradingpage'] = 'Abrir la página de calificació global para incluir retroalimentación';
$string['viewgradebook'] = 'Ver libro de calificaciones';
$string['viewgrading'] = 'Ver/Calificar todas las entregas';
$string['viewgradingformforstudent'] = 'Ver página de calificaciones del estudiante: (id={$a->id}, nombre completo={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ver la página propia de entregas a tareas.';
$string['viewownsubmissionstatus'] = 'Ver página de estado de las entregas propios.';
$string['viewrevealidentitiesconfirm'] = 'Ver la página de confirmación para revelar la identidad de los estudiantes.';
$string['viewsubmission'] = 'Ver entrega';
$string['viewsubmissionforuser'] = 'Ver entrega del usuario: {$a}';
$string['viewsubmissiongradingtable'] = 'Ver tabla de calificaciones de las entregas';
$string['viewsummary'] = 'Vea el resumen';
$string['workflowfilter'] = 'Filtro de workflow';
