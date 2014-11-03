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
 * Strings for component 'grades', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   grades
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activities'] = 'Activités';
$string['addcategory'] = 'Ajouter une catégorie';
$string['addcategoryerror'] = 'Impossible d\'ajouter une catégorie.';
$string['addexceptionerror'] = 'Une erreur est survenue lors de l\'ajout d\'une exception pour userid:gradeitem';
$string['addfeedback'] = 'Ajouter un feedback';
$string['addgradeletter'] = 'Ajouter une note lettre';
$string['addidnumbers'] = 'Ajouter les identifiants';
$string['additem'] = 'Ajouter un élément d\'évaluation';
$string['addoutcome'] = 'Ajouter un objectif';
$string['addoutcomeitem'] = 'Ajouter un élément d\'objectif';
$string['addscale'] = 'Ajouter un barème';
$string['aggregateextracreditmean'] = 'Moyenne des notes (avec bonus)';
$string['aggregatemax'] = 'Note la plus haute';
$string['aggregatemean'] = 'Moyenne des notes';
$string['aggregatemedian'] = 'Médiane des notes';
$string['aggregatemin'] = 'Note la plus basse';
$string['aggregatemode'] = 'Mode des notes';
$string['aggregateonlygraded'] = 'Calcul des tendances centrales seulement pour notes non vides';
$string['aggregateonlygraded_help'] = '<!-- $Id$ -->


<p>Les notes non existantes sont soit traitées comme notes minimales, soit pas incluses dans le calcul des tendances centrales.</p>';
$string['aggregateoutcomes'] = 'Inclure les objectifs dans les tendances centrales';
$string['aggregateoutcomes_help'] = '<!-- $Id$ -->


<p>De l\'inclusion des objectifs dans le calcul des tendances centrales peut découler une note globale non désirée. Vous avez la possibilité de les inclure ou non dans le calcul des notes.</p>';
$string['aggregatesonly'] = 'Seulement tendances centrales';
$string['aggregatesubcats'] = 'Inclure les sous-catégories dans les tendances centrales';
$string['aggregatesubcats_help'] = '<!-- $Id$ -->


<p>Le calcul des tendances centrales est habituellement effectué sur les notes de la catégorie. Il est aussi possible de calculer les tendances centrales en incluant les notes individuelles de toutes les sous-catégories, tout en excluant les autres tendances centrales calculées.</p>';
$string['aggregatesum'] = 'Sommes des notes';
$string['aggregateweightedmean'] = 'Moyenne pondérée des notes';
$string['aggregateweightedmean2'] = 'Simple moyenne pondérée des notes';
$string['aggregation'] = 'Tendance centrale';
$string['aggregationcoef'] = 'Coefficient';
$string['aggregationcoefextra'] = 'Bonus';
$string['aggregationcoefextra_help'] = 'Lorsque la tendance centrale choisie est la « Somme des notes » ou « Moyenne simple pondérée » et que la case « Bonus » est cochée, la note maximale de l\'élément d\'évaluation n\'est pas comptée dans le maximum du total des notes. Cela a pour conséquence qu\'il est possible d\'obtenir la note maximale (ou une note dépassant la note maximale, si l\'administrateur du site a activé cette possibilité) dans la catégorie sans obtenir la note maximale dans tous les éléments d\'évaluation.

Si la tendance centrale choisie est « Moyenne des notes (avec points supplémentaires) » et que les points supplémentaires indiqués sont plus grands que 0, les points supplémentaires constituent le facteur qui multiplie la note avant de l\'ajouter au total, après le calcul de la moyenne.';
$string['aggregationcoefextrasum'] = 'Bonus';
$string['aggregationcoefextrasum_help'] = 'Si la case « Bonus » est cochée, la note maximale de l\'élément d\'évaluation ne sera pas ajoutée à la note maximale de la catégorie, offrant la possibilité d\'obtenir la note maximale (ou une note dépassant la note maximale, si l\'administrateur du site a activé cette possibilité) dans la catégorie sans obtenir la note maximale dans tous les éléments d\'évaluation.';
$string['aggregationcoefextraweight'] = 'Coefficient de bonus';
$string['aggregationcoefextraweight_help'] = 'Si la pondération pour le bonus est plus grande que 0, la note est traitée comme bonus lors du calcul de la tendance centrale. Ce nombre est le facteur par lequel la note est multipliée avant d\'être ajoutée au total des notes pour le calcul de la moyenne.';
$string['aggregationcoefweight'] = 'Coefficient de l\'élément';
$string['aggregationcoefweight_help'] = '<!-- $Id$ -->


<p>Pondération appliquée à toutes les notes de cet élément d\'évaluation lors du calcul de la tendance centrale.</p>';
$string['aggregation_help'] = 'La tendance centrale détermine comment les notes d\'une catégorie sont combinées.

* Moyenne des notes : la somme de toutes les notes divisée par le nombre total de notes.
* Médiane des notes : la note du milieu de la liste, lorsque les notes sont classées par ordre de grandeur.
* Note la plus basse.
* Note la plus haute.
* Mode des notes : la note qui revient le plus souvent dans la liste.
* Somme des notes : la somme de toutes les notes, sans pondération.';
$string['aggregationposition'] = 'Position de la tendance centrale';
$string['aggregationposition_help'] = '<!-- $Id$ -->


