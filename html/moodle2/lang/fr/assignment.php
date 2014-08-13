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
 * Strings for component 'assignment', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   assignment
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Vous avez des devoirs qui requièrent votre attention';
$string['addsubmission'] = 'Remettre un devoir';
$string['allowdeleting'] = 'Permettre la suppression';
$string['allowdeleting_help'] = 'Lorsque ce réglage est activé, les participants pourront à tout moment supprimer leurs fichiers déposés mais avant de les soumettre à l\'évaluation.';
$string['allowmaxfiles'] = 'Nombre maximal de fichiers déposés';
$string['allowmaxfiles_help'] = 'Le nombre maximal de fichiers que chaque participant peut déposer. Ce nombre n\'est pas visible pour les participants ; veuillez donc l\'indiquer dans la description du devoir, le cas échéant.';
$string['allownotes'] = 'Permettre les remarques';
$string['allownotes_help'] = 'Lorsque ce réglage est activé, les participants peuvent saisir des remarques dans une zone de texte, de façon analogue au devoir Texte en ligne.';
$string['allowresubmit'] = 'Permettre plusieurs remises d\'un devoir';
$string['allowresubmit_help'] = 'Si vous activez cette option, les étudiants pourront proposer un nouveau devoir même s\'il a déjà été noté (afin que vous le notiez de nouveau).';
$string['alreadygraded'] = 'Votre devoir a déjà été évalué. Il n\'est pas permis de remettre à nouveau le devoir.';
$string['assignment:addinstance'] = 'Ajouter un devoir';
$string['assignmentdetails'] = 'Détails du devoir';
$string['assignment:exportownsubmission'] = 'Exporter ses propres devoirs remis';
$string['assignment:exportsubmission'] = 'Exporter des devoirs remis';
$string['assignment:grade'] = 'Évaluer un devoir';
$string['assignmentmail'] = '{$a->teacher} a écrit un feedback concernant votre devoir « {$a->assignment} »

Vous pouvez le consulter en annexe à votre devoir :

{$a->url}';
$string['assignmentmailhtml'] = '<p>{$a->teacher} a écrit un feedback concernant votre devoir rendu « <em>{$a->assignment}</em> »</p>
<p>Vous pouvez le consulter en annexe à <a href=\'{$a->url}\'>votre devoir</a>.</p>';
$string['assignmentmailsmall'] = '{$a->teacher} a donné un feedback pour votre devoir remis « {$a->assignment} ». Vous pouvez le voir au-dessous de votre devoir remis';
$string['assignmentname'] = 'Nom du devoir';
$string['assignmentsubmission'] = 'Remises de devoirs';
$string['assignment:submit'] = 'Remettre un devoir';
$string['assignmenttype'] = 'Type du devoir';
$string['assignment:view'] = 'Accéder à un devoir';
$string['availabledate'] = 'Disponible dès le';
$string['cannotdeletefiles'] = 'Une erreur est survenue, qui a empêché la suppression des fichiers';
$string['cannotviewassignment'] = 'Vous ne pouvez pas voir ce devoir';
$string['changegradewarning'] = 'Ce devoir comporte des travaux évalués. La modification de la note ne déclenchera pas automatiquement le calcul des notes existantes. Pour modifier la note, vous devez ré-évaluer tous les travaux remis.';
$string['closedassignment'] = 'Ce devoir est fermé, car la date de remise est passée.';
$string['comment'] = 'Commentaire';
$string['commentinline'] = 'Commentaire dans le texte';
$string['commentinline_help'] = 'Lorsque cette option est sélectionnée, le texte original est copié dans le champ du feedback durant l\'évaluation, ce qui rend plus simple l\'ajout de commentaires dans le texte (avec une couleur différente, par exemple) ou la modification du texte original.';
$string['configitemstocount'] = 'Nature des éléments à compter comme devoirs remis dans les devoirs en ligne.';
$string['configmaxbytes'] = 'Taille maximale par défaut de tous les devoirs du site (sujet aux limites des cours et autres réglages locaux)';
$string['configshowrecentsubmissions'] = 'Tout le monde peut voir les notifications de remises dans les rapports d\'activité récente.';
$string['confirmdeletefile'] = 'Voulez-vous vraiment supprimer le fichier suivant :<br /><strong>{$a}</strong>';
$string['coursemisconf'] = 'Le cours est mal configuré';
$string['currentgrade'] = 'Note actuelle dans le carnet de notes';
$string['deleteallsubmissions'] = 'Supprimer tous les devoirs remis';
$string['deletefilefailed'] = 'Échec de la suppression du fichier.';
$string['description'] = 'Description';
$string['downloadall'] = 'Télécharger tous les devoirs en un fichier ZIP';
$string['draft'] = 'Brouillon';
$string['due'] = 'Délai de remise';
$string['duedate'] = 'À remettre jusqu\'au';
$string['duedateno'] = 'Pas de date de retour';
$string['early'] = 'En avance de {$a}';
$string['editmysubmission'] = 'Modifier mon devoir';
$string['editthesefiles'] = 'Modifier ces fichiers';
$string['editthisfile'] = 'Modifier ce fichier';
$string['emailstudents'] = 'Envoyer aux étudiants les alertes par courriel';
$string['emailteachermail'] = '{$a->username} a modifié son travail remis pour le devoir « {$a->assignment} » le {$a->timeupdated}.

