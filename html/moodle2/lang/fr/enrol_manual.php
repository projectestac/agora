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
 * Strings for component 'enrol_manual', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'Modifier le statut';
$string['altertimeend'] = 'Modifier la date de fin';
$string['altertimestart'] = 'Modifier la date de début';
$string['assignrole'] = 'Attribuer les rôles';
$string['confirmbulkdeleteenrolment'] = 'Voulez-vous vraiment supprimer ces inscriptions d\'utilisateurs ?';
$string['defaultperiod'] = 'Durée par défaut de l\'inscription';
$string['defaultperiod_desc'] = 'Durée par défaut de la période durant laquelle l\'inscription est effective. Si 0 est indiqué, la durée sera illimitée par défaut.';
$string['defaultperiod_help'] = 'Temps par défaut durant lequel l\'inscription est valable, à compter de l\'inscription de l\'utilisateur. Si l\'option est désactivée, la durée est par défaut illimitée.';
$string['deleteselectedusers'] = 'Supprimer les inscriptions sélectionnées';
$string['editenrolment'] = 'Modifier l\'inscription';
$string['editselectedusers'] = 'Modifier les inscriptions sélectionnées';
$string['enrolledincourserole'] = 'Inscrit au cours « {$a->course} » avec le rôle « {$a->role} »';
$string['enrolusers'] = 'Inscrire des utilisateurs';
$string['expiredaction'] = 'Action à l\'échéance de l\'inscription';
$string['expiredaction_help'] = 'Sélectionner une action à effectuer à l\'échéance de l\'inscription des utilisateurs. Veuillez noter que des données utilisateur et des réglages sont effacés du cours lors de la désinscription du cours.';
$string['expirymessageenrolledbody'] = 'Cher-ère {$a->user},

Ce message pour vous informer que votre inscription au cours « {$a->course} » arrivera à échéance le {$a->timeend}.

Si vous avez besoin d\'aide, veuillez contacter {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notification d\'échéance d\'inscription';
$string['expirymessageenrollerbody'] = 'Des inscriptions au cours « {$a->course} » arriveront à échéance durant les {$a->threshold} prochains pour les utilisateurs suivants :

{$a->users}

Pour prolonger leur inscription, veuillez visiter {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notification d\'échéance d\'inscription';
$string['manual:config'] = 'Configurer les instances d\'inscription manuelle';
$string['manual:enrol'] = 'Inscrire des utilisateurs';
$string['manual:manage'] = 'Gérer les inscriptions';
$string['manual:unenrol'] = 'Désinscrire des utilisateurs du cours';
$string['manual:unenrolself'] = 'Se désinscrire du cours';
$string['messageprovider:expiry_notification'] = 'Notifications d\'échéance d\'inscriptions manuelles';
$string['pluginname'] = 'Inscription manuelle';
$string['pluginname_desc'] = 'Le plugin inscription manuelle permet à un utilisateur autorisé, par exemple un enseignant, d\'inscrire manuellement des utilisateurs au moyen d\'un lien dans l\'administration du cours. ce plugin devrait rester activé la plupart du temps. D\'autres plugins, comme l\'auto-inscription peuvent utiliser ce plugin à l\'interne.';
$string['status'] = 'Activer les inscriptions manuelles';
$string['status_desc'] = 'Permettre l\'accès au cours des utilisateurs inscrits manuellement. Ce réglage devrait rester activé dans la plupart des cas.';
$string['statusdisabled'] = 'Désactivé';
$string['statusenabled'] = 'Activé';
$string['status_help'] = 'Ce réglage détermine si des utilisateurs peuvent être inscrits manuellement par un utilisateur disposant des autorisations adéquates, par exemple un enseignant, via un lien dans l\'administration du cours.';
$string['unenrol'] = 'Désinscrire l\'utilisateur';
$string['unenrolselectedusers'] = 'Désinscrire les utilisateurs sélectionnées';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire du cours « {$a} »?';
$string['unenroluser'] = 'Voulez-vous vraiment désinscrire « {$a->user} » du cours « {$a->course} »?';
$string['unenrolusers'] = 'Désinscrire des utilisateurs';
$string['wscannotenrol'] = 'L\'instance de plugin ne peut pas inscrire manuellement un utilisateur dans le cours d\'identifiant {$a->courseid}';
$string['wsnoinstance'] = 'L\'instance du plugin d\'inscription manuelle n\'existe pas ou est désactivée pour ce cours (identifiant {$a->courseid})';
$string['wsusercannotassign'] = 'Vous n\'avez pas les permissions pour attribuer ce rôle ({$a->roleid}) à cet utilisateur ({$a->userid}) dans ce cours ({$a->courseid}).';
