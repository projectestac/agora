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
 * Strings for component 'enrol_self', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'Seuls les membres de la cohorte {$a} peuvent s\'inscrire eux-mêmes.';
$string['cohortonly'] = 'Seulement les membres de la cohorte';
$string['cohortonly_help'] = 'L\'auto-inscription peut être restreinte aux seuls membres d\'une cohorte spécifique. La modification de ce réglage n\'a pas d\'effet sur les inscriptions existantes.';
$string['customwelcomemessage'] = 'Message de bienvenue personnalisé';
$string['customwelcomemessage_help'] = 'Un message d\'accueil personnalisé peut être ajouté en texte pur ou avec des balises HTML et en syntaxe multilingue.

Les paramètres suivants peuvent être inclus dans le message :

* nom du cours {$a->coursename}
* lien vers le profil de l\'utilisateur {$a->profileurl}';
$string['defaultrole'] = 'Rôle attribué par défaut';
$string['defaultrole_desc'] = 'Sélectionner le rôle à attribuer aux utilisateurs lors de l\'auto-inscription';
$string['editenrolment'] = 'Modifier l\'inscription';
$string['enrolenddate'] = 'Date de fin';
$string['enrolenddate_help'] = 'Si ce réglage est activé, les utilisateurs peuvent s\'inscrire jusqu\'à cette date seulement.';
$string['enrolenddaterror'] = 'La date de la fin de l\'inscription ne peut être antérieure à celle du début';
$string['enrolme'] = 'M\'inscrire';
$string['enrolperiod'] = 'Durée d\'inscription';
$string['enrolperiod_desc'] = 'Durée par défaut de la période durant laquelle l\'inscription est effective. Si 0 est indiqué, la durée sera illimitée par défaut.';
$string['enrolperiod_help'] = 'Temps durant lequel l\'inscription est valable, à compter de l\'inscription de l\'utilisateur. Si l\'option est désactivée, la durée est illimitée.';
$string['enrolstartdate'] = 'Date de début';
$string['enrolstartdate_help'] = 'Si ce réglage est activé, les utilisateurs peuvent s\'inscrire à partir de cette date seulement.';
$string['expiredaction'] = 'Action à l\'échéance de l\'inscription';
$string['expiredaction_help'] = 'Sélectionner une action à effectuer à l\'échéance de l\'inscription des utilisateurs. Veuillez noter que des données utilisateur et des réglages sont effacés du cours lors de la désinscription du cours.';
$string['expirymessageenrolledbody'] = 'Cher {$a->user},

Ce message est une notification de la prochaine échéance le {$a->timeend} de votre inscription au cours « {$a->course} ».

Si vous avez besoin d\'aide, veuillez contacter {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notification d\'échéance d\'auto-inscription';
$string['expirymessageenrollerbody'] = 'L\'auto-inscription dans le cours « {$a->course} » arrivera à échéance dans {$a->threshold} pour les utilisateurs suivants :

{$a->users}

