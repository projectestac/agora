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
 * Strings for component 'enrol_manual', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Ändra status';
$string['altertimeend'] = 'Ändra stopptid';
$string['altertimestart'] = 'Ändra starttid';
$string['assignrole'] = 'Tilldela roll';
$string['confirmbulkdeleteenrolment'] = 'Vill du verkligen ta bort dessa deltagare i kursen?';
$string['defaultperiod'] = 'Förinställd period som användare är kopplad till kursen';
$string['defaultperiod_help'] = 'Förinställd tid som användaren är kopplad till kursen, med start från då användaren läggs till. Om denna är "0" är tiden obegränsad.';
$string['deleteselectedusers'] = 'Ta bort valda deltagare från kursen';
$string['editenrolment'] = 'Ändra koppling av deltagare';
$string['editselectedusers'] = 'Ändra valda användarkopplingar';
$string['enrolledincourserole'] = 'Registrerad i "{$a->course}" som "{$a->role}"';
$string['enrolusers'] = 'Lägg till användare';
$string['manual:config'] = 'Konfigurera instanser för manuell tilläggning av användare i kurs';
$string['manual:enrol'] = 'Lägg till användare';
$string['manual:manage'] = 'Hantera tilläggning av användare';
$string['manual:unenrol'] = 'Koppla bort användare från kursen';
$string['manual:unenrolself'] = 'Koppla bort dig själv från kursen';
$string['pluginname'] = 'Koppla användare manuellt';
$string['status'] = 'Tillåt lägga till användare manuellt';
$string['statusdisabled'] = 'Avaktiverad';
$string['statusenabled'] = 'Aktiverad';
$string['status_help'] = 'Denna inställning bestämmer om användare kan läggas till manuellt av exempelvis kursansvarig eller andra med sådana rättigheter.';
$string['unenrol'] = 'Koppla bort deltagaren från kursen';
$string['unenrolselectedusers'] = 'Koppla bort valda deltagare från kursen';
$string['unenrolselfconfirm'] = 'Vill du verkligen koppla bort dig själv från kursen "{$a}"?';
$string['unenroluser'] = 'Vill du verkligen koppla bort "{$a->user}" från kursen "{$a->course}"?';
$string['unenrolusers'] = 'Koppla bort användare';
$string['wscannotenrol'] = 'Det gick inte att manuellt lägga till en användare i kursen id = {$a->courseid}';
$string['wsnoinstance'] = 'Manuell tilläggning av användare finns inte eller är avaktiverad i kursen (id = {$a->courseid})';
$string['wsusercannotassign'] = 'Du har inte tillstånd att tilldela rollen ({$a->roleid}) till användaren ({$a->userid}) i den här kursen ({$a->courseid}).';
