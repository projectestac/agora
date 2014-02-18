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
 * Strings for component 'assign', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hai tarefas que requiren da súa atención';
$string['addsubmission'] = 'Engadir entrega';
$string['allowsubmissions'] = 'Permitirlle ao usuario continuar facendo entregas a esta tarefa';
$string['allowsubmissionsanddescriptionfromdatesummary'] = 'Os detalles da tarefa e o formulario de entregas estarán dispoñíbeis en <strong>{$a}</strong>';
$string['allowsubmissionsfromdate'] = 'Permitir entregas de';
$string['allowsubmissionsfromdate_help'] = 'Se está activado, os alumnos non poderán facer entregas antes desta data. Se está desactivado, os alumnos poderán comezar as entregas de inmediato.';
$string['allowsubmissionsfromdatesummary'] = 'Esta tarefa aceptará entregas de <strong>{$a}</strong>';
$string['allowsubmissionsshort'] = 'Permitir a actualización de entregas';
$string['alwaysshowdescription'] = 'Amosar sempre a descrición';
$string['alwaysshowdescription_help'] = 'Se está desactivado, a descrición da tarefa anterior só será visíbel para os alumnos na data «Permitir entregas desde».';
$string['applytoteam'] = 'Aplicar cualificacións e comentarios a todo o grupo';
$string['assign:addinstance'] = 'Engadir unha nova tarefa';
$string['assign:exportownsubmission'] = 'Exportar a propia entrega';
$string['assignfeedback'] = 'Engadido de comentarios';
$string['assignfeedbackpluginname'] = 'Engadido de comentarios';
$string['assign:grade'] = 'Cualificación da tarefa';
$string['assign:grantextension'] = 'Concesión da prórroga';
$string['assignmentisdue'] = 'A tarefa acadou a data límite';
$string['assignmentmail'] = 'O cualificador {$a->grader} fixo algúns comentarios
na entrega da súa tarefa «{$a->assignment}»

Pode velos anexos a entrega da tarefa:

    {$a->url}';
