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
 * Strings for component 'cachestore_file', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Crea cartella automaticamente';
$string['autocreate_help'] = 'Consente di creare automaticamente la cartella specificata qualora non sia già esistente.';
$string['path'] = 'Percorso cache';
$string['path_help'] = 'La cartella da usare per memorizzare i file di questo cache store. Lasciando il campo vuoto, una cartella verrà creata automaticamente all\'interno della cartella moodledata. Questa cartella potrà essere usata per puntare ad un file sore posizionata su un disco veloce, come ad esempio un disco in memoria.';
$string['pluginname'] = 'File cache';
$string['prescan'] = 'Prescansione della cartella';
$string['prescan_help'] = 'Consente di eseguire una scansione della cartella al primo utilizzo della cache in modo da usare i risultati della scansione per soddisfare le richieste di file già presenti in cache. Può essere di aiuto in presenza di file system lenti e che possano rappresentare un collo di bottiglia.';
$string['singledirectory'] = 'Cartella unica per lo store';
$string['singledirectory_help'] = 'I file presenti nella cache saranno immagazzinati in una cartella unica, senza suddividerli in diverse sotto cartelle.<br />
L\'aumento di velocità ottenibile è però limitato dal rischio di raggiungere i limiti del file system.<br />
Si consiglia di attivare l\'impostazione solo nei seguenti casi:<br />
- è certo che il numero di elementi in cache sarà sufficientemente piccolo da non raggiungere i limiti del file system in uso
- i dati da inserire nella cache non richiedono troppe risorse per essere generati, nel qual caso per evitare problemi è preferibile lasciare l\'impostazione al suo default.';
