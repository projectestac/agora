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
 * Strings for component 'question', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   question
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Action';
$string['addanotherhint'] = 'Ajouter un autre indice';
$string['addcategory'] = 'Ajouter une catégorie';
$string['adminreport'] = 'Rapport sur les problèmes possibles dans votre banque de questions.';
$string['answer'] = 'Réponse';
$string['answersaved'] = 'Réponse enregistrée';
$string['attemptfinished'] = 'Tentative terminée';
$string['attemptfinishedsubmitting'] = 'Envoi des tentatives terminées :';
$string['availableq'] = 'Disponible ?';
$string['badbase'] = 'Mauvaise base avant **: {$a}**';
$string['behaviour'] = 'Comportement';
$string['behaviourbeingused'] = 'Comportement utilisé : {$a}';
$string['broken'] = 'Ce lien est « cassé », il pointe vers un fichier inexistant.';
$string['byandon'] = 'par <em>{$a->user}</em> à <em>{$a->time}</em>';
$string['cannotcopybackup'] = 'Impossible de copier le fichier de sauvegarde';
$string['cannotcreate'] = 'Impossible de créer un nouvel enregistrement dans la table question_attempts';
$string['cannotcreatepath'] = 'Impossible de créer le chemin {$a}';
$string['cannotdeletebehaviourinuse'] = 'Vous ne pouvez pas supprimer le comportement « {$a}  ». Il est utilisé par des tentatives de test.';
$string['cannotdeletecate'] = 'Vous ne pouvez pas supprimer cette catégorie, car c\'est la catégorie par défaut de ce contexte.';
$string['cannotdeletemissingbehaviour'] = 'Vous ne pouvez pas désinstaller ce comportement. Il est requis par le système.';
$string['cannotdeletemissingqtype'] = 'Vous ne pouvez pas supprimer le type manquant, qui est requis par le système.';
$string['cannotdeleteneededbehaviour'] = 'Impossible de supprimer le comportement de question « {$a} ». D\'autres comportements installés se basent dessus.';
$string['cannotdeleteqtypeinuse'] = 'Vous ne pouvez pas supprimer le type « {$a} », car il y a des questions de ce type dans la banque de questions.';
$string['cannotdeleteqtypeneeded'] = 'Vous ne pouvez pas supprimer le type « {$a} », car d\'autres types de question installés en ont besoin.';
$string['cannotenable'] = 'Le type de question {$a} ne peut pas être créé directement.';
$string['cannotenablebehaviour'] = 'Le comportement de question {$a} ne peut pas être utilisé directement. Il est conçu pour une utilisation interne uniquement.';
$string['cannotfindcate'] = 'Impossible de trouver l\'enregistrement pour la catégorie';
$string['cannotfindquestionfile'] = 'Impossible de trouver le fichier des données de question dans le fichier compressé';
$string['cannotgetdsfordependent'] = 'Impossible d\'obtenir le jeu de données indiqué pour une question dépendant d\'un jeu de données ! (question : {$a->id}, élément : {$a->item})';
$string['cannotgetdsforquestion'] = 'Impossible d\'obtenir le jeu de données indiqué pour une question calculée ! (question : {$a})';
$string['cannothidequestion'] = 'Impossible de cacher la question';
$string['cannotimportformat'] = 'Désolé, l\'importation de ce format n\'est pas encore implémentée !';
$string['cannotinsertquestion'] = 'Impossible d\'insérer une question !';
$string['cannotinsertquestioncatecontext'] = 'Impossible d\'insérer la nouvelle catégorie de questions {$a->cat}, identifiant de contexte illégal {$a->ctx}';
$string['cannotloadquestion'] = 'Impossible de charger la question';
$string['cannotmovequestion'] = 'Vous ne pouvez pas utiliser ce script pour déplacer des questions ayant des fichiers associés dans divers endroits.';
$string['cannotopenforwriting'] = 'Impossible d\'ouvrir en écriture {$a}';
$string['cannotpreview'] = 'Impossible de prévisualiser ces questions !';
$string['cannotread'] = 'Impossible d\'ouvrir le fichier d\'importation (ou le fichier est vide)';
$string['cannotretrieveqcat'] = 'Impossible de trouver la catégorie de questions';
$string['cannotunhidequestion'] = 'Impossible de rendre visible cette question.';
$string['cannotunzip'] = 'Impossible de décompresser le fichier.';
$string['cannotwriteto'] = 'Impossible d\'écrire dans {$a} les questions exportées';
$string['category'] = 'Catégorie';
$string['categorycurrent'] = 'Catégorie actuelle';
$string['categorycurrentuse'] = 'Utiliser cette catégorie';
$string['categorydoesnotexist'] = 'Cette catégorie n\'existe pas';
$string['categoryinfo'] = 'Description de la catégorie';
$string['categorymove'] = 'La catégorie « {$a->name} » contient {$a->count} questions (certaines d\'entre elles peuvent être d\'anciennes questions cachées utilisées dans des tests existants).<br />Veuillez choisir une autre catégorie dans laquelle les déplacer.';
$string['categorymoveto'] = 'Enregistrer dans la catégorie';
$string['categorynamecantbeblank'] = 'Le nom de la catégorie ne peut pas être vide.';
$string['changeoptions'] = 'Modifier les options';
$string['changepublishstatuscat'] = 'La <a href="{$a->caturl}">catégorie « {$a->name} »</a> du cours « {$a->coursename} » verra son état modifié de <strong>{$a->changefrom} à {$a->changeto}</strong>.';
$string['check'] = 'Vérifier';
$string['chooseqtypetoadd'] = 'Choisir un type de question à ajouter';
$string['clearwrongparts'] = 'Effacer les réponses incorrectes';
$string['clickflag'] = 'Marquer la question';
$string['clicktoflag'] = 'Marquer cette question pour référence';
$string['clicktounflag'] = 'Retirer la marque';
$string['clickunflag'] = 'Retirer la marque';
$string['closepreview'] = 'Fermer la prévisualisation';
$string['combinedfeedback'] = 'Feedback combiné';
$string['comment'] = 'Commentaire';
$string['commented'] = 'Commentée : {$a}';
$string['commentormark'] = 'Faire un commentaire ou modifier une note';
$string['comments'] = 'Commentaires';
$string['commentx'] = 'Commentaire : {$a}';
$string['complete'] = 'Terminer';
$string['contexterror'] = 'Vous ne devriez pas être arrivé ici si vous ne déplacez pas une catégorie vers un autre contexte.';
$string['copy'] = 'Copier depuis {$a} et modifier les liens.';
$string['correct'] = 'Correct';
$string['correctfeedback'] = 'Pour toutes réponses correctes';
$string['created'] = 'Créée';
$string['createdby'] = 'Créée par';
$string['createdmodifiedheader'] = 'Créée / enregistrée';
$string['createnewquestion'] = 'Créer une question...';
$string['cwrqpfs'] = 'Questions aléatoires sélectionnant des questions dans les sous-catégories.';
$string['cwrqpfsinfo'] = '<p>Lors de la mise à jour à Moodle 1.9, les catégories de questions seront séparées en différents contextes. Certaines catégories et questions de votre site verront leur état de partage modifié. Cette opération est rarement nécessaire. Elle est effectuée lorsque l\'une ou plusieurs questions aléatoires d\'un test sont réglées de façon à sélectionner des questions dans des catégories partagées et non partagées (et c\'est le cas sur ce site). Cette situation survient quand une question aléatoire puise dans des sous-catégories et l\'une de ces sous-catégories a un statut de partage différent de la catégorie parente dans laquelle la question aléatoire a été créée.</p><p>Les catégories de question suivantes, d\'où sont puisées des questions aléatoires à partir de questions dans une catégorie parente, verront leur état de partage modifié de façon à correspondre à l\'état de partage de la catégorie parente lors de la mise à jour à Moodle 1.9. Les catégories ci-dessous sont concernées par ce changement. Les questions affectées par ce changement continueront à fonctionner dans tous les tests existants, jusqu\'à ce que vous les retiriez de ces tests.</p>';
$string['cwrqpfsnoprob'] = 'Aucune catégorie de question de votre site n\'est affectée par le problème des « Questions aléatoires sélectionnant des questions dans des sous-catégories.»';
$string['decimalplacesingrades'] = 'Nombre de décimales dans les notes';
$string['defaultfor'] = 'Défaut pour {$a}';
$string['defaultinfofor'] = 'La catégorie par défaut pour les questions partagées dans le contexte « {$a} ».';
$string['defaultmark'] = 'Note par défaut';
$string['deletebehaviourareyousure'] = 'Voulez-vous vraiment supprimer le comportement {$a} ?';
$string['deletebehaviourareyousuremessage'] = 'Vous allez supprimer le comportement de question {$a}. Cette opération supprimera de la base de données tout ce qui est associé à ce comportement de question. Voulez-vous VRAIMENT continuer ?';
$string['deletecoursecategorywithquestions'] = 'La banque de questions associée à cette catégorie contient des questions. Si vous continuez, ces questions seront supprimées. Si vous voulez les conserver, veuillez d\'abord les déplacer en utilisant l\'interface de la banque de questions.';
$string['deleteqtypeareyousure'] = 'Voulez-vous vraiment supprimer le type de question type « {$a} »';
$string['deleteqtypeareyousuremessage'] = 'Vous êtes sur le point de supprimer totalement le type de question « {$a} ». Voulez-vous vraiment désinstaller ce type de question ?';
$string['deletequestioncheck'] = 'Voulez-vous vraiment supprimer « {$a} »?';
$string['deletequestionscheck'] = 'Voulez-vous vraiment supprimer les questions ci-dessous ?<br /><br />{$a}';
$string['deletingbehaviour'] = 'Suppression du comportement de question « {$a} »';
$string['deletingqtype'] = 'Suppression du type de question « {$a} »';
$string['didnotmatchanyanswer'] = '[Ne correspond à aucune réponse]';
$string['disabled'] = 'Désactivé';
$string['disterror'] = 'La distribution {$a} a causé des problèmes';
$string['donothing'] = 'Ne pas copier ou déplacer les fichiers, ni modifier les liens.';
$string['editcategories'] = 'Modifier catégories';
$string['editcategories_help'] = 'Plutôt que de conserver toutes vos questions dans une longue liste, vous avez la possibilité de créer des catégories et sous-catégories pour les classer.

