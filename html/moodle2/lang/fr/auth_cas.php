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
 * Strings for component 'auth_cas', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_cas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accesCAS'] = 'Utilisateurs CAS';
$string['accesNOCAS'] = 'Autres utilisateurs';
$string['auth_cas_auth_user_create'] = 'Créer les utilisateurs en externe';
$string['auth_cas_baseuri'] = 'Adresse URI du serveur CAS (ne rien mettre s\'il n\'y en a pas).<br />par exemple, si le serveur CAS répond à l\'adresse « host.domaine.fr/cas/ », la valeur à indiquer ici est « cas/ ».';
$string['auth_cas_baseuri_key'] = 'URI de base';
$string['auth_cas_broken_password'] = 'Vous ne pouvez pas continuer sans changer de mot de passe, et aucun moyen n\'est disponible pour le changer. Veuillez contacter l\'administrateur de votre Moodle.';
$string['auth_cas_cantconnect'] = 'La partie LDAP du module CAS ne peut pas se connecter au serveur {$a}';
$string['auth_cas_casversion'] = 'Version du protocole CAS';
$string['auth_cas_certificate_check'] = 'Veuillez sélectionner « Oui » si vous voulez valider le certificat du serveur';
$string['auth_cas_certificate_check_key'] = 'Validation serveur';
$string['auth_cas_certificate_path'] = 'Chemin d\'accès au fichier CA chain (format PEM) pour valider le certificat du serveur';
$string['auth_cas_certificate_path_empty'] = 'Si vous activez la validation du serveur, vous devez indiquer un chemin d\'accès au certificat';
$string['auth_cas_certificate_path_key'] = 'Chemin d\'accès certificat';
$string['auth_cas_changepasswordurl'] = 'URL pour changement de mot de passe';
$string['auth_cas_create_user'] = 'Veuillez activer cette option si vous voulez insérer dans la base de données de Moodle les utilisateurs authentifiés par le CAS. Dans le cas contraire, seuls les utilisateurs déjà présents dans la base de données de Moodle pourront se connecter.';
$string['auth_cas_create_user_key'] = 'Créer l\'utilisateur';
$string['auth_casdescription'] = 'Cette méthode utilise un serveur CAS (Central Authentication Service) pour authentifier les utilisateurs dans un environnement Single Sign On (SSO). Il est aussi possible d\'utiliser une simple authentification LDAP. Si le nom d\'utilisateur et le mot de passe donnés sont valides suivant le CAS, Moodle crée un nouvel utilisateur dans sa base de données, en héritant si nécessaire des attributs LDAP de l\'utilisateur. Lors des connexions ultérieures, seuls le nom d\'utilisateur et le mot de passe sont vérifiés.';
$string['auth_cas_enabled'] = 'Veuillez activer cette option si vous voulez utiliser l\'authentification CAS.';
$string['auth_cas_hostname'] = 'Nom d\'hôte du serveur,<br />par exemple : « host.domaine.fr »';
$string['auth_cas_hostname_key'] = 'Nom d\'hôte';
$string['auth_cas_invalidcaslogin'] = 'Désolé, la connexion a échoué ! Vous n\'êtes pas autorisé à vous connecter à la plateforme.';
$string['auth_cas_language'] = 'Langue des pages d\'authentification';
$string['auth_cas_language_key'] = 'Langue';
$string['auth_cas_logincas'] = 'Accès par connexion sécurisée';
$string['auth_cas_logoutcas'] = 'Veuillez sélectionner « Oui » si vous voulez vous déconnecter de CAS lors de la déconnexion de Moodle';
$string['auth_cas_logoutcas_key'] = 'Option de déconnexion CAS';
$string['auth_cas_logout_return_url'] = 'Indiquer ici l\'URL vers lequel les utilisateurs CAS seront redirigés après d\'être déconnectés.<br />Si non renseigné, les utilisateurs seront redirigés vers la page où Moodle redirige normalement les utilisateurs';
$string['auth_cas_logout_return_url_key'] = 'URL de redirection alternatif après déconnexion';
$string['auth_cas_multiauth'] = 'Veuillez sélectionner « Oui » si vous voulez utilisez l\'authentification multiple (CAS + d\'autres méthodes d\'authentification)';
$string['auth_cas_multiauth_key'] = 'Authentification multiple';
$string['auth_casnotinstalled'] = 'Impossible d\'utiliser l\'authentification CAS. Le module PHP LDAP n\'est pas installé.';
$string['auth_cas_port'] = 'Port utilisé par le serveur CAS';
$string['auth_cas_port_key'] = 'Port';
$string['auth_cas_proxycas'] = 'Veuillez sélectionner « Oui » si vous souhaitez vous connecter en mode proxy CAS';
$string['auth_cas_proxycas_key'] = 'Mode proxy';
$string['auth_cas_server_settings'] = 'Configuration du serveur CAS';
$string['auth_cas_text'] = 'Connexion sécurisée';
$string['auth_cas_use_cas'] = 'Utiliser CAS';
$string['auth_cas_version'] = 'Version du protocole CAS à utiliser';
$string['CASform'] = 'Choix du mode d\'authentification';
$string['noldapserver'] = 'Aucun serveur LDAP n\'est configuré pour CAS ! Synchronisation désactivée.';
$string['pluginname'] = 'Serveur CAS (SSO)';
