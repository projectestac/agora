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
 * Strings for component 'checklist', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   checklist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcomments'] = 'Añadir comentarios';
$string['additem'] = 'Añadir';
$string['additemalt'] = 'Añadir un nuevo item a la lista';
$string['additemhere'] = 'Insertar nuevo item después de este';
$string['addownitems'] = 'Añadir sus propios items';
$string['addownitems-stop'] = 'Dejar de añadir sus propios items';
$string['allowmodulelinks'] = 'Permitir enlaces a módulos';
$string['anygrade'] = 'Cualquiera';
$string['autopopulate'] = 'Mostrar módulos de curso en lista de verificación';
$string['autopopulate_help'] = 'Esto añadirá automáticamente una lista de todos los recursos y actividades en el curso actual hacia la lista de verificación..<br /> Esta lista será actualizada con cualquier cambio en el curso siempre que visite la página de "Editar" de la lista.<br />Los Items podrán ocultarse de la lista, al elegir el icono \'ocultar\' a un lado de ellos.<br /> Para quitar los items automáticos de la lista, cambie esta opción a \'No\' y entonces elija \'Quitar items de módulos del curso\' en la página de \'Editar\'.';
$string['autoupdate'] = 'Tacharla cuando se completen los módulos';
$string['autoupdate_help'] = 'Esto tachará automáticamente los items en su lista de verificación en cuanto complete la actividad relevante en el curso.<br /> \'Completar\' una actividad varía de una actividad a otra.- \'ver\' un recurso, \'enviar\' un examen o tarea \'publicar\' en un foro o unirse a un chat, etc.<br /> Si estuviera activado el seguimiento de completo (completion tracking) de Moodle 2.0 para una actividad particular, esto se usaría para tachar el item en la lista.<br /> Para conocer los detalles de exactamente que causa que una actividad se marque como \'completa\', pida al administrador que vea el archivo  \'mod/checklist/autoupdate.php\'<br /> Nota: puede tardarse hasta 60 segundos para que una activad de un estudiante se vea reflejada en su lista de verificación';
$string['autoupdatenote'] = 'Es la marca del \'estudiante\' la que se actualiza automáticamente - no se mostrarán actualizaciones en las listas de verificación de \'Solamente Profesor\'';
$string['autoupdatewarning_both'] = 'Hay items en esta lista que serán actualizados automáticamente (en cuanto los estudiantes completen la actividad relacionada). Sin embargo, como esta es una lista de verificación de \'estudiante y profesor\', las barras de progreso no se actualizarán hasta que el profesor esté de acuerdo con las puntuaciones otorgadas.';
$string['autoupdatewarning_student'] = 'Hay items en esta lista que serán actualizadas automáticamente (en cuanto los estudiantes completen la actividad relacionada).';
$string['autoupdatewarning_teacher'] = 'Se han activado las actualizaciones automáticas para esta lista de verificación, pero estas calificaciones no se mostrarán debido a que solamente se muestran las marcas del \'profesor\'.';
$string['calendardescription'] = 'Este evento fue añadido por la lista de verificación: {$a}';
$string['canceledititem'] = 'Cancelar';
$string['changetextcolour'] = 'Siguiente color de texto';
$string['checkeditemsdeleted'] = 'Items de lista de verificación eliminado';
$string['checklist'] = 'listas de verificación';
$string['checklist:addinstance'] = 'Añadir una nueva lista de verificación';
$string['checklistautoupdate'] = 'Permitir que las listas de verificación se actualicen automáticamente';
$string['checklist:edit'] = 'Crear y editar listas de verificación';
$string['checklist:emailoncomplete'] = 'Recibir emails de completado';
$string['checklistfor'] = 'Lista de verificación para';
$string['checklistintro'] = 'Introducción';
$string['checklist:preview'] = 'Previsualizar una lista de verificación';
$string['checklistsettings'] = 'Configuraciones';
$string['checklist:updatelocked'] = 'Actualizar calificaciones de listas de verificación bloqueadas';
$string['checklist:updateother'] = 'Actualizar calificaciones de lista de verificación del estudiante';
$string['checklist:updateown'] = 'Actualizar las calificaciones de sus listas de verificación';
$string['checklist:viewmenteereports'] = 'Ver (solamente) progreso del aprendiz';
$string['checklist:viewreports'] = 'Ver progreso del estudiante';
$string['checks'] = 'Revisar calificaciones';
$string['comments'] = 'Comentarios';
$string['completionpercent'] = 'Porcentaje de items que deberán ser tachados:';
$string['completionpercentgroup'] = 'Requerir tachar';
$string['configchecklistautoupdate'] = 'Antes de permitir esto debe hacer algunos cambios en el código del núcleo de Moodle,  por favor lea el archivo mod/checklist/README.txt para más detalles';
$string['configshowcompletemymoodle'] = 'Si esta casilla se deja vacía, entonces las listas de verificación se ocultarán de la página de \'Mi Moodle\'';
$string['configshowmymoodle'] = 'Si esta casilla se deja vacía, entonces las actividades de listas de verificación  (con barras de progreso) ya no aparecerán en la página de \'Mi Moodle\'';
$string['confirmdeleteitem'] = '¿Está seguro de querer eliminar permanentemente esta lista de verificación?';
$string['deleteitem'] = 'Eliminar este item';
$string['duedatesoncalendar'] = 'Añadir las fechas límite al calendario';
$string['edit'] = 'Editar lista de verificación';
$string['editchecks'] = 'Editar verificaciones';
$string['editdatesstart'] = 'Editar fechas';
$string['editdatesstop'] = 'Suspender fechas de edición';
$string['edititem'] = 'Editar este item';
$string['emailoncomplete'] = 'Mandar correo electrónico cuando la lista de verificación está completa:';
$string['emailoncompletebody'] = 'El usuario {$a->user} ha completado la lista de verificación \'{$a->checklist}\'  en el curso \'{$a->coursename}\'
Vea la lista de verificación aquí:';
$string['emailoncomplete_help'] = 'Cuando se completa una lista de verificación, se manda un correo electrónico de notificación a todos los profesores del curso.<br /> Un administrador puede controlar quienes reciben este correo al usar la capacidad \'mod:checklist/emailoncomplete\' - por defecto, todos los profesores y profesores no-editores tienen esta capacidad.';
$string['emailoncompletesubject'] = 'El usuario {$a->user} ha completado la lista de verificación  \'{$a->checklist}';
$string['export'] = 'Exportar items';
$string['forceupdate'] = 'Actualizar revisiones para todos los items automáticos';
$string['gradetocomplete'] = 'Calificación para completar:';
$string['guestsno'] = 'No tiene permiso para ver esta lista de verificación';
$string['headingitem'] = 'Este item es un encabezado - no tendrá una casilla de verificación junto';
$string['import'] = 'Importar items';
$string['importfile'] = 'Elija archivo a importar';
$string['importfromcourse'] = 'Curso completo';
$string['importfromsection'] = 'Sección actual';
$string['indentitem'] = 'Indentar item';
$string['itemcomplete'] = 'Completado';
$string['items'] = 'Items de lista de verificación';
$string['linktomodule'] = 'Enlazar a este módulo';
$string['lockteachermarks'] = 'Bloquear calificaciones del profesor';
$string['lockteachermarks_help'] = 'Cuando se habilita esta configuración, una vez que un profesor haya guardado una calificación de \'Si\', ya no podrán cambiarla después. Los usuarios con la capacidad \'mod/checklist:updatelocked\' si podrán seguir cambiando la calificación.';
$string['lockteachermarkswarning'] = 'Nota: Una vez que haya guardado estas calificaciones, ya no podrá cambiar ninguna calificación de \'Sí\'';
$string['modulename'] = 'Lista de verificación';
$string['modulenameplural'] = 'Listas de verificación';
$string['moveitemdown'] = 'Mover item abajo';
$string['moveitemup'] = 'Mover item arriba';
$string['noitems'] = 'No hay items en lista de verificación';
$string['optionalhide'] = 'Ocultar items opcionales';
$string['optionalitem'] = 'Este item es opcional';
$string['optionalshow'] = 'Mostrar items opcionales';
$string['percentcomplete'] = 'Items requeridos';
$string['percentcompleteall'] = 'Todos los items';
$string['pluginadministration'] = 'Administración de listas de verificación';
$string['pluginname'] = 'Lista de verificación';
$string['preview'] = 'Previsualizar';
$string['progress'] = 'Progreso';
$string['removeauto'] = 'Quitar items de módulo del curso';
$string['report'] = 'Ver progreso';
$string['reporttablesummary'] = 'Tabla que muestra los items en la lista de verificación que cada estudiante ha completado';
$string['requireditem'] = 'Este item es necesario - debe de completarse';
$string['resetchecklistprogress'] = 'Reiniciar el progreso de la lista de verificación y los items del usuario';
$string['savechecks'] = 'Guardar';
$string['showcompletemymoodle'] = 'Mostrar las listas de verificación completadas en la página de \'Mi Moodle\'';
$string['showfulldetails'] = 'Mostrar detalles completos';
$string['showmymoodle'] = 'Mostrar las Listas de Verificación en la página de \'Mi Moodle';
$string['showprogressbars'] = 'Mostrar barras de progreso';
$string['teacheralongsidecheck'] = 'Estudiante y profesor';
$string['teachercomments'] = 'Los profesores pueden añadir comentarios';
$string['teacherdate'] = 'Fecha en la que un profesor actualizó por última vez este item';
$string['teacheredit'] = 'Actualizaciones por';
$string['teacherid'] = 'El profesor que actualizó por última vez esta calificación';
$string['teachermarkno'] = 'El profesor indica que usted NO ha completado esto';
$string['teachermarkundecided'] = 'El profesor aún no ha calificado esto';
$string['teachermarkyes'] = 'El profesor indica que usted ha completado esto';
$string['teachernoteditcheck'] = 'Solamente estudiante';
$string['teacheroverwritecheck'] = 'Solamente profesor';
$string['theme'] = 'Tema para mostrar lista de verificación';
$string['toggledates'] = 'Alternar nombres y fechas';
$string['unindentitem'] = 'Item no indentado';
$string['updatecompletescore'] = 'Guardar calificaciones de acompletado';
$string['updateitem'] = 'Actualizar';
$string['userdate'] = 'Fecha en la que se actualizó por última vez este item';
$string['useritemsallowed'] = 'El usuario puede añadir sus propios items';
$string['useritemsdeleted'] = 'Items del usuario eliminados';
$string['view'] = 'Ver lista de verificación';
$string['viewall'] = 'Ver a todos los estudiantes';
$string['viewallcancel'] = 'Cancelar';
$string['viewallsave'] = 'Guardar';
$string['viewsinglereport'] = 'Ver progreso para este usuario';
$string['viewsingleupdate'] = 'Actualizar progreso para este usuario';
$string['yesnooverride'] = 'Si, no se puede anular';
$string['yesoverride'] = 'Si, puede anularse';