$string['assignmentmailhtml'] = 'O cualificador {$a->grader} fixo algúns comentarios
na entrega da súa tarefa «<i>{$a->assignment}</i>»<br /><br />
Pode velos anexos a entrega <a href="{$a->url}">da tarefa</a>.';
$string['assignmentmailsmall'] = 'O cualificador {$a->grader} fixo algúns comentarios
na entrega da súa tarefa «{$a->assignment}». pode velos anexos a entrega da tarefa';
$string['assignmentname'] = 'Nome da tarefa';
$string['assignmentplugins'] = 'Engadidos de tarefa';
$string['assignmentsperpage'] = 'Tarefas por páxina';
$string['assign:revealidentities'] = 'Amosar identidade dos alumnos';
$string['assignsubmission'] = 'Engadido de entregas';
$string['assignsubmissionpluginname'] = 'Engadido de entregas';
$string['assign:submit'] = 'Entregar tarefa';
$string['assign:view'] = 'Ver tarefa';
$string['availability'] = 'Dispoñibilidade';
$string['backtoassignment'] = 'Volver a tarefa';
$string['batchoperationconfirmgrantextension'] = 'Conceder unha prórroga para todas as entregas seleccionadas?';
$string['batchoperationconfirmlock'] = 'Bloquear todas as entregas seleccionadas?';
$string['batchoperationconfirmreverttodraft'] = 'Reverter as entregas seleccionadas a versión preliminar?';
$string['batchoperationconfirmunlock'] = 'Desbloquear todas as entregas seleccionadas?';
$string['batchoperationlock'] = 'bloquear entregas';
$string['batchoperationreverttodraft'] = 'reverter as entregas a versións preliminares';
$string['batchoperationsdescription'] = 'Co seleccionado...';
$string['batchoperationunlock'] = 'desbloquear entregas';
$string['blindmarking_help'] = 'A puntuación cega agocha a identidade dos alumnos aos puntuadores. A configuración da puntuación cega bloquearase desde o momento en que se faga unha entrega en relación con esta tarefa.';
$string['changegradewarning'] = 'Esta tarefa xa cualificou entregas e o cambio de cualificación non recalculará automaticamente as cualificacións existentes. Debe recualificar todas as entregas existentes, se quere cambiar a cualificación.';
$string['chooseoperation'] = 'Escoller operación';
$string['comment'] = 'Comentario';
$string['completionsubmit'] = 'O alumno debe entregar esta actividade para completala';
$string['configshowrecentsubmissions'] = 'Calquera pode ver as notificacións das entregas nos informes de actividade recente.';
$string['confirmbatchgradingoperation'] = 'Confirma que quere {$a->operation} a  {$a->count} alumnos?';
$string['conversionexception'] = 'Non foi posíbel converter a tarefa. Agás: {$a}.';
$string['couldnotconvertgrade'] = 'Non foi posíbel converter a cualificación da tarefa do usuario {$a}.';
$string['couldnotconvertsubmission'] = 'Non foi posíbel converter a entrega da tarefa do usuario {$a}.';
$string['couldnotcreatecoursemodule'] = 'Non foi posíbel crear o módulo do curso';
$string['couldnotcreatenewassignmentinstance'] = 'Non foi posíbel crear unha nova instancia da tarefa.';
$string['couldnotfindassignmenttoupgrade'] = 'Non foi posíbel atopar instancias de tarefa anteriores para actualizar.';
$string['currentgrade'] = 'Cualificación actual no libro de cualificacións';
$string['cutoffdate'] = 'Data límite';
$string['cutoffdate_help'] = 'De estar definida, a tarefa non aceptará entregas despois desta data sen unha prórroga.';
$string['defaultplugins'] = 'Configuración predeterminada da tarefa';
$string['defaultplugins_help'] = 'Esta configuración define os valores predeterminados para todas as novas tarefas.';
$string['defaultteam'] = 'Grupo predeterminado';
$string['deleteallsubmissions'] = 'Eliminar todas as entregas';
$string['deletepluginareyousure'] = 'Eliminar o engadido de tarefa {$a}: está seguro?';
$string['deletepluginareyousuremessage'] = 'Está a piques de eliminar completamente o engadido de tarefas «{$a}». Esta acción eliminará toda a información da base de datos asociada con este engadido de tarefas. CONFIRMA que quere continuar?';
$string['deletingplugin'] = 'Eliminado o engadido {$a}.';
$string['description'] = 'Descrición';
$string['downloadall'] = 'Descargar todas as entregas';
$string['duedate'] = 'Data límite';
$string['duedate_help'] = 'Isto é cando venceu a tarefa. As entregas aínda se permitirán despois desta data pero calquera tarefa entregada tras esta data marcarase como serodia. Para evitar entregas despois dunha certa data - estabeleza a data de corte da tarefa.';
$string['duedateno'] = 'Sen data límite';
$string['duedatereached'] = 'A data límite desta tarefa xa pasou';
$string['duedatevalidation'] = 'A data límite debe ser posterior a a data de inicio das entregas.';
$string['editaction'] = 'Accións...';
$string['editingstatus'] = 'Editando o estado';
$string['editsubmission'] = 'Editar o meu envío';
$string['enabled'] = 'Activado';
$string['errornosubmissions'] = 'Non hai entregas que descargar';
$string['errorquickgradingvsadvancedgrading'] = 'As cualificación non foron gardadas xa que esta tarefa emprega a cualificación avanzada';
$string['errorrecordmodified'] = 'As cualificación non foron gardadas xa que alguén ven de modificar un ou máis rexistros, antes de que vostede cargara a páxina.';
$string['feedback'] = 'Comentarios';
$string['feedbackavailablehtml'] = 'O usuario {$a->username} fixo algúns comentarios
na entrega da súa tarefa «<i>{$a->assignment}</i>»<br /><br />
Pode velos anexos a entrega <a href="{$a->url}">da tarefa</a>.';
$string['feedbackavailablesmall'] = 'O usuario {$a->username} fixo un comentario a tarefa {$a->assignment}.';
$string['feedbackavailabletext'] = 'O usuario {$a->username} fixo algúns comentarios
na entrega da súa tarefa «{$a->assignment}»

Pode velos anexos a entrega da tarefa:

    {$a->url}';
