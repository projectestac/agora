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
 * Strings for component 'block_progress', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   block_progress
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activity_completion'] = 'réalisation des activités';
$string['addallcurrentitems'] = 'Ajouter toutes les activités/ressources';
$string['answered'] = 'répondu';
$string['assessed'] = 'évalué';
$string['assign'] = 'Devoir';
$string['assignment'] = 'Devoir';
$string['attempted'] = 'tenté';
$string['attempted_colour'] = '#33CC00';
$string['awarded'] = 'attribué';
$string['bigbluebuttonbn'] = 'Big Blue Button';
$string['book'] = 'Livre';
$string['certificate'] = 'Certificat';
$string['chat'] = 'Chat';
$string['choice'] = 'Choix';
$string['completed'] = 'terminé';
$string['config_default_title'] = 'Barre de progression';
$string['config_header_action'] = 'Action';
$string['config_header_expected'] = 'Attendu le';
$string['config_header_icon'] = 'Icône';
$string['config_header_locked'] = 'Fermé pour l\'échéance';
$string['config_header_monitored'] = 'Surveillé';
$string['config_icons'] = 'Utiliser les icônes de la barre';
$string['config_now'] = 'Utiliser';
$string['config_orderby'] = 'Trier les éléments de la barre par';
$string['config_orderby_course_order'] = 'Ordre dans le cours';
$string['config_orderby_due_time'] = 'Date et heure de rendu';
$string['config_percentage'] = 'Montrer pourcentage pour les étudiants';
$string['config_title'] = 'Autre titre';
$string['data'] = 'Base de données';
$string['date_format'] = '%a %d %b, %H:%M';
$string['feedback'] = 'Feedback';
$string['finished'] = 'finis';
$string['flashcardtrainer'] = 'Formateur Flashcard';
$string['folder'] = 'Dossier';
$string['forum'] = 'Forum';
$string['futureNotAttempted_colour'] = '#3366FF';
$string['glossary'] = 'Glossaire';
$string['graded'] = 'noté';
$string['hotpot'] = 'Hot Potatoes';
$string['how_ordering_works'] = 'Comment fonctionne le tri';
$string['how_ordering_works_help'] = '<p>Il y a deux façon d\'ordonner les éléments de la barre de progression. Ils peuvent être ordonnés selon : </p>
<ul>
<li><em>L\'heure et la date de rendu</em> (default)<br />
Les dates de rendu ou les dates entrées manuellement dans les activités ou les ressources servent à trier les éléments affichés dans la barre de progression.
</li>
<li><em>Ordre dans le cours</em><br />
Les activités et ressources sont présentées dans le même ordre que sur la page du cours. Quand cette option est utilisée, les paramètres de temps ne sont pas pris en compte.
</li>
</ul>';
$string['imscp'] = 'Paquets de contenus IMS';
$string['journal'] = 'Journal';
$string['lastonline'] = 'Dernière connexion';
$string['lesson'] = 'Leçon';
$string['marked'] = 'évalué';
$string['mouse_over_prompt'] = 'Placez la souris sur le bloc pour plus d\'info.';
$string['no_events_config_message'] = 'Il n\'y a aucune activité ou ressource à surveiller. Créez des activités et/ou des ressources et configurer ensuite ce bloc.';
$string['no_events_message'] = 'Aucun événement à suivre. Ajoutez un événement à l\'aide du bouton Configuration.';
$string['notAttempted_colour'] = '#FF3300';
$string['no_visible_events_message'] = 'Aucun événement sélectionné n\'est visible en ce moment.';
$string['now_indicator'] = 'NOW';
$string['overview'] = 'Aperçu des étudiants';
$string['page'] = 'Page';
$string['passed'] = 'réussi';
$string['passedscorm'] = 'réussi';
$string['pluginname'] = 'Barre de progression';
$string['posted_to'] = 'posté';
$string['progress'] = 'Progression';
$string['progress:addinstance'] = 'Ajouter un nouveau bloc "Barre de progression"';
$string['progressbar'] = 'Barre de progression';
$string['progress:overview'] = 'View course overview of Progress bars for all students';
$string['questionnaire'] = 'Questionnaire';
$string['quiz'] = 'Questionnaire';
$string['recordingsbn'] = 'Enregistrements BigBlueButton';
$string['resource'] = 'Fichier';
$string['responded_to'] = 'répondu';
$string['scorm'] = 'SCORM';
$string['selectitemstobeadded'] = 'Choisissez des activités/ressources';
$string['submitted'] = 'soumis';
$string['time_expected'] = 'Attendu le';
$string['turnitintool'] = 'Outil Turnitin';
$string['url'] = 'URL';
$string['viewed'] = 'visualisé';
$string['what_actions_can_be_monitored'] = 'Quelles actions peuvent être surveillées?';
$string['what_actions_can_be_monitored_help'] = '<p>Différentes activités et ressources peuvent être surveillées.</p>
<p>Du fait que les activités et les ressources fonctionnent différement, ce qui est surveillé varie pour chaque module. Par exemple, pour les devoirs, une soumission est surveillée; pour les questionnaires, des réponses sont attendues; pour les forums, ce sont les posts qui sont surveillés; pour les activités avec des choix, les réponses ou la visulalisation des ressources sont surveillées.</p>
<p>Certaines activités peuvent avoir plus d\'une activité associée. Dans ce cas, vous pouvez choisir l\'activité appropriée pour chaque instance de l\'activité.</p>
<p>Pour les modules Devoir et de Questionnaire, la notion de passé repose sur un "Grade de passer" d\'être défini pour l\'élément de qualité dans le bulletin de notes. <a href="http://docs.moodle.org/en/Grade_items#Activity-based_grade_items" target="_blank">Plus d\'aide...</a></p>';
$string['what_does_monitored_mean'] = 'Que signifie "surveillé"?';
$string['what_does_monitored_mean_help'] = '<p>La raison dêtre de ce bloc est d\'encourager les étudiants à gérer de manière effective leur temps de travail. Chaque étudiant peut contrôler son avancement pour chaque activité et ressource que vous avez créées.</p>
<p>Sur la page de configuration, vous pourrez voir la liste de tous les modules que vous avez créés et pouvant être surveillés par le bloc "Barre de progression". Si vous sélectionnez "Oui" afin de surveiller un module, ce dernier apparaîtra sous la forme d\'un petit carré sur la barre de progression.</p>';
$string['what_expected_by_means'] = 'Que signifie "attendu"?';
$string['what_expected_by_means_help'] = '<p>Le paramètre <em>Attendu le</em> définit la date et l\'heure auxquelles l\'activité en question doit être terminée (visualisé, soumis, posté, etc...).</p>
<p>S\'il y a déjà une échéance associée à une activité, comme l\'échéance d\'un devoir, cette échéance peut être utilisée aussi longtemps que "Fermé pour l\'échéance" est sélectionné. En déselectionnant ce dernier, une échéance indépendante de celle définie dans le formulaire de l\'activité est créée et sa modification n\'altera pas l\'échéance définie dans l\'activité.</p>
<p>Lorsque vous visitez pour la première fois le formulaire de configuration du bloc "Barre de progression", ou si vous créez une nouvelle activité/ressource et que vous retrournez dans le formulaire de configuration, l\'échance du bloc sera définie automatiquement de la manière suivante :
<ul>
    <li>Pour une actitivé avec une échance déjà définie, l\'échéance de l\'activité sera utilisée.</li>
    <li>Lorsqu\'aucune échéance n\'est définie dans l\'activité, mais que le cours utilise le format hebdomadaire, l\'échéance du bloc tombera à la fin de la semaine (dimanche juste avant minuit).</li>
    <li>Pour une activité/ressource n\'utilisant pas le format hebdomadaire, la fin de la semaine en cours (dimanche suivant juste avant minuit) sera utilisée comme échéance du bloc.</li>
