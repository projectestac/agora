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
 * Strings for component 'assignfeedback_editpdf', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   assignfeedback_editpdf
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addtoquicklist'] = 'Ajouter à la liste rapide';
$string['annotationcolour'] = 'Couleur d\'annotation';
$string['black'] = 'Noir';
$string['blue'] = 'Bleu';
$string['cannotopenpdf'] = 'Impossible d\'ouvrir le fichier PDF. Le fichier est peut-être corrompu ou dans un format non supporté.';
$string['clear'] = 'Effacer';
$string['colourpicker'] = 'Nuancier';
$string['command'] = 'Commande :';
$string['comment'] = 'Commentaires';
$string['commentcolour'] = 'Couleur de commentaire';
$string['commentcontextmenu'] = 'Menu contextuel de commentaire';
$string['couldnotsavepage'] = 'Impossible d\'enregistrer la page {$a}';
$string['currentstamp'] = 'Tampon';
$string['deleteannotation'] = 'Supprimer l\'annotation';
$string['deletecomment'] = 'Supprimer le commentaire';
$string['deletefeedback'] = 'Supprimer le feedback PDF';
$string['downloadablefilename'] = 'feedback.pdf';
$string['downloadfeedback'] = 'Télécharger le feedback PDF';
$string['editpdf'] = 'Annotation PDF';
$string['editpdf_help'] = 'Annoter les devoirs remis directement dans le navigateur et produire un PDF modifié téléchargeable.';
$string['enabled'] = 'Annoter PDF';
$string['enabled_help'] = 'Si ce réglage est activé, l\'enseignant peut créer des fichiers PDF annotés lors de l\'évaluation des devoirs. Ceci permet à l\'enseignant d\'ajouter des commentaires, des croquis et des tampons directement dans le travail des étudiants. L\'annotation s\'effectue dans le navigateur, sans nécessiter d\'autre logiciel.';
$string['errorgenerateimage'] = 'Erreur lors de la création de l\'image au moyen de GhostScript. Information de débogage : {$a}';
$string['filter'] = 'Filtrer les commentaires...';
$string['generatefeedback'] = 'Générer le feedback PDF';
$string['generatingpdf'] = 'Génération du PDF...';
$string['gotopage'] = 'Aller à la page';
$string['green'] = 'Vert';
$string['gspath'] = 'Chemin d\'accès à Ghostscript';
$string['gspath_help'] = 'Sur Linux, ce réglage peut être laissé par défaut sur « /usr/bin/gs/ ». Sur Mac OS X, c\'est plutôt « /usr/local/bin/gs ». Sous Windows, ce sera quelque chose comme « c:gsbingswin32c.exe » (assurez-vous qu\'aucun espace ne soit présent dans le chemin ; si nécessaire, copier les fichiers « gswin32c.exe » et « gsdll32.dll » dans un autre dossier dont le chemin ne comporte pas d\'espace).';
$string['highlight'] = 'Surlignage';
$string['jsrequired'] = 'L\'annotation de documents PDF requiert l\'activation de Javascript. Veuillez activer Javascript dans votre navigateur si vous désirez utiliser cette fonctionnalité.';
$string['launcheditor'] = 'Lancer l\'éditeur PDF...';
$string['line'] = 'Ligne';
$string['loadingeditor'] = 'Chargement de l\'éditeur PDF';
$string['navigatenext'] = 'Page suivante';
$string['navigateprevious'] = 'Page précédente';
$string['output'] = 'Sortie :';
$string['oval'] = 'Ovale';
$string['pagenumber'] = 'Page {$a}';
$string['pagexofy'] = 'Page {$a->page} sur {$a->total}';
$string['pen'] = 'Plume';
$string['pluginname'] = 'Annotation PDF';
$string['rectangle'] = 'Rectangle';
$string['red'] = 'Rouge';
$string['result'] = 'Résultat :';
$string['searchcomments'] = 'Rechercher des commentaires';
$string['select'] = 'Sélectionner';
$string['stamp'] = 'Tampon';
$string['stamppicker'] = 'Sélecteur de tampon';
$string['stamps'] = 'Tampons';
$string['stampsdesc'] = 'Les tampons doivent être des fichiers image (taille recommandée : 40x40 pixels). Ces images peuvent être utilisées avec l\'outil tampon pour annoter le PDF.';
$string['test_doesnotexist'] = 'Le chemin d\'accès à l\'exécutable GhostScript pointe vers un fichier inexistant';
$string['test_empty'] = 'Le chemin Ghostscript est vide. Veuillez saisir un chemin correct';
$string['testgs'] = 'Tester le chemin Ghostscript';
$string['test_isdir'] = 'Le chemin d\'accès à l\'exécutable GhostScript pointe vers un dossier. Veuillez indiquer le nom de l\'exécutable dans le chemin spécifié';
$string['test_notestfile'] = 'Le PDF de test est manquant';
$string['test_notexecutable'] = 'Le chemin d\'accès à l\'exécutable GhostScript pointe vers un fichier qui n\'est pas exécutable';
$string['test_ok'] = 'Le chemin d\'accès à l\'exécutable GhostScript semble correct. Veuillez vérifier que vous voyez le message dans l\'image ci-dessous';
$string['tool'] = 'Outil';
$string['toolbarbutton'] = '{$a->tool} {$a->shortcut}';
$string['unsavedchanges'] = 'Modifications non enregistrées';
$string['viewfeedbackonline'] = 'Afficher le PDF annoté...';
$string['white'] = 'Blanc';
$string['yellow'] = 'Jaune';
$string['zlibnotavailable'] = 'L\'extension zlib de PHP n\'est pas disponible. La fonctionnalité d\'annotation de PDF requiert l\'installation de cette extension et sera désactivée tant que zlib n\'est pas installée et activée.';
