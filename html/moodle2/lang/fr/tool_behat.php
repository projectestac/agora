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
 * Strings for component 'tool_behat', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_behat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aim'] = 'Cet outil d\'administration aide les développeurs et les personnes qui créent les tests à composer des fichiers .feature décrivant les fonctionnalités de Moodle et à lancer les tests automatiquement.';
$string['allavailablesteps'] = 'Toutes les définitions d\'étape disponibles';
$string['giveninfo'] = 'Donné. Processus pour mettre en place l\'environnement';
$string['infoheading'] = 'Info';
$string['installinfo'] = 'Lire {$a} pour des informations sur l\'installation et l\'exécution des tests.';
$string['moreinfoin'] = 'Plus d\'info dans {$a}';
$string['newstepsinfo'] = 'Lire {$a} pour des informations sur l\'ajout de définitions d\'étapes';
$string['newtestsinfo'] = 'Lire {$a} pour des informations de confection de nouveaux tests';
$string['nostepsdefinitions'] = 'Il n\'y a pas de définition d\'étape correspondant à ce filtre';
$string['pluginname'] = 'Tests d\'acceptation';
$string['runclitool'] = 'La liste des définitions d\'étapes à lancer dans l\'outil CLI Behat afin de créer le dossier $CFG->behat_dataroot. Aller dans votre dossier principal moodle et lancer « {$a} ».';
$string['stepsdefinitionscomponent'] = 'Zone';
$string['stepsdefinitionscontains'] = 'Contient';
$string['stepsdefinitionsfilters'] = 'Définition des étapes';
$string['stepsdefinitionstype'] = 'Type';
$string['theninfo'] = 'Alors. Vérifications assurant que les résultats sont bien ceux attendus';
$string['unknownexceptioninfo'] = 'Un problème est survenu avec Selenium ou votre navigateur. Assurez-vous que vous utilisez la dernière version de Selenium. Erreur :';
$string['viewsteps'] = 'Filtre';
$string['wheninfo'] = 'Quand. Actions qui provoquent un événement';
$string['wrongbehatsetup'] = 'Quelque chose n\'est pas correct dans vos réglages behat. Assurez-vous que<ul>
<li>vous avez lancé « php admin/tool/behat/cli/init.php » depuis votre dossier moodle ;</li>
<li>le fichier vendor/bin/behat possède les droits pour être lancé.</li></ul>';