Chaque catégorie a un contexte qui détermine où les questions peuvent être utilisées :

* le contexte de l\'activité : les questions ne sont disponibles que dans un module d\'activité ;
* le contexte du cours : les questions sont disponibles dans tous les modules d\'activité du cours ;
* le contexte de catégorie de cours : les questions sont disponibles dans tous les modules d\'activité et tous les cours de la catégorie ;
* le contexte système : les questions sont disponibles dans tous les cours et toutes les activités de votre site.

Les catégories sont aussi utilisées pour les questions aléatoires, puisque les questions sont alors tirées dans une catégorie.';
$string['editcategory'] = 'Modifier la catégorie';
$string['editingcategory'] = 'Modifier une catégorie';
$string['editingquestion'] = 'Modifier une question';
$string['editquestion'] = 'Modifier la question';
$string['editquestions'] = 'Modifier les questions';
$string['editthiscategory'] = 'Modifier cette catégorie';
$string['emptyxml'] = 'Erreur inconnue. Fichier imsmanifest.xml vide';
$string['enabled'] = 'Activé';
$string['erroraccessingcontext'] = 'Impossible d\'accéder au contexte';
$string['errordeletingquestionsfromcategory'] = 'Erreur lors de la suppression de questions de la catégorie {$a}.';
$string['errorduringpost'] = 'Erreur lors du post-traitement !';
$string['errorduringpre'] = 'Erreur lors du pré-traitement !';
$string['errorduringproc'] = 'Erreur lors du traitement !';
$string['errorduringregrade'] = 'Impossible de renoter la question {$a->qid}. Retour à l\'état {$a->stateid}.';
$string['errorfilecannotbecopied'] = 'Impossible de copier le fichier {$a}.';
$string['errorfilecannotbemoved'] = 'Impossible de déplacer le fichier {$a}.';
$string['errorfileschanged'] = 'Erreur : certains fichiers liés dans des questions ont été modifiés depuis l\'affichage du formulaire.';
$string['errormanualgradeoutofrange'] = 'La note {$a->grade} n\'est pas entre 0 et {$a->maxgrade} pour la question {$a->name}. Le score et le commentaire n\'ont pas été enregistrés.';
$string['errormovingquestions'] = 'Erreur lors du déplacement des questions d\'identifiants {$a}.';
$string['errorpostprocess'] = 'Erreur lors du post-traitement !';
$string['errorpreprocess'] = 'Erreur lors du pré-traitement !';
$string['errorprocess'] = 'Erreur lors du traitement !';
$string['errorprocessingresponses'] = 'Une erreur est survenue lors du traitement de vos réponses ({$a}). Cliquez sur continuer pour revenir à la page où vous étiez et essayez de nouveau.';
$string['errorsavingcomment'] = 'Erreur lors de l\'enregistrement dans la base de données du commentaire pour la question {$a->name}.';
$string['errorsavingflags'] = 'Erreur durant l\'enregistrement de l\'indicateur d\'état.';
$string['errorupdatingattempt'] = 'Erreur lors de la mise à jour dans la base de données de la tentative {$a->id}.';
$string['exportcategory'] = 'Exporter catégorie';
$string['exportcategory_help'] = 'Ce réglage détermine la catégorie dont il faut tirer les questions à exporter.