<p>La position de la colonne <i>Tendance centrale</i> dans le rapport, relativement aux notes dont on calcule la tendance centrale.</p>';
$string['aggregationsvisible'] = 'Types de tendances centrales disponibles';
$string['aggregationsvisiblehelp'] = 'Sélectionnez tous les types de tendances centrales que vous voulez autoriser.';
$string['allgrades'] = 'Toutes les notes par catégorie';
$string['allstudents'] = 'Tous les étudiants';
$string['allusers'] = 'Tous les utilisateurs';
$string['autosort'] = 'Tri automatique';
$string['availableidnumbers'] = 'Identifiants disponibles';
$string['average'] = 'Moyenne';
$string['averagesdecimalpoints'] = 'Décimales des moyennes de colonnes';
$string['averagesdecimalpoints_help'] = 'Ce réglage spécifie le nombre de décimales à afficher pour chaque moyenne de colonne. Si « Hériter » est sélectionné, le type d\'affichage de chaque colonne est utilisé.';
$string['averagesdisplaytype'] = 'Type d\'affichage des moyennes de colonnes';
$string['averagesdisplaytype_help'] = 'Ce réglage spécifie comment afficher des moyennes de chaque colonne. Si « Hériter » est sélectionné, le type d\'affichage de chaque colonne est utilisé.';
$string['backupwithoutgradebook'] = 'La sauvegarde ne contient pas la configuration du carnet de notes';
$string['badgrade'] = 'La note fournie n\'est pas valide';
$string['badlyformattedscale'] = 'Veuillez spécifier une liste de valeurs séparées par des virgules (au moins deux valeurs requises).';
$string['baduser'] = 'L\'utilisateur indiqué n\'est pas valide';
$string['bonuspoints'] = 'Bonus';
$string['bulkcheckboxes'] = 'Cases à cocher en vrac';
$string['calculatedgrade'] = 'Note calculée';
$string['calculation'] = 'Calcul';
$string['calculationadd'] = 'Ajouter calcul';
$string['calculationedit'] = 'Modifier calcul';
$string['calculation_help'] = 'Les calculs de notes utilisent une syntaxe similaire à celle des fonctions de tableurs. Une formule commence par un signe d\'égalité (=) et emploie des opérateurs et fonctions mathématiques usuels, comme min, max ou sum. On peut au besoin inclure dans les formules les valeurs d\'autres éléments d\'évaluations en indiquant leur identifiant entouré de deux paires de crochets [[...]].';
$string['calculationsaved'] = 'Calcul enregistré';
$string['calculationview'] = 'Afficher calcul';
$string['cannotaccessgroup'] = 'Impossible d\'accéder aux notes du groupe sélectionné.';
$string['categories'] = 'Catégories';
$string['categoriesanditems'] = 'Catégories et éléments';
$string['categoriesedit'] = 'Modifier les catégories et éléments';
$string['category'] = 'Catégorie';
$string['categoryedit'] = 'Modifier catégorie';
$string['categoryname'] = 'Nom de la catégorie';
$string['categorytotal'] = 'Total de la catégorie';
$string['categorytotalfull'] = 'Total de {$a->category}';
$string['categorytotalname'] = 'Nom du total de la catégorie';
$string['changedefaults'] = 'Modifier les réglages par défaut';
$string['changereportdefaults'] = 'Modifier les rapports par défaut';
$string['chooseaction'] = 'Choisir une action...';
$string['choosecategory'] = 'Choisir une catégorie';
$string['combo'] = 'Onglets et menu déroulant';
$string['compact'] = 'Compact';
$string['componentcontrolsvisibility'] = 'La visibilité de cet élément d\'évaluation est contrôlée par les réglages de l\'activité.';
$string['contract'] = 'Minimiser la catégorie';
$string['controls'] = 'Commandes';
$string['courseavg'] = 'Moyenne du cours';
$string['coursegradecategory'] = 'Catégorie de notes du cours';
$string['coursegradedisplaytype'] = 'Type d\'affichage des notes du cours';
$string['coursegradedisplayupdated'] = 'Le type d\'affichage des notes du cours a été modifié.';
$string['coursegradesettings'] = 'Réglages des notes du cours';
$string['coursename'] = 'Nom du cours';
$string['coursescales'] = 'Barèmes du cours';
$string['coursesettings'] = 'Réglages du cours';
$string['coursesettingsexplanation'] = 'Les réglages du cours déterminent la présentation du carnet de notes pour tous les participants du cours.';
$string['coursetotal'] = 'Total du cours';
$string['createcategory'] = 'Créer une catégorie';
$string['createcategoryerror'] = 'Impossible de créer une nouvelle catégorie';
$string['creatinggradebooksettings'] = 'Création des réglages du carnet de notes';
$string['csv'] = 'CSV';
$string['currentparentaggregation'] = 'Tendance centrale parente actuelle';
$string['curveto'] = 'Normaliser à';
$string['decimalpoints'] = 'Décimales';
$string['decimalpoints_help'] = '<!-- $Id$ -->


<p>Spécifie le nombre de décimales à afficher pour chaque note. Ce réglage n\'a pas d\'effet sur le résultat des calculs, qui sont effectués dans tous les cas avec une précision de 5 décimales.</p>';
$string['default'] = 'Défaut';
$string['defaultprev'] = 'Défaut ({$a})';
$string['deletecategory'] = 'Supprimer une catégorie';
$string['disablegradehistory'] = 'Désactiver l\'historique des notes';
$string['disablegradehistory_help'] = 'Désactiver le suivi des modifications des tables concernant les notes. Ce réglage peut améliorer la vitesse de votre serveur et conserve plus d\'espace disque dans votre base de données.';
$string['displaylettergrade'] = 'Afficher les notes lettres';
$string['displaypercent'] = 'Afficher les pourcentages';
$string['displaypoints'] = 'Afficher les points';
$string['displayweighted'] = 'Afficher les notes pondérées';
$string['dropdown'] = 'Menu déroulant';
$string['droplow'] = 'Ignorer les plus basses';
$string['droplowestvalue'] = 'Spécifier la valeur de rejet de la plus petite note';
$string['droplow_help'] = '<!-- $Id$ -->


<p>Cette option permet d\'ignorer les <i>n</i> notes les plus basses, le nombre <i>n</i> étant sélectionné dans le menu déroulant.</p>';
$string['dropped'] = 'Ignoré';
$string['dropxlowest'] = 'Ignorer les <i>n</i> notes les plus basses';
$string['dropxlowestwarning'] = 'Remarque : si vous utilisez l\'option « ignorer les n notes les plus basses »,<br />tous les éléments de la catégorie seront considérés comme valant<br />le même nombre de points. Si ces valeurs varient, les résultats seront imprévisibles !';
$string['duplicatescale'] = 'Barème en doublon';
$string['edit'] = 'Modifier';
$string['editcalculation'] = 'Modifier calcul';
$string['editcalculationverbose'] = 'Modifier le calcul de {$a->category} {$a->itemmodule} {$a->itemname}';
$string['editfeedback'] = 'Modifier feedback';
$string['editgrade'] = 'Modifier note';
$string['editgradeletters'] = 'Modifier les notes lettres';
$string['editoutcome'] = 'Modifier l\'objectif';
$string['editoutcomes'] = 'Modifier les objectifs';
$string['editscale'] = 'Modifier le barème';
$string['edittree'] = 'Catégories et éléments';
$string['editverbose'] = 'Modifier {$a->category} {$a->itemmodule} {$a->itemname}';
$string['enableajax'] = 'Activer AJAX';
$string['enableajax_help'] = 'Ajoute des fonctionnalités AJAX au rapport de l\'évaluateur, pour simplifier et accélérer les opérations habituelles. Nécessite l\'activation de Javascript sur le navigateur de l\'utilisateur.';
$string['enableoutcomes'] = 'Activer les objectifs';
$string['enableoutcomes_help'] = 'L\'activation des objectifs (compétences, buts, standards ou critères) permet d\'évaluer les résultats d\'après un ou plusieurs barèmes liés à des énoncés d\'objectifs. L\'activation de ce réglage active cette option  pour tout le site.';
$string['encoding'] = 'Encodage';
$string['errorcalculationbroken'] = 'Référence circulaire ou formule de calcul incorrecte';
$string['errorcalculationnoequal'] = 'La formule doit commencer par un signe d\'égalité (=1+2)';
$string['errorcalculationunknown'] = 'Formule non valide';
$string['errorgradevaluenonnumeric'] = 'Une note non-numérique a été reçue (note haute ou basse) pour';
$string['errornocalculationallowed'] = 'Les calculs ne sont pas autorisés pour cet élément';
$string['errornocategorisedid'] = 'Impossible d\'obtenir un identifiant sans catégorie !';
$string['errornocourse'] = 'Impossible d\'obtenir les informations du cours';
$string['errorreprintheadersnonnumeric'] = 'Valeur non-numérique reçue pour le réaffichage des entêtes';
$string['errorsavegrade'] = 'Impossible d\'enregistrer la note.';
$string['errorsettinggrade'] = 'Erreur de l\'enregistrement de la note « {$a->itemname} » pour l\'identifiant utilisateur {$a->userid}';
$string['errorupdatinggradecategoryaggregateonlygraded'] = 'Erreur lors de la modification du réglage « Tendance centrale pour notes non vides » de la catégorie de note d\'identifiant {$a->id}';
$string['errorupdatinggradecategoryaggregateoutcomes'] = 'Erreur lors de la modification du réglage « Inclure les objectifs dans les tendances centrales » de la catégorie de note d\'identifiant {$a->id}';
$string['errorupdatinggradecategoryaggregatesubcats'] = 'Erreur lors de la modification du réglage « Inclure les sous-catégories dans les tendances centrales » de la catégorie de note d\'identifiant {$a->id}';
$string['errorupdatinggradecategoryaggregation'] = 'Erreur lors de la modification du type de tendance centrale de la catégorie de note d\'identifiant {$a->id}';
$string['errorupdatinggradeitemaggregationcoef'] = 'Erreur lors de la modification du coefficient (pondération ou bonus) de l\'élément d\'évaluation d\'identifiant {$a->id}';
$string['excluded'] = 'Exclue';
$string['excluded_help'] = '<!-- $Id$ -->


