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
 * Strings for component 'cachestore_memcache', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Prefijo de clave';
$string['prefix_help'] = 'Este prefijo se utiliza para todas las claves en el servidor memcache.
* Si sólo tiene una instancia Moodle usando este servidor, puede dejar el valor por defecto.
* Debido a las restricciones de longitud de clave, sólo se permite un máximo de 5 caracteres.';
$string['servers'] = 'Servidores';
$string['servers_help'] = 'Este ajuste configura los servidores utilizados por el adaptador memcache.
Los servidores deben definirse uno por línea, indicando la dirección de servidor y, opcionalmente, un puerto y peso.
Si no se proporciona ningún puerto se utilizará el puerto predeterminado (11211).

Por ejemplo:
<pre>
server.url.com
IP address:port
nombre_servidor:puerto:peso
</pre>';
$string['testservers'] = 'Servidores de prueba';
$string['testservers_desc'] = 'Los servidores de prueba se utilizan para las pruebas unitarias y las pruebas de rendimiento. Es totalmente opcional utilizar servidores de prueba. Cada servidor se define en una por línea mediante una dirección de servidor y opcionalmente un puerto y su relevancia. Si no se especifica un puerto se usa el puerto por defecto (11211).';
