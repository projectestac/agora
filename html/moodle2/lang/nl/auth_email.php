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
 * Strings for component 'auth_email', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>Met e-mail zelfregistratie kan een gebruiker  zelf zijn account maken op de moodle site: op het moment dat de gebruiker zich aanmeldt en daarbij een nieuwe gebruikersnaam en wachtwoord kiest, wordt er een bevestigingse-mail gestuurd naar het e-mailadres van de gebruiker. In deze e-mail staat een veilige link naar een pagina waar de gebruiker zijn account kan bevestigen. Tijdens alle latere aanmeldingen worden de gebruikersnaam en het wachtwoord alleen maar vergeleken met de bewaarde gebruikersgegevens in de Moodle database.</p>
<p>Merk op: naast het inschakelen van deze plugin, moet e-mailgebaseerde zelfregistratie ook geselecteerd worden in het zelf registratie rolmenu op de \'Beheer authenticatie\'-pagina.</p>';
$string['auth_emailnoemail'] = 'Probeerde je een e-mail te zenden maar het zenden is mislukt!';
$string['auth_emailrecaptcha'] = 'Hiermee voeg je een visueel/auditief bevestigingsformulier toe aan de zelfregistratiepagina voor e-mailgebaseerde authenticatie. Dit beschermt je site tegen spammers. Bovendien help je mee aan de digitalisering van oude manuscripten door het gebruik van reCAPTCHA op je site. Zie http://www.google.com/recaptcha/learnmore voor meer details. <br /><em>PHP cURL extentie is vereist.</em>';
$string['auth_emailrecaptcha_key'] = 'reCAPTCHA-element inschakelen';
$string['auth_emailsettings'] = 'Instellingen';
$string['pluginname'] = 'E-mail zelfregistratie';
