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
 * Strings for component 'lti', language 'fr', branch 'MOODLE_26_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Accepter';
$string['accept_grades'] = 'Accepter les notes de l\'outil';
$string['accept_grades_admin'] = 'Accepter les notes de l\'outil';
$string['accept_grades_admin_help'] = 'Indiquer si le fournisseur de l\'outil peut ajouter, mettre à jour, lire et effacer les notes associées à des instances de ce type d\'outil.

Certains fournisseurs d\'outil supportent le transfert des notes vers Moodle, sur la base d\'actions effectuées dans l\'outil, créant ainsi une expérience utilisateur mieux intégrée.';
$string['accept_grades_help'] = 'Indiquer si le fournisseur de l\'outil peut ajouter, mettre à jour, lire et effacer les notes associées à cette instance  de l\'outil externe

Certains fournisseurs d\'outil supportent le transfert des notes vers Moodle, sur la base d\'actions effectuées dans l\'outil, créant ainsi une expérience utilisateur mieux intégrée.

Ce réglage peut être surchargé par la configuration de l\'outil.';
$string['action'] = 'Action';
$string['active'] = 'Actif';
$string['activity'] = 'Activité';
$string['addnewapp'] = 'Activer l\'application externe';
$string['addserver'] = 'Ajouter un serveur fiable';
$string['addtype'] = 'Ajouter une configuration d\'outil externe';
$string['allow'] = 'Autoriser';
$string['allowinstructorcustom'] = 'Permettre aux enseignants d\'ajouter des paramètres personnalisés';
$string['allowsetting'] = 'Permettre à l\'outil de stocker 8 kO de réglages dans Moodle';
$string['always'] = 'Toujours';
$string['automatic'] = 'Automatique, basé sur l\'URL de lancement';
$string['baseurl'] = 'URL de base';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'Activités LTI';
$string['basiclti_base_string'] = 'Chaîne de base OAuth LTI';
$string['basiclti_endpoint'] = 'Point de terminaison LTI';
$string['basicltifieldset'] = 'Jeu de champs personnalisés';
$string['basiclti_in_new_window'] = 'Votre activité est ouverte dans une nouvelle fenêtre';
$string['basicltiintro'] = 'Description de l\'activité';
$string['basicltiname'] = 'Nom de l\'activité';
$string['basiclti_parameters'] = 'Paramètres de lancement LTI';
$string['basicltisettings'] = 'Réglages d\'interopérabilité Basic Learning Tool';
$string['cannot_delete'] = 'Vous ne pouvez pas supprimer la configuration de cet outil.';
$string['cannot_edit'] = 'Vous ne pouvez pas modifier la configuration de cet outil.';
$string['comment'] = 'Commentaire';
$string['configpassword'] = 'Mot de passe par défaut de l\'outil distant';
$string['configpreferheight'] = 'Hauteur favorite par défaut';
$string['configpreferwidget'] = 'Définir comme lanceur par défaut';
$string['configpreferwidth'] = 'Largeur favorite par défaut';
$string['configresourceurl'] = 'URL de la ressource par défaut';
$string['configtoolurl'] = 'URL de l\'outil distant par défaut';
$string['configtypes'] = 'Autoriser les applications LTI';
$string['courseid'] = 'Identifiant du cours';
$string['coursemisconf'] = 'Le cours n\'est pas configuré correctement';
$string['course_tool_types'] = 'Types d\'outil du cours';
$string['createdon'] = 'Créé le';
$string['curllibrarymissing'] = 'La bibliothèque PHP cURL doit être installée pour utiliser LTI';
$string['custom'] = 'Paramètres personnalisés';
$string['custom_config'] = 'Utilisation de l\'outil de configuration personnalisé';
$string['custom_help'] = 'Les paramètres personnalisés sont des réglages utilisés par le fournisseur de l\'outil. Par exemple, un paramètre personnalisé pourrait être utilisé pour afficher une ressource spécifique du fournisseur.

