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
 * Strings for component 'portfolio_picasa', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   portfolio_picasa
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['noauthtoken'] = 'No se ha recibido de google una ficha de autenticación. Por favor, asegúrese de que está permitiendo que moodle acceda a su cuenta en google';
$string['oauthinfo'] = '<p> Para utilizar este plugin, debe registrar su sitio en Google, como se describe en la documentación <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p> Como parte del proceso de registro, tendrá que introducir la siguiente URL como "Authorized Redirect URIs \': </p><p> {$a->callbackurl} </p> Una vez registrado, se le proporcionará un ID de cliente y el secreto que se puede utilizar para configurar los plugins de Google Drive y Picasa. </p>';
$string['pluginname'] = 'Picasa';
$string['sendfailed'] = 'No se ha podido transferir el archivo {$a} a Picasa';
