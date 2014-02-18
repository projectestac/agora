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
 * Strings for component 'block_quickmail', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   block_quickmail
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Actions';
$string['add_all'] = 'Ajouter tous';
$string['add_button'] = 'Ajouter';
$string['allowstudents'] = 'Autoriser les étudiants à utiliser Courriel';
$string['all_sections'] = 'Dans tous les groupes';
$string['alternate'] = 'Adresses secondaires';
$string['alternate_body'] = '<p>
{$a->fullname} a ajouté {$a->address} comme adresse secondaire pour le cours {$a->course}.
</p>

<p>
Ce message a pour but de vérifier la validité de cette adresse, et si le destinataire a les droits nécessaires sur la plateforme.
</p>

<p>
Si vous souhaitez terminer le processus de validation, merci de cliquer sur le lien suivant :<br> {$a->url}.
</p>

<p>
Si le contenu de ce message n\'a aucun sens pour vous, c\'est qu\'il a été envoyé par erreur. Merci d\'ignorer simplement ce message.
</p>

Cordialement.';
$string['alternate_from'] = 'Moodle : Courriel';
$string['alternate_new'] = 'Ajouter des adresses secondaires';
$string['alternate_subject'] = 'Vérification de l\'adresse secondaire';
$string['approved'] = 'Validé';
$string['are_you_sure'] = 'Etes-vous sûr de supprimer {$a->title} ? Cette action est irreversible !';
$string['attachment'] = 'Pièce(s) jointe(s)';
$string['backup_history'] = 'Inclure l\'historie Courriel';
$string['composenew'] = 'Ecrire un nouveau message';
$string['config'] = 'Configuration';
$string['courseferpa'] = 'Respecte le mode du cours';
$string['courselayout'] = 'Mise en forme dans le cours';
$string['courselayout_desc'] = 'Utiliser le mode édition pour le positionnement du bloc Courriel dans les pages du cours. Activez ce paramètre si vous utilisez un style Moodle à largeur fixe.';
$string['default_flag'] = 'Par défaut';
$string['delete_confirm'] = 'Êtes-vous sûr de vouloir supprimer le message avec les détails suivants : {$a}';
$string['delete_failed'] = 'Impossible de supprimer le message';
$string['download_all'] = 'Tout télécharger';
$string['drafts'] = 'Voir les brouillons';
$string['email'] = 'Message';
$string['entry_activated'] = 'L\'adresse secondaire {$a->address} peut être désormais utilisée dans le cours {$a->course}.';
$string['entry_failure'] = 'Un message ne peut être envoyé à {$a->address}. Merci de vérifier que l\'adresse {$a->address} existe, et essayez à nouveau.';
$string['entry_key_not_valid'] = 'Le lien d\'activation pour {$a->address} n\'est plus valide. Renvoyer un nouveau lien d\'activation.';
$string['entry_saved'] = 'L\'adresse secondaire {$a->address} a été enregistrée.';
$string['entry_success'] = 'Un message pour vérifier la validité de l\'adresse a été envoyé à {$a->address}. Merci de lire les instructions présentes dans ce message pour l\'activation.';
$string['ferpa'] = 'Mode FERPA';
$string['ferpa_desc'] = 'Permet au système de prendre en compte soit le réglage des groupes du cours, soit en ignorant les réglage des groupes mais en faisant des groupes séparés, soit en ignorant la notion de groupe du cours.
<br>FERPA : Family Educational Rights and Privacy Act';
$string['from'] = 'De';
$string['history'] = 'Voir l\'historique';
$string['log'] = 'Voir l\'historique';
$string['message'] = 'Message';
$string['moodle_attachments'] = 'Pièce jointe ({$a})';
$string['no_alternates'] = 'Pas d\'adresse secondaire de trouvée pour {$a->fullname}. Poursuivre la création.';
$string['no_course'] = 'Id du cours {$a} invalide';
$string['no_drafts'] = 'Vous n\'avez pas de brouillon.';
$string['no_email'] = 'Pas d\'envoi possible à {$a->firstname} {$a->lastname}.';
$string['noferpa'] = 'Pas de respect de groupe';
$string['no_filter'] = 'Pas de filtre';
$string['no_log'] = 'Vous n\'avez pas d\'historique.';
$string['no_permission'] = 'Vous n\'êtes pas autorisé à envoyer des messages avec Courriel.';
$string['no_section'] = 'Dans aucun groupe';
$string['no_selected'] = 'Vous devez sélectionner au moins un utilisateur pour envoyer un message.';
$string['no_subject'] = 'Vous devez mettre un objet à votre message';
$string['not_valid'] = 'Ce n\'est pas un type de message valide : {$a}';
$string['not_valid_action'] = 'Vous devez faire une action valide : {$a}';
$string['not_valid_typeid'] = 'Vous devez fournir une adresse valide pour {$a}';
$string['not_valid_user'] = 'Vous ne pouvez pas afficher d\'autre historique.';
$string['no_type'] = '{$a} n\'est pas dans une vue acceptable. Merci d\'utiliser une application adaptée.';
$string['no_usergroups'] = 'Il n\'y a pas d\'utilisateurs dans votre groupe capable d\'envoyer un message.';
$string['no_users'] = 'Il n\'y a pas d\'utilisateur capable d\'envoyer des messages.';
$string['overwrite_history'] = 'Écraser l\'historique Courriel';
$string['pluginname'] = 'Courriel';
$string['potential_sections'] = 'Groupes possibles';
$string['potential_users'] = 'Destinataires possibles';
$string['prepend_class'] = 'Nom du cours dans l\'objet';
$string['prepend_class_desc'] = 'Ajoute l\'identification du cours dans l\'objet du message.';
$string['qm_contents'] = 'Télécharger le contenu du fichier';
$string['quickmail:addinstance'] = 'Ajouter un nouveau bloc Courriel';
$string['quickmail:allowalternate'] = 'Autoriser les utilisateurs à ajouter une adresse secondaire pour les cours.';
$string['quickmail:canconfig'] = 'Autorise les utilisateurs à configurer l\'instance de Courriel.';
$string['quickmail:candelete'] = 'Autorise les utilisateurs à supprimer des messages de leur historique.';
$string['quickmail:canimpersonate'] = 'Autorise les utilisateurs à se connecter en tant qu\'un autre utilisateur et à voir l\'historique.';
$string['quickmail:cansend'] = 'Autorise les utilisateurs à envoyer des messages par le biais de Courriel.';
$string['receipt'] = 'Recevoir une copie';
$string['receipt_help'] = 'Recevoir une copie du message envoyé';
$string['remove_all'] = 'Tout supprimer';
$string['remove_button'] = 'Supprimer';
$string['required'] = 'Merci de remplir les champs obligatoires.';
$string['reset'] = 'Restaurer les paramètres par défaut';
$string['restore_history'] = 'Restaurer l\'historique Courriel';
$string['role_filter'] = 'Filtrer par rôle';
$string['save_draft'] = 'Enregistrer le brouillon';
$string['selected'] = 'Destinataires sélectionnés';
$string['select_groups'] = 'Sélectionner les groupes...';
$string['select_roles'] = 'Rôles à filtrer';
$string['select_users'] = 'Sélectionner les utilisateurs...';
$string['send_email'] = 'Envoyer le message';
$string['sig'] = 'Signature';
$string['signature'] = 'Signatures';
$string['strictferpa'] = 'Groupes séparés permanent';
$string['subject'] = 'Objet';
$string['sure'] = 'Etes-vous sûr de supprimer {$a->address} ? Cette action ne peut être annulée.';
$string['title'] = 'Titre';
$string['valid'] = 'Statut d\'activation';
$string['waiting'] = 'En attente';
