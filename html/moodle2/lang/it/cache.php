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
 * Strings for component 'cache', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Azioni';
$string['addinstance'] = 'Aggiungi istanza';
$string['addstore'] = 'Aggiungi store {$a}';
$string['addstoresuccess'] = 'Lo store {$a} è stato aggiunto correttamente';
$string['area'] = 'Area';
$string['cacheadmin'] = 'Amministrazione cache';
$string['cacheconfig'] = 'Configurazione';
$string['cachedef_databasemeta'] = 'Meta informazioni database';
$string['cachedef_eventinvalidation'] = 'Event invalidation';
$string['cachedef_htmlpurifier'] = 'HTML Purifier . contenuto ripulito';
$string['cachedef_locking'] = 'Locking';
$string['cachedef_questiondata'] = 'Definizioni domanda';
$string['cachedef_string'] = 'Cache stringhe della lingua';
$string['cachelock_file_default'] = 'File locking di default';
$string['cachestores'] = 'Cache store';
$string['caching'] = 'Caching';
$string['component'] = 'Componente';
$string['confirmstoredeletion'] = 'Conferma eliminazione store';
$string['default_application'] = 'Application store di default';
$string['defaultmappings'] = 'Store da usare in assenza di mappatura';
$string['defaultmappings_help'] = 'Gli store di defaulr utilizzati nel caso in cui non vengano mappati store nella definizione della cache.';
$string['default_request'] = 'Request store di default';
$string['default_session'] = 'Session store di default';
$string['defaultstoreactions'] = 'Non è possibile modificare gli store di default';
$string['definition'] = 'Definizioni';
$string['definitionsummaries'] = 'Definizioni cache note';
$string['delete'] = 'Elimina';
$string['deletestore'] = 'Elimina store';
$string['deletestoreconfirmation'] = 'Sei sicuro di eliminare lo store "{$a}"';
$string['deletestorehasmappings'] = 'Non è possibile eliminare questo store poiché è mappato. mappato. Per favore emiliana le mappature prima di eliminare lo store';
$string['deletestoresuccess'] = 'Il cache store è stato eliminato correttamente';
$string['editdefinitionmappings'] = 'Definizione mappatura store {$a}';
$string['editmappings'] = 'Modifica mappatura';
$string['editstore'] = 'Modifica store';
$string['editstoresuccess'] = 'Cache store modificato correttamente';
$string['ex_configcannotsave'] = 'Impossibile salvare la configurazione cache su file';
$string['ex_nodefaultlock'] = 'Impossibile trovare un\'istanza lock di defaulr';
$string['ex_unabletolock'] = 'Impossibile ottenere un lock per il caching';
$string['ex_unmetstorerequirements'] = 'Al momento non è possibile usare questo store.Nella documentazione sono descritti i suoi requisiti.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['invalidplugin'] = 'Plugin non valido';
$string['invalidstore'] = 'E\' stato fornito un cache store non valido';
$string['lockdefault'] = 'Default';
$string['lockmethod'] = 'Metodo di lock';
$string['lockmethod_help'] = 'Il metodo utilizzato per il locking quando questo store lo richiede.';
$string['lockname'] = 'Nome';
$string['locksummary'] = 'Riepilogo delle istanze di cache lock';
$string['lockuses'] = 'Utilizzi';
$string['mappingdefault'] = '(default)';
$string['mappingfinal'] = 'Store finale';
$string['mappingprimary'] = 'Store primario';
$string['mappings'] = 'Mappatura store';
$string['mode'] = 'Modalità';
$string['mode_1'] = 'Application';
$string['mode_2'] = 'Session';
$string['mode_4'] = 'Request';
$string['modes'] = 'Modalità';
$string['nativelocking'] = 'Questo plugin gestisce il locking in proprio';
$string['none'] = 'Nessuno';
$string['plugin'] = 'Plugin';
$string['pluginsummaries'] = 'Cache store installati';
$string['purge'] = 'Svuota';
$string['purgestoresuccess'] = 'Lo store è stato svuotato correttamente';
$string['requestcount'] = 'Test con {$a} request';
$string['rescandefinitions'] = 'Rileggi le definizioni';
$string['result'] = 'Risultato';
$string['set'] = 'Imposta';
$string['storeconfiguration'] = 'Configurazione store';
$string['store_default_application'] = 'File store di default per application cache';
$string['store_default_request'] = 'Static store di default per request cache';
$string['store_default_session'] = 'Session store di default per session cache';
$string['storename'] = 'Nome store';
$string['storenamealreadyused'] = 'E\' necessario usare un nome univoco per gli store';
$string['storename_help'] = 'Imposta il nome utilizzato per identificare lo store all\'interno del sistema. Il nome può contenere i caratteri a-z A-Z 0-9 -_ e spazi bianchi e deve essere univoco. Impostando un nome già esistente si verificherà un errore.';
$string['storenameinvalid'] = 'Il nome dello store non è valido. E\' possibile usare solamente  a-z A-Z 0-9 -_ e spazi bianchi numeri';
$string['storenotready'] = 'Store non pronto';
$string['storeperformance'] = 'Report delle prestazioni cache store - {$a} unique request per operazione.';
$string['storeready'] = 'Stato';
$string['storerequiresattention'] = 'Richiede attenzione.';
$string['storerequiresattention_help'] = 'L\'istanza dello store non è pronta all\'uso ma possiede mappature. Le performance potranno migliorare se il problema verrà risolto. Per favore controlla che lo store backend sia pronto all\'uso è che siano soddisfatti tutti i prerequisiti PHP.';
$string['storeresults_application'] = 'Store request per l\'uso come application cache';
$string['storeresults_request'] = 'Store request per l\'uso come request cache';
$string['storeresults_session'] = 'Store request per l\'uso come session cache';
$string['stores'] = 'Store';
$string['storesummaries'] = 'Istanze store configurate';
$string['supports'] = 'Supporta';
$string['supports_dataguarantee'] = 'data guarantee';
$string['supports_keyawareness'] = 'key awareness';
$string['supports_multipleidentifiers'] = 'multiple identifiers';
$string['supports_nativelocking'] = 'locking';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = 'ricerca per chiave';
$string['tested'] = 'Testato';
$string['testperformance'] = 'Test prestazioni';
$string['unsupportedmode'] = 'Modalità non supportata';
$string['untestable'] = 'Non testabile';
