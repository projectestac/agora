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
 * Strings for component 'feedback', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Añadir pregunta';
$string['add_pagebreak'] = 'Añadir salto de página';
$string['adjustment'] = 'Ajuste';
$string['after_submit'] = 'Después del envío';
$string['allowfullanonymous'] = 'Permitir anonimato completo';
$string['analysis'] = 'Análisis';
$string['anonymous'] = 'Anónima';
$string['anonymous_edit'] = 'Registrar nombres de usuario';
$string['anonymous_entries'] = 'Respuestas anónimas';
$string['anonymous_user'] = 'Usuario anónimo';
$string['append_new_items'] = 'Agregar ítems nuevos';
$string['autonumbering'] = 'Números automatizados';
$string['autonumbering_help'] = 'Activa o desactiva la numeración automática para cada pregunta';
$string['average'] = 'Promedio';
$string['bold'] = 'Negrita';
$string['cancel_moving'] = 'Cancelar movimiento';
$string['cannotmapfeedback'] = 'Problema con la base de datos, imposible asignar encuesta al curso';
$string['cannotsavetempl'] = 'no se permite guardar plantillas';
$string['cannotunmap'] = 'Problema con la base de datos, imposible desasignar';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'No se ha ajustado el Captcha.';
$string['check'] = 'Elección múltiple (varias respuestas)';
$string['checkbox'] = 'Elección múltiple (se permiten varias respuestas - casillas de verificación)';
$string['check_values'] = 'Respuestas posibles';
$string['choosefile'] = 'Seleccione un archivo';
$string['chosen_feedback_response'] = 'respuesta elegida';
$string['completed'] = 'completada';
$string['completed_feedbacks'] = 'Respuestas enviadas';
$string['complete_the_form'] = 'Responda a las preguntas...';
$string['completionsubmit'] = 'Ver como "completado" si se envía la encuesta';
$string['configallowfullanonymous'] = 'Si se establece esta opción la encuesta puede ser respondida por usuarios que previamente no hayan iniciado la sesión. Esto sólo afecta a las encuestas de la página principal.';
$string['confirmdeleteentry'] = '¿Está seguro que quiere borrar esta entrada?';
$string['confirmdeleteitem'] = '¿Está seguro que quiere borrar este elemento?';
$string['confirmdeletetemplate'] = '¿Está seguro que quiere utilizar esta plantilla?';
$string['confirmusetemplate'] = '¿Está seguro de que desea usar esta plantilla?';
$string['continue_the_form'] = 'Continuar con el formulario';
$string['count_of_nums'] = 'Conteo de números';
$string['courseid'] = 'Id del curso';
$string['creating_templates'] = 'Guardar estas preguntas como plantilla nueva';
$string['delete_entry'] = 'Borrar entrada';
$string['delete_item'] = 'Borrar pregunta';
$string['delete_old_items'] = 'Borrar ítems antiguos';
$string['delete_template'] = 'Borrar plantilla';
$string['delete_templates'] = 'Borrar plantilla...';
$string['depending'] = 'ítems dependientes';
$string['depending_help'] = 'Ítems (preguntas de la encuesta) dependientes le permiten ver los elementos que dependen de los valores de otros elementos <br />
<strong> Un ejemplo de cómo crearlos: </ strong> <br />
<li> En primer lugar cree el ítem (la pregunta) de cuyo valor dependerán otros ítems. </li>
<li> A continuación añada un salto de página. </li>
<li> Seguidamente añada los ítems que dependen del valor del ítem anterior. <br />En el formulario de creación del ítem seleccione el elemento de la lista "Depende del ítem" y ponga el valor correspondiente en el campo "Depende del valor".  </li> </ul>
<strong> La estructura tendrá el siguiente aspecto:</ strong>
<ol>
<li>Ítem 1-Pregunta: ¿Tiene usted coche? R: sí / no </li>
<li>Salto de página </li>
<li>Ítem 2-Pregunta: ¿Qué color tiene su coche?<br /> (este ítem depende del ítem 1 con valor = sí) </li>
<li>Ítem 3-Pregunta: ¿Por qué no tener un coche? <br /> (este ítem depende del ítem 1 con  valor = no) </li>
<li> ...otros elementos </li>
</ol>';
$string['dependitem'] = 'Depende del item';
$string['dependvalue'] = 'Depende del valor';
$string['description'] = 'Descripción';
$string['do_not_analyse_empty_submits'] = 'No analizar envíos vacíos';
$string['dropdown'] = 'Opción múltiple (sólo una respuesta - lista desplegable)';
$string['dropdownlist'] = 'Opción múltiple  - una respuesta (desplegable)';
$string['dropdownrated'] = 'Lista desplegable (clasificada)';
$string['dropdown_values'] = 'Valores de la lista desplegable';
$string['drop_feedback'] = 'Eliminar de este curso';
$string['edit_item'] = 'Editar pregunta';
$string['edit_items'] = 'Editar preguntas';
$string['email_notification'] = 'Enviar notificaciones por correo electrónico';
$string['email_notification_help'] = 'Si está habilitado, los administradores recibirán notificaciones por correo electrónico al enviarse las respuestas a la encuesta.';
$string['emailteachermail'] = '{$a->username} ha cumplimentado y enviado la encuesta: \'{$a->feedback}\'

