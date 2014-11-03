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
 * Strings for component 'cache_file', language 'it', branch 'MOODLE_25_STABLE'
 *
 * @package   cache_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Crea cartella automaticamente';
$string['autocreate_help'] = 'Consente di creare automaticamente la cartella nel caso non esista già';
$string['path'] = 'Percorso cache';
$string['path_help'] = 'La cartella da usare per memorizzare i file di questo cache store. Lasciando il nome vuoto (default) verrà creata automaticamente una cartella all\'interno della cartella moodledata. E\' possibile usare questo percorso per un file store presente in una cartella o in un disco ad alte prestazione (ad esempio un disco in memoria)';
$string['pluginname'] = 'File cache';
$string['prescan'] = 'Prescansione della cartella';
$string['prescan_help'] = 'Consente di eseguire una scansione della cartella al primo utilizzo della cache in modo da usare i risultati della scansione per soddisfare le richieste di file già presenti in cache. Può essere di aiuto in presenza di file system lenti e che possano rappresentare un collo di bottiglia.';
