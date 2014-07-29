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
 * Strings for component 'completion', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   completion
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['achievinggrade'] = 'Alcanzando calificación';
$string['activities'] = 'Actividades';
$string['activitiescompleted'] = 'Actividades finalizadas';
$string['activitiescompletednote'] = 'Nota: La frinalización de actividades debe establecrse para que una actividad aparezca en la lista de abajo';
$string['activityaggregation'] = 'Condición requerida';
$string['activityaggregation_all'] = 'TODAS las activdades seleccionadas para finalizar';
$string['activityaggregation_any'] = 'NINGUNA activdad seleccionada para finalizar';
$string['activitycompletion'] = 'Finalización de actividad';
$string['aggregationmethod'] = 'Método de agregación';
$string['all'] = 'Todos';
$string['any'] = 'Cualquiera';
$string['approval'] = 'Aprobación';
$string['badautocompletion'] = 'Cuando selecciona finalización automática, debe también activar al menos un requisito (vid. más abajo)';
$string['completed'] = 'Finalizado';
$string['completedunlocked'] = 'Opciones de finalización desbloqueadas';
$string['completedunlockedtext'] = 'Cuando guarda los cambios, se borrará el estado de finalización de todos los estudiantes. Si cambia de parecer sobre este asunto, no guarde el formulario.';
$string['completedwarning'] = 'Opciones de finalización bloqueadas';
$string['completedwarningtext'] = 'Uno o más estudiantes ({$a}) ya ha(n) marcado esta actividad como finalizada. Cambiar las opciones de finalización borrará su estado de finalización y puede ocasionar confusión. Por tanto, estas opciones han sido bloqueadas y no se deberían desbloquear salvo que fuera absolutamente necesario.';
$string['completion'] = 'Rastreo de finalización';
$string['completionactivitydefault'] = 'Utilizar actividad por defecto';
$string['completion-alt-auto-enabled'] = 'El sistema marca este ítem como finalizado de acuerdo con las condiciones {$a}';
$string['completion-alt-auto-fail'] = 'Finalizado {$a} (no ha alcanzado la calificación de aprobado)';
$string['completion-alt-auto-n'] = 'Sin finalizar: {$a}';
$string['completion-alt-auto-pass'] = 'Finalizado: {$a} (ha alcanzado la calificación de aprobado)';
$string['completion-alt-auto-y'] = 'Finalizado: {$a}';
$string['completion-alt-manual-enabled'] = 'Los estudiantes pueden marcar manualmente este ítem como finalizado: {$a}';
$string['completion-alt-manual-n'] = 'No finalizado; {$a}. Seleccione para marcar como finalizado';
$string['completion-alt-manual-y'] = 'Finalizado; {$a} seleccione para marcar como no finalizado';
$string['completion_automatic'] = 'Mostrar la actividad como completada cuando se cumplan las condiciones';
$string['completiondefault'] = 'Seguimiento de finalización por defecto';
$string['completiondisabled'] = 'Desactivado, no se muestra en los ajustes de la actividad';
$string['completionduration'] = 'Matriculaciçon';
$string['completionenabled'] = 'Activado, control por medio de los ajustes de finalización y de actividad';
$string['completionexpected'] = 'Se espera finalizar en';
$string['completionexpected_help'] = 'Esta opción especifica la fecha en que se espera que la actividad esté finalizada. La fecha no se muestra a los estudiantes y aparece únicamente en el informe de progreso.';
$string['completion-fail'] = 'Finalizado (no ha alcanzado la calificación de aprobado)';
$string['completion_help'] = 'Si se activa esta opción, se rastrea el grado de finalización de cualquier actividad, bien manual, bien automáticamente, basándose en determinadas condiciones. Si se desea, se pueden fijar múltiples condiciones. Si se hace así, la actividad únicamente se considerará completa si se cumplen TODAS las condiciones.

Una marca al lado del nombre de la actividad enla página del curso indica cuándo la actividad está completa.';
$string['completionicons'] = 'Casillas para marcar el grado de finalización';
$string['completionicons_help'] = 'Una marca junto al nombre de la actividad puede utilizarse para indicar que una actividad se completó.

Si se muestra una casilla con el borde punteado, la marca aparecerá automáticamente cuando se haya completado la actividad de acuerdo con las condiciones establecidas por el profesor.

