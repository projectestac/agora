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
 * Strings for component 'cachestore_memcache', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_memcache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Memòria cau';
$string['prefix'] = 'Prefix de la clau';
$string['prefix_help'] = 'Aquest prefix s\'utilitza per a tots els noms claus al servidor de memòria cau.
* Si només teniu una instància Moodle fent servir aquest servidor, podeu deixar aquest valor per defecte. * A causa de les restriccions de longitud de clau, només es permet un màxim de 5 caràcters.';
$string['prefixinvalid'] = 'Prefix invàlid. Sols podeu utilitzar a-z A-Z 0-9-_.';
$string['servers'] = 'Servidors';
$string['servers_help'] = 'Això configura els servidors que han de ser utilitzats per aquest adaptador de memòria cau. Els servidors s\'han de definir un per línia i consisteixen d\'una adreça de servidor i, opcionalment, un port i el pes. Si no es proporciona cap port s\'utilitza el port per defecte (11211).
Per exemple:
<pre>
servidor.url.com
adreçaip: port
nomservidor:port:pes </pre>';
$string['testservers'] = 'Servidor de prova';
$string['testservers_desc'] = 'Els servidors de prova s\'utilitzen per a les proves unitàries i proves de rendiment. És totalment opcional configurar servidors de prova. Els servidors s\'han de definir un per línia i es componen d\'una adreça de servidor i, opcionalment, un port i el pes. Si no es proporciona cap port s\'utilitza el port per defecte (11211).';
