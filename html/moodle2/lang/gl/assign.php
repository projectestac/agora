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
 * Strings for component 'assign', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   assign
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hai tarefas que requiren da súa atención';
$string['addattempt'] = 'Permitir outro intento';
$string['addnewattempt'] = 'Engadir un novo intento';
$string['addnewattemptfromprevious'] = 'Engadir un novo intento baseado nunha entrega anterior';
$string['addnewattemptfromprevious_help'] = 'Isto copiará os contidos das súas entregas anteriores a unha nova entrega, para que poida traballar nela.';
$string['addnewattempt_help'] = 'Isto creará unha nova entrega baleira para que poida traballar nela.';
$string['addsubmission'] = 'Engadir entrega';
$string['allocatedmarker'] = 'Corrector asignado';
$string['allocatedmarker_help'] = 'Corrector asignado a esta entrega';
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
$string['assign:manageallocations'] = 'Xestionar os correctores asignados ás entregas';
$string['assign:managegrades'] = 'Revisión e publicación de cualificacións';
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
$string['assign:releasegrades'] = 'Publicación de cualificacións';
$string['assign:revealidentities'] = 'Amosar identidade dos alumnos';
$string['assign:reviewgrades'] = 'Revisión de cualificacións';
$string['assignsubmission'] = 'Engadido de entregas';
$string['assignsubmissionpluginname'] = 'Engadido de entregas';
$string['assign:submit'] = 'Entregar tarefa';
$string['assign:view'] = 'Ver tarefa';
$string['attemptheading'] = 'Intento {$a->attemptnumber}: {$a->submissionsummary}';
$string['attempthistory'] = 'Intentos anteriores';
$string['attemptnumber'] = 'Número do intento';
$string['attemptreopenmethod'] = 'Intentos reabertos';
$string['attemptreopenmethod_help'] = 'Determina como os intentos de entrega se reabren. As opcións dispoñíbeis son:
<ul><li>Nunca - A entrega do alumno non se pode reabrir.
</li><li>Manualmente - A entrega do alumno pódea reabrir un profesor.
</li><li>Automaticamente ata aprobar - A entrega do alumno reábrese automaticamente ata que o alumno acada o nivel para aprobar respecto do valor estabelecido no libro de cualificacións (categorías e ítems de sección) para esta tarefa.
</li></ul>';
$string['attemptreopenmethod_manual'] = 'Manualmente';
$string['attemptreopenmethod_none'] = 'Nunca';
$string['attemptreopenmethod_untilpass'] = 'Automaticamente ata pasar';
$string['attemptsettings'] = 'Configuracións do intento';
$string['availability'] = 'Dispoñibilidade';
$string['backtoassignment'] = 'Volver a tarefa';
$string['batchoperationconfirmaddattempt'] = 'Permitir outro intento para as entregas seleccionadas?';
$string['batchoperationconfirmgrantextension'] = 'Conceder unha prórroga para todas as entregas seleccionadas?';
$string['batchoperationconfirmlock'] = 'Bloquear todas as entregas seleccionadas?';
$string['batchoperationconfirmreverttodraft'] = 'Reverter as entregas seleccionadas a versión preliminar?';
$string['batchoperationconfirmsetmarkingallocation'] = 'Estabelecer a asignación de correctores para todas as entregas seleccionadas?';
$string['batchoperationconfirmsetmarkingworkflowstate'] = 'Estabelecer o estado do fluxo de traballo para todas as entregas seleccionadas?';
$string['batchoperationconfirmunlock'] = 'Desbloquear todas as entregas seleccionadas?';
$string['batchoperationlock'] = 'bloquear entregas';
$string['batchoperationreverttodraft'] = 'reverter as entregas a versións preliminares';
$string['batchoperationsdescription'] = 'Co seleccionado...';
$string['batchoperationunlock'] = 'desbloquear entregas';
$string['batchsetallocatedmarker'] = 'Estabelecer o corrector asignado para {$a} usuario(s) seleccionado(s).';
$string['batchsetmarkingworkflowstateforusers'] = 'Estabelecer o estado do fluxo de traballo para {$a} usuario(s) seleccionado(s).';
$string['blindmarking'] = 'Corrección cega';
$string['blindmarking_help'] = 'A corrección cega agocha a identidade dos alumnos aos cualificadores. A configuración da puntuación cega bloquearase desde o momento en que se faga unha entrega en relación con esta tarefa.';
$string['changegradewarning'] = 'Esta tarefa xa cualificou entregas e o cambio de cualificación non recalculará automaticamente as cualificacións existentes. Debe recualificar todas as entregas existentes, se quere cambiar a cualificación.';
$string['choosegradingaction'] = 'Acción de cualificación';
$string['choosemarker'] = 'Escolla...';
$string['chooseoperation'] = 'Escoller operación';
$string['comment'] = 'Comentario';
$string['completionsubmit'] = 'O alumno debe entregar esta actividade para completala';
$string['configshowrecentsubmissions'] = 'Calquera pode ver as notificacións das entregas nos informes de actividade recente.';
$string['confirmbatchgradingoperation'] = 'Confirma que quere {$a->operation} a  {$a->count} alumnos?';
$string['confirmsubmission'] = 'Confirma que quere entregar o seu traballo para cualificación? Non poderá facerlle máis cambios.';
$string['conversionexception'] = 'Non foi posíbel converter a tarefa. Agás: {$a}.';
$string['couldnotconvertgrade'] = 'Non foi posíbel converter a cualificación da tarefa do usuario {$a}.';
$string['couldnotconvertsubmission'] = 'Non foi posíbel converter a entrega da tarefa do usuario {$a}.';
$string['couldnotcreatecoursemodule'] = 'Non foi posíbel crear o módulo do curso';
$string['couldnotcreatenewassignmentinstance'] = 'Non foi posíbel crear unha nova instancia da tarefa.';
$string['couldnotfindassignmenttoupgrade'] = 'Non foi posíbel atopar instancias de tarefa anteriores para actualizar.';
$string['currentattempt'] = 'Este é o intento {$a}.';
$string['currentattemptof'] = 'Este é o intento {$a->attemptnumber} ( {$a->maxattempts} intentos permitidos ).';
$string['currentgrade'] = 'Cualificación actual no libro de cualificacións';
$string['cutoffdate'] = 'Data de corte';
$string['cutoffdatefromdatevalidation'] = 'A data de corte debe ser posterior a a data de inicio das entregas.';
$string['cutoffdate_help'] = 'De estar definida, a tarefa non aceptará entregas despois desta data sen unha prórroga.';
$string['cutoffdatevalidation'] = 'A data de corte non pode ser anterior á data de entrega.';
$string['defaultsettings'] = 'Configuración predeterminada da tarefa';
$string['defaultsettings_help'] = 'Esta configuración define os valores predeterminados para todas as novas tarefas.';
$string['defaultteam'] = 'Grupo predeterminado';
$string['deleteallsubmissions'] = 'Eliminar todas as entregas';
$string['description'] = 'Descrición';
$string['downloadall'] = 'Descargar todas as entregas';
$string['duedate'] = 'Data límite';
$string['duedate_help'] = 'Isto é cando venceu a tarefa. As entregas aínda se permitirán despois desta data pero calquera tarefa entregada tras esta data marcarase como atrasada. Para evitar entregas despois dunha certa data, estabeleza a data de corte da tarefa.';
$string['duedateno'] = 'Sen data límite';
$string['duedatereached'] = 'A data límite desta tarefa xa pasou';
$string['duedatevalidation'] = 'A data límite debe ser posterior a a data de inicio das entregas.';
$string['editaction'] = 'Accións...';
$string['editattemptfeedback'] = 'Editar a cualificación e os comentarios para o intento número {$a}.';
$string['editingpreviousfeedbackwarning'] = 'Está editando os comentarios para un intento anterior. Este é o intento {$a->attemptnumber} de {$a->totalattempts}.';
$string['editingstatus'] = 'Editando o estado';
$string['editsubmission'] = 'Editar o meu envío';
$string['editsubmission_help'] = 'Facerlle cambios á súa entrega';
$string['enabled'] = 'Activado';
$string['errornosubmissions'] = 'Non hai entregas que descargar';
$string['errorquickgradingvsadvancedgrading'] = 'As cualificación non foron gardadas xa que esta tarefa emprega a cualificación avanzada';
$string['errorrecordmodified'] = 'As cualificación non foron gardadas xa que alguén ven de modificar un ou máis rexistros, antes de que vostede cargara a páxina.';
$string['event_all_submissions_downloaded'] = 'Estanse descargando todas as entregas.';
$string['event_assessable_submitted'] = 'Entrega feita.';
$string['event_extension_granted'] = 'Outorgouse unha ampliación.';
$string['event_identities_revealed'] = 'Reveláronse as identidades.';
$string['event_marker_updated'] = 'Actualizouse o corrector asignado.';
$string['event_statement_accepted'] = 'O usuario aceptou a declaración da entrega.';
$string['event_submission_duplicated'] = 'O usuario duplicou a súa entrega.';
$string['event_submission_graded'] = 'A entrega foi cualificada.';
$string['event_submission_locked'] = 'As entregas foron bloqueadas para un usuario.';
$string['event_submission_status_updated'] = 'Actualizouse o estado da entrega.';
$string['event_submission_unlocked'] = 'As entregas foron desbloqueadas para un usuario.';
$string['event_workflow_state_updated'] = 'Actualizouse o estado do fluxo de traballo.';
$string['extensionduedate'] = 'Ampliación do prazo.';
$string['extensionnotafterduedate'] = 'A data da ampliación debe ser posterior á data de entrega inicial';
$string['extensionnotafterfromdate'] = 'A data da ampliación ser posterior a a data de inicio das entregas';
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
$string['feedbacktypes'] = 'Tipo de comentarios';
$string['filesubmissions'] = 'Entregas de ficheiros';
$string['filter'] = 'Filtro';
$string['filternone'] = 'Sen filtro';
$string['filterrequiregrading'] = 'Require cualificación';
$string['filtersubmitted'] = 'Entregada';
$string['gradeabovemaximum'] = 'A cualificación debe ser menor ou igual que {$a}';
$string['gradebelowzero'] = 'A cualificación debe ser maior ou igual que cero.';
$string['gradecanbechanged'] = 'A cualificación pode seren cambiada';
$string['graded'] = 'Cualificado';
$string['gradedby'] = 'Cualificado por';
$string['gradedon'] = 'Cualificado o';
$string['gradelocked'] = 'Esta cualificación está bloqueada ou foi modificada no libro de cualificacións';
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
$string['gradeuser'] = 'Cualificar {$a}';
$string['grading'] = 'Cualificando';
$string['gradingchangessaved'] = 'Gardáronse os cambios das cualificacións';
$string['gradingmethodpreview'] = 'Criterio de cualificación';
$string['gradingoptions'] = 'Opcións';
$string['gradingstatus'] = 'Estado das cualificacións';
$string['gradingstudent'] = 'Cualificando ao alumno';
$string['gradingsummary'] = 'Resumo das cualificacións';
$string['grantextension'] = 'Concesión da prórroga';
$string['grantextensionforusers'] = 'Outorgar ampliación para {$a} alumnos';
$string['groupsubmissionsettings'] = 'Configuración de entregas de grupo';
$string['hiddenuser'] = 'Participante';
$string['hideshow'] = 'Agochar/Amosar';
$string['instructionfiles'] = 'Ficheiros de instrucións';
$string['invalidfloatforgrade'] = 'A cualificación fornecida podería non entenderse: {$a}';
$string['invalidgradeforscale'] = 'A cualificación fornecida non está dentro da escala definida.';
$string['lastmodifiedgrade'] = 'Última modificación (cualificación)';
$string['lastmodifiedsubmission'] = 'Última modificación (entrega)';
$string['latesubmissions'] = 'Entregas atrasadas';
$string['latesubmissionsaccepted'] = 'Só os alumnos que teñan logrado unha prórroga poderán aínda enviar a tarefa.';
$string['locksubmissionforstudent'] = 'Impide máis entregas do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['locksubmissions'] = 'Bloquear entregas';
$string['manageassignfeedbackplugins'] = 'Xestionar engadidos de comentarios de tarefas';
$string['manageassignsubmissionplugins'] = 'Xestionar engadidos de entrega de tarefas';
$string['marker'] = 'Corrector';
$string['markerfilter'] = 'Filtro de corrector';
$string['markingallocation'] = 'Usar asignación de corrector';
$string['markingallocation_help'] = 'De activarse ao mesmo tempo que o fluxo de traballo de corrección, permite que os correctores sexan asignados a alumnos individuais.';
$string['markingworkflow'] = 'Usar o fluxo de traballo de corrección';
$string['markingworkflow_help'] = 'Se está activado, as correccións seguirán una serie de etapas do fluxo de traballo antes de que sexan publicadas para os alumnos. Isto permite que haxa varias rondas de corrección e permite que todas as corrección se publiquen para todos os alumnos a un mesmo tempo.';
$string['markingworkflowstate'] = 'Estado do fluxo de traballo de corrección';
$string['markingworkflowstate_help'] = 'Os posíbeis estados do fluxo de traballo poden incluír (dependendo dos seus permisos):