Puede verla aquí

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} ha cumplimentado y enviado la encuesta: <i>\'{$a->feedback}\'</i><br/><br/>
Puede verla <a href="{$a->url}">aquí/a>.';
$string['entries_saved'] = 'Sus respuestas han sido guardadas. Gracias.';
$string['export_questions'] = 'Exportar preguntas';
$string['export_to_excel'] = 'Exportar a Excel';
$string['feedback:addinstance'] = 'Añadir una nueva encuesta';
$string['feedbackclose'] = 'Cerrar la encuesta en';
$string['feedback:complete'] = 'Cumplimente la encuesta';
$string['feedback:createprivatetemplate'] = 'Crear plantilla privada';
$string['feedback:createpublictemplate'] = 'Crear plantilla pública';
$string['feedback:deletesubmissions'] = 'Eliminar envíos completados';
$string['feedback:deletetemplate'] = 'Borrar plantilla';
$string['feedback:edititems'] = 'Editar ítems';
$string['feedback_is_not_for_anonymous'] = 'la encuesta no es anónima';
$string['feedback_is_not_open'] = 'La encuesta no está disponible';
$string['feedback:mapcourse'] = 'Asignar cursos a encuestas globales';
$string['feedbackopen'] = 'Abrir la encuesta en';
$string['feedback:receivemail'] = 'Recibir notificación por correo electrónico';
$string['feedback:view'] = 'Ver una encuesta';
$string['feedback:viewanalysepage'] = 'Ver página de análisis después del envío';
$string['feedback:viewreports'] = 'Ver informes';
$string['file'] = 'Archivo';
$string['filter_by_course'] = 'Filtrar por curso';
$string['handling_error'] = 'Error en la ejecución del módulo Encuesta';
$string['hide_no_select_option'] = 'Ocultar la opción "No seleccionada"';
$string['horizontal'] = 'horizontal';
$string['importfromthisfile'] = 'Importar de este archivo';
$string['import_questions'] = 'Importar preguntas';
$string['import_successfully'] = 'Importación exitosa';
$string['info'] = 'Información';
$string['infotype'] = 'Información Tipo';
$string['insufficient_responses'] = 'Respuestas insuficientes';
$string['insufficient_responses_for_this_group'] = 'Este grupo no tiene suficientes respuestas';
$string['insufficient_responses_help'] = 'El número de respuestas para este grupo es insuficiente.

Para mantener los comentarios anónimos debe haber un mínimo de 2 respuestas realizadas.';
$string['item_label'] = 'Etiqueta';
$string['item_name'] = 'Pregunta';
$string['label'] = 'Etiqueta';
$string['line_values'] = 'Clasificación';
$string['mapcourse'] = 'Asignar encuesta a cursos';
$string['mapcourse_help'] = 'Por defecto, los formularios de encuesta creados en su página de inicio están disponibles en todo el sitio y aparecerá en todos los cursos utilizando el bloque de encuestas. Puede forzar que el formulario de encuestas se visualice haciendo que sea un bloque fijo o puede limitar los cursos en los que se mostrará el formulario de encuesta mediante su asignación a cursos específicos.';
$string['mapcourseinfo'] = 'Esta encuesta está disponible en todos los cursos que usan el bloque Encuesta. Sin embargo, usted puede  limitar los cursos en los que aparece. Busque el curso y asígnelo a esta encuesta.';
$string['mapcoursenone'] = 'No hay cursos asignados. La encuesta está disponible en todos los cursos';
$string['mapcourses'] = 'Asignar encuesta a cursos';
$string['mapcourses_help'] = 'Una vez seleccionados los cursos correspondientes a partir de la búsqueda, es posible asociarlos con esta encuesta utilizando el mapeo. Para seleccionar varios cursos mantenga pulsada la tecla Ctrl mientras hace clic en los nombres de los cursos. Se puede quitar la asociación de un curso a una encuesta en cualquier momento.';
$string['mappedcourses'] = 'Cursos asignados';
$string['max_args_exceeded'] = 'Se admite un máximo de 6 argumentos; demasiados argumentos para';
$string['maximal'] = 'máximo';
$string['messageprovider:message'] = 'Recordatorio de encuesta';
$string['messageprovider:submission'] = 'Notificaciones de encuesta';
$string['mode'] = 'Modo';
$string['modulename'] = 'Encuesta';
$string['modulename_help'] = 'El módulo de actividad Encuesta permite que un profesor pueda crear una encuesta personalizada para obtener la opinión de los participantes utilizando una variedad de tipos de pregunta, como  opción múltiple, sí/no o texto.

