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
 * Strings for component 'cachestore_file', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   cachestore_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autocreate'] = 'Auto-création de dossiers';
$string['autocreate_help'] = 'Si ce réglage est activé, le dossier indiqué dans le chemin sera automatiquement créé s\'il n\'existe pas encore.';
$string['path'] = 'Chemin d\'accès du cache';
$string['path_help'] = 'Ce dossier doit sera utilisé pour stocker les fichiers de ce dépôt de cache. Si le champ n\'est pas renseigné (défaut), un dossier sera créé automatiquement dans le dossier moodledata. Ce réglage peut être utilisé pour enregistrer le cache sur un support disposant de performances adéquates (par exemple en mémoire vive).';
$string['pluginname'] = 'Cache de fichiers';
$string['prescan'] = 'Pré-scanner le dossier';
$string['prescan_help'] = 'Si ce réglage est activé, le dossier est scanné lors de la première utilisation du cache et les requêtes de fichiers sont d\'abord comparées aux données scannées. Ce comportement peut être utile si votre système de fichiers est lent et que vous constatez que les opérations sur les fichiers ralentissent votre système.';
$string['singledirectory'] = 'Dépôt dossier unique';
$string['singledirectory_help'] = 'Si ce réglage est activé, les fichiers (éléments mis en cache) seront stockés dans un dossier unique, plutôt que d\'être répartis dans plusieurs dossiers.<br />
L\'activation rendra plus rapide l\'interaction avec les fichiers, mais au risque d\'arriver aux limites du système.<br />
Il n\'est conseillé de n\'activer ce réglage que si les conditions suivantes sont remplies :<br />

* vous savez que le nombre d\'éléments en cache sera suffisamment petit pour ne pas causer des problèmes sur le système de fichiers utilisés ;<br />
* les données à mettre en cache ne sont pas trop lourdes à générer.';
