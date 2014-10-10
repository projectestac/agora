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
 * Strings for component 'certificate', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   certificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = 'Ajouter un lien vers une autre activité';
$string['addlinktitle'] = 'Cliquer pour ajouter un lien vers une autre activité';
$string['areaintro'] = 'Introduction du Certificat.';
$string['awarded'] = 'Décerné';
$string['awardedto'] = 'Décerné à';
$string['back'] = 'Retour';
$string['border'] = 'Bordure';
$string['borderblack'] = 'Noir';
$string['borderblue'] = 'Bleu';
$string['borderbrown'] = 'Brun';
$string['bordercolor'] = 'Lignes de bordure';
$string['bordercolor_help'] = 'Puisque les images peuvent considérablement augmenter la taille du fichier pdf, vous pouvez vouloir imprimer une bordure de lignes au lieu d\'utiliser une image. (Vérifiez que l\'option d\'Image de bordure est mise à "Non"). L\'option imprimera une simple bordure de trois lignes de largeurs variantes dans la couleur choisie.';
$string['bordergreen'] = 'Vert';
$string['borderlines'] = 'Lignes';
$string['borderstyle'] = 'Image de bordure';
$string['borderstyle_help'] = 'L\'option d\'image de bordure vous permet de choisir une image de bordure du dossier certificate/pix/borders. Choisissez l\'image que vous voulez pour les bords du certificat ou l\'option "pas de bordure".';
$string['certificate'] = 'Vérification du code de certificat';
$string['certificatename'] = 'Nom du certificat';
$string['certificatereport'] = 'Rapport des certificats';
$string['certificatesfor'] = 'Certificats pour';
$string['certificatetype'] = 'Types de certificats';
$string['certificatetype_help'] = 'C\'est ici que vous déterminez la disposition du certificat. Le dossier de type de certificat inclut quatre certificats par défaut : A4 copies Incorporées sur papier de taille A4 avec police de caractères incorporée. A4 copies Non-incorporées sur papier  de taille A4 sans polices de caractères incorporées. Lettre copies Incorporées sur papier de taille de lettre avec police de caractères incorporée. Lettre copies Non-incorporées sur papier de taille de lettre sans polices de caractères incorporées. Les types non-incorporés utilisent les polices de caractères Times et Helvetica. Si vous estimez que vos utilisateurs n\'auront pas ces polices de caractères sur leur ordinateur, ou si votre langue utilise des caractères (personnages) ou les symboles qui ne sont pas satisfaits(arrangés) par le Helvetica et les polices de caractères de Temps, choisissent donc un type incorporé. Les types incorporés utilisent le Dejavusans et les polices de caractères Dejavuserif. Ceci rendra les fichiers(dossiers) de pdf plutôt grands; ainsi on ne cela recommande pas de n\'utiliser un type incorporé à moins que vous ne le deviez vraiment. Dossiers de type peuvent être ajoutés au certificat / type de dossier. Le nom du dossier et les chaînes du nouveau langage pour le nouveau type doit être ajoutée au fichier de langue certificat.';
$string['certify'] = 'Ceci est certifié par';
$string['code'] = 'Code';
$string['completiondate'] = 'Cours complet';
$string['course'] = 'Pour';
$string['coursegrade'] = 'promotion';
$string['coursename'] = 'Cours';
$string['credithours'] = 'Crédit horaire';
$string['customtext'] = 'Texte personnalisé';
$string['customtext_help'] = 'Si vous voulez que le certificat imprime des noms différents pour l\'enseignant que ceux qui ont effectivement ce rôle, ne sélectionnez pas l\'enseignant d\'impression ou tout autre image de la signature, sauf pour l\'image de ligne. Entrez les noms des enseignants dans cette zone de texte que vous souhaitez qu\'ils apparaissent. Par défaut, ce texte est placé dans la partie inférieure gauche du certificat. Les balises HTML suivantes sont disponibles: <br>, <p>, <b>, <i>, <u>, <img> (src et la largeur (ou hauteur) sont obligatoires), <a> (href est obligatoire), <font> (attributs possibles sont: la couleur, (code couleur hexadécimal), le visage, (arial, Times, courier, Helvetica, symbole)).';
$string['date'] = 'Le';
$string['datefmt'] = 'Format de date';
$string['datefmt_help'] = 'Choisissez un format de date pour imprimer la date sur le certificat. Ou, choisissez la dernière option pour avoir la date imprimée dans le format de la langue choisie par l\'utilisateur.';
$string['datehelp'] = 'Date';
$string['deletissuedcertificates'] = 'Supprimer les certificats délivrés';
$string['delivery'] = 'Délivré';
$string['delivery_help'] = 'Choisissez ici la façon dont vous souhaitez que vos étudiants obtiennent leur certificat. Ouvrir dans le navigateur: Ouvre le certificat dans une nouvelle fenêtre. Force Télécharger: Ouvre la fenêtre de téléchargement du navigateur de fichiers. Certificat E-mail: Cette option envoie le certificat à l\'étudiant en tant que pièce jointe.
Une fois qu\'un utilisateur reçoit son certificat, s\'il clique sur le lien de la page d\'accueil certificat, ils verra la date à laquelle il a reçu son certificat et sera en mesure de l\'examiner.';
$string['designoptions'] = 'Options de conception';
$string['download'] = 'Forcer le téléchargement';
$string['emailcertificate'] = 'Courriel (Vous devez également choisir la sauvegarde ! )';
$string['emailothers'] = 'Autres destinataires';
$string['emailothers_help'] = 'Entrez les adresses e-mail, séparés par une virgule, de tous ceux qui doivent être alertés par e-mail chaque fois que les élèves reçoivent un certificat.';
$string['emailstudenttext'] = 'Ci-joint votre certificat pour {$a->course}.';
$string['emailteachermail'] = '{$a->student} a reçu son certificat : \'{$a->certificate}\' pour {$a->course}.

