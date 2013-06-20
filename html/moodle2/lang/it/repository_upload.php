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
 * Strings for component 'repository_upload', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   repository_upload
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configplugin'] = 'Configurazione plugin File upload';
$string['pluginname'] = 'File upload';
$string['pluginname_help'] = 'Carica un file su Moodle';
$string['upload_error_cant_write'] = 'Non è stato possibile scrivere il file sul disco.';
$string['upload_error_extension'] = 'Una estensione PHP ha bloccato il caricamento del file.';
$string['upload_error_form_size'] = 'Il file caricato è più grande di quanto consentito dalla direttiva max_file_size presente nel file php.ini';
$string['upload_error_ini_size'] = 'Il file caricato è più grande di quanto consentito dalla direttiva upload_max_filesize presente nel file php.ini';
$string['upload_error_invalid_file'] = 'Il file \'{$a}\' è vuoto oppure è una cartella. Per caricare le cartelle, è necessario comprimerle in formato zip.';
$string['upload_error_no_file'] = 'Nessun file è stato caricato.';
$string['upload_error_no_tmp_dir'] = 'Manca una cartella temporanea per il PHP';
$string['upload_error_partial'] = 'Il file è stato caricato parzialmente.';
$string['upload:view'] = 'Usare Upload file nel file picker';
