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
 * Strings for component 'enrol_imsenterprise', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Une fois ces réglages enregistrés, vous voudrez peut-être';
$string['allowunenrol'] = 'Permettre aux données IMS de <strong>désinscrire</strong> les participants';
$string['allowunenrol_desc'] = 'Si ce réglage est activé, les inscriptions aux cours seront retirées lorsque spécifié dans les données IMS Enterprise.';
$string['basicsettings'] = 'Réglages de base';
$string['coursesettings'] = 'Options cours';
$string['createnewcategories'] = 'Créer de nouvelles catégories de cours (cachées) si inexistantes dans Moodle';
$string['createnewcategories_desc'] = 'Si l\'élément <org><orgunit> est présent dans les données arrivant pour un cours, son contenu sera utilisé pour indiquer une catégorie, si le cours doit être créé à partir de rien. Le plugin ne modifiera pas la catégorie des cours déjà existants.

Si aucune catégorie du nom désiré n\'existe, une catégorie cachée portant ce nom sera créée.';
$string['createnewcourses'] = 'Créer de nouveaux cours (cachés) si inexistants dans Moodle';
$string['createnewcourses_desc'] = 'Si ce réglage est activé, le plugin IMS Enterprise peut créer de nouveaux cours pour ceux qui se trouvent dans les données IMS mais pas dans la base de données de Moodle. Tous les cours générés sont cachés lors de leur création.';
$string['createnewusers'] = 'Créer des comptes utilisateur pour les utilisateurs pas encore enregistrés dans Moodle';
$string['createnewusers_desc'] = 'Les données d\'inscription IMS Enterprise décrivent un ensemble d\'utilisateurs.  Si ce réglage est activé, les comptes utilisateurs peuvent être créés automatiquement pour tous les utilisateurs qui ne sont pas trouvés dans la base de données de Moodle.

On recherche dans la base de données les utilisateurs dans un premier temps d\'après leur identifiant (« idnumber »), puis par leur nom d\'utilisateur Moodle. Les mots de passe ne sont pas importés par le plugin d\'inscription IMS Enterprise. Il est recommandé d\'utiliser les plugins d\'authentification de Moodle pour authentifier les utilisateurs.';
$string['cronfrequency'] = 'Fréquence de traitement';
$string['deleteusers'] = 'Supprimer les comptes utilisateurs comme spécifié dans les données IMS';
$string['deleteusers_desc'] = 'Si ce réglage est activé, les données d\'inscription IMS Enterprise peuvent spécifier la suppression des comptes utilisateurs (si le champ « recstatus » a la valeur 3, qui représente la suppression d\'un compte). Comme cela est le standard de Moodle, le compte n\'est en fait pas supprimé de la base de données de Moodle, mais une valeur est attribuée à un paramètre pour indiquer que le compte est détruit.';
$string['doitnow'] = 'effectuer immédiatement une importation IMS Enterprise';
$string['filelockedmail'] = 'Le fichier texte utilisé pour les inscriptions basées sur un fichier IMS ({$a}) ne peut pas être supprimé par le script cron. Cela signifie habituellement que les droits d\'accès sont mal réglés. Veuillez corriger les droits d\'accès de telle sorte que Moodle puisse effacer le fichier, sans quoi il sera traité de façon répétitive.';
$string['filelockedmailsubject'] = 'Erreur important : fichier d\'inscription';
$string['fixcasepersonalnames'] = 'Mettre en majuscules les initiales des noms réels';
$string['fixcaseusernames'] = 'Mettre les noms d\'utilisateur en minuscules';
$string['ignore'] = 'Ignorer';
$string['importimsfile'] = 'Importer fichier IMS Enterprise';
$string['imsrolesdescription'] = 'La spécification IMS Enterprise inclut 8 types de rôles distincts. Veuillez choisir comment vous désirez que ces rôles soient attribués dans Moodle, y compris ceux que vous désirez ignorer.';
$string['location'] = 'Emplacement du fichier';
$string['logtolocation'] = 'Emplacement de l\'historique d\'importation (vide pour ne pas avoir d\'historique)';
$string['mailadmins'] = 'Informer l\'administrateur par courriel';
$string['mailusers'] = 'Informer les utilisateurs par courriel';
$string['messageprovider:imsenterprise_enrolment'] = 'Messages de l\'inscription IMS Enterprise';
$string['miscsettings'] = 'Divers';
$string['pluginname'] = 'Fichier IMS Enterprise';
$string['pluginname_desc'] = 'Ce plugin d\'inscription vérifie l\'existence d\'un fichier texte spécialement formaté dans un endroit que vous spécifiez et le traite. Le fichier doit suivre les spécifications IMS Enterprise et contenir les éléments XML person, group et membership.';
$string['processphoto'] = 'Ajouter la photo de l\'utilisateur à son profil';
$string['processphotowarning'] = 'Attention ! Le traitement des images est susceptible de charger le serveur de façon significative. Nous vous recommandons de n\'activer pas cette option si un grand nombre d\'étudiants doit être traité.';
$string['restricttarget'] = 'Ne traiter les données que si la cible suivante est spécifiée';
$string['restricttarget_desc'] = 'Un fichier de données IMS Enterprise peut être destiné à plusieurs « cibles », c\'est-à-dire plusieurs logiciel d\'apprentissage à distance ou systèmes dans une école ou université. Il est possible d\'indiquer dans le fichier IMS Enterprise que les données sont destinées à un ou plusieurs systèmes cibles, en les nommant dans des balises <target> contenues dans une balise <properties>.

Dans de nombreux cas, il n\'est pas nécessaire de vous occuper de cela. Laissez les réglages vides et Moodle traitera toujours le fichier, qu\'une cible soit ou non spécifiée dans le fichier. Dans le cas contraire, tapez exactement le nom qui sera inscrit dans la balise <target>.';
$string['roles'] = 'Rôles';
$string['sourcedidfallback'] = 'Utiliser le « sourcedid » comme identifiant pour les personnes dont le champ « userid » est introuvable';
$string['sourcedidfallback_desc'] = 'Dans les données IMS, le champ <sourcedid> représente un identifiant persistant d\'une personne dans le système source. Le champ <userid> est un champ séparé pouvant contenir l\'identifiant utilisé par l\'utilisateur lors de ses connexions. Dans de nombreux cas, ces deux identifiants sont les mêmes, mais pas toujours.

Certains systèmes d\'information scolaire ne peuvent pas exporter correctement le champ <userid>. Dans un tel cas, veuillez activer ce réglage pour permettre l\'utilisation de <sourcedid> comme identifiant de l\'utilisateur dans Moodle. Dans le cas contraire, veuillez laisser ce réglage désactivé.';
$string['truncatecoursecodes'] = 'Tronquer les codes de cours à cette longueur';
$string['truncatecoursecodes_desc'] = 'Dans certaines situations, il peut y avoir des codes de cours que vous désirez tronquer à une longueur fixe avant le traitement des données. Dans ce cas, tapez le nombre de caractères désirés dans ce champ. Sinon, laissez le champ vide et aucune troncature ne sera effectuée.';
$string['usecapitafix'] = 'Cocher cette case lors de l\'utilisation de « Capita » (leur format XML n\'est pas tout à fait correct)';
$string['usecapitafix_desc'] = 'Le système de données produit par Capita comporte un légère erreur dans son format de sortie XML. Si vous utilisez Capita, veuillez activer cette option. Dans le cas contraire, laissez-la décochée.';
$string['usersettings'] = 'Options utilisateurs';
$string['zeroisnotruncation'] = '0 indique pas de troncature';
