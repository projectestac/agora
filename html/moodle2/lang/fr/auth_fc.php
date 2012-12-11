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
 * Strings for component 'auth_fc', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_fc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_fcchangepasswordurl'] = 'URL pour changement de mot de passe';
$string['auth_fcconnfail'] = 'La connexion a échoué avec l\'erreur numéro {$a->no} et le message {$a->str}';
$string['auth_fccreators'] = 'Liste des groupes dont les membres ont l\'autorisation de créer de nouveaux cours. Séparez les différents groupes par des points-virgules (;). Les noms doivent être transcrits exactement tels qu\'ils sont sur le serveur FirstClass. La casse des caractères doit être respectée.';
$string['auth_fccreators_key'] = 'Créateurs';
$string['auth_fcdescription'] = 'Cette méthode utilise un serveur FisrtClass pour vérifier la validité d\'un nom d\'utilisateur et d\'un mot de passe donnés.';
$string['auth_fcfppport'] = 'Port du serveur (la plupart du temps 3333)';
$string['auth_fcfppport_key'] = 'Port';
$string['auth_fchost'] = 'L\'adresse du serveur FirstClass. Indiquez l\'adresse IP numérique ou un nom de domaine DNS.';
$string['auth_fchost_key'] = 'Serveur';
$string['auth_fcpasswd'] = 'Mot de passe du compte FirstClass ayant le privilège « Subadministrator ».';
$string['auth_fcpasswd_key'] = 'Mot de passe';
$string['auth_fcuserid'] = 'Numéro d\'identification du compte FirstClass ayant le privilège « Subadministrator ».';
$string['auth_fcuserid_key'] = 'ID utilisateur';
$string['pluginname'] = 'Serveur FirstClass';