Certains formats (par exemple GIFT et Moodle XML) permettent l\'inclusion de la catégorie et du contexte dans le fichier d\'exportation, donnant ainsi la possibilité de la recréer au cours de l\'importation. Le cas échéant, les cases adéquates devront être cochées.';
$string['exporterror'] = 'Des erreurs sont survenues lors de l\'exportation !';
$string['exportfilename'] = 'quiz';
$string['exportnameformat'] = '%Y%m%d-%H%M';
$string['exportquestions'] = 'Exporter des questions vers un fichier';
$string['exportquestions_help'] = 'Ce réglage permet d\'activer l\'exportation de catégories (avec toutes les sous-catégories) de questions vers un fichier. Suivant le format de fichier choisi, certaines données de questions et certains types de questions ne pourront pas être exportés.';
$string['feedback'] = 'Feedback';
$string['filecantmovefrom'] = 'Le fichier de questions ne peut pas être déplacé, car vous n\'avez pas l\'autorisation de supprimer des fichiers de l\'endroit d\'où vous voulez déplacer des questions.';
$string['filecantmoveto'] = 'Le fichier de questions ne peut pas être déplacé, car vous n\'avez pas l\'autorisation d\'écrire des fichiers à l\'endroit où vous voulez déplacer des questions.';
$string['fileformat'] = 'Format de fichier';
$string['filesareacourse'] = 'la zone des fichiers du cours';
$string['filesareasite'] = 'la zone des fichiers du site';
$string['filestomove'] = 'Déplacer / copier les fichiers vers {$a} ?';
$string['fillincorrect'] = 'Remplir les réponses correctes';
$string['flagged'] = 'Marquée';
$string['flagthisquestion'] = 'Marquer cette question';
$string['formquestionnotinids'] = 'Le formulaire contient une question qui n\'apparaît pas dans les identifiants de question';
$string['fractionsnomax'] = 'L\'une des réponses doit donner un score de 100% afin qu\'il soit possible d\'obtenir la totalité des points pour cette question.';
$string['generalfeedback'] = 'Feedback général';
$string['generalfeedback_help'] = 'Le feedback général est affiché aux participants après qu\'ils aient tenté une question. À la différence du feedback, qui dépend du type de la question et de la réponse donnée par le participant, le même feedback général est affiché à tous les participants.

