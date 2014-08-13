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
 * Strings for component 'repository_googledocs', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_googledocs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clientid'] = 'Client ID';
$string['configplugin'] = 'Configurazione plugin Google Drive';
$string['googledocs:view'] = 'Visualizzare repository Google Drive';
$string['oauth2upgrade_message_content'] = 'Per effetto dell\'aggiornamento a Moodle 2.3, il plugin repository Google Drive è stato disabilitato. Per riabilitarlo, devi registrare su Google il tuo sito Moodle. La documentazione per ottenere un Client ID  e uno Shared secret è disponibile su {$a->docsurl}. Il client ID e lo Shared secret possono essere utilizzati per configurare sia i plugin Google Drive sia i plugin Picasa.';
$string['oauth2upgrade_message_small'] = 'Il plugin è stato disabilitato poiché deve essere riconfigurato secondo quanto descritto nella documentazione per il setup di Google OAuth 2.0.';
$string['oauth2upgrade_message_subject'] = 'Informazioni importanti sul plugin repository Google Drive';
$string['oauthinfo'] = '<p>Per usare questo plugin, devi essere registrato su Google. Trovi le istruzioni per la registrazione nella documentazione <a href="{$a->docsurl}">Google OAuth 2.0 setup</a>.</p><p>Durante il processo di registrazione dovrai inserire la seguente URL quale \'Authorized Redirect URIs\':</p><p>{$a->callbackurl}</p>Al termine della registrazione riceverai un Client ID ed un secret che possono essere utilizzati per configurare sia i plugin Google Drive sia i plugin Picasa.</p>
</p><p>Da notare che dovrai anche abilitare il servizio\'Drive API\'.</p>';
$string['pluginname'] = 'Google Drive';
$string['secret'] = 'Secret';
$string['servicenotenabled'] = 'Accesso non configurato. Accertati che il servizio  \'Drive API\' sia abilitato.';
