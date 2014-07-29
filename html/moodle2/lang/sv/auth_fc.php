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
 * Strings for component 'auth_fc', language 'sv', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'URL för att byta lösenord';
$string['auth_fcconnfail'] = 'Det gick inte att ansluta med felnummer {$a->no}   sträng med felmeddelande: {$a->str}';
$string['auth_fccreators'] = 'Lista på grupper vars medlemmar har tillstånd att skapa nya kurser. Skilj flerfaldiga grupper med \';\'. Namn måste stavas exakt som på FirstClass servern. Systemet är skiftlägeskänsligt.';
$string['auth_fccreators_key'] = 'Skapare';
$string['auth_fcdescription'] = 'Den här metoden använder en FirstClass server för att kontrollera huruvida ett användarnamn eller ett lösenord är giltigt.';
$string['auth_fcfppport'] = 'Serverport (3333 är den vanligaste)';
$string['auth_fcfppport_key'] = 'Port';
$string['auth_fchost'] = 'Adressen till FirstClass-servern. Använd det här IP-numret eller DNS-namnet.';
$string['auth_fchost_key'] = 'Värd:';
$string['auth_fcpasswd'] = 'Lösenordet för det ovanstående kontot';
$string['auth_fcpasswd_key'] = 'Lösenord';
$string['auth_fcuserid'] = 'AnvändarID för FirstClass-konto med inställningen "Subadministrator" aktiverad.';
$string['auth_fcuserid_key'] = 'AnvändarID';
$string['pluginname'] = 'Använd en FirstClass-server';
