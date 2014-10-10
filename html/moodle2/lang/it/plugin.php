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
 * Strings for component 'plugin', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Azioni';
$string['availability'] = 'Disponibilità';
$string['checkforupdates'] = 'Controlla gli aggiornamenti';
$string['checkforupdateslast'] = 'Controllo più recente effettuato il {$a}';
$string['dependencyinstall'] = 'Installa';
$string['dependencyupload'] = 'Carica';
$string['detectedmisplacedplugin'] = 'Il plugin "{$a->component}" è installato erroneamente in "{$a->current}", dovrebbe invece essere installato in  "{$a->expected}"';
$string['displayname'] = 'Nome plugin';
$string['err_response_curl'] = 'Non è stato possibile ottenere i dati sugli aggiornamenti - errore cURL inatteso.';
$string['err_response_format_version'] = 'Formato del response inatteso. Per favore prova a ricontrollare la disponibilità di aggiornamenti';
$string['err_response_http_code'] = 'Non è stato possibile ottenere i dati sugli aggiornamenti - response HTTP inatteso.';
$string['filterall'] = 'Visualizza tutto';
$string['filtercontribonly'] = 'Visualizza solo plugin aggiuntivi';
$string['filtercontribonlyactive'] = 'Sono visualizzati solo i plugin aggiuntivi';
$string['filterupdatesonly'] = 'Visualizza solo plugin aggiornabili';
$string['filterupdatesonlyactive'] = 'Sono visualizzati solo i plugin aggiornabili';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = 'Non ci sono plugin che richiedono la tua attenzione';
$string['nonehighlightedinfo'] = 'Visualizza l\'elenco dei plugin installati.';
$string['noneinstalled'] = 'Non ci sono plugin di questo tipo installati.';
$string['notdownloadable'] = 'Non è possibile scaricare i pacchetti';
$string['notdownloadable_help'] = 'Non è possibile scaricare automaticamente i pacchetti ZIP degli aggiornamenti. Per aiuto ulteriore consulta la documentazione.';
$string['notes'] = 'Note';
$string['notwritable'] = 'I file del plugin non sono scrivibili';
$string['notwritable_help'] = 'L\'installazione automatica degli aggiornamenti è abilitata e sono disponibili aggiornamenti per questo plugin, ma il web server non ha i gli appropriati permessi di scrittura e pertanto non è possibile proseguire con l\'installazione

