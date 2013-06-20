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
 * Strings for component 'enrol_flatfile', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'Il file di testo ({$a}) che stai utilizzando per le iscrizioni  non può essere rimosso dal processo cron. Questo In genere a che i permessi sono sbagliati. Per favore orreggi i permessi in modo che Moodle possa eliminare il file, altrimenti sarà elaborato ripetutamente.';
$string['filelockedmailsubject'] = 'Errore grave: file iscrizioni';
$string['location'] = 'Percorso del file';
$string['mailadmin'] = 'Avverti l\'amministratore per email';
$string['mailstudents'] = 'Avverti gli studenti per email';
$string['mailteachers'] = 'Avverti i docenti per email';
$string['mapping'] = 'Mappatura file';
$string['messageprovider:flatfile_enrolment'] = 'Messaggi di iscrizione File di testo';
$string['pluginname'] = 'File (CSV)';
$string['pluginname_desc'] = 'Il plugin di iscrizione controlla ripetutamente la presenza di un file di testo nel percorso impostato, e se il file viene trovato,  verrà elaborato.
Il file, di tipo CSV, deve contenere da quattro a sei campi, come segue:
<pre class="informationbox"> * operation, role, numero ID(utente), numero ID(corso) [, starttime, endtime] dove: * operation = add | del * role = student | teacher | teacheredit * numero ID (utente) = numero ID nella tabella user  user  Nota Bene: non si tratta della id  * numero ID(corso) = numero ID nella tabella corsi, Nota bene non si tratta della id id * starttime = inizio (in secondi a partire da epoch) - opzionale * endtime = fine (in secondi apartire da epoch) - opzionale </pre>
Di seguito un esempio:
<pre class="informationbox">  add, student, 5, CF101 add, teacher, 6, CF101 add, teacheredit, 7, CF101 del, student, 8, CF101 del, student, 17, CF101 add, student, 21, CF101, 1091115000, 1091215000 </pre>';
