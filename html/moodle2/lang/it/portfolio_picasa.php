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
 * Strings for component 'portfolio_picasa', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_picasa
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['noauthtoken'] = 'Google non ha fornito un token di autenticazione. Accertati che Moodle sia autorizzato ad accedere al tuo account Google';
$string['nooauthcredentials'] = 'Sono necessarie le credenziali OAuth';
$string['nooauthcredentials_help'] = 'Per usare il plugin portfolio Picasa devi configurare le credenziali OAuth nelle impostazioni del plugin.';
$string['oauth2upgrade_message_content'] = 'Per effetto dell\'aggiornamento a Moodle 2.3, il plugin portfolio Picasa è stato disabilitato. Per riabilitarlo, devi registrare su Google il tuo sito Moodle. La documentazione per ottenere un Client ID  e uno Shared secret è disponibile su {$a->docsurl}. Il client ID e lo Shared secret possono essere utilizzati per configurare sia i plugin Google Docs sia i plugin Picasa..';
$string['oauth2upgrade_message_small'] = 'Il plugin è stato disabilitato poiché deve essere riconfigurato secondo quanto descritto nella documentazione per il setup di Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Informazioni importanti sul plugin portfolio Picasa';
$string['oauthinfo'] = '<p>Per usare questo plugin, devi essere registrato su Google. Trovi le istruzioni per la registrazione nella documentazione <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p>Durante il processo di registrazione dovrai inserire la seguente URL di callback nel campo \'Authorized Redirect URIs\':</p><p>{$a->callbackurl}</p>Al termine della registrazione riceverai un Client ID ed uno Shared secret che possono essere utilizzati per configurare sia i plugin Google Docs sia i plugin Picasa.</p>';
$string['pluginname'] = 'Picasa';
$string['secret'] = 'Secret';
$string['sendfailed'] = 'Non è stato possibile trasferire il file {$a} su Picasa';
