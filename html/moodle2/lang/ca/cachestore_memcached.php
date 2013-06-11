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
 * Strings for component 'cachestore_memcached', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Habilita la memòria intermèdia';
$string['bufferwrites_help'] = 'Habilita o deshabilita la memòria intermèdia per entrada/sortida. Habilitar la memòria intermèdia d\'entrada/sortida provoca que les ordres d\'emmagatzematge vagin a la memòria intermèdia en lloc de ser enviades. Qualsevol acció que recuperi les dades fa que les dades de la memòria intermèdia s\'enviïn a la connexió remota. Abandonar la connexió o el tancament de la connexió també farà que les dades emmagatzemades  en la memòria intermèdia siguin enviades a la connexió remota.';
$string['hash'] = 'Mètode resum';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Per defecte (pas a pas)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'Especifica l\'algoritme resum per l\'element de la clau. Cada algoritme resum té avantatges i desavantatges. Utilitzeu el valor per defecte si no esteu segurs o no us importa.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memòria cau';
$string['prefix'] = 'Prefix de la clau';
$string['prefix_help'] = 'Això pot ser usat per crear un «domini» de les seues claus que li permetrà crear diversos magatzems de memòria cau en una sola instal·lació cau. No pot tenir més de 16 caràcters, a fi de garantir que no es tinguem problemes de longitud de clau.';
$string['serialiser_igbinary'] = 'El serializador «igbinary».';
$string['serialiser_json'] = 'El serialitzador JSON';
$string['serialiser_php'] = 'El serialitzador per defecte de PHP';
$string['servers'] = 'Servidors';
$string['servers_help'] = 'Això configura els servidors que han de ser utilitzats per aquest adaptador de memòria cau. Els Servidors s\'han de definir un per línia i es componen d\'una adreça de servidor i, opcionalment, un port i pes. Si no es proporciona cap port s\'utilitza el port per defecte (11211).
Per exemple:
<pre> server.url.com
adreçaIP: port
nom_servidor: port: pes
</pre>';
$string['testservers'] = 'Servidors de prova';
$string['testservers_desc'] = 'Els servidors de prova s\'utilitzen per a les proves unitàries i proves de rendiment. És totalment opcional configurar servidors de prova. Els servidors s\'han de definir un per línia i es componen d\'una adreça de servidor i, opcionalment, un port i pes.
Si no es proporciona cap port s\'utilitza el port per defecte (11211).';
$string['usecompression'] = 'Utilitza compressió';
$string['usecompression_help'] = 'Habilita o deshabilita la compressió de la càrrega útil. Quan està habilitat, els elements de valor de més d\'un cert llindar (actualment 100 bytes) es comprimeixen durant l\'emmagatzematge i es descomprimeix durant la recuperació transparent.';
$string['useserialiser'] = 'Usa serialitzador';
$string['useserialiser_help'] = 'Especifica el serialitzador a usar per serialitzar valors no escalars.
Els serializadores vàlids són Memcached :: SERIALIZER_PHP o Memcached :: SERIALIZER_IGBINARY. Aquest últim només s\'admet quan memcached està configurat amb l\'opció --enable-memcached-igbinary i l\'extensió igbinary és carrega.';
