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
 * Strings for component 'portfolio_googledocs', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID del client';
$string['noauthtoken'] = 'No s\'ha rebut el testimoni d\'autenticació de google. Assegureu-vos que esteu permetent a Moodle accedir al vostre compte de Google.';
$string['nooauthcredentials'] = 'Es requereixen credencials OAuth';
$string['nooauthcredentials_help'] = 'Per utilitzar el connector de portafolis de Google Docs heu de configurar les credencials OAuth en la configuració del portafolis.';
$string['nosessiontoken'] = 'No és possible l\'exportació a Google perquè no existieix el testimoni de sessió.';
$string['oauth2upgrade_message_content'] = 'Com a part de l\'actualització a Moodle 2.3, el connector de portafolis de Google s\'ha desactivat. Per tornar a activar-lo, el vostre lloc Moodle ha d\'estar registrat amb Google, tal i com es descriu en la documentació {$a->docsurl}, per tal d\'obtenir un ID de client secret. L\'ID de client secret podrà utilitzar-se llavors per configurar tots els connectors Google Docs i Picasa.';
$string['oauth2upgrade_message_small'] = 'S\'ha deshabilitat aquest connector, tal i com es requereix en la documentació de la configuració de Google OAuth 2.0';
$string['oauth2upgrade_message_subject'] = 'Informació important quant al connector de portafolis de Google Docs';
$string['oauthinfo'] = '<p> Per utilitzar aquest connector, heu de registrar el vostre lloc amb Google, com es descriu en la documentació de la <a href="{$a->docsurl}">configuració de Google OAuth 2.0</a>. </p><p> Com a part del procés de registre, haureu d\'introduir el següent URL com a \'Redirecció URL autoritzada\': </p><p> {$a->callbackurl} </p> Un cop registrat, se us proporcionarà un ID de client secret que podeu utilitzar per configurar tots els connectors Google Docs i Picasa. </p>';
$string['pluginname'] = 'Google Docs';
$string['secret'] = 'Secret';
$string['sendfailed'] = 'La transferència del fitxer {$a} a Google ha fallat';
