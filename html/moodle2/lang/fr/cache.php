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
 * Strings for component 'cache', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['addinstance'] = 'Ajouter une instance';
$string['addlocksuccess'] = 'Nouvelle instance de verrouillage ajoutée';
$string['addnewlockinstance'] = 'Ajouter une nouvelle instance de verrouillage';
$string['addstore'] = 'Ajouter entrepôt pour {$a}';
$string['addstoresuccess'] = 'Entrepôt ajouté pour {$a}';
$string['area'] = 'Zone';
$string['cacheadmin'] = 'Administration du cache';
$string['cacheconfig'] = 'Configuration';
$string['cachedef_calendar_subscriptions'] = 'Abonnements de calendrier';
$string['cachedef_config'] = 'Réglages';
$string['cachedef_coursecat'] = 'Listes des catégories de cours pour chaque utilisateur';
$string['cachedef_coursecatrecords'] = 'Enregistrements des catégories de cours';
$string['cachedef_coursecattree'] = 'Arbre des catégories de cours';
$string['cachedef_coursecontacts'] = 'Liste des contacts de cours';
$string['cachedef_coursemodinfo'] = 'Information accumulée sur les modules et sections de chaque cours';
$string['cachedef_databasemeta'] = 'Méta-information de base de données';
$string['cachedef_eventinvalidation'] = 'Invalidation de l\'événement';
$string['cachedef_externalbadges'] = 'Badges externes pour un utilisateur déterminé';
$string['cachedef_gradecondition'] = 'Notes des utilisateurs mises en cache pour l\'évaluation de la disponibilité conditionnelle';
$string['cachedef_groupdata'] = 'Information du groupe de cours';
$string['cachedef_htmlpurifier'] = 'HTML Purifier - contenu nettoyé';
$string['cachedef_langmenu'] = 'Liste des langues disponibles';
$string['cachedef_locking'] = 'Verrouillage';
$string['cachedef_navigation_expandcourse'] = 'Navigation des cours dépliables';
$string['cachedef_observers'] = 'Observateurs d\'événements';
$string['cachedef_plugin_manager'] = 'Gestionnaire d\'info des plugins';
$string['cachedef_questiondata'] = 'Définitions des questions';
$string['cachedef_repositories'] = 'Données d\'instances des dépôts';
$string['cachedef_string'] = 'Cache des chaînes de caractères traduites';
$string['cachedef_suspended_userids'] = 'Liste des utilisateurs suspendus, par cours';
$string['cachedef_userselections'] = 'Données utilisées pour conserver les sélections utilisateurs dans Moodle';
$string['cachedef_yuimodules'] = 'Modules YUI';
$string['cachelock_file_default'] = 'Verrouillage de fichier par défaut';
$string['cachestores'] = 'Entrepôts de cache';
$string['caching'] = 'Cache';
$string['component'] = 'Composant';
$string['confirmlockdeletion'] = 'Confirmer la suppression du verrou';
$string['confirmstoredeletion'] = 'Confirmer la suppression de l\'entrepôt';
$string['default_application'] = 'Entrepôt par défaut de l\'application';
$string['defaultmappings'] = 'Entrepôts utilisés en l\'absence de correspondance';
$string['defaultmappings_help'] = 'Ces entrepôts par défaut seront utilisés si vous n\'appariez pas un ou plusieurs entrepôts avec la définition du cache';
$string['default_request'] = 'Entrepôt par défaut des requêtes';
$string['default_session'] = 'Entrepôt par défaut des sessions';
$string['defaultstoreactions'] = 'Les entrepôts par défaut ne peuvent pas être modifiés';
$string['definition'] = 'Définition';
$string['definitionsummaries'] = 'Définitions de cache connues';
$string['delete'] = 'Supprimer';
$string['deletelock'] = 'Supprimer le verrou';
$string['deletelockconfirmation'] = 'Voulez-vous vraiment effacer le verrou {$a} ?';
$string['deletelockhasuses'] = 'Vous ne pouvez pas supprimer cette instance de verrouillage, car elle est utilisée par un ou plusieurs entrepôts.';
$string['deletelocksuccess'] = 'Suppression du verrou réussie.';
$string['deletestore'] = 'Supprimer entrepôt';
$string['deletestoreconfirmation'] = 'Voulez-vous vraiment supprimer l\'entrepôt « {$a} »?';
$string['deletestorehasmappings'] = 'Cet entrepôt ne peut pas être supprimé, car il comprend des correspondances. Veuillez supprimer toutes les correspondances avant de supprimer l\'entrepôt';
$string['deletestoresuccess'] = 'L\'entrepôt de cache a été supprimé';
$string['editdefinitionmappings'] = 'Définition des correspondance de l\'entrepôt {$a}';
$string['editdefinitionsharing'] = 'Modifier les définitions de partage pour {$a}';
$string['editmappings'] = 'Modifier les correspondances';
$string['editsharing'] = 'Modifier le partage';
$string['editstore'] = 'Modifier entrepôt';
$string['editstoresuccess'] = 'L\'entrepôt a été modifié';
$string['ex_configcannotsave'] = 'Impossible d\'enregistrer la configuration du cache.';
$string['ex_nodefaultlock'] = 'Impossible de trouver une instance de verrouillage par défaut.';
$string['ex_unabletolock'] = 'Impossible d\'enclencher un verrouillage pour le cache.';
$string['ex_unmetstorerequirements'] = 'Vous ne pouvez pas utiliser actuellement cet entrepôt. Veuillez vous référer à la documentation pour déterminer ce qui est nécessaire.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['inadequatestoreformapping'] = 'Cet entrepôt ne remplit pas les conditions requises pour toutes les définitions connues. Les définitions pour lesquelles cet entrepôt est inadéquat seront données dans l\'entrepôt original par défaut, au lieu de l\'entrepôt sélectionné.';
$string['invalidlock'] = 'Verrou non valide';
$string['invalidplugin'] = 'Plugin non valide';
$string['invalidstore'] = 'Entrepôt de cache non valide';
$string['lockdefault'] = 'Défaut';
$string['lockingmeans'] = 'Mécanisme de verrouillage';
$string['lockmethod'] = 'Méthode de verrouillage';
$string['lockmethod_help'] = 'Cette méthode est utilisée pour le verrouillage si requis par cet entrepôt.';
$string['lockname'] = 'Nom';
$string['locknamedesc'] = 'Le nom doit être unique et seuls les caractères suivants sont autorisés : a-zA-Z_';
$string['locknamenotunique'] = 'Le nom que vous avez sélectionné n\'est pas unique. Veuillez choisir un nom unique.';
$string['locksummary'] = 'Résumé des instances de verrouillage de cache';
$string['locktype'] = 'Type';
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
$string['purgedefinitionsuccess'] = 'La définition requise a été purgée';
$string['purgestoresuccess'] = 'L\'entrepôt indiqué a été purgé.';
$string['requestcount'] = 'Tester avec {$a} requêtes';
$string['rescandefinitions'] = 'Relire les définitions';
$string['result'] = 'Résultat';
$string['set'] = 'Set';
$string['sharing'] = 'Partage';
$string['sharing_all'] = 'Tout le monde.';
$string['sharing_help'] = 'Ce réglage vous permet de déterminer comment les données de cache peuvent être partagées si vous avez une configuration en cluster, ou si vous avez plusieurs sites mis en place avec le même entrepôt, et souhaitez partager les données. Il s\'agit d\'un paramètre avancé, merci de vous assurer que vous comprenez son but avant de le changer.';
$string['sharing_input'] = 'Clef personnalisée (saisir plus bas)';
$string['sharingrequired'] = 'Vous devez sélectionner au moins une option de partage.';
$string['sharingselected_all'] = 'Tout le monde';
$string['sharingselected_input'] = 'Clef personnalisée';
$string['sharingselected_siteid'] = 'Identifiant de site';
$string['sharingselected_version'] = 'Version';
$string['sharing_siteid'] = 'Sites avec le même identifiant.';
$string['sharing_version'] = 'Sites utilisant la même version.';
$string['storeconfiguration'] = 'Configuration entrepôt';
$string['store_default_application'] = 'Entrepôt de fichiers par défaut pour les caches d\'applications';
$string['store_default_request'] = 'Entrepôt statique par défaut pour les caches de requêtes';
$string['store_default_session'] = 'Entrepôt de sessions par défaut pour les caches de sessions';
$string['storename'] = 'Nom de l\'entrepôt';
$string['storenamealreadyused'] = 'Vous devez spécifier un nom unique pour cet entrepôt.';
$string['storename_help'] = 'Définit le nom de l\'entrepôt. Ce nom est utilisé pour identifier le dépôt dans le système. Seuls les caractères a-z A-Z 0-9 - _ et des espaces sont autorisés. Le nom doit en outre être unique. Si vous essayez un nom déjà employé, une annonce d\'erreur sera affichée.';
$string['storenameinvalid'] = 'Nom d\'entrepôt non valide. Vous ne pouvez utiliser que les caractères a-z A-Z 0-9 - _ et des espaces.';
$string['storenotready'] = 'Dépôt pas prêt';
$string['storeperformance'] = 'Rapport de performance de l\'entrepôt de cache. {$a} requêtes uniques par opération.';
$string['storeready'] = 'Prêt';
$string['storerequiresattention'] = 'Requiert votre attention.';
$string['storerequiresattention_help'] = 'Cet instance dépôt n\'est pas prête à être utilisée, mais comporte des correspondances. La correction de ce problème améliorera la performance de votre système. Veuillez vérifier que l\'infrastructure du dépôt est prête à être utilisée et que tous les prérequis PHP sont remplis.';
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
$string['supports_searchable'] = 'recherche par clef';
$string['tested'] = 'Testé';
$string['testperformance'] = 'Test de performance';
$string['unsupportedmode'] = 'Mode non supporté';
$string['untestable'] = 'Non testable';
$string['userinputsharingkey'] = 'Clef personnalisée pour le partage';
$string['userinputsharingkey_help'] = 'Saisissez votre propre clef privée ici. Lorsque vous configurez d\'autres entrepôts sur d\'autres sites avec lesquels vous souhaitez partager les données, assurez-vous que vous y définissez la même clef.';
