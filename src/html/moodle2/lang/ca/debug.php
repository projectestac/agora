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
 * Strings for component 'debug', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'El connector {$a} d\'autenticació no s\'ha trobat.';
$string['blocknotexist'] = 'El bloc {$a} no existeix';
$string['cannotbenull'] = '{$a} no pot ser nul!';
$string['cannotdowngrade'] = 'No es pot actualitzar a una versió més vella {$a->connector} des de {$a->versió vella} a {$a->nova versió}.';
$string['cannotfindadmin'] = 'No es pot trobar un usuari admin!';
$string['cannotinitpage'] = 'No es pot inicialitzar de forma completa la pàgina: invàlid {$a->name} id {$a->id}';
$string['cannotsetuptable'] = 'Les taules {$a}  NO s\'han pogut configurar amb èxit!';
$string['codingerror'] = 'Error detectat. cal que l\'arregli un programador: {$a}';
$string['configmoodle'] = 'Aquest Moodle encara no ha estat configurat. Us cal editar primer el fitxer config.php';
$string['erroroccur'] = 'S\'ha produït un error durant el procés';
$string['invalidarraysize'] = 'Mida incorrecta de matrius en els paràmetres de: {$a}';
$string['invalideventdata'] = 'S\'han enviat dades incorrectes de l\'esdeveniment: {$a}';
$string['invalidparameter'] = 'S\'ha detectat un valor de paràmetre invàlid';
$string['invalidresponse'] = 'S\'ha detectat un valor de resposta invàlid';
$string['missingconfigversion'] = 'La taula de configuració no conté la versió i no es pot continuar.';
$string['modulenotexist'] = 'El mòdul {$a} no existeix';
$string['morethanonerecordinfetch'] = 'S\'ha trobat més d\'un registre en fetch() !';
$string['mustbeoveride'] = 'Cal sobreescriure el mètode abstracte {$a}.';
$string['noactivityname'] = 'Objecte de pàgina derivat de page_generic_activity però $this->activityname no està definit';
$string['noadminrole'] = 'No s\'ha trobat el rol d\'administració';
$string['noblocks'] = 'No hi ha blocs instal·lats!';
$string['nocate'] = 'No hi ha categories!';
$string['nomodules'] = 'No hi ha mòduls!';
$string['nopageclass'] = 'S\'ha importat {$a} però no s\'han trobat classes de pàgines';
$string['noreports'] = 'Cap informe accessible';
$string['notables'] = 'Cap taula';
$string['phpvaroff'] = 'La variable de servidor PHP \'{$a->name}\' hauria d\'estar desactivada - {$a->link}';
$string['phpvaron'] = 'La variable de servidor PHP \'{$a->name}\' no s\'ha activat {$a->link}';
$string['sessionmissing'] = 'S\'ha perdut de la sessió l\'objecte {$a}';
$string['sqlrelyonobsoletetable'] = 'Aquesta SQL es basa en taules obsoletes: {$a}!  El codi ha de ser arreglat per un desenvolupador.';
$string['withoutversion'] = 'El fitxer principal version.php s\'ha perdut, no és llegible o s\'ha espatllat.';
$string['xmlizeunavailable'] = 'Les funcions xmlize no estan disponibles';
