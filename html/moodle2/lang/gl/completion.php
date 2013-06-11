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
 * Strings for component 'completion', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = 'Acadando a cualificación';
$string['activities'] = 'Actividades';
$string['activitiescompleted'] = 'Actividades completadas';
$string['activitycompletion'] = 'Completado da actividade';
$string['afterspecifieddate'] = 'Despois dunha data especificada';
$string['aggregationmethod'] = 'Método de agregación';
$string['all'] = 'Todos';
$string['any'] = 'Calquera';
$string['approval'] = 'Aprobación';
$string['badautocompletion'] = 'Cando selecciona o completado automático, debe activar tamén polo menos un requisito (vid. máis abaixo)';
$string['completed'] = 'Completado';
$string['completedunlocked'] = 'Opcións de completado desbloqueadas';
$string['completedunlockedtext'] = 'Cando garda os cambios, borrase o estado de completado de todos os alumnos. Se cambia de parecer sobre isto, non garde o formulario.';
$string['completedwarning'] = 'Opcións de completado bloqueadas';
$string['completedwarningtext'] = 'Un ou máis alumnos ({$a}) xa marcaron esta actividade como completada. Cambiar as opcións de completado borrará o seu estado de completado e pode causar confusión. Polo tanto, estas opcións foron bloqueadas e non se deberían desbloquear agás que for absolutamente necesario.';
$string['completion'] = 'Seguimento de completado';
$string['completion-alt-auto-enabled'] = 'O sistema marca este elemento como completado conforme coas condicións: {$a}';
$string['completion-alt-auto-fail'] = 'Completado {$a} (non acadou a cualificación de aprobado)';
$string['completion-alt-auto-n'] = 'Sen completar: {$a}';
$string['completion-alt-auto-pass'] = 'Completado {$a} (acadou a cualificación de aprobado)';
$string['completion-alt-auto-y'] = 'Completado: {$a}';
$string['completion-alt-manual-enabled'] = 'Os alumnos poden marcar manualmente este elemento como completado: {$a}';
$string['completion-alt-manual-n'] = 'Sen completar: {$a}. Seleccione para marcar como completado.';
$string['completion-alt-manual-y'] = 'Completado: {$a}. Seleccione para marcar como sen completar.';
$string['completion_automatic'] = 'Amosar a actividade como completada cando se cumpran as condicións';
$string['completiondependencies'] = 'Completado das dependencias';
$string['completiondisabled'] = 'Desactivado, non se amosa na configuración da actividade';
$string['completionenabled'] = 'Activado, control por medio da configuración de completado e de actividade';
$string['completionexpected'] = 'Agardase completala en';
$string['completionexpected_help'] = 'Este axuste especifica a data na que agarda que a actividade estea completada. A data non se lle amosa aos alumnos e presentase unicamente no informe de progreso.';
$string['completion-fail'] = 'Completado (non acadou a cualificación de aprobado)';
$string['completion_help'] = 'Se está activada esta opción, faise un seguimento do grado de completado de calquera actividade, ben manual, ben automaticamente, baseándose en determinadas condicións. Pódense fixar múltiplas condicións. De ser así, a actividade unicamente se considerará completada cando se cumpran TODAS as condicións.

