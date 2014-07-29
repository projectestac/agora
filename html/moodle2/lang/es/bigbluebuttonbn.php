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
 * Strings for component 'bigbluebuttonbn', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   bigbluebuttonbn
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bbbduetimeoverstartingtime'] = 'La hora de vencimiento para esta actividad debe ser mayor que la hora de inicio';
$string['bbbdurationwarning'] = 'La duración máxima para esta sesión es de %duration% minutos.';
$string['bbbfinished'] = 'Esta actividad ha concluido.';
$string['bbbinprocess'] = 'Esta actividad está en proceso.';
$string['bbbnorecordings'] = 'Aún no hay ninguna grabación, por favor, vuelva más tarde.';
$string['bbbnotavailableyet'] = 'Lo siento, esta sesión aún no está disponible.';
$string['bbbrecordwarning'] = 'Esta sesión está siendo grabada.';
$string['bbburl'] = 'La URL de su servidor BigBlueButton debe terminar con /bigbluebutton/. (Esta URL por defecto es de un servidor BigBlueButton proporcionado por Blindside Networks que puede usarlo para pruebas.)';
$string['bigbluebuttonbn'] = 'BigBlueButton';
$string['bigbluebuttonbn:addinstance'] = 'Añadir una nueva sesión';
$string['bigbluebuttonbn:join'] = 'Unirse a una sesión';
$string['bigbluebuttonbn:moderate'] = 'Moderar una sesión';
$string['bigbluebuttonbnSalt'] = 'Secreto compartido con BigBlueButton';
$string['bigbluebuttonbnUrl'] = 'URL del servidor BigBlueButton';
$string['bigbluebuttonbnWait'] = 'El usuario debe esperar';
$string['configsecuritysalt'] = 'La sal de seguridad de su servidor BigBlueButton. (La sal por defecto es para un servidor BigBlueButton proporcionado por Blindside Networks que puede usarlo para pruebas.)';
$string['general_error_unable_connect'] = 'Incapaz de conectar. Por favor, compruebe la URL del servidor de BigBlueButton y compruebe si el servidor de BigBlueButton está funcionando.';
$string['index_confirm_end'] = '¿Desea terminar la clase virtual?';
$string['index_disabled'] = 'deshabilitada';
$string['index_enabled'] = 'habilitada';
$string['index_ending'] = 'Finalizando la sala virtual....por favor espere';
$string['index_error_checksum'] = 'Ha ocurrido en error en la suma de comprobación. Asegúrese de que ha introducido la sal correcta.';
$string['index_error_forciblyended'] = 'Incapaz de unirse a esta sesión porque ha sido terminada manualmente.';
$string['index_error_unable_display'] = 'Incapaz de mostrar las sesiones. Por favor, compruebe la URL del servidor de BigBlueButton y compruebe si el servidor de BigBlueButton está funcionando.';
$string['index_heading'] = 'Salas BigBlueButton';
$string['index_heading_actions'] = 'Acciones';
$string['index_heading_group'] = 'Grupo';
$string['index_heading_moderator'] = 'Moderadores';
$string['index_heading_name'] = 'Sala';
$string['index_heading_recording'] = 'Grabación';
$string['index_heading_users'] = 'Usuarios';
$string['index_heading_viewer'] = 'Asistentes';
$string['index_running'] = 'en ejecución';
$string['index_warning_adding_meeting'] = 'Incapaz de asignar una nueva ID para la sesión.';
$string['mod_form_block_general'] = 'Ajustes generales';
$string['mod_form_block_record'] = 'Ajustes de grabación.';
$string['mod_form_block_schedule'] = 'Programación de sesiones';
$string['mod_form_field_availabledate'] = 'Apertura del acceso';
$string['mod_form_field_description'] = 'Descripción de la sesión grabada.';
$string['mod_form_field_duedate'] = 'Cierre del acceso';
$string['mod_form_field_duration'] = 'Duración';
$string['mod_form_field_duration_help'] = 'Fijar la duración para una sesión establecerá el tiempo máximo para mantener activa una sesión antes de que termine la grabación';
$string['mod_form_field_limitusers'] = 'Limitar usuarios';
$string['mod_form_field_limitusers_help'] = 'Límite máximo de usuarios permitidos en una sesión';
$string['mod_form_field_name'] = 'Nombre de la sala virtual';
$string['mod_form_field_newwindow'] = 'Abrir BigBlueButton en una nueva ventana';
$string['mod_form_field_record'] = 'Grabar';
$string['mod_form_field_voicebridge'] = 'Puente de voz';
$string['mod_form_field_voicebridge_help'] = 'Número de la conferencia de voz a la que los participantes pueden entrar para unirse a la conferencia de voz.';
$string['mod_form_field_wait'] = 'Los estudiantes deben esperar hasta que se una un moderador';
$string['mod_form_field_welcome'] = 'Mensaje de bienvenida';
$string['mod_form_field_welcome_default'] = '¡<br>Bienvenido a <b>%%CONFNAME%%</b>!<br><br>Para entender cómo funciona BigBlueButton vea nuestros <a href="event:http://www.bigbluebutton.org/content/videos"><u>vídeotutoriales</u></a>.<br><br>Para unirse al puente de audio pulse en el icono de los auriculares (en la esquina superior izquierda). <b>Por favor, use auriculares para evitar causarle ruido a los demás.</b>';
$string['mod_form_field_welcome_help'] = 'Reemplaza el mensaje por defecto fijado por el servidor de BigBlueButton. El mensaje puede incluir las palabras clave (%%CONFNAME%%, %%DIALNUM%%, %%CONFNUM%%) las cuales serán sutituidas automáticamente, y también etiquetas html como &lt;b&gt;...&lt;/b&gt; or &lt;i&gt;&lt;/i&gt;';
$string['modulename'] = 'BigBlueButtonBN';
$string['modulename_help'] = 'BigBlueButtonBN le permite crear dentro de Moodle enlaces hacia aulas en línea en tiempo real con salas que emplean BigBlueButton, un sistema de código abierto para conferencias web para la educación a distancia.

