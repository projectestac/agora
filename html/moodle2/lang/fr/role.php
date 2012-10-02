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
 * Strings for component 'role', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   role
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinganewrole'] = 'Ajout d\'un nouveau rôle';
$string['addingrolebycopying'] = 'Ajout d\'un nouveau rôle basé sur {$a}';
$string['addrole'] = 'Ajouter un nouveau rôle';
$string['advancedoverride'] = 'Dérogation de rôle avancée';
$string['allow'] = 'Autoriser';
$string['allowassign'] = 'Autoriser l\'attribution des rôles';
$string['allowed'] = 'Autorisé';
$string['allowoverride'] = 'Autoriser la définition de dérogations aux rôles';
$string['allowroletoassign'] = 'Autoriser les utilisateurs ayant le rôle {$a->fromrole} à attribuer le rôle {$a->targetrole}';
$string['allowroletooverride'] = 'Autoriser les utilisateurs ayant le rôle {$a->fromrole} à définir des dérogations pour le rôle {$a->targetrole}';
$string['allowroletoswitch'] = 'Autoriser les utilisateurs ayant le rôle {$a->fromrole} à changer de rôle vers le rôle {$a->targetrole}';
$string['allowswitch'] = 'Autoriser le changement de rôle';
$string['allsiteusers'] = 'Tous les utilisateurs du site';
$string['archetype'] = 'Modèle de rôle';
$string['archetypecoursecreator'] = 'MODÈLE : Créateur de cours';
$string['archetypeeditingteacher'] = 'MODÈLE : Enseignant';
$string['archetypefrontpage'] = 'MODÈLE : Utilisateur authentifié sur la page d\'accueil';
$string['archetypeguest'] = 'MODÈLE : Visiteur anonyme';
$string['archetype_help'] = 'Le rôle modèle détermine les permissions affectées à un rôle lors de sa réinitialisation. Il détermine également les nouvelles permissions lors d\'une mise à jour du site.';
$string['archetypemanager'] = 'MODÈLE : Gestionnaire';
$string['archetypestudent'] = 'MODÈLE : Étudiant';
$string['archetypeteacher'] = 'MODÈLE : Enseignant non éditeur';
$string['archetypeuser'] = 'MODÈLE : Utilisateur authentifié';
$string['assignanotherrole'] = 'Attribuer un autre rôle';
$string['assignedroles'] = 'Rôles attribués';
$string['assignerror'] = 'Erreur lors de l\'attribution du rôle {$a->role} à l\'utilisateur {$a->user}.';
$string['assignglobalroles'] = 'Attribution des rôles système';
$string['assignmentcontext'] = 'Contexte d\'attribution';
$string['assignmentoptions'] = 'Options d\'attribution';
$string['assignrole'] = 'Attribuer rôle';
$string['assignrolenameincontext'] = 'Attribuer le rôle {$a->role} dans {$a->context}';
$string['assignroles'] = 'Attribution des rôles';
$string['assignroles_help'] = 'En attribuant un rôle à un utilisateur dans un certain contexte, vous lui accordez les permissions correspondant à ce rôle, pour le contexte en question et tous les contextes inférieurs. Par exemple, si dans un cours vous attribuez un rôle d\'étudiant à un utilisateur, cet utilisateur aura ce rôle dans le cours, mais également dans les blocs et activités de ce cours.';
$string['assignrolesin'] = 'Attribuer les rôles dans {$a}';
$string['assignrolesrelativetothisuser'] = 'Attribuer les rôles relativement à cet utilisateur';
$string['backtoallroles'] = 'Retour à la liste des rôles';
$string['backup:anonymise'] = 'Anonymiser les données utilisateur des sauvegardes';
$string['backup:backupactivity'] = 'Sauvegarder des activités';
$string['backup:backupcourse'] = 'Sauvegarder des cours';
$string['backup:backupsection'] = 'Sauvegarder des sections';
$string['backup:backuptargethub'] = 'Sauvegarder pour serveur d\'échanges';
$string['backup:backuptargetimport'] = 'Sauvegarder pour importation';
$string['backup:configure'] = 'Configurer les réglages de sauvegarde';
$string['backup:downloadfile'] = 'Télécharger des fichiers des zones de sauvegarde';
$string['backup:userinfo'] = 'Sauvegarder les données des utilisateurs';
$string['block:edit'] = 'Modifier les réglages d\'un bloc';
$string['block:view'] = 'Voir les blocs';
$string['blog:associatecourse'] = 'Associer des articles de blog à des cours';
$string['blog:associatemodule'] = 'Associer des articles de blog à des modules d\'activité';
$string['blog:create'] = 'Créer des articles de blog';
$string['blog:manageentries'] = 'Modifier et gérer des articles de blog';
$string['blog:manageexternal'] = 'Modifier et gérer des blogs externes';
$string['blog:manageofficialtags'] = 'Gérer les tags officiels';
$string['blog:managepersonaltags'] = 'Gérer les tags personnels';
$string['blog:search'] = 'Rechercher dans des articles de blog';
$string['blog:view'] = 'Voir les articles de blog';
$string['blog:viewdrafts'] = 'Voir les articles de blog en brouillon';
$string['calendar:manageentries'] = 'Gérer tous les événements du calendrier';
$string['calendar:managegroupentries'] = 'Gérer les événements de groupes du calendrier';
$string['calendar:manageownentries'] = 'Gérer ses propres événements du calendrier';
$string['capabilities'] = 'Capacités';
$string['capability'] = 'Capacité';
$string['category:create'] = 'Créer les catégories de cours';
$string['category:delete'] = 'Supprimer les catégories de cours';
$string['category:manage'] = 'Gérer les catégories';
$string['category:update'] = 'Modifier les catégories de cours';
$string['category:viewhiddencategories'] = 'Voir les catégories cachées';
$string['category:visibility'] = 'Voir les catégories de cours cachées';
$string['checkglobalpermissions'] = 'Vérifier les permissions système';
$string['checkpermissions'] = 'Voir les permissions';
$string['checkpermissionsin'] = 'Voir les permissions dans {$a}';
$string['checksystempermissionsfor'] = 'Vérifier les permissions système de {$a->fullname}';
$string['checkuserspermissionshere'] = 'Voir les permissions de {$a->fullname} dans ce {$a->contextlevel}';
$string['chooseroletoassign'] = 'Veuillez choisir un rôle à attribuer';
$string['cohort:assign'] = 'Ajouter et retirer des membres aux cohortes';
$string['cohort:manage'] = 'Créer, déplacer et supprimer des cohortes';
$string['cohort:view'] = 'Voir les cohortes du site';
$string['comment:delete'] = 'Supprimer des commentaires';
$string['comment:post'] = 'Écrire des commentaires';
$string['comment:view'] = 'Lire les commentaires';
$string['community:add'] = 'Utiliser le bloc Communauté pour rechercher des cours dans des serveurs d\'échanges';
$string['community:download'] = 'Télécharger des cours depuis le bloc Communauté';
$string['confirmaddadmin'] = 'Voulez-vous vraiment ajouter l\'utilisateur <strong>{$a}</strong> comme nouvel administrateur du site ?';
$string['confirmdeladmin'] = 'Voulez-vous vraiment retirer l\'utilisateur <strong>{$a}</strong> de la liste des administrateurs du site ?';
$string['confirmroleprevent'] = 'Voulez-vous vraiment retirer le rôle <strong>{$a->role}</strong> de la liste des rôles avec autorisation pour la capacité {$a->cap} dans le contexte {$a->context} ?';
$string['confirmroleunprohibit'] = 'Voulez-vous vraiment retirer le rôle <strong>{$a->role}</strong> de la liste des rôles avec interdiction pour la capacité {$a->cap} dans le contexte {$a->context} ?';
$string['confirmunassign'] = 'Voulez-vous vraiment retirer ce rôle à cet utilisateur ?';
$string['confirmunassignno'] = 'Annuler';
$string['confirmunassigntitle'] = 'Confirmer le changement de rôle';
$string['confirmunassignyes'] = 'Retirer';
$string['context'] = 'Contexte';
$string['course:activityvisibility'] = 'Cacher/afficher les activités';
$string['course:bulkmessaging'] = 'Envoyer des messages à de nombreux utilisateurs';
$string['course:changecategory'] = 'Modifier la catégorie du cours';
$string['course:changefullname'] = 'Modifier le nom du cours';
$string['course:changeidnumber'] = 'Modifier le no d\'identification du cours';
$string['course:changeshortname'] = 'Modifier le nom abrégé du cours';
$string['course:changesummary'] = 'Modifier le résumé du cours';
$string['course:create'] = 'Créer des cours';
$string['course:delete'] = 'Supprimer des cours';
$string['course:enrolconfig'] = 'Configurer les instances d\'inscription dans les cours';
$string['course:enrolreview'] = 'Vérifier les inscriptions aux cours';
$string['course:ignorefilesizelimits'] = 'Utiliser des fichiers de taille dépassant toutes les restrictions de taille';
$string['course:manageactivities'] = 'Gérer les activités';
$string['course:managefiles'] = 'Gérer les fichiers';
$string['course:managegrades'] = 'Gérer les notes';
$string['course:managegroups'] = 'Gérer les groupes';
$string['course:managescales'] = 'Gérer les barêmes';
$string['course:markcomplete'] = 'Marquer les utilisateurs comme ayant terminé un cours';
$string['course:publish'] = 'Publier un cours vers un serveur d\'échanges';
$string['course:request'] = 'Demander de nouveaux cours';
$string['course:reset'] = 'Réinitialiser les cours';
$string['course:sectionvisibility'] = 'Contrôler la visibilité des sections';
$string['course:setcurrentsection'] = 'Fixer la section actuelle';
$string['course:update'] = 'Modifier les réglages des cours';
$string['course:useremail'] = 'Activer/désactiver les adresses de courriel';
$string['course:view'] = 'Voir les cours sans y participer';
$string['course:viewcoursegrades'] = 'Voir les notes du cours';
$string['course:viewhiddenactivities'] = 'Voir les activités cachées';
$string['course:viewhiddencourses'] = 'Voir les cours cachés';
$string['course:viewhiddensections'] = 'Voir les sections cachées';
$string['course:viewhiddenuserfields'] = 'Voir les champs utilisateur cachés';
$string['course:viewparticipants'] = 'Voir les participants';
$string['course:viewscales'] = 'Voir les barêmes';
$string['course:visibility'] = 'Cacher/afficher les cours';
$string['createrolebycopying'] = 'Créer un rôle en copiant {$a}';
$string['createthisrole'] = 'Créer ce rôle';
$string['currentcontext'] = 'Contexte actuel';
$string['currentrole'] = 'Rôle actuel';
$string['defaultrole'] = 'Rôle par défaut';
$string['defaultx'] = 'Default : {$a}';
$string['defineroles'] = 'Définition des rôles';
$string['deletecourseoverrides'] = 'Supprimer toutes les dérogations du cours';
$string['deletelocalroles'] = 'Supprimer toutes les attributions de rôles locales';
$string['deleterolesure'] = '<p>Voulez-vous vraiment supprimer le rôle « {$a->name} ({$a->shortname}) » ?</p><p>Ce rôle est actuellement attribué à {$a->count} utilisateurs.</p>';
$string['deletexrole'] = 'Supprimer le rôle {$a}';
$string['duplicaterole'] = 'Dupliquer le rôle';
$string['duplicaterolesure'] = 'Voulez-vous vraiment dupliquer le rôle « {$a->name} ({$a->shortname}) » ?';
$string['editingrolex'] = 'Modification du rôle « {$a} »';
$string['editrole'] = 'Modifier rôle';
$string['editxrole'] = 'Modifier le rôle {$a}';
$string['errorbadrolename'] = 'Nom de rôle incorrect';
$string['errorbadroleshortname'] = 'Nom abrégé du rôle incorrect';
$string['errorexistsrolename'] = 'Ce nom de rôle existe déjà';
$string['errorexistsroleshortname'] = 'Ce nom de rôle abrégé existe déjà';
$string['existingadmins'] = 'Administrateurs du site actuels';
$string['existingusers'] = '{$a} utilisateurs existants';
$string['explanation'] = 'Explication';
$string['extusers'] = 'Utilisateurs existants';
$string['extusersmatching'] = 'Utilisateurs existants correpondant à « {$a} »';
$string['filter:manage'] = 'Gérer les réglages des filtres locaux';
$string['frontpageuser'] = 'Utilisateur authentifié sur la page d\'accueil';
$string['frontpageuserdescription'] = 'Tous les utilisateurs connectés sur le cours page d\'accueil.';
$string['globalrole'] = 'Rôle système';
$string['globalroleswarning'] = 'ATTENTION ! Les rôles que vous attribuez sur cette page s\'appliqueront aux utilisateurs concernés pour l\'intégralité du système, y compris pour la page d\'accueil et pour tous les cours.';
$string['gotoassignroles'] = 'Aller à l\'attribution des rôles pour ce {$a->contextlevel}';
$string['gotoassignsystemroles'] = 'Aller à l\'attribution des rôles système';
$string['grade:edit'] = 'Modifier les notes';
$string['grade:export'] = 'Exporter les notes';
$string['grade:hide'] = 'Cacher/afficher les notes ou éléments';
$string['grade:import'] = 'Importer les notes';
$string['grade:lock'] = 'Verrouiller les notes ou éléments';
$string['grade:manage'] = 'Gérer les éléments d\'évaluation';
$string['grade:managegradingforms'] = 'Gérer les méthodes d\'évaluation avancées';
$string['grade:manageletters'] = 'Gérer les notes lettres';
$string['grade:manageoutcomes'] = 'Gérer les objectifs d\'évaluation';
$string['grade:managesharedforms'] = 'Gérer les modèles de formulaires d\'évaluation avancée';
$string['grade:override'] = 'Court-circuiter les notes';
$string['grade:sharegradingforms'] = 'Partager les modèles de formulaires d\'évaluation avancée';
$string['grade:unlock'] = 'Déverrouiller les notes ou éléments';
$string['grade:view'] = 'Voir ses propres notes';
$string['grade:viewall'] = 'Voir les notes d\'autres utilisateurs';
$string['grade:viewhidden'] = 'Voir ses propres notes cachées';
$string['hidden'] = 'Caché';
$string['highlightedcellsshowdefault'] = 'Les cellules en surbrillance dans le tableau ci-dessous indiquent la permission par défaut pour le rôle modèle spécifié ci-dessus.';
$string['highlightedcellsshowinherit'] = 'Les cellules en surbrillance dans le tableau ci-dessous indiquent s\'il y a lieu la permission qui sera héritée. À part les capacités dont vous voulez modifier les permissions, il est suggéré de laisser le tout sur Hériter.';
$string['inactiveformorethan'] = 'inactif depuis plus de {$a->timeperiod}';
$string['ingroup'] = 'dans le groupe « {$a->group} »';
$string['inherit'] = 'Hériter';
$string['legacy:admin'] = 'RÔLE HISTORIQUE : Administrateur';
$string['legacy:coursecreator'] = 'RÔLE HISTORIQUE : Créateur de cours';
$string['legacy:editingteacher'] = 'RÔLE HISTORIQUE : Enseignant (éditeur)';
$string['legacy:guest'] = 'RÔLE HISTORIQUE :  Visiteur anonyme';
$string['legacy:student'] = 'RÔLE HISTORIQUE : Étudiant';
$string['legacy:teacher'] = 'RÔLE HISTORIQUE : Enseignant (non éditeur)';
$string['legacytype'] = 'Type de rôle historique';
$string['legacy:user'] = 'RÔLE HISTORIQUE : Utilisateur authentifié';
$string['listallroles'] = 'Liste de tous les rôles';
$string['localroles'] = 'Rôles attribués localement';
$string['mainadmin'] = 'Administrateur principal';
$string['mainadminset'] = 'Définir l\'administrateur principal';
$string['manageadmins'] = 'Gérer les administrateurs du site';
$string['manager'] = 'Gestionnaire';
$string['managerdescription'] = 'Les gestionnaires peuvent accéder aux cours et les modifier. En général, ils ne participent pas aux cours.';
$string['manageroles'] = 'Gérer les rôles';
$string['maybeassignedin'] = 'Types de contextes où ce rôle peut être attribué';
$string['morethan'] = 'Plus de {$a}';
$string['multipleroles'] = 'Plusieurs rôles';
$string['my:configsyspages'] = 'Configurer les modèles système pour les pages Mon Moodle';
$string['my:manageblocks'] = 'Gérer les blocs de Mon Moodle';
$string['neededroles'] = 'Rôles avec permission';
$string['nocapabilitiesincontext'] = 'Aucune capacité dans ce contexte';
$string['noneinthisx'] = 'Aucun dans ce {$a}';
$string['noneinthisxmatching'] = 'Aucun utilisateur correspondant à « {$a->search} » dans ce {$a->contexttype}';
$string['noroleassignments'] = 'Aucun rôle n\'est attribué à cet utilisateur dans ce site.';
$string['noroles'] = 'Aucun rôle';
$string['notabletoassignroleshere'] = 'Vous ne pouvez pas attribuer de rôle ici';
$string['notabletooverrideroleshere'] = 'Vous ne pouvez modifier ici aucune permission pour aucun rôle';
$string['notes:manage'] = 'Gérer les annotations';
$string['notes:view'] = 'Voir les annotations';
$string['notset'] = 'Non défini';
$string['overrideanotherrole'] = 'Définir une dérogation pour un autre rôle';
$string['overridecontext'] = 'Contexte de dérogation';
$string['overridepermissions'] = 'Définir des dérogations aux permissions';
$string['overridepermissionsforrole'] = 'Définir des dérogations pour le rôle {$a->role} dans {$a->context}';
$string['overridepermissions_help'] = '<!-- $Id$ -->


