<?php

// Shibboleth plugin

$string['auth_shib_changepasswordurl'] = 'URL pour changement de mot de passe';
$string['auth_shib_convert_data_description'] = 'Vous pouvez utiliser cette API pour modifier les données fournies par Shibboleth. Lisez le fichier <a href=\"../auth/shibboleth/README.txt\" target=\"_blank\">README</a> pour d\'autres instructions.';
$string['auth_shib_convert_data_warning'] = 'Le fichier n\'existe pas ou n\'est pas accessible en lecture par le serveur web !';
$string['auth_shib_convert_data'] = 'API de modification de données';
$string['auth_shib_instructions_help'] = 'Veuillez indiquer ici les instructions expliquant le fonctionnement de Shibboleth à vos utilisateurs. Ces instructions seront affichées sur la page de connexion, dans la zone adéquate. Le texte doit contenir un lien vers « <b>$a</b> » que les utilisateurs doivent cliquer pour se connecter à Moodle.';
$string['auth_shib_instructions'] = 'Utilisez la <a href=\"$a\">connexion Shibboleth</a> pour accéder via Shibboleth, si votre institution le permet.<br />Sinon, utilisez la connexion standard de ce formulaire.';
$string['auth_shib_no_organizations_warning'] = 'Si vous voulez utiliser le service intégré WAYF, vous devez fournir une liste des identifiants (entityIDs) Fournisseurs d\'Identité, de leurs noms et optionnellement d\'un initiateur de session, séparés par des virgules (CSV).';
$string['auth_shib_only_description'] = 'Cocher cette option pour imposer l\'authentification Shibboleth';
$string['auth_shib_only'] = 'Seulement Shibboleth';
$string['auth_shib_integrated_wayf'] = 'Service Moodle WAYF';
$string['auth_shib_integrated_wayf_description'] = 'Si vous cochez cette option, Moodle utilisera son propre service WAYF au lieu de celui configuré pour Shibboleth. Moodle affichera sur cette page de connexion alternative un menu déroulant dans lequel l\'utilisateur devra choisir son fournisseur d\'identité.';
$string['auth_shib_idp_list'] = 'Fournisseurs d\'identité';
$string['auth_shib_idp_list_description'] = 'Veuillez fournir une liste des entityIDs des fournisseurs d\'identité parmi lesquels l\'utilisateur devra choisir sur la page de connexion.<br />Sur chaque ligne doit être indiqués l\'identifiant entityID du fournisseur d\'identité (voir le fichier de métadonnées Shibboleth) et son nom, séparés par une virgule.<br />Vous pouvez également ajouter comme troisième paramètre l\'emplacement d\'un initiateur de session Shibboleth devant être utilisé au cas où votre installation de Moodle installation fait partie d\'une fédération.';
$string['auth_shib_logout_return_url'] = 'URL alternative de retour de déconnexion';
$string['auth_shib_logout_return_url_description'] = 'Indiquez l\'URL vers laquelle les utilisateurs Shibboleth seront envoyés après leur déconnexion.<br />Si ce champ n\'est pas renseigné, les utilisateurs seront envoyés vers l\'URL où Moodle envoie les utilisateurs dans ce cas';
$string['auth_shib_logout_url'] = 'URL du gestionnaire de déconnexion du fournisseur de service Shibboleth';
$string['auth_shib_logout_url_description'] = 'Indiquez l\'URL du gestionnaire de déconnexion du fournisseur de service Shibboleth. Par exemple, <tt>/Shibboleth.sso/Logout</tt>';
$string['auth_shib_auth_method'] = 'Nom de la méthode d\'authentification';
$string['auth_shib_auth_method_description'] = 'Indiquez un nom familier pour vos utilisateurs pour la méthode d\'authentification Shibboleth. Ceci peut être le nom de votre fédération Shibboleth, par exemple <tt>SWITCHaai Login</tt> ou <tt>InCommon Login</tt>.';
$string['auth_shib_username_description'] = 'Nom de la variable d\'environnement du serveur web Shibboleth à utiliser comme nom d\'utilisateur Moodle';
$string['auth_shibboleth_contact_administrator'] = 'Si vous n\'êtes pas associé avec les organisations mentionnées et avez besoin d\'accéder à un cours sur ce serveur, veuillez contacter';
$string['auth_shibboleth_errormsg'] = 'Veuillez choisir l\'organisation dont vous êtes membre';
$string['auth_shibboleth_login'] = 'Connexion Shibboleth';
$string['auth_shibboleth_login_long'] = 'Connexion à Moodle via Shibboleth';
$string['auth_shibboleth_manual_login'] = 'Connexion manuelle';
$string['auth_shibboleth_select_member'] = 'Je suis membre de...';
$string['auth_shibboleth_select_organization'] = 'Pour l\'authentification via Shibboleth, veuillez sélectionner votre organisation dans le menu déroulant :';
$string['auth_shibbolethdescription'] = 'Cette méthode permet de créer et d\'authentifier des utilisateurs par l\'intermédiaire d\'un serveur <a href=\"http://shibboleth.internet2.edu/\">Shibboleth</a>.<br />Veuillez lire attentivement le fichier <a href=\"../auth/shibboleth/README.txt\">README</a> pour apprendre comment configurer Moodle pour authentification Shibboleth';
$string['auth_shibbolethtitle'] = 'Shibboleth';
$string['shib_no_attributes_error'] = 'Il semble que vous êtes authentifié par Shibboleth, mais Moodle n\'a reçu aucun attribut utilisateur. Veuillez vérifier que votre fournisseur d\'identité (Identity Provider) distribue les attributs nécessaires ($a) au fournisseur de services chez lequel Moodle fonctionne ou informer l\'administrateur de ce serveur.';
$string['shib_not_all_attributes_error'] = 'Moodle nécessite certains attributs Shibboleth qui ne sont pas présents dans votre cas. Ces attributs sont : $a<br />Veuillez contacter l\'administrateur de ce serveur ou votre fournisseur d\'identité.';
$string['shib_not_set_up_error'] = 'L\'authentification Shibboleth ne semble pas être configurée correctement : aucune variable d\'environnement Shibboleth n\'est présente pour cette page. Veuillez consulter le fichier <a href=\"README.txt\">README</a> pour d\'autres instructions sur la façon de configurer l\'authentification Shibboleth ou contactez l\'administrateur de cette installation de Moodle.';
