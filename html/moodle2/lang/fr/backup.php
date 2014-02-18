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
 * Strings for component 'backup', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Ce réglage permet d\'activer ou non les sauvegardes automatiques. Si l\'option « Manuelle » est sélectionnée, les sauvegardes automatiques ne pourront avoir lieu que via le script en ligne de commande, lancé manuellement ou via un cron spécifique.';
$string['autoactivedisabled'] = 'Désactivée';
$string['autoactiveenabled'] = 'Activée';
$string['autoactivemanual'] = 'Manuelle';
$string['automatedbackupschedule'] = 'Planification';
$string['automatedbackupschedulehelp'] = 'Choisissez le jour de la semaine durant lequel lancer les sauvegardes automatiques.';
$string['automatedbackupsinactive'] = 'Les sauvegardes automatiques n\'ont pas été activées par l\'administrateur du site';
$string['automatedbackupstatus'] = 'Statut des sauvegardes automatiques';
$string['automatedsettings'] = 'Réglages de la sauvegarde programmée';
$string['automatedsetup'] = 'Sauvegarde automatique';
$string['automatedstorage'] = 'Stockage des sauvegardes automatiques';
$string['automatedstoragehelp'] = 'Spécifiez l\'endroit où vous voulez que les sauvegardes soient enregistrées quand elles sont créées automatiquement.';
$string['backupactivity'] = 'Sauvegarde activité : {$a}';
$string['backupcourse'] = 'Sauvegarde cours : {$a}';
$string['backupcoursedetails'] = 'Détails du cours';
$string['backupcoursesection'] = 'Section : {$a}';
$string['backupcoursesections'] = 'Sections du cours';
$string['backupdate'] = 'Date de la sauvegarde';
$string['backupdetails'] = 'Détails de la sauvegarde';
$string['backupdetailsnonstandardinfo'] = 'Le fichier sélectionné n\'est pas un fichier de sauvegarde standard de Moodle. Le processus de restauration va tenter de le convertir dans le format standard, puis de le restaurer.';
$string['backupformat'] = 'Format';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Format inconnu';
$string['backupmode'] = 'Mode';
$string['backupmode10'] = 'Général';
$string['backupmode20'] = 'Importer';
$string['backupmode30'] = 'Serveur d\'échanges';
$string['backupmode40'] = 'Même site';
$string['backupmode50'] = 'Automatisé';
$string['backupmode60'] = 'Converti';
$string['backupsection'] = 'Sauvegarde section de cours : {$a}';
$string['backupsettings'] = 'Réglages des sauvegardes';
$string['backupsitedetails'] = 'Détails du site';
$string['backupstage16action'] = 'Continuer';
$string['backupstage1action'] = 'Suivant';
$string['backupstage2action'] = 'Suivant';
$string['backupstage4action'] = 'Effectuer la sauvegarde';
$string['backupstage8action'] = 'Continuer';
$string['backuptype'] = 'Type';
$string['backuptypeactivity'] = 'Activité';
$string['backuptypecourse'] = 'Cours';
$string['backuptypesection'] = 'Section';
$string['backupversion'] = 'Version de sauvegarde';
$string['cannotfindassignablerole'] = 'Le rôle {$a} du fichier de sauvegarde ne peut être mis en correspondance avec aucun des rôles que vous pouvez attribuer.';
$string['choosefilefromactivitybackup'] = 'Zone de sauvegarde d\'activités';
$string['choosefilefromactivitybackup_help'] = 'Lors des sauvegardes d\'activités avec les réglages par défaut, les fichiers de sauvegarde seront enregistrés ici';
$string['choosefilefromautomatedbackup'] = 'Sauvegardes automatiques';
$string['choosefilefromautomatedbackup_help'] = 'Contient les sauvegardes créées automatiquement';
$string['choosefilefromcoursebackup'] = 'Zone de sauvegarde de cours';
$string['choosefilefromcoursebackup_help'] = 'Lors de la sauvegarde de cours en utilisant les réglages par défaut, les fichiers de sauvegarde seront stockés ici';
$string['choosefilefromuserbackup'] = 'Zone de sauvegarde privée';
$string['choosefilefromuserbackup_help'] = 'Lors de la sauvegarde de cours avec l\'option d\'anonymisation, les fichiers de sauvegarde seront stockés ici';
$string['configgeneralactivities'] = 'Détermine le réglage par défaut pour l\'inclusion des activités dans les sauvegardes.';
$string['configgeneralanonymize'] = 'Détermine le réglage par défaut pour l\'anonymisation dans les sauvegardes de toutes les données relatives aux utilisateurs';
$string['configgeneralblocks'] = 'Détermine le réglage par défaut pour l\'inclusion des blocs dans les sauvegardes.';
$string['configgeneralcomments'] = 'Détermine le réglage par défaut pour l\'inclusion des commentaires dans les sauvegardes.';
$string['configgeneralfilters'] = 'Détermine le réglage par défaut pour l\'inclusion des filtres dans les sauvegardes.';
$string['configgeneralhistories'] = 'Détermine le réglage par défaut pour l\'inclusion de l\'historique des activités des utilisateurs dans les sauvegardes.';
$string['configgenerallogs'] = 'Détermine le réglage par défaut pour l\'inclusion des historiques dans les sauvegardes.';
$string['configgeneralroleassignments'] = 'Détermine le réglage par défaut pour l\'inclusion des attributions de rôles dans les sauvegardes';
$string['configgeneralusers'] = 'Détermine le réglage par défaut pour l\'inclusion des utilisateurs dans les sauvegardes';
$string['configgeneraluserscompletion'] = 'Détermine le réglage par défaut pour l\'inclusion des informations d\'achèvement d\'activité dans les sauvegardes';
$string['configloglifetime'] = 'Cette valeur spécifie la durée pendant laquelle vous voulez conserver les historiques des sauvegardes. Les historiques plus anciens seront supprimés automatiquement. Il est recommandé d\'indiquer une petite valeur, car les informations stockées dans ces historiques peuvent être énormes.';
$string['confirmcancel'] = 'Annuler la sauvegarde';
$string['confirmcancelno'] = 'Effectuer la sauvegarde';
$string['confirmcancelquestion'] = 'Voulez-vous vraiment annuler la sauvegarde ?
Toutes les informations saisies seront perdues.';
$string['confirmcancelyes'] = 'Annuler la sauvegarde';
$string['confirmnewcoursecontinue'] = 'Avertissement de nouveau cours';
$string['confirmnewcoursecontinuequestion'] = 'Un cours temporaire (caché) va être créé lors du processus de restauration du cours. Pour annuler la restauration, cliquer sur Annuler. Ne pas fermer la fenêtre du navigateur durant la restauration.';
$string['coursecategory'] = 'Catégorie où le cours sera restauré';
$string['courseid'] = 'Identifiant original';
$string['coursesettings'] = 'Réglages du cours';
$string['coursetitle'] = 'Titre';
$string['currentstage1'] = 'Réglages initiaux';
$string['currentstage16'] = 'Terminé';
$string['currentstage2'] = 'Réglages du schéma de sauvegarde';
$string['currentstage4'] = 'Confirmation';
$string['currentstage8'] = 'Effectuer la sauvegarde';
$string['dependenciesenforced'] = 'Vos réglages ont été modifiés en raison de contraintes non respectées';
$string['enterasearch'] = 'Saisir une expression à rechercher';
$string['error_block_for_module_not_found'] = 'Instance de bloc orpheline (id : {$a->bid}) trouvée dans un module de cours (id : {$a->mid}). Ce bloc ne sera pas sauvegardé.';
$string['error_course_module_not_found'] = 'Module de cours orphelin (id : {$a->mid}) trouvé. Ce module ne sera pas sauvegardé.';
$string['errorfilenamemustbezip'] = 'Le fichier doit être un fichier au format ZIP et son nom doit avoir l\'extension .mbz';
$string['errorfilenamerequired'] = 'Veuillez saisir un nom de fichier valide pour cette sauvegarde';
$string['errorinvalidformat'] = 'Format de sauvegarde inconnu';
$string['errorinvalidformatinfo'] = 'Le fichier sélectionné n\'est pas un fichier de sauvegarde Moodle valide et ne peut pas être restauré.';
$string['errorminbackup20version'] = 'Restauration impossible. Ce fichier de sauvegarde a été créé avec une version de développement du moteur de sauvegardes de Moodle ({$a->backup}). La version minimale requise pour la restaurer est {$a->min}.';
$string['errorrestorefrontpage'] = 'La restauration de la page d\'accueil n\'est pas autorisée.';
$string['executionsuccess'] = 'Le fichier de sauvegarde a été enregistré correctement.';
$string['filealiasesrestorefailures'] = 'Échec de la restauration des alias';
$string['filealiasesrestorefailures_help'] = 'Les alias sont des liens vers d\'autres fichiers, y compris ceux qui sont stockés dans des dépôts externes. Dans certains cas, Moodle ne peut pas les restaurer, par exemple lors de la restauration de sauvegardes d\'un autre site ou si le fichier lié n\'existe pas.