Il n\'est pas nécessaire de modifier ce champ, à moins que le fournisseur de l\'outil ne le demande.';
$string['custominstr'] = 'Paramètres personnalisés';
$string['debuglaunch'] = 'Option de déboggage';
$string['debuglaunchoff'] = 'Lancement normal';
$string['debuglaunchon'] = 'Lancement déboggage';
$string['default'] = 'Défaut';
$string['default_launch_container'] = 'Conteneur par défaut';
$string['default_launch_container_help'] = 'Le conteneur de lancement détermine l\'affichage de l\'outil quand il est lancé depuis le cours. Certains conteneurs fournissent plus d\'espace à l\'écran, d\'autres proposent une meilleure intégration avec l\'environnement de Moodle.

* **Défaut** : utilise le conteneur spécifié dans la configuration de l\'outil.
* **Intégré** : l\'outil est affiché dans la fenêtre Moodle existante, comme les autres activités.
* **Intégré, sans les blocs** : l\'outil est affiché dans la fenêtre Moodle existante, uniquement avec la navigation en haut de la page.
* **Nouvelle fenêtre** : l\'outil s\'ouvre dans une nouvelle fenêtre, occupant la totalité de l\'espace disponible. Suivant la configuration du navigateur, il peut s\'ouvrir dans un nouvel onglet. Certains navigateurs empêcheront l\'ouverture d\'une nouvelle fenêtre.';
$string['delegate'] = 'Déléguer à l\'enseignant';
$string['delete'] = 'Supprimer';
$string['delete_confirmation'] = 'Voulez-vous vraiment supprimer la configuration de cet outil externe ?';
$string['deletetype'] = 'Supprimer la configuration de l\'outil externe';
$string['display_description'] = 'Afficher la description de l\'activité lors du lancement';
$string['display_description_help'] = 'Si ce réglage est activé, la description de l\'activité (renseignée ci-dessus) sera affichée au-dessus du contenu du fournisseur de l\'outil.

La description (pas obligatoire) peut être utilisée pour fournir aux utilisateurs de l\'outil des explications supplémentaires.

La description n\'est jamais affichée lorsque l\'outil est lancé dans une nouvelle fenêtre.';
$string['display_name'] = 'Afficher le nom de l\'activité lors du lancement';
$string['display_name_help'] = 'Si ce réglage est activé, le nom de l\'activité (spécifié ci-dessus) sera affiché au-dessus du contenu fourni par le fournisseur de l\'outil.

Il est possible que ce dernier affiche également le titre. Cette option permet d\'éviter d\'afficher le titre à double.

Le titre n\'est jamais affiché lorsque que l\'activité est lancée dans une nouvelle fenêtre.';
$string['domain_mismatch'] = 'Le domaine de l\'URL de lancement ne correspond pas à la configuration de l\'outil.';
$string['donot'] = 'Ne pas envoyer';
$string['donotaccept'] = 'Ne pas accepter';
$string['donotallow'] = 'Ne pas autoriser';
$string['edittype'] = 'Modifier la configuration de l\'outil externe';
$string['embed'] = 'Incorporer';
$string['embed_no_blocks'] = 'Incorporer, sans bloc';
$string['enableemailnotification'] = 'Envoyer des courriels de notification';
$string['enableemailnotification_help'] = 'Si ce réglage est activé, les participants recevront notification par courriel lorsque leur remise est évaluée.';
$string['errormisconfig'] = 'Outil mal configuré. Veuillez demander à l\'administrateur de votre Moodle de corriger sa configuration.';
$string['extensions'] = 'Services d\'extension LTI';
$string['external_tool_type'] = 'Type d\'outil externe';
$string['external_tool_type_help'] = 'Le but principal d\'une configuration d\'outil est la mise en place d\'un canal de communication sécurisé entre Moodle et le fournisseur de l\'outil. Elle permet également de définir des réglages par défaut ainsi que de paramétrer d\'éventuels services supplémentaires fournis par l\'outil.