<p>Si cette option est activée, la note ne sera prise en compte dans aucun calcul de tendance centrale effectuée dans les éléments d\'évaluation ou les catégories auxquels appartiennent la note.</p>';
$string['expand'] = 'Déplier la catégorie';
$string['export'] = 'Exporter';
$string['exportalloutcomes'] = 'Exporter tous les objectifs';
$string['exportfeedback'] = 'Inclure les feedbacks dans l\'exportation';
$string['exportonlyactive'] = 'Exclure les utilisateurs suspendus';
$string['exportonlyactive_help'] = 'N\'inclure dans l\'exportation que les participants dont l\'inscription est active et n\'a pas été suspendue';
$string['exportplugins'] = 'Modules d\'exportation';
$string['exportsettings'] = 'Réglages d\'exportation';
$string['exportto'] = 'Exporter vers';
$string['extracreditvalue'] = 'Bonus pour {$a}';
$string['extracreditwarning'] = 'Remarque : si tous les éléments d\'une catégorie sont cochés comme bonus, cela aura pour effet de les retirer complètement du calcul des notes, puisqu\'il n\'y aura pas de point au total.';
$string['feedback'] = 'Feedback';
$string['feedbackadd'] = 'Ajouter feedback';
$string['feedbackedit'] = 'Modifier feedback';
$string['feedbackforgradeitems'] = 'Feedback pour {$a}';
$string['feedback_help'] = '<!-- $Id$ -->


<p>Les remarques ajoutées à la note par l\'enseignant. Ces remarques peuvent être détaillées ou au contraire un simple code faisant référence à votre système de feedback personnel.</p>';
$string['feedbacks'] = 'Feedbacks';
$string['feedbacksaved'] = 'Feedback enregistré';
$string['feedbackview'] = 'Afficher feedback';
$string['finalgrade'] = 'Note finale';
$string['finalgrade_help'] = '<!-- $Id -->


<p>La note finale (mise en cache), une fois tous les calculs effectués.</p>';
$string['fixedstudents'] = 'Colonne étudiants statique';
$string['fixedstudents_help'] = 'Permet aux notes de défiler horizontalement sans perdre de vue la colonne des étudiants, en rendant statique cette dernière.';
$string['forceoff'] = 'Imposer : non';
$string['forceon'] = 'Imposer : oui';
$string['forelementtypes'] = 'pour les {$a} sélectionnés';
$string['forstudents'] = 'Pour les étudiants';
$string['full'] = 'Complet';
$string['fullmode'] = 'Affichage complet';
$string['fullview'] = 'Affichage complet';
$string['generalsettings'] = 'Réglages généraux';
$string['grade'] = 'Note';
$string['gradeadministration'] = 'Administration des notes';
$string['gradeanalysis'] = 'Analyse de l\'évaluation';
$string['gradebook'] = 'Carnet de notes';
$string['gradebookhiddenerror'] = 'Le carnet de notes est configuré de façon à cacher toutes ses données aux étudiants.';
$string['gradebookhistories'] = 'Historiques d\'évaluation';
$string['gradeboundary'] = 'Limite pour note lettre';
$string['gradeboundary_help'] = '<!-- $Id$ -->


