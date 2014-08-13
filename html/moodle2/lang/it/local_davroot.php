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
 * Strings for component 'local_davroot', language 'it', branch 'MOODLE_25_STABLE'
 *
 * @package   local_davroot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowconns'] = 'Consente di connettersi';
$string['allowconnsdescr'] = 'Consente agli utenti autorizzati ad accedere ai file in Moodle attraverso WebDAV';
$string['davroot:canconnect'] = 'Consente all\'utente di collegarsi al server WebDAV che espone i file in Moodle';
$string['lockmanager'] = 'Gestore dei lock';
$string['lockmanagerdescr'] = 'Consente la gestione centralizzata dei lock in {$a->lockmngrfolder}';
$string['pluginbrowser'] = 'Plugin browser';
$string['pluginbrowserdescr'] = 'Produce indici simili a quelli di Apache per il File System virtuale di Moodle';
$string['pluginmount'] = 'Plugin DavMount';
$string['pluginmountdescr'] = 'Aggiunge il supporto per l\'RFC 4709. Questa specifica permette di trasformare l\'accesso alle risorse tramite browser in un accesso remoto con capacità di modifica delle stesse, attraverso l\'uso di particolari link. Esempio: http://hostname/percorso/risorsa?mount';
$string['pluginname'] = 'DAVRoot';
$string['pluginnamedescr'] = 'Espone i file in Moodle attraverso WebDAV';
$string['plugintempfilefilter'] = 'Plugin Temporary File Filter';
$string['plugintempfilefilterdescr'] = 'Intercetta i più comuni file temporanei conosciuti, creati dal sistema operativo e dagli applicativi, e li posiziona nella cartella temporanea {$a->tmpfilefilterfolder}';
$string['readonly'] = 'Accesso in sola lettura';
$string['readonlydescr'] = 'Consenti esclusivamente un accesso DAV in sola lettura (la modalità più sicura)';
$string['slashrep'] = '[barra]';
$string['urlrewrite'] = 'Abilita l\'URL rewrite';
$string['urlrewritedescr'] = 'Permette alle URL DAV di essere scritte senza la pagina PHP finale: {$a->wwwpath}';
$string['vhostenabled'] = 'Abilita il Virtual Host';
$string['vhostenableddescr'] = 'Permette a WebDAV di essere esposto alla radice di un Virtual Host opportunamente configurato per mappare {$a->dirpath}';
$string['warnmdl35990'] = '<span style="color: red;"><a href="http://tracker.moodle.org/browse/MDL-35990" target="_blank">MDL-35990</a> impedisce a DAVRoot di funzionare con la configurazione Virtual Host</span>';
$string['warnmdl35990descr'] = '<span style="color: red;">Sono possibili errori di tipo HTTP Status 500 fino a quando non avrai rimosso la riga "<span style="font-family: courier new, courier, monospace; color: black;">require_once(dirname(dirname(__FILE__)) . \'/config.php\');</span>" dal file <span style="font-family: courier new, courier, monospace; color: black;">{$a->filepath}</span></span>';
