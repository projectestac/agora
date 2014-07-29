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
 * Strings for component 'repository_googledocs', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID de cliente';
$string['configplugin'] = 'Configurar o engadido Google Drive';
$string['googledocs:view'] = 'Ver o repositorio Google Drive';
$string['oauth2upgrade_message_content'] = 'Como parte da actualización a Moodle 2.3, desactivouse o engadido de cartafol Google Docs. Para reactivalo, o seu Moodle necesita rexistrarse con Google, como se describe na documentación {$a->docsurl}, para obter un ID cliente e secreto. O ID cliente e secreto pode despois usarse para configurar todos os engadidos Google Docs e Picasa.';
$string['oauth2upgrade_message_small'] = 'Este engadido desactivouse, xa que require unha configuración como a que se describe na documentación de configuración Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Información importante relativa ao engadido de repositorio Google Docs.';
$string['oauthinfo'] = '<p> Para usar este engadido, ten que rexistrar o seu sitio en Google, como se describe na documentación de configuración do <a href="{$a->docsurl}">Google OAuth 2.0</a> . </p><p> Como parte do proceso de rexistro, ten que introducir o seguinte enderezo URL como «redirección URI autorizada»: </p><p> {$a->callbackurl} </p> Unha vez rexistrado, ofreceráselle un ID cliente e secreto que pode utilizar para configurar todos os engadidos Google Drive e Picasa. </p><p> Teña en conta que terá que activar o servizo «Drive API». </p>';
$string['pluginname'] = 'Google Drive';
$string['secret'] = 'Secreto';
$string['servicenotenabled'] = 'O acceso non está configurado. Asegúrese de que o servizo «Drive API» está activo.';
