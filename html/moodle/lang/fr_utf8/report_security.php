<?php  // $Id: report_security.php,v 1.21 2009/11/25 19:41:47 martignoni Exp $

$string['configuration'] = 'Configuration';
$string['details'] = 'Détails';
$string['description'] = 'Description';
$string['issue'] = 'Problème';
$string['reportsecurity'] = 'Panorama de sécurité';
$string['security:view'] = 'Afficher le rapport de sécurité';
$string['status'] = 'Statut';
$string['statuscritical'] = 'Critique';
$string['statusinfo'] = 'Information';
$string['statusok'] = 'OK';
$string['statusserious'] = 'Sérieux';
$string['statuswarning'] = 'Avertissement';
$string['timewarning'] = 'Le traitement des données peut prendre beaucoup de temps. Veuillez prendre patience...';

$string['check_configrw_details'] = '<p>Il est recommandé de modifier les permissions du fichier config.php après installation, afin qu\'il ne soit pas modifié par le serveur web. Veuillez noter que cette mesure n\'améliore pas de façon significative la sécurité du serveur, bien qu\'elle puisse ralentir ou limiter des attaques générales.</p>';
$string['check_configrw_name'] = 'Fichier config.php accessible en écriture';
$string['check_configrw_ok'] = 'Le fichier config.php ne peut pas être modifié par les scripts PHP.';
$string['check_configrw_warning'] = 'Les scripts PHP pourraient modifier le fichier config.php.';

$string['check_cookiesecure_details'] = '<p>Si vous activez la communication https, il vous est recommandé d\'activer également les cookies sécurisés. Veuillez également ajouter également une redirection permanente de http vers https.</p>';
$string['check_cookiesecure_error'] = 'Veuillez activer les cookies sécurisés';
$string['check_cookiesecure_name'] = 'Cookies sécurisés';
$string['check_cookiesecure_ok'] = 'Cookies sécurisés activés.';

$string['check_courserole_anything'] = 'La capacité « doanything » ne doit pas être accordée dans ce <a href=\"$a\">contexte</a>.';
$string['check_courserole_details'] = '<p>Chaque cours possède son propre rôle par défaut attribué aux nouveaux participants inscrits. Veuillez vous assurer qu\'aucune capacité comportant des risques n\'est autorisée pour ce rôle.</p><p>Le seul type de rôle historique supporté pour un tel rôle est le rôle <em>Étudiant</em>.</p>';
$string['check_courserole_error'] = 'Rôle par défaut des cours défini de façon incorrecte !';
$string['check_courserole_riskylegacy'] = 'Type de rôle historique avec risque détecté dans <a href=\"$a->url\">$a->shortname</a>.';
$string['check_courserole_name'] = 'Rôles par défaut (cours)';
$string['check_courserole_notyet'] = 'Seul le rôle par défaut des cours est utilisé.';
$string['check_courserole_ok'] = 'Définition correcte des rôles par défaut des cours.';
$string['check_courserole_risky'] = 'Capacité comportant des risques détectée dans le <a href=\"$a\">contexte</a>.';

$string['check_defaultcourserole_anything'] = 'La capacité « doanything » ne doit pas être accordée dans ce <a href=\"$a\">contexte</a>.';
$string['check_defaultcourserole_details'] = '<p>Le rôle de participant par défaut pour l\'inscription aux cours indique le rôle attribué par défaut lors de l\'inscription. Veuillez vous assurer qu\'aucune capacité comportant des risques n\'est autorisée pour ce rôle.</p><p>Le seul type de rôle historique supporté pour un tel rôle est le rôle <em>Étudiant</em>.</p>';
$string['check_defaultcourserole_error'] = 'Rôle par défaut du cours « {$a} » incorrectement défini !';
$string['check_defaultcourserole_legacy'] = 'Type historique avec risque.';
$string['check_defaultcourserole_name'] = 'Rôle par défaut des cours (global)';
$string['check_defaultcourserole_notset'] = 'Le rôle par défaut n\'est pas défini.';
$string['check_defaultcourserole_ok'] = 'Définition correcte du rôle par défaut du site.';
$string['check_defaultcourserole_risky'] = 'Capacité comportant des risques détectée dans le <a href=\"$a\">contexte</a>.';

