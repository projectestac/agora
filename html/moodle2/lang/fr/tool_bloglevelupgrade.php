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
 * Strings for component 'tool_bloglevelupgrade', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   tool_bloglevelupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bloglevelupgradedescription'] = '<p>Ce site a été mis à jour vers la version 2.0 de Moodle.</p>
<p>La visibilité des blogs a été simplifiée dans Moodle 2.0, mais votre site utilise encore les anciens types de visibilité.</p>
<p>Pour préserver la visibilité des blogs au niveau des cours et des groupes, vous devez lancer le script de mise à jour ci-dessous, qui créera un type spécial de forum « blog » dans chaque cours où des participants inscrits ont écrits des articles de blog. Ces articles seront copiés dans ce forum spécial.</p>
<p>Les blogs seront ensuite complètement désactivés au niveau du site, mais aucun article de blog ne sera supprimé par ce processus.</p>
<p>Vous pouvez lancer le script en visitant <a href="{$a->fixurl}">la page de mise à jour des blogs</a>.</p>';
$string['bloglevelupgradeinfo'] = 'La visibilité des blogs a été simplifiée dans Moodle 2.0, mais votre site utilise encore les anciens types de visibilité. Pour préserver la visibilité des blogs au niveau des cours et des groupes, vous devez lancer le script de mise à jour ci-dessous, qui créera un type spécial de forum « blog » dans chaque cours où des participants inscrits ont écrits des articles de blog. Ces articles seront copiés dans ce forum spécial. Les blogs seront ensuite complètement désactivés au niveau du site, mais aucun article de blog ne sera supprimé par ce processus.';
$string['bloglevelupgradeprogress'] = 'Progression de la conversion : {$a->userscount} utilisateurs vérifiés, {$a->blogcount} articles convertis.';
$string['pluginname'] = 'Modifier la visiblité des blogs';
