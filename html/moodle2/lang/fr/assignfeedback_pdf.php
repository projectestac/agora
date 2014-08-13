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
 * Strings for component 'assignfeedback_pdf', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_pdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addquicklist'] = 'Ajouter à la liste de commentaires';
$string['allowpdffeedback'] = 'Activé';
$string['annotatesubmission'] = 'Annoter le devoir';
$string['annotationhelp'] = 'Aide pour annotation';
$string['annotationhelp_text'] = '<table>
<thead><tr><th>Contrôle</th><th>Raccourci clavier</th><th>Description</th></tr></thead>
<tr><td>{$a->save}</td><td> </td><td>Fermer l\'annotation sans générer de fichier de réponse </td></tr>
 <tr><td>{$a->generate}</td><td> </td><td>Générer un fichier PDF de réponse téléchargeable par l\'étudiant</td></tr>
 <tr><td>Rechercher commentaires</td><td> </td><td>Sauter à un commentaire précédent et le surligner</td></tr>
 <tr><td>Précédent</td><td> </td><td>Afficher les commentaires d\'un autre devoir pour cet étudiant (dans un cadre latéral)</td></tr>
 <tr><td><-- Précédent</td><td>p</td><td>Voir page précédente</td></tr>
 <tr><td>Suivant --></td><td>n</td><td>Voir page suivante</td></tr>
 <tr><td>Couleur de fond</td><td>[ and ]</td><td>Modifier la couleur de remplissage de la boîte de commentaires (aussi par clic droit sur commentaire)</td></tr>
 <tr><td>Couleur du trait</td><td>{ and }</td><td>Modifier la couleur pour l\'annotation</td></tr>
 <tr><td>Choisir estampe</td><td> </td><td>Choisir l\'estampe pour l\'outil d\'estampe</td></tr>
 <tr><td>{$a->comment}</td><td>c</td><td>Cliquer dans la page pour ajouter commentaire et cliquer de nouveau dans la page pour enregistrer. Cliquer sur le commentaire pour le modifier, glisser pour déplacer. Cliquer à droite pour modifier la couleur, enregistrer dans la liste ou supprimer (ou supprimer du texte).</td></tr>
 <tr><td>{$a->line}</td><td>l</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour ajouter un trait sur la page</td></tr>
 <tr><td>{$a->rectangle}</td><td>r</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour dessiner un rectangle sur la page</td></tr>
 <tr><td>{$a->oval}</td><td>o</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour dessiner un  ovale sur la page</td></tr>
 <tr><td>{$a->freehand}</td><td>f</td><td>Cliquer et glisser pour dessiner à main levée</td></tr>
 <tr><td>{$a->highlight}</td><td>h</td><td>Cliquer et glisser (ou cliquer, déplacer, cliquer) pour surligner du contenu</td></tr>
 <tr><td>{$a->stamp}</td><td>s</td><td>Cliquer pour ajouter l\'estampe choisie (taille par défaut). Cliquer et glisser pour ajuster la taille</td></tr>
 <tr><td>{$a->erase}</td><td>e</td><td>Cliquer sur une annotation (et non un commentaire) pour la supprimer</td></tr>
 <tr><td>Liste</td><td> </td><td>Cliquer à droite sur la page pour ajouter un commentaire préalablement enregistré dans la liste. Utiliser le "x" pour supprimer des éléments de la liste.</td></tr>
 </table>';
