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
 * Strings for component 'workshopallocation_scheduled', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = 'Estat actual';
$string['currentstatusexecution'] = 'Estat';
$string['currentstatusexecution1'] = 'Executat en {$a->datetime}';
$string['currentstatusexecution2'] = 'S\'executarà un altra vegada en {$a->datetime}';
$string['currentstatusexecution3'] = 'S\'executarà en {$a->datetime}';
$string['currentstatusexecution4'] = 'En espera d\'execució';
$string['currentstatusnext'] = 'Propera execució';
$string['currentstatusnext_help'] = 'En alguns casos, l\'assignació està programada per ser executada automàticament una altra vegada, encara que ja s\'hagi executat abans. Això pot succeir si, per exemple, s\'ha prolongat el termini de tramesa.';
$string['currentstatusreset'] = 'Reinicia';
$string['currentstatusreset_help'] = 'Si deseu el formulari amb aquesta casella marcada es reiniciarà l\'estat actual. S\'esborrarà qualsevol informació sobre execucions anteriors de manera que es podrà tornar a fer l\'assignació (si així ho heu decidit a l\'apartat anterior)';
$string['currentstatusresetinfo'] = 'Marqueu la casella i deseu el formulari per reiniciar el resultat de l\'execució.';
$string['currentstatusresult'] = 'Resultat de la darrera execució';
$string['enablescheduled'] = 'Activa l\'assignació programada';
$string['enablescheduledinfo'] = 'Assigna automàticament els lliuraments al final de la fase de tramesa';
$string['pluginname'] = 'Assignació programada';
$string['randomallocationsettings'] = 'Paràmetres de l\'assignació';
$string['randomallocationsettings_help'] = 'Definiu aquí els paràmetres del mètode d\'assignació aleatòria. S\'utilitzaran per part del connector d\'assignació aleatòria en el moment de fer l\'assignació de trameses.';
$string['resultdisabled'] = 'S\'ha desactivat l\'assignació programada';
$string['resultenabled'] = 'S\'ha activat l\'assignació programada.';
$string['resultexecuted'] = 'S\'han fet correctament les assignacions';
$string['resultfailed'] = 'No s\'han pogut fer les assignacions automàtiques de trameses';
$string['resultfailedconfig'] = 'L\'assignació programada està mal configurada';
$string['resultfaileddeadline'] = 'El Taller no té definida la data límit de lliurament de trameses';
$string['resultfailedphase'] = 'El Taller no està en la fase de tramesa';
$string['resultvoid'] = 'No s\'ha assignat cap tramesa';
$string['resultvoiddeadline'] = 'Encara no s\'ha sobrepassat la data límit de lliurament de les trameses';
$string['resultvoidexecuted'] = 'Ja s\'ha executat l\'assignació';
$string['scheduledallocationsettings'] = 'Paràmetres de l\'assignació programada';
$string['scheduledallocationsettings_help'] = 'Si l\'activeu, el mètode d\'assignació programat assignarà automàticament les trameses per avaluar al final de la fase de lliurament. Es pot definir el final de la fase des del paràmetre del Taller "Data límit de lliurament".

Internament el mètode d\'assignació aleatori s\'executa amb els paràmetres predefinits en aquest formulari. Això vol dir que l\'assignació programada funciona com si fos el professorat qui executés l\'assignació aleatòria al final de la fase de lliurament utilitzant la configuració anterior.

Tingueu en compte que l\'assignació programada *no* s\'executa si es canvia manualment el Taller a la fase d\'avaluació abans de la data límit de lliurament. En aquest cas haureu de fer manualment les assignacions dels enviaments. El mètode d\'assignació programada és particularment útil quan s\'usa juntament amb la característica de canvi de fase automàtic.';
$string['setup'] = 'Configuració de l\'assignació programada';
