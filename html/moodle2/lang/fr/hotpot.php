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
 * Strings for component 'hotpot', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   hotpot
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abandoned'] = 'Abandonné';
$string['activitygrade'] = 'Note de l\'activité';
$string['added'] = 'Ajouté';
$string['addquizchain'] = 'Ajouter un enchaînement d\'activités';
$string['addquizchain_help'] = 'Est-ce que tous les tests de la suite de tests doivent être ajoutés ?

**Non**
: Seul un test sera ajouté au cours.

**Oui**
: Si le fichier source est un **fichier de test**, il sera considéré comme le départ de la suite de test et tous les autres tests seront ajoutés au cours avec les mêmes paramètres. Chaque test de la suite doit avoir un lien vers le test suivant.

Si le fichier source est un **dossier**, tous les tests reconnus dans le dossier seront ajoutés au cours pour former une suite et avec les mêmes paramètres.

Enfin, si le fichier source est un **fichier unitaire**, comme un fichier masher de Hot Potatoes ou un fichier index.html, tous les tests listés dans ce fichier seront ajoutés au cours pour former une suite et avec les mêmes paramètres.';
$string['allowreview'] = 'Permettre la relecture';
$string['allowreview_help'] = 'Si activé, les étudiants pourront relire leurs tentatives après la fermeture du test.';
$string['analysisreport'] = 'Analyse de l\'élément';
$string['attemptlimit'] = 'Limite de tentatives';
$string['attemptlimit_help'] = 'Nombre maximum de tentatives auquel à droit un étudiant dans cette activité HotPotatoes';
$string['attemptnumber'] = 'Tentative numéro';
$string['attempts'] = 'Tentatives';
$string['attemptscore'] = 'Score de la tentative';
$string['attemptsunlimited'] = 'Tentatives illimités';
$string['average'] = 'Moyenne';
$string['averagescore'] = 'Score moyen';
$string['cacherecords'] = 'Enregistrements en cache de HotPotatoes';
$string['canrestartquiz'] = 'Vos résultats seront enregistrés et vous pourrez recommencer « {$a} » plus tard';
$string['canrestartunit'] = 'Vos résultats seront enregistrés, mais si vous voulez recommencer cette activité plus tard, vous devrez recommencer depuis le début.';
$string['canresumequiz'] = 'Vos résultats seront enregistrés et vous pourrez continuer « {$a} » plus tard';
$string['checks'] = 'Vérifications';
$string['checksomeboxes'] = 'Veuillez vérifier les champs';
$string['clearcache'] = 'Nettoyer le cache HotPotatoes';
$string['cleardetails'] = 'Nettoyer les détails HotPotatoes';
$string['clearedcache'] = 'Le cache HotPotatoes a été nettoyé';
$string['cleareddetails'] = 'Les détails HotPotatoes ont été nettoyés';
$string['clickreporting'] = 'Activer les rapports de clic';
$string['clickreporting_help'] = 'Si cette option est activée, un enregistrement séparé est conservé à chaque clic sur un des boutons « aide », « indice » ou « vérifier ». Cela permet à l\'enseignant d\'avoir accès à un rapport très détaillé, affichant l\'état du test à chaque clic. Sinon, un seul enregistrement par tentative sera conservé.';
$string['clicktrailreport'] = 'Cheminement des clics';
$string['closed'] = 'Cette activité est fermée';
$string['clues'] = 'Indices';
$string['completed'] = 'Terminé';
$string['configenablecache'] = 'Le cache HotPotatoes peut considérablement accélérer l\'affichage des tests aux participants.';
$string['configenablecron'] = 'Indiquez les heures dans votre fuseau horaire dans lesquelles le cron HotPotatoes peut fonctionner';
$string['configenablemymoodle'] = 'Ce paramètre détermine si les activités HotPotatoes sont affichées sur la page Mon Moodle';
$string['configenableobfuscate'] = 'Dissimuler le code javascript pour insérer les lecteurs multimédia rend plus difficile de déterminer le nom du fichier média et de deviner ce que le fichier contient.';
$string['configenableswf'] = 'Autoriser l\'intégration de fichiers SWF dans les activités HotPotatoes. Si l\'option est activée, elle passe avant le réglage « mediaplugin_enable_swf ».';
$string['configfile'] = 'Fichier de configuration';
$string['configframeheight'] = 'Quand un test est affiché dans un cadre, cette valeur correspond à la hauteur (en pixels) du cadre supérieur contenant la barre de navigation de Moodle.';
$string['configlocation'] = 'Emplacement du fichier de configuration';
$string['configlockframe'] = 'Si ce paramètre est activé, le cadre de navigation, s\'il est utilisé, sera fixé et ne se déroulera pas, ne se redimensionnera pas et n\'aura pas de bordure';
$string['configmaxeventlength'] = 'Si une activité HotPotatoes a une date d\'ouverture et de fermeture définies, et que la différence est plus importante que le nombre de jours spécifiés ici, alors deux événements différents seront indiqués dans le calendrier du cours. Pour des durées plus courtes, ou alors si seulement l\'un des paramètres est renseigné, seul un événement sera ajouté au calendrier du cours. S\'il n\'y a pas d\'indication de temps ni d\'indication de date, aucun événement ne sera ajouté.';
$string['configstoredetails'] = 'Si ce paramètre est activé, alors les détails bruts en XML des tentatives du test HotPotatoes seront enregistrés dans la table hotpot_details. Cela permettra de renoter le test ultérieurement pour l\'aligner avec une éventuelle modification du système de notation des tests HotPotatoes. Attention ! L\'activation de cette option sur un site très utilisé fera croître la base hotpot_detail de manière très importante.';
$string['confirmdeleteattempts'] = 'Voulez-vous vraiment supprimer ces tentatives ?';
$string['confirmstop'] = 'Voulez-vous vraiment quitter cette page ?';
$string['correct'] = 'Correct';
$string['couldnotinsertsubmissionform'] = 'Impossible d\'insérer le formulaire d\'envoi';
$string['delay1'] = 'Délai 1';
$string['delay1_help'] = 'Le délai minimm entre la première et la seconde tentative.';
$string['delay1summary'] = 'Délai entre la première et la seconde tentative.';
$string['delay2'] = 'Délai 2';
$string['delay2_help'] = 'Le délai minimum entre les tentatives après la seconde tentative.';
$string['delay2summary'] = 'Délai entre les tentatives après la seconde tentative.';
$string['delay3'] = 'Délai 3';
$string['delay3afterok'] = 'Attendre que les participants cliquent sur OK';
$string['delay3disable'] = 'Ne pas continuer automatiquement';
$string['delay3_help'] = 'Ce paramètre définit le délai entre la fin du test et le retour à Moodle.

