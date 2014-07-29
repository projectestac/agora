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
 * Strings for component 'tool_langimport', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_langimport
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['install'] = 'Installer les paquetages de langue sélectionnés';
$string['installedlangs'] = 'Langues installées';
$string['langimport'] = 'Utilitaire d\'importation de langues';
$string['langimportdisabled'] = 'L\'utilitaire d\'importation de langues a été désactivé. Veuillez effectuer la mise à jour de vos paquetages de langue manuellement au niveau du système de fichiers de votre serveur. N\'oubliez pas de vider les caches une fois cette opération effectuée.';
$string['langpackinstalled'] = 'Le paquetage de langue {$a} a été installé et/ou mis à jour';
$string['langpackremoved'] = 'La désinstallation du paquetage de langue est terminée';
$string['langpackupdateskipped'] = 'La mise à jour du paquetage de langue {$a} n\'a pas été effectuée';
$string['langpackuptodate'] = 'Le paquetage de langue {$a} est à jour';
$string['langupdatecomplete'] = 'La mise à jour des langues est terminée';
$string['missingcfglangotherroot'] = 'Valeur manquante pour le paramètre de configuration $CFG->langotherroot';
$string['missinglangparent'] = 'Le paquetage de la langue parente <em>{$a->parent}</em> de <em>{$a->lang}</em> n\'est pas installé.';
$string['nolangupdateneeded'] = 'Toutes les langues sont à jour. Aucune mise à jour n\'est nécessaire';
$string['pluginname'] = 'Paquetages langue';
$string['purgestringcaches'] = 'Vider les caches des chaînes de caractères';
$string['remotelangnotavailable'] = 'Moodle ne peut pas se connecter au site download.moodle.org. L\'installation automatique des langues ne peut donc pas avoir lieu. Veuillez télécharger sur <a href="http://download.moodle.org/langpack/">download.moodle.org/langpack</a> le(s) fichier(s) compressé(s) nécessaire(s) dans la liste ci-dessous, les copier dans votre dossier {$a} et les décompresser manuellement.';
$string['uninstall'] = 'Désinstaller le paquetage de langue sélectionné';
$string['uninstallconfirm'] = 'Vous êtes sur le point de supprimer totalement la langue {$a}. Voulez-vous continuer ?';
$string['updatelangs'] = 'Mettre à jour tous les paquetages de langue installés';
