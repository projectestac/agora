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
 * English strings for jclic
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Xosé Luis Barreiro Cebey (xoseluis@edu.xunta.es)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitydone'] = 'Actividades realizadas';
$string['activitysolved'] = 'Actividades acertadas';
$string['attempts'] = 'Intentos';
$string['avaluation'] = 'Criterio de avaliaci&oacute;n';
$string['avaluation_score'] = 'Acadar unha puntuaci&oacute;n media entre todas as actividades';
$string['avaluation_solved'] = 'Resolver correctamente un n&uacute;mero de actividades diferentes';
$string['description'] = 'Descrici&oacute;n';
$string['height']='Altura';
$string['hideall']='Amosar s&oacute; os resumos';
$string['lastaccess']='&uacute;ltimo acceso';
$string['maxattempts'] = 'N&uacute;mero m&aacute;ximo de intentos';
$string['maxgrade'] = 'Puntuaci&oacute;n/actividades a acadar';
$string['modulename'] = 'JClic';
$string['modulenameplural'] = 'JClic';
$string['msg_noattempts']= 'Xa realizaches esta actividade o n&uacute;mero de veces m&aacute;ximo';
$string['score']='Puntuaci&oacute;n';
$string['sessions']='Sesi&oacute;ns';
$string['size']='Medidas';
$string['showall']='Amosar o detalle das sesi&oacute;ns';
$string['starttime']= 'Data de inicio';
$string['skin'] = 'Entorno gr&aacute;fico (<i>skin</i>)';
$string['totals']= 'Totais';
$string['totaltime']= 'Tempo total';
$string['unlimited'] = 'Ilimitado';
$string['url'] = 'Enlace';
$string['width']='Anchura';

/* Revision 20070305 */
$string['actions']='Acertos';
$string['activity']='Actividade';
$string['msg_nosessions']='Esta actividade JClic a&iacute;nda non ten ningunha sesi&oacute;n';
$string['solved']='Correcta';
$string['time']='Tempo';

/* Revision 20071002 */
$string['header_jclic']='Axustes de JClic';
$string['header_score']='Axustes de avaliaci&oacute;n';

/* Revision 20091026 */
$string['deleteallsessions'] = 'Borrar t&oacute;dalas sesi&oacute;ns';

/* Revision 20110119  - version 0.1.0.11 */
$string['lang']='Idioma';
$string['exiturl']='Enlace de sa&iacute;da';


/* Revision Moodle 2.X 20110725 */
$string['availabledate'] = 'Dispo&ntilde;ible desde';
$string['closebeforeopen'] = 'No se puido actualizar o JClic: a data de peche &eacute; anterior &aacute; de apertura.';
$string['duedate'] = 'Data de entrega';
$string['exiturl_help'] = 'Tr&aacute;tase da URL que se abrir&aacute; cando o alumnado remate a derradeira actividade JClic.
    
Para que esta redirecci&oacute;n funcione &eacute; necesario que, na pestana "Secuencias", a derradeira actividade do proxecto JClic, te&ntilde;a asociada, na selecci&oacute;n "Data adiante", a acci&oacute;n "Sa&iacute;r de JClic".';
$string['expired'] = 'Sent&iacute;molo, esta actividade pechouse en {$a} e xa non est&aacute; dispo&ntilde;ible';
$string['filetype'] = 'Tipo';
$string['filetype_help'] = 'Este par&aacute;metro determina como se incl&uacute;e no paquete JClic no curso. Hai 2 opci&oacute;ns:

* Ficheiro JClic subido - Posibilita escoller un ficheiro ".jclic.zip" v&aacute;lido mediante o selector de arquivos.
* URL externa - Posibilita especificar a URL dun paquete JClic. NOTA: A URL debe comezar con https(s) ou www e conter un ficheiro ".jclic.zip" v&aacute;lido';
$string['filetypeexternal'] = 'URL externa';
$string['filetypelocal'] = 'Ficheiro JClic subido';
$string['invalidjclicfile'] = 'Especificouse un ficheiro JClic non v&aacute;lido. O ficheiro debe ter a extensi&oacute;n ".jclic.zip".';
$string['invalidurl'] = 'Especificouse unha URL non v&aacute;lido. A URL debe comezar con http(s) e enlazar a un ficheiro ".jclic.zip" v&aacute;lido.';
$string['jclic'] = 'JClic';
$string['jclicjarbase']='URL base dos ficheiros JAR';
$string['jclicjarbase_help']='Direcci&oacute;n web onde localizar t&oacute;dolos ficheiros jar de JClic.';
$string['jclicurl'] = 'URL';
$string['jclicurl_help'] = 'Este par&aacute;metro habilita unha URL para especificar o paquete JClic en lugar de seleccionalo a trav&eacute;s do selector de arquivos.';
$string['jclicfile'] = 'Ficheiro JClic';
$string['jclicfile_help'] = 'O ficheiro ".jclic.zip" que cont&eacute;n o paquete JClic.';
$string['lap']='Tempo entre voltas';
$string['lap_help']='Tempo que se deixa entre as transacci&oacute;ns cliente-servidor (expresado en segundos)';
$string['modulename_help'] = '<a href="http://clic.xtec.cat" target="_blank">JClic</a> &eacute; un proxecto do Departament de Ensenyament da 
    Generalitat de Cataluña que est&aacute; formado por un conxunto de aplicaci&oacute;ns de software libre que permiten crear diversos tipos de actividades
    educativas multimedia: quebracabezas, asociaci&oacute;ns, exercicios de texto, encrucillados, sopas de letras y outros. Ademais, a 
    <a href="http://clic.xtec.cat/db/listact_ca.jsp" target="_blank">zonaClic</a> disp&oacute;n dunha biblioteca de actividades que conta cuns 1000 
    proxectos que crearon mestres e persoas doutros colectivos que quixeron compartir solidariamente o seu traballo. 
    
Este m&oacute;dulo permite ao profesorado engadir a un curso calquera actividade de tipo JClic e recopilar os resultados obtidos (tempo empregado para cada actividade, intentos, acertos, etc.) para cada alumno/a.';
$string['notopenyet'] = 'Esta actividade non estar&aacute; dispo&ntilde;ible ata {$a}';
$string['pluginadministration'] = 'Administraci&oacute;n de JClic';
$string['pluginname'] = 'JClic';
$string['preview_jclic']='Amosar a actividade JClic'; // Previsualizar la actividad JClic
$string['return_results']='Volver aos resultados';
$string['show_my_results']='Amosar os resultados'; // Mostrar mis resultados
$string['solveddone'] = 'Actividades acertadas / realizadas';
$string['urledit'] = 'Ficheiro JClic';
$string['urledit_help'] = 'O ficheiro "jclic.zip" que cont&eacute;n a actividade JClic.';
