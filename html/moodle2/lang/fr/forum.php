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
 * Strings for component 'forum', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   forum
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Il y a de nouveaux messages de forum';
$string['addanewdiscussion'] = 'Ajouter une discussion';
$string['addanewquestion'] = 'Ajouter une nouvelle question';
$string['addanewtopic'] = 'Ajouter un nouveau sujet';
$string['advancedsearch'] = 'Recherche avancée';
$string['allforums'] = 'Tous les forums';
$string['allowdiscussions'] = 'Les interventions sont-elles autorisées dans ce forum pour {$a} ?';
$string['allowsallsubscribe'] = 'Tout le monde peut choisir de s\'abonner ou non à ce forum';
$string['allowsdiscussions'] = 'Tout le monde peut lancer une nouvelle discussion dans ce forum';
$string['allsubscribe'] = 'S\'abonner à tous les forums';
$string['allunsubscribe'] = 'Se désabonner de tous les forums';
$string['alreadyfirstpost'] = 'Ce message est déjà le premier de la discussion';
$string['anyfile'] = 'Tout fichier';
$string['areaattachment'] = 'Annexes';
$string['areapost'] = 'Messages';
$string['attachment'] = 'Annexe';
$string['attachment_help'] = '<!-- $Id$ -->


<p>Il vous est possible de joindre un ou plusieurs fichiers (le nombre dépend des réglages du forum) de votre ordinateur à chaque message que vous postez dans un forum.</p>

<p>Ceci s\'avère particulièrement utile lorsque vous souhaitez partager une image ou un document avec les autres participants du cours.</p>