Vous pouvez utiliser le feedback général pour donner à vos participants des indications sur les connaissances testées par la question, ou leur fournir des liens qu\'ils pourront utiliser s\'ils n\'ont pas compris la question.';
$string['getcategoryfromfile'] = 'Obtenir la catégorie à partir du fichier';
$string['getcontextfromfile'] = 'Obtenir le contexte à partir du fichier';
$string['hidden'] = 'Caché';
$string['hintn'] = 'Indice {no}';
$string['hinttext'] = 'Texte de l\'indice';
$string['howquestionsbehave'] = 'Comment se comportent les questions';
$string['howquestionsbehave_help'] = 'Les participants peuvent agir avec les questions du test de différentes façons. Par exemple, vous pourriez souhaiter que les participants répondent à chaque question et envoient ensuite la totalité du test, avant que quoi que ce soit ne soit noté ou qu\'un feedback ne leur soit donné. Ce sera le mode « Feedback a posteriori ».

Sinon, vous pourriez souhaiter que les participants envoient chaque question au fur et à mesure du test et reçoivent immédiatement le feedback correspondant, qu\'il puissent tenter de répondre à nouveau s\'ils ont échoué, mais avec une note moindre. Ce sera le mode « Interactif avec tentatives multiples ».

Ces deux exemples illustrent les deux comportements les plus utilisés.';
$string['ignorebroken'] = 'Ignorer les liens cassés';
$string['importcategory'] = 'Catégorie d\'importation';
$string['importcategory_help'] = 'Ce réglage détermine la catégorie dans laquelle les questions importées seront placées.