$string['feedbackplugin'] = 'Engadido de comentarios';
$string['feedbackpluginforgradebook'] = 'Engadido de comentarios que envía os comentarios ao libro de cualificacións';
$string['feedbackpluginforgradebook_help'] = 'Só un engadido de comentarios da tarefa pode enviar os comentarios ao libro de cualificacións.';
$string['feedbackplugins'] = 'Engadidos de comentarios';
$string['feedbacksettings'] = 'Configuración dos comentarios';
$string['filesubmissions'] = 'Entregas de ficheiros';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Sen filtro';
$string['filterrequiregrading'] = 'Require cualificación';
$string['filtersubmitted'] = 'Entregada';
$string['gradeabovemaximum'] = 'A cualificación debe ser menor ou igual que {$a}';
$string['gradebelowzero'] = 'A cualificación debe ser maior ou igual que cero.';
$string['graded'] = 'Cualificado';
$string['gradedby'] = 'Cualificado por';
$string['gradedon'] = 'Cualificado o';
$string['gradeoutof'] = 'Cualificación fora de {$a}';
$string['gradeoutofhelp'] = 'Cualificación';
$string['gradeoutofhelp_help'] = 'Introduza aquí a cualificación para as entregas do alumno. Pode empregar decimais.';
$string['gradersubmissionupdatedhtml'] = 'O usuario {$a->username} actualizou a entrega de tarefa
para <i>«{$a->assignment}»  en {$a->timeupdated}</i><br /><br />
Está <a href="{$a->url}">dispoñíbel no sitio web</a>.';
$string['gradersubmissionupdatedsmall'] = 'O usuario {$a->username} actualizou a súa entrega para a tarefa {$a->assignment}.';
$string['gradersubmissionupdatedtext'] = 'O usuario {$a->username} actualizou a súa entrega de tarefa
para «{$a->assignment}» en {$a->timeupdated}

Está dispoñíbel aquí:

    {$a->url}';
$string['gradestudent'] = 'Cualificación do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['grading'] = 'Cualificando';
$string['gradingmethodpreview'] = 'Criterio de cualificación';
$string['gradingoptions'] = 'Opcións';
$string['gradingstatus'] = 'Estado das cualificacións';
$string['gradingsummary'] = 'Resumo das cualificacións';
$string['grantextension'] = 'Concesión da prórroga';
$string['hiddenuser'] = 'Participante';
$string['hideshow'] = 'Agochar/Amosar';
$string['instructionfiles'] = 'Ficheiros de instrucións';
$string['invalidfloatforgrade'] = 'A cualificación fornecida podería non entenderse: {$a}';
$string['invalidgradeforscale'] = 'A cualificación fornecida non está dentro da escala definida.';
$string['lastmodifiedgrade'] = 'Última modificación (cualificación)';
$string['lastmodifiedsubmission'] = 'Última modificación (entrega)';
$string['latesubmissionsaccepted'] = 'Só os alumnos que teñan logrado unha prórroga poderán aínda enviar a tarefa.';
$string['locksubmissionforstudent'] = 'Impide máis entregas do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['locksubmissions'] = 'Bloquear entregas';
$string['manageassignfeedbackplugins'] = 'Xestionar engadidos de comentarios de tarefas';
$string['manageassignsubmissionplugins'] = 'Xestionar engadidos de entrega de tarefas';
$string['messageprovider:assign_notification'] = 'Notificación de tarefas';
$string['modulename'] = 'Tarefa';
$string['modulename_help'] = 'A módulo de actividade da tarefa permítelle a un profesor comunicar tarefas, recoller traballos e fornecer cualificacións e comentarios.

Os alumnos poden enviar calquera contido dixital (ficheiros), tales como documentos tratados co procesador de texto, follas de cálculo, imaxes, ou audio e videoclips.
Alternativamente, ou en adición, a tarefa pode requirir que os alumnos escriban texto directamente no editor de texto. Unha tarefa tamén se pode utilizar para lembrarlles aos alumnos do «mundo real» tarefas que deben completar sen estar en conexión, tales como deseños, así como aqueles que non requiren contido dixital. Os alumnos poden enviar, traballar individualmente ou como membros dun grupo.

