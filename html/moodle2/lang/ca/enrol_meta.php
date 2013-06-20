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
 * Strings for component 'enrol_meta', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['linkedcourse'] = 'Enllaç al curs';
$string['meta:config'] = 'Configura les instàncies de meta-inscripció';
$string['meta:selectaslinked'] = 'Selecciona el curs com meta enllaçat';
$string['meta:unenrol'] = 'Suprimeix la inscripció als usuaris suspesos';
$string['nosyncroleids'] = 'Rols que no estan sincronitzats';
$string['nosyncroleids_desc'] = 'Per defecte totes les assignacions de rol de nivell de curs estan sincronitzades dels cursos pare al cursos fills. Els rols que es seleccionin aquí no s\'inclouen en el procés de sincronització. Els rols disponibles per sincronització s\'actualitzaran en la següent execució del dimoni cron.';
$string['pluginname'] = 'Enllaç de meta curs';
$string['pluginname_desc'] = 'El connector d\'inscripció de l\'enllaç de meta curs sincronitza inscripcions i rols en dos cursos diferents.';
$string['syncall'] = 'Sincronitza tot els usuaris inscrits';
$string['syncall_desc'] = 'Si s\'habilita tots els usuaris inscrits es sincronitzaran encara que no tinguin cap rol al curs pare. Si es deshabilita sols els usuaris que tinguin com a mínim un rol sincronitzat seran inscrits al curs fill.';
