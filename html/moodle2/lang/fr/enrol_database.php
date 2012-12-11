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
 * Strings for component 'enrol_database', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_database
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['database:unenrol'] = 'Désinscrire les utilisateurs suspendus';
$string['dbencoding'] = 'Encodage de la base de données';
$string['dbhost'] = 'Adresse IP ou nom de domaine du serveur';
$string['dbhost_desc'] = 'Saisir l\'adresse IP ou le nom de domaine du serveur de base de données';
$string['dbname'] = 'Nom de la base de données';
$string['dbpass'] = 'Mot de passe de la base de données';
$string['dbsetupsql'] = 'Commande de configuration de la base de données';
$string['dbsetupsql_desc'] = 'Commande SQL pour une configuration particulière de la base de données. Une telle commande est souvent utilisée pour configurer l\'encodage de communication. Par exemple, pour MySQL et PostgreSQL : <em>SET NAMES \'utf8\'</em>';
$string['dbsybasequoting'] = 'Utiliser le mode Sybase pour les apostrophes';
$string['dbsybasequoting_desc'] = 'Style Sybase pour l\'échappement des apostrophes. Ce réglage est nécessaire pour les bases de données Oracle, MS SQL et d\'autres types de base de données. Ne pas utiliser avec MySQL !';
$string['dbtype'] = 'Pilote de base de données';
$string['dbtype_desc'] = 'Nom du pilote de base de données ADOdb, type de moteur de base de données externe.';
$string['dbuser'] = 'Nom d\'utilisateur de la base de données';
$string['debugdb'] = 'Débogage ADOdb';
$string['debugdb_desc'] = 'Débogage de la connexion ADOdb vers la base de données externe. À utiliser lorsque vous obtenez une page blanche lors de la connexion à Moodle. Ne convient pas à un site en production !';
$string['defaultcategory'] = 'Catégorie par défaut des nouveaux cours';
$string['defaultcategory_desc'] = 'La catégorie par défaut pour les cours créés automatiquement. Utilisée lorsqu\'aucun identifiant n\'est spécifié pour la catégorie ou qu\'il n\'est pas trouvé.';
$string['defaultrole'] = 'Rôle par défaut';
$string['defaultrole_desc'] = 'Rôle devant être attribué par défaut, si aucun autre rôle n\'est spécifié dans la base de données externe.';
$string['ignorehiddencourses'] = 'Ignorer les cours cachés';
$string['ignorehiddencourses_desc'] = 'Si cette option est activée, les utilisateurs ne seront pas inscrits aux cours non disponibles pour les étudiants.';
$string['localcategoryfield'] = 'Champ catégorie locale';
$string['localcoursefield'] = 'Champ cours local';
$string['localrolefield'] = 'Champ rôle local';
$string['localuserfield'] = 'Champ utilisateur local';
$string['newcoursecategory'] = 'Champ catégorie des nouveaux cours';
$string['newcoursefullname'] = 'Champ nom complet des nouveaux cours';
$string['newcourseidnumber'] = 'Champ identifiant des nouveaux cours';
$string['newcourseshortname'] = 'Champ nom abrégé des nouveaux cours';
$string['newcoursetable'] = 'Table des nouveaux cours de la base de données externe';
$string['newcoursetable_desc'] = 'Nom de la table contenant la liste des cours à créer automatiquement. Si le champ n\'est pas renseigné, aucun cours ne sera créé.';
$string['pluginname'] = 'Base de données externe';
$string['pluginname_desc'] = 'Vous pouvez utiliser une base de données externe (presque de n\'importe quel type) pour contrôler les inscriptions. On suppose que la base de données externe comporte au moins un champ contenant l\'identifiant de cours et un champ contenant l\'identifiant de l\'utilisateur. Ces champs sont comparés à ceux que vous choisissez dans les tables de cours et d\'utilisateurs dans la base Moodle.';
$string['remotecoursefield'] = 'Champ cours de la base de données externe';
$string['remotecoursefield_desc'] = 'Nom du champ de la table de la base de données externe utilisé pour comparer les enregistrements de la table de cours.';
$string['remoteenroltable'] = 'Table des inscriptions de la base de données externe';
$string['remoteenroltable_desc'] = 'Nom de la table de la base de données externe contenant la liste des inscriptions des utilisateurs. Si le champ n\'est pas renseigné, aucune synchronisation ne sera effectuée.';
$string['remoterolefield'] = 'Champ rôle de la base de données externe';
$string['remoterolefield_desc'] = 'Nom du champ de la table de la base de données externe utilisé pour comparer les enregistrements de la table des rôles.';
$string['remoteuserfield'] = 'Champ utilisateur de la base de données externe';
$string['remoteuserfield_desc'] = 'Nom du champ de la table de la base de données externe utilisé pour comparer les enregistrements de la table des utilisateurs.';
$string['settingsheaderdb'] = 'Connexion de la base de données externe';
$string['settingsheaderlocal'] = 'Correspondance des champs locaux';
$string['settingsheadernewcourses'] = 'Création de nouveaux cours';
$string['settingsheaderremote'] = 'Synchronisation des inscriptions';
$string['templatecourse'] = 'Modèle des nouveaux cours';
$string['templatecourse_desc'] = 'Option : les cours créés automatiquement peuvent copier leurs réglages sur un cours modèle. Indiquer ici le nom abrégé de ce cours modèle.';