** Utiliser un temps défini (en secondes) **
: Le retour à Moodle aura lieu après le temps spécifié en secondes.

** Utiliser les paramètres du fichier source/modèle **
: Le retour à Moodle aura lieu après le temps spécifié en secondes au sein du fichier source.

** Attendre que l\'étudiant clique sur OK **
: Le retour à Moodle aura lieu après que participant a cliqué sur le bouton OK du message de fin du test.

** Ne pas continuer automatiquement **
: Le retour à Moodle ne sera pas automatique. Le participant pourra aller où bon lui semble.

Dans tous les cas, le résultat du test est envoyé immédiatement après la fin du test ou à l\'abandon du test, indépendamment de ce paramètre.';
$string['delay3specific'] = 'Utiliser une durée spécifique (en secondes)';
$string['delay3summary'] = 'Délai à la fin du test';
$string['delay3template'] = 'Utiliser les réglages du fichier source/modèle';
$string['deleteattempts'] = 'Suppression des tentatives';
$string['detailsrecords'] = 'Enregistrements des détails de HotPotatoes';
$string['d_index'] = 'Index de discrimination';
$string['duration'] = 'Durée';
$string['enablecache'] = 'Activer le cache HotPotatoes';
$string['enablecron'] = 'Activer le cron HotPotatoes';
$string['enablemymoodle'] = 'Afficher HopPotatoes dans Mon Moodle';
$string['enableobfuscate'] = 'Activer la dissimulation du code du lecteur multimédia';
$string['enableswf'] = 'Autoriser l\'intégration de fichiers SWF dans les activités HotPotatoes';
$string['entry_attempts'] = 'Tentatives';
$string['entrycm'] = 'Activité précédente';
$string['entrycmcourse'] = 'Activité précédente dans ce cours';
$string['entrycm_help'] = 'Ce paramètre définit une activité Moodle et une note minimale à atteindre pour une activité nécessaire avant la tentative de ce test.

L\'enseignant peut spécifier une activité bien précise ou l\'un de ces choix :