$string['backtocommentlist'] = 'Retour à la liste de commentaires';
$string['badaction'] = 'Action non valide';
$string['badannotationid'] = 'Le no d\'identification de l\'annotation correspond à un fichier différent ou à une page différente';
$string['badcommentid'] = 'Le no d\'identification du commentaire correspond à un fichier différent ou à une page différente';
$string['badcoordinate'] = 'Erreur de coordonnées - chaque point doit compter deux coordonnées';
$string['badpath'] = 'Chemin non valide';
$string['badtype'] = 'Type non valide {$a}';
$string['cancel'] = 'Annuler';
$string['clearimagecache'] = 'Vider la cache des images';
$string['colourblack'] = 'Noir';
$string['colourblue'] = 'Bleu';
$string['colourclear'] = 'Clair';
$string['colourgreen'] = 'Vert';
$string['colourred'] = 'Rouge';
$string['colourwhite'] = 'Blanc';
$string['colouryellow'] = 'Jaune';
$string['comment'] = 'Commentaire';
$string['commentcolour'] = '[,] - couleur de fond du commentaire';
$string['commenticon'] = 'c - ajouter commentaire et maintenir la touche Ctrl enfoncée pour dessiner un trait';
$string['deletecomment'] = 'Supprimer le commentaire';
$string['downloadoriginal'] = 'Télécharger le devoir original';
$string['downloadresponse'] = 'Télécharger la réponse';
$string['draftsaved'] = 'Brouillon enregistré';
$string['emptyquicklist'] = 'Aucun élément dans la liste de commentaires';
$string['emptyquicklist_instructions'] = 'Clic-droit sur commentaire pour copier dans la liste';
$string['emptysubmission'] = 'Rien n\'a été remis';
$string['enabled'] = 'Feedback PDF';
$string['enabled_help'] = 'Ceci permet l\'annotation en ligne de fichiers PDF (remise via devoir PDF) et l\'envoi du corrigé aux étudiants.';
$string['eraseicon'] = 'e - effacer lignes et formes';
$string['errorgenerateimage'] = 'Impossible de générer l\'image: ¸{$a}';
$string['errormessage'] = 'Erreur:';
$string['errornosubmission'] = 'Aucun fichier remis, impossible de générer l\'image';
$string['errornosubmission2'] = 'Impossible de trouver le devoir PDF';
$string['errortempfolder'] = 'Impossible de créer le dossier temporaire';
$string['findcomments'] = 'Rechercher commentaires';
$string['findcommentsempty'] = 'Aucun commentaire';
$string['freehandicon'] = 'f - main levée';
$string['generateresponse'] = 'Générer un fichier de réponse';
$string['gspath'] = 'Chemin de Ghostscript';
$string['gspath2'] = 'Sur la plupart des installations Linux, on peut laisser /usr/bin/gs. Sous Windows, on retrouve quelque chose comme c:gsbingswin32c.exe (sans espaces dans le chemin - copier si nécessaire les fichiers gswin32c.exe et gsdll32.dll dans un nouveau dossier sans espaces dans le chemin).';
$string['highlighticon'] = 'h - surligner';
$string['imagefor'] = 'Fichiers image pour {$a}';
$string['jsrequired'] = 'Javascript doit être activé sur votre navigateur pour que l\'annotation en ligne soit possible';
$string['keyboardnext'] = 'n - page suivante';
$string['keyboardprev'] = 'p - page précédente';
$string['linecolour'] = '{,} - couleur du trait';
$string['lineicon'] = 'l - traits';
$string['missingannotationdata'] = 'Donnée d\'annotation manquante';
$string['missingcommentdata'] = 'Donnée de commentaire manquante';
$string['missingquicklistdata'] = 'Donnée de liste manquante';
$string['next'] = 'Suivant';
$string['nocomments'] = 'Aucun commentaire';
$string['nogroup'] = 'Aucun groupe';
$string['okagain'] = 'Cliquer sur OK pour réessayer';
$string['openlinknewwindow'] = 'Ouvrir le lien dans une nouvelle fenêtre';
$string['opennewwindow'] = 'Ouvrir cette page dans une nouvelle fenêtre';
$string['ovalicon'] = 'o - ovales';
$string['pagenumber'] = 'No de page';
$string['pagenumbertoobig'] = 'No de page demandé supérieur au nombre de pages  ({$a->pageno} > {$a->pagecount})';
$string['pagenumbertoosmall'] = 'No de page demandé inférieur à 1';
$string['pdf'] = 'Feedback PDF';
$string['pluginname'] = 'Feedback PDF';
$string['previous'] = 'Précédent';
$string['previousnone'] = 'Aucun';
$string['quicklist'] = 'Liste de commentaires';
$string['rectangleicon'] = 'r - rectangles';
$string['resend'] = 'Renvoyer';
$string['responsefor'] = 'Fichier de réponse pour {$a}';
$string['responseok'] = 'Fichier de réponse généré';
$string['responseproblem'] = 'Problème survenu lors de la création du fichier de réponse';
$string['savedraft'] = 'Enregistrer brouillon d\'annotations';
$string['servercommfailed'] = 'Échec de communication avec le serveur - voulez-vous renvoyer le message&nbsp;?';
$string['showpreviousassignment'] = 'Devoir précédent';
$string['stamp'] = 'Choisir estampe';
$string['stampicon'] = 's - estampe';
$string['test_doesnotexist'] = 'Le chemin de ghostscript pointe vers un fichier inexistant';
$string['test_empty'] = 'Le chemin de ghostscript est vide - entrer le bon chemin';
$string['testgs'] = 'Tester le chemin vers ghostscipt';
$string['test_isdir'] = 'Le chemin de ghostscript pointe vers un dossier - veuillez inclure l\'exécutable dans le chemin spécifié';
$string['test_notestfile'] = 'Le PDF de test est absent';
$string['test_notexecutable'] = 'Le ghostscript pointe vers un fichier non exécutable';
$string['test_ok'] = 'Le chemin du ghostscript semble correct - veuillez vérifier le message dans l\'image ci-dessous';
$string['viewresponse'] = 'Voir réponse en ligne';
