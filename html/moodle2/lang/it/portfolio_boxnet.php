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
 * Strings for component 'portfolio_boxnet', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API key';
$string['err_noapikey'] = 'Nessuna API Key';
$string['err_noapikey_help'] = 'Non è stata impostata una API Key per questo plugin. Puoi ottenerne una da OpenBox development';
$string['existingfolder'] = 'Cartella esistente dove inserire file:';
$string['folderclash'] = 'la cartella che hai chiesto di creare è già esistente!';
$string['foldercreatefailed'] = 'Non è stato possibile creare la cartella destinazione su box.net';
$string['folderlistfailed'] = 'Non è stato possibile ottenere l\'elenco dei folder da box.net';
$string['newfolder'] = 'Cartella da creare dove inserire file:';
$string['noauthtoken'] = 'Non è stato possibile ricevere un token di autenticazione da usare in questa sessione';
$string['notarget'] = 'Per caricare file devi specificare una cartella già esistente oppure una nuova cartella';
$string['noticket'] = 'Non è stato possibile ricevere un ticket da box.net per avviare la sessione di autenticazione';
$string['password'] = 'Password box.net (non verrà memorizzata)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Non è stato possibile inviare contenuti a box.net: {$a}';
$string['setupinfo'] = 'Istruzioni per il setup';
$string['setupinfodetails'] = 'Per ottenere una API Key, autenticati su Box.net e visita la pagina <a href="{$a->servicesurl}">OpenBox development</a>. Crea una nuova applicazione tramite \'Developer Tools\' e \'Create new application\'. L\'API Key è visualizzata nella sezione \'Backend parameters\' del form di modifica dell\'applicazione.
In questo form, compila il campo \'Redirect URL\' con il seguente valore <br /><code>{$a->callbackurl}</code><br />. Se lo desideri, puoi fornire ulteriori informazioni sul tuo sito Moodle, tali informazioni possono essere modificate successivamente in \'View my applications\' ';
$string['sharedfolder'] = 'Condiviso';
$string['sharefile'] = 'Condividere questo file?';
$string['sharefolder'] = 'Condividere questo nuovo folder?';
$string['targetfolder'] = 'Cartella destinazione';
$string['tobecreated'] = 'Da creare';
$string['username'] = 'Username box.net (non verrà memorizzato)';
