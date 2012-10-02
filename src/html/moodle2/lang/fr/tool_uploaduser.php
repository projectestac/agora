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
 * Strings for component 'tool_uploaduser', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = 'Autoriser les suppressions';
$string['allowrenames'] = 'Autoriser le changement des noms';
$string['allowsuspends'] = 'Permettre la suspension et l\'activation de comptes';
$string['csvdelimiter'] = 'Séparateur CSV';
$string['defaultvalues'] = 'Valeurs par défaut';
$string['deleteerrors'] = 'Erreurs lors de suppressions';
$string['encoding'] = 'Encodage';
$string['errors'] = 'Erreurs';
$string['nochanges'] = 'Aucune modification';
$string['pluginname'] = 'Déposer des comptes utilisateurs';
$string['renameerrors'] = 'Erreurs lors du changement de nom';
$string['requiredtemplate'] = 'Requis. Vous pouvez utiliser ici la syntaxe de modèle (%l = nom, %f = prénom, %u = nom d\'utilisateur). Voir l\'aide pour des détails et des exemples.';
$string['rowpreviewnum'] = 'Rangées de prévisualisation';
$string['uploadpicture_baduserfield'] = 'L\'attribut indiqué n\'est pas valide. Veuillez essayer à nouveau.';
$string['uploadpicture_cannotmovezip'] = 'Impossible de déplacer le fichier zip vers un dossier temporaire.';
$string['uploadpicture_cannotprocessdir'] = 'Impossible de traiter les fichiers décompressés.';
$string['uploadpicture_cannotsave'] = 'Impossible d\'enregistrer l\'avatar pour l\'utilisateur {$a}. Veuillez vérifier le fichier image original.';
$string['uploadpicture_cannotunzip'] = 'Impossible de décompresser le fichier d\'avatars.';
$string['uploadpicture_invalidfilename'] = 'Le nom du fichier image {$a} a des caractères non valides. Il sera ignoré.';
$string['uploadpicture_overwrite'] = 'Écraser les avatars déjà existants ?';
$string['uploadpictures'] = 'Déposer des avatars';
$string['uploadpictures_help'] = 'Les avatars des utilisateurs peuvent être déposés sous la forme d\'un fichier compressé (zip) de fichiers images. Le nom des fichiers images doit être de la forme <i>attribut-choisi.extension</i>. Par exemple, si vous choisissez pour la correspondance des images l\'attribut « nom d\'utilisateur » et que le nom d\'utilisateur de l\'utilisateur concerné est « user1234 », le nom de fichier devrait être « user1234.jpg ».';
$string['uploadpicture_userfield'] = 'Attribut utilisateur à utiliser pour la correspondance des avatars :';
$string['uploadpicture_usernotfound'] = 'Il n\'y a pas d\'utilisateur dont l\'attribut « {$a->userfield} » a la valeur « {$a->uservalue} ». Il sera ignoré.';
$string['uploadpicture_userskipped'] = 'Utilisateur {$a} ignoré (il possède déjà un avatar).';
$string['uploadpicture_userupdated'] = 'Avatar de l\'utilisateur {$a} modifié.';
$string['uploadusers'] = 'Importation d\'utilisateurs';
$string['uploadusers_help'] = 'Il est possible d\'importer manuellement des comptes utilisateurs (et optionnellement inscrits à des cours) à partir d\'un fichier texte, ce fichier doit être formaté de la façon suivante :

* chaque ligne du fichier contient un enregistrement ;
* les données de chaque enregistrement sont séparées par une virgule (ou un autre caractère de séparation) ;
* le premier enregistrement contient le nom des champs qui composent les enregistrements, et détermine ainsi la structure de la suite du fichier ;
* les champs requis sont username, password, firstname, lastname, email';
$string['uploaduserspreview'] = 'Prévisualisation de la création d\'utilisateurs';
$string['uploadusersresult'] = 'Résultats de la création d\'utilisateurs';
$string['useraccountupdated'] = 'Utilisateur modifié';
$string['useraccountuptodate'] = 'Utilisateur à jour';
$string['userdeleted'] = 'Utilisateur supprimé';
$string['userrenamed'] = 'Utilisateur renommé';
$string['userscreated'] = 'Utilisateurs créés';
$string['usersdeleted'] = 'Utilisateurs supprimés';
$string['usersrenamed'] = 'Utilisateurs renommés';
$string['usersskipped'] = 'Utilisateurs ignorés';
$string['usersupdated'] = 'Utilisateurs modifiés';
$string['usersweakpassword'] = 'Utilisateurs avec mot de passe faible';
$string['uubulk'] = 'Sélectionner pour des opérations en lots';
$string['uubulkall'] = 'Tous les utilisateurs';
$string['uubulknew'] = 'Nouveaux utilisateurs';
$string['uubulkupdated'] = 'Utilisateurs mis à jour';
$string['uucsvline'] = 'Ligne CSV';
$string['uulegacy1role'] = '(Anciennement étudiant) typeN=1';
$string['uulegacy2role'] = '(Anciennement enseignant) typeN=2';
$string['uulegacy3role'] = '(Anciennement enseignant sans droit d\'édition) typeN=3';
$string['uunoemailduplicates'] = 'Empêcher les doublons des adresses de courriel';
$string['uuoptype'] = 'Mode de création';
$string['uuoptype_addinc'] = 'Tout ajouter, y compris un compteur aux noms d\'utilisateurs au besoin';
$string['uuoptype_addnew'] = 'Ajouter seulement les nouveaux, ignorer les utilisateurs existants';
$string['uuoptype_addupdate'] = 'Ajouter les nouveaux et modifier les utilisateurs existants';
$string['uuoptype_update'] = 'Modifier les utilisateurs existants seulement';
$string['uupasswordcron'] = 'Généré dans le cron';
$string['uupasswordnew'] = 'Mot de passe nouvel utilisateur';
$string['uupasswordold'] = 'Mot de passe utilisateur existant';
$string['uustandardusernames'] = 'Standardiser les nom d\'utilisateur';
$string['uuupdateall'] = 'Remplacer avec le fichier et les réglages par défaut';
$string['uuupdatefromfile'] = 'Remplacer avec le fichier';
$string['uuupdatemissing'] = 'Remplir les manquants avec le fichier et les réglages par défaut';
$string['uuupdatetype'] = 'Détails de l\'utilisateur existant';
$string['uuusernametemplate'] = 'Modèle de nom d\'utilisateur';
