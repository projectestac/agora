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
 * Strings for component 'feedback', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   feedback
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['add_item'] = 'Engadir pregunta á actividade';
$string['add_pagebreak'] = 'Engadir unha quebra de páxina';
$string['adjustment'] = 'Axuste';
$string['after_submit'] = 'Despois de entrega';
$string['allowfullanonymous'] = 'Permitir anonimato completo';
$string['analysis'] = 'Análise';
$string['anonymous'] = 'Anónimo';
$string['anonymous_edit'] = 'Rexistrar nomes de usuario';
$string['anonymous_entries'] = 'Entradas anónimas';
$string['anonymous_user'] = 'Usuario anónimo';
$string['append_new_items'] = 'Anexar elementos novos';
$string['autonumbering'] = 'Numeración automática de preguntas';
$string['autonumbering_help'] = 'Activa ou desactiva a numeración automática para cada pregunta';
$string['average'] = 'Media';
$string['bold'] = 'Negra';
$string['cancel_moving'] = 'Cancelar o movemento';
$string['cannotmapfeedback'] = 'Problema coa base de datos, non foi posíbel asignar o comentario no curso';
$string['cannotsavetempl'] = 'non se permite gardar modelos';
$string['cannotunmap'] = 'Problema coa base de datos, non se pode desasignar';
$string['captcha'] = 'Captcha';
$string['captchanotset'] = 'Non se estabeleceu o captcha.';
$string['check'] = 'Elección múltipla - respostas múltiplas';
$string['checkbox'] = 'Elección múltipla - permítense respostas múltiplas (caixas de selección)';
$string['check_values'] = 'Posíbeis respostas';
$string['choosefile'] = 'Escolla un ficheiro';
$string['chosen_feedback_response'] = 'escolleuse o comentario de resposta';
$string['completed'] = 'completado';
$string['completed_feedbacks'] = 'Respostas entregadas';
$string['complete_the_form'] = 'Responder as preguntas...';
$string['completionsubmit'] = 'Ver como completado ao enviar o comentario';
$string['configallowfullanonymous'] = 'De estar estabelecida afirmativamente, o comentario pode completarse sen ningún inicio de sesión precedente. Soamente afecta aos comentarios da páxina principal.';
$string['confirmdeleteentry'] = 'Confirma que quere eliminar esta entrada?';
$string['confirmdeleteitem'] = 'Confirma que quere eliminar este elemento?';
$string['confirmdeletetemplate'] = 'Confirma que quere eliminar este modelo?';
$string['confirmusetemplate'] = 'Confirma que quere usar este modelo?';
$string['continue_the_form'] = 'Continuar o formulario';
$string['count_of_nums'] = 'Conta de números';
$string['courseid'] = 'ID do curso';
$string['creating_templates'] = 'Gardar estas preguntas como un novo modelo';
$string['delete_entry'] = 'Eliminar entrada';
$string['delete_item'] = 'Eliminar pregunta';
$string['delete_old_items'] = 'Eliminar os elementos antigos';
$string['delete_template'] = 'Eliminar modelo';
$string['delete_templates'] = 'Eliminar modelo...';
$string['depending'] = 'Dependencias';
$string['depending_help'] = 'É posíbel amosar un elemento en función do valor doutro elemento.<br />
<strong>Vexa aquí un exemplo.</strong><br />
<ul>
<li>Primeiro, crear un elemento do que dependa outro elemento.</li>
<li>Logo, engada unha quebra de páxina.</li>
<li>Logo, engada os elementos dependentes do valora do elemento creado antes. Escolla o elemento da lista etiquetado como «Elemento dependente» e escriba o valor requirido na caixa de texto etiquetada como «Valor da dependencia».</li>
</ul>
<strong>A estrutura do elemento debería parecerse a isto.</strong>
<ol>
<li>Elemento Q: Ten vostede un coche? A: si/non</li>
<li>Quebra de páxina</li>
<li>Elemento Q: De que cor é o seu cocher?<br />
(este elemento depende do elemento 1 con valor = si)</li>
<li>Elemento Q: Por que non ten un coche?<br />
(este elemento depende do elemento 1 con valor = non)</li>
<li> ... outros elementos</li>
</ol>';
$string['dependitem'] = 'Elemento de dependencia';
$string['dependvalue'] = 'Valor de dependencia';
$string['description'] = 'Descrición';
$string['do_not_analyse_empty_submits'] = 'Non analizar as entregas baleiras';
$string['dropdown'] = 'Elección múltipla - permítese a resposta única (lista despregábel)';
$string['dropdownlist'] = 'Elección múltipla - resposta única (despregábel)';
$string['dropdownrated'] = 'Lista despregábel (puntuada)';
$string['dropdown_values'] = 'Respostas';
$string['drop_feedback'] = 'Retirar deste curso';
$string['edit_item'] = 'Editar a pregunta';
$string['edit_items'] = 'Editar as preguntas';
$string['email_notification'] = 'Activar a notificación de entregas';
$string['email_notification_help'] = 'De estar activado, os administradores recibirán a notificación por correo dos comentarios de entrega.';
$string['emailteachermail'] = '{$a->username} completou a actividade de comentario : \'{$a->feedback}\'

