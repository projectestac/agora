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
 * Strings for component 'tool_dbtransfer', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clidriverlist'] = 'Pilotes de base de données disponibles pour la migration';
$string['cliheading'] = 'Migration de la base de données. Assurez-vous que personne n\'accède au serveur durant la migration !';
$string['climigrationnotice'] = 'Migration de la base de données en cours. Veuillez attendre la fin de la migration et la mise à jour de la configuration et la suppression du fichier $CFG->dataroot/climaintenance.html par l\'administrateur du serveur.';
$string['convertinglogdisplay'] = 'Conversion des historiques d\'affichage d\'actions';
$string['dbexport'] = 'Exportation de base de données';
$string['dbtransfer'] = 'Migration de base de données';
$string['enablemaintenance'] = 'Activer le mode de maintenance';
$string['enablemaintenance_help'] = 'Cette option permet d\'activer le mode de maintenance durant et après la migration de la base de données, empêchant ainsi l\'accès de tous les utilisateurs jusqu\'à la fin de la migration. Pour revenir au fonctionnement normal l\'administrateur devra supprimer manuellement le fichier $CFG->dataroot/climaintenance.html après avoir mis à jour les réglages du fichier config.php.';
$string['exportdata'] = 'Exporter les données';
$string['notargetconectexception'] = 'Impossible de se connecter à la base de données cible.';
$string['options'] = 'Options';
$string['pluginname'] = 'Exportation base de données';
$string['targetdatabase'] = 'Base de données cible';
$string['targetdatabasenotempty'] = 'La base de données cible ne doit contenir aucune table avec le préfixe indiqué !';
$string['transferdata'] = 'Transférer les données';
$string['transferdbintro'] = 'Ce script permet de transférer la totalité du contenu de cette base de données vers un autre serveur de base de données. Il est souvent utilisé pour changer de type de base de données.';
$string['transferdbtoserver'] = 'Transférer cette base de données Moodle vers un autre serveur';
$string['transferringdbto'] = 'Transfert de cette base de données {$a->dbtypefrom} vers la base de données {$a->dbname}, de type {$a->dbtype}, sur {$a->dbhost}';
