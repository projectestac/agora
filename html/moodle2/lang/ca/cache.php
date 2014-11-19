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
 * Strings for component 'cache', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Accions';
$string['addinstance'] = 'Afegeix instància';
$string['addlocksuccess'] = 'S\'ha afegit amb èxit una nova instància de bloqueig.';
$string['addnewlockinstance'] = 'Afegeix una nova instància de bloqueig';
$string['addstore'] = 'Afegeix magatzem {$a}';
$string['addstoresuccess'] = 'S\'ha afegit amb èxit el nou magatzem {$a}';
$string['area'] = 'Àrea';
$string['cacheadmin'] = 'Administració de la memòria cau';
$string['cacheconfig'] = 'Configuració';
$string['cachedef_calendar_subscriptions'] = 'Subscripcions al calendari';
$string['cachedef_config'] = 'Paràmetres de configuració';
$string['cachedef_coursecat'] = 'Llistat de categories del curs per a l\'usuari particular';
$string['cachedef_coursecatrecords'] = 'Registres de les categories del curs';
$string['cachedef_coursecattree'] = 'Arbre de les categories del curs';
$string['cachedef_coursecontacts'] = 'Llista de contactes del curs';
$string['cachedef_coursemodinfo'] = 'Informació acumulada sobre mòduls i seccions per a cada curs';
$string['cachedef_databasemeta'] = 'Metainformació de la base de dades';
$string['cachedef_eventinvalidation'] = 'Invalidació d\'esdeveniment';
$string['cachedef_externalbadges'] = 'Insígnies externes per a un usuari particular';
$string['cachedef_gradecondition'] = 'Qualificacions de l\'usuari en memòria cau per a avaluar la disponiblitat condicional';
$string['cachedef_groupdata'] = 'Informació del grup del curs';
$string['cachedef_htmlpurifier'] = 'Purificador HTML - contingut netejat';
$string['cachedef_langmenu'] = 'Llista d\'idiomes disponibles';
$string['cachedef_locking'] = 'Blocatge';
$string['cachedef_observers'] = 'Observadors d\'esdeveniments';
$string['cachedef_plugin_manager'] = 'Gestor d\'informació de connectors';
$string['cachedef_questiondata'] = 'Definicions de qüestions';
$string['cachedef_repositories'] = 'Dades d\'instàncies dels repositoris';
$string['cachedef_string'] = 'Memòria cau de cadenes d\'idioma';
$string['cachedef_suspended_userids'] = 'Llista d\'usuaris suspesos per curs';
$string['cachedef_userselections'] = 'Dades utilitzades per a persistència de seleccions d\'usuaris a través de Moodle';
$string['cachedef_yuimodules'] = 'Definicions del mòdul YUI';
$string['cachelock_file_default'] = 'Blocatge de fitxers per defecte';
$string['cachestores'] = 'Magatzems de la memòria cau';
$string['caching'] = 'Memòria cau';
$string['component'] = 'Component';
$string['confirmlockdeletion'] = 'Confirma la supressió del bloqueig';
$string['confirmstoredeletion'] = 'Confirma la supressió del magatzem';
$string['default_application'] = 'Magatzem d\'aplicació per defecte';
$string['defaultmappings'] = 'Magatzems utilitzats quan no existeix mapatge';
$string['defaultmappings_help'] = 'Aquests són els magatzems per defecte que s\'utilitzaran si no mapeu un o més magatzems a la definició de la memòria cau.';
$string['default_request'] = 'Magatzem de sol·licituds per defecte';
$string['default_session'] = 'Magatzem de sessions per defecte';
$string['defaultstoreactions'] = 'Els magatzems per defecte no es poden modificar';
$string['definition'] = 'Definició';
$string['definitionsummaries'] = 'Definicions conegudes de la memòria cau';
$string['delete'] = 'Suprimeix';
$string['deletelock'] = 'Suprimeix el bloqueig';
$string['deletelockconfirmation'] = 'Esteu segurs de voler suprimir el bloqueig {$a}?';
$string['deletelockhasuses'] = 'No podeu suprimir aquesta instància de bloqueig perquè està sent utilitzada per un o més magatzems.';
$string['deletelocksuccess'] = 'S\'ha suprimit amb èxit el bloqueig.';
$string['deletestore'] = 'Suprimeix magatzem';
$string['deletestoreconfirmation'] = 'Esteu segur que voleu suprimir el magatzem "{$a}"?';
$string['deletestorehasmappings'] = 'No es pot suprimir aquest magatzem perquè té mapatges. Suprimiu tots els mapatges abans de suprimir el magatzem.';
$string['deletestoresuccess'] = 'S\'ha suprimit amb èxit el magatzem de la memòria cau';
$string['editdefinitionmappings'] = '{$a} mapatges del magatzem de definicions';
$string['editdefinitionsharing'] = 'Edita la definició de compartició per {$a}';
$string['editmappings'] = 'Edita mapatges';
$string['editsharing'] = 'Edita la compartició';
$string['editstore'] = 'Edita magatzem';
$string['editstoresuccess'] = 'S\'ha editat amb èxit el magatzem de la memòria cau';
$string['ex_configcannotsave'] = 'No s\'ha pogut desar la configuració de la memòria cau en un fitxer.';
$string['ex_nodefaultlock'] = 'No s\'ha pogut trobar una instància de bloqueig per defecte.';
$string['ex_unabletolock'] = 'No s\'ha pogut adquirir un bloqueig per a la memòria cau.';
$string['ex_unmetstorerequirements'] = 'No podeu utilitzar aquest magatzem en aquest moment. Consulteu la documentació per determinar els seus requeriments.';
$string['gethit'] = 'Èxit';
$string['getmiss'] = 'Fracàs';
$string['inadequatestoreformapping'] = 'Aquest magatzem no compleix els requeriments per a totes les definicions conegudes. Les definicions per a les quals és inadequat aquest magatzem rebran el magatzem original per defecte en lloc del magatzem seleccionat.';
$string['invalidlock'] = 'Bloqueig no vàlid';
$string['invalidplugin'] = 'Connector invàlid';
$string['invalidstore'] = 'Heu proporcionat un magatzem invàlid per a la memòria cau';
$string['lockdefault'] = 'Per defecte';
$string['lockingmeans'] = 'Mecanisme de bloqueig';
$string['lockmethod'] = 'Mètode de blocatge';
$string['lockmethod_help'] = 'Aquest és el mètode de blocatge utilitzat quan es requereix des d\'aquest magatzem.';
$string['lockname'] = 'Nom';
$string['locknamedesc'] = 'El nom ha de ser únic i sols pot tindre els caràcters: a-zA-Z_';
$string['locknamenotunique'] = 'El nom que heu seleccionat no és únic. Si us plau seleccioneu un nom únic.';
$string['locksummary'] = 'Resum de les instàncies de blocatge de la memòria cau';
$string['locktype'] = 'Tipus';
$string['lockuses'] = 'Usos';
$string['mappingdefault'] = '(per defecte)';
$string['mappingfinal'] = 'Magatzem final';
$string['mappingprimary'] = 'Magatzem principal';
$string['mappings'] = 'Mapatges de magatzem';
$string['mode'] = 'Mode';
$string['mode_1'] = 'Aplicació';
$string['mode_2'] = 'Sessió';
$string['mode_4'] = 'Sol·licitud';
$string['modes'] = 'Modes';
$string['nativelocking'] = 'Aquest connector controla ell mateix els blocatges.';
$string['none'] = 'Cap';
$string['plugin'] = 'Connector';
$string['pluginsummaries'] = 'Magatzems de la memòria cau instal·lats';
$string['purge'] = 'Purga';
$string['purgedefinitionsuccess'] = 'S\'ha purgat amb èxit la definició sol·licitada';
$string['purgestoresuccess'] = 'S\'ha purgat amb èxit el magatzem sol·licitat.';
$string['requestcount'] = 'Prova amb {$a} sol·licituds';
$string['rescandefinitions'] = 'Tornar a escanejar les definicions';
$string['result'] = 'Resultat';
$string['set'] = 'Defineix';
$string['sharing'] = 'S\'està compartint';
$string['sharing_all'] = 'Tothom.';
$string['sharing_help'] = 'Això us permet determinar com les dades de la memòria cau es poden compartir si teniu una configuració en clúster, o si teniu múltiples llocs configurats amb el mateix magatzem i voleu compartir les dades. Aquesta és una opció avançada; si us plau assegureu-vos que enteneu el seu propòsit abans de canviar-la.';
$string['sharing_input'] = 'Clau personalitzada (introduïda a continuació)';
$string['sharingrequired'] = 'Cal que seleccioneu almenys una opció de compartició.';
$string['sharingselected_all'] = 'Tothom';
$string['sharingselected_input'] = 'Clau personalitzada';
$string['sharingselected_siteid'] = 'Identificador de lloc';
$string['sharingselected_version'] = 'Versió';
$string['sharing_siteid'] = 'Llocs amb la mateixa identificació de lloc.';
$string['sharing_version'] = 'Llocs executant la mateixa versió.';
$string['storeconfiguration'] = 'Configuració del magatzem';
$string['store_default_application'] = 'Magatzem de fitxers per defecte per a la memòria cau d\'aplicacions';
$string['store_default_request'] = 'Magatzem estàtic per defecte per a la memòria cau de sol·licituds';
$string['store_default_session'] = 'Magatzem de sessions per defecte per a la memòria cau de sessions';
$string['storename'] = 'Nom del magatzem';
$string['storenamealreadyused'] = 'Heu de triar un nom únic per a aquest magatzem.';
$string['storename_help'] = 'Això defineix el nom del magatzem. S\'utilitza per a identificar el magatzem dins del sistema i pot constar únicament dels caràcters a-z A-Z 0-9 - _ i espais. Ha de ser únic, també. Si intenteu utilitzar un nom que ja ha estat utilitzat obtindreu un error.';
$string['storenameinvalid'] = 'Nom de magatzem invàlid. Només podeu utilitzar a-z A-Z 0-9 - _ i espais.';
$string['storenotready'] = 'El magatzem no està a punt';
$string['storeperformance'] = 'Informes de rendiment del magatzem de memòria cau. {$a} sol·licituds úniques per operació.';
$string['storeready'] = 'Llest';
$string['storerequiresattention'] = 'Requereix la vostra atenció.';
$string['storerequiresattention_help'] = 'Aquesta instància de magatzem no està llesta per a utilitzar-se, però té mapatges. Arreglar aquest problema millorarà el rendiment del sistema. Si us plau, comproveu que el backend del magatzem està llest per a utilitzar-lo i que els requisits de PHP es compleixen.';
$string['storeresults_application'] = 'Emmagatzema les sol·licituds quan s\'utilitza com a memòria cau d\'aplicació.';
$string['storeresults_request'] = 'Emmagatzema les sol·licituds quan s\'utilitza com a memòria cau de sol·licituds.';
$string['storeresults_session'] = 'Emmagatzema les sol·licituds quan s\'utilitza com a memòria cau de sessions.';
$string['stores'] = 'Magatzems';
$string['storesummaries'] = 'Instàncies de magatzem configurades';
$string['supports'] = 'Compatibilitat';
$string['supports_dataguarantee'] = 'Garantia de dades';
$string['supports_keyawareness'] = 'Consciència de claus';
$string['supports_multipleidentifiers'] = 'Identificadors múltiples';
$string['supports_nativelocking'] = 'Blocatge';
$string['supports_nativettl'] = 'ttl';
$string['supports_searchable'] = 'S\'està cercant per clau';
$string['tested'] = 'Provat';
$string['testperformance'] = 'Prova de rendiment';
$string['unsupportedmode'] = 'Mode no compatible';
$string['untestable'] = 'No es pot provar';
$string['userinputsharingkey'] = 'Clau personalitzada per compartir';
$string['userinputsharingkey_help'] = 'Introduïu la vostra clau privada aquí. Quan configureu altres magatzems en altres llocs web amb els quals vulgueu compartir dades, assegureu-vos de posar exactament la mateixa clau allí.';
