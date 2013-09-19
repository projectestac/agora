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
 * Catalan strings for geogebra
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

$string['modulename'] = 'GeoGebra';
$string['modulenameplural'] = 'GeoGebra';
$string['noattempts'] = '-';
$string['name'] = 'Nom';
$string['choosescripttype'] = 'Escull el tipus d\'activitat';
$string['javacodebase'] = 'Codebase de GeoGebra';
$string['manualgrade'] = 'Qualificació manual?'; //Unused
$string['width'] = 'Amplada';
$string['height'] = 'Alçada';
$string['showsubmit'] = 'Mostra el botó d\'entrega';
$string['settings'] = 'Paràmetres';
$string['maxattempts'] = 'Número màxim d\'intents';
$string['grademethod'] = 'Mètode de qualificació';
$string['nograding'] = 'Sense qualificar';
$string['average'] = 'Mitjana';
$string['highestattempt'] = 'Millor intent';
$string['lowestattempt'] = 'Pitjor intent';
$string['firstattempt'] = 'Primer intent';
$string['lastattempt'] = 'Darrer intent';
$string['viewattempts'] = 'Visualitza intents';
$string['comment'] = 'Comentari';

$string['unlimitedattempts'] = 'Aquesta activitat no té límit d\'intents';
$string['lastattemptremaining'] = 'Aquest és el teu darrer intent en aquesta activitat';
$string['nomoreattempts'] = 'Ja has realitzat tots els intents possibles per a aquesta activitat';
$string['attemptsremaining'] = 'Intents disponibles per a aquesta activitat: ';

$string['activitynotopened'] = 'Aquesta activitat encara no està disponible';
$string['activityclosed'] = 'Aquesta activitat ja no està disponible';

$string['review'] = 'Revisió de';
$string['report'] = 'Informe de';
$string['for'] = 'per';
$string['description'] = 'Descripció';
$string['weight'] = 'Amplada';
$string['grade'] = 'Qualificació';
$string['total'] = 'Total';
$string['attempts'] = 'Intents';
$string['attempt'] = 'Intent';
$string['duration'] = 'Temps';

$string['errorattempt'] = 'S\'ha produït un error. No s\'ha pogut desar l\'intent.';

$string['viewtab'] = 'Mostra';
$string['resultstab'] = 'Resultats';
$string['reviewtab'] = 'Revisió';

$string['availabledate'] = 'Disponible des de';
$string['duedate'] = 'Fins a';

$string['javacodebase_help'] = 'URL dels fitxers JAR de GeoGebra';
$string['filename'] = 'Nom del fitxer';
$string['enableRightClick'] = 'Habilita el botó dret';
$string['enableLabelDrags'] = 'Permet arrossegar les etiquetes';
$string['showResetIcon'] = 'Mostra la icona de reiniciar';
$string['showMenuBar'] = 'Mostra la barra de menú';
$string['showToolBar'] = 'Mostra la barra d\'eines';
$string['showToolBarHelp'] = 'Mostra l\'ajuda de la barra d\'eines';
$string['showAlgebraInput'] = 'Mostra la barra d\'inserció'; //Unused
$string['functionalityoptionsgrp'] = 'Funcionalitats';
$string['interfaceoptionsgrp'] = 'Interfície';
$string['warningnojava'] = 'Aquest Applet Java s\'ha creat utilitzant GeoGebra (www.geogebra.org) - possiblement no tingueu el Java correctament instal·lat, comproveu-ho a www.java.com';
$string['filenotfound'] = 'El fitxer indicat no existeix';
$string['httpnotallowed'] = 'No és possible utilitzar fitxers remots';

$string['submitandfinish'] = 'Entrega i acaba';
$string['savewithoutsubmitting'] = 'Desa sense entregar';
$string['redirecttocourse'] = 'L\'activitat s\'ha desat correctament. S\'està tornant a la pàgina d\'inici';
$string['unfinished'] = 'No finalitzat';
$string['language']='Idioma';
$string['resumeattempt'] = 'Continuació d\'un intent anterior';
$string['coursewithoutstudents'] = 'No hi ha estudiants inscrits en el curs actual';
$string['deleteallattempts'] = 'Suprimeix tots els intents';
$string['view'] = 'Visualitza';
$string['gradeit'] = 'Qualificació';
$string['ungraded'] = 'Sense qualificar';
//$string['save'] = 'Desa';
$string['autograde'] = 'Activitat autopuntuable';


