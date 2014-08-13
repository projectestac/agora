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
 * Strings for component 'tool_langimport', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = 'Instalar paquete de idioma seleccionado';
$string['installedlangs'] = 'Paquetes de idioma instalados';
$string['langimport'] = 'Utilidad de importación de idioma';
$string['langimportdisabled'] = 'Se ha deshabilitado la opción de importación de idioma. Deberá actualizar sus paquetes de idioma manualmente en el nivel de sistema de archivos. No olvide purgar las cachés de cadenas una vez lo haga.';
$string['langpackinstalled'] = 'El paquete de idioma "{$a}" se ha instalado con éxito';
$string['langpackremoved'] = 'Desinstalación de paquete de idioma completada';
$string['langpackupdateskipped'] = 'Se ha pasado por alto la actualización del paquete de idioma "{$a}"';
$string['langpackuptodate'] = 'El paquete de idioma {$a} está al día';
$string['langupdatecomplete'] = 'Se ha completado la actualización del paquete de idioma';
$string['missingcfglangotherroot'] = 'Falta el valor de configuración $CFG->langotherroot';
$string['missinglangparent'] = 'Falta idioma padre <em>{$a->parent}</em> of <em>{$a->lang}</em>.';
$string['nolangupdateneeded'] = 'Todos los paquetes de idioma están al día: no se necesita actualizarlos';
$string['pluginname'] = 'Paquetes de idioma';
$string['purgestringcaches'] = 'Purgar cachés de cadenas';
$string['remotelangnotavailable'] = 'Debido a que Moodle no puede conectarse a download.moodle.org, no podemos instalar el paquete de idioma automáticamente. Por favor, descargue los archivos apropiados de http://download.moodle.org, cópielos a su directorio {$a} y descomprímalos manualmente.';
$string['uninstall'] = 'Desinstalar el paquete de idioma seleccionado';
$string['uninstallconfirm'] = 'Está a punto de desinstalar el paquete de idioma "{$a}"; ¿está usted seguro?';
$string['updatelangs'] = 'Actualizar todos los paquetes locales de idioma';