<p>Ce fichier peut être de n\'importe quel type. Il est cependant fortement recommandé que son nom utilise la convention des 3 lettres d\'extension utilisée sur Internet, par exemple « <b>.doc</b> » pour un document Word, « <b>.jpg</b> » ou « <b>.png</b> » pour une image, « <b>.zip</b> » pour un fichier compressé, etc. Cela facilitera le téléchargement et l\'ouverture de ce document dans le navigateur des utilisateurs.</p>';
$string['attachmentnopost'] = 'Vous ne pouvez pas exporter les annexes sans identifiant de message';
$string['attachments'] = 'Annexes';
$string['attachmentswordcount'] = 'Annexes et nombre de mots';
$string['blockafter'] = 'Nombre maximal de messages';
$string['blockafter_help'] = 'Ce réglage définit le nombre maximal de messages qu\'un participant peut poster durant une période donnée. Les utilisateurs ayant la capacité mod/forum:postwithoutthrottling ne sont pas touchés par les limites de message.';
$string['blockperiod'] = 'Durée de blocage';
$string['blockperioddisabled'] = 'Ne pas bloquer';
$string['blockperiod_help'] = 'Il est possible d\'empêcher des participants de poster des messages après qu\'ils en ont écrits un certain nombre durant une période donnée. Les utilisateurs ayant la capacité mod/forum:postwithoutthrottling ne sont pas touchés par les limites de message.';
$string['blogforum'] = 'Forum standard affiché comme un blog';
$string['bynameondate'] = 'par {$a->name}, {$a->date}';
$string['cannotadd'] = 'Impossible d\'ajouter la discussion dans ce forum';
$string['cannotadddiscussion'] = 'Pour créer une discussion dans ce forum, vous devez être membre d\'un groupe.';
$string['cannotadddiscussionall'] = 'Vous n\'avez pas les droits d\'accès requis pour lancer une nouvelle discussion pour tous les participants.';
$string['cannotaddsubscriber'] = 'Impossible d\'abonner à ce forum l\'utilisateur d\'identifiant {$a} !';
$string['cannotaddteacherforumto'] = 'Impossible d\'ajouter le forum des enseignants converti à la section 0 du cours';
$string['cannotcreatediscussion'] = 'Impossible de créer une nouvelle discussion';
$string['cannotcreateinstanceforteacher'] = 'Impossible de créer une nouvelle instance de module de cours pour le forum des enseignants';
$string['cannotdeletepost'] = 'Vous ne pouvez pas supprimer ce message !';
$string['cannoteditposts'] = 'Vous ne pouvez pas modifier les messages d\'autres participants !';
$string['cannotfinddiscussion'] = 'Impossible de trouver cette discussion dans ce forum';
$string['cannotfindfirstpost'] = 'Impossible de trouver le premier message de ce forum';
$string['cannotfindorcreateforum'] = 'Impossible de trouver ou de créer le forum de nouvelles principal pour ce site';
$string['cannotfindparentpost'] = 'Impossible de trouver le parent ultime du message {$a}';
$string['cannotmovefromsingleforum'] = 'Impossible de déplacer une discussion depuis un forum avec une seule discussion';
$string['cannotmovenotvisible'] = 'Forum non visible';
$string['cannotmovetonotexist'] = 'Vous ne pouvez pas déplacer vers ce forum, qui n\'existe pas !';
$string['cannotmovetonotfound'] = 'Le forum de destination n\'a pas été trouvé dans ce cours.';
$string['cannotmovetosingleforum'] = 'Impossible de déplacer une discussion vers un forum avec une discussion simple';
$string['cannotpurgecachedrss'] = 'Impossible de purger le flux RSS en cache pour le forum source et/ou destination. Veuillez vérifier votre fichier permissionsforums';
$string['cannotremovesubscriber'] = 'Impossible de désabonner de ce forum l\'utilisateur d\'identifiant {$a} !';
$string['cannotreply'] = 'Vous ne pouvez pas répondre à ce message';
$string['cannotsplit'] = 'Les discussions de ce forum ne peuvent pas être séparées';
$string['cannotsubscribe'] = 'Vous devez être un membre du groupe pour vous abonner.';
$string['cannottrack'] = 'Impossible de stopper le suivi des messages de ce forum';
$string['cannotunsubscribe'] = 'Vous ne pouvez pas vous désabonner de ce forum';
$string['cannotupdatepost'] = 'Vous ne pouvez pas modifier ce message';
$string['cannotviewpostyet'] = 'Vous ne pouvez pas lire les questions des autres étudiants, car vous n\'avez pas encore écrit de message';
$string['cannotviewusersposts'] = 'Il n\'y a aucun message de cet utilisateur que vous puissiez consulter.';
$string['cleanreadtime'] = 'Heure de nettoyage des messages lus';
$string['completiondiscussions'] = 'Le participant doit créer des discussions :';
$string['completiondiscussionsgroup'] = 'Discussions requises';
$string['completiondiscussionshelp'] = 'discussions requises pour terminer';
$string['completionposts'] = 'Le participant doit écrire des messages ou des réponses :';
$string['completionpostsgroup'] = 'Messages requis';
$string['completionpostshelp'] = 'discussions ou réponses requises pour terminer';
$string['completionreplies'] = 'Le participant doit écrire des réponses :';
$string['completionrepliesgroup'] = 'Réponses requises';
$string['completionreplieshelp'] = 'réponses requises pour terminer';
$string['configcleanreadtime'] = 'L\'heure à laquelle nettoyer les anciens messages de la table des messages lus.';
$string['configdigestmailtime'] = 'Les utilisateurs désirant recevoir un courriel contenant tous les messages des forums le recevront quotidiennement. Ce réglage détermine l\'heure de la journée à laquelle le courriel sera envoyé (la tâche cron s\'exécutant immédiatement après cette heure enverra le message).';
$string['configdisplaymode'] = 'Mode d\'affichage par défaut des discussions';
$string['configenablerssfeeds'] = 'Cette option permet l\'activation des flux RSS pour tous les forums. Il est en outre nécessaire d\'activer manuellement les flux RSS dans les réglages de chaque forum.';
$string['configenabletimedposts'] = 'Cette option permet l\'activation des périodes d\'affichage lors de l\'écriture de nouvelles discussions dans les forums (fonctionnalité expérimentale)';
$string['configlongpost'] = 'Tout message dépassant cette longueur (nombre de caractères, code HTML non compris) est considéré comme long message. L\'affichage des messages sur la page d\'accueil du site, sur la page des cours en format informel et dans le profil des utilisateurs est tronqué à un endroit adéquat, entre les valeurs forum_shortpost et forum_longpost.';
$string['configmanydiscussions'] = 'Nombre maximal de discussions affichées sur une page';
$string['configmaxattachments'] = 'Nombre maximal d\'annexes permises par message.';
$string['configmaxbytes'] = 'Taille maximale des annexes des forums (cette taille dépend par ailleurs des limites définies au niveau du cours et d\'autres réglages locaux)';
$string['configoldpostdays'] = 'Nombre de jours après lequel tout message est considéré comme lu.';
$string['configreplytouser'] = 'Lorsqu\'un message est envoyé par courriel, doit-il contenir l\'adresse de courriel de son auteur, afin que le destinataire puisse l\'atteindre personnellement ? Même lorsque cette option est activée, les utilisateurs peuvent choisir dans leur profil de garder leur adresse secrète.';
$string['configshortpost'] = 'Tout message plus court que cette longueur (nombre de caractères, code HTML non compris) est considéré comme message court (voir ci-dessous).';
$string['configtrackingtype'] = 'Réglage par défaut du suivi des messages.';
$string['configtrackreadposts'] = 'Choisissez « Oui » pour activer le suivi des messages pour chaque utilisateur.';
$string['configusermarksread'] = 'Si « Oui », l\'utilisateur doit marquer manuellement un message comme lu. Si « Non », le message est automatiquement marqué comme lu après sa lecture.';
$string['confirmsubscribe'] = 'Voulez-vous vraiment vous abonner au forum « {$a} »?';
$string['confirmunsubscribe'] = 'Voulez-vous vraiment vous désabonner du forum « {$a} »?';
$string['couldnotadd'] = 'Impossible d\'ajouter votre message à cause d\'une erreur indéterminée';
$string['couldnotdeletereplies'] = 'Désolé, la suppression n\'est plus possible car quelqu\'un a déjà répondu';
$string['couldnotupdate'] = 'Impossible de modifier votre message à cause d\'une erreur inconnue';
$string['delete'] = 'Supprimer';
$string['deleteddiscussion'] = 'Le sujet de discussion a été supprimé';
$string['deletedpost'] = 'Ce message a été supprimé';
$string['deletedposts'] = 'Ces messages ont été supprimés';
$string['deletesure'] = 'Voulez-vous vraiment supprimer ce message ?';
$string['deletesureplural'] = 'Voulez-vous vraiment supprimer ces messages et toutes les réponses ? ({$a} messages)';
$string['digestmailheader'] = 'Ceci est le courriel quotidien contenant tous les nouveaux messages des forums de {$a->sitename}. Pour modifier les réglages par défaut de vos abonnements, veuillez visiter {$a->userprefs}.';
$string['digestmailpost'] = 'Modifier vos préférences pour les courriels quotidiens';
$string['digestmailprefs'] = 'votre profil utilisateur';
$string['digestmailsubject'] = 'Courriel quotidien de {$a}';
$string['digestmailtime'] = 'Heure d\'envoi du courriel quotidien';
$string['digestsentusers'] = 'Les courriels quotidiens ont été envoyés correctement à {$a} utilisateurs.';
$string['disallowsubscribe'] = 'L\'abonnement n\'est pas autorisé';
$string['disallowsubscribeteacher'] = 'L\'abonnement n\'est pas autorisé (sauf pour les enseignants)';
$string['discussion'] = 'Discussion';
$string['discussionmoved'] = 'Cette discussion a été déplacée vers « {$a} ».';
$string['discussionmovedpost'] = 'Cette discussion a été déplacée <a href="{$a->discusshref}">ici</a>, dans le forum <a href="{$a->forumhref}">{$a->forumname}</a>';
$string['discussionname'] = 'Nom de la discussion';
$string['discussions'] = 'Discussions';
$string['discussionsstartedby'] = 'Discussions lancées par {$a}';
$string['discussionsstartedbyrecent'] = 'Discussions récentes lancées par {$a}';
$string['discussionsstartedbyuserincourse'] = 'Discussions commencées par {$a->fullname} dans {$a->coursename}';
$string['discussthistopic'] = 'Discuter sur ce sujet';
$string['displayend'] = 'Fin de l\'affichage';
$string['displayend_help'] = '<!-- $Id$ -->