$string['check_defaultuserrole_details'] = '<p>Tous les utilisateurs connectés possèdent les capacités du rôle par défaut. Veuillez vous assurer qu\'aucune capacité comportant des risques n\'est autorisée pour ce rôle.</p><p>Le seul type de rôle historique supporté pour un tel rôle est le rôle <em>Utilisateur authentifié</em>. La capacité de voir les cours ne doit pas être autorisée.</p>';
$string['check_defaultuserrole_error'] = 'Rôle par défaut des utilisateurs « {$a} » incorrectement défini !';
$string['check_defaultuserrole_name'] = 'Rôle par défaut des utilisateurs';
$string['check_defaultuserrole_notset'] = 'Le rôle par défaut n\'est pas défini.';
$string['check_defaultuserrole_ok'] = 'Définition correcte du rôle par défaut des utilisateurs.';

$string['check_displayerrors_details'] = '<p>L\'activation du réglage PHP <code>display_errors</code> n\'est pas recommandée sur les sites en production, car les messages d\'erreur peuvent révéler des informations sensibles au sujet de votre serveur.</p>';
$string['check_displayerrors_error'] = 'Le réglage PHP permettant l\'affichage des erreurs est activé. Il est recommandé de le désactiver.';
$string['check_displayerrors_name'] = 'Affichage des erreurs PHP';
$string['check_displayerrors_ok'] = 'Affichage des erreurs PHP désactivé.';

$string['check_emailchangeconfirmation_details'] = '<p>Il est recommandé qu\'un courriel de confirmation soit requis lorsque les utilisateurs modifient leur adresse de courriel dans leur profil. Si cette vérification est désactivée, des spammeurs pourraient utiliser votre serveur pour l\'envoi de pourriels.</p><p>Le champ du courriel peut par ailleurs être verrouillé par les plugins d\'authentification. Cette possibilité n\'est pas considérée ici.</p>';
$string['check_emailchangeconfirmation_error'] = 'Les utilisateurs peuvent saisir n\'importe quelle adresse.';
$string['check_emailchangeconfirmation_info'] = 'Les utilisateurs peuvent saisir que des adresses de courriel des domaines autorisés.';
$string['check_emailchangeconfirmation_name'] = 'Confirmation de modification d\'adresse de courriel';
$string['check_emailchangeconfirmation_ok'] = 'Confirmation lors du changement de l\'adresse de courriel dans le profil utilisateur.';

$string['check_embed_details'] = '<p>L\'incorporation illimitée d\'objets est très dangereuse. Tout utilisateur enregistré pourrait lancer une attaque XSS contre d\'autres utilisateurs du serveur. Ce réglage devrait être désactivé sur des sites en production.</p>';
$string['check_embed_error'] = 'Incorporation illimitée d\'objets activée. Ceci est très dangereux dans la plupart des cas.';
$string['check_embed_name'] = 'Autoriser les balises EMBED et OBJECT';
$string['check_embed_ok'] = 'L\'incorporation illimitée d\'objets n\'est pas autorisée.';

$string['check_frontpagerole_details'] = '<p>Le rôle par défaut de la page d\'accueil est attribué à tous les utilisateurs enregistrés pour les activités qui y sont présentées. Veuillez vous assurer qu\'aucune capacité comportant des risques n\'est autorisée pour ce rôle.</p><p>Il est recommandé de définir un nouveau rôle destiné à cet usage et de ne pas y utiliser un type de rôle historique.</p>';
$string['check_frontpagerole_error'] = 'Rôle de la page d\'accueil « {$a} » incorrectement défini !';
$string['check_frontpagerole_name'] = 'Rôle de la page d\'accueil';
$string['check_frontpagerole_notset'] = 'Le rôle de la page d\'accueil n\'est pas défini.';
$string['check_frontpagerole_ok'] = 'Définition correcte du rôle de la page d\'accueil';

$string['check_globals_details'] = '<p>L\'activation du réglage PHP <code>register_globals</code> représente une importante faille de sécurité.</p><p>Veuillez indiquer <code>register_globals=off</code> dans la configuration PHP de votre site. Vous pouvez modifier ce réglage dans le fichier <code>php.ini</code>, dans la configuration de Apache ou IIS ou dans un fichier <code>.htaccess</code>.</p>';
$string['check_globals_error'] = 'Le réglage <code>register_globals</code> doit être désactivé. Veuillez modifier immédiatement les réglages de PHP !';
$string['check_globals_name'] = 'Register globals';
$string['check_globals_ok'] = 'Le réglage <code>register_globals</code> est désactivé.';

$string['check_google_details'] = '<p>L\'activation du réglage « Ouvert à Google » autorise les moteurs de recherche à accéder aux cours en tant que visiteur anonyme. Il n\'y a aucune raison d\'activer ce réglage si l\'accès aux visiteurs anonymes n\'est pas autorisé.</p>';
$string['check_google_error'] = 'L\'accès aux visiteurs anonymes est autorisé pour les moteurs de recherche alors que l\'accès aux visiteurs anonymes est désactivé.';
$string['check_google_info'] = 'Les moteurs de recherche peuvent accéder en tant que visiteur anonyme.';
$string['check_google_name'] = 'Ouvert à Google';
$string['check_google_ok'] = 'L\'accès des moteurs de recherche est désactivé.';

