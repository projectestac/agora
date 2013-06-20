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
 * Strings for component 'dbtransfer', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['checkingsourcetables'] = 'Γίνεται έλεγχος της δομής των πινάκων';
$string['copyingtable'] = 'Αντιγραφή πίνακα {$a}';
$string['copyingtables'] = 'Αντιγραφή περιεχομένων πίνακα';
$string['creatingtargettables'] = 'Δημιουργία πινάκων στη βάση-προορισμό';
$string['dbexport'] = 'Εξαγωγή βάσης δεδομεων';
$string['dbtransfer'] = 'Μεταφορά βάσης δεδομένων';
$string['differenttableexception'] = 'Η δομή του πίνακα {$a} δεν ταιριάζει.';
$string['done'] = 'Έγινε';
$string['exportschemaexception'] = 'Η δομή της τρέχουσας βάσης δεν ταιριάζει με όλα τα αρχεία install.xml. <br /> {$a}';
$string['importschemaexception'] = 'Η δομή της τρέχουσας βάσης δεν ταιριάζει με όλα τα αρχεία install.xml. <br /> {$a}';
$string['importversionmismatchexception'] = 'Η τρέχουσα έκδοση {$a->currentver} δεν ταιριάζει με την εξηχθείσα έκδοση {$a->schemaver}.';
$string['malformedxmlexception'] = 'Βρέθηκε κακοσχηματισμένο XML, είναι αδύνατη η συνέχεια.';
$string['unknowntableexception'] = 'Άγνωστος πίνακας {$a} βρέθηκε στο εξαγμένο αρχείο.';