<p>Vous pouvez choisir de faire afficher votre message à partir d\'une certaine date, jusqu\'à une certaine date ou durant une période déterminée.</p>

<p>Décochez la case de désactivation pour faire afficher une date de début et/ou de fin.</p>

<p>Veuillez remarquer que les utilisateurs avec droit d\'administration verront les messages avant la date de parution et après la date de fin de parution indiquée.</p>';
$string['displaymode'] = 'Type d\'affichage';
$string['displayperiod'] = 'Période d\'affichage';
$string['displaystart'] = 'Début de l\'affichage';
$string['displaystart_help'] = '<!-- $Id$ -->


<p>Vous pouvez choisir de faire afficher votre message à partir d\'une certaine date, jusqu\'à une certaine date ou durant une période déterminée.</p>

<p>Décochez la case de désactivation pour faire afficher une date de début et/ou de fin.</p>

<p>Veuillez remarquer que les utilisateurs avec droit d\'administration verront les messages avant la date de parution et après la date de fin de parution indiquée.</p>';
$string['displaywordcount'] = 'Afficher le nombre de mots';
$string['displaywordcount_help'] = 'Ce réglage détermine si le nombre de mots de chaque message est affiché ou non.';
$string['eachuserforum'] = 'Chaque personne lance une discussion';
$string['edit'] = 'Modifier';
$string['editedby'] = 'Modifié par {$a->name}. Écrit initialement le {$a->date}';
$string['editedpostupdated'] = 'Le message de {$a} a été modifié';
$string['editing'] = 'Modification';
$string['emaildigest_0'] = 'Vous allez recevoir un courriel par message de forum.';
$string['emaildigest_1'] = 'Vous allez recevoir un courriel quotidien contenant la totalité du contenu de chaque message de forum.';
$string['emaildigest_2'] = 'Vous allez recevoir un courriel quotidien contenant l\'objet de chaque message de forum.';
$string['emaildigestcompleteshort'] = 'Messages complets';
$string['emaildigestdefault'] = 'Réglage par défaut ({$a})';
$string['emaildigestoffshort'] = 'Pas de courriel quotidien';
$string['emaildigestsubjectsshort'] = 'Objets seulement';
$string['emaildigesttype'] = 'Options des courriels quotidiens';
$string['emaildigesttype_help'] = 'Le type de notification que vous recevrez pour chaque forum.

