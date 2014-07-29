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
 * Strings for component 'cachestore_memcached', language 'es', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['hash'] = 'Método hash';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Por defecto (una a la vez)';
$string['hash_help'] = 'Especifica el algoritmo hash utilizado para las claves de los elementos. Cada algoritmo hash tiene sus ventajas y sus desventajas. Utilice el valor por defecto si usted no sabe o no le importa.';
$string['hash_md5'] = 'MD5';
$string['prefix'] = 'Clave de prefijo';
$string['servers'] = 'Servidores';
$string['testservers'] = 'Servidores de prueba';
$string['testservers_desc'] = 'Los servidores de prueba se utilizan para las pruebas unitarias y las pruebas de rendimiento. Es totalmente opcional utilizar servidores de prueba. Cada servidor se define en una por línea mediante una dirección de servidor y opcionalmente un puerto y su relevancia. Si no se especifica un puerto se usa el puerto por defecto (11211).';
$string['usecompression'] = 'Usar compresión';
$string['usecompression_help'] = 'Activa o desactiva la compresión. Cuando está activado, los elementos de más de un cierto umbral (actualmente 100 bytes) se comprimen durante el almacenamiento y se descomprime durante la recuperación de forma transparente.';
