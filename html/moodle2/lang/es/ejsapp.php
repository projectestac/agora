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
 * Strings for component 'ejsapp', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   ejsapp
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['appletfile'] = 'Easy Java Simulation';
$string['appletfile_help'] = 'Selecione el archivo .jar que encapsula el laboratorio EJS (Easy Java Simulation). La p&aacute;gina oficial de EJS es http://fem.um.es/Ejs/';
$string['appletfile_required'] = 'Se debe seleccionar un archivo .jar';
$string['applet_size_conf'] = 'Reescalado del applet';
$string['applet_size_conf_help'] = 'Tres opciones: 1) "Mantener tama&ntilde;o original" mantendr&aacute; el tama&ntilde;o original del applet en EJS, 2) "Permitir que Moodle fije el tama&ntilde;o" redimensionar&aacute; el applet para que ocupe todo el espacio posible a la par que respeta la relaci&oacute;n de tama&ntilde;o original, 3) "Permitir que el usuario fije el tama&ntilde;o" permitir&aacute; al usuario establecer el tama&ntilde;o del applet y seleccionar si desea mantener, o no, su relaci&oacute;n de tama&ntilde;o original.';
$string['appwording'] = 'Enunciado';
$string['check_bookings'] = 'Consulte sus reservas activas con el sistema de reservas.';
$string['custom_height'] = 'Altura del applet (px)';
$string['custom_height_required'] = 'ATENCIÓN: La altura del applet no fue fijada. Debes proporcionar un valor distinto.';
$string['custom_width'] = 'Anchura del applet (px)';
$string['custom_width_required'] = 'ATENCI&Oacute;N: La anchura del applet no fue fijada. Debes proporcionar un valor distinto.';
$string['dailyslots'] = 'Horas de trabajo diarias';
$string['dailyslots_help'] = 'Cantidad diaria de horas m&aacute;ximas que se le permitir&aacute; usar a cada alumno para trabajar con este laboratorio.';
$string['default_communication_set'] = 'Opciones de comunicaci&oacute;n por defecto';
$string['ejsapp'] = 'EJSApp';
$string['ejsapp_error'] = 'La actividad EJSApp a la que est&aacute; tratando de acceder no existe.';
$string['ejsappname'] = 'Nombre del laboratorio';
$string['ejsappname_help'] = 'Nombre con que figurar&aacute; el laboratorio en el curso';
$string['EJS_version'] = 'ATENCI&Oacute;N: El applet no fu&eacute; generado con EJS 4.37 (build 121201), o superior. Recomp&iacute;lalo con una versi&oacute;n m&aacute;s moderna de EJS o puede que algunas caracter&iacute;sticas no funciones correctamente.';
$string['file_error'] = 'No pudo abrirse el fichero en el servidor';
$string['ip_lab'] = 'direccis&oacute;n IP';
$string['ip_lab_help'] = 'Direcci&oacute;n IP del sistema experimental.  Si est&aacute; usando Sarlab, no tiene que preocuparse de este par&aacute;metro.';
$string['ip_lab_required'] = 'ATENCI&Oacute;N: Debe proporcionar una direcci&oacute;n IP valida.';
$string['is_rem_lab'] = 'Sistema experimental remoto?';
$string['is_rem_lab_help'] = 'Si este EJSApp conecta a recursos reales de manera remota Y quieres que el Sistema de Reservas EJSApp controle su acceso, selecciona "s&iacute;". En caso contrario, selecciona "no".';
$string['jar_file'] = 'Archivo .jar que encapsula el laboratorio EJS';
$string['manifest_error'] = '> No se ha podido encontrar o abrir el manifiesto .mf. Revise el fichero que ha cargado.';
$string['modulename'] = 'EJSApp';
$string['modulename_help'] = 'El m&oacute;dulo de actividad EJSApp permite a un profesor a&ntilde;adir applets de Java creados con Easy Java Simulations (EJS) en sus cursos de Moodle.

Los applets de EJS quedar&aacute;n embebidos dentro de los cursos de Moodle. El profesor puede seleccionar si mantener el tama&ntilde;o original del applet o permitir que Moodle lo reescale de acuerdo al espacio disponible. Si el applet fue compilado con la opci&oacute;n "A&ntilde;adir soporte idiomas" en EJS, el applet embebido en Moodle con la actividad EJSApp configurar&aacute; autom&aacute;ticamente su idioma a aquel seleccionado por el usuario de Moodle, si esto es posible. Esta actividad es compatible con la configuraci&oacute;n de restricciones de acceso condicional.

Cuando se usa junto al Navegador EJSApp de Ficheros, los estudiantes pueden guardar el estado del applet EJS, cuando lo est&eacute;n ejecutando, simplemente pulsando con el bot&oacute;n derecho del rat&oacute;n sobre el applet y seleccionando la opci&oacute;n adecuada en el men&uacute; que aparece. La informaci&oacute;n de estos estados se graba en un fichero .xml que es guardado en el area de ficheros privados (Navegador EJSApp de Ficheros). Estos estados pueden recuperarse de dos maneras distintas: pulsando sobre los ficheros .xml en el Navegador EJSApp de Ficheros o pulsando con el bot&oacute;n derecho del rat&oacute;n sobre el applet EJS y seleccionando la opci&oacute;n adecuada en el men&uacute;. Si el applet EJS est&aacute; preparado para tal efecto, tambi&eacute;n puede grabar ficheros de texto o im&aacute;genes y guardarlos en el &aacute;rea de ficheros privados.

