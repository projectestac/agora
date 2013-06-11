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
 * Strings for component 'auth_email', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = 'La confirmació per correu electrònic és el mètode d\'autenticació per defecte. Quan l\'usuari es registra i tria el seu nom d\'usuari i contrasenya, se li envia un missatge per confirmar les dades. Aquest missatge conté un enllaç segur a una pàgina en la qual l\'usuari pot confirmar el seu compte. En les connexions següents simplement es compara el nom d\'usuari i la contrasenya amb els valors guardats a la base de dades de Moodle.';
$string['auth_emailnoemail'] = 'No ha estat possible enviar-vos un correu electrònic.';
$string['auth_emailrecaptcha'] = 'Afegeix un element de confirmació visual o sonor al formulari de registre, per a usuaris de l\'autoregistre per correu electrònic. Això protegeix el lloc contra la brossa i a més a més contribueix a una bona causa. Vegeu http://www.google.com/recaptcha/learnmore per més detalls. <br /><em>Cal instal·lar l\'extensió de PHP  cURL .</em>';
$string['auth_emailrecaptcha_key'] = 'Habilita element reCAPTCHA';
$string['auth_emailsettings'] = 'Paràmetres';
$string['pluginname'] = 'Autenticació basada en el correu electrònic';
