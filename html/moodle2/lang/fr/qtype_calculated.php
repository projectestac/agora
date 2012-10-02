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
 * Strings for component 'qtype_calculated', language 'fr', branch 'MOODLE_23_STABLE'
 *
 * @package   qtype_calculated
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['additem'] = 'Ajouter un élément';
$string['addmoreanswerblanks'] = 'Ajouter un autre emplacement de réponse vide.';
$string['addmoreunitblanks'] = 'Emplacements vides pour {$a} unités supplémentaires';
$string['addsets'] = 'Ajouter des jeux de données';
$string['answerhdr'] = 'Réponse';
$string['answerstoleranceparam'] = 'Paramètres de tolérance des réponses';
$string['answerwithtolerance'] = '{$a->answer} (±{$a->tolerance} {$a->tolerancetype})';
$string['anyvalue'] = 'N\'importe quelle valeur';
$string['atleastoneanswer'] = 'Vous devez fournir au moins une réponse.';
$string['atleastonerealdataset'] = 'Il devrait y avoir au moins une variable dans le texte de la question';
$string['atleastonewildcard'] = 'Il devrait y avoir au moins une variable dans la formule de réponse ou dans le texte de la question';
$string['calcdistribution'] = 'Distribution';
$string['calclength'] = 'Nombre de décimales';
$string['calcmax'] = 'Maximum';
$string['calcmin'] = 'Minimum';
$string['choosedatasetproperties'] = 'Choisissez les propriétés du jeu de données des variables';
$string['choosedatasetproperties_help'] = 'Un jeu de données est un ensemble de valeurs à insérer à la place des variables. Vous pouvez spécifier un jeu de données privé pour une question spécifique, ou partager un jeu de données qui pourra être utilisé pour d\'autres questions calculées de cette catégorie.';
$string['correctanswerformula'] = 'Formule de la réponse correcte';
$string['correctanswershows'] = 'La réponse correcte affiche';
$string['correctanswershowsformat'] = 'Format';
$string['correctfeedback'] = 'Pour toute réponse correcte';
$string['dataitemdefined'] = 'avec {$a} valeurs numériques déjà définies est disponible';
$string['datasetrole'] = 'Les variables <strong>{x..}</strong> seront remplacées par des valeurs numériques issues de leur jeu de données';
$string['decimals'] = 'avec {$a}';
$string['deleteitem'] = 'Supprimer élément';
$string['deletelastitem'] = 'Supprimer dernier élément';
$string['editdatasets'] = 'Modifier le jeu de données des variables';
$string['editdatasets_help'] = 'Les valeurs de variables sont créées en renseignant un nombre dans chaque champ de variable et en cliquant sur le bouton ajouter. Pour générer 10 valeurs ou plus, sélectionnez le nombre de valeurs souhaitées avant de cliquer sur le bouton ajouter. Une distribution uniforme signifie que chaque valeur sera générée de manière équilibrée entre les limites ; une distribution logarithmique signifie que les valeurs proches de la limite basse seront majoritaires.';
$string['existingcategory1'] = 'utilisera un jeu de données partagé déjà existant';
$string['existingcategory2'] = 'Un fichier d\'un ensemble de fichiers existants qui sont également utilisés par d\'autres questions de cette catégorie';
$string['existingcategory3'] = 'Un lien d\'un ensemble de liens existants qui sont également utilisés par d\'autres questions de cette catégorie';
$string['forceregeneration'] = 'Forcer la regénération';
$string['forceregenerationall'] = 'régénération forcée des variables';
$string['forceregenerationshared'] = 'régénération forcée des variables non partagées uniquement';
$string['functiontakesatleasttwo'] = 'La fonction {$a} doit avoir au moins deux arguments';
$string['functiontakesnoargs'] = 'La fonction {$a} n\'a aucun argument';
$string['functiontakesonearg'] = 'La fonction {$a} doit avoir un argument exactement';
$string['functiontakesoneortwoargs'] = 'La fonction {$a} doit avoir un ou deux arguments';
$string['functiontakestwoargs'] = 'La fonction {$a} doit avoir deux arguments exactement';
$string['generatevalue'] = 'Générer une nouvelle valeur entre';
$string['getnextnow'] = 'Obtenir un nouvel « élément à ajouter »';
$string['hexanotallowed'] = 'La valeur hexadécimale {$a->value} du jeu de données <strong>{$a->name}</strong> n\'est pas permise';
$string['illegalformulasyntax'] = 'Syntaxe incorrecte pour la formule commençant par « {$a} »';
$string['incorrectfeedback'] = 'Pour toute réponse incorrecte';
$string['itemno'] = 'Élément {$a}';
$string['itemscount'] = 'Nombre<br /> éléments';
$string['itemtoadd'] = 'Éléments à ajouter';
$string['keptcategory1'] = 'utilisera le même jeu de données partagé existant que précédemment';
$string['keptcategory2'] = 'Un fichier d\'un ensemble réutilisable de fichiers de la même catégorie, comme précédemment';
$string['keptcategory3'] = 'Un lien d\'un ensemble réutilisable de liens de la même catégorie, comme précédemment';
$string['keptlocal1'] = 'utilisera le même jeu de données privé existant que précédemment';
$string['keptlocal2'] = 'Un fichier d\'un ensemble privé de fichiers de la même question, comme précédemment';
$string['keptlocal3'] = 'Un lien d\'un ensemble privé de liens de la même question, comme précédemment';
$string['loguniform'] = 'Log uniforme';
$string['loguniformbit'] = 'chiffres, pour une distribution log uniforme';
$string['makecopynextpage'] = 'Page suivante (nouvelle question)';
$string['mandatoryhdr'] = 'Caractère joker obligatoire présent dans les réponses';
$string['max'] = 'Maximum';
$string['min'] = 'Minimum';
$string['minmax'] = 'Plage de valeurs';
$string['missingformula'] = 'Formule manquante';
$string['missingname'] = 'Nom de la question manquant';
$string['missingquestiontext'] = 'Texte de la question manquant';
$string['mustbenumeric'] = 'Vous devez saisir un nombre dans ce champ.';
$string['mustenteraformulaorstar'] = 'Vous devez saisir une formule ou « * ».';
$string['mustnotbenumeric'] = 'Ceci ne peut pas être un nombre.';
$string['newcategory1'] = 'utilisera un nouveau jeu de données partagé';
$string['newcategory2'] = 'Un fichier d\'un nouvel ensemble de fichiers, pouvant être utilisé par d\'autres questions de cette catégorie';
$string['newcategory3'] = 'Un lien d\'un nouvel ensemble de liens, pouvant être utilisé par d\'autres questions de cette catégorie';
$string['newlocal1'] = 'utilisera un nouveau jeu de données privé';
$string['newlocal2'] = 'Un fichier d\'un nouvel ensemble de fichiers qui ne seront utilisés que par cette question';
$string['newlocal3'] = 'Un lien d\'un nouvel ensemble de liens qui ne seront utilisés que par cette question';
$string['newsetwildcardvalues'] = 'nouveau(x) jeu(x) de données';
$string['nextitemtoadd'] = '« Élément à ajouter » suivant';
$string['nextpage'] = 'Page suivante';
$string['nocoherencequestionsdatyasetcategory'] = 'Pour la question d\'identifiant {$a->qid}, la catégorie d\'identifiant {$a->qcat} n\'est pas identique à la variable partagée {$a->name} de la catégorie {$a->sharedcat}.
Modifiez la question.';
$string['nocommaallowed'] = 'La virgule ne peut pas être utilisée. Utilisez un point décimal, comme dans 0.013 ou 1.3e-2';
$string['nodataset'] = 'rien - ce n\'est pas un caractère joker';
$string['nosharedwildcard'] = 'Pas de caractère joker dans cette catégorie';
$string['notvalidnumber'] = 'Les valeurs de la variable ne sont pas des nombres valides';
$string['oneanswertrueansweroutsidelimits'] = 'Au moins une réponse correct est en dehors des vraies limites.<br />Veuillez modifier les paramètres de tolérance, dans les paramètres avancés';
$string['param'] = 'Paramètre {<strong>{$a}</strong>}';
$string['partiallycorrectfeedback'] = 'Pour toute réponse partiellement correcte';
$string['pluginname'] = 'Calculée';
$string['pluginnameadding'] = 'Ajout d\'une question calculée';
$string['pluginnameediting'] = 'Modification d\'une question calculée';
$string['pluginname_help'] = 'Les questions calculées permettent de créer des questions numériques en utilisant des variables, placées entre deux accolades, qui sont remplacées pas des valeurs lorsque le test est lancé. Par exemple, la question « Quelle est l\'aire d\'un rectangle de longueur {a} et de largeur {b} ?» aura comme réponse correcte la formule « {a}*{b} » (où le symbole * représente la multiplication).';
$string['pluginnamesummary'] = 'Les questions calculées sont des questions numériques dont les nombres sont tirés aléatoirement d\'un jeu de données lorsque le test est effectué.';
$string['possiblehdr'] = 'Des caractères joker sont peut-être présents seulement dans le texte de la question';
$string['questiondatasets'] = 'Jeu de données de la question';
$string['questiondatasets_help'] = 'Jeux de données des variables qui seront utilisés dans chacune des questions';
$string['questionstoredname'] = 'Nom enregistré pour la question';
$string['replacewithrandom'] = 'Remplacer par une valeur aléatoire';
$string['reuseifpossible'] = 'réutilise les valeurs précédentes si possible';
$string['setno'] = 'Jeu {$a}';
$string['setwildcardvalues'] = 'valeurs des jeux de données';
$string['sharedwildcard'] = 'Variable {<strong>{$a}</strong>} partagée';
$string['sharedwildcardname'] = 'Variable partagée';
$string['sharedwildcards'] = 'Variables partagées';
$string['showitems'] = 'Afficher';
$string['significantfigures'] = 'avec {$a}';
$string['significantfiguresformat'] = 'chiffres significatifs';
$string['synchronize'] = 'Synchroniser les valeurs du jeu de données partagé avec d\'autres questions d\'un test';
$string['synchronizeno'] = 'Ne pas synchroniser';
$string['synchronizeyes'] = 'Synchroniser';
$string['synchronizeyesdisplay'] = 'Synchroniser et utiliser le nom des jeux de données partagés comme préfixe du nom de la question';
$string['tolerance'] = 'Tolérance &plusmn;';
$string['trueanswerinsidelimits'] = 'Réponse correcte : {$a->correct} dans les limites de la valeur réelle {$a->true}';
$string['trueansweroutsidelimits'] = '<span class="error">Erreur de réponse correcte : {$a->correct} en dehors des limites de la valeur réelle {$a->true}</span>';
$string['uniform'] = 'Uniforme';
$string['uniformbit'] = 'décimales, avec une distribution uniforme';
$string['unsupportedformulafunction'] = 'La fonction {$a} n\'est pas supportée';
$string['updatecategory'] = 'Modifier la catégorie';
$string['updatedatasetparam'] = 'Mettre à jour les paramètres des jeux de données';
$string['updatetolerancesparam'] = 'Mettre à jour les paramètres de tolérance de réponses';
$string['updatewildcardvalues'] = 'Mettre à jour les valeurs de variable(s)';
$string['useadvance'] = 'Utilisez le bouton avancé pour voir les erreurs';
$string['usedinquestion'] = 'Utilisé dans la question';
$string['wildcard'] = 'Variable {<strong>{$a}</strong>}';
$string['wildcardparam'] = 'Paramètres de variables utilisés pour générer les valeurs';
$string['wildcardrole'] = 'Les variables <strong>{x..}</strong> seront remplacées par des valeurs numériques issues des valeurs générées';
$string['wildcards'] = 'Variables {a}...{z}';
$string['wildcardvalues'] = 'Valeurs des variables';
$string['wildcardvaluesgenerated'] = 'Valeurs générées des variables';
$string['youmustaddatleastoneitem'] = 'Vous devez ajouter au moins un élément d\'un jeu de données avant d\'enregistrer cette question.';
$string['youmustaddatleastonevalue'] = 'Vous devez ajouter au moins un jeu de valeurs aux variables avant d\'enregistrer cette question.';
$string['youmustenteramultiplierhere'] = 'Vous devez saisir un coefficient dans ce champ.';
$string['zerosignificantfiguresnotallowed'] = 'La réponse correcte ne peut pas avoir aucun chiffre significatif !';