* Sen corrixir - o corrector aínda non comezou
* En corrección - o corrector xa comezou, mais aínda non rematou
* Corrección completada - o corrector xa rematou, mais podería necesitar volver revisar/corrixir.
* En revisión - a corrección está agora nas mans do profesor a cargo do control de calidade
* Lista para publicar - o profesor a cargo está satisfeito coas correccións, mais está agardando antes de darlle acceso aos alumno
* Publicado - os alumnos poden acceder ás cualificación/comentarios';
$string['markingworkflowstateinmarking'] = 'En corrección';
$string['markingworkflowstateinreview'] = 'En revisión';
$string['markingworkflowstatenotmarked'] = 'Sen corrixir';
$string['markingworkflowstatereadyforrelease'] = 'Listo para publicar';
$string['markingworkflowstatereadyforreview'] = 'Corrección completada';
$string['markingworkflowstatereleased'] = 'Publicado';
$string['maxattempts'] = 'Intentos máximos';
$string['maxattempts_help'] = 'O número máximo de intentos de entrega que pode facer un alumno. Despois deste número de intentos, os envíos do alumno non poderán reabrirse.';
$string['maxgrade'] = 'Cualificación máxima';
$string['messageprovider:assign_notification'] = 'Notificación de tarefas';
$string['modulename'] = 'Tarefa';
$string['modulename_help'] = 'A módulo de actividade da tarefa permítelle a un profesor comunicar tarefas, recoller traballos e fornecer cualificacións e comentarios.

