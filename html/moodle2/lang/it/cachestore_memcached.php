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
 * Strings for component 'cachestore_memcached', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Buffer write';
$string['bufferwrites_help'] = 'Abilita o disabilita il buffered I/O. I comandi I/O di memorizzazione saranno inseriti in un buffer invece di essere inviati. Qualsiasi azione di recupero dati provocherà l\'invio del buffer verso la connessione remota. L\'invio dei dati nel buffer verso la connessione remota sarà causato anche dalla interruzione o chiusura della connessione.';
$string['hash'] = 'Metodo di hash';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Default (one-at-a-time)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'L\'algoritmo di hashing da utilizzare per gli elementi chiave. Ciascun algoritmo di hasing ha i pregi e difetti, se non li conoscete o non vi interessa, è possibile lasciare i valori al loro default.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Prefisso chiave';
$string['prefix_help'] = 'Consente la creazione di un "dominio" per gli elementi di una chiave, consentendo di avere store memcached multipli in un\'unica  installazione memcached. Il prefisso non deve superare i 16 caratteri per evitare problemi di lunghezza della chiave.';
$string['prefixinvalid'] = 'Prefisso non valido. E\' possibile usare solamente i caratteri a-z A-Z 0-9-_.';
$string['serialiser_igbinary'] = 'Il serializzatore igbinary.';
$string['serialiser_json'] = 'Il serializzatore JSON.';
$string['serialiser_php'] = 'Il serializzatore PHP di default.';
$string['servers'] = 'Server';
$string['servers_help'] = 'Imposta i server usati dall\'adapter memcached.
I server devono essere definiti usando una linea per ciascun server contenente obbligatoriamente l\'indirizzo e opzionalmente la porta ed il peso. In assenza di indicazione sulla porta da usare sarà utilizzata la porta di default (11211).

Esempio:
<pre> server.url.com
ipaddress:porta
nomeserver:porta:peso
</pre>';
$string['testservers'] = 'Test server';
$string['testservers_desc'] = 'I server di test vengono utilizzati per gli unit test e per test di prestazioni. La loro impostazione è opzionale. I server devono essere definiti usando una linea per ciascun server contenente obbligatoriamente l\'indirizzo e opzionalmente la porta ed il peso. In assenza di indicazione sulla porta da usare sarà utilizzata la porta di default (11211).';
$string['usecompression'] = 'Usa compressione';
$string['usecompression_help'] = 'Abilita o disabilita la compressione del payload. L\'impostazione consente di comprimere  in fase di memorizzazione gli elementi più grandi di una data soglia  (al momento 100 byte), decomprimendoli poi in modo trasparente durante il recupero.';
$string['useserialiser'] = 'Usa serializzatore';
$string['useserialiser_help'] = 'Il serializzatore da usare per serializzare valori non scalari. Serializzatori validi sono Memcached::SERIALIZER_PHP oppure Memcached::SERIALIZER_IGBINARY. Quest\'ultimo è supportato solo se memcached è stato configurato con l\'opzione --enable-memcached-igbinary ed è stata caricata l\'estensione igbinary.';
