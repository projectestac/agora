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
 * Strings for component 'assignment', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hay tareas que requieren atención';
$string['addsubmission'] = 'Agregar entrega';
$string['allowdeleting'] = 'Permitir eliminar';
$string['allowdeleting_help'] = 'Si se activa esta opción, los participantes podrán eliminar archivos subidos en cualquier momento antes de ser calificados.';
$string['allowmaxfiles'] = 'Número máximo de archivos subidos';
$string['allowmaxfiles_help'] = 'Número máximo de archivos que puede subir cada participante. Este
número no se muestra a los estudiantes. Por favor, escriba el número
real de archivos solicitados en la descripción de la tarea.';
$string['allownotes'] = 'Permitir notas';
$string['allownotes_help'] = 'Si esta opción está activada, los alumnos pueden escribir notas en un área de texto, de la misma forma que en una tarea de texto en línea.';
$string['allowresubmit'] = 'Permitir volver a entregar';
$string['allowresubmit_help'] = '<P>Por defecto, los estudiantes no pueden reenviar las tareas después de que han sido calificadas.</P>
<P>Si usted activa esta opción, se permitirá a los estudiantes reenviar las tareas
después de que hayan sido calificadas (con el objeto de volver a calificarlas).
Esto puede ser útil si el profesor quiere animar a los estudiantes a hacer un
mejor trabajo en un proceso iterativo.</P>

<P>Obviamente, esta opción no es aplicable para las tareas "Fuera de línea".</P>';
$string['alreadygraded'] = 'Su tarea ya ha sido calificada. No se permite entregarla de nuevo.';
$string['assignment:addinstance'] = 'Añadir una nueva tarea';
$string['assignmentdetails'] = 'Detalles de la tarea';
$string['assignment:exportownsubmission'] = 'Exportar entrega propio';
$string['assignment:exportsubmission'] = 'Exportar enrega';
$string['assignment:grade'] = 'Calificar tarea';
$string['assignmentmail'] = 'El profesor {$a->teacher} ha hecho algunos comentarios en su entrega en la tarea \'{$a->assignment}\'

Puede verlos añadidos en su entrega en la  tarea:

{$a->url}';
$string['assignmentmailhtml'] = 'El profesor {$a->teacher} ha hecho comentarios en su entrega en la tarea \'<i>{$a->assignment}</i>\'<br /><br />

Puede verlos añadidos en su entrega en la tarea: <a href="{$a->url}"';
$string['assignmentmailsmall'] = 'El profesor {$a->teacher} ha hecho comentarios en su entrega en la tarea \'<i>{$a->assignment}</i>\'<br /><br />

Puede verlos añadidos en su entrega en la tarea';
$string['assignmentname'] = 'Nombre de la tarea';
$string['assignmentsubmission'] = 'Entregas de tareas';
$string['assignment:submit'] = 'Enviar tarea';
$string['assignmenttype'] = 'Tipo de tarea';
$string['assignment:view'] = 'Ver tarea';
$string['availabledate'] = 'Disponible desde';
$string['cannotdeletefiles'] = 'Ha ocurrido un error y los archivos no han podido eliminarse';
$string['cannotviewassignment'] = 'No puede ver esta tarea';
$string['changegradewarning'] = 'Esta tarea tiene envíos calificados y al cambiar la calificación no se recalcularán automáticamente las calificaciones de los envíos existentes. Debe volver a calificar todos los envíos previos, si quiere cambiar la calificación.';
$string['closedassignment'] = 'Esta tarea está cerrada, ya que el plazo de entrega expiró.';
$string['comment'] = 'Comentario';
$string['commentinline'] = 'Comentario en línea';
$string['commentinline_help'] = 'Si está habilitada, el texto de la entrega  se copiará en el comentario de retroalimentación para la calificación, facilitando los comentarios en línea (por medio de un color diferente)  o a edición del texto original.';
$string['configitemstocount'] = 'Naturaleza de los ítems a contar en las entregas de los estudiantes en lastareas fuera de línea.';
$string['configmaxbytes'] = 'Tamaño máximo permitido por defecto para todas las tareas del sitio (sujeto a los límites del curso y otras variables del servidor)';
$string['configshowrecentsubmissions'] = 'Todos pueden ver las notificaciones de las entregas en los informes de actividad reciente.';
$string['confirmdeletefile'] = '¿Está totalmente seguro de quiere eliminar este archivo?<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'El curso está mal configurado';
$string['currentgrade'] = 'Calificación actual en el libro de calificaciones';
$string['deleteallsubmissions'] = 'Eliminar todas las entregas';
$string['deletefilefailed'] = 'No se pudo eliminar el archivo.';
$string['description'] = 'Descripción';
$string['downloadall'] = 'Descargar todas las tareas en un zip';
$string['draft'] = 'Borrador';
$string['due'] = 'Fecha límite de entrega de la tarea';
$string['duedate'] = 'Fecha de entrega';
$string['duedateno'] = 'No hay fecha de entrega';
$string['early'] = '{$a} antes';
$string['editmysubmission'] = 'Editar mi entrega';
$string['editthesefiles'] = 'Editar estos archivos';
$string['editthisfile'] = 'Actualizar este archivo';
$string['emailstudents'] = 'Alertas por email a los estudiantes';
$string['emailteachermail'] = '{$a->username} ha actualizado la entrega de su tarea
para \'{$a->assignment}\' en {$a->timeupdated}

