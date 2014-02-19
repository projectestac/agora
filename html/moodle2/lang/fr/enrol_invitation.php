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
 * Strings for component 'enrol_invitation', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_invitation
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Attribuer le rôle';
$string['cannotsendmoreinvitationfortoday'] = 'Plus d’invitation possible pour aujourd\'hui. Essayez plus tard';
$string['defaultrole'] = 'Attribution du rôle par défaut';
$string['defaultrole_desc'] = 'Sélectionnez le rôle qui doit être attribué aux utilisateurs lors de l\'inscription par invitation';
$string['editenrolment'] = 'Modifier l\'inscription';
$string['emailaddressnumber'] = 'Adresse mail {$a}';
$string['emailmessageinvitation'] = '{$a->managername} vous a invité à son cours {$a->fullname}.

Pour y aller, cliquez sur le lien suivant : {$a->enrolurl}

Vous aurez besoin de créer un compte si vous n\'en avez pas encore un.

{$a->sitename}
 -----------------------------
{$a->siteurl}';
$string['emailmessageuserenrolled'] = '{$a->userfullname} a été inscrit au cours {$a->coursefullname}.

Cliquez sur le lien suivant pour vérifier les nouvelles inscriptions : {$a->courseenrolledusersurl}

{$a->sitename}
 -------------
{$a->siteurl}';
$string['emailssent'] = 'Message(s) envoyé(s)';
$string['emailtitleinvitation'] = 'Vous avez été invité(e) à rejoindre le cours {$a->fullname}.';
$string['emailtitleuserenrolled'] = '{$a->userfullname} s\'est inscrit dans le cours {$a->coursefullname}.';
$string['enrolenddate'] = 'Date de fin';
$string['enrolenddate_help'] = 'Si activé, les utilisateurs peuvent être inscrits jusqu\'à cette date seulement.';
$string['enrolenddaterror'] = 'La date de fin d\'inscription ne peut pas être antérieure à la date de début';
$string['enrolperiod'] = 'Durée de l’inscription';
$string['enrolperiod_desc'] = 'Durée de validité de l\'inscription par défaut (en secondes). Si la valeur est à zéro, la durée de validité de l\'inscription sera illimitée par défaut.';
$string['enrolperiod_help'] = 'Durée de validité de l\'inscription, en commençant dès l\'inscription de l\'utilisateur. Si elle est désactivée, la durée d\'inscription sera illimitée.';
$string['enrolstartdate'] = 'Date de début';
$string['enrolstartdate_help'] = 'Si activé, les utilisateurs peuvent être inscrits à partir de cette date seulement.';
$string['expiredtoken'] = 'Donnée invalide - le processus d\'inscription a été arrêté.';
$string['invitationpagehelp'] = '<ul><li> Il vous reste {$a} invitation(s) pour aujourd\'hui. </li><li> Chaque invitation est unique et expire une fois utilisée. </li></ul>';
$string['inviteusers'] = 'Inviter des utilisateurs';
$string['maxinviteerror'] = 'Ce doit être un chiffre';
$string['maxinviteperday'] = 'Nombre maximum d\'invitations par jour';
$string['maxinviteperday_help'] = 'Nombre maximum d\'invitations qui peuvent être envoyées par jour pour ce cours.';
$string['noinvitationinstanceset'] = 'Aucune instance d\'inscription par invitation n\'a été trouvée. Merci d\'ajouter d\'abord une instance d\'inscription par invitation à votre cours.';
$string['nopermissiontosendinvitation'] = 'Vous n\'êtes pas autorisé à envoyer des invitations';
$string['pluginname'] = 'Invitation';
$string['pluginname_desc'] = 'Le module d\'invitation permet d\'envoyer des invitations par courriel. Ces invitations ne peuvent être utilisées qu\'une seule fois. Les utilisateurs cliquent sur le lien transmis dans le courriel et sont automatiquement inscrits au cours.';
$string['status'] = 'Autoriser l\'inscription par invitation';
$string['status_desc'] = 'Autoriser les utilisateurs à inviter des gens à s\'inscrire au cours par défaut.';
$string['unenrol'] = 'Désinscrire l\'utilisateur';
$string['unenrolselfconfirm'] = 'Voulez-vous vraiment vous désinscrire de cours « {$a} » ?';
$string['unenroluser'] = 'Voulez-vous vraiment désinscrire « {$a->user} » du cours « {$a->course} » ?';