Una marca a carón do nome da actividade na páxina do curso indica cando está completada a actividade.';
$string['completionicons'] = 'Caixiñas para marcar o grado de completado';
$string['completion_link'] = 'activity/completion';
$string['completion_manual'] = 'Os alumnos poden marcar manualmente a actividade como completada';
$string['completionmenuitem'] = 'Completado';
$string['completion-n'] = 'Sen completar';
$string['completion_none'] = 'Non indicar o completado da actividade';
$string['completionnotenabled'] = 'O completado non está activado';
$string['completionnotenabledforcourse'] = 'O completado non está activado para este curso';
$string['completionnotenabledforsite'] = 'O completado non está activado para este sitio';
$string['completiononunenrolment'] = 'Completado ao dar de baixa (da matrícula)';
$string['completion-pass'] = 'Completado (acadou a cualificación de aprobado)';
$string['completionsettingslocked'] = 'Configuración de completado bloqueados';
$string['completion-title-manual-n'] = 'Marcar como completado: {$a}';
$string['completion-title-manual-y'] = 'Marcar como sen completar: {$a}';
$string['completionusegrade'] = 'Require cualificación';
$string['completionusegrade_desc'] = 'O alumno debe recibir unha cualificación para completar esta actividade';
$string['completionusegrade_help'] = 'Se está activada, a actividade considerase completada cando un alumno recibe unha cualificación. As iconas Aprobar e Suspender preséntanse se foi estabelecida unha cualificación de aprobado para a actividade.';
$string['completionview'] = 'Requirir ver';
$string['completionview_desc'] = 'O alumno debe ver esta actividade para completala';
$string['completion-y'] = 'Completado';
$string['configenablecompletion'] = 'Cando se activa, volvese ás características de seguimento (progreso) do grado de completado no nivel do curso.';
$string['confirmselfcompletion'] = 'Confirmar o completado propio';
$string['coursealreadycompleted'] = 'Vostede xa completou este curso';
$string['coursecomplete'] = 'Completado do curso';
$string['coursecompleted'] = 'Curso completado';
$string['coursegrade'] = 'Cualificación do curso';
$string['coursesavailable'] = 'Cursos dispoñíbeis';
$string['coursesavailableexplaination'] = '<i>Deben estabelecerse os criterios do grado de completado para que o curso apareza nesta lista</i>';
$string['criteria'] = 'Criterios';
$string['criteriagradenote'] = 'Teña en conta que actualizar a cualificación requirida aquí non actualizará a cualificación actual de aprobado do curso.';
$string['criteriagroup'] = 'Grupo de criterios';
$string['criteriarequiredall'] = 'Requírense todos os criterios que aparecen embaixo';
$string['criteriarequiredany'] = 'Requírese calquera dos criterios que aparecen embaixo';
$string['csvdownload'] = 'Descargar en formato de folla de cálculo (UTF-8 .csv)';
$string['datepassed'] = 'data do aprobado';
$string['days'] = 'Días';
$string['daysafterenrolment'] = 'Días despois da matriculación';
$string['dependencies'] = 'Dependencias';
$string['dependenciescompleted'] = 'Completáronse as dependencias';
$string['durationafterenrolment'] = 'Duración despois da matriculación';
$string['editcoursecompletionsettings'] = 'Editar a configuración de completado do curso';
$string['enablecompletion'] = 'Activar o seguimento do progreso (para o completado)';
$string['enrolmentduration'] = 'Días restantes';
$string['err_noactivities'] = 'No está activada a información sobre o completado de ningunha actividade, polo que non é posíbel presentar ningunha. Pode activar a información sobre o completado dunha actividade editando a súa configuración.';
$string['err_nocourses'] = 'O completado de curso non está activado para ningún outro curso, polo que non é posíbel presentar ningún. Pode activar o completado de cursos mediante a configuración do curso.';
$string['err_nograde'] = 'Neste curso non se estabeleceu unha cualificación de aprobado. Para activar este tipo de criterio, debe crear unha cualificación de aprobado.';
$string['err_noroles'] = 'Non hai roles cos permisos «moodle/course:markcomplete» neste curso. Pode activar este tipo de criterio engadindo este permiso ao(s) rol(es).';
$string['err_nousers'] = 'Non hai alumnos nin grupos neste curso aos que presentar a información sobre completado. (De xeito predeterminado, a información sobre completado presentase só aos alumnos, polo que se non hai alumnos verá este erro. Os administradores poden modificar esta opción mediante as pantallas de administración)';
$string['err_settingslocked'] = 'Un ou máis alumnos xa teñen completado un criterio, polo que a configuración foi bloqueada. Desbloquear a configuración dos criterios de completado eliminará calquera dato de usuario o que podería causar confusión.';
$string['err_system'] = 'Produciuse un erro interno no sistema de completado. (Os administradores do sistema poden activar a información de depuración para ver máis detalles.)';
$string['excelcsvdownload'] = 'Descargar en formato compatíbel con Excel (.csv)';
$string['fraction'] = 'Fracción';
$string['graderequired'] = 'Requírese unha cualificación';
$string['inprogress'] = 'En progreso';
$string['manualcompletionby'] = 'Completado manual por';
$string['manualselfcompletion'] = 'Completado propio manual';
$string['markcomplete'] = 'Marcar como completado';
$string['markedcompleteby'] = 'Marcado como completado por {$a}';
$string['markingyourselfcomplete'] = 'Marcado como completado por vostede';
$string['moredetails'] = 'Máis detalles';
$string['nocriteriaset'] = 'Non hai criterios estabelecidos para o completado deste curso';
$string['notcompleted'] = 'Sen completar';
$string['notenroled'] = 'Vostede non está matriculado neste curso';
$string['notyetstarted'] = 'Aínda non comezou';
$string['overallcriteriaaggregation'] = 'Criterios xerais do tipo agregación';
$string['pending'] = 'Pendente';
$string['periodpostenrolment'] = 'Período despois da matriculación';
$string['progress'] = 'Progreso do alumno';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = 'Progreso: {$a->complete} / {$a->total}';
$string['recognitionofpriorlearning'] = 'Recoñecemento de aprendizaxe previa';
$string['remainingenroledfortime'] = 'Permanecer matriculado durante un período de tempo especificado';
$string['remainingenroleduntildate'] = 'Permanecer matriculado ata unha data especificada';
$string['reportpage'] = 'Amosando os usuarios {$a->from} a {$a->to} de {$a->total}.';
$string['requiredcriteria'] = 'Criterios requiridos';
$string['restoringcompletiondata'] = 'Escribindo os datos do grado de completado';
$string['saved'] = 'Gardado';
$string['seedetails'] = 'Ver detalles';
$string['self'] = 'Propio';
$string['selfcompletion'] = 'Completado propio';
$string['showinguser'] = 'Amosando o usuario';
$string['unenrolingfromcourse'] = 'Dando de baixa do curso';
$string['unenrolment'] = 'Dar de baixa';
$string['unit'] = 'Unidade';
$string['unlockcompletion'] = 'Desbloquear as opcións do grado de completado';
$string['unlockcompletiondelete'] = 'Desbloquear as opcións de completado e eliminar os datos do grado de completado do usuario';
$string['usealternateselector'] = 'Usar o selector de curso alternativo';
$string['usernotenroled'] = 'O usuario non está matriculado neste curso';
$string['viewcoursereport'] = 'Ver o informe do curso';
$string['viewingactivity'] = 'Vendo os {$a}';
$string['writingcompletiondata'] = 'Escribindo os datos do grado de completado';
$string['xdays'] = '{$a} días';
$string['yourprogress'] = 'O seu progreso';