Cuando se usa junto al bloque EJSApp de Sesiones Colaborativas, los usuarios de Moodle pueden trabajar con el mismo applet EJS de una manera s&iacute;ncrona, es decir, de tal forma que el applet mostrar&aacute; el mismo estado para todos los usuarios en la sesi&oacute;n colaborativa. Gracias a este bloque, los usuarios pueden crear sesiones, invitar a otros usuarios y trabajar juntos con la misma actividad EJSApp.';
$string['modulenameplural'] = 'EJSApps';
$string['moodle_resize'] = 'Permitir que Moodle fije el tama&ntilde;o';
$string['more_text'] = 'Texto optional tras el applet';
$string['no_booking'] = 'No tiene reserva para este laboratorio en este horario.';
$string['pluginadministration'] = 'Administraci&oacute;n del EJSApp';
$string['pluginname'] = 'EJSApp';
$string['port'] = 'Puerto';
$string['port_help'] = 'El puerto a usar para establecer la comunicaci&oacute;n. Si est&aacute; usando Sarlab, no tiene que preocuparse de este par&aacute;metro.';
$string['port_required'] = 'ATENCI&Oacute;N: Debe proporcionar un puerto v&aacute;lido.';
$string['practiceintro'] = 'Identificador de pr&aacute;ctica en Sarlab';
$string['practiceintro_help'] = 'Pr&aacute;cticas (separadas por punto y coma) configuradas en Sarlab para este sistema experimental.';
$string['practiceintro_required'] = 'ATENCI&Oacute;N: Debe especificar al menos una pr&aacute;ctica.';
$string['preserve_applet_size'] = 'Mantener tama&ntilde;o original';
$string['preserve_aspect_ratio'] = 'Mantener relaci&oacute;n de tama&ntilde;o';
$string['preserve_aspect_ratio_help'] = 'Si selecciona esta opci&oacute;n, se respetar&aacute; la relaci&oacute;n de tama&ntilde;o original del applet. En ese caso, el usuario podr&aacute; modificar la anchura del applet y el sistema ajustar&aacute; autom&aacute;ticamente el valor para su altura. Si no se selecciona, el usuario podr&aacute; fijar tanto su anchura como su altura.';
$string['rem_lab_conf'] = 'Configuraci&oacute;n del laboratorio remoto';
$string['sarlab'] = 'Usar Sarlab?';
$string['sarlab_collab'] = 'Usar acceso colaborativo de Sarlab?';
$string['sarlab_collab_help'] = 'Si deseas que Sarlab ofrezca la opci&oacute;n de acceso colaborativo a este laboratorio remoto o no';
$string['sarlab_help'] = 'Seleccionar \'ss&iacute;\' unicamente si se esta usando Sarlab; un sistema que gestiona las conexiones a recursos de laboratorios remotos';
$string['sarlab_instance'] = 'Servidor Sarlab para este laboratorio';
$string['sarlab_instance_help'] = 'El orden se corresponde con aquel usado para los valores en las variables sarlab_IP y sarlab_port fijados en la p&aacute;gina de configuraci&oacute;n de ejsapp';
$string['sarlab_IP'] = 'Direcci&aacute;n IP del servidor Sarlab';
$string['sarlab_IP_description'] = 'Si usa Sarlab (un sistema que gestiona las conexiones a recursos de laboratorios remotos), debe proporcionar la direcci&oacute;n IP del servidor que ejecuta el sistema Sarlab que desea utilizar. En caso contrario, este valor no es usado, de modo que puede dejar el valor por defecto';
$string['sarlab_port'] = 'Puerto de comunicaciones con Sarlab';
$string['sarlab_port_description'] = 'Si usa Sarlab (un sistema que gestiona las conexiones a recursos de laboratorios remotos), debe proporcionar un puerto v&aacute;lido para establecer las comunicaciones necesarias con el servidor de Sarlab. En caso contrario, este valor no es usado, de modo que puede dejar el valor por defecto';
$string['state_fail_msg'] = 'Error al intentar cargar el estado';
$string['statefile'] = 'Estado del Easy Java Simulation';
$string['state_file'] = 'Archivo .xml con el estado que este laboratorio EJS debe leer';
$string['statefile_help'] = '';
$string['state_load_msg'] = 'Se va a actualizar el estado del laboratorio';
$string['totalslots'] = 'Horas de trabajo totales';
$string['totalslots_help'] = 'Cantidad total de horas m&aacute;ximas que se le permitir&aacute; usar a cada alumno para trabajar con este laboratorio.';
$string['user_resize'] = 'Permitir que el usuario fije el tama&ntilde;o';
$string['weeklyslots'] = 'Horas de trabajo semanales';
$string['weeklyslots_help'] = 'Cantidad semanal de horas m&aacute;ximas que se le permitir&aacute; usar a cada alumno para trabajar con este laboratorio.';
