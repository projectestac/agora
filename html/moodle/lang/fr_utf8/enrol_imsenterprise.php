<?php  // $Id: enrol_imsenterprise.php,v 1.8 2009/04/10 19:28:51 martignoni Exp $

$string['enrolname'] = 'Fichier IMS Enterprise';

// Subheadings which divide up the config page
$string['basicsettings'] = 'Réglages de base';
$string['usersettings'] = 'Options utilisateurs';
$string['coursesettings'] = 'Options cours';
$string['miscsettings'] = 'Divers';

// Labels in the config page
$string['description'] = 'Cette méthode vérifiera régulièrement si un fichier texte de format particulier existe à un emplacement déterminé et le traitera. Ce fichier doit être conforme aux <a href=\'../help.php?module=enrol/imsenterprise&amp;file=formatoverview.html\' target=\'_blank\'>spécifications IMS Enterprise</a>, et contenir des éléments XML person, group et membership.';
$string['createnewusers'] = 'Créer des comptes utilisateur pour les utilisateurs pas encore enregistrés dans Moodle';
$string['deleteusers'] = 'Supprimer les comptes utilisateurs comme spécifié dans les données IMS';
$string['fixcaseusernames'] = 'Mettre les noms d\'utilisateur en minuscules';
$string['fixcasepersonalnames'] = 'Mettre en majuscules les initiales des noms réels';
$string['imsrolesdescription'] = 'La spécification IMS Enterprise inclut 8 types de rôles distincts. Veuillez choisir comment vous désirez que ces rôles soient attribués dans Moodle, y compris ceux que vous désirez ignorer.';
$string['truncatecoursecodes'] = 'Tronquer les codes de cours à cette longueur';
$string['createnewcourses'] = 'Créer de nouveaux cours (cachés) si inexistants dans Moodle';
$string['createnewcategories'] = 'Créer de nouvelles catégories de cours (cachées) si inexistantes dans Moodle';
$string['zeroisnotruncation'] = '0 indique pas de troncature';
$string['cronfrequency'] = 'Fréquence de traitement';
$string['allowunenrol'] = 'Permettre aux données IMS de <strong>désinscrire</strong> les participants';
$string['sourcedidfallback'] = 'Utiliser le « sourcedid » comme identifiant pour les personnes dont le champ « userid » est introuvable';
$string['usecapitafix']= 'Cocher cette case lors de l\'utilisation de « Capita » (leur format XML n\'est pas tout à fait correct)';
$string['location'] = 'Emplacement du fichier';
$string['mailusers'] = 'Informer les utilisateurs par courriel';
$string['mailadmins'] = 'Informer l\'administrateur par courriel';
$string['processphoto'] = 'Ajouter la photo de l\'utilisateur à son profil';
$string['processphotowarning'] = 'Attention ! Le traitement des images est susceptible de charger le serveur de façon significative. Nous vous recommandons de n\'activer pas cette option si un grand nombre d\'étudiants doit être traité.';
$string['logtolocation'] = 'Emplacement de l\'historique d\'importation (vide pour ne pas avoir d\'historique)';
$string['restricttarget'] = 'Ne traiter les données que si la cible suivante est spécifiée';

$string['aftersaving...']= 'Une fois ces réglages enregistrés, vous voudrez peut-être';
$string['doitnow']= 'effectuer immédiatement une importation IMS Enterprise';

$string['filelockedmailsubject'] = 'Erreur important : fichier d\'inscription';
$string['filelockedmail'] = 'Le fichier texte utilisé pour les inscriptions basées sur un fichier IMS ($a) ne peut pas être supprimé par le script cron. Cela signifie habituellement que les droits sont mal réglés. Veuillez corriger les droits de telle sorte que Moodle puisse effacer le fichier, sans quoi il sera traité de façon répétitive.';

?>
