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
 * Spanish strings for jclic
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitydone'] = 'Actividades realizadas';
$string['activitysolved'] = 'Activitades acertadas';
$string['attempts'] = 'Intentos';
$string['avaluation'] = 'Criterio de evaluaci&oacute;n';
$string['avaluation_score'] = 'Alcanzar una puntuaci&oacute;n media entre todas las actividades';
$string['avaluation_solved'] = 'Resolver correctamente un n&uacute;mero de actividades diferentes';
$string['description'] = 'Descripci&oacute;n';
$string['height']='Altura';
$string['hideall']='Mostrar s&oacute;lo los res&uacute;menes';
$string['lastaccess']='&uacute;ltimo acceso';
$string['maxattempts'] = 'N&uacute;mero m&agrave;ximo de intentos';
$string['maxgrade'] = 'Puntuaci&oacute;n/actividades a alcanzar';
$string['modulename'] = 'JClic';
$string['modulenameplural'] = 'JClic';
$string['msg_noattempts']= 'Ya has realizado esta actividad el n&uacute;mero de veces m&agrave;ximo';
$string['score']='Puntuaci&oacute;n';
$string['sessions']='Sesiones';
$string['size']='Medidas';
$string['showall']='Mostrar el detalle de las sesiones';
$string['starttime']= 'Fecha de inicio';
$string['skin'] = 'Entorno gr&agrave;fico (<i>skin</i>)';
$string['totals']= 'Totales';
$string['totaltime']= 'Tiempo total';
$string['unlimited'] = 'Ilimitado';
$string['url'] = 'Enlace';
$string['width']='Anchura';

/* Revision 20070305 */
$string['actions']='Aciertos';
$string['activity']='Actividad';
$string['msg_nosessions']='Esta actividad JClic todav&iacute;a no tiene ninguna sessi&oacute;n';
$string['solved']='Correcta';
$string['time']='Tiempo';

/* Revision 20071002 */
$string['header_jclic']='Ajustes de JClic';
$string['header_score']='Ajustes de evaluaci&oacute;n';

/* Revision 20081107 */
$string['preview_jclic']='Mostrar la actividad JClic';

/* Revision 20091023 */
$string['deleteallsessions'] = 'Borrar todas las sesiones';

/* Revision 20110119  - version 0.1.0.11 */
$string['lang']='Idioma';
$string['exiturl']='Enlace de salida';


/* Revision Moodle 2.X */
$string['availabledate'] = 'Disponible desde';
$string['closebeforeopen'] = 'No se pudo actualizar el JClic: la fecha de cierre es anterior a la de apertura.';
$string['duedate'] = 'Fecha de entrega';
$string['exiturl_help'] = 'Se trata del URL que se abrir&aacute; cuando el alumnado finalice la &uacute;ltima actividad JClic.
    
Para que esta redirecci&oacute;n funcione es necesario que, en la pesta&ntilde;a "Secuencias", la &uacute;ltima actividad del projecto JClic, tenga asociada, en la secci&oacute;n "Flecha adelante", la acci&oacute;n "Salir de JClic".';
$string['expired'] = 'Lo sentimos, esta actividad se cerró en {$a} y ya no está disponible';
$string['filetype'] = 'Tipo';
$string['filetype_help'] = 'Este parámetro determina cómo se incluye el paquete JClic en el curso. Hay 2 opciones:

* Fichero JClic subido - Posibilita escoger un fichero ".jclic.zip" válido mediante el selector de archivos.
* URL externo - Posibilita especificar el URL de un paquete JClic. NOTA: El URL debe empezar con https(s) o www y contener un fichero ".jclic.zip" válido';
$string['filetypeexternal'] = 'URL externo';
$string['filetypelocal'] = 'Fichero JClic subido';
$string['invalidjclicfile'] = 'Se ha especificado un fichero JClic no válido. El fichero debe tener la extensión ".jclic.zip".';
$string['invalidurl'] = 'Se ha especificado un URL no válido. El URL debe empezar con http(s) y enlazar a un fichero ".jclic.zip" válido.';
$string['jclic'] = 'JClic';
$string['jclicjarbase']='URL base de los ficheros JAR';
$string['jclicjarbase_help']='Dirección web donde localizar todos los ficheros jar de JClic.';
$string['jclicurl'] = 'URL';
$string['jclicurl_help'] = 'Este parámetro habilita un URL para especificar el paquete JClic en lugar de seleccionarlo a través del selector de archivos.';
$string['jclicfile'] = 'Fichero JClic';
$string['jclicfile_help'] = 'El fichero ".jclic.zip" que contiene el paquete JClic.';
$string['lap']='Tiempo entre vueltas';
$string['lap_help']='Tiempo que se deja entre las transacciones cliente-servidor (expresado en segundos)';
$string['modulename_help'] = '<a href="http://clic.xtec.cat" target="_blank">JClic</a> es un proyecto del Departament de Ensenyament de la 
    Generalitat de Cataluña que está formado por un conjunto de aplicaciones de software libre que permiten crear diversos tipos de actividades
    educativas multimedia: puzzles, asociaciones, ejercicios de texto, crucigramas, sopas de letras y otros. Además, la 
    <a href="http://clic.xtec.cat/db/listact_ca.jsp" target="_blank">zonaClic</a> dispone de una biblioteca de actividades que cuenta con unos 1000 
    proyectos que han creado profesores y personas de otros colectivos que han querido compartir solidariamente su trabajo. 
    
Este módulo permite al profesorado añadir a un curso cualquier actividad de tipo JClic y recopilar los resultados obtenidos (tiempo utilizado para cada actividad, intentos, aciertos, etc.) para cada alumno/a.';
$string['notopenyet'] = 'Esta actividad no estará disponible hasta {$a}';
$string['pluginadministration'] = 'Administración de JClic';
$string['pluginname'] = 'JClic';
$string['preview_jclic']='Previsualizar la actividad JClic';
$string['return_results']='Volver a los resultados';
$string['show_my_results']='Mostrar mis resultados';
$string['solveddone'] = 'Actividades acertadas / realizadas';
$string['urledit'] = 'Fichero JClic';
$string['urledit_help'] = 'El fichero "jclic.zip" que contiene la actividad JClic.';

$string['jclic:view'] = 'Ver JClic';
$string['jclic:submit'] = 'Enviar JClic';
$string['jclic:grade'] = 'Evaluar JClic';

/* Revision Moodle 2.3 */
$string['jclic:addinstance'] = 'Añadir un JClic';