* Réglage par défaut – c\'est le réglage de votre profil pour ce paramètre. Si le vous modifiez dans votre profil, cette modification sera prise en compte ici également.
* Pas de courriel quotidien – vous ne recevrez pas de courriel quotidien.
* Messages complets – vous recevrez un courriel quotidien contenant la totalité du contenu de chaque message de forum.
* Objets seulement – vous recevrez un courriel quotidien ne contenant que l\'objet de chaque message de forum.';
$string['emaildigestupdated'] = 'Le réglage de courriel quotidien pour le forum « {$a->forum} » a été modifié à « {$a->maildigesttitle} ». {$a->maildigestdescription}';
$string['emaildigestupdated_default'] = 'Votre réglage par défaut « {$a->maildigesttitle} » a été utilisé pour le forum « {$a->forum} ». {$a->maildigestdescription}';
$string['emptymessage'] = 'Il y a eu un problème avec votre message. Peut-être est-il vide ou alors la taille de l\'annexe est trop grande. Vos modifications n\'ont pas été enregistrées.';
$string['erroremptymessage'] = 'Un message ne peut pas être vide';
$string['erroremptysubject'] = 'L\'objet d\'un message ne peut pas être vide';
$string['errorenrolmentrequired'] = 'Vous devez être inscrit dans ce cours pour avoir accès à ce contenu';
$string['errorwhiledelete'] = 'Une erreur est survenue lors de la suppression de l\'enregistrement.';
$string['event_assessable_uploaded'] = 'Un contenu a été déposé.';
$string['everyonecanchoose'] = 'Tous les participants peuvent s\'abonner';
$string['everyonecannowchoose'] = 'Tous les participants peuvent maintenant choisir de s\'abonner';
$string['everyoneisnowsubscribed'] = 'Tous les participants sont maintenant abonnés à ce forum';
$string['everyoneissubscribed'] = 'Tous les participants sont abonnés à ce forum';
$string['existingsubscribers'] = 'Abonnés actuels';
$string['exportdiscussion'] = 'Exporter toute la discussion';
$string['forcedreadtracking'] = 'Permettre d\'imposer le suivi des messages.';
$string['forcedreadtracking_desc'] = 'Permet d\'imposer le suivi des messages de forums. Ce réglage aura pour conséquence une diminution de performance pour certains utilisateurs, en particulier dans des cours avec de nombreux forums et messages. Si le réglage est désactivé, dans les forums qui étaient en mode de suivi imposé, le suivi sera optionnel.';
$string['forcessubscribe'] = 'Tous les participants sont obligatoirement abonnés à ce forum';
$string['forum'] = 'Forum';
$string['forum:addinstance'] = 'Ajouter un forum';
$string['forum:addnews'] = 'Ajouter des nouvelles';
$string['forum:addquestion'] = 'Ajouter une question';
$string['forum:allowforcesubscribe'] = 'Permettre d\'imposer l\'abonnement';
$string['forumauthorhidden'] = 'Auteur (masqué)';
$string['forumblockingalmosttoomanyposts'] = 'Vous approchez du nombre maximal de messages autorisés. Vous avez écrit {$a->numposts} durant les derniers {$a->blockperiod}. La limite est de {$a->blockafter} messages.';
$string['forumbodyhidden'] = 'Vous ne pouvez pas voir ce message, probablement parce que vous n\'avez pas encore participé à cette discussion, la durée maximale de modification n\'est pas encore passée, la discussion n\'a pas encore commencée ou elle est déjà terminée.';
$string['forum:createattachment'] = 'Créer des annexes';
$string['forum:deleteanypost'] = 'Supprimer des messages (en tout temps)';
$string['forum:deleteownpost'] = 'Supprimer ses propres messages (durant un délai)';
$string['forum:editanypost'] = 'Modifier des messages';
$string['forum:exportdiscussion'] = 'Exporter une discussion complète';
$string['forum:exportownpost'] = 'Exporter ses propres messages';
$string['forum:exportpost'] = 'Exporter des messages';
$string['forumintro'] = 'Description';
$string['forum:managesubscriptions'] = 'Gérer les abonnements';
$string['forum:movediscussions'] = 'Déplacer des discussions';
$string['forumname'] = 'Nom du forum';
$string['forumposts'] = 'Messages des forums';
$string['forum:postwithoutthrottling'] = 'Exempté des limites de message';
$string['forum:rate'] = 'Évaluer les messages';
$string['forum:replynews'] = 'Répondre aux nouvelles';
$string['forum:replypost'] = 'Répondre aux messages';
$string['forums'] = 'Forums';
$string['forum:splitdiscussions'] = 'Séparer des discussions';
$string['forum:startdiscussion'] = 'Lancer des discussions';
$string['forumsubjecthidden'] = 'Sujet (masqué)';
$string['forumtracked'] = 'Les messages non lus sont marqués';
$string['forumtrackednot'] = 'Les messages non lus ne sont pas marqués';
$string['forumtype'] = 'Type de forum';
$string['forumtype_help'] = 'Il y a 5 types de forums :