Os alumnos poden enviar calquera contido dixital (ficheiros), tales como documentos tratados co procesador de texto, follas de cálculo, imaxes, ou audio e videoclips.
Alternativamente, ou en adición, a tarefa pode requirir que os alumnos escriban texto directamente no editor de texto. Unha tarefa tamén se pode utilizar para lembrarlles aos alumnos do «mundo real» tarefas que deben completar sen estar en conexión, tales como deseños, así como aqueles que non requiren contido dixital. Os alumnos poden enviar, traballar individualmente ou como membros dun grupo.

Ao revisar as tarefas, os profesores poden deixar comentarios e subir ficheiros, tales como a puntuación de entregas dos alumnos con comentarios ou comentarios orais. As tarefas poden ser cualificadas utilizando unha escala numérica ou un un método avanzado de cualificación como unha rúbrica. A cualificación final gárdase no libro de cualificacións.';
$string['modulename_link'] = 'mod/assignment/view';
$string['modulenameplural'] = 'Tarefas';
$string['moreusers'] = '{$a} máis...';
$string['mysubmission'] = 'A miña entrega:';
$string['newsubmissions'] = 'Tarefas entregadas';
$string['noattempt'] = 'Sen intentos';
$string['nofiles'] = 'Sen ficheiros.';
$string['nograde'] = 'Sen cualificar';
$string['nolatesubmissions'] = 'Non se aceptan entregas atrasadas.';
$string['nomoresubmissionsaccepted'] = 'Non se aceptan máis entregas';
$string['noonlinesubmissions'] = 'Esta tarefa non require que entregue nada desde a Rede';
$string['nosavebutnext'] = 'Seguinte';
$string['nosubmission'] = 'Non foi enviado nada para esta tarefa';
$string['nosubmissionsacceptedafter'] = 'Non se aceptan entregas despois de';
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
$string['outof'] = '{$a->current} dun total de {$a->total}';
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
$string['quickgrading_help'] = 'A cualificación rápida permite asignar cualificacións (e resultados) directamente na táboa de entregas. A cualificación rápida non é compatíbel coa cualificación avanzada e non está recomendada cando hai múltiplos correctores.';
$string['quickgradingresult'] = 'Cualificación rápida';
$string['recordid'] = 'Identificador';
$string['requireallteammemberssubmit'] = 'Require a entrega de todos os membros do grupo';
$string['requireallteammemberssubmit_help'] = 'De estar activado, todos os membros do grupo de alumnos deben premer o botón desta tarefa antes de que a entrega do grupo se considere entregada. De estar desactivado, considerarase que a entrega do grupo foi entregada tan pronto como calquera membro do grupo de alumnos prema no botón de envío.';
$string['requiresubmissionstatement'] = 'Requirir que os alumnos acepten a declaración de entrega';
$string['requiresubmissionstatement_help'] = 'Require que os alumnos acepten a situación de entrega para todas as entregas desta tarefa.';
$string['revealidentities'] = 'Amosar identidade dos alumnos';
$string['revealidentitiesconfirm'] = 'Confirma que quere revelar as identidades de todos os alumnos con esta tarefa. Esta operación non se pode desfacer. Unha vez que as identidades dos alumnos se revelaron, anotaranse as puntuacións no libro de cualificacións.';
$string['reverttodraft'] = 'Reverter a entrega ao estado de versión preliminar.';
$string['reverttodraftforstudent'] = 'Reverter a entrega a versión preliminar do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['reverttodraftshort'] = 'Reverter a entrega a versión preliminar';
$string['reviewed'] = 'Revisadas';
$string['saveallquickgradingchanges'] = 'Gardar todos os cambios de cualificación rápida';
$string['savechanges'] = 'Gardar os cambios';
$string['savegradingresult'] = 'Cualificación';
$string['savenext'] = 'Gardar e amosar o seguinte';
$string['scale'] = 'Escala';
$string['selectedusers'] = 'Usuarios seleccionados';
$string['selectlink'] = 'Seleccionar...';
$string['selectuser'] = 'Seleccione {$a}';
$string['sendlatenotifications'] = 'Notificar aos cualificadores as entregas fora de prazo';
$string['sendlatenotifications_help'] = 'Se está activado, os cualificadores (normalmente profesores) reciben unha mensaxe cando un alumno fai unha entrega fora de prazo para unha tarefa. Os métodos de mensaxería poden configurarse.';
$string['sendnotifications'] = 'Notificar aos cualificadores sobre entregas';
$string['sendnotifications_help'] = 'Se está activado, os cualificadores (normalmente profesores) reciben unha mensaxe cando un alumno fai unha entrega antes da data requirida, dentro das datas estabelecidas, ou fora de prazo para unha tarefa. Os métodos de mensaxería poden configurarse.';
$string['sendstudentnotifications'] = 'Notificar aos alumnos';
$string['sendstudentnotifications_help'] = 'Se está activado, os alumnos recibirán unha mensaxe sobre a cualificación actualizada ou os comentarios.';
$string['sendsubmissionreceipts'] = 'Enviar un recibo da entrega aos alumnos';
$string['sendsubmissionreceipts_help'] = 'Esta opción activa os recibos de entrega dos alumnos. Os alumnos recibirán unha notificación cada vez que fagan correctamente unha entrega';
$string['setmarkerallocationforlog'] = 'Configurar a signación de corrector : (id={$a->id}, fullname={$a->fullname}, marker={$a->marker}).';
$string['setmarkingallocation'] = 'Estabelecer o corrector asignado';
$string['setmarkingworkflowstate'] = 'Estabelecer o estado do fluxo de traballo de corrección';
$string['setmarkingworkflowstateforlog'] = 'Configurar o estado do fluxo de traballo de cualificación : (id={$a->id}, fullname={$a->fullname}, state={$a->state}).).';
$string['settings'] = 'Configuración da tarefa';
$string['showrecentsubmissions'] = 'Amosar as entregas recentes';
$string['status'] = 'Estado';
$string['submission'] = 'Entrega';
$string['submissioncopiedhtml'] = '<p>Fixo unha copia das súas entregas
de tarefas previas para «<i>{$a->assignment}</i>».</p>
<p>Pode ver o estado da súa <a href="{$a->url}">entrega de tarefa</a>.</p>';
$string['submissioncopiedsmall'] = 'Copiou a súa entrega previa de tarefa en {$a->assignment}';
$string['submissioncopiedtext'] = 'Fixo unha copia da súa entrega
de tarefa previa para «{$a->assignment}»

