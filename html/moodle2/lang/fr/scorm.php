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
 * Strings for component 'scorm', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   scorm
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activation'] = 'Activation';
$string['activityloading'] = 'Vous allez être dirigé automatiquement vers l\'activité dans';
$string['activityoverview'] = 'Des paquetages SCORM requièrent votre attention';
$string['activitypleasewait'] = 'Activité en cours de chargement. Veuillez patienter...';
$string['adminsettings'] = 'Réglages administrateur';
$string['advanced'] = 'Paramètres';
$string['aicchacpkeepsessiondata'] = 'Données de session AICC HACP';
$string['aicchacpkeepsessiondata_desc'] = 'Durée en jours pendant laquelle conserver les données de session AICC HACP (une durée élevée remplira la table d\'anciennes données qui pourraient être utiles pour le déboggage)';
$string['aicchacptimeout'] = 'Délai AICC HACP';
$string['aicchacptimeout_desc'] = 'Durée en minutes pendant laquelle une session AICC HACP externe peut rester ouverte';
$string['allowapidebug'] = 'Activer l\'API de débogage et de tracement (veuillez spécifier le masque de capture)';
$string['allowtypeaicchacp'] = 'Autoriser AICC HACP externe';
$string['allowtypeaicchacp_desc'] = 'Si ce réglage est activé, cela permet la communication AICC HACP externe sans nécessiter de connexion utilisateur pour les requêtes externes d\'un paquetage AICC';
$string['allowtypeexternal'] = 'Activer le type de paquetage externe';
$string['allowtypeexternalaicc'] = 'Autoriser les URLs directes AICC';
$string['allowtypeexternalaicc_desc'] = 'Si ce réglage est activé, cela permet l\'accès à un paquetage AICC par une URL directe';
$string['allowtypeimsrepository'] = 'Activer le type de paquetage IMS';
$string['allowtypelocalsync'] = 'Activer le type de paquetage téléchargé';
$string['apidebugmask'] = 'Masque de capture de l\'API de débogage (simple expression régulière sur <username>:<activityname>). Par exemple, admin:.* ne déboguera que l\'utilisateur admin';
$string['areacontent'] = 'Contenu des fichiers';
$string['areapackage'] = 'Fichier de paquetage';
$string['asset'] = 'Élément';
$string['assetlaunched'] = 'Élément - affiché';
$string['attempt'] = 'Tentative';
$string['attempt1'] = '1 tentative';
$string['attempts'] = 'tentatives';
$string['attemptstatusall'] = 'Ma page et page initiale';
$string['attemptstatusentry'] = 'Page initiale seulement';
$string['attemptstatusmy'] = 'Ma page seulement';
$string['attemptsx'] = '{$a} tentatives';
$string['attr_error'] = 'Valeur incorrecte de l\'attribut ({$a->attr}) dans la balise {$a->tag}.';
$string['autocontinue'] = 'Continuer automatiquement';
$string['autocontinuedesc'] = 'Si ce réglage est activé, les objets d\'apprentissage suivants seront lancés automatiquement. Dans le cas contraire, un bouton Continuer devra être cliqué.';
$string['autocontinue_help'] = '<!-- $Id$ -->


<p>Si l\'option « Continuer automatiquement » est activée, l\'objet d\'apprentissage suivant est automatiquement lancé lorsque le précédent objet d\'apprentissage appelle la méthode standard « close communication.»</p>