* Une seule discussion simple : un seul sujet de discussion sur lequel chacun peut s\'exprimer (ne peut pas être utilisé avec des groupes séparés).
* Chaque personne commence une seule discussion : chaque étudiant ne peut entamer qu\'une seule discussion, à laquelle chacun peut répondre.
* Forum questions/réponses : les étudiants doivent poster un message avant de pouvoir consulter et répondre aux questions et messages des autres participants.
* Forum standard affiché comme un blog : un forum ouvert, où chacun peut entamer une nouvelle discussion à tout instant. Les sujets de discussion sont affichés sur une page, avec un lien « Discuter sur ce sujet » pour y répondre.
* Forum standard pour utilisation générale : un forum ouvert, où chacun peut entamer une nouvelle discussion à tout instant.';
$string['forum:viewallratings'] = 'Voir toutes les évaluations brutes données par des participants';
$string['forum:viewanyrating'] = 'Voir toutes les évaluations globales';
$string['forum:viewdiscussion'] = 'Voir les discussions';
$string['forum:viewhiddentimedposts'] = 'Voir les messages cachés en attente de publication';
$string['forum:viewqandawithoutposting'] = 'Toujours voir les questions/réponses';
$string['forum:viewrating'] = 'Voir ses propres évaluations globales reçues';
$string['forum:viewsubscribers'] = 'Voir les abonnés';
$string['generalforum'] = 'Forum standard pour utilisation générale';
$string['generalforums'] = 'Forums standards';
$string['hiddenforumpost'] = 'Message de forum caché';
$string['inforum'] = 'dans {$a}';
$string['introblog'] = 'Les messages de ce forum ont été copiés depuis les blogs des utilisateurs de ce cours, car ces articles de blog ne sont plus disponibles';
$string['intronews'] = 'Nouvelles diverses et annonces';
$string['introsocial'] = 'Un forum pour discuter de sujets divers';
$string['introteacher'] = 'Un forum réservé aux remarques et discussions entre enseignants';
$string['invalidaccess'] = 'L\'accès à cette page n\'a pas été effectué correctement';
$string['invaliddigestsetting'] = 'Un réglage non valide a été fourni pour le courriel quotidien';
$string['invaliddiscussionid'] = 'Identifiant de discussion incorrect ou inexistant';
$string['invalidforcesubscribe'] = 'Mode d\'abonnement imposé non valide';
$string['invalidforumid'] = 'L\'identifiant de forum est incorrect';
$string['invalidparentpostid'] = 'Identifiant du message parent incorrect';
$string['invalidpostid'] = 'Identifiant de message incorrect : {$a}';
$string['lastpost'] = 'Dernier message';
$string['learningforums'] = 'Forums d\'apprentissage';
$string['longpost'] = 'Message long';
$string['mailnow'] = 'Envoyer maintenant';
$string['manydiscussions'] = 'Discussions par page';
$string['markalldread'] = 'Marquer tous les messages de cette discussion comme lus.';
$string['markallread'] = 'Marquer tous les messages de ce forum comme lus.';
$string['markread'] = 'Marquer comme lu';
$string['markreadbutton'] = 'Marquer<br />comme lu';
$string['markunread'] = 'Marquer comme non lu';
$string['markunreadbutton'] = 'Marquer comme<br />non lu';
$string['maxattachments'] = 'Nombre maximal d\'annexes';
$string['maxattachments_help'] = 'Ce réglage vous permet de spécifier le nombre maximal d\'annexes de chaque message de forum.';
$string['maxattachmentsize'] = 'Taille maximale de l\'annexe';
$string['maxattachmentsize_help'] = '<!-- $Id$ -->


<p>Il est possible de limiter la taille des annexes. Cette limite est fixée par la personne qui met en place le forum.</p>

<p>Il est cependant parfois possible de déposer un fichier de taille supérieure à cette valeur. Dans ce cas, le fichier n\'est pas enregistré sur le serveur et un message d\'erreur est affiché.</p>';
$string['maxtimehaspassed'] = 'Le délai pour modifier ce message ({$a}) est échu';
$string['message'] = 'Message';
$string['messageprovider:digests'] = 'Abonnements aux courriels quotidiens de forum';
$string['messageprovider:posts'] = 'Abonnements aux messages de forum';
$string['missingsearchterms'] = 'Le terme recherché suivant n\'apparaît que dans le code HTML de ce message :';
$string['modeflatnewestfirst'] = 'Réponses en ligne, la plus récente en premier';
$string['modeflatoldestfirst'] = 'Réponses en ligne, la plus ancienne en premier';
$string['modenested'] = 'Réponses emboîtées';
$string['modethreaded'] = 'Réponses en fils de discussions';
$string['modulename'] = 'Forum';
$string['modulename_help'] = 'Le module d\'activité forum permet aux participants de tenir des discussions asynchrones, c\'est-à-dire ne nécessitant pas leur participation au même moment.

Divers types de forums peuvent être choisis, comme un forum standard, où chacun peut lancer de nouvelles discussions à n\'importe quel moment, ou un forum où chaque participant doit lancer exactement une discussion, ou encore un forum de questions et réponses où ils doivent écrire un message avant de voir ceux des autres participants. L\'enseignant peut autoriser que des fichiers soit joints aux messages des forums.

Les images jointes sont affichées dans le message. Les participants peuvent s\'abonner à un forum afin de recevoir les messages des forums par courriel. L\'enseignant peut rendre l\'abonnement facultatif, obligatoire ou l\'empêcher complètement. Au besoin, les participants peuvent être empêchés de poster plus d\'un nombre donné de messages durant une période donnée, afin d\'éviter que l\'un d\'entre eux domine les discussions.

Les messages des forums peuvent être évalués par les enseignants ou les participants (évaluation par les pairs). Les évaluations sont combinées pour former une note  qui est enregistrée dans le carnet de notes.

Les forums ont de nombreuses utilisations, comme :