<p>Les dérogations sont des permissions spécifiques destinées à remplacer celles d\'un rôle dans un contexte spécifique, vous permettant de régler plus finement vos permissions suivant vos besoins.</p>

<p>Par exemple, si des utilisateurs avec un rôle Étudiant dans votre cours peuvent commencer des discussions dans des forums, et que vous voulez que dans un forum déterminé ils ne puissent le faire, vous pouvez définir une dérogation qui EMPÊCHE pour les étudiants la capacité de « Commencer des discussions ».</p>

<p>Les dérogations peuvent aussi être utilisées pour donner plus de droits dans certaines zones de votre site et cours, lorsque cela peut être utile. Par exemple, vous pouvez essayer d\'expérimenter la capacité pour les étudiants de donner des notes à certains devoirs.</p>

<p>L\'interface est similaire à celle destinée à définir les rôles, à part que seules les capacités pertinentes sont affichées, et que vous y verrez certaines capacités mises en évidence pour vous montrer quelle permission aurait ce rôle sans dérogation active (c\'est-à-dire lorsque la dérogation est réglée sur HÉRITER).</p>

<p>Voir aussi <a href="help.php?file=roles.html">Rôles</a>, <a href="help.php?file=contexts.html">Contextes</a>, <a href="help.php?file=assignroles.html">Attribuer des rôles</a> et <a href="help.php?file=permissions.html">Permissions</a>.</p>';
$string['overridepermissionsin'] = 'Définir des dérogations aux permissions dans {$a}';
$string['overrideroles'] = 'Définir des dérogations aux rôles';
$string['overriderolesin'] = 'Définir des dérogations aux rôles dans {$a}';
$string['overrides'] = 'Dérogations';
$string['overridesbycontext'] = 'Dérogations (par contexte)';
$string['permission'] = 'Permission';
$string['permission_help'] = 'Les permissions sont les réglages que vous accordez pour des capacités spécifiques. Il y a quatre possibilités pour les permissions :