<p>Si elle n\'est pas activée, l\'apprenant doit cliquer explicitement le bouton « Continuer » pour obtenir l\'exercice ou l\'étape suivante.</p>';
$string['averageattempt'] = 'Moyenne des tentatives';
$string['badmanifest'] = 'Erreurs dans le fichier « manifest » : veuillez consulter l\'historique des erreurs';
$string['badpackage'] = 'Le paquetage/manifeste indiqué n\'est pas valide. Veuillez le vérifier et essayer à nouveau.';
$string['browse'] = 'Prévisualiser';
$string['browsed'] = 'Consulté';
$string['browsemode'] = 'Mode prévisualisation';
$string['browserepository'] = 'Consulter le dépôt';
$string['cannotfindsco'] = 'Objet d\'apprentissage introuvable';
$string['chooseapacket'] = 'Sélectionner ou mettre à jour un paquetage';
$string['completed'] = 'Terminé';
$string['completionscorerequired'] = 'Requiert un score minimal';
$string['completionscorerequired_help'] = 'Si ce réglage est activé, le participant devra obtenir au moins le score indiqué pour que cette activité SCORM soit marquée comme terminée, en plus des autres conditions de complétion.';
$string['completionstatus_completed'] = 'Terminé';
$string['completionstatus_passed'] = 'Réussi';
$string['completionstatusrequired'] = 'Requiert un statut';
$string['completionstatusrequired_help'] = 'En cochant un ou plusieurs statuts, vous requérez que les participants obtiennent au moins l\'un d\'entre eux pour que cette activité SCORM soit marquée comme terminée, en plus des autres conditions de complétion.';
$string['confirmloosetracks'] = 'Attention ! Le paquetage semble avoir été modifié. Si sa structure a été modifiée, les historiques de certains utilisateurs (tracking) seront perdus lors du processus de mise à jour.';
$string['contents'] = 'Contenus';
$string['coursepacket'] = 'Paquetage du cours';
$string['coursestruct'] = 'Structure du cours';
$string['currentwindow'] = 'Fenêtre courante';
$string['datadir'] = 'Erreur du système de fichier : impossible de créer le dossier de données du cours';
$string['defaultdisplaysettings'] = 'Réglages par défaut de l\'affichage';
$string['defaultgradesettings'] = 'Réglages par défaut des notes';
$string['defaultothersettings'] = 'Autres réglages par défaut';
$string['deleteallattempts'] = 'Supprimer toutes les tentatives de SCORM';
$string['deleteattemptcheck'] = 'Voulez-vous vraiment supprimer totalement ces tentatives ?';
$string['deleteuserattemptcheck'] = 'Voulez-vous vraiment supprimer totalement toutes vos tentatives ?';
$string['details'] = 'Détails du parcours';
$string['directories'] = 'Afficher les liens de dossier';
$string['disabled'] = 'Désactivé';
$string['display'] = 'Afficher le paquetage';
$string['displayattemptstatus'] = 'Afficher l\'état de la tentative';
$string['displayattemptstatusdesc'] = 'Ce réglage détermine si l\'état de la tentative doit être affiché ou non dans le bloc Ma page et/ou sur la page d\'accueil du SCORM.';
$string['displayattemptstatus_help'] = 'Si ce réglage est activé, un résumé des tentatives de l\'utilisateur sera affichés dans le bloc vue d\'ensemble du cours sur Ma page et/ou sur la page d\'accueil du SCORM.';
$string['displaycoursestructure'] = 'Afficher la structure du cours sur la page d\'entrée';
$string['displaycoursestructuredesc'] = 'Si ce réglage est activé, la table des matières sera affichée sur la page d\'entrée du SCORM.';
$string['displaycoursestructure_help'] = 'Si ce réglage est activé, la table des matières sera affichée dans le résumé du SCORM.';
$string['displaydesc'] = 'Ce réglage détermine si le paquetage SCORM doit être affiché dans une nouvelle fenêtre';
$string['displaysettings'] = 'Réglages de l\'affichage';
$string['dnduploadscorm'] = 'Ajouter un paquetage SCORM';
$string['domxml'] = 'Bibliothèque externe DOMXML';
$string['duedate'] = 'Date de remise';
$string['element'] = 'Élément';
$string['elementdefinition'] = 'Définition de l\'élément';
$string['enter'] = 'Entrer';
$string['entercourse'] = 'Commencer le cours';
$string['errorlogs'] = 'Historique des erreurs';
$string['everyday'] = 'Chaque jour';
$string['everytime'] = 'À chaque utilisation';
$string['exceededmaxattempts'] = 'Vous avez atteint le nombre maximum de tentatives.';
$string['exit'] = 'Terminer le cours';
$string['exitactivity'] = 'Terminer l\'activité';
$string['expired'] = 'Désolé, cette activité s\'est terminée le {$a} et n\'est plus disponible';
$string['external'] = 'Mise à jour des paquetages externes';
$string['failed'] = 'Échec';
$string['finishscorm'] = 'Si vous avez fini de consulter cette ressource, {$a}';
$string['finishscormlinkname'] = 'cliquez ici pour revenir à la page de cours';
$string['firstaccess'] = 'Premier accès';
$string['firstattempt'] = 'Première tentative';
$string['forcecompleted'] = 'Imposer de terminer';
$string['forcecompleteddesc'] = 'Ce réglage détermine si par défaut il est imposé de terminer l\'activité ou non';
$string['forcecompleted_help'] = 'Si ce réglage est activé, l\'état de la tentative actuelle est forcé sur « Terminé » (ce réglage n\'est valable que pour les paquetages SCORM 1.2).';
$string['forcejavascript'] = 'Forcer les utilisateurs à activer Javascript';
$string['forcejavascript_desc'] = 'Si ce réglage est activé (recommandé), il empêche l\'accès aux objets SCORM lorsque Javascript est désactivé ou n\'est pas supporté dans le navigateur de l\'utilisateur. Si le réglage est désactivé, l\'utilisateur pourra voir le SCORM, mais les communications API échoueront et aucune information d\'évaluation ne sera enregistrée.';
$string['forcejavascriptmessage'] = 'Javascript est requis pour voir cet élément. Veuillez activer Javascript dans votre navigateur et essayer à nouveau.';
$string['forcenewattempt'] = 'Imposer une nouvelle tentative';
$string['forcenewattemptdesc'] = 'Si ce réglage est activé, une nouvelle tentative sera comptée pour chaque accès au paquetage SCORM.';
$string['forcenewattempt_help'] = 'Si ce réglage est activé, une nouvelle tentative est comptée chaque fois que le paquetage SCORM est consulté.';
$string['found'] = 'Fichier « manifest » trouvé';
$string['frameheight'] = 'La hauteur du cadre ou de la fenêtre';
$string['framewidth'] = 'La largeur du cadre ou de la fenêtre';
$string['fullscreen'] = 'Remplir tout l\'écran';
$string['general'] = 'Généralités';
$string['gradeaverage'] = 'Note moyenne';
$string['gradeforattempt'] = 'Note de la tentative';
$string['gradehighest'] = 'Note la plus haute';
$string['grademethod'] = 'Méthode d\'évaluation';
$string['grademethoddesc'] = 'La méthode d\'évaluation définit comment la note d\'une tentative unique est calculée.';
$string['grademethod_help'] = 'La méthode de notation définit comment la note d\'une tentative est calculée.

