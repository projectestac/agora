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
 * Strings for component 'cachestore_memcached', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcached
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bufferwrites'] = 'Écritures du tampon';
$string['bufferwrites_help'] = 'Active ou désactive les entrées/sorties en tampon. L\'activation a pour résultat que les commandes de stockage sont mise en tampon au lieu d\'être envoyées. Toute action qui récupère des données a pour effet d\'envoyer ce tampon à la connexion distante. La coupure de la connexion causera également l\'envoi du tampon au serveur distant.';
$string['hash'] = 'Méthode de hachage';
$string['hash_crc'] = 'CRC';
$string['hash_default'] = 'Par défaut (un à la fois)';
$string['hash_fnv1_32'] = 'FNV1_32';
$string['hash_fnv1_64'] = 'FNV1_64';
$string['hash_fnv1a_32'] = 'FNV1A_32';
$string['hash_fnv1a_64'] = 'FNV1A_64';
$string['hash_help'] = 'Spécifie l\'algorithme de hachage utilisé pour les clefs. Chaque algorithme a ses forces et ses faiblesses. Si vous ne savez pas lequel choisir, utilisez le réglage par défaut.';
$string['hash_hsieh'] = 'Hsieh';
$string['hash_md5'] = 'MD5';
$string['hash_murmur'] = 'Murmur';
$string['pluginname'] = 'Memcached';
$string['prefix'] = 'Préfixe de clef';
$string['prefix_help'] = 'Ce réglage peut être utilisé pour créer un « domaine » pour vos clefs, permettant de disposer de plusieurs dépôts memcached sur une unique installation memcached. La chaîne indiquée ne doit pas dépasser 16 caractères.';
$string['prefixinvalid'] = 'Préfixe non valide. Vous ne pouvez utiliser que les caractères a-z A-Z 0-9-_.';
$string['serialiser_igbinary'] = 'Le serialiseur igbinary';
$string['serialiser_json'] = 'Le serialiseur JSON';
$string['serialiser_php'] = 'Le serialiseur par défaut PHP';
$string['servers'] = 'Serveurs';
$string['servers_help'] = 'Ce réglage permet de spécifier les serveurs devant être utilisés par cet adaptateur memcached.
Les adresses des serveurs doivent être indiquées un par ligne, avec optionnellement un port et une pondération.
Si le port n\'est pas indiqué, le port par défaut (11211) sera utilisé.

Exemple :
<pre>
url.serveur.fr
adresse_ip:port
nom_serveur:port:pondération
</pre>';
$string['testservers'] = 'Serveurs de test';
$string['testservers_desc'] = 'Les serveurs de test sont utilisés pour des tests unitaires et des tests de performance. Les serveurs doivent être indiqués un par ligne et consistent de l\'adresse du serveur et optionnellement d\'un port et d\'une pondération.
Si aucun port n\'est indiqué, le port par défaut (11211) est utilisé.';
$string['usecompression'] = 'Utiliser la compression';
$string['usecompression_help'] = 'Active ou désactive la compression des données envoyées. Une fois ce réglage activé, les valeurs plus grandes qu\'un certain seuil (actuellement 100 octets) sont compressées de façon transparente durant le stockage et décompressées lors de l\'utilisation.';
$string['useserialiser'] = 'Utiliser le sérialiseur';
$string['useserialiser_help'] = 'Spécifie le sérialiseur à utiliser pour les valeurs non scalaires. Les valeurs valides sont Memcached::SERIALIZER_PHP et Memcached::SERIALIZER_IGBINARY.
Cette dernière n\'est supportée que si memcached est configuré avec l\'option --enable-memcached-igbinary et si l\'extension igbinary est chargée.';