Certains formats (par exemple GIFT et Moodle XML) permettent d\'inclure la catégorie et le contexte dans le fichier d\'importation. Pour que ces données soient exploitées, les cases adéquates devront être cochées. Les catégories indiquées dans le fichier d\'importation seront créées si elles n\'existent pas encore.';
$string['importerror'] = 'Une erreur est survenue durant le traitement de l\'importation';
$string['importerrorquestion'] = 'Erreur lors de l\'importation des questions';
$string['importfromcoursefiles'] = '... ou choisissez un fichier de cours pour l\'importation.';
$string['importfromupload'] = 'Sélectionnez un fichier à déposer...';
$string['importingquestions'] = 'Importation de {$a} questions depuis le fichier';
$string['importparseerror'] = 'Des erreurs ont été trouvées en analysant le fichier d\'importation. Aucune question n\'a été importée. Pour importer toutes les questions valides, essayez à nouveau en réglant le paramètre « Arrêter en cas d\'erreur » sur « Non ».';
$string['importquestions'] = 'Importer des questions d\'un fichier';
$string['importquestions_help'] = 'Ce réglage permet d\'activer l\'importation de questions de divers formats à partir d\'un fichier texte. L\'encodage du fichier doit être UTF-8.';
$string['importwrongfiletype'] = 'Le type de fichier que vous avez sélectionné ({$a->actualtype}) ne correspond pas au type attendu par ce format d\'importation ({$a->expectedtype}).';
$string['impossiblechar'] = 'Caractère impossible {$a} détecté comme séparateur';
$string['includesubcategories'] = 'Montrer aussi les questions des sous-catégories';
$string['incorrect'] = 'Incorrect';
$string['incorrectfeedback'] = 'Pour toute réponse incorrecte';
$string['information'] = 'Description';
$string['invalidanswer'] = 'Réponse incomplète';
$string['invalidarg'] = 'Aucun paramètre valide fourni ou configuration du serveur incorrecte';
$string['invalidcategoryidforparent'] = 'Identifiant de catégorie non valide pour le parent !';
$string['invalidcategoryidtomove'] = 'Identifiant de la catégorie à déplacer non valide !';
$string['invalidconfirm'] = 'La chaîne de confirmation est incorrecte';
$string['invalidcontextinhasanyquestions'] = 'Contexte non valide passé à la fonction question_context_has_any_questions().';
$string['invalidpenalty'] = 'Pénalité non valide';
$string['invalidwizardpage'] = 'Page de l\'assistant incorrecte ou non spécifiée !';
$string['lastmodifiedby'] = 'Dernière modification par';
$string['linkedfiledoesntexist'] = 'Le fichier lié {$a} n\'existe pas';
$string['makechildof'] = 'Déplacer comme descendant de {$a}';
$string['makecopy'] = 'Copier';
$string['maketoplevelitem'] = 'Déplacer au plus haut niveau';
$string['manualgradeoutofrange'] = 'Cette note est en dehors de la plage de validité.';
$string['manuallygraded'] = 'Notée manuellement {$a->mark} avec le commentaire : {$a->comment}';
$string['mark'] = 'Note';
$string['markedoutof'] = 'Noté sur';
$string['markedoutofmax'] = 'Noté sur {$a}';
$string['markoutofmax'] = 'Note de {$a->mark} sur {$a->max}';
$string['marks'] = 'Notes';
$string['matcherror'] = 'Les notes ne correspondent pas aux options de notation - question ignorée';
$string['matchgrades'] = 'Faire correspondre les notes';
$string['matchgradeserror'] = 'Erreur si la note n\'est pas listée';
$string['matchgrades_help'] = 'Les notes importées doivent correspondre à la liste des notes acceptables : 100, 90, 80, 75, 70, 66.666, 60, 50, 40, 33.333, 30, 25, 20, 16.666, 14.2857, 12.5, 11.111, 10, 5, 0. Des valeurs négatives sont également permises. Dans le cas contraire, il y a deux options :

