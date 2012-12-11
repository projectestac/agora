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
 * Strings for component 'qtype_numerical', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Erreur acceptée';
$string['addmoreanswerblanks'] = '{no} emplacements supplémentaires vides';
$string['addmoreunitblanks'] = '{no} emplacements pour plus d\'unités';
$string['answercolon'] = 'Réponse :';
$string['answermustbenumberorstar'] = 'La réponse doit être un nombre ou un astérisque (*).';
$string['answerno'] = 'Réponse {$a}';
$string['decfractionofquestiongrade'] = 'comme une fraction (entre 0 et 1) de la note de la question';
$string['decfractionofresponsegrade'] = 'comme une fraction (entre 0 et 1) de la note de la réponse';
$string['decimalformat'] = 'décimales';
$string['editableunittext'] = 'la zone de saisie du texte';
$string['errornomultiplier'] = 'Vous devez indiquer un coefficient pour cette unité.';
$string['errorrepeatedunit'] = 'Il ne peut y avoir deux unités du même nom.';
$string['geometric'] = 'Géométrique';
$string['invalidnumber'] = 'Vous devez entrer un nombre valide.';
$string['invalidnumbernounit'] = 'Vous devez entrer un nombre valide. Ne mettez pas d\'unité dans votre réponse.';
$string['invalidnumericanswer'] = 'L\'une des réponses que vous avez saisies n\'est pas un nombre valide.';
$string['invalidnumerictolerance'] = 'L\'une des tolérances que vous avez saisies n\'est pas un nombre valide.';
$string['leftexample'] = 'À gauche, comme € 2.50 ou $ 1.25';
$string['manynumerical'] = 'Les unités sont optionnelles. Si une unité est saisie, elle sera utilisée pour la conversion vers l\'unité 1 avant l\'évaluation.';
$string['multiplier'] = 'Coefficient';
$string['nominal'] = 'Nominal';
$string['noneditableunittext'] = 'Texte non modifiable pour l\'unité 1';
$string['nonvalidcharactersinnumber'] = 'Caractère non valide dans le nombre';
$string['notenoughanswers'] = 'Vous devez fournir au moins une réponse.';
$string['nounitdisplay'] = 'Pas d\'évaluation de l\'unité';
$string['numericalmultiplier'] = 'Coefficient';
$string['numericalmultiplier_help'] = 'Le coefficient est un facteur par lequel la réponse numérique correcte sera multipliée.

La première unité (Unité 1) a le coefficient par défaut de 1.

Si la réponse correcte est 5500 et que vous choisissiez W en tant qu\'unité dans l\'Unité 1, qui possède 1 comme coefficient par défaut, la réponse correcte est 5500 W.

Si vous ajoutez l\'unité kW avec un coefficient de 0,001, cela ajoute comme réponse correcte 5,5 kW. Cela signifie donc que 5500 W et 5,5 Kw seront évaluées comme correctes.

Notez que la marge d\'erreur est elle aussi soumise au coefficient, donc une marge d\'erreur de 100 W deviendra une marge d\'erreur de 0,1 kW.';
$string['oneunitshown'] = 'L\'Unité 1 est automatiquement affichée à coté de la zone de réponse.';
$string['onlynumerical'] = 'Les unités ne sont pas utilisées. Seule la valeur numérique est évaluée.';
$string['pleaseenterananswer'] = 'Merci de saisir votre réponse.';
$string['pleaseenteranswerwithoutthousandssep'] = 'Veuillez saisir votre réponse sans utiliser de séparateur de milliers ({$a})';
$string['pluginname'] = 'Numérique';
$string['pluginnameadding'] = 'Ajout d\'une question numérique';
$string['pluginnameediting'] = 'Modification d\'une question numérique';
$string['pluginname_help'] = 'Du point de vue du participant, une question numérique est comme une question à réponse courte. La différence est que la réponse numérique accepte une marge d\'erreur dans la réponse. Cela permet d\'utiliser une fourchette de valeurs comme réponse attendue. Par exemple, si la réponse est 10 avec une marge d\'erreur de 2, Alors, n\'importe quel nombre entre 8 et 12 sera considéré comme correct.';
$string['pluginnamesummary'] = 'Permet une réponse numérique, le cas échéant avec des unités, qui est évaluée en comparant divers modèles de réponses, comprenant une tolérance.';
$string['relative'] = 'Relatif';
$string['rightexample'] = 'À droite, comme 2.5 cm ou 12.5 km';
$string['selectunit'] = 'Sélectionnez une unité';
$string['selectunits'] = 'Sélectionner les unités';
$string['studentunitanswer'] = 'Les unités sont saisies en utilisant';
$string['tolerancetype'] = 'Type de tolérance';
$string['unit'] = 'Unité';
$string['unitappliedpenalty'] = 'Ces notes incluent une pénalité de {$a} en raison de l\'indication d\'une mauvaise unité.';
$string['unitchoice'] = 'une sélection de choix multiples';
$string['unitedit'] = 'Modifier l\'unité';
$string['unitgraded'] = 'L\'unité doit être indiquée, et sera prise en compte dans la note.';
$string['unithandling'] = 'Traitement de l\'unité';
$string['unithdr'] = 'Unité {$a}';
$string['unitincorrect'] = 'Vous n\'avez pas donné l\'unité correcte.';
$string['unitmandatory'] = 'Obligatoire';
$string['unitmandatory_help'] = '* La réponse sera évaluée en utilisant l\'unité écrite.

* La pénalité d\'unité sera appliquée si la zone d\'unité est vide';
$string['unitnotselected'] = 'Vous devez sélectionner une unité.';
$string['unitonerequired'] = 'Vous devez saisir au moins une unité';
$string['unitoptional'] = 'Unité optionnelle';
$string['unitoptional_help'] = '* Si la zone d\'unité est renseignée, la réponse sera évaluée en utilisant cette unité.

* Si l\'unité est mal écrite ou inconnue, la réponse sera considérée comme non valide.';
$string['unitpenalty'] = 'Pénalité d\'unité';
$string['unitpenalty_help'] = 'La pénalité est appliquée si :

* un mauvais nom d\'unité est indiqué dans la zone d\'unité, ou
* l\'unité est écrite dans la zone de valeur';
$string['unitposition'] = 'Position de l\'unité';
$string['unitselect'] = 'un menu déroulant';
$string['validnumberformats'] = 'Formats de nombre valides';
$string['validnumberformats_help'] = '* nombre régulier 13500.67, 13 500.67, 13500,67 ou 13 500,67

* si vous utilisez le caractère « , » en tant que séparateur de milliers, il faut impérativement utiliser le caractère « . » pour indiquer la décimale comme dans 13,500.67 ou 13,500

* concernant l\'exposant, pour exprimer 1.350067 * 10<sup>4</sup>, il faut utiliser  1.350067 E4 ou 1.350067 E04';
$string['validnumbers'] = '13500.67, 13 500.67, 13,500.67, 13500,67, 13 500,67, 1.350067 E4 ou 1.350067 E04';
