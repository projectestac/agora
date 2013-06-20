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
 * Strings for component 'auth_email', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = '<p>O autorexistro baseado no correo permítelle ao usuario crear a súa propia conta a través do botón «Crear unha nova conta» na páxina de acceso. A seguir, o usuario recibe un correo cunha ligazón segura a unha páxina na que pode confirmar a súa conta. Os futuros accesos comprobarán o nome de usuario e o contrasinal contra os valores almacenados na base de datos de Moodle.</p><p>Nota: ademais de activar o engadido de autorexistro baseado no correo debe seleccionalo desde o menú despregábel autorexistro de  «Administrar a autenticación»';
$string['auth_emailnoemail'] = 'Tentouse enviar un correo mais non foi posíbel.';
$string['auth_emailrecaptcha'] = 'Engade un formulario de confirmación visual ou auditiva a páxina de acceso para os usuarios autorexistrados a través do corre. Esta opción protexe o seu sitio contra os creadores de correo lixo e colabora cunha boa causa. Vexa http://www.google.com/recaptcha/learnmore para obter máis detalles. <br /><em>Require ter instalada a extensión cURL de PHP.</em>';
$string['auth_emailrecaptcha_key'] = 'Activar o elemento reCAPTCHA';
$string['auth_emailsettings'] = 'Axustes';
$string['pluginname'] = 'Autorexistro baseado no correo';
