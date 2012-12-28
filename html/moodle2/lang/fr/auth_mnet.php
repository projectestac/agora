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
 * Strings for component 'auth_mnet', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_mnet_auto_add_remote_users'] = 'Si ce réglage est activé, un enregistrement d\'utilisateur local est créé automatiquement quand un utilisateur distant se connecte pour la première fois.';
$string['auth_mnetdescription'] = 'Les utilisateurs s\'authentifient à travers un réseau de serveurs Moodle défini par vos réglages Réseau Moodle.';
$string['auth_mnet_roamin'] = 'Les utilisateurs de ces serveurs peuvent accéder à votre Moodle';
$string['auth_mnet_roamout'] = 'Vos utilisateurs peuvent accéder à ces serveurs';
$string['auth_mnet_rpc_negotiation_timeout'] = 'Délai en secondes pour l\'authentification par transport XMLRPC.';
$string['auto_add_remote_users'] = 'Ajouter automatiquement les utilisateurs distants';
$string['pluginname'] = 'Authentification MNet';
$string['rpc_negotiation_timeout'] = 'Délai de négociation RPC échu';
$string['sso_idp_description'] = 'La publication de ce service permet à vos utilisateurs d\'utiliser le site {$a} sans devoir s\'y reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi vous <strong>abonner</strong> au service SSO (fournisseur de service) sur {$a}.</li></ul><br /> L\'abonnement à ce service permet à des utilisateurs authentifiés par le serveur {$a} d\'accéder à votre site sans devoir se reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi <strong>publier</strong> le service SSO (fournisseur de service) de {$a}.</li></ul><br />';
$string['sso_idp_name'] = 'SSO (fournisseur d\'identité)';
$string['sso_mnet_login_refused'] = 'L\'utilisateur {$a->user} n\'est pas autorisé à se connecter depuis {$a->host}.';
$string['sso_sp_description'] = 'La publication de ce service permet à des utilisateurs authentifiés par le serveur {$a} d\'accéder à votre site sans devoir se reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi vous <strong>abonner</strong> au service SSO (fournisseur d\'identité) de {$a}.</li></ul><br />L\'abonnement à ce service permet à vos utilisateurs d\'utiliser le site {$a} sans devoir s\'y reconnecter.<ul><li><em>Dépendance</em> : vous devez aussi <strong>publier</strong> le service SSO (fournisseur d\'identité) de {$a}.</li></ul><br />';
$string['sso_sp_name'] = 'SSO (fournisseur de service)';
