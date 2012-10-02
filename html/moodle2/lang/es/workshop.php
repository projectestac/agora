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
 * Strings for component 'workshop', language 'es', branch 'MOODLE_23_STABLE'
 *
 * @package   workshop
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesscontrol'] = 'Control de acceso';
$string['aggregategrades'] = 'Recalcular los resultados';
$string['aggregation'] = 'Agregación de calificaciones';
$string['allocate'] = 'Asignar envíos';
$string['allocatedetails'] = 'esperado: {$a->expected}<br />presentado: {$a->submitted}<br />to asignado: {$a->allocate}';
$string['allocation'] = 'Presentación';
$string['allocationdone'] = 'Asignación hecha';
$string['allocationerror'] = 'Error de asignación';
$string['allsubmissions'] = 'Todos los envíos ({$a})';
$string['alreadygraded'] = 'Ya calificada';
$string['areainstructauthors'] = 'Instrucciones para el envío';
$string['areainstructreviewers'] = 'Instrucciones para la evaluación';
$string['areasubmissionattachment'] = 'Adjuntos al envío';
$string['areasubmissioncontent'] = 'Textos del envío';
$string['assess'] = 'Evaluar';
$string['assessedexample'] = 'Envío de ejemplo evaluado';
$string['assessedsubmission'] = 'Envío evaluado';
$string['assessingexample'] = 'Evaluando envío de ejemplo';
$string['assessingsubmission'] = 'Evaluando envío';
$string['assessmentbyfullname'] = 'Evaluación por {$a}';
$string['assessmentbyyourself'] = 'Auto-evaluación';
$string['assessmentdeleted'] = 'Evaluación desasignada';
$string['assessmentend'] = 'Fecha límite de las evaluaciones';
$string['assessmentenddatetime'] = 'Plazo de evaluación: {$a->daydatetime} ({$a->distanceday})';
$string['assessmentform'] = 'Formulario de evaluación';
$string['assessmentofsubmission'] = '<a href="{$a->assessmenturl}">Evaluación</a> de <a href="{$a->submissionurl}">{$a->submissiontitle}</a>';
$string['assessmentreference'] = 'Evaluación de referencia';
$string['assessmentreferenceneeded'] = 'Usted tiene que evaluar este envío de ejemplo, para proporcionar una evaluación de referencia. Haga clic en el botón "Continuar" para evaluar el envío.';
$string['assessmentsettings'] = 'Configuración de la evaluación';
$string['assessmentstart'] = 'Comienzo de las evaluaciones';
$string['assessmentstartdatetime'] = 'Abierto para evaluación {$a->daydatetime} ({$a->distanceday})';
$string['assessmentweight'] = 'Ponderación de la evaluación';
$string['assignedassessments'] = 'Envíos asignados para evaluar';
$string['assignedassessmentsnone'] = 'No tiene envíos asignados para evaluar';
$string['backtoeditform'] = 'Volver al formulario de edición';
$string['byfullname'] = 'por <a href="{$a->url}">{$a->name}</a>';
$string['calculategradinggrades'] = 'Calcular calificaciones de evaluación';
$string['calculategradinggradesdetails'] = 'esperadas: {$a->expected}<br />calculadas: {$a->calculated}';
$string['calculatesubmissiongrades'] = 'Calcular calificaciones de evaluación';
$string['calculatesubmissiongradesdetails'] = 'esperadas: {$a->expected}<br />calculadas: {$a->calculated}';
$string['chooseuser'] = 'Seleccionar un usuario...';
$string['clearaggregatedgrades'] = 'Limpiar todas las calificaciones de evaluación';
$string['clearaggregatedgradesconfirm'] = '¿Está seguro de que desea borrar las calificaciones calculadas para los envíos y las calificaciones de la evaluación?';
$string['clearaggregatedgrades_help'] = 'Las calificaciones agregadas para presentar y las calificaciones de evaluación se restablecerán. Puede volver a calcular estas calificaciones desde el princio en la Fase de calificaciones de evaluación.';
$string['clearassessments'] = 'Borrar evaluaciones';
$string['clearassessmentsconfirm'] = '¿Está seguro que desea borrar todas las calificaciones de evaluación?. No podrá obtener de nuevo la información po si mismo, los correctores tendrán que volver a evaluar las entregas asignadas.';
$string['clearassessments_help'] = 'Las calificaciones calculadas para los envíos y las calificaciones de evlauación se restablecerán. La información sobre los formularios de evaluación están cumplimentados y se conservan aún, pero todos los encuestados debe abrir el formulario de evaluación de nuevo y volver a guardarlo para obtener las calificaciones calculadas de nuevo';
$string['configexamplesmode'] = 'Modo por defecto en lo ejemplos de evaluación en los talleres';
$string['configgrade'] = 'Calificación máxima por defecto para su envío en los talleres';
$string['configgradedecimals'] = 'Por defecto, número de dígitos que deben figurar después del punto decimal cuando se muestran las calificaciones';
$string['configgradinggrade'] = 'Por defecto, calificación máxima en la evaluación de los talleres';
$string['configmaxbytes'] = 'Por defecto, tamaño máximo del archivo entregado en todos los talleres del sitio (sujeto a las limitaciones del curso y a otros parámetros locales)';
$string['configstrategy'] = 'Estrategia de calificación predeterminada para los talleres';
$string['createsubmission'] = 'Enviar';
$string['daysago'] = 'hace {$a} días';
$string['daysleft'] = 'faltan {$a} días';
$string['daystoday'] = 'hoy';
$string['daystomorrow'] = 'mañana';
$string['daysyesterday'] = 'ayer';
$string['editassessmentform'] = 'Editar formulario de evaluación';
$string['editassessmentformstrategy'] = 'Editar formulario de evaluación (${a})';
$string['editingassessmentform'] = 'Editar formulario de evaluación';
$string['editingsubmission'] = 'Edición de la entrega';
$string['editsubmission'] = 'Editar envío';
$string['err_multiplesubmissions'] = 'Durante la edición de esta forma, otra versión de la entrega se ha guardado. No se permiten presentaciones múltiples por usuario. ';
$string['err_removegrademappings'] = 'No se pueden eliminar las asignaciones de calificación no usadas';
$string['evaluategradeswait'] = 'Por favor, espere hasta que se hyan ralizado las evaluaciones  y calculado las calificaciones';
$string['evaluation'] = 'Clasificación de la evaluación';
$string['evaluationmethod'] = 'Método de clasificación de la evaluación';
$string['evaluationmethod_help'] = 'El método de calificación de la evaluación determina cómo se calculan las calificaciones. En este momento hay sólo una opción - \'comparación con la mejor evaluación\'.';
$string['example'] = 'Envío de ejemplo';
$string['exampleadd'] = 'Agregar envío de ejemplo';
$string['exampleassess'] = 'Evaluar envío de ejemplo';
$string['exampleassessments'] = 'Envíos de ejemplo a evaluar';
$string['exampleassesstask'] = 'Evaluar ejemplos';
$string['exampleassesstaskdetails'] = 'esperados: {$a->expected}<br />assessed: {$a->assessed}';
$string['examplecomparing'] = 'Comparación de las evaluaciones del envío de ejemplo';
$string['exampledelete'] = 'Eliminar ejemplo';
$string['exampledeleteconfirm'] = '¿Está seguro de que desea eliminar el siguiente envío de ejemplo? Haga clic en \'Continuar\' para eliminar el envío.';
$string['exampleedit'] = 'Editar ejemplo';
$string['exampleediting'] = 'Editando ejemplo';
$string['exampleneedassessed'] = 'Usted tiene que evaluar todos los envíos de ejemplo en primer lugar';
$string['exampleneedsubmission'] = 'Usted tiene que enviar su trabajo y evaluar todos los envíos de ejemplo';
$string['examplesbeforeassessment'] = 'Los ejemplos están disponibles después de su propio envío, y deben ser evaluados antes de la evaluación por pares';
$string['examplesbeforesubmission'] = 'Los ejemplos deben ser evaluados antes del propio envío';
$string['examplesmode'] = 'Modo de evaluación de ejemplos';
$string['examplesubmissions'] = 'Envíos de ejemplo';
$string['examplesvoluntary'] = 'La evaluación de envíos de ejemplo es voluntaria';
$string['feedbackauthor'] = 'Retroalimentación para el autor';
$string['feedbackreviewer'] = 'Retroalimentación para el revisor';
$string['formataggregatedgrade'] = '{$a->grade}';
$string['formataggregatedgradeover'] = '<del>{$a->grade}</del><br /><ins>{$a->over}</ins>';
$string['formatpeergrade'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span>';
$string['formatpeergradeover'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span>';
$string['formatpeergradeoverweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">(<del>{$a->gradinggrade}</del> / <ins>{$a->gradinggradeover}</ins>)</span> @ <span class="weight">{$a->weight}</span>';
$string['formatpeergradeweighted'] = '<span class="grade">{$a->grade}</span> <span class="gradinggrade">({$a->gradinggrade})</span> @ <span class="weight">{$a->weight}</span>';
$string['givengrades'] = 'Calificaciones otorgadas';
$string['gradecalculated'] = 'Calificación calculada para el envío';
$string['gradedecimals'] = 'Decimales en las calificaciones';
$string['gradegivento'] = '&gt;';
$string['gradeinfo'] = 'Calificación: {$a->received} of {$a->max}';
$string['gradeitemassessment'] = '{$a->workshopname} (evaluación)';
$string['gradeitemsubmission'] = '{$a->workshopname} (envío)';
$string['gradeover'] = 'Pasar por alto calificación del envío';
$string['gradereceivedfrom'] = '&lt;';
$string['gradesreport'] = 'Informe de calificaciones del Taller';
$string['gradinggrade'] = 'Calificación de la evaluación';
$string['gradinggradecalculated'] = 'Calificación calculada de la evaluación';
$string['gradinggrade_help'] = 'Este ajuste especifica la calificación máxima que puede obtenerse en la evaluación de un envío';
$string['gradinggradeof'] = 'Calificación de la evaluación (de {$a})';
$string['gradinggradeover'] = 'Pasar por alto calificación de la evaluación';
$string['gradingsettings'] = 'Ajustes de calificación';
$string['iamsure'] = 'Sí, estoy seguro';
$string['info'] = 'Info';
$string['instructauthors'] = 'Instrucciones para el envío';
$string['instructreviewers'] = 'Instrucciones para la evaluación';
$string['introduction'] = 'Introducción';
$string['latesubmissions'] = 'Envíos de última hora';
$string['latesubmissionsallowed'] = 'Se permiten envíos de última hora';
$string['latesubmissions_desc'] = 'Permitir envíos fuera de plazo';
$string['latesubmissions_help'] = 'Si está activada esta opción, un autor puede enviar su trabajo fuera de plazo o durante la fase de evaluación. Sin embargo, los envíos de última hora no se pueden editar.';
$string['maxbytes'] = 'Tamaño máximo del archivo';
$string['modulename'] = 'Taller';
$string['modulenameplural'] = 'Talleres';
$string['mysubmission'] = 'Mi envío';
$string['nattachments'] = 'Número máximo de archivos adjuntos por envío';
$string['noexamples'] = 'Aún no hay ejemplos en este Taller';
$string['noexamplesformready'] = 'Debe definir la forma de evaluación antes de proporcionar envíos de ejemplo';
$string['nogradeyet'] = 'Aún no hay calificación';
$string['nosubmissionfound'] = 'No se han encontrado envíos de este usuario';
$string['nosubmissions'] = 'Aún no hay envíos en este taller';
$string['notassessed'] = 'Aún no evaluado';
$string['nothingtoreview'] = 'Nada que revisar';
$string['notoverridden'] = 'No anulado';
$string['noworkshops'] = 'No hay talleres en este curso';
$string['noyoursubmission'] = 'Usted aún no ha enviado su trabajo';
$string['nullgrade'] = '-';
$string['page-mod-workshop-x'] = 'Cualquier página del módulo Taller';
$string['participant'] = 'Participante';
$string['participantrevierof'] = 'El participante es revisor de';
$string['participantreviewedby'] = 'El participante es revisado por';
$string['phaseassessment'] = 'Fase de evaluación';
$string['phaseclosed'] = 'Cerrado';
$string['phaseevaluation'] = 'Fase de evaluación de calificaciones';
$string['phasesetup'] = 'Fase de configuración';
$string['phasesubmission'] = 'Fase de envío';
$string['pluginadministration'] = 'Administración del Taller';
$string['pluginname'] = 'Taller';
$string['prepareexamples'] = 'Preparar envíos de ejemplo';
$string['previewassessmentform'] = 'Vista previa';
$string['publishedsubmissions'] = 'Envíos publicados';
$string['publishsubmission'] = 'Publicar envío';
$string['publishsubmission_help'] = 'Los envíos publicados están disponibles cuando el taller esté cerrado.';
$string['reassess'] = 'Reevaluar';
$string['receivedgrades'] = 'Calificaciones recibidas';
$string['recentassessments'] = 'Evaluaciones del Taller:';
$string['recentsubmissions'] = 'Envíos del Taller:';
$string['saveandclose'] = 'Guardar y cerrar';
$string['saveandcontinue'] = 'Guardar y continuar editando';
$string['saveandpreview'] = 'Guardar y previsualizar';
$string['selfassessmentdisabled'] = 'Auto-evaluación deshabilitada';
$string['someuserswosubmission'] = 'Al menos un autor aún no ha enviado su trabajo';
$string['sortasc'] = 'Clasificacion ascendente';
$string['sortdesc'] = 'Clasificación descendente';
$string['strategy'] = 'Estrategia de calificación';
$string['strategyhaschanged'] = 'La estrategia de calificación del taller ha cambiado desde que el formulario fue abierto para editarlo.';
$string['strategy_help'] = '<p>La estrategia de clasificación determina la forma de evaluación utilizados y el método de califiación de los envíos. Hay 4 opciones:</p>
<p> * Clasificación acumulativa - Se realizan comentarios y calificaciones sobre los aspectos especificados.>7p>
* <p>Comentarios - Se hacen comentarios sobre aspectos específicos, pero no se califica.</p>
<p> * Número de errores - Se realizan comentarios y una calificacion tipo sí/no sobre las afirmaciones realizadas.</p>
 * Rúbrica - Se realiza una evaluación de nivel respecto a los criterios especificados';
$string['submission'] = 'Envío';
$string['submissionattachment'] = 'Adjunto';
$string['submissionby'] = 'Envío por {$a}';
$string['submissioncontent'] = 'Contenido del envío';
$string['submissionend'] = 'Fecha límite de los envíos';
$string['submissionenddatetime'] = 'Plazo de presentación: {$a->daydatetime} ({$a->distanceday})';
$string['submissiongrade'] = 'Calificación del envío';
$string['submissiongrade_help'] = 'Esta configuración especifica la calificación máxima que se puede obtener en los trabajos enviados.';
$string['submissiongradeof'] = 'Califiación del envío (de {$a})';
$string['submissionsettings'] = 'Parámetros de presentación';
$string['submissionstart'] = 'Abierto para envíos desde';
$string['submissionstartdatetime'] = 'Abierto para entregas desde {$a->daydatetime} ({$a->distanceday})';
$string['submissiontitle'] = 'Título';
$string['subplugintype_workshopallocation_plural'] = 'Presentación de los métodos de asignación';
$string['subplugintype_workshopeval'] = 'Método de clasificación de la evaluación';
$string['subplugintype_workshopeval_plural'] = 'Calificación de los métodos de evaluación';
$string['subplugintype_workshopform'] = 'Estrategia de calificación';
$string['subplugintype_workshopform_plural'] = 'Estrategias de calificación';
$string['switchingphase'] = 'Fase de cambio';
$string['switchphase'] = 'Cambiar fase';
$string['switchphase10info'] = 'Está a punto de entrar a la <strong>Fase de instalación </ strong> del taller. En esta fase, los usuarios no pueden modificar su envío o sus evaluaciones. Los profesores pueden usar esta fase para cambiar la configuración del taller y modificar la estrategia de calificación de las formas de evaluación.';
$string['switchphase20info'] = 'Estás a punto de entrar en <strong> la fase Envío </ strong>. Los estudiantes pueden presentar sus trabajos durante esta fase (dentro de las fechas de control de acceso a la presentación, si está configurado). Los profesores pueden asignar las presentaciones para su revisión.entr';
$string['switchphase30info'] = 'Estás a punto de entrar en  <strong> la fase de evaluación</ strong>. En esta fase, los evaluadores podrán evaluar los envíos que les han sido asignados (dentro de las fechas de evaluación de control de acceso, si está configurado).';
$string['switchphase40info'] = 'Está a punto de cambiar en el taller a la fase <strong> Evaluación de la Calificación </ strong>. En esta fase, los usuarios no pueden modificar su envíos o sus evaluaciones. Los profesores pueden usar las herramientas de evaluación de clasificación para calcular las calificaciones finales y proporcionar información para los correctores.';
$string['switchphase50info'] = 'Está a punto de cerrar el taller. Esto dará como resultado que las calificaciones calculadas aparecerán en el libro de calificaciones. Los estudiantes pueden ver sus envíos y sus evaluaciones.';
$string['taskassesspeers'] = 'Evaluar a compañeros';
$string['taskassesspeersdetails'] = 'Total: {$a-> total} <br /> pendiente: {$a->todo}';
$string['taskassessself'] = 'Autoevaluarse';
$string['taskinstructauthors'] = 'Proporcione instrucciones para el envío';
$string['taskinstructreviewers'] = 'Proporcione instrucciones para la evaluación';
$string['taskintro'] = 'Defina la introducción al taller';
$string['tasksubmit'] = 'Enviar su trabajo';
$string['toolbox'] = 'Caja de herramientas del Taller';
$string['undersetup'] = 'El taller está en proceso de implnatación. Por favor, espere hasta que cambie a la siguiente fase';
$string['useexamples'] = 'Usar ejemplos';
$string['useexamples_desc'] = 'Se proporcionan ejemplos de envios para practicar la evaluación';
$string['useexamples_help'] = 'Si está activada, los usuarios pueden probar la evaluación sobre una o más presentaciones de ejemplo y comparar su evaluación con una evaluación de referencia. Esta calificación no se cuenta en la evaluación.';
$string['usepeerassessment'] = 'Utilice la evaluación por pares';
$string['usepeerassessment_desc'] = 'Los estudiantes pueden evaluar el trabajo de otros';
$string['usepeerassessment_help'] = 'Si está activado, un usuario puede ser asignado en presentaciones de otros usuarios para evaluarlas. Recibirá una calificación para la evaluación, además de una calificación para su propia presentación.';
$string['userdatecreated'] = 'enviado en <span>{$a}</span>';
$string['userdatemodified'] = 'modificado en <span>{$a}</span>';
$string['userplan'] = 'Planificador de talleres';
$string['userplan_help'] = 'El planificador de talleres muestra todas las fases de la actividad y muestra la lista de tareas de cada fase. La fase actual se resalta y las tareas finalizadas se indican con una marca.';
$string['useselfassessment'] = 'Usar auto-evaluación';
$string['useselfassessment_desc'] = 'Los estudiantes pueden evaluar su propio trabajo';
$string['useselfassessment_help'] = 'Si está activado, un usuario puede ser asignado a su propia presentación para evaluarla. Recibirá una calificación para la evaluación, además de una calificación para su propia presentación.';
$string['weightinfo'] = 'Ponderación: {$a}';
$string['withoutsubmission'] = 'Corrector sin entregas asignadas';
$string['workshop:allocate'] = 'Asignar entregas para corregir';
$string['workshop:editdimensions'] = 'Editar formulario de evaluación';
$string['workshopfeatures'] = 'Características del taller';
$string['workshop:manageexamples'] = 'Gestionar los ejemplos de envíos';
$string['workshopname'] = 'Nombre del taller';
$string['workshop:overridegrades'] = 'Sobreescribir calificaciones calculadas';
$string['workshop:peerassess'] = 'Compañeros evaluados';
$string['workshop:publishsubmissions'] = 'Publicar entregas';
$string['workshop:submit'] = 'Enviar';
$string['workshop:switchphase'] = 'Cambiar de fase';
$string['workshop:view'] = 'Ver taller';
$string['workshop:viewallassessments'] = 'Mostrar todas las evaluaciones';
$string['workshop:viewallsubmissions'] = 'Ver todas las entregas';
$string['workshop:viewauthornames'] = 'Ver el nombre de los autores';
$string['workshop:viewpublishedsubmissions'] = 'Ver entregas publicadas';
$string['workshop:viewreviewernames'] = 'Ver el nombre de los revisores';
$string['yoursubmission'] = 'Su entrega';
