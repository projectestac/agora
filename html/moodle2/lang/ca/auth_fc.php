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
 * Strings for component 'auth_fc', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'URL de canvi de contrasenya';
$string['auth_fcconnfail'] = 'Ha fallat la connexió amb número d\'error: {$a->no} i text d\'error: {$a->str}';
$string['auth_fccreators'] = 'Llista de grups als membres dels quals els és permès de crear nous cursos. Separeu els diferents grups amb \';\'. Els noms han de ser exactament iguals als del servidor FirstClass. El sistema distingeix majúscules i minúscules.';
$string['auth_fccreators_key'] = 'Creadors';
$string['auth_fcdescription'] = 'Aquest mètode utilitza un servidor FirstClass per comprovar si el nom d\'usuari i la contrasenya són vàlids.';
$string['auth_fcfppport'] = 'Número de port del servidor (el més comú és el 3333)';
$string['auth_fcfppport_key'] = 'Port';
$string['auth_fchost'] = 'Adreça del servidor FirstClass. Utilitzeu el número IP o el nom del DNS.';
$string['auth_fchost_key'] = 'Servidor';
$string['auth_fcpasswd'] = 'Contrasenya d\'aquest compte.';
$string['auth_fcpasswd_key'] = 'Contrasenya';
$string['auth_fcuserid'] = 'Userid del compte FirstClass amb conjunt de privilegis de \'Subaministrador\'.';
$string['auth_fcuserid_key'] = 'Usuari ID';
$string['pluginname'] = 'Servidor FirstClass';