* activité précédente de ce cours
* activité précédente de cette section de cours
* activité HotPotatoes précédente de ce cours
* activité HotPotatoes précédente de cette section de cours';
$string['entrycmsection'] = 'Activité précédente dans cette section de cours';
$string['entrycompletionwarning'] = 'Avant de commencer cette activité, vous devez consulter {$a}';
$string['entry_dates'] = 'Dates';
$string['entrygrade'] = 'Note de l\'activité récédente';
$string['entrygradewarning'] = 'Vous ne pouvez pas commencer cette activité tant que votre score ne dépasse pas {$a->entrygrade}% sur {$a->entryactivity}. Pour l\'instant, votre note pour cette activité est {$a->usergrade} % ';
$string['entry_grading'] = 'Évaluation';
$string['entryhotpotcourse'] = 'Activité HotPotatoes précédente dans ce cours';
$string['entryhotpotsection'] = 'Activité HotPotatoes précédente dans cette section de cours';
$string['entryoptions'] = 'Options de la page initiale';
$string['entryoptions_help'] = 'Ces cases à cocher activent ou désactivent l\'affichage d\'éléments sur la page initiale de l\'activité HotPotatoes.

** Nom de l\'unité en tant que titre **
: Si coché, le nom de l\'unité sera utilisé comme titre de la page initiale.

** Notation **
: Si coché, les informations d\'évaluation de l\'activité  HotPotatoes seront affichées sur la page initiale.

** Dates **
: Si coché, les dates d\'ouverture et de fermeture de l\'activité HotPotatoes seront affichées sur la page initiale.

** Tentatives **
: Si coché, un tableau détaillant les tentatives précédentes du participants sera affiché sur la page initiale. Les tentatives qui peuvent être continuées auront un bouton correspondant affiché dans la colonne de droite.';
$string['entrypage'] = 'Afficher la page initiale';
$string['entrypagehdr'] = 'Page initiale';
$string['entrypage_help'] = 'Est-ce que les participants doivent voir la page initiale avant de commencer l\'activité HotPotatoes ?

** Oui **
: La page initiale sera affichée aux participants avant de commencer le test. Le contenu de cette page est déterminé dans les options de la page initiale HotPotatoes.

**Non**
: La page initiale ne s\'affichera pas et les participants commenceront le test immédiatement.';
$string['entrytext'] = 'Texte de la page initiale';
$string['entry_title'] = 'Nom de l\'unité en tant que titre';
$string['exit_areyouok'] = 'Coucou, vous êtes encore là ?';
$string['exit_attemptscore'] = 'Votre score pour cette tentative est {$a}';
$string['exitcm'] = 'Activité suivante';
$string['exitcmcourse'] = 'Activité suivante de ce cours';
$string['exitcm_help'] = 'Ce paramètre définit une activité Moodle qui doit être effectuée après que le test est terminé.

L\'enseignant peut spécifier une activité bien précise ou l\'un de ces choix :

* activité suivante de ce cours
* activité suivante de cette section de cours
* activité HotPotatoes suivante de ce cours
* activité HotPotatoes suivante de cette section de cours

Si d\'autres options de page de sortie sont désactivées, le participant ira à la prochaine activité. Sinon, il verra un lien pour l\'emmener vers la prochaine activité.';
$string['exitcmsection'] = 'Activité suivante de cette section de cours';
$string['exit_course'] = 'Cours';
$string['exit_course_text'] = 'Retour à la page principale du cours';
$string['exit_encouragement'] = 'Encouragement';
$string['exit_excellent'] = 'Excellent !';
$string['exit_feedback'] = 'Quitter la page de feedback';
$string['exit_feedback_help'] = 'Cette option active ou désactive l\'affichage de feedbacks sur la page de sortie.

** Nom de l\'unité en tant que titre **
: Si activé, le nom de l\'unité est affiché en tant que titre de la page de sortie.

**Encouragements**
: Si activé, des encouragements seront affichés dans la page de sortie. Les encouragements dépendent de la note HotPotatoes :
: **> 90%** : Excellent !
: **> 60%** : Bien joué
: **> 0%** : Bien essayé
: **= 0%** : Est-ce que tout va bien ?

** Note de la tentative**
: Si activé, la note de la tentative qui vient de se terminer sera affichée sur la page.

**Note de l\'unité**
: Si activé, la note HotPotatoes sera affichée sur la page.

De plus, si la note de la tentative est plus grande que lors des tentatives précédentes, un message s\'affichera pour le signaler.';
$string['exit_goodtry'] = 'Bien essayé !';
$string['exit_grades'] = 'Notes';
$string['exit_grades_text'] = 'Voir vos notes actuelles pour ce cours';
$string['exithotpotcourse'] = 'Activité HotPotatoes suivante de ce cours';
$string['exit_hotpotgrade'] = 'Votre note pour cette activité est {$a}';
$string['exit_hotpotgrade_average'] = 'Votre moyenne jusqu\'à maintenant pour cette activité est {$a}';
$string['exit_hotpotgrade_highest'] = 'Votre plus haute note jusqu\'à maintenant pour cette activité est {$a}';
$string['exit_hotpotgrade_highest_equal'] = 'Vous avez égalisé votre meilleur résultat pour cette activité !';
$string['exit_hotpotgrade_highest_previous'] = 'Votre plus haute note précédente pour cette activité était {$a}';
$string['exit_hotpotgrade_highest_zero'] = 'Vous n\'avez pas dépassé {$a} pour cette activité';
$string['exithotpotsection'] = 'Activité HopPotatoes suivante dans cette section de cours';
$string['exit_index'] = 'Index';
$string['exit_index_text'] = 'Aller à l\'index des activités';
$string['exit_links'] = 'Quitter la page de lien';
$string['exit_links_help'] = 'Ces options activent ou désactivent l\'affichage de certains liens de navigation sur la page de sortie HotPotatoes.