$string['check_guestrole_details'] = '<p>Un rôle de visiteur anonyme est utilisé pour l\'accès temporaire aux cours pour les utilisateurs anonymes. Veuillez vous assurer qu\'aucune capacité comportant des risques n\'est autorisée pour ce rôle.</p><p>Le seul type de rôle historique supporté pour un tel rôle est le rôle <em>Visiteur anonyme</em>.</p>';
$string['check_guestrole_error'] = 'Rôle de visiteur anonyme « {$a} » incorrectement défini !';
$string['check_guestrole_name'] = 'Rôle de visiteur anonyme';
$string['check_guestrole_notset'] = 'Le rôle de visiteur anonyme n\'est pas défini.';
$string['check_guestrole_ok'] = 'Définition correcte du rôle de visiteur anonyme.';

$string['check_mediafilterswf_details'] = '<p>L\'incorporation automatique de fichier Flash SWF est très dangereuse. Tout utilisateur enregistré pourrait lancer une attaque XSS contre d\'autres utilisateurs du serveur. Ce réglage devrait être désactivé sur des sites en production.</p>';
$string['check_mediafilterswf_error'] = 'Le filtre média Flash est activé. Ceci est très dangereux dans la plupart des cas.';
$string['check_mediafilterswf_name'] = 'Filtre .swf activé';
$string['check_mediafilterswf_ok'] = 'Le filtre média Flash n\'est pas activé.';

$string['check_noauth_details'] = '<p>La méthode d\'authentification <em>Pas d\'authentification</em> n\'est pas destinée à être utilisée sur des serveurs en production. Veuillez la désactiver à moins que ce site soit un site de test ou de développement.</p>';
$string['check_noauth_error'] = 'La méthode d\'authentification <em>Pas d\'authentification</em> ne doit pas être utilisée sur des sites en production.';
$string['check_noauth_name'] = 'Pas d\'authentification';
$string['check_noauth_ok'] = 'La méthode d\'authentification <em>Pas d\'authentification</em> est désactivée.';

$string['check_openprofiles_details'] = '<p>Les profils utilisateurs ouvert peuvent être pollués par des spammeurs. Il est recommandé d\'activer soit le réglage <code>Imposer la connexion pour les profils</code>, soit <code>Imposer la connexion</code>.</p>';
$string['check_openprofiles_error'] = 'Tout le monde peut voir les profils utilisateurs sans se connecter.';
$string['check_openprofiles_name'] = 'Profils utilisateurs ouverts';
$string['check_openprofiles_ok'] = 'La connexion est requise pour consulter les profils utilisateurs.';

$string['check_passwordpolicy_details'] = '<p>Il est recommandé de définir des règles pour les mots de passe, car deviner les mots de passe est la façon la plus fréquente de se procurer un accès non autorisé. Ne définissez pas des règles trop strictes, qui entraîneraient une trop grande difficulté de mémorisation des mots de passe, avec pour conséquence leur oubli ou leur écriture.</p>';
$string['check_passwordpolicy_error'] = 'Règles pour les mots de passe non définies.';
$string['check_passwordpolicy_name'] = 'Règles pour les mots de passe';
$string['check_passwordpolicy_ok'] = 'Des règles sont définies pour les mots de passe.';

$string['check_passwordsaltmain_name'] = 'Sel de mot de passe';
$string['check_passwordsaltmain_warning'] = 'Aucun sel de mot de passe n\'a été défini';
$string['check_passwordsaltmain_ok'] = 'Le sel de mot de passe est correctement défini';
$string['check_passwordsaltmain_weak'] = 'Le sel de mot de passe est faible';
$string['check_passwordsaltmain_details'] = '<p>La définition d\'un sel de mot de passe réduit considérablement les possibilités de vol de mot de passe.</p><p>Pour définir un sel de mot de passe, il suffit d\'ajouter la ligne ci-dessous à votre fichier config.php.</p><code>\$CFG->passwordsaltmain = \'une_très_longue_chaîne_de_caractères_aléatoires\';</code><p>La chaîne de caractères aléatoires doit être un mélange de lettres, de chiffres et d\'autres caractères. Il est recommandé que sa longueur soit d\'au moins 40 caractères.</p><p>Veuillez vous référer à la <a href=\"$a\" target=\"_blank\">documentation sur le sel de mot de passe</a> si vous voulez changer le sel de mot de passe. Une fois le sel de mot de passe défini, ne le supprimez pas, sans quoi vous ne pourrez plus vous connecter à votre site.</p>';

