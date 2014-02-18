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
 * Strings for component 'url', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = 'Scegli una variabile...';
$string['clicktoopen'] = 'Per aprire la risorsa fai click sul link {$a}';
$string['configdisplayoptions'] = 'Seleziona le opzioni che desideri rendere disponibili. Le impostazioni già in essere non saranno modificate. Per selezionare più opzioni tenere premuti il tasto CTRL.';
$string['configframesize'] = 'Se si desidera visualizzare un URL usando i frame, è possibile specificare la dimensione in pixel del frame superiore che conterrà l\'intestazione di pagina con l\'interfaccia di navigazione del sito.';
$string['configrolesinparams'] = 'Rende possibile utilizzare i nomi personalizzati dei ruoli nell\'elenco dei parametri';
$string['configsecretphrase'] = 'La chiave viene utilizzata per generare il codice criptato utilizzato per inviare dati dalle risorse che fanno uso di parametri. Il codice criptato è generato tramite la funzione md5 concatenando l\'indirizzo IP dell\'utente con la chiave. Ad esempio: code = md5(IP.secretphrase). Tenere presente che il tutto potrebbe non essere affidabile in quanto gli indirizzi IP cambiano e sono spesso condivisi tra più computer.';
$string['contentheader'] = 'Contenuto';
$string['createurl'] = 'Aggiungi un URL';
$string['displayoptions'] = 'Opzioni di visualizzazione disponibili';
$string['displayselect'] = 'Visualizzazione';
$string['displayselectexplain'] = 'Imposta il tipo di visualizzazione di default. Tenere presente che i vari tipi di URL potrebbero consentire solo alcuni tipi di visualizzazione.';
$string['displayselect_help'] = 'L\'impostazione, assieme al tipo di URL e ciò che supporta il browser, determina la visualizzazione dell\'URL. Opzioni disponibili:

* Automatica - La visualizzazione migliore sarà scelta automaticamente
* Incorpora - L\'URL sarà visualizzato all\'interno della pagina sotto la barra di navigazione assieme alla descrizione ed ai blocchi laterali
* Apri - Nel browser sarà visualizzata solamente l\'URL
* Popup - L\'URL sarà visualizzata in una nova finestra priva di barre dei menu e di navigazione.
* Frame - L\'URL sarà visualizzato utilizzando un frame sotto la barra di navigazione e la descrizione dell\'URL stessa
* Nuova finestra - L\'URL sarà visualizzato in una nuova finestra completa di barre dei menu e di navigazione.';
$string['externalurl'] = 'URL';
$string['framesize'] = 'Altezza frame';
$string['invalidstoredurl'] = 'Non è possibile visualizzare la risorsa, l\'URL non è valida';
$string['invalidurl'] = 'L\'URL inserito non è valido';
$string['modulename'] = 'URL';
$string['modulename_help'] = 'Il modulo URL consente ai docenti di inserire link web come risorse del corso. E\' possibile creare link verso qualsiasi URL liberamente disponibile online, copiando ed incollando l\'URL, oppure scegliendo un file da repository come Flickr, youtube o Wikimedia tramite il file picker (in funzione del repository attivi nel sito).

Sono disponibili molte opzioni di visualizzazione per aprire l\'URL, ad esempio in una finestra popup oppure incorporandola, ed anche opzioni avanzate per inviare all\'URL parametri come il nome dello studente.

Da notare che è possibile aggiungere URL ad altri tipi di risorse o attività tramite l\'editor di testo.';
$string['modulenameplural'] = 'URL';
$string['neverseen'] = 'Mai acceduto';
$string['optionsheader'] = 'Opzioni';
$string['page-mod-url-x'] = 'Qualsiasi pagina con modulo URL';
$string['parameterinfo'] = '&parameter=variable';
$string['parametersheader'] = 'Parametri';
$string['parametersheader_help'] = 'E\' possibile posporre automaticamente all\'URL alcune variabili interne di Moodle. Inserisci un nome per il parametro e scegli la variabile corrispondente.';
$string['pluginadministration'] = 'Gestione URL';
$string['pluginname'] = 'URL';
$string['popupheight'] = 'Altezza popup (in pixel)';
$string['popupheightexplain'] = 'Altezza di default per le finestre popup.';
$string['popupwidth'] = 'Larghezza popup (in pixel)';
$string['popupwidthexplain'] = 'Larghezza di default per le finestre popup.';
$string['printheading'] = 'Visualizza il nome dell\'URL';
$string['printheadingexplain'] = 'Consente di visualizzare il nome dell\'URL prima del contenuto.';
$string['printintro'] = 'Visualizza la descrizione dell\'URL';
$string['printintroexplain'] = 'Consente di visualizzare la descrizione dell\'URL sotto il contenuto. enere presente che alcuni tipi di visualizzazione potrebbero non rispettare questa impostazione.';
$string['rolesinparams'] = 'Includi nei parametri i nomi dei ruoli';
$string['serverurl'] = 'URL server';
$string['url:addinstance'] = 'Aggiungere URL';
$string['url:view'] = 'Visualizzare URL';
