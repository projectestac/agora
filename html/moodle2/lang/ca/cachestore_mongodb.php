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
 * Strings for component 'cachestore_mongodb', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_mongodb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database'] = 'Base de dades';
$string['database_help'] = 'El nom de la base de dades a utilitzar.';
$string['extendedmode'] = 'Utilitza claus esteses';
$string['extendedmode_help'] = 'Si s\'habilita la clau completa s\'utilitzarà quan es treballi amb el connector. Això no s\'utilitza internament encara, però li permetrà buscar i investigar fàcilment el connector MongoDB manualment si així ho desitja. Activar aquesta opció afegirà un petita sobrecàrrega pel que només s\'ha de fer si vostè ho requereix.';
$string['password'] = 'Contrasenya';
$string['password_help'] = 'La contrasenya que l\'usuari utilitza durant la connexió.';
$string['pluginname'] = 'MongoDB';
$string['replicaset'] = 'Rèplica';
$string['replicaset_help'] = 'El nom de la rèplica per connectar-si. Si això es dóna el mestre es determinarà mitjançant ordres en la base de dades en l\'alimentació, de manera que el controlador pot tancar la connexió a un servidor que ni tan sols és a la llista.';
$string['server'] = 'Servidor';
$string['server_help'] = 'Aquesta és la cadena de connexió per al servidor que voleu utilitzar. Es poden especificar múltiples servidors separant-los amb comes.';
$string['testserver'] = 'Servidor de prova';
$string['testserver_desc'] = 'Aquesta és la cadena de connexió per al servidor de prova que voleu utilitzar. Els servidors de prova són totalment opcionals, per especificar un servidor de prova es podeu executar proves PHPUnit d\'aquesta botiga i podeu executar les proves de rendiment.';
$string['username'] = 'Nom d\'usuari';
$string['username_help'] = 'El nom d\'usuari a utilitzar quan es faci la connexió';
$string['usesafe'] = 'Mode segur';
$string['usesafe_help'] = 'Si s\'habilita l\'opció mode segur s\'utilitzarà durant les operacions d\'inserció, obtenció i supressió. Si heu especificat una rèplica aquesta es forçarà en qualsevol cas.';
$string['usesafevalue'] = 'Useu el valor per al mode segur';
$string['usesafevalue_help'] = 'Podeu optar per proporcionar un valor específic per a l\'ús del mode segur. Això determinarà el nombre de servidors i les operacions que s\'han de completar abans que es consideri que s\'ha completat.';