</ul>
</p>
<p>Lorsqu\'une échéance est définie dans le formulaire du bloc, elle est indépendante des échéances ou des informations de l\'activité ou de la ressource.</p>';
$string['what_locked_means'] = 'Que signifie "bloqué pour l\'échéance"?';
$string['what_locked_means_help'] = '<p>Lorsqu\'une activité peut avoir une échéance et que léchéance est définie, vous avez le choix d\'utiliser l\'échéance définie dans le formulaire de l\'activité ou de définir une échéance différente à l\'aide du formulaire du bloc "Barre de progression".</p>
<p>Pour bloquer la barre de progression sur l\'échéance d\'une activité, l\'échéance doit être préalablement activée et définie. Si l\'échéance est verouillée, le changement de l\'échéance dans le formulaire de l\'activité se répercutera automatiquement sur l\'échéance associée à l\'activité dans la bloc "Barre de progression".</p>
<p>Lorsqu\'une activité n\'est pas vérouillée, le changement de la date et de l\'heure dans le bloc "Barre de progression" n\'affectera pas léchéance définie dans le formulaire de l\'activité.</p>';
$string['why_display_now'] = 'Pourquoi voudriez-vous montrer/cacher l\'indicateur "MAINTENANT"?';
$string['why_display_now_help'] = '<p>Certains cours ne se focalisent pas sur la complétion de tâches pour une date précise. Certains cours sont ouverts à lauto-inscription, permettant ainsi aux étudiants de travailler à leur rythme.</p>
<p>Pour utiliser le bloc "Barre de progression" dans ce but, définissez une date dans un futur lointain et n\'utilisez pas l\'icône "MAINTENANT".</p>';
$string['why_set_the_title'] = 'Pourquoi voudriez-vous modifier le titre du bloc?';
$string['why_set_the_title_help'] = '<p>Il peut y avoir plusieurs instances du bloc "Barre de progression". Vous pouvez utiliser plusieurs blocs "Barre de progression" afin de suivre différents types d\'activités ou ressources. Par exemple, vous pouvez suivre la progression pour les devoirs dans un bloc et les questionnaires dans un autre. Pour cette raison vous pouvez modifier le titre par defaut et définir un titre plus approprié pour chaque instance.</p>';
$string['why_show_precentage'] = 'Pourquoi montrer un pourcentage de progression pour les étudiants?';
$string['why_show_precentage_help'] = '<p>Il est possible de montrer un pourcentage global de progrès pour les étudiants.</p>
<p>Elle est calculée comme le nombre d\'articles compléter divisé par le nombre total d\'éléments dans la barre.</p>
<p>Le pourcentage de progression s\'affiche jusqu\'à ce que l\'étudiant souris sur un élément dans la barre.</p>';
$string['why_use_icons'] = 'Pourquoi voudriez-vous utiliser des icônes?';
$string['why_use_icons_help'] = '<p>Vous pouvez ajouter les icônes "vu" et "croix" sur la barre de progression afin d\'améliorer la lisibilité pour les daltoniens.</p>
<p>Cela clarifie la signification du bloc si vous pensez que la signification des couleurs n\'est pas intuitive, voire pour des raisons cultuelles ou personnelles.</p>';
$string['wiki'] = 'Wiki';
$string['workshop'] = 'Atelier';