* Non défini
* Autoriser : la permission est donnée pour cette capacité
* Empêcher : la permission n\'est pas donnée pour cette capacité
* Interdire : la permission est totalement refusée pour cette capacité et ne peut pas être accordée dans un contexte inférieur (plus spécifique)';
$string['permissions'] = 'Permissions';
$string['permissionsforuser'] = 'Permissions pour l\'utilisateur {$a}';
$string['permissionsincontext'] = 'Permissions dans {$a}';
$string['portfolio:export'] = 'Exporter vers des portfolios';
$string['potentialusers'] = '{$a} utilisateurs potentiels';
$string['potusers'] = 'Utilisateurs potentiels';
$string['potusersmatching'] = 'Utilisateurs potentiels correspondant à « {$a} »';
$string['prevent'] = 'Empêcher';
$string['prohibit'] = 'Interdire';
$string['prohibitedroles'] = 'Interdit';
$string['question:add'] = 'Ajouter des questions';
$string['question:config'] = 'Configurer les types de question';
$string['question:editall'] = 'Modifier toutes les questions';
$string['question:editmine'] = 'Modifier ses propres questions';
$string['question:flag'] = 'Marquer les questions auxquelles on répond';
$string['question:managecategory'] = 'Modifier les catégories de questions';
$string['question:moveall'] = 'Déplacer toutes les questions';
$string['question:movemine'] = 'Déplacer ses propres questions';
$string['question:useall'] = 'Utiliser toutes les questions';
$string['question:usemine'] = 'Utiliser ses propres questions';
$string['question:viewall'] = 'Voir toutes les questions';
$string['question:viewmine'] = 'Voir ses propres questions';
$string['rating:rate'] = 'Ajouter des notes aux éléments';
$string['rating:view'] = 'Voir la note globale que vous avez reçue';
$string['rating:viewall'] = 'Voir toutes les notes brutes reçues';
$string['rating:viewany'] = 'Voir les notes globales de tout le monde';
$string['resetrole'] = 'Réinitialiser le rôle';
$string['resetrolenolegacy'] = 'Réinitialiser les autorisations';
$string['resetrolesure'] = '<p>Voulez-vous vraiment revenir aux réglages par défaut du rôle « {$a->name} ({$a->shortname}) » ?</p><p>Ces réglages sont repris du rôle modèle sélectionné ({$a->legacytype}).</p>';
$string['resetrolesurenolegacy'] = 'Voulez-vous vraiment réinitialiser toutes les autorisations définies dans le rôle « {$a->name} ({$a->shortname}) » ?';
$string['restore:configure'] = 'Configurer les réglages de restauration';
$string['restore:createuser'] = 'Créer des utilisateurs lors des restaurations';
$string['restore:restoreactivity'] = 'Restaurer des activités';
$string['restore:restorecourse'] = 'Restaurer des cours';
$string['restore:restoresection'] = 'Restaurer des sections';
$string['restore:restoretargethub'] = 'Restaurer à partir de fichiers pour serveurs d\'échanges';
$string['restore:restoretargetimport'] = 'Restaurer à partir de fichiers pour importation';
$string['restore:rolldates'] = 'Autoriser la modification des dates des activités lors des restaurations';
$string['restore:uploadfile'] = 'Déposer des fichiers dans les zones de sauvegarde';
$string['restore:userinfo'] = 'Restaurer les données des utilisateurs';
$string['restore:viewautomatedfilearea'] = 'Restaurer les cours à partir des backups automatiques';
$string['risks'] = 'Risques';
$string['roleallowheader'] = 'Permettre le rôle';
$string['roleallowinfo'] = 'Sélectionner un rôle à ajouter à la liste des rôles avec permission pour la capacité {$a->cap} dans le contexte {$a->context} :';
$string['role:assign'] = 'Attribuer des rôles aux utilisateurs';
$string['roleassignments'] = 'Attributions de rôle';
$string['roledefinitions'] = 'Définitions des rôles';
$string['rolefullname'] = 'Nom';
$string['roleincontext'] = '{$a->role} dans {$a->context}';
$string['role:manage'] = 'Créer et gérer les rôles';
$string['role:override'] = 'Définir des dérogations pour d\'autres utilisateurs';
$string['roleprohibitheader'] = 'Interdire le rôle';
$string['roleprohibitinfo'] = 'Sélectionner un rôle à ajouter à la liste des rôles avec interdiction pour la capacité {$a->cap} dans le contexte {$a->context} :';
$string['role:review'] = 'Vérifier les permissions pour autres';
$string['roles'] = 'Rôles';
$string['role:safeoverride'] = 'Définir des dérogations aux capacités sûres pour d\'autres utilisateurs';
$string['roleselect'] = 'Sélectionner rôle';
$string['rolesforuser'] = 'Rôles de l\'utilisateur {$a}';
$string['roles_help'] = '<!-- $Id$ -->