**Ré-essayer**
: Si les tentatives multiples sont autorisées et que le participant a encore des tentatives non effectuées, le lien permettant de refaire le test sera activé.

**Accueil**
: Si activé, un lien vers la page d\'accueil sera affiché.

**Cours**
: Si activé, un lien pour retourner au cours Moodle sera activé.

**Notes**
: Si activé, un lien pour accéder au carnet de notes de Moodle sera affiché.';
$string['exit_next'] = 'Suivant';
$string['exit_next_text'] = 'Essayer l\'activité suivante';
$string['exit_noscore'] = 'Vous avez terminé cette activité avec succès !';
$string['exitoptions'] = 'Quitter la page d\'options';
$string['exitpage'] = 'Afficher la page de sortie';
$string['exitpagehdr'] = 'Page de sortie';
$string['exitpage_help'] = 'Détermine si une page de sortie doit être affichée après avoir effectué le test.

**Oui**
: Une page de sortie s\'affichera pour les participants quand le test sera terminé. Le contenu de la page de sortie est déterminé par les paramètres correspondant aux feedbacks et liens de la page de sortie HotPotatoes.

**Non**
: Le participant ne verra pas de page de sortie. À la place, il sera dirigé tout de suite vers la prochaine activité ou vers la page principale du cours Moodle.';
$string['exit_retry'] = 'Ré-essayer';
$string['exit_retry_text'] = 'Ré-essayer cette activité';
$string['exittext'] = 'Quitter la page de texte';
$string['exit_welldone'] = 'Bien joué !';
$string['exit_whatnext_0'] = 'Que voulez vous faire ensuite ?';
$string['exit_whatnext_1'] = 'Choisissez votre destinée...';
$string['exit_whatnext_default'] = 'Veuillez choisir l\'une des options suivantes :';
$string['feedbackdiscuss'] = 'Discuter de ce test dans un forum';
$string['feedbackformmail'] = 'Formulaire de feedback';
$string['feedbackmoodleforum'] = 'Forum Moodle';
$string['feedbackmoodlemessaging'] = 'Message Moodle';
$string['feedbacknone'] = 'Aucun';
$string['feedbacksendmessage'] = 'Envoyer un message à votre enseignant';
$string['feedbackwebpage'] = 'Page web';
$string['firstattempt'] = 'Première tentative';
$string['forceplugins'] = 'Lecteurs multimédias compatibles';
$string['forceplugins_help'] = 'Si activé, un lecteur multimédia compatible avec Moodle jouera les fichiers de type avi, mpeg, mpg, mp3, mov et wmv. Sinon, Moodle ne changera pas les paramètres des lecteurs multimédias du test.';
$string['frameheight'] = 'Hauteur du cadre';
$string['giveup'] = 'Abandonner';
$string['grademethod'] = 'Méthode d\'évaluation';
$string['grademethod_help'] = 'Ce paramètre définit comment la note HotPotatoes est calculée en fonction des scores des tentatives.

**Meilleure note**
: La note sera la plus haute note obtenue pour toutes les tentatives de ce test.

**Moyenne**
: La note sera une moyenne des notes de chacune des tentatives de ce test.

**Première tentative**
: La note sera la note de la première tentative de ce test.