* erreur si la note n\'est pas répertoriée : si une question prévoit une note qui n\'est pas répertoriée dans la liste, une erreur est affichée et la question n\'est pas importée ;
* note la plus proche si elle n\'est pas répertoriée : si une note ne correspond à celles prévues dans la liste, elle est adaptée à la valeur la plus proche de la liste.';
$string['matchgradesnearest'] = 'Note la plus proche si elle n\'est pas listée';
$string['missingcourseorcmid'] = 'Vous devez fournir l\'identifiant de cours ou le numéro de cours pour imprimer la question.';
$string['missingcourseorcmidtolink'] = 'Vous devez fournir l\'identifiant de cours ou le numéro de cours à get_question_edit_link.';
$string['missingimportantcode'] = 'Il manque à ce type de question un code important : {$a}.';
$string['missingoption'] = 'Les options de la question cloze {$a} manquent';
$string['modified'] = 'Enregistré';
$string['move'] = 'Déplacer depuis {$a} et modifier les liens.';
$string['movecategory'] = 'Déplacer catégorie';
$string['movedquestionsandcategories'] = 'Les questions et catégories de questions ont été déplacées de {$a->oldplace} vers {$a->newplace}.';
$string['movelinksonly'] = 'Modifier les liens sans déplacer ni copier de fichier.';
$string['moveq'] = 'Déplacer question(s)';
$string['moveqtoanothercontext'] = 'Déplacer la question vers un autre contexte.';
$string['moveto'] = 'Déplacer vers >>';
$string['movingcategory'] = 'Déplacement catégorie';
$string['movingcategoryandfiles'] = 'Voulez-vous vraiment déplacer la catégorie {$a->name} et toutes les catégories filles vers le contexte « {$a->contextto} »?<br />{$a->urlcount} fichiers liés depuis des questions situées dans {$a->fromareaname} ont été détectés. Voulez-vous les copier ou les déplacer vers {$a->toareaname} ?';
$string['movingcategorynofiles'] = 'Voulez-vous vraiment déplacer la catégorie {$a->name} et toutes les catégories filles vers le contexte « {$a->contextto} »?';
$string['movingquestions'] = 'Déplacement des questions et des fichiers';
$string['movingquestionsandfiles'] = 'Voulez-vous vraiment déplacer la(les) question(s) {$a->questions} vers le contexte « {$a->tocontext} »?<br />{$a->urlcount} fichiers liés depuis cette(ces) question(s) dans {$a->fromareaname} ont été détectés.  Voulez-vous les copier ou les déplacer vers {$a->toareaname} ';
$string['movingquestionsnofiles'] = 'Voulez-vous vraiment déplacer la(les) question(s) {$a->questions} vers le contexte « {$a->tocontext} »?<br />Il n\'y a <strong>aucun fichier</strong> liés depuis cette(ces) question(s) dans {$a->fromareaname}.';
$string['needtochoosecat'] = 'Vous devez choisir une catégorie dans laquelle déplacer cette question ou cliquer sur « Annuler ».';
$string['nocate'] = 'Aucune catégorie {$a} !';
$string['nopermissionadd'] = 'Vous n\'avez pas le droit d\'ajouter des questions ici.';
$string['nopermissionmove'] = 'Vous n\'avez pas le droit de déplacer des questions depuis ici. Vous devez enregistrer la question dans cette catégorie ou l\'enregistrer comme nouvelle question.';
$string['noprobs'] = 'Aucun problème n\'a été détecté dans votre banque de questions.';
$string['noquestions'] = 'Aucune question à exporter. Assurez-vous que vous avez sélectionné pour l\'exportation une catégorie contenant des questions.';
$string['noquestionsinfile'] = 'Il n\'y a aucune question dans le fichier d\'importation';
$string['noresponse'] = '[Pas de réponse]';
$string['notanswered'] = 'Non répondue';
$string['notenoughanswers'] = 'Ce type de question requiert au moins {$a} réponses';
$string['notenoughdatatoeditaquestion'] = 'L\'identifiant de la question, l\'identifiant de la catégorie et le type de question n\'ont pas été spécifiés.';
$string['notenoughdatatomovequestions'] = 'Vous devez fournir les identifiants des questions que vous voulez déplacer.';
$string['notflagged'] = 'Non marquée';
$string['notgraded'] = 'Non noté';
$string['notshown'] = 'Non montré';
$string['notyetanswered'] = 'Pas encore répondu';
$string['notyourpreview'] = 'Cette prévisualisation ne vous appartient pas';
$string['novirtualquestiontype'] = 'Il n\'y a pas de type de question virtuelle pour les questions de type {$a}';
$string['numqas'] = 'Nombre de tentatives de question';
$string['numquestions'] = 'No. de questions';
$string['numquestionsandhidden'] = '{$a->numquestions} (+ {$a->numhidden} cachées)';
$string['options'] = 'Options';
$string['orphanedquestionscategory'] = 'Questions des catégories supprimées';
$string['orphanedquestionscategoryinfo'] = 'Parfois, en raison d\'ancien bogues, des questions peuvent subsister dans la base de données, bien que la catégorie correspondante ait été supprimée. Cela est survenu sur ce site par le passé. Cette catégorie a été créée automatiquement et les questions non supprimées y ont été placées afin que vous puissiez les traiter. Les images ou autres fichiers utilisés par ces questions ont probablement été correctement supprimés.';
$string['page-question-category'] = 'Page de catégorie de questions';
$string['page-question-edit'] = 'Page de modification de question';
$string['page-question-export'] = 'Page d\'exportation de questions';
$string['page-question-import'] = 'Page d\'importation de questions';
$string['page-question-x'] = 'Toute page de questions';
$string['parent'] = 'Parent';
$string['parentcategory'] = 'Catégorie parente';
$string['parentcategory_help'] = 'La catégorie parente est celle dans laquelle la nouvelle catégorie sera placée. Le plus haut niveau signifie que cette catégorie n\'est contenue dans aucune autre. Les  contextes de catégories sont en caractères gras. Il faut avoir au moins une catégorie par contexte.';
$string['parenthesisinproperclose'] = 'La parenthèse avant ** n\'est pas fermée correctement dans {$a}**';
$string['parenthesisinproperstart'] = 'La parenthèse avant ** n\'est pas ouverte correctement dans {$a}**';
$string['parsingquestions'] = 'Analyse des questions du fichier d\'importation.';
$string['partiallycorrect'] = 'Partiellement correct';
$string['partiallycorrectfeedback'] = 'Pour toute réponse partiellement correcte';
$string['penaltyfactor'] = 'Facteur de pénalité';
$string['penaltyfactor_help'] = '<!-- $Id$ -->


<p>Vous pouvez déterminer, pour chaque mauvaise réponse, quelle proportion de la note obtenue sera retirée. Cela n\'est intéressant que si le test est effectué en mode adaptatif. Ainsi, l\'étudiant peut apporter une nouvelle réponse à la question. Le facteur de pénalité doit être un nombre compris entre 0 et 1. Un facteur de pénalité de 1 signifie que l\'étudiant doit fournir la bonne réponse au premier essai, sous peine de n\'obtenir aucun point. Un facteur de pénalité de 0 indique que l\'étudiant peut réessayer autant qu\'il le veut et pourra obtenir tous les points.</p>';
$string['penaltyforeachincorrecttry'] = 'Pénalité pour tout essai incorrect';
$string['penaltyforeachincorrecttry_help'] = 'Lorsque vous utilisez le mode « Interactif avec tentatives multiples » ou « Adaptatif » les participants ont plusieurs essais pour trouver la bonne réponse. Cette option contrôle comment ils seront pénalisés pour chaque essai incorrect.

