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
 * Odissea-GTAF synchronization strings.
 *
 * @package    tool
 * @subpackage odisseagtafsync
 * @copyright  2013 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Sincronització Odissea-GTAF';

$string['backtoindex'] = 'Torna';
$string['configheader'] = 'Configuració FTP';
$string['createpatherror'] = 'No s\'ha pogut crear el directori: {$a}';
$string['defaultcsvheader'] = 'Configuració importació CSV';
$string['defaultuserheader'] = 'Configuració per defecte dels usuaris';
$string['flatfilenotenabled'] = 'El connector d\'inscripció \'Fitxer de text pla (CSV)\' no està activat. Per poder processar els fitxers pendents cal habilitar-ho i tornar a executar el procés de sincronització.';
$string['ftpdirlisterror'] = 'No s\'ha pogut obtenir la llista de fitxers del directori del servidor FTP especificat.';
$string['ftphost'] = 'Servidor FTP';
$string['inputpath'] = 'Directori FTP';
$string['inputpath_help'] = 'Directori del servidor FTP on s\'ubicaran els fitxers d\'entrada que es descarregaran i processaran al Moodle';
$string['mailerror'] = 'S\'ha  produït algun error en la sincronització entre Odissea i GTAF durant el procesament del fitxer <b>{$a->filename}</b><br/><br/>Alertes: {$a->warnings}<br/>Errors: {$a->errors}<br/><br/><br/>';
$string['mailsubject'] = 'Error a la sincronització Odissea-GTAF';
$string['manualnotenabled'] = 'El connector d\'inscripció \'Manual\' no està activat. Per poder processar els fitxers pendents cal habilitar-ho i tornar a executar el procés de sincronització.';
$string['manualsyncheader'] = 'Sincronització manual';
$string['manualsyncdesc'] = 'Permet iniciar el procés de sincronització de forma manual.<br/><br/>';
$string['manualsync'] = 'Sincronitza';
$string['movefileheader'] = 'Traspàs de fitxers';
$string['movefiledesc'] = 'Permet moure un fitxer de la carpeta de còpies de seguretat a la carpeta d\'importació de fitxers.<br/><br/>';
$string['movefilename'] = 'Nom del fitxer';
$string['movefile'] = 'Mou';
$string['nosyncfiles'] = 'No hi ha cap fitxer pendent de processar.';
$string['outputfolderpath'] = 'Directori Moodle';
$string['outputfolderpath_help'] = 'Directori Moodle on descarregar els fitxers FTP, desar els logs, guardar les còpies de seguretat... <ul><li>Els fitxers FTP es descarreguen al directori "pending" i es queden allà fins que són processats.</li><li>Les còpies de seguretat es guarden al directori "backup" abans de començar cada sincronització.</li><li>Els fitxers de registre es creen després de cada execució al directori "results".</li></ul>';
$string['paramsdesc'] = 'Configuració dels paràmetres d\'accés FTP i dels directoris dels fitxers d\'entrada i sortida que es generen des de GTAF. Accés a l\'execució manual del procés';
$string['password'] = 'Contrasenya FTP';
$string['preparedenrolmentsok'] = 'S\'ha mogut el contingut d\'aquest fitxer a la ruta definida a <b>Administració del lloc | Connectors | Inscripcions | Fitxer de text pla (CSV) | Camí al fitxer (<i>enrol_flatfile | location</i>)</b> per processar les baixes la propera vegada que s\'executi el cron.';
$string['processrestorefileok'] = 'S\'ha copiat correctament el fitxer especificat a la carpeta d\'importació.';
$string['preparedenrolmentsok_cron'] = 'S\'ha mogut el contingut d\'aquest fitxer a la ruta {$a} per processar les baixes la propera vegada que s\'executi el cron.';
$string['restorefile_errorcopyingfile'] = 'S\'ha produït un error durant la còpia del fitxer {$a} al directori d\'importació.';
$string['restorefile_fileexists'] = 'Ja existeix el fitxer que es vol copiar (<b>{$a}</b>) al directori d\'importació.';
$string['restorefile_filenofound'] = 'No s\'ha trobat el fitxer especificat (<b>{$a}</b>) a la carpeta que conté les còpies de seguretat';
$string['restorefile_nofile'] = 'No s\'ha especificat cap fitxer per copiar al directori d\'importació.';
$string['syncusersok'] = 'S\'han donat d\'alta correctament els usuaris especificats al fitxer {$a}.';
$string['username'] = 'Nom d\'usuari/ària FTP';
$string[''] = '';