<p>Une limite en pourcent au-dessus de laquelle les notes seront converties en une lettre (si l\'affichage des notes lettres est choisi).</p>';
$string['gradecategories'] = 'Catégories de note';
$string['gradecategory'] = 'Catégorie de note';
$string['gradecategoryonmodform'] = 'Catégorie de note';
$string['gradecategoryonmodform_help'] = 'Ce réglage définit la catégorie du carnet de notes dans laquelle les notes de cette activité sont placées.';
$string['gradecategorysettings'] = 'Réglages des catégories';
$string['gradedisplay'] = 'Affichage des notes';
$string['gradedisplaytype'] = 'Type d\'affichage des notes';
$string['gradedisplaytype_help'] = '<!-- $Id$ -->


<p>Spécifie comment afficher les notes dans les rapports de l\'évaluateur et du participant. Les notes peuvent être affichées comme notes réelles, comme pourcentages (relativement aux notes maximale et minimale) ou comme lettres.</p>';
$string['gradedon'] = 'Évalué le {$a}';
$string['gradeexport'] = 'Exportation de notes';
$string['gradeexportcustomprofilefields'] = 'Champs de profil personnalisés pour exportation des notes';
$string['gradeexportcustomprofilefields_desc'] = 'Inclure ces champs de profil personnalisés dans l\'exportation des notes, séparés par des virgules.';
$string['gradeexportdecimalpoints'] = 'Nombre de décimales des notes exportées';
$string['gradeexportdecimalpoints_desc'] = 'Nombre de décimales à afficher lors de l\'exportation. Ce réglage peut être modifié lors de chaque exportation.';
$string['gradeexportdisplaytype'] = 'Type d\'affichage des notes exportées';
$string['gradeexportdisplaytype_desc'] = 'Lors de l\'exportation, les notes peuvent être affichées comme notes brutes, comme pourcentages (relativement aux notes maximale et minimale) ou comme lettres (A, B, C, etc.). Ce réglage peut être modifié lors de chaque exportation.';
$string['gradeexportuserprofilefields'] = 'Champs de profil pour exportation des notes';
$string['gradeexportuserprofilefields_desc'] = 'Inclure ces champs de profil dans l\'exportation des notes, séparés par des virgules.';
$string['gradeforstudent'] = '{$a->student}<br />{$a->item}{$a->feedback}';
$string['gradehelp'] = 'Aide sur les notes';
$string['gradehistorylifetime'] = 'Durée de l\'historique des notes';
$string['gradehistorylifetime_help'] = 'Ce réglage permet d\'indiquer la durée pendant laquelle vous voulez conserver le suivi des modifications des tables concernant les notes. Il est recommandé de les conserver le plus longtemps possible. Si vous avez des problèmes de performance ou un espace disque limité pour votre base de données, essayez d\'indiquer une durée plus basse.';
$string['gradeimport'] = 'Importation de notes';
$string['gradeimportfailed'] = 'L\'importation de notes a échoué. Détails :';
$string['gradeitem'] = 'Élément d\'évaluation';
$string['gradeitemaddusers'] = 'Exclure de la note';
$string['gradeitemadvanced'] = 'Options avancées éléments d\'évaluation';
$string['gradeitemadvanced_help'] = 'Sélectionnez tous les éléments qui devront être affichés comme éléments avancés lors de la modification des éléments d\'évaluation.';
$string['gradeitemislocked'] = 'La note de cette activité est verrouillée dans le carnet de notes. Les modifications des notes de cette activité ne seront pas répercutées dans le carnet de notes tant qu\'il n\'est pas déverrouillé.';
$string['gradeitemlocked'] = 'Évaluation verrouillée';
$string['gradeitemmembersselected'] = 'Exclu(s) de la note';
$string['gradeitemnonmembers'] = 'Inclus dans la note';
$string['gradeitemremovemembers'] = 'Inclure dans la note';
$string['gradeitems'] = 'Éléments d\'évaluation';
$string['gradeitemsettings'] = 'Réglages des éléments';
$string['gradeitemsinc'] = 'Éléments d\'évaluation à inclure';
$string['gradeletter'] = 'Note lettre';
$string['gradeletter_help'] = '<!-- $Id$ -->


<p>Une lettre ou autre symbole utilisé pour représenter un intervalle de notes.</p>';
$string['gradeletternote'] = 'Pour supprimer une note lettre, effacer simplement le contenu des trois<br />zones lui correspondant et cliquer sur « Enregistrer les changements ».';
$string['gradeletters'] = 'Notes lettres';
$string['gradelocked'] = 'La note est verrouillée';
$string['gradelong'] = '{$a->grade} / {$a->max}';
$string['grademax'] = 'Note maximale';
$string['grademax_help'] = '<!-- $Id$ -->


<p>Lorsque le type de note est valeur, une note maximale peut être fixée. La note maximale pour un élément d\'évaluation basé sur une activité est géré sur la page de modification de l\'activité.</p>';
$string['grademin'] = 'Note minimale';
$string['grademin_help'] = '<!-- $Id$ -->


<p>Lorsque le type de note est valeur, une note minimale peut être fixée.</p>';
$string['gradeoutcomeitem'] = 'Évaluer élément d\'objectif';
$string['gradeoutcomes'] = 'Objectifs';
$string['gradeoutcomescourses'] = 'Objectifs du cours';
$string['gradepass'] = 'Note pour passer';
$string['gradepass_help'] = 'Ce réglage détermine la note minimale pour passer. La valeur est utilisée dans l\'achèvement d\'activités et de cours, ainsi que dans le carnet de note, où les notes supérieures sont en vert et les notes inférieures en rouge.';
$string['gradepreferences'] = 'Préférences des notes';
$string['gradepreferenceshelp'] = 'Aide sur les préférences des notes';
$string['gradepublishing'] = 'Activer la publication';
$string['gradepublishing_help'] = 'Active la publication des exportations et importations : il est alors possible d\'accéder aux notes exportées par une URL, sans avoir besoin de se connecter au site Moodle. Les notes peuvent être importées en passant par une telle URL (ce qui signifie qu\'un Moodle peut importer les notes d\'un autre Moodle). Cette fonctionnalité n\'est par défaut disponible que pour les administrateurs. Avant d\'ajouter à d\'autres rôles les capacités nécessaires pour accéder à cette fonctionnalité, veuillez former ses futurs utilisateurs à son fonctionnement (danger potentiel du partage de signets et des accélérateurs de téléchargement, restrictions IP, etc.).';
$string['gradereport'] = 'Rapport d\'évaluation';
$string['graderreport'] = 'Rapport de l\'évaluateur';
$string['grades'] = 'Notes';
$string['gradesforuser'] = 'Notes de {$a->user}';
$string['gradesonly'] = 'Seulement les notes';
$string['gradessettings'] = 'Réglages des notes';
$string['gradetype'] = 'Type de note';
$string['gradetype_help'] = '<!-- $Id$ -->


<p>Indique le type de note utilisé : aucune (pas de note possible), valeur (activation des notes maximale et minimale), barème (activation du réglage du barème) ou texte (feedback uniquement). Seuls les types valeur et barème permettent le calcul d\'une tendance centrale. Le type de note pour un élément d\'évaluation basé sur une activité est géré sur la page de modification de l\'activité.</p>';
$string['gradeview'] = 'Afficher la note';
$string['gradewasmodifiedduringediting'] = 'La note saisie donnée à {$a->username} pour {$a->itemname} a été ignorée, car elle a été mise à jour ultérieurement par quelqu\'un d\'autre.';
$string['gradeweighthelp'] = 'Aide sur les coefficients des notes';
$string['groupavg'] = 'Moyenne du groupe';
$string['hidden'] = 'Caché';
$string['hiddenasdate'] = 'Afficher la date de remise pour les notes cachées';
$string['hiddenasdate_help'] = 'Si le participant n\'a pas le droit de voir les notes cachées, afficher la date de remise au lieu d\'un tiret.';
$string['hidden_help'] = 'Si cette case est cochée, les notes sont cachées aux étudiants. Un délai peut être fixé au besoin, afin d\'afficher les notes après que l\'évaluation soit terminée.';
$string['hiddenuntil'] = 'Caché jusqu\'au';
$string['hiddenuntildate'] = 'Caché jusqu\'au {$a}';
$string['hideadvanced'] = 'Cacher les fonctions avancées';
$string['hideaverages'] = 'Cacher les moyennes';
$string['hidecalculations'] = 'Cacher les calculs';
$string['hidecategory'] = 'Caché';
$string['hideeyecons'] = 'Cacher icônes afficher/cacher';
$string['hidefeedback'] = 'Cacher les feedbacks';
$string['hideforcedsettings'] = 'Cacher les réglages imposés';
$string['hideforcedsettings_help'] = 'Ne pas montrer dans l\'interface les réglages imposés.';
$string['hidegroups'] = 'Cacher les groupes';
$string['hidelocks'] = 'Cacher les cadenas';
$string['hidenooutcomes'] = 'Afficher les objectifs';
$string['hidequickfeedback'] = 'Cacher le feedback rapide';
$string['hideranges'] = 'Cacher les valeurs possibles';
$string['hidetotalifhiddenitems'] = 'Cacher les totaux contenant des éléments cachés';
$string['hidetotalifhiddenitems_help'] = 'Ce réglage détermine si les totaux contenant un ou plusieurs éléments d\'évaluation cachés seront affichés pour les participants ou remplacés par un tiret (-). S\'ils sont affichés, les totaux seront calculés soit en incluant, soit en excluant les éléments d\'évaluation cachés.

Si les éléments cachés sont exclus, le total vu par les participants sera différent de celui vu dans le rapport d\'évaluation par l\'enseignant, puisque celui-ci voit toujours les totaux calculés à partir de tous les éléments, qu\'ils soient cachés ou non. Si les éléments cachés sont inclus, les participants seront potentiellement en mesure de déduire par le calcul la valeur des éléments cachés.';
$string['hidetotalshowexhiddenitems'] = 'Afficher les totaux en excluant les éléments cachés';
$string['hidetotalshowinchiddenitems'] = 'Afficher les totaux en incluant les éléments cachés';
$string['hideverbose'] = 'Cacher {$a->category} {$a->itemmodule} {$a->itemname}';
$string['highgradeascending'] = 'Tri croissant par note maximale';
$string['highgradedescending'] = 'Tri décroissant par note maximale';
$string['highgradeletter'] = 'Haut';
$string['identifier'] = 'Identifier les utilisateurs par';
$string['idnumbers'] = 'Identifiants';
$string['ignore'] = 'Ignorer';
$string['import'] = 'Importer';
$string['importcsv'] = 'Importation CSV';
$string['importcustom'] = 'Importer comme objectifs de ce cours';
$string['importerror'] = 'Une erreur est survenue. Ce script n\'a pas été appelé avec les paramètres adéquats.';
$string['importfailed'] = 'L\'importation a échoué. Aucune donnée n\'a été importée.';
$string['importfeedback'] = 'Importer les feedbacks';
$string['importfile'] = 'Fichier à importer';
$string['importfilemissing'] = 'Aucun fichier n\'a été reçu. Veuillez revenir au formulaire et vous assurer de déposer un fichier valide.';
$string['importfrom'] = 'Importer de';
$string['importoutcomenofile'] = 'Le fichier déposé est vide ou corrompu. Veuillez le vérifier. Le problème a été détecté à la ligne {$a} ; cette erreur survient lorsque des lignes ne comportent pas le même nombre de colonnes que la première ligne (entête) ou quand le fichier importé ne comprend pas l\'entête attendue. Veuillez consulter le fichier exporté à titre d\'exemple de fichier avec une entête valide.';
$string['importoutcomes'] = 'Importer des objectifs';
$string['importoutcomes_help'] = 'Des objectifs peuvent être importés depuis un fichier CSV du même format que les objectifs exportés.';
$string['importoutcomesuccess'] = 'Objectif « {$a->name} » importé avec l\'identifiant {$a->id}';
$string['importplugins'] = 'Modules d\'importation';
$string['importpreview'] = 'Prévisualisation de l\'importation';
$string['importsettings'] = 'Réglages d\'importation';
$string['importskippednomanagescale'] = 'Vous n\'avez pas les droits d\'accès requis pour ajouter un nouveau barème. L\'objectif « {$a} » a donc été ignoré, car il requiert la création d\'un nouveau barème';
$string['importskippedoutcome'] = 'Un objectif de même intitulé abrégé « {$a} » existe déjà dans ce contexte. L\'objectif du même nom à importer a été ignoré.';
$string['importstandard'] = 'Importer comme objectifs standards';
$string['importsuccess'] = 'Importation des notes réussie';
$string['importxml'] = 'Importation XML';
$string['includescalesinaggregation'] = 'Inclure les barèmes dans les tendances centrales';
$string['includescalesinaggregation_help'] = 'Vous pouvez indiquer si les barèmes doivent être inclus en tant que nombres dans toutes les tendances centrales des notes de tous les carnets de tous les cours. ATTENTION : la modification de ce réglage entraînera le re-calcul de toutes les tendances centrales.';
$string['incorrectcourseid'] = 'Le no de cours est incorrect';
$string['incorrectcustomscale'] = '(Barème personnel incorrect. Veuillez le modifier.)';
$string['incorrectminmax'] = 'Le minimum doit être inférieur au maximum';
$string['inherit'] = 'Hériter';
$string['intersectioninfo'] = 'Infos participant/note';
$string['item'] = 'Élément';
$string['iteminfo'] = 'Info élément';
$string['iteminfo_help'] = '<!-- $Id$ -->


<p>Un endroit où indiquer des informations concernant l\'élément d\'évaluation. Le texte saisi n\'apparaît nulle part ailleurs.</p>';
$string['itemname'] = 'Nom élément';
$string['itemnamehelp'] = 'Le nom de cet élément, fourni par le module.';
$string['items'] = 'Éléments';
$string['itemsedit'] = 'Modifier un élément d\'évaluation';
$string['keephigh'] = 'Garder les plus hautes';
$string['keephigh_help'] = 'Cette option permet de ne considérer que les <i>n</i> notes les plus élevées, le nombre <i>n</i> étant sélectionné dans le menu déroulant.';
$string['keymanager'] = 'Gestionnaire de clefs';
$string['lessthanmin'] = 'La note saisie dans {$a->itemname} pour {$a->username} est inférieure au minimum permis';
$string['letter'] = 'Lettre';
$string['lettergrade'] = 'Note lettre';
$string['lettergradenonnumber'] = 'La note maximale et/ou minimale n\'est pas numérique pour';
$string['letterpercentage'] = 'Lettre (pourcentage)';
$string['letterreal'] = 'Lettre (brute)';
$string['letters'] = 'Lettres';
$string['linkedactivity'] = 'Activité liée';
$string['linkedactivity_help'] = '<!-- $Id$ -->


<p>Spécifie une activité optionnelle à laquelle cet élément d\'objectif est lié. On utilise ceci pour mesurer la performance d\'un participant par rapport à un critère non évalué par la note de l\'activité.</p>';
$string['linktoactivity'] = 'Lien vers l\'activité {$a->name}';
$string['lock'] = 'Verrouiller';
$string['locked'] = 'Verrouillé';
$string['locked_help'] = 'Si cette case est cochée, les notes ne sont plus mises à jour automatiquement par l\'activité d\'où elles proviennent.';
$string['locktime'] = 'Verrouiller après';
$string['locktimedate'] = 'Verrouillé après le {$a}';
$string['lockverbose'] = 'Verrouiller {$a->category} {$a->itemmodule} {$a->itemname}';
$string['lowest'] = 'Le plus bas';
$string['lowgradeletter'] = 'Bas';
$string['manualitem'] = 'Élément manuel';
$string['mapfrom'] = 'Lier depuis';
$string['mappings'] = 'Correspondance des éléments d\'évaluation';
$string['mapto'] = 'Lier à';
$string['max'] = 'Maximum';
$string['maxgrade'] = 'Note maximale';
$string['meanall'] = 'Toutes les notes';
$string['meangraded'] = 'Notes non vides';
$string['meanselection'] = 'Notes sélectionnées pour moyennes de colonnes';
$string['meanselection_help'] = 'Indique si les cellules sans note doivent être incluses dans le calcul des moyennes de chaque colonne.';
$string['median'] = 'Médiane';
$string['min'] = 'Minimum';
$string['missingscale'] = 'Un barème doit être sélectionné';
$string['mode'] = 'Mode';
$string['morethanmax'] = 'La note saisie dans {$a->itemname} pour {$a->username} est supérieure au maximum permis';
$string['moveselectedto'] = 'Déplacer les éléments sélectionnés vers';
$string['movingelement'] = 'Déplacement de {$a}';
$string['multfactor'] = 'Multiplicateur';
$string['multfactor_help'] = '<!-- $Id$ -->


<p>Nombre par lequel toutes les notes de cet élément d\'évaluation seront multipliées.</p>';
$string['multfactorvalue'] = 'Multiplicateur pour {$a}';
$string['mypreferences'] = 'Mes préférences';
$string['myreportpreferences'] = 'Mes préférences de rapport';
$string['navmethod'] = 'Méthode de navigation';
$string['neverdeletehistory'] = 'Ne jamais supprimer l\'historique';
$string['newcategory'] = 'Nouvelle catégorie';
$string['newitem'] = 'Nouvel élément d\'évaluation';
$string['newoutcomeitem'] = 'Nouvel élément d\'objectif';
$string['no'] = 'Non';
$string['nocategories'] = 'Les catégories de note ne peuvent être ajoutées ou trouvées dans ce cours';
$string['nocategoryname'] = 'Aucun nom de catégorie n\'a été donné.';
$string['nocategoryview'] = 'Aucune catégorie à afficher par';
$string['nocourses'] = 'Il n\'y a pas encore de cours';
$string['noforce'] = 'Ne pas imposer';
$string['nogradeletters'] = 'Aucune note lettre fixée';
$string['nogradesreturned'] = 'Aucune note retournée';
$string['noidnumber'] = 'Pas d\'identifiant';
$string['nolettergrade'] = 'Pas de note lettre pour';
$string['nomode'] = 'ND';
$string['nonnumericweight'] = 'Valeur non numérique reçue pour';
$string['nonunlockableverbose'] = 'Cette note ne peut pas être déverrouillée tant que {$a->itemname} est verrouillé.';
$string['nonweightedpct'] = '% non pondéré';
$string['nooutcome'] = 'Aucun objectif';
$string['nooutcomes'] = 'Les éléments d\'objectif doivent être liés à un objectif de cours. Il n\'y a cependant aucun objectif défini dans ce cours. Voulez-vous en définir un ?';
$string['nopublish'] = 'Ne pas publier';
$string['norolesdefined'] = 'Aucun rôle défini dans Administration > Notes > Réglages généraux > Rôles évalués';
$string['noscales'] = 'Les éléments d\'objectif doivent être liés à un barème de cours ou un barême global. Il n\'y a cependant aucun barème. Voulez-vous en définir un ?';
$string['noselectedcategories'] = 'Aucune catégorie sélectionnée.';
$string['noselecteditems'] = 'Aucun élément sélectionné.';
$string['notteachererror'] = 'Vous devez être enseignant pour utiliser cette fonctionnalité.';
$string['nousersloaded'] = 'Aucun utilisateur chargé';
$string['numberofgrades'] = 'Nombre de notes';
$string['onascaleof'] = 'sur un barème de {$a->grademin} à {$a->grademax}';
$string['operations'] = 'Opérations';
$string['options'] = 'Options';
$string['others'] = 'Autres';
$string['outcome'] = 'Objectif';
$string['outcomeassigntocourse'] = 'Attribuer un autre objectif à ce cours';
$string['outcomecategory'] = 'Créer des objectifs dans la catégorie';
$string['outcomecategorynew'] = 'Nouvelle catégorie';
$string['outcomeconfirmdelete'] = 'Voulez-vous vraiment supprimer l\'objectif « {$a} »?';
$string['outcomecreate'] = 'Ajouter un objectif';
$string['outcomedelete'] = 'Supprimer objectif';
$string['outcomefullname'] = 'Nom complet';
$string['outcome_help'] = 'Spécifie l\'objectif représenté par cet élément d\'évaluation dans le carnet de notes. Seuls les objectifs associés à ce cours et les objectifs globaux du site sont disponibles';
$string['outcomeitem'] = 'Élément d\'objectif';
$string['outcomeitemsedit'] = 'Modifier élément d\'objectif';
$string['outcomereport'] = 'Rapport des objectifs';
$string['outcomes'] = 'Objectifs';
$string['outcomescourse'] = 'Objectifs utilisés dans le cours';
$string['outcomescoursecustom'] = 'Personnalisé utilisé (pas de suppression)';
$string['outcomescoursenotused'] = 'Standard non utilisé';
$string['outcomescourseused'] = 'Standard utilisé (pas de suppression)';
$string['outcomescustom'] = 'Objectifs personnalisés';
$string['outcomeshortname'] = 'Nom abrégé';
$string['outcomesstandard'] = 'Objectifs standards';
$string['outcomesstandardavailable'] = 'Objectifs standards disponibles';
$string['outcomestandard'] = 'Objectif standard';
$string['outcomestandard_help'] = 'Un objectif standard est disponible dans tout le site, pour tous les cours.';
$string['overallaverage'] = 'Moyenne globale';
$string['overridden'] = 'Court-circuité';
$string['overridden_help'] = '<!-- $Id -->


<p>Ce réglage permet d\'éviter toute tentative future d\'ajustement automatique de la valeur de la note. Ce réglage est souvent fixé de façon interne par le carnet de notes, mais peut être modifié manuellement ici.</p>';
$string['overriddennotice'] = 'Votre note finale pour cette activité a été ajustée manuellement.';
$string['overridesitedefaultgradedisplaytype'] = 'Court-circuiter les réglages du site';
$string['overridesitedefaultgradedisplaytype_help'] = '<!-- $Id$ -->


<p>En activant ce réglage, vous permettrez de passer outre les réglages du site pour l\'affichage des notes du carnet de notes. Cela activera les éléments permettant de définir les notes lettres et les valeurs limites au choix des enseignants.</p>';
$string['parentcategory'] = 'Catégorie mère';
$string['pctoftotalgrade'] = '% de la note maximale';
$string['percent'] = 'Pourcent';
$string['percentage'] = 'Pourcentage';
$string['percentageletter'] = 'Pourcentage (lettre)';
$string['percentagereal'] = 'Pourcentage (brut)';
$string['percentascending'] = 'Tri croissant par pourcent';
$string['percentdescending'] = 'Tri décroissant par pourcent';
$string['percentshort'] = '%';
$string['plusfactor'] = 'Décalage';
$string['plusfactor_help'] = '<!-- $Id$ -->


<p>Nombre qui sera ajouté à toutes les notes de cet élément d\'évaluation, après l\'application du multiplicateur.</p>';
$string['plusfactorvalue'] = 'Décalage pour {$a}';
$string['points'] = 'points';
$string['pointsascending'] = 'Tri croissant par points';
$string['pointsdescending'] = 'Tri décroissant par points';
$string['positionfirst'] = 'Première colonne';
$string['positionlast'] = 'Dernière colonne';
$string['preferences'] = 'Préférences';
$string['prefgeneral'] = 'Général';
$string['prefletters'] = 'Notes lettres et limites';
$string['prefrows'] = 'Rangées spéciales';
$string['prefshow'] = 'Cacher/afficher';
$string['previewrows'] = 'Prévisualiser les rangées';
$string['profilereport'] = 'Rapport du profil utilisateur';
$string['profilereport_help'] = 'Rapport d\'évaluation présenté dans les profils utilisateur.';
$string['publishing'] = 'Publication en cours';
$string['quickfeedback'] = 'Feedback rapide';
$string['quickgrading'] = 'Évaluation rapide';
$string['quickgrading_help'] = '<!-- $Id$ -->


<p>L\'évaluation rapide ajoute un champ de texte à chaque cellule de note du rapport de l\'évaluateur, vous permettant de modifier de nombreuses notes à la fois. Vous pouvez alors cliquer sur le bouton Modifier pour effectuer d\'un coup toutes les modifications, au lieu de les faire une à la fois.</p>';
$string['range'] = 'Valeurs possibles';
$string['rangedecimals'] = 'Décimales de l\'intervalle';
$string['rangedecimals_help'] = 'Nombre de décimales à afficher pour l\'intervalle';
$string['rangesdecimalpoints'] = 'Décimales des valeurs possibles';
$string['rangesdecimalpoints_help'] = '<!-- $Id$ -->


<p>Spécifie le nombre de décimales à afficher pour les valeurs possibles, au-dessus des colonnes de notes. Ce réglage peut être modifié pour chaque élément d\'évaluation.</p>';
$string['rangesdisplaytype'] = 'Type d\'affichage des valeurs possibles';
$string['rangesdisplaytype_help'] = '<!-- $Id$ -->


<p>Spécifie comment afficher les valeurs possibles. Si Hériter est sélectionné, le type d\'affichage de chaque colonne est utilisé.</p>';
$string['rank'] = 'Rang';
$string['rawpct'] = '% brut';
$string['real'] = 'Brut';
$string['realletter'] = 'Brut (lettre)';
$string['realpercentage'] = 'Brut (pourcentage)';
$string['recovergradesdefault'] = 'Récupérer par défaut les notes';
$string['recovergradesdefault_help'] = 'Par défaut, récupérer les anciennes notes lors de la ré-inscription d\'un participant à un cours.';
$string['regradeanyway'] = 'Réévaluer malgré tout';
$string['removeallcoursegrades'] = 'Supprimer toutes les notes';
$string['removeallcourseitems'] = 'Supprimer tous les éléments et catégories';
$string['report'] = 'Rapport';
$string['reportdefault'] = 'Réglage par défaut du rapport ({$a})';
$string['reportplugins'] = 'Modules de rapport';
$string['reportsettings'] = 'Réglages des rapports';
$string['reprintheaders'] = 'Réafficher les entêtes';
$string['respectingcurrentdata'] = 'en conservant la configuration actuelle';
$string['rowpreviewnum'] = 'Prévisualiser les rangées';
$string['savechanges'] = 'Enregistrer les changements';
$string['savepreferences'] = 'Enregistrer les préférences';
$string['scaleconfirmdelete'] = 'Voulez-vous vraiment supprimer le barème « {$a} » ?';
$string['scaledpct'] = '% pondéré';
$string['seeallcoursegrades'] = 'Voir toutes les notes du cours';
$string['select'] = 'Sélectionner {$a}';
$string['selectalloroneuser'] = 'Sélectionner tous ou un utilisateur';
$string['selectauser'] = 'Sélectionner un utilisateur';
$string['selectdestination'] = 'Choisir la destination de {$a}';
$string['separator'] = 'Séparateur';
$string['sepcolon'] = 'Deux-points';
$string['sepcomma'] = 'Virgule';
$string['sepsemicolon'] = 'Point-virgule';
$string['septab'] = 'Tabulateur';
$string['setcategories'] = 'Catégories';
$string['setcategorieserror'] = 'Les catégories doivent être mises en place dans votre cours avant de pouvoir leur attribuer des coefficients.';
$string['setgradeletters'] = 'Notes lettres';
$string['setpreferences'] = 'Préférences';
$string['setting'] = 'Réglage';
$string['settings'] = 'Réglages';
$string['setweights'] = 'Coefficients';
$string['showactivityicons'] = 'Afficher icônes d\'activité';
$string['showactivityicons_help'] = '<!-- $Id$ -->


<p>Spécifie si une icône d\'activité doit être affichée en regard de chaque activité.</p>';
$string['showallhidden'] = 'Afficher les éléments cachés';
$string['showallstudents'] = 'Afficher tous les étudiants';
$string['showanalysisicon'] = 'Afficher l\'icône d\'analyse de l\'évaluation';
$string['showanalysisicon_desc'] = 'Ce réglage détermine s\'il faut afficher par défaut l\'icône d\'analyse de l\'évaluation. Si l\'activité le permet, l\'icône d\'analyse de l\'évaluation lie vers une page avec des informations plus détaillées sur l\'évaluation et comment elle a été obtenue.';
$string['showanalysisicon_help'] = 'Si l\'activité le permet, l\'icône d\'analyse de l\'évaluation lie vers une page avec des informations plus détaillées sur l\'évaluation et comment elle a été obtenue.';
$string['showaverage'] = 'Afficher la moyenne';
$string['showaverage_help'] = 'Si ce réglage est activé, la colonne avec la moyenne sera affichée. Les étudiants pourraient alors être en mesure d\'estimer les notes d\'autres étudiants, si la moyenne est calculée à partir de peu de notes. Pour des raisons de performance, la moyenne est une estimation lorsqu\'elle dépend d\'éléments cachés.';
$string['showaverages'] = 'Afficher les moyennes';
$string['showaverages_help'] = 'Si ce réglage est activé, le rapport de l\'évaluateur contiendra une rangée supplémentaire affichant la moyenne de chaque catégorie et chaque élément d\'évaluation.';
$string['showcalculations'] = 'Afficher les calculs';
$string['showcalculations_help'] = 'Afficher une icône de calculatrice pour chaque élément d\'évaluation et chaque catégorie, les bulles d\'aide sur les éléments calculés et un indicateur visuel montrant qu\'une colonne est calculée.';
$string['showeyecons'] = 'Afficher icônes afficher/cacher';
$string['showeyecons_help'] = 'Afficher une icône afficher/cacher pour chaque note (cette icône permet de masquer ou d\'afficher la note pour les participants) ?';
$string['showfeedback'] = 'Afficher les feedbacks';
$string['showfeedback_help'] = 'Si ce réglage est activé, la colonne avec le feedback sera affichée.';
$string['showgrade'] = 'Afficher les notes';
$string['showgrade_help'] = 'Si ce réglage est activé, la colonne avec la note sera affichée.';
$string['showgroups'] = 'Afficher les groupes';
$string['showhiddenitems'] = 'Afficher les éléments cachés';
$string['showhiddenitems_help'] = 'Spécifie si les éléments d\'évaluations cachés sont totalement invisibles ou si les noms des éléments d\'évaluations cachés sont visibles pour les étudiants.

* Afficher les éléments cachés : les noms des éléments d\'évaluations cachés sont affichés, mais les notes sont cachées
* Cacher les éléments jusqu\'au : les éléments d\'évaluation et les notes sont totalement invisibles, jusqu\'à l\'échéance de la date fixée, s\'il y en a une. Une fois le date passée, l\'élément et les notes sont affichées
* Cacher les éléments : les éléments d\'évaluation et les notes sont totalement invisibles';
$string['showhiddenuntilonly'] = 'Cacher les éléments jusqu\'au';
$string['showlettergrade'] = 'Afficher les notes lettres';
$string['showlettergrade_help'] = 'Si ce réglage est activé, la colonne avec la note lettre sera affichée.';
$string['showlocks'] = 'Afficher les cadenas';
$string['showlocks_help'] = 'Afficher une icône de verrouillage/déverrouillage pour chaque note ?';
$string['shownohidden'] = 'Cacher les éléments';
$string['shownooutcomes'] = 'Cacher les objectifs';
$string['shownumberofgrades'] = 'Afficher le nombre des notes dans les moyennes';
$string['shownumberofgrades_help'] = 'Spécifie si le nombre des notes utilisées pour calculer la moyenne doit être affiché entre parenthèses, à côté de chaque moyenne. Exemple : 45 (34).';
$string['showonlyactiveenrol'] = 'N\'afficher que les inscriptions actives';
$string['showonlyactiveenrol_help'] = 'Ce réglage détermine si les seuls utilisateurs visibles dans le carnet de notes sont ceux dont l\'inscription est active. Si le réglage est actif, les utilisateurs suspendus ne seront pas affichés dans le carnet de notes.';
$string['showpercentage'] = 'Afficher les pour-cents';
$string['showpercentage_help'] = 'Afficher la valeur en pour-cents de chaque élément d\'évaluation ?';
$string['showquickfeedback'] = 'Afficher le feedback rapide';
$string['showquickfeedback_help'] = 'Le feedback rapide ajoute un champ de texte à chaque cellule de note du rapport de l\'évaluateur, vous permettant de modifier de nombreux feedbacks à la fois. Vous pouvez alors cliquer sur le bouton Modifier pour effectuer d\'un coup toutes les modifications, au lieu de les faire une à la fois.';
$string['showrange'] = 'Afficher les intervalles';
$string['showrange_help'] = 'Si ce réglage est activé, la colonne avec l\'intervalle sera affichée.';
$string['showranges'] = 'Afficher les valeurs possibles';
$string['showranges_help'] = 'Si ce réglage est activé, le rapport de l\'évaluateur contiendra une rangée supplémentaire affichant pour chaque catégorie et chaque élément d\'évaluation les valeurs possibles des notes.';
$string['showrank'] = 'Afficher le rang';
$string['showrank_help'] = 'Afficher pour chaque élément le rang du participant, par rapport aux autres participants ?';
$string['showuserimage'] = 'Afficher les avatars';
$string['showuserimage_help'] = 'Afficher l\'image de l\'utilisateur à côté de son nom dans le rapport de l\'évaluateur.';
$string['showverbose'] = 'Afficher {$a->category} {$a->itemmodule} {$a->itemname}';
$string['showweight'] = 'Afficher les coefficients';
$string['showweight_help'] = 'Si ce réglage est activé, la colonne avec le coefficient sera affichée.';
$string['simpleview'] = 'Affichage simple';
$string['sitewide'] = 'Pour tout le site';
$string['sort'] = 'Trier';
$string['sortasc'] = 'Trier par ordre croissant';
$string['sortbyfirstname'] = 'Trier par prénom';
$string['sortbylastname'] = 'Trier par nom';
$string['sortdesc'] = 'Trier par ordre décroissant';
$string['standarddeviation'] = 'Écart type';
$string['stats'] = 'Statistiques';
$string['statslink'] = 'Stats';
$string['student'] = 'Participants';
$string['studentsperpage'] = 'Participants par page';
$string['studentsperpage_help'] = 'Le nombre de participants à afficher par page dans le rapport de l\'évaluateur.';
$string['studentsperpagereduced'] = 'Le nombre maximum de participants par page a été réduit de {$a->originalstudentsperpage} à {$a->studentsperpage}. Vous devriez peut-être augmenter le réglage PHP max_input_vars, actuellement de {$a->maxinputvars}.';
$string['subcategory'] = 'Catégorie normale';
$string['submissions'] = 'Remises';
$string['submittedon'] = 'Remis le {$a}';
$string['switchtofullview'] = 'Passer à l\'affichage complet';
$string['switchtosimpleview'] = 'Passer à l\'affichage simple';
$string['tabs'] = 'Onglets';
$string['topcategory'] = 'Super-catégorie';
$string['total'] = 'Total';
$string['totalweight100'] = 'Le total des coefficients vaut 100';
$string['totalweightnot100'] = 'Le total des coefficients n\'est pas égal à 100';
$string['turnfeedbackoff'] = 'Désactiver le feedback';
$string['turnfeedbackon'] = 'Activer le feedback';
$string['typenone'] = 'Aucun';
$string['typescale'] = 'Barème';
$string['typescale_help'] = '<!-- $Id$ -->


<p>Lorsque le type de note utilisé est barème, un barème peut être choisi. Le barème d\'un élément d\'évaluation basé sur une activité est géré sur la page de modification de l\'activité.</p>';
$string['typetext'] = 'Texte';
$string['typevalue'] = 'Valeur';
$string['uncategorised'] = 'Sans catégorie';
$string['unchangedgrade'] = 'Non inchangée';
$string['unenrolledusersinimport'] = 'Ce fichier d\'importation contenait les notes suivantes d\'utilisateurs n\'étant actuellement pas inscrits dans ce cours : {$a}';
$string['unlimitedgrades'] = 'Notes illimitées';
$string['unlimitedgrades_help'] = 'Par défaut, les notes sont limitées par les valeurs maximales et minimales de l\'élément d\'évaluation. L\'activation de ce réglage retire cette limite et permet de saisir directement des notes dépassant 100%. Il est recommandé de ne modifier ce réglage que durant des heures creuses, car toutes les notes seront recalculées, ce qui pourrait occasionner une charge élevée sur le serveur.';
$string['unlock'] = 'Déverrouiller';
$string['unlockverbose'] = 'Déverrouiller {$a->category} {$a->itemmodule} {$a->itemname}';
$string['unused'] = 'Pas utilisée';
$string['updatedgradesonly'] = 'N\'exporter que les notes nouvelles ou modifiées';
$string['uploadgrades'] = 'Déposer des notes';
$string['useadvanced'] = 'Fonctions avancées';
$string['usedcourses'] = 'Cours utilisés';
$string['usedgradeitem'] = 'Élément d\'évaluation utilisé';
$string['usenooutcome'] = 'Ne pas utiliser d\'objectif';
$string['usenoscale'] = 'Ne pas utiliser de barème';
$string['usepercent'] = 'Utiliser les pourcentages';
$string['user'] = 'Utilisateur';
$string['userenrolmentsuspended'] = 'Inscription d\'utilisateurs suspendue';
$string['usergrade'] = 'Utilisateur {$a->fullname} ({$a->useridnumber}) dans l\'élément {$a->gradeidnumber}';
$string['userid'] = 'ID utilisateur';
$string['usermappingerror'] = 'Erreur de correspondance utilisateur : impossible de trouver un utilisateur avec une valeur « {$a->value} » pour le champ {$a->field}.';
$string['usermappingerrorcurrentgroup'] = 'L\'utilisateur n\'appartient pas au groupe actuel.';
$string['usermappingerrorusernotfound'] = 'Erreur de correspondance utilisateur : impossible de trouver l\'utilisateur.';
$string['userpreferences'] = 'Préférences utilisateur';
$string['useweighted'] = 'Utiliser les pondérations';
$string['verbosescales'] = 'Barèmes de mots';
$string['viewbygroup'] = 'Groupe';
$string['viewgrades'] = 'Affichage des notes';
$string['warningexcludedsum'] = 'Attention ! l\'exclusion de notes n\'est pas compatible avec le type de tendance centrale somme.';
$string['weight'] = 'coefficient';
$string['weightcourse'] = 'Utiliser les coefficients pour le cours';
$string['weightedascending'] = 'Tri croissant par pourcent pondéré';
$string['weighteddescending'] = 'Tri décroissant par pourcent pondéré';
$string['weightedpct'] = '% pondéré';
$string['weightedpctcontribution'] = 'contribution en % pondérée';
$string['weightorextracredit'] = 'Pondération ou bonus';
$string['weights'] = 'Coefficients';
$string['weightsedit'] = 'Modifier les pondérations et les bonus';
$string['weightuc'] = 'Coefficient';
$string['writinggradebookinfo'] = 'Écriture des réglages du carnet de notes';
$string['xml'] = 'XML';
$string['yes'] = 'Oui';
$string['yourgrade'] = 'Votre note';