**Dernière tentative**
: La note sera la note de la dernière tentative de ce test.';
$string['gradeweighting'] = 'Pondération de la note';
$string['gradeweighting_help'] = 'Les notes de cette activité HotPotatoes seront rapportées à ce nombre dans le carnet de notes de Moodle.';
$string['highestscore'] = 'Plus haut score';
$string['hints'] = 'Conseils';
$string['hotpot:attempt'] = 'Effectuer un Hot Potatoes et envoyer les résultats';
$string['hotpot:deleteallattempts'] = 'Supprimer toutes les tentatives d\'une activité HotPotatoes';
$string['hotpot:deletemyattempts'] = 'Supprimer ses propres tentatives d\'une activité HotPotatoes';
$string['hotpot:ignoretimelimits'] = 'Ignorer les limites de temps sur une activité HotPotatoes';
$string['hotpot:manage'] = 'Modifier les paramètres d\'une activité HotPotatoes';
$string['hotpotname'] = 'Nom de l\'activité HotPotatoes';
$string['hotpot:preview'] = 'Prévisualiser une activité HotPotatoes';
$string['hotpot:reviewallattempts'] = 'Voir toutes les tentatives d\'une activité HotPotatoes';
$string['hotpot:reviewmyattempts'] = 'Voir ses propres tentatives d\'une activité HotPotatoes';
$string['hotpot:view'] = 'Afficher la première page d\'un Hot Potatoes';
$string['ignored'] = 'Ignoré';
$string['inprogress'] = 'En cours';
$string['isgreaterthan'] = 'est plus grand que';
$string['islessthan'] = 'est plus petit que';
$string['lastaccess'] = 'Dernier accès';
$string['lastattempt'] = 'Dernière tentative';
$string['lockframe'] = 'Verrouiller le cadre';
$string['maxeventlength'] = 'Nombre maximum de jours pour un événement de calendrier';
$string['mediafilter_hotpot'] = 'Filtre multimédia de HotPotatoes';
$string['mediafilter_moodle'] = 'Filtre multimédia standard de Moodle';
$string['migratingfiles'] = 'Migration des fichiers du test HotPotatoes';
$string['missingsourcetype'] = 'Fichier source manquant pour l\'enregistrement HotPotatoes';
$string['modulename'] = 'Hot Potatoes';
$string['modulenameplural'] = 'Hot Potatoes';
$string['nameadd'] = 'Nom';
$string['nameadd_help'] = 'Le nom peut être un texte saisi par l\'enseignant ou généré automatiquement.

**Obtenir à partir du fichier source**
: Le nom sera extrait du fichier source.

**Utiliser le nom du fichier source**
: Le nom du fichier source sera utilisé comme nom.

**Utiliser le chemin du fichier source**
: Le chemin du fichier source sera utilisé comme nom. Tous les « / » du chemin seront remplacés par des espaces.

**Texte spécifique**
: Un texte saisi par l\'enseignant sera utilisé comme nom.';
$string['nameedit'] = 'Nom';
$string['nameedit_help'] = 'Ce texte est affiché aux participants';
$string['navigation'] = 'Navigation';
$string['navigation_embed'] = 'Intégrer une page web';
$string['navigation_frame'] = 'Cadre de navigation Moodle';
$string['navigation_give_up'] = 'Bouton « Abandonner » uniquement';
$string['navigation_help'] = 'Ce paramètre définit la barre de navigation du test.

**Barre de navigation de Moodle**
: La barre de navigation de Moodle sera affichée dans la même fenêtre que le test, en haut de page.

**Cadre de navigation de Moodle**
: La barre de navigation de Moodle sera affichée dans un cadre séparé en haut du test.

**Page web intégrée**
: La barre de navigation de Moodle sera affichée intégrée dans le test HotPotatoes.

**Aides de navigation originales**
: Le test sera affiché avec les boutons de navigation définis dans le test, s\'il y en a.

** Un simple bouton « Abandonner »**
: Le test sera affiché avec un simple bouton « Abandonner » au sommet de la page.

**Aucun**
: Le test sera affiché sans aucune navigation, de sorte que lorsque des réponses correctes auront été données à toutes les questions, selon le réglage « Afficher le test suivant ?», Moodle retournera à la page du cours ou lancera le test suivant.';
$string['navigation_moodle'] = 'Barres de navigation standard de Moodle (haut de page et coté)';
$string['navigation_none'] = 'Aucune';
$string['navigation_original'] = 'Aides à la navigation originale';
$string['navigation_topbar'] = 'Barre de navigation haute de Moodle seulement (pas de barre de coté)';
$string['noactivity'] = 'Aucune activité';
$string['nohotpots'] = 'Aucune activité HotPotatoes';
$string['nomoreattempts'] = 'Désolé, vous n\'avez plus de tentatives restantes pour cette activité';
$string['noresponses'] = 'Aucune information n\'a été trouvée sur les questions et les réponses individuelles.';
$string['noreview'] = 'Désolé, vous n\'êtes pas autorisé à voir les détails de cette tentative.';
$string['noreviewafterclose'] = 'Désolé, ce test est fermé. vous ne pouvez plus voir les détails de cette tentative.';
$string['noreviewbeforeclose'] = 'Désolé, vous n\'êtes pas autorisé à voir les détails de cette tentative avant {$a}';
$string['nosourcefilesettings'] = 'Information du fichier source manquant pour l\'enregistrement HotPotatoes';
$string['notavailable'] = 'Désolé, cette activité n\'est pas disponible pour vous pour l\'instant.';
$string['outputformat'] = 'Format d\'affichage';
$string['outputformat_best'] = 'Meilleur';
$string['outputformat_help'] = 'Le format de sortie précise de quelle manière le contenu sera affiché au participant.

