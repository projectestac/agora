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
 * Strings for component 'dbtransfer', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Vérification de la structure de la table source';
$string['copyingtable'] = 'Copie de la table {$a}';
$string['copyingtables'] = 'Copie du contenu de la table';
$string['creatingtargettables'] = 'Création des tables dans la base de données cible';
$string['dbexport'] = 'Exportation base de données';
$string['dbtransfer'] = 'Transfert de base de données';
$string['differenttableexception'] = 'La structure de la table {$a} ne correspond pas.';
$string['done'] = 'Terminé';
$string['exportschemaexception'] = 'La structure de la base de données actuelle ne correspond pas à tous les fichiers install.xml.<br /> {$a}';
$string['importschemaexception'] = 'La structure de la base de données actuelle ne correspond pas à tous les fichiers install.xml.<br /> {$a}';
$string['importversionmismatchexception'] = 'La version actuelle {$a->currentver} ne correspond pas à la version exportée {$a->schemaver}.';
$string['malformedxmlexception'] = 'Fichier XML mal formé. Impossible de continuer.';
$string['unknowntableexception'] = 'Table {$a} inconnue détectée dans le fichier exporté.';
