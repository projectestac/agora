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
 * Strings for component 'repository_boxnet', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   repository_boxnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['apikey'] = 'API Key';
$string['apiv1migration_message_content'] = 'Per effetto dell\'aggiornamento di Moodle (2.6, 2.5.3, 2.4.7), il plugin repository Box è stato disabilitato. Per riabilitarlo, devi riconfigurarlo in accordo la istruzioni presenti nella documentazione {$a->docsurl}.';
$string['apiv1migration_message_small'] = 'Il plugin è stato disabilitato poiché deve essere configurato in accordo alla documentazione di migrazione APIv1 Box.';
$string['apiv1migration_message_subject'] = 'Informazioni importanti sul plugin repository Box';
$string['boxnet:view'] = 'Visualizzare repository Box';
$string['cannotcreatereference'] = 'Non è possibile creare un riferimento, non ci sono autorizzazioni sufficienti per condividere il file su Box';
$string['clientid'] = 'Client ID';
$string['clientsecret'] = 'Client secret';
$string['configplugin'] = 'Configurazione Box';
$string['filesourceinfo'] = 'Box ({$a->fullname}): {$a->filename}';
$string['information'] = 'Puoi ottenere un client ID e un secret per questo sito Moodle su<a href="https://app.box.com/developers/services">Box developer page</a>.';
$string['invalidpassword'] = 'Password non valida';
$string['migrationadvised'] = 'Sembra che Box sia stato utilizzato con le API versione 1. Ha lanciato il <a href="{$a}">tool di migrazione</a> per convertire i vecchi riferimenti?';
$string['migrationinfo'] = '<p>Per effetto delle migrazione alle nuove API fornite da Box, è necessario migrare i riferimenti ai file. Purtroppo il sistema dei riferimenti non è compatibile con le API v2 e quindi si procederà a scaricare i file convertendo i riferimenti in file reali.</p>
<p>Da notare che la migrazione può <strong>richiedere molto tempo</strong> in funzione del numero di riferimenti utilizzati e della dimensione dei file.</p>
<p>E\' possibile lanciare la migrazione facendo click sul pulsante sottostante oppure eseguendo lo script CLI  repository/boxnet/cli/migrationv1.php.</p>
<p>Per ulteriori informazioni <a href="{$a->docsurl}">consultare la documentazione</a>.</p>';
$string['migrationtool'] = 'Tool di migrazione Box APIv1';
$string['nullfilelist'] = 'Questo repository non contiene file';
$string['password'] = 'Password';
$string['pluginname'] = 'Box';
$string['pluginname_help'] = 'Repository su Box';
$string['runthemigrationnow'] = 'Lancia il tool di migrazione adesso';
$string['saved'] = 'Dati Box salvati';
$string['shareurl'] = 'URL di condivisione';
$string['username'] = 'Username Box';
$string['warninghttps'] = 'Il repository Box per funzionare richiede che il sito lavori in HTTPS.';
