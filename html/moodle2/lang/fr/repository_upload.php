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
 * Strings for component 'repository_upload', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_upload
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['configplugin'] = 'Configuration déposer des fichiers';
$string['pluginname'] = 'Déposer un fichier';
$string['pluginname_help'] = 'Déposer un fichier dans Moodle';
$string['upload_error_cant_write'] = 'Échec de l\'écriture du fichier sur le disque.';
$string['upload_error_extension'] = 'Une extension PHP a stoppé le dépôt du fichier.';
$string['upload_error_form_size'] = 'Le fichier déposé dépasse la taille spécifiée par la directive max_file_size spécifiée dans le formulaire HTML.';
$string['upload_error_ini_size'] = 'Le fichier déposé dépasse la taille spécifiée par la directive upload_max_filesize spécifiée dans le fichier php.ini.';
$string['upload_error_invalid_file'] = 'Le fichier « {$a} » est vide ou est un dossier. Pour déposer des dossiers, veuillez d\'abord les compresser (ZIP).';
$string['upload_error_no_file'] = 'Aucun fichier n\'a été déposé.';
$string['upload_error_no_tmp_dir'] = 'PHP ne dispose pas d\'un dossier temporaire.';
$string['upload_error_partial'] = 'Le fichier n\'a été que partiellement déposé.';
$string['upload:view'] = 'Déposer des fichiers à l\'aide du sélecteur de fichiers';
