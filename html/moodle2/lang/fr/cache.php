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
 * Strings for component 'cache', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['addinstance'] = 'Ajouter une instance';
$string['addstore'] = 'Ajouter entrepôt pour {$a}';
$string['addstoresuccess'] = 'Entrepôt ajouté pour {$a}';
$string['area'] = 'Zone';
$string['cacheadmin'] = 'Administration du cache';
$string['cacheconfig'] = 'Configuration';
$string['cachedef_databasemeta'] = 'Méta-information de base de données';
$string['cachedef_eventinvalidation'] = 'Invalidation de l\'événement';
$string['cachedef_locking'] = 'Verrouillage';
$string['cachedef_questiondata'] = 'Définitions des questions';
$string['cachedef_string'] = 'Cache des chaînes de caractères traduites';
$string['cachelock_file_default'] = 'Verrouillage de fichier par défaut';
$string['cachestores'] = 'Entrepôts de cache';
$string['caching'] = 'Cache';
$string['component'] = 'Composant';
$string['confirmstoredeletion'] = 'Confirmer la suppression de l\'entrepôt';
$string['default_application'] = 'Entrepôt par défaut de l\'application';
$string['defaultmappings'] = 'Entrepôts utilisés en l\'absence de correspondance';
$string['defaultmappings_help'] = 'Ces entrepôts par défaut seront utilisés si vous n\'appariez pas un ou plusieurs entrepôts avec la définition du cache';
$string['default_request'] = 'Entrepôt par défaut des requêtes';
$string['default_session'] = 'Entrepôt par défaut des sessions';
$string['defaultstoreactions'] = 'Les entrepôts par défaut ne peuvent pas être modifiés';
$string['definition'] = 'Définition';
$string['definitionsummaries'] = 'Définitions de cache connues';
$string['delete'] = 'Delete';
$string['deletestore'] = 'Supprimer entrepôt';
$string['deletestoreconfirmation'] = 'Voulez-vous vraiment supprimer l\'entrepôt « {$a} »?';
$string['deletestorehasmappings'] = 'Cet entrepôt ne peut pas être supprimé, car il comprend des correspondances. Veuillez supprimer toutes les correspondances avant de supprimer l\'entrepôt';
$string['deletestoresuccess'] = 'L\'entrepôt de cache a été supprimé';
$string['editdefinitionmappings'] = 'Définition des correspondance de l\'entrepôt {$a}';
$string['editmappings'] = 'Modifier les correspondances';
$string['editstore'] = 'Modifier entrepôt';
$string['editstoresuccess'] = 'L\'entrepôt a été modifié';
$string['ex_configcannotsave'] = 'Impossible d\'enregistrer la configuration du cache.';
$string['ex_nodefaultlock'] = 'Impossible de trouver une instance de verrouillage par défaut.';
$string['ex_unabletolock'] = 'Impossible d\'enclencher un verrouillage pour le cache.';
$string['ex_unmetstorerequirements'] = 'Vous ne pouvez pas utiliser actuellement cet entrepôt. Veuillez vous référer à la documentation pour déterminer ce qui est nécessaire.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['invalidplugin'] = 'Plugin non valide';
$string['invalidstore'] = 'Entrepôt de cache non valide';
$string['lockdefault'] = 'Défaut';
$string['lockmethod'] = 'Méthode de verrouillage';
$string['lockmethod_help'] = 'Cette méthode est utilisée pour le verrouillage si requis par cet entrepôt.';
$string['lockname'] = 'Nom';
$string['locksummary'] = 'Résumé des instances de verrouillage de cache';
$string['lockuses'] = 'Utilise';
$string['mappingdefault'] = '(défaut)';
$string['mappingfinal'] = 'Entrepôt final';
$string['mappingprimary'] = 'Entrepôt primaire';
$string['mappings'] = 'Correspondances de l\'entrepôt';
$string['mode'] = 'Mode';
$string['mode_1'] = 'Application';
$string['mode_2'] = 'Session';
$string['mode_4'] = 'Requête';
$string['modes'] = 'Modes';
$string['nativelocking'] = 'Ce plugin gère son propre verrouillage';
$string['none'] = 'Aucun';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Entrepôts de cache installés';
$string['purge'] = 'Purger';
$string['purgestoresuccess'] = 'L\'entrepôt indiqué a été purgé.';
$string['requestcount'] = 'Tester avec {$a} requêtes';
$string['rescandefinitions'] = 'Relire les définitions';
$string['result'] = 'Résultat';
$string['set'] = 'Set';
$string['storeconfiguration'] = 'Configuration entrepôt';
$string['store_default_application'] = 'Entrepôt de fichiers par défaut pour les caches d\'applications';
$string['store_default_request'] = 'Entrepôt statique par défaut pour les caches de requêtes';
$string['store_default_session'] = 'Entrepôt de sessions par défaut pour les caches de sessions';
$string['storename'] = 'Nom de l\'entrepôt';
$string['storenamealreadyused'] = 'Vous devez spécifier un nom unique pour cet entrepôt.';
$string['storename_help'] = 'Définit le nom de l\'entrepôt utilisé pour l\'identifier dans le système. Vous ne pouvez utiliser dans ce nom que les caractères a-z A-Z 0-9 - _ et des espaces. Il doit en outre être unique.';
$string['storenameinvalid'] = 'Nom d\'entrepôt non valide. Vous ne pouvez utiliser que les caractères a-z A-Z 0-9 - _ et des espaces.';
$string['storeperformance'] = 'Rapport de performance de l\'entrepôt de cache. {$a} requêtes uniques par opération.';
$string['storeready'] = 'Prêt';
$string['storeresults_application'] = 'Requêtes sur l\'entrepôt utilisé comme cache d\'application';
$string['storeresults_request'] = 'Requêtes sur l\'entrepôt utilisé comme cache de requête';
$string['storeresults_session'] = 'Requêtes sur l\'entrepôt utilisé comme cache de session';
$string['stores'] = 'Entrepôts';
$string['storesummaries'] = 'Instances d\'entrepôt configurées';
$string['supports'] = 'Supporte';
$string['supports_dataguarantee'] = 'garantie de données';
$string['supports_keyawareness'] = 'comprend les clefs';
$string['supports_multipleidentifiers'] = 'identifiants multiples';
$string['supports_nativelocking'] = 'verrouillage';
$string['supports_nativettl'] = 'ttl';
$string['tested'] = 'Testé';
$string['testperformance'] = 'Test de performance';
$string['unsupportedmode'] = 'Mode non supporté';
$string['untestable'] = 'Non testable';
