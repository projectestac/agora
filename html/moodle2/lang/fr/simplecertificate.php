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
 * Strings for component 'simplecertificate', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   simplecertificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['awarded'] = 'Décerné';
$string['awardedto'] = 'Décerné à';
$string['cantdeleteissue'] = 'Erreur dans la suppression des certificats délivrés.';
$string['certificateimage'] = 'Fichier image du certificat';
$string['certificateimage_help'] = 'C\'est l\'image qui sera utilisée dans le certificat';
$string['certificatename'] = 'Nom du certificat';
$string['certificatename_help'] = 'Nom du certificat';
$string['certificatetext'] = 'Texte du certificat';
$string['certificatetext_help'] = 'Ceci est le texte qui sera utilisé dans le certificat, certains mots spéciaux seront remplacés par des variables telles que le nom du cours, le nom de l\'étudiant, de qualité... Ce sont : {USERNAME} -> nom d\'utilisateur complet {COURSENAME} -> nom du cours complet (ou un autre nom de parcours défini) {GRADE} -> formaté année {DATE} -> date formatée  {OUTCOME} -> Résultats {HOURS} -> heures définies en cours {TEACHERS} -> Liste des enseignants
Le texte peut utiliser du html de base, les polices de base, tables, mais il faut éviter toute définition de position';
$string['certificatetextx'] = 'Texte du certificat horizontal';
$string['certificatetexty'] = 'Texte du certificat vertical';
$string['certificateverification'] = 'Vérification du certificat';
$string['certlifetime'] = 'Certificats récupérables pendant : (en mois)';
$string['certlifetime_help'] = 'Ceci spécifie la durée pendant laquelle vous souhaitez conserver les certificats délivrés. Les certificats délivrés qui sont plus vieux que cet âge sont automatiquement supprimés.';
$string['code'] = 'Code';
$string['completiondate'] = 'Fin du cours';
$string['coursegrade'] = 'Niveau de la formation';
$string['coursehours'] = 'Horaire du cours';
$string['coursehours_help'] = 'Horaire du cours';
$string['coursename'] = 'Autre nom du cours';
$string['coursename_help'] = 'Autre nom du cours';
$string['coursetimereq'] = 'Durée exigée en minutes dans le cours';
$string['coursetimereq_help'] = 'Entrez ici la durée minimale, en minutes, où l\'étudiant doit être inscrit dans le cours avant qu\'il ne soit en mesure de recevoir le certificat';
$string['datefmt'] = 'Format de date';
$string['datefmt_help'] = 'Choisissez un format de date pour imprimer la date sur le certificat. Ou, choisissez la dernière option pour avoir la date imprimée dans le format de la langue choisie par l\'utilisateur.';
$string['defaultcertificatetextx'] = 'Texte horizontal par défaut';
$string['defaultcertificatetexty'] = 'Texte vertical par défaut';
$string['defaultheight'] = 'Hauteur par défaut';
$string['defaultwidth'] = 'Largeur par défaut';
$string['deletissuedcertificates'] = 'Supprimer les certificats délivrés';
$string['delivery'] = 'Emission';
$string['delivery_help'] = 'Choisissez ici la façon dont vous souhaitez que vos élèves obtiennent leur certificat.
Ouvrir dans le navigateur : Ouvre le certificat dans une nouvelle fenêtre du navigateur.
Forcer le  Téléchargement : Ouvre la fenêtre de téléchargement du fichier du navigateur.
Certificat Email : Cette option envoie le certificat à l\'étudiant en pièce jointe.
Après qu\'un utilisateur a reçu son certificat, s\'il clique sur le lien du certificat de la page d\'accueil du cours, il verra la date à laquelle il a reçu son certificat et sera en mesure d\'examiner son certificat reçu.';
$string['designoptions'] = 'Options de design';
$string['download'] = 'Forcer le téléchargement';
$string['emailcertificate'] = 'Email (Vous devez aussi choisir de sauvegarder)';
$string['emailfrom'] = 'Adresse de courriel';
$string['emailfrom_help'] = 'Adresse secondaire de courriel';
$string['emailothers'] = 'Autres adresses courriel';
$string['emailothers_help'] = 'Entrez ici les adresses courriel séparées par une virgule, de ceux qui devraient être alertés par courriel chaque fois que les étudiants reçoivent un certificat';
$string['emailstudenttext'] = 'Votre certificat concerne {$a->course}';
$string['emailteachermail'] = '{$a->student} a reçu son certificat : \'{$a->certificate}\' pour {$a->course}. Vous pouvez le consulter ici : {$a->url}';
$string['emailteachermailhtml'] = '{$a->student} a reçu son certificat : \'<i>{$a->certificate}</i>\' pour {$a->course}. Vous pouvez consulter ici : <a href="{$a->url}"> Rapport de certificat</a>.';
$string['emailteachers'] = 'Courriels des enseignants';
$string['emailteachers_help'] = 'Si elle est activée, les enseignants sont alertés avec un e-mail chaque fois que les étudiants reçoivent un certificat.';
$string['filenotfound'] = 'Fichier non trouvé : {$a}';
$string['getcertificate'] = 'Obtenez votre certificat';
$string['grade'] = 'Niveau';
$string['gradefmt'] = 'Format du niveau';
$string['gradefmt_help'] = 'Il y a trois formats disponibles si vous choisissez d\'imprimer une note sur le certificat :
Pourcentage Grade: Imprime la note en pourcentage.
Points Grade: Imprime la valeur du point de grade.
Lettre Grade: Imprime la note en pourcentage comme une lettre';
$string['gradeletter'] = 'Niveau par lettres';
$string['gradepercent'] = 'Niveau par pourcentage';
$string['gradepoints'] = 'Niveau par points';
$string['height'] = 'Hauteur du certificat';
$string['hours'] = 'heures';
$string['intro'] = 'Introduction';
$string['invalidcode'] = 'Code certificat invalide';
$string['issued'] = 'Délivré';
$string['issueddate'] = 'Date de délivrance';
$string['issueoptions'] = 'Options de délivrance';
$string['keywords'] = 'certificat, cours, pdf, Moodle';
$string['modulename'] = 'Simple certificat';
$string['modulenameplural'] = 'Simples certificats';
$string['neverdeleteoption'] = 'Ne jamais supprimer';
$string['nocertificatesissued'] = 'Il n\'y a aucun certificat délivré.';
$string['openbrowser'] = 'Ouvrir dans une nouvelle fenêtre';
$string['opendownload'] = 'Cliquer sur ce bouton pour sauvegarder votre certificat dans votre ordinateur';
$string['openemail'] = 'Cliquer sur ce bouton pour envoyer votre certificat en fichier attaché par courriel à une autre adresse.';
$string['openwindow'] = 'Cliquer sur ce bouton pour ouvrir votre certificat dans une nouvelle fenêtre de votre navigateur.';
$string['pluginadministration'] = 'Administration du certificat.';
$string['pluginname'] = 'Simple certificat';
$string['printdate'] = 'Imprimer la date';
$string['printdate_help'] = 'C\'est la date qui sera imprimée, si la date d\'impression est sélectionnée. Si la date de fin de cours est sélectionnée, et que l\'élève n\'a pas terminé le cours, la date de réception sera imprimée. Vous pouvez également choisir d\'imprimer la date à laquelle une activité a été notée. Si un certificat est délivré avant que l\'activité ne soit terminée, la date de réception sera imprimée.';
$string['printgrade'] = 'Choisir l\'élément de référence';
$string['printgrade_help'] = 'Vous pouvez choisir tous les éléments du cours disponibles dans le carnet de notes afin d\'imprimer la note que l\'utilisateur a reçu pour cet élément sur le certificat. Les éléments de notation sont répertoriés dans l\'ordre dans lequel ils apparaissent dans le carnet de notes. Choisissez le format de la note ci-dessous.';
$string['printoutcome'] = 'Imprimer le résultat';
$string['printoutcome_help'] = 'Vous pouvez choisir n\'importe quel élément du cours dont vous voulez imprimer le résultat obtenu par l\'utilisateur sur le certificat. Un exemple pourrait être: Résultat obtenu : Maîtrise.';
$string['receiveddate'] = 'Date de réception';
$string['report'] = 'Rapport';
$string['size'] = 'Taille du certificat';
$string['size_help'] = 'C\'est la largeur et la hauteur (en millimètres) du certificat, la taille par défaut est : Paysage A4';
$string['summaryofattempts'] = 'Résumé des certificats reçus précédemment';
$string['textposition'] = 'Position du texte du certificat';
$string['textposition_help'] = 'Ce sont les coordonnées XY (en millimètres) du texte du certificat';
$string['userdateformat'] = 'Date dans la langue de l\'utilisateur';
$string['viewcertificateviews'] = 'Voir les {$a} certificats délivrés';
$string['width'] = 'Largeur du certificat';