Il y a 4 méthodes possibles pour cela :

* Objets complétés : le nombre d\'objets d\'apprentissage complétés/réussis de l\'activité
* Note la plus haute : le plus haut score AICC obtenu dans les objets d\'apprentissage achevés
* Note moyenne : la moyenne des scores AICC obtenus
* Somme : la somme des scores AICC obtenus';
$string['gradereported'] = 'Note envoyée';
$string['gradescoes'] = 'Objets d\'apprentissage';
$string['gradesettings'] = 'Réglages des notes';
$string['gradesum'] = 'Note totale';
$string['height'] = 'Hauteur';
$string['hidden'] = 'Invisible';
$string['hidebrowse'] = 'Désactiver le mode prévisualisation';
$string['hidebrowsedesc'] = 'Le mode prévisualisation permet aux participants de consulter une activité avant de la tenter.';
$string['hidebrowse_help'] = '<!-- $Id$ -->


<p>En choisissant Oui, le bouton de prévisualisation de l\'activité SCORM/AICC sera caché.</p>

<p>L\'étudiant peut choisir de prévisualiser (parcourir) l\'activité ou de réaliser une tentative en mode normal.</p>

<p>Lorsqu\'un objet d\'apprentissage est achevé en mode prévisualisation, il est signalé par l\'icône <img src="<?php echo $CFG->wwwroot.\'/mod/scorm/pix/browsed.gif\' ?>" alt="<?php print_string(\'browsed\',\'scorm\') ?>" title="<?php print_string(\'browsed\',\'scorm\') ?>" />.</p>';
$string['hideexit'] = 'Masquer le bouton de sortie';
$string['hidenav'] = 'Masquer les boutons de navigation';
$string['hidenavdesc'] = 'Ce réglage détermine si les boutons de navigation doivent être affichés ou non.';
$string['hidereview'] = 'Masquer le bouton de relecture';
$string['hidetoc'] = 'Affichage de la structure du cours dans le lecteur';
$string['hidetocdesc'] = 'Ce réglage détermine comment la table des matières doit être affichée dans le lecteur SCORM.';
$string['hidetoc_help'] = 'Affichage de la table des matières dans le lecteur SCORM';
$string['highestattempt'] = 'Meilleure tentative';
$string['identifier'] = 'Identifiant de question';
$string['incomplete'] = 'Incomplet';
$string['info'] = 'Info';
$string['interactions'] = 'Interactions';
$string['interactionscorrectcount'] = 'Nombre de résultats corrects pour la question';
$string['interactionsid'] = 'ID de l\'élément';
$string['interactionslatency'] = 'Durée entre l\'instant où l\'interaction était disponible pour une réponse du participant et l\'instant de la première réponse';
$string['interactionslearnerresponse'] = 'Réponse du participant';
$string['interactionspattern'] = 'Structure de la réponse correcte';
$string['interactionsresponse'] = 'Réponse du participant';
$string['interactionsresult'] = 'Résultat basé sur la réponse du participant et le résultat correct';
$string['interactionsscoremax'] = 'Valeur maximum de l\'intervalle pour le score brut';
$string['interactionsscoremin'] = 'Valeur minimum de l\'intervalle pour le score brut';
$string['interactionsscoreraw'] = 'Nombre qui reflète la performance du participant relativement à l\'intervalle défini par les valeurs min et max';
$string['interactionssuspenddata'] = 'Fournit de la place pour enregistrer et récupérer les données entre les sessions du participant';
$string['interactionstime'] = 'Heure du début de la tentative';
$string['interactionstype'] = 'Type de question';
$string['interactionsweight'] = 'Pondération attribuée à l\'élément';
$string['invalidactivity'] = 'L\'activité SCORM n\'est pas correcte';
$string['invalidhacpsession'] = 'Session HACP non valide';
$string['invalidmanifestresource'] = '<strong>Attention !</strong> Les ressources ci-dessous sont référencées dans le manifeste, mais n\'ont pas pu être trouvées :';
$string['invalidurl'] = 'URL spécifié non valide';
$string['invalidurlhttpcheck'] = 'L\'URL spécifiée n\'est pas valide. Message de débogage : <pre>{$a->cmsg}</pre>';
$string['last'] = 'Dernier accès le';
$string['lastaccess'] = 'Dernier accès';
$string['lastattempt'] = 'Dernière tentative terminée';
$string['lastattemptlock'] = 'Verrouiller après la tentative finale';
$string['lastattemptlockdesc'] = 'Si ce réglage est activé, les participants ayant épuisé leur nombre de tentatives ne peuvent plus lancer le lecteur SCORM.';
$string['lastattemptlock_help'] = 'Si ce réglage est activé, les étudiants ne peuvent plus lancer le lecteur SCORM une fois qu\'ils ont épuisé le nombre de tentatives qui leur sont allouées.';
$string['location'] = 'Afficher la barre d\'URL';
$string['max'] = 'Score max';
$string['maximumattempts'] = 'Nombre de tentatives';
$string['maximumattemptsdesc'] = 'Ce réglage détermine la valeur par défaut du nombre maximal de tentatives de l\'activité';
$string['maximumattempts_help'] = '<!-- $Id$ -->


