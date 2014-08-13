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
 * Strings for component 'plagiarism_compilatio', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   plagiarism_compilatio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['analysisdate'] = 'Date d\'analyse';
$string['analysistype'] = 'Type d\'analyse';
$string['analysistypeauto'] = 'Instantanée';
$string['analysistype_help'] = '<p>Vous disposez de trois options possibles :</p>
<ul>
<li><strong> Instantanée :</strong> Le document est envoyé à Compilatio et analysé immédiatement</li>
<li><strong> Manuel :</strong> Le document est envoyé à Compilatio, mais l\'enseignant doit déclencher manuellement les analyses des documents</li>
<li><strong> Programmée :</strong> Le document est envoyé à Compilatio et analysé, à l\'heure/date choisie(s)</li>
</ul>
<p>Pour comparer tous les documents les uns avec les autres, choisir le mode manuel et attendre jusqu\'à ce que tous les travaux soient soumis par les étudiants, puis déclencher l\'analyse</p>';
$string['analysistypemanual'] = 'Manuelle';
$string['analysistypeprog'] = 'Programmée';
$string['compilatio'] = 'Plugin de détection de plagiat Compilatio';
$string['compilatio_api'] = 'Adresse de l\'API Compilatio';
$string['compilatio_api_help'] = 'Il s\'agit de l\'adresse de l\'API Compilatio';
$string['compilatiodefaults'] = 'Valeurs par défaut pour Compilatio';
$string['compilatio_draft_submit'] = 'Quand le fichier doit être soumis à Compilatio';
$string['compilatio:enable'] = 'Autoriser l\'enseignant à activer/désactiver Compilatio au sein d\'une activité';
$string['compilatio_enableplugin'] = 'Activer Compilatio pour {$a}';
$string['compilatioexplain'] = 'Pour obtenir des informations complémentaires sur ce plugin, voir : <a href="http://compilatio.net" target="_blank">http://compilatio.net</a>';
$string['compilatio_password'] = 'Code établissement';
$string['compilatio_password_help'] = 'Code établissement fourni par Compilatio pour accéder à l\'API';
$string['compilatio:resetfile'] = 'Autoriser l\'enseignant à soumettre à nouveau le fichier à Compilatio après une erreur';
$string['compilatio_show_student_report'] = 'Afficher le rapport d\'analyse de similarité à l\'étudiant';
$string['compilatio_show_student_report_help'] = 'Le rapport de similitude donne une ventilation sur les parties de la présentation qui ont été plagiées et l\'emplacement où Compilatio a trouvé ce contenu la première fois';
$string['compilatio_show_student_score'] = 'Afficher le score de similarité à l\'étudiant';
$string['compilatio_show_student_score_help'] = 'Le score de similarité est le pourcentage de la soumission qui est commun avec un autre contenu.';
$string['compilatio_studentemail'] = 'Envoyer un courriel à l\'étudiant';
$string['compilatio_studentemail_help'] = 'Ceci enverra un courriel aux étudiants quand un fichier a été traité pour leur faire savoir que le rapport est disponible.';
$string['compilatio:triggeranalysis'] = 'Autoriser l\'enseignant à déclencher manuellement l\'analyse';
$string['compilatio:viewreport'] = 'Autoriser l\'enseignant à consulter le rapport complet depuis Compilatio';
$string['defaultsdesc'] = 'Les paramètres suivants sont les paramètres par défaut définis lors de l\'activation de Compilatio au sein d\'un module d\'activité';
$string['defaultupdated'] = 'Les valeurs par défaut ont été mises à jour';
$string['enabledandworking'] = 'Le plugin Compilatio est actif et fonctionnel.';
$string['failedanalysis'] = 'Compilatio n\'a pas réussi à analyser votre document :';
$string['filereset'] = 'Un fichier a été remis à zéro pour re-soumission à Compilatio';
$string['optout'] = 'Opt-out';
$string['pending'] = 'Le fichier est en attente de soumission à Compilatio';
$string['pluginname'] = 'Plugin Compilatio de détection de plagiat';
$string['previouslysubmitted'] = 'Auparavant soumis comme';
$string['processing'] = 'Le fichier a été soumis à Compilatio et attend maintenant que l\'analyse soit disponible';
$string['report'] = 'rapport';
$string['savedconfigfailed'] = 'Une intégration incorrecte adresse/code établissement a été saisie, Compilatio est désactivé, merci de réessayer.';
$string['savedconfigsuccess'] = 'Paramètres de détection de plagiat sauvegardés';
$string['showwhenclosed'] = 'Quand l\'activité est fermée';
$string['similarity'] = 'Compilatio';
$string['startanalysis'] = 'Démarrer l\'analyse';
$string['studentdisclosure'] = 'Divulgation aux étudiants';
$string['studentdisclosuredefault'] = 'L\'ensemble des fichiers chargés sera envoyé au service de détection de plagiat de Compilatio';
$string['studentdisclosure_help'] = 'Ce texte sera affiché à tous les étudiants sur la page de téléchargement de fichier.';
$string['studentemailcontent'] = 'Le fichier que vous avez soumis à {$a->modulename} dans {$a->coursename} a été traité par l\'outil de détection de plagiat Compilatio.
{$a->modulelink}';
$string['studentemailsubject'] = 'Le fichier est en cours de traitement chez Compilatio';
$string['submitondraft'] = 'Soumettre un fichier quand le premier est chargé';
$string['submitonfinal'] = 'Soumettre un fichier lorsqu\'un étudiant l\'envoie pour analyse';
$string['toolarge'] = 'Le fichier est trop volumineux pour être traité par Compilatio';
$string['unknownwarning'] = 'Une erreur s\'est produite lors de l\'envoi du fichier à Compilatio';
$string['unsupportedfiletype'] = 'Ce type de fichier n\'est pas supporté par Compilatio';
$string['updatecompilatioanalysis'] = 'Mettre à jour l\'analyse Compilatio';
$string['updatedanalysis'] = 'L\'analyse Compilatio a été mise à jour';
$string['usecompilatio'] = 'Activer la détection des similitudes avec Compilatio';
$string['usedcredits'] = '<strong>Vous avez utilisé {$a->used} crédit(s) sur {$a->credits} et il vous reste {$a->remaining} crédit(s)</strong>';
$string['waitingforanalysis'] = 'Ce fichier sera traité le {$a}';