Las respuestas de la Encuesta pueden ser anónimas si así se quiere, y los resultados pueden ser mostrados a todos los participantes o bien sólo a los profesores. Cualquier Encuesta situada en la página principal del sitio podrá ser cumplimentada por usuarios no registrados.

La actividad Encuesta puede ser utilizada

* Para la evaluación del curso, ayudando a mejorar el contenido del mismo para los futuros participantes
* Para permitir que los participantes se inscriban en módulos de cursos, eventos, etc
* Para encuestar a los invitados a la hora de la elección de cursos, las políticas escolares, etc
* Para que en caso de "acoso escolar" los estudiantes pueden reportar incidentes de forma anónima';
$string['modulenameplural'] = 'Encuestas';
$string['movedown_item'] = 'Bajar esta pregunta';
$string['move_here'] = 'Mover aquí';
$string['move_item'] = 'Mover esta pregunta';
$string['moveup_item'] = 'Subir esta pregunta';
$string['multichoice'] = 'Elección múltiple';
$string['multichoicerated'] = 'Elección múltiple (clasificadas)';
$string['multichoicetype'] = 'Tipo elección múltiple';
$string['multichoice_values'] = 'Valores elección múltiple';
$string['multiplesubmit'] = 'Permites múltiples envíos';
$string['multiplesubmit_help'] = 'Si se habilita en las encuestas anónimas, los usuarios pueden enviar sus opinión un número ilimitado de veces.';
$string['name'] = 'Nombre';
$string['name_required'] = 'Nombre requerido';
$string['next_page'] = 'Siguiente página';
$string['no_handler'] = 'Ninguna acción planificada para';
$string['no_itemlabel'] = 'No etiqueta';
$string['no_itemname'] = 'Falta el nombre del ítem';
$string['no_items_available_yet'] = 'No se han planificado preguntas';
$string['non_anonymous'] = 'Los nombres de los usuarios se mostrarán y registrarán con las respuestas';
$string['non_anonymous_entries'] = 'entradas no anónimas';
$string['non_respondents_students'] = 'estudiantes no respondientes';
$string['notavailable'] = 'esta encuesta no está disponible';
$string['not_completed_yet'] = 'Aún no se ha finalizado';
$string['no_templates_available_yet'] = 'No hay plantillas disponibles';
$string['not_selected'] = 'No seleccionada';
$string['not_started'] = 'no comenzado';
$string['numeric'] = 'Respuesta numérica';
$string['numeric_range_from'] = 'Rango desde';
$string['numeric_range_to'] = 'Rango hasta';
$string['of'] = 'de';
$string['oldvaluespreserved'] = 'Se preservarán todas las preguntas antiguas y los valores asignados';
$string['oldvalueswillbedeleted'] = 'Se eliminarán las preguntas actuales y todas las respuestas de los usuarios';
$string['only_one_captcha_allowed'] = 'Solo se permite un captcha por encuesta';
$string['overview'] = 'Vista general';
$string['page'] = 'Página';
$string['page_after_submit'] = 'Página a mostrar tras el envío';
$string['pagebreak'] = 'Salto de página';
$string['page-mod-feedback-x'] = 'Cualquier página del módulo Encuesta';
$string['parameters_missing'] = 'Faltan parámetros de';
$string['picture'] = 'Imagen';
$string['picture_file_list'] = 'Lista de imágenes';
$string['picture_values'] = 'Seleccione una o más<br />imagenes de la lista:';
$string['pluginadministration'] = 'Administración de la encuesta';
$string['pluginname'] = 'Módulo de encuesta';
$string['position'] = 'Posición';
$string['preview'] = 'Previsualizar';
$string['preview_help'] = 'En la vista previa se puede cambiar el orden de las preguntas.';
$string['previous_page'] = 'Página anterior';
$string['public'] = 'Pública';
$string['question'] = 'Pregunta';
$string['questionandsubmission'] = 'Ajustes de pregunta y envío';
$string['questions'] = 'Preguntas';
$string['radio'] = 'Opción múltiple (una respuesta)';
$string['radiobutton'] = 'Opción múltiple (una respuesta -botones-)';
$string['radiobutton_rated'] = 'Botones de opción (clasificadas)';
$string['radiorated'] = 'Botones de opción (clasificadas)';
$string['radio_values'] = 'Valores de los botones de opción';
$string['ready_feedbacks'] = 'Encuestas preparadas';
$string['relateditemsdeleted'] = 'Se eliminarán también todas las respuestas de los usuarios a esta pregunta';
$string['required'] = 'Obligatorio';
$string['resetting_data'] = 'Reiniciar respuestas a la encuesta';
$string['resetting_feedbacks'] = 'Reiniciando encuestas';
$string['response_nr'] = 'Respuesta número';
$string['responses'] = 'Respuestas';
$string['responsetime'] = 'Hora de respuesta';
$string['save_as_new_item'] = 'Guardar como nueva pregunta';
$string['save_as_new_template'] = 'Guardar como nueva plantilla';
$string['save_entries'] = 'Enviar sus respuestas';
$string['save_item'] = 'Guardar pregunta';
$string['saving_failed'] = 'No se pudo guardar';
$string['saving_failed_because_missing_or_false_values'] = 'No se pudo guardar debido a valores ausentes o falsos';
$string['search_course'] = 'Buscar curso';
$string['searchcourses'] = 'Buscar cursos';
$string['searchcourses_help'] = 'Buscar el código o el nombre del (los) curso(s) que desea asociar con esta encuesta.';
$string['selected_dump'] = 'Los índices seleccionados en la variable $SESSION se desecharon debajo:';
$string['send'] = 'enviar';
$string['send_message'] = 'enviar mensaje';
$string['separator_decimal'] = '.';
$string['separator_thousand'] = ',';
$string['show_all'] = 'Mostrar todo';
$string['show_analysepage_after_submit'] = 'Mostrar página de análisis tras el envío';
$string['show_entries'] = 'Mostrar respuestas';
$string['show_entry'] = 'Mostrar respuesta';
$string['show_nonrespondents'] = 'Mostrar no respondientes';
$string['site_after_submit'] = 'Sitio tras el envío';
$string['sort_by_course'] = 'Ordenar por curso';
$string['start'] = 'Inicio';
$string['started'] = 'comenzado';
$string['stop'] = 'Fin';
$string['subject'] = 'Materia';
$string['switch_group'] = 'Cambiar grupo';
$string['switch_item_to_not_required'] = 'cambiar a: respuesta no obligatoria';
$string['switch_item_to_required'] = 'cambiar a: respuesta obligatoria';
$string['template'] = 'Plantilla';
$string['templates'] = 'Plantillas';
$string['template_saved'] = 'Plantilla guardada';
$string['textarea'] = 'Respuesta de texto larga';
$string['textarea_height'] = 'Número de líneas';
$string['textarea_width'] = 'Anchura';
$string['textfield'] = 'Respuesta de texto corta';
$string['textfield_maxlength'] = 'Número máximo de caracteres';
$string['textfield_size'] = 'Anchura del campo de texto';
$string['there_are_no_settings_for_recaptcha'] = 'No se ha configurado el captcha';
$string['this_feedback_is_already_submitted'] = 'Usted ya ha finalizado esta actividad.';
$string['typemissing'] = 'valor ausente "type"';
$string['update_item'] = 'Guardar cambios en la pregunta';
$string['url_for_continue'] = 'URL para el botón Continuar';
$string['url_for_continue_help'] = 'De manera predeterminada, cuando se envía una encuesta, el botón Continuar lleva a la página del curso. Usted puede definir aquí otra dirección URL de destino para el botón Continuar.';
$string['use_one_line_for_each_value'] = '<br>¡Use una línea por cada respuesta!';
$string['use_this_template'] = 'Utilizar esta plantilla';
$string['using_templates'] = 'Utilizar una plantilla';
$string['vertical'] = 'vertical';
$string['viewcompleted'] = 'encuestas completadas';
$string['viewcompleted_help'] = 'Usted puede ver los formularios de encuesta completados, que pueden buscarse por curso y/o por pregunta.
Las respuestas a la encuesta pueden exportarse a Excel.';
