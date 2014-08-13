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
 * Strings for component 'enrol_flatfile', language 'it', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['encoding'] = 'Codifica file';
$string['expiredaction'] = 'Azione alla scadenza dell\'iscrizione';
$string['expiredaction_help'] = 'L\'azione da compiere quando scade l\'iscrizione di un partecipante. Da notare che alcuni dati verranno eliminati per effetto della disiscrizione.';
$string['filelockedmail'] = 'Il file di testo ({$a}) che stai utilizzando per le iscrizioni  non può essere rimosso dal processo cron. Questo In genere a che i permessi sono sbagliati. Per favore orreggi i permessi in modo che Moodle possa eliminare il file, altrimenti sarà elaborato ripetutamente.';
$string['filelockedmailsubject'] = 'Errore grave: file iscrizioni';
$string['flatfile:manage'] = 'Gestire manualmente le iscrizioni degli utenti';
$string['flatfile:unenrol'] = 'Disiscrivere manualmente gli utenti dai corsi';
$string['location'] = 'Percorso del file';
$string['location_desc'] = 'Il percorso completo del file delle iscrizioni. Il file verrà eliminato automaticamente al termine dell\'elaborazione';
$string['mapping'] = 'Mappatura ruoli';
$string['messageprovider:flatfile_enrolment'] = 'Messaggi di iscrizione File di testo';
$string['notifyadmin'] = 'Avverti l\'amministratore';
$string['notifyenrolled'] = 'Avverti gli utenti iscritti';
$string['notifyenroller'] = 'Avverti l\'utente responsabile delle iscrizioni';
$string['pluginname'] = 'File (CSV)';
$string['pluginname_desc'] = 'Il plugin di iscrizione IMS Enterprise controlla ripetutamente la presenza di un file di testo  opportunamente formattato nel percorso impostato. Se il file viene trovato, verrà elaborato.
Il file, di tipo CSV, deve contenere da quattro a sei campi, come segue:


operation, role, user idnumber, course idnumber [, starttime [, endtime]]

dove:

* operation - add | del
* role - student | teacher | teacheredit
* user idnumber - codice identificativo nella tabella user. Nota Bene: non si tratta del campo id
* course idnumber - codice identificativo nella tabella corsi, Nota bene non si tratta del campo id
* starttime - inizio (in secondi a partire da epoch) - opzionale
* endtime - fine (in secondi a partire da epoch) - opzionale

Esempio:
<pre class="informationbox">
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
