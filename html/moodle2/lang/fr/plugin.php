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
 * Strings for component 'plugin', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['availability'] = 'Disponibilité';
$string['checkforupdates'] = 'Rechercher des mises à jour';
$string['checkforupdateslast'] = 'Dernière vérification effectuée le {$a}';
$string['displayname'] = 'Nom du plugin';
$string['err_response_curl'] = 'Impossible de récupérer les données de mise à jour. Erreur de cURL.';
$string['err_response_format_version'] = 'Version inattendue du format de réponse. Veuillez vérifier si des mises à jour sont disponibles.';
$string['err_response_http_code'] = 'Impossible de récupérer les données de mise à jour. Code de réponse HTTP inapproprié.';
$string['filterall'] = 'Tout afficher';
$string['filtercontribonly'] = 'N\'afficher que les plugins tiers';
$string['filtercontribonlyactive'] = 'Affichage des plugins tiers seulement';
$string['filterupdatesonly'] = 'Afficher seulement les éléments susceptibles de mise à jour';
$string['filterupdatesonlyactive'] = 'Affichage des éléments susceptibles de mise à jour seulement';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'Aucun plugin ne requiert votre attention actuellement';
$string['nonehighlightedinfo'] = 'Afficher tout de même la liste complète des plugins installés';
$string['noneinstalled'] = 'Aucun plugin de ce type n\'est installé';
$string['notdownloadable'] = 'Impossible de télécharger le paquetage';
$string['notdownloadable_help'] = 'Le paquetage ZIP contenant la mise à jour ne peut pas être téléchargé automatiquement. Veuillez vous référer à la documentation pour plus d\'aide.';
$string['notes'] = 'Annotations';
$string['notwritable'] = 'Impossible d\'écrire les fichiers du plugin';
$string['notwritable_help'] = 'Vous avez activé le déploiement automatique des mises à jour et une mise à jour est disponible pour ce plugin. Toutefois, le serveur web ne peut pas écrire les fichiers du plugin et la mise à jour ne peut donc pas être effectuée.

