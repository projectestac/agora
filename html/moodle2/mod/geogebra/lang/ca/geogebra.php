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

$string['configjavacodebase'] = 'URL dels fitxers JAR de GeoGebra';
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
$string['modulename_help'] = '<b>ATENCIÓ!!</b> <br>Versió alfa del mòdul del GeoGebra pel Moodle 2. Està incompleta i, per tant, algunes parts poden no funcionar adequadament.';
$string['pluginname'] = 'GeoGebra';
$string['pluginadministration'] = 'GeoGebra administration';
$string['geogebra:view'] = 'View GeoGebra';
$string['geogebra:submit'] = 'Submit GeoGebra';
$string['geogebra:grade'] = 'Grade GeoGebra';

$string['geogebra:addinstance'] = 'Add GeoGebra';
$string['header_geogebra']='GeoGebra Settings';
$string['header_score']='Avaluation Settings';
$string['filetype'] = 'Type';
$string['filetype_help'] = 'This setting determines how the GeoGebra activity is included in the course. There are up to 2 options:

* Uploaded GeoGebra - Enables a valid ".ggb" package to be chosen by the file picker. 
* External URL - Enables a URL to be specified. Note: The URL must start with http(s) or www and contain a valid ".ggb" file.';
$string['filetypeexternal'] = 'External URL';
$string['filetypelocal'] = 'Uploaded file';
$string['invalidgeogebrafile'] = 'Invalid GeoGebra specified. It must have the ".ggb" extension.';
$string['invalidurl'] = 'Invalid URL specified. It must start with http(s) and has to be a valid ".ggb" file.';
$string['geogebraurl'] = 'URL';
$string['geogebraurl_help'] = 'This setting enables a URL for the GeoGebra file to be specified, rather than choosing a file via the file picker.';
$string['geogebrafile'] = 'GeoGebra file';
$string['geogebrafile_help'] = 'The .ggb file.';
$string['urledit'] = 'GeoGebra file';
$string['urledit_help'] = 'The ".ggb" file where you will find the GeoGebra activity.';

$string['lastaccess']='Last visited';
$string['datestudent'] = 'Last modified (submission)';
$string['dateteacher']= 'Last modified (grade)';
$string['status'] = 'Estat';
$string['viewattempt'] = 'View';
$string['previewtab'] = 'Preview';