<p>Ceci indique le nombre de tentatives que l\'utilisateur peut réaliser.<br />Utilisable uniquement avec les paquetages SCORM1.2 ou AICC. SCORM2004 comporte ses propres paramètres pour le nombre de tentatives.</p>';
$string['maximumgradedesc'] = 'Ce réglage détermine la note maximale par défaut de l\'activité';
$string['menubar'] = 'Afficher la barre des menus';
$string['min'] = 'Score minimum';
$string['missing_attribute'] = 'Attribut {$a->attr} manquant dans la balise {$a->tag}';
$string['missingparam'] = 'Un paramètre requis est manquant ou incorrect';
$string['missing_tag'] = 'Balise {$a->tag} manquante';
$string['mode'] = 'Mode';
$string['modulename'] = 'Paquetage SCORM';
$string['modulename_help'] = 'Un paquetage SCORM est constitué d\'un ensemble de fichiers assemblés suivant un standard défini pour les objets d\'apprentissages. Le module d\'activité SCORM permet de déposer des paquetages SCORM ou AICC sours la forme d\'archives ZIP et de les ajouter à un cours.

Le contenu est en principe affiché sur plusieurs pages avec une navigation permettant de passer d\'une page à l\'autre. Il y a diverses options d\'affichage, dans une fenêtre surgissante, avec une table des matières, avec des boutons de navigation, etc. Les activités SCORM comportent en général des questions et les notes sont enregistrées dans le carnet de notes.

Les activités SCORM peuvent être utilisées :

* pour présenter des contenus multimédias et des animations
* comme outil d\'évaluation';
$string['modulenameplural'] = 'Paquetages SCORM';
$string['navigation'] = 'Navigation';
$string['newattempt'] = 'Commencer une nouvelle tentative';
$string['next'] = 'Continuer';
$string['noactivity'] = 'Aucune activité';
$string['noattemptsallowed'] = 'Nombre de tentatives permises';
$string['noattemptsmade'] = 'Nombre de tentatives effectuées';
$string['no_attributes'] = 'La balise {$a->tag} doit avoir des attributs';
$string['no_children'] = 'La balise {$a->tag} doit avoir des descendants';
$string['nolimit'] = 'Tentatives illimitées';
$string['nomanifest'] = 'Aucun descriptif trouvé';
$string['noprerequisites'] = 'Désolé ! Vous n\'avez pas obtenu les prérequis suffisants pour accéder à cette activité.';
$string['noreports'] = 'Pas de rapport à afficher';
$string['normal'] = 'Normal';
$string['noscriptnoscorm'] = 'Votre navigateur ne supporte pas Javascript ou celui-ci est désactivé. Ce paquetage SCORM ne fonctionnera pas correctement et le suivi des participants ne sera pas enregistré.';
$string['notattempted'] = 'Aucune tentative';
$string['not_corr_type'] = 'Erreur de type pour la balise {$a->tag}';
$string['notopenyet'] = 'Désolé, cette activité n\'est pas disponible avant le {$a}';
$string['objectives'] = 'Objectifs';
$string['optallstudents'] = 'Tous les utilisateurs';
$string['optattemptsonly'] = 'Seulement les utilisateurs avec tentatives';
$string['options'] = 'Options (bloqué par certains navigateurs)';
$string['optionsadv'] = 'Options (avancées)';
$string['optionsadv_desc'] = 'Si ce réglage est coché, la hauteur et la largeur seront listés comme réglages avancés.';
$string['optnoattemptsonly'] = 'Seulement les utilisateurs sans tentative';
$string['organization'] = 'Organisation';
$string['organizations'] = 'Organisations';
$string['othersettings'] = 'Réglages additionels';
$string['othertracks'] = 'Autres pistes';
$string['package'] = 'Fichier paquetage';
$string['packagedir'] = 'Erreur du système de fichier : impossible de créer le dossier du paquetage';
$string['packagefile'] = 'Pas de paquetage spécifié';
$string['package_help'] = '<!-- $Id$ -->


<p>Un paquetage est proposé sous forme d\'un seul fichier d\'extension <b>.zip</b> (ou .pif) qui contient des fichiers de description AICC ou SCORM valides.</p>

<p>Un paquetage <b>SCORM</b> DOIT contenir à la racine du volume compressé, un fichier nommé <b>imsmanifest.xml</b> qui décrit la structure du cours SCORM, la situation des ressources et une foule d\'autres méta-informations.</p>

<p>Un paquet <b>AICC</b> est défini par un ensemble de fichiers (de 4 à 7) avec des extensions prédéfinies. Voici les extensions et leurs signification :</p>

<ul>

<li>CRS - Fichier de description du cours (Course Description file - présence obligatoire)</li>

<li>AU  - Fichier des éléments évaluables (Assignable Unit file - présence obligatoire)</li>

<li>DES - Fichier des descripteurs (Descriptor file - présence obligatoire)</li>

<li>CST - Fichier de structure du cours (Course Structure file - présence obligatoire)</li>

<li>ORE - Fichier des relations entre objectifs (Objective Relationship file - optionnel)</li>

<li>PRE - Fichier des prérequis (Prerequisites file - optionnel)</li>

<li>CMP - Fichier des conditions de validation (Completion Requirements file - optionnel)</li>

