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
 * Strings for component 'portfolio_googledocs', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'ID client';
$string['noauthtoken'] = 'Aucun jeton d\'authentification n\'a été reçu de Google. Veuillez vous assurer que vous autorisez vraiment Moodle à accéder à votre compte Google';
$string['nooauthcredentials'] = 'Données d\'authentification OAuth requises.';
$string['nooauthcredentials_help'] = 'Pour utiliser le plugin de portfolio Google Docs, vous devez configurer d\'abord les données d\'authentification OAuth dans les réglages de portfolio.';
$string['nosessiontoken'] = 'Il n\'y a pas de jeton de session, ce qui empêche l\'exportation vers Google.';
$string['oauth2upgrade_message_content'] = 'Le plugin de portfolio Google Docs a été désactivé durant la mise à jour à Moodle 2.3. Pour le réactiver, votre site doit être enregistré auprès de Google, comme décrit dans la documentation {$a->docsurl}, afin d\'obtenir un ID client et un secret. L\'ID client et le secret pourront alors être utilisé pour configurer tous les plugins Google Docs et Picasa.';
$string['oauth2upgrade_message_small'] = 'Ce plugin a été désactivé, car il nécessite une configuration telle que décrite dans la documentation de mise en place de Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Information importante au sujet du plugin de portfolio Google Docs';
$string['oauthinfo'] = '<p>Pour utiliser ce plugin, vous devez d\'abord enregistrer votre site auprès de Google. Les instructions pour ce faire sont décrites dans la documentation de <a href="{$a->docsurl}">configuration Google OAuth 2.0</a>.</p><p>au cours du processus d\'enregistrement, vous devrez saisir l\'URL suivante comme « Authorized Redirect URIs » :</p><p>{$a->callbackurl}</p><p>Après l\'enregistrement, vous recevrez un ID client et un secret que vous pourrez utiliser pour configurer tous les plugins Google Docs et Picasa.</p>';
$string['pluginname'] = 'Google Docs';
$string['secret'] = 'Secret';
$string['sendfailed'] = 'Échec du transfert du fichier {$a} vers Google';