$string['check_riskadmin_detailsok'] = '<p>Veuillez vérifier la liste ci-dessous des administrateurs du système :</p>$a';
$string['check_riskadmin_detailswarning'] = '<p>Veuillez vérifier la liste ci-dessous des administrateurs du système :</p>$a->admins<p>Il est recommandé de n\'attribuer le rôle d\'administrateur que dans le contexte Système. Les utilisateurs ci-dessous ont des attributions non supportées du rôle d\'administrateur :</p><p>$a->unsupported</p>';
$string['check_riskadmin_name'] = 'Administrateurs';
$string['check_riskadmin_ok'] = '$a administrateur(s) Moodle trouvés.';
$string['check_riskadmin_unassign'] = '<a href=\"$a->url\">Vérification de l\'attribution du rôle de $a->fullname ($a->email)</a>';
$string['check_riskadmin_warning'] = '$a->admincount administrateurs et $a->unsupcount attributions du rôle d\'administrateur trouvés.';

$string['check_riskbackup_name'] = 'Sauvegarde des données des utilisateurs';
$string['check_riskbackup_warning'] = '{$a->rolecount} rôles, {$a->overridecount} dérogations aux rôles et {$a->usercount} utilisateurs ont la possibilité de sauvegarder les données des utilisateurs.';
$string['check_riskbackup_details_systemroles'] = '<p>Les rôles mentionnés ci-dessous permettent actuellement aux utilisateurs d\'inclure les données des utilisateurs dans les sauvegardes. Veuillez vous assurer que cette permission est vraiment nécessaire dans ces rôles.</p>{$a}';
$string['check_riskbackup_details_overriddenroles'] = '<p>Ces dérogations aux rôles donnent aux utilisateurs la possibilité d\'inclure les données des utilisateurs dans les sauvegardes. Veuillez vous assurer que cette permission est vraiment nécessaire dans ces dérogations.</p>{$a}';
$string['check_riskbackup_details_users'] = '<p>En raison de leur rôle ou de dérogations, les comptes utilisateurs suivants ont actuellement la capacité de faire des sauvegardes contenant les données privées de tous les utilisateurs inscrits dans leurs cours. Veuillez vous assurer que (a) vous leur accordez votre confiance, et que (b) leur mot de passe est complexe :</p>{$a}';
$string['check_riskbackup_editrole'] = '<a href=\"{$a->url}\">$a->name</a>';
$string['check_riskbackup_editoverride'] = '<a href=\"{$a->url}\">$a->name dans {$a->contextname}</a>';
$string['check_riskbackup_unassign'] = '<a href=\"{$a->url}\">$a->fullname ($a->email) dans {$a->contextname}</a>';
$string['check_riskbackup_ok'] = 'Aucun rôle n\'autorise explicitement la sauvegarde des données des utilisateurs';
$string['check_riskbackup_detailsok'] = 'Aucun rôle n\'autorise explicitement la sauvegarde des données des utilisateurs. Toutefois, les administrateurs, qui possèdent la capacité « doanything » peuvent probablement effectuer de telles sauvegardes malgré tout.';

$string['check_riskxss_details'] = '<p>Le terme RISK_XSS assortit toutes les capacités dangereuses qui ne devraient être autorisées que par des utilisateurs fiables.</p><p>Veuillez vérifier la liste d\'utilisateurs ci-dessous et vous assurer que vous leur faites totalement confiance sur ce site :</p><p>$a</p>';
$string['check_riskxss_name'] = 'Utilisateurs XSS fiables';
$string['check_riskxss_warning'] = 'RISK_XSS, $a utilisateurs dont vous devez être sûr.';

$string['check_unsecuredataroot_details'] = '<p>Le dossier de données ne doit pas être accessible via le web. La meilleure façon de s\'assurer que ce dossier n\'est pas accessible est de le placer en dehors du dossier web public.</p><p>Si vous déplacez ce dossier, vous devrez modifier en conséquence la variable <code>\$CFG->dataroot</code> dans votre fichier <code>config.php</code>.</p>';
$string['check_unsecuredataroot_error'] = 'Votre dossier de données <code>$a</code> est dans un emplacement où il est accessible directement via le web !';
$string['check_unsecuredataroot_name'] = 'Dossier de données non sûr';
$string['check_unsecuredataroot_ok'] = 'Le dossier de données n\'est pas accessible via le web.';
$string['check_unsecuredataroot_warning'] = 'Votre dossier de données <code>$a</code> est dans un emplacement où il pourrait être accessible directement via le web.';

?>