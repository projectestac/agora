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
 * Strings for component 'block_metalink', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   block_metalink
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blocksettings'] = 'Paramètres du bloc';
$string['cantreadcsv'] = 'Impossible de lire le fichier CSV';
$string['cantremoveold'] = 'L\'ancien fichier $a n\'a pas pu être supprimé. Vérifiez les permissions de fichiers.';
$string['childisparent'] = '{$a->child} est parent de {$a->parent}, il ne peut donc pas être ajouté comme son enfant.';
$string['childnotfound'] = 'Ligne {$a->line} : Cours enfant non trouvé';
$string['cronfile'] = 'Emplacement du fichier pour traitement automatique';
$string['cronfiledesc'] = 'Si vous entrez un emplacement de fichier ici, cet emplacement sera inspecté périodiquement à la recherche d\'un fichier à traiter automatiquement.';
$string['cronmoved'] = '{$a->old} déplacé vers {$a->new}';
$string['cronnotmoved'] = '{$a->old} n\'a pas pu être déplacé vers {$a->new}. Vérifier les permissions des répertoires.';
$string['cronprocessed'] = 'Emplacement du fichier traité';
$string['csv'] = 'Fichier CSV';
$string['csvfile'] = 'Sélectionner un fichier CSV';
$string['csv_help'] = 'Le fichier doit être en CSV (comma separated value, valeurs séparées par des virgules). Chaque commande doit être sur une ligne séparée, en 3 colonnes : opération (add ou del), idnumber du cours parent, idnumber du cours enfant. Par exemple, pour ajouter le cours 1234 comme cours enfant au cours parent 4321, la ligne est :
add, 4321, 1234';
$string['invalidop'] = 'Ligne {$a->line} : opération invalide {$a->op}';
$string['keepprocessed'] = 'Conserver les fichiers traités';
$string['keepprocessedfor'] = 'Nombre de jours pendant lesquels converver les fichiers traités';
$string['keepprocessedlong'] = 'Si cette case est cochée, les fichiers traités seront stockés à l\'emplacement ci-dessous.';
$string['metadisabled'] = 'Le plugin "Inscription métacours" est désactivé. L\'activer pour pouvoir utiliser ce bloc.';
$string['metalink_log'] = 'Journal Flatfile Metalink';
$string['musthavefile'] = 'Vous devez sélectionner un fichier';
$string['nocronfile'] = 'Le fichier cron n\'existe pas.';
$string['nodir'] = '{$a} n\'existe pas ou n\'est pas modifiable en écriture. Vérifier les permissions des répertoires.';
$string['nopermission'] = 'Vous n\'avez pas la permission pour uploader des liens métacours.';
$string['parentnotfound'] = 'Ligne {$a->line} : cours parent non trouvé';
$string['pluginname'] = 'Téléchargement de liens métacours';
$string['pluginnameplural'] = 'Téléchargement de liens métacours';
$string['reladded'] = '{$a->child} a bien été lié à {$a->parent}';
$string['reladderror'] = '{$a->child} n\'a pas pu être lié à {$a->parent}';
$string['relalreadyexists'] = '{$a->child} est déjà lié à {$a->parent}';
$string['reldeleted'] = 'Suppresion du lien de {$a->child} à {$a->parent}';
$string['reldoesntexist'] = '{$a->child} n\'est pas lié à {$a->parent}, donc pas de lien supprimé';
$string['removedold'] = '{$a} ancien(s) fichier(s) cron supprimé(s).';
$string['toofewcols'] = 'Le fichier CSV n\'a pas assez de colonnes sur la ligne {$a} (3 attendues).';
$string['toomanycols'] = 'Le fichier CSV a trop de colonnes  sur la ligne {$a} (3 attendues).';