$string['savechanges'] = 'Desa els canvis';
$string['discardchanges'] = 'Torna sense desar';


/* Revision Moodle 2 */
$string['modulename_help'] = '<p><a href="http://www.geogebra.org" target="_blank">GeoGebra</a> és una aplicació de matemàtica dinàmica, gratuïta, lliure i multiplataforma, enfocada a tots els nivells educatius, que aglutina la geometria, l\'àlgebra, el full de càlcul, l\'estadística i l\'anàlisi, en un únic paquet integrat, molt fàcil d\'utilitzar.</p>
<p>Per aquest motiu, el <a href="http://www.gencat.cat/ensenyament/" target="_blank">Departament d\'Ensenyament de Catalunya</a>, en col·laboració amb l\'<a href="http://acgeogebra.cat/" target="_blank">Associació Catalana de GeoGebra</a> (ACG) i l\'equip de desenvolupament de GeoGebra han implementat aquest mòdul que permet la incorporació d\'aquest tipus d\'activitats a Moodle. Les seves característiques principals són:
<ul>
    <li>Permet incrustar activitats GeoGebra a qualsevol curs de forma molt senzilla.</li>
    <li>Facilita el seguiment ja que guarda la puntuació, data, durada i construccions de cadascun dels intents que realitza l\'alumnat.</li>
    <li>L\'alumnat pot desar l\'estat de les activitats realitzades per continuar-les en un altre moment.</li>
</ul></p>';
$string['pluginname'] = 'GeoGebra';
$string['pluginadministration'] = 'Administració de GeoGebra';
$string['geogebra:view'] = 'Visualitza GeoGebra';
$string['geogebra:submit'] = 'Envia GeoGebra';
$string['geogebra:grade'] = 'Avalua GeoGebra';

$string['geogebra:addinstance'] = 'Afegeix una activitat GeoGebra';
$string['header_geogebra']='Paràmetres del GeoGebra';
$string['header_score']='Paràmetres d\'avaluació del GeoGebra';
$string['filetype'] = 'Tipus';
$string['filetype_help'] = 'Aquest paràmetre determina com s\'incorporarà l\'activitat GeoGebra al curs. Hi ha dues opcions:

* Fitxer pujat - Permet escollir un fitxer ".ggb" vàlid mitjançant el selector d\'arxius. 
* URL extern - Permet especificar el URL d\'una activitat GeoGebra. Nota: El URL ha de començar amb http(s) o www i contenir un fitxer ".ggb" vàlid.';
$string['filetypeexternal'] = 'URL extern';
$string['filetypelocal'] = 'Fitxer pujat';
$string['invalidgeogebrafile'] = 'S\'ha especificat un fitxer GeoGebra no vàlid. El fitxer ha de tenir l\'extensió ".ggb".';
$string['invalidurl'] = 'S\'ha especificat un URL no vàlid. El URL ha de començar amb http(s) i ha d\'enllaçar a un fitxer ".ggb" vàlid.';
$string['geogebraurl'] = 'URL';
$string['geogebraurl_help'] = 'Aquest paràmetre permet especificar el URL de l\'activitat GeoGebra enlloc de seleccionar-la mitjançant el selector d\'arxius.';
$string['geogebrafile'] = 'Fitxer GeoGebra';
$string['geogebrafile_help'] = 'El fitxer ".ggb" que conté l\'activitat GeoGebra.';
$string['urledit'] = 'Fitxer GeoGebra';
$string['urledit_help'] = 'El fitxer ".ggb" que conté l\'activitat GeoGebra.';

$string['datestudent'] = 'Darrera modificació (tramesa)';
$string['dateteacher']= 'Darrera modificació (qualificació)';
$string['status'] = 'Estat';
$string['viewattempt'] = 'Visualitza';
$string['previewtab'] = 'Previsualitza';

$string['notopenyet'] = 'Ho sentim, aquesta activitat no estarà disponible fins {$a}';
$string['expired'] = 'Ho sentim, aquesta activitat es va tancar el {$a} i, per tant, ja no està disponible';
$string['msg_noattempts']= 'Ja has fet aquesta activitat el nombre m&agrave;xim de vegades perm&egrave;s.';
$string['lastmodifiedsubmission'] = $string['datestudent'];
$string['lastmodifiedgrade'] = $string['dateteacher'];
$string['viewattempttab'] = 'Intent';