Les formats de sortie disponibles dépendent du type de fichier source. Certains fichiers source n\'ont qu\'un format de sortie, alors que d\'autres en proposent plusieurs.

Le paramètre « meilleur » affichera le contenu en optimisant le format de sortie en fonction du navigateur du participant.';
$string['outputformat_hp_6_jcloze_html'] = 'JCloze HP6 html: Standard';
$string['outputformat_hp_6_jcloze_xml_anctscan'] = 'JCloze à partir d\'une source HP6 xml: ANCT-Scan';
$string['outputformat_hp_6_jcloze_xml_dropdown'] = 'JCloze à partir d\'une source  HP6 xml: Rottmeier DropDown';
$string['outputformat_hp_6_jcloze_xml_findit_a'] = 'JCloze à partir d\'une source HP6 xml: Rottmeier FindIt (a)';
$string['outputformat_hp_6_jcloze_xml_findit_b'] = 'JCloze à partir d\'une source HP6 xml: Rottmeier FindIt (b)';
$string['outputformat_hp_6_jcloze_xml_jgloss'] = 'JCloze à partir d\'une source HP6 xml: Rottmeier JGloss';
$string['outputformat_hp_6_jcloze_xml_v6'] = 'JCloze à partir d\'une source HP6 xml: Standard';
$string['outputformat_hp_6_jcross_html'] = 'JCross HP6 html';
$string['outputformat_hp_6_jcross_xml_v6'] = 'JCross à partir d\'une source HP6 xml';
$string['outputformat_hp_6_jmatch_html'] = 'JMatch à partir d\'une source html';
$string['outputformat_hp_6_jmatch_xml_flashcard'] = 'JMatch à partir d\'une source HP6 xml: Flashcard';
$string['outputformat_hp_6_jmatch_xml_jmemori'] = 'JMatch à partir d\'une source HP6 xml: Rottmeier JMemori';
$string['outputformat_hp_6_jmatch_xml_v6'] = 'JMatch à partir d\'une source HP6 xml: Standard';
$string['outputformat_hp_6_jmatch_xml_v6_plus'] = 'JMatch à partir d\'une source HP6 xml: Drag and Drop';
$string['outputformat_hp_6_jmix_html'] = 'JMix à partir d\'une source HP6 html';
$string['outputformat_hp_6_jmix_xml_v6'] = 'JMix à partir d\'une source HP6 xml: Standard';
$string['outputformat_hp_6_jmix_xml_v6_plus'] = 'JMix à partir d\'une source HP6 xml: Drag and Drop';
$string['outputformat_hp_6_jmix_xml_v6_plus_keypress'] = 'JMix à partir d\'une source HP6 xml: Drag and Drop with key press';
$string['outputformat_hp_6_jquiz_html'] = 'JQuiz HP6 html';
$string['outputformat_hp_6_jquiz_xml_v6'] = 'JQuiz à partir d\'une source HP6 xml: Standard';
$string['outputformat_hp_6_jquiz_xml_v6_autoadvance'] = 'JQuiz à partir d\'une source HP6 xml: Auto-advance';
$string['outputformat_hp_6_jquiz_xml_v6_exam'] = 'JQuiz à partir d\'une source HP6 xml: Exam';
$string['outputformat_hp_6_rhubarb_html'] = 'WebRhubarb (v6) à partir d\'une source html';
$string['outputformat_hp_6_rhubarb_xml'] = 'WebRhubarb (v6) à partir d\'une source xml';
$string['outputformat_hp_6_sequitur_html'] = 'WebSequitur (v6) à partir d\'une source html';
$string['outputformat_hp_6_sequitur_html_incremental'] = 'WebSequitur (v6) à partir d\'une source html, notation incrémentielle';
$string['outputformat_hp_6_sequitur_xml'] = 'WebSequitur (v6) à partir d\'une source xml';
$string['outputformat_hp_6_sequitur_xml_incremental'] = 'WebSequitur (v6) à partir d\'une source xml, notation incrémentielle';
$string['overviewreport'] = 'Aperçu';
$string['penalties'] = 'Pénalités';
$string['percent'] = 'Pourcentage';
$string['pluginadministration'] = 'Administration Hot Potatoes';
$string['pluginname'] = 'Module Hot Potatoes';
$string['pressoktocontinue'] = 'Cliquer sur OK pour continuer, ou Annuler pour rester sur la page actuelle.';
$string['questionshort'] = 'Q-{$a}';
$string['quizname_help'] = 'texte d\'aide pour le nom du test';
$string['quizzes'] = 'Tests';
$string['removegradeitem'] = 'Retirer l\'élément d\'évaluation';
$string['removegradeitem_help'] = 'Détermine si la note de cette activité doit être supprimée.

