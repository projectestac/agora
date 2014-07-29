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
 * Strings for component 'enrol_flatfile', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['encoding'] = 'Encodage du fichier';
$string['expiredaction'] = 'Action à l\'échéance de l\'inscription';
$string['expiredaction_help'] = 'Sélectionnez une action à effectuer lorsque l\'inscription du participant arrive à échéance. Veuillez noter que certaines données et réglages de l\'utilisateur sont supprimées lors de la désinscription d\'un cours.';
$string['filelockedmail'] = 'Le fichier texte que vous utilisez pour l\'inscription ({$a}) ne pourra pas être effacé par le cron. Cela signifie la plupart du temps que ses droits d\'accès ne sont pas correctement réglés. Veuillez corriger ces droits d\'accès, de sorte que Moodle puisse effacer le fichier. Sans cela les inscriptions pourraient être effectuées à plusieurs reprises.';
$string['filelockedmailsubject'] = 'Erreur importante : fichier d\'inscriptions';
$string['flatfile:manage'] = 'Gérer manuellement les inscriptions des utilisateurs';
$string['flatfile:unenrol'] = 'Désinscrire manuellement du cours des utilisateurs';
$string['location'] = 'Emplacement du fichier';
$string['location_desc'] = 'Indiquer le chemin d\'accès complet au fichier d\'inscription. Ce fichier sera supprimé automatiquement après traitement.';
$string['mapping'] = 'Correspondance des rôles du fichier plat';
$string['messageprovider:flatfile_enrolment'] = 'Messages de l\'inscription par fichier plat';
$string['notifyadmin'] = 'Informer l\'administrateur';
$string['notifyenrolled'] = 'Informer les utilisateurs inscrits';
$string['notifyenroller'] = 'Infirmer l\'utilisateur responsable des inscriptions';
$string['pluginname'] = 'Fichier plat (CSV)';
$string['pluginname_desc'] = 'Cette méthode permet une vérification systématique à partir d\'un fichier texte spécialement mis en forme disposé à un emplacement que vous choisissez. Le fichier est en format CSV (séparateurs virgules) avec 4 ou 6 champs par ligne, à savoir :

  opération, rôle, ID (utilisateur), ID (cours) [, début, fin]

où :

*  opération : add | del
*  rôle : student | teacher | teacheredit
*  ID (utilisateur) : champ idnumber de l\'utilisateur dans la table « user » (PAS le champ id)
*  ID (cours) : champ idnumber du cours dans la table « course » (PAS le champ id)
*  début : date de début (en secondes depuis le 1.1.1970 à 0 h UTC) - facultatif
*  fin : date de fin (en secondes depuis le 1.1.1970 à 0 h UTC) - facultatif

Cela pourrait par exemple ressembler à ceci :
<pre class="informationbox">
    add, student, 5, CF101
    add, teacher, 6, CF101
    add, teacheredit, 7, CF101
    del, student, 8, CF101
    del, student, 17, CF101
    add, student, 21, CF101, 1091115000, 1091215000
</pre>';
