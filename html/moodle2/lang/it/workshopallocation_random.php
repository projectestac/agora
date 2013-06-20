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
 * Strings for component 'workshopallocation_random', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_random
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addselfassessment'] = 'Aggiungi auto valutazione';
$string['allocationaddeddetail'] = 'Nuova valutazione da svolgere: <strong>{$a->reviewername}</strong> è revisore di <strong>{$a->authorname}</strong>';
$string['allocationdeallocategraded'] = 'Non è possibile rimuovere la distribuzione di valutazioni che hanno un voto: <strong>{$a->reviewername}</strong>, autore consegna: <strong>{$a->authorname}</strong>';
$string['allocationreuseddetail'] = 'Valutazioni riutilizzate:
<strong>{$a->reviewername}</strong> è stato mantenuto come revisore di <strong>{$a->authorname}</strong>';
$string['allocationsettings'] = 'Impostazioni distribuzione';
$string['assessmentdeleteddetail'] = 'Distribuzione rimossa: {$a->reviewername}</strong> non è più revisore di <strong>{$a->authorname}</strong>';
$string['assesswosubmission'] = 'I partecipanti possono valutare senza aver consegnato il proprio lavoro';
$string['confignumofreviews'] = 'Numero di consegne di default da distribuire casualmente';
$string['excludesamegroup'] = 'Evita revisioni da parte di partecipanti appartenenti allo stesso gruppo';
$string['noallocationtoadd'] = 'Non ci sono distribuzioni da aggiungere';
$string['nogroupusers'] = '<p>Attenzione: si il workshop è in modalità \'gruppi visibili\' o \' gruppi separati\', gli utenti per ricevere l\'assegnazione una valutazione tra pari devono appartenere almeno ad un gruppo. Gli utenti che non appartengono a nessun  gruppo possono ricevere nuove auto valuatzioni oppure vedere rimosse le valuatzioni assegnate.</p>
<p>Di seguito l\'elenco degli utenti che non appartengono a nessun gruppo: {$a}</p>';
$string['numofdeallocatedassessment'] = 'Eliminazione della distribuzione di {$a} valutazioni';
$string['numofrandomlyallocatedsubmissions'] = 'Distribuzione casuale di {$a} consegne';
$string['numofreviews'] = 'Numero di revisioni';
$string['numofselfallocatedsubmissions'] = 'Auto distribuzione di {$a} consegne.';
$string['numperauthor'] = 'per consegna';
$string['numperreviewer'] = 'per revisore';
$string['pluginname'] = 'Distribuzione casuale';
$string['randomallocationdone'] = 'Distribuzione casuale completata';
$string['removecurrentallocations'] = 'Elimina distribuzioni in essere';
$string['resultnomorepeers'] = 'Non ci sono altri pari disponibili';
$string['resultnomorepeersingroup'] = 'Non ci sono altri pari disponibili in questo gruppo separato';
$string['resultnotenoughpeers'] = 'Non ci sono sufficienti pari disponibili';
$string['resultnumperauthor'] = 'Distribuzione in corso di {$a} revisioni(i) per ciascun autore';
$string['resultnumperreviewer'] = 'Distribuzione in corso di {$a} revisone(i) per ciascun revisore';
$string['stats'] = 'Statistiche della distribuzione in essere';
