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
 * Strings for component 'portfolio_flickr', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_flickr
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API key';
$string['contenttype'] = 'Tipi di contenuto';
$string['err_noapikey'] = 'Nessuna API Key';
$string['err_noapikey_help'] = 'Non è stata impostata una API Key per questo plugin. Puoi ottenerne una dalla pagine di servizio Flikr';
$string['hidefrompublicsearches'] = 'Nascondere queste immagini dalle ricerche pubbliche?';
$string['isfamily'] = 'Visibile ai familiari';
$string['isfriend'] = 'Visibile agli amici';
$string['ispublic'] = 'Pubblico (chiunque può vederle)';
$string['moderate'] = 'Moderato';
$string['noauthtoken'] = 'Non è stato possibile ricevere un token di autenticazione da usare in questa sessione';
$string['other'] = 'Disegni, illustrazioni, CGI o altre immagini non fotografiche';
$string['photo'] = 'Foto';
$string['pluginname'] = 'Flickr.com';
$string['restricted'] = 'Riservato';
$string['safe'] = 'Sicuro';
$string['safetylevel'] = 'Livello di sicurezza';
$string['screenshot'] = 'Screenshot';
$string['set'] = 'Set';
$string['setupinfo'] = 'Istruzioni per il setup';
$string['setupinfodetails'] = 'Per ottenere una API key e la stringa secret, autenticati su Flickr e <a href="{$a->applyurl}">richiedi una Key</a>.
Dopo la generazione della key e del secret, segui il link \'Edit auth flow for this app\'. Imposta \'App Type\' a \'Web Application\'. Nel campo \'Callback URL\' inserisci il valore <br /><code>{$a->callbackurl}</code><br />Se lo desideri, puoi anche aggiungere la descrizione del tuo sito Moodle e un logo. Questi ultimi valori possono anche essere impostati in seguito accedendo <a href="{$a->keysurl}">alla pagina</a> dove sono elencate le tue applicazioni Flickr.';
$string['sharedsecret'] = 'Secret string';
$string['title'] = 'Titolo';
$string['uploadfailed'] = 'Non è stato possibile caricare le immagini su flickr.com: {$a}';