</ul>';
$string['packageurl'] = 'URL';
$string['packageurl_help'] = 'Ce réglage permet de spécifier une URL pour le paquetage SCORM, au lieu de choisir un paquetage dans le sélecteur de fichiers.';
$string['page-mod-scorm-x'] = 'Toute page du module SCORM';
$string['pagesize'] = 'Taille de page';
$string['passed'] = 'Réussi';
$string['php5'] = 'PHP 5 (bibliothèque DOMXML native)';
$string['pluginadministration'] = 'Administration paquetage SCORM';
$string['pluginname'] = 'Paquetage SCORM';
$string['popup'] = 'Nouvelle fenêtre';
$string['popupmenu'] = 'Dans un menu déroulant';
$string['popupopen'] = 'Ouvrir le paquetage dans une nouvelle fenêtre';
$string['popupsblocked'] = 'Il semble que les fenêtres surgissantes sont bloquées, ce qui a stoppé l\'exécution de ce SCORM. Veuillez vérifier les réglages de votre navigateur avant de recommencer.';
$string['position_error'] = 'La balise {$a->tag} ne peut pas être un descendant de la balise {$a->parent}';
$string['preferencespage'] = 'Préférences de cette seule page';
$string['preferencesuser'] = 'Préférences de ce rapport';
$string['prev'] = 'Précédent';
$string['raw'] = 'Score brut';
$string['regular'] = 'Descriptif normal';
$string['report'] = 'Rapport';
$string['reportcountallattempts'] = '{$a->nbattempts} tentatives pour {$a->nbusers} utilisateurs, sur {$a->nbresults} résultats';
$string['reportcountattempts'] = '{$a->nbresults} résultats ({$a->nbusers} utilisateurs)';
$string['reports'] = 'Rapports';
$string['resizable'] = 'Permettre le redimensionnement de la fenêtre';
$string['result'] = 'Résultat';
$string['results'] = 'Résultats';
$string['review'] = 'Relecture';
$string['reviewmode'] = 'Mode relecture';
$string['scoes'] = 'Objets d\'apprentissage';
$string['score'] = 'Résultat';
$string['scorm:addinstance'] = 'Ajouter un paquetage SCORM';
$string['scormclose'] = 'Jusqu\'au';
$string['scormcourse'] = 'Cours d\'apprentissage';
$string['scorm:deleteownresponses'] = 'Supprimer ses propres tentatives';
$string['scorm:deleteresponses'] = 'Supprimer les tentatives SCORM';
$string['scormloggingoff'] = 'L\'historique API est désactivée';
$string['scormloggingon'] = 'L\'historique API est activée';
$string['scormopen'] = 'Ouvert';
$string['scormresponsedeleted'] = 'Tentative supprimées de l\'utilisateur';
$string['scorm:savetrack'] = 'Enregistrer les traces';
$string['scorm:skipview'] = 'Sauter la vue d\'ensemble';
$string['scormtype'] = 'Type';
$string['scormtype_help'] = 'Ce réglage détermine comment le paquetage est inclus dans le cours. Il y a au maximum 5 options.

* Paquetage déposé : le paquetage SCORM peut être choisi dans le sélecteur de fichiers.
* Manifeste SCORM externe : permet d\'indiquer l\'URL d\'un fichier imsmanifest.xml. Si l\'URL est dans un autre domaine que le site Moodle, l\'option Paquetage téléchargé est mieux adaptée, car sinon les notes ne seraient pas enregistrées.
* Paquetage téléchargé : permet d\'indiquer l\'URL d\'un paquetage SCORM externe. Le paquetage sera décompressé et enregistré localement, et mis à jour si le paquetage externe est modifié.
* Dépôt local IMS content : permet de choisir un paquetage depuis un dépôt IMS.
* External AICC URL : cette URL est l\'URL permettant de lancer une activité AICC. Un pseudo paquetage sera construit autour de cette activité.';
$string['scorm:viewreport'] = 'Voir les rapports';
$string['scorm:viewscores'] = 'Voir les scores';
$string['scrollbars'] = 'Permettre le défilement de la fenêtre';
$string['selectall'] = 'Tout sélectionner';
$string['selectnone'] = 'Tout désélectionner';
$string['show'] = 'Afficher';
$string['sided'] = 'Sur le côté';
$string['skipview'] = 'Ne pas afficher la structure du contenu des pages';
$string['skipviewdesc'] = 'Ce réglage détermine quand par défaut ne pas afficher pour les participants la structure du contenu d\'une page';
$string['skipview_help'] = '<!-- $Id$ -->


<p>Si vous ajoutez un paquetage ne comportant qu\'un objet d\'apprentissage, vous pouvez vous dispenser d\'afficher la liste des contenus s\'affichant au lancement de l\'activité SCORM.</p>

<p>Vous pouvez choisir :</p>

<ul>

<li><strong>Jamais</strong> affiche la liste des contenus</li>

<li><strong>Premier accès</strong> n\'affiche la liste des contenus que la première fois</li>

<li><strong>Toujours</strong> n\'affiche pas la liste des contenus</li>