Pode vela aquí:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->username} completou a actividade de comentario:  <i>«{$a->feedback}»</i><br /><br />
Pode vela <a href="{$a->url}">aquí</a>.';
$string['entries_saved'] = 'Gardouse a súa resposta. Grazas.';
$string['eventresponsedeleted'] = 'Resposta eliminada';
$string['eventresponsesubmitted'] = 'Resposta enviada';
$string['export_questions'] = 'Exportar preguntas';
$string['export_to_excel'] = 'Exportar a Excel';
$string['feedback:addinstance'] = 'Engadir un novo comentario';
$string['feedbackclose'] = 'Permitir responder a';
$string['feedback:complete'] = 'Completar un comentario';
$string['feedback:createprivatetemplate'] = 'Crear un modelo privado';
$string['feedback:createpublictemplate'] = 'Crear un modelo público';
$string['feedback:deletesubmissions'] = 'Eliminar as entregas completadas';
$string['feedback:deletetemplate'] = 'Eliminar o modelo';
$string['feedback:edititems'] = 'Editar elementos';
$string['feedback_is_not_for_anonymous'] = 'non é posíbel comentar como anónimo';
$string['feedback_is_not_open'] = 'Os comentarios non están abertos';
$string['feedback:mapcourse'] = 'Asignar cursos para comentarios globais';
$string['feedbackopen'] = 'Permitir respostas de';
$string['feedback:receivemail'] = 'Recibir notificación por correo';
$string['feedback:view'] = 'Ver un comentario';
$string['feedback:viewanalysepage'] = 'Ver a páxina de análise despois da entrega';
$string['feedback:viewreports'] = 'Ver informes';
$string['file'] = 'Ficheiro';
$string['filter_by_course'] = 'Filtrar por curso';
$string['handling_error'] = 'Produciuse un erro no módulo de manexo da acción de comentario';
$string['hide_no_select_option'] = 'Agochar a opción «Non seleccionado»';
$string['horizontal'] = 'horizontal';
$string['importfromthisfile'] = 'Importar deste ficheiro';
$string['import_questions'] = 'Importar preguntas';
$string['import_successfully'] = 'Importado satisfactoriamente';
$string['info'] = 'Información';
$string['infotype'] = 'Tipo de información';
$string['insufficient_responses'] = 'respostas insuficientes';
$string['insufficient_responses_for_this_group'] = 'Non hai respostas suficientes para este grupo';
$string['insufficient_responses_help'] = 'Non hai respostas suficientes para este grupo.

Para gardar o comentarios anónimos debe haber un mínimo de 2 respostas.';
$string['item_label'] = 'Etiqueta';
$string['item_name'] = 'Pregunta';
$string['label'] = 'Etiqueta';
$string['line_values'] = 'Puntuación';
$string['mapcourse'] = 'Asignar comentarios a cursos';
$string['mapcourse_help'] = 'De modo predeterminado, os formularios de comentarios creados na súa páxina principal están dispoñíbeis en todo o sitio
e aparecerán en todos os cursos que usan o bloque de comentarios. Pode forzar que o módulo de comentario apareza facendo un bloque fixado ou limitar os cursos no que o formulario de comentarios aparecerá mediante a asignación sobre cursos específicos.';
$string['mapcourseinfo'] = 'Este é un comentario xeral que está dispoñíbel en todos os cursos usando o bloque de comentarios. No entanto, pode limitar os cursos a aqueles non que aparecerá asignándoos. Busque o curso é asígneo a este comentario.';
$string['mapcoursenone'] = 'Non hai cursos asignados. Os comentarios están dispoñíbeis en todos os cursos';
$string['mapcourses'] = 'Asignar comentarios a cursos';
$string['mapcourses_help'] = 'Unha vez que seleccione os curso(s) relevantes tras a súa busca,
pode asocialos con este comentario utilizando a asignación do curso(s). Pódense seleccionar múltiplos cursos mantendo premida a tecla Apple ou Ctrl mentres preme sobre os nomes dos cursos. Un curso pode ser desasociado dun comentario en calquera momento.';
$string['mappedcourses'] = 'Cursos asignados';
$string['max_args_exceeded'] = 'Soamente se poden manexar 6 argumentos, demasiados argumento para';
$string['maximal'] = 'máximo';
$string['messageprovider:message'] = 'Recordatorio de comentario';
$string['messageprovider:submission'] = 'Notificacións de comentarios';
$string['mode'] = 'Modo';
$string['modulename'] = 'Comentarios';
$string['modulename_help'] = 'O módulo de actividade de comentario permítelle a un profesor crear unha busca personalizada para a recollida de comentarios dos participantes, utilizando unha variedade de tipos de preguntas, que inclúen a as de opción múltipla, si/non ou escritura de texto.