* **Automatique, basée sur l\'URL de lancement** - Ce réglage doit être utilisés la plupart du temps. Moodle sélectionnera la configuration la plus adéquate sur la base de l\'URL de lancement. Les outils configurés soit par un administrateur, soit dans ce cours seront utilisés. Lorsque l\'URL de lancement est indiqué, Moodle annoncera s\'il le reconnaît ou non. Dans ce dernier cas, vous pourriez être appelé à saisir les détail de la configuration manuellement.
* **Un type d\'outil spécifique** - En sélectionnant un type d\'outil spécifique, vous pouvez forcer Moodle à utiliser cette configuration lorsqu\'il communique avec le fournisseur d\'outil externe. Si l\'URL de lancement ne semble pas appartenir au fournisseur de l\'outil, un avertissement sera affiché. Dans certains cas, il n\'est pas nécessaire de saisir une URL de lancement pour un type spécifique d\'outil (si l\'on ne lance pas une ressource particulière chez le fournisseur de l\'outil).
* **Configuration personnalisée** - Pour effectuer une configuration d\'outil personnalisée juste pour cette instance, veuillez afficher les options avancées et renseigner vous-même la clef client et le secret partagé. Si vous ne disposez pas de ces deux éléments, vous devrez les demander au fournisseur de l\'outil. Les outils ne requièrent pas tous une clef client et un secret partagé. Dans ce cas les champs peuvent être laissés vides.

### Modification du type d\'outil

Trois icônes sont affichées sous le menu déroulant du Type d\'outil externe.

* **Ajouter** - Crée une configuration de l\'outil au niveau du cours. Toutes les instances de l\'outil externe de ce cours pourront utiliser cette configuration.
* **Modifier** - Sélectionnez un type d\'outil du cours du menu déroulant, puis cliquez sur cette icône. Les détails de la configuration pourront alors être modifiés.
* **Supprimer** - Supprimer de ce cours le type d\'outil sélectionné.';
$string['external_tool_types'] = 'Types d\'outils externes';
$string['failedtoconnect'] = 'Moodle n\'a pas pu communiquer avec le système « {$a} »';
$string['filter_basiclti_configlink'] = 'Configurer vos sites préférés et leur mot de passe';
$string['filter_basiclti_password'] = 'Le mot de passe est obligatoire';
$string['filterconfig'] = 'Administration LTI';
$string['filtername'] = 'LTI';
$string['fixexistingconf'] = 'Utiliser une configuration existante pour l\'instance configurée incorrectement';
$string['fixnew'] = 'Nouvelle configuration';
$string['fixnewconf'] = 'Définir une nouvelle configuration pour l\'instance configurée incorrectement';
$string['fixold'] = 'Utiliser l\'existant';
$string['forced_help'] = 'Ce réglage a été imposé au niveau de la configuration du cours ou du site. Vous ne pouvez pas le modifier depuis cette interface.';
$string['force_ssl'] = 'Forcer SSL';
$string['force_ssl_help'] = 'La sélection de cette option impose l\'utilisation de SSL lors de l\'appel de ce fournisseur d\'outil.

De plus, toutes les requêtes de services web de ce fournisseur d\'outil utiliseront SSL.

Avant d’activer cette option, assurez-vous que ce site Moodle et que le fournisseur de l\'outil supportent le protocole SSL.';
$string['generaltool'] = 'Outil générique';
$string['global_tool_types'] = 'Types d\'outils globaux';
$string['grading'] = 'Évaluation';
$string['icon_url'] = 'URL de l\'icône';
$string['icon_url_help'] = 'L\'URL de l\'icône permet de spécifier une icône différente à afficher pour cette activité dans la liste du cours. Au lieu d\'afficher l\'icône LTI par défaut, on peut spécifier une icône qui représente mieux le type de l\'activité.';
$string['id'] = 'ID';
$string['invalidid'] = 'L\'identifiant LTI est incorrect';
$string['launch_in_moodle'] = 'Lancer l\'outil dans Moodle';
$string['launchinpopup'] = 'Conteneur de lancement';
$string['launch_in_popup'] = 'Lancer l\'outil dans une fenêtre surgissante';
$string['launchinpopup_help'] = 'Le conteneur de lancement détermine l\'affichage de l\'outil quand il est lancé depuis le cours. Certains conteneurs fournissent plus d\'espace à l\'écran, d\'autres proposent une meilleure intégration avec l\'environnement de Moodle.