Pour permettre l\'installation de cette mise à jour, veuillez permettre au serveur web l\'accès en écriture au dossier de ce plugin et à tout son contenu.';
$string['numdisabled'] = 'Désactivés : {$a}';
$string['numextension'] = 'Plugins tiers : {$a}';
$string['numtotal'] = 'Installés : {$a}';
$string['numupdatable'] = 'Mises à jour disponibles : {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'Cette page affiche les plugins pouvant requérir votre attention durant la mise à jour. Les éléments affichés incluent les nouveaux plugins sur le point d\'être installés, les plugins qui vont être mis à jour et tous les plugins manquants. Les plugins tiers sont aussi affichés.
Il est recommandé que vous vérifiiez si des versions plus récentes des plugins tiers sont disponibles et de mettre à jour leur code source avant de poursuivre la mise à jour de ce Moodle.';
$string['plugindisable'] = 'Désactiver';
$string['plugindisabled'] = 'Désactivé';
$string['pluginenable'] = 'Activer';
$string['pluginenabled'] = 'Activé';
$string['requiredby'] = 'Requis par {$a}';
$string['requires'] = 'Requiert';
$string['rootdir'] = 'Dossier';
$string['settings'] = 'Paramètres';
$string['showall'] = 'Actualiser et afficher tous les plugins';
$string['somehighlighted'] = 'Nombre de plugins requérant votre attention : {$a}';
$string['somehighlightedinfo'] = 'Afficher la liste complète des plugins installés';
$string['somehighlightedonly'] = 'N\'afficher que les plugins nécessitant votre attention';
$string['source'] = 'Source';
$string['sourceext'] = 'Tierce partie';
$string['sourcestd'] = 'Standard';
$string['status'] = 'Statut';
$string['status_delete'] = 'À supprimer';
$string['status_downgrade'] = 'Version plus récente déjà installée !';
$string['status_missing'] = 'Absent du disque dur !';
$string['status_new'] = 'À installer';
$string['status_nodb'] = 'Pas de base de données';
$string['status_upgrade'] = 'À mettre à jour';
$string['status_uptodate'] = 'Installé';
$string['systemname'] = 'Identifiant';
$string['type_auth'] = 'Méthode d\'authentification';
$string['type_auth_plural'] = 'Méthodes d\'authentification';
$string['type_block'] = 'Bloc';
$string['type_block_plural'] = 'Blocs';
$string['type_cachelock'] = 'Gestionnaire de verrou de cache';
$string['type_cachelock_plural'] = 'Gestionnaires de verrou de cache';
$string['type_cachestore'] = 'Entrepôt du cache';
$string['type_cachestore_plural'] = 'Entrepôts du cache';
$string['type_coursereport'] = 'Rapport de cours';
$string['type_coursereport_plural'] = 'Rapports du cours';
$string['type_editor'] = 'Éditeur';
$string['type_editor_plural'] = 'Éditeurs';
$string['type_enrol'] = 'Méthode d\'inscription';
$string['type_enrol_plural'] = 'Méthodes d\'inscription';
$string['type_filter'] = 'Filtre de texte';
$string['type_filter_plural'] = 'Filtres de texte';
$string['type_format'] = 'Format de cours';
$string['type_format_plural'] = 'Formats de cours';
$string['type_gradeexport'] = 'Méthode d\'exportation des notes';
$string['type_gradeexport_plural'] = 'Méthodes d\'exportation des notes';
$string['type_gradeimport'] = 'Méthode d\'importation des notes';
$string['type_gradeimport_plural'] = 'Méthodes d\'importation des notes';
$string['type_gradereport'] = 'Rapport de carnet de note';
$string['type_gradereport_plural'] = 'Rapports de carnet de note';
$string['type_gradingform'] = 'Méthode d\'évaluation avancée';
$string['type_gradingform_plural'] = 'Méthodes d\'évaluation avancées';
$string['type_local'] = 'Plugin local';
$string['type_local_plural'] = 'Plugins locaux';
$string['type_message'] = 'Output de messagerie';
$string['type_message_plural'] = 'Outputs de messagerie';
$string['type_mnetservice'] = 'Service MNet';
$string['type_mnetservice_plural'] = 'Services MNet';
$string['type_mod'] = 'Module d\'activité';
$string['type_mod_plural'] = 'Modules d\'activité';
$string['type_plagiarism'] = 'Plugin de prévention du plagiat';
$string['type_plagiarism_plural'] = 'Plugins de prévention du plagiat';
$string['type_portfolio'] = 'Portfolio';
$string['type_portfolio_plural'] = 'Portfolios';
$string['type_profilefield'] = 'Type de champ de profil';
$string['type_profilefield_plural'] = 'Types de champ de profil';
$string['type_qbehaviour'] = 'Comportement de question';
$string['type_qbehaviour_plural'] = 'Comportements de question';
$string['type_qformat'] = 'Format d\'importation/exportation de question';
$string['type_qformat_plural'] = 'Formats d\'importation/exportation de question';
$string['type_qtype'] = 'Type de question';
$string['type_qtype_plural'] = 'Types de question';
$string['type_report'] = 'Rapport de site';
$string['type_report_plural'] = 'Rapports';
$string['type_repository'] = 'Dépôt';
$string['type_repository_plural'] = 'Dépôts';
$string['type_theme'] = 'Thème';
$string['type_theme_plural'] = 'Thèmes';
$string['type_tool'] = 'Outil d\'administration';
$string['type_tool_plural'] = 'Outils d\'administration';
$string['type_webservice'] = 'Protocole de service web';
$string['type_webservice_plural'] = 'Protocoles de service web';
$string['uninstall'] = 'Désinstaller';
$string['updateavailable'] = 'Une nouvelle version {$a} est disponible !';
$string['updateavailable_moreinfo'] = 'Plus d\'infos...';
$string['updateavailable_release'] = 'Version {$a}';
$string['updatepluginconfirm'] = 'Confirmation de mise à jour du plugin';
$string['updatepluginconfirmexternal'] = 'La version actuelle de ce plugin semble avoir été installée au moyen d\'un gestionnaire de code source ({$a}). Si vous installez cette mise à jour, vous ne pourrez plus effectuer les mises à jour au moyen de ce gestionnaire de code source. Veuillez vous assurer que c\'est bien ce que vous voulez faire avant de continuer.';
$string['updatepluginconfirminfo'] = 'Vous allez installer une nouvelle version du plugin <strong>{$a->name}</strong>. Un fichier ZIP de la version {$a->version} du plugin va être téléchargé de <a href="{$a->url}">{$a->url}</a> et décompressé dans votre installation Moodle afin d\'être installé.';
$string['updatepluginconfirmwarning'] = 'Veuillez prendre note que Moodle ne fera pas de sauvegarde automatique de votre base de données avant la mise à jour. Nous recommandons vivement d\'en effectuer une sauvegarde maintenant, pour pallier les rares cas où le nouveau code aurait un défaut rendant votre site indisponible ou même corrompant votre base de données. Continuez à vos risques et périls.';
$string['version'] = 'Version';
$string['versiondb'] = 'Version actuelle';
$string['versiondisk'] = 'Nouvelle version';