Si se muestra una casilla con el borde sólido, entonces será posible hacer clic sobre ella cuando piense que ha finalizado la actividad. (Si se vuelve a hacer clic sobre ella, la marca desaparece en caso de que haya cambiado de opinión). Esto es una acción opcional que se utiliza para llevar un seguimiento personal del progreso a través del curso.';
$string['completion_manual'] = 'Los estudiantes pueden marcar manualmente la actividad como completada';
$string['completionmenuitem'] = 'Finalización';
$string['completion-n'] = 'No finalizado';
$string['completion_none'] = 'No indicar finalización de la actividad';
$string['completionnotenabled'] = 'Completar curso no está habilitada';
$string['completionnotenabledforcourse'] = 'Completar curso no está habilitada';
$string['completionnotenabledforsite'] = 'Completar curso no está habilitada';
$string['completionondate'] = 'Fecha';
$string['completionondatevalue'] = 'Los usuarios permanecerán matriculados hasta';
$string['completion-pass'] = 'Finalizado (ha alcanzado la califiación de aprobado)';
$string['completionsettingslocked'] = 'Ajustes de finalización bloqueados';
$string['completion-title-manual-n'] = 'Marcar como finalizado: {$a}';
$string['completion-title-manual-y'] = 'Marcar como no finalizado: {$a}';
$string['completionusegrade'] = 'Requerir calificación';
$string['completionusegrade_desc'] = 'El estudiante debe recibir una calificación para finalizar esta actividad';
$string['completionusegrade_help'] = 'Si se activa, la actividad se considera finalizada cuando un estudiante recibe una calificación. Los iconos Aprobar y Suspender se muestran si se ha establecido una calificación de aprobado para la actividad.';
$string['completionview'] = 'Requerir ver';
$string['completionview_desc'] = 'El estudiante debe ver esta actividad para finalizarla';
$string['completion-y'] = 'Finalizado';
$string['configcompletiondefault'] = 'Configuración predeterminada para el seguimiento de la finalización cuando se crean nuevas actividades.';
$string['configenablecompletion'] = 'Si se activa esta opción, se vuelve a las características del rastreo (progreso) del grado de finalización en el nivel curso.';
$string['confirmselfcompletion'] = 'Confirmar completar automáticamente';
$string['courseaggregation'] = 'Condición requerida';
$string['courseaggregation_all'] = 'TODOS los cursos sleccionados para finalizarlos';
$string['courseaggregation_any'] = 'NINGÚN curso sleccionado para finalizar';
$string['coursealreadycompleted'] = 'Usted ya ha finalizado este curso';
$string['coursecomplete'] = 'Curso finalizado';
$string['coursecompleted'] = 'Curso finalizado';
$string['coursecompletion'] = 'Finalización del curso';
$string['coursecompletioncondition'] = 'Condición: {$a}';
$string['coursegrade'] = 'Calificación del curso';
$string['coursesavailable'] = 'Cursos disponibles';
$string['coursesavailableexplaination'] = 'Nota: Los criterios del grado de finalización del curso deben ajustarse para que el curso aparezca en esta lista';
$string['criteria'] = 'Criterios';
$string['criteriagroup'] = 'Grupo de criterios';
$string['criteriarequiredall'] = 'Son necesarios todos los criterios que aparecen más abajo';
$string['criteriarequiredany'] = 'Es necesario cualquiera de los criterios que aparecen más abajo';
$string['csvdownload'] = 'Descargar en formato de hoja de cálculo (UTF-8.csv)';
$string['datepassed'] = 'Fecha pasada';
$string['days'] = 'Días';
$string['daysoftotal'] = '{$a->days} de {$a->total}';
$string['deletecompletiondata'] = 'Borrar datos de finalización';
$string['dependencies'] = 'Dependencias';
$string['dependenciescompleted'] = 'Dependencias finalizadas';
$string['editcoursecompletionsettings'] = 'Editar ajustes de grado de finalización del curso';
$string['enablecompletion'] = 'Habilitar rastreo del grado de finalización';
$string['enablecompletion_help'] = 'Una vez activada, la configuración de seguimiento de finalización se muestran en la página de seguimiento de finalización, y en la configuración de la actividad.';
$string['enrolmentduration'] = 'Periodo de tiempo de la matrícula';
$string['enrolmentdurationlength'] = 'El usuario debe permanecer matriculado por';
$string['err_noactivities'] = 'No está habilitada la información sobre la finalización de ninguna actividad. Puede activar la información sobre la finalización de una actividad editando su  parámetros de configuración.';
$string['err_nocourses'] = 'La finalización del curso no está habilitada para ningú otro curso, por lo que no se puede mostrar ninguno. Puede activar la finalización de cursos mediante los parámetros de configuración del curso.';
$string['err_nograde'] = 'En este curso no se ha establecido una calificación para pasar el curso. Para activar este tipo de criterio, debe crear una calificación para pasar el curso.';
$string['err_noroles'] = 'No hay roles con los permisos \'moodle/course:markcomplete\' en este curso.';
$string['err_nousers'] = 'No hay estudiantes ni grupos en este curso para los que se muestre la información sobre finalización. (Por defecto, la información sobre finalización se muestra solo para estudiantes, por lo que si no hay estudiantes verá este error. Los administradores pueden modificar esta opción mediante las pantallas de administración)';
$string['err_settingslocked'] = 'Uno o más estudiantes han finalizado ya  un criterio, por lo que los parámetros han sido bloqueados. Desbloquer los parámetros de los criterios de finalización borrará cualquier dato de usuario lo que podría causar confusión.';
$string['err_system'] = 'Se ha producido un error interno en el sistema de finalización. (Los administradores del sistema pueden habilitar la información de seguimiento para ver más detalles)';
$string['eventcoursecompleted'] = 'Curso finalizado';
$string['eventcoursecompletionupdated'] = 'Finalización de curso actualizado';
$string['eventcoursemodulecompletionupdated'] = 'Finalización de curso actualizado';
$string['excelcsvdownload'] = 'Descargar en formato compatible con Excel (.csv)';
$string['fraction'] = 'Fracción';
$string['graderequired'] = 'Calificación de curso requerida';
$string['gradexrequired'] = '{$a} requerido';
$string['inprogress'] = 'En curso';
$string['manualcompletionby'] = 'Finalización manual por otros';
$string['manualcompletionbynote'] = 'Nota: LA capcidad moodle/courrse:markcomplete debe ser poermitida para que un rol aparezca en la lista';
$string['manualselfcompletion'] = 'Autocompletar manualmente';
$string['manualselfcompletionnote'] = 'Nota: El bloque Autocompletar debería añadirse al curso si autocompletar manualmente está habilitado.';
$string['markcomplete'] = 'Marcar completo';
$string['markedcompleteby'] = 'Marcado completo por {$a}';
$string['markingyourselfcomplete'] = 'Marcado propio completado';
$string['moredetails'] = 'Más detalles';
$string['nocriteriaset'] = 'No hay criterios establecidos para la terminación de este curso';
$string['notcompleted'] = 'No finalizado';
$string['notenroled'] = 'Usted no está matriculado en este curso';
$string['nottracked'] = 'En este momento no se le está realizando un seguimiento en la finalización de este curso';
$string['notyetstarted'] = 'Aún no comenzado';
$string['overallaggregation'] = 'Requisitos de finalización';
$string['overallaggregation_all'] = 'El curso está finalizado cuando TODAS las condiciones se han cumplido';
$string['overallaggregation_any'] = 'El curso está finalizado cuando ALGUNA de las condiciones se ha cumplido';
$string['pending'] = 'Pendiente';
$string['periodpostenrolment'] = 'Periodo después de la matriculación';
$string['progress'] = 'Progreso del estudiante';
$string['progress-title'] = '{$a->user}, {$a->activity}: {$a->state} {$a->date}';
$string['progresstotal'] = 'Progreso: {$a->complete} / {$a->total}';
$string['recognitionofpriorlearning'] = 'Reconocimiento de aprendizaje previo';
$string['remainingenroledfortime'] = 'Permanecer matriculado durante un periodo de tiempo especificado';
$string['remainingenroleduntildate'] = 'Permanecer matriculado hasta una fecha especificada';
$string['reportpage'] = 'Mostrando usuarios {$a->from} a {$a->to} de {$a->total}.';
$string['requiredcriteria'] = 'Criterios necesarios';
$string['restoringcompletiondata'] = 'Escribiendo datos de grado de finalización';
$string['roleaggregation'] = 'Condiciones requeridas';
$string['roleaggregation_all'] = 'TODOS los roles seleccionados a marcar cuando se cumple la condición';
$string['roleaggregation_any'] = 'ALGUNO de los roles seleccionados a marcar cuando se cumple la condición';
$string['saved'] = 'Guardado';
$string['seedetails'] = 'Ver detalles';
$string['self'] = 'Auto';
$string['selfcompletion'] = 'Completar automáticamente';
$string['showinguser'] = 'Mostrando usuario';
$string['unenrolingfromcourse'] = 'Dando de baja del curso';
$string['unenrolment'] = 'Dar de baja';
$string['unit'] = 'Unidad';
$string['unlockcompletion'] = 'Desbloquear opciones de grado de finalización';
$string['unlockcompletiondelete'] = 'Desbloquear opciones de grado de finalización y eliminar los datos de grado de finalización del usuario';
$string['usealternateselector'] = 'Usar el selector de curso alternativo';
$string['usernotenroled'] = 'El usuario no está matriculado en este curso';
$string['viewcoursereport'] = 'Ver informe del curso';
$string['viewingactivity'] = 'Viendo los {$a}';
$string['writingcompletiondata'] = 'Escribiendo los datos del grado de finalización';
$string['xdays'] = '{$a} días';
$string['yourprogress'] = 'Su progreso';
