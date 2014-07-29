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
 * Strings for component 'assignfeedback_file', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_file
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['batchoperationconfirmuploadfiles'] = 'Déposer un ou plusieurs fichiers de feedback pour tous les étudiants sélectionnés ?';
$string['batchuploadfiles'] = 'Déposer des fichiers de feedback pour plusieurs utilisateurs';
$string['batchuploadfilesforusers'] = 'Envoyer des fichiers de feedback aux {$a} utilisateur(s) sélectionné(s)';
$string['configmaxbytes'] = 'Taille maximale des fichiers';
$string['confirmuploadzip'] = 'Confirmer le dépôt d\'un fichier ZIP';
$string['countfiles'] = '{$a} fichiers';
$string['default'] = 'Activé par défaut';
$string['default_help'] = 'Si ce réglage est activé, cette méthode de feedback sera activée par défaut pour tous les nouveaux devoirs.';
$string['enabled'] = 'Fichiers comme feedback';
$string['enabled_help'] = 'Si ce réglage est activé, l\'enseignant pourra déposer des fichiers comme feedback lors de l\'évaluation des devoirs. Ces fichiers peuvent être, par exemple, les travaux des étudiants annotés, des documents avec des commentaires ou des feedbacks audio.';
$string['feedbackfileadded'] = 'Nouveau fichier de feedback « {$a->filename} » pour l\'étudiant « {$a->student} »';
$string['feedbackfileupdated'] = 'Fichier de feedback « {$a->filename} » modifié pour l\'étudiant « {$a->student} »';
$string['feedbackzip'] = 'Fichier ZIP contenant les fichiers de feedback';
$string['feedbackzip_help'] = 'Un fichier ZIP contenant une liste de fichiers de feedback pour un ou plusieurs étudiants. Les fichiers de feedback seront attribués aux étudiants en fonction de leur identifiant de participant, qui doit être la 2e partie du nom de chaque fichier, immédiatement après le nom de l\'utilisateur. Cette convention est utilisée lorsque vous téléchargez les travaux remis. Il est donc plus simple de télécharger tous les travaux remis, ajouter des commentaires et re-compresser le tout, puis de déposer le fichier ZIP. Les fichiers non modifiés seront ignorés.';
$string['file'] = 'Fichiers de feedback';
$string['filesadded'] = 'Fichiers de feedback ajoutés : {$a}';
$string['filesupdated'] = 'Fichiers de feedback modifiés : {$a}';
$string['importfeedbackfiles'] = 'Importer des fichiers de feedback';
$string['maxbytes'] = 'Taille maximale des fichiers';
$string['maxfiles'] = 'Nombre maximum de fichiers';
$string['maximumsize'] = 'Taille maximale des fichiers';
$string['moreusers'] = '{$a} de plus...';
$string['nochanges'] = 'Pas de changement';
$string['pluginname'] = 'Fichiers comme feedback';
$string['selectedusers'] = 'Utilisateurs sélectionnés';
$string['uploadfiles'] = 'Envoyer des fichiers de feedback';
$string['uploadzip'] = 'Déposer plusieurs fichiers de feedback dans un ZIP';
$string['uploadzipsummary'] = 'Fichiers de feedback importés depuis un ZIP';
$string['userswithnewfeedback'] = 'Utilisateurs dont le feedback a été modifié : {$a}';
