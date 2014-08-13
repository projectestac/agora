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
 * Strings for component 'dialogue', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   dialogue
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['attachment'] = 'Adjunto';
$string['attachments'] = 'Adjuntos';
$string['bulkopener'] = 'Apertura masiva';
$string['bulkopenrule'] = 'Regla de apertura masiva';
$string['bulkopenrulenotifymessage'] = 'Cuando utiliza la opción de apertura masiva, las conversaciones no son abiertas inmediatamente. Las conversaciones serán abiertas cuando la función programada del sistema sea ejecutada, típicamente cada 30 minutos.';
$string['bulkopenrules'] = 'Reglas de apertura masiva';
$string['cannotclosedraftconversation'] = 'No puede cerrar una conversación que no ha sido iniciada!';
$string['cannotdeleteopenconversation'] = 'No puede eliminar una conversación abierta';
$string['closed'] = 'Cerrado';
$string['completed'] = '';
$string['configmaxattachments'] = 'El máximo de adjuntos permitidos por defecto en cada envío.';
$string['configmaxbytes'] = 'Tamaño máximo por defecto permitido para los adjuntos de todos los diálogos del sitio (sujeto a límites del curso y otra configuración local)';
$string['configtrackunread'] = 'Realizar seguimiento de los mensajes de los diálogos en la página de inicio del curso';
$string['configviewstudentconversations'] = 'Experimental: lista de estudiantes con las conversaciones en que están involucradas';
$string['conversationcloseconfirm'] = 'Está seguro de cerrar la conversación {$a} ?';
$string['conversationclosed'] = 'La conversación {$a} ha sido cerrada';
$string['conversationdeleteconfirm'] = 'Está seguro de eliminar la conversación {$a} ?';
$string['conversationdeleted'] = 'La conversación {$a} ha sido eliminada';
$string['conversationdiscarded'] = 'Conversación descartada';
$string['conversationlistdisplayheader'] = 'Mostrando {$a->show} {$a->state} conversaciones {$a->groupname}';
$string['conversationopened'] = 'La conversación se ha abierto';
$string['conversationopenedcron'] = 'Las conversaciones se abrirán automáticamente';
$string['conversationopenedwith'] = '<strong>1</strong> conversación abierta con:';
$string['conversations'] = 'Conversaciones';
$string['conversationsopenedwith'] = '<strong>{$a}</strong> conversaciones abiertas con:';
$string['cutoffdate'] = 'Fecha de corte';
$string['dialogueintro'] = 'Introducción al diálogo';
$string['dialoguename'] = 'Nombre del diálogo';
$string['dialogueupgradehelper'] = 'Asistente de actualización de diálogos';
$string['displayconversationsheading'] = 'Mostrando conversaciones {$a}';
$string['displaying'] = 'Mostrando';
$string['draft'] = 'Borrador';
$string['draftconversation'] = 'Borrador de conversación';
$string['draftreply'] = 'Borrador de respuesta';
$string['drafts'] = 'Borradores';
$string['erroremptymessage'] = 'El mensaje no puede estar vacío';
$string['erroremptysubject'] = 'El asunto no puede estar vacío';
$string['errornoparticipant'] = 'Debe abrir el diálogo con alguien...';
$string['everyone'] = 'Todos';
$string['fullname'] = 'Nombre completo';
$string['hasnotrun'] = 'No se ha ejecutado aún';
$string['includefuturemembers'] = 'Incluir miembros futuros';
$string['lastranon'] = 'Ejecutado por última vez';
$string['latest'] = 'Más reciente';
$string['listpaginationheader'] = '{$a->start}-{$a->end} de {$a->total}';
$string['matchingpeople'] = 'Personas coincidentes ({$a})';
$string['maxattachments'] = 'Número máximo de adjuntos';
$string['maxattachmentsize'] = 'Máximo tamaño de adjuntos';
$string['message'] = 'Mensaje';
$string['messages'] = 'Mensajes';
$string['mine'] = 'Mío';
$string['modulename'] = 'Diálogo';
$string['modulename_help'] = 'Los diálogos permiten a los estudiantes y profesores iniciar una conversación con otra persona. Son actividades del curso que pueden ser de utilidad cuando el profesor desea proveer al estudiante de retroalimentación privada sobre una actividad en línea. Por ejemplo, si un estudiante está participando en un foros de lenguas y comete un error gramatical que el profesor desea señalar sin avergonzar al estudiante, un diálogo es el lugar perfecto. Una actividad del tipo diálogo puede ser también una excelente forma para que los consejeros interactúen con los estudiantes - todas las actividades son registradas y el correo el electrónico no es requerido';
$string['modulenameplural'] = 'Diálogos';
$string['nobulkrulesfound'] = 'No se encontraron reglas masivas!';
$string['nodraftsfound'] = 'No se han encontrado borradores!';
$string['nomatchingpeople'] = 'No hay coincidencias con \'{$a}';
$string['nosubject'] = 'No se ha elegido tema';
$string['numberattachments'] = '{$a} adjuntos';
$string['numberunread'] = '{$a} sin leer';
$string['open'] = 'Abierto';
$string['openedbyfullyear'] = '<small>Abierto por</small> {$a->fullname} <small>el</small> {$a->datefull} <small>({$a->time})</small>';
$string['openedbyshortyear'] = '<small>Abierto por</small> {$a->fullname} <small>el</small> {$a->dateshort} <small>({$a->time})</small>';
$string['openedbytoday'] = '<small>Abierto por</small> {$a->fullname} <small>a las</small> {$a->time} <small>(hace {$a->timepast})</small>';
$string['openwith'] = 'Iniciar con';
$string['participants'] = 'participantes';
$string['people'] = 'Personas';
$string['repliedby'] = '{$a->fullname} <small>respondió</small> {$a->timeago}';
$string['repliedbyfullyear'] = '{$a->fullname} <small>respondió el</small> {$a->datefull} <small>({$a->time})</small>';
$string['repliedbyshortyear'] = '{$a->fullname} <small>respondió el</small> {$a->datefull} <small>({$a->time})</small>';
$string['repliedbytoday'] = '{$a->fullname} <small>respondió a las</small> {$a->time} <small>(hace {$a->timepast})</small>';
$string['reply'] = 'Respuesta';
$string['replydeleteconfirm'] = 'Está seguro de eliminar la respuesta?';
$string['replydeleted'] = 'El borrador de la respuesta ha sido eliminado';
$string['replysent'] = 'Su respuesta ha sido enviada';
$string['send'] = 'Enviar';
$string['senton'] = '<small><strong>Enviado el: </strong></small>';
$string['studenttostudent'] = 'Estudiante a Estudiante';
$string['subject'] = 'Tema';
$string['teachertostudent'] = 'Profesor a Estudiante';
$string['trashdraft'] = 'Borrador borrado';
$string['unread'] = 'Sin leer';
$string['unreadmessages'] = 'Mensajes sin leer';
$string['unreadmessagesnumber'] = '{$a} mensajes no leídos';
$string['unreadmessagesone'] = '1 mensaje sin leer';
$string['upgrade'] = 'Actualizar';
$string['upgradecheck'] = 'Actualizar diálogo {$a}?';
$string['upgradedcount'] = 'Cantidad de diálogos actualizados';
$string['upgradeiscompleted'] = 'La actualización se ha completado';
$string['upgradenodialoguesselected'] = 'No se han seleccionado diálogos';
$string['upgradenoneedupgrade'] = '{$a} diálogos necesitan ser actualizados';
$string['upgradereport'] = 'Listar diálogos por actualizar';
$string['upgradereportdescription'] = 'Esto mostrará un reporte con los diálogos en el sistema que requieren ser actualizados al nuevo esquema';
$string['upgradeselected'] = 'Actualizar diálogos seleccionados';
$string['upgradeselectedcount'] = 'Actualizar {$a} diálogos seleccionados?';
$string['upgradingresultfailed'] = 'Resultado: La actualización ha fallado';
$string['upgradingresultsuccess'] = 'Resultado: Actualización exitosa';
$string['upgradingsummary'] = 'Actualizando diálogo: {$a}';
$string['usecoursegroups'] = 'Usar grupos del curso';
$string['usesearch'] = 'Utilice la búsqueda para buscar personas con quién iniciar un diálogo';
$string['viewconversations'] = 'Ver conversaciones';
