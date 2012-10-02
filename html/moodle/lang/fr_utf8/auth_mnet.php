<?php // $Id: auth_mnet.php,v 1.7 2009/06/25 19:19:48 martignoni Exp $ 

// MNET plugin

$string['auth_mnet_auto_add_remote_users'] = 'Si ce réglage est activé, un enregistrement d\'utilisateur local est créé automatiquement quand un utilisateur distant se connecte pour la première fois.';
$string['auth_mnet_roamin'] = 'Les utilisateurs de ces serveurs peuvent accéder à votre Moodle';
$string['auth_mnet_roamout'] = 'Vos utilisateurs peuvent accéder à ces serveurs';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Délai en secondes pour l\'authentification par transport XMLRPC.';
$string['auth_mnetdescription'] = 'Les utilisateurs s\'authentifient à travers un réseau de serveurs Moodle défini par vos réglages Réseau Moodle.';
$string['auth_mnettitle'] = 'Authentification Réseau Moodle';
$string['auto_add_remote_users'] = 'Ajouter automatiquement les utilisateurs distants';
$string['rpc_negotiation_timeout'] = 'Délai de négociation RPC échu';
$string['sso_idp_name'] = 'SSO (fournisseur d\'identité)';
$string['sso_idp_description'] = 'La publication de ce service permet à vos utilisateurs d\'utiliser le site Moodle $a sans devoir se reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi vous <strong>abonner</strong> au service SSO (fournisseur de service) sur $a.</li></ul><br /> L\'abonnement à ce service permet à des utilisateurs authentifiés par le serveur $a d\'accéder à votre site sans devoir se reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi <strong>publier</strong> le service SSO (fournisseur de service) de $a.</li></ul><br />';
$string['sso_mnet_login_refused'] = 'L\'utilisateur $a[0] n\'est pas autorisé à se connecter depuis $a[1].';
$string['sso_sp_name'] = 'SSO (fournisseur de service)';
$string['sso_sp_description'] = 'La publication de ce service permet à des utilisateurs authentifiés par le serveur $a d\'accéder à votre site sans devoir se reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi vous <strong>abonner</strong> au service SSO (fournisseur d\'identité) de $a.</li></ul><br />L\'abonnement à ce service permet à vos utilisateurs d\'utiliser le site Moodle $a sans devoir s\'y reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi <strong>publier</strong> le service SSO (fournisseur d\'identité) de $a.</li></ul><br />';
