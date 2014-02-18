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
 * Strings for component 'webservice', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   webservice
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessexception'] = 'Exception du contrôle d\'accès';
$string['actwebserviceshhdr'] = 'Protocoles de service web actifs';
$string['addaservice'] = 'Ajouter un service';
$string['addcapabilitytousers'] = 'Vérifier la capacité des utilisateurs';
$string['addcapabilitytousersdescription'] = 'Les utilisateurs doivent avoir deux capacités : webservice:createtoken et une capacité correspondant au protocole utilisé, par exemple webservice/rest:use ou webservice/soap:use. Pour ce faire, veuillez créer un rôle « Web services » avec les capacités adéquates et l\'attribuer à l\'utilisateur web services comme rôle système.';
$string['addfunction'] = 'Ajouter fonction';
$string['addfunctionhelp'] = 'Sélectionner la fonction à ajouter au service.';
$string['addfunctions'] = 'Ajouter des fonctions';
$string['addfunctionsdescription'] = 'Sélectionnez les fonctions requises pour le service nouvellement créé.';
$string['addrequiredcapability'] = 'Attribuer/retirer la capacité requise';
$string['addservice'] = 'Ajouter un service : {$a->name} (id: {$a->id})';
$string['addservicefunction'] = 'Ajouter des fonctions au service « {$a} »';
$string['allusers'] = 'Tous les utilisateurs';
$string['amftestclient'] = 'Client AMF test';
$string['apiexplorer'] = 'Explorateur API';
$string['apiexplorernotavalaible'] = 'L\'explorateur API n\'est pas encore disponible';
$string['arguments'] = 'Paramètres';
$string['authmethod'] = 'Méthode d\'authentification';
$string['cannotcreatetoken'] = 'Pas de droit d\'accès pour créer un jeton de service web pour le service {$a}.';
$string['cannotgetcoursecontents'] = 'Impossible d\'obtenir le contenu du cours';
$string['checkusercapability'] = 'Vérifier la capacité utilisateur';
$string['checkusercapabilitydescription'] = 'L\'utilisateur doit avoir les capacités correspondant aux protocoles utilisé, par exemple webservice/rest:use ou webservice/soap:use. Pour ce faire, veuillez créer un rôle « Web services » avec les capacités adéquates et l\'attribuer à l\'utilisateur web services comme rôle système.';
$string['configwebserviceplugins'] = 'Pour des raisons de sécurité, seuls les protocoles utilisés doivent être activés.';
$string['context'] = 'Contexte';
$string['createservicedescription'] = 'Un service est un ensemble de fonctions web service. Vous devrez autoriser l\'utilisateur à accéder à un nouveau service. Sur la page <b>Ajouter service</b>, cochez les options « Activer » et « Utilisateurs autorisés ». Sélectionnez « Aucune capacité requise ».';
$string['createserviceforusersdescription'] = 'Un service est un ensemble de fonctions web service. Vous devrez autoriser l\'utilisateur à accéder à un nouveau service. Sur la page <b>Ajouter service</b>, cochez les options « Activer » et « Utilisateurs autorisés ». Sélectionnez « Aucune capacité requise ».';
$string['createtoken'] = 'Créer jeton';
$string['createtokenforuser'] = 'Créer un jeton pour un utilisateur';
$string['createtokenforuserdescription'] = 'Créez un jeton pour l\'utilisateur web services.';
$string['createuser'] = 'Créer un utilisateur spécifique';
$string['createuserdescription'] = 'Vous devez créer un utilisateur services web pour représenter le système contrôlant Moodle.';
$string['criteriaerror'] = 'Droits d\'accès manquants pour rechercher par critères.';
$string['default'] = 'Défaut pour « {$a} »';
$string['deleteaservice'] = 'Supprimer service';
$string['deleteservice'] = 'Supprimer le service : {$a->name} (id: {$a->id})';
$string['deleteserviceconfirm'] = 'La suppression d\'un service détruira aussi les jetons en liens avec ce service. Voulez-vous vraiment supprimer le service externe « {$a} »?';
$string['deletetokenconfirm'] = 'Voulez-vous vraiment supprimer ce jeton web service pour <strong>{$a->user}</strong> pour le service <strong>{$a->service}</strong> ?';
$string['disabledwarning'] = 'Tous les protocoles de services web sont désactivés. Le réglage « Activerles services web » est accessible dasn les réglages avancés.';
$string['doc'] = 'Documentation';
$string['docaccessrefused'] = 'Vous n\'êtes pas autorisé à voir la documentation pour ce jeton';
$string['documentation'] = 'Documentation service web';
$string['downloadfiles'] = 'Peut télécharger des fichiers';
$string['downloadfiles_help'] = 'Si ce réglage est activé, tous les utilisateurs peuvent télécharger des fichiers avec leurs clefs de sécurité. Le téléchargement est bien entendu restreint aux fichiers auxquels les utilisateurs ont accès dans le site.';
$string['editaservice'] = 'Modifier service';
$string['editservice'] = 'Modifier le service : {$a->name} (id: {$a->id})';
$string['enabled'] = 'Activé';
$string['enabledocumentation'] = 'Activer la documentation développeur';
$string['enabledocumentationdescription'] = 'Une documentation détaillée des services web est disponible pour les protocoles activés.';
$string['enablemobilewsoverview'] = 'Aller sur la page d\'administration {$a->manageservicelink}, cocher le réglage « {$a->enablemobileservice} » et enregistrer. Tout sera configuré et les utilisateurs de votre site pourront utiliser l\'app officielle Moodle. Statut actuel : {$a->wsmobilestatus}';
$string['enableprotocols'] = 'Activer des protocoles';
$string['enableprotocolsdescription'] = 'Au moins un protocole doit être activé. Pour des raisons de sécurité, seuls les protocoles réellement utilisés devraient être activés.';
$string['enablews'] = 'Activer les services web';
$string['enablewsdescription'] = 'Les services web doivent être activés dans les Fonctions avancées.';
$string['entertoken'] = 'Veuillez saisir une clef (un jeton) de sécurité';
$string['error'] = 'Erreur : {$a}';
$string['errorcatcontextnotvalid'] = 'Vous ne pouvez pas exécuter de fonctions dans le contexte catégorie (category id:{$a->catid}). Le message d\'erreur du contexte est : {$a->message}';
$string['errorcodes'] = 'Message d\'erreur';
$string['errorcoursecontextnotvalid'] = 'Vous ne pouvez pas exécuter de focntions dans le contexte du cours (identifiant du cours : {$a->courseid}). Le message d\'erreur du contexte est : {$a->message}.';
$string['errorinvalidparam'] = 'Le paramètre « {$a} » n\'est pas valide.';
$string['errornotemptydefaultparamarray'] = 'Le paramètre de description « {$a} » du service web est une structure simple ou multiple. Le défaut ne peut être qu\'un tableau vide. Veuillez vérifier la description du service web.';
$string['erroroptionalparamarray'] = 'Le paramètre de description « {$a} » du service web est une structure simple ou multiple. Il ne peut pas être défini comme VALUE_OPTIONAL. Veuillez vérifier la description du service web.';
$string['execute'] = 'Lancer';
$string['executewarnign'] = '<b>Attention</b> : si vous lancez l\'exécution de la commande, votre base de données sera mise à jour et les modifications ne pourront pas être annulées automatiquement !';
$string['externalservice'] = 'Service externe';
$string['externalservicefunctions'] = 'Fonctions du service externe';
$string['externalservices'] = 'Services externes';
$string['externalserviceusers'] = 'Utilisateurs du service externe';
$string['failedtolog'] = 'Échec de connexion';
$string['filenameexist'] = 'Un fichier de ce nom existe déjà : {$a}';
$string['forbiddenwsuser'] = 'Impossible de créer un jeton pour un utilisateur non confirmé, supprimé, suspendu ou un visiteur anonyme.';
$string['function'] = 'Fonction';
$string['functions'] = 'Fonctions';
$string['generalstructure'] = 'Structure générale';
$string['information'] = 'Information';
$string['installexistingserviceshortnameerror'] = 'Un service web avec le nom abrégé « {$a} » existe déjà. Il n\'est pas possible d\'installer ou de mettre à jour un service web avec ce nom abrégé.';
$string['installserviceshortnameerror'] = 'Erreur de codage : le nom abrégé du service web « {$a} » ne doit comporter que des chiffres, des lettres et les caractères _ (souligné) et - (tiret).';
$string['invalidextparam'] = 'Paramètre API externe non valide : {$a}';
$string['invalidextresponse'] = 'Réponse API externe non valide : {$a}';
$string['invalidiptoken'] = 'Jeton non valide. Votre IP n\'est pas supportée.';
$string['invalidtimedtoken'] = 'Jeton invalide (arrivé à échéance)';
$string['invalidtoken'] = 'Jeton invalide (introuvable)';
$string['iprestriction'] = 'Restriction IP';
$string['iprestriction_help'] = 'L\'utilisateur devra appeler le service web à partir de des adresses IP répertoriées.';
$string['key'] = 'Clef';
$string['keyshelp'] = 'Les clefs sont utilisées pour accéder à votre compte Moodle depuis des applications externes.';
$string['manageprotocols'] = 'Gérer les protocoles';
$string['managetokens'] = 'Gérer les jetons';
$string['missingcaps'] = 'Capacités manquantes';
$string['missingcaps_help'] = 'La liste des capacités requises pour le service et que l\'utilisateur sélectionné ne possède pas. Les capacités manquantes doivent être attribuées au rôle de l\'utilisateur pour qu\'il puisse utiliser le service.';
$string['missingpassword'] = 'Mot de passe manquant';
$string['missingrequiredcapability'] = 'La capacité {$a} est requise.';
$string['missingusername'] = 'Nom d\'utilisateur manquant';
$string['missingversionfile'] = 'Erreur de codage : le fichier version.php est manquant pour le composant {$a}';
$string['mobilewsdisabled'] = 'Désactivé';
$string['mobilewsenabled'] = 'Activé';
$string['nofunctions'] = 'Ce service n\'a pas de fonction.';
$string['norequiredcapability'] = 'Aucune capacité requise';
$string['notoken'] = 'La liste des jetons est vide.';
$string['onesystemcontrolling'] = 'Autoriser un système externe à contrôler Moodle';
$string['onesystemcontrollingdescription'] = 'Les étapes suivantes vous aident à configurer les services web de Moodle pour permettre à un système d\'interagir avec Moodle. Cela inclut la configuration de la méthode d\'authentification par jeton (clefs de sécurité).';
$string['operation'] = 'Opération';
$string['optional'] = 'Optionnel';
$string['passwordisexpired'] = 'Le mot de passe est échu.';
$string['phpparam'] = 'XML-RPC (structure PHP)';
$string['phpresponse'] = 'XML-RPC (structure PHP)';
$string['postrestparam'] = 'Code PHP pour REST (requête POST)';
$string['potusers'] = 'Aucun utilisateur autorisé';
$string['potusersmatching'] = 'Aucun utilisateur autorisé correspondant';
$string['print'] = 'Tout imprimer';
$string['protocol'] = 'Protocole';
$string['removefunction'] = 'Supprimer';
$string['removefunctionconfirm'] = 'Voulez-vous vraiment supprimer la fonction « {$a->function} » du service « {$a->service} »?';
$string['requireauthentication'] = 'Cette méthode requiert une authentification avec le droit d\'accès xxx.';
$string['required'] = 'Requis';
$string['requiredcapability'] = 'Capacité requise';
$string['requiredcapability_help'] = 'Si cette option est activée, seuls les utilisateurs ayant la capacité requise peuvent accéder au service.';
$string['requiredcaps'] = 'Capacités requises';
$string['resettokenconfirm'] = 'Voulez-vous vraiment réinitialiser la clef de ce service web pour <strong>{$a->user}</strong> sur le service <strong>{$a->service}</strong> ?';
$string['resettokenconfirmsimple'] = 'Voulez-vous vraiment réinitialiser cette clef ? Tous les liens enregistrés contenant de l\'ancienne clef ne fonctionneront plus.';
$string['response'] = 'Réponse';
$string['restcode'] = 'REST';
$string['restexception'] = 'REST';
$string['restoredaccountresetpassword'] = 'Le compte restauré nécessite un nouveau mot de passe avant d\'obtenir un jeton.';
$string['restparam'] = 'REST (paramètres POST)';
$string['restrictedusers'] = 'Uniquement utilisateurs autorisés';
$string['restrictedusers_help'] = 'Ce réglage détermine si tous les utilisateurs ayant les droits d\'accès requis pour créer un jeton de services web peuvent générer un jeton pour ce service depuis leur page de clefs de sécurité ou si seuls les utilisateurs explicitement autorisés le peuvent.';
$string['securitykey'] = 'Clef de sécurité (jeton)';
$string['securitykeys'] = 'Clefs de sécurité';
$string['selectauthorisedusers'] = 'Sélectionner les utilisateurs autorisés';
$string['selectedcapability'] = 'Sélectionné';
$string['selectedcapabilitydoesntexit'] = 'La capacité actuellement définie comme requise ({$a}) n\'existe plus. Veuillez la changer et enregistrer les modifications.';
$string['selectservice'] = 'Sélectionner un service';
$string['selectspecificuser'] = 'Sélectionner un utilisateur spécifique';
$string['selectspecificuserdescription'] = 'Ajouter l\'utilisateur web services comme utilisateur autorisé.';
$string['service'] = 'Service';
$string['servicehelpexplanation'] = 'Un service est un ensemble de fonction. Il peut être utilisé par tous les utilisateurs ou alors seulement par des utilisateurs spécifiés.';
$string['servicename'] = 'Nom du service';
$string['servicenotavailable'] = 'Le service web n\'est pas disponible (il n\'existe pas ou n\'est pas activé)';
$string['servicesbuiltin'] = 'Services prédéfinis';
$string['servicescustom'] = 'Services personnalisés';
$string['serviceusers'] = 'Utilisateurs autorisés';
$string['serviceusersettings'] = 'Réglages utilisateurs';
$string['serviceusersmatching'] = 'Utilisateurs autorisés correspondant';
$string['serviceuserssettings'] = 'Modifier les paramètres pour les utilisateurs autorisés';
$string['simpleauthlog'] = 'Connexion avec authentification simple';
$string['step'] = 'Étape';
$string['supplyinfo'] = 'Plus de détails';
$string['testauserwithtestclientdescription'] = 'Simuler l\'accès externe au service en utilisant le client de test des web services. Avant de le faire, connectez-vous comme utilisateur avec la capacité moodle/webservice:createtoken et obtenez la clef de sécurité (jeton) sur la page Réglages de mon profil. Vous utiliserez ce jeton dans le client test. Dans le client test, veuillez sélectionner un protocole activé avec authentification par jeton. <strong>ATTENTION ! Les fonctions testées SERONT EXÉCUTÉES pour cet utilisateur. Soyez prudent avec ce que vous testez !</strong>';
$string['testclient'] = 'Client test service web';
$string['testclientdescription'] = '* Le client test service web <strong>lance</strong> les fonctions <strong>POUR DE VRAI</strong>. Ne testez pas les fonctions que vous ne connaissez pas.<br/>
* Les fonctions service web existantes ne sont pas encore toutes implémentées dans le client test.<br/>
* Afin de vérifier qu\'un utilisateur n\'accède pas à certaines fonctions, vous pouvez tester des fonctions que vous n\'avez pas autorisées.<br/>
* Pour voir des messages d\'erreurs plus clairs, réglez le débogage <strong>{$a->mode}</strong> sur {$a->atag}<br/>
* Accédez à {$a->amfatag}.';
$string['testwithtestclient'] = 'Tester le service';
$string['testwithtestclientdescription'] = 'Simuler l\'accès externe au service en utilisant le client de test des web services. Dans le client test, veuillez sélectionner un protocole activé avec authentification par jeton. <strong>ATTENTION ! Les fonctions testées SERONT EXÉCUTÉES pour cet utilisateur. Soyez prudent avec ce que vous testez !</strong>';
$string['token'] = 'Jeton';
$string['tokenauthlog'] = 'Authentification jeton';
$string['tokencreatedbyadmin'] = 'Ne peut être réinitialisé que par un administrateur (*)';
$string['tokencreator'] = 'Créateur';
$string['unknownoptionkey'] = 'Clef d\'option inconnue ({$a})';
$string['unnamedstringparam'] = 'Un paramètre chaîne de caractère n\'a pas de nom.';
$string['updateusersettings'] = 'Modifier';
$string['userasclients'] = 'Utilisateurs en tant que clients avec jetons';
$string['userasclientsdescription'] = 'Les étapes suivantes vous aident à configurer le service web Moodle pour des utilisateurs clients. Ils vous aident aussi à configurer la méthode d\'authentification par jeton (clefs de sécurité) recommandée. Dans ce cas, l\'utilisateur obtiendra sa clef de sécurité (jeton) sur la page Réglages de mon profil.';
$string['usermissingcaps'] = 'Capacités manquantes : {$a}';
$string['usernameorid'] = 'Nom d\'utilisateur / ID utilisateur';
$string['usernameorid_help'] = 'Veuillez saisir un nom d\'utilisateur ou un ID utilisateur';
$string['usernameoridnousererror'] = 'Aucun utilisateur trouvé avec ce nom d\'utilisateur ou cet ID.';
$string['usernameoridoccurenceerror'] = 'Il y a plus d\'un utilisateur avec ce nom d\'utilisateur. Veuillez saisir l\'ID utilisateur.';
$string['usernotallowed'] = 'L\'utilisateur n\'est pas autorisé à utiliser ce service. Vous devez d\'abord autoriser cet utilisateur sur la page page d\'administration des utilisateurs autorisés pour {$a}.';
$string['usersettingssaved'] = 'Réglages utilisateur enregistrés';
$string['validuntil'] = 'Valide jusqu\'au';
$string['validuntil_help'] = 'Si cette option est activée, le service sera désactivé pour cet utilisateur après cette date.';
$string['webservice'] = 'Service web';
$string['webservices'] = 'Services web';
$string['webservicesoverview'] = 'Vue d\'ensemble';
$string['webservicetokens'] = 'Jetons de services web';
$string['wrongusernamepassword'] = 'Nom d\'utilisateur ou mot de passe incorrect';
$string['wsaccessuserdeleted'] = 'Accès au service web refusé en raison de la suppression du compte : {$a}';
$string['wsaccessuserexpired'] = 'Accès au service web refusé en raison de l\'échéance du mot de passe : {$a}';
$string['wsaccessusernologin'] = 'Accès au service web refusé en raison d\'un interdiction de connexion : {$a}';
$string['wsaccessusersuspended'] = 'Accès au service web refusé en raison de la suspension du compte : {$a}';
$string['wsaccessuserunconfirmed'] = 'Accès au service web refusé en raison de la non confirmation du compte : {$a}';
$string['wsclientdoc'] = 'Documentation client du service web Moodle';
$string['wsdocapi'] = 'Documentation API';
$string['wsdocumentation'] = 'Documentation service web';
$string['wsdocumentationdisable'] = 'La documentation service web est désactivée';
$string['wsdocumentationintro'] = 'Avant de créer un client, nous vous conseillons de lire {$a->doclink}';
$string['wsdocumentationlogin'] = 'ou saisissez vos nom d\'utilisateur et mot de passe du service web';
$string['wspassword'] = 'Mot de passe du service web';
$string['wsusername'] = 'Nom d\'utilisateur du service web';