Vous pouvez le consulter ici :
{$a->url}';
$string['emailteachermailhtml'] = '{$a->student} a reçu son certificat: \'<i>{$a->certificate}</i>\' pour {$a->course}.

Vous pouvez le consulter ici :
<a href="{$a->url}">Rapport</a>.';
$string['emailteachers'] = 'Courriels des enseignants';
$string['emailteachers_help'] = 'Si activée, les enseignants sont alertés avec un courriel chaque fois que les élèves reçoivent un certificat.';
$string['entercode'] = 'Entrer le code de vérification du certificat.';
$string['getcertificate'] = 'Obtenez votre certificat';
$string['grade'] = 'Score';
$string['gradedate'] = 'Date';
$string['gradefmt'] = 'Format du score';
$string['gradefmt_help'] = 'Il existe trois formats disponibles si vous choisissez d\'imprimer une note sur le certificat: Note en pourcentage: Imprime la note en pourcentage. Année Points: Imprime la valeur du point de la note. Lettre année: Imprime la note en pourcentage sous forme de lettre.';
$string['gradeletter'] = 'Lettres du barème';
$string['gradepercent'] = 'Pourcentages du barème';
$string['gradepoints'] = 'Points du barème';
$string['incompletemessage'] = 'Pour télécharger votre certificat, vous devez d\'abord terminer toutes les activités requises. S\'il vous plaît revenez dans votre cours pour l\'achever.';
$string['intro'] = 'Introduction';
$string['issued'] = 'Fin';
$string['issueddate'] = 'Date de fin';
$string['issueoptions'] = 'Options de fin';
$string['landscape'] = 'paysage';
$string['lastviewed'] = 'Vous avez reçu ce certificat pour:';
$string['letter'] = 'Lettre';
$string['lockingoptions'] = 'Bloquer les options';
$string['modulename'] = 'Certificat';
$string['modulenameplural'] = 'Certificats';
$string['mycertificates'] = 'Mes certificats';
$string['nocertificates'] = 'Il n\'y a pas de certificat';
$string['nocertificatesissued'] = 'Il n\'y a aucun certificat terminé';
$string['nocertificatesreceived'] = 'n\'a pas obtenu de certificat';
$string['nogrades'] = 'Pas de barème';
$string['notapplicable'] = 'Non applicable';
$string['notfound'] = 'Le numéro du certificat n\'a pas pu être validé.';
$string['notissued'] = 'Pas terminé';
$string['notissuedyet'] = 'Pas encore terminé';
$string['notreceived'] = 'Vous n\'avez pas reçu ce certificat';
$string['openbrowser'] = 'Ouvrir dans une nouvelle fenêtre';
$string['opendownload'] = 'Cliquez sur le bouton ci-dessous pour enregistrer votre certificat sur votre ordinateur.';
$string['openemail'] = 'Cliquez sur le bouton ci-dessous et votre certificat vous sera envoyé en tant que pièce jointe par courriel.';
$string['openwindow'] = 'Cliquez sur le bouton ci-dessous pour ouvrir votre certificat dans une nouvelle fenêtre.';
$string['or'] = 'Ou';
$string['orientation'] = 'Orientation';
$string['orientation_help'] = 'Choisissez l\'orientation portrait ou paysage pour votre certificat.';
$string['pluginadministration'] = 'Administration du certificat';
$string['pluginname'] = 'Certificat';
$string['portrait'] = 'Portrait';
$string['printdate'] = 'Imprimer la date';
$string['printdate_help'] = 'C\'est la date qui sera imprimée, si une date d\'impression est sélectionnée. Si la date de fin de cours est sélectionnée, mais que l\'élève n\'a pas terminé le cours, la date de réception sera imprimée. Vous pouvez aussi choisir d\'imprimer la date à laquelle une activité a été notée. Si un certificat est délivré avant que l\'activité soit notée, la date de réception sera imprimée.';
$string['printerfriendly'] = 'Format imprimable';
$string['printgrade'] = 'Imprimer le barème';
$string['printgrade_help'] = 'Vous pouvez choisir tous les éléments disponibles du carnet de notes pour imprimer les résultats de l\'utilisateur sur le certificat. Les éléments de notes sont répertoriés dans l\'ordre dans lequel ils apparaissent dans le carnet de notes. Choisissez le format de la note ci-dessous.';
$string['printhours'] = 'Imprimer les heures créditées';
$string['printhours_help'] = 'Entrez ici le nombre d\'heures créditées à imprimer sur le certificat.';
$string['printnumber'] = 'Imprimer le code';
$string['printnumber_help'] = 'Un code unique à 10 chiffres composé de lettres et de chiffres aléatoires peut être imprimé sur le certificat. Ce numéro peut ensuite être vérifié en le comparant au numéro de code affiché dans l\'état des certificats.';
$string['printoutcome'] = 'Imprimer le résultat';
$string['printoutcome_help'] = 'Vous pouvez choisir n\'importe quel objectif de cours pour imprimer le nom de l\'objectif et le résultat obtenu par l\'utilisateur sur le certificat. Un exemple pourrait être
Résultat attendu : Maîtrise.';
$string['printseal'] = 'Image, sceau ou logo de l\'institution.';
$string['printseal_help'] = 'Cette option vous permet de sélectionner un sceau ou un logo à imprimer sur le certificat à partir du dossier certificate/pix/seals. Par défaut, cette image est placée dans le coin inférieur droit du certificat.';
$string['printsignature'] = 'Image de la signature';
$string['printsignature_help'] = 'Cette option vous permet d\'imprimer une image depuis le dossier certificate/pix/signatures. Vous pouvez imprimer une représentation graphique d\'une signature ou imprimer une ligne pour une signature manuscrite. Par défaut, cette image est placée dans le coin inférieur gauche du certificat.';
$string['printteacher'] = 'Imprimer les noms des enseignants';
$string['printteacher_help'] = 'Pour imprimer le nom de l\'enseignant sur le certificat, définissez le rôle de l\'enseignant au niveau du module. Pour ce faire, si, par exemple, vous avez plus d\'un enseignant pour le cours ou si vous avez plus d\'un certificat en cours et que vous souhaitez imprimer les noms des enseignants différents sur chaque certificat. Cliquez pour modifier le certificat, puis cliquez sur l\'onglet d\'affectation des rôles. Puis attribuer le rôle de l\'enseignant (enseignant éditeur) pour le certificat (ils n\'a pas besoin d\'être forcément un enseignant du cours - vous pouvez attribuer ce rôle à tout le monde). Ces noms seront imprimés sur le certificat pour l\'enseignant.';
$string['printwmark'] = 'image de filigrane';
$string['printwmark_help'] = 'Un fichier de filigrane peut être placé dans le fond du certificat. Un filigrane est une image atténuée. Un filigrane peut être un logo, un sceau, écusson, libellé, ou ce que vous souhaitez utiliser comme arrière-plan graphique.';
$string['receivedcerts'] = 'Certificats reçus';
$string['receiveddate'] = 'Date de réception';
$string['removecert'] = 'Certificats envoyés et récupérés';
$string['report'] = 'Rapport';
$string['reportcert'] = 'Rapport des certificats';
$string['reportcert_help'] = 'Si vous choisissez oui, alors la date de réception du certificat, le numéro de code et le nom du cours sera affiché sur les rapports de certificat utilisateur. Si vous choisissez d\'imprimer une note sur ce certificat, alors cette note sera également affichée sur le rapport du certificat.';
$string['reviewcertificate'] = 'Examinez votre certificat';
$string['savecert'] = 'Sauvegarder les certificats';
$string['savecert_help'] = 'Si vous choisissez cette option, alors une copie de chaque certificat pdf sera enregistré dans le dossier des fichiers du cours pour chaque certificat. Un lien vers le certificat de chaque utilisateur sera affiché dans le rapport des certificats.';
$string['sigline'] = 'ligne';
$string['statement'] = 'a terminé le cours';
$string['summaryofattempts'] = 'Résumé des certificats déjà reçus précédemment';
$string['textoptions'] = 'Texte additionnel';
$string['title'] = 'CERTIFICAT D’ACHÈVEMENT';
$string['to'] = 'décerné à';
$string['typeA4_embedded'] = 'A4 intégré';
$string['typeA4_non_embedded'] = 'A4 non intégré';
$string['typeletter_embedded'] = 'Lettre intégré';
$string['typeletter_non_embedded'] = 'Lettre non intégré';
$string['userdateformat'] = 'Format de date dans la langue de l\'utilisateur.';
$string['validate'] = 'Vérifier';
$string['verifycertificate'] = 'Vérifier le certificat';
$string['viewcertificateviews'] = 'Voir {$a} certificats délivrés';
$string['viewed'] = 'Vous avez reçu ce certificat :';
$string['viewtranscript'] = 'Afficher les certificats';