* **Défaut** : utilise le conteneur spécifié dans la configuration de l\'outil.
* **Intégré** : l\'outil est affiché dans la fenêtre Moodle existante, comme les autres activités.
* **Intégré, sans les blocs** : l\'outil est affiché dans la fenêtre Moodle existante, uniquement avec la navigation en haut de la page.
* **Nouvelle fenêtre** : l\'outil s\'ouvre dans une nouvelle fenêtre, occupant la totalité de l\'espace disponible. Suivant la configuration du navigateur, il peut s\'ouvrir dans un nouvel onglet. Certains navigateurs empêcheront l\'ouverture d\'une nouvelle fenêtre.';
$string['launchoptions'] = 'Options de lancement';
$string['launch_url'] = 'URL de lancement';
$string['launch_url_help'] = 'L\'URL de lancement indique l\'adresse web de l\'outil externe et peut contenir d\'autres informations, comme la ressource à afficher. Si vous ne savez pas qu\'indiquer comme URL de lancement, veuillez vous renseigner auprès du fournisseur de l\'outil.

Si vous avez choisi un type d\'outil spécifique, il ne sera peut-être pas nécessaire de saisir une URL. Si le lien n\'est utilisé que pour lancer l\'outil dans le système du fournisseur et n\'envoie pas vers une ressource spécifique, ce sera vraisemblablement le cas.';
$string['lti'] = 'LTI';
$string['lti:addcoursetool'] = 'Ajouter des configurations d\'outils externes propres à un cours';
$string['lti:addinstance'] = 'Ajouter des activités d\'outils externes';
$string['lti_administration'] = 'Administration LTI';
$string['lti_errormsg'] = 'L\'outil a retourné le message d\'erreur suivant : « {$a} »';
$string['lti:grade'] = 'Voir les notes retournées par un outil externe';
$string['lti_launch_error'] = 'Une erreur est survenue lors du lancement de l\'outil externe :';
$string['lti_launch_error_tool_request'] = '<p>Pour demander à un administrateur de terminer la configuration de cet outil, cliquez <a href="{$a->admin_request_url}" target="_top">ici</a>.</p>';
$string['lti_launch_error_unsigned_help'] = '<p>Cette erreur est vraisemblablement le résultat du manque de la clef client et du secret partagé pour ce fournisseur d\'outil.</p>
<p>Si vous êtes en possession de la clef utilisateur et du secret partagé, veuillez les saisir lors de la mise en place de l\'instance de l\'outil externe (assurez-vous que les réglages avancés sont affichés).</p>
<p>Ou alors, vous pouvez <a href="{$a->course_tool_editor}">créer une configuration</a> du fournisseur d\'outil au niveau du cours.</p>';
$string['lti:manage'] = 'Être formateur lors qu\'un outil externe est lancé';
$string['lti:requesttooladd'] = 'Demander la configuration d\'outils externes pour tout le site';
$string['lti_tool_request_added'] = 'La demande de configuration a été envoyée correctement. Vous pouvez contacter un administrateur pour terminer la configuration de l\'outil.';
$string['lti_tool_request_existing'] = 'Une demande de configuration a déjà été envoyée pour cet outil.';
$string['ltiunknownserviceapicall'] = 'API de service LTI inconnue appelée';
$string['lti:view'] = 'Lancer des activités d\'outils externes';
$string['main_admin'] = 'Aide générale';
$string['main_admin_help'] = 'Les outils externes permettent aux utilisateurs de Moodle d\'interagir de manière transparente avec des ressources d\'apprentissage distantes. Au moyen d\'un protocole de lancement spécial, l\'outil externe aura accès à des informations sur l\'utilisateur qui lance l\'outil, par exemple le nom de l\'institution, l\'identifiant du cours, l\'identifiant de l\'utilisateur et d\'autres informations comme le nom d\'utilisateur ou son adresse de courriel.

