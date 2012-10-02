<?php // $Id: debug.php,v 1.24 2009/12/14 09:22:14 mudrd8mz Exp $
/*
 * debug information for developer only
 */
$string['authpluginnotfound'] = 'Méthode d\'authentification $a introuvable.';
$string['blocknotexist'] = 'Le bloc $a n\'existe pas';
$string['cannotbenull'] = '$a ne peut pas être nul !';
$string['cannotcreateadminuser'] = 'ERREUR GRAVE ! Impossible de créer un compte administrateur !';
$string['cannotdowngrade'] = 'Impossible de faire revenir $a->plugin de $a->oldversion vers $a->newversion.';
$string['cannotfindadmin'] = 'Impossible de trouver un administrateur !';
$string['cannotinitpage'] = 'Impossible d\'initialiser complètement la page : $a->name, identifiant $a->id non valide';
$string['cannotsetupsite'] = 'Erreur grave ! Impossible de mettre en place le site !';
$string['cannotsetuptable'] = '$a tables n\'ont pas pu être configurées correctement !';
$string['cannotupdaterelease'] = 'Erreur : impossible de mettre à jour la version dans la base de données !!';
$string['cannotupdateversion'] = 'Échec de la mise à jour ! (Impossible de mettre à jour la version dans la table config)';
$string['cannotupgradecapabilities'] = 'Problèmes lors de la mise à jour des capacités centrales du systèmes des rôles';
$string['cannotupgradedbcustom'] = 'Échec de la mise à jour des particularités locales de la base de données ! (Impossible de mettre à jour la version dans la table config)';
$string['codingerror'] = 'Erreur de programmation détectée. Ceci doit être corrigé par un programmeur : $a';
$string['configmoodle'] = 'Moodle n\'a pas encore été configuré. Vous devez avant tout écrire le fichier config.php.';
$string['dbnotinsert'] = 'Erreur de base de données - Insertion impossible ($a)';
$string['dbnotsetup'] = 'Erreur : la base de données principale <b>n\'a pas été mise en place</b> correctement';
$string['dbnotsupport'] = 'Erreur : votre base de données ($a) n\'est pas totalement supportée par Moodle ou le fichier install.xml n\'est pas présent. Voyez dans le dossier lib/db.';
$string['dbnotupdate'] = 'Erreur de base de données - Modification impossible ($a)';
$string['doesnotworkwitholdversion'] = 'Ce script ne fonctionne pas avec cette ancienne version de Moodle';
$string['erroroccur'] = 'Une erreur est survenue durant cette procédure';
$string['fixsetting'] = 'Veuillez corriger ces réglages dans votre fichier config.php. <p>Il y est indiqué</p> <p>\$CFG->dirroot = \'$a->current\';</p> <p>alors qu\'il devrait y avoir</p> <p>\$CFG->dirroot = \'$a->found\';</p>';
$string['invalidarraysize'] = 'Taille incorrecte des tableaux dans les paramètres de $a';
$string['invalideventdata'] = 'Données d\'événement incorrecte : $a';
$string['invalidparameter'] = 'Valeur de paramètre incorrecte. Impossible de continuer.';
$string['missingconfigversion'] = 'La table Config ne contient pas la version. Impossible de continuer.';
$string['modulenotexist'] = 'Le module $a n\'existe pas';
$string['morethanonerecordinfetch'] = 'Plus d\'un enregistrement trouvé dans fetch() !';
$string['mustbeoveride'] = 'La méthode abstraite $a doit être surchargée.';
$string['noactivityname'] = 'L\'objet de page est dérivé de page_generic_activity mais ne définit pas \$this->activityname';
$string['noadminrole'] = 'Aucun rôle administrateur trouvé';
$string['noblockbase'] = 'La classe block_base n\'est pas définie ou le fichier pour /blocks/moodleblock.class.php n\'a pas été trouvé';
$string['noblocks'] = 'Aucun bloc installé !';
$string['nocaps'] = 'Erreur : aucune capacité définie !';
$string['nocate'] = 'Aucune catégorie !';
$string['nomodules'] = 'Aucun module trouvé !';
$string['nopageclass'] = '$a a été importé, mais aucune classe de page n\'a été trouvée';
$string['noreports'] = 'Aucun rapport accessible';
$string['notables'] = 'Pas de tables !';
$string['phpvaroff'] = 'La variable « {$a->name} » du serveur PHP devrait être sur Off - $a->link';
$string['phpvaron'] = 'La variable « {$a->name} » du serveur PHP n\'est pas sur On - $a->link';
$string['sessionmissing'] = 'L\'objet de session $a n\'est pas présent dans la session';
$string['siteisnotdefined'] = 'Le site n\'est pas défini !';
$string['sqlrelyonobsoletetable'] = 'Ce code SQL présuppose des tables obsolètes : {$a} ! Votre code doit être corrigé par un développeur.';
$string['upgradefail'] = 'Échec de la mise à jour ! Voir $a';
$string['withoutversion'] = 'Le fichier principal version.php n\'existe pas, n\'est pas accessible ou est corrompu';
$string['xmlizeunavailable'] = 'Les fonctions xmlize ne sont pas disponibles';

?>
