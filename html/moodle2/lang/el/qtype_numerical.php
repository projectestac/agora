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
 * Strings for component 'qtype_numerical', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_numerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptederror'] = 'Αποδεκτό σφάλμα';
$string['addmoreanswerblanks'] = 'Κενά πεδία για {no} ακόμα απαντήσεις';
$string['addmoreunitblanks'] = 'Κενά πεδία για {no} ακόμα μονάδες';
$string['answermustbenumberorstar'] = 'Η απάντηση πρέπει να είναι αριθμός, ή \'*\'.';
$string['answerno'] = 'Απάντηση {$a}';
$string['decfractionofquestiongrade'] = 'ως κλάσμα (0-1) από τον βαθμό της ερώτησης';
$string['decfractionofresponsegrade'] = 'ως κλάσμα (0-1) από τον βαθμό της απάντησης';
$string['decimalformat'] = 'δεκαδικά ψηφία';
$string['editableunittext'] = 'το στοιχείο εισαγωγής κειμένου';
$string['errornomultiplier'] = 'Πρέπει να ορίσετε έναν πολλαπλασιαστή για αυτή τη μονάδα.';
$string['errorrepeatedunit'] = 'Δεν μπορείτε να έχετε δύο μονάδες με το ίδιο όνομα.';
$string['geometric'] = 'Γεωμετρικός';
$string['leftexample'] = 'στα αριστερά, για παράδειγμα $1.00 ή £1.00';
$string['manynumerical'] = 'Οι μονάδες είναι προαιρετικές. Αν η μονάδα εισαχθεί, χρησιμοποιείται για να μετατρέψει την απάντηση στην Μονάδα 1 πριν βαθμολογηθεί.';
$string['multiplier'] = 'Πολλαπλασιαστής';
$string['nominal'] = 'Ονομαστικός';
$string['notenoughanswers'] = 'Πρέπει να εισάγετε τουλάχιστον μια απάντηση.';
$string['numericalmultiplier'] = 'Πολλαπλασιαστής';
$string['numericalmultiplier_help'] = 'Ο πολλαπλασιαστής είναι ο συντελεστής με τον οποίο η σωστή αριθμιτική απάντηση θα πολλαπλασιαστεί. Η πρώτη μονάδα (Μονάδα 1) έχει προεπιλεγμένο πολλαπλασιαστή 1. Έτσι αν η σωστή αριθμιτική απάντηση είναι 5500 και έχετε ορίσει W ως μονάδα στην Μονάδα 1 που έχει 1 σαν προεπιλεγμένο πολλαπλασιαστή, η σωστή απάντηση είναι 5500 W. Αν προσθέσετε την μονάδα kW με πολλαπλασιαστή 0.001, αυτό θα εμφανίσει ως σωστή απάντηση 5.5 kW. Αυτό σημαίνει ότι οι απαντήσεις 5500W ή 5.5kW θα θεωρηθούν σωστές. Σημειώστε ότι το περιθώριο λάθους πολλαπλασιάζεται επίσης, έτσι αν επιτρέπεται λάθος 100W θα γίνει λάθος 0.1kW.';
$string['onlynumerical'] = 'Μονάδες που δεν χρησιμοποιούνται καθόλου. Μόνο η αριθμιτική τιμή βαθμολογείται.';
$string['pluginname'] = 'Αριθμητική';
$string['pluginnameadding'] = 'Προσθήκη μιας Αριθμητικής ερώτησης';
$string['pluginnameediting'] = 'Τροποποίηση μιας Αριθμητικής ερώτησης';
$string['pluginnamesummary'] = 'Επιτρέπει μια αριθμητική απάντηση, εν δυνάμει με μονάδες, η οποία βαθμολογείται σε σύγκριση με διάφορες πρότυπες απαντήσεις, με δυνατότητα ανοχών.';
$string['relative'] = 'Συγκριτικός';
$string['rightexample'] = 'στα δεξιά, για παράδειγμα 1.00cm ή 1.00km';
$string['studentunitanswer'] = 'Οι μονάδες καταχωρούνται χρησιμοποιώντας';
$string['tolerancetype'] = 'Τύπος ανοχής';
$string['unitchoice'] = 'πολλαπλές επιλογές';
$string['unitgraded'] = 'Η μονάδα πρέπει να δίνεται και θα βαθμολογείται.';
$string['unithandling'] = 'Χειρισμός μονάδας μέτρησης';
$string['unithdr'] = 'Μονάδα {$a}';
$string['unitpenalty'] = 'Ποινή μονάδας';
$string['unitpenalty_help'] = 'Η ποινή εφαρμόζεται αν * το λάθος όνομα μονάδας εισαχθεί στην καταχώρηση μονάδας, ή * η μονάδα εισαχθεί στο κουτί καταχώρησης της τιμής';
$string['unitselect'] = 'ένα drop-down μενού';