Usando BigBlueButtonBN puede especificar el título, descripción, fecha del calendario (que le proporciona un rango de fechas para unirse a la sesión), grupos, y detalles acerca de la grabación de la sesión en línea.

Para ver grabaciones posteriormente, añada un recurso RecordingsBN a este curso.';
$string['modulenameplural'] = 'BigBlueButtonBN';
$string['pluginadministration'] = 'Administración de BigBlueButton';
$string['pluginname'] = 'BigBlueButtonBN';
$string['serverhost'] = 'Nombre del servidor';
$string['view_error_no_group'] = 'Aún no hay grupos configurados. Por favor, establezca los grupos antes de intentar unirse a una sesión.';
$string['view_error_no_group_student'] = 'No has sido enrolado a ningún grupo. Por favor, contacte con su profesor con el administrador.';
$string['view_error_no_group_teacher'] = 'Aún no hay grupos configurados. Por favor, establezca los grupos o contacte con el administrador.';
$string['view_error_unable_join'] = 'Incapaz de unirse a la sesión. Por favor compruebe la URL del servidor de BigBlueButton y compruebe que el servidor de BigBlueButton está en funcionamiento.';
$string['view_error_unable_join_student'] = 'Incapáz de conectarse al servidor de BigBlueButton. Por favor, póngase en contacto con su profesor o con el administrador.';
$string['view_error_unable_join_teacher'] = 'Incapáz de conectarse al servidor de BigBlueButton. Por favor, póngase en contacto con el administrador.';
$string['view_groups_selection'] = 'Seleccione el grupo al que desea unirse y confirme la acción';
$string['view_groups_selection_join'] = 'Unirse';
$string['view_login_moderator'] = 'Accediendo como moderador...';
$string['view_login_viewer'] = 'Accediendo como asistente...';
$string['view_noguests'] = 'El módulo BigBlueButtonBN no está abierto para invitados';
$string['view_nojoin'] = 'No estás en un rol con permiso para unirse a esta sesión.';
$string['view_recording_list_actionbar'] = 'Barra de herramientas';
$string['view_recording_list_actionbar_delete'] = 'Borrar';
$string['view_recording_list_actionbar_hide'] = 'Ocultar';
$string['view_recording_list_actionbar_show'] = 'Mostrar';
$string['view_recording_list_activity'] = 'Actividad';
$string['view_recording_list_course'] = 'Curso';
$string['view_recording_list_date'] = 'Fecha';
$string['view_recording_list_description'] = 'Descripción';
$string['view_recording_list_duration'] = 'Duración';
$string['view_recording_list_recording'] = 'Grabación';
$string['view_wait'] = 'La clase virtual aún no ha empezado. Esperando a que se una un moderador...';