La pénalité est un pourcentage de la note totale de la question, donc si la question est notée sur 3 points et que la pénalité est de 0,3333333, alors le participant aura 3 points s\'il répond correctement à la question au premier essai, 2 points s\'il répond correctement au deuxième essai, et 1 point s\'il répond correctement au troisième essai.';
$string['permissionedit'] = 'Modifier cette question';
$string['permissionmove'] = 'Déplacer cette question';
$string['permissionsaveasnew'] = 'Enregistrer ceci en tant que nouvelle question';
$string['permissionto'] = 'Vous avez les autorisations pour :';
$string['previewquestion'] = 'Prévisualisation de la question : {$a}';
$string['published'] = 'partagée';
$string['qbehaviourdeletefiles'] = 'Toutes les données associées au comportement de question « {$a->behaviour} » ont été supprimées de la base de données. Pour terminer la suppression (et éviter que le comportement se réinstalle), veuillez supprimer maintenant ce dossier de votre serveur : {$a->directory}';
$string['qtypedeletefiles'] = 'Toutes les données associées au type de question « {$a->qtype} » ont été supprimées de la base de données. Pour achever la suppression (et éviter ainsi que le type de question se réinstalle automatiquement), vous devez maintenant supprimer de votre serveur le dossier {$a->directory}';
$string['qtypeveryshort'] = 'T';
$string['questionaffected'] = '<a href="{$a->qurl}">La question « {$a->name} » ({$a->qtype})</a> est dans cette catégorie, mais est aussi utilisée dans le <a href="{$a->qurl}">test « {$a->quizname} »</a> dans le cours « {$a->coursename} ».';
$string['questionbank'] = 'Banque de questions';
$string['questionbehaviouradminsetting'] = 'Paramètres des comportements de questions';
$string['questionbehavioursdisabled'] = 'Comportements de questions à désactiver';
$string['questionbehavioursdisabledexplained'] = 'Saisissez une liste des comportements que vous ne voulez pas voir apparaître dans le menu déroulant, séparés par des virgules';
$string['questionbehavioursorder'] = 'Ordre des comportements de questions';
$string['questionbehavioursorderexplained'] = 'Entrez une liste des comportements dans l\'ordre où vous souhaitez les voir apparaître dans le menu déroulant,  séparés par des virgules';
$string['questioncategory'] = 'Catégorie de questions';
$string['questioncatsfor'] = 'Catégories de question de « {$a} »';
$string['questiondoesnotexist'] = 'Cette question n\'existe pas';
$string['questionidmismatch'] = 'Les identifiants de questions ne correspondent pas';
$string['questionname'] = 'Nom de question';
$string['questionno'] = 'Question {$a}';
$string['questions'] = 'Questions';
$string['questionsaveerror'] = 'Des erreurs sont survenues lors de l\'enregistrement de la question ({$a})';
$string['questionsinuse'] = '(* Les questions marquées d\'un astérisque sont déjà utilisées dans d\'autres tests. Ces questions ne seront pas supprimées de ces tests, mais seulement de la liste des catégories.)';
$string['questionsmovedto'] = 'Les questions encore utilisées ont été déplacées vers « {$a} » dans la catégorie de cours mère.';
$string['questionsrescuedfrom'] = 'Questions enregistrées depuis le contexte {$a}.';
$string['questionsrescuedfrominfo'] = 'Ces questions (dont certaines sont peut-être cachées) ont été enregistrées lors de la suppression du contexte {$a}, car elles sont encore utilisées dans certains tests ou d\'autres activités.';
$string['questiontext'] = 'Texte de la question';
$string['questiontype'] = 'Type de question';
$string['questionuse'] = 'Utilisation de question dans cette activité';
$string['questionvariant'] = 'Variante de question';
$string['questionx'] = 'Question {$a}';
$string['requiresgrading'] = 'Nécessite évaluation';
$string['responsehistory'] = 'Historique des réponses';
$string['restart'] = 'Recommencer';
$string['restartwiththeseoptions'] = 'Recommencer avec ces options';
$string['reviewresponse'] = 'Relire la réponse';
$string['rightanswer'] = 'Réponse juste';
$string['rightanswer_help'] = 'Un résumé de la réponse correcte généré automatiquement. Ce texte peut être limité. Il peut être plus judicieux d\'expliquer la réponse correcte dans le feedback général de la question et de désactiver cette option.';
$string['save'] = 'Enregistrer';
$string['saved'] = 'Enregistré : {$a}';
$string['saveflags'] = 'Enregistrer l\'état des marquages';
$string['selectacategory'] = 'Choisir une catégorie';
$string['selectaqtypefordescription'] = 'Choisir un type de question pour voir sa description.';
$string['selectcategoryabove'] = 'Choisir une catégorie ci-dessus';
$string['selectquestionsforbulk'] = 'Sélectionner des questions pour des actions en masse';
$string['settingsformultipletries'] = 'Paramètres pour les essais multiples';
$string['shareincontext'] = 'Partager dans le contexte pour {$a}';
$string['showhidden'] = 'Montrer aussi les anciennes questions';
$string['showmarkandmax'] = 'Montrer la note et la note maximale';
$string['showmaxmarkonly'] = 'Montrer la note maximale seulement';
$string['shown'] = 'Affiché';
$string['shownumpartscorrect'] = 'Montrer le nombre de réponses correctes';
$string['shownumpartscorrectwhenfinished'] = 'Montrer le nombre de réponses correctes une fois la question terminée';
$string['showquestiontext'] = 'Montrer le texte de la question dans la liste';
$string['specificfeedback'] = 'Feedback spécifique';
$string['specificfeedback_help'] = 'Feedback dépendant de la réponse donnée par le participant';
$string['started'] = 'Commencé';
$string['state'] = 'État';
$string['step'] = 'Étape';
$string['stoponerror'] = 'Stopper en cas d\'erreur';
$string['stoponerror_help'] = 'Ce réglage détermine si le processus d\'importation s\'arrête lorsqu\'une erreur est détectée. Dans ce cas, aucune question n\'est importée. Sinon, les questions contenant des erreurs sont ignorées et seules les questions valides sont importées.';
$string['submissionoutofsequence'] = 'Accès hors séquence. Merci de ne pas cliquer sur le bouton retour de votre navigateur lorsque vous travaillez sur les questions de tests.';
$string['submissionoutofsequencefriendlymessage'] = 'Vous avez saisi des données en dehors du déroulement normal. Cela a lieu quant vous utilisez les boutons Retour et Suivant de votre navigateur ; merci de ne pas les utilisez durant un test. Cela peut aussi survenir si vous cliquez sur quelque chose pendant le chargement d\'une page. Cliquez sur <strong>Continuer</strong> pour poursuivre.';
$string['submit'] = 'Envoyer';
$string['submitandfinish'] = 'Envoyer et terminer';
$string['submitted'] = 'Envoyé : {$a}';
$string['technicalinfo'] = 'Information technique';
$string['technicalinfo_help'] = 'Cette information technique n\'est vraisemblablement utile que pour les développeurs travaillant sur de nouveaux types de questions. Elle peut aussi être utile pour diagnostiquer certains problèmes de certaines questions.';
$string['technicalinfominfraction'] = 'Fraction minimale : {$a}';
$string['technicalinfoquestionsummary'] = 'Résumé de la question : {$a}';
$string['technicalinforightsummary'] = 'Résumé de la réponse correcte : {$a}';
$string['technicalinfostate'] = 'État de la question : {$a}';
$string['tofilecategory'] = 'Exporter la catégorie dans le fichier';
$string['tofilecontext'] = 'Exporter le contexte dans le fichier';
$string['uninstallbehaviour'] = 'Supprimer ce comportement de question.';
$string['uninstallqtype'] = 'Désinstaller ce type de question.';
$string['unknown'] = 'Inconnu';
$string['unknownbehaviour'] = 'Comportement inconnu : {$a}.';
$string['unknownquestion'] = 'Question inconnue : {$a}.';
$string['unknownquestioncatregory'] = 'Catégorie de question inconnue : {$a}.';
$string['unknownquestiontype'] = 'Type de question inconnu {$a}';
$string['unknowntolerance'] = 'Type de tolérance inconnu {$a}';
$string['unpublished'] = 'non partagée';
$string['upgradeproblemcategoryloop'] = 'Un problème a été détecté lors de la modification des catégories de question : il y a une boucle dans l\'arbre des catégories. Les identifiants des catégories touchés sont {$a}.';
$string['upgradeproblemcouldnotupdatecategory'] = 'Impossible de modifier la catégorie de question {$a->name} ({$a->id}).';
$string['upgradeproblemunknowncategory'] = 'Un problème a été détecté lors de la modification des catégories de question : la catégorie {$a->id} fait référence à la catégorie parente {$a->parent}, qui n\'existe pas. La catégorie parente a été changée pour corriger le problème.';
$string['whethercorrect'] = 'Si correcte';
$string['whethercorrect_help'] = 'Ceci couvre à la fois la description pour « Correct », « Partiellement correct » et « Incorrect » et toutes les indications en surlignage coloré portant la même information.';
$string['withselected'] = 'Avec la sélection';
$string['wrongprefix'] = 'Le préfixe est mal formatté {$a}';
$string['xoutofmax'] = '{$a->mark} sur {$a->max}';
$string['yougotnright'] = 'Vous avez séléctionné correctement {$a->num}.';
$string['youmustselectaqtype'] = 'Vous devez choisir un type de question.';
$string['yourfileshoulddownload'] = 'Le téléchargement de votre fichier d\'exportation va commencer. Si rien ne se passe, veuillez <a href="{$a}">cliquer ici</a>.';
