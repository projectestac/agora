<?php 

// CAS plugin

$string['accesCAS'] = 'Utilisateurs CAS';
$string['accesNOCAS'] = 'Autres utilisateurs';
$string['auth_cas_auth_user_create'] = 'Créer les utilisateurs en externe';
$string['auth_cas_baseuri_key'] = 'URI de base';
$string['auth_cas_baseuri'] = 'Adresse URI du serveur CAS (ne rien mettre s\'il n\'y en a pas).<br />par exemple, si le serveur CAS répond à l\'adresse « host.domaine.fr/cas/ », la valeur à indiquer ici est « cas/ ».';
$string['auth_cas_broken_password'] = 'Vous ne pouvez pas continuer sans changer de mot de passe, et aucun moyen n\'est disponible pour le changer. Veuillez contacter l\'administrateur de votre Moodle.';
$string['auth_cas_cantconnect'] = 'La partie LDAP du module CAS ne peut pas se connecter au serveur $a';
$string['auth_cas_casversion'] = 'Version';
$string['auth_cas_changepasswordurl'] = 'URL pour changement de mot de passe';
$string['auth_cas_create_user_key'] = 'Créer l\'utilisateur';
$string['auth_cas_create_user'] = 'Veuillez activer cette option si vous voulez insérer dans la base de données de Moodle les utilisateurs authentifiés par le CAS. Dans le cas contraire, seuls les utilisateurs déjà présents dans la base de données de Moodle pourront se connecter.';
$string['auth_cas_enabled'] = 'Veuillez activer cette option si vous voulez utiliser l\'authentification CAS.';
$string['auth_cas_hostname_key'] = 'Nom d\'hôte';
$string['auth_cas_hostname'] = 'Nom d\'hôte du serveur,<br />par exemple : « host.domaine.fr »';
$string['auth_cas_invalidcaslogin'] = 'Désolé, la connexion a échoué ! Vous n\'êtes pas autorisé à vous connecter à la plateforme.';
$string['auth_cas_language_key'] = 'Langue';
$string['auth_cas_language'] = 'Langue choisie';
$string['auth_cas_logincas'] = 'Accès par connexion sécurisée';
$string['auth_cas_logoutcas_key'] = 'Déconnexion';
$string['auth_cas_logoutcas'] = 'Activez cette option si vous voulez vous déconnecter de CAS lors de la déconnexion de Moodle';
$string['auth_cas_multiauth_key'] = 'Authentification multiple';
$string['auth_cas_multiauth'] = 'Activez cette option si vous voulez utilisez l\'authentification multiple (CAS + d\'autres méthodes d\'authentification)';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_port'] = 'Port utilisé par le serveur CAS';
$string['auth_cas_proxycas_key'] = 'Mode proxy';
$string['auth_cas_proxycas'] = 'Activez cette option si vous souhaitez vous connecter en mode proxy CAS';
$string['auth_cas_server_settings'] = 'Configuration du serveur CAS';
$string['auth_cas_text'] = 'Connexion sécurisée';
$string['auth_cas_use_cas'] = 'Utiliser CAS';
$string['auth_cas_version'] = 'Version du logiciel CAS';
$string['auth_casdescription'] = 'Cette méthode utilise un serveur CAS (Central Authentication Service) pour authentifier les utilisateurs dans un environnement Single Sign On (SSO). Il est aussi possible d\'utiliser une simple authentification LDAP. Si le nom d\'utilisateur et le mot de passe donnés sont valides suivant le CAS, Moodle crée un nouvel utilisateur dans sa base de données, en héritant si nécessaire des attributs LDAP de l\'utilisateur. Lors des connexions ultérieures, seuls le nom d\'utilisateur et le mot de passe sont vérifiés.';
$string['auth_casnotinstalled'] = 'Impossible d\'utiliser l\'authentification CAS. Le module PHP LDAP n\'est pas installé.';
$string['auth_castitle'] = 'Serveur CAS (SSO)';
$string['CASform'] = 'Choix du mode d\'authentification';