**Non**
: La note de cette activité ne sera pas supprimée du carnet de note de Moodle.

**Oui**
: Si la note maximale ou la pondération de cette note est à définie à zéro, alors la note de cette activité sera supprimée du carnet de note de Moodle.';
$string['responsesreport'] = 'Réponses';
$string['score'] = 'Score';
$string['scoresreport'] = 'Scores';
$string['selectattempts'] = 'Sélectionnez les tentatives';
$string['showerrormessage'] = 'Erreur HotPotatoes : {$a}';
$string['sourcefile'] = 'Nom du fichier source';
$string['sourcefile_help'] = 'Ce paramètre définit le fichier de contenu qui sera affiché aux participants.

Habituellement, ce fichier a été créé en dehors de Moodle, puis déposé dans la zone de fichiers du cours Moodle.
Cela peut être un fichier html ou un fichier d\'un autre type généré à partir d\'un logiciel ce création de type HotPotatoes ou Qedoc.

L\'emplacement du fichier source doit être indiqué comme un dossier ou un chemin de fichiers dans la zone de fichiers du cours Moodle, ou il peut être indiqué comme une URL commençant par http:// ou https://

Pour les documents Qedoc, le fichier source doit être indiqué comme une URL d\'un module Qedoc déposé sur le serveur Qedoc. Par exemple : http://www.qedoc.net/library/ABCDE_123.zip

Pour plus d\'informations sur le dépôt de source Qedoc, visitez le site [Qedoc documentation: Uploading_modules](http://www.qedoc.org/en/index.php?title=Uploading_modules)';
$string['sourcefilenotfound'] = 'Fichier source non trouvé (ou vide) : {$a}';
$string['status'] = 'Statut';
$string['stopbutton'] = 'Afficher le bouton stop';
$string['stopbutton_help'] = 'Si ce paramètre est activé, un bouton stop est ajouté au test.

Si l\'étudiant clique sur le bouton stop, le résultat obtenu jusqu\'ici sera envoyé à Moodle et la tentative de test sera considérée comme abandonnée.

Le texte affiché sur le bouton stop peut être issu du paquetage de langue Moodle ou définie par l\'enseignant pour créer son propre bouton stop.';
$string['stopbutton_langpack'] = 'À partir du paquetage de langue';
$string['stopbutton_specific'] = 'Utiliser un texte spécifique';
$string['stoptext'] = 'Texte du bouton stop';
$string['storedetails'] = 'Enregistrer les détails bruts XML des tentatives HotPotatoes.';
$string['studentfeedback'] = 'Feedback de l\'édudiant';
$string['studentfeedback_help'] = 'Si l\'option est activée, une fenêtre de feedback s\'ouvrira quand le participant cliquera sur le bouton « Vérifier ». Cette fenêtre permettra de discuter du test avec l\'enseignant et avec les autres participants d\'une de ces manières :

**Page web**
: Nécessite l\'URL d\'une page web existante, par exemple http://myserver.com/feedbackform.html

**Formulaire de feedback**
: Nécessite l\'URL d\'un formulaire existant, par exemple http://myserver.com/cgi-bin/formmail.pl

**Forum Moodle**
: Le forum de base du cours Moodle sera affiché.

**Messagerie instantanée Moodle**
: La messagerie instantanée de Moodle s\'affichera. Si le cours est géré par plusieurs enseignants, le participant devra sélectionner l\'enseignant de son choix avant que la messagerie n\'apparaisse.';
$string['submits'] = 'Envois';
$string['textsourcefile'] = 'Obtenir à partir du fichier source';
$string['textsourcefilename'] = 'Utiliser le nom du fichier source';
$string['textsourcefilepath'] = 'Utiliser le chemin du fichier source';
$string['textsourcequiz'] = 'Tirer de l\'activité';
$string['textsourcespecific'] = 'Texte spécifique';
$string['timeclose'] = 'Disponible jusqu\'au';
$string['timedout'] = 'En pause';
$string['timelimit'] = 'Limite de temps';
$string['timelimitexpired'] = 'La limite de temps pour cette tentative est échue';
$string['timelimit_help'] = 'Ce paramètre spécifie la durée maximale d\'une tentative.

