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
 * Strings for component 'qtype_regexp', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_regexp
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addahint'] = 'Ajouter un indice';
$string['addingregexp'] = 'Créer une question de type expression régulière';
$string['addmoreanswers'] = 'Ajouter {no} réponse';
$string['answer'] = 'Réponse :';
$string['answer1mustbegiven'] = 'La Réponse n° 1 ne peut pas être vide.';
$string['answermustbegiven'] = 'Ce champ Réponse ne peut pas être vide si vous avez entré une valeur de Score ou un message de Feedback.';
$string['answerno'] = 'Réponse {$a}';
$string['bestcorrectansweris'] = '<strong>La meilleure réponse est :</strong><br />{$a}';
$string['calculatealternate'] = '(Re-)calculer les réponses alternatives';
$string['caseno'] = 'La casse des caractères indiffère';
$string['casesensitive'] = 'Casse des caractères';
$string['caseyes'] = 'La casse des caractères doit être respectée';
$string['clicktosubmit'] = 'Cliquez le bouton <strong>Vérifier</strong> pour Envoyer cette réponse <strong>correcte</strong>.';
$string['correctansweris'] = '<strong>La réponse correcte est :</strong><br />{$a}.';
$string['correctanswersare'] = '<strong>Les autres réponses acceptables sont :</strong>';
$string['editingregexp'] = 'Modifier une question de type expression régulière';
$string['filloutoneanswer'] = '<strong>Réponse 1</strong> doit être correcte (Note = 100%) et ne sera <strong>pas</strong> analysée en tant qu\'expression régulière.';
$string['hidealternate'] = 'Masquer les réponses alternatives';
$string['illegalcharacters'] = '<strong>ERREUR !</strong> Dans les Réponses avec un score supérieur à 0%, ces métacaractères non <em>échappés</em> ne sont pas autorisés :<strong>{$a}</strong>';
$string['letter'] = 'Lettre';
$string['notenoughanswers'] = 'Ce type de question demande au moins une réponse';
$string['penaltyforeachincorrecttry'] = 'Pénalité pour essai incorrect ou Aide';
$string['penaltyforeachincorrecttry_help'] = 'Lorsque vous utilisez le mode « Interactif avec tentatives multiples » ou « Adaptatif »
les étudiants ont plusieurs essais pour trouver la bonne réponse. Cette option contrôle comment ils seront pénalisés pour chaque essai incorrect.

La pénalité est un pourcentage de la note totale de la question, donc si la question est notée sur 3 points et que la pénalité est de 0,33, alors l\'étudiant aura 3 points s\'il répond correctement à la question au premier essai,
2 points s\'il répond correctement au deuxième essai, et 1 point s\'il répond correctement au troisième essai.

Si vous avez sélectionné comme mode d\'aide pour cette question <strong>Lettre</strong> ou <strong>Mot</strong>,
 la valeur indiquée pour la pénalité s\'appliquera également à tout « achat » de lettre ou de mot.';
$string['pleaseenterananswer'] = 'Veuillez entrer votre réponse.';
$string['pluginname'] = 'Réponse courte de type expression régulière';
$string['pluginnameadding'] = 'Créer une question de type expression régulière';
$string['pluginnameediting'] = 'Modifier une question de type expression régulière';
$string['pluginname_help'] = 'Clic droit sur le lien <em>Plus d\'aide</em> ci-dessous pour ouvrir la page d\'aide de la documentation Moodle.';
$string['pluginname_link'] = 'question/type/regexp';
$string['pluginnamesummary'] = 'Question à réponse courte où les réponses de l\'étudiant sont basées sur des expressions régulières';
$string['regexp'] = 'Réponse courte de type <br />expression régulière';
$string['regexperror'] = 'Erreur dans votre expression régulière : <strong>{$a}</strong>';
$string['regexperrorclose'] = 'fermant(e)s: <strong>{$a}</strong>';
$string['regexperrornopermutations'] = '<strong>ERREUR !</strong> Il n\'y a pas de mots permutés à l\'intérieur de vos doubles crochets carrés !';
$string['regexperroroddunderscores'] = '<strong>ERREUR !</strong> Il y a un nombre <b>impair</b> de tirets de soulignement à l\'intérieur de vos doubles crochets carrés !';
$string['regexperroropen'] = 'ouvrant(e)s: <strong>{$a}</strong>';
$string['regexperrorparen'] = '<strong>ERREUR !</strong> Vérifiez vos parenthèses ou crochets carrés !';
$string['regexperrorsqbrack'] = 'Crochets carrés';
$string['regexperrortoomanypermutations'] = '<strong>ERREUR !</strong> Vous ne pouvez pas mettre plus de 2 ensembles de permutations par réponse (doubles crochets carrés) !';
$string['regexp_help'] = 'Clic droit sur le lien <em>Plus d\'aide</em> ci-dessous pour ouvrir la page d\'aide de la documentation Moodle.';
$string['regexp_link'] = 'question/type/regexp';
$string['regexpsensitive'] = 'Utiliser les expressions régulières pour analyser les réponses';
$string['regexpsummary'] = 'Question à réponse courte où les réponses de l\'étudiant sont basées sur des expressions régulières';
$string['settingsformultipletries'] = 'Paramètres de pénalités pour les essais incorrects et l\'achat de lettres ou de mots';
$string['showhidealternate'] = 'Afficher/Masquer les réponses alternatives';
$string['showhidealternate_help'] = 'Calculer et afficher toutes les réponses alternatives correctes sur cette page ? Cette opération peut surcharger votre serveur
selon le nombre et la complexité des expressions régulières que vous avez créées dans les champs Réponse.

Cependant, afficher ces réponses alternatives maintenant est la meilleure façon de vérifier que vos expressions régulières sont correctement rédigées.';
$string['studentshowalternate'] = 'Montrer les réponses alternatives';
$string['studentshowalternate_help'] = 'Montrer <strong>toutes</strong> les réponses alternatives correctes à l\'étudiant sur la page "Relecture" ? S\'il y a beaucoup de réponses alternatives générées automatiquement, la page peut devenir très longue...';
$string['usehint'] = 'Mode d\'aide';
$string['usehint_help'] = 'Si un mode d\'aide autre que <strong>Aucun</strong> est sélectionné, un bouton d\'aide sera affiché pour permettre à l\'étudiant d\'« acheter » une lettre ou un mot.

En mode <strong>Adaptif</strong>, le bouton d\'aide affichera « Acheter la lettre suivante » ou « Acheter le mot suivant » selon
le mode sélectionné par l\'enseignant. Pour la valeur de la pénalité d\'achat d\'une lettre ou d\'un mot,
voir le paramétrage <strong>plus bas sur cette page</strong>.

En mode <strong>Adaptif sans pénalité</strong>, le bouton d\'aide affichera « Demander la lettre suivante » ou « Demander le mot suivant »

La valeur par défaut du paramètre <strong>Mode d\'aide</strong> est <strong>Aucun</strong>.';
$string['word'] = 'Mot';