<p>Un rôle est une collection de permissions définies pour la totalité d\'un système Moodle, que l\'on peut attribuer à des utilisateurs déterminés dans des contextes déterminés.</p>

<p>Par exemple, un rôle appelé « Enseignant » peut être défini, permettant à des enseignants d\'effectuer certaines actions (et non d\'autres). Si un tel rôle existe, il est possible de l\'attribuer dans un cours à un utilisateur, pour en faire un enseignant dans ce cours. Vous pouvez également attribuer ce rôle dans le contexte d\'une catégorie de cours, pour en faire un « Enseignant » dans tous les cours de cette catégorie, ou attribuer ce rôle à quelqu\'un dans un seul forum, lui donnant ces capacités dans ce seul forum.</p>

<p>Un rôle doit avoir un <strong>nom</strong>. Si vous devez dénommer un rôle dans diverses langues, vous pouvez utiliser la syntaxe du filtre multilingue, par exemple</p>

<pre>
  &lt;span lang="fr" class="multilang"&gt;Enseignant&lt;/span&gt;
  &lt;span lang="de" class="multilang"&gt;Dozent&lt;/span&gt;
  &lt;span lang="en" class="multilang"&gt;Teacher&lt;/span&gt;
  &lt;span lang="es_es" class="multilang"&gt;Profesor&lt;/span&gt;
  </pre>