Les types d\'outils mentionnés sur cette page sont classés en trois catégories :

* **Actif** - Le type d\'outil a été approuvé et configuré par l\'administrateur. L\'outil peut être utilisé dans tous les cours de ce Moodle. Si une clef client et un secret partagé sont renseignés, une liaison sécurisée est établie entre ce Moodle et l\'outil externe, fournissant un canal de communication sûr.
* **En attente** - Le type d\'outil a été installé, mais n\'a pas été configuré par un administrateur. Les enseignants peuvent utiliser ces outils s\'ils disposent d\'une clef client et d\'un secret partagé, ou si ces éléments ne sont pas requis.
* **Rejeté** - Le type d\'outil a été marqué par un administrateur et ne sera pas configuré pour être mis à disposition de ce Moodle. Les enseignants peuvent utiliser ces outils s\'ils disposent d\'une clef client et d\'un secret partagé, ou si ces éléments ne sont pas requis.';
$string['miscellaneous'] = 'Divers';
$string['misconfiguredtools'] = 'Des instances d\'outil mal configurées ont été détectées';
$string['missingparameterserror'] = 'Cette page est mal configurée : {$a}';
$string['module_class_type'] = 'Type de module Moodle';
$string['modulename'] = 'Outil externe';
$string['modulename_help'] = 'Les outils externes permettent aux utilisateurs de Moodle d\'interagir avec des ressources d\'apprentissage sur d\'autres sites web. Par exemple, un outil externe donnera accès à un nouveau type d\'activité et ou des moyens d\'enseignements d\'un éditeur.

Pour configurer une instance d\'un outil externe, le fournisseur de l\'outil doit supporter la norme LTI (Learning Tools Interoperability). Les fournisseurs supportant LTI proposent des instructions sur la façon de configurer les instances externes de leurs outils. Les types d\'outil configurés par les administrateurs du site seront aussi disponibles pour les utilisateurs.

Les outils externes diffèrent des ressources de type URL de plusieurs façons.

* **Contextualisation** - Les outils externes ont accès à des informations sur l\'utilisateur qui lancent l\'outil, par exemple le nom de l\'institution, l\'identifiant du cours, l\'identifiant de l\'utilisateur et d\'autres informations comme le nom d\'utilisateur ou son adresse de courriel.
* **Intégration élevée** - Les outils externes supportent la lecture, la modification et la suppression des notes associées  à l\'activité. D\'autres points d\'intégration sont planifiés pour de prochaines versions.
* **Sécurité** - Les configurations d\'outils externes créent une liaison sécurisée entre Moodle et le fournisseur de l\'outil, permettant une communication sûre entre eux.';
$string['modulenameplural'] = 'Outils externes';
$string['modulenamepluralformatted'] = 'Instances LTI';
$string['never'] = 'Jamais';
$string['new_window'] = 'Nouvelle fenêtre';
$string['noattempts'] = 'Aucune tentative n\'a été effectuée sur cet instance de l\'outil';
$string['no_lti_configured'] = 'Il n\'y a pas d\'outil externe actif configuré.';
$string['no_lti_pending'] = 'Il n\'y a pas d\'outil externe en attente.';
$string['no_lti_rejected'] = 'Il n\'y a pas d\'outil externe rejeté.';
$string['noltis'] = 'Il n\'y a pas d\'instance LTI';
$string['noservers'] = 'Aucun serveur trouvé';
$string['notypes'] = 'Il n\'y a actuellement dans Moodle aucune configuration d\'outil LTI. Cliquer le lien d\'installation ci-dessus pour en ajouter.';
$string['noviewusers'] = 'Aucun utilisateur n\'a l\'autorisation d\'utiliser cet outil';
$string['optionalsettings'] = 'Réglages optionnels';
$string['organization'] = 'Informations sur l\'institution';
$string['organizationdescr'] = 'Description de l\'institution';
$string['organizationid'] = 'ID de l\'institution';
$string['organizationid_help'] = 'Un identifiant unique pour cette instance de Moodle. On utilise typiquement le nom DNS de l\'organisation.