Ao revisar as tarefas, os profesores poden deixar comentarios e subir ficheiros, tales como a puntuación de entregas dos alumnos con comentarios ou comentarios orais. As tarefas poden ser cualificadas utilizando unha escala numérica ou un un método avanzado de cualificación como unha rúbrica. A cualificación final gárdase no libro de cualificacións.';
$string['modulename_link'] = 'mod/assignment/view';
$string['modulenameplural'] = 'Tarefas';
$string['mysubmission'] = 'A miña entrega:';
$string['newsubmissions'] = 'Tarefas entregadas';
$string['nofiles'] = 'Sen ficheiros.';
$string['nograde'] = 'Sen cualificar';
$string['noonlinesubmissions'] = 'Esta tarefa non require que entregue nada desde a Rede';
$string['nosavebutnext'] = 'Seguinte';
$string['nosubmission'] = 'Non foi enviado nada para esta tarefa';
$string['notgraded'] = 'Sen cualificar';
$string['notgradedyet'] = 'Aínda non cualificada';
$string['notifications'] = 'Notificacións';
$string['notsubmittedyet'] = 'Aínda non entregada';
$string['nousersselected'] = 'Non hai ningún usuario seleccionado';
$string['numberofdraftsubmissions'] = 'Versións preliminares';
$string['numberofparticipants'] = 'Participantes';
$string['numberofsubmissionsneedgrading'] = 'Necesita cualificación';
$string['numberofsubmittedassignments'] = 'Entregada';
$string['numberofteams'] = 'Grupos';
$string['offline'] = 'Non se requiren entregas en liña';
$string['open'] = 'Abrir';
$string['outlinegrade'] = 'Cualificar: {$a}';
$string['overdue'] = '<font color="red">A tarefa foi atrasada por: {$a}</font>';
$string['page-mod-assign-view'] = 'Módulo principal de tarefas e páxina de entregas';
$string['page-mod-assign-x'] = 'Calquera páxina do módulo de tarefas';
$string['participant'] = 'Participante';
$string['pluginadministration'] = 'Administración de tarefas';
$string['pluginname'] = 'Tarefa';
$string['preventsubmissions'] = 'Impedir que os usuarios fagan máis entregas para tarefa';
$string['preventsubmissionsshort'] = 'Impedir a actualización de entregas';
$string['previous'] = 'Anterior';
$string['quickgrading'] = 'Cualificación rápida';
$string['quickgradingchangessaved'] = 'Gardáronse os cambios das cualificacións';
$string['quickgrading_help'] = 'A cualificación rápida permite asignar cualificacións (e resultados) directamente na táboa de entregas. A cualificación rápida non é compatíbel coa cualificación avanzada e non está recomendada cando hai múltiplos marcadores.';
$string['quickgradingresult'] = 'Cualificación rápida';
$string['recordid'] = 'Identificador';
$string['requireallteammemberssubmit'] = 'Require a entrega de todos os membros do grupo';
$string['requireallteammemberssubmit_help'] = 'De estar activado, todos os membros do grupo de alumnos deben premer o botón desta tarefa antes de que a entrega do grupo se considere entregada. De estar desactivado, considerarase que a entrega do grupo foi entregada tan pronto como calquera membro do grupo de alumnos prema no botón de envío.';
$string['revealidentities'] = 'Amosar identidade dos alumnos';
$string['revealidentitiesconfirm'] = 'Confirma que quere revelar as identidades de todos os alumnos con esta tarefa. Esta operación non se pode desfacer. Unha vez que as identidades dos alumnos se revelaron, anotaranse as puntuacións no libro de cualificacións.';
$string['reverttodraft'] = 'Reverter a entrega ao estado de versión preliminar.';
$string['reverttodraftforstudent'] = 'Reverter a entrega a versión preliminar do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['reverttodraftshort'] = 'Reverter a entrega a versión preliminar';
$string['reviewed'] = 'Revisadas';
$string['saveallquickgradingchanges'] = 'Gardar todos os cambios de cualificación rápida';
$string['savechanges'] = 'Gardar os cambios';
$string['savenext'] = 'Gardar e amosar o seguinte';
$string['scale'] = 'Escala';
$string['selectlink'] = 'Seleccionar...';
$string['selectuser'] = 'Seleccione {$a}';
$string['sendlatenotifications'] = 'Notificar aos cualificadores as entregas fora de prazo';
$string['sendlatenotifications_help'] = 'Se está activado, os cualificadores (normalmente profesores) reciben unha mensaxe cando un alumno fai unha entrega fora de prazo para unha tarefa. Os métodos de mensaxería poden configurarse.';
$string['sendnotifications'] = 'Notificar aos cualificadores sobre entregas';
$string['sendnotifications_help'] = 'Se está activado, os cualificadores (normalmente profesores) reciben unha mensaxe cando un alumno fai unha entrega antes da data requirida, dentro das datas estabelecidas, ou fora de prazo para unha tarefa. Os métodos de mensaxería poden configurarse.';
$string['sendsubmissionreceipts'] = 'Enviar un recibo da entrega aos alumnos';
$string['sendsubmissionreceipts_help'] = 'Esta opción activa os recibos de entrega dos alumnos. Os alumnos recibirán unha notificación cada vez que fagan correctamente unha entrega';
$string['settings'] = 'Configuración da tarefa';
$string['showrecentsubmissions'] = 'Amosar as entregas recentes';
$string['submission'] = 'Entrega';
$string['submissiondrafts'] = 'Requirir que os alumnos preman no botón de entrega';
$string['submissiondrafts_help'] = 'Se está activado, os alumnos terán que premer nun botón «Enviar» para declarar a súa entrega como final. Isto permite que os alumnos manteñan unha versión preliminar da entrega no seu sistema. Se se cambia este axuste «Non» a «Si» despois de que os alumnos xa teñan feito entregas, estas consideraranse como definitivas.';
$string['submissionempty'] = 'Nada non foi entregado';
$string['submissionnotready'] = 'Esta tarefa non está lista para a súa entrega:';
$string['submissionplugins'] = 'Engadidos de entregas';
$string['submissionreceipthtml'] = 'Vostede fixo unha
entrega para a tarefa «{$a->assignment}»<br /><br />
Pode ver o estado da súa <a href="{$a->url}">entrega de tarefa</a>.';
$string['submissionreceipts'] = 'Enviar recibo de entrega';
$string['submissionreceiptsmall'] = 'Vostede fixo a súa entrega para a tarefa {$a->assignment}';
$string['submissionreceipttext'] = 'Vostede fixo unha
entrega para a tarefa «{$a->assignment}»

