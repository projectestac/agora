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
 * Strings for component 'enrol_autoenrol', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_autoenrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alwaysenrol'] = 'Toujours inscrit';
$string['alwaysenrol_help'] = 'Si vous choisissez Oui, le plugin inscrira toujours les utilisateurs, même s\'ils ont accès au cours par une autre méthode.';
$string['auto'] = 'Auto';
$string['auto_desc'] = 'Ce groupe a éré automatiquement créé par le plugin d\'inscription automatique. Il sera supprimé si vous supprimez le plugin d\'inscriptino automatique du cours.';
$string['autoenrol:config'] = 'Configuration des inscriptions automatiques';
$string['autoenrol:method'] = 'L\'utilisateur peut inscrire des utilisateurs dans un cours à la connexion';
$string['autoenrol:unenrol'] = 'L\'utilisateur peut désinscrire des utilisateurs inscrits automatiquement';
$string['autoenrol:unenrolself'] = 'L\'utilisateur peut se désinscrire si l’inscription automatique se fait sur l\'accès au cours.';
$string['config'] = 'Configuration';
$string['countlimit'] = 'Limite';
$string['countlimit_help'] = 'Cette instance va limiter le nombre d\'inscriptions autorisées pour le cours et permet d\'empêcher les utilisateurs de s\'inscrire une fois que la limite d\'inscrits est atteinte. Le réglage par défaut avec 0 signifie que le nombre d\'inscrits au cours est illimité.';
$string['defaultrole'] = 'Attribution du rôle par défaut';
$string['defaultrole_desc'] = 'Sélectionnez le rôle qui sera donné par défaut à tout utilisateur inscrit automatiquement';
$string['filter'] = 'Autoriser uniquement';
$string['filter_help'] = 'Lorsqu\'un groupe est sélectionné, vous pouvez utiliser ce champ pour filtrer le type d\'utilisateur que vous souhaitez inscrire dans le cours. Par exemple, si vous avez regroupé par authentification et filtré avec « manuel »,  seuls les utilisateurs qui se sont inscrits manuellement à votre site seront automatiquement inscrits dans ce cours.';
$string['filtering'] = 'Filtre des utilisateurs';
$string['g_auth'] = 'Méthode d\'authentification';
$string['g_dept'] = 'Département';
$string['g_email'] = 'Adresse de courriel';
$string['general'] = 'Général';
$string['g_inst'] = 'Institution';
$string['g_lang'] = 'Langue';
$string['g_none'] = 'Sélection...';
$string['groupon'] = 'Groupé par';
$string['groupon_help'] = 'L\'inscription automatique permet d\'ajouter automatiquement des utilisateurs à un groupe quand leur inscription est basée sur un de ces champs.';
$string['instancename'] = 'Nom personnalisé de l\'instance';
$string['instancename_help'] = 'Vous pouvez ajouter un nom personnalisé pour l\'instance de cette méthode. Cette option est particulièrement utile quand il y a plusieurs instances d\'inscription automatique dans le cours.';
$string['m_course'] = 'Chargement du cours';
$string['method'] = 'Inscrit quand';
$string['method_help'] = 'Les utilisateurs autorisés peuvent utiliser ce paramètre pour changer le comportement du plugin afin que les utilisateurs soient inscrits au cours lors de la connexion, plutôt que d\'attendre d\'accéder eux-même au cours. Ceci est utile pour les cours qui doivent être visibles sur la page « Ma page » des utilisateurs.';
$string['m_site'] = 'Connexion au site';
$string['pluginname'] = 'Inscription automatique';
$string['pluginname_desc'] = 'Le module d\'inscription automatique permet une option pour les utilisateurs connectés à les autoriser l\'accès à un cours et les inscrire. Ceci est similaire à leur permettre l\'accès en tant qu\'invité, mais les utilisateurs seront inscrits en permanence et donc en mesure de participer aux forums et aux activités dans le cours.';
$string['role'] = 'Rôle';
$string['role_help'] = 'Les utilisateurs autorisés peuvent utiliser ce paramètre pour modifier les permissions d\'accès des utilisateurs inscrits.';
$string['softmatch'] = 'Recherche souple';
$string['softmatch_help'] = 'Lorsque l\'option est activée, l\'inscription automatique va inscrire un utilisateur quand le motif recherché correspondra partiellement à la valeur donnée dans le champ « Autoriser seulement », au lieu d\'exiger une correspondance exacte. Les recherches sont également insensibles à la casse. La valeur de « Filtrer par » sera utilisée pour le nom du groupe.';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire du cours « {$a} » ? Vous pouvez revenir dans le cours pour vous réinscrire, mais des informations comme les notes et les observations d\'affectation pourront être perdues.';
$string['warning'] = 'Attention !';
$string['warning_message'] = 'L\'ajout de ce plugin dans votre cours permettra aux utilisateurs enregistrés à accéder à votre cours. N\'installer ce plugin seulement si vous souhaitez autoriser le libre accès à votre cours pour les utilisateurs qui se sont connectés.';