* un espace de présentation pour que les participants à un cours apprennent à se connaître
* une tribune pour diffuser les informations du cours (à l\'aide d\'un forum de nouvelles avec abonnement imposé)
* un centre d\'aide où les enseignants et les participants peuvent donner des conseils
* une façon informelle de partager des documents entre participants (et éventuellement d\'évaluer par les pairs)
* poursuivre en ligne une discussion commencée lors d\'une session face à face
* un endroit pour des discussions réservées aux enseignants (avec un forum caché)
* pour des activités complémentaires, par exemple des problèmes ouverts où les participants peuvent suggérer des solutions
* un lieu social pour des discussions hors-sujet';
$string['modulenameplural'] = 'Forums';
$string['more'] = 'plus';
$string['movedmarker'] = '(Déplacée)';
$string['movethisdiscussionto'] = 'Déplacer cette discussion vers...';
$string['mustprovidediscussionorpost'] = 'Vous devez fournir l\'identifiant soit de la discussion, soit du message à exporter';
$string['namenews'] = 'Forum des nouvelles';
$string['namenews_help'] = '<!-- $Id$ -->


<p>Le forum des nouvelles est un forum spécial, automatiquement créé dans chaque nouveau cours ainsi que sur la page d\'accueil de votre Moodle. Il est destiné spécifiquement aux annonces générales. Il n\'est possible d\'avoir qu\'un seul forum des nouvelles par cours.</p>

<p>Le bloc « Dernières nouvelles » affiche les discussions récentes de ce forum spécial, même si vous modifiez son nom. Pour cette raison, ce forum sera recréé automatiquement par Moodle si vous l\'avez supprimé et que vous utilisez le bloc « Dernières nouvelles ».</p>';
$string['namesocial'] = 'Forum informel';
$string['nameteacher'] = 'Forum des enseignants';
$string['newforumposts'] = 'Nouveaux messages dans les forums';
$string['noattachments'] = 'Ce message n\'a pas d\'annexe';
$string['nodiscussions'] = 'Il n\'y a pas encore de discussion dans ce forum';
$string['nodiscussionsstartedby'] = '{$a} n\'a lancé aucune discussion';
$string['nodiscussionsstartedbyyou'] = 'Vous n\'avez pas encore commencé de discussion';
$string['noguestpost'] = 'Les visiteurs anonymes ne sont pas autorisés à écrire des messages.';
$string['noguesttracking'] = 'Les visiteurs anonymes ne sont pas autorisés à modifier les options de suivi des forums.';
$string['nomorepostscontaining'] = 'Plus aucun message contenant « {$a} » n\'a été trouvé';
$string['nonews'] = 'Aucune brève n\'a encore été publiée';
$string['noonecansubscribenow'] = 'L\'abonnement n\'est maintenant plus autorisé  ';
$string['nopermissiontosubscribe'] = 'Vous n\'êtes pas autorisé à voir les abonnés au forum';
$string['nopermissiontoview'] = 'Vous n\'êtes pas autorisé à voir ce message';
$string['nopostforum'] = 'Désolé, vous ne pouvez pas écrire dans ce forum';
$string['noposts'] = 'Aucun message';
$string['nopostsmadebyuser'] = '{$a} n\'a pas écrit de message';
$string['nopostsmadebyyou'] = 'Vous n\'avez pas écrit de message';
$string['noquestions'] = 'Il n\'y a pas encore de question dans ce forum';
$string['nosubscribers'] = 'Personne n\'est abonné à ce forum';
$string['notexists'] = 'La discussion n\'existe plus';
$string['nothingnew'] = 'Rien de neuf pour {$a}';
$string['notingroup'] = 'Vous devez faire partie d\'un groupe pour consulter ce forum.';
$string['notinstalled'] = 'Le module forum n\'est pas installé';
$string['notpartofdiscussion'] = 'Ce message n\'appartient pas à une discussion !';
$string['notrackforum'] = 'Ne pas signaler les messages non lus';
$string['noviewdiscussionspermission'] = 'Vous n\'avez pas les droits d\'accès requis pour voir les discussions de ce forum';
$string['nowallsubscribed'] = 'Vous êtes abonné à tous les forums de {$a}.';
$string['nowallunsubscribed'] = 'Vous êtes désabonné de tous les forums de {$a}.';
$string['nownotsubscribed'] = '{$a->name} ne sera pas informé des nouveaux messages de « {$a->forum} »';
$string['nownottracking'] = '{$a->name} ne désire plus le suivi des messages du forum « {$a->forum} ».';
$string['nowsubscribed'] = '{$a->name} sera informé des nouveaux messages de « {$a->forum} »';
$string['nowtracking'] = '{$a->name} désire le suivi des messages du forum « {$a->forum} ».';
$string['numposts'] = '{$a} messages';
$string['olderdiscussions'] = 'Discussions antérieures';
$string['oldertopics'] = 'Sujets antérieurs';
$string['oldpostdays'] = 'Délai de lecture';
$string['openmode0'] = 'Aucune discussion, aucune réponse';
$string['openmode1'] = 'Aucune discussion, mais les réponses sont autorisées';
$string['openmode2'] = 'Discussions et réponses';
$string['overviewnumpostssince'] = '{$a} messages depuis la dernière connexion';
$string['overviewnumunread'] = '{$a} messages non lus';
$string['page-mod-forum-discuss'] = 'Page de discussion du module forum';
$string['page-mod-forum-view'] = 'Page principale du module forum';
$string['page-mod-forum-x'] = 'Toute page du module forum';
$string['parent'] = 'Niveau supérieur';
$string['parentofthispost'] = 'Niveau supérieur de ce message';
$string['pluginadministration'] = 'Administration forum';
$string['pluginname'] = 'Forum';
$string['postadded'] = '<p>Votre message a été enregistré.</p><p>Il vous est possible de le modifier pendant {$a}.</p>';
$string['postaddedsuccess'] = 'Votre message a été enregistré.';
$string['postaddedtimeleft'] = 'Il vous est possible de le modifier pendant {$a}.';
$string['postbyuser'] = '{$a->post} de {$a->user}';
$string['postincontext'] = 'Voir ce message dans son contexte';
$string['postmailinfo'] = 'Ceci est une copie du message posté sur le site {$a}.

Pour y répondre, cliquer sur ce lien :';
$string['postmailnow'] = '<p>Ce message sera envoyé immédiatement à tous les participants abonnés à ce forum.</p>';
$string['postrating1'] = 'Pas très pertinent';
$string['postrating2'] = 'Moyennement intéressant';
$string['postrating3'] = 'Plutôt pertinent';
$string['posts'] = 'Messages';
$string['postsmadebyuser'] = 'Messages écrits par {$a}';
$string['postsmadebyuserincourse'] = 'Messages écrits par {$a->fullname} dans {$a->coursename}';
$string['posttoforum'] = 'Envoyer';
$string['postupdated'] = 'Votre message a été modifié';
$string['potentialsubscribers'] = 'Abonnés potentiels';
$string['processingdigest'] = 'Traitement du courriel quotidien de l\'utilisateur {$a}';
$string['processingpost'] = 'Enregistrement du message {$a}';
$string['prune'] = 'Séparer';
$string['prunedpost'] = 'Une nouvelle discussion a été créée à partir de ce message';
$string['pruneheading'] = 'Séparer la discussion et déplacer ce message vers une nouvelle discussion';
$string['qandaforum'] = 'Forum questions/réponses';
$string['qandanotify'] = 'Ce forum est un forum « Questions et Réponses ». Pour voir les autres réponses à ces questions, vous devez d\'abord écrire votre propre réponse';
$string['re'] = 'Re:';
$string['readtherest'] = 'Lire le reste la discussion';
$string['replies'] = 'Réponses';
$string['repliesmany'] = '{$a} réponses';
$string['repliesone'] = '{$a} réponse';
$string['reply'] = 'Répondre';
$string['replyforum'] = 'Répondre au forum';
$string['replytouser'] = 'Utiliser l\'adresse de l\'auteur';
$string['resetdigests'] = 'Supprimer toutes les préférences des utilisateurs pour les courriels quotidiens de forum';
$string['resetforums'] = 'Supprimer les messages du';
$string['resetforumsall'] = 'Supprimer tous les messages';
$string['resetsubscriptions'] = 'Supprimer tous les abonnements aux forums';
$string['resettrackprefs'] = 'Supprimer toutes les préférences de suivi des messages de forum';
$string['rssarticles'] = 'Nombre d\'articles récents RSS';
$string['rssarticles_help'] = '<p>Cette option vous permet de fixer le nombre d\'articles récents à inclure dans le flux RSS.</p>

<p>Un nombre entre 5 et 20 est adéquat pour la plupart des forums. Si le forum est très actif, il est souhaitable d\'augmenter ce nombre.</p>';
$string['rsssubscriberssdiscussions'] = 'Flux RSS des discussions';
$string['rsssubscriberssposts'] = 'Flux RSS des messages';
$string['rsstype'] = 'Flux RSS de cette activité';
$string['rsstype_help'] = '<p>Cette option vous permet d\'activer le flux RSS de ce forum.</p>

<p>Vous pouvez choisir entre deux types de flux RSS :

<ul>
<li><strong>Discussions :</strong> le flux généré comprendra les nouvelles discussions du forum avec leur message initial.</li>

<li><strong>Messages :</strong> le flux généré comprendra tous les nouveaux messages postés dans le forum.</li>
</ul>';
$string['search'] = 'Rechercher';
$string['searchdatefrom'] = 'Dans les messages postérieurs à';
$string['searchdateto'] = 'Dans les messages antérieurs à';
$string['searchforumintro'] = 'Veuillez saisir les termes à rechercher dans l\'un ou plusieurs des champs ci-dessous :';
$string['searchforums'] = 'Recherche (forums)';
$string['searchfullwords'] = 'Mots entiers';
$string['searchnotwords'] = 'Termes à exclure';
$string['searcholderposts'] = 'Rechercher les anciens messages...';
$string['searchphrase'] = 'Phrase exacte dans le corps du message';
$string['searchresults'] = 'Résultats de la recherche';
$string['searchsubject'] = 'Terme dans le sujet du message';
$string['searchuser'] = 'Nom de l\'auteur';
$string['searchuserid'] = 'Identifiant (Moodle ID) de l\'auteur';
$string['searchwhichforums'] = 'Rechercher dans quels forums ?';
$string['searchwords'] = 'Termes apparaissant n\'importe où dans le message';
$string['seeallposts'] = 'Afficher tous les messages écrits par cet utilisateur';
$string['shortpost'] = 'Message court';
$string['showsubscribers'] = 'Afficher/modifier les abonnés à ce forum';
$string['singleforum'] = 'Une seule discussion';
$string['smallmessage'] = '{$a->user} a écrit dans {$a->forumname}';
$string['startedby'] = 'lancée par';
$string['subject'] = 'Sujet';
$string['subscribe'] = 'S\'abonner à ce forum';
$string['subscribeall'] = 'Abonner tous les participants';
$string['subscribed'] = 'Abonné';
$string['subscribeenrolledonly'] = 'Seuls les utilisateurs inscrits au cours sont autorisés à s\'abonner aux notifications des messages des forums.';
$string['subscribenone'] = 'Désabonner tous les participants';
$string['subscribers'] = 'Abonnés';
$string['subscribersto'] = 'Abonnés à « {$a} »';
$string['subscribestart'] = 'Abonnez-moi à ce forum';
$string['subscribestop'] = 'Désabonnez-moi de ce forum';
$string['subscription'] = 'Abonnement';
$string['subscriptionandtracking'] = 'Inscription et suivi des messages';
$string['subscriptionauto'] = 'Abonnement automatique';
$string['subscriptiondisabled'] = 'Abonnement désactivé';
$string['subscriptionforced'] = 'Abonnement imposé';
$string['subscription_help'] = 'Si vous êtes abonné à un forum, vous recevrez par courriel une copie de tous les messages postés sur ce forum. En général, vous pouvez décider de vous abonner ou non à chaque forum. Dans certains forums, l\'abonnement est cependant imposé, de sorte que tout le monde reçoit des copies des messages.';
$string['subscriptionmode'] = 'Mode d\'abonnement';
$string['subscriptionmode_help'] = 'Lorsqu\'un participant est abonné à un forum, il reçoit par courriel une copie de tous les messages postés sur ce forum. Il existe 4 options pour l\'abonnement :

* Abonnement facultatif : les participants peuvent décider de s\'abonner ou non à chaque forum.
* Abonnement imposé : tous les participants du cours sont abonnés et ne peuvent pas se désabonner.
* Abonnement automatique : tous les participants du cours sont initialement abonnés, mais peuvent choisir de se désabonner quand ils le veulent.
* Abonnement désactivé : l\'abonnement n\'est pas autorisé.

Les changements effectués au type d\'abonnement n\'affectent que les futurs inscrits au cours.';
$string['subscriptionoptional'] = 'Abonnement facultatif';
$string['subscriptions'] = 'Abonnements';
$string['thisforumisthrottled'] = 'Ce forum a une limite du nombre de messages que vous pouvez poster durant une période donnée. Cette limite est actuellement de {$a->blockafter} message(s) durant {$a->blockperiod}';
$string['timedposts'] = 'Messages temporisés';
$string['timestartenderror'] = 'La date de fin d\'affichage ne peut pas être antérieure à la date du début de l\'affichage';
$string['trackforum'] = 'Activer le suivi des messages';
$string['tracking'] = 'Suivi des messages';
$string['trackingoff'] = 'Désactivé';
$string['trackingon'] = 'Imposé';
$string['trackingoptional'] = 'Facultatif';
$string['trackingtype'] = 'Suivi de lecture des messages';
$string['trackingtype_help'] = 'Si ce réglage est activé, les participants peuvent d\'un coup d\'oeil distinguer les messages qu\'ils n\'ont pas encore lus de ceux qu\'ils ont déjà lus dans un forum. 3 options sont disponibles :

* Facultatif : les participants peuvent activer ou désactiver à discrétion le suivi des messages du forum via un lien dans le bloc d\'administration. Le suivi des messages doit également être activé dans le profil de l\'utilisateur.
* Imposé : le suivi est toujours activé, indépendamment du réglage de l\'utilisateur.
* Désactivé : le suivi est toujours désactivé.';
$string['unread'] = 'Non lu';
$string['unreadposts'] = 'Messages non lus';
$string['unreadpostsnumber'] = '{$a} messages non lus';
$string['unreadpostsone'] = '1 message non lu';
$string['unsubscribe'] = 'Se désabonner de ce forum';
$string['unsubscribeall'] = 'Se désabonner de tous les forums';
$string['unsubscribeallconfirm'] = 'Vous êtes actuellement abonné à {$a} forums. Voulez-vous vraiment vous désabonner de ces forums et désactiver l\'abonnement automatique ?';
$string['unsubscribealldone'] = 'Tous vos abonnements ont été annulés. Vous recevrez encore les notifications de messages des forums pour lesquels l\'abonnement est imposé. Vous pouvez modifier la notification des messages dans les réglages de votre profil.';
$string['unsubscribeallempty'] = 'Vous n\'êtes abonné à aucun forum. Si vous voulez désactiver toutes les notifications de ce serveur, modifiez la notification des messages dans les réglages de votre profil.';
$string['unsubscribed'] = 'Désabonné';
$string['unsubscribeshort'] = 'Désabonner';
$string['usermarksread'] = 'Marquage manuel des messages lus';
$string['viewalldiscussions'] = 'Afficher toutes les discussions';
$string['warnafter'] = 'Nombre de messages avant notification';
$string['warnafter_help'] = 'Les participants peuvent être avertis lorsque le nombre de messages écrits s\'approche du nombre maximal autorisé dans une période donnée. Ce réglage détermine après combien de messages écrits ils recevront cette notification. Les utilisateurs ayant la capacité mod/forum:postwithoutthrottling ne sont pas touchés par les limites de message.';
$string['warnformorepost'] = 'Attention ! Il y a plus d\'une discussion dans ce forum. La plus récente sera utilisée';
$string['yournewquestion'] = 'Nouvelle question';
$string['yournewtopic'] = 'Nouveau sujet de discussion';
$string['yourreply'] = 'Votre réponse';
