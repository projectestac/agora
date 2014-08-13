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
 * Strings for component 'qtype_numerical', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Error acceptat';
$string['addmoreanswerblanks'] = 'Blancs per a {no} preguntes més';
$string['addmoreunitblanks'] = 'Blancs per a {no} unitats més';
$string['answercolon'] = 'Resposta:';
$string['answererror'] = 'Error';
$string['answermustbenumberorstar'] = 'La resposta ha de ser un nombre, per exemple -1,234 o 3e8, o \'*\'.';
$string['answerno'] = 'Resposta {$a}';
$string['decfractionofquestiongrade'] = 'com una fracció decimal (0-1) de la qualificació de la pregunta';
$string['decfractionofresponsegrade'] = 'com una fracció decimal (0-1) de la qualificació de la resposta';
$string['decimalformat'] = 'decimals';
$string['editableunittext'] = 'Caixa d\'entrada de text';
$string['errornomultiplier'] = 'Heu d\'especificar un multiplicador per a aquesta unitat.';
$string['errorrepeatedunit'] = 'No podeu tenir dues unitats amb el mateix nom.';
$string['geometric'] = 'Geomètric';
$string['invalidnumber'] = 'Cal que entreu un nombre vàlid';
$string['invalidnumbernounit'] = 'Cal que entreu un nombre vàlid. No inclogueu unitats en la resposta.';
$string['invalidnumericanswer'] = 'Una de les respostes que heu entrat ha estat un nombre no vàlid.';
$string['invalidnumerictolerance'] = 'Una de les toleràncies que heu entrat ha estat un nombre no vàlid.';
$string['leftexample'] = 'ESQUERRA com a $1,00 o £1,00';
$string['manynumerical'] = 'Les unitats són opcionals. Si entreu una unitat, s\'utilitza per convertir la resposta a la unitat 1 abans de qualificar.';
$string['multiplier'] = 'Multiplicador';
$string['nominal'] = 'Nominal';
$string['noneditableunittext'] = 'Text NO editable de la Unitat No.1';
$string['nonvalidcharactersinnumber'] = 'Caràcters NO vàlids al número';
$string['notenoughanswers'] = 'Heu d\'introduir almenys una resposta.';
$string['nounitdisplay'] = 'No es qualifiquen les unitats';
$string['numericalmultiplier'] = 'Multiplicador';
$string['numericalmultiplier_help'] = 'El multiplicador és el factor pel qual es multiplicarà la resposta numèrica correcta.

La primera unitat (Unitat 1) té un multiplicador per omissió de 1. Així, si la resposta numèrica correcta és 5500 i establiu W com a unitat a la Unitat 1, que té l\'1 com a multiplicador per omissió, aleshores la resposta correcta és 5500 W.

Si afegiu la unitat kW amb un multiplicador de 0.001, això afegirà una resposta correcta de 5.5 kW. Això significa que tant la resposta 5500W com la de 5.5kW es marcaran com a correctes.

Noteu que també es multiplica l\'error acceptat, per la qual cosa un error acceptat de 100W esdevindrà un error de 0.1kW.';
$string['oneunitshown'] = 'La unitat 1 és mostrarà de forma automàtica a la vora de la caixa de respostes';
$string['onlynumerical'] = 'No s\'utilitzen per a res les unitats. Només es qualificarà la RESPOSTA NUMÈRICA';
$string['pleaseenterananswer'] = 'Si us plau entreu una resposta.';
$string['pleaseenteranswerwithoutthousandssep'] = 'Si us plau entreu una resposta sense utilitzar el separador de milers ({$a}).';
$string['pluginname'] = 'Numèrica';
$string['pluginnameadding'] = 'S\'està afegint una pregunta numèrica';
$string['pluginnameediting'] = 'S\'està editant una pregunta numèrica';
$string['pluginname_help'] = 'Des del punt de vista de l\'estudiant, una pregunta numèrica és com una pregunta de resposta breu. La diferència és que les respostes numèriques poden permetre un cert marge d\'error. Això permet considerar  un interval de respostes com a una única. Per exemple, si la resposta és 10 amb un error acceptat de 2, aleshores s\'acceptarà com a correcte qualsevol nombre entre 8 i 12.';
$string['pluginnamesummary'] = 'Permet una resposta numèrica, possiblement acompanyada d\'unitats, que es qualifica comparant-la amb diversos models de resposta, possiblement amb toleràncies.';
$string['relative'] = 'Relativa';
$string['rightexample'] = 'DRETA com a 1,00cm o 1,00km';
$string['selectunit'] = 'Escolliu una unitat';
$string['selectunits'] = 'Escolliu les unitats';
$string['studentunitanswer'] = 'RESPOSTA DE LA UNITAT mostrada com a';
$string['tolerancetype'] = 'Tipus de tolerància';
$string['unit'] = 'Unitat';
$string['unitappliedpenalty'] = 'Aquests valors inclouen una penalització de {$a} per tenir malament la unitat.';
$string['unitchoice'] = 'Opcions múltiples (botons/caixes de selecció)';
$string['unitedit'] = 'Edita la unitat';
$string['unitgraded'] = 'Es qualificarà la RESPOSTA NUMÈRICA i també LES UNITATS';
$string['unithandling'] = 'Tractament de les unitats';
$string['unitincorrect'] = 'No heu posat la resposta correcta';
$string['unitmandatory'] = 'Obligatori';
$string['unitmandatory_help'] = '* La resposta serà qualificada utilitzant la resposta escrita.

* Es penalitzarà si el camp està buit.';
$string['unitnotselected'] = 'Cal que seleccioneu una resposta';
$string['unitonerequired'] = 'Cal que entreu al menys una resposta';
$string['unitoptional'] = 'Pregunta opcional';
$string['unitoptional_help'] = '* Si el camp no està buit, la resposta es qualificarà utilitzant aquesta resposta.

* Si la resposta està mal escrita o es desconeguda, la resposta serà considerada com no vàlida.';
$string['unitpenalty'] = 'Penalització per resposta errònia';
$string['unitpenalty_help'] = 'La penalització s\'aplica si

* la resposta errònia s\'entra en una entrada, o
* una resposta s\'entra en una caixa d\'entrada de valors numèrics';
$string['unitposition'] = 'Posició de les unitats';
$string['units'] = 'Unitats';
$string['unitselect'] = 'un menú desplegable';
$string['unitx'] = 'Unitat {no}';
$string['validnumberformats'] = 'Formats numèrics vàlids';
$string['validnumberformats_help'] = '* números regulars 13500,67, 13 500,67, 13500,67 o 13 500,67

* si utilitzeu el separador de milers poseu *SEMPRE* el decimal com en 13.500,67 : 13.500,

* per a formes exponencials com el nombre 1,350067 * 10<sup>4</sup>, utilitzeu 1,350067 E4 : 1,350067 E04';
$string['validnumbers'] = '13500.67 : 13 500.67 : 13,500.67 : 13500,67: 13 500,67 : 1.350067 E4 : 1.350067 E04';
$string['xmustbenumeric'] = 'Cal que {$a} sigui un número.';
$string['xmustnotbenumeric'] = '{$a} no pot ser un número.';
$string['youmustenteramultiplierhere'] = 'Aquí heu d\'introduir un multiplicador';
