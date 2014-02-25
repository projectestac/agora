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
 * Strings for component 'auth_mcae', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   auth_mcae
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_cohortname'] = 'Nom de la cohorte';
$string['auth_cohortoper_help'] = '<p>Sélectionnez les cohortes à convertir.</p><p><b>Attention !</b> <i>Vous <b>ne pourrez plus</b> modifier manuellement les cohortes converties !</i> Faites une sauvegarde de votre base de données !</p>';
$string['auth_cohorttoolmcae'] = 'Opérations sur les cohortes';
$string['auth_cohortviewmcae'] = 'Affichage des cohortes';
$string['auth_component'] = 'Type de cohorte';
$string['auth_count'] = 'Nombre';
$string['auth_delim'] = 'Délimiteur';
$string['auth_delim_help'] = 'Les systèmes d\'exploitations utilisent différents caractères de fin de ligne. Sous Windows, c\'est normalement CR+LF. Linux utilise LF. Les anciennes versions de Mac OS utilisaient CR.<br />Si le plugin ne fonctionne pas, essayez de modifier cette valeur.';
$string['auth_donttouchusers'] = 'Ignorer les utilisateurs';
$string['auth_donttouchusers_help'] = 'Liste de noms d\'utilisateurs séparés par des virgules';
$string['auth_emptycohort'] = 'Cohorte vide';
$string['auth_enableunenrol'] = 'Activer la désinscription automatique';
$string['auth_fieldlocks_help'] = ' ';
$string['auth_mainrule_fld'] = 'Modèle principal. Un modèle par ligne.';
$string['auth_mcaedescription'] = 'Cette méthode permet d\'inscrire automatiquement des utilisateurs dans des cohortes.';
$string['auth_profile_help'] = 'Modèles disponibles';
$string['auth_replace_arr'] = 'Tabelle de remplacement. Une valeur par ligne. Format : ancienne_valeur|nouvelle_valeur';
$string['auth_secondrule_fld'] = 'Champ texte vide';
$string['auth_selectcohort'] = 'Choisir une cohorte...';
$string['auth_tools_help'] = 'La fonction de désinscription ne fonction qu\'avec les cohortes associées à ce plugin. Vous pouvez convertir les cohortes avec <a href="{$a->url}" target="_blank">cet outil</a>.';
$string['auth_total'] = 'Total';
$string['auth_userlink'] = 'Voir les utilisateurs';
$string['auth_username'] = 'Nom d\'utilisateur';
$string['auth_userprofile'] = 'Profil utilisateur >>';
$string['auth_viewcohort'] = 'Affichage de cohorte';
$string['pluginname'] = 'Auto-inscription cohortes';