Está disponible aquí:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} ha actualizado la entrega de su tarea
para <i>\'{$a->assignment}\'</i><br /><br />
Está <a href="{$a->url}">disponible en el sitio web</a>.';
$string['emailteachers'] = 'Alertas de email a los profesores';
$string['emailteachers_help'] = '<p>Si se activa, los profesores recibirán un correo siempre que los estudiantes añadan o actualicen la enrega de una tarea.</p>

<p>Sólo se avisará a los profesores con permiso para calificar ese envío en particular. De este modo, si, por ejemplo, el curso usa grupos separados, los profesores asignados a un determinado grupo no recibirán información sobre los estudiantes pertenecientes a otros grupos.</p>';
$string['emptysubmission'] = 'Usted aún no ha enviado nada';
$string['enablenotification'] = 'Enviar emails de notificación';
$string['enablenotification_help'] = 'Si se habilita, los estudiantes recibirán una notificación cuando sus entregas a las tareas sean calificados.';
$string['errornosubmissions'] = 'No hay entregas que descargar';
$string['existingfiledeleted'] = 'Se ha borrado el archivo: {$a}';
$string['failedupdatefeedback'] = 'Fallo al actualizar el comentario dirigido a {$a}';
$string['feedback'] = 'Comentario';
$string['feedbackfromteacher'] = 'Comentarios por {$a}';
$string['feedbackupdated'] = 'Comentario actualizado para {$a} personas';
$string['finalize'] = 'Impedir actualizaciones de entregas';
$string['finalizeerror'] = 'Ha ocurrido un error y la entrega no ha podido completarse';
$string['futureaassignment'] = 'Esta tarea no está disponible';
$string['graded'] = 'Calificado';
$string['guestnosubmit'] = 'Lo sentimos, los invitados no pueden enviar tareas. Para poder enviar su respuesta, antes tiene que registrarse o introducir sus datos de acceso.';
$string['guestnoupload'] = 'Lo sentimos, los invitados no pueden realizar entregas';
$string['helpoffline'] = '<p>Esto resulta útil cuando la tarea se realiza fuera de Moodle. Por ejemplo en otra plataforma en internet o bien personalmente.</p><p>Los estudiantes pueden ver una descripción de la tarea, pero no pueden subir archivos de ninguna clase. Las calificaciones funcionan normalmente, y los estudiantes recibirán notificaciones sobre la calificación obtenida.</p>';
$string['helponline'] = '<p>Esta clase de tareas pide a los usuarios que editen un texto, utilizando las herramientas de edición habituales. Los profesores pueden calificarlas en línea, e incluso incorporar comentarios o cambios.</p><p>(Si usted está familiarizado con versiones anteriores de Moodle, este tipo de tarea hace lo mismo que hacía el módulo Diario)</p>';
$string['helpupload'] = '<p> Este tipo de tarea permite a cada participante cargar uno o más archivos en cualquier formato.
Estos pueden ser documentos de texto, imágenes, archivos de una web comprimidos en zip, o cualquier cosa que usted les pida que presenten. </ p>

