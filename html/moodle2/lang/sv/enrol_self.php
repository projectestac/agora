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
 * Strings for component 'enrol_self', language 'sv', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['customwelcomemessage'] = 'Välkomstmeddelande';
$string['defaultrole'] = 'Förinställd roll för användare';
$string['defaultrole_desc'] = 'Bestäm vilken roll användare som anger kursnyckeln ska få i kursen.';
$string['editenrolment'] = 'Ändra inställningar';
$string['enrolenddate'] = 'Slutdatum';
$string['enrolenddate_help'] = 'Om aktiverat, kan användare inte koppla sig till kurssidan med kursnyckeln efter det angivna datumet.';
$string['enrolenddaterror'] = 'Datum för registrering kan inte vara senare än startdatumet.';
$string['enrolme'] = 'Koppla mig';
$string['enrolperiod'] = 'Längd på period som användaren kopplas.';
$string['enrolstartdate'] = 'Startdatum';
$string['enrolstartdate_help'] = 'Om aktiverat, kan användare koppla sig till kurssidan med kursnyckeln från och med det angivna datumet.';
$string['groupkey'] = 'Använd grupp-kursnycklar.';
$string['groupkey_desc'] = 'Använd grupp-kursnycklar som förinställning.';
$string['longtimenosee'] = 'Koppla bort inaktiva användare efter';
$string['longtimenosee_help'] = 'Om användare inte har besökt kurssidan inom angiven tid kopplas de automatiskt bort.';
$string['maxenrolled'] = 'Maximalt antal kopplade användare';
$string['maxenrolled_help'] = 'Det maximala antal användare som kan koppla sig själva. Värdet 0 innebär ett obegränsat antal.';
$string['nopassword'] = 'Ingen kursnyckel behövs.';
$string['password'] = 'Kursnyckel';
$string['password_help'] = 'En kursnyckel låter användare som känner till kursnyckeln koppla sig själva till kursen.
Om fältet lämnas blankt kan vilken användare som helst koppla sig själv till kursen. Kursnyckeln behöver bara användas första gången man kopplar sig till kursen.';
$string['passwordinvalidhint'] = 'Den angivna kursnyckeln var felaktig, var vänlig försök igen.<br />
(Här är ett tips - det börjar med \'{$a}\')';
$string['pluginname'] = 'Kursnyckel';
$string['pluginname_desc'] = 'Med en "kursnyckel" kan användare själva koppla sig till kurssidor. Metoden måste ha lagts till den aktuella kursen, vilket görs under "Metoder för att koppla användare".';
$string['requirepassword'] = 'Begär kursnyckel';
$string['role'] = 'Tilldela roll';
$string['self:unenrol'] = 'Koppla bort användare från kursen';
$string['self:unenrolself'] = 'Koppla bort sig själv från kursen';
$string['sendcoursewelcomemessage'] = 'Skicka välkomstmeddelande';
$string['sendcoursewelcomemessage_help'] = 'Om aktiverad får användaren ett välkomstmeddelande via epost då denne kopplar sig till kursen.';
$string['showhint'] = 'Visa ledtråd';
$string['showhint_desc'] = 'Visa första bokstaven i gäst-nyckeln.';
$string['status'] = 'Tillåt kursnyckel som metod för att koppla användare till kurssida.';
$string['status_desc'] = 'Tillåt användande av kursnyckel för deltagare som förinställning.';
$string['status_help'] = 'Denna inställning bestämmer om användare kan koppla sig själva till kursen (och även koppla bort sig själva från kursen, om detta tillåts i annan inställning.)';
$string['unenrol'] = 'Koppla bort deltagare';
$string['unenrolselfconfirm'] = 'Vill du verkligen koppla bort dig från "{$a}"?';
$string['welcometocourse'] = 'Välkommen till {$a}';
$string['welcometocoursetext'] = 'Varmt välkommen till {$a->coursename}!

En av de första sakerna Du bör göra är att ändra Din profilsida
inuti kursen så att vi kan lära oss mer om Dig:

  {$a->profileurl}';