** Utilisez les paramètres du fichier source / modèle**
: La durée sera tirée du fichier source ou modèle pour ce format de sortie.

** Utilisez de temps spécifique **
: La durée limite spécifiée sur la page des paramètres du test HotPotatoes sera utilisée comme la durée pour une tentative de ce test. Ce paramètre remplace les durées indiquées dans le fichier source, le fichier de configuration ou les fichiers de modèle de ce format de sortie.

**Désactiver**
: Aucune limite de temps ne sera définie pour les tentatives de ce test.

Si une tentative est reprise, le compteur continue à partir du moment où la tentative a été mise en pause.';
$string['timelimitspecific'] = 'Utiliser un temps spécifique';
$string['timelimitsummary'] = 'Limite de temps pour une tentative';
$string['timelimittemplate'] = 'Utiliser les paramètres du fichier source/modèle';
$string['timeopen'] = 'Disponible à partir de';
$string['timeopenclose'] = 'Dates d\'ouverture et de fermeture';
$string['timeopenclose_help'] = 'Vous pouvez spécifier quand les participant peuvent faire des tentatives pour ce test. Le test ne sera pas accessible avant l\'heure d\'ouverture et après l\'heure de fermeture.';
$string['title'] = 'Titre';
$string['title_help'] = 'Ce paramètre spécifie le titre à afficher sur la page Web.

** Nom de l\'activité HotPotatoes**
: Le nom de cette activité HotPotatoes sera affiché comme du titre de la page Web.

** Tirer du fichier source **
: Le titre défini dans le fichier source, s\'il existe, sera utilisé comme titre de la page Web.

** Utiliser le nom du fichier source **
: Le nom du fichier source, à l\'exclusion des noms de dossier, sera utilisé comme titre de la page Web.

** Utiliser le chemin du fichier source **
: Le chemin du fichier source, y compris tous les noms de dossiers, sera utilisé comme titre de la page Web.';
$string['unitname_help'] = 'texte d\'aide pour le nom de l\'unité';
$string['updated'] = 'Mis à jour';
$string['usefilters'] = 'Utiliser des filtres';
$string['usefilters_help'] = 'Si ce paramètre est activé, le contenu passera par les filtres Moodle avant d\'être affiché par le navigateur.';
$string['useglossary'] = 'Utiliser un glossaire';
$string['useglossary_help'] = 'Si ce paramètre est activé, le contenu passera par le filtre de glossaire automatique de Moodle avant d\'être affiché par le navigateur.

Notez que ce paramètre passe avant le paramètre du site concernant le filtre de glossaire automatique.';
$string['usemediafilter'] = 'Utiliser le filtre multimédia';
$string['usemediafilter_help'] = 'Ce paramètre définit le filtre multimédia qui sera utilisé.

**Aucun**
: Le contenu ne passera à travers aucun filtre.

**Filtre standard de Moodle**
: Le contenu sera soumis au filtre standard de Moodle. Ce filtre recherche les liens vers des sources multimédias et les convertit en lecteurs appropriés.

**Filtre standard de HotPotatoes**
: Le contenu sera soumis à un filtre qui détecte les liens vers les images, les sons et vidéos encadrés par des crochets.
: La syntaxe est la suivante : <code>[url player width height options]</code>

**URL**
: L\'URL absolue ou relative du fichier source.

**Lecteur** (facultatif)
: Le nom du lecteur à insérer. La valeur par défaut est Moodle. Mais la version standard de HotPotatoes propose aussi :
:**drew** : un lecteur MP3
:**dyer** : un lecteur MP3 par Bernard Dyer
:**hbs** : un lecteur MP3 de Half-Backed Software
:**image** : insère une image à partir d\'internet
:**link** : insère un lien vers une autre page web

**Largeur** (facultatif)
La largeur désirée pour le lecteur.

**Hauteur** (facultatif)
La hauteur désirée pour le lecteur. Si non indiquée, la valeur sera la même que la largeur.

**Options** (facultatif)
: Une liste d\'options passées au lecteur, séparées par des virgules. Chaque option peut être un simple interrupteur on/off ou un nom d\'option avec sa valeur correspondante.
: **nom=valeur**
: **nom="valeur avec des espaces"**';
$string['utilitiesindex'] = 'Index des outils HotPotatoes';
$string['viewreports'] = 'Voir le rapport pour {$a} utilisateur(s)';
$string['views'] = 'Vues';
$string['weighting'] = 'Pondération';
$string['wrong'] = 'Faux';
$string['zeroduration'] = 'Aucune durée';
$string['zeroscore'] = 'Pas de score';