Plus de détails sur la raison de l\'échec peuvent être trouvés dans l\'historique de restauration.';
$string['filealiasesrestorefailuresinfo'] = 'Certains alias inclus dans le fichier de sauvegarde n\'ont pas pu être restaurés. La liste ci-dessous contient leur emplacement attendu et le fichier source vers lequel ils pointaient dans le site original.';
$string['filename'] = 'Nom de fichier';
$string['filereferencesincluded'] = 'Des liens vers des contenus externes sont inclus dans le fichier de sauvegarde. Ces liens ne fonctionneront pas sur d\'autres sites.';
$string['filereferencesnotsamesite'] = 'Le fichier de sauvegarde provient d\'un site différent. Les liens vers des contenus externes ne peuvent pas être restaurés.';
$string['filereferencessamesite'] = 'Le fichier de sauvegarde provient de ce site. Les liens vers des contenus externes peuvent être restaurés.';
$string['generalactivities'] = 'Inclure les activités';
$string['generalanonymize'] = 'Anonymiser les informations';
$string['generalbackdefaults'] = 'Réglages généraux par défaut des sauvegardes';
$string['generalblocks'] = 'Inclure les blocs';
$string['generalcomments'] = 'Inclure les commentaires';
$string['generalfilters'] = 'Inclure les filtres';
$string['generalgradehistories'] = 'Inclure les historiques';
$string['generalhistories'] = 'Inclure l\'historique des activités des utilisateurs';
$string['generallogs'] = 'Inclure les historiques';
$string['generalroleassignments'] = 'Inclure les attributions de rôles';
$string['generalsettings'] = 'Réglages généraux des sauvegardes';
$string['generalusers'] = 'Inclure les utilisateurs';
$string['generaluserscompletion'] = 'Inclure les informations d\'achèvement d\'activité';
$string['importbackupstage16action'] = 'Continuer';
$string['importbackupstage1action'] = 'Suite';
$string['importbackupstage2action'] = 'Suite';
$string['importbackupstage4action'] = 'Effectuer l\'importation';
$string['importbackupstage8action'] = 'Continuer';
$string['importcurrentstage0'] = 'Sélection de cours';
$string['importcurrentstage1'] = 'Réglages initiaux';
$string['importcurrentstage16'] = 'Terminer';
$string['importcurrentstage2'] = 'Réglages du schéma';
$string['importcurrentstage4'] = 'Confirmation et relecture';
$string['importcurrentstage8'] = 'Effectuer l\'importation';
$string['importfile'] = 'Importer un fichier de sauvegarde';
$string['importsuccess'] = 'Importation terminée. Cliquer sur continuer pour revenir au cours.';
$string['includeactivities'] = 'Inclure :';
$string['includeditems'] = 'Éléments inclus :';
$string['includefilereferences'] = 'Liens vers des contenus externes';
$string['includesection'] = 'Section {$a}';
$string['includeuserinfo'] = 'Données utilisateur';
$string['locked'] = 'Verrouillé';
$string['lockedbyconfig'] = 'Ce réglage a été verrouillé par les réglages par défaut des sauvegardes';
$string['lockedbyhierarchy'] = 'Verrouillé en raison de contraintes';
$string['lockedbypermission'] = 'Vous n\'avez pas les droits d\'accès nécessaires à la modification de ce réglage';
$string['loglifetime'] = 'Conserver les historiques durant';
$string['managefiles'] = 'Gérer les fichiers de sauvegarde';
$string['missingfilesinpool'] = 'Certains fichiers n\'ont pas pu être enregistrés durant la sauvegarde. Ils ne pourront pas être restaurés.';
$string['module'] = 'Module';
$string['moodleversion'] = 'Version de Moodle';
$string['morecoursesearchresults'] = 'Plus de {$a} cours trouvés, affichage des {$a} premiers';
$string['moreresults'] = 'Il y a trop de résultats. Veuillez saisir une expression à rechercher plus spécifique.';
$string['nomatchingcourses'] = 'Aucun cours à afficher';
$string['norestoreoptions'] = 'Il n\'y a pas de catégorie, ni de cours où effectuer la restauration.';
$string['originalwwwroot'] = 'URL de la sauvegarde';
$string['previousstage'] = 'Étape précédente';
$string['qcategory2coursefallback'] = 'La catégorie de questions « {$a->name} », située dans le contexte de catégorie system/course dans le fichier de sauvegarde, sera créée dans le contexte du cours durant la restauration';
$string['qcategorycannotberestored'] = 'La catégorie de questions « {$a->name} » ne peut pas être créée durant la restauration';
$string['question2coursefallback'] = 'La catégorie de questions « {$a->name} », située dans le contexte de catégorie system/course dans le fichier de sauvegarde, sera créée dans le contexte du cours durant la restauration';
$string['questionegorycannotberestored'] = 'La catégorie de questions « {$a->name} » ne peut pas être créée durant la restauration';
$string['restoreactivity'] = 'Restaurer l\'activité';
$string['restorecourse'] = 'Restaurer le cours';
$string['restorecoursesettings'] = 'Réglages du cours';
$string['restoreexecutionsuccess'] = 'Le cours a été restauré avec succès. En cliquant sur le bouton Continuer, vous serez dirigé vers la page d\'accueil du cours.';
$string['restorefileweremissing'] = 'Certains fichiers n\'ont pas pu être restaurés, car ils n\'étaient pas présents dans la sauvegarde.';
$string['restorenewcoursefullname'] = 'Nouveau nom du cours';
$string['restorenewcourseshortname'] = 'Nouveau nom abrégé du cours';
$string['restorenewcoursestartdate'] = 'Nouvelle date de début';
$string['restorerolemappings'] = 'Correspondance des rôles à restaurer';
$string['restorerootsettings'] = 'Réglages de restauration';
$string['restoresection'] = 'Restaurer la section';
$string['restorestage1'] = 'Confirmer';
$string['restorestage16'] = 'Revoir';
$string['restorestage16action'] = 'Effectuer la restauration';
$string['restorestage1action'] = 'Suivant';
$string['restorestage2'] = 'Destination';
$string['restorestage2action'] = 'Suivant';
$string['restorestage32'] = 'Effectuer la restauration';
$string['restorestage32action'] = 'Continuer';
$string['restorestage4'] = 'Réglages';
$string['restorestage4action'] = 'Suivant';
$string['restorestage64'] = 'Terminer';
$string['restorestage64action'] = 'Continuer';
$string['restorestage8'] = 'Schéma';
$string['restorestage8action'] = 'Suivant';
$string['restoretarget'] = 'Lieu de restauration';
$string['restoretocourse'] = 'Restaurer vers le cours';
$string['restoretocurrentcourse'] = 'Restaurer dans ce cours';
$string['restoretocurrentcourseadding'] = 'Fusionner le cours sauvegardé avec ce cours';
$string['restoretocurrentcoursedeleting'] = 'Supprimer le contenu de ce cours, puis restaurer';
$string['restoretoexistingcourse'] = 'Restaurer dans un cours existant';
$string['restoretoexistingcourseadding'] = 'Fusionner le cours sauvegardé dans le cours existant';
$string['restoretoexistingcoursedeleting'] = 'Supprimer le contenu du cours existant, puis restaurer';
$string['restoretonewcourse'] = 'Restaurer comme nouveau cours';
$string['restoringcourse'] = 'Restauration du cours en cours';
$string['restoringcourseshortname'] = 'Restauration';
$string['rootenrolmanual'] = 'Restaurer comme inscriptions manuelles';
$string['rootsettingactivities'] = 'Inclure les activités';
$string['rootsettinganonymize'] = 'Anonymiser les informations des utilisateurs';
$string['rootsettingblocks'] = 'Inclure les blocs';
$string['rootsettingcalendarevents'] = 'Inclure les événements du calendrier';
$string['rootsettingcomments'] = 'Inclure les commentaires';
$string['rootsettingfilters'] = 'Inclure les filtres';
$string['rootsettinggradehistories'] = 'Inclure les historiques des notes';
$string['rootsettingimscc1'] = 'Convertir en IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = 'Convertir en IMS Common Cartridge 1.1';
$string['rootsettinglogs'] = 'Inclure les historiques du cours';
$string['rootsettingroleassignments'] = 'Inclure les attributions de rôles';
$string['rootsettings'] = 'Réglages de la sauvegarde';
$string['rootsettingusers'] = 'Inclure les utilisateurs inscrits';
$string['rootsettinguserscompletion'] = 'Inclure les données détaillées d\'achèvement d\'activité';
$string['sectionactivities'] = 'Activités';
$string['sectioninc'] = 'Inclus dans la sauvegarde (pas de données utilisateur)';
$string['sectionincanduser'] = 'Inclus dans la sauvegarde avec des données utilisateur';
$string['selectacategory'] = 'Sélectionner une catégorie';
$string['selectacourse'] = 'Sélectionner un cours';
$string['setting_course_fullname'] = 'Nom du cours';
$string['setting_course_shortname'] = 'Nom abrégé du cours';
$string['setting_course_startdate'] = 'Date de début du cours';
$string['setting_keep_groups_and_groupings'] = 'Conserver les groupes et groupements actuels';
$string['setting_keep_roles_and_enrolments'] = 'Conserver les rôles et droits d\'accès actuels';
$string['setting_overwriteconf'] = 'Écraser la configuration du cours';
$string['skiphidden'] = 'Omettre les cours cachés';
$string['skiphiddenhelp'] = 'Choisir s\'il faut ou non omettre les cours cachés';
$string['skipmodifdays'] = 'Omettre les cours non modifiés depuis';
$string['skipmodifdayshelp'] = 'Choisir s\'il faut ou non omettre les cours non modifiés depuis un certain nombre de jours';
$string['skipmodifprev'] = 'Omettre les cours non modifiés depuis la dernière sauvegarde';
$string['skipmodifprevhelp'] = 'Choisir s\'il faut ou non omettre les cours n\'ayant pas été modifiés depuis la dernière sauvegarde';
$string['storagecourseandexternal'] = 'Zone de sauvegarde de cours et dossier spécifié';
$string['storagecourseonly'] = 'Zone de sauvegarde de cours';
$string['storageexternalonly'] = 'Dossier spécifié pour les sauvegardes automatiques';
$string['title'] = 'Titre';
$string['totalcategorysearchresults'] = 'Nombre de catégories : {$a}';
$string['totalcoursesearchresults'] = 'Nombre de cours : {$a}';
$string['unnamedsection'] = 'Section sans nom';
$string['userinfo'] = 'Info utilisateur';
