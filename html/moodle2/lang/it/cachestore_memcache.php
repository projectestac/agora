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
 * Strings for component 'cachestore_memcache', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memcache';
$string['prefix'] = 'Prefisso chiave';
$string['prefix_help'] = 'Il prefisso da usare per tutti nomi delle chiavi nel server memcache.
* se il server ospita una singola istanza Moodle, è possibile lasciare il nome al suo default
* a causa di limitazioni sulla lunghezza delle chiavi, il prefisso può essere lungo al massimo 5 caratteri.';
$string['prefixinvalid'] = 'Prefisso non valido. E\' possibile usare solamente a-z A-Z 0-9-_.';
$string['servers'] = 'Server';
$string['servers_help'] = 'Imposta i server usati dall\'adapter memcache.
I server devono essere definiti usando una linea per ciascun server contenente obbligatoriamente l\'indirizzo e opzionalmente la porta ed il peso. In assenza di indicazione sulla porta da usare sarà utilizzata la porta di default (11211).

Esempio:
<pre> server.url.com
ipaddress:porta
nomeserver:porta:peso
</pre>';
$string['sessionhandlerconflict'] = 'Attenzione: l\'istanza memcache ({$a}) è stata configurata per usare lo stesso server memcached usato per le sessioni. Lo svuotamento delle cache provocherà anche l\'eliminazione delle sessioni.';
$string['testservers'] = 'Test server';
$string['testservers_desc'] = 'I server di test vengono utilizzati per gli unit test e per test di prestazioni. La loro impostazione è opzionale. I server devono essere definiti usando una linea per ciascun server contenente obbligatoriamente l\'indirizzo e opzionalmente la porta ed il peso. In assenza di indicazione sulla porta da usare sarà utilizzata la porta di default (11211).';
