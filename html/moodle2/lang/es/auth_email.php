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
 * Strings for component 'auth_email', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_email
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_emaildescription'] = 'La confirmación por correo alectrónico es el método de identificación predeterminado. Cuando el usuario se inscribe, escogiendo su propio nombre de usuario y contraseña, se envía un email de confirmación a su dirección de correo electrónico. Este email contiene un enlace seguro a una página donde el usuario puede confirmar su cuenta. Las futuras entradas comprueban el nombre de usuario y contraseña contra los valores guardados en la base de datos de Moodle.';
$string['auth_emailnoemail'] = 'Se ha intentado enviarle un email sin éxito.';
$string['auth_emailrecaptcha'] = 'Agrega un formulacio de confirmación visual o auditiva a la página de acceso para los usuarios auto-registrados vía email. Esta opción protege su sitio contra los creadores de spam y contribuye a una buena causa. Para más detalles, visite http://recaptcha.net/learnmore.html for more details. <br /><em>Se requiere tener instalada la extensión de PHP cURL.</em>';
$string['auth_emailrecaptcha_key'] = 'Habilitar elemento reCAPTCHA';
$string['auth_emailsettings'] = 'Ajustes';
$string['pluginname'] = 'Identificación basada en Email';
