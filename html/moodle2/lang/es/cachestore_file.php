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
 * Strings for component 'cachestore_file', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Crear directorio automáticamente';
$string['autocreate_help'] = 'Si está habilitado el directorio especificado en la ruta se creará automáticamente, si no existe.';
$string['path'] = 'Ruta del caché';
$string['path_help'] = 'Directorio que se usará para almacenar la caché de archivos de este almacén. Si se deja en blanco (por defecto) el directorio se creará automáticamente en moodledata. Este ajuste puede ser usado para apuntando un almacén de archivos hacia un directorio concreto, mejorando el rendimiento (tal como uno en la memoria).';
$string['pluginname'] = 'Caché de archivos';
$string['prescan'] = 'Pre-escanear directorio';
$string['prescan_help'] = 'Si está habilitado el directorio se escanea cuando se utiliza la memoria caché por vez primera y las solicitudes de archivos se comparan con los datos de la exploración. Este ajuste puede ayudar si se tiene un sistema de archivos lento y las operaciones de archivo están causando un cuello de botella.';
$string['singledirectory'] = 'Almacén de archivo único';
$string['singledirectory_help'] = 'Si se habilita, los archivos (elementos almacenados en caché) se almacenarán en un único directorio en lugar de estar divididos entre varios.
La activación de este ajuste acelerará los procesos de archivado, a costa de sobrecargar el sistema de archivos.
Sólo se recomienda activar esta opción si se cumple lo siguiente:
- Si sabe que el número de elementos de la caché va a ser lo suficientemente pequeño que no va a causar problemas en el sistema de archivos.
- Los datos que se almacenan en caché no requieren grandes recursos para generarse. De ser así, los ajustes por defecto pueden ser la mejor opción, ya que reduce la posibilidad de problemas.';
