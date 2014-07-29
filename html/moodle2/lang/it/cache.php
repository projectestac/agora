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
 * Strings for component 'cache', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Azioni';
$string['addinstance'] = 'Aggiungi istanza';
$string['addlocksuccess'] = 'Istanza di lock aggiunta correttamente';
$string['addnewlockinstance'] = 'Aggiungi istanza di lock';
$string['addstore'] = 'Aggiungi store {$a}';
$string['addstoresuccess'] = 'Lo store {$a} è stato aggiunto correttamente';
$string['area'] = 'Area';
$string['cacheadmin'] = 'Amministrazione cache';
$string['cacheconfig'] = 'Configurazione';
$string['cachedef_calendar_subscriptions'] = 'Sottoscrizioni calendario';
$string['cachedef_config'] = 'Impostazioni di configurazione';
$string['cachedef_coursecat'] = 'Elenchi di categorie di corso per un utente specifico';
$string['cachedef_coursecatrecords'] = 'Record delle categorie di corso';
$string['cachedef_coursecattree'] = 'Alberatura delle categorie di corso';
$string['cachedef_coursecontacts'] = 'Elenco dei gestori dei corsi';
$string['cachedef_coursemodinfo'] = 'Informazioni accumulate sui moduli e delle sezioni di ciascun corso';
$string['cachedef_databasemeta'] = 'Meta informazioni database';
$string['cachedef_eventinvalidation'] = 'Event invalidation';
$string['cachedef_externalbadges'] = 'Badge esterni per utente specifico';
$string['cachedef_gradecondition'] = 'Valutazioni degli utenti per calcolo della disponibilità condizionata';
$string['cachedef_groupdata'] = 'Informazioni sui gruppi dei corsi';
$string['cachedef_htmlpurifier'] = 'HTML Purifier . contenuto ripulito';
$string['cachedef_langmenu'] = 'Elenco delle lingue disponibili';
$string['cachedef_locking'] = 'Locking';
$string['cachedef_navigation_expandcourse'] = 'Navigazione espandibile dei corsi';
$string['cachedef_observers'] = 'Event observer';
$string['cachedef_plugin_manager'] = 'Gestore informazioni pluign';
$string['cachedef_questiondata'] = 'Definizioni domanda';
$string['cachedef_repositories'] = 'Dati delle istanze dei repository';
$string['cachedef_string'] = 'Cache stringhe della lingua';
$string['cachedef_suspended_userids'] = 'Elenco degli utenti sospesi nei corsi';
$string['cachedef_userselections'] = 'Dati utilizzati per rendere persistenti le selezioni dell\'utente in Moodle';
$string['cachedef_yuimodules'] = 'Definizioni moduli YUI';
$string['cachelock_file_default'] = 'File locking di default';
$string['cachestores'] = 'Cache store';
$string['caching'] = 'Caching';
$string['component'] = 'Componente';
$string['confirmlockdeletion'] = 'Conferma eliminazione lock';
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
$string['deletelock'] = 'Elimina lock';
$string['deletelockconfirmation'] = 'Sei sicuro di eliminare il lock {$a}?';
$string['deletelockhasuses'] = 'Non è possibile eliminare l\'istanza di lock poiché è utilizzata da uno o più store.';
$string['deletelocksuccess'] = 'Lock eliminato correttamente';
$string['deletestore'] = 'Elimina store';
$string['deletestoreconfirmation'] = 'Sei sicuro di eliminare lo store "{$a}"';
$string['deletestorehasmappings'] = 'Non è possibile eliminare questo store poiché è mappato. Prima di  eliminare lo store devi eliminare le mappature.';
$string['deletestoresuccess'] = 'Il cache store è stato eliminato correttamente';
$string['editdefinitionmappings'] = 'Definizione mappatura store {$a}';
$string['editdefinitionsharing'] = 'Modifica definizione della condivisione per {$a}';
$string['editmappings'] = 'Modifica mappatura';
$string['editsharing'] = 'Modifica condivisione';
$string['editstore'] = 'Modifica store';
$string['editstoresuccess'] = 'Cache store modificato correttamente';
$string['ex_configcannotsave'] = 'Impossibile salvare la configurazione cache su file';
$string['ex_nodefaultlock'] = 'Impossibile trovare un\'istanza lock di defaulr';
$string['ex_unabletolock'] = 'Impossibile ottenere un lock per il caching';
$string['ex_unmetstorerequirements'] = 'Al momento non è possibile usare questo store.Nella documentazione sono descritti i suoi requisiti.';
$string['gethit'] = 'Get - Hit';
$string['getmiss'] = 'Get - Miss';
$string['inadequatestoreformapping'] = 'Questo store non è compatibile con i requisiti di tutte le definizioni note. Le definizioni per gli store incompatibili faranno riferimento allo store di default.';
$string['invalidlock'] = 'Lock non valido';
$string['invalidplugin'] = 'Plugin non valido';
$string['invalidstore'] = 'E\' stato fornito un cache store non valido';
$string['lockdefault'] = 'Default';
$string['lockingmeans'] = 'Meccanismo di locking';
$string['lockmethod'] = 'Metodo di lock';
$string['lockmethod_help'] = 'Il metodo utilizzato per il locking quando questo store lo richiede.';
$string['lockname'] = 'Nome';
$string['locknamedesc'] = 'Il nome deve essere univoco e contenere solamente i caratteri a-zA-Z_';
$string['locknamenotunique'] = 'Il nome inserito non è univoco. E\' necessario cambiare nome.';
$string['locksummary'] = 'Riepilogo delle istanze di cache lock';
$string['locktype'] = 'Tipo';
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
$string['purgedefinitionsuccess'] = 'La definizione è stata svuotata come da richiesta.';
$string['purgestoresuccess'] = 'Lo store è stato svuotato correttamente';
$string['requestcount'] = 'Test con {$a} request';
$string['rescandefinitions'] = 'Rileggi le definizioni';
$string['result'] = 'Risultato';
$string['set'] = 'Imposta';
$string['sharing'] = 'Condivsione';
$string['sharing_all'] = 'Tutti.';
$string['sharing_help'] = 'Consente di configurare la condivisione dei dati della cache, utile per un sito in cluster oppure per più siti che condividono lo stesso store. Si tratta di un\'impostazione avanzata, se non si è più che sicuri del significato dell\'impostazione, evitare di modificarla.';
$string['sharing_input'] = 'Chiave personalizzata (da inserire sotto)';
$string['sharingrequired'] = 'Devi scegliere almeno un\'opzione di condivisione';
$string['sharingselected_all'] = 'Tutti.';
$string['sharingselected_input'] = 'Chiave personalizzata';
$string['sharingselected_siteid'] = 'Site identifier';
$string['sharingselected_version'] = 'Versione';
$string['sharing_siteid'] = 'Siti con stesso site identifier';
$string['sharing_version'] = 'Siti con la stessa versione';
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
$string['userinputsharingkey'] = 'Chiave personalizzata per la condivisione';
$string['userinputsharingkey_help'] = 'E\' possibile inserire il nome di una chiave privata. Se si configurano store su altri siti con i quali condividere dati, è necessario specificare esattamente la stessa chiave.';
