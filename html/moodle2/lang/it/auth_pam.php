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
 * Strings for component 'auth_pam', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_pam
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pamdescription'] = 'Questo metodo utilizza PAM per accedere ai nomi utente originali su questo server. E\' necessario installare <a href="http://www.math.ohio-state.edu/~ccunning/pam_auth/" target="_blank">la libreria di autenticazione PAM di PHP4</a> per poter utilizzare questo modulo.';
$string['auth_passwordisexpired'] = 'La vostra password è scaduta. Volete cambiarla adesso?';
$string['auth_passwordwillexpire'] = 'La vostra password scadrà tra {$a} giorni. Volete cambiarla adesso?';
$string['pluginname'] = 'PAM (Pluggable Authentication Modules)';
