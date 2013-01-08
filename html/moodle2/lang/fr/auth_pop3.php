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
 * Strings for component 'auth_pop3', language 'fr', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_pop3
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_pop3changepasswordurl_key'] = 'URL pour changement de mot de passe';
$string['auth_pop3description'] = 'Cette méthode utilise un serveur POP3 pour vérifier qu\'un nom d\'utilisateur et son mot de passe sont valides.';
$string['auth_pop3host'] = 'L\'adresse du serveur POP3. Utiliser l\'adresse IP et non le nom de la machine.';
$string['auth_pop3host_key'] = 'Serveur';
$string['auth_pop3mailbox'] = 'Nom de la boîte aux lettres vers laquelle tenter la connexion, d\'habitude « INBOX ».';
$string['auth_pop3mailbox_key'] = 'Boîte aux lettres';
$string['auth_pop3notinstalled'] = 'Impossible d\'utiliser l\'authentification POP3. Le module PHP IMAP n\'est pas installé.';
$string['auth_pop3port'] = 'Numéro de port du serveur POP3. Il s\'agit habituellement du port 110, et lors de l\'utilisation de SSL du port 995.';
$string['auth_pop3port_key'] = 'Port';
$string['auth_pop3type'] = 'Type de serveur. Si le serveur POP3 utilise « certificate security », choisir « pop3cert ».';
$string['auth_pop3type_key'] = 'Type';
$string['pluginname'] = 'Serveur POP3';