<p>Si vous le faites, assurez-vous que le réglage « Filtrer toutes les chaînes de caractères » soit activé sur votre Moodle.</p>

<p>Le <strong>Nom abrégé</strong> est nécessaire pour pouvoir être utilisé par d\'autres composants de Moodle devant se référer à vos rôles (par exemple lors de l\'importation de nouveaux utilisateurs à partir d\'un fichier ou de l\'inscription aux cours par une méthode d\'inscription).</p>

<p>La <strong>description</strong> sert simplement à décrire le rôle dans vos propres mots, afin que l\'on puisse comprendre facilement à quoi correspond ce rôle.</p>

<p>Voir aussi <a href="help.php?file=contexts.html">Contextes</a>, <a href="help.php?file=permissions.html">Permissions</a>, <a href="help.php?file=assignroles.html">Attribuer des rôles</a> et <a href="help.php?file=overrides.html">Dérogations</a>.</p>';
$string['roleshortname'] = 'Nom abrégé';
$string['role:switchroles'] = 'Prendre d\'autres rôles';
$string['roletoassign'] = 'Rôle à attribuer';
$string['roletooverride'] = 'Rôle pour lequel définir des dérogations';
$string['safeoverridenotice'] = 'Remarque : les capacités comportant des risques élevés sont verrouillées, car vous n\'êtes autorisé à définir des dérogations que pour des capacités sûres.';
$string['selectanotheruser'] = 'Sélectionner un autre utilisateur';
$string['selectauser'] = 'Sélectionner un utilisateur';
$string['selectrole'] = 'Sélectionner un rôle';
$string['showallroles'] = 'Afficher tous les rôles';
$string['showthisuserspermissions'] = 'Afficher les permissions de cet utilisateur';
$string['site:accessallgroups'] = 'Accéder à tous les groupes';
$string['siteadministrators'] = 'Administrateurs du site';
$string['site:approvecourse'] = 'Approuver la création de cours';
$string['site:backup'] = 'Sauvegarder les cours';
$string['site:config'] = 'Modifier la configuration du site';
$string['site:doanything'] = 'Permettre de tout faire';
$string['site:doclinks'] = 'Afficher les liens vers les documents externes';
$string['site:import'] = 'Importer d\'autres cours dans un cours';
$string['site:manageblocks'] = 'Gérer les blocs sur une page';
$string['site:mnetloginfromremote'] = 'Se connecter depuis une application distante via MNet';
$string['site:mnetlogintoremote'] = 'Accéder à une application distante via MNet';
$string['site:readallmessages'] = 'Lire tous les messages sur le site';
$string['site:restore'] = 'Restaurer les cours';
$string['site:sendmessage'] = 'Envoyer des messages à tous les utilisateurs';
$string['site:trustcontent'] = 'Se fier aux contenus';
$string['site:uploadusers'] = 'Importer de nouveaux utilisateurs à partir d\'un fichier';
$string['site:viewfullnames'] = 'Toujours voir les noms complets des utilisateurs';
$string['site:viewparticipants'] = 'Voir les participants';
$string['site:viewreports'] = 'Afficher les rapports';
$string['site:viewuseridentity'] = 'Voir l\'identité complète des utilisateurs dans les listes';
$string['tag:create'] = 'Créer de nouveaux tags';
$string['tag:edit'] = 'Modifier les tags existants';
$string['tag:editblocks'] = 'Modifier les blocs sur les pages de tags';
$string['tag:manage'] = 'Gérer tous les tags';
$string['thisusersroles'] = 'Rôles de cet utilisateur';
$string['unassignarole'] = 'Retirer l\'attribution du rôle {$a}';
$string['unassignconfirm'] = 'Voulez-vous vraiment retirer l\'attribution du rôle « {$a->role} » de l\'utilisateur « {$a->user} »?';
$string['unassignerror'] = 'Erreur lors du retrait du rôle {$a->role} de l\'utilisateur {$a->user}.';
$string['user:changeownpassword'] = 'Modifier son propre mot de passe';
$string['user:create'] = 'Créer les utilisateurs';
$string['user:delete'] = 'Supprimer les utilisateurs';
$string['user:editmessageprofile'] = 'Modifier le profil utilisateur de messagerie';
$string['user:editownmessageprofile'] = 'Modifier son propre profil utilisateur de messagerie';
$string['user:editownprofile'] = 'Modifier son propre profil';
$string['user:editprofile'] = 'Modifier le profil de l\'utilisateur';
$string['user:loginas'] = 'Se connecter en tant que d\'autres utilisateurs';
$string['user:manageblocks'] = 'Gérer les blocs sur le profil d\'autres utilisateurs';
$string['user:manageownblocks'] = 'Gérer les blocs sur son propre profil public';
$string['user:manageownfiles'] = 'Gérer ses propres fichiers personnels';
$string['user:managesyspages'] = 'Configurer la disposition par défaut de la page des profils publics';
$string['user:readuserblogs'] = 'Voir les blogs de tous les utilisateurs';
$string['user:readuserposts'] = 'Voir les messages de tous les utilisateurs';
$string['usersfrom'] = 'Utilisateurs de {$a}';
$string['usersfrommatching'] = 'Utilisateurs de {$a->contextname} correspondant à « {$a->search} »';
$string['usersinthisx'] = 'Utilisateurs dans ce {$a}';
$string['usersinthisxmatching'] = 'Utilisateurs dans ce {$a->contexttype} correspondant à « {$a->search} »';
$string['userswithrole'] = 'Tous les utilisateurs avec un rôle';
$string['userswiththisrole'] = 'Utilisateurs avec ce rôle';
$string['user:update'] = 'Mettre à jour les profils des utilisateurs';
$string['user:viewalldetails'] = 'Afficher toutes les infos utilisateur';
$string['user:viewdetails'] = 'Voir les profils des utilisateurs';
$string['user:viewhiddendetails'] = 'Voir les informations cachées des utilisateurs';
$string['user:viewuseractivitiesreport'] = 'Voir les rapports d\'activités des utilisateurs';
$string['user:viewusergrades'] = 'Voir les notes des utilisateurs';
$string['useshowadvancedtochange'] = 'Utiliser « Afficher éléments supplémentaires » pour effectuer des modifications';
$string['viewingdefinitionofrolex'] = 'Affichage de la définition du rôle « {$a} »';
$string['viewrole'] = 'Afficher les détails du rôle';
$string['webservice:createmobiletoken'] = 'Créer un jeton de service web pour accès mobile';
$string['webservice:createtoken'] = 'Créer un jeton de service web';
$string['whydoesuserhavecap'] = 'Pourquoi {$a->fullname} a la capacité {$a->capability} dans le contexte {$a->context} ?';
$string['whydoesusernothavecap'] = 'Pourquoi {$a->fullname} n\'a pas la capacité {$a->capability} dans le contexte {$a->context} ?';
$string['xroleassignments'] = 'Attributions de rôles de {$a}';
$string['xuserswiththerole'] = 'Utilisateurs ayant le rôle « {$a->role} »';
