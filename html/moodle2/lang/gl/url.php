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
 * Strings for component 'url', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Escoller unha variábel';
$string['clicktoopen'] = 'Prema na ligazón {$a} para abrir o recurso.';
$string['configdisplayoptions'] = 'Seleccione todas as opcións que deberían estar dispoñíbeis, a configuración existente non se modifica. Manteña premida a tecla CTRL para seleccionar varios campos.';
$string['configframesize'] = 'Cando se presenta unha páxina web ou un ficheiro cargado dentro dun marco, este valor é a altura en píxeles do marco superior (o que contén a navegación).';
$string['configrolesinparams'] = 'Actíveo se quere incluír nomes de rol localizados na lista de parámetros de variábel dispoñíbeis.';
$string['configsecretphrase'] = 'Esta frase secreta utilízase para producir un valor de código cifrado que se pode enviar a algúns servidores como un parámetro. O código cifrado prodúceo un valor md5 do enderezo IP actual concatenado coa súa frase secreta. p.ex code = md5(IP.secretphrase). Vexa que isto non é fiábel porque o enderezo IP pode cambiar e ademais adoita ser compartido entre varios computadores.';
$string['contentheader'] = 'Contido';
$string['createurl'] = 'Crear un URL';
$string['displayoptions'] = 'Opcións dispoñíbeis de presentación';
$string['displayselect'] = 'Presentar';
$string['displayselectexplain'] = 'Escolla o tipo de presentación. desafortunadamente non todos os tipos están dispoñíbeis para todos os URL.';
$string['displayselect_help'] = 'Este axuste, xunto co tipo de URL, e sempre que o navegador permita a integración, determina como se presenta o URL. As opcións poden incluír:

* Automático - Seleccionase de forma automática a mellor opción para presentar o URL
* Incorporado - Presentase o URL dentro da páxina baixo a barra de navegación xunto coa descrición do URL e calquera outro bloque
* Abrir - Só se presenta o URL na xanela do navegador
* En xanela emerxente - Presentase o URL dentro dunha nova xanela do navegador sen menús nin unha barra de enderezos
* Nun marco - Presentase o URL dentro dun marco baixo a barra de navegación e a descrición do URL
* Nova xanela - Presentase o URL nunha nova xanela do navegador con menús e a barra de enderezos';
$string['externalurl'] = 'URL externo';
$string['framesize'] = 'Altura do marco';
$string['invalidstoredurl'] = 'Non é posíbel presentar este recurso, o URL non é correcto.';
$string['invalidurl'] = 'O URL introducido non é correcto';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'O módulo URL permítelle a un profesor fornecer unha ligazón web como un recurso de curso. Algo que estea libremente dispoñíbel en liña, como poden ser documentos ou imaxes, poden ligarse; o URL non ten que ser a páxina inicial dun sitio web. O URL dunha páxina particular pode ser copiado e pegado ou un profesor pode usar un selector de ficheiros e escoller unha ligazón dun repositorio tipo Flickr, YouTube ou Wikimedia (segundo que repositorios estean activados para o sitio).

Hai un certo número de opcións de presentación do URL, incorporada ou para abrirse nunha nova xanela, por exemplo, e opcións avanzadas para pasar información, tales como un nome de alumno, ao URL, se fose necesario.

Vexa que os URL tamén poden engadirse a calquera outro recurso ou tipo de actividade a través do editor de texto.';
$string['modulename_link'] = 'mod/url/vista';
$string['modulenameplural'] = 'URL';
$string['neverseen'] = 'Nunca visto';
$string['page-mod-url-x'] = 'Calquera URL do módulo páxina';
$string['parameterinfo'] = '&amp;parámetro=variábel';
$string['parametersheader'] = 'Variábeis de URL';
$string['parametersheader_help'] = 'Algunhas variábeis internas de Moodle poden asociarse automaticamente ao URL. Escriba o nome do parámetro en cada caixa(s) de texto e logo seleccione a variábel requirida de coincidencia.';
$string['pluginadministration'] = 'Administración do módulo URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Altura da xanela emerxente (en píxeles)';
$string['popupheightexplain'] = 'Especifica a altura predeterminada das xanelas emerxentes.';
$string['popupwidth'] = 'Largura da xanela emerxente (en píxeles)';
$string['popupwidthexplain'] = 'Especifica a largura predeterminada das xanelas emerxentes.';
$string['printintro'] = 'Presentar a descrición do URL';
$string['printintroexplain'] = 'Presentar a descrición do URL debaixo do contido? Algúns tipos de pantallas poida que non presenten a descrición aínda que estea activado.';
$string['rolesinparams'] = 'Incluír nomes de roles nos parámetros';
$string['serverurl'] = 'URL do servidor';
$string['url:addinstance'] = 'Engadir un novo recurso URL';
$string['url:view'] = 'Ver o URL';