Pour prolonger leur inscription, visitez {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notification d\'échéance d\'auto-inscription';
$string['groupkey'] = 'Utiliser les clefs d\'inscription aux groupes';
$string['groupkey_desc'] = 'Utiliser par défaut les clefs d\'inscription aux groupes';
$string['groupkey_help'] = 'En plus de restreindre l\'accès au cours aux seuls utilisateurs qui connaissent la clef, l\'utilisation d\'une clef d\'inscription de groupe permet d\'ajouter automatiquement les utilisateurs à un groupe lors de leur inscription au cours.

Pour utiliser une clef d\'inscription de groupe, une clef d\'inscription doit être indiquée dans les réglages du cours, ainsi qu\'une clef d\'inscription de groupe dans les réglages du groupe.';
$string['longtimenosee'] = 'Inscription inactive après';
$string['longtimenosee_help'] = 'Si un participant ne visite pas un cours durant ce laps de temps, il est automatiquement désinscrit de ce cours.';
$string['maxenrolled'] = 'Nombre maximum d\'utilisateurs inscrits';
$string['maxenrolled_help'] = 'Spécifie le nombre maximum d\'utilisateurs pouvant s\'inscrire. Le nombre 0 signifie aucune limite.';
$string['maxenrolledreached'] = 'Le nombre maximum d\'utilisateurs autorisés à s\'inscrire eux-mêmes est atteint.';
$string['messageprovider:expiry_notification'] = 'Notifications d\'échéance d\'auto-inscription';
$string['nopassword'] = 'Aucune clef d\'inscription requise.';
$string['password'] = 'Clef d\'inscription';
$string['password_help'] = 'Une clef d\'inscription permet de restreindre l\'accès au cours aux seuls utilisateurs qui connaissent la clef.

Si le champ n\'est pas renseigné, n\'importe qui peut s\'inscrire au cours.

Si une clef d\'inscription est spécifiée, les utilisateurs tentant de s\'inscrire au cours devront saisir cette clef, uniquement lors de leur premier accès au cours.';
$string['passwordinvalid'] = 'Clef d\'inscription incorrecte. Veuillez réessayer';
$string['passwordinvalidhint'] = 'Cette clef d\'inscription est incorrecte, veuillez réessayer<br />(La clef commence par « {$a} ».)';
$string['pluginname'] = 'Auto-inscription';
$string['pluginname_desc'] = 'Le plugin d\'auto-inscription permet aux utilisateurs de choisir les cours qu\'ils veulent suivre. Les cours peuvent être protégés par une clef d\'inscription. À l\'interne, l\'inscription est effectuée au moyen du plugin inscription manuelle, qui doit être activé pour le même cours.';
$string['requirepassword'] = 'Exiger la clef d\'inscription';
$string['requirepassword_desc'] = 'Exiger la clef d\'inscription dans les nouveaux cours et empêcher la suppression de la clef d\'inscription des cours existants.';
$string['role'] = 'Rôle attribué par défaut';
$string['self:config'] = 'Configurer les instances d\'auto-inscription';
$string['self:manage'] = 'Gérer les utilisateurs inscrits';
$string['self:unenrol'] = 'Désinscrire du cours les utilisateurs';
$string['self:unenrolself'] = 'Se désinscrire du cours';
$string['sendcoursewelcomemessage'] = 'Envoyer un message de bienvenue';
$string['sendcoursewelcomemessage_help'] = 'Si ce réglage est activé, les utilisateurs recevront un message de bienvenue par courriel après qu\'ils se sont inscrits dans un cours.';
$string['showhint'] = 'Afficher l\'indice';
$string['showhint_desc'] = 'Afficher la première lettre de la clef d\'inscription.';
$string['status'] = 'Permettre l\'auto-inscription';
$string['status_desc'] = 'Permettre par défaut aux utilisateurs de s\'inscrire eux-mêmes dans les cours.';
$string['status_help'] = 'Ce réglage détermine si un utilisateur peut s\'inscrire lui-même (et se désinscrire s\'il dispose de l\'autorisation appropriée) dans un cours.';
$string['unenrol'] = 'Désinscrire l\'utilisateur';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire du cours « {$a} »?';
$string['unenroluser'] = 'Voulez.vous vraiment désinscrire « {$a->user} » du cours « {$a->course} »?';
$string['usepasswordpolicy'] = 'Utiliser les règles de mots de passe';
$string['usepasswordpolicy_desc'] = 'Utiliser pour les mots de passe d\'accès anonyme les règles de mots de passe standard.';
$string['welcometocourse'] = 'Bienvenue sur {$a}';
$string['welcometocoursetext'] = 'Bienvenue au cours « {$a->coursename} » !

Si vous ne l\'avez pas encore fait, veuillez modifier et compléter votre profil :
{$a->profileurl}

Bon travail dans ce cours !';
