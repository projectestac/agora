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
 * Strings for component 'cachestore_memcache', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Préfixe de clef';
$string['prefix_help'] = 'Ce préfixe est utilisé pour tous les noms de clef sur le serveur memcache.
* Si vous n\'avez qu\'une instance de Moodle qui tourne sur ce serveur, vous pouvez laisser la valeur par défaut.
* Un maximum de 5 caractères est autorisé.';
$string['prefixinvalid'] = 'Préfixe non valide. Vous ne pouvez utiliser que les caractères a-z A-Z 0-9-_.';
$string['servers'] = 'Serveurs';
$string['servers_help'] = 'Ce réglage permet de spécifier les serveurs devant être utilisés par cet adaptateur memcache.
Les adresses des serveurs doivent être indiquées un par ligne, avec optionnellement un port et une pondération.
Si le port n\'est pas indiqué, le port par défaut (11211) sera utilisé.

Exemple :
<pre>
url.serveur.fr
adresse_ip:port
nom_serveur:port:pondération
</pre>';
$string['sessionhandlerconflict'] = 'Attention ! Une instance de memcache ({$a}) a été configurée de sorte à utiliser le même serveur memcache pour les sessions. La suppression de tous les caches aura pour conséquence que les sessions seront également effacées.';
$string['testservers'] = 'Serveurs de test';
$string['testservers_desc'] = 'Les serveurs de test sont utilisés pour des tests unitaires et des tests de performance. Les serveurs doivent être indiqués un par ligne et consistent de l\'adresse du serveur et optionnellement d\'un port et d\'une pondération.
Si aucun port n\'est indiqué, le port par défaut (11211) est utilisé.';