</ul>';
$string['slashargs'] = 'ATTENTION ! Le réglage <i>slasharguments</i> est désactivé. Les objets SCORM ne fonctionneront pas correctement !';
$string['stagesize'] = 'Taille cadre/fenêtre';
$string['stagesize_help'] = 'Ces deux paramètres déterminent les dimensions (hauteur et largeur) du cadre ou de la fenêtre de l\'objet d\'apprentissage.';
$string['started'] = 'Démarré le';
$string['status'] = 'État';
$string['statusbar'] = 'Afficher la barre d\'état';
$string['student_response'] = 'Réponse du participant';
$string['subplugintype_scormreport'] = 'Rapport';
$string['subplugintype_scormreport_plural'] = 'Rapports';
$string['suspended'] = 'Suspendu';
$string['syntax'] = 'Erreur de syntaxe';
$string['tag_error'] = 'Balise inconnue ({$a->tag}) avec ce contenu : {$a->value}';
$string['time'] = 'Durée';
$string['timerestrict'] = 'Restreindre les réponses à cette période';
$string['title'] = 'Titre';
$string['toc'] = 'TOC';
$string['toolbar'] = 'Afficher la barre d\'outils';
$string['too_many_attributes'] = 'La balise {$a->tag} a trop d\'attributs';
$string['too_many_children'] = 'La balise {$a->tag} a trop de descendants';
$string['totaltime'] = 'Durée';
$string['trackingloose'] = 'Attention ! Les données du suivi de ce paquetage seront perdues !';
$string['type'] = 'Type';
$string['typeaiccurl'] = 'URL AICC externe';
$string['typeexternal'] = 'Manisfeste SCORM externe';
$string['typeimsrepository'] = 'Dépôt local IMS content';
$string['typelocal'] = 'Paquetage déposé';
$string['typelocalsync'] = 'Paquetage téléchargé';
$string['unziperror'] = 'Une erreur est survenue lors du décompactage du paquetage';
$string['updatefreq'] = 'Fréquence de mise à jour';
$string['updatefreqdesc'] = 'Ce réglage détermine la valeur par défaut de la fréquence de la mise à jour automatique de l\'activité';
$string['updatefreq_help'] = 'Ceci permet de télécharger et de mettre à jour automatiquement le paquetage externe';
$string['validateascorm'] = 'Valider un paquetage';
$string['validation'] = 'Résultat de la validation';
$string['validationtype'] = 'Ce réglage détermine la bibliothèque DOMXML utilisée pour la validation du fichier « manifest » des SCORM. Si vous ne savez pas de quoi il s\'agit, ne modifiez pas la valeur.';
$string['value'] = 'Valeur';
$string['versionwarning'] = 'La version du fichier « manifest » est antérieure à 1.3, avertissement à la balise {$a->tag}';
$string['viewallreports'] = 'Afficher les rapports des {$a} tentatives';
$string['viewalluserreports'] = 'Afficher les rapports des {$a} utilisateurs';
$string['whatgrade'] = 'Évaluation des tentatives';
$string['whatgradedesc'] = 'Ce réglage détermine quelle note est enregistrée dans le carnet de notes lorsque de multiples tentatives sont autorisées : la plus haute, la moyenne des tentatives ou la dernière.';
$string['whatgrade_help'] = 'Si plusieurs tentatives sont autorisées, ce réglage détermine le résultat à intégrer au carnet de notes, entre la tentative la plus élevée, la moyenne, la première ou la dernière. L\'option prenant en compte la dernière tentative ne gère pas les tentatives avec un statut d\'échec.

Traitement des tentatives multiples

* L\'option de commencer une nouvelle tentative est fournie par une case à cocher au-dessus du bouton Entrée sur la page de la structure du contenu. Veuillez vous assurer de fournir l\'accès à cette page si vous voulez autoriser les tentatives multiples.
* Si certains paquetages SCORM peuvent traiter les nouvelles tentatives, la plupart d\'entre eux n\'en sont pas capables. Cela signifie que si un participant commence une nouvelle tentative et que le paquetage SCORM n\'est pas capable d\'éviter que les tentatives précédentes ne soient écrasées, celles-ci pourraient être écrasées même si la tentative est marquée comme terminée ou réussie.
* Les réglages « Imposer de terminer », « Imposer une nouvelle tentative » et « Verrouiller après la tentative finale » permettent en outre de mieux gérer les tentatives multiples.';
$string['width'] = 'Largeur';
$string['window'] = 'Fenêtre';
