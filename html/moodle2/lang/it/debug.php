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
 * Strings for component 'debug', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = 'La plugin di autenticazione {$a} non è stata trovata';
$string['blocknotexist'] = 'Il blocco {$a} non esiste';
$string['cannotbenull'] = '{$a} non può essere null!';
$string['cannotdowngrade'] = 'Non è possibile eseguire il downgrade del plugin {$a->plugin} dalla versione {$a->oldversion} alla versione {$a->newversion}.';
$string['cannotfindadmin'] = 'Non è stato possibile trovare un amministratore!';
$string['cannotinitpage'] = 'Non è possibile inizializzare completamente la pagina: {$a->name} non valida {$a->id} id';
$string['cannotsetuptable'] = 'Il setup delle tabelle {$a} non è andato a buon fine!';
$string['codingerror'] = 'E\' stato rilevato un errore di programmazione, deve essere sistemato da un programmatore: {$a}';
$string['configmoodle'] = 'Moodle non è ancora stato configurato. E\' necessario editare il file config.php';
$string['erroroccur'] = 'Si è verificato un errore durante lo svolgimento di questo processo';
$string['invalidarraysize'] = 'La dimensione degli array è errata nei parametri di {$a}';
$string['invalideventdata'] = 'E\' stato inviato un eventdata non corretto: {$a}';
$string['invalidparameter'] = 'E\' stato rilevato un parametro non valido';
$string['invalidresponse'] = 'E\' stata individuata una valore di risposta non valido';
$string['missingconfigversion'] = 'La tabella di configurazione non contiene la versione, non è possibile continuare.';
$string['modulenotexist'] = 'Il modulo {$a} non esiste';
$string['morethanonerecordinfetch'] = 'Nella fetch() è stato trovato più di un record!';
$string['mustbeoveride'] = 'Il metodo astratto {$a} deve essere overridden';
$string['noadminrole'] = 'Non è stato possibile trovare il ruolo amministratore';
$string['noblocks'] = 'Non ci sono blocchi installati!';
$string['nocate'] = 'Non ci sono categorie!';
$string['nomodules'] = 'Non sono stati trovati moduli!';
$string['nopageclass'] = 'E\' stato importato {$a} ma non sono state trovate page class';
$string['noreports'] = 'Non ci sono report visualizzabili';
$string['notables'] = 'Non ci sono tabelle!';
$string['phpvaroff'] = 'La variabile PHP \'{$a->name}\' dovrebbe essere impostata ad Off - {$a->link}';
$string['phpvaron'] = 'La variabile PHP \'{$a->name}\' non è impostata ad On - {$a->link}';
$string['sessionmissing'] = 'L\'oggetto {$a} manca dalla sessione';
$string['sqlrelyonobsoletetable'] = 'Questo SQL fa affidamento su tabelle obsolete: {$a}!. Il tuo codice deve essere sistemato da uno sviluppatore.';
$string['withoutversion'] = 'Il file version.php principale è mancante, illeggibile o rovinato.';
$string['xmlizeunavailable'] = 'Le funzioni xmlize non sono disponibili';
