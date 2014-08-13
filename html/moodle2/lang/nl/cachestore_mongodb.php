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
 * Strings for component 'cachestore_mongodb', language 'nl', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'Databank';
$string['database_help'] = 'De naam van de te gebruiken databank';
$string['extendedmode'] = 'Gebruik externe sleutels';
$string['extendedmode_help'] = 'Indien ingeschakeld worden volledige sleutel sets gebruikt bij het werken met de plugin. Dit wordt intern nog niet gebruikt, maar laat je toe om gemakkelijk met de MongoDB plugin te zoeken en onderzoeken. Als je dit inschakelt voegt dit een kleine belasting toe, dus je mag dit alleen doen als je dit nodig hebt.';
$string['password'] = 'Wachtwoord';
$string['password_help'] = 'Het wachtwoord van de gebruiker dat voor de connectie gebruikt wordt.';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'Replicaset';
$string['replicaset_help'] = 'De naam van de replicaset waarmee je wil verbinden. Als dit gegeven is, wordt de master bepaalt door het gebruik van de ismaster databank opdracht op de invoer, zodat de driver kan verbinden met een server die zelfs niet voorkomt in de lijst.';
$string['server'] = 'Server';
$string['server_help'] = 'Dit is de connectiestring voor de server die je wil gebruiken. Meerder servers kunnen opgegeven worden door ze te scheiden met komma\'s.';
$string['testserver'] = 'Testserver';
$string['testserver_desc'] = 'Dit is de connectiestring voor de testserver die je wil gebruiken. Testservers zijn volledig optioneel. Door een testserver op te geven, kun je PHPunit testen laten lopen voor deze opslagruimte en kun je performatietests uitvoeren.';
$string['username'] = 'Gebruikersnaam';
$string['username_help'] = 'De gebruikersnaam die je gebruikt om connectie te maken.';
$string['usesafe'] = 'Veilig gebruiken';
$string['usesafe_help'] = 'Indien ingeschakeld wordt de usesafe-optie gerbruikt tijdens een insert, get en remove-operatie. Als je met een replicaset werkt, dan zal dit verplicht ingeschakeld zijn.';
$string['usesafevalue'] = 'Gebruik veilige waarde';
$string['usesafevalue_help'] = 'Je kunt veilig kiezen om een specifieke waarde op te geven. Dit zal het aantal servers bepalen waarop de operaties moet worden voltooid voordat ze geacht wordt voltooid te zijn.';