<p>Este tipo de tarea también  permite subir varios archivos como respuesta. Los archivos de respuesta también pueden ser cargados antes de la entrega de manera que se puede utilizar para dar a cada participante un archivo diferente con el que trabajar. </ p>

<p>Los participantes también pueden incorporar notas que describan los archivos presentados, el estado de avance de la tarea o cualquier otra información.</ p>

<p>La entrega de este tipo de tareas debe finalizarse de forma manual por el participante. Es posible revisar el estado actual en cualquier momento, ya que las tareas sin finalizar están marcadas como Borrador. Se puede revertir cualquier tarea actualizada a un estado anterior de Borrador </p>';
$string['helpuploadsingle'] = '<p>Este tipo de tarea permite a los participantes subir un solo archivo de cualquier tipo.</p><p>Podría ser un documento de texto, una imagen, un sitio web comprimido, o cualquier cosa que les pida que envíen.</p>';
$string['hideintro'] = 'Ocultar descripción antes de la fecha disponible';
$string['hideintro_help'] = 'Si esta opción está activada, la descripción de la tarea permanece oculta en fechas anteriores a la fecha "Disponible desde". Sólo se muestra el nombre de la tarea.';
$string['invalidassignment'] = 'Tarea incorrecta';
$string['invalidfileandsubmissionid'] = 'Falta archivo o ID de entrega';
$string['invalidid'] = 'ID de la tarea incorrecta';
$string['invalidsubmissionid'] = 'ID de entrega no válido';
$string['invalidtype'] = 'Tipo de tarea incorrecta';
$string['invaliduserid'] = 'ID de usuario no válido';
$string['itemstocount'] = 'Número';
$string['lastgrade'] = 'Última calificación';
$string['late'] = '{$a} después';
$string['maximumgrade'] = 'Calificación máxima';
$string['maximumsize'] = 'Tamaño máximo';
$string['maxpublishstate'] = 'Visibilidad máxima para la entrada del blog antes de la fecha de caducidad';
$string['messageprovider:assignment_updates'] = 'Notificación de tareas (2.2)';
$string['modulename'] = 'Tarea (2.2)';
$string['modulename_help'] = 'Las Tareas permiten que el profesor asigne un trabajo concreto a los alumnos, ya sea online o en el mundo real, el cual podrá ser cualificado.';
$string['modulenameplural'] = 'Tareas (2.2)';
$string['newsubmissions'] = 'Tareas enviadas';
$string['noassignments'] = 'Aún no hay tareas';
$string['noattempts'] = 'No se ha intentado realizar esta tarea';
$string['noblogs'] = 'Usted no tiene entradas de blog para enviar';
$string['nofiles'] = 'No se han enviado archivos';
$string['nofilesyet'] = 'Aún no se han enviado archivos';
$string['nomoresubmissions'] = 'No se permiten más entregas';
$string['norequiregrading'] = 'No hay tareas que requieren calificación';
$string['nosubmisson'] = 'No hay tareas que requieren calificación';
$string['notavailableyet'] = 'Lo sentimos, esta tarea aún no está disponible.<br />Las instrucciones sobre la tarea se mostrarán aquí en la fecha que aparece más abajo.';
$string['notes'] = 'Notas';
$string['notesempty'] = 'No entrada';
$string['notesupdateerror'] = 'Error al actualizar notas';
$string['notgradedyet'] = 'No calificado aún';
$string['notsubmittedyet'] = 'Aún no ha enviado esta tarea';
$string['onceassignmentsent'] = 'Una vez que la tarea ha sido enviada para ser calificada, ya no podrá eliminarla ni adjuntar archivo(s). ¿Deseas continuar?';
$string['operation'] = 'Operación';
$string['optionalsettings'] = 'Ajustes opcionales';
$string['overwritewarning'] = 'Advertencia: Si envía un nuevo archivo REEMPLAZARÁ al anterior';
$string['page-mod-assignment-submissions'] = 'Página de entregas del módulo tareas';
$string['page-mod-assignment-view'] = 'Página principal del módulo tareas';
$string['page-mod-assignment-x'] = 'Cualquier página del módulo tarea';
$string['pagesize'] = 'Entregas mostradas por página';
$string['pluginadministration'] = 'Administración de la tarea';
$string['pluginname'] = 'Tarea (2.2)';
$string['popupinnewwindow'] = 'Abrir en una ventana emergente';
$string['preventlate'] = 'Impedir entregas fuera de plazo';
$string['quickgrade'] = 'Permitir calificación rápida';
$string['quickgrade_help'] = 'Si se activa, varias tareas pueden ser calificadas en una página. Añada calificaciones y comentarios y haga click en el botón "Guardar todos mis comentarios" para guardar todos los cambios de esa página.';
$string['requiregrading'] = 'Requiere calificación';
$string['responsefiles'] = 'Archivos de respuesta';
$string['reviewed'] = 'Revisado';
$string['saveallfeedback'] = 'Guardar todos mis comentarios';
$string['selectblog'] = 'Seleccione qué entrada de blog desea enviar';
$string['sendformarking'] = 'Enviar para calificación';
$string['showrecentsubmissions'] = 'Mostrar entregas recientes';
$string['submission'] = 'Entrega';
$string['submissiondraft'] = 'Borrador de la entrega';
$string['submissionfeedback'] = 'Comentario sobre la tarea';
$string['submissions'] = 'Entregas';
$string['submissionsaved'] = 'Sus cambios se han guardado';
$string['submissionsnotgraded'] = '{$a} entregas no calificadas';
$string['submitassignment'] = 'Envíe su tarea usando este formulario';
$string['submitedformarking'] = 'La tarea ya fue enviada para su revisión y no puede actualizarse';
$string['submitformarking'] = 'Entrega final para calificar la tarea';
$string['submitted'] = 'Enviada';
$string['submittedfiles'] = 'Archivos enviados';
$string['subplugintype_assignment'] = 'Tipo de tarea';
$string['subplugintype_assignment_plural'] = 'Tipos de tarea';
$string['trackdrafts'] = 'Habilitar botón "Enviar para calificar"';
$string['trackdrafts_help'] = '<p>El botón "Enviar para calificar" permite a los usuarios indicar a los calificadores que han terminado de trabajar en una tarea. Los calificadores pueden elegir si devuelven la tarea al estado de borrador (por ejemplo, si necesita mejorar).</p>';
$string['typeblog'] = 'Mensaje de blog';
$string['typeoffline'] = 'Actividad no en línea';
$string['typeonline'] = 'Texto en línea';
$string['typeupload'] = 'Subida avanzada de archivos';
$string['typeuploadsingle'] = 'Subir un solo archivo';
$string['unfinalize'] = 'Volver a borrador';
$string['unfinalizeerror'] = 'Ha ocurrido un error y la tarea no ha podido devolverse al estado de borrador';
$string['unfinalize_help'] = 'Volver a \'Borrador\' permite que el estudiante pueda realizar actualizaciones de su tarea';
$string['upgradenotification'] = 'Esta actividad se basa en un módulo de tareas antiguo';
$string['uploadafile'] = 'Subir un archivo';
$string['uploadbadname'] = 'El nombre contiene caracteres incompatibles y no se pudo subir';
$string['uploadedfiles'] = 'archivos subidos';
$string['uploaderror'] = 'Ha ocurrido un error al guardar el archivo en el servidor';
$string['uploadfailnoupdate'] = '¡El archivo se subió con éxito, pero su entrega no ha podido actualizarse!';
$string['uploadfiles'] = 'Subir archivos';
$string['uploadfiletoobig'] = 'Lo sentimos, su archivo es demasiado grande (el límite es de {$a} bytes)';
$string['uploadnofilefound'] = 'No seleccionó ningún archivo: ¿está seguro de haber seleccionado uno para subir?';
$string['uploadnotregistered'] = '¡ \'{$a}\' se subió correctamente, pero la entrega no se registró!.';
$string['uploadsuccess'] = '\'{$a}\' se ha subido correctamente';
$string['usermisconf'] = 'Usuario mal configurado';
$string['usernosubmit'] = 'Lo sentimos, no está autorizado a enviar una tarea.';
$string['viewassignmentupgradetool'] = 'Ver la utilidad de actualización de tareas';
$string['viewfeedback'] = 'Ver calificaciones y comentarios sobre la tarea';
$string['viewmysubmission'] = 'Ver mi enbtrega';
$string['viewsubmissions'] = 'Ver {$a} tareas enviadas';
$string['yoursubmission'] = 'Su entrega';