Si le champ n\'est pas renseigné, le nom d\'hôte de ce site Moodle sera utilisé comme valeur par défaut.';
$string['organizationurl'] = 'URL de l\'institution';
$string['organizationurl_help'] = 'L\'URL de base de cette installation de Moodle.

Si ce champ n\'est pas renseigné, une valeur basée sur la configuration du site sera utilisée.';
$string['pagesize'] = 'Remises affichées par page';
$string['password'] = 'Secret partagé';
$string['password_admin'] = 'Secret partagé';
$string['password_admin_help'] = 'Le secret partagé est une sorte de mot de passe utilisé pour permettre l\'accès à l\'outil. Il doit être fourni avec la clef client par le fournisseur de l\'outil.

Les outils qui ne requièrent pas de connexion sécurisée de la part de Moodle et ne fournissent pas de services supplémentaires (tel que des rapports d\'évaluation) ne requièrent pas toujours de secret partagé.';
$string['password_help'] = 'Pour les outils pré-configurés, il n\'est pas nécessaire de saisir un secret partagé, car celui-ci sera fourni au cours du processus de configuration.

Ce champ doit être renseigné lors de la création d\'un lien vers un fournisseur d\'outil qui n\'est pas encore configuré. S\'il est prévu que le fournisseur d\'outil soit utilisé plusieurs fois dans ce cours, il est judicieux d\'ajouter une configuration d\'outil dans ce cours.

Le secret partagé est une sorte de mot de passe utilisé pour permettre l\'accès à l\'outil. Il doit être fourni avec la clef client par le fournisseur de l\'outil.

Les outils qui ne requièrent pas de connexion sécurisée de la part de Moodle et ne fournissent pas de services supplémentaires (tel que des rapports d\'évaluation) ne requièrent pas toujours de secret partagé.';
$string['pending'] = 'En attente';
$string['pluginadministration'] = 'Administration LTI';
$string['pluginname'] = 'LTI';
$string['preferheight'] = 'Hauteur préférée';
$string['preferwidget'] = 'Préférer le gadget de lancement';
$string['preferwidth'] = 'Largeur préférée';
$string['press_to_submit'] = 'Cliquer pour lancer cette activité';
$string['privacy'] = 'Confidentialité';
$string['quickgrade'] = 'Permettre l\'évaluation rapide';
$string['quickgrade_help'] = 'Si ce réglage est activé, plusieurs outils peuvent être évalués sur une seule page. Ajoutez des notes et des commentaires, puis cliquez « Enregistrer mes feedbacks » pour enregistrer toutes les modifications.';
$string['redirect'] = 'Vous allez être redirigé dans quelques secondes. Dans le cas contraire, cliquez sur le bouton.';
$string['reject'] = 'Rejeter';
$string['rejected'] = 'Rejeté';
$string['resource'] = 'Ressource';
$string['resourcekey'] = 'Clef client';
$string['resourcekey_admin'] = 'Clef client';
$string['resourcekey_admin_help'] = 'La clef client est un peu comme un nom d\'utilisateur pour accéder à l\'outil. Elle peut être utilisée par le fournisseur d\'outil pour identifier le site Moodle à partir duquel l\'outil est lancé.

La clef client doit être donnée par le fournisseur de l\'outil, par un processus automatique ou par un dialogue avec le fournisseur.

Les outils ne nécessitant pas une communication sécurisée depuis Moodle et qui n\'offrent pas de services supplémentaires (tel que des rapports d\'évaluation) ne requièrent pas toujours de clef client.';
$string['resourcekey_help'] = 'Pour les outils pré-configurés, il n\'est pas nécessaire de saisir une clef, car la clef client sera fournie au cours du processus de configuration.

Ce champ doit être renseigné lors de la création d\'un lien vers un fournisseur d\'outil qui n\'est pas encore configuré. S\'il est prévu que le fournisseur d\'outil soit utilisé plusieurs fois dans ce cours, il est judicieux d\'ajouter une configuration d\'outil dans ce cours.

La clef client est un peu comme un nom d\'utilisateur pour accéder à l\'outil. Elle peut être utilisée par le fournisseur d\'outil pour identifier le site Moodle à partir duquel l\'outil est lancé.

La clef client doit être donnée par le fournisseur de l\'outil, par un processus automatique ou par un dialogue avec le fournisseur.

Les outils ne nécessitant pas une communication sécurisée depuis Moodle et qui n\'offrent pas de services supplémentaires (tel que des rapports d\'évaluation) ne requièrent pas toujours de clef client.';
$string['resourceurl'] = 'URL de la ressource';
$string['return_to_course'] = 'Cliquer <a href="{$a->link}" target="_top">ici</a> pour revenir au cours.';
$string['saveallfeedback'] = 'Enregistrer mes feedbacks';
$string['secure_icon_url'] = 'URL de l\'icône sécurisée';
$string['secure_icon_url_help'] = 'Analogue à l\'URL de l’icône, mais utilisée lorsque le participant accède à Moodle au moyen du protocole sécurisé SSL. Le but de ce champ est d\'éviter que le navigateur avertisse l\'utilisateur s\'il accède à la page via SSL, tandis que l\'image elle-même provient d\'un site non sécurisé.';
$string['secure_launch_url'] = 'URL de lancement sécurisé';
$string['secure_launch_url_help'] = 'Analogue à l\'URL de lancement, mais utilisée en lieu et place si une sécurité plus élevée est requise. Moodle utilisera cette URL sécurisée si le site Moodle a lieu via SSL, ou si l\'outil est configuré de façon à être toujours lancé via SSL.

Il est aussi possible de définir l\'URL de lancement standard avec une adresse https, afin de forcer le lancement via SSL. Dans ce cas, ce champ peut être laissé vide.';
$string['send'] = 'Envoyer';
$string['setupoptions'] = 'Options de configuration';
$string['share_email'] = 'Partager le courriel de l\'utilisateur avec l\'outil';
$string['share_email_admin'] = 'Partager le courriel de l\'utilisateur avec l\'outil';
$string['share_email_admin_help'] = 'Spécifie si l\'adresse de courriel de l\'utilisateur qui lance l\'outil sera partagée avec le fournisseur de l\'outil.
Ce fournisseur pourrait avoir besoin de cette adresse afin de distinguer des utilisateurs dont le nom est le même dans l\'interface graphique, ou pour leur envoyer des messages en fonction des actions effectuées dans l\'outil.';
$string['share_email_help'] = 'Spécifie si l\'adresse de courriel de l\'utilisateur qui lance l\'outil sera partagée avec le fournisseur de l\'outil.
Ce fournisseur pourrait avoir besoin de cette adresse afin de distinguer des utilisateurs dont le nom est le même dans l\'interface graphique, ou pour leur envoyer des messages en fonction des actions effectuées dans l\'outil.

Ce réglage peut être court-circuité dans la configuration de l\'outil.';
$string['share_name'] = 'Partager le nom de l\'utilisateur avec l\'outil';
$string['share_name_admin'] = 'Partager le nom de l\'utilisateur avec l\'outil';
$string['share_name_admin_help'] = 'Spécifie si le nom complet de l\'utilisateur qui lance l\'outil sera partagée avec le fournisseur de l\'outil.
Ce fournisseur pourrait avoir besoin de ce nom pour afficher des informations pertinentes.';
$string['share_name_help'] = 'Spécifie si le nom complet de l\'utilisateur qui lance l\'outil sera partagée avec le fournisseur de l\'outil.
Ce fournisseur pourrait avoir besoin de ce nom pour afficher des informations pertinentes.

Ce réglage peut être court-circuité dans la configuration de l\'outil.';
$string['share_roster'] = 'Permettre à l\'outil d\'accéder à la liste des participants de ce cours';
$string['share_roster_admin'] = 'L\'outil peut accéder à la liste des participants du cours';
$string['share_roster_admin_help'] = 'Indiquez si cet outil peut accéder à la liste des utilisateurs inscrits aux cours à partir desquels ce type d\'outil est lancé.';
$string['share_roster_help'] = 'Indiquez si cet outil peut accéder à la liste des utilisateurs inscrits à ce cours.

Ce réglage peut être court-circuité dans la configuration de l\'outil.';
$string['show_in_course'] = 'Afficher le type d\'outil lors de la création des instances';
$string['show_in_course_help'] = 'Si cette option est activée, cette configuration d\'outil sera affichée dans le menu déroulant « Type d\'outil externe » lorsque les enseignants configurent des outils externes dans leurs cours.

La plupart du temps, cette option ne devrait pas être activée. Les enseignants peuvent utilisée cette configuration d\'outil sur la base de l\'URL de lancement correspondant à l\'URL de base de l\'outil, ce qui est la méthode préférée.

Le seul cas pour le cas où il faut utiliser cette option est celui où cette configuration n\'est destinée qu\'à une authentification unique. Par exemple, si tous les lancements mènent à une page unique plutôt qu\'à une ressource spécifique.';
$string['size'] = 'Paramètres de taille';
$string['submission'] = 'Remise';
$string['submissions'] = 'Remises';
$string['submissionsfor'] = 'Travaux remis pour {$a}';
$string['subplugintype_ltisource'] = 'Source LTI';
$string['subplugintype_ltisource_plural'] = 'Sources LTI';
$string['toggle_debug_data'] = 'Activer/désactiver les données de débogage';
$string['tool_config_not_found'] = 'Configuration de l\'outil introuvable avec cet URL';
$string['tool_settings'] = 'Réglages de l\'outil';
$string['toolsetup'] = 'Configuration de l\'outil externe';
$string['toolurl'] = 'URL de base de l\'outil';
$string['toolurl_help'] = 'L\'URL de base de l\'outil est utilisée pour apparier la bonne configuration d\'outil avec les différents URL de lancement. Il n\'est pas nécessaire de préfixer l\'URL avec http ou https.

De plus, l\'URL de base est utilisée comme URL de lancement si cette dernière n\'est pas spécifiée dans l\'instance de l\'outil externe.

Par exemple, une URL de base *outil.fr* pourra correspondre à :

* outil.fr
* outil.fr/quiz
* outil.fr/quiz/quiz.php?id=10
* www.outil.fr/quiz

Une URL de base *www.outil.fr/quiz* pourra correspondre à :

* outil.fr/quiz
* outil.fr/quiz/take.php?id=10
* www.outil.fr/quiz

Une URL de base *quiz.outil.fr* pourra correspondre à :

* quiz.outil.fr
* quiz.outil.fr/take.php?id=10

S\'il y a deux configurations d\'outils différentes pour le même domaine, la correspondance la plus spécifique est utilisée.';
$string['typename'] = 'Nom de l\'outil';
$string['typename_help'] = 'Le nom de l\'outil est utilisé pour identifier le fournisseur de l\'outil dans Moodle. Le nom saisi sera visible pour les enseignants lors de l\'ajout d\'outils externes dans leurs cours.';
$string['types'] = 'Types';
$string['update'] = 'Mise à jour';
$string['using_tool_configuration'] = 'Avec la configuration de l\'outil :';
$string['validurl'] = 'Une URL valide doit commencer par http:// ou https://';
$string['viewsubmissions'] = 'Afficher les remises et l\'écran d\'évaluation';
