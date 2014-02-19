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

$string['cohortnonmemberinfo'] = 'Endast medlemmar av kohort {$a} kan självregistrera';
$string['cohortonly'] = 'Endast kohortmedlemmarna';
$string['cohortonly_help'] = 'Självregistrering kan begränsas till medlemmar av en viss kohort. Observera att om du ändrar den här inställningen har detta ingen effekt på befintliga registreringar.';
$string['customwelcomemessage'] = 'Välkomstmeddelande';
$string['defaultrole'] = 'Förinställd roll för användare';
$string['defaultrole_desc'] = 'Bestäm vilken roll användare som anger kursnyckeln ska få i kursen.';
$string['editenrolment'] = 'Ändra inställningar';
$string['enrolenddate'] = 'Slutdatum';
$string['enrolenddate_help'] = 'Om aktiverat, kan användare inte registrera sig på kursen med kursnyckeln efter det angivna datumet.';
$string['enrolenddaterror'] = 'Datum för registrering kan inte vara senare än startdatumet.';
$string['enrolme'] = 'Registrera mig';
$string['enrolperiod'] = 'Varaktighet för registreringen';
$string['enrolperiod_desc'] = 'Standard tidslängd som registreringen är giltig (i sekunder). Om satt till noll, kommer registreringens varaktighet att vara obegränsad som standard.';
$string['enrolstartdate'] = 'Startdatum';
$string['enrolstartdate_help'] = 'Om aktiverat, kan användare registrera sig på kursen med kursnyckeln från och med det angivna datumet.';
$string['groupkey'] = 'Använd grupp-kursnycklar.';
$string['groupkey_desc'] = 'Använd grupp-kursnycklar som förinställning.';
$string['longtimenosee'] = 'Avregistrera inaktiva användare efter';
$string['longtimenosee_help'] = 'Om användare inte har besökt kurssidan inom angiven tid avregistreras de automatiskt.';
$string['maxenrolled'] = 'Maximalt antal registrerade användare';
$string['maxenrolled_help'] = 'Det maximala antal användare som kan registrera sig själva. Värdet 0 innebär ett obegränsat antal.';
$string['nopassword'] = 'Ingen kursnyckel behövs.';
$string['password'] = 'Kursnyckel';
$string['password_help'] = 'Med en kursnyckel begränsas tillgången till en kurs till endast de som känner till nyckeln.

Om fältet lämnas tomt, kan alla användare registrera sig på kursen.

Om en kursnyckel anges, kommer alla användare som försöker registrera sig på kursen att bli uppmanade att använda nyckeln. Observera att en användare endast behöver använda kursnyckel en gång, när de registrerar på kursen.';
$string['passwordinvalid'] = 'Felaktig kursnyckel, vänligen försök igen';
$string['passwordinvalidhint'] = 'Den angivna kursnyckeln var felaktig, var vänlig försök igen.<br />
(Här är ett tips - det börjar med \'{$a}\')';
$string['pluginname'] = 'Självregistrering';
$string['pluginname_desc'] = 'Med en "kursnyckel" kan användare själva registrera sig till kurser. Metoden måste ha lagts till den aktuella kursen, detta görs under "Metoder för registrering".';
$string['requirepassword'] = 'Begär kursnyckel';
$string['requirepassword_desc'] = 'Kräv kursnyckel i nya kurser och förhindra avlägsnande av kursnyckel från befintliga kurser.';
$string['role'] = 'Tilldelad roll';
$string['self:config'] = 'Konfigurera självregistrerings instanser';
$string['self:manage'] = 'Hantera registrerade användare';
$string['self:unenrol'] = 'Avregistrera användare från kursen';
$string['self:unenrolself'] = 'Avregistrera dig sig själv från kursen';
$string['sendcoursewelcomemessage'] = 'Skicka välkomstmeddelande';
$string['sendcoursewelcomemessage_help'] = 'Om aktiverad får användaren ett välkomstmeddelande via epost då denne registrerar sig på kursen.';
$string['showhint'] = 'Visa ledtråd';
$string['showhint_desc'] = 'Visa första bokstaven i gäst-nyckeln.';
$string['status'] = 'Tillåt självregistreringar';
$string['status_desc'] = 'Tillåt användande av kursnyckel för deltagare som förinställning.';
$string['status_help'] = 'Denna inställning bestämmer om användare kan självregistrera till kursen (och även avregistrera sig själv från kursen, om detta tillåts i annan inställning.)';
$string['unenrol'] = 'Avregistrera deltagare';
$string['unenrolselfconfirm'] = 'Vill du verkligen avregistrera dig från "{$a}"?';
$string['unenroluser'] = 'Vill du verkligen avregistrera "{$a->user}" från kursen "{$a->course}"?';
$string['welcometocourse'] = 'Välkommen till {$a}';
$string['welcometocoursetext'] = 'Varmt välkommen till {$a->coursename}!

En av de första sakerna Du bör göra är att ändra Din profilsida inuti kursen så att vi kan lära oss mer om Dig:

  {$a->profileurl}';