As suxestións poden ser anónimas, se o desexa, e os resultados poden ser amosados a todos os participantes ou restrinxidos a só os profesores. Calquera das actividades de comentario na páxina de inicio do sitio web tamén poden ser completadas por usuarios que non inician sesión.

As actividades de comentario pódense utilizar

* Para avaliacións do curso, axudando a mellorar o contido para os posteriores participantes
* Para permitirlles aos participantes rexistrarte nos módulos de cursos, actividades, etc
* Para enquisas de convidados sobre opcións de cursos, normas escolares, etc.
* Para enquisas antiabuso nas que os alumnos poden informar sobre incidentes anonimamente';
$string['modulename_link'] = 'mod/feedback/ver';
$string['modulenameplural'] = 'Comentarios';
$string['movedown_item'] = 'Mover esta pregunta cara abaixo';
$string['move_here'] = 'Movela para aquí';
$string['move_item'] = 'Mover esta pregunta';
$string['moveup_item'] = 'Mover esta pregunta ata';
$string['multichoice'] = 'Escolla múltipla';
$string['multichoicerated'] = 'Escolla múltipla (puntuada)';
$string['multichoicetype'] = 'Tipo de escolla múltipla';
$string['multichoice_values'] = 'Valores de escolla múltipla';
$string['multiplesubmit'] = 'Permitir entregas múltiplas';
$string['multiplesubmit_help'] = 'De esta activada para enquisas anónimas, os usuarios poden enviar comentarios sen límite de número.';
$string['name'] = 'Nome';
$string['name_required'] = 'Nome requirido';
$string['next_page'] = 'Páxina seguinte';
$string['no_handler'] = 'Non existe manexador de acción para';
$string['no_itemlabel'] = 'Sen etiqueta';
$string['no_itemname'] = 'Sen nome de elemento';
$string['no_items_available_yet'] = 'Aínda non se engadiron preguntas';
$string['non_anonymous'] = 'Rexistrarase o nome de usuario e amosarase xunto coas respostas';
$string['non_anonymous_entries'] = 'sen entradas anónimas';
$string['non_respondents_students'] = 'non respondeu ningún alumno';
$string['notavailable'] = 'este comentario non está dispoñíbel';
$string['not_completed_yet'] = 'Aínda sen completar';
$string['no_templates_available_yet'] = 'Aínda non hai modelos dispoñíbeis';
$string['not_selected'] = 'Non seleccionado';
$string['not_started'] = 'non iniciado';
$string['numeric'] = 'Resposta numérica';
$string['numeric_range_from'] = 'Intervalo de';
$string['numeric_range_to'] = 'Intervalo ata';
$string['of'] = 'de';
$string['oldvaluespreserved'] = 'Preservaranse todas as preguntas antigas e os valores asignados';
$string['oldvalueswillbedeleted'] = 'Eliminaranse as preguntas actuais e todas as respostas dos teus usuarios';
$string['only_one_captcha_allowed'] = 'Soamente se permite un captcha nun comentario';
$string['overview'] = 'Vista xeral';
$string['page'] = 'Páxina';
$string['page_after_submit'] = 'Mensaxe de completado';
$string['pagebreak'] = 'Quebra de páxina';
$string['page-mod-feedback-x'] = 'Calquera páxina do módulo de comentarios';
$string['parameters_missing'] = 'Faltan os parámetros de';
$string['picture'] = 'Imaxe';
$string['picture_file_list'] = 'Lisa de imaxes';
$string['picture_values'] = 'Escolla un ou máis <br />ficheiros de imaxe da lista:';
$string['pluginadministration'] = 'Administración dos comentarios';
$string['pluginname'] = 'Comentarios';
$string['position'] = 'Posición';
$string['preview'] = 'Visualización';
$string['preview_help'] = 'Na visualización pode cambiar a orde das preguntas.';
$string['previous_page'] = 'Páxina anterior';
$string['public'] = 'Público';
$string['question'] = 'Pregunta';
$string['questionandsubmission'] = 'Configuración da pregunta e da entrega';
$string['questions'] = 'Preguntas';
$string['radio'] = 'Elección múltipla - resposta única';
$string['radiobutton'] = 'Elección múltipla - permítese a resposta única (botón de opción)';
$string['radiobutton_rated'] = 'Botón de opción (puntuado)';
$string['radiorated'] = 'Botón de opción (puntuado)';
$string['radio_values'] = 'Respostas';
$string['ready_feedbacks'] = 'Comentarios listos';
$string['relateditemsdeleted'] = 'Tamén se eliminarán todas as respostas dos seus usuarios a esta pregunta';
$string['required'] = 'Requirido';
$string['resetting_data'] = 'Reiniciar os comentarios de resposta';
$string['resetting_feedbacks'] = 'Reiniciando os comentarios';
$string['response_nr'] = 'Número de resposta';
$string['responses'] = 'Respostas';
$string['responsetime'] = 'Tempos de resposta';
$string['save_as_new_item'] = 'Gardar como nova pregunta';
$string['save_as_new_template'] = 'Gardar como novo modelo';
$string['save_entries'] = 'Entregar as súas respostas';
$string['save_item'] = 'Gardar a pregunta';
$string['saving_failed'] = 'Fallou ao gardar';
$string['saving_failed_because_missing_or_false_values'] = 'Fallou ao gardar porque faltan valores ou son falsos';
$string['search_course'] = 'Buscar curso';
$string['searchcourses'] = 'Buscar cursos';
$string['searchcourses_help'] = 'Buscar o código ou o nome do(s) curso(s) que quere asociar con este comentario.';
$string['selected_dump'] = 'Os índices seleccionados da variábel $SESSION son envorcados a seguir:';
$string['send'] = 'enviar';
$string['send_message'] = 'enviar mensaxe';
$string['separator_decimal'] = ',';
$string['separator_thousand'] = '.';
$string['show_all'] = 'Amosar todo';
$string['show_analysepage_after_submit'] = 'Amosar a páxina de análise';
$string['show_entries'] = 'Amosar as respostas';
$string['show_entry'] = 'Amosar a resposta';
$string['show_nonrespondents'] = 'Amosar os que non responden';
$string['site_after_submit'] = 'Sitio tras entregar';
$string['sort_by_course'] = 'Ordenar por curso';
$string['start'] = 'Iniciar';
$string['started'] = 'iniciado';
$string['stop'] = 'Fin';
$string['subject'] = 'Asunto';
$string['switch_group'] = 'Cambiar o grupo';
$string['switch_item_to_not_required'] = 'cambiar a: resposta non requirida';
$string['switch_item_to_required'] = 'cambiar a: resposta requirida';
$string['template'] = 'Modelo';
$string['templates'] = 'Modelos';
$string['template_saved'] = 'Modelo gardado';
$string['textarea'] = 'Resposta de texto máis longa';
$string['textarea_height'] = 'Número de liñas';
$string['textarea_width'] = 'Largura';
$string['textfield'] = 'Resposta de texto curta';
$string['textfield_maxlength'] = 'Caracteres aceptados como máximo';
$string['textfield_size'] = 'Largura do campo de texto';
$string['there_are_no_settings_for_recaptcha'] = 'Non hai configuración do captcha';
$string['this_feedback_is_already_submitted'] = 'Xa completou esta actividade.';
$string['typemissing'] = 'falta o valor «type»';
$string['update_item'] = 'Gardar os cambios na pregunta';
$string['url_for_continue'] = 'Ligazón á seguinte actividade';
$string['url_for_continue_help'] = 'Tras enviar o comentario, preséntase un botón de continuar, que liga coa páxina do curso. Alternativamente, pode ligar coa seguinte actividade de se introducir aquí o URL da actividade.';
$string['use_one_line_for_each_value'] = '<br />Utilice unha liña para cada resposta!';
$string['use_this_template'] = 'Utilice este modelo';
$string['using_templates'] = 'Utilice un modelo';
$string['vertical'] = 'vertical';
$string['viewcompleted'] = 'comentarios completados';
$string['viewcompleted_help'] = 'Pode ver os formularios de comentarios completados, nos que se pode buscar por curso e/por pregunta.
Os comentarios de resposta pódense exportar a Excel.';
