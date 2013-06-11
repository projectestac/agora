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
 * Strings for component 'auth_pam', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_pam
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pamdescription'] = 'Den här metoden använder PAM för att få tillgång till \'native\' användarnamn på den här servern. Du måste installera <a href="http://www.math.ohio-state.edu/~ccunning/pam_auth/" target="_blank">PHP4 PAM Authentication</a> för att kunna använda den här modulen.';
$string['auth_passwordisexpired'] = 'Ditt lösenord gäller inte längre. Vill Du ändra Ditt lösenord nu?';
$string['auth_passwordwillexpire'] = 'Ditt lösenord kommer att upphöra att gälla om {$a} dagar. Vill Du ändra Ditt lösenord nu?';
$string['pluginname'] = 'PAM (inpluggningsbara moduler för autenticering)';