Ce travail est disponible ici :

{$a->url}';
$string['emailteachermailhtml'] = '<p>{$a->username} a modifié son travail remis pour le devoir « <em>{$a->assignment}</em> » le {$a->timeupdated}.</p>
<p>Le travail remis est <a href="{$a->url}">disponible sur le site web</a>.</p>';
$string['emailteachers'] = 'Envoyer aux enseignants les alertes par courriel';
$string['emailteachers_help'] = 'Si cette option est activée, les enseignants reçoivent un bref message lorsque les étudiants ajoutent ou mettent à jour leur devoir en ligne.

Seuls les enseignants ayant l\'autorisation d\'évaluer le travail reçoivent le message. Ainsi, par exemple, si le cours utilise des groupes séparés, les enseignants restreints à un groupe particulier ne reçoivent pas les alertes concernant les étudiants des autres groupes.';
$string['emptysubmission'] = 'Vous n\'avez encore rien remis';
$string['enablenotification'] = 'Envoyer les courriels de notification';
$string['enablenotification_help'] = 'Si cette option est activée, les participants recevront une notification par courriel lorsqu\'ils reçoivent une évaluation ou un feedback ?';
$string['errornosubmissions'] = 'Il n\'y a pas de devoir remis à télécharger';
$string['existingfiledeleted'] = 'Le fichier {$a} a été supprimé';
$string['failedupdatefeedback'] = 'Impossible d\'enregistrer le feedback pour {$a}';
$string['feedback'] = 'Feedback';
$string['feedbackfromteacher'] = 'Feedback de {$a}';
$string['feedbackupdated'] = 'Feedback enregistré pour {$a} utilisateurs';
$string['finalize'] = 'Empêcher la modification des devoirs rendus';
$string['finalizeerror'] = 'Une erreur est survenue, qui a empêché la finalisation de la remise';
$string['futureaassignment'] = 'Ce devoir n\'est plus disponible.';
$string['graded'] = 'Noté';
$string['guestnosubmit'] = 'Désolé, les visiteurs anonymes ne sont pas autorisés à remettre un devoir. Vous devez vous connecter ou vous enregistrer avant de pouvoir remettre votre réponse';
$string['guestnoupload'] = 'Désolé, les visiteurs anonymes ne sont pas autorisés à déposer des fichiers';
$string['helpoffline'] = '<p>Cette option est utile pour une tâche à effectuer en dehors de Moodle, par exemple ailleurs sur le web ou en présentiel.</p> <p>Les étudiants peuvent voir une description de la consigne, mais ne peuvent déposer quoi que ce soit. L\'évaluation fonctionne normalement, et les étudiants reçoivent notification de leur évaluation.</p>';
$string['helponline'] = '<p>Ce type de devoir permet de demander à l\'étudiant d\'écrire un texte à l\'aide d\'outils d\'édition habituels. Les enseignants peuvent évaluer les travaux en ligne, ajouter des commentaires dans le texte ou y effectuer des modifications.</p> <p>(Si vous connaissez bien les versions antérieures de Moodle, vous observerez que ce type de devoir offre la même fonction que l\'ancien module <i>Journal</i>.)</p>';
$string['helpupload'] = '<p>Ce type de devoir permet à chaque participant de déposer un ou plusieurs fichiers de n\'importe quel type.</p><p>Ces fichiers peuvent être par exemple des documents PDF ou Word, ou des images, un site web compressé ou n\'importe quoi d\'autre.</p><p>Ce type de devoir vous permet également de déposer plusieurs fichiers de différents types, comme support de devoir. Ces fichiers peuvent être déposés avant la remise des devoirs, pour permettre par exemple aux participants de travailler chacun sur un fichier différent.</p><p>Les participants peuvent aussi saisir des remarques décrivant les fichiers déposés, leur progression ou tout autre information textuelle.</p><p>Avec ce type de devoir, la remise du devoir doit être validée manuellement par le participant. Vous pouvez revoir l\'état actuel en tout temps. Les devoirs non terminés sont marqués comme Brouillons. Tout devoir non encore évalué peut être remis en état de brouillon.</p>';
$string['helpuploadsingle'] = '<p>Ce type de devoir permet à chaque participant de déposer un fichier de n\'importe quel type.</p> <p>Ce peut être par exemple un document PDF ou Word, ou une image, un site web compressé ou n\'importe quoi d\'autre que vous leur demander de déposer.</p>';
$string['hideintro'] = 'Cacher la description avant la date de disponibilité';
$string['hideintro_help'] = 'Ce réglage, une fois activé, permet de cacher la description du devoir avant sa date de disponibilité.';
$string['invalidassignment'] = 'Devoir non valide';
$string['invalidfileandsubmissionid'] = 'Fichier ou identifiant de travail remis manquant';
$string['invalidid'] = 'Identifiant de devoir non valide';
$string['invalidsubmissionid'] = 'Identifiant de travail remis non valide';
$string['invalidtype'] = 'Type de devoir non valide';
$string['invaliduserid'] = 'Identifiant utilisateur non valide';
$string['itemstocount'] = 'Nombre';
$string['lastgrade'] = 'Dernière note';
$string['late'] = 'En retard de {$a}';
$string['maximumgrade'] = 'Note maximale';
$string['maximumsize'] = 'Taille maximale';
$string['maxpublishstate'] = 'Visibilité maximale de l\'article de blog avant le délai de remise';
$string['messageprovider:assignment_updates'] = 'Notifications devoir (2.2)';
$string['modulename'] = 'Devoir (2.2)';
$string['modulename_help'] = 'Les devoirs permettent à l\'enseignant de proposer aux étudiants une tâche en ligne ou hors ligne, qui pourra être évaluée.';
$string['modulenameplural'] = 'Devoirs (2.2)';
$string['newsubmissions'] = 'Devoirs rendus';
$string['noassignments'] = 'Il n\'y a pas encore de devoir';
$string['noattempts'] = 'Personne n\'a encore fait ce devoir';
$string['noblogs'] = 'Vous n\'avez pas d\'article de blog à remettre !';
$string['nofiles'] = 'Aucun fichier n\'a été remis';
$string['nofilesyet'] = 'Aucun fichier n\'a encore été remis';
$string['nomoresubmissions'] = 'Aucune autre remise n\'est autorisée.';
$string['norequiregrading'] = 'Aucun devoir ne demande d\'évaluation';
$string['nosubmisson'] = 'Aucun devoir n\'a été remis';
$string['notavailableyet'] = 'Ce devoir n\'est pas encore disponible.<br />Les tâches à effectuer seront affichées ici à la date indiquée ci-dessous.';
$string['notes'] = 'Remarques';
$string['notesempty'] = 'Aucune remarque';
$string['notesupdateerror'] = 'Erreur lors de la modification des remarques';
$string['notgradedyet'] = 'Pas encore évalué';
$string['notsubmittedyet'] = 'Pas encore rendu';
$string['onceassignmentsent'] = 'Une fois le devoir validé pour être noté, vous ne pourrez plus ni supprimer, ni joindre aucun fichier. Voulez-vous continuer ?';
$string['operation'] = 'Opération';
$string['optionalsettings'] = 'Réglages optionnels';
$string['overwritewarning'] = 'Attention ! un nouvel envoi remplacera votre devoir déjà remis';
$string['page-mod-assignment-submissions'] = 'Page d\'envoi du module devoir';
$string['page-mod-assignment-view'] = 'Page principale du module devoir';
$string['page-mod-assignment-x'] = 'Toute page du module devoir';
$string['pagesize'] = 'Documents affichés par page';
$string['pluginadministration'] = 'Administration du devoir';
$string['pluginname'] = 'Devoir (2.2)';
$string['popupinnewwindow'] = 'Ouvrir dans une fenêtre surgissante';
$string['preventlate'] = 'Empêcher les remises en retard';
$string['quickgrade'] = 'Permettre évaluation rapide';
$string['quickgrade_help'] = 'Lorsque ce réglage est activé, il est possible d\'évaluer rapidement plusieurs devoirs affichés sur la même page. Modifiez simplement les évaluations et les commentaires, puis utilisez le bouton Enregistrer au bas de la page pour enregistrer d\'un coup toutes les modifications effectuées sur cette page.';
$string['requiregrading'] = 'Nécessite une évaluation';
$string['responsefiles'] = 'Fichiers en retour';
$string['reviewed'] = 'Relu';
$string['saveallfeedback'] = 'Enregistrer tous mes feedbacks';
$string['selectblog'] = 'Sélectionnez l\'article de blog que vous voulez remettre';
$string['sendformarking'] = 'Valider pour évaluation';
$string['showrecentsubmissions'] = 'Afficher les remises récentes';
$string['submission'] = 'Devoir rendu';
$string['submissiondraft'] = 'Brouillon du devoir';
$string['submissionfeedback'] = 'Feedback du devoir';
$string['submissions'] = 'Devoirs rendus';
$string['submissionsaved'] = 'Vos modifications ont été enregistrées';
$string['submissionsnotgraded'] = '{$a} devoirs non notés';
$string['submitassignment'] = 'Déposer votre devoir en utilisant ce formulaire';
$string['submitedformarking'] = 'Le devoir a été déjà remis pour évaluation. Il ne peut plus être modifié';
$string['submitformarking'] = 'Valider le devoir pour évaluation';
$string['submitted'] = 'Devoir rendu';
$string['submittedfiles'] = 'Fichiers remis';
$string['subplugintype_assignment'] = 'Type du devoir';
$string['subplugintype_assignment_plural'] = 'Types de devoir';
$string['trackdrafts'] = 'Activer l\'envoi pour évaluation';
$string['trackdrafts_help'] = 'Le bouton « Envoyer pour évaluation » permet aux participants d\'indiquer à l\'enseignant qu\'ils ont terminé le travail à effectuer. L\'enseignant peut décider de remettre le devoir dans l\'état de brouillon, s\'il estime qu\'il nécessite encore du travail.';
$string['typeblog'] = 'Article de blog';
$string['typeoffline'] = 'Activité hors ligne';
$string['typeonline'] = 'Texte en ligne';
$string['typeupload'] = 'Dépôt avancé de fichiers';
$string['typeuploadsingle'] = 'Déposer un fichier';
$string['unfinalize'] = 'Retour à l\'état de brouillon';
$string['unfinalizeerror'] = 'Une erreur est survenue, qui a empêché le retour à l\'état de brouillon';
$string['unfinalize_help'] = 'Repasser en mode brouillon permet au participant de continuer à modifier le devoir remis';
$string['unsupportedsubplugin'] = 'Le type de devoir « {$a} » n\'est actuellement pas supporté. Vous pouvez soit attendre que ce type de devoir soit rendu disponible, soit supprimer le devoir.';
$string['upgradenotification'] = 'Cette activité est basée sur un ancien module de devoir.';
$string['uploadafile'] = 'Déposer un fichier';
$string['uploadbadname'] = 'Ce nom de fichier contient d\'étranges caractères. Il ne peut être déposé';
$string['uploadedfiles'] = 'fichiers déposés';
$string['uploaderror'] = 'Une erreur est survenue lors de l\'enregistrement du fichier sur le serveur';
$string['uploadfailnoupdate'] = 'Le fichier a été correctement déposé, mais il n\'a pas été possible de mettre à jour votre devoir !';
$string['uploadfiles'] = 'Déposer des fichiers';
$string['uploadfiletoobig'] = 'Désolé, la taille de ce fichier est trop grande (taille maximale : {$a} octets)';
$string['uploadnofilefound'] = 'Aucun fichier n\'a été trouvé. En avez-vous vraiment choisi un à déposer ?';
$string['uploadnotregistered'] = '« {$a} » a été correctement déposé, mais votre devoir n\'a pu être enregistré !';
$string['uploadsuccess'] = '« {$a} » a été correctement déposé';
$string['usermisconf'] = 'L\'utilisateur est mal configuré';
$string['usernosubmit'] = 'Vous n\'avez pas l\'autorisation de remettre un devoir.';
$string['viewassignmentupgradetool'] = 'Afficher l\'outil de mise à jour des devoirs';
$string['viewfeedback'] = 'Afficher les évaluations et feedbacks des devoirs';
$string['viewmysubmission'] = 'Afficher mon devoir rendu';
$string['viewsubmissions'] = 'Afficher les {$a} devoirs rendus';
$string['yoursubmission'] = 'Votre devoir';
