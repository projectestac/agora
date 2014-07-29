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
 * Strings for component 'enrol_meta', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_meta
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['linkedcourse'] = 'Lier le cours';
$string['meta:config'] = 'Configurer les instances de méta-inscription';
$string['meta:selectaslinked'] = 'Sélectionner le cours comme méta-cours';
$string['meta:unenrol'] = 'Désinscrire les utilisateurs suspendus';
$string['nosyncroleids'] = 'Rôles non-synchronisés';
$string['nosyncroleids_desc'] = 'Par défaut, toutes les attributions de rôles dans le cours sont synchronisées des cours parents vers les cours enfants. Les rôles sélectionnés ici ne seront pas inclus dans le processus de synchronisation. Les rôles disponibles pour la synchronisation seront mis à jour lors de la prochaine exécution du cron.';
$string['pluginname'] = 'Lien méta-cours';
$string['pluginname_desc'] = 'Le plugin d\'inscription lien méta-cours synchronise les inscriptions et rôle entre différents cours.';
$string['syncall'] = 'Synchroniser tous les utilisateurs inscrits';
$string['syncall_desc'] = 'Si ce réglage est activé, tous les utilisateurs sont synchronisés même s\'ils n\'ont aucun rôle dans le cours parent. Dans le cas contraire, seuls les utilisateurs avec au moins un rôle synchronisé sont inscrits dans le cours enfant.';