Per installare automaticamente gli aggiornamenti del plugin è necessario dare gli appropriati permessi di scrittura sulle cartelle e sui file del plugin.';
$string['numdisabled'] = 'Disabilitati: {$a}';
$string['numextension'] = 'Plugin: {$a}';
$string['numtotal'] = 'Installati: {$a}';
$string['numupdatable'] = 'Aggiornamenti disponibili: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component} ({$a->version})';
$string['pluginchecknotice'] = 'La pagina visualizza i plugin che potrebbero richiedere una verifica prima dell\'aggiornamento. Gli elementi evidenziati includono nuovi plugin in procinto di essere installati, plugin da aggiornare e plugin mancanti. I plugin aggiuntivi vengono evidenziati se è disponibile un aggiornamento. Si raccomanda di controllare la disponibilità di versioni più recenti dei plugin aggiuntivi e aggiornare il relativo codice prima di effettuare l\'aggiornamento di Moodle.';
$string['plugindisable'] = 'Disabilita';
$string['plugindisabled'] = 'Disabilitato';
$string['pluginenable'] = 'Abilita';
$string['pluginenabled'] = 'Abilitato';
$string['requiredby'] = 'Richiesto da: {$a}';
$string['requires'] = 'Richiede';
$string['rootdir'] = 'Cartella';
$string['settings'] = 'Impostazioni';
$string['showall'] = 'Ricarica e visualizza tutti i plugin';
$string['somehighlighted'] = 'Numero di plugin che richiedono la tua attenzione {$a}';
$string['somehighlightedinfo'] = 'Visualizza l\'elenco completo dei plugin installati';
$string['somehighlightedonly'] = 'Visualizza solo i plugin che richiedono attenzione';
$string['source'] = 'Sorgente';
$string['sourceext'] = 'Componente aggiuntivo';
$string['sourcestd'] = 'Standard';
$string['status'] = 'Stato';
$string['status_delete'] = 'Da eliminare';
$string['status_downgrade'] = 'Una versione più recente è già stata installata!';
$string['status_missing'] = 'Manca sul disco';
$string['status_new'] = 'Da installare';
$string['status_nodb'] = 'Nessun database';
$string['status_upgrade'] = 'Da aggiornare';
$string['status_uptodate'] = 'Installato';
$string['systemname'] = 'Identificativo';
$string['type_auth'] = 'Metodo di autenticazione';
$string['type_auth_plural'] = 'Plugin di autenticazione';
$string['type_block'] = 'Blocco';
$string['type_block_plural'] = 'Blocchi';
$string['type_cachelock'] = 'Cache lock handler';
$string['type_cachelock_plural'] = 'Cache lock handler';
$string['type_cachestore'] = 'Cache store';
$string['type_cachestore_plural'] = 'Cache store';
$string['type_calendartype'] = 'Tipo di calendario';
$string['type_calendartype_plural'] = 'Tipi di calendario';
$string['type_coursereport'] = 'Report del corso';
$string['type_coursereport_plural'] = 'Report del corso';
$string['type_editor'] = 'Editor';
$string['type_editor_plural'] = 'Editor';
$string['type_enrol'] = 'Metodo di iscrizione';
$string['type_enrol_plural'] = 'Metodi di iscrizione';
$string['type_filter'] = 'Filtro';
$string['type_filter_plural'] = 'Filtro Tex';
$string['type_format'] = 'Formato corso';
$string['type_format_plural'] = 'Tipologie di corso';
$string['type_gradeexport'] = 'Metodo di esportazione delle valutazioni';
$string['type_gradeexport_plural'] = 'Metodi di esportazione delle valutazioni';
$string['type_gradeimport'] = 'Metodo di importazione delle valutazioni';
$string['type_gradeimport_plural'] = 'Metodi di importazione delle valutazioni';
$string['type_gradereport'] = 'Report registro valutatore';
$string['type_gradereport_plural'] = 'Report registro valutatore';
$string['type_gradingform'] = 'Metodo di valutazione avanzato';
$string['type_gradingform_plural'] = 'Metodi di valutazione avanzati';
$string['type_local'] = 'Plugin locale';
$string['type_local_plural'] = 'Plugin locali';
$string['type_message'] = 'Instradamento messaggi';
$string['type_message_plural'] = 'Instradamento messaggi';
$string['type_mnetservice'] = 'Servizio MNet';
$string['type_mnetservice_plural'] = 'Servizi MNet';
$string['type_mod'] = 'Modulo attività';
$string['type_mod_plural'] = 'Moduli attività';
$string['type_plagiarism'] = 'Plugin prevenzione plagio';
$string['type_plagiarism_plural'] = 'Plugin prevenzione plagio';
$string['type_portfolio'] = 'Portfolio';
$string['type_portfolio_plural'] = 'Portfolio';
$string['type_profilefield'] = 'Tipo di campo personalizzato';
$string['type_profilefield_plural'] = 'Tipi di campo personalizzato';
$string['type_qbehaviour'] = 'Comportamento domanda';
$string['type_qbehaviour_plural'] = 'Comportamenti domanda';
$string['type_qformat'] = 'Formato di importazione/esportazione domande';
$string['type_qformat_plural'] = 'Formati di importazione/esportazione domande';
$string['type_qtype'] = 'Tipo domanda';
$string['type_qtype_plural'] = 'Tipi domande';
$string['type_report'] = 'Report del sito';
$string['type_report_plural'] = 'Report';
$string['type_repository'] = 'Repository';
$string['type_repository_plural'] = 'Repository';
$string['type_theme'] = 'Tema';
$string['type_theme_plural'] = 'Temi';
$string['type_tool'] = 'Tool amministrativo';
$string['type_tool_plural'] = 'Tool amministrativi';
$string['type_webservice'] = 'Protocollo webservice';
$string['type_webservice_plural'] = 'Protocolli webservice';
$string['uninstall'] = 'Rimuovi';
$string['uninstallconfirm'] = 'Stai per rimuovere il plugin <em>{$a->name}</em>. La rimozione eliminerà i dati associati al plugin presenti nel database, la configurazione, i log, file utente gestiti dal plugin, eccetera. La rimozione è definitiva e Moodle non crea backup di sorta. Sei SICURO di continuare?';
$string['uninstalldelete'] = 'Tutti i dati relativi al plugin <em>{$a->name}</em> sono stati eliminati dal database. Per evitare che il plugin si installi nuovamente, è necessario rimuovere manualmente dal server la seguente cartella: <em>{$a->rootdir}</em>.
Moodle non può rimuovere la cartella per mancanza di permessi di scrittura.';
$string['uninstalldeleteconfirm'] = 'Tutti i dati relativi al plugin <em>{$a->name}</em> sono stati eliminati dal database. Per evitare che il plugin si installi nuovamente, è necessario rimuovere dal server la seguente cartella: <em>{$a->rootdir}</em>. Desideri rimuovere la cartella?';
$string['uninstalldeleteconfirmexternal'] = 'E\' possibile che il codice sorgente del plugin sia stato ottenuto via checkout del source code management system ({$a}). Rimuovendo la cartella del plugin si potrebbero perdere informazioni rilevanti sulle eventuali modifiche apportate al codice. Prima di proseguire, per favore accertarsi che la cartella vada eliminata definitivamente.';
$string['uninstallextraconfirmblock'] = 'Sono presenti  {$a->instances} istanze di questo blocco';
$string['uninstallextraconfirmenrol'] = 'Sono presenti  {$a->enrolments} iscrizioni.';
$string['uninstallextraconfirmmod'] = 'Sono presenti {$a->instances} istanze del modulo in {$a->courses} corsi.';
$string['uninstalling'] = 'Rimozione di {$a->name}';
$string['updateavailable'] = 'E\' disponibile una nuova versione {$a}!';
$string['updateavailable_moreinfo'] = 'Ulteriori informazioni';
$string['updateavailable_release'] = 'Release {$a}';
$string['updatepluginconfirm'] = 'Conferma aggiornamento plugin';
$string['updatepluginconfirmexternal'] = 'Sembra che la versione in uso del plugin sia stata ottenuta tramite un checkout del source code management system ({$a}). Installando l\'aggiornamento non sarà più possibile ottenere aggiornamenti del plugin tramite source code management system. Assicurati di voler realmente aggiornare il plugin prima di proseguire.';
$string['updatepluginconfirminfo'] = 'Stai per installare una nuova versione del plugin <strong>{$a->name}</strong>. Un pacchetto zip contenente la versione {$a->version} del plugin sarà scaricato da  <a href="{$a->url}">{$a->url}</a>, espanso nella cartella di installazione di Moodle ed aggiornato.';
$string['updatepluginconfirmwarning'] = 'Da notare che Moodle non effettuerà automaticamente una copia del database prima dell\'aggiornamento. E\' fortemente consigliato effettuare una copia completa di backup per poter ripristinare il sito nel caso di bug con il codice aggiornato o di problemi con il database. Prosegui a tuo rischio.';
$string['version'] = 'Versione';
$string['versiondb'] = 'Versione attuale';
$string['versiondisk'] = 'Nuova versione';
