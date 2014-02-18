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

$string['apiv1migration_message_content'] = 'Per effetto dell\'aggiornamento a Moodle 2.4.7, il plugin portfolio Box.net è stato disabilitato. Per riabilitarlo, devi riconfigurarlo in accordo la istruzioni presenti nella documentazione {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Il plugin è stato disabilitato poiché deve essere configurato in accordo alla documentazione di migrazione APIv1 Box.net.';
$string['apiv1migration_message_subject'] = 'Informazioni importanti sul plugin portfolio Box.net';
$string['clientid'] = 'Client ID';
$string['clientsecret'] = 'Client secret';
$string['existingfolder'] = 'Cartella esistente dove inserire file:';
$string['folderclash'] = 'la cartella che hai chiesto di creare è già esistente!';
$string['foldercreatefailed'] = 'Non è stato possibile creare la cartella destinazione su box.net';
$string['folderlistfailed'] = 'Non è stato possibile ottenere l\'elenco dei folder da box.net';
$string['missinghttps'] = 'HTTPS obbligatorio';
$string['missinghttps_help'] = 'Box.net funziona solo con siti che hanno abilitato HTTPS .';
$string['missingoauthkeys'] = 'Client ID and secret mancanti';
$string['missingoauthkeys_help'] = 'Non sono presenti client ID o secret configurati per il plugin., E\' possibile ottenerli nella development page di Box.net';
$string['newfolder'] = 'Cartella da creare dove inserire file:';
$string['noauthtoken'] = 'Non è stato possibile ricevere un token di autenticazione da usare in questa sessione';
$string['notarget'] = 'Per caricare file devi specificare una cartella già esistente oppure una nuova cartella';
$string['noticket'] = 'Non è stato possibile ricevere un ticket da box.net per avviare la sessione di autenticazione';
$string['password'] = 'Password box.net (non verrà memorizzata)';
$string['pluginname'] = 'Box.net';
$string['sendfailed'] = 'Non è stato possibile inviare contenuti a box.net: {$a}';
$string['setupinfo'] = 'Istruzioni per il setup';
$string['setupinfodetails'] = 'Per ottenere un client ID e un secret, recati su a API Key, autenticati su Box.net e visita la pagina <a href="{$a->servicesurl}">developers page</a>. Tramite \'Create new application\' crea la nuova applicazione per il sito Moodle. Il client ID ed il secret vengono visualizzati nella sezione \'OAuth2 parameters\' del form di modifica applicazione. Se lo si desidera, è anche possibile fornire ulteriori informazioni sul proprio sito.';
$string['sharedfolder'] = 'Condiviso';
$string['sharefile'] = 'Condividere questo file?';
$string['sharefolder'] = 'Condividere questo nuovo folder?';
$string['targetfolder'] = 'Cartella destinazione';
$string['tobecreated'] = 'Da creare';
$string['username'] = 'Username box.net (non verrà memorizzato)';
$string['warninghttps'] = 'Il portfolio Box.net per funzionare richiede che il sito lavori in HTTPS.';