Pode ver o estado da súa entrega en:

    {$a->url}';
$string['submissions'] = 'Entregas';
$string['submissionsclosed'] = 'Pechadas as entregas';
$string['submissionsettings'] = 'Configuración de entregas';
$string['submissionslocked'] = 'Esta tarefa non acepta entregas';
$string['submissionslockedshort'] = 'Non se permiten cambios nas entregas';
$string['submissionsnotgraded'] = 'Entregas non cualificadas: {$a}';
$string['submissionstatementdefault'] = 'Esta tarefa é o meu propio traballo, agás onde recoñecín o uso do traballo doutras persoas.';
$string['submissionstatement_help'] = 'Declaración de confirmación da entrega de tarefa';
$string['submissionstatus'] = 'Estado da entrega';
$string['submissionstatus_'] = 'Sen entrega';
$string['submissionstatus_draft'] = 'Versión preliminar (non entregada)';
$string['submissionstatusheading'] = 'Estado da entrega';
$string['submissionstatus_marked'] = 'Cualificado';
$string['submissionstatus_new'] = 'Nova entrega';
$string['submissionstatus_submitted'] = 'Entregado para cualificacións';
$string['submissionteam'] = 'Grupo';
$string['submitaction'] = 'Entregar';
$string['submitassignment'] = 'Entregar tarefa';
$string['submitted'] = 'Entregada';
$string['submittedearly'] = 'A tarefa foi enviada {$a} en prazo';
$string['submittedlate'] = 'A tarefa foi enviada {$a} fóra de prazo';
$string['submittedlateshort'] = '{$a} fora de prazo';
$string['teamsubmission'] = 'Alumnos que entregan en grupos';
$string['teamsubmissiongroupingid_help'] = 'Esta é a agrupación que a tarefa usará para atopar grupos para os grupos de alumnos. De non estar estabelecido - utilizarase a definición predeterminada de grupos.';
$string['textinstructions'] = 'Instrucións da tarefa';
$string['timemodified'] = 'Última modificación';
$string['timeremaining'] = 'Tempo restante';
$string['unlocksubmissionforstudent'] = 'Permitir entregas do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['unlocksubmissions'] = 'Desbloquear entregas';
$string['updategrade'] = 'Actualizar a cualificación';
$string['updatetable'] = 'Gardar e actualizar a táboa';
$string['upgradenotimplemented'] = 'Actualización no incluída no engadido ({$a->type} {$a->subtype})';
$string['usergrade'] = 'Cualificación do usuario';
$string['userswhoneedtosubmit'] = 'Usuarios que deben entregar: {$a}';
$string['viewfeedback'] = 'Ver comentario';
$string['viewfeedbackforuser'] = 'Ver comentario do usuario: {$a}';
$string['viewfullgradingpage'] = 'Abrir a páxina global de cualificacións para incluír comentarios';
$string['viewgradebook'] = 'Ver o libro de cualificacións';
$string['viewgrading'] = 'Ver/cualificar todas as entregas';
$string['viewgradingformforstudent'] = 'Ver a pácina de cualificacións do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ver a páxina das propias entregas de tarefas.';
$string['viewownsubmissionstatus'] = 'Ver a páxina de estado das propias entregas de tarefas.';
$string['viewsubmission'] = 'Ver a entrega';
$string['viewsubmissionforuser'] = 'Ver a entrega do usuario: {$a}';
$string['viewsubmissiongradingtable'] = 'Ver a táboa de cualificación das entregas';
