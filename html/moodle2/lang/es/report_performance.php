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
 * Strings for component 'report_performance', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   report_performance
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['check_backup'] = 'Copia de seguridad automática';
$string['check_backup_comment_disable'] = 'El rendimiento puede verse afectado durante el proceso de copia de seguridad. Si se activa, las copias de seguridad se deben programar en momentos de poca actividad.';
$string['check_backup_comment_enable'] = 'El rendimiento puede verse afectado durante el proceso de copia de seguridad. Las copias de seguridad deben programarse para las horas valle (baja actividad)';
$string['check_backup_details'] = 'Habilitar las copias de seguridad automáticas creará automáticamente archivos de copia de todos los cursos en el servidor en el momento especificado. <p> Durante este proceso, se consumirán más recursos del servidor y podría afectar al rendimiento. </p>';
$string['check_cachejs_comment_disable'] = 'Si se habilita, se mejora el rendimiento en la carga de páginas.';
$string['check_cachejs_comment_enable'] = 'Si se deshabilita, las páginas pueden cargarse más lentamente.';
$string['check_cachejs_details'] = 'El almacenamiento en caché Javascript y la compresión mejoran en gran medida el rendimiento en la carga de página. Es altamente recomendable en los sitios en producción.';
$string['check_debugmsg_comment_developer'] = 'Si se establece otro diferente a DESARROLLADOR, el rendimiento puede ser mejorado ligeramente.';
$string['check_debugmsg_comment_nodeveloper'] = 'Si se establece a DESARROLLADOR, el rendimiento puede verse afectado ligeramente.';
$string['check_debugmsg_details'] = 'Pocas veces hay alguna ventaja en ir a nivel de Desarrollador, a menos que usted sea un desarrollador, en cuyo caso es altamente recomendable. <p> Una vez que haya recibido el mensaje de error, y lo haya copiado y pegado en otra parte, es ALTAMENTE RECOMENDABLE volver a cambiar Depurando a NINGUNO. Los mensajes de depuración pueden dar pistas a un hacker sobre la configuración de su sitio y puede afectar al rendimiento. </p>';
$string['check_enablestats_comment_disable'] = 'El rendimiento puede verse afectado por las estadísticas de procesamiento. Si está habilitado, los valores de estadísticas deben establecerse con cautela';
$string['check_enablestats_comment_enable'] = 'El rendimiento puede verse afectado por las estadísticas de procesamiento. La configuración de las estadísticas debe establecerse con cautela.';
$string['check_enablestats_details'] = 'La activación de esta opción procesará los registros de las tareas programadas (cronjob)  y recopilará algunas estadísticas. Dependiendo de la cantidad de tráfico en su sitio, esto puede tomar un cierto tiempo. <p> Durante este proceso, se va a consumir más recursos de servidor y puede afectar al rendimiento. </p>';
$string['check_themedesignermode_comment_disable'] = 'Si está habilitado, las imágenes y las hojas de estilos no se almacenarán en caché, lo que dará como resultado una degradación significativa del rendimiento.';
$string['check_themedesignermode_comment_enable'] = 'Si está deshabilitado, las imágenes y las hojas de estilos se almacenan en caché, lo que dará como resultado una mejora significativa en el rendimiento.';
$string['check_themedesignermode_details'] = 'Esto es a menudo la causa de los sitios de Moodle lentos. <p> Por término medio se podría tomar por lo menos dos veces la cantidad de CPU para ejecutar un sitio Moodle con el modo de diseño de temas habilitado. </p>';
$string['comments'] = 'Comentarios';
$string['disabled'] = 'Deshabilitado';
$string['edit'] = 'Editar';
$string['enabled'] = 'Habilitado';
$string['issue'] = 'Problema';
$string['morehelp'] = 'más ayuda';
$string['performancereportdesc'] = 'Este informe enumera los problemas que pueden afectar al rendimiento del sitio {$a}';
$string['performance:view'] = 'Ver informe de rendimiento';
$string['pluginname'] = 'Vista general del rendimiento';
$string['value'] = 'Valor';