Pode ver o estado da entrega da súa tarefa:

    {$a->url}';
$string['submissiondrafts'] = 'Requirir que os alumnos preman no botón de entrega';
$string['submissiondrafts_help'] = 'Se está activado, os alumnos terán que premer nun botón «Enviar» para declarar a súa entrega como final. Isto permite que os alumnos manteñan unha versión preliminar da entrega no seu sistema. Se se cambia este axuste «Non» a «Si» despois de que os alumnos xa teñan feito entregas, estas consideraranse como definitivas.';
$string['submissioneditable'] = 'Os alumnos poden editar esta entrega';
$string['submissionempty'] = 'Nada non foi entregado';
$string['submissionnotcopiedinvalidstatus'] = 'A entrega non foi copiada por mor de non ter sido editada posteriormente a que fora reaberta.';
$string['submissionnoteditable'] = 'Os alumnos non poden editar esta entrega';
$string['submissionnotready'] = 'Esta tarefa non está lista para a súa entrega:';
$string['submissionplugins'] = 'Engadidos de entregas';
$string['submissionreceipthtml'] = '<p>Vostede fixo unha entrega para a tarefa «{$a->assignment}»</i>.</p>
<p>
Pode ver o estado da súa <a href="{$a->url}">entrega de tarefa</a>.</p>';
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
$string['submissionstatement'] = 'Declaración da entrega';
$string['submissionstatementacceptedlog'] = 'Declaración para a entrega aceptada polo usuario {$a}';
$string['submissionstatementdefault'] = 'Esta tarefa é o meu propio traballo, agás onde recoñecín o uso do traballo doutras persoas.';
$string['submissionstatement_help'] = 'Declaración de confirmación da entrega de tarefa';
$string['submissionstatus'] = 'Estado da entrega';
$string['submissionstatus_'] = 'Sen entrega';
$string['submissionstatus_draft'] = 'Versión preliminar (non entregada)';
$string['submissionstatusheading'] = 'Estado da entrega';
$string['submissionstatus_marked'] = 'Cualificado';
$string['submissionstatus_new'] = 'Nova entrega';
$string['submissionstatus_reopened'] = 'Reaberto';
$string['submissionstatus_submitted'] = 'Entregado para cualificacións';
$string['submissionsummary'] = '{$a->status}. Última modificación  {$a->timemodified}';
$string['submissionteam'] = 'Grupo';
$string['submissiontypes'] = 'Tipos de entrega';
$string['submitaction'] = 'Entregar';
$string['submitassignment'] = 'Entregar tarefa';
$string['submitassignment_help'] = 'Unha vez que se entregou a tarefa non poderá facer máis cambios.';
$string['submitted'] = 'Entregada';
$string['submittedearly'] = 'A tarefa foi enviada {$a} en prazo';
$string['submittedlate'] = 'A tarefa foi enviada {$a} fóra de prazo';
$string['submittedlateshort'] = '{$a} fora de prazo';
$string['subplugintype_assignfeedback'] = 'Engadido de comentarios';
$string['subplugintype_assignfeedback_plural'] = 'Engadidos de comentarios';
$string['subplugintype_assignsubmission'] = 'Engadido de entregas';
$string['subplugintype_assignsubmission_plural'] = 'Engadidos de entregas';
$string['teamsubmission'] = 'Alumnos que entregan en grupos';
$string['teamsubmissiongroupingid'] = 'Agrupación por grupos de alumnos';
$string['teamsubmissiongroupingid_help'] = 'Esta é a agrupación que a tarefa usará para atopar grupos para os grupos de alumnos. De non estar estabelecido - utilizarase a definición predeterminada de grupos.';
$string['teamsubmission_help'] = 'Si está activado, os alumnos dividiranse en grupos en función da configuración predeterminada dos grupos ou dunha agrupación personalizada. A entrega do grupo será compartida entre os membros do grupo e todos os membros do grupo verán os cambios de todos eles na entrega.';
$string['teamsubmissionstatus'] = 'Estado de entregas de grupo';
$string['textinstructions'] = 'Instrucións da tarefa';
$string['timemodified'] = 'Última modificación';
$string['timeremaining'] = 'Tempo restante';
$string['unlimitedattempts'] = 'Sen límite';
$string['unlimitedattemptsallowed'] = 'Permítense intentos ilimitados.';
$string['unlocksubmissionforstudent'] = 'Permitir entregas do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['unlocksubmissions'] = 'Desbloquear entregas';
$string['updategrade'] = 'Actualizar a cualificación';
$string['updatetable'] = 'Gardar e actualizar a táboa';
$string['upgradenotimplemented'] = 'Actualización no incluída no engadido ({$a->type} {$a->subtype})';
$string['userextensiondate'] = 'Outorgouse unha ampliación ata: {$a}';
$string['usergrade'] = 'Cualificación do usuario';
$string['userswhoneedtosubmit'] = 'Usuarios que deben entregar: {$a}';
$string['validmarkingworkflowstates'] = 'Estados válidos do fluxo de traballo de corrección';
$string['viewbatchmarkingallocation'] = 'Ver a páxina de asignación por lotes dos correctores.';
$string['viewbatchsetmarkingworkflowstate'] = 'Ver a páxina de fluxo de traballo por lotes dos correctores.';
$string['viewfeedback'] = 'Ver comentario';
$string['viewfeedbackforuser'] = 'Ver comentario do usuario: {$a}';
$string['viewfull'] = 'Ver todo';
$string['viewfullgradingpage'] = 'Abrir a páxina global de cualificacións para incluír comentarios';
$string['viewgradebook'] = 'Ver o libro de cualificacións';
$string['viewgrading'] = 'Ver/cualificar todas as entregas';
$string['viewgradingformforstudent'] = 'Ver a pácina de cualificacións do alumno: (id={$a->id}, nome completo={$a->fullname}).';
$string['viewownsubmissionform'] = 'Ver a páxina das propias entregas de tarefas.';
$string['viewownsubmissionstatus'] = 'Ver a páxina de estado das propias entregas de tarefas.';
$string['viewrevealidentitiesconfirm'] = 'Ver a páxina de confirmación para revelar a identidade dos alumnos.';
$string['viewsubmission'] = 'Ver a entrega';
$string['viewsubmissionforuser'] = 'Ver a entrega do usuario: {$a}';
$string['viewsubmissiongradingtable'] = 'Ver a táboa de cualificación das entregas';
$string['viewsummary'] = 'Ver o resumo';
$string['workflowfilter'] = 'Filtro de fluxo de traballo